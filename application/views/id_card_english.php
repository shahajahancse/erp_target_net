<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ID Card English</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }
        
        .page {
            width: 210mm;
            height: 297mm;
            padding: 5mm; /* Reduced padding to fit extra space */
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .id-card {
            display: flex;
            gap: 20px;
            /* border: 1px solid #000; */
            padding: 10px;
            height: calc(95mm + 6.6mm); /* Adjusted height to include extra 25px */
        }

        .left-section, .right-section {
            width: 50%;
        }

        .left-section {
            border: 2px solid #000;
        }

        p {
            font-size: 11px;
        }

        .right-section {
            border: 2px solid #000;
        }

        .header {
            display: flex;
            justify-content: space-between;
            border-bottom: 2px solid #000;
            align-items: center;
        }

        .logo {
            width: 40px;
            height: 40px;
        }

        .company-name {
            font-weight: bold;
            text-align: center;
            font-size: 13px;
        }

        .photo-placeholder {
            text-align: center;
        }

        .photo-box {
            width: 70px;
            height: 75px;
            border: 1px solid #000;
            display: inline-block;
        }

        .details p, .additional-details p {
            font-size: 11px;
            line-height: 1.6;
        }

        .signatures {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .worker-sign, .authority-sign {
            text-align: center;
        }

        .duration, .return-info {
            margin-bottom: 20px;
        }

        .return-info {
            font-weight: bold;
            text-align: center;
        }

        /* Page break after 3 cards */
        @media print {
            .page {
                page-break-after: always;
            }
        }
    </style>
</head>
<body>

<?php
$per_page = 3;
$i = 0;
foreach($values as $key => $value) {
    if($i % $per_page == 0) {
        if($i > 0) {
            echo '</div>';
        }
        echo '<div class="page">';
    }
?>
    <div class="id-card">
        <div class="left-section" style="width: 207.36px;height: 321.6px;">
            <div class="header">
                <div class="logo"><img style="width: 100%; height: 100%" src="<?= base_url('images/f0006-TARGET-PAPER.jpg') ?>" alt=""></div>
                <div class="company-name">টার্গেট ফাইন-নীট ইন্ডাস্ট্রিজ লিমিটেড.</div>
            </div>
            <div style="padding: 10px">
                <div class="photo-placeholder">
                    <div class="photo-box"><img style="width: 100%; height: 100%" src="<?= base_url('uploads/photo/').'/'.$value->img_source ?>" alt=""></div>
                </div>
                <div class="details" style="margin-top:15px;">
                    <p style="line-height:18px">আইডি নংঃ  <?= "<span style='font-family:SutonnyMJ;font-size:15px'>".$value->proxi_id."</span>" ?></p>
                    <p style="line-height:18px"> ইস্যু তারিখঃ <?= "<span style='font-family:SutonnyMJ;font-size:15px'>".$value->emp_join_date."</span>"?> </p>
                    <p style="line-height:18px"> নামঃ  <?= $value->emp_name_bn?></p>
                    <p style="line-height:18px"> পদবীঃ <?= $value->desig_bangla?> </p>
                    <p style="line-height:18px"> সেকশনঃ <?= $value->sec_bangla?></p>
                    <p style="line-height:18px"> যোগদানের তারিখঃ <?= "<span style='font-family:SutonnyMJ;font-size:15px'>".$value->emp_join_date."</span>"?> </p>
                    <p style="line-height:18px"> কাজের ধরণঃ<?= $value->work_type==1?" ফিক্সড":" প্রোডাকশন"?> </p>
                </div>
                <div class="signatures" style="margin-top:30px">
                    <div class="worker-sign">
                        <p style="border-top:1px solid black;width: fit-content"> শ্রমিকের স্বাক্ষর</p>
                    </div>
                    <div class="authority-sign">
                        <p style="border-top:1px solid black;width: fit-content"> কর্তৃপক্ষের স্বাক্ষর</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="right-section" style="padding: 10px;width: 207.36px;height: 321.6px;">
            <div class="return-info">
                <p>উক্ত পরিচয় পত্র পাওয়া গেলে তাৎক্ষণিক যোগাযোগ করুনঃ</p>
            </div>
            <div class="duration">
                <p>ঠিকানা: বাঁশহাটি,খামারগাঁও,নান্দাইল,ময়মনসিংহ</p>
            </div>
            <br>
            <div class="additional-details">
                <p> রক্তের গ্রুপঃ <?= $value->blood_name?> </p>
                <p> গ্রামঃ <?= $value->per_vill_bn?> </p>
                <p> পোস্ট অফিসঃ  <?= $value->emp_post_offices_name_bn?></p>
                <p> উপজেলাঃ <?= $value->emp_upazilas_name_bn?> </p>
                <p> বিভাগঃ <?= $value->emp_districts_name_bn ?> </p>
                <p style="font-family:SutonnyMJ;"> জরুরী ফোন নংঃ <?=  '<span style="font-size:15px">'.$value->emergency_phone.'</span>' ?> </p>
                <p style="font-family:SutonnyMJ;"> ফোন নংঃ <?=  '<span style="font-size:15px">'.$value->personal_phone.'</span>' ?>  </p>
                <p style="font-family:SutonnyMJ;"> এন.আই.ডি/জন্মনিবন্ধন নংঃ: <?=  '<span style="font-size:15px">'.$value->nid.'</span>' ?> </p>
            </div>
        </div>
    </div>
<?php
    $i++;
}
?>
</body>
</html>


