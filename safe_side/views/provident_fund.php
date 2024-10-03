<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Provident Fund Report</title>
<link rel="stylesheet" type="text/css" href="../../../../../css/print.css" media="print" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/SingleRow.css" />

</head>

<body>

<div style=" margin:0 auto;  width:800px;">
<?php 
$this->load->view("head_english"); 
?>
<!--Report title goes here-->
<div align="center" style=" margin:0 auto;  overflow:hidden; font-family: 'Times New Roman', Times, serif;"><span style="font-size:12px; font-weight:bold;">
Provident Fund of <?php echo date("M-Y", strtotime($salary_month)); ?></span>
<br />
<br />


<table class="sal" border="1" cellpadding="0" cellspacing="0" align="center" style="font-size:12px;">
<th>SL</th>
<th>Emp ID</th>
<th width="110px;">Name of Workers</th>
<th>Designation</th> 
<th>Section</th> 
<th>Join Date</th> 
<th>Basic Salary</th>
<th>Gross Salary</th>
<th>Service Month</th> 
<th>Eligible Percentage of PF (%)</th> 
<th>Deduction Amount</th> 
<th>Bank Interest</th>
<th>Company Provided Amount</th> 
<th>Total PF</th> 
<th>Worker Signature</th> 

<?php
$total_pf = 0;
$count = count($values["emp_name"]);
for($i=0; $i<$count; $i++ )
{
	echo "<tr style='height:40px;'>";
	
	echo "<td>";
	echo $k = $i+1;
	echo "</td>";
	
		
	echo "<td style='text-align:center'>";
	echo $values["emp_id"][$i];
	echo "</td>";
	
	echo "<td style='text-align:center'>";
	echo $values["emp_name"][$i];
	echo "</td>";
	
	echo "<td style='text-align:center'>";
	echo $values["desig_name"][$i];
	echo "</td>";

	
	echo "<td style='text-align:center'>";
	echo $values["sec_name"][$i];
	echo "</td>";
	$doj = $values["doj"][$i];
	echo "<td style='text-align:center'>";
	echo date("d-M-y",strtotime($doj));
	echo "</td>";
	
	echo "<td style='text-align:right'>";
	echo $values["basic_sal"][$i];
	echo "</td>";
	
	echo "<td style='text-align:right'>";
	echo $values["gross_sal"][$i];
	echo "</td>";
	
	echo "<td style='text-align:center'>";
	echo $values["service_month"][$i];
	echo "</td>";
	
	echo "<td style='text-align:center'>";
	echo $values["pf_percentage"][$i];
	echo "</td>";
	
	echo "<td style='text-align:center'>";
	echo $values["provident_fund"][$i];
	echo "</td>";
	
	echo "<td style='text-align:right'>";
	echo $values["pf_bank_interest"][$i];
	echo "</td>";
		
	echo "<td style='text-align:right' >";
	echo $values["company_pf"][$i];
	echo "</td>";
	
	echo "<td style='text-align:right;width:80px;'>";
	echo $values["update_pf"][$i];
	$total_pf = $total_pf + $values["update_pf"][$i];
	echo "</td>";
	
	
	
	echo "<td style='width:100px;'";
	echo "&nbsp;";
	echo "</td>";
	
	echo "</tr>";
}

?>
<tr>
<td  colspan="13" style="text-align:center; font-weight:bold;" >
Grand Total
</td>
<td style="text-align:right; font-weight:bold;" ><?php echo number_format($total_pf); ?>/=</td>
</tr>
</table>
</div>
</div>
</body>
</html>
