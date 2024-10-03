<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Salary Sheet For The Month of
<?php 
$sal_year  = date('Y',strtotime($salary_month));
$sal_month = date('m',strtotime($salary_month));
$day=date('d',strtotime($salary_month));
$date_format = date("F-Y", mktime(0, 0, 0, $sal_month, $day, $sal_year));
echo $date_format;

?>
</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/print.css" media="print" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/SingleRow.css" />
</head>

<body>
<?php 
$k = 0;
$allocatedrow=7;
$fixedrow=7;
$printheader=1;
$printfooter=1;
$printfooter1=0;
$total_array = array();
$ttotal_array = array();
$gttotal_array = array();
$i=0;
if($query->num_rows() == 0)
{
	echo "No Data Found";
}
else
{
$styles = $this->pd_report_model->get_monthly_style($salary_month, $grid_data, $grid_pd_process);

		foreach($query->result() as $row)
		{
			$allocatedrow--;
	  $i++;
	if($allocatedrow<1)
	{
		$allocatedrow=$fixedrow;
		$printheader=1;
		$printfooter=1;
	}
	if($printheader==1)
	{
		if($printfooter1==1)
		{
	  ?><tr height="20px">
				  <td width="15" height="20px"><div align="center"><strong></strong></div></td>
				  <td width="14" height="20px"><div align="center"><strong></strong></div></td>
				  <td width="30" height="20px"><div align="center"><strong></strong></div></td>
				  <td width="14" height="20px"><div align="center"><strong></strong></div></td>
				  <td width="14" height="20px"><div align="center"><strong>Total : </strong></div></td>
				  <?php foreach($styles->result() as $style_row)
				  {
					 $sizes = $this->pd_report_model->get_monthly_style_size($salary_month, $grid_data, $style_row->article_id_pk, $grid_pd_process);
					  $size_counted = $sizes->num_rows();
					  $width = number_format(100/$size_counted);
					  ?>
					  
				  <?php foreach($sizes->result() as $sizes_row)
				  {
					  $index = $style_row->article_id_pk.$sizes_row->section_id.$sizes_row->process_id.$sizes_row->size_id;
								
					  ?>
					  
				  <td width="<?php echo $width; ?>"><div align="center"><strong><?php echo $total_array[$index]; ?></strong></div></td>
					  <?php } ?>
					  <td><div align="center"><strong><?php echo $ttotal_array[$style_row->article_id_pk]; ?></strong></div></td>
					  <?php } ?>
				  
				   <td><div align="center"><strong><?php echo $gttotal_array[1]; ?></strong></div></td>
				</tr>
                
                </table>
				<table width="100%" height="80px" border="0" align="center" style="margin-bottom:85px; font-family:Arial, Helvetica, sans-serif;">
				  <tr height="80%" >
					<td colspan="28"></td>
				  </tr>
				  <tr height="20%">
					<td  align="center">Prepared By</td>
					<td align="center">Checked BY</td>
					<td  align="center">Chief Accounts</td>
					<td  align="center">General Manager</td>
					<td  align="center">Director</td>
					<td  align="center">Director</td>
				  </tr>
				</table>
			 <?php
	  $printfooter=0;
		}
		$printfooter1 = 1
			?></table>
			  <table align="center" height="auto"  class="sal" border="1" cellspacing="0" cellpadding="0" style="font-size:12px; width:auto; border-collapse:collapse;">
				<tr height="85px">
				  <td colspan="70" align="center"><div style="text-align:left; position:relative; padding-left:10px; font-weight:bold; font-size:14px; float:left;">
					  <?php 
			$date = date('d-m-Y');
			//echo "Payment Date : $date"; 
			
			$section_name = $this->common_model->get_section_name($section);
			echo "Section : $section_name<br>";
			if($floor != "Select")
			{
				$floor_name = $this->db->where("posi_id",$floor)->get('pr_emp_position')->row()->posi_name;
				echo "Floor : $floor_name <br>";
			}
			if($block != "Select")
			{
				$block_name = $this->db->where("line_id",$block)->get('pr_line_num')->row()->line_name;
				echo "Block : $block_name <br>";
			}
			echo "Process Nme: ".$process_name = $this->pd_report_model->get_process_name($grid_pd_process);
			?>
					</div>
					<?php $this->load->view("head_english"); ?>
					Salary Sheet For The Month of
					<?php 
			
			$sal_year  = date('Y',strtotime($salary_month));
			$sal_month = date('m',strtotime($salary_month));
			$day=date('d',strtotime($salary_month));
			$date_format = date("F-Y", mktime(0, 0, 0, $sal_month, $day, $sal_year));
			echo $date_format;
			
			?></td></tr>
             
				<tr height="20px">
				  <td rowspan="2" width="15" height="20px"><div align="center"><strong>SI. No</strong></div></td>
				  <td rowspan="2" width="14" height="20px"><div align="center"><strong>Card No</strong></div></td>
				  <td rowspan="2" width="30" height="20px"><div align="center"><strong>Name of Employee</strong></div></td>
				  <td rowspan="2" width="14" height="20px"><div align="center"><strong>Total W.Days</strong></div></td>
				  <td rowspan="2" width="14" height="20px"><div align="center"><strong>Total P.Days</strong></div></td>
				  <?php foreach($styles->result() as $style_row)
				  {
					  $size_counted = $this->pd_report_model->get_monthly_style_size($salary_month, $grid_data, $style_row->article_id_pk, $grid_pd_process);
					  $size_counted = $size_counted->num_rows();
					  ?>
					  
				  <td colspan="<?php echo $size_counted; ?>" width="100"><div align="center"><strong><?php echo $style_row->style_id; ?></strong></div></td>
				  
					  <td rowspan="2">Total Amount</td>
					  <?php
					  $index = $style_row->article_id_pk;
					$ttotal_array[$index] = 0; } 
					$gttotal_array[1] = 0;?>
				  
				   <td rowspan="2">Grand Total Amount</td>
				</tr>
				<tr>
				 <?php foreach($styles->result() as $style_row)
				  {
					  $sizes = $this->pd_report_model->get_monthly_style_size($salary_month, $grid_data, $style_row->article_id_pk,$grid_pd_process);
					  $size_counted = $sizes->num_rows();
					  $width = number_format(100/$size_counted);
					  ?>
					  
				  <?php foreach($sizes->result() as $sizes_row)
				  {
					  $index = $style_row->article_id_pk.$sizes_row->section_id.$sizes_row->process_id.$sizes_row->size_id;
								$total_array[$index] = 0;
					  ?>
					  
				  <td width="<?php echo $width; ?>"><div align="center"><strong><?php echo $sizes_row->size_name; ?></strong></div></td>
					  <?php }
					   ?>
					  <?php } ?>
				</tr>
                <?php
  $printheader=0;
	}
	?> 
				<?php
				
			echo "<tr height='70' style='text-align:center;' >";
			echo "<td >";
			echo ++$k;
			echo "</td>";
					
			echo "<td>";
			echo $row->emp_id;
			echo "</td>";
			
			echo "<td>";
			echo $row->emp_full_name;
			echo "</td>";
			
			echo "<td>";
			echo $this->pd_report_model->get_pd_working_day($row->emp_id,$salary_month);
			echo "</td>";
			
			echo "<td>";
			echo $this->pd_report_model->get_pd_p_day($row->emp_id,$salary_month);
			echo "</td>"; 
			$grand_total_amount = 0;
			foreach($styles->result() as $style_row)
			{
				  $sizes = $this->pd_report_model->get_monthly_style_size($salary_month, $grid_data, $style_row->article_id_pk, $grid_pd_process);
				  $t_amount = 0;
				  foreach($sizes->result() as $sizes_row)
				  {	
				  		$query_size = $this->pd_report_model->get_monthly_style_size_amount($salary_month, $row->emp_id,$style_row->article_id_pk,$sizes_row->section_id,$sizes_row->process_id, $sizes_row->size_id);		  		
						if($query_size->num_rows() > 0)
						{
							$qt_row = $query_size->row();
							//foreach($query_size->result() as $qt_row)
							//{
								$unit_price 	= $this->emp_wise_entry_model->get_price($style_row->article_id_pk,$sizes_row->section_id,$sizes_row->process_id, $sizes_row->size_id);
								$amount 		= round(($unit_price*$qt_row->qt),2);								
								$process_name		= $this->pd_report_model->get_process_name($sizes_row->process_id);
								echo "<td><div align='center'>$qt_row->qt</div></td>";
								$index = $style_row->article_id_pk.$sizes_row->section_id.$sizes_row->process_id.$sizes_row->size_id;
								$total_array[$index] = $total_array[$index] + $qt_row->qt;
								$t_amount = $t_amount + $amount;
							//}
						}
						else
						{
								echo "<td><div align='center'>0</div></td>";
						}
				 } 
				 echo "<td><div align='center'>$t_amount</div></td>";
				 $index = $style_row->article_id_pk;
					$ttotal_array[$index] = $ttotal_array[$index] + $t_amount;
				 $grand_total_amount = $grand_total_amount + $t_amount;
          	} 
			$gttotal_array[1] = $gttotal_array[1] + $grand_total_amount;
			echo "<td>";
			echo $grand_total_amount;
			echo "</td>"; 
					
			echo "</tr>";
	  
}
  ?>

<?php 
}
	  ?>
				<tr height="20px">
				  <td width="15" height="20px"><div align="center"><strong></strong></div></td>
				  <td width="14" height="20px"><div align="center"><strong></strong></div></td>
				  <td width="30" height="20px"><div align="center"><strong></strong></div></td>
				  <td width="14" height="20px"><div align="center"><strong></strong></div></td>
				  <td width="14" height="20px"><div align="center"><strong>Total : </strong></div></td>
				  <?php foreach($styles->result() as $style_row)
				  {
					 $sizes = $this->pd_report_model->get_monthly_style_size($salary_month, $grid_data, $style_row->article_id_pk,$grid_pd_process);
					  $size_counted = $sizes->num_rows();
					  $width = number_format(100/$size_counted);
					  ?>
					  
				  <?php foreach($sizes->result() as $sizes_row)
				  {
					  $index = $style_row->article_id_pk.$sizes_row->section_id.$sizes_row->process_id.$sizes_row->size_id;
								
					  ?>
					  
				  <td width="<?php echo $width; ?>"><div align="center"><strong><?php echo $total_array[$index]; ?></strong></div></td>
					  <?php } ?>
					  <td><div align="center"><strong><?php echo $ttotal_array[$style_row->article_id_pk]; ?></strong></div></td>
					  <?php } ?>
				  
				   <td><div align="center"><strong><?php echo $gttotal_array[1]; ?></strong></div></td>
				</tr>
                
                </table>
				<table width="100%" height="80px" border="0" align="center" style="margin-bottom:85px; font-family:Arial, Helvetica, sans-serif;">
				  <tr height="80%" >
					<td colspan="28"></td>
				  </tr>
				  <tr height="20%">
					<td  align="center">Prepared By</td>
					<td align="center">Checked BY</td>
					<td  align="center">Chief Accounts</td>
					<td  align="center">General Manager</td>
					<td  align="center">Director</td>
					<td  align="center">Director</td>
				  </tr>
				</table>

</body>
</html>