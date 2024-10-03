<?php
class Payroll_con extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
		/* Standard Libraries */
		$this->load->model('processdb');
		$this->load->helper('form');
		$this->load->model('common_model');
		set_time_limit(0);
		ini_set("memory_limit","512M");
		
		if($this->session->userdata('logged_in')==FALSE)
		{
			redirect("authentication");
		}
	}
	
	function index()
	{
		$this->load->view('home');
	}
	
	function main_header()
	{
		$this->load->view('header');
	}
	
	function utree()
	{
		$this->load->view('utree');
	}
	
	function first_body()
	{
		$this->load->view('id_proxi_ins');
	}
	
	function footer()
	{
		$this->load->view('footer');
	}
	function personal_info_view()
	{
		if($this->session->userdata('logged_in')==FALSE)
		{
			$this->load->view('login_message');
		}
		else
		{
			if($this->input->post('pi_save') != '')
			{
				$this->per_info();
			}
			elseif($this->input->post('pi_edit') != '')
			{
				$this->per_update();
			}
			$this->load->view('form/personal_info');
		}
	}
	
	function per_info()
	{
		$result = $this->processdb->insertdb();
		echo $result;
	}
	
	
	function personal_info_view1()
	{

		if($this->session->userdata('logged_in')==FALSE)
		{
			$this->load->view('login_message');
		}
		else
		{
			if($this->input->post('pi_save') != '')
			{
				
				$this->per_info1();
			}
			elseif($this->input->post('pi_edit') != '')
			{
				
				$this->per_update1();
			}
			$this->load->view('form/all_info');
		}
	}
	
	function all()
	{
		
		if($this->session->userdata('logged_in')==FALSE)
		{
			$this->load->view('login_message');
		}
		else
		{
			if($this->input->post('pi_save') != '')
			{
				$this->per_info();
			}
			elseif($this->input->post('pi_edit') != '')
			{
				$this->per_update();
			}
			$this->load->view('form/all_info');
		}
	
	}
	
	function company_info_view()
	{
		if($this->session->userdata('logged_in')==FALSE)
		$this->load->view('login_message');
		else
		$this->load->view('form/company_info');
	}
	
	function skill_info_view()
	{
		if($this->session->userdata('logged_in')==FALSE)
		$this->load->view('login_message');
		else
		$this->load->view('form/edu_skilll_info');
	}
	
	function configuration()
	{
		if($this->session->userdata('logged_in')==FALSE)
		$this->load->view('login_message');
		else
		$this->load->view('form/configuration');
	}
	
	function attn_bonus()
	{
		if($this->session->userdata('logged_in')==FALSE)
		$this->load->view('login_message');
		else
		$this->load->view('form/attn_bonus');
	}
	
	function salary_grade()
	{
		if($this->session->userdata('logged_in')==FALSE)
		$this->load->view('login_message');
		else
		$this->load->view('form/salary_grade');
	}
	
	function shift_change()
	{
		if($this->session->userdata('logged_in')==FALSE)
		$this->load->view('login_message');
		else
		$this->load->view('form/shift_change');
	}
	
	function manual_entry()
	{
		if($this->session->userdata('logged_in')==FALSE)
		$this->load->view('login_message');
		else
		$this->load->view('form/manual_entry');
	}
	
	function attn_process()
	{
		if($this->session->userdata('logged_in')==FALSE)
		$this->load->view('login_message');
		else
		$this->load->view('form/attn_process');
	}
	
	/*function salary_process()
	{
		if($this->session->userdata('logged_in')==FALSE)
		$this->load->view('login_message');
		else
		$this->load->view('form/salary_process');
	}*/
	
	function sal_summary_report()
	{
		if($this->session->userdata('logged_in')==FALSE)
		$this->load->view('login_message');
		else
		$this->load->view('form/salary_summary');
	}
	
	/*function advance_loan()
	{
		if($this->session->userdata('logged_in')==FALSE)
		$this->load->view('login_message');
		else
		$this->load->view('form/advance_loan');
	}*/
	
	function weekend_holiday()
	{
		if($this->session->userdata('logged_in')==FALSE)
		$this->load->view('login_message');
		else
		$this->load->view('form/weekend_holiday');
	}
	
	/*function grid_entry_system()
	{
		if($this->session->userdata('level')== 0 || $this->session->userdata('level')== 1)
		{
			$this->load->view('grid_entry_system');
		}
		elseif($this->session->userdata('level')==2)
		{
			$this->load->view('grid_entry_system_for_user');
		}
	}*/
	
	/*function leave_transation()
	{
		if($this->session->userdata('logged_in')==FALSE)
		$this->load->view('login_message');
		else
		$this->load->view('form/leave_transation');
	}*/
		
	function per_info1()
	{
		$data = $this->processdb->insertdb1();
		
	}
	function save_deptname()
	{
		$result = $this->processdb->save_deptname();
		echo $result;
	}
	
	function check_id()
	{
		$result = $this->processdb->check_id_db();
		echo $result;
	}
	function save_sectionname()
	{
		$result = $this->processdb->save_sectionname();
		echo $result;
	}
	
	function per_update()
	{
		$result = $this->processdb->updatedb();
		echo $result;
	}
	function per_update1()
	{
		$result = $this->processdb->updatedb1();
		echo $result;
	}
	function update_deptname()
	{
		$result = $this->processdb->update_deptname();
		//echo $result;
	}
	
	function update_sectionname()
	{
		$result = $this->processdb->update_sectionname();
		echo $result;
	}
	
	function per_delete()
	{
		$result = $this->processdb->deletedb();
		echo $result;
	}
	
	function delete_deptname()
	{
		$result = $this->processdb->delete_deptname();
		echo $result;
	}
	
	function delete_sectionname()
	{
		$result = $this->processdb->delete_sectionname();
		echo $result;
	}
	function rename_empid()
	{
		$result = $this->processdb->rename_empid();
		echo $result;
	}
	function search()
	{
		$result = $this->processdb->search();
		//echo $result;
	}
	
	function search_dept_name()
	{
		$result = $this->processdb->search_dept_name();
		echo $result;
	}
	
	function search_section_name()
	{
		$result = $this->processdb->search_section_name();
		echo $result;
	}
	
	//==========================================================================
	function com_info_insert()
	{
		$result = $this->processdb->com_info_insert();
		echo $result;
	}
	
	function com_info_edit()
	{
		$result = $this->processdb->com_info_edit();
		echo $result;
	}
	
	function com_info_delete()
	{
		$result = $this->processdb->com_info_delete();
		echo $result;
	}
	
	function com_info_search()
	{
		$result = $this->processdb->com_info_search();
		echo $result;
	}
	
	function com_info_search1()
	{
		$result = $this->processdb->com_info_search1();
		echo $result;
	}
	
	function dept_search()
	{
		$result = $this->processdb->dept_search($this->input->post('dept'));
		echo $result;
	}
	
	function section_search()
	{
		$result = $this->processdb->section_search();
		echo $result;
	}
	
	function desig_search()
	{
		$result = $this->processdb->desig_search($this->input->post('dept'));
		echo $result;
	}
	
	function grade_search()
	{
		$result = $this->processdb->grade_search();
		echo $result;
	}
	
	function empstat_search()
	{
		$result = $this->processdb->empstat_search();
		echo $result;
	}
	
	function empshift_search()
	{
		$result = $this->processdb->empshift_search();
		echo $result;
	}
	
	function attbonus_search()
	{
		$result = $this->processdb->attbonus_search();
		echo $result;
	}
	
	function dept()
	{
		$result = $this->processdb->com_all_info();
		echo $result;
	}
	
	
	function manual_atten_co()
	{
		$result = $this->processdb->manual_atten_db();
		echo $result;
	}
	//===============================sayed start========================
	function com_info()
	{
		$result = $this->processdb->com_insertdb();
		echo $result;
	}
	
	//--------------------edu + skill table insert----------------Start
	function edu_skill_insert()
	{
		$result = $this->processdb->edu_skill_insert();
		echo $result;
	}
	//------------------------------end--------------------------------
	//------------------edu and skill search--------------------------
	function ajaxSearch_edu_skill()
	{
		$result = $this->processdb->search_edu_sk();
		//echo $result;
	}
	
	//--------------------end----------------------------------------
	
	
	
	//------------------------start education update--------------------
	function edu_update()
	{
		$result = $this->processdb->update_edu_db();
	}
	
	//-----------------------end eduvationupdate---------------------
	
	//-------------------------------start edu delete----------------------
	function ajax_edu_delete()
	{
		$result = $this->processdb->edu_deletedb();
		echo $result;
	}
	//----------------------------------end---------------------------------
	
	
	//------------------------Grade table----------------------------------
	
	//------------------------insert-----------------------------------------
	function grade_insert()
	{
		$result = $this->processdb->grade_dbinsert();
		echo $result;
	}
	
	function grade_update()
	{
		$result = $this->processdb->update_grade_db();
	}
	
	function ajaxSearch_con_grade()
	{
	
		$result = $this->processdb->grade_db_search();
	}
	
	function ajax_grade_delete()
	{
		$result = $this->processdb->grade_deletedb();
		echo $result;
	}
	
	//---------------------insert department-------------------
	function department_insert()
	{
		$result = $this->processdb->department_dbinsert();
		echo $result;
	}
	
	//===============================end ============================
	
	//========================START Payscale Sheet Process=================
	
	/*function process()
	{
		//echo "Start Date = ".$start_date = microtime(true);
		$month = $this->input->post('month');
		$year = $this->input->post('year');
		
		//$month = "12";
		//$year = "2011";
		//$input_date = "$year-$month";
		$result = $this->processdb->pay_sheet($year, $month);
		if($result == "Process completed successfully")
		{
			echo $result;
		}
		else
		{
			echo $result;		
		}
		//echo "<br> End Date = ".$end_date = microtime(true);
		//echo "<br> Duration = ".$time = $end_date - $start_date;
	}*/
	
	//========================END Payscale Sheet Process=================
	
	//========================Start Salary Summary=================
	function salary_summary()
	{
		$salary_month = $this->uri->segment(3);
		$data["values"] = $this->processdb->salary_summary($salary_month);
		$data["salary_month"] = $salary_month; 
		//print_r($data);
		$this->load->view('salary_summary',$data);
	}
	//========================End Salary Summary=================
	
	//=======================find late=================================
	function find_late()
	{
		$start_date = $this->uri->segment(3);
		$end_date = $this->uri->segment(4);
		//echo "<br>".$this->uri->segment(5);
		$data["late"]= $this->processdb->late_db_find($start_date,$end_date);
		
	
		$this->load->view('display',$data);
	}
	
	function find_leave()
	{
		$data["late"]= $this->processdb->leave_db();
		//$this->load->view('display',$data);
	}
	function show_project()
	{
		echo "sayed";
	}
	function late_commer_report()
	{
		$start_date = $this->uri->segment(3);
		$end_date = $this->uri->segment(4);
		//echo "<br>".$this->uri->segment(5);
		$data["late"]= $this->processdb->late_commer_report_db($start_date,$end_date);
			
		$this->load->view('display',$data);
	}
	function absent_report()
	{
		$year = $this->uri->segment(3);
		$month = $this->uri->segment(4);
		//echo "<br>".$this->uri->segment(5);
		$data["late"]= $this->processdb->absent_report_db($start_date,$end_date);
			
		$this->load->view('display',$data);
	}
	
	function daily_absent()
	{
		/*$month = $this->uri->segment(3);
		$year = $this->uri->segment(4);	*/	
		
		$date = $this->input->post('p_start_date');
		
		$input_date = date("Y-m-d", strtotime($date)); 
		//$month = $this->input->post('month');
		//$year = $this->input->post('year');
		
		//$date = "01";
		//$month = "06";
		//$year = "2011";
		//$input_date = date("Y-m-d", mktime(0, 0, 0, $month, $date, $year));
		
		//$input_date = "$year-$month-$date";
		$this->db->trans_start();
		$data = $this->processdb->daily_absent_db($input_date);
		$this->db->trans_complete();
			
		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			echo "Process failed";
		}
		else
		{
			$this->db->trans_commit();
			if(is_array($data))
			{
				echo "Process completed sucessfully";
			}
			else
			{
				echo $data;
			}
		}
	}
	
	function continuous_report()
	{
		$start_date = $this->uri->segment(3);
		$end_date = $this->uri->segment(4);
		$year_month = $this->uri->segment(5);
		$present_status= $this->uri->segment(6);
		$col_desig = $this->uri->segment(7);
		$col_line = $this->uri->segment(8);
		$col_section = $this->uri->segment(9);
		$col_dept = $this->uri->segment(10);
		$col_all = $this->uri->segment(11);
		
		$status="Present Report from date $start_date to date  $end_date";
	
		$data["values"] = $this->processdb->continuous_report($present_status,$status, $year_month, $col_desig, $col_line, $col_section, $col_dept, $col_all);
		
		if($present_status =="A")
		{
			$present_status = "Absent";
		}
		elseif($present_status =="P")
		{
			$present_status = "Present";
		}
		elseif($present_status =="L")
		{
			$present_status = "Leave";
		}
		
		$start_date = $year_month."-".$start_date;
		$end_date = $year_month."-".$end_date;
		
		$data["status"] = $present_status;
		$data["start_date"] = $start_date;
		$data["end_date"] = $end_date;
		//print_r($data);
		if(is_string($data["values"]))
		{
			echo $data["values"];
		}
		else
		{
			$this->load->view('continuous_report',$data);
		}
		
		
		
	}
	
	function continuous_late_report()
	{
		$start_date = $this->uri->segment(3);
		$end_date = $this->uri->segment(4);
		$year_month = $this->uri->segment(5);
		$col_desig = $this->uri->segment(6);
		$col_line = $this->uri->segment(7);
		$col_section = $this->uri->segment(8);
		$col_dept = $this->uri->segment(9);
		$col_all = $this->uri->segment(10);
		
		$data["values"] = $this->processdb->continuous_late_report($start_date, $end_date, $year_month, $col_desig, $col_line, $col_section, $col_dept, $col_all);
		//print_r($data);
		$start_date = $year_month."-".$start_date;
		$end_date = $year_month."-".$end_date;
		
		$data["start_date"] = $start_date;
		$data["end_date"] = $end_date;
		//print_r($data);
		if(is_string($data["values"]))
		{
			echo $data["values"];
		}
		else
		{
			$this->load->view('continuous_late_report',$data);
		}
		
		
		
	}
	
	function monthly_att_register()
	{
		$year = $this->uri->segment(3);
		$month = $this->uri->segment(4);
		$col_desig = $this->uri->segment(5);
		$col_line = $this->uri->segment(6);
		$col_section = $this->uri->segment(7);
		$col_dept = $this->uri->segment(8);
		$col_all = $this->uri->segment(9);
		
		$salary_month = $year."-".$month;
		$query=$this->processdb->monthly_att__report_db($salary_month, $col_desig, $col_line, $col_section, $col_dept, $col_all);
		if(is_string($query))
		{
			$data2["query"] = $query;
			$this->load->view('monthly_report',$data2);
		}
		else
		{
			$data2["value"]=$query;
			$data2["value2"]=$query->num_fields(); 
			$data2["month"] = $month;
			$this->load->view('monthly_report',$data2);
		}
	}
	
	function monthly_salary_sheet()
	{
		$year = $this->uri->segment(3);
		$month = $this->uri->segment(4);
		$col_desig = $this->uri->segment(5);
		$col_line = $this->uri->segment(6);
		$col_section = $this->uri->segment(7);
		$col_dept = $this->uri->segment(8);
		$col_all = $this->uri->segment(9);
		$emp_status = $this->uri->segment(10);
		
		$salary_month = $year."-".$month."-01";
		$data["value"] = $this->processdb->monthly_salary_sheet($salary_month, $col_desig, $col_line, $col_section, $col_dept, $col_all, $emp_status);
		$data["salary_month"] = $salary_month;
		$data["col_desig"] = $col_desig;
		$data["col_line"] = $col_line;
		$data["col_dept"] = $col_dept;
		$data["col_all"] = $col_all;
		//print_r($data);
		$this->load->view('salary_sheet',$data);
	}
	
	function monthly_salary_sheet_export()
	{
		$year = $this->uri->segment(3);
		$month = $this->uri->segment(4);
		$col_desig = $this->uri->segment(5);
		$col_line = $this->uri->segment(6);
		$col_section = $this->uri->segment(7);
		$col_dept = $this->uri->segment(8);
		$col_all = $this->uri->segment(9);
		
		$salary_month = $year."-".$month."-01";
		$data = $this->processdb->monthly_salary_sheet($salary_month, $col_desig, $col_line, $col_section, $col_dept, $col_all);
		//print_r($data);
		$this->load->plugin('to_excel');
		array_to_excel($data, "monthly_salary_sheet");
	}
	
	function salary_summary_report()
	{
		$year = $this->uri->segment(3);
		$month = $this->uri->segment(4);
		$col_desig = $this->uri->segment(5);
		$col_line = $this->uri->segment(6);
		$col_section = $this->uri->segment(7);
		$col_dept = $this->uri->segment(8);
		$col_all = $this->uri->segment(9);
		$emp_status = $this->uri->segment(10);
		
		$salary_month = $year."-".$month."-01";
		$data["values"] = $this->processdb->salary_summary_report($salary_month, $col_desig, $col_line, $col_section, $col_dept, $col_all, $emp_status);
		//print_r($data);
		$data["salary_month"] = $salary_month;
		$data["col_desig"] = $col_desig;
		$data["col_line"] = $col_line;
		$data["col_dept"] = $col_dept;
		$data["col_all"] = $col_all;
		
		if(is_string($data["values"]))
		{
			echo $data["values"];
		}
		else
		{
			$this->load->view('salary_summary_report',$data);
		}
	}
	
	function salary_summary_report_export()
	{
		$data = $this->processdb->salary_summary_report();
		
		$this->load->plugin('to_excel');
		array_to_excel($data,"Salary_Summary_Report");
	}
	
	function job_card()
	{
		$start_date = $this->uri->segment(3);
		$end_date = $this->uri->segment(4);	
		$emp_id = $this->uri->segment(5);
		$this->processdb->job_card($start_date, $end_date, $emp_id);
	}
	
	function dump()
	{
		$data = $this->processdb->dump();
	}
	function daily_present()
	{
		$data = $this->processdb->daily_presentdb();
	}
	
	
	
	function absentreport()
	{
		$start_date = $this->uri->segment(3);
		$end_date = $this->uri->segment(4);
		$year_month = $this->uri->segment(5);
		$present_status="A";
		$status="Absent Report from date $start_date to date  $end_date";
		$data = $this->processdb->daily_presentdb($present_status,$status, $year_month);
	}
	
	function leave_report()
	{
		$start_date = $this->uri->segment(3);
		$end_date = $this->uri->segment(4);
		$year_month = $this->uri->segment(5);
		$present_status="L";
		$status="Leave Report from date $start_date to date  $end_date";
		$data = $this->processdb->daily_presentdb($present_status,$status, $year_month);
	
	}
	
	function present_report()
	{
		$start_date = $this->uri->segment(3);
		$end_date = $this->uri->segment(4);
		$year_month = $this->uri->segment(5);
		$present_status="P";
		$status="Present Report from date $start_date to date  $end_date";
	
		$data = $this->processdb->daily_presentdb($present_status,$status, $year_month);
		
	}
	
	function late_report()
	{
	   $sdate = $this->uri->segment(5);
	   $edate = $this->uri->segment(6);
	   $month = $this->uri->segment(4);
	   $year = $this->uri->segment(3);
		
	//	$start_date='2011-02-15';
	//	$end_date='2011-02-17';
		//$data["late"]= $this->processdb->late_commer_report_db($start_date,$end_date);
		
		$start=$year."-".$month."-".$sdate;
		$end=$year."-".$month."-".$edate;
		//$start_date = $this->uri->segment(3);
	//	$end_date = $this->uri->segment(4);
		
		$data["late"]= $this->processdb->late_commer_report_db($start,$end);
		$this->load->view('display',$data);
	}
	
	function att_process()
	{
		$this->processdb->att_process();
	}
	
	//   23-03-2011  sayed start //
	function search_line_name()
	{
		$result = $this->processdb->search_line_name_db();
		echo $result;
	}
	
	function update_linename()
	{
		$result = $this->processdb->update_linename_db();
		//echo $result;
	}
	
	
	function save_linename()
	{
		$result = $this->processdb->save_linename();
		echo $result;
	}
	function delete_linename()
	{
		$result = $this->processdb->delete_linename();
		echo $result;
	}
	
	function delete_designationname()
	{
		$result = $this->processdb->delete_designationname();
		echo $result;
	}
	
	function update_designationname()
	{
		$result = $this->processdb->update_designation();
		//echo $result;
	}
	
	function save_designationname()
	{
		$result = $this->processdb->save_designationname();
		echo $result;
	}
	
	function search_designation_name()
	{
		$result = $this->processdb->search_designation_name();
		echo $result;
	}
	
	function search_attenb_name()
	{
		$result = $this->processdb->search_attenb_name_db();
		echo $result;
		//echo $check_attn_name = $this->input->post('check_attn_name');
	}
	
	function save_atttbname_con()
	{
		$result = $this->processdb->save_atttbname_db();
		echo $result;
	}
	function update_attnbname_con()
	{
		$result = $this->processdb->update_attnbname_db();
	}
	function delete_attnbname_co()
	{
		$result = $this->processdb->delete_attnbname_db();
		echo $result;
	}
	//   23-03-2011  sayed end //
	
	function id_card()
	{
		$start = $this->uri->segment(3);
		$end   = $this->uri->segment(4);
			
		$query['values'] = $this->processdb->id_card($start, $end);
		if(is_string($query['values']))
		{
			echo $query['values'];
		}
		else
		{
			$this->load->view('id_card',$query);
		}
	}
	
	function appointment_letter()
	{
		$start = $this->uri->segment(3);
		$end   = $this->uri->segment(4);
			
		$query['values'] = $this->processdb->appointment_letter($start, $end);
		if(is_string($query['values']))
		{
			echo $query['values'];
		}
		else
		{
			$this->load->view('appointment_letter',$query);
		}
	}
	
	function payslip_report()
	{
		$start = $this->uri->segment(3);
		$end   = $this->uri->segment(4);
		$sal_month   = $this->uri->segment(5);
		$col_desig = $this->uri->segment(6);
		$col_line = $this->uri->segment(7);
		$col_section = $this->uri->segment(8);
		$col_dept = $this->uri->segment(9);
		$col_all = $this->uri->segment(10);
		
		
		//$start = "100009";
		//$end   = "100009";
		//$sal_month = "2011-04-01";	
		$query['values'] = $this->processdb->payslip_report($start, $end, $sal_month, $col_desig, $col_line, $col_section, $col_dept, $col_all);
		//print_r($query);
		if(is_string($query['values']))
		{
			echo $query['values'];
		}
		else
		{
			$this->load->view('pay_slip',$query);
		}
	}
	
	function daily_report()
	{
		$year = $this->uri->segment(3);
		$month= $this->uri->segment(4);
		$date = $this->uri->segment(5);
		$status = $this->uri->segment(6);
		$col_desig = $this->uri->segment(7);
		$col_line = $this->uri->segment(8);
		$col_section = $this->uri->segment(9);
		$col_dept = $this->uri->segment(10);
		$col_all = $this->uri->segment(11);
		
		//$year = "2011";
		//$month= "04";
		//$date = "02";
		
		//$year = "$year";
		//$month= "$month";
		//$date = "$date";
		
		
		$data["values"] = $this->processdb->daily_report($year, $month, $date, $status, $col_desig, $col_line, $col_section, $col_dept, $col_all);
			
		$data["year"]			= $year;
		$data["month"]			= $month;
		$data["date"]			= $date;
		$data["daily_status"]	= $status;
		$data["col_desig"] 		= $this->uri->segment(7);
		$data["col_line"] 		= $this->uri->segment(8);
		$data["col_section"] 	= $this->uri->segment(9);
		$data["col_dept"] 		= $this->uri->segment(10);
		$data["col_all"] 		= $this->uri->segment(11);
		
		if(is_string($data["values"]))
		{
			echo $data["values"];
		}
		else
		{
			$this->load->view('daily_report',$data);
		}
		//print_r($data);
	}
	
	function grid_daily_report()
	{
		//$year = "2011";
		//$month= "04";
		//$date = "18";
		//$status = "P";
		$grid_date = $this->uri->segment(3);
		list($date, $month, $year) = explode('-', trim($grid_date));
		//echo "$date, $month, $year";
		$status = $this->uri->segment(4);
		$grid_data = $this->uri->segment(5);
		$grid_emp_id = explode('xxx', trim($grid_data));
		//print_r($grid_emp_id);
		$data["values"] = $this->processdb->grid_daily_report($year, $month, $date, $status, $grid_emp_id);	
		
		$data["year"]			= $year;
		$data["month"]			= $month;
		$data["date"]			= $date;
		$data["daily_status"]	= $status;
		$data["col_desig"] 		= "";
		$data["col_line"] 		= "";
		$data["col_section"] 	= "";
		$data["col_dept"] 		= "";
		$data["col_all"] 		= "";
		if(is_string($data["values"]))
		{
			echo $data["values"];
		}
		else
		{
			$this->load->view('daily_report',$data);
		}
	}
	
	function left_emp_report()
	{
		$start_date = $this->uri->segment(3);
		$end_date= $this->uri->segment(4);
		$col_desig = $this->uri->segment(5);
		$col_line = $this->uri->segment(6);
		$col_section = $this->uri->segment(7);
		$col_dept = $this->uri->segment(8);
		$col_all = $this->uri->segment(9);
		
		//$year = "2011";
		//$month= "04";
		//$date = "02";
		
		//$year = "$year";
		//$month= "$month";
		//$date = "$date";
		
		
		$data["values"] = $this->processdb->left_emp_report($start_date, $end_date, $col_desig, $col_line, $col_section, $col_dept, $col_all);
			
		$data["start_date"]		= $start_date;
		$data["end_date"]		= $end_date;
		$data["col_desig"] 		= $col_desig;
		$data["col_line"] 		= $col_line;
		$data["col_section"] 	= $col_section;
		$data["col_dept"] 		= $col_dept;
		$data["col_all"] 		= $col_all;
		
		if(is_string($data["values"]))
		{
			echo $data["values"];
		}
		else
		{
			$this->load->view('left_emp_report',$data);
		}
		//print_r($data);
	}
	
	function left_emp_report_export()
	{
		$start_date = $this->uri->segment(3);
		$end_date= $this->uri->segment(4);
		$col_desig = $this->uri->segment(5);
		$col_line = $this->uri->segment(6);
		$col_section = $this->uri->segment(7);
		$col_dept = $this->uri->segment(8);
		$col_all = $this->uri->segment(9);
		
		//$year = "2011";
		//$month= "04";
		//$date = "02";
		
		//$year = "$year";
		//$month= "$month";
		//$date = "$date";
		
		
		$data = $this->processdb->left_emp_report($start_date, $end_date, $col_desig, $col_line, $col_section, $col_dept, $col_all);
		
		$this->load->plugin('to_excel');
		array_to_excel($data,"Separation_report");
	}
	
	function resign_emp_report()
	{
		$start_date = $this->uri->segment(3);
		$end_date= $this->uri->segment(4);
		$col_desig = $this->uri->segment(5);
		$col_line = $this->uri->segment(6);
		$col_section = $this->uri->segment(7);
		$col_dept = $this->uri->segment(8);
		$col_all = $this->uri->segment(9);
		
		//$year = "2011";
		//$month= "04";
		//$date = "02";
		
		//$year = "$year";
		//$month= "$month";
		//$date = "$date";
		
		
		$data["values"] = $this->processdb->resign_emp_report($start_date, $end_date, $col_desig, $col_line, $col_section, $col_dept, $col_all);
			
		$data["start_date"]		= $start_date;
		$data["end_date"]		= $end_date;
		$data["col_desig"] 		= $col_desig;
		$data["col_line"] 		= $col_line;
		$data["col_section"] 	= $col_section;
		$data["col_dept"] 		= $col_dept;
		$data["col_all"] 		= $col_all;
		
		if(is_string($data["values"]))
		{
			echo $data["values"];
		}
		else
		{
			$this->load->view('resign_emp_report',$data);
		}
		//print_r($data);
	}
	
	function resign_emp_report_export()
	{
		$start_date = $this->uri->segment(3);
		$end_date= $this->uri->segment(4);
		$col_desig = $this->uri->segment(5);
		$col_line = $this->uri->segment(6);
		$col_section = $this->uri->segment(7);
		$col_dept = $this->uri->segment(8);
		$col_all = $this->uri->segment(9);
		
		//$year = "2011";
		//$month= "04";
		//$date = "02";
		
		//$year = "$year";
		//$month= "$month";
		//$date = "$date";
		
		
		$data = $this->processdb->resign_emp_report($start_date, $end_date, $col_desig, $col_line, $col_section, $col_dept, $col_all);
		
		$this->load->plugin('to_excel');
		array_to_excel($data,"Resign_report");
	}
	
	function new_join_emp_report()
	{
		$start_date = $this->uri->segment(3);
		$end_date= $this->uri->segment(4);
		$col_desig = $this->uri->segment(5);
		$col_line = $this->uri->segment(6);
		$col_section = $this->uri->segment(7);
		$col_dept = $this->uri->segment(8);
		$col_all = $this->uri->segment(9);
		
		//$year = "2011";
		//$month= "04";
		//$date = "02";
		
		//$year = "$year";
		//$month= "$month";
		//$date = "$date";
		
		
		$data["values"] = $this->processdb->new_join_emp_report($start_date, $end_date, $col_desig, $col_line, $col_section, $col_dept, $col_all);
			
		$data["start_date"]		= $start_date;
		$data["end_date"]		= $end_date;
		$data["col_desig"] 		= $col_desig;
		$data["col_line"] 		= $col_line;
		$data["col_section"] 	= $col_section;
		$data["col_dept"] 		= $col_dept;
		$data["col_all"] 		= $col_all;
		
		if(is_string($data["values"]))
		{
			echo $data["values"];
		}
		else
		{
			$this->load->view('new_join_emp_report',$data);
		}
		//print_r($data);
	}
	
	function new_join_emp_report_export()
	{
		$start_date = $this->uri->segment(3);
		$end_date= $this->uri->segment(4);
		$col_desig = $this->uri->segment(5);
		$col_line = $this->uri->segment(6);
		$col_section = $this->uri->segment(7);
		$col_dept = $this->uri->segment(8);
		$col_all = $this->uri->segment(9);
		
		//$year = "2011";
		//$month= "04";
		//$date = "02";
		
		//$year = "$year";
		//$month= "$month";
		//$date = "$date";
		
		
		$data = $this->processdb->new_join_emp_report($start_date, $end_date, $col_desig, $col_line, $col_section, $col_dept, $col_all);
		
		$this->load->plugin('to_excel');
		array_to_excel($data,"New_join_report");
	}
	
	function daily_report_export()
	{
		$year = $this->uri->segment(3);
		$month= $this->uri->segment(4);
		$date = $this->uri->segment(5);
		$status = $this->uri->segment(6);
		$col_desig = $this->uri->segment(7);
		$col_line = $this->uri->segment(8);
		$col_section = $this->uri->segment(9);
		$col_dept = $this->uri->segment(10);
		$col_all = $this->uri->segment(11);
		
		$status = $this->uri->segment(6);
		$data = $this->processdb->daily_report($year, $month, $date, $status, $col_desig, $col_line, $col_section, $col_dept, $col_all);
		
		$this->load->plugin('to_excel');
		array_to_excel($data);
	}
	
	function daily_late_report_export()
	{
		$year = $this->uri->segment(3);
		$month= $this->uri->segment(4);
		$date = $this->uri->segment(5);
		$col_desig = $this->uri->segment(6);
		$col_line = $this->uri->segment(7);
		$col_section = $this->uri->segment(8);
		$col_dept = $this->uri->segment(9);
		$col_all = $this->uri->segment(10);
				
		$data = $this->processdb->daily_late_report($year, $month, $date, $col_desig, $col_line, $col_section, $col_dept, $col_all);
		
		$this->load->plugin('to_excel');
		array_to_excel($data, "Daily_late_report");
	}
	
	function daily_late_report()
	{
		$year = $this->uri->segment(3);
		$month= $this->uri->segment(4);
		$date = $this->uri->segment(5);
		$col_desig = $this->uri->segment(6);
		$col_line = $this->uri->segment(7);
		$col_section = $this->uri->segment(8);
		$col_dept = $this->uri->segment(9);
		$col_all = $this->uri->segment(10);
				
		$data["values"] = $this->processdb->daily_late_report($year, $month, $date, $col_desig, $col_line, $col_section, $col_dept, $col_all);
		$data["year"]= $year;
		$data["month"]= $month;
		$data["date"]= $date;
		$data["col_desig"] 		= $this->uri->segment(6);
		$data["col_line"] 		= $this->uri->segment(7);
		$data["col_section"] 	= $this->uri->segment(8);
		$data["col_dept"] 		= $this->uri->segment(9);
		$data["col_all"] 		= $this->uri->segment(10);
		if(is_string($data["values"]))
		{
			echo $data["values"];
		}
		else
		{
			$this->load->view('daily_late_report',$data);
		}		
		//print_r($data);
	}
	
	function out_punch_miss()
	{
		$year = $this->uri->segment(3);
		$month= $this->uri->segment(4);
		$date = $this->uri->segment(5);
		$col_desig = $this->uri->segment(6);
		$col_line = $this->uri->segment(7);
		$col_section = $this->uri->segment(8);
		$col_dept = $this->uri->segment(9);
		$col_all = $this->uri->segment(10);
		
		/*$year = "2011";
		$month= "04";
		$date = "05";*/
		
		$data["values"] = $this->processdb->out_punch_miss($year, $month, $date, $col_desig, $col_line, $col_section, $col_dept, $col_all);
		$data["year"]= $year;
		$data["month"]= $month;
		$data["date"]= $date;
		$data["col_desig"] 		= $this->uri->segment(6);
		$data["col_line"] 		= $this->uri->segment(7);
		$data["col_section"] 	= $this->uri->segment(8);
		$data["col_dept"] 		= $this->uri->segment(9);
		$data["col_all"] 		= $this->uri->segment(10);
		
		if(is_string($data["values"]))
		{
			echo $data["values"];
		}
		else
		{
			$this->load->view('out_punch_miss',$data);
		}		
		//print_r($data);
	}
	
	function out_punch_miss_export()
	{
		$year = $this->uri->segment(3);
		$month= $this->uri->segment(4);
		$date = $this->uri->segment(5);
		$col_desig = $this->uri->segment(6);
		$col_line = $this->uri->segment(7);
		$col_section = $this->uri->segment(8);
		$col_dept = $this->uri->segment(9);
		$col_all = $this->uri->segment(10);
				
		$data = $this->processdb->out_punch_miss($year, $month, $date, $col_desig, $col_line, $col_section, $col_dept, $col_all);
		
		$this->load->plugin('to_excel');
		array_to_excel($data, "Out_punch_miss_report");
	}
	
	
	function section_manual()
	{
 	$result = $this->processdb->section_manual_db();
	echo $result;
	}

	function shift_change_search()
	{
		$shift_name = $this->input->post('sh_name');
		//$shift_name = "Shift A";
		
		$data = $this->processdb->shift_change_search($shift_name);
		echo $data;
	}
	
	function manual_att_entry_co()
	{
		
		$sStartDate=$this->input->post('startdate');
		$sEndDate=$this->input->post('enddate');
		$time=$this->input->post('time');
		
		$column=$this->input->post('column');
		$emp_department_no=$this->input->post('column_value');
		
		$empid=$this->input->post('empid');
		
		if ($empid !="")
		{
			$result = $this->processdb->emp_id_db($empid,$sStartDate,$sEndDate,$time);
			echo $result;
		}
		elseif ($column=="emp_dept_id")
		{
			$result = $this->processdb->emp_dept_id_db($emp_department_no,$sStartDate,$sEndDate,$time);
		}
		elseif ($column=="emp_sec_id")
		{
			$result = $this->processdb->emp_sec_id_db($emp_department_no,$sStartDate,$sEndDate,$time);
		}
		elseif ($column=="emp_line_id")
		{
			$result = $this->processdb->emp_line_id_db($emp_department_no,$sStartDate,$sEndDate,$time);
		}
		elseif ($column=="emp_desi_id")
		{
			$result = $this->processdb->emp_desi_id_db($emp_department_no,$sStartDate,$sEndDate,$time);
		}else
		{
			echo "not set";
		}
	//$result = $this->processdb->manual_att_entry_db($emp_department_no,$column,$sStartDate,$sEndDate,$intime_1st,$intime_2nd,$outtime_1st,$outtime_2nd,$flag);
		
	}
	/*function leave_transaction_co()
	{
	$result = $this->processdb->leave_transaction_db();
	echo $result;
	}*/
	
	
	/*function save_leave_co()
	{
	$result = $this->processdb->save_leave_db();
	echo $result;
	}*/
	
	
	function search_position_name()
	{
		$result = $this->processdb->search_position_name_db();
		echo $result;
	}
	
	
	function save_positionname_co()
	{
		$result = $this->processdb->save_positionname_db();
		echo $result;
	}
	
	
	function update_positionname_co()
	{
		$result = $this->processdb->update_positionname_db();
		//echo $result;
	}
	function delete_positionname_co()
	{
		$result = $this->processdb->delete_positionname_db();
		echo $result;
	}
	
	function search_operation_name()
	{
		$result = $this->processdb->search_operation_name();
		echo $result;
	}
	
	
	function save_operationname_co()
	{
		$result = $this->processdb->save_operationname_db();
		echo $result;
	}

	
	function update_operationname_co()
	{
		$result = $this->processdb->update_operationname_db();
		//echo $result;
	}
	
	
	function delete_operationname_co()
	{
		$result = $this->processdb->delete_operationname_db();
		echo $result;
	}
	
	function shift_change_co()
	{
			$result = $this->processdb->shift_change_db();
			echo $result;
	}
	
	function save_schange_co()
	{
		$result = $this->processdb->save_schange_db();
		echo $result;
	}
	
	function update_shift_time()
	{
		$shift_name = $this->input->post('shift_name');
		$shift_id = $this->input->post('shift_id');
		
		$result = $this->processdb->update_shift_time($shift_name, $shift_id);
	}
	
	//===============MANPOWER REPORT=========================
	function manpower_report()
	{
		$year = $this->uri->segment(3);
		$month = $this->uri->segment(4);
		$date = $this->uri->segment(5);
		
		$data["values"] = $this->processdb->manpower_report($year, $month, $date);
		//print_r($data);
		$this->load->view('manpower_report',$data);
			
	}
	//===============MANPOWER REPORT=========================
	
	function work_off_delete_function_co()
	{
		$result = $this->processdb->work_off_delete_function_db();
		echo $result;
	}
	function work_off_save_function_co()
	{
		$result = $this->processdb->work_off_save_function_db();
		echo $result;
	}
	
	function holiday_co()
	{
		$result = $this->processdb->holiday_db();
		echo $result;
	}

	function manual_entry_Delete_co()
	{
		$result = $this->processdb->manual_entry_Delete_db();
		echo $result;
	}
	
	
	
	function save_add_payment_co()
	{
		$add_payment_empid=$this->input->post('add_payment_empid');
		$add_payment_id=$this->input->post('add_payment_id');

		$add_payment_year=$this->input->post('add_payment_year');
		$add_payment_month=$this->input->post('add_payment_month');
		
		
		
		$column_add_payment=$this->input->post('column_add_payment');
		$column_value_add_payment=$this->input->post('column_value_add_payment');
		
				
		if ($add_payment_empid !="")
		{
			$result = $this->processdb->add_payment_empid_db($add_payment_empid,$add_payment_id,$add_payment_year,$add_payment_month);
		}
		elseif ($column_add_payment=="dept_add_payment_id")
		{
			$result = $this->processdb->dept_add_payment_id_db($column_value_add_payment,$add_payment_id,$add_payment_year,$add_payment_month);
		}
		elseif ($column_add_payment=="section_add_payment_id")
		{
			$result = $this->processdb->section_add_payment_id_db($column_value_add_payment,$add_payment_id,$add_payment_year,$add_payment_month);
		}
		elseif ($column_add_payment=="line_add_payment_id")
		{
			$result = $this->processdb->line_add_payment_id_db($column_value_add_payment,$add_payment_id,$add_payment_year,$add_payment_month);
		}
		elseif ($column_add_payment=="desig_add_payment_id")
		{
			$result = $this->processdb->desig_add_payment_id_db($column_value_add_payment,$add_payment_id,$add_payment_year,$add_payment_month);
		}else
		{
			echo "not set";
		}
		
	}	
	
	function tex_add_deduct_co()
	{
		$empid_ad=$this->input->post('empid_ad');
		$tex_ad=$this->input->post('tex_ad');
		$deduction_ad=$this->input->post('deduction_ad');
		$year_ad=$this->input->post('year_ad');
		$month_ad=$this->input->post('month_ad');
		
		
		
		$column_ad=$this->input->post('column_ad');
		$column_value_ad=$this->input->post('column_value_ad');
		
				
		if ($empid_ad !="")
		{
			$result = $this->processdb->emp_id_db_ad($empid_ad,$tex_ad,$deduction_ad,$year_ad,$month_ad);
		}
		elseif ($column_ad=="emp_dept_id_ad")
		{
			$result = $this->processdb->emp_dept_id_db_ad($column_value_ad,$tex_ad,$deduction_ad,$year_ad,$month_ad);
		}
		elseif ($column_ad=="emp_sec_id_ad")
		{
			$result = $this->processdb->emp_sec_id_db_ad($column_value_ad,$tex_ad,$deduction_ad,$year_ad,$month_ad);
		}
		elseif ($column_ad=="emp_line_id_ad")
		{
			$result = $this->processdb->emp_line_id_db_ad($column_value_ad,$tex_ad,$deduction_ad,$year_ad,$month_ad);
		}
		elseif ($column_ad=="emp_desi_id_ad")
		{
			$result = $this->processdb->emp_desi_id_db_ad($column_value_ad,$tex_ad,$deduction_ad,$year_ad,$month_ad);
		}else
		{
			echo "not set";
		}
	//$result = $this->processdb->manual_att_entry_db($emp_department_no,$column,$sStartDate,$sEndDate,$intime_1st,$intime_2nd,$outtime_1st,$outtime_2nd,$flag);
		
		
	}
		
		
	function add_payment_add_co()
	{
		$result = $this->processdb->add_payment_add_db();
		echo $result;
	}
	
	function add_work_off_co()
	{
		$result = $this->processdb->add_work_off_db();
		echo $result;
	}
	
	
	function save_work_off_co()
	{


			//$work_off_empid=$this->input->post('work_off_empid');
			$work_off_empid=$this->input->post('work_off_empid');
			$work_off_date=$this->input->post('work_off_date');
			$work_off_start=$this->input->post('work_off_start');
				
			
			//	echo (work_off_date);
			$column_work_off=$this->input->post('column_work_off');
			$column_value_work_off=$this->input->post('column_value_work_off');
			
					
			if ($work_off_empid !="")
			{
				$result = $this->processdb->work_off_empid_db($work_off_empid,$work_off_date);
			}
			elseif ($column_work_off=="dept_work_off_id")
			{
				$result = $this->processdb->dept_work_off_id_db($column_value_work_off,$work_off_empid,$work_off_date);
			}
			elseif ($column_work_off=="section_work_off_id")
			{
				$result = $this->processdb->section_work_off_id_db($column_value_work_off,$work_off_empid,$work_off_date);
			}
			elseif ($column_work_off=="line_work_off_id")
			{
				$result = $this->processdb->line_work_off_id_db($column_value_work_off,$work_off_empid,$work_off_date);
			}
			elseif ($column_work_off=="desig_work_off_id")
			{
				$result = $this->processdb->desig_work_off_id_db($column_value_work_off,$work_off_empid,$work_off_date);
			}
			elseif ($work_off_start=="all")
			{
				$result = $this->processdb->all_work_off_id_db($work_off_date);
			
			}
			else
			{
				echo "not set";
			}
		
	

	}
	
	//==============Advance loan insert=======================>>
	function advance_loan_insert()
	{
		$emp_id 	= $this->input->post('emp_id');
		$loan_amt	= $this->input->post('loan_amt');
		$pay_amt	= $this->input->post('pay_amt');
		$loan_date 	= $this->input->post('loan_date');
		
		$loan_date = date("Y-m-d", strtotime($loan_date)); 
		
		$data = $this->processdb->advance_loan_insert($emp_id, $loan_amt, $pay_amt, $loan_date);
		echo $data;
		
		
	}
	//==============Advance loan insert=======================<<
	
	
	function production_salary()
	{
		 $emp_id 	= "100004";
		 $year_month = "2011-09"; 
		 $data = $this->processdb->production_salary_db($year_month);
		
		
	}
	
	function production_salary_process()
	{
		
		//echo "Start Date = ".$start_date = microtime(true);
		echo $month = $this->input->post('month');
		echo $year = $this->input->post('year');
		
		//$month = "04";
		//$year = "2011";
	//	$year_month = "$year-$month";
		//$result = $this->processdb->production_salary_db($year_month);
		//if($result == "Process completed successfully")
		//{
		//	echo $result;
		//}
		//else
		//{
		//	echo $result;		
		//}
		//echo "<br> End Date = ".$end_date = microtime(true);
		//echo "<br> Duration = ".$time = $end_date - $start_date;
	
	}
	/*function update_pd_log_table()
	{
		$i = 0;
		$this->db->select('emp_id');
		$query = $this->db->get("pd_production_logs");
		 foreach($query->result() as $row)
		  {
			  $emp_id 	= $row->emp_id;
			  $floor_id = $this->db->where("emp_id",$emp_id)->get('pr_emp_com_info')->row()->emp_position_id;
			  //$floor_name = $this->db->where("posi_id",$floor_id)->get('pr_emp_position')->row()->posi_name;
			  
			  $data = array(
						"floor_id" => $floor_id
						);
			$this->db->where("emp_id", $emp_id);
			$this->db->update("pd_production_logs", $data);
			  
			  $i = $i + 1;
			  echo $i."==".$emp_id."===". $floor_id  ."<br>";
		  }
	}*/
	
//============================= Maintainance Functions=============================================	
	/*function drop_table()
	{
		$this->load->dbforge();
		$j=1;
		for($i=2001; $i<= 9999; $i++)
		{
			$id = sprintf('%06d', $i);
			$table =  'temp_'.$id;
			if ($this->db->table_exists($table) )
			{
				//echo $table."=$j<br>";
				if($this->dbforge->drop_table($table))
				{
					echo "$j . Successfully Deleted table = $table <br>";
				}
				$j++;
			}
		}
	}
	
	function truncate_table()
	{
		$j=1;
		for($i=1; $i<= 9999; $i++)
		{
			$id = sprintf('%06d', $i);
			$table =  'temp_'.$id;
			if ($this->db->table_exists($table) )
			{
				//echo $table."=$j<br>";
				if($this->db->empty_table($table))
				{
					echo "$j . Successfully Truncated table = $table <br>";
				}
				$j++;
			}
		}
	}
	
	function test()
	{
		$emp_id = '004237';
		echo $check = $this->processdb->resign_check($emp_id);
	}*/
	
	/*function delete_emp_id()
	{
		$data = array(
					'P003'
					);
		//print_r($data);
		$count = count($data);
		
		for($i=0; $i<$count;$i++)
		{
			$id = $data[$i];
			
			$this->db->select("emp_id");
			$this->db->where('emp_id',$id);
			$query = $this->db->get("pr_emp_per_info");
			$num_row = $query->num_rows();
			if($num_row > 0 )
			{
				$this->db->where('emp_id',$id);
				$this->db->delete('pr_emp_com_info');
				$this->db->where('emp_id',$id);
				$this->db->delete('pr_id_proxi');
				$this->db->where('emp_id',$id);
				$this->db->delete('pr_emp_edu');
				$this->db->where('emp_id',$id);
				$this->db->delete('pr_emp_skill');
				$this->db->where('emp_id',$id);
				$this->db->delete('pr_emp_add');
				$this->db->where('emp_id',$id);
				$this->db->delete('pr_pay_scale_sheet');
				$this->db->where('emp_id',$id);
				if($this->db->delete('pr_emp_per_info'))
				{
					$this->load->dbforge();
					$table_name = "temp_$id";
					if($this->dbforge->drop_table($table_name))
					{
						echo "$id => Delete all data successfully<br>";
					}
					else
					{
						echo "$id => Delete failed<br>";
					}
				} 
				else
				{
					echo "$id => Delete failed<br>";
				}
			}
			else
			{
				echo "$id => Employee ID does not exist<br>";
			}
		}
		
	}
	*/
	function test()
	{
		$basic = 999.49;	
		var_dump($basic);
		echo $basic = round($basic);
	}
	
	function error_correction()
	{
		$start_time = "2013-11-21";  //Start 2013-06-01
		$end_time	= "2013-11-30";
		$this->db->select('emp_id');
		$this->db->where("trim(date) BETWEEN '$start_time' and '$end_time'");
		$query = $this->db->get('pd_production_logs');
		echo $query->num_rows();
		$i = 0;
		foreach($query->result() as $row)
		{
			
			$emp_id = $row->emp_id;
			$floor_id = $this->db->where("emp_id",$emp_id)->get('pr_emp_com_info')->row()->emp_position_id;
			//$block_id = $this->db->where("emp_id",$emp_id)->get('pr_emp_com_info')->row()->emp_line_id;
			$data = array('floor_id' => $floor_id);	
			$this->db->where('emp_id', $emp_id);
			$this->db->update('pd_production_logs',$data);
			$i = $i + 1;
			echo "<br>$i===$emp_id===$floor_id";
		}
		echo "<br>$i  Data Updated Succesfully";
	}
	
	/*function advance_loan_script()
	{
		$date = "2013-10";
		 $data = array(
						"loan_date" => "2013-10-01"
						);
			$this->db->like("loan_date", $date);
			$this->db->update("pr_advance_loan", $data);
		
	}*/
	
//============================= Maintainance Functions=============================================		
}