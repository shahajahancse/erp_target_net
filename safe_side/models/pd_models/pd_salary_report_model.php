<?php
class pd_salary_report_model extends CI_Model{
	
	
	function __construct()
	{
		parent::__construct();
		
		/* Standard Libraries */
		$this->load->model('log_model');
		$this->load->model('pf_model');
		$this->load->model('pd_process_model');
		$this->load->model('salary_process_model');

	}
	
	function grid_monthly_salary_sheet($sal_year_month, $grid_status, $grid_emp_id)
	{
		//print_r($grid_emp_id);
		$i = 1;
		$year  = substr($sal_year_month,0,4);
		$month = substr($sal_year_month,5,2);
		$lastday = date("t", mktime(0, 0, 0, $month, 1, $year));	
		
		$lastday = date("Y-m-d", mktime(0, 0, 0, $month, $lastday, $year));
	
		
		$this->db->select('pr_emp_per_info.emp_full_name,pr_designation.desig_name, pr_section.sec_name, pr_emp_com_info.emp_join_date,pr_grade.gr_name,pd_pay_scale_sheet.*');
		
		$this->db->from('pr_emp_per_info');
		$this->db->from('pr_grade');
		$this->db->from('pd_pay_scale_sheet');
		$this->db->from('pr_dept');
		$this->db->from('pr_section');
		$this->db->from('pr_line_num');
		$this->db->from('pr_designation');
		$this->db->from('pr_emp_com_info');
		
		$this->db->where_in('pr_emp_com_info.emp_id', $grid_emp_id);
		$this->db->where('pr_emp_per_info.emp_id = pr_emp_com_info.emp_id');
		$this->db->where('pr_emp_per_info.emp_id = pd_pay_scale_sheet.emp_id');
		$this->db->where("pd_pay_scale_sheet.salary_month = '$sal_year_month'");
		$this->db->where('pr_emp_com_info.emp_desi_id = pr_designation.desig_id');
		$this->db->where('pr_emp_com_info.emp_dept_id = pr_dept.dept_id');
		$this->db->where('pr_emp_com_info.emp_sec_id = pr_section.sec_id');
		$this->db->where('pr_emp_com_info.emp_line_id = pr_line_num.line_id');
		$this->db->where('pr_emp_com_info.emp_sal_gra_id = pr_grade.gr_id');
		$this->db->order_by("pr_emp_com_info.emp_id");
		$query = $this->db->get();	
		return $query->result();
			
		
		/*$this->db->select('pr_emp_per_info.emp_full_name,pr_designation.desig_name, pr_section.sec_name, pr_emp_com_info.emp_join_date,pr_grade.gr_name,pd_pay_scale_sheet.*');
		$this->db->from('pr_emp_per_info');
		$this->db->from('pr_emp_com_info');
		$this->db->from('pr_grade');
		$this->db->from('pd_pay_scale_sheet');
			$this->db->from('pr_dept');
			$this->db->from('pr_section');
			$this->db->from('pr_line_num');
			$this->db->from('pr_designation');*/
			/*if($grid_status == 4)
			{
				$this->db->from('pr_emp_resign_history');
			}
			elseif($grid_status == 3)
			{
				$this->db->from('pr_emp_left_history');
			}*/
			
			
			/*$this->db->where_in('pr_emp_com_info.emp_id', $grid_emp_id);
			$this->db->where('pr_emp_com_info.emp_desi_id = pr_designation.desig_id');
			$this->db->where('pr_emp_com_info.emp_dept_id = pr_dept.dept_id');
			$this->db->where('pr_emp_com_info.emp_sec_id = pr_section.sec_id');
			$this->db->where('pr_emp_com_info.emp_line_id = pr_line_num.line_id');*/
		//$this->db->where('pr_emp_per_info.emp_id = pr_emp_com_info.emp_id');
		//$this->db->where('pr_emp_com_info.emp_sal_gra_id = pr_grade.gr_id');
		//$this->db->where('pr_emp_per_info.emp_id = pd_pay_scale_sheet.emp_id');
		//$this->db->where("pd_pay_scale_sheet.salary_month = '$sal_year_month'");
		/*if($grid_status == 4)
		{
			$salary_month = substr($sal_year_month,0,7);
			$this->db->where('pr_emp_com_info.emp_id = pr_emp_resign_history.emp_id');
			$this->db->where("trim(substr(pr_emp_resign_history.resign_date,1,7)) LIKE '$salary_month'");
		}
		else if($grid_status == 3)
		{
			$salary_month = substr($sal_year_month,0,7);
			$this->db->where('pr_emp_com_info.emp_id = pr_emp_left_history.emp_id');
			$this->db->where("trim(substr(pr_emp_left_history.left_date,1,7)) LIKE '$salary_month'");
		}
		$this->db->where('pr_emp_com_info.emp_join_date <= ', $lastday);
		
*/
		//$this->db->order_by("pr_emp_com_info.emp_id");
		//$this->db->group_by("pd_pay_scale_sheet.emp_id");
		//$query = $this->db->get();	
		//echo $this->db->last_query();	
		//return $query->result();
		
	}
	
	function grid_monthly_salary_sheet_all($sal_year_month, $grid_status,$grid_section,$grid_floor,$grid_block)
	{
		$year  = substr($sal_year_month,0,4);
		$month = substr($sal_year_month,5,2);
		$process_date 		= $this->pd_process_model->get_start_end_date($month,$year);
		$process_start_date = $process_date['start_date'] ;
		$process_end_date 	= $process_date['end_date'] ;		
		$this->db->select('pd_production_logs.emp_id');
		$this->db->from('pd_production_logs');
		//$this->db->from('pr_emp_com_info');
		if($grid_section !="Select")
		{
			$this->db->where("section_id", $grid_section);
		}
		if($grid_floor !="Select")
		{
			$this->db->where("floor_id", $grid_floor);
		}
		if($grid_block !="Select")
		{
			$this->db->where("block_id", $grid_block);
		}
		//if($grid_status !="ALL")
		//{
		//	$this->db->where("pr_emp_com_info.emp_cat_id", $grid_status);
		//}
		//$this->db->where('section_id', $grid_section);
		//$this->db->where('block_id', $grid_block);
		//$this->db->where('process_id', $process_id);
		//$this->db->where('floor_id', $grid_floor);
		$where = "date BETWEEN '$process_start_date' and '$process_end_date'";
		$this->db->where($where);
		//$this->db->where('pr_emp_com_info.emp_id = pd_production_logs.emp_id');
		$query = $this->db->get();
		$emp_id = array();
		foreach($query->result() as $style_summary)
		{
			$emp_id[] 	= $style_summary->emp_id;
		}	
		return $emp_id;
		
	}
	
	function get_pd_info($emp_id,$sec_id,$process_start_date,$process_end_date,$process_id)
	{
		//$total  = 0;
		//$process_date 		= $this->pd_process_model->get_start_end_date($month,$year);
		//$process_start_date = $process_date['start_date'] ;
		//$process_end_date 	= $process_date['end_date'] ;
		
		$this->db->select('SUM(quantity) AS total_quantity');
		$this->db->where('emp_id', $emp_id);
		$this->db->where('section_id', $sec_id);
		$this->db->where('process_id', $process_id);

		$where = "date BETWEEN '$process_start_date' and '$process_end_date'";
		$this->db->where($where);
		$query = $this->db->get('pd_production_logs');
		$num_rows=$query->num_rows();
		if($num_rows ==0)
		{
			return $total_quantity = 0;
		}
		foreach($query->result() as $style_summary)
		{
			$total_quantity 	= $style_summary->total_quantity;
		}
		//$total = $total + $total_quantity;
		//echo "<br>".$total;
		return $total_quantity;
	}
	
	
	function get_pd_summary_info($sec_id,$month,$year,$process_id)
	{
		
		$process_date 		= $this->pd_process_model->get_start_end_date($month,$year);
		$process_start_date = $process_date['start_date'] ;
		$process_end_date 	= $process_date['end_date'] ;
		
		$this->db->select('SUM(quantity) AS total_quantity');
		$this->db->where('section_id', $sec_id);
		$this->db->where('process_id', $process_id);
		$where = "date BETWEEN '$process_start_date' and '$process_end_date'";
		$this->db->where($where);
		$query = $this->db->get('pd_production_logs');
		
		foreach($query->result() as $style_summary)
		{
			$total_quantity 	= $style_summary->total_quantity;
		}
		return $total_quantity;
	}
	
	function get_pd_block_summary_info($sec_id,$floor_id,$block_id,$month,$year,$process_id)
	{
		
		$process_date 		= $this->pd_process_model->get_start_end_date($month,$year);
		$process_start_date = $process_date['start_date'] ;
		$process_end_date 	= $process_date['end_date'] ;
		
		$this->db->select('SUM(quantity) AS total_quantity');
		$this->db->where('section_id', $sec_id);
		$this->db->where('floor_id', $floor_id);
		$this->db->where('block_id', $block_id);
		$this->db->where('process_id', $process_id);
		$where = "date BETWEEN '$process_start_date' and '$process_end_date'";
		$this->db->where($where);
		$query = $this->db->get('pd_production_logs');
		
		foreach($query->result() as $style_summary)
		{
			$total_quantity 	= $style_summary->total_quantity;
		}
		return $total_quantity;
	}
	
	/*function get_pd_floor_summary_info($sec_id,$floor_id,$month,$year,$process_id)
	{
		
		$process_date 		= $this->pd_process_model->get_start_end_date($month,$year);
		$process_start_date = $process_date['start_date'] ;
		$process_end_date 	= $process_date['end_date'] ;
		
		$this->db->select('SUM(quantity) AS total_quantity');
		$this->db->where('section_id', $sec_id);
		$this->db->where('floor_id', $floor_id);
		$this->db->where('process_id', $process_id);
		
		$where = "date BETWEEN '$process_start_date' and '$process_end_date'";
		$this->db->where($where);
		$query = $this->db->get('pd_production_logs');
		
		foreach($query->result() as $style_summary)
		{
			$total_quantity 	= $style_summary->total_quantity;
		}
		return $total_quantity;
	}*/
	function get_pd_floor_summary_info($sec_id,$floor_id,$month,$year,$process_id)
	{
		
		$process_date 		= $this->pd_process_model->get_start_end_date($month,$year);
		$process_start_date = $process_date['start_date'] ;
		$process_end_date 	= $process_date['end_date'] ;
		
		$this->db->select('SUM(quantity) AS total_quantity');
		$this->db->where('section_id', $sec_id);
		$this->db->where('floor_id', $floor_id);
		$this->db->where('process_id', $process_id);
		
		$where = "date BETWEEN '$process_start_date' and '$process_end_date'";
		$this->db->where($where);
		$query = $this->db->get('pd_production_logs');
		
		foreach($query->result() as $style_summary)
		{
			$total_quantity 	= $style_summary->total_quantity;
		}
		return $total_quantity;
	}
}
?>