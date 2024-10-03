<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pd_report_con extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
		/* Standard Libraries */
		$this->load->model('pd_report_model');
		$this->load->model('emp_wise_entry_model');
		$this->load->model('common_model');
		$this->load->model('acl_model');
		$this->load->model('pd_models/pd_salary_report_model');
		set_time_limit(0);
		ini_set("memory_limit","512M");	
	}
	function pd_report()
	{
		$this->load->view('pd/pd_report');
	}
	function style_detail_report()
	{
		$article_id = $this->uri->segment(3);
		$data['query'] = $this->pd_report_model->style_detail_report($article_id);
		$this->load->view('pd/pd_style_detail_report',$data);
	}
	/*function color_wise_report()
	{
		$article_id = $this->uri->segment(3);
		$data['query'] = $this->pd_report_model->color_wise_report($article_id);
		$this->load->view('pd/pd_color_wisel_report',$data);
	}*/
	function production_report()
	{
		
		$this->load->view('pd/production_report');
	}
	function production_daily_report()
	{
		$data['date'] = date('Y-m-d', strtotime($this->uri->segment(3)));
		$this->load->view('pd/pd_daily_report',$data);
	}
	
	function production_job_card()
	{
		$grid_firstdate = $this->uri->segment(3);
		$grid_seconddate = $this->uri->segment(4);
		
		$grid_data = $this->uri->segment(5);
		$grid_emp_id = explode('xxx', trim($grid_data));
			
		$query['values'] = $this->pd_report_model->production_job_card($grid_firstdate, $grid_seconddate, $grid_emp_id);
		
		$query['grid_firstdate'] = date("M-d-Y", strtotime($grid_firstdate)); 
		$query['grid_seconddate'] = date("M-d-Y", strtotime($grid_seconddate));
		
		$this->load->view('pd/pd_job_card',$query);
	}
	function production_summary()
	{
		$query['values'] = $this->pd_report_model->production_summary();

		$this->load->view('pd/pd_summary',$query);

	}
	function production_monthly_salary_summary()
	{
		$grid_firstdate = $this->uri->segment(3);
		$emp_stat = $this->uri->segment(4);
		$query['month_year'] = date('F-Y', strtotime($this->uri->segment(3)));
		$query['grid_status'] = $emp_stat;
		$query['values'] = $this->pd_report_model->production_monthly_salary_summary($grid_firstdate,$emp_stat);
		$this->load->view('pd/production_monthly_salary_summary',$query);
	}
	
	function production_monthly_block_wise_salary_summary()
	{
		$grid_firstdate = $this->uri->segment(3);
		$emp_stat = $this->uri->segment(4);
		$grid_section = $this->uri->segment(5);
		$grid_floor = $this->uri->segment(6);
		$query['month_year'] = date('F-Y', strtotime($this->uri->segment(3)));
		$query['grid_status'] = $emp_stat;
		$query['grid_section'] = $grid_section;
		$query['grid_floor'] = $grid_floor;
		$query['values'] = $this->pd_report_model->production_monthly_block_wise_salary_summary($grid_firstdate,$emp_stat,$grid_section,$grid_floor);
		$this->load->view('pd/production_monthly_block_wise_salary_summary',$query);
	}
	function production_monthly_floor_wise_salary_summary()
	{
		$grid_firstdate = $this->uri->segment(3);
		$emp_stat = $this->uri->segment(4);
		$grid_section = $this->uri->segment(5);
		$query['month_year'] = date('F-Y', strtotime($this->uri->segment(3)));
		$query['grid_status'] = $emp_stat;
		$query['grid_section'] = $grid_section;
		$query['values'] = $this->pd_report_model->production_monthly_floor_wise_salary_summary($grid_firstdate,$emp_stat,$grid_section);
		$this->load->view('pd/production_monthly_floor_wise_salary_summary',$query);
	}
	function production_monthly_cost_sheet()
	{
		$grid_firstdate = $this->uri->segment(3);
		$query['month_year'] = date('F-Y', strtotime($this->uri->segment(3)));
		$query['values'] = $this->pd_report_model->production_monthly_cost_sheet($grid_firstdate);
		$this->load->view('pd/production_monthly_cost_sheet',$query);
	}
	
	function daily_production_summary()
	{
		$grid_firstdate = $this->uri->segment(3);
		$grid_section = $this->uri->segment(4);
			
		$query['values'] = $this->pd_report_model->daily_production_summary($grid_firstdate, $grid_section);
		if($query['values'] == "empty")
		{
			echo "Requested List Is Empty";
		}
		else
		{
			$this->load->view('pd/daily_production_summary',$query);
		}
	}
	
	function continious_section_production_summary()
	{
		$grid_firstdate = $this->uri->segment(3);
		$grid_seconddate = $this->uri->segment(4);
		$grid_section = $this->uri->segment(5);
		$grid_process = $this->uri->segment(6);
		$grid_status = $this->uri->segment(7);
			
		$query['values'] = $this->pd_report_model->continious_section_production_summary($grid_firstdate,$grid_seconddate,$grid_section,$grid_process,$grid_status);
		if($query['values'] == "empty")
		{
			echo "Requested List Is Empty";
		}
		else
		{
			$this->load->view('pd/continious_section_production_summary',$query);
		}
	}
	
	
	function continious_floor_production_summary()
	{
		$grid_firstdate = $this->uri->segment(3);
		$grid_seconddate = $this->uri->segment(4);
		$grid_section = $this->uri->segment(5);
		$grid_position = $this->uri->segment(6);
		$grid_process = $this->uri->segment(7);
		$grid_status = $this->uri->segment(8);
			
		$query['values'] = $this->pd_report_model->continious_floor_production_summary($grid_firstdate,$grid_seconddate,$grid_section,$grid_position,$grid_process,$grid_status);
		if($query['values'] == "empty")
		{
			echo "Requested List Is Empty";
		}
		else
		{
			$this->load->view('pd/continious_floor_production_summary',$query);
		}
	}
	
	function continious_block_production_summary()
	{
		$grid_firstdate = $this->uri->segment(3);
		$grid_seconddate = $this->uri->segment(4);
		$grid_section = $this->uri->segment(5);
		$grid_position = $this->uri->segment(6);
		$grid_line = $this->uri->segment(7);
		$grid_process = $this->uri->segment(8);
		$grid_status = $this->uri->segment(9);
			
		$query['values'] = $this->pd_report_model->continious_block_production_summary($grid_firstdate,$grid_seconddate,$grid_section,$grid_position,$grid_line,$grid_process,$grid_status );
		if($query['values'] == "empty")
		{
			echo "Requested List Is Empty";
		}
		else
		{
			$this->load->view('pd/continious_block_production_summary',$query);
		}
	}
	
	function monthly_floor_production_summary()
	{
		$grid_firstdate = $this->uri->segment(3);
		$grid_seconddate = $this->uri->segment(4);
		$grid_section = $this->uri->segment(5);
		$grid_position = $this->uri->segment(6);
		$grid_status = $this->uri->segment(7);
			
		$query['values'] = $this->pd_report_model->monthly_floor_production_summary($grid_firstdate,$grid_seconddate,$grid_section,$grid_position,$grid_status);
		if($query['values'] == "empty")
		{
			echo "Requested List Is Empty";
		}
		else
		{
			$this->load->view('pd/monthly_floor_production_summary',$query);
		}
	}
	function grid_production_wages_card()
	{
		$sal_year_month = $this->uri->segment(3);
		$grid_data 		= $this->uri->segment(4);
		$grid_emp_id = explode('xxx', trim($grid_data));
		//print_r($grid_emp_id);
						
		$data["values"] = $this->pd_report_model->grid_production_wages_card($sal_year_month,$grid_emp_id);
		if($data["values"] == "Requested List is Empty.")
		{
			echo "Requested List is Empty.";
		}
		else
		{
			$data["salary_month"] = $sal_year_month;
		
		$this->load->view('pd/production_wages_card',$data);
		}
	}
	function production_monthly_attn_register()
	{
		$grid_firstdate = $this->uri->segment(3);
		$grid_data = $this->uri->segment(4);
		$grid_emp_id = explode('xxx', trim($grid_data));
		
		$year_month = date("Y-m", strtotime($grid_firstdate)); 
		
		$query=$this->pd_report_model->production_monthly_attn_register($year_month, $grid_emp_id);
		if(is_string($query))
		{
			echo $query;
		}
		else
		{
			$year_month = date("M-Y", strtotime($grid_firstdate)); 
			$data["value"]=$query;
			$data["year_month"] = $year_month;
			$this->load->view('pd/pd_monthly_attn_report',$data);
		}
	}
	function production_monthly_style()
	{
		$firstdate = $this->uri->segment(3);
		$grid_section = $this->uri->segment(4);		
		$grid_position = $this->uri->segment(5);
		$grid_line = $this->uri->segment(6);
		$grid_data = $this->uri->segment(7);
		$grid_pd_process = $this->uri->segment(8);		
		$grid_data = explode('xxx', trim($grid_data));
		$this->load->model('common_model');
						
		$data["query"] = $this->pd_report_model->production_monthly_style($firstdate, $grid_data);
		$data["salary_month"] = $firstdate;
		$data["section"]  = $grid_section;
		$data["floor"]  = $grid_position;
		$data["block"]  = $grid_line;
		$data["grid_data"] = $grid_data;
		$data["grid_pd_process"] = $grid_pd_process;
		
		$this->load->view('pd/production_monthly_style',$data);
	}
}