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

	document.getElementById('cgsal').value = "";
	document.getElementById('cbsal').value = "";
	document.getElementById('chrent').value = "";
	document.getElementById('cmallow').value = "";

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
hostname = window.location.hostname;
document.image.src = "http://"+hostname+"/erp_target_net/uploads/photo/"+img;
document.image.height = 200;
document.image.width = 150;

 var queryString="empid="+empid+"&name="+name+"&mname="+mname+"&fname="+fname+"&dob="+dob+"&reli="+reli+"&sex="+sex+"&ms="+ms+"&bgroup="+bgroup+"&img="+img+"&padd="+padd+"&fadd="+fadd;
 
 ajaxRequest.open("POST", "per_info/", true);
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
 
 ajaxRequest.open("POST", "save_linename/", true);
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
 
 ajaxRequest.open("POST", "save_deptname/", true);
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
  var sectionnamebng 	= document.getElementById('sectionnamebng').value;<!--edited line-->

 if(sectionname=='' || sectionname==null){
 	alert("Please insert Section name");
	return;
 }
 
 var queryString="sectionname="+sectionname+"&sectionnamebng="+sectionnamebng;
 
 ajaxRequest.open("POST", "save_sectionname/", true);
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
 var designationnamebng 	= document.getElementById('designationnamebng').value; <!--edited line-->
 
  if(designationname=='' || designationname==null){
 	alert("Please insert Designation name");
	return;
 }
 
 var queryString="designationname="+designationname+"&designationnamebng="+designationnamebng;
 
 ajaxRequest.open("POST", "save_designationname/", true);
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
 
 ajaxRequest.open("POST", "per_update/", true);
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
 
 ajaxRequest.open("POST", "update_deptname/", true);
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
 var sectionnamebng 	= document.getElementById('sectionnamebng').value; <!--edited line-->
 //var dept 	= document.getElementById('dept').value;
 
  if(sectionname=='' || sectionname==null){
 	alert("Please insert Section name");
	return;
 }
 
 var queryString="sectionid="+sectionid+"&sectionname="+sectionname+"&sectionnamebng="+sectionnamebng;
 
 ajaxRequest.open("POST", "update_sectionname/", true);
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
 
 ajaxRequest.open("POST", "update_positionname_co/", true);
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
  var designationnamebng 	= document.getElementById('designationnamebng').value; <!--edited line-->
  if(designationname=='' || designationname==null){
 	alert("Please insert Designation name");
	return;
 }

 var queryString="designationid="+designationid+"&designationname="+designationname+"&designationnamebng="+designationnamebng;
 
 ajaxRequest.open("POST", "update_designationname/", true);
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
 
 ajaxRequest.open("POST", "update_linename/", true);
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
 
 ajaxRequest.open("POST", "per_delete/", true);
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

 ajaxRequest.open("POST", "delete_deptname/", true);
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

 ajaxRequest.open("POST", "delete_sectionname/", true);
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

 ajaxRequest.open("POST", "delete_positionname_co/", true);
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

 ajaxRequest.open("POST", "delete_designationname/", true);
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
 
 ajaxRequest.open("POST", "search_attenb_name/", true);
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
 ajaxRequest.open("POST", "shift_change_co/", true);
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
 
 ajaxRequest.open("POST", "save_atttbname_con/", true);
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
 
 ajaxRequest.open("POST", "update_attnbname_con/", true);
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

 ajaxRequest.open("POST", "delete_attnbname_co/", true);
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

 ajaxRequest.open("POST", "delete_linename/", true);
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
 
 ajaxRequest.open("POST", "search/", true);
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
		
		hostname = window.location.hostname;
		document.image.src = "http://"+hostname+"/erp_target_net/uploads/photo/"+img;
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
 
 ajaxRequest.open("POST", "search_dept_name/", true);
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
 
 ajaxRequest.open("POST", "search_section_name/", true);
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
		document.getElementById('sectionnamebng').value = sec_info[3];
		
	/*	document.section.dept.options.length=0;
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
			
		}*/
		
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
 
 ajaxRequest.open("POST", "search_designation_name/", true);
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
		document.getElementById('designationnamebng').value = personalinfo[2];
		
		
	
		
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
 
 ajaxRequest.open("POST", "search_line_name/", true);
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
 
 ajaxRequest.open("POST", "save_positionname_co/", true);
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
 
 ajaxRequest.open("POST", "search_position_name/", true);
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
 
 
	var name =document.getElementById('name').value;
	
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
	var cgsal = document.getElementById('cgsal').value;
	var otentitle = document.getElementById('otentitle').value;
	var transport = document.getElementById('transport').value;
	var lunch = document.getElementById('lunch').value;
	var attbonus = document.getElementById('attbonus').value;
	var ejd = document.getElementById('ejd').value;
	var saldraw = document.getElementById('saldraw').value;
	var saltype = document.getElementById('saltype').value;
	
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

if(saldraw=='Select' || saldraw==''){
	 alert("Please select salary withdraw");
	 return;
	}
	
if(saltype=='Select' || saltype==''){
	 alert("Please select salary type");
	 return;
	}
	
	
	
	 
	var queryString="com_empid="+com_empid+"&idcard="+idcard+"&dept="+dept+"&sec="+sec+"&line="+line+"&desig="+desig+"&operation="+operation+"&position="+position+"&salg="+salg+"&empstat="+empstat+"&empshift="+empshift+"&gsal="+gsal+"&cgsal="+cgsal+"&otentitle="+otentitle+"&transport="+transport+"&lunch="+lunch+"&attbonus="+attbonus+"&ejd="+ejd+"&saldraw="+saldraw+"&saltype="+saltype;
	//alert(desig);
	ajaxRequest.open("POST", "com_info_insert/", true);
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
	var cgsal = document.getElementById('cgsal').value;
	var otentitle = document.getElementById('otentitle').value;
	var transport = document.getElementById('transport').value;
	var lunch = document.getElementById('lunch').value;
	var attbonus = document.getElementById('attbonus').value;
	var ejd = document.getElementById('ejd').value;
	var saldraw = document.getElementById('saldraw').value;
	var saltype = document.getElementById('saltype').value;
 
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

if(saldraw=='Select' || saldraw==''){
	 alert("Please select salary withdraw");
	 return;
	}

if(saltype=='Select' || saltype==''){
	 alert("Please select salary withdraw");
	 return;
	}
	
	var queryString="com_empid="+com_empid+"&idcard="+idcard+"&dept="+dept+"&sec="+sec+"&line="+line+"&desig="+desig+"&operation="+operation+"&position="+position+"&salg="+salg+"&empstat="+empstat+"&empshift="+empshift+"&gsal="+gsal+"&cgsal="+cgsal+"&otentitle="+otentitle+"&transport="+transport+"&lunch="+lunch+"&attbonus="+attbonus+"&ejd="+ejd+"&saldraw="+saldraw+"&saltype="+saltype;
	//alert(queryString);
	ajaxRequest.open("POST", "com_info_edit/", true);
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

	ajaxRequest.open("POST", "com_info_delete/", true);
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

 
	//==================================BGMEA Salary Rule===================================
		/*var bsal = (gsal * 60) / 100;
		document.getElementById('bsal').value = bsal;
			
		var hrent = (gsal * 30) / 100;
		document.getElementById('hrent').value = hrent;
		
		var mallow = (gsal * 10) / 100;
		document.getElementById('mallow').value = mallow;*/
		//==================================BGMEA Salary Rule===================================
		
		//==================================LOCAL Salary Rule===================================
		/*var mallow = 200;
		document.getElementById('mallow').value = mallow;
		
		var bsal = Math.round((gsal - mallow) / 140 * 100);
		document.getElementById('bsal').value = bsal;
			
		var hrent = Math.round((bsal * 40) / 100);
		document.getElementById('hrent').value = hrent;*/
		//==================================LOCAL Salary Rule===================================
		
		//==================================New Salary Rule===================================
		var mallow = 750;
		document.getElementById('mallow').value = mallow;
		
		var bsal = Math.round((gsal - 2450) / 1.5);
		document.getElementById('bsal').value = bsal;
			
		var hrent = Math.round((gsal - 2450) - bsal);
		//alert(hrent)
		document.getElementById('hrent').value = hrent;
 		var food = 1250;
		document.getElementById('food').value = food;
		var transport = 450;
		document.getElementById('convence').value = transport;
		//==================================New Salary Rule===================================
}

function basic_sal_call(){
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
 	var cgsal = document.getElementById('cgsal').value;
 
	//==================================BGMEA Salary Rule===================================
		/*var bsal = (gsal * 60) / 100;
		document.getElementById('bsal').value = bsal;
			
		var hrent = (gsal * 30) / 100;
		document.getElementById('hrent').value = hrent;
		
		var mallow = (gsal * 10) / 100;
		document.getElementById('mallow').value = mallow;*/
		//==================================BGMEA Salary Rule===================================
		
		//==================================LOCAL Salary Rule===================================
		/*var mallow = 200;
		document.getElementById('mallow').value = mallow;
		
		var bsal = Math.round((gsal - mallow) / 140 * 100);
		document.getElementById('bsal').value = bsal;
			
		var hrent = Math.round((bsal * 40) / 100);
		document.getElementById('hrent').value = hrent;*/
		//==================================LOCAL Salary Rule===================================
		
		//==================================New Salary Rule===================================
		var cmallow = 750;
		document.getElementById('cmallow').value = cmallow;
		
		var cbsal = Math.round((cgsal - 2450) / 1.5);
		document.getElementById('cbsal').value = cbsal;
			
		var chrent = Math.round((cgsal - 2450) - cbsal);
		//alert(hrent)
		document.getElementById('chrent').value = chrent;

		var food = 1250;
		document.getElementById('cfood').value = food;
		var transport = 450;
		document.getElementById('cconvence').value = transport;
		//==================================New Salary Rule===================================
}

function form_check()
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

//document.position.save_designationname.disabled = true;

 employee_id= document.getElementById('empid').value;
 if(employee_id=='')
 {
	 alert("Please Insert Employee ID");
	// enable_save();
	 return false;
	 
	 }
 

 
 var queryString="employee_id="+employee_id;
 
 ajaxRequest.open("POST", "check_id/", true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send(queryString);
 
 
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		
		if(resp == 1)
		{
			alert("Sorry! Change your employee ID.");
			return false;
		}

	
	}
}
}




function com_info_Search1()
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
 //disable_save();
 
 var empid 	= document.getElementById('search_empid').value;
 //alert(empid);

 var queryString="empid="+empid;
 hostname = window.location.hostname;
 var url = "http://"+hostname+"/erp_target_net/index.php/emp_info_con/com_info_search1/";
 ajaxRequest.open("POST", url, true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send(queryString);
 
 
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		//alert(resp);
		if(resp == "Employee ID does not exist"){
			alert(resp);
			//document.cominfo.dept.options.length=0;
			empty_pi();
			return;
			}
		
		document.cominfo.pi_save.disabled = true;
 		document.cominfo.pi_edit.disabled = false;
 		document.cominfo.empstat.disabled = true;
 
		alldata = resp.split("-*-");
		//alert(alldata);
		otherinfo= alldata[0].split("=*=") ;
		console.log(otherinfo);
		document.cominfo.name.value = otherinfo[0];
		document.cominfo.bname.value = otherinfo[1];

		document.cominfo.fname.value = otherinfo[2];
		document.cominfo.mname.value = otherinfo[3];
		document.cominfo.spouse_name.value = otherinfo[4];
		document.cominfo.no_child.value = otherinfo[5];
		document.cominfo.dob.value = otherinfo[6];
		var img = otherinfo[7];
		hostname = window.location.hostname;
		document.image.src = "http://"+hostname+"/erp_target_net/uploads/photo/"+img;
		document.image.height = 150;
		document.image.width = 130;
		document.cominfo.reli.value 			= otherinfo[8];
		document.cominfo.sex.value 				= otherinfo[9];
		document.cominfo.ms.value 				= otherinfo[10];
		document.cominfo.bgroup.value 			= otherinfo[11];
		document.cominfo.education.value 		= otherinfo[12];
		document.cominfo.exp_factory.value 		= otherinfo[13];
		document.cominfo.duration.value 		= otherinfo[14];
		document.cominfo.exp_designation.value  = otherinfo[15];
		document.cominfo.pre_vill.value 		= otherinfo[18];
		document.cominfo.pre_district.value 	= otherinfo[19];
		document.cominfo.pre_upazila.value 		= otherinfo[20];
		document.cominfo.pre_post.value 		= otherinfo[21];
		document.cominfo.per_vill.value 		= otherinfo[22];
		document.cominfo.per_district.value 	= otherinfo[23];
		document.cominfo.per_upazila.value 		= otherinfo[24];
		document.cominfo.per_post.value 		= otherinfo[25];
		document.cominfo.nomi_vill.value 		= otherinfo[26];
		document.cominfo.nomi_district.value 	= otherinfo[27];
		document.cominfo.nomi_upazila.value	 	= otherinfo[28];
		document.cominfo.nomi_post.value 		= otherinfo[29];
		document.cominfo.nomi_name.value 		= otherinfo[30];
		document.cominfo.nomi_relation.value 	= otherinfo[31];
		document.cominfo.nid.value 	= otherinfo[32];
		document.cominfo.personal_phone.value 	= otherinfo[33];
		document.cominfo.emergency_phone.value 	= otherinfo[34];

		document.cominfo.m_name_bn.value 		= otherinfo[35];
		document.cominfo.f_name_bn.value 		= otherinfo[36];
		document.cominfo.spouse_name_bn.value 	= otherinfo[37];
		document.cominfo.edu_bn.value 			= otherinfo[38];
		document.cominfo.pre_vill_bn.value 		= otherinfo[39];
		document.cominfo.per_vill_bn.value 		= otherinfo[40];
		document.cominfo.nomi_name_bn.value 	= otherinfo[41];
		document.cominfo.nomi_vill_bn.value 	= otherinfo[42];

		com_info = alldata[1].split("=*=");

		console.log(com_info);
		document.cominfo.empid.value = com_info[0];
		document.cominfo.idcard.value = com_info[1];
		document.cominfo.cgsal.value = com_info[11];
		document.cominfo.gsal.value = com_info[12];
		document.cominfo.account.value = com_info[13];
		document.cominfo.work_type.value = com_info[14];
		document.cominfo.ejd.value = com_info[19];
		document.cominfo.saldraw.value = com_info[20];
		document.cominfo.saltype.value = com_info[21];
		
		
		dept_id_name = alldata[2].split("===");
		dept_id = dept_id_name[0].split("=*=");
		dept_name = dept_id_name[1].split("=*=");
		document.cominfo.dept.options.length=0;
		for (i=0; i<dept_id.length; i++){
			if( com_info[2] == dept_name[i])
			{
				document.cominfo.dept.options[i]=new Option(dept_name[i],dept_id[i], false, true);
			}
			else
			document.cominfo.dept.options[i]=new Option(dept_name[i],dept_id[i], false, false);
		}
		
		
		
		sec_id_name = alldata[3].split("===");
		//alert(sec_id_name);
		sec_id = sec_id_name[0].split("***");
		sec_name = sec_id_name[1].split("***");
		document.cominfo.sec.options.length=0;
		for (i=0; i<sec_id.length; i++){
			if( com_info[3] == sec_name[i])
			{
				document.cominfo.sec.options[i]=new Option(sec_name[i],sec_id[i], false,true);
			}
			else
				document.cominfo.sec.options[i]=new Option(sec_name[i],sec_id[i], false, false);
			
		}
		
		
		//alert(com_info[4]);
		
		
		line_id_name = alldata[4].split("===");
		line_id = line_id_name[0].split("***");
		line_name = line_id_name[1].split("***");
		document.cominfo.line.options.length=0;
		for (i=0; i<line_id.length; i++){
			if( com_info[4] == line_name[i])
			{
				//alert(line_name[i]);
				document.cominfo.line.options[i]=new Option(line_name[i],line_id[i], false,true);
			}
			else
			//alert(line_name[i]);
			document.cominfo.line.options[i]=new Option(line_name[i],line_id[i], false, false);
			
		}
		
		//alert(com_info[5])
		
		desig_id_name = alldata[5].split("===");
		desig_id = desig_id_name[0].split("***");
		desig_name = desig_id_name[1].split("***");
		document.cominfo.desig.options.length=0;
		for (i=0; i<desig_id.length; i++){
			if( com_info[5] == desig_name[i])
			{
				//alert(dept_name[i]);
				document.cominfo.desig.options[i]=new Option(desig_name[i],desig_id[i], false,true);
			}
			else
			document.cominfo.desig.options[i]=new Option(desig_name[i],desig_id[i], false, false);
			
		}
		
		
		
		operation_id_name = alldata[6].split("===");
		//alert(operation_id_name);
		operation_id = operation_id_name[0].split("=*=");
		operation_name = operation_id_name[1].split("=*=");
		document.cominfo.operation.options.length=0;
		for (i=0; i<operation_id.length; i++){
			if( com_info[6] == operation_name[i])
			{
				//alert(dept_name[i]);
				document.cominfo.operation.options[i]=new Option(operation_name[i],operation_id[i], false,true);
			}
			else
			document.cominfo.operation.options[i]=new Option(operation_name[i],operation_id[i], false, false);
			
		}
		
		position_id_name = alldata[7].split("===");
		position_id = position_id_name[0].split("=*=");
		position_name = position_id_name[1].split("=*=");
		document.cominfo.position.options.length=0;
		for (i=0; i<position_id.length; i++){
			if( com_info[7] == position_name[i])
			{
				//alert(dept_name[i]);
				document.cominfo.position.options[i]=new Option(position_name[i],position_id[i], false,true);
			}
			else
			document.cominfo.position.options[i]=new Option(position_name[i],position_id[i], false, false);
		
		}
		
		salg_id_name = alldata[8].split("===");
		salg_id = salg_id_name[0].split("***");
		salg_name = salg_id_name[1].split("***");
		document.cominfo.salg.options.length=0;
		for (i=0; i<salg_id.length; i++){
			if( com_info[8] == salg_name[i])
			{
				//alert(dept_name[i]);
				document.cominfo.salg.options[i]=new Option(salg_name[i],salg_id[i], false,true);
			}
			else
			document.cominfo.salg.options[i]=new Option(salg_name[i],salg_id[i], false, false);
			
		}
		
		
		
		empstat_id_name = alldata[9].split("===");
		empstat_id = empstat_id_name[0].split("***");
		empstat_name = empstat_id_name[1].split("***");
		document.cominfo.empstat.options.length=0;
		for (i=0; i<empstat_id.length; i++){
			if( com_info[9] == empstat_name[i])
			{
				document.cominfo.empstat.options[i]=new Option(empstat_name[i],empstat_id[i], false,true);
			}
			else
				document.cominfo.empstat.options[i]=new Option(empstat_name[i],empstat_id[i], false, false);
		}
		
		empshift_id_name = alldata[10].split("===");
		//alert(empshift_id_name);
		empshift_id = empshift_id_name[0].split("***");
		empshift_name = empshift_id_name[1].split("***");
		document.cominfo.empshift.options.length=0;
		for (i=0; i<empshift_id.length; i++){
			if( com_info[10] == empshift_name[i])
			{
				document.cominfo.empshift.options[i]=new Option(empshift_name[i],empshift_id[i], false,true);
			}
			else
			document.cominfo.empshift.options[i]=new Option(empshift_name[i],empshift_id[i], false, false);
			
		}
		
		attbonus_id_name = alldata[11].split("===");
		
		attbonus_id = attbonus_id_name[0].split("***");
		//alert(attbonus_id);
		attbonus_name = attbonus_id_name[1].split("***");
		//alert(com_info[15]);
		document.cominfo.attbonus.options.length=0;
		for (i=0; i<attbonus_id.length; i++){
			
			if( com_info[15] == attbonus_id[i])
			{
				document.cominfo.attbonus.options[i]=new Option(attbonus_name[i],attbonus_id[i], false,true);
			}
			else
				document.cominfo.attbonus.options[i]=new Option(attbonus_name[i],attbonus_id[i], false, false);
			}
		
	attbonus_id_name = alldata[11].split("===");
	attbonus_id = attbonus_id_name[0].split("***");
	attbonus_name = attbonus_id_name[1].split("***");
	
		var otname=new Array(); 
		var otid=new Array(); 
		otname[0]="Yes";
		otname[1]="No"; 
		otid[0] =0; 
		otid[1] =1;
	
	
	
	
	document.cominfo.transport.options.length=0;
		for (i=0; i<=1; i++){
			
			if( com_info[13] == otid[i])
			{
				//alert(dept_name[i]);
				document.cominfo.transport.options[i]=new Option(otname[i],otid[i], false,true);
			}
			else
			document.cominfo.transport.options[i]=new Option(otname[i],otid[i], false, false);
		}
		
	
	
	
	document.cominfo.otentitle.options.length=0;
		for (i=0; i<=1; i++){
			
			if( com_info[12] == otid[i])
			{
				//alert(dept_name[i]);
				document.cominfo.otentitle.options[i]=new Option(otname[i],otid[i], false,true);
			}
			else
			document.cominfo.otentitle.options[i]=new Option(otname[i],otid[i], false, false);
		}	
		
		
		document.cominfo.lunch.options.length=0;
		for (i=0; i<=1; i++){
			
			if( com_info[14] == otid[i])
			{
				//alert(dept_name[i]);
				document.cominfo.lunch.options[i]=new Option(otname[i],otid[i], false,true);
			}
			else
			document.cominfo.lunch.options[i]=new Option(otname[i],otid[i], false, false);
		}
		
		
		var stname=new Array(); 
		var stid=new Array(); 
		stname[0]="Fixed";
		stname[1]="Production"; 
		stid[0] =1; 
		stid[1] =2;
		
		
		document.cominfo.saltype.options.length=0;
		for (i=0; i<=1; i++){
			if( com_info[18] == stid[i])
			{
				document.cominfo.saltype.options[i]=new Option(stname[i],stid[i], false, true);
			}
			else
			document.cominfo.saltype.options[i]=new Option(stname[i],stid[i], false, false);
		}
		
		
		var sdname=new Array(); 
		var sdid=new Array(); 
		sdname[0]="Cash";
		sdname[1]="Bank"; 
		sdid[0] =1; 
		sdid[1] =2;
		
		
		document.cominfo.saldraw.options.length=0;
		for (i=0; i<=1; i++){
			if( com_info[17] == sdid[i])
			{
				document.cominfo.saldraw.options[i]=new Option(sdname[i],sdid[i], false, true);
			}
			else
			document.cominfo.saldraw.options[i]=new Option(sdname[i],sdid[i], false, false);
		}
		
		
		
		document.getElementById('ejd').value = com_info[19];
		//alert(com_info[11]) ;
		document.getElementById('gsal').value = com_info[11];
		var gsal = com_info[11];
		document.getElementById('cgsal').value = com_info[12];
		var cgsal = com_info[12];

		//alert(com_info[11]);
		//==================================BGMEA Salary Rule===================================
		/*var bsal = (gsal * 60) / 100;
		document.getElementById('bsal').value = bsal;
			
		var hrent = (gsal * 30) / 100;
		document.getElementById('hrent').value = hrent;
		
		var mallow = (gsal * 10) / 100;
		document.getElementById('mallow').value = mallow;*/
		//==================================BGMEA Salary Rule===================================
		
		//==================================LOCAL Salary Rule===================================
		var mallow = 750;
		document.getElementById('mallow').value = mallow;

		var cmallow = 750;
		document.getElementById('cmallow').value = cmallow;
		
		var bsal = Math.round((gsal - mallow) / 150 * 100);
		document.getElementById('bsal').value = bsal;

		var cbsal = Math.round((cgsal - mallow) / 150 * 100);
		document.getElementById('cbsal').value = cbsal;
			
		var hrent = Math.round((bsal * 50) / 100);
		document.getElementById('hrent').value = hrent;

		var chrent = Math.round((cbsal * 50) / 100);
		document.getElementById('chrent').value = chrent;


		var food = 1250;
		document.getElementById('food').value = food;
		var transport = 450;
		document.getElementById('convence').value = transport;

 		var cfood = 1250;
		document.getElementById('cfood').value = cfood;
		var transport = 450;
		document.getElementById('cconvence').value = transport;




		//==================================LOCAL Salary Rule===================================
		if(com_info[9] == 'Resign')
		{
			
			document.cominfo.pi_edit.disabled = true;			
			}
		
	}
}

eempid = empid;

	}

function com_info_next_Search1()
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
 //disable_save();
 document.getElementById('search_empid').value="";
 var id_skill 	= document.getElementById('id_skill').value;
 //var new_id_skill = id_skill + 1;
 
 //alert(new_id_skill);

 var queryString="id_skill="+id_skill;
 hostname = window.location.hostname;
 var url = "http://"+hostname+"/erp_target_net/index.php/emp_info_con/com_info_next_Search1/";
 ajaxRequest.open("POST", url, true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send(queryString);
 
 
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		//alert(resp);
		if(resp == "Employee ID does not exist"){
			alert(resp);
			//document.cominfo.dept.options.length=0;
			empty_pi();
			return;
			}
		
		document.cominfo.pi_save.disabled = true;
 		document.cominfo.pi_edit.disabled = false;
 		document.cominfo.empstat.disabled = true;
 
		alldata = resp.split("-*-");
		//alert(alldata);
		otherinfo= alldata[0].split("=*=") ;
		//alert(otherinfo);
		//alert(otherinfo[1]);
		document.cominfo.empid.value = otherinfo[0];
		document.cominfo.padd.value = otherinfo[1];
		document.cominfo.fadd.value = otherinfo[2];
		//alert(otherinfo[3]);
		document.cominfo.emp_last_dg.value = otherinfo[3];
		document.cominfo.pass_year.value = otherinfo[4];
		document.cominfo.edu_insti.value = otherinfo[5];
		document.cominfo.skill_dept.value = otherinfo[6];
		document.cominfo.skill_year.value = otherinfo[7];
		document.cominfo.skill_com_na.value = otherinfo[8];
		document.cominfo.name.value = otherinfo[9];
		document.cominfo.fname.value = otherinfo[10];
		document.cominfo.mname.value = otherinfo[11];
		document.cominfo.dob.value = otherinfo[12];
		//alert(otherinfo[13]);
		document.cominfo.reli.value = otherinfo[13];
		document.cominfo.sex.value = otherinfo[14];
		document.cominfo.ms.value = otherinfo[15];
		document.cominfo.bgroup.value = otherinfo[16];
		var img = otherinfo[17];
		hostname = window.location.hostname;
		document.image.src = "http://"+hostname+"/erp_target_net/uploads/photo/"+img;
		document.image.height = 150;
		document.image.width = 130;
		
		document.cominfo.bname.value = otherinfo[18];
		document.cominfo.id_skill.value    = otherinfo[19];
	
		
				
		com_info = alldata[1].split("=*=");
		//alert(com_info);
		
		
		document.cominfo.idcard.value = com_info[1];
		
		//document.cominfo.section.value = com_info[];
		
		//dept_id_name = alldata[2].split("===");
		//dept_id = dept_id_name[0].split("=*=");
		//dept_name = dept_id_name[1].split("=*=");
		//document.cominfo.dept.options.length=0;
		//for (i=0; i<dept_id.length; i++){
		//	document.cominfo.dept.options[i]=new Option(dept_name[i],dept_id[i], false, true);
		//	}
		
		
		
		dept_id_name = alldata[2].split("===");
		dept_id = dept_id_name[0].split("=*=");
		dept_name = dept_id_name[1].split("=*=");
		document.cominfo.dept.options.length=0;
		for (i=0; i<dept_id.length; i++){
			if( com_info[2] == dept_name[i])
			{
				document.cominfo.dept.options[i]=new Option(dept_name[i],dept_id[i], false, true);
			}
			else
			document.cominfo.dept.options[i]=new Option(dept_name[i],dept_id[i], false, false);
		}
		
		//alert(com_info[3]);
		
		
		sec_id_name = alldata[3].split("===");
		//alert(sec_id_name);
		sec_id = sec_id_name[0].split("***");
		sec_name = sec_id_name[1].split("***");
		document.cominfo.sec.options.length=0;
		for (i=0; i<sec_id.length; i++){
			if( com_info[3] == sec_name[i])
			{
				document.cominfo.sec.options[i]=new Option(sec_name[i],sec_id[i], false,true);
			}
			else
				document.cominfo.sec.options[i]=new Option(sec_name[i],sec_id[i], false, false);
			
		}
		
		
		//alert(com_info[4]);
		
		
		line_id_name = alldata[4].split("===");
		line_id = line_id_name[0].split("***");
		line_name = line_id_name[1].split("***");
		document.cominfo.line.options.length=0;
		for (i=0; i<line_id.length; i++){
			if( com_info[4] == line_name[i])
			{
				//alert(line_name[i]);
				document.cominfo.line.options[i]=new Option(line_name[i],line_id[i], false,true);
			}
			else
			//alert(line_name[i]);
			document.cominfo.line.options[i]=new Option(line_name[i],line_id[i], false, false);
			
		}
		
		//alert(com_info[5])
		
		desig_id_name = alldata[5].split("===");
		desig_id = desig_id_name[0].split("***");
		desig_name = desig_id_name[1].split("***");
		document.cominfo.desig.options.length=0;
		for (i=0; i<desig_id.length; i++){
			if( com_info[5] == desig_name[i])
			{
				//alert(dept_name[i]);
				document.cominfo.desig.options[i]=new Option(desig_name[i],desig_id[i], false,true);
			}
			else
			document.cominfo.desig.options[i]=new Option(desig_name[i],desig_id[i], false, false);
			
		}
		
		
		
		operation_id_name = alldata[6].split("===");
		//alert(operation_id_name);
		operation_id = operation_id_name[0].split("=*=");
		operation_name = operation_id_name[1].split("=*=");
		document.cominfo.operation.options.length=0;
		for (i=0; i<operation_id.length; i++){
			if( com_info[6] == operation_name[i])
			{
				//alert(dept_name[i]);
				document.cominfo.operation.options[i]=new Option(operation_name[i],operation_id[i], false,true);
			}
			else
			document.cominfo.operation.options[i]=new Option(operation_name[i],operation_id[i], false, false);
			
		}
		
		position_id_name = alldata[7].split("===");
		position_id = position_id_name[0].split("=*=");
		position_name = position_id_name[1].split("=*=");
		document.cominfo.position.options.length=0;
		for (i=0; i<position_id.length; i++){
			if( com_info[7] == position_name[i])
			{
				//alert(dept_name[i]);
				document.cominfo.position.options[i]=new Option(position_name[i],position_id[i], false,true);
			}
			else
			document.cominfo.position.options[i]=new Option(position_name[i],position_id[i], false, false);
		
		}
		
		salg_id_name = alldata[8].split("===");
		salg_id = salg_id_name[0].split("***");
		salg_name = salg_id_name[1].split("***");
		document.cominfo.salg.options.length=0;
		for (i=0; i<salg_id.length; i++){
			if( com_info[8] == salg_name[i])
			{
				//alert(dept_name[i]);
				document.cominfo.salg.options[i]=new Option(salg_name[i],salg_id[i], false,true);
			}
			else
			document.cominfo.salg.options[i]=new Option(salg_name[i],salg_id[i], false, false);
			
		}
		
		
		
		empstat_id_name = alldata[9].split("===");
		empstat_id = empstat_id_name[0].split("***");
		empstat_name = empstat_id_name[1].split("***");
		document.cominfo.empstat.options.length=0;
		for (i=0; i<empstat_id.length; i++){
			if( com_info[9] == empstat_name[i])
			{
				document.cominfo.empstat.options[i]=new Option(empstat_name[i],empstat_id[i], false,true);
			}
			else
				document.cominfo.empstat.options[i]=new Option(empstat_name[i],empstat_id[i], false, false);
		}
		
		empshift_id_name = alldata[10].split("===");
		//alert(empshift_id_name);
		empshift_id = empshift_id_name[0].split("***");
		empshift_name = empshift_id_name[1].split("***");
		document.cominfo.empshift.options.length=0;
		for (i=0; i<empshift_id.length; i++){
			if( com_info[10] == empshift_name[i])
			{
				document.cominfo.empshift.options[i]=new Option(empshift_name[i],empshift_id[i], false,true);
			}
			else
			document.cominfo.empshift.options[i]=new Option(empshift_name[i],empshift_id[i], false, false);
			
		}
		
		attbonus_id_name = alldata[11].split("===");
		
		attbonus_id = attbonus_id_name[0].split("***");
		//alert(attbonus_id);
		attbonus_name = attbonus_id_name[1].split("***");
		//alert(com_info[15]);
		document.cominfo.attbonus.options.length=0;
		for (i=0; i<attbonus_id.length; i++){
			
			if( com_info[15] == attbonus_id[i])
			{
				document.cominfo.attbonus.options[i]=new Option(attbonus_name[i],attbonus_id[i], false,true);
			}
			else
				document.cominfo.attbonus.options[i]=new Option(attbonus_name[i],attbonus_id[i], false, false);
			}
		
	attbonus_id_name = alldata[11].split("===");
	attbonus_id = attbonus_id_name[0].split("***");
	attbonus_name = attbonus_id_name[1].split("***");
	
		var otname=new Array(); 
		var otid=new Array(); 
		otname[0]="Yes";
		otname[1]="No"; 
		otid[0] =0; 
		otid[1] =1;
	
	
	
	
	document.cominfo.transport.options.length=0;
		for (i=0; i<=1; i++){
			
			if( com_info[13] == otid[i])
			{
				//alert(dept_name[i]);
				document.cominfo.transport.options[i]=new Option(otname[i],otid[i], false,true);
			}
			else
			document.cominfo.transport.options[i]=new Option(otname[i],otid[i], false, false);
		}
		
	
	
	
	document.cominfo.otentitle.options.length=0;
		for (i=0; i<=1; i++){
			
			if( com_info[12] == otid[i])
			{
				//alert(dept_name[i]);
				document.cominfo.otentitle.options[i]=new Option(otname[i],otid[i], false,true);
			}
			else
			document.cominfo.otentitle.options[i]=new Option(otname[i],otid[i], false, false);
		}	
		
		
		document.cominfo.lunch.options.length=0;
		for (i=0; i<=1; i++){
			
			if( com_info[14] == otid[i])
			{
				//alert(dept_name[i]);
				document.cominfo.lunch.options[i]=new Option(otname[i],otid[i], false,true);
			}
			else
			document.cominfo.lunch.options[i]=new Option(otname[i],otid[i], false, false);
		}
		
		
		var stname=new Array(); 
		var stid=new Array(); 
		stname[0]="Fixed";
		stname[1]="Production"; 
		stid[0] =1; 
		stid[1] =2;
		
		
		document.cominfo.saltype.options.length=0;
		for (i=0; i<=1; i++){
			if( com_info[18] == stid[i])
			{
				document.cominfo.saltype.options[i]=new Option(stname[i],stid[i], false, true);
			}
			else
			document.cominfo.saltype.options[i]=new Option(stname[i],stid[i], false, false);
		}
		
		
		var sdname=new Array(); 
		var sdid=new Array(); 
		sdname[0]="Cash";
		sdname[1]="Bank"; 
		sdid[0] =1; 
		sdid[1] =2;
		
		
		document.cominfo.saldraw.options.length=0;
		for (i=0; i<=1; i++){
			if( com_info[17] == sdid[i])
			{
				document.cominfo.saldraw.options[i]=new Option(sdname[i],sdid[i], false, true);
			}
			else
			document.cominfo.saldraw.options[i]=new Option(sdname[i],sdid[i], false, false);
		}
		
		
		
		document.getElementById('ejd').value = com_info[19];
		//alert(com_info[11]) ;
		document.getElementById('gsal').value = com_info[11];
		var gsal = com_info[11];
		//alert(com_info[11]);
		//==================================BGMEA Salary Rule===================================
		/*var bsal = (gsal * 60) / 100;
		document.getElementById('bsal').value = bsal;
			
		var hrent = (gsal * 30) / 100;
		document.getElementById('hrent').value = hrent;
		
		var mallow = (gsal * 10) / 100;
		document.getElementById('mallow').value = mallow;*/
		//==================================BGMEA Salary Rule===================================
		
		//==================================LOCAL Salary Rule===================================
		var mallow = 750;
		document.getElementById('mallow').value = mallow;
		
		var bsal = Math.round((gsal - mallow) / 150 * 100);
		document.getElementById('bsal').value = bsal;
			
		var hrent = Math.round((bsal * 50) / 100);
		document.getElementById('hrent').value = hrent;


		var cmallow = 750;
		document.getElementById('cmallow').value = cmallow;
		
		var cbsal = Math.round((cgsal - cmallow) / 150 * 100);
		document.getElementById('cbsal').value = cbsal;
			
		var chrent = Math.round((cbsal * 50) / 100);
		document.getElementById('chrent').value = chrent;


		var food = 1250;
		document.getElementById('food').value = food;
		var transport = 450;
		document.getElementById('convence').value = transport;

 		var cfood = 1250;
		document.getElementById('cfood').value = cfood;
		var transport = 450;
		document.getElementById('cconvence').value = transport;
		//==================================LOCAL Salary Rule===================================
		if(com_info[9] == 'Resign')
		{
			
			document.cominfo.pi_edit.disabled = true;			
			}
		
	}
}

eempid = empid;

	}
	
	
function com_info_prev_Search1()
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
 //disable_save();
 document.getElementById('search_empid').value="";
 var id_skill 	= document.getElementById('id_skill').value;
 //var new_id_skill = id_skill + 1;
 
 //alert(new_id_skill);

 var queryString="id_skill="+id_skill;
 hostname = window.location.hostname;
 var url = "http://"+hostname+"/erp_target_net/index.php/emp_info_con/com_info_prev_Search1/";
 ajaxRequest.open("POST", url, true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send(queryString);
 
 
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		//alert(resp);
		if(resp == "Employee ID does not exist"){
			alert(resp);
			//document.cominfo.dept.options.length=0;
			empty_pi();
			return;
			}
		
		document.cominfo.pi_save.disabled = true;
 		document.cominfo.pi_edit.disabled = false;
 		document.cominfo.empstat.disabled = true;
 
		alldata = resp.split("-*-");
		//alert(alldata);
		otherinfo= alldata[0].split("=*=") ;
		//alert(otherinfo);
		//alert(otherinfo[1]);
		document.cominfo.empid.value = otherinfo[0];
		document.cominfo.padd.value = otherinfo[1];
		document.cominfo.fadd.value = otherinfo[2];
		//alert(otherinfo[3]);
		document.cominfo.emp_last_dg.value = otherinfo[3];
		document.cominfo.pass_year.value = otherinfo[4];
		document.cominfo.edu_insti.value = otherinfo[5];
		document.cominfo.skill_dept.value = otherinfo[6];
		document.cominfo.skill_year.value = otherinfo[7];
		document.cominfo.skill_com_na.value = otherinfo[8];
		document.cominfo.name.value = otherinfo[9];
		document.cominfo.fname.value = otherinfo[10];
		document.cominfo.mname.value = otherinfo[11];
		document.cominfo.dob.value = otherinfo[12];
		//alert(otherinfo[13]);
		document.cominfo.reli.value = otherinfo[13];
		document.cominfo.sex.value = otherinfo[14];
		document.cominfo.ms.value = otherinfo[15];
		document.cominfo.bgroup.value = otherinfo[16];
		var img = otherinfo[17];
		hostname = window.location.hostname;
		document.image.src = "http://"+hostname+"/erp_target_net/uploads/photo/"+img;
		document.image.height = 150;
		document.image.width = 130;
		
		document.cominfo.bname.value = otherinfo[18];
		document.cominfo.id_skill.value    = otherinfo[19];
	
		
				
		com_info = alldata[1].split("=*=");
		//alert(com_info);
		
		
		document.cominfo.idcard.value = com_info[1];
		
		//document.cominfo.section.value = com_info[];
		
		//dept_id_name = alldata[2].split("===");
		//dept_id = dept_id_name[0].split("=*=");
		//dept_name = dept_id_name[1].split("=*=");
		//document.cominfo.dept.options.length=0;
		//for (i=0; i<dept_id.length; i++){
		//	document.cominfo.dept.options[i]=new Option(dept_name[i],dept_id[i], false, true);
		//	}
		
		
		
		dept_id_name = alldata[2].split("===");
		dept_id = dept_id_name[0].split("=*=");
		dept_name = dept_id_name[1].split("=*=");
		document.cominfo.dept.options.length=0;
		for (i=0; i<dept_id.length; i++){
			if( com_info[2] == dept_name[i])
			{
				document.cominfo.dept.options[i]=new Option(dept_name[i],dept_id[i], false, true);
			}
			else
			document.cominfo.dept.options[i]=new Option(dept_name[i],dept_id[i], false, false);
		}
		
		//alert(com_info[3]);
		
		
		sec_id_name = alldata[3].split("===");
		//alert(sec_id_name);
		sec_id = sec_id_name[0].split("***");
		sec_name = sec_id_name[1].split("***");
		document.cominfo.sec.options.length=0;
		for (i=0; i<sec_id.length; i++){
			if( com_info[3] == sec_name[i])
			{
				document.cominfo.sec.options[i]=new Option(sec_name[i],sec_id[i], false,true);
			}
			else
				document.cominfo.sec.options[i]=new Option(sec_name[i],sec_id[i], false, false);
			
		}
		
		
		//alert(com_info[4]);
		
		
		line_id_name = alldata[4].split("===");
		line_id = line_id_name[0].split("***");
		line_name = line_id_name[1].split("***");
		document.cominfo.line.options.length=0;
		for (i=0; i<line_id.length; i++){
			if( com_info[4] == line_name[i])
			{
				//alert(line_name[i]);
				document.cominfo.line.options[i]=new Option(line_name[i],line_id[i], false,true);
			}
			else
			//alert(line_name[i]);
			document.cominfo.line.options[i]=new Option(line_name[i],line_id[i], false, false);
			
		}
		
		//alert(com_info[5])
		
		desig_id_name = alldata[5].split("===");
		desig_id = desig_id_name[0].split("***");
		desig_name = desig_id_name[1].split("***");
		document.cominfo.desig.options.length=0;
		for (i=0; i<desig_id.length; i++){
			if( com_info[5] == desig_name[i])
			{
				//alert(dept_name[i]);
				document.cominfo.desig.options[i]=new Option(desig_name[i],desig_id[i], false,true);
			}
			else
			document.cominfo.desig.options[i]=new Option(desig_name[i],desig_id[i], false, false);
			
		}
		
		
		
		operation_id_name = alldata[6].split("===");
		//alert(operation_id_name);
		operation_id = operation_id_name[0].split("=*=");
		operation_name = operation_id_name[1].split("=*=");
		document.cominfo.operation.options.length=0;
		for (i=0; i<operation_id.length; i++){
			if( com_info[6] == operation_name[i])
			{
				//alert(dept_name[i]);
				document.cominfo.operation.options[i]=new Option(operation_name[i],operation_id[i], false,true);
			}
			else
			document.cominfo.operation.options[i]=new Option(operation_name[i],operation_id[i], false, false);
			
		}
		
		position_id_name = alldata[7].split("===");
		position_id = position_id_name[0].split("=*=");
		position_name = position_id_name[1].split("=*=");
		document.cominfo.position.options.length=0;
		for (i=0; i<position_id.length; i++){
			if( com_info[7] == position_name[i])
			{
				//alert(dept_name[i]);
				document.cominfo.position.options[i]=new Option(position_name[i],position_id[i], false,true);
			}
			else
			document.cominfo.position.options[i]=new Option(position_name[i],position_id[i], false, false);
		
		}
		
		salg_id_name = alldata[8].split("===");
		salg_id = salg_id_name[0].split("***");
		salg_name = salg_id_name[1].split("***");
		document.cominfo.salg.options.length=0;
		for (i=0; i<salg_id.length; i++){
			if( com_info[8] == salg_name[i])
			{
				//alert(dept_name[i]);
				document.cominfo.salg.options[i]=new Option(salg_name[i],salg_id[i], false,true);
			}
			else
			document.cominfo.salg.options[i]=new Option(salg_name[i],salg_id[i], false, false);
			
		}
		
		
		
		empstat_id_name = alldata[9].split("===");
		empstat_id = empstat_id_name[0].split("***");
		empstat_name = empstat_id_name[1].split("***");
		document.cominfo.empstat.options.length=0;
		for (i=0; i<empstat_id.length; i++){
			if( com_info[9] == empstat_name[i])
			{
				document.cominfo.empstat.options[i]=new Option(empstat_name[i],empstat_id[i], false,true);
			}
			else
				document.cominfo.empstat.options[i]=new Option(empstat_name[i],empstat_id[i], false, false);
		}
		
		empshift_id_name = alldata[10].split("===");
		//alert(empshift_id_name);
		empshift_id = empshift_id_name[0].split("***");
		empshift_name = empshift_id_name[1].split("***");
		document.cominfo.empshift.options.length=0;
		for (i=0; i<empshift_id.length; i++){
			if( com_info[10] == empshift_name[i])
			{
				document.cominfo.empshift.options[i]=new Option(empshift_name[i],empshift_id[i], false,true);
			}
			else
			document.cominfo.empshift.options[i]=new Option(empshift_name[i],empshift_id[i], false, false);
			
		}
		
		attbonus_id_name = alldata[11].split("===");
		
		attbonus_id = attbonus_id_name[0].split("***");
		//alert(attbonus_id);
		attbonus_name = attbonus_id_name[1].split("***");
		//alert(com_info[15]);
		document.cominfo.attbonus.options.length=0;
		for (i=0; i<attbonus_id.length; i++){
			
			if( com_info[15] == attbonus_id[i])
			{
				document.cominfo.attbonus.options[i]=new Option(attbonus_name[i],attbonus_id[i], false,true);
			}
			else
				document.cominfo.attbonus.options[i]=new Option(attbonus_name[i],attbonus_id[i], false, false);
			}
		
	attbonus_id_name = alldata[11].split("===");
	attbonus_id = attbonus_id_name[0].split("***");
	attbonus_name = attbonus_id_name[1].split("***");
	
		var otname=new Array(); 
		var otid=new Array(); 
		otname[0]="Yes";
		otname[1]="No"; 
		otid[0] =0; 
		otid[1] =1;
	
	
	
	
	document.cominfo.transport.options.length=0;
		for (i=0; i<=1; i++){
			
			if( com_info[13] == otid[i])
			{
				//alert(dept_name[i]);
				document.cominfo.transport.options[i]=new Option(otname[i],otid[i], false,true);
			}
			else
			document.cominfo.transport.options[i]=new Option(otname[i],otid[i], false, false);
		}
		
	
	
	
	document.cominfo.otentitle.options.length=0;
		for (i=0; i<=1; i++){
			
			if( com_info[12] == otid[i])
			{
				//alert(dept_name[i]);
				document.cominfo.otentitle.options[i]=new Option(otname[i],otid[i], false,true);
			}
			else
			document.cominfo.otentitle.options[i]=new Option(otname[i],otid[i], false, false);
		}	
		
		
		document.cominfo.lunch.options.length=0;
		for (i=0; i<=1; i++){
			
			if( com_info[14] == otid[i])
			{
				//alert(dept_name[i]);
				document.cominfo.lunch.options[i]=new Option(otname[i],otid[i], false,true);
			}
			else
			document.cominfo.lunch.options[i]=new Option(otname[i],otid[i], false, false);
		}
		
		
		var stname=new Array(); 
		var stid=new Array(); 
		stname[0]="Fixed";
		stname[1]="Production"; 
		stid[0] =1; 
		stid[1] =2;
		
		
		document.cominfo.saltype.options.length=0;
		for (i=0; i<=1; i++){
			if( com_info[18] == stid[i])
			{
				document.cominfo.saltype.options[i]=new Option(stname[i],stid[i], false, true);
			}
			else
			document.cominfo.saltype.options[i]=new Option(stname[i],stid[i], false, false);
		}
		
		
		var sdname=new Array(); 
		var sdid=new Array(); 
		sdname[0]="Cash";
		sdname[1]="Bank"; 
		sdid[0] =1; 
		sdid[1] =2;
		
		
		document.cominfo.saldraw.options.length=0;
		for (i=0; i<=1; i++){
			if( com_info[17] == sdid[i])
			{
				document.cominfo.saldraw.options[i]=new Option(sdname[i],sdid[i], false, true);
			}
			else
			document.cominfo.saldraw.options[i]=new Option(sdname[i],sdid[i], false, false);
		}
		
		
		
		document.getElementById('ejd').value = com_info[19];
		//alert(com_info[11]) ;
		document.getElementById('gsal').value = com_info[11];
		var gsal = com_info[11];
		document.getElementById('cgsal').value = com_info[12];
		var cgsal = com_info[12];
		//alert(com_info[11]);
		//==================================BGMEA Salary Rule===================================
		/*var bsal = (gsal * 60) / 100;
		document.getElementById('bsal').value = bsal;
			
		var hrent = (gsal * 30) / 100;
		document.getElementById('hrent').value = hrent;
		
		var mallow = (gsal * 10) / 100;
		document.getElementById('mallow').value = mallow;*/
		//==================================BGMEA Salary Rule===================================
		
		//==================================LOCAL Salary Rule===================================
		var mallow = 750;
		document.getElementById('mallow').value = mallow;
		
		var bsal = Math.round((gsal - mallow) / 150 * 100);
		document.getElementById('bsal').value = bsal;
			
		var hrent = Math.round((bsal * 50) / 100);
		document.getElementById('hrent').value = hrent;



		var cmallow = 750;
		document.getElementById('cmallow').value = cmallow;
		
		var cbsal = Math.round((cgsal - cmallow) / 150 * 100);
		document.getElementById('cbsal').value = cbsal;
			
		var chrent = Math.round((cbsal * 50) / 100);
		document.getElementById('chrent').value = chrent;


				var food = 1250;
		document.getElementById('food').value = food;
		var transport = 450;
		document.getElementById('convence').value = transport;

 		var cfood = 1250;
		document.getElementById('cfood').value = cfood;
		var transport = 450;
		document.getElementById('cconvence').value = transport;
		//==================================LOCAL Salary Rule===================================
		if(com_info[9] == 'Resign')
		{
			
			document.cominfo.pi_edit.disabled = true;			
			}
		
	}
}

eempid = empid;

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
 
 ajaxRequest.open("POST", "com_info_search/", true);
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
		
		document.getElementById('ejd').value = companyinfo[19];
		
		var sdname=new Array(); 
		var sdid=new Array(); 
		sdname[0]="Cash";
		sdname[1]="Bank"; 
		sdid[0] =1; 
		sdid[1] =2;
		
		
		document.cominfo.saldraw.options.length=0;
		for (i=0; i<=1; i++){
			if( companyinfo[17] == sdid[i])
			{
				document.cominfo.saldraw.options[i]=new Option(sdname[i],sdid[i], false, true);
			}
			else
			document.cominfo.saldraw.options[i]=new Option(sdname[i],sdid[i], false, false);
		}
		
		var stname=new Array(); 
		var stid=new Array(); 
		stname[0]="Fixed";
		stname[1]="Production"; 
		stid[0] =1; 
		stid[1] =2;
		
		
		document.cominfo.saltype.options.length=0;
		for (i=0; i<=1; i++){
			if( companyinfo[18] == stid[i])
			{
				document.cominfo.saltype.options[i]=new Option(stname[i],stid[i], false, true);
			}
			else
			document.cominfo.saltype.options[i]=new Option(stname[i],stid[i], false, false);
		}
		
		
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
 ajaxRequest.open("POST", "dept_search/", true);
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
 ajaxRequest.open("POST", "section_search/", true);
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
 ajaxRequest.open("POST", "desig_search/", true);
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
 ajaxRequest.open("POST", "grade_search/", true);
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
 ajaxRequest.open("POST", "empstat_search/", true);
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
 ajaxRequest.open("POST", "empshift_search/", true);
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
 ajaxRequest.open("POST", "attbonus_search/", true);
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
	document.getElementById('designationnamebng').value="";
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








function all_enable_save(){
	document.cominfo.pi_save.disabled = false;
	document.cominfo.empid.focus();
	//document.getElementById('edu_skill_empid').value="";
}






function enable_save(){
	
	//window.location = "personal_info_view1";
	document.getElementById('search_empid').value="";
	document.getElementById('empid').value = "";
	document.getElementById('name').value = "";
	document.getElementById('mname').value = "";
	document.getElementById('fname').value = "";
	document.getElementById('padd').value = "";
	document.getElementById('fadd').value = "";
	document.getElementById('dob').value = "";
	document.getElementById('source').value = "";
		
	document.getElementById('idcard').value = "";
	document.getElementById('gsal').value = "";
	document.getElementById('bsal').value = "";
	document.getElementById('hrent').value = "";
	document.getElementById('mallow').value = "";
	document.getElementById('ejd').value = "";
	
	document.getElementById('emp_last_dg').value = "";
	document.getElementById('pass_year').value = "";
	document.getElementById('edu_insti').value = "";
	document.getElementById('skill_dept').value = "";
	document.getElementById('skill_year').value = "";
	document.getElementById('skill_com_na').value = "";
	document.getElementById('bname').value = "";
	document.image.src ="";	
	document.cominfo.pi_save.disabled = false;
	document.cominfo.empstat.disabled = false;
	document.cominfo.pi_edit.disabled = true;
	document.cominfo.empid.focus();
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
	document.getElementById('sectionnamebng').value="";
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
 var queryString="";
 ajaxRequest.open("POST", "manual_atten_co/", true);
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
		//document.entry.dept.options[0]=new Option("Select","Select", true, false);
		for (i=0; i<dept_id.length; i++){
			//document.entry.dept.options[i+1]=new Option(dept_name[i],dept_id[i], false, false);
			document.entry.dept.options[i]=new Option(dept_name[i],dept_id[i], false, false);

		}
				
		sec_idname = alldata[1].split("===");
		sec_id = sec_idname[0].split("***");
		sec_name = sec_idname[1].split("***");
	 		
		document.entry.section.options.length=0;
		//document.entry.section.options[0]=new Option("Select","Select", true, false); 
		for (i=0; i<sec_id.length; i++){
			//alert(sec_name[i]);
			//document.entry.section.options[i+1]=new Option(sec_name[i],sec_id[i], false, false);
			document.entry.section.options[i]=new Option(sec_name[i],sec_id[i], false, false);

		}
		
		
		line_idname = alldata[2].split("===");
		line_id = line_idname[0].split("***");
		line_name = line_idname[1].split("***");
		
		document.entry.line.options.length=0;
		//document.entry.line.options[0]=new Option("Select","Select", true, false); 
		for (i=0; i<line_id.length; i++){
			//document.entry.line.options[i+1]=new Option(line_name[i],line_id[i], false, false);
			document.entry.line.options[i]=new Option(line_name[i],line_id[i], false, false);
		}
		
		
		desig_idname = alldata[3].split("===");
		desig_id = desig_idname[0].split("***");
		desig_name = desig_idname[1].split("***");
		
		document.entry.desig.options.length=0;
		//document.entry.desig.options[0]=new Option("Select","Select", true, false); 
		for (i=0; i<desig_id.length; i++){
			//document.entry.desig.options[i+1]=new Option(desig_name[i],desig_id[i], false, false);
			document.entry.desig.options[i]=new Option(desig_name[i],desig_id[i], false, false);
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
 ajaxRequest.open("POST", "manual_atten_co/", true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send();
 
  
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		//alert(resp);
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
	

function salary_get_data()
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
 ajaxRequest.open("POST", "manual_atten_co/", true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send();
 
  
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		
		alldata = resp.split("$$$");
		
		dept_idname = alldata[0].split("===");
		dept_id = dept_idname[0].split("***");
	    dept_name = dept_idname[1].split("***");
				
		document.salary_report.salary_dept.options.length=0;
		document.salary_report.salary_dept.options[0]=new Option("Select","Select", true, false);
		for (i=0; i<dept_id.length; i++){
			document.salary_report.salary_dept.options[i+1]=new Option(dept_name[i],dept_id[i], false, false);

		}
				
		sec_idname = alldata[1].split("===");
		sec_id = sec_idname[0].split("***");
		sec_name = sec_idname[1].split("***");
	 		
		document.salary_report.salary_section.options.length=0;
		document.salary_report.salary_section.options[0]=new Option("Select","Select", true, false); 
		for (i=0; i<sec_id.length; i++){
			//alert(sec_name[i]);
			document.salary_report.salary_section.options[i+1]=new Option(sec_name[i],sec_id[i], false, false);

		}
		
		
		line_idname = alldata[2].split("===");
		line_id = line_idname[0].split("***");
		line_name = line_idname[1].split("***");
		
		document.salary_report.salary_line.options.length=0;
		document.salary_report.salary_line.options[0]=new Option("Select","Select", true, false); 
		for (i=0; i<line_id.length; i++){
			document.salary_report.salary_line.options[i+1]=new Option(line_name[i],line_id[i], false, false);

		}
		
		
		desig_idname = alldata[3].split("===");
		desig_id = desig_idname[0].split("***");
		desig_name = desig_idname[1].split("***");
		
		document.salary_report.salary_desig.options.length=0;
		document.salary_report.salary_desig.options[0]=new Option("Select","Select", true, false); 
		for (i=0; i<desig_id.length; i++){
			document.salary_report.salary_desig.options[i+1]=new Option(desig_name[i],desig_id[i], false, false);

		}
	 //document.getElementById('search_empid').value="";
	//document.cominfo.save.disabled = false;
	//document.cominfo.com_empid.focus();
	}
}


	}
	
function other_get_data()
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
 ajaxRequest.open("POST", "manual_atten_co/", true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send();
 
  
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		
		alldata = resp.split("$$$");
		
		dept_idname = alldata[0].split("===");
		dept_id = dept_idname[0].split("***");
	    dept_name = dept_idname[1].split("***");
				
		document.other_report.other_dept.options.length=0;
		document.other_report.other_dept.options[0]=new Option("Select","Select", true, false);
		for (i=0; i<dept_id.length; i++){
			document.other_report.other_dept.options[i+1]=new Option(dept_name[i],dept_id[i], false, false);

		}
				
		sec_idname = alldata[1].split("===");
		sec_id = sec_idname[0].split("***");
		sec_name = sec_idname[1].split("***");
	 		
		document.other_report.other_section.options.length=0;
		document.other_report.other_section.options[0]=new Option("Select","Select", true, false); 
		for (i=0; i<sec_id.length; i++){
			//alert(sec_name[i]);
			document.other_report.other_section.options[i+1]=new Option(sec_name[i],sec_id[i], false, false);

		}
		
		
		line_idname = alldata[2].split("===");
		line_id = line_idname[0].split("***");
		line_name = line_idname[1].split("***");
		
		document.other_report.other_line.options.length=0;
		document.other_report.other_line.options[0]=new Option("Select","Select", true, false); 
		for (i=0; i<line_id.length; i++){
			document.other_report.other_line.options[i+1]=new Option(line_name[i],line_id[i], false, false);

		}
		
		
		desig_idname = alldata[3].split("===");
		desig_id = desig_idname[0].split("***");
		desig_name = desig_idname[1].split("***");
		
		document.other_report.other_desig.options.length=0;
		document.other_report.other_desig.options[0]=new Option("Select","Select", true, false); 
		for (i=0; i<desig_id.length; i++){
			document.other_report.other_desig.options[i+1]=new Option(desig_name[i],desig_id[i], false, false);

		}
	 //document.getElementById('search_empid').value="";
	//document.cominfo.save.disabled = false;
	//document.cominfo.com_empid.focus();
	}
}


	}
	


//=====================================================================================================================================================================


//-->




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

 ajaxRequest.open("POST", "section_manual/", true);
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
 
 ajaxRequest.open("POST", "edu_skill_insert/", true);
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
 
 ajaxRequest.open("POST", "ajax_edu_delete/", true);
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
 
 ajaxRequest.open("POST", "ajaxSearch_edu_skill/", true);
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
 
 ajaxRequest.open("POST", "edu_update/", true);
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
 
 ajaxRequest.open("POST", "grade_insert/", true);
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
var validid=validateForm_grade();
if(validid==false)
	{
		return;
	}
var okyes;
 okyes=confirm('Are you sure you want to Insert this?');
 if(okyes==false) return;
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
 
 
 ajaxRequest.open("POST", "grade_update/", true);
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
 ajaxRequest.open("POST", "ajaxSearch_con_grade/", true);
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
	var validid=validateForm_grade();
if(validid==false)
	{
		return;
	}
var okyes;
 okyes=confirm('Are you sure you want to Insert this?');
 if(okyes==false) return;
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
 
 ajaxRequest.open("POST", "ajax_grade_delete/", true);
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
 
 ajaxRequest.open("POST", "department_insert/", true);
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
 
 ajaxRequest.open("POST", "find_late/", true);
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
 
 ajaxRequest.open("POST", "find_late/", true);
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
 
 
month= document.getElementById('report_month').value;
year= document.getElementById('report_year').value;

hostname = window.location.hostname;
url =  "http://"+hostname+"/payroll/index.php/payroll_con/monthly_att_register/"+year+"/"+month+"/"+col_desig+"/"+col_line+"/"+col_section+"/"+col_dept+"/"+col_all;;

myRef = window.open(url,'mywin',"menubar=1,resizable=1,scrollbars=1,width=1500,height=800");
myRef.moveTo(50,50);
}

function sal_summary_report()
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
        // alert("Your browser broke!");
         return false;
      }
   }
 }
 
month= document.getElementById('report_month_sal').value;
year= document.getElementById('report_year_sal').value;

var year_month = year+"-"+month;

hostname = window.location.hostname;
url =  "http://"+hostname+"/pr/magpie_com1/index.php/payroll_con/salary_summary/"+year_month;

sal_rep = window.open(url,'sal_rep',"menubar=1,resizable=1,scrollbars=1,width=1500,height=800");
sal_rep.moveTo(50,50);
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


function left_emp_report()
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
 
var other_start_date= document.getElementById('other_start_date').value;
var other_end_date= document.getElementById('other_end_date').value;

if(other_start_date =='' || other_end_date=='')
{
	alert("Please enter date");
	return;
	}

var other_start = document.getElementById('other_start').value;
var desig= document.getElementById('other_desig').value;
var line= document.getElementById('other_line').value;
var section= document.getElementById('other_section').value;
var dept= document.getElementById('other_dept').value;

if(other_start=='' || other_start=='select')
{
	alert("Please Select options");
	return;
}

col_all = other_start;

if(desig !='Select')
{
	var col_desig = desig;
	var col_all = "undefined";
}
if(line !='Select')
{
	var col_line = line;
	var col_all = "undefined";
}
if(section !='Select')
{
	var col_section = section;
	var col_all = "undefined";
}
if(dept !='Select')
{
	var col_dept = dept;
	var col_all = "undefined";
}

 
hostname = window.location.hostname;
url =  "http://"+hostname+"/payroll/index.php/payroll_con/left_emp_report/"+other_start_date+"/"+other_end_date+"/"+col_desig+"/"+col_line+"/"+col_section+"/"+col_dept+"/"+col_all;
myRef = window.open(url,'mywin',"menubar=1,resizable=1,scrollbars=1,width=1500,height=800");
myRef.moveTo(50,50);
}


function resign_emp_report()
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
 
var other_start_date= document.getElementById('other_start_date').value;
var other_end_date= document.getElementById('other_end_date').value;

if(other_start_date =='' || other_end_date=='')
{
	alert("Please enter date");
	return;
	}

var other_start = document.getElementById('other_start').value;
var desig= document.getElementById('other_desig').value;
var line= document.getElementById('other_line').value;
var section= document.getElementById('other_section').value;
var dept= document.getElementById('other_dept').value;

if(other_start=='' || other_start=='select')
{
	alert("Please Select options");
	return;
}

col_all = other_start;

if(desig !='Select')
{
	var col_desig = desig;
	var col_all = "undefined";
}
if(line !='Select')
{
	var col_line = line;
	var col_all = "undefined";
}
if(section !='Select')
{
	var col_section = section;
	var col_all = "undefined";
}
if(dept !='Select')
{
	var col_dept = dept;
	var col_all = "undefined";
}

 
hostname = window.location.hostname;
url =  "http://"+hostname+"/payroll/index.php/payroll_con/resign_emp_report/"+other_start_date+"/"+other_end_date+"/"+col_desig+"/"+col_line+"/"+col_section+"/"+col_dept+"/"+col_all;
myRef = window.open(url,'mywin',"menubar=1,resizable=1,scrollbars=1,width=1500,height=800");
myRef.moveTo(50,50);
}

function join_emp_report()
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
 
var other_start_date= document.getElementById('other_start_date').value;
var other_end_date= document.getElementById('other_end_date').value;

if(other_start_date =='' || other_end_date=='')
{
	alert("Please enter date");
	return;
	}

var other_start = document.getElementById('other_start').value;
var desig= document.getElementById('other_desig').value;
var line= document.getElementById('other_line').value;
var section= document.getElementById('other_section').value;
var dept= document.getElementById('other_dept').value;

if(other_start=='' || other_start=='select')
{
	alert("Please Select options");
	return;
}

col_all = other_start;

if(desig !='Select')
{
	var col_desig = desig;
	var col_all = "undefined";
}
if(line !='Select')
{
	var col_line = line;
	var col_all = "undefined";
}
if(section !='Select')
{
	var col_section = section;
	var col_all = "undefined";
}
if(dept !='Select')
{
	var col_dept = dept;
	var col_all = "undefined";
}

 
hostname = window.location.hostname;
url =  "http://"+hostname+"/payroll/index.php/payroll_con/new_join_emp_report/"+other_start_date+"/"+other_end_date+"/"+col_desig+"/"+col_line+"/"+col_section+"/"+col_dept+"/"+col_all;
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
 
 ajaxRequest.open("POST", "shift_change_search/", true);
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

var start= document.getElementById('salary_start').value;
var desig= document.getElementById('salary_desig').value;
var line= document.getElementById('salary_line').value;
var section= document.getElementById('salary_section').value;
var dept= document.getElementById('salary_dept').value;
var emp_status= document.getElementById('salary_emp_status').value;

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

month= document.getElementById('report_month_sal').value;
year= document.getElementById('report_year_sal').value;

hostname = window.location.hostname;
url =  "http://"+hostname+"/payroll/index.php/payroll_con/monthly_salary_sheet/"+year+"/"+month+"/"+col_desig+"/"+col_line+"/"+col_section+"/"+col_dept+"/"+col_all+"/"+emp_status;

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
 
 var start= document.getElementById('salary_start').value;
var desig= document.getElementById('salary_desig').value;
var line= document.getElementById('salary_line').value;
var section= document.getElementById('salary_section').value;
var dept= document.getElementById('salary_dept').value;
var emp_status= document.getElementById('salary_emp_status').value;

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

month= document.getElementById('report_month_sal').value;
year= document.getElementById('report_year_sal').value;



hostname = window.location.hostname;
url =  "http://"+hostname+"/payroll/index.php/payroll_con/salary_summary_report/"+year+"/"+month+"/"+col_desig+"/"+col_line+"/"+col_section+"/"+col_dept+"/"+col_all+"/"+emp_status;

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

function payslip_report()
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

start_id = document.getElementById('pay_id_start').value;
end_id   = document.getElementById('pay_id_end').value;

month= document.getElementById('report_month_sal').value;
year= document.getElementById('report_year_sal').value;

var sal_month = year+"-"+month+"-01";
	
	if(start_id==''){
	 start_id = "undefine";
	 }
	if(end_id==''){
	 end_id = "undefine";
	}
var start= document.getElementById('salary_start').value;
var desig= document.getElementById('salary_desig').value;
var line= document.getElementById('salary_line').value;
var section= document.getElementById('salary_section').value;
var dept= document.getElementById('salary_dept').value;
//alert(start);

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

hostname = window.location.hostname;
url =  "http://"+hostname+"/payroll/index.php/payroll_con/payslip_report/"+start_id+"/"+end_id+"/"+sal_month+"/"+col_desig+"/"+col_line+"/"+col_section+"/"+col_dept+"/"+col_all;

myRef = window.open(url,'mywin',"menubar=1,resizable=1,scrollbars=1,width=900,height=800");
myRef.moveTo(300,50);
}


function attendance_process()
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
 	p_start_date= document.getElementById('p_start_date').value;
	
	if(p_start_date =='')
	{
		alert('Please select date');
		return ;
		}
 
 var okyes;
 okyes=confirm('Are you sure you want to start process?');
if(okyes==false) return;
	  $("#loader").show();
	hostname = window.location.hostname;
	url =  "http://"+hostname+"/erp_target_net/index.php/attn_process_con/attn_process/";

	var queryString="p_start_date="+p_start_date;
	
	ajaxRequest.open("POST", url, true);
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

function earn_leave_process()
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

	var okyes;
	okyes=confirm('Are you sure you want to start process?');
	if(okyes==false) return;
		$("#loader").show();
		month= document.getElementById('report_month_sal').value;
		year= document.getElementById('report_year_sal').value;
		hostname = window.location.hostname;
		url =  "http://"+hostname+"/erp_target_net/index.php/salary_process_con/earn_leave_process/";
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

function salary_process(i)
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

	var okyes;
	okyes=confirm('Are you sure you want to start process?');
	if(okyes==false) return;
		$("#loader").show();
		month= document.getElementById('report_month_sal').value;
		year= document.getElementById('report_year_sal').value;
		process_check = i;
		hostname = window.location.hostname;
		url =  "http://"+hostname+"/erp_target_net/index.php/salary_process_con/salary_process/";
		var queryString="year="+year+"&month="+month+"&process_check="+process_check;
		
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


function production_salary_process(i)
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

 	var okyes;
	okyes=confirm('Are you sure you want to start process?');
	if(okyes==false) return;
		$("#loader_production").show();
		month= document.getElementById('report_month_sal').value;
		year= document.getElementById('report_year_sal').value;
		process_check = i;


		hostname = window.location.hostname;
		url =  "http://"+hostname+"/erp_target_net/index.php/production_process_con/production_salary_process/";
		var queryString="year="+year+"&month="+month+"&process_check="+process_check;
		
		ajaxRequest.open("POST",url, true);
		ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		ajaxRequest.send(queryString);
		ajaxRequest.onreadystatechange = function(){
		if(ajaxRequest.readyState == 4){
			var resp = ajaxRequest.responseText;
			$("#loader_production").hide();
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



month= document.getElementById('report_month').value;
year= document.getElementById('report_year').value;
year_month = year+"-"+month;
var status = "A"

start_date= document.getElementById('start_date').value;
end_date= document.getElementById('end_date').value;


hostname = window.location.hostname;
url =  "http://"+hostname+"/payroll/index.php/payroll_con/continuous_report/"+start_date+"/"+end_date+"/"+year_month+"/"+status+"/"+col_desig+"/"+col_line+"/"+col_section+"/"+col_dept+"/"+col_all;

myRef = window.open(url,'mywin',"menubar=1,resizable=1,scrollbars=1,width=1500,height=800");
myRef.moveTo(0,0);

}


//=========================Present Report===========================



function present_report()
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



month= document.getElementById('report_month').value;
year= document.getElementById('report_year').value;
year_month = year+"-"+month;
var status = "P"

start_date= document.getElementById('start_date').value;
end_date= document.getElementById('end_date').value;


hostname = window.location.hostname;
url =  "http://"+hostname+"/payroll/index.php/payroll_con/continuous_report/"+start_date+"/"+end_date+"/"+year_month+"/"+status+"/"+col_desig+"/"+col_line+"/"+col_section+"/"+col_dept+"/"+col_all;

myRef = window.open(url,'mywin',"menubar=1,resizable=1,scrollbars=1,width=1500,height=800");
myRef.moveTo(0,0);

}


//===========================Leave Report========================

function leave_report()
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



month= document.getElementById('report_month').value;
year= document.getElementById('report_year').value;
year_month = year+"-"+month;
var status = "L"

start_date= document.getElementById('start_date').value;
end_date= document.getElementById('end_date').value;


hostname = window.location.hostname;
url =  "http://"+hostname+"/payroll/index.php/payroll_con/continuous_report/"+start_date+"/"+end_date+"/"+year_month+"/"+status+"/"+col_desig+"/"+col_line+"/"+col_section+"/"+col_dept+"/"+col_all;

myRef = window.open(url,'mywin',"menubar=1,resizable=1,scrollbars=1,width=1500,height=800");
myRef.moveTo(0,0);

}
	
function continuous_late_report()
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



month= document.getElementById('report_month').value;
year= document.getElementById('report_year').value;
year_month = year+"-"+month;


start_date= document.getElementById('start_date').value;
end_date= document.getElementById('end_date').value;


hostname = window.location.hostname;
url =  "http://"+hostname+"/payroll/index.php/payroll_con/continuous_late_report/"+start_date+"/"+end_date+"/"+year_month+"/"+col_desig+"/"+col_line+"/"+col_section+"/"+col_dept+"/"+col_all;

myRef = window.open(url,'mywin',"menubar=1,resizable=1,scrollbars=1,width=1500,height=800");
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
 
 if(start_leave_date=='' || start_leave_date==null){
 	alert("Please insert Strat Date");
	return;
 }
 

// alert(start_leave_date);
var queryString="empid_leave="+empid_leave+"&start_leave_date="+start_leave_date+"&end_leave_date="+end_leave_date+"&leave_type="+leave_type;

hostname = window.location.hostname;
url =  "http://"+hostname+"/erp_target_net/index.php/entry_system_con/save_leave_co/";
 
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
	/*document.getElementById('emp_id').value="";
	document.getElementById('find_year').value="";
	
	document.getElementById('c_leave').value="";
	document.getElementById('c_leave_balance').value="";
	
	document.getElementById('s_leave').value="";
	document.getElementById('s_leave_balance').value="";
	
	document.getElementById('e_leave').value="";
	document.getElementById('e_leave_balance').value="";
	
	document.getElementById('m_leave').value="";
	document.getElementById('m_leave_balance').value="";
	
	document.getElementById('p_leave').value="";
	document.getElementById('p_leave_balance').value="";*/
	
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

  if(empid=='' || empid==null){
 	alert("Please insert employee ID");
	return;
 }
 
  if(year=='' || year==null){
 	alert("Please insert year");
	return;
 }
hostname = window.location.hostname;
url =  "http://"+hostname+"/erp_target_net/index.php/entry_system_con/leave_transaction_co/";

 var queryString="empid="+empid+"&year="+year; 
 ajaxRequest.open("POST", url, true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send(queryString);
 
 
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		//alert(resp);
		if(resp == "Invalid employee ID"){
			alert("Employee ID does not exist.");
			empty_leave();
			return;
			}
		alldata = resp.split("***");
		
		personalinfo = alldata[0].split("-*-");
		info_leave_com = alldata[1].split("-*-");
		//alert(personalinfo);
		if(info_leave_com[5] =='Resign employee')
		{
			alert("Resign Employee");
			return;
			}
		else if(info_leave_com[5] =='Left employee')
		{
			alert("Left Employee");
			return;
			}
		
		var total_casual=document.getElementById('c_leave').value = personalinfo[0];
		var balance_casual=info_leave_com[0]-total_casual;
		 document.getElementById('c_leave_balance').value = balance_casual;
	 
		 var total_sick=document.getElementById('s_leave').value = personalinfo[1];
		 var balance_sick=info_leave_com[1]-total_sick;
		 document.getElementById('s_leave_balance').value = balance_sick;
		 
		 var total_earn=document.getElementById('e_leave').value = personalinfo[2];
		 var balance_earn=info_leave_com[2];
		 document.getElementById('e_leave_balance').value = balance_earn;
		 
		  var total_maternity=document.getElementById('m_leave').value = personalinfo[3];
		 var balance_maternity=info_leave_com[3]-total_maternity;
		 document.getElementById('m_leave_balance').value = balance_maternity;
		 
		  var total_paternity=document.getElementById('p_leave').value = personalinfo[4];
		 var balance_paternity=info_leave_com[4]-total_paternity;
		 document.getElementById('p_leave_balance').value = balance_paternity;
		 
		 document.getElementById('emp_status').innerHTML = info_leave_com[5];
		
	}
}
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
   
    ajaxRequest.open("POST", "manual_att_entry_co/", true);
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
 
 ajaxRequest.open("POST", "search_operation_name/", true);
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
 
 ajaxRequest.open("POST", "save_operationname_co/", true);
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
 
 ajaxRequest.open("POST", "update_shift_time/", true);
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
 
 ajaxRequest.open("POST", "update_operationname_co/", true);
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

 ajaxRequest.open("POST", "delete_operationname_co/", true);
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

function advance_loan_insert(){
	
 var okyes;
 okyes=confirm('Are you sure you want to Submit?');
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
 
 var emp_id 	= document.getElementById('emp_id').value;
 var loan_amt 	= document.getElementById('loan_amt').value;
 var pay_amt 	= document.getElementById('pay_amt').value;
 var loan_date 	= document.getElementById('loan_date').value;
 
  if(emp_id=='' || emp_id==null){
 	alert("Please enter employee ID");
	return;
 }
 
 if(loan_amt=='' || loan_amt==null){
 	alert("Please enter loan amount");
	return;
 }
 
 if(pay_amt=='' || pay_amt==null){
 	alert("Please enter payment/month");
	return;
 }
 
 if(loan_date=='' || loan_date==null){
 	alert("Please enter loan date");
	return;
 }
 

hostname = window.location.hostname;
url =  "http://"+hostname+"/erp_target_net/index.php/entry_system_con/advance_loan_insert/";
var queryString="emp_id="+emp_id+"&loan_amt="+loan_amt+"&pay_amt="+pay_amt+"&loan_date="+loan_date;

 ajaxRequest.open("POST",url, true);
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

function manual_entry_Delete()
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

 var empid_present_absent 	= document.getElementById('empid_present_absent').value;
 var startdate_present_absent 	= document.getElementById('startdate_present_absent').value;

 if(empid_present_absent=='' || empid_present_absent==null){
 	alert("Please enter employee ID");
	return;
 }
 
  if(startdate_present_absent=='' || startdate_present_absent==null){
 	alert("Please select date");
	return;
 }

 var queryString="empid_present_absent="+empid_present_absent+"&startdate_present_absent="+startdate_present_absent;
 
 ajaxRequest.open("POST", "manual_entry_Delete_co/", true);
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
 
 
	var work_off_date = document.getElementById('work_off_date').value;
	var work_off_empid = document.getElementById('work_off_empid').value;



	//var deduction_ad = document.getElementById('add_deduct_deduction').value;
	
	//var work_off_date = document.getElementById('work_off_date').value;
//alert(work_off_date);

	var dept_work_off = document.getElementById('dept_work_off').value;

	var section_work_off = document.getElementById('section_work_off').value;

	var line_work_off  = document.getElementById('line_work_off').value;

	var desig_work_off = document.getElementById('desig_work_off').value;
	
	var work_off_start = document.getElementById('work_off_start').value;
	
 if(work_off_date=='' || work_off_date==null){
 	alert("Please select date");
	return;
 }
 alert(work_off_start);
 if(work_off_start =='select'){
	 
 if(work_off_empid=='' || work_off_empid==null){
 	alert("Please select employee ID OR select Start for employee category");
	return;
 }
 }
 else
 {
 
 if(dept_work_off=='' || dept_work_off==null){
 	alert("Please select department");
	return;
 }
 
 if(section_work_off=='' || section_work_off==null){
 	alert("Please select section");
	return;
 }
 
 if(line_work_off=='' || line_work_off==null){
 	alert("Please select line number");
	return;
 }
 
 if(desig_work_off=='' || desig_work_off==null){
 	alert("Please select designation");
	return;
 }
 
 if(work_off_start=='' || work_off_start==null){
 	alert("Please select start");
	return;
 }
 }

	if (dept_work_off !="Select")
	{
		var column_work_off="dept_work_off_id";
		var column_value_work_off=dept_work_off;
	}
	
	else if(section_work_off !="Select")
	{
		var column_work_off="section_work_off_id";
		var column_value_work_off=section_work_off;
	}
 	else if(line_work_off !="Select")
	{
		var column_work_off="line_work_off_id" ;
		var column_value_work_off=line_work_off;
	}
	else if(desig_work_off !="Select")
	{
		var column_work_off="desig_work_off_id" ;
		var column_value_work_off=desig_work_off;
	}
	
	
	var queryString="work_off_date="+work_off_date+"&work_off_empid="+work_off_empid+"&column_work_off="+column_work_off+"&column_value_work_off="+column_value_work_off+"&work_off_start="+work_off_start;

	ajaxRequest.open("POST", "save_work_off_co/", true);
	//var in_time =entryname.in_time.value;
	//var in_time = document.entryname.elements.in_time.value;
//	var in_time = document.getElementById('in_time').value;
//	var in_time_in = document.getElementById('in_time_out').value;
//	

 	ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 	ajaxRequest.send(queryString);
 
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		alert(resp);
	}
}
}

function add_work_off()
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

 //var queryString="add_payment="+add_payment;
//alert(queryString);
 ajaxRequest.open("POST", "add_work_off_co/", true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send();
 
  

ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		//alert(resp);
		alldata = resp.split("$$$");
		//alert(alldata);
		dept_idname_work_off = alldata[0].split("===");
		dept_id_work_off = dept_idname_work_off[0].split("***");
	        dept_name_work_off = dept_idname_work_off[1].split("***");
				
		document.work_off.dept_work_off.options.length=0;
		document.work_off.dept_work_off.options[0]=new Option("Select","Select", true, false);
		for (i=0; i<dept_id_work_off.length; i++){
			document.work_off.dept_work_off.options[i+1]=new Option(dept_name_work_off[i],dept_id_work_off[i], false, false);

		}
				
		sec_idname_work_off = alldata[1].split("===");
		sec_id_work_off = sec_idname_work_off[0].split("***");
		sec_name_work_off = sec_idname_work_off[1].split("***");
	 		
		document.work_off.section_work_off.options.length=0;
		document.work_off.section_work_off.options[0]=new Option("Select","Select", true, false); 
		for (i=0; i<sec_id_work_off.length; i++){
			//alert(sec_name[i]);
			document.work_off.section_work_off.options[i+1]=new Option(sec_name_work_off[i],sec_id_work_off[i], false, false);

		}
		
		
		line_idname_work_off = alldata[2].split("===");
		line_id_work_off = line_idname_work_off[0].split("***");
		line_name_work_off = line_idname_work_off[1].split("***");
		
		document.work_off.line_work_off.options.length=0;
		document.work_off.line_work_off.options[0]=new Option("Select","Select", true, false); 
		for (i=0; i<line_id_work_off.length; i++){
			document.work_off.line_work_off.options[i+1]=new Option(line_name_work_off[i],line_id_work_off[i], false, false);

		}
		
		
		desig_idname_work_off = alldata[3].split("===");
		desig_id_work_off = desig_idname_work_off[0].split("***");
		desig_name_work_off = desig_idname_work_off[1].split("***");
		
		document.work_off.desig_work_off.options.length=0;
		document.work_off.desig_work_off.options[0]=new Option("Select","Select", true, false); 
		for (i=0; i<desig_id_work_off.length; i++){
			document.work_off.desig_work_off.options[i+1]=new Option(desig_name_work_off[i],desig_id_work_off[i], false, false);

		}
	 //document.getElementById('search_empid').value="";
	//document.cominfo.save.disabled = false;
	//document.cominfo.com_empid.focus();
	}
}
}

function find_style_winding()
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
 
 
  var article_name 	= document.getElementById('article_no').value;
  var queryString="article_name="+article_name;
 //alert(queryString);
 url =  "http://"+hostname+"/erp_target_net/index.php/winding_con/find_style_name_winding/";
 ajaxRequest.open("POST", url, true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send(queryString);
 
 
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		//alert(resp);
		alldata = resp.split("===");
		//alert(alldata[0]);
		
		document.getElementById('style_name').value = alldata[0];	
		var style_id = alldata[1];
		style_id = style_id.split("=*=");
		
		var style_type = alldata[2];
		style_type = style_type.split("=*=");
		
		document.price_code.style_type.options.length=0;
		document.price_code.style_type.options[0]=new Option("Select","Select", true, false);
		for (i=0; i<style_type.length; i++){
			document.price_code.style_type.options[i+1]=new Option(style_type[i],style_id[i], false, false);

		}
		
	}
 }
	
	
}



function find_style_knitting()
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
 
 
  var article_name 	= document.getElementById('article_no').value;
   if(article_name == 'Select')
  {
	  alert("Please select Article name");
	  return;
	  }
  var queryString="article_name="+article_name;
 //alert(queryString);
 url =  "http://"+hostname+"/erp_target_net/index.php/knitting_con/find_style_name_knitting/";
 ajaxRequest.open("POST", url, true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send(queryString);
 
 
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		//alert(resp);
		document.getElementById('style_name').value = resp;	
		
	}
 }
	
}

function find_style_linking()
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
 
 
  var article_name 	= document.getElementById('article_no').value;
   if(article_name == 'Select')
  {
	  alert("Please select Article name");
	  return;
	  }
  var queryString="article_name="+article_name;
 //alert(queryString);
 hostname = window.location.hostname;
 url =  "http://"+hostname+"/erp_target_net/index.php/linking_con/find_style_name_linking/";
 ajaxRequest.open("POST", url, true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send(queryString);
 
 
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		//alert(resp);
		document.getElementById('style_name').value = resp;	
		
	}
 }
	
}

function find_style_trimming()
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
 
 
  var article_name 	= document.getElementById('article_no').value;
   if(article_name == 'Select')
  {
	  alert("Please select Article name");
	  return;
	  }
  var queryString="article_name="+article_name;
 //alert(queryString);
 url =  "http://"+hostname+"/erp_target_net/index.php/trimming_con/find_style_name_trimming/";
 ajaxRequest.open("POST", url, true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send(queryString);
 
 
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		//alert(resp);
		document.getElementById('style_name').value = resp;	
		
	}
 }
}

function find_style_mending()
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
 
 
  var article_name 	= document.getElementById('article_no').value;
  if(article_name == 'Select')
  {
	  alert("Please select Article name");
	  return;
	  }
  var queryString="article_name="+article_name;
 //alert(queryString);
 url =  "http://"+hostname+"/erp_target_net/index.php/mending_con/find_style_name_mending/";
 ajaxRequest.open("POST", url, true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send(queryString);
 
 
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		//alert(resp);
		document.getElementById('style_name').value = resp;	
		
	}
 }
}

function find_style_zipper()
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
 
 
  var article_name 	= document.getElementById('article_no').value;
  if(article_name == 'Select')
  {
	  alert("Please select Article name");
	  return;
	  }
  var queryString="article_name="+article_name;
 //alert(queryString);
 url =  "http://"+hostname+"/erp_target_net/index.php/zipper_con/find_style_name_zipper/";
 ajaxRequest.open("POST", url, true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send(queryString);
 
 
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		//alert(resp);
		document.getElementById('style_name').value = resp;	
		
	}
 }
}

function find_style_iron()
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
 
 
  var article_name 	= document.getElementById('article_no').value;
  if(article_name == 'Select')
  {
	  alert("Please select Article name");
	  return;
	  }
  var queryString="article_name="+article_name;
 //alert(queryString);
 url =  "http://"+hostname+"/erp_target_net/index.php/iron_con/find_style_name_iron/";
 ajaxRequest.open("POST", url, true);
 ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 ajaxRequest.send(queryString);
 
 
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		//alert(resp);
		document.getElementById('style_name').value = resp;	
		
	}
 }
}

function price_code_save_winding()
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
	
	
	article_name = document.getElementById('article_no').value ;
	if(article_name == 'Select')
	{
		alert("Please select article no .");
		return false;
		}
	style_name =   document.getElementById('style_name').value ;
	style_type_id= document.getElementById('style_type').value ;
	if(style_type_id == 'Select')
	{
		alert("Please select Style type.");
		return false;
		}
	style_price = document.getElementById('style_price').value ;
	if(style_price =='')
	{
		alert("Please insert price.");
		return false;
		}
	style_type = document.getElementById('style_type').value ;
		

	var queryString="article_name="+article_name+"&style_name="+style_name+"&style_type_id="+style_type_id+"&style_price="+style_price+"&style_type="+style_type;
//	alert(queryString);
    url="http://"+hostname+"/erp_target_net/index.php/winding_con/price_code_winding_save/" ;
	ajaxRequest.open("POST" ,url , true);
	ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	ajaxRequest.send(queryString);
	
	ajaxRequest.onreadystatechange = function(){
		   if(ajaxRequest.readyState == 4)
			{
				var resp=ajaxRequest.responseText ;
				//alert(resp);
				document.getElementById('show').innerHTML = resp;
			}
		
		
		}
	


}

function price_code_save_mending()
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
	
	
	article_name = document.getElementById('article_no').value ;
	if(article_name == 'Select')
	{
		alert("Please select article no .");
		return false;
		}
	style_name =   document.getElementById('style_name').value ;
	style_type_id= document.getElementById('style_type').value ;
	if(style_type_id == 'Select')
	{
		alert("Please select Style type.");
		return false;
		}
	style_price = document.getElementById('style_price').value ;
	if(style_price =='')
	{
		alert("Please insert price.");
		return false;
		}
		

	var queryString="article_name="+article_name+"&style_name="+style_name+"&style_type_id="+style_type_id+"&style_price="+style_price;
//	alert(queryString);
    url="http://"+hostname+"/erp_target_net/index.php/mending_con/price_code_mending_save/" ;
	ajaxRequest.open("POST" ,url , true);
	ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	ajaxRequest.send(queryString);
	
	ajaxRequest.onreadystatechange = function(){
		   if(ajaxRequest.readyState == 4)
			{
				var resp=ajaxRequest.responseText ;
				document.getElementById('show').innerHTML = resp;
			}
		
		
		}
	
	
}


function price_code_save_zipper()
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
	
	
	article_name = document.getElementById('article_no').value ;
	if(article_name == 'Select')
	{
		alert("Please select article no .");
		return false;
		}
	style_name =   document.getElementById('style_name').value ;
	style_type_id= document.getElementById('style_type').value ;
	if(style_type_id == 'Select')
	{
		alert("Please select Style type.");
		return false;
		}
	style_price = document.getElementById('style_price').value ;
	if(style_price =='')
	{
		alert("Please insert price.");
		return false;
		}
		

	var queryString="article_name="+article_name+"&style_name="+style_name+"&style_type_id="+style_type_id+"&style_price="+style_price;
//	alert(queryString);
    url="http://"+hostname+"/erp_target_net/index.php/zipper_con/price_code_zipper_save/" ;
	ajaxRequest.open("POST" ,url , true);
	ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	ajaxRequest.send(queryString);
	
	ajaxRequest.onreadystatechange = function(){
		   if(ajaxRequest.readyState == 4)
			{
				var resp=ajaxRequest.responseText ;
				document.getElementById('show').innerHTML = resp;
			}
	}
}

function price_code_save_iron()
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
	
	
	article_name = document.getElementById('article_no').value ;
	if(article_name == 'Select')
	{
		alert("Please select article no .");
		return false;
		}
	style_name =   document.getElementById('style_name').value ;
	style_type_id= document.getElementById('style_type').value ;
	if(style_type_id == 'Select')
	{
		alert("Please select Style type.");
		return false;
		}
	style_price = document.getElementById('style_price').value ;
	if(style_price =='')
	{
		alert("Please insert price.");
		return false;
		}
		

	var queryString="article_name="+article_name+"&style_name="+style_name+"&style_type_id="+style_type_id+"&style_price="+style_price;
//	alert(queryString);
    url="http://"+hostname+"/erp_target_net/index.php/iron_con/price_code_iron_save/" ;
	ajaxRequest.open("POST" ,url , true);
	ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	ajaxRequest.send(queryString);
	
	ajaxRequest.onreadystatechange = function(){
		   if(ajaxRequest.readyState == 4)
			{
				var resp=ajaxRequest.responseText ;
				document.getElementById('show').innerHTML = resp;
			}
	}
}

function price_code_save_trimming()
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
	
	
	article_name = document.getElementById('article_no').value ;
	if(article_name == 'Select')
	{
		alert("Please select article no .");
		return false;
		}
	style_name =   document.getElementById('style_name').value ;
	style_type_id= document.getElementById('style_type').value ;
	if(style_type_id == 'Select')
	{
		alert("Please select Style type.");
		return false;
		}
	style_price = document.getElementById('style_price').value ;
	if(style_price =='')
	{
		alert("Please insert price.");
		return false;
		}
		

	var queryString="article_name="+article_name+"&style_name="+style_name+"&style_type_id="+style_type_id+"&style_price="+style_price;
//	alert(queryString);
    url="http://"+hostname+"/erp_target_net/index.php/trimming_con/price_code_trimming_save/" ;
	ajaxRequest.open("POST" ,url , true);
	ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	ajaxRequest.send(queryString);
	
	ajaxRequest.onreadystatechange = function(){
		   if(ajaxRequest.readyState == 4)
			{
				var resp=ajaxRequest.responseText ;
				document.getElementById('show').innerHTML = resp;
			}
		
		
		}
	

}

function price_code_knitting_save()
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
	
	
	article_name = document.getElementById('article_no').value ;
	if(article_name == 'Select')
	{
		alert("Please select article no .");
		return false;
		}
	style_name =   document.getElementById('style_name').value ;
	style_type_id= document.getElementById('style_type').value ;
	if(style_type_id == 'Select')
	{
		alert("Please select Style type.");
		return false;
		}
	style_price = document.getElementById('style_price').value ;
	if(style_price =='')
	{
		alert("Please insert price.");
		return false;
		}
		

	var queryString="article_name="+article_name+"&style_name="+style_name+"&style_type_id="+style_type_id+"&style_price="+style_price;
//	alert(queryString);
    url="http://"+hostname+"/erp_target_net/index.php/knitting_con/price_code_knitting_save/" ;
	ajaxRequest.open("POST" ,url , true);
	ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	ajaxRequest.send(queryString);
	
	ajaxRequest.onreadystatechange = function(){
		   if(ajaxRequest.readyState == 4)
			{
				var resp=ajaxRequest.responseText ;
				document.getElementById('show').innerHTML = resp;
			}
		
		
		}
	
}

function show_table_winding()
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
	
	
	article_name = document.getElementById('article_no').value ;
	if(article_name == 'Select')
	{
		alert("Please select article no")
		return false;
		}
	style_name =   document.getElementById('style_name').value ;
	//style_type_id= document.getElementById('style_type').value ;
	//if(style_type_id == 'Select')
	//{
	//	return false;
	//	}
		

	var queryString="article_name="+article_name+"&style_name="+style_name;
	//alert(queryString);
    url="http://"+hostname+"/erp_target_net/index.php/winding_con/show_table_winding/" ;
	ajaxRequest.open("POST" ,url , true);
	ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	ajaxRequest.send(queryString);
	
	ajaxRequest.onreadystatechange = function(){
		   if(ajaxRequest.readyState == 4)
			{
				var resp=ajaxRequest.responseText ;
							
				document.getElementById('show').innerHTML = resp;
			//		document.getElementById('show').innerHTML =resp ;
			}		
		
		
		}


	
}
function show_table_mending()
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
	
	
	article_name = document.getElementById('article_no').value ;
	if(article_name == 'Select')
	{
		alert("Please select article no")
		return false;
		}
	style_name =   document.getElementById('style_name').value ;
	//style_type_id= document.getElementById('style_type').value ;
	//if(style_type_id == 'Select')
	//{
	//	return false;
	//	}
		

	var queryString="article_name="+article_name+"&style_name="+style_name;
	//alert(queryString);
    url="http://"+hostname+"/erp_target_net/index.php/mending_con/show_table_mending/" ;
	ajaxRequest.open("POST" ,url , true);
	ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	ajaxRequest.send(queryString);
	
	ajaxRequest.onreadystatechange = function(){
		   if(ajaxRequest.readyState == 4)
			{
				var resp=ajaxRequest.responseText ;
							
				document.getElementById('show').innerHTML = resp;
			//		document.getElementById('show').innerHTML =resp ;
			}		
		}
}

function show_table_zipper()
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
	
	
	article_name = document.getElementById('article_no').value ;
	if(article_name == 'Select')
	{
		alert("Please select article no")
		return false;
		}
	style_name =   document.getElementById('style_name').value ;
	var queryString="article_name="+article_name+"&style_name="+style_name;
	//alert(queryString);
    url="http://"+hostname+"/erp_target_net/index.php/zipper_con/show_table_zipper/" ;
	ajaxRequest.open("POST" ,url , true);
	ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	ajaxRequest.send(queryString);
	
	ajaxRequest.onreadystatechange = function(){
		   if(ajaxRequest.readyState == 4)
			{
				var resp=ajaxRequest.responseText ;
							
				document.getElementById('show').innerHTML = resp;
			//		document.getElementById('show').innerHTML =resp ;
			}		
	}
}

function show_table_iron()
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
	
	
	article_name = document.getElementById('article_no').value ;
	if(article_name == 'Select')
	{
		alert("Please select article no")
		return false;
		}
	style_name =   document.getElementById('style_name').value ;
	var queryString="article_name="+article_name+"&style_name="+style_name;
	//alert(queryString);
    url="http://"+hostname+"/erp_target_net/index.php/iron_con/show_table_iron/" ;
	ajaxRequest.open("POST" ,url , true);
	ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	ajaxRequest.send(queryString);
	
	ajaxRequest.onreadystatechange = function(){
		   if(ajaxRequest.readyState == 4)
			{
				var resp=ajaxRequest.responseText ;
							
				document.getElementById('show').innerHTML = resp;
			//		document.getElementById('show').innerHTML =resp ;
			}		
	}
}


function show_table_trimming()
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
	
	
	article_name = document.getElementById('article_no').value ;
	if(article_name == 'Select')
	{
		alert("Please select article no")
		return false;
		}
	style_name =   document.getElementById('style_name').value ;
	//style_type_id= document.getElementById('style_type').value ;
	//if(style_type_id == 'Select')
	//{
	//	return false;
	//	}
		

	var queryString="article_name="+article_name+"&style_name="+style_name;
	//alert(queryString);
    url="http://"+hostname+"/erp_target_net/index.php/trimming_con/show_table_trimming/" ;
	ajaxRequest.open("POST" ,url , true);
	ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	ajaxRequest.send(queryString);
	
	ajaxRequest.onreadystatechange = function(){
		   if(ajaxRequest.readyState == 4)
			{
				var resp=ajaxRequest.responseText ;
							
				document.getElementById('show').innerHTML = resp;
			//		document.getElementById('show').innerHTML =resp ;
			}		
		
		
		}


	
}

function show_table_knitting()
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
	
	
	article_name = document.getElementById('article_no').value ;
	if(article_name == 'Select')
	{
		alert("Please select article no")
		return false;
		}
	style_name =   document.getElementById('style_name').value ;
	//style_type_id= document.getElementById('style_type').value ;
	//if(style_type_id == 'Select')
	//{
	//	return false;
	//	}
		

	var queryString="article_name="+article_name+"&style_name="+style_name;
	//alert(queryString);
    url="http://"+hostname+"/erp_target_net/index.php/knitting_con/show_table_knitting/" ;
	ajaxRequest.open("POST" ,url , true);
	ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	ajaxRequest.send(queryString);
	
	ajaxRequest.onreadystatechange = function(){
		   if(ajaxRequest.readyState == 4)
			{
				var resp=ajaxRequest.responseText ;
							
				document.getElementById('show').innerHTML = resp;
			//		document.getElementById('show').innerHTML =resp ;
			}		
		
		
		}


}

function price_code_edit_mending(i)
{
	
	
	//alert(i);
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
 
 
 var queryString="i="+i;
	//alert(queryString);
    url="http://"+hostname+"/erp_target_net/index.php/mending_con/style_type_price_edit_mending/" ;
	ajaxRequest.open("POST" ,url , true);
	ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	ajaxRequest.send(queryString);
	
	ajaxRequest.onreadystatechange = function(){
		   if(ajaxRequest.readyState == 4)
			{
				var resp=ajaxRequest.responseText ;
							
				document.getElementById('show').innerHTML = resp;
			//		document.getElementById('show').innerHTML =resp ;
			}		
}
}

function price_code_edit_winding(i)
{
	
	
	//alert(i);
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
 
 var queryString="i="+i;
	//alert(queryString);
    url="http://"+hostname+"/erp_target_net/index.php/winding_con/style_type_perice_edit_winding/" ;
	ajaxRequest.open("POST" ,url , true);
	ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	ajaxRequest.send(queryString);
	
	ajaxRequest.onreadystatechange = function(){
		   if(ajaxRequest.readyState == 4)
			{
				var resp=ajaxRequest.responseText ;
							
				document.getElementById('show').innerHTML = resp;
			//		document.getElementById('show').innerHTML =resp ;
			}		
}
}



function price_code_edit_zipper(i)
{
		
	
	//alert(i);
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
 
 
 var queryString="i="+i;
	//alert(queryString);
    url="http://"+hostname+"/erp_target_net/index.php/zipper_con/style_type_price_edit_zipper/" ;
	ajaxRequest.open("POST" ,url , true);
	ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	ajaxRequest.send(queryString);
	
	ajaxRequest.onreadystatechange = function(){
		   if(ajaxRequest.readyState == 4)
			{
				var resp=ajaxRequest.responseText ;
							
				document.getElementById('show').innerHTML = resp;
			//		document.getElementById('show').innerHTML =resp ;
			}		
	}
}

function price_code_edit_iron(i)
{
		
	
	//alert(i);
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
 
 
 var queryString="i="+i;
	//alert(queryString);
    url="http://"+hostname+"/erp_target_net/index.php/iron_con/style_type_price_edit_iron/" ;
	ajaxRequest.open("POST" ,url , true);
	ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	ajaxRequest.send(queryString);
	
	ajaxRequest.onreadystatechange = function(){
		   if(ajaxRequest.readyState == 4)
			{
				var resp=ajaxRequest.responseText ;
							
				document.getElementById('show').innerHTML = resp;
			//		document.getElementById('show').innerHTML =resp ;
			}		
	}
}

function price_code_edit_trimming(i)
{
	
	
	//alert(i);
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
 
 
 var queryString="i="+i;
	//alert(queryString);
    url="http://"+hostname+"/erp_target_net/index.php/product_con/style_type_perice_edit_trimming/" ;
	ajaxRequest.open("POST" ,url , true);
	ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	ajaxRequest.send(queryString);
	
	ajaxRequest.onreadystatechange = function(){
		   if(ajaxRequest.readyState == 4)
			{
				var resp=ajaxRequest.responseText ;
							
				document.getElementById('show').innerHTML = resp;
			//		document.getElementById('show').innerHTML =resp ;
			}		
		
		
		}
 
 
 

		
}

function price_code_edit_knitting(i)
{
	
	//alert(i);
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
 
 
 var queryString="i="+i;
	//alert(queryString);
    url="http://"+hostname+"/erp_target_net/index.php/knitting_con/style_type_price_edit_knitting/" ;
	ajaxRequest.open("POST" ,url , true);
	ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	ajaxRequest.send(queryString);
	
	ajaxRequest.onreadystatechange = function(){
		   if(ajaxRequest.readyState == 4)
			{
				var resp=ajaxRequest.responseText ;
							
				document.getElementById('show').innerHTML = resp;
			//		document.getElementById('show').innerHTML =resp ;
			}		
		}
}

function price_code_edit_trimming(i)
{
	
	//alert(i);
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
 
 
 var queryString="i="+i;
	//alert(queryString);
    url="http://"+hostname+"/erp_target_net/index.php/trimming_con/style_type_price_edit_trimming/" ;
	ajaxRequest.open("POST" ,url , true);
	ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	ajaxRequest.send(queryString);
	
	ajaxRequest.onreadystatechange = function(){
		   if(ajaxRequest.readyState == 4)
			{
				var resp=ajaxRequest.responseText ;
							
				document.getElementById('show').innerHTML = resp;
			//		document.getElementById('show').innerHTML =resp ;
			}		
		}
}
	
function price_code_delete_mending(i)
{
	var okyes;
	okyes=confirm('Are you sure you want to delete?');
	if(okyes==false) return;	
	//alert(i);
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
 
 
	article_name =   document.getElementById("article_name").value ;
	style_name =   document.getElementById("style_name").value ;
	
	var queryString="i="+i+"&article_name="+article_name+"&style_name="+style_name;
	//alert(queryString);
    url="http://"+hostname+"/erp_target_net/index.php/mending_con/price_code_delete_mending/" ;
	ajaxRequest.open("POST" ,url , true);
	ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	ajaxRequest.send(queryString);
	
	ajaxRequest.onreadystatechange = function(){
		   if(ajaxRequest.readyState == 4)
			{
				var resp=ajaxRequest.responseText ;
							
				document.getElementById('show').innerHTML = resp;
			//		document.getElementById('show').innerHTML =resp ;
			}		
		}
}

function price_code_delete_winding(i)
{
		
	var okyes;
	okyes=confirm('Are you sure you want to delete?');
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
 	article_name =   document.getElementById("article_name").value ;
	style_name =   document.getElementById("style_name").value ;
	
	var queryString="i="+i+"&article_name="+article_name+"&style_name="+style_name;
 
	//alert(queryString);
    url="http://"+hostname+"/erp_target_net/index.php/winding_con/price_code_delete_winding/" ;
	ajaxRequest.open("POST" ,url , true);
	ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	ajaxRequest.send(queryString);
	
	ajaxRequest.onreadystatechange = function(){
		   if(ajaxRequest.readyState == 4)
			{
				var resp=ajaxRequest.responseText ;
							
				document.getElementById('show').innerHTML = resp;
			//		document.getElementById('show').innerHTML =resp ;
			}		
		}
}
	
function price_code_delete_zipper(i)
{
	var okyes;
	okyes=confirm('Are you sure you want to delete?');
	if(okyes==false) return;	
	//alert(i);
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
 
 	article_name =   document.getElementById("article_name").value ;
	style_name =   document.getElementById("style_name").value ;
	
	var queryString="i="+i+"&article_name="+article_name+"&style_name="+style_name;
	//alert(queryString);
    url="http://"+hostname+"/erp_target_net/index.php/zipper_con/price_code_delete_zipper/" ;
	ajaxRequest.open("POST" ,url , true);
	ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	ajaxRequest.send(queryString);
	
	ajaxRequest.onreadystatechange = function(){
		   if(ajaxRequest.readyState == 4)
			{
				var resp=ajaxRequest.responseText ;
							
				document.getElementById('show').innerHTML = resp;
			//		document.getElementById('show').innerHTML =resp ;
			}		
	}
}

function price_code_delete_iron(i)
{
	var okyes;
	okyes=confirm('Are you sure you want to delete?');
	if(okyes==false) return;	
	//alert(i);
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
 
 	article_name =   document.getElementById("article_name").value ;
	style_name =   document.getElementById("style_name").value ;
	
	var queryString="i="+i+"&article_name="+article_name+"&style_name="+style_name;
	//alert(queryString);
    url="http://"+hostname+"/erp_target_net/index.php/iron_con/price_code_delete_iron/" ;
	ajaxRequest.open("POST" ,url , true);
	ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	ajaxRequest.send(queryString);
	
	ajaxRequest.onreadystatechange = function(){
		   if(ajaxRequest.readyState == 4)
			{
				var resp=ajaxRequest.responseText ;
							
				document.getElementById('show').innerHTML = resp;
			//		document.getElementById('show').innerHTML =resp ;
			}		
	}
}


function price_code_delete_trimming(i)
{
	var okyes;
	okyes=confirm('Are you sure you want to delete?');
	if(okyes==false) return;	
	//alert(i);
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
 
 
 	article_name =   document.getElementById("article_name").value ;
	style_name =   document.getElementById("style_name").value ;
	
	var queryString="i="+i+"&article_name="+article_name+"&style_name="+style_name;
	//alert(queryString);
    url="http://"+hostname+"/erp_target_net/index.php/product_con/style_type_perice_delete_trimming/" ;
	ajaxRequest.open("POST" ,url , true);
	ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	ajaxRequest.send(queryString);
	
	ajaxRequest.onreadystatechange = function(){
		   if(ajaxRequest.readyState == 4)
			{
				var resp=ajaxRequest.responseText ;
							
				document.getElementById('show').innerHTML = resp;
			//		document.getElementById('show').innerHTML =resp ;
			}		
		}
}
	
	
function price_code_delete_knitting(i)
{
	//alert(i);
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
 article_name =   document.getElementById("article_name").value ;
	style_name =   document.getElementById("style_name").value ;
	
	
	var queryString="i="+i+"&article_name="+article_name+"&style_name="+style_name ;

	url="http://"+hostname+"/erp_target_net/index.php/knitting_con/price_code_delete_knitting/" ;
	ajaxRequest.open("POST" ,url , true);
	ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	ajaxRequest.send(queryString);
	
	ajaxRequest.onreadystatechange = function(){
		   if(ajaxRequest.readyState == 4)
			{
				var resp=ajaxRequest.responseText ;
							
				document.getElementById('show').innerHTML = resp;
			//		document.getElementById('show').innerHTML =resp ;
			}		
		}
}

function price_code_delete_trimming(i)
{
	//alert(i);
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
 article_name =   document.getElementById("article_name").value ;
	style_name =   document.getElementById("style_name").value ;
	
	
	var queryString="i="+i+"&article_name="+article_name+"&style_name="+style_name ;

	url="http://"+hostname+"/erp_target_net/index.php/trimming_con/price_code_delete_trimming/" ;
	ajaxRequest.open("POST" ,url , true);
	ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	ajaxRequest.send(queryString);
	
	ajaxRequest.onreadystatechange = function(){
		   if(ajaxRequest.readyState == 4)
			{
				var resp=ajaxRequest.responseText ;
							
				document.getElementById('show').innerHTML = resp;
			//		document.getElementById('show').innerHTML =resp ;
			}		
		}
}

function price_code_update_mending(i)
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
	
	
	style_price = "style_price"+i ;
	get_style_price =   document.getElementById(style_price).value ;
	
	var queryString="i="+i+"&get_style_price="+get_style_price;
	//alert(queryString);
    url="http://"+hostname+"/erp_target_net/index.php/mending_con/price_code_update_mending/" ;
	ajaxRequest.open("POST" ,url , true);
	ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	ajaxRequest.send(queryString);
	
	ajaxRequest.onreadystatechange = function(){
		   if(ajaxRequest.readyState == 4)
			{
				var resp=ajaxRequest.responseText ;
							
				document.getElementById('show').innerHTML = resp;
			//		document.getElementById('show').innerHTML =resp ;
			}		
		}
}

function price_code_update_winding(i)
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
	
	article_name =   document.getElementById("article_name").value ;
	style_name =   document.getElementById("style_name").value ;
	
	style_price ="style_price"+i;
	get_style_price =   document.getElementById(style_price).value ;
	
	var queryString="i="+i+"&get_style_price="+get_style_price+"&article_name="+article_name+"&style_name="+style_name ;
	//alert(queryString);
    url="http://"+hostname+"/erp_target_net/index.php/winding_con/price_code_update_winding/" ;
	ajaxRequest.open("POST" ,url , true);
	ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	ajaxRequest.send(queryString);
	
	ajaxRequest.onreadystatechange = function(){
		   if(ajaxRequest.readyState == 4)
			{
				var resp=ajaxRequest.responseText ;
							
				document.getElementById('show').innerHTML = resp;
			//		document.getElementById('show').innerHTML =resp ;
			}		
		}
}

function price_code_update_zipper(i)
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
	
	
	article_name =   document.getElementById("article_name").value ;
	style_name =   document.getElementById("style_name").value ;
	style_price = "style_price"+i ;
	
	get_style_price =   document.getElementById(style_price).value ;
	
	var queryString="i="+i+"&get_style_price="+get_style_price+"&article_name="+article_name+"&style_name="+style_name ;
	
	//alert(queryString);
    url="http://"+hostname+"/erp_target_net/index.php/zipper_con/price_code_update_zipper/" ;
	ajaxRequest.open("POST" ,url , true);
	ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	ajaxRequest.send(queryString);
	
	ajaxRequest.onreadystatechange = function(){
		   if(ajaxRequest.readyState == 4)
			{
				var resp=ajaxRequest.responseText ;
							
				document.getElementById('show').innerHTML = resp;
			//		document.getElementById('show').innerHTML =resp ;
			}		
	}
}

function price_code_update_iron(i)
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
	
	
	article_name =   document.getElementById("article_name").value ;
	style_name =   document.getElementById("style_name").value ;
	style_price = "style_price"+i ;
	
	get_style_price =   document.getElementById(style_price).value ;
	
	var queryString="i="+i+"&get_style_price="+get_style_price+"&article_name="+article_name+"&style_name="+style_name ;
	
	//alert(queryString);
    url="http://"+hostname+"/erp_target_net/index.php/iron_con/price_code_update_iron/" ;
	ajaxRequest.open("POST" ,url , true);
	ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	ajaxRequest.send(queryString);
	
	ajaxRequest.onreadystatechange = function(){
		   if(ajaxRequest.readyState == 4)
			{
				var resp=ajaxRequest.responseText ;
							
				document.getElementById('show').innerHTML = resp;
			//		document.getElementById('show').innerHTML =resp ;
			}		
	}
}

function price_code_update_trimming(i)
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
	
	
	style_price = "style_price"+i ;
	get_style_price =   document.getElementById(style_price).value ;
	
	var queryString="i="+i+"&get_style_price="+get_style_price;
	//alert(queryString);
    url="http://"+hostname+"/erp_target_net/index.php/product_con/style_type_perice_update_trimming/" ;
	ajaxRequest.open("POST" ,url , true);
	ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	ajaxRequest.send(queryString);
	
	ajaxRequest.onreadystatechange = function(){
		   if(ajaxRequest.readyState == 4)
			{
				var resp=ajaxRequest.responseText ;
							
				document.getElementById('show').innerHTML = resp;
			//		document.getElementById('show').innerHTML =resp ;
			}		
		
		
		}
		

}

function price_code_update_knitting(i)
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
	
	
	article_name =   document.getElementById("article_name").value ;
	style_name =   document.getElementById("style_name").value ;
	
	style_price ="style_price"+i;
	get_style_price =   document.getElementById(style_price).value ;
	
	var queryString="i="+i+"&get_style_price="+get_style_price+"&article_name="+article_name+"&style_name="+style_name ;
	//alert(queryString);
    url="http://"+hostname+"/erp_target_net/index.php/knitting_con/price_code_update_knitting/" ;
	ajaxRequest.open("POST" ,url , true);
	ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	ajaxRequest.send(queryString);
	
	ajaxRequest.onreadystatechange = function(){
		   if(ajaxRequest.readyState == 4)
			{
				var resp=ajaxRequest.responseText ;
							
				document.getElementById('show').innerHTML = resp;
			//		document.getElementById('show').innerHTML =resp ;
			}		
		}
}

function price_code_update_trimming(i)
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
	
	
	article_name =   document.getElementById("article_name").value ;
	style_name =   document.getElementById("style_name").value ;
	
	style_price ="style_price"+i;
	get_style_price =   document.getElementById(style_price).value ;
	
	var queryString="i="+i+"&get_style_price="+get_style_price+"&article_name="+article_name+"&style_name="+style_name ;
	//alert(queryString);
    url="http://"+hostname+"/erp_target_net/index.php/trimming_con/price_code_update_trimming/" ;
	ajaxRequest.open("POST" ,url , true);
	ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	ajaxRequest.send(queryString);
	
	ajaxRequest.onreadystatechange = function(){
		   if(ajaxRequest.readyState == 4)
			{
				var resp=ajaxRequest.responseText ;
							
				document.getElementById('show').innerHTML = resp;
			//		document.getElementById('show').innerHTML =resp ;
			}		
		}
}

function price_code_save_linking()
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
	
	
	article_name = document.getElementById('article_no').value ;
	if(article_name == 'Select')
	{
		alert("Please select article no .");
		return false;
		}
	style_name =   document.getElementById('style_name').value ;
	style_type_id= document.getElementById('style_type').value ;
	if(style_type_id == 'Select')
	{
		alert("Please select Style type.");
		return false;
		}
	style_price = document.getElementById('style_price').value ;
	if(style_price =='')
	{
		alert("Please insert price.");
		return false;
		}
		

	var queryString="article_name="+article_name+"&style_name="+style_name+"&style_type_id="+style_type_id+"&style_price="+style_price;
//	alert(queryString);
    url="http://"+hostname+"/erp_target_net/index.php/linking_con/price_code_linking_save/" ;
	ajaxRequest.open("POST" ,url , true);
	ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	ajaxRequest.send(queryString);
	
	ajaxRequest.onreadystatechange = function(){
		   if(ajaxRequest.readyState == 4)
			{
				var resp=ajaxRequest.responseText ;
				document.getElementById('show').innerHTML = resp;
			}
		
		
		}
	
}

function price_code_linking_edit(i)
{
	
	
	//alert(i);
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
 
 
 var queryString="i="+i;
	//alert(queryString);
    url="http://"+hostname+"/erp_target_net/index.php/linking_con/style_type_price_linking_edit/" ;
	ajaxRequest.open("POST" ,url , true);
	ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	ajaxRequest.send(queryString);
	
	ajaxRequest.onreadystatechange = function(){
		   if(ajaxRequest.readyState == 4)
			{
				var resp=ajaxRequest.responseText ;
							
				document.getElementById('show').innerHTML = resp;
			//		document.getElementById('show').innerHTML =resp ;
			}		
		
		
		}
 
}

function price_code_linking_update(i)
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
	
	
	article_name =   document.getElementById("article_name").value ;
	style_name =   document.getElementById("style_name").value ;
	
	style_price ="style_price"+i;
	get_style_price =   document.getElementById(style_price).value ;
	
	var queryString="i="+i+"&get_style_price="+get_style_price+"&article_name="+article_name+"&style_name="+style_name ;
	//alert(queryString);
    url="http://"+hostname+"/erp_target_net/index.php/linking_con/style_type_price_linking_update/" ;
	ajaxRequest.open("POST" ,url , true);
	ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	ajaxRequest.send(queryString);
	
	ajaxRequest.onreadystatechange = function(){
		   if(ajaxRequest.readyState == 4)
			{
				var resp=ajaxRequest.responseText ;
							
				document.getElementById('show').innerHTML = resp;
			//		document.getElementById('show').innerHTML =resp ;
			}		
		
		
		}
		

}
function price_code_linking_delete(i)
{
	
	//alert(i);
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
 
 
 var queryString="i="+i;
	//alert(queryString);
    url="http://"+hostname+"/erp_target_net/index.php/product_con/style_type_perice_linking_delete/" ;
	ajaxRequest.open("POST" ,url , true);
	ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	ajaxRequest.send(queryString);
	
	ajaxRequest.onreadystatechange = function(){
		   if(ajaxRequest.readyState == 4)
			{
				var resp=ajaxRequest.responseText ;
							
				document.getElementById('show').innerHTML = resp;
			//		document.getElementById('show').innerHTML =resp ;
			}		
		
		
		}
 
}

function show_table_linking()
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
	
	
	article_name = document.getElementById('article_no').value ;
	if(article_name == 'Select')
	{
		alert("Please select article no")
		return false;
		}
	style_name =   document.getElementById('style_name').value ;
	//style_type_id= document.getElementById('style_type').value ;
	//if(style_type_id == 'Select')
	//{
	//	return false;
	//	}
		

	var queryString="article_name="+article_name+"&style_name="+style_name;
	//alert(queryString);
    url="http://"+hostname+"/erp_target_net/index.php/linking_con/show_table_linking_co/" ;
	ajaxRequest.open("POST" ,url , true);
	ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	ajaxRequest.send(queryString);
	
	ajaxRequest.onreadystatechange = function(){
		   if(ajaxRequest.readyState == 4)
			{
				var resp=ajaxRequest.responseText ;
							
				document.getElementById('show').innerHTML = resp;
			//		document.getElementById('show').innerHTML =resp ;
			}		
		
		
		}


	
}



function bdt_save()
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

 article_no = document.getElementById("article_no").value;
 if(article_no=='Select')
 {
	 alert("Please select article no");	
	 return ;
 }
 style_no   = document.getElementById("style_no").value;
 buyername = document.getElementById("buyername").value;
 style_dept  = document.getElementById("style_dept").value;
 gauge = document.getElementById("gauge").value;
 sending_date   = document.getElementById("sending_date").value;
 comment_date = document.getElementById("comment_date").value;
 making_by = document.getElementById("making_by").value;
 in_house_date   = document.getElementById("in_house_date").value;
 status   = document.getElementById("status").value;
 type_of_sample   = document.getElementById("type_of_sample").value;
 

 var queryString="article_no="+article_no+"&style_no="+style_no+"&buyername="+buyername+"&style_dept="+style_dept+"&gauge="+gauge+"&sending_date="+sending_date+"&comment_date="+comment_date+"&making_by="+making_by+"&in_house_date="+in_house_date+"&status="+status+"&type_of_sample="+type_of_sample;
 //alert(queryString);
 hostname = window.location.hostname;
	url =  "http://"+hostname+"/erp_target_net/index.php/product_con/bdt_save_co/";
	ajaxRequest.open("POST", url, true);
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

function com_incre_prom_search()
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
 //disable_save();
 
 var empid 	= document.getElementById('search_empid').value;


 var queryString="empid="+empid;
 hostname = window.location.hostname;
 var url = "http://"+hostname+"/erp_target_net/index.php/emp_increment_con/com_incre_prom_search/";
 ajaxRequest.open("POST", url, true);
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
		
		document.cominfo.pi_save.disabled = true;
 		document.cominfo.pi_edit.disabled = false;
 		document.cominfo.empstat.disabled = true;
 
		alldata = resp.split("-*-");
		//alert(alldata);
		/*otherinfo= alldata[0].split("=*=") ;
		alert(otherinfo[0]);*/
		//alert(otherinfo[1]);
		document.cominfo.empid.value = empid;
		
				
		com_info = alldata[0].split("=*=");
		//alert(com_info);
		
		
		//document.cominfo.idcard.value = com_info[1];
		
		
		
		
		
		dept_id_name = alldata[1].split("===");
		dept_id = dept_id_name[0].split("=*=");
		dept_name = dept_id_name[1].split("=*=");
		document.cominfo.dept.options.length=0;
		for (i=0; i<dept_id.length; i++){
			if( com_info[2] == dept_name[i])
			{
				document.cominfo.dept.options[i]=new Option(dept_name[i],dept_id[i], false, true);
			}
			else
			document.cominfo.dept.options[i]=new Option(dept_name[i],dept_id[i], false, false);
		}
		
		//alert(com_info[3]);
		
		
		sec_id_name = alldata[2].split("===");
		//alert(sec_id_name);
		sec_id = sec_id_name[0].split("***");
		sec_name = sec_id_name[1].split("***");
		document.cominfo.sec.options.length=0;
		for (i=0; i<sec_id.length; i++){
			if( com_info[3] == sec_name[i])
			{
				document.cominfo.sec.options[i]=new Option(sec_name[i],sec_id[i], false,true);
			}
			else
				document.cominfo.sec.options[i]=new Option(sec_name[i],sec_id[i], false, false);
			
		}
		
		
		//alert(com_info[4]);
		
		
		line_id_name = alldata[3].split("===");
		line_id = line_id_name[0].split("***");
		line_name = line_id_name[1].split("***");
		document.cominfo.line.options.length=0;
		for (i=0; i<line_id.length; i++){
			if( com_info[4] == line_name[i])
			{
				//alert(line_name[i]);
				document.cominfo.line.options[i]=new Option(line_name[i],line_id[i], false,true);
			}
			else
			//alert(line_name[i]);
			document.cominfo.line.options[i]=new Option(line_name[i],line_id[i], false, false);
			
		}
		
		//alert(com_info[5])
		
		desig_id_name = alldata[4].split("===");
		desig_id = desig_id_name[0].split("***");
		desig_name = desig_id_name[1].split("***");
		document.cominfo.desig.options.length=0;
		for (i=0; i<desig_id.length; i++){
			if( com_info[5] == desig_name[i])
			{
				//alert(dept_name[i]);
				document.cominfo.desig.options[i]=new Option(desig_name[i],desig_id[i], false,true);
			}
			else
			document.cominfo.desig.options[i]=new Option(desig_name[i],desig_id[i], false, false);
			
		}
		
		
		
		
		salg_id_name = alldata[7].split("===");
		salg_id = salg_id_name[0].split("***");
		salg_name = salg_id_name[1].split("***");
		document.cominfo.salg.options.length=0;
		for (i=0; i<salg_id.length; i++){
			if( com_info[8] == salg_name[i])
			{
				//alert(dept_name[i]);
				document.cominfo.salg.options[i]=new Option(salg_name[i],salg_id[i], false,true);
			}
			else
			document.cominfo.salg.options[i]=new Option(salg_name[i],salg_id[i], false, false);
			
		}
		
		
		
		empstat_id_name = alldata[8].split("===");
		empstat_id = empstat_id_name[0].split("***");
		empstat_name = empstat_id_name[1].split("***");
		document.cominfo.empstat.options.length=0;
		for (i=0; i<empstat_id.length; i++){
			if( com_info[9] == empstat_name[i])
			{
				document.cominfo.empstat.options[i]=new Option(empstat_name[i],empstat_id[i], false,true);
			}
			else
				document.cominfo.empstat.options[i]=new Option(empstat_name[i],empstat_id[i], false, false);
		}
		
		var gsal = com_info[11];
		
		document.getElementById('gsal').value = gsal;
		
		//==================================BGMEA Salary Rule===================================
		/*var bsal = (gsal * 60) / 100;
		document.getElementById('bsal').value = bsal;
			
		var hrent = (gsal * 30) / 100;
		document.getElementById('hrent').value = hrent;
		
		var mallow = (gsal * 10) / 100;
		document.getElementById('mallow').value = mallow;*/
		//==================================BGMEA Salary Rule===================================
		
		//==================================LOCAL Salary Rule===================================
		var mallow = 600;
		document.getElementById('mallow').value = mallow;
		
		var bsal = Math.round((gsal - mallow) / 150 * 100);
		document.getElementById('bsal').value = bsal;
			
		var hrent = Math.round((bsal * 50) / 100);
		document.getElementById('hrent').value = hrent;
		//==================================LOCAL Salary Rule===================================
		if(com_info[9] == 'Resign')
		{
			
			document.cominfo.pi_edit.disabled = true;			
			}
		
	}
}

eempid = empid;
}
function clear_data_incre_prom(){
	
	//window.location = "personal_info_view1";
	document.getElementById('search_empid').value="";
	document.getElementById('empid').value = "";
	
	document.getElementById('gsal').value = "";
	document.getElementById('bsal').value = "";
	document.getElementById('hrent').value = "";
	document.getElementById('mallow').value = "";
	
}

function fetch_data(){
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
 	p_start_date= document.getElementById('p_start_date').value;
	if(p_start_date ==''){
		alert('Please select date');
		return ;
	}
 
 	// var okyes;
 	// okyes=confirm('Are you want to fetch data?');
	// if(okyes==false) return;
	$("#loader").show();
	hostname = window.location.hostname;
	url =  "http://"+hostname+"/erp_target_net/index.php/attn_process_con/fetch_data/";

	var queryString="p_start_date="+p_start_date;
	
	ajaxRequest.open("POST", url, true);
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

