<?php
class Entry_system_con extends CI_Controller {

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
		$access_level = 3;
		$acl = $this->acl_model->acl_check($access_level);
	}
	//-------------------------------------------------------------------------------------------------------
	// GRID Display for Entry System
	//-------------------------------------------------------------------------------------------------------
	function grid_entry_system()
	{
		if($this->session->userdata('level')== 0 || $this->session->userdata('level')== 1)
		{
			$this->load->view('grid_entry_system');
		}
		elseif($this->session->userdata('level')==2)
		{
			$this->load->view('grid_entry_system_for_user');
		}
	}
	//-------------------------------------------------------------------------------------------------------
	// Form Display for Advance Loan
	//-------------------------------------------------------------------------------------------------------
	function advance_loan()
	{
		if($this->session->userdata('logged_in')==FALSE)
		$this->load->view('login_message');
		else
		$this->load->view('form/advance_loan');
	}
	//-------------------------------------------------------------------------------------------------------
	// Advance Loan entry to the Database
	//-------------------------------------------------------------------------------------------------------
	function advance_loan_insert()
	{
		$emp_id 	= $this->input->post('emp_id');
		$loan_amt	= $this->input->post('loan_amt');
		$pay_amt	= $this->input->post('pay_amt');
		$loan_date 	= $this->input->post('loan_date');
		
		$loan_date = date("Y-m-d", strtotime($loan_date)); 
		
		$data = $this->processdb->advance_loan_insert($emp_id, $loan_amt, $pay_amt, $loan_date);
		echo $data;
	}
	//-------------------------------------------------------------------------------------------------------
	// Form Display for Leave Transaction
	//-------------------------------------------------------------------------------------------------------
	function leave_transation()
	{
		//$this->load->view('form/leave_transation');
		$this->load->view('form/leave_view');
	}
	//-------------------------------------------------------------------------------------------------------
	// Leave entry to the Database
	//-------------------------------------------------------------------------------------------------------
	function save_leave_co()
	{
		$result = $this->leave_model->save_leave_db();
		echo $result;
	}
	//-------------------------------------------------------------------------------------------------------
	// Leave search from the Database
	//-------------------------------------------------------------------------------------------------------
	function leave_transaction_co()
	{
	$result = $this->leave_model->leave_transaction_db();
	echo $result;
	}
	//-------------------------------------------------------------------------------------------------------
	// Manual Attendance Entry
	//-------------------------------------------------------------------------------------------------------
	function manual_attendance_entry()
	{
		$grid_firstdate = $this->input->post('firstdate');
		$grid_seconddate = $this->input->post('seconddate');
		
		$manual_time = $this->input->post('manual_time');
		
		$grid_data = $this->input->post('spl');
		$grid_emp_id = explode('xxx', trim($grid_data));
		
		$grid_firstdate  = date("Y-m-d", strtotime($grid_firstdate)); 
		$grid_seconddate = date("Y-m-d", strtotime($grid_seconddate)); 
				
		$data = $this->grid_model->manual_attendance_entry($grid_firstdate, $grid_seconddate, $manual_time, $grid_emp_id);
		echo $data;
	}
	//-------------------------------------------------------------------------------------------------------
	// Attendance Delete manually (Present to Absent)
	//-------------------------------------------------------------------------------------------------------
	function manual_entry_Delete()
	{
		$grid_firstdate = $this->input->post('firstdate');
		$grid_seconddate = $this->input->post('seconddate');
		
		$grid_data = $this->input->post('spl');
		$grid_emp_id = explode('xxx', trim($grid_data));
		//print_r($grid_emp_id);
		$grid_firstdate  = date("Y-m-d", strtotime($grid_firstdate)); 
		$grid_seconddate  = date("Y-m-d", strtotime($grid_seconddate)); 
		
		$data = $this->grid_model->manual_entry_Delete($grid_firstdate, $grid_seconddate, $grid_emp_id);
		echo $data;
	}
	//-------------------------------------------------------------------------------------------------------
	// Workoff Entry
	//-------------------------------------------------------------------------------------------------------
	function save_work_off()
	{
		$grid_firstdate = $this->input->post('firstdate');
				
		$grid_data = $this->input->post('spl');
		$grid_emp_id = explode('xxx', trim($grid_data));
		//print_r($grid_emp_id);
		$grid_firstdate  = date("Y-m-d", strtotime($grid_firstdate)); 
				
		$data = $this->grid_model->save_work_off($grid_firstdate, $grid_emp_id);
		echo $data;
	}
	//-------------------------------------------------------------------------------------------------------
	// Holiday Entry
	//-------------------------------------------------------------------------------------------------------
	function save_holiday()
	{
		$grid_firstdate = $this->input->post('firstdate');
		$holiday_description = $this->input->post('holiday_description');
		
		$grid_firstdate  = date("Y-m-d", strtotime($grid_firstdate));
				
		$data = $this->grid_model->save_holiday($grid_firstdate, $holiday_description);
		echo $data;
	}
	//-------------------------------------------------------------------------------------------------------
	// Resign Entry
	//-------------------------------------------------------------------------------------------------------
	function resign_entry()
	{
		$crud = new grocery_CRUD();

		$crud->set_table('pr_emp_resign_history');
		$crud->set_subject('Resign Employee');
		$crud->display_as( 'emp_id' , 'Employee ID' );
		$crud->set_rules('emp_id','Employee ID','required|is_unique[pr_emp_resign_history.emp_id]|callback_username_check');
		$crud->set_rules('resign_date','Resign Date','required');
		$crud->callback_after_insert(array($this,'insert_resign_in_emp_table'));
		$crud->callback_before_delete(array($this,'insert_join_in_emp_table_for_resign'));
		//$crud->unset_delete();
		$crud->unset_edit();
		
		$output = $crud->render();
		
		$this->crud_output($output);
	}
	//-------------------------------------------------------------------------------------------------------
	// Insert employee status regular to pr_emp_com_info table
	//-------------------------------------------------------------------------------------------------------
	function insert_join_in_emp_table_for_resign($primary_key)
	{
		$this->db->select('emp_id');
		$this->db->where('resign_id',$primary_key);
    	$query = $this->db->get('pr_emp_resign_history');
		$rows = $query->row();
		$emp_id = $rows->emp_id;
		$data = array('emp_cat_id' => 1);
		$this->db->where('emp_id', $emp_id);
		$this->db->update('pr_emp_com_info', $data);
		// Log generate for left employee
		$this->log_model->log_profile_resign($emp_id);
		return true;
	}
	//-------------------------------------------------------------------------------------------------------
	// Employee ID exist or not
	//-------------------------------------------------------------------------------------------------------
	function username_check($emp_id)
	{
		$check_emp = $this->get_emp_id_existance($emp_id);
		if ($check_emp == false)
		{
			$this->form_validation->set_message('username_check', "%s $emp_id does't not exist!");
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	//-------------------------------------------------------------------------------------------------------
	// Employee ID exist or not
	//-------------------------------------------------------------------------------------------------------
	function get_emp_id_existance($emp_id)
	{
		$this->db->select("emp_id");
		$this->db->where("emp_id", $emp_id);
		$query = $this->db->get("pr_emp_com_info");
		if($query->num_rows() > 0 )
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	//-------------------------------------------------------------------------------------------------------
	// Insert employee status resign to pr_emp_com_info table
	//-------------------------------------------------------------------------------------------------------
	function insert_resign_in_emp_table($post_array)
	{
		$emp_id = $post_array['emp_id'];
		$data = array('emp_cat_id' => 4);
		$this->db->where('emp_id', $emp_id);
		$this->db->update('pr_emp_com_info', $data);
		// Log generate for resign employee
		$this->log_model->log_profile_resign($emp_id);
		return $post_array;
	}
	//-------------------------------------------------------------------------------------------------------
	// CRUD output method
	//-------------------------------------------------------------------------------------------------------
	function crud_output($output = null)
	{
		$this->load->view('output.php',$output);	
	}
	
	function earn_leave_entry()
	{
		$crud = new grocery_CRUD();

		$crud->set_table('pr_leave_earn');
		$crud->set_subject('Earn Leave');
		$crud->required_fields('old_earn_balance','current_earn_balance','last_update');
		//$crud->fields('emp_id','old_earn_balance','last_update');
		$crud->display_as('emp_id' , 'Employee ID' );
        
		$state = $this->grocery_crud->getState();
		if($state == 'edit')
    	{
        	$crud->change_field_type('emp_id','readonly');
    	}
		if($state == 'insert_validation')
    	{
        	$crud->set_rules('emp_id','Employee ID','required|callback_emp_id_check');
			//$crud->set_rules('last_update','Last Update','required|callback_last_update_check');
    	}
		$crud->unset_delete();
		//$crud->unset_edit();
		$output = $crud->render();
		$this->crud_output($output);
	}
	
	
	function last_update_check($str)
	{
		$date = $this->input->post('last_update');
		$start_date = strtotime($date);
		$last_up = date("Y-m-d",$start_date);
		
		echo "<SCRIPT LANGUAGE=\"JavaScript\">alert($last_up);</SCRIPT>";
	}
	
	function emp_id_check($str)
	{
		$id = $this->uri->segment(4);
		if(!empty($id) && is_numeric($id))
		{
			$emp_id_old = $this->db->where("id",$id)->get('pr_leave_earn')->row()->emp_id;
			$this->db->where("emp_id !=",$emp_id_old);
		}
		$num_row = $this->db->where('emp_id',$str)->get('pr_leave_earn')->num_rows();
		if ($num_row >= 1)
		{
			$this->form_validation->set_message('emp_id_check', "Employee ID field '$str' already exists");
			return FALSE;
		}
		else
		{
		
			$num_row1 = $this->db->where('emp_id',$str)->get('pr_emp_com_info')->num_rows();
			if ($num_row1 < 1)
			{
				$this->form_validation->set_message('emp_id_check', "Invalid Employee ID");
				return FALSE;
			}
			else
			{
				return TRUE;
			}
		}
	}
	
	
	//-------------------------------------------------------------------------------------------------------
	// Left Entry
	//-------------------------------------------------------------------------------------------------------
	function left_entry()
	{
		$crud = new grocery_CRUD();

		$crud->set_table('pr_emp_left_history');
		$crud->set_subject('Left Employee');
		$crud->required_fields('emp_id','left_date');
		$crud->display_as( 'emp_id' , 'Employee ID' );
		$crud->set_rules('emp_id','Employee ID','required|is_unique[pr_emp_left_history.emp_id]|callback_username_check');
		$crud->set_rules('left_date','Left Date','required');
		$crud->callback_after_insert(array($this,'insert_left_in_emp_table'));
		//$crud->unset_delete();
		$crud->unset_edit();
		$crud->callback_before_delete(array($this,'insert_join_in_emp_table'));
		$output = $crud->render();
		$this->crud_output($output);
	}
	
	//-------------------------------------------------------------------------------------------------------
	// Insert employee status left to pr_emp_com_info table
	//-------------------------------------------------------------------------------------------------------
	function insert_left_in_emp_table($post_array)
	{
		$emp_id = $post_array['emp_id'];
		$data = array('emp_cat_id' => 3);
		$this->db->where('emp_id', $emp_id);
		$this->db->update('pr_emp_com_info', $data);
		// Log generate for left employee
		$this->log_model->log_profile_resign($emp_id);
		return $post_array;
	}
	
	//-------------------------------------------------------------------------------------------------------
	// Insert employee status regular to pr_emp_com_info table
	//-------------------------------------------------------------------------------------------------------
	function insert_join_in_emp_table($primary_key)
	{
		$this->db->select('emp_id');
		$this->db->where('left_id',$primary_key);
    	$query = $this->db->get('pr_emp_left_history');
		$rows = $query->row();
		$emp_id = $rows->emp_id;
		$data = array('emp_cat_id' => 1);
		$this->db->where('emp_id', $emp_id);
		$this->db->update('pr_emp_com_info', $data);
		// Log generate for left employee
		$this->log_model->log_profile_resign($emp_id);
		return true;
	}
	
	//-------------------------------------------------------------------------------------------------------
	// New to regular :Tofayel
	//-------------------------------------------------------------------------------------------------------
	function new_to_regular()
	{
		$this->load->view('form/new_to_rg');	
	}
	
	function new_to_regular_process()
	{
		$month = $this->input->post('report_month_sal');
		$year = $this->input->post('report_year_sal');
		$this->load->model('log_model');
		$result = $this->processdb->new_to_regular_process($year, $month);
		if ($result == "Successfully Converted")
		{
			echo "<SCRIPT LANGUAGE=\"JavaScript\">alert('Successfully Converted');</SCRIPT>";
			//echo "This ISBN already exist"; 
		}
		else if ($result =="no data found")
		{
			echo "<SCRIPT LANGUAGE=\"JavaScript\">alert('No data found');</SCRIPT>";
			//echo "This ISBN already exist"; 
		}
		
		
		$this->log_model->log_new_to_regular($year, $month);
		$this->new_to_regular();
	}
	
	

}

