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
	float:left;
	position:relative;
	bottom:21px;
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
#ui-datepicker-div{
	top: 56px !important;
}
#grid_production_logs{
	width:940px;
	height:auto;
	clear:both;
	margin-top:5px;
	/*border:1px solid #0F0;*/
	/*border-bottom:1px solid #A6C9E2;*/
}

.div_row_top{
	float:left; 
	background:#D2E6F5;
	padding-left:5px; 
	width:123px; 
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
	width:123px; 
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
input:focus{
	background:#FFC;
	color:#000;
}
select:focus{
	background:#FFC;
}
</style>
<form id="add_production_log" name="add_production_log" method="post" action="">
<div style="width:670px;">
	<fieldset>
    <legend>Manual Attendance Entry</legend>
    <div style="width:940px;">
    
    <div style="width:940px;">
		<div style="float:left; padding:1px;">
        	Date  
        </div>
        <div style="float:left;">
        	: <select id='month' name="month">
		<?php 
			$year = date('Y');
			for($i=1; $i<=12;$i++)
			{
				$month = date( 'F', mktime(0, 0, 0, $i, 1, $year) );
				$month_numeric =  date( 'm', mktime(0, 0, 0, $i, 1, $year) );
				$current_month = date('m');
				if($current_month == $month_numeric){
				?>
					<option value="<?php echo $month_numeric;?>" selected="selected"><?php echo $month;?></option>
				<?php
				}else{
				?>
					<option value="<?php echo $month_numeric;?>" ><?php echo $month;?></option>
				<?php
				}
			}
		?>
	</select>
	<select id='year' name="year">
		<?php
			$current_year = date('Y');
			for($i = $current_year-10; $i <= $current_year + 10; $i++)
			{
				if($current_year == $i){
				?>
					<option value="<?php echo $i;?>" selected="selected"><?php echo $i;?></option>
				<?php
				}else{
				?>
					<option value="<?php echo $i;?>" ><?php echo $i;?></option>
				<?php
				}
			}
		?>
	</select>
        </div>
	   <div style="float:left; padding:1px;">
            Section  
        </div>	
        <div style="float:left; padding-left:0px;">
           
          
            : <select id="section_id" name="section_id" style="width:121px; height:20px;" onchange="GetProcessEmp()" tabindex="2">
            	<option value="">-Select Name-</option>
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
	   <div style="float:left; padding:1px;">
            Emp ID
        </div>
        <div style="float:left; padding-left:0px;">
            : <select id="emp_id" name="emp_id" style="width:121px; height:20px;" onchange="GetImageOthers()" tabindex="3">
                <option></option>
              </select>
            
        </div><input type="hidden" value="" name="count" id="count">
        <div style="float:left; width:75px; height:85px; position:relative;top:24px; margin-left:15px; margin-right:15px;">
    	<div class="main_img">
            
        </div></div>
	   <div style=" float:left;">Name : <input type="text" name="full_name" id="full_name" style="border:none; background:none; width:150px; font-weight:bold;" /></div>
            	<div style=" float:left; margin-top:20px;">Designation : <input type="text" name="designation" id="designation" style="border:none; background:none; width:150px;font-weight:bold;" /></div>
        
          <div style=" width:100%; float:left">
			<div style=" float:left;">Total Working Day : <input type="text" name="total_working_day" id="total_working_day" style="border:none; background:white; width:90px;" tabindex="20" required="required"/></div>
			<div style=" float:left;margin-left:10px;">Holiday : <input type="text" name="holiday" id="holiday" style="border:none; background:white; width:90px;" tabindex="21" required="required" /></div>
			<div style=" float:left; margin-left:10px">Weekend : <input type="text" name="weekend" id="weekend" style="border:none; background:white; width:90px;" tabindex="22" required="required" /></div>
            </div>       
   
    </div><div style="clear:both;"></div>
       <div id="grid_production_logs">
    	<div style="height:24px;">
        	<div class="div_row_top">
            
            	P. Day
         	</div>
		<div class="div_row_top">
            	A. Day
         	</div>
            <div class="div_row_top">
            	Leave
         	</div>
            <div class="div_row_top">
            	No. Work
         	</div>
		<div class="div_row_top">
            	Night
         	</div>
         <div class="div_row_top">
            	Late
         	</div>
            
          <div class="div_row_top">
            	Work Holiday
         	</div>
		
            <div style="clear:both;"></div>
        </div>
        <div style="width:940px; overflow:auto;" id="grids">
        <div style="height:24px;">
	   <div class="div_row_normal"><input id="p_day" type="text" name="p_day" style="width:123px; background-color:transparent;  border:1px #330000 thin; border-style:groove;" tabindex="23"></div>
	   <div class="div_row_normal"><input id="a_day" type="text" name="a_day" style="width:123px; background-color:transparent;  border:1px #330000 thin; border-style:groove;" tabindex="24"></div>
         <div class="div_row_normal"><input id="leave" type="text" name="leave" style="width:123px; background-color:transparent;  border:1px #330000 thin; border-style:groove;" tabindex="25"></div>
	   <div class="div_row_normal"><input id="no_work" type="text" name="no_work" style="width:123px; background-color:transparent;  border:1px #330000 thin; border-style:groove;" tabindex="26"></div>
	   <div class="div_row_normal"><input id="night" type="text" name="night" style="width:123px; background-color:transparent;  border:1px #330000 thin; border-style:groove;" tabindex="27"></div>
        <div class="div_row_normal"><input id="late" type="text" name="late" style="width:123px; background-color:transparent;  border:1px #330000 thin; border-style:groove;" tabindex="28"></div>
         <div class="div_row_normal"><input id="h_day" type="text" name="h_day" style="width:123px; background-color:transparent;  border:1px #330000 thin; border-style:groove;" tabindex="29"></div>
</div><div style="clear:both;"></div>
        </div>
		<div style="float:left; width:903px; text-align:right; height:24px;">
        	<input type="button" value="Submit" id="add_production_log_button" tabindex="4" class="add_submit"/>
        </div>
    </div></div>

    </fieldset>
 </div>   
    




</form>

<link rel="stylesheet" href="<?php echo base_url();?>css/datepicker/jquery-ui-1.9.2.custom/development-bundle/themes/base/jquery-ui.css" />
<script src="<?php echo base_url();?>js/datepicker/jquery-1.8.3.js"></script>
<script src="<?php echo base_url();?>js/datepicker/jquery-ui.js"></script>

<script>

$(function(){
	
	$('.datepicker').datepicker({
   		dateFormat: "dd-mm-yy"
 	});
	$('#add_production_log_button').click(function(){ 
		var month 				= document.getElementById('month').value;
		var year		 		= document.getElementById('year').value;
		var section_id 			= document.getElementById('section_id').value;
		var emp_id 				= document.getElementById('emp_id').value;
		var total_working_day 	= document.getElementById('total_working_day').value;
		var holiday 			= document.getElementById('holiday').value;
		var weekend 			= document.getElementById('weekend').value;
		var p_day 				= document.getElementById('p_day').value;
		var a_day 				= document.getElementById('a_day').value;
		var leave 				= document.getElementById('leave').value;
		var no_work 			= document.getElementById('no_work').value;
		var night 				= document.getElementById('night').value;
		var late 				= document.getElementById('late').value;
		var h_day 				= document.getElementById('h_day').value;
		var process_start_date = 0;
		<?php //$process_date 		= $this->pd_process_model->get_start_end_date($month,$year);   
		$process_start_date = "21";//$process_date['start_date'] ;
		$process_end_date 	= "25";//$process_date['end_date'] ;
		?>
		
		if(section_id==0 || section_id=='')
		  {
		  	alert('Please Select Section.');
			tabindex = 2;
			document.getElementById('section_id').focus();
		  	return;
		  }
		if(emp_id==0 || emp_id=='')
		  {
		  	alert('Please Select Employee ID.');
			tabindex = 3;
			document.getElementById('emp_id').focus();
		  	return;
		  }
		  
		  if(total_working_day==0 || total_working_day=='')
		  {
		  	alert('Please Enter Total Working Day');
			tabindex = 20;
			document.getElementById('total_working_day').focus();
		  	return;
		  }
		  if(holiday=='')
		  {
		  	alert('Please Enter Holiday.');
			tabindex = 21;
			document.getElementById('holiday').focus();
		  	return;
		  }
		  if(weekend=='')
		  {
		  	alert('Please Enter Weekend.');
			tabindex = 22;
			document.getElementById('weekend').focus();
		  	return;
		  }
		  if(p_day=='')
		  {
		  	alert('Please Enter Present Day');
			tabindex = 23;
			document.getElementById('p_day').focus();
		  	return;
		  }
		  if(a_day=='')
		  {
		  	alert('Please Enter Absent Day');
			tabindex = 24;
			document.getElementById('a_day').focus();
		  	return;
		  }
		  if(leave=='')
		  {
		  	alert('Please Enter Leave');
			tabindex = 25;
			document.getElementById('leave').focus();
		  	return;
		  }
		  if(no_work=='')
		  {
		  	alert('Please Enter No Work Day');
			tabindex = 26;
			document.getElementById('no_work').focus();
		  	return;
		  }
		  if(night=='')
		  {
		  	alert('Please Enter Night');
			tabindex = 27;
			document.getElementById('night').focus();
		  	return;
		  }
		  if(late=='')
		  {
		  	alert('Please Enter No Work Day');
			tabindex = 28;
			document.getElementById('late').focus();
		  	return;
		  }
		  if(h_day=='')
		  {
		  	alert('Please Enter Working Holiday');
			tabindex = 29;
			document.getElementById('h_day').focus();
		  	return;
		  }
		  var manual_total_working_day = parseInt(p_day, 10) + parseInt(a_day, 10) + parseInt(leave, 10);
		  //alert(manual_total_working_day);
		  if(total_working_day != manual_total_working_day)
		  {
			  alert('Total Working Day Must Equal to (P. Day + A. Day + Leave).');
			  document.getElementById('total_working_day').focus();
			  return ;
		  }
		  dataString = $("#add_production_log").serialize();
		  $.ajax({
				type: "POST",
				url: "<?php echo base_url(); ?>index.php/manual_attendance_con/add_production_log",
				data: dataString,
				cache: false,
				success: function(data){
					if(data == 'Number of Days Error')
					{
						alert('No. of Days Must Equal to (Total Working Day + Holiday + Weekend).');
						return false;
					}
					alert('Process Log is added Successfully!');
					var index = $("select#emp_id").prop('selectedIndex');
					if($('#emp_id option:last').val() == $('#emp_id option:selected').val())
					{
						$("select#emp_id").prop('selectedIndex', 0);
						
						$('.main_img').html('');
						return false;
					}
					else
					{
						$('#grids').html('<div style="width:940px; overflow:auto;" id="grids"><div style="height:24px;"><div class="div_row_normal"><input id="p_day" type="text" name="p_day" style="width:123px; background-color:transparent;  border:1px #330000 thin; border-style:groove;" tabindex="23"></div><div class="div_row_normal"><input id="a_day" type="text" name="a_day" style="width:123px; background-color:transparent;  border:1px #330000 thin; border-style:groove;" tabindex="24"></div><div class="div_row_normal"><input id="leave" type="text" name="leave" style="width:123px;background-color:transparent; border:1px #330000 thin; border-style:groove;" tabindex="25"></div><div class="div_row_normal"><input id="no_work" type="text" name="no_work" style="width:123px; background-color:transparent;  border:1px #330000 thin; border-style:groove;" tabindex="26"></div><div class="div_row_normal"><input id="night" type="text" name="night" style="width:123px; background-color:transparent;  border:1px #330000 thin; border-style:groove;" tabindex="27"></div><div class="div_row_normal"><input id="late" type="text" name="late" style="width:123px; background-color:transparent;  border:1px #330000 thin; border-style:groove;" tabindex="28"></div><div class="div_row_normal"><input id="h_day" type="text" name="h_day"style="width:123px; background-color:transparent;border:1px #330000 thin; border-style:groove;" tabindex="29"></div></div><div style="clear:both;"></div></div>');
					}
		$("select#emp_id").prop('selectedIndex', index+1);
/*		if($("#emp_id").val() == '')
		{
			alert('sdf');
			return false;
		}*/
		GetImageOthers();
					
				}
				});
			return false;	
	});
/*function tabE(obj,e){ 
   var e=(typeof event!='undefined')?window.event:e;// IE : Moz 
   if(e.keyCode==13){ 
     var ele = document.forms[0].elements; 
     for(var i=0;i<ele.length;i++){ 
       var q=(i==ele.length-1)?0:i+1;// if last element : if any other 
       if(obj==ele[i]){ele[q].focus();break} 
     } 
  return false; 
   } 
  } */
	$('#pd_log_date').keypress(function(event) {
        var keycode = (event.keyCode ? event.keyCode : event.which);
	   
        if(keycode == '13') { 
            tabindex++;
            
           /* while(($("[TabIndex='"+tabindex+"']").length == 0 || $("[TabIndex='"+tabindex+"']:not([readonly])").length == 0) && tabindex != lastTabIndex ){
                tabindex++;
            }*/
            if(tabindex == lastTabIndex){ tabindex = 3 } 
            $("[TabIndex='"+tabindex+"']").focus();
          
        }
    });
    $('#section_id').keypress(function(event) {
        var keycode = (event.keyCode ? event.keyCode : event.which);
	   
        if(keycode == '13') { 
            tabindex++;
            
            /*while(($("[TabIndex='"+tabindex+"']").length == 0 || $("[TabIndex='"+tabindex+"']:not([readonly])").length == 0) && tabindex != lastTabIndex ){
                tabindex++;
            }*/
            if(tabindex == lastTabIndex){ tabindex = 3 } 
            $("[TabIndex='"+tabindex+"']").focus();
          
        }
    });
    $('#emp_id').keypress(function(event) {
        var keycode = (event.keyCode ? event.keyCode : event.which);
	   
        if(keycode == '13' && tabindex != 3) { 
            tabindex++;
            
            /*while(($("[TabIndex='"+tabindex+"']").length == 0 || $("[TabIndex='"+tabindex+"']:not([readonly])").length == 0) && tabindex != lastTabIndex ){
                tabindex++;
            }*/
            if(tabindex == lastTabIndex){ tabindex = 3 } 
            $("[TabIndex='"+tabindex+"']").focus();
          
        }
    });
    $(document).keypress(function(event) {
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if(keycode == '13' && tabindex != 1 && tabindex != 2 && tabindex != 3) { 
            tabindex++;
            
           /* while(($("[TabIndex='"+tabindex+"']").length == 0 || $("[TabIndex='"+tabindex+"']:not([readonly])").length == 0) && tabindex != lastTabIndex ){
                tabindex++;
            }*/
            if(tabindex == lastTabIndex){ tabindex = 3 } 
            $("[TabIndex='"+tabindex+"']").focus();
          
        }
    });

    $("input").click(function() {  
        var input = $(this);
        tabindex = input.attr("tabindex");
    });
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
	var e_id = 'emp_id';
		//e_id += id;
	var month = document.getElementById('month').value;
	var year = document.getElementById('year').value;
		
	var section_id = document.getElementById(s_id).value;
  
 	if(month=='Select'){
		alert("Please select Section ");
	 	return;
	}
	if(year=='Select'){
		alert("Please select Section ");
	 	return;
	}
	if(section_id=='Select'){
		alert("Please select Section ");
	 	return;
	}
    //alert(i_group);
	var queryString=s_id+"="+section_id;
	hostname = window.location.hostname;
	var url = "<?php echo base_url(); ?>index.php/emp_wise_entry_con/GetProcessEmp/id/"+s_id;
	
	ajaxRequest.open("POST", url, true);
	ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	ajaxRequest.send(queryString);
	 
	ajaxRequest.onreadystatechange = function(){
		if(ajaxRequest.readyState == 4){
			var resp = ajaxRequest.responseText;
			process_name = resp.split("===");
			emp_id = process_name[0].split("***");
			
			document.getElementById(e_id).options.length = 0;
			document.getElementById(e_id).options[0]=new Option("Select","", true, false);
			for (i=0; i<emp_id.length; i++){
				//document.getElementById(e_id).options[i+1]=new Option(emp_id[i], false);
				document.getElementById(e_id).options[i+1]=new Option(emp_id[i],emp_id[i], false, false);
			}
			
		}
	}
}
var tabindex = 1; 


function GetImageOthers(){
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
	var month = document.getElementById('month').value;
	var year = document.getElementById('year').value;
	/*var pd_log_date = document.getElementById('pd_log_date').value;
	if(pd_log_date == '')
	{
		alert("Select Date First!");
         	return false;
	}*/
	var em_id 		= 'emp_id';
	var desig_id 	= 'designation';
	var f_id 		= 'full_name';
	//var p_img_id	= 'preview_img';
	var emp_id 	= document.getElementById(em_id).value;
  
 	if(emp_id=='Select'){
		alert("Please select Emp Id ");
	 	return;
	}

	var queryString=em_id+"="+emp_id;
	hostname = window.location.hostname;
	var url = "<?php echo base_url(); ?>index.php/manual_attendance_con/get_info/emp_id/"+emp_id+"/month/"+month+"/year/"+year;
	
	ajaxRequest.open("POST", url, true);
	ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	ajaxRequest.send(queryString);
	 
	ajaxRequest.onreadystatechange = function(){
		if(ajaxRequest.readyState == 4){
			var resp 			= ajaxRequest.responseText;
			data 			= resp.split("===");
			//alert(data);
			document.getElementById('full_name').value = data[0];
			image_name = data[1];
			document.getElementById('designation').value = data[2];
			document.getElementById('total_working_day').value = data[3];
			document.getElementById('holiday').value 	= data[4];
			document.getElementById('weekend').value 	= data[5];
			document.getElementById('p_day').value 		= data[6];
			document.getElementById('a_day').value 		= data[7];
			document.getElementById('leave').value		= data[8];
			document.getElementById('no_work').value 	= data[9];
			document.getElementById('night').value 		= data[10];
			document.getElementById('late').value 		= data[11];
			document.getElementById('h_day').value 		= data[12];
		
			hostname = window.location.hostname;
			var url = "<?php echo base_url(); ?>uploads/photo/"+image_name;
			$('.main_img').html('<img id="preview_img" class="preview" src="'+url+'"/>');
		}
	}
}
function GridGen()
{
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
	var article_id = 'article_id';
		//p_id += id;
	var process_id = 'process_id';
	var process_names = 'process_name';
		//e_id += id;
		
	var section_id = document.getElementById(s_id).value;
	var pd_log_date = document.getElementById('pd_log_date').value;
	var emp_id = document.getElementById('emp_id').value;
  
 	if(section_id=='Select'){
		alert("Please select Section ");
	 	return;
	}
    //alert(i_group);
	var queryString=s_id+"="+section_id;
	hostname = window.location.hostname;
	var url = "<?php echo base_url(); ?>index.php/emp_wise_entry_con/GridGen/id/"+s_id;
	
	ajaxRequest.open("POST", url, true);
	ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	ajaxRequest.send(queryString);
	 
	ajaxRequest.onreadystatechange = function(){
		if(ajaxRequest.readyState == 4){
			var resp = ajaxRequest.responseText;
			process_name = resp.split("===");
			article_id = process_name[0].split("***");
			process_id = process_name[1].split("***");
			process_names = process_name[2].split("***");
			color_id = process_name[3].split("***");
			color_name = process_name[4].split("***");
			$('#grids').html('');
			var i = 0;
			var j = 4;
			tabindex = 3;
			while(i<article_id.length && process_id[i] != '')
			{
				j=4;
				j=i+j;
$('<div style="height:24px;"><div class="div_row_normal">'+article_id[i]+'</div><div class="div_row_normal">'+color_name[i]+'</div><div class="div_row_normal">'+process_names[i]+'</div><div class="div_row_normal"><input id="tabable'+i+'" type="text" name="quantity'+i+'" style="width:133px; background-color:transparent;  border:1px #330000 thin; border-style:groove;" tabindex="'+j+'"><input type="hidden" name="marge'+i+'" value="'+pd_log_date+','+section_id+','+emp_id+','+article_id[i]+','+process_id[i]+','+color_id[i]+'"></div></div><div style="clear:both;"></div>').fadeIn('slow').appendTo('#grids');
document.getElementById('count').value = i;
			i++;
			}
			document.getElementById('tabable0').focus();
			document.getElementById('add_production_log_button').tabIndex = j+1;
			lastTabIndex = j+2; 
			tabindex++;
		}
	}
}

var lastTabIndex = 4;
function OnFocusOut()
{
    var currentElement = $get(currentElementId); // ID set by OnFOcusIn
    var curIndex = currentElement.tabIndex; //get current elements tab index
    if(curIndex == lastTabIndex) { //if we are on the last tabindex, go back to the beginning
        curIndex = 0;
    }
    var tabbables = document.getElementsByName("tabable"); //get all tabable elements
    for(var i=0; i<tabbables.length; i++) { //loop through each element
        if(tabbables[i].tabIndex == (curIndex+1)) { //check the tabindex to see if it's the element we want
            tabbables[i].focus(); //if it's the one we want, focus it and exit the loop
            break;
        }
    }
}
// tab index setup
   
    
	

</script>