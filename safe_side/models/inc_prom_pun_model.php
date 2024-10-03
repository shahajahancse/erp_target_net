<?php
class Inc_prom_pun_model extends CI_Model{
	
	
	function __construct()
	{
		parent::__construct();
		
		/* Standard Libraries */
		$this->load->model('log_model');
	}
	
	function increment_entry()
	{
		
		$empid =  $this->input->post('empid');
		$new_emp_sal_gra_id	= $this->input->post('salg');
		$new_gross_sal 		= $this->input->post('text8');
		$entdate 		= $this->input->post('entdate');
		$new_entry_date = date("Y-m-d", strtotime($entdate));
		
		$emp_com_info = $this->emp_com_info_data($empid);
		foreach($emp_com_info->result() as $rows)
		{
			$emp_dept_id = $rows->emp_dept_id;
			$emp_sec_id = $rows->emp_sec_id;
			$emp_line_id = $rows->emp_line_id;
			$emp_desi_id = $rows->emp_desi_id;
			$emp_sal_gra_id = $rows->emp_sal_gra_id;
			$gross_sal = $rows->gross_sal;
		}
			
		$data = array(
				'prev_emp_id'		=> $empid,
				'prev_dept' 		=> $emp_dept_id,
				'prev_section' 		=> $emp_sec_id,
				'prev_line' 		=> $emp_line_id,
				'prev_desig' 		=> $emp_desi_id,
				'prev_grade'  		=> $emp_sal_gra_id,
				'prev_salary'  		=> $gross_sal,
				'new_emp_id'  		=> $empid,
				'new_dept'  		=> $emp_dept_id,
				'new_section'		=> $emp_sec_id,
				'new_line' 			=> $emp_line_id,
				'new_desig'			=> $emp_desi_id,
				'new_grade'			=> $new_emp_sal_gra_id,
				'new_salary'		=> $new_gross_sal,
				'effective_month'	=> $new_entry_date,
				'ref_id'			=> $empid,
				'status'			=> 1
		);
		
		
		$this->db->insert('pr_incre_prom_pun', $data);
		
		
										
		$data2 = array(
				
				'emp_sal_gra_id'	=> $new_emp_sal_gra_id,
				'gross_sal'  		=> $new_gross_sal
		);
		$this->db->where('emp_id',$empid);
		$v1 = $this->db->update('pr_emp_com_info', $data2);
		return "true";
	/*	if( $v1) 
		{
			// PROFILE LOG Generate
			$log_username = $this->session->userdata('username');
			$log_emp_id   = $this->input->post('empid');
			$this->log_model->log_profile_update($log_username, $log_emp_id);
			//echo "Updated successfully";
			return true;
		}
		else
		{
			return false;
		}*/
	}
	
	
	
	function promotion_entry()
	{
		
		$empid 				= $this->input->post('empid');
		$new_empid 			= $this->input->post('new_empid');
		$new_dept 			= $this->input->post('dept');
		$new_section 		= $this->input->post('sec');
		$new_line 			= $this->input->post('line');
		$new_desig 			= $this->input->post('desig');
		$new_emp_sal_gra_id	= $this->input->post('salg');
		$emp_category 		= $this->input->post('empstat');
		$new_gross_sal 		= $this->input->post('text8');
		$entdate 			= $this->input->post('entdate');
		$new_entry_date 	= date("Y-m-d", strtotime($entdate));
		$new_year 			= date("Y", strtotime($new_entry_date));
		$new_month 			= date("m", strtotime($new_entry_date));
		
		
	
		$emp_com_info = $this->emp_com_info_data($empid);
		foreach($emp_com_info->result() as $rows)
		{
			$emp_dept_id 		= $rows->emp_dept_id;
			$emp_sec_id 		= $rows->emp_sec_id;
			$emp_line_id 		= $rows->emp_line_id;
			$emp_desi_id 		= $rows->emp_desi_id;
			$emp_operation_id 	= $rows->emp_operation_id;
			$emp_position_id 	= $rows->emp_position_id;
			$emp_sal_gra_id 	= $rows->emp_sal_gra_id;
			$emp_cat_id 		= $rows->emp_cat_id;
			$emp_shift 			= $rows->emp_shift;
			$gross_sal 			= $rows->gross_sal;
			$ot_entitle 		= $rows->ot_entitle;
			$transport 			= $rows->transport;
			$lunch 				= $rows->lunch;
			$att_bonus 			= $rows->att_bonus;
			$salary_draw 		= $rows->salary_draw;
			$salary_type 		= $rows->salary_type;
			$emp_join_date 		= $rows->emp_join_date;
		}
		
	 	$this->db->trans_start();
		
		if($new_empid == "")
		{
			$data_update = array(
				
				'emp_dept_id' 		=> $new_dept,
				'emp_sec_id' 		=> $new_section,
				'emp_line_id' 		=> $new_line,
				'emp_desi_id' 		=> $new_desig,
				'emp_sal_gra_id'	=> $new_emp_sal_gra_id,
				'gross_sal'  		=> $new_gross_sal
			);
			$this->db->where('emp_id',$empid);
			$v1 = $this->db->update('pr_emp_com_info', $data_update);
			
			$new_empid = $empid ;
		}
		else
		{
			$data_insert = array(
				
				'emp_id' 			=> $new_empid,
				'emp_dept_id' 		=> $new_dept,
				'emp_sec_id' 		=> $new_section,
				'emp_line_id' 		=> $new_line,
				'emp_desi_id' 		=> $new_desig,
				'emp_operation_id'	=> $emp_operation_id,
				'emp_position_id'  	=> $emp_position_id,
				'emp_sal_gra_id' 	=> $new_emp_sal_gra_id,
				'emp_cat_id' 		=> $emp_cat_id,
				'emp_shift' 		=> $emp_shift,
				'gross_sal' 		=> $new_gross_sal,
				'ot_entitle'		=> $ot_entitle,
				'transport'  		=> $transport,
				'lunch'  			=> $lunch,
				'att_bonus'  		=> $att_bonus,
				'salary_draw'  		=> $salary_draw,
				'salary_type'  		=> $salary_type,
				'emp_join_date'  	=> $emp_join_date,
				
			);
			$this->db->insert('pr_emp_com_info', $data_insert);
			
			$data_update1 = array(
			'emp_cat_id' 		=> 6
			);
			$this->db->where('emp_id',$empid);
			$v1 = $this->db->update('pr_emp_com_info', $data_update1);
			
			//***********used for personal info table ********
			$this->db->select("*");
			$this->db->where('emp_id',$empid);
			$emp_per_info = $this->db->get("pr_emp_per_info");
			
			foreach($emp_per_info->result() as $rows)
			{
				$emp_full_name 		= $rows->emp_full_name;
				$bangla_nam 		= $rows->bangla_nam;
				$emp_fname 			= $rows->emp_fname;
				$emp_mname 			= $rows->emp_mname;
				$emp_dob 			= $rows->emp_dob;
				$emp_religion 		= $rows->emp_religion;
				$emp_sex 			= $rows->emp_sex;
				$emp_marital_status = $rows->emp_marital_status;
				$emp_blood 			= $rows->emp_blood;
				$img_source 		= $rows->img_source;
			}
			
			$data_emp_per_info = array(
				
				'emp_id' 				=> $new_empid,
				'emp_full_name' 		=> $emp_full_name,
				'bangla_nam' 			=> $bangla_nam,
				'emp_fname' 			=> $emp_fname,
				'emp_mname' 			=> $emp_mname,
				'emp_dob'				=> $emp_dob,
				'emp_religion'  		=> $emp_religion,
				'emp_sex' 				=> $emp_sex,
				'emp_marital_status' 	=> $emp_marital_status,
				'img_source' 			=> $img_source
				
			);
			$this->db->insert('pr_emp_per_info', $data_emp_per_info);
			
			//************ used for employee address table *********
			$this->db->select("*");
			$this->db->where('emp_id',$empid);
			$pr_emp_add = $this->db->get("pr_emp_add");
			
			foreach($pr_emp_add->result() as $rows)
			{
				$emp_pre_add 		= $rows->emp_pre_add;
				$emp_par_add 		= $rows->emp_par_add;
				$emp_par_dis 		= $rows->emp_par_dis;
			}
			
			$data_pr_emp_add = array(
				
				'emp_id' 			=> $new_empid,
				'emp_pre_add' 		=> $emp_pre_add,
				'emp_par_add' 		=> $emp_par_add,
				'emp_par_dis' 		=> $emp_par_dis
				
			);
			$this->db->insert('pr_emp_add', $data_pr_emp_add);
			
			//************ used for employee education table *********
			$this->db->select("*");
			$this->db->where('emp_id',$empid);
			$pr_emp_edu = $this->db->get("pr_emp_edu");
			
			foreach($pr_emp_edu->result() as $rows)
			{
				$emp_degree 		= $rows->emp_degree;
				$emp_pass_yr 		= $rows->emp_pass_yr;
				$emp_ins 			= $rows->emp_ins;
			}
			
			$data_pr_emp_edu = array(
				
				'emp_id' 			=> $new_empid,
				'emp_degree' 		=> $emp_degree,
				'emp_pass_yr' 		=> $emp_pass_yr,
				'emp_ins' 			=> $emp_ins
				
			);
			$this->db->insert('pr_emp_edu', $data_pr_emp_edu);
			
			//************ used for employee puncg card table *********
			$this->db->select("*");
			$this->db->where('emp_id',$empid);
			$pr_id_proxi = $this->db->get("pr_id_proxi");
			
			foreach($pr_id_proxi->result() as $rows)
			{
				$proxi_id  		= $rows->proxi_id ;
			}
			
			$data_pr_id_proxi = array(
				
				'emp_id' 			=> $new_empid,
				'proxi_id ' 		=> $proxi_id 			
			);
			$this->db->insert('pr_id_proxi', $data_pr_id_proxi);
			
			//************ used for employee skill table *********
			$this->db->select("*");
			$this->db->where('emp_id',$empid);
			$pr_id_proxi = $this->db->get("pr_emp_skill");
			
			foreach($pr_id_proxi->result() as $rows)
			{
				$emp_skill  		= $rows->emp_skill ;
				$emp_yr_skill  		= $rows->emp_yr_skill ;
				$emp_com_name  		= $rows->emp_com_name ;
			}
			
			$data_pr_emp_skill = array(
				
				'emp_id' 			=> $new_empid,
				'emp_skill' 		=> $emp_skill,
				'emp_yr_skill' 		=> $emp_yr_skill,
				'emp_com_name' 		=> $emp_com_name,
							
			);
			$this->db->insert('pr_emp_skill', $data_pr_emp_skill);
			
			//************Copy temp table**********************
			//$old_table = "temp_$empid";
			//$new_table = "temp_$new_empid";
			//$this->db->query("CREATE TABLE $new_table AS (SELECT * FROM $old_table)");
			$this->load->dbforge();	
				$temp_table = "temp_$new_empid";
				$temp_fields = array(
				'att_id' 	=> array( 'type' => 'INT','constraint' => '11',  'auto_increment' => TRUE),
				'device_id' => array( 'type' => 'INT','constraint' => '11'),
				'proxi_id'  => array( 'type' => 'INT','constraint' => '11'),
				'date_time' => array( 'type' => 'datetime')
			);
			$this->dbforge->add_field($temp_fields);
			$this->dbforge->add_key('att_id', TRUE);
			$this->dbforge->create_table($temp_table);
			
			
		}
		
		$data = array(
				'prev_emp_id'		=> $empid,
				'prev_dept' 		=> $emp_dept_id,
				'prev_section' 		=> $emp_sec_id,
				'prev_line' 		=> $emp_line_id,
				'prev_desig' 		=> $emp_desi_id,
				'prev_grade'  		=> $emp_sal_gra_id,
				'prev_salary'  		=> $gross_sal,
				'new_emp_id'  		=> $new_empid,
				'new_dept'  		=> $new_dept,
				'new_section'		=> $new_section,
				'new_line' 			=> $new_line,
				'new_desig'			=> $new_desig,
				'new_grade'			=> $new_emp_sal_gra_id,
				'new_salary'		=> $new_gross_sal,
				'effective_month'	=> $new_entry_date,
				'ref_id'			=> $new_empid,
				'status'			=> 2
		);
		$this->db->insert('pr_incre_prom_pun', $data);
		
		$refid_update = array(
			'ref_id' 		=> $new_empid
			);
			$this->db->where('ref_id',$empid);
			$v3 = $this->db->update('pr_incre_prom_pun', $refid_update);
		$this->db->trans_complete();										
		return "true";
	
	}
	
	
	function emp_com_info_data($empid)
	{
		$this->db->select("*");
		$this->db->where('emp_id',$empid);
		$query = $this->db->get("pr_emp_com_info");
		return $query;
	}
	
	function get_old_entry_date($empid, $entdate)
	{
		
		$new_entry_date = date("Y-m-d", strtotime($entdate));
		$new_year = date("Y", strtotime($new_entry_date));
		$new_month = date("m", strtotime($new_entry_date));
		$new_year_month = $new_year."-".$new_month;
				
		$this->db->select("effective_month");
		$this->db->where('new_emp_id',$empid);
		$this->db->limit(1);
		$this->db->order_by('effective_month',"desc");
		$query = $this->db->get("pr_incre_prom_pun");
		//echo $empid."--".$query->num_rows();
		if($query->num_rows() > 0)
		{
			//echo "hello";
			foreach($query->result() as $row)
			{		
				$old_entry_date = $row->effective_month;
				
				
				$old_year = date("Y", strtotime($old_entry_date));
				$old_month = date("m", strtotime($old_entry_date));
				$old_year_month = $old_year."-".$old_month;
				
				$uni_new_year_month = strtotime($new_year_month);
				$uni_old_year_month = strtotime($old_year_month);		
			}
			
			if($uni_new_year_month <= $uni_old_year_month)
			{
					return false;
			}
			else
			{
				return true;
			}
		}
		else
		{
				return true;
		}		
	}
	
	function get_gross_salary_check_incre($empid, $new_gross_salary)
	{
		$emp_com_info = $this->emp_com_info_data($empid);
		if($emp_com_info->num_rows() > 0)
		{
		  foreach($emp_com_info->result() as $rows)
		  {
			  $old_gross_sal = $rows->gross_sal;
		  }
		  if($new_gross_salary <= $old_gross_sal)
		  {
			  return false;
		  }
		  else
		  {
			  return true;
		  }
		}
	}
	
	function get_gross_salary_check_prom($empid, $new_gross_salary)
	{
		$emp_com_info = $this->emp_com_info_data($empid);
		if($emp_com_info->num_rows() > 0)
		{
		  foreach($emp_com_info->result() as $rows)
		  {
			  $old_gross_sal 		= $rows->gross_sal;
		  }
		  
		  if($new_gross_salary < $old_gross_sal)
		  {
			  return false;
		  }	
		  else
		  {
			  return true;
		  }
		}
	}
	
	function get_any_change_check_prom($empid, $new_dept)
	{
		
		$new_dept 			= $this->input->post('dept');
		$new_section 		= $this->input->post('sec');
		$new_line 			= $this->input->post('line');
		$new_desig 			= $this->input->post('desig');
		$emp_com_info = $this->emp_com_info_data($empid);
		if($emp_com_info->num_rows() > 0)
		{
		  foreach($emp_com_info->result() as $rows)
		  {
			  $emp_dept_id 		= $rows->emp_dept_id;
			  $emp_sec_id 		= $rows->emp_sec_id;
			  $emp_line_id 		= $rows->emp_line_id;
			  $emp_desi_id 		= $rows->emp_desi_id;
		  }
		  if ($emp_dept_id == $new_dept && $emp_sec_id == $new_section && $emp_line_id == $new_line && $emp_desi_id == $new_desig)
		  {
			  return false;
		  }		
		  else
		  {
			  return true;
		  }
		}
	}
	
}
?>