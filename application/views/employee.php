<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta  name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->        
    <link rel="stylesheet"  href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"/>
    <style>
       p{
        font-size:17px ;
       }
       @media print {
        @page {
          size: A4 portrait;
        }
       }
       ol li::marker{
        font-family: SutonnyMJ;
        font-size: 17px;
        font-weight: bold;
       }
       li{
        font-size: 17px;
       }
    </style>
    <title>Employee List</title>
  </head>
  <body>
        <div class="container">
        <div class="row">
            <div class="col-md-12">
            <div style="display: flex; justify-content: center">
                <div style="width: 80px;height:80px">
                <!-- <img src="target_logo.jpg" style="height: 70px;margin-top: 33px;"/> -->
                </div>
                <div style="width: 530px">
                <h3 style="font-weight: bold; margin-top: 40px">টার্গেট ফাইন-নীট ইন্ডাস্ট্রিজ লিমিটেড</h3>
                <p class="">গ্রামঃ বাঁশহাটি, ডাকঘর: খামারগাঁও, উপজেলা: নান্দাইল, জেলাঃ ময়মনসিংহ</p>
                </div>
            </div>

            </div>
        </div>

        <?php 
            $this->db->select('
            com.emp_join_date, 
            com.gross_sal, 
            per.emp_full_name as name_bn,
            per.bangla_nam,
            per.emp_sex as gender,
            pr_designation.desig_bangla,
            pr_line_num.line_name as line_name_bn,
            pr_section.sec_name as sec_name_bn,
            pr_grade.gr_name'
            );
            $this->db->from('pr_emp_com_info as com');
            $this->db->from('pr_emp_per_info as per');
            $this->db->from('pr_section');
            $this->db->from('pr_line_num');
            $this->db->from('pr_designation');
            $this->db->from('pr_grade');
            $this->db->where("com.emp_id = per.emp_id");
            $this->db->where("com.emp_sec_id = pr_section.sec_id");	
            $this->db->where("com.emp_line_id = pr_line_num.line_id");	
            $this->db->where("com.emp_desi_id = pr_designation.desig_id");	
            $this->db->where("com.emp_sal_gra_id = pr_grade.gr_id");
            $this->db->where("com.emp_cat_id = 1");

            $query = $this->db->get()->result();

        ?>

        <div style="text-align: center;">
            <table border="1" collapse="collapse" width="100%">

                <tr> 
                    <th>No.</th>
                    <th>Name</th>
                    <th>Designation</th>
                    <th>Section</th>
                    <th>Line</th>
                    <th>Grade</th>
                    <th>Join Date</th>
                    <th>Gross Salary</th>
                </tr>
                <?php
                $male=0;
                $female=0;
                
                foreach($query as $key=>$row):?>
                <tr>
                    <td><?= $key+1 ?></td>
                    <td><?= $row->name_bn ?></td>
                    <td><?= $row->desig_bangla ?></td>
                    <td><?= $row->sec_name_bn ?></td>
                    <td><?= $row->line_name_bn ?></td>
                    <td><?= $row->gr_name ?></td>
                    <td><?= $row->emp_join_date ?></td>
                    <td><?= $row->gross_sal ?></td>
                </tr>
                <?php

                if($row->gender==1){
                    $male++;
                }else{
                    $female++;
                }
            endforeach; 
            $total=$male+$female;
            ?>
                <tr>Male: <?= round(($male*100)/($total),2) ?>%    Female: <?= round(($female*100)/($total),2) ?>%</tr>
            </table>
        </div>
  </body>
</html>
