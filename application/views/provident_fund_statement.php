<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Provident Fund Statement</title>
<link rel="stylesheet" type="text/css" href="../../../../../css/SingleRow.css" />
</head>

<body>
<div style="height:auto; width:800px; overflow:hidden; border:1px solid #000;" >

<?php
$report_month = $month;
$report_year  = $year;
$year_month = date("M-Y", mktime(0, 0, 0, $month, 1, $year));
$count = count($values["emp_id"]);

for($i = 0; $i<$count;$i++)
{
	echo "<div style='min-height:1000px; overflow:hidden;'>";
	
	$this->load->view('head_english');
	echo "<div style='text-align:center;font-size:15px; font-weight:bold;'>";
	echo "Provident Fund deduction upto date $year_month";
	echo "</div>";
	echo "<br />";
	
	$emp_id = $values["emp_id"][$i];
	?>
    <table border='0' style='font-size:15px; width:100%;' cellpadding="2" cellspacing="2">
        <tr>
            <td>Code											</td> 
            <td>:												</td>
            <td> <?php echo $emp_id = $values["emp_id"][$i];?> 			</td>
        </tr>
        <tr>
            <td>Name											</td> 
            <td>:												</td>
            <td> <?php echo $values["emp_full_name"][$i];?> 	</td>
        </tr>
        <tr>
            <td>Designation 	 								</td> 
            <td>:												</td>
            <td> <?php echo $values["desig_name"][$i];?> 		</td>
        </tr>
        <tr>
            <td>Department										</td> 
            <td>:												</td>
            <td> <?php echo $values["dept_name"][$i];?> 	</td>
        </tr>
        <tr>
            <td>Section 										</td> 
            <td>:												</td>
            <td> <?php echo $values["sec_name"][$i];?> 			</td>
        </tr>
        <tr>
            <td>Line											</td> 
            <td>:												</td>
            <td> <?php echo $values["line_name"][$i];?> 		</td>
        </tr>
        <tr>
            <td>Date of Join									</td> 
            <td>:												</td>
            <td> <?php echo $doj = $values["emp_join_date"][$i];?> 	</td>
            <td>Print Date									</td> 
            <td>:												</td>
            <td> <?php echo $print_date = date('d/m/Y');?> 	</td>
            
        </tr>
    </table>
    
    <table class='sal' border='1' cellspacing='0' cellpadding='0' style='font-size:15px; width:100%;'>
    	<tr>
        	<td colspan="3" style=" font-weight:bold; text-align:center;">Previous PF Statement</td>
        </tr>
    	<tr>
        	<td style="padding-left:10px; width:307px;">Current Basic </td>
            <td style=" font-weight:bold; width:10px;"> : </td>
            <td style="padding-left:10px;"> 
			<?php 
				$gross_sal 			= $this->common_model->get_gross_salary($emp_id);
				$salary_structure 	= $this->common_model->salary_structure($gross_sal);
				echo $basic_sal 	= $salary_structure['basic_sal'];
			?> 
            </td>
        </tr>
    	<tr>
            <td style="padding-left:10px;">PF Rate </td>
            <td style=" font-weight:bold; width:10px;"> : </td>
            <td style="padding-left:10px;">
            <?php
				$new_start_date = date('Y-m-d',strtotime($year_month));
				$provident_fund = $this->pf_model->provident_fund_calculation($emp_id, $new_start_date,$doj,$gross_sal,$basic_sal);
				echo $pf 		= $provident_fund["provident_fund"];
			?>
            </td>
        </tr>
    	<tr>
            <td style="padding-left:10px;">Total month from DOJ to <?php echo "'$year_month'"; ?> </td>
            <td style=" font-weight:bold; width:10px;"> : </td>
            <td style="padding-left:10px;">  
            <?php
         		echo $service_month = $this->common_model->get_service_month($new_start_date,$doj);
			?>
            </td>
        </tr>
    	<tr>
            <td style="padding-left:10px;">Approximate PF Deduction upto dated  <?php echo "'$year_month'"; ?></td>
            <td style=" font-weight:bold; width:10px;"> : </td>
            <td style="padding-left:10px;"> 
            <?php
				echo $total_pf = $this->pf_model->get_update_pf($emp_id,$new_start_date);
			?>
            </td>
        </tr>
    </table> 
    <br />
	
    <?php
	$pf_data	= $this->pf_model->get_pf_statement($emp_id, $report_year, $report_month);
	
	//print_r($pf_data);
	$total_provident_fund 	= 0;
	$tototal_bank_interest 	= 0;
	$total_company_pf 		= 0;
	$grand_total 			= 0;
	$count1 = count($pf_data); 
	
	echo "<table class='sal' border='1' bordercolor='#000000' cellspacing='0' cellpadding='0' style='text-align:center; font-size:13px; width:100%; '> <th>SINo</th><th>Year No</th><th>Month</th><th>PF Deduction</th><th>Bank Interest</th><th>Company PF</th><th>Total PF</th>";
	for($k = 0; $k<$count1;$k++)
	{
		//echo $values[$emp_id]["shift_log_date"][$k];
		//echo "<br>";
		
		echo "<tr>";
	
		echo "<td>&nbsp;";
		echo $k + 1;;
		echo "</td>";
		
		echo "<td>&nbsp;";
		echo $year = date('Y',strtotime($pf_data[$k]["salary_month"]));
		echo "</td>";
		
		echo "<td>&nbsp;";
		echo $month = date('F',strtotime($pf_data[$k]["salary_month"]));
		echo "</td>";
		
		echo "<td style='text-align:right; padding-right:10px;'>";
		echo $pf_data[$k]["provident_fund"];
		$total_provident_fund = $total_provident_fund + $pf_data[$k]["provident_fund"];
		echo "</td>";
		
		echo "<td style='text-align:right; padding-right:10px;'>";
		echo $pf_data[$k]["pf_bank_interest"];
		$tototal_bank_interest = $tototal_bank_interest + $pf_data[$k]["pf_bank_interest"];
		echo "</td>";
		
		echo "<td style='text-align:right; padding-right:10px;'>";
		echo $pf_data[$k]["company_pf"];
		$total_company_pf = $total_company_pf + $pf_data[$k]["company_pf"];
		echo "</td>";
		
		echo "<td style='text-align:right; padding-right:10px;'>";
		echo $pf_data[$k]["update_pf"];
		$grand_total = $grand_total + $pf_data[$k]["update_pf"];
		echo "</td>";
		
	
		echo "</tr>";
	} 
	//$grand_total = $total_provident_fund + $tototal_bank_interest + $total_company_pf;
	?>
		<tr style="font-weight:bold;">
        	<td colspan="3"> Grand Total 				</td>
            <td style="text-align:right; padding-right:10px;"> <?php echo number_format($total_provident_fund,2); ?> 	</td>
            <td style="text-align:right; padding-right:10px;"> <?php echo number_format($tototal_bank_interest,2); ?> 	</td>
            <td style="text-align:right; padding-right:10px;"> <?php echo number_format($total_company_pf,2); ?> 		</td>
            <td style="text-align:right; padding-right:10px;"> <?php echo number_format($grand_total,2); ?> 			</td>
	</table>
	</div>
	<br>
<?php }
?>

</div>
</body>
</html>
