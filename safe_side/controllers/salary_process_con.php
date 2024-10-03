<?php
class Salary_process_con extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
		/* Standard Libraries */
		$this->load->model('salary_process_model');
		$this->load->model('log_model');
		set_time_limit(0);
		ini_set("memory_limit","512M");
		$this->load->model('acl_model');
		$this->load->library('grocery_CRUD');
		$access_level = 7;
		$acl = $this->acl_model->acl_check($access_level);
	}
	
	function salary_process_form()
	{
		
		
		if($this->session->userdata('logged_in')==FALSE)
		$this->load->view('login_message');
		else
		$crud = new grocery_CRUD();

		$crud->set_table('pr_salary_block_fixed');
		$crud->set_subject('Salary Block');
		$crud->display_as('block_month','Final Month');
		$crud->order_by('block_month','desc');
		$crud->unset_columns('status');
		$crud->unset_delete();
		$crud->unset_add();
		$crud->unset_edit();
		$output = $crud->render();
		$this->load->view('form/salary_process',$output);
	}
	
	function salary_process()
	{
		//echo "Start Date = ".$start_date = microtime(true);
		$month = $this->input->post('month');
		$year = $this->input->post('year');
		$process_check = $this->input->post('process_check');
		$this->load->model('common_model');
		
		//$month = "08";
		//$year = "2012";
		$result = $this->salary_process_model->pay_sheet($year, $month, $process_check);
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
	
	function test()
	{
		$service_month = 1;
		$gross_sal = 10000;
		$basic_sal = 7000;
		for($i=0; $i<=25; $i++){
		 $result = $this->salary_process_model->get_festival_bonus_rule($i);
		 echo "$i -> ";
		 print_r($result);
		 echo "== BONUS : ".$bonus = $this->salary_process_model->get_festival_bonus($result,$gross_sal,$basic_sal);
		 echo '<br>';
		 }
	}
	
}

