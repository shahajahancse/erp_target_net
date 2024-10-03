<?php
class Emp_wise_entry_con extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
		/* Standard Libraries */
		$this->load->model('acl_model');
		$this->load->model('emp_wise_entry_model');
		$access_level = 3;
		$acl = $this->acl_model->acl_check($access_level);
	}
	function emp_wise_data_entry()
	{
		$this->load->view('pd/emp_wise_data_entry');
	}
	function add_production_log()
	{	
		$this->emp_wise_entry_model->add_production_log();
		//$this->load->view('pd/emp_wise_data_entry');	
	}
	function search_article_id()
	{
		  $q = strtolower($_GET['term']);
		  $result = $this->emp_wise_entry_model->search_article_id($q);
		  echo $result;
	}
	function search_section_id()
	{
		  $q = strtolower($_GET['term']);
		  $result = $this->emp_wise_entry_model->search_section_id($q);
		  echo $result;
	}
	function GetProcessEmp()
	{
		    $array = $this->uri->uri_to_assoc(3);
			$id = $array['id'];
			$result = $this->emp_wise_entry_model->GetProcessEmp($this->input->post($id));
			echo $result;
	}
	function GetImage()
	{
		    $array = $this->uri->uri_to_assoc(3);
			$id = $array['id'];
			$result = $this->emp_wise_entry_model->GetImage($this->input->post($id));
			echo $result;
	}
	function GridGen()
	{
		    $array = $this->uri->uri_to_assoc(3);
			$id = $array['id'];
			$result = $this->emp_wise_entry_model->GridGen($this->input->post($id));
			echo $result;
	}
	
}