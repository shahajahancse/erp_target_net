function pd_process()
{
 var ajaxRequest;  
	
 try{
    ajaxRequest = new XMLHttpRequest();
 }catch (e){
   try{
      ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
   }catch (e) {
      try{
         ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
      }catch (e){
         return false;
      }
   }
 }
//alert("hello");
 var okyes;
 okyes=confirm('Are you sure you want to start process?');
if(okyes==false) return;
  $("#loader").show();
month= document.getElementById('report_month_sal').value;
year= document.getElementById('report_year_sal').value;

	hostname = window.location.hostname;
	url =  "http://"+hostname+"/erp_target/index.php/pd_process_con/pd_process/";
	var queryString="year="+year+"&month="+month;
	
	ajaxRequest.open("POST",url, true);
	ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	ajaxRequest.send(queryString);
	ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		$("#loader").hide();
		alert(resp);
	}
	}
}
function production_salary_sheet()
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
	
	var grid_status = document.getElementById('grid_status').value;
	
	$grid  = $("#list1");
	var id_array = $grid.getGridParam('selarrrow');
	var selected_id_list = new Array();
	var spl = (id_array.join('xxx'));
		
	if(spl =='')
	{
		alert("Please select Employee ID");
		return;
	}


var sal_year_month = report_year_sal+"-"+report_month_sal+"-"+"01";
		
	hostname = window.location.hostname;
	url =  "http://"+hostname+"/erp_target/index.php/production_salary_report_con/production_monthly_salary_sheet/"+sal_year_month+"/"+grid_status+"/"+spl;
	
	production_sal_sheet = window.open(url,'production_sal_sheet',"menubar=1,resizable=1,scrollbars=1,width=1600,height=800");
	production_sal_sheet.moveTo(0,0);


}
function grid_get_all_data_production()
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
 url =  "http://"+hostname+"/erp_target/index.php/payroll_con/manual_atten_co/";
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
		
		position_id_name = alldata[5].split("===");
		posi_id = position_id_name[0].split("***");
		posi_name = position_id_name[1].split("***");

		document.grid.grid_position.options.length=0;
		document.grid.grid_position.options[0]=new Option("Select","Select", true, false); 
		for (i=0; i<posi_id.length; i++){
			document.grid.grid_position.options[i+1]=new Option(posi_name[i],posi_id[i], false, false);

		}
		
	$('#list1').jqGrid('GridUnload');
	
	hostname = window.location.hostname;
	url =  "http://"+hostname+"/erp_target/index.php/grid_con/grid_get_all_data_production";
	//var url = "http://localhost/payroll/index.php/grid_con/grid_get_all_data";
	main_grid(url)
	
	
	}
	}
}
function grid_all_search_production()
{var dept 		= document.getElementById('grid_dept').value;	
	var section 	= document.getElementById('grid_section').value;
	var line 		= document.getElementById('grid_line').value;
	var designation = document.getElementById('grid_desig').value;
	var sex = document.getElementById('grid_sex').value;
	var status = document.getElementById('grid_status').value;
	var position = document.getElementById('grid_position').value;
	
	$('#list1').jqGrid('GridUnload');
	
	
	hostname = window.location.hostname;
	url =  "http://"+hostname+"/erp_target/index.php/grid_con/grid_all_search_production/"+dept+"/"+section+"/"+line+"/"+designation+"/"+sex+"/"+status+"/"+position;
	//var url = "http://localhost/payroll/index.php/grid_con/grid_all_search/"+dept+"/"+section+"/"+line+"/"+designation;
	main_grid(url)
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

function grid_daily_production_report()
{
	var firstdate = document.getElementById('firstdate').value;
	if(firstdate =='')
	{
		alert("Please select First date");
		return;
	}
	

	hostname = window.location.hostname;
	url =  "http://"+hostname+"/erp_target/index.php/pd_report_con/production_daily_report/"+firstdate;
	
	production_daily_report = window.open(url,'production_daily_report',"menubar=1,resizable=1,scrollbars=1,width=1600,height=800");
	production_daily_report.moveTo(0,0);
}
function production_job_card()
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
	url =  "http://"+hostname+"/erp_target/index.php/pd_report_con/production_job_card/"+firstdate+"/"+seconddate+"/"+spl;
	
	pd_job_card = window.open(url,'pd_job_card',"menubar=1,resizable=1,scrollbars=1,width=1600,height=800");
	pd_job_card.moveTo(0,0);	
}

function production_summary()
{
	hostname = window.location.hostname;
	url =  "http://"+hostname+"/erp_target/index.php/pd_report_con/production_summary/";
	
	pd_summary = window.open(url,'pd_summary',"menubar=1,resizable=1,scrollbars=1,width=1600,height=800");
	pd_summary.moveTo(0,0);
}
function production_monthly_salary_summary()
{
	var firstdate = document.getElementById('firstdate').value;
	if(firstdate =='')
	{
		alert("Please select First date for month and year selection");
		return;
	}
	hostname = window.location.hostname;
	url =  "http://"+hostname+"/erp_target/index.php/pd_report_con/production_monthly_salary_summary/"+firstdate;
	
	monthly_salary_summary = window.open(url,'monthly_salary_summary',"menubar=1,resizable=1,scrollbars=1,width=1600,height=800");
	monthly_salary_summary.moveTo(0,0);
}

function production_monthly_cost_sheet()
{
	var firstdate = document.getElementById('firstdate').value;
	if(firstdate =='')
	{
		alert("Please select First date for month and year selection");
		return;
	}
	hostname = window.location.hostname;
	url =  "http://"+hostname+"/erp_target/index.php/pd_report_con/production_monthly_cost_sheet/"+firstdate;
	
	monthly_cost_sheet = window.open(url,'monthly_cost_sheet',"menubar=1,resizable=1,scrollbars=1,width=1600,height=800");
	monthly_cost_sheet.moveTo(0,0);
}