<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $title; ?></title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/print.css" media="print" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/SingleRow.css" />

</head>

<body>
<?php //print_r($values); ?>
<div style=" margin:0 auto;  width:800px;">
<div id="no_print" style="float:right;">
</div>
<?php 
$this->load->view("head_english"); 
?>
<!--Report title goes here-->
<div align="center" style=" margin:0 auto;  overflow:hidden; font-family: 'Times New Roman', Times, serif;"><span style="font-size:13px; font-weight:bold;">
<?php echo $title; ?> of <?php echo $report_date; ?></span>
<br />
<br />


<table class="sal" border="1" cellpadding="0" cellspacing="0" align="center" style="font-size:12px;">
<th>SL</th><th><?php echo $category; ?> Name</th><th>Total Employee</th><th>Total Present</th> <th>Total Absent</th> <th>Total Leave</th> <th>Total Late</th>
<?php
$all_emp 	 = 0;
$all_present = 0;
$all_absent  = 0;
$all_leave   = 0;
$all_late    = 0;
$count = count($values["cat_name"]);
for($i=0; $i<$count; $i++ )
{
	echo "<tr>";
	
	echo "<td>";
	echo $k = $i+1;
	echo "</td>";
	
	echo "<td>";
	echo $values["cat_name"][$i];
	echo "</td>";
	
	echo "<td style='text-align:center;'>";
	if($values["daily_att_sum"][$i]){
	echo $values["daily_att_sum"][$i]['all_emp'];
	$all_emp = $all_emp + $values["daily_att_sum"][$i]['all_emp'];}
	else{
	echo '--';}
	echo "</td>";
	
	echo "<td style='text-align:center;'>";
	if($values["daily_att_sum"][$i]){
	echo $values["daily_att_sum"][$i]['all_present'];
	$all_present = $all_present + $values["daily_att_sum"][$i]['all_present'];}
	else{
	echo '--';}
	echo "</td>";
	
	echo "<td style='text-align:center;'>";
	if($values["daily_att_sum"][$i]){
	echo $values["daily_att_sum"][$i]['all_absent'];
	$all_absent = $all_absent + $values["daily_att_sum"][$i]['all_absent'];}
	else{
	echo '--';}
	echo "</td>";
	
	echo "<td style='text-align:center;'>";
	if($values["daily_att_sum"][$i]){
	echo $values["daily_att_sum"][$i]['all_leave'];
	$all_leave = $all_leave + $values["daily_att_sum"][$i]['all_leave'];}
	else{
	echo '--';}
	echo "</td>";
	
	echo "<td style='text-align:center;'>";
	if($values["daily_att_sum"][$i]){
	echo $values["daily_att_sum"][$i]['all_late'];
	$all_late = $all_late + $values["daily_att_sum"][$i]['all_late'];}
	else
	echo '--';
	echo "</td>";
	
	echo "</tr>";
}
?>
<tr style="font-weight:bold; text-align:center;">
<td colspan="2">Total</td>
<td><?php echo $all_emp; ?></td>
<td><?php echo $all_present; ?></td>
<td><?php echo $all_absent; ?></td>
<td><?php echo $all_leave; ?></td>
<td><?php echo $all_late; ?></td>

</table>
</div>
</div>
</body>
</html>
