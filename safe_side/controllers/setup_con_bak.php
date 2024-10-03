<?php
class Setup_con extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
		/* Standard Libraries */
		$this->load->library('grocery_CRUD');
		$this->load->model('acl_model');
		$access_level = 2;
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
	// CRUD for Department
	//-------------------------------------------------------------------------------------------------------
	function department()
	{
		$crud = new grocery_CRUD();

		$crud->set_table('pr_dept');
		$crud->set_subject('Department');
		$crud->display_as( 'dept_name' , 'Department Name' );
		$crud->required_fields( 'dept_name');
		$crud->unset_delete();
		
		$output = $crud->render();
		
		$this->crud_output($output);
	}
	//-------------------------------------------------------------------------------------------------------
	// CRUD for Section
	//-------------------------------------------------------------------------------------------------------
	function section()
	{
		$crud = new grocery_CRUD();

		$crud->set_table('pr_section');
		$crud->set_subject('Section');
		$crud->display_as( 'sec_name' , 'Section Name English' )->display_as( 'sec_bangla' , 'Section Name Bangla' );
		$crud->required_fields( 'sec_name' , 'sec_bangla' );
		$crud->unset_delete();
		
		$output = $crud->render();
		
		$this->crud_output($output);
	}	
	//-------------------------------------------------------------------------------------------------------
	// CRUD for Line
	//-------------------------------------------------------------------------------------------------------
	function line()
	{
		$crud = new grocery_CRUD();

		$crud->set_table('pr_line_num');
		$crud->set_subject('Line');
		$crud->display_as( 'line_name' , 'Line Name' );
		$crud->required_fields( 'line_name');
		$crud->unset_delete();
		
		$output = $crud->render();
		
		$this->crud_output($output);
	}
	//-------------------------------------------------------------------------------------------------------
	// CRUD for Designation
	//-------------------------------------------------------------------------------------------------------
	function designation()
	{
		$crud = new grocery_CRUD();

		$crud->set_table('pr_designation');
		$crud->set_subject('Designation');
		$crud->display_as( 'desig_name' , 'Designation Name English' )->display_as( 'desig_bangla' , 'Designation Name Bangla' );
		$crud->required_fields( 'desig_name' , 'desig_bangla' );
		$crud->unset_delete();
		
		$output = $crud->render();
		
		$this->crud_output($output);
	}
	//-------------------------------------------------------------------------------------------------------
	// CRUD for Position
	//-------------------------------------------------------------------------------------------------------
	function position()
	{
		$crud = new grocery_CRUD();

		$crud->set_table('pr_emp_position');
		$crud->set_subject('Position');
		$crud->display_as( 'posi_name' , 'Position Name' );
		$crud->required_fields( 'posi_name');
		$crud->unset_delete();
		
		$output = $crud->render();
		
		$this->crud_output($output);
	}
	//-------------------------------------------------------------------------------------------------------
	// CRUD for Operation
	//-------------------------------------------------------------------------------------------------------
	function operation()
	{
		$crud = new grocery_CRUD();

		$crud->set_table('pr_emp_operation');
		$crud->set_subject('Operation');
		$crud->display_as( 'ope_name' , 'Operation Name' );
		$crud->required_fields( 'ope_name');
		$crud->unset_delete();
		
		$output = $crud->render();
		
		$this->crud_output($output);
	}	
	//-------------------------------------------------------------------------------------------------------
	// CRUD for Attendance Bonus
	//-------------------------------------------------------------------------------------------------------
	function attendance_bonus()
	{
		$crud = new grocery_CRUD();

		$crud->set_table('pr_attn_bonus');
		$crud->set_subject('Attendance Bonus');
		$crud->display_as( 'ab_rule_name' , 'Rule Name' )->display_as( 'ab_rule' , 'Amount' );
		$crud->required_fields( 'ab_rule_name' , 'ab_rule' );
		$crud->unset_delete();
		
		$output = $crud->render();
		
		$this->crud_output($output);
	}	
	//-------------------------------------------------------------------------------------------------------
	// CRUD for Salary Grade
	//-------------------------------------------------------------------------------------------------------
	function salary_grade()
	{
		$crud = new grocery_CRUD();

		$crud->set_table('pr_grade');
		$crud->set_subject('Salary Grade');
		$crud->display_as( 'gr_name' , 'Grade Name' );
		$crud->columns( 'gr_name' );
		$crud->fields( 'gr_name' );
		$crud->required_fields( 'gr_name');
		$crud->unset_delete();
		
		$output = $crud->render();
		
		$this->crud_output($output);
	}
	//-------------------------------------------------------------------------------------------------------
	// CRUD for Shift Schedules
	//-------------------------------------------------------------------------------------------------------
	function shift_schedule()
	{
		$crud = new grocery_CRUD();

		$crud->set_table('pr_emp_shift_schedule');
		$crud->set_subject('Shift Schedule');
		$crud->display_as('sh_type','Shift Type')
			 ->display_as('in_start','IN Start')
			 ->display_as('in_time','IN Time')
			 ->display_as('late_start','Late Start')
			 ->display_as('in_end','IN End')
			 ->display_as('out_start','OUT Start')
			 ->display_as('out_end','OUT End')
			 ->display_as('ot_start','OT Start')
			 ->display_as('ot_minute_to_one_hour','OT Minute')
			 ->display_as('one_hour_ot_out_time','One Hour OT Time')
			 ->display_as('two_hour_ot_out_time','Two Hour OT Time');
		
		$crud->required_fields( 'sh_type', 'in_start', 'in_time', 'late_start', 'in_end', 'out_start', 'out_end', 'ot_start', 'ot_minute_to_one_hour', 'one_hour_ot_out_time', 'two_hour_ot_out_time');
		$crud->unset_delete();
		
		$output = $crud->render();
		
		$this->crud_output($output);
	}	
	//-------------------------------------------------------------------------------------------------------
	// CRUD for Shift Management
	//-------------------------------------------------------------------------------------------------------
	function shift_management()
	{
		$crud = new grocery_CRUD();

		$crud->set_table('pr_emp_shift');
		$crud->set_subject('Shift Management');
		$crud->set_relation('shift_duty','pr_emp_shift_schedule','sh_type');
		$crud->display_as( 'shift_name' , 'Shift Name' )->display_as( 'shift_duty' , 'Shift Type' );
		
		$crud->required_fields( 'shift_name','shift_duty');
		$crud->unset_delete();
		
		$output = $crud->render();
		
		$this->crud_output($output);
	}
	//-------------------------------------------------------------------------------------------------------
	// CRUD for Leave Setup
	//-------------------------------------------------------------------------------------------------------
	function leave_setup()
	{
		$crud = new grocery_CRUD();

		$crud->set_table('pr_leave');
		$crud->set_subject('Leave');
		$crud->display_as( 'lv_al' , 'Casual Leave' )->display_as( 'lv_sl' , 'Sick Leave' )->display_as( 'lv_pl' , 'Paternity Leave' )->display_as( 'lv_ml' , 'Maternity Leave' );
		$crud->unset_fields('lv_cl','lv_id','lv_wp');
		$crud->unset_columns('lv_cl','lv_id','lv_wp');
		
		$crud->unset_delete();
		$crud->unset_add();
		
		$output = $crud->render();
		
		$this->crud_output($output);
	}
	
	//-------------------------------------------------------------------------------------------------------
	// CRUD for Deduction Setup
	//-------------------------------------------------------------------------------------------------------
	function attributes_setup()
	{
		$crud = new grocery_CRUD();

		$crud->set_table('pr_setup');
		$crud->set_subject('Attributes');
		$crud->unset_delete();
		$crud->unset_add();
		$crud->change_field_type('attributes','readonly');
		$output = $crud->render();
		$this->crud_output($output);
	}
	
	//-------------------------------------------------------------------------------------------------------
	// CRUD for Allowance Setup
	//-------------------------------------------------------------------------------------------------------
	function allowance_setup()
	{
		$crud = new grocery_CRUD();

		$crud->set_table('pr_allowance_bills');
		$crud->set_subject('Allowance Rules');
		$crud->required_fields('first_tiffin_allo_min','second_tiffin_allo_min','night_allo_min','tiffin_allo_amount','night_allo_amount');
		$crud->display_as( 'first_tiffin_allo_min' , 'Min. for 1st Tiffin' )
				->display_as( 'second_tiffin_allo_min' , 'Min. for 2nd Tiffin' )
				->display_as( 'night_allo_min' , 'Min. for Night Allowance' )
				->display_as( 'tiffin_allo_amount' , 'Tiffin Bill' )
				->display_as( 'night_allo_amount' , 'Night Bill' );;
		$crud->unset_delete();
		$crud->unset_add();
		$crud->change_field_type('emp_category','readonly');
		$output = $crud->render();
		$this->crud_output($output);
	}
	//-------------------------------------------------------------------------------------------------------
	// CRUD for Festival Bonus Setup
	//-------------------------------------------------------------------------------------------------------
	function bonus_setup()
	{
		$crud = new grocery_CRUD();

		$crud->set_table('pr_bonus_rules');
		$crud->set_subject('Bonus Rules');
		$crud->required_fields( 'bonus_first_month','bonus_second_month','bonus_amount','bonus_amount_fraction','bonus_percent','effective_date');
		$crud->display_as( ' bonus_amount_fraction' , 'Bonus Fraction' );
		$crud->unset_delete();
		//$crud->unset_add();
		$crud->change_field_type('attributes','readonly');
		$output = $crud->render();
		$this->crud_output($output);
	}
	
	//-------------------------------------------------------------------------------------------------------
	// CRUD for Providend Fund Setup
	//-------------------------------------------------------------------------------------------------------
	function pf_setup()
	{
		$crud = new grocery_CRUD();

		$crud->set_table('pr_provident_fund_rules');
		$crud->set_subject('Provident Fund Rules');
		$crud->required_fields( 'pf_start_month','pf_end_month','pf_percentage','pf_deduct_percentage','salay_type');
		//$crud->display_as( 'bonus_amount_fraction' , 'Bonus Fraction' );
		$crud->unset_delete();
		//$crud->unset_add();
		//$crud->change_field_type('attributes','readonly');
		$output = $crud->render();
		$this->crud_output($output);
	}
}?>