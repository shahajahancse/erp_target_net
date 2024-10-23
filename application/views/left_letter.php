<?php error_reporting(0);?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Left Report</title>
<style>
	
 h1,h2,h3,h4,h5,h6{
 	margin: 0;
 	padding: 0;
 font-weight: normal;
 }
 
 table{
 	line-height: 20px;
 }

</style>
<style type="text/css" media="print">
    .page-break {
       page-break-after: always;
    }
</style>
</head>
<body>

<?php  
// echo"<pre>";print_r($values);exit;
 foreach($values as $row) { ?>
	
 <div style="height:1036px; width:800px; padding:20px 0 0 0; margin:0 auto;">
 	<table style="width: 800px;text-align: center;">
 		<tr>
 			<td style="font-size: 36px;font-weight: bolder;text-align: center;"><span style="padding-left: 10px;">
 				<?php //$company_info = $this->common_model->company_all_information();
 					//echo $company_info->company_name_english;
 				?>
 			</span>
 			</td>
 		</tr>
 		<tr>
 			<td>
 				<?php //echo $company_info->company_add_english;?>
 			</td>
 		</tr>
 	</table>
 	<div style="clear: both;width: 100%; height: 10px;"></div>
	<h3 style="text-align-last: center;"><u>রেজিস্ট্রি ডাকযোগে</u></h3>
 	<div style="clear: both;width: 100%; height: 20px;"></div>

	<table style="width: 700px; margin: 0 auto">
		<tr>
	    	<td>তারিখঃ </td>
      		<td>:</td>
      		<td> ........................... </td>
      			<!-- < ?php echo date('d-m-Y',strtotime('+10 day',strtotime($row->left_date))) ?> -->
      				
		</tr>
		<tr>
	    	<td>সূত্র </td>
      		<td>:</td>
      		<td></td>
		</tr>
		<tr style="">
      		<td width=120px>নাম</td>
      		<td width="5px;">:</td>
      		<td><?php echo $row->bangla_nam; ?></td>
    	</tr>
		<tr style="">
      		<td width=120px>নাম (ইং)</td>
      		<td width="5px;">:</td>
      		<td><?php echo $row->emp_full_name; ?></td>
    	</tr>
    	<tr style="">
      		<td width=120px>পিতা/স্বামী নাম</td>
      		<td>:</td>
      		<td><?php echo $row->emp_fname; ?></td>
    	</tr>
    	<tr style="">
      		<td width=120px>পদবী</td>
      		<td>:</td>
      		<td><?php echo $row->desig_bangla; ?></td>
    	</tr>
    	<tr style="">
      		<td width=120px>কার্ড নং</td>
      		<td>:</td>
      		<td><?php echo $row->emp_id; ?></td>
    	</tr>
    	<tr style="">
      		<td width=120px>বিভাগ</td>
      		<td>:</td>
      		<td><?php echo $row->dept_name; ?></td>
    	</tr>
		<tr style="">
      		<td width=120px>বর্তমান ঠিকানা</td>
      		<td width="5px;">:</td>
      		<td><?php echo $row->emp_pre_add; ?></td>
    	</tr>
		<tr style="">
      		<td width=120px>স্থায়ী ঠিকানা</td>
      		<td width="5px;">:</td>
      		<td><?php echo $row->emp_par_add; ?></td>
    	</tr>
	</table>
	<br>
	<table style="width: 700px;margin: 0 auto; text-align: justify;">
		<tr>
			<td style="font-size: 18px;">
				<strong>বিষয়:</strong> <u><b> বাংলাদেশ শ্রম আইন ২০০৬ এর ২৭(৩ক) ধারা মোতাবেক ব্যাখ্যা প্রদান সহ কাজে যোগদানের নোটিশ।</b></u>
			</td>
		</tr>
	</table>
	<br>
	<table style="width: 700px;margin: 0 auto; text-align: justify;">
		<tr>
			<td>
				জনাব,<br>
আপনি গত   <?php echo date('d/m/Y',strtotime($row->left_date));?>  ইং থেকে অদ্যাবধি কারখানা কর্তৃপক্ষের বিনা অনুমতিতে বিনা নোটিশে কর্মস্থলে অনুপস্থিত রয়েছেন। আপনার এরুপ অনুুপস্থিতির জন্য কারখানার কাজ ব্যাহত হচ্ছে, কর্তৃপক্ষ আর্থিকভাবে ক্ষতির সম্মূখীন হচ্ছেন। আপনার বিনা অনুমতিতে বিনা নোটিশে কর্মস্থলে অনুপস্থিত থাকা বাংলাদেশ শ্রম আইন ২০০৬ এর ২৭(৩ক) ধারার আওতায় পড়ে।
			</td>
		</tr>
	</table>
	<br>
	<table style="width: 700px;margin: 0 auto;  text-align: justify;">
		<tr>
			<td>
				সুতরাং অত্র পত্র প্রাপ্তির পর ১০(দশ) দিনের মধ্যে আপনার অনুপস্থিতির কারণ ব্যাখ্যা সহ কাজে যোগদানের জন্য নির্দেশ দেয়া হলো।
				<br>
				<br>

আপনার বিনা অনুমতিতে অনুপস্থিতির কারণ, লিখিত ব্যাখ্যা সহ উল্লেখিত সময়ের মধ্যে নিম্নস্বাক্ষরকারীর নিকট পৌছানো সহ অবশ্যই কাজে যোগদানের রিপোর্ট করতে হবে। অন্যথায় কর্তৃপক্ষ আপনার বিরুদ্ধে প্রয়োজনীয় পরবর্তি আইনানুগ ব্যবস্থা গ্রহণ করতে বাধ্য হবে।
			</td>
		</tr>
	</table>

	<div style="clear:both;width: 100%;height: 80px;"></div>
	<table style="width: 700px;margin: 0 auto;">
		<tr>
			<td style="font-size: 20px;">ধন্যবাদান্তে,</td>
		</tr>
		<tr>
			<td style="height: 50px;"></td>
		</tr>
		<tr>
			<td>ব্যবস্থাপক/কর্মকর্তা/নির্বাহী</td>
		</tr>
		<tr>
			<td><?php echo $company_info->company_name_bangla; ?></td>
		</tr>
	</table>

	<div style="clear:both;width: 100%;height: 20px;"></div>

	<table style="width: 700px;margin: 0 auto;">
		<tr>
			<td style="width: 50%">
				<h2>অনুলিপিঃ</h2>
				<h4>১. ব্যবস্থাপনা পরিচালক </h4>
				<h4>২. কারখানার নোটিশ বোর্ড </h4>
				<h4>৩. শ্রমিকের ব্যক্তিগত নথি। </h4>
				<h4>৪. হিসাব বিভাগ। </h4>
			</td>
		</tr>
	</table>
            
</div>
 <!-- <div style="clear:both;width: 100%;height: 30px;"></div>		 -->
<?php echo "<div class='page-break'></div>"; }  ?>	

</body>
</html>