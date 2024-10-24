<?php  
    $emp_id = (isset($values['emp_info']) && is_object($values['emp_info']) && isset($values['emp_info']->emp_id)) ? $values['emp_info']->emp_id : 0;
    $this->db->select('*')->where_in('leave_type',['cl','sl','el'])->where('emp_id', $emp_id)->order_by('start_date','ASC')->group_by('start_date');
    if( $first_date == '' && $second_date == ''){
        $this->db->where('start_date >',date('d/m/Y',strtotime((isset($values['emp_info']) && is_object($values['emp_info']) && isset($values['emp_info']->emp_join_date)) ? $values['emp_info']->emp_join_date : 0)));
    }else if( !$first_date == '' && $second_date == ''){
        $this->db->where('start_date >',date('Y-01-01',strtotime($first_date)))->where('start_date <',date('Y-12-31',strtotime($first_date)));
    }else{
        $this->db->where('start_date >',date('Y-01-01',strtotime($first_date)))->where('start_date <',date('Y-m-d',strtotime($second_date)));
    }
    $take_leaves =$this->db->get('pr_leave_trans')->result();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">

    <style type="text/css">
        .tg {
            border-collapse: collapse;
            border-spacing: 0;
        }
    
        .tg td {
            border-color: black;
            border-style: solid;
            border-width: 1px;
            font-family: Arial, sans-serif;
            font-size: 14px;
            overflow: hidden;
            padding: 10px 5px;
            word-break: normal;
        }
    
        .tg th {
            border-color: black;
            border-style: solid;
            border-width: 1px;
            font-family: Arial, sans-serif;
            font-size: 14px;
            font-weight: normal;
            overflow: hidden;
            padding: 10px 5px;
            word-break: normal;
        }
    
        .tg .tg-8jvv {
            border-color: inherit;
            font-size: 15px;
            text-align: left;
            vertical-align: top
        }
    </style>
</head>
<body>
<div class="container">
        <div class="text-center" style="line-height: 10px;margin-top:20px">
            <p>বাংলাদেশ গেজেট,অতিরিক্ত,সেপ্টেম্বর ১৫,২০১৫</p>
            <p>ফরম-৯</p>
            <p>[ধারা ১০,১১৫,১১৬ ও ১১৭ এবং বিধি ২৪ ও ১০৮(১) দ্রষ্টব্য]</p>
            <p>ছুটির রেজিস্টার ও ছুটির বহি</p>
        </div>
        <?php 
        // dd($values);
        // $unit_id =$this->session->userdata['data']->unit_name;
        // $com_info = $this->db->select('*')->where('unit_id',$unit_id)->get('company_infos')->row();
        
        ?>
        <div class="mt-5" style="line-height: 10px;">
            <p>কারখানা/প্রতিষ্ঠানের নামঃ </p>
            <p>কারখানা/প্রতিষ্ঠানের নাম ঠিকানাঃ ।</p>
            <p>শ্রমিকের নামঃ <?php echo (isset($values['emp_info']) && is_object($values['emp_info'])) ? $values['emp_info']->bangla_nam : ''?> <span style="margin-left: 20px">কার্ড নংঃ <?php echo (isset($values['emp_info']) && is_object($values['emp_info'])) ? $values['emp_info']->emp_id : ''?></span> <span style="margin-left: 20px">পদবীঃ <?php echo (isset($values['emp_info']) && is_object($values['emp_info'])) ? $values['emp_info']->desig_bangla : ''?></span></p>
            <p>শ্রমিক রেজিস্টারের ক্রমিক নংঃ <?php echo $values['emp_info']->id?></p>
            <p>শ্রমিকের শ্রেণী বিভাগঃ<?php echo $values['emp_info']->dept_bangla?> <span style="margin-left: 20px">নিয়োগের তারিখঃ <?php echo date('d/m/Y',strtotime($values['emp_info']->emp_join_date))?></span></p>
        </div>
        <table class="tg">
            <thead>
                <tr>
                    <th class="tg-8jvv text-center" rowspan="2">বৎসরের প্রারম্ভে জমাকৃত বার্ষিক ছুটি</th>
                    <th class="tg-8jvv text-center" colspan="3">কি ধরনের ছুটি চাওয়া হইয়াছে</th>
                    <th class="tg-8jvv text-center" rowspan="2">প্রত্যাখ্যান বা মুলতবি রাখা হইলে প্রত্যাখ্যানের বা মুলতবীর কারণ</th>
                    <th class="tg-8jvv text-center;" rowspan="2">ছুটি <span style="font-family:SutonnyMJ;font-size: 20px;">gÄy‡ii</span> তারিখ</th>
                    <th class="tg-8jvv text-center;" rowspan="2">কত দিন <span style="font-family:SutonnyMJ;font-size: 20px;">gÄy‡ii</span> করা হইল</th>
                    <th class="tg-8jvv text-center" rowspan="2">বার্ষিক ছুটি নগদায়নের সংখ্যা ও অর্থ প্রদানের তারিখ</th>
                    <th class="tg-8jvv text-center" colspan="3">অবশিষ্ট পাওনা ছুটির পরিমাণ</th>
                    <th class="tg-8jvv text-center" rowspan="2">শ্রমিকের স্বাক্ষর</th>
                    <th class="tg-8jvv text-center" rowspan="2">মালিক/ব্যবস্থাপকের স্বাক্ষর</th>
                </tr>
                <tr>
                    <th class="tg-8jvv">বার্ষিক</th>
                    <th class="tg-8jvv">নৈমিত্তিক</th>
                    <th class="tg-8jvv">পীড়া</th>
                    <th class="tg-8jvv">বার্ষিক</th>
                    <th class="tg-8jvv">নৈমিত্তিক</th>
                    <th class="tg-8jvv">পীড়া</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="tg-8jvv text-center">1</td>
                    <td class="tg-8jvv text-center">2</td>
                    <td class="tg-8jvv text-center">3</td>
                    <td class="tg-8jvv text-center">4</td>
                    <td class="tg-8jvv text-center">5</td>
                    <td class="tg-8jvv text-center">6</td>
                    <td class="tg-8jvv text-center">7</td>
                    <td class="tg-8jvv text-center">8</td>
                    <td class="tg-8jvv text-center">9</td>
                    <td class="tg-8jvv text-center">10</td>
                    <td class="tg-8jvv text-center">11</td>
                    <td class="tg-8jvv text-center">12</td>
                    <td class="tg-8jvv text-center">13</td>
                </tr>
				<?php 
					// dd($take_leaves); 
					$separated_data = [];
					foreach ($take_leaves as $object) {
						$year = date('Y', strtotime($object->start_date));
						$separated_data[$year][] = $object;
					}
                    ?>
				<tr>
				<?php $leave_year='';	foreach ($separated_data as $year => $objects) {

                    $total_cl_leave = $values['leave_balance']->lv_cl;
                    $total_sl_leave = $values['leave_balance']->lv_sl;
                    $total_el_leave = '';
                    $total_cl_use =0;
                    $total_sl_use =0;
                    $total_el_use =0;  
					echo "<td colspan='13'>Year: $year</td>";
                ?>
                </tr>

              

				<?php
                    $count = count($objects) - 1;
                    foreach ($objects as $key => $object) {
                ?>
                    <tr>
                        <td class="text-center">
                            <?php 
                                $array = $values['yearly_total_info'];
                                if (isset($array[$year]["P"])) {
                                    $total_el_leave = round($array[$year]["P"]/18);
                                } else {
                                    // Handle the case when the key is undefined
                                    $total_el_leave = 0; // or any other default value
                                }
                            ?>
                        </td>
						<td class="text-center"><?php echo $object->leave_type == 'el' ? "বার্ষিক":""?></td>
						<td class="text-center"><?php echo $object->leave_type == 'cl' ? "নৈমিত্তিক":""?></td>
						<td class="text-center"><?php echo $object->leave_type == 'sl' ? "পীড়া":""?></td>
						<td><?php echo " "?></td>
						<td><?php echo date('d/m/Y', strtotime($object->start_date))?></td>
						<td class="text-center">
							<?php  $date1 = new DateTime($object->leave_start); 
								$date2 = new DateTime($object->leave_end);
								$interval = $date2->diff($date1);
								$interval->d += 1;
								$use =  $interval->format('%d');
								echo $use;
                                 $object->leave_type == 'cl'?($total_cl_use += $use):($object->leave_type == 'sl'?($total_sl_use += $use):($total_el_use += $use) );
                        	?>
						</td>
						<td><?php echo " "?></td>
						<td class="text-center"><?php   echo  $object->leave_type == 'el' ? ($total_el_leave - $total_el_use):'';?></td>
						<td class="text-center"><?php   echo  $object->leave_type == 'cl' ? ($total_cl_leave - $total_cl_use):'';?></td>
						<td class="text-center"><?php   echo  $object->leave_type == 'sl' ? ($total_sl_leave - $total_sl_use):'';?></td>
						<td><img style="height: 38px;" src="<?=base_url('images/'.$values['emp_info']->signature)?>"></td>
						<td><img style="height: 38px;" src="<?=base_url('images/'.$values['emp_info']->register)?>"></td>
					</tr>
                    
					<?php 
                       if($count == $key){ ?>
                            <tr>
                                <td class="text-center">
                                    <!-- < ?php dd($array[$year]["P"]) ?> -->
                                    <?php echo isset($array[$year]) ? round($array[$year]["P"]/18) : ''?>
                                </td>
                                <td><?php echo ""?></td>
                                <td><?php echo ""?></td>
                                <td><?php echo ""?></td>
                                <td><?php echo ""?></td>
                                <td><?php echo ""?></td>
                                <td><?php echo ""?></td>
                                <?php 
                                    @$paid_date = $this->db->select('paid_date')->where('year',$year)->where('emp_id',$object->emp_id)->get('pr_earn_leave_paid')->row()->paid_date;
                                ?>
                                <td style="text-align:center;"><?php echo isset($paid_date)? $paid_date:''?></td>
                                <td><?php echo ""?></td>
                                <td><?php echo ""?></td>
                                <td><?php echo ""?></td>
                                <td><?php echo ""?></td>
                                <td><?php echo ""?></td>
                            </tr>
                    <?php } } }?>
            </tbody>
        </table>
</div>
    
</body>
</html>
<br><br><br>