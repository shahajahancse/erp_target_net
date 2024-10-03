<style>
body{
	background:#ECE9D8;
}
.main_img{
	width:70px; 
	height:80px;
	border:1px solid #999;
	background-image:url(<?php echo base_url();?>img/icon.jpg);
	z-index:-9999;
}
.preview
{
	width:70px;
	height:80px;
	border:solid 1px #dedede;
	position:relative;
	/*left: 690px;
	top: 209px;*/
}
#grid_production_logs{
	width:558px;
	height:auto;
	/*border:1px solid #0F0;*/
	/*border-bottom:1px solid #A6C9E2;*/
}

.div_row_top{
	float:left; 
	background:#D2E6F5;
	padding-left:5px; 
	width:81px; 
	height:24px; 
	border-top:1px solid #A6C9E2;
	border-left:1px solid #A6C9E2; 
	border-bottom:1px solid #A6C9E2;
	text-align:center;
	font-weight:bold;
}
.div_row_normal{
	float:left;
	background:#FFF;
	font-size:13px;
 	padding-left:5px; 
	width:81px; 
	height:24px; 
	border-left:1px solid #A6C9E2; 
	border-bottom:1px solid #A6C9E2;
}
.add_submit{
	background:#333;
	color:#FFF;
	padding:4px;
	border-radius:4px;
}
</style>
<!--<fieldset>
	<legend>Add Data info</legend>-->
<form id="add_production_log" name="add_production_log" method="post" action="">
<div style="width:720px;">
	<fieldset><legend>Data Entry</legend>
    <div style="float:left; width:548px; height:98px;">
    
    <div style="width:540px;">

        <div style="float:left; width:75px;">
            Article ID  
        </div>	
        <div style="float:left; padding-left:0px;">
            : <input type="text" name="article_id" id="article_id" style="width:121px;" autofocus="autofocus" tabindex="1"/>
        </div>
        <div style="float:left; padding-left:11px; width:55px;">
            Style 
        </div>
        <div style="float:left; padding-left:0px;">
            : <input type="text" name="style_id" id="style_id" style="width:111px;" readonly="readonly"/>
        </div>
        <div style="float:left; padding-left:11px; width:40px;">
        	Order  
        </div>
        <div style="float:left; padding-left:0px;">
        	: <input type="text" name="order_number" id="order_number" style="width:81px;" readonly="readonly"/>
        </div>
        <div style="clear:both;"></div>
    </div>
    	<div style="width:700px; height:4px;"></div>
    <div style="width:540px;">

        <div style="float:left; width:75px;">
            Section  
        </div>	
        <div style="float:left; padding-left:0px;">
           
          
            : <select id="section_id" name="section_id" style="width:121px; height:20px;" onchange="GetProcessEmp()" tabindex="2">
            	<option value="">-Select ID-</option>
             <?php
		   		
				$this->db->select('*');
				//$this->db->where();
				$this->db->from('pr_section');
				$query = $this->db->get();
				foreach($query->result() as $row){
		   	?>
                <option value="<?php echo $row->sec_id;?>"><?php echo $row->sec_name;?></option>
            <?php } ?>
              </select>
        </div>
        <div style="float:left; padding-left:11px; width:55px;">
            Process 
        </div>
        <div style="float:left;">
            : <select id="process_id" name="process_id" style="width:111px; height:20px;" tabindex="3">
                <option></option>
              </select>
        </div>
        <div style="float:left; padding-left:11px; width:40px;">
        	Date  
        </div>
        <div style="float:left; padding-left:0px;">
        	: <input type="text" name="pd_log_date" id="pd_log_date" style="width:81px;" class="datepicker" tabindex="4"/>
        </div>
        <div style="clear:both;"></div>
    </div>
    	<div style="width:700px; height:4px;"></div>
    <div style="width:540px;">
        <div style="float:left; width:75px;">
            Emp ID
        </div>
        <div style="float:left; padding-left:0px;">
            
            <!--: <input type="text" name="emp_id" id="emp_id" style="width:101px;"/>-->
            : <select id="emp_id" name="emp_id" style="width:121px; height:20px;" onchange="GetImage()" tabindex="5">
                <option></option>
              </select>
            
        </div>
            
        <div style="float:left; padding-left:11px; width:55px;">
            Quantity
        </div>
        <div style="float:left; padding-left:0px;">
            : <input type="text" name="quantity" id="quantity" style="width:111px;" tabindex="6"/>
        </div>
        <div style="float:left; width:137px; text-align:right; height:24px;">
        	<input type="button" value="Submit" id="add_production_log_button" class="add_submit" tabindex="7"/>
        </div>
        <div style="clear:both;"></div>
    </div>
    </div>
   
    <div style="float:right; width:126px; height:120px;">
    	<div class="main_img">
        	<!--<img id="preview_img" class="preview" src=""/>	-->
            
        </div>
        <div>
        	
            <div style="border:">
            	<div style="float:; padding-left:4px; "><input type="text" name="full_name" id="full_name" style="border:none; background:none; width:101px; font-weight:bold;" /></div>
            	<div style="float:; padding-left:11px;"> 
                	
                </div>
                <div style="clear:both;"></div>
            </div>
            <div style="border:">
            	<div style="float:; padding-left:4px;"><input type="text" name="designation" id="designation" style="border:none; background:none; width:101px;" /></div>
            	<div style="float:; padding-left:11px;"> 
                	<input type="text" name="designation" id="designation" style="border:none; background:none; width:101px;" />
                </div>
                <div style="clear:both;"></div>
            </div>
            <div style="clear:both;"></div>
        </div>
        <div style="clear:both;"></div>
    </div>
    </fieldset>
    
    
    	<!--<div style="width:530px; height:18px; border:1px solid #0F9"></div>-->
    <div id="grid_production_logs">
    	<div style="height:24px;"> <!--border-top:1px solid #A6C9E2;-->
        	<div class="div_row_top">
            
            <!--style="float:left; padding-left:5px; width:80px; height:24px; border-left:1px solid #A6C9E2; border-bottom:1px solid #A6C9E2;"-->
            
            	Article ID
         	</div>
            <div class="div_row_top" style="width:85px;">
            	Emp ID
         	</div>
            <div class="div_row_top">
            	Section
         	</div>
            <div class="div_row_top">
            	Process
         	</div>
            <div class="div_row_top" style="text-align:center; padding-right:5px; width:71px;">
            	Quantity
         	</div>
            <div class="div_row_top" style="border-right:1px solid #A6C9E2; border-bottom:1px solid #A6C9E2; width:85px;">
            	Date
         	</div>
            <div style="clear:both;"></div>
        </div>
        <div style="height:420px; width:558px; overflow:auto;">
        <?php 
			$this->load->model('entry_model');
			$this->db->select('*');
			//$this->db->order_by('id','DESC');
			$this->db->order_by('article_id','ASC');
			$this->db->order_by('emp_id','ASC');
			$this->db->order_by('section_id','ASC');
			$this->db->order_by('process_id','ASC');
			$query = $this->db->get('pd_production_logs');
			
			if($query->num_rows() > 0)
			{
				foreach($query->result() as $row){
			
		?>
        
        <div style="height:24px;">
        	<div class="div_row_normal">
            	<?php if($row->article_id !=''){echo $row->article_id;}else{ echo "0";}?>
         	</div>
            <div class="div_row_normal" style="width:85px;">
            	<?php if($row->emp_id ==''){echo "0";}else{echo $row->emp_id;}?>
         	</div>
            <div class="div_row_normal">
            	<?php if($row->section_id !='0'){echo $this->entry_model->get_section_name($row->section_id);}else{ echo "0";}?>
         	</div>
            <div class="div_row_normal">
            	<?php if($row->process_id !='0'){echo $this->entry_model->get_process_name($row->process_id);}else{ echo "0";}?>
         	</div>
            <div class="div_row_normal" style="text-align:right; padding-right:5px; width:71px;">
            	<?php if($row->quantity !='' || $row->quantity !='0'){echo $row->quantity;}else{ echo "0";}?>
         	</div>
            <div class="div_row_normal" style="width:85px; border-right:1px solid #A6C9E2;">
            	<?php if($row->date !=''){echo date("d-M-Y",strtotime($row->date));}else{ echo "0";}?>
         	</div>
            <div style="clear:both;"></div>
        </div>
        
        <?php
				}
			}
		?>
        <div style="clear:both;"></div>
        </div>
    	<div style="clear:both;"></div>
    </div>

</div>

</form>
<!--</fieldset>-->

<link rel="stylesheet" href="<?php echo base_url();?>css/datepicker/jquery-ui-1.9.2.custom/development-bundle/themes/base/jquery-ui.css" />
<script src="<?php echo base_url();?>js/datepicker/jquery-1.8.3.js"></script>
<script src="<?php echo base_url();?>js/datepicker/jquery-ui.js"></script>

<script>

$(function(){
	$('.datepicker').datepicker({
   		showAnim: "slide",
   		gotoCurrent: true,
   		dateFormat: "dd-mm-yy"
 	});
 
	$('#add_production_log_button').click(function(){ 
		  var article_id = document.getElementById('article_id').value;
		  var length_id = article_id.length;
		  var section_id = document.getElementById('section_id').value;
		  var process_id = document.getElementById('process_id').value;
		  var pd_log_date = document.getElementById('pd_log_date').value;
		  var emp_id = document.getElementById('emp_id').value;
		  var quantity = document.getElementById('quantity').value;		
		  
		  if(article_id==0 || article_id=='')
		  {
		  	alert('Please type Article ID');
		  	return false;
		  }
		  if(length_id !=7)
		  {
		  	alert('Please just select 7 digit ID No.');
		  	return false;
		  }
		  
		  /*if(section_id==0 || section_id=='')
		  {
		  	alert('Please type Section ID.');
		  	return false;
		  }
		  if(process_id==0 || process_id=='')
		  {
		  	alert('Please type Process ID.');
		  	return false;
		  }*/
		  if(pd_log_date==0 || pd_log_date=='')
		  {
		  	alert('Please Select Date.');
		  	return false;
		  }
		  if(emp_id==0 || emp_id=='')
		  {
		  	alert('Please type Employee ID.');
		  	return false;
		  }
		  if(quantity==0 || quantity=='')
		  {
		  	alert('Please type Quantity.');
		  	return false;
		  }
		  
		 /* if((sender >=0 && sender <=4444444) && (sender.length !=7))
		  {
			alert('Sender ID No will be 7 digit.');
			return false;
		  }*/
		  

		  
		  dataString = $("#add_production_log").serialize();
		  $.ajax({
				type: "POST",
				url: "<?php echo base_url(); ?>index.php/entry_con/add_production_log",
				data: dataString,
				cache: false,
				success: function(data){
					alert('Process Log is added Successfully!');
					window.location= "<?php echo base_url();?>index.php/entry_con/data_entry";
				}
				});
			return false;	
	});
	
	
	$('#article_id').keydown(function(){
		$(this).autocomplete({
			source: "<?php echo base_url(); ?>index.php/entry_con/search_article_id",
			minLength: 0,
			autoFocus: true,
			select: function(event, ui)
			{
	
					var article_id 		= ui.item.article_id;
					var style_id  		= ui.item.style_id;
					var order_number	= ui.item.order_number;

					document.getElementById('article_id').value 		= article_id;
					document.getElementById('style_id').value 			= style_id;
					document.getElementById('order_number').value 		= order_number;
	
			}
		});
   	});
	
	
	
	/*$('#section_id').keydown(function(){
		$(this).autocomplete({
			source: "<?php echo base_url(); ?>index.php/entry_con/search_section_id",
			minLength: 0,
			autoFocus: true,
			select: function(event, ui)
			{
	
					var article_id 		= ui.item.article_id;
					var style_id  		= ui.item.style_id;
					var order_number	= ui.item.order_number;

					document.getElementById('article_id').value 		= article_id;
					document.getElementById('style_id').value 			= style_id;
					document.getElementById('order_number').value 		= order_number;
	
			}
		});
   	});*/
	

	
});



function GetProcessEmp(){
	var ajaxRequest;  // The variable that makes Ajax possible!
	
 	try{
   		// Opera 8.0+, Firefox, Safari
   		ajaxRequest = new XMLHttpRequest();
 	}catch (e){
   		// Internet Explorer Browsers
   	try{
    	ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
   }catch (e) {
      try{
    		ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
      }catch (e){
         	// Something went wrong
         	alert("Your browser broke!");
         	return false;
      		}
   		}
 	}
	var s_id = 'section_id';
		//s_id += id;
	var p_id = 'process_id';
		//p_id += id;
	var e_id = 'emp_id';
		//e_id += id;
		
	var section_id = document.getElementById(s_id).value;
  
 	if(section_id=='Select'){
		alert("Please select Item ");
	 	return;
	}
    //alert(i_group);
	var queryString=s_id+"="+section_id;
	hostname = window.location.hostname;
	var url = "<?php echo base_url(); ?>index.php/entry_con/GetProcessEmp/id/"+s_id;
	
	ajaxRequest.open("POST", url, true);
	ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	ajaxRequest.send(queryString);
	 
	ajaxRequest.onreadystatechange = function(){
		if(ajaxRequest.readyState == 4){
			var resp = ajaxRequest.responseText;
			process_name = resp.split("===");
			process_id = process_name[0].split("***");
			process_name1 = process_name[1].split("***");
			emp_id = process_name[2].split("***");
			
			//emp_id_n = resp.split("===");
			//emp_id = emp_id_n[0].split("***");
			//emp_id1 = emp_id_n[1].split("***");
			
			document.getElementById(p_id).options.length = 0;
			document.getElementById(p_id).options[0]=new Option("Select","", true, false);
			for (i=0; i<process_id.length; i++){
				document.getElementById(p_id).options[i+1]=new Option(process_name1[i],process_id[i], false, false);
			}
			
			document.getElementById(e_id).options.length = 0;
			document.getElementById(e_id).options[0]=new Option("Select","", true, false);
			for (i=0; i<emp_id.length; i++){
				//document.getElementById(e_id).options[i+1]=new Option(emp_id[i], false);
				document.getElementById(e_id).options[i+1]=new Option(emp_id[i],emp_id[i], false, false);
			}
			
		}
	}
}



function GetImage(){
	var ajaxRequest;  // The variable that makes Ajax possible!
	
 	try{
   		// Opera 8.0+, Firefox, Safari
   		ajaxRequest = new XMLHttpRequest();
 	}catch (e){
   		// Internet Explorer Browsers
   	try{
    	ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
   }catch (e) {
      try{
    		ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
      }catch (e){
         	// Something went wrong
         	alert("Your browser broke!");
         	return false;
      		}
   		}
 	}
	var em_id 		= 'emp_id';
	var desig_id 	= 'designation';
	var f_id 		= 'full_name';
	//var p_img_id	= 'preview_img';
	var emp_id 	= document.getElementById(em_id).value;
  
 	if(emp_id=='Select'){
		alert("Please select Item ");
	 	return;
	}

	var queryString=em_id+"="+emp_id;
	hostname = window.location.hostname;
	var url = "<?php echo base_url(); ?>index.php/entry_con/GetImage/id/"+em_id;
	
	ajaxRequest.open("POST", url, true);
	ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	ajaxRequest.send(queryString);
	 
	ajaxRequest.onreadystatechange = function(){
		if(ajaxRequest.readyState == 4){
			var resp 			= ajaxRequest.responseText;
			full_name 			= resp.split("===");
			full_name1 			= full_name[0].split("***");
			image_name 			= full_name[1].split("***");
			designation_name 	= full_name[2].split("***");
			document.getElementById(f_id).value 		= full_name1;
			document.getElementById(desig_id).value 	= designation_name;
			
			hostname = window.location.hostname;
			var url = "<?php echo base_url(); ?>uploads/img/"+image_name;
			$('.main_img').html('<img id="preview_img" class="preview" src="'+url+'"/>');
		}
	}
}


// tab index setup
   var tabindex = 1; 
    $(document).keypress(function(event) {
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if(keycode == '13') { 
            tabindex++;
            
            while(($("[TabIndex='"+tabindex+"']").length == 0 || $("[TabIndex='"+tabindex+"']:not([readonly])").length == 0) && tabindex != 8 ){
                tabindex++;
            }
            if(tabindex == 8){ tabindex = 1 } 
            $("[TabIndex='"+tabindex+"']").focus();
          
        }
    });

    $("input").click(function() {  
        var input = $(this);
        tabindex = input.attr("tabindex");
    })
	

</script>