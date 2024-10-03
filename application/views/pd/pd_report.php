<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>MSH Payroll Reports</title>

  <?php $base_url = base_url();
	
	?>
	
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $base_url; ?>themes/redmond/jquery-ui-1.8.2.custom.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo $base_url; ?>themes/ui.jqgrid.css" />
	 <link rel="stylesheet" type="text/css" media="screen" href="<?php echo $base_url; ?>css/calendar.css" />
		
	<script type="text/javascript" src="<?php echo $base_url; ?>js/jquery.min.js"></script>
	<script src="<?php echo $base_url; ?>js/i18n/grid.locale-en.js" type="text/javascript"></script>
	<script src="<?php echo $base_url; ?>js/jquery.jqGrid.min.js" type="text/javascript"></script>
	<script src="<?php echo $base_url; ?>js/calendar_eu.js" type="text/javascript"></script>
    
<script>
function style_detail_report()
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
var article_id = document.getElementById('article_id').value;
if(article_id =='')
{
	alert("Please select Article Id");
	return;
}		
hostname = window.location.hostname;
url =  "http://"+hostname+"/erp_target/index.php/pd_report_con/style_detail_report/"+article_id;	
festival_bonus = window.open(url,'festival_bonus',"menubar=1,resizable=1,scrollbars=1,width=1600,height=800");
festival_bonus.moveTo(0,0);
}
</script>
	

</head>
<body bgcolor="#ECE9D8">
<div align="center" style=" margin:0 auto; width:1000px; min-height:555px; overflow:hidden;">
<div style="float:left; overflow:hidden; width:65%; height:auto; padding:10px;">
<form name="grid">
<div>
<fieldset style='width:95%;'><legend><font size='+1'><b>Style Report</b></font></legend>
<table>
<tr>
<td>Style Name</td><td>:</td><td><input type="text" name='article_id' id='article_id' style="width:150px;" /> <input type="button" style="width:150px; cursor:pointer;"  value="Style Detail Report" onClick="style_detail_report()"></td>
</tr>
</table>
</fieldset>
</div>

</form>

</div>
<div style="float:right;">
<table id="list1" style="font-family: 'Times New Roman', Times, serif; font-size:15px;"><tr><td></td></tr></table>
</div>
<div id="viewid"></div>
</div>
</body>
</html>