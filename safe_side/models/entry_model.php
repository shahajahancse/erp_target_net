<?php
class entry_model extends CI_Model{
	
	
	function __construct()
	{
		parent::__construct();

	}
	
	function add_production_log()
	{
		
		//$user 							= $this->session->userdata('user_id');
		$article_id						= $this->input->post('article_id');
		$section_id						= $this->input->post('section_id');
		$process_id						= $this->input->post('process_id');
		$pd_log_date 					= $this->input->post('pd_log_date');
		$pd_log_date 					= date("Y-m-d",strtotime($pd_log_date));
		$emp_id							= $this->input->post('emp_id');
		$quantity						= $this->input->post('quantity');
	
		$data = array(
						'article_id' 				=>$article_id,
						'section_id' 				=>$section_id,
						'emp_id' 					=>$emp_id,
						'process_id' 				=>$process_id,
						'quantity' 					=>$quantity,
						'date' 						=>$pd_log_date
						//'user'						=>$user
					);
		$this->db->insert('pd_production_logs',$data);

	}
	
	function search_article_id($q)
	{
		$this->db->select('*');
		$this->db->like('article_id',$q,'after');
		$this->db->order_by('article_id');
		$this->db->from('pd_style_infos');
		//$this->db->join('total_store', 'medicine_name.mdcn_name_id = total_store.mdcn_name_id');
		$query = $this->db->get('');
		
		
		
		if($query->num_rows() >0)
		{
			$return_arr =array();
			$new_row =array();
			foreach($query->result_array() as $row)
			{
				//$new_row['label'] = htmlentities(stripslashes($row['mdcn_name']));
				$new_row['article_id'] = htmlentities(stripslashes($row['article_id']));
				$new_row['value'] = htmlentities(stripslashes($row['article_id']));
				$new_row['style_id'] = htmlentities(stripslashes($row['style_id']));
				$new_row['order_number'] = htmlentities(stripslashes($row['order_number']));
				//$new_row['designation'] = htmlentities(stripslashes($this->get_distributed_id_no_designation($row['designation'])));
				
				array_push($return_arr,$new_row);
			}
			echo json_encode($return_arr);
		}
	}
	
	
	function search_section_id($q)
	{
		$this->db->select('*');
		$this->db->like('section_id',$q,'after');
		$this->db->order_by('section_id');
		$this->db->from('pr_section');
		//$this->db->join('total_store', 'medicine_name.mdcn_name_id = total_store.mdcn_name_id');
		$query = $this->db->get('');
		
		
		
		if($query->num_rows() >0)
		{
			$return_arr =array();
			$new_row =array();
			foreach($query->result_array() as $row)
			{
				//$new_row['label'] = htmlentities(stripslashes($row['mdcn_name']));
				$new_row['section_id'] = htmlentities(stripslashes($row['sec_id']));
				$new_row['section_name'] = htmlentities(stripslashes($row['sec_name']));
				$new_row['style_id'] = htmlentities(stripslashes($row['style_id']));
				$new_row['order_number'] = htmlentities(stripslashes($row['order_number']));
				$new_row['process_id'] = htmlentities(stripslashes($this->get_process_id($row['sec_id'])));
				$new_row['emp_id'] = htmlentities(stripslashes($this->get_emp_id($row['sec_id'])));
				
				array_push($return_arr,$new_row);
			}
			echo json_encode($return_arr);
		}
	}
	function get_process_id($section_id)
	{
		$this->db->select('process_id, process_name');
		$this->db->where('section_id',$section_id);
		$query = $this->db->get('pd_process_setups');
		return $query;
	}
	function get_emp_id($section_id)
	{
		$this->db->select('emp_id');
		$this->db->where('emp_sec_id',$section_id);
		$query = $this->db->get('pr_emp_com_info');
		return $query;
	}
	
	function GetProcessEmp($section_id)
	{
		/*echo"<script> alert($group_id)</script>";*/
		$this->db->select('pd_article_wise_process_prices.process_id as process_id, pd_process_setups.process_name as process_name');
		$this->db->from("pd_article_wise_process_prices");
		$this->db->from("pd_process_setups");
		$this->db->where('pd_article_wise_process_prices.process_id = pd_process_setups.process_id');
		$this->db->where('pd_article_wise_process_prices.section_id',$section_id);
		$query = $this->db->get();
		//echo $this->db->last_query();
		$data1 = array();
		$data2 = array();
		/*if($query->num_rows >0)
		{*/
		  foreach ($query->result() as $row)
		  {
			  $data1[] = $row->process_id;
			  $data2[] = $row->process_name;
		  }
		  $id = implode('***', $data1);
		  $name = implode('***', $data2);
		  
		  //$id_name1 = "$id===$name";
		/*}
		else
		return false;*/
		
		
		$this->db->select('emp_id');
		$this->db->where('emp_sec_id',$section_id);
		$query = $this->db->get("pr_emp_com_info");
		
		$data3 = array();
		//$data4 = array();

		foreach ($query->result() as $row)
		{
			$data3[] = $row->emp_id;
			//$data4[] = $row->emp_id;
		}
		$emp_id = implode('***', $data3);
		//$name2 = implode('***', $data4);
		
		//$id_name2 = "$id2===$name2";
		
		return $id_name ="$id===$name===$emp_id";
	
	}
	
	function GetImage($emp_id)
	{
		
		$this->db->select('emp_full_name,img_source');
		$this->db->where('emp_id',$emp_id);
		$query = $this->db->get("pr_emp_per_info");
		$data1 = array();
		$data2 = array();
		
		foreach ($query->result() as $row)
		{
			$data1[] = $row->emp_full_name;
			$data2[] = $row->img_source;
			$data3[] = $this->get_designation_id($emp_id);
		}
		$full_name = implode('***', $data1);
		$image_name = implode('***', $data2);
		$designation = implode('***', $data3);
		
		return $image_info = "$full_name===$image_name===$designation";
	
	}
	function get_designation_id($emp_id)
	{
		$this->db->select('emp_desi_id');
		$this->db->where('emp_id',$emp_id);
		$query = $this->db->get("pr_emp_com_info");
		$row = $query->row();
		return $designation = $this->get_designation_name($row->emp_desi_id);
	}
	function get_designation_name($emp_desi_id)
	{
		$this->db->select('desig_name');
		$this->db->where('desig_id',$emp_desi_id);
		$query = $this->db->get("pr_designation");
		$row = $query->row();
		return $designation = $row->desig_name;
	}
	function get_section_name($section_id)
	{
		$this->db->select('sec_name');
		$this->db->where('sec_id',$section_id);
		$query = $this->db->get("pr_section");
		$row = $query->row();
		if($query->num_rows() ==0)
		return false;
		else
		return $row->sec_name;
	}
	function get_process_name($process_id)
	{
		$this->db->select('process_name');
		$this->db->where('process_id',$process_id);
		$query = $this->db->get("pd_process_setups");
		$row = $query->row();
		if($query->num_rows() ==0)
		return false;
		else
		return $row->process_name;
	}
	

}