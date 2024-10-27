<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta  name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->        
    <link rel="stylesheet"  href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"/>
    <style>
        .leave-box {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 1px solid black;
            /* background-color: #4CAF50; Green color for the box */
            margin-right: 8px;
            border-radius: 2px; /* Slightly rounded corners */
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        td {
            padding: 10px;
            font-size: 1.1em;
        }
    </style>

    <title>Employee Leave Form</title>
  </head>
  <body>    
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div style="display: flex; justify-content: center">
            <div style="width: 80px;height:80px">
              <img src="<?php echo base_url();?>img/target_logo.jpg" style="height: 70px;margin-top: 0px;"/>
            </div>
            <div style="width: 540px">
              <h3 style="font-weight: bold; margin-top: 10px;position: absolute;">টার্গেট ফাইন-নীট ইন্ডাস্ট্রিজ লিমিটেড</h3><br>
              <p style="margin-top: 20px;position: absolute;">গ্রামঃ বাঁশহাটি, ডাকঘরঃ খামারগাঁও, উপজেলাঃ নান্দাইল, জেলাঃ ময়মনসিংহ</p><br><br>
            </div>
          </div>
        </div>
      </div>

    <?php 
        // dd($values); 
        foreach($values as $row){?>
      <h5 class="text-center" style="margin: 30px auto; border-bottom: 1px solid black;width: fit-content;">ছুটির আবেদনপত্র</h5>  
        <p style="text-align: right;">তারিখ: ০৮/১০/২০২৪</p>
      <div class="row d-block" >
        <table style="width: 100%">

          <tr>
            <th>আই ডি নংঃ</th>
            <td><?php echo $row->emp_id;?></td>
          </tr>
          <tr>
            <th>নামঃ</th>
            <td> <?php echo $row->bangla_nam;?></td>
            <th>ফ্লোরঃ</th>
            <td><?php echo $row->emp_position_id == 0 ? 'ইউনিট-১' : 'ইউনিট-২';?></td>
          </tr>
          <tr>
            <th>পদবীঃ</th>
            <td><?php echo $row->desig_bangla;?> </td>
            <th>লাইন নংঃ</th>
            <td><?php echo $row->line_name;?></td>
          </tr>
          <tr>
            <th>সেকশনঃ</th>
            <td> <?php echo $row->sec_bangla;?></td>
          </tr>
          <tr>
            <th>যোগদানের তারিখঃ</th>
            <td><?php echo $row->emp_join_date;?></td>
          </tr>
          <tr>
            <th>ছুটির ধরনঃ</th>
            <td>
                <span class="leave-box"></span>অর্জিত ছুটি
                <span class="leave-box"></span>নৈমিত্তিক ছুটি
                <span class="leave-box"></span>পীড়া ছুটি
                <span class="leave-box"></span>মাতৃত্বকালিন ছুটি
            </td>
          </tr>
          <tr>
            <th>মোট দিনঃ</th>
            <td><?php echo date('d-m-Y')?> থেকে <?php echo date('d-m-Y')?> তারিখ পর্যন্ত.</td>
          </tr>
          <tr>
            <th>ছুটির আবেদনঃ</th>
            <td><?php echo " "?></td>
          </tr>
          <tr>
            <th>ছুটির কারণঃ</th>
            <td></td>
          </tr>
          <tr>
            <th style="    width: 22%;">ছুটিতে থাকা কালীন ঠিকানাঃ</th>
            <td></td>
          </tr>

        </table>
      </div>

      <div class="row" style="margin-top:70px;">
        
      <table style="width: 100%;" border="1" collupse="collupse">
        <thead  style="text-align: center;">
          <tr>
            <th>ছুটির ধরন</th>
            <th>ছুটির পরিমাণ</th>
            <th>ছুটি ভোগের পরিমাণ</th>
            <th>পাওনা ভুটি</th>
          </tr>
          <tr>
            <td>অর্জিত ছুটি</td>
            <td>14</td>
            <td>0</td>
            <td>0</td>
          </tr> 
          <tr>
            <td>নৈমিত্তিক ছুটি</td>
            <td>10</td>
            <td>0</td>
            <td>0</td>
          </tr> 
          <tr>
            <td>পীড়া ছুটি</td>
            <td>14</td>
            <td>0</td>
            <td>0</td>
          </tr> 
        </thead>
      </table>


      </div>
        <div class="d-flex justify-content-between " style="margin-top:130px">
            <p style="border-top: 1px solid black;">আবেদনকারীর স্বাক্ষর</p>
            <p style="border-top: 1px solid black;">সেকশন প্রধান</p>
            <p style="border-top: 1px solid black;text-align: center;">ম্যানেজার <br>(এইচ আর এডমিন)</p>
            <p style="border-top: 1px solid black;">জি এম</p>
        </div>
        <!-- <div class="row"> -->
            <hr style="border: 1px dotted black !important;">
        <!-- </div> -->
      <h5 class="text-center" style="margin: 0px auto; border-bottom: 1px solid black;width: fit-content;margin-top: 50px;margin-bottom: 50px;">আবেদনকারীর কপি</h5>  
      <div class="row d-block">
        <table style="width: 100%">

          <tr>
            <th>নাম</th>
            <td>: <?php echo $row->bangla_nam?></td>
             <th>আই ডি নং</th>
            <td>: <?php echo $row->emp_id?></td>
          </tr>
          <tr>
            <th>পদবী</th>
            <td>: <?php echo $row->desig_name?> </td>
            <th>সেকশন</th>
            <td>: <?php echo $row->sec_name?></td>
          </tr>

          <tr>
            <th>যোগদানের তারিখ</th>
            <td>: <?php echo $row->emp_join_date?></td>
          </tr>
          <tr>
            <th>ছুটির ধরন</th>
            <td> 
                <span class="leave-box"></span>অর্জিত ছুটি
                <span class="leave-box"></span>নৈমিত্তিক ছুটি
                <span class="leave-box"></span>পীড়া ছুটি
                <span class="leave-box"></span>মাতৃত্বকালিন ছুটি
            </td>
          </tr>
          <tr>
            <th>মোট দিন</th>
            <td> <?php echo date('d-m-Y')?> থেকে <?php echo date('d-m-Y') ?> তারিখ পর্যন্ত.</td>
          </tr>
          <tr>
            <th>ছুটির আবেদন:</th>
            <td>মোট  2 দিন . <?php echo date('d-m-Y')?> থেকে <?php echo date('d-m-Y')?> তারিখ পর্যন্ত । </td>
          </tr>


        </table>
      </div>

        <div class="d-flex justify-content-between " style="margin-top:130px">
            <p style="border-top: 1px solid black;">আবেদনকারীর স্বাক্ষর</p>
            <p style="border-top: 1px solid black;">সেকশন প্রধান</p>
            <p style="border-top: 1px solid black;text-align: center;">ম্যানেজার <br>(এইচ আর এডমিন)</p>
            <p style="border-top: 1px solid black;">জি এম</p>
        </div>

<?php }?>
    <div style="page-break-after: always;"></div>
    

  </body>
</html>
