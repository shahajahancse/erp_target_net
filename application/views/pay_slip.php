<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<title>ProductionPay Slip</title>

</head>
<body>
  <!-- < ?php dd($values);?> -->
<?php
$i = 0;
foreach($values as $row){ $i++;?>	

  <div class='d-flex flex-column' style="width:50%; border:1px solid black;margin-bottom: 15px">
    <div class="col-md-12">
      <div class="text-center">
        <h4>Target Fine Kint Ind Ltd.</h3>
        <p>Pay Slip For The Month Of September 2024</p>
      </div>
      <table style="width:100%">
        <tr>
          <td>নাম</td>
          <td>:</td>
          <td style="white-space: nowrap;"><?php echo $row->bangla_nam?></td>
        </tr>
        <tr>
          <td>কার্ড নং</td>
          <td>:</td>
          <td><?php echo $row->emp_id?></td>
          <td>Block</td>
          <td>:</td>
          <td><?php echo $row->emp_id?></td>
        </tr>
        <tr>
          <td>সেকশন</td>
          <td>:</td>
          <td><?php echo $row->sec_name?></td>
          <td>পদবী</td>
          <td>:</td>
          <td><?php echo $row->desig_name?></td>
        </tr>
        <tr>
          <td>গ্রেড</td>
          <td>:</td>
          <td><?php echo $row->gr_name?></td>
        </tr>
        <tr>
          <td>প্রদেয় মজুরী</td>
          <td>:</td>
          <td><?php echo $row->net_pay?></td>
          <td style="width: 150px;">উৎপাদনের মজুরী</td>
          <td>:</td>
          <td>0</td>
        </tr>
        <tr>
          <td >উৎপাদন বোনাস</td>
          <td>:</td>
          <td>0</td>
          
        </tr>
        <tr>
          <td>হাজিরা বোনাস</td>
          <td>:</td>
          <td>0</td>
        </tr>
        <tr>
          <td>উৎসব বোনাস</td>
          <td>:</td>
          <td>0</td>
          <td>উপস্থিতি</td>
          <td>:</td>
          <td><?php echo $row->att_days?></td>
        </tr>
        <tr>
          <td>ও.টি. ঘণ্টা</td>
          <td>:</td>
          <td>0</td>
          <td>ছুটি</td>
          <td>:</td>
          <td><?php echo $row->holiday_or_weekend?></td>
        </tr>
        <tr>
          <td>ও.টি. টাকা</td>
          <td>:</td>
          <td>0</td>
          <td>অনুপস্থিত</td>
          <td>:</td>
          <td><?php echo $row->absent_days?></td>
        </tr>
        <tr>
          <td>ছুতি/নো-ওয়ার্ক</td>
          <td>:</td>
          <td><?php echo $row->no_work_amount?></td>
          <td style="border-top: 1px solid black;">মোট দিন</td>
          <td style="border-top: 1px solid black;">:</td>
          <td style="border-top: 1px solid black;"><?php echo ($row->att_days+$row->holiday_or_weekend+$row->absent_days)?></td>
        </tr>
        <tr>
          <td style="border-top: 1px solid black;">মোট টাকা</td>
          <td style="border-top: 1px solid black;">:</td>
          <td style="border-top: 1px solid black;">0</td>
        </tr>
        <tr>
          <td>কর্তন</td>
          <td>:</td>
          <td>0</td>
        </tr>
        <tr>
          <td>কর্তন</td>
          <td>:</td>
          <td>0</td>
        </tr>
        <tr>
          <td style='width:150px;border-top: 1px solid black;'>মোট প্রদেয় টাকা</td>
          <td style="border-top: 1px solid black;">:</td>
          <td style="border-top: 1px solid black;"><?php echo $row->net_pay?></td>
        </tr>
      </table>
    </div>
    <p style="border: 1px solid black;text-align:right;">প্রাপক স্বাক্ষর</p>
  </div>


  <?php 
if($i%3 == 0){?>
  <div style="page-break-after: always;"></div>

<?php }


}?>
</body>
</html>