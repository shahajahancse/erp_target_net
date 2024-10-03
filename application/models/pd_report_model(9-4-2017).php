<?php
class Pd_report_model extends CI_Model{
	
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('pd_process_model');
		$this->load->model('grid_model');
		$this->load->model('common_model');
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
	function get_floor_name($floor_id)
	{
		$this->db->select('posi_name');
		$this->db->where('posi_id',$floor_id);
		$query = $this->db->get("pr_emp_position");
		$row = $query->row();
		if($query->num_rows() ==0)
		return false;
		else
		return $row->posi_name;
	}
	function get_block_name($block_id)
	{
		$this->db->select('line_name');
		$this->db->where('line_id',$block_id);
		$query = $this->db->get("pr_line_num");
		$row = $query->row();
		if($query->num_rows() ==0)
		return false;
		else
		return $row->line_name;
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
	function style_detail_report($article_id)
	{
		$this->db->select('*');
		$this->db->where('article_id_pk',$article_id);
		return $query = $this->db->get('pd_style_infos');
	}
	function color_wise_report($article_id)
	{
		$this->db->select('*');
		$this->db->where('article_id',$article_id);
		return $query = $this->db->get('pd_color_wise_lots');
	}
	function get_size_by_colour($article_id,$color_id)
	{
		$this->db->select('*');
		$this->db->where('color_id',$color_id);
		$this->db->where('article_id',$article_id);
		return $query = $this->db->get('pd_size_wise_lots');
	}
	function get_size_lots($article_id,$color_id,$size_id)
	{
		$this->db->select('*');
		$this->db->where('size_id',$size_id);
		$this->db->where('color_id',$color_id);
		$this->db->where('article_id',$article_id);
		$query = $this->db->get('pd_size_wise_lots');
		$row = $query->row();
		if($query->num_rows() ==0)
		return false;
		else
		return $row->lots;
	}
	function get_buyer_name($buyer_id)
	{
		$this->db->select('buyer_name');
		$this->db->where('buyer_id',$buyer_id);
		$query = $this->db->get("pd_buyer_infos");
		$row = $query->row();
		if($query->num_rows() ==0)
		return false;
		else
		return $row->buyer_name;
	}
	function get_merchandiser_name($merchandiser_id)
	{
		$this->db->select('merchandiser_name');
		$this->db->where('merchandiser_id',$merchandiser_id);
		$query = $this->db->get("pd_merchandiser_infos");
		$row = $query->row();
		if($query->num_rows() ==0)
		return false;
		else
		return $row->merchandiser_name;
	}
	function get_gauge_name($gauge_id)
	{
		$this->db->select('gauge_name');
		$this->db->where('gauge_id',$gauge_id);
		$query = $this->db->get("pd_gauge_infos");
		$row = $query->row();
		if($query->num_rows() ==0)
		return false;
		else
		return $row->gauge_name;
	}
	function get_shipment_name($shipment_id)
	{
		$this->db->select('shipment_name');
		$this->db->where('shipment_id',$shipment_id);
		$query = $this->db->get("pd_shipment_modes");
		$row = $query->row();
		if($query->num_rows() ==0)
		return false;
		else
		return $row->shipment_name;
	}
	function get_payment_name($payment_id)
	{
		$this->db->select('payment_name');
		$this->db->where('payment_id',$payment_id);
		$query = $this->db->get("pd_payment_modes");
		$row = $query->row();
		if($query->num_rows() ==0)
		return false;
		else
		return $row->payment_name;
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
	function get_article_name($article_id)
	{
		$this->db->select('article_id');
		$this->db->where('article_id_pk',$article_id);
		$query = $this->db->get("pd_style_infos");
		$row = $query->row();
		if($query->num_rows() ==0)
		return false;
		else
		return $row->article_id;
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
	
	function daily_total_quantity($date,$article_id,$section_id)
	{
		$this->db->select_sum('quantity');
		$this->db->where('section_id',$section_id);
		$this->db->where('date',$date);
		$this->db->where('article_id',$article_id);
		$query=$this->db->get('pd_production_logs');
		$row = $query->row();
		$result = $row->quantity;
		if($result == "")
		{
			return 0;
		}
		else
		{
			return $result;
		}
	}
	
	function section_total_quantity($article_id,$section_id)
	{
		$this->db->select_sum('quantity');
		$this->db->where('section_id',$section_id);
		$this->db->where('article_id',$article_id);
		$query=$this->db->get('pd_production_logs');
		$row = $query->row();
		$result = $row->quantity;
		if($result == "")
		{
			return 0;
		}
		else
		{
			return $result;
		}

	}
	function production_job_card($grid_firstdate, $grid_seconddate, $grid_emp_id)
	{
		$sStartDate = date("Y-m-d", strtotime($grid_firstdate)); 
		$sEndDate = date("Y-m-d", strtotime($grid_seconddate));
				
		$data = array();
		
		$this->db->select('emp_id');
		$this->db->from('pr_emp_com_info');
		$this->db->where_in('emp_id', $grid_emp_id);
		$this->db->order_by("emp_id");
		$query = $this->db->get();
		//echo $this->db->last_query();
		foreach($grid_emp_id as $emp_id)
		{
			//echo $emp_id = $row;
			//echo "$emp_id<br>";
			
			$this->db->distinct();
			$this->db->select('pr_emp_per_info.emp_full_name,pr_designation.desig_name,pr_dept.dept_name,pr_section.sec_name,pr_section.sec_id,pr_line_num.line_name,pr_emp_com_info.emp_join_date,pr_id_proxi.proxi_id,pr_emp_position.posi_name');
			$this->db->from('pr_emp_per_info');
			$this->db->from('pr_emp_com_info');
			$this->db->from('pr_attn_monthly');
			$this->db->from('pr_id_proxi');
			$this->db->from('pr_dept');
			$this->db->from('pr_section');
			$this->db->from('pr_line_num');
			$this->db->from('pr_designation');
			$this->db->from('pr_emp_position');
			$this->db->where('pr_emp_com_info.emp_desi_id = pr_designation.desig_id');
			$this->db->where('pr_emp_com_info.emp_dept_id = pr_dept.dept_id');
			$this->db->where('pr_emp_com_info.emp_sec_id = pr_section.sec_id');
			$this->db->where('pr_emp_com_info.emp_line_id = pr_line_num.line_id');
			$this->db->where('pr_emp_per_info.emp_id = pr_emp_com_info.emp_id');
			$this->db->where('pr_id_proxi.emp_id = pr_emp_com_info.emp_id');
			$this->db->where('pr_emp_com_info.emp_position_id = pr_emp_position.posi_id');
			$this->db->where('pr_emp_per_info.emp_id', $emp_id);
			
			$query = $this->db->get();
			foreach($query->result() as $row)
			{
				$data["emp_id"][] = $emp_id;
				
				$data["emp_full_name"][] = $row->emp_full_name;
				
				$data["proxi_id"][] = $row->proxi_id;
				
				$data["sec_name"][] = $row->sec_name;
				
				$section_id = $row->sec_id;
				$data["sec_id"][] = $row->sec_id;
				
				$data["line_name"][] = $row->line_name;
				
				$data["desig_name"][] = $row->desig_name;
				$data["posi_name"][] = $row->posi_name;
				
				$emp_join_date = $row->emp_join_date;
				
				$emp_join_date = date('d-M-Y', strtotime($emp_join_date));
				$data["emp_join_date"][] = $emp_join_date;
				
				$data["dept_name"][] = $row->dept_name;
				$this->db->select('SUM(quantity) AS quantity,process_id,article_id,section_id,color_id,size_id,date AS day');
				$this->db->where('emp_id', $emp_id);
			
				$this->db->where("pd_production_logs.date BETWEEN '$sStartDate' and '$sEndDate'");
				$this->db->group_by("process_id");
				$this->db->group_by("article_id");
				$this->db->group_by("color_id");
				$this->db->group_by("size_id");
				$this->db->group_by("date");
				$query = $this->db->get('pd_production_logs');
				foreach($query->result() as $rows)
				{
					
					$data[$emp_id]["date"][] 	= $rows->day;
					$article_name	= $this->get_article_name($rows->article_id);
					$data[$emp_id]["article_id"][] = $article_name;
					$data[$emp_id]["process_id"][] = $rows->process_id;
					$data[$emp_id]["color_id"][] = $rows->color_id;
					$data[$emp_id]["size_id"][] = $rows->size_id;
					$data[$emp_id]["quantity"][] = $rows->quantity;
				}
				
			}
		}
		//print_r($data);
		return $data;
		
	}
	function get_pd_qty($emp_id,$day)
	{
		//$emp_id = "010011";
		//echo $day;
		$year_month = date('Y-m', strtotime($day));
		$this->db->select_sum('total_quantity');
		$this->db->where('emp_id', $emp_id);
		$this->db->like('month',$year_month);
		$query = $this->db->get('pd_production_summary_logs');
		
		$row = $query->row();
		$sum_pd_quantity = $row->total_quantity;
		if($sum_pd_quantity == "")
		{
			$sum_pd_quantity = 0;
		}
		return $sum_pd_quantity;
	}
	
	function daily_production_summary($grid_firstdate, $grid_section)
	{
		$year_month_day = date('Y-m-d', strtotime($grid_firstdate));
		$year  = date("Y");
		$month = date("m");
		$table_date = "pd_logs_".$year."-".$month;
		$data['date'] = date('M-d-Y', strtotime($grid_firstdate));
		
		$data['section_name'] = $this->get_section_name($grid_section);
		$this->db->select('SUM(quantity) AS quantity,process_id,article_id,section_id,color_id,size_id');
		$this->db->where('section_id', $grid_section);
		$this->db->where('date',$year_month_day);
		$this->db->group_by('article_id');
		$this->db->group_by('process_id');
		$this->db->group_by('color_id');
		$this->db->group_by('size_id');
		$query_style = $this->db->get($table_date);
		 $query_style_num_rows = $query_style->num_rows();
		
		if($query_style_num_rows > 0)
		{
		
		  foreach($query_style->result() as $row)
		  {
			  $article_id 	= $row->article_id;
			  $process_id 	= $row->process_id;
			  $color_id 	= $row->color_id;
			  $size_id 		= $row->size_id; 
			  $quantity 	= $row->quantity;
			  $color_name 	= $this->get_color_name($color_id);
			  $process_name	= $this->get_process_name($process_id);
			  $results 		= $this->style_detail_report($article_id);
			  $size_name 	= $this->get_size_name($size_id);
			  $style_info 	= $results->row();
			  $style_id 	= $style_info->style_id;
			  $buyer_id 	= $style_info->buyer_id;
			  $order_qty 	= $style_info->total_quantity;
			  $size_order_qty 	= $this->get_size_lots($article_id,$color_id,$size_id);
			  $buyer_name = $this->get_buyer_name($buyer_id);
			  
			  $qty_complete = $this->get_qty_complete_by_size($article_id,$process_id,$color_id,$size_id,$grid_section);
			  
			  
			  $data['buyer_name'][] 	= $buyer_name;
			  $data['style_id'][] 		= $style_id;
			  $data['order_qty'][] 		= $order_qty;
			  $data['size_order_qty'][] = $size_order_qty;
			  $data['article_id'][] 	= $article_id;
			  $data['process_name'][] 	= $process_name;
			  $data['color_name'][] 	= $color_name;
			  $data['size_name'][] 		= $size_name;
			  $data['quantity'][] 		= $quantity;
			  $data['qty_complete'][] 	= $qty_complete;
			  $data['balance'][] 		= $size_order_qty - $qty_complete;
			  
		  }
		  //print_r($data);
		  return $data;
		}
		else
		{
			 return "empty";
		}
	}
	function continious_section_production_summary($grid_firstdate,$grid_seconddate,$grid_section,$process_id,$grid_status)
	{
		$year_month_day1 = date('Y-m-d', strtotime($grid_firstdate));
		$year = date("Y");
		$month = date("m");
		$table_date = "pd_logs_".$year."-".$month;
		$year_month_day2 = date('Y-m-d', strtotime($grid_seconddate));
		$data['date1'] = date('M-d-Y', strtotime($grid_firstdate));
		$data['date2'] = date('M-d-Y', strtotime($grid_seconddate));
		//echo $process_id;
		$data['section_name'] = $this->get_section_name($grid_section);
		
		
		$data_emp_id = array();
		
		$emp_id = $this->count_empid_for_section_wise_salary_for_conti($grid_section,$grid_status,$grid_firstdate,$grid_seconddate,"emp_id",$table_date);
		//print_r($emp_id);
		foreach($emp_id as $rows)
		{
			$data_emp_id[] = $rows->emp_id;
		}
		
		$pd_emp_sec_id = implode("xxx",$data_emp_id);
		//print_r($data_emp_id);
		$pd_emp_sec_id = explode('xxx', trim($pd_emp_sec_id));
	
		
		
		$this->db->select('SUM(quantity) AS quantity,process_id,article_id,section_id,color_id,size_id');
		$this->db->where_in('emp_id', $pd_emp_sec_id);
		$this->db->where('section_id', $grid_section);
		$this->db->where('process_id', $process_id);
		$where = "date BETWEEN '$year_month_day1' and '$year_month_day2'";
		$this->db->where($where);
		$this->db->group_by('article_id');
		$this->db->group_by('process_id');
		$this->db->group_by('color_id');
		$this->db->group_by('size_id');
		$query_style = $this->db->get($table_date);
		$query_style_num_rows = $query_style->num_rows();
		//echo $this->db->last_query();
		if($query_style_num_rows > 0)
		{
		
		  foreach($query_style->result() as $row)
		  {
			  $article_id 	= $row->article_id;
			  $process_id 	= $row->process_id;
			  $color_id 	= $row->color_id;
			  $size_id 		= $row->size_id; 
			  $quantity 	= $row->quantity;
			  $color_name 	= $this->get_color_name($color_id);
			  $process_name	= $this->get_process_name($process_id);
			  $results 		= $this->style_detail_report($article_id);
			  $size_name 	= $this->get_size_name($size_id);
			  $style_info 	= $results->row();
			  $style_id 	= $style_info->style_id;
			  $buyer_id 	= $style_info->buyer_id;
			  $order_qty 	= $style_info->total_quantity;
			  $size_order_qty 	= $this->get_size_lots($article_id,$color_id,$size_id);
			  $buyer_name = $this->get_buyer_name($buyer_id);
			  
			  $qty_complete = $this->get_qty_complete_by_size($article_id,$process_id,$color_id,$size_id,$grid_section);
			  
			  
			  $data['buyer_name'][] 	= $buyer_name;
			  $data['style_id'][] 		= $style_id;
			  $data['order_qty'][] 		= $order_qty;
			  $data['size_order_qty'][] = $size_order_qty;
			  $data['article_id'][] 	= $article_id;
			  $data['process_name'][] 	= $process_name;
			  $data['color_name'][] 	= $color_name;
			  $data['size_name'][] 		= $size_name;
			  $data['quantity'][] 		= $quantity;
			  $data['qty_complete'][] 	= $qty_complete;
			  $data['balance'][] 		= $size_order_qty - $qty_complete;
			  
		  }
		 
		  return $data;
		}
		else
		{ 
			 return "empty";
		}
	}
	function count_empid_for_section_wise_salary_for_conti($section_id,$grid_status,$grid_firstdate,$grid_seconddate,$check)
	{
		//echo "$section_id,$grid_status,$grid_firstdate,$grid_seconddate,$check";
		
			$probation_period 	= $this->common_model->get_setup_attributes(10);
			//$prev_prob_month 	= $this->common_model->get_prev_month($probation_period,$salary_month);
			$get_left_emp 		= $this->common_model->get_left_emp_continuous($grid_firstdate,$grid_seconddate);
			$get_resign_emp 	= $this->common_model->get_resign_emp_continuous($grid_firstdate,$grid_seconddate);
			$sal_year_month = "2013-11-01";
			if($grid_status == 1)// For Regular
			{
				$this->db->select('pr_emp_per_info.*');
				$this->db->from('pr_emp_com_info');
				$this->db->from('pr_emp_per_info');
				$this->db->where('pr_emp_per_info.emp_id = pr_emp_com_info.emp_id');
				//$this->db->where('pr_emp_per_info.emp_id = pd_pay_scale_sheet.emp_id');
				if($section_id !="Select")
				{
					$this->db->where("pr_emp_com_info.emp_sec_id", $section_id);
				}
				
				$where = "pr_emp_com_info.emp_join_date  <= '$grid_firstdate'";
				$this->db->where($where);
				$this->db->where("pr_emp_com_info.emp_cat_id",1);
				//$this->db->where_not_in('pr_emp_com_info.emp_id',$get_left_emp);
				//$this->db->where_not_in('pr_emp_com_info.emp_id',$get_resign_emp);
			}
			if($grid_status == 2)//For New
			{
				$this->db->select('pr_emp_per_info.*');
				$this->db->from('pr_emp_com_info');
				$this->db->from('pr_emp_per_info');
				$this->db->where('pr_emp_per_info.emp_id = pr_emp_com_info.emp_id');
				if($section_id !="Select")
				{
					$this->db->where("pr_emp_com_info.emp_sec_id", $section_id);
				}
				
				$where = "pr_emp_com_info.emp_join_date  <= '$grid_firstdate'";
				$this->db->where($where);
				
				$this->db->where_not_in('pr_emp_com_info.emp_id',$get_left_emp);
				$this->db->where_not_in('pr_emp_com_info.emp_id',$get_resign_emp);
			}
			if($grid_status == 3)//For Left
			{
			  $this->db->select('pr_emp_per_info.*');
			  $this->db->from('pr_emp_left_history');
			  $this->db->from('pr_emp_com_info');
			  $this->db->from('pr_emp_per_info');
			  $this->db->where('pr_emp_per_info.emp_id = pr_emp_com_info.emp_id');
			  $this->db->where('pr_emp_per_info.emp_id = pr_emp_left_history.emp_id');
			  if($section_id !="Select")
				{
					$this->db->where("pr_emp_com_info.sec_id", $section_id);
				}
		
			  $this->db->where("trim(substr(pr_emp_left_history.left_date,1,7)) = '$salary_month'");
			}
			if($grid_status == 4)//For Resign
			{
				$this->db->select('pr_emp_per_info.*');
				$this->db->from('pr_emp_resign_history');
				$this->db->from('pr_emp_per_info');
				$this->db->from('pr_emp_com_info');
				$this->db->where('pr_emp_per_info.emp_id = pr_emp_com_info.emp_id');
				$this->db->where('pr_emp_per_info.emp_id = pr_emp_resign_history.emp_id');
				if($section_id !="Select")
				{
					$this->db->where("pr_emp_com_info.sec_id", $section_id);
				}
		
				$this->db->where("trim(substr(pr_emp_resign_history.resign_date,1,7)) = '$salary_month'");
			}
			
			if($grid_status == "ALL")
			{
				$get_left_emp = $this->common_model->get_left_emp_all_sts($salary_month);
				$get_resign_emp = $this->common_model->get_resign_emp_all_sts($salary_month);
				$this->db->select('pr_emp_per_info.*');
				$this->db->from('pr_emp_com_info');
				$this->db->from('pr_emp_per_info');
				$this->db->where('pr_emp_per_info.emp_id = pr_emp_com_info.emp_id');
				if($section_id !="Select")
				{
					$this->db->where("pr_emp_com_info.sec_id", $section_id);
				}

				$where = "pr_emp_com_info.emp_join_date  <= '$grid_firstdate'";
				$this->db->where($where);
				
				$this->db->where_not_in('pr_emp_com_info.emp_id',$get_left_emp);
				$this->db->where_not_in('pr_emp_com_info.emp_id',$get_resign_emp);
			}
		
			$query = $this->db->get();
			//echo $this->db->last_query();
			//echo $query->num_rows()."==";
			print_r($query->result());
			if($check == "count")
			{
				return $query->num_rows();
			}
			return $query->result();
		
	}
	function continious_floor_production_summary($grid_firstdate,$grid_seconddate,$grid_section,$grid_floor,$process_id,$grid_status)
	{
		$year_month_day1 = date('Y-m-d', strtotime($grid_firstdate));
		$year_month_day2 = date('Y-m-d', strtotime($grid_seconddate));
		$year = date("Y");
		$month = date("m");
		$table_date = "pd_logs_".$year."-".$month;
		$grid_firstdate = date('Y-m-d', strtotime($grid_firstdate));
		$grid_seconddate = date('Y-m-d', strtotime($grid_seconddate));
		
		$data['date1'] = date('M-d-Y', strtotime($grid_firstdate));
		$data['date2'] = date('M-d-Y', strtotime($grid_seconddate));
		
		$data['section_name'] 	= $this->get_section_name($grid_section);
		$data['floor_name'] 	= $this->get_floor_name($grid_floor);
		
		$data_emp_id = array();
		
		$emp_id = $this->count_empid_for_floor_wise_salary_for_conti($grid_section,$grid_floor,$grid_status,$grid_firstdate,$grid_seconddate,"emp_id");
			foreach($emp_id as $rows)
			{
				$data_emp_id[] = $rows->emp_id;
			}
			
			$pd_emp_floor_id = implode("xxx",$data_emp_id);
			//print_r($pd_emp_floor_id);
			$pd_emp_floor_id = explode('xxx', trim($pd_emp_floor_id));
		
		//echo $grid_floor;
		$this->db->select('SUM(quantity) AS quantity,process_id,article_id,section_id,color_id,size_id');
		$this->db->where_in('emp_id', $pd_emp_floor_id);
		$this->db->where('section_id', $grid_section);
		$this->db->where('process_id', $process_id);
		$this->db->where('floor_id', $grid_floor);
		$where = "date BETWEEN '$year_month_day1' and '$year_month_day2'";
		$this->db->where($where);
		$this->db->group_by('article_id');
		$this->db->group_by('process_id');
		$this->db->group_by('color_id');
		$this->db->group_by('size_id');
		$query_style = $this->db->get($table_date);
		 $query_style_num_rows = $query_style->num_rows();
		
		if($query_style_num_rows > 0)
		{
		
		  foreach($query_style->result() as $row)
		  {
			  $article_id 	= $row->article_id;
			  $process_id 	= $row->process_id;
			  $color_id 	= $row->color_id;
			  $size_id 		= $row->size_id; 
			  $quantity 	= $row->quantity;
			  $color_name 	= $this->get_color_name($color_id);
			  $process_name	= $this->get_process_name($process_id);
			  $results 		= $this->style_detail_report($article_id);
			  $size_name 	= $this->get_size_name($size_id);
			  $style_info 	= $results->row();
			  $style_id 	= $style_info->style_id;
			  $buyer_id 	= $style_info->buyer_id;
			  $order_qty 	= $style_info->total_quantity;
			  $buyer_name = $this->get_buyer_name($buyer_id);
			  
			  $qty_complete = $this->get_qty_complete_by_size($article_id,$process_id,$color_id,$size_id,$grid_section);
			  
			  
			  $data['buyer_name'][] 	= $buyer_name;
			  $data['style_id'][] 		= $style_id;
			  $data['order_qty'][] 		= $order_qty;
			  $data['article_id'][] 	= $article_id;
			  $data['process_id'][] 	= $process_id;
			  $data['process_name'][] 	= $process_name;
			  $data['color_name'][] 	= $color_name;
			  $data['size_name'][] 		= $size_name;
			  $data['quantity'][] 		= $quantity;
			  $data['qty_complete'][] 	= $qty_complete;
			  $data['balance'][] 		= $order_qty - $qty_complete;
			  
		  }
		  //print_r($data);
		  return $data;
		}
		else
		{
			 return "empty";
		}
	}
	 function count_empid_for_floor_wise_salary_for_conti($section_id,$floor_id,$grid_status,$grid_firstdate,$grid_seconddate,$check)
	{
			
			$probation_period 	= $this->common_model->get_setup_attributes(10);
			//$prev_prob_month 	= $this->common_model->get_prev_month($probation_period,$salary_month);
			$get_left_emp 		= $this->common_model->get_left_emp_continuous($grid_firstdate,$grid_seconddate);
			$get_resign_emp 	= $this->common_model->get_resign_emp_continuous($grid_firstdate,$grid_seconddate);
			$sal_year_month = "2013-11-01";
			if($grid_status == 1)// For Regular
			{
				$this->db->select('pr_emp_per_info.*');
				$this->db->from('pr_emp_com_info');
				$this->db->from('pr_emp_per_info');
				$this->db->where('pr_emp_per_info.emp_id = pr_emp_com_info.emp_id');
				//$this->db->where('pr_emp_per_info.emp_id = pd_pay_scale_sheet.emp_id');
				if($section_id !="Select")
				{
					$this->db->where("pr_emp_com_info.emp_sec_id", $section_id);
				}
				if($floor_id !="Select")
				{
					$this->db->where("pr_emp_com_info.emp_position_id", $floor_id);
				}
				
				$where = "pr_emp_com_info.emp_join_date  <= '$grid_firstdate'";
				$this->db->where($where);
				
				$this->db->where_not_in('pr_emp_com_info.emp_id',$get_left_emp);
				$this->db->where_not_in('pr_emp_com_info.emp_id',$get_resign_emp);
			}
			if($grid_status == 2)//For New
			{
				$this->db->select('pr_emp_per_info.*');
				$this->db->from('pr_emp_com_info');
				$this->db->from('pr_emp_per_info');
				$this->db->where('pr_emp_per_info.emp_id = pr_emp_com_info.emp_id');
				if($section_id !="Select")
				{
					$this->db->where("pr_emp_com_info.emp_sec_id", $section_id);
				}
				if($floor_id !="Select")
				{
					$this->db->where("pr_emp_com_info.emp_position_id", $floor_id);
				}
				
				$where = "pr_emp_com_info.emp_join_date  <= '$grid_firstdate'";
				$this->db->where($where);
				
				$this->db->where_not_in('pr_emp_com_info.emp_id',$get_left_emp);
				$this->db->where_not_in('pr_emp_com_info.emp_id',$get_resign_emp);
			}
			if($grid_status == 3)//For Left
			{
			  $this->db->select('pr_emp_per_info.*');
			  $this->db->from('pr_emp_left_history');
			  $this->db->from('pr_emp_com_info');
			  $this->db->from('pr_emp_per_info');
			  $this->db->where('pr_emp_per_info.emp_id = pr_emp_com_info.emp_id');
			  $this->db->where('pr_emp_per_info.emp_id = pr_emp_left_history.emp_id');
			  if($section_id !="Select")
				{
					$this->db->where("pr_emp_com_info.sec_id", $section_id);
				}
				if($floor_id !="Select")
				{
					$this->db->where("pr_emp_com_info.floor_id", $floor_id);
				}
				
			  $this->db->where("trim(substr(pr_emp_left_history.left_date,1,7)) = '$salary_month'");
			}
			if($grid_status == 4)//For Resign
			{
				$this->db->select('pr_emp_per_info.*');
				$this->db->from('pr_emp_resign_history');
				$this->db->from('pr_emp_per_info');
				$this->db->from('pr_emp_com_info');
				$this->db->where('pr_emp_per_info.emp_id = pr_emp_com_info.emp_id');
				$this->db->where('pr_emp_per_info.emp_id = pr_emp_resign_history.emp_id');
				if($section_id !="Select")
				{
					$this->db->where("pr_emp_com_info.sec_id", $section_id);
				}
				if($floor_id !="Select")
				{
					$this->db->where("pr_emp_com_info.floor_id", $floor_id);
				}
				
				$this->db->where("trim(substr(pr_emp_resign_history.resign_date,1,7)) = '$salary_month'");
			}
			
			if($grid_status == "ALL")
			{
				$get_left_emp = $this->common_model->get_left_emp_all_sts($salary_month);
				$get_resign_emp = $this->common_model->get_resign_emp_all_sts($salary_month);
				$this->db->select('pr_emp_per_info.*');
				$this->db->from('pr_emp_com_info');
				$this->db->from('pr_emp_per_info');
				$this->db->where('pr_emp_per_info.emp_id = pr_emp_com_info.emp_id');
				if($section_id !="Select")
				{
					$this->db->where("pr_emp_com_info.sec_id", $section_id);
				}
				if($floor_id !="Select")
				{
					$this->db->where("pr_emp_com_info.floor_id", $floor_id);
				}
			
				$where = "pr_emp_com_info.emp_join_date  <= '$grid_firstdate'";
				$this->db->where($where);
				
				$this->db->where_not_in('pr_emp_com_info.emp_id',$get_left_emp);
				$this->db->where_not_in('pr_emp_com_info.emp_id',$get_resign_emp);
			}
		
			$query = $this->db->get();
			//echo $this->db->last_query();
			//echo $query->num_rows()."==";
			if($check == "count")
			{
				return $query->num_rows();
			}
			return $query->result();
	}
	function continious_block_production_summary($grid_firstdate,$grid_seconddate,$grid_section,$grid_floor,$grid_block,$process_id,$grid_status)
	{
		$year_month_day1 = date('Y-m-d', strtotime($grid_firstdate));
		$year_month_day2 = date('Y-m-d', strtotime($grid_seconddate));
		$grid_firstdate = date('Y-m-d', strtotime($grid_firstdate));
		$grid_seconddate = date('Y-m-d', strtotime($grid_seconddate));
		
		$data['date1'] = date('M-d-Y', strtotime($grid_firstdate));
		$data['date2'] = date('M-d-Y', strtotime($grid_seconddate));
		
		$data['section_name'] 	= $this->get_section_name($grid_section);
		$data['floor_name'] 	= $this->get_floor_name($grid_floor);
		$data['block_name'] 	= $this->get_block_name($grid_block);
		
		$data_emp_id = array();
		
		$emp_id = $this->count_empid_for_block_wise_salary_for_conti($grid_section,$grid_floor,$grid_block,$grid_status,$grid_firstdate,$grid_seconddate,"emp_id");
			foreach($emp_id as $rows)
			{
				$data_emp_id[] = $rows->emp_id;
			}
			
			$data_emp_id = implode("xxx",$data_emp_id);
			//print_r($data_emp_id);
			$pd_emp_id = explode('xxx', trim($data_emp_id));
		
		$this->db->select('SUM(quantity) AS quantity,process_id,article_id,section_id,color_id,size_id');
		$this->db->where_in('emp_id', $pd_emp_id);
		$this->db->where('section_id', $grid_section);
		$this->db->where('process_id', $process_id);
		$this->db->where('floor_id', $grid_floor);
		$this->db->where('block_id', $grid_block);
		$where = "date BETWEEN '$year_month_day1' and '$year_month_day2'";
		$this->db->where($where);
		$this->db->group_by('article_id');
		$this->db->group_by('process_id');
		$this->db->group_by('color_id');
		$this->db->group_by('size_id');
		$query_style = $this->db->get('pd_production_logs');
		 $query_style_num_rows = $query_style->num_rows();
		
		if($query_style_num_rows > 0)
		{
		  foreach($query_style->result() as $row)
		  {
			  $article_id 	= $row->article_id;
			  $process_id 	= $row->process_id;
			  $color_id 	= $row->color_id;
			  $size_id 		= $row->size_id; 
			  $quantity 	= $row->quantity;
			  $color_name 	= $this->get_color_name($color_id);
			  $process_name	= $this->get_process_name($process_id);
			  $results 		= $this->style_detail_report($article_id);
			  $size_name 	= $this->get_size_name($size_id);
			  $style_info 	= $results->row();
			  $style_id 	= $style_info->style_id;
			  $buyer_id 	= $style_info->buyer_id;
			  $order_qty 	= $style_info->total_quantity;
			  $buyer_name = $this->get_buyer_name($buyer_id);
			  
			  $qty_complete = $this->get_qty_complete_by_size($article_id,$process_id,$color_id,$size_id,$grid_section);
			  
			  
			  $data['buyer_name'][] 	= $buyer_name;
			  $data['style_id'][] 		= $style_id;
			  $data['order_qty'][] 		= $order_qty;
			  $data['article_id'][] 	= $article_id;
			  $data['process_id'][] 	= $process_id;
			  $data['process_name'][] 	= $process_name;
			  $data['color_name'][] 	= $color_name;
			  $data['size_name'][] 		= $size_name;
			  $data['quantity'][] 		= $quantity;
			  $data['qty_complete'][] 	= $qty_complete;
			  $data['balance'][] 		= $order_qty - $qty_complete;
			  
		  }
		  //print_r($data);
		  return $data;
		}
		else
		{
			 return "empty";
		}
	}
	 function count_empid_for_block_wise_salary_for_conti($section_id,$floor_id,$block_id,$grid_status,$grid_firstdate,$grid_seconddate,$check)
	{
			$probation_period 	= $this->common_model->get_setup_attributes(10);
			//$prev_prob_month 	= $this->common_model->get_prev_month($probation_period,$salary_month);
			$get_left_emp 		= $this->common_model->get_left_emp_continuous($grid_firstdate,$grid_seconddate);
			$get_resign_emp 	= $this->common_model->get_resign_emp_continuous($grid_firstdate,$grid_seconddate);
			$sal_year_month = "2013-11-01";
			if($grid_status == 1)// For Regular
			{
				$this->db->select('pr_emp_per_info.*');
				$this->db->from('pr_emp_com_info');
				$this->db->from('pr_emp_per_info');
				$this->db->where('pr_emp_per_info.emp_id = pr_emp_com_info.emp_id');
				//$this->db->where('pr_emp_per_info.emp_id = pd_pay_scale_sheet.emp_id');
				if($section_id !="Select")
				{
					$this->db->where("pr_emp_com_info.emp_sec_id", $section_id);
				}
				if($floor_id !="Select")
				{
					$this->db->where("pr_emp_com_info.emp_position_id", $floor_id);
				}
				if($block_id !="Select")
				{
					$this->db->where("pr_emp_com_info.emp_line_id", $block_id);
				}
				
				//$this->db->where("trim(substr(pr_emp_com_info.emp_join_date,1,7)) < '$prev_prob_month'");
				//$this->db->where("trim(substr(pr_emp_com_info.emp_join_date,1,7)) <= '$salary_month'");
				
				$where = "pr_emp_com_info.emp_join_date  <= '$grid_firstdate'";
				$this->db->where($where);
				
				$this->db->where_not_in('pr_emp_com_info.emp_id',$get_left_emp);
				$this->db->where_not_in('pr_emp_com_info.emp_id',$get_resign_emp);
			}
			if($grid_status == 2)//For New
			{
				$this->db->select('pr_emp_per_info.*');
				$this->db->from('pr_emp_com_info');
				$this->db->from('pr_emp_per_info');
				$this->db->where('pr_emp_per_info.emp_id = pr_emp_com_info.emp_id');
				if($section_id !="Select")
				{
					$this->db->where("pr_emp_com_info.sec_id", $section_id);
				}
				if($floor_id !="Select")
				{
					$this->db->where("pr_emp_com_info.floor_id", $floor_id);
				}
				if($block_id !="Select")
				{
					$this->db->where("pr_emp_com_info.block_id", $block_id);
				}
				$where = "pr_emp_com_info.emp_join_date  <= '$grid_firstdate'";
				$this->db->where($where);
				
				$this->db->where_not_in('pr_emp_com_info.emp_id',$get_left_emp);
				$this->db->where_not_in('pr_emp_com_info.emp_id',$get_resign_emp);
			}
			if($grid_status == 3)//For Left
			{
			  $this->db->select('pr_emp_per_info.*');
			  $this->db->from('pr_emp_left_history');
			  $this->db->from('pr_emp_com_info');
			  $this->db->from('pr_emp_per_info');
			  $this->db->where('pr_emp_per_info.emp_id = pr_emp_com_info.emp_id');
			  $this->db->where('pr_emp_per_info.emp_id = pr_emp_left_history.emp_id');
			  if($section_id !="Select")
				{
					$this->db->where("pr_emp_com_info.sec_id", $section_id);
				}
				if($floor_id !="Select")
				{
					$this->db->where("pr_emp_com_info.floor_id", $floor_id);
				}
				if($block_id !="Select")
				{
					$this->db->where("pr_emp_com_info.block_id", $block_id);
				}
			  $this->db->where("trim(substr(pr_emp_left_history.left_date,1,7)) = '$salary_month'");
			}
			if($grid_status == 4)//For Resign
			{
				$this->db->select('pr_emp_per_info.*');
				$this->db->from('pr_emp_resign_history');
				$this->db->from('pr_emp_per_info');
				$this->db->from('pr_emp_com_info');
				$this->db->where('pr_emp_per_info.emp_id = pr_emp_com_info.emp_id');
				$this->db->where('pr_emp_per_info.emp_id = pr_emp_resign_history.emp_id');
				if($section_id !="Select")
				{
					$this->db->where("pr_emp_com_info.sec_id", $section_id);
				}
				if($floor_id !="Select")
				{
					$this->db->where("pr_emp_com_info.floor_id", $floor_id);
				}
				if($block_id !="Select")
				{
					$this->db->where("pr_emp_com_info.block_id", $block_id);
				}
				$this->db->where("trim(substr(pr_emp_resign_history.resign_date,1,7)) = '$salary_month'");
			}
			
			if($grid_status == "ALL")
			{
				$get_left_emp = $this->common_model->get_left_emp_all_sts($salary_month);
				$get_resign_emp = $this->common_model->get_resign_emp_all_sts($salary_month);
				$this->db->select('pr_emp_per_info.*');
				$this->db->from('pr_emp_com_info');
				$this->db->from('pr_emp_per_info');
				$this->db->where('pr_emp_per_info.emp_id = pr_emp_com_info.emp_id');
				if($section_id !="Select")
				{
					$this->db->where("pr_emp_com_info.sec_id", $section_id);
				}
				if($floor_id !="Select")
				{
					$this->db->where("pr_emp_com_info.floor_id", $floor_id);
				}
				if($block_id !="Select")
				{
					$this->db->where("pr_emp_com_info.block_id", $block_id);
				}
				$where = "pr_emp_com_info.emp_join_date  <= '$grid_firstdate'";
				$this->db->where($where);
				
				$this->db->where_not_in('pr_emp_com_info.emp_id',$get_left_emp);
				$this->db->where_not_in('pr_emp_com_info.emp_id',$get_resign_emp);
			}
		
			
			$query = $this->db->get();
			//echo $this->db->last_query();
			//echo $query->num_rows()."==";
			if($check == "count")
			{
				return $query->num_rows();
			}
			return $query->result();
	}
	function monthly_floor_production_summary($grid_firstdate,$grid_seconddate,$grid_section,$grid_floor,$grid_status)
	{
		$year_month_day1 = date('Y-m-d', strtotime($grid_firstdate));
		$year_month_day2 = date('Y-m-d', strtotime($grid_seconddate));
		$data['date1'] = date('M-d-Y', strtotime($grid_firstdate));
		$data['date2'] = date('M-d-Y', strtotime($grid_seconddate));
		
		$year_month = date('Y-m', strtotime($grid_firstdate));
		$year = date('Y', strtotime($grid_firstdate));
		$month = date('m', strtotime($grid_firstdate));
		$process_date 		= $this->pd_process_model->get_start_end_date($month,$year);
		$process_start_date = $process_date['start_date'] ;
		$process_end_date 	= $process_date['end_date'] ;
		
		// For  Emp ID
		$salary_draw_cash = 1;
		$emp_id = $this->count_empid_for_floor_wise_salary($grid_section,$grid_floor,$grid_status,$year_month,$salary_draw_cash,"emp_id");
		foreach($emp_id as $rows)
		{
			$data_emp_id[] = $rows->emp_id;
		}
		
		$data_emp_id = implode("xxx",$data_emp_id);
		//print_r($data_emp_id);
		$pd_emp_id = explode('xxx', trim($data_emp_id));
		
		$body_id 		= 1;
		$neck_id 		= 2;
		$complet_id 	= 3;
		$piping_id 		= 4;
		$tack_id 		= 5;
		$placket_id 	= 6;
		$v_neck_id 		= 7;

		$data['section_name'] 	= $this->get_section_name($grid_section);
		$data['floor_name'] 	= $this->get_floor_name($grid_floor);
		$this->db->select('SUM(quantity) AS quantity,process_id,article_id,section_id,color_id,size_id');
		$this->db->where('section_id', $grid_section);
		$this->db->where('floor_id', $grid_floor);
		$where = "date BETWEEN '$process_start_date' and '$process_end_date'";
		$this->db->where($where);
		$this->db->group_by('article_id');
		$this->db->group_by('process_id');
		$this->db->group_by('color_id');
		$this->db->group_by('size_id');
		$query_style = $this->db->get('pd_production_logs');
		$query_style_num_rows = $query_style->num_rows();
		
		if($query_style_num_rows > 0)
		{
		
		  foreach($query_style->result() as $row)
		  {
			  $article_id 	= $row->article_id;
			  $process_id 	= $row->process_id;
			  $color_id 	= $row->color_id;
			  $size_id 		= $row->size_id; 
			  
			  
			  //get body amount
			  $column_name = "quantity";
			  $quantity= $this->get_monthly_floor_wise_cost_sheet_data($grid_section,$process_start_date,$process_end_date,$grid_floor,$column_name,$pd_emp_id,$article_id,$process_id,$color_id,$size_id);
			  
			  
			 // $quantity 	= $row->quantity;
			  $color_name 	= $this->get_color_name($color_id);
			  $process_name	= $this->get_process_name($process_id);
			  $results 		= $this->style_detail_report($article_id);
			  $size_name 	= $this->get_size_name($size_id);
			  $style_info 	= $results->row();
			  $style_id 	= $style_info->style_id;
			  $buyer_id 	= $style_info->buyer_id;
			  $order_qty 	= $style_info->total_quantity;
			  $buyer_name = $this->get_buyer_name($buyer_id);
			  
			  $qty_complete = $this->get_qty_complete_by_size($article_id,$process_id,$color_id,$size_id,$grid_section);
			  
			  
			  $data['buyer_name'][] 	= $buyer_name;
			  $data['style_id'][] 		= $style_id;
			  $data['order_qty'][] 		= $order_qty;
			  $data['article_id'][] 	= $article_id;
			  $data['process_id'][] 	= $process_id;
			  $data['process_name'][] 	= $process_name;
			  $data['color_name'][] 	= $color_name;
			  $data['size_name'][] 		= $size_name;
			  $data['quantity'][] 		= $quantity;
			  $data['qty_complete'][] 	= $qty_complete;
			  $data['balance'][] 		= $order_qty - $qty_complete;
			  
		  }
		  //print_r($data);
		  return $data;
		}
		else
		{
			 return "empty";
		}
	}
	
	function get_monthly_floor_wise_cost_sheet_data($grid_section,$process_start_date,$process_end_date,$grid_floor,$column_name,$pd_emp_id,$article_id,$process_id,$color_id,$size_id)
	{
		
		$this->db->select_sum($column_name);
		$this->db->from("pd_production_logs");
		$this->db->where('section_id', $grid_section);
		$this->db->where('floor_id', $grid_floor);
		
		$this->db->where('article_id', $article_id);
		$this->db->where('process_id', $process_id);
		$this->db->where('color_id', $color_id);
		$this->db->where('size_id', $size_id);
		
		$this->db->where_in('pd_production_logs.emp_id',$pd_emp_id);
		$where = "date BETWEEN '$process_start_date' and '$process_end_date'";
		$this->db->where($where);
		$query = $this->db->get();
		//echo $this->db->last_query();
		$row = $query->row();
		$result = $row->$column_name;

			if($result =='')
			{
				$result = 0;
			}
		
		return $result;
	}
	
	function get_qty_complete_by_size($article_id,$process_id,$color_id,$size_id,$grid_section)
	{
		
		$this->db->select_sum('quantity');
		$this->db->where('section_id', $grid_section);
		$this->db->where('article_id', $article_id);
		$this->db->where('process_id', $process_id);
		$this->db->where('color_id', $color_id);
		$this->db->where('size_id', $size_id);
		$query = $this->db->get('pd_production_logs');
		
		$row = $query->row();
		$sum_pd_quantity = $row->quantity;
		if($sum_pd_quantity == "")
		{
			$sum_pd_quantity = 0;
		}
		return $sum_pd_quantity;
		
	}
	
	function production_summary()
	{
	
		//=====Collect Buyer Wise Style Information========
		$this->db->select('*');
		$query_style = $this->db->get('pd_style_infos');
		foreach($query_style->result() as $row)
		{
			$data['article_id'][] 		= $row->article_id;
			$byuer_name = $this->get_buyer_name($row->buyer_id);
			$gauge_name = $this->get_gauge_name($row->gauge_id);
			
			$data['byuer_name'][] 		= $byuer_name;
			$data['style_id'][]	 		= $row->style_id;
			$data['order_number'][]		= $row->order_number;
			$data['gauge_name'][]		= $gauge_name;
			$data['shipment_date'][]	= $row->shipment_date;
			$total_quantity 			= $row->total_quantity;
			$data['total_quantity'][] 	= $total_quantity;
			$five_percent_qty 			= ($total_quantity*5)/100;
			
			$data['five_percent_plus_qty'][] 	= $five_percent_qty + $total_quantity;
			
			$qty_complete_for_kinit = $this->get_qty_complete($row->article_id,1);
			$data['qty_complete_for_kinit'][] 	= $qty_complete_for_kinit;
			
			$qty_complete_for_linking = $this->get_qty_complete($row->article_id,2);
			$data['qty_complete_for_linking'][] 	= $qty_complete_for_linking;
			
		}
		
		//print_r($data);
		return $data;
		
	}
	function get_qty_complete($article_id,$sec_id)
	{
		
		$this->db->select_sum('quantity');
		$this->db->where('article_id', $article_id);
		$query = $this->db->get('pd_production_logs');
		
		$row = $query->row();
		$sum_pd_quantity = $row->quantity;
		if($sum_pd_quantity == "")
		{
			$sum_pd_quantity = 0;
		}
		return $sum_pd_quantity;
		
	}
	
	function production_monthly_cost_sheet($grid_firstdate)
	{
		$year_month = date('Y-m', strtotime($grid_firstdate));
		$prev_year_month = strtotime ( '-1 month' , strtotime ( $grid_firstdate ) ) ;
		$prev_year_month = date ( 'Y-m' , $prev_year_month );
		
		$fixed_section = $this->get_section(1);
		$pd_section = $this->get_section(2);
		$data['year_month'] = $year_month;
		$data['prev_year_month'] = $prev_year_month;
		//echo $fixed_section;
		if($fixed_section !=0)
		{
		  foreach($fixed_section as $section_id)
		  {
			 $data['fx_section_id'][] = $section_id;
			  
			  $data['fx_section_name'][] = $this->get_section_name($section_id);
			  // echo $section_id ;
			  //get Man Power of current month
			  $fx_man_power = $this->db->where('sec_id',$section_id)->like('salary_month',$year_month)->get('pr_pay_scale_sheet')->num_rows();
			  $data['fx_man_power'][] = $fx_man_power;
			  
			  //get Man Power of Previous month
			  $fx_man_power_pm = $this->db->where('sec_id',$section_id)->like('salary_month',$prev_year_month)->get('pr_pay_scale_sheet')->num_rows();
			  $data['fx_man_power_pm'][] = $fx_man_power_pm;
			  
			  //get ADVance Loan
			  $column_name = "adv_deduct";
			  $fx_adv_deduct = $this->get_fixed_section_wise_cost_sheet_data($year_month,$section_id,$column_name );
			  $data['fx_adv_deduct'][] = $fx_adv_deduct;
			  
			  //get ADVance Loan Previous month
			  $column_name = "adv_deduct";
			  $fx_adv_deduct_pm = $this->get_fixed_section_wise_cost_sheet_data($prev_year_month,$section_id,$column_name );
			  $data['fx_adv_deduct_pm'][] = $fx_adv_deduct_pm;
			  
			  //get Net Pay 
			  $column_name = "net_pay";
			  $fx_net_pay = $this->get_fixed_section_wise_cost_sheet_data($year_month,$section_id,$column_name );
			  $data['fx_net_pay'][] = $fx_net_pay;
			  
			  //get Net Pay Previous month
			  $column_name = "net_pay";
			  $fx_net_pay_pm = $this->get_fixed_section_wise_cost_sheet_data($prev_year_month,$section_id,$column_name );
			  $data['fx_net_pay_pm'][] = $fx_net_pay_pm;
			  
		  }
		  $data['fx_section_null'] = 1;
		}
		else
		{
			$data['fx_section_null'] =0;
		}
		
		if($pd_section !=0)
		{
		  foreach($pd_section as $section_id)
		  {
			  
			  $data['pd_section_id'][] = $section_id;
			  
			  $data['pd_section_name'][] = $this->get_section_name($section_id);
			  // echo $section_id ;
			  //get Man Power of current month
			  $pd_man_power = $this->db->where('sec_id',$section_id)->like('salary_month',$year_month)->get('pd_pay_scale_sheet')->num_rows();
			  $data['pd_man_power'][] = $pd_man_power;
			  
			  //get Man Power of Previous month
			  $pd_man_power_pm = $this->db->where('sec_id',$section_id)->like('salary_month',$prev_year_month)->get('pd_pay_scale_sheet')->num_rows();
			  $data['pd_man_power_pm'][] = $pd_man_power_pm;
			  
			  //get ADVance Loan
			  $column_name = "adv_deduct";
			  $pd_adv_deduct = $this->get_section_wise_cost_sheet_data($year_month,$section_id,$column_name );
			  $data['pd_adv_deduct'][] = $pd_adv_deduct;
			  
			  //get ADVance Loan Previous month
			  $column_name = "adv_deduct";
			  $pd_adv_deduct_pm = $this->get_section_wise_cost_sheet_data($prev_year_month,$section_id,$column_name );
			  $data['pd_adv_deduct_pm'][] = $pd_adv_deduct_pm;
			  
			  //get Production amount
			  $column_name = "pd_amount";
			  $pd_amount= $this->get_section_wise_cost_sheet_data($year_month,$section_id,$column_name );
			  $data['pd_amount'][] = $pd_amount;
			  
			  //get Production amount Previous month
			  $column_name = "pd_amount";
			  $pd_amount_pm= $this->get_section_wise_cost_sheet_data($prev_year_month,$section_id,$column_name );
			  $data['pd_amount_pm'][] = $pd_amount_pm;
			  
			  //get Net Pay 
			  $column_name = "net_pay";
			  $pd_net_pay = $this->get_section_wise_cost_sheet_data($year_month,$section_id,$column_name );
			  $data['pd_net_pay'][] = $pd_net_pay;
			  
			  //get Net Pay Previous month
			  $column_name = "net_pay";
			  $pd_net_pay_pm = $this->get_section_wise_cost_sheet_data($prev_year_month,$section_id,$column_name );
			  $data['pd_net_pay_pm'][] = $pd_net_pay_pm;
			  
			  
			  
		  }
		  $data['pd_section_null'] = 1;
		}
		else
		{
			$data['pd_section_null'] = 0;
		}
		//print_r($data);
		return $data;
		
	}

	
	function get_section($salary_type)
	{
		$this->db->select('emp_sec_id');
		$this->db->where('salary_type',$salary_type);
		$this->db->group_by('emp_sec_id');
		$query = $this->db->get('pr_emp_com_info');
		if($query->num_rows > 0)
		{
		  foreach($query->result() as $rows)
		  {
			  $section_id[] = $rows->emp_sec_id;
		  }
		}
		else
		{
			$section_id = 0;
		}
		return $section_id;
		
	}
	function get_fixed_section_wise_cost_sheet_data($year_month,$section_id,$column_name )
	{
		$this->db->select_sum($column_name);
		$this->db->where('sec_id', $section_id);
		$this->db->like('salary_month',$year_month);
		$query = $this->db->get('pr_pay_scale_sheet');
		
		$row = $query->row();
		$sum = $row->$column_name;
		if($sum == "")
		{
			$sum = 0;
		}
		return $sum;
		
	}
	
	function get_section_wise_cost_sheet_data_for_summary($year_month,$section_id,$column_name,$pd_emp_id)
	{
		$this->db->select_sum($column_name);
		$this->db->where('sec_id', $section_id);
		$this->db->where_in('pd_pay_scale_sheet.emp_id', $pd_emp_id);
		$this->db->like('salary_month',$year_month);
		$query = $this->db->get('pd_pay_scale_sheet');
		
		$row = $query->row();
		$sum = $row->$column_name;
		if($sum == "")
		{
			$sum = 0;
		}
		return $sum;
		
	}
	function get_section_wise_cost_sheet_data_for_summary_att_bonus_no($year_month,$section_id,$column_name,$pd_emp_id)
	{
		
		$this->db->select('att_bonus');
		$this->db->from("pd_pay_scale_sheet");
		$this->db->where('att_bonus != 0');
		$this->db->where_in('pd_pay_scale_sheet.emp_id', $pd_emp_id);
		$this->db->like("salary_month", $year_month);
		$query = $this->db->get();
		$count_att_bonus = $query->num_rows();
		return $count_att_bonus;
		
	}
	
	function get_floor_wise_cost_sheet_data($year_month,$column_name,$pd_emp_id)
	{
		/*$table_column_name = $column_name;
		if($column_name == "att_bonus_no")
		{
			$table_column_name = "att_bonus";
			$this->db->select_sum('att_bonus');
		}
		else
		{
			$this->db->select_sum($table_column_name);
		}
		$this->db->from("pd_pay_scale_sheet");
		if($column_name == "att_bonus_no")
		{
			$this->db->where('att_bonus != 0');
		}
		$this->db->like('salary_month',$year_month);
		
		
		$this->db->where_in('pd_pay_scale_sheet.emp_id', $pd_emp_id);
		$this->db->like("salary_month", $year_month);
		$query = $this->db->get();
		
		$row = $query->row();
		$sum = $row->$table_column_name;
		if($sum == "")
		{
			$sum = 0;
		}
		return $sum;*/
		
		
		
		$table_column_name = $column_name;
		$this->db->select_sum($table_column_name);
		$this->db->from("pd_pay_scale_sheet");
	
		$this->db->where_in('pd_pay_scale_sheet.emp_id', $pd_emp_id);
		$this->db->like("salary_month", $year_month);
		$query = $this->db->get();
		$row = $query->row();
		$sum = $row->$table_column_name;
		if($sum == "")
		{
			$sum = 0;
		}
		return $sum;
		
		
	}
	function get_block_wise_cost_sheet_data($year_month,$column_name,$pd_emp_id)
	{
		
		$table_column_name = $column_name;
		$this->db->select_sum($table_column_name);
		$this->db->from("pd_pay_scale_sheet");
	
		$this->db->where_in('pd_pay_scale_sheet.emp_id', $pd_emp_id);
		$this->db->like("salary_month", $year_month);
		$query = $this->db->get();
		$row = $query->row();
		$sum = $row->$table_column_name;
		if($sum == "")
		{
			$sum = 0;
		}
		return $sum;
		
		
	}
	function get_block_wise_cost_sheet_data_att_bonus_no($year_month,$column_name,$pd_emp_id)
	{
		
		$this->db->select('att_bonus');
		$this->db->from("pd_pay_scale_sheet");
		$this->db->where('att_bonus != 0');
		$this->db->where_in('pd_pay_scale_sheet.emp_id', $pd_emp_id);
		$this->db->like("salary_month", $year_month);
		$query = $this->db->get();
		$count_att_bonus = $query->num_rows();
		return $count_att_bonus;
		
	}
	
	function get_floor_wise_cost_sheet_data_att_bonus_no($year_month,$column_name,$pd_emp_id)
	{
		
		$this->db->select('att_bonus');
		$this->db->from("pd_pay_scale_sheet");
		$this->db->where('att_bonus != 0');
		$this->db->where_in('pd_pay_scale_sheet.emp_id', $pd_emp_id);
		$this->db->like("salary_month", $year_month);
		$query = $this->db->get();
		$count_att_bonus = $query->num_rows();
		return $count_att_bonus;
	}
	
	
	function grid_production_wages_card($sal_year_month,$grid_emp_id)
	{
		//echo $sal_year_month;
		$year_month = date('Y-m', strtotime($sal_year_month));
		$pd_log_table = $this->common_model->get_pd_log_table_monthly($year_month);
		$data['year'] = date('Y', strtotime($sal_year_month));
		$data['month'] = date('F', strtotime($sal_year_month));
		$year = date('Y', strtotime($sal_year_month));
		$month = date('m', strtotime($sal_year_month));
		
		$process_date 		= $this->pd_process_model->get_start_end_date($month,$year);
		 $process_start_date = $process_date['start_date'] ;
		$process_end_date 	= $process_date['end_date'] ;
		
		foreach($grid_emp_id as $emp_id)
		{
			
			$this->db->select('pr_emp_com_info.emp_sec_id,pr_emp_per_info.emp_full_name, pr_designation.desig_name,pr_dept.dept_name, pr_section.sec_name, pr_line_num.line_name, pr_emp_position.posi_name');
			$this->db->from('pr_emp_per_info');
			$this->db->from('pr_emp_com_info');
			$this->db->from('pr_designation');
			$this->db->from('pr_dept');
			$this->db->from('pr_section');
			$this->db->from('pr_line_num');
			$this->db->from('pr_emp_position');
			$this->db->where('pr_emp_per_info.emp_id = pr_emp_com_info.emp_id');
			$this->db->where('pr_emp_com_info.emp_desi_id = pr_designation.desig_id');
			$this->db->where('pr_emp_com_info.emp_dept_id = pr_dept.dept_id');
			$this->db->where('pr_emp_com_info.emp_sec_id = pr_section.sec_id');
			$this->db->where('pr_emp_com_info.emp_line_id = pr_line_num.line_id');
			$this->db->where('pr_emp_com_info.emp_position_id = pr_emp_position.posi_id');
			$this->db->where("pr_emp_per_info.emp_id = '$emp_id'");
			//$this->db->where("pr_emp_per_info.emp_id = pd_pay_scale_sheet.emp_id");
			//$this->db->like('salary_month', $sal_year_month);
			$company_info = $this->db->get();
			
			$num_rows = $company_info->num_rows();
			if($num_rows > 0)
			{
			
			$com_info 				= $company_info->row();
			$section_name 			= $com_info->sec_name;
			$emp_sec_id 			= $com_info->emp_sec_id;
			$posi_name		 		= $com_info->posi_name;
			$desig_name 			= $com_info->desig_name;
			$line_name	 			= $com_info->line_name;
			$emp_full_name 			= $com_info->emp_full_name;
			
			
			$this->db->select('*');
			$this->db->from('pd_pay_scale_sheet');
			$this->db->where("pd_pay_scale_sheet.emp_id = '$emp_id'");
			$this->db->like('salary_month', $sal_year_month);
			$salary_info = $this->db->get();
			if($salary_info->num_rows() < 1)
			{
			  	$pd_amount 				= 0;
			 	$pd_bonus_amount 		= 0;
			 	$att_bonus 				= 0;
			  	$none_work_allowance 	= 0;
			  	$holiday_allowance 		= 0;
			  	$night_allowance 		= 0;
			  	$others_allaw 			= 0;
				$net_pay				= 0;
			}
			else
			{
				$salary_info 			= $salary_info->row();
				$pd_amount 				= $salary_info->pd_amount;
				$pd_bonus_amount 		= $salary_info->pd_bonus_amount;
				$att_bonus 				= $salary_info->att_bonus;
				$none_work_allowance 	= $salary_info->none_work_allowance;
				$holiday_allowance 		= $salary_info->holiday_allowance;
				$night_allowance 		= $salary_info->night_allowance;
				$others_allaw 			= $salary_info->others_allaw;
				$net_pay 				= $salary_info->net_pay;
			
			}			   
			
			$data['emp_id'][] 				= $emp_id;
			$data['section_name'][] 		= $section_name;
			$data['line_name'][]			= $line_name;
			$data['posi_name'][]			= $posi_name;
			$data['desig_name'] []			= $desig_name;
			$data['emp_full_name'][] 		= $emp_full_name;
			
			$data['pd_amount'][] 			= $pd_amount;
			$data['pd_bonus_amount'][]		= $pd_bonus_amount;
			$data['att_bonus'][]			= $att_bonus;
			$data['none_work_allowance'][]	= $none_work_allowance;
			$data['holiday_allowance'][] 	= $holiday_allowance;
			$data['night_allowance'][]		= $night_allowance;
			$data['others_allaw'][]			= $others_allaw;
			$data['net_pay'][] 				= $net_pay;
			
			$this->db->select('SUM(quantity) AS total_quantity,process_id,article_id,section_id,size_id');
			$this->db->where('emp_id', $emp_id);
			$this->db->where('section_id', $emp_sec_id);
			$where = "date BETWEEN '$process_start_date' and '$process_end_date'";
			$this->db->where($where);
			$this->db->group_by("process_id");
			$this->db->group_by("article_id");
			$this->db->group_by("color_id");
			$this->db->group_by("size_id");
			$query = $this->db->get("$pd_log_table");
			$data[$emp_id]['count_style_summary'] = $query->num_rows();//."===$year_month===";
			//echo $this->db->last_query();
			foreach($query->result() as $style_summary)
			{
				$article_id 		= $style_summary->article_id;
				$process_id 		= $style_summary->process_id;
				$process_name		= $this->get_process_name($process_id);
				$size_id 			= $style_summary->size_id;
				$size_name 			= $this->get_size_name($size_id);
				$total_quantity 	= $style_summary->total_quantity;
				
			 	$unit_price 	= $this->emp_wise_entry_model->get_price($article_id,$emp_sec_id,$process_id,$size_id);
				$amount 		= round(($unit_price*$total_quantity),2);
							  
				$article_name = $this->get_article_name($style_summary->article_id);
				
				$data[$emp_id]['article_id'][] 		= $article_name;
				$data[$emp_id]['process_id'][] 		= $process_name;
				$data[$emp_id]['size_id'][] 		= $size_name;
				$data[$emp_id]['total_quantity'][] 	= $total_quantity;
				$data[$emp_id]['unit_price'][] 		= $unit_price;
				$data[$emp_id]['amount'][] 			= $amount;
				
			}
			
		$this->db->select('SUM(quantity) AS quantity,process_id,article_id,color_id, date as day,size_id');
		$this->db->where('emp_id', $emp_id);
		$this->db->where('section_id', $emp_sec_id);
		//$this->db->like('date', $year_month);
		$where = "date BETWEEN '$process_start_date' and '$process_end_date'";
		$this->db->where($where);
		$this->db->group_by("process_id");
		$this->db->group_by("article_id");
		$this->db->group_by("color_id");
		$this->db->group_by("size_id");
		$this->db->group_by("date");
		$this->db->order_by("date");
		$query_style = $this->db->get("$pd_log_table");
		
		//echo $this->db->last_query();
		
		 $data[$emp_id]['count_r_color'] = $query_style->num_rows();
		
		  foreach($query_style->result() as $row)
		  {
			  $article_id 	= $row->article_id;
			  $process_id 	= $row->process_id;
			  $color_id 	= $row->color_id;
			  $size_id 		= $row->size_id;
			  $quantity 	= $row->quantity;
			  $date 		= $row->day;
			  $size_name 	= $this->get_size_name($size_id);
			  $color_name 	= $this->get_color_name($color_id);
			  $process_name	= $this->get_process_name($process_id);
			  $results 		= $this->style_detail_report($article_id);
			  $style_info 	= $results->row();
			  $style_id 	= $style_info->style_id;
			  $buyer_id 	= $style_info->buyer_id;
			  $order_qty 	= $style_info->total_quantity;
			  $buyer_name = $this->get_buyer_name($buyer_id);
			  
			  $unit_price 	= $this->emp_wise_entry_model->get_price($article_id,$emp_sec_id,$process_id,$size_id);
			  
			  $article_name = $this->get_article_name($row->article_id);
			  
			  $data[$emp_id]['date'][] 			= $date;
			  $data[$emp_id]['r_buyer_name'][] 	= $buyer_name;
			  $data[$emp_id]['r_style_id'][] 	= $style_id;
			  $data[$emp_id]['r_article_id'][] 	= $article_name;
			  $data[$emp_id]['r_process_name'][]= $process_name;
			  $data[$emp_id]['r_color_name'][] 	= $color_name;
			  $data[$emp_id]['r_size_name'][] 	= $size_name;
			  $data[$emp_id]['r_quantity'][] 	= $quantity;
			  $data[$emp_id]['r_unit_price'][] 	= $unit_price;
		  }
		}}
		//print_r($data);
		return $data;
	}
	function production_monthly_attn_register($year_month, $grid_emp_id)
	{
		$year= trim(substr($year_month,0,4));
		$month = trim(substr($year_month,5,2));
		$att_month = "att_".$year."_".$month;
		$this->db->select('pr_emp_per_info.emp_full_name,pr_designation.desig_name,pd_manual_attandence.*');
		$this->db->from('pr_emp_per_info');
		$this->db->from('pr_emp_com_info');
		$this->db->from('pd_manual_attandence');
			$this->db->from('pr_dept');
			$this->db->from('pr_section');
			$this->db->from('pr_line_num');
			$this->db->from('pr_designation');
			$this->db->or_where_in("pr_emp_per_info.emp_id", $grid_emp_id);
			$this->db->like("pd_manual_attandence.date",$year_month);
			$this->db->where('pr_emp_com_info.emp_desi_id = pr_designation.desig_id');
			$this->db->where('pr_emp_com_info.emp_dept_id = pr_dept.dept_id');
			$this->db->where('pr_emp_com_info.emp_sec_id = pr_section.sec_id');
			$this->db->where('pr_emp_com_info.emp_line_id = pr_line_num.line_id');
		$this->db->where('pr_emp_per_info.emp_id = pr_emp_com_info.emp_id');
		$this->db->where('pr_emp_per_info.emp_id = pd_manual_attandence.emp_id');
		$this->db->order_by("pr_emp_com_info.emp_id");
		$this->db->group_by('pd_manual_attandence.emp_id');
		$query = $this->db->get();	
		//echo $this->db->last_query();
		if($query->num_rows > 0)
		{	
			return $query;
		}
		else
		{
			return "Soryy! Requested list is empty";
		}
	}
	function get_pd_pay_scale_sheet($emp_id,$sal_year_month)
	{
		$this->db->select('*');
		$this->db->where('emp_id', $emp_id);
		$this->db->like('salary_month', $sal_year_month);
		return $query = $this->db->get('pd_pay_scale_sheet');
		
	}
	
	function get_company_info($emp_id)
	{
		$this->db->select('*');
		$this->db->where('emp_id',$emp_id);
		return $query = $this->db->get('pr_emp_com_info');
	
	}
	function get_personal_info($emp_id)
	{
		$this->db->select('*');
		$this->db->where('emp_id',$emp_id);
		return $query = $this->db->get('pr_emp_per_info');
	
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
    	while($sCurrentDate < $sEndDate)
		{  
       		// Add a day to the current date  
       		$sCurrentDate = date("Y-m-d", strtotime("+1 day", strtotime($sCurrentDate)));  
     
       		// Add this new day to the aDays array  
        		$aDays[] = $sCurrentDate; 
			//print_r($aDays);
     	}  
     // Once the loop has finished, return the  
     return $aDays;  
   }
  	function production_monthly_salary_summary($grid_firstdate,$emp_stat)
	{
		$year_month = date('Y-m', strtotime($grid_firstdate));
		
		$sal_year_month = "$year_month-01";
		$this->db->select('sec_id');
		//$this->db->from('pr_section');
		$this->db->from('pd_pay_scale_sheet');
		//$this->db->where('pd_pay_scale_sheet.sec_id = pr_section.sec_id');
		$this->db->where("pd_pay_scale_sheet.salary_month = '$sal_year_month'");
		$this->db->group_by("pd_pay_scale_sheet.sec_id");
		$query = $this->db->get();
		
		$total_body 		= 0;
		$total_neck 		= 0;
		$total_complet		= 0;
		$total_piping		= 0;
		$total_tack			= 0;
		$total_v_neck		= 0;
		$total_placket		= 0;
		$total_b_iron		= 0;
		$total_b_re_iron	= 0;

		$total_basic_sal = 0;
		$total_pd_amount = 0;
		$total_pd_bonus_amount = 0;
		$total_holiday_allowance = 0;
		$total_night_allowance = 0;
		$total_none_work_allowance = 0;
		$total_none_work_day = 0;
		$total_att_bonus = 0;
		$total_others_allaw = 0;
		$total_gross_sal = 0;
		$total_adv_deduct = 0;
		$total_abs_deduction = 0;
		$total_stamp_deduct = 0;
		$total_gross_sal = 0;
		$total_adv_deduct = 0;
		$total_net_pay =0;
		$total_man_power = 0;
		foreach($query->result() as $rows)
		{
			
			$data['section_id'][] = $rows->sec_id;
			$section_id  = $rows->sec_id;
			
			$data['section_name'][] = $this->get_section_name($section_id);
			
			//get Man Power  count_empid_for_salary($section_id,$emp_stat,$year_month,$salary_draw_cash,$check)
			$salary_draw_cash = 1;
			$man_power = $this->count_empid_for_salary($section_id,$emp_stat,$year_month,$salary_draw_cash,"count");
			$data['man_power'][] = $man_power;
			/*$man_power = $this->db->where('sec_id',$section_id)->like('salary_month',$year_month)->get('pd_pay_scale_sheet')->num_rows();
			$data['man_power'][] = $man_power;*/
			$total_man_power = $total_man_power + $man_power;
			
			$data_emp_id = array();
			
			
			// For  Emp ID
			$emp_id = $this->count_empid_for_salary($section_id,$emp_stat,$year_month,$salary_draw_cash,"emp_id");
			foreach($emp_id as $rows)
			{
				$data_emp_id[] = $rows->emp_id;
			}
			
			$data_emp_id = implode("xxx",$data_emp_id);
			//print_r($data_emp_id);
			$pd_emp_id = explode('xxx', trim($data_emp_id));
			
			//get Basic amount
			$column_name = "basic_sal";
			$basic_sal = $this->get_section_wise_cost_sheet_data_for_summary($year_month,$section_id,$column_name,$pd_emp_id);
			$data['basic_sal'][] = $basic_sal;
			$total_basic_sal = $total_basic_sal + $basic_sal;
			
			//get Production amount
			$column_name = "pd_amount";
			$pd_amount= $this->get_section_wise_cost_sheet_data_for_summary($year_month,$section_id,$column_name,$pd_emp_id);
			$data['pd_amount'][] = $pd_amount;
			$total_pd_amount = $total_pd_amount + $pd_amount;
			
			//get Production Bonus
			$column_name = "pd_bonus_amount";
			$pd_bonus_amount = $this->get_section_wise_cost_sheet_data_for_summary($year_month,$section_id,$column_name,$pd_emp_id);
			$data['pd_bonus_amount'][] = $pd_bonus_amount;
			$total_pd_bonus_amount = $total_pd_bonus_amount + $pd_bonus_amount;
			
			//get Holiday Bonus
			$column_name = "holiday_allowance";
			$holiday_allowance = $this->get_section_wise_cost_sheet_data_for_summary($year_month,$section_id,$column_name,$pd_emp_id);
			$data['holiday_allowance'][] = $holiday_allowance;
			$total_holiday_allowance = $total_holiday_allowance + $holiday_allowance;
			
			//get Night Bonus
			$column_name = "night_allowance";
			$night_allowance = $this->get_section_wise_cost_sheet_data_for_summary($year_month,$section_id,$column_name,$pd_emp_id);
			$data['night_allowance'][] = $night_allowance;
			$total_night_allowance = $total_night_allowance + $night_allowance;
			
			//get None Work Day
			$column_name = "none_work_day";
			$none_work_day = $this->get_section_wise_cost_sheet_data_for_summary($year_month,$section_id,$column_name,$pd_emp_id);
			$data['none_work_day'][] = $none_work_day;
			$total_none_work_day = $total_none_work_day + $none_work_day;
			
			//get None Work Bonus
			$column_name = "none_work_allowance";
			$none_work_allowance = $this->get_section_wise_cost_sheet_data_for_summary($year_month,$section_id,$column_name,$pd_emp_id);
			$data['none_work_allowance'][] = $none_work_allowance;
			$total_none_work_allowance = $total_none_work_allowance + $none_work_allowance;
			
			//get Attendance Bonus
			$column_name = "att_bonus";
			$att_bonus= $this->get_section_wise_cost_sheet_data_for_summary($year_month,$section_id,$column_name,$pd_emp_id);
			$data['att_bonus'][] = $att_bonus;
			$total_att_bonus = $total_att_bonus + $att_bonus;
			
			//get Other Bonus
			$column_name = "others_allaw";
			$others_allaw = $this->get_section_wise_cost_sheet_data_for_summary($year_month,$section_id,$column_name,$pd_emp_id);
			$data['others_allaw'][] = $others_allaw;
			$total_others_allaw = $total_others_allaw + $others_allaw;
			
			//get Gross Salary
			$column_name = "gross_sal";
			$gross_sal = $this->get_section_wise_cost_sheet_data_for_summary($year_month,$section_id,$column_name,$pd_emp_id);
			$data['gross_sal'][] = $gross_sal;
			$total_gross_sal = $total_gross_sal + $gross_sal;
			
			//get adv_deduct
			$column_name = "adv_deduct";
			$adv_deduct = $this->get_section_wise_cost_sheet_data_for_summary($year_month,$section_id,$column_name,$pd_emp_id);
			$data['adv_deduct'][] = $adv_deduct;
			$total_adv_deduct = $total_adv_deduct + $adv_deduct;
			
			//get None Work Bonus
			$column_name = "abs_deduction";
			$abs_deduction = $this->get_section_wise_cost_sheet_data_for_summary($year_month,$section_id,$column_name,$pd_emp_id);
			$data['abs_deduction'][] = $abs_deduction;
			$total_abs_deduction= $total_abs_deduction + $abs_deduction;
			
			//get Attendance Bonus
			$column_name = "stamp";
			$stamp_deduct = $this->get_section_wise_cost_sheet_data_for_summary($year_month,$section_id,$column_name,$pd_emp_id);
			$data['stamp_deduct'][] = $stamp_deduct;
			$total_stamp_deduct= $total_stamp_deduct + $stamp_deduct;
			
			//get Net Pay 
			$column_name = "net";
			$net_pay = $this->get_section_wise_cost_sheet_data_for_summary($year_month,$section_id,$column_name,$pd_emp_id);
			$data['net'][] = $net_pay;
			$total_net_pay = $total_net_pay + $net_pay;
			
			
			/*$man_power = $this->db->where('sec_id',$section_id)->like('salary_month',$year_month)->get('pd_pay_scale_sheet')->num_rows();
			$data['man_power'][] = $man_power;*/
			//$total_man_power = $total_man_power + $man_power;
			
				//get body
			$column_name = "body";
			$body = $this->get_section_wise_cost_sheet_data_for_summary($year_month,$section_id,$column_name,$pd_emp_id);
			$data['body'][] = $body;
			$total_body = $total_body + $body;
			
			//get neck
			$column_name = "neck";
			$neck = $this->get_section_wise_cost_sheet_data_for_summary($year_month,$section_id,$column_name,$pd_emp_id);
			$data['neck'][] = $neck;
			$total_neck = $total_neck + $neck;
			
			//get complet
			$column_name = "complet";
			$complet = $this->get_section_wise_cost_sheet_data_for_summary($year_month,$section_id,$column_name,$pd_emp_id);
			$data['complet'][] = $complet;
			$total_complet = $total_complet + $complet;
			
			//get remending
			$column_name = "piping";
			$piping = $this->get_section_wise_cost_sheet_data_for_summary($year_month,$section_id,$column_name,$pd_emp_id);
			$data['piping'][] = $piping;
			$total_piping = $total_piping+ $piping;
			
			//get moon
			$column_name = "tack";
			$tack = $this->get_section_wise_cost_sheet_data_for_summary($year_month,$section_id,$column_name,$pd_emp_id);
			$data['tack'][] = $tack;
			$total_tack = $total_tack+ $tack;
		
			
			//get placket 
			$column_name = "placket";
			$placket = $this->get_section_wise_cost_sheet_data_for_summary($year_month,$section_id,$column_name,$pd_emp_id);
			$data['placket'][] = $placket;
			$total_placket= $total_placket + $placket;
				
			//get lbs
			$column_name = "v_neck";
			$v_neck = $this->get_section_wise_cost_sheet_data_for_summary($year_month,$section_id,$column_name,$pd_emp_id);
			$data['v_neck'][] = $v_neck;
			$total_v_neck = $total_v_neck + $v_neck;
			
			//get b_iron
			$column_name = "b_iron";
			$b_iron = $this->get_section_wise_cost_sheet_data_for_summary($year_month,$section_id,$column_name,$pd_emp_id);
			$data['b_iron'][] = $b_iron;
			$total_b_iron = $total_b_iron + $b_iron;
			
			//get b_re_iron
			$column_name = "b_re_iron";
			$b_re_iron = $this->get_section_wise_cost_sheet_data_for_summary($year_month,$section_id,$column_name,$pd_emp_id);
			$data['b_re_iron'][] = $b_re_iron;
			$total_b_re_iron = $total_b_re_iron + $b_re_iron;
			
		}
		
		$data['total_basic_sal'] 			= $total_basic_sal;
		$data['total_pd_amount'] 			= $total_pd_amount;
		$data['total_pd_bonus_amount'] 		= $total_pd_bonus_amount;
		$data['total_holiday_allowance'] 	= $total_holiday_allowance;
		$data['total_night_allowance'] 		= $total_night_allowance;
		
		$data['total_none_work_day'] 		= $total_none_work_day;
		$data['total_none_work_allowance'] 	= $total_none_work_allowance;
		
		$data['total_att_bonus'] 			= $total_att_bonus;
		$data['total_others_allaw'] 		= $total_others_allaw;
		$data['total_gross_sal'] 			= $total_gross_sal;
		$data['total_adv_deduct'] 			= $total_adv_deduct;
		$data['total_abs_deduction'] 		= $total_abs_deduction;
		$data['total_stamp_deduct'] 		= $total_stamp_deduct;
		$data['total_net_pay'] 				= $total_net_pay;
		$data['total_man_power'] 			= $total_man_power;
		//print_r($data);
		return $data;
		
	} 
	
	 function factory_production_monthly_salary_summary($grid_firstdate,$prev_salary_month,$emp_stat)
	{
		$year_month = date('Y-m', strtotime($grid_firstdate));
		
		$sal_year_month = "$year_month-01";
		$this->db->select('sec_id');
		$this->db->from('pd_pay_scale_sheet');
		$this->db->where("pd_pay_scale_sheet.salary_month = '$sal_year_month'");
		$this->db->or_where("pd_pay_scale_sheet.salary_month = '$prev_salary_month'");
		$this->db->group_by("pd_pay_scale_sheet.sec_id");
		$query = $this->db->get();
		
		
		$total_body 		= 0;
		$total_neck 		= 0;
		$total_complet		= 0;
		$total_piping		= 0;
		$total_tack			= 0;
		$total_v_neck		= 0;
		$total_b_iron		= 0;
		$total_b_re_iron	= 0;
		$total_placket		= 0;
		
		$total_basic_sal = 0;
		$total_pd_amount = 0;
		$total_pd_bonus_amount = 0;
		$total_holiday_allowance = 0;
		$total_night_allowance = 0;
		$total_none_work_allowance = 0;
		$total_none_work_day = 0;
		$total_att_bonus = 0;
		$total_others_allaw = 0;
		$total_gross_sal = 0;
		$total_adv_deduct = 0;
		$total_abs_deduction = 0;
		$total_stamp_deduct = 0;
		$total_gross_sal = 0;
		$total_adv_deduct = 0;
		$total_net_pay =0;
		$total_man_power = 0;
		foreach($query->result() as $rows)
		{
			
			$data['section_id'][] = $rows->sec_id;
			$section_id = $rows->sec_id;
			
			$data['section_name'][] = $this->get_section_name($section_id);
			
			//get Man Power  count_empid_for_salary($section_id,$emp_stat,$year_month,$salary_draw_cash,$check)
			$salary_draw_cash = 1;
			$man_power = $this->count_empid_for_salary($section_id,$emp_stat,$year_month,$salary_draw_cash,"count");
			$data['man_power'][] = $man_power;
			/*$man_power = $this->db->where('sec_id',$section_id)->like('salary_month',$year_month)->get('pd_pay_scale_sheet')->num_rows();
			$data['man_power'][] = $man_power;*/
			$total_man_power = $total_man_power + $man_power;
			
			$data_emp_id = array();
			
			
			// For  Emp ID
			$emp_id = $this->count_empid_for_salary($section_id,$emp_stat,$year_month,$salary_draw_cash,"emp_id");
			foreach($emp_id as $rows)
			{
				$data_emp_id[] = $rows->emp_id;
			}
			
			$data_emp_id = implode("xxx",$data_emp_id);
			//print_r($data_emp_id);
			$pd_emp_id = explode('xxx', trim($data_emp_id));
			
			//get Basic amount
			$column_name = "basic_sal";
			$basic_sal = $this->get_section_wise_cost_sheet_data_for_summary($year_month,$section_id,$column_name,$pd_emp_id);
			$data['basic_sal'][] = $basic_sal;
			$total_basic_sal = $total_basic_sal + $basic_sal;
			
			//get Production amount
			$column_name = "pd_amount";
			$pd_amount= $this->get_section_wise_cost_sheet_data_for_summary($year_month,$section_id,$column_name,$pd_emp_id);
			$data['pd_amount'][] = $pd_amount;
			$total_pd_amount = $total_pd_amount + $pd_amount;
			
			//get Production Bonus
			$column_name = "pd_bonus_amount";
			$pd_bonus_amount = $this->get_section_wise_cost_sheet_data_for_summary($year_month,$section_id,$column_name,$pd_emp_id);
			$data['pd_bonus_amount'][] = $pd_bonus_amount;
			$total_pd_bonus_amount = $total_pd_bonus_amount + $pd_bonus_amount;
			
			//get Holiday Bonus
			$column_name = "holiday_allowance";
			$holiday_allowance = $this->get_section_wise_cost_sheet_data_for_summary($year_month,$section_id,$column_name,$pd_emp_id);
			$data['holiday_allowance'][] = $holiday_allowance;
			$total_holiday_allowance = $total_holiday_allowance + $holiday_allowance;
			
			//get Night Bonus
			$column_name = "night_allowance";
			$night_allowance = $this->get_section_wise_cost_sheet_data_for_summary($year_month,$section_id,$column_name,$pd_emp_id);
			$data['night_allowance'][] = $night_allowance;
			$total_night_allowance = $total_night_allowance + $night_allowance;
			
			//get None Work Day
			$column_name = "none_work_day";
			$none_work_day = $this->get_section_wise_cost_sheet_data_for_summary($year_month,$section_id,$column_name,$pd_emp_id);
			$data['none_work_day'][] = $none_work_day;
			$total_none_work_day = $total_none_work_day + $none_work_day;
			
			//get None Work Bonus
			$column_name = "none_work_allowance";
			$none_work_allowance = $this->get_section_wise_cost_sheet_data_for_summary($year_month,$section_id,$column_name,$pd_emp_id);
			$data['none_work_allowance'][] = $none_work_allowance;
			$total_none_work_allowance = $total_none_work_allowance + $none_work_allowance;
			
			//get Attendance Bonus
			$column_name = "att_bonus";
			$att_bonus= $this->get_section_wise_cost_sheet_data_for_summary($year_month,$section_id,$column_name,$pd_emp_id);
			$data['att_bonus'][] = $att_bonus;
			$total_att_bonus = $total_att_bonus + $att_bonus;
			
			//get Other Bonus
			$column_name = "others_allaw";
			$others_allaw = $this->get_section_wise_cost_sheet_data_for_summary($year_month,$section_id,$column_name,$pd_emp_id);
			$data['others_allaw'][] = $others_allaw;
			$total_others_allaw = $total_others_allaw + $others_allaw;
			
			//get Gross Salary
			$column_name = "gross_sal";
			$gross_sal = $this->get_section_wise_cost_sheet_data_for_summary($year_month,$section_id,$column_name,$pd_emp_id);
			$data['gross_sal'][] = $gross_sal;
			$total_gross_sal = $total_gross_sal + $gross_sal;
			
			//get adv_deduct
			$column_name = "adv_deduct";
			$adv_deduct = $this->get_section_wise_cost_sheet_data_for_summary($year_month,$section_id,$column_name,$pd_emp_id);
			$data['adv_deduct'][] = $adv_deduct;
			$total_adv_deduct = $total_adv_deduct + $adv_deduct;
			
			//get None Work Bonus
			$column_name = "abs_deduction";
			$abs_deduction = $this->get_section_wise_cost_sheet_data_for_summary($year_month,$section_id,$column_name,$pd_emp_id);
			$data['abs_deduction'][] = $abs_deduction;
			$total_abs_deduction= $total_abs_deduction + $abs_deduction;
			
			//get Attendance Bonus
			$column_name = "stamp";
			$stamp_deduct = $this->get_section_wise_cost_sheet_data_for_summary($year_month,$section_id,$column_name,$pd_emp_id);
			$data['stamp_deduct'][] = $stamp_deduct;
			$total_stamp_deduct= $total_stamp_deduct + $stamp_deduct;
			
			//get Net Pay 
			$column_name = "net";
			$net_pay = $this->get_section_wise_cost_sheet_data_for_summary($year_month,$section_id,$column_name,$pd_emp_id);
			$data['net'][] = $net_pay;
			$total_net_pay = $total_net_pay + $net_pay;
			
			
			/*$man_power = $this->db->where('sec_id',$section_id)->like('salary_month',$year_month)->get('pd_pay_scale_sheet')->num_rows();
			$data['man_power'][] = $man_power;*/
			//$total_man_power = $total_man_power + $man_power;
			
				//get body
			$column_name = "body";
			$body = $this->get_section_wise_cost_sheet_data_for_summary($year_month,$section_id,$column_name,$pd_emp_id);
			$data['body'][] = $body;
			$total_body = $total_body + $body;
			
			//get neck
			$column_name = "neck";
			$neck = $this->get_section_wise_cost_sheet_data_for_summary($year_month,$section_id,$column_name,$pd_emp_id);
			$data['neck'][] = $neck;
			$total_neck = $total_neck + $neck;
			
			//get complet
			$column_name = "complet";
			$complet = $this->get_section_wise_cost_sheet_data_for_summary($year_month,$section_id,$column_name,$pd_emp_id);
			$data['complet'][] = $complet;
			$total_complet = $total_complet + $complet;
			
			//get remending
			$column_name = "piping";
			$piping = $this->get_section_wise_cost_sheet_data_for_summary($year_month,$section_id,$column_name,$pd_emp_id);
			$data['piping'][] = $piping;
			$total_piping = $total_piping+ $piping;
			
			//get moon
			$column_name = "tack";
			$tack = $this->get_section_wise_cost_sheet_data_for_summary($year_month,$section_id,$column_name,$pd_emp_id);
			$data['tack'][] = $tack;
			$total_tack = $total_tack+ $tack;
		
			
			//get placket 
			$column_name = "placket";
			$placket = $this->get_section_wise_cost_sheet_data_for_summary($year_month,$section_id,$column_name,$pd_emp_id);
			$data['placket'][] = $placket;
			$total_placket= $total_placket + $placket;
				
			//get lbs
			$column_name = "v_neck";
			$v_neck = $this->get_section_wise_cost_sheet_data_for_summary($year_month,$section_id,$column_name,$pd_emp_id);
			$data['v_neck'][] = $v_neck;
			$total_v_neck = $total_v_neck + $v_neck;
			
		}
		
		$data['total_basic_sal'] 			= $total_basic_sal;
		$data['total_pd_amount'] 			= $total_pd_amount;
		$data['total_pd_bonus_amount'] 		= $total_pd_bonus_amount;
		$data['total_holiday_allowance'] 	= $total_holiday_allowance;
		$data['total_night_allowance'] 		= $total_night_allowance;
		
		$data['total_none_work_day'] 		= $total_none_work_day;
		$data['total_none_work_allowance'] 	= $total_none_work_allowance;
		
		$data['total_att_bonus'] 			= $total_att_bonus;
		$data['total_others_allaw'] 		= $total_others_allaw;
		$data['total_gross_sal'] 			= $total_gross_sal;
		$data['total_adv_deduct'] 			= $total_adv_deduct;
		$data['total_abs_deduction'] 		= $total_abs_deduction;
		$data['total_stamp_deduct'] 		= $total_stamp_deduct;
		$data['total_net_pay'] 				= $total_net_pay;
		$data['total_man_power'] 			= $total_man_power;
		//print_r($data);
		return $data;
		
	} 
	
	
	
	
	
	function production_monthly_block_wise_salary_summary($grid_firstdate,$emp_stat,$grid_section,$grid_floor)
	{
		$year_month = date('Y-m', strtotime($grid_firstdate));
		
		//$section = array(1,2,3,4,5);
		$this->db->select('*');
		$query = $this->db->get("pr_line_num");
		foreach($query->result() as $rows)
		{
			//$section = array();
			$block[] = $rows->line_id;
		}
		
		$total_pd_amount = 0;
		$total_pd_bonus_amount = 0;
		
		$total_holiday_allowance = 0;
		$total_holiday_allowance_no = 0;
		
		$total_night_allowance = 0;
		$total_night_allowance_no = 0;
		$total_adv_deduct 	= 0;
		$total_none_work_allowance = 0;
		$total_att_bonus = 0;
		$total_att_bonus_no = 0;
		
		$total_stamp_deduct =0;
		$total_net_pay =0;
		$total_man_power = 0;
		$total_none_work_day = 0;
		
		$total_body 		= 0;
		$total_neck 		= 0;
		$total_complet		= 0;
		$total_piping		= 0;
		$total_tack			= 0;
		$total_v_neck		= 0;
		$total_placket		= 0;
		foreach($block as $block_id)
		{
			
			$data['block_id'][] = $block_id;
			
			$data['block_name'][] = $this->get_block_name($block_id);
		
			//get Man Power  count_empid_for_salary($section_id,$emp_stat,$year_month,$salary_draw_cash,$check)
			$salary_draw_cash = 1;
			$man_power = $this->count_empid_for_block_wise_salary($grid_section,$grid_floor,$block_id,$emp_stat,$year_month,$salary_draw_cash,"count");
			$data['man_power'][] = $man_power;
			/*$man_power = $this->db->where('sec_id',$section_id)->like('salary_month',$year_month)->get('pd_pay_scale_sheet')->num_rows();
			$data['man_power'][] = $man_power;*/
			$total_man_power = $total_man_power + $man_power;
			
			$data_emp_id = array();
			
			
			// For  Emp ID
			$emp_id = $this->count_empid_for_block_wise_salary($grid_section,$grid_floor,$block_id,$emp_stat,$year_month,$salary_draw_cash,"emp_id");
			foreach($emp_id as $rows)
			{
				$data_emp_id[] = $rows->emp_id;
			}
			
			$data_emp_id = implode("xxx",$data_emp_id);
			//print_r($data_emp_id);
			$pd_emp_id = explode('xxx', trim($data_emp_id));
			
			
			
			
			//get Production amount
			$column_name = "pd_amount";
			$pd_amount= $this->get_block_wise_cost_sheet_data($year_month,$column_name,$pd_emp_id);
			$data['pd_amount'][] = $pd_amount;
			$total_pd_amount = $total_pd_amount + $pd_amount;
			
			//get Production Bonus
			$column_name = "pd_bonus_amount";
			$pd_bonus_amount = $this->get_block_wise_cost_sheet_data($year_month,$column_name,$pd_emp_id);
			$data['pd_bonus_amount'][] = $pd_bonus_amount;
			$total_pd_bonus_amount = $total_pd_bonus_amount + $pd_bonus_amount;
			
			//get Holiday Bonus
			$column_name = "holiday_allowance_no";
			$holiday_allowance_no = $this->get_block_wise_cost_sheet_data($year_month,$column_name,$pd_emp_id);
			$data['holiday_allowance_no'][] = $holiday_allowance_no;
			$total_holiday_allowance_no = $total_holiday_allowance_no + $holiday_allowance_no;
			
			//get Holiday Bonus
			$column_name = "holiday_allowance";
			$holiday_allowance = $this->get_block_wise_cost_sheet_data($year_month,$column_name,$pd_emp_id);
			$data['holiday_allowance'][] = $holiday_allowance;
			$total_holiday_allowance = $total_holiday_allowance + $holiday_allowance;
			
			//get Night Allowance No
			$column_name = "night_allowance_no";
			$night_allowance_no = $this->get_block_wise_cost_sheet_data($year_month,$column_name,$pd_emp_id);
			$data['night_allowance_no'][] = $night_allowance_no;
			$total_night_allowance_no = $total_night_allowance_no + $night_allowance_no;
			
			//get Night Allowance
			$column_name = "night_allowance";
			$night_allowance = $this->get_block_wise_cost_sheet_data($year_month,$column_name,$pd_emp_id);
			$data['night_allowance'][] = $night_allowance;
			$total_night_allowance = $total_night_allowance + $night_allowance;
			
			//get None Work Day
			$column_name = "none_work_day";
			$none_work_day = $this->get_block_wise_cost_sheet_data($year_month,$column_name,$pd_emp_id);
			$data['none_work_day'][] = $none_work_day;
			$total_none_work_day = $total_none_work_day + $none_work_day;
			
			//get adv_deduct
			$column_name = "adv_deduct";
			$adv_deduct = $this->get_block_wise_cost_sheet_data($year_month,$column_name,$pd_emp_id);
			$data['adv_deduct'][] = $adv_deduct;
			$total_adv_deduct = $total_adv_deduct + $adv_deduct;
			
			//get None Work Bonus
			$column_name = "none_work_allowance";
			$none_work_allowance = $this->get_block_wise_cost_sheet_data($year_month,$column_name,$pd_emp_id);
			$data['none_work_allowance'][] = $none_work_allowance;
			$total_none_work_allowance = $total_none_work_allowance + $none_work_allowance;
			
			//get Attendance Bonus
			$column_name = "att_bonus";
			$att_bonus= $this->get_block_wise_cost_sheet_data($year_month,$column_name,$pd_emp_id);
			$data['att_bonus'][] = $att_bonus;
			$total_att_bonus = $total_att_bonus + $att_bonus;
			
			//get Attendance Bonus
			$column_name = "att_bonus_no";
			$att_bonus_no= $this->get_block_wise_cost_sheet_data_att_bonus_no($year_month,$column_name,$pd_emp_id);
			$data['att_bonus_no'][] = $att_bonus_no;
			$total_att_bonus_no = $total_att_bonus_no + $att_bonus_no;
			
			//get Attendance Bonus
			$column_name = "stamp";
			$stamp_deduct = $this->get_block_wise_cost_sheet_data($year_month,$column_name,$pd_emp_id);
			$data['stamp_deduct'][] = $stamp_deduct;
			$total_stamp_deduct= $total_stamp_deduct + $stamp_deduct;
			
			//get Net Pay 
			$column_name = "net";
			$net_pay = $this->get_block_wise_cost_sheet_data($year_month,$column_name,$pd_emp_id);
			$data['net'][] = $net_pay;
			$total_net_pay = $total_net_pay + $net_pay;
			
			
		
			
			
			//get body
			$column_name = "body";
			$body = $this->get_block_wise_cost_sheet_data($year_month,$column_name,$pd_emp_id);
			$data['body'][] = $body;
			$total_body = $total_body + $body;
			
			//get neck
			$column_name = "neck";
			$neck = $this->get_block_wise_cost_sheet_data($year_month,$column_name,$pd_emp_id);
			$data['neck'][] = $neck;
			$total_neck = $total_neck + $neck;
			
			//get complet
			$column_name = "complet";
			$complet = $this->get_block_wise_cost_sheet_data($year_month,$column_name,$pd_emp_id);
			$data['complet'][] = $complet;
			$total_complet = $total_complet + $complet;
			
			//get remending
			$column_name = "piping";
			$piping = $this->get_block_wise_cost_sheet_data($year_month,$column_name,$pd_emp_id);
			$data['piping'][] = $piping;
			$total_piping = $total_piping+ $piping;
			
			//get moon
			$column_name = "tack";
			$tack = $this->get_block_wise_cost_sheet_data($year_month,$column_name,$pd_emp_id);
			$data['tack'][] = $tack;
			$total_tack = $total_tack+ $tack;
		
			
			//get placket 
			$column_name = "placket";
			$placket = $this->get_block_wise_cost_sheet_data($year_month,$column_name,$pd_emp_id);
			$data['placket'][] = $placket;
			$total_placket= $total_placket + $placket;
			
				
			//get lbs
			$column_name = "v_neck";
			$v_neck = $this->get_block_wise_cost_sheet_data($year_month,$column_name,$pd_emp_id);
			$data['v_neck'][] = $v_neck;
			$total_v_neck = $total_v_neck + $v_neck;
			
		}
		
		$data['total_pd_amount'] 			= $total_pd_amount;
		$data['total_pd_bonus_amount'] 		= $total_pd_bonus_amount;
		
		$data['total_holiday_allowance_no'] = $total_holiday_allowance_no;
		$data['total_holiday_allowance'] 	= $total_holiday_allowance;
		
		$data['total_night_allowance_no'] 	= $total_night_allowance_no;
		$data['total_night_allowance'] 		= $total_night_allowance;
		
		$data['total_none_work_day'] 		= $total_none_work_day;
		$data['total_none_work_allowance'] 	= $total_none_work_allowance;
		
		$data['total_att_bonus'] 			= $total_att_bonus;
		$data['total_att_bonus_no'] 		= $total_att_bonus_no;
		
		$data['total_stamp_deduct'] 		= $total_stamp_deduct;
		$data['total_net_pay'] 				= $total_net_pay;
		$data['total_man_power'] 			= $total_man_power;
		$data['total_adv_deduct']			= $total_adv_deduct;
		//print_r($data);
		return $data;
		
	}
	function production_monthly_floor_wise_salary_summary($grid_firstdate,$emp_stat,$grid_section)
	{
		$year_month = date('Y-m', strtotime($grid_firstdate));
		
		//$section = array(1,2,3,4,5);
		$this->db->select('*');
		$query = $this->db->get("pr_emp_position");
		foreach($query->result() as $rows)
		{
			//$section = array();
			$floor[] = $rows->posi_id;
		}
		
		$total_pd_amount = 0;
		$total_pd_bonus_amount = 0;
		
		$total_holiday_allowance = 0;
		$total_holiday_allowance_no = 0;
		
		$total_night_allowance = 0;
		$total_night_allowance_no = 0;
		
		$total_none_work_allowance = 0;
		$total_att_bonus = 0;
		$total_att_bonus_no = 0;
		$total_adv_deduct = 0;
		$total_stamp_deduct =0;
		$total_net_pay =0;
		$total_none_work_day = 0;
		
		$total_body 		= 0;
		$total_neck 		= 0;
		$total_complet		= 0;
		$total_piping		= 0;
		$total_tack			= 0;
		$total_v_neck		= 0;
		$total_placket		= 0;
		
		
		$total_man_power = 0;
		foreach($floor as $floor_id)
		{
			
			$data['floor_id'][] = $floor_id;
			
			$data['floor_name'][] = $this->get_floor_name($floor_id);
		
			
			//get Man Power  count_empid_for_salary($section_id,$emp_stat,$year_month,$salary_draw_cash,$check)
			$salary_draw_cash = 1;
			$man_power = $this->count_empid_for_floor_wise_salary($grid_section,$floor_id,$emp_stat,$year_month,$salary_draw_cash,"count");
			$data['man_power'][] = $man_power;
			/*$man_power = $this->db->where('sec_id',$section_id)->like('salary_month',$year_month)->get('pd_pay_scale_sheet')->num_rows();
			$data['man_power'][] = $man_power;*/
			$total_man_power = $total_man_power + $man_power;
			
			$data_emp_id = array();
			
			// For  Emp ID
			$emp_id = $this->count_empid_for_floor_wise_salary($grid_section,$floor_id,$emp_stat,$year_month,$salary_draw_cash,"emp_id");
			foreach($emp_id as $rows)
			{
				$data_emp_id[] = $rows->emp_id;
			}
			
			$data_emp_id = implode("xxx",$data_emp_id);
			//print_r($data_emp_id);
			$pd_emp_id = explode('xxx', trim($data_emp_id));
			
			
			//get Production amount
			$column_name = "pd_amount";
			$pd_amount= $this->get_floor_wise_cost_sheet_data($year_month,$column_name,$pd_emp_id);
			$data['pd_amount'][] = $pd_amount;
			$total_pd_amount = $total_pd_amount + $pd_amount;
			
			//get Production Bonus
			$column_name = "pd_bonus_amount";
			$pd_bonus_amount = $this->get_floor_wise_cost_sheet_data($year_month,$column_name,$pd_emp_id);
			$data['pd_bonus_amount'][] = $pd_bonus_amount;
			$total_pd_bonus_amount = $total_pd_bonus_amount + $pd_bonus_amount;
			
			//get Holiday Bonus
			$column_name = "holiday_allowance_no";
			$holiday_allowance_no = $this->get_floor_wise_cost_sheet_data($year_month,$column_name,$pd_emp_id);
			$data['holiday_allowance_no'][] = $holiday_allowance_no;
			$total_holiday_allowance_no = $total_holiday_allowance_no + $holiday_allowance_no;
			
			//get Holiday Bonus
			$column_name = "holiday_allowance";
			$holiday_allowance = $this->get_floor_wise_cost_sheet_data($year_month,$column_name,$pd_emp_id);
			$data['holiday_allowance'][] = $holiday_allowance;
			$total_holiday_allowance = $total_holiday_allowance + $holiday_allowance;
			
			//get Night Allowance No
			$column_name = "night_allowance_no";
			$night_allowance_no = $this->get_floor_wise_cost_sheet_data($year_month,$column_name,$pd_emp_id);
			$data['night_allowance_no'][] = $night_allowance_no;
			$total_night_allowance_no = $total_night_allowance_no + $night_allowance_no;
			
			//get Night Allowance
			$column_name = "night_allowance";
			$night_allowance = $this->get_floor_wise_cost_sheet_data($year_month,$column_name,$pd_emp_id);
			$data['night_allowance'][] = $night_allowance;
			$total_night_allowance = $total_night_allowance + $night_allowance;
			
			
			//get None Work Day
			$column_name = "none_work_day";
			$none_work_day = $this->get_block_wise_cost_sheet_data($year_month,$column_name,$pd_emp_id);
			$data['none_work_day'][] = $none_work_day;
			$total_none_work_day = $total_none_work_day + $none_work_day;
			
			
			//get None Work Bonus
			$column_name = "none_work_allowance";
			$none_work_allowance = $this->get_floor_wise_cost_sheet_data($year_month,$column_name,$pd_emp_id);
			$data['none_work_allowance'][] = $none_work_allowance;
			$total_none_work_allowance = $total_none_work_allowance + $none_work_allowance;
			
			//get Attendance Bonus
			$column_name = "att_bonus";
			$att_bonus= $this->get_floor_wise_cost_sheet_data($year_month,$column_name,$pd_emp_id);
			$data['att_bonus'][] = $att_bonus;
			$total_att_bonus = $total_att_bonus + $att_bonus;
			
			//get Attendance Bonus
			$column_name = "att_bonus_no";
			$att_bonus_no= $this->get_floor_wise_cost_sheet_data_att_bonus_no($year_month,$column_name,$pd_emp_id);
			$data['att_bonus_no'][] = $att_bonus_no;
			$total_att_bonus_no = $total_att_bonus_no + $att_bonus_no;
			
			
			//get Attendance Bonus
			$column_name = "adv_deduct";
			$adv_deduct = $this->get_floor_wise_cost_sheet_data($year_month,$column_name,$pd_emp_id);
			$data['adv_deduct'][] = $adv_deduct;
			$total_adv_deduct= $total_adv_deduct + $adv_deduct;
			
			//get Stamp
			$column_name = "stamp";
			$stamp_deduct = $this->get_floor_wise_cost_sheet_data($year_month,$column_name,$pd_emp_id);
			$data['stamp_deduct'][] = $stamp_deduct;
			$total_stamp_deduct= $total_stamp_deduct + $stamp_deduct;
			
			//get Net Pay 
			$column_name = "net";
			$net_pay = $this->get_floor_wise_cost_sheet_data($year_month,$column_name,$pd_emp_id);
			$data['net'][] = $net_pay;
			$total_net_pay = $total_net_pay + $net_pay;
			
			//get body
			$column_name = "body";
			$body = $this->get_floor_wise_cost_sheet_data($year_month,$column_name,$pd_emp_id);
			$data['body'][] = $body;
			$total_body = $total_body + $body;
			
			//get neck
			$column_name = "neck";
			$neck = $this->get_floor_wise_cost_sheet_data($year_month,$column_name,$pd_emp_id);
			$data['neck'][] = $neck;
			$total_neck = $total_neck + $neck;
			
			//get complet
			$column_name = "complet";
			$complet = $this->get_floor_wise_cost_sheet_data($year_month,$column_name,$pd_emp_id);
			$data['complet'][] = $complet;
			$total_complet = $total_complet + $complet;
			
			//get remending
			$column_name = "piping";
			$piping = $this->get_floor_wise_cost_sheet_data($year_month,$column_name,$pd_emp_id);
			$data['piping'][] = $piping;
			$total_piping = $total_piping+ $piping;
			
			//get moon
			$column_name = "tack";
			$tack = $this->get_floor_wise_cost_sheet_data($year_month,$column_name,$pd_emp_id);
			$data['tack'][] = $tack;
			$total_tack = $total_tack+ $tack;
		
			
			//get placket 
			$column_name = "placket";
			$placket = $this->get_floor_wise_cost_sheet_data($year_month,$column_name,$pd_emp_id);
			$data['placket'][] = $placket;
			$total_placket= $total_placket + $placket;
			
				
			//get lbs
			$column_name = "v_neck";
			$v_neck = $this->get_floor_wise_cost_sheet_data($year_month,$column_name,$pd_emp_id);
			$data['v_neck'][] = $v_neck;
			$total_v_neck = $total_v_neck + $v_neck;
			
			
			
		}
		
		$data['total_pd_amount'] 			= $total_pd_amount;
		$data['total_pd_bonus_amount'] 		= $total_pd_bonus_amount;
		
		$data['total_holiday_allowance_no'] = $total_holiday_allowance_no;
		$data['total_holiday_allowance'] 	= $total_holiday_allowance;
		
		$data['total_night_allowance_no'] 	= $total_night_allowance_no;
		$data['total_night_allowance'] 		= $total_night_allowance;
		
		$data['total_none_work_day'] 		= $total_none_work_day;
		$data['total_none_work_allowance'] 	= $total_none_work_allowance;
		$data['total_att_bonus'] 			= $total_att_bonus;
		$data['total_att_bonus_no'] 		= $total_att_bonus_no;
		
		
		$data['total_adv_deduct']			= $total_adv_deduct;
		$data['total_stamp_deduct'] 		= $total_stamp_deduct;
		$data['total_net_pay'] 				= $total_net_pay;
		
		
		/*$data['total_body'] 				= $total_body;
		$data['total_neck'] 				= $total_neck;
		$data['total_complet'] 				= $total_complet;
		$data['total_remending'] 			= $total_remending;
		$data['total_moon'] 				= $total_moon;
		$data['total_lbs'] 					= $total_lbs;
		$data['total_placket'] 				= $total_placket;*/
		
		
		$data['total_man_power'] 			= $total_man_power;
		//print_r($data);
		return $data;
		
	}
   function count_empid_for_salary($dept_id,$status,$salary_month,$salary_draw,$check)
	 {
		//secho $salary_draw;
		
		$salary_month = substr($salary_month,0,7);
		$sal_year_month = "$salary_month-01";
		$probation_period = $this->common_model->get_setup_attributes(10);
		$prev_prob_month = $this->common_model->get_prev_month($probation_period,$salary_month);
		if($status == "ALL")
		{
			$get_left_emp 	= $this->common_model->get_left_emp_all_sts($salary_month);
			$get_resign_emp = $this->common_model->get_resign_emp_all_sts($salary_month);	
		}
		else
		{
			$get_left_emp = $this->common_model->get_left_emp($salary_month);
			$get_resign_emp = $this->common_model->get_resign_emp($salary_month);
		}
		$this->db->select('pr_emp_per_info.*');
		$this->db->where("pr_emp_com_info.emp_sec_id", $dept_id );
		$this->db->where("pr_emp_com_info.salary_draw",$salary_draw);
		
		if($status == 1 )
		{
			
			$this->db->from('pr_emp_com_info');
			$this->db->from('pr_emp_per_info');
			$this->db->from('pd_pay_scale_sheet');
			$this->db->where('pr_emp_per_info.emp_id = pr_emp_com_info.emp_id');
			$this->db->where('pr_emp_per_info.emp_id = pd_pay_scale_sheet.emp_id');
			$this->db->where("trim(substr(pr_emp_com_info.emp_join_date,1,7)) < '$prev_prob_month'");
			$this->db->where("trim(substr(pr_emp_com_info.emp_join_date,1,7)) <= '$salary_month'");
			
			$this->db->where("pd_pay_scale_sheet.salary_month = '$sal_year_month'");
			$this->db->where_not_in('pr_emp_com_info.emp_id',$get_left_emp);
			$this->db->where_not_in('pr_emp_com_info.emp_id',$get_resign_emp);
		}
		
		if($status == 2)
		{
			$this->db->from('pr_emp_com_info');
			$this->db->from('pr_emp_per_info');
			$this->db->where('pr_emp_per_info.emp_id = pr_emp_com_info.emp_id');
			$this->db->where("trim(substr(pr_emp_com_info.emp_join_date,1,7)) <= '$salary_month'");
			$this->db->where("trim(substr(pr_emp_com_info.emp_join_date,1,7)) >= '$prev_prob_month'");
			$this->db->where_not_in('pr_emp_com_info.emp_id',$get_left_emp);
			$this->db->where_not_in('pr_emp_com_info.emp_id',$get_resign_emp);
		}
		
		if($status == 3)
		{
			$this->db->from('pr_emp_left_history');
			$this->db->from('pr_emp_com_info');
			$this->db->from('pr_emp_per_info');
			$this->db->where('pr_emp_com_info.emp_id = pr_emp_per_info.emp_id');
			$this->db->where('pr_emp_per_info.emp_id = pr_emp_left_history.emp_id');
			$this->db->where("trim(substr(pr_emp_left_history.left_date,1,7)) = '$salary_month'");
			
		}
		
		if($status == 4)
		{
			$this->db->from('pr_emp_resign_history');
			$this->db->from('pr_emp_per_info');
			$this->db->from('pr_emp_com_info');
			$this->db->where('pr_emp_com_info.emp_id = pr_emp_per_info.emp_id');
			$this->db->where('pr_emp_per_info.emp_id = pr_emp_resign_history.emp_id');
			$this->db->where("trim(substr(pr_emp_resign_history.resign_date,1,7)) = '$salary_month'");
		}
		
		if($status == "ALL")
		{
			$this->db->from('pr_emp_com_info');
			$this->db->from('pr_emp_per_info');
			$this->db->from('pd_pay_scale_sheet');
			$this->db->where('pr_emp_per_info.emp_id = pr_emp_com_info.emp_id');
			$this->db->where('pr_emp_per_info.emp_id = pd_pay_scale_sheet.emp_id');
			$this->db->where("pd_pay_scale_sheet.salary_month = '$sal_year_month'");
			$this->db->where("trim(substr(pr_emp_com_info.emp_join_date,1,7)) <= '$salary_month'");
			
			$this->db->where_not_in('pr_emp_com_info.emp_id',$get_left_emp);
			$this->db->where_not_in('pr_emp_com_info.emp_id',$get_resign_emp);
		}
		
		
		$query = $this->db->get();
		//return $query;
		if($check == "count")
		{
			return $query->num_rows();
		}
		//echo $this->db->last_query()."====";
		return $query->result();
	 }
	 function count_empid_for_floor_wise_salary($section_id,$floor_id,$status,$salary_month,$salary_draw,$check)
	 {
		$probation_period 	= $this->common_model->get_setup_attributes(10);
		$prev_prob_month 	= $this->common_model->get_prev_month($probation_period,$salary_month);
		$get_left_emp 		= $this->common_model->get_left_emp($salary_month);
		$get_resign_emp 	= $this->common_model->get_resign_emp($salary_month);
		$sal_year_month = "$salary_month-01";
		if($status == 1)// For Regular
		{
			$this->db->select('pr_emp_per_info.*');
			$this->db->from('pr_emp_com_info');
			$this->db->from('pr_emp_per_info');
			$this->db->from('pd_pay_scale_sheet');
			$this->db->where('pr_emp_per_info.emp_id = pr_emp_com_info.emp_id');
			$this->db->where('pr_emp_per_info.emp_id = pd_pay_scale_sheet.emp_id');
			$this->db->where("pd_pay_scale_sheet.salary_month = '$sal_year_month'");
			if($section_id !="Select")
			{
				$this->db->where("pd_pay_scale_sheet.sec_id", $section_id);
			}
			if($floor_id !="Select")
			{
				$this->db->where("pd_pay_scale_sheet.floor_id", $floor_id);
			}
			
			$this->db->where("trim(substr(pr_emp_com_info.emp_join_date,1,7)) < '$prev_prob_month'");
			$this->db->where("trim(substr(pr_emp_com_info.emp_join_date,1,7)) <= '$salary_month'");
			$this->db->where_not_in('pr_emp_com_info.emp_id',$get_left_emp);
			$this->db->where_not_in('pr_emp_com_info.emp_id',$get_resign_emp);
		}
		if($status == 2)//For New
		{
			$this->db->select('pr_emp_per_info.*');
			$this->db->from('pr_emp_com_info');
			$this->db->from('pr_emp_per_info');
			$this->db->where('pr_emp_per_info.emp_id = pr_emp_com_info.emp_id');
			if($section_id !="Select")
			{
				$this->db->where("pd_pay_scale_sheet.sec_id", $section_id);
			}
			if($floor_id !="Select")
			{
				$this->db->where("pd_pay_scale_sheet.floor_id", $floor_id);
			}
			$this->db->where("trim(substr(pr_emp_com_info.emp_join_date,1,7)) <= '$salary_month'");
			$this->db->where("trim(substr(pr_emp_com_info.emp_join_date,1,7)) >= '$prev_prob_month'");
			$this->db->where_not_in('pr_emp_com_info.emp_id',$get_left_emp);
			$this->db->where_not_in('pr_emp_com_info.emp_id',$get_resign_emp);
		}
		if($status == 3)//For Left
		{
		  $this->db->select('pr_emp_per_info.*');
		  $this->db->from('pr_emp_left_history');
		  $this->db->from('pr_emp_com_info');
		  $this->db->from('pr_emp_per_info');
		  $this->db->where('pr_emp_per_info.emp_id = pr_emp_com_info.emp_id');
		  $this->db->where('pr_emp_per_info.emp_id = pr_emp_left_history.emp_id');
		  if($section_id !="Select")
			{
				$this->db->where("pd_pay_scale_sheet.sec_id", $section_id);
			}
			if($floor_id !="Select")
			{
				$this->db->where("pd_pay_scale_sheet.floor_id", $floor_id);
			}
		  $this->db->where("trim(substr(pr_emp_left_history.left_date,1,7)) = '$salary_month'");
		}
		if($status == 4)//For Resign
		{
			$this->db->select('pr_emp_per_info.*');
			$this->db->from('pr_emp_resign_history');
			$this->db->from('pr_emp_per_info');
			$this->db->from('pr_emp_com_info');
			$this->db->where('pr_emp_per_info.emp_id = pr_emp_com_info.emp_id');
			$this->db->where('pr_emp_per_info.emp_id = pr_emp_resign_history.emp_id');
			if($section_id !="Select")
			{
				$this->db->where("pd_pay_scale_sheet.sec_id", $section_id);
			}
			if($floor_id !="Select")
			{
				$this->db->where("pd_pay_scale_sheet.floor_id", $floor_id);
			}
			$this->db->where("trim(substr(pr_emp_resign_history.resign_date,1,7)) = '$salary_month'");
		}
		
		if($status == "ALL")
		{
			$get_left_emp = $this->common_model->get_left_emp_all_sts($salary_month);
			$get_resign_emp = $this->common_model->get_resign_emp_all_sts($salary_month);
			$this->db->select('pr_emp_per_info.*');
			$this->db->from('pr_emp_com_info');
			$this->db->from('pr_emp_per_info');
			$this->db->from('pd_pay_scale_sheet');
			$this->db->where('pr_emp_per_info.emp_id = pr_emp_com_info.emp_id');
			$this->db->where('pr_emp_per_info.emp_id = pd_pay_scale_sheet.emp_id');
			$this->db->where("pd_pay_scale_sheet.salary_month = '$sal_year_month'");
			if($section_id !="Select")
			{
				$this->db->where("pd_pay_scale_sheet.sec_id", $section_id);
			}
			if($floor_id !="Select")
			{
				$this->db->where("pd_pay_scale_sheet.floor_id", $floor_id);
			}
			$this->db->where("trim(substr(pr_emp_com_info.emp_join_date,1,7)) <= '$salary_month'");
			$this->db->where_not_in('pr_emp_com_info.emp_id',$get_left_emp);
			$this->db->where_not_in('pr_emp_com_info.emp_id',$get_resign_emp);
		}
	
	 	
		$query = $this->db->get();
		//echo $this->db->last_query();
		if($check == "count")
		{
			return $query->num_rows();
		}
		return $query->result();
	 }

	 function count_empid_for_block_wise_salary($section_id,$floor_id,$block_id,$status,$salary_month,$salary_draw,$check)
	{
			$probation_period 	= $this->common_model->get_setup_attributes(10);
			$prev_prob_month 	= $this->common_model->get_prev_month($probation_period,$salary_month);
			$get_left_emp 		= $this->common_model->get_left_emp($salary_month);
			$get_resign_emp 	= $this->common_model->get_resign_emp($salary_month);
			$sal_year_month = "$salary_month-01";
			if($status == 1)// For Regular
			{
				$this->db->select('pr_emp_per_info.*');
				$this->db->from('pr_emp_com_info');
				$this->db->from('pr_emp_per_info');
				$this->db->from('pd_pay_scale_sheet');
				$this->db->where('pr_emp_per_info.emp_id = pr_emp_com_info.emp_id');
				$this->db->where('pr_emp_per_info.emp_id = pd_pay_scale_sheet.emp_id');
				$this->db->where("pd_pay_scale_sheet.salary_month = '$sal_year_month'");
				if($section_id !="Select")
				{
					$this->db->where("pd_pay_scale_sheet.sec_id", $section_id);
				}
				if($floor_id !="Select")
				{
					$this->db->where("pd_pay_scale_sheet.floor_id", $floor_id);
				}
				if($block_id !="Select")
				{
					$this->db->where("pd_pay_scale_sheet.block_id", $block_id);
				}
				
				$this->db->where("trim(substr(pr_emp_com_info.emp_join_date,1,7)) < '$prev_prob_month'");
				$this->db->where("trim(substr(pr_emp_com_info.emp_join_date,1,7)) <= '$salary_month'");
				$this->db->where_not_in('pr_emp_com_info.emp_id',$get_left_emp);
				$this->db->where_not_in('pr_emp_com_info.emp_id',$get_resign_emp);
			}
			if($status == 2)//For New
			{
				$this->db->select('pr_emp_per_info.*');
				$this->db->from('pr_emp_com_info');
				$this->db->from('pr_emp_per_info');
				$this->db->where('pr_emp_per_info.emp_id = pr_emp_com_info.emp_id');
				if($section_id !="Select")
				{
					$this->db->where("pd_pay_scale_sheet.sec_id", $section_id);
				}
				if($floor_id !="Select")
				{
					$this->db->where("pd_pay_scale_sheet.floor_id", $floor_id);
				}
				if($block_id !="Select")
				{
					$this->db->where("pd_pay_scale_sheet.block_id", $block_id);
				}
				$this->db->where("trim(substr(pr_emp_com_info.emp_join_date,1,7)) <= '$salary_month'");
				$this->db->where("trim(substr(pr_emp_com_info.emp_join_date,1,7)) >= '$prev_prob_month'");
				$this->db->where_not_in('pr_emp_com_info.emp_id',$get_left_emp);
				$this->db->where_not_in('pr_emp_com_info.emp_id',$get_resign_emp);
			}
			if($status == 3)//For Left
			{
			  $this->db->select('pr_emp_per_info.*');
			  $this->db->from('pr_emp_left_history');
			  $this->db->from('pr_emp_com_info');
			  $this->db->from('pr_emp_per_info');
			  $this->db->where('pr_emp_per_info.emp_id = pr_emp_com_info.emp_id');
			  $this->db->where('pr_emp_per_info.emp_id = pr_emp_left_history.emp_id');
			  if($section_id !="Select")
				{
					$this->db->where("pd_pay_scale_sheet.sec_id", $section_id);
				}
				if($floor_id !="Select")
				{
					$this->db->where("pd_pay_scale_sheet.floor_id", $floor_id);
				}
				if($block_id !="Select")
				{
					$this->db->where("pd_pay_scale_sheet.block_id", $block_id);
				}
			  $this->db->where("trim(substr(pr_emp_left_history.left_date,1,7)) = '$salary_month'");
			}
			if($status == 4)//For Resign
			{
				$this->db->select('pr_emp_per_info.*');
				$this->db->from('pr_emp_resign_history');
				$this->db->from('pr_emp_per_info');
				$this->db->from('pr_emp_com_info');
				$this->db->where('pr_emp_per_info.emp_id = pr_emp_com_info.emp_id');
				$this->db->where('pr_emp_per_info.emp_id = pr_emp_resign_history.emp_id');
				if($section_id !="Select")
				{
					$this->db->where("pd_pay_scale_sheet.sec_id", $section_id);
				}
				if($floor_id !="Select")
				{
					$this->db->where("pd_pay_scale_sheet.floor_id", $floor_id);
				}
				if($block_id !="Select")
				{
					$this->db->where("pd_pay_scale_sheet.block_id", $block_id);
				}
				$this->db->where("trim(substr(pr_emp_resign_history.resign_date,1,7)) = '$salary_month'");
			}
			
			if($status == "ALL")
			{
				$get_left_emp = $this->common_model->get_left_emp_all_sts($salary_month);
				$get_resign_emp = $this->common_model->get_resign_emp_all_sts($salary_month);
				$this->db->select('pr_emp_per_info.*');
				$this->db->from('pr_emp_com_info');
				$this->db->from('pr_emp_per_info');
				$this->db->from('pd_pay_scale_sheet');
				$this->db->where('pr_emp_per_info.emp_id = pr_emp_com_info.emp_id');
				$this->db->where('pr_emp_per_info.emp_id = pd_pay_scale_sheet.emp_id');
				$this->db->where("pd_pay_scale_sheet.salary_month = '$sal_year_month'");
				if($section_id !="Select")
				{
					$this->db->where("pd_pay_scale_sheet.sec_id", $section_id);
				}
				if($floor_id !="Select")
				{
					$this->db->where("pd_pay_scale_sheet.floor_id", $floor_id);
				}
				if($block_id !="Select")
				{
					$this->db->where("pd_pay_scale_sheet.block_id", $block_id);
				}
				$this->db->where("trim(substr(pr_emp_com_info.emp_join_date,1,7)) <= '$salary_month'");
				$this->db->where_not_in('pr_emp_com_info.emp_id',$get_left_emp);
				$this->db->where_not_in('pr_emp_com_info.emp_id',$get_resign_emp);
			}
		
			
			$query = $this->db->get();
			//echo $this->db->last_query();
			if($check == "count")
			{
				return $query->num_rows();
			}
			return $query->result();
	}
	 function production_monthly_style($firstdate, $grid_data)
	 {
		$i = 1;
		$year  = date('Y',strtotime($firstdate));
		$month = date('m',strtotime($firstdate));	
		
		$firstday = date("Y-m-d", mktime(0, 0, 0, $month, 1, $year));
		
		//$this->db->select('pr_emp_per_info.emp_full_name, pr_emp_per_info.emp_id, pd_manual_attandence.total_working_day, pd_manual_attandence.p_day');
		$this->db->select('pr_emp_per_info.emp_full_name, pr_emp_per_info.emp_id');
		$this->db->from('pr_emp_per_info');
		//$this->db->from('pd_manual_attandence');
		//$this->db->join('pd_manual_attandence', 'pr_emp_per_info.emp_id = pd_manual_attandence.emp_id', 'left');
		$this->db->where_in('pr_emp_per_info.emp_id', $grid_data);
		//$this->db->where("pd_manual_attandence.date = '$firstday'");
		//$this->db->group_by('pd_manual_attandence.emp_id');
		$this->db->order_by('pr_emp_per_info.emp_id');
	
		$query = $this->db->get();	
		//echo $this->db->last_query();
		return $query;
		
	}
	function get_pd_working_day($emp_id,$date)
	{
		$year  = date('Y',strtotime($date));
		$month = date('m',strtotime($date));	
		
		$firstday = date("Y-m-d", mktime(0, 0, 0, $month, 1, $year));
		$this->db->select('total_working_day');
		$this->db->where('date',$firstday);
		$this->db->where('emp_id',$emp_id);
		$query = $this->db->get('pd_manual_attandence');
		if($query->num_rows() > 0){ return $total_working_day = $query->row()->total_working_day;}else{ return false;}
	}
	function get_pd_p_day($emp_id,$date)
	{
		$year  = date('Y',strtotime($date));
		$month = date('m',strtotime($date));		
		$firstday = date("Y-m-d", mktime(0, 0, 0, $month, 1, $year));
		$this->db->select('p_day');
		$this->db->where('date',$firstday);
		$this->db->where('emp_id',$emp_id);
		$query = $this->db->get('pd_manual_attandence');
		if($query->num_rows() > 0){ return $p_day = $query->row()->p_day;}else{ return 0;}
	}
	function get_monthly_style($firstdate, $grid_data, $grid_pd_process)
	 {
		$year  = date('Y',strtotime($firstdate));
		$month = date('m',strtotime($firstdate));	
		
		
		$process_date 		= $this->pd_process_model->get_start_end_date($month,$year);
		$process_start_date = $process_date['start_date'] ;
		$process_end_date 	= $process_date['end_date'] ;
		$this->db->select('pd_style_infos.article_id_pk, pd_style_infos.style_id');		
		$this->db->from('pd_style_infos');
		$this->db->from('pd_production_logs');
		$this->db->where_in('pd_production_logs.emp_id', $grid_data);
		$this->db->where('pd_production_logs.process_id', $grid_pd_process);
		$this->db->where('pd_production_logs.article_id = pd_style_infos.article_id_pk');		
		$where = "date BETWEEN '$process_start_date' and '$process_end_date'";
		$this->db->where($where);
		$this->db->group_by('pd_style_infos.article_id_pk');
	
		$query = $this->db->get();	
		//echo $this->db->last_query();
		return $query;	
		
	}
	function get_monthly_style_size($firstdate, $grid_data, $article_id)
	 {
		$year  = date('Y',strtotime($firstdate));
		$month = date('m',strtotime($firstdate));	
		
		//$firstday = date("Y-m-d", mktime(0, 0, 0, $month, 1, $year));
		//$last_date = date('t',mktime(0, 0, 0, $month, 1, $year));
		//$last_date = date("Y-m-d", mktime(0, 0, 0, $month, $last_date, $year));
		$process_date 		= $this->pd_process_model->get_start_end_date($month,$year);
		$process_start_date = $process_date['start_date'] ;
		$process_end_date 	= $process_date['end_date'] ;
		$this->db->select('pd_size_infos.size_id, pd_size_infos.size_name, pd_production_logs.section_id,pd_production_logs.article_id,pd_production_logs.process_id');		
		$this->db->from('pd_style_infos');
		$this->db->from('pd_size_infos');		
		$this->db->from('pd_production_logs');
		$this->db->where_in('pd_production_logs.emp_id', $grid_data);
		$this->db->where('pd_production_logs.article_id = pd_style_infos.article_id_pk');
		$this->db->where('pd_production_logs.size_id = pd_size_infos.size_id');		
		$where = "date BETWEEN '$process_start_date' and '$process_end_date'";
		$this->db->where($where);
		$this->db->where("pd_production_logs.article_id = '$article_id'");
		$this->db->group_by('pd_size_infos.size_id');
		$this->db->group_by('pd_production_logs.process_id');
		
		
		/*$this->db->select('SUM(quantity) AS total_quantity,process_id,article_id,section_id,size_id');
		$this->db->where('emp_id', $emp_id);
		$this->db->where('section_id', $emp_sec_id);
		$where = "date BETWEEN '$process_start_date' and '$process_end_date'";
		$this->db->where($where);
		$this->db->group_by("process_id");
		$this->db->group_by("article_id");
		$this->db->group_by("color_id");
		$this->db->group_by("size_id");
		$query = $this->db->get('pd_production_logs');*/
		$query = $this->db->get();	
		//echo $this->db->last_query();
		return $query;
	}
	function get_monthly_style_size_amount($firstdate, $emp_id, $article_id, $section_id, $process_id, $size_id)
	{
		$year  = date('Y',strtotime($firstdate));
		$month = date('m',strtotime($firstdate));	
		
		$process_date 		= $this->pd_process_model->get_start_end_date($month,$year);
		$process_start_date = $process_date['start_date'] ;
		$process_end_date 	= $process_date['end_date'] ;
		$this->db->select('SUM(quantity) AS qt');
		$this->db->where('emp_id', $emp_id);
		$this->db->where('article_id', $article_id);
		$this->db->where('section_id', $section_id);
		$this->db->where('process_id', $process_id);
		$this->db->where('size_id', $size_id);
		$where = "date BETWEEN '$process_start_date' and '$process_end_date'";
		$this->db->where($where);
		$this->db->group_by("process_id");
		$this->db->group_by("article_id");
		$this->db->group_by("color_id");
		$this->db->group_by("size_id");
		$query = $this->db->get('pd_production_logs');
		//$this->db->select('SUM(pd_production_summary_logs.total_quantity) as qt, SUM(pd_production_summary_logs.amount) as am,process_id');	
		/*$this->db->select('pd_production_logs.quantity as qt,process_id');	
		$this->db->from('pd_production_logs');
		$this->db->where('pd_production_logs.emp_id', $emp_id);
		$this->db->where("pd_production_logs.month = '$firstday'");
		$this->db->where("pd_production_logs.article_id = '$article_id'");
		$this->db->where("pd_production_logs.size_id = '$size_id'");
		$this->db->group_by('pd_production_summary_logs.size_id');*/
	
		//$query = $this->db->get();	
		//echo $this->db->last_query();
		return $query;
	}
}
