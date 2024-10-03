<?php

class Authentication extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
		/* Standard Libraries */
		$this->load->model('processdb');
		$this->load->helper('form');
		
	}
	
	
	function index()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		
		if($this->session->userdata('logged_in')==true)
		{
			if($this->session->userdata('level')==2 || $this->session->userdata('level')==3)
			{
				$url = base_url()."magpie/";
				redirect($url);
			}
			else
			{
				redirect("payroll_con");
			}
		}
		else
		{
			$this->load->view('admin/login'); 
		}
	}
}