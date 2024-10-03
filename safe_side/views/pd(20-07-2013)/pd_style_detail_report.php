<title>Details Style Report</title>
<style>
th {
	padding: 1px;
}
</style>
<?php $this->load->view("head_english"); ?>
<?php 
$article_id = 0;
foreach($query->result() as $row)
{
	$article_id = $row->article_id;
	
?>
<div style="text-align:center; font-family:Arial, Helvetica, sans-serif;">Details Article report of <?php echo $article_id;?></div>
<br>
<table border="1" align="center" width="700px;" style="font-size:11px; border:1px solid #000; border-collapse:collapse;">
	<tr bgcolor="#F3F3F3"><td colspan="6" align="center" valign="top">Article Details</td></tr>
	<tr>
		<th width="107" align="right" valign="top" bgcolor="#F3F3F3">Buyer Name  </th>
		<td align="left" valign="top" style="min-width:60px; padding-left:5px;"><?php echo $this->pd_report_model->get_buyer_name($row->buyer_id);?></td>
		<th width="118" align="right" valign="top" bgcolor="#F3F3F3">Gauge  </th>
		<td align="left" valign="top" style="min-width:60px; padding-left:5px;"><?php echo $this->pd_report_model->get_gauge_name($row->gauge_id);?></td>
		<th width="113" align="right" valign="top" bgcolor="#F3F3F3">Merchandiser Name  </th>
		<td align="left" valign="top" style="min-width:60px; padding-left:5px;"><?php echo $this->pd_report_model->get_merchandiser_name($row->merchandiser_id);?></td>
	</tr>
	<tr>
		<th align="right" valign="top" bgcolor="#F3F3F3">Order Cofirm Date  </th>
		<td align="left" valign="top" style="padding-left:5px;"><?php echo date('d-m-Y',strtotime($row->order_cofirm_date));?></td>
		<th align="right" valign="top" bgcolor="#F3F3F3">Final Inspection Date  </th>
		<td align="left" valign="top" style="padding-left:5px;"><?php echo date('d-m-Y',strtotime($row->final_inspection_date));?></d>
		<th align="right" valign="top" bgcolor="#F3F3F3">Shipment Date  </th>
		<td align="left" valign="top" style="padding-left:5px;"><?php echo date('d-m-Y',strtotime($row->shipment_date));?></td>
	</tr>
	<tr>
		<th align="right" valign="top" bgcolor="#F3F3F3">Total Quantity </th>
		<td align="left" valign="top" style="padding-left:5px;"><?php echo $row->total_quantity;?></td>
		<th align="right" valign="top" bgcolor="#F3F3F3">Payment Mode </th>
		<td align="left" valign="top" style="padding-left:5px;"><?php echo $this->pd_report_model->get_payment_name($row->payment_mode_id);?></td>
		<th align="right" valign="top" bgcolor="#F3F3F3">Order Number </th>
		<td align="left" valign="top" style="padding-left:5px;"><?php echo $row->order_number;?></td>
	</tr>
	<tr>
		<th align="right" valign="top" bgcolor="#F3F3F3">Yarn Details </th>
		<td align="left" valign="top" style="text-align:justify; padding:5px;"><?php echo $row->yarn_details;?></td>
		<th align="right" valign="top" bgcolor="#F3F3F3">Style Description </th>
		<td align="left" valign="top" style="text-align:justify; padding:5px;"><?php echo $row->style_description;?></td>
		<th align="right" valign="top" bgcolor="#F3F3F3">Shipment Mode </th>
		<td align="left" valign="top" style="padding-left:5px;"><?php echo $this->pd_report_model->get_shipment_name($row->shipment_mode_id);?></td>
	</tr>
	<?php


}

?>
</table>
<?php
$query2= $this->pd_report_model->color_wise_report($article_id);
foreach($query2->result() as $row)
{
	$query1 = $this->pd_report_model->get_size_by_colour($row->article_id,$row->color_id);
?>
<table width="700px;" align="center" border="1" style="border:1px #000000 solid; margin-top:15px; border-collapse:collapse; font-size:11px;">
	<tr style="background-color:#F3F3F3;">
		<th style="background-color:#F3F3F3;" scope="col">Assortment</th>
		<th style="background-color:#F3F3F3;" scope="col">Lot-No</th>
		<th style="background-color:#F3F3F3;" scope="col"></th>
		<th style="background-color:#F3F3F3;" scope="col">Quantity per Lot</th>
		<th style="background-color:#F3F3F3;" scope="col"><?php echo $row->quantity_per_lot; ?></th>
		<th style="background-color:#F3F3F3;" scope="col">Quantity of Lots</th>
		<th style="background-color:#F3F3F3;" scope="col"><?php echo $row->quantity_of_lots; ?></th>
		<th style="background-color:#F3F3F3;" scope="col">Quantity of Items</th>
		<th style="background-color:#F3F3F3;" scope="col"><?php echo $row->quantity_of_items; ?></th>
	</tr>
	<tr>
		<th style="background-color:#F3F3F3;" rowspan="2" scope="row">Colour</th>
		<td style="background-color:#F3F3F3;" colspan="8" align="center">Size / Quantity</td>
	</tr>
	<tr>
		<td colspan="8" rowspan="2"><table width="100%" style=" border:none; font-size:11px;">
				<tr>
					<?php
		$num = $query1->num_rows();
		if($num)
		$pix = round(100/$num);
		else
		$pix = 0;
		foreach($query1->result() as $row1)
		{
			?>
					<th scope="col" style="width:<?php echo $pix; ?>%; border:1px #000000 solid;"><?php echo $this->pd_report_model->get_size_name($row1->size_id); ?></th>
					<?php
		}
				?>
				</tr>
				<tr align="center">
					<?php foreach($query1->result() as $row2)
		{
			?>
					<td style="border:1px #000000 solid;"><?php echo $row2->lots; ?></td>
					<?php
		}
				?>
				</tr>
			</table></td>
	</tr>
	<tr>
		<th style="background-color:#F3F3F3;"  scope="row"><?php echo $this->pd_report_model->get_color_name($row->color_id); ?></th>
	</tr>
</table>
<?php 
}

?>
