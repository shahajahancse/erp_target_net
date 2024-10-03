<?php
class Common_model extends CI_Model{
	
	
	function __construct()
	{
		parent::__construct();
		
		/* Standard Libraries */
	}
	
	function salary_structure($gross_salary)
	{
		$data = array();
		
		$data['medical_allow'] = 200;
		$data['gross_salary'] = $gross_salary;
		$data['basic_sal'] 	   = round(($gross_salary - $data['medical_allow']) / 1.4);
		$data['house_rent']    = round($data['basic_sal'] * 40 / 100);
		$data['ot_rate']       = round(($data['basic_sal'] * 2  / 208),2);
		return $data;
	}
	
	function get_setup_attributes($setup_id)
	{
		$this->db->select('value');
		$this->db->where("id",$setup_id);
		$query = $this->db->get('pr_setup');
		$rows = $query->row();
		$setup_value = $rows ->value;
		return $setup_value;
	}
	
	function allowance_bills($id)
	{
		$data = array();
		$this->db->select('*');
		$this->db->where("id",$id);
		$query = $this->db->get('pr_allowance_bills');
		foreach($query->result() as $rows)
		{
			$data['first_tiffin_allo_min'] = $rows ->first_tiffin_allo_min;
			$data['second_tiffin_allo_min'] = $rows ->second_tiffin_allo_min;
			$data['night_allo_min'] = $rows ->night_allo_min;
			$data['first_tiffin_allo_amount'] = $rows ->tiffin_allo_amount;
			$data['second_tiffin_allo_amount'] = $rows ->tiffin_allo_amount;
			$data['night_allo_amount'] = $rows ->night_allo_amount;
			//echo $rows ->first_tiffin_allo_min;
		}
		
		return $data;
	}
	
	function get_ot_title($emp_id)
	{
		$this->db->select('ot_entitle');
		$this->db->where('emp_id',$emp_id);
		$query = $this->db->get('pr_emp_com_info');
		$row = $query->row();
		return $row->ot_entitle;
	}
	
	function get_service_month($effective_date,$doj)
	{
		$date_diff 		= strtotime($effective_date)-strtotime($doj);
		//DATE TO DATE RULE
		//return $month 	= floor(($date_diff)/2592000);
		
		//MONTH TO MONTH RULE
		return $month 	= ceil(($date_diff)/2628000);
	}
	
	function get_gross_salary($emp_id)
	{
		$this->db->select('gross_sal');
		$this->db->where('emp_id',$emp_id);
		$query = $this->db->get('pr_emp_com_info');
		$row = $query->row();
		return $row->gross_sal;
	}
	
	function company_information($select_value)
	{
		$query 	= $this->db->select($select_value)->get('company_infos');
		$row 	= $query->row();
		return $row->$select_value;
	}
	
	//PRODUCTION RELATED METHODS GOES HERE...
	function check_article_id_existance($article_id_pk)
	{
		$this->db->select('article_id_pk');
		$this->db->where('article_id_pk',$article_id_pk);
		$query = $this->db->get('pd_style_infos');
		if($query->num_rows() > 0){ return true;}else{ return false;}
	}
	
	function color_wise_lot_duplicate_entry_check($article_id, $color_id)
	{
		$this->db->select('article_id');
		$this->db->where('article_id',$article_id);
		$this->db->where('color_id',$color_id);
		$query = $this->db->get('pd_color_wise_lots');
		if($query->num_rows() > 0){ return false;}else{ return true;}
	}
	
	function color_fixed_for_article_check($article_id, $color_id)
	{
		$this->db->select('article_id');
		$this->db->where('article_id',$article_id);
		$this->db->where('color_id',$color_id);
		$query = $this->db->get('pd_color_wise_lots');
		if($query->num_rows() > 0){ return false;}else{ return true;}
	}
	
	function get_color_id_by_pk($primary_key)
	{
		$this->db->select('color_id');
		$this->db->where('id',$primary_key);
		$query = $this->db->get('pd_color_wise_lots');
		if($query->num_rows() > 0){ return $color_id = $query->row()->color_id;}else{ return false;}
	}
	
	function get_section_name($sec_id)
	{
		$this->db->select('sec_name');
		$this->db->where('sec_id',$sec_id);
		$query = $this->db->get(' pr_section');
		if($query->num_rows() > 0){ return $sec_name = $query->row()->sec_name;}else{ return false;}
	}
	
	function get_position_name($posi_id)
	{
		$this->db->select('posi_name');
		$this->db->where('posi_id',$posi_id);
		$query = $this->db->get('pr_emp_position');
		if($query->num_rows() > 0){ return $posi_name = $query->row()->posi_name;}else{ return false;}
	}
	
	function get_line_name($line_id)
	{
		$this->db->select('line_name');
		$this->db->where('line_id',$line_id);
		$query = $this->db->get('pr_line_num');
		if($query->num_rows() > 0){ return $line_name = $query->row()->line_name;}else{ return false;}
	}
	
	function get_size_id_by_pk_for_size_wise($primary_key)
	{
		$this->db->select('size_id');
		$this->db->where('id',$primary_key);
		$query = $this->db->get('pd_size_wise_lots');
		if($query->num_rows() > 0){ return $size_id = $query->row()->size_id;}else{ return false;}
	}
	
	function size_wise_lot_existance_check($article_id, $color_id, $size_id)
	{
		$this->db->select('article_id');
		$this->db->where('article_id',$article_id);
		$this->db->where('color_id',$color_id);
		$this->db->where('size_id',$size_id);
		$query = $this->db->get('pd_size_wise_lots');
		if($query->num_rows() > 0){ return false;}else{ return true;}
	}
	function  get_prev_month($probation_period,$year_month)
	{	
		//$probation_period = $probation_period -1;
		
		$text ="-".$probation_period."month";
		$prev_month = strtotime($text, strtotime($year_month));
		$prev_month = date("Y-m", $prev_month);
		return $prev_month;
	}
	function get_left_emp($salary_month)
	{
		$i = 1;
		$this->db->select('pr_emp_left_history.emp_id');
		$this->db->from('pr_emp_left_history');
		$this->db->where("trim(substr(pr_emp_left_history.left_date,1,7)) <= '$salary_month'");
		$query = $this->db->get();
		if($query->num_rows() > 0)
		{
		  foreach ($query->result() as $row)
		  {
			  $emp_id[] = $row->emp_id;
			  //echo "$i .$row->emp_id<br>";
			  //$i = $i + 1;
			  
		  }
		  return $emp_id ;
		}
		else
		{
			return $emp_id[] = 0  ;
		}
	}
	function get_resign_emp($salary_month)
	{
		$i = 1;
		$this->db->select('pr_emp_resign_history.*');
		$this->db->from('pr_emp_resign_history');
		$this->db->where("trim(substr(pr_emp_resign_history.resign_date,1,7)) <= '$salary_month'");
		$query = $this->db->get();
		if($query->num_rows() > 0)
		{
		  foreach ($query->result() as $row)
		  {
			  $emp_id[] = $row->emp_id;
			  //echo "$i .$row->emp_id<br>";
			  //$i = $i + 1;
			  
		  }
		  return $emp_id ;
		}
		else
		{
			return $emp_id[] = 0  ;
		}
	}
	function get_all_employee_for_selection($dept,$section,$line,$desig,$sex,$status,$position,$salary_month,$salary_type)
	{
		$sal_year_month = "$salary_month-01";
		$i = 1;
		$this->db->select('pr_emp_per_info.*');
		$this->db->from('pr_emp_per_info');
		$this->db->from('pd_pay_scale_sheet');
		$this->db->where('pr_emp_per_info.emp_id = pd_pay_scale_sheet.emp_id');
		$this->db->where("pd_pay_scale_sheet.salary_month = '$sal_year_month'");
		if($dept !="Select")
		{
			$this->db->where("pd_pay_scale_sheet.dept_id", $dept);
		}
		if($section !="Select")
		{
			$this->db->where("pd_pay_scale_sheet.sec_id", $section);
		}
		if($line !="Select")
		{
			$this->db->where("pd_pay_scale_sheet.block_id ", $line);
		}
		if($desig !="Select")
		{
			$this->db->where("pd_pay_scale_sheet.desig_id", $desig);
		}
		if($position !="Select")
		{
			$this->db->where("pd_pay_scale_sheet.floor_id", $position);
		}
		if($sex !="Select")
		{
			$this->db->where("pd_pay_scale_sheet.emp_sex", $sex);
		}
		if($status !="ALL" )
		{
			$this->db->where("pd_pay_scale_sheet.status_id", $status);
		}
		if($salary_type !="Select" )
		{
			$this->db->where("pd_pay_scale_sheet.sal_type", $salary_type);
		}
		$this->db->order_by('pr_emp_per_info.emp_id');
		$query = $this->db->get();
		//echo $query->num_rows();
		return $query;
	}
	
	
	function get_all_employee_for_selection_for_fixed($dept,$section,$line,$desig,$sex,$status,$position,$salary_month,$salary_type)
	{
		//$get_left_emp = $this->get_left_emp_all_sts($salary_month);
		//$get_resign_emp = $this->get_resign_emp_all_sts($salary_month);
		$sal_year_month = "$salary_month-01";
		$i = 1;
		$this->db->select('pr_emp_per_info.*');
		//$this->db->from('pr_emp_com_info');
		$this->db->from('pr_emp_per_info');
		$this->db->from('pr_pay_scale_sheet');
		//$this->db->where('pr_emp_per_info.emp_id = pr_emp_com_info.emp_id');
		$this->db->where('pr_emp_per_info.emp_id = pr_pay_scale_sheet.emp_id');
		$this->db->where("pr_pay_scale_sheet.salary_month = '$sal_year_month'");
		if($dept !="Select")
		{
			$this->db->where("pr_pay_scale_sheet.dept_id", $dept);
		}
		if($section !="Select")
		{
			$this->db->where("pr_pay_scale_sheet.sec_id", $section);
		}
		if($line !="Select")
		{
			$this->db->where("pr_pay_scale_sheet.block_id ", $line);
		}
		if($desig !="Select")
		{
			$this->db->where("pr_pay_scale_sheet.desig_id", $desig);
		}
		if($position !="Select")
		{
			$this->db->where("pr_pay_scale_sheet.floor_id", $position);
		}
		if($sex !="Select")
		{
			$this->db->where("pr_pay_scale_sheet.emp_sex", $sex);
		}
		if($status !="ALL" )
		{
			$this->db->where("pr_pay_scale_sheet.status_id", $status);
		}
		if($salary_type !="Select" )
		{
			$this->db->where("pr_pay_scale_sheet.sal_type", $salary_type);
		}
		$this->db->order_by('pr_emp_per_info.emp_id');
		$query = $this->db->get();
		//echo $query->num_rows();
		return $query;
	}
	
	
	function get_new_employee_for_selection($dept,$section,$line,$desig,$sex,$status,$position,$salary_month)
	{
		$probation_period 	= $this->get_setup_attributes(10);
		$prev_prob_month 	= $this->get_prev_month($probation_period,$salary_month);
		$get_left_emp 		= $this->get_left_emp($salary_month);
		$get_resign_emp 	= $this->get_resign_emp($salary_month);
		$i = 1;
		
		$this->db->select('pr_emp_per_info.*');
		$this->db->from('pr_emp_com_info');
		$this->db->from('pr_emp_per_info');
		$this->db->where('pr_emp_per_info.emp_id = pr_emp_com_info.emp_id');
		if($dept !="Select")
		{
			$this->db->where("pr_emp_com_info.emp_dept_id", $dept);
		}
		if($section !="Select")
		{
			$this->db->where("pr_emp_com_info.emp_sec_id", $section);
		}
		if($line !="Select")
		{
			$this->db->where("pr_emp_com_info.emp_line_id ", $line);
		}
		if($desig !="Select")
		{
			$this->db->where("pr_emp_com_info.emp_desi_id", $desig);
		}
		if($position !="Select")
		{
			$this->db->where("pr_emp_com_info.emp_position_id", $position);
		}
		if($sex !="Select")
		{
			$this->db->where("pr_emp_per_info.emp_sex", $sex);
		}
		$this->db->where("trim(substr(pr_emp_com_info.emp_join_date,1,7)) <= '$salary_month'");
		$this->db->where("trim(substr(pr_emp_com_info.emp_join_date,1,7)) >= '$prev_prob_month'");
		$this->db->where_not_in('pr_emp_com_info.emp_id',$get_left_emp);
		$this->db->where_not_in('pr_emp_com_info.emp_id',$get_resign_emp);
		$this->db->order_by('pr_emp_com_info.emp_id');
		$query = $this->db->get();
		return $query;
		/*echo $this->db->last_query();
		foreach ($query->result() as $row)
		{
			$emp_id = $row->emp_id;
			echo "$i .$emp_id<br>";
			$i = $i + 1;
		}*/
	}
	function get_regular_employee_for_selection($dept,$section,$line,$desig,$sex,$status,$position,$salary_month)
	{
		$probation_period 	= $this->get_setup_attributes(10);
		$prev_prob_month 	= $this->get_prev_month($probation_period,$salary_month);
		$get_left_emp 		= $this->get_left_emp($salary_month);
		$get_resign_emp 	= $this->get_resign_emp($salary_month);
		$sal_year_month = "$salary_month-01";
		$i = 1;
		$this->db->select('pr_emp_per_info.*');
		$this->db->from('pr_emp_com_info');
		$this->db->from('pr_emp_per_info');
		$this->db->from('pd_pay_scale_sheet');
		$this->db->where('pr_emp_per_info.emp_id = pr_emp_com_info.emp_id');
		$this->db->where('pr_emp_per_info.emp_id = pd_pay_scale_sheet.emp_id');
		$this->db->where("pd_pay_scale_sheet.salary_month = '$sal_year_month'");
		if($dept !="Select")
		{
			$this->db->where("pr_emp_com_info.emp_dept_id", $dept);
		}
		if($section !="Select")
		{
			$this->db->where("pr_emp_com_info.emp_sec_id", $section);
		}
		if($line !="Select")
		{
			$this->db->where("pr_emp_com_info.emp_line_id ", $line);
		}
		if($desig !="Select")
		{
			$this->db->where("pr_emp_com_info.emp_desi_id", $desig);
		}
		if($position !="Select")
		{
			$this->db->where("pr_emp_com_info.emp_position_id", $position);
		}
		if($sex !="Select")
		{
			$this->db->where("pr_emp_per_info.emp_sex", $sex);
		}
		$this->db->where("trim(substr(pr_emp_com_info.emp_join_date,1,7)) < '$prev_prob_month'");
		$this->db->where("trim(substr(pr_emp_com_info.emp_join_date,1,7)) <= '$salary_month'");
		$this->db->where_not_in('pr_emp_com_info.emp_id',$get_left_emp);
		$this->db->where_not_in('pr_emp_com_info.emp_id',$get_resign_emp);
		$this->db->order_by('pr_emp_com_info.emp_id');
		$query = $this->db->get();
		//echo $query->num_rows();
		return $query;
		/*foreach ($query->result() as $row)
		{
			$emp_id[] = $row->emp_id;
			//echo "$i .$emp_id<br>";
			//$i = $i + 1;
		}
		return $emp_id;*/
	}
	
	function get_left_employee_for_selection($dept,$section,$line,$desig,$sex,$status,$position,$salary_month)
	{
		//echo $salary_month;
		$this->db->select('pr_emp_per_info.*');
		$this->db->from('pr_emp_left_history');
		$this->db->from('pr_emp_com_info');
		$this->db->from('pr_emp_per_info');
		$this->db->where('pr_emp_per_info.emp_id = pr_emp_com_info.emp_id');
		$this->db->where('pr_emp_per_info.emp_id = pr_emp_left_history.emp_id');
		if($dept !="Select")
		{
			$this->db->where("pr_emp_com_info.emp_dept_id", $dept);
		}
		if($section !="Select")
		{
			$this->db->where("pr_emp_com_info.emp_sec_id", $section);
		}
		if($line !="Select")
		{
			$this->db->where("pr_emp_com_info.emp_line_id ", $line);
		}
		if($desig !="Select")
		{
			$this->db->where("pr_emp_com_info.emp_desi_id", $desig);
		}
		if($position !="Select")
		{
			$this->db->where("pr_emp_com_info.emp_position_id", $position);
		}
		if($sex !="Select")
		{
			$this->db->where("pr_emp_per_info.emp_sex", $sex);
		}
		$this->db->where("trim(substr(pr_emp_left_history.left_date,1,7)) = '$salary_month'");
		$this->db->order_by('pr_emp_com_info.emp_id');
		$query = $this->db->get();
		return $query;
		/*echo $this->db->last_query();
		foreach ($query->result() as $row)
		{
			$emp_id = $row->emp_id;
			echo "$i .$emp_id<br>";
			$i = $i + 1;
		}*/
	}
	
	function get_resign_employee_for_selection($dept,$section,$line,$desig,$sex,$status,$position,$salary_month)
	{
		
		$this->db->select('pr_emp_per_info.*');
		$this->db->from('pr_emp_resign_history');
		$this->db->from('pr_emp_per_info');
		$this->db->from('pr_emp_com_info');
		$this->db->where('pr_emp_per_info.emp_id = pr_emp_com_info.emp_id');
		$this->db->where('pr_emp_per_info.emp_id = pr_emp_resign_history.emp_id');
		if($dept !="Select")
		{
			$this->db->where("pr_emp_com_info.emp_dept_id", $dept);
		}
		if($section !="Select")
		{
			$this->db->where("pr_emp_com_info.emp_sec_id", $section);
		}
		if($line !="Select")
		{
			$this->db->where("pr_emp_com_info.emp_line_id ", $line);
		}
		if($desig !="Select")
		{
			$this->db->where("pr_emp_com_info.emp_desi_id", $desig);
		}
		if($position !="Select")
		{
			$this->db->where("pr_emp_com_info.emp_position_id", $position);
		}
		if($sex !="Select")
		{
			$this->db->where("pr_emp_per_info.emp_sex", $sex);
		}
		$this->db->where("trim(substr(pr_emp_resign_history.resign_date,1,7)) = '$salary_month'");
		$this->db->order_by('pr_emp_com_info.emp_id');
		$query = $this->db->get();
		return $query;
		/*echo $this->db->last_query();
		foreach ($query->result() as $row)
		{
			$emp_id = $row->emp_id;
			echo "$i .$emp_id<br>";
			$i = $i + 1;
		}*/
	}
	
	
	
	
	//================================== Below Code Written For ALL Status=============================
	//=================================================================================================
	function get_all_employee($salary_month)

	{
		$get_left_emp = $this->get_left_emp_all_sts($salary_month);
		$get_resign_emp = $this->get_resign_emp_all_sts($salary_month);
		//print_r($get_resign_emp);
		$i = 1;
		$this->db->select('pr_emp_per_info.*');
		$this->db->from('pr_emp_com_info');
		$this->db->from('pr_emp_per_info');
		$this->db->where('pr_emp_per_info.emp_id = pr_emp_com_info.emp_id');
		$this->db->where("trim(substr(pr_emp_com_info.emp_join_date,1,7)) <= '$salary_month'");
		$this->db->where_not_in('pr_emp_com_info.emp_id',$get_left_emp);
		$this->db->where_not_in('pr_emp_com_info.emp_id',$get_resign_emp);
		$this->db->order_by('pr_emp_com_info.emp_id');
		$query = $this->db->get();
		return $query;
		/*foreach ($query->result() as $row)
		{
			$emp_id[] = $row->emp_id;
			//echo "$i .$emp_id<br>";
			//$i = $i + 1;
		}
		return $emp_id;*/
	}
	function get_left_emp_all_sts($salary_month)
	{
		$i = 1;
		$this->db->select('pr_emp_left_history.emp_id');
		$this->db->from('pr_emp_left_history');
		$this->db->where("trim(substr(pr_emp_left_history.left_date,1,7)) < '$salary_month'");
		$query = $this->db->get();
		if($query->num_rows() > 0)
		{
		  foreach ($query->result() as $row)
		  {
			  $emp_id[] = $row->emp_id;
			  //echo "$i .$row->emp_id<br>";
			  //$i = $i + 1;
			  
		  }
		  return $emp_id ;
		}
		else
		{
			return $emp_id[] = 0  ;
		}
	}
	function get_resign_emp_all_sts($salary_month)
	{
		$emp_id = array();
		$i = 1;
		$this->db->select('pr_emp_resign_history.*');
		$this->db->from('pr_emp_resign_history');
		$this->db->where("trim(substr(pr_emp_resign_history.resign_date,1,7)) < '$salary_month'");
		$query = $this->db->get();
		if($query->num_rows() > 0)
		{
		  foreach ($query->result() as $row)
		  {
			  $emp_id[] = $row->emp_id;
			  //echo "$i .$row->emp_id<br>";
			  //$i = $i + 1;
			  
		  }
		  return $emp_id ;
		}
		else
		{
			return $emp_id[] = 0  ;
		}
		
	}
	
	//================================== END Code Written For ALL Status===============================
	//=================================================================================================
	
	function get_left_emp_continuous($grid_firstdate,$grid_seconddate)
	{
		$i = 1;
		$this->db->select('pr_emp_left_history.emp_id');
		$this->db->from('pr_emp_left_history');
		$where = "left_date < '$grid_firstdate'";
		//$this->db->where("trim(pr_emp_left_history.left_date)) <= '$salary_month'");
		$this->db->where($where);
		$query = $this->db->get();
		if($query->num_rows() > 0)
		{
		  foreach ($query->result() as $row)
		  {
			  $emp_id[] = $row->emp_id;
			  //echo "$i .$row->emp_id<br>";
			  //$i = $i + 1;
			  
		  }
		  return $emp_id ;
		}
		else
		{
			return $emp_id[] = 0  ;
		}
	}
	function get_resign_emp_continuous($grid_firstdate,$grid_seconddate)
	{
		$i = 1;
		$this->db->select('pr_emp_resign_history.*');
		$this->db->from('pr_emp_resign_history');
		//$this->db->where("trim(substr(pr_emp_resign_history.resign_date,1,7)) <= '$salary_month'");
		$where = "resign_date <'$grid_firstdate'";
		$this->db->where($where);
		$query = $this->db->get();
		if($query->num_rows() > 0)
		{
		  foreach ($query->result() as $row)
		  {
			  $emp_id[] = $row->emp_id;
			  //echo "$i .$row->emp_id<br>";
			  //$i = $i + 1;
			  
		  }
		  return $emp_id ;
		}
		else
		{
			return $emp_id[] = 0  ;
		}
	}
	
	function get_pd_log_table_name($pd_log_date){
		
		if($pd_log_date <= '2016-02-20'){
			return $pd_log_table_name = 'pd_production_logs';
		}
		$day = date('d',strtotime($pd_log_date));
		if($day >= '21'){
			$year_month = date("Y-m", strtotime("+1 month", strtotime($pd_log_date)));
		}
		else{
			$year_month = date("Y-m", strtotime($pd_log_date));	
		}
		
		$pd_log_table_name = "pd_logs_".$year_month;
		
		if (!$this->db->table_exists($pd_log_table_name))
		{
			$this->load->dbforge();	
			$fields = array(
			'id' 			=> array( 'type' => 'INT','constraint' 		=> '11',  'auto_increment' => TRUE),
			'emp_id'  		=> array( 'type' => 'VARCHAR','constraint' 	=> '100'),
			'article_id' 	=> array( 'type' => 'INT','constraint' 		=> '11'),
			'section_id'  	=> array( 'type' => 'INT','constraint' 		=> '11'),
			'floor_id' 		=> array( 'type' => 'INT','constraint' 		=> '11'),
			'block_id' 		=> array( 'type' => 'INT','constraint' 		=> '11'),
			'process_id' 	=> array( 'type' => 'INT','constraint' 		=> '11'),
			'color_id'  	=> array( 'type' => 'INT','constraint' 		=> '11'),
			'size_id'  		=> array( 'type' => 'INT','constraint' 		=> '11'),
			'quantity'  	=> array( 'type' => 'INT','constraint' 		=> '11'),
			'date'  		=> array( 'type' => 'date'),
			'username'  	=> array( 'type' => 'VARCHAR','constraint' 	=> '100'),
			'date_time'  	=> array( 'type' => 'datetime')
			);
			$this->dbforge->add_field($fields);
			$this->dbforge->add_key('id', TRUE);
			$this->dbforge->create_table($pd_log_table_name);	
			$this->db->query("ALTER TABLE `$pd_log_table_name` ADD INDEX (emp_id)");
			$this->db->query("ALTER TABLE `$pd_log_table_name` ADD INDEX (date)");	
		}
	return $pd_log_table_name;
	}
	
	function get_pd_log_table_monthly($year_month){
		if($year_month < '2016-03'){
			$pd_log_table = 'pd_production_logs'; 	
		}
		else{
			$pd_log_table = 'pd_logs_'.$year_month; 
		}
		return $pd_log_table;	
	}
}
?>