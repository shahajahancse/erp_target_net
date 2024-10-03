<?php
class Log_model extends CI_Model{
	
	
	function __construct()
	{
		parent::__construct();
		
		/* Standard Libraries */
		date_default_timezone_set('Asia/Dhaka');
	}
	
	function log_login_insert()
	{
		$log_username 	= $this->session->userdata('username');
		$log_ip_address = $_SERVER['REMOTE_ADDR'];
		$user_agent 	= $_SERVER['HTTP_USER_AGENT'];
		$log_message 	= "LOGIN : IN  --> [USERNAME : $log_username, has Login  from $log_ip_address, USER_AGENT : $user_agent]";
		log_message('error', $log_message);	
	}
	
	function log_login_out()
	{
		$log_username 	= $this->session->userdata('username');
		$log_ip_address = $_SERVER['REMOTE_ADDR'];
		$user_agent 	= $_SERVER['HTTP_USER_AGENT'];
		$log_message 	= "LOGIN : OUT --> [USERNAME : $log_username, has Logout from $log_ip_address, USER_AGENT : $user_agent]";
		log_message('error', $log_message);	
	}
	
	function log_profile_insert($log_username, $log_emp_id)
	{
		$log_message = "PROFILE : INSERT --> [USERNAME : $log_username, EMP ID: $log_emp_id]";
		log_message('error', $log_message);	
	
	}	
	
	function log_profile_update($log_username, $log_emp_id)
	{
		$log_message = "PROFILE : UPDATE --> [USERNAME : $log_username, EMP ID: $log_emp_id]";
		log_message('error', $log_message);	
	}
	
	function log_profile_resign($log_emp_id)
	{
		$log_username = $this->session->userdata('username');
		$log_message  = "PROFILE : RESIGN --> [USERNAME : $log_username, EMP ID: $log_emp_id]";
		log_message('error', $log_message);	
	}
	
	function log_manual_present($log_username, $log_emp_id, $grid_firstdate, $grid_seconddate, $manual_time)
	{
		$id ='';
		foreach($log_emp_id as $emp_id)
		{
			$id .= "$emp_id, "; 
		}
		$log_message = "MANUAL : PRESENT --> [USERNAME : $log_username, FIRSTDATE : $grid_firstdate, SECONDDATE : $grid_seconddate, TIME : $manual_time,  EMP_ID_RANGE : $id]";
		log_message('error', $log_message);	
	
	}	
	
	function log_manual_absent($log_username, $log_emp_id, $grid_firstdate, $grid_seconddate)
	{
		$id ='';
		foreach($log_emp_id as $emp_id)
		{
			$id .= "$emp_id, "; 
		}
		$log_message = "MANUAL : ABSENT --> [USERNAME : $log_username, FIRSTDATE : $grid_firstdate, SECONDDATE : $grid_seconddate, EMP_ID_RANGE : $id]";
		log_message('error', $log_message);	
	
	}	
	
	function log_manual_workoff($log_username, $log_emp_id, $grid_firstdate)
	{
		$id ='';
		foreach($log_emp_id as $emp_id)
		{
			$id .= "$emp_id, "; 
		}
		$log_message = "MANUAL : WORKOFF --> [USERNAME : $log_username, WORKOFF_DATE : $grid_firstdate, EMP_ID_RANGE : $id]";
		log_message('error', $log_message);	
	
	}	
	
	function log_manual_holiday($log_username, $grid_firstdate, $holiday_description)
	{
		$log_message = "MANUAL : HOLIDAY --> [USERNAME : $log_username, HOLIDAY_DATE : $grid_firstdate, HOLIDAY_DESC : $holiday_description]";
		log_message('error', $log_message);	
	}
	
	function log_leave_insert($empid_leave, $sStartDate, $sEndDate, $leave_type)
	{
		$log_username = $this->session->userdata('username');
		$log_message = "LEAVE : INSERT --> [USERNAME : $log_username, STARTDATE : $sStartDate, ENDDATE : $sEndDate, LEAVE_TYPE : $leave_type]";
		log_message('error', $log_message);	
	}
	
	function log_advance_loan_insert($emp_id, $loan_amt, $pay_amt, $loan_date)
	{
		$log_username = $this->session->userdata('username');
		$log_message = "ADVANCE LOAN : INSERT --> [USERNAME : $log_username, LOANDATE : $loan_date, LOAN_AMT : $loan_amt, PAY_AMT : $pay_amt, EMP_ID : $emp_id]";
		log_message('error', $log_message);	
	}
	
	function log_attn_process($input_date)
	{
		$log_username = $this->session->userdata('username');
		$log_message = "ATTENDANCE PROCESS --> [USERNAME : $log_username, PROCESS_DATE : $input_date]";
		log_message('error', $log_message);	
	}
	
	function log_salary_process($year, $month)
	{
		$log_username = $this->session->userdata('username');
		$log_message = "SALARY PROCESS --> [USERNAME : $log_username, PROCESS_MONTH : $year-$month]";
		log_message('error', $log_message);	
	}
	
	function log_new_to_regular($year, $month)
	{
		$log_username = $this->session->userdata('username');
		$log_message = "NEW TO REGULAR  --> [USERNAME : $log_username, NEW_TO_REGULAR_MONTH : $year-$month]";
		log_message('error', $log_message);	
	}
}
?>