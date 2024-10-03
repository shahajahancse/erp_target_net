<?php
class Emp_increment_con extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
		/* Standard Libraries */
		$this->load->model('processdb');
		$this->load->model('inc_prom_pun_model');
		$this->load->model('acl_model');
		//$access_level = 1;
		//$acl = $this->acl_model->acl_check($access_level);
	}
	
	function check_id()
	{
		$result = $this->processdb->check_id_db();
		echo $result;
	}	
	
	function increment_info()
	{
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('empid', 'Employee ID', 'trim|required');
		$this->form_validation->set_rules('empstat', 'Employee Status', 'trim');
		$this->form_validation->set_rules('text8', 'Gross Salary', 'trim');
		$this->form_validation->set_rules('empid', 'Employee ID', 'trim|callback_emp_id_existance_check');
			
		if($this->input->post('pi_edit') != '')
		{
			$this->form_validation->set_rules('empstat', 'Employee Status', 'trim|callback_emp_status_check_for_add');
			$this->form_validation->set_rules('entdate', 'Effective Date', 'trim|required|callback_effective_date_check_for_add');
			$this->form_validation->set_rules('text8', 'Gross Salary', 'trim|required|callback_gross_salary_check_for_add');
		}
		else
		{
			$this->form_validation->set_rules('idcard', 'Punch Card No.', 'trim');
		}
		
		$this->form_validation->set_error_delimiters("","");
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('form/incre_info');
		}
		else
		{
			if($this->input->post('pi_save') != '')
			{
				$result = $this->per_info1();
			}
			elseif($this->input->post('pi_edit') != '')
			{
				$result = $this->increment_entry();
				if($result == "true")
				{
					echo "<SCRIPT LANGUAGE=\"JavaScript\">alert('Updated successfully'); window.location='increment_info';</SCRIPT>";
				}
				else if($result == false)
				{
					echo "<SCRIPT LANGUAGE=\"JavaScript\">alert('Invalid Entry Date'); window.location='increment_info';</SCRIPT>";
				}
			}
		}
	}
	
	
	function effective_date_check_for_add($entdate)
	{
		$empid 				= $this->input->post('empid');
		$check = $this->inc_prom_pun_model->get_old_entry_date($empid, $entdate);
		if ($check == false)
		{
			$this->form_validation->set_message('effective_date_check_for_add', 'Sorry!This Employee Already get Increment or Promotion On This Month.');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	
	function emp_status_check_for_add($empsts)
	{
		//echo $empsts;
		if ($empsts == "6")
		{
			$this->form_validation->set_message('emp_status_check_for_add', 'Sorry!This Employee ID Already Promoted.');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	
	function gross_salary_check_for_add($gross_salary)
	{
		$empid 				= $this->input->post('empid');
		$check = $this->inc_prom_pun_model->get_gross_salary_check_incre($empid, $gross_salary);
		if ($check == false)
		{
			$this->form_validation->set_message('gross_salary_check_for_add', 'Failed! New Gross salary Always Greater Than Old Gross Salary.');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	
	function gross_salary_check_for_promotion($gross_salary)
	{
		$empid 				= $this->input->post('empid');
		$check = $this->inc_prom_pun_model->get_gross_salary_check_prom($empid, $gross_salary);
		if ($check == false)
		{
			$this->form_validation->set_message('gross_salary_check_for_promotion', 'Failed! New Gross salary Always Greater Than or Equal To Old Gross Salary.');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	
	
	function any_change_check_for_promotion($dept)
	{
		$empid 				= $this->input->post('empid');
		$check = $this->inc_prom_pun_model->get_any_change_check_prom($empid, $dept);
		if ($check == false)
		{
			$this->form_validation->set_message('any_change_check_for_promotion', 'Please Fill Up Promotion Information.');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	
	function emp_id_existance_check($emp_id)
	{
		$check = $this->processdb->emp_id_existance_check($emp_id);
		if ($check == true)
		{
			$this->form_validation->set_message('emp_id_existance_check', 'Sorry! Change your employee ID.');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	
	function newemp_id_existance_check($emp_id)
	{
		$check = $this->processdb->emp_id_existance_check($emp_id);
		if ($check == false)
		{
			$this->form_validation->set_message('newemp_id_existance_check', 'Sorry! Change your new employee ID.');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	
	
	
	
	function com_incre_prom_search()
	{
		$result = $this->processdb->com_incre_prom_search();
		echo $result;
	}
	
	function increment_entry()
	{
		$result = $this->inc_prom_pun_model->increment_entry();
		return $result;
	}
	
	function dept()
	{
		$result = $this->processdb->com_all_info();
		echo $result;
	}
	
	//================================================Promotion entry==========================================
	function promotion_info()
	{
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('empid', 'Employee ID', 'trim|required');
		$this->form_validation->set_rules('entdate', 'Effective Date', 'trim|required');
		$this->form_validation->set_rules('dob', 'Date of Birth', 'trim');
		$this->form_validation->set_rules('text8', 'Gross Salary', 'trim|required');
		$this->form_validation->set_rules('empid', 'Employee ID', 'trim|callback_emp_id_existance_check');
			
	 	if($this->input->post('pi_edit') != '')
		{
			$this->form_validation->set_rules('empstat', 'Employee Status', 'trim|callback_emp_status_check_for_add');
			$this->form_validation->set_rules('entdate', 'Effective Date', 'trim|required|callback_effective_date_check_for_add');
			$this->form_validation->set_rules('new_empid', 'New Employee ID', 'trim|alpha_numeric|callback_newemp_id_existance_check');
			$this->form_validation->set_rules('text8', 'Gross Salary', 'trim|required|callback_gross_salary_check_for_promotion');
			$this->form_validation->set_rules('dept', 'Department', 'trim|required|callback_any_change_check_for_promotion');
		}
		else
		{
			$this->form_validation->set_rules('idcard', 'Punch Card No.', 'trim');
		}
		
		$this->form_validation->set_error_delimiters("","");
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('form/prom_info');
		}
		else
		{
			if($this->input->post('pi_save') != '')
			{
				$result = $this->per_info1();
			}
			elseif($this->input->post('pi_edit') != '')
			{
				$result = $this->promotion_entry();
				if($result == "true")
				{
					echo "<SCRIPT LANGUAGE=\"JavaScript\">alert('Updated successfully'); window.location='promotion_info';</SCRIPT>";
				}
				else if ($result == "Gross Salary")
				{
					echo "<SCRIPT LANGUAGE=\"JavaScript\">alert('Failed! New Gross salary Always Greater Than or Equal to Old Gross Salary'); window.location='promotion_info';</SCRIPT>";
				}
				else if($result == false)
				{
					echo "<SCRIPT LANGUAGE=\"JavaScript\">alert('Invalid Entry Date'); window.location='promotion_info';</SCRIPT>";
				}
			}
		}
	}
	
	function promotion_entry()
	{
		$result = $this->inc_prom_pun_model->promotion_entry();
		return $result;
	}
	
}

