<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<title>Maternity Benefit Report</title>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/SingleRow.css" />
<style type="text/css">
.center{ text-align:center;}
.right{text-align:right; padding-right:10px;}
.left{text-align:left; padding-left:10px;}
</style>
</head>

<body>
<?php
if($values->num_rows() == 0)
{
	echo 'Requested list is empty';
	exit();
}
		  
foreach($values->result() as $row)
{?>
<div style=" width:730px;height:1245px; margin:0 auto;  overflow:hidden;  font-family: Arial, Helvetica, sans-serif; float:left; font-size:12px; float:left; margin-bottom:50px;">
  	<?php $this->load->view('head_english'); ?> 
  	<br />  
    <div style="font-size:16px; font-weight:bold; text-align:center; ">Maternity Benefit Report</div>
	<br />  
    <div style=" width:50%; float:left; font-size:12px; font-weight:bold;">
		<table width="383" border="0" cellpadding="0" cellspacing="0" style="font-size:12px; font-weight:bold;">
		  <tr>
			<td width="147">Name Of Employee</td>
			<td width="10">:</td>
			<td width="226"><span style="font-family:Arial, Helvetica, sans-serif;"><b><?php echo $row->emp_full_name; ?></b></span> </td>
		  </tr>
		  <tr>
			<td>Dsignation </td>
			<td>:</td>
			<td>
				<span style="font-family:Arial, Helvetica, sans-serif;">
					<b>
						<?php echo $designation = $this->leave_model->get_designation($row->emp_desi_id); ?>
					</b>
				</span>
			</td>
		  </tr>
		  <tr>
			<td>Employee ID</td>
			<td>:</td>
			<td>
				<span style="font-family:Arial, Helvetica, sans-serif;">
					<b>
						<?php echo $row->emp_id; ?>
					</b>
				</span>
			</td>
		  </tr>
		   <tr>
			<td>Section</td>
			<td>:</td>
			<td>
				<span style="font-family:Arial, Helvetica, sans-serif;">
					<b>
						<?php echo $section = $this->leave_model->get_section_name($row->emp_sec_id); ?>
					</b>
				</span>
			</td>
		  </tr>
		  <tr>
			<td>DOB</td>
			<td>:</td>
			<td>
				<span style="font-family:Arial, Helvetica, sans-serif;">
					<b>
						<?php echo $emp_dob =  date('d-M-y',strtotime($row->emp_dob)); ?>
					</b>
				</span>
			</td>
		  </tr>
		  <tr>
			<td>DOJ</td>
			<td>:</td>
			<td>
				<span style="font-family:Arial, Helvetica, sans-serif;">
					<b>
						<?php echo $emp_join_date =  date('d-M-y',strtotime($row->emp_join_date)); ?>
					</b>
				</span>
			</td>
		  </tr>
		</table>
		
	  </div>
	<div style=" width:48%; float:right; font-size:12px; font-weight:bold; text-align:right;">
		<img height="80" width="70" border="1" src="<?php echo base_url();?>uploads/photo/<?php echo $row->img_source;?>"	 alt="Emp Image"  />
	</div>
  	<br />
	<br />
	<div style=" width:100%; height:auto; overflow:hidden; position:relative; top:30px;">
		<div style="width:49%; border:black 1px solid; padding:5px 0 0 5px; float:left; height:60px; overflow:hidden;">
			<span style="font-weight:500; font-size:12px; font-weight:bold;">
				<u>Present Adress</u>
				<br />
				<span style="font-family:Arial, Helvetica, sans-serif;">
					<?php echo $row->emp_pre_add; ?>
				</span>
			</span>
		</div>
		<div style="width:49%; border:black 1px solid; padding:5px 0 0 5px; float:right; height:60px; overflow:hidden;">
			<span style="font-weight:500; font-size:12px; font-weight:bold;"> 
				<u>Parmanent Address</u>
				<br />
				<span style="font-family:Arial, Helvetica, sans-serif;">
					<?php echo $row->emp_par_add; ?>
				</span>
			</span>
		</div>
  </div>
  	<br /><br /><br /><br /><br />
	<div style="float:left; width:100%;">
	  <table class="sal" width="100%" cellpadding="1" cellspacing="1" border="1" >
		<tr>
			<th>SL					</th>
			<th>Name Of Month		</th>
			<th>Actual Working Days	</th>
			<th>Payable Amount		</th>
			<th>Remarks				</th>
		</tr>
		<tr>
			<td>1</td>
			<td class="left">December-11</td>
			<td class="center">26</td>
			<td class="right">4446</td>
			<td></td>
		</tr>
		<tr>
			<td>2</td>
			<td class="left">January-12</td>
			<td class="center">22</td>
			<td class="right">4213</td>
			<td></td>
		</tr>
		<tr>
			<td>3</td>
			<td class="left">February-12</td>
			<td class="center">24</td>
			<td class="right">4518</td>
			<td></td>
		</tr>
		<tr style="font-weight:bold;">
			<td colspan="2">Total = </td>
			<td class="center">72</td>
			<td class="right">13177</td>
			<td></td>
		</tr>
	  </table>
	  <br /><br /><br />
	   <table align="center" class="sal" width="60%" cellpadding="1" cellspacing="1" border="1" >
	   	<tr>
			<td> 03 Month Total Payble Amount</td>
			<td> 13177 </td>
		</tr>
		<tr>
			<td> 03 Month Actual Working Days</td>
			<td> 72 </td>
		</tr>
		<tr>
			<td> Per Day Payable Rate</td>
			<td> 183 </td>
		</tr>
		<tr style="font-weight:bold;">
			<td> 1st Installment Total Amount</td>
			<td> 10249 </td>
		</tr>
		<tr style="font-weight:bold;">
			<td> 2nd Installment Total Amount</td>
			<td> 10249 </td>
		</tr>
				
	   </table>
	</div>
	<div style=" width:97%; height:auto; overflow:hidden; position:relative; top:600px; font-weight:bold; padding:10px;">
	Prepared By  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Account Manager  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	Factory Manager    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   Authority
	</div>
</div>
<?php } ?>
</body>
</html>