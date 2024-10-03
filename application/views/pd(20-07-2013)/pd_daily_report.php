
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Daily Production Report of <?php echo date('d-M-Y', strtotime($date)); ?></title>
</head>
<body>
<div style="width:982px;">

<div style="text-align:center; margin-bottom:10px;"><?php $this->load->view('head_english');?>
Daily Production Report of <?php echo date('d-M-Y', strtotime($date)); ?>
</div>
<table border="1" cellpadding="0" cellspacing="0" style="font-size:13px; border-collapse:collapse">
  <tr>
    <th width="17" rowspan="4" scope="col"><div align="center"><strong>SL</strong></div></th>
    <th width="17" rowspan="4" scope="col"><div align="center"><strong>BY</strong></div></th>
    <th width="44" rowspan="2" scope="col"><div align="center"><strong>Article</strong></div></th>
    <th width="31" rowspan="4" scope="col"><div align="center"><strong>Color</strong></div></th>
    <th width="37" rowspan="4" scope="col"><div align="center"><strong>Order No</strong></div></th>
    <th width="37" rowspan="4" scope="col"><div align="center"><strong>Order QTY In PCS</strong></div></th>
    <th width="21" rowspan="4" scope="col"><div align="center"><strong>G.G</strong></div></th>
    <th width="29" height="24" scope="col"><div align="center"><strong>Daily</strong></div></th>
    <th width="54" scope="col"><div align="center"><strong>DAILY.W</strong></div></th>
    <th width="60" scope="col"><div align="center"><strong>DAILY</strong></div></th>
    <th width="60" scope="col"><div align="center"><strong>DAILY</strong></div></th>
    <th width="65" scope="col"><div align="center"><strong>DAILY</strong></div></th>
    <th width="60" scope="col"><div align="center"><strong>DAILY</strong></div></th>
    <th width="61" scope="col"><div align="center"><strong>DAILY</strong></div></th>
    <th width="72" scope="col"><div align="center"><strong>DAILY</strong></div></th>
    <th width="60" scope="col"><div align="center"><strong>DAILY</strong></div></th>
    <th width="60" scope="col"><div align="center"><strong>DAILY</strong></div></th>
    <th width="60" scope="col"><div align="center"><strong>DAILY</strong></div></th>
    <th width="60" scope="col"><div align="center"><strong>DAILY</strong></div></th>
    <th width="58" scope="col"><div align="center"><strong>DAILY</strong></div></th>
  </tr>
  <tr>
    <td rowspan="3"><div align="center"><strong>M/C RUN</strong></div></td>
    <td rowspan="3"><div align="center"><strong>30 PROD</strong></div></td>
    <td><div align="center"><strong>TOTAL</strong></div></td>
    <td><div align="center"><strong>TOTAL</strong></div></td>
    <td><div align="center"><strong>TOTAL</strong></div></td>
    <td><div align="center"><strong>TOTAL</strong></div></td>
    <td><div align="center"><strong>TOTAL</strong></div></td>
    <td><div align="center"><strong>TOTAL</strong></div></td>
    <td><div align="center"><strong>TOTAL</strong></div></td>
    <td><div align="center"><strong>TOTAL</strong></div></td>
    <td><div align="center"><strong>TOTAL</strong></div></td>
    <td><div align="center"><strong>TOTAL</strong></div></td>
    <td><div align="center"><strong>TOTAL</strong></div></td>
  </tr>
  <tr>
    <td rowspan="2"><div align="center"><strong>Number</strong></div></td>
    <td><div align="center"><strong>BALANCE</strong></div></td>
    <td><div align="center"><strong>BALANCE</strong></div></td>
    <td><div align="center"><strong>BALANCE</strong></div></td>
    <td><div align="center"><strong>BALANCE</strong></div></td>
    <td><div align="center"><strong>BALANCE</strong></div></td>
    <td><div align="center"><strong>BALANCE</strong></div></td>
    <td><div align="center"><strong>BALANCE</strong></div></td>
    <td><div align="center"><strong>BALANCE</strong></div></td>
    <td><div align="center"><strong>BALANCE</strong></div></td>
    <td><div align="center"><strong>BALANCE</strong></div></td>
    <td><div align="center"><strong>BALANCE</strong></div></td>
  </tr>
  <tr>
    <td><div align="center"><strong>KNITTING</strong></div></td>
    <td><div align="center"><strong>LINKING</strong></div></td>
    <td><div align="center"><strong>TRIMMING</strong></div></td>
    <td><div align="center"><strong>MENDING</strong></div></td>
    <td><div align="center"><strong>WASHING</strong></div></td>
    <td><div align="center"><strong>SEW.LABEL</strong></div></td>
    <td><div align="center"><strong>SEW.HOL</strong></div></td>
    <td><div align="center"><strong>SEW.BUT</strong></div></td>
    <td><div align="center"><strong>IRON</strong></div></td>
    <td><div align="center"><strong>P.Q.C</strong></div></td>
    <td><div align="center"><strong>PACKING</strong></div></td>
  </tr>
  
  <?php
  	$query = $this->db->select('article_id')->where('status','Enable')->get('pd_style_infos');
	
	$i = 1;
	foreach($query->result() as $rows){ ?>
		<?php
			$color_ids = $this->db->select('color_id')->where('article_id', $rows->article_id)->get('pd_color_wise_lots');
			
			foreach($color_ids->result() as $color_rows){?>
            <tr>
                <td> <?php echo $i;?> </td>
                <td> <?php echo $i;?> </td>
                <td> <?php echo $article_id = $rows->article_id;?> </td>
                <td> 
					<?php echo $color_name = $this->db->select('color_name')->where('color_id',$color_rows->color_id)->get('pd_color_infos')->row()->color_name; ?> 
                
                </td>
                <td> 
					<?php echo $order_number = $this->db->select('order_number')->where('article_id',$rows->article_id)->get('pd_style_infos')->row()->order_number; ?> 
                
                </td>
                <td> 
                   <?php echo $quantity_of_items = $this->db->select('quantity_of_items')->where('article_id',$rows->article_id)->where('color_id',$color_rows->color_id)->get('pd_color_wise_lots')->row()->quantity_of_items; ?> 
                
                </td>
                 <td> 
					<?php $gauge_id = $this->db->select('gauge_id')->where('article_id',$rows->article_id)->get('pd_style_infos')->row()->gauge_id; echo $gauge_name = $this->db->select('gauge_name')->where('gauge_id',$gauge_id)->get('pd_gauge_infos')->row()->gauge_name; ?> 
                
                </td>
                <td>&nbsp;</td>
                 <td>&nbsp;</td>
                 <td style="text-align:center">
                 <!-- 1 For Knitting Section-->
		<div style="border-bottom:1px solid; padding:2px;"><?php echo $this->pd_report_model->daily_total_quantity($date,$article_id,1) ?></div>
        <div style="border-bottom:1px solid; padding:2px;"><?php  echo  $kniting_total = $this->pd_report_model->section_total_quantity($article_id,1); ?></div>
        <?php  echo  $kniting_balance = $quantity_of_items - $kniting_total; ?>
                 </td>
                 <td style="text-align:center">
                 <!-- 2 For Linking Section-->
				<div style="border-bottom:1px solid; padding:2px;"> <?php echo $this->pd_report_model->daily_total_quantity($date,$article_id,2) ?></div>
                <div style="border-bottom:1px solid; padding:2px;"><?php  echo  $linking_total = $this->pd_report_model->section_total_quantity($article_id,2); ?></div>
        <?php  echo  $linking_balance = $quantity_of_items - $linking_total; ?>
                 </td>
                 <td style="text-align:center">
                 <!-- 3 For Trimming Section-->
				 <div style="border-bottom:1px solid; padding:2px;"> <?php echo $this->pd_report_model->daily_total_quantity($date,$article_id,3) ?></div>
                <div style="border-bottom:1px solid; padding:2px;"><?php  echo  $trimming_total = $this->pd_report_model->section_total_quantity($article_id,3); ?></div>
        <?php  echo  $trimming_balance = $quantity_of_items - $trimming_total; ?>
                 </td>
                 <td style="text-align:center">
                 <!-- 4 For mending Section-->
				 <div style="border-bottom:1px solid; padding:2px;"> <?php echo $this->pd_report_model->daily_total_quantity($date,$article_id,4) ?></div>
                <div style="border-bottom:1px solid; padding:2px;"><?php  echo  $mending_total = $this->pd_report_model->section_total_quantity($article_id,4); ?></div>
        <?php  echo  $mending_balance = $quantity_of_items - $mending_total; ?>
                 </td>
                 <td style="text-align:center">
                 <!-- 5 For Washing Section-->
				 <div style="border-bottom:1px solid; padding:2px;"> <?php echo $this->pd_report_model->daily_total_quantity($date,$article_id,5) ?></div>
                <div style="border-bottom:1px solid; padding:2px;"><?php  echo  $washing_total = $this->pd_report_model->section_total_quantity($article_id,5); ?></div>
        <?php  echo  $washing_balance = $quantity_of_items - $washing_total; ?>
                 </td>
                 <td style="text-align:center">
                 <!-- 6 For Sew.Lable Section-->
				 <div style="border-bottom:1px solid; padding:2px;"><?php echo $this->pd_report_model->daily_total_quantity($date,$article_id,6) ?></div>
                <div style="border-bottom:1px solid; padding:2px;"><?php  echo  $sewlable_total = $this->pd_report_model->section_total_quantity($article_id,6); ?></div>
        <?php  echo  $sewlable_balance = $quantity_of_items - $sewlable_total; ?>
                 </td>
                 
                   <td style="text-align:center">
                 <!-- 7 For Sew.Hole Section-->
				<div style="border-bottom:1px solid; padding:2px;"> <?php echo $this->pd_report_model->daily_total_quantity($date,$article_id,7) ?></div>
                <div style="border-bottom:1px solid; padding:2px;"><?php  echo  $sewhole_balance = $this->pd_report_model->section_total_quantity($article_id,7); ?></div>
        <?php  echo  $sewhole_balance = $quantity_of_items - $sewhole_balance; ?>
                 </td>
                 <td style="text-align:center">
                 <!--8 For Sew.But Section-->
				 <div style="border-bottom:1px solid; padding:2px;"> <?php echo $this->pd_report_model->daily_total_quantity($date,$article_id,8) ?></div>
                <div style="border-bottom:1px solid; padding:2px;"><?php  echo  $sewbut_total = $this->pd_report_model->section_total_quantity($article_id,8); ?></div>
        <?php  echo  $sewbut_balance = $quantity_of_items - $sewbut_total; ?>
                 </td>
                 <td style="text-align:center">
                 <!-- 9 For Iron Section-->
				 <div style="border-bottom:1px solid; padding:2px;"> <?php echo $this->pd_report_model->daily_total_quantity($date,$article_id,9) ?></div>
                <div style="border-bottom:1px solid; padding:2px;"><?php  echo  $iron_total = $this->pd_report_model->section_total_quantity($article_id,9); ?></div>
        <?php  echo  $iron_balance = $quantity_of_items - $iron_total; ?>
                 </td>
                 <td style="text-align:center">
                 <!-- 10 For P.Q.C Section-->
				 <div style="border-bottom:1px solid; padding:2px;"> <?php echo $this->pd_report_model->daily_total_quantity($date,$article_id,10) ?></div>
                <div style="border-bottom:1px solid; padding:2px;"><?php  echo  $pqc_total = $this->pd_report_model->section_total_quantity($article_id,10); ?></div>
        <?php  echo  $pqc_balance = $quantity_of_items - $pqc_total; ?>
                 </td>
                 <td style="text-align:center">
                 <!-- 11 For Packing Section-->
				 <div style="border-bottom:1px solid; padding:2px;"> <?php echo $this->pd_report_model->daily_total_quantity($date,$article_id,11) ?></div>
                <div style="border-bottom:1px solid; padding:2px;"><?php  echo  $packing_total = $this->pd_report_model->section_total_quantity($article_id,11); ?></div>
        <?php  echo  $packing_balance = $quantity_of_items - $packing_total; ?>
                 </td>
        	</tr>
            	
            <?php $i++; } ?>
        
        
	<?php  } ?>
</table>
</div>
</body>
</html>