<?php
class Emp_info_con extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
		/* Standard Libraries */
		$this->load->model('processdb');
		$this->load->model('acl_model');
		$access_level = 1;
		$acl = $this->acl_model->acl_check($access_level);
	}
		
	function per_info1()
	{
		$data = $this->processdb->insertdb1();
		
	}
	
	function check_id()
	{
		$result = $this->processdb->check_id_db();
		echo $result;
	}	
	
	function personal_info_view1()
	{
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('empid', 'Employee ID', 'trim|required');
		$this->form_validation->set_rules('name', 'Employee Name', 'trim');
		$this->form_validation->set_rules('bname', 'Employee Bangla Name', 'trim');
		$this->form_validation->set_rules('mname', 'Employee Mother\'s Name', 'trim');
		$this->form_validation->set_rules('fname', 'Employee Father\'s Name', 'trim');
		$this->form_validation->set_rules('padd', 'Present Address', 'trim');
		$this->form_validation->set_rules('fadd', 'Parmanent Address', 'trim');
		$this->form_validation->set_rules('dob', 'Date of Birth', 'trim');
		$this->form_validation->set_rules('ejd', 'Date of Joining', 'trim|required');
		// $this->form_validation->set_rules('text2', 'Last Degree', 'trim');
		// $this->form_validation->set_rules('text3', 'Passing Year', 'trim');
		// $this->form_validation->set_rules('text4', 'Institute Name', 'trim');
		// $this->form_validation->set_rules('text5', 'Skill Department', 'trim');
		// $this->form_validation->set_rules('text6', 'Year(s) of Skill', 'trim');
		// $this->form_validation->set_rules('text7', 'Company Name', 'trim');
		$this->form_validation->set_rules('text8', 'Gross Salary', 'trim|required');
			
		if($this->input->post('pi_save') != ''){
			$this->form_validation->set_rules('idcard', 'Punch Card No.', 'trim|callback_proxi_id_check_for_save');
			$this->form_validation->set_rules('empid', 'Employee ID', 'trim|required|alpha_numeric|callback_emp_id_existance_check');
		}
		// elseif($this->input->post('pi_edit') != '')
		// {
		// 	$this->form_validation->set_rules('idcard', 'Punch Card No.', 'trim|callback_proxi_id_check_for_edit');
		// }
		else{
			$this->form_validation->set_rules('idcard', 'Punch Card No.', 'trim');
		}
		
		$this->form_validation->set_error_delimiters("","");
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('form/all_info');
		}
		else
		{
			if($this->input->post('pi_save') != '')
			{
				$result = $this->per_info1();
			}
			elseif($this->input->post('pi_edit') != '')
			{
				$result = $this->per_update1();
				if($result == true)
				{
					echo "<SCRIPT LANGUAGE=\"JavaScript\">alert('Updated successfully'); window.location='personal_info_view1';</SCRIPT>";
				}
				else
				{
					echo "<SCRIPT LANGUAGE=\"JavaScript\">alert('Sorry! Error Occurred'); window.location='personal_info_view1';</SCRIPT>";
					//$this->personal_info_view1();
				}
			}
		}
	}
	
	function emp_id_existance_check($emp_id)
	{
		$check = $this->processdb->emp_id_existance_check($emp_id);
		if ($check == false)
		{
			$this->form_validation->set_message('emp_id_existance_check', 'Sorry! Change your employee ID.');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	
	function proxi_id_check_for_save($proxi_id)
	{
		$emp_id = $this->input->post('empid');
		$check = $this->processdb->proxi_id_check_for_save($emp_id, $proxi_id);
		if ($check == false)
		{
			$this->form_validation->set_message('proxi_id_check_for_save', 'Sorry! Punch Card No. already Exist.');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	
	function proxi_id_check_for_edit($proxi_id)
	{
		$emp_id = $this->input->post('empid');
		$check = $this->processdb->proxi_id_check_for_edit($emp_id, $proxi_id);
		if ($check == false)
		{
			$this->form_validation->set_message('proxi_id_check_for_edit', 'Sorry! Punch Card No. already Exist.');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	
	function all()
	{
		
		if($this->session->userdata('logged_in')==FALSE)
		{
			$this->load->view('login_message');
		}
		else
		{
			if($this->input->post('pi_save') != '')
			{
				$this->per_info();
			}
			elseif($this->input->post('pi_edit') != '')
			{
				$this->per_update();
			}
			$this->load->view('form/all_info');
		}
	
	}
	
	function com_info_search1()
	{
		$emp_id = $this->input->post('empid');
		$result = $this->processdb->com_info_search1($emp_id);
		echo $result;
	}
	
	function com_info_next_Search1()
	{
		$id_skill = $this->input->post('id_skill');
		$next_id_skill = $this->next_id_skill($id_skill);
		$emp_id = $this->db->where("id",$next_id_skill)->get('pr_emp_skill')->row()->emp_id;
		$result = $this->processdb->com_info_search1($emp_id);
		echo $result;
	}
	
	function com_info_prev_Search1()
	{
		$id_skill = $this->input->post('id_skill');
		$prev_id_skill = $this->prev_id_skill($id_skill);
		$emp_id = $this->db->where("id",$prev_id_skill)->get('pr_emp_skill')->row()->emp_id;
		$result = $this->processdb->com_info_search1($emp_id);
		echo $result;
	}
	
	function next_id_skill($id_skill)
	{
		$this->db->select('id');
		$this->db->where('id >', $id_skill);
		$this->db->order_by("id","asc");
		$this->db->limit(1);  
		$query = $this->db->get('pr_emp_skill');
		if($query->num_rows()>0)
		{
		  $rows = $query->row();
		  $next_id_skill = $rows->id;
		}
		else
		{
		  $this->db->select_min('id');
		  $query1 = $this->db->get('pr_emp_skill');
		  $rows = $query1->row();
		  $next_id_skill = $rows->id;
		}
		return $next_id_skill;
	}
	
	function prev_id_skill($id_skill)
	{
		$this->db->select('id');
		$this->db->where('id <', $id_skill);
		$this->db->order_by("id","desc");
		$this->db->limit(1);  
		$query = $this->db->get('pr_emp_skill');
		if($query->num_rows()>0)
		{
		  $rows = $query->row();
		  $next_id_skill = $rows->id;
		}
		else
		{
		  $this->db->select_max('id');
		  $query1 = $this->db->get('pr_emp_skill');
		  $rows = $query1->row();
		  $next_id_skill = $rows->id;
		}
		return $next_id_skill;
	}
	
	function per_update1()
	{
		$result = $this->processdb->updatedb1();
		return $result;
	}
	
	function dept()
	{
		$result = $this->processdb->com_all_info();
		echo $result;
	}


	function ajax_upazila_by_dis($id){

        $data = array();
        $this->db->select('id, name_bn');
        $this->db->from('emp_upazilas');
        $this->db->where('dis_id', $id);
        $this->db->order_by('name_bn', 'ASC');
        $query = $this->db->get()->result();

        foreach ($query as $row) {
            $data[$row->id] = $row->name_bn;
        }

        header('Content-Type: application/x-json; charset=utf-8');
        echo json_encode($data);
        exit;
    }

	    function ajax_post_office_by_upa_id($id){

        $data = array();
        $this->db->select('id, name_bn');
        $this->db->from('emp_post_offices');
        $this->db->where('up_zil_id', $id);
        $this->db->order_by('name_bn', 'ASC');
        $query = $this->db->get()->result();

        foreach ($query as $row) {
            $data[$row->id] = $row->name_bn;
        }

        header('Content-Type: application/x-json; charset=utf-8');
        echo json_encode($data);
        exit;
    }
}

