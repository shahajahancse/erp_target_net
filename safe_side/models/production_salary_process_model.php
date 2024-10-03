<?php
class Production_salary_process_model extends CI_Model{
	function __construct()
	{
		parent::__construct();
		
		/* Standard Libraries */
		$this->load->model('pd_process_model');
		$this->load->model('emp_wise_entry_model');
		$this->load->model('salary_process_eligibility_model');
		$this->load->model('common_model');
		$this->load->model('pd_models/pd_salary_report_model');
		
	}
	
	function production_pay_sheet($year, $month)
	{
		$year_month = "$year-$month";
		//==================Get Process Date=========================================
		$process_date 		= $this->pd_process_model->get_start_end_date($month,$year);
		$process_start_date = $process_date['start_date'] ;
		$process_end_date 	= $process_date['end_date'] ;
		
		// ==================Get Process Month (Needs for Join check)==================
		$process_start_month 	= date('Y-m', strtotime($process_start_date));
		$process_end_month 		= date('Y-m', strtotime($process_end_date));
		
		// ==================Get Table Name(att_2013_01)=============================
		//$start_table_name 	= $this->get_table_name($process_start_date);
		//$end_table_name 	= $this->get_table_name($process_end_date);
		
		//=====================Check Table Name (True Or False)=====================
		//$start_table_validity 	= $this->table_exists_check($start_table_name);
		//$end_table_validity 	= $this->table_exists_check($end_table_name);
		
		$second_half_search_start_date 		= date("Y-m-01", strtotime($process_end_date));
		//=====================Check Deduct Status (Yes Or No)=====================
		//$deduct_id =1;
		//$deduct_status = $this->common_model->get_setup_attributes($deduct_id);
		
		/*if($start_table_validity == "False" && $end_table_validity == "False")
		{
			return "Process month does not exist, please change your process month";
		}*/
		
		//======================Get No. of Days And Working Days  Between Process Dates==========
		$num_of_days = $this->get_no_of_days($process_start_date,$process_end_date);
		/*$day_of_week=5; 
		$num_of_days = $this->get_no_of_days($process_start_date,$process_end_date);
		$weekend_day_name = $this->common_model->get_setup_attributes(5);
		$weekend_days = $this->get_weekend_days($weekend_day_name,$num_of_days,$process_start_date);
		//echo $weekend_days;
		$no_working_days = $num_of_days - $weekend_days;*/
		
		
		//============================Get All Production Employee===============================
		$all_emp_id = $this->pd_process_model->get_all_pd_emp_id();
		//print_r($all_emp_id->result_array());
		//echo $all_emp_id->num_rows();
		foreach($all_emp_id->result() as $rows)
		{
			$salary_process_eligibility = $this->salary_process_eligibility_model->salary_process_eligibility($rows->emp_id,$process_start_date,$process_end_date);
			
				
			if($salary_process_eligibility == true)
			{ 
				$emp_id 		= $rows->emp_id;
				$emp_sec_id 	= $rows->emp_sec_id; 
				$emp_floor_id 	= $rows->emp_position_id; 
				$emp_block_id 	= $rows->emp_line_id;  
				$emp_desi_id 	= $rows->emp_desi_id; 
				$doj 			= $rows->emp_join_date;
				$emp_status_id	= $rows->emp_cat_id;
				$salary_type	= 2;
				$gross_sal 		= $rows->gross_sal;
				$join_month		= date('Y-m', strtotime($doj));
				//==================================LOCAL Salary Rule===================================
				$salary_structure 		= $this->common_model->salary_structure($gross_sal);
				$conveyance 			= 0;
				$madical_allo 			= $salary_structure['medical_allow'];
				$madical_allo_payable 	= $madical_allo;
				$basic_sal 				= $salary_structure['basic_sal'];
				$basic_sal_payable 		= $basic_sal;
				$house_rent 			= $salary_structure['house_rent'];
				$house_rent_payable 	= $house_rent;
				
				$total_sal = $basic_sal + $house_rent + $madical_allo; 
				
				$data["emp_id"] 		= $emp_id;
				$data["sec_id"] 		= $emp_sec_id;
				$data["floor_id"] 		= $emp_floor_id;
				$data["block_id"] 		= $emp_block_id;
				$data["status_id"] 		= $emp_status_id;
				$data["sal_type"] 		= $salary_type;
				$data["basic_sal"] 		= $basic_sal;
				$data["house_r"] 		= $house_rent;
				$data["medical_a"] 		= $madical_allo;
				$data["gross_sal"] 		= $gross_sal;
				$data["total_days"] 	= $num_of_days;
				
				//===================For Manual Attendance===============
				$this->db->select('*');
				$this->db->where('emp_id',$emp_id);
				$this->db->like('date',$process_end_month);
				$query = $this->db->get("pd_manual_attandence");
				
				$num_rows = $query->num_rows();
				if($num_rows != 0)
				{
					foreach ($query->result() as $row_man_entry)
					{
					  $no_working_days		= $row_man_entry->total_working_day;
					  $holiday 				= $row_man_entry->holiday;
					  $weeked		 		= $row_man_entry->weekend;
					  $attend 				= $row_man_entry->p_day;
					  $absent 				= $row_man_entry->a_day;
					  $total_leave 			= $row_man_entry->leave;
					  $none_work_day 		= $row_man_entry->no_work;
					  $night_allowance_no 	= $row_man_entry->night;
					  $late_count 			= $row_man_entry->late;
					  $holiday_allowance_no = $row_man_entry->h_day;
					}
				}
				else
				{
					$no_working_days 	= 0;
					$holiday 			= 0;
					$weeked 			= 0;
					$attend 			= 0;
					$absent 			= 0;
					$total_leave 		= 0;
					$none_work_day 		= 0;
					$night_allowance_no = 0;
					$late_count 		= 0;
					$holiday_allowance_no= 0;
				}
				
				//=========================Calculate Payable Days=========================================
				$total_holiday 	= $weeked + $holiday;
				$pay_days 		= $attend + $total_holiday + $total_leave;
				
				$data["att_days"] 		= $attend;
				$data["absent_days"] 	= $absent;
				$data["c_l"] 			= $total_leave;
				$data["s_l"] 			= 0;
				$data["e_l"] 			= 0;
				$data["m_l"] 			= 0;
				$data["holidy"] 		= $holiday;
				$data["weeked"] 		= $weeked;
				$data["holiday_or_weeked"] = $total_holiday;
				$data["pay_days"] 		= $pay_days;
				
				//============================== Start Calculate Payable Basic Salary And Absent Deduction================================
				//=========================================================================================================================
				$resign_check 	= $this->resign_check($emp_id, $process_start_date,$process_end_date);
				$left_check 	= $this->left_check($emp_id, $process_start_date,$process_end_date);
				if($resign_check != false)
				{
					$resign_after_absent 			= $this->get_no_of_days($resign_check,$process_end_date);
					$data["before_after_absent"] 	= $resign_after_absent;
					
				}
				else if($process_start_month == $join_month || $process_end_month == $join_month )
				{
					$doj_before_absent 				= $this->get_no_of_days($process_start_date, $doj);					
					$data["before_after_absent"] 	= $doj_before_absent;
				}
				else if($left_check != false)
				{
					$resign_after_absent 			= $this->get_no_of_days($left_check,$doj);
					$data["before_after_absent"] 	= $resign_after_absent;
				}
				else
				{
					$data["before_after_absent"] 	= 0;
				}
				
				if($pay_days != 0)
				{
					if($process_start_month == $join_month or $process_end_month == $join_month or $resign_check != false or $left_check != false)
					{
						$before_after_deduct = ($gross_sal / $num_of_days) * $data["before_after_absent"];
						$deduct = $basic_sal / $num_of_days * $absent;
						$deduct = round($deduct + $before_after_deduct);
					}
					else
					{
						$deduct = $basic_sal / $num_of_days * $absent;
						$deduct = round($deduct);
					}
				}
				else
				{
					$deduct = $gross_sal;
				}
				$data["abs_deduction"] = $deduct;
				
				$payable_basic_sal_payable 		= ( (($basic_sal_payable / $num_of_days) * ($pay_days + $absent)) -  $deduct);
				//$payable_basic_sal_payable 		= (($basic_sal_payable / $num_of_days) * $pay_days  );
				$payable_house_rent_payable 	= (($house_rent_payable / $num_of_days) * ($pay_days + $absent)  );
				$payable_madical_allo_payable 	= (($madical_allo_payable / $num_of_days) * ($pay_days + $absent)  );
				
				$payable_basic_sal 		= round($payable_basic_sal_payable);
				$payable_house_rent 	= round($payable_house_rent_payable);
				$payable_madical_allo 	= round($payable_madical_allo_payable);
				//============================== End Calculate Payable Basic Salary And Absent Deduction================================
				
				//========================== Start Calculate Payable Total Salary=============================	
				if($pay_days != 0)
				{
					if($process_start_month == $join_month or $process_end_month == $join_month or $resign_check != false or $left_check != false)
					{
						if($num_of_days == $pay_days)
						{
							$payable_total_sal = $gross_sal;
						}
						else
						{
							$payable_total_sal = round($gross_sal - $deduct);
						}
					}
					else
					{
						if($num_of_days == $pay_days)
						{
							$payable_total_sal = $gross_sal;
						}
						else
						{
							$payable_total_sal = round($gross_sal - $deduct);
						}
					}
				}
				else
				{
					$payable_total_sal = 0;
				}
				$data["payable_basic"] = $payable_basic_sal;
				$data["payable_house_rent"] = $payable_house_rent;
				$data["payable_madical_allo"] = $payable_madical_allo;
				
				$payable_wages = $payable_total_sal;		
				$data["pay_wages"] = $payable_wages;
				//========================== End Calculate Payable Total Salary=============================
				
				//==========================Calculate Attendance Bonus============================
				$deduction_hour_count 	= $this->deduction_hour_count($emp_id,$process_start_date,$process_end_date);
				$late_count 			= $this->get_late_count($emp_id,$process_start_date,$process_end_date);
				$condition_late			= $this->common_model->get_setup_attributes('3');
				$att_bouns_present_day 	= $attend + $weeked;	
				$eligible_att_bonus_days = $num_of_days - $holiday;
							
				if($att_bouns_present_day == $eligible_att_bonus_days and $deduction_hour_count == 0)
				{
					
					/*if($late_count <= $condition_late)
					{
						$att_bouns = $this->att_bouns_cal($emp_id);
					}
					else
					{
						$att_bouns = 0;
					}*/
					$att_bouns = $this->att_bouns_cal($emp_id);
				}
				else
				{
					$att_bouns = 0;
				}
				
				$data["att_bonus"] = $att_bouns;
				
				//==========================Calculate Transport And Lunch Allowance============================
				
				$trans_allaw = 0;
				$data["trans_allaw"] = $trans_allaw;
				
				$lunch_allaw = 0;
				
				
				$data["lunch_allaw"] = $lunch_allaw;
				
				//$others_allaw = $this->others_allaw_cal($emp_id, $salary_month);
				$others_allaw = 0;
				$data["others_allaw"] = $others_allaw;
				
				$total_allaw = $att_bouns + $trans_allaw + $lunch_allaw + $others_allaw;
				$data["total_allaw"] = $total_allaw;
				//========================================= Over Time Calculation ==========================================
				$ot_amount = 0;
				$data["ot_hour"] = 0;
				$data["ot_rate"] = 0;
				$data["ot_amount"] = $ot_amount;
				//========================================= Extra OT Calculation =============================================
				$eot_hour = 0;
				$data["eot_hour"] = $eot_hour;
				$payable_amount = ($payable_wages + $total_allaw + $ot_amount);
				
				$data["gross_pay"] = $payable_amount;
				
				$advance_deduct = $this->advance_loan_deduction($emp_id, $process_end_month);
				$data["adv_deduct"] = $advance_deduct;
				//===========================PROVIDENT FUNND CALCULATION==============================================
				$pf 						= 0;
				$data["provident_fund"] 	= $pf;
				$data["pf_bank_interest"] 	= 0;
				$data["company_pf"] 		= 0;
				$data["update_pf"] 			= 0;
				
				//==================================OTHERS DEDUCTION====================================================
				$others_deduct = 0;
				$data["others_deduct"] = $others_deduct;
				
				$total_deduct = $advance_deduct + $pf + $others_deduct;
				$data["total_deduct"] = $total_deduct;
				
				$pbt = $payable_amount - $total_deduct;
				$data["pbt"] = $pbt;
				
				$tax = 0;
				$data["tax"] = $tax;
				
				$net_pay = $pbt - $tax;
				$data["salary_month"] = $second_half_search_start_date;
				
				//============================Deduction ====================================
				$data["deduct_amount"] = 0;
				$data["deduct_hour"] = 0;
				
				//============================Festival bonus====================================
				$effective_date = $this->get_bonus_effective_date($process_end_month);
				if($effective_date != false){ 
					$service_month = $this->common_model->get_service_month($effective_date,$doj);
					if($service_month >= 0)
					{
						//echo "$emp_id -'$doj' -  M: ".$service_month; echo '<br>';
						$festival_bonus_rule = $this->get_festival_bonus_rule($service_month);
						$festival_bonus = $this->get_festival_bonus($festival_bonus_rule,$gross_sal,$basic_sal);
						//if($emp_id == "AD0078")
						//{echo "$emp_id -'$doj' -  M: ".$service_month." B: $festival_bonus"; echo '<br>';}
					}
					else { $festival_bonus = 0; }
				}else{
					$festival_bonus = 0;
				}
				$data["festival_bonus"] = $festival_bonus;
				//===========================End of Festival bonus==========================
				//$net_pay = $net_pay + $festival_bonus;
				
				//$process_start_date = $process_date['start_date'] ;
				//$process_end_date 	= $process_date['end_date'] ;
				//===================================Production Amount===================================
				//$pd_amount 					= $this->get_pd_amount($emp_id,$second_half_search_start_date);
				
				//$process_start_date = $process_date['start_date'] ;
				//$process_end_date 	= $process_date['end_date'] ;
				
				$pd_amount 					= $this->get_pd_amount($emp_id,$emp_sec_id,$process_start_date,$process_end_date, $year_month);
				
				$pd_amount_bonus_percent 	= $this->get_pd_amount_bonus_percent($pd_amount);
				if($pd_amount_bonus_percent != 0)
				{
					$pd_bonus_amount 			= $this->get_pd_amount_bonus($pd_amount,$pd_amount_bonus_percent);
				}
				else
				{
					$pd_bonus_amount = 0;
				}
				$data["pd_amount"] 			= $pd_amount;
				$data["pd_bonus_percent"] 	= $pd_amount_bonus_percent;
				$data["pd_bonus_amount"] 	= $pd_bonus_amount;

				//===================================None Work Day And Allowance=================================
				//$none_work_day 				= $this->get_no_work_day($emp_id,$process_start_date,$process_end_date);
				$none_work_amount 			= $this->common_model->get_setup_attributes(9);

				$no_work_allowance 			= $none_work_day * $none_work_amount;
				$data["none_work_day"] 		= $none_work_day;
				$data["none_work_allowance"] = $no_work_allowance;
				
				//===================================Night Allowance===================================
				//$night_allowance_no 	= $this->get_night_allowance_no($emp_id,$process_start_date,$process_end_date);
				$night_allowance_rules 	= $this->get_night_allowance_rules($emp_desi_id);
				if($night_allowance_rules != "0")
				{
					$night_allowance_rules_amount 	= 	$this->night_allowance_rules_amount($night_allowance_rules);
					$night_allowance_amount 		=	$night_allowance_rules_amount * $night_allowance_no;
				}
				else
				{
					$night_allowance_no 	= 0;
					$night_allowance_amount = 0;
					$night_allowance_rules_amount 	=  0;
				}
				$data["night_allowance_rate"] = $night_allowance_rules_amount;
				$data["night_allowance_no"] = $night_allowance_no;
				$data["night_allowance"] 	= $night_allowance_amount;
				
				
				//===================================Holiday Allowance===================================
				//$holiday_allowance_no 	= $this->get_holiday_allowance_no($emp_id,$process_start_date,$process_end_date);
				$holiday_allowance_rules 	= $this->get_holiday_allowance_rules($emp_desi_id);
				if($holiday_allowance_rules != "0")
				{
					$holiday_allowance_rules_amount = 	$this->holiday_allowance_rules_amount($holiday_allowance_rules);
					$holiday_allowance_amount 		=	$holiday_allowance_rules_amount * $holiday_allowance_no;
				}
				else
				{
					$holiday_allowance_no 	= 0;
					$holiday_allowance_amount = 0;
					$holiday_allowance_rules_amount =0;
				}
				$data["holiday_allowance_rate"] = $holiday_allowance_rules_amount;
				$data["holiday_allowance_no"] = $holiday_allowance_no;
				$data["holiday_allowance"] 	= $holiday_allowance_amount;
				$stamp 	= 10;
				
				$net_pay = ($pd_amount + $pd_bonus_amount + $no_work_allowance + $night_allowance_amount + $att_bouns + $holiday_allowance_amount)-($advance_deduct);
				
				$data["net_pay"] = $net_pay;
				
				if($net_pay < 1)
				{
					$stamp 	= 0;
				}
				$data["net_pay"] = $net_pay;
				$data["stamp"] = $stamp;
				$data["net"] = $net_pay - $stamp;
				
				//=================Production info==================
				$body_id 		= 1;
				$neck_id 		= 2;
				$complet_id 	= 3;
				$piping_id 		= 4;
				$tack_id 		= 5;
				$placket_id 	= 6;
				$v_neck_id 		= 7;
				$b_iron			=13;
				$b_re_iron		=14;
				$BODY = $this->get_pd_info($emp_id,$emp_sec_id,$process_start_date,$process_end_date,$body_id, $year_month);
				$NECK = $this->get_pd_info($emp_id,$emp_sec_id,$process_start_date,$process_end_date,$neck_id, $year_month);
				
				$COMPLET = $this->get_pd_info($emp_id,$emp_sec_id,$process_start_date,$process_end_date,$complet_id, $year_month);
				$PIPING = $this->get_pd_info($emp_id,$emp_sec_id,$process_start_date,$process_end_date,$piping_id, $year_month);
				
				$TACK = $this->get_pd_info($emp_id,$emp_sec_id,$process_start_date,$process_end_date,$tack_id, $year_month);
				$PLACKET = $this->get_pd_info($emp_id,$emp_sec_id,$process_start_date,$process_end_date,$placket_id, $year_month);
				$V_NECK = $this->get_pd_info($emp_id,$emp_sec_id,$process_start_date,$process_end_date,$v_neck_id, $year_month);
				$b_iron = $this->get_pd_info($emp_id,$emp_sec_id,$process_start_date,$process_end_date,$b_iron, $year_month);
				$b_re_iron = $this->get_pd_info($emp_id,$emp_sec_id,$process_start_date,$process_end_date,$b_re_iron, $year_month);
				if($BODY == "")
				{
					$BODY = 0;
				
				}
				if($NECK == "")
				{
					$NECK = 0;
				}
				if($COMPLET == "")
				{
					$COMPLET = 0;
				}
				if($PIPING == "")
				{
					$PIPING = 0;
				}
				if($TACK == "")
				{
					$TACK = 0;
				}
				if($V_NECK == "")
				{
					$V_NECK = 0;
				}
				if($PLACKET == "")
				{
					$PLACKET = 0;
				}
				if($b_iron == "")
				{
					$b_iron = 0;
				}
				if($b_re_iron == "")
				{
					$b_re_iron = 0;
				}
				//echo "===".$BODY;
				$data['body'] 		= $BODY;
				$data['neck'] 		= $NECK;
				$data['complet'] 	= $COMPLET;
				$data['piping'] 	= $PIPING;
				$data['tack'] 		= $TACK;
				$data['placket'] 	= $PLACKET;
				$data['v_neck'] 	= $V_NECK;
				$data['b_iron'] 	= $b_iron;
				$data['b_re_iron'] 	= $b_re_iron;
				
				$this->db->select("emp_id");
				$this->db->where("emp_id", $emp_id);
				$this->db->where("salary_month", $second_half_search_start_date);
				$query = $this->db->get("pd_pay_scale_sheet");
				if($query->num_rows() > 0 )
				{
					$this->db->where("emp_id",$emp_id);
					$this->db->where("salary_month", $second_half_search_start_date);
					$this->db->update("pd_pay_scale_sheet",$data);
				}
				else
				{
					$this->db->insert("pd_pay_scale_sheet",$data);
				}

			}
		}
		return "Process completed successfully";
	}
	
	function production_info_calculation($emp_id,$emp_sec_id,$process_start_date,$process_end_date)
	{
		$body_id 		= 1;
		$neck_id 		= 2;
		$complet_id 	= 3;
		$piping_id 		= 4;
		$tack_id 		= 5;
		$placket_id 	= 6;
		$v_neck_id 		= 7;
		
		$BODY = $this->pd_salary_report_model->get_pd_info($emp_id,$emp_sec_id,$process_start_date,$process_end_date,$body_id);
		$NECK = $this->pd_salary_report_model->get_pd_info($emp_id,$emp_sec_id,$process_start_date,$process_end_date,$neck_id);
		
		$COMPLET = $this->pd_salary_report_model->get_pd_info($emp_id,$emp_sec_id,$process_start_date,$process_end_date,$complet_id);
		$PIPING = $this->pd_salary_report_model->get_pd_info($emp_id,$emp_sec_id,$process_start_date,$process_end_date,$piping_id);
		
		$TACK = $this->pd_salary_report_model->get_pd_info($emp_id,$emp_sec_id,$process_start_date,$process_end_date,$tack_id);
		$PLACKET = $this->pd_salary_report_model->get_pd_info($emp_id,$emp_sec_id,$process_start_date,$process_end_date,$placket_id);
		$V_NECK = $this->pd_salary_report_model->get_pd_info($emp_id,$emp_sec_id,$process_start_date,$process_end_date,$v_neck_id);
		
		$data['BODY'] 		= $BODY;
		$data['NECK'] 		= $NECK;
		$data['COMPLET'] 	= $COMPLET;
		$data['PIPING'] 	= $PIPING;
		$data['TACK'] 		= $TACK;
		$data['PLACKET'] 	= $PLACKET;
		$data['V_NECK'] 	= $V_NECK;
		
		return $data;
	}
	
	
	function holiday_allowance_rules_amount($holiday_allowance_rules)
	{
		// $night_allowance_rules_amount = $this->db->where("designation_id",$emp_desi_id)->get('pr_night_allowance_level')->row()->rules_id;
		//return $night_allowance_rules_amount;
		$this->db->select('allowance_amount');
		$this->db->from('pr_holiday_allowance_rules');
		$this->db->where("rules_id", $holiday_allowance_rules);
		$query = $this->db->get();
		if($query->num_rows()>0)
		{
			$row = $query->row();
			$allowance_amount = $row->allowance_amount;
		}
		else
		{
			$allowance_amount = 0;
		}
		
		return $allowance_amount;
	}
	function get_holiday_allowance_rules($emp_desi_id)
	{
		$this->db->select('rules_id');
		$this->db->from('pr_holiday_allowance_level');
		$this->db->where("designation_id", $emp_desi_id);
		$query = $this->db->get();
		if($query->num_rows()>0)
		{
			$row = $query->row();
			$rules_id = $row->rules_id;
		}
		else
		{
			$rules_id = 0;
		}
		
		return $rules_id;
	}
	function get_holiday_allowance_no($emp_id,$process_start_date,$process_end_date)
	{
		$this->db->select('SUM(holiday_allowance) AS holiday_allowance');
		$this->db->from('pr_emp_shift_log');
		$this->db->where("emp_id", $emp_id);
		$this->db->where("shift_log_date BETWEEN '$process_start_date' and '$process_end_date'");
		$query = $this->db->get();
		$row = $query->row();
		$holiday_allowance = $row->holiday_allowance;
		
		return $holiday_allowance;
	}
	function get_pd_amount_bonus($pd_amount,$pd_amount_bonus_percent)
	{
		return $pd_amount_bonus = round(($pd_amount * $pd_amount_bonus_percent)/100,2);
		
	}
	function get_pd_amount_bonus_percent($pd_amount)
	{
		//$pd_amount="";
		$this->db->select('bonus_percent');
		$this->db->from('pd_production_bonus_rules');
		$this->db->where('first_amount <=', $pd_amount);
		$this->db->where('second_amount >=', $pd_amount);
		$query = $this->db->get();
		if($query->num_rows()>0)
		{
			$row = $query->row();
			$bonus_percent = $row->bonus_percent;
		}
		else
		{
			$bonus_percent = 0;
		}
		return $bonus_percent;
	}
	function night_allowance_rules_amount($night_allowance_rules)
	{
		// $night_allowance_rules_amount = $this->db->where("designation_id",$emp_desi_id)->get('pr_night_allowance_level')->row()->rules_id;
		//return $night_allowance_rules_amount;
		$this->db->select('allowance_amount');
		$this->db->from('pr_night_allowance_rules');
		$this->db->where("rules_id", $night_allowance_rules);
		$query = $this->db->get();
		if($query->num_rows()>0)
		{
			$row = $query->row();
			$allowance_amount = $row->allowance_amount;
		}
		else
		{
			$allowance_amount = 0;
		}
		
		return $allowance_amount;
	}
	function get_night_allowance_rules($emp_desi_id)
	{
		$this->db->select('rules_id');
		$this->db->from('pr_night_allowance_level');
		$this->db->where("designation_id", $emp_desi_id);
		$query = $this->db->get();
		if($query->num_rows()>0)
		{
			$row = $query->row();
			$rules_id = $row->rules_id;
		}
		else
		{
			$rules_id = 0;
		}
		
		return $rules_id;
	}
	
	function get_night_allowance_no($emp_id,$process_start_date,$process_end_date)
	{
		$this->db->select('SUM(night_allowance) AS night_allowance');
		$this->db->from('pr_emp_shift_log');
		$this->db->where("emp_id", $emp_id);
		$this->db->where("shift_log_date BETWEEN '$process_start_date' and '$process_end_date'");
		$query = $this->db->get();
		$row = $query->row();
		$night_allowance = $row->night_allowance;
		
		return $night_allowance;
	}
	function get_no_work_day($emp_id,$process_start_date,$process_end_date)
	{
		$this->db->select('SUM(pd_no_work_check) AS pd_no_work_day');
		$this->db->from('pr_emp_shift_log');
		$this->db->where("emp_id", $emp_id);
		$this->db->where("shift_log_date BETWEEN '$process_start_date' and '$process_end_date'");
		$query = $this->db->get();
		$row = $query->row();
		$pd_no_work_day = $row->pd_no_work_day;
		return $pd_no_work_day;
	}
	function get_no_work_allowance($emp_id,$process_start_date,$process_end_date)
	{
		$this->db->select('SUM(pd_no_work_check) AS pd_no_work_day');
		$this->db->from('pr_emp_shift_log');
		$this->db->where("emp_id", $emp_id);
		$this->db->where("shift_log_date BETWEEN '$process_start_date' and '$process_end_date'");
		$query = $this->db->get();
		$row = $query->row();
		$pd_no_work_day = $row->pd_no_work_day;
		$amount= $this->common_model->get_setup_attributes(9);
		$no_work_allowance = $pd_no_work_day * $amount;
		return $no_work_allowance;
	}
	function get_weekend_days($weekend,$days,$start_date)
	{
	   $no_weekends = 0;
	   for($i=0;$i<$days + 1;$i++)
	   {
		   $date = strtotime(date("Y-m-d", strtotime($start_date)) . " +$i day");

		   $new_date = date("D",$date);

		   if($new_date == $weekend)
		   {
				 $no_weekends = $no_weekends +1;
		   }
	   }
	   return $no_weekends;
	}
	/*function get_pd_amount($emp_id,$second_half_search_start_date)
	{
		//$emp_id = "010011";
		$this->db->select_sum('amount');
		$this->db->where("emp_id", $emp_id);
		$this->db->where('month',$second_half_search_start_date);
		$query = $this->db->get('pd_production_summary_logs');
		
		$row = $query->row();
		$sum_pd_amount = $row->amount;
		if($sum_pd_amount == "")
		{
			$sum_pd_amount = 0;
		}
		return $sum_pd_amount;
	}*/
	function get_pd_amount($emp_id,$emp_sec_id,$process_start_date,$process_end_date, $year_month)
	{
		$pd_log_table = $this->common_model->get_pd_log_table_monthly($year_month);
		$amount = 0;
		$this->db->select('SUM(quantity) AS total_quantity,process_id,article_id,section_id,size_id,section_id');
		$this->db->where('emp_id', $emp_id);
		$this->db->where('section_id', $emp_sec_id);
		$where = "date BETWEEN '$process_start_date' and '$process_end_date'";
		$this->db->where($where);
		$this->db->group_by("process_id");
		$this->db->group_by("article_id");
		$this->db->group_by("color_id");
		$this->db->group_by("size_id");
		$query = $this->db->get("$pd_log_table");
		
		
		foreach($query->result() as $style_summary)
		{
			$article_id 		= $style_summary->article_id;
			$section_id 		= $style_summary->section_id;
			$process_id 		= $style_summary->process_id;
			$size_id 			= $style_summary->size_id;
			$total_quantity 	= $style_summary->total_quantity;
			$unit_price 		= $this->emp_wise_entry_model->get_price($article_id,$section_id,$process_id,$size_id);
			$amount 			= $amount + ($unit_price*$total_quantity);
		}
		$pd_amount = round(($amount),2);
		return $pd_amount;
	}
	
	function get_bonus_effective_date($salary_month)
	{
		$this->db->select('effective_date');
		$this->db->like('effective_date',$salary_month);
		$query = $this->db->get('pr_bonus_rules');
		//echo $this->db->last_query();
		if($query->num_rows() > 0 ){
			$row = $query->row();
			return $effective_date =  $row->effective_date;
		}else{
			return false;
		}
	}
	
	function get_service_month($effective_date,$doj)
	{
		$date_diff 		= strtotime($effective_date)-strtotime($doj);
		//DATE TO DATE RULE
		//return $month 	= floor(($date_diff)/2592000);
		
		//MONTH TO MONTH RULE
		return $month 	= ceil(($date_diff)/2628000);
	}
	
	function get_festival_bonus_rule($service_month)
	{
		$data = array();
		$this->db->select('*');
		$this->db->where('bonus_first_month <=', $service_month); 
		$this->db->where('bonus_second_month >', $service_month); 
		$this->db->order_by('effective_date','DESC');
		$this->db->limit(1);
		$query = $this->db->get('pr_bonus_rules');
		//echo $this->db->last_query();
		//echo 'R:'.$num = $query->num_rows().'|';
		$row = $query->row();
		if($query->num_rows() != 0)
		{
			$data['bonus_amount'] 		= $row->bonus_amount;
			$data['amount_fraction'] 	= $row->bonus_amount_fraction;
			$data['bonus_percent'] 		= $row->bonus_percent;
		}
		return $data;
	}
	
	function get_festival_bonus($festival_bonus_rule,$gross_sal,$basic_sal)
	{
		$bonus_amount 		= $festival_bonus_rule['bonus_amount'];
		$amount_fraction 	= $festival_bonus_rule['amount_fraction'];
		$bonus_percent 		= $festival_bonus_rule['bonus_percent']; 
		
		if($bonus_amount == "Gross")
		{
			$salary_for_bonus = $gross_sal;
		}
		else
		{
			$salary_for_bonus = $basic_sal; 
		}
		
		$pre_festival_bonus = $salary_for_bonus * $amount_fraction;
		$festival_bonus = round((($pre_festival_bonus * $bonus_percent)/100));
		return $festival_bonus;
	}
	function advance_loan_deduction($emp_id, $salary_month)
	{
		$search_year_month = $salary_month;
		$salary_month = "$salary_month-01";
				
		$this->db->select("*");
		$this->db->where("emp_id", $emp_id);
		$this->db->where("loan_status", '1');
		//$this->db->like("loan_date",$search_year_month);
		$query = $this->db->get("pr_advance_loan");
		
		if( $query->num_rows() > 0)
		{
			foreach($query->result() as $rows)
			{
				$loan_id	= $rows->loan_id;
				$loan_amt 	= $rows->loan_amt; 	
				$pay_amt  	= $rows->pay_amt;
			}
			
			$this->db->select("emp_id,pay_amount");
			$this->db->where("emp_id", $emp_id);
			$this->db->where("loan_id", $loan_id);
			$this->db->like("pay_month", $salary_month);
			$query1 = $this->db->get("pr_advance_loan_pay_history");
			if( $query1->num_rows() == 0)
			{
				$this->db->select_sum("pay_amount");
				$this->db->where("emp_id", $emp_id);
				$this->db->where("loan_id", $loan_id);
				$query2 = $this->db->get("pr_advance_loan_pay_history");
				//echo $this->db->last_query();
				
				if( $query2->num_rows() > 0)
				{
					$row = $query2->row();
					$total_pay_amount = $row->pay_amount;
				}
				else
				{
					$total_pay_amount = 0;
				}
				
				$rest_loan_amount = $loan_amt - $total_pay_amount;
					
				if($rest_loan_amount > $pay_amt)
				{
					$data = array(
									'pay_id' 	=> '',
									'loan_id' 	=> $loan_id,
									'emp_id'  	=> $emp_id,
									'pay_amount'=> $pay_amt,
									'pay_month' => $salary_month
								);
					if($this->db->insert("pr_advance_loan_pay_history", $data))
					{
						return $pay_amt;
					}
				}
				else
				{
					$data = array(
									'pay_id' 	=> '',
									'loan_id' 	=> $loan_id,
									'emp_id'  	=> $emp_id,
									'pay_amount'=> $rest_loan_amount,
									'pay_month' => $salary_month
								);
					if($this->db->insert("pr_advance_loan_pay_history", $data))
					{
						$this->db->select_sum("pay_amount");
						$this->db->where("emp_id", $emp_id);
						$this->db->where("loan_id", $loan_id);
						$query2 = $this->db->get("pr_advance_loan_pay_history");
						//echo $this->db->last_query();
						
						if( $query2->num_rows() > 0)
						{
							$row = $query2->row();
							$total_pay_amount = $row->pay_amount;
							
							if($total_pay_amount == $loan_amt)
							{
								$data = array(
											'loan_status' => 2
											);
								$this->db->where("emp_id", $emp_id);
								$this->db->where("loan_id", $loan_id);
								$this->db->update("pr_advance_loan", $data);
							}
						}
						return $rest_loan_amount;
					}
				}
				
			}
			else
			{
				$row = $query1->row();
				$pay_amount = $row->pay_amount;
				return $pay_amount;
			}
		}
		else
		{
			$this->db->select("*");
			$this->db->where("emp_id", $emp_id);
			$this->db->where("loan_status", '2');
			$this->db->like("loan_date",$search_year_month);
			$query = $this->db->get("pr_advance_loan");
			
			if( $query->num_rows() > 0)
			{
				foreach($query->result() as $rows)
				{
					$loan_id	= $rows->loan_id;
					$loan_amt 	= $rows->loan_amt; 	
					$pay_amt  	= $rows->pay_amt;
				}
			
				$this->db->select("emp_id,pay_amount");
				$this->db->where("emp_id", $emp_id);
				$this->db->where("loan_id", $loan_id);
				$this->db->like("pay_month", $salary_month);
				$query1 = $this->db->get("pr_advance_loan_pay_history");
				if( $query1->num_rows() == 0)
				{
					return 0;
				}
				else
				{
					$row = $query1->row();
					$pay_amount = $row->pay_amount;
					return $pay_amount;
				}
			}
			else
			{
				return 0;
			}
		}
	}
	function others_allaw_cal($emp_id, $salary_month)
	{
		$this->db->select("payment_amount");
		$this->db->where("emp_id", $emp_id);
		$this->db->like("payment_month",$salary_month);
		$query = $this->db->get("pr_payment");
		//echo $this->db->last_query();
		if($query->num_rows > 0)
		{
			$row = $query->row();
			return $row->payment_amount;
		}
		else
		{
			return 0;
		}
	}
	function transport_cal($emp_id)
	{
		$this->db->select("transport");
		$this->db->from("pr_emp_com_info");
		$this->db->where("emp_id", $emp_id);
		$query = $this->db->get();
		$row = $query->row();
		if($row->transport == 0 )
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	function lunch_allaw_cal($emp_id)
	{
		$this->db->select("lunch");
		$this->db->from("pr_emp_com_info");
		$this->db->where("emp_id", $emp_id);
		$query = $this->db->get();
		$row = $query->row();
		if($row->lunch == 0 )
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	function att_bouns_cal($emp_id)
	{
		$this->db->select("pr_attn_bonus.ab_rule");
		$this->db->from("pr_attn_bonus");
		$this->db->from("pr_emp_com_info");
		$this->db->where("pr_emp_com_info.emp_id", $emp_id);
		$this->db->where("pr_emp_com_info.att_bonus = pr_attn_bonus.ab_id");
		$query = $this->db->get();
		$row = $query->row();
		return $row->ab_rule;
	}
	function get_late_count($emp_id,$process_start_date,$process_end_date)
	{
		$this->db->where("shift_log_date BETWEEN '$process_start_date' and '$process_end_date'");
		$this->db->where('emp_id', $emp_id);
		$this->db->where('late_status', '1');
		$this->db->from('pr_emp_shift_log');
		return  $this->db->count_all_results();
	
	}
	function deduction_hour_count($emp_id,$process_start_date,$process_end_date)
	{
		$this->db->select('SUM(deduction_hour) AS deduction_hour_count');	
		$this->db->where('emp_id', $emp_id);
		$this->db->where("shift_log_date BETWEEN '$process_start_date' and '$process_end_date'");
		$query = $this->db->get('pr_emp_shift_log');
		$row = $query->row();
		return $deduction_hour_count = $row->deduction_hour_count;
	}
	function left_check($emp_id, $process_start_date,$process_end_date)
	{
		$where = "left_date BETWEEN '$process_start_date' and '$process_end_date'";
		//$where = "trim(substr(resign_date,1,7)) = '$salary_month'";
		$this->db->select('left_date');
		$this->db->where('emp_id', $emp_id);
		$this->db->where($where);
		$query = $this->db->get('pr_emp_left_history');
		//echo $this->db->last_query();
		if($query->num_rows() == 0)
		{
			return false;
		}
		else
		{
			$left_date = $query->row()->left_date;
			return $left_date;
		}	
	}
	function resign_check($emp_id, $process_start_date,$process_end_date)
	{
		$where = "resign_date BETWEEN '$process_start_date' and '$process_end_date'";
		//$where = "trim(substr(resign_date,1,7)) = '$salary_month'";
		$this->db->select('resign_date');
		$this->db->where('emp_id', $emp_id);
		$this->db->where($where);
		$query = $this->db->get('pr_emp_resign_history');
		//echo $this->db->last_query();
		if($query->num_rows() == 0)
		{
			return false;
		}
		else
		{
			$resign_date = $query->row()->resign_date;
			return $resign_date;
		}	
	}
	function leave_db($emp_id,$start_date,$end_date, $leave_type)
	{
		$where = "trim(substr(start_date,1,10)) BETWEEN '$start_date' and '$end_date'";
		
		$this->db->select('start_date');
		$this->db->where("emp_id",$emp_id);
		$this->db->where("leave_type",$leave_type);
		$this->db->where($where);
		
		$query = $this->db->get('pr_leave_trans');
		
		return $query->num_rows();
	}
	
	function attendance_check($emp_id,$present_status,$num_of_days, $start_date)
	{
		$search_date =trim(substr($start_date,0,7));
		$loop_date = trim(substr($start_date,8,2));
		$this->db->select("");
		$this->db->where("emp_id",$emp_id);
		$this->db->like("att_month",$search_date);
		$query = $this->db->get("pr_attn_monthly");
		//echo $this->db->last_query();
		$count = 0;
		foreach($query->result_array() as $rows => $value)
		{
			for($i=$loop_date; $i<= $num_of_days ; $i++)
			{
				$idate = date("d", mktime(0, 0, 0, 0, $i, 0));
				$date="date_$idate";
				
				if($value[$date] == "$present_status")
				{
					$count++;
				}
			}
		}
		return $count;
	}
	
	function attendance_check_first_half($emp_id,$present_status,$num_of_days, $start_date)
	{
		//echo "$present_status=> $num_of_days, $start_date###";
		$search_date =trim(substr($start_date,0,7));
		$loop_date = trim(substr($start_date,8,2));
		$this->db->select("");
		$this->db->where("emp_id",$emp_id);
		$this->db->like("att_month",$search_date);
		$query = $this->db->get("pr_attn_monthly");
		//echo $this->db->last_query();
		$count = 0;
		$i=$loop_date;
		foreach($query->result_array() as $rows => $value)
		{
			
			for($j=1; $j<= $num_of_days ; $j++)
			{
				
				$idate = date("d", mktime(0, 0, 0, 0, $i, 0));
				$date="date_$idate";
				
				if($value[$date] == "$present_status")
				{
					$count++;
				}
				$i = $i + 1;
			}
		}
		return $count;
	}
	
	function get_no_of_days($start_date,$end_date)
	{
		$start = strtotime($start_date);
		$end = strtotime($end_date);
		$no_of_days = ceil(abs($end - $start) / 86400) + 1;
		return  $no_of_days;
	}
	function table_exists_check($table_name)
	{
		if(!$this->db->table_exists($table_name))
		{
			return "False";
		}
		else
		{
			return "True";
		}
	}
	function get_table_name($date)
	{
		$date = strtotime($date);
		$year = date('Y', $date);
		$month = date('m', $date);
		$table_name = "att_".$year."_".$month;
		return $table_name;
	}
	
	function get_pd_info($emp_id,$sec_id,$process_start_date,$process_end_date,$process_id, $year_month)
	{
		$pd_log_table = $this->common_model->get_pd_log_table_monthly($year_month);
		
		$this->db->select('SUM(quantity) AS total_quantity');
		$this->db->where('emp_id', $emp_id);
		$this->db->where('section_id', $sec_id);
		$this->db->where('process_id', $process_id);

		$where = "date BETWEEN '$process_start_date' and '$process_end_date'";
		$this->db->where($where);
		$query = $this->db->get("$pd_log_table");
		//echo $this->db->last_query();
		$num_rows=$query->num_rows();
		if($num_rows ==0)
		{
			return $total_quantity = 0;
		}
		foreach($query->result() as $style_summary)
		{
			$total_quantity 	= $style_summary->total_quantity;
		}
		return $total_quantity;
	}
		
	
}
?>