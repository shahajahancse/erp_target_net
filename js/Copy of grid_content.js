function grid_get_all_data()
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
 var start = document.getElementById('grid_start').value;	
 if(start == "Select" || start == '')
 {
	 alert("Please select ALL");
	 return;
 }
 
 //var queryString="desig="+desig+"&dept="+dept;
 hostname = window.location.hostname;
 url =  "http://"+hostname+"/pr/magpie_com1/index.php/payroll_con/manual_atten_co/";
 ajaxRequest.open("POST", url, true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send();
 
  
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		//alert(resp);
		alldata = resp.split("$$$");
		
		dept_idname = alldata[0].split("===");
		var dept_id = dept_idname[0].split("***");
	    var dept_name = dept_idname[1].split("***");
				
		document.grid.grid_dept.options.length=0;
		document.grid.grid_dept.options[0]=new Option("Select","Select", true, false);
		for (i=0; i<dept_id.length; i++){
			document.grid.grid_dept.options[i+1]=new Option(dept_name[i],dept_id[i], false, false);

		}
				
		sec_idname = alldata[1].split("===");
		sec_id = sec_idname[0].split("***");
		sec_name = sec_idname[1].split("***");
	 		
		document.grid.grid_section.options.length=0;
		document.grid.grid_section.options[0]=new Option("Select","Select", true, false); 
		for (i=0; i<sec_id.length; i++){
			//alert(sec_name[i]);
			document.grid.grid_section.options[i+1]=new Option(sec_name[i],sec_id[i], false, false);

		}
		
		
		line_idname = alldata[2].split("===");
		line_id = line_idname[0].split("***");
		line_name = line_idname[1].split("***");
		
		document.grid.grid_line.options.length=0;
		document.grid.grid_line.options[0]=new Option("Select","Select", true, false); 
		for (i=0; i<line_id.length; i++){
			document.grid.grid_line.options[i+1]=new Option(line_name[i],line_id[i], false, false);

		}
		
		
		desig_idname = alldata[3].split("===");
		desig_id = desig_idname[0].split("***");
		desig_name = desig_idname[1].split("***");
		
		document.grid.grid_desig.options.length=0;
		document.grid.grid_desig.options[0]=new Option("Select","Select", true, false); 
		for (i=0; i<desig_id.length; i++){
			document.grid.grid_desig.options[i+1]=new Option(desig_name[i],desig_id[i], false, false);

		}
		
		var sex_id = ["1","2"];
		var sex_name = ["Male","Female"];
		
		document.grid.grid_sex.options.length=0;
		document.grid.grid_sex.options[0]=new Option("Select","Select", true, false); 
		for (i=0; i<sex_id.length; i++){
			document.grid.grid_sex.options[i+1]=new Option(sex_name[i],sex_id[i], false, false);

		}
		
		status_idname = alldata[4].split("===");
		status_id = status_idname[0].split("***");
		status_name = status_idname[1].split("***");
		
		document.grid.grid_status.options.length=0;
		//document.grid.grid_status.options[0]=new Option("Select","Select", true, false); 
		for (i=0; i<status_id.length; i++){
			document.grid.grid_status.options[i]=new Option(status_name[i],status_id[i], false, false);

		}
		
	$('#list1').jqGrid('GridUnload');
	
	hostname = window.location.hostname;
	url =  "http://"+hostname+"/pr/magpie_com1/index.php/grid_con/grid_get_all_data";
	//var url = "http://localhost/payroll/index.php/grid_con/grid_get_all_data";
	main_grid(url)
	
	
	}
	}
}

function grid_all_search()
{
	var dept 		= document.getElementById('grid_dept').value;	
	var section 	= document.getElementById('grid_section').value;
	var line 		= document.getElementById('grid_line').value;
	var designation = document.getElementById('grid_desig').value;
	var sex = document.getElementById('grid_sex').value;
	var status = document.getElementById('grid_status').value;
	
	$('#list1').jqGrid('GridUnload');
	
	hostname = window.location.hostname;
	url =  "http://"+hostname+"/pr/magpie_com1/index.php/grid_con/grid_all_search/"+dept+"/"+section+"/"+line+"/"+designation+"/"+sex+"/"+status;
	//var url = "http://localhost/payroll/index.php/grid_con/grid_all_search/"+dept+"/"+section+"/"+line+"/"+designation;
	main_grid(url)
}

function grid_daily_present_report()
{
	var firstdate = document.getElementById('firstdate').value;
	if(firstdate =='')
	{
		alert("Please select First date");
		return;
	}
	
	var grid_start = document.getElementById('grid_start').value;
	if(grid_start =='Select')
	{
		alert("Please select Category options");
		return;
	}
	
	$grid  = $("#list1");
	var id_array = $grid.getGridParam('selarrrow');
	var selected_id_list = new Array();
	var spl = (id_array.join('xxx'));
	var status = "P";
	
	if(spl =='')
	{
		alert("Please select Employee ID");
		return;
	}
	hostname = window.location.hostname;
	url =  "http://"+hostname+"/pr/magpie_com1/index.php/grid_con/grid_daily_report/"+firstdate+"/"+status+"/"+spl;
	
	daily_present_report = window.open(url,'daily_present_report',"menubar=1,resizable=1,scrollbars=1,width=1600,height=800");
	daily_present_report.moveTo(0,0);
}

function grid_daily_absent_report()
{
	var firstdate = document.getElementById('firstdate').value;
	if(firstdate =='')
	{
		alert("Please select First date");
		return;
	}
	
	var grid_start = document.getElementById('grid_start').value;
	if(grid_start =='Select')
	{
		alert("Please select Category options");
		return;
	}
	
	$grid  = $("#list1");
	var id_array = $grid.getGridParam('selarrrow');
	var selected_id_list = new Array();
	var spl = (id_array.join('xxx'));
	
	var status = "A";
	
	
	if(spl =='')
	{
		alert("Please select Employee ID");
		return;
	}
	hostname = window.location.hostname;
	url =  "http://"+hostname+"/pr/magpie_com1/index.php/grid_con/grid_daily_report/"+firstdate+"/"+status+"/"+spl;
	
	daily_absent_report = window.open(url,'daily_absent_report',"menubar=1,resizable=1,scrollbars=1,width=1600,height=800");
	daily_absent_report.moveTo(0,0);
}

function grid_daily_leave_report()
{
	var firstdate = document.getElementById('firstdate').value;
	if(firstdate =='')
	{
		alert("Please select First date");
		return;
	}
	
	var grid_start = document.getElementById('grid_start').value;
	if(grid_start =='Select')
	{
		alert("Please select Category options");
		return;
	}
	
	$grid  = $("#list1");
	var id_array = $grid.getGridParam('selarrrow');
	var selected_id_list = new Array();
	var spl = (id_array.join('xxx'));
	
	var status = "L";
	
	if(spl =='')
	{
		alert("Please select Employee ID");
		return;
	}
	hostname = window.location.hostname;
	url =  "http://"+hostname+"/pr/magpie_com1/index.php/grid_con/grid_daily_report/"+firstdate+"/"+status+"/"+spl;
	
	daily_leave_report = window.open(url,'daily_leave_report',"menubar=1,resizable=1,scrollbars=1,width=1600,height=800");
	daily_leave_report.moveTo(0,0);
}

function grid_daily_late_report()
{
	var firstdate = document.getElementById('firstdate').value;
	if(firstdate =='')
	{
		alert("Please select First date");
		return;
	}
	
	var grid_start = document.getElementById('grid_start').value;
	if(grid_start =='Select')
	{
		alert("Please select Category options");
		return;
	}
	
	$grid  = $("#list1");
	var id_array = $grid.getGridParam('selarrrow');
	var selected_id_list = new Array();
	var spl = (id_array.join('xxx'));
			
	if(spl =='')
	{
		alert("Please select Employee ID");
		return;
	}
	hostname = window.location.hostname;
	url =  "http://"+hostname+"/pr/magpie_com1/index.php/grid_con/grid_daily_late_report/"+firstdate+"/"+spl;
	
	daily_late_report = window.open(url,'daily_late_report',"menubar=1,resizable=1,scrollbars=1,width=1600,height=800");
	daily_late_report.moveTo(0,0);
}

function grid_daily_out_punch_miss_report()
{
	var firstdate = document.getElementById('firstdate').value;	
	if(firstdate =='')
	{
		alert("Please select First date");
		return;
	}
	
	var grid_start = document.getElementById('grid_start').value;
	if(grid_start =='Select')
	{
		alert("Please select Category options");
		return;
	}
	
	$grid  = $("#list1");
	var id_array = $grid.getGridParam('selarrrow');
	var selected_id_list = new Array();
	var spl = (id_array.join('xxx'));
	
	if(spl =='')
	{
		alert("Please select Employee ID");
		return;
	}
	hostname = window.location.hostname;
	url =  "http://"+hostname+"/pr/magpie_com1/index.php/grid_con/grid_daily_out_punch_miss_report/"+firstdate+"/"+spl;
	
	daily_out_punch = window.open(url,'daily_out_punch',"menubar=1,resizable=1,scrollbars=1,width=1600,height=800");
	daily_out_punch.moveTo(0,0);
}

function grid_continuous_present_report()
{
	var firstdate = document.getElementById('firstdate').value;	
	if(firstdate =='')
	{
		alert("Please select First date");
		return;
	}
	var seconddate = document.getElementById('seconddate').value;	
	if(seconddate =='')
	{
		alert("Please select Second date");
		return;
	}
	
	var grid_start = document.getElementById('grid_start').value;
	if(grid_start =='Select')
	{
		alert("Please select Category options");
		return;
	}
	
	$grid  = $("#list1");
	var id_array = $grid.getGridParam('selarrrow');
	var selected_id_list = new Array();
	var spl = (id_array.join('xxx'));
	
	if(spl =='')
	{
		alert("Please select Employee ID");
		return;
	}
	
	var status = "P";
	hostname = window.location.hostname;
	url =  "http://"+hostname+"/pr/magpie_com1/index.php/grid_con/grid_continuous_report/"+firstdate+"/"+seconddate+"/"+status+"/"+spl;
	
	contin_present = window.open(url,'contin_present',"menubar=1,resizable=1,scrollbars=1,width=1600,height=800");
	contin_present.moveTo(0,0);
}

function grid_continuous_absent_report()
{
	var firstdate = document.getElementById('firstdate').value;	
	if(firstdate =='')
	{
		alert("Please select First date");
		return;
	}
	var seconddate = document.getElementById('seconddate').value;	
	if(seconddate =='')
	{
		alert("Please select Second date");
		return;
	}
	
	var grid_start = document.getElementById('grid_start').value;
	if(grid_start =='Select')
	{
		alert("Please select Category options");
		return;
	}
	
	$grid  = $("#list1");
	var id_array = $grid.getGridParam('selarrrow');
	var selected_id_list = new Array();
	var spl = (id_array.join('xxx'));
	
	if(spl =='')
	{
		alert("Please select Employee ID");
		return;
	}
	
	var status = "A";
	hostname = window.location.hostname;
	url =  "http://"+hostname+"/pr/magpie_com1/index.php/grid_con/grid_continuous_report/"+firstdate+"/"+seconddate+"/"+status+"/"+spl;
	
	contin_absent = window.open(url,'contin_absent',"menubar=1,resizable=1,scrollbars=1,width=1600,height=800");
	contin_absent.moveTo(0,0);
}

function grid_continuous_leave_report()
{
	var firstdate = document.getElementById('firstdate').value;	
	if(firstdate =='')
	{
		alert("Please select First date");
		return;
	}
	var seconddate = document.getElementById('seconddate').value;	
	if(seconddate =='')
	{
		alert("Please select Second date");
		return;
	}
	
	var grid_start = document.getElementById('grid_start').value;
	if(grid_start =='Select')
	{
		alert("Please select Category options");
		return;
	}
	
	$grid  = $("#list1");
	var id_array = $grid.getGridParam('selarrrow');
	var selected_id_list = new Array();
	var spl = (id_array.join('xxx'));
	
	if(spl =='')
	{
		alert("Please select Employee ID");
		return;
	}
	
	var status = "L";
	hostname = window.location.hostname;
	url =  "http://"+hostname+"/pr/magpie_com1/index.php/grid_con/grid_continuous_report/"+firstdate+"/"+seconddate+"/"+status+"/"+spl;
	
	contin_absent = window.open(url,'contin_absent',"menubar=1,resizable=1,scrollbars=1,width=1600,height=800");
	contin_absent.moveTo(0,0);
}

function grid_continuous_late_report()
{
	var firstdate = document.getElementById('firstdate').value;	
	if(firstdate =='')
	{
		alert("Please select First date");
		return;
	}
	var seconddate = document.getElementById('seconddate').value;	
	if(seconddate =='')
	{
		alert("Please select Second date");
		return;
	}
	
	var grid_start = document.getElementById('grid_start').value;
	if(grid_start =='Select')
	{
		alert("Please select Category options");
		return;
	}
	
	$grid  = $("#list1");
	var id_array = $grid.getGridParam('selarrrow');
	var selected_id_list = new Array();
	var spl = (id_array.join('xxx'));
	
	if(spl =='')
	{
		alert("Please select Employee ID");
		return;
	}
	
	var status = "L";
	hostname = window.location.hostname;
	url =  "http://"+hostname+"/pr/magpie_com1/index.php/grid_con/grid_continuous_late_report/"+firstdate+"/"+seconddate+"/"+spl;
	
	contin_absent = window.open(url,'contin_absent',"menubar=1,resizable=1,scrollbars=1,width=1600,height=800");
	contin_absent.moveTo(0,0);
}

function grid_app_letter()
{
	var grid_start = document.getElementById('grid_start').value;
	if(grid_start =='Select')
	{
		alert("Please select Category options");
		return;
	}
	
	$grid  = $("#list1");
	var id_array = $grid.getGridParam('selarrrow');
	var selected_id_list = new Array();
	var spl = (id_array.join('xxx'));
	
	if(spl =='')
	{
		alert("Please select Employee ID");
		return;
	}
	
	var status = "L";
	hostname = window.location.hostname;
	url =  "http://"+hostname+"/pr/magpie_com1/index.php/grid_con/grid_app_letter/"+spl;
	
	app_letter = window.open(url,'app_letter',"menubar=1,resizable=1,scrollbars=1,width=1600,height=800");
	app_letter.moveTo(0,0);
}

function grid_pay_slip()
{
	var firstdate = document.getElementById('firstdate').value;	
	if(firstdate =='')
	{
		alert("Please select First date for month and year selection");
		return;
	}
	
	var grid_start = document.getElementById('grid_start').value;
	if(grid_start =='Select')
	{
		alert("Please select Category options");
		return;
	}
	
	$grid  = $("#list1");
	var id_array = $grid.getGridParam('selarrrow');
	var selected_id_list = new Array();
	var spl = (id_array.join('xxx'));
	
	if(spl =='')
	{
		alert("Please select Employee ID");
		return;
	}
	
	hostname = window.location.hostname;
	url =  "http://"+hostname+"/pr/magpie_com1/index.php/grid_con/grid_pay_slip/"+"/"+firstdate+"/"+spl;
	
	pay_slip = window.open(url,'pay_slip',"menubar=1,resizable=1,scrollbars=1,width=1600,height=800");
	pay_slip.moveTo(0,0);
}

function grid_id_card()
{
	var grid_start = document.getElementById('grid_start').value;
	if(grid_start =='Select')
	{
		alert("Please select Category options");
		return;
	}
	
	$grid  = $("#list1");
	var id_array = $grid.getGridParam('selarrrow');
	var selected_id_list = new Array();
	var spl = (id_array.join('xxx'));
	
	if(spl =='')
	{
		alert("Please select Employee ID");
		return;
	}
	
	hostname = window.location.hostname;
	url =  "http://"+hostname+"/pr/magpie_com1/index.php/grid_con/grid_id_card/"+spl;
	
	id_card = window.open(url,'id_card',"menubar=1,resizable=1,scrollbars=1,width=1600,height=800");
	id_card.moveTo(0,0);	
}

function grid_job_card()
{
	var firstdate = document.getElementById('firstdate').value;	
	if(firstdate =='')
	{
		alert("Please select First date");
		return;
	}
	var seconddate = document.getElementById('seconddate').value;	
	if(seconddate =='')
	{
		alert("Please select Second date");
		return;
	}
	
	var grid_start = document.getElementById('grid_start').value;
	if(grid_start =='Select')
	{
		alert("Please select Category options");
		return;
	}
	
	$grid  = $("#list1");
	var id_array = $grid.getGridParam('selarrrow');
	var selected_id_list = new Array();
	var spl = (id_array.join('xxx'));
	
	if(spl =='')
	{
		alert("Please select Employee ID");
		return;
	}
	
	hostname = window.location.hostname;
	url =  "http://"+hostname+"/pr/magpie_com1/index.php/grid_con/grid_job_card/"+firstdate+"/"+seconddate+"/"+spl;
	
	job_card = window.open(url,'job_card',"menubar=1,resizable=1,scrollbars=1,width=1600,height=800");
	job_card.moveTo(0,0);	
}

function grid_monthly_att_register()
{
	var firstdate = document.getElementById('firstdate').value;
	if(firstdate =='')
	{
		alert("Please select First date for month and year selection");
		return;
	}
	
	var grid_start = document.getElementById('grid_start').value;
	if(grid_start =='Select')
	{
		alert("Please select Category options");
		return;
	}
	
	$grid  = $("#list1");
	var id_array = $grid.getGridParam('selarrrow');
	var selected_id_list = new Array();
	var spl = (id_array.join('xxx'));
		
	if(spl =='')
	{
		alert("Please select Employee ID");
		return;
	}
	hostname = window.location.hostname;
	url =  "http://"+hostname+"/pr/magpie_com1/index.php/grid_con/grid_monthly_att_register/"+firstdate+"/"+spl;
	
	monthly_att_register = window.open(url,'monthly_att_register',"menubar=1,resizable=1,scrollbars=1,width=1600,height=800");
	monthly_att_register.moveTo(0,0);
}

function grid_extra_ot()
{
	var firstdate = document.getElementById('firstdate').value;
	if(firstdate =='')
	{
		alert("Please select First date");
		return;
	}
	var seconddate = document.getElementById('seconddate').value;	
	if(seconddate =='')
	{
		alert("Please select Second date");
		return;
	}
	
	var grid_start = document.getElementById('grid_start').value;
	if(grid_start =='Select')
	{
		alert("Please select Category options");
		return;
	}
	
	$grid  = $("#list1");
	var id_array = $grid.getGridParam('selarrrow');
	var selected_id_list = new Array();
	var spl = (id_array.join('xxx'));
		
	if(spl =='')
	{
		alert("Please select Employee ID");
		return;
	}
	hostname = window.location.hostname;
	url =  "http://"+hostname+"/pr/magpie_com1/index.php/grid_con/grid_extra_ot/"+firstdate+"/"+seconddate+"/"+spl;
	
	extra_ot = window.open(url,'extra_ot',"menubar=1,resizable=1,scrollbars=1,width=1600,height=800");
	extra_ot.moveTo(0,0);
}

function manual_attendance_entry()
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
	var firstdate = document.getElementById('firstdate').value;
	if(firstdate =='')
	{
		alert("Please select First date");
		return;
	}
	var seconddate = document.getElementById('seconddate').value;	
	if(seconddate =='')
	{
		alert("Please select Second date");
		return;
	}
	
	var grid_start = document.getElementById('grid_start').value;
	if(grid_start =='Select')
	{
		alert("Please select Category options");
		return;
	}
	
	$grid  = $("#list1");
	var id_array = $grid.getGridParam('selarrrow');
	var selected_id_list = new Array();
	var spl = (id_array.join('xxx'));
		
	if(spl =='')
	{
		alert("Please select Employee ID");
		return;
	}
	
	var manual_time = document.getElementById('manual_time').value;
	if(manual_time =='')
	{
		alert("Please select Time");
		return;
	}
	
	var okyes;
 okyes=confirm('Are you sure you want to insert attendance?');
if(okyes==false) return;
	
	hostname = window.location.hostname;
	url =  "http://"+hostname+"/pr/magpie_com1/index.php/grid_con/manual_attendance_entry/";
	
	/*extra_ot = window.open(url,'extra_ot',"menubar=1,resizable=1,scrollbars=1,width=1600,height=800");
	extra_ot.moveTo(0,0);*/
	
	var queryString="firstdate="+firstdate+"&seconddate="+seconddate+"&manual_time="+manual_time+"&spl="+spl;
   
    ajaxRequest.open("POST", url, true);
 	ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 	ajaxRequest.send(queryString);
 
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		alert(resp);
	}
}
}

function manual_entry_Delete()
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
	var firstdate = document.getElementById('firstdate').value;
	if(firstdate =='')
	{
		alert("Please select First date");
		return;
	}
	
	var seconddate = document.getElementById('seconddate').value;	
	if(seconddate =='')
	{
		alert("Please select Second date");
		return;
	}
		
	var grid_start = document.getElementById('grid_start').value;
	if(grid_start =='Select')
	{
		alert("Please select Category options");
		return;
	}
	
	$grid  = $("#list1");
	var id_array = $grid.getGridParam('selarrrow');
	var selected_id_list = new Array();
	var spl = (id_array.join('xxx'));
		
	if(spl =='')
	{
		alert("Please select Employee ID");
		return;
	}
	
	var okyes;
 okyes=confirm('Are you sure you want to delete?');
if(okyes==false) return;
		
	hostname = window.location.hostname;
	url =  "http://"+hostname+"/pr/magpie_com1/index.php/grid_con/manual_entry_Delete/";
	
	/*extra_ot = window.open(url,'extra_ot',"menubar=1,resizable=1,scrollbars=1,width=1600,height=800");
	extra_ot.moveTo(0,0);*/
	
	var queryString="firstdate="+firstdate+"&seconddate="+seconddate+"&spl="+spl;
   
    ajaxRequest.open("POST", url, true);
 	ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 	ajaxRequest.send(queryString);
 
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		alert(resp);
	}
}
}

function save_work_off()
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
	var firstdate = document.getElementById('firstdate').value;
	if(firstdate =='')
	{
		alert("Please select First date");
		return;
	}
	
	var grid_start = document.getElementById('grid_start').value;
	if(grid_start =='Select')
	{
		alert("Please select Category options");
		return;
	}
	
	$grid  = $("#list1");
	var id_array = $grid.getGridParam('selarrrow');
	var selected_id_list = new Array();
	var spl = (id_array.join('xxx'));
		
	if(spl =='')
	{
		alert("Please select Employee ID");
		return;
	}
	
	var okyes;
 okyes=confirm('Are you sure you want to insert weekend?');
if(okyes==false) return;
		
	hostname = window.location.hostname;
	url =  "http://"+hostname+"/pr/magpie_com1/index.php/grid_con/save_work_off/";
	
	/*extra_ot = window.open(url,'extra_ot',"menubar=1,resizable=1,scrollbars=1,width=1600,height=800");
	extra_ot.moveTo(0,0);*/
	
	var queryString="firstdate="+firstdate+"&spl="+spl;
   
    ajaxRequest.open("POST", url, true);
 	ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 	ajaxRequest.send(queryString);
 
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		alert(resp);
	}
}
}

function save_holiday()
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
	var firstdate = document.getElementById('firstdate').value;
	if(firstdate =='')
	{
		alert("Please select First date");
		return;
	}
	
	var holiday_description = document.getElementById('holiday_description').value;
	if(holiday_description =='')
	{
		alert("Please insert holiday description");
		return;
	}
	
	var okyes;
 okyes=confirm('Are you sure you want to insert holiday?');
if(okyes==false) return;
	
	hostname = window.location.hostname;
	url =  "http://"+hostname+"/pr/magpie_com1/index.php/grid_con/save_holiday/";
	
	/*extra_ot = window.open(url,'extra_ot',"menubar=1,resizable=1,scrollbars=1,width=1600,height=800");
	extra_ot.moveTo(0,0);*/
	
	var queryString="firstdate="+firstdate+"&holiday_description="+holiday_description;
   
    ajaxRequest.open("POST", url, true);
 	ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 	ajaxRequest.send(queryString);
 
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		alert(resp);
	}
}
}

function grid_monthly_salary_sheet()
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
	var report_month_sal = document.getElementById('report_month_sal').value;
	if(report_month_sal =='')
	{
		alert("Please select month");
		return;
	}
	
	var report_year_sal = document.getElementById('report_year_sal').value;
	if(report_year_sal =='')
	{
		alert("Please select year");
		return;
	}
	
	var grid_start = document.getElementById('grid_start').value;
	if(grid_start =='Select')
	{
		alert("Please select Category options");
		return;
	}
	
	$grid  = $("#list1");
	var id_array = $grid.getGridParam('selarrrow');
	var selected_id_list = new Array();
	var spl = (id_array.join('xxx'));
		
	if(spl =='')
	{
		alert("Please select Employee ID");
		return;
	}
	
	var okyes;
 okyes=confirm('Are you sure you want to insert weekend?');
if(okyes==false) return;

var sal_year_month = report_month_sal+"-"+report_year_sal+"-"+"01";
		
	hostname = window.location.hostname;
	url =  "http://"+hostname+"/pr/magpie_com1/index.php/grid_con/grid_monthly_salary_sheet/"+sal_year_month+"/"+spl;
	
	sal_sheet = window.open(url,'sal_sheet',"menubar=1,resizable=1,scrollbars=1,width=1600,height=800");
	sal_sheet.moveTo(0,0);

}

function main_grid(url)
{

jQuery("#list1").jqGrid({
url: url,
datatype: "json",
//width:'600px',
colModel: [
	{name:'id',index:'id', width:100, label: 'EMP ID', hidden: false},
	{name:'emp_full_name',index:'emp_full_name', width:200, label: 'Full Name'}
	<!--{name:'emp_dob',index:'emp_dob', width:100, label: 'DOB'}-->
	
],
  rowNum:20000, rowList:[10,20,30],
 //imgpath: gridimgpath,
 pager: jQuery('#pager1'),
 sortname: 'emp_id',
 viewrecords: true,
 sortorder: "asc",
 multiselect:true
 }).navGrid('#pager1',{ edit:false, add:false, del: false });
 
}