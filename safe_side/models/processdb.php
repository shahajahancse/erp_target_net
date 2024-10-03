<?php
class Processdb extends CI_Model{
	
	
	function __construct()
	{
		parent::__construct();
		
		/* Standard Libraries */
		$this->load->model('log_model');
	}
		
	function updatedb1()
	{
		
		    $id =  $this->input->post('empid');
			
			
			$dob = $this->input->post('dob');
			$dob = date("Y-m-d", strtotime($dob)); 
			
			
			$ejd = $this->input->post('ejd');
			$ejd = date("Y-m-d", strtotime($ejd)); 
			
			
			
			if($_FILES["userfile"]["name"] != '')
			{
				$config['upload_path'] = './uploads/photo/';
				$config['allowed_types'] = '*';
				$config['max_size']	= '500';
				$config['max_width']  = '500';
				$config['max_height']  = '700';
		
				$this->load->library('upload', $config);
		
				if ( ! $this->upload->do_upload())
				{
					$error = array('error' => $this->upload->display_errors());
					$img_error =  $error["error"];
					echo "<SCRIPT LANGUAGE=\"JavaScript\">alert($img_error);</SCRIPT>";
					$data = array(
							'emp_full_name' 	=> $this->input->post('name'),
							'bangla_nam' 		=> $this->input->post('bname'),
							'emp_mname' 		=> $this->input->post('mname'),
							'emp_fname' 		=> $this->input->post('fname'),
							'emp_dob'  			=> $dob,
							'emp_religion'  	=> $this->input->post('reli'),
							'emp_sex'  			=> $this->input->post('sex'),
							'emp_marital_status'=> $this->input->post('ms'),
							'emp_blood'			=> $this->input->post('bgroup')
						);
					
				}
				else
				{
					$data_up = array('upload_data' => $this->upload->data());
					//print_r($data);
					$img = $data_up["upload_data"]["file_name"];
				
					$data = array(
							'emp_full_name' 	=> $this->input->post('name'),
							'bangla_nam' 		=> $this->input->post('bname'),
							'emp_mname' 		=> $this->input->post('mname'),
							'emp_fname' 		=> $this->input->post('fname'),
							'emp_dob'  			=> $dob,
							'emp_religion'  	=> $this->input->post('reli'),
							'emp_sex'  			=> $this->input->post('sex'),
							'emp_marital_status'=> $this->input->post('ms'),
							'emp_blood'			=> $this->input->post('bgroup'),
							'img_source'		=> $img
						);
				}
			}
			else
			{
				$data = array(
						'emp_full_name'  		=> $this->input->post('name'),
						'bangla_nam' 		=> $this->input->post('bname'),
						'emp_mname' 			=> $this->input->post('mname'),
						'emp_fname' 			=> $this->input->post('fname'),
						'emp_dob'  				=> $dob,
						'emp_religion'  		=> $this->input->post('reli'),
						'emp_sex'  				=> $this->input->post('sex'),
						'emp_marital_status'	=> $this->input->post('ms'),
						'emp_blood'				=> $this->input->post('bgroup')
					);
			}
			//print_r(data);
			$this->db->where('emp_id',$id);
			$v1 = $this->db->update('pr_emp_per_info', $data);
				
				
			$adddata = array(
				'emp_pre_add' 	=> $this->input->post('padd'),
				'emp_par_add'	=> $this->input->post('fadd')
						);
			//print_r(adddata);
			$this->db->where('emp_id',$id);
			$v2 = $this->db->update('pr_emp_add', $adddata);
			
			
			
											
			$data2 = array(
					'emp_dept_id'  		=> $this->input->post('dept'),
					'emp_sec_id' 		=> $this->input->post('sec'),
					'emp_line_id' 		=> $this->input->post('line'),
					'emp_desi_id'  		=> $this->input->post('desig'),
					'emp_operation_id'	=> $this->input->post('operation'),
					'emp_position_id'  	=> $this->input->post('position'),
					'emp_sal_gra_id'	=> $this->input->post('salg'),
					//'emp_cat_id'  		=> $this->input->post('empstat'),
					'emp_shift'  		=> $this->input->post('empshift'),
					'gross_sal'  		=> $this->input->post('text8'),
					'ot_entitle'  		=> $this->input->post('otentitle'),
					'transport'  		=> $this->input->post('transport'),
					'lunch'  			=> $this->input->post('lunch'),
					'att_bonus'  		=> $this->input->post('attbonus'),
					'emp_join_date'		=> $ejd,
					'salary_draw'		=> $this->input->post('saldraw'),
					'salary_type'		=> $this->input->post('saltype')
			);
			//print_r(data2);
			$this->db->where('emp_id',$id);
			$v3 = $this->db->update('pr_emp_com_info', $data2);
			
			$data_edu = array(
					'emp_degree'  => $this->input->post('text2'),
					'emp_pass_yr' => $this->input->post('text3'),
					'emp_ins' => $this->input->post('text4')
					);
			
			$this->db->where('emp_id',$id);
			$v4 =$this->db->update('pr_emp_edu', $data_edu);
							
			//print_r(data_edu);				
							
							
			$data_skill = array(
					'emp_skill'  => $this->input->post('text5'),
					'emp_yr_skill' => $this->input->post('text6'),
					'emp_com_name' => $this->input->post('text7')
				);
			//print_r(data_skill);
			$this->db->where('emp_id',$id);
			$v5= $this->db->update('pr_emp_skill', $data_skill);
			
			$pr_id_proxi = array('proxi_id'  => $this->input->post('idcard'));
			$this->db->where('emp_id',$id);
			$v6 = $this->db->update('pr_id_proxi', $pr_id_proxi);
			
			if( $v1 or $v2 or $v3 or $v4 or $v5 or $v6) 
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
			}
	}
	
	function proxi_id_check_for_save($emp_id, $proxi_id)
	{
		$this->db->select('proxi_id');
		$this->db->where('proxi_id', $proxi_id);
		$query = $this->db->get('pr_id_proxi');
		//echo $this->db->last_query();
		if($query->num_rows() > 0)
		{
			return false;
		}
		else
		{
			return true;
		}
	}
	
	function proxi_id_check_for_edit($emp_id, $proxi_id)
	{
		$this->db->select('proxi_id');
		$this->db->where('proxi_id', $proxi_id);
		$this->db->where('emp_id', $emp_id);
		$query = $this->db->get('pr_id_proxi');
		//echo $this->db->last_query();
		if($query->num_rows() > 0)
		{
			return true;
		}
		else
		{
			$this->db->select('proxi_id');
			$this->db->where('proxi_id', $proxi_id);
			$query = $this->db->get('pr_id_proxi');
			if($query->num_rows() == 0)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
	}
	
	//--------------------------
	function insertdb()
	{
		if($this->input->post('empid') =='')
		{
			return "Please insert Employee ID";
		}
		
		$this->db->where('emp_id',$this->input->post('empid'));
		$query = $this->db->get('pr_emp_per_info');
		$num_rows = $query->num_rows(); 
		
		if( $num_rows > 0)
		{
			//return "Sorry! Change your employee ID.";
			echo "<SCRIPT LANGUAGE=\"JavaScript\">alert('Sorry! Change your employee ID.'); window.location='personal_info_view1';</SCRIPT>";
		}
		else
		{
			
			if($_FILES["userfile"]["name"] != '')
			{
				$config['upload_path'] = './uploads/photo/';
				$config['allowed_types'] = '*';
				$config['max_size']	= '200';
				$config['max_width']  = '500';
				$config['max_height']  = '700';
		
				$this->load->library('upload', $config);
		
				if ( ! $this->upload->do_upload())
				{
					$error = array('error' => $this->upload->display_errors());
					echo $error["error"];
				}
				else
				{
					$data = array('upload_data' => $this->upload->data());
					//print_r($data);
					$img = $data["upload_data"]["file_name"];
				}
			}
			else
			{
				$img ="";
			}
			
			$dob = $this->input->post('dob');
			$dob = date("Y-m-d", strtotime($dob)); 
			
			$data = array(
					'emp_id'		=> $this->input->post('empid'),
					'emp_full_name' => $this->input->post('name'),
					'bangla_nam' 		=> $this->input->post('bname'),
					'emp_mname' 	=> $this->input->post('mname'),
					'emp_fname' 	=> $this->input->post('fname'),
					'emp_dob'  		=> $dob,
					'emp_religion'  => $this->input->post('reli'),
					'emp_sex'  		=> $this->input->post('sex'),
					'emp_marital_status'  	=> $this->input->post('ms'),
					'emp_blood'		=> $this->input->post('bgroup'),
					'img_source'	=> $img
			);
			
			
			$this->db->insert('pr_emp_per_info', $data);
			$adddata = array(
					'emp_id'		=> $this->input->post('empid'),
					'emp_pre_add'  	=> $this->input->post('padd'),
					'emp_par_add'  	=> $this->input->post('fadd')
					);
			
			$this->db->insert('pr_emp_add', $adddata);
			
			if($this->db->insert('pr_emp_per_info', $data))
			{
				return "Employee's personel info inserted Successfully";
			} 
			else
			{
				return "FAILED";
			}
		}
		
	
	}
	
//-----------------------		
	function updatedb()
	{
		if($this->input->post('empid') =='')
		{
			return "Please insert Employee ID";
		}
		$id=$this->input->post('empid');
		$this->db->select("emp_id");
		$this->db->where('emp_id',$id);
		$query = $this->db->get("pr_emp_per_info");
		$num_row = $query->num_rows();
		if($num_row > 0 )
		{
			$dob = $this->input->post('dob');
			$dob = date("Y-m-d", strtotime($dob)); 
			
			if($_FILES["userfile"]["name"] != '')
			{
				$config['upload_path'] = './uploads/photo/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']	= '200';
				$config['max_width']  = '500';
				$config['max_height']  = '700';
		
				$this->load->library('upload', $config);
		
				if ( ! $this->upload->do_upload())
				{
					$error = array('error' => $this->upload->display_errors());
					echo $error["error"];
				}
				else
				{
					$data_up = array('upload_data' => $this->upload->data());
					//print_r($data);
					$img = $data_up["upload_data"]["file_name"];
				}
				$data = array(
						'emp_id'			=> $this->input->post('empid'),
						'emp_full_name' 	=> $this->input->post('name'),
						'emp_mname' 		=> $this->input->post('mname'),
						'emp_fname' 		=> $this->input->post('fname'),
						'emp_dob'  			=> $dob,
						'emp_religion'  	=> $this->input->post('reli'),
						'emp_sex'  			=> $this->input->post('sex'),
						'emp_marital_status'=> $this->input->post('ms'),
						'emp_blood'			=> $this->input->post('bgroup'),
						'img_source'		=> $img
					);
			}
			else
			{
				$data = array(
						'emp_id'			=> $this->input->post('empid'),
						'emp_full_name'  	=> $this->input->post('name'),
						'emp_mname' 		=> $this->input->post('mname'),
						'emp_fname' 		=> $this->input->post('fname'),
						'emp_dob'  			=> $dob,
						'emp_religion'  	=> $this->input->post('reli'),
						'emp_sex'  			=> $this->input->post('sex'),
						'emp_marital_status'=> $this->input->post('ms'),
						'emp_blood'			=> $this->input->post('bgroup')
					);
			}
				
				$this->db->where('emp_id',$this->input->post('empid'));
				$query = $this->db->get('pr_emp_add');
						
				if($query->num_rows() !=0 )
				{
					$adddata = array(
						'emp_pre_add' 	=> $this->input->post('padd'),
						'emp_par_add'	=> $this->input->post('fadd')
									);
					$this->db->where('emp_id',$id);
					$this->db->update('pr_emp_add', $adddata);
				}
				else
				{
					$adddata = array(
						'emp_id'		=> $this->input->post('empid'),
						'emp_pre_add' 	=> $this->input->post('padd'),
						'emp_par_add'	=> $this->input->post('fadd')
									);
					$this->db->insert('pr_emp_add', $adddata);
				}
				
				
				$this->db->where('emp_id',$id);
				if($this->db->update('pr_emp_per_info', $data)) 
				{
					echo "Updated successfully";
				}
				else
				{
					echo "Update failed";
				}
		}
		else
		{
		 	echo "Employee ID does not exist";
		}
	}
	function insertdb___()
	{
			
			if($_FILES["userfile"]["name"] != '')
			{
				$config['upload_path'] = './uploads/photo/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']	= '200';
				$config['max_width']  = '500';
				$config['max_height']  = '700';
		
				$this->load->library('upload', $config);
		
				if ( ! $this->upload->do_upload())
				{
					$error = array('error' => $this->upload->display_errors());
					echo $error["error"];
				}
				else
				{
					$data = array('upload_data' => $this->upload->data());
					//print_r($data);
					$img = $data["upload_data"]["file_name"];
				}
			}
			else
			{
				$img ="";
			}
			
			$dob = $this->input->post('dob');
			$dob = date("Y-m-d", strtotime($dob)); 
			
			$data = array(
					'emp_id'		=> $this->input->post('empid'),
					'emp_full_name' => $this->input->post('name'),
					'emp_mname' 	=> $this->input->post('mname'),
					'emp_fname' 	=> $this->input->post('fname'),
					'emp_dob'  		=> $dob,
					'emp_religion'  => $this->input->post('reli'),
					'emp_sex'  		=> $this->input->post('sex'),
					'emp_marital_status'  	=> $this->input->post('ms'),
					'emp_blood'		=> $this->input->post('bgroup'),
					'img_source'	=> $img
			);
			
			print_r($data);
			
			
			$adddata = array(
					'emp_id'		=> $this->input->post('empid'),
					'emp_pre_add'  	=> $this->input->post('padd'),
					'emp_par_add'  	=> $this->input->post('fadd')
					);
			
			print_r($adddata);
			
			$data2 = array(
					'emp_id'			=> $this->input->post('com_empid'),
					'emp_dept_id'  		=> $this->input->post('dept'),
					'emp_sec_id' 		=> $this->input->post('sec'),
					'emp_line_id' 		=> $this->input->post('line'),
					'emp_desi_id'  		=> $this->input->post('desig'),
					'emp_operation_id'	=> $this->input->post('operation'),
					'emp_position_id'  	=> $this->input->post('position'),
					'emp_sal_gra_id'	=> $this->input->post('salg'),
					'emp_cat_id'  		=> $emp_status,
					'emp_shift'  		=> $this->input->post('empshift'),
					'gross_sal'  		=> $this->input->post('gsal'),
					'ot_entitle'  		=> $this->input->post('otentitle'),
					'transport'  		=> $this->input->post('transport'),
					'lunch'  			=> $this->input->post('lunch'),
					'att_bonus'  		=> $this->input->post('attbonus'),
					'emp_join_date'		=> $ejd,
					'salary_draw'		=> $this->input->post('saldraw'),
					'salary_type'		=> $this->input->post('saltype')
			);
			print_r($data2);
			

 					$data_edu = array(
							'emp_id'	=> $this->input->post('edu_empid'),
							'emp_degree'  => $this->input->post('edu_last_dg'),
							'emp_pass_yr' => $this->input->post('edu_pass_year'),
							'emp_ins' => $this->input->post('edu_istitute')
						);
							print_r($data_edu);
					$data_skill = array(
							'emp_id'	=> $this->input->post('edu_empid'),
							'emp_skill'  => $this->input->post('edu_skil_dept'),
							'emp_yr_skill' => $this->input->post('edu_skill_year'),
							'emp_com_name' => $this->input->post('edu_skill_company')
						);
			
				print_r($data_skill);
			//$this->db->insert('pr_emp_add', $adddata);
			
			//if($this->db->insert('pr_emp_per_info', $data))
			//{
			//	return "Employee's personel info inserted Successfully";
			//} 
			//else
			//{
			//	return "FAILED";
			//}
		
		
	
	}
	
	function check_id_db()
	{
		echo "id".$this->input->post('employee_id');
		$this->db->select('emp_id');
		$this->db->where('emp_id',$this->input->post('employee_id'));
		$query = $this->db->get('pr_emp_com_info');
		$num_rows = $query->num_rows(); 
		if( $num_rows == 1)
		{
			return 1;
		}else
		{
			return 0;
		}
	}
	
	function emp_id_existance_check($emp_id)
	{
		$this->db->select('emp_id');
		$this->db->where('emp_id',$emp_id);
		$query = $this->db->get('pr_emp_com_info');
		$num_rows = $query->num_rows(); 
				
		if( $num_rows == 1)
		{
			return false;
		}
		else
		{
			return true;
		}
	}
	//---------------------------------
	function insertdb1()
	{
		
		if($this->input->post('empid') =='')
		{
			//echo "Please insert Employee ID";
			return ;
		}
		
		
		
		
		
			if($_FILES["userfile"]["name"] != '')
			{
				$config['upload_path'] = './uploads/photo/';
				$config['allowed_types'] = '*';
				$config['max_size']	= '400';
				$config['max_width']  = '500';
				$config['max_height']  = '700';
				$this->load->library('upload', $config);
				if ( ! $this->upload->do_upload())
				{
					$error = array('error' => $this->upload->display_errors());
					echo $error["error"];
				}
				else
				{
					$data = array('upload_data' => $this->upload->data());
							//print_r($data);
					$img = $data["upload_data"]["file_name"];
				}
			}
			else
			{
				$img ="";
			}
						
			$dob = $this->input->post('dob');
			$dob = date("Y-m-d", strtotime($dob)); 
					
			$data = array(
						'emp_id'		=> $this->input->post('empid'),
						'emp_full_name' => $this->input->post('name'),
						'bangla_nam' 	=> $this->input->post('bname'),
						'emp_mname' 	=> $this->input->post('mname'),
						'emp_fname' 	=> $this->input->post('fname'),
						'emp_dob'  		=> $dob,
						'emp_religion'  => $this->input->post('reli'),
						'emp_sex'  		=> $this->input->post('sex'),
						'emp_marital_status'  	=> $this->input->post('ms'),
						'emp_blood'		=> $this->input->post('bgroup'),
						'img_source'	=> $img
						);
						
			$this->db->insert('pr_emp_per_info', $data);
			//	print_r($data);
						//echo "<br/>";
						
			$adddata = array(
						'emp_id'		=> $this->input->post('empid'),
						'emp_pre_add'  	=> $this->input->post('padd'),
						'emp_par_add'  	=> $this->input->post('fadd')
						);
			$this->db->insert('pr_emp_add', $adddata) ;
			//print_r($adddata);
						//echo "<br/>";
			$ejd = $this->input->post('ejd');
			$ejd = date("Y-m-d", strtotime($ejd)); 
					
			$data2 = array(
						'emp_id'			=> $this->input->post('empid'),
						'emp_dept_id'  		=> $this->input->post('dept'),
						'emp_sec_id' 		=> $this->input->post('sec'),
						'emp_line_id' 		=> $this->input->post('line'),
						'emp_desi_id'  		=> $this->input->post('desig'),
						'emp_operation_id'	=> $this->input->post('operation'),
						'emp_position_id'  	=> $this->input->post('position'),
						'emp_sal_gra_id'	=> $this->input->post('salg'),
						'emp_cat_id'  		=> $this->input->post('empstat'),
						'emp_shift'  		=> $this->input->post('empshift'),
						'gross_sal'  		=> $this->input->post('text8'),
						'ot_entitle'  		=> $this->input->post('otentitle'),
						'transport'  		=> $this->input->post('transport'),
						'lunch'  			=> $this->input->post('lunch'),
						'att_bonus'  		=> $this->input->post('attbonus'),
						'emp_join_date'		=> $ejd,
						'salary_draw'		=> $this->input->post('saldraw'),
						'salary_type'		=> $this->input->post('saltype')
						);
						
			//$this->db->insert('pr_emp_com_info', $data2);
			//print_r($data2);
						//echo "<br/>";
						
			$pr_id_proxi = array(
					'emp_id'	=> $this->input->post('empid'),
					'proxi_id'  => $this->input->post('idcard')
					);
			//print_r($pr_id_proxi);
			$emp_status = $this->input->post('empstat');
			
			
			
			
			$data_edu = array(
						'emp_id'	=> $this->input->post('empid'),
						'emp_degree'  => $this->input->post('text2'),
						'emp_pass_yr' => $this->input->post('text3'),
						'emp_ins' => $this->input->post('text4')
						);
			$this->db->insert('pr_emp_edu', $data_edu);
							//	print_r($data_edu);
									//	echo "<br/>";
									
									
									
			$data_skill = array(
						'emp_id'	=> $this->input->post('empid'),
						'emp_skill'  => $this->input->post('text5'),
						'emp_yr_skill' => $this->input->post('text6'),
						'emp_com_name' => $this->input->post('text7')
						);
			$this->db->insert('pr_emp_skill', $data_skill);
			
						
						
						
						
					//	print_r($data_skill);
						//echo "<br/>";
					//	echo "end";
						
						
			if($this->db->insert('pr_emp_com_info', $data2) and $this->db->insert('pr_id_proxi', $pr_id_proxi) )
			{
							
				$this->load->dbforge();	
				$id = $this->input->post('empid');
				$temp_table = "temp_$id";
				$temp_fields = array(
				'att_id' 	=> array( 'type' => 'INT','constraint' => '11',  'auto_increment' => TRUE),
				'device_id' => array( 'type' => 'INT','constraint' => '11'),
				'proxi_id'  => array( 'type' => 'INT','constraint' => '11'),
				'date_time' => array( 'type' => 'datetime')
			);
			$this->dbforge->add_field($temp_fields);
			$this->dbforge->add_key('att_id', TRUE);
			$this->dbforge->create_table($temp_table);
			
			// PROFILE LOG Generate
			$log_username = $this->session->userdata('username');
			$log_emp_id   = $this->input->post('empid');
			$this->log_model->log_profile_insert($log_username, $log_emp_id);
			 
			
			
			//echo "Inserted Successfully" ;
			echo "<SCRIPT LANGUAGE=\"JavaScript\">alert('Inserted Successfully.'); window.location='personal_info_view1';</SCRIPT>";
			} 
			else
			{
			echo "FAILED" ;
			return ;
			}
	}
	//------------------
	function update_deptname()
	{
		$id=$this->input->post('deptid');
		$this->db->select("dept_id");
		$this->db->where('dept_id',$id);
		$query = $this->db->get("pr_dept");
		$num_row = $query->num_rows();
		if($num_row > 0 )
		{
			$data = array(
						'dept_name'	=> $this->input->post('deptname')
				);
				
				$this->db->where('dept_id',$id);
				if($this->db->update('pr_dept', $data)) 
				{
					echo "Updated successfully";
				}
				else
				{
					echo "Update failed";
				}
		}
		else
		{
		 	echo "Department name does not exist";
		}
	}
	
	function update_sectionname()
	{
		$id=$this->input->post('sectionid');
		$this->db->select("sec_id");
		$this->db->where('sec_id',$id);
		$query = $this->db->get("pr_section");
		$num_row = $query->num_rows();
		if($num_row > 0 )
		{
			$data = array(
						'sec_name'	=> $this->input->post('sectionname'),
						'sec_bangla'	=> $this->input->post('sectionnamebng')
				);
				
				$this->db->where('sec_id',$id);
				if($this->db->update('pr_section', $data)) 
				{
					echo "Updated successfully";
				}
				else
				{
					echo "Update failed";
				}
		}
		else
		{
		 	echo "Section name does not exist";
		}
	}
	
	function deletedb()
	{
		$id=$this->input->post('empid');
		$this->db->select("emp_id");
		$this->db->where('emp_id',$id);
		$query = $this->db->get("pr_emp_per_info");
		$num_row = $query->num_rows();
		if($num_row > 0 )
		{
			$this->db->where('emp_id',$id);
			$this->db->delete('pr_emp_com_info');
			$this->db->where('emp_id',$id);
			$this->db->delete('pr_id_proxi');
			$this->db->where('emp_id',$id);
			$this->db->delete('pr_emp_edu');
			$this->db->where('emp_id',$id);
			$this->db->delete('pr_emp_skill');
			$this->db->where('emp_id',$id);
			$this->db->delete('pr_emp_add');
			$this->db->where('emp_id',$id);
			if($this->db->delete('pr_emp_per_info'))
			{
				$this->load->dbforge();
				$table_name = "temp_$id";
				if($this->dbforge->drop_table($table_name))
				{
					echo "Delete all data successfully";
				}
				else
				{
					echo "Delete failed";
				}
			} 
			else
			{
				echo "Delete failed";
			}
		}
		else
		{
		 	echo "Employee ID does not exist";
		}
		
	}
	
	function delete_deptname()
	{
		$deptname=$this->input->post('deptname');
		$this->db->select("dept_name");
		$this->db->where('dept_name',$deptname);
		$query = $this->db->get("pr_dept");
		$num_row = $query->num_rows();
		if($num_row > 0 )
		{
			$this->db->where('dept_name',$deptname);
			if($this->db->delete('pr_dept'))
			{
				return "Department name deleted successfully";
			} 
			else
			{
				return "Delete failed";
			}
		}
		else
		{
		 	return "Department name does not exist";
		}
		
	}
	
	function delete_sectionname()
	{
		$sec_name=$this->input->post('sectionname');
		$this->db->select("sec_name");
		$this->db->where('sec_name',$sec_name);
		$query = $this->db->get("pr_section");
		$num_row = $query->num_rows();
		if($num_row > 0 )
		{
			$this->db->where('sec_name',$sec_name);
			if($this->db->delete('pr_section'))
			{
				return "Section name deleted successfully";
			} 
			else
			{
				return "Delete failed";
			}
		}
		else
		{
		 	return "Section name does not exist";
		}
		
	}
	
	function save_deptname()
	{
		$this->db->select('dept_name');
		$this->db->where('dept_name',$this->input->post('deptname'));
		$query = $this->db->get('pr_dept');
		$num_rows = $query->num_rows(); 
		
		if( $num_rows > 0)
		{
			return "Department Already Exist!";
		}
		else
		{
		
			$data = array(
					'dept_name'	=> $this->input->post('deptname')
					
			);
			
			if($this->db->insert('pr_dept', $data))
			{
				return "Department name inserted Successfully";
			} 
			else
			{
				return "FAILED";
			}
		}
		
	
	}
	
	function save_sectionname()
	{
		$this->db->select('sec_name','sec_bangla');
		$this->db->where('sec_name',$this->input->post('sectionname'));
		$query = $this->db->get('pr_section');
		$num_rows = $query->num_rows(); 
		
		if( $num_rows > 0)
		{
			return "Section Already Exist!";
		}
		else
		{
		
			$data = array(
					'sec_name'	=> $this->input->post('sectionname'),
					'sec_bangla'	=> $this->input->post('sectionnamebng')		
			);
			
			if($this->db->insert('pr_section', $data))
			{
				return "Section name inserted Successfully";
			} 
			else
			{
				return "FAILED";
			}
		}
		
	
	}
	
	
	
	function empstatus($empid)
	{
		$this->db->select('emp_cat_id');
		$this->db->where('emp_id',$empid);
		$query = $this->db->get('pr_emp_com_info');
		foreach($query->result() as $row)
		{
			$this->db->select('stat_type');
			$this->db->where('stat_id',$row->emp_cat_id);
			$query1 = $this->db->get('pr_emp_status');
			foreach($query1->result() as $row1)
			{
				return $row1->stat_type;
			}
			
		}
	}
	function search()
	{
		$this->db->where('emp_id',$this->input->post('empid'));
		$query = $this->db->get('pr_emp_per_info');
		//print_r( $query->result());
    	if( $num_rows = $query->num_rows() !=0 )
		{
			foreach ($query->result() as $row)
			{
				$empid=$row->emp_id;
			    $empst = $this->empstatus($empid);
								
				$dob = $row->emp_dob;
				$dob = date("d-m-Y", strtotime($dob)); 
				
				$data = array(
						'emp_id'	=> $empid,
						'emp_full_name'  => $row->emp_full_name,
						'emp_mname' => $row->emp_mname,
						'emp_fname' => $row->emp_fname,
						'emp_dob'  	=> $dob,
						'emp_religion'  => $row->emp_religion,
						'emp_sex'  	=> $row->emp_sex,
						'ms'  		=> $row->emp_marital_status,
						'emp_blood'=> $row->emp_blood,
						'img_source'=> $row->img_source,
						'emp_status'=> $empst
				);
				//print_r($data)
				 
			}
						
			$this->db->where('emp_id',$this->input->post('empid'));
			$query = $this->db->get('pr_emp_add');
					
			if($query->num_rows() !=0 )
			{
				$this->db->where('emp_id',$this->input->post('empid'));
				$query1 = $this->db->get('pr_emp_add');
				foreach ($query1->result() as $row)
				{
					$adddata = array(
							'emp_pre_add'	=> $row->emp_pre_add ,
							'emp_par_add'  => $row->emp_par_add
							
					);
					 
				}
				//return $data;
				//print_r($data);
				echo $data['emp_id']."-*-".$data['emp_full_name']."-*-".$data['emp_mname']."-*-".$data['emp_fname']."-*-".$data['emp_dob']."-*-".$data['emp_religion']."-*-".$data['emp_sex']."-*-".$data['ms']."-*-".$data['emp_blood']."-*-".$data['img_source']."-*-".$data['emp_status']."-*-".$adddata['emp_pre_add']."-*-".$adddata['emp_par_add'];
			}
			else
			{
				echo $data['emp_id']."-*-".$data['emp_full_name']."-*-".$data['emp_mname']."-*-".$data['emp_fname']."-*-".$data['emp_dob']."-*-".$data['emp_religion']."-*-".$data['emp_sex']."-*-".$data['ms']."-*-".$data['emp_blood'].$data['img_source']."-*-".$data['emp_status'];
			}
			
			//echo json_encode($data);
		}
		else
		{
			echo "Employee ID does not exist";
		}
	}
	
	function search_dept_name()
	{
		$this->db->where('dept_name',$this->input->post('deptname'));
		$query = $this->db->get('pr_dept');
		if( $num_rows = $query->num_rows() !=0 )
		{
			foreach ($query->result() as $row)
			{
				$data = array(
						'dept_id'	=> $row->dept_id,
						'dept_name'  => $row->dept_name,
						
				);
				 
			}
			return $data = implode("-*-",$data);
		}
		else
		{
			return "Department name does not exist";
		}
		
		
	}
	
	function search_section_name()
	{
		
		
		//$this->db->where('sec_name','HR');
		$this->db->where('sec_name',$this->input->post('sectionname'));
		$query = $this->db->get('pr_section');
		//print_r( $query->result());
		
		
		if( $num_rows = $query->num_rows() !=0 )
		{
			foreach ($query->result() as $row)
			{
				$data = array(
						'sec_id'	=> $row->sec_id,
						'sec_name'  => $row->sec_name,
						'dept_id'	=> $row->dept_id,
						'sec_bangla'	=> $row->sec_bangla 
						
				);
				 
			}
			
				
			$sec_info = implode('=*=', $data);
			$dept_id_name = $this->dept();
			
			return $alldata = $sec_info."*-*".$dept_id_name;
			
			
		}
		else
		{
			return "Section name does not exist";
		}
	}
	
	
	//Company Information Manupulation=================================================================================
	
	function com_info_insert()
	{	
		
		$this->db->select('emp_id');
		$this->db->where('emp_id',$this->input->post('com_empid'));
		$query = $this->db->get('pr_emp_com_info');
		$num_rows = $query->num_rows(); 
		
		$this->db->select('emp_id');
		$this->db->where('emp_id',$this->input->post('com_empid'));
		$query1 = $this->db->get('pr_emp_per_info');
		$num_rows1 = $query1->num_rows(); 
		
		$this->db->select('proxi_id');
		$this->db->where('proxi_id',$this->input->post('idcard'));
		$this->db->where('proxi_id !=','');
		$query2 = $this->db->get('pr_id_proxi');
		$num_rows2 = $query2->num_rows(); 
		
		if( $num_rows > 0)
		{
			return "Sorry! Change your employee ID.";
		}
		elseif( $num_rows1 == 0)
		{
			return "Sorry! Please insert employee's personel information first.";
		}
		elseif( $num_rows2 > 0)
		{
			return "Sorry! Please change your Punch card number.";
		}
		else
		{
		
			$data1 = array(
					'emp_id'	=> $this->input->post('com_empid'),
					'proxi_id'  => $this->input->post('idcard')
			);
			
			$emp_status = $this->input->post('empstat');
			
			$ejd = $this->input->post('ejd');
			$ejd = date("Y-m-d", strtotime($ejd)); 
			
			$data2 = array(
					'emp_id'			=> $this->input->post('com_empid'),
					'emp_dept_id'  		=> $this->input->post('dept'),
					'emp_sec_id' 		=> $this->input->post('sec'),
					'emp_line_id' 		=> $this->input->post('line'),
					'emp_desi_id'  		=> $this->input->post('desig'),
					'emp_operation_id'	=> $this->input->post('operation'),
					'emp_position_id'  	=> $this->input->post('position'),
					'emp_sal_gra_id'	=> $this->input->post('salg'),
					'emp_cat_id'  		=> $emp_status,
					'emp_shift'  		=> $this->input->post('empshift'),
					'gross_sal'  		=> $this->input->post('gsal'),
					'ot_entitle'  		=> $this->input->post('otentitle'),
					'transport'  		=> $this->input->post('transport'),
					'lunch'  			=> $this->input->post('lunch'),
					'att_bonus'  		=> $this->input->post('attbonus'),
					'emp_join_date'		=> $ejd,
					'salary_draw'		=> $this->input->post('saldraw'),
					'salary_type'		=> $this->input->post('saltype')
			);
			//print_r($data2);
			if($this->db->insert('pr_id_proxi', $data1) and $this->db->insert('pr_emp_com_info', $data2))
			{
				$this->load->dbforge();	
				$id = $this->input->post('com_empid');
				$temp_table = "temp_$id";
				$temp_fields = array(
							'att_id' 	=> array( 'type' => 'INT','constraint' => '11',  'auto_increment' => TRUE),
							'device_id' => array( 'type' => 'INT','constraint' => '11'),
							'proxi_id'  => array( 'type' => 'INT','constraint' => '11'),
							'date_time' => array( 'type' => 'datetime')
							);
				$this->dbforge->add_field($temp_fields);
				$this->dbforge->add_key('att_id', TRUE);
				$this->dbforge->create_table($temp_table);

				return "Employee's company info inserted Successfully";
			} 
			else
			{
				return "FAILED";
			}
		}
		
	
	}
	
function com_info_edit()
{	
		$com_empid = $this->input->post('com_empid');
		
		$this->db->select("emp_id");
		$this->db->where('emp_id',$com_empid);
		$query = $this->db->get("pr_emp_left_history");
		if($query->num_rows() > 0)
		{
			return "Sorry! this employee is already Lefted";
		}
		
		$this->db->select("emp_id");
		$this->db->where('emp_id',$com_empid);
		$query = $this->db->get("pr_emp_resign_history");
		if($query->num_rows() > 0)
		{
			return "Sorry! this employee is already Resigned";
		}
		
					
		$this->db->select("emp_id");
		$this->db->where('emp_id',$com_empid);
		$query = $this->db->get("pr_emp_com_info");
		if($query->num_rows() == 0)
		{
			return "Employee ID does not exist";
		}
		
		$this->db->select("proxi_id");
		$this->db->where('proxi_id',$this->input->post('idcard'));
		$this->db->where('emp_id',$com_empid);
		$query1 = $this->db->get("pr_id_proxi");
		
		$this->db->select("proxi_id");
		$this->db->where('proxi_id',$this->input->post('idcard'));
		$this->db->where('proxi_id !=','');
		$query2 = $this->db->get("pr_id_proxi");
		
		if($query1->num_rows() == 0)
		{
			if($query2->num_rows() > 0)
			{
				return "Sorry! Punch card number already exist";
			}
		}
					
		/*if($this->input->post('idcard') !='')
		{
			$this->db->select('stat_id');
			$this->db->where('stat_type','New');
			$query3 = $this->db->get('pr_emp_status');
			$row = $query3->row();
			$emp_status_new = $row->stat_id;
			$this->input->post('empstat');
			if($emp_status_new == $this->input->post('empstat'))
			{
				$this->db->select('stat_id');
				$this->db->where('stat_type','Probation');
				$query2 = $this->db->get('pr_emp_status');
				$row = $query2->row();
				$emp_status = $row->stat_id;
			}
			else
			{
				$emp_status = $this->input->post('empstat');
			}
		}
		else
		{
			$emp_status = $this->input->post('empstat');
		}*/
		
		$emp_status = $this->input->post('empstat');
		
		$data1 = array(
				'proxi_id'  => $this->input->post('idcard')
		);
		//print_r($data1);
		
		$ejd = $this->input->post('ejd');
		$ejd = date("Y-m-d", strtotime($ejd)); 
		
		$data2 = array(
				'emp_dept_id'  		=> $this->input->post('dept'),
				'emp_sec_id' 		=> $this->input->post('sec'),
				'emp_line_id' 		=> $this->input->post('line'),
				'emp_desi_id'  		=> $this->input->post('desig'),
				'emp_operation_id'  => $this->input->post('operation'),
				'emp_position_id'  	=> $this->input->post('position'),
				'emp_sal_gra_id'	=> $this->input->post('salg'),
				'emp_cat_id'  		=> $emp_status,
				'emp_shift'  		=> $this->input->post('empshift'),
				'gross_sal'  		=> $this->input->post('gsal'),
				'ot_entitle'  		=> $this->input->post('otentitle'),
				'transport'  		=> $this->input->post('transport'),
				'lunch'  			=> $this->input->post('lunch'),
				'att_bonus'  		=> $this->input->post('attbonus'),
				'emp_join_date'		=> $ejd,
				'salary_draw'		=> $this->input->post('saldraw'),
				'salary_type'		=> $this->input->post('saltype')
		);
		
		//print_r($data2);
		if($emp_status == 3)
		{
			$date = date("Y-m-d");
			$data3 = array(
				'emp_id'  	=> $com_empid,
				'left_date' 		=> $date
				);
			//print_r($data3);
			$this->db->insert('pr_emp_left_history', $data3);
			
		}
		if($emp_status == 4)
		{
			$date = date("Y-m-d");
			$data4 = array(
				'emp_id'  	=> $com_empid,
				'resign_date' 		=> $date
				);
			//print_r($data4);
			$this->db->insert('pr_emp_resign_history', $data4);
			
		}
					
		$this->db->where('emp_id',$com_empid);
		$this->db->update('pr_id_proxi', $data1);
		
		$this->db->where('emp_id',$com_empid);
		if($this->db->update('pr_emp_com_info', $data2))
		{
			return "Employee's company info Edited Successfully";
		} 
		else
		{
			return "FAILED";
		}
}
	
	function com_info_delete()
	{	
			$com_empid = $this->input->post('com_empid');
			
			$this->db->where('emp_id',$com_empid);
			$this->db->delete('pr_id_proxi');
			
			$this->db->where('emp_id',$com_empid);
			if($this->db->delete('pr_emp_com_info'))
			{
				return "Employee's company info Deleted Successfully";
			} 
			else
			{
				return "FAILED";
			}
	}
	
	function com_info_search()
	{
		
		$emp_id = $this->input->post('empid');

		$this->db->select('pr_emp_com_info.emp_id as emp_id,pr_id_proxi.proxi_id as proxi_id,pr_dept.dept_name as dept_name,pr_section.sec_name as sec_name,pr_line_num.line_name as line_name,pr_designation.desig_name as desig_name, pr_emp_operation.ope_name as ope_name, pr_emp_position.posi_name as posi_name, pr_grade.gr_name as gr_name,pr_emp_status.stat_type as stat_type, pr_emp_com_info.gross_sal as gross_sal, pr_emp_com_info.emp_join_date as emp_join_date,pr_emp_com_info.ot_entitle as ot_entitle,pr_emp_com_info.transport as transport,pr_emp_com_info.lunch as lunch,pr_emp_com_info.att_bonus as att_bonus, pr_emp_com_info.salary_draw as salary_draw, pr_emp_com_info.salary_type as salary_type, pr_emp_shift.shift_name as shift_name');
		$this->db->from('pr_emp_com_info');
		$this->db->from('pr_id_proxi');
		$this->db->from('pr_dept');
		$this->db->from('pr_section');
		$this->db->from('pr_line_num');
		$this->db->from('pr_designation');
		$this->db->from('pr_emp_operation');
		$this->db->from('pr_emp_position');
		$this->db->from('pr_grade');
		$this->db->from('pr_emp_status');
		$this->db->from('pr_emp_shift');
		$where = "pr_emp_com_info.emp_id = '$emp_id'  and pr_emp_com_info.emp_id = pr_id_proxi.emp_id and pr_emp_com_info.emp_dept_id = pr_dept.dept_id and pr_emp_com_info.emp_sec_id = pr_section.sec_id and pr_emp_com_info.emp_line_id = pr_line_num.line_id and pr_emp_com_info.emp_desi_id = pr_designation.desig_id and pr_emp_com_info.emp_operation_id = pr_emp_operation.ope_id and pr_emp_com_info.emp_position_id = pr_emp_position.posi_id and pr_emp_com_info.emp_sal_gra_id = pr_grade.gr_id and pr_emp_com_info.emp_cat_id = pr_emp_status.stat_id and pr_emp_shift.shift_id = pr_emp_com_info.emp_shift";
		
		$this->db->where($where);
		$query = $this->db->get();
		
		echo $this->db->last_query();
		//print_r($query->result());
		$this->db->select('*');
		$this->db->where('emp_id',$emp_id);
		$query1 = $this->db->get('pr_emp_com_info');
		
		
		if($query1->num_rows() > 0 )
		{
			foreach ($query->result() as $row)
			{
				$ejd = $row->emp_join_date;
				$ejd = date("d-m-Y", strtotime($ejd)); 
				
				$data = array(
						'emp_id'		=> $row->emp_id,
						'proxi_id'  	=> $row->proxi_id,
						'dept_name'  	=> $row->dept_name,
						'sec_name' 		=> $row->sec_name,
						'line_name' 	=> $row->line_name,
						'desig_name'  	=> $row->desig_name,
						'ope_name'  	=> $row->ope_name,
						'posi_name'  	=> $row->posi_name,
						'gr_name'  		=> $row->gr_name,
						'stat_type'  	=> $row->stat_type,
						'shift_name'  	=> $row->shift_name,
						'gross_sal'  	=> $row->gross_sal,
						'ot_entitle'  	=> $row->ot_entitle,
						'transport'  	=> $row->transport,
						'lunch'  		=> $row->lunch,
						'att_bonus'  	=> $row->att_bonus,
						'emp_join_date'	=> $ejd,
						'salary_draw'	=> $row->salary_draw,
						'salary_type'	=> $row->salary_type
				);
				 
			}
			//return $data;
			//print_r($data);
			
			//GET DEPARTMENT ID BY EMP ID
			$this->db->select('emp_dept_id');
			$this->db->where('emp_id',$emp_id);
			$query2 = $this->db->get('pr_emp_com_info');
			$row = $query2->row();
			$dept_id = $row->emp_dept_id;
   			//END
			
			
			$com_info = implode('=*=', $data);
			$dept_id_name = $this->dept();	
			
			$sec_id_name = $this->dept_search($dept_id);
			$line_id_name = $this->section_search();
			$desig_id_name = $this->desig_search($dept_id);
			$operation_id_name = $this->operation();
			$position_id_name = $this->position();
			$salg_id_name = $this->grade_search();
			$empstat_id_name = $this->empstat_search();
			$attbonus_id_name = $this->attbonus_search();
			$shift_id_name = $this->shift_search();
			
			
return $alldata = "$com_info-*-$dept_id_name-*-$sec_id_name-*-$line_id_name-*-$desig_id_name-*-$operation_id_name-*-$position_id_name-*-$salg_id_name-*-$empstat_id_name-*-$shift_id_name-*-$attbonus_id_name";
			
			//echo json_encode($data);
		}
		else
		{
			echo "Employee ID does not exist";
		}
	}
	

	function dept_search($dept_id)
	{
	/*	if(!$this->input->post('dept'))
		{
			$dept_id = $dept_id;
		}
		else
		{
			$dept_id = $this->input->post('dept');
		}*/
		$this->db->select('pr_section.sec_id,pr_section.sec_name');
		$this->db->from('pr_section');
		//$this->db->join('pr_dept', 'pr_dept.dept_id = pr_section.dept_id');
		//$this->db->where('pr_section.dept_id',$dept_id);
		
		$query = $this->db->get();
		//echo $this->db->last_query();
		//print_r($query->result());
		$data1 = array();
		$data2 = array();
		foreach ($query->result() as $row)
		{
			$data1[] = $row->sec_id;
			$data2[] = $row->sec_name;
			
		}
		$sec_id = implode('***', $data1);
		$sec_name = implode('***', $data2);
		
		return $sec_id_name = "$sec_id===$sec_name";

	}
	





//-----------------------------------

	function com_info_search1($emp_id)
	{
		
		
		
		//$emp_id = $this->input->post('empid');

		$this->db->select('pr_emp_com_info.emp_id as emp_id,pr_id_proxi.proxi_id as proxi_id,pr_dept.dept_name as dept_name,pr_section.sec_name as sec_name,pr_line_num.line_name as line_name,pr_designation.desig_name as desig_name, pr_emp_operation.ope_name as ope_name, pr_emp_position.posi_name as posi_name, pr_grade.gr_name as gr_name,pr_emp_status.stat_type as stat_type, pr_emp_com_info.gross_sal as gross_sal, pr_emp_com_info.emp_join_date as emp_join_date,pr_emp_com_info.ot_entitle as ot_entitle,pr_emp_com_info.transport as transport,pr_emp_com_info.lunch as lunch,pr_emp_com_info.att_bonus as att_bonus, pr_emp_com_info.salary_draw as salary_draw, pr_emp_com_info.salary_type as salary_type, pr_emp_shift.shift_name as shift_name');
		//$this->db->select('pr_emp_com_info.emp_id as emp_id,pr_id_proxi.proxi_id as proxi_id,pr_dept.dept_name as dept_name,pr_section.sec_name as sec_name,pr_line_num.line_name as line_name,pr_designation.desig_name as desig_name');
		$this->db->from('pr_emp_com_info');
		$this->db->from('pr_id_proxi');
		$this->db->from('pr_dept');
		$this->db->from('pr_section');
		$this->db->from('pr_line_num');
		$this->db->from('pr_designation');
		$this->db->from('pr_emp_operation');
		$this->db->from('pr_emp_position');
		$this->db->from('pr_grade');
		$this->db->from('pr_emp_status');
		$this->db->from('pr_emp_shift');
		$where = "pr_emp_com_info.emp_id = '$emp_id'  and pr_emp_com_info.emp_id = pr_id_proxi.emp_id and pr_emp_com_info.emp_dept_id = pr_dept.dept_id and pr_emp_com_info.emp_sec_id = pr_section.sec_id and pr_emp_com_info.emp_line_id = pr_line_num.line_id and pr_emp_com_info.emp_desi_id = pr_designation.desig_id and pr_emp_com_info.emp_operation_id = pr_emp_operation.ope_id and pr_emp_com_info.emp_position_id = pr_emp_position.posi_id and pr_emp_com_info.emp_sal_gra_id = pr_grade.gr_id and pr_emp_com_info.emp_cat_id = pr_emp_status.stat_id and pr_emp_shift.shift_id = pr_emp_com_info.emp_shift";
	//$where = "pr_emp_com_info.emp_id = '$emp_id'  and pr_emp_com_info.emp_id = pr_id_proxi.emp_id and pr_emp_com_info.emp_dept_id = pr_dept.dept_id and pr_emp_com_info.emp_sec_id = pr_section.sec_id and pr_emp_com_info.emp_line_id = pr_line_num.line_id and pr_emp_com_info.emp_desi_id = pr_designation.desig_id";	
		$this->db->where($where);
		$query = $this->db->get();
		
		//echo $this->db->last_query();
		//print_r($query->result());
		$this->db->select('*');
		$this->db->where('emp_id',$emp_id);
		$query1 = $this->db->get('pr_emp_com_info');
		//echo $query->num_rows();
		
		if($query1->num_rows() > 0 )
		{
			foreach ($query->result() as $row)
			{
				$ejd = $row->emp_join_date;
				$ejd = date("d-m-Y", strtotime($ejd)); 
				
				$data = array(
						'emp_id'		=> $row->emp_id,
						'proxi_id'  	=> $row->proxi_id,
						'dept_name'  	=> $row->dept_name,
						'sec_name' 		=> $row->sec_name,
						'line_name' 	=> $row->line_name,
						'desig_name'  	=> $row->desig_name,
						'ope_name'  	=> $row->ope_name,
						'posi_name'  	=> $row->posi_name,
						'gr_name'  		=> $row->gr_name,
						'stat_type'  	=> $row->stat_type,
						'shift_name'  	=> $row->shift_name,
						'gross_sal'  	=> $row->gross_sal,
						'ot_entitle'  	=> $row->ot_entitle,
						'transport'  	=> $row->transport,
						'lunch'  		=> $row->lunch,
						'att_bonus'  	=> $row->att_bonus,
						'emp_join_date'	=> $ejd,
						'salary_draw'	=> $row->salary_draw,
						'salary_type'	=> $row->salary_type
				);
				 
			}
			//return $data;
			//print_r($data);
			
			//GET DEPARTMENT ID BY EMP ID
			$this->db->select('emp_dept_id');
			$this->db->where('emp_id',$emp_id);
			$query2 = $this->db->get('pr_emp_com_info');
			$row = $query2->row();
			$dept_id = $row->emp_dept_id;
   			//END
			
			
			$com_info = implode('=*=', $data);
			
			//echo $com_info;
			
			$this->db->select('pr_emp_com_info.emp_id as empid,pr_emp_add.*,pr_emp_edu.* ,pr_emp_per_info.*,pr_emp_skill.*');
			$this->db->from('pr_emp_com_info');
			$this->db->from('pr_emp_add');
			$this->db->from('pr_emp_edu');
			$this->db->from('pr_emp_per_info');
			$this->db->from('pr_emp_skill');
			$where = "pr_emp_com_info.emp_id = '$emp_id' and pr_emp_com_info.emp_id =pr_emp_add.emp_id and pr_emp_com_info.emp_id  = pr_emp_edu.emp_id and pr_emp_com_info.emp_id = pr_emp_per_info.emp_id and pr_emp_com_info.emp_id = pr_emp_skill.emp_id";
		
			$this->db->where($where);
			$query4 = $this->db->get();
			foreach ($query4->result() as $row)
			{
				$emp_dob = $row->emp_dob;
				$emp_dob = date("d-m-Y", strtotime($emp_dob)); 
				
				$data2 = array(
						'emp_id'				=> $row->emp_id,
						'emp_pre_add'  			=> $row->emp_pre_add,
						'emp_par_add'  			=> $row->emp_par_add,
						
						
						'emp_degree' 			=> $row->emp_degree,
						'emp_pass_yr'  			=> $row->emp_pass_yr,
						'emp_ins'  				=> $row->emp_ins,
						
						'emp_skill'  			=> $row->emp_skill,
						'emp_yr_skill'  		=> $row->emp_yr_skill,
						'emp_com_name'  		=> $row->emp_com_name,
						
						
						'emp_full_name'  		=> $row->emp_full_name,
						'emp_fname'  			=> $row->emp_fname,
						'emp_mname'  			=> $row->emp_mname,
						'emp_dob'  				=> $emp_dob,
						'emp_religion'  		=> $row->emp_religion,
						'emp_sex'  				=> $row->emp_sex,
						'emp_marital_status'  	=> $row->emp_marital_status,
						'emp_blood'  			=> $row->emp_blood ,
						'img_source'  			=> $row->img_source,
						'bangla_nam'  		    => $row->bangla_nam,
						'id_skill'  			=> $row->id
						
				);
				 
			}
			
			$other_info = implode('=*=', $data2);
		//print_r($data2);
				
			$dept_id_name = $this->dept();	
			$sec_id_name = $this->dept_search($dept_id);
			$line_id_name = $this->section_search();
			$desig_id_name = $this->desig_search($dept_id);
			$operation_id_name = $this->operation();
			$position_id_name = $this->position();
			$salg_id_name = $this->grade_search();
			$empstat_id_name = $this->empstat_search();
			$attbonus_id_name = $this->attbonus_search();
			$shift_id_name = $this->shift_search();
			
			
return $alldata = "$other_info-*-$com_info-*-$dept_id_name-*-$sec_id_name-*-$line_id_name-*-$desig_id_name-*-$operation_id_name-*-$position_id_name-*-$salg_id_name-*-$empstat_id_name-*-$shift_id_name-*-$attbonus_id_name";
			
			//echo json_encode($data);
		}
		else
		{
			echo "Employee ID does not exist";
		}
	
	}
	
//---------------------------
	function com_incre_prom_search()
{
			
		$emp_id = $this->input->post('empid');

		$this->db->select('pr_emp_com_info.emp_id as emp_id,pr_dept.dept_name as dept_name,pr_section.sec_name as sec_name,pr_line_num.line_name as line_name,pr_designation.desig_name as desig_name, pr_emp_operation.ope_name as ope_name, pr_emp_position.posi_name as posi_name, pr_grade.gr_name as gr_name,pr_emp_status.stat_type as stat_type, pr_emp_com_info.gross_sal as gross_sal, pr_emp_com_info.emp_join_date as emp_join_date,pr_emp_com_info.ot_entitle as ot_entitle,pr_emp_com_info.transport as transport,pr_emp_com_info.lunch as lunch,pr_emp_com_info.att_bonus as att_bonus, pr_emp_com_info.salary_draw as salary_draw, pr_emp_com_info.salary_type as salary_type, pr_emp_shift.shift_name as shift_name');
		$this->db->from('pr_emp_com_info');
		//$this->db->from('pr_id_proxi');
		$this->db->from('pr_dept');
		$this->db->from('pr_section');
		$this->db->from('pr_line_num');
		$this->db->from('pr_designation');
		$this->db->from('pr_emp_operation');
		$this->db->from('pr_emp_position');
		$this->db->from('pr_grade');
		$this->db->from('pr_emp_status');
		$this->db->from('pr_emp_shift');
		$where = "pr_emp_com_info.emp_id = '$emp_id'  and pr_emp_com_info.emp_dept_id = pr_dept.dept_id and pr_emp_com_info.emp_sec_id = pr_section.sec_id and pr_emp_com_info.emp_line_id = pr_line_num.line_id and pr_emp_com_info.emp_desi_id = pr_designation.desig_id and pr_emp_com_info.emp_operation_id = pr_emp_operation.ope_id and pr_emp_com_info.emp_position_id = pr_emp_position.posi_id and pr_emp_com_info.emp_sal_gra_id = pr_grade.gr_id and pr_emp_com_info.emp_cat_id = pr_emp_status.stat_id and pr_emp_shift.shift_id = pr_emp_com_info.emp_shift";
		
		$this->db->where($where);
		$query = $this->db->get();
		
		//echo $this->db->last_query();
		//print_r($query->result());
		$this->db->select('*');
		$this->db->where('emp_id',$emp_id);
		$query1 = $this->db->get('pr_emp_com_info');
		
		
		if($query1->num_rows() > 0 )
		{
			foreach ($query->result() as $row)
			{
				$ejd = $row->emp_join_date;
				//echo $row->gross_sal;
				$ejd = date("d-m-Y", strtotime($ejd)); 
				
				$data = array(
						'emp_id'		=> $row->emp_id,
						'proxi_id'  	=> "proxi",
						'dept_name'  	=> $row->dept_name,
						'sec_name' 		=> $row->sec_name,
						'line_name' 	=> $row->line_name,
						'desig_name'  	=> $row->desig_name,
						'ope_name'  	=> $row->ope_name,
						'posi_name'  	=> $row->posi_name,
						'gr_name'  		=> $row->gr_name,
						'stat_type'  	=> $row->stat_type,
						'shift_name'  	=> $row->shift_name,
						'gross_sal'  	=> $row->gross_sal,
						'ot_entitle'  	=> $row->ot_entitle,
						'transport'  	=> $row->transport,
						'lunch'  		=> $row->lunch,
						'att_bonus'  	=> $row->att_bonus,
						'emp_join_date'	=> $ejd,
						'salary_draw'	=> $row->salary_draw,
						'salary_type'	=> $row->salary_type
				);
				 
			}
			//return $data;
			//print_r($data);
			
			//GET DEPARTMENT ID BY EMP ID
			$this->db->select('emp_dept_id');
			$this->db->where('emp_id',$emp_id);
			$query2 = $this->db->get('pr_emp_com_info');
			$row = $query2->row();
			$dept_id = $row->emp_dept_id;
   			//END
			
			
			$com_info = implode('=*=', $data);
			
			
			
				
			$dept_id_name = $this->dept();	
			$sec_id_name = $this->dept_search($dept_id);
			$line_id_name = $this->section_search();
			$desig_id_name = $this->desig_search($dept_id);
			$operation_id_name = $this->operation();
			$position_id_name = $this->position();
			$salg_id_name = $this->grade_search();
			$empstat_id_name = $this->empstat_search();
			$attbonus_id_name = $this->attbonus_search();
			$shift_id_name = $this->shift_search();
			
			
return $alldata = "$com_info-*-$dept_id_name-*-$sec_id_name-*-$line_id_name-*-$desig_id_name-*-$operation_id_name-*-$position_id_name-*-$salg_id_name-*-$empstat_id_name-*-$shift_id_name-*-$attbonus_id_name";
			
			//echo json_encode($data);
		}
		else
		{
			echo "Employee ID does not exist";
		}
}
		
	function desig_search($dept_id)
	{
		/*if(!$this->input->post('dept'))
		{
			$dept_id = $dept_id;
		}
		else
		{
			$dept_id = $this->input->post('dept');
		}*/
		$this->db->select('desig_id,desig_name');
		$this->db->from('pr_designation');
		//$this->db->where('dept_id',$dept_id);
				
		$query = $this->db->get();
		//echo $this->db->last_query();
		//print_r($query->result());
		$data1 = array();
		$data2 = array();
		foreach ($query->result() as $row)
		{
			$data1[] = $row->desig_id;
			$data2[] = $row->desig_name;
			
		}
		$line_id = implode('***', $data1);
		$line_name = implode('***', $data2);
		
		return $line_id."===".$line_name;

	}
	

	

	
	
	function empshift_search()
	{
		$this->db->select('shift_id,shift_name');
		$this->db->from('pr_emp_shift');
						
		$query = $this->db->get();
		//echo $this->db->last_query();
		//print_r($query->result());
		$data1 = array();
		$data2 = array();
		foreach ($query->result() as $row)
		{
			$data1[] = $row->shift_id;
			$data2[] = $row->shift_name;
			
		}
		$shift_id = implode('***', $data1);
		$shift_name = implode('***', $data2);
		
		return $shift_id."===".$shift_name;

	}
	
	function attbonus_search()
	{
		$this->db->select('ab_id,ab_rule_name');
		$this->db->from('pr_attn_bonus');
						
		$query = $this->db->get();
		//echo $this->db->last_query();
		//print_r($query->result());
		$data1 = array();
		$data2 = array();
		foreach ($query->result() as $row)
		{
			$data1[] = $row->ab_id;
			$data2[] = $row->ab_rule_name;
			
		}
		$ab_id = implode('***', $data1);
		$ab_rule_name = implode('***', $data2);
		
		return $ab_id."===".$ab_rule_name;

	}
	
	//===================================sayed==========================
	
		function edu_skill_insert()
		{
			$this->db->select('emp_id');
			$this->db->where('emp_id',$this->input->post('edu_empid'));
			$query1 = $this->db->get('pr_emp_edu');
			$num_rows1 = $query1->num_rows(); 
		
		
			$this->db->select('emp_id');
			$this->db->where('emp_id',$this->input->post('edu_empid'));
			$query2 = $this->db->get('pr_emp_skill');
			$num_rows2 = $query2->num_rows();
						
			$this->db->select('emp_id');
			$this->db->where('emp_id',$this->input->post('edu_empid'));
			$query3 = $this->db->get('pr_emp_com_info');
			$num_rows3 = $query3->num_rows();
			
			if( $num_rows3 > 0)
			{
				if( $num_rows1 >0 and $num_rows2 >0 )
				{
					return "Sorry! Change your employee ID.";
				}
				else
				{
					 $data_edu = array(
							'emp_id'	=> $this->input->post('edu_empid'),
							'emp_degree'  => $this->input->post('edu_last_dg'),
							'emp_pass_yr' => $this->input->post('edu_pass_year'),
							'emp_ins' => $this->input->post('edu_istitute')
						);
					$data_skill = array(
							'emp_id'	=> $this->input->post('edu_empid'),
							'emp_skill'  => $this->input->post('edu_skil_dept'),
							'emp_yr_skill' => $this->input->post('edu_skill_year'),
							'emp_com_name' => $this->input->post('edu_skill_company')
						);
			
				
				if (($this->db->insert('pr_emp_edu', $data_edu)) and ($this->db->insert('pr_emp_skill', $data_skill)))
					{
						return "Inserted Successfully";
					} 
					else
					{
						return "FAILED";
					}
				}
			}
			else
			{
				return "Please insert employee's personal and company information first";
			}		  
	
	}
	
	
		//-----------------------edu delete----------------------------
	function edu_deletedb()
	{
		$id=$this->input->post('edu_empid');
		
		$this->db->where('emp_id',$id);
		$data=$this->db->delete('pr_emp_edu');
		
		
		$this->db->where('emp_id',$id);
		$data=$this->db->delete('pr_emp_skill');
		
		
		if ($data)
		{
			echo "Delete successfully";
	 	} 
	 	else
		{
			echo "Delete failed";
	}
	
	
	}
	//-------------------------end------------------------------------
	
		
	function com_insertdb()
	{	
		
		$this->db->select('emp_id');
		$this->db->where('emp_id',$this->input->post('com_empid'));
		$query = $this->db->get('pr_emp_com_info');
		$num_rows = $query->num_rows(); 
		
		if( $num_rows > 0)
		{
			return "Sorry! Change your employee ID.";
		}
		else
		{
		
			$data1 = array(
					'emp_id'	=> $this->input->post('com_empid'),
					'proxi_id'  => $this->input->post('idcard')
			);
			
			$data2 = array(
					'emp_id'	=> $this->input->post('com_empid'),
					'emp_dept_id'  => $this->input->post('dept'),
					'emp_sec_id' => $this->input->post('sec'),
					'emp_line_id' => $this->input->post('line'),
					'emp_desi_id'  	=> $this->input->post('desig'),
					'emp_sal_gra_id'  => $this->input->post('salg'),
					'emp_cat_id'  	=> $this->input->post('empcat'),
					'emp_join_date'=> $this->input->post('ejd')
			);
			
			if($this->db->insert('pr_id_proxi', $data1) and $this->db->insert('pr_emp_com_info', $data2))
			{
				return "Employee's personel info inserted Successfully";
			} 
			else
			{
				return "FAILED";
			}
		}
		
	
	}
	
	//---------------------------------edu update----------------------------
	function update_edu_db()
	{
		 $id=$this->input->post('edu_empid');
		 $this->db->select("emp_id");
		 $this->db->where("emp_id",$id);
		 $query = $this->db->get("pr_emp_com_info");
		 
		 if( $query->num_rows() > 0)
		 {
			 $data_edu = array(
						'emp_id'	=> $this->input->post('edu_empid'),
						'emp_degree'  => $this->input->post('edu_last_dg'),
						'emp_pass_yr' => $this->input->post('edu_pass_year'),
						'emp_ins' => $this->input->post('edu_istitute')
					);
			 $data_skill = array(
						'emp_id'	=> $this->input->post('edu_empid'),
						'emp_skill'  => $this->input->post('edu_skil_dept'),
						'emp_yr_skill' => $this->input->post('edu_skill_year'),
						'emp_com_name' => $this->input->post('edu_skill_company')
					);
		
							
				$this->db->where('emp_id',$id);
				$this->db->update('pr_emp_skill', $data_skill);
				
				$this->db->where('emp_id',$id);
				if ($this->db->update('pr_emp_edu', $data_edu))
				{
					echo "Employee info edit Successfully";
				}
				else
				{
					echo "Update failed";
				}
			}
			else
			{
				echo "Employee ID does not exist";
			}
	
	}
	//------------------------------------end---------------------------------
	
	
		function search_edu_sk()
		{
		
		$this->db->select('pr_emp_edu.*,pr_emp_skill.*');
		$this->db->from('pr_emp_edu');
		$this->db->join('pr_emp_skill', 'pr_emp_skill.emp_id = pr_emp_edu.emp_id');
		$this->db->where('pr_emp_edu.emp_id',$this->input->post('edu_empid'));
		$query = $this->db->get();
		
		if( $num_rows = $query->num_rows() !=0 )
		{
			foreach ($query->result() as $row)
			{
				$data = array(
						'emp_id'	=> $row->emp_id,
						'emp_degree'  => $row->emp_degree,
						'emp_pass_yr' => $row->emp_pass_yr,
						'emp_ins' => $row->emp_ins,
						'emp_skill'  	=> $row->emp_skill,
						'emp_yr_skill'  => $row->emp_yr_skill,
						'emp_com_name'  	=> $row->emp_com_name
				);
				 
			}
			
			//return $data;
			//print_r($data);
			echo $data['emp_id']."-*-".$data['emp_degree']."-*-".$data['emp_pass_yr']."-*-".$data['emp_ins']."-*-".$data['emp_skill']."-*-".$data['emp_yr_skill']."-*-".$data['emp_com_name'];
			
			//echo json_encode($data);
		}
		else
		{
			echo "Employee does not exist";
		}		
	}
	
	//----------------------------------------------------grade insert---------------------------
	function grade_dbinsert()
	{
		
	 	$this->db->select('gr_name');
		$this->db->where('gr_name',$this->input->post('gr_name'));
		$query = $this->db->get('pr_grade');
		$num_rows = $query->num_rows(); 
		
		if( $num_rows > 0)
		{
			return "Sorry! Duplicate Grade Name not allow";
		}
		else
		{
		 	$data = array(
					'gr_name'	=> $this->input->post('gr_name'),
					'gr_str_basic'  => $this->input->post('gr_str_basic'),
					'gr_end_basic' => $this->input->post('gr_end_basic'),
					'gr_incr1' => $this->input->post('gr_incr1'),
					'gr_1st_phase'  	=> $this->input->post('gr_1st_phase'),
					'gr_incr2'  => $this->input->post('gr_incr2'),
					'gr_2nd_phase'  	=> $this->input->post('gr_2nd_phase'),
	    	);
			
			if($this->db->insert('pr_grade', $data))
			{
				return "Inserted Successfully";
			} 
			else
			{
				return "FAILED";
			}
		}
		
	
	
	}
	
	
	
	function update_grade_db()
	{
		$this->db->select('gr_id');
		$this->db->where('gr_name ',$this->input->post('gr_name '));
		$query = $this->db->get('pr_grade');
		foreach ($query->result() as $row)
		{
   		  $id=$row->gr_id;
		}
		
		$data = array(
					'gr_name'  => $this->input->post('gr_name'),
					'gr_str_basic' => $this->input->post('gr_str_basic'),
					'gr_end_basic' => $this->input->post('gr_end_basic'),
					'gr_incr1'  	=> $this->input->post('gr_incr1'),
					'gr_1st_phase'  => $this->input->post('gr_1st_phase'),
					'gr_incr2'  	=> $this->input->post('gr_incr2'),
					'gr_2nd_phase'=> $this->input->post('gr_2nd_phase')
			);
			
			$this->db->where('gr_id',$id);
			if($this->db->update('pr_grade', $data)) 
			{
				echo "Updated successfully";
			}
			else
			{
				echo "Update failed";
			}
		
		
		
	}
	
	function grade_db_search()
	{
		$this->db->where('gr_name',$this->input->post('gr_name'));
		$query = $this->db->get('pr_grade');
		
		foreach ($query->result() as $row)
		{
			$data = array(
					'gr_id'	=> $row->gr_id,
					'gr_name'	=> $row->gr_name,
					'gr_str_basic'  => $row->gr_str_basic,
					'gr_end_basic' => $row->gr_end_basic,
					'gr_incr1' => $row->gr_incr1,
					'gr_1st_phase'  	=> $row->gr_1st_phase,
					'gr_incr2'  => $row->gr_incr2,
					'gr_2nd_phase'  	=> $row->gr_2nd_phase
					
			);
			 
		}
		
echo $data['gr_id']."-*-".$data['gr_name']."-*-".$data['gr_str_basic']."-*-".$data['gr_end_basic']."-*-".$data['gr_incr1']."-*-".$data['gr_1st_phase']."-*-".$data['gr_incr2']."-*-".$data['gr_2nd_phase'];
		
	
	}
	
	function grade_deletedb()
	{
		$gr_name=$this->input->post('gr_name');
		
		$this->db->where('gr_name',$gr_name);
		$data=$this->db->delete('pr_grade');
				
		if ($data)
		{
			echo "Delete successfully";
	 	} 
	 	else
		{
			echo "Delete failed";
		}
	}
	
	
		//-------------------------insert department----------------
	function department_dbinsert()
	{
		$dpt_name=$this->input->post('dpt_name');
		$this->db->select('dept_name');
		$this->db->where('dept_name',$dpt_name);
		$query = $this->db->get('pr_dept');
		$num_rows = $query->num_rows(); 
		
		if( $num_rows > 0)
		{
			return "Sorry! Duplicate Department Name not allow";
		}
		else
		{
			$data = array('dept_name' => $dpt_name);
			
			if($this->db->insert('pr_dept', $data))
			{
					//------------select all dept name------
					
					$this->db->select('dept_id,dept_name');
					$this->db->from('pr_dept');
					$query = $this->db->get();
		     		$data1 = array();
					$data2 = array();
					foreach ($query->result() as $row)
					{
						$data1[] = $row->dept_id;
						$data2[] = $row->dept_name;
			
					}
					$line_id = implode('***', $data1);
					$line_name = implode('***', $data2);
		
					echo $line_id."===".$line_name;
					
				} 
			else
			{
				return "FAILED";
			}
		}
	}
	
	
	
	function late_db_find($start_date,$end_date)
	{
	
		$start_time = "08:05:00";
		$end_time = "09:00:00";
		$this->db->select('date_time');
		$this->db->from('att_2011');
		$query = $this->db->get();
		foreach($query->result() as $rows)
		{
			//echo "time".$time=trim(substr($rows->date_time,10));
			//echo "date".$date=trim(substr($rows->date_time,0,10));
			$this->db->select('att_2011.proxi_id,pr_id_proxi.emp_id,pr_emp_per_info.emp_full_name,pr_section.sec_name,pr_line_num.line_name,pr_designation.desig_name,att_2011.date_time');
		$this->db->from('att_2011');
		$this->db->from('pr_id_proxi');
		$this->db->from('pr_emp_per_info');
		$this->db->from('pr_emp_com_info');
		$this->db->from('pr_section');
		$this->db->from('pr_designation');
		$this->db->from('pr_dept');
		$this->db->from('pr_line_num');
		//$start_date = "$start_date 08:05:00";
		//$end_date = "$end_date 09:00:00";
$where="att_2011.proxi_id = pr_id_proxi.proxi_id and pr_id_proxi.emp_id = pr_emp_per_info.emp_id and pr_emp_per_info.emp_id = pr_emp_com_info.emp_id  and pr_emp_com_info.emp_sec_id = pr_section.sec_id and pr_emp_com_info.emp_desi_id = pr_designation.desig_id and pr_emp_com_info.emp_dept_id = pr_dept.dept_id and pr_emp_com_info.emp_line_id = pr_line_num.line_id and  trim(substr(att_2011.date_time,1,10)) NOT BETWEEN '$start_date' and '$end_date' ";
		

//$where="att_2011.proxi_id = pr_id_proxi.proxi_id and pr_id_proxi.emp_id = pr_emp_per_info.emp_id and pr_emp_per_info.emp_id = pr_emp_com_info.emp_id  and //pr_emp_com_info.emp_sec_id = pr_section.sec_id and pr_emp_com_info.emp_desi_id = pr_designation.desig_id and pr_emp_com_info.emp_dept_id = pr_dept.dept_id and //pr_emp_com_info.emp_line_id = pr_line_num.line_id and  trim(substr(att_2011.date_time,1,10))  BETWEEN '$start_date' and '$end_date' and trim(substr(att_2011.date_time,11))  >  //'$end_time'";

		
		$this->db->where($where);
		$query = $this->db->get();
		//echo $this->db->last_query();
    	return $query->result();
		}
	
	
	//
//		$this->db->select('date_time');
//		$this->db->from('att_2011');
//		$query = $this->db->get();
//		foreach($query->result() as $rows)
//		{
//			//echo "time".$time=trim(substr($rows->date_time,10));
//			//echo "date".$date=trim(substr($rows->date_time,0,10));
//			$this->db->select('att_2011.proxi_id,pr_id_proxi.emp_id,pr_emp_per_info.emp_full_name,pr_section.sec_name,pr_line_num.line_name,pr_designation.desig_name,att_2011.date_time');
//		$this->db->from('att_2011');
//		$this->db->from('pr_id_proxi');
//		$this->db->from('pr_emp_per_info');
//		$this->db->from('pr_emp_com_info');
//		$this->db->from('pr_section');
//		$this->db->from('pr_designation');
//		$this->db->from('pr_dept');
//		$this->db->from('pr_line_num');
//		
//		if($start_date == $end_date)
//		{
//			//echo "equal";
//			$start_date = "$start_date 08:05:00";
//			$end_date = "$end_date 09:00:00";
//		$where="att_2011.proxi_id = pr_id_proxi.proxi_id and pr_id_proxi.emp_id = pr_emp_per_info.emp_id and pr_emp_per_info.emp_id = pr_emp_com_info.emp_id  and pr_emp_com_info.emp_sec_id = pr_section.sec_id and pr_emp_com_info.emp_desi_id = pr_designation.desig_id and pr_emp_com_info.emp_dept_id = pr_dept.dept_id and pr_emp_com_info.emp_line_id = pr_line_num.line_id and att_2011.date_time BETWEEN '$start_date' and '$end_date'";
//		}
//		else
//		{
//			//echo "Not equal";
//		    $start_time = "08:05:00";
//			$end_time = "09:00:00";
//			
//		$where="att_2011.proxi_id = pr_id_proxi.proxi_id and pr_id_proxi.emp_id = pr_emp_per_info.emp_id and pr_emp_per_info.emp_id = pr_emp_com_info.emp_id  and pr_emp_com_info.emp_sec_id = pr_section.sec_id and pr_emp_com_info.emp_desi_id = pr_designation.desig_id and pr_emp_com_info.emp_dept_id = pr_dept.dept_id and pr_emp_com_info.emp_line_id = pr_line_num.line_id  and  trim(substr(att_2011.date_time,1,10)) BETWEEN '$start_date' and '$end_date' and trim(substr(att_2011.date_time,11)) BETWEEN '$start_time' and '$end_time'";
//		}
//		$this->db->where($where);
//		$query = $this->db->get();
//		//echo $this->db->last_query();
//    	return $query->result();
//		}
//	
}
	
	//========================START Payscale Sheet Process=================
	
	function pay_sheet($year, $month)
	{
		$year_v=$year;
		$month_v=$month;
		
		$table_name = "att_".$year_v."_".$month_v;
		
		if(!$this->db->table_exists($table_name))
		{
			return "Process month does not exist, please change your process month";
		}
		
		$start_date = date("Y-m-d", mktime(0, 0, 0, $month_v, 1, $year_v));
		$last_date = date("t", mktime(0, 0, 0, $month_v, 1, $year_v));
		
		$end_date = date("Y-m-d", mktime(0, 0, 0, $month_v, $last_date, $year_v));
		
		$year_month = date("Y-m", mktime(0, 0, 0, $month_v, 1, $year_v)); 
		//---5=friday----------------//
		$day_of_week_v=5;   //==== please change this variable $fd = "next Friday"; if you change $day_of_week_v =====//
		
		
		$result=$this-> find_week($year_v,$month_v,$day_of_week_v);
		$no_working_days = $result['no_of_working_days'];
		$num_of_days = $result['num_of_days'];
		
		//$att_register = $this->daily_absent_db($start_date);
		
		
		//print_r($result);
	  
		
		$this->db->select("emp_id,gross_sal,emp_sal_gra_id,emp_desi_id,emp_join_date,salary_type");
		$this->db->order_by("emp_id");
		$query = $this->db->get("pr_emp_com_info");
		
		if($query->num_rows() == 0)
		{
			return "Employee information does not exist";
		}
		else
		{
			//echo "<table border='1' cellpadding='0' cellspacing='0'><th>SL.</th><th>Name</th><th>Emp ID</th><th>Desig</th><th>Join Date</th><th>Basic</th><th>House Rent</th><th>Medical</th><th>Gross</th><th>Total Day</th><th>Present</th><th>LV</th><th>H/W</th><th>Absent</th><th>Pay Days</th><th>Abs. Deduc.</th><th>Basic</th><th>HR</th><th>MA</th><th>Pay Amount</th><th>Att. Bonus</th><th>Trans.</th><th>Lunch</th><th>Others</th><th>Total Allaw.</th>    <th>Total OT Hours</th><th>OT Rate</th><th>Total OT Amount</th><th>Gross Pay</th><th>Adv.</th><th>PF</th><th>Others</th><th>Total Deduction</th><th>PBT</th><th>Tax</th><th>Net Pay</th><th>Signature</th>";
			$serial = 1;
			$data = array();
			foreach($query->result() as $rows)
			{
				/*echo "<tr>";
				echo "<td>";
				echo $serial;
				echo "</td>";*/
				
				set_time_limit(0) ;
				ini_set("memory_limit","512M");
				
				
				$data["emp_id"] = $rows->emp_id;
				//===========================================================production=================================================================================
			//	$emp_production = $this->emp_production($rows->emp_id);
				
			//	$this->emp_production_salary($emp_production,$year, $month);
				
				$emp_name = $this->emp_name($rows->emp_id);
			
				/*echo "<td>";
				echo $emp_name;
				echo "</td>";*/
				
				$emp_id = $rows->emp_id; 
				/*echo "<td>";
				echo $emp_id;
				echo "</td>"; */
				 
				$this->db->select("emp_id");
				$this->db->where("emp_id",$rows->emp_id);
				$query = $this->db->get("pr_pay_scale_sheet");
				
				$emp_desig = $this->emp_desig($rows->emp_desi_id);
				/*echo "<td>";
				echo $emp_desig;
				echo "</td>"; */
				
				$doj =  $rows->emp_join_date;
				/*echo "<td>";
				echo $doj;
				echo "</td>"; */
				//==============================================================================production
				
				
			//	$this->db->select('salary_type');
			//	$this->db->where("emp_id",$emp_id);
			//	$query = $this->db->get("pr_emp_com_info");
				
				
			
			
				//echo "<td>";
				//echo $emp_grade_name;
				//echo "</td>";
				 
				//==================================LOCAL Salary Rule===================================
				$gross_sal = $rows->gross_sal;
				$conveyance = 0;
				$madical_allo = 200;
				$madical_allo_payable = $madical_allo;
				$basic_sal = ($gross_sal - $madical_allo) / 140 * 100;
				$basic_sal = $basic_sal;
				$basic_sal_payable = $basic_sal;
				$house_rent = $basic_sal * 40 / 100;
				$house_rent = $house_rent; 
				$house_rent_payable = $house_rent;
				//==================================LOCAL Salary Rule===================================
				
				
				//echo $rows->emp_id;
				
				//==================================BGMEA Salary Rule===================================
				/*$gross_sal = $rows->gross_sal;
				$basic_sal_payable = ($gross_sal * 60 / 100);
				$house_rent_payable = ($gross_sal * 30 / 100);
				$madical_allo_payable = ($gross_sal * 10 / 100);
				
				
				$basic_sal = round($basic_sal_payable);
				$house_rent = round($house_rent_payable);
				$madical_allo = round($madical_allo_payable);*/
				//==================================BGMEA Salary Rule===================================
				
				
				$total_sal = $basic_sal + $house_rent + $madical_allo; 
				
				$data["basic_sal"] = $basic_sal;
				/*echo "<td>";
				echo $basic_sal;
				echo "</td>"; */
				
				$data["house_r"] = $house_rent;
				/*echo "<td>";
				echo $house_rent;
				echo "</td>"; */
				
				$data["medical_a"] = $madical_allo;
				/*echo "<td>";
				echo $madical_allo;
				echo "</td>";*/
				
				$data["gross_sal"] = $gross_sal;
				/*echo "<td>";
				echo $gross_sal;
				echo "</td>"; */
								
				$data["total_days"] = $num_of_days;
				/*echo "<td>";
				echo $num_of_days;
				echo "</td>"; */
				
				$data["num_of_workday"] = $no_working_days;
				
				$salary_month = trim(substr($start_date,0,7));
				$join_month = trim(substr($doj,0,7));
				//echo "==".trim(substr($doj,8,2));
				if($salary_month == $join_month)
				{
					$search_date = $doj;
				}
				else
				{
					$search_date = $start_date;
				}
				
				$resign_check = $this->resign_check($emp_id, $salary_month);
				
				if($resign_check != false)
				{
					$total_days = $resign_check;
				}
				else
				{
					$total_days = $num_of_days;
				}
				
								
				$attend = "P";
				$attend = $this->attendance_check($rows->emp_id,$attend,$total_days, $search_date);
				
				$data["att_days"] = $attend;
				/*echo "<td>";
				echo $attend;
				echo "</td>";*/
				
				$leave_type = "cl";
				$cas_leave = $this->leave_db($rows->emp_id, $search_date, $end_date, $leave_type);
				$data["c_l"] = $cas_leave;
				/*echo "<td>";
				echo $cas_leave;
				echo "</td>";*/ 
				
				$leave_type = "sl";
				$mad_leave = $this->leave_db($rows->emp_id, $search_date, $end_date, $leave_type);
				$data["s_l"] = $mad_leave;
				/*echo "<td>";
				echo   $mad_leave;
				echo "</td>"; */
				
				$leave_type = "el";
				$other_leave = $this->leave_db($rows->emp_id, $search_date, $end_date, $leave_type);
				$data["e_l"] = $other_leave;
				/*echo "<td>";
				echo $other_leave;
				echo "</td>";*/
				
				$total_leave = $cas_leave + $mad_leave + $other_leave;
				
				/*echo "<td>";
				echo $total_leave;
				echo "</td>";*/
								
				$weeked = "W";
				$weeked = $this->attendance_check($rows->emp_id,$weeked,$total_days, $search_date);
				
				$holiday = "H";
				$holiday = $this->attendance_check($rows->emp_id,$holiday,$total_days, $search_date);
				
				$data["holidy"] = $holiday;
				
				$data["weeked"] = $weeked;
				
				$total_holiday = $weeked + $holiday;
				$data["holiday_or_weeked"] = $total_holiday;
				/*echo "<td>";
				echo $total_holiday;
				echo "</td>";*/
				
				$absent = "A";
				$absent = $this->attendance_check($rows->emp_id,$absent,$total_days, $search_date);
				
				$data["absent_days"] = $absent;
				/*echo "<td>";
				echo $absent;
				echo "</td>";*/
				
				$pay_days = $attend + $total_holiday + $total_leave;
				
				$data["pay_days"] = $pay_days;
				/*echo "<td>";
				echo $pay_days;
				echo "</td>";*/
				//=====Absent Deduction updated by Kamrul on 22-01-2012====== Start				
				if($salary_month == $join_month)
				{
					$deduct = $gross_sal / $num_of_days * $absent;
					$deduct = $deduct;
				}
				else
				{
					$deduct = $basic_sal / $num_of_days * $absent;
					$deduct = $deduct;
				}
				
				$data["abs_deduction"] = $deduct;
				//=====Absent Deduction updated by Kamrul on 22-01-2012====== End
				/*echo "<td>";
				echo $deduct;
				echo "</td>";*/
				
				
				$payable_basic_sal_payable 		= ( (($basic_sal_payable / $num_of_days) * ($pay_days + $absent)) -  $deduct);
				//$payable_basic_sal_payable 		= (($basic_sal_payable / $num_of_days) * $pay_days  );
				$payable_house_rent_payable 	= (($house_rent_payable / $num_of_days) * ($pay_days + $absent)  );
				$payable_madical_allo_payable 	= (($madical_allo_payable / $num_of_days) * ($pay_days + $absent)  );
				
				$payable_basic_sal 		= round($payable_basic_sal_payable);
				$payable_house_rent 	= round($payable_house_rent_payable);
				$payable_madical_allo 	= round($payable_madical_allo_payable);
				
				//$payable_total_sal = $payable_basic_sal_payable + $payable_house_rent_payable + $payable_madical_allo_payable; 
				
				if($salary_month == $join_month or $resign_check != false)
				{
					$payable_total_sal = round($gross_sal / $num_of_days * $pay_days);
				}
				else
				{
					$payable_total_sal = $basic_sal_payable + $house_rent_payable + $madical_allo_payable - $deduct;
				}
				
				$data["payable_basic"] = $payable_basic_sal;
				/*echo "<td>";
				echo $payable_basic_sal;
				echo "</td>";*/
				
				$data["payable_house_rent"] = $payable_house_rent;
				/*echo "<td>";
				echo $payable_house_rent;
				echo "</td>";*/
				
				$data["payable_madical_allo"] = $payable_madical_allo;
				/*echo "<td>";
				echo $payable_madical_allo;
				echo "</td>";*/
				
				$payable_wages = $payable_total_sal;		
				$data["pay_wages"] = $payable_wages;
				/*echo "<td>";
				echo $payable_wages;
				echo "</td>";*/
				
				$att_bouns_present_day = $attend + $total_holiday;
				
				
				if($att_bouns_present_day == $num_of_days)
				{
					$att_bouns = $this->att_bouns_cal($emp_id);
				}
				else
				{
					$att_bouns = 0;
				}
				
				$data["att_bonus"] = $att_bouns;
				/*echo "<td>";
				echo $att_bouns;
				echo "</td>";*/
				
				
				$transport = $this->transport_cal($emp_id);
				
				if($transport == true)
				{
					$trans_allaw = $attend * 20;
				}
				else
				{
					$trans_allaw = 0;
				}
				
				$data["trans_allaw"] = $trans_allaw;
				/*echo "<td>";
				echo $trans_allaw;
				echo "</td>";*/
				
				$lunch_allaw = $this->lunch_allaw_cal($emp_id);
				
				if($transport == true)
				{
					$lunch_allaw = $attend * 25;
				}
				else
				{
					$lunch_allaw = 0;
				}
				
				$data["lunch_allaw"] = $lunch_allaw;
				/*echo "<td>";
				echo $lunch_allaw;
				echo "</td>";*/
				
				$others_allaw = $this->others_allaw_cal($emp_id, $salary_month);
				
				$data["others_allaw"] = $others_allaw;
				/*echo "<td>";
				echo $others_allaw;
				echo "</td>";*/
				
				$total_allaw = $att_bouns + $trans_allaw + $lunch_allaw + $others_allaw;
				$data["total_allaw"] = $total_allaw;
				/*echo "<td>";
				echo $total_allaw;
				echo "</td>";*/
				
				$ot_rate = $basic_sal * 2 / 208 ;
				$ot_rate = round($ot_rate,2);
				$ot_hour = $this->ot_hour($rows->emp_id, $year_month, $ot_rate);
				
				if($ot_hour == '')
				{
					$ot_hour = 0;
				}
				else
				{
					$ot_hour = $ot_hour;
				}
							
				$data["ot_hour"] = $ot_hour;
				/*echo "<td>";
				echo $ot_hour;
				echo "</td>";*/
							
				$data["ot_rate"] = $ot_rate;
				/*echo "<td>";
				echo $ot_rate;
				echo "</td>";*/
				
				$ot_amount = round($ot_hour * $ot_rate);
				
				$data["ot_amount"] = $ot_amount;
				/*echo "<td>";
				echo $ot_amount;
				echo "</td>";*/
				
				
				$payable_amount = ($payable_wages + $total_allaw + $ot_amount);
				
				$data["gross_pay"] = $payable_amount;
				/*echo "<td>";
				echo $payable_amount;
				echo "</td>";*/
				
				$advance_deduct = $this->advance_loan_deduction($emp_id, $salary_month);
				$data["adv_deduct"] = $advance_deduct;
				/*echo "<td>";
				echo $advance_deduct;
				echo "</td>";*/
				
				$pf = 0;
				$data["provident_fund"] = $pf;
				/*echo "<td>";
				echo $pf;
				echo "</td>";*/
				
				$others_deduct = $this->others_deduct_cal($emp_id, $year_month);
				if($others_deduct == '')
				{
					$others_deduct = 0;
				}
				
				$data["others_deduct"] = $others_deduct;
				/*echo "<td>";
				echo $others_deduct;
				echo "</td>";*/
				
				$total_deduct = $advance_deduct + $pf + $others_deduct;
				$data["total_deduct"] = $total_deduct;
				/*echo "<td>";
				echo $total_deduct;
				echo "</td>";*/
				
				$pbt = $payable_amount - $total_deduct;
				$data["pbt"] = $pbt;
				/*echo "<td>";
				echo $pbt;
				echo "</td>";*/
				
				$tax = $this->tax_deduct_cal($emp_id, $year_month);
				if($tax == '')
				{
					$tax = 0;
				}
				$data["tax"] = $tax;
				/*echo "<td>";
				echo $tax;
				echo "</td>";*/
				
				$net_pay = $pbt - $tax;
				$data["net_pay"] = $net_pay;
				/*echo "<td>";
				echo $net_pay;
				echo "</td>";*/
				
				
				
				/*echo "<td>";
				echo "&nbsp;";
				echo "</td>";*/
				
				$data["salary_month"] = $start_date;
				
				/*$serial++;
				echo "</tr>";*/
				
				
				$this->db->select("emp_id");
				$this->db->where("emp_id", $rows->emp_id);
				$this->db->where("salary_month", $start_date);
				$query = $this->db->get("pr_pay_scale_sheet");
				
				if($query->num_rows() > 0 )
				{
					$this->db->where("emp_id", $rows->emp_id);
					$this->db->where("salary_month", $start_date);
					$this->db->update("pr_pay_scale_sheet",$data);
				}
				else
				{
					$this->db->insert("pr_pay_scale_sheet",$data);
				}
				
				
			}
			//echo "</table>";
			return "Process completed successfully";
		}
	}
	
	
	
	function emp_production($emp_prod)
	{
		$this->db->select("emp_id,salary_type");
		$this->db->where("emp_id",$emp_prod);
		$this->db->where("salary_type",2);
		$query = $this->db->get("pr_emp_com_info");
		if($query->num_rows == 1)
		{
			return $emp_prod;
		}
		else
		{
			return false ;
		}
	}
	
	function others_allaw_cal($emp_id, $salary_month)
	{
		$this->db->select("payment_amount");
		$this->db->where("emp_id", $emp_id);
		$this->db->like("payment_month",$salary_month);
		$query = $this->db->get("pr_payment");
		//echo $this->db->last_query();
		if($query->num_rows > 0)
		{
			$row = $query->row();
			return $row->payment_amount;
		}
		else
		{
			return 0;
		}
	}
	
	
	function emp_production_salary($emp_production,$year, $month)
	{
		$salary_month = $year."-".$month ;
		//$barcode_no = $this->barcode_no($emp_production, $salary_month);
		//echo $barcode_no."===";
		$this->db->select("emp_id,barcode_no, count(barcode_no) as total");
		$this->db->where("emp_id", $emp_production);
		$this->db->where("status", 2);
		$this->db->like("received_date",$salary_month);
		$query = $this->db->get("pr_pd_knitting_issue");
		foreach($query->result() as $rows)
		{
			echo $rows->emp_id."=="; 
			$barcode = $rows->barcode_no."=="; 
			echo $rows->total."==";
			$bundle_size = bundle_size($barcode) ;
			echo "**********";
			
			
		}
	
	}
	
	
	
	
	function ot_hour($emp_id, $year_month, $ot_rate)
	{
		$this->db->select_sum("ot_hour");
		$this->db->where("emp_id", $emp_id);
		$this->db->like("shift_log_date",$year_month);
		$query = $this->db->get("pr_emp_shift_log");
		//echo $this->db->last_query();
		$row = $query->row();
		return $row->ot_hour;
	}
	
	function att_bouns_cal($emp_id)
	{
		$this->db->select("pr_attn_bonus.ab_rule");
		$this->db->from("pr_attn_bonus");
		$this->db->from("pr_emp_com_info");
		$this->db->where("pr_emp_com_info.emp_id", $emp_id);
		$this->db->where("pr_emp_com_info.att_bonus = pr_attn_bonus.ab_id");
		$query = $this->db->get();
		$row = $query->row();
		return $row->ab_rule;
	}
	
	function transport_cal($emp_id)
	{
		$this->db->select("transport");
		$this->db->from("pr_emp_com_info");
		$this->db->where("emp_id", $emp_id);
		$query = $this->db->get();
		$row = $query->row();
		if($row->transport == 0 )
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	function lunch_allaw_cal($emp_id)
	{
		$this->db->select("lunch");
		$this->db->from("pr_emp_com_info");
		$this->db->where("emp_id", $emp_id);
		$query = $this->db->get();
		$row = $query->row();
		if($row->lunch == 0 )
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	function others_deduct_cal($emp_id, $year_month)
	{
		$this->db->select_sum("others_deduct");
		$this->db->where("emp_id", $emp_id);
		$this->db->like("deduct_month",$year_month);
		$query = $this->db->get("pr_deduct");
		//echo $this->db->last_query();
		$row = $query->row();
		return $row->others_deduct;
	}
	
	function tax_deduct_cal($emp_id, $year_month)
	{
		$this->db->select_sum("tax_deduct ");
		$this->db->where("emp_id", $emp_id);
		$this->db->like("deduct_month",$year_month);
		$query = $this->db->get("pr_deduct");
		//echo $this->db->last_query();
		$row = $query->row();
		return $row->tax_deduct ;
	}
	
	/*function ot_hour($emp_id, $year_month, $ot_rate)
	{
		$ot_month = "$year_month";
		$emp_table = "temp_".$emp_id;
		
		$start_time	= "17:00:00";
		$end_time	= "20:30:00";
		$this->db->distinct();
		$this->db->select("date_time");
		$this->db->from($emp_table);
		$where ="trim(substr(date_time,1,7)) ='$ot_month' and trim(substr(date_time,11,14)) BETWEEN '$start_time' and '$end_time'";
		$this->db->where($where);
		$query = $this->db->get();
		//echo $this->db->last_query();
		//echo "=====================$emp_id====================";
		$ot_hour = 0;
		foreach ($query->result() as $rows)
		{
			//echo $rows->date_time;
			$time = trim(substr($rows->date_time,11,19));
			if($time > "17:40:00" and $time < "18:40:00")
			{
				$ot_hour = $ot_hour + 1;  
			}
			elseif($time > "18:40:00" and $time < "19:40:00")
			{
				$ot_hour = $ot_hour + 2; 
			}
			elseif($time > "19:40:00" and $time < "20:40:00") 
			{
				$ot_hour = $ot_hour + 3; 
			}
		}
		
		//echo "=====================$emp_id>>>$ot_hour====================";
		
		$ot_amount = $ot_hour * $ot_rate;
		//echo "$emp_id=>$ot_hour=>$ot_amount <br>";
		$this->db->select("emp_id");
		$this->db->where("emp_id", $emp_id);
		$where ="trim(substr(ot_month,1,7)) ='$ot_month'";
		$this->db->where($where);
		$query = $this->db->get("pr_ot");
		if($query->num_rows() ==0)
		{
			$ot_month = $ot_month."-0";
			$ot_empid = array('ot_id' => '', 'emp_id' => $emp_id, 'ot_hr_mar' => $ot_hour, 'ot_amt_mar' => $ot_amount, 'ot_month' => $ot_month);
			$this->db->insert("pr_ot", $ot_empid);
		}
		else
		{
			$data = array('ot_hr_mar' => $ot_hour, 'ot_amt_mar' => $ot_amount);
			$this->db->where("emp_id", $emp_id);
			$where ="trim(substr(ot_month,1,7)) ='$ot_month'";
			$this->db->where($where);
			$this->db->update("pr_ot",$data);
		}
		
		
		
		$ot['ot_amount'] = $ot_amount;
		$ot['ot_hr_mar'] = $ot_hour;
		return $ot;
		
	}*/
	
	function emp_name($emp_id)
	{
		$this->db->select("emp_full_name");
		$this->db->where("emp_id",$emp_id);
		$query = $this->db->get("pr_emp_per_info");
		$row = $query->row();
		return $row->emp_full_name;
	}
	
	function emp_desig($desig_id)
	{
		$this->db->select("desig_name");
		$this->db->where("desig_id",$desig_id);
		$query = $this->db->get("pr_designation");
		$row = $query->row();
		return $row->desig_name;
	}
	
	function salary_grade($gr_id)
	{
		$this->db->select("gr_name");
		$this->db->where("gr_id",$gr_id);
		$query = $this->db->get("pr_grade");
		$row = $query->row();
		return $row->gr_name;
	}
	
	function attendance_check($emp_id,$present_status,$num_of_days, $start_date)
	{
		
		$search_date =trim(substr($start_date,0,7));
		$loop_date = trim(substr($start_date,8,2));
		$this->db->select("");
		$this->db->where("emp_id",$emp_id);
		$this->db->like("att_month",$search_date);
		$query = $this->db->get("pr_attn_monthly");
		//echo $this->db->last_query();
		$count = 0;
		foreach($query->result_array() as $rows => $value)
		{
			for($i=$loop_date; $i<= $num_of_days ; $i++)
			{
				$idate = date("d", mktime(0, 0, 0, 0, $i, 0));
				$date="date_$idate";
				
				if($value[$date] == "$present_status")
				{
					$count++;
				}
			}
		}
		return $count;
	}
	
	function find_week($year_v,$month_v,$day_of_week_v)
	{
		//$year_v=2010;
		//$month_v=3;
		//---5=fryday----------------//
		//$day_of_week_v=5;
        $result=array();
		for ($year = $year_v; $year <= $year_v; $year++) 
					{ 
						for ($month = $month_v; $month <= $month_v; $month++) 
							{ 
							$num_of_days = date("t", mktime(0,0,0,$month,1,$year)); 
							$result['num_of_days']=$num_of_days;
						//	echo "Number of days = $num_of_days <BR>"; 
							$firstdayname = date("D", mktime(0, 0, 0, $month, 1, $year)); 
							$firstday = date("w", mktime(0, 0, 0, $month, 1, $year)); 
							$lastday = date("t", mktime(0, 0, 0, $month, 1, $year)); 
				
								for ($day_of_week = $day_of_week_v ; $day_of_week <= $day_of_week_v ; $day_of_week++) 
									{ 
									if ($firstday > $day_of_week) { 
									// means we need to jump to the second week to find the first $day_of_week 
									$d = (7 - ($firstday - $day_of_week)) + 1; 
									} elseif ($firstday < $day_of_week) { 
									// correct week, now move forward to specified day 
									$d = ($day_of_week - $firstday + 1); 
									} else {     
									// my "reversed-engineered" formula 
									if ($lastday==28) // max of 4 occurences each in the month of February with 
					
									$d = ($firstday + 4); 
									elseif ($firstday==4) 
									$d = ($firstday - 2); 
									elseif ($firstday==5 ) 
									$d = ($firstday - 3); 
									elseif ($firstday==6) 
									$d = ($firstday - 4); 
									else 
									$d = ($firstday - 1); 
									if ($lastday==29) // only 1 set of 5 occurences each in the month of 
								   $d -= 1; 
						} 
					
						$d += 28;    // jump to the 5th week and see if the day exists 
						if ($d > $lastday) { 
							$weeks = 4; 
						} else { 
							$weeks = 5; 
						} 
					
					if ($day_of_week==0) ; 
					elseif ($day_of_week==1) ; 
					elseif ($day_of_week==2) ; 
					elseif ($day_of_week==3) ; 
					elseif ($day_of_week==4) ; 
					elseif ($day_of_week==5) ; 
					else echo "Sat "; 
					
					//echo "occurences = $weeks <BR> "; 
					$result['day_of_week']=($day_of_week);
					$result['num_of_days']=$num_of_days;
					$no_of_working_days=$num_of_days-$day_of_week;
					//echo "No of working days  ".$no_of_working_days;
					$result['no_of_working_days']=$no_of_working_days;
					
					} // for $day_of_week loop 
				} // for $mth loop 
		} // for $year loop 

  return $result;

	}
	
	
	function insert_pay_sheet($data)
	{
		$this->db->insert('pr_pay_scale_sheet', $data); 
	}
	
	function update_pay_sheet($data)
	{
		$this->db->where("emp_id",$data['emp_id']);  
		$this->db->update('pr_pay_scale_sheet', $data);
		
	}

	//========================END Payscale Sheet Process=================
	function leave_db($emp_id,$start_date,$end_date, $leave_type)
	{
		$where = "trim(substr(start_date,1,10)) BETWEEN '$start_date' and '$end_date'";
		
		$this->db->select('start_date');
		$this->db->where("emp_id",$emp_id);
		$this->db->where("leave_type",$leave_type);
		$this->db->where($where);
		
		$query = $this->db->get('pr_leave_trans');
		
		return $query->num_rows();
	}
 
 
	function absent_report_db($start_date,$end_date)
	{
	echo "sayed";
$this->db->select('pr_id_proxi.emp_id,pr_id_proxi.proxi_id,pr_emp_per_info.emp_full_name,pr_section.sec_name,pr_line_num.line_name,pr_designation.desig_name,att_2011.date_time');
		$this->db->from('att_2011');
		$this->db->from('pr_id_proxi');
		$this->db->from('pr_emp_per_info');
		$this->db->from('pr_emp_com_info');
		$this->db->from('pr_section');
		$this->db->from('pr_designation');
		$this->db->from('pr_dept');
		$this->db->from('pr_line_num');
		//$start_date = "$start_date 08:05:00";
		//$end_date = "$end_date 09:00:00";
$where="proxi_id  not  in ( select proxi_id from att_2011 ) and pr_id_proxi.emp_id = pr_emp_per_info.emp_id and pr_emp_per_info.emp_id = pr_emp_com_info.emp_id  and pr_emp_com_info.emp_sec_id = pr_section.sec_id and pr_emp_com_info.emp_desi_id = pr_designation.desig_id and pr_emp_com_info.emp_dept_id = pr_dept.dept_id and pr_emp_com_info.emp_line_id = pr_line_num.line_id and  trim(substr(att_2011.date_time,1,10)) BETWEEN '$start_date' and '$end_date' ";
		
	
		$this->db->where($where);
		$query = $this->db->get();
		//echo $this->db->last_query();
    	return $query->result();
	
		
	}
	
	function daily_absent_db($input_date)
	{
		
		$result = array();
		//$input_date = "2011-02-1";
		$first= "$input_date";
		$first_y=trim(substr($first,0,4));
		$first_m=trim(substr($first,5,2));
		$first_d=trim(substr($first,8,2));
		
		//echo $this->numWeeks($first_y,$first_m);
		$last_date = date("t", mktime(0, 0, 0, $first_m, 1, $first_y));
		$second = "$first_y-$first_m-$last_date";
		//$second_y=trim(substr($second,0,4));
		//$second_m=trim(substr($second,5,2));
		//$second_d=trim(substr($second,8,2));
		
		$year_month= "$first_y-$first_m";
		$now = strtotime($first);
		$friday = strtotime("-1 day",$now);
		$first = date("Y-m-d", $friday);
		
		
		//File process script
		
		$att_date = date("Y-m-d", mktime(0, 0, 0, $first_m, $first_d, $first_y));
		$this->att_process($att_date);
			
		//File process script
		
		$holiday = $this->holiday_calculation($att_date);
		//print_r($holiday);
		
		
		$att_table="att_".$first_y."_".$first_m;
		$date_field='.date_time';
		$prox_id_field='.proxi_id';
		$select=$att_table.$date_field;
		$w_table_prox_id=$att_table.$prox_id_field;
		
		if (!$this->db->table_exists($att_table) )
		{
		 	return "Selected month does not exist and change your process month";
		}
		else
		{
		  
		$this->db->select('pr_emp_per_info.emp_id,pr_emp_per_info.emp_full_name,pr_designation.desig_name,pr_emp_shift.shift_duty');
		$this->db->from('pr_emp_per_info');
		$this->db->from('pr_emp_com_info');
		$this->db->from('pr_designation');
		$this->db->from('pr_emp_shift');
		$this->db->where("pr_emp_per_info.emp_id = pr_emp_com_info.emp_id");
		$this->db->where("pr_emp_com_info.emp_desi_id = pr_designation.desig_id");
		$this->db->where("pr_emp_com_info.emp_shift = pr_emp_shift.shift_id");
		$this->db->order_by("pr_emp_com_info.emp_id");
		$query2 = $this->db->get();
		//echo $this->db->last_query();		
		$year_month = date("Y-m", mktime(0, 0, 0, $first_m, 1, $first_y)); 
		$year_month = $year_month."-00";
		foreach ($query2->result() as $rows)
		{	
			
			//echo "<br>";
			$id=$rows->emp_id;
			
			$weekend = $this->check_weekend($id, $att_date);
			
			$resig_or_left_date = $this->resig_or_left_date($id);
			
			if($resig_or_left_date == false)
			{
				//echo "======$id=>$resig_or_left_date == $att_date****";
			
			
			//echo  "<td>".$id."</td>";
			$name=$rows->emp_full_name;
			//echo  "<td>".$name."</td>";
			$designation=$rows->desig_name;
			$shift_duty = $rows->shift_duty;
			//echo  "<td>".$designation."</td>";
				
			$temp_table = "temp_$id";
			
			$this->db->select();
			$this->db->from($att_table);
			$this->db->from('pr_id_proxi');
			$this->db->where("$w_table_prox_id = pr_id_proxi.proxi_id");
			$this->db->where("pr_id_proxi.emp_id  = '$id'");
			$query = $this->db->get();
						
			
			foreach($query->result() as $rows)
			{
				$this->db->select();
				$this->db->where("device_id  = '$rows->device_id'");
				$this->db->where("proxi_id  = '$rows->proxi_id'");
				$this->db->where("date_time  = '$rows->date_time'");
				$this->db->from($temp_table);
				$query = $this->db->get();
				if($query->num_rows == 0)
				{
					$temp_data = array(
										'device_id' => $rows->device_id,
										'proxi_id' => $rows->proxi_id,
										'date_time' => $rows->date_time
										);
					$this->db->insert($temp_table,$temp_data);	
				}				
			}
			
			
			$this->db->select("emp_id");
			$this->db->where("emp_id", $id);
			$this->db->where("att_month",$year_month);
			$query = $this->db->get("pr_attn_monthly");
			if($query->num_rows() ==0)
			{
				$data = array( "emp_id" => $id, 'att_month' =>$year_month );
				$this->db->insert("pr_attn_monthly",$data);
			}
			
			
			
			
			set_time_limit(200) ;
			ini_set("memory_limit","128M");
			
			$ot_hour = 0;
			
				
				//sleep(1);
				
				$date_field='.date_time';
				$prox_id_field='.proxi_id';
				$select=$temp_table.$date_field;
//========================================================================	

				$emp_shift = $this->emp_shift_check_process($id, $att_date);
				
				//$emp_shift = $this->emp_shift_check($id);
			
				$schedule = $this->schedule_check($emp_shift);
				//print_r($schedule);
				$start_time	=  $schedule[0]["in_start"]; 
				//$late_start =  $schedule[0]["late_start"]; 
				$end_time   =  $schedule[0]["in_end"];

				$date = "date_$first_d";
				$date1 = date("Y-m-d", mktime(0, 0, 0, $first_m, $first_d, $first_y));
				$this->db->select($select);
				$this->db->from($temp_table);
				$this->db->where("trim(substr($select,1,10)) = '$date1' ");
				$this->db->where("trim(substr($select,11,14)) BETWEEN '$start_time' and '$end_time'");
				$query = $this->db->get();
				//echo $this->db->last_query() ;
				
				$check = date("Y-m-d", mktime(0, 0, 0, $first_m, $first_d, $first_y));	
				
				if ($check == $weekend)
				{
					//=============================Extra OT Calculation=============================
						$extra_ot_calculation = $this->extra_ot_calculation($id, $check,  $emp_shift);
					//=============================Extra OT Calculation=============================
				}
				elseif ($check == $holiday)
				{
					//=============================Extra OT Calculation=============================
						$extra_ot_calculation = $this->extra_ot_calculation($id, $check,  $emp_shift);
					//=============================Extra OT Calculation=============================
				}
				
				if($query->num_rows() == 0)
				{
					
					
					$this->db->select("leave_type");
					$this->db->where("emp_id",$id);
					$this->db->where("start_date",$check);
					$query = $this->db->get("pr_leave_trans");
						
					if($query->num_rows() > 0)
					{
						$result[$id] = "L";
						$ppp = array( $date => $result[$id]);
						$this->db->where("emp_id",$id);
						
						$this->db->where("att_month",$year_month);
						$this->db->update("pr_attn_monthly",$ppp);
					}
					elseif ($check == $holiday)
					{
						
						//echo "<td>   H   </td>";
						$result[$id] = "H";
						
						$hhh = array( $date => $result[$id]);
						$this->db->where("emp_id",$id);
						$this->db->where("att_month",$year_month);
						$this->db->update("pr_attn_monthly",$hhh);
					}
					elseif ($check == $weekend)
					{
						//echo "<td>   W   </td>";
						$result[$id] = "W"; 
						
						$www = array( $date => $result[$id]);
						$this->db->where("emp_id",$id);
						$this->db->where("att_month",$year_month);
						$this->db->update("pr_attn_monthly",$www);
					}
					else
					{
						
						//echo "<td>   A   </td>";
						
							$result[$id] = "A";
							
							$aaa = array( $date => $result[$id]);
							$this->db->where("emp_id",$id);
							$this->db->where("att_month",$year_month);
							$this->db->update("pr_attn_monthly",$aaa);
							
						
					}
						
				}
				else
				{
					//echo "<td style='background-color:#00FFCC'>   P   </td>";
						if ($check == $weekend)
						{
							//echo "<td>   W   </td>";
							$result[$id] = "W"; 
							
							$www = array( $date => $result[$id]);
							$this->db->where("emp_id",$id);
							$this->db->where("att_month",$year_month);
							$this->db->update("pr_attn_monthly",$www);
						}
						elseif ($check == $holiday)
						{
							//echo "<td>   H   </td>";
							$result[$id] = "H";
							
							
							$hhh = array( $date => $result[$id]);
							$this->db->where("emp_id",$id);
							$this->db->where("att_month",$year_month);
							$this->db->update("pr_attn_monthly",$hhh);
						}
						else
						{					
							$this->db->select("leave_type");
							$this->db->where("emp_id",$id);
							$this->db->where("start_date",$check);
							$query = $this->db->get("pr_leave_trans");
							if($query->num_rows() > 0)
							{
								$result[$id] = "L";
								$ppp = array( $date => $result[$id]);
								$this->db->where("emp_id",$id);
								$this->db->where("att_month",$year_month);
								$this->db->update("pr_attn_monthly",$ppp);
							}
							else
							{
								$result[$id] = "P";
								$ppp = array( $date => $result[$id]);
								$this->db->where("emp_id",$id);
								$this->db->where("att_month",$year_month);
								$this->db->update("pr_attn_monthly",$ppp);
							}
						}
					}
				}
				
			
		//===========================OT CALCULATION=============================================
				//echo $id."=>";
				$ot_hour_calcultation = $this->ot_hour_calcultation($id, $att_date);
				
				//echo "<br>";
				if($ot_hour_calcultation["ot_hour"] !='')
				{
					if($ot_hour_calcultation["ot_hour"] > 2)
					{
						$extra_ot_hour = $ot_hour_calcultation["ot_hour"] - 2 ;
						$ot_hour_calcultation["ot_hour"] = 2;
						
						//echo "EMP=$id***EX-OT=$extra_ot_hour----------";
						
					}
					else
					{
						$extra_ot_hour = 0;
					}
				}
				else
				{
					$ot_hour_calcultation["ot_hour"] = 0;
					$extra_ot_hour = 0;
				}
				
				
				$insert_ot_hour = $this->insert_ot_hour($id, $att_date, $ot_hour_calcultation);
				$insert_extra_ot_hour = $this->insert_extra_ot_hour($id, $att_date, $extra_ot_hour);
//===========================OT CALCULATION=============================================	
			
			//$this->dbforge->drop_table($temp_table);
			//echo "</tr>";
		}
		
		}
		
		
		//echo "</table>";
		//echo "</div>";
		//echo "<br><br><br>";
		//print_r($result);
		return $result;
	
	}
	
	function resig_or_left_date($emp_id)
	{
		$this->db->select("left_date");
		$this->db->where('emp_id',$emp_id);
		$query = $this->db->get("pr_emp_left_history");
		$row = $query->row();
		if($query->num_rows() > 0)
		{
			return true;
		}
		
		
		$this->db->select("resign_date");
		$this->db->where('emp_id',$emp_id);
		$query = $this->db->get("pr_emp_resign_history");
		$row = $query->row();
		if($query->num_rows() > 0)
		{
			return true;
		}
	}
	
	function insert_extra_ot_hour($emp_id, $date, $extra_ot_hour)
	{
		$this->db->select();
		$this->db->where("emp_id", $emp_id);
		$this->db->where("shift_log_date", $date);
		$query = $this->db->get("pr_emp_shift_log");
		if($query->num_rows() > 0)
		{
			$data = array(
						"extra_ot_hour" => $extra_ot_hour
						);
			$this->db->where("emp_id", $emp_id);
			$this->db->where("shift_log_date", $date);
			$this->db->update("pr_emp_shift_log", $data);
		}
	}
	
	function extra_ot_calculation($id, $check,  $schedule)
	{
		$emp_id = $id;
		$date = $check;
		$original_date = $date;
		$schedule = $schedule;
		$table = "temp_$emp_id";
		
		
		
		$this->db->select("pr_emp_com_info.ot_entitle");
		$this->db->from("pr_emp_com_info");
		$this->db->where("pr_emp_com_info.emp_id = '$emp_id'");
		$query1 = $this->db->get();
		$row1 = $query1->row();
		$ot_status  = $row1->ot_entitle;
		
		if( $ot_status == 0 )
		{
			if($schedule == "Night")
			{
//==================NIGHT SHIFT CALCULATION============================				
				$ot_start = "13:45:00";
				$ot_end = "20:15:00";
				
				$in_time = '';
				$out_time = '';
				
				$in_time_original = $this->time_check_in($date, $ot_start, $ot_end, $table);
				if($in_time_original !='')
				{
					$in_time_original = $in_time_original;
				}
				else
				{
					$in_time_original ='';
				}
				$out_time_original = $this->time_check_out($date, $ot_start, $ot_end, $table);
				$out_time = $out_time_original;
				if($out_time !='')
				{
					$hour = trim(substr($out_time,11,2));
					$minute = trim(substr($out_time,14,2));
					$sec = trim(substr($out_time,17,2));
					$out_time_original = date("H:i:s", mktime($hour, $minute, $sec, 0, 0, 0));
				}
				else
				{
					$out_time_original ='';
				}
					
				if($in_time_original == $out_time_original )
				{
					$total_ot_hour = 0;
				}
				elseif($in_time_original =='' or $out_time_original =='')
				{
					$total_ot_hour = 0;
				}
				else
				{
					$in_time = $in_time_original;
					if($in_time > "13:45:00")
					{
						$in_time = "14:00:00";
					}
					elseif($in_time > "14:40:00")
					{
						$in_time = "15:00:00";
					}
									
					
					if($out_time > "19:40:00")
					{
						$out_time = "20:00:00";
					}
					elseif($out_time > "18:40:00")
					{
						$out_time = "19:00:00";
					}
					elseif($out_time > "17:40:00")
					{
						$out_time = "18:00:00";
					}
					
					$ot_hour = round($out_time - $in_time);
					$total_ot_hour = $ot_hour;
				}
				
				$this->db->select("");
				$this->db->where("emp_id", $emp_id);
				$this->db->where("ot_date", $original_date);
				$query = $this->db->get("pr_extra_ot");
				if($query->num_rows() > 0)
				{
					$data = array(
					'ot_hour' 		=> $total_ot_hour,	
					'afternoon_in_time' => $in_time_original,
					'afternoon_out_time'=> $out_time_original
					);
					
					$this->db->where("emp_id", $emp_id);
					$this->db->where("ot_date", $original_date);
					$this->db->update("pr_extra_ot", $data);
				}
				else
				{
					$data = array(
					'emp_id' => $emp_id,
					'ot_date' => $original_date,
					'ot_hour' => $total_ot_hour,
					'afternoon_in_time' => $in_time_original,
					'afternoon_out_time'=> $out_time_original		
					);
					$this->db->insert("pr_extra_ot", $data);
					
				}
//==================NIGHT SHIFT CALCULATION END============================				
			}
			elseif($schedule == "Day")
			{
//==================DAY SHIFT CALCULATION============================			
				$ot_start = "07:45:00";
				$ot_end = "14:15:00";
				
				$in_time = '';
				$out_time = '';
				
				$in_time_original_first = $this->time_check_in($date, $ot_start, $ot_end, $table);
				$out_time_original_first = $this->time_check_out($date, $ot_start, $ot_end, $table);
				$in_time = $in_time_original_first;
				if($out_time_original_first != '')
				{
					$hour = trim(substr($out_time_original_first,11,2));
					$minute = trim(substr($out_time_original_first,14,2));
					$sec = trim(substr($out_time_original_first,17,2));
					$out_time_original_first = date("H:i:s", mktime($hour, $minute, $sec, 0, 0, 0));
				}
				else
				{
					$out_time_original_first = '';
				}
				$out_time = $out_time_original_first;
				
				
				if($in_time_original_first == $out_time_original_first)
				{
					$total_ot_hour_first = 0;
				}
				elseif($in_time_original_first =='' or $out_time_original_first =='')
				{
					$total_ot_hour_first = 0;
				}
				else
				{
					if($in_time > "07:45:00")
					{
						$in_time = "08:00:00";
					}
					elseif($in_time < "08:30:00")
					{
						$in_time = "08:00:00";
					}
					//echo $in_time;
					
					
					
					if($out_time > "13:40:00")
					{
						$out_time = "14:00:00";
					}
					
					
					//echo "<br>OUT==".$out_time = "19:50:00";
					$total_ot_hour_first = round($out_time - $in_time);
				}
					
				$ot_start = "19:45:00";
				$ot_end = "20:15:00";
				
				$in_time_original_second = $this->time_check_in($date, $ot_start, $ot_end, $table);
				
				$in_time = $in_time_original_second;
				
				$ot_start = "04:45:00";
				$ot_end = "08:15:00";
				
				$now = strtotime($date);
				$datestr = strtotime("+1 day",$now);
				$out_date = date("Y-m-d", $datestr);
				$out_date = $out_date;
						
				$out_time_original_second = $this->time_check_out($out_date, $ot_start, $ot_end, $table);
				
				if($out_time_original_second !='')
				{
					$hour = trim(substr($out_time_original_second,11,2));
					$minute = trim(substr($out_time_original_second,14,2));
					$sec = trim(substr($out_time_original_second,17,2));
					$out_time_original_second = date("H:i:s", mktime($hour, $minute, $sec, 0, 0, 0));
					$out_time = $out_time_original_second;
				}
				else
				{
					$out_time ='';
				}
				if($in_time_original_second == $out_time_original_second ) 
				{
					$total_ot_hour_second = 0;
				}
				elseif($in_time_original_second =='' or $out_time_original_second =='')
				{
					$total_ot_hour_second = 0;
				}
				else
				{
				
				
				
				
				if($in_time > "19:45:00")
				{
					$in_time = "20:00:00";
				}
				elseif($in_time < "20:15:00")
				{
					$in_time = "20:00:00";
				}
				$in_date_time = "$date $in_time";
				
				
				
				if($out_time > "07:40:00")
				{
					$out_time = "08:00:00";
				}
				elseif($out_time > "06:40:00")
				{
					$out_time = "07:00:00";
				}
				elseif($out_time > "05:40:00")
				{
					$out_time = "06:00:00";
				}
				elseif($out_time > "04:40:00")
				{
					$out_time = "05:00:00";
				}
				
				
				
				$out_date_time = "$out_date $out_time";
				//$total_ot_hour_second = round($in_time - $out_time - 1);
				
				$total_ot_hour_second = $this->hour_difference($in_date_time, $out_date_time);
				
				
				
				
			}
			
			$total_ot_hour_day = $total_ot_hour_first + $total_ot_hour_second;
			//echo "EMP=$emp_id=>IN=$in_time_original_second=OUT=$out_time_original_second=OT= $total_ot_hour_day****";
			
			$this->db->select("");
			$this->db->where("emp_id", $emp_id);
			$this->db->where("ot_date", $original_date);
			$query = $this->db->get("pr_extra_ot");
			if($query->num_rows() > 0)
			{
				$data = array(
				'ot_hour' 			=> $total_ot_hour_day,
				'morning_in_time' 	=> $in_time_original_first,
				'morning_out_time' 	=> $out_time_original_first,
				'night_in_time' 	=> $in_time_original_second,
				'night_out_time' 	=>	$out_time_original_second	
				);
				
				$this->db->where("emp_id", $emp_id);
				$this->db->where("ot_date", $original_date);
				$this->db->update("pr_extra_ot", $data);
			}
			else
			{
				$data = array(
				'emp_id' 			=> $emp_id,
				'ot_date' 			=> $original_date,
				'ot_hour' 			=> $total_ot_hour_day,
				'morning_in_time' 	=> $in_time_original_first,
				'morning_out_time' 	=> $out_time_original_first,
				'night_in_time' 	=> $in_time_original_second,
				'night_out_time' 	=>	$out_time_original_second				
				);
				$this->db->insert("pr_extra_ot", $data);
			
			}
//==================DAY SHIFT CALCULATION END============================
		}
		else
		{
//==================GENERAL SHIFT CALCULATION============================
			$ot_start = "06:00:00";
			$ot_end = "23:59:00";
			$in_time = '';
			$out_time = '';
					
			$in_time_original_general = $this->time_check_in($original_date, $ot_start, $ot_end, $table);
			if($in_time_original_general !='')
			{
				$in_time = $in_time_original_general;
			}
			else
			{
				$in_time ='';
			}
			
			
			$out_time_original_general = $this->time_check_out($original_date, $ot_start, $ot_end, $table);
				
			if($out_time_original_general !='')
			{
				$hour = trim(substr($out_time_original_general,11,2));
				$minute = trim(substr($out_time_original_general,14,2));
				$sec = trim(substr($out_time_original_general,17,2));
				$out_time_original_general = date("H:i:s", mktime($hour, $minute, $sec, 0, 0, 0));
				$out_time = $out_time_original_general;
			}
			else
			{
				$out_time ='';
			}
			
				if($in_time_original_general == $out_time_original_general)
				{
					$total_ot_hour_general = 0;
				}
				elseif($in_time_original_general =='' or $out_time_original_general =='')
				{
				
				}
				else
				{
				
				$out_time = $out_time_original_general;
				
				
				if($in_time > "10:40:00")
				{
					$in_time = "11:00:00";
				}
				elseif($in_time > "09:40:00")
				{
					$in_time = "10:00:00";
				}
				elseif($in_time > "08:40:00")
				{
					$in_time = "09:00:00";
				}
				elseif($in_time > "07:40:00")
				{
					$in_time = "08:00:00";
				}
				elseif($in_time > "06:40:00")
				{
					$in_time = "07:00:00";
				}
				elseif($in_time > "05:40:00")
				{
					$in_time = "06:00:00";
				}
				
				$in_date_time = "$original_date $in_time";
				
				if($out_time > "23:40:00")
				{
					$out_time = "24:00:00";
				}
				elseif($out_time > "22:40:00")
				{
					$out_time = "23:00:00";
				}
				elseif($out_time > "21:40:00")
				{
					$out_time = "22:00:00";
				}
				elseif($out_time > "20:40:00")
				{
					$out_time = "21:00:00";
				}
				elseif($out_time > "19:40:00")
				{
					$out_time = "20:00:00";
				}
				elseif($out_time > "18:40:00")
				{
					$out_time = "19:00:00";
				}
				elseif($out_time > "17:40:00")
				{
					$out_time = "18:00:00";
				}
				elseif($out_time > "16:40:00")
				{
					$out_time = "17:00:00";
				}
				elseif($out_time > "15:40:00")
				{
					$out_time = "16:00:00";
				}
				elseif($out_time > "14:40:00")
				{
					$out_time = "15:00:00";
				}
				elseif($out_time > "13:40:00")
				{
					$out_time = "14:00:00";
				}
				elseif($out_time > "12:40:00")
				{
					$out_time = "13:00:00";
				}
				
				
				
				
				$out_date_time = "$original_date $out_time";
				
				$in_hour = substr($in_date_time, 11, 2);
				$out_hour = substr($out_date_time, 11, 2);
				$total_ot_hour_general = ($out_hour - $in_hour);
				
				
		}
		//echo "emp=$emp_id=".$total_ot_hour_general;
		//echo "=>IN=$in_time<>OUT=$out_time****";
				$this->db->select("");
				$this->db->where("emp_id", $emp_id);
				$this->db->where("ot_date", $original_date);
				$query = $this->db->get("pr_extra_ot");
				if($query->num_rows() > 0)
				{
					$data = array(
					'ot_hour' 			=> $total_ot_hour_general,	
					'morning_in_time' 	=> $in_time_original_general,
					'morning_out_time' 	=> $out_time_original_general
					);
					
					$this->db->where("emp_id", $emp_id);
					$this->db->where("ot_date", $original_date);
					$this->db->update("pr_extra_ot", $data);
				}
				else
				{
					$data = array(
					'emp_id' 			=> $emp_id,
					'ot_date' 			=> $original_date,
					'ot_hour' 			=> $total_ot_hour_general,
					'morning_in_time' 	=> $in_time_original_general,
					'morning_out_time' 	=> $out_time_original_general		
					);
					$this->db->insert("pr_extra_ot", $data);
					
				}		
//==================GENERAL SHIFT CALCULATION END============================			
		}
	}
	else
	{
		$ot_start = "06:00:00";
		$ot_end = "23:59:00";
		$in_time = '';
		$out_time = '';
					
			$in_time_original_general = $this->time_check_in($original_date, $ot_start, $ot_end, $table);
			if($in_time_original_general !='')
			{
				$in_time = $in_time_original_general;
			}
			else
			{
				$in_time ='';
			}
			
			
			$out_time_original_general = $this->time_check_out($original_date, $ot_start, $ot_end, $table);
				
			if($out_time_original_general !='')
			{
				$hour = trim(substr($out_time_original_general,11,2));
				$minute = trim(substr($out_time_original_general,14,2));
				$sec = trim(substr($out_time_original_general,17,2));
				$out_time_original_general = date("H:i:s", mktime($hour, $minute, $sec, 0, 0, 0));
				$out_time = $out_time_original_general;
			}
			else
			{
				$out_time ='';
			}
			
				if($in_time_original_general == $out_time_original_general )
				{
					$total_ot_hour_general = 0;
				}
				elseif($in_time_original_general =='' or $out_time_original_general =='')
				{
					$total_ot_hour_general = 0;
				}
				else
				{
				
				$out_time = $out_time_original_general;
				
				
				if($in_time > "10:40:00")
				{
					$in_time = "11:00:00";
				}
				elseif($in_time > "09:40:00")
				{
					$in_time = "10:00:00";
				}
				elseif($in_time > "08:40:00")
				{
					$in_time = "09:00:00";
				}
				elseif($in_time > "07:40:00")
				{
					$in_time = "08:00:00";
				}
				elseif($in_time > "06:40:00")
				{
					$in_time = "07:00:00";
				}
				elseif($in_time > "05:40:00")
				{
					$in_time = "06:00:00";
				}
				
				$in_date_time = "$original_date $in_time";
				
				if($out_time > "23:40:00")
				{
					$out_time = "24:00:00";
				}
				elseif($out_time > "22:40:00")
				{
					$out_time = "23:00:00";
				}
				elseif($out_time > "21:40:00")
				{
					$out_time = "22:00:00";
				}
				elseif($out_time > "20:40:00")
				{
					$out_time = "21:00:00";
				}
				elseif($out_time > "19:40:00")
				{
					$out_time = "20:00:00";
				}
				elseif($out_time > "18:40:00")
				{
					$out_time = "19:00:00";
				}
				elseif($out_time > "17:40:00")
				{
					$out_time = "18:00:00";
				}
				elseif($out_time > "16:40:00")
				{
					$out_time = "17:00:00";
				}
				elseif($out_time > "15:40:00")
				{
					$out_time = "16:00:00";
				}
				elseif($out_time > "14:40:00")
				{
					$out_time = "15:00:00";
				}
				elseif($out_time > "13:40:00")
				{
					$out_time = "14:00:00";
				}
				elseif($out_time > "12:40:00")
				{
					$out_time = "13:00:00";
				}
				
				
				
				
				$out_date_time = "$original_date $out_time";
				
				$in_hour = substr($in_date_time, 11, 2);
				$out_hour = substr($out_date_time, 11, 2);
				$total_ot_hour_general = ($out_hour - $in_hour);
		}
		
		$this->db->select("");
		$this->db->where("emp_id", $emp_id);
		$this->db->where("ot_date", $original_date);
		$query = $this->db->get("pr_extra_ot");
		if($query->num_rows() > 0)
		{
			$data = array(
			'ot_hour' 			=> $total_ot_hour_general,	
			'morning_in_time' 	=> $in_time_original_general,
			'morning_out_time' 	=> $out_time_original_general
			);
			
			$this->db->where("emp_id", $emp_id);
			$this->db->where("ot_date", $original_date);
			$this->db->update("pr_extra_ot", $data);
		}
		else
		{
			$data = array(
			'emp_id' 			=> $emp_id,
			'ot_date' 			=> $original_date,
			'ot_hour' 			=> $total_ot_hour_general,
			'morning_in_time' 	=> $in_time_original_general,
			'morning_out_time' 	=> $out_time_original_general		
			);
		$this->db->insert("pr_extra_ot", $data);
		}		
	}		
	
	}
	
	function hour_difference($start_date_time, $end_date_time)
	{
		$start_date_time= strtotime("$start_date_time");
		$end_date_time 	= strtotime("$end_date_time");
		$elapsed 		= $end_date_time - $start_date_time;
		$elapsed_hour 	= floor($elapsed / 3600);
		$elapsed 		-= 3600 * floor($elapsed / 3600);    
		$elapsed_min 		= floor($elapsed / 60);
		
		if($elapsed_min >= 45)
		{
			$elapsed_hour = $elapsed_hour + 1;
		}
		else
		{
			$elapsed_hour = $elapsed_hour;
		}
		/*$start = strtotime("$last_time");
    	$end = strtotime("$current_time");
     	$elapsed = $end - $start;
     	echo floor($elapsed / 3600);
	   	echo ' hours, ';
    	$elapsed -= 3600 * floor($elapsed / 3600);
   	    echo floor($elapsed / 60);
 	    $elapsed -= 60 * floor($elapsed / 60);
    	echo ' minutes, and'. $elapsed.' seconds ago.';*/
			
		return $elapsed_hour;
	}
	
	function check_weekend($id, $att_date)
	{
		$this->db->select("emp_id");
		$this->db->from("pr_work_off");
		$this->db->where("emp_id", $id);
		$this->db->where("work_off_date", $att_date);
		$query = $this->db->get();
		//echo $this->db->last_query();
		if($query->num_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
		
	function ot_hour_calcultation($emp_id, $date)
	{
		$table = "temp_$emp_id";
		
		$present_count = 0;
		$absent_count = 0;
		$leave_count = 0;
		$ot_count = 0;
		$late_count = 0;
		
		$this->db->select("pr_emp_com_info.ot_entitle");
		$this->db->from("pr_emp_com_info");
		$this->db->where("pr_emp_com_info.emp_id = '$emp_id'");
		$query1 = $this->db->get();
		$row1 = $query1->row();
		$ot_status  = $row1->ot_entitle;
		
		$in_time = '';
		$out_time = '';
		
		$emp_shift = $this->emp_shift_check($emp_id, $date);
				
		$this->db->select("shift_id");
		$this->db->from("pr_emp_shift_schedule");
		$this->db->where("sh_type", $emp_shift);
		$query = $this->db->get();
		$row = $query->row();
			
		$schedule = $this->schedule_check($emp_shift);
		//print_r($schedule);
		$start_time		=  $schedule[0]["in_start"]; 
		$late_time 		=  $schedule[0]["late_start"]; 
		$end_time   	=  $schedule[0]["in_end"];
		$out_start_time	=  $schedule[0]["out_start"];
		$out_end_time	=  $schedule[0]["out_end"];	
				
		$hour = trim(substr($out_start_time,0,2));
		$minute = trim(substr($out_start_time,3,2));
		$sec = trim(substr($out_start_time,6,2));
		$am_pm = date("A", mktime($hour, $minute, $sec, 0, 0, 0));
		$in_date = $date;
		if($am_pm == "AM")
		{
			//echo $am_pm;
			$now = strtotime($in_date);
			$datestr = strtotime("+1 day",$now);
			$in_date = date("Y-m-d", $datestr);
			$in_date = $in_date;
		}
		else
		{
			$in_date = $date;
		}
		
		$hour = trim(substr($out_end_time,0,2));
		$minute = trim(substr($out_end_time,3,2));
		$sec = trim(substr($out_end_time,6,2));
		$am_pm = date("A", mktime($hour, $minute, $sec, 0, 0, 0));
		
		$out_date = $date;
		if($am_pm == "AM")
		{
			//echo $am_pm;
			$now = strtotime($out_date);
			$datestr = strtotime("+1 day",$now);
			$out_date = date("Y-m-d", $datestr);
			$out_date = $out_date;
		}
		else
		{
			$out_date = $date;
		}	
		
		$present_check = $this->present_check($date, $emp_id);
		if( $present_check == true)
		{	
			$in_time  = $this->time_check_in($date, $start_time, $end_time, $table);
			
			$out_start_time = "$in_date $out_start_time";
			$out_end_time = "$out_date $out_end_time";
			
			$out_time = $this->time_check_out2($out_start_time, $out_end_time, $table);
		}
		else
		{
			$in_time = '';
			$out_time = '';
		}
		//echo $in_time;
		if($in_time !='')
		{
			$hour = trim(substr($in_time,0,2));
			$minute = trim(substr($in_time,3,2));
			$sec = trim(substr($in_time,6,2));
			$time_format = date("h:i:s A", mktime($hour, $minute, $sec, 0, 0, 0));
			$in_time_format = $time_format;
		}
		else
		{
			$in_time_format='';
		}
		
		if($out_time !='')
		{
			$hour = trim(substr($out_time,11,2));
			$minute = trim(substr($out_time,14,2));
			$sec = trim(substr($out_time,17,2));
			$time_format = date("h:i:s A", mktime($hour, $minute, $sec, 0, 0, 0));
			$out_time_format = $time_format;
		}
		else
		{
			$out_time_format='';
		}
		
		$ot_hour='';
		if($in_time !='' and $out_time !='')
		{
			if($ot_status == 0)
			{
				$in_date_time = $out_start_time;
								
				$ot_hour = $this->hour_difference($in_date_time, $out_time);
			
				//echo "empId: $emp_id=IN=>$in_date_time****OUT=>$out_time===$out_date****OT===>$ot_hour";
			}
			else
			{
				$ot_hour = 0;
			}
		}
			
		if($out_time !='')
		{
			$hour = trim(substr($out_time,11,2));
			$minute = trim(substr($out_time,14,2));
			$sec = trim(substr($out_time,17,2));
			$out_time = date("H:i:s", mktime($hour, $minute, $sec, 0, 0, 0));
		}
				
		$data["in_time"] = $in_time;
		$data["out_time"] = $out_time;
		$data["ot_hour"] = $ot_hour;
		//echo "EMP:$emp_id";
		//print_r($data);
		return $data;
		
	
	}
	
	function insert_ot_hour($emp_id, $date, $ot_hour_calcultation)
	{
		//echo "EMP: $emp_id";
		//print_r($ot_hour_calcultation);
		$emp_shift = $this->emp_shift_check($emp_id, $date);
		
		$schedule = $this->schedule_check($emp_shift);
		//print_r($schedule);
		$start_time		=  $schedule[0]["in_start"]; 
		$late_time 		=  $schedule[0]["late_start"]; 
		$end_time   	=  $schedule[0]["in_end"];
		$out_start_time	=  $schedule[0]["out_start"];
		$out_end_time	=  $schedule[0]["out_end"];	
		
		if($ot_hour_calcultation["in_time"] == '')
		{
			$in_time = '';
		}
		else
		{
			$in_time = $ot_hour_calcultation["in_time"];
		}
		
		if($ot_hour_calcultation["out_time"] == '')
		{
			$out_time = '';
		}
		else
		{
			$out_time = $ot_hour_calcultation["out_time"];
		}
		if($ot_hour_calcultation["ot_hour"] =='')
		{
			$ot_hour = 0;
		}
		else
		{
			$ot_hour = $ot_hour_calcultation["ot_hour"];
		}
		
		$this->db->select();
		$this->db->where("emp_id", $emp_id);
		$this->db->where("shift_log_date", $date);
		$query = $this->db->get("pr_emp_shift_log");
		if($query->num_rows() > 0)
		{
			if($in_time > $late_time and $in_time !='')
			{
				$late_status = 1;
			}
			else
			{
				$late_status = 0;
			}
			$data = array(
						"in_time" => $in_time,
						"out_time" => $out_time,
						"ot_hour" => $ot_hour,
						"late_status" => $late_status
						);
					//print_r($data);
					//echo "LATE: ".$late_time;
			$this->db->where("emp_id", $emp_id);
			$this->db->where("shift_log_date", $date);
			$this->db->update("pr_emp_shift_log", $data);
		}
	}
		
	function monthly_att__report_db($salary_month, $col_desig, $col_line, $col_section, $col_dept, $col_all)
	{
		$year= trim(substr($salary_month,0,4));
		$month = trim(substr($salary_month,5,2));
		$att_month = "att_".$year."_".$month;
		if(!$this->db->table_exists($att_month))
		{
			return "Report month does not exist!";
		}
		$this->db->select('pr_emp_per_info.emp_full_name,pr_designation.desig_name,pr_attn_monthly.*');
		$this->db->from('pr_emp_per_info');
		$this->db->from('pr_emp_com_info');
		$this->db->from('pr_attn_monthly');
			$this->db->from('pr_dept');
			$this->db->from('pr_section');
			$this->db->from('pr_line_num');
			$this->db->from('pr_designation');
			$this->db->where('pr_emp_com_info.emp_desi_id = pr_designation.desig_id');
			$this->db->where('pr_emp_com_info.emp_dept_id = pr_dept.dept_id');
			$this->db->where('pr_emp_com_info.emp_sec_id = pr_section.sec_id');
			$this->db->where('pr_emp_com_info.emp_line_id = pr_line_num.line_id');
		$this->db->where('pr_emp_per_info.emp_id = pr_emp_com_info.emp_id');
		$this->db->where('pr_emp_per_info.emp_id = pr_attn_monthly.emp_id');
		$this->db->like("pr_attn_monthly.att_month",$salary_month);
		if($col_all !='all')
		{
			if($col_dept !="undefined")
			{
				$this->db->where("pr_emp_com_info.emp_dept_id", $col_dept);
			}
			if($col_section !="undefined")
			{
				$this->db->where("pr_emp_com_info.emp_sec_id", $col_section);
			}
			if($col_line !="undefined")
			{
				$this->db->where("pr_emp_com_info.emp_line_id ", $col_line);
			}
			if($col_desig !="undefined")
			{
				$this->db->where("pr_emp_com_info.emp_desi_id", $col_desig);
			}
			
		}
		$this->db->order_by("pr_dept.dept_name");
		$this->db->order_by("pr_section.sec_name");
		$this->db->order_by("pr_line_num.line_name");
		$this->db->order_by("pr_designation.desig_name");
		$this->db->order_by("pr_emp_com_info.emp_id");
		$query = $this->db->get();	
		
		if($query->num_rows > 0)
		{	
			return $query ;
		}
		else
		{
			return "Soryy! Requested list is empty";
		}
	}
	
	function monthly_salary_sheet($salary_month, $col_desig, $col_line, $col_section, $col_dept, $col_all,$emp_status)
	{
		$this->db->select('pr_emp_per_info.emp_full_name,pr_designation.desig_name,pr_emp_com_info.emp_join_date,pr_grade.gr_name,pr_pay_scale_sheet.*');
		$this->db->from('pr_emp_per_info');
		$this->db->from('pr_emp_com_info');
		$this->db->from('pr_grade');
		$this->db->from('pr_pay_scale_sheet');
			$this->db->from('pr_dept');
			$this->db->from('pr_section');
			$this->db->from('pr_line_num');
			$this->db->from('pr_designation');
			$this->db->where('pr_emp_com_info.emp_desi_id = pr_designation.desig_id');
			$this->db->where('pr_emp_com_info.emp_dept_id = pr_dept.dept_id');
			$this->db->where('pr_emp_com_info.emp_sec_id = pr_section.sec_id');
			$this->db->where('pr_emp_com_info.emp_line_id = pr_line_num.line_id');
		$this->db->where('pr_emp_per_info.emp_id = pr_emp_com_info.emp_id');
		$this->db->where('pr_emp_com_info.emp_sal_gra_id = pr_grade.gr_id');
		$this->db->where('pr_emp_com_info.emp_cat_id',$emp_status);
		//`pr_emp_com_info`.`emp_cat_id` = 5 
		$this->db->where('pr_emp_per_info.emp_id = pr_pay_scale_sheet.emp_id');
		$this->db->where("pr_pay_scale_sheet.salary_month = '$salary_month'");
		//$this->db->order_by("pr_emp_com_info.emp_line_id");
		//$this->db->order_by("pr_designation.desig_name");
		if($col_all !='all')
		{
			if($col_dept !="undefined")
			{
				$this->db->where("pr_emp_com_info.emp_dept_id", $col_dept);
			}
			if($col_section !="undefined")
			{
				$this->db->where("pr_emp_com_info.emp_sec_id", $col_section);
			}
			if($col_line !="undefined")
			{
				$this->db->where("pr_emp_com_info.emp_line_id ", $col_line);
			}
			if($col_desig !="undefined")
			{
				$this->db->where("pr_emp_com_info.emp_desi_id", $col_desig);
			}
			
		}
		$this->db->order_by("pr_dept.dept_name");
		$this->db->order_by("pr_section.sec_name");
		$this->db->order_by("pr_line_num.line_name");
		$this->db->order_by("pr_designation.desig_name");
		$this->db->order_by("pr_emp_com_info.emp_id");
		$query = $this->db->get();	
		//echo $this->db->last_query();	
		return $query->result();

	}
	
	function job_card($start_date, $end_date, $emp_id)
	{
		
		$table = "temp_$emp_id";
		if(!$this->db->table_exists($table))
		{
			echo "Employee doest not exist!";
			return;
		}
		
		$year= trim(substr($start_date,0,4));
		$month = trim(substr($start_date,5,2));
		$start_tarik = trim(substr($start_date,8,2));
		$tarik = trim(substr($end_date,8,2));
		
		$first	= $start_date;
		$second = $end_date;
		
		$present_count = 0;
		$absent_count = 0;
		$leave_count = 0;
		$ot_count = 0;
		$late_count = 0;
		$wk_off_count = 0;
		$holiday_count = 0;
		$lunch_out ='';
		$lunch_in = '';
		
			
		?>
		<div align="center" style=" margin:0 auto;  overflow:hidden; font-family: 'Times New Roman', Times, serif;"><span style="font-size:18px; font-weight:bold;">Indigo Washing Limited.</span><br />
  <span class="style1" style="font-size:13px; font-weight:bold;">Haji Dudu Miah Road, Zinu Market , Pagar, Tongi, Gazipur.</span></div>
		<div align="center" style=" margin:0 auto;  overflow:hidden; font-family: 'Times New Roman', Times, serif;"><span style="font-size:13px; font-weight:bold;">
		Job card Report from 
		<?php
		$year= trim(substr($start_date,0,4));
		$month = trim(substr($start_date,5,2));
		$tarik = trim(substr($start_date,8,2));
		$start_date_format = date("d-M-Y", mktime(0, 0, 0, $month, $tarik, $year));
		echo $start_date_format;
		
		echo " - TO - ";
		
		$year= trim(substr($end_date,0,4));
		$month = trim(substr($end_date,5,2));
		$tarik = trim(substr($end_date,8,2));
		$end_date_format = date("d-M-Y", mktime(0, 0, 0, $month, $tarik, $year));
		echo $end_date_format;
		
		?></span>
		<br />
		<br />
		<?php
		$this->db->distinct();
		$this->db->select('pr_emp_per_info.emp_full_name,pr_designation.desig_name,pr_dept.dept_name,pr_section.sec_name,pr_line_num.line_name,pr_emp_com_info.emp_join_date,pr_id_proxi.proxi_id');
		$this->db->from('pr_emp_per_info');
		$this->db->from('pr_emp_com_info');
		$this->db->from('pr_attn_monthly');
		$this->db->from('pr_id_proxi');
		$this->db->from('pr_dept');
		$this->db->from('pr_section');
		$this->db->from('pr_line_num');
		$this->db->from('pr_designation');
		$this->db->where('pr_emp_com_info.emp_desi_id = pr_designation.desig_id');
		$this->db->where('pr_emp_com_info.emp_dept_id = pr_dept.dept_id');
		$this->db->where('pr_emp_com_info.emp_sec_id = pr_section.sec_id');
		$this->db->where('pr_emp_com_info.emp_line_id = pr_line_num.line_id');
		$this->db->where('pr_emp_per_info.emp_id = pr_emp_com_info.emp_id');
		$this->db->where('pr_id_proxi.emp_id = pr_emp_com_info.emp_id');
		$this->db->where('pr_emp_per_info.emp_id', $emp_id);
		
		$query = $this->db->get();
		//echo $this->db->last_query();
		echo "<table border='0' style='font-size:13px;' width='480'>";
		foreach($query->result() as $row)
		{
			echo "<tr>";
			echo "<td width='70'>";
			echo "<strong>Emp ID:</strong>";
			echo "</td>";
			echo "<td width='200'>";
			echo $emp_id;
			echo "</td>";
			echo "<td width='50'>";
			echo "<strong>Name :</strong>";
			echo "</td>";
			echo "<td width='150'>";
			echo $row->emp_full_name;
			echo "</td>";
			echo "</tr>";
			
			echo "<tr>";
			echo "<td >";
			echo "<strong>Proxi NO. :</strong>";
			echo "</td>";
			echo "<td >";
			echo $row->proxi_id;
			echo "</td>";
			
			echo "<td>";
			echo "<strong>Section :</strong>";
			echo "</td>";
			echo "<td >";
			echo $row->sec_name;
			echo "</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td>";
			echo "<strong>Line :</strong>";
			echo "</td>";
			echo "<td>";
			echo $row->line_name;
			echo "</td>";
			echo "<td>";
			echo "<strong>Desig :</strong>";
			echo "</td>";
			echo "<td>";
			echo $row->desig_name;
			echo "</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td>";
			echo "<strong>DOJ :</strong>";
			echo "</td>";
			echo "<td>";
			
			$emp_join_date = $row->emp_join_date;
			$emp_join_date_year		= trim(substr($emp_join_date,0,4));
			$emp_join_date_month	= trim(substr($emp_join_date,5,2));
			$emp_join_date_day		= trim(substr($emp_join_date,8,2));
			$emp_join_date 			= date("d-M-y", mktime(0, 0, 0, $emp_join_date_month, $emp_join_date_day, $emp_join_date_year));
			
			echo $emp_join_date;
			echo "</td>";
			
			echo "<td >";
			echo "<strong>Dept :</strong>";
			echo "</td>";
			echo "<td >";
			echo $row->dept_name;
			echo "</td>";
			echo "</tr>";
			
		}
		echo "<table>";
		
		
		echo "<table border='1' bordercolor='#000000' cellspacing='0' cellpadding='0' style='text-align:center; font-size:13px; '> <th>Date</th><th>In Time</th><th>Out Time</th><th>Leave</th><th>Attn.Status</th><th>Overtime</th><th>Lunch Out Time</th><th>Lunch IN Time</th><th>Remarks</th>";
		
		$resig_or_left_date = $this->resig_or_left_date($emp_id);
		$compare_resig_or_left_month = trim(substr($resig_or_left_date,0,7));
		
		$year_month = "$year-$month";
		
		if($year_month == $compare_resig_or_left_month)
		{
			$resig_or_left_tarik = trim(substr($resig_or_left_date,8,2));
			$tarik = $resig_or_left_tarik;
		}
		else
		{
			$tarik = $tarik;
		}
		
		for($i = $start_tarik; $i <= $tarik; $i++)
		{
			
			$date = date("Y-m-d", mktime(0, 0, 0, $month, $i, $year));
			$leave = $this->leave_per_emp($date, $emp_id);
			
			$weekend = $this->search_weekend($date);
			
			$holiday = $this->holiday_calculation($date);
				
			$date_format = date("d-M-y", mktime(0, 0, 0, $month, $i, $year));
			echo "<tr>";
			
			echo "<td>&nbsp;";
			echo $date_format;
			echo "</td>";
					
			
			
			$this->db->select("pr_emp_com_info.ot_entitle");
			$this->db->from("pr_emp_com_info");
			$this->db->where("pr_emp_com_info.emp_id = '$emp_id'");
			$query1 = $this->db->get();
			$row1 = $query1->row();
			$ot_status  = $row1->ot_entitle;
//============================================	
			$emp_shift = $this->emp_shift_check($emp_id, $date);
			
			$this->db->select("shift_id");
			$this->db->from("pr_emp_shift_schedule");
			$this->db->where("sh_type", $emp_shift);
			$query = $this->db->get();
			$row = $query->row();
			
			$schedule = $this->schedule_check($emp_shift);
			//print_r($schedule);
			$start_time		=  $schedule[0]["in_start"]; 
			$late_time 		=  $schedule[0]["late_start"]; 
			$end_time   	=  $schedule[0]["in_end"];
			$out_start_time	=  $schedule[0]["out_start"];
			$out_end_time	=  $schedule[0]["out_end"];	
			
			$hour = trim(substr($out_end_time,0,2));
			$minute = trim(substr($out_end_time,3,2));
			$sec = trim(substr($out_end_time,6,2));
			$am_pm = date("A", mktime($hour, $minute, $sec, 0, 0, 0));
			$out_date = $date;
			if($am_pm == "AM")
			{
				//echo $am_pm;
				$now = strtotime($out_date);
				$datestr = strtotime("+1 day",$now);
				$out_date = date("Y-m-d", $datestr);
				$out_date = $out_date;
			}
			else
			{
				$out_date = $date;
			}	
//============================================			
			if($date == $leave)
			{
				$in_time = "";
			}
			else
			{
				if($weekend == true)
				{
					$in_time = "";
				}
				elseif($holiday == true)
				{
					$in_time = "";
				}
				else
				{
					$in_time = $this->time_check_in($date, $start_time, $end_time, $table);
					$lunch_out_start = "12:55:00";
					$lunch_out_end = "15:00:00";
					$lunch_out = $this->time_check_in($date, $lunch_out_start , $lunch_out_end , $table);
				}
			}
			
			
			if($in_time !='')
			{
				$hour = trim(substr($in_time,0,2));
				$minute = trim(substr($in_time,3,2));
				$sec = trim(substr($in_time,6,2));
				$time_format = date("h:i:s A", mktime($hour, $minute, $sec, 0, 0, 0));
				$in_time_format = $time_format;
			}
			else
			{
				$in_time_format='';
			}
			echo "<td>&nbsp;";
			echo $in_time_format;
			echo "</td>";
					
			if($date == $leave)
			{
				$out_time = "";
			}
			else
			{
				if($weekend == true)
				{
					$out_time = "";
				}
				elseif($holiday == true)
				{
					$out_time = "";
				}
				else
				{
					$out_time = $this->time_check_out($out_date, $out_start_time, $out_end_time, $table);
					$lunch_in_start = "13:30:01";
					$lunch_in_end = "15:00:00";
					$lunch_in = $this->time_check_in($date, $lunch_in_start , $lunch_in_end , $table);
				}
			}
			
			if($out_time !='')
			{
				$hour = trim(substr($out_time,11,2)); 
				$minute = trim(substr($out_time,14,2)); 
				$sec = trim(substr($out_time,17,2)); 
				$time_format = date("h:i:s", mktime($hour, $minute, $sec, 0, 0, 0)); 
				
				//$out_time_format = $time_format;
				if($am_pm == "PM") 
				{ 
					if($time_format > date("07:40:00")) 
					{ 
						$hour=$hour-1; 
						$time_format = date("h:i:s A", mktime($hour, $minute, $sec, 0, 0, 0)); 
						$out_time_format = $time_format; 
					} 
					else 
					{ 
						$time_format = date("h:i:s A", mktime($hour, $minute, $sec, 0, 0, 0)); 
						$out_time_format = $time_format; 
					} 
				}
				else
				{ 
					if($time_format > date("07:40:00")) 
					{ 
						$hour=$hour-1; 
						$time_format = date("h:i:s A", mktime($hour, $minute, $sec, 0, 0, 0)); 
						$out_time_format = $time_format; 
					}
					else 
					{ 
						$time_format = date("h:i:s A", mktime($hour, $minute, $sec, 0, 0, 0)); 
						$out_time_format = $time_format; 
					} 
				}
			}
			else
			{
				$out_time_format='';
			}
			echo "<td>&nbsp;";
			echo $out_time_format;
			echo "</td>";
			
			
			if($date == $leave)
			{
				$leave = "Leave";
			}
			else
			{
				$leave = "";
			}
			echo "<td>&nbsp;";
			echo $leave;
			echo "</td>";
			
			$ot_hour='';
				if($in_time !='' and $out_time !='')
				{
					
					$status ="P";
					$present_count++;
					if($ot_status == 0)
					{
						
						if($row->shift_id == "1")
						{
							$time_one = "$out_date 17:40:00";
							$time_two = "$out_date 18:40:00";
							$time_tre = "$out_date 19:40:00";
							$time_fou = "$out_date 20:40:00";
						}
						elseif($row->shift_id == "2")
						{
							$time_one = "$out_date 05:40:00";
							$time_two = "$out_date 06:40:00";
							$time_tre = "$out_date 07:40:00";
							$time_fou = "$out_date 08:40:00";
						}
						elseif($row->shift_id == "3")
						{
							$time_one = "$out_date 17:40:00";
							$time_two = "$out_date 18:40:00";
							$time_tre = "$out_date 19:40:00";
							$time_fou = "$out_date 20:40:00";
						}
						
											
						if($out_time > $time_one and $out_time < $time_two)
						{
							$ot_hour = $ot_hour + 1;  
							
						}
						elseif($out_time > $time_two and $out_time < $time_tre)
						{
							$ot_hour = $ot_hour + 2; 
							
						}
						elseif($out_time > $time_tre and $out_time < $time_fou) 
						{
							$ot_hour = $ot_hour + 2; 
						}
						//echo "<br>".$out_date."=one=>$time_one=two=>$time_two=Three=>$time_tre=Four=>$time_fou";
						
						//$ot = $out_time - $in_time - 9;
						$ot_count = $ot_count + $ot_hour;
					}
					else
					{
						$ot_hour = 0;
					}
				}
				elseif( $leave !='')
				{
					$status ="Leave";
					$leave_count++;
				}
				elseif($in_time =='' and $out_time =='')
				{
					if($weekend == true)
					{
						$status ="Work Off";
						$wk_off_count++;
					}
					elseif($holiday == true)
					{
						$status ="Holiday";
						$holiday_count++;
					}
					else
					{			
						$status ="A";
						$absent_count++;
					}
				}
				else
				{
					$status ="P(Error)";
				}
			echo "<td>&nbsp;";
			echo $status;
			echo "</td>";
			
			
			echo "<td>&nbsp;";
			echo $ot_hour;
			echo "</td>";
			
			if($lunch_out !='')
			{
				$hour = trim(substr($lunch_out,0,2));
				$minute = trim(substr($lunch_out,3,2));
				$sec = trim(substr($lunch_out,6,2));
				$lunch_out = date("h:i:s A", mktime($hour, $minute, $sec, 0, 0, 0));
				$lunch_out = $lunch_out;
			}
			else
			{
				$lunch_out='';
			}
			echo "<td>&nbsp;";
			echo $lunch_out;
			echo "</td>";
			
			if($lunch_in !='')
			{
				$hour = trim(substr($lunch_in,0,2));
				$minute = trim(substr($lunch_in,3,2));
				$sec = trim(substr($lunch_in,6,2));
				$lunch_in = date("h:i:s A", mktime($hour, $minute, $sec, 0, 0, 0));
				$lunch_in = $lunch_in;
			}
			else
			{
				$lunch_in='';
			}
			echo "<td>&nbsp;";
			echo $lunch_in;
			echo "</td>";
			
			$remark ='';
			
			if($in_time > $late_time )
			{
				$remark ="Late";
				$late_count++;
			}
			echo "<td>&nbsp;";
			echo $remark;
			echo "</td>";
			
		
			
			
			echo "</tr>";
		}
		echo "</table>";
		echo "<br>";
		echo "<table border='0' style='font-size:13px;'>";
		echo "<tr align='center'>";
		
		echo "<td width='75' style='border-bottom:#000000 1px solid;'>";
		echo "PRESENT";
		echo "</td>";
		
		echo "<td width='75' style='border-bottom:#000000 1px solid;'>";
		echo "ABSENT";
		echo "</td>";
		
		echo "<td width='75' style='border-bottom:#000000 1px solid;'>";
		echo "LEAVE";
		echo "</td>";
		
		echo "<td width='75' style='border-bottom:#000000 1px solid;'>";
		echo "OVERTIME";
		echo "</td>";
		
		echo "<td width='75' style='border-bottom:#000000 1px solid;'>";
		echo "LATE COUNT";
		echo "</td>";
		
		echo "<td width='75' style='border-bottom:#000000 1px solid;'>";
		echo "WORK OFF";
		echo "</td>";
		
		echo "<td width='75' style='border-bottom:#000000 1px solid;'>";
		echo "HOLIDAY";
		echo "</td>";
		
		echo "</tr>";
		
		echo "<tr align='center'>";
			
		echo "<td>";
		echo $present_count;
		echo "</td>";
		
		echo "<td>";
		echo $absent_count;
		echo "</td>";
		
		echo "<td>";
		echo $leave_count;
		echo "</td>";
		
		echo "<td>";
		echo $ot_count;
		echo "</td>";
		
		echo "<td>";
		echo $late_count;
		echo "</td>";
		
		echo "<td>";
		echo $wk_off_count;
		echo "</td>";
		
		echo "<td>";
		echo $holiday_count;
		echo "</td>";
		
		echo "</tr>";
	
	}
	
	/*function job_card($start_date, $end_date, $emp_id)
	{
		$table = "temp_$emp_id";
		
		$year= trim(substr($start_date,0,4));
		$month = trim(substr($start_date,5,2));
		$tarik = trim(substr($end_date,8,2));
		
		$first	= $start_date;
		$second = $end_date;
		
		$present_count = 0;
		$absent_count = 0;
		$leave_count = 0;
		$ot_count = 0;
		$late_count = 0;
		
		
		echo "<table border='1' bordercolor='#000000' cellspacing='0' cellpadding='0' style='text-align:center'> <th>Date</th><th>In Time</th><th>Out Time</th><th>Leave</th><th>Attn.Status</th><th>Overtime</th><th>Remarks</th>";
		
		
		for($i = 1; $i <= $tarik; $i++)
		{
			
			$date = date("Y-m-d", mktime(0, 0, 0, $month, $i, $year));
			$leave = $this->leave_per_emp($date, $emp_id);
			
			$weekend = $this->search_weekend($date);
			
			$date_format = date("d-M-y", mktime(0, 0, 0, $month, $i, $year));
			echo "<tr>";
			
			echo "<td>&nbsp;";
			echo $date_format;
			echo "</td>";
					
			$start_time = "07:45:00";
			$end_time	= "08:30:00";
			
			if($date == $leave)
			{
				$in_time = "";
			}
			else
			{
				if($weekend == true)
				{
					$in_time = "";
				}
				else
				{
					$in_time = $this->time_check_in($date, $start_time, $end_time, $table);
				}
			}
			
			
			if($in_time !='')
			{
				$hour = trim(substr($in_time,0,2));
				$minute = trim(substr($in_time,3,2));
				$sec = trim(substr($in_time,6,2));
				$time_format = date("h:i:s A", mktime($hour, $minute, $sec, 0, 0, 0));
				$in_time_format = $time_format;
			}
			else
			{
				$in_time_format='';
			}
			echo "<td>&nbsp;";
			echo $in_time_format;
			echo "</td>";
					
			$start_time = "17:00:00";
			$end_time	= "19:30:00";
			if($date == $leave)
			{
				$out_time = "";
			}
			else
			{
				if($weekend == true)
				{
					$out_time = "";
				}
				else
				{
					$out_time = $this->time_check_out($date, $start_time, $end_time, $table);
				}
			}
			
			if($out_time !='')
			{
				$hour = trim(substr($out_time,0,2));
				$minute = trim(substr($out_time,3,2));
				$sec = trim(substr($out_time,6,2));
				$time_format = date("h:i:s A", mktime($hour, $minute, $sec, 0, 0, 0));
				$out_time_format = $time_format;
			}
			else
			{
				$out_time_format='';
			}
			echo "<td>&nbsp;";
			echo $out_time_format;
			echo "</td>";
			
			
			if($date == $leave)
			{
				$leave = "Leave";
			}
			else
			{
				$leave = "";
			}
			echo "<td>&nbsp;";
			echo $leave;
			echo "</td>";
			
			$ot='';
				if($in_time !='' and $out_time !='')
				{
					$status ="P";
					$present_count++;
					$ot = $out_time - $in_time - 9;
					$ot_count = $ot_count + $ot;
				}
				elseif( $leave !='')
				{
					$status ="Leave";
					$leave_count++;
				}
				elseif($in_time =='' and $out_time =='')
				{
					if($weekend == true)
					{
						$status ="Wk. Holiday";
					}
					else
					{			
						$status ="A";
						$absent_count++;
					}
				}
				else
				{
					$status ="P(Error)";
				}
			echo "<td>&nbsp;";
			echo $status;
			echo "</td>";
			
			
			echo "<td>&nbsp;";
			echo $ot;
			echo "</td>";
			
			$remark ='';
			if($in_time > "08:05:00" )
			{
				$remark ="Late";
				$late_count++;
			}
			echo "<td>&nbsp;";
			echo $remark;
			echo "</td>";
			
		
			
			
			echo "</tr>";
		}
		echo "</table>";
		
		echo "<br>";
		echo "PRESENT&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; 
		echo "&nbsp;&nbsp;&nbsp;&nbsp;ABSENT&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		echo "&nbsp;&nbsp;&nbsp;&nbsp;LEAVE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		echo "&nbsp;&nbsp;&nbsp;&nbsp;OVERTIME&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		echo "&nbsp;&nbsp;&nbsp;&nbsp;LATE COUNT&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		
		echo "<br>";
		echo "________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; 
		echo "&nbsp;&nbsp;&nbsp;&nbsp;________&nbsp;&nbsp;&nbsp;&nbsp;";
		echo "&nbsp;&nbsp;&nbsp;&nbsp;________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		echo "&nbsp;&nbsp;&nbsp;&nbsp;________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		
		echo "<br>";
		echo "&nbsp;&nbsp;&nbsp;&nbsp;$present_count&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; 
		echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$absent_count&nbsp;&nbsp;&nbsp;&nbsp;";
		echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $leave_count &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;";
		echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$ot_count&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		echo  "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;$late_count&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		
		
	
	}*/
	
	function search_weekend($date)
	{
		$dt = strtotime($date);
		
		$day = date("D", $dt);
		if($day == "Fri")
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	function leave_per_emp($date, $emp_id)
	{
		$this->db->select("start_date,leave_type");
		$this->db->where("start_date = '$date'");
		$this->db->where("emp_id = '$emp_id'");
		$query = $this->db->get("pr_leave_trans");
		$leave = array();
		foreach ($query->result() as $row)
		{
			$leave = $row->start_date;
		}
		return $leave;
	}
	
	function holiday_calculation($date)
	{
		$this->db->select("start_date");
		$this->db->where("start_date = '$date'");
		$query = $this->db->get("pr_holiday");
		if($query->num_rows > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	function time_check_in($date, $start_time, $end_time, $table)
	{
		$this->db->select("date_time");
		$this->db->where("trim(substr(date_time,1,10)) = '$date'");
		$this->db->where("trim(substr(date_time,11,19)) BETWEEN '$start_time' and '$end_time'");
		$this->db->order_by("date_time","ASC");
		$this->db->limit("1");
		$query = $this->db->get($table);
		$time ="";
		foreach ($query->result() as $row)
		{
			$time = $row->date_time;
		}
		$time = trim(substr($time,11,19));
		return $time;
	}
	
	function time_check_out($date, $start_time, $end_time, $table)
	{
		$this->db->select("date_time");
		$this->db->where("trim(substr(date_time,1,10)) = '$date'");
		$this->db->where("trim(substr(date_time,11,19)) BETWEEN '$start_time' and '$end_time'");
		$this->db->order_by("date_time","DESC");
		$this->db->limit("1");
		$query = $this->db->get($table);
		$time ="";
		foreach ($query->result() as $row)
		{
			$time = $row->date_time;
		}
		//$time = trim(substr($time,11,19));
		return $time;
	}
	
	function time_check_out2($start_time, $end_time, $table)
	{
		$this->db->select("date_time");
		//$this->db->where("trim(substr(date_time,1,10)) = '$date'");
		$this->db->where("date_time BETWEEN '$start_time' and '$end_time'");
		$this->db->order_by("date_time","DESC");
		$this->db->limit("1");
		$query = $this->db->get($table);
		$time ="";
		foreach ($query->result() as $row)
		{
			$time = $row->date_time;
		}
		//$time = trim(substr($time,11,19));
		return $time;
	}
	
	function dump()
	{
		/*for($i = 301; $i <=824;$i++)
		{
			$data = array('emp_id' => $i, 'proxi_id' => $i);
			$this->db->insert('pr_id_proxi',$data);
		
			$data = array('emp_id' => $i, 'emp_dept_id' => 2, 'emp_sec_id' => 1, 'emp_line_id' => 3, 'emp_desi_id' => 2, 'emp_sal_gra_id' =>2 , 'emp_cat_id' => 2, 'emp_shift' => 1, 'gross_sal' => 3840, 'emp_join_date' =>'2011-02-24');
			$this->db->insert('pr_emp_com_info',$data);
		
			$data = array('emp_id' => $i, 'emp_full_name' => 'Abdul Kuddus', 'emp_fname' => 'Jahirul Islam', 'emp_mname' => 'Momtaj Begum', 'emp_dob' => '1978-09-11', 'emp_religion' => '1', 'emp_sex' => '1', 'emp_blood' => '3');
			$this->db->insert('pr_emp_per_info',$data);
		}*/
		
		
		/*	for($k =1; $k<=28; $k++)
			{
				echo "<br>".$datetime = "2011-02-$k 19:02:09";
				for($i = 301; $i <=824;$i++)
				{
					$data = array('device_id' =>1, 'proxi_id' => $i, 'date_time' => $datetime);
					$this->db->insert('att_2011_02',$data);
				}
			}
		*/
	}
	
	function daily_presentdb($present_status,$status, $year_month)
	{
			$this->db->select('*');
			$this->db->from('pr_attn_monthly');
			$this->db->like("att_month", $year_month);
			$query = $this->db->get();	
			$data=array();
			$field=10;
			//$present_status="P";
			$startdays = $this->uri->segment(3);
		    $enddays = $this->uri->segment(4);
			
		//	$startdays=15;
			//$enddays=26 ;
			echo "<h3>$status</h3>";
			echo "<table border='1'>";
			echo "<tr bgcolor='#6699FF'>";
			echo "<td> Employee ID </td> ";
			echo "<td> Proxi ID </td> ";
			echo "<td> Name </td> ";
			echo "<td> Join Date </td> ";
			echo "<td> Designation </td> ";
			for ( $k=$startdays ; $k <= $enddays ; $k++ )
			{
				echo "<th >$k</th>";
			}
			echo "<td> Total </td> ";
			
			$data=array();
			foreach ($query->result_array() as $rows => $row)
			{
				$emp_id=$row['emp_id'];
				//$data['emp_id'][]=$row['emp_id'];
				$data['result'][] = $this->daily_ab($emp_id,$present_status,$startdays,$enddays, $year_month);
				
					
      		}
			//print_r($data);
				
	}
	
	
	function daily_ab($emp_id,$present_status,$startdays,$enddays, $year_month)
	{
		$this->db->select("");
		$this->db->where("emp_id",$emp_id);
		$this->db->like("att_month", $year_month);
		$query = $this->db->get("pr_attn_monthly");
		//echo $this->db->last_query();
		$count = 0;
		
		//echo $emp_id;
		$data=array();
		$this->db->select("proxi_id");
		$this->db->where("emp_id",$emp_id);
		$query2 = $this->db->get("pr_id_proxi");
		foreach($query2->result() as $rows)
		{
			$proxid=$rows->proxi_id;
		}
		$this->db->select("emp_full_name");
		$this->db->where("emp_id",$emp_id);
		$query3 = $this->db->get("pr_emp_per_info");
		foreach($query3->result() as $rows)
		{
			$emp_full_name=$rows->emp_full_name;
		}
		
		$this->db->select("emp_join_date,emp_desi_id");
		$this->db->where("emp_id",$emp_id);
		$query4 = $this->db->get("pr_emp_com_info");
		foreach($query4->result() as $rows)
		{
			$emp_join_date=$rows->emp_join_date;
			$emp_desi_id=$rows->emp_desi_id;
			$this->db->select("desig_name");
			$this->db->where("desig_id",$emp_desi_id);
			$query5 = $this->db->get("pr_designation");
			foreach($query5->result() as $rows)
			{
				$desig_name=$rows->desig_name;
			}
			
		}
		
		
		echo "<tr><td>$emp_id</td><td>$proxid</td><td>$emp_full_name</td><td>$emp_join_date</td><td>$desig_name</td>";
		
		foreach($query->result_array() as $rows => $value)
		{
			for($i=$startdays ; $i<= $enddays ; $i++)
			{
				$i = date("d", mktime(0,0,0,0,$i,0));
				//$idate = date("d", mktime(0, 0, 0, 0, $i, 0));
				 $date="date_$i";
				
				 
				if($value[$date] == $present_status)
				{
					//echo $value[$date];
		echo "<td>$value[$date]</td>";	
					$count++;
				}else
				{
				echo "    ";
				echo "<td>&nbsp;</td>";	
				}
			}
		}
		echo "<td>$count</td>";	
		 echo "</tr>";
	
	   return $count;
	  
	   echo "</table>";
	}
	
	function late_commer_report_db($start_date,$end_date)
	{
		$start_time = '08:05:00';
		$end_time = '09:00:00';
		$year = $this->uri->segment(3);
	    $month = $this->uri->segment(4);
	    //$month = $this->uri->segment(5);
	    //$year = $this->uri->segment(6);
		$att_table="att_".$year."_".$month;
		$this->db->select('date_time');
		$this->db->from($att_table);
		$query = $this->db->get();
		foreach($query->result() as $rows)
		{
			//echo "time".$time=trim(substr($rows->date_time,10));
			//echo "date".$date=trim(substr($rows->date_time,0,10));
		$select = "$att_table.proxi_id,pr_id_proxi.emp_id,pr_emp_per_info.emp_full_name,pr_section.sec_name,pr_line_num.line_name,pr_designation.desig_name,$att_table.date_time";
		$this->db->select($select);
		$this->db->from($att_table);
		$this->db->from('pr_id_proxi');
		$this->db->from('pr_emp_per_info');
		$this->db->from('pr_emp_com_info');
		$this->db->from('pr_section');
		$this->db->from('pr_designation');
		$this->db->from('pr_dept');
		$this->db->from('pr_line_num');
		//$start_date = "$start_date 08:05:00";
		//$end_date = "$end_date 09:00:00";
$where="$att_table.proxi_id = pr_id_proxi.proxi_id and pr_id_proxi.emp_id = pr_emp_per_info.emp_id and pr_emp_per_info.emp_id = pr_emp_com_info.emp_id  and pr_emp_com_info.emp_sec_id = pr_section.sec_id and pr_emp_com_info.emp_desi_id = pr_designation.desig_id and pr_emp_com_info.emp_dept_id = pr_dept.dept_id and pr_emp_com_info.emp_line_id = pr_line_num.line_id and  trim(substr($att_table.date_time,1,10)) BETWEEN '$start_date' and '$end_date' and trim(substr($att_table.date_time,11,14)) BETWEEN '$start_time' and '$end_time' ";
		

//$where="att_2011.proxi_id = pr_id_proxi.proxi_id and pr_id_proxi.emp_id = pr_emp_per_info.emp_id and pr_emp_per_info.emp_id = pr_emp_com_info.emp_id  and //pr_emp_com_info.emp_sec_id = pr_section.sec_id and pr_emp_com_info.emp_desi_id = pr_designation.desig_id and pr_emp_com_info.emp_dept_id = pr_dept.dept_id and //pr_emp_com_info.emp_line_id = pr_line_num.line_id and  trim(substr(att_2011.date_time,1,10))  BETWEEN '$start_date' and '$end_date' and trim(substr(att_2011.date_time,11))  >  //'$end_time'";

		
		$this->db->where($where);
		$query = $this->db->get();
		//echo $this->db->last_query();
    	return $query->result();
		}
	}
	
	//   23-03-2011  sayed start //
	function search_line_name_db()
	{
		$this->db->where('line_name',$this->input->post('linename'));
		$query = $this->db->get('pr_line_num');
		if( $num_rows = $query->num_rows() !=0 )
		{
			foreach ($query->result() as $row)
			{
				$data = array(
						'line_id'	=> $row->line_id,
						'line_name'  => $row->line_name,
						
				);
				 
			}
			return $data = implode("-*-",$data);
		}
		else
		{
			return "Line name does not exist";
		}
		
		
	}
	
	
	function update_linename_db()
	{
		
		$id=$this->input->post('lineid');
		$this->db->select("line_id");
		$this->db->where('line_id',$id);
		$query = $this->db->get("pr_line_num");
		$num_row = $query->num_rows();
		if($num_row > 0 )
		{
			$data = array(
						'line_name'	=> $this->input->post('linename')
				);
				
				$this->db->where('line_id',$id);
				if($this->db->update('pr_line_num', $data)) 
				{
					echo "Updated successfully";
				}
				else
				{
					echo "Update failed";
				}
		}
		else
		{
		 	echo "Line name does not exist";
		}
	
	}
	
	
	
	function save_linename()
	{
		$this->db->select('line_name');
		$this->db->where('line_name',$this->input->post('linename'));
		$query = $this->db->get('pr_line_num');
		$num_rows = $query->num_rows(); 
		
		if( $num_rows > 0)
		{
			return "Line Already Exist!";
		}
		else
		{
		
			$data = array(
					'line_name'	=> $this->input->post('linename')
					
			);
			
			if($this->db->insert('pr_line_num', $data))
			{
				return "Line name inserted Successfully";
			} 
			else
			{
				return "FAILED";
			}
		}
		
	
	}
	
	
	
	
	
	function delete_linename()
	{
		$linename=$this->input->post('linename');
		$this->db->select("line_name");
		$this->db->where('line_name',$linename);
		$query = $this->db->get("pr_line_num");
		$num_row = $query->num_rows();
		if($num_row > 0 )
		{
			$this->db->where('line_name',$linename);
			if($this->db->delete('pr_line_num'))
			{
				return "Line name deleted successfully";
			} 
			else
			{
				return "Delete failed";
			}
		}
		else
		{
		 	return "Line name does not exist";
		}
		
	}

	
	function delete_designationname()
	{
		$designationname=$this->input->post('designationname');
		$this->db->select("desig_name");
		$this->db->where('desig_name',$designationname);
		$query = $this->db->get("pr_designation");
		$num_row = $query->num_rows();
		if($num_row > 0 )
		{
			$this->db->where('desig_name',$designationname);
			if($this->db->delete('pr_designation'))
			{
				return "Designation name deleted successfully";
			} 
			else
			{
				return "Delete failed";
			}
		}
		else
		{
		 	return "Designation name does not exist";
		}
		
	}
	
	
	
	function update_designation()
	{
		$id=$this->input->post('designationid');
		$this->db->select("desig_id");
		$this->db->where('desig_id',$id);
		$query = $this->db->get("pr_designation");
		$num_row = $query->num_rows();
		if($num_row > 0 )
		{
			$data = array(
						'desig_name'	=> $this->input->post('designationname'),
						'desig_bangla'	=> $this->input->post('designationnamebng')	
				);
				
				$this->db->where('desig_id',$id);
				if($this->db->update('pr_designation', $data)) 
				{
					echo "Updated successfully";
				}
				else
				{
					echo "Update failed";
				}
		}
		else
		{
		 	echo "Designation name does not exist";
		}
	}
	
	
	
	
	
	function save_designationname()
	{
		$this->db->select('desig_name','desig_bangla');
		$this->db->where('desig_name',$this->input->post('designationname'));
		$query = $this->db->get('pr_designation');
		$num_rows = $query->num_rows(); 
		
		if( $num_rows > 0)
		{
			return "Designation Already Exist!";
		}
		else
		{
		
			$data = array(
					'desig_name'	=> $this->input->post('designationname'),
					'desig_bangla'	=> $this->input->post('designationnamebng')
					
			);
			
			if($this->db->insert('pr_designation', $data))
			{
				return "Designation name inserted Successfully";
			} 
			else
			{
				return "FAILED";
			}
		}
		
	
	}
	
	function search_designation_name()
	{
		$this->db->where('desig_name',$this->input->post('designationname'));
		$query = $this->db->get('pr_designation');
		//print_r( $query->result());
		
		
		if( $num_rows = $query->num_rows() !=0 )
		{
			foreach ($query->result() as $row)
			{
				$data = array(
						'desig_id'	=> $row->desig_id,
						'desig_name'  => $row->desig_name,
						'desig_bangla'  => $row->desig_bangla
						
				);
				 
			}
			return $data = implode("-*-",$data);
			
			
		}
		else
		{
			return "Designation name does not exist";
		}
	}
	
	function search_attenb_name_db()
	{
		$this->db->where('ab_rule_name',$this->input->post('check_attn_name'));
		$query = $this->db->get('pr_attn_bonus');
		if( $num_rows = $query->num_rows() !=0 )
		{
			foreach ($query->result() as $row)
			{
				$data = array(
						'ab_id'	=> $row->ab_id,
						'ab_rule_name'  => $row->ab_rule_name,
						'ab_rule'  => $row->ab_rule,
						
				);
				 
			}
			return $data = implode("-*-",$data);
		}
		else
		{
			return "Attendance Bonus name does not exist";
		}
		
		
	}
	
	
	function save_atttbname_db()
	{
		$this->db->select('ab_rule_name');
		$this->db->where('ab_rule_name',$this->input->post('ab_rul_name'));
		$query = $this->db->get('pr_attn_bonus');
		$num_rows = $query->num_rows(); 
		
		if( $num_rows > 0)
		{
			return "Attendance Bonus Name Already Exist!";
		}
		else
		{
		
			$data = array(
					'ab_rule_name'	=> $this->input->post('ab_rul_name'),
					'ab_rule'	=> $this->input->post('ab_rule')
					
			);
			
			if($this->db->insert('pr_attn_bonus', $data))
			{
				return "Attendance Bonus name inserted Successfully";
			} 
			else
			{
				return "FAILED";
			}
		}
		
	
	
	}
	
	function update_attnbname_db()
	{
		
		$id=$this->input->post('attn_b_id');
		$this->db->select("ab_id");
		$this->db->where('ab_id',$id);
		$query = $this->db->get("pr_attn_bonus");
		$num_row = $query->num_rows();
		if($num_row > 0 )
		{
			$data = array(
						'ab_rule_name'	=> $this->input->post('ab_rul_name'),
						'ab_rule'	=> $this->input->post('ab_rule')
				);
				
				$this->db->where('ab_id',$id);
				if($this->db->update('pr_attn_bonus', $data)) 
				{
					echo "Updated successfully";
				}
				else
				{
					echo "Update failed";
				}
		}
		else
		{
		 	echo "Attendance Bonus name does not exist";
		}
	
	}
	
	function delete_attnbname_db()
	{
		$ab_rul_name=$this->input->post('ab_rul_name');
		$this->db->select("ab_rule_name");
		$this->db->where('ab_rule_name',$ab_rul_name);
		$query = $this->db->get("pr_attn_bonus");
		$num_row = $query->num_rows();
		if($num_row > 0 )
		{
			$this->db->where('ab_rule_name',$ab_rul_name);
			if($this->db->delete('pr_attn_bonus'))
			{
				return "Attendance Bonus deleted successfully";
			} 
			else
			{
				return "Delete failed";
			}
		}
		else
		{
		 	return "Attendance Bonus name does not exist";
		}
		
	
	}
	//   23-03-2011  sayed end //
	
	function id_card($start, $end)
	{
		$this->db->select('pr_emp_com_info.emp_id,pr_emp_per_info.emp_full_name,pr_emp_per_info.img_source, pr_designation.desig_name, pr_emp_com_info.emp_join_date, pr_dept.dept_name, pr_section.sec_name');
		$this->db->from('pr_emp_per_info');
		$this->db->from('pr_emp_com_info');
		$this->db->from('pr_designation');
		$this->db->from('pr_dept');
		$this->db->from('pr_section');
		$this->db->where('pr_emp_per_info.emp_id = pr_emp_com_info.emp_id');
		$this->db->where('pr_emp_com_info.emp_desi_id = pr_designation.desig_id');
		$this->db->where('pr_emp_com_info.emp_dept_id = pr_dept.dept_id');
		$this->db->where('pr_emp_com_info.emp_sec_id = pr_section.sec_id');
		$this->db->where("pr_emp_com_info.emp_id BETWEEN $start AND $end");
		$this->db->order_by("pr_emp_com_info.emp_id");
		$query = $this->db->get();
		
		if($query->num_rows() == 0)
		{
			return "Employee ID range does not exist!";
			
		}
		else
		{
			return $query;	
		}
		//print_r($query->result_array());
	}
	
	function appointment_letter($start, $end)
	{
		$this->db->select('pr_emp_com_info.emp_id,pr_emp_com_info.gross_sal,pr_emp_per_info.emp_full_name,pr_emp_per_info.emp_fname,pr_emp_per_info.emp_mname, pr_designation.desig_name, pr_emp_com_info.emp_join_date, pr_dept.dept_name, pr_section.sec_name, pr_id_proxi.proxi_id, pr_emp_add.emp_pre_add, pr_emp_add.emp_par_add');
		$this->db->from('pr_emp_per_info');
		$this->db->from('pr_emp_com_info');
		$this->db->from('pr_designation');
		$this->db->from('pr_dept');
		$this->db->from('pr_section');
		$this->db->from('pr_id_proxi');
		$this->db->from('pr_emp_add');
		$this->db->where('pr_emp_per_info.emp_id = pr_emp_com_info.emp_id');
		$this->db->where('pr_emp_per_info.emp_id = pr_id_proxi.emp_id');
		$this->db->where('pr_emp_per_info.emp_id = pr_emp_add.emp_id');
		$this->db->where('pr_emp_com_info.emp_desi_id = pr_designation.desig_id');
		$this->db->where('pr_emp_com_info.emp_dept_id = pr_dept.dept_id');
		$this->db->where('pr_emp_com_info.emp_sec_id = pr_section.sec_id');
		$this->db->where("pr_emp_com_info.emp_id BETWEEN $start AND $end");
		$this->db->order_by("pr_emp_com_info.emp_id");
		$query = $this->db->get();
		
		if($query->num_rows() == 0)
		{
			return "Employee ID range does not exist!";
			
		}
		else
		{
			return $query;	
		}
		//print_r($query->result_array());
	}
	
	function payslip_report($start, $end, $sal_month, $col_desig, $col_line, $col_section, $col_dept, $col_all)
	{
		
		if($start !='undefine' and $end !='undefine')
		{
			//echo "id=$start";
			//echo "id=$end";
			
			$this->db->select('pr_emp_com_info.emp_id,pr_emp_com_info.gross_sal,pr_emp_per_info.emp_full_name,pr_emp_per_info.emp_fname,pr_emp_per_info.emp_mname, pr_designation.desig_name, pr_emp_com_info.emp_join_date, pr_dept.dept_name, pr_section.sec_name, pr_line_num.line_name , pr_id_proxi.proxi_id, pr_emp_add.emp_pre_add, pr_emp_add.emp_par_add, pr_emp_position.posi_name, pr_pay_scale_sheet.* ');
			$this->db->from('pr_emp_per_info');
			$this->db->from('pr_emp_com_info');
			$this->db->from('pr_designation');
			$this->db->from('pr_dept');
			$this->db->from('pr_section');
			$this->db->from('pr_line_num');
			$this->db->from('pr_id_proxi');
			$this->db->from('pr_emp_add');
			$this->db->from('pr_emp_position');
			$this->db->from('pr_pay_scale_sheet');
			$this->db->where('pr_emp_per_info.emp_id = pr_emp_com_info.emp_id');
			$this->db->where('pr_emp_per_info.emp_id = pr_id_proxi.emp_id');
			$this->db->where('pr_emp_per_info.emp_id = pr_emp_add.emp_id');
			$this->db->where('pr_emp_com_info.emp_desi_id = pr_designation.desig_id');
			$this->db->where('pr_emp_com_info.emp_dept_id = pr_dept.dept_id');
			$this->db->where('pr_emp_com_info.emp_sec_id = pr_section.sec_id');
			$this->db->where('pr_emp_com_info.emp_line_id = pr_line_num.line_id');
			$this->db->where('pr_emp_com_info.emp_position_id = pr_emp_position.posi_id');
			$this->db->where('pr_emp_com_info.emp_id = pr_pay_scale_sheet.emp_id');
			$this->db->where("pr_emp_com_info.emp_id BETWEEN $start AND $end");
			$this->db->order_by("pr_emp_com_info.emp_id");
		
		
			
			$query = $this->db->get();
			//echo $this->db->last_query();
			if($query->num_rows() == 0)
			{
				return "Employee ID range does not exist!";
				
			}
			else
			{
				return $query->result_array();	
			}
			
		}
		else
		{
			//echo "CAT";
			$this->db->select('pr_emp_com_info.emp_id,pr_emp_com_info.gross_sal,pr_emp_per_info.emp_full_name,pr_emp_per_info.emp_fname,pr_emp_per_info.emp_mname, pr_designation.desig_name, pr_emp_com_info.emp_join_date, pr_dept.dept_name, pr_section.sec_name, pr_line_num.line_name , pr_id_proxi.proxi_id, pr_emp_add.emp_pre_add, pr_emp_add.emp_par_add, pr_emp_position.posi_name, pr_pay_scale_sheet.* ');
			$this->db->from('pr_emp_per_info');
			$this->db->from('pr_emp_com_info');
			$this->db->from('pr_designation');
			$this->db->from('pr_dept');
			$this->db->from('pr_section');
			$this->db->from('pr_line_num');
			$this->db->from('pr_id_proxi');
			$this->db->from('pr_emp_add');
			$this->db->from('pr_emp_position');
			$this->db->from('pr_pay_scale_sheet');
			$this->db->where('pr_emp_per_info.emp_id = pr_emp_com_info.emp_id');
			$this->db->where('pr_emp_per_info.emp_id = pr_id_proxi.emp_id');
			$this->db->where('pr_emp_per_info.emp_id = pr_emp_add.emp_id');
			$this->db->where('pr_emp_com_info.emp_desi_id = pr_designation.desig_id');
			$this->db->where('pr_emp_com_info.emp_dept_id = pr_dept.dept_id');
			$this->db->where('pr_emp_com_info.emp_sec_id = pr_section.sec_id');
			$this->db->where('pr_emp_com_info.emp_line_id = pr_line_num.line_id');
			$this->db->where('pr_emp_com_info.emp_position_id = pr_emp_position.posi_id');
			$this->db->where('pr_emp_com_info.emp_id = pr_pay_scale_sheet.emp_id');
			if($col_all !='all')
			{
				if($col_dept !="undefined")
				{
					$this->db->where("pr_emp_com_info.emp_dept_id", $col_dept);
				}
				if($col_section !="undefined")
				{
					$this->db->where("pr_emp_com_info.emp_sec_id", $col_section);
				}
				if($col_line !="undefined")
				{
					$this->db->where("pr_emp_com_info.emp_line_id ", $col_line);
				}
				if($col_desig !="undefined")
				{
					$this->db->where("pr_emp_com_info.emp_desi_id", $col_desig);
				}
				
			}
			$this->db->order_by("pr_dept.dept_name");
			$this->db->order_by("pr_section.sec_name");
			$this->db->order_by("pr_line_num.line_name");
			$this->db->order_by("pr_designation.desig_name");
			$this->db->order_by("pr_emp_com_info.emp_id");
				
			$query = $this->db->get();
			//echo $this->db->last_query();
			if($query->num_rows() == 0)
			{
				return "Employee ID range does not exist!";
				
			}
			else
			{
				return $query->result_array();	
			}
		}
		//print_r($query->result_array());
	}
	
	function daily_report($year, $month, $date, $status, $col_desig, $col_line, $col_section, $col_dept, $col_all)
	{
		$year = $year;
		$month= $month;
		$date = $date;
		$col_desig = $col_desig;
		$col_line = $col_line;
		$col_section = $col_section;
		$col_dept = $col_dept;
		$col_all = $col_all;
		
		//$year = "2011";
		//$month= "04";
		//$date = "02";
		
		//$year = "$year";
		//$month= "$month";
		//$date = "$date";
		$status = $status;
		
		$data = array();
		//$date = $year."-".$month."-".$date;
		
		$att_month  = $year."-".$month."-00";
		$date_field = "date_$date";
		
		//$this->db->distinct();
		$this->db->select("pr_attn_monthly.emp_id,");
		$this->db->from("pr_attn_monthly");
		$this->db->from("pr_emp_com_info");
			$this->db->from('pr_dept');
			$this->db->from('pr_section');
			$this->db->from('pr_line_num');
			$this->db->from('pr_designation');
			$this->db->where('pr_emp_com_info.emp_desi_id = pr_designation.desig_id');
			$this->db->where('pr_emp_com_info.emp_dept_id = pr_dept.dept_id');
			$this->db->where('pr_emp_com_info.emp_sec_id = pr_section.sec_id');
			$this->db->where('pr_emp_com_info.emp_line_id = pr_line_num.line_id');
		$this->db->where($date_field, $status);
		$this->db->where("att_month", $att_month);
		$this->db->where("pr_attn_monthly.emp_id = pr_emp_com_info.emp_id");
		if($col_all !='all')
		{
			if($col_dept !="undefined")
			{
				$this->db->where("pr_emp_com_info.emp_dept_id", $col_dept);
			}
			if($col_section !="undefined")
			{
				$this->db->where("pr_emp_com_info.emp_sec_id", $col_section);
			}
			if($col_line !="undefined")
			{
				$this->db->where("pr_emp_com_info.emp_line_id ", $col_line);
			}
			if($col_desig !="undefined")
			{
				$this->db->where("pr_emp_com_info.emp_desi_id", $col_desig);
			}
			
		}
		$this->db->order_by("pr_dept.dept_name");
		$this->db->order_by("pr_section.sec_name");
		$this->db->order_by("pr_line_num.line_name");
		$this->db->order_by("pr_designation.desig_name");
		$this->db->order_by("pr_emp_com_info.emp_id");
		$query = $this->db->get();
		$this->db->last_query();
		if($query->num_rows() == 0)
		{
			return "Requested list is empty";
		}
		
		$day = $year."-".$month."-".$date;
		
		foreach($query->result() as $rows)
		{
			$emp_id = $rows->emp_id;
			
			$this->db->select('pr_emp_com_info.emp_id,pr_emp_per_info.emp_full_name, pr_designation.desig_name, pr_emp_com_info.emp_join_date, pr_dept.dept_name, pr_section.sec_name, pr_line_num.line_name, pr_id_proxi.proxi_id, pr_emp_shift.shift_name,pr_emp_com_info.emp_cat_id');
			$this->db->from('pr_emp_per_info');
			$this->db->from('pr_emp_com_info');
			$this->db->from('pr_designation');
			$this->db->from('pr_dept');
			$this->db->from('pr_section');
			$this->db->from('pr_line_num');
			$this->db->from('pr_id_proxi');
			$this->db->from('pr_emp_shift');	
			//$this->db->from("pr_emp_status");
			$this->db->where('pr_emp_per_info.emp_id = pr_emp_com_info.emp_id');
			$this->db->where('pr_emp_com_info.emp_desi_id = pr_designation.desig_id');
			$this->db->where('pr_emp_com_info.emp_dept_id = pr_dept.dept_id');
			$this->db->where('pr_emp_com_info.emp_sec_id = pr_section.sec_id');
			$this->db->where('pr_emp_com_info.emp_line_id = pr_line_num.line_id');
			$this->db->where('pr_emp_com_info.emp_id = pr_id_proxi.emp_id');
			$this->db->where('pr_emp_shift.shift_id = pr_emp_com_info.emp_shift');
			$this->db->where("pr_emp_per_info.emp_id = '$emp_id'");
			
			//$this->db->order_by("pr_dept.dept_name","ASC");
			//$this->db->order_by("pr_section.sec_name","ASC");
			//$this->db->order_by("pr_line_num.line_name","ASC");
			//$this->db->order_by("pr_emp_com_info.emp_id","ASC");
			$query = $this->db->get();
			//echo $this->db->last_query();
			//$put = $query->result_array();
			//print_r($put);
			$emp_shift = $this->emp_shift_check($emp_id, $day);		
			if($status == "L")
			{
				$status = "LV";
			}
			else
			{
				$status = $status;
			}
			foreach($query->result() as $rows)
			{
				$emp_id = $rows->emp_id;
				if($status == "P")
				{
					
					$emp_shift = $this->emp_shift_check($emp_id, $day);
					$present_check = $this->present_check($day, $emp_id);
					if($present_check == true)
					{
						$emp_table = "temp_$emp_id";
						$schedule = $this->schedule_check($emp_shift);
						//print_r($schedule);
						$in_start 	=  $schedule[0]["in_start"]; 
						$late_start =  $schedule[0]["late_start"]; 
						$intime_end =  $schedule[0]["in_end"];
						$out_start	=  $schedule[0]["out_start"];
						$out_end	=  $schedule[0]["out_end"];
						
						$in_time = $this->time_check_in($day, $in_start, $intime_end, $emp_table);
						
						$hour = trim(substr($in_time,0,2));
						$minute = trim(substr($in_time,3,2));
						$sec = trim(substr($in_time,6,2));
						$in_time = date("h:i:s A", mktime($hour, $minute, $sec, 0, 0, 0));
						
						$hour = trim(substr($out_end,0,2));
						$minute = trim(substr($out_end,3,2));
						$sec = trim(substr($out_end,6,2));
						$am_pm = date("A", mktime($hour, $minute, $sec, 0, 0, 0));
						if($am_pm == "AM")
						{
							
							$now = strtotime($date);
							$datestr = strtotime("+1 day",$now);
							$date = date("Y-m-d", $datestr);
						}
											
						
						
						$out_time = $this->time_check_out($day, $out_start, $out_end, $emp_table);
						if($out_time !='')
						{	
							$out_time = trim(substr($out_time,11,19));
							$hour = trim(substr($out_time,0,2));
							$minute = trim(substr($out_time,3,2));
							$sec = trim(substr($out_time,6,2));
							$time_format = date("h:i:s A", mktime($hour, $minute, $sec, 0, 0, 0));
							$out_time_format = $time_format;
						}
						else
						{
							$out_time_format ='';
						}
					}
				}
				
				$emp_cat_id = $rows->emp_cat_id;
				
				if($emp_cat_id == 1 || $emp_cat_id == 2 || $emp_cat_id == 5)
				{
					$data["emp_id"][] = $rows->emp_id;
					$data["proxi_id"][] = $rows->proxi_id;
					$data["emp_name"][] = $rows->emp_full_name;
					$data["desig_name"][] = $rows->desig_name;
					$data["doj"][] = $rows->emp_join_date;
					$data["dept_name"][] = $rows->dept_name;
					$data["sec_name"][] = $rows->sec_name;
					$data["line_name"][] = $rows->line_name;
					$data["emp_shift"][] = $emp_shift;
					if($status == "P")
					{
						$data["in_time"][] = $in_time;
						$data["out_time"][] = $out_time_format;
					}
					$data["status"][] = $status;
				}
			}
			//print_r($data);
			
			
		}
		if($data)
		{
			
			return $data;
		}
		else
		{
			return "Requested list is empty";
		}
		
	}
	

	
	function left_emp_report($start_date, $end_date, $col_desig, $col_line, $col_section, $col_dept, $col_all)
	{
		$start_date = $start_date;
		$end_date= $end_date;
		
		$col_desig = $col_desig;
		$col_line = $col_line;
		$col_section = $col_section;
		$col_dept = $col_dept;
		$col_all = $col_all;
		

		
		$data = array();
		
		$this->db->select("pr_emp_left_history.emp_id,");
		$this->db->from("pr_emp_left_history");
		$this->db->from("pr_emp_com_info");
			$this->db->from('pr_dept');
			$this->db->from('pr_section');
			$this->db->from('pr_line_num');
			$this->db->from('pr_designation');
			$this->db->where('pr_emp_com_info.emp_desi_id = pr_designation.desig_id');
			$this->db->where('pr_emp_com_info.emp_dept_id = pr_dept.dept_id');
			$this->db->where('pr_emp_com_info.emp_sec_id = pr_section.sec_id');
			$this->db->where('pr_emp_com_info.emp_line_id = pr_line_num.line_id');
		$this->db->where("pr_emp_left_history.emp_id = pr_emp_com_info.emp_id");
		$where ="pr_emp_left_history.left_date BETWEEN '$start_date' and '$end_date'";
		$this->db->where($where);
		if($col_all !='all')
		{
			if($col_dept !="undefined")
			{
				$this->db->where("pr_emp_com_info.emp_dept_id", $col_dept);
			}
			if($col_section !="undefined")
			{
				$this->db->where("pr_emp_com_info.emp_sec_id", $col_section);
			}
			if($col_line !="undefined")
			{
				$this->db->where("pr_emp_com_info.emp_line_id ", $col_line);
			}
			if($col_desig !="undefined")
			{
				$this->db->where("pr_emp_com_info.emp_desi_id", $col_desig);
			}
			
		}
		$this->db->order_by("pr_dept.dept_name");
		$this->db->order_by("pr_section.sec_name");
		$this->db->order_by("pr_line_num.line_name");
		$this->db->order_by("pr_designation.desig_name");
		$this->db->order_by("pr_emp_com_info.emp_id");
		$query = $this->db->get();
		//echo $this->db->last_query();
		//echo $query->num_rows();
		if($query->num_rows() == 0)
		{
			return "Requested list is empty";
		}
		
		foreach($query->result() as $rows)
		{
			$emp_id = $rows->emp_id;
			
			$this->db->select('pr_emp_com_info.emp_id,pr_emp_per_info.emp_full_name,  pr_designation.desig_name, pr_emp_com_info.emp_join_date, pr_dept.dept_name, pr_section.sec_name, pr_line_num.line_name, pr_id_proxi.proxi_id, pr_emp_shift.shift_name,pr_emp_com_info.emp_cat_id, pr_emp_com_info.gross_sal, pr_emp_left_history.left_date as e_date, pr_emp_add.emp_pre_add');
			$this->db->from('pr_emp_per_info');
			$this->db->from('pr_emp_com_info');
			$this->db->from('pr_designation');
			$this->db->from('pr_dept');
			$this->db->from('pr_section');
			$this->db->from('pr_line_num');
			$this->db->from('pr_id_proxi');
			$this->db->from('pr_emp_shift');
			$this->db->from("pr_emp_left_history");	
			$this->db->from("pr_emp_add");	
			//$this->db->from("pr_emp_status");
			$this->db->where("pr_emp_add.emp_id = pr_emp_com_info.emp_id");
			$this->db->where("pr_emp_left_history.emp_id = pr_emp_com_info.emp_id");
			$this->db->where('pr_emp_per_info.emp_id = pr_emp_com_info.emp_id');
			$this->db->where('pr_emp_com_info.emp_desi_id = pr_designation.desig_id');
			$this->db->where('pr_emp_com_info.emp_dept_id = pr_dept.dept_id');
			$this->db->where('pr_emp_com_info.emp_sec_id = pr_section.sec_id');
			$this->db->where('pr_emp_com_info.emp_line_id = pr_line_num.line_id');
			$this->db->where('pr_emp_com_info.emp_id = pr_id_proxi.emp_id');
			$this->db->where('pr_emp_shift.shift_id = pr_emp_com_info.emp_shift');
			$this->db->where("pr_emp_per_info.emp_id = '$emp_id'");
			
			//$this->db->order_by("pr_dept.dept_name","ASC");
			//$this->db->order_by("pr_section.sec_name","ASC");
			//$this->db->order_by("pr_line_num.line_name","ASC");
			//$this->db->order_by("pr_emp_com_info.emp_id","ASC");
			$query = $this->db->get();
			//echo $this->db->last_query();
			//$put = $query->result_array();
			//print_r($put);
		
			foreach($query->result() as $rows)
			{
				$data["emp_id"][] = $rows->emp_id;
				$data["proxi_id"][] = $rows->proxi_id;
				$data["emp_name"][] = $rows->emp_full_name;
				$data["doj"][] = $rows->emp_join_date;
				$data["add"][] = $rows->emp_pre_add;
				$data["dept_name"][] = $rows->dept_name;
				$data["sec_name"][] = $rows->sec_name;
				$data["desig_name"][] = $rows->desig_name;
				$data["line_name"][] = $rows->line_name;
				$data["gross_sal"][] = $rows->gross_sal;
				$data["e_date"][] = $rows->e_date;
			}
			//print_r($data);
			
			
		}
		if($data)
		{
			
			return $data;
		}
		else
		{
			return "Requested list is empty";
		}
		//print_r($data);
		
	}
	
	function resign_emp_report($start_date, $end_date, $col_desig, $col_line, $col_section, $col_dept, $col_all)
	{
		$start_date = $start_date;
		$end_date= $end_date;
		
		$col_desig = $col_desig;
		$col_line = $col_line;
		$col_section = $col_section;
		$col_dept = $col_dept;
		$col_all = $col_all;
		

		
		$data = array();
		
		$this->db->select("pr_emp_resign_history.emp_id,");
		$this->db->from("pr_emp_resign_history");
		$this->db->from("pr_emp_com_info");
			$this->db->from('pr_dept');
			$this->db->from('pr_section');
			$this->db->from('pr_line_num');
			$this->db->from('pr_designation');
			$this->db->where('pr_emp_com_info.emp_desi_id = pr_designation.desig_id');
			$this->db->where('pr_emp_com_info.emp_dept_id = pr_dept.dept_id');
			$this->db->where('pr_emp_com_info.emp_sec_id = pr_section.sec_id');
			$this->db->where('pr_emp_com_info.emp_line_id = pr_line_num.line_id');
		$this->db->where("pr_emp_resign_history.emp_id = pr_emp_com_info.emp_id");
		$where ="pr_emp_resign_history.resign_date BETWEEN '$start_date' and '$end_date'";
		$this->db->where($where);
		if($col_all !='all')
		{
			if($col_dept !="undefined")
			{
				$this->db->where("pr_emp_com_info.emp_dept_id", $col_dept);
			}
			if($col_section !="undefined")
			{
				$this->db->where("pr_emp_com_info.emp_sec_id", $col_section);
			}
			if($col_line !="undefined")
			{
				$this->db->where("pr_emp_com_info.emp_line_id ", $col_line);
			}
			if($col_desig !="undefined")
			{
				$this->db->where("pr_emp_com_info.emp_desi_id", $col_desig);
			}
			
		}
		$this->db->order_by("pr_dept.dept_name");
		$this->db->order_by("pr_section.sec_name");
		$this->db->order_by("pr_line_num.line_name");
		$this->db->order_by("pr_designation.desig_name");
		$this->db->order_by("pr_emp_com_info.emp_id");
		$query = $this->db->get();
		//echo $this->db->last_query();
		//echo $query->num_rows();
		if($query->num_rows() == 0)
		{
			return "Requested list is empty";
		}
		
		foreach($query->result() as $rows)
		{
			$emp_id = $rows->emp_id;
			
			$this->db->select('pr_emp_com_info.emp_id,pr_emp_per_info.emp_full_name,  pr_designation.desig_name, pr_emp_com_info.emp_join_date, pr_dept.dept_name, pr_section.sec_name, pr_line_num.line_name, pr_id_proxi.proxi_id, pr_emp_shift.shift_name,pr_emp_com_info.emp_cat_id, pr_emp_com_info.gross_sal, pr_emp_resign_history.resign_date as e_date, pr_emp_add.emp_pre_add');
			$this->db->from('pr_emp_per_info');
			$this->db->from('pr_emp_com_info');
			$this->db->from('pr_designation');
			$this->db->from('pr_dept');
			$this->db->from('pr_section');
			$this->db->from('pr_line_num');
			$this->db->from('pr_id_proxi');
			$this->db->from('pr_emp_shift');
			$this->db->from("pr_emp_resign_history");	
			$this->db->from("pr_emp_add");	
			//$this->db->from("pr_emp_status");
			$this->db->where("pr_emp_add.emp_id = pr_emp_com_info.emp_id");
			$this->db->where("pr_emp_resign_history.emp_id = pr_emp_com_info.emp_id");
			$this->db->where('pr_emp_per_info.emp_id = pr_emp_com_info.emp_id');
			$this->db->where('pr_emp_com_info.emp_desi_id = pr_designation.desig_id');
			$this->db->where('pr_emp_com_info.emp_dept_id = pr_dept.dept_id');
			$this->db->where('pr_emp_com_info.emp_sec_id = pr_section.sec_id');
			$this->db->where('pr_emp_com_info.emp_line_id = pr_line_num.line_id');
			$this->db->where('pr_emp_com_info.emp_id = pr_id_proxi.emp_id');
			$this->db->where('pr_emp_shift.shift_id = pr_emp_com_info.emp_shift');
			$this->db->where("pr_emp_per_info.emp_id = '$emp_id'");
			
			//$this->db->order_by("pr_dept.dept_name","ASC");
			//$this->db->order_by("pr_section.sec_name","ASC");
			//$this->db->order_by("pr_line_num.line_name","ASC");
			//$this->db->order_by("pr_emp_com_info.emp_id","ASC");
			$query = $this->db->get();
			//echo $this->db->last_query();
			//$put = $query->result_array();
			//print_r($put);
		
			foreach($query->result() as $rows)
			{
				$data["emp_id"][] = $rows->emp_id;
				$data["proxi_id"][] = $rows->proxi_id;
				$data["emp_name"][] = $rows->emp_full_name;
				$data["doj"][] = $rows->emp_join_date;
				$data["add"][] = $rows->emp_pre_add;
				$data["dept_name"][] = $rows->dept_name;
				$data["sec_name"][] = $rows->sec_name;
				$data["desig_name"][] = $rows->desig_name;
				$data["line_name"][] = $rows->line_name;
				$data["gross_sal"][] = $rows->gross_sal;
				$data["e_date"][] = $rows->e_date;
			}
			//print_r($data);
			
			
		}
		if($data)
		{
			
			return $data;
		}
		else
		{
			return "Requested list is empty";
		}
		//print_r($data);
		
	}
	
	function new_join_emp_report($start_date, $end_date, $col_desig, $col_line, $col_section, $col_dept, $col_all)
	{
		$start_date = $start_date;
		$end_date= $end_date;
		
		$col_desig = $col_desig;
		$col_line = $col_line;
		$col_section = $col_section;
		$col_dept = $col_dept;
		$col_all = $col_all;
		

		
		$data = array();
		
		$this->db->select("pr_emp_com_info.emp_id,");
		$this->db->from("pr_emp_com_info");
		$this->db->from('pr_designation');
			$this->db->from('pr_dept');
			$this->db->from('pr_section');
			$this->db->from('pr_line_num');
			$this->db->where('pr_emp_com_info.emp_desi_id = pr_designation.desig_id');
			$this->db->where('pr_emp_com_info.emp_dept_id = pr_dept.dept_id');
			$this->db->where('pr_emp_com_info.emp_sec_id = pr_section.sec_id');
			$this->db->where('pr_emp_com_info.emp_line_id = pr_line_num.line_id');
		$where ="pr_emp_com_info.emp_join_date BETWEEN '$start_date' and '$end_date'";
		$this->db->where($where);
		if($col_all !='all')
		{
			if($col_dept !="undefined")
			{
				$this->db->where("pr_emp_com_info.emp_dept_id", $col_dept);
			}
			if($col_section !="undefined")
			{
				$this->db->where("pr_emp_com_info.emp_sec_id", $col_section);
			}
			if($col_line !="undefined")
			{
				$this->db->where("pr_emp_com_info.emp_line_id ", $col_line);
			}
			if($col_desig !="undefined")
			{
				$this->db->where("pr_emp_com_info.emp_desi_id", $col_desig);
			}
			
		}
		$this->db->order_by("pr_dept.dept_name");
		$this->db->order_by("pr_section.sec_name");
		$this->db->order_by("pr_line_num.line_name");
		$this->db->order_by("pr_designation.desig_name");
		$this->db->order_by("pr_emp_com_info.emp_id");
		$query = $this->db->get();
		//echo $this->db->last_query();
		//echo $query->num_rows();
		if($query->num_rows() == 0)
		{
			return "Requested list is empty";
		}
		
		foreach($query->result() as $rows)
		{
			$emp_id = $rows->emp_id;
			
			$this->db->select('pr_emp_com_info.emp_id,pr_emp_per_info.emp_full_name,  pr_designation.desig_name, pr_emp_com_info.emp_join_date, pr_dept.dept_name, pr_section.sec_name, pr_line_num.line_name, pr_id_proxi.proxi_id, pr_emp_shift.shift_name,pr_emp_com_info.emp_cat_id, pr_emp_com_info.gross_sal,pr_emp_per_info.emp_dob');
			$this->db->from('pr_emp_per_info');
			$this->db->from('pr_emp_com_info');
			$this->db->from('pr_designation');
			$this->db->from('pr_dept');
			$this->db->from('pr_section');
			$this->db->from('pr_line_num');
			$this->db->from('pr_id_proxi');
			$this->db->from('pr_emp_shift');
			$this->db->where('pr_emp_per_info.emp_id = pr_emp_com_info.emp_id');
			$this->db->where('pr_emp_com_info.emp_desi_id = pr_designation.desig_id');
			$this->db->where('pr_emp_com_info.emp_dept_id = pr_dept.dept_id');
			$this->db->where('pr_emp_com_info.emp_sec_id = pr_section.sec_id');
			$this->db->where('pr_emp_com_info.emp_line_id = pr_line_num.line_id');
			$this->db->where('pr_emp_com_info.emp_id = pr_id_proxi.emp_id');
			$this->db->where('pr_emp_shift.shift_id = pr_emp_com_info.emp_shift');
			$this->db->where("pr_emp_per_info.emp_id = '$emp_id'");
			
			//$this->db->order_by("pr_dept.dept_name","ASC");
			//$this->db->order_by("pr_section.sec_name","ASC");
			//$this->db->order_by("pr_line_num.line_name","ASC");
			//$this->db->order_by("pr_emp_com_info.emp_id","ASC");
			$query = $this->db->get();
			//echo $this->db->last_query();
			//$put = $query->result_array();
			//print_r($put);
		
			foreach($query->result() as $rows)
			{
				$data["emp_id"][] = $rows->emp_id;
				$data["emp_name"][] = $rows->emp_full_name;
				$data["proxi_id"][] = $rows->proxi_id;
				$data["desig_name"][] = $rows->desig_name;
				$data["gross_sal"][] = $rows->gross_sal;
				$data["doj"][] = $rows->emp_join_date;
				$data["emp_dob"][] = $rows->emp_dob;
				$data["dept_name"][] = $rows->dept_name;
				$data["sec_name"][] = $rows->sec_name;
				$data["line_name"][] = $rows->line_name;
				
				
			}
			//print_r($data);
			
			
		}
		if($data)
		{
			
			return $data;
		}
		else
		{
			return "Requested list is empty";
		}
		//print_r($data);
		
	}
	
	function salary_summary_report($salary_month, $col_desig, $col_line, $col_section, $col_dept, $col_all, $emp_status)
	{
		
		$data = array();
		//$date = $year."-".$month."-".$date;
					
			$this->db->select('pr_emp_com_info.emp_id,pr_emp_per_info.emp_full_name, pr_designation.desig_name, pr_emp_com_info.emp_join_date, pr_dept.dept_name, pr_section.sec_name, pr_line_num.line_name, pr_id_proxi.proxi_id, pr_emp_shift.shift_name,pr_emp_com_info.gross_sal');
			$this->db->from('pr_emp_per_info');
			$this->db->from('pr_emp_com_info');
			$this->db->from('pr_designation');
			$this->db->from('pr_dept');
			$this->db->from('pr_section');
			$this->db->from('pr_line_num');
			$this->db->from('pr_id_proxi');
			$this->db->from('pr_emp_shift');
			$this->db->where('pr_emp_per_info.emp_id = pr_emp_com_info.emp_id');
			$this->db->where('pr_emp_com_info.emp_desi_id = pr_designation.desig_id');
			$this->db->where('pr_emp_com_info.emp_dept_id = pr_dept.dept_id');
			$this->db->where('pr_emp_com_info.emp_sec_id = pr_section.sec_id');
			$this->db->where('pr_emp_com_info.emp_line_id = pr_line_num.line_id');
			$this->db->where('pr_emp_com_info.emp_id = pr_id_proxi.emp_id');
			$this->db->where('pr_emp_shift.shift_id = pr_emp_com_info.emp_shift');
			$this->db->where('pr_emp_com_info.emp_cat_id',$emp_status);
			
			if($col_all !='all')
			{
				if($col_dept !="undefined")
				{
					$this->db->where("pr_emp_com_info.emp_dept_id", $col_dept);
				}
				if($col_section !="undefined")
				{
					$this->db->where("pr_emp_com_info.emp_sec_id", $col_section);
				}
				if($col_line !="undefined")
				{
					$this->db->where("pr_emp_com_info.emp_line_id ", $col_line);
				}
				if($col_desig !="undefined")
				{
					$this->db->where("pr_emp_com_info.emp_desi_id", $col_desig);
				}
				
			}
			$this->db->order_by("pr_dept.dept_name");
			$this->db->order_by("pr_section.sec_name");
			$this->db->order_by("pr_line_num.line_name");
			$this->db->order_by("pr_designation.desig_name");
			$this->db->order_by("pr_emp_com_info.emp_id");
			$query = $this->db->get();
			//echo $this->db->last_query();
			//$put = $query->result_array();
			//print_r($put);
			foreach($query->result() as $rows)
			{		
				$data["emp_id"][] = $rows->emp_id;
				$data["proxi_id"][] = $rows->proxi_id;
				$data["emp_name"][] = $rows->emp_full_name;
				$data["desig_name"][] = $rows->desig_name;
				$data["doj"][] = $rows->emp_join_date;
				$data["dept_name"][] = $rows->dept_name;
				$data["sec_name"][] = $rows->sec_name;
				$data["line_name"][] = $rows->line_name;
				$data["emp_shift"][] = $rows->shift_name;
				
				$gross_sal = $rows->gross_sal;
				$basic_sal = round($gross_sal * 60 / 100);
				$house_rent = round($gross_sal * 30 / 100);
				$medi_allo = round($gross_sal * 10 / 100);
				
				$data["basic_sal"][] = $basic_sal;
				$data["house_rent"][] = $house_rent;
				$data["medi_allo"][] = $medi_allo;
				$data["gross_sal"][] = $gross_sal;
			}
			//print_r($data);
			
		if($data)
		{
			
			return $data;
		}
		else
		{
			return "Requested list is empty";
		}
		
	}
	
	//===========================Daily Late Report Start===========================
	function daily_late_report($year, $month, $date, $col_desig, $col_line, $col_section, $col_dept, $col_all)
	{
				
		$date = date("Y-m-d", mktime(0, 0, 0, $month, $date, $year));
		
		$data = $this->late_commer($date, $col_desig, $col_line, $col_section, $col_dept, $col_all);
		
		//print_r($data);
		if(!isset($data["emp_id"]))
		{
			return "Requested list is empty";
		}
		else
		{
			return $data;
		}
		/*$emp_table = "temp_100009";
		$late_id = $this->late_commer($date, 100009, $emp_table);*/
		
	}
	
	function all_emp()
	{
		$this->db->select("emp_id");
		$this->db->from("pr_emp_com_info");
		$query = $this->db->get();
		return $query->result();
	}
	
	function late_commer($date, $col_desig, $col_line, $col_section, $col_dept, $col_all)
	{
		$data =array();
		//$all_emp = $this->all_emp();
		
		$this->db->select("pr_emp_com_info.emp_id");
		$this->db->from("pr_emp_com_info");
			$this->db->from('pr_dept');
			$this->db->from('pr_section');
			$this->db->from('pr_line_num');
			$this->db->from('pr_designation');
			$this->db->where('pr_emp_com_info.emp_desi_id = pr_designation.desig_id');
			$this->db->where('pr_emp_com_info.emp_dept_id = pr_dept.dept_id');
			$this->db->where('pr_emp_com_info.emp_sec_id = pr_section.sec_id');
			$this->db->where('pr_emp_com_info.emp_line_id = pr_line_num.line_id');
		if($col_all !='all')
		{
			if($col_dept !="undefined")
			{
				$this->db->where("pr_emp_com_info.emp_dept_id", $col_dept);
			}
			if($col_section !="undefined")
			{
				$this->db->where("pr_emp_com_info.emp_sec_id", $col_section);
			}
			if($col_line !="undefined")
			{
				$this->db->where("pr_emp_com_info.emp_line_id ", $col_line);
			}
			if($col_desig !="undefined")
			{
				$this->db->where("pr_emp_com_info.emp_desi_id", $col_desig);
			}
			
		}
		$this->db->order_by("pr_dept.dept_name");
		$this->db->order_by("pr_section.sec_name");
		$this->db->order_by("pr_line_num.line_name");
		$this->db->order_by("pr_designation.desig_name");
		$this->db->order_by("pr_emp_com_info.emp_id");
		$query = $this->db->get();
		foreach($query->result() as $rows)
		{
			$emp_id = $rows->emp_id;
			$emp_table = "temp_$emp_id";
			$emp_shift = $this->emp_shift_check($emp_id, $date);
			
			$schedule = $this->schedule_check($emp_shift);
			//print_r($schedule);
			$late_start =  $schedule[0]["late_start"]; 
			$intime_end =  $schedule[0]["in_end"];
						
			$present_check = $this->present_check($date, $emp_id);
			if( $present_check == true)
			{
				$in_out_time = $this->time_check_in($date, $late_start, $intime_end, $emp_table);
							
				if($in_out_time != '')
				{
					$this->db->select('pr_emp_com_info.emp_id,pr_emp_per_info.emp_full_name, pr_designation.desig_name, pr_emp_com_info.emp_join_date, pr_dept.dept_name, pr_section.sec_name, pr_line_num.line_name, pr_id_proxi.proxi_id, pr_emp_shift.shift_name ,pr_emp_com_info.emp_cat_id');
					$this->db->from('pr_emp_per_info');
					$this->db->from('pr_emp_com_info');
					$this->db->from('pr_designation');
					$this->db->from('pr_dept');
					$this->db->from('pr_section');
					$this->db->from('pr_line_num');
					$this->db->from('pr_emp_shift');
					$this->db->from('pr_id_proxi');
					$this->db->where('pr_emp_per_info.emp_id = pr_emp_com_info.emp_id');
					$this->db->where('pr_emp_com_info.emp_desi_id = pr_designation.desig_id');
					$this->db->where('pr_emp_com_info.emp_dept_id = pr_dept.dept_id');
					$this->db->where('pr_emp_com_info.emp_sec_id = pr_section.sec_id');
					$this->db->where('pr_emp_com_info.emp_line_id = pr_line_num.line_id');
					$this->db->where('pr_emp_com_info.emp_id = pr_id_proxi.emp_id');
					$this->db->where('pr_emp_shift.shift_id = pr_emp_com_info.emp_shift');
					$this->db->where("pr_emp_per_info.emp_id = '$emp_id'");
					//$this->db->order_by("pr_dept.dept_name","ASC");
					//$this->db->order_by("pr_section.sec_name","ASC");
					//$this->db->order_by("pr_line_num.line_name","ASC");
					//$this->db->order_by("pr_emp_com_info.emp_id","ASC");
					$query = $this->db->get();
					//$put = $query->result_array();
					//print_r($put);
					
					foreach($query->result() as $rows)
					{
						$emp_cat_id = $rows->emp_cat_id;
				
						if($emp_cat_id == 1 || $emp_cat_id == 2 || $emp_cat_id == 5)
						{
							$data["emp_id"][] = $rows->emp_id;
							$data["proxi_id"][] = $rows->proxi_id;
							$data["emp_name"][] = $rows->emp_full_name;
							$data["desig_name"][] = $rows->desig_name;
							$data["doj"][] = $rows->emp_join_date;
							$data["dept_name"][] = $rows->dept_name;
							$data["sec_name"][] = $rows->sec_name;
							$data["line_name"][] = $rows->line_name;
							$data["shift_name"][] =$rows->shift_name;
							$data["in_time"][] = $in_out_time;
						}
					}
				}
				
			}
		}
		return $data;
	}
	
	function out_punch_miss($year, $month, $date, $col_desig, $col_line, $col_section, $col_dept, $col_all)
	{
		$date = date("Y-m-d", mktime(0, 0, 0, $month, $date, $year));
		
		$data = $this->daily_out_punch_miss($date, $col_desig, $col_line, $col_section, $col_dept, $col_all);
		
		//print_r($data);
		if(!isset($data["emp_id"]))
		{
			echo "Requested list is empty";
		}
		else
		{
			return $data;
		}
		/*$emp_table = "temp_100009";
		$late_id = $this->late_commer($date, 100009, $emp_table);*/
		
	}	
	function daily_out_punch_miss($day, $col_desig, $col_line, $col_section, $col_dept, $col_all)
	{
		$data =array();
		//$all_emp = $this->all_emp();
		
		$this->db->select("emp_id");
		$this->db->from("pr_emp_com_info");
			$this->db->from('pr_dept');
			$this->db->from('pr_section');
			$this->db->from('pr_line_num');
			$this->db->from('pr_designation');
			$this->db->where('pr_emp_com_info.emp_desi_id = pr_designation.desig_id');
			$this->db->where('pr_emp_com_info.emp_dept_id = pr_dept.dept_id');
			$this->db->where('pr_emp_com_info.emp_sec_id = pr_section.sec_id');
			$this->db->where('pr_emp_com_info.emp_line_id = pr_line_num.line_id');
		if($col_all !='all')
		{
			if($col_dept !="undefined")
			{
				$this->db->where("pr_emp_com_info.emp_dept_id", $col_dept);
			}
			if($col_section !="undefined")
			{
				$this->db->where("pr_emp_com_info.emp_sec_id", $col_section);
			}
			if($col_line !="undefined")
			{
				$this->db->where("pr_emp_com_info.emp_line_id ", $col_line);
			}
			if($col_desig !="undefined")
			{
				$this->db->where("pr_emp_com_info.emp_desi_id", $col_desig);
			}
			
		}
		$this->db->order_by("pr_dept.dept_name");
		$this->db->order_by("pr_section.sec_name");
		$this->db->order_by("pr_line_num.line_name");
		$this->db->order_by("pr_designation.desig_name");
		$this->db->order_by("pr_emp_com_info.emp_id");
		$query = $this->db->get();
		foreach($query->result() as $rows)
		{
			$emp_id = $rows->emp_id;
			$emp_table = "temp_$emp_id";
			$emp_shift = $this->emp_shift_check($emp_id, $day);
			
			$schedule = $this->schedule_check($emp_shift);
			//print_r($schedule);
			$in_start 	=  $schedule[0]["in_start"]; 
			$late_start =  $schedule[0]["late_start"]; 
			$intime_end =  $schedule[0]["in_end"];
			$out_start	=  $schedule[0]["out_start"];
			$out_end	=  $schedule[0]["out_end"];
			
			$present_check = $this->present_check($day, $emp_id);
			if( $present_check == true)
			{
					$in_time = $this->time_check_in($day, $in_start, $intime_end, $emp_table);
					$date = $day;
					$hour = trim(substr($out_end,0,2));
					$minute = trim(substr($out_end,3,2));
					$sec = trim(substr($out_end,6,2));
					$am_pm = date("A", mktime($hour, $minute, $sec, 0, 0, 0));
					if($am_pm == "AM")
					{
						
						$now = strtotime($date);
						$datestr = strtotime("+1 day",$now);
						$date = date("Y-m-d", $datestr);
					}
					
					$in_out_time = $this->time_check_out($date, $out_start, $out_end, $emp_table);
					if($in_out_time == '')
					{
						$this->db->select('pr_emp_com_info.emp_id,pr_emp_per_info.emp_full_name, pr_designation.desig_name, pr_emp_com_info.emp_join_date, pr_dept.dept_name, pr_section.sec_name, pr_line_num.line_name, pr_id_proxi.proxi_id, pr_emp_shift.shift_name ,pr_emp_com_info.emp_cat_id');
						$this->db->from('pr_emp_per_info');
						$this->db->from('pr_emp_com_info');
						$this->db->from('pr_designation');
						$this->db->from('pr_dept');
						$this->db->from('pr_section');
						$this->db->from('pr_line_num');
						$this->db->from('pr_emp_shift');
						$this->db->from('pr_id_proxi');
						$this->db->where('pr_emp_per_info.emp_id = pr_emp_com_info.emp_id');
						$this->db->where('pr_emp_com_info.emp_desi_id = pr_designation.desig_id');
						$this->db->where('pr_emp_com_info.emp_dept_id = pr_dept.dept_id');
						$this->db->where('pr_emp_com_info.emp_sec_id = pr_section.sec_id');
						$this->db->where('pr_emp_com_info.emp_line_id = pr_line_num.line_id');
						$this->db->where('pr_emp_com_info.emp_id = pr_id_proxi.emp_id');
						$this->db->where('pr_emp_shift.shift_id = pr_emp_com_info.emp_shift');
						$this->db->where("pr_emp_per_info.emp_id = '$emp_id'");
						//$this->db->order_by("pr_dept.dept_name","ASC");
						//$this->db->order_by("pr_section.sec_name","ASC");
						//$this->db->order_by("pr_line_num.line_name","ASC");
						//$this->db->order_by("pr_emp_com_info.emp_id","ASC");
						$query = $this->db->get();
						//$put = $query->result_array();
						//print_r($put);
						
						foreach($query->result() as $rows)
						{
							$emp_cat_id = $rows->emp_cat_id;
				
							if($emp_cat_id == 1 || $emp_cat_id == 2 || $emp_cat_id == 5)
							{
								$data["emp_id"][] = $rows->emp_id;
								$data["proxi_id"][] = $rows->proxi_id;
								$data["emp_name"][] = $rows->emp_full_name;
								$data["desig_name"][] = $rows->desig_name;
								$data["doj"][] = $rows->emp_join_date;
								$data["dept_name"][] = $rows->dept_name;
								$data["sec_name"][] = $rows->sec_name;
								$data["line_name"][] = $rows->line_name;
								$data["shift_name"][] =$rows->shift_name;
								$data["in_time"][] = $in_time;
							}
						}
					}
					
			}
		}
		return $data;
	}
	
	function present_check($date, $emp_id)
	{
		//echo $date;
		$year  = trim(substr($date,0,4));
		$month = trim(substr($date,5,2));
		$day   = trim(substr($date,8,2));
		$date_field = "date_$day";
		$att_month = $year."_".$month."-00";
		
		$this->db->select($date_field);
		$this->db->where("emp_id", $emp_id);
		$this->db->where("att_month", $att_month);
		$this->db->where($date_field, "P");
		$query = $this->db->get("pr_attn_monthly");
		if($query->num_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
		
	}
	
	function emp_shift_check_process($emp_id, $att_date)
	{
		$this->db->select("shift_id, shift_duty");
		$this->db->from("pr_emp_shift_log");
		$this->db->where("emp_id", $emp_id);
		$this->db->where("shift_log_date", $att_date);
		$query = $this->db->get();
		
		if($query->num_rows() > 0 )
		{
			foreach($query->result() as $row)
			{
				$shift_duty = $row->shift_duty;
			}
			
			$this->db->select("sh_type");
			$this->db->from("pr_emp_shift_schedule");
			$this->db->where("shift_id", $shift_duty);
			$query1 = $this->db->get();
			$row = $query1->row();
			return $row->sh_type;
		}
		else
		{
			$this->db->select("pr_emp_shift.shift_id, pr_emp_shift.shift_duty");
			$this->db->from("pr_emp_shift");
			$this->db->from("pr_emp_com_info");
			$this->db->where("pr_emp_com_info.emp_id", $emp_id);
			$this->db->where("pr_emp_shift.shift_id = pr_emp_com_info.emp_shift");
			$query2 = $this->db->get();
			//echo $this->db->last_query();
			foreach($query2->result() as $rows)
			{
				$shift_id = $rows->shift_id;
				$shift_duty = $rows->shift_duty;
			}
			
			$data = array(
							'emp_id' 		 => $emp_id,
							'shift_id' 		 => $shift_id,
							'shift_duty' 	 => $shift_duty,
							'shift_log_date' => $att_date
			
			);
			
			$this->db->insert("pr_emp_shift_log", $data);
			
			
			$this->db->select("pr_emp_shift_schedule.sh_type");
			$this->db->from("pr_emp_shift_schedule");
			$this->db->from("pr_emp_shift");
			$this->db->from("pr_emp_com_info");
			$this->db->where("pr_emp_com_info.emp_id", $emp_id);
			$this->db->where("pr_emp_shift.shift_id = pr_emp_com_info.emp_shift");
			$this->db->where("pr_emp_shift.shift_duty = pr_emp_shift_schedule.shift_id");
			$query = $this->db->get();
			//echo $this->db->last_query();
			$row = $query->row();
			return $row->sh_type;
		
		}
		
		
	}
	
	function emp_shift_check($emp_id, $att_date)
	{
		$this->db->select("shift_id, shift_duty");
		$this->db->from("pr_emp_shift_log");
		$this->db->where("emp_id", $emp_id);
		$this->db->where("shift_log_date", $att_date);
		$query = $this->db->get();
		
		if($query->num_rows() > 0 )
		{
			foreach($query->result() as $row)
			{
				$shift_duty = $row->shift_duty;
			}
			
			$this->db->select("sh_type");
			$this->db->from("pr_emp_shift_schedule");
			$this->db->where("shift_id", $shift_duty);
			$query1 = $this->db->get();
			$row = $query1->row();
			return $row->sh_type;
		}
		else
		{
			$this->db->select("pr_emp_shift_schedule.sh_type");
			$this->db->from("pr_emp_shift_schedule");
			$this->db->from("pr_emp_shift");
			$this->db->from("pr_emp_com_info");
			$this->db->where("pr_emp_com_info.emp_id", $emp_id);
			$this->db->where("pr_emp_shift.shift_id = pr_emp_com_info.emp_shift");
			$this->db->where("pr_emp_shift.shift_duty = pr_emp_shift_schedule.shift_id");
			$query = $this->db->get();
			//echo $this->db->last_query();
			$row = $query->row();
			return $row->sh_type;
		
		}
	}
	
	function schedule_check($emp_shift)
	{
		$this->db->where("sh_type", $emp_shift);
		$query = $this->db->get("pr_emp_shift_schedule");
		return $query->result_array();
	}
	
	//===========================Daily Late Report End===========================
	
	function get_department_name()
	{
		$this->db->select('*');
		$this->db->from('pr_dept');
		$this->db->order_by('dept_name','ASC');
		return $query = $this->db->get();
	}
	
	function get_section_name()
	{
		$this->db->select('sec_id, sec_name');
		$this->db->from('pr_section');
		$this->db->order_by('sec_name','ASC');
		return $query = $this->db->get();
	}
	
	function get_designation_name()
	{
		$this->db->select('desig_id, desig_name');
		$this->db->from('pr_designation');
		$this->db->order_by('desig_name','ASC');
		return $query = $this->db->get();
	}
	
	function get_line_name()
	{
		$this->db->select('line_id, line_name');
		$this->db->from('pr_line_num');
		$this->db->order_by('line_name','ASC');
		return $query = $this->db->get();
	}
	
	function get_position_name()
	{
		$this->db->select('posi_id, posi_name');
		$this->db->from('pr_emp_position');
		$this->db->order_by('posi_name','ASC');
		return $query = $this->db->get();
	}
	
	function get_operation_name()
	{
		$this->db->select('ope_id, ope_name');
		$this->db->from('pr_emp_operation');
		$this->db->order_by('ope_name','ASC');
		return $query = $this->db->get();
	}
	
	function get_status_name()
	{
		$this->db->select('stat_id, stat_type');
		$this->db->from('pr_emp_status');
		$this->db->order_by('stat_id','ASC');
		return $query = $this->db->get();
	}
	
	function get_grade_name()
	{
		$this->db->select('gr_id, gr_name');
		$this->db->from('pr_grade');
		$this->db->order_by('gr_id','ASC');
		return $query = $this->db->get();
	}
	
	function get_yes_no_asc()
	{
		$this->db->select('id, name');
		$this->db->from('pr_yes_no');
		$this->db->order_by('name','ASC');
		return $query = $this->db->get();
	}
	
	function get_yes_no_desc()
	{
		$this->db->select('id, name');
		$this->db->from('pr_yes_no');
		$this->db->order_by('id','DESC');
		$query = $this->db->get();
		return $query;
	}
	
	function get_shift_name()
	{
		$this->db->select('shift_id, shift_name');
		$this->db->from('pr_emp_shift');
		$this->db->order_by('shift_name','ASC');
		return $query = $this->db->get();
	}
	
	function get_salary_type_name()
	{
		$this->db->select('sal_type_id, sal_type_name');
		$this->db->from('pr_salry_types');
		$this->db->order_by('sal_type_id','ASC');
		return $query = $this->db->get();
	}
	
	function get_salary_withdraw_name()
	{
		$this->db->select('sal_withdraw_id, sal_withdraw_name');
		$this->db->from('pr_salary_withdraw');
		$this->db->order_by('sal_withdraw_id','ASC');
		return $query = $this->db->get();
	}
	
	function get_religion_name()
	{
		$this->db->select('religion_id, religion_name');
		$this->db->from('pr_religions');
		$this->db->order_by('religion_id','ASC');
		return $query = $this->db->get();
	}
	
	function get_matital_status_name()
	{
		$this->db->select('marrital_status_id, marrital_status_name');
		$this->db->from('pr_marrital_status');
		$this->db->order_by('marrital_status_id','ASC');
		return $query = $this->db->get();
	}
	
	function get_sex_name()
	{
		$this->db->select('sex_id, sex_name');
		$this->db->from('pr_emp_sex');
		$this->db->order_by('sex_id','ASC');
		return $query = $this->db->get();
	}
	
	function get_blood_name()
	{
		$this->db->select('blood_id, blood_name');
		$this->db->from('pr_emp_blood_groups');
		$this->db->order_by('blood_id','ASC');
		return $query = $this->db->get();
	}
	
	function get_att_bonus_name()
	{
		$this->db->select('ab_id,ab_rule_name');
		$this->db->from('pr_attn_bonus');
		$this->db->order_by('ab_id','ASC');
		return $query = $this->db->get();
	}
	
		function dept()
		{
			$this->db->select('*');
			$this->db->from('pr_dept');
			$query = $this->db->get();
			//echo $this->db->last_query();
			//print_r($query->result());
			$data1 = array();
			$data2 = array();
			foreach ($query->result() as $row)
				{
					$data1[] = $row->dept_id;
					$data2[] = $row->dept_name;
					
				}
			$dept_id = implode('=*=', $data1);
			$dept_name = implode('=*=', $data2);
			return $dept_id_name = "$dept_id===$dept_name";
			
			
		}
		
		function operation()
		{
			$this->db->select('*');
			$this->db->from('pr_emp_operation');
			$query = $this->db->get();
			//echo $this->db->last_query();
			//print_r($query->result());
			$data1 = array();
			$data2 = array();
			foreach ($query->result() as $row)
				{
					$data1[] = $row->ope_id;
					$data2[] = $row->ope_name;
					
				}
			$operation_id = implode('=*=', $data1);
			$operation_name = implode('=*=', $data2);
			return $operation_id_name = "$operation_id===$operation_name";
			
			
		}
		
		function position()
		{
			$this->db->select('*');
			$this->db->from('pr_emp_position');
			$query = $this->db->get();
			//echo $this->db->last_query();
			//print_r($query->result());
			$data1 = array();
			$data2 = array();
			foreach ($query->result() as $row)
				{
					$data1[] = $row->posi_id ;
					$data2[] = $row->posi_name ;
					
				}
			$position_id = implode('=*=', $data1);
			$position_name = implode('=*=', $data2);
			return $position_id_name = "$position_id===$position_name";
			
			
		}
	
	
	
	function manual_atten_db()
	{
			$this->db->select('*');
			$this->db->from('pr_dept');
			$query = $this->db->get();
			//echo $this->db->last_query();
			//print_r($query->result());
			$data1 = array();
			$data2 = array();
			foreach ($query->result() as $row)
				{
					$data1[] = $row->dept_id;
					$data2[] = $row->dept_name;
					
				}
			$dept_id = implode('***', $data1);
			$dept_name = implode('***', $data2);
			//------------------------------------section
						
		     $dept_id_name = "$dept_id===$dept_name";
			 $sec_id_name = $this->section_manual_db();
			 $line_id_name = $this->section_search();
			 $desig_id_name = $this->desig_manual_db();
			 $status_id_name = $this->status_search();
			 $position_id_name = $this->position_search();
			 return $alldata = $dept_id_name."$$$".$sec_id_name."$$$".$line_id_name."$$$".$desig_id_name."$$$".$status_id_name."$$$".$position_id_name;
			
		}
		function position_search()
		{
			$this->db->select('*');
			$this->db->from('pr_emp_position');
			$this->db->order_by("posi_id");
			//$this->db->where('dept_id',$this->input->post('dept'));
					
			$query = $this->db->get();
			//echo $this->db->last_query();
			//print_r($query->result());
			$data1 = array();
			$data2 = array();
			foreach ($query->result() as $row)
			{
				$data1[] = $row->posi_id;
				$data2[] = $row->posi_name;
				
			}
			$posi_id = implode('***', $data1);
			$posi_name = implode('***', $data2);
			
			return $posi_id."===".$posi_name;
		}	
		function status_search()
		{
			$this->db->select("stat_id, stat_type");
			$this->db->from('pr_emp_status');
			$this->db->order_by("stat_id");
			//$this->db->where('dept_id',$this->input->post('dept'));
					
			$query = $this->db->get();
			//echo $this->db->last_query();
			//print_r($query->result());
			$data1 = array();
			$data2 = array();
			foreach ($query->result() as $row)
			{
				$data1[] = $row->stat_id;
				$data2[] = $row->stat_type;
				
			}
			$status_id = implode('***', $data1);
			$status_name = implode('***', $data2);
			
			return $status_id."===".$status_name;
		}	
	
	
	
	
		function com_all_info()
		{
			
			$this->db->select('*');
			$this->db->from('pr_dept');
			$this->db->order_by("dept_name");
			$query = $this->db->get();
			//echo $this->db->last_query();
			//print_r($query->result());
			$data1 = array();
			$data2 = array();
			foreach ($query->result() as $row)
				{
					$data1[] = $row->dept_id;
					$data2[] = $row->dept_name;
					
				}
			$dept_id = implode('***', $data1);
			$dept_name = implode('***', $data2);
			//------------------------------------section
						
		     $dept_id_name = "$dept_id===$dept_name";
			 $sec_id_name = $this->section_manual_db();
			 $line_id_name = $this->section_search();
			 $desig_id_name = $this->desig_manual_db();
			 $operation_id_name=$this->operation_db();
			 $position_id_name=$this->position_db();
			 $grade_id_name=$this->grade_search();
			 $empstat_id_name=$this->empstat_search();
			 $shift_id_name=$this->shift_search();
			 $attbonus_id_name = $this->attbonus_search();
			
			 return $alldata = $dept_id_name."$$$".$sec_id_name."$$$".$line_id_name."$$$".$desig_id_name."$$$".$operation_id_name."$$$".$position_id_name."$$$".$grade_id_name."$$$".$empstat_id_name."$$$".$shift_id_name."$$$".$attbonus_id_name;
			
		}
	
	
	
	
		function section_manual_db()
		{
			$this->db->select('*');
			$this->db->from('pr_section');
			$this->db->order_by("sec_name");
			$query = $this->db->get();
			//echo $this->db->last_query();
			//print_r($query->result());
			$data1 = array();
			$data2 = array();
			foreach ($query->result() as $row)
			{
				$data1[] = $row->sec_id;
				$data2[] = $row->sec_name;
				
			}
			$sec_id = implode('***', $data1);
			$sec_name = implode('***', $data2);
			
			return $sec_id_name = "$sec_id===$sec_name";
	
		}
	
		function section_search()
		{
			$this->db->select('*');
			$this->db->from('pr_line_num');
			$this->db->order_by("line_name");
			//$this->db->where('dept_id',$this->input->post('dept'));
					
			$query = $this->db->get();
			//echo $this->db->last_query();
			//print_r($query->result());
			$data1 = array();
			$data2 = array();
			foreach ($query->result() as $row)
			{
				$data1[] = $row->line_id;
				$data2[] = $row->line_name;
				
			}
			$line_id = implode('***', $data1);
			$line_name = implode('***', $data2);
			
			return $line_id."===".$line_name;

		}
		
		
		function desig_manual_db()
		{
		
			$this->db->select('*');
			$this->db->from('pr_designation');
			$this->db->order_by("desig_name");
			$query = $this->db->get();
			//echo $this->db->last_query();
			//print_r($query->result());
			$data1 = array();
			$data2 = array();
				foreach ($query->result() as $row)
				{
					$data1[] = $row->desig_id;
					$data2[] = $row->desig_name;
					
				}
			$desig_id = implode('***', $data1);
			$desig_name = implode('***', $data2);
			
			return $desig_id."===".$desig_name;
	
		}
		
		
		function operation_db()
		{
		
			$this->db->select('*');
			$this->db->from('pr_emp_operation');
			$query = $this->db->get();
			//echo $this->db->last_query();
			//print_r($query->result());
			$data1 = array();
			$data2 = array();
				foreach ($query->result() as $row)
				{
					$data1[] = $row->ope_id;
					$data2[] = $row->ope_name;
					
				}
			$operation_id = implode('***', $data1);
			$operation_name = implode('***', $data2);
			
			return $operation_id."===".$operation_name;
	
		}
	
	
		function position_db()
		{
		
			$this->db->select('*');
			$this->db->from('pr_emp_position');
			$query = $this->db->get();
			//echo $this->db->last_query();
			//print_r($query->result());
			$data1 = array();
			$data2 = array();
				foreach ($query->result() as $row)
				{
					$data1[] = $row->posi_id;
					$data2[] = $row->posi_name ;
					
				}
			$position_id = implode('***', $data1);
			$position_name = implode('***', $data2);
			
			return $position_id."===".$position_name;
	
		}
		
		function grade_search()
		{
		$this->db->select('gr_id,gr_name');
		$this->db->from('pr_grade');
						
		$query = $this->db->get();
		//echo $this->db->last_query();
		//print_r($query->result());
		$data1 = array();
		$data2 = array();
		foreach ($query->result() as $row)
		{
			$data1[] = $row->gr_id;
			$data2[] = $row->gr_name;
			
		}
		$line_id = implode('***', $data1);
		$line_name = implode('***', $data2);
		
		return $line_id."===".$line_name;

		}
		
		function empstat_search()
		{
			$this->db->select('stat_id,stat_type');
			$this->db->from('pr_emp_status');
							
			$query = $this->db->get();
			//echo $this->db->last_query();
			//print_r($query->result());
			$data1 = array();
			$data2 = array();
				foreach ($query->result() as $row)
				{
					$data1[] = $row->stat_id;
					$data2[] = $row->stat_type;
					
				}
			$line_id = implode('***', $data1);
			$line_name = implode('***', $data2);
			
			return $line_id."===".$line_name;

		}
		
		function shift_search()
		{
			$this->db->select('*');
			$this->db->from('pr_emp_shift');
							
			$query = $this->db->get();
			//echo $this->db->last_query();
			//print_r($query->result());
			$data1 = array();
			$data2 = array();
				foreach ($query->result() as $row)
				{
					$data1[] = $row->shift_id;
					$data2[] = $row->shift_name;
					
				}
			$shift_id = implode('***', $data1);
			$shift_name = implode('***', $data2);
			
			return $shift_id."===".$shift_name;

		}
		
		
	function shift_change_search($shift_name)
	{
		$this->db->where("shift_name", $shift_name);
		$query = $this->db->get("pr_emp_shift");
		if( $query->num_rows() !=0 )
		{
			foreach ($query->result() as $row)
			{
				$data = array(
						'shift_name'	=> $row->shift_name,
						'shift_duty'  => $row->shift_duty
				);
			}
			//print_r($data);
			
			$this->db->select("shift_id, sh_type");
			$query = $this->db->get("pr_emp_shift_schedule");
					
			$data1 = array();
			$data2 = array();
			foreach ($query->result() as $row)
			{
				$data1[] = $row->shift_id;
				$data2[] = $row->sh_type;
				
			}
			//print_r($data1);
			
			$shift = implode('=*=', $data);
			$shift_id = implode('=*=', $data1);
			$sh_type = implode('=*=', $data2);
			
			return $shift."***".$shift_id."***".$sh_type;
				 
		}
		else
		{
			echo "Shift Name Does not Exist!";
		}
		
		
	}
		 function GetDays($sStartDate, $sEndDate)
		 {  
          	$sStartDate = date("Y-m-d", strtotime($sStartDate)); 
			$sEndDate = date("Y-m-d", strtotime($sEndDate)); 
			  
            // Start the variable off with the start date  
     		$aDays[] = $sStartDate;  
     
     		// Set a 'temp' variable, sCurrentDate, with  
     		// the start date - before beginning the loop  
     		$sCurrentDate = $sStartDate;  
     
     		// While the current date is less than the end date  
     		while($sCurrentDate < $sEndDate){  
       		// Add a day to the current date  
       		$sCurrentDate = date("Y-m-d", strtotime("+1 day", strtotime($sCurrentDate)));  
     
       		// Add this new day to the aDays array  
        		$aDays[] = $sCurrentDate; 
			//print_r($aDays);
     	}  
     
     // Once the loop has finished, return the  
     
     return $aDays;  
   } 
	
	function prox($empid)
	{
		$this->db->select('proxi_id');
		$this->db->where('emp_id',$empid);
		$query = $this->db->get('pr_id_proxi');
		foreach ($query->result() as $rows)
		{
			return $rows->proxi_id;
		}
	}
	
	function emp_id_db($empid,$sStartDat,$sEndDat,$time)
	{
		$emp_table="temp_".$empid;
		
		if(!$this->db->table_exists($emp_table))
		{
			return "Employee ID does not exist!";
		}
		
		$deviceid=1;	
		list($hour, $minute,$sec) = explode(':', trim($time) );	
		
	    
		$min_start = $minute-2;
		$min_end = $minute+3;
		$sec_start = 0;
		$sec_end = 60;
		
		$proxid = $this->prox($empid);
		
		$days = $this->GetDays($sStartDat, $sEndDat);
		
		foreach($days as $day)
			{
				$rand_minutes=rand($min_start,$min_end);
				$rand_sec=rand($sec_start,$sec_end);
				
				$year=trim(substr($day,0,4));
				$month=trim(substr($day,5,2));
				$day=trim(substr($day,8,2));
				$intime_entry = date("Y-m-d H:i:s", mktime($hour, $rand_minutes, $rand_sec, $month, $day, $year));
				
				$data = array( 'device_id'	=>$deviceid	, 'proxi_id'  =>$proxid, 'date_time'  => $intime_entry);		
					$this->db->insert($emp_table, $data);
					// print_r($data);
					 
			}
			
		 return "Insert Successfully";
		
	}
	
	
		function emp_dept_id_db($emp_department_no,$sStartDate,$sEndDate,$time)
		{
		
		$deviceid=1;	
		list($hour, $minute,$sec) = explode(':', trim($time) );	
		
	    
		$min_start = $minute-2;
		$min_end = $minute+3;
		$sec_start = 0;
		$sec_end = 60;
		
		$this->db->select('emp_id');
		$this->db->where('emp_dept_id',$emp_department_no);
		$query = $this->db->get('pr_emp_com_info');
		
		foreach ($query->result() as $row)
		{
			$empid = $row->emp_id ;
			$proxid = $this->prox($empid);
			$emp_table="temp_".$empid;
			$days = $this->GetDays($sStartDate, $sEndDate);
			foreach($days as $day)
			{
				$rand_minutes=rand($min_start,$min_end);
				$rand_sec=rand($sec_start,$sec_end);
				
				$year=trim(substr($day,0,4));
				$month=trim(substr($day,5,2));
				$day=trim(substr($day,8,2));
				$intime_entry = date("Y-m-d H:i:s", mktime($hour, $rand_minutes, $rand_sec, $month, $day, $year));
				$data = array( 'device_id'	=>$deviceid	, 'proxi_id'  =>$proxid, 'date_time'  => $intime_entry);		
				$this->db->insert($emp_table, $data);
				//print_r($data);	 
			}
			
		}
		 echo "Insert Successfully";
	}
	
	
	function emp_sec_id_db($emp_department_no,$sStartDate,$sEndDate,$time)
	{
		
		$deviceid=1;	
		list($hour, $minute,$sec) = explode(':', trim($time) );	
		
	    
		$min_start = $minute-2;
		$min_end = $minute+3;
		$sec_start = 0;
		$sec_end = 60;
		
		$this->db->select('emp_id');
		$this->db->where('emp_sec_id',$emp_department_no);
		$query = $this->db->get('pr_emp_com_info');
		foreach ($query->result() as $row)
		{
			$empid = $row->emp_id ;
			$proxid = $this->prox($empid);
			$emp_table="temp_".$empid;
			$days = $this->GetDays($sStartDate, $sEndDate);
			foreach($days as $day)
			{
				$rand_minutes=rand($min_start,$min_end);
				$rand_sec=rand($sec_start,$sec_end);
				
				$year=trim(substr($day,0,4));
				$month=trim(substr($day,5,2));
				$day=trim(substr($day,8,2));
				$intime_entry = date("Y-m-d H:i:s", mktime($hour, $rand_minutes, $rand_sec, $month, $day, $year));
				$data = array( 'device_id'	=>$deviceid	, 'proxi_id'  =>$proxid, 'date_time'  => $intime_entry);		
				$this->db->insert($emp_table, $data);
				//print_r($data);	 
			}
			
		}
		 echo "Insert Successfully";
	}
	
		function emp_line_id_db($emp_department_no,$sStartDate,$sEndDate,$time)
		{
		
		$deviceid=1;	
		list($hour, $minute,$sec) = explode(':', trim($time) );	
		
	    
		$min_start = $minute-2;
		$min_end = $minute+3;
		$sec_start = 0;
		$sec_end = 60;
		
		$this->db->select('emp_id');
		$this->db->where('emp_line_id',$emp_department_no);
		$query = $this->db->get('pr_emp_com_info');
		foreach ($query->result() as $row)
		{
			$empid = $row->emp_id ;
			$proxid = $this->prox($empid);
			$emp_table="temp_".$empid;
			$days = $this->GetDays($sStartDate, $sEndDate);
			foreach($days as $day)
			{
				$rand_minutes=rand($min_start,$min_end);
				$rand_sec=rand($sec_start,$sec_end);
				
				$year=trim(substr($day,0,4));
				$month=trim(substr($day,5,2));
				$day=trim(substr($day,8,2));
				$intime_entry = date("Y-m-d H:i:s", mktime($hour, $rand_minutes, $rand_sec, $month, $day, $year));
				$data = array( 'device_id'	=>$deviceid	, 'proxi_id'  =>$proxid, 'date_time'  => $intime_entry);		
				$this->db->insert($emp_table, $data);
				//print_r($data);	 
			}
			
		}
		 echo "Insert Successfully";
		}
		
		
		
		function emp_desi_id_db($emp_department_no,$sStartDate,$sEndDate,$time)
		{
		
		$deviceid=1;	
		list($hour, $minute,$sec) = explode(':', trim($time) );	
		
	    
		$min_start = $minute-2;
		$min_end = $minute+3;
		$sec_start = 0;
		$sec_end = 60;
		
		$this->db->select('emp_id');
		$this->db->where('emp_desi_id',$emp_department_no);
		$query = $this->db->get('pr_emp_com_info');
		foreach ($query->result() as $row)
		{
			$empid = $row->emp_id ;
			$proxid = $this->prox($empid);
			$emp_table="temp_".$empid;
			$days = $this->GetDays($sStartDate, $sEndDate);
			foreach($days as $day)
			{
				$rand_minutes=rand($min_start,$min_end);
				$rand_sec=rand($sec_start,$sec_end);
				
				$year=trim(substr($day,0,4));
				$month=trim(substr($day,5,2));
				$day=trim(substr($day,8,2));
				$intime_entry = date("Y-m-d H:i:s", mktime($hour, $rand_minutes, $rand_sec, $month, $day, $year));
				$data = array( 'device_id'	=>$deviceid	, 'proxi_id'  =>$proxid, 'date_time'  => $intime_entry);		
				$this->db->insert($emp_table, $data);
				print_r($data);	 
			}
			
		}
		 echo "Insert Successfully";
	}
	
	
	function leave_transaction_db()
	{
		$empid = $this->input->post('empid');
		$year = $this->input->post('year');
	
		$leave_type_cl='cl';
		$leave_type_sl='sl';
		$leave_type_el='el';
		$leave_type_ml='ml';
		$leave_type_pl='pl';
		
		$this->db->select("emp_id");
		$this->db->where("emp_id", $empid);
		$query = $this->db->get('pr_emp_com_info');
		
		if($query->num_rows() == 0 )
		{
			return "Employee ID dose not exist";
		}
		
		
		$this->db->select('leave_type');
	    $where="emp_id = '$empid' and leave_type = '$leave_type_cl' and trim( substr(start_date,1,4 ) ) = '$year' ";
    	$this->db->where($where);
		$query = $this->db->get('pr_leave_trans');
		$total_casual_leave = $query->num_rows();
		
		
		$this->db->select('leave_type');
	    $where="emp_id = '$empid' and leave_type = '$leave_type_sl' and trim( substr(start_date,1,4 ) ) = '$year' ";
    	$this->db->where($where);
		$query = $this->db->get('pr_leave_trans');
		$total_sick_leave = $query->num_rows();
		
		
		$this->db->select('leave_type');
	    $where="emp_id = '$empid' and leave_type = '$leave_type_el' and trim( substr(start_date,1,4 ) ) = '$year' ";
    	$this->db->where($where);
		$query = $this->db->get('pr_leave_trans');
		$total_earn_leave = $query->num_rows();
		
		$this->db->select('leave_type');
	    $where="emp_id = '$empid' and leave_type = '$leave_type_ml' and trim( substr(start_date,1,4 ) ) = '$year' ";
    	$this->db->where($where);
		$query = $this->db->get('pr_leave_trans');
		$total_maternity_leave = $query->num_rows();
		
		$this->db->select('leave_type');
	    $where="emp_id = '$empid' and leave_type = '$leave_type_pl' and trim( substr(start_date,1,4 ) ) = '$year' ";
    	$this->db->where($where);
		$query = $this->db->get('pr_leave_trans');
		$total_paternity_leave = $query->num_rows();
		
		$total_present = 0;
		
		for( $i = 1; $i<= 31; $i++)
		{
			$i = date("d", mktime(0, 0, 0, 01, $i, 2011));
			$date_field = "date_$i";
			
			$this->db->select($date_field);
			$this->db->where("emp_id", $empid);
			$this->db->where($date_field, "P");
			$this->db->like("att_month", $year);
			$query = $this->db->get('pr_attn_monthly');
			//echo $this->db->last_query();
			$present_count = $query->num_rows();
			if( $present_count != 0 )
			{
				$total_present = $total_present + $present_count ;
			}
		}
		
		$this->db->select("emp_sex");
		$this->db->where("emp_id", $empid);
		$query = $this->db->get("pr_emp_per_info");
		$row = $query->row();
		$emp_sex = $row->emp_sex;
		
		$this->db->select("emp_marital_status");
		$this->db->where("emp_id", $empid);
		$query = $this->db->get("pr_emp_per_info");
		$row = $query->row();
		$emp_marital_status = $row->emp_marital_status;
		
		if($emp_sex == 1 and $emp_marital_status == 2)
		{
			$ml_leave_balance = 0 ;
			$pl_leave_balance = 7 ;
			
			$ml_leave_balance = 0 ;
			$pl_leave_balance = $pl_leave_balance - $total_paternity_leave ;
			
		}
		elseif($emp_sex == 2 and $emp_marital_status == 2)
		{
			$ml_leave_balance = 112;
			$pl_leave_balance = 0 ;
			
			$ml_leave_balance = $ml_leave_balance - $total_maternity_leave;
			$pl_leave_balance = 0 ;
		}
		else
		{
			$ml_leave_balance = 0;
			$pl_leave_balance = 0 ;
		}
		
		$earn_leave_balance = $total_present / 18;		
		$earn_leave_balance = floor($earn_leave_balance);
		
		$data1=array(
					'casual'			=> $total_casual_leave,
					'sick'      		=> $total_sick_leave,
					'earn'      		=> $total_earn_leave,
					'maternity' 		=> $total_maternity_leave,
					'paternity' 		=> $total_paternity_leave,
					'earn_leave_balance'=> $earn_leave_balance,
					'ml_leave_balance'	=> $ml_leave_balance,
					'pl_leave_balance'	=> $pl_leave_balance
					);
					
					//print_r($data1);
					return  $data = implode("-*-",$data1);
					
			
	}
	
	
	function save_leave_db()
	{	
		$empid_leave=$this->input->post('empid_leave');
		$sStartDate=$this->input->post('start_leave_date');
		$sEndDate=$this->input->post('end_leave_date');
		$leave_type=$this->input->post('leave_type');
		
		$sStartDate = date("Y-m-d", strtotime($sStartDate)); 
		$sEndDate = date("Y-m-d", strtotime($sEndDate)); 
		
		$this->db->select('leave_type');
	    $where="emp_id = '$empid_leave' and leave_type = '$leave_type' and  start_date = '$sStartDate' ";
    	$this->db->where($where);
		$query = $this->db->get('pr_leave_trans');
		$num_rows = $query->num_rows();
		if ($num_rows > 0 )
		{
			echo "Duplicate date not allow";
		}
		else
		{
				
			$days = $this->GetDays($sStartDate,$sEndDate);
			foreach($days as $day)
		    {
				$data = array(
						'emp_id'		=> $empid_leave,
						'start_date'    => $day ,
						'leave_type'	=> $leave_type	);
					     $this->db->insert('pr_leave_trans', $data);
						//print_r($data);
						
			}
			// LEAVE LOG Generate
			$this->log_model->log_leave_insert($empid_leave, $sStartDate, $sEndDate, $leave_type);
			echo "Save successfully";
		}
	}

	
	
	
	
	function search_position_name_db()
	{
		$this->db->where('posi_name',$this->input->post('positionname'));
		$query = $this->db->get('pr_emp_position');
		//print_r( $query->result());
		
		
		if( $num_rows = $query->num_rows() !=0 )
		{
			foreach ($query->result() as $row)
			{
				$data = array(
						'posi_id'	=> $row->posi_id,
						'posi_name'  => $row->posi_name
						
				);
				 
			}
			//print_r($data);
			return $data = implode("-*-",$data);
			
			
		}
		else
		{
			return "Position name does not exist";
		}
	}
	
	
	
	function save_positionname_db()
	{
		
		$this->db->select('posi_name');
		$this->db->where('posi_name',$this->input->post('positionname'));
		$query = $this->db->get('pr_emp_position');
		$num_rows = $query->num_rows(); 
		
		if( $num_rows > 0)
		{
			return "Position Already Exist!";
		}
		else
		{
		
			$data = array(
					'posi_name'	=> $this->input->post('positionname')
					
			);
			//print_r($data);
			if($this->db->insert('pr_emp_position', $data))
			{
				return "Position name inserted Successfully";
			} 
			else
			{
				return "FAILED";
			}
		}
		
	
	}
	
	
	function update_positionname_db()
	{
		$id=$this->input->post('positionid');
		$this->db->select("posi_id");
		$this->db->where('posi_id',$id);
		$query = $this->db->get("pr_emp_position");
		$num_row = $query->num_rows();
		if($num_row > 0 )
		{
			$data = array(
						'posi_name'	=> $this->input->post('positionname')
				);
				
				$this->db->where('posi_id',$id);
				if($this->db->update('pr_emp_position', $data)) 
				{
					echo "Updated successfully";
				}
				else
				{
					echo "Update failed";
				}
		}
		else
		{
		 	echo "Position name does not exist";
		}
	}


	function delete_positionname_db()
	{
		$positionname=$this->input->post('positionname');
		$this->db->select("posi_name");
		$this->db->where('posi_name',$positionname);
		$query = $this->db->get("pr_emp_position");
		$num_row = $query->num_rows();
		if($num_row > 0 )
		{
			$this->db->where('posi_name',$positionname);
			if($this->db->delete('pr_emp_position'))
			{
				return "Position name deleted successfully";
			} 
			else
			{
				return "Delete failed";
			}
		}
		else
		{
		 	return "Position name does not exist";
		}
		
	}
	
	function search_operation_name()
	{
		$this->db->where('ope_name',$this->input->post('operationname'));
		$query = $this->db->get('pr_emp_operation');
		//print_r( $query->result());
		
		
		if( $num_rows = $query->num_rows() !=0 )
		{
			foreach ($query->result() as $row)
			{
				$data = array(
						'ope_id'	=> $row->ope_id,
						'ope_name'  => $row->ope_name
						
				);
				// print_r($data);
			}
			return $data = implode("-*-",$data);
			
			
		}
		else
		{
			return "operation name does not exist";
		}
	}
	
	
	
	
	function save_operationname_db()
	{
		$this->db->select('ope_name');
		$this->db->where('ope_name',$this->input->post('operationname'));
		$query = $this->db->get('pr_emp_operation');
		$num_rows = $query->num_rows(); 
		
		if( $num_rows > 0)
		{
			return "operation Already Exist!";
		}
		else
		{
		
			$data = array(
					'ope_name'	=> $this->input->post('operationname')
					
			);
			
			if($this->db->insert('pr_emp_operation', $data))
			{
				return "operation name inserted Successfully";
			} 
			else
			{
				return "FAILED";
			}
		}
		
	
	}
	
	
	
	
	function update_operationname_db()
	{
		$id=$this->input->post('operationid');
		$this->db->select("ope_id");
		$this->db->where('ope_id',$id);
		$query = $this->db->get("pr_emp_operation");
		$num_row = $query->num_rows();
		if($num_row > 0 )
		{
			$data = array(
						'ope_name'	=> $this->input->post('operationname')
				);
				
				$this->db->where('ope_id',$id);
				if($this->db->update('pr_emp_operation', $data)) 
				{
					echo "Updated successfully";
				}
				else
				{
					echo "Update failed";
				}
		}
		else
		{
		 	echo "operation name does not exist";
		}
	}

	function delete_operationname_db()
	{
		$operationname=$this->input->post('operationname');
		$this->db->select("ope_name");
		$this->db->where('ope_name',$operationname);
		$query = $this->db->get("pr_emp_operation");
		$num_row = $query->num_rows();
		if($num_row > 0 )
		{
			$this->db->where('ope_name',$operationname);
			if($this->db->delete('pr_emp_operation'))
			{
				return "operation name deleted successfully";
			} 
			else
			{
				return "Delete failed";
			}
		}
		else
		{
		 	return "operation name does not exist";
		}
		
	}
	
	function shift_change_db()
	{
		$data1 = array();
		$data2 = array();
			
		$this->db->select('*');
		$this->db->from('pr_emp_shift_schedule');
		$query = $this->db->get();
		foreach ($query->result() as $row)
		{
			$data1[]=$row->shift_id ;
			$data2[]=$row->sh_type ;
		}
		$shift_id    = implode('=*=', $data1);
		$sh_type 	 = implode('=*=', $data2);
		return $all_shift_data = "$shift_id===$sh_type";
	}
	
	
	function save_schange_db()
	{
		$this->db->select('shift_name');
		$this->db->where('shift_name',$this->input->post('sh_nam'));
		$query = $this->db->get('pr_emp_shift');
		$num_rows = $query->num_rows(); 
		
		if( $num_rows > 0)
		{
			return "Shift Name Already Exist!";
		}
		else
		{
		
			$data = array(
					'shift_name'	=> $this->input->post('sh_nam'),
					'shift_duty'	=> $this->input->post('shift_time')					
			);
			
			if($this->db->insert('pr_emp_shift', $data))
			{
				return "Shift name inserted Successfully";
			} 
			else
			{
				return "FAILED";
			}
		}
	}
	
		function update_shift_time($shift_name, $shift_id)
	{
		
		
		$this->db->select("shift_name");
		$this->db->where('shift_name',$shift_name);
		$query = $this->db->get("pr_emp_shift");
		$num_row = $query->num_rows();
		if($num_row > 0 )
		{
			$data = array(
						'shift_name'	=> $shift_name,
						'shift_duty'	=> $shift_id
				);
				
				$this->db->where('shift_name',$shift_name);
				if($this->db->update('pr_emp_shift', $data)) 
				{
					echo "Updated successfully";
				}
				else
				{
					echo "Update failed";
				}
		}
		else
		{
		 	echo "Shift name does not exist";
		}
	
	}
	
	function absent_check($date, $emp_id)
	{
		//echo $date;
		$year  = trim(substr($date,0,4));
		$month = trim(substr($date,5,2));
		$day   = trim(substr($date,8,2));
		$date_field = "date_$day";
		$att_month = $year."_".$month."-00";
		
		$this->db->select($date_field);
		$this->db->where("emp_id", $emp_id);
		$this->db->where("att_month", $att_month);
		$this->db->where($date_field, "A");
		$query = $this->db->get("pr_attn_monthly");
		if($query->num_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
		
	}
	
	//===============MANPOWER REPORT=========================
	function manpower_report($year, $month, $date)
	{
			$this->load->dbforge();	
			if($this->db->table_exists("temp_manpower"))
			{
				$this->dbforge->drop_table('temp_manpower');
			}
			if($this->db->table_exists("temp_manpower2"))
			{
				$this->dbforge->drop_table('temp_manpower2');
			}
			$date =$year."-".$month."-".$date ;
			
			$temp_fields = array(
			'id' 	=> array( 'type' => 'INT','constraint' => '11',  'auto_increment' => TRUE),
			'emp_id' => array( 'type' => 'INT','constraint' => '11'),
			'line_name' => array( 'type' => 'varchar','constraint' => '100'),
			'desig_name'  => array( 'type' => 'varchar','constraint' => '100')
			);
			$this->dbforge->add_field($temp_fields);
			$this->dbforge->add_key('id', TRUE);
			$this->dbforge->create_table('temp_manpower');
			
			$this->load->dbforge();	
			$temp_fields = array(
			'id' 	=> array( 'type' => 'INT','constraint' => '11',  'auto_increment' => TRUE),
			'emp_id' => array( 'type' => 'INT','constraint' => '11'),
			'line_name' => array( 'type' => 'varchar','constraint' => '100'),
			'desig_name'  => array( 'type' => 'varchar','constraint' => '100')
			);
			$this->dbforge->add_field($temp_fields);
			$this->dbforge->add_key('id', TRUE);
			$this->dbforge->create_table('temp_manpower2');
			
			$count=0 ;
			$count1=0  ;
			
		
			
			$this->db->select('emp_id');
			$this->db->from('pr_emp_com_info');
			$query = $this->db->get();
			foreach($query->result() as $rows)
			{
					$emp_id=$rows->emp_id ;
					$present_check = $this->present_check($date, $emp_id) ;
					if ($present_check == 1) 
					{
						$this->db->select('pr_line_num.line_name ,pr_designation.desig_name ');
						$this->db->from('pr_emp_com_info');
						$this->db->from('pr_line_num');
						$this->db->from('pr_designation');
						$this->db->where('pr_emp_com_info.emp_id',$emp_id );
						$this->db->where('pr_emp_com_info.emp_line_id = pr_line_num.line_id');
						$this->db->where('pr_emp_com_info.emp_desi_id = pr_designation.desig_id');
						$query = $this->db->get();
						foreach($query->result() as $rows)
						{
							$linename=$rows->line_name ;
							$desig_name=$rows->desig_name ;
							$data2=array(
										'emp_id'  =>$emp_id ,
										'line_name'  =>$linename ,
										'desig_name'  =>$desig_name 
										);
						  $this->db->insert('temp_manpower' , $data2);
							//print_r($data);
								
						}
						$count++;
					}
					
					$absent_check = $this->absent_check($date, $emp_id) ;
					if ($absent_check == 1) 
					{
						$this->db->select('pr_line_num.line_name ,pr_designation.desig_name ');
						$this->db->from('pr_emp_com_info');
						$this->db->from('pr_line_num');
						$this->db->from('pr_designation');
						$this->db->where('pr_emp_com_info.emp_id',$emp_id );
						$this->db->where('pr_emp_com_info.emp_line_id = pr_line_num.line_id');
						$this->db->where('pr_emp_com_info.emp_desi_id = pr_designation.desig_id');
						$query = $this->db->get();
						foreach($query->result() as $rows)
						{
							$linename=$rows->line_name ;
							$desig_name=$rows->desig_name ;
							$data1=array(
										'emp_id'  =>$emp_id ,
										'line_name'  =>$linename ,
										'desig_name'  =>$desig_name 
										);
							$this->db->insert('temp_manpower2' , $data1);
							//print_r($data);
								
						}
						$count1++;
					}
					
			}
			
			
			$this->db->select('line_name');
			$this->db->order_by('line_name', 'ASC');
			$query=$this->db->get('pr_line_num');
			foreach($query->result() as $rows)
			{
				$data['line'][]=$rows->line_name ;
				
				//---------------------Master-----------------------------------
				$this->db->select('sum(total) as total2');
				$this->db->from('pr_budget');
				$this->db->like('designation','Operator');
				$this->db->where("line_name",$rows->line_name); 
				$query1=$this->db->get();
				foreach($query1->result() as $rows1 )
				{
					$data['MOp'][]=$rows1->total2 ;
					$master_op=$rows1->total2 ;
				
				}
				
				
				
				$this->db->select('sum(total) as total2');
				$this->db->from('pr_budget');
				$this->db->like('designation','HP');
				$this->db->where("line_name",$rows->line_name); 
				$query2=$this->db->get();
				foreach($query2->result() as $rows2 )
				{
					$data['MHp'][]=$rows2->total2 ;
					$master_hp=$rows2->total2 ;
					
				}
				
				
				
				$this->db->select('sum(total) as total2');
				$this->db->from('pr_budget');
				$this->db->like('designation','QI');
				$this->db->where("line_name",$rows->line_name); 
				$query3=$this->db->get();
				foreach($query3->result() as $rows3 )
				{
					$data['MQi'][]=$rows3->total2 ;
					$master_qi=$rows3->total2 ;
					
				}
				//---------------------Actual -----------------------------------
				$this->db->select('count(pr_designation.desig_name) as designation');
				$this->db->from('pr_emp_com_info');
				$this->db->from('pr_line_num');
				$this->db->from('pr_designation');
				$this->db->where("pr_emp_com_info.emp_line_id = pr_line_num.line_id");
				$this->db->where("pr_emp_com_info.emp_desi_id = pr_designation.desig_id");
				$this->db->where("pr_line_num.line_name",$rows->line_name);
				$this->db->like("pr_designation.desig_name","Operator");
				$query4 = $this->db->get();
				foreach($query4->result() as $rows4 )
				{
					$data['AOp'][]=$rows4->designation ;
					$actual_op=$rows4->designation ;
					
				}
				
				
				$this->db->select('count(pr_designation.desig_name) as designation');
				$this->db->from('pr_emp_com_info');
				$this->db->from('pr_line_num');
				$this->db->from('pr_designation');
				$this->db->where("pr_emp_com_info.emp_line_id = pr_line_num.line_id");
				$this->db->where("pr_emp_com_info.emp_desi_id = pr_designation.desig_id");
				$this->db->where("pr_line_num.line_name",$rows->line_name);
				$this->db->like("pr_designation.desig_name","Helper");
				$query5 = $this->db->get();
				foreach($query5->result() as $rows5)
				{
					$data['AHp'][]=$rows5->designation ;
					$actual_hp=$rows5->designation ;
					
				}
				
				
				$this->db->select('count(pr_designation.desig_name) as designation');
				$this->db->from('pr_emp_com_info');
				$this->db->from('pr_line_num');
				$this->db->from('pr_designation');
				$this->db->where("pr_emp_com_info.emp_line_id = pr_line_num.line_id");
				$this->db->where("pr_emp_com_info.emp_desi_id = pr_designation.desig_id");
				$this->db->where("pr_line_num.line_name",$rows->line_name);
				$this->db->like("pr_designation.desig_name","QI");
				$query6 = $this->db->get();
				foreach($query6->result() as $rows6)
				{
					$data['AQi'][]=$rows6->designation ;
					$actual_qi=$rows6->designation ;
					
				}
				
				//---------------------Today present-----------------------------------
				
				$this->db->select('count(desig_name) as desig');
				$this->db->like("desig_name","Operator");
				$this->db->where("line_name",$rows->line_name);
				$query7 = $this->db->get('temp_manpower');
				foreach($query7->result() as $rows7)
				{
					$data['TPOp'][]=$rows7->desig ;
					$today_present_op=$rows7->desig ;
				}
			
		
		
				$this->db->select('count(desig_name) as desig');
				$this->db->like("desig_name","Helper");
				$this->db->where("line_name",$rows->line_name);
				$query8 = $this->db->get('temp_manpower');
				foreach($query8->result() as $rows8)
				{
					$data['TPHp'][]=$rows8->desig ;
					$today_present_hp=$rows8->desig ;
					
				}
			
		
				$this->db->select('count(desig_name) as desig');
				$this->db->like("desig_name","QI");
				$this->db->where("line_name",$rows->line_name);
				$query9 = $this->db->get('temp_manpower');
				foreach($query9->result() as $rows9)
				{
					$data['TPQi'][]=$rows9->desig ;
					$today_present_qi=$rows9->desig ;
					
				}
				
				//---------------------Today Absent-----------------------------------
				
				$this->db->select('count(desig_name) as desig');
				$this->db->like("desig_name","Operator");
				$this->db->where("line_name",$rows->line_name); 
				$query10 = $this->db->get('temp_manpower2');
				foreach($query10->result() as $rows10)
				{
					$data['TAOp'][]=$rows10->desig ;
					
				}
			
			
	
				$this->db->select('count(desig_name) as desig');
				$this->db->like("desig_name","Helper");
				$this->db->where("line_name",$rows->line_name);
				$query11 = $this->db->get('temp_manpower2');
				foreach($query11->result() as $rows11)
				{
					$data['TAHp'][]=$rows11->desig ;
					
				}
		
				$this->db->select('count(desig_name) as desig');
				$this->db->like("desig_name","QI");
				$this->db->where("line_name",$rows->line_name); 
				$query12 = $this->db->get('temp_manpower2');
				foreach($query12->result() as $rows12)
				{
					$data['TAQi'][]=$rows12->desig ;
					
				}
				//---------------------Short-----------------------------------
				
				$data['SOp'][]=$actual_op-$master_op ;
				$data['Shp'][]=$actual_hp-$master_hp ;
				$data['Sqi'][]=$actual_qi-$master_qi ;
				
				
				//---------------------get pass-----------------------------------
				
				$this->db->select('count(pr_designation.desig_name) as designation');
				$this->db->from('pr_emp_com_info');
				$this->db->from('pr_line_num');
				$this->db->from('pr_designation');
				$this->db->from('pr_emp_status');
				$this->db->where('pr_emp_com_info.emp_line_id = pr_line_num.line_id');
				$this->db->where('pr_emp_com_info.emp_desi_id = pr_designation.desig_id');
				$this->db->where('pr_emp_com_info.emp_cat_id = pr_emp_status.stat_id');
				$this->db->where('pr_emp_status.stat_type','NEW');
				$this->db->where('pr_emp_com_info.emp_join_date',$date);
				$this->db->where("line_name",$rows->line_name);
				$this->db->like("pr_designation.desig_name","Operator");
				$query13 = $this->db->get();
				foreach($query13->result() as $rows13)
				{
					$data['TGOp'][]=$rows13->designation ;
					$today_getpass_op=$rows13->designation ;
					
				}
			
			
				$this->db->select('count(pr_designation.desig_name) as designation');
				$this->db->from('pr_emp_com_info');
				$this->db->from('pr_line_num');
				$this->db->from('pr_designation');
				$this->db->from('pr_emp_status');
				$this->db->where('pr_emp_com_info.emp_line_id = pr_line_num.line_id');
				$this->db->where('pr_emp_com_info.emp_desi_id = pr_designation.desig_id');
				$this->db->where('pr_emp_com_info.emp_cat_id = pr_emp_status.stat_id');
				$this->db->where('pr_emp_status.stat_type','NEW');
				$this->db->where('pr_emp_com_info.emp_join_date',$date);
				$this->db->where("line_name",$rows->line_name);
				$this->db->like("pr_designation.desig_name","Helper");
				$query14 = $this->db->get();
				foreach($query14->result() as $rows14)
				{
					$data['TGHp'][]=$rows14->designation ;
					$today_getpass_hp=$rows14->designation ;
				}
		
				$this->db->select('count(pr_designation.desig_name) as designation');
				$this->db->from('pr_emp_com_info');
				$this->db->from('pr_line_num');
				$this->db->from('pr_designation');
				$this->db->from('pr_emp_status');
				$this->db->where('pr_emp_com_info.emp_line_id = pr_line_num.line_id');
				$this->db->where('pr_emp_com_info.emp_desi_id = pr_designation.desig_id');
				$this->db->where('pr_emp_com_info.emp_cat_id = pr_emp_status.stat_id');
				$this->db->where('pr_emp_status.stat_type','NEW');
				$this->db->where('pr_emp_com_info.emp_join_date',$date);
				$this->db->where("line_name",$rows->line_name);
				$this->db->like("pr_designation.desig_name","QI");
				$query15 = $this->db->get();
				foreach($query15->result() as $rows15)
				{
					$data['TGQi'][]=$rows15->designation ;
					$today_getpass_qi=$rows15->designation ;
					
				}
				
				//---------------------New  peaple  hire-----------------------------------
				$this->db->select('count(pr_designation.desig_name) as designation');
				$this->db->from('pr_emp_com_info');
				$this->db->from('pr_line_num');
				$this->db->from('pr_designation');
				$this->db->where('pr_emp_com_info.emp_line_id = pr_line_num.line_id');
				$this->db->where('pr_emp_com_info.emp_desi_id = pr_designation.desig_id');
				$this->db->where('pr_emp_com_info.emp_join_date',$date);
				$this->db->where("line_name",$rows->line_name);
				$this->db->like("pr_designation.desig_name","Operator");
				$query16 = $this->db->get();
				//echo $this->db->last_query();
				foreach($query16->result() as $rows16)
				{
					$data['NPOp'][]=$rows16->designation ;
					$new_people_op = $rows16->designation ;
					
				}
			
			
				$this->db->select('count(pr_designation.desig_name) as designation');
				$this->db->from('pr_emp_com_info');
				$this->db->from('pr_line_num');
				$this->db->from('pr_designation');
				$this->db->where('pr_emp_com_info.emp_line_id = pr_line_num.line_id');
				$this->db->where('pr_emp_com_info.emp_desi_id = pr_designation.desig_id');
				$this->db->where('pr_emp_com_info.emp_join_date',$date);
				$this->db->where("line_name",$rows->line_name);
				$this->db->like("pr_designation.desig_name","Helper");
				$query17 = $this->db->get();
				foreach($query17->result() as $rows17)
				{
					$data['NPHp'][]=$rows17->designation ;
					$new_people_hp=$rows17->designation ;
					
				}
			
			
			
				$this->db->select('count(pr_designation.desig_name) as designation');
				$this->db->from('pr_emp_com_info');
				$this->db->from('pr_line_num');
				$this->db->from('pr_designation');
				$this->db->where('pr_emp_com_info.emp_line_id = pr_line_num.line_id');
				$this->db->where('pr_emp_com_info.emp_desi_id = pr_designation.desig_id');
				$this->db->where('pr_emp_com_info.emp_join_date',$date);
				$this->db->where("line_name",$rows->line_name);
				$this->db->like("pr_designation.desig_name","QI");
				$query18 = $this->db->get();
				foreach($query18->result() as $rows18)
				{
					$data['NPQi'][]=$rows18->designation ;
					$new_people_qi=$rows18->designation ;
					
				}
				//---------------------total present-----------------------------------
		
				$data['TOOp'][] = $new_people_op + $today_present_op + $today_getpass_op ;
				$data['TOHp'][] = $new_people_hp + $today_present_hp + $today_getpass_hp ;
				$data['TOQi'][] = $new_people_qi + $today_present_qi + $today_getpass_qi ;
				
				
			}
		
		//	print_r($data) ;
		
			
		$this->dbforge->drop_table('temp_manpower');
		$this->dbforge->drop_table('temp_manpower2');	
		return $data ;
		
			
	
	}
	
	
	
	//===============MANPOWER REPORT=========================
	
	function work_off_delete_function_db()
	{
		
		$work_off_day = $this->input->post('work_off_day');
		$this->db->select("work_off_date");
		$this->db->where('work_off_date',$work_off_day);
		$query = $this->db->get("pr_work_off");
		$num_row = $query->num_rows();
		if($num_row > 0 )
		{
			
			$work_off_day=$this->input->post('work_off_day');
			$this->db->where('work_off_date',$work_off_day);
			$data=$this->db->delete('pr_work_off');
			
			if ($data)
			{
				echo "Delete successfully";
			} 
			else
			{
				echo "Delete failed";
			}
		 }else
		 {
			echo "Date not Exist";
		 }
		 
		 
	
	}
	
	
	function work_off_save_function_db()
	{
		$work_off_day = $this->input->post('work_off_day');
		$this->db->select("work_off_date");
		$this->db->where('work_off_date',$work_off_day);
		$query = $this->db->get("pr_work_off");
		$num_row = $query->num_rows();
		if($num_row > 0 )
		{
			echo "Date Exist";
		}
		else
		{
			$data = array(
			'work_off_date'    => $work_off_day );
			$this->db->insert('pr_work_off',$data);
			//print_r($data);
			echo "Save successfully";
		}
		
		
	
	
	}
	
	
	
	function holiday_db()
	{
		$sStartDate=$this->input->post('holiday_start_day');
		$sEndDate=$this->input->post('holiday_end_date');
		$holiday_description=$this->input->post('holiday_description');
				
		$days = $this->GetDays($sStartDate,$sEndDate);
			foreach($days as $day)
		    {
				$data = array(
						'start_date '    => $day ,
						'description '	=> $holiday_description	);
					     $this->db->insert('pr_holiday', $data);
						//print_r($data);
						
			}
			
			echo "Save successfully";
	
	
	}
 
	

	function manual_entry_Delete_db()
	{
		
		$id=$this->input->post('empid_present_absent');
		$startdate=$this->input->post('startdate_present_absent');
		$startdate = date("Y-m-d", strtotime($startdate)); 
		$temp_table = "temp_$id";
		
		$this->db->select("emp_id");
		$this->db->where("emp_id", $id);
		$query = $this->db->get("pr_emp_com_info");	
		
		if($query->num_rows() == 0)
		{
			return "Employee ID does not exist.";
		}	
		
		$proxi = $this->prox($id);
		
		$date  = $startdate;
		$year  = trim(substr($date,0,4));
		$month = trim(substr($date,5,2));
		$day   = trim(substr($date,8,2));
		
		$att_table = "att_".$year."_".$month;
		$date = date("d-m-Y", mktime(0, 0, 0, $month, $day, $year));
		$search_date = date("Ymd", mktime(0, 0, 0, $month, $day, $year));
		$file_name = "data/$date.TXT";
		$temp_table = "temp_$id";
				
		
		$where ="trim(substr(date_time ,1,10)) = '$startdate'";
		$this->db->where($where);
		$data=$this->db->delete($temp_table);
		
		
		$this->db->where($where);
		$data=$this->db->delete($att_table);
		//echo $this->db->last_query();		
		if ($data)
		{
			echo "Delete successfully";
	 	} 
	 	else
		{
			echo "Delete failed";
		}
		
		if( fopen($file_name,'r') )
		{ 

			$data = file($file_name);
			
			$out = array();
			
			foreach($data as $line) {
				$match_line =  substr($line,5,10);
			
				if(trim($match_line) != "$proxi") {
					$out[] = $line;
				}
			}
			//echo "Line".$line;
			//print_r($out);
			$fp = fopen($file_name, "w+");
			flock($fp, LOCK_EX);
			foreach($out as $line) {
				fwrite($fp, $line);
			}
			flock($fp, LOCK_UN);
			fclose($fp);
		}
	
	}
	
	
	
	
	function add_payment_empid_db($add_payment_empid,$add_payment_id,$add_payment_year,$add_payment_month)
	{
	
	 	 $year_month=$add_payment_year."-".$add_payment_month."-"."01" ;
		 $this->db->select("*");
		 $this->db->where('payment_month',$year_month);
		 $this->db->where('emp_id',$add_payment_empid);
		 $query = $this->db->get("pr_payment");
		 $num_row = $query->num_rows();
		 if($num_row == 0 )
		 {
		 	$data = array(
			'emp_id'		=> $add_payment_empid,
			'payment_amount'	=> $add_payment_id,
			'payment_month'		=> $year_month
					
			);
			//print_r($data);
			$this->db->insert('pr_payment', $data) ;
			echo "Insert successfully";
		 }
		 else
		 {
		 	$data = array(
			'payment_amount'	=> $add_payment_id,
			);
			$this->db->where('payment_month',$year_month);
		 	$this->db->where('emp_id',$add_payment_empid);
			$this->db->update('pr_payment', $data);
			echo "Update successfully";
		 }
		
	}



	
	function dept_add_payment_id_db($column_value_add_payment,$add_payment_id,$add_payment_year,$add_payment_month)
	{
		$year_month=$add_payment_year."-".$add_payment_month."-"."01" ;
		$this->db->select('emp_id');
		$this->db->where('emp_dept_id',$column_value_add_payment);
		$query = $this->db->get('pr_emp_com_info');
		foreach ($query->result() as $row)
		{
			 $empid = $row->emp_id ;
			 $this->db->select("*");
			 $this->db->where('payment_month',$year_month);
			 $this->db->where('emp_id',$empid);
			 $query = $this->db->get("pr_payment");
			 $num_row = $query->num_rows();
			 if($num_row == 0 )
			 {
				$data = array(
				'emp_id'		=> $empid,
				'payment_amount'	=> $add_payment_id,
				'payment_month'	=> $year_month
						
				);
				//print_r($data);
				$this->db->insert('pr_payment', $data) ;
				
			 }
			 else
			 {
				$data = array(
				'payment_amount'	=> $add_payment_id
				);
				$this->db->where('payment_month',$year_month);
				$this->db->where('emp_id',$empid);
				$this->db->update('pr_payment', $data);
				
			 }
				
		}
		echo "Insert successfully";
	
	}
	
	
	
	function section_add_payment_id_db($column_value_add_payment,$add_payment_id,$add_payment_year,$add_payment_month)
	{
		 $year_month=$add_payment_year."-".$add_payment_month."-"."01" ;
		$this->db->select('emp_id');
		$this->db->where('emp_sec_id',$column_value_add_payment);
		$query = $this->db->get('pr_emp_com_info');
		foreach ($query->result() as $row)
		{
			 $empid = $row->emp_id ;
			 $this->db->select("*");
			 $this->db->where('payment_month',$year_month);
			 $this->db->where('emp_id',$empid);
			 $query = $this->db->get("pr_payment");
			 $num_row = $query->num_rows();
			 if($num_row == 0 )
			 {
				$data = array(
				'emp_id'		=> $empid,
				'payment_amount'	=> $add_payment_id,
				'payment_month'	=> $year_month
						
				);
				//print_r($data);
				$this->db->insert('pr_payment', $data) ;
				
			 }
			 else
			 {
				$data = array(
				'payment_amount'	=> $add_payment_id,
				);
				$this->db->where('payment_month',$year_month);
				$this->db->where('emp_id',$empid);
				$this->db->update('pr_payment', $data);
				
			 }
				
		}
		echo "Insert successfully";
	
	}
	
	
	function line_add_payment_id_db($column_value_add_payment,$add_payment_id,$add_payment_year,$add_payment_month)
	{
		 $year_month=$add_payment_year."-".$add_payment_month."-"."01" ;
		$this->db->select('emp_id');
		$this->db->where('emp_line_id',$column_value_add_payment);
		$query = $this->db->get('pr_emp_com_info');
		foreach ($query->result() as $row)
		{
			 $empid = $row->emp_id ;
			 $this->db->select("*");
			 $this->db->where('payment_month',$year_month);
			 $this->db->where('emp_id',$empid);
			 $query = $this->db->get("pr_payment");
			 $num_row = $query->num_rows();
			 if($num_row == 0 )
			 {
				$data = array(
				'emp_id'		=> $empid,
				'payment_amount'	=> $add_payment_id,
				'payment_month'	=> $year_month
						
				);
				//print_r($data);
				$this->db->insert('pr_payment', $data) ;
				
			 }
			 else
			 {
				$data = array(
				'payment_amount'	=> $add_payment_id
				);
				$this->db->where('payment_month',$year_month);
				$this->db->where('emp_id',$empid);
				$this->db->update('pr_payment', $data);
				
			 }
				
		}
		echo "Insert successfully";
	
	}
	
	
	function desig_add_payment_id_db($column_value_add_payment,$add_payment_id,$add_payment_year,$add_payment_month)
	{
		$year_month=$add_payment_year."-".$add_payment_month."-"."01" ;
		$this->db->select('emp_id');
		$this->db->where('emp_desi_id',$column_value_add_payment);
		$query = $this->db->get('pr_emp_com_info');
		foreach ($query->result() as $row)
		{
			 $empid = $row->emp_id ;
			 $this->db->select("*");
			 $this->db->where('payment_month',$year_month);
			 $this->db->where('emp_id',$empid);
			 $query = $this->db->get("pr_payment");
			 $num_row = $query->num_rows();
			 if($num_row == 0 )
			 {
				$data = array(
				'emp_id'	=> $empid,
				'payment_amount'	=> $add_payment_id,
				'payment_month'	=> $year_month
						
				);
				//print_r($data);
				$this->db->insert('pr_payment', $data) ;
				
			 }
			 else
			 {
				$data = array(
				'payment_amount'	=> $add_payment_id
				);
				$this->db->where('payment_month',$year_month);
				$this->db->where('emp_id',$empid);
				$this->db->update('pr_payment', $data);
				
			 }
				
		}
		echo "Insert successfully";
	
	}
	
	
	
	function add_payment_add_db()
	{
		
		$this->db->select('*');
		$this->db->from('pr_dept');
		$query = $this->db->get();
		//echo $this->db->last_query();
		//print_r($query->result());
		$data1 = array();
		$data2 = array();
		foreach ($query->result() as $row)
		{
			$data1[] = $row->dept_id;
			$data2[] = $row->dept_name;
			
		}
		$dept_id = implode('***', $data1);
		$dept_name = implode('***', $data2);
		
		$dept_id_name = "$dept_id===$dept_name";
		$sec_id_name = $this->section_manual_db();
		$line_id_name = $this->section_search();
		$desig_id_name = $this->desig_manual_db();
		
		return $alldata = $dept_id_name."$$$".$sec_id_name."$$$".$line_id_name."$$$".$desig_id_name;
			
	}
	
	function emp_id_db_ad($empid_ad,$tex_ad,$deduction_ad,$year_ad,$month_ad)
	{
	
	 	 $year_month=$year_ad."-".$month_ad."-"."00" ;
		 $this->db->select("*");
		 $this->db->where('deduct_month',$year_month);
		 $this->db->where('emp_id',$empid_ad);
		 $query = $this->db->get("pr_deduct");
		 $num_row = $query->num_rows();
		 if($num_row == 0 )
		 {
		 	$data = array(
			'emp_id'	=> $empid_ad,
			'tax_deduct'	=> $tex_ad,
			'others_deduct'	=> $deduction_ad,
			'deduct_month'	=> $year_month
					
			);
			//print_r($data);
			$this->db->insert('pr_deduct', $data) ;
			echo "Insert successfully";
		 }
		 else
		 {
		 	$data = array(
			'tax_deduct'	=> $tex_ad,
			'others_deduct'	=> $deduction_ad
			);
			$this->db->where('deduct_month',$year_month);
		    $this->db->where('emp_id',$empid_ad);
			$this->db->update('pr_deduct', $data);
			echo "Update successfully";
		 }
		
	}
	
	function emp_dept_id_db_ad($column_value_ad,$tex_ad,$deduction_ad,$year_ad,$month_ad)
	{
		$year_month=$year_ad."-".$month_ad."-"."00" ;
		$this->db->select('emp_id');
		$this->db->where('emp_dept_id',$column_value_ad);
		$query = $this->db->get('pr_emp_com_info');
		foreach ($query->result() as $row)
		{
			 $empid = $row->emp_id ;
			 $this->db->select("*");
			 $this->db->where('deduct_month',$year_month);
			 $this->db->where('emp_id',$empid);
			 $query = $this->db->get("pr_deduct");
			 $num_row = $query->num_rows();
			 if($num_row == 0 )
			 {
				$data = array(
				'emp_id'		=> $empid,
				'tax_deduct'	=> $tex_ad,
				'others_deduct'	=> $deduction_ad,
				'deduct_month'	=> $year_month
						
				);
				//print_r($data);
				$this->db->insert('pr_deduct', $data) ;
				
			 }
			 else
			 {
				$data = array(
				'tax_deduct'	=> $tex_ad,
				'others_deduct'	=> $deduction_ad
				);
				$this->db->where('deduct_month',$year_month);
				$this->db->where('emp_id',$empid);
				$this->db->update('pr_deduct', $data);
				
			 }
				
		}
		echo "Insert successfully";
	
	}
	
	
	
	function emp_sec_id_db_ad($column_value_ad,$tex_ad,$deduction_ad,$year_ad,$month_ad)
	{
		$year_month=$year_ad."-".$month_ad."-"."00" ;
		$this->db->select('emp_id');
		$this->db->where('emp_sec_id',$column_value_ad);
		$query = $this->db->get('pr_emp_com_info');
		foreach ($query->result() as $row)
		{
			 $empid = $row->emp_id ;
			 $this->db->select("*");
			 $this->db->where('deduct_month',$year_month);
			 $this->db->where('emp_id',$empid);
			 $query = $this->db->get("pr_deduct");
			 $num_row = $query->num_rows();
			 if($num_row == 0 )
			 {
				$data = array(
				'emp_id'		=> $empid,
				'tax_deduct'	=> $tex_ad,
				'others_deduct'	=> $deduction_ad,
				'deduct_month'	=> $year_month
						
				);
				//print_r($data);
				$this->db->insert('pr_deduct', $data) ;
				
			 }
			 else
			 {
				$data = array(
				'tax_deduct'	=> $tex_ad,
				'others_deduct'	=> $deduction_ad
				);
				$this->db->where('deduct_month',$year_month);
				$this->db->where('emp_id',$empid);
				$this->db->update('pr_deduct', $data);
				
			 }
				
		}
		echo "Insert successfully";
	
	}
	
	
	function emp_line_id_db_ad($column_value_ad,$tex_ad,$deduction_ad,$year_ad,$month_ad)
	{
		$year_month=$year_ad."-".$month_ad."-"."00" ;
		$this->db->select('emp_id');
		$this->db->where('emp_line_id',$column_value_ad);
		$query = $this->db->get('pr_emp_com_info');
		foreach ($query->result() as $row)
		{
			 $empid = $row->emp_id ;
			 $this->db->select("*");
			 $this->db->where('deduct_month',$year_month);
			 $this->db->where('emp_id',$empid);
			 $query = $this->db->get("pr_deduct");
			 $num_row = $query->num_rows();
			 if($num_row == 0 )
			 {
				$data = array(
				'emp_id'		=> $empid,
				'tax_deduct'	=> $tex_ad,
				'others_deduct'	=> $deduction_ad,
				'deduct_month'	=> $year_month
						
				);
				//print_r($data);
				$this->db->insert('pr_deduct', $data) ;
				
			 }
			 else
			 {
				$data = array(
				'tax_deduct'	=> $tex_ad,
				'others_deduct'	=> $deduction_ad
				);
				$this->db->where('deduct_month',$year_month);
				$this->db->where('emp_id',$empid);
				$this->db->update('pr_deduct', $data);
				
			 }
				
		}
		echo "Insert successfully";
	
	}
	
	
	function emp_desi_id_db_ad($column_value_ad,$tex_ad,$deduction_ad,$year_ad,$month_ad)
	{
		$year_month=$year_ad."-".$month_ad."-"."00" ;
		$this->db->select('emp_id');
		$this->db->where('emp_desi_id',$column_value_ad);
		$query = $this->db->get('pr_emp_com_info');
		foreach ($query->result() as $row)
		{
			 $empid = $row->emp_id ;
			 $this->db->select("*");
			 $this->db->where('deduct_month',$year_month);
			 $this->db->where('emp_id',$empid);
			 $query = $this->db->get("pr_deduct");
			 $num_row = $query->num_rows();
			 if($num_row == 0 )
			 {
				$data = array(
				'emp_id'		=> $empid,
				'tax_deduct'	=> $tex_ad,
				'others_deduct'	=> $deduction_ad,
				'deduct_month'	=> $year_month
						
				);
				//print_r($data);
				$this->db->insert('pr_deduct', $data) ;
				
			 }
			 else
			 {
				$data = array(
				'tax_deduct'	=> $tex_ad,
				'others_deduct'	=> $deduction_ad
				);
				$this->db->where('deduct_month',$year_month);
				$this->db->where('emp_id',$empid);
				$this->db->update('pr_deduct', $data);
				
			 }
				
		}
		echo "Insert successfully";
	
	}

	
	function add_work_off_db()
	{
	
			$this->db->select('*');
			$this->db->from('pr_dept');
			$query = $this->db->get();
			//echo $this->db->last_query();
			//print_r($query->result());
			$data1 = array();
			$data2 = array();
			foreach ($query->result() as $row)
			{
				$data1[] = $row->dept_id;
				$data2[] = $row->dept_name;
				
			}
			$dept_id = implode('***', $data1);
			$dept_name = implode('***', $data2);
			
			$dept_id_name = "$dept_id===$dept_name";
			$sec_id_name = $this->section_manual_db();
			$line_id_name = $this->section_search();
			$desig_id_name = $this->desig_manual_db();
			
			return $alldata = $dept_id_name."$$$".$sec_id_name."$$$".$line_id_name."$$$".$desig_id_name;
				
		
	
	}
	
	
	
	
	
	function work_off_empid_db($work_off_empid,$work_off_date)
	{
	
	 	 $year_month=$work_off_date ;
		 $this->db->select("*");
		 $this->db->where('work_off_date',$year_month);
		 $this->db->where('emp_id',$work_off_empid);
		 $query = $this->db->get("pr_work_off");
		 $num_row = $query->num_rows();
		 if($num_row == 0 )
		 {
		 	$data = array(
			'emp_id'		=> $work_off_empid,
			'work_off_date'		=> $year_month
					
			);
			//print_r($data);
			$this->db->insert('pr_work_off', $data) ;
			echo "Insert successfully";
		 }
		 else
		 {
		 	echo "Already  successfully";
		 }
		
	}

  function all_work_off_id_db($work_off_date)
  {
  
  		
		$year_month=$work_off_date ;
		$this->db->select('emp_id');
		$query = $this->db->get('pr_emp_com_info');
		foreach ($query->result() as $row)
		{
			 $empid = $row->emp_id ;
			 $this->db->select("*");
			 $this->db->where('work_off_date',$year_month);

			 $this->db->where('emp_id',$empid);
			 $query = $this->db->get("pr_work_off");
			 $num_row = $query->num_rows();
			 if($num_row == 0 )
			 {
				$data = array(
				'emp_id'		=> $empid,
				'work_off_date'	=> $year_month
						
				);
				//print_r($data);
				$this->db->insert('pr_work_off', $data) ;
				
			 }
			 else
			 {
				$data = array(
				'work_off_date'	=> $year_month
				);
				$this->db->where('work_off_date',$year_month);
				$this->db->where('emp_id',$empid);
				$this->db->update('pr_work_off', $data);
				
			 }
			
		}
	echo "Insert successfully";
	
	
  	
  }

	
	function dept_work_off_id_db($column_value_work_off,$work_off_empid,$work_off_date)
	{
		$year_month=$work_off_date ;
		$this->db->select('emp_id');
		$this->db->where('emp_dept_id',$column_value_work_off);
		$query = $this->db->get('pr_emp_com_info');
		foreach ($query->result() as $row)
		{
			 $empid = $row->emp_id ;
			 $this->db->select("*");
			 $this->db->where('work_off_date',$year_month);
			 $this->db->where('emp_id',$empid);
			 $query = $this->db->get("pr_work_off");
			 $num_row = $query->num_rows();
			 if($num_row == 0 )
			 {
				$data = array(
				'emp_id'		=> $empid,
				'work_off_date'	=> $year_month
						
				);
				//print_r($data);
				$this->db->insert('pr_work_off', $data) ;
				
			 }
			 else
			 {
				$data = array(
				'work_off_date'	=> $year_month
				);
				$this->db->where('work_off_date',$year_month);
				$this->db->where('emp_id',$empid);
				$this->db->update('pr_work_off', $data);
				
			 }
			
		}
	echo "Insert successfully";
	
	}
	
	
	
	function section_work_off_id_db($column_value_work_off,$work_off_empid,$work_off_date)
	{
		$year_month=$work_off_date ;
		$this->db->select('emp_id');
		$this->db->where('emp_sec_id',$column_value_work_off);
		$query = $this->db->get('pr_emp_com_info');
		foreach ($query->result() as $row)
		{
			 $empid = $row->emp_id ;
			 $this->db->select("*");
			 $this->db->where('work_off_date',$year_month);
			 $this->db->where('emp_id',$empid);
			 $query = $this->db->get("pr_work_off");
			 $num_row = $query->num_rows();
			 if($num_row == 0 )
			 {
				$data = array(
				'emp_id'		=> $empid,
				'work_off_date'	=> $year_month
						
				);
				//print_r($data);
				$this->db->insert('pr_work_off', $data) ;
				
			 }
			 else
			 {
				$data = array(
				'work_off_date'	=> $year_month
				);
				$this->db->where('work_off_date',$year_month);
				$this->db->where('emp_id',$empid);
				$this->db->update('pr_work_off', $data);
				
			 }
				
		}
		echo "Insert successfully";
	
	}
	
	
	function line_work_off_id_db($column_value_work_off,$work_off_empid,$work_off_date)
	{
		$year_month=$work_off_date ;
		$this->db->select('emp_id');
		$this->db->where('emp_line_id',$column_value_work_off);
		$query = $this->db->get('pr_emp_com_info');
		foreach ($query->result() as $row)
		{
			 $empid = $row->emp_id ;
			 $this->db->select("*");
			 $this->db->where('work_off_date',$year_month);
			 $this->db->where('emp_id',$empid);
			 $query = $this->db->get("pr_work_off");
			 $num_row = $query->num_rows();
			 if($num_row == 0 )
			 {
				$data = array(
				'emp_id'		=> $empid,
				'work_off_date'	=> $year_month
						
				);
				//print_r($data);
				$this->db->insert('pr_work_off', $data) ;
				
			 }
			 else
			 {
				$data = array(
				'work_off_date'	=> $year_month
				);
				$this->db->where('work_off_date',$year_month);
				$this->db->where('emp_id',$empid);
				$this->db->update('pr_work_off', $data);
				
			 }
				
		}
		echo "Insert successfully";
	
	}
	
	
	function desig_work_off_id_db($column_value_work_off,$work_off_empid,$work_off_date)
	{
		$year_month=$work_off_date ;
		$this->db->select('emp_id');
		$this->db->where('emp_desi_id',$column_value_work_off);
		$query = $this->db->get('pr_emp_com_info');
		foreach ($query->result() as $row)
		{
			 $empid = $row->emp_id ;
			 $this->db->select("*");
			 $this->db->where('work_off_date',$year_month);
			 $this->db->where('emp_id',$empid);
			 $query = $this->db->get("pr_work_off");
			 $num_row = $query->num_rows();
			 if($num_row == 0 )
			 {
				$data = array(
				'emp_id'		=> $empid,
				'work_off_date'	=> $year_month
						
				);
				//print_r($data);
				$this->db->insert('pr_work_off', $data) ;
				
			 }
			 else
			 {
				$data = array(
				'work_off_date'	=> $year_month
				);
				$this->db->where('work_off_date',$year_month);
				$this->db->where('emp_id',$empid);
				$this->db->update('pr_work_off', $data);
				
			 }
				
		}
		echo "Insert successfully";
	
	}
	
	function continuous_report($present_status,$status, $year_month, $col_desig, $col_line, $col_section, $col_dept, $col_all)
	{
		$col_desig = $col_desig;
		$col_line = $col_line;
		$col_section = $col_section;
		$col_dept = $col_dept;
		$col_all = $col_all;
		
		$this->db->select('*');
		$this->db->from('pr_attn_monthly');
			$this->db->from('pr_emp_com_info');
			$this->db->from('pr_dept');
			$this->db->from('pr_section');
			$this->db->from('pr_line_num');
			$this->db->from('pr_designation');
			$this->db->where('pr_emp_com_info.emp_desi_id = pr_designation.desig_id');
			$this->db->where('pr_emp_com_info.emp_dept_id = pr_dept.dept_id');
			$this->db->where('pr_emp_com_info.emp_sec_id = pr_section.sec_id');
			$this->db->where('pr_emp_com_info.emp_line_id = pr_line_num.line_id');
			$this->db->where('pr_attn_monthly.emp_id = pr_emp_com_info.emp_id');
		$this->db->like("att_month", $year_month);
		if($col_all !='all')
		{
			if($col_dept !="undefined")
			{
				$this->db->where("pr_emp_com_info.emp_dept_id", $col_dept);
			}
			if($col_section !="undefined")
			{
				$this->db->where("pr_emp_com_info.emp_sec_id", $col_section);
			}
			if($col_line !="undefined")
			{
				$this->db->where("pr_emp_com_info.emp_line_id ", $col_line);
			}
			if($col_desig !="undefined")
			{
				$this->db->where("pr_emp_com_info.emp_desi_id", $col_desig);
			}
			
		}
		$this->db->order_by("pr_dept.dept_name");
		$this->db->order_by("pr_section.sec_name");
		$this->db->order_by("pr_line_num.line_name");
		$this->db->order_by("pr_designation.desig_name");
		$this->db->order_by("pr_emp_com_info.emp_id");
		echo $this->db->last_query();
		$query = $this->db->get();	
		$data=array();
		$field=10;
		//$present_status="P";
		$startdays = $this->uri->segment(3);
		$enddays = $this->uri->segment(4);
			
		//	$startdays=15;
			//$enddays=26 ;
			
			
			
		$data=array();
		foreach ($query->result_array() as $rows => $row)
		{
			$emp_id=$row['emp_id'];
			$this->db->select("");
			$this->db->where("emp_id",$emp_id);
			$this->db->like("att_month", $year_month);
			$query = $this->db->get("pr_attn_monthly");
		
			//echo $this->db->last_query();
			$count = 0;
			
			//echo $emp_id;
			
			$this->db->select("proxi_id");
			$this->db->where("emp_id",$emp_id);
			$query2 = $this->db->get("pr_id_proxi");
			foreach($query2->result() as $rows)
			{
				$proxid=$rows->proxi_id;
				
			}
			//print_r($data);
			$this->db->select('pr_emp_per_info.emp_full_name,pr_designation.desig_name,pr_dept.dept_name,pr_section.sec_name,pr_line_num.line_name,emp_join_date');
			$this->db->from('pr_emp_per_info');
			$this->db->from('pr_emp_com_info');
			$this->db->from('pr_dept');
			$this->db->from('pr_section');
			$this->db->from('pr_line_num');
			$this->db->from('pr_designation');
			$this->db->where('pr_emp_com_info.emp_desi_id = pr_designation.desig_id');
			$this->db->where('pr_emp_com_info.emp_dept_id = pr_dept.dept_id');
			$this->db->where('pr_emp_com_info.emp_sec_id = pr_section.sec_id');
			$this->db->where('pr_emp_com_info.emp_line_id = pr_line_num.line_id');
			$this->db->where('pr_emp_per_info.emp_id = pr_emp_com_info.emp_id');
			$this->db->where("pr_emp_com_info.emp_id",$emp_id);
			$query1 = $this->db->get();
			foreach($query1->result() as $rows)
			{
				$emp_full_name=$rows->emp_full_name;
				$desig_name=$rows->desig_name;
				$dept_name=$rows->dept_name;
				$sec_name=$rows->sec_name;
				$line_name=$rows->line_name;
				$emp_join_date=$rows->emp_join_date;
				
			}
			
			foreach($query->result_array() as $rows => $value)
			{
				for($i=$startdays ; $i<= $enddays ; $i++)
				{
					$i = date("d", mktime(0,0,0,0,$i,0));
					//$idate = date("d", mktime(0, 0, 0, 0, $i, 0));
					 $date="date_$i";
					
					 
					if($value[$date] == $present_status)
					{
						//echo $value[$date];
			//echo "<td>$value[$date]</td>";	
						$count++;
					}
				}
				if($count > 0)
				{
					$data['empid'][]=$emp_id ;
					$data['proxid'][]=$proxid ;
					$data['fullname'][]=$emp_full_name ;
					$data['jdate'][]=$emp_join_date ;
					$data['dept_name'][]=$dept_name ;
					$data['sec_name'][]=$sec_name ;
					$data['line_name'][]=$line_name ;
					$data['desig'][]=$desig_name ;
					$data['total'][]=$count ;
				}
			}
				
					
      	}
		if($data)
		{
			
			return $data;
		}
		else
		{
			return "Requested list is empty";
		}
				
	}
	
	function continuous_late_report($start_date, $end_date, $year_month, $col_desig, $col_line, $col_section, $col_dept, $col_all)
	{
		$start_date = $start_date; 
		$end_date = $end_date; 
		$year_month = $year_month;
		$col_desig = $col_desig;
		$col_line = $col_line;
		$col_section = $col_section;
		$col_dept = $col_dept;
		$col_all = $col_all;
		
		$start_tarik = $year_month."-".$start_date;
		$end_tarik = $year_month."-".$end_date;
		
		$days = $this->GetDays($start_tarik, $end_tarik);
		
		$data =array();
		//$all_emp = $this->all_emp();
		
		$this->db->select("pr_emp_com_info.emp_id");
		$this->db->from("pr_emp_com_info");
			$this->db->from('pr_dept');
			$this->db->from('pr_section');
			$this->db->from('pr_line_num');
			$this->db->from('pr_designation');
			$this->db->where('pr_emp_com_info.emp_desi_id = pr_designation.desig_id');
			$this->db->where('pr_emp_com_info.emp_dept_id = pr_dept.dept_id');
			$this->db->where('pr_emp_com_info.emp_sec_id = pr_section.sec_id');
			$this->db->where('pr_emp_com_info.emp_line_id = pr_line_num.line_id');
		if($col_all !='all')
		{
			if($col_dept !="undefined")
			{
				$this->db->where("pr_emp_com_info.emp_dept_id", $col_dept);
			}
			if($col_section !="undefined")
			{
				$this->db->where("pr_emp_com_info.emp_sec_id", $col_section);
			}
			if($col_line !="undefined")
			{
				$this->db->where("pr_emp_com_info.emp_line_id ", $col_line);
			}
			if($col_desig !="undefined")
			{
				$this->db->where("pr_emp_com_info.emp_desi_id", $col_desig);
			}
			
		}
		$this->db->order_by("pr_dept.dept_name");
		$this->db->order_by("pr_section.sec_name");
		$this->db->order_by("pr_line_num.line_name");
		$this->db->order_by("pr_designation.desig_name");
		$this->db->order_by("pr_emp_com_info.emp_id");
		$query = $this->db->get();
		foreach($query->result() as $rows)
		{
			$count = 0;
			$emp_id = $rows->emp_id;
			$emp_table = "temp_$emp_id";
			
			foreach($days as $date)
			{			
				
				set_time_limit(200) ;
				ini_set("memory_limit","128M");
				
				$emp_shift = $this->emp_shift_check($emp_id, $date);
			
				$schedule = $this->schedule_check($emp_shift);
				//print_r($schedule);
				$late_start =  $schedule[0]["late_start"]; 
				$intime_end =  $schedule[0]["in_end"];
				$present_check = $this->present_check($date, $emp_id);
				if( $present_check == true)
				{
					$in_out_time = $this->time_check_in($date, $late_start, $intime_end, $emp_table);
								
					if($in_out_time != '')
					{
						$count++;
					}
				}
			}
			if($count != 0 )
			{
				//echo "$emp_id=>$count<br>";
				$this->db->select('pr_emp_com_info.emp_id,pr_emp_per_info.emp_full_name, pr_designation.desig_name, pr_emp_com_info.emp_join_date, pr_dept.dept_name, pr_section.sec_name, pr_line_num.line_name, pr_id_proxi.proxi_id, pr_emp_shift.shift_name ,pr_emp_com_info.emp_cat_id');
				$this->db->from('pr_emp_per_info');
				$this->db->from('pr_emp_com_info');
				$this->db->from('pr_designation');
				$this->db->from('pr_dept');
				$this->db->from('pr_section');
				$this->db->from('pr_line_num');
				$this->db->from('pr_emp_shift');
				$this->db->from('pr_id_proxi');
				$this->db->where('pr_emp_per_info.emp_id = pr_emp_com_info.emp_id');
				$this->db->where('pr_emp_com_info.emp_desi_id = pr_designation.desig_id');
				$this->db->where('pr_emp_com_info.emp_dept_id = pr_dept.dept_id');
				$this->db->where('pr_emp_com_info.emp_sec_id = pr_section.sec_id');
				$this->db->where('pr_emp_com_info.emp_line_id = pr_line_num.line_id');
				$this->db->where('pr_emp_com_info.emp_id = pr_id_proxi.emp_id');
				$this->db->where('pr_emp_shift.shift_id = pr_emp_com_info.emp_shift');
				$this->db->where("pr_emp_per_info.emp_id = '$emp_id'");
				$query = $this->db->get();
				
				foreach($query->result() as $rows)
				{
					$emp_cat_id = $rows->emp_cat_id;
					
					if($emp_cat_id == 1 || $emp_cat_id == 2 || $emp_cat_id == 5)
					{
						$data["emp_id"][] = $rows->emp_id;
						$data["proxi_id"][] = $rows->proxi_id;
						$data["emp_name"][] = $rows->emp_full_name;
						$data["desig_name"][] = $rows->desig_name;
						$data["doj"][] = $rows->emp_join_date;
						$data["dept_name"][] = $rows->dept_name;
						$data["sec_name"][] = $rows->sec_name;
						$data["line_name"][] = $rows->line_name;
						$data["shift_name"][] =$rows->shift_name;
						$data["count"][] = $count;
					}
				}
			}
		}
		
		if($data)
		{
			
			return $data;
		}
		else
		{
			return "Requested list is empty";
		}
				
	}
	
	//========================Start Salary Summary=================
	function salary_summary($salary_month)
	{
		$all_data = array();
		
		$salary_month = $salary_month;
		
		$this->db->select("dept_id,dept_name");
		$this->db->order_by("dept_name");
		$query = $this->db->get("pr_dept");
		?>
		<!--<table border="1" cellpadding="0" cellspacing="0" style="font-size:10px;">
		<th>Department</th><th>Emp.Cash</th><th>Emp.Bank</th><th>Salary.Cash</th><th>Salary.Bank</th><th>Attn.B.Cash</th><th>Attn.B.Bank</th><th>Over.T.Cash</th><th>Over.T.Bank</th><th>Total.Cash</th><th>Total.Bank</th><th>Cash & Bank</th><th>Cash G. & CMS Adv.</th><th>Bank G. & CMS Adv.</th><th>Abs.Cash</th><th>Abs.Bank</th><th>Stam.Cash</th><th>Stam.Bank</th><th>Tax.Cash</th><th>Tax.Bank</th><th>Cash</th><th>Bank</th><th>Cash+Bank</th>-->
		<?php
		foreach($query->result() as $rows)
		{
			//echo "<tr>";
			$emp_stat = array('3','4');
			$data = array();
			$data1 = array();
						
			//echo "<td>";
			//echo $rows->dept_name;
			//echo "</td>";
			$all_data["dept"][] = $rows->dept_name;
			$dept_id = $rows->dept_id;
			
			$this->db->where("emp_dept_id", $dept_id );
			$this->db->where("salary_draw", "1");
			$this->db->where_not_in("emp_cat_id", $emp_stat);
			$this->db->from('pr_emp_com_info');
			$emp_cash = $this->db->count_all_results();
			//echo "<td>";
			//echo $emp_cash;
			//echo "</td>";
			
			$all_data["emp_cash"][] = $emp_cash;
			
			//echo "BANK_EMP==>";
			$this->db->where("emp_dept_id", $dept_id );
			$this->db->where("salary_draw", "2");
			$this->db->where_not_in("emp_cat_id", $emp_stat);
			$this->db->from('pr_emp_com_info');
			$emp_bank = $this->db->count_all_results();
			//echo "<td>";
			//echo $emp_bank;
			//echo "</td>";
			
			$all_data["emp_bank"][] = $emp_bank;
			
			$this->db->select("emp_id");
			$this->db->where("emp_dept_id", $dept_id );
			$this->db->where("salary_draw", "1");
			$this->db->where_not_in("emp_cat_id", $emp_stat);
			$this->db->from('pr_emp_com_info');
			$query = $this->db->get();
			foreach($query->result() as $rows)
			{
				$data[] = $rows->emp_id;
			}
			//print_r($data);
			
			$data = implode("xxx",$data);
			
			$emp_id_cash = explode('xxx', trim($data));
			
			$this->db->select("emp_id");
			$this->db->where("emp_dept_id", $dept_id );
			$this->db->where("salary_draw", "2");
			$this->db->where_not_in("emp_cat_id", $emp_stat);
			$this->db->from('pr_emp_com_info');
			$query = $this->db->get();
			foreach($query->result() as $rows)
			{
				$data1[] = $rows->emp_id;
			}
			//print_r($data);
			
			$data1 = implode("xxx",$data1);
			
			$emp_id_bank = explode('xxx', trim($data1));
			
			//=================Total Cash salary calculation===============>>
			
			//echo "CASH_SALARY==>";
			$this->db->select_sum('net_pay');
			$this->db->from("pr_pay_scale_sheet");
			$this->db->where_in('pr_pay_scale_sheet.emp_id', $emp_id_cash);
			$this->db->like("salary_month", $salary_month);
			$query = $this->db->get();
			//echo $this->db->last_query();
			$row = $query->row();
			$net_pay = $row->net_pay;
			if($net_pay =='')
			{
				$net_pay = 0;
			}
			//echo "<td>";
			//echo $net_pay;
			//echo "</td>";
			$cash_total = $net_pay;
			
			$all_data["cash_sum"][] = $net_pay;
			//=================Total Cash salary calculation===============<<
			
			//=================Total Bank salary calculation===============>>
			//echo "BANK_SALARY==>";
			
			
			$this->db->select_sum('net_pay');
			$this->db->from("pr_pay_scale_sheet");
			$this->db->where_in('pr_pay_scale_sheet.emp_id', $emp_id_bank);
			$this->db->like("salary_month", $salary_month);
			$query = $this->db->get();
			//echo $this->db->last_query();
			$row = $query->row();
			$net_pay = $row->net_pay;
			if($net_pay =='')
			{
				$net_pay = 0;
			}
			//echo "<td>";
			//echo $net_pay;
			//echo "</td>";
			$bank_total = $row->net_pay;
			$all_data["bank_sum"][] = $net_pay;
			//=================Total Bank salary calculation===============<<
			
			//=================Total Cash Attn. Bouns calculation===============>>
			//echo "CASH_ATTN_BOUNS==>";
						
			$this->db->select_sum('att_bonus ');
			$this->db->from("pr_pay_scale_sheet");
			$this->db->where_in('pr_pay_scale_sheet.emp_id', $emp_id_cash);
			$this->db->like("salary_month", $salary_month);
			$query = $this->db->get();
			//echo $this->db->last_query();
			$row = $query->row();
			$att_bonus = $row->att_bonus;
			if($att_bonus =='')
			{
				$att_bonus = 0;
			}
			//echo "<td>";
			//echo $att_bonus;
			//echo "</td>";
			
			$cash_total = $cash_total + $row->att_bonus;
			
			$all_data["cash_att_bonus"][] = $att_bonus;
			//=================Total Cash Attn. Bouns calculation===============<<
			
			//=================Total Bank Attn. Bouns calculation===============>>
			//echo "BANK_ATTN_BOUNS==>";
						
			$this->db->select_sum('att_bonus ');
			$this->db->from("pr_pay_scale_sheet");
			$this->db->where_in('pr_pay_scale_sheet.emp_id', $emp_id_bank);
			$this->db->like("salary_month", $salary_month);
			$query = $this->db->get();
			//echo $this->db->last_query();
			$row = $query->row();
			$att_bonus = $row->att_bonus;
			if($att_bonus =='')
			{
				$att_bonus = 0;
			}
			//echo "<td>";
			//echo $att_bonus;
			//echo "</td>";
			$bank_total = $bank_total + $row->att_bonus;
			$all_data["bank_att_bonus"][] = $att_bonus;
			
			//=================Total Bank Attn. Bouns calculation===============<<
			
			//=================Total Cash Overtime calculation===============>>
									
			$this->db->select_sum('ot_amount');
			$this->db->from("pr_pay_scale_sheet");
			$this->db->where_in('pr_pay_scale_sheet.emp_id', $emp_id_cash);
			$this->db->like("salary_month", $salary_month);
			$query = $this->db->get();
			//echo $this->db->last_query();
			$row = $query->row();
			$ot_amount = $row->ot_amount;
			if($ot_amount =='')
			{
				$ot_amount = 0;
			}
			//echo "<td>";
			//echo $ot_amount;
			//echo "</td>";
			
			$cash_total = $cash_total + $row->ot_amount;
			$all_data["cash_ot_amount"][] = $ot_amount;
			
			//=================Total Cash Overtime calculation===============<<
			
			//=================Total Bank Overtime calculation===============>>
									
			$this->db->select_sum('ot_amount');
			$this->db->from("pr_pay_scale_sheet");
			$this->db->where_in('pr_pay_scale_sheet.emp_id', $emp_id_bank);
			$this->db->like("salary_month", $salary_month);
			$query = $this->db->get();
			//echo $this->db->last_query();
			$row = $query->row();
			$ot_amount = $row->ot_amount;
			if($ot_amount =='')
			{
				$ot_amount = 0;
			}
			//echo "<td>";
			//echo $ot_amount;
			//echo "</td>";
			
			$bank_total = $bank_total + $row->ot_amount;
			$all_data["bank_ot_amount"][] = $ot_amount;
			
			//=================Total Bank Overtime calculation===============<<
			
			//=================Total Cash Salary calculation===============>>
			//echo "CASH_TOTAL==>";
			//echo "<td>";			
			//echo $cash_total;
			//echo "</td>";
			
			$all_data["cash_total"][] = $cash_total;
			//=================Total Cash Salary calculation===============<<
			
			//=================Total Bank Salary calculation===============>>
			//echo "BANK_TOTAL==>";
			//echo "<td>";			
			//echo $bank_total;
			//echo "</td>";
			
			$all_data["bank_total"][] = $bank_total;
			//=================Total Bank Salary calculation===============<<
			
			//=================Total Cash & Bank Salary calculation===============>>
			$total_cash_and_bank = $cash_total + $bank_total;
			//echo "<td>";			
			//echo $total_cash_and_bank;
			//echo "</td>";
			
			$all_data["total_cash_and_bank"][] = $total_cash_and_bank;
			//=================Total Cash & Bank Salary calculation===============<<
			
			//=================Total Cash G. & CMS Adv. calculation===============>>
								
			$this->db->select_sum('adv_deduct');
			$this->db->from("pr_pay_scale_sheet");
			$this->db->where_in('pr_pay_scale_sheet.emp_id', $emp_id_cash);
			$this->db->like("salary_month", $salary_month);
			$query = $this->db->get();
			//echo $this->db->last_query();
			$row = $query->row();
			$adv_deduct_cash = $row->adv_deduct;
			if($adv_deduct_cash =='')
			{
				$adv_deduct_cash = 0;
			}
			//echo "<td>";
			//echo $adv_deduct_cash;
			//echo "</td>";
			
			$total_cash_deduction = $adv_deduct_cash;
			$all_data["adv_deduct_cash"][] = $adv_deduct_cash;
			
			//=================Total Cash G. & CMS Adv. calculation===============<<
			
			//=================Total Bank G. & CMS Adv. calculation===============>>
								
			$this->db->select_sum('adv_deduct');
			$this->db->from("pr_pay_scale_sheet");
			$this->db->where_in('pr_pay_scale_sheet.emp_id', $emp_id_bank);
			$this->db->like("salary_month", $salary_month);
			$query = $this->db->get();
			//echo $this->db->last_query();
			$row = $query->row();
			$adv_deduct_bank = $row->adv_deduct;
			if($adv_deduct_bank =='')
			{
				$adv_deduct_bank = 0;
			}
			//echo "<td>";
			//echo $adv_deduct_bank;
			//echo "</td>";
			
			$total_bank_deduction = $adv_deduct_bank;
			$all_data["adv_deduct_bank"][] = $adv_deduct_bank;
			
			//=================Total Bank G. & CMS Adv. calculation===============<<
			
			//=================Total Cash Absent Deduction calculation===============>>
									
			$this->db->select_sum('abs_deduction');
			$this->db->from("pr_pay_scale_sheet");
			$this->db->where_in('pr_pay_scale_sheet.emp_id', $emp_id_cash);
			$this->db->like("salary_month", $salary_month);
			$query = $this->db->get();
			//echo $this->db->last_query();
			$row = $query->row();
			$abs_deduction_cash = $row->abs_deduction;
			if($abs_deduction_cash =='')
			{
				$abs_deduction_cash = 0;
			}
			//echo "<td>";
			//echo $abs_deduction_cash;
			//echo "</td>";
			
			$total_cash_deduction = $total_cash_deduction + $abs_deduction_cash;
			$all_data["abs_deduction_cash"][] = $abs_deduction_cash;
			
			//=================Total Cash Absent Deduction calculation===============<<
			
			//=================Total Bank Absent Deduction calculation===============>>
									
			$this->db->select_sum('abs_deduction');
			$this->db->from("pr_pay_scale_sheet");
			$this->db->where_in('pr_pay_scale_sheet.emp_id', $emp_id_bank);
			$this->db->like("salary_month", $salary_month);
			$query = $this->db->get();
			//echo $this->db->last_query();
			$row = $query->row();
			$abs_deduction_bank = $row->abs_deduction;
			if($abs_deduction_bank =='')
			{
				$abs_deduction_bank = 0;
			}
			//echo "<td>";
			//echo $abs_deduction_bank;
			//echo "</td>";
			
			$total_bank_deduction = $total_bank_deduction + $abs_deduction_bank;
			$all_data["abs_deduction_bank"][] = $abs_deduction_bank;
			
			//=================Total Bank Absent Deduction calculation===============<<
			
			//=================Total Cash Stam deduction calculation===============>>
			$total_cash_stam_deduct = $emp_cash * 5 ;
			//echo "<td>";			
			//echo $total_cash_stam_deduct;
			//echo "</td>";
			
			$total_cash_deduction = $total_cash_deduction + $total_cash_stam_deduct;
			$all_data["total_cash_stam_deduct"][] = $total_cash_stam_deduct;
			
			//=================Total Cash Stam deduction calculation===============<<
			
			//=================Total Bank Stam deduction calculation===============>>
			$total_bank_stam_deduct = $emp_bank * 5 ;
			//echo "<td>";			
			//echo $total_bank_stam_deduct;
			//echo "</td>";
			
			$total_bank_deduction = $total_bank_deduction + $total_bank_stam_deduct;
			$all_data["total_bank_stam_deduct"][] = $total_bank_stam_deduct;
			
			//=================Total Bank Stam deduction calculation===============<<
			
			//=================Total Cash Tax calculation===============>>
			$this->db->select_sum('tax');
			$this->db->from("pr_pay_scale_sheet");
			$this->db->where_in('pr_pay_scale_sheet.emp_id', $emp_id_cash);
			$this->db->like("salary_month", $salary_month);
			$query = $this->db->get();
			//echo $this->db->last_query();
			$row = $query->row();
			$tax_cash = $row->tax;
			if($tax_cash =='')
			{
				$tax_cash = 0;
			}
			//echo "<td>";
			//echo $tax_cash;
			//echo "</td>";
			
			$total_cash_deduction = $total_cash_deduction + $tax_cash;
			$all_data["tax_cash"][] = $tax_cash;
			
			//=================Total Cash Tax calculation===============<<
			
			//=================Total Bank Tax calculation===============>>
			$this->db->select_sum('tax');
			$this->db->from("pr_pay_scale_sheet");
			$this->db->where_in('pr_pay_scale_sheet.emp_id', $emp_id_bank);
			$this->db->like("salary_month", $salary_month);
			$query = $this->db->get();
			//echo $this->db->last_query();
			$row = $query->row();
			$tax_bank = $row->tax;
			if($tax_bank =='')
			{
				$tax_bank = 0;
			}
			//echo "<td>";
			//echo $tax_bank;
			//echo "</td>";
			$total_bank_deduction = $total_bank_deduction + $tax_bank;
			$all_data["tax_bank"][] = $tax_bank;
			
			//=================Total Bank Tax calculation===============<<
			
			//=================Total Cash after deduction calculation===============>>
			$total_cash_after_deduct = $cash_total - $total_cash_deduction;
			//echo "<td>";			
			//echo $total_cash_after_deduct;
			//echo "</td>";
			$all_data["total_cash_after_deduct"][] = $total_cash_after_deduct;
			//=================Total Cash after deduction calculation===============<<
			
			//=================Total Cash after deduction calculation===============>>
			$total_bank_after_deduct = $bank_total - $total_bank_deduction;
			//echo "<td>";			
			//echo $total_bank_after_deduct;
			//echo "</td>";
			$all_data["total_bank_after_deduct"][] = $total_bank_after_deduct;
			//=================Total Cash after deduction calculation===============<<
			
			//=================Total Cash+Bank calculation===============>>
			$sub_total = $total_cash_after_deduct + $total_bank_after_deduct;
			//echo "<td>";			
			//echo $sub_total;
			//echo "</td>";
			$all_data["sub_total"][] = $sub_total;
			//=================Total Cash+Bank calculation===============<<
			
			//echo "<tr>";
		}
		return $all_data;
	}
	//========================End Salary Summary=================
	
	//==============Advance loan insert=======================>>
	function advance_loan_insert($emp_id, $loan_amt, $pay_amt, $loan_date)
	{
		$this->db->select("emp_id");
		$this->db->where("emp_id", $emp_id);
		$query1 = $this->db->get("pr_emp_com_info");
		
		if( $query1->num_rows() == 0)
		{
			return "Sorry! Employee ID does not exist.";
		}
		
		$this->db->select("emp_id");
		$this->db->where("emp_id", $emp_id);
		$this->db->where("loan_status", '1');
		$query = $this->db->get("pr_advance_loan");
		
		if( $query->num_rows() > 0)
		{
			return "Advance loan for this employee is running";
		}
		else
		{
			$data = array(
							'loan_id' 		=> '',
							'emp_id'  		=> $emp_id,
							'loan_amt' 		=> $loan_amt,
							'pay_amt' 		=> $pay_amt,
							'loan_date'		=> $loan_date,
							'loan_status'	=> 1,
						);
			if($this->db->insert("pr_advance_loan", $data))
			{
				// ADVANCE LOAN LOG Generate
				$this->log_model->log_advance_loan_insert($emp_id, $loan_amt, $pay_amt, $loan_date);
				return "Advance loan inserted successfully";
			}
			else
			{
				return "Operation Failed";
			}
		}
			
		
	}
	//==============Advance loan insert=======================<<
	
	//==============Advance loan deduction function=======================>>
	function advance_loan_deduction($emp_id, $salary_month)
	{
		//$emp_id = "100009";
		$salary_month = "$salary_month-01";
				
		$this->db->select("*");
		$this->db->where("emp_id", $emp_id);
		$this->db->where("loan_status", '1');
		$this->db->where("loan_date <=", $salary_month);
		$query = $this->db->get("pr_advance_loan");
		
		if( $query->num_rows() > 0)
		{
			foreach($query->result() as $rows)
			{
				$loan_id	= $rows->loan_id;
				$loan_amt 	= $rows->loan_amt; 	
				$pay_amt  	= $rows->pay_amt;
			}
			
			$this->db->select("emp_id");
			$this->db->where("emp_id", $emp_id);
			$this->db->where("loan_id", $loan_id);
			$this->db->like("pay_month", $salary_month);
			$query1 = $this->db->get("pr_advance_loan_pay_history");
			if( $query1->num_rows() == 0)
			{
				$this->db->select_sum("pay_amount");
				$this->db->where("emp_id", $emp_id);
				$this->db->where("loan_id", $loan_id);
				$query2 = $this->db->get("pr_advance_loan_pay_history");
				//echo $this->db->last_query();
				
				if( $query2->num_rows() > 0)
				{
					$row = $query2->row();
					$total_pay_amount = $row->pay_amount;
				}
				else
				{
					$total_pay_amount = 0;
				}
				
				$rest_loan_amount = $loan_amt - $total_pay_amount;
					
				if($rest_loan_amount > $pay_amt)
				{
					$data = array(
									'pay_id' 	=> '',
									'loan_id' 	=> $loan_id,
									'emp_id'  	=> $emp_id,
									'pay_amount'=> $pay_amt,
									'pay_month' => $salary_month
								);
					if($this->db->insert("pr_advance_loan_pay_history", $data))
					{
						return $pay_amt;
					}
				}
				else
				{
					$data = array(
									'pay_id' 	=> '',
									'loan_id' 	=> $loan_id,
									'emp_id'  	=> $emp_id,
									'pay_amount'=> $rest_loan_amount,
									'pay_month' => $salary_month
								);
					if($this->db->insert("pr_advance_loan_pay_history", $data))
					{
						$this->db->select_sum("pay_amount");
						$this->db->where("emp_id", $emp_id);
						$this->db->where("loan_id", $loan_id);
						$query2 = $this->db->get("pr_advance_loan_pay_history");
						//echo $this->db->last_query();
						
						if( $query2->num_rows() > 0)
						{
							$row = $query2->row();
							$total_pay_amount = $row->pay_amount;
							
							if($total_pay_amount == $loan_amt)
							{
								$data = array(
											'loan_status' => 2
											);
								$this->db->where("emp_id", $emp_id);
								$this->db->where("loan_id", $loan_id);
								$this->db->update("pr_advance_loan", $data);
							}
						}
						return $rest_loan_amount;
					}
				}
				
			}
			else
			{
				return 0;
			}
		}
		else
		{
			return 0;
		}
	}
	//==============Advance loan deduction function=======================<<


	function production_salary_db($year_month)
	{
		$data=array(); 
		$year = trim(substr($year_month,0,4));
		$month = trim(substr($year_month,5,2));
				
		
		$year_v=$year;
		$month_v=$month;
		
		$table_name = "att_".$year_v."_".$month_v;
		
		if(!$this->db->table_exists($table_name))
		{
			return "Process month does not exist, please change your process month";
		}
		
		
		$start_date = date("Y-m-d", mktime(0, 0, 0, $month_v, 1, $year_v));
		$last_date = date("t", mktime(0, 0, 0, $month_v, 1, $year_v));
		
		$end_date = date("Y-m-d", mktime(0, 0, 0, $month_v, $last_date, $year_v));
		
		$year_month = date("Y-m", mktime(0, 0, 0, $month_v, 1, $year_v)); 
		//---5=friday----------------//
		$day_of_week_v=5;   //==== please change this variable $fd = "next Friday"; if you change $day_of_week_v =====//
		
		
		$result=$this-> find_week($year_v,$month_v,$day_of_week_v);
		$no_working_days = $result['no_of_working_days'];
		$num_of_days = $result['num_of_days'];
		
		//$att_register = $this->daily_absent_db($start_date);
		
		
		//print_r($result);
	  
		
		$this->db->select("emp_id,gross_sal,emp_sal_gra_id,emp_desi_id,emp_join_date,salary_type");
		$this->db->order_by("emp_id");
		$query = $this->db->get("pr_emp_com_info");
		
		if($query->num_rows() == 0)
		{
			return "Employee information does not exist";
		}
		else
		{			
			$serial = 1;
			$data = array();
				foreach($query->result() as $rows)
				{		set_time_limit(200) ;
						ini_set("memory_limit","128M");
									
						$salary_type =$rows->salary_type ;
						$sum = 0;
						if($salary_type == "2")
						{
									$emp_id =$rows->emp_id ;
									//$data['emp_id'][] = $emp_id ;
									$emp_name = $this->emp_name($emp_id);
									$gross_sal = $this->gross_sal($emp_id);							
									
									$emp_section = $this->emp_section($emp_id);
									$gross_sal =$rows->gross_sal ; 
									$basic_sal_payable = ($gross_sal * 60 / 100);
									$doj = $this->join_date($emp_id);
									
									$salary_month = trim(substr($start_date,0,7));
									$join_month = trim(substr($doj,0,7));
									
									if($salary_month == $join_month)
									{
										$search_date = $doj;
									}
									else
									{
										$search_date = $start_date;
									}
									
									
									
									
									//echo $basic_sal_payable = ($gross_sal * 60 / 100);
									//echo "e id".$emp_id ;
									//echo "<br/>";
									//echo "month".$year_month ;
									//echo "<br/>";
									$this->db->select("*");
									$this->db->where("emp_id",$emp_id);
									$this->db->like("received_date",$year_month);
									//$this->db->where('status',4);
									//$this->db->or_where('status',2);
									$query = $this->db->get("pr_pd_knitting_issue");
									$this->db->last_query();
									foreach($query->result() as $rows)
									{
										$status = $rows->status;
										if($status ==2)
										{
											//echo "<br/>";
											 $barcode_no = $rows->barcode_no;
											//echo "<br/>";
										
											//echo "<br/>";
											$style_type = $rows->style_type;
											//echo "<br/>";
										
											 $bundle_size = $this->bundle_size($barcode_no);
											//echo "<br/>";
											//echo "price".$per_price = $this->per_price($barcode_no,$style_type);
											 $article_no = $this->article_no($barcode_no);
										
											//echo "<br/>";
											 $per_price = $this->per_price($article_no,$style_type);
											//echo "<br/>";
											 $bundle_price=$per_price * $bundle_size ;
										
											$sum = $sum + $bundle_price;
											//echo "<br/>";
										}
										if($status ==4)
										{
											//echo "<br/>";
											 $barcode_no = $rows->barcode_no;
											//echo "<br/>";
										
											//echo "<br/>";
											 $style_type = $rows->style_type;
											//echo "<br/>";
										
											 $bundle_size = $this->bundle_size($barcode_no);
											//echo "<br/>";
											//echo "price".$per_price = $this->per_price($barcode_no,$style_type);
											$article_no = $this->article_no($barcode_no);
										
											//echo "<br/>";
											 $per_price = $this->per_price($article_no,$style_type);
											//echo "<br/>";
											 $bundle_price=$per_price * $bundle_size ;
										
											$sum = $sum + $bundle_price;
											//echo "<br/>";
										}
										
										if($status ==6)
										{
											//echo "<br/>";
											 $article_no = $rows->barcode_no;
											//echo "<br/>";
											 $body_weight = $rows->body_weight;
										
											//echo "<br/>";
											 $style_type = $rows->style_type;
											//echo "<br/>";
										
											// $bundle_size = $this->bundle_size($barcode_no);
											//echo "<br/>";
											//echo "price".$per_price = $this->per_price($barcode_no,$style_type);
											//$article_no = $this->article_no($barcode_no);
										
											//echo "<br/>";
											 $per_price = $this->per_price_winding($article_no,$style_type);
											//echo "<br/>";
											 $winding_price=$per_price * $body_weight ;
										
											$sum = $sum + $winding_price;
											//echo "<br/>";
										}
										
										if($status ==8)
										{
											
											$issue_weight = $rows->issue_weight;
											if($issue_weight =="0")
											{
												$barcode_no = $rows->barcode_no;
												$article_no = $this->article_no($barcode_no);
												$bundle_size = $this->bundle_size($barcode_no);
											}else
											{
												$article_no = $rows->barcode_no;
												$bundle_size = $rows->body_weight;
											}
											
											//echo "<br/>";
											 $body_weight = $rows->body_weight;
											//echo "<br/>";
											
											//echo "<br/>";
										
											//echo "<br/>";
											 $style_type = $rows->style_type;
											//echo "<br/>";
										
											//$bundle_size = $this->bundle_size($barcode_no);
											//echo "<br/>";
											//echo "price".$per_price = $this->per_price($barcode_no,$style_type);
											
										
											//echo "<br/>";
											 $per_price = $this->per_price_m($article_no,$style_type);
											//echo "<br/>";
											 $bundle_price=$per_price * $bundle_size ;
											//echo "<br/>";
											$sum = $sum + $bundle_price;
											//echo "<br/>";
										
										}
										
										
									
									}
									//echo "sum".$sum;
									//echo "<br/>";
									$result = $this->find_month_year($month,$year);
									$no_of_working_days = 
									$result['no_of_working_days'];
									$num_of_days = $result['num_of_days'];
									
																
									//echo "<br/>";
									//echo "sum============".$sum ;
									//echo "<br/>";
									
									$attend = "P";
									$attend = $this->attendance_check($emp_id,$attend,$num_of_days, $search_date);
						
									
									$absent = "A";
									$absent = $this->attendance_check($emp_id,$absent,$num_of_days, $search_date);
							
							
									$holiday = "H";
									$holiday = $this->attendance_check($emp_id,$holiday,$num_of_days, $search_date);
							
							
									$weeked = "W";
									$weeked = $this->attendance_check($emp_id,$weeked,$num_of_days, $search_date);
							
									
									
									
									$leave_type = "cl";
									$cas_leave = $this->leave_db($emp_id, $search_date, $end_date, $leave_type);
							
							
							
									$leave_type = "sl";
									$mad_leave = $this->leave_db($emp_id, $search_date, $end_date, $leave_type);
							
							
									$leave_type = "el";
									$other_leave = $this->leave_db($emp_id, $search_date, $end_date, $leave_type);
									
									$total_leave = $cas_leave + $mad_leave + $other_leave;
									$total_holiday = $weeked + $holiday;
									$pay_days = $attend + $total_holiday + $total_leave;
									
									if ($no_of_working_days==$attend)
									{
										$present_bonus = "300";
									}else
									{
										$present_bonus = "0";
									}
									
									
									$one_day_allow = round($basic_sal_payable/$num_of_days);
									$h_allow = round($one_day_allow * $holiday);
							
								
									$l_allow = round($one_day_allow * $total_leave);
									
									
									if ($sum >= 2500  and $sum <= 3499)
									{
										$product_bonus = $sum*15/100 ;
									}else if ($sum >= 3500 and $sum <= 5499) 
									{
										$product_bonus = $sum*20/100 ; 
									}else if ($sum >= 5500 )
									{
										$product_bonus = $sum*25/100 ;
									}else
									{
										$product_bonus = 0;
									}
									$e_bonus = $this->eid_bonus($year_month);
									$eid_bonus =$e_bonus*$basic_sal_payable/100;
									$salary_month = $year_month ;
									$others_allaw = $this->others_allaw_cal($emp_id, $salary_month);
									$gross_pay = $sum + $present_bonus +$h_allow +$l_allow +$product_bonus + $eid_bonus +$others_allaw;
									$advance_deduct = $this->advance_loan_deduction($emp_id, $salary_month);
									$others_deduct = $this->others_deduct_cal($emp_id, $salary_month);
									if($others_deduct == '')
									{
										$others_deduct = 0;
									}
										$stamp = 5;
									$net_pay = $gross_pay -$advance_deduct -$others_deduct-$stamp;
									
									$salary_month = $year_month."-"."1";
									
									
									
									
									$this->db->select('emp_id,salary_month');
									$this->db->where('emp_id',$emp_id);
									$this->db->where('salary_month',$salary_month);
									$query=$this->db->get('pr_product_pay_scale_sheet');
									$num_row = $query->num_rows();
									if($num_row == 0)
									{
											$data=array(
															"emp_id"   		 			 =>$emp_id,
															"basic_sal"   	 			 =>$basic_sal_payable,
															"product_salary"   			 =>$sum,
															"absent"    				 =>$absent,
															"leave"   					 =>$total_leave,
															"holyday" 					 =>$holiday,
															"att_days"   				 =>$attend,
															"att_days_bonus" 		     =>$present_bonus,
															"holly_allaw" 			     =>$h_allow,
															"leave_allaw"			     =>$total_leave,
															"product_bonus"			     =>$product_bonus,
															"eid_bonus"				     =>$eid_bonus,
															"other_bonus"			     =>$others_allaw,
															"gross_pay" 			     =>$gross_pay,
															"less_adv"    				 =>$advance_deduct,
															"less_pf"    				 =>0,
															"less_other"    			 =>$others_deduct,
															"stamp"    					 =>$stamp,
															"net_pay"    				 =>$net_pay,
															"salary_month"				 =>$salary_month
															);
													

												//	print_r($data) ;
												//	

													//echo "<br/>";
										$this->db->insert("pr_product_pay_scale_sheet",$data);		
							
									}else
									{
											$data=array(
											"basic_sal"   	 			 =>$basic_sal_payable,
											"product_salary"   			 =>$sum,
											"absent"    				 =>$absent,
											"leave"   					 =>$total_leave,
											"holyday" 					 =>$holiday,
											"att_days"   				 =>$attend,
											"att_days_bonus" 		     =>$present_bonus,
											"holly_allaw" 			     =>$h_allow,
											"leave_allaw"			     =>$total_leave,
											"product_bonus"			     =>$product_bonus,
											"eid_bonus"				     =>$eid_bonus,
											"other_bonus"			     =>$others_allaw,
											"gross_pay" 			     =>$gross_pay,
											"less_adv"    				 =>$advance_deduct,
											"less_pf"    				 =>0,
											"less_other"    			 =>$others_deduct,
											"stamp"    					 =>$stamp,
											"net_pay"    				 =>$net_pay,
											);
											//	

									//	print_r($data) ;
										//echo "<br/>";
											$this->db->where("emp_id",$emp_id);
											$this->db->where("salary_month",$salary_month);
											$this->db->update("pr_product_pay_scale_sheet",$data);
							
									}
									
									
									
									
							}
						
							
									
									
						
							
									
						//			
						
					
						
					
			   }
			  
			return "Process completed successfully";	
		}			//$this->db->insert("pr_product_pay_scale_sheet",$data);
				//print_r($data);
	}
	
	
	function bundle_size($barcode_no)
	{
		$this->db->select("bundle_size");
		$this->db->where("barcode",$barcode_no);
		$query = $this->db->get("pr_pd_barcode");
		$row = $query->row();
		foreach($query->result() as $rows)
		{
			return $rows->bundle_size;
		}
		
	}
	
	function per_price_m($article_no,$style_type)
	{
		$this->db->select("style_price");
		$this->db->where("style_type_id",$style_type);
		$this->db->where("article_no",$article_no);
		$this->db->where("type",3);
		$query = $this->db->get("pr_pd_style_price");
		$row = $query->row();
		$style_price = $row->style_price;
		
		//foreach($query2->result() as $row2)
		//{
		//$row2 = $query2->row();
		//echo $style_price = $row2->style_price;
		return $style_price ;
	}
	
	
	function per_price_winding($article_no,$style_type)
	{
		$this->db->select("id");
		$this->db->where("article_no",$article_no);
		$this->db->where("yarn_type",$style_type);
		$query = $this->db->get("pr_pd_yarn");
		foreach($query->result() as $rows)
		{
			$id=$rows->id;
			$this->db->select("style_price");
			$this->db->where("style_type_id",$id);
			$this->db->where("article_no",$article_no);
			$this->db->where("type",2);
			$query2 = $this->db->get("pr_pd_style_price");
			$row = $query2->row();
			$style_price = $row->style_price;
			return $style_price ;
		}
			
	}
	function article_no($barcode_no)
	{
		$this->db->select("artical_no");
		$this->db->where("barcode",$barcode_no);
		$query = $this->db->get("pr_pd_barcode");
		$row = $query->row();
		$artical_no = $row->artical_no;
		return $artical_no ;
	}
	
	function eid_bonus($year_month)
	{
			
		$this->db->select("f_date,persent");
		$this->db->distinct();
		$this->db->where("bn_festival","Eid Ul Fitr");
		$query = $this->db->get("pr_bonus");
		$row = $query->row();
		$h_date = $row->f_date;
		$h_date = trim(substr($h_date,0,7));
		if($h_date == $year_month)
		{
			return $row->persent;
		}else
		{
			return 0;
		}
		
		
		
	}
	
	function join_date($emp_id)
	{
		$this->db->select("emp_join_date");
		$this->db->where("emp_id", $emp_id);
		$query = $this->db->get("pr_emp_com_info");
		$row = $query->row();
		return $row->emp_join_date;
	}
	
	
	
	
	//$gross_sal = $rows->gross_sal;
	function gross_sal($emp_id)
	{
		$this->db->select("gross_sal");
		$this->db->where("emp_id",$emp_id);
		$query = $this->db->get("pr_emp_com_info");
		$row = $query->row();
		return $row->gross_sal;
	}
	
	
	function emp_section($emp_id)
	{
		$this->db->select("emp_sec_id");
		$this->db->where("emp_id",$emp_id);
		$query = $this->db->get("pr_emp_com_info");
		$row = $query->row();
		return $row->emp_sec_id;
	}
	
	
	function find_month_year($month,$year)
	{
		$start_date = date("Y-m-d", mktime(0, 0, 0, $month, 1, $year));
		$last_date = date("t", mktime(0, 0, 0, $month, 1, $year));
		
		$end_date = date("Y-m-d", mktime(0, 0, 0, $month, $last_date, $year));
		
		$year_month = date("Y-m", mktime(0, 0, 0, $month, 1, $year)); 
		//---5=friday----------------//
		$day_of_week_v=5;   //==== please change this variable $fd = "next Friday"; if you change $day_of_week_v =====//
		
		$result=$this-> find_week($year,$month,$day_of_week_v);
		$result['no_of_working_days'] = $result['no_of_working_days'];
		$result['num_of_days'] = $result['num_of_days'];	
		return 	$result ;
	}
	function check_production($emp_id)
	{
		$this->db->select('salary_type');
		$this->db->where("emp_id",$emp_id);
		$query = $this->db->get("pr_emp_com_info");
		$row = $query->row();
		return $row->salary_type;
	}
	
	function new_to_regular_process($year, $month)
	{
		$year_month = date("Y-m",mktime(0,0,0,$month,1,$year));
		
		$emp_sts = 2;
		
		$this->db->where("trim(substr(emp_join_date,1,7))='$year_month'");
		$this->db->where("emp_cat_id",$emp_sts);
		$query = $this->db->get("pr_emp_com_info");
		//echo $this->db->last_query()."----";
		$num_rows =  $query->num_rows();
		//echo $num_rows."----";
		if($num_rows == 0)
		{
			return "no data found";
		}
	
		$data = array(
               'emp_cat_id' => 1
            );
		
		$this->db->where("emp_cat_id",$emp_sts);
		$this->db->where("trim(substr(emp_join_date,1,7))='$year_month'");
		$this->db->update('pr_emp_com_info',$data); 
		//echo $this->db->last_query();
		return "Successfully Converted";
	}
	
	function rename_empid()
	{
		$this->load->dbforge();	
		$this->db->select("emp_id");
		$this->db->where('emp_id', "TKO97");
		$query = $this->db->get("pr_emp_per_info");
		
		$num_row = $query->num_rows();
		foreach($query->result() as $rows)
		{
			 $id = $rows->emp_id;
			 $id_prefix = substr($id,0,3);
			$rename_id = substr($id,3,10);
			
			$id_digit = sprintf("%04s",$rename_id);
			$prefix_id_digit = trim($id_prefix.$id_digit);
			//$rename_id = "0".$rename_id;
			echo  $id."====".$id_prefix."=========".$rename_id ."=======".$prefix_id_digit."<br>";
			//echo $rename_id."<br>";
			/*$data = array(
               'emp_id' => $prefix_id_digit
            );
			$this->db->where('emp_id',$id);
			$this->db->update('pr_emp_com_info', $data); 
			
			$this->db->where('emp_id',$id);
			$this->db->update('pr_id_proxi', $data); 
			
			$this->db->where('emp_id',$id);
			$this->db->update('pr_emp_edu', $data); 
			
			$this->db->where('emp_id',$id);
			$this->db->update('pr_emp_skill', $data); 
			
			$this->db->where('emp_id',$id);
			$this->db->update('pr_emp_add', $data); 
			
			$this->db->where('emp_id',$id);
			$this->db->update('pr_emp_per_info', $data);
			
			$this->db->where('emp_id',$id);
			$this->db->update('pr_leave_earn', $data); 
			
			$this->db->where('emp_id',$id);
			$this->db->update('pr_leave_trans', $data); 
			
			$this->db->where('emp_id',$id);
			$this->db->update('pr_pay_scale_sheet', $data);
			
			$this->db->where('emp_id',$id);
			$this->db->update('pd_production_logs', $data); 
			
			$this->db->where('emp_id',$id);
			$this->db->update('pd_production_summary_logs', $data); 
			
			$this->db->where('emp_id',$id);
			$this->db->update('pd_manual_attandence', $data); 
			
			$this->db->where('emp_id',$id);
			$this->db->update('pd_pay_scale_sheet', $data); 
			
			$old_table_name = "temp_$id";
			$new_table_name = "temp_$rename_id";
			$this->dbforge->rename_table($old_table_name, $new_table_name );
			
			*/
			
		}
		
			
	
	}
}
?>