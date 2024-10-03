<?php
class Emp_wise_entry_model extends CI_Model{
	
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('pd_report_model');
		$this->load->model('common_model');
	}
	
	function add_production_log()
	{
		
		$user = $this->session->userdata('username');
		$date_time = date('Y-m-d H:i:s');
		
		$pd_log_date = $this->input->post('pd_log_date');
		$pd_log_date = date("Y-m-d",strtotime($pd_log_date));
		$pd_log_table = $this->common_model->get_pd_log_table_name($pd_log_date);
		
		$count = $this->input->post('count');
		for($i=0;$i<=$count;$i++)
		{
			$marge = 'marge';
			$marge .= $i;
			$quantity = 'quantity';
			$quantity .= $i;
			$marge = $this->input->post($marge);
			$data = explode(',',$marge);
			$section_id = $data[1];
			$article_id = $data[3];
			$process_id = $data[4];
			$color_id 	= $data[5];
			$size_id 	= $data[6];
			$article_id_pk 	= $data[7];
			$floor_id 	= $data[8];
			$block_id 	= $data[9];
			
			$emp_id = $data[2];
			$quantity	= $this->input->post($quantity);
	
		$data = array(
						'article_id' 			=>$article_id_pk,
						'section_id' 			=>$section_id,
						'emp_id' 				=>$emp_id,
						'floor_id' 				=>$floor_id,
						'block_id' 				=>$block_id,
						'process_id' 			=>$process_id,
						'color_id' 				=>$color_id,
						'size_id' 				=>$size_id,
						'quantity' 				=>$quantity,
						'date' 					=>$pd_log_date,
						'username'				=>$user,
						'date_time'				=>$date_time
					);
			if($quantity != 0 && $quantity != '')
			$this->db->insert("$pd_log_table",$data);
		}
	}
	function get_price($article_id,$section_id,$process_id,$size_id)
	{
		$this->db->select('price');
		$this->db->where('article_id',$article_id);
		$this->db->where('section_id',$section_id);
		$this->db->where('process_id',$process_id);
		$this->db->where('size_id',$size_id);
		$query = $this->db->get('pd_article_wise_process_prices');
		$row = $query->row();
		if($query->num_rows() != 0)
		return $row->price;
		else
		return false;	
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
	function Getfloor($section_id)
	{
		
		
		$ses_username =$this->session->userdata('username');
		$this->db->select('emp_position_id');
		$this->db->where('emp_sec_id',$section_id);
		if($ses_username == "target2")
		{
			$this->db->where('emp_position_id','1');
		}
		
		$this->db->group_by('emp_position_id');
		$query = $this->db->get("pr_emp_com_info");
		$data1 = array();
		$data2 = array();

		foreach ($query->result() as $row)
		{
			$data1[] = $row->emp_position_id;
			$data2[] = $this->get_floor_name($row->emp_position_id);
		}
		$id = implode('***', $data1);

		$name = implode('***', $data2);
		
		return $id_name = "$id===$name";
	
	}
	function Getblock($emp_sec_id,$emp_position_id)
	{
		$this->db->select('emp_line_id');
		$this->db->where('emp_sec_id',$emp_sec_id);
		$this->db->where('emp_position_id',$emp_position_id);
		$this->db->group_by('emp_line_id');
		$query = $this->db->get("pr_emp_com_info");
		
		$data1 = array();
		$data2 = array();

		foreach ($query->result() as $row)
		{
			$data1[] = $row->emp_line_id;
			$data2[] = $this->get_block_name($row->emp_line_id);
		}
		$id = implode('***', $data1);

		$name = implode('***', $data2);
		
		return $id_name = "$id===$name";
	
	}
	function GetProcessEmp($emp_sec_id,$emp_position_id,$emp_line_id)
	{
		$emp_cat_id = array (1,2);
		$this->db->select('emp_id');
		$this->db->where('emp_sec_id',$emp_sec_id);
		$this->db->where('emp_position_id',$emp_position_id);
		$this->db->where('emp_line_id',$emp_line_id);
		$this->db->where('salary_type',2);
		$this->db->where_in('emp_cat_id',$emp_cat_id);
		$this->db->order_by('emp_id');
		$query = $this->db->get("pr_emp_com_info");
		
		$data3 = array();

		foreach ($query->result() as $row)
		{
			$data3[] = $row->emp_id;
		}
		$emp_id = implode('***', $data3);
		
		return $emp_id;
	
	}
	function GetProcessEmp_fixed($emp_sec_id,$emp_position_id,$emp_line_id)
	{
		$emp_cat_id = array (1,2);
		$this->db->select('emp_id');
		$this->db->where('emp_sec_id',$emp_sec_id);
		$this->db->where('emp_position_id',$emp_position_id);
		$this->db->where('emp_line_id',$emp_line_id);
		$this->db->where('salary_type',1);
		$this->db->where_in('emp_cat_id',$emp_cat_id);
		$this->db->order_by('emp_id');
		$query = $this->db->get("pr_emp_com_info");
		
		$data3 = array();

		foreach ($query->result() as $row)
		{
			$data3[] = $row->emp_id;
		}
		$emp_id = implode('***', $data3);
		
		return $emp_id;
	
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
	function GridGen($section_id)
	{
		
		$this->db->select('pd_article_wise_process_prices.article_id,pd_article_wise_process_prices.process_id,color_id,pd_article_wise_process_prices.size_id');
		$this->db->from('pd_article_wise_process_prices,pd_color_wise_lots');
		$this->db->where('section_id',$section_id);
		$this->db->where('pd_article_wise_process_prices.article_id = pd_color_wise_lots.article_id');
		$this->db->where('status','Enable');
		$this->db->order_by('article_id','ASC');
		$this->db->order_by('color_id','ASC');
		$this->db->order_by('size_id','ASC');
		$query = $this->db->get();
		$data1 = array();
		$data2 = array();
		$data3 = array();
		$data4 = array();
		$data5 = array();
		$data8 = array();
		foreach ($query->result() as $row)
		{
			$article_id = $row->article_id;
			$article_id_name = $this->pd_report_model->get_article_name($article_id);
			$data1[] = $article_id_name ;
			$data2[] = $row->process_id;
			$data3[] = $this->get_process_name($row->process_id);
			$data4[] = $row->color_id;
			$data5[] = $this->get_color_name($row->color_id);
			$data6[] = $row->size_id;
			$data7[] = $this->get_size_name($row->size_id);
			$data8[] = $article_id;
		}
		$article_id 	= implode('***', $data1);
		$process_id 	= implode('***', $data2);
		$process_name 	= implode('***', $data3);
		$color_id 		= implode('***', $data4);
		$color_name 	= implode('***', $data5);
		$size_id 		= implode('***', $data6);
		$size_name 		= implode('***', $data7);
		$article_id_pk	= implode('***', $data8);
		
		return $data_info = "$article_id===$process_id===$process_name===$color_id===$color_name===$size_id===$size_name===$article_id_pk";
	
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
	function get_color_name($color_id)
	{
		$this->db->select('color_name');
		$this->db->where('color_id',$color_id);
		$query = $this->db->get("pd_color_infos");
		$row = $query->row();
		if($query->num_rows() ==0)
		return false;
		else
		return $row->color_name;
	}
	
	function get_size_name($size_id)
	{
		$this->db->select('size_name');
		$this->db->where('size_id',$size_id);
		$query = $this->db->get("pd_size_infos");
		$row = $query->row();
		if($query->num_rows() ==0)
		return false;
		else
		return $row->size_name;
	}
	function get_floor_name($posi_id)
	{
		$this->db->select('posi_name');
		$this->db->where('posi_id',$posi_id);
		$query = $this->db->get("pr_emp_position");
		$row = $query->row();
		if($query->num_rows() ==0)
		return false;
		else
		return $row->posi_name;
	}
	function get_block_name($line_id)
	{
		$this->db->select('line_name');
		$this->db->where('line_id',$line_id);
		$query = $this->db->get("pr_line_num");
		$row = $query->row();
		if($query->num_rows() ==0)
		return false;
		else
		return $row->line_name;
	}
	
	
	

}