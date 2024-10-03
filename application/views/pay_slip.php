<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Pay Slip</title>

</head>
<body>
<?php
$i = 0;
foreach($values as $rows)
{
?>	
<div style="width:800px;margin-bottom:8px; height:360px; border:1px  dashed; padding-top:4px;">

  <div style="width:25%; float:left; border-right:1px dashed; ">
      <div style="text-align:center; font-weight:bold; font-size:12px; text-transform:uppercase;"><?php echo $company_name_english = $this->common_model->company_information("company_name_english"); ?><br /><?php echo $company_name_english = $this->common_model->company_information("company_name_bangla"); ?><br /></div>
      <div>
      <table align="left" border="1" cellpadding="2" cellspacing="0" style=" width:98%;border-collapse:collapse; font-weight:bold; height:318px; font-size:10px;">
      <tr><td colspan="2" style="text-align:center;">General Information</td></tr>
      <tr><td>Card No </td><td><?php echo $rows["emp_id"];   ?></td></tr>
      <tr><td>Name</td><td><?php echo $rows["emp_full_name"];   ?></td></tr>
      <tr><td>Desig:</td><td><?php echo $rows["desig_name"];   ?></td></tr>
      <tr><td>Grade </td><td><?php echo $rows["gr_name"];   ?></td></tr>
      <tr><td>Section </td><td><?php echo $rows["sec_name"];   ?></td></tr>
      <tr><td>Line </td><td><?php echo $rows["line_name"];   ?></td></tr>
      <tr><td>Total </td><td><?php echo  $total_days = $rows["net_pay"] -10;  ?></td></tr>
      <tr><td>Pay Date</td><td><?php echo date("Y-m-d");   ?></td></tr>
      <tr><td>Month of</td><td><?php $salary_month = $rows["salary_month"]; echo date("M.Y", strtotime($salary_month));    ?></td></tr>
      <tr><td>Worker's Sign<br />(শ্রমিকের স্বাক্ষর)</td><td>&nbsp; </td></tr>
      <tr><td>Accountant Sign<br />(হিসাব রক্ষক)</td><td>&nbsp; </td></tr>
      </table>
      </div>
  </div>
  <div style="width:74%;float:right;">
  	<div style="font-weight:bold; font-size:15px; text-align:center;"><?php echo $company_name_english = $this->common_model->company_information("company_name_english"); ?>&nbsp;&nbsp;<?php echo $company_name_english = $this->common_model->company_information("company_name_bangla"); ?>&nbsp;&nbsp;Section : <?php echo $rows["sec_name"];   ?>&nbsp;&nbsp;Print Date: <?php echo date("Y.m.d");   ?>
    </div> 
    <div>
      <table align="left" border="0" cellpadding="1" cellspacing="0" style=" width:98%; border-collapse:collapse;font-size:10px;">
      <tr>
      <td>Card No :</td><td><?php echo $rows["emp_id"];?></td>
      <td>Name :</td><td><?php echo $rows["emp_full_name"]; ?></td>
      <td>Grade :</td><td><?php echo $rows["gr_name"];?></td>
      <td>Month :</td><td><?php echo date("Y-m-d");?></td>
      </tr>
      </table>
      </div><br />
    <div style="float:left; width:30%;">
      <table align="left" border="1" cellpadding="1" cellspacing="0" style=" width:98%; height:260px;font-size:10px; border-collapse:collapse;">
      <tr><td colspan="3" style="text-align:center;">Work days and O.T</td></tr>
      <tr><td colspan="2" >Total Days Of Month :</td><td style="font-family: SutonnyMJ; text-align:center;"><?php echo $rows["total_days"];   ?></td></tr>
      <tr><td>Days Present</td><td>উপস্থিত :</td><td style="font-family: SutonnyMJ; text-align:center;"><?php echo  $rows["att_days"];   ?></td></tr>
      <tr><td>Off day</td><td>সাপ্তাহিক বন্ধ :</td><td style="font-family: SutonnyMJ; text-align:center;"><?php echo $rows["weeked"];   ?></td></tr>
      <tr><td>Festible Leave:</td><td>উৎসব ছুটি :</td><td style="font-family: SutonnyMJ; text-align:center;"><?php echo $absent_days = $rows["holidy"];   ?></td></tr>
      <tr><td rowspan="2">Leave Status</td><td>পারিবারিক ছুটি:</td><td>&nbsp;</td></tr><tr><td>অসুস্থ্য ছুটি:</td><td><?php echo $rows["s_l"]; ?></td></tr>
      <tr><td>Absent Days </td><td>পূর্বে অনুপস্থিত:</td><td style="font-family: SutonnyMJ; text-align:center;"><?php echo $rows["absent_days"];   ?></td></tr>
      <tr><td>After/Before Absent Days</td><td>পরে  অনুপস্থিত:</td><td style="font-family: SutonnyMJ; text-align:center;"><?php echo $rows["before_after_absent"];   ?></td></tr>
      </table>
    </div>
    <div style="float:left; width:30%;">
      <table align="left" border="1" cellpadding="1" cellspacing="0" style=" width:98%;height:260px;font-size:10px; border-collapse:collapse;">
      <tr><td colspan="2" >Wages Calculation</td><td>Amount</td></tr>
      <tr><td>Monthly Salary</td><td>মাসিক বেতন </td><td style="font-family: SutonnyMJ; text-align:right;"><?php echo $rows["pay_wages"];   ?></td></tr>
      <tr><td>Basic Pay</td><td>মূল বেতন </td><td style="font-family: SutonnyMJ; text-align:right;"><?php echo  $rows["basic_sal"];   ?></td></tr>
      <tr><td>House Rent</td><td>বাড়ি ভাড়া ৪০% </td><td style="font-family: SutonnyMJ; text-align:right;"><?php echo  $rows["house_r"];   ?></td></tr>
      <tr><td>Medical </td><td>চিকিৎসা ভাতা </td><td style="font-family: SutonnyMJ; text-align:right;"><?php echo  $rows["medical_a"];   ?></td></tr>
      <tr><td>Absent Amount</td><td>অনুপস্থিতের টাকা </td><td style="font-family: SutonnyMJ; text-align:right;"><?php echo  $rows["abs_deduction"];   ?></td></tr>
      <tr><td>Attend. Bonus</td><td>হাজিরা বোনাস </td><td style="font-family: SutonnyMJ; text-align:right;"><?php echo  $rows["att_bonus"];   ?></td></tr>
      <tr><td>Net Pay Total</td><td>মোট </td><td style="font-family: SutonnyMJ; text-align:right;"><?php  echo $total_days = $rows["pay_wages"] + $rows["att_bonus"];?></td></tr>
      </table>
    </div>
    <div style="float:left; width:38%;">
      <table align="left" border="1" cellpadding="1" cellspacing="0" style="width:98%; height:260px;font-size:10px; border-collapse:collapse;">
      <tr><td>Net Payable </td><td colspan="2">সর্বমোট পাওনা টাকা</td><td>Payable Amount</td></tr>
      <tr><td>TTL O.T Hour</td><td>ও.টি ঘন্টা </td><td style="font-family: SutonnyMJ;text-align:center;"><?php echo $rows["ot_hour"];   ?></td><td></td></tr>
      <tr><td>O.T Rate</td><td>ও.টি রেট </td><td style="font-family: SutonnyMJ; text-align:right;"><?php echo  $rows["ot_rate"];   ?></td><td></td></tr>
      <tr><td>Overtime(Amt)</td><td>অতিরিক্ত কাজ </td><td style="font-family: SutonnyMJ; text-align:right;"><?php echo  $rows["ot_amount"];   ?></td><td></td></tr>
      <tr><td>Hours Deduct </td><td>কর্তন ঘন্টা </td><td style="font-family: SutonnyMJ; text-align:center;"><?php echo  $rows["deduct_hour"];   ?></td><td></td></tr>
      <tr><td>Hrs. Ded. Amt</td><td>কর্তনকৃত টাকা </td><td style="font-family: SutonnyMJ; text-align:right;"><?php echo  $rows["deduct_amount"];   ?></td><td></td></tr>
      <tr><td>Stamp charge</td><td>ষ্ট্যাম্প কর্তন</td><td style="font-family: SutonnyMJ; text-align:right;"><?php echo  10; ?></td><td></td></tr>
      <tr><td>Total</td><td>মোট </td><td></td><td style="font-family: SutonnyMJ; text-align:right;"><?php echo  $total_days = $rows["net_pay"] -10;  ?></td></tr>
      </table>
    </div>
    <div style="font-weight:bold; font-size:15px;">Calculation of Over Time : (Basic x 2) ÷ 208 x Total O.T. Hour
    <br />অতিরিক্ত কাজের হিসাব : (মূল বেতন * ২) / ২০৮ * মোট ওটি ঘন্টা
    </div>
    <div>
    <table align="left" border="0" cellpadding="1" cellspacing="0" style=" width:98%;border-collapse:collapse;font-size:10px;">
      <tr><td>Cashier / Accountant Sign :</td><td>&nbsp;</td><td>Worker Sign /শ্রমিকের স্বাক্ষর:</td><td>&nbsp;</td></tr>
      </table>
      </div>
  </div>

</div>
<?php
}
?>
</body>
</html>
