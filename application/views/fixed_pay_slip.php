<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<title>Fixed Pay Slip</title>

</head>
<body>
  <!-- < ?php dd($values);?> -->
<?php
$i = 0;
foreach($values as $row){ $i++;?>	

  <div class='d-flex flex-column' style="width:100%; border:1px solid black;margin-bottom: 15px">
    <div class="col-md-12">
      <div class="text-center">
        <h4>Target Fine Kint Ind Ltd.</h3>
        <p>Bashati, Khamargao, Nandail, Mymensingh.</p>
      </div>
      <table></table>
      
      <table style="width:100%" border="0" collapse="collapse">
        <tr>
          <td>কার্ড নং</td>
          <td>:</td>
          <td><?php echo $row->emp_id?></td>
          <td>মাস</td>
          <td>:</td>
          <td style="white-space: nowrap;"><?php echo date('F',strtotime($row->salary_month))?></td>
        </tr>
        <tr>
          <td>শ্রমিকের নাম</td>
          <td>:</td>
          <td><?php echo $row->bangla_nam?></td>

          <td></td>
          <td>:</td>
          <td style="white-space: nowrap;"><?php echo date('Y',strtotime($row->salary_month))?></td>

        </tr>
        <tr>
          <td>সেকশন</td>
          <td>:</td>
          <td><?php echo $row->sec_name?></td>
          <td>পদবী</td>
          <td>:</td>
          <td style="white-space: nowrap;"><?php echo $row->desig_name?></td>
        </tr>
        <tr>
          <td>যোগদানের তারিখ</td>
          <td>:</td>
          <td><?php echo $row->emp_join_date?></td>
          <td>গ্রেড</td>
          <td>:</td>
          <td><?php echo $row->gr_name?></td>
        </tr>
      </table>


      <table border="1" collapse="collapse" width="100%">
        <tr>
            <td style='text-align:center'>মোট মজুরী</td>
            <td style='text-align:center'>মূল বেতন</td>
            <td style='text-align:center'>বাড়ি ভাড়া</td>
            <td style='text-align:center'>চিকিৎসা ভাতা</td>
            <td style='text-align:center'>খাদ্য</td>
            <td style='text-align:center'>যাতায়াত</td>
            <td style='text-align:center'>মোট কার্য দিবস</td>
            <td style='text-align:center'>হাজিরা বোনাস</td>
            <td style='text-align:center'>ওটি ঘণ্টা</td>
            <td style='text-align:center'>ওটি হার</td>
            <td style='text-align:center'>মোট ওটি মূল্য</td>
            <td style='text-align:center'>অন্যান্য</td>
            <td style='text-align:center'>মোট</td>
            <td style='text-align:center'>অগ্রীম</td>
            <td style='text-align:center'>মোট প্রদেয় টাকা</td>
        </tr>
        <tr>
            <td style='text-align:center'><?php echo $row->gross_sal?></td>
            <td style='text-align:center'><?php echo $row->basic_sal?></td>
            <td style='text-align:center'><?php echo $row->house_r?></td>
            <td style='text-align:center'>750</td>
            <td style='text-align:center'>1250</td>
            <td style='text-align:center'>450</td>
            <td style='text-align:center'><?php echo $row->no_working_days + $row->holiday_or_weekend+$row->total_leave?></td>
            <td style='text-align:center'><?php echo $row->att_bonus?></td>
            <td style='text-align:center'><?php echo $row->ot_hour?></td>
            <td style='text-align:center'><?php echo $row->ot_rate?></td>
            <td style='text-align:center'><?php echo $row->ot_amount?></td>
            <td style='text-align:center'>0</td>
            <td style='text-align:center'>0</td>
            <td style='text-align:center'>0</td>
            <td style='text-align:center'><?php echo $row->net_pay?></td>
        </tr>
      </table>
    </div>
    <div class="pull-right text-right mt-5" >
        <p  style="border-top: 1px solid black;width:fit-content;float:right;margin-right:10px">প্রাপক স্বাক্ষর</p>
    </div>
  </div>


  <?php 
if($i%3 == 0){?>
  <div style="page-break-after: always;"></div>

<?php }


}?>
</body>
</html>