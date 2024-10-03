<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Stylewise Production Summary Report</title>
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
<span style="font-size:13px; font-weight:bold;">Article wise Production Summary Report</span>
<br />
<br />
<table border="1" style="border-collapse:collapse; padding-left:2px;padding-right:2px;" cellpadding="2" cellspacing="0" >
<tr style="text-align:center; font-size:14px; font-weight:bold;">
<td rowspan="2">SL.</td>
<td rowspan="2">Buyer</td>
<td rowspan="2">Order No.</td>
<td rowspan="2">Article</td>
<td rowspan="2">Ship Date</td>
<td rowspan="2">Gauge</td>
<td rowspan="2">Qty</td>
<td rowspan="2">Qty+5%</td>
<td colspan="2" style="background:#EBEBEB;">knitting Status</td>
<td colspan="2">Linking Status</td>
</tr>
<tr style="text-align:center; font-size:14px; font-weight:bold;">
<td style="background:#EBEBEB;">Total</td>
<td style="background:#EBEBEB;">Balance</td>
<td>Total</td>
<td>Balance</td>
</tr>
<?php
for($i = 0; $i<$count_article_id;$i++)
{
?>

	<tr style="font-size:13px;">
    <?php 
	$article_id = $values["article_id"][$i];
	$buyer_number = $this->db->where("article_id",$article_id)->get('pd_style_infos')->row()->order_number; ?>
    <td><?php echo $i+1; ?></td>
    <td><?php echo $order_number = $values["byuer_name"][$i]; ?></td>
    <td><?php echo $order_number = $values["order_number"][$i]; ?></td>
   	<td><?php echo $style_id = $values["style_id"][$i]; ?></td>
    <td><?php echo $shipment_date = date('d-M-Y', strtotime($values["shipment_date"][$i]));  ?></td>
    <td><?php echo $gauge_id = $values["gauge_name"][$i]; ?></td>
    <td style="text-align:right;"><?php echo $total_quantity = $values["total_quantity"][$i]; ?></td>
    <td style="text-align:right;"><?php echo $five_percent_plus_qty = $values["five_percent_plus_qty"][$i]; ?></td>
    <td style="text-align:right;background:#EBEBEB;"><?php echo $qty_complete_for_kinit = $values["qty_complete_for_kinit"][$i]; ?></td>
    <td style="text-align:right;background:#EBEBEB;"><?php echo $balance_knitting = $total_quantity - $qty_complete_for_kinit ; ?></td>
    <td style="text-align:right;"><?php echo $qty_complete_for_linking = $values["qty_complete_for_linking"][$i]; ?></td>
    <td style="text-align:right;"><?php echo $balance_linking = $total_quantity - $qty_complete_for_linking ; ?></td>
    </tr>
<?php	
}
?>
</table>
</div>
</body>
</html>
