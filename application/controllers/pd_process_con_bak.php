<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pd_process_con extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
		/* Standard Libraries */
		$this->load->model('pd_process_model');
		$this->load->model('salary_process_eligibility_model');
		set_time_limit(0);
		ini_set("memory_limit","512M");	
	}
	function pd_process_form()
	{
		if($this->session->userdata('logged_in')==FALSE)
		$this->load->view('login_message');
		else
		$this->load->view('form/pd_process');
	}
	public function pd_process()
	{
		$month = $this->input->post('month');
		$year = $this->input->post('year');
		$date = $this->pd_process_model->get_start_end_date($month,$year);
		$all_emp_id = $this->pd_process_model->get_all_pd_emp_id();
		foreach($all_emp_id->result() as $row)
		{
			$salary_process_eligibility = $this->salary_process_eligibility_model->salary_process_eligibility($row->emp_id,$date['start_date'],$date['end_date']);
				
			if($salary_process_eligibility == true)
			{ 
				$result = $this->pd_process_model->insert_into_pd_sum_logs($row->emp_id,$date['start_date'],$date['end_date']);
				if($result == false)
				{
				exit;
				}
			}
			
		}
	}
	
}