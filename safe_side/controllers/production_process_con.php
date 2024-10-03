<?php
class Production_process_con extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
		/* Standard Libraries */
		//$this->load->model('attn_process_model');
		//$this->load->model('log_model');
		$this->load->model('production_salary_process_model');
		$this->load->model('salary_process_eligibility_model');
		$this->load->library('grocery_CRUD');
		set_time_limit(0);
		ini_set("memory_limit","512M");
		//$this->load->model('acl_model');
		//$access_level = 4;
		//$acl = $this->acl_model->acl_check($access_level);
	}
	//-------------------------------------------------------------------------------------------------------
	// Form display for Attendance Process
	//-------------------------------------------------------------------------------------------------------
	function production_salary_process_form()
	{
		if($this->session->userdata('logged_in')==FALSE)
		$this->load->view('login_message');
		else
		$crud = new grocery_CRUD();

		$crud->set_table('pr_salary_block');
		$crud->set_subject('Salary Block');
		$crud->display_as('block_month','Final Month');
		$crud->order_by('block_month','desc');
		$crud->unset_columns('status');
		$crud->unset_delete();
		$crud->unset_add();
		$crud->unset_edit();
		$output = $crud->render();
		$this->load->view('form/pd_salary_process',$output);
		//$this->load->view('form/pd_salary_process');
	}
	
	function production_salary_process()
	{
		//echo "Start Date = ".$start_date = microtime(true);
		$month = $this->input->post('month');
		$year = $this->input->post('year');
		$this->load->model('common_model');
		
		//$month = "08";
		//$year = "2012";
		$result = $this->production_salary_process_model->production_pay_sheet($year, $month);
		if($result == "Process completed successfully")
		{
			// SALARY PROCESS LOG Generate
			//$this->log_model->log_salary_process($year, $month);
			echo $result;
		}
		else
		{
			echo $result;		
		}
		//echo "<br> End Date = ".$end_date = microtime(true);
		//echo "<br> Duration = ".$time = $end_date - $start_date;
	}
}

