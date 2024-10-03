<?php
class Entry_con extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
		/* Standard Libraries */
		$this->load->model('processdb');
		$this->load->model('grid_model');
		$this->load->model('leave_model');
		$this->load->model('log_model');
		$this->load->library('grocery_CRUD');
		$this->load->model('acl_model');
		$this->load->model('entry_model');
		$access_level = 3;
		$acl = $this->acl_model->acl_check($access_level);
	}
	
	function _example_output($output = null)
	{	
		//$data['output'] = $output;
		$this->load->view('output',$output);
	}
	function entry_process_name_info()
	{
		$crud = new grocery_CRUD();
		$crud->set_table('pd_process_setups')
			 ->set_subject('Process Setup')
			 ->display_as('section_id','Section ID')
			 ->display_as('process_name','Process Name')
			 //->display_as('emp_id','Employee ID')
			 ->display_as('process_price','Process Price');
		
		//$crud->change_field_type('password', 'password');
		$crud->set_relation('section_id','pr_section','sec_name');
		//$crud->callback_before_insert(array($this,'encrypt_password_callback'));
			 
		$crud->required_fields('section_id','process_name');
		
		$output = $crud->render();
		$this->_example_output($output);
		
	}
	function data_entry()
	{
		$this->load->view('pd/data_entry');
	}
	function add_production_log()
	{	
		$this->entry_model->add_production_log();
		$this->load->view('pd/data_entry');	
	}
	function search_article_id()
	{
		  $q = strtolower($_GET['term']);
		  $result = $this->entry_model->search_article_id($q);
		  echo $result;
	}
	function search_section_id()
	{
		  $q = strtolower($_GET['term']);
		  $result = $this->entry_model->search_section_id($q);
		  echo $result;
	}
	function GetProcessEmp()
	{
		    $array = $this->uri->uri_to_assoc(3);
			$id = $array['id'];
			$result = $this->entry_model->GetProcessEmp($this->input->post($id));
			echo $result;
	}
	function GetImage()
	{
		    $array = $this->uri->uri_to_assoc(3);
			$id = $array['id'];
			$result = $this->entry_model->GetImage($this->input->post($id));
			echo $result;
	}
	
	
}