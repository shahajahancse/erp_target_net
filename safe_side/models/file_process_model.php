<?php
class File_process_model extends CI_Model{
	
	
	function __construct()
	{
		parent::__construct();
		
		/* Standard Libraries */
		
	}
	
	function file_process_for_attendance($att_date)
	{
		date_default_timezone_set('Asia/Dhaka');
		
		$date  = $att_date;
		$year  = trim(substr($date,0,4));
		$month = trim(substr($date,5,2));
		$day   = trim(substr($date,8,2));
		
		$att_table = "att_".$year."_".$month;
		$date = date("d-m-Y", mktime(0, 0, 0, $month, $day, $year));
		$file_name = "data/$date.TXT";
		
		if (file_exists($file_name)) 
		{
			//echo "The file $file_name exists";
		 
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
			//print_r($lines);
			foreach (array_values($lines) AS $line)
			{
				//list($device_id ,$date ,$time , $prox_no) = explode(' ', trim($line) );
				//echo $line;
				$device_id = substr($line,1,3);
				$prox_no = substr($line,5,10);
								
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
				
				/*$this->db->select("");
				$this->db->where("proxi_id", $prox_no);
				$query = $this->db->get("pr_id_proxi");
				echo $num_rows = $query->num_rows();*/
						 
				$result1 = mysql_query("SELECT * FROM $att_table where proxi_id= '$prox_no' and date_time='$final_day_time'");
				$num_rows1=mysql_num_rows($result1);
				
				/*$this->db->select("");
				$this->db->where("proxi_id", $prox_no);
				$this->db->where("date_time", $final_day_time);
				$query1 = $this->db->get($att_table);
				echo $num_rows1 = $query1->num_rows();*/
				
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
						
						//$result="insert into $att_table(att_id, device_id, proxi_id, date_time) values('','$device_id','$prox_no','$final_day_time') ";
						//mysql_query($result) or die(mysql_error());
					}
				}
			}
		}
		
	}
		
}