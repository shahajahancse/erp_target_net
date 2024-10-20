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
                <div class="company-name">Target Fine Knit Industries Ltd.</div>
            </div>
            <div style="padding: 10px">
                <div class="photo-placeholder">
                    <div class="photo-box"><img style="width: 100%; height: 100%" src="<?= base_url('uploads/photo/').'/'.$value->img_source ?>" alt=""></div>
                </div>
                <div class="details" style="margin-top:15px;">
                    <p>ID No :  <?= $value->proxi_id ?></p>
                    <p>Issue date : <?= $value->emp_join_date?> </p>
                    <p>Name :  <?= $value->emp_full_name?></p>
                    <p>Designation : <?= $value->desig_name?> </p>
                    <p>Section : <?= $value->sec_name?></p>
                    <p>Joining date : <?= $value->emp_join_date?> </p>
                    <p>Work type : <?= $value->work_type==1?"Fixed":"Production"?> </p>
                </div>
                <div class="signatures" style="margin-top:30px">
                    <div class="worker-sign">
                        <p style="border-top:1px solid black;width: fit-content">Employee Sign</p>
                    </div>
                    <div class="authority-sign">
                        <p style="border-top:1px solid black;width: fit-content">Authority Sign</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="right-section" style="padding: 10px;width: 207.36px;height: 321.6px;">

            <div class="return-info">
                <p>If found please return to</p>
            </div>
            <div class="duration">
                <p>Address: Bashati, Khamargaon, Nandail, Mymensingh.</p>
            </div>
            <div class="additional-details">
                <p>Blood group : <?= $value->blood_name?> </p>
                <p>Village : <?= $value->per_vill?> </p>
                <p>Post :  <?= $value->emp_post_offices_name?></p>
                <p>Upazila : <?= $value->emp_upazilas_name?> </p>
                <p>District : <?= $value->emp_districts_name ?> </p>
                <p>Emergency no : <?=  $value->emergency_phone ?> </p>
                <p>Phone no : <?=  $value->personal_phone ?>  </p>
                <p>National Id no: <?=  $value->nid ?> </p>
            </div>
        </div>
    </div>
<?php
    $i++;
}
?>
</body>
</html>
