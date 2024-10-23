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
</head>
<body>

<?php 
 foreach($values as $row) {
 	// print_r($row);
 	?>
	
 <div style="height:1036px; width:800px; padding:20px 0 0 0; margin:0 auto;">
 	<table style="width: 800px;text-align: center;">
 		<tr>
 			<td style="font-size: 36px;font-weight: bolder;text-align: center;"><span style="padding-left: 10px;">
 				<?php $company_info = $this->common_model->company_all_information();
 					echo $company_info->company_name_english;
 				?>
 			</span>
 			</td>
 		</tr>
 		<tr>
 			<td>
 				<?php echo $company_info->company_add_english;?>
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
      			<!-- < ?php echo date('d-m-Y',strtotime('+20 day',strtotime($row->left_date))); ?> -->
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
				<strong>বিষয়:</strong> <u><b>বাংলাদেশ শ্রম আইন ২০০৬ এর ২৭(৩ক) ধারা মোতাবেক আত্নপক্ষ সমর্থনের সুযোগ প্রদান প্রসঙ্গে।</b></u>
			</td>
		</tr>
	</table>
	<br>
	<table style="width: 700px;margin: 0 auto; text-align: justify;">
		<tr>
			<td>
				জনাব,<br>

আপনি গত  <?php echo date('d/m/Y',strtotime($row->left_date));?>   ইং থেকে কারখানা কর্তৃপক্ষের বিনা অনুমতিতে কর্মস্থলে অনুপস্থিত রয়েছেন। এ প্রেক্ষিতে কারখানা কর্তৃপক্ষ আপনার স্থায়ী ও বর্তমান ঠিকানায় রেজিষ্ট্রি ডাকযোগে গত  ...........................  ইং তারিখে ১০(দশ) দিনের সময় দিয়ে আত্নপক্ষ সমর্থন পূর্বক কাজে যোগদানের জন্য একটি নোটিশ প্রেরন করেছেন। অদ্যবধি আপনি উপরোক্ত বিষয়ে কোন ধরনের লিখিত ব্যাখ্যা প্রদান করেন নাই অথবা চাকুরীতেও যোগদান করেন নাই।
			</td>
		</tr>
	</table>
	<br>
	<table style="width: 700px;margin: 0 auto;  text-align: justify;">
		<tr>
			<td>
				অতএব, আইনের বিধান মতে আপনাকে আত্নপক্ষ সমর্থনের জন্য আরো ১০(দশ) দিন সময় প্রদান করা হলো। অত্র পত্র প্রাপ্তির  
১০(দশ) দিনের মধ্যে আত্নপক্ষ সমর্থন সহ কাজে যোগদান করিতে আপনাকে নির্দেশ দেয়া গেল।
				<br>
				<br>

উক্ত সময়ের মধ্যে আপনি আত্নপক্ষ সমর্থনের জবাব সহ কাজে যোগদান করতে ব্যার্থ হলে বাংলাদেশ শ্রম আইন ২০০৬ এর ২৭(৩ক) ধারা অনুযায়ী আপনি স্বেচ্ছায় চাকুরী থেকে অব্যহতি গ্রহন করেছেন বলে গন্য হবে।
			</td>
		</tr>
	</table>

	<div style="clear:both;width: 100%;height: 20px;"></div>
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
<?php } ?>	

</body>
</html>