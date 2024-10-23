<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta  name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->        
    <link rel="stylesheet"  href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"/>
    <style>
       .text_size{
        font-size: 20px;
       }
       p{
        font-size:17px ;
       }
       @media print {
        @page {
          size: A4 portrait;
        }
       }

       ol > li::marker {
        font-weight: bold;
        font-size: 21px;
      }
    </style>
    <title>Piece Rate Appointment Letter</title>
  </head>
  <body>
    <?php  
        foreach($values as $row){
    ?>
    <div class="container">
      <div class="row">

        <div class="col-md-12">
          <div style="display: flex; justify-content: center">
            <div style="width: 80px;height:80px">
              <img src="target_logo.jpg" style="height: 70px;margin-top: 33px;"/>
            </div>
            <div style="width: 530px">
              <h3 style="font-weight: bold; margin-top: 40px">টার্গেট ফাইন-নীট ইন্ডাস্ট্রিজ লিমিটেড</h3>
              <p class="">গ্রামঃ বাঁশহাটি, ডাকঘর: খামারগাঁও, উপজেলা: নান্দাইল, জেলাঃ ময়মনসিংহ</p>
            </div>
          </div>

        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <p class="font-weight-bold text_size">সূত্রঃ</p>
          <p class="font-weight-bold text_size">
            বিষয়: <span style="font-weight: bold; border-bottom: 2px solid black"> নিয়োগ পত্র (শুধুমাত্র পিস রেইট শ্রমিকদের জন্য),
              (Appointment Letter for Piece Rate Worker's)
            </span>
          </p>
          <table>
            <tr>
              <td>জনাব/জনাবা</td>
              <td>:</td>
              <td><?php echo $row->bangla_nam?></td>
            </tr>
            <tr>
              <td>তারিখ</td>
              <td>:</td>
              <td><?php echo $row->emp_join_date?></td>
            </tr>
            <tr>
              <td>বর্তমান ঠিকানা</td>
              <td>:</td>
              <td><?php echo 'গ্রামঃ'.$row->pre_vill.", উপজেলাঃ".$row->pre_upa.', পোস্ট অফিসঃ'.$row->pre_post.', জেলাঃ'.$row->pre_dist?></td>
            </tr>
          </table>
          <br/>
          <p>
            আপনার <?php echo $row->emp_join_date?> ইং তারিখের আবেদন, দক্ষতা যাচাই ও সাক্ষাৎকারের  পরিপ্রেক্ষিতে <?php echo date('Y/m/d',strtotime($row->emp_join_date))?> ইং তারিখে কাজে  যোগদান ও নিম্নবর্ণিত শর্তে আপনাকে অত্র কারখানায় <?php echo $row->sec_name.' '?>বিভাগে <?php echo $row->dept_name?> পদে <?php echo $row->emp_sal_gra_id?> গ্রেডে নিয়োগ প্রদান করা হইল।
          </p>
          <p class="text_size font-weight-bold">শর্তাবলী:-</p>
          <ol style="text-align: justify;font-family: SutonnyMJ;" type="1">
            <li> যোগদান পরবর্তী ৩ (তিন) মাস আপনাকে অবেক্ষাকালীন সময় হিসাবে বিবেচিত হইবে। সাফল্যজনক ভাবে অবেক্ষাকালীন সময় অতিবাহিত করিবার পর স্থায়ী শ্রমিক হিসেবে গণ্য করা হবে। যদি কোন অবস্থায় আপনার কাজের মান সন্তোষজনক না হয় তবে কর্তৃপক্ষঅবেক্ষাকালীন সময় আরও ৩ (তিন) মাস বর্ধিত করতে পারেন। এই বিষয়টি শুধু একজন দক্ষ শ্রমিকের ক্ষেত্রে প্রযোয্য। কাজ সন্তোষজনক বিবেচিত না হলে কোনরূপ পূর্ব ইঙ্গিত ব্যতিতই আপনার চাকুরীর অবসান করার অধিকার কর্তৃপক্ষ সংরক্ষন করেন। 
            </li>
         
          <li class="font-weight-bold">আপনার মজুরী / বেতন অবকাঠামো নিম্নরূপ:-</li>
          <!-- <li> -->
            <?php 
               $basic = round(($row->gross_sal - 2450) / 1.4);
               $house_rent      = round($basic * 40 / 100);
            
            ?>
              <table class="" style="margin-left: 105px;">
                <tr>
                  <td>মূল মজুরী / বেতন</td>
                  <td>:</td>
                  <td><?php echo $basic?> টাকা</td>
                </tr>
                <tr>
                  <td>বাড়ী ভাড়া ভাতা </td>
                  <td>:</td>
                  <td><?php echo $house_rent?> টাকা (মূল মজুরীর ৪০%)</td>
                </tr>
                <tr>
                  <td>চিকিৎসা ভাতা </td>
                  <td>:</td>
                  <td> 750 টাকা</td>
                </tr>
                <tr>
                  <td>যাতায়াত ভাতা </td>
                  <td>:</td>
                  <td> 450 টাকা</td>
                </tr>
                <tr>
                  <td>খাদ্য ভাতা</td>
                  <td>:</td>
                  <td> 1250 টাকা</td>
                </tr>
                <tr style="border-top: 1px solid black;">
                <td>সর্বমোট</td>
                  <td>:</td>
                  <td> টাকা ( কথায়: )</td>
                </tr>
              </table>
          <!-- </li> -->
          <p class="font-weight-bold"> উল্লেখ্য যে, আপনার উৎপাদনের টাকা যদি উপরোক্ত বেতনের চেয়ে বেশী হয় সেক্ষেত্রে আপনি উৎপাদনের টাকাই পাবেন।</p>
          <li>কর্তৃপক্ষ প্রয়োজনে আইনানুযায়ী অতিরিক্ত কাজ (ওভারটাইম) করাতে পারবেন এবং সে ক্ষেত্রে আপনাকে মূল বেতনের দ্বিগুণ হারে দেওয়া
              হবে। 
          </li>
          <li> <span class="font-weight-bold">প্রোডাকশন বোনাসঃ</span>  পিস রেইট শ্রমিকদের প্রোডাকশন বোনাস নিম্নলিখিত হারে দেওয়া হবে। (যাহা প্রয়োজনে পরিবর্তন/পরিবর্ধন
              করার অধিকার কর্তৃপক্ষ সংরক্ষণ করেন।) 
          </li>
          <div style="margin-left: 0px;">
               <ol>
                  <p><span class="font-weight-bold">(ক)</span> উৎপাদনের টাকার পরিমান ৩০০১/= হইতে ৪০০০/= টাকা হইলে = ১০% হারে । </p>
                  <p><span class="font-weight-bold">(খ)</span> উৎপাদনের টাকার পরিমান ৪০০১/= হইতে ৫০০০/- টাকা হইলে = ১৫% হারে ।</p>
                  <p><span class="font-weight-bold">(গ)</span> উৎপাদনের টাকার পরিমান ৫০০১/= হইতে তদুর্ধ্ব হইলে = ২০% হারে ।</p>
               </ol>
          </div>
          <li class="font-weight-bold">ছুটি নিম্নোক্ত নিয়মে প্রদান যোগ্য:-</li>
              <ol>
                <p> <span class="font-weight-bold">(ক) সাপ্তাহিক ছুটিঃ </span> প্রতি  সপ্তাহে ০১ (এক) দিন। যা শ্রম/কারখানা আইনানুসারে সাপ্তাহিক ছুটি হিসাবে বিবেচিত হইবে । </p>
              <p> <span class="font-weight-bold">(খ) নৈমিত্তিক ছুটিঃ </span> বছরে পূর্ণ মজুরীসহ (১০) দশ দিন। নৈমিত্তিক ছুটি জমা রেখে পরবর্তী বছরে ভোগ করা যাইবে না । </p>
              <p> <span class="font-weight-bold">(গ) অসুস্থতার ছুটিঃ</span>  বছরে পূর্ণ মজুরীসহ ১৪ (চৌদ্দ) দিন। অসুস্থতার ছুটি জমা রেখে পরবর্তী বছরে ভোগ করা যাইবে না । </p>
              <p> <span class="font-weight-bold">(ঘ) উৎসব ছুটিঃ </span> পূর্ণ মজুরীতে বছরে ১২ (বার) দিন (কর্তৃপক্ষ কর্তৃক নির্ধারিত)। </p>
              <p> <span class="font-weight-bold">(ঙ) বার্ষিক ছুটিঃ </span> চাকুরীর মেয়াদ এক বছর পূর্ন হলে প্রতি ১৮ কর্মদিবসে একদিন সবেতনে ছুটি প্রাপ্য হবে। এ ছুটি পরবর্তী বছরের ছুটির সাথে সমন্বয় করা যাবে। তবে এ ছুটি একসাথে ৪০ দিনের বেশী জমা রাখা যাইবে না। </p>
              <p> <span class="font-weight-bold">(চ) মাতৃত্বকালীন ছুটি (শুধু নারী শ্রমিকদের জন্য)<span style="font-size: 18px;">t</span></span> কর্মকাল ০৬ মাস পূর্ণ হলে সবেতনে ১৬ সপ্তাহ (সন্তান প্রসবের পূর্বে ০৮ সপ্তাহ এবং সন্তান প্রসবের পরে ০৮ সপ্তাহ)। তবে এই সুবিধা শুধু প্রথম ০২ টি সন্তানের ক্ষেত্রে প্রযোজ্য হবে।</p>
              </ol>
        </ol>
          <p class="text-center font-weight-bold mt-4">পৃষ্টা-১/২</p>
        </div>
      </div>
    </div>
    <div style="page-break-after: always"></div>
    <div class="container mt-5">
      <p><span class="font-weight-bold">০৬.</span> প্রতি কর্মদিবসে মধ্যাহ্ন বিরতি হিসাবে ১ (এক) ঘন্টা নামাজ, খাওয়া ও বিশ্রামের জন্য প্রদান করা হইবে।</p>
      <p><span class="font-weight-bold">০৭.</span> প্রতিষ্ঠানের প্রয়োজনে আপনাকে যে কোন সময়, যে কোন অঙ্গ প্রতিষ্ঠানে কিংবা অন্য যে কোন বিভাগে বদলী করা যাইতে পারবে।</p>
      <p><span class="font-weight-bold">০৮.</span> আপনার চাকুরীর অন্যান্য শর্তাবলী দেশের প্রচলিত শ্রম আইন অনুযায়ী পরিচালিত হবে।</p>
      <p><span class="font-weight-bold">০৯.</span> কাজে যোগদানের সময় আপনাকে সরবরাহকৃত "শ্রমিক সহায়িকায়" বর্ণিত শর্তাবলী পালনে আপনি বাধ্য থাকিবেন।</p>
      <p class="font-weight-bold">১০. অন্যান্য সুযোগ সুবিধাঃ</p>
        <div style="margin-left: 55px;">
          <p><span class="font-weight-bold">(ক) হাজিরা বোনাসঃ </span> যদি আপনি সকল কার্যদিবসে নিয়মিত উপস্থিত থাকেন তবে প্রতিষ্ঠানের নিয়ম অনুযায়ী হাজিরা বোনাস পাবেন।</p>
          <p><span class="font-weight-bold">(খ) উৎসব বোনাসঃ </span>প্রতিষ্ঠানের নিয়ম অনুযায়ী চাকুরীর মেয়াদ ১ (এক) বৎসর পূর্ণ হলে আপনাকে দুই ঈদে (ঈদুল ফিতর ও ঈদুল আজহা) দুটি উৎসব বোনাস দেয়া হবে।</p>
          <p><span class="font-weight-bold">(গ) চিকিৎসা সুবিধাঃ</span> কারখানার অভ্যন্তরে কর্মকালীন সময়ে প্রয়োজনীয় চিকিৎসা সুবিধা পাবেন।</p>
        </div>
      <p><span class="font-weight-bold">১১.</span> চাকুরী থাকা কালে আপনি অত্র প্রতিষ্ঠানে ব্যবসা সংক্রান্ত গোপনীয় তথ্যাদি কোন ব্যক্তি, ব্যবসা প্রতিষ্ঠান অথবা অন্য কারো নিকট প্রকাশ করতে পারবেন না।</p>
      <p><span class="font-weight-bold">১২.</span> আপনি যদি কোন "অসদাচরন" এর অপরাধে দোষী প্রমাণিত হন তবে কর্তৃপক্ষ প্রচলিত আইনানুযায়ী আপনার বিরুদ্ধে আইনানুগ যে কোন ধরণের শাস্তির ব্যবস্থা গ্রহণ করতে পারবে।</p>
      <p><span class="font-weight-bold">১৩.</span> জীবন বৃত্তান্ত ফর্মে উল্লেখিত আপনার যোগাযোগের ঠিকানাসহ অন্যান্য তথ্যাদির কোন পরিবর্তন হলে আপনি তাৎক্ষণিক কর্তৃপক্ষকে জানাতে বাধ্য থাকিবেন।</p>
      <p><span class="font-weight-bold">১৪.</span> কর্তৃপক্ষ যে কোন সময় পূর্ব নোটিশ ছাড়া চাকুরীর শর্তাবলী দেশের শ্রম আইনের বিধান সাপেক্ষে পরিবর্তন/ পরিবর্ধন করা বৈধ অধিকার সংরক্ষণ করেন।</p>
      <p><span class="font-weight-bold">১৫.</span> চাকুরী হইতে ইস্তফা দিতে চাইলে স্থায়ী শ্রমিকের ক্ষেত্রে (ষাট) দিনের অগ্রিম নোটিশ প্রদান করিতে হইবে। বিনা নোটিশে চাকুরী হইতে ইস্তফা দিতে চাইলে সেক্ষেত্রে প্রদেয় নোটিশের পরিবর্তে নোটিশ মেয়াদের জন্য মজুরী সমপরিমাণ অর্থ কর্তৃপক্ষকে প্রদান করিতে হইবে। * সংশ্লিষ্ট আইনের ধারা মতে কর্তৃপক্ষ আপনাকে ১২০ দিনের লিখিত নোটিশ অথবা এর পরিবর্তে নোটিশ মেয়াদের সম পরিমান মজুরী প্রদান করে আপনার চাকুরী অবসান করতে পারবেন।</p>
      <p>
        উপরোক্ত শর্তাবলী মেনে যদি আপনি নিয়োগ প্রস্তাব গ্রহণে সম্মত থাকেন এবং আগামী 
        <?php echo $row->emp_join_date?> তারিখের মধ্যে কাজে যোগদানের জন্য রাজি থাকেন তবে, অত্র পত্রের প্রতিলিপিতে স্বাক্ষর প্রদান পূর্বক তা নিম্নস্বাক্ষরকারীর কাছে অবিলম্বে ফেরত দেওয়ার জন্য আপনাকে অনুরোধ করা হল।
      </p>
      <p class="mt-5 font-weight-bold">
        অনুমোদনকারী কর্তৃপক্ষ
      </p>
      <table>
        <tr>
          <td>স্বাক্ষরঃ</td>
          <td></td>
        </tr>
        <tr>
          <td>নামঃ</td>
          <td><?php echo $row->bangla_nam?></td>
        </tr>
        <tr>
          <td>পদবীঃ</td>
          <td><?php echo $row->desig_name?></td>
        </tr>
        <tr>
          <td>তারিখঃ</td>
          <td><?php echo date('d-m-Y')?></td>
        </tr>
      </table>

      <p class="mt-5">
        আমি অত্র নিয়োগ পত্রের বর্ণিত শর্তাদি সম্পূর্ণ রূপে পড়ে, পড়িয়ে এবং এর মর্ম অনুধাবন করে, স্বেচ্ছায়, স্বজ্ঞানে এবং কারো কর্তৃক প্ররোচিত না হয়ে সহি সম্পাদন করলাম।
      </p>
      <br>
      <p class="mt-5 font-weight-bold">শ্রমিক / কর্মচারীর স্বাক্ষর</p>
      <p class="">কার্ড নংঃ<?php echo $row->emp_id?>   বিভাগঃ<?php echo $row->dept_name?></p>
      <p class="">তারিখঃ<?php echo date('d-m-Y')?></p>
      <p class="text-center mt-4 font-weight-bold">পৃষ্ঠা-২/২</p>
    </div>
    <?php }?>


  </body>
</html>

  [emp_id] => A003
            [emp_full_name] => Md. F.K.Uzzal
            [bangla_nam] => মোঃ এফ কে উজ্জল
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
            [pre_post] => অনন্তপুর
            [pre_district] => 3
            [per_vill] => per_village
            [per_upazila] => 5
            [per_post] => আগাথাকুরপেরা
            [per_district] => 7
            [nomi_name] => nominee_name
            [nomi_relation] => nai
            [nomi_vill] => nominee village
            [nomi_upazila] => 9
            [nomi_post] => দিনজপুর বাজার
            [nomi_district] => 1
            [education] => HSC
            [no_child] => 2
            [exp_factory] => Exp Factory
            [duration] => 2
            [exp_designation] => Experience Designation
            [nid] => 126542233
            [personal_phone] => 01797587683
            [emergency_phone] => 01797587683
            [m_name_bn] => 
            [f_name_bn] => 
            [spouse_name_bn] => 
            [edu_bn] => 
            [pre_vill_bn] => 
            [per_vill_bn] => 
            [nomi_vill_bn] => 
            [nomi_name_bn] => 
            [desig_name] => Sr. Accounts Officer
            [emp_join_date] => 2009-01-01
            [dept_name] => Fixed
            [sec_name] => Admin
            [line_name] => None
            [shift_name] => Shift A
            [emp_cat_id] => 1
            [gross_sal] => 21010
            [pre_dist] => বরগুনা
            [per_dist] => ব্রাহ্মণবাড়িয়া
            [nomi_dist] => বাগেরহাট
            [pre_upa] => কালিহাতী
            [per_upa] => মধুপুর
            [nomi_upa] => গোপালপুর
