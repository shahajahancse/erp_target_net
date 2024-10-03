<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pd_report_con extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
		/* Standard Libraries */
		$this->load->model('pd_report_model');
		$this->load->model('common_model');
		$this->load->model('acl_model');
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
		$query['month_year'] = date('F-Y', strtotime($this->uri->segment(3)));
		$query['values'] = $this->pd_report_model->production_monthly_salary_summary($grid_firstdate);
		$this->load->view('pd/production_monthly_salary_summary',$query);

	}
	
	function production_monthly_cost_sheet()
	{
		$grid_firstdate = $this->uri->segment(3);
		$query['month_year'] = date('F-Y', strtotime($this->uri->segment(3)));
		$query['values'] = $this->pd_report_model->production_monthly_cost_sheet($grid_firstdate);
		$this->load->view('pd/production_monthly_cost_sheet',$query);

	}
	
}