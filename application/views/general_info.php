<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Monthly Salary Report</title>
<link rel="stylesheet" type="text/css" href="../../../../../../css/print.css" media="print" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/SingleRow.css" />

</head>

<body>
<?php //print_r($values); 
//echo $daily_status;
/*<!--$base_url = base_url();
$url = $base_url."index.php/payroll_con/monthly_salary_sheet_export/$salary_month/$col_desig/$col_line/$col_dept/$col_all";
?>
<div>
<div id="no_print" style="float:right;">
<a href="<?php echo $url ?>"><img height="30px" width="30px" src="<?php echo $base_url.'images/xls.jpg'; ?>" align="" /></a>
</div>-->*/
?>
<div style="">
<?php 
$this->load->view("head_english"); 
?>
</div>
<div align="center" style=" margin:0 auto;  overflow:hidden; font-family: 'Times New Roman', Times, serif; "><span style="font-size:13px; font-weight:bold;">
General Report 
</span>
<br />
<br />

<table class="sal" border="1" cellspacing="0" cellpadding="0" style="font-size:13px;">

  <tr >
    <td width="15"><div align="center"><strong>SL</strong></div></td>
    <td width="14"><div align="center"><strong>ID</strong></div></td>
    <td width="47"><div align="center"><strong>Name</strong></div></td>
    <td width="33"><div align="center"><strong>Dept</strong></div></td>
    <td width="25"><div align="center"><strong>Sec.</strong></div></td>
    <td width="35"><div align="center"><strong>Line</strong></div></td>
    <td width="17"><div align="center"><strong>Desig.</strong></div></td>
    <td width="19"><div align="center"><strong>DOJ</strong></div></td>
    <td width="31"><div align="center"><strong>Sal. Grade</strong></div></td>
	<td width="35"><div align="center"><strong>Gross Salary</strong></div></td>
    <!--<td width="40"><div align="center"><strong>Present</strong></div></td>
    <td width="15"><div align="center"><strong>LV</strong></div></td>
    <td width="23"><div align="center"><strong>H/W</strong></div></td>
    <td width="22"><div align="center"><strong>Abs.</strong></div></td>
    <td width="26"><div align="center"><strong>Pay    Days</strong></div></td>
    <td width="36"><div align="center"><strong>Abs.    Deduc.</strong></div></td>
    <td width="28"><div align="center"><strong>Basic</strong></div></td>
    <td width="17"><div align="center"><strong>HR</strong></div></td>
    <td width="19"><div align="center"><strong>MA</strong></div></td>
    <td width="42"><div align="center"><strong>Pay    Amount</strong></div></td>
    <td width="35"><div align="center"><strong>Atten.    Bonus</strong></div></td>
    <td width="34"><div align="center"><strong>Trans.</strong></div></td>
    <td width="33"><div align="center"><strong>Lunch</strong></div></td>
    <td width="37"><div align="center"><strong>Others</strong></div></td>
    <td width="31"><div align="center"><strong>Total    Allaw</strong></div></td>
    <td width="32"><div align="center"><strong>Total    OT Hours</strong></div></td>
    <td width="24"><div align="center"><strong>OT    Rate</strong></div></td>
    <td width="42"><div align="center"><strong>Total    OT Amount</strong></div></td>
    <td width="22"><div align="center"><strong>Adv.</strong></div></td>
    <td width="14"><div align="center"><strong>PF</strong></div></td>
    <td width="37"><div align="center"><strong>Others</strong></div></td>
    <td width="54"><div align="center"><strong>Total    Deduction</strong></div></td>-->
  </tr>
<?php
			$serial = 1;
			

			foreach($value as $row)
			{
				echo "<tr  >";
				echo "<td  style='text-align:center;'>";
				echo $serial;
				echo "</td>";
							 
				echo "<td style='text-align:center;'>";
				echo $row->emp_id;
				echo "</td>"; 
				
				echo "<td width='150' style='padding-left:2px;'>";
				echo $row->emp_full_name;
				echo "</td>"; 
				
				echo "<td width='150' style='padding-left:2px;'>";
				echo $row->dept_name;
				echo "</td>"; 
				
				echo "<td width='150' style='padding-left:2px;'>";
				echo $row->sec_name;
				echo "</td>"; 
				
				echo "<td width='150' style='padding-left:2px;'>";
				echo $row->line_name;
				echo "</td>"; 
				
				echo "<td width='200' style='padding-left:2px;'>";
				echo $row->desig_name;
				echo "</td>"; 
				
				echo "<td style='text-align:center;'>";
				$date = $row->emp_join_date;
				$year=trim(substr($date,0,4));
				$month=trim(substr($date,5,2));
				$day=trim(substr($date,8,2));
				$date_format = date("d-M-y", mktime(0, 0, 0, $month, $day, $year));
				echo $date_format;
				echo "</td>"; 
				
				echo "<td width='60' style='text-align:center;'>";
				echo $row->gr_name;
				echo "</td>"; 
				
				echo "<td width='80' style='text-align:right;'>";
				echo $row->gross_sal;
				echo "</td>"; 
			
								
				$serial++;
				echo "</tr>";
				
			}
?>
  
  
</table>

</div>
</body>
</html>