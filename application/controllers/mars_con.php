<?php
class Mars_con extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
		/* Standard Libraries */
		$this->load->model('mars_model');
		$this->load->model('acl_model');
		$access_level = 6;
		$acl = $this->acl_model->acl_check($access_level);
		
	}
	
	function others_report_front_end()
	{
		$this->load->view('others_report/others_report_front_end');
	}
	
	function daily_attendance_summary()
	{
		$grid_date = $this->uri->segment(3);
		list($date, $month, $year) = explode('-', trim($grid_date));
		$report_date = date("Y-m-d", mktime(0, 0, 0, $month, $date, $year));
		
		$category = $this->uri->segment(4);
		
		if($category =='Department')
		{
			$data['values'] = $this->mars_model->department_attendance_summary($report_date);
		}
		elseif($category =='Section')
		{
			$data['values'] = $this->mars_model->section_attendance_summary($report_date);
		}
		elseif($category =='Line')
		{
			$data['values'] = $this->mars_model->line_attendance_summary($report_date);
		}
		
		$data['title'] 		 = 'Daily Attendance Summary';
		$data['report_date'] = $report_date;
		$data['category']    = $category;
		
		$this->load->view('others_report/attendance_summary', $data);
		
	}
	
	function test()
	{
		$grid_date = "2012-04-07";
		list($year, $month, $date) = explode('-', trim($grid_date));
		
		$report_date = date("Y-m-d", mktime(0, 0, 0, $month, $date, $year));
		$this->mars_model->department_attendance_summary($report_date);
	}
}
?>