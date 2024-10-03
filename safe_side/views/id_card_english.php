<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ID Card English</title>
<link  rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/id_card_style_english.css" />
<style type="text/css">
.bangla{
font-family:SolaimanLipi;
}
.bijoy{
font-family:SutonnyMJ;
font-size:13px;
}
</style>
</head>

<body>
<?php
//print_r($values);
$i = 0;
$k = 0;
//for($k=0; $k<=100; $k++)
$count = $values->num_rows();
$div_loop = ceil($count/6);
$data = $values->result_array();

for($j=1; $j<= $div_loop; $j++)
{
?>
<div style="width:8in; height:11.5in; overflow:hidden;">
	<table align="left" border="0" cellpadding="0" cellspacing="0">
	<tr>
	<?php
	//echo "Start".$k."<br>";
	//echo "End".$end = $k + 5;
	//echo "<br>";
	$end = $k + 5;
	$l = 0;
	if($j == $div_loop)
	{
		$end = $count - $div_loop;
	}
	
	for($k; $i <= $end; $i++)
	{
		//echo $i." | ";
		//echo $l;
		if($l % 2 == 0)
		{
			?>
			</tr><tr>
			<?php
		}
		?>
		<td style="width:4in; height:3.5in; "valign='top' align='center'>
	  <div id="container">
	  
		 <div id="text">
		 <div class="vText">
		   <p style="text-align:center; font-weight:bold;">If Found Please Return to:<br/>
		   </p>
		   <p style="text-align:center;"><?php echo $company_name_english = $this->common_model->company_information("company_name_english"); ?><br/>
		   </p>
		   <p><?php echo $company_add_english = $this->common_model->company_information("company_add_english"); ?></p>
		   <p>Phone : <?php echo $company_phone = $this->common_model->company_information("company_phone"); ?> </p>
		   </div>
		 </div>
	
	
		 
		 <div id="id" align="center">	
		 
		  <div id="logo"> 
			<img src="<?php  echo base_url();?>images/<?php echo $company_logo = $this->common_model->company_information("company_logo"); ?>" width="48" alt="LOGO" /><br />
			<!--<img src="<?php  echo base_url();?>images/company_name.jpg" height="15" width="160" /><br />-->
			<div style=" margin:0 auto; width:100%; height:auto;font-family:Arial, Helvetica, sans-serif; font-size:12px; font-weight:bold;"><?php echo $company_name_english = $this->common_model->company_information("company_name_english"); ?>
			</div>
		  </div>
		  <div id="image"  >
			<img border="1" src="<?php echo base_url();?>uploads/photo/<?php echo $data[$i]["img_source"];?>" height="85" width="75" />
		  </div>
		  
		  <div id="profile" align="left">
		  <table cellpadding="1" cellspacing="0">
		  <tr>
		  <td><b>Name</b> </td><td>:</td><td class="bangla"> <?php echo $data[$i]["emp_full_name"]; ?></td></tr>
			<tr>
		  <td><b>Card No.</b> </td><td>:</td><td > <?php echo $data[$i]["emp_id"] ?></td></tr>
		  
			<tr><td><b>Designation</b> </td><td>:</td><td> <?php echo $data[$i]["desig_name"]; ?></td></tr>
			<tr><td><b>Section</b> </td><td>:</td><td> <?php echo $data[$i]["sec_name"]; ?></td></tr>
			<tr><td><b>DOJ</b> </td><td>:</td><td><?php 
					$join_date = $data[$i]["emp_join_date"]; 
					$year=trim(substr($join_date,0,4));
					$month=trim(substr($join_date,5,2));
					$day=trim(substr($join_date,8,2));
					echo " ".$date_format = date("d-m-y", mktime(0, 0, 0, $month, $day, $year));
				?>	</td></tr>
				<br/><br/><br/><br/><br/>
				</table>
		  </div>
		  
		  <div id="sign"> 
			<span><img src="<?php echo base_url();?>images/<?php echo $company_signature = $this->common_model->company_information("company_signature"); ?>" width="100" height="auto" /></span>
			<br />
			<span>Authority Signature</span>
		  </div>
		  
		</div>
	   
	  </div>
	  </td>
	  <?php
	$k =$i+1;
	$l++;
	}
	?>
	</tr>
</table>

</div>
<br />
<?php
}
?>

</body>
</html>
