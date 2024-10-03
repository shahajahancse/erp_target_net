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
 var name 	= document.getElementById('name').value;
 var mname 	= document.getElementById('mname').value;
 var fname	= document.getElementById('fname').value;
 var dob 	= document.getElementById('dob').value;
 var reli 	= document.getElementById('reli').value;
 var sex 	= document.getElementById('sex').value;
 var bgroup = document.getElementById('bgroup').value;

 var queryString="empid="+empid+"&name="+name+"&mname="+mname+"&fname="+fname+"&dob="+dob+"&reli="+reli+"&sex="+sex+"&bgroup="+bgroup;
 
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
 var name 	= document.getElementById('name').value;
 var mname 	= document.getElementById('mname').value;
 var fname	= document.getElementById('fname').value;
 var dob 	= document.getElementById('dob').value;
 var reli 	= document.getElementById('reli').value;
 var sex 	= document.getElementById('sex').value;
 var bgroup = document.getElementById('bgroup').value;

 var queryString="empid="+empid+"&name="+name+"&mname="+mname+"&fname="+fname+"&dob="+dob+"&reli="+reli+"&sex="+sex+"&bgroup="+bgroup;
 
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
		
	
		
		//ajaxpeakdata();
		
	}
}

eempid = empid;

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
 else if(idcard=='' || idcard==null){
 	alert("Please insert ID card number");
 }
 else
 {
	
	var idcard = document.getElementById('idcard').value;
	var dept = document.getElementById('dept').value;
	var sec = document.getElementById('sec').value;
	var line = document.getElementById('line').value;
	var desig = document.getElementById('desig').value;
	var salg = document.getElementById('salg').value;
	var empstat = document.getElementById('empstat').value;
	var ejd = document.getElementById('ejd').value;
 
	var queryString="com_empid="+com_empid+"&idcard="+idcard+"&dept="+dept+"&sec="+sec+"&line="+line+"&desig="+desig+"&salg="+salg+"&empstat="+empstat+"&ejd="+ejd;
	//alert(desig);
	ajaxRequest.open("POST", "index.php/payroll_con/com_info_insert/", true);
 	ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 	ajaxRequest.send(queryString);
 
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var resp = ajaxRequest.responseText;
		document.cominfo.dept.options.length=0;
		empty_pi();
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
 else if(idcard=='' || idcard==null){
 	alert("Please insert ID card number");
 }
 else
 {
	
	var idcard = document.getElementById('idcard').value;
	var dept = document.getElementById('dept').value;
	var sec = document.getElementById('sec').value;
	var line = document.getElementById('line').value;
	var desig = document.getElementById('desig').value;
	var salg = document.getElementById('salg').value;
	var empstat = document.getElementById('empstat').value;
	var ejd = document.getElementById('ejd').value;
 
	var queryString="com_empid="+com_empid+"&idcard="+idcard+"&dept="+dept+"&sec="+sec+"&line="+line+"&desig="+desig+"&salg="+salg+"&empstat="+empstat+"&ejd="+ejd;

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
		//alert(sec_name);
			
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
		
		document.getElementById('ejd').value = companyinfo[8];
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
function disable_pi_save(){
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
			new MyDesktop.GridWindow(),
            new MyDesktop.TabWindow(),
            new MyDesktop.AccordionWindow(),
            new MyDesktop.BogusMenuModule(),
            new MyDesktop.BogusModule(),
			new MyDesktop.SalaryGrade(),
			new MyDesktop.Section()
		];
	},

    // config for the start menu
    getStartConfig : function(){
        return {
            title: 'Jack Slocum',
            iconCls: 'user',
            toolItems: [{
                text:'Settings',
                iconCls:'settings',
                scope:this
            },'-',{
                text:'Logout',
                iconCls:'logout',
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

//===========================================end sayed==========================
/*
 * Example windows
 */
MyDesktop.GridWindow = Ext.extend(Ext.app.Module, {
    id:'grid-win',
    init : function(){
        this.launcher = {
            text: 'Grid Window',
            iconCls:'icon-grid',
            handler : this.createWindow,
            scope: this
        }
    },

    createWindow : function(){
        var desktop = this.app.getDesktop();
        var win = desktop.getWindow('grid-win');
        if(!win){
            win = desktop.createWindow({
                id: 'grid-win',
                title:'Grid Window',
                width:540,
                height:480,
                iconCls: 'icon-grid',
                shim:false,
                animCollapse:false,
                constrainHeader:true,

                layout: 'fit',
                items:
                    new Ext.grid.GridPanel({
                        border:false,
                        ds: new Ext.data.Store({
                            reader: new Ext.data.ArrayReader({}, [
                               {name: 'company'},
                               {name: 'price', type: 'float'},
                               {name: 'change', type: 'float'},
                               {name: 'pctChange', type: 'float'}
                            ]),
                            data: Ext.grid.dummyData
                        }),
                        cm: new Ext.grid.ColumnModel([
                            new Ext.grid.RowNumberer(),
                            {header: "Company", width: 120, sortable: true, dataIndex: 'company'},
                            {header: "Price", width: 70, sortable: true, renderer: Ext.util.Format.usMoney, dataIndex: 'price'},
                            {header: "Change", width: 70, sortable: true, dataIndex: 'change'},
                            {header: "% Change", width: 70, sortable: true, dataIndex: 'pctChange'}
                        ]),

                        viewConfig: {
                            forceFit:true
                        },
                        //autoExpandColumn:'company',

                        tbar:[{
                            text:'Add Something',
                            tooltip:'Add a new row',
                            iconCls:'add'
                        }, '-', {
                            text:'Options',
                            tooltip:'Blah blah blah blaht',
                            iconCls:'option'
                        },'-',{
                            text:'Remove Something',
                            tooltip:'Remove the selected item',
                            iconCls:'remove'
                        }]
                    })
            });
        }
        win.show();
    }
});



MyDesktop.TabWindow = Ext.extend(Ext.app.Module, {
    id:'tab-win',
    init : function(){
        this.launcher = {
            text: 'Tab Window',
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
                title:'Employee Information',
                width:840,
                height:480,
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
							html : "<br/><form  name='com_per_info' ><table width='50%' border='1' align='center'><tr><td width='40%' style='background-color:yellow;'>Find ID</td><td><input style='background-color:yellow;' type='text' size='40px' name='pi_empid' id='pi_empid' onchange='ajaxSearch()'></td></tr><tr><td width='40%'>Emp Id</td><td><input type='text' size='40px' name='nempid' id='empid' ></td></tr><tr><td width='20%'>Full Name</td><td><input type='text' size='40px' id='name'></td></tr><tr><td width='20%'>Mother Name</td><td><input type='text' size='40px' id='mname'></td></tr><tr><td width='20%'>Father Name</td><td><input type='text' size='40px' id='fname'></td></tr><tr><td width='20%'>Date Of Birth</td><td><input type='text' size='40px' id='dob' ></td></tr><tr><td width='20%'>Religion</td><td><select id='reli'><option value='1'>Islam</option><option value='2'>Hindu</option><option value='3'>Christian</option><option value='4'>Buddish</option></select></td></tr><tr><td width='20%'>Sex</td><td><select id='sex'><option value='1'>Male</option><option value='2'>Female</option></select></td></tr><tr><td width='20%'>Blood Group</td><td><select id='bgroup'><option value='1'>A+</option><option value='2'>A-</option><option value='3'>B+</option><option value='4'>B-</option><option value='5'>AB+</option><option value='6'>AB-</option><option value='7'>O+</option><option value='8'>O-</option></select></td></tr><tr><td align='right' colspan='2'><input type='button' name='add' onclick='enable_pi_save()' value='NEW'/><input type='button' name='pi_save' disabled='disabled' onclick='ajaxInsert()' value='SAVE'/><input type='button' onclick='ajaxupdate()' value='EDIT'/><input type='button' onclick='ajaxDelete()' value='DELETE'/></td></tr></table></form>",
                            border:false
                        },{
                            title: 'Company Info',
                            header:false,
                            html : "<br/><form name='cominfo'><table width='50%' border='1' align='center'><tr><td width='40%' style='background-color:yellow;'>Find ID</td><td><input style='background-color:yellow;' type='text' size='40px' id='search_empid' name='search_empid' onchange='com_info_Search()'></td></tr><tr><td width='40%'>Emp ID</td><td><input type='text' size='40px' id='com_empid' name='com_empid'></td></tr><tr><td width='40%'>ID Card #</td><td><input type='text' size='40px' id='idcard'></td></tr><tr><td width='40%'>Department</td><td><select id='dept' name='sele' onchange='com_info_dept()'><option value=''></option></select></td></tr><tr><td width='20%'>Section</td><td><select id='sec' name='section' onchange='com_info_section()'><option value=''></option></select></td></tr><tr><td width='20%'>Line Number</td><td><select id='line' name='line' onchange='com_info_desig()'><option value=''></option></select></td></tr><tr><td width='20%'>Designation</td><td><select id='desig' name='desig' onchange='com_info_grade()'><option value=''></option></select></td></tr><tr><td width='20%'>Salary Grade</td><td><select id='salg' name='salg' onchange='com_info_empstat()'><option value=''></option></select></td></tr><tr><td width='20%'>Emp Status</td><td><select id='empstat' name='empstat' onchange='com_info_alert()'><option value=''></option></select></td></tr><tr><td width='20%'>Emp join date</td><td><input type='text' size='40px' id='ejd'></td></tr><tr><td align='right' colspan='2'><input type='button' name='add' onclick='enable_save()' value='NEW'/><input type='button' name='save' disabled='disabled' onclick='com_info_insert()' value='SAVE'/><input type='button' onclick='com_info_edit()' value='EDIT'/></td></tr></table></form>",
                            border:false
                        },{
                            title: 'Education & Skill',
                            header:false,
                            html : "<br/><form  name='eduskill' ><table width='70%' border='1' align='center'><tr><td width='40%' style='background-color:yellow;'>Find ID</td><td><input style='background-color:yellow;' type='text' size='40px' id='edu_skill_empid' onchange='ajaxSearch_edu_skill()' ></td></tr><tr><td width='40%'>Emp ID</td><td><input type='text' size='40px' id='edu_empid' ></td></tr><tr><td width='40%'>Employee Last Dgree</td><td><input type='text' size='40px' id='emp_last_dg'></td></tr><tr><td width='20%'>Passing year</td><td><input type='text' size='40px' id='pass_year'></td></tr><tr><td width='20%'>Passing Institute</td><td><input type='text' size='40px' id='edu_insti'></td></tr><tr><td width='20%'>Employee skill department</td><td><input type='text' size='40px' id='skill_dept'></td></tr><tr><td width='20%'>Year of Skill</td><td><input type='text' size='40px' id='skill_year'></td></tr><tr><td width='20%'>Company Name</td><td><input type='text' size='40px' id='skill_com_na'></td></tr><tr><td align='right' colspan='2'><input type='button' name='add' onclick='edu_enable_save()' value='NEW'/><input type='button' name='edu_save' disabled='disabled' onclick='ajax_edu_skill_Insert()' value='SAVE'/><input type='button' onclick='ajaxu_edu_update()' value='EDIT'/></td></tr></table></form>",
                            border:false
                        }]
                    })
            });
        }
        win.show();
    }
});



MyDesktop.AccordionWindow = Ext.extend(Ext.app.Module, {
    id:'acc-win',
    init : function(){
        this.launcher = {
            text: 'Accordion Window',
            iconCls:'accordion',
            handler : this.createWindow,
            scope: this
        }
    },

    createWindow : function(){
        var desktop = this.app.getDesktop();
        var win = desktop.getWindow('acc-win');
        if(!win){
            win = desktop.createWindow({
                id: 'acc-win',
                title: 'Accordion Window',
                width:250,
                height:400,
                iconCls: 'accordion',
                shim:false,
                animCollapse:false,
                constrainHeader:true,

                tbar:[{
                    tooltip:{title:'Rich Tooltips', text:'Let your users know what they can do!'},
                    iconCls:'connect'
                },'-',{
                    tooltip:'Add a new user',
                    iconCls:'user-add'
                },' ',{
                    tooltip:'Remove the selected user',
                    iconCls:'user-delete'
                }],

                layout:'accordion',
                border:false,
                layoutConfig: {
                    animate:false
                },

                items: [
                    new Ext.tree.TreePanel({
                        id:'im-tree',
                        title: 'Online Users',
                        loader: new Ext.tree.TreeLoader(),
                        rootVisible:false,
                        lines:false,
                        autoScroll:true,
                        tools:[{
                            id:'refresh',
                            on:{
                                click: function(){
                                    var tree = Ext.getCmp('im-tree');
                                    tree.body.mask('Loading', 'x-mask-loading');
                                    tree.root.reload();
                                    tree.root.collapse(true, false);
                                    setTimeout(function(){ // mimic a server call
                                        tree.body.unmask();
                                        tree.root.expand(true, true);
                                    }, 1000);
                                }
                            }
                        }],
                        root: new Ext.tree.AsyncTreeNode({
                            text:'Online',
                            children:[{
                                text:'Friends',
                                expanded:true,
                                children:[{
                                    text:'Jack',
                                    iconCls:'user',
                                    leaf:true
                                },{
                                    text:'Brian',
                                    iconCls:'user',
                                    leaf:true
                                },{
                                    text:'Jon',
                                    iconCls:'user',
                                    leaf:true
                                },{
                                    text:'Tim',
                                    iconCls:'user',
                                    leaf:true
                                },{
                                    text:'Nige',
                                    iconCls:'user',
                                    leaf:true
                                },{
                                    text:'Fred',
                                    iconCls:'user',
                                    leaf:true
                                },{
                                    text:'Bob',
                                    iconCls:'user',
                                    leaf:true
                                }]
                            },{
                                text:'Family',
                                expanded:true,
                                children:[{
                                    text:'Kelly',
                                    iconCls:'user-girl',
                                    leaf:true
                                },{
                                    text:'Sara',
                                    iconCls:'user-girl',
                                    leaf:true
                                },{
                                    text:'Zack',
                                    iconCls:'user-kid',
                                    leaf:true
                                },{
                                    text:'John',
                                    iconCls:'user-kid',
                                    leaf:true
                                }]
                            }]
                        })
                    }), {
                        title: 'Settings',
                        html:'<p>Something useful would be in here.</p>',
                        autoScroll:true
                    },{
                        title: 'Even More Stuff',
                        html : '<p>Something useful would be in here.</p>'
                    },{
                        title: 'My Stuff',
                        html : '<p>Something useful would be in here.</p>'
                    }
                ]
            });
        }
        win.show();
    }
});

// for example purposes
var windowIndex = 0;

MyDesktop.BogusModule = Ext.extend(Ext.app.Module, {
    init : function(){
        this.launcher = {
            text: 'Window '+(++windowIndex),
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
                width:540,
                height:480,
                html : '<p>Something useful would be in here.</p>',
                iconCls: 'bogus',
                shim:false,
                animCollapse:false,
                constrainHeader:true
            });
        }
        win.show();
    }
});

//----------------------------------------salary grate-----------------------
MyDesktop.SalaryGrade = Ext.extend(Ext.app.Module, {
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
        var win = desktop.getWindow('bogus'+src.windowId);
        if(!win){
            win = desktop.createWindow({
                id: 'bogus'+src.windowId,
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
                html : "<form  name='dept_section'><br/><br/><div style='border:#0000FF 1px solid;'><br/><br/><table width='90%' border='1' align='center'><tr><td width='40%'>Depertment name</td><td><input type='text' size='40px' id='dpt_name' onchange='ajaxSearch_deparment()' ></td></tr><tr><td align='center' colspan='2'><input type='button' onclick='ajax_deparment_Insert()' value='INSERT'/><input type='button' onclick='ajax_deparment_Delete()' value='DELETE'  /></td></tr></table><br/><br/></div><br/><br/><div style='border:#0000FF 1px solid;'><br/><br/><table width='90%' border='1' align='center'><tr><td width='40%'>Section name</td><td><input type='text' size='40px' id='section_name' onchange='ajaxSearch_section()' ></td></tr><tr><tr><td width='40%'>Department name</td><td><select name='select_dept'><option value=''></option></select></td></tr><tr><td align='center' colspan='2'><input type='button' onclick='ajax_section_Insert()' value='INSERT'/><input type='button' onclick='ajax_section_update()' value='UPDATE'/><input type='button' onclick='ajax_section_Delete()' value='DELETE'  /></td></tr><br/><br/></table></div></form>",
                iconCls: 'bogus',
                shim:false,
                animCollapse:false,
                constrainHeader:true
            });
        }
        win.show();
    }
});


MyDesktop.BogusMenuModule = Ext.extend(MyDesktop.BogusModule, {
    init : function(){
        this.launcher = {
            text: 'Bogus Submenu',
            iconCls: 'bogus',
            handler: function() {
				return false;
			},
            menu: {
                items:[{
                    text: 'Bogus Window '+(++windowIndex),
                    iconCls:'bogus',
                    handler : this.createWindow,
                    scope: this,
                    windowId: windowIndex
                    },{
                    text: 'Bogus Window '+(++windowIndex),
                    iconCls:'bogus',
                    handler : this.createWindow,
                    scope: this,
                    windowId: windowIndex
                    },{
                    text: 'Bogus Window '+(++windowIndex),
                    iconCls:'bogus',
                    handler : this.createWindow,
                    scope: this,
                    windowId: windowIndex
                    },{
                    text: 'Bogus Window '+(++windowIndex),
                    iconCls:'bogus',
                    handler : this.createWindow,
                    scope: this,
                    windowId: windowIndex
                    },{
                    text: 'Bogus Window '+(++windowIndex),
                    iconCls:'bogus',
                    handler : this.createWindow,
                    scope: this,
                    windowId: windowIndex
                }]
            }
        }
    }
});


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