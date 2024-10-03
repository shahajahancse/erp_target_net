/*!
 * Ext JS Library 3.3.1
 * Copyright(c) 2006-2010 Sencha Inc.
 * licensing@sencha.com
 * http://www.sencha.com/license
 */

// Sample desktop configuration


<!-- 
//Browser Support Code

var eempid=null;
var personalinfo = new Array();



function empty()
{
	personalinfo=null;	
	//document.getElementById('pi_empid').value="";
	document.getElementById('empid').value="";
	document.getElementById('name').value="";
 	document.getElementById('mname').value="";
 	document.getElementById('fname').value="";
 	document.getElementById('dob').value="";
	document.getElementById('padd').value="";
	document.getElementById('fadd').value="";
 }
 
function empty_pi(){
	
	document.getElementById('com_empid').value = "";
	document.getElementById('idcard').value = "";

	//document.cominfo.dept.options.length=0;
	document.cominfo.sec.options.length=0;
	document.cominfo.line.options.length=0;
	document.cominfo.desig.options.length=0;
	document.cominfo.salg.options.length=0;
	document.cominfo.empstat.options.length=0;
	document.cominfo.empshift.options.length=0;
	document.getElementById('gsal').value = "";
	document.getElementById('ejd').value = "";

}
 
 function empty_edu_skill(){
	
	document.getElementById('edu_empid').value="";
	document.getElementById('emp_last_dg').value="";
 	document.getElementById('pass_year').value="";
 	document.getElementById('edu_insti').value="";
 	document.getElementById('skill_dept').value="";
	document.getElementById('skill_year').value="";
	document.getElementById('skill_com_na').value="";
}

function ajaxInsert(){
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
 
 var empid 	= document.getElementById('empid').value;
 
  if(empid=='' || empid==null){
 	alert("Please insert employee ID");
	return;
 }
 
 var name 	= document.getElementById('name').value;
 var mname 	= document.getElementById('mname').value;
 var fname	= document.getElementById('fname').value;
 var dob 	= document.getElementById('dob').value;
 var reli 	= document.getElementById('reli').value;
 var sex 	= document.getElementById('sex').value;
 var bgroup = document.getElementById('bgroup').value;
 var padd	= document.getElementById('padd').value;
 var fadd 	= document.getElementById('fadd').value;

 var queryString="empid="+empid+"&name="+name+"&mname="+mname+"&fname="+fname+"&dob="+dob+"&reli="+reli+"&sex="+sex+"&bgroup="+bgroup+"&padd="+padd+"&fadd="+fadd;
 
 ajaxRequest.open("POST", "index.php/payroll_con/per_info/", true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send(queryString);
 
 
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		empty();
		alert(resp);
		
			
	}
}
}

function save_linename(){
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
 
 var linename 	= document.getElementById('linename').value;
 
  if(linename=='' || linename==null){
 	alert("Please insert Line name");
	return;
 }
 
 var queryString="linename="+linename;
 
 ajaxRequest.open("POST", "index.php/payroll_con/save_linename/", true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send(queryString);
 
 
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		alert(resp);
		
			
	}
}
}

function save_deptname(){
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
 
 var deptname 	= document.getElementById('deptname').value;
 
  if(deptname=='' || deptname==null){
 	alert("Please insert Department name");
	return;
 }
 
 var queryString="deptname="+deptname;
 
 ajaxRequest.open("POST", "index.php/payroll_con/save_deptname/", true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send(queryString);
 
 
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		alert(resp);
		
			
	}
}
}

function save_sectionname(){
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
 
 var sectionname 	= document.getElementById('sectionname').value;
 var dept 	= document.getElementById('dept').value;
 
 if(sectionname=='' || sectionname==null){
 	alert("Please insert Section name");
	return;
 }
 
 var queryString="sectionname="+sectionname+"&dept="+dept;
 
 ajaxRequest.open("POST", "index.php/payroll_con/save_sectionname/", true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send(queryString);
 
 
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		alert(resp);
		
			
	}
}
}


function save_designationname(){
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
 
 var designationname 	= document.getElementById('designationname').value;
 
  if(designationname=='' || designationname==null){
 	alert("Please insert Designation name");
	return;
 }
 
 var queryString="designationname="+designationname;
 
 ajaxRequest.open("POST", "index.php/payroll_con/save_designationname/", true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send(queryString);
 
 
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		alert(resp);
		
			
	}
}
}

function ajaxupdate(){
	
 var okyes;
 okyes=confirm('Are you sure you want to Update this?');
if(okyes==false) return;
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
 // Create a function that will receive data 
 // sent from the server and will update
 // div section in the same page.

 // Now get the value from user and pass it to
 // server script.
 var empid 	= document.getElementById('empid').value;
  if(empid=='' || empid==null){
 	alert("Please insert employee ID");
	return;
 }
 var name 	= document.getElementById('name').value;
 var mname 	= document.getElementById('mname').value;
 var fname	= document.getElementById('fname').value;
 var dob 	= document.getElementById('dob').value;
 var reli 	= document.getElementById('reli').value;
 var sex 	= document.getElementById('sex').value;
 var bgroup = document.getElementById('bgroup').value;
 var padd 	= document.getElementById('padd').value;
 var fadd 	= document.getElementById('fadd').value;

 var queryString="empid="+empid+"&name="+name+"&mname="+mname+"&fname="+fname+"&dob="+dob+"&reli="+reli+"&sex="+sex+"&bgroup="+bgroup+"&padd="+padd+"&fadd="+fadd;
 
 ajaxRequest.open("POST", "index.php/payroll_con/per_update/", true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send(queryString);
 
 
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		if(resp == "Employee ID does not exist"){
			alert(resp);
			empty();
			return;
			}
		alert(resp);
		
			
	}
}

 
}

function update_deptname(){
	
 var okyes;
 okyes=confirm('Are you sure you want to Update this?');
if(okyes==false) return;
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
 // Create a function that will receive data 
 // sent from the server and will update
 // div section in the same page.

 // Now get the value from user and pass it to
 // server script.
 var deptid 	= document.getElementById('deptid').value;
 var deptname 	= document.getElementById('deptname').value;
  if(deptname=='' || deptname==null){
 	alert("Please insert Department name");
	return;
 }

 var queryString="deptid="+deptid+"&deptname="+deptname;
 
 ajaxRequest.open("POST", "index.php/payroll_con/update_deptname/", true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send(queryString);
 
 
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		if(resp == "Department name does not exist"){
			alert(resp);
			return;
			}
		alert(resp);
		
			
	}
}

 
}

function update_sectionname(){
	
 var okyes;
 okyes=confirm('Are you sure you want to Update this?');
if(okyes==false) return;
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
 // Create a function that will receive data 
 // sent from the server and will update
 // div section in the same page.

 // Now get the value from user and pass it to
 // server script.
 var sectionid 	= document.getElementById('sectionid').value;
 var sectionname 	= document.getElementById('sectionname').value;
 var dept 	= document.getElementById('dept').value;
 
  if(sectionname=='' || sectionname==null){
 	alert("Please insert Section name");
	return;
 }
 
 var queryString="sectionid="+sectionid+"&sectionname="+sectionname+"&dept="+dept;
 
 ajaxRequest.open("POST", "index.php/payroll_con/update_sectionname/", true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send(queryString);
 
 
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		if(resp == "Department name does not exist"){
			alert(resp);
			return;
			}
		alert(resp);
		
			
	}
}

 
}


function update_designationname(){
	
 var okyes;
 okyes=confirm('Are you sure you want to Update this?');
if(okyes==false) return;
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
 // Create a function that will receive data 
 // sent from the server and will update
 // div section in the same page.

 // Now get the value from user and pass it to
 // server script.
 var designationid 	= document.getElementById('designationid').value;
 var designationname 	= document.getElementById('designationname').value;
  if(designationname=='' || designationname==null){
 	alert("Please insert Designation name");
	return;
 }

 var queryString="designationid="+designationid+"&designationname="+designationname;
 
 ajaxRequest.open("POST", "index.php/payroll_con/update_designationname/", true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send(queryString);
 
 
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		if(resp == "Designation name does not exist"){
			alert(resp);
			return;
			}
		alert(resp);
		
			
	}
}

 
}


function update_linename(){
	
 var okyes;
 okyes=confirm('Are you sure you want to Update this?');
if(okyes==false) return;
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
 // Create a function that will receive data 
 // sent from the server and will update
 // div section in the same page.

 // Now get the value from user and pass it to
 // server script.
 var lineid 	= document.getElementById('lineid').value;
 var linename 	= document.getElementById('linename').value;
  if(linename=='' || linename==null){
 	alert("Please insert Line name");
	return;
 }

 var queryString="lineid="+lineid+"&linename="+linename;
 
 ajaxRequest.open("POST", "index.php/payroll_con/update_linename/", true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send(queryString);
 
 
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		if(resp == "Line name does not exist"){
			alert(resp);
			return;
			}
		alert(resp);
		
			
	}
}

 
}

function ajaxDelete(){
 var okyes;
 okyes=confirm('Are you sure you want to Delete this?');
 if(okyes==false) return;
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
 // Create a function that will receive data 
 // sent from the server and will update
 // div section in the same page.

 // Now get the value from user and pass it to
 // server script.


 var empid 	= document.getElementById('empid').value;
 
 if(empid=='' || empid==null){
 	alert("Please insert employee ID");
	return;
 }

 var queryString="empid="+empid;
 
 ajaxRequest.open("POST", "index.php/payroll_con/per_delete/", true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send(queryString);
 
 
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		empty();
		alert(resp);
			
	}
}
}

function delete_deptname(){
 var okyes;
 okyes=confirm('Are you sure you want to Delete this?');
 if(okyes==false) return;
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
 // Create a function that will receive data 
 // sent from the server and will update
 // div section in the same page.

 // Now get the value from user and pass it to
 // server script.


 var deptname 	= document.getElementById('deptname').value;
  if(deptname=='' || deptname==null){
 	alert("Please insert Department name");
	return;
 }

 var queryString="deptname="+deptname;

 ajaxRequest.open("POST", "index.php/payroll_con/delete_deptname/", true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send(queryString);
 
 
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		document.getElementById('deptname').value="";
		alert(resp);
			
	}
}
}

function delete_sectionname(){
 var okyes;
 okyes=confirm('Are you sure you want to Delete this?');
 if(okyes==false) return;
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
 // Create a function that will receive data 
 // sent from the server and will update
 // div section in the same page.

 // Now get the value from user and pass it to
 // server script.


 var sectionname 	= document.getElementById('sectionname').value;
  if(sectionname=='' || sectionname==null){
 	alert("Please insert Section name");
	return;
 }

 var queryString="sectionname="+sectionname;

 ajaxRequest.open("POST", "index.php/payroll_con/delete_sectionname/", true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send(queryString);
 
 
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		document.getElementById('deptname').value="";
		alert(resp);
			
	}
}
}



function delete_designationname(){
 var okyes;
 okyes=confirm('Are you sure you want to Delete this?');
 if(okyes==false) return;
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
 // Create a function that will receive data 
 // sent from the server and will update
 // div section in the same page.

 // Now get the value from user and pass it to
 // server script.


 var designationname = document.getElementById('designationname').value;
  if(designationname=='' || designationname==null){
 	alert("Please insert Designation name");
	return;
 }

 var queryString="designationname="+designationname;

 ajaxRequest.open("POST", "index.php/payroll_con/delete_designationname/", true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send(queryString);
 
 
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		document.getElementById('designationname').value="";
		alert(resp);
			
	}
}
}





function delete_linename(){
 var okyes;
 okyes=confirm('Are you sure you want to Delete this?');
 if(okyes==false) return;
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

 var linename 	= document.getElementById('linename').value;
  if(linename=='' || linename==null){
 	alert("Please insert Line name");
	return;
 }

 var queryString="linename="+linename;

 ajaxRequest.open("POST", "index.php/payroll_con/delete_linename/", true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send(queryString);
 
 
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		document.getElementById('linename').value="";
		alert(resp);
			
	}
}
}



function ajaxSearch(){
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
 
 disable_pi_save();
 
 var empid 	= document.getElementById('pi_empid').value;
 

 var queryString="empid="+empid;
 
 ajaxRequest.open("POST", "index.php/payroll_con/search/", true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send(queryString);
 
 
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		
		if(resp == "Employee ID does not exist"){
			alert(resp);
			empty();
			return;
			}
		personalinfo = resp.split("-*-");
		//alert(personalinfo[1]);
		document.getElementById('empid').value = personalinfo[0];
		document.getElementById('name').value = personalinfo[1];
		document.getElementById('mname').value = personalinfo[2];
		document.getElementById('fname').value = personalinfo[3];
		document.getElementById('dob').value = personalinfo[4];
		document.getElementById('reli').value = personalinfo[5];
		document.getElementById('sex').value = personalinfo[6];
		document.getElementById('bgroup').value = personalinfo[7];
		document.getElementById('padd').value = personalinfo[8];
		document.getElementById('fadd').value = personalinfo[9];
		
	
		
		//ajaxpeakdata();
		
	}
}

eempid = empid;

//ajaxcominfo();
}



function find_dept_name(){
	
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

document.department.pi_save.disabled = true;

 var deptname 	= document.getElementById('check_dept_name').value;
 
 var queryString="deptname="+deptname;
 
 ajaxRequest.open("POST", "index.php/payroll_con/search_dept_name/", true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send(queryString);
 
 
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		
		if(resp == "Department name does not exist"){
			alert(resp);
			return;
			}
		personalinfo = resp.split("-*-");
		//alert(personalinfo[1]);
		document.getElementById('deptid').value = personalinfo[0];
		document.getElementById('deptname').value = personalinfo[1];
	}
}
}


function find_section_name(){
	
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

document.section.pi_save.disabled = true;

 var sectionname 	= document.getElementById('check_section_name').value;
 
 var queryString="sectionname="+sectionname;
 
 ajaxRequest.open("POST", "index.php/payroll_con/search_section_name/", true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send(queryString);
 
 
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		//alert(resp);
		if(resp == "Section name does not exist"){
			alert(resp);
			return;
			}
		alldata = resp.split("*-*");
			
		sec_info = alldata[0].split("=*=");
		
		dept_id_name = alldata[1].split("===");
		dept_id = dept_id_name[0].split("=*=");
		dept_name = dept_id_name[1].split("=*=");
		//alert(dept_id.length);
		
		document.getElementById('sectionid').value = sec_info[0];
		document.getElementById('sectionname').value = sec_info[1];
		
		document.section.dept.options.length=0;
		for (i=0; i<dept_id.length; i++){
			if( sec_info[2] == dept_id[i])
			{
				//alert(dept_name[i]);
				document.section.dept.options[i]=new Option(dept_name[i],dept_id[i], false, true);
			}
			else
			{
				document.section.dept.options[i]=new Option(dept_name[i],dept_id[i], false, false);
			}
			
		}
		
	}
}
}


function find_designation_name(){
	
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

document.designation.designation_save.disabled = true;

 var designationname 	= document.getElementById('check_designation_name').value;
 
 
 
 var queryString="designationname="+designationname;
 
 ajaxRequest.open("POST", "index.php/payroll_con/search_designation_name/", true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send(queryString);
 
 
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		
		if(resp == "Designation name does not exist"){
			alert(resp);
			return;
			}
		personalinfo = resp.split("-*-");
		//alert(personalinfo[1]);
		document.getElementById('designationid').value = personalinfo[0];
		document.getElementById('designationname').value = personalinfo[1];
		
		
	
		
		//ajaxpeakdata();
		
	}
}



//ajaxcominfo();
}


function find_line_name(){

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

document.line_form.line_save.disabled = true;

 var linename 	= document.getElementById('check_line_name').value;
//alert(linename);
 var queryString="linename="+linename;
 
 ajaxRequest.open("POST", "index.php/payroll_con/search_line_name/", true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send(queryString);
 
 
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		
		if(resp == "Line name does not exist"){
			alert(resp);
			empty();
			return;
			}
			//alert(resp);
		personalinfo = resp.split("-*-");
		//alert(personalinfo[1]);
		document.getElementById('lineid').value = personalinfo[0];
		document.getElementById('linename').value = personalinfo[1];
		
		
	
		
		//ajaxpeakdata();
		
	}
}



//ajaxcominfo();
}



function ajaxpeakdata(){
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
		//alert(personalinfo[3]);
		document.getElementById("dept").value = personalinfo[3];
		document.getElementById("sec").value  = personalinfo[4];
		
		
	 
}

/// functions for company information===============================================================================

function com_info_insert(){
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
 // Create a function that will receive data 
 // sent from the server and will update
 // div section in the same page.

 // Now get the value from user and pass it to
 // server script.
 var com_empid = document.getElementById("com_empid").value;
 var idcard = document.getElementById('idcard').value;
 if(com_empid=='' || com_empid==null){
 	alert("Please insert employee ID");
 }
 //else if(idcard=='' || idcard==null){
 	//alert("Please insert punch card number");
 //}
 else
 {
	
	var idcard = document.getElementById('idcard').value;
	var dept = document.getElementById('dept').value;
	var sec = document.getElementById('sec').value;
	var line = document.getElementById('line').value;
	var desig = document.getElementById('desig').value;
	var salg = document.getElementById('salg').value;
	var empstat = document.getElementById('empstat').value;
	var empshift = document.getElementById('empshift').value;
	var gsal = document.getElementById('gsal').value;
	var ejd = document.getElementById('ejd').value;
	 
	var queryString="com_empid="+com_empid+"&idcard="+idcard+"&dept="+dept+"&sec="+sec+"&line="+line+"&desig="+desig+"&salg="+salg+"&empstat="+empstat+"&empshift="+empshift+"&gsal="+gsal+"&ejd="+ejd;
	//alert(desig);
	ajaxRequest.open("POST", "index.php/payroll_con/com_info_insert/", true);
 	ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 	ajaxRequest.send(queryString);
 
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		//document.cominfo.dept.options.length=0;
		//empty_pi();
		alert(resp);
	}
}


}
}

function com_info_edit(){
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
 // Create a function that will receive data 
 // sent from the server and will update
 // div section in the same page.

 // Now get the value from user and pass it to
 // server script.
 var com_empid = document.getElementById("com_empid").value;
 var idcard = document.getElementById('idcard').value;
 if(com_empid=='' || com_empid==null){
 	alert("Please insert employee ID");
 }
 //else if(idcard=='' || idcard==null){
 	//alert("Please insert ID card number");
 //}
 else
 {
	
	var idcard = document.getElementById('idcard').value;
	var dept = document.getElementById('dept').value;
	var sec = document.getElementById('sec').value;
	var line = document.getElementById('line').value;
	var desig = document.getElementById('desig').value;
	var salg = document.getElementById('salg').value;
	var empstat = document.getElementById('empstat').value;
	var empshift = document.getElementById('empshift').value;
	var gsal = document.getElementById('gsal').value;
	var ejd = document.getElementById('ejd').value;
 
	var queryString="com_empid="+com_empid+"&idcard="+idcard+"&dept="+dept+"&sec="+sec+"&line="+line+"&desig="+desig+"&salg="+salg+"&empstat="+empstat+"&empshift="+empshift+"&gsal="+gsal+"&ejd="+ejd;
	
	ajaxRequest.open("POST", "index.php/payroll_con/com_info_edit/", true);
 	ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 	ajaxRequest.send(queryString);
 
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		alert(resp);
	}
}


}
}

/*function com_info_delete(){
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
 // Create a function that will receive data 
 // sent from the server and will update
 // div section in the same page.

 // Now get the value from user and pass it to
 // server script.
 var com_empid = document.getElementById("com_empid").value;
 if(com_empid=='' || com_empid==null){
 	alert("Please insert employee ID");
 }
 else
 {
	
	var queryString="com_empid="+com_empid;

	ajaxRequest.open("POST", "index.php/payroll_con/com_info_delete/", true);
 	ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 	ajaxRequest.send(queryString);
 
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		alert(resp);
	}
}


}
}*/


function com_info_Search(){
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
 disable_save();
 var empid 	= document.getElementById('search_empid').value;
 

 var queryString="empid="+empid;
 
 ajaxRequest.open("POST", "index.php/payroll_con/com_info_search/", true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send(queryString);
 
 
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		//alert(resp);
		if(resp == "Employee ID does not exist"){
			alert(resp);
			document.cominfo.dept.options.length=0;
			empty_pi();
			return;
			}
		alldata = resp.split("-*-");
		
		companyinfo = alldata[0].split("=*=");
		
		dept_id_name = alldata[1].split("===");
		dept_id = dept_id_name[0].split("=*=");
		dept_name = dept_id_name[1].split("=*=");
		
		sec_id_name = alldata[2].split("===");
		sec_id = sec_id_name[0].split("***");
		sec_name = sec_id_name[1].split("***");
		
		line_id_name = alldata[3].split("===");
		line_id = line_id_name[0].split("***");
		line_name = line_id_name[1].split("***");
		
		desig_id_name = alldata[4].split("===");
		desig_id = desig_id_name[0].split("***");
		desig_name = desig_id_name[1].split("***");
		
		salg_id_name = alldata[5].split("===");
		salg_id = salg_id_name[0].split("***");
		salg_name = salg_id_name[1].split("***");
		
		empstat_id_name = alldata[6].split("===");
		empstat_id = empstat_id_name[0].split("***");
		empstat_name = empstat_id_name[1].split("***");
		
		empshift_id_name = alldata[7].split("===");
		empshift_id = empshift_id_name[0].split("***");
		empshift_name = empshift_id_name[1].split("***");
		//alert(empshift_name);
			
		document.getElementById('com_empid').value = empid;
		
		document.cominfo.idcard.value = companyinfo[1];
		
		document.cominfo.dept.options.length=0;
		for (i=0; i<dept_id.length; i++){
			if( companyinfo[2] == dept_name[i])
			{
				//alert(dept_name[i]);
				document.cominfo.dept.options[0]=new Option(dept_name[i],dept_id[i], true, false);
			}
		}
		
		document.cominfo.sec.options.length=0;
		for (i=0; i<sec_id.length; i++){
			if( companyinfo[3] == sec_name[i])
			{
				//alert(dept_name[i]);
				document.cominfo.sec.options[i]=new Option(sec_name[i],sec_id[i], false,true);
			}
			else
			document.cominfo.sec.options[i]=new Option(sec_name[i],sec_id[i], false, false);
			
		}
		
		document.cominfo.line.options.length=0;
		for (i=0; i<line_id.length; i++){
			if( companyinfo[4] == line_name[i])
			{
				//alert(dept_name[i]);
				document.cominfo.line.options[i]=new Option(line_name[i],line_id[i], false,true);
			}
			else
			document.cominfo.line.options[i]=new Option(line_name[i],line_id[i], false, false);
			
		}
		
		document.cominfo.desig.options.length=0;
		for (i=0; i<desig_id.length; i++){
			if( companyinfo[5] == desig_name[i])
			{
				//alert(dept_name[i]);
				document.cominfo.desig.options[i]=new Option(desig_name[i],desig_id[i], false,true);
			}
			else
			document.cominfo.desig.options[i]=new Option(desig_name[i],desig_id[i], false, false);
			
		}
		
		document.cominfo.salg.options.length=0;
		for (i=0; i<salg_id.length; i++){
			if( companyinfo[6] == salg_name[i])
			{
				//alert(dept_name[i]);
				document.cominfo.salg.options[i]=new Option(salg_name[i],salg_id[i], false,true);
			}
			else
			document.cominfo.salg.options[i]=new Option(salg_name[i],salg_id[i], false, false);
			
		}
		
		document.cominfo.empstat.options.length=0;
		for (i=0; i<empstat_id.length; i++){
			if( companyinfo[7] == empstat_name[i])
			{
				//alert(dept_name[i]);
				document.cominfo.empstat.options[i]=new Option(empstat_name[i],empstat_id[i], false,true);
			}
			else
			document.cominfo.empstat.options[i]=new Option(empstat_name[i],empstat_id[i], false, false);
			
		}
		
		//alert(companyinfo[8]);
		document.cominfo.empshift.options.length=0;
		for (i=0; i<empshift_id.length; i++){
			if( companyinfo[8] == empshift_name[i])
			{
				//alert(dept_name[i]);
				document.cominfo.empshift.options[i]=new Option(empshift_name[i],empshift_id[i], false,true);
			}
			else
			document.cominfo.empshift.options[i]=new Option(empshift_name[i],empshift_id[i], false, false);
			
		}
		
		document.getElementById('gsal').value = companyinfo[9];
		document.getElementById('ejd').value = companyinfo[10];
	}
}

eempid = empid;
}



function com_info_dept(){
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
 
 var dept = document.getElementById('dept').value;
  
 if(dept=='Select'){
	 alert("Please select Department");
	 return;
	}


 if(document.cominfo.save.disabled == true){
	 return;
	 }
	 else{

 var queryString="dept="+dept;
 ajaxRequest.open("POST", "index.php/payroll_con/dept_search/", true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send(queryString);
 

 
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		sec_idname = resp.split("===");
		sec_id = sec_idname[0].split("***");
		sec_name = sec_idname[1].split("***");
		
		document.cominfo.section.options.length=0;
		document.cominfo.section.options[0]=new Option("Select","Select", true, false);
		for (i=0; i<sec_id.length; i++){
			document.cominfo.section.options[i+1]=new Option(sec_name[i],sec_id[i], false, false);

		}
	}
}
	 }
}

function com_info_section(){
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
 

 
 var sec = document.getElementById('sec').value;
 var dept = document.getElementById('dept').value;
 
/* if(dept==1){
	 com_info_desig(dept);
	 }*/

 if(sec=='Select'){
	 alert("Please select Section");
	 return;
	}
	
  if(document.cominfo.save.disabled == true){
	 return;
	 }
	 else{
	
 var queryString="sec="+sec+"&dept="+dept;
 ajaxRequest.open("POST", "index.php/payroll_con/section_search/", true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send(queryString);
 
 
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		//alert(resp);
		sec_idname = resp.split("===");
		sec_id = sec_idname[0].split("***");
		sec_name = sec_idname[1].split("***");
		
		document.cominfo.line.options.length=0;
		/*if(dept!=1){
			document.cominfo.line.options[0]=new Option("Select","Select", true, false); 
		 }*/
		document.cominfo.line.options[0]=new Option("Select","Select", true, false); 
		
		for (i=0; i<sec_id.length; i++){
			document.cominfo.line.options[i+1]=new Option(sec_name[i],sec_id[i], false, false);

		}
	}
}
	 }
}

function com_info_desig(dept_id){

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
 

 
 if(dept_id){
	 dept = dept_id;
	 
	 }
	 else{
		 var dept = document.getElementById('dept').value;
		 var line = document.getElementById('line').value;

	if(line=='Select'){
	 alert("Please select Line number");
	 return;
	}
	 }

  if(document.cominfo.save.disabled == true){
	 return;
	 }
	 else{

	
	
 var queryString="dept="+dept;
 ajaxRequest.open("POST", "index.php/payroll_con/desig_search/", true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send(queryString);
 
 ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		//alert(resp);
		sec_idname = resp.split("===");
		sec_id = sec_idname[0].split("***");
		sec_name = sec_idname[1].split("***");
		
		document.cominfo.desig.options.length=0;
		document.cominfo.desig.options[0]=new Option("Select","Select", true, false);
		for (i=0; i<sec_id.length; i++){
			document.cominfo.desig.options[i+1]=new Option(sec_name[i],sec_id[i], false, false);

		}
	}
}
	 }
	}
	

function com_info_grade(){
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
 
 
 
 var desig = document.getElementById('desig').value;

if(desig=='Select'){
	 alert("Please select Designation");
	 return;
	}

 if(document.cominfo.save.disabled == true){
	 return;
	 }
	 else{
	
 var queryString="desig="+desig+"&dept="+dept;
 ajaxRequest.open("POST", "index.php/payroll_con/grade_search/", true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send(queryString);
 
  
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		//alert(resp);
		sec_idname = resp.split("===");
		sec_id = sec_idname[0].split("***");
		sec_name = sec_idname[1].split("***");
		
		document.cominfo.salg.options.length=0;
		document.cominfo.salg.options[0]=new Option("Select","Select", true, false);
		for (i=0; i<sec_id.length; i++){
			document.cominfo.salg.options[i+1]=new Option(sec_name[i],sec_id[i], false, false);

		}
	}
}
	 }
}

function com_info_empstat(){
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
 
 
		 
 var salg = document.getElementById('salg').value;

if(salg=='Select'){
	 alert("Please select Salary grade");
	 return;
	}
	
 if(document.cominfo.save.disabled == true){
	 return;
	 }
	 else{
	
 var queryString="desig="+desig+"&dept="+dept;
 ajaxRequest.open("POST", "index.php/payroll_con/empstat_search/", true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send(queryString);
 
  
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		//alert(resp);
		sec_idname = resp.split("===");
		sec_id = sec_idname[0].split("***");
		sec_name = sec_idname[1].split("***");
		
		document.cominfo.empstat.options.length=0;
		document.cominfo.empstat.options[0]=new Option("Select","Select", true, false);
		for (i=0; i<sec_id.length; i++){
			document.cominfo.empstat.options[i+1]=new Option(sec_name[i],sec_id[i], false, false);

		}
	}
}
	 }
}

function com_info_shift(){
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
 
 
		 
 var empstat = document.getElementById('empstat').value;

if(empstat=='Select'){
	 alert("Please select Employee status");
	 return;
	}
	
 if(document.cominfo.save.disabled == true){
	 return;
	 }
	 else{
	
 var queryString="desig="+desig+"&dept="+dept;
 ajaxRequest.open("POST", "index.php/payroll_con/empshift_search/", true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send(queryString);
 
  
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		//alert(resp);
		shift_idname = resp.split("===");
		shift_id = shift_idname[0].split("***");
		shift_name = shift_idname[1].split("***");
		
		document.cominfo.empshift.options.length=0;
		document.cominfo.empshift.options[0]=new Option("Select","Select", true, false);
		for (i=0; i<shift_id.length; i++){
			document.cominfo.empshift.options[i+1]=new Option(shift_name[i],shift_id[i], false, false);

		}
	}
}
	 }
}


function com_info_alert()
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
 
 var empstat = document.getElementById('empstat').value;

if(empstat=='Select'){
	 alert("Please select Employee status");
	 return;
	}
}

//=================================================================================================================================================================================
//Extra functions

function enable_pi_save(){
	
	document.com_per_info.pi_save.disabled = false;
	document.com_per_info.nempid.focus();
	document.getElementById('pi_empid').value="";
	empty();
	
	}
function enable_deptname(){
	
	document.department.pi_save.disabled = false;
	document.department.deptname.focus();
	document.getElementById('deptname').value="";
	document.getElementById('check_dept_name').value="";
	
	
	}
	
function enable_designationname(){
	
	document.designation.designation_save.disabled = false;
	document.designation.designationname.focus();
	document.getElementById('designationname').value="";
	document.getElementById('check_designation_name').value="";
	}


function enable_linename(){
	
	document.line_form.line_save.disabled = false;
	document.department.linename.focus();
	document.getElementById('linename').value="";
	document.getElementById('check_line_name').value="";
	}
function disable_pi_save(){
	document.com_per_info.pi_save.disabled = true;
}


function disable_line_save(){
	document.com_per_info.pi_save.disabled = true;
}

function edu_enable_save(){
	document.eduskill.edu_save.disabled = false;
	document.eduskill.edu_empid.focus();
	document.getElementById('edu_skill_empid').value="";
	empty_edu_skill();
}

function edu_disable_save(){
	document.eduskill.edu_save.disabled = true;
}

function enable_save(){
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
 var queryString="desig="+desig+"&dept="+dept;
 ajaxRequest.open("POST", "index.php/payroll_con/dept/", true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send(queryString);
 
  
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		//alert(resp);
		dept_idname = resp.split("===");
		dept_id = dept_idname[0].split("=*=");
		dept_name = dept_idname[1].split("=*=");
		
		document.cominfo.dept.options.length=0;
		document.cominfo.dept.options[0]=new Option("Select","Select", true, false);
		for (i=0; i<dept_id.length; i++){
			document.cominfo.dept.options[i+1]=new Option(dept_name[i],dept_id[i], false, false);

		}
	document.getElementById('search_empid').value="";
	empty_pi();
	
	document.cominfo.save.disabled = false;
	
	document.cominfo.com_empid.focus();
	}
}
}

function enable_sectionname(){
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
 
 var queryString="";
 ajaxRequest.open("POST", "index.php/payroll_con/dept/", true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send(queryString);
 
  
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		//alert(resp);
		dept_idname = resp.split("===");
		dept_id = dept_idname[0].split("=*=");
		dept_name = dept_idname[1].split("=*=");
		
		document.section.dept.options.length=0;
		//document.section.dept.options[0]=new Option("Select","Select", true, false);
		for (i=0; i<dept_id.length; i++){
			document.section.dept.options[i]=new Option(dept_name[i],dept_id[i], false, false);

		}
	document.getElementById('sectionname').value="";
		
	document.section.pi_save.disabled = false;
	
	document.section.sectionname.focus();
	}
}
}

function disable_save(){
	document.cominfo.save.disabled = true;
}


//=====================================================================================================================================================================


//-->

MyDesktop = new Ext.app.App({
	init :function(){
		Ext.QuickTips.init();
	},

	getModules : function(){
		return [
		//	new MyDesktop.GridWindow(),
            new MyDesktop.TabWindow(),
			new MyDesktop.TabWindowConfig(),
            //new MyDesktop.AccordionWindow(),
          //  new MyDesktop.BogusMenuModule(),
           // new MyDesktop.BogusModule(),
			//new MyDesktop.SalaryGrade(),
			//new MyDesktop.Section(),
			new MyDesktop.AttReport(),
			new MyDesktop.SalaryReport()
		];
	},

    // config for the start menu
    getStartConfig : function(){
        return {
            title: 'Payroll System',
            iconCls: 'user',
            toolItems: [{
                text:'',
                iconCls:'',
                scope:this
            },'-',{
                text:'',
                iconCls:'',
                scope:this
            }]
        };
    }
});


/* validation    */
function validateForm()
{
var x=document.forms["eduskill"]["edu_empid"].value
if (x==null || x=="")
  {
  alert("First Employee ID must be filled out");
  return false;
  }
}




//==============================================================================Start Education & Skill=========================================================================

//====================insert=====================================
function ajax_edu_skill_Insert(){
	var validid=validateForm();
	if(validid==false)
	{
		return;
	}
	var okyes;
 okyes=confirm('Are you sure you want to Insert this?');
 if(okyes==false) return;
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
 
 var edu_empid 	= document.getElementById('edu_empid').value;
 var edu_last_dg 	= document.getElementById('emp_last_dg').value;
 var edu_pass_year 	= document.getElementById('pass_year').value;
 var edu_istitute	= document.getElementById('edu_insti').value;
 var edu_skil_dept 	= document.getElementById('skill_dept').value;
 var edu_skill_year 	= document.getElementById('skill_year').value;
 var edu_skill_company 	= document.getElementById('skill_com_na').value;


 var queryString="edu_empid="+edu_empid+"&edu_last_dg="+edu_last_dg+"&edu_pass_year="+edu_pass_year+"&edu_istitute="+edu_istitute+"&edu_skil_dept="+edu_skil_dept+"&edu_skill_year="+edu_skill_year+"&edu_skill_company="+edu_skill_company;
 
 ajaxRequest.open("POST", "index.php/payroll_con/edu_skill_insert/", true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send(queryString);
 
 
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		empty_edu_skl();
		alert(resp);
		
			
	}
}
}


//-------------------------------end----------------------------------
//=======================emty edu skill field==========================
 function empty_edu_skl()
{
	personalinfo=null;	
	document.getElementById('edu_empid').value="";
	document.getElementById('emp_last_dg').value="";
 	document.getElementById('pass_year').value="";
 	document.getElementById('edu_insti').value="";
 	document.getElementById('skill_dept').value="";
	document.getElementById('skill_year').value="";
	document.getElementById('skill_com_na').value="";
	
 }
//-------------------------edu delete-------------------------------
/*function ajax_edu_Delete()
{
	
 //var okyes;
// okyes=confirm('Are you sure you want to Delete this?');
// if(okyes==false) return;
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

 var edu_empid 	= document.getElementById('edu_empid').value;

 var queryString="edu_empid="+edu_empid;
 
 ajaxRequest.open("POST", "index.php/payroll_con/ajax_edu_delete/", true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send(queryString);
 
 
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		empty_edu_skl();
		alert(resp);
			
	}
}

 

	
	}*/
//--------------------------end---------------------------------------
//====================search===============================

function ajaxSearch_edu_skill(){
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
 
 var empid 	= document.getElementById('edu_skill_empid').value;
 document.eduskill.edu_save.disabled = true;


 var queryString="edu_empid="+empid;
 
 ajaxRequest.open("POST", "index.php/payroll_con/ajaxSearch_edu_skill/", true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send(queryString);
 
 
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		if(resp == "Employee does not exist"){
			alert(resp);
			empty_edu_skill();
			return;
			}
		
		personalinfo = resp.split("-*-");
		//alert(personalinfo[1]);
		
		document.getElementById('edu_empid').value = personalinfo[0];
		document.getElementById('emp_last_dg').value = personalinfo[1];
		document.getElementById('pass_year').value = personalinfo[2];
		document.getElementById('edu_insti').value = personalinfo[3];
		document.getElementById('skill_dept').value = personalinfo[4];
		document.getElementById('skill_year').value = personalinfo[5];
		document.getElementById('skill_com_na').value = personalinfo[6];
		//ajaxpeakdata();
		
	}
}


//ajaxcominfo();
}
//============================end search=================================

//===============================start edit education table========================
function ajaxu_edu_update(){
	
 //var okyes;
// okyes=confirm('Are you sure you want to Update this?');
//if(okyes==false) return;
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
 var edu_empid 	= document.getElementById('edu_empid').value;
if(edu_empid=='' || edu_empid==null){
 	alert("Please insert employee ID");
	return;
 } 
 var edu_last_dg 	= document.getElementById('emp_last_dg').value;
 var edu_pass_year 	= document.getElementById('pass_year').value;
 var edu_istitute	= document.getElementById('edu_insti').value;
 var edu_skil_dept 	= document.getElementById('skill_dept').value;
 var edu_skill_year 	= document.getElementById('skill_year').value;
 var edu_skill_company 	= document.getElementById('skill_com_na').value;


 var queryString="edu_empid="+edu_empid+"&edu_last_dg="+edu_last_dg+"&edu_pass_year="+edu_pass_year+"&edu_istitute="+edu_istitute+"&edu_skil_dept="+edu_skil_dept+"&edu_skill_year="+edu_skill_year+"&edu_skill_company="+edu_skill_company;
 
 ajaxRequest.open("POST", "index.php/payroll_con/edu_update/", true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send(queryString);
 
 
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		//empty_edu_skl();
		alert(resp);
		
			
	}
}

 
}
//===============================end edit======================

//==========================end emty skill field=================

//==============================================================================End Education & Skill=========================================================================
//==========================================sayed===============================
//=================================Insert================================

function ajax_grade_Insert(){

var validid=validateForm_grade();
if(validid==false)
	{
		return;
	}
var okyes;
 okyes=confirm('Are you sure you want to Insert this?');
 if(okyes==false) return;
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
 
 var gr_name 	= document.getElementById('gr_name').value;
 var gr_str_basic 	= document.getElementById('gr_str_basic').value;
 var gr_end_basic 	= document.getElementById('gr_end_basic').value;
 var gr_incr1	= document.getElementById('gr_incr1').value;
 var gr_1st_phase 	= document.getElementById('gr_1st_phase').value;
 var gr_incr2 	= document.getElementById('gr_incr2').value;
 var gr_2nd_phase 	= document.getElementById('gr_2nd_phase').value;


 var queryString="gr_name="+gr_name+"&gr_str_basic="+gr_str_basic+"&gr_end_basic="+gr_end_basic+"&gr_incr1="+gr_incr1+"&gr_1st_phase="+gr_1st_phase+"&gr_incr2="+gr_incr2+"&gr_2nd_phase="+gr_2nd_phase;
 
 ajaxRequest.open("POST", "index.php/payroll_con/grade_insert/", true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send(queryString);
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		empty_grade()
		alert(resp);
	}
}
}
//--------------validation for  grade-------------------
function validateForm_grade()
{
var x=document.forms["myForm_grade"]["gr_name"].value
if (x==null || x=="")
  {
  alert("Employee Grade must be filled out");
  return false;
  }
}
//--------------------------for empty------------------------------------
function empty_grade()
{
	personalinfo=null;	
	//document.getElementById('gr_name').value="";
	document.getElementById('gr_str_basic').value="";
	document.getElementById('gr_end_basic').value="";
	document.getElementById('gr_incr1').value="";
	document.getElementById('gr_1st_phase').value="";
	document.getElementById('gr_incr2').value="";
 	document.getElementById('gr_2nd_phase').value="";
	
 }
//==================================insert end===========================

//===================update start=========================================
function ajax_grade_update(){

 //var okyes;
// okyes=confirm('Are you sure you want to Update this?');
//if(okyes==false) return;
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
 // Create a function that will receive data 
 // sent from the server and will update
 // div section in the same page.

 // Now get the value from user and pass it to
 // server script.

 var gr_name 	= document.getElementById('gr_name').value;
 var gr_str_basic 	= document.getElementById('gr_str_basic').value;
 var gr_end_basic 	= document.getElementById('gr_end_basic').value;
 var gr_incr1	= document.getElementById('gr_incr1').value;
 var gr_1st_phase 	= document.getElementById('gr_1st_phase').value;
 var gr_incr2 	= document.getElementById('gr_incr2').value;
 var gr_2nd_phase 	= document.getElementById('gr_2nd_phase').value;


 var queryString="gr_name="+gr_name+"&gr_str_basic="+gr_str_basic+"&gr_end_basic="+gr_end_basic+"&gr_incr1="+gr_incr1+"&gr_1st_phase="+gr_1st_phase+"&gr_incr2="+gr_incr2+"&gr_2nd_phase="+gr_2nd_phase;
 
 
 ajaxRequest.open("POST", "index.php/payroll_con/grade_update/", true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send(queryString);
 
 
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		empty_grade();
		alert(resp);
	}
}

 
}


//------------------------------upadte end----------------------------

//===============================search start===========================
function ajaxSearch_grade(){
	var ajaxRequest;  // The variable that makes Ajax possible!
 try{
   ajaxRequest = new XMLHttpRequest();
 }catch (e){
   try{
      ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
   }catch (e) {
      try{
         ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
      }catch (e){
         alert("Your browser broke!");
         return false;
      }
   }
 }
 var gr_name 	= document.getElementById('gr_name').value;
 var queryString="gr_name="+gr_name;
 ajaxRequest.open("POST", "index.php/payroll_con/ajaxSearch_con_grade/", true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send(queryString);
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		personalinfo = resp.split("-*-");
		//document.getElementById('gr_id').value = personalinfo[0];
		//document.getElementById('gr_name').value = personalinfo[1];
		document.getElementById('gr_str_basic').value = personalinfo[2];
		document.getElementById('gr_end_basic').value = personalinfo[3];
		document.getElementById('gr_incr1').value = personalinfo[4];
		document.getElementById('gr_1st_phase').value = personalinfo[5];
		document.getElementById('gr_incr2').value = personalinfo[6];
		document.getElementById('gr_2nd_phase').value = personalinfo[7];
	}
}
	
	
	}

//=================================search end==========================

//==========================delete start ===================================
function ajax_grade_Delete()
{
	
 //var okyes;
// okyes=confirm('Are you sure you want to Delete this?');
// if(okyes==false) return;
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

 var gr_name 	= document.getElementById('gr_name').value;

 var queryString="gr_name="+gr_name;
 
 ajaxRequest.open("POST", "index.php/payroll_con/ajax_grade_delete/", true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send(queryString);
 
 
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		
		alert(resp);
			
	}
}

 

	
}

//=============================delete end===================================
//============================================================================Grade end=====================================================================================

//============================================================================Department  and section start========================================================================

//-----------------------------------insert separtment---------------------------

function validateForm_dept()
{
var x=document.forms["dept_section"]["dpt_name"].value
if (x==null || x=="")
  {
  alert("Department Name must be filled out");
  return false;
  }
}





function ajax_deparment_Insert(){

var validid=validateForm_dept();
if(validid==false)
	{
		return;

	}
var okyes;
okyes=confirm('Are you sure you want to Insert this?');
 if(okyes==false) return;
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
 
 var dpt_name 	= document.getElementById('dpt_name').value;

 var queryString="dpt_name="+dpt_name;
 
 ajaxRequest.open("POST", "index.php/payroll_con/department_insert/", true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send(queryString);
 ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		
		if(resp=="Sorry! Duplicate Department Name not allow")
		{
			alert(resp);
			return;
		}
		dept_idname = resp.split("===");
		dept_id = dept_idname[0].split("***");
		dept_name = dept_idname[1].split("***");
		
		document.dept_section.select_dept.options.length=0;
		document.dept_section.select_dept.options[0]=new Option("Select","Select", true, false);
				for (i=0; i<dept_id.length; i++){
					document.dept_section.select_dept.options[i+1]=new Option(dept_name[i],dept_id[i], false, false);
				
				}
				
		}
	
		//empty_grade()
		//alert(resp);
	}
}

function absent_report()
{
	
 //var okyes;
// okyes=confirm('Are you sure you want to Delete this?');
// if(okyes==false) return;
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
        // alert("Your browser broke!");
         return false;
      }
   }
 }
report_month= document.getElementById('report_month').value;
report_year= document.getElementById('report_year').value;

hostname = window.location.hostname;
url =  "http://"+hostname+"/payroll/index.php/payroll_con/absent_report/"+report_year+"/"+report_month;

myRef = window.open(url,'mywin',"menubar=1,resizable=1,scrollbars=1,width=900,height=500");
myRef.moveTo(0,0);

/* var queryString="null";
 
 ajaxRequest.open("POST", "index.php/payroll_con/find_late/", true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send(queryString);
 
 
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		
		alert(resp);
			
		}
	}*/

}

function late_commer_report()
{
	
	
 //var okyes;
// okyes=confirm('Are you sure you want to Delete this?');
// if(okyes==false) return;
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
        // alert("Your browser broke!");
         return false;
      }
   }
 }
report_month= document.getElementById('report_month').value;
report_year= document.getElementById('report_year').value;

hostname = window.location.hostname;
url =  "http://"+hostname+"/payroll/index.php/payroll_con/late_commer_report/"+report_year+"/"+report_month;

myRef = window.open(url,'mywin',"menubar=1,resizable=1,scrollbars=1,width=900,height=500");
myRef.moveTo(0,0);

/* var queryString="null";
 
 ajaxRequest.open("POST", "index.php/payroll_con/find_late/", true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send(queryString);
 
 
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		
		alert(resp);
			
		}
	}*/

}

function monthly_att_register()
{
	
	
 //var okyes;
// okyes=confirm('Are you sure you want to Delete this?');
// if(okyes==false) return;
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
        // alert("Your browser broke!");
         return false;
      }
   }
 }
month= document.getElementById('report_month').value;
year= document.getElementById('report_year').value;

hostname = window.location.hostname;
url =  "http://"+hostname+"/payroll/index.php/payroll_con/monthly_att_register/"+year+"/"+month;

myRef = window.open(url,'mywin',"menubar=1,resizable=1,scrollbars=1,width=900,height=800");
myRef.moveTo(50,50);
}

function monthly_salary_sheet()
{
	
	
 //var okyes;
// okyes=confirm('Are you sure you want to Delete this?');
// if(okyes==false) return;
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
        // alert("Your browser broke!");
         return false;
      }
   }
 }

month= document.getElementById('report_month_sal').value;
year= document.getElementById('report_year_sal').value;

hostname = window.location.hostname;
url =  "http://"+hostname+"/payroll/index.php/payroll_con/monthly_salary_sheet/"+year+"/"+month;

myRef = window.open(url,'mywin',"menubar=1,resizable=1,scrollbars=1,width=1200,height=800");
myRef.moveTo(50,50);
}


function report_view()
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
alert("Process start?");

p_start_date= document.getElementById('p_start_date').value;
month= document.getElementById('report_month').value;
year= document.getElementById('report_year').value;
//url = "http://localhost/payroll/index.php/payroll_con/daily_absent/"+month+"/"+year;
//myRef = window.open(url,'mywin',"menubar=1,resizable=1,width=1100,height=600");
//myRef.moveTo(0,0);

	var queryString="year="+year+"&month="+month+"&p_start_date="+p_start_date;
	
	ajaxRequest.open("POST", "index.php/payroll_con/daily_absent/", true);
	ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	ajaxRequest.send(queryString);
	ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		alert(resp);
	}
	}
}

function salary_process()
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
alert("Process start?");

month= document.getElementById('report_month_sal').value;
year= document.getElementById('report_year_sal').value;
//url = "http://localhost/payroll/index.php/payroll_con/daily_absent/"+month+"/"+year;
//myRef = window.open(url,'mywin',"menubar=1,resizable=1,width=1100,height=600");
//myRef.moveTo(0,0);

	var queryString="year="+year+"&month="+month;
	
	ajaxRequest.open("POST", "index.php/payroll_con/process/", true);
	ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	ajaxRequest.send(queryString);
	ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		alert(resp);
	}
	}
}

	




function absentreport()
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
 
month= document.getElementById('report_month').value;
year= document.getElementById('report_year').value;
year_month = year+"-"+month;

start_date= document.getElementById('start_date').value;
end_date= document.getElementById('end_date').value;


hostname = window.location.hostname;
url =  "http://"+hostname+"/payroll/index.php/payroll_con/absentreport/"+start_date+"/"+end_date+"/"+year_month;

myRef = window.open(url,'mywin',"menubar=1,resizable=1,scrollbars=1,width=900,height=800");
myRef.moveTo(0,0);

}




function present_process()
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
start_date= document.getElementById('start_date').value;
end_date= document.getElementById('end_date').value;

hostname = window.location.hostname;
url =  "http://"+hostname+"/payroll/index.php/payroll_con/present_report/"+start_date+"/"+end_date;
myRef = window.open(url,'mywin',"menubar=1,resizable=1,scrollbars=1,width=900,height=800");
myRef.moveTo(0,0);

}

function late_process()
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
report_month= document.getElementById('report_month').value;
report_year= document.getElementById('report_year').value;
start_date= document.getElementById('start_date').value;
end_date= document.getElementById('end_date').value;

hostname = window.location.hostname;
url =  "http://"+hostname+"/payroll/index.php/payroll_con/late_report/"+report_year+"/"+report_month+"/"+start_date+"/"+end_date;
//url = "http://localhost/payroll/index.php/payroll_con/late_report/"+start_date+"/"+end_date;
myRef = window.open(url,'mywin',"menubar=1,resizable=1,scrollbars=1,width=900,height=800");
myRef.moveTo(0,0);

}



function leave_process()
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
start_date= document.getElementById('start_date').value;
end_date= document.getElementById('end_date').value;

hostname = window.location.hostname;
url =  "http://"+hostname+"/payroll/index.php/payroll_con/leave_report/"+start_date+"/"+end_date;
myRef = window.open(url,'mywin',"menubar=1,resizable=1,scrollbars=1,width=900,height=800");
myRef.moveTo(0,0);

}
//===========================================end sayed==========================
/*
 * Example windows
 */
//MyDesktop.GridWindow = Ext.extend(Ext.app.Module, {//
//    id:'grid-win',
//    init : function(){
//        this.launcher = {
//            text: 'Grid Window',
//            iconCls:'icon-grid',
//            handler : this.createWindow,
//            scope: this
//        }
//    },
//
//    createWindow : function(){
//        var desktop = this.app.getDesktop();
//        var win = desktop.getWindow('grid-win');
//        if(!win){
//            win = desktop.createWindow({
//                id: 'grid-win',
//                title:'Grid Window',
//                width:540,
//                height:480,
//                iconCls: 'icon-grid',
//                shim:false,
//                animCollapse:false,
//                constrainHeader:true,
//
//                layout: 'fit',
//                items:
//                    new Ext.grid.GridPanel({
//                        border:false,
//                        ds: new Ext.data.Store({
//                            reader: new Ext.data.ArrayReader({}, [
//                               {name: 'company'},
//                               {name: 'price', type: 'float'},
//                               {name: 'change', type: 'float'},
//                               {name: 'pctChange', type: 'float'}
//                            ]),
//                            data: Ext.grid.dummyData
//                        }),
//                        cm: new Ext.grid.ColumnModel([
//                            new Ext.grid.RowNumberer(),
//                            {header: "Company", width: 120, sortable: true, dataIndex: 'company'},
//                            {header: "Price", width: 70, sortable: true, renderer: Ext.util.Format.usMoney, dataIndex: 'price'},
//                            {header: "Change", width: 70, sortable: true, dataIndex: 'change'},
//                            {header: "% Change", width: 70, sortable: true, dataIndex: 'pctChange'}
//                        ]),
//
//                        viewConfig: {
//                            forceFit:true
//                        },
//                        autoExpandColumn:'company',
//
//                        tbar:[{
//                            text:'Add Something',
//                            tooltip:'Add a new row',
//                            iconCls:'add'
//                        }, '-', {
//                            text:'Options',
//                            tooltip:'Blah blah blah blaht',
//                            iconCls:'option'
//                        },'-',{
//                            text:'Remove Something',
//                            tooltip:'Remove the selected item',
//                            iconCls:'remove'
//                        }]
//                    })
//            });
//        }
//        win.show();
//    }
//});



function job_card()
{
	
	
 //var okyes;
// okyes=confirm('Are you sure you want to Delete this?');
// if(okyes==false) return;
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
        // alert("Your browser broke!");
         return false;
      }
   }
 }
 
report_month= document.getElementById('report_month').value;
report_year= document.getElementById('report_year').value;
job_start_date= document.getElementById('job_start_date').value;
job_end_date= document.getElementById('job_end_date').value;
emp_id= document.getElementById('emp_id').value;

start_date = report_year+"-"+report_month+"-"+job_start_date;
end_date = report_year+"-"+report_month+"-"+job_end_date;

hostname = window.location.hostname;
url =  "http://"+hostname+"/payroll/index.php/payroll_con/job_card/"+start_date+"/"+end_date+"/"+emp_id;

myRef = window.open(url,'mywin',"menubar=1,resizable=1,scrollbars=1,width=900,height=800");
myRef.moveTo(0,0);

/* var queryString="null";
 
 ajaxRequest.open("POST", "index.php/payroll_con/find_late/", true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send(queryString);
 
 
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		
		alert(resp);
			
		}
	}*/

}


MyDesktop.TabWindow = Ext.extend(Ext.app.Module, {
    id:'tab-win',
    init : function(){
        this.launcher = {
            text: 'Employee Setup',
            iconCls:'tabs',
            handler : this.createWindow,
            scope: this
        }
    },

    createWindow : function(){
        var desktop = this.app.getDesktop();
        var win = desktop.getWindow('tab-win');
        if(!win){
            win = desktop.createWindow({
                id: 'tab-win',
                title:'Employee Setup',
                width:540,
                height:400,
                iconCls: 'tabs',
                shim:false,
                animCollapse:false,
                border:false,
                constrainHeader:true,
				

                layout: 'fit',
                items:
                    new Ext.TabPanel({
                        activeTab:0,

                        items: [{
                            title: 'Personal Info',
                            header:false,
							html : "<br/><form  name='com_per_info' ><table width='100%' border='0' align='center' style='padding:10px'><tr><td width='30%'>Emp Id</td><td><input type='text' size='40px' name='nempid' id='empid' ></td></tr><tr><td width='20%'>Full Name</td><td><input type='text' size='40px' id='name'></td></tr><tr><td width='20%'>Mother's Name</td><td><input type='text' size='40px' id='mname'></td></tr><tr><td width='20%'>Father's Name</td><td><input type='text' size='40px' id='fname'></td></tr><tr><td width='20%'>Date Of Birth</td><td><input type='text' size='40px' id='dob' ></td></tr><tr><td width='20%'>Present Address</td><td><input type='text' size='40px' id='padd' name='padd' ></td></tr><tr><td width='20%'>Permanent Address</td><td><input type='text' size='40px' id='fadd' name='fadd' ></td></tr><tr><td width='20%'>Religion</td><td><select id='reli'><option value='1'>Islam</option><option value='2'>Hindu</option><option value='3'>Christian</option><option value='4'>Buddish</option></select></td></tr><tr><td width='20%'>Sex</td><td><select id='sex'><option value='1'>Male</option><option value='2'>Female</option></select></td></tr><tr><td width='20%'>Blood Group</td><td><select id='bgroup'><option value='0'>None</option><option value='1'>A+</option><option value='2'>A-</option><option value='3'>B+</option><option value='4'>B-</option><option value='5'>AB+</option><option value='6'>AB-</option><option value='7'>O+</option><option value='8'>O-</option></select></td></tr><br/><tr><td align='right' width='20%'>Find ID:</td><td><input style='background-color:yellow;' type='text' size='15px' name='pi_empid' id='pi_empid' onchange='ajaxSearch()'>&nbsp;<input type='button' name='add' onclick='enable_pi_save()' value='NEW'/>&nbsp;<input type='button' name='pi_save' disabled='disabled' onclick='ajaxInsert()' value='SAVE'/>&nbsp;<input type='button' onclick='ajaxupdate()' value='EDIT'/>&nbsp;<input type='button' onclick='ajaxDelete()' value='DELETE'/></td></tr><tr></table></form>",
                            border:false
                        },{
                            title: 'Company Info',
                            header:false,
                            html : "<br/><form name='cominfo'><table width='100%' border='0' align='center' style='padding:10px'><tr><td width='30%'>Emp ID</td><td><input type='text' size='40px' id='com_empid' name='com_empid'></td></tr><tr><td width='20%'>Punch Card No.</td><td><input type='text' size='40px' id='idcard'></td></tr><tr><td width='20%'>Department</td><td><select id='dept' name='sele' onchange='com_info_dept()'><option value=''></option></select></td></tr><tr><td width='20%'>Section</td><td><select id='sec' name='section' onchange='com_info_section()'><option value=''></option></select></td></tr><tr><td width='20%'>Line Number</td><td><select id='line' name='line' onchange='com_info_desig()'><option value=''></option></select></td></tr><tr><td width='20%'>Designation</td><td><select id='desig' name='desig' onchange='com_info_grade()'><option value=''></option></select></td></tr><tr><td width='20%'>Salary Grade</td><td><select id='salg' name='salg' onchange='com_info_empstat()'><option value=''></option></select></td></tr><tr><td width='20%'>Emp Status</td><td><select id='empstat' name='empstat' onchange='com_info_shift()'><option value=''></option></select></td></tr><tr><td width='20%'>Emp Shift</td><td><select id='empshift' name='empshift' onchange='com_info_alert()()'><option value=''></option></select></td></tr><tr><td width='20%'>Gross Salary</td><td><input style='width:120px;' type='text' size='40px' id='gsal'></td></tr><tr><td width='20%'>Emp join date</td><td><input style='width:120px;' type='text' size='40px' id='ejd'></td></tr><br/><tr><td align='center' colspan='2'>Find ID :<input style='background-color:yellow;' type='text' size='15px' id='search_empid' name='search_empid' onchange='com_info_Search()'>&nbsp;<input type='button' name='add' onclick='enable_save()' value='NEW'/>&nbsp;<input type='button' name='save' disabled='disabled' onclick='com_info_insert()' value='SAVE'/>&nbsp;<input type='button' onclick='com_info_edit()' value='EDIT'/></td></tr></table></form>",
                            border:false
                        },{
                            title: 'Education & Skill',
                            header:false,
                            html : "<br/><form  name='eduskill' ><table width='100%' border='0' align='center'><tr><td width='30%'>Emp ID</td><td><input type='text' size='30px' id='edu_empid' ></td></tr><tr><td width='30%'>Emp Last Dgree</td><td><input type='text' size='30px' id='emp_last_dg'></td></tr><tr><td width='20%'>Passing year</td><td><input type='text' size='30px' id='pass_year'></td></tr><tr><td width='30%'>Passing Institute</td><td><input type='text' size='30px' id='edu_insti'></td></tr><tr><td width='20%'>Emp skill dept.</td><td><input type='text' size='30px' id='skill_dept'></td></tr><tr><td width='30%'>Year of Skill</td><td><input type='text' size='30px' id='skill_year'></td></tr><tr><td width='20%'>Company Name</td><td><input type='text' size='30px' id='skill_com_na'></td></tr><br/><tr><td align='right' width='20%'>Find ID :</td><td><input style='background-color:yellow;' type='text' size='15px' id='edu_skill_empid' onchange='ajaxSearch_edu_skill()' ><input type='button' name='add' onclick='edu_enable_save()' value='NEW'/><input type='button' name='edu_save' disabled='disabled' onclick='ajax_edu_skill_Insert()' value='SAVE'/><input type='button' onclick='ajaxu_edu_update()' value='EDIT'/></td></tr></table></form>",
                            border:false
                        }]
                    })
            });
        }
        win.show();
    }
});

MyDesktop.TabWindowConfig = Ext.extend(Ext.app.Module, {
    id:'config',
    init : function(){
        this.launcher = {
            text: 'Configuration',
            iconCls:'tabs',
            handler : this.createWindow,
            scope: this
        }
    },

    createWindow : function(){
        var desktop = this.app.getDesktop();
        var win = desktop.getWindow('config');
        if(!win){
            win = desktop.createWindow({
                id: 'config',
                title:'Configuration',
                width:540,
                height:400,
                iconCls: 'tabs',
                shim:false,
                animCollapse:false,
                border:false,
                constrainHeader:true,
				

                layout: 'fit',
                items:
                    new Ext.TabPanel({
                        activeTab:0,

                        items: [{
                            title: 'Department',
                            header:false,
							html : "<br/><form  name='department' ><table width='100%' border='0' align='center' style='padding:10px'><tr><td><input type='hidden' size='40px' name='deptid' id='deptid' ></td></tr><tr><td width='20%'>Department Name</td><td><input type='text' size='40px' id='deptname'></td></tr><br/><tr><td align='right' width='20%'>Find Departmet Name:</td><td> <input style='background-color:yellow;' type='text' size='15px' name='check_dept_name' id='check_dept_name' onchange='find_dept_name()'>&nbsp;<input type='button' name='add' onclick='enable_deptname()' value='NEW'/>&nbsp;<input type='button' name='pi_save' disabled='disabled' onclick='save_deptname()' value='SAVE'/>&nbsp;<input type='button' onclick='update_deptname()' value='EDIT'/>&nbsp;<input type='button' onclick='delete_deptname()' value='DELETE'/></td></tr><tr></table></form>",
                            border:false
                        },{
                            title: 'Section',
                            header:false,
                            html : "<br/><form  name='section' ><table width='100%' border='0' align='center' style='padding:10px'><tr><td><input type='hidden' size='40px' name='sectionid' id='sectionid' ></td></tr><tr><td width='20%'>Section Name</td><td><input type='text' size='40px' id='sectionname' name='sectionname'></td></tr><tr><td width='20%'>Department</td><td><select id='dept' name='sele' ><option value=''></option></select></td></tr><br/><tr><td align='right' width='20%'>Find Section Name:</td><td> <input style='background-color:yellow;' type='text' size='15px' name='check_section_name' id='check_section_name' onchange='find_section_name()'>&nbsp;<input type='button' name='add' onclick='enable_sectionname()' value='NEW'/>&nbsp;<input type='button' name='pi_save' disabled='disabled' onclick='save_sectionname()' value='SAVE'/>&nbsp;<input type='button' onclick='update_sectionname()' value='EDIT'/>&nbsp;<input type='button' onclick='delete_sectionname()' value='DELETE'/></td></tr><tr></table></form>",
                            border:false
                        },{
                            title: 'Line Number',
                            header:false,
                            html : "<br/><form  name='line_form' ><table width='100%' border='0' align='center' style='padding:10px'><tr><td><input type='hidden' size='40px' name='lineid' id='lineid' ></td></tr><tr><td width='20%'>Line Name</td><td><input type='text' size='40px' id='linename'></td></tr><br/><tr><td align='right' width='20%'>Find Line Name:</td><td> <input style='background-color:yellow;' type='text' size='15px' name='check_line_name' id='check_line_name' onchange='find_line_name()'>&nbsp;<input type='button' name='add' onclick='enable_linename()' value='NEW'/>&nbsp;<input type='button' name='line_save' disabled='disabled' onclick='save_linename()' value='SAVE'/>&nbsp;<input type='button' onclick='update_linename()' value='EDIT'/>&nbsp;<input type='button' onclick='delete_linename()' value='DELETE'/></td></tr><tr></table></form>",
                            border:false
                        },{
                            title: 'Designation',
                            header:false,
                            html : "<br/><form  name='designation' ><table width='100%' border='0' align='center' style='padding:10px'><tr><td><input type='hidden' size='40px' name='designationid' id='designationid' ></td></tr><tr><td width='20%'>Designation Name</td><td><input type='text' size='40px' id='designationname'></td></tr><br/><tr><td align='right' width='20%'>Find Designation Name:</td><td> <input style='background-color:yellow;' type='text' size='15px' name='check_designation_name' id='check_designation_name' onchange='find_designation_name()'>&nbsp;<input type='button' name='add' onclick='enable_designationname()' value='NEW'/>&nbsp;<input type='button' name='designation_save' disabled='disabled' onclick='save_designationname()' value='SAVE'/>&nbsp;<input type='button' onclick='update_designationname()' value='EDIT'/>&nbsp;<input type='button' onclick='delete_designationname()' value='DELETE'/></td></tr><tr></table></form>",
                            border:false
                        },{
                            title: 'Salary Grade',
                            header:false,
                            html : "<br/><br/><br/><form  name='myForm_grade'><table width='90%' border='0' align='center'><tr><td width='40%'>Grade Name</td><td><input type='text' size='40px' id='gr_name' onchange='ajaxSearch_grade()' ></td></tr><tr><td width='40%'>Basic Salary(Start)</td><td><input type='text' size='40px' id='gr_str_basic'></td></tr><tr><td width='20%'>Basic Salary (End)</td><td><input type='text' size='40px' id='gr_end_basic'></td></tr><tr><td width='20%'>Grade Incriment (1st)</td><td><input type='text' size='40px' id='gr_incr1'></td></tr><tr><td width='20%'>Grade phase (1st)</td><td><input type='text' size='40px' id='gr_1st_phase'></td></tr><tr><td width='20%'>Grade Incriment (2nd)</td><td><input type='text' size='40px' id='gr_incr2'></td></tr><tr><td width='20%'>Grade Phase(2nd)</td><td><input type='text' size='40px' id='gr_2nd_phase'></td></tr><br/><tr><td align='center' colspan='2'><input type='button' onclick='ajax_grade_Insert()' value='INSERT'/><input type='button' onclick='ajax_grade_update()' value='UPDATE'/><input type='button' onclick='ajax_grade_Delete()' value='DELETE'/</td></tr></table></form>",
                            border:false
                        }]
                    })
            });
        }
        win.show();
    }
});

function sayed()
{
	alert("ssfsfs");
	}

MyDesktop.AccordionWindow = Ext.extend(Ext.app.Module, {
    id:'acc-win',
    init : function(){
        this.launcher = {
            text: 'Accordion Window',
            iconCls:'accordion',
          //  handler : this.createWindow,
			//url = "http://localhost/payroll/index.php/payroll_con/find_late/";
			//myRef = window.open(url,'mywin',"menubar=1,resizable=1,width=900,height=300");
		//	myRef.moveTo(0,0);
            scope: this
			
			
        }
    }

//    createWindow : function(){
//		
//		
//        var desktop = this.app.getDesktop();
//        var win = desktop.getWindow('acc-win');
//        if(!win){
//            win = desktop.createWindow({html :"<input type='button' onclick='ajaxu_edu_update()' value='EDIT'/>"});
//        }
//        win.show();
//    }
//sayed();
});

// for example purposes
var windowIndex = 0;

//MyDesktop.BogusModule = Ext.extend(Ext.app.Module, {//
//    init : function(){
//        this.launcher = {
//            text: 'Window '+(++windowIndex),
//            iconCls:'bogus',
//            handler : this.createWindow,
//            scope: this,
//            windowId:windowIndex
//        }
//    },
//
//    createWindow : function(src){
//        var desktop = this.app.getDesktop();
//        var win = desktop.getWindow('bogus'+src.windowId);
//        if(!win){
//            win = desktop.createWindow({
//                id: 'bogus'+src.windowId,
//                title:src.text,
//                width:540,
//                height:480,
//                html : '<p>Something useful would be in here.</p>',
//                iconCls: 'bogus',
//                shim:false,
//                animCollapse:false,
//                constrainHeader:true
//            });
//        }
//        win.show();
//    }
//});

//----------------------------------------salary grate-----------------------
MyDesktop.SalaryGrade = Ext.extend(Ext.app.Module, {
	id:'bogus-salg',
    init : function(){
        this.launcher = {
            text: 'Salary Grade ',
            iconCls:'bogus',
			
            handler : this.createWindow,
            scope: this,
            windowId:windowIndex
        }
    },

    createWindow : function(src){
        var desktop = this.app.getDesktop();
        var win = desktop.getWindow('bogus-salg');
        if(!win){
            win = desktop.createWindow({
                id:'bogus-salg',
                title:src.text,
                width:640,
                height:480,
                html : "<br/><br/><form  name='myForm_grade'><table width='90%' border='1' align='center'><tr><td width='40%'>Grade Name</td><td><input type='text' size='40px' id='gr_name' onchange='ajaxSearch_grade()' ></td></tr><tr><td width='40%'>Basic Salary(Start)</td><td><input type='text' size='40px' id='gr_str_basic'></td></tr><tr><td width='20%'>Basic Salary (End)</td><td><input type='text' size='40px' id='gr_end_basic'></td></tr><tr><td width='20%'>Grade Incriment (1st)</td><td><input type='text' size='40px' id='gr_incr1'></td></tr><tr><td width='20%'>Grade phase (1st)</td><td><input type='text' size='40px' id='gr_1st_phase'></td></tr><tr><td width='20%'>Grade Incriment (2nd)</td><td><input type='text' size='40px' id='gr_incr2'></td></tr><tr><td width='20%'>Grade Phase(2nd)</td><td><input type='text' size='40px' id='gr_2nd_phase'></td></tr><tr><td align='right' colspan='2'><input type='button' onclick='ajax_grade_Insert()' value='INSERT'/><input type='button' onclick='ajax_grade_update()' value='UPDATE'/><input type='button' onclick='ajax_grade_Delete()' value='DELETE'/</td></tr></table></form>",
                iconCls: 'bogus',
                shim:false,
                animCollapse:false,
                constrainHeader:true
            });
        }
        win.show();
    }
});


MyDesktop.AttReport = Ext.extend(Ext.app.Module, {
	id:'bogus-att-report',
    init : function(){
        this.launcher = {
            text: 'Attendance Report',
            iconCls:'bogus',
			
            handler : this.createWindow,
            scope: this,
            windowId:windowIndex
        }
    },

    createWindow : function(src){
        var desktop = this.app.getDesktop();
        var win = desktop.getWindow('bogus-att-report');
        if(!win){
            win = desktop.createWindow({
                id: 'bogus-att-report',
                title:src.text,
                width:540,
                height:450,
                html : "<form  name='attendance_report'><br/><div><div align='center'><fieldset style='width:500px;'><legend><font size='+1'><b>Process</b></font></legend>Select Date :<select id='p_start_date'><option value='01'>01</option><option value='02'>02</option><option value='03'>03</option><option value='04'>04</option><option value='05'>05</option><option value='06'>06</option><option value='07'>07</option><option value='08'>08</option><option value='09'>09</option><option value='10'>10</option><option value='11'>11</option><option value='12'>12</option><option value='13'>13</option><option value='14'>14</option><option value='15'>15</option><option value='16'>16</option><option value='17'>17</option><option value='18'>18</option><option value='19'>19</option><option value='20'>20</option><option value='21'>21</option><option value='22'>22</option><option value='23'>23</option><option value='24'>24</option><option value='25'>25</option><option value='26'>26</option><option value='27'>27</option><option value='28'>28</option><option value='29'>29</option><option value='30'>30</option><option value='31'>31</option></select><select id='report_month'><option value='01'>January</option><option value='02'>February</option><option value='03'>March</option><option value='04'>April</option><option value='05'>May</option><option value='06'>Jun</option><option value='07'>July</option><option value='08'>August</option><option value='09'>September</option><option value='10'>October</option><option value='11'>November</option><option value='12'>December</option></select><select id='report_year'><option value='2011'>2011</option><option value='2012'>2012</option><option value='2013'>2013</option><option value='2014'>2014</option><option value='2015'>2015</option><option value='2016'>2016</option><option value='2017'>2017</option><option value='2018'>2018</option><option value='2019'>2019</option><option value='2020'>2020</option></select><input type='button' name='view' onclick='report_view()' value='Process'/></fieldset></div></div><div align='center'><br><br><fieldset style='width:500px;'><legend><font size='+1'><b>Monthly Report</b></font></legend><br><input type='button' onclick='monthly_att_register()' value='Attendance Report'/></fieldset></div><br><br><div align='center'><fieldset style='width:500px;'><legend><font size='+1'><b>Daily Report</b></font></legend><br>Start Date <select id='start_date'><option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option><option value='5'>5</option><option value='6'>6</option><option value='7'>7</option><option value='8'>8</option><option value='9'>9</option><option value='10'>10</option><option value='11'>11</option><option value='12'>12</option><option value='13'>13</option><option value='14'>14</option><option value='15'>15</option><option value='16'>16</option><option value='17'>17</option><option value='18'>18</option><option value='19'>19</option><option value='20'>20</option><option value='21'>21</option><option value='22'>22</option><option value='23'>23</option><option value='24'>24</option><option value='25'>25</option><option value='26'>26</option><option value='27'>27</option><option value='28'>28</option><option value='29'>29</option><option value='30'>30</option><option value='31'>31</option></select>End Date <select id='end_date'><option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option><option value='5'>5</option><option value='6'>6</option><option value='7'>7</option><option value='8'>8</option><option value='9'>9</option><option value='10'>10</option><option value='11'>11</option><option value='12'>12</option><option value='13'>13</option><option value='14'>14</option><option value='15'>15</option><option value='16'>16</option><option value='17'>17</option><option value='18'>18</option><option value='19'>19</option><option value='20'>20</option><option value='21'>21</option><option value='22'>22</option><option value='23'>23</option><option value='24'>24</option><option value='25'>25</option><option value='26'>26</option><option value='27'>27</option><option value='28'>28</option><option value='29'>29</option><option value='30'>30</option><option value='31'>31</option></select><br/><input type='button' onclick='absentreport()' value='Absent Report'/><input type='button' onclick='present_process()' value='Present Report'/><input type='button' onclick='leave_process()' value='Leave Report'/><input type='button' onclick='late_process()' value='Late Report'/></fieldset></div><br><br><div align='center'><fieldset style='width:500px;'><legend><font size='+1'><b>Employee Wise Report</b></font></legend><br>Select Date : <select id='job_start_date'><option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option><option value='5'>5</option><option value='6'>6</option><option value='7'>7</option><option value='8'>8</option><option value='9'>9</option><option value='10'>10</option><option value='11'>11</option><option value='12'>12</option><option value='13'>13</option><option value='14'>14</option><option value='15'>15</option><option value='16'>16</option><option value='17'>17</option><option value='18'>18</option><option value='19'>19</option><option value='20'>20</option><option value='21'>21</option><option value='22'>22</option><option value='23'>23</option><option value='24'>24</option><option value='25'>25</option><option value='26'>26</option><option value='27'>27</option><option value='28'>28</option><option value='29'>29</option><option value='30'>30</option><option value='31'>31</option></select> To  <select id='job_end_date'><option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option><option value='5'>5</option><option value='6'>6</option><option value='7'>7</option><option value='8'>8</option><option value='9'>9</option><option value='10'>10</option><option value='11'>11</option><option value='12'>12</option><option value='13'>13</option><option value='14'>14</option><option value='15'>15</option><option value='16'>16</option><option value='17'>17</option><option value='18'>18</option><option value='19'>19</option><option value='20'>20</option><option value='21'>21</option><option value='22'>22</option><option value='23'>23</option><option value='24'>24</option><option value='25'>25</option><option value='26'>26</option><option value='27'>27</option><option value='28'>28</option><option value='29'>29</option><option value='30'>30</option><option value='31'>31</option></select>Enter Employee ID :<input type='text' value='' id='emp_id'><br/><input type='button' onclick='job_card()' value='Job Card'/></fieldset></div></div></from>",
                iconCls: 'bogus',
                shim:false,
                animCollapse:false,
                constrainHeader:true
            });
        }
        win.show();
    }
});

//<input type='button' onclick='late_commer_report()' value='Late comer report'/><input type='button' onclick='absent_report()' value='Absent report'/><input type='button' onclick='attendance_report()' value='Attendance report'/>

MyDesktop.SalaryReport = Ext.extend(Ext.app.Module, {
	id:'salary-report',
    init : function(){
        this.launcher = {
            text: 'Salary Report',
            iconCls:'bogus',
			
            handler : this.createWindow,
            scope: this,
            windowId:windowIndex
        }
    },

    createWindow : function(src){
        var desktop = this.app.getDesktop();
        var win = desktop.getWindow('salary-report');
        if(!win){
            win = desktop.createWindow({
                id: 'salary-report',
                title:src.text,
                width:540,
                height:450,
                html : "<form  name='salary_report'><br/><div><div align='center'><fieldset style='width:500px;'><legend><font size='+1'><b>Process</b></font></legend>Select Month and Year :<select id='report_month_sal'><option value='01'>January</option><option value='02'>February</option><option value='03'>March</option><option value='04'>April</option><option value='05'>May</option><option value='06'>Jun</option><option value='07'>July</option><option value='08'>August</option><option value='09'>September</option><option value='10'>October</option><option value='11'>November</option><option value='12'>December</option></select><select id='report_year_sal'><option value='2011'>2011</option><option value='2012'>2012</option><option value='2013'>2013</option><option value='2014'>2014</option><option value='2015'>2015</option><option value='2016'>2016</option><option value='2017'>2017</option><option value='2018'>2018</option><option value='2019'>2019</option><option value='2020'>2020</option></select><input type='button' name='view' onclick='salary_process()' value='Process'/></fieldset></div></div><div align='center'><br><br><fieldset style='width:500px;'><legend><font size='+1'><b>Monthly Report</b></font></legend><br><input type='button' onclick='monthly_salary_sheet()' value='Monthly Salary Sheet'/></fieldset></div></from>",
                iconCls: 'bogus',
                shim:false,
                animCollapse:false,
                constrainHeader:true
            });
        }
        win.show();
    }
});


MyDesktop.Section = Ext.extend(Ext.app.Module, {
    init : function(){
        this.launcher = {
            text: 'Section',
            iconCls:'bogus',
			
            handler : this.createWindow,
            scope: this,
            windowId:windowIndex
        }
    },

    createWindow : function(src){
        var desktop = this.app.getDesktop();
        var win = desktop.getWindow('bogus'+src.windowId);
        if(!win){
            win = desktop.createWindow({
                id: 'bogus'+src.windowId,
                title:src.text,
                width:640,
                height:380,
                html : "<form  name='dept_section'><br/><br/><div style='border:#0000FF 1px solid;'><br/><br/><table width='90%' border='1' align='center'><tr><td width='40%'>Depertment name</td><td><input type='text' size='40px' id='dpt_name' onchange='ajaxSearch_deparment()' ></td></tr><tr><td align='center' colspan='2'><input type='button' onclick='ajax_deparment_Insert()' value='INSERT'/><input type='button' onclick='ajax_deparment_Delete()' value='DELETE'  /></td></tr></table><br/><br/></div><br/><br/><div style='border:#0000FF 1px solid;'><br/><br/><table width='90%' border='1' align='center'><tr><td width='40%'>Section name</td><td><input type='text' size='40px' id='section_name' onchange='ajaxSearch_section()' ></td></tr><tr><tr><td width='40%'>Department name</td><td><select name='select_dept'><option value=''></option></select></td></tr><tr><td align='center' colspan='2'><input type='button' onclick='ajax_section_Insert()' value='INSERT'/><input type='button' onclick='ajax_section_update()' value='UPDATE'/><input type='button' onclick='ajax_section_Delete()' value='DELETE'  /></td></tr><br/><br/></table></div><table><tr><td><tr><td align='center' colspan='2'><input type='button' onclick='report_not_attend()' value='Late'/></td></tr></table></form>",
                iconCls: 'bogus',
                shim:false,
                animCollapse:false,
                constrainHeader:true
            });
        }
        win.show();
    }
});


//MyDesktop.BogusMenuModule = Ext.extend(MyDesktop.BogusModule, {//
//    init : function(){
//        this.launcher = {
//            text: 'Bogus Submenu',
//            iconCls: 'bogus',
//            handler: function() {
//				return false;
//			},
//            menu: {
//                items:[{
//                    text: 'Bogus Window '+(++windowIndex),
//                    iconCls:'bogus',
//                    handler : this.createWindow,
//                    scope: this,
//                    windowId: windowIndex
//                    },{
//                    text: 'Bogus Window '+(++windowIndex),
//                    iconCls:'bogus',
//                    handler : this.createWindow,
//                    scope: this,
//                    windowId: windowIndex
//                    },{
//                    text: 'Bogus Window '+(++windowIndex),
//                    iconCls:'bogus',
//                    handler : this.createWindow,
//                    scope: this,
//                    windowId: windowIndex
//                    },{
//                    text: 'Bogus Window '+(++windowIndex),
//                    iconCls:'bogus',
//                    handler : this.createWindow,
//                    scope: this,
//                    windowId: windowIndex
//                    },{
//                    text: 'Bogus Window '+(++windowIndex),
//                    iconCls:'bogus',
//                    handler : this.createWindow,
//                    scope: this,
//                    windowId: windowIndex
//                }]
//            }
//        }
//    }
//});


// Array data for the grid
Ext.grid.dummyData = [
    ['3m Co',71.72,0.02,0.03,'9/1 12:00am'],
    ['Alcoa Inc',29.01,0.42,1.47,'9/1 12:00am'],
    ['American Express Company',52.55,0.01,0.02,'9/1 12:00am'],
    ['American International Group, Inc.',64.13,0.31,0.49,'9/1 12:00am'],
    ['AT&T Inc.',31.61,-0.48,-1.54,'9/1 12:00am'],
    ['Caterpillar Inc.',67.27,0.92,1.39,'9/1 12:00am'],
    ['Citigroup, Inc.',49.37,0.02,0.04,'9/1 12:00am'],
    ['Exxon Mobil Corp',68.1,-0.43,-0.64,'9/1 12:00am'],
    ['General Electric Company',34.14,-0.08,-0.23,'9/1 12:00am'],
    ['General Motors Corporation',30.27,1.09,3.74,'9/1 12:00am'],
    ['Hewlett-Packard Co.',36.53,-0.03,-0.08,'9/1 12:00am'],
    ['Honeywell Intl Inc',38.77,0.05,0.13,'9/1 12:00am'],
    ['Intel Corporation',19.88,0.31,1.58,'9/1 12:00am'],
    ['Johnson & Johnson',64.72,0.06,0.09,'9/1 12:00am'],
    ['Merck & Co., Inc.',40.96,0.41,1.01,'9/1 12:00am'],
    ['Microsoft Corporation',25.84,0.14,0.54,'9/1 12:00am'],
    ['The Coca-Cola Company',45.07,0.26,0.58,'9/1 12:00am'],
    ['The Procter & Gamble Company',61.91,0.01,0.02,'9/1 12:00am'],
    ['Wal-Mart Stores, Inc.',45.45,0.73,1.63,'9/1 12:00am'],
    ['Walt Disney Company (The) (Holding Company)',29.89,0.24,0.81,'9/1 12:00am']
];