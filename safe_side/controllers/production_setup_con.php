<?php
class production_setup_con extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
		/* Standard Libraries */
		$this->load->library('grocery_CRUD');
		$this->load->model('common_model');
		//$this->load->model('acl_model');
		//$access_level = 2;
		//$acl = $this->acl_model->acl_check($access_level);
	}
	//-------------------------------------------------------------------------------------------------------
	// CRUD output method
	//-------------------------------------------------------------------------------------------------------
	function crud_output($output = null)
	{
		$this->load->view('output.php',$output);	
	}
	//-------------------------------------------------------------------------------------------------------
	// CRUD for Buyer Information
	//-------------------------------------------------------------------------------------------------------
	function buyer_info()
	{
		$crud = new grocery_CRUD();

		$crud->set_table('pd_buyer_infos');
		$crud->set_subject('Buyer Information');
		$crud->required_fields('buyer_name');
		$crud->unset_delete();
		
		$output = $crud->render();
		
		$this->crud_output($output);
	}
	//-------------------------------------------------------------------------------------------------------
	// CRUD for Merchandiser Information
	//-------------------------------------------------------------------------------------------------------
	function merchandiser_info()
	{
		$crud = new grocery_CRUD();

		$crud->set_table('pd_merchandiser_infos');
		$crud->set_subject('Merchandiser Information');
		$crud->required_fields('merchandiser_name');
		$crud->unset_delete();
		
		$output = $crud->render();
		
		$this->crud_output($output);
	}
	//-------------------------------------------------------------------------------------------------------
	// CRUD for Color Information
	//-------------------------------------------------------------------------------------------------------
	function color_info()
	{
		$crud = new grocery_CRUD();

		$crud->set_table('pd_color_infos');
		$crud->set_subject('Color Information');
		$crud->required_fields('color_name');
		$crud->unset_delete();
		
		$output = $crud->render();
		
		$this->crud_output($output);
	}
	//-------------------------------------------------------------------------------------------------------
	// CRUD for Size Information
	//-------------------------------------------------------------------------------------------------------
	function size_info()
	{
		$crud = new grocery_CRUD();

		$crud->set_table('pd_size_infos');
		$crud->set_subject('Size Information');
		$crud->required_fields('size_name');
		$crud->unset_delete();
		
		$output = $crud->render();
		
		$this->crud_output($output);
	}
	//-------------------------------------------------------------------------------------------------------
	// CRUD for Gauge Information
	//-------------------------------------------------------------------------------------------------------
	function gauge_info()
	{
		$crud = new grocery_CRUD();

		$crud->set_table('pd_gauge_infos');
		$crud->set_subject('Gauge Information');
		$crud->required_fields('gauge_name');
		$crud->unset_delete();
		
		$output = $crud->render();
		
		$this->crud_output($output);
	}
	//-------------------------------------------------------------------------------------------------------
	// CRUD for Shipment Mode
	//-------------------------------------------------------------------------------------------------------
	function shipment_mode()
	{
		$crud = new grocery_CRUD();

		$crud->set_table('pd_shipment_modes');
		$crud->set_subject('Shipment Mode');
		$crud->required_fields('shipment_name');
		$crud->unset_delete();
		
		$output = $crud->render();
		
		$this->crud_output($output);
	}
	//-------------------------------------------------------------------------------------------------------
	// CRUD for Payment Mode
	//-------------------------------------------------------------------------------------------------------
	function payment_mode()
	{
		$crud = new grocery_CRUD();

		$crud->set_table('pd_payment_modes');
		$crud->set_subject('Payment Mode');
		$crud->required_fields('payment_name');
		$crud->unset_delete();
		
		$output = $crud->render();
		
		$this->crud_output($output);
	}
	//-------------------------------------------------------------------------------------------------------
	// CRUD for Style Information
	//-------------------------------------------------------------------------------------------------------
	function style_information()
	{
		$crud = new grocery_CRUD();

		$crud->set_table('pd_style_infos');
		$crud->set_subject('Style Information');
		$crud->set_relation('buyer_id','pd_buyer_infos','buyer_name');
		$crud->set_relation('merchandiser_id','pd_merchandiser_infos','merchandiser_name');
		$crud->set_relation('gauge_id','pd_gauge_infos','gauge_name');
		$crud->set_relation('shipment_mode_id','pd_shipment_modes','shipment_name');
		$crud->set_relation('payment_mode_id','pd_payment_modes','payment_name');
		
		$crud->display_as('buyer_id','Buyer Name');
		$crud->display_as('merchandiser_id','Merchandiser Name');
		$crud->display_as('gauge_id','Gauge');
		$crud->display_as('shipment_mode_id','Shipment Mode');
		$crud->display_as('payment_mode_id','Payment Mode');
		$crud->unset_delete();
		
		$state = $crud->getState();
 		if($state == 'insert_validation')
    	{
			$crud->required_fields('article_id','style_id','order_number','buyer_id','merchandiser_id','gauge_id','order_cofirm_date','final_inspection_date','shipment_date','total_quantity','shipment_mode_id','payment_mode_id');
		}
    	if($state == 'edit')
    	{
			$crud->change_field_type('article_id', 'readonly');	
			$crud->change_field_type('style_id', 'readonly');	
			$crud->change_field_type('order_number', 'readonly');	
		}
		
		$output = $crud->render();
		
		$this->crud_output($output);
	}
	//-------------------------------------------------------------------------------------------------------
	// CRUD for Color wise lot information
	//-------------------------------------------------------------------------------------------------------
	function color_wise_lot()
	{
		$crud = new grocery_CRUD();

		$crud->set_table('pd_color_wise_lots');
		$crud->set_subject('Color wise lot');
		$crud->set_relation('color_id','pd_color_infos','color_name');
		$crud->required_fields('quantity_per_lot','quantity_of_lots','quantity_of_items');
		$crud->set_relation('article_id','pd_style_infos','article_id');
		$crud->display_as('color_id','Color');
		
		$state = $crud->getState();
 		if($state == 'insert_validation')
    	{
			$crud->required_fields('article_id','color_id','quantity_per_lot','quantity_of_lots','quantity_of_items');
			$crud->set_rules('article_id_pk', 'Article id', 'trim|required|callback_article_check');
			$crud->set_rules('color_id', 'Color', 'trim|required|callback_color_wise_lot_duplicate_entry_check');
		}
		if($state == 'edit' or $state == 'update_validation')
    	{
			$crud->change_field_type('article_id', 'hidden');	
			$crud->set_rules('color_id', 'Color', 'trim|required|callback_color_fixed_for_article_update');
			
		}
		
		$crud->unset_delete();
		
		$output = $crud->render();
		
		$this->crud_output($output);
	}
	//VALIDATION FOR color_wise_lot
	function article_check($article_id_pk)
	{
		$check = $this->common_model->check_article_id_existance($article_id_pk);
		if ($check == false)
		{
			$this->form_validation->set_message('article_check', "Please insert 'Style Information' first!");
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	//VALIDATION FOR color_wise_lot
	function color_wise_lot_duplicate_entry_check($color_id)
	{
		$article_id = $this->input->post('article_id');
		$check = $this->common_model->color_wise_lot_duplicate_entry_check($article_id, $color_id);
		if ($check == false)
		{
			$this->form_validation->set_message('color_wise_lot_duplicate_entry_check', "Color is already exist for this Article, please change your Color!");
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	//VALIDATION FOR color_wise_lot
	function color_fixed_for_article_check($color_id)
	{
		$article_id = $this->input->post('article_id');
		$check = $this->common_model->color_fixed_for_article_check($article_id, $color_id);
		if ($check == false)
		{
			$this->form_validation->set_message('color_fixed_for_article_check', "Sorry! %s can not be change for this Article.");
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	//VALIDATION FOR color_wise_lot
	function color_fixed_for_article_update($color_id) 
	{
    	$color_id_by_pk = $this->common_model->get_color_id_by_pk($this->uri->segment(4));
		$this->form_validation->set_message('color_fixed_for_article_update', " '$color_id_by_pk' Color can not be change for this edit.");
		if ($color_id_by_pk != $color_id)
		{
			$this->form_validation->set_message('color_fixed_for_article_update', "Color can not be change for this edit.");
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	//-------------------------------------------------------------------------------------------------------
	// CRUD for Size wise quantity information
	//-------------------------------------------------------------------------------------------------------
	function size_wise_lots()
	{
		$crud = new grocery_CRUD();

		$crud->set_table('pd_size_wise_lots');
		$crud->set_subject('Size wise lots');
		$crud->set_relation('color_id','pd_color_infos','color_name');
		$crud->set_relation('size_id','pd_size_infos','size_name');
		$crud->set_relation('article_id','pd_style_infos','article_id');
		$crud->required_fields('lots');
		
		$crud->display_as('color_id','Color');
		$crud->display_as('size_id','Size');
		
		$state = $crud->getState();
 		if($state == 'insert_validation')
    	{
			$crud->required_fields('article_id','color_id','size_id','lots');
			$crud->set_rules('article_id', 'Article id', 'trim|required|callback_article_check');
			$crud->set_rules('color_id', 'Color', 'trim|required|callback_color_wise_lot_existance_check');
			$crud->set_rules('size_id', 'Size', 'trim|required|callback_size_wise_lot_existance_check');
		}
		if($state == 'edit' or $state == 'update_validation')
    	{
			$crud->change_field_type('article_id', 'hidden');	
			$crud->set_rules('color_id', 'Color', 'trim|required|callback_color_fixed_for_size_wise_update');
			$crud->set_rules('size_id', 'Color', 'trim|required|callback_size_fixed_for_size_wise_update');
			
		}
		
		$crud->unset_delete();
		
		$output = $crud->render();
		
		$this->crud_output($output);
	}
	//VALIDATION FOR size_wise_lots
	function color_wise_lot_existance_check($color_id)
	{
		$article_id = $this->input->post('article_id');
		$check		= $this->common_model->color_wise_lot_duplicate_entry_check($article_id, $color_id);
		if ($check == true)
		{
			$this->form_validation->set_message('color_wise_lot_existance_check', "Color is not set for this Article, please insert 'Color Wise Lot Info'!");
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	//VALIDATION FOR size_wise_lots
	function size_wise_lot_existance_check($size_id)
	{
		$article_id = $this->input->post('article_id');
		$color_id 	= $this->input->post('color_id');
		$check 		= $this->common_model->size_wise_lot_existance_check($article_id, $color_id, $size_id);
		if ($check == false)
		{
			$this->form_validation->set_message('size_wise_lot_existance_check', "Size is already exist for this Article and Color, please change your Size!");
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	//VALIDATION FOR size_wise_lots
	function color_fixed_for_size_wise_update($color_id) 
	{
    	$color_id_by_pk = $this->common_model->get_color_id_by_pk_for_size_wise($this->uri->segment(4));
		if ($color_id_by_pk != $color_id)
		{
			$this->form_validation->set_message('color_fixed_for_size_wise_update', "Color can not be change for this edit.");
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	//VALIDATION FOR size_wise_lots
	function size_fixed_for_size_wise_update($size_id) 
	{
    	$size_id_by_pk = $this->common_model->get_size_id_by_pk_for_size_wise($this->uri->segment(4));
		if ($size_id_by_pk != $size_id)
		{
			$this->form_validation->set_message('size_fixed_for_size_wise_update', "Size can not be change for this edit.");
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	//-------------------------------------------------------------------------------------------------------
	// CRUD for Process name information
	//-------------------------------------------------------------------------------------------------------
	/*function process_price()
	{
		$crud = new grocery_CRUD();

		$crud->set_table('pd_process_prices');
		$crud->set_subject('Process price');
		$crud->set_relation('section_id','pr_section','sec_name');
		//$crud->set_relation('size_id','pd_size_infos','size_name');
		//$crud->required_fields('lots');
		
		$crud->display_as('color_id','Color');
		$crud->display_as('size_id','Size');
		
		$state = $crud->getState();
 		if($state == 'insert_validation')
    	{
			$crud->required_fields('article_id','color_id','size_id','lots');
			$crud->set_rules('article_id', 'Article id', 'trim|required|callback_article_check');
			$crud->set_rules('color_id', 'Color', 'trim|required|callback_color_wise_lot_existance_check');
			$crud->set_rules('size_id', 'Size', 'trim|required|callback_size_wise_lot_existance_check');
		}
		if($state == 'edit' or $state == 'update_validation')
    	{
			$crud->change_field_type('article_id', 'readonly');	
			$crud->set_rules('color_id', 'Color', 'trim|required|callback_color_fixed_for_size_wise_update');
			$crud->set_rules('size_id', 'Color', 'trim|required|callback_size_fixed_for_size_wise_update');
			
		}
		
		$crud->unset_delete();
		
		$output = $crud->render();
		
		$this->crud_output($output);
	}*/
	function entry_process_name_info()
	{
		$crud = new grocery_CRUD();
		$crud->set_table('pd_process_setups')
			 ->set_subject('Process Setup')
			 ->display_as('process_name','Process Name');
		$crud->required_fields('process_name');		
		$crud->set_rules('process_name', 'Process Name', 'required|is_unique[pd_process_setups.process_name]');
		$crud->unset_delete();
		$output = $crud->render();
		$this->crud_output($output);
	}
	//-------------------------------------------------------------------------------------------------------
	// CRUD for Article wise process price
	//-------------------------------------------------------------------------------------------------------
	function article_wise_process_price()
	{
		$crud = new grocery_CRUD();
				
		$crud->set_table('pd_article_wise_process_prices');
		$crud->set_subject('Article wise process price');
		$crud->set_relation('article_id','pd_style_infos','article_id');
		$crud->set_relation('section_id','pr_section','sec_name');
		$crud->set_relation('process_id','pd_process_setups','process_name');
		$crud->set_relation('size_id','pd_size_infos','size_name');
		$crud->display_as('section_id','Section Name');
		$crud->display_as('process_id','Process Name');
		$crud->display_as('size_id','Size Name');
		$crud->required_fields('article_id','section_id','process_id','size_id','price');
		$state = $crud->getState();
   		$state_info = $crud->getStateInfo();
		
		if($state == 'add' || $state == 'insert_validation')
   		{
			$crud->required_fields('article_id','section_id','process_id','size_id','price');
			$crud->set_rules('article_id','Artical ID','required|callback_article_id_add_check');
			$crud->set_rules('size_id','Size Name','required|callback_size_id_add_check');
    	}
		if($state == 'update_validation' || $state == 'edit' )
   		{
			//$crud->field_type('entry_date','readonly');
			$crud->required_fields('article_id','section_id','process_id','size_id','price');
			$crud->set_rules('article_id','Artical ID','callback_article_id_update_check');
			$crud->set_rules('size_id','Size Name','required|callback_size_id_add_check');
    	}
		
		$crud->unset_delete();
		
		$output = $crud->render();
		
		$this->crud_output($output);
	}
	
	function size_id_add_check($str)
	{
		$id = $this->uri->segment(4);
		
		$size_id	 	=  $str; 
		$article_id 	=  $_POST['article_id'];
		
		$num_row = $this->db->where('article_id',$article_id)->where('size_id',$size_id)->get('pd_size_wise_lots')->num_rows();
		
		if ($num_row < 1)
		{
			$this->form_validation->set_message('size_id_add_check', "Size is not set for this Article, please insert 'Size Wise Lot Info'!");
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	
	
	function article_id_add_check($str)
	{
		$id = $this->uri->segment(4);
		
		$article_id	 	=  $str; 
		$section_id 	=  $_POST['section_id'];
		$process_id 	=  $_POST['process_id'];
		$size_id		=  $_POST['size_id'];
		
		$num_row = $this->db->where('article_id',$article_id)->where('section_id',$section_id)->where('process_id',$process_id)->where('size_id',$size_id)->get('pd_article_wise_process_prices')->num_rows();
		
		if ($num_row >= 1)
		{
			$this->form_validation->set_message('article_id_add_check', "Sorry! This Combination Allready Exist (Artical, Section, Process, Size).");
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	
	function article_id_update_check($str)
	{
		$id = $this->uri->segment(4);
		$article_id_old 	= $this->db->where("id",$id)->get('pd_article_wise_process_prices')->row()->article_id;
		$section_id_old 	= $this->db->where("id",$id)->get('pd_article_wise_process_prices')->row()->section_id;
		$process_id_old 	= $this->db->where("id",$id)->get('pd_article_wise_process_prices')->row()->process_id;
		$size_id_old 		= $this->db->where("id",$id)->get('pd_article_wise_process_prices')->row()->size_id;

		$article_id	 	=  $str; 
		$section_id 	=  $_POST['section_id'];
		$process_id 	=  $_POST['process_id'];
		$size_id		=  $_POST['size_id'];
		
		
		
		
		if($article_id_old == $article_id && $section_id_old == $section_id && $process_id_old == $process_id && $size_id_old == $size_id)
		{
			return TRUE;
		}
		
		$num_row = $this->db->where('article_id',$article_id)->where('section_id',$section_id)->where('process_id',$process_id)->where('size_id',$size_id)->get('pd_article_wise_process_prices')->num_rows();
		if ($num_row >= 1)
		{
			$this->form_validation->set_message('article_id_update_check', "Sorry! This Combination Allready Exist (Artical, Section, Process, Size).");
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	
	//-------------------------------------------------------------------------------------------------------
	// CRUD for Article wise process price
	//-------------------------------------------------------------------------------------------------------
	function section_wise_process()
	{
		$crud = new grocery_CRUD();
				
		$crud->set_table('pd_section_process');
		$crud->set_subject('Section-Process');
		$crud->set_relation('section_id','pr_section','sec_name');
		$crud->set_relation('process_id','pd_process_setups','process_name');
		$crud->display_as('section_id','Section Name');
		$crud->display_as('process_id','Process Name');
		$crud->required_fields('section_id','process_id');
		$state = $crud->getState();
   		$state_info = $crud->getStateInfo();
		
		if($state == 'add' || $state == 'insert_validation')
   		{
			$crud->required_fields('section_id','process_id');
			$crud->set_rules('process_id','Process Name','required|callback_process_id_add_check');
			//$crud->set_rules('size_id','Size Name','required|callback_size_id_add_check');
    	}
		if($state == 'update_validation' || $state == 'edit' )
   		{
			//$crud->field_type('entry_date','readonly');
			//$crud->required_fields('article_id','section_id','process_id','size_id','price');
			//$crud->set_rules('article_id','Artical ID','callback_article_id_update_check');
			//$crud->set_rules('size_id','Size Name','required|callback_size_id_add_check');
    	}
		
		//$crud->unset_delete();
		
		$output = $crud->render();
		
		$this->crud_output($output);
	}
	
	function process_id_add_check($str)
	{
		$id = $this->uri->segment(4);
		
		$process_id	 	=  $str; 
		$section_id 	=  $_POST['section_id'];
		
		$num_row = $this->db->where('section_id',$section_id)->where('process_id',$process_id)->get('pd_section_process')->num_rows();
		
		if ($num_row >= 1)
		{
			$this->form_validation->set_message('process_id_add_check', "Sorry! This Combination Allready Exist (Section, Process).");
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	
}?>