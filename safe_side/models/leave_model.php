<?php
class Leave_model extends CI_Model{
	
	
	function __construct()
	{
		parent::__construct();
		
		/* Standard Libraries */
	}
	function save_leave_db()
	{	
		$empid_leave=$this->input->post('empid_leave');
		$sStartDate=$this->input->post('start_leave_date');
		$sStartDate = date("Y-m-d", strtotime($sStartDate)); 
		$sEndDate=$this->input->post('end_leave_date');
		$sEndDate = date("Y-m-d", strtotime($sEndDate));
		$leave_type=$this->input->post('leave_type');
		
		$startyear_leave = trim( substr($sStartDate,1,4 ) );
		$endyear_leave = trim( substr($sEndDate,1,4 ) );
		 
		$query_numrows = $this->empid_test($empid_leave);  //check the valid emp id
		if(!$query_numrows->num_rows())
		{
			return  "Invalid employee ID";
		}
		$query_marital_status = $this->employee_per_info($empid_leave); //collect the employee personal information
		foreach ($query_marital_status->result() as $row) {
		$emp_sex = $row->emp_sex ;
   		$emp_maritalstatus = $row->emp_marital_status ;
		}
		
		$emp_status = $this->find_emp_status($empid_leave);  //collect employee category id
		//echo $emp_status;
		if($emp_status == 0)
		{
				return "Employee ID does not exist";
		}
		elseif($emp_status == 2 && $leave_type == "ml")
		{
			 return "Probationer Employee Doesn't Entitle Maternity Leave";
		}
		elseif($emp_status == 2 && $leave_type == "pl")
		{
			 return "Probationer Employee Doesn't Entitle Paternity Leave";
		}
		elseif($emp_status == 5 && $leave_type == "ml")
		{
			 return "Contractual Employee Doesn't Entitle Maternity Leave";
		}
		elseif($emp_status == 5 && $leave_type == "pl")
		{
			 return "Contractual Employee Doesn't Entitle Paternity Leave";
		}
		else if($emp_maritalstatus ==1 && $leave_type == "ml" || $emp_maritalstatus ==1 && $leave_type == "pl" )
		{
			return "Unmarried Employee Doesn't Entitle Maternity or Paternity Leave";
		}
		elseif($emp_sex == 1 && $leave_type == "ml")
		{
			 return "Male Employee Doesn't Entitle Maternity Leave";
		}
		elseif($emp_sex == 2 && $leave_type == "pl")
		{
			 return "Female Employee Doesn't Entitle Paternity Leave";
		}
		else
		{
		    $pass_leave = $this->pass_leave_cal($empid_leave,$startyear_leave,$leave_type);  //coleect the employee passing selected leave
			//take the  main leave balance
			
			if($leave_type == "el")
			{
				$this->db->select('earn_balance');
				$this->db->where("emp_id", $empid_leave);
				$query = $this->db->get('pr_leave_earn');
				$rows = $query->row();
				$leave_balance = $rows->earn_balance;
				//echo $leave_balance;
			}
			else
			{
				$leave_balance = $this->leave_status_check($emp_status,$leave_type,$empid_leave,$sStartDate,$sEndDate); //coleect the employee balance selected leave
			}
			//echo $pass_leave;
			$due_leave = $leave_balance - $pass_leave ;
		
				$days = $this->GetDays($sStartDate,$sEndDate);
				$result = count($days);	
				if($due_leave < $result)
				{
					// echo "Leave Exceed"." ".$result;
					echo "Leave Exceed";
				}
				else
				{
					//echo "welcome"." ".$result;
					$this->leave_insert($emp_status,$leave_type,$empid_leave,$sStartDate,$sEndDate);
					echo "Save Successfully";
				}
		
		}
	}
	
	function empid_test($empid)
	{
		$this->db->select('*')->from('pr_emp_per_info')->where('emp_id', $empid);
		$query_numrows = $this->db->get();
		return $query_numrows;
	}
	function employee_per_info($empid)
	{
		$this->db->select('*');//get married and unmarried
		$this->db->where("emp_id", $empid);
		$query_marital_status = $this->db->get('pr_emp_per_info');
		return $query_marital_status;
	}
	function pass_leave_cal($empid_leave,$startyear_leave,$leave_type)
	{
		$this->db->select('id');	
		$this->db->where('emp_id',$empid_leave);
		$this->db->where('leave_type',$leave_type);
		$where="trim( substr(start_date,2,4 ) ) = '$startyear_leave' ";
		$this->db->where($where);
		$query_leave = $this->db->get('pr_leave_trans');
		$pass_leave =  $query_leave->num_rows();
		return $pass_leave;
	}
	function find_emp_status($emp)
	{
		$this->db->select('*');
		$this->db->where("emp_id", $emp);
		$query = $this->db->get('pr_emp_com_info');
		//echo $this->db->last_query();
		$num_rows = $query->num_rows();
		foreach ($query->result() as $row) {
   		$emp_status = $row->emp_cat_id ;
		}
		
		if ($num_rows == 0 )
		{
		  return 0;
		}
		else
		{
			return $emp_status;
		}
	}

	function leave_status_check($emp_status,$leave_type,$empid_leave,$sStartDate,$sEndDate)
	{
	    $this->db->select('*');
		$this->db->where("status_id", $emp_status);
		$balance_query = $this->db->get('pr_leave');
		//echo $this->db->last_query();
		foreach ($balance_query->result() as $row) {
   		$casual_balance = $row->lv_cl ;
		$sick_balance = $row->lv_sl ;
		$maternity_balance = $row->lv_ml ;
		$paternity_balance = $row->lv_pl ;
		}
		if($leave_type == "cl")
		{
			return $casual_balance;
		}
		else if($leave_type == "sl")
		{
			return $sick_balance;
		}
		else if($leave_type == "ml")
		{
			return $maternity_balance;
		}
		else if($leave_type == "pl")
		{
			return $paternity_balance;
		}
		else if($leave_type == "el")
		{
			$year = substr($sStartDate,1,4);
			return $total_earn_leave = $this->get_earn_leave($empid_leave, $year);
		}
		else
		{
			$this->leave_insert($emp_status,$leave_type,$empid_leave,$sStartDate,$sEndDate);  // for without pay , study leave ectc.
					echo "Save Successfully";
			exit ();
		//$this->leave_insert($emp_status,$leave_type,$empid_leave,$sStartDate,$sEndDate);
			//return "Save successfully";
		}

	}
	
	function leave_insert($emp_status,$leave_type,$empid_leave,$sStartDate,$sEndDate)
	{
		$days = $this->GetDays($sStartDate,$sEndDate);
		
		
		foreach($days as $day)
		{
			$this->leave_duplicate_entry_check($empid_leave, $day);
			$data = array(
					'emp_id'		=> $empid_leave,
					'start_date'    => $day ,
					'leave_type'	=> $leave_type	);
			$this->db->insert('pr_leave_trans', $data);
		}
		
		if($leave_type == "el")
		{
			$this->db->select('earn_balance');
			$this->db->where("emp_id", $empid_leave);
			$query = $this->db->get('pr_leave_earn');
			$rows = $query->row();
			$leave_balance = $rows->earn_balance;
			
			$earn = count($days);
			$earn_balance = $leave_balance - $earn;
			$data = array(
               'earn_balance' =>$earn_balance,
			   'last_update' => date("Y-m-d")
            );
		$this->db->where("emp_id",$empid_leave);
		$this->db->update('pr_leave_earn', $data); 
		
		}
	}
	
	function leave_duplicate_entry_check($empid_leave, $day)
	{
		$this->db->select('leave_type');
		$where="emp_id = '$empid_leave' and  start_date = '$day' ";
		$this->db->where($where);
		$query = $this->db->get('pr_leave_trans');
		$num_rows = $query->num_rows();
		if ($num_rows > 0 )
		{
			echo "Duplicate date not allow";
			exit();
		}
		else
		{
			return true;
		}
	}
		
	function leave_transaction_db()
	{
		$empid=$this->input->post('empid');
		$year=$this->input->post('year');
		
		
		$query_numrows = $this->empid_test($empid);
		if(!$query_numrows->num_rows())
		{
			return  "Invalid employee ID";
		}
	
		$leave_type_cl='cl';
		$leave_type_sl='sl';
		$leave_type_el='el';
		$leave_type_pl='pl';
		$leave_type_ml='ml';
		
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
	    $where="emp_id = '$empid' and leave_type = '$leave_type_pl' and trim( substr(start_date,1,4 ) ) = '$year' ";
    	$this->db->where($where);
		$query = $this->db->get('pr_leave_trans');
		$total_paternity_leave = $query->num_rows();
		
		$this->db->select('leave_type');
	    $where="emp_id = '$empid' and leave_type = '$leave_type_ml' and trim( substr(start_date,1,4 ) ) = '$year' ";
    	$this->db->where($where);
		$query = $this->db->get('pr_leave_trans');
		$total_maternity_leave = $query->num_rows();
		
		 
		$data1=array(
					'casual'    =>$total_casual_leave,
					'sick'      =>$total_sick_leave,
					'earn'      =>$total_earn_leave,
					'maternity' =>$total_maternity_leave,
					'paternity' =>$total_paternity_leave
					);
				  $data_leave_emp = implode("-*-",$data1);
					//echo $data_leave_emp ;
					
					
	 //leave balance test
		$query_marital_status = $this->employee_per_info($empid);
		
		foreach ($query_marital_status->result() as $row) {
		$emp_sex = $row->emp_sex ;
   		$emp_maritalstatus = $row->emp_marital_status ;
		}
	 	
		$this->db->select('emp_cat_id');
		$this->db->where("emp_id", $empid);
		$query_status = $this->db->get('pr_emp_com_info');
		
		foreach ($query_status->result() as $row) {
   		$empstatus = $row->emp_cat_id ;
		}
		
		if($empstatus == 6)
		{
			return  "Invalid employee ID";
		}
		
		$this->db->select('stat_des');
		$this->db->where("stat_id", $empstatus);
		$status_name = $this->db->get('pr_emp_status');
		
		foreach ($status_name->result() as $row) {
   		$status_name = $row->stat_des ;
		}
		
		$this->db->select('*');
		$this->db->where("status_id", $empstatus);
		$query_balance = $this->db->get('pr_leave');
		
		foreach ($query_balance->result() as $row) {
   		$casual_leave_balance = $row->lv_cl ;
		$sick_leave_balance = $row->lv_sl ;
		//$maternity_leave_balance = $row->lv_ml ;
		//$paternity_leave_balance = $row->lv_pl ;
			if($emp_maritalstatus == 1)
			{
			$maternity_leave_balance = 0;
			$paternity_leave_balance = 0;
			}
			else
			{
				if($emp_sex==1)//for male
				{
				$maternity_leave_balance = 0 ;
				$paternity_leave_balance = $row->lv_pl ;
				}
				else 
				{
				$maternity_leave_balance = $row->lv_ml ;
				$paternity_leave_balance = 0;
				}
			}
		}
		
		//$earn_leave_balance = $this->get_earn_leave($empid, $year);
		
		$this->db->select('old_earn_balance,current_earn_balance');
		$this->db->where("emp_id", $empid);
		$query = $this->db->get('pr_leave_earn');
		if($query->num_rows() > 0){
			$rows = $query->row();
			$earn_leave_balance = $rows->old_earn_balance;
		}else{
			$earn_leave_balance = 0;
		}
				
		$data2=array(
					'casual_balance'    =>$casual_leave_balance,
					'sick_balance'      =>$sick_leave_balance,
					'earn_balance'      =>$earn_leave_balance,
					'maternity_balance' =>$maternity_leave_balance,
					'paternity_balance' =>$paternity_leave_balance,
					'status_name'       =>$status_name
					);
				$data_leave_com = implode("-*-",$data2);
				
				return $data_leave_emp."***".$data_leave_com;	
			
	}	
	
	function get_earn_leave($empid, $year)
	{
		$total_present = $this->get_total_present_by_year($empid, $year);
		$earn_leave_balance = $total_present / 18;		
		return $earn_leave_balance = floor($earn_leave_balance);
	}
	
	function get_total_present_by_year($empid, $year)
	{
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
		return $total_present;
	}
	
	function grid_maternity_benefit($grid_emp_id)
	{
		$this->db->select('pr_emp_com_info.emp_id, pr_emp_per_info.emp_full_name, pr_emp_per_info.img_source,pr_emp_per_info.emp_dob, pr_emp_com_info.emp_join_date , pr_emp_com_info.emp_desi_id, pr_emp_com_info.emp_sec_id, pr_emp_add.emp_pre_add, pr_emp_add.emp_par_add');
		$this->db->from('pr_emp_com_info');
		$this->db->from('pr_emp_per_info');
		$this->db->from('pr_emp_add');
		$this->db->where_in("pr_emp_com_info.emp_id", $grid_emp_id);
		$this->db->where("pr_emp_com_info.emp_id = pr_emp_per_info.emp_id");
		$this->db->where("pr_emp_com_info.emp_id = pr_emp_add.emp_id");
		$this->db->where('pr_emp_per_info.emp_sex', 2);
		return $query = $this->db->get();
	}
	
	function get_designation($emp_desi_id)
	{
		$this->db->select('desig_name');
		$this->db->where('desig_id', $emp_desi_id);
		$query = $this->db->get('pr_designation');
		$row = $query->row();
		return $desig_name = $row->desig_name;
	}
	
	function get_section_name($emp_sec_id)
	{
		$this->db->select('sec_name');
		$this->db->where('sec_id', $emp_sec_id);
		$query = $this->db->get('pr_section');
		$row = $query->row();
		return $sec_name = $row->sec_name;
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
	
}
?>