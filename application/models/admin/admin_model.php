<?php
class Admin_model extends CI_Model {

    function __construct()
	{
		parent::__construct();
		
		/* Standard Libraries */
    }
	
	function check_user_account()
	{
		
			$user_id=$this->input->post('username');
		
			$password=$this->input->post('password');
			
			$this->db->select('id_number');
			$this->db->where('id_number',$user_id);
			$this->db->where('password',$password);
			$this->db->where('level',1);
			
			$query = $this->db->get('members');
			
				if ($query->num_rows() > 0)
				{
				 	$row = $query->row();
					$name = $row->id_number;
					$log_data = array('admin' => $name,'admin_logged_in' => TRUE);
				    return $log_data;
			    }
			    else
			    {
				    return false;
			    }
		
				
     }
	 
	function check_user_account_FE()
	{
		
			$user_id=$this->input->post('username');
		
			$password=$this->input->post('password');
			
			$this->db->select("id, id_number, level");
			$this->db->where('id_number',$user_id);
			$this->db->where('password',$password);
			$this->db->where('status ','Enable');
			
			$query = $this->db->get('members');
			
				if ($query->num_rows() > 0)
				{
				 	foreach($query->result() as $row)
					{
						$user_id = $row->id;
						$name = $row->id_number;
						$level = $row->level;
					}
					
					$log_data = array('username' => $name, 'logged_in' => TRUE);
				    return $log_data;
			    }
			    else
			    {
				    return false;
			    }
		
				
     }
	 
	 function insert_book($image)
	 {
		//print_r($image);
		//echo $image['upload_data']['file_name'];
		$data = array(
				'id'				=>'',
				'author'			=> $this->input->post('author'),
				'subject'			=> $this->input->post('subject'),
				'title'				=> $this->input->post('title'),
				'accession_no'		=> $this->input->post('accession_no'),
				'image'				=> $image['upload_data']['file_name'],
				'location'			=> $this->input->post('location'),
				'category'			=> $this->input->post('category'),
				'facility'			=> $this->input->post('facility'),
				'publisher'			=> $this->input->post('publisher'),
				'keyword'			=> $this->input->post('keyword'),
				'isbn'				=> $this->input->post('isbn'),
				'call_no'			=> $this->input->post('call_no'),
				'edition'			=> $this->input->post('edition'),
				'description'		=> $this->input->post('description'),
				'price'				=> $this->input->post('price'),
				'create_date'		=> date("Y-m-d H:i:s"),
				'modify_date'		=> '',
				'status'			=> $this->input->post('status')
		);
		//print_r($data);
		$this->db->insert('books',$data);
	}
	
	function insert_ebook($file)
	 {
		//print_r($image);
		//echo $image['upload_data']['file_name'];
		$data = array(
				'id'				=>'',
				'ebooks'			=> $this->input->post('ebooks'),
				'ebook_file'		=> $file['upload_data']['file_name'],
				'create_date'		=> date("Y-m-d H:i:s"),
				'modify_date'		=> '',
				'status'			=> '1'
		);
		//print_r($data);
		$this->db->insert('ebooks',$data);
	}
	
	
	
	
	function accession_no()
	{
		$this->db->where('accession_no',$this->input->post('accession_no'));
		$q = $this->db->get('books');
		if ($q->num_rows() > 0){
		return true;
		}else
		{
		return false;
		}
	}
	
	function booking_request_update()
	{
		$user_id = $this->input->post('user_id');
		$book_id = $this->input->post('book_id');
		
		$data = array(
               'status' => '2'
          );

		$this->db->where('user_id', $user_id);
		$this->db->where('book_id', $book_id);
		$this->db->update('booking', $data); 
	}
	
	function booking_request()
	{
		//$this->db->select();
		//$this->db->where('status','1');
		//$this->db->where('status','2');
		//$query = $this->db->get('booking');
		$this->db->select('members.id_number,members.name,booking.*');
		$this->db->join('booking','booking.user_id=members.id_number','inner');
		$query = $this->db->get('members');
		return $query->result();
	}
	
	
	
	function booking_release()
	{
		$user_id = $this->input->post('user_id');
		$book_id = $this->input->post('book_id');
		
		$this->db->where('user_id', $user_id);
		$this->db->where('book_id', $book_id);
		$this->db->delete('booking'); 
	}
	
	function list_member()
	{
		$data = array(
              '0'        => 'Member',
              '1'        => 'Admin',
			  '2'        => 'User',
			  '3'        => 'Report'
               ); 
		$query = $this->db->get("members");
		
		foreach($query->result() as $rows)
		{
			foreach($data as $index => $value)
			{
				if($index == $rows->level)
				{
					$level = $value;
				}  
			}
			$data1["id"][]			= $rows->id;
			$data1["id_number"][]	= $rows->id_number;
			$data1["password"][]	= $rows->password;
			$data1["level"][]		= $level;
		}
		//print_r($data1);
		return $data1;
	}
	
}
	
?>