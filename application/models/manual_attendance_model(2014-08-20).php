<?php
class manual_attendance_model extends CI_Model{
	
	
	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Dhaka');
		$this->load->model('grid_model');
		$this->load->model('pd_process_model');
		

	}
	
	function add_production_log()
	{
		
		//$user 						= $this->session->userdata('user_id');
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
	function get_emp_image($emp_id)
	{
		$this->db->select('img_source');
		$this->db->where('emp_id',$emp_id);
		$query = $this->db->get('pr_emp_per_info');
		foreach ($query->result() as $row)
			{
				$img_source = $row->img_source;
				
			}
		//$rows = $query->row();
		return $img_source;
	}
	function get_emp_name($emp_id)
	{
		$this->db->select('emp_full_name');
		$this->db->where('emp_id',$emp_id);
		$query = $this->db->get('pr_emp_per_info');
		foreach ($query->result() as $row)
			{
				$emp_full_name = $row->emp_full_name;
				
			}
		//$rows = $query->row();
		return $emp_full_name;
	}	
	
	function get_info($emp_id,$month,$year)
	{
		$date = date('Y-m-d', mktime(0, 0, 0, $month, 1, $year));
		$data = array();
		$data['full_name'] = $this->get_emp_name($emp_id);
		$data['image'] = $this->get_emp_image($emp_id);
		$data['designation'] = $this->get_designation_id($emp_id);
		
		
		
		$this->db->select('*');
		$this->db->where('emp_id',$emp_id);
		$this->db->where('date',$date);
		$query = $this->db->get("pd_manual_attandence");
		
		$num_rows = $query->num_rows();
		if($num_rows != 0)
		{
		  foreach ($query->result() as $row)
		  {
			$data['total_working_day'] 	= $row->total_working_day;
			$data['holiday'] 			= $row->holiday;
			$data['weekend'] 			= $row->weekend;
			$data['p_day'] 				= $row->p_day;
			$data['a_day'] 				= $row->a_day;
			$data['leave'] 				= $row->leave;
			$data['no_work'] 			= $row->no_work;
			$data['night'] 				= $row->night;
			$data['late'] 				= $row->late;
			$data['h_day'] 				= $row->h_day;
			$data['rows'] 				= $num_rows;
			  
		  }
		}
		else
		{
			$data['total_working_day'] 	= '';
			$data['holiday'] 			= '';
			$data['weekend'] 			= '';
			$data['p_day'] 				= '';
			$data['a_day'] 				= '';
			$data['leave'] 				= '';
			$data['no_work'] 			= '';
			$data['night'] 				= '';
			$data['late'] 				= '';
			$data['h_day'] 				= '';
			$data['rows'] 				= $num_rows;
		}
		return $data = implode("===",$data);
		
		//return $image_info = "$full_name===$image_name===$designation===$total_working_day===$holiday===$weekend===$p_day===$a_day===$leave===$no_work===$night";
	
	}
	function get_info_for_fixed($emp_id,$month,$year)
	{
		$date = date('Y-m-d', mktime(0, 0, 0, $month, 1, $year));
		$data = array();
		$data['full_name'] = $this->get_emp_name($emp_id);
		$data['image'] = $this->get_emp_image($emp_id);
		$data['designation'] = $this->get_designation_id($emp_id);
		
		
		
		$this->db->select('*');
		$this->db->where('emp_id',$emp_id);
		$this->db->where('date',$date);
		$query = $this->db->get("pr_manual_attandence");
		
		$num_rows = $query->num_rows();
		if($num_rows != 0)
		{
		  foreach ($query->result() as $row)
		  {
			$data['total_working_day'] 	= $row->total_working_day;
			$data['holiday'] 			= $row->holiday;
			$data['weekend'] 			= $row->weekend;
			
			$data['p_day'] 				= $row->p_day;
			$data['friady'] 			= $row->friday;
			$data['h_day'] 				= $row->h_day;
			$data['leave'] 				= $row->leave;
			$data['night'] 				= $row->night;
			$data['extra_fri'] 			= $row->extra_fri;
			$data['rows'] 				= $num_rows;
			  
		  }
		}
		else
		{
			$data['total_working_day'] 	= '';
			$data['holiday'] 			= '';
			$data['weekend'] 			= '';
			$data['p_day'] 				= 0;
			$data['leave'] 				= 0;
			$data['friday'] 			= 0;
			$data['night'] 				= 0;
			$data['h_day'] 				= 0;
			$data['extra_fri'] 			= 0;
			$data['rows'] 				= $num_rows;
		}
		return $data = implode("===",$data);
		
		//return $image_info = "$full_name===$image_name===$designation===$total_working_day===$holiday===$weekend===$p_day===$a_day===$leave===$no_work===$night";
	
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
	function manual_attendance_db()
	{
		$month = $this->input->post('month');
		$year = $this->input->post('year');
		$section_id 		= $this->input->post('section_id');
		$emp_id 			= $this->input->post('emp_id');
		$total_working_day 	= $this->input->post('total_working_day');
		$holiday 			= $this->input->post('holiday');
		$weekend 			= $this->input->post('weekend');
		$p_day 				= $this->input->post('p_day');
		$a_day 				= $this->input->post('a_day');
		$leave 				= $this->input->post('leave');
		$no_work 			= $this->input->post('no_work');
		$night 				= $this->input->post('night');
		$late 				= $this->input->post('late');
		$h_day 				= $this->input->post('h_day');
		
		
		$manual_num_of_days = $total_working_day +  $holiday +  $weekend ;
		$process_date 		= $this->pd_process_model->get_start_end_date($month,$year);
		$process_start_date = $process_date['start_date'] ;
		$process_end_date 	= $process_date['end_date'] ;
		$num_of_days = $this->get_no_of_days($process_start_date,$process_end_date);
		
		if($num_of_days != $manual_num_of_days)
		{	
			return "Number of Days Error";
		}
		
		$year_month = "$year-$month-01";
		
		$data['section_id'] 		= $section_id;
		$data['total_working_day'] 	= $total_working_day;
		$data['holiday'] 			= $holiday;
		$data['weekend'] 			= $weekend;
		$data['p_day'] 				= $p_day;
		$data['a_day'] 				= $a_day;
		$data['leave'] 				= $leave;
		$data['no_work'] 			= $no_work;
		$data['night'] 				= $night;
		$data['late'] 				= $late;
		$data['h_day'] 				= $h_day;
		$data['date'] 				= $year_month;
		$data['user_id'] 			= $this->session->userdata('username');
		$data['sys_date'] 			= date("Y-m-d H:i:s");
		
		$num_row = $this->db->where('emp_id',$emp_id)->where('section_id',$section_id)->like('date',$year_month)->get('pd_manual_attandence')->num_rows();
		//echo $this->db->last_query();
		if($num_row == 0)
		{
			$data['emp_id']			 	= $emp_id;
			$this->db->insert('pd_manual_attandence', $data);
		}
		else
		{
			$this->db->where('emp_id',$emp_id)->where('section_id',$section_id)->like('date',$year_month);
			$this->db->update('pd_manual_attandence', $data);
		}
		return $emp_id."===".$num_row;
	}
	
	function add_production_log_for_fixed_db()
	{
		$month = $this->input->post('month');
		$year = $this->input->post('year');
		$section_id 		= $this->input->post('section_id');
		$emp_id 			= $this->input->post('emp_id');
		$total_working_day 	= $this->input->post('total_working_day');
		$holiday 			= $this->input->post('holiday');
		$weekend 			= $this->input->post('weekend');
		$p_day 				= $this->input->post('p_day');
		$friday				= $this->input->post('friday');
		$h_day 				= $this->input->post('h_day');
		$leave 				= $this->input->post('leave');
		$night 				= $this->input->post('night');
		$extra_fri			= $this->input->post('extra_fri');
		
		$a_day 				= $total_working_day - $p_day;//$this->input->post('a_day');

		
		
		$manual_num_of_days = $total_working_day +  $holiday +  $weekend ;
		$process_date 		= $this->pd_process_model->get_start_end_date($month,$year);
		$process_start_date = $process_date['start_date'] ;
		$process_end_date 	= $process_date['end_date'] ;
		$num_of_days = $this->get_no_of_days($process_start_date,$process_end_date);
		
		if($num_of_days != $manual_num_of_days)
		{	
			return "Number of Days Error";
		}
		
		$year_month = "$year-$month-01";
		
		$data['section_id'] 		= $section_id;
		$data['total_working_day'] 	= $total_working_day;
		$data['holiday'] 			= $holiday;
		$data['weekend'] 			= $weekend;
		$data['p_day'] 				= $p_day;
		$data['a_day'] 				= $a_day;
		$data['friday'] 			= $friday;
		$data['h_day'] 				= $h_day;
		$data['leave'] 				= $leave;
		$data['night'] 				= $night;
		$data['extra_fri'] 				= $extra_fri;

		$data['date'] 				= $year_month;
		$data['user_id'] 			= $this->session->userdata('username');
		$data['sys_date'] 			= date("Y-m-d H:i:s");
		
		$num_row = $this->db->where('emp_id',$emp_id)->where('section_id',$section_id)->like('date',$year_month)->get('pr_manual_attandence')->num_rows();
		//echo $this->db->last_query();
		if($num_row == 0)
		{
			$data['emp_id']			 	= $emp_id;
			$this->db->insert('pr_manual_attandence', $data);
		}
		else
		{
			$this->db->where('emp_id',$emp_id)->where('section_id',$section_id)->like('date',$year_month);
			$this->db->update('pr_manual_attandence', $data);
		}
		return $emp_id."===".$num_row;
	}
	function get_no_of_days($start_date,$end_date)
	{
		$start = strtotime($start_date);
		$end = strtotime($end_date);
		$no_of_days = ceil(abs($end - $start) / 86400) + 1;
		return  $no_of_days;
	}

}