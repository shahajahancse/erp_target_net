<?php
class Entry_system_con extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
		/* Standard Libraries */
		$this->load->model('processdb');
		$this->load->model('grid_model');
		$this->load->model('leave_model');
		$this->load->model('log_model');
		$this->load->library('grocery_CRUD');
		$this->load->model('acl_model');
		$access_level = 3;
		$acl = $this->acl_model->acl_check($access_level);
	}
	//--------------------------------------------------------------------------------------
	// GRID Display for Entry System
	//--------------------------------------------------------------------------------------
	function grid_entry_system()
	{
		if($this->session->userdata('level')== 0 || $this->session->userdata('level')== 1)
		{
			$this->load->view('grid_entry_system');
		}
		elseif($this->session->userdata('level')==2)
		{
			$this->load->view('grid_entry_system_for_user');
		}
	}
    public function present_entry()
    {
		// dd($_POST);
		$first_date  = date('Y-m-d', strtotime($_POST['first_date']));
		$second_date = date('Y-m-d', strtotime($_POST['second_date']));
		$time        = date('H:i:s', strtotime($_POST['time']));
		$sql         = $_POST['emp_id'];
		$emp_ids     = explode(',', $sql);
        $mm = array();
        $emp_data = $this->get_emp_id($emp_ids);
        while ($first_date <= $second_date) {
            $data = array();
            foreach ($emp_data as $rows) {
                $emp_id         = $rows->emp_id;
                $proxi_id       = $rows->proxi_id;
                $shift_id       = $rows->emp_shift;
                $emp_shift = $this->emp_shift_check_process($emp_id,$shift_id,$first_date);
                $schedule  = $this->get_emp_schedule($emp_shift->shift_duty);

                $out_end   = $schedule[0]["out_end"];
                if (strtotime($time) <= strtotime($out_end)) {
                    $date = date('Y-m-d', strtotime($first_date . ' + 1 days'));
                } else {
                    $date = $first_date;
                }
                $data[] = array(
                    'date_time'       => $date ." ".$time,
                    'proxi_id'         => $proxi_id,
                    'device_id'         => 0,
                );
            }
            $mm = $this->insert_attn_process($data, $first_date, $emp_ids);
            $first_date = date('Y-m-d', strtotime('+1 days'. $first_date));
		}

        if (!empty($mm) && $mm['massage'] == 1) {
            echo 'successfully inserted';
        } else {
            echo 'Record Not Inserted';
        }
    }

    function insert_attn_process($data, $date, $emp_ids) {
        $this->load->model('attn_process_model');
        $att_table = "att_". date("Y_m", strtotime($date));
        if (!$this->db->table_exists($att_table)){
            $this->db->query('CREATE TABLE IF NOT EXISTS `'.$att_table.'`(
                    `att_id` int(11) NOT NULL AUTO_INCREMENT,
                    `device_id` int(11) NOT NULL,
                    `proxi_id` varchar(30) NOT NULL,
                    `date_time` datetime NOT NULL,
                    PRIMARY KEY (`att_id`),
                    KEY `device_id` (`device_id`,`proxi_id`,`date_time`)) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;'
            );
        }
        // $this->db->insert_batch($att_table, $data);
        // if ($this->attn_process_model->attn_process($date, $emp_ids)) {
        if ($this->db->insert_batch($att_table, $data)) {
            return array('massage' => 1);
        } else {
            return array('massage' => 0);
        }
    }

	function emp_shift_check_process($emp_id, $att_date)
	{
		$this->db->select("shift_id, shift_duty");
		$this->db->from("pr_emp_shift_log");
		$this->db->where("emp_id", $emp_id);
		$this->db->where("shift_log_date", $att_date);
		$query = $this->db->get();
		$data = new stdClass();
		if($query->num_rows() > 0 ){
			$row = 		$query->row();
			$data->shift_id    = $row->shift_id;
			$data->shift_duty = $row->shift_duty;
			return $data;
		} else {
			$this->db->select("pr_emp_shift.shift_id, pr_emp_shift.shift_duty");
			$this->db->from("pr_emp_shift");
			$this->db->from("pr_emp_com_info");
			$this->db->where("pr_emp_com_info.emp_id", $emp_id);
			$this->db->where("pr_emp_shift.shift_id = pr_emp_com_info.emp_shift");
			$query2 = $this->db->get()->row();
			$infos = array(
				'emp_id' 		 => $emp_id,
				'shift_id' 		 => $query2->shift_id,
				'shift_duty' 	 => $query2->shift_duty,
				'shift_log_date' => $att_date,
			);
			$this->db->insert("pr_emp_shift_log", $infos);

			$data->shift_id   = $query2->shift_id;
			$data->shift_duty = $query2->shift_duty;
			return $data;
		}
	}
	function get_emp_schedule($schedule_id){
		$this->db->where("shift_id", $schedule_id);
		$query = $this->db->get("pr_emp_shift_schedule");
		return $query->result_array();
	}
    function get_emp_id($emp_ids) {
        $this->db->select('emp_id,proxi_id,emp_shift')->where_in("emp_id", $emp_ids);
        $ids = $this->db->get("pr_emp_com_info")->result();
        return $ids;
    }
    public function present_absent()
    {
        $sql         = $_POST['emp_id'];
        $first_date  = date('Y-m-d', strtotime($_POST['first_date']));
        $second_date = date('Y-m-d', strtotime($_POST['second_date']));
        $seconde_dat = date("Y-m-d", strtotime('+ 1 day', strtotime($second_date)));
        $emp_ids     = explode(',', $sql);
        $att_table   = "att_" . date("Y_m", strtotime($first_date));

        $first  = $first_date .' '. '06:30:00';
        $second  = $seconde_dat .' '. '06:30:00';
        if (date('t', strtotime($second_date)) == date('d', strtotime($second_date))) {
            $new_table = "att_" . date("Y_m", strtotime($second_date));
            $this->db->where("date_time BETWEEN '$first' and '$second' ");
            $this->db->where_in('proxi_id', $emp_ids)->delete($new_table);
        } else if (date('m', strtotime($first_date)) != date('m', strtotime($second_date))) {
            $new_table = "att_" . date("Y_m", strtotime($second_date));
            $this->db->where("date_time BETWEEN '$first' and '$second' ");
            $this->db->where_in('proxi_id', $emp_ids)->delete($new_table);
        }

        $this->db->where("date_time BETWEEN '$first' and '$second' ");
        $this->db->where_in('proxi_id', $emp_ids)->delete($att_table);

        $this->db->where("shift_log_date BETWEEN '$first_date' and '$second_date' ")->where_in('emp_id', $emp_ids);
        if ($this->db->delete('pr_emp_shift_log')) {
        $input_date = $first_date;
        do {
            // $this->attn_process_model->attn_process($input_date, $emp_ids);
            $input_date = date("Y-m-d", strtotime("+1 day", strtotime($input_date)));
        } while ($input_date <= $second_date);
            echo 'success';

        } else {
            echo 'Record Not Deleted';
        }
    }

    public function log_delete()
    {
        $sql         = $_POST['emp_id'];
        $first_date  = date('Y-m-d', strtotime($_POST['first_date']));
        $second_date = date('Y-m-d', strtotime($_POST['second_date']));
        $emp_ids     = explode(',', $sql);

        $this->db->where("shift_log_date BETWEEN '$first_date' and '$second_date' ")->where_in('emp_id', $emp_ids);
        if ($this->db->delete('pr_emp_shift_log')) {
            echo 'success';
        } else {
            echo 'Shift Log Not Deleted';
        }
    }

    public function log_sheet()
    {
        if ($this->session->userdata('logged_in') == false) {
            redirect("authentication");
        }

        $sql         = $_POST['emp_id'];
        $unit_id     = $_POST['unit_id'];
        $first_date  = date('Y-m-d', strtotime($_POST['first_date']));
        $second_date = date('Y-m-d', strtotime($_POST['second_date']));
        $emp_id      = explode(',', $sql);

        // final process check
		$slm = date("Y-m-01", strtotime($first_date));
		$check = $this->db->where('unit_id', $unit_id)->where('block_month',$slm)->get('pay_salary_block');
		if ($check->num_rows() > 0) {
			echo "Sorry! This Month Already Final Processed";
			return false; exit();
		} 
		// final process check end

        $this->db->select('
                    pr_emp_com_info.id,
                    pr_emp_com_info.emp_id,
                    pr_emp_com_info.unit_id,
                    pr_emp_com_info.proxi_id,
                    pr_emp_com_info.emp_join_date,
                    pr_emp_per_info.name_en,
                    emp_depertment.dept_name,
                    emp_section.sec_name_en,
                    emp_line_num.line_name_en,
                    emp_designation.desig_name,
                ');
        $this->db->from('pr_emp_com_info');
        $this->db->from('pr_emp_per_info');
        $this->db->from('emp_depertment');
        $this->db->from('emp_section');
        $this->db->from('emp_line_num');
        $this->db->from('emp_designation');

        $this->db->where('pr_emp_com_info.emp_dept_id = emp_depertment.dept_id');
        $this->db->where('pr_emp_com_info.emp_sec_id = emp_section.id');
        $this->db->where('pr_emp_com_info.emp_line_id = emp_line_num.id');
        $this->db->where('pr_emp_com_info.emp_desi_id = emp_designation.id');
        $this->db->where('pr_emp_per_info.emp_id = pr_emp_com_info.emp_id');
        $this->db->where_in('pr_emp_com_info.emp_id', $emp_id);
        $row = $this->db->get()->row();
        $this->data['row'] = $row;

        $this->db->select('pr_units.*')->where('unit_id', $row->unit_id);
        $this->data['unit'] = $this->db->get('pr_units')->row();

        $this->data['results']     = $this->Common_model->get_shift_log($row, $emp_id, $first_date, $second_date);
        $this->data['first_date']  = date('d-m-Y', strtotime($first_date));
        $this->data['second_date'] = date('d-m-Y', strtotime($second_date));
        $this->data['unit_id']     = $unit_id;
        $this->data['username']    = $this->data['user_data']->id_number;
        $this->load->view('entry_system/log_sheet', $this->data);
    }
    public function log_update()
    {
        if ($this->session->userdata('logged_in') == false) {
            redirect("authentication");
        }
        $proxi       = $_POST['proxi'];
        $emp_id      = $_POST['emp_id'];
        $unit_id      = $_POST['unit_id'];
        $date        = $_POST['date'];
        $in_time     = $_POST['in_time'];
        $out_time    = $_POST['out_time'];
        
        // final process check
		$slm = date("Y-m-01", strtotime($date[0]));
		$check = $this->db->where('unit_id', $unit_id)->where('block_month',$slm)->get('pay_salary_block');
		if ($check->num_rows() > 0) {
			echo "Sorry! This Month Already Final Processed";
			return false; exit();
		} 
		// final process check end

        $emp_data = $this->attn_process_model->get_all_employee(array($emp_id), null)->row();

        $com_id			= $emp_data->id;
        $emp_id			= $emp_data->emp_id;
        $shift_id		= $emp_data->shift_id;
        $schedule_id	= $emp_data->schedule_id;;

        $data = array();
        $data1 = array();
        foreach ($date as $key => $d) {
            $d = date('Y-m-d', strtotime($d));
            //GET CURRENT SHIFT INFORMATION
            $emp_shift = $this->attn_process_model->emp_shift_check_process($com_id, $shift_id, $schedule_id, $d);
            $schedule  = $this->attn_process_model->get_emp_schedule($emp_shift->schedule_id);
            $out_end 	= $schedule[0]["out_end"];

            $data = array(
                'date_time'  => $d ." ".$in_time[$key],
                'proxi_id'   => $proxi,
                'device_id'  => 0,
            );

            if (strtotime($out_time[$key]) <= strtotime($out_end) && strtotime($out_time[$key]) <= strtotime('12:00:00')) {
                $dd = date('Y-m-d', strtotime($d . ' + 1 days'));
            } else {
                $dd = $d;
            }
            $data1 = array(
                'date_time'  => $dd ." ". $out_time[$key],
                'proxi_id'   => $proxi,
                'device_id'  => 0,
            );
            $mm = $this->update_attn_log($data, $data1, $d, $proxi, $com_id, $unit_id);
        }

        if (!empty($mm) && $mm['massage'] == 1) {
            echo 'success';
        } else {
            echo 'error';
        }
    }

    function update_attn_log($data, $data1, $date, $proxi, $emp_id, $unit_id) {
        $this->load->model('attn_process_model');
        $att_table = "att_". date("Y_m", strtotime($date));
        if (!$this->db->table_exists($att_table)){
            $this->db->query('CREATE TABLE IF NOT EXISTS `'.$att_table.'`(
                    `att_id` int(11) NOT NULL AUTO_INCREMENT,
                    `device_id` int(11) NOT NULL,
                    `proxi_id` varchar(30) NOT NULL,
                    `date_time` datetime NOT NULL,
                    PRIMARY KEY (`att_id`),
                    KEY `device_id` (`device_id`,`proxi_id`,`date_time`)) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;'
            );
        }
        $check = $this->db->where('proxi_id', $proxi)->where('date_time', $data['date_time'])->get($att_table)->row();
        if (empty($check)) {
            $this->db->insert($att_table, $data);
        }
        $check1 = $this->db->where('proxi_id', $proxi)->where('date_time', $data1['date_time'])->get($att_table)->row();
        if (empty($check1)) {
            $this->db->insert($att_table, $data1);
        }
        if ($this->attn_process_model->attn_process($date, $unit_id, array($emp_id))) {
            return array('massage' => 1);
        } else {
            return array('massage' => 0);
        }
    }

    public function eot_modify_entry()
    {
        $sql         = $_POST['emp_id'];
        $unit_id     = $_POST['unit_id'];
        $first_date  = date('Y-m-d', strtotime($_POST['first_date']));
        $second_date = date('Y-m-d', strtotime($_POST['second_date']));
        $eot         = $_POST['eot'];
        $emp_ids     = explode(',', $sql);

        // final process check
		$slm = date("Y-m-01", strtotime($first_date));
		$check = $this->db->where('unit_id', $unit_id)->where('block_month',$slm)->get('pay_salary_block');
		if ($check->num_rows() > 0) {
			echo "Sorry! This Month Already Final Processed";
			return false; exit();
		} 
		// final process check end

        $com_ids    = $this->get_com_emp_id($emp_ids);
        $this->db->where("shift_log_date BETWEEN '$first_date' and '$second_date' ")->where_in('emp_id', $com_ids);
        if ($this->db->where('unit_id', $unit_id)->update('pr_emp_shift_log', array('modify_eot' => $eot))) {
            echo 'success';
        } else {
            echo 'EOT not updated';
        }
    }

    //-------------------------------------------------------------------------------
    // Increment and Promotion entry to the Database
    //-------------------------------------------------------------------------------
	
	//-------------------------------------------------------------------------------------------------------
	// Form Display for Advance Loan
	//-------------------------------------------------------------------------------------------------------
	function advance_loan()
	{
		if($this->session->userdata('logged_in')==FALSE)
		$this->load->view('login_message');
		else
		$this->load->view('form/advance_loan');
	}
	//-------------------------------------------------------------------------------------------------------
	// Advance Loan entry to the Database
	//-------------------------------------------------------------------------------------------------------
	function advance_loan_insert()
	{
		$emp_id 	= $this->input->post('emp_id');
		$loan_amt	= $this->input->post('loan_amt');
		$pay_amt	= $this->input->post('pay_amt');
		$loan_date 	= $this->input->post('loan_date');
		
		$loan_date = date("Y-m-d", strtotime($loan_date)); 
		
		$data = $this->processdb->advance_loan_insert($emp_id, $loan_amt, $pay_amt, $loan_date);
		echo $data;
	}
	//-------------------------------------------------------------------------------------------------------
	// Form Display for Leave Transaction
	//-------------------------------------------------------------------------------------------------------
	function leave_transation()
	{
		//$this->load->view('form/leave_transation');
		$this->load->view('form/leave_view');
	}
	//-------------------------------------------------------------------------------------------------------
	// Leave entry to the Database
	//-------------------------------------------------------------------------------------------------------
	function save_leave_co()
	{
		$result = $this->leave_model->save_leave_db();
		echo $result;
	}
	//-------------------------------------------------------------------------------------------------------
	// Leave search from the Database
	//-------------------------------------------------------------------------------------------------------
	function leave_transaction_co()
	{
	$result = $this->leave_model->leave_transaction_db();
	echo $result;
	}
	//-------------------------------------------------------------------------------------------------------
	// Manual Attendance Entry
	//-------------------------------------------------------------------------------------------------------
	function manual_attendance_entry()
	{
		$grid_firstdate = $this->input->post('firstdate');
		$grid_seconddate = $this->input->post('seconddate');
		
		$manual_time = $this->input->post('manual_time');
		
		$grid_data = $this->input->post('spl');
		$grid_emp_id = explode('xxx', trim($grid_data));
		
		$grid_firstdate  = date("Y-m-d", strtotime($grid_firstdate)); 
		$grid_seconddate = date("Y-m-d", strtotime($grid_seconddate)); 
				
		$data = $this->grid_model->manual_attendance_entry($grid_firstdate, $grid_seconddate, $manual_time, $grid_emp_id);
		echo $data;
	}
	//-------------------------------------------------------------------------------------------------------
	// Attendance Delete manually (Present to Absent)
	//-------------------------------------------------------------------------------------------------------
	function manual_entry_Delete()
	{
		$grid_firstdate = $this->input->post('firstdate');
		$grid_seconddate = $this->input->post('seconddate');
		
		$grid_data = $this->input->post('spl');
		$grid_emp_id = explode('xxx', trim($grid_data));
		//print_r($grid_emp_id);
		$grid_firstdate  = date("Y-m-d", strtotime($grid_firstdate)); 
		$grid_seconddate  = date("Y-m-d", strtotime($grid_seconddate)); 
		
		$data = $this->grid_model->manual_entry_Delete($grid_firstdate, $grid_seconddate, $grid_emp_id);
		echo $data;
	}
	//-------------------------------------------------------------------------------------------------------
	// Workoff Entry
	//-------------------------------------------------------------------------------------------------------
	function save_work_off()
	{
		$grid_firstdate = $this->input->post('firstdate');
				
		$grid_data = $this->input->post('spl');
		$grid_emp_id = explode('xxx', trim($grid_data));
		//print_r($grid_emp_id);
		$grid_firstdate  = date("Y-m-d", strtotime($grid_firstdate)); 
				
		$data = $this->grid_model->save_work_off($grid_firstdate, $grid_emp_id);
		echo $data;
	}
	//-------------------------------------------------------------------------------------------------------
	// Holiday Entry
	//-------------------------------------------------------------------------------------------------------
	function save_holiday()
	{
		$grid_firstdate = $this->input->post('firstdate');
		$holiday_description = $this->input->post('holiday_description');
		
		$grid_firstdate  = date("Y-m-d", strtotime($grid_firstdate));
				
		$data = $this->grid_model->save_holiday($grid_firstdate, $holiday_description);
		echo $data;
	}
	//-------------------------------------------------------------------------------------------------------
	// Resign Entry
	//-------------------------------------------------------------------------------------------------------
	function resign_entry()
	{
		$crud = new grocery_CRUD();

		$crud->set_table('pr_emp_resign_history');
		$crud->set_subject('Resign Employee');
		$crud->display_as( 'emp_id' , 'Employee ID' );
		$crud->set_rules('emp_id','Employee ID','required|is_unique[pr_emp_resign_history.emp_id]|callback_username_check');
		$crud->set_rules('resign_date','Resign Date','required');
		$crud->callback_after_insert(array($this,'insert_resign_in_emp_table'));
		$crud->callback_before_delete(array($this,'insert_join_in_emp_table_for_resign'));
		//$crud->unset_delete();
		$crud->unset_edit();
		
		$output = $crud->render();
		
		$this->crud_output($output);
	}
	//-------------------------------------------------------------------------------------------------------
	// Insert employee status regular to pr_emp_com_info table
	//-------------------------------------------------------------------------------------------------------
	function insert_join_in_emp_table_for_resign($primary_key)
	{
		$this->db->select('emp_id');
		$this->db->where('resign_id',$primary_key);
    	$query = $this->db->get('pr_emp_resign_history');
		$rows = $query->row();
		$emp_id = $rows->emp_id;
		$data = array('emp_cat_id' => 1);
		$this->db->where('emp_id', $emp_id);
		$this->db->update('pr_emp_com_info', $data);
		// Log generate for left employee
		$this->log_model->log_profile_resign($emp_id);
		return true;
	}
	//-------------------------------------------------------------------------------------------------------
	// Employee ID exist or not
	//-------------------------------------------------------------------------------------------------------
	function username_check($emp_id)
	{
		$check_emp = $this->get_emp_id_existance($emp_id);
		if ($check_emp == false)
		{
			$this->form_validation->set_message('username_check', "%s $emp_id does't not exist!");
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	//-------------------------------------------------------------------------------------------------------
	// Employee ID exist or not
	//-------------------------------------------------------------------------------------------------------
	function get_emp_id_existance($emp_id)
	{
		$this->db->select("emp_id");
		$this->db->where("emp_id", $emp_id);
		$query = $this->db->get("pr_emp_com_info");
		if($query->num_rows() > 0 )
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	//-------------------------------------------------------------------------------------------------------
	// Insert employee status resign to pr_emp_com_info table
	//-------------------------------------------------------------------------------------------------------
	function insert_resign_in_emp_table($post_array)
	{
		$emp_id = $post_array['emp_id'];
		$data = array('emp_cat_id' => 4);
		$this->db->where('emp_id', $emp_id);
		$this->db->update('pr_emp_com_info', $data);
		// Log generate for resign employee
		$this->log_model->log_profile_resign($emp_id);
		return $post_array;
	}
	//-------------------------------------------------------------------------------------------------------
	// CRUD output method
	//-------------------------------------------------------------------------------------------------------
	function crud_output($output = null)
	{
		$this->load->view('output.php',$output);	
	}
	
	function earn_leave_entry()
	{
		$crud = new grocery_CRUD();

		$crud->set_table('pr_leave_earn');
		$crud->set_subject('Earn Leave');
		$crud->required_fields('old_earn_balance','current_earn_balance','last_update');
		//$crud->fields('emp_id','old_earn_balance','last_update');
		$crud->display_as('emp_id' , 'Employee ID' );
        
		$state = $this->grocery_crud->getState();
		if($state == 'edit')
    	{
        	$crud->change_field_type('emp_id','readonly');
    	}
		if($state == 'insert_validation')
    	{
        	$crud->set_rules('emp_id','Employee ID','required|callback_emp_id_check');
			//$crud->set_rules('last_update','Last Update','required|callback_last_update_check');
    	}
		$crud->unset_delete();
		//$crud->unset_edit();
		$output = $crud->render();
		$this->crud_output($output);
	}
	
	
	function last_update_check($str)
	{
		$date = $this->input->post('last_update');
		$start_date = strtotime($date);
		$last_up = date("Y-m-d",$start_date);
		
		echo "<SCRIPT LANGUAGE=\"JavaScript\">alert($last_up);</SCRIPT>";
	}
	
	function emp_id_check($str)
	{
		$id = $this->uri->segment(4);
		if(!empty($id) && is_numeric($id))
		{
			$emp_id_old = $this->db->where("id",$id)->get('pr_leave_earn')->row()->emp_id;
			$this->db->where("emp_id !=",$emp_id_old);
		}
		$num_row = $this->db->where('emp_id',$str)->get('pr_leave_earn')->num_rows();
		if ($num_row >= 1)
		{
			$this->form_validation->set_message('emp_id_check', "Employee ID field '$str' already exists");
			return FALSE;
		}
		else
		{
		
			$num_row1 = $this->db->where('emp_id',$str)->get('pr_emp_com_info')->num_rows();
			if ($num_row1 < 1)
			{
				$this->form_validation->set_message('emp_id_check', "Invalid Employee ID");
				return FALSE;
			}
			else
			{
				return TRUE;
			}
		}
	}
	
	
	//-------------------------------------------------------------------------------------------------------
	// Left Entry
	//-------------------------------------------------------------------------------------------------------
	function left_entry()
	{
		$crud = new grocery_CRUD();

		$crud->set_table('pr_emp_left_history');
		$crud->set_subject('Left Employee');
		$crud->required_fields('emp_id','left_date');
		$crud->display_as( 'emp_id' , 'Employee ID' );
		$crud->set_rules('emp_id','Employee ID','required|is_unique[pr_emp_left_history.emp_id]|callback_username_check');
		$crud->set_rules('left_date','Left Date','required');
		$crud->callback_after_insert(array($this,'insert_left_in_emp_table'));
		//$crud->unset_delete();
		$crud->unset_edit();
		$crud->callback_before_delete(array($this,'insert_join_in_emp_table'));
		$output = $crud->render();
		$this->crud_output($output);
	}
	
	//-------------------------------------------------------------------------------------------------------
	// Insert employee status left to pr_emp_com_info table
	//-------------------------------------------------------------------------------------------------------
	function insert_left_in_emp_table($post_array)
	{
		$emp_id = $post_array['emp_id'];
		$data = array('emp_cat_id' => 3);
		$this->db->where('emp_id', $emp_id);
		$this->db->update('pr_emp_com_info', $data);
		// Log generate for left employee
		$this->log_model->log_profile_resign($emp_id);
		return $post_array;
	}
	
	//-------------------------------------------------------------------------------------------------------
	// Insert employee status regular to pr_emp_com_info table
	//-------------------------------------------------------------------------------------------------------
	function insert_join_in_emp_table($primary_key)
	{
		$this->db->select('emp_id');
		$this->db->where('left_id',$primary_key);
    	$query = $this->db->get('pr_emp_left_history');
		$rows = $query->row();
		$emp_id = $rows->emp_id;
		$data = array('emp_cat_id' => 1);
		$this->db->where('emp_id', $emp_id);
		$this->db->update('pr_emp_com_info', $data);
		// Log generate for left employee
		$this->log_model->log_profile_resign($emp_id);
		return true;
	}
	
	//-------------------------------------------------------------------------------------------------------
	// New to regular :Tofayel
	//-------------------------------------------------------------------------------------------------------
	function new_to_regular()
	{
		$this->load->view('form/new_to_rg');	
	}
	
	function new_to_regular_process()
	{
		$month = $this->input->post('report_month_sal');
		$year = $this->input->post('report_year_sal');
		$this->load->model('log_model');
		$result = $this->processdb->new_to_regular_process($year, $month);
		if ($result == "Successfully Converted")
		{
			echo "<SCRIPT LANGUAGE=\"JavaScript\">alert('Successfully Converted');</SCRIPT>";
			//echo "This ISBN already exist"; 
		}
		else if ($result =="no data found")
		{
			echo "<SCRIPT LANGUAGE=\"JavaScript\">alert('No data found');</SCRIPT>";
			//echo "This ISBN already exist"; 
		}
		
		
		$this->log_model->log_new_to_regular($year, $month);
		$this->new_to_regular();
	}
	
	

}
