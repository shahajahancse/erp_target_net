<?php
class Salary_report_con extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
		/* Standard Libraries */
		$this->load->model('grid_model');
		$this->load->model('leave_model');
		$this->load->model('acl_model');
		$this->load->model('pd_report_model');
		$access_level = 8;
		$acl = $this->acl_model->acl_check($access_level);
	}
	
	function grid_salary_report()
	{
		$this->load->view('grid_salary_report');
	}
	
	function grid_monthly_salary_sheet()
	{
		$sal_year_month = $this->uri->segment(3);
		$grid_status 	= $this->uri->segment(4);		
		$grid_data 		= $this->uri->segment(5);
		$grid_emp_id = explode('xxx', trim($grid_data));
		$this->load->model('common_model');
		//print_r($grid_emp_id);
		$data["deduct_status"]= $this->common_model->get_setup_attributes(1);
						
		$data["value"] = $this->grid_model->grid_monthly_salary_sheet($sal_year_month, $grid_status, $grid_emp_id);
		$data["salary_month"] = $sal_year_month;
		$data["grid_status"]  = $grid_status;
		
		
		
		$this->load->view('salary_sheet',$data);
	}
	
	function grid_actual_monthly_salary_sheet()
	{
		$sal_year_month = $this->uri->segment(3);
		$grid_status 	= $this->uri->segment(4);		
		$grid_data 		= $this->uri->segment(5);
		$grid_emp_id = explode('xxx', trim($grid_data));
		$this->load->model('common_model');
		//print_r($grid_emp_id);
		$data["deduct_status"]= $this->common_model->get_setup_attributes(1);
						
		$data["value"] = $this->grid_model->grid_monthly_salary_sheet($sal_year_month, $grid_status, $grid_emp_id);
		$data["salary_month"] = $sal_year_month;
		$data["grid_status"]  = $grid_status;
		
		$data["start_date"]  	= date("Y-m-21", strtotime($sal_year_month));
		$data["end_date"]  		= date("Y-m-20", strtotime($sal_year_month));
		
		$this->load->view('salary_sheet_actual',$data);
	}
	
	function grid_actual_monthly_salary_sheet_with_eot()
	{
		$sal_year_month = $this->uri->segment(3);
		$grid_status 	= $this->uri->segment(4);		
		$grid_data 		= $this->uri->segment(5);
		$grid_emp_id = explode('xxx', trim($grid_data));
		$this->load->model('common_model');
		//print_r($grid_emp_id);
		$data["deduct_status"]= $this->common_model->get_setup_attributes(1);
						
		$data["value"] = $this->grid_model->grid_monthly_salary_sheet($sal_year_month, $grid_status, $grid_emp_id);
		$data["salary_month"] = $sal_year_month;
		$data["grid_status"]  = $grid_status;
		
		$this->load->view('salary_sheet_actual_with_eot',$data);
	}
	
	function grid_festival_bonus()
	{
		$sal_year_month = $this->uri->segment(3);
		$grid_status 	= $this->uri->segment(4);		
		$grid_data 		= $this->uri->segment(5);
		$grid_emp_id = explode('xxx', trim($grid_data));
		$this->load->model('common_model');
		$data["deduct_status"]= $this->common_model->get_setup_attributes(1);
		$data["value"] = $this->grid_model->grid_festival_bonus($sal_year_month, $grid_status, $grid_emp_id);
		$data["salary_month"] = $sal_year_month;
		$data["grid_status"]  = $grid_status;
		
		$this->load->view('festival_bonus_report',$data);
	}
	
	function grid_advance_salary_sheet()
	{
		$sal_year_month = $this->uri->segment(3);
		$grid_status 	= $this->uri->segment(4);		
		$grid_data 		= $this->uri->segment(5);
		$grid_emp_id = explode('xxx', trim($grid_data));
		$this->load->model('common_model');
		$data["deduct_status"]= $this->common_model->get_setup_attributes(1);
		$data["value"] = $this->grid_model->grid_general_info($grid_emp_id);
		$data["salary_month"] = $sal_year_month;
		$data["grid_status"]  = $grid_status;
		
		$this->load->view('advance_salary_sheet_report_compliance',$data);
	}
	
	function get_deduct_status()
	{
		$this->db->select('deduct_status');
		$this->db->where("id",1);
		$query_ded = $this->db->get('pr_deduct_status');
		$rows_deduct = $query_ded->row();
		$deduct_status = $rows_deduct ->deduct_status;
		return $deduct_status;
	}
	
	function salary_summary()
	{
		$salary_month = $this->uri->segment(3);
		$grid_status = $this->uri->segment(4);
		$data["values"] = $this->grid_model->salary_summary($salary_month,$grid_status);
		$data["salary_month"] = $salary_month; 
		$data["grid_status"] = $grid_status; 
		//print_r($data);
		$this->load->view('salary_summary',$data);
	}
	
	function grid_factory_summary()
	{
		$salary_month = $this->uri->segment(3);
		$grid_status = $this->uri->segment(4);
		
		$salary_month_prev = strtotime ('-1 month' , strtotime ($salary_month)) ;
		$prev_salary_month = date ('Y-m-d' , $salary_month_prev );
		
		$data["values"] = $this->grid_model->grid_factory_summary($salary_month,$grid_status,$prev_salary_month);
		$data["salary_month"] = $salary_month; 
		$data["prev_salary_month"] = $prev_salary_month; 
		$data["grid_status"] = $grid_status; 
		//print_r($data);
		$this->load->view('salary_factory_summary',$data);
	}
	
	function grid_pay_slip()
	{
		$grid_firstdate = $this->uri->segment(3);
		$grid_data = $this->uri->segment(4);
		$grid_emp_id = explode('xxx', trim($grid_data));
		
		$year_month = date("Y-m", strtotime($grid_firstdate)); 
		
		$query['values'] = $this->grid_model->grid_pay_slip($year_month, $grid_emp_id);
		if(is_string($query['values']))
		{
			echo $query['values'];
		}
		else
		{
			$this->load->view('pay_slip',$query);
			//$this->load->view('pay_slip_old',$query);
		}
	}
	function grid_provident_fund()
	{
		$this->load->model('salary_process_model');
		$grid_firstdate = $this->uri->segment(3);
		$grid_data = $this->uri->segment(4);
		$grid_emp_id = explode('xxx', trim($grid_data));
		
		$year_month = date("Y-m", strtotime($grid_firstdate)); 
		$query["salary_month"] = $grid_firstdate;
		$query['values'] = $this->grid_model->grid_provident_fund($year_month, $grid_emp_id);
		if(is_string($query['values']))
		{
			echo $query['values'];
		}
		else
		{
			$this->load->view('provident_fund',$query);
		}
	}
	
	// function grid_maternity_benefit()
	// {
	// 	$grid_data = $this->uri->segment(3);
	// 	$grid_emp_id = explode('xxx', trim($grid_data));
						
	// 	$data["values"] = $this->leave_model->grid_maternity_benefit($grid_emp_id);
			
	// 	$this->load->view('maternity_benefit',$data);
	// }




	function grid_maternity_benefit(){
		// $firstdate = date('Y-m-d', strtotime($this->input->post('firstdate')));
		// $seconddate = date('Y-m-d', strtotime($this->input->post('seconddate')));
		$grid_data = $this->uri->segment(3);
		$emp_ids = explode('xxx', trim($grid_data));
		// $emp_ids = ;
		$data["values"] = $this->grid_maternity_benefit_m($emp_ids);
		$this->load->view('grid_maternity_benefit',$data);
	}

	function grid_maternity_benefit_m($emp_ids){
		$this->db->select('
					com.emp_join_date, 
					per.emp_full_name as name_bn,
					per.bangla_nam,
					meh.*,
					pr_designation.desig_bangla,
					pr_line_num.line_name as line_name_bn,
					pr_section.sec_name as sec_name_bn,
					pr_grade.gr_name'
				);
		$this->db->from('pr_maternity_entry_histry as meh');
		$this->db->from('pr_emp_com_info as com');
		$this->db->from('pr_emp_per_info as per');
		$this->db->from('pr_section');
		$this->db->from('pr_line_num');
		$this->db->from('pr_designation');
		$this->db->from('pr_grade');
		$this->db->where("meh.emp_id = com.emp_id");
		$this->db->where("com.emp_id = per.emp_id");
		$this->db->where("com.emp_sec_id = pr_section.sec_id");	
		$this->db->where("com.emp_line_id = pr_line_num.line_id");	
		$this->db->where("com.emp_desi_id = pr_designation.desig_id");	
		$this->db->where("com.emp_sal_gra_id = pr_grade.gr_id");
		// $this->db->where('per.gender', 'Female');
		$this->db->where_in("meh.emp_id", $emp_ids);
		$query = $this->db->get()->result();
		return $query;
	}
	
	function grid_earn_leave()
	{
		$sal_year_month = $this->uri->segment(3);
		$grid_status 	= $this->uri->segment(4);		
		$grid_data 		= $this->uri->segment(5);
		$grid_emp_id = explode('xxx', trim($grid_data));
		$this->load->model('common_model');
		//print_r($grid_emp_id);
		$data["deduct_status"]= $this->common_model->get_setup_attributes(1);
						
		$data["value"] = $this->grid_model->grid_earn_leave($sal_year_month, $grid_status, $grid_emp_id);
		$data["salary_month"] = $sal_year_month;
		$data["grid_status"]  = $grid_status;
		
		//$this->load->view('salary_sheet_actual_with_eot',$data);
	}	
	
}

