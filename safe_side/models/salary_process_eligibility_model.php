<?php
class Salary_process_eligibility_model extends CI_Model{
	
	
	function __construct()
	{
		parent::__construct();
		
		/* Standard Libraries */
	}
	


	function salary_process_eligibility($emp_id,$start_date,$end_date)
	{
		$salary_year_month = date('Y-m', strtotime($start_date));
		
		$join_check 	= $this->join_range_check($emp_id,$end_date);
		$resign_check 	= $this->resign_range_check($emp_id,$start_date);
		$left_check 	= $this->left_range_check($emp_id,$start_date);
		
		if($join_check != false and $resign_check != false and $left_check != false)
		{
			return true;
		}
		else
		{
			$second_half_search_start_date 		= date("Y-m-01", strtotime($end_date));
			$this->db->where('emp_id', $emp_id);
			$this->db->where('salary_month', $second_half_search_start_date);
			$this->db->delete('pd_pay_scale_sheet'); 
			return false;
		}
	}
	function salary_process_eligibility_fixed($emp_id,$start_date,$end_date)
	{
		$salary_year_month = date('Y-m', strtotime($start_date));
		
		$join_check 	= $this->join_range_check($emp_id,$end_date);
		$resign_check 	= $this->resign_range_check($emp_id,$start_date);
		$left_check 	= $this->left_range_check($emp_id,$start_date);
		
		if($join_check != false and $resign_check != false and $left_check != false)
		{
			return true;
		}
		else
		{
			$second_half_search_start_date 		= date("Y-m-01", strtotime($end_date));
			$this->db->where('emp_id', $emp_id);
			$this->db->where('salary_month', $second_half_search_start_date);
			$this->db->delete('pr_pay_scale_sheet'); 
			return false;
		}
	}
	
	function join_range_check($emp_id,$end_date)
	{
		$this->db->select('emp_join_date');
		$this->db->where('emp_id', $emp_id);
		$this->db->where("trim(substr(emp_join_date,1,10)) <= '$end_date'");
		$query = $this->db->get('pr_emp_com_info');
		//echo $this->db->last_query();
		if($query->num_rows() > 0)
		{
			return true;
		}	
		else
		{
			return false;	
		}
	}
	
	function resign_range_check($emp_id,$start_date)
	{
		$this->db->select('resign_date');
		$this->db->where('emp_id', $emp_id);
		$query = $this->db->get('pr_emp_resign_history');
		//echo $this->db->last_query();
		if($query->num_rows() == 0)
		{
			return true;
		}	
		else
		{
			$this->db->select('resign_date');
			$this->db->where('emp_id', $emp_id);
			$this->db->where("trim(substr(resign_date,1,10)) >= '$start_date'");
			$query = $this->db->get('pr_emp_resign_history');
			//echo $this->db->last_query();
			if($query->num_rows() > 0)
			{
				return true;
			}	
			else
			{
				return false;	
			}
		}
	}
	function left_range_check($emp_id,$start_date)
	{
		$this->db->select('left_date');
		$this->db->where('emp_id', $emp_id);
		$query = $this->db->get('pr_emp_left_history');
		//echo $this->db->last_query();
		if($query->num_rows() == 0)
		{
			return true;
		}	
		else
		{
			$this->db->select('left_date');
			$this->db->where('emp_id', $emp_id);
			$this->db->where("trim(substr(left_date,1,10)) >= '$start_date'");
			$query = $this->db->get('pr_emp_left_history');
			//echo $this->db->last_query();
			if($query->num_rows() > 0)
			{
				return true;
			}	
			else
			{
				return false;	
			}
		}
	}
		
}