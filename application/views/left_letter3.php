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
      		<!-- < ?php echo date('d-m-Y',strtotime('+30 day',strtotime($row->left_date))); ?> -->
      				
      			
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
				<strong>বিষয়:</strong> <u><b> বাংলাদেশ শ্রম আইন ২০০৬ এর ২৭(৩ক) ধারা মোতাবেক শ্রমিক কর্তৃক স্বেচ্ছায় চাকুরী হইতে অব্যাহতি গ্রহণ প্রসঙ্গে।</b></u>
			</td>
		</tr>
	</table>
	<br>
	<table style="width: 700px;margin: 0 auto; text-align: justify;">
		<tr>
			<td>
				জনাব,<br>
আপনি  <?php echo date('d/m/Y',strtotime($row->left_date));?> ইং তারিখ হতে অদ্যবদি পর্যন্ত কর্তৃপক্ষের বিনা অনুমতিতে কর্মস্থলে অনুপস্থিত রয়েছেন। আপনার উক্তরুপ অনুপস্থিতির জন্য কর্তৃপক্ষ গত ...........................  ইং তারিখে আত্নপক্ষ সমর্থন পূর্বক কাজে যোগদানের জন্য ১০(দশ) দিনের সময় দিয়ে একটি নোটিশ প্রদান করেন। আপনি উক্ত নোটিশের কোন জবাব প্রদান বা কাজে যোগদান করেন নাই। অত:পর কর্তৃপক্ষ আইনের বিধান মতে আত্নপক্ষ সমর্থনের জন্য আরো ১০(দশ) দিন সময় দিয়া গত ........................... ইং তারিখে আপনাকে দ্বিতীয় নোটিশ প্রেরন করেন। উভয় নোটিশ আপনার বর্তমান ও স্থায়ী ঠিকানায় রেজিস্টার্ড ডাকে প্রেরণ করা হয়। 
			</td>
		</tr>
	</table>
	<br>
	<table style="width: 700px;margin: 0 auto;  text-align: justify;">
		<tr>
			<td>
				আপনি উক্ত দ্বিতীয় নোটিশেরও কোন জবাব প্রদান করা বা কাজে যোগদান করেন নাই।
			</td>
		</tr>
		<tr>
			<td>
				সুতরাং বাংলাদেশ শ্রম আইন, ২০০৬ এর ২৭(৩ক) ধারা অনুযায়ী অনুপস্থিতর দিন থেকে আপনি চাকুরী হতে স্বেচচ্ছায় অব্যাহতি গ্রহণ করেছেন বলে গণ্য করা হলো। উল্লেখ্য যে, বিনা নোটিশে চাকুরী হইতে অব্যাহতি গ্রহণের  জন্য কর্তৃপক্ষ আপনার নিকট নোটিশ পে বাবদ ৬০দিনের মজুরী পাইবার হকদার বটে।
				<br>
				<br>

অতএব, আপনার বকেয়া মজুরী ও আইনানুগ পাওনা (যদি থাকে) আগামী ৩০ (ত্রিশ) কর্মদিবসের মধ্যে অফিস চলাকালীন সময়ে কারখানার হিসাব শাখা থেকে গ্রহণ করার জন্য নির্দেশ দেয়া গেল।
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