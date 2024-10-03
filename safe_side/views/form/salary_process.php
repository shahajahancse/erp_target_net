<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Salary Process</title>
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>css/style.css" />
<?php if(isset($output)){
foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
<?php foreach($js_files as $file): ?>
	<script src="<?php echo $file; ?>"></script>
<?php endforeach;} ?>
<style type='text/css'>
a {
    text-decoration: none;
    font-size: 14px;
}
a:hover
{
	text-decoration: none;
}

</style>

 
<script type="text/javascript" src="<?php echo base_url();?>js/dynamic.js"></script>


</head>

<body bgcolor="#ECE9D8">

<div align="center" style="margin:0 auto; width:100%; overflow:hidden; ">

<fieldset style='width:600px;'><legend><font size='+1'><b>Salary Process</b></font></legend>

<!--Select Month and Year :<select id='report_month_sal'><option value='01'>January</option><option value='02'>February</option><option value='03'>March</option><option value='04'>April</option><option value='05'>May</option><option value='06'>Jun</option><option value='07'>July</option><option value='08'>August</option><option value='09'>September</option><option value='10'>October</option><option value='11'>November</option><option value='12'>December</option></select><select id='report_year_sal'><option value='2011'>2011</option><option value='2012'>2012</option><option value='2013'>2013</option><option value='2014'>2014</option><option value='2015'>2015</option><option value='2016'>2016</option><option value='2017'>2017</option><option value='2018'>2018</option><option value='2019'>2019</option><option value='2020'>2020</option></select>-->

<?php $this->load->view('month_year'); 
$salary_process = "1";
$final_salary_process = "2";
?>
<input type='button' name='view' onclick='salary_process(<?php echo $salary_process; ?>)' value='Process'/>
<input type='button' name='view' onclick='salary_process(<?php echo $final_salary_process; ?>)' value='Final Process'/>
</fieldset>

</div>
<div id="loader"  align="center" style="margin:0 auto; width:600px; overflow:hidden; display:none; margin-top:10px;"><img src="<?php echo base_url();?>/images/ajax-loader.gif" /></div>


<div style="width:58%; margin:5px; margin:0 auto; margin-top:90px;" >
<?php 
if(isset($output))
{
 echo $output; 
 }
?>
</div>

</body>
</html>