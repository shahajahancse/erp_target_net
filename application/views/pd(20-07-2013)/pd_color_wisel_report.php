<table border="1" cellpadding="0" cellspacing="0" align="center">
<th>Article Id</th><th>Order Number</th><th>Buyer Name</th><th>Merchandiser Name</th> <th>Style Description</th><th>Yarn Details</th> <th>Gauge</th> <th>Order Cofirm Date</th> <th>Final Inspection Date </th> <th>Shipment Date</th><th>Total Quantity</th><th>Shipment Mode</th><th>Payment Mode</th>
<?php
foreach($query->result() as $row)
{
	echo "<tr>";
	
	echo "<td>";
	echo $row->article_id;
	echo "</td>";
	
	echo "<td>";
	echo $row->order_number;
	echo "</td>";
	
	echo "<td>";
	echo "&nbsp;";
	echo $this->pd_report_model->get_buyer_name($row->buyer_id);
	echo "</td>";
	
	echo "<td >";
	echo $this->pd_report_model->get_merchandiser_name($row->merchandiser_id);
	echo "</td>";
	
	echo "<td >";
	echo $row->style_description;
	echo "</td>";
	
	echo "<td>";
	echo $row->yarn_details;
	echo "</td>";
	
	echo "<td >";
	echo $this->pd_report_model->get_gauge_name($row->gauge_id);
	echo "</td>";
	
	echo "<td >";
	echo $row->order_cofirm_date;
	echo "</td>";
	
	echo "<td >";
	echo $row->final_inspection_date;
	echo "</td>";
	
	echo "<td >";
	echo $row->shipment_date;
	echo "</td>";
	
	echo "<td >";
	echo $row->total_quantity;
	echo "</td>";
	
	echo "<td >";
	echo $this->pd_report_model->get_shipment_name($row->shipment_mode_id);
	echo "</td>";
	
	echo "<td >";
	echo $this->pd_report_model->get_payment_name($row->payment_mode_id);
	echo "</td>";
	
	
	echo "</tr>";
}

?>

</table>
<?php
foreach($query->result() as $row)
{
	$query1 = $this->pd_report_model->get_size_by_colour($row->article_id,$row->color_id);
?><table width="100%" border="1" style="border:1px #000000 solid; border-collapse:collapse;">
	<tr>
		<th scope="col">Assortment</th>
		<th scope="col">Lot-No:</th>
		<th scope="col"></th>
		<th scope="col">Quantity per Lot:</th>
		<th scope="col"><?php echo $row->quantity_per_lot; ?></th>
		<th scope="col">Quantity of Lots:</th>
		<th scope="col"><?php echo $row->quantity_of_lots; ?></th>
		<th scope="col">Quantity of Items:</th>
		<th scope="col"><?php echo $row->quantity_of_items; ?></th>
	</tr>
	<tr>
		<th rowspan="2" scope="row">Colour</th>
		<td colspan="8" align="center">Size / Quantity</td>
	</tr>
	<tr>
		<td colspan="8" rowspan="2"><table width="100%" border="1" style="border:1px #000000 solid; border-collapse:collapse; border-bottom:none; border-top:none;">
			<tr>
			
		<?php
		$num = $query1->num_rows();
		$pix = round(100/$num);
		foreach($query1->result() as $row1)
		{
			?>
				<th scope="col" style="width:<?php echo $pix; ?>%;"><?php echo $this->pd_report_model->get_size_name($row1->size_id); ?></th>
				<?php
		}
				?>
			</tr>
			<tr align="center">
			<?php foreach($query1->result() as $row2)
		{
			?>
				<td><?php echo $row2->lots; ?></td>
				<?php
		}
				?>
			</tr>
		</table></td>
	</tr>
	<tr>
		<th scope="row"><?php echo $this->pd_report_model->get_color_name($row->color_id); ?></th>
	</tr>
</table>

<?php 
}

?>

