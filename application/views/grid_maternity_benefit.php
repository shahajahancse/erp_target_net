
<?php  
    function english_to_bangla_date_convert($date) {
        $date = date("d/m/Y",strtotime($date));

        $search_array= array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0", "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December", ":", ",","/"); 

        $replace_array= array("১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০", "জানুয়ারী", "ফেব্রুয়ারী", "মার্চ", "এপ্রিল", "মে", "জুন", "জুলাই", "আগষ্ট", "সেপ্টেম্বার", "অক্টোবার", "নভেম্বার", "ডিসেম্বর", ":", ",","/");

        return str_replace($search_array, $replace_array, $date);
    } 
?>

<?php
class BanglaNumberToWord{
    var $eng_to_bn = array('1'=>'১', '2'=>'২', '3'=>'৩', '4'=>'৪', '5'=>'৫','6'=>'৬', '7'=>'৭', '8'=>'৮', '9'=>'৯', '0'=>'০');
    var $num_to_bd = array('1'=>'GK','2'=>'`yB','3'=>'wZb','4'=>'Pvi','5'=>'cvuP','6'=>'Qq','7'=>'mvZ','8'=>'AvU', '9'=>'bq','10'=>'`k','11'=>'GMvi','12'=>'evi','13'=>'‡Zi','14'=>'‡PŠÏ','15'=>'c‡bi','16'=>'‡lvj','17'=>'m‡Zi','18'=>'AvVvi','19'=>'Ewbk','20'=>'wek','21'=>'GKyk','22'=>'evBk','23'=>'‡ZBk','24'=>'PweŸk','25'=>'cuwPk','26'=>'QvweŸk','27'=>'mvZvk','28'=>'AvVvk','29'=>'EbwÎk','30'=>'wÎk','31'=>'GKwÎk','32'=>'ewÎk','33'=>'‡ZwÎk','34'=>'‡PŠwÎk','35'=>'cuqwÎk','36'=>'QwÎk','37'=>'mvuBwÎk','38'=>'AvUwÎk','39'=>'EbPwjøk','40'=>'Pwjøk','41'=>'GKPwjøk','42'=>'weqvwjøk','43'=>'‡ZZvwjøk','44'=>'Pyqvwjøk','45'=>'cuqZvwjøk','46'=>'‡QPwjøk','47'=>'mvZPwjøk','48'=>'AvUPwjøk','49'=>'EbcÂvk','50'=>'cÂvk','51'=>'GKvbœ','52'=>'evqvbœ','53'=>'wZàvbœ','54'=>'Pyqvbœ','55'=>'cÂvbœ','56'=>'Qvàvbœ','57'=>'mvZvbœ','58'=>'AvUvbœ','59'=>'EblvU','60'=>'lvU','61'=>'GKlwÆ','62'=>'evlwÆ','63'=>'‡ZlwÆ','64'=>'‡PŠlwÆ','65'=>'cuqlwÆ','66'=>'‡QlwÆ','67'=>'mvZlwÆ','68'=>'AvUlwÆ','69'=>'EbmËi','70'=>'mËi','71'=>'GKvËi','72'=>'evnvËi','73'=>'wZqvËi','74'=>'PyqvËi','75'=>'cuPvËi','76'=>'wQqvËi','77'=>'mvZvËi','78'=>'AvUvËi','79'=>'EbAvwk','80'=>'Avwk','81'=>'GKvwk','82'=>'weivwk','83'=>'wZivwk','84'=>'Pyivwk','85'=>'cuPvwk','86'=>'wQqvwk','87'=>'mvZvwk','88'=>'AvUvwk','89'=>'EbbeŸB','90'=>'beŸB','91'=>'GKvbeŸB','92'=>'weivbeŸB','93'=>'wZivbeŸB','94'=>'PyivbeŸB','95'=>'cuPvbeŸB','96'=>'wQqvbeŸB','97'=>'mvZvbeŸB','98'=>'AvUvbeŸB','99'=>'wbivbeŸB');
    var $num_to_bn_decimal = array('0'=>'k~b¨ ','1'=>'GK ','2'=>'`yB ','3'=>'wZb ','4'=>'Pvi ','5'=>'cvuP ','6'=>'Qq ','7'=>'mvZ ','8'=>'AvU ', '9'=>'bq ');
    var $hundred = 'kZ';
    var $thousand = 'nvRvi';
    var $lakh = 'j¶';
    var $crore = '‡KvwU';

    public function engToBn($number){
        $bn_number = strtr($number,$this->eng_to_bn);
        return $bn_number;
    }

    public function numToWord($number){
        if (!is_numeric($number) ) return 'bv¤^vi bv';

        if(is_float($number)){
            $dot = explode(".", $number);
            return $this->numberSelector($dot[0]);
        }else{
            return $this->numberSelector($number);
        }

    }
    public function numToBn($number){
        $word = strtr($number,$this->num_to_bd);
        return $word;
    }
    public function numToBnDecimal($number){
        $word = strtr($number,$this->num_to_bn_decimal);
        return $word;
    }

    public function numberSelector($number){
        if($number > 9999999){
            return $this->crore($number);
        }elseif($number > 99999){
            return $this->lakh($number);
        }elseif($number > 999){
            return $this->thousand($number);
        }elseif($number > 99){
            return $this->hundred($number);
        }else{
            return $this->underHundred($number);
        }
    }

    public function underHundred($number){
        $number = ($number == 0)?'': $this->numToBn($number);
        return $number;
    }

    public function hundred($number){
        $a = (int)($number/100);
        $b = $number%100;
        $hundred = ($a == 0)?'': $this->numToBn($a).' '.$this->hundred;
        return $hundred.' '.$this->underHundred($b);
    }

    public function thousand($number){
        $a = (int)($number/1000);
        $b = $number%1000;
        $thousand = ($a == 0)?'': $this->numToBn($a).' '.$this->thousand;
        return $thousand.' '.$this->hundred($b);
    }

    public function lakh($number){
        $a = (int)($number/100000);
        $b = $number%100000;
        $lakh = ($a == 0)?'': $this->numToBn($a).' '.$this->lakh;
        return $lakh.' '.$this->thousand($b);
    }

    public function crore($number){
        $a = (int)($number/10000000);
        $b = $number%10000000;
        $more_than_core = ($a>99)?$this->lakh($a):$this->numToBn($a);
        return $more_than_core.' '.$this->crore.' '.$this->lakh($b);
    }
}

$obj = new BanglaNumberToWord();

?>

<?php  
    function jod_duration_cal($first_date, $second_date) {
        $diff = date_diff(date_create($second_date), date_create($first_date));
        return $diff->format("%y eQi %m gvm %d w`b");
    } 
?>

</html>
<!-- < ?php dd($values)?> -->
<!doctype html>
<html lang="en">

<head>
    <title>Increment Letter</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: SutonnyMJ;
            font-size: 20px;
        }

        .table-bordered td,
        .table-bordered th {
            border: 1px solid #000000;
            padding: 2px;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php
		if(empty($values))
		{
			echo '<span style="font-family: Arial, Helvetica, sans-serif;">Requested list is empty</span>';
			exit();
		}
		foreach($values as $row){ 
            
            
            
            ?>
		   

        <div class="mt-3">
            <!-- <?php  //$com_info = $this->db->where('unit_id', $unit_id)->get('company_infos')->row(); ?>
            <div class="d-flex">
                <img src="<?php //echo base_url('/images/AJ_Logo_copy4.png')?>" alt="Logo" style="width: 60px;height: 50px;position: absolute;">
                
            </div> -->
        </div>
        <div class="col-md-12" style="border-bottom: 1px solid black!important;">
        </div>
            <div class="d-flex flex-row justify-content-between" style="margin-top:15px;">
                <p style="font-family: Arial, Helvetica, sans-serif;">তারিখ: <?= english_to_bangla_date_convert($row->first_pay)?></p>
                <p style="font-family: Arial, Helvetica, sans-serif;">মাতৃত্বকালীন সুবিধা প্রদানের হিসাব</p>
                <p style="font-family: Arial, Helvetica, sans-serif;">প্রথম কিস্তি</p>
            </div>
            <div style="width:1000px; margin:0 auto; overflow:hidden; font-family: Arial, Helvetica, sans-serif; font-size:12px; clear: both;">
               <div style="width:50%;font-size:16px;">
                    <table width="700" border="0" cellpadding="0" cellspacing="0" style="font-size:16px;">
                        <tr>
                            <td width="310">নাম</td>
                            <td width="164">:</td>
                            <td width="226"><?php echo $row->name_bn; ?></td>
                        </tr>
                        <tr>
                            <td>কার্ড নম্বর</td>
                            <td>:</td>
                            <td style='font-size:19px'><b><?php echo $row->emp_id;?></b></td>
                        </tr>
                        <tr>
                            <td>পদবী</td>
                            <td>:</td>
                            <td style='font-size:19px'><?php echo $designation = $row->desig_bangla;?></td>
                        </tr>
                        <tr>
                            <td>সেকশন/লাইন</td>
                            <td>:</td>
                            <td style='font-size:19px'><?php echo $gr_name = $row->line_name_bn;?></td>
                        </tr>
                        <tr>
                            <td>যোগদানের তারিখ</td>
                            <td>:</td>
                            <td style='font-size:19px'><?php echo date('d/m/Y',strtotime($row->emp_join_date)); ?></td>
                        </tr>
                        <tr>
                            <td>মোট চাকুরীর বয়স</td>
                            <td>:</td>
                            <td style='font-size:19px'><?php echo jod_duration_cal($row->emp_join_date, $row->first_pay) ?></td>
                        </tr>
                        <tr>
                            <td>প্রসব পূর্ববর্তী নোটিশ এর তারিখ</td>
                            <td>:</td>
                            <td style='font-size:19px'><?php echo date('d/m/Y',strtotime($row->inform_date)); ?></td>
                        </tr>
                        <tr>
                            <td>সম্ভাব্য প্রসবের তারিখ</td>
                            <td>:</td>
                            <td style='font-size:19px'><?php echo date('d/m/Y',strtotime($row->probability)); ?></td>
                        </tr>
                        <tr>
                            <td>মাতৃত্বকালীন ছুটির সময়</td>
                            <td>:</td>
                            <td style='font-size:19px;white-space:nowrap'><?php echo date('d/m/Y',strtotime($row->start_date)) .' ‡_‡K '. date('d/m/Y',strtotime($row->end_date)) .' w`b'; ?></td>
                        </tr>
                        <tr>
                            <td>ছুটির পরে সম্ভাব্য যোগদানের তারিখ</td>
                            <td>:</td>
                            <td style='font-size:19px;white-space:nowrap'><?php echo date('d/m/Y', strtotime($row->end_date .' +1 day')); ?></td>
                        </tr>
                    </table>
               </div>
                <br><br>
            </div>
            
            
            <div style="font-size:16px; font-family: Arial, Helvetica, sans-serif; clear: both; padding:0px 10px;">
                <h4 style="font-family:SutonnyMJ;"> <?= '<span style="font-size:18px">'.$row->name_bn.'</span>' ?> Gi gvZ…Z¡Kvjxb myweavi wnmvewU wbgœiƒc:-</h4>
                <table style="width: 100%; padding:0px 10px; font-size:16px;" border="1" cellpadding="0" cellspacing="0">
                    <thead>
                        <tr style="font-family:SutonnyMJ; font-size:19px; text-align:center">
                            <th style="padding:5px">gvm</th>
                            <th style="padding:5px">UvKv cwi‡kv‡ai we¯ÍvwiZ</th>
                            <th style="padding:5px">‡gvU †eZb/gRyix</th>
                            <th style="padding:5px">nvwRiv †evbvm</th>
                            <th style="padding:5px">gv‡mi †gvU Avq</th>
                            <th style="padding:5px">Drme †evbvm</th>
                            <th style="padding:5px">Ab¨vb¨</th>
                            <th style="padding:5px">me©‡kl gv‡m cÖvß †gvU</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr style="font-size:16px; text-align:center;font-family:SutonnyMJ;font-size:19px">
                            <td style="padding:5px; width:15%;font-family:arial"> 
                            <?php echo $a =  date('F Y', strtotime($row->start_date .' -1 month -1 day')); ?> 
                            </td>
                            <td><span>‡eZb</span></td>
                            <td><?= $row->prev_month_salary ?></td>
                            <td><?= $row->attn_bonus ?></td>
                            <td><?= $row->attn_bonus + $row->prev_month_salary ?></td>
                            <td><?= $row->festival_bonus ?></td>
                            <td><?= $row->ather_benifit ?></td>
                            <td><?= ($row->ather_benifit+$row->festival_bonus+$row->attn_bonus+$row->prev_month_salary) ?></td>
                        </tr>
                        <tr style="text-align:center;font-family:SutonnyMJ">
                            <td colspan="2" style="font-size:19px" ><span>‡gvU</span></td>
                            <td style="padding:5px; font-size:19px" ><?= $row->prev_month_salary ?></td>
                            <td style="padding:5px; font-size:19px" ><?= $row->attn_bonus ?></td>
                            <td style="padding:5px; font-size:19px" ><?= $row->attn_bonus + $row->prev_month_salary ?></td>
                            <td style="padding:5px; font-size:19px" ><?= $row->festival_bonus ?></td>
                            <td style="padding:5px; font-size:19px" ><?= $row->ather_benifit ?></td>
                            <td style="padding:5px; font-size:19px"><?= ($row->ather_benifit+$row->festival_bonus+$row->attn_bonus+$row->prev_month_salary) ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div style="font-size:16px; font-family: Arial, Helvetica, sans-serif; clear: both; padding:20px 10px;">
                <table style="width: 100%; padding:0px 10px; font-size:16px;" border="1" cellpadding="0" cellspacing="0">
                    <thead>
                        <?php $total = $row->ather_benifit+$row->festival_bonus+$row->attn_bonus+$row->prev_month_salary; ?>
                        <tr style="font-family:SutonnyMJ; font-size:19px; text-align:center">
                            <th style="padding:5px">weeiY</th>
                            <th style="padding:5px">UvKv</th>
                            <th style="padding:5px">cÖ_g wKw¯Íi myweav</th>
                            <th style="padding:5px"><?= round((($total / $row->pay_day) * $row->total_day), 2) ?></th>
                        </tr>
                        <tr style="font-family:SutonnyMJ; font-size:19px; text-align:center">
                            <td style="padding:5px">c«wZw`‡bi Mo ‡eZb (‡gvU ‡eZb <?= $total ?> <span style="font-size: 12px;" >➗</span> <?= $row->pay_day ?> w`b)</td>
                            <td style="padding:5px"><?= round($total / $row->pay_day, 2) ?></td>
                            <td style="padding:5px">ivR¯ KZ©b</td>
                            <td style="padding:5px">10</td>
                        </tr>
                        <tr style="font-family:SutonnyMJ; font-size:19px; text-align:center">
                            <td style="padding:5px">‡gvU c«‡`q UvKvi cwigvY ( c«wZw`‡bi Mo ‡eZb <?= round($total / $row->pay_day, 2) ?> &#10005; <?= $row->total_day * 2 ?> w`b) </td>
                            <td style="padding:5px"><?= round((($total / $row->pay_day) * ($row->total_day * 2)), 2) ?></td>
                            <td style="padding:5px">‡gvU UvKv </td>
                            <td style="padding:5px"><?= round((($total / $row->pay_day) * $row->total_day), 2) - 10 ?></td>
                        </tr>
                        <tr style="font-family:SutonnyMJ; font-size:19px; text-align:center">
                            <td style="padding:5px">cÖ_g wKw¯Í ( c«wZw`‡bi Mo ‡eZb <?= round($total / $row->pay_day, 2) ?> &#10005; <?= $row->total_day ?> w`b) </td>
                            <td style="padding:5px"><?= round((($total / $row->pay_day) * $row->total_day), 2) ?></td>
                        </tr>
                    </thead>
                </table>
            </div>

            <div style="font-size:16px; font-family: Arial, Helvetica, sans-serif; clear: both; padding:20px 10px;">
                <div style="width: 50%; font-family:; font-family:SutonnyMJ">
                    <p style="font-size:19px"><span>cÖvß UvKv </span> : <?= round((($total / $row->pay_day) * $row->total_day), 2) ?>  UvKv </p>
                    <?php $totall = round((($total / $row->pay_day) * $row->total_day), 2); ?>
                    <p style="font-size:19px"><span>K_vq </span> : <?=  $obj->numToWord($totall) ?>  UvKv </p>
                </div>
                <div style="width: 50%; font-family:SutonnyMJ;"></div>
            </div>
            
        <?php } ?>

    </div>
</body>

</html>
<br><br><br>
<?php exit(); ?>