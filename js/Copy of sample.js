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
	document.getElementById('source').value="";
	document.getElementById('emp_status').innerHTML="";
	document.image.src ="";
	document.image.height = 0;
	document.image.width  = 0;
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
	document.cominfo.otentitle.options.length=0;
	document.cominfo.transport.options.length=0;
	document.cominfo.lunch.options.length=0;
	document.cominfo.attbonus.options.length=0;
	document.getElementById('gsal').value = "";
	document.getElementById('bsal').value = "";
	document.getElementById('hrent').value = "";
	document.getElementById('mallow').value = "";
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
 var ms 	= document.getElementById('ms').value;
 var bgroup = document.getElementById('bgroup').value;
 var padd	= document.getElementById('padd').value;
 var fadd 	= document.getElementById('fadd').value;
 
var img = document.com_per_info.source.value;
document.image.src ="uploads/photo/"+img;
document.image.height = 200;
document.image.width = 150;

 var queryString="empid="+empid+"&name="+name+"&mname="+mname+"&fname="+fname+"&dob="+dob+"&reli="+reli+"&sex="+sex+"&ms="+ms+"&bgroup="+bgroup+"&img="+img+"&padd="+padd+"&fadd="+fadd;
 
 ajaxRequest.open("POST", "index.php/payroll_con/per_info/", true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send(queryString);
 
 
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		//empty();
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
// var dept 	= document.getElementById('dept').value;
 
 if(sectionname=='' || sectionname==null){
 	alert("Please insert Section name");
	return;
 }
 
 var queryString="sectionname="+sectionname;
 
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
 var ms 	= document.getElementById('ms').value;
 var bgroup = document.getElementById('bgroup').value;
 var img 	= document.com_per_info.source.value;
 var padd 	= document.getElementById('padd').value;
 var fadd 	= document.getElementById('fadd').value;
 var queryString="empid="+empid+"&name="+name+"&mname="+mname+"&fname="+fname+"&dob="+dob+"&reli="+reli+"&sex="+sex+"&ms="+ms+"&bgroup="+bgroup+"&img="+img+"&padd="+padd+"&fadd="+fadd;
 
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
 //var dept 	= document.getElementById('dept').value;
 
  if(sectionname=='' || sectionname==null){
 	alert("Please insert Section name");
	return;
 }
 
 var queryString="sectionid="+sectionid+"&sectionname="+sectionname;
 
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


function update_positionname(){
	
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
 var positionid 	= document.getElementById('positionid').value;
 var positionname 	= document.getElementById('positionname').value;
  if(positionname=='' || positionname==null){
 	alert("Please insert Position name");
	return;
 }

 var queryString="positionid="+positionid+"&positionname="+positionname;
 
 ajaxRequest.open("POST", "index.php/payroll_con/update_positionname_co/", true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send(queryString);
 
 
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		if(resp == "Position name does not exist"){
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


function delete_positionname(){
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


 var positionname = document.getElementById('positionname').value;
  if(positionname=='' || positionname==null){
 	alert("Please insert Position name");
	return;
 }

 var queryString="positionname="+positionname;

 ajaxRequest.open("POST", "index.php/payroll_con/delete_positionname_co/", true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send(queryString);
 
 
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		document.getElementById('positionname').value="";
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

function find_att_name(){
	
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

document.Att_bonus.attb_save.disabled = true;

 var check_attn_name = document.getElementById('check_attn_name').value;
 
 var queryString="check_attn_name="+check_attn_name;
 
 ajaxRequest.open("POST", "index.php/payroll_con/search_attenb_name/", true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send(queryString);
 
 
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		//alert(resp);
		if(resp == "Attendance Bonus name does not exist"){
			alert(resp);
			return;
			}
		personalinfo = resp.split("-*-");
		//alert(personalinfo[1]);
		document.getElementById('attn_b_id').value = personalinfo[0];
		document.getElementById('ab_rul_name').value = personalinfo[1];
		document.getElementById('ab_rule').value = personalinfo[2];
	}
   }
}



//----------------------------------------------------------------------------

function enable_attnbname()
{
	document.Att_bonus.attb_save.disabled = false;
	document.Att_bonus.ab_rul_name.focus();
	document.getElementById('ab_rul_name').value="";
	document.getElementById('ab_rule').value="";
	document.getElementById('check_attn_name').value="";
}


function enable_shiftchange()
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

 	document.shift_change.schange_save.disabled = false;
	document.shift_change.sh_nam.focus();
    document.getElementById('sh_nam').value="";
	//document.getElementById('shift_time').value="";
	document.getElementById('sh_name').value="";
 
 //var queryString="desig="+desig+"&dept="+dept;
 ajaxRequest.open("POST", "index.php/payroll_con/shift_change_co/", true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send();
 
  
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
	
		alldata = resp.split("===");
		shift_id = alldata[0].split("=*=");
		sh_type = alldata[1].split("=*=");
	    document.shift_change.shift_time.options.length=0;
        document.shift_change.shift_time.options[0]=new Option("Select","Select", true, false);
		for (i=0; i<shift_id.length; i++){
			document.shift_change.shift_time.options[i+1]=new Option(sh_type[i],shift_id[i], false, false);

	     }
				

		
		
		
		
   // document.getElementById('search_empid').value="";
	//document.cominfo.save.disabled = false;
	//document.cominfo.com_empid.focus();
	}
}


	
	}
//----------------------------------------------------------------------------

function save_atttbname()
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
 
 var ab_rul_name 	= document.getElementById('ab_rul_name').value;
 var ab_rule 	= document.getElementById('ab_rule').value;
 
  if(ab_rul_name=='' || ab_rul_name==null){
 	alert("Please insert Attendance Bonus name");
	return;
 }
 
 if(ab_rule=='' || ab_rule==null){
 	alert("Please insert Absent Rull name");
	return;
 }
 
 
 var queryString="ab_rul_name="+ab_rul_name+"&ab_rule="+ab_rule;
 
 ajaxRequest.open("POST", "index.php/payroll_con/save_atttbname_con/", true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send(queryString);
 
 
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		alert(resp);
		
			
	}
}

	
}
//----------------------------------------------------------------------


function update_attnbname()
{
	

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
 var attn_b_id 	= document.getElementById('attn_b_id').value;
 var ab_rul_name 	= document.getElementById('ab_rul_name').value;
 var ab_rule 	= document.getElementById('ab_rule').value;

  if(ab_rul_name=='' || ab_rul_name==null){
 	alert("Please insert Attendance Bonus name");
	return;
 }
 
  if(ab_rule=='' || ab_rule==null){
 	alert("Please insert Attendance Bonus");
	return;
 }

 var queryString="attn_b_id="+attn_b_id+"&ab_rul_name="+ab_rul_name+"&ab_rule="+ab_rule;
 
 ajaxRequest.open("POST", "index.php/payroll_con/update_attnbname_con/", true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send(queryString);
 
 
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		if(resp == "Attendance Bonus name does not exist"){
			alert(resp);
			return;
			}
		alert(resp);
		
			
	}
}

 

}



//------------------------------------------------------------------

function delete_attnbname()
{
	
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


 var ab_rul_name 	= document.getElementById('ab_rul_name').value;
  if(ab_rul_name=='' || ab_rul_name==null){
 	alert("Please insert Attedance Bonus name");
	return;
 }

 var queryString="ab_rul_name="+ab_rul_name;

 ajaxRequest.open("POST", "index.php/payroll_con/delete_attnbname_co/", true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send(queryString);
 
 
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		document.getElementById('ab_rul_name').value="";
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
		document.getElementById('source').value="";
		if(resp == "Employee ID does not exist"){
			empty();
			alert(resp);
			return;
			}
		personalinfo = resp.split("-*-");
		document.getElementById('empid').value = personalinfo[0];
		document.getElementById('name').value = personalinfo[1];
		document.getElementById('mname').value = personalinfo[2];
		document.getElementById('fname').value = personalinfo[3];
		document.getElementById('dob').value = personalinfo[4];
		document.getElementById('reli').value = personalinfo[5];
		document.getElementById('sex').value = personalinfo[6];
		document.getElementById('ms').value = personalinfo[7];
		document.getElementById('bgroup').value = personalinfo[8];
		var img = personalinfo[9];
		var emp_status = "EMP TYPE : "+personalinfo[10];
		document.getElementById('emp_status').innerHTML = emp_status;
		document.getElementById('padd').value = personalinfo[11];
		document.getElementById('fadd').value = personalinfo[12];
		
		document.image.src ="uploads/photo/"+img;
		document.image.height = 200;
		document.image.width = 150;
	
		
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


function save_positionname(){
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
 
 var positionname 	= document.getElementById('positionname').value;
 
  if(positionname=='' || positionname==null){
 	alert("Please insert Position name");
	return;
 }
 
 var queryString="positionname="+positionname;
 
 ajaxRequest.open("POST", "index.php/payroll_con/save_positionname_co/", true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send(queryString);
 
 
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		alert(resp);
		
			
	}
}
}


function find_position_name(){
	
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

//document.position.save_designationname.disabled = true;

 var positionname 	= document.getElementById('check_position_name').value;
 

 
 var queryString="positionname="+positionname;
 
 ajaxRequest.open("POST", "index.php/payroll_con/search_position_name/", true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send(queryString);
 
 
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		
		if(resp == "Position name does not exist"){
			alert(resp);
			return;
			}
		 personalinfo = resp.split("-*-");
		//alert(personalinfo[1]);
		document.getElementById('positionid').value = personalinfo[0];
		document.getElementById('positionname').value = personalinfo[1];
	
	}
}

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
	var operation = document.getElementById('operation').value;
	var position = document.getElementById('position').value;
	var salg = document.getElementById('salg').value;
	var empstat = document.getElementById('empstat').value;
	var empshift = document.getElementById('empshift').value;
	var gsal = document.getElementById('gsal').value;
	var otentitle = document.getElementById('otentitle').value;
	var transport = document.getElementById('transport').value;
	var lunch = document.getElementById('lunch').value;
	var attbonus = document.getElementById('attbonus').value;
	var ejd = document.getElementById('ejd').value;
	
	if(dept=='Select' || dept==''){
	 alert("Please select Department");
	 return;
	}

 if(sec=='Select' || sec==''){
	 alert("Please select Section");
	 return;
	}

if(line=='Select' || line==''){
	 alert("Please select Line number");
	 return;
	}

if(desig=='Select' || desig==''){
	 alert("Please select Designation");
	 return;
	}

if(operation=='Select' || operation==''){
	 alert("Please select Operation");
	 return;
	}
	
if(position=='Select' || position==''){
	 alert("Please select Position");
	 return;
	}

if(salg=='Select' || salg==''){
	 alert("Please select Salary grade");
	 return;
	}

if(empstat=='Select' || empstat==''){
	 alert("Please select Employee status");
	 return;
	}

if(empshift=='Select' || empshift==''){
	 alert("Please select Employee Shift");
	 return;
	}

if(otentitle=='Select' || otentitle==''){
	 alert("Please select OT Entitle");
	 return;
	}

if(transport=='Select' || transport==''){
	 alert("Please select Transport Entitle");
	 return;
	}

if(lunch=='Select' || lunch==''){
	 alert("Please select Lunch Entitle");
	 return;
	}

if(attbonus=='Select' || attbonus==''){
	 alert("Please select Attendance bonus");
	 return;
	}
	
	
	
	 
	var queryString="com_empid="+com_empid+"&idcard="+idcard+"&dept="+dept+"&sec="+sec+"&line="+line+"&desig="+desig+"&operation="+operation+"&position="+position+"&salg="+salg+"&empstat="+empstat+"&empshift="+empshift+"&gsal="+gsal+"&otentitle="+otentitle+"&transport="+transport+"&lunch="+lunch+"&attbonus="+attbonus+"&ejd="+ejd;
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
	var operation = document.getElementById('operation').value;
	var position = document.getElementById('position').value;
	var salg = document.getElementById('salg').value;
	var empstat = document.getElementById('empstat').value;
	var empshift = document.getElementById('empshift').value;
	var gsal = document.getElementById('gsal').value;
	var otentitle = document.getElementById('otentitle').value;
	var transport = document.getElementById('transport').value;
	var lunch = document.getElementById('lunch').value;
	var attbonus = document.getElementById('attbonus').value;
	var ejd = document.getElementById('ejd').value;
 
 	if(dept=='Select' || dept==''){
	 alert("Please reload and try again!");
	 return;
	}

 if(sec=='Select' || sec==''){
	 alert("Please select Section");
	 return;
	}

if(line=='Select' || line==''){
	 alert("Please select Line number");
	 return;
	}

if(desig=='Select' || desig==''){
	 alert("Please select Designation");
	 return;
	}

if(operation=='Select' || operation==''){
	 alert("Please select Operation");
	 return;
	}
	
if(position=='Select' || position==''){
	 alert("Please select Position");
	 return;
	}

if(salg=='Select' || salg==''){
	 alert("Please select Salary grade");
	 return;
	}

if(empstat=='Select' || empstat==''){
	 alert("Please select Employee status");
	 return;
	}

if(empshift=='Select' || empshift==''){
	 alert("Please select Employee Shift");
	 return;
	}

if(otentitle=='Select' || otentitle==''){
	 alert("Please select OT Entitle");
	 return;
	}

if(transport=='Select' || transport==''){
	 alert("Please select Transport Entitle");
	 return;
	}

if(lunch=='Select' || lunch==''){
	 alert("Please select Lunch Entitle");
	 return;
	}

if(attbonus=='Select' || attbonus==''){
	 alert("Please select Attendance bonus");
	 return;
	}
	
	var queryString="com_empid="+com_empid+"&idcard="+idcard+"&dept="+dept+"&sec="+sec+"&line="+line+"&desig="+desig+"&operation="+operation+"&position="+position+"&salg="+salg+"&empstat="+empstat+"&empshift="+empshift+"&gsal="+gsal+"&otentitle="+otentitle+"&transport="+transport+"&lunch="+lunch+"&attbonus="+attbonus+"&ejd="+ejd;
	//alert(queryString);
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

function basic_sal_cal(){
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
 
	var gsal = document.getElementById('gsal').value;
	var bsal = (gsal * 60) / 100;
	document.getElementById('bsal').value = bsal;
		
	var hrent = (gsal * 30) / 100;
	document.getElementById('hrent').value = hrent;
	
	var mallow = (gsal * 10) / 100;
	document.getElementById('mallow').value = mallow;
}

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
		//alert(alldata);
		companyinfo = alldata[0].split("=*=");
		//alert(companyinfo);
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
		
		
		operation_id_name = alldata[5].split("===");
		operation_id = operation_id_name[0].split("=*=");
		operation_name = operation_id_name[1].split("=*=");
		
		
		position_id_name = alldata[6].split("===");
		position_id = position_id_name[0].split("=*=");
		position_name = position_id_name[1].split("=*=");
		
		
		salg_id_name = alldata[7].split("===");
		salg_id = salg_id_name[0].split("***");
		salg_name = salg_id_name[1].split("***");
		
		empstat_id_name = alldata[8].split("===");
		empstat_id = empstat_id_name[0].split("***");
		empstat_name = empstat_id_name[1].split("***");
		
		empshift_id_name = alldata[9].split("===");
		empshift_id = empshift_id_name[0].split("***");
		empshift_name = empshift_id_name[1].split("***");
		
		attbonus_id_name = alldata[10].split("===");
		attbonus_id = attbonus_id_name[0].split("***");
		attbonus_name = attbonus_id_name[1].split("***");
		//alert(empshift_name);
			
		document.getElementById('com_empid').value = empid;
		
		document.cominfo.idcard.value = companyinfo[1];
		
		document.cominfo.dept.options.length=0;
		for (i=0; i<dept_id.length; i++){
			if( companyinfo[2] == dept_name[i])
			{
				//alert(dept_name[i]);
				document.cominfo.dept.options[i]=new Option(dept_name[i],dept_id[i], false, true);
			}
			else
			document.cominfo.dept.options[i]=new Option(dept_name[i],dept_id[i], false, false);
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
		
		//alert(companyinfo[6]);
		document.cominfo.operation.options.length=0;
		for (i=0; i<operation_id.length; i++){
			if( companyinfo[6] == operation_name[i])
			{
				//alert(dept_name[i]);
				document.cominfo.operation.options[i]=new Option(operation_name[i],operation_id[i], false,true);
			}
			else
			document.cominfo.operation.options[i]=new Option(operation_name[i],operation_id[i], false, false);
			
		}
		
		
		document.cominfo.position.options.length=0;
		for (i=0; i<position_id.length; i++){
			if( companyinfo[7] == position_name[i])
			{
				//alert(dept_name[i]);
				document.cominfo.position.options[i]=new Option(position_name[i],position_id[i], false,true);
			}
			else
			document.cominfo.position.options[i]=new Option(position_name[i],position_id[i], false, false);
			
		}
		
		
			
		document.cominfo.salg.options.length=0;
		for (i=0; i<salg_id.length; i++){
			if( companyinfo[8] == salg_name[i])
			{
				//alert(dept_name[i]);
				document.cominfo.salg.options[i]=new Option(salg_name[i],salg_id[i], false,true);
			}
			else
			document.cominfo.salg.options[i]=new Option(salg_name[i],salg_id[i], false, false);
			
		}
		
		document.cominfo.empstat.options.length=0;
		for (i=0; i<empstat_id.length; i++){
			if( companyinfo[9] == empstat_name[i])
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
			if( companyinfo[10] == empshift_name[i])
			{
				//alert(dept_name[i]);
				document.cominfo.empshift.options[i]=new Option(empshift_name[i],empshift_id[i], false,true);
			}
			else
			document.cominfo.empshift.options[i]=new Option(empshift_name[i],empshift_id[i], false, false);
			
		}
		
		document.getElementById('gsal').value = companyinfo[11];
		var gsal = companyinfo[11];
		var bsal = gsal * 60 / 100;
		document.getElementById('bsal').value = bsal;
		
		var hrent = gsal * 30 / 100;
		document.getElementById('hrent').value = hrent;
		
		var mallow = gsal * 10 / 100;
		document.getElementById('mallow').value = mallow;
		
		var otname=new Array(); 
		var otid=new Array(); 
		otname[0]="Yes";
		otname[1]="No"; 
		otid[0] =0; 
		otid[1] =1;
		document.cominfo.otentitle.options.length=0;
		for (i=0; i<=1; i++){
			
			if( companyinfo[12] == otid[i])
			{
				//alert(dept_name[i]);
				document.cominfo.otentitle.options[i]=new Option(otname[i],otid[i], false,true);
			}
			else
			document.cominfo.otentitle.options[i]=new Option(otname[i],otid[i], false, false);
		}
		
		document.cominfo.transport.options.length=0;
		for (i=0; i<=1; i++){
			
			if( companyinfo[13] == otid[i])
			{
				//alert(dept_name[i]);
				document.cominfo.transport.options[i]=new Option(otname[i],otid[i], false,true);
			}
			else
			document.cominfo.transport.options[i]=new Option(otname[i],otid[i], false, false);
		}
		
		document.cominfo.lunch.options.length=0;
		for (i=0; i<=1; i++){
			
			if( companyinfo[14] == otid[i])
			{
				//alert(dept_name[i]);
				document.cominfo.lunch.options[i]=new Option(otname[i],otid[i], false,true);
			}
			else
			document.cominfo.lunch.options[i]=new Option(otname[i],otid[i], false, false);
		}
		
		document.cominfo.attbonus.options.length=0;
		for (i=0; i<attbonus_id.length; i++){
			if( companyinfo[15] == attbonus_id[i])
			{
				//alert(dept_name[i]);
				document.cominfo.attbonus.options[i]=new Option(attbonus_name[i],attbonus_id[i], false,true);
			}
			else
			document.cominfo.attbonus.options[i]=new Option(attbonus_name[i],attbonus_id[i], false, false);
			
		}
		
		document.getElementById('ejd').value = companyinfo[16];
		
		
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

function com_info_otent(){
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
 
 
		 
 var empshift = document.getElementById('empshift').value;

if(empshift=='Select'){
	 alert("Please select Employee Shift");
	 return;
	}
	
 if(document.cominfo.save.disabled == true){
	 return;
	 }
	 else{
 
  		var otname=new Array(); 
		var otid=new Array(); 
		otname[0]="Yes";
		otname[1]="No"; 
		otid[0] =0; 
		otid[1] =1;
		document.cominfo.otentitle.options.length=0;
		document.cominfo.otentitle.options[0]=new Option("Select","Select", true, false);
		for (i=0; i<=1; i++){
			document.cominfo.otentitle.options[i+1]=new Option(otname[i],otid[i], false, false);
		}

	}
}

function com_info_transport(){
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
 
 
		 
 var otentitle = document.getElementById('otentitle').value;

if(otentitle=='Select'){
	 alert("Please select OT Entitle");
	 return;
	}
	
 if(document.cominfo.save.disabled == true){
	 return;
	 }
	 else{
 
  		var otname=new Array(); 
		var otid=new Array(); 
		otname[0]="Yes";
		otname[1]="No"; 
		otid[0] =0; 
		otid[1] =1;
		document.cominfo.transport.options.length=0;
		document.cominfo.transport.options[0]=new Option("Select","Select", true, false);
		for (i=0; i<=1; i++){
			document.cominfo.transport.options[i+1]=new Option(otname[i],otid[i], false, false);
		}

	}
}

function com_info_lunch(){
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
 
 
		 
 var transport = document.getElementById('transport').value;

if(transport=='Select'){
	 alert("Please select Transport Entitle");
	 return;
	}
	
 if(document.cominfo.save.disabled == true){
	 return;
	 }
	 else{
 
  		var otname=new Array(); 
		var otid=new Array(); 
		otname[0]="Yes";
		otname[1]="No"; 
		otid[0] =0; 
		otid[1] =1;
		document.cominfo.lunch.options.length=0;
		document.cominfo.lunch.options[0]=new Option("Select","Select", true, false);
		for (i=0; i<=1; i++){
			document.cominfo.lunch.options[i+1]=new Option(otname[i],otid[i], false, false);
		}

	}
}

function com_info_attbonus(){
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
 
 
		 
 var lunch = document.getElementById('lunch').value;

if(lunch=='Select'){
	 alert("Please select Lunch Entitle");
	 return;
	}
	
 if(document.cominfo.save.disabled == true){
	 return;
	 }
	 else{
 
 var attbonus = document.getElementById('attbonus').value;

 var queryString="attbonus="+attbonus;
 ajaxRequest.open("POST", "index.php/payroll_con/attbonus_search/", true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send(queryString);
 
  
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		//alert(resp);
		att_idname = resp.split("===");
		ab_id = att_idname[0].split("***");
		ab_rule_name = att_idname[1].split("***");
		
		document.cominfo.attbonus.options.length=0;
		document.cominfo.attbonus.options[0]=new Option("Select","Select", true, false);
		for (i=0; i<ab_id.length; i++){
			document.cominfo.attbonus.options[i+1]=new Option(ab_rule_name[i],ab_id[i], false, false);

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
 
 var attbonus = document.getElementById('attbonus').value;

if(attbonus=='Select'){
	 alert("Please select Attendance bonus");
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
		
		alldata = resp.split("$$$");
		//alert(alldata[0]);
		//alert(alldata[1]);
		//alert(alldata[2]);
		//alert(alldata[3]);
		//alert(alldata[4]);
		//alert(alldata[5]);
		//alert(alldata[6]);
		//alert(alldata[7]);
		//alert(alldata[8]);
		 dept_idname = alldata[0].split("===");
		dept_id = dept_idname[0].split("***");
	     dept_name = dept_idname[1].split("***");
				
		document.cominfo.dept.options.length=0;
		document.cominfo.dept.options[0]=new Option("Select","Select", true, false);
		for (i=0; i<dept_id.length; i++){
			document.cominfo.dept.options[i+1]=new Option(dept_name[i],dept_id[i], false, false);

		}
				
		sec_idname = alldata[1].split("===");
		sec_id = sec_idname[0].split("***");
		sec_name = sec_idname[1].split("***");
	 		
		document.cominfo.sec.options.length=0;
		document.cominfo.sec.options[0]=new Option("Select","Select", true, false); 
		for (i=0; i<sec_id.length; i++){
			//alert(sec_name[i]);
			document.cominfo.sec.options[i+1]=new Option(sec_name[i],sec_id[i], false, false);

		}
		
		
		line_idname = alldata[2].split("===");
		line_id = line_idname[0].split("***");
		line_name = line_idname[1].split("***");
		
		document.cominfo.line.options.length=0;
		document.cominfo.line.options[0]=new Option("Select","Select", true, false); 
		for (i=0; i<line_id.length; i++){
			document.cominfo.line.options[i+1]=new Option(line_name[i],line_id[i], false, false);

		}
		
		
		desig_idname = alldata[3].split("===");
		desig_id = desig_idname[0].split("***");
		desig_name = desig_idname[1].split("***");
		
		document.cominfo.desig.options.length=0;
		document.cominfo.desig.options[0]=new Option("Select","Select", true, false); 
		for (i=0; i<desig_id.length; i++){
			document.cominfo.desig.options[i+1]=new Option(desig_name[i],desig_id[i], false, false);

		}
		
		operation_idname = alldata[4].split("===");
		operation_id = operation_idname[0].split("***");
		operation_name = operation_idname[1].split("***");
		
		document.cominfo.operation.options.length=0;
		document.cominfo.operation.options[0]=new Option("Select","Select", true, false); 
		for (i=0; i<operation_id.length; i++){
			document.cominfo.operation.options[i+1]=new Option(operation_name[i],operation_id[i], false, false);

		}
		
		
		position_idname = alldata[5].split("===");
		position_id = position_idname[0].split("***");
		position_name = position_idname[1].split("***");
		
		document.cominfo.position.options.length=0;
		document.cominfo.position.options[0]=new Option("Select","Select", true, false); 
		for (i=0; i<position_id.length; i++){
			document.cominfo.position.options[i+1]=new Option(position_name[i],position_id[i], false, false);

		}
		
		
		salg_idname = alldata[6].split("===");
		salg_id = salg_idname[0].split("***");
		salg_name = salg_idname[1].split("***");
		
		document.cominfo.salg.options.length=0;
		document.cominfo.salg.options[0]=new Option("Select","Select", true, false); 
		for (i=0; i<salg_id.length; i++){
			document.cominfo.salg.options[i+1]=new Option(salg_name[i],salg_id[i], false, false);

		}
		
		empstat_idname = alldata[7].split("===");
		empstat_id = empstat_idname[0].split("***");
		empstat_name = empstat_idname[1].split("***");
		
		document.cominfo.empstat.options.length=0;
		document.cominfo.empstat.options[0]=new Option("Select","Select", true, false); 
		for (i=0; i<empstat_id.length; i++){
			document.cominfo.empstat.options[i+1]=new Option(empstat_name[i],empstat_id[i], false, false);

		}
		
		
		empshift_idname = alldata[8].split("===");
		empshift_id = empshift_idname[0].split("***");
		empshift_name = empshift_idname[1].split("***");
		
		document.cominfo.empshift.options.length=0;
		document.cominfo.empshift.options[0]=new Option("Select","Select", true, false); 
		for (i=0; i<empshift_id.length; i++){
			document.cominfo.empshift.options[i+1]=new Option(empshift_name[i],empshift_id[i], false, false);

		}
		
		
		var otname=new Array(); 
		var otid=new Array(); 
		otname[0]="Yes";
		otname[1]="No"; 
		otid[0] =0; 
		otid[1] =1;
		
		
		document.cominfo.otentitle.options.length=0;
		document.cominfo.otentitle.options[0]=new Option("Select","Select", true, false);
		for (i=0; i<=1; i++){
			document.cominfo.otentitle.options[i+1]=new Option(otname[i],otid[i], false, false);
		}
		
		document.cominfo.transport.options.length=0;
		document.cominfo.transport.options[0]=new Option("Select","Select", true, false);
		for (i=0; i<=1; i++){
			document.cominfo.transport.options[i+1]=new Option(otname[i],otid[i], false, false);
		}
		
		
		document.cominfo.lunch.options.length=0;
		document.cominfo.lunch.options[0]=new Option("Select","Select", true, false);
		for (i=0; i<=1; i++){
			document.cominfo.lunch.options[i+1]=new Option(otname[i],otid[i], false, false);
		}
		
		att_idname = alldata[9].split("===");
		ab_id = att_idname[0].split("***");
		ab_rule_name = att_idname[1].split("***");
		
		document.cominfo.attbonus.options.length=0;
		document.cominfo.attbonus.options[0]=new Option("Select","Select", true, false);
		for (i=0; i<ab_id.length; i++){
			document.cominfo.attbonus.options[i+1]=new Option(ab_rule_name[i],ab_id[i], false, false);

		}
	document.getElementById('search_empid').value="";
	document.getElementById('com_empid').value = "";
	document.getElementById('idcard').value = "";
	document.getElementById('gsal').value = "";
	document.getElementById('bsal').value = "";
	document.getElementById('hrent').value = "";
	document.getElementById('mallow').value = "";
	document.getElementById('ejd').value = "";
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
 

 

	document.getElementById('sectionname').value="";
	document.getElementById('check_section_name').value="";
		
	document.section.pi_save.disabled = false;
	
	document.section.sectionname.focus();

}

function disable_save(){
	document.cominfo.save.disabled = true;
}







function intime()
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
 var queryString="desig="+desig+"&dept="+dept;
 ajaxRequest.open("POST", "index.php/payroll_con/manual_atten_co/", true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send(queryString);
 
  
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		
		alldata = resp.split("$$$");
		
		dept_idname = alldata[0].split("===");
		dept_id = dept_idname[0].split("***");
	    dept_name = dept_idname[1].split("***");
				
		document.entry.dept.options.length=0;
		document.entry.dept.options[0]=new Option("Select","Select", true, false);
		for (i=0; i<dept_id.length; i++){
			document.entry.dept.options[i+1]=new Option(dept_name[i],dept_id[i], false, false);

		}
				
		sec_idname = alldata[1].split("===");
		sec_id = sec_idname[0].split("***");
		sec_name = sec_idname[1].split("***");
	 		
		document.entry.section.options.length=0;
		document.entry.section.options[0]=new Option("Select","Select", true, false); 
		for (i=0; i<sec_id.length; i++){
			//alert(sec_name[i]);
			document.entry.section.options[i+1]=new Option(sec_name[i],sec_id[i], false, false);

		}
		
		
		line_idname = alldata[2].split("===");
		line_id = line_idname[0].split("***");
		line_name = line_idname[1].split("***");
		
		document.entry.line.options.length=0;
		document.entry.line.options[0]=new Option("Select","Select", true, false); 
		for (i=0; i<line_id.length; i++){
			document.entry.line.options[i+1]=new Option(line_name[i],line_id[i], false, false);

		}
		
		
		desig_idname = alldata[3].split("===");
		desig_id = desig_idname[0].split("***");
		desig_name = desig_idname[1].split("***");
		
		document.entry.desig.options.length=0;
		document.entry.desig.options[0]=new Option("Select","Select", true, false); 
		for (i=0; i<desig_id.length; i++){
			document.entry.desig.options[i+1]=new Option(desig_name[i],desig_id[i], false, false);

		}
	 //document.getElementById('search_empid').value="";
	//document.cominfo.save.disabled = false;
	//document.cominfo.com_empid.focus();
	}
}


	}
	

function attendence_get_data()
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
 //var queryString="desig="+desig+"&dept="+dept;
 ajaxRequest.open("POST", "index.php/payroll_con/manual_atten_co/", true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send();
 
  
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		
		alldata = resp.split("$$$");
		
		dept_idname = alldata[0].split("===");
		dept_id = dept_idname[0].split("***");
	    dept_name = dept_idname[1].split("***");
				
		document.attendance_report.att_dept.options.length=0;
		document.attendance_report.att_dept.options[0]=new Option("Select","Select", true, false);
		for (i=0; i<dept_id.length; i++){
			document.attendance_report.att_dept.options[i+1]=new Option(dept_name[i],dept_id[i], false, false);

		}
				
		sec_idname = alldata[1].split("===");
		sec_id = sec_idname[0].split("***");
		sec_name = sec_idname[1].split("***");
	 		
		document.attendance_report.att_section.options.length=0;
		document.attendance_report.att_section.options[0]=new Option("Select","Select", true, false); 
		for (i=0; i<sec_id.length; i++){
			//alert(sec_name[i]);
			document.attendance_report.att_section.options[i+1]=new Option(sec_name[i],sec_id[i], false, false);

		}
		
		
		line_idname = alldata[2].split("===");
		line_id = line_idname[0].split("***");
		line_name = line_idname[1].split("***");
		
		document.attendance_report.att_line.options.length=0;
		document.attendance_report.att_line.options[0]=new Option("Select","Select", true, false); 
		for (i=0; i<line_id.length; i++){
			document.attendance_report.att_line.options[i+1]=new Option(line_name[i],line_id[i], false, false);

		}
		
		
		desig_idname = alldata[3].split("===");
		desig_id = desig_idname[0].split("***");
		desig_name = desig_idname[1].split("***");
		
		document.attendance_report.att_desig.options.length=0;
		document.attendance_report.att_desig.options[0]=new Option("Select","Select", true, false); 
		for (i=0; i<desig_id.length; i++){
			document.attendance_report.att_desig.options[i+1]=new Option(desig_name[i],desig_id[i], false, false);

		}
	 //document.getElementById('search_empid').value="";
	//document.cominfo.save.disabled = false;
	//document.cominfo.com_empid.focus();
	}
}


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
			new MyDesktop.TabWindowManualEntry(),
			new MyDesktop.TabWindowLeave(),
            //new MyDesktop.AccordionWindow(),
          //  new MyDesktop.BogusMenuModule(),
           // new MyDesktop.BogusModule(),
			//new MyDesktop.SalaryGrade(),
			//new MyDesktop.Section(),
			new MyDesktop.AttReport(),
			new MyDesktop.SalaryReport(),
			new MyDesktop.IDCardApp()
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

function section_manual()
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

 var queryString="desig="+desig+"&dept="+dept;

 ajaxRequest.open("POST", "index.php/payroll_con/section_manual/", true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send(queryString);
 
  
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		//alert(resp);
		sec_idname = resp.split("===");
		sec_id = sec_idname[0].split("=*=");
		sec_name = sec_idname[1].split("=*=");
		
		document.cominfo.section.options.length=0;
		document.cominfo.section.options[0]=new Option("Select","Select", true, false);
		for (i=0; i<sec_id.length; i++){
			document.cominfo.section.options[i+1]=new Option(sec_name[i],sec_id[i], false, false);

		}
	//document.getElementById('search_empid').value="";
	//empty_pi();
	
	//document.entry.save.disabled = false;
	
	//document.entry.com_empid.focus();
	}
}

	

}
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

function daily_absent_report()
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
 
var start= document.getElementById('start').value;
var desig= document.getElementById('att_desig').value;
var line= document.getElementById('att_line').value;
var section= document.getElementById('att_section').value;
var dept= document.getElementById('att_dept').value;

if(start=='' || start=='select')
{
	alert("Please Select Category options");
	return;
}

col_all = start;

if(desig !='Select')
{
	var col_desig = desig;
	var col_all = "undefine";
}
if(line !='Select')
{
	var col_line = line;
	var col_all = "undefine";
}
if(section !='Select')
{
	var col_section = section;
	var col_all = "undefine";
}
if(dept !='Select')
{
	var col_dept = dept;
	var col_all = "undefine";
}

 
date= document.getElementById('p_start_date').value;
month= document.getElementById('report_month').value;
year= document.getElementById('report_year').value;
var status = "A";

hostname = window.location.hostname;
url =  "http://"+hostname+"/payroll/index.php/payroll_con/daily_report/"+year+"/"+month+"/"+date+"/"+status+"/"+col_desig+"/"+col_line+"/"+col_section+"/"+col_dept+"/"+col_all;

myRef = window.open(url,'mywin',"menubar=1,resizable=1,scrollbars=1,width=1500,height=800");
myRef.moveTo(50,50);
}

function daily_present_report()
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
 
var start= document.getElementById('start').value;
var desig= document.getElementById('att_desig').value;
var line= document.getElementById('att_line').value;
var section= document.getElementById('att_section').value;
var dept= document.getElementById('att_dept').value;

if(start=='' || start=='select')
{
	alert("Please Select Category options");
	return;
}

col_all = start;

if(desig !='Select')
{
	var col_desig = desig;
	var col_all = "undefine";
}
if(line !='Select')
{
	var col_line = line;
	var col_all = "undefine";
}
if(section !='Select')
{
	var col_section = section;
	var col_all = "undefine";
}
if(dept !='Select')
{
	var col_dept = dept;
	var col_all = "undefine";
}

 
date= document.getElementById('p_start_date').value;
month= document.getElementById('report_month').value;
year= document.getElementById('report_year').value;
var status = "P";

hostname = window.location.hostname;
url =  "http://"+hostname+"/payroll/index.php/payroll_con/daily_report/"+year+"/"+month+"/"+date+"/"+status+"/"+col_desig+"/"+col_line+"/"+col_section+"/"+col_dept+"/"+col_all;
myRef = window.open(url,'mywin',"menubar=1,resizable=1,scrollbars=1,width=1500,height=800");
myRef.moveTo(50,50);
}



function shift_change_search(){
	
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

document.shift_change.schange_save.disabled = true;

 var sh_name = document.getElementById('sh_name').value;
 
 var queryString="sh_name="+sh_name;
 
 ajaxRequest.open("POST", "index.php/payroll_con/shift_change_search/", true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send(queryString);
 
 
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		//alert(resp);
		if(resp == "Shift Name Does not Exist!"){
			alert(resp);
			return;
			}
		alldata = resp.split("***");
		//alert(alldata[0]);
		shiftinfo = alldata[0].split("=*=");
		//alert(shiftinfo[0]);
		shift_name = shiftinfo[0];
		shift_id = shiftinfo[1];
		
		shifttime_id = alldata[1].split("=*=");
		//alert(shifttime_id);
		shifttime_name = alldata[2].split("=*=");
		//alert(shifttime_name);
		
		document.getElementById('sh_nam').value = shift_name;
		
		document.shift_change.shift_time.options.length=0;
		for (i=0; i<shifttime_id.length; i++){
			if( shift_id == shifttime_id[i])
			{
				//alert(dept_name[i]);
				document.shift_change.shift_time.options[i]=new Option(shifttime_name[i],shifttime_id[i], false, true);
			}
			else
			{
				document.shift_change.shift_time.options[i]=new Option(shifttime_name[i],shifttime_id[i], false, false);
			}
		}
		
		
	}
   }
}



function daily_leave_report()
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
 
var start= document.getElementById('start').value;
var desig= document.getElementById('att_desig').value;
var line= document.getElementById('att_line').value;
var section= document.getElementById('att_section').value;
var dept= document.getElementById('att_dept').value;

if(start=='' || start=='select')
{
	alert("Please Select Category options");
	return;
}

col_all = start;

if(desig !='Select')
{
	var col_desig = desig;
	var col_all = "undefine";
}
if(line !='Select')
{
	var col_line = line;
	var col_all = "undefine";
}
if(section !='Select')
{
	var col_section = section;
	var col_all = "undefine";
}
if(dept !='Select')
{
	var col_dept = dept;
	var col_all = "undefine";
}

 
date= document.getElementById('p_start_date').value;
month= document.getElementById('report_month').value;
year= document.getElementById('report_year').value;
var status = "L";

hostname = window.location.hostname;
url =  "http://"+hostname+"/payroll/index.php/payroll_con/daily_report/"+year+"/"+month+"/"+date+"/"+status+"/"+col_desig+"/"+col_line+"/"+col_section+"/"+col_dept+"/"+col_all;
myRef = window.open(url,'mywin',"menubar=1,resizable=1,scrollbars=1,width=1500,height=800");
myRef.moveTo(50,50);
}

function daily_late_report()
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
 
var start= document.getElementById('start').value;
var desig= document.getElementById('att_desig').value;
var line= document.getElementById('att_line').value;
var section= document.getElementById('att_section').value;
var dept= document.getElementById('att_dept').value;

if(start=='' || start=='select')
{
	alert("Please Select Category options");
	return;
}

col_all = start;

if(desig !='Select')
{
	var col_desig = desig;
	var col_all = "undefine";
}
if(line !='Select')
{
	var col_line = line;
	var col_all = "undefine";
}
if(section !='Select')
{
	var col_section = section;
	var col_all = "undefine";
}
if(dept !='Select')
{
	var col_dept = dept;
	var col_all = "undefine";
}

 
date= document.getElementById('p_start_date').value;
month= document.getElementById('report_month').value;
year= document.getElementById('report_year').value;

hostname = window.location.hostname;
url =  "http://"+hostname+"/payroll/index.php/payroll_con/daily_late_report/"+year+"/"+month+"/"+date+"/"+col_desig+"/"+col_line+"/"+col_section+"/"+col_dept+"/"+col_all;
//url =  "http://"+hostname+"/payroll/index.php/payroll_con/daily_late_report/"+year+"/"+month+"/"+date;
myRef = window.open(url,'mywin',"menubar=1,resizable=1,scrollbars=1,width=1500,height=800");
myRef.moveTo(50,50);
}

function out_punch_miss()
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
 
var start= document.getElementById('start').value;
var desig= document.getElementById('att_desig').value;
var line= document.getElementById('att_line').value;
var section= document.getElementById('att_section').value;
var dept= document.getElementById('att_dept').value;

if(start=='' || start=='select')
{
	alert("Please Select Category options");
	return;
}

col_all = start;

if(desig !='Select')
{
	var col_desig = desig;
	var col_all = "undefine";
}
if(line !='Select')
{
	var col_line = line;
	var col_all = "undefine";
}
if(section !='Select')
{
	var col_section = section;
	var col_all = "undefine";
}
if(dept !='Select')
{
	var col_dept = dept;
	var col_all = "undefine";
}

 
date= document.getElementById('p_start_date').value;
month= document.getElementById('report_month').value;
year= document.getElementById('report_year').value;

hostname = window.location.hostname;
url =  "http://"+hostname+"/payroll/index.php/payroll_con/out_punch_miss/"+year+"/"+month+"/"+date+"/"+col_desig+"/"+col_line+"/"+col_section+"/"+col_dept+"/"+col_all;
//url =  "http://"+hostname+"/payroll/index.php/payroll_con/out_punch_miss/"+year+"/"+month+"/"+date;
myRef = window.open(url,'mywin',"menubar=1,resizable=1,scrollbars=1,width=1500,height=800");
myRef.moveTo(50,50);
}

function manpower_report()
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
 


 
date= document.getElementById('p_start_date').value;
month= document.getElementById('report_month').value;
year= document.getElementById('report_year').value;

hostname = window.location.hostname;
url =  "http://"+hostname+"/payroll/index.php/payroll_con/manpower_report/"+year+"/"+month+"/"+date;
//url =  "http://"+hostname+"/payroll/index.php/payroll_con/out_punch_miss/"+year+"/"+month+"/"+date;
myRef = window.open(url,'mywin',"menubar=1,resizable=1,scrollbars=1,width=1500,height=800");
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

myRef = window.open(url,'mywin',"menubar=1,resizable=1,scrollbars=1,width=1500,height=800");
myRef.moveTo(50,50);
}

function salary_summary_report()
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


hostname = window.location.hostname;
url =  "http://"+hostname+"/payroll/index.php/payroll_con/salary_summary_report";

myRef = window.open(url,'mywin',"menubar=1,resizable=1,scrollbars=1,width=1500,height=800");
myRef.moveTo(50,50);
}

function id_card()
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

start_id = document.getElementById('start_id').value;
end_id   = document.getElementById('end_id').value;
	
	if(start_id==''){
	 alert("Please select Emp ID range");
	 return;
	}
	if(end_id==''){
	 alert("Please select Emp ID range");
	 return;
	}

hostname = window.location.hostname;
url =  "http://"+hostname+"/payroll/index.php/payroll_con/id_card/"+start_id+"/"+end_id;

myRef = window.open(url,'mywin',"menubar=1,resizable=1,scrollbars=1,width=1500,height=800");
myRef.moveTo(50,50);
}

function appointment_letter()
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

start_id = document.getElementById('start_id').value;
end_id   = document.getElementById('end_id').value;
	
	if(start_id==''){
	 alert("Please select Emp ID range");
	 return;
	}
	if(end_id==''){
	 alert("Please select Emp ID range");
	 return;
	}

hostname = window.location.hostname;
url =  "http://"+hostname+"/payroll/index.php/payroll_con/appointment_letter/"+start_id+"/"+end_id;

myRef = window.open(url,'mywin',"menubar=1,resizable=1,scrollbars=1,width=900,height=800");
myRef.moveTo(300,50);
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

function save_leave()
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
 
 var empid_leave 	= document.getElementById('empid_leave').value;
 var start_leave_date 	= document.getElementById('start_leave_date').value;
 var end_leave_date 	= document.getElementById('end_leave_date').value;
 var leave_type 	= document.getElementById('leave_type').value;
// var dept 	= document.getElementById('dept').value;
 
 if(empid_leave=='' || empid_leave==null){
 	alert("Please insert Emp ID");
	return;
 }
 
  if(start_leave_date=='' || start_leave_date==null){
 	alert("Please insert Strat Date");
	return;
 }

// alert(start_leave_date);
var queryString="empid_leave="+empid_leave+"&start_leave_date="+start_leave_date+"&end_leave_date="+end_leave_date+"&leave_type="+leave_type;

//alert(empid_leave);
 
 ajaxRequest.open("POST", "index.php/payroll_con/save_leave_co/", true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send(queryString);
 
 
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
			
		alert(resp);
		
		//document.getElementById('c_leave').value = resp[0];
	//	var total=document.getElementById('c_leave').value ;
		//var balance=total-1 ;
	//	document.getElementById('c_leave_balance').value = balance ;
		//document.getElementById('c_leave_balance').value = balance[0];
		
			
	}
}

}



function enable_leve()
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
 

 

	document.getElementById('empid_leave').value="";
	document.getElementById('start_leave_date').value="";
	document.getElementById('end_leave_date').value="";
	document.getElementById('emp_id').value="";
	document.getElementById('find_year').value="";
	document.leave_holy_days.leave_save.disabled = false;
	document.leave_holy_days.empid_leave.focus();


}



function search_year()
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
 
 var empid 	= document.getElementById('emp_id').value;
 var year 	= document.getElementById('find_year').value;
 //document.eduskill.edu_save.disabled = true;


// var queryString="edu_empid="+empid;
 var queryString="empid="+empid+"&year="+year; 
 ajaxRequest.open("POST", "index.php/payroll_con/leave_transaction_co/", true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send(queryString);
 
 
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		//alert(resp);
		//if(resp == "Employee does not exist"){
			
			//empty_edu_skill();
			//return;
		//	}
		
		personalinfo = resp.split("-*-");
		//alert(personalinfo);
		//alert(personalinfo[1]);
		
		 var total_casual=document.getElementById('c_leave').value = personalinfo[0];
		 var balance_casual=10-total_casual;
		 document.getElementById('c_leave_balance').value = balance_casual;
		 
		 var total_sick=document.getElementById('s_leave').value = personalinfo[1];
		 var balance_sick=14-total_sick;
		 document.getElementById('s_leave_balance').value = balance_sick;
		//document.getElementById('emp_last_dg').value = personalinfo[1];
		//document.getElementById('pass_year').value = personalinfo[2];
		//document.getElementById('edu_insti').value = personalinfo[3];
		//document.getElementById('skill_dept').value = personalinfo[4];
		//document.getElementById('skill_year').value = personalinfo[5];
		//document.getElementById('skill_com_na').value = personalinfo[6];
		//ajaxpeakdata();
		
	}
}


//ajaxcominfo();

}


function manual_entry_save()
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
	//var in_time =entryname.in_time.value;
	//var in_time = document.entryname.elements.in_time.value;
//	var in_time = document.getElementById('in_time').value;
//	var in_time_in = document.getElementById('in_time_out').value;
//	

	var empid = document.getElementById('empid').value;
	var time = document.getElementById('time').value;
	var startdate = document.getElementById('startdate').value;
	var enddate = document.getElementById('enddate').value;
	var dept = document.getElementById('dept').value;
	var section = document.getElementById('section').value;
	var line = document.getElementById('line').value;
	var desig = document.getElementById('desig').value;
	
	if(startdate =='')
	{
		alert("Start date can not be empty!");
		return
	}
	if(time =='')
	{
		alert("Time can not be empty!");
		return
	}
	if(empid !='')
	{
		var column="emp_id";
		var column_value=empid;
	}
	else
	{
		if (dept !="Select")
		{
			var column="emp_dept_id";
			var column_value=dept;
		}
		
		else if(section !="Select")
		{
			var column="emp_sec_id";
			var column_value=section;
		}
		else if(line !="Select")
		{
			var column="emp_line_id" ;
			var column_value=line;
		}
		else if(desig !="Select")
		{
			var column="emp_desi_id" ;
			var column_value=desig;
		}
	}

	
	var queryString="column="+column+"&column_value="+column_value+"&startdate="+startdate+"&enddate="+enddate+"&time="+time+"&empid="+empid;
   
    ajaxRequest.open("POST", "index.php/payroll_con/manual_att_entry_co/", true);
 	ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 	ajaxRequest.send(queryString);
 
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		alert(resp);
	}
}




}



function find_operation_name(){
	
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

//document.operation.operation_save.disabled = true;

 var operationname 	= document.getElementById('check_operation_name').value;
 
 
 
 var queryString="operationname="+operationname;
 
 ajaxRequest.open("POST", "index.php/payroll_con/search_operation_name/", true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send(queryString);
 
 
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		
		if(resp == "operation name does not exist"){
			alert(resp);
			return;
			}
		personalinfo = resp.split("-*-");
		//alert(personalinfo[1]);
		document.getElementById('operationid').value = personalinfo[0];
		document.getElementById('operationname').value = personalinfo[1];
		
		
	
		
		//ajaxpeakdata();
		
	}
}



//ajaxcominfo();
}





function enable_operationname(){
	
	document.operation.operationname_save.disabled = false;
	document.operation.operationname.focus();
	document.getElementById('operationname').value="";
	document.getElementById('check_operation_name').value="";
	}

function enable_positionname(){
	
	document.position.designation_save.disabled = false;
	document.position.positionname.focus();
	document.getElementById('positionname').value="";
	document.getElementById('check_position_name').value="";
	}




function save_operationname(){
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
 
 var operationname 	= document.getElementById('operationname').value;
 
  if(operationname=='' || operationname==null){
 	alert("Please insert operation name");
	return;
 }
 
 var queryString="operationname="+operationname;
 
 ajaxRequest.open("POST", "index.php/payroll_con/save_operationname_co/", true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send(queryString);
 
 
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		alert(resp);
		
			
	}
}
}

function update_shift_time()
{
	

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
 var shift_name 	= document.getElementById('sh_nam').value;
 var shift_id 	= document.getElementById('shift_time').value;
 

  if(shift_name=='' || shift_name==null){
 	alert("Please insert Shift name name");
	return;
 }
 
  
 var queryString="shift_name="+shift_name+"&shift_id="+shift_id;
 
 ajaxRequest.open("POST", "index.php/payroll_con/update_shift_time/", true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send(queryString);
 
 
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		if(resp == "Shift name does not exist"){
			alert(resp);
			return;
			}
		alert(resp);
		
			
	}
}

 

}




function update_operationname(){
	
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
 var operationid 	= document.getElementById('operationid').value;
 var operationname 	= document.getElementById('operationname').value;
  if(operationname=='' || operationname==null){
 	alert("Please insert operation name");
	return;
 }

 var queryString="operationid="+operationid+"&operationname="+operationname;
 
 ajaxRequest.open("POST", "index.php/payroll_con/update_operationname_co/", true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send(queryString);
 
 
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		if(resp == "operation name does not exist"){
			alert(resp);
			return;
			}
		alert(resp);
		
			
	}
}

 
}

function delete_operationname(){
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


 var operationname = document.getElementById('operationname').value;
  if(operationname=='' || operationname==null){
 	alert("Please insert operation name");
	return;
 }

 var queryString="operationname="+operationname;

 ajaxRequest.open("POST", "index.php/payroll_con/delete_operationname_co/", true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send(queryString);
 
 
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		document.getElementById('operationname').value="";
		alert(resp);
			
	}
}
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

function save_schange()
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
 
 var sh_nam = document.getElementById("sh_nam").value;
 if(sh_nam=='' || sh_nam==null){
 	alert("Please insert shift name ");
	return ;
 }
 
  var shift_time = document.getElementById("shift_time").value;
  if(shift_time=='Select'){
 	alert("Please insert shift time ");
	return ;
 }
	
	var sh_nam = document.getElementById('sh_nam').value;
	var shift_time = document.getElementById('shift_time').value;
		 
	var queryString="sh_nam="+sh_nam+"&shift_time="+shift_time;
	//alert(desig);
	ajaxRequest.open("POST", "index.php/payroll_con/save_schange_co/", true);
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
                width:615,
                height:550,
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
							html : "<br/><form  name='com_per_info' ><div ><div style='width:450;float:left'><table width='100%' border='0' align='center' style='padding:10px'><tr><td width='30%'>Emp Id</td><td><input type='text' size='40px' name='nempid' id='empid' ></td></tr><tr><td width='20%'>Full Name</td><td><input type='text' size='40px' id='name'></td></tr><tr><td width='20%'>Mother's Name</td><td><input type='text' size='40px' id='mname'></td></tr><tr><td width='20%'>Father's Name</td><td><input type='text' size='40px' id='fname'></td></tr><tr><td width='20%'>Date Of Birth</td><td><input type='text' size='40px' id='dob' ></td></tr><tr><td width='20%'>Present Add.</td><td><input type='text' size='40px' id='padd' name='padd' ></td></tr><tr><td width='20%'>Permanent Add.</td><td><input type='text' size='40px' id='fadd' name='fadd' ></td></tr><tr><td>Photo</td><td><input type='file' value='Image Source' name='source' id='source'></td></tr><tr><td width='20%'>Religion</td><td><select id='reli'><option value='1'>Islam</option><option value='2'>Hindu</option><option value='3'>Christian</option><option value='4'>Buddish</option></select></td></tr><tr><td width='20%'>Sex</td><td><select id='sex'><option value='1'>Male</option><option value='2'>Female</option></select></td></tr><tr><td width='20%'>Marital Status</td><td><select id='ms'><option value='1'>Unmarried</option><option value='2'>Married</option></select></td></tr><tr><td width='20%'>Blood Group</td><td><select id='bgroup'><option value='0'>None</option><option value='1'>A+</option><option value='2'>A-</option><option value='3'>B+</option><option value='4'>B-</option><option value='5'>AB+</option><option value='6'>AB-</option><option value='7'>O+</option><option value='8'>O-</option></select></td></tr></table><br/><table><tr><td align='right' width='15%'>Find ID:</td><td><input style='background-color:yellow;' type='text' size='15px' name='pi_empid' id='pi_empid' onchange='ajaxSearch()'>&nbsp;<input type='button' name='add' onclick='enable_pi_save()' value='NEW'/>&nbsp;<input type='button' name='pi_save' disabled='disabled' onclick='ajaxInsert()' value='SAVE'/>&nbsp;<input type='button' onclick='ajaxupdate()' value='EDIT'/>&nbsp;<input type='button' onclick='ajaxDelete()' value='DELETE'/></td></tr><tr></table></div><div style='width:150; height:200px; float:left; '><img id='img'  name='image' alt=''><div id='emp_status' style='font-size:14px;color:blue;'></div></div></div></form>",
                            border:false
                        },{
                            title: 'Company Info',
                            header:false,
                            html : "<br/><form name='cominfo'><table width='100%' border='0' align='center' style='padding:10px'><tr><td width='30%'>Emp ID</td><td><input type='text' size='40px' id='com_empid' name='com_empid'></td></tr><tr><td width='20%'>Punch Card No.</td><td><input type='text' size='40px' id='idcard'></td></tr><tr><td width='20%'>Department</td><td><select id='dept' name='sele'><option value=''></option></select></td></tr><tr><td width='20%'>Section</td><td><select id='sec' name='section' ><option value=''></option></select></td></tr><tr><td width='20%'>Line Number</td><td><select id='line' name='line' ><option value=''></option></select></td></tr><tr><td width='20%'>Designation</td><td><select id='desig' name='desig' onchange='com_info_grade()'><option value=''></option></select></td></tr><tr><td width='20%'>Operation</td><td><select id='operation' name='operation'><option value=''></option></select></td></tr><tr><td width='20%'>Position</td><td><select id='position' name='position' ><option value=''></option></select></td></tr><tr><td width='20%'>Salary Grade</td><td><select id='salg' name='salg' onchange='com_info_empstat()'><option value=''></option></select></td></tr><tr><td width='20%'>Emp Status</td><td><select id='empstat' name='empstat' onchange='com_info_shift()'><option value=''></option></select></td></tr><tr><td width='20%'>Emp Shift</td><td><select id='empshift' name='empshift' onchange='com_info_otent()'><option value=''></option></select></td></tr><tr><td width='20%'>OT Entitle</td><td><select id='otentitle' name='otentitle' onchange='com_info_transport()'><option value=''></option></select></td></tr><tr><td width='20%'>Transport Entitle</td><td><select id='transport' name='transport' onchange='com_info_lunch()'><option value=''></option></select></td></tr><tr><td width='20%'>Lunch Entitle</td><td><select id='lunch' name='lunch' onchange='com_info_attbonus()'><option value=''></option></select></td></tr><tr><td width='20%'>Att. Bonus</td><td><select id='attbonus' name='attbonus' onchange='com_info_alert()'><option value=''></option></select></td></tr><tr style='background-color:#CCCCCC'><td width='20%'>Salary</td><td><table><tr><td>Gross</td><td><input style='width:120px;' type='text' size='40px' id='gsal' onchange='basic_sal_cal()'></td><td>Basic</td><td><input style='width:120px;' type='text' size='40px' id='bsal' disabled='disabled'></td></tr><tr><td>House</td><td><input style='width:120px;' type='text' size='40px' id='hrent' disabled='disabled'></td><td>Medical</td><td><input style='width:120px;' type='text' size='40px' id='mallow' disabled='disabled'></td></tr></table></td></tr><tr><td width='20%'>Emp join date</td><td><input style='width:120px;' type='text' size='40px' id='ejd'></td></tr><br/><tr><td align='center' colspan='2'>Find ID :<input style='background-color:yellow;' type='text' size='15px' id='search_empid' name='search_empid' onchange='com_info_Search()'>&nbsp;<input type='button' name='add' onclick='enable_save()' value='NEW'/>&nbsp;<input type='button' name='save' disabled='disabled' onclick='com_info_insert()' value='SAVE'/>&nbsp;<input type='button' onclick='com_info_edit()' value='EDIT'/></td></tr></table></form>",
                            border:false
                        },{
                            title: 'Education & Skill',
                            header:false,
                            html : "<br/><div style='margin:50px auto; width:400px; height: auto;'><form  name='eduskill' ><table width='100%' border='0' align='center'><tr><td width='30%'>Emp ID</td><td><input type='text' size='30px' id='edu_empid' ></td></tr><tr><td width='30%'>Emp Last Dgree</td><td><input type='text' size='30px' id='emp_last_dg'></td></tr><tr><td width='20%'>Passing year</td><td><input type='text' size='30px' id='pass_year'></td></tr><tr><td width='30%'>Passing Institute</td><td><input type='text' size='30px' id='edu_insti'></td></tr><tr><td width='20%'>Emp skill dept.</td><td><input type='text' size='30px' id='skill_dept'></td></tr><tr><td width='30%'>Year of Skill</td><td><input type='text' size='30px' id='skill_year'></td></tr><tr><td width='20%'>Company Name</td><td><input type='text' size='30px' id='skill_com_na'></td></tr><br/><tr><td align='right' width='20%'>Find ID :</td><td><input style='background-color:yellow;' type='text' size='15px' id='edu_skill_empid' onchange='ajaxSearch_edu_skill()' ><input type='button' name='add' onclick='edu_enable_save()' value='NEW'/><input type='button' name='edu_save' disabled='disabled' onclick='ajax_edu_skill_Insert()' value='SAVE'/><input type='button' onclick='ajaxu_edu_update()' value='EDIT'/></td></tr></table></form></div>",
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
                width:730,
                height:300,
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
							html : "<br/><form  name='department' ><table width='100%' border='0' align='center' style='padding:10px'><tr><td><input type='hidden' size='40px' name='deptid' id='deptid' ></td></tr><tr><td width='30%'>Department Name</td><td><input type='text' size='40px' id='deptname'></td></tr><br/><tr><td align='right' width='20%'>Find Dept. Name:</td><td> <input style='background-color:yellow;' type='text' size='15px' name='check_dept_name' id='check_dept_name' onchange='find_dept_name()'>&nbsp;<input type='button' name='add' onclick='enable_deptname()' value='NEW'/>&nbsp;<input type='button' name='pi_save' disabled='disabled' onclick='save_deptname()' value='SAVE'/>&nbsp;<input type='button' onclick='update_deptname()' value='EDIT'/>&nbsp;<input type='button' onclick='delete_deptname()' value='DELETE'/></td></tr><tr></table></form>",
                            border:false
                        },{
                            title: 'Section',
                            header:false,
                            html : "<br/><form  name='section' ><table width='100%' border='0' align='center' style='padding:10px'><tr><td><input type='hidden' size='40px' name='sectionid' id='sectionid' ></td></tr><tr><td width='30%'>Section Name</td><td><input type='text' size='40px' id='sectionname' name='sectionname'></td></tr><br/><tr><td align='right' width='20%'>Find Section Name:</td><td> <input style='background-color:yellow;' type='text' size='15px' name='check_section_name' id='check_section_name' onchange='find_section_name()'>&nbsp;<input type='button' name='add' onclick='enable_sectionname()' value='NEW'/>&nbsp;<input type='button' name='pi_save' disabled='disabled' onclick='save_sectionname()' value='SAVE'/>&nbsp;<input type='button' onclick='update_sectionname()' value='EDIT'/>&nbsp;<input type='button' onclick='delete_sectionname()' value='DELETE'/></td></tr><tr></table></form>",
                            border:false
                        },{
                            title: 'Line Number',
                            header:false,
                            html : "<br/><form  name='line_form' ><table width='100%' border='0' align='center' style='padding:10px'><tr><td><input type='hidden' size='40px' name='lineid' id='lineid' ></td></tr><tr><td width='30%'>Line Name</td><td><input type='text' size='40px' id='linename'></td></tr><br/><tr><td align='right' width='20%'>Find Line Name:</td><td> <input style='background-color:yellow;' type='text' size='15px' name='check_line_name' id='check_line_name' onchange='find_line_name()'>&nbsp;<input type='button' name='add' onclick='enable_linename()' value='NEW'/>&nbsp;<input type='button' name='line_save' disabled='disabled' onclick='save_linename()' value='SAVE'/>&nbsp;<input type='button' onclick='update_linename()' value='EDIT'/>&nbsp;<input type='button' onclick='delete_linename()' value='DELETE'/></td></tr><tr></table></form>",
                            border:false
                        },{
                            title: 'Designation',
                            header:false,
                            html : "<br/><form  name='designation' ><table width='100%' border='0' align='center' style='padding:10px'><tr><td><input type='hidden' size='40px' name='designationid' id='designationid' ></td></tr><tr><td width='30%'>Designation Name</td><td><input type='text' size='40px' id='designationname'></td></tr><br/><tr><td align='right' width='20%'>Find Desig. Name:</td><td> <input style='background-color:yellow;' type='text' size='15px' name='check_designation_name' id='check_designation_name' onchange='find_designation_name()'>&nbsp;<input type='button' name='add' onclick='enable_designationname()' value='NEW'/>&nbsp;<input type='button' name='designation_save' disabled='disabled' onclick='save_designationname()' value='SAVE'/>&nbsp;<input type='button' onclick='update_designationname()' value='EDIT'/>&nbsp;<input type='button' onclick='delete_designationname()' value='DELETE'/></td></tr><tr></table></form>",
                            border:false
                        },{
                            title: 'Operation',
                            header:false,
                            html : "<br/><form  name='operation' ><table width='100%' border='0' align='center' style='padding:10px'><tr><td><input type='hidden' size='40px' name='operationid' id='operationid' ></td></tr><tr><td width='30%'>operation Name</td><td><input type='text' size='40px' id='operationname'></td></tr><br/><tr><td align='right' width='20%'>Find operation Name:</td><td> <input style='background-color:yellow;' type='text' size='15px' name='check_operation_name' id='check_operation_name' onchange='find_operation_name()'>&nbsp;<input type='button' name='add' onclick='enable_operationname()' value='NEW'/>&nbsp;<input type='button' name='operationname_save' disabled='disabled' onclick='save_operationname()' value='SAVE'/>&nbsp;<input type='button' onclick='update_operationname()' value='EDIT'/>&nbsp;<input type='button' onclick='delete_operationname()' value='DELETE'/></td></tr><tr></table></form>",
                            border:false
                        },{
                            title: 'Position',
                            header:false,
                            html : "<br/><form  name='position' ><table width='100%' border='0' align='center' style='padding:10px'><tr><td><input type='hidden' size='40px' name='positionid' id='positionid' ></td></tr><tr><td width='30%'>Position Name</td><td><input type='text' size='40px' id='positionname'></td></tr><br/><tr><td align='right' width='20%'>Find position Name:</td><td> <input style='background-color:yellow;' type='text' size='15px' name='check_position_name' id='check_position_name' onchange='find_position_name()'>&nbsp;<input type='button' name='add' onclick='enable_positionname()' value='NEW'/>&nbsp;<input type='button' name='designation_save' disabled='disabled' onclick='save_positionname()' value='SAVE'/>&nbsp;<input type='button' onclick='update_positionname()' value='EDIT'/>&nbsp;<input type='button' onclick='delete_positionname()' value='DELETE'/></td></tr><tr></table></form>",
                            border:false
                        },{
                            title: 'Attendance Bonus',
                            header:false,
                            html : "<br/><form  name='Att_bonus' ><table width='100%' border='0' align='center' style='padding:10px'><tr><td><input type='hidden' size='40px' name='attn_b_id' id='attn_b_id' ></td></tr><tr><td width='20%'>Rules Name</td><td><input type='text' size='40px' id='ab_rul_name'></td></tr><tr><td width='20%'>Rule</td><td><input type='text' size='40px' id='ab_rule'></td></tr><br/><tr><td align='right' width='20%'>Find Rules Name:</td><td> <input style='background-color:yellow;' type='text' size='15px' name='check_attn_name' id='check_attn_name' onchange='find_att_name()'>&nbsp;<input type='button' name='add' onclick='enable_attnbname()' value='NEW'/>&nbsp;<input type='button' name='attb_save' disabled='disabled' onclick='save_atttbname()' value='SAVE'/>&nbsp;<input type='button' onclick='update_attnbname()' value='EDIT'/>&nbsp;<input type='button' onclick='delete_attnbname()' value='DELETE'/></td></tr><tr></table></form>",
                            border:false
                        },{
                            title: 'Salary Grade',
                            header:false,
                            html : "<br/><br/><br/><form  name='myForm_grade'><table width='90%' border='0' align='center'><tr><td width='40%'>Grade Name</td><td><input type='text' size='40px' id='gr_name' onchange='ajaxSearch_grade()' ></td></tr><tr><td width='40%'>Basic Salary(Start)</td><td><input type='text' size='40px' id='gr_str_basic'></td></tr><tr><td width='20%'>Basic Salary (End)</td><td><input type='text' size='40px' id='gr_end_basic'></td></tr><tr><td width='20%'>Grade Incriment (1st)</td><td><input type='text' size='40px' id='gr_incr1'></td></tr><tr><td width='20%'>Grade phase (1st)</td><td><input type='text' size='40px' id='gr_1st_phase'></td></tr><tr><td width='20%'>Grade Incriment (2nd)</td><td><input type='text' size='40px' id='gr_incr2'></td></tr><tr><td width='20%'>Grade Phase(2nd)</td><td><input type='text' size='40px' id='gr_2nd_phase'></td></tr><br/><tr><td align='center' colspan='2'><input type='button' onclick='ajax_grade_Insert()' value='INSERT'/><input type='button' onclick='ajax_grade_update()' value='UPDATE'/><input type='button' onclick='ajax_grade_Delete()' value='DELETE'/</td></tr></table></form>",
                            border:false
                        },{
                            title: 'Shift Change',
                            header:false,
                            html : "<br/><form  name='shift_change' ><table width='100%' border='0' align='center' style='padding:10px'><tr><td width='20%'>Shift Name</td><td><input type='text' size='40px' id='sh_nam'></td></tr><tr><td width='20%'>Shift Time</td><td><select id='shift_time' name='shift_time'><option valu=''></option></select></td></tr><br/><tr><td align='right' width='20%'>Find Shift Name:</td><td> <input style='background-color:yellow;' type='text' size='15px' name='sh_name' id='sh_name' onchange='shift_change_search()'>&nbsp;<input type='button' name='add' onclick='enable_shiftchange()' value='NEW'/>&nbsp;<input type='button' name='schange_save' disabled='disabled' onclick='save_schange()' value='SAVE'/>&nbsp;<input type='button' onclick='update_shift_time()' value='EDIT'/>&nbsp;</td></tr><tr></table></form>",
                            border:false
                        }]
                    })
            });
        }
        win.show();
    }
});



MyDesktop.TabWindowManualEntry = Ext.extend(Ext.app.Module, {
    id:'ManualEntry',
    init : function(){
        this.launcher = {
            text: 'Manual Entry',
            iconCls:'tabs',
            handler : this.createWindow,
            scope: this
        }
    },

    createWindow : function(){
        var desktop = this.app.getDesktop();
        var win = desktop.getWindow('ManualEntry');
        if(!win){
            win = desktop.createWindow({
                id: 'ManualEntry',
                title:'Manual Entry ',
                width:540,
                height:450,
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
                            title: 'Manual Entry Transaction',
                            header:false,
							html : "<br/><form name='entry'><table width='100%' border='0' cellpadding='5' cellspacing='0'><tr><th colspan='2' scope='col' align='center'><strong>Manual Attendence Entry</strong></th></tr><tr><td colspan='3'><hr></td></tr><tr><td width='50%'><div style='width:100%; height:auto; overflow:hidden; margin:0 auto; border-right:#000 1px solid;'><table width='300' border='0' cellpadding='10'cellspacing='5'><tr><td>In Time </td><td>:</td><td><input type='radio' name='in_time' id='in_time' value='in' size='16' onclick='intime()' ></td></tr><tr><td>Out Time </td><td>:</td><td><input type='radio' name='in_time' id='in_time' size='16' onclick='intime()'></td></tr><tr><td width='42%'>Employee ID</td><td width='5%'>:</td><td width='53%'><input type='text' name='empid' id='empid' size='16'></td></tr><tr><td>Time </td><td>:</td><td><input type='text' name='time' id='time' size='16'></td></tr><tr><td>Start Date </td><td>:</td><td><input type='text' name='startdate' id='startdate' size='16'></td></tr><tr><td>End Date </td><td>:</td><td><input type='text' name='enddate' id='enddate' size='16'></td></tr><tr><td>Department </td><td>:</td><td><select id='dept' name='dept' onchange='manual_entry_dept()'><option value=''></option></select></td></tr><tr><td>Section </td><td>:</td><td><select id='section' name='section' onchange='manual_entry_section()'><option value=''></option></select></td></tr><tr><td>Line No </td><td>:</td><td><select id='line' name='line' onchange='manual_entry_desig()'><option value=''></option></select></td> </tr><tr><td>Designation </td><td>:</td><td><select id='desig' name='desig' onchange='manual_entry_desig()'><option value=''></option></select></td></tr><tr><td></td><td></td><td><input type='button' name='btn' id='btn' onclick='manual_entry_save()' value='Save' size='15'></td></tr></table></div></td><td width='50%'><div style='width:100%; height:200px; margin:0 auto;'></div></td></tr></table></form>Note : Date Format [YYYY-MM-DD] Time format [HH:MM:SS]",
                            border:false
                        },{
                            title: 'Blanck',
                            header:false,
                            html : "<br/>Coming sooon",
                            border:false
                        }]
                    })
            });
        }
        win.show();
    }
});



MyDesktop.TabWindowLeave = Ext.extend(Ext.app.Module, {
    id:'leave',
    init : function(){
        this.launcher = {
            text: 'Leave Transaction',
            iconCls:'tabs',
            handler : this.createWindow,
            scope: this
        }
    },

    createWindow : function(){
        var desktop = this.app.getDesktop();
        var win = desktop.getWindow('leave');
        if(!win){
            win = desktop.createWindow({
                id: 'leave',
                title:'Leave Transaction',
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
                            title: 'Emp Leave Transaction',
                            header:false,
							html : "<br/><form  name='leave_holy_days' ><table width='70%' border='0' align='center' style='padding:10px'><tr><td width='25%'>&nbsp; </td><td width='25%'>Employee ID</td><td colspan='2'><input name='empid_leave' type='text' id='empid_leave' size='25px' /></td></tr><tr><td width='17%'>&nbsp; </td><td width='31%'>Start Date </td><td colspan='2'><input name='start_leave_date' type='text' id='start_leave_date' size='25px' /></td></tr><tr><td width='17%'>&nbsp; </td><td width='31%'>End Date</td><td colspan='2'><input name='end_leave_date' type='text' id='end_leave_date' size='25px' /></td></tr><tr><td width='17%'>&nbsp;</td><td width='31%'>Leave Type </td><td colspan='2'><select name='select' id='leave_type'><option value='cl'>Casual</option><option value='sl'>Sick</option><option value='el'>Earn</option></select></td></tr></table>							<table width='100%' border='0' align='center' style='padding:10px'><tr><td  width='30%'>Casual  Leave Entitle</td><td width='20%'><input name='c_leave' type='text' id='c_leave' size='10PX' /></td><td width='20%'> Balance </td><td width='20%'><input name='c_leave_balance' type='text' id='c_leave_balance' size='10PX' /></td></tr><tr><td>Sick Leave Entitle </td><td><input name='s_leave' type='text' id='s_leave' size='10PX' /></td><td> Balance </td><td><input name='s_leave_balance' type='text' id='s_leave_balance' size='10PX' /></td></tr><tr><td>Earn Leave Entitle </td><td><input name='e_leave' type='text' id='e_leave' size='10PX' /></td><td> Balance </td><td><input name='e_leave_balance' type='text' id='e_leave_balance' size='10PX' /></td></tr><div></div><br/><tr><td colspan='4' align='center'>Emp ID:<input style='background-color:yellow;' type='text' size='15px' name='emp_id' id='emp_id' >Year :<input style='background-color:yellow;' type='text' size='5px' name='find_year' id='find_year' onchange='search_year()'>&nbsp;<input type='button' name='add' onclick='enable_leve()' value='NEW'/>&nbsp;<input type='button' name='leave_save' disabled='disabled' onclick='save_leave()' value='SAVE'/>&nbsp;</td></tr></table></form>",
                            border:false
                        },{
                            title: 'Holy Days Transaction',
                            header:false,
                            html : "<br/><form  name='section' ><table width='100%' border='0' align='center' style='padding:10px'><tr><td><input type='hidden' size='40px' name='sectionid' id='sectionid' ></td></tr><tr><td width='30%'>Section Name</td><td><input type='text' size='40px' id='sectionname' name='sectionname'></td></tr><br/><tr><td align='right' width='20%'>Find Section Name:</td><td> <input style='background-color:yellow;' type='text' size='15px' name='check_section_name' id='check_section_name' onchange='find_section_name()'>&nbsp;<input type='button' name='add' onclick='enable_sectionname()' value='NEW'/>&nbsp;<input type='button' name='pi_save' disabled='disabled' onclick='save_sectionname()' value='SAVE'/>&nbsp;<input type='button' onclick='update_sectionname()' value='EDIT'/>&nbsp;<input type='button' onclick='delete_sectionname()' value='DELETE'/></td></tr><tr></table></form>",
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
                width:650,
                height:550,
                html : "<form  name='attendance_report'><br/><div><div align='center'><fieldset style='width:500px;'><legend><font size='+1'><b>Process</b></font></legend>Select Date :<select id='p_start_date'><option value='01'>01</option><option value='02'>02</option><option value='03'>03</option><option value='04'>04</option><option value='05'>05</option><option value='06'>06</option><option value='07'>07</option><option value='08'>08</option><option value='09'>09</option><option value='10'>10</option><option value='11'>11</option><option value='12'>12</option><option value='13'>13</option><option value='14'>14</option><option value='15'>15</option><option value='16'>16</option><option value='17'>17</option><option value='18'>18</option><option value='19'>19</option><option value='20'>20</option><option value='21'>21</option><option value='22'>22</option><option value='23'>23</option><option value='24'>24</option><option value='25'>25</option><option value='26'>26</option><option value='27'>27</option><option value='28'>28</option><option value='29'>29</option><option value='30'>30</option><option value='31'>31</option></select><select id='report_month'><option value='01'>January</option><option value='02'>February</option><option value='03'>March</option><option value='04'>April</option><option value='05'>May</option><option value='06'>Jun</option><option value='07'>July</option><option value='08'>August</option><option value='09'>September</option><option value='10'>October</option><option value='11'>November</option><option value='12'>December</option></select><select id='report_year'><option value='2011'>2011</option><option value='2012'>2012</option><option value='2013'>2013</option><option value='2014'>2014</option><option value='2015'>2015</option><option value='2016'>2016</option><option value='2017'>2017</option><option value='2018'>2018</option><option value='2019'>2019</option><option value='2020'>2020</option></select><input type='button' name='view' onclick='report_view()' value='Process'/></fieldset></div></div><br><div align='center'><fieldset style='width:500px;'><legend><font size='+1'><b>Category Options</b></font></legend><table><tr><td>Start</td><td>:</td><td><select name='start' id='start' onchange='attendence_get_data()' /><option value='select'>Select</option><option value='all'>ALL</option></select></td></tr><tr><td>Department </td><td>:</td><td><select id='att_dept' name='att_dept' ><option value=''></option></select></td><td>Section </td><td>:</td><td><select id='att_section' name='att_section' ><option value=''></option></select></td></tr><tr><td>Line No </td><td>:</td><td><select id='att_line' name='att_line'><option value=''></option></select></td><td>Designation </td><td>:</td><td><select id='att_desig' name='att_desig'><option value=''></option></select></td></tr></table></fieldset></div><div align='center'><br><fieldset style='width:500px;'><legend><font size='+1'><b>Daily Report</b></font></legend><input type='button' onclick='daily_absent_report()' value='Daily Absent Report'/><input type='button' onclick='daily_present_report()' value='Daily Present Report'/><input type='button' onclick='daily_leave_report()' value='Daily Leave Report'/><input type='button' onclick='daily_late_report()' value='Daily Late Report'/><input type='button' onclick='out_punch_miss()' value='Daily Out Punch Miss Report'/><input type='button' onclick='manpower_report()' value='Daily Manpower Report'/></fieldset></div><div align='center'><br><fieldset style='width:500px;'><legend><font size='+1'><b>Monthly Report</b></font></legend><input type='button' onclick='monthly_att_register()' value='Attendance Report'/></fieldset></div><br><br><div align='center'><fieldset style='width:500px;'><legend><font size='+1'><b>Continuous Report</b></font></legend>Start Date <select id='start_date'><option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option><option value='5'>5</option><option value='6'>6</option><option value='7'>7</option><option value='8'>8</option><option value='9'>9</option><option value='10'>10</option><option value='11'>11</option><option value='12'>12</option><option value='13'>13</option><option value='14'>14</option><option value='15'>15</option><option value='16'>16</option><option value='17'>17</option><option value='18'>18</option><option value='19'>19</option><option value='20'>20</option><option value='21'>21</option><option value='22'>22</option><option value='23'>23</option><option value='24'>24</option><option value='25'>25</option><option value='26'>26</option><option value='27'>27</option><option value='28'>28</option><option value='29'>29</option><option value='30'>30</option><option value='31'>31</option></select>End Date <select id='end_date'><option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option><option value='5'>5</option><option value='6'>6</option><option value='7'>7</option><option value='8'>8</option><option value='9'>9</option><option value='10'>10</option><option value='11'>11</option><option value='12'>12</option><option value='13'>13</option><option value='14'>14</option><option value='15'>15</option><option value='16'>16</option><option value='17'>17</option><option value='18'>18</option><option value='19'>19</option><option value='20'>20</option><option value='21'>21</option><option value='22'>22</option><option value='23'>23</option><option value='24'>24</option><option value='25'>25</option><option value='26'>26</option><option value='27'>27</option><option value='28'>28</option><option value='29'>29</option><option value='30'>30</option><option value='31'>31</option></select><br/><input type='button' onclick='absentreport()' value='Absent Report'/><input type='button' onclick='present_process()' value='Present Report'/><input type='button' onclick='leave_process()' value='Leave Report'/><input type='button' onclick='late_process()' value='Late Report'/></fieldset></div><br><br><div align='center'><fieldset style='width:500px;'><legend><font size='+1'><b>Employee Wise Report</b></font></legend><br>Select Date : <select id='job_start_date'><option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option><option value='5'>5</option><option value='6'>6</option><option value='7'>7</option><option value='8'>8</option><option value='9'>9</option><option value='10'>10</option><option value='11'>11</option><option value='12'>12</option><option value='13'>13</option><option value='14'>14</option><option value='15'>15</option><option value='16'>16</option><option value='17'>17</option><option value='18'>18</option><option value='19'>19</option><option value='20'>20</option><option value='21'>21</option><option value='22'>22</option><option value='23'>23</option><option value='24'>24</option><option value='25'>25</option><option value='26'>26</option><option value='27'>27</option><option value='28'>28</option><option value='29'>29</option><option value='30'>30</option><option value='31'>31</option></select> To  <select id='job_end_date'><option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option><option value='5'>5</option><option value='6'>6</option><option value='7'>7</option><option value='8'>8</option><option value='9'>9</option><option value='10'>10</option><option value='11'>11</option><option value='12'>12</option><option value='13'>13</option><option value='14'>14</option><option value='15'>15</option><option value='16'>16</option><option value='17'>17</option><option value='18'>18</option><option value='19'>19</option><option value='20'>20</option><option value='21'>21</option><option value='22'>22</option><option value='23'>23</option><option value='24'>24</option><option value='25'>25</option><option value='26'>26</option><option value='27'>27</option><option value='28'>28</option><option value='29'>29</option><option value='30'>30</option><option value='31'>31</option></select>Enter Employee ID :<input type='text' value='' id='emp_id'><br/><input type='button' onclick='job_card()' value='Job Card'/></fieldset></div></div></from>",
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
                html : "<form  name='salary_report'><br/><div><div align='center'><fieldset style='width:500px;'><legend><font size='+1'><b>Process</b></font></legend>Select Month and Year :<select id='report_month_sal'><option value='01'>January</option><option value='02'>February</option><option value='03'>March</option><option value='04'>April</option><option value='05'>May</option><option value='06'>Jun</option><option value='07'>July</option><option value='08'>August</option><option value='09'>September</option><option value='10'>October</option><option value='11'>November</option><option value='12'>December</option></select><select id='report_year_sal'><option value='2011'>2011</option><option value='2012'>2012</option><option value='2013'>2013</option><option value='2014'>2014</option><option value='2015'>2015</option><option value='2016'>2016</option><option value='2017'>2017</option><option value='2018'>2018</option><option value='2019'>2019</option><option value='2020'>2020</option></select><input type='button' name='view' onclick='salary_process()' value='Process'/></fieldset></div></div><div align='center'><br><br><fieldset style='width:500px;'><legend><font size='+1'><b>Monthly Report</b></font></legend><br><input type='button' onclick='monthly_salary_sheet()' value='Monthly Salary Sheet'/><input type='button' onclick='salary_summary_report()' value='Salary Summary Report'/></fieldset></div></from>",
                iconCls: 'bogus',
                shim:false,
                animCollapse:false,
                constrainHeader:true
            });
        }
        win.show();
    }
});


MyDesktop.IDCardApp = Ext.extend(Ext.app.Module, {
	id:'IDAPP',
    init : function(){
        this.launcher = {
            text: 'ID Card & Appointment Letter',
            iconCls:'bogus',
			
            handler : this.createWindow,
            scope: this,
            windowId:windowIndex
        }
    },

    createWindow : function(src){
        var desktop = this.app.getDesktop();
        var win = desktop.getWindow('IDAPP');
        if(!win){
            win = desktop.createWindow({
                id: 'IDAPP',
                title:src.text,
                width:540,
                height:450,
                html : "<form  name='idapp'><br/><div><div align='center'><fieldset style='width:500px;'><legend><font size='+1'><b>Emp ID Range</b></font></legend><br>Emp ID :<input type='text' id='start_id' name='start_id'> TO <input type='text' id='end_id' name='end_id'><br><br><input type='button' name='view' onclick='id_card()' value='ID Card'/><input type='button' name='view' onclick='appointment_letter()' value='Appointment Letter'/></fieldset></div></div><div align='center'><br><br></div></from>",
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