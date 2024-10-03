<?php
class Maintainance_con extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
		/* Standard Libraries */
		$this->load->model('acl_model');
		$access_level = 9;
		$acl = $this->acl_model->acl_check($access_level);
	}
	//-------------------------------------------------------------------------------------------------------
	// Display Database Backup Form
	//-------------------------------------------------------------------------------------------------------
	function database_backup_form()
	{
		$this->load->view('form/db_backup');
	}
	//-------------------------------------------------------------------------------------------------------
	// Full Database Backup 
	//-------------------------------------------------------------------------------------------------------
	function database_backup()
	{
		ini_set("memory_limit","-1M");
		// Load the DB utility class
		$this->load->dbutil();
		
		$prefs = array(
                //'tables'      => array('table1', 'table2'),  // Array of tables to backup.
                'ignore'      => array(),           // List of tables to omit from the backup
                'format'      => 'txt',             // gzip, zip, txt
                'filename'    => 'mybackup.sql',    // File name - NEEDED ONLY WITH ZIP FILES
                //'add_drop'    => TRUE,              // Whether to add DROP TABLE statements to backup file
                'add_insert'  => TRUE,              // Whether to add INSERT data to backup file
                'newline'     => "\n"               // Newline character used in backup file
              );

		$this->dbutil->backup($prefs); 
		
		// Backup your entire database and assign it to a variable
		$backup =& $this->dbutil->backup();
		
		// Load the file helper and write the file to your server
		$this->load->helper('file');
		$date = date("d-m-Y");
		//$file = base_url()."backup/$date.sql";
		//write_file($file, $backup);
		$download_file = "$date.zip";
		// Load the download helper and send the file to your desktop
		$this->load->helper('download');
		force_download($download_file ,$backup); 
	}
	
	//-------------------------------------------------------------------------------------------------------
	// Delete all information of Employees including teporary table
	//-------------------------------------------------------------------------------------------------------
	/*function delete()
	{
		$array = array('123456');
		echo count($array);
		echo '<br>';
		$this->db->select("emp_id");
		$this->db->where_in('emp_id',$array);
		$query = $this->db->get("pr_emp_per_info");
		$num_row = $query->num_rows();
		$i =1;
		foreach($query->result() as $rows)
		{
			$id = $rows->emp_id;
			echo "$i # ".$rows->emp_id.' => ';
			
		
		
			$this->db->where('emp_id',$id);
			$this->db->delete('pr_emp_com_info');
			$this->db->where('emp_id',$id);
			$this->db->delete('pr_id_proxi');
			$this->db->where('emp_id',$id);
			$this->db->delete('pr_emp_edu');
			$this->db->where('emp_id',$id);
			$this->db->delete('pr_emp_skill');
			$this->db->where('emp_id',$id);
			$this->db->delete('pr_emp_add');
			$this->db->where('emp_id',$id);
			if($this->db->delete('pr_emp_per_info'))
			{
				$this->load->dbforge();
				$table_name = "temp_$id";
				if($this->dbforge->drop_table($table_name))
				{
					echo "Delete all data successfully";
				}
				else
				{
					echo "Delete failed";
				}
			} 
			else
			{
				echo "Delete failed";
			}
			echo '<br>';
			$i++;
		}
		
		
	}*/
	
}

