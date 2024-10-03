<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Daily Production Summary Report</title>
<link rel="stylesheet" type="text/css" href="../../../../../css/SingleRow.css" />
</head>

<body>
<div align="center" style="height:100%; width:100%; overflow:hidden;" >

<?php
//print_r($values);
$this->load->view('head_english');
$count_article_id = count($values["article_id"]);

//$count = 3;
?>
<span style="font-size:13px; font-weight:bold;">Daily Production Summary Report</span>
<br />
<br />
<table border="1" style="border-collapse:collapse; padding-left:2px;padding-right:2px;" cellpadding="3" cellspacing="0" >
<tr style=" font-weight:bold; font-size:14px;"><td colspan="5">Section: <?php echo $values["section_name"]; ?></td><td colspan="6" style="text-align:right">Date: <?php echo $values["date"]; ?></td>
</tr>
<tr><td colspan="11">&nbsp;</td>
</tr>
<tr style="text-align:center; font-size:14px; font-weight:bold;">
<td rowspan="2">SL.</td>
<td rowspan="2">Buyer</td>
<td rowspan="2">Article</td>
<td rowspan="2">Order Qty</td>
<td rowspan="2">Type</td>
<td rowspan="2">Colour</td>
<td rowspan="2">Size</td>
<td>Today</td>
<td>Total</td>
<td>Balance</td>
<td rowspan="2">Remarks</td>
</tr>
<tr style="text-align:center; font-size:14px; font-weight:bold; background:#E9E9E9;">
<td >Qty/Pcs</td>
<td >Qty/Pcs</td>
<td >Qty/Pcs</td>
</tr>

<?php
for($i = 0; $i<$count_article_id;$i++)
{
?>

	<tr style="font-size:13px; text-align:center;">
    <td><?php echo $i+1; ?></td>
    <td><?php echo  $values["buyer_name"][$i]; ?></td>
    <td><?php echo  $values["style_id"][$i]; ?></td>
    <td><?php echo  $values["order_qty"][$i]; ?></td>
    <td><?php echo  $values["process_name"][$i]; ?></td>
    <td><?php echo  $values["color_name"][$i]; ?></td>
    <td><?php echo  $values["size_name"][$i]; ?></td>
    <td><?php echo  $values["quantity"][$i]; ?></td>
    <td><?php echo  $values["qty_complete"][$i]; ?></td>
    <td><?php echo  $values["balance"][$i]; ?></td>
    <td>&nbsp;</td>
    </tr>
<?php	
}
?>
</table>
<br />
<br />
<br />
<table style="width:550px;text-align:center;">
<tr>
<td  width="20%">Distributor</td><td width="20%">Incharge</td><td width="20%">APM</td><td width="20%">AGM</td><td width="20%">G.M</td>
</tr>
</table>
</div>
</body>
</html>
