<?php
class File_process_model extends CI_Model{
	
	
	function __construct()
	{
		parent::__construct();
		
		/* Standard Libraries */
		
	}
	
	/*function file_process_for_attendance($att_date)
	{
		date_default_timezone_set('Asia/Dhaka');
		
		$date  = $att_date;
		$year  = trim(substr($date,0,4));
		$month = trim(substr($date,5,2));
		$day   = trim(substr($date,8,2));
		
		$att_table = "att_".$year."_".$month;
		$date = date("d-m-Y", mktime(0, 0, 0, $month, $day, $year));
		// exit($date);
		$file_name = "data/$date.txt";
		// $file_name = "data/$date.TXT";
		
		if (file_exists($file_name)) 
		{
			// echo "The file $file_name exists";exit;
		 
			if (!$this->db->table_exists($att_table))
			{
				$this->load->dbforge();	
				$fields = array(
								'att_id' 	=> array( 'type' => 'INT','constraint' => '11',  'auto_increment' => TRUE),
								'device_id' => array( 'type' => 'INT','constraint' => '11'),
								'proxi_id'  => array( 'type' => 'INT','constraint' => '11'),
								'date_time' => array( 'type' => 'datetime')
								);
				$this->dbforge->add_field($fields);
				$this->dbforge->add_key('att_id', TRUE);
				$this->dbforge->create_table($att_table);		
			}
			$lines = file($file_name);
			// echo "<pre>"; print_r($lines);exit;
			foreach (array_values($lines) AS $line)
			{
				$device_id = substr($line,1,3);
				$prox_no = substr($line,5,10);
								exit($device_id);
				$conferm_date=substr($line,16,8);
				$confer_year=substr($conferm_date,0,4);
				$confer_month=substr($conferm_date,4,2);
				$confer_day=substr($conferm_date,6,2);
				$final_day=$confer_year.'-'.$confer_month.'-'.$confer_day;
				
				$hour=substr($line,25,2);
				$minute=substr($line,27,2);
				$second=substr($line,29,2);
				$final_time=$hour.':'.$minute.':'.$second;
				
				$final_day_time= $final_day.' '.$final_time;
				
				$result = mysql_query("SELECT * FROM pr_id_proxi where proxi_id='$prox_no'");
				$num_rows=mysql_num_rows($result);
				
						 
				$result1 = mysql_query("SELECT * FROM $att_table where proxi_id= '$prox_no' and date_time='$final_day_time'");
				$num_rows1=mysql_num_rows($result1);

				
				if($num_rows>0)
				{
					if($num_rows1 == 0 )
					{
						$data = array(
										'device_id' => $device_id,
										'proxi_id' 	=> $prox_no,
										'date_time'	=> $final_day_time
									);
						$this->db->insert($att_table , $data);
					}
				}
			}
		}
		
	}*/

	function file_process_for_attendance($att_date,$proxi){
		date_default_timezone_set('Asia/Dhaka');
		$date  = $att_date;
		$year  = trim(substr($date,0,4));
		$month = trim(substr($date,5,2));
		$day   = trim(substr($date,8,2));

		$att_table = "att_".$year."_".$month;
		$date = date("d-m-Y", mktime(0, 0, 0, $month, $day, $year));

		$file_name = "data/$date.txt";
		if (file_exists($file_name)){
			if (!$this->db->table_exists($att_table)){
				$this->db->query('CREATE TABLE IF NOT EXISTS '.$att_table.'(
					att_id int(11) NOT NULL AUTO_INCREMENT,
					device_id int(11) NOT NULL,
					proxi_id varchar(30) NOT NULL,
					date_time datetime NOT NULL,
					PRIMARY KEY (att_id),
					KEY device_id (device_id,proxi_id,date_time)) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;'
				);
			}
			$lines = file($file_name);
			$out = array();
			$data=array();
			foreach(array_values($lines)  as $k=>$line) {
				if($k==0){
					continue;
				}
			
				$len = strlen(trim($line));
				if(!empty($len)){
					$log = preg_split('/\s+/', trim($line));

					// echo "<pre>";print_r($log);
					// exit;
					// $log = explode(' ',$log);

					$prox_no = $log[0];
					$date = $log[1];
					$time = $log[2];
					$format = $log[3];
					$device_id = 0;

					if(in_array($prox_no, $proxi)){
						

						$date_time = date("Y-m-d H:i:s", strtotime($date.' '.$time .' '.$format));
						// echo $prox_no . "<pre>"; print_r($date_time); exit();

						$result1 = mysql_query("SELECT * FROM $att_table where proxi_id = '$prox_no' and date_time='$date_time'");
						$num_rows1 = mysql_num_rows($result1);

						if($num_rows1 == 0 ){
							// dd('kohi he');
							$data = array(
								'device_id' => ($device_id == 0 || $device_id =='')? 33:$device_id,
								'proxi_id' 	=> $prox_no,
								'date_time'	=> $date_time
							);
							$this->db->insert($att_table , $data);
						}
					}
				}
				
			}
			// dd($data);
			// $this->db->insert_batch($att_table , $data);


			echo "File fetched successfully";
		}else{
			echo "Please upload file first";
		}
	}

}