<?php
class Mars_model extends CI_Model{
	
	
	function __construct()
	{
		parent::__construct();
		
		/* Standard Libraries */
	}
	
	function department_attendance_summary($report_date)
	{
		$query = $this->db->select()->order_by('dept_name')->get('pr_dept');
		$data = array();
		foreach($query->result() as $rows)
		{
			$data['cat_name'][] = $rows->dept_name;
			
			$all_emp_id = $this->get_department_emp_by_id($rows->dept_id);
			
			if(!empty($all_emp_id))
			{
				$data['daily_att_sum'][] = $this->daily_attendance_summary($report_date, $all_emp_id);
			}
			else
			{
				$data['daily_att_sum'][] = '';
			}
		}
		return $data;
		
	}
	
	function get_department_emp_by_id($dept_id)
	{
		$emp_cat = array(1,2);
		$query = $this->db->select('emp_id')->where('emp_dept_id', $dept_id)->where_in('emp_cat_id',$emp_cat)->get('pr_emp_com_info');
		$data = array();
		foreach($query->result() as $rows)
		{
			$data[] = $rows->emp_id;
		}
		return $data;
	}
	
	function section_attendance_summary($report_date)
	{
		$query = $this->db->select()->order_by('sec_name')->get('pr_section');
		$data = array();
		foreach($query->result() as $rows)
		{
			$data['cat_name'][] = $rows->sec_name;
			
			$all_emp_id = $this->get_section_emp_by_id($rows->sec_id);
			
			if(!empty($all_emp_id))
			{
				$data['daily_att_sum'][] = $this->daily_attendance_summary($report_date, $all_emp_id);
			}
			else
			{
				$data['daily_att_sum'][] = '';
			}
		}
		return $data;
		
	}
	
	function get_section_emp_by_id($sec_id)
	{
		$emp_cat = array(1,2);
		$query = $this->db->select('emp_id')->where('emp_sec_id', $sec_id)->where_in('emp_cat_id',$emp_cat)->get('pr_emp_com_info');
		$data = array();
		foreach($query->result() as $rows)
		{
			$data[] = $rows->emp_id;
		}
		return $data;
	}
	
	function line_attendance_summary($report_date)
	{
		$query = $this->db->select()->order_by('line_name')->get('pr_line_num');
		$data = array();
		foreach($query->result() as $rows)
		{
			$data['cat_name'][] = $rows->line_name;
			
			$all_emp_id = $this->get_line_emp_by_id($rows->line_id);
			
			if(!empty($all_emp_id))
			{
				$data['daily_att_sum'][] = $this->daily_attendance_summary($report_date, $all_emp_id);
			}
			else
			{
				$data['daily_att_sum'][] = '';
			}
		}
		return $data;
		
	}
	
	function get_line_emp_by_id($line_id)
	{
		$emp_cat = array(1,2);
		$query = $this->db->select('emp_id')->where('emp_line_id', $line_id)->where_in('emp_cat_id',$emp_cat)->get('pr_emp_com_info');
		$data = array();
		foreach($query->result() as $rows)
		{
			$data[] = $rows->emp_id;
		}
		return $data;
	}
		
	function daily_attendance_summary($report_date, $all_emp_id)
	{
		$data =array();
						
		$this->db->select('emp_id');
		$this->db->from("pr_emp_shift_log");
		$this->db->where_in("emp_id", $all_emp_id);
		$this->db->where("shift_log_date", $report_date);
		$this->db->group_by('emp_id');
		$data['all_emp'] = $this->db->get()->num_rows();
		//echo $this->db->last_query();
				
		$this->db->select("pr_emp_shift_log.emp_id");
		$this->db->from("pr_emp_shift_log");
		$this->db->where_in("pr_emp_shift_log.emp_id", $all_emp_id);
		$this->db->where("pr_emp_shift_log.shift_log_date", $report_date);
		$this->db->where("pr_emp_shift_log.in_time !=", "00:00:00");
		$this->db->group_by('pr_emp_shift_log.emp_id');
		$data['all_present'] = $this->db->get()->num_rows();
		
		$this->db->select("emp_id");
		$this->db->from("pr_leave_trans");
		$this->db->where_in("emp_id", $all_emp_id);
		$this->db->where("start_date", $report_date);
		$this->db->group_by('emp_id');
		$data['all_leave'] = $this->db->get()->num_rows();
				
		$this->db->select("pr_emp_shift_log.emp_id");
		$this->db->from("pr_emp_shift_log");
		$this->db->where_in("pr_emp_shift_log.emp_id", $all_emp_id);
		$this->db->where("pr_emp_shift_log.shift_log_date", $report_date);
		$this->db->where("pr_emp_shift_log.in_time", "00:00:00");
		$this->db->group_by('pr_emp_shift_log.emp_id');
		$all_absent = $this->db->get()->num_rows();
		$all_absent = $all_absent - $data['all_leave'];
		$data['all_absent'] = $all_absent;
		
		
		
		$this->db->select("pr_emp_shift_log.emp_id");
		$this->db->from("pr_emp_shift_log");
		$this->db->where_in("pr_emp_shift_log.emp_id", $all_emp_id);
		$this->db->where("pr_emp_shift_log.shift_log_date", $report_date);
		$this->db->where("pr_emp_shift_log.late_status",1);
		$this->db->group_by('pr_emp_shift_log.emp_id');
	 	$data['all_late'] = $this->db->get()->num_rows();
		
		return $data;
	}
}
?>