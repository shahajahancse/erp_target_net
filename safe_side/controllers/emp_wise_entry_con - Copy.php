<?php
class Emp_wise_entry_con extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
		/* Standard Libraries */
		//ini_set("memory_limit",-1);
		$this->load->model('acl_model');
		$this->load->model('emp_wise_entry_model');
		$this->load->library('grocery_CRUD');
		$access_level = 3;
		$acl = $this->acl_model->acl_check($access_level);
		set_time_limit(0);
		ini_set('memory_limit', '20000M');
	}
	function emp_wise_data_entry()
	{
		$this->load->view('pd/emp_wise_data_entry');
	}
	function crud_output($output = null)
	{
		$this->load->view('output.php',$output);	
	}
	function emp_wise_data_entry_manaement()
	{
		$crud = new grocery_CRUD();
		$ses_username =$this->session->userdata('username');
		
		if($ses_username == "target" || $ses_username == "uzzal")
		{
			$id = 1;
			$crud->where('section_id!=',$id);
			//$crud->or_where('section_id','3');
			//$crud->or_where('section_id','4');
		}
		if($ses_username == "target2")
		{
			$crud->where('section_id','1');
			$crud->where('floor_id','1');
		}
		//$crud->like('date','2014-04');
		$crud->where("date between '2015-12-21' and '2016-01-31'");
		//$crud->like('date','2014-06');
		$crud->order_by('date','desc');
		$crud->set_table('pd_production_logs');
		
		$crud->set_subject('Data Entry Management');
		$crud->set_relation('article_id','pd_style_infos','article_id');
		$crud->set_relation('section_id','pr_section','sec_name');
		$crud->set_relation('floor_id','pr_emp_position','posi_name');
		$crud->set_relation('process_id','pd_process_setups','process_name');
		$crud->set_relation('color_id','pd_color_infos','color_name');
		$crud->set_relation('size_id','pd_size_infos','size_name');
		//$crud->set_rules('article_id','Artical Name','trim|required|callback_artical_name_check');
		$crud->change_field_type('article_id', 'readonly');
		
		$crud->callback_edit_field('article_id',array($this,'edit_field_callback_article_id'));
		$crud->callback_edit_field('section_id',array($this,'edit_field_callback_section_id'));
		$crud->callback_edit_field('floor_id',array($this,'edit_field_callback_floor_id'));
		$crud->callback_edit_field('process_id',array($this,'edit_field_callback_process_id'));
		$crud->callback_edit_field('color_id',array($this,'edit_field_callback_color_id'));
		$crud->callback_edit_field('size_id',array($this,'edit_field_callback_size_id'));
		
		$crud->display_as( 'article_id' , 'Article Name' )->display_as( 'emp_id' , 'Emp ID' )->display_as( 'section_id' , 'Section' )->display_as( 'floor_id' , 'Floor' )->display_as( 'process_id' , 'Process' )->display_as( 'color_id' , 'Color' )->display_as( 'size_id' , 'Size' );
		
		$crud->change_field_type('emp_id','readonly');
		$crud->change_field_type('username','hidden');
		$crud->change_field_type('date_time','hidden');
		$crud->unset_add();
		$crud->unset_columns('username','date_time');
		
		$output = $crud->render();
		
		$this->crud_output($output);
	}
	
	function edit_field_callback_article_id($value, $primary_key)
	{
		return $this->db->get_where('pd_style_infos', array('article_id_pk' => $value))->row()->article_id;
	}
	function edit_field_callback_section_id($value, $primary_key)
	{
		return $this->db->get_where('pr_section', array('sec_id' => $value))->row()->sec_name;
	}
	function edit_field_callback_floor_id($value, $primary_key)
	{
		return $this->db->get_where('pr_emp_position', array('posi_id' => $value))->row()->posi_name;
	}
	function edit_field_callback_process_id($value, $primary_key)
	{
		return $this->db->get_where('pd_process_setups', array('process_id' => $value))->row()->process_name;
	}
	function edit_field_callback_color_id($value, $primary_key)
	{
		return $this->db->get_where('pd_color_infos', array('color_id' => $value))->row()->color_name;
	}
	function edit_field_callback_size_id($value, $primary_key)
	{
		return $this->db->get_where('pd_size_infos', array('size_id' => $value))->row()->size_name;
	}
	
	function artical_name_check($str)
	{
		$id = $this->uri->segment(4);
		
		$cur_artical_id = $str;
		$cur_section_id = $_POST['section_id'];
		$cur_floor_id 	= $_POST['floor_id'];
		$cur_process_id = $_POST['process_id'];
		$cur_color_id 	= $_POST['color_id'];
		$cur_size_id 	= $_POST['size_id'];
	
		
		$this->db->select('*');
		$this->db->where('id',$id);
		$query = $this->db->get('pd_production_logs');
		$rows = $query->row();
		
		$article_id = $rows->article_id;
		$emp_id 	= $rows->emp_id;
		$section_id = $rows->section_id;
		$floor_id 	= $rows->floor_id;
		$process_id = $rows->process_id;
		$color_id 	= $rows->color_id;
		$size_id 	= $rows->size_id;
		
		if($article_id != $cur_artical_id || $section_id != $cur_section_id || $floor_id != $cur_floor_id|| $cur_process_id != $process_id|| $cur_color_id != $color_id|| $size_id != $cur_size_id)
		{
			$this->form_validation->set_message('artical_name_check',"Only Change Quantity and Date!");
			return FALSE;
		}
		else
		{
			return TRUE;
		}
		
		
		
	}	
	function add_production_log()
	{	
		$this->emp_wise_entry_model->add_production_log();
		//$this->load->view('pd/emp_wise_data_entry');	
	}
	function search_article_id()
	{
		  $q = strtolower($_GET['term']);
		  $result = $this->emp_wise_entry_model->search_article_id($q);
		  echo $result;
	}
	function search_section_id()
	{
		  $q = strtolower($_GET['term']);
		  $result = $this->emp_wise_entry_model->search_section_id($q);
		  echo $result;
	}
	function GetProcessEmp()
	{
		    $array = $this->uri->uri_to_assoc(3);
			$s_id = $array['s_id'];
			$f_id = $array['f_id'];
			$b_id = $array['b_id'];
			$result = $this->emp_wise_entry_model->GetProcessEmp($this->input->post($s_id),$this->input->post($f_id),$this->input->post($b_id));
			echo $result;
	}
	function GetProcessEmp_fixed()
	{
		   $array = $this->uri->uri_to_assoc(3);
			$s_id = $array['s_id'];
			$f_id = $array['f_id'];
			$b_id = $array['b_id'];
			$result = $this->emp_wise_entry_model->GetProcessEmp_fixed($this->input->post($s_id),$this->input->post($f_id),$this->input->post($b_id));
			echo $result;
	}
	function Getfloor()
	{
		    $array = $this->uri->uri_to_assoc(3);
			$s_id = $array['s_id'];
			$result = $this->emp_wise_entry_model->Getfloor($this->input->post($s_id));
			echo $result;
	}
	function Getblock()
	{
		    $array = $this->uri->uri_to_assoc(3);
			$s_id = $array['s_id'];
			$f_id = $array['f_id'];
			$result = $this->emp_wise_entry_model->Getblock($this->input->post($s_id),$this->input->post($f_id));
			echo $result;
	}
	function GetImage()
	{
		    $array = $this->uri->uri_to_assoc(3);
			$id = $array['id'];
			$result = $this->emp_wise_entry_model->GetImage($this->input->post($id));
			echo $result;
	}
	function GridGen()
	{
		    $array = $this->uri->uri_to_assoc(3);
			$id = $array['id'];
			$result = $this->emp_wise_entry_model->GridGen($this->input->post($id));
			echo $result;
	}
	
	/*function update_unitprice_amount()
	{
		$this->db->select('*');
		$query = $this->db->get('pd_production_logs');
		foreach($query->result() as $row) 
		{
			$artical_id 	= $row->article_id;
			$section_id 	= $row->section_id;
			$process_id 	= $row->process_id ;
			$size_id  		= $row->size_id ;
			$id  			= $row->id ;
			$quantity  		= $row->quantity ;
		
			$unit_price 	= $this->emp_wise_entry_model->get_price($artical_id,$section_id,$process_id,$size_id);
			$amount 		= round(($unit_price*$quantity),2);
			
			$data['unit_price'] = $unit_price;
			$data['amount'] = $amount;
			
			$this->db->where('id',$row->id);
			$this->db->where('article_id',$row->article_id);
			$this->db->where('section_id',$row->section_id);
			$this->db->where('process_id',$row->process_id);
			$this->db->where('size_id',$row->size_id);
			$this->db->update('pd_production_logs', $data); 
			echo 	"$artical_id===$section_id===$process_id===$size_id====$quantity====$unit_price====$amount<br>";
		}
		
	}*/
	
	function test(){
		//$this->load->model('common_model');
		//echo $this->common_model->get_pd_log_table_name($pd_log_date='2016-01-21');
		$query = $this->db->like('date','2015-11')->get('pd_production_logs');	
		//echo $query->num_rows();
		foreach($query->result() as $rows){
			$data = array(
						'article_id' 			=>$rows->article_id,
						'section_id' 			=>$rows->section_id,
						'emp_id' 				=>$rows->emp_id,
						'floor_id' 				=>$rows->floor_id,
						'block_id' 				=>$rows->block_id,
						'process_id' 			=>$rows->process_id,
						'color_id' 				=>$rows->color_id,
						'size_id' 				=>$rows->size_id,
						'quantity' 				=>$rows->quantity,
						'date' 					=> '2016-02-22',
						'username'				=>$rows->username,
						'date_time'				=>$rows->date_time
					);
			$this->db->insert("pd_logs_2016-02",$data);
		}
	}
	
}