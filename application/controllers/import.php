<?php
class Import extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		exit('not allow this class');	
	}


	function proxi()
	{	
		exit('not allow this function');	
		/********************************/
		$outputfile = "import/proxi.txt";
		/********************************/
		
		
		if(!file_exists($outputfile)) {
			echo "File not found. Make sure you specified the correct path.\n";
			exit;
		}
		
		$lines = file($outputfile);

		foreach(array_values($lines)  as $k => $line) {

			$len = strlen(trim($line));
			if(!empty($len)){
				$log = preg_split('/\s+/', trim($line));


				$emp_id = $log[0];
				$proxi_id = $log[1];
				// dd($emp_id .' == '. $proxi_id);

				$num_rows1 = $this->db->where('emp_id', $emp_id)->get('pr_id_proxi')->row();
				dd($num_rows1);

				if(empty($num_rows1)){
					$data = array(
						'emp_id' 	=> $emp_id,
						'proxi_id' 	=> $proxi_id,
					);
					// dd($data);

					$this->db->insert('pr_id_proxi' , $data);
				}
			}
			
		}
	
		echo "Done.\n";
	}
	

	function index()
	{		
		/********************************/
		/* Code at http://legend.ws/blog/tips-tricks/csv-php-mysql-import/
		/* Edit the entries below to reflect the appropriate values
		/********************************/
		$databasetable = "pr_emp_per_info";
		$fieldseparator = ",";
		$lineseparator = "\n";
		$csvfile = "fiat_import/fiat.csv";
		/********************************/
		/* Would you like to add an ampty field at the beginning of these records?
		/* This is useful if you have a table with the first field being an auto_increment integer
		/* and the csv file does not have such as empty field before the records.
		/* Set 1 for yes and 0 for no. ATTENTION: don't set to 1 if you are not sure.
		/* This can dump data in the wrong fields if this extra field does not exist in the table
		/********************************/
		$addauto = 1;
		/********************************/
		/* Would you like to save the mysql queries in a file? If yes set $save to 1.
		/* Permission on the file should be set to 777. Either upload a sample file through ftp and
		/* change the permissions, or execute at the prompt: touch output.sql && chmod 777 output.sql
		/********************************/
		$save = 1;
		$outputfile = "fiat_import/output.sql";
		/********************************/
		
		
		if(!file_exists($csvfile)) {
			echo "File not found. Make sure you specified the correct path.\n";
			exit;
		}
		
		$file = fopen($csvfile,"r");
		
		if(!$file) {
			echo "Error opening data file.\n";
			exit;
		}
		
		$size = filesize($csvfile);
		
		if(!$size) {
			echo "File is empty.\n";
			exit;
		}
		
		$csvcontent = fread($file,$size);
		
		fclose($file);
		
		//echo $check = file_put_contents($tmpfile, str_replace("\t", ";",  iconv('UTF-16', 'UTF-8', file_get_contents($csvfile))));

		
		$lines = 0;
		$queries = "";
		$linearray = array();
		$line_by_array = explode($lineseparator,$csvcontent);
		
		//foreach(explode($lineseparator,$csvcontent) as $line) {
		$count = count($line_by_array);
		for($i = 0 ; $i < $count - 1; $i++) {
		
			$lines++;
			$line = $line_by_array[$i];
			//echo $line.'<br>';
			//$line = trim($line," \t");
			//$line = str_replace("\r","\t",$line);
			/***********************************
			This line escapes the special character. remove it if entries are already escaped in the csv file
			***********************************/
			//$line = str_replace("'","\'",$line);
			/************************************/
			//echo $line.'<br>';
			$linearray = explode($fieldseparator,$line);
			//print_r($linearray);
			//$linemysql = implode("','",$linearray);
			
			
			
			$emp_name  	= $linearray[0];
			$emp_id 	= $linearray[1];
			$dept_name	= $linearray[2];
			$sec_name	= $linearray[3];
			$line_name	= $linearray[4];
			
			$desig_name	= $linearray[5];
			$dob 		= $linearray[6];
			$doj 		= $linearray[7];
			$sal_grade	= $linearray[8];
			$sal_gross	= $linearray[9];
			$bonus_name	= $linearray[10];
			
			
			$dept_id = $this->get_department_id_by_name($dept_name);
			$sec_id  = $this->get_section_id_by_name($sec_name);
			$line_id = $this->get_line_id_by_name($line_name);
			
			
			$desig_id = $this->get_designation_id_by_name($desig_name);
			$bonus_id = $this->get_bonus_id_by_name($bonus_name);
			
			$dob1 = date('Y-m-d', strtotime($dob));
			$doj1 = date('Y-m-d', strtotime($doj));
			//echo "$emp_id====$emp_name===$dob-->$dob1<br>";
			
			
			
			if($addauto){
				echo $query =  "INSERT INTO $databasetable (`emp_id`,`emp_full_name`,`emp_dob`,`emp_marital_status`,`emp_blood`) VALUES ('$emp_id', '$emp_name', '$dob1', 1, 0);";
				echo "<br>";
				echo $query2 = "INSERT INTO pr_emp_com_info (`emp_id`, `emp_dept_id`, `emp_sec_id`, `emp_line_id`, `emp_desi_id`,`emp_operation_id`,`emp_position_id`, `emp_sal_gra_id`, `emp_cat_id`, `emp_shift`, `gross_sal`, `ot_entitle`, `transport`, `lunch`, `att_bonus`, `salary_draw`, `salary_type`,  `emp_join_date`) 
								VALUES ('$emp_id', $dept_id, $sec_id, $line_id, $desig_id, 0, 0, '$sal_grade', 1,3, '$sal_gross',0, 1,1,'$bonus_id', 1 , 1 ,'$doj1' );";
				echo "<br>";
				echo $query3 =  "INSERT INTO pr_emp_add (`emp_id`) VALUES ('$emp_id');";
				echo "<br>";
				echo $query4 =  "INSERT INTO pr_emp_edu (`emp_id`) VALUES ('$emp_id');";
				echo "<br>";
				echo $query5 =  "INSERT INTO pr_emp_skill (`emp_id`) VALUES ('$emp_id');";
				echo "<br>";
				echo $query6 =  "INSERT INTO pr_id_proxi (`emp_id`) VALUES ('$emp_id');";
				echo "<br>";
				
				echo $query7 = "CREATE TABLE IF NOT EXISTS `temp_$emp_id` (`att_id` int(11) NOT NULL AUTO_INCREMENT, `device_id` int(11) DEFAULT NULL, `proxi_id` int(11) DEFAULT NULL, `date_time` datetime DEFAULT NULL, PRIMARY KEY (`att_id`) ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;";
				echo "<br>";
				echo $query8 ="-- =======================================================================================================";
				
				
				}
			else
				echo $query =  "INSERT INTO $databasetable (`emp_id`,`emp_full_name`,`emp_dob`,`emp_marital_status`,`emp_blood`) VALUES ('$emp_id', '$emp_name', '$dob1', 1, 0);";
			
			$queries .= $query . "\n";
			$queries .= $query2 . "\n";
			$queries .= $query3 . "\n";
			$queries .= $query4 . "\n";
			$queries .= $query5 . "\n";
			$queries .= $query6 . "\n";
			$queries .= $query7 . "\n";
			$queries .= $query8 . "\n";
			echo "<br>";
			//@mysql_query($query);
		}
		
		//@mysql_close($con);
		
		if($save) {
			
			if(!is_writable($outputfile)) {
				echo "File is not writable, check permissions.\n";
			}
			
			else {
				$file2 = fopen($outputfile,"w");
				
				if(!$file2) {
					echo "Error writing to the output file.\n";
				}
				else {
					fwrite($file2,$queries);
					fclose($file2);
				}
			}
			
		}
		
		echo "Found a total of $lines records in this csv file.\n";
	}
	
	function get_department_id_by_name($dept_name)
	{
		$this->db->select('dept_id');
		$this->db->where('dept_name',trim($dept_name));
		$query = $this->db->get('pr_dept');
		$row = $query->row();
		return $dept_id = $row->dept_id;
	}
	
	function get_section_id_by_name($sec_name)
	{
		$this->db->select('sec_id');
		$this->db->where('sec_name',trim($sec_name));
		$query = $this->db->get('pr_section');
		$row = $query->row();
		return $sec_id = $row->sec_id;
	}
	
	function get_line_id_by_name($line_name)
	{
		$this->db->select('line_id');
		$this->db->where('line_name',trim($line_name));
		$query = $this->db->get('pr_line_num');
		$row = $query->row();
		return $line_id = $row->line_id;
	}
	
	function get_designation_id_by_name($desig_name){
		$this->db->select('desig_id');
		$this->db->where('desig_name',trim($desig_name));
		$query = $this->db->get('pr_designation');
		$row = $query->row();
		return $desig_id = $row->desig_id;
	}
	
	function get_bonus_id_by_name($bonus_name)
	{
		$this->db->select('ab_id');
		$this->db->like('ab_rule_name', trim($bonus_name));
		$query = $this->db->get('pr_attn_bonus');
		$row = $query->row();
		//echo $this->db->last_query();
		return $ab_id = $row->ab_id;
	}

}

?>