<?php
class Pf_model extends CI_Model{
	
	
	function __construct()
	{
		parent::__construct();
		
		/* Standard Libraries */
		$this->load->model('common_model');
	}
	
	function provident_fund_calculation($emp_id, $start_date,$doj,$gross_sal,$basic_sal)
	{
  		$check_bank_interest = $this->pf_model->check_bank_interest($start_date);
							
		$ot_title =$this->common_model->get_ot_title($emp_id);//1=stuff
		if($ot_title=="1")
		{
			$service_month = $this->common_model->get_service_month($start_date,$doj);
			if($service_month >= 0)
			{
				$provident_fund_rules = $this->get_provident_fund_rules($service_month);
				$provident_fund = $this->get_provident_fund($emp_id,$provident_fund_rules,$gross_sal,$basic_sal,$start_date, $check_bank_interest);
				$pf 				= $provident_fund["pf_deduct_amount"];
				$bank_interest	 	= $provident_fund["bank_interest"];
				$company_pf 		= $provident_fund["company_pf"];
				$total_update_pf 	= $provident_fund["update_pf"];
				
				$data["provident_fund"] = $pf;
				$data["bank_interest"] 	= $bank_interest;
				$data["company_pf"] 	= $company_pf;
				$data["update_pf"] 		= $total_update_pf;
				//echo "$emp_id".$pf."==".$total_update_pf;
			}
			else
			{
				$pf = 0;
				$data["provident_fund"] = $pf;
				$data["bank_interest"] 	= 0;
				$data["company_pf"] 	= 0;
				$data["update_pf"] 		= 0;
			}
		}
		else
		{
			$pf = 0;
				$data["provident_fund"] = $pf;
				$data["bank_interest"] 	= 0;
				$data["company_pf"] 	= 0;
				$data["update_pf"] 		= 0;
		}
		return $data;
	}
	
	function get_provident_fund_rules($service_month)
	{
		$data = array();
		$this->db->select('*');
		$this->db->where('pf_start_month <=', $service_month); 
		$this->db->where('pf_end_month >', $service_month); 
		//$this->db->order_by('effective_date','DESC');
		//$this->db->limit(1);
		$query = $this->db->get('pr_provident_fund_rules');
		//echo $this->db->last_query();
		//echo 'R:'.$num = $query->num_rows().'|';
		$row = $query->row();
		$data['pf_percentage'] 			= $row->pf_percentage;
		$data['pf_deduct_percentage'] 	= $row->pf_deduct_percentage;
		$data['salay_type'] 			= $row->salay_type;
		return $data;
	}
	
	function get_provident_fund($emp_id,$provident_fund_rules,$gross_sal,$basic_sal,$start_date, $check_bank_interest)
	{
		$pf_percentage 			= $provident_fund_rules['pf_percentage'];
		$pf_deduct_percentage 	= $provident_fund_rules['pf_deduct_percentage'];
		$salay_type 			= $provident_fund_rules['salay_type']; 
		
		if($salay_type == "Gross")
		{
			$salary_for_pf = $gross_sal;
		}
		else
		{
			$salary_for_pf = $basic_sal; 
		}
		
		$pf_deduct_amount = ($salary_for_pf * $pf_deduct_percentage)/100;
		$bank_interest    = ($pf_deduct_amount * $check_bank_interest) / 100;
		$company_pf = ($pf_deduct_amount * $pf_percentage) / 100;
		
		$total_update_pf = $pf_deduct_amount + $bank_interest + $company_pf;
		//$sum_update_pf_after_percent = ($update_pf * $pf_percentage)/100;
		//$total_update_pf = $sum_update_pf_after_percent + $update_pf;
		
		$data["pf_deduct_amount"] 	= $pf_deduct_amount;
		$data["bank_interest"] 		= $bank_interest;
		$data["company_pf"] 		= $company_pf;
		$data["update_pf"] 			= $total_update_pf;
		return $data;
	}
	
	function get_update_pf($emp_id,$start_date)
	{
		$query = $this->db->query("select SUM(`provident_fund`) AS provident_fund FROM  (SELECT * FROM  pr_pay_scale_sheet WHERE `emp_id`='$emp_id' GROUP BY `salary_month`) AS pay_sheet WHERE pay_sheet.salary_month <= '$start_date'");
		//echo $this->db->last_query();
		if($query->num_rows() > 0)
		{
			$row = $query->row();
			$sum_update_pf =  $row->provident_fund;
			return $sum_update_pf;
		}
		else
		{
			return $sum_update_pf = 0;	
		}
	}
	
	function check_bank_interest($start_date)
	{
		$start_date = date('Y-m', strtotime($start_date));
		$this->db->select('bank_interest_rate ');	
		$this->db->where("trim(substr(month,1,7))",$start_date);
		$query = $this->db->get('pr_pf_bank_interests');
		//echo $this->db->last_query();
		if($query->num_rows() > 0){return $query->row()->bank_interest_rate;}else{false;}
	}
	
	function get_pf_statement($emp_id, $year, $month)
	{
		$date = date("Y-m-d", mktime(0, 0, 0, $month, 1, $year));
		$this->db->select('emp_id,provident_fund, pf_bank_interest, company_pf, update_pf, salary_month');
		$this->db->where('emp_id',$emp_id);	
		$this->db->where('salary_month <=',$date);
		$this->db->order_by('salary_month','ASC');
		$query = $this->db->get('pr_pay_scale_sheet');	
		//echo $this->db->last_query();
		return $query->result_array();
	}
}
?>