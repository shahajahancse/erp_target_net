<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ID Card Layout</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f7f7f7;
            flex-direction: column;
            gap: 15px;
        }
        
        .id-card {
            display: flex;
            width: 650px;
            gap: 14px;
        }
        
        .left-section, .right-section {
            width: 50%;
        }

        .left-section{
            border: 2px solid #000;
        }
        
        .right-section {
            border: 2px solid #000;
        }
        
        .header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            border-bottom: 2px solid #000;
            align-items: center;
        }
        
        .logo {
            width: 50px;
            height: 50px;
            background-color: #ccc;
            text-align: center;
            line-height: 50px;
        }
        
        .company-name {
            font-weight: bold;
            text-align: right;
        }
        
        .photo-placeholder {
            text-align: center;
            margin-bottom: 20px;
        }
        
        .photo-box {
            width: 100px;
            height: 120px;
            border: 1px solid #000;
            display: inline-block;
            line-height: 120px;
        }
        
        .details p, .additional-details p {
            font-size: 14px;
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
        
    </style>
</head>
<body>
<!-- Array
(
    [0] => stdClass Object
        (
            [emp_id] => A003
            [proxi_id] => 103
            [emp_dept_id] => 2
            [emp_sec_id] => 7
            [emp_line_id] => 47
            [emp_desi_id] => 143
            [emp_operation_id] => 0
            [emp_position_id] => 0
            [emp_sal_gra_id] => 1
            [emp_cat_id] => 1
            [emp_shift] => 1
            [gross_sal] => 21010
            [com_gross_sal] => 
            [ot_entitle] => 0
            [transport] => 0
            [lunch] => 0
            [att_bonus] => 2
            [salary_draw] => 1
            [salary_type] => 1
            [emp_join_date] => 2009-01-01
            [account] => 
            [emp_full_name] => Md. F.K.Uzzal
            [bangla_nam] => à¦®à§‹à¦ƒ à¦à¦« à¦•à§‡ à¦‰à¦œà§à¦œà¦²
            [emp_fname] => father_name
            [emp_mname] => mother_name
            [emp_dob] => 1970-01-01
            [emp_religion] => 2
            [emp_sex] => 1
            [emp_marital_status] => 2
            [emp_blood] => 3
            [img_source] => a003.png
            [spouse_name] => nai
            [pre_vill] => pre_village
            [pre_upazila] => 1
            [pre_post] => 2962
            [pre_district] => 3
            [per_vill] => per_village
            [per_upazila] => 5
            [per_post] => 6
            [per_district] => 7
            [nomi_name] => nominee_name
            [nomi_relation] => nai
            [nomi_vill] => nominee village
            [nomi_upazila] => 9
            [nomi_post] => 90
            [nomi_district] => 1
            [education] => HSC
            [no_child] => 2
            [exp_factory] => Exp Factory
            [duration] => 2
            [exp_designation] => Experience Designation
            [desig_bangla] => 
            [dept_name] => Fixed
            [sec_bangla] => .
            [emp_districts_name] => Barguna
            [emp_upazilas_name] => Kalihati
            [emp_post_offices_name] => Anantapur
        )

) -->

<?php

$per_page=2;
$i=0;
foreach($values as $key => $value){
		$i=$i+1;
	?>
    <div class="id-card">
        <div class="left-section">
            <div class="header">
                <div class="logo"><img style="width: 100%; height: 100%" src="<?= base_url('images/f0006-TARGET-PAPER.jpg') ?>" alt=""></div>
                <div class="company-name">Target Fine Knit Industries Ltd.</div>
            </div>
            <div style="padding: 10px">
                <div class="photo-placeholder">
                    <div class="photo-box"><img style="width: 100%; height: 100%" src="<?= base_url('uploads/photo/').'/'.$value->img_source ?>" alt=""></div>
                </div>
                <div class="details">
                    <p>ID no :  <?= $value->emp_id ?></p>
                    <p>Issue date : <?= $value->emp_join_date?> </p>
                    <p>Name :  <?= $value->emp_full_name?></p>
                    <p>Designation : <?= $value->desig_bangla?> </p>
                    <p>Section : <?= $value->sec_bangla?></p>
                    <p>Joining date : <?= $value->emp_join_date?> </p>
                    <p>Work type : </p>
                </div>
                <div class="signatures">
                    <div class="worker-sign">
                        <p style="border-top:1px solid black;width: fit-content">Worker Sign</p>
                    </div>
                    <div class="authority-sign">
                        <p style="border-top:1px solid black;width: fit-content">Authority Sign</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="right-section" style="padding: 10px">
            <div class="duration">
                <p>Duration: For resign/Retired</p>
                <p>Bashati, Khamargaon, Nandail, Mymensingh.</p>
            </div>
            <div class="return-info">
                <p>If found please return to</p>
            </div>
            <div class="additional-details">
                <p>Blood group : <?= $value->emp_blood?> </p>
                <p>Vilage : <?= $value->per_vill?> </p>
                <p>Post :  <?= $value->emp_post_offices_name?></p>
                <p>Upazila : <?= $value->emp_upazilas_name?> </p>
                <p>Dist : <?= $value->emp_districts_name ?> </p>
                <p>Emergency no : <?=  $value->emergency_phone ?> </p>
                <p>Phone no : <?=  $value->personal_phone ?>  </p>
                <p>National Id no: <?=  $value->nid ?> </p>
            </div>
        </div>
    </div>
	<?php
	if($i==$per_page){
		echo '<div style="page-break-after: always;"></div>';
		$i=0;
	}
	}
	?>
</body>
</html>
