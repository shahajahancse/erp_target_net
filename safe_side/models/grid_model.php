<?php
class Grid_model extends CI_Model{
	
	
	function __construct()
	{
		parent::__construct();
		
		/* Standard Libraries */
		$this->load->model('log_model');
		$this->load->model('pf_model');
		$this->load->model('salary_process_model');

	}
	
	//-------------------------------------------------------------------------------------------------
	// Daily Report for Present, Absent, Leave
	//-------------------------------------------------------------------------------------------------
	function grid_daily_report($year, $month, $date, $status, $grid_emp_id)
	{
		$day = $year."-".$month."-".$date;
		$att_month  = $year."-".$month."-00";
		$date_field = "pr_attn_monthly.date_$date";
		
		$this->db->distinct();
		$this->db->select("pr_attn_monthly.emp_id");
		$this->db->from("pr_attn_monthly");
		$this->db->where_in("pr_attn_monthly.emp_id", $grid_emp_id);
		$this->db->where($date_field, $status);
		$this->db->where("pr_attn_monthly.att_month", $att_month);
		$this->db->order_by("pr_attn_monthly.emp_id");
		$query = $this->db->get();
		
		if($query->num_rows() == 0)
		{
			return "Requested list is empty";
		}
				
		foreach($query->result() as $rows)
		{
			$emp_id = $rows->emp_id;
			
			$this->db->select('pr_emp_com_info.emp_id,pr_emp_per_info.emp_full_name, pr_designation.desig_name, pr_emp_com_info.emp_join_date, pr_dept.dept_name, pr_section.sec_name, pr_line_num.line_name, pr_id_proxi.proxi_id, pr_emp_shift.shift_name,pr_emp_com_info.emp_cat_id');
			$this->db->from('pr_emp_per_info');
			$this->db->from('pr_emp_com_info');
			$this->db->from('pr_designation');
			$this->db->from('pr_dept');
			$this->db->from('pr_section');
			$this->db->from('pr_line_num');
			$this->db->from('pr_id_proxi');
			$this->db->from('pr_emp_shift');	
			$this->db->where('pr_emp_per_info.emp_id = pr_emp_com_info.emp_id');
			$this->db->where('pr_emp_com_info.emp_desi_id = pr_designation.desig_id');
			$this->db->where('pr_emp_com_info.emp_dept_id = pr_dept.dept_id');
			$this->db->where('pr_emp_com_info.emp_sec_id = pr_section.sec_id');
			$this->db->where('pr_emp_com_info.emp_line_id = pr_line_num.line_id');
			$this->db->where('pr_emp_com_info.emp_id = pr_id_proxi.emp_id');
			$this->db->where('pr_emp_shift.shift_id = pr_emp_com_info.emp_shift');
			$this->db->where("pr_emp_per_info.emp_id = '$emp_id'");
			$query = $this->db->get();
			
			if($status == "L")
			{
				$this->db->select("leave_type");
				$this->db->where("emp_id", $emp_id);
				$this->db->where("start_date", $day);
				$query1 = $this->db->get("pr_leave_trans");
				$row = $query1->row();
				$status = $row->leave_type;
			}
			else
			{
				$status = $status;
			}
			
			foreach($query->result() as $rows)
			{
				$emp_id = $rows->emp_id;
				$emp_shift = $rows->shift_name;
				
				if($status == "P")
				{
					
					
					$present_check = $this->present_check($day, $emp_id);
					if($present_check == true)
					{
						$this->db->select('in_time, out_time');
						$this->db->from('pr_emp_shift_log');	
						$this->db->where("emp_id", $emp_id);
						$this->db->where("shift_log_date", $day);
						$query1 = $this->db->get();
						foreach($query1->result() as $row)
						{
							$emp_shift_check = $this->emp_shift_check($emp_id, $day);
							$in_time = $row->in_time;
							$in_time = $this->get_formated_in_time($emp_id, $in_time, $emp_shift_check);
							$out_time = $row->out_time;
							$out_time = $this->get_formated_out_time($emp_id, $out_time, $emp_shift_check);
							
						}
						
					}
				}
				
				$data["emp_id"][] 		= $rows->emp_id;
				$data["proxi_id"][] 	= $rows->proxi_id;
				$data["emp_name"][] 	= $rows->emp_full_name;
				$data["desig_name"][] 	= $rows->desig_name;
				$data["doj"][] 			= $rows->emp_join_date;
				$data["dept_name"][] 	= $rows->dept_name;
				$data["sec_name"][] 	= $rows->sec_name;
				$data["line_name"][] 	= $rows->line_name;
				$data["emp_shift"][] 	= $emp_shift;
				if($status == "P")
				{
					$data["in_time"][] = $in_time;
					$data["out_time"][] = $out_time;
				}
				$data["status"][] = $status;
				
			}
		}
		if($data)
		{
			
			return $data;
		}
		else
		{
			return "Requested list is empty";
		}
	}
	//-------------------------------------------------------------------------------------------------
	// Daily Actual Present Report
	//-------------------------------------------------------------------------------------------------
	function grid_actual_present_report($year, $month, $date, $status, $grid_emp_id)
	{
		$day = $year."-".$month."-".$date;
		$att_month  = $year."-".$month."-00";
		$date_field = "pr_attn_monthly.date_$date";
		
		$this->db->distinct();
		$this->db->select("pr_attn_monthly.emp_id");
		$this->db->from("pr_attn_monthly");
		$this->db->where_in("pr_attn_monthly.emp_id", $grid_emp_id);
		$this->db->where($date_field, $status);
		$this->db->where("pr_attn_monthly.att_month", $att_month);
		$this->db->order_by("pr_attn_monthly.emp_id");
		$query = $this->db->get();
		
		if($query->num_rows() == 0)
		{
			return "Requested list is empty";
		}
				
		foreach($query->result() as $rows)
		{
			$emp_id = $rows->emp_id;
			
			$this->db->select('pr_emp_com_info.emp_id,pr_emp_per_info.emp_full_name, pr_designation.desig_name, pr_emp_com_info.emp_join_date, pr_dept.dept_name, pr_section.sec_name, pr_line_num.line_name, pr_id_proxi.proxi_id, pr_emp_shift.shift_name,pr_emp_com_info.emp_cat_id');
			$this->db->from('pr_emp_per_info');
			$this->db->from('pr_emp_com_info');
			$this->db->from('pr_designation');
			$this->db->from('pr_dept');
			$this->db->from('pr_section');
			$this->db->from('pr_line_num');
			$this->db->from('pr_id_proxi');
			$this->db->from('pr_emp_shift');	
			$this->db->where('pr_emp_per_info.emp_id = pr_emp_com_info.emp_id');
			$this->db->where('pr_emp_com_info.emp_desi_id = pr_designation.desig_id');
			$this->db->where('pr_emp_com_info.emp_dept_id = pr_dept.dept_id');
			$this->db->where('pr_emp_com_info.emp_sec_id = pr_section.sec_id');
			$this->db->where('pr_emp_com_info.emp_line_id = pr_line_num.line_id');
			$this->db->where('pr_emp_com_info.emp_id = pr_id_proxi.emp_id');
			$this->db->where('pr_emp_shift.shift_id = pr_emp_com_info.emp_shift');
			$this->db->where("pr_emp_per_info.emp_id = '$emp_id'");
			$query = $this->db->get();
			
			if($status == "L")
			{
				$this->db->select("leave_type");
				$this->db->where("emp_id", $emp_id);
				$this->db->where("start_date", $day);
				$query1 = $this->db->get("pr_leave_trans");
				$row = $query1->row();
				$status = $row->leave_type;
			}
			else
			{
				$status = $status;
			}
			
			foreach($query->result() as $rows)
			{
				$emp_id = $rows->emp_id;
				$emp_shift = $rows->shift_name;
				
				if($status == "P")
				{
					
					
					$present_check = $this->present_check($day, $emp_id);
					if($present_check == true)
					{
						$this->db->select('in_time, out_time');
						$this->db->from('pr_emp_shift_log');	
						$this->db->where("emp_id", $emp_id);
						$this->db->where("shift_log_date", $day);
						$query1 = $this->db->get();
						foreach($query1->result() as $row)
						{
							$emp_shift_check = $this->emp_shift_check($emp_id, $day);
							$in_time = $row->in_time;
							$in_time = $this->time_am_pm_format($in_time);
							//$in_time = $this->get_formated_in_time($emp_id, $in_time, $emp_shift_check);
							$out_time = $row->out_time;
							$out_time = $this->time_am_pm_format($out_time);
							//$out_time = $this->get_formated_out_time($emp_id, $out_time, $emp_shift_check);
							
						}
						
					}
				}
				
				$data["emp_id"][] 		= $rows->emp_id;
				$data["proxi_id"][] 	= $rows->proxi_id;
				$data["emp_name"][] 	= $rows->emp_full_name;
				$data["desig_name"][] 	= $rows->desig_name;
				$data["doj"][] 			= $rows->emp_join_date;
				$data["dept_name"][] 	= $rows->dept_name;
				$data["sec_name"][] 	= $rows->sec_name;
				$data["line_name"][] 	= $rows->line_name;
				$data["emp_shift"][] 	= $emp_shift;
				if($status == "P")
				{
					$data["in_time"][] = $in_time;
					$data["out_time"][] = $out_time;
				}
				$data["status"][] = $status;
				
			}
		}
		if($data)
		{
			
			return $data;
		}
		else
		{
			return "Requested list is empty";
		}
	}
	
	//-------------------------------------------------------------------------------------------------
	// In-Time format for Buyer
	//-------------------------------------------------------------------------------------------------
	function get_formated_in_time($emp_id, $in_time, $emp_shift)
	{
		$schedule 				= $this->schedule_check($emp_shift);
		$exact_in_time			= $schedule[0]["in_time"];
		
		$exact_time_15min_back = $this->minus_fifteen_minute_from_time($exact_in_time);
		
		if($exact_time_15min_back > $in_time ) 
		{ 
			return $in_time_format = $this->get_buyer_in_time($exact_time_15min_back ,$in_time); 
		} 
		else 
		{ 
			return $in_time = $this->time_am_pm_format($in_time);
		} 
			
	}
	//-------------------------------------------------------------------------------------------------
	// Minus fifteen minute from given time
	//-------------------------------------------------------------------------------------------------
	function minus_fifteen_minute_from_time($time)
	{
		return $time = date("H:i:s",strtotime('-15 minutes',strtotime($time)));
	}
	//-------------------------------------------------------------------------------------------------
	// In-Time format for Buyer
	//-------------------------------------------------------------------------------------------------
	function get_buyer_in_time($exact_time_15min_back ,$in_time)
	{
		$exact_hour_min_sec = $this->get_hour_min_sec($exact_time_15min_back);
		$exact_hour   		= $exact_hour_min_sec['hour'];
		$exact_minute 		= $exact_hour_min_sec['minute'];
		
		$real_hour_min_sec 	= $this->get_hour_min_sec($in_time);
		$real_minute  		= $real_hour_min_sec['minute'];
		$real_second 		= $real_hour_min_sec['second'];
		
		$buyer_minute = $this->create_buyer_minute($real_minute);
		
		$buyer_minute = $buyer_minute + $exact_minute;
		
		return $time_format = date("h:i:s A", mktime($exact_hour, $buyer_minute, $real_second, 0, 0, 0));
		
	}
	//-------------------------------------------------------------------------------------------------
	// Convert Time to Hour, Minute and Second
	//-------------------------------------------------------------------------------------------------
	function get_hour_min_sec($time)
	{
		$data = array();
		$data['hour']   = substr($time,0,2);
		$data['minute'] = substr($time,3,2);
		$data['second'] = substr($time,6,2);
		return $data;
	}
	//-------------------------------------------------------------------------------------------------
	// Convert real minute to buyer minute(Sum of two digit of minute)
	//-------------------------------------------------------------------------------------------------
	function create_buyer_minute($minute)
	{
		$min_1st_digit = substr($minute,0,1);
		$min_2nd_digit = substr($minute,1,1);
		return $buyer_minute  = $min_1st_digit + $min_2nd_digit;
	}
	//-------------------------------------------------------------------------------------------------
	// Out-Time format for Buyer
	//-------------------------------------------------------------------------------------------------
	function get_formated_out_time($emp_id, $out_time, $emp_shift)
	{
		if($out_time =='00:00:00')
		{
			return $out_time ='';
		}
		$schedule 				= $this->schedule_check($emp_shift);
		$out_start				= $schedule[0]["out_start"];
		$ot_start				= $schedule[0]["ot_start"];
		$one_hour_ot_out_time	= $schedule[0]["one_hour_ot_out_time"];
		$two_hour_ot_out_time	= $schedule[0]["two_hour_ot_out_time"];
		
		if($out_start < $out_time) 
		{ 
			if($ot_start > $out_time) 
			{ 
				return $out_time = $this->time_am_pm_format($out_time);
			} 
			elseif($one_hour_ot_out_time > $out_time ) 
			{ 
				return $out_time = $this->get_buyer_in_time($ot_start ,$out_time); 
			}
			elseif($two_hour_ot_out_time > $out_time ) 
			{ 
				return $out_time = $this->get_buyer_in_time($one_hour_ot_out_time ,$out_time); 
			}
			else
			{ 
				return $out_time = $this->get_buyer_in_time($two_hour_ot_out_time ,$out_time); 
			} 
		} 
		else
		{ 
			return $out_time = $this->get_buyer_in_time($two_hour_ot_out_time ,$out_time); 
		} 
	}
	//-------------------------------------------------------------------------------------------------
	// Convert 24 Hour Time to AM or PM format
	//-------------------------------------------------------------------------------------------------
	function time_am_pm_format($out_time)
	{
		$hour_min_sec 	= $this->get_hour_min_sec($out_time);
		$hour  			= $hour_min_sec['hour'];
		$minute  		= $hour_min_sec['minute'];
		$second 		= $hour_min_sec['second'];
		
		return $time_format = date("h:i:s A", mktime($hour, $minute, $second, 0, 0, 0));
	}
	
	function grid_daily_out_in_report($year, $month, $date, $status, $grid_emp_id)
	{
		$day = $year."-".$month."-".$date;
		$att_month  = $year."-".$month."-00";
		$date_field = "pr_attn_monthly.date_$date";
		
		$date_field2 = "date_$date";
		
		$this->db->distinct();
		$this->db->select("pr_attn_monthly.emp_id, $date_field");
		$this->db->from("pr_attn_monthly");
		$this->db->where_in("pr_attn_monthly.emp_id", $grid_emp_id);
		//$this->db->where($date_field, $status);
		$this->db->where("pr_attn_monthly.att_month", $att_month);
		$this->db->order_by("pr_attn_monthly.emp_id");
		/*$this->db->order_by("pr_dept.dept_name");
		$this->db->order_by("pr_section.sec_name");
		$this->db->order_by("pr_line_num.line_name");
		$this->db->order_by("pr_designation.desig_name");
		*/
		
		$query = $this->db->get();
		//echo $this->db->last_query();
		if($query->num_rows() == 0)
		{
			return "Requested list is empty";
		}
		
		
		
		foreach($query->result() as $rows)
		{
			$emp_id = $rows->emp_id;
			
			$status = $rows->$date_field2;
			
			$this->db->select('pr_emp_com_info.emp_id,pr_emp_per_info.emp_full_name, pr_designation.desig_name, pr_emp_com_info.emp_join_date, pr_dept.dept_name, pr_section.sec_name, pr_line_num.line_name, pr_id_proxi.proxi_id, pr_emp_shift.shift_name,pr_emp_com_info.emp_cat_id');
			$this->db->from('pr_emp_per_info');
			$this->db->from('pr_emp_com_info');
			$this->db->from('pr_designation');
			$this->db->from('pr_dept');
			$this->db->from('pr_section');
			$this->db->from('pr_line_num');
			$this->db->from('pr_id_proxi');
			$this->db->from('pr_emp_shift');	
			//$this->db->from("pr_emp_status");
			$this->db->where('pr_emp_per_info.emp_id = pr_emp_com_info.emp_id');
			$this->db->where('pr_emp_com_info.emp_desi_id = pr_designation.desig_id');
			$this->db->where('pr_emp_com_info.emp_dept_id = pr_dept.dept_id');
			$this->db->where('pr_emp_com_info.emp_sec_id = pr_section.sec_id');
			$this->db->where('pr_emp_com_info.emp_line_id = pr_line_num.line_id');
			$this->db->where('pr_emp_com_info.emp_id = pr_id_proxi.emp_id');
			$this->db->where('pr_emp_shift.shift_id = pr_emp_com_info.emp_shift');
			$this->db->where("pr_emp_per_info.emp_id = '$emp_id'");
			
			//$this->db->order_by("pr_dept.dept_name","ASC");
			//$this->db->order_by("pr_section.sec_name","ASC");
			//$this->db->order_by("pr_line_num.line_name","ASC");
			//$this->db->order_by("pr_emp_com_info.emp_id","ASC");
			$query = $this->db->get();
			//echo $this->db->last_query();
			//$put = $query->result_array();
			//print_r($put);
			
			if($status == "L")
			{
				$this->db->select("leave_type");
				$this->db->where("emp_id", $emp_id);
				$this->db->where("start_date", $day);
				$query1 = $this->db->get("pr_leave_trans");
				$row = $query1->row();
				$status = $row->leave_type;
			}
			else
			{
				$status = $status;
			}
			//$emp_shift = $this->emp_shift_check($emp_id, $day);
			
			foreach($query->result() as $rows)
			{
				$emp_id = $rows->emp_id;
				$emp_shift = $rows->shift_name;
				
				if($status == "P")
				{
					
					
					$present_check = $this->present_check($day, $emp_id);
					if($present_check == true)
					{
						$this->db->select();
						$this->db->from('pr_emp_shift_log');	
						$this->db->where("emp_id", $emp_id);
						$this->db->where("shift_log_date", $day);
						$query1 = $this->db->get();
						foreach($query1->result() as $row)
						{
							$emp_shift = $this->emp_shift_check($emp_id, $day);
							$in_time = $row->in_time;
							$in_time = $this->get_formated_in_time($emp_id, $in_time, $emp_shift);
							$out_time = $row->out_time;
							$out_time = $this->get_formated_out_time($emp_id, $out_time, $emp_shift);
						}
						
					}
				}
				else
				{
					$in_time = $status;
					$out_time = $status;
				}
				
				$previous_day_out = $this->get_previous_day_out_status($year, $month, $date, $emp_id);
				if($previous_day_out =='00:00:00')
				{
					$previous_day_out = 'P(Error)';
				}
				elseif($previous_day_out !='A' and $previous_day_out !='L' and $previous_day_out !='W' and $previous_day_out !='H')
				{
					$current_date  = date("Y-m-d", mktime(0, 0, 0, $month, $date, $year));
					$previous_date = date("Y-m-d", strtotime("-1 day", strtotime($current_date)));
					
					$emp_shift = $this->emp_shift_check($emp_id, $previous_date);
					$previous_day_out  = $this->get_formated_out_time($emp_id, $previous_day_out, $emp_shift);
				}
								
				$emp_cat_id = $rows->emp_cat_id;
				
				if($emp_cat_id == 1 || $emp_cat_id == 2 || $emp_cat_id == 5)
				{
					$data["emp_id"][] = $rows->emp_id;
					$data["proxi_id"][] = $rows->proxi_id;
					$data["emp_name"][] = $rows->emp_full_name;
					$data["desig_name"][] = $rows->desig_name;
					$data["doj"][] = $rows->emp_join_date;
					$data["dept_name"][] = $rows->dept_name;
					$data["sec_name"][] = $rows->sec_name;
					$data["line_name"][] = $rows->line_name;
					$data["emp_shift"][] = $emp_shift;
					$data["in_time"][] = $in_time;
					$data["out_time"][] = $out_time;
					$data["status"][] = $status;
					$data["p_out"][] = $previous_day_out;
				}
			}
			//print_r($data);
		}
		if($data)
		{
			
			return $data;
		}
		else
		{
			return "Requested list is empty";
		}
	}
	
	function get_previous_day_out_status($year, $month, $date, $emp_id)
	{
		$current_date  = date("Y-m-d", mktime(0, 0, 0, $month, $date, $year));
		$previous_date = date("Y-m-d", strtotime("-1 day", strtotime($current_date)));
		
		$previous_day = date("d", strtotime($previous_date));
		
		$att_month  = $year."-".$month."-00";
		$date_field = "pr_attn_monthly.date_$previous_day";
		
		$date_field2 = "date_$previous_day";
		
		$this->db->distinct();
		$this->db->select("pr_attn_monthly.emp_id, $date_field");
		$this->db->from("pr_attn_monthly");
		$this->db->where("pr_attn_monthly.emp_id", $emp_id);
		$this->db->where("pr_attn_monthly.att_month", $att_month);
		$query = $this->db->get();	
		$row = $query->row();
		$status = $row->$date_field2;
		if($status =='P')
		{
			return $out_time = $this->get_out_time($emp_id, $previous_date);
		}
		else
		{
			return $status;
		}
	}
	
	function get_out_time($emp_id, $previous_date)
	{
		$this->db->distinct();
		$this->db->select('out_time');
		$this->db->where("emp_id", $emp_id);
		$this->db->where("shift_log_date", $previous_date);
		$query = $this->db->get('pr_emp_shift_log');
		$row = $query->row();
		return $out_time = $row->out_time;
	}
	
	function emp_shift_check($emp_id, $att_date)
	{
		$this->db->select("shift_id, shift_duty");
		$this->db->from("pr_emp_shift_log");
		$this->db->where("emp_id", $emp_id);
		$this->db->where("shift_log_date", $att_date);
		$query = $this->db->get();
		
		if($query->num_rows() > 0 )
		{
			foreach($query->result() as $row)
			{
				$shift_duty = $row->shift_duty;
			}
			
			$this->db->select("sh_type");
			$this->db->from("pr_emp_shift_schedule");
			$this->db->where("shift_id", $shift_duty);
			$query1 = $this->db->get();
			$row = $query1->row();
			return $row->sh_type;
		}
		else
		{
			$this->db->select("pr_emp_shift_schedule.sh_type");
			$this->db->from("pr_emp_shift_schedule");
			$this->db->from("pr_emp_shift");
			$this->db->from("pr_emp_com_info");
			$this->db->where("pr_emp_com_info.emp_id", $emp_id);
			$this->db->where("pr_emp_shift.shift_id = pr_emp_com_info.emp_shift");
			$this->db->where("pr_emp_shift.shift_duty = pr_emp_shift_schedule.shift_id");
			$query = $this->db->get();
			//echo $this->db->last_query();
			$row = $query->row();
			return $row->sh_type;
		
		}
	}
	
	function present_check($date, $emp_id)
	{
		//echo $date;
		$year  = trim(substr($date,0,4));
		$month = trim(substr($date,5,2));
		$day   = trim(substr($date,8,2));
		$date_field = "date_$day";
		$att_month = $year."_".$month."-00";
		
		$this->db->select($date_field);
		$this->db->where("emp_id", $emp_id);
		$this->db->where("att_month", $att_month);
		$this->db->where($date_field, "P");
		$query = $this->db->get("pr_attn_monthly");
		if($query->num_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	function attendance_check($date, $emp_id, $status)
	{
		//echo $date;
		$year  = trim(substr($date,0,4));
		$month = trim(substr($date,5,2));
		$day   = trim(substr($date,8,2));
		$date_field = "date_$day";
		$att_month = $year."_".$month."-00";
		
		$this->db->select($date_field);
		$this->db->where("emp_id", $emp_id);
		$this->db->where("att_month", $att_month);
		$this->db->where($date_field, $status);
		$query = $this->db->get("pr_attn_monthly");
		if($query->num_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	function schedule_check($emp_shift)
	{
		$this->db->where("sh_type", $emp_shift);
		$query = $this->db->get("pr_emp_shift_schedule");
		return $query->result_array();
	}
	
	function time_check_in($date, $start_time, $end_time, $table)
	{
		$this->db->select("date_time");
		$this->db->where("trim(substr(date_time,1,10)) = '$date'");
		$this->db->where("trim(substr(date_time,11,19)) BETWEEN '$start_time' and '$end_time'");
		$this->db->order_by("date_time","ASC");
		$this->db->limit("1");
		$query = $this->db->get($table);
		//echo $this->db->last_query();
		$time ="";
		foreach ($query->result() as $row)
		{
			$time = $row->date_time;
		}
		$time = trim(substr($time,11,19));
		return $time;
	}
	
	function time_check_out($date, $start_time, $end_time, $table)
	{
		$this->db->select("date_time");
		$this->db->where("trim(substr(date_time,1,10)) = '$date'");
		$this->db->where("trim(substr(date_time,11,19)) BETWEEN '$start_time' and '$end_time'");
		$this->db->order_by("date_time","DESC");
		$this->db->limit("1");
		$query = $this->db->get($table);
		$time ="";
		foreach ($query->result() as $row)
		{
			$time = $row->date_time;
		}
		//$time = trim(substr($time,11,19));
		return $time;
	}
	function grid_daily_late_report($year, $month, $date, $grid_emp_id)
	{
				
		$date = date("Y-m-d", mktime(0, 0, 0, $month, $date, $year));
		
		$data = $this->late_commer($year, $month, $date, $grid_emp_id);
		
		//print_r($data);
		if(!isset($data["emp_id"]))
		{
			return "Requested list is empty";
		}
		else
		{
			return $data;
		}
		/*$emp_table = "temp_100009";
		$late_id = $this->late_commer($date, 100009, $emp_table);*/
		
	}
	
	function late_commer($year, $month, $date, $grid_emp_id)
	{
		$data =array();
		
		$this->db->select("pr_emp_shift_log.*");
		$this->db->from("pr_emp_shift_log");
		$this->db->where_in("pr_emp_shift_log.emp_id", $grid_emp_id);
		$this->db->where("pr_emp_shift_log.shift_log_date", $date);
		$this->db->where("pr_emp_shift_log.late_status", 1);
		$this->db->order_by("pr_emp_shift_log.emp_id");
		$query = $this->db->get();
		//echo $this->db->last_query();
		foreach($query->result() as $rows)
		{
			$emp_id = $rows->emp_id;
			$in_out_time = $rows->in_time;
			
			$this->db->select('pr_emp_com_info.emp_id,pr_emp_per_info.emp_full_name, pr_designation.desig_name, pr_emp_com_info.emp_join_date, pr_dept.dept_name, pr_section.sec_name, pr_line_num.line_name, pr_id_proxi.proxi_id, pr_emp_shift.shift_name ,pr_emp_com_info.emp_cat_id');
			$this->db->from('pr_emp_per_info');
			$this->db->from('pr_emp_com_info');
			$this->db->from('pr_designation');
			$this->db->from('pr_dept');
			$this->db->from('pr_section');
			$this->db->from('pr_line_num');
			$this->db->from('pr_emp_shift');
			$this->db->from('pr_id_proxi');
			$this->db->where('pr_emp_per_info.emp_id = pr_emp_com_info.emp_id');
			$this->db->where('pr_emp_com_info.emp_desi_id = pr_designation.desig_id');
			$this->db->where('pr_emp_com_info.emp_dept_id = pr_dept.dept_id');
			$this->db->where('pr_emp_com_info.emp_sec_id = pr_section.sec_id');
			$this->db->where('pr_emp_com_info.emp_line_id = pr_line_num.line_id');
			$this->db->where('pr_emp_com_info.emp_id = pr_id_proxi.emp_id');
			$this->db->where('pr_emp_shift.shift_id = pr_emp_com_info.emp_shift');
			$this->db->where("pr_emp_per_info.emp_id = '$emp_id'");
			
			$query = $this->db->get();
			
			foreach($query->result() as $rows)
			{
				$emp_cat_id = $rows->emp_cat_id;
			
				$data["emp_id"][] = $rows->emp_id;
				$data["proxi_id"][] = $rows->proxi_id;
				$data["emp_name"][] = $rows->emp_full_name;
				$data["desig_name"][] = $rows->desig_name;
				$data["doj"][] = $rows->emp_join_date;
				$data["dept_name"][] = $rows->dept_name;
				$data["sec_name"][] = $rows->sec_name;
				$data["line_name"][] = $rows->line_name;
				$data["shift_name"][] =$rows->shift_name;
				$data["in_time"][] = $in_out_time;
			}
		}
	return $data;
	}
	
	function grid_daily_attendance_summery($year, $month, $date, $grid_emp_id)
	{
		$data =array();
		$report_date = date("Y-m-d", mktime(0, 0, 0, $month, $date, $year));
				
		$this->db->select('emp_id');
		$this->db->from("pr_emp_shift_log");
		$this->db->where_in("emp_id", $grid_emp_id);
		$this->db->where("shift_log_date", $report_date);
		$this->db->group_by('emp_id');
		$data['all_emp'] = $this->db->get()->num_rows();
		//echo $this->db->last_query();
				
		$this->db->select("pr_emp_shift_log.emp_id");
		$this->db->from("pr_emp_shift_log");
		$this->db->where_in("pr_emp_shift_log.emp_id", $grid_emp_id);
		$this->db->where("pr_emp_shift_log.shift_log_date", $report_date);
		$this->db->where("pr_emp_shift_log.in_time !=", "00:00:00");
		$this->db->group_by('pr_emp_shift_log.emp_id');
		$data['all_present'] = $this->db->get()->num_rows();
		
		$this->db->select("emp_id");
		$this->db->from("pr_leave_trans");
		$this->db->where_in("emp_id", $grid_emp_id);
		$this->db->where("start_date", $report_date);
		$this->db->group_by('emp_id');
		$data['all_leave'] = $this->db->get()->num_rows();
				
		$this->db->select("pr_emp_shift_log.emp_id");
		$this->db->from("pr_emp_shift_log");
		$this->db->where_in("pr_emp_shift_log.emp_id", $grid_emp_id);
		$this->db->where("pr_emp_shift_log.shift_log_date", $report_date);
		$this->db->where("pr_emp_shift_log.in_time", "00:00:00");
		$this->db->group_by('pr_emp_shift_log.emp_id');
		$all_absent = $this->db->get()->num_rows();
		$all_absent = $all_absent - $data['all_leave'];
		$data['all_absent'] = $all_absent;
		
		
		
		$this->db->select("pr_emp_shift_log.emp_id");
		$this->db->from("pr_emp_shift_log");
		$this->db->where_in("pr_emp_shift_log.emp_id", $grid_emp_id);
		$this->db->where("pr_emp_shift_log.shift_log_date", $report_date);
		$this->db->where("pr_emp_shift_log.late_status",1);
		$this->db->group_by('pr_emp_shift_log.emp_id');
	 	$data['all_late'] = $this->db->get()->num_rows();
		
		print_r($data);
	}
	
	function grid_daily_out_punch_miss_report($year, $month, $date, $grid_emp_id)
	{
		$data = $this->daily_out_punch_miss($year, $month, $date, $grid_emp_id);
		
		//print_r($data);
		if(!isset($data["emp_id"]))
		{
			return "Requested list is empty";
		}
		else
		{
			return $data;
		}
		/*$emp_table = "temp_100009";
		$late_id = $this->late_commer($date, 100009, $emp_table);*/
		
	}	
	function daily_out_punch_miss($year, $month, $date, $grid_emp_id)
	{
		$data =array();
		$day = date("Y-m-d", mktime(0, 0, 0, $month, $date, $year));
		$date = $day;
		
		$this->db->select("pr_emp_shift_log.*");
		$this->db->from("pr_emp_shift_log");
		$this->db->where_in("pr_emp_shift_log.emp_id", $grid_emp_id);
		$this->db->where("pr_emp_shift_log.shift_log_date", $date);
		$this->db->order_by("pr_emp_shift_log.emp_id");
		$query = $this->db->get();
		foreach($query->result() as $rows)
		{
			$emp_id = $rows->emp_id;
			
			$in_time = $rows->in_time;
			
			$in_out_time = $rows->out_time;
			
			if( $in_time != "00:00:00" and $in_out_time == "00:00:00")
			{
				//echo "<br>$emp_id=> IN=$in_time#####OUT=$in_out_time";
				
				$this->db->select('pr_emp_com_info.emp_id,pr_emp_per_info.emp_full_name, pr_designation.desig_name, pr_emp_com_info.emp_join_date, pr_dept.dept_name, pr_section.sec_name, pr_line_num.line_name, pr_id_proxi.proxi_id, pr_emp_shift.shift_name ,pr_emp_com_info.emp_cat_id');
				$this->db->from('pr_emp_per_info');
				$this->db->from('pr_emp_com_info');
				$this->db->from('pr_designation');
				$this->db->from('pr_dept');
				$this->db->from('pr_section');
				$this->db->from('pr_line_num');
				$this->db->from('pr_emp_shift');
				$this->db->from('pr_id_proxi');
				$this->db->where('pr_emp_per_info.emp_id = pr_emp_com_info.emp_id');
				$this->db->where('pr_emp_com_info.emp_desi_id = pr_designation.desig_id');
				$this->db->where('pr_emp_com_info.emp_dept_id = pr_dept.dept_id');
				$this->db->where('pr_emp_com_info.emp_sec_id = pr_section.sec_id');
				$this->db->where('pr_emp_com_info.emp_line_id = pr_line_num.line_id');
				$this->db->where('pr_emp_com_info.emp_id = pr_id_proxi.emp_id');
				$this->db->where('pr_emp_shift.shift_id = pr_emp_com_info.emp_shift');
				$this->db->where("pr_emp_per_info.emp_id = '$emp_id'");
			
				$query = $this->db->get();
				
				$emp_shift = $this->emp_shift_check($emp_id, $day);
				$in_time = $this->get_formated_in_time($emp_id, $in_time, $emp_shift);
				
			
				foreach($query->result() as $rows)
				{
					$data["emp_id"][] = $rows->emp_id;
					$data["proxi_id"][] = $rows->proxi_id;
					$data["emp_name"][] = $rows->emp_full_name;
					$data["desig_name"][] = $rows->desig_name;
					$data["doj"][] = $rows->emp_join_date;
					$data["dept_name"][] = $rows->dept_name;
					$data["sec_name"][] = $rows->sec_name;
					$data["line_name"][] = $rows->line_name;
					$data["shift_name"][] =$rows->shift_name;
					$data["in_time"][] = $in_time;
				}
			}
		}
	return $data;
	}
	
	function continuous_report($grid_firstdate, $grid_seconddate, $status, $grid_emp_id)
	{
		$data = array();
		$date_array = $this->GetDays($grid_firstdate, $grid_seconddate);
		//print_r($date);
		
		foreach($grid_emp_id as $emp_id)
		{
			if($emp_id != '')
			{
				$count = 0;
				foreach($date_array as $date)
				{
					//echo "$emp_id=>$date<br>";
					
					$present_check = $this->attendance_check($date, $emp_id, $status);
					if($present_check == true)
					{
						 $count++;
					}
				}
				if($count != 0)
				{
					//$data["emp_id"][] = $emp_id;
					//$data["count"][] = $count;
					
					$this->db->select('pr_emp_per_info.emp_full_name, pr_id_proxi.proxi_id, pr_designation.desig_name, pr_dept.dept_name, pr_section.sec_name, pr_line_num.line_name, pr_emp_com_info.emp_join_date ');
					$this->db->from('pr_emp_per_info');
					$this->db->from('pr_emp_com_info');
					$this->db->from('pr_dept');
					$this->db->from('pr_section');
					$this->db->from('pr_line_num');
					$this->db->from('pr_designation');
					$this->db->from('pr_id_proxi');
					$this->db->where('pr_emp_com_info.emp_desi_id = pr_designation.desig_id');
					$this->db->where('pr_emp_com_info.emp_dept_id = pr_dept.dept_id');
					$this->db->where('pr_emp_com_info.emp_sec_id = pr_section.sec_id');
					$this->db->where('pr_emp_com_info.emp_line_id = pr_line_num.line_id');
					$this->db->where('pr_emp_per_info.emp_id = pr_emp_com_info.emp_id');
					$this->db->where("pr_emp_com_info.emp_id = pr_id_proxi.emp_id");
					$this->db->where("pr_emp_com_info.emp_id",$emp_id);
					
					$query1 = $this->db->get();
					foreach($query1->result_array() as $rows)
					{
						$emp_full_name=$rows["emp_full_name"];
						$proxi_id=$rows["proxi_id"];
						$desig_name=$rows["desig_name"];
						$dept_name=$rows["dept_name"];
						$sec_name=$rows["sec_name"];
						$line_name=$rows["line_name"];
						$emp_join_date=$rows["emp_join_date"];
						
						$data['empid'][]=$emp_id ;
						$data['proxid'][]=$proxi_id ;
						$data['fullname'][]=$emp_full_name ;
						$data['jdate'][]=$emp_join_date ;
						$data['dept_name'][]=$dept_name ;
						$data['sec_name'][]=$sec_name ;
						$data['line_name'][]=$line_name ;
						$data['desig'][]=$desig_name ;
						$data['total'][]=$count ;
					}
					
				
				}
			}
		}
		//print_r($data);
		if($data)
		{
			
			return $data;
		}
		else
		{
			return "Requested list is empty";
		}
				
	}
	
	function continuous_late_report($grid_firstdate, $grid_seconddate, $grid_emp_id)
	{
	
		$grid_firstdate		= date('Y-m-d', strtotime($grid_firstdate)); 
		$grid_seconddate	= date('Y-m-d', strtotime($grid_seconddate));
		//$days = $this->GetDays($grid_firstdate, $grid_seconddate);
		
		$data =array();
		//$all_emp = $this->all_emp();
		
		$this->db->select("pr_emp_com_info.emp_id");
		$this->db->from("pr_emp_com_info");
		$this->db->or_where_in("pr_emp_com_info.emp_id", $grid_emp_id);
		$this->db->order_by("pr_emp_com_info.emp_id");
		$query = $this->db->get();
		foreach($query->result() as $rows)
		{
			$emp_id = $rows->emp_id;
			/*$count = 0;
			$emp_table = "temp_$emp_id";
			
			
			foreach($days as $date)
			{			
				$emp_shift = $this->emp_shift_check($emp_id, $date);
			
				$schedule = $this->schedule_check($emp_shift);
				//print_r($schedule);
				$late_start =  $schedule[0]["late_start"]; 
				$intime_end =  $schedule[0]["in_end"];
				$present_check = $this->present_check($date, $emp_id);
				if( $present_check == true)
				{
					$in_out_time = $this->time_check_in($date, $late_start, $intime_end, $emp_table);
								
					if($in_out_time != '')
					{
						$count++;
					}
				}
			}*/
			$this->db->select('SUM(late_status) AS late_count');
			$this->db->where('emp_id', $emp_id);
			$this->db->where("shift_log_date BETWEEN '$grid_firstdate' AND '$grid_seconddate'");
			$query_late = $this->db->get('pr_emp_shift_log');
			echo $this->db->last_query();
			$row = $query_late->row();
			$count = $row->late_count;
			if($count != 0 )
			{
				//echo "$emp_id=>$count<br>";
				$this->db->select('pr_emp_com_info.emp_id,pr_emp_per_info.emp_full_name, pr_designation.desig_name, pr_emp_com_info.emp_join_date, pr_dept.dept_name, pr_section.sec_name, pr_line_num.line_name, pr_id_proxi.proxi_id, pr_emp_shift.shift_name ,pr_emp_com_info.emp_cat_id');
				$this->db->from('pr_emp_per_info');
				$this->db->from('pr_emp_com_info');
				$this->db->from('pr_designation');
				$this->db->from('pr_dept');
				$this->db->from('pr_section');
				$this->db->from('pr_line_num');
				$this->db->from('pr_emp_shift');
				$this->db->from('pr_id_proxi');
				$this->db->where('pr_emp_per_info.emp_id = pr_emp_com_info.emp_id');
				$this->db->where('pr_emp_com_info.emp_desi_id = pr_designation.desig_id');
				$this->db->where('pr_emp_com_info.emp_dept_id = pr_dept.dept_id');
				$this->db->where('pr_emp_com_info.emp_sec_id = pr_section.sec_id');
				$this->db->where('pr_emp_com_info.emp_line_id = pr_line_num.line_id');
				$this->db->where('pr_emp_com_info.emp_id = pr_id_proxi.emp_id');
				$this->db->where('pr_emp_shift.shift_id = pr_emp_com_info.emp_shift');
				$this->db->where("pr_emp_per_info.emp_id = '$emp_id'");
				$query = $this->db->get();
				
				foreach($query->result() as $rows)
				{
					$emp_cat_id = $rows->emp_cat_id;
					
					if($emp_cat_id == 1 || $emp_cat_id == 2 || $emp_cat_id == 5)
					{
						$data["emp_id"][] = $rows->emp_id;
						$data["proxi_id"][] = $rows->proxi_id;
						$data["emp_name"][] = $rows->emp_full_name;
						$data["desig_name"][] = $rows->desig_name;
						$data["doj"][] = $rows->emp_join_date;
						$data["dept_name"][] = $rows->dept_name;
						$data["sec_name"][] = $rows->sec_name;
						$data["line_name"][] = $rows->line_name;
						$data["shift_name"][] =$rows->shift_name;
						$data["count"][] = $count;
					}
				}
			}
		}
		
		if($data)
		{
			
			return $data;
		}
		else
		{
			return "Requested list is empty";
		}
				
	}
	
	function continuous_incre_report($grid_firstdate,$grid_seconddate,$grid_emp_id)
	{
		$data = array();
		foreach($grid_emp_id as $emp_id)
		{
			$this->db->select('prev_emp_id,new_emp_id,prev_dept,new_dept,prev_section,new_section,prev_line, new_line, prev_desig,new_desig,prev_salary,new_salary,effective_month');
			$this->db->where("ref_id",$emp_id);
			$this->db->where("status","1");
			$where ="effective_month BETWEEN '$grid_firstdate' and '$grid_seconddate'";
			$this->db->where($where);
			$this->db->order_by("effective_month","desc");
			 		
			$query = $this->db->get('pr_incre_prom_pun');
				if($query->num_rows() != 0)
			{
				foreach ($query->result() as $rows)	
				{
					$data["prev_emp_id"][] 				= $rows->prev_emp_id;
					$data["new_emp_id"][] 				= $rows->new_emp_id;
					//$data["emp_name"][] 				= $rows->emp_full_name;
					$prev_dept_name = $this->get_dept_name($rows->prev_dept);
					$prev_section_name = $this->get_section_name($rows->prev_section);
					$prev_line_name = $this->get_line_name($rows->prev_line);
					$prev_desig_name = $this->get_desig_name($rows->prev_desig);
					
					$data["prev_dept"][] 				= $prev_dept_name;
					$data["prev_section"][] 			= $prev_section_name;
					$data["prev_line"][] 				= $prev_line_name;
					$data["prev_desig"][]				= $prev_desig_name;
					$data["prev_salary"][] 				= $rows->prev_salary;;
					
					$new_dept_name = $this->get_dept_name($rows->new_dept);
					$new_section_name = $this->get_section_name($rows->new_section);
					$new_line_name = $this->get_line_name($rows->new_line);
					$new_desig_name = $this->get_desig_name($rows->new_desig);
					
					$data["new_dept"][] 				= $new_dept_name;
					$data["new_section"][] 				= $new_section_name;
					$data["new_line"][] 				= $new_line_name;
					$data["new_desig"][] 				= $new_desig_name;
					$data["new_salary"][] 				= $rows->new_salary;;
					$data["effective_month"][] 			= $rows->effective_month;
					
				}
			}
		}
		
		//print_r($data);
		if($data)
		{
			
			return $data;
		}
		else
		{
			return "Requested list is empty";
		}
	}
	
	function continuous_prom_report($grid_firstdate,$grid_seconddate,$grid_emp_id)
	{
		$data = array();
		foreach($grid_emp_id as $emp_id)
		{
			
			//echo $emp_id;
			$this->db->select('prev_emp_id,new_emp_id,prev_dept,new_dept,prev_section,new_section,prev_line, new_line, prev_desig,new_desig,prev_salary,new_salary,effective_month');
			$this->db->where("ref_id",$emp_id);
			$this->db->where("status","2");
			$where ="effective_month BETWEEN '$grid_firstdate' and '$grid_seconddate'";
			$this->db->where($where);
			$this->db->order_by("effective_month","desc");
			 		
			$query = $this->db->get('pr_incre_prom_pun');
			//echo $query->num_rows();
			if($query->num_rows() != 0)
			{
				foreach ($query->result() as $rows)	
				{
					$data["prev_emp_id"][] 				= $rows->prev_emp_id;
					$data["new_emp_id"][] 				= $rows->new_emp_id;
					//$data["emp_name"][] 				= $rows->emp_full_name;
					$prev_dept_name = $this->get_dept_name($rows->prev_dept);
					$prev_section_name = $this->get_section_name($rows->prev_section);
					$prev_line_name = $this->get_line_name($rows->prev_line);
					$prev_desig_name = $this->get_desig_name($rows->prev_desig);
					
					$data["prev_dept"][] 				= $prev_dept_name;
					$data["prev_section"][] 			= $prev_section_name;
					$data["prev_line"][] 				= $prev_line_name;
					$data["prev_desig"][]				= $prev_desig_name;
					$data["prev_salary"][] 				= $rows->prev_salary;;
					
					$new_dept_name = $this->get_dept_name($rows->new_dept);
					$new_section_name = $this->get_section_name($rows->new_section);
					$new_line_name = $this->get_line_name($rows->new_line);
					$new_desig_name = $this->get_desig_name($rows->new_desig);
					
					$data["new_dept"][] 				= $new_dept_name;
					$data["new_section"][] 				= $new_section_name;
					$data["new_line"][] 				= $new_line_name;
					$data["new_desig"][] 				= $new_desig_name;
					$data["new_salary"][] 				= $rows->new_salary;;
					$data["effective_month"][] 			= $rows->effective_month;
					
				}
			}
		}
		
		//$data["new_emp_id"] = array_unique($data["new_emp_id"]);
		//print_r($data);
		if($data)
		{
			
			return $data;
		}
		else
		{
			return "Requested list is empty";
		}
	}
	
	function grid_app_letter($grid_emp_id)
	{
		
		$this->db->select('pr_emp_com_info.emp_id,pr_emp_com_info.gross_sal,pr_emp_per_info.emp_full_name, pr_emp_per_info.bangla_nam , pr_emp_per_info.emp_fname,pr_emp_per_info.emp_mname, pr_designation.desig_name, pr_designation.desig_bangla, pr_emp_com_info.emp_join_date, pr_emp_com_info.emp_sal_gra_id , pr_dept.dept_name, pr_section.sec_name, pr_section.sec_bangla, pr_id_proxi.proxi_id, pr_emp_add.emp_pre_add, pr_emp_add.emp_par_add');
		$this->db->from('pr_emp_per_info');
		$this->db->from('pr_emp_com_info');
		$this->db->from('pr_designation');
		$this->db->from('pr_dept');
		$this->db->from('pr_section');
		$this->db->from('pr_id_proxi');
		$this->db->from('pr_emp_add');
		$this->db->or_where_in("pr_emp_com_info.emp_id", $grid_emp_id);
		$this->db->where('pr_emp_per_info.emp_id = pr_emp_com_info.emp_id');
		$this->db->where('pr_emp_per_info.emp_id = pr_id_proxi.emp_id');
		$this->db->where('pr_emp_per_info.emp_id = pr_emp_add.emp_id');
		$this->db->where('pr_emp_com_info.emp_desi_id = pr_designation.desig_id');
		$this->db->where('pr_emp_com_info.emp_dept_id = pr_dept.dept_id');
		$this->db->where('pr_emp_com_info.emp_sec_id = pr_section.sec_id');
		
		$this->db->order_by("pr_emp_com_info.emp_id");
		$query = $this->db->get();
		
		if($query->num_rows() == 0)
		{
			return "Employee ID range does not exist!";
			
		}
		else
		{
			return $query;	
		}
		//print_r($query->result_array());
	
	}
	
	function grid_pay_slip($year_month, $grid_emp_id)
	{
		
		$this->db->select('pr_emp_com_info.emp_id,pr_emp_com_info.gross_sal,pr_emp_per_info.emp_full_name,pr_emp_per_info.emp_fname,pr_emp_per_info.emp_mname, pr_designation.desig_name, pr_emp_com_info.emp_join_date, pr_dept.dept_name, pr_section.sec_name, pr_line_num.line_name ,pr_grade.gr_name, pr_id_proxi.proxi_id, pr_emp_add.emp_pre_add, pr_emp_add.emp_par_add, pr_emp_position.posi_name, pr_pay_scale_sheet.* ');
			$this->db->from('pr_emp_per_info');
			$this->db->from('pr_emp_com_info');
			$this->db->from('pr_designation');
			$this->db->from('pr_dept');
			$this->db->from('pr_section');
			$this->db->from('pr_line_num');
			$this->db->from('pr_id_proxi');
			$this->db->from('pr_emp_add');
			$this->db->from('pr_emp_position');
			$this->db->from('pr_grade');
			$this->db->from('pr_pay_scale_sheet');
			$this->db->or_where_in("pr_emp_com_info.emp_id", $grid_emp_id);
			$this->db->like('pr_pay_scale_sheet.salary_month', $year_month);
			$this->db->where('pr_emp_per_info.emp_id = pr_emp_com_info.emp_id');
			$this->db->where('pr_emp_per_info.emp_id = pr_id_proxi.emp_id');
			$this->db->where('pr_emp_per_info.emp_id = pr_emp_add.emp_id');
			$this->db->where('pr_emp_com_info.emp_desi_id = pr_designation.desig_id');
			$this->db->where('pr_emp_com_info.emp_dept_id = pr_dept.dept_id');
			$this->db->where('pr_emp_com_info.emp_sec_id = pr_section.sec_id');
			$this->db->where('pr_emp_com_info.emp_line_id = pr_line_num.line_id');
			$this->db->where('pr_emp_com_info.emp_position_id = pr_emp_position.posi_id');
			$this->db->where('pr_grade.gr_id = pr_emp_com_info.emp_sal_gra_id');
			$this->db->where('pr_emp_com_info.emp_id = pr_pay_scale_sheet.emp_id');
			$this->db->order_by("pr_emp_com_info.emp_id");
		$query = $this->db->get();
		
		if($query->num_rows() == 0)
		{
			return "Employee ID range does not exist!";
			
		}
		else
		{
			return $query->result_array();	
		}
		//print_r($query->result_array());
	
	}
	
	function grid_provident_fund($year_month, $grid_emp_id)
	{
		$pf_status = $this->common_model->get_setup_attributes(6);
		if($pf_status == "Yes")
		{
			$data = array();
			$this->db->select('pr_emp_com_info.emp_id,pr_emp_per_info.emp_full_name,  pr_designation.desig_name, pr_emp_com_info.emp_join_date, pr_dept.dept_name, pr_section.sec_name, pr_line_num.line_name, pr_id_proxi.proxi_id, pr_emp_shift.shift_name,pr_emp_com_info.emp_cat_id, pr_pay_scale_sheet.basic_sal, pr_pay_scale_sheet.gross_sal, pr_pay_scale_sheet.provident_fund, pr_pay_scale_sheet.pf_bank_interest, pr_pay_scale_sheet.company_pf, pr_pay_scale_sheet.update_pf');
			$this->db->from('pr_emp_per_info');
			$this->db->from('pr_emp_com_info');
			$this->db->from('pr_designation');
			$this->db->from('pr_dept');
			$this->db->from('pr_section');
			$this->db->from('pr_line_num');
			$this->db->from('pr_id_proxi');
			$this->db->from('pr_emp_shift');
			$this->db->from('pr_pay_scale_sheet');
			$this->db->where_in("pr_pay_scale_sheet.emp_id", $grid_emp_id);
			$this->db->like('pr_pay_scale_sheet.salary_month', $year_month);
			$this->db->where('pr_emp_per_info.emp_id = pr_pay_scale_sheet.emp_id');
			$this->db->where('pr_pay_scale_sheet.emp_id = pr_emp_com_info.emp_id');
			$this->db->where("pr_emp_com_info.ot_entitle","1");
			$this->db->where('pr_emp_com_info.emp_desi_id = pr_designation.desig_id');
			$this->db->where('pr_emp_com_info.emp_dept_id = pr_dept.dept_id');
			$this->db->where('pr_emp_com_info.emp_sec_id = pr_section.sec_id');
			$this->db->where('pr_emp_com_info.emp_line_id = pr_line_num.line_id');
			$this->db->where('pr_emp_com_info.emp_id = pr_id_proxi.emp_id');
			$this->db->where('pr_emp_shift.shift_id = pr_emp_com_info.emp_shift');
			$this->db->where("pr_pay_scale_sheet.provident_fund != 0");
			$this->db->order_by("pr_emp_com_info.emp_id","ASC");
			$this->db->group_by("pr_pay_scale_sheet.emp_id");
			$query = $this->db->get();
			
			if($query->num_rows() > 0)
			{
				$search_date = 	$year_month."-"."1";	
				foreach($query->result() as $rows)
				{
					$emp_id = $rows->emp_id;
															
						$data["emp_id"][] 		= $emp_id;
						$data["proxi_id"][] 	= $rows->proxi_id;
						$data["emp_name"][] 	= $rows->emp_full_name;
						$data["doj"][] 			= $rows->emp_join_date;
						$service_month = $this->common_model->get_service_month($search_date,$rows->emp_join_date);
						
						$data["service_month"][]	= $service_month;
						$data["dept_name"][] 		= $rows->dept_name;
						$data["sec_name"][] 		= $rows->sec_name;
						$data["desig_name"][] 		= $rows->desig_name;
						$data["line_name"][]		= $rows->line_name;
						$data["basic_sal"][] 		= $rows->basic_sal;
						$data["gross_sal"][] 		= $rows->gross_sal;
						$data["provident_fund"][] 	= $rows->provident_fund;
						$data["pf_bank_interest"][] = $rows->pf_bank_interest;
						$data["company_pf"][] 		= $rows->company_pf;
						$data["update_pf"][] 		= $rows->update_pf;
						
						/*$this->db->select_sum('provident_fund');
						$this->db->where('emp_id',$emp_id); 
						$this->db->where('salary_month <=',$search_date); 
						$this->db->group_by("salary_month");
						$query = $this->db->get('pr_pay_scale_sheet');*/
						//$query = $this->db->query("select SUM(`provident_fund`) AS provident_fund, COUNT(`provident_fund`) AS deduction_month FROM  (SELECT * FROM  pr_pay_scale_sheet WHERE `emp_id`='$emp_id' GROUP BY `salary_month`) AS pay_sheet WHERE pay_sheet.salary_month <= '$search_date'");
						//$row = $query->row();
						//$sum_pf =  $row->provident_fund;
						//$deduction_month =  $row->deduction_month;
						//echo $this->db->last_query();
						//$data["deduction_month"][] 	= $deduction_month;	
						//$data["sum_pf"][] 	= $sum_pf;		
						
						$provident_fund_rules 		= $this->pf_model->get_provident_fund_rules($service_month);
						$data["pf_percentage"][]	= $provident_fund_rules['pf_percentage'];
						
				}
				
				if($data)
				{
					//print_r($data);
					return $data;
				}
				else
				{
					return "Requested list is empty";
				}
			}
			else
			{
				return "Requested list is empty";
			}
		}
		else
		{
			return "Requested list is empty";
		}
	}
	
	function grid_id_card($grid_emp_id)
	{
		$this->db->select('pr_emp_com_info.emp_id,pr_emp_per_info.bangla_nam,pr_emp_per_info.img_source, pr_designation.desig_bangla, pr_emp_com_info.emp_join_date, pr_dept.dept_name, pr_section.sec_bangla');
		$this->db->from('pr_emp_per_info');
		$this->db->from('pr_emp_com_info');
		$this->db->from('pr_designation');
		$this->db->from('pr_dept');
		$this->db->from('pr_section');
		$this->db->or_where_in("pr_emp_com_info.emp_id", $grid_emp_id);
		$this->db->where('pr_emp_per_info.emp_id = pr_emp_com_info.emp_id');
		$this->db->where('pr_emp_com_info.emp_desi_id = pr_designation.desig_id');
		$this->db->where('pr_emp_com_info.emp_dept_id = pr_dept.dept_id');
		$this->db->where('pr_emp_com_info.emp_sec_id = pr_section.sec_id');
		$this->db->order_by("pr_emp_com_info.emp_id");
		$query = $this->db->get();
		
		if($query->num_rows() == 0)
		{
			return "Employee ID range does not exist!";
			
		}
		else
		{
			return $query;	
		}
		//print_r($query->result_array());
	}
	
	function grid_id_card_english($grid_emp_id)
	{
		$this->db->select('pr_emp_com_info.emp_id,pr_emp_per_info.emp_full_name,pr_emp_per_info.img_source, pr_designation.desig_name, pr_emp_com_info.emp_join_date, pr_dept.dept_name, pr_section.sec_name');
		$this->db->from('pr_emp_per_info');
		$this->db->from('pr_emp_com_info');
		$this->db->from('pr_designation');
		$this->db->from('pr_dept');
		$this->db->from('pr_section');
		$this->db->or_where_in("pr_emp_com_info.emp_id", $grid_emp_id);
		$this->db->where('pr_emp_per_info.emp_id = pr_emp_com_info.emp_id');
		$this->db->where('pr_emp_com_info.emp_desi_id = pr_designation.desig_id');
		$this->db->where('pr_emp_com_info.emp_dept_id = pr_dept.dept_id');
		$this->db->where('pr_emp_com_info.emp_sec_id = pr_section.sec_id');
		$this->db->order_by("pr_emp_com_info.emp_id");
		$query = $this->db->get();
		
		if($query->num_rows() == 0)
		{
			return "Employee ID range does not exist!";
			
		}
		else
		{
			return $query;	
		}
		//print_r($query->result_array());
	}
	
	function grid_job_card($grid_firstdate, $grid_seconddate, $grid_emp_id)
	{
		$sStartDate = date("Y-m-d", strtotime($grid_firstdate)); 
		$sEndDate = date("Y-m-d", strtotime($grid_seconddate));
				
		$data = array();
		
		$this->db->select('emp_id');
		$this->db->from('pr_emp_com_info');
		$this->db->where_in('emp_id', $grid_emp_id);
		$this->db->order_by("emp_id");
		$query = $this->db->get();
		//echo $this->db->last_query();
		foreach($query->result() as $row)
		{
			$emp_id = $row->emp_id;
			
			$this->db->distinct();
			$this->db->select('pr_emp_per_info.emp_full_name,pr_designation.desig_name,pr_dept.dept_name,pr_section.sec_name,pr_line_num.line_name,pr_emp_com_info.emp_join_date,pr_id_proxi.proxi_id');
			$this->db->from('pr_emp_per_info');
			$this->db->from('pr_emp_com_info');
			$this->db->from('pr_attn_monthly');
			$this->db->from('pr_id_proxi');
			$this->db->from('pr_dept');
			$this->db->from('pr_section');
			$this->db->from('pr_line_num');
			$this->db->from('pr_designation');
			$this->db->where('pr_emp_com_info.emp_desi_id = pr_designation.desig_id');
			$this->db->where('pr_emp_com_info.emp_dept_id = pr_dept.dept_id');
			$this->db->where('pr_emp_com_info.emp_sec_id = pr_section.sec_id');
			$this->db->where('pr_emp_com_info.emp_line_id = pr_line_num.line_id');
			$this->db->where('pr_emp_per_info.emp_id = pr_emp_com_info.emp_id');
			$this->db->where('pr_id_proxi.emp_id = pr_emp_com_info.emp_id');
			$this->db->where('pr_emp_per_info.emp_id', $emp_id);
			
			$query = $this->db->get();
			foreach($query->result() as $row)
			{
				$data["emp_id"][] = $emp_id;
				
				$data["emp_full_name"][] = $row->emp_full_name;
				
				$data["proxi_id"][] = $row->proxi_id;
				
				$data["sec_name"][] = $row->sec_name;
				
				$data["line_name"][] = $row->line_name;
				
				$data["desig_name"][] = $row->desig_name;
				
				$emp_join_date = $row->emp_join_date;
				$emp_join_date_year=trim(substr($emp_join_date,0,4));
				$emp_join_date_month=trim(substr($emp_join_date,5,2));
				$emp_join_date_day=trim(substr($emp_join_date,8,2));
				$emp_join_date = date("d-M-y", mktime(0, 0, 0, $emp_join_date_month, $emp_join_date_day, $emp_join_date_year));
				$data["emp_join_date"][] = $emp_join_date;
				
				$data["dept_name"][] = $row->dept_name;
			}
			
			$joining_check = $this->get_join_date($emp_id, $sStartDate, $sEndDate);
			if( $joining_check != false)
			{
				$start_date = $joining_check ;
			}
			else
			{
				$start_date = $sStartDate ;
			}
			
			$resign_check  = $this->get_resign_date($emp_id, $sStartDate, $sEndDate);
			if($resign_check != false)
			{
				$end_date = $resign_check ;
			}
			else
			{
				$end_date = $sEndDate ;
			}
			
			$left_check  = $this->get_left_date($emp_id, $sStartDate, $sEndDate);
			if($left_check != false)
			{
				$end_date = $left_check ;
			}
			else
			{
				$end_date = $sEndDate ;
			}
			
			$leave = $this->leave_per_emp($start_date, $end_date, $emp_id);
			//print_r($leave);
			
			$weekend = $this->check_weekend($start_date, $end_date, $emp_id);
			//print_r($weekend);
			
			$holiday = $this->holiday_calculation($start_date, $end_date);
			
			$days = $this->GetDays($start_date, $end_date);
			
			foreach($days as $day)
			{
			
				$this->db->select('pr_emp_shift_log.in_time , pr_emp_shift_log.out_time, pr_emp_shift_log.shift_log_date, pr_emp_shift_log.ot_hour, pr_emp_shift_log.extra_ot_hour, pr_emp_shift_log.late_status');
				$this->db->from('pr_emp_shift_log');
				$this->db->where('pr_emp_shift_log.emp_id', $emp_id);
				$this->db->where("pr_emp_shift_log.shift_log_date", $day);
				$this->db->order_by("pr_emp_shift_log.shift_log_date");
				$this->db->limit(1);
				$query = $this->db->get();
				//echo $this->db->last_query();
				foreach($query->result() as $row)
				{
					
					
					
					if(in_array($row->shift_log_date,$leave))
					{
						$leave_type = $this->get_leave_type($row->shift_log_date,$emp_id);
						$att_status_count = "Leave";
						$att_status = $leave_type;
						$row->in_time = "00:00:00";
						$row->out_time = "00:00:00";
					}
					elseif(in_array($row->shift_log_date,$holiday))
					{
						$att_status = "Holiday";
						$att_status_count = "Holiday";
						$row->in_time = "00:00:00";
						$row->out_time = "00:00:00";
						$row->ot_hour ="";
						
					}
					elseif(in_array($row->shift_log_date,$weekend))
					{
						$att_status = "Work Off";
						$att_status_count = "Work Off";
						$row->in_time = "00:00:00";
						$row->out_time = "00:00:00";
						$row->ot_hour ="";
					}
					elseif($row->in_time !='00:00:00' and $row->out_time !='00:00:00')
					{
						$att_status = "P";
						$att_status_count = "P";
					}
					elseif($row->in_time !='00:00:00' or $row->out_time !='00:00:00')
					{
						$att_status = "P(Error)";
						$att_status_count = "P(Error)";
					}
					else
					{
						$att_status = "A";
						$att_status_count = "A";
					}
					
					if($att_status !="Leave" and $att_status !="Holiday" and $att_status !="Work Off" and $att_status !="A" )
					{
						$table = "temp_$emp_id";
						$lunch_out_start = "12:55:00";
						$lunch_out_end = "15:00:00";
						$lunch_out = $this->time_check_in($day, $lunch_out_start , $lunch_out_end , $table);
						
						if($lunch_out !='')
						{
							$lunch_out_hour = trim(substr($lunch_out,0,2));
							$lunch_out_minute = trim(substr($lunch_out,3,2));
							$lunch_out_sec = trim(substr($lunch_out,6,2));
							$lunch_out = date("h:i:s A", mktime($lunch_out_hour, $lunch_out_minute, $lunch_out_sec, 0, 0, 0));
						}
						else
						{
							$lunch_out = "";
						}
						
						
						$lunch_in = $this->time_check_out($day, $lunch_out_start , $lunch_out_end , $table);
						
						if($lunch_in !='')
						{
							$lunch_in = trim(substr($lunch_in,11,19));	
							
							$lunch_in_hour = trim(substr($lunch_in,0,2));
							$lunch_in_minute = trim(substr($lunch_in,3,2));
							$lunch_in_sec = trim(substr($lunch_in,6,2));
							$lunch_in = date("h:i:s A", mktime($lunch_in_hour, $lunch_in_minute, $lunch_in_sec, 0, 0, 0));
						}
						else
						{
							$lunch_in = "";
						}
					}
					else
					{
						$lunch_out = "";
						$lunch_in = "";
					}
					
					$emp_shift = $this->emp_shift_check($emp_id, $day);
					
					$schedule = $this->schedule_check($emp_shift);
					//print_r($schedule);
					$start_time		=  $schedule[0]["in_start"]; 
					$late_time 		=  $schedule[0]["late_start"]; 
					$end_time   	=  $schedule[0]["in_end"];
					$out_start_time	=  $schedule[0]["out_start"];
					$out_end_time	=  $schedule[0]["out_end"];	
					
					if($row->late_status == 1)
					{
						$remark = "Late";
					}
					else
					{
						$remark = "";
					}
					
					$shift_log_date = $row->shift_log_date;
					$year=trim(substr($shift_log_date,0,4));
					$month=trim(substr($shift_log_date,5,2));
					$date=trim(substr($shift_log_date,8,2));
					$shift_log_date = date("d-M-y", mktime(0, 0, 0, $month, $date, $year));
					
					if($row->in_time != "00:00:00")
					{
						$in_time = $row->in_time;
						$in_time = $this->get_formated_in_time($emp_id, $in_time, $emp_shift);	
					}
					else
					{
						$in_time = "00:00:00";
					}
					
					if($row->out_time != "00:00:00")
					{
						$out_time = $row->out_time;
						$out_time = $this->get_formated_out_time($emp_id, $out_time, $emp_shift);
					}
					else
					{
						$out_time = "00:00:00";
					}
					
					$total_ot_hour = $row->ot_hour; // + $row->extra_ot_hour; , This is for extra ot hour add to Job card.
									
					$data[$emp_id]["shift_log_date"][] 	= $shift_log_date;
					$data[$emp_id]["in_time"][] 		= $in_time;
					$data[$emp_id]["out_time"][] 		= $out_time;
					$data[$emp_id]["ot_hour"][] 		= $total_ot_hour;
					$data[$emp_id]["att_status"][] 		= $att_status;
					$data[$emp_id]["att_status_count"][] = $att_status_count;
					$data[$emp_id]["lunch_out"][] 		= $lunch_out;
					$data[$emp_id]["lunch_in"][] 		= $lunch_in;
					$data[$emp_id]["remark"][] 			= $remark;
					
					//echo "$emp_id=>$row->shift_log_date=>$row->in_time=>$row->out_time=>$row->ot_hour==>$att_status<==Lunch OUT=>$lunch_out==Lunch IN=>$lunch_in==Remark=>$remark<br>";
					
					
				}
			}
		}
		//print_r($data);
		return $data;
		
	}
	
	function get_join_date($emp_id, $sStartDate, $sEndDate)
	{
		$this->db->select('emp_join_date');
		$this->db->where("emp_join_date BETWEEN '$sStartDate' AND '$sEndDate'");
		$this->db->where("emp_id = '$emp_id'");
		$query = $this->db->get("pr_emp_com_info");
		if($query->num_rows() > 0)
		{
			$row = $query->row();
			return $emp_join_date = $row->emp_join_date;
		}
		else
		{
			return false;
		}
	}
	
	function get_resign_date($emp_id, $sStartDate, $sEndDate)
	{
		$this->db->select('resign_date');
		$this->db->where("resign_date BETWEEN '$sStartDate' AND '$sEndDate'");
		$this->db->where("emp_id = '$emp_id'");
		$query = $this->db->get("pr_emp_resign_history");
		if($query->num_rows() > 0)
		{
			$row = $query->row();
			return $resign_date = $row->resign_date;
		}
		else
		{
			return false;
		}
	}
	
	function get_left_date($emp_id, $sStartDate, $sEndDate)
	{
		$this->db->select('left_date');
		$this->db->where("left_date BETWEEN '$sStartDate' AND '$sEndDate'");
		$this->db->where("emp_id = '$emp_id'");
		$query = $this->db->get("pr_emp_left_history");
		if($query->num_rows() > 0)
		{
			$row = $query->row();
			return $resign_date = $row->left_date;
		}
		else
		{
			return false;
		}
	}
	
	function leave_per_emp($sStartDate, $sEndDate, $emp_id)
	{
		$this->db->select("start_date");
		$this->db->where("start_date BETWEEN '$sStartDate' AND '$sEndDate'");
		$this->db->where("emp_id = '$emp_id'");
		$query = $this->db->get("pr_leave_trans");
		$leave = array();
		foreach ($query->result() as $row)
		{
			$leave[] = $row->start_date;
		}
		return $leave;
	}
	
	function check_weekend($sStartDate, $sEndDate, $emp_id)
	{
		$this->db->select("work_off_date");
		$this->db->where("work_off_date BETWEEN '$sStartDate' AND '$sEndDate'");
		$this->db->where("emp_id = '$emp_id'");
		$query = $this->db->get("pr_work_off");
		$weekend = array();
		foreach ($query->result() as $row)
		{
			$weekend[] = $row->work_off_date;
		}
		return $weekend;
	}
	
	function holiday_calculation($sStartDate, $sEndDate)
	{
		$this->db->select("start_date");
		$this->db->where("start_date BETWEEN '$sStartDate' AND '$sEndDate'");
		$query = $this->db->get("pr_holiday");
		$holiday = array();
		foreach ($query->result() as $row)
		{
			$holiday[] = $row->start_date;
		}
		return $holiday;
	}
	
	function grid_monthly_att_register($year_month, $grid_emp_id)
	{
		$year= trim(substr($year_month,0,4));
		$month = trim(substr($year_month,5,2));
		
		
		$att_month = "att_".$year."_".$month;
		
		if(!$this->db->table_exists($att_month))
		{
			return "Report month does not exist!";
		}
		
		$this->db->select('pr_emp_per_info.emp_full_name,pr_designation.desig_name,pr_attn_monthly.*');
		$this->db->from('pr_emp_per_info');
		$this->db->from('pr_emp_com_info');
		$this->db->from('pr_attn_monthly');
			$this->db->from('pr_dept');
			$this->db->from('pr_section');
			$this->db->from('pr_line_num');
			$this->db->from('pr_designation');
			$this->db->or_where_in("pr_emp_per_info.emp_id", $grid_emp_id);
			$this->db->like("pr_attn_monthly.att_month",$year_month);
			$this->db->where('pr_emp_com_info.emp_desi_id = pr_designation.desig_id');
			$this->db->where('pr_emp_com_info.emp_dept_id = pr_dept.dept_id');
			$this->db->where('pr_emp_com_info.emp_sec_id = pr_section.sec_id');
			$this->db->where('pr_emp_com_info.emp_line_id = pr_line_num.line_id');
		$this->db->where('pr_emp_per_info.emp_id = pr_emp_com_info.emp_id');
		$this->db->where('pr_emp_per_info.emp_id = pr_attn_monthly.emp_id');
		$this->db->order_by("pr_emp_com_info.emp_id");
		$this->db->group_by('pr_attn_monthly.emp_id');
		$query = $this->db->get();	
		//echo $this->db->last_query();
		if($query->num_rows > 0)
		{	
			return $query;
		}
		else
		{
			return "Soryy! Requested list is empty";
		}
	}
	
	function grid_extra_ot($grid_firstdate, $grid_seconddate, $grid_emp_id)
	{
		$data = array();
		$query = $this->all_reguler_emp($grid_emp_id);
		foreach($query->result() as $row)
		{
			$emp_id = $row->emp_id;
			$data["emp_id"][] = $row->emp_id;
					
			$this->db->distinct();
			$this->db->select('pr_emp_per_info.emp_full_name,pr_designation.desig_name,pr_dept.dept_name,pr_section.sec_name,pr_line_num.line_name,pr_emp_com_info.emp_join_date,pr_id_proxi.proxi_id');
			$this->db->from('pr_emp_per_info');
			$this->db->from('pr_emp_com_info');
			$this->db->from('pr_attn_monthly');
			$this->db->from('pr_id_proxi');
			$this->db->from('pr_dept');
			$this->db->from('pr_section');
			$this->db->from('pr_line_num');
			$this->db->from('pr_designation');
			$this->db->where('pr_emp_per_info.emp_id', $emp_id);
			$this->db->where('pr_emp_com_info.emp_desi_id = pr_designation.desig_id');
			$this->db->where('pr_emp_com_info.emp_dept_id = pr_dept.dept_id');
			$this->db->where('pr_emp_com_info.emp_sec_id = pr_section.sec_id');
			$this->db->where('pr_emp_com_info.emp_line_id = pr_line_num.line_id');
			$this->db->where('pr_emp_per_info.emp_id = pr_emp_com_info.emp_id');
			$this->db->where('pr_id_proxi.emp_id = pr_emp_com_info.emp_id');
			$query2 = $this->db->get();
			
			//echo $this->db->last_query();
			foreach($query2->result() as $rows2)
			{
				$data["emp_full_name"][] = $rows2->emp_full_name;
				$data["proxi_id"][] = $rows2->proxi_id;
				$data["sec_name"][] = $rows2->sec_name;
				$data["line_name"][] = $rows2->line_name;
				$data["desig_name"][] = $rows2->desig_name;
				$emp_join_date = $rows2->emp_join_date;
				$emp_join_date_year		= trim(substr($emp_join_date,0,4));
				$emp_join_date_month	= trim(substr($emp_join_date,5,2));
				$emp_join_date_day		= trim(substr($emp_join_date,8,2));
				$emp_join_date 			= date("d-M-y", mktime(0, 0, 0, $emp_join_date_month, $emp_join_date_day, $emp_join_date_year));
				
				$data["emp_join_date"][] = $emp_join_date;
				$data["dept_name"][] = $rows2->dept_name;
			}
			
			$this->db->select();
			$this->db->where("emp_id",$row->emp_id);
			$this->db->where("shift_log_date BETWEEN '$grid_firstdate' AND '$grid_seconddate' ");
			$this->db->order_by("shift_log_date");
			$query1 = $this->db->get("pr_emp_shift_log");
			foreach($query1->result() as $rows )
			{
				
				$data[$emp_id]["shift_log_date"][] 	= $rows->shift_log_date;
				$data[$emp_id]["in_time"][] 		= $rows->in_time;
				$data[$emp_id]["out_time"][] 		= $rows->out_time;
				$data[$emp_id]["ot_hour"][] 		= $rows->ot_hour;
				$data[$emp_id]["extra_ot_hour"][] 	= $rows->extra_ot_hour;
			}
		}
		
		return $data;
	}
	
	function manual_attendance_entry($grid_firstdate, $grid_seconddate, $manual_time, $grid_emp_id)
	{
		$data = array();
		
		$query = $this->all_reguler_emp($grid_emp_id);
		
		foreach($query->result() as $row)
		{
			$empid = $row->emp_id;
			
			$emp_table="temp_".$empid;
					
			$deviceid=1;	
			list($hour, $minute,$sec) = explode(':', trim($manual_time) );	
			
			
			$min_start = $minute-2;
			$min_end = $minute+3;
			$sec_start = 0;
			$sec_end = 60;
			
			$proxid = $this->prox($empid);
			
			$days = $this->GetDays($grid_firstdate, $grid_seconddate);
			foreach($days as $day)
				{
					//echo $day.'===';
					$rand_minutes=rand($min_start,$min_end);
					$rand_sec=rand($sec_start,$sec_end);
					
					$year=trim(substr($day,0,4));
					$month=trim(substr($day,5,2));
					$day=trim(substr($day,8,2));
					$intime_entry = date("Y-m-d H:i:s", mktime($hour, $rand_minutes, $rand_sec, $month, $day, $year));
					
					$data = array( 'device_id'	=>$deviceid	, 'proxi_id'  =>$proxid, 'date_time'  => $intime_entry);		
					$this->db->insert($emp_table, $data);
					//print_r($data);
						 
				}
		}
		 return "Insert Successfully";
	}
	
	function manual_entry_Delete($grid_firstdate, $grid_seconddate, $grid_emp_id)
	{
		
		$data = array();
		
		$query = $this->all_emp_for_manual_delete($grid_emp_id);
		//print_r($query->result_array());
		
		foreach($query->result() as $row)
		{
			$id = $row->emp_id;
			
			$startdate = $grid_firstdate; 
			$temp_table = "temp_$id";
			
			$proxi = $this->prox($id);
			
			$days = $this->GetDays($grid_firstdate, $grid_seconddate);
			//print_r($days);
			//return "Test";
			foreach($days as $perday)
			{
				$date  = $perday;
				$year  = trim(substr($date,0,4));
				$month = trim(substr($date,5,2));
				$day   = trim(substr($date,8,2));
				
				$att_table = "att_".$year."_".$month;
				$date = date("d-m-Y", mktime(0, 0, 0, $month, $day, $year));
				$search_date = date("Ymd", mktime(0, 0, 0, $month, $day, $year));
				$file_name = "data/$date.TXT";
				$temp_table = "temp_$id";
						
				
				$where ="trim(substr(date_time ,1,10)) = '$perday'";
				$this->db->where($where);
				$data=$this->db->delete($temp_table);
				//echo $this->db->last_query();
				//return "Test";
				$where ="trim(substr(date_time ,1,10)) = '$perday' and proxi_id='$proxi'";
				$this->db->where($where);
				$data=$this->db->delete($att_table);
				//$this->db->last_query();	
				//return "Test";	
				if ($data)
				{
					if( file_exists($file_name) )
					{ 
						
						$data = file($file_name);
						
						$out = array();
						
						foreach($data as $line) {
							$match_line =  substr($line,5,10);
							 
							if(trim($match_line) != "$proxi") {
								$out[] = $line;
							}
							
						}
						$fp = fopen($file_name, "w+");
						flock($fp, LOCK_EX);
						foreach($out as $line) {
							fwrite($fp, $line);
						}
						flock($fp, LOCK_UN);
						fclose($fp);
					}
					
				} 
				else
				{
					return "Delete failed";
				}
			}
		}
		return "Delete successfully";
	
	}
	
	function save_work_off($grid_firstdate, $grid_emp_id)
	{
		$data = array();
		
		$query = $this->all_reguler_emp($grid_emp_id);
		
		foreach($query->result() as $row)
		{
			$work_off_empid = $row->emp_id;
			
			 $year_month = $grid_firstdate ;
			 $this->db->select("*");
			 $this->db->where('work_off_date',$year_month);
			 $this->db->where('emp_id',$work_off_empid);
			 $query = $this->db->get("pr_work_off");
			 $num_row = $query->num_rows();
			 if($num_row == 0 )
			 {
				$data = array(
				'emp_id'		=> $work_off_empid,
				'work_off_date'		=> $year_month
						
				);
				//print_r($data);
				$this->db->insert('pr_work_off', $data) ;
				
			 }
		}
		 return "Insert Successfully";
	}
	
	function save_holiday($grid_firstdate, $holiday_description)
	{
		$sStartDate = $grid_firstdate;
		
		$this->db->select("start_date");
		$this->db->where('start_date',$sStartDate);
		$query = $this->db->get("pr_holiday");
		$num_row = $query->num_rows();
		if($num_row == 0 )
		{			
			
			$data = array(
					'start_date '    => $sStartDate ,
					'description '	=> $holiday_description	);
			
			if($this->db->insert('pr_holiday', $data))
			{
				echo "Save successfully";
			}
			else
			{
				echo "Insert failed";
			}
		}
		else
		{
			echo "Already inserted";
		}
	}
	
	function grid_monthly_salary_sheet($sal_year_month, $grid_status, $grid_emp_id)
	{
		//print_r($grid_emp_id);
		/*$this->db->select("pr_dept.dept_name");
		$this->db->from('pr_dept');
		$this->db->from('pr_emp_com_info');
		$this->db->where_in('pr_emp_com_info.emp_id', $grid_emp_id);
		$this->db->group_by("pr_dept.dept_name"); 
		$this->db->order_by("pr_dept.dept_name");
		$query = $this->db->get();	
		echo $this->db->last_query();	*/
		$year  = substr($sal_year_month,0,4);
		$month = substr($sal_year_month,5,2);
		$lastday = date("t", mktime(0, 0, 0, $month, 1, $year));	
		
		$lastday = date("Y-m-d", mktime(0, 0, 0, $month, $lastday, $year));	
			
		
		$this->db->select('pr_emp_per_info.emp_full_name,pr_designation.desig_name, pr_section.sec_name, pr_emp_com_info.emp_join_date,pr_grade.gr_name,pr_pay_scale_sheet.*');
		$this->db->from('pr_emp_per_info');
		$this->db->from('pr_emp_com_info');
		$this->db->from('pr_grade');
		$this->db->from('pr_pay_scale_sheet');
			$this->db->from('pr_dept');
			$this->db->from('pr_section');
			$this->db->from('pr_line_num');
			$this->db->from('pr_designation');
			if($grid_status == 4)
			{
				$this->db->from('pr_emp_resign_history');
			}
			elseif($grid_status == 3)
			{
				$this->db->from('pr_emp_left_history');
			}
			
			
			$this->db->where_in('pr_emp_com_info.emp_id', $grid_emp_id);
			$this->db->where('pr_emp_com_info.emp_desi_id = pr_designation.desig_id');
			$this->db->where('pr_emp_com_info.emp_dept_id = pr_dept.dept_id');
			$this->db->where('pr_emp_com_info.emp_sec_id = pr_section.sec_id');
			$this->db->where('pr_emp_com_info.emp_line_id = pr_line_num.line_id');
		$this->db->where('pr_emp_per_info.emp_id = pr_emp_com_info.emp_id');
		$this->db->where('pr_emp_com_info.emp_sal_gra_id = pr_grade.gr_id');
		$this->db->where('pr_emp_per_info.emp_id = pr_pay_scale_sheet.emp_id');
		$this->db->where("pr_pay_scale_sheet.salary_month = '$sal_year_month'");
		if($grid_status == 4)
		{
			$salary_month = substr($sal_year_month,0,7);
			$this->db->where('pr_emp_com_info.emp_id = pr_emp_resign_history.emp_id');
			$this->db->where("trim(substr(pr_emp_resign_history.resign_date,1,7)) LIKE '$salary_month'");
		}
		else if($grid_status == 3)
		{
			$salary_month = substr($sal_year_month,0,7);
			$this->db->where('pr_emp_com_info.emp_id = pr_emp_left_history.emp_id');
			$this->db->where("trim(substr(pr_emp_left_history.left_date,1,7)) LIKE '$salary_month'");
		}
		$this->db->where('pr_emp_com_info.emp_join_date <= ', $lastday);
		

		$this->db->order_by("pr_emp_com_info.emp_id");
		$this->db->group_by("pr_pay_scale_sheet.emp_id");
		$query = $this->db->get();	
		//echo $this->db->last_query();	
		return $query->result();
		
	}
	
	function grid_festival_bonus($sal_year_month, $grid_status, $grid_emp_id)
	{
		$year  = substr($sal_year_month,0,4);
		$month = substr($sal_year_month,5,2);
		$lastday = date("t", mktime(0, 0, 0, $month, 1, $year));	
		
		$lastday = date("Y-m-d", mktime(0, 0, 0, $month, $lastday, $year));		
		
		$this->db->select('pr_emp_per_info.emp_full_name,pr_designation.desig_name, pr_section.sec_name, pr_emp_com_info.emp_join_date,pr_grade.gr_name,pr_pay_scale_sheet.*');
		$this->db->from('pr_emp_per_info');
		$this->db->from('pr_emp_com_info');
		$this->db->from('pr_grade');
		$this->db->from('pr_pay_scale_sheet');
			$this->db->from('pr_dept');
			$this->db->from('pr_section');
			$this->db->from('pr_line_num');
			$this->db->from('pr_designation');
			if($grid_status == 4)
			{
				$this->db->from('pr_emp_resign_history');
			}
			
			
			$this->db->where_in('pr_emp_com_info.emp_id', $grid_emp_id);
			$this->db->where('pr_emp_com_info.emp_desi_id = pr_designation.desig_id');
			$this->db->where('pr_emp_com_info.emp_dept_id = pr_dept.dept_id');
			$this->db->where('pr_emp_com_info.emp_sec_id = pr_section.sec_id');
			$this->db->where('pr_emp_com_info.emp_line_id = pr_line_num.line_id');
		$this->db->where('pr_emp_per_info.emp_id = pr_emp_com_info.emp_id');
		$this->db->where('pr_emp_com_info.emp_sal_gra_id = pr_grade.gr_id');
		$this->db->where('pr_emp_per_info.emp_id = pr_pay_scale_sheet.emp_id');
		$this->db->where("pr_pay_scale_sheet.salary_month = '$sal_year_month'");
		if($grid_status == 4)
		{
			$salary_month = substr($sal_year_month,0,7);
			$this->db->where('pr_emp_com_info.emp_id = pr_emp_resign_history.emp_id');
			$this->db->where("trim(substr(pr_emp_resign_history.resign_date,1,7)) LIKE '$salary_month'");
		}
		$this->db->where('pr_emp_com_info.emp_join_date <= ', $lastday);
		

		$this->db->order_by("pr_emp_com_info.emp_id");
		$this->db->group_by("pr_pay_scale_sheet.emp_id");
		$query = $this->db->get();	
		//echo $this->db->last_query();	
		return $query->result();
		
	}
	
	function grid_earn_leave($sal_year_month, $grid_status, $grid_emp_id)
	{
		/*$this->db->select("pr_dept.dept_name");
		$this->db->from('pr_dept');
		$this->db->from('pr_emp_com_info');
		$this->db->where_in('pr_emp_com_info.emp_id', $grid_emp_id);
		$this->db->group_by("pr_dept.dept_name"); 
		$this->db->order_by("pr_dept.dept_name");
		$query = $this->db->get();	
		echo $this->db->last_query();	*/
		$year  = substr($sal_year_month,0,4);
		$month = substr($sal_year_month,5,2);
		$lastday = date("t", mktime(0, 0, 0, $month, 1, $year));	
		
		$lastday = date("Y-m-d", mktime(0, 0, 0, $month, $lastday, $year));		
		
		$this->db->select('pr_emp_per_info.emp_full_name,pr_designation.desig_name, pr_section.sec_name, pr_emp_com_info.emp_join_date,pr_grade.gr_name,pr_pay_scale_sheet.*');
		$this->db->from('pr_emp_per_info');
		$this->db->from('pr_emp_com_info');
		$this->db->from('pr_grade');
		$this->db->from('pr_pay_scale_sheet');
			$this->db->from('pr_dept');
			$this->db->from('pr_section');
			$this->db->from('pr_line_num');
			$this->db->from('pr_designation');
			if($grid_status == 4)
			{
				$this->db->from('pr_emp_resign_history');
			}
			
			
			$this->db->where_in('pr_emp_com_info.emp_id',$grid_emp_id);
			$this->db->where('pr_emp_com_info.emp_desi_id = pr_designation.desig_id');
			$this->db->where('pr_emp_com_info.emp_dept_id = pr_dept.dept_id');
			$this->db->where('pr_emp_com_info.emp_sec_id = pr_section.sec_id');
			$this->db->where('pr_emp_com_info.emp_line_id = pr_line_num.line_id');
		$this->db->where('pr_emp_per_info.emp_id = pr_emp_com_info.emp_id');
		$this->db->where('pr_emp_com_info.emp_sal_gra_id = pr_grade.gr_id');
		$this->db->where('pr_emp_per_info.emp_id = pr_pay_scale_sheet.emp_id');
		$this->db->where("pr_pay_scale_sheet.salary_month = '$sal_year_month'");
		if($grid_status == 4)
		{
			$salary_month = substr($sal_year_month,0,7);
			$this->db->where('pr_emp_com_info.emp_id = pr_emp_resign_history.emp_id');
			$this->db->where("trim(substr(pr_emp_resign_history.resign_date,1,7)) LIKE '$salary_month'");
		}
		$this->db->where('pr_emp_com_info.emp_join_date <= ', $lastday);
		

		$this->db->order_by("pr_emp_com_info.emp_id");
		$this->db->group_by("pr_pay_scale_sheet.emp_id");
		$query = $this->db->get();	
		//echo $this->db->last_query();	
		return $query->result();
		
	}
	
	function get_resign_date_by_empid($emp_id)
	{
		$this->db->select('resign_date');
		$this->db->where('emp_id', $emp_id);
		$query = $this->db->get('pr_emp_resign_history');
		if($query->num_rows() > 0)
		{
			$row = $query->row();
			return $resign_date = $row->resign_date;
		}
		else
		{ return false;}
	}
	
	function get_left_date_by_empid($emp_id)
	{
		$this->db->select('left_date');
		$this->db->where('emp_id', $emp_id);
		$query = $this->db->get('pr_emp_left_history');
		if($query->num_rows() > 0)
		{
			$row = $query->row();
			return $resign_date = $row->left_date;
		}
		else
		{ return false;}
	}
	
	//========================Start Salary Summary=================
	function salary_summary($salary_month,$emp_stat)
	{
		$all_data = array();
		$year_month = date('Y-m', strtotime($salary_month));
		$sal_year_month = "$year_month-01";
		$this->db->select('sec_id');
		$this->db->from('pr_pay_scale_sheet');
		$this->db->where("pr_pay_scale_sheet.salary_month = '$sal_year_month'");
		$this->db->group_by("pr_pay_scale_sheet.sec_id");
		$query = $this->db->get();
		
		foreach($query->result() as $rows)
		{
			$data = array();
			$data1 = array();
						
			$sec_id = $rows->sec_id;
			$all_data["sec_name"][] = $this->get_section_name($sec_id);
			
			// For Cash Man Power
			$salary_draw_cash = 1;
			$emp_cash = $this->count_empid_for_salary($sec_id,$emp_stat,$salary_month,$salary_draw_cash,"count");
			$all_data["emp_cash"][] = $emp_cash;
			
			// For Bank Man Power
			$salary_draw_bank = 2;
			$emp_bank = $this->count_empid_for_salary($sec_id,$emp_stat,$salary_month,$salary_draw_bank,"count");
			$all_data["emp_bank"][] = $emp_bank;
			
			$all_data["emp_cash_bank"][] =$emp_cash + $emp_bank;
				
			// For Cash Emp ID
			$cash_emp_id = $this->count_empid_for_salary($sec_id,$emp_stat,$salary_month,$salary_draw_cash,"emp_id");
			foreach($cash_emp_id as $rows)
			{
				 $data[] = $rows->emp_id;
			}
			$data = implode("xxx",$data);
			$emp_id_cash = explode('xxx', trim($data));
			
			// For Bank Emp ID
			$bank_emp_id = $this->count_empid_for_salary($sec_id,$emp_stat,$salary_month,$salary_draw_bank,"emp_id");
			foreach($bank_emp_id as $rows)
			{
				$data1[] = $rows->emp_id;
			}
			$data1 = implode("xxx",$data1);
			$emp_id_bank = explode('xxx', trim($data1));
			
			//For Cash gross_sal
			$column_name = "gross_sal" ;
			$gross_sal_cash = $this->get_sum_column($column_name,$emp_id_cash,$salary_month);
			$cash_total = $gross_sal_cash;
			$all_data["gross_sal_cash"][] = $gross_sal_cash;
		
			//For Bank gross_sal
			//print_r($emp_id_bank);
			$gross_sal_bank = $this->get_sum_column($column_name,$emp_id_bank,$salary_month);
			$bank_total = $gross_sal_bank;
			$all_data["gross_sal_bank"][] = $gross_sal_bank;
			
			//For Cash att_bonus
			$column_name = "att_bonus" ;
			$att_bonus_cash = $this->get_sum_column($column_name,$emp_id_cash,$salary_month);
			$cash_total = $cash_total + $att_bonus_cash;
			$all_data["cash_att_bonus"][] = $att_bonus_cash;	
			
			//For Bank att_bonus
			$column_name = "att_bonus" ;
			$att_bonus_bank = $this->get_sum_column($column_name,$emp_id_bank,$salary_month);
			$bank_total = $bank_total + $att_bonus_bank;
			$all_data["bank_att_bonus"][] = $att_bonus_bank;	
			
			
			
			//================DEDUCTION START=======================
			//For Cash abs_deduction
			$column_name = "abs_deduction" ;
			$abs_deduction_cash = $this->get_sum_column($column_name,$emp_id_cash,$salary_month);
			$total_cash_deduction =  $abs_deduction_cash;
			$all_data["abs_deduction_cash"][] = $abs_deduction_cash;
			
			//For Bank abs_deduction
			$abs_deduction_bank = $this->get_sum_column($column_name,$emp_id_bank,$salary_month);
			$total_bank_deduction = $abs_deduction_bank;
			$all_data["abs_deduction_bank"][] = $abs_deduction_bank;
			
		
			
			
			//For Cash adv_deduct
			$column_name = "adv_deduct" ;
			$adv_deduct_cash = $this->get_sum_column($column_name,$emp_id_cash,$salary_month);
			$total_cash_deduction = $total_cash_deduction + $adv_deduct_cash;
			$all_data["adv_deduct_cash"][] = $adv_deduct_cash;
			
			//For Bank adv_deduct
			$adv_deduct_bank = $this->get_sum_column($column_name,$emp_id_bank,$salary_month);
			$total_bank_deduction = $total_bank_deduction + $adv_deduct_bank;
			$all_data["adv_deduct_bank"][] = $adv_deduct_bank;
			
			//For Cash Stamp
			$column_name = "stamp" ;
			$stamp_deduct_cash = $this->get_sum_column($column_name,$emp_id_cash,$salary_month);
			$total_cash_deduction = $total_cash_deduction + $stamp_deduct_cash;
			$all_data["stamp_deduct_cash"][] = $stamp_deduct_cash;

			//For Bank stamp
			$stam_deduct_bank = $this->get_sum_column($column_name,$emp_id_bank,$salary_month);
			$total_bank_deduction = $total_bank_deduction + $stam_deduct_bank;
			$all_data["stam_deduct_bank"][] = $stam_deduct_bank;
			
			//================ALLOWANCE=======================

			//For Cash 	friday_allowance
			$column_name = "friday_allowance" ;
			$friday_allowance_cash = $this->get_sum_column($column_name,$emp_id_cash,$salary_month);
			$cash_total_allowance = $friday_allowance_cash;
			$all_data["friday_allowance_cash"][] = $friday_allowance_cash;	
			
			//For Bank holiday_allowance_bank
			$friday_allowance_bank = $this->get_sum_column($column_name,$emp_id_bank,$salary_month);
			$bank_total_allowance = $friday_allowance_bank;
			$all_data["friday_allowance_bank"][] = $friday_allowance_bank;	
			
			
			//For Cash 	night_allowance
			$column_name = "night_allowance" ;
			$night_allowance_cash = $this->get_sum_column($column_name,$emp_id_cash,$salary_month);
			$cash_total_allowance = $cash_total_allowance + $night_allowance_cash;
			$all_data["night_allowance_cash"][] = $night_allowance_cash;	
			
			//For Bank night_allowance
			$night_allowance_bank = $this->get_sum_column($column_name,$emp_id_bank,$salary_month);
			$bank_total_allowance = $bank_total_allowance + $night_allowance_bank;
			$all_data["night_allowance_bank"][] = $night_allowance_bank;
			
			
			
			
			//For Cash ot_amount
			$column_name = "ot_amount" ;
			$ot_amount_cash = $this->get_sum_column($column_name,$emp_id_cash,$salary_month);
			//$cash_total = $cash_total + $ot_amount_cash;
			$all_data["cash_ot_amount"][] = $ot_amount_cash;	
			
			
			//For Cash net_pay
			$column_name = "net_pay" ;
			$cash_net_pay = $this->get_sum_column($column_name,$emp_id_cash,$salary_month);
			//$cash_total = $cash_total + $ot_amount_cash;
			$all_data["cash_net_pay"][] = $cash_net_pay;
		}
		return $all_data;
	}
	
	
	
	//======================Factory Salary Summary=============================
	function grid_factory_summary($salary_month,$emp_stat,$prev_salary_month)
	{
		$data["fixed"]= $this->factory_salary_summary_fixed($salary_month,$prev_salary_month,$emp_stat);
		
		$data["fixed_prev"]= $this->factory_salary_summary_fixed($prev_salary_month,$prev_salary_month,$emp_stat);

		$data["production"]= $this->pd_report_model->factory_production_monthly_salary_summary($salary_month,$prev_salary_month,$emp_stat);

		$data["production_prev"]= $this->pd_report_model->factory_production_monthly_salary_summary($prev_salary_month,$prev_salary_month,$emp_stat);
		return $data;
	}
	
	function factory_salary_summary_fixed($salary_month,$prev_salary_month,$emp_stat)
	{
		$all_data = array();
		$year_month = date('Y-m', strtotime($salary_month));
		$sal_year_month = "$year_month-01";
		$this->db->select('sec_id');
		$this->db->from('pr_pay_scale_sheet');
		$this->db->where("pr_pay_scale_sheet.salary_month = '$sal_year_month'");
		$this->db->or_where("pr_pay_scale_sheet.salary_month = '$prev_salary_month'");
		$this->db->group_by("pr_pay_scale_sheet.sec_id");
		$query = $this->db->get();
		if($query->num_rows()==0)
		{
		$all_data =0;
		}
		foreach($query->result() as $rows)
		{
			$data = array();
			$data1 = array();
						
			
			$sec_id = $rows->sec_id;
			$all_data["sec_name"][] = $this->get_section_name($sec_id);
			// For Cash Man Power
			$salary_draw_cash = 1;
			$emp_cash = $this->count_empid_for_salary($sec_id,$emp_stat,$salary_month,$salary_draw_cash,"count");
			$all_data["emp_cash"][] = $emp_cash;
			
			// For Bank Man Power
			$salary_draw_bank = 2;
			$emp_bank = $this->count_empid_for_salary($sec_id,$emp_stat,$salary_month,$salary_draw_bank,"count");
			$all_data["emp_bank"][] = $emp_bank;
			
			$all_data["emp_cash_bank"][] =$emp_cash + $emp_bank;
				
			// For Cash Emp ID
			$cash_emp_id = $this->count_empid_for_salary($sec_id,$emp_stat,$salary_month,$salary_draw_cash,"emp_id");
			foreach($cash_emp_id as $rows)
			{
				 $data[] = $rows->emp_id;
			}
			$data = implode("xxx",$data);
			$emp_id_cash = explode('xxx', trim($data));
			
			// For Bank Emp ID
			$bank_emp_id = $this->count_empid_for_salary($sec_id,$emp_stat,$salary_month,$salary_draw_bank,"emp_id");
			foreach($bank_emp_id as $rows)
			{
				$data1[] = $rows->emp_id;
			}
			$data1 = implode("xxx",$data1);
			$emp_id_bank = explode('xxx', trim($data1));
			
			//For Cash gross_sal
			$column_name = "gross_sal" ;
			$gross_sal_cash = $this->get_sum_column($column_name,$emp_id_cash,$salary_month);
			$cash_total = $gross_sal_cash;
			$all_data["gross_sal_cash"][] = $gross_sal_cash;
		
			//For Bank gross_sal
			//print_r($emp_id_bank);
			$gross_sal_bank = $this->get_sum_column($column_name,$emp_id_bank,$salary_month);
			$bank_total = $gross_sal_bank;
			$all_data["gross_sal_bank"][] = $gross_sal_bank;
			
			//For Cash att_bonus
			$column_name = "att_bonus" ;
			$att_bonus_cash = $this->get_sum_column($column_name,$emp_id_cash,$salary_month);
			$cash_total = $cash_total + $att_bonus_cash;
			$all_data["cash_att_bonus"][] = $att_bonus_cash;	
			
			//For Bank att_bonus
			$column_name = "att_bonus" ;
			$att_bonus_bank = $this->get_sum_column($column_name,$emp_id_bank,$salary_month);
			$bank_total = $bank_total + $att_bonus_bank;
			$all_data["bank_att_bonus"][] = $att_bonus_bank;	
			
			
			
			//================DEDUCTION START=======================
			//For Cash abs_deduction
			$column_name = "abs_deduction" ;
			$abs_deduction_cash = $this->get_sum_column($column_name,$emp_id_cash,$salary_month);
			$total_cash_deduction =  $abs_deduction_cash;
			$all_data["abs_deduction_cash"][] = $abs_deduction_cash;
			
			//For Bank abs_deduction
			$abs_deduction_bank = $this->get_sum_column($column_name,$emp_id_bank,$salary_month);
			$total_bank_deduction = $abs_deduction_bank;
			$all_data["abs_deduction_bank"][] = $abs_deduction_bank;
			
		
			
			
			//For Cash adv_deduct
			$column_name = "adv_deduct" ;
			$adv_deduct_cash = $this->get_sum_column($column_name,$emp_id_cash,$salary_month);
			$total_cash_deduction = $total_cash_deduction + $adv_deduct_cash;
			$all_data["adv_deduct_cash"][] = $adv_deduct_cash;
			
			//For Bank adv_deduct
			$adv_deduct_bank = $this->get_sum_column($column_name,$emp_id_bank,$salary_month);
			$total_bank_deduction = $total_bank_deduction + $adv_deduct_bank;
			$all_data["adv_deduct_bank"][] = $adv_deduct_bank;
			
			//For Cash Stamp
			$column_name = "stamp" ;
			$stamp_deduct_cash = $this->get_sum_column($column_name,$emp_id_cash,$salary_month);
			$total_cash_deduction = $total_cash_deduction + $stamp_deduct_cash;
			$all_data["stamp_deduct_cash"][] = $stamp_deduct_cash;

			//For Bank stamp
			$stam_deduct_bank = $this->get_sum_column($column_name,$emp_id_bank,$salary_month);
			$total_bank_deduction = $total_bank_deduction + $stam_deduct_bank;
			$all_data["stam_deduct_bank"][] = $stam_deduct_bank;
			
			//================ALLOWANCE=======================

			//For Cash 	friday_allowance
			$column_name = "friday_allowance" ;
			$friday_allowance_cash = $this->get_sum_column($column_name,$emp_id_cash,$salary_month);
			$cash_total_allowance = $friday_allowance_cash;
			$all_data["friday_allowance_cash"][] = $friday_allowance_cash;	
			
			//For Bank holiday_allowance_bank
			$friday_allowance_bank = $this->get_sum_column($column_name,$emp_id_bank,$salary_month);
			$bank_total_allowance = $friday_allowance_bank;
			$all_data["friday_allowance_bank"][] = $friday_allowance_bank;	
			
			
			//For Cash 	night_allowance
			$column_name = "night_allowance" ;
			$night_allowance_cash = $this->get_sum_column($column_name,$emp_id_cash,$salary_month);
			$cash_total_allowance = $cash_total_allowance + $night_allowance_cash;
			$all_data["night_allowance_cash"][] = $night_allowance_cash;	
			
			//For Bank night_allowance
			$night_allowance_bank = $this->get_sum_column($column_name,$emp_id_bank,$salary_month);
			$bank_total_allowance = $bank_total_allowance + $night_allowance_bank;
			$all_data["night_allowance_bank"][] = $night_allowance_bank;
			
			
			
			
			//For Cash ot_amount
			$column_name = "ot_amount" ;
			$ot_amount_cash = $this->get_sum_column($column_name,$emp_id_cash,$salary_month);
			//$cash_total = $cash_total + $ot_amount_cash;
			$all_data["cash_ot_amount"][] = $ot_amount_cash;	
			
			
			//For Cash net_pay
			$column_name = "net_pay" ;
			$cash_net_pay = $this->get_sum_column($column_name,$emp_id_cash,$salary_month);
			//$cash_total = $cash_total + $ot_amount_cash;
			$all_data["cash_net_pay"][] = $cash_net_pay;
		}
		return $all_data;
	}
	
	
	
	
	//========================End Salary Summary=================
	 function count_empid_for_salary($sec_id,$emp_stat,$salary_month,$salary_draw,$check)
	 {
		

		$salary_month = substr($salary_month,0,7);
		$sal_year_month = "$salary_month-01";
		$this->db->select('pr_pay_scale_sheet.*');
		$this->db->from('pr_pay_scale_sheet');
		$this->db->from('pr_emp_com_info');
		$this->db->where('pr_emp_com_info.emp_id = pr_pay_scale_sheet.emp_id');
		$this->db->where("pr_pay_scale_sheet.salary_month = '$sal_year_month'");
		$this->db->where("pr_pay_scale_sheet.sec_id", $sec_id);
		$this->db->where("pr_emp_com_info.salary_draw",$salary_draw);
		if($emp_stat !="ALL" )
		{
			$this->db->where("pr_pay_scale_sheet.status_id", $emp_stat);
		}
		$query = $this->db->get();
		if($check == "count")
		{
			$num_rows = $query->num_rows();
			if($num_rows > 0)
			{
				return $query->num_rows();
			}
			else{
				return 0;
			}
			
			return $query->num_rows();
		}
		//echo $this->db->last_query()."====";
		return $query->result();
	 }
	
	function get_sum_column($column_name,$emp_id,$salary_month)
	{
		
		$this->db->select_sum($column_name);
		$this->db->from("pr_pay_scale_sheet");
		$this->db->where_in('pr_pay_scale_sheet.emp_id', $emp_id);
		$this->db->like("salary_month", $salary_month);
		$query = $this->db->get();
		//echo $this->db->last_query();
		$row = $query->row();
		$result = $row->$column_name;

			if($result =='')
			{
				$result = 0;
			}
		
		return $result;
	}
	
	function prox($empid)
	{
		$this->db->select('proxi_id');
		$this->db->where('emp_id',$empid);
		$query = $this->db->get('pr_id_proxi');
		foreach ($query->result() as $rows)
		{
			return $rows->proxi_id;
		}
	}
	
	function all_reguler_emp($grid_emp_id)
	{
		$emp_cat_id = array( '0'=>1, '1'=>2);
				
		$this->db->select('emp_id');
		$this->db->from('pr_emp_com_info');
		$this->db->where_in('emp_id', $grid_emp_id);
		$this->db->where_in('emp_cat_id', $emp_cat_id);
		$this->db->order_by("emp_id");
		$query = $this->db->get();
		return $query;
	}
	
	function all_emp_for_manual_delete($grid_emp_id)
	{
		$emp_cat_id = array( '0'=>1, '1'=>2, '2'=> 3, '3'=>4);
		
		$this->db->select('emp_id');
		$this->db->from('pr_emp_com_info');
		$this->db->where_in('emp_id', $grid_emp_id);
		$this->db->where_in('emp_cat_id', $emp_cat_id);
		$this->db->order_by("emp_id");
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query;
	}
	
	function grid_general_info($grid_emp_id)
	{
		$this->db->select('pr_emp_com_info.emp_id, pr_emp_per_info.emp_full_name, pr_dept.dept_name, pr_section.sec_name, pr_line_num.line_name, pr_designation.desig_name,  pr_emp_com_info.emp_join_date,pr_grade.gr_name, pr_emp_com_info.gross_sal');
		$this->db->from('pr_emp_per_info');
		$this->db->from('pr_emp_com_info');
		$this->db->from('pr_grade');
			$this->db->from('pr_dept');
			$this->db->from('pr_section');
			$this->db->from('pr_line_num');
			$this->db->from('pr_designation');
			$this->db->where_in('pr_emp_com_info.emp_id', $grid_emp_id);
			$this->db->where('pr_emp_com_info.emp_desi_id = pr_designation.desig_id');
			$this->db->where('pr_emp_com_info.emp_dept_id = pr_dept.dept_id');
			$this->db->where('pr_emp_com_info.emp_sec_id = pr_section.sec_id');
			$this->db->where('pr_emp_com_info.emp_line_id = pr_line_num.line_id');
		$this->db->where('pr_emp_per_info.emp_id = pr_emp_com_info.emp_id');
		$this->db->where('pr_emp_com_info.emp_sal_gra_id = pr_grade.gr_id');

		$this->db->order_by("pr_emp_com_info.emp_id");
		$query = $this->db->get();	
		//echo $this->db->last_query();	
		return $query->result();
		
	}
	
	function grid_new_join_report($grid_firstdate, $grid_seconddate, $grid_emp_id)
	{
		$data = array();
		$this->db->select('pr_emp_com_info.emp_id,pr_emp_per_info.emp_full_name,  pr_designation.desig_name, pr_emp_com_info.emp_join_date, pr_dept.dept_name, pr_section.sec_name, pr_line_num.line_name, pr_id_proxi.proxi_id, pr_emp_shift.shift_name,pr_emp_com_info.emp_cat_id, pr_emp_com_info.gross_sal,pr_emp_per_info.emp_dob');
		$this->db->from('pr_emp_per_info');
		$this->db->from('pr_emp_com_info');
		$this->db->from('pr_designation');
		$this->db->from('pr_dept');
		$this->db->from('pr_section');
		$this->db->from('pr_line_num');
		$this->db->from('pr_id_proxi');
		$this->db->from('pr_emp_shift');
		$this->db->where_in("pr_emp_com_info.emp_id", $grid_emp_id);
		$this->db->where('pr_emp_per_info.emp_id = pr_emp_com_info.emp_id');
		$this->db->where('pr_emp_com_info.emp_desi_id = pr_designation.desig_id');
		$this->db->where('pr_emp_com_info.emp_dept_id = pr_dept.dept_id');
		$this->db->where('pr_emp_com_info.emp_sec_id = pr_section.sec_id');
		$this->db->where('pr_emp_com_info.emp_line_id = pr_line_num.line_id');
		$this->db->where('pr_emp_com_info.emp_id = pr_id_proxi.emp_id');
		$this->db->where('pr_emp_shift.shift_id = pr_emp_com_info.emp_shift');
		$this->db->where("pr_emp_com_info.emp_join_date BETWEEN '$grid_firstdate' and '$grid_seconddate'");
		
		//$this->db->order_by("pr_dept.dept_name","ASC");
		//$this->db->order_by("pr_section.sec_name","ASC");
		//$this->db->order_by("pr_line_num.line_name","ASC");
		$this->db->order_by("pr_emp_com_info.emp_id","ASC");
		$query = $this->db->get();
		//echo $this->db->last_query();
		//$put = $query->result_array();
		//print_r($put);
		foreach($query->result() as $rows)
		{
			$data["emp_id"][] 		= $rows->emp_id;
			$data["emp_name"][] 	= $rows->emp_full_name;
			$data["proxi_id"][] 	= $rows->proxi_id;
			$data["desig_name"][]	= $rows->desig_name;
			$data["gross_sal"][] 	= $rows->gross_sal;
			$data["doj"][] 			= $rows->emp_join_date;
			$data["emp_dob"][] 		= $rows->emp_dob;
			$data["dept_name"][] 	= $rows->dept_name;
			$data["sec_name"][] 	= $rows->sec_name;
			$data["line_name"][] 	= $rows->line_name;
		}
		
		//print_r($data);
		if($data)
		{
			
			return $data;
		}
		else
		{
			return "Requested list is empty";
		}
	}
	
	function grid_resign_report($grid_firstdate, $grid_seconddate, $grid_emp_id)
	{
		$data = array();
		$this->db->select('pr_emp_com_info.emp_id,pr_emp_per_info.emp_full_name,  pr_designation.desig_name, pr_emp_com_info.emp_join_date, pr_dept.dept_name, pr_section.sec_name, pr_line_num.line_name, pr_id_proxi.proxi_id, pr_emp_shift.shift_name,pr_emp_com_info.emp_cat_id, pr_emp_com_info.gross_sal, pr_emp_resign_history.resign_date as e_date, pr_emp_add.emp_pre_add');
		$this->db->from('pr_emp_per_info');
		$this->db->from('pr_emp_com_info');
		$this->db->from('pr_designation');
		$this->db->from('pr_dept');
		$this->db->from('pr_section');
		$this->db->from('pr_line_num');
		$this->db->from('pr_id_proxi');
		$this->db->from('pr_emp_shift');
		$this->db->from("pr_emp_resign_history");	
		$this->db->from("pr_emp_add");	
		$this->db->where_in("pr_emp_com_info.emp_id", $grid_emp_id);
		$this->db->where("pr_emp_add.emp_id = pr_emp_com_info.emp_id");
		$this->db->where("pr_emp_resign_history.emp_id = pr_emp_com_info.emp_id");
		$this->db->where('pr_emp_per_info.emp_id = pr_emp_com_info.emp_id');
		$this->db->where('pr_emp_com_info.emp_desi_id = pr_designation.desig_id');
		$this->db->where('pr_emp_com_info.emp_dept_id = pr_dept.dept_id');
		$this->db->where('pr_emp_com_info.emp_sec_id = pr_section.sec_id');
		$this->db->where('pr_emp_com_info.emp_line_id = pr_line_num.line_id');
		$this->db->where('pr_emp_com_info.emp_id = pr_id_proxi.emp_id');
		$this->db->where('pr_emp_shift.shift_id = pr_emp_com_info.emp_shift');
		$this->db->where("pr_emp_resign_history.resign_date BETWEEN '$grid_firstdate' and '$grid_seconddate'");
		$this->db->order_by("pr_emp_com_info.emp_id","ASC");
		$query = $this->db->get();
		
		foreach($query->result() as $rows)
		{
			$data["emp_id"][] = $rows->emp_id;
			$data["proxi_id"][] = $rows->proxi_id;
			$data["emp_name"][] = $rows->emp_full_name;
			$data["doj"][] = $rows->emp_join_date;
			$data["add"][] = $rows->emp_pre_add;
			$data["dept_name"][] = $rows->dept_name;
			$data["sec_name"][] = $rows->sec_name;
			$data["desig_name"][] = $rows->desig_name;
			$data["line_name"][] = $rows->line_name;
			$data["gross_sal"][] = $rows->gross_sal;
			$data["e_date"][] = $rows->e_date;
		}
		
		if($data)
		{
			
			return $data;
		}
		else
		{
			return "Requested list is empty";
		}
	}
	
	function grid_left_report($grid_firstdate, $grid_seconddate, $grid_emp_id)
	{
		$data = array();
		$this->db->select('pr_emp_com_info.emp_id,pr_emp_per_info.emp_full_name,  pr_designation.desig_name, pr_emp_com_info.emp_join_date, pr_dept.dept_name, pr_section.sec_name, pr_line_num.line_name, pr_id_proxi.proxi_id, pr_emp_shift.shift_name,pr_emp_com_info.emp_cat_id, pr_emp_com_info.gross_sal, pr_emp_left_history.left_date  as left_date , pr_emp_add.emp_pre_add');
		$this->db->from('pr_emp_per_info');
		$this->db->from('pr_emp_com_info');
		$this->db->from('pr_designation');
		$this->db->from('pr_dept');
		$this->db->from('pr_section');
		$this->db->from('pr_line_num');
		$this->db->from('pr_id_proxi');
		$this->db->from('pr_emp_shift');
		$this->db->from("pr_emp_left_history");	
		$this->db->from("pr_emp_add");	
		$this->db->where_in("pr_emp_com_info.emp_id", $grid_emp_id);
		$this->db->where("pr_emp_add.emp_id = pr_emp_com_info.emp_id");
		$this->db->where("pr_emp_left_history.emp_id = pr_emp_com_info.emp_id");
		$this->db->where('pr_emp_per_info.emp_id = pr_emp_com_info.emp_id');
		$this->db->where('pr_emp_com_info.emp_desi_id = pr_designation.desig_id');
		$this->db->where('pr_emp_com_info.emp_dept_id = pr_dept.dept_id');
		$this->db->where('pr_emp_com_info.emp_sec_id = pr_section.sec_id');
		$this->db->where('pr_emp_com_info.emp_line_id = pr_line_num.line_id');
		$this->db->where('pr_emp_com_info.emp_id = pr_id_proxi.emp_id');
		$this->db->where('pr_emp_shift.shift_id = pr_emp_com_info.emp_shift');
		$this->db->where("pr_emp_left_history.left_date BETWEEN '$grid_firstdate' and '$grid_seconddate'");
		$this->db->order_by("pr_emp_com_info.emp_id","ASC");
		$query = $this->db->get();
		
		foreach($query->result() as $rows)
		{
			$data["emp_id"][] 		= $rows->emp_id;
			$data["proxi_id"][] 	= $rows->proxi_id;
			$data["emp_name"][] 	= $rows->emp_full_name;
			$data["doj"][] 			= $rows->emp_join_date;
			$data["add"][] 			= $rows->emp_pre_add;
			$data["dept_name"][] 	= $rows->dept_name;
			$data["sec_name"][] 	= $rows->sec_name;
			$data["desig_name"][] 	= $rows->desig_name;
			$data["line_name"][]	= $rows->line_name;
			$data["gross_sal"][] 	= $rows->gross_sal;
			$data["e_date"][] 		= $rows->left_date;
		}
		
		if($data)
		{
			
			return $data;
		}
		else
		{
			return "Requested list is empty";
		}
	}
	
	function grid_daily_eot($grid_firstdate, $grid_emp_id)
	{
		$data = array();
		$this->db->select('pr_emp_com_info.emp_id,pr_emp_per_info.emp_full_name,  pr_designation.desig_name, pr_emp_com_info.emp_join_date, pr_dept.dept_name, pr_section.sec_name, pr_line_num.line_name, pr_id_proxi.proxi_id, pr_emp_shift.shift_name,pr_emp_com_info.emp_cat_id, pr_emp_com_info.gross_sal, pr_emp_add.emp_pre_add, pr_emp_shift_log.in_time, pr_emp_shift_log.out_time, pr_emp_shift_log.ot_hour, pr_emp_shift_log.extra_ot_hour');
		$this->db->from('pr_emp_per_info');
		$this->db->from('pr_emp_com_info');
		$this->db->from('pr_designation');
		$this->db->from('pr_dept');
		$this->db->from('pr_section');
		$this->db->from('pr_line_num');
		$this->db->from('pr_id_proxi');
		$this->db->from('pr_emp_shift');
		$this->db->from("pr_emp_add");	
		$this->db->from('pr_emp_shift_log');
		$this->db->where_in("pr_emp_com_info.emp_id", $grid_emp_id);
		$this->db->where("pr_emp_add.emp_id = pr_emp_com_info.emp_id");
		$this->db->where("pr_emp_shift_log.emp_id = pr_emp_com_info.emp_id");
		$this->db->where('pr_emp_per_info.emp_id = pr_emp_com_info.emp_id');
		$this->db->where('pr_emp_com_info.emp_desi_id = pr_designation.desig_id');
		$this->db->where('pr_emp_com_info.emp_dept_id = pr_dept.dept_id');
		$this->db->where('pr_emp_com_info.emp_sec_id = pr_section.sec_id');
		$this->db->where('pr_emp_com_info.emp_line_id = pr_line_num.line_id');
		$this->db->where('pr_emp_com_info.emp_id = pr_id_proxi.emp_id');
		$this->db->where('pr_emp_shift.shift_id = pr_emp_com_info.emp_shift');
		$this->db->where("pr_emp_shift_log.shift_log_date", $grid_firstdate);
		$this->db->where("pr_emp_shift_log.extra_ot_hour !=", 0 );
		$this->db->order_by("pr_emp_com_info.emp_id","ASC");
		$query = $this->db->get();
				
		foreach($query->result() as $rows)
		{
			$gross_sal = $rows->gross_sal;
			$salary_structure 		= $this->common_model->salary_structure($gross_sal);	
			$ot_rate = $salary_structure['ot_rate'];
			
			$ot_amount = $rows->ot_hour * $ot_rate;
			$ot_amount = round($ot_amount);
			
			$eot_amount = $rows->extra_ot_hour * $ot_rate;
			$eot_amount = round($eot_amount);
			
			
			$data["emp_id"][] 		= $rows->emp_id;
			$data["proxi_id"][] 	= $rows->proxi_id;
			$data["emp_name"][] 	= $rows->emp_full_name;
			$data["doj"][] 			= $rows->emp_join_date;
			$data["add"][] 			= $rows->emp_pre_add;
			$data["dept_name"][] 	= $rows->dept_name;
			$data["sec_name"][] 	= $rows->sec_name;
			$data["desig_name"][] 	= $rows->desig_name;
			$data["line_name"][]	= $rows->line_name;
			$data["gross_sal"][] 	= $rows->gross_sal;
			$data["emp_shift"][] 	= $rows->shift_name;
			$data["in_time"][] 		= $rows->in_time;
			$data["out_time"][] 	= $rows->out_time;
			$data["ot_hour"][] 		= $rows->ot_hour;
			$data["extra_ot_hour"][]= $rows->extra_ot_hour;
			$data["ot_rate"][]		= $ot_rate;
			$data["ot_amount"][]	= $ot_amount;
			$data["eot_amount"][]	= $eot_amount;
		}
		
		if($data)
		{
			
			return $data;
		}
		else
		{
			return "Requested list is empty";
		}
	}
	
	function grid_daily_ot($grid_firstdate, $grid_emp_id)
	{
		$data = array();
		$this->db->distinct();
		$this->db->select('pr_emp_com_info.emp_id,pr_emp_per_info.emp_full_name,  pr_designation.desig_name, pr_emp_com_info.emp_join_date, pr_dept.dept_name, pr_section.sec_name, pr_line_num.line_name, pr_id_proxi.proxi_id, pr_emp_shift.shift_name,pr_emp_com_info.emp_cat_id, pr_emp_com_info.gross_sal, pr_emp_add.emp_pre_add, pr_emp_shift_log.in_time, pr_emp_shift_log.out_time, pr_emp_shift_log.ot_hour, pr_emp_shift_log.extra_ot_hour');
		$this->db->from('pr_emp_per_info');
		$this->db->from('pr_emp_com_info');
		$this->db->from('pr_designation');
		$this->db->from('pr_dept');
		$this->db->from('pr_section');
		$this->db->from('pr_line_num');
		$this->db->from('pr_id_proxi');
		$this->db->from('pr_emp_shift');
		$this->db->from("pr_emp_add");	
		$this->db->from('pr_emp_shift_log');
		$this->db->where_in("pr_emp_com_info.emp_id", $grid_emp_id);
		$this->db->where("pr_emp_add.emp_id = pr_emp_com_info.emp_id");
		$this->db->where("pr_emp_shift_log.emp_id = pr_emp_com_info.emp_id");
		$this->db->where('pr_emp_per_info.emp_id = pr_emp_com_info.emp_id');
		$this->db->where('pr_emp_com_info.emp_desi_id = pr_designation.desig_id');
		$this->db->where('pr_emp_com_info.emp_dept_id = pr_dept.dept_id');
		$this->db->where('pr_emp_com_info.emp_sec_id = pr_section.sec_id');
		$this->db->where('pr_emp_com_info.emp_line_id = pr_line_num.line_id');
		$this->db->where('pr_emp_com_info.emp_id = pr_id_proxi.emp_id');
		$this->db->where('pr_emp_shift.shift_id = pr_emp_com_info.emp_shift');
		$this->db->where("pr_emp_shift_log.shift_log_date", $grid_firstdate);
		$this->db->where("pr_emp_shift_log.ot_hour !=", 0 );
		$this->db->order_by("pr_emp_com_info.emp_id","ASC");
		$query = $this->db->get();
		//echo $this->db->last_query();
				
		foreach($query->result() as $rows)
		{
			$gross_sal = $rows->gross_sal;
			$salary_structure 		= $this->common_model->salary_structure($gross_sal);	
			$ot_rate = $salary_structure['ot_rate'];
			$total_ot_hour = $rows->ot_hour ; //+ $rows->extra_ot_hour , This is for Extra OT hour add in Daily ot.
			$ot_amount = $total_ot_hour * $ot_rate;
			$ot_amount = round($ot_amount);
			
			$emp_id = $rows->emp_id;
			$emp_shift = $this->emp_shift_check($emp_id, $grid_firstdate);
			$in_time = $rows->in_time;
			$in_time = $this->get_formated_in_time($emp_id, $in_time, $emp_shift);
			$out_time = $rows->out_time;
			$out_time = $this->get_formated_out_time($emp_id, $out_time, $emp_shift);
			
			$data["emp_id"][] 		= $rows->emp_id;
			$data["proxi_id"][] 	= $rows->proxi_id;
			$data["emp_name"][] 	= $rows->emp_full_name;
			$data["doj"][] 			= $rows->emp_join_date;
			$data["add"][] 			= $rows->emp_pre_add;
			$data["dept_name"][] 	= $rows->dept_name;
			$data["sec_name"][] 	= $rows->sec_name;
			$data["desig_name"][] 	= $rows->desig_name;
			$data["line_name"][]	= $rows->line_name;
			$data["gross_sal"][] 	= $rows->gross_sal;
			$data["emp_shift"][] 	= $rows->shift_name;
			$data["in_time"][] 		= $in_time;
			$data["out_time"][] 	= $out_time;
			$data["ot_hour"][] 		= $total_ot_hour;
			$data["ot_rate"][]		= $ot_rate;
			$data["ot_amount"][]	= $ot_amount;
		}
		
		if($data)
		{
			
			return $data;
		}
		else
		{
			return "Requested list is empty";
		}
	}
	
	function grid_daily_allowance_bills($att_date, $grid_emp_id)
	{
		/*$this->db->select('ot_entitle,emp_id');
		$this->db->where_in("emp_id", $grid_emp_id);
		$query = $this->db->get("pr_emp_com_info");*/
		$data = array();
		$this->db->distinct();
		$this->db->select('pr_emp_com_info.emp_id,pr_emp_per_info.emp_full_name,pr_designation.desig_name, pr_emp_com_info.emp_join_date, pr_dept.dept_name, pr_section.sec_name, pr_line_num.line_name, pr_id_proxi.proxi_id, pr_emp_shift.shift_name,pr_emp_com_info.emp_cat_id, pr_emp_com_info.gross_sal, pr_emp_com_info.ot_entitle, pr_emp_add.emp_pre_add, pr_emp_shift_log.in_time, pr_emp_shift_log.out_time, pr_emp_shift_log.ot_hour, pr_emp_shift_log.extra_ot_hour');
		$this->db->from('pr_emp_per_info');
		$this->db->from('pr_emp_com_info');
		$this->db->from('pr_designation');
		$this->db->from('pr_dept');
		$this->db->from('pr_section');
		$this->db->from('pr_line_num');
		$this->db->from('pr_id_proxi');
		$this->db->from('pr_emp_shift');
		$this->db->from("pr_emp_add");	
		$this->db->from('pr_emp_shift_log');
		$this->db->where_in("pr_emp_com_info.emp_id", $grid_emp_id);
		$this->db->where("pr_emp_add.emp_id = pr_emp_com_info.emp_id");
		$this->db->where("pr_emp_shift_log.emp_id = pr_emp_com_info.emp_id");
		$this->db->where('pr_emp_per_info.emp_id = pr_emp_com_info.emp_id');
		$this->db->where('pr_emp_com_info.emp_desi_id = pr_designation.desig_id');
		$this->db->where('pr_emp_com_info.emp_dept_id = pr_dept.dept_id');
		$this->db->where('pr_emp_com_info.emp_sec_id = pr_section.sec_id');
		$this->db->where('pr_emp_com_info.emp_line_id = pr_line_num.line_id');
		$this->db->where('pr_emp_com_info.emp_id = pr_id_proxi.emp_id');
		$this->db->where('pr_emp_shift.shift_id = pr_emp_com_info.emp_shift');
		$this->db->where("pr_emp_shift_log.shift_log_date", $att_date);
		$this->db->where("pr_emp_shift_log.ot_hour !=", 0 );
		$this->db->order_by("pr_emp_com_info.emp_id","ASC");
		$query = $this->db->get();
		foreach($query->result() as $rows)
		{
			$emp_id = $rows->emp_id;
			$ot_entitle = $rows->ot_entitle;
			$allowance_data = $this->get_allowance_data($emp_id,$ot_entitle,$att_date);
			
			$data["emp_id"][] 					= $emp_id;
			$data["proxi_id"][] 				= $rows->proxi_id;
			$data["emp_name"][] 				= $rows->emp_full_name;
			$data["doj"][] 						= $rows->emp_join_date;
			$data["add"][] 						= $rows->emp_pre_add;
			$data["dept_name"][] 				= $rows->dept_name;
			$data["sec_name"][] 				= $rows->sec_name;
			$data["desig_name"][] 				= $rows->desig_name;
			$data["line_name"][]				= $rows->line_name;
			$data["emp_shift"][] 				= $rows->shift_name;
			$data["out_time"][] 				= $allowance_data["out_time"];
			$data["first_tiffin_allo_min"][] 	= $allowance_data["first_tiffin_allo_min"];
			$data["second_tiffin_allo_min"][] 	= $allowance_data["second_tiffin_allo_min"];
			$data["night_allo_min"][] 			= $allowance_data["night_allo_min"];
			$data["first_tiffin_allo_amount"][] = $allowance_data["first_tiffin_allo_amount"];
			$data["second_tiffin_allo_amount"][] = $allowance_data["second_tiffin_allo_amount"];
			$data["night_allo_amount"][] 		= $allowance_data["night_allo_amount"];
		}
		if($data)
		{
			
			return $data;
		}
		else
		{
			return "Requested list is empty";
		}	
		
	}
	
	
	
	
	function grid_monthly_ot_register($grid_firstdate, $grid_emp_id)
	{
		$data = array();
		$search_year_month = substr($grid_firstdate,0,7);
		$this->db->select('pr_emp_com_info.emp_id,pr_emp_per_info.emp_full_name,  pr_designation.desig_name, pr_emp_com_info.emp_join_date, pr_dept.dept_name, pr_section.sec_name, pr_line_num.line_name, pr_id_proxi.proxi_id, pr_emp_shift.shift_name,pr_emp_com_info.emp_cat_id, pr_emp_com_info.gross_sal');
		$this->db->from('pr_emp_per_info');
		$this->db->from('pr_emp_com_info');
		$this->db->from('pr_designation');
		$this->db->from('pr_dept');
		$this->db->from('pr_section');
		$this->db->from('pr_line_num');
		$this->db->from('pr_id_proxi');
		$this->db->from('pr_emp_shift');
		$this->db->where_in("pr_emp_com_info.emp_id", $grid_emp_id);
		$this->db->where('pr_emp_per_info.emp_id = pr_emp_com_info.emp_id');
		$this->db->where('pr_emp_com_info.emp_desi_id = pr_designation.desig_id');
		$this->db->where('pr_emp_com_info.emp_dept_id = pr_dept.dept_id');
		$this->db->where('pr_emp_com_info.emp_sec_id = pr_section.sec_id');
		$this->db->where('pr_emp_com_info.emp_line_id = pr_line_num.line_id');
		$this->db->where('pr_emp_com_info.emp_id = pr_id_proxi.emp_id');
		$this->db->where('pr_emp_shift.shift_id = pr_emp_com_info.emp_shift');
		$this->db->order_by("pr_emp_com_info.emp_id","ASC");
		$query = $this->db->get();
				
		foreach($query->result() as $rows)
		{
			$emp_id = $rows->emp_id;
			$gross_sal = $rows->gross_sal;
				
			$basic_sal_payable = ($gross_sal * 60 / 100);
			$basic_sal = round($basic_sal_payable);
			$ot_rate = $basic_sal * 2 / 208 ;
			$ot_rate = round($ot_rate,2);
			
			/*$this->db->select_sum("ot_hour");
			$this->db->where("emp_id", $emp_id);
			$this->db->like("shift_log_date", $grid_firstdate);
			$this->db->having("ot_hour >", 0 );
			$query = $this->db->get("pr_emp_shift_log");*/
			
			$query = $this->db->query("SELECT SUM(`ot_hour`) AS ot_hour FROM `pr_emp_shift_log` WHERE `emp_id` = '$emp_id' AND `shift_log_date` LIKE '%$search_year_month%' having SUM(`ot_hour`)>0");
			
			//This is for extra OT hour add to the Monthly OT Register
			/*$query2 = $this->db->query("SELECT SUM(`extra_ot_hour`) AS extra_ot_hour FROM `pr_emp_shift_log` WHERE `emp_id` = '$emp_id' AND `shift_log_date` LIKE '%$search_year_month%' having SUM(`extra_ot_hour`)>0");
			if($query2->num_rows() > 0)
			{
				$row = $query2->row();
				$total_extra_ot_hour = $row->extra_ot_hour;
			}*/
			//echo $this->db->last_query();
			if($query->num_rows() > 0)
			{
				$row = $query->row();
				$total_ot_hour = $row->ot_hour;// + $total_extra_ot_hour; //This is for extra OT hour add to the Monthly OT Register
				$total_ot_amount = round($total_ot_hour * $ot_rate);
									
				$data["emp_id"][] 		= $emp_id;
				$data["proxi_id"][] 	= $rows->proxi_id;
				$data["emp_name"][] 	= $rows->emp_full_name;
				$data["doj"][] 			= $rows->emp_join_date;
				$data["dept_name"][] 	= $rows->dept_name;
				$data["sec_name"][] 	= $rows->sec_name;
				$data["desig_name"][] 	= $rows->desig_name;
				$data["line_name"][]	= $rows->line_name;
				$data["gross_sal"][] 	= $rows->gross_sal;
				$data["ot_rate"][]		= $ot_rate;
				$data["emp_shift"][] 	= $rows->shift_name;
				$data["total_ot_hour"][]= $total_ot_hour;
				$data["total_ot_amount"][]	= $total_ot_amount;
			}
		}
		
		if($data)
		{
			
			return $data;
		}
		else
		{
			return "Requested list is empty";
		}
	}
	
	function grid_monthly_eot_register($grid_firstdate, $grid_emp_id)
	{
		$data = array();
		$this->db->select('pr_emp_com_info.emp_id,pr_emp_per_info.emp_full_name,  pr_designation.desig_name, pr_emp_com_info.emp_join_date, pr_dept.dept_name, pr_section.sec_name, pr_line_num.line_name, pr_id_proxi.proxi_id, pr_emp_shift.shift_name,pr_emp_com_info.emp_cat_id, pr_emp_com_info.gross_sal');
		$this->db->from('pr_emp_per_info');
		$this->db->from('pr_emp_com_info');
		$this->db->from('pr_designation');
		$this->db->from('pr_dept');
		$this->db->from('pr_section');
		$this->db->from('pr_line_num');
		$this->db->from('pr_id_proxi');
		$this->db->from('pr_emp_shift');
		$this->db->where_in("pr_emp_com_info.emp_id", $grid_emp_id);
		$this->db->where('pr_emp_per_info.emp_id = pr_emp_com_info.emp_id');
		$this->db->where('pr_emp_com_info.emp_desi_id = pr_designation.desig_id');
		$this->db->where('pr_emp_com_info.emp_dept_id = pr_dept.dept_id');
		$this->db->where('pr_emp_com_info.emp_sec_id = pr_section.sec_id');
		$this->db->where('pr_emp_com_info.emp_line_id = pr_line_num.line_id');
		$this->db->where('pr_emp_com_info.emp_id = pr_id_proxi.emp_id');
		$this->db->where('pr_emp_shift.shift_id = pr_emp_com_info.emp_shift');
		$this->db->order_by("pr_emp_com_info.emp_id","ASC");
		$query = $this->db->get();
		
		$search_date = substr($grid_firstdate,0,7);
				
		foreach($query->result() as $rows)
		{
			$emp_id = $rows->emp_id;
			$gross_sal = $rows->gross_sal;
				
			$salary_structure 		= $this->common_model->salary_structure($gross_sal);	
			$ot_rate = $salary_structure['ot_rate'];
		
			$query = $this->db->query("SELECT SUM(`extra_ot_hour`) AS extra_ot_hour FROM `pr_emp_shift_log` WHERE `emp_id` = '$emp_id' AND `shift_log_date` LIKE '%$search_date%' having SUM(`extra_ot_hour`)>0");
			//echo $this->db->last_query();
			if($query->num_rows() > 0)
			{
				$row = $query->row();
				$total_ot_hour = $row->extra_ot_hour;
				$total_ot_amount = round($total_ot_hour * $ot_rate);
													
				$data["emp_id"][] 		= $emp_id;
				$data["proxi_id"][] 	= $rows->proxi_id;
				$data["emp_name"][] 	= $rows->emp_full_name;
				$data["doj"][] 			= $rows->emp_join_date;
				$data["dept_name"][] 	= $rows->dept_name;
				$data["sec_name"][] 	= $rows->sec_name;
				$data["desig_name"][] 	= $rows->desig_name;
				$data["line_name"][]	= $rows->line_name;
				$data["gross_sal"][] 	= $rows->gross_sal;
				$data["ot_rate"][]		= $ot_rate;
				$data["emp_shift"][] 	= $rows->shift_name;
				$data["total_ot_hour"][]= $total_ot_hour;
				$data["total_ot_amount"][]	= $total_ot_amount;
			}
		}
		
		if($data)
		{
			
			return $data;
		}
		else
		{
			return "Requested list is empty";
		}
	}
	
	function grid_monthly_allowance_register($grid_firstdate, $grid_emp_id)
	{
		$data = array();
		$search_date = substr($grid_firstdate,0,7);
		
		//echo $search_date;
		foreach($grid_emp_id as $emp_id)
		{
		//echo $emp_id;
		$first_tiffin_allo_amount = 0;
		$second_tiffin_allo_amount = 0;
		$night_allo_amount = 0;
		$this->db->select('pr_emp_com_info.emp_id,pr_emp_per_info.emp_full_name,  pr_emp_com_info.ot_entitle, pr_designation.desig_name, pr_emp_com_info.emp_join_date, pr_dept.dept_name, pr_section.sec_name, pr_line_num.line_name, pr_id_proxi.proxi_id, pr_emp_shift.shift_name, pr_emp_com_info.emp_cat_id, pr_emp_com_info.gross_sal, pr_emp_shift_log.shift_log_date');
		$this->db->from('pr_emp_per_info');
		$this->db->from('pr_emp_com_info');
		$this->db->from('pr_designation');
		$this->db->from('pr_dept');
		$this->db->from('pr_section');
		$this->db->from('pr_line_num');
		$this->db->from('pr_id_proxi');
		$this->db->from('pr_emp_shift');
		$this->db->from('pr_emp_shift_log');
		$this->db->where("pr_emp_com_info.emp_id", $emp_id);
		$this->db->where('pr_emp_per_info.emp_id = pr_emp_com_info.emp_id');
		$this->db->where('pr_emp_com_info.emp_desi_id = pr_designation.desig_id');
		$this->db->where('pr_emp_com_info.emp_dept_id = pr_dept.dept_id');
		$this->db->where('pr_emp_com_info.emp_sec_id = pr_section.sec_id');
		$this->db->where('pr_emp_com_info.emp_line_id = pr_line_num.line_id');
		$this->db->where('pr_emp_com_info.emp_id = pr_id_proxi.emp_id');
		$this->db->where('pr_emp_shift.shift_id = pr_emp_com_info.emp_shift');
		$this->db->where("pr_emp_shift_log.emp_id", $emp_id);
		$this->db->like("pr_emp_shift_log.shift_log_date",$search_date); 
		$this->db->order_by("pr_emp_com_info.emp_id","ASC");
		$this->db->group_by("pr_emp_shift_log.shift_log_date");
		$query = $this->db->get();
		//echo $query->num_rows();
			if($query->num_rows() != 0)
			{
				foreach ($query->result() as $rows)	
				{
					$att_date = $rows->shift_log_date;
					
					//echo $att_date."-**-";
					$emp_id = $rows->emp_id;
					$ot_entitle = $rows->ot_entitle;
					$allowance_data = $this->get_allowance_data($emp_id,$ot_entitle,$att_date);
					//print_r($allowance_data);
					$first_tiffin_allo_amount = $allowance_data["first_tiffin_allo_amount"] + $first_tiffin_allo_amount;
					$second_tiffin_allo_amount = $allowance_data["second_tiffin_allo_amount"] + $second_tiffin_allo_amount;
					$night_allo_amount = $allowance_data["night_allo_amount"] + $night_allo_amount;
				}
				//echo $emp_id."------".$first_tiffin_allo_amount." -**-";
				
				$data["emp_id"][] 					= $emp_id;
				$data["proxi_id"][] 				= $rows->proxi_id;
				$data["emp_name"][] 				= $rows->emp_full_name;
				$data["doj"][] 						= $rows->emp_join_date;
				$data["dept_name"][] 				= $rows->dept_name;
				$data["sec_name"][] 				= $rows->sec_name;
				$data["desig_name"][] 				= $rows->desig_name;
				$data["line_name"][]				= $rows->line_name;
				$data["emp_shift"][] 				= $rows->shift_name;
				$data["first_tiffin_allo_amount"][] = $first_tiffin_allo_amount;
				$data["second_tiffin_allo_amount"][] = $second_tiffin_allo_amount;
				$data["night_allo_amount"][] = $night_allo_amount;
			}
		}
		
		//print_r($data);
		if($data)
		{
			
			return $data;
		}
		else
		{
			return "Requested list is empty";
		}
	}
	
	
	
	function grid_time_search_report()
	{
		$f_date = '2012-04-01';
		$s_date = '2012-04-10';
		$f_time = '07:00:00';
		$s_time = '22:30:00';
		$grid_emp_id = array('001414','001635','001744','001750','001773','002070','002090','002110','002113','002178');
		$data = array();
		$this->db->select();
		$this->db->where_in("emp_id", $grid_emp_id);
		$this->db->where("shift_log_date BETWEEN '$f_date' AND '$s_date'");
		$this->db->where("in_time BETWEEN '$f_time' AND '$s_time'");
		$query = $this->db->get('pr_emp_shift_log');
		foreach($query->result() as $rows)
		{
			$data['emp_id'][] =  $rows->emp_id;
			$data['time'][]   =  $rows->in_time;
		}
		
		$this->db->select();
		$this->db->where_in("emp_id", $grid_emp_id);
		$this->db->where("shift_log_date BETWEEN '$f_date' AND '$s_date'");
		$this->db->where("out_time BETWEEN '$f_time' AND '$s_time'");
		$query = $this->db->get('pr_emp_shift_log');
		foreach($query->result() as $rows)
		{
			$data['emp_id'][] = $rows->emp_id;
			$data['time'][]   = $rows->out_time;
		}
		
		print_r($data);
	}
		
	function GetDays($sStartDate, $sEndDate)
	{  
       	$sStartDate = date("Y-m-d", strtotime($sStartDate)); 
		$sEndDate = date("Y-m-d", strtotime($sEndDate)); 
		  
        // Start the variable off with the start date  
    	$aDays[] = $sStartDate;  
    
    	// Set a 'temp' variable, sCurrentDate, with  
    	// the start date - before beginning the loop  
    	$sCurrentDate = $sStartDate;  
    
		// While the current date is less than the end date  
    	while($sCurrentDate < $sEndDate)
		{  
       		// Add a day to the current date  
       		$sCurrentDate = date("Y-m-d", strtotime("+1 day", strtotime($sCurrentDate)));  
     
       		// Add this new day to the aDays array  
        		$aDays[] = $sCurrentDate; 
			//print_r($aDays);
     	}  
     // Once the loop has finished, return the  
     return $aDays;  
   }
   
   //Daily OT hour calculation for Mothly Attendace Register
   function get_daily_total_ot_hour($emp_id, $ot_date)
   {
   		$this->db->select('ot_hour,extra_ot_hour');
		$this->db->where('emp_id', $emp_id);
		$this->db->where('shift_log_date', $ot_date);
		//$this->db->where('ot_hour !=', 0);
		$query = $this->db->get('pr_emp_shift_log');
		//echo $this->db->last_query();
		foreach($query->result() as $row)
		{
			$ot_hour = $row->ot_hour;
			$extra_ot_hour = $row->extra_ot_hour;
			return $total = $ot_hour; 
		}
		// + $extra_ot_hour; This will add if you want to add extra OT to Monthly Attendance Register.
		
   }
   
   function get_daily_total_eot_hour($emp_id, $ot_date)
   {
   		$this->db->select('ot_hour,extra_ot_hour');
		$this->db->where('emp_id', $emp_id);
		$this->db->where('shift_log_date', $ot_date);
		//$this->db->where('ot_hour !=', 0);
		$query = $this->db->get('pr_emp_shift_log');
		//echo $this->db->last_query();
		foreach($query->result() as $row)
		{
			$ot_hour = $row->ot_hour;
			$extra_ot_hour = $row->extra_ot_hour;
			return $total = $extra_ot_hour; 
		}
		// + $extra_ot_hour; This will add if you want to add extra OT to Monthly Attendance Register.
		
   }
   function get_leave_type($shift_log_date,$emp_id)
   {
   		$this->db->select('leave_type');
		$this->db->where('emp_id', $emp_id);
		$this->db->where('start_date', $shift_log_date);
		$query = $this->db->get('pr_leave_trans');
		$row = $query->row();
		$leave_type = $row->leave_type;
		return $leave_type;
   }
   
    function get_shift_out_time($shift_id)
	{
		$this->db->select('*');
		$this->db->where("shift_id",$shift_id);
		$query = $this->db->get('pr_emp_shift_schedule');
		$rows = $query->row();
		$end_time = $rows->ot_start;
		return $end_time;
	}
	
   
   function get_allowance_data($emp_id,$ot_entitle,$att_date)
	{
			$data = array();
			if($ot_entitle == 1) //ot = 'No' for staff
			{
				$id = 1;
			}
			else
			{
				$id = 2;
			}
			
			$allowance_bills 				= $this->common_model->allowance_bills($id);
			$first_tiffin_allo_min 			= $allowance_bills['first_tiffin_allo_min'];
			$second_tiffin_allo_min 		= $allowance_bills['second_tiffin_allo_min'];
			$night_allo_min 				= $allowance_bills['night_allo_min'];
			$first_tiffin_allo_amount 		= $allowance_bills['first_tiffin_allo_amount'];
			$second_tiffin_allo_amount 		= $allowance_bills['second_tiffin_allo_amount'];
			$night_allo_amount 				= $allowance_bills['night_allo_amount'];
			
			$this->db->select('*');
			$this->db->where("shift_log_date",$att_date);
			$this->db->where("emp_id",$emp_id);
			$query1 = $this->db->get('pr_emp_shift_log');
			
			//echo $query1->num_rows();
			
			foreach ($query1->result() as $row)
			{
				$shift_id = $row->shift_id;
				$out_time = $row->out_time;
				//$out_time = "21:01:26";
				//echo "--------".$out_time;
				$shift_out_time = $this->get_shift_out_time($shift_id);
			}
			
		
			
			if($out_time !="00:00:00")
			{
				$new_shift_out_time = date("h:i:s A", strtotime($shift_out_time));
				$date_shift_out_time = $att_date." ".$new_shift_out_time;
				//echo $new_shift_out_time;
				$first_shift_out_time=trim(substr($new_shift_out_time,9,2));
				
				$new_out_time = date("h:i:s A", strtotime($out_time));
				$first_out_time=trim(substr($new_out_time,9,2));
				
				if($first_shift_out_time == $first_out_time)
				{
					$date_out_time = $att_date." ".$new_out_time;
					
				}
				else
				{
					 $att_date_new = strtotime(date("Y-m-d", strtotime($att_date)) . " +1 day");
					 $newdate = date ( 'Y-m-d' , $att_date_new );
					 $date_out_time = $newdate." ".$new_out_time;
				}
				
				
				if(strtotime($date_shift_out_time) < strtotime($date_out_time))
				{
					$date1 = new DateTime($date_out_time);
					$date2 = new DateTime($date_shift_out_time);
					$interval = $date1->diff($date2);
					$hour =  $interval->h;
					$min =  $interval->i;
					//$ss =  $interval->s;
					$total_min = ($hour * 60) + $min;
					//$total_min = 0;
					if($night_allo_min <= $total_min)
					{
						echo "";
						//$tiffin_allo_amount =$tiffin_allo_amount*2;
					}
					else if($second_tiffin_allo_min <= $total_min)
					{
						//echo "2nd";
						$night_allo_amount = 0;
					}
					else if($first_tiffin_allo_min <= $total_min)
					{
						//echo "1st";
						$second_tiffin_allo_amount = 0;
						$night_allo_amount = 0;
					}
					else
					{
						$first_tiffin_allo_amount = 0;
						$second_tiffin_allo_amount = 0;
						$night_allo_amount = 0;
					}
					//echo $total_min."***".$ot_entitle."///////";
				}
				else
				{
					$first_tiffin_allo_amount = 0;
					$second_tiffin_allo_amount = 0;
					$night_allo_amount = 0;
				}
					//echo $emp_id."-----".$date_out_time."------".$date_shift_out_time."-----".$night_allo_amount."****";
			}
			else
			{
				$first_tiffin_allo_amount = 0;
				$second_tiffin_allo_amount = 0;
				$night_allo_amount = 0;
			}
			//echo $tiffin_allo_amount;
			$data['att_date'] = $att_date;
			$data['out_time'] = $out_time;
			$data['first_tiffin_allo_min'] = $first_tiffin_allo_min;
			$data['second_tiffin_allo_min'] = $second_tiffin_allo_min;
			$data['night_allo_min'] = $night_allo_min;
			$data['first_tiffin_allo_amount'] = $first_tiffin_allo_amount;
			$data['second_tiffin_allo_amount'] = $second_tiffin_allo_amount;
			$data['night_allo_amount'] = $night_allo_amount;
			return $data;
	}
	function get_dept_name($dept_id)
	{
		$this->db->select("dept_name");
		$this->db->where("dept_id", $dept_id);
		$query = $this->db->get('pr_dept');
		foreach($query->result() as $rows)
		{
			$dept_name =  $rows->dept_name;
		}
		return $dept_name;
	}
	
	function get_section_name($section_id)
	{
		$this->db->select("sec_name");
		$this->db->where("sec_id", $section_id);
		$query = $this->db->get('pr_section');
		foreach($query->result() as $rows)
		{
			$sec_name =  $rows->sec_name;
		}
		return $sec_name;
	}
	
	function get_line_name($line_id)
	{
		$this->db->select("line_name");
		$this->db->where("line_id", $line_id);
		$query = $this->db->get('pr_line_num');
		foreach($query->result() as $rows)
		{
			$line_name =  $rows->line_name;
		}
		return $line_name;
	}
	
	function get_desig_name($desig_id)
	{
		$this->db->select("desig_name");
		$this->db->where("desig_id", $desig_id);
		$query = $this->db->get('pr_designation');
		foreach($query->result() as $rows)
		{
			$desig_name =  $rows->desig_name;
		}
		return $desig_name;
	}
	
	function grid_earn_leave_report($grid_emp_id)
	{
		$data = array();
		$this->db->select('pr_emp_com_info.emp_id,pr_emp_per_info.emp_full_name,pr_designation.desig_name,pr_emp_com_info.emp_join_date, pr_dept.dept_name, pr_section.sec_name, pr_line_num.line_name, pr_id_proxi.proxi_id, pr_emp_shift.shift_name,pr_emp_com_info.emp_cat_id, pr_emp_com_info.gross_sal,pr_leave_earn.old_earn_balance,pr_leave_earn.current_earn_balance,pr_leave_earn.last_update');
		$this->db->from('pr_emp_per_info');
		$this->db->from('pr_emp_com_info');
		$this->db->from('pr_designation');
		$this->db->from('pr_dept');
		$this->db->from('pr_section');
		$this->db->from('pr_line_num');
		$this->db->from('pr_id_proxi');
		$this->db->from('pr_emp_shift');
		$this->db->from('pr_leave_earn');
		$this->db->where_in("pr_emp_com_info.emp_id", $grid_emp_id);
		//$this->db->where_in("pr_leave_earn.emp_id", $grid_emp_id);
		$this->db->where('pr_emp_com_info.emp_id = pr_leave_earn.emp_id');
		$this->db->where('pr_emp_per_info.emp_id = pr_emp_com_info.emp_id');
		$this->db->where('pr_emp_com_info.emp_desi_id = pr_designation.desig_id');
		$this->db->where('pr_emp_com_info.emp_dept_id = pr_dept.dept_id');
		$this->db->where('pr_emp_com_info.emp_sec_id = pr_section.sec_id');
		$this->db->where('pr_emp_com_info.emp_line_id = pr_line_num.line_id');
		$this->db->where('pr_emp_com_info.emp_id = pr_id_proxi.emp_id');
		$this->db->where('pr_emp_shift.shift_id = pr_emp_com_info.emp_shift');
		$this->db->order_by("pr_emp_com_info.emp_id","ASC");
		$query = $this->db->get();
		
		foreach($query->result() as $rows)
		{
			$emp_id = $rows->emp_id;
			$gross_sal = $rows->gross_sal;
			$data["emp_id"][] 		= $emp_id;
			$data["proxi_id"][] 	= $rows->proxi_id;
			$data["emp_name"][] 	= $rows->emp_full_name;
			$data["doj"][] 			= $rows->emp_join_date;
			$data["dept_name"][] 	= $rows->dept_name;
			$data["sec_name"][] 	= $rows->sec_name;
			$data["desig_name"][] 	= $rows->desig_name;
			$data["line_name"][]	= $rows->line_name;
			$data["gross_sal"][] 	= $rows->gross_sal;
			$data["emp_shift"][] 	= $rows->shift_name;
			$data["old_earn_balance"][]		= $rows->old_earn_balance;
			$data["current_earn_balance"][] = $rows->current_earn_balance;
			$data["last_update"][] 			= $rows->last_update;
			
			/*$this->db->select("*");
			$this->db->where("emp_id", $emp_id);
			$query1 = $this->db->get('pr_leave_earn');
			foreach($query1->result() as $rows)
			{
				
				$data["old_earn_balance"][]		= $rows->old_earn_balance;
				$data["current_earn_balance"][] = $rows->current_earn_balance;
				$data["last_update"][] 			= $rows->last_update;
			}*/
			
			$prev_month_info = $this->get_prev_month_info($emp_id);
			foreach($prev_month_info->result() as $rows)
			{
				$data["total_days"][]= $rows->total_days;
				$data["pay_wages"][] = $rows->pay_wages;
				$data["pay_days"][] = $rows->pay_days;
			}
		
		}
		$current_year = date("Y");
		$start_date = "$current_year-01-01";
		$end_date = date("Y-m-d");
		
		// caculate number of days between dates
		$days = $this->get_days($start_date, $end_date);
		
		// calculate number of weekends
		$weekend = $this->common_model->get_setup_attributes(5);
		//echo $weekend;
		//$weekend = "Fri";
		$weekend_days = $this->get_weekend_days($weekend,$days,$start_date);
		
		// calculate number of holyday between dates
		$holy_day = $this->get_holyday($start_date,$end_date);
		$actual_working_days = $days - $weekend_days - $holy_day;
		
		$data["actual_working_days"] = $actual_working_days;
		
		
		//print_r($data);
		if($data)
		{
			
			return $data;
		}
		else
		{
			return "Requested list is empty";
		}
	}
	function new_join_letter_report($grid_emp_id)
	{
		$data = array();
		$this->db->select('pr_emp_com_info.emp_id,pr_emp_per_info.emp_full_name,pr_designation.desig_name,pr_emp_com_info.emp_join_date, pr_dept.dept_name, pr_section.sec_name, pr_line_num.line_name, pr_id_proxi.proxi_id, pr_emp_shift.shift_name,pr_emp_com_info.emp_cat_id, pr_emp_com_info.gross_sal,pr_leave_earn.old_earn_balance,pr_leave_earn.current_earn_balance,pr_leave_earn.last_update');
		$this->db->from('pr_emp_per_info');
		$this->db->from('pr_emp_com_info');
		$this->db->from('pr_designation');
		$this->db->from('pr_dept');
		$this->db->from('pr_section');
		$this->db->from('pr_line_num');
		$this->db->from('pr_id_proxi');
		$this->db->from('pr_emp_shift');
		$this->db->from('pr_leave_earn');
		$this->db->where_in("pr_emp_com_info.emp_id", $grid_emp_id);
		//$this->db->where_in("pr_leave_earn.emp_id", $grid_emp_id);
		$this->db->where('pr_emp_com_info.emp_id = pr_leave_earn.emp_id');
		$this->db->where('pr_emp_per_info.emp_id = pr_emp_com_info.emp_id');
		$this->db->where('pr_emp_com_info.emp_desi_id = pr_designation.desig_id');
		$this->db->where('pr_emp_com_info.emp_dept_id = pr_dept.dept_id');
		$this->db->where('pr_emp_com_info.emp_sec_id = pr_section.sec_id');
		$this->db->where('pr_emp_com_info.emp_line_id = pr_line_num.line_id');
		$this->db->where('pr_emp_com_info.emp_id = pr_id_proxi.emp_id');
		$this->db->where('pr_emp_shift.shift_id = pr_emp_com_info.emp_shift');
		$this->db->order_by("pr_emp_com_info.emp_id","ASC");
		$query = $this->db->get();
		
		foreach($query->result() as $rows)
		{
			$emp_id = $rows->emp_id;
			$gross_sal = $rows->gross_sal;
			$data["emp_id"][] 		= $emp_id;
			$data["proxi_id"][] 	= $rows->proxi_id;
			$data["emp_name"][] 	= $rows->emp_full_name;
			$data["doj"][] 			= $rows->emp_join_date;
			$data["dept_name"][] 	= $rows->dept_name;
			$data["sec_name"][] 	= $rows->sec_name;
			$data["desig_name"][] 	= $rows->desig_name;
			$data["line_name"][]	= $rows->line_name;
			$data["gross_sal"][] 	= $rows->gross_sal;
			$data["emp_shift"][] 	= $rows->shift_name;
			$data["old_earn_balance"][]		= $rows->old_earn_balance;
			$data["current_earn_balance"][] = $rows->current_earn_balance;
			$data["last_update"][] 			= $rows->last_update;
			
			/*$this->db->select("*");
			$this->db->where("emp_id", $emp_id);
			$query1 = $this->db->get('pr_leave_earn');
			foreach($query1->result() as $rows)
			{
				
				$data["old_earn_balance"][]		= $rows->old_earn_balance;
				$data["current_earn_balance"][] = $rows->current_earn_balance;
				$data["last_update"][] 			= $rows->last_update;
			}*/
			
			$prev_month_info = $this->get_prev_month_info($emp_id);
			foreach($prev_month_info->result() as $rows)
			{
				$data["total_days"][]= $rows->total_days;
				$data["pay_wages"][] = $rows->pay_wages;
				$data["pay_days"][] = $rows->pay_days;
			}
		
		}
		$current_year = date("Y");
		$start_date = "$current_year-01-01";
		$end_date = date("Y-m-d");
		
		// caculate number of days between dates
		$days = $this->get_days($start_date, $end_date);
		
		// calculate number of weekends
		$weekend = $this->common_model->get_setup_attributes(5);
		//echo $weekend;
		//$weekend = "Fri";
		$weekend_days = $this->get_weekend_days($weekend,$days,$start_date);
		
		// calculate number of holyday between dates
		$holy_day = $this->get_holyday($start_date,$end_date);
		$actual_working_days = $days - $weekend_days - $holy_day;
		
		$data["actual_working_days"] = $actual_working_days;
		
		
		//print_r($data);
		if($data)
		{
			
			return $data;
		}
		else
		{
			return "Requested list is empty";
		}
	}
	
	function grid_pf_statement($year, $month, $grid_emp_id)
	{
		$data = array();
		$this->db->select('pr_emp_com_info.emp_id,pr_emp_per_info.emp_full_name,pr_designation.desig_name,pr_emp_com_info.emp_join_date, pr_dept.dept_name, pr_section.sec_name, pr_line_num.line_name, pr_id_proxi.proxi_id, pr_emp_shift.shift_name,pr_emp_com_info.emp_cat_id, pr_emp_com_info.gross_sal');
		$this->db->from('pr_emp_per_info');
		$this->db->from('pr_emp_com_info');
		$this->db->from('pr_designation');
		$this->db->from('pr_dept');
		$this->db->from('pr_section');
		$this->db->from('pr_line_num');
		$this->db->from('pr_id_proxi');
		$this->db->from('pr_emp_shift');
		$this->db->where_in("pr_emp_com_info.emp_id", $grid_emp_id);
		$this->db->where('pr_emp_per_info.emp_id = pr_emp_com_info.emp_id');
		$this->db->where('pr_emp_com_info.emp_desi_id = pr_designation.desig_id');
		$this->db->where('pr_emp_com_info.emp_dept_id = pr_dept.dept_id');
		$this->db->where('pr_emp_com_info.emp_sec_id = pr_section.sec_id');
		$this->db->where('pr_emp_com_info.emp_line_id = pr_line_num.line_id');
		$this->db->where('pr_emp_com_info.emp_id = pr_id_proxi.emp_id');
		$this->db->where('pr_emp_shift.shift_id = pr_emp_com_info.emp_shift');
		$this->db->order_by("pr_emp_com_info.emp_id","ASC");
		$query = $this->db->get();
		//echo $this->db->last_query();
		foreach($query->result() as $rows)
		{
			$emp_id = $rows->emp_id;
			$gross_sal = $rows->gross_sal;
			$data["emp_id"][] 		= $emp_id;
			$data["proxi_id"][] 	= $rows->proxi_id;
			$data["emp_full_name"][]= $rows->emp_full_name;
			$data["emp_join_date"][]= $rows->emp_join_date;
			$data["dept_name"][] 	= $rows->dept_name;
			$data["sec_name"][] 	= $rows->sec_name;
			$data["desig_name"][] 	= $rows->desig_name;
			$data["line_name"][]	= $rows->line_name;
			$data["gross_sal"][] 	= $rows->gross_sal;
		}
		return $data;
	}
	
	function get_days($from, $to)
	{
		$first_date = strtotime($from);
    	$second_date = strtotime($to);
   		$offset = $second_date-$first_date; 
    	return floor($offset/60/60/24);
	}
	
	function get_weekend_days($weekend,$days,$start_date)
	{
		$no_weekends = 0;
		for($i=0;$i<$days + 1;$i++)
		{
			$date =  strtotime(date("Y-m-d", strtotime($start_date)) . " +$i day");
			
			$new_date = date("D",$date);
			
			if($new_date == $weekend)
			{
				$no_weekends = $no_weekends +1;
			}			
		}
		return $no_weekends;
	}
	
	function get_holyday($from, $to)
	{
		$where="start_date  BETWEEN '$from' and '$to'" ;
		$this->db->select('*');
		$this->db->where($where);
		$query=$this->db->get('pr_holiday');
		
		$num_holyday = $query->num_rows();
		return $num_holyday;
		
	}
	
	function get_prev_month_info($emp_id)
	{
		$prev_month = date("Y-m", strtotime("-1 months"));
		$this->db->select("total_days,pay_wages,pay_days");
		$this->db->where('emp_id',$emp_id);
		$this->db->like('salary_month',$prev_month);
		$query=$this->db->get('pr_pay_scale_sheet');
		return $query;
	}
	
	
}
?>