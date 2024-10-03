<?php
class Acl_con extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
		/* Standard Libraries */
		$this->load->library('grocery_CRUD');
		$this->load->model('acl_model');
		$access_level = 11;
		$acl = $this->acl_model->acl_check($access_level);
	}
	//-------------------------------------------------------------------------------------------------------
	// CRUD output method
	//-------------------------------------------------------------------------------------------------------
	function crud_output($output = null)
	{
		$this->load->view('output.php',$output);	
	}
	//-------------------------------------------------------------------------------------------------------
	// Access Control List
	//-------------------------------------------------------------------------------------------------------
	function acl()
	{
		$crud = new grocery_CRUD();
	 
		$crud->set_table('members');
		$crud->set_subject('User');
		$crud->set_relation_n_n('ACL', 'member_acl_level', 'member_acl_list', 'username_id', 'acl_id', 'acl_name','priority');
	 	$crud->unset_columns('level');
		$crud->unset_fields('level');
		$crud->display_as('id_number','Username');
		$crud->required_fields('id_number','password');
		$crud->set_rules('id_number', 'Username', 'required');
		$crud->change_field_type('password','password');
		$crud->where('id_number !=','kamrul');
		$output = $crud->render();
	 
		$this->crud_output($output);
	}
	
	function acl_list()
	{
		$crud = new grocery_CRUD();

		$crud->set_table('member_acl_list');
		
		$output = $crud->render();
		
		$this->crud_output($output);
	}	
	
}

