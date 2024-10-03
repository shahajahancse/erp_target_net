<?php
class Attn_process_con extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
		/* Standard Libraries */
		$this->load->model('attn_process_model');
		$this->load->model('file_process_model');
		$this->load->model('log_model');
		set_time_limit(0);
		ini_set("memory_limit","512M");
		$this->load->model('acl_model');
		$access_level = 4;
		$acl = $this->acl_model->acl_check($access_level);
	}
	//-------------------------------------------------------------------------------------------------------
	// Form display for Attendance Process
	//-------------------------------------------------------------------------------------------------------
	function attn_process_form()
	{
		if($this->session->userdata('logged_in')==FALSE)
		$this->load->view('login_message');
		else
		$this->load->view('form/attn_process');
	}
	
	function attn_process()
	{
		$date 			= $this->input->post('p_start_date');
		$process_date 	= date("Y-m-d", strtotime($date));
		
		
		$this->db->trans_start();
		//for($i=25; $i<=31;$i++){
			ini_set('memory_limit', '-1M');
			set_time_limit(0);
			//$input_date = date("Y-m-d", mktime(0, 0, 0, 8, $i, 2012));
			$data = $this->attn_process_model->attn_process($process_date);
		//}
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
				// ATTENDANCE PROCESS LOG Generate
				$this->log_model->log_attn_process($process_date);
				echo "Process completed sucessfully";
			}
			else
			{
				echo $data;
			}
		}
	}

	function fetch_data(){
		$date 			= $this->input->post('p_start_date');
		$process_date 	= date("Y-m-d", strtotime($date));
		ini_set('memory_limit', '-1M');
		set_time_limit(0);
		$emp_ids = $this->db->select('emp_id,proxi_id')->get('pr_emp_com_info')->result();
		$ids = array();
		foreach($emp_ids as $id){
			$ids[] = $id->proxi_id;
		}
		$this->file_process_model->file_process_for_attendance($process_date,$ids);
		// $data = $this->attn_process_model->attn_process($process_date);
	}
	
	function earn_leave_process($input_date)
	{
		$data = $this->attn_process_model->earn_leave_process($input_date);
	}
	
	function deduction_hour_process($date)
	{
		$data = $this->attn_process_model->deduction_hour_process($date);
	}
	
	function test()
	{
		$date1 = '2012-08-20';
		$date2 = date('Y-m-d');
		echo $days = $this->attn_process_model->get_date_to_date_day_differance($date1,$date2);	
	}
	
}

