<?php

class Newcon extends CI_Controller {
function __construct()
	{
		parent::__construct();
		
		/* Standard Libraries */
		ini_set('date.timezone', 'Asia/Dacca');
		$this->load->model('admin/admin_model');	
		$this->load->model('log_model');	
	}
	function index()
	{
		if($this->session->userdata('admin_logged_in') == true)
		{		
			redirect("admin/member");
		}
		else
		{
			$this->load->view('admin/admin');
		}
		
	}
	
	function home()
	{
		$data['title'] = "Library Home";
		$data['main'] = 'admin/mist_lib';
		$this->load->view('admin/mist',$data);
	}
	
	function facilities()
	{
		$data['title'] = "Library Facilities";
		$data['main'] = 'admin/facilities';
		$this->load->view('admin/mist',$data);
	}
	
	function hours()
	{
		$data['title'] = "Library Operating Hours";
		$data['main'] = 'admin/Operating_hours';
		$this->load->view('admin/mist',$data);
	}
	
	function rules()
	{
		$data['title'] = "Library Rules & Regulation";
		$data['main'] = 'admin/rules_regulation';
		$this->load->view('admin/mist',$data);
	}
	
	function login()
	{
		
		
		
		$data = $this->admin_model->check_user_account();
		
		if ($data['admin_logged_in']==true)
		{
			$this->session->set_userdata($data);
		}
		redirect('admin');
		
		
	}
	
	function logout()
	{
		$session_data = array('admin' => $this->session->userdata('admin'),'admin_logged_in' => $this->session->userdata('admin_logged_in'));
		//$this->session->sess_destroy();
		$this->session->unset_userdata($session_data);
		redirect('admin');
	}
		
	//===========================================Authentication part for user===================================>>
	function login_process()
	{
		$data =$this->admin_model->check_user_account_FE();
		
		if ($data['logged_in']==true)
		{
			$this->session->set_userdata($data);
			$this->log_model->log_login_insert();
		}
		redirect();
	}
	
	function logout_FE()
	{
		$session_data = array(
					'username' => $this->session->userdata('username'),
					'logged_in' => $this->session->userdata('logged_in') ,
					'level' => $this->session->userdata('level')
					);
		$this->session->sess_destroy();
		$this->log_model->log_login_out();
		//$this->session->unset_userdata($session_data);
		$url = base_url();
		redirect($url, 'refresh');
	}
	//===========================================Authentication part for user===================================<<
	
	function add_books()
	{
		
		if($this->session->userdata('admin') !='')
		{
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= '100000';
			$config['max_width']  = '90';
			$config['max_height']  = '120';
			
			$this->load->library('upload', $config);
			
			
			
			$data['title'] 			= "Add Book Details";
			$data['main'] 			= "admin/add_book_v";
			if ($this->input->post('check'))
			{
				$data['check']=$this->input->post('check');
			}
			
			
			$rules['accession_no']  = "callback_accession_no_check";
			
					
			$this->validation->set_rules($rules);
			
			$fields['author']		= "Author";
			$fields['subject']		= "Subject";
			$fields['title']		= "Title";
			$fields['accession_no']	= "Accession No.";
			$fields['location']		= "Location";
			$fields['publisher']	= "Publisher";
			$fields['keyword']		= "Keyword";
			$fields['isbn']			= "ISBN";
			$fields['call_no']		= "Call No.";
			$fields['edition']		= "Edition";
			$fields['description']	= "Description";
			$fields['price']		= "Price";
				
			$this->validation->set_fields($fields);
			
			if($this->input->post('submit') == 'Submit')
			{		
				
				if ( ! $this->upload->do_upload() or $this->validation->run() == FALSE)
				{
					$data['error'] = $this->upload->display_errors();
					
					$this->load->view('admin/mist',$data);
				}	
				else
				{
					$image['upload_data'] = $this->upload->data();
					
					//print_r($data);
					//$filepath = 'uploads/'.$_FILES["userfile"]["name"];
					//$filename = $_FILES["userfile"]["name"];
					/*
					$config['image_library'] = 'gd2';
					$config['source_image'] = $filepath;
					$config['create_thumb'] = TRUE;
					$config['maintain_ratio'] = TRUE;
					$config['width'] = 75;
					$config['height'] = 50;
					
					$this->load->library('image_lib', $config);
					
					$this->image_lib->resize();
					@unlink($filepath); */
					$this->load->view('admin/mist',$data);
					$this->admin_model->insert_book($image);
				}
			}
			else
			{
				
				$this->load->view('admin/mist',$data);
			}
		}
		else
		{
			redirect();
		}
	}
	
	function accession_no_check($str)
	{
		$value=$this->admin_model->accession_no();
		
		if ($value==1)
		{
			$this->validation->set_message('accession_no_check', 'The %s field can not be duplicate ');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	
	
	function request()
	{
	
		if($this->session->userdata('admin') !='')
		{
			ini_set('date.timezone', 'Asia/Dacca');
			$data['title'] = "Booking request checking";
			$data['main'] = 'admin/request';
			$this->load->view('admin/mist',$data);
		}
		else
		{
			redirect();
		}
	}
	
	
/***************...........NOT USE............***************/	
	
/*	function users_search(){
	if($this->session->userdata('admin') !='')
		{
	$this->load->model('book_model');
	if($this->input->post('accept') != '')
			{
				$this->admin_model->booking_request_update();
			}
			if($this->input->post('Release') != '')
			{
				$this->admin_model->booking_release();
			}
	$data['field']=$this->book_model->search_users();
	//print_r($data);
	//echo "output".$data['user_id']['0'];
	$data['title'] = "Search results";
	$data['main'] = 'admin/searchresult';
		//print_r($data);
	$this->load->view('admin/mist',$data);
	//$this->load->view('admin/searchresult',$data);
		}
		else
		{
			redirect();
		}
	}
	*/
	/*******...For Pagination....********/
	function users_search(){
		$data['message']="";
		$this->load->library('pagination');
		$this->load->model('book_model');
		//$data['field']=$this->book_model->search_users();
		$config['base_url'] =base_url()."/index.php/admin/users_search";
		$config['total_rows'] = $this->book_model->row_count();
		$config['per_page'] = '5'; 
		$config['uri_segment'] = '3';
		$this->pagination->initialize($config);
	if($this->session->userdata('admin') !=''||(count($data['field']['user_id'])>0))
		{
		$this->load->model('book_model');
				if($this->input->post('accept') != '')
				{
					$this->admin_model->booking_request_update();
				}
				if($this->input->post('Release') != '')
				{
					$this->admin_model->booking_release();
				}
		
				$data['field']=$this->book_model->search_users($this->uri->segment(3),$config['per_page']);
		//$data['field']=$this->book_model->users_search($this->uri->segment(3),$config['per_page']);
		
				$data['title'] = "Search results";
				$data['main'] = 'admin/searchresult';
					//print_r($data);
				$this->load->view('admin/mist',$data);
		}
		
	}
	
	
	
	function add_ebooks()
	{
		
		if($this->session->userdata('admin') !='')
		{
			$config['upload_path'] = './uploads/ebooks/';
			$config['allowed_types'] = 'gif|jpg|png|doc|docx|xls|pdf|psd|txt';
			$config['max_size']	= '100000';
			//$config['max_width']  = '90';
			//$config['max_height']  = '120';
			
			$this->load->library('upload', $config);
			
			$data['title'] 			= "Add E-Book Details";
			$data['main'] 			= "admin/add_ebook_v";
			
			
			$fields['ebooks']		= "E-Books";
							
			$this->validation->set_fields($fields);
			if ($this->input->post('check'))
			{
				$data['check']=$this->input->post('check');
			}
		
	
			
			if($this->input->post('submit') == 'Submit')
			{		
				
				if ( ! $this->upload->do_upload())
				{
					$data['error'] = $this->upload->display_errors();
					
					$this->load->view('admin/mist',$data);
				}	
				else
				{
					$file['upload_data'] = $this->upload->data();
					
					//print_r($data);
					//$filepath = 'uploads/'.$_FILES["userfile"]["name"];
					//$filename = $_FILES["userfile"]["name"];
					/*
					$config['image_library'] = 'gd2';
					$config['source_image'] = $filepath;
					$config['create_thumb'] = TRUE;
					$config['maintain_ratio'] = TRUE;
					$config['width'] = 75;
					$config['height'] = 50;
					
					$this->load->library('image_lib', $config);
					
					$this->image_lib->resize();
					@unlink($filepath); */
					$this->load->view('admin/mist',$data);
					$this->admin_model->insert_ebook($file);
				}
			}
			else
			{
				
				$this->load->view('admin/mist',$data);
			}
		}
		else
		{
			redirect();
		}
	}
	
	function journals()
	{
		$data['title'] 			= "Add E-Book Details";
		$data['main'] 			= "admin/journals";
		$this->load->view('admin/mist',$data);
	}
	
	function add_member()
	{
		$data['title'] 			= "Add Member Details";
		$data['main'] 			= "admin/add_member";
		$this->load->view('admin/mist',$data);
	}
	
	function list_member()
	{
		$data['title'] 			= "List all user";
		$data['main'] 			= "admin/list_member";
		$data['values']         = $this->admin_model->list_member();
		$this->load->view('admin/mist',$data);
	}
	
	function add_member_process()
	{
		$data['main'] 			= "admin/upload_success";
		$user_id = $this->input->post('user_id');
		$password = $this->input->post('password');
		$level = $this->input->post('level');
			
		$insert_data = array(
				   'id' 		=> '' ,
				   'id_number' 	=> $user_id ,
				   'password' 	=> $password ,
				   'level' 		=> $level
			);
			
			//print_r($insert_data);
			$this->db->insert('members', $insert_data);  
			$this->load->view('admin/mist',$data);
	}
	
	
}

/* End of file Library.php */
/* Location: ./system/application/controllers/Library.php */