<?php
class BanglaNumberToWord{
    var $eng_to_bn = array('1'=>'১', '2'=>'২', '3'=>'৩', '4'=>'৪', '5'=>'৫','6'=>'৬', '7'=>'৭', '8'=>'৮', '9'=>'৯', '0'=>'০');
    var $num_to_bd = array('1'=>'এক','2'=>'দুই','3'=>'তিন','4'=>'চার','5'=>'পাঁচ','6'=>'ছয়','7'=>'সাত','8'=>'আট', '9'=>'নয়','10'=>'দশ','11'=>'এগার','12'=>'বার','13'=>'তের','14'=>'চৌদ্দ','15'=>'পনের','16'=>'ষোল','17'=>'সতের','18'=>'আঠার','19'=>'ঊনিশ','20'=>'বিশ','21'=>'একুশ','22'=>'বাইশ','23'=>'তেইশ','24'=>'চব্বিশ','25'=>'পঁচিশ','26'=>'ছাব্বিশ','27'=>'সাতাশ','28'=>'আঠাশ','29'=>'ঊনত্রিশ','30'=>'ত্রিশ','31'=>'একত্রিশ','32'=>'বত্রিশ','33'=>'তেত্রিশ','34'=>'চৌত্রিশ','35'=>'পঁয়ত্রিশ','36'=>'ছত্রিশ','37'=>'সাঁইত্রিশ','38'=>'আটত্রিশ','39'=>'ঊনচল্লিশ','40'=>'চল্লিশ','41'=>'একচল্লিশ','42'=>'বিয়াল্লিশ','43'=>'তেতাল্লিশ','44'=>'চুয়াল্লিশ','45'=>'পঁয়তাল্লিশ','46'=>'ছেচল্লিশ','47'=>'সাতচল্লিশ','48'=>'আটচল্লিশ','49'=>'ঊনপঞ্চাশ','50'=>'পঞ্চাশ','51'=>'একান্ন','52'=>'বায়ান্ন','53'=>'তিপ্পান্ন','54'=>'চুয়ান্ন','55'=>'পঞ্চান্ন','56'=>'ছাপ্পান্ন','57'=>'সাতান্ন','58'=>'আটান্ন','59'=>'ঊনষাট','60'=>'ষাট','61'=>'একষট্টি','62'=>'বাষট্টি','63'=>'তেষট্টি','64'=>'চৌষট্টি','65'=>'পঁয়ষট্টি','66'=>'ছেষট্টি','67'=>'সাতষট্টি','68'=>'আটষট্টি','69'=>'ঊনসত্তর','70'=>'সত্তর','71'=>'একাত্তর','72'=>'বাহাত্তর','73'=>'তিয়াত্তর','74'=>'চুয়াত্তর','75'=>'পঁচাত্তর','76'=>'ছিয়াত্তর','77'=>'সাতাত্তর','78'=>'আটাত্তর','79'=>'ঊনআশি','80'=>'আশি','81'=>'একাশি','82'=>'বিরাশি','83'=>'তিরাশি','84'=>'চুরাশি','85'=>'পঁচাশি','86'=>'ছিয়াশি','87'=>'সাতাশি','88'=>'আটাশি','89'=>'ঊননব্বই','90'=>'নব্বই','91'=>'একানব্বই','92'=>'বিরানব্বই','93'=>'তিরানব্বই','94'=>'চুরানব্বই','95'=>'পঁচানব্বই','96'=>'ছিয়ানব্বই','97'=>'সাতানব্বই','98'=>'আটানব্বই','99'=>'নিরানব্বই');
    var $num_to_bn_decimal = array('0'=>'শূন্য ','1'=>'এক ','2'=>'দুই ','3'=>'তিন ','4'=>'চার ','5'=>'পাঁচ ','6'=>'ছয় ','7'=>'সাত ','8'=>'আট ', '9'=>'নয় ');
    var $hundred = 'শত';
    var $thousand = 'হাজার';
    var $lakh = 'লক্ষ';
    var $crore = 'কোটি';

    public function engToBn($number){
        $bn_number = strtr($number,$this->eng_to_bn);
        return $bn_number;
    }

    public function numToWord($number){
        if (!is_numeric($number) ) return 'Not a Number';

        if(is_float($number)){
            $dot = explode(".", $number);
            return $this->numberSelector($dot[0]).' দশমিক '.$this->numToBnDecimal($dot[1]);
        }else{
            return $this->numberSelector($number);
        }

    }
    public function numToBn($number){
        $word = strtr($number,$this->num_to_bd);
        return $word;
    }
    public function numToBnDecimal($number){
        $word = strtr($number,$this->num_to_bn_decimal);
        return $word;
    }

    public function numberSelector($number){
        if($number > 9999999){
            return $this->crore($number);
        }elseif($number > 99999){
            return $this->lakh($number);
        }elseif($number > 999){
            return $this->thousand($number);
        }elseif($number > 99){
            return $this->hundred($number);
        }else{
            return $this->underHundred($number);
        }
    }

    public function underHundred($number){
        $number = ($number == 0)?'': $this->numToBn($number);
        return $number;
    }

    public function hundred($number){
        $a = (int)($number/100);
        $b = $number%100;
        $hundred = ($a == 0)?'': $this->numToBn($a).' '.$this->hundred;
        return $hundred.' '.$this->underHundred($b);
    }

    public function thousand($number){
        $a = (int)($number/1000);
        $b = $number%1000;
        $thousand = ($a == 0)?'': $this->numToBn($a).' '.$this->thousand;
        return $thousand.' '.$this->hundred($b);
    }

    public function lakh($number){
        $a = (int)($number/100000);
        $b = $number%100000;
        $lakh = ($a == 0)?'': $this->numToBn($a).' '.$this->lakh;
        return $lakh.' '.$this->thousand($b);
    }

    public function crore($number){
        $a = (int)($number/10000000);
        $b = $number%10000000;
        $more_than_core = ($a>99)?$this->lakh($a):$this->numToBn($a);
        return $more_than_core.' '.$this->crore.' '.$this->lakh($b);
    }
}

$obj = new BanglaNumberToWord();


?>

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
        .line_height{
          line-height: 45px;
       }
        
       }
       ol li::marker{
        font-family: SutonnyMJ;
        font-size: 17px;
        font-weight: bold;
       }
       li{
        font-size: 19px;
       }
       body{
        /* height: 100vh; */
        box-sizing: border-box;
        padding: 0px;
        margin: 0px;
       }
    </style>
    <title>Job Application Letter</title>
  </head>
  <body>
    <?php foreach($values as $row)?>
    <!-- appoinmenet -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <div style="display: flex; justify-content: center">
                <div style="width: 80px;height:80px">
                <img src="<?php echo base_url();?>img/target_logo.jpg" style="height: 70px;margin-top: 33px;"/>
                </div>
                <div style="width: 530px">
                <h3 style="font-weight: bold; margin-top: 40px">টার্গেট ফাইন-নীট ইন্ডাস্ট্রিজ লিমিটেড</h3>
                <p class="">গ্রামঃ বাঁশহাটি, ডাকঘর: খামারগাঁও, উপজেলা: নান্দাইল, জেলাঃ ময়মনসিংহ</p>
                </div>
            </div>
            </div>
        </div>
        <div class="row border border-dark">
        <div class="col-md-12">
          <div class="d-flex justify-content-between">
            <p> <span  style="padding: 0px 50px 0px 20px;background-color: black;border: 1px solid black;border-right: 2px solid white;" class="text-white">নিয়োগ পত্র </span><span  style="padding: 0px 100px;border: 1px solid black;background-color: black;"> </span> </p>
          <p>Version-<i>1:2020 / Ref:HR/01/006</i></p>
          </div>
          <div class="d-flex justify-content-between">
              <p class="">সূত্রঃ</p>
              <div class="d-flex justify-content-end">
                <p class="col-8 border text-right border-dark">তারিখঃ</p>
                <p class="col-10 text-center border border-dark">2024-10-08</p>
              </div>
          </div>
          <div class="row">
            <div class="col-md-12">
                    <table class="table table-bordered table-sm">
                        <tr>
                        <td colspan="1">আইডি নংঃ</td>
                        <td colspan="2"><?php echo $row->emp_id?></td>
                        <td colspan="7 border-none"></td>
                        
                        </tr>
                        <tr>
                        <td colspan="1">নামঃ</td>
                        <td colspan="9"><?php echo $row->bangla_nam?></td>
                        </tr>
                        <tr>
                        <td colspan="1">পিতা/স্বামীর নামঃ</td>
                        <td colspan="4"><?php echo $row->emp_fname?></td>
                        <td colspan="1">মাতার নামঃ</td>
                        <td colspan="4"><?php echo $row->emp_mname?></td>
                        </tr>

                      <tr>
                        <td colspan="1"  style="width: 160px;">বর্তমান ঠিকানা, গ্রামঃ</td>
                        <td colspan="3"><?php echo $row->pre_vill?></td>
                        <td colspan="1" style="width: 70px;">ডাকঘরঃ</td>
                        <td colspan="1"> <?php echo $row->pre_post?> </td>
                        <td colspan="1" style="width: 70px;">থানাঃ</td>
                        <td colspan="1"> <?php echo $row->pre_upa?></td>
                        <td colspan="1" style="width: 70px;" >জেলাঃ</td>
                        <td colspan="1"><?php echo $row->pre_dist?></td>
                        </tr>
                        <tr>
                        <td colspan="1">স্থায়ী ঠিকানা, গ্রামঃ</td>
                        <td colspan="4"> <?php echo $row->per_vill?></td>
                        <td colspan="1">ডাকঘরঃ</td>
                        <td colspan="4"> <?php echo $row->per_post?></td>
                        </tr>
                        <tr>
                        <td colspan="1">থানাঃ</td>
                        <td colspan="4"><?php echo $row->per_upa?></td>
                        <td colspan="1">জেলাঃ</td>
                        <td colspan="4"><?php echo $row->per_dist?> </td>
                        </tr>
                    </table>
                  <p class="font-weight-bold border border-dark bg-dark text-white w-25"> শর্তাবলীঃ</p>
            </div>
          </div>
          <ol>
            <li class="text-justify">
                 <span class="font-weight-bold">নিয়োগের কার্যকারিতাঃ</span> আপনার আবেদন ও সাক্ষাতের প্রেক্ষিতে আপনাকে
                    তারিখ হইতে এবং কর্মচারীর শ্রেনী কর্ম পদে গ্রেডে নিয়োগ প্রদান করা হলো। কাজের ধরণঃ আপনার নিয়োগ পরবর্তী ছয় (০৬) মাস শিক্ষানবীশকাল হিসেবে গণ্য হবে। যদি উল্লেখিত সময়ের মধ্যে (দক্ষ কর্মচারীর ক্ষেত্রে) যোগ্যতার মান নির্ণয় করা সম্ভব না হয়, তাহলে আপনার শিক্ষানবীশকাল আরও ০৩ (তিন) মাস বৃদ্ধি করা যেতে পারে। নির্ধারিত সময়ের পরে আপনাকে স্থায়ী করণের চিঠি প্রদান করা না হলে নিয়ম মাফিক আপনি স্থায়ী কর্মচারী হিসাবে গন্য হবেন।
                  
            </li>
            <li><span class="font-weight-bold">মজুরীঃ</span> পরবর্তী মজুরী বৃদ্ধি না করা পর্যন্ত আপনাকে নিম্নোক্ত হারে মজুরী দেওয়া হইবে।</li>
            <?php 
                $basic = round(($row->gross_sal - 2450) / 1.4);
                $house_rent  = round($basic * 40 / 100);
                
                ?>
          <table class="" style="margin-left: 105px;font-family:SutonnyMJ">
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
                    <td><?php echo $row->gross_sal?> টাকা ( কথায়: <?php echo $obj->numToWord($row->gross_sal); ?>)</td>
                    </tr>
                </table>
          <li>
             <span class="font-weight-bold">মজুরী ও পাওনাদী প্রদানের তারিখঃ</span> প্রত্যেক শ্রমিক/কর্মচারী কে চলতি মাসের সকল পাওনাদী পরবর্তী মাসের ০৭ (সাত) কর্ম দিবসের মধ্যে প্রদান করা হবে।
             <ul>
                <li style="list-style-type:disc">সাধারণ কর্মঘন্টাঃ সকাল ৮:০০ টা থেকে বিকেল ৫:০০ টা পর্যন্ত। তবে কারখানার প্রয়োজনে অতিরিক্ত হিসাবে আপনাকে বিকেল ৫.০০ টার পর আরও অধিক অফিসিয়াল কাজ করতে হতে পারে।</li>
                <li style="list-style-type:disc">অধিকাল কাজের জন্য আপনাকে অতিরিক্ত কোন ভাতা প্রদান করা হবে না।</li>
                <li style="list-style-type:disc">চাকুরীর বয়স ১ বৎসর পূর্ণ হলে শ্রম আইন অনুযায়ী মূল মজুরীর ৫% হারে বাৎসরিক ভিত্তিতে মজুরী বৃদ্ধি পাইবে।</li>
             </ul>
          </li>
          <li><span class="font-weight-bold">ছুটি ও বন্ধঃ</span> সকল কর্মকর্তা/কর্মচারী কে সপ্তাহে পূর্ণ ০১ (এক) দিন ছুটি দেওয়া হবে। এছাড়াও কর্মকর্তা/কর্মচারীগন নিম্নলিখিত হারে ছুটি পাবেনঃ
            <ul>
              <li style="list-style-type: disc;">উৎসব ছুটিঃ নূন্যতম ১১ দিন পূর্ণ মজুরীতে।</li>
              <li style="list-style-type: disc;">বাৎসরিক ছুটিঃ প্রতি ১৮ কর্মদিবসের জন্য ০১ দিন (০১ বৎসর চাকুরী পূর্ণ হবার পর)</li>
              <li style="list-style-type: disc;">নৈমিত্তিক ছুটিঃ ১০ দিন পূর্ণ মজুরীতে।</li>
              <li style="list-style-type: disc;">অসুস্থ্যতা জনিত ছুটিঃ ১৪ দিন পূর্ণ মজুরীতে।</li>
              <li style="list-style-type: disc;">মাতৃত্বকালীন ছুটিঃ ১৬ সপ্তাহ বা ১১২ দিন (বাংলাদেশ শ্রমআইন ২০০৬ অনুযায়ী) শুধুমাত্র মহিলা শ্রমিকদের জন্য বিধিমালা অনুযায়ী প্রযোজ্য। </li>
              <li style="list-style-type: disc;">অসুস্থ্যতা জনিত ছুটি রেজিষ্টার্ডকৃত ডাক্তার অথবা প্রতিষ্ঠানের মেডিকেল অফিসার দ্বারা সুপারিশকৃত হতে হবে। অন্যান্য ছুটি কোম্পানীর কর্তৃপক্ষ কর্তৃক অনুমোদিত হবে।</li>
              <li style="list-style-type: disc;">নৈমিক্তিক ছুটি অথবা পীড়া ছুটির মধ্যে কোন সাপ্তাহিক বা উৎসব ছুটি পড়িলে উক্ত ছুটি মূল ছুটির অর্ন্তভুক্ত হইবে এবং বৎসরের কোন অংশে কাজে যোগদানের ক্ষেত্রে উক্ত ছুটি হারাহারি ভাবে ভোগ করিতে পারিবেন।</li>
            </ul>
          </li>

          <li> <span class="font-weight-bold">বিশ্রাম ও আহারের জন্য বিরতিঃ</span> প্রত্যেক শ্রমিক/কর্মচারী প্রতি কর্ম দিবসে বিশ্রাম ও আহারের জন্য ০১ (এক) ঘন্টা সময় পাবেন।</li>
          <li> <span class="font-weight-bold">অন্যান্য সুবিধাঃ</span> 
              <ul>
                <li style="list-style-type: disc;">ঈদ/বোনাসঃ</span> চাকুরীর বয়স ০১ বৎসর পূর্ন হলে বাংলাদেশ শ্রম আইন অনুযায়ী বৎসরে দুই ঈদে দুইটি উৎসব বোনাস দেওয়া হয়।</li>
                <li style="list-style-type: disc;">হাজিরা বোনাসঃ শ্রমিকদের কে কোম্পানির হাজিরা নীতিমালা অনুযায়ী প্রতিমাসে ২৫০/= (দুইশত পঞ্চাশ) টাকা হাজিরা বোনাস প্রদান করা হয়।</li>
                <li style="list-style-type: disc;">মেডিকেল সুবিধাঃ</span> কারখানার নির্ধারিত ডাক্তার ও নার্স কর্তৃক চিকিৎসা সুবিধা দেওয়া হয়।</li>
              </ul>
          </li>
          </ol>
        </div>
      </div> 
      <p class="text-right">Appoinment Letter (TOFSIL-K) | HR/01/006</p>
    </div>
    <div style="page-break-after: always;"></div>

    <div class="container border border-dark">
      <ol start="7" style="line-height: 30px;">
        <li  class="text-justify"> <span class="font-weight-bold">হাজিরা রেকর্ড ও আইডি কার্ডঃ</span> আপনার হাজিরা এবং ওভারটাইম রেকর্ড করার জন্য আপনাকে হাজিরা কার্ড ও রেজিয়ার অথবা ইলেকট্রনিক ফিদার ইমপ্রেশন সিস্টেম প্রদান করা হবে। ফ্যাক্টরীতে প্রবেশ ও বাহির হবার সময় ফিদার ইমপ্রেশন দিতে হবে। এই মেশিন স্বয়ংক্রিয়ভাবে আপনার হাজিরা এবং ওভারটাইম রেকর্ড নিয়ন্ত্রন করবে।</li>
        <li> <span class="font-weight-bold">নিরাপত্তা বিধিমালাঃ</span> আপনাকে কোম্পানীর নিরাপত্তা বিধিমালা সম্পূর্ণ মেনে চলতে হবে।</li>
        <li> <span class="font-weight-bold"> বদলীঃ</span> কর্তৃপক্ষ প্রয়োজনে আপনার সকলশর্ত সঠিক রেখে কোম্পানীর অন্যান্য ফ্যাক্টরীতে বা একই প্রতিষ্ঠানের অন্য কোন বিভাগে অথবা শিফটে বদলী করতে পারবে।</li>
        <li class="text-justify"> <span class="font-weight-bold">গোপনীয়তাঃ</span> অত্র প্রতিষ্ঠানে কর্মরত থাকা অবস্থায় আপ্রনি অন্য কোন প্রতিষ্ঠানে প্রত্যক্ষ বা পরোক্ষভাবে কোন চাকুরী করতে পারবেন না। এছাড়াও আপনি অত্র প্রতিষ্ঠানের ব্যবসাসংক্রান্ত কোন গোপন তথ্যাদী কোন ব্যক্তি বা প্রতিষ্ঠানের নিকট প্রকাশ করতে পারবেন না। চাকুরী শেষে আপনার অধীনে থাকা কোম্পানীর কোন কাগজপত্র বা অন্য কোন জিনিস যেমন-আইডিকার্ড, ইউনিফর্ম ইত্যাদী থাকলে সে সকল জিনিস ফেরত দিবেন।</li>
        <li> <span class="font-weight-bold">পিপিই ব্যবহারঃ </span>কর্মক্ষেত্রে (প্রযোজ্য ক্ষেত্রে) সকল প্রকার "পিপিই” (ব্যক্তিগত সুরক্ষাসামগ্রী) ব্যবহার করে কাজ করা সকল শ্রমিক। কর্মচারীর জন্য বাধ্যতামূলক।</li>
        <li class="text-justify"> <span class="font-weight-bold">শ্রমিক/কর্মচারীদ্বারা চাকুরী পরিসমাপ্তিঃ</span> ধারা ২৭ এর বিধান সাপেক্ষে, যদি কোন স্থায়ী শ্রমিক/কর্মচারী চাকুরী হতে ইস্তফা দিতে চান তবে তিনি মালিকা ব্যবস্থাপনা কর্তৃপক্ষ কে ৬০ দিনের (২ মাসের) লিখিত নোটিশ প্রদান করবেন। যদি তিনি কোন নোটিশ না দিয়ে চাকুরী হতে ইস্বফা দিতে চান ভবে তাকে নোটিশ মেয়াদ হিসাবে ৬০ দিনের (২ মাসের) মূলমজুরীর বা সমপরিমান অর্থ মালিককে প্রদান করতে হবে।
        (মাসিক বেতন হারে শ্রমিকদের ক্ষেত্রে) এবং অস্থায়ী শ্রমিকের ক্ষেত্রে (১ মাসের) নোটিশ প্রদান করে চাকুরী হতে ইস্তফা প্রদান করবেন।</li>

        <li><span class="font-weight-bold">মালিকদ্বারা চাকুরী সমাপ্তিঃ</span> সাধারনত শ্রম আইন অনুযায়ী হয়ে থাকে। কর্তৃপক্ষ কোন স্থায়ী শ্রমিক/কর্মচারীর চাকুরী অবসান করতে চাইলে শ্রম আইন ২০০৬ অনুযায়ী অগ্রিম ১২০ (একশতবিশ) দিনের নোটিশ প্রদান অথবা নোটিশের পরিবর্তে ১২০ (একশতবিশ) দিনের মূলমজুরী প্রদান করা হবে।</li>
        <li><span class="font-weight-bold">অসদাচরণঃ</span> অসদাচরণের জন্য অপরাধ প্রমানিত হলে বাংলাদেশ শ্রম আইন মোতাবেক প্রতিষ্ঠানের কর্তৃপক্ষ কর্তৃক তার বিরুদ্ধে প্রয়োজনীয় শাস্তিমূলক ব্যবস্থা গ্রহন করা হবে।</li>
        <li><span class="font-weight-bold">ডিসচার্জঃ</span> দীর্ঘকালীন অসুস্থতা অথবা মানসিক বা দৈহিকভাবে অক্ষম হলে যদি রেজিঃ ডাক্তার কর্তৃক প্রত্যায়িত হয় তবে তাকে ডিসচার্জ করা হবে।</li>
        <li><span class="font-weight-bold">অবসর গ্রহনঃ</span> কোন শ্রমিকের বয়স ৬০ (ষাট) বৎসরপূর্ণ হইলে তিনি চাকুরী হতে স্বাভাবিক অবসর গ্রহন করতে পারবেন।</li>
        <li><span class="font-weight-bold">নীতিমালাঃ</span> বাংলাদেশ শ্রম আইনের আলোকে অত্র কোম্পানীর প্রণীত নিয়ম বা নীতিমালার ভিত্তিতে আপনার চাকুরী পরিচালিত হবে।</li>
        <li class="text-justify"><span class="font-weight-bold">মাদক দ্রব্যঃ</span> কারখানার অভ্যন্তরে কোন প্রকার অস্ত্র, বিস্ফোরক, মাদক দ্রব্য যেমন-ইয়াবা, ফেনসিডিল, মারিজুয়ানা, কোকেন, আফিম, মদ, সিগারেট ইত্যাদি জাতীয় পণ্য নিয়ে প্রবেশ করা-স্তাকিনা বা এই জাতীয় পণ্য কারো সাথে লেনদেন করা যাবে না। যদি কেহ এই জাতীয় পণ্য নিয়ে কারখানার অভ্যন্তরে প্রবেশ করে সেক্ষেত্রে কর্তৃপক্ষ কর্তৃক যে কোন আইনানুগ শাস্তি গ্রহণ করা হবে।</li>
      </ol>
      <br><br> 
      <p class="bg-dark text-white border border-dark" >প্রত্যয়ন</p>
      <br>
      <p class="text-justify" style="line-height: 40px;"> আমি নিম্ন স্বাক্ষর কারী <span class="font-weight-bold" style="border: 1px solid black; padding: 5px 2px; margin: 0px 5px;"><?php echo $row->bangla_nam?></span> এই নিয়োগ ও চুক্তিপত্রে উল্লেখিত সকলবিধি, নিয়ম-কানুন ও শর্তাবলী সম্পূর্ণ রূপে অবগত হয়ে, বুঝে, মেনে কোন প্রকার জোর-জবরদস্তি ছাড়া, স্বেচ্ছায়-স্বজ্ঞানে ও ব্যক্তিগত সুরক্ষা সামগ্রী বুঝে পেয়ে এই নিয়োগ পত্রে স্বাক্ষর করলাম এবং এর একটি কপি বুঝে পেলাম।</p>
      <br><br>
      <br><br>
      <div class="d-flex justify-content-between mt-5" style="margin-top:100px !important">
        <p class="border-top border-dark">শ্রমিকের স্বাক্ষর</p>
        <p class="border-top border-dark">কর্তৃপক্ষের স্বাক্ষর</p>
      </div>
        
    </div>
    <div class="container">
      <p class="text-right">Appoinment Letter (TOFSIL-K) | HR/01/006</p>
    </div>
    <!-- appoinmenet -->


    <!-- application -->
    <div class="container">
      <div class="row border border-dark mt-2">
        <p class="col-md-12 font-weight-bold border border-dark text-center bg-dark text-white">চাকুরীর আবেদন</p>
        <div class="col-md-12">
          <div style="line-height: 10px;" class="d-flex justify-content-between">
              <p  class="font-weight-bold">বরাবর,</p>
              <p class="font-weight-bold" style="font-size: 13px;"><i>Virson-1:2020 / Ref: HR/01/001</i></p>
          </div>
            <p style="line-height: 15px;">ব্যবস্থাপনা পরিচালক,</p>
            <p style="line-height: 15px;font-size: 18px;font-weight: bold;">টার্গেট ফাইন-নীট ইন্ডাস্ট্রিজ লিমিটেড</p>
            <p style="line-height: 15px;">গ্রাম: বাঁশহাটি, ডাকঘরঃ খামারগাঁও, থানাঃ নান্দাইল, জেলাঃ ময়মনসিংহ।</p>
            <p style="line-height: 50px;"><span class="font-weight-bold border border-dark" style="padding: 2px 15px;">বিষয়ঃ</span><span class="font-weight-bold border border-dark w-25" style="padding: 2px 176px;">পদে চাকুরীর জন্য আবেদন।</span></p>
          
          <!-- <div class="row"> -->
          <p class="line_height">মহোদয়,<br>যথা বিহীত সম্মান প্রদর্শন পূর্বক বিনীত নিবেদন এই যে, আমি বিভিন্ন মাধ্যমে জানিতে পারিলাম যে, আপনার প্রসিদ্ধ শিল্প প্রতিষ্ঠানে <br> <span style="padding:0px 70px;border: 1px solid black;margin:0px 5px;"><?php echo $row->sec_name?> </span> সেকশনে/বিভাগে  <span style="padding:0px 70px;border: 1px solid black;margin:0px 5px;"><?php echo $row->desig_name?> </span> পদে লোক নিয়োগ করা হইবে। আমি উক্ত পদের জন্য একজন প্রার্থী হিসাবে আমার জীবন-বৃত্তান্ত ও কাজের অভিজ্ঞতাসহ সংশ্লিষ্ট বিষয়াদি সংযুক্ত পূর্বক চাকুরীর জন্য আবেদন করিতেছি।</p>
          <!-- </div> -->
           <br>
          <div class="row">
            <div class="col-md-12">
                  <table class="table table-bordered table-sm">
                    <!-- <tr>
                      <td colspan="1">আইডি নংঃ</td>
                      <td colspan="2">১২৩৪৫৩</td>
                      <td colspan="7 border-none"></td>
                      
                    </tr> -->
                    <tr>
                      <td colspan="1">নামঃ</td>
                      <td colspan="9"><?php echo $row->bangla_nam?> </td>
                    </tr>
                    <tr>
                      <td colspan="1">পিতা/স্বামীর নামঃ</td>
                      <td colspan="4"><?php echo $row->emp_fname?></td>
                      <td colspan="1">মাতার নামঃ</td>
                      <td colspan="4"><?php echo $row->emp_mname?></td>
                    </tr>
                    <tr>
                      <td colspan="1">স্থায়ী ঠিকানা-প্রযন্তে,</td>
                      <td colspan="9"></td>
                    </tr>
                    <tr>
                      <td colspan="1"> গ্রামঃ</td>
                      <td colspan="4"> <?php echo $row->per_vill?></td>
                      <td colspan="1">ডাকঘরঃ</td>
                      <td colspan="4"> <?php echo $row->per_post?></td>
                    </tr>

                    
                    <tr>
                      <td colspan="1">থানাঃ</td>
                      <td colspan="4"><?php echo $row->per_upa?></td>
                      <td colspan="1">জেলাঃ</td>
                      <td colspan="4"><?php echo $row->per_dist?></td>
                    </tr>


                    <tr>
                      <td colspan="1">বর্তমান ঠিকানা-প্রযন্তে,</td>
                      <td colspan="9"></td>
                    </tr>
                    <tr>
                      <td colspan="1"> গ্রামঃ</td>
                      <td colspan="4"><?php echo $row->pre_vill?></td>
                      <td colspan="1">ডাকঘরঃ</td>
                      <td colspan="4"><?php echo $row->pre_post?></td>
                    </tr>

                    
                    <tr>
                      <td colspan="1">থানাঃ</td>
                      <td colspan="4"><?php echo $row->pre_upa?></td>
                      <td colspan="1">জেলাঃ</td>
                      <td colspan="4"><?php echo $row->pre_dist?></td>
                    </tr>
                    <tr>
                      <td colspan="1">জন্য তারিখঃ</td>
                      <td colspan="4"><?php echo $row->emp_dob?></td>
                      <td colspan="1">বয়সঃ </td>
                      <td colspan="4"><?php echo date_diff(date_create($row->emp_dob), date_create('now'))->format('%y'); ?> বছর</td>
                    </tr>
                    <tr>
                      <td colspan="1">জাতীয়তাঃ </td>
                      <td colspan="4">বাংলাদেশী</td>
                      <td colspan="5">(নাগরিকত্ব সনদ/ জাতীয় পরিচয়পত্রের কপি সংযুক্ত)</td>
                    </tr>

                    <tr>
                      <td colspan="1">বৈবাহিক অবস্থাঃ</td>
                      <td colspan="2"><?php echo $row->emp_marital_status == 2 ? 'বিবাহিত'  : 'অবিবাহিত'?></td>
                      <td colspan="1">ধর্মঃ</td>
                      <td colspan="2"><?php echo $row->emp_religion == 1 ? 'ইসলাম' : ( $row->emp_religion == 2 ? 'হিন্দু' : ( $row->emp_religion == 3 ? 'বৌদ্ধ' : 'খ্রিষ্টান'))?></td>
                      <td colspan="1">ফোন নংঃ</td>
                      <td colspan="3"><?php echo $row->personal_phone?></td>
                    </tr>
                    <tr>
                      <td colspan="1">সন্তানের সংখ্যাঃ</td>
                      <td colspan="1">ছেলেঃ</td>
                      <td colspan="3">0</td>
                      <td colspan="1">মেয়েঃ</td>
                      <td colspan="3">0</td>
                    </tr>

                    <tr>
                      <td colspan="1">শিক্ষাগত যোগ্যতাঃ</td>
                      <td colspan="5"><?php echo $row->education?></td>
                      <td colspan="4">(সার্টিফিকেটের কপি সংযুক্ত করুন)</td>
                    </tr>
                    <tr>
                      <td colspan="1">অভিজ্ঞতা যদি থাকেঃ</td>
                      <td colspan="5"></td>
                      <td colspan="2"> রক্তের গ্রুপঃ</td>
                      <td colspan="2"><?php echo $row->blood_name?></td>
                    </tr>
                    <tr>
                      <td colspan="1">জাতীয় পরিচয়পত্রের নংঃ</td>
                      <td colspan="5"><?php echo $row->nid?></td>
                      <td colspan="2">জন্ম নিবন্ধন পত্রের নংঃ</td>
                      <td colspan="2"><?php echo $row->nid?></td>
                    </tr>
                    <tr>
                      <td colspan="10">পরিচিত একজন ব্যক্তির নাম ও ঠিকানা, সম্পর্ক সহঃ</td>
                    </tr>
                    <tr>
                      <td colspan="1">গ্রামঃ</td>
                      <td colspan="1"><?php echo $row->nomi_vill?></td>
                      <td colspan="1">থানাঃ</td>
                      <td colspan="1"><?php echo $row->nomi_upa?></td>
                      <td colspan="2">ডাকঘরঃ</td>
                      <td colspan="1"><?php echo $row->nomi_post?></td>
                      <td colspan="1">জেলাঃ</td>
                      <td colspan="2"><?php echo $row->nomi_dist?></td>
                    </tr>
                    <tr>
                      <td colspan="1">ফোন নংঃ</td>
                      <td colspan="4"><?php echo $row->personal_phone?></td>
                    </tr>
                  </table>
            </div>
          </div>
          <br>
          <!-- <div class="col-md-12"> -->
            <p class="text-justify line_height">
              আমি এই মর্মে অঙ্গিকার করিতেছি যে, বিস্তারিত বিবরণ যাহা দেওয়া হইয়াছে তাহা সত্য এবং প্রয়োজন বোধে আমার শিক্ষাগত যোগ্যতার মূল সার্টিফিকেট ও প্রশংসা পত্র উপস্থাপন করিব। আমি আরও অঙ্গিকার করিতেছি যে, আমাকে নিয়োগ দেওয়া হইলে আমি প্রতিষ্ঠানের সকল নিয়ম কানুন এবং বিধি বিধান মানিয়া চলিব এবং কোন প্রকার নেশা জাতীয় দ্রব্য কারখানায় বহন ও গ্রহন করবো না আমার কোন প্রকার অসত্য অথবা ভুল তথ্যের প্রমাণ পাইলে কর্তৃপক্ষ আমার বিরুদ্ধে আইনানুগ ব্যবস্থা গ্রহণ করিতে পারিবেন।
            </p>
          <!-- </div> -->
           <br>
           <br>
           <br>
          <div style="float:right; ">
            <table style="border:1px solid black;">
            <tr style="border:1px solid black;">
              <td>আবেদনকারীর স্বাক্ষরঃ</td>
              <td class="border border-dark"><span style="padding: 0px 120px;"></span></td>
            </tr>
            <tr style="border:1px solid black;">
              <td >আবেদনকারীর নামঃ</td>
              <td class="border border-dark"><span style="padding: 0px 120px;"><?php echo $row->bangla_nam?></span></td>
            </tr>
            <tr style="border:1px solid black;">
              <td>তারিখঃ</td>
              <td class="border border-dark"><span style="padding: 0px 120px;"></span></td>
            </tr>
           </table>
           <p class="text-right mt-3">Job Appliction - HR/01/001</p>
          </div>
        </div>
      </div> 
    </div>
    <!-- application -->
     <div style="page-break-after: always;"></div>

    <!-- job application -->
     
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
      <div class="row border border-dark mt-2" >
        <div class="col-md-12">
          <div style="line-height: 10px;" class="d-flex justify-content-between">
              <p class="font-weight-bold mt-2" style="margin-top: 6px !important;">
                <span style="border: 1px solid black;padding: 0px 5px;">তারিখঃ</span>
                <span style="border: 1px solid black;padding: 0px 80px;"></span>
              </p>
              <p class="font-weight-bold" style="font-size: 13px;"><i>Virson-1:2020 / Ref: HR/01/004</i></p>
          </div>
            <p class="font-weight-bold mt-5">বরাবর,</p>
            <p style="line-height: 15px;">ব্যবস্থাপনা পরিচালক,</p>
            <p style="line-height: 15px;font-size: 20px;font-weight: bold;">টার্গেট ফাইন-নীট ইন্ডাস্ট্রিজ লিমিটেড</p>
            <p style="line-height: 15px;">গ্রাম: বাঁশহাটি, ডাকঘরঃ খামারগাঁও, থানাঃ নান্দাইল, জেলাঃ ময়মনসিংহ।</p>
            <p style="line-height: 50px;" class="font-weight-bold mt-5 mb-5">বিষয়ঃ চাকুরীতে যোগদান প্রসঙ্গে।</p>

          
            <p class="line_height">জনাব,<br>বিনীত নিবেদন এই যে, কর্তৃপক্ষ কর্তৃক আমাকে নিয়োগপত্র এবং উহাতে উল্লেখিত নিয়মাবলী বুঝে ও মেনে নিয়ে আমি অদ্য  <br> <span style="padding:0px 70px;border: 1px solid black;margin:0px 5px;"><?php echo $row->emp_join_date?></span> ইং তারিখে অত্র ফ্যাক্টরিতে <span style="padding:0px 70px;border: 1px solid black;margin:0px 5px;"> <?php echo $row->desig_name?></span> পদে <span style="padding:0px 70px;border: 1px solid black;margin:0px 5px;"> <?php echo $row->emp_sal_gra_id?></span> গ্রেডে  <span style="padding:0px 70px;border: 1px solid black;margin:0px 5px;"> <?php echo $row->sec_name?></span> বিভাগ/সেকশন  এ যোগদানের অনুমিতি চেয়ে অত্র যোগদান পত্র আপনার সমীপে পেশ করছি।</p>

            <p class="mt-5 mb-5">
              অতএব, মহাদয়ের নিকট আবেদন এই যে আমাকে চাকুরীতে যোগদানের সুযোগ দিতে বাধিত করিবেন।
            </p>
            

            <p class="mt-5" style="margin-top: 70px !important;">নিবেদক/নিবেদিকা,</p>
            <table collupse="collupse" >
              <tr>
                <td style="padding: 0px 25px 0px 0px;">স্বাক্ষরঃ</td>
                <td style="border: 1px solid black;"><span style="padding:0px 300px;margin-left:10px;"></span></td>
              </tr>
              <tr>
                <td>পূর্ণ নামঃ</td>
                <td style="border: 1px solid black;"><span style="padding:0px 300px;margin-left:10px;"><?php echo $row->bangla_nam?></span></td>
              </tr>
            </table>


            <p class="mt-5 font-weight-bold"> মানব সম্পদ বিভাগ কর্তৃক পূরনীয়ঃ</p>
            <table collupse="collupse" border="1" style="border:0px solid black;width: 90%;">
              <tr>
                <td colspan="2">সুত্র নং (নিয়োগ পত্র মোতাবেক)</td>
                <td colspan="6">সূত্রঃ টিএফকেআইএল/এইচ</td>

              </tr>
              <tr>                
                <td colspan="2" class="text-center">সেকশনঃ</td>
                <td colspan="2"><?php echo $row->sec_name?></td>
                <td colspan="2"> <span style="padding:0px 50px;" class="text-center"> বিভাগঃ</span></td>
                <td colspan="2"><?php echo $row->dept_name?></td>
                
              </tr>
              <tr>
                <td colspan="2" class="text-center">বেতনঃ</td>
                <td colspan="2"><span style="padding:0px 50px;"><?php echo $row->gross_sal?></span></td>
                <td colspan="2"><span style="padding:0px 50px;">গ্রেডঃ</span></td>
                <td colspan="2"><span style="padding:0px 100px;"><?php echo $row->emp_sal_gra_id?></span></td>
              </tr>
              <tr>
                <td colspan="2" class="text-center">আইডিঃ</td>
                <td colspan="6"><?php echo $row->emp_id?></td>
              </tr>
              <tr style="border:0px solid black">
                <td colspan="2" style="border:none"></td>
                <td colspan="3" style="border:1px solid black !important;text-align:center">মানব সম্পদ বিভাগ কর্তৃক পূরণীয়</td>
                <td colspan="3" style="border:1px solid black !important;text-align:center">পে-রোল বিভাগ কর্তৃক পূরণীয়</td>
              </tr>


              <tr style="border:none">
                <td colspan="2"  style="border:0px solid black"></td>
                <td colspan="3" style="padding:35px 100px;border:1px solid black !important;"></td>
                <td colspan="4" style="padding:35px 100px;border:1px solid black !important;"></td>
              </tr>
              <tr style="border:none">
                <td colspan="2" style="border:0px solid black"></td>
                <td colspan="3" style="border:1px solid black !important;text-align:center">মানব সম্পদ কর্মকর্তার স্বাক্ষর</td>
                <td colspan="4" style="border:1px solid black !important;text-align:center">পে-রোল কর্মকর্তার স্বাক্ষর</td>
              </tr>
            </table>

            <br><br><br>  
            <br><br><br>  
            <br><br><br>  

            <div class="d-flex justify-content-between">
              <table >
                <tr>
                  <td class="border border-dark" style="padding: 40px 230px;"></td>
                </tr>
                <tr>
                <td class="border border-dark text-center" style="border-bottom: none !important;">সহঃ ব্যবস্থাপক। মানব সম্পদ ও কম্পম্প্লায়েন্স</td>

                </tr>
              </table>
              <table>
                <tr>
                  <td class="border border-dark" style="padding: 40px 230px;"></td>
                </tr>
                <tr>
                <td class="border border-dark text-center" style="border-bottom: none !important;">বিভাগীয় প্রধান। প্রশাসন, মানব-সম্পদ ও কমপ্লায়েন্স</td>
                </tr>
              </table>

            </div>

        </div>
      </div> 
    </div>

    <!-- job application -->


    <!-- form 41 -->
    <div class="container">
      <div class="row">

        <div class="col-md-12">
          <div style="display: flex; justify-content: center">
            <div style="width: 80px;height:80px">
              <img src="target_logo.jpg" style="height: 70px;margin-top: 13px;"/>
            </div>
            <div style="width: 530px;line-height: 8px;">
              <h3 style="font-weight: bold; margin-top: 20px">টার্গেট ফাইন-নীট ইন্ডাস্ট্রিজ লিমিটেড</h3>
              <p class="">গ্রামঃ বাঁশহাটি, ডাকঘর: খামারগাঁও, উপজেলা: নান্দাইল, জেলাঃ ময়মনসিংহ</p>
              <p class="text-center font-weight-bold" style="font-size:20px">ফরম ৪১ <span style="font-size: 10px; position: absolute;margin-left: 262px;">Virson-1:2020 | Ref: HR/01/008</span></p>
            </div>
          </div>

        </div>
      </div>

      <div class="row border border-dark">
            <p style="border: 1px solid black !important;" class="bg-dark text-white text-center w-100">জমা ও বিভিন্ন খাতে প্রাপ্ত অর্থ পরিশোধের ঘোষনা ও মনোনয়ন/নোমিনি ফরম</p>


          <table collupse="collupse" border="1" style="width: 100%;">
            <tr>
              <td colspan="1">শ্রমিকের নামঃ</td>
              <td colspan="3"><?php echo $row->bangla_nam?></td>
              <td colspan="1" rowspan="6" style="vertical-align: baseline;text-align: center;">শ্রমিক কর্তৃক সত্যায়িত <br> মনোনীত ব্যক্তির ছবি</td>
            </tr>
            <tr>
              <td colspan="1" >আইডি নংঃ</td>
              <td colspan="4"><?php echo $row->emp_id?></td>
            </tr>
            <tr>
              <td colspan="4"  style="width: 160px;">বর্তমান ঠিকানা-প্রযন্তে</td>
            </tr>
            <tr>
              <td colspan="1">গ্রামঃ</td>
              <td colspan="1"><?php echo $row->pre_vill?></td>
              <td colspan="1"  style="width: 80px;">পোষ্টঃ</td>
              <td colspan="1"><?php echo $row->pre_post?></td>

            </tr>
            <tr>
              <td colspan="1" >থানাঃ</td>
              <td colspan="1"><?php echo $row->pre_upa?></td>
              <td colspan="1" >জেলাঃ</td>
              <td colspan="1"><?php echo $row->pre_dist?></td>

            </tr> 
            
            <tr>
            <td colspan="1">পিতা/স্বামী/স্ত্রীর নামঃ</td>
              <td colspan="3"><?php echo $row->emp_fname?></td>
            </tr>
            <tr>
              <td colspan="1" >জন্ম তারিখঃ</td>
              <td colspan="3" ><?php echo $row->emp_dob?></td>
              <td colspan="1" rowspan="6"></td>
            </tr> 

            <tr>
              <td colspan="1">সনাক্তকরণ চিহ্ন (যদি থাকে)</td>
              <td colspan="3"></td>
            </tr>
            <tr>
              <td colspan="4" >স্থায়ী ঠিকানা-প্রযন্তে</td>
            </tr> 
            <tr>
              <td colspan="1" >গ্রামঃ</td>
              <td colspan="1" ><?php echo $row->per_vill?></td>
              <td colspan="1" >থানাঃ</td>
              <td colspan="1"><?php echo $row->per_upa?></td>
            </tr> 
            <tr>
              <td colspan="1"  >পোষ্টঃ</td>
              <td colspan="1" ><?php echo $row->per_post?></td>
              <td colspan="1" >জেলাঃ</td>
              <td colspan="1"><?php echo $row->per_dist?></td>
            </tr> 
            <tr>
              <td colspan="1">চাকুরীতে যোগদানের তারিখঃ</td>
              <td colspan="1" style="width: 220px;"><?php echo $row->emp_join_date?></td>
              <td colspan="1" style="width: 90px;">পদের নামঃ</td>
              <td colspan="1" style="width: 220px;"><?php echo $row->desig_name?></td>
            </tr>  
          </table>

          <p class="text-justify p-1 mt-1 mb-1">
            আমি এতদ্বারা ষোষনা করিতেছি যে, আমার মৃত্যু হইলে বা আমার অবর্তমানে, আমার অনুকূলে জমা ও বিভিন্নখাতে প্রাপ্য টাকা (যদি থাকে) গ্রহনের জন্য আমি নিম্নবর্ণিত ব্যক্তি ও ব্যক্তিগণকে মনোনয়ন দান করিতেছি এবং অনুরোধ করছি যে, উক্ত টাকা নিম্নবর্ণিত পদ্ধতিতে মনোনীত ব্যক্তি/ব্যক্তিদের মধ্যে বণ্টন করিতে হইবেঃ
          </p>


          <table border="1" collapse="collapse">
            <tr>
              <td colspan="2">মনোনীত ব্যক্তি/ব্যক্তিদের নাম, ঠিকানা ও ছবি (মনোনীত ব্যক্তির ছবি ও স্বাক্ষর শ্রমিক কর্তৃক সত্যায়িত হতে হবে)</td>
              <td colspan="1">শ্রমিকের সহিত মনোনীত ব্যক্তি/ব্যক্তিদের সম্পর্ক</td>
              <td colspan="1">বয়স</td>
              <td colspan="1" style="width:40px"   rowspan="15"></td>
              <td colspan="2" style="white-space: nowrap;">প্রত্যেক মনোনীত ব্যক্তিকে দেয় অংশ</td>
            </tr>
            <tr>
              <td colspan="2">১) প্রথম মনোনীত ব্যক্তি</td>
              <td colspan="1" rowspan="6"></td>
              <td colspan="1" rowspan="6"></td>
              <td colspan="1">জমাখাত (যদি থাকে)</td>
              <td colspan="1">অংশ</td>
            </tr>
            <tr>
              <td colspan="1">নামঃ</td>
              <td colspan="1" style="width: 300px;"></td>
              <td colspan="1" rowspan="5" style="font-size:13px;text-align: right;">বকেয়া মজুরী
                প্রভিডেন্ট<br>
                ফান্ড<br>
                বীমা<br>
                দুর্ঘটনার<br>
                ক্ষতিপুরন লভ্যাংশ<br>
                অন্যান্য
              </td>
              <td colspan="1" rowspan="5"></td>
              
            </tr>
            <tr>
              <td colspan="1">গ্রামঃ</td>
              <td colspan="1"></td>
            </tr>
            <tr>
              <td colspan="1">পোষ্টঃ</td>
              <td colspan="1"></td>
            </tr>
            <tr>
              <td colspan="1">থানাঃ</td>
              <td colspan="1"></td>
            </tr>
            <tr>
              <td colspan="1">জেলাঃ</td>
              <td colspan="1"></td>
            </tr>
            <tr>
              <td colspan="1">জাতীয় পরিচয় পত্র নংঃ</td>
              <td colspan="3"></td>
            </tr>
            <tr>
              <td colspan="2">২) দ্বিতীয় মনোনীত ব্যক্তি</td>
              <td colspan="1" rowspan="6"></td>
              <td colspan="1" rowspan="6"></td>
              <td colspan="1" rowspan="7" style="font-size:13px;text-align: right;">বকেয়া মজুরী
                প্রভিডেন্ট<br>
                ফান্ড<br>
                বীমা<br>
                দুর্ঘটনার<br>
                ক্ষতিপুরন লভ্যাংশ<br>
                অন্যান্য
              </td>
              <td colspan="1" rowspan="7"></td>
            </tr>
            <tr>
              <td colspan="1">নামঃ</td>
              <td colspan="1"></td>
            </tr>
            <tr>
              <td colspan="1">গ্রামঃ</td>
              <td colspan="1"></td>
            </tr>
            <tr>
              <td colspan="1">পোষ্টঃ</td>
              <td colspan="1"></td>
            </tr>
            <tr>
              <td colspan="1">থানাঃ</td>
              <td colspan="1"></td>
            </tr>
            <tr>
              <td colspan="1">জেলাঃ</td>
              <td colspan="1"></td>
            </tr>
            <tr>
              <td colspan="1">জাতীয় পরিচয় পত্র নংঃ</td>
              <td colspan="3"></td>
            </tr>

          </table>
            

          <p style="margin-top:20px">আমি প্রত্যয়ন করিতেছি যে, আমার উপস্থিতিতে জনাব <span style="border: 1px solid black; padding: 0 130px;margin: 0px 5px;"><?php echo $row->bangla_nam?></span> লিপিবদ্ধ বিবরণসমূহ পাঠ করিবার পর উক্ত ঘোষনা স্বাক্ষর করিয়াছেন।</p>

          <p class="col-md-12" style="margin-left: -15px;">০১) মনোনয়ন প্রদানকারী শ্রমিকেরঃ</p>

          <!-- <div> -->
          <table border="1" collapse="collapse" style="width: 100%;">
            <tr>
              <td>স্বাক্ষরঃ</td>
              <td></td>
              <td>টিপসহিঃ</td>
              <td></td>
              <td>তারিখঃ</td>
              <td></td>
            </tr>
          </table>

          <!-- </div> -->
          <p>০২) মনোনীত ব্যক্তি/ব্যক্তিগনের,</p><br>
          <!-- <div class="col-md-12"> -->
            <table border="1" collapse="collapse" style="width: 100%;">
                <td>স্বাক্ষরঃ</td>
                <td></td>
                <td>টিপসহিঃ</td>
                <td></td>
                <td>তারিখঃ</td>
                <td></td>
              </tr>
              <tr>
                <td>স্বাক্ষরঃ</td>
                <td></td>
                <td>টিপসহিঃ</td>
                <td></td>
                <td>তারিখঃ</td>
                <td></td>
              </tr>
            </table>

          <!-- </div> -->

          <p class="mt-5 text-right" style="float: right;width: 100%;"> <span style="border-top: 1px solid black; margin-right: 40px;">বিভাগীয় প্রধান</span><br> <span style="margin-right: 40px;">প্রশাসন, মানব সম্পদ ও কম্প্লায়েন্স</span></p>
      </div> 
    </div>
    <!-- form 41 -->

    <!-- doctor appoinment -->
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div style="display: flex; justify-content: center">
            <div style="width: 80px;height:80px">
              <img src="target_logo.jpg" style="height: 70px;margin-top: 0px;"/>
            </div>
            <div style="width: 540px">
              <h3 style="font-weight: bold; margin-top: 10px;position: absolute;">টার্গেট ফাইন-নীট ইন্ডাস্ট্রিজ লিমিটেড</h3><br>
              <p style="margin-top: 20px;position: absolute;">গ্রামঃ বাঁশহাটি, ডাকঘরঃ খামারগাঁও, উপজেলাঃ নান্দাইল, জেলাঃ ময়মনসিংহ</p><br><br>
            </div>
          </div>
        </div>
        <p style="width: 100%;font-weight: bold;    line-height: 0px;"><span style="float:right !important;font-size: 13px;"><i>Version-1:2020 / Ref:HR/01/006</i></span></p> 
      </div>

      <div class="row border border-dark">

      <p class="bg-dark text-white w-100 text-center">প্রার্থীর পূর্ণাঙ্গ ডাক্তারী প্রতিবেদন</p>
      <p><span>তারিখঃ</span> <span></span></p>

      <p>(এই প্রতিবেদনের সমস্ত তথ্যাদি একজন রেজিষ্টার্ড চিকিৎসক দ্বারা পূরণ করতে হবে। কোন প্রকার সংশোধনী, যদি থাকে, তবে একই চিকিৎসক তা নিশ্চিত করবেন)।</p>

        <div class="col-md-12">
          <p>চাকুরী প্রার্থীর ব্যক্তিগত তথ্যাবলীঃ</p>
          <p>নামঃ <?php echo $row->bangla_nam?>, 
              পদবীঃ <?php echo $row->desig_name?>,
              সেকশন/বিভাগঃ <?php echo $row->sec_name?>,
              জন্ম তারিখঃ <?php echo $row->emp_dob?>,
              লিঙ্গঃ <?php echo $row->emp_sex?>
              পুরুষঃ 
              নারীঃ
          </p>
        </div>



      <p>চিকিৎসার ইতিহাস (চাকুরী প্রার্থী কর্তৃক প্রদত্ত এবং স্বাক্ষরিত)ঃ</p>
      <style>
        table tr{
          line-height: 50px;
        }
      </style>
      <div class="col-md-12">
        <table  collapse="collapse" style="width: 100%;border-spacing: 0 10px;">
          <tr>
            <td></td>
            <td></td>
            <td>হ্যাঁ</td>
            <td>না</td>
            <td></td>
            <td></td>
            <td>হ্যাঁ</td>
            <td>না</td>
          </tr>
          <tr>
            <td>১) মানসিক অসুস্থতা</td>
            <td>:</td>
            <td><span style="border: 1px solid black;padding: 0px 10px"></span> </td>
            <td><span style="border: 1px solid black;padding: 0px 10px"></span> </td>
            <td>১০) হৃদরোগ</td>
            <td>:</td>
            <td><span style="border: 1px solid black;padding: 0px 10px"></span> </td>
            <td><span style="border: 1px solid black;padding: 0px 10px"></span> </td>
          </tr>
          <tr>
            <td>২) মৃগি রোগ</td>
            <td>:</td>
            <td><span style="border: 1px solid black;padding: 0px 10px"></span> </td>
            <td><span style="border: 1px solid black;padding: 0px 10px"></span> </td>
            <td>১১) ম্যালেরিয়া</td>
            <td>:</td>
            <td><span style="border: 1px solid black;padding: 0px 10px"></span> </td>
            <td><span style="border: 1px solid black;padding: 0px 10px"></span> </td>
          </tr>
          <tr>
            <td>৩) হাঁপানি</td>
            <td>:</td>
            <td><span style="border: 1px solid black;padding: 0px 10px"></span> </td>
            <td><span style="border: 1px solid black;padding: 0px 10px"></span> </td>
            <td>১২) অস্ত্রোপচার</td>
            <td>:</td>
            <td><span style="border: 1px solid black;padding: 0px 10px"></span> </td>
            <td><span style="border: 1px solid black;padding: 0px 10px"></span> </td>
          </tr>
          <tr>
            <td>৪) ডায়াবেটিক</td>
            <td>:</td>
            <td><span style="border: 1px solid black;padding: 0px 10px"></span> </td>
            <td><span style="border: 1px solid black;padding: 0px 10px"></span> </td>
            <td>১৩) যক্ষা</td>
            <td>:</td>
            <td><span style="border: 1px solid black;padding: 0px 10px"></span> </td>
            <td><span style="border: 1px solid black;padding: 0px 10px"></span> </td>
          </tr>
          <tr>
            <td>৫) হাইপারটেনসন</td>
            <td>:</td>
            <td><span style="border: 1px solid black;padding: 0px 10px"></span> </td>
            <td><span style="border: 1px solid black;padding: 0px 10px"></span> </td>
            <td>১৪) বর্ণান্ধতা</td>
            <td>:</td>
            <td><span style="border: 1px solid black;padding: 0px 10px"></span> </td>
            <td><span style="border: 1px solid black;padding: 0px 10px"></span> </td>
          </tr>
          <tr>
            <td>৬) চর্ম/ ছোঁয়াচে রোগ</td>
            <td>:</td>
            <td><span style="border: 1px solid black;padding: 0px 10px"></span> </td>
            <td><span style="border: 1px solid black;padding: 0px 10px"></span> </td>
            <td>১৫) দৃষ্টি অক্ষমতা</td>
            <td>:</td>
            <td><span style="border: 1px solid black;padding: 0px 10px"></span> </td>
            <td><span style="border: 1px solid black;padding: 0px 10px"></span> </td>
          </tr>
          <tr>
            <td>৭) মুখমন্ডলের রোগ</td>
            <td>:</td>
            <td><span style="border: 1px solid black;padding: 0px 10px"></span> </td>
            <td><span style="border: 1px solid black;padding: 0px 10px"></span> </td>
            <td style="width: 240px;">১৬) শ্রবনজনিত সমস্যা</td>
            <td>:</td>
            <td><span style="border: 1px solid black;padding: 0px 10px"></span> </td>
            <td><span style="border: 1px solid black;padding: 0px 10px"></span> </td>
          </tr>
          <tr>
            <td>৮) মাইগ্রেন</td>
            <td>:</td>
            <td><span style="border: 1px solid black;padding: 0px 10px"></span> </td>
            <td><span style="border: 1px solid black;padding: 0px 10px"></span> </td>
            <td>১৭) কণ্ঠনালীর সমস্যা</td>
            <td>:</td>
            <td><span style="border: 1px solid black;padding: 0px 10px"></span> </td>
            <td><span style="border: 1px solid black;padding: 0px 10px"></span> </td>
          </tr>
          <tr>
            <td style="width: 240px;">৯) এলার্জি জনিত রোগ</td>
            <td>:</td>
            <td><span style="border: 1px solid black;padding: 0px 10px"></span> </td>
            <td><span style="border: 1px solid black;padding: 0px 10px"></span> </td>
            <td>১৮) অন্যান্য (যদি থাকে)</td>
            <td>:</td>
            <td><span style="border: 1px solid black;padding: 0px 10px"></span> </td>
            <td><span style="border: 1px solid black;padding: 0px 10px"></span> </td>
          </tr>
        </table>
      </div>


      <p>আমি এই মর্মে ঘোষনা করতেছি যে, আমার প্রদত্ত উপরোক্ত তথ্যাবলী সত্য ও সঠিক। আমি স্বজ্ঞানে, স্বেচ্ছায়, জেনে, বুঝে, আমার চিকিৎসাজনিত প্রতিবেদন তৈরির জন্য অত্র কোম্পানী কর্তৃক নিয়োজিত সংশ্লিষ্ট চিকিৎসককে অনুমতি দিলাম। কোম্পানীর ব্যবস্থাপক ও উর্ধ্বতন কর্তৃপক্ষ এই প্রতিবেদন দেখতে পারবেন।</p>
      <p>
        প্রার্থীর স্বাক্ষর প্রার্থীর টিপসহি
      </p>

      <p> চিকিৎসকের ছাড়পত্র:</p>
      <p>আমি এই মর্মে প্রত্যয়ন করতেছি যে, আমি উপরোক্ত চাকুরি প্রার্থীর ডাক্তারী পরীক্ষা করেছি এবং উক্ত চাকুরী প্রার্থী কাজের
        পরিধি ও গুরুত্ব বিবেচনায় আবেদিত পদে চাকুরী করার জন্য শারীরিক ও মানসিকভাবে সক্ষম।
      </p>

      <p>মেডিকেল অফিসারের নাম মেডিকেল অফিসারের স্বাক্ষর ও তারিখ</p>

      </div> 
    </div>
    <!-- doctor appoinment -->


    <!-- employee test  -->
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div style="display: flex; justify-content: center">
            <div style="width: 80px;height:80px">
              <img src="target_logo.jpg" style="height: 70px;margin-top: 0px;"/>
            </div>
            <div style="width: 540px">
              <h3 style="font-weight: bold; margin-top: 10px;position: absolute;">টার্গেট ফাইন-নীট ইন্ডাস্ট্রিজ লিমিটেড</h3><br>
              <p style="margin-top: 20px;position: absolute;">গ্রামঃ বাঁশহাটি, ডাকঘরঃ খামারগাঁও, উপজেলাঃ নান্দাইল, জেলাঃ ময়মনসিংহ</p><br><br>
            </div>
          </div>
        </div>
        <p style="width: 100%;font-weight: bold;    line-height: 0px;"><span style="float:right !important;font-size: 13px;"><i>Virson-1:2020 | Ref: HR/01/002</i></span></p> 
      </div>

      <div class="row border border-dark">

      <p class="bg-dark text-white w-100 text-center">শ্রমিক নিয়োগের প্রাথমিক যাচাইকরণ পত্র</p>
      <p><span>তারিখঃ</span> <span></span></p> <br>

      <!-- <div class="col-md-12"> -->
      <table border="1" collupse="collupse" style="width: 100%;">
        <tr>
          <td colspan="1">১) প্রার্থীর নামঃ</td>
          <td colspan="3"><?php echo $row->bangla_nam?></td>
        </tr>
        <tr>
          <td colspan="1">২) পিতার নামঃ</td>
          <td colspan="3"><?php echo $row->emp_fname?></td>
        </tr>
        
        <tr>
          <td colspan="1">৩) মাতার নামঃ</td>
          <td colspan="3"><?php echo $row->emp_mname?></td>
        </tr>
        
        <tr>
          <td colspan="1">৪) স্বামী/স্ত্রীর নামঃ</td>
          <td colspan="3"><?php echo $row->emp_fname?></td>
        </tr>

        
        <tr>
          <td colspan="1">(৫) বর্তমান ঠিকানা, প্রযন্তে-</td>
          <td colspan="3"></td>
        </tr>
        
        <tr>
          <td>গ্রামঃ</td>
          <td><?php echo $row->pre_vill?></td>
          <td>ডাকঘরঃ</td>
          <td><?php echo $row->pre_post?></td>
        </tr>
        
        <tr>
          <td>থানাঃ</td>
          <td><?php echo $row->pre_upa?></td>
          <td>জেলাঃ</td>
          <td><?php echo $row->pre_dist?></td>
        </tr>
        
        <tr>
          <td style="    width: 206px;">৬) আবেদনকৃত পদের নামঃ</td>
          <td><?php echo $row->desig_name?></td>
          <td  style="    width: 120px;">সেকশন/বিভাগঃ</td>
          <td><?php echo $row->sec_name?></td>
        </tr>
      </table>
      <!-- </div> -->
      <br>
      <p class="mt-5">ব্যক্তিগত তথ্যাবলী নিম্নরূপঃ</p>
      <p class="w-100">(১) এই কারখানায় আপনার কেউ পরিচিত আছে কি-না? হ্যাঁ/না (টিক চিহ্ন দিন) হ্যাঁ হলে</p>
      <table border="1" collupse="collupse" style="width: 100%;">
        <tr>
          <tr>
            <td style="border-left: none !important;">নাম</td>
            <td>পদবী</td>
            <td>সেকশন/বিভাগ</td>
            <td style="border-right: none;">মোবাইল নং</td>
          </tr>
          <tr>
            <td style="border-left: none !important;">name</td>
            <td>designation</td>
            <td>section</td>
            <td style="border-right: none;">mobile</td>
          </tr>
        </tr>
      </table>
      <table style="width: 100%; border-collapse: collapse;" class="mt-3">
        <tr>
          <td>২) তার আচার আচরণ ভাল কি-না?</td>
          <td style="padding: 0px 10px; border: 1px solid black;"></td>
          <td class="pl-3">হ্যাঁ</td>
          <td style="padding: 0px 10px; border: 1px solid black;"></td>
          <td class="pl-3">না</td>
        </tr>
        <tr>
          <td colspan="5" style="padding-bottom: 20px;"></td>
        </tr>
        <tr>
          <td>৩) তিনি রাষ্ট্র বিরোধী বা রাষ্ট্রদ্রোহী কোন কার্যকলাপের সহিত জড়িত কি-না?</td>
          <td style="padding: 0px 10px; border: 1px solid black;"></td>
          <td class="pl-3">হ্যাঁ</td>
          <td style="padding: 0px 10px; border: 1px solid black;"></td>
          <td class="pl-3">না</td>
        </tr>
        <tr>
          <td colspan="5" style="padding-bottom: 20px;"></td>
        </tr>
        <tr>
          <td>৪) তাহার বিরুদ্ধে কোন ফৌজদারী মামলা আছে কি-না?</td>
          <td style="padding: 0px 10px; border: 1px solid black;"></td>
          <td class="pl-3">হ্যাঁ</td>
          <td style="padding: 0px 10px; border: 1px solid black;"></td>
          <td class="pl-3">না</td>
        </tr>
        <tr>
          <td colspan="5" style="padding-bottom: 20px;"></td>
        </tr>
        <tr>
          <td>৫) তাহার পরিবারের বিরুদ্ধে কোন ফৌজদারী মামলা আছে কি-না?</td>
          <td style="padding: 0px 10px; border: 1px solid black;"></td>
          <td class="pl-3">হ্যাঁ</td>
          <td style="padding: 0px 10px; border: 1px solid black;"></td>
          <td class="pl-3">না</td>
        </tr>
        <tr>
          <td colspan="5" style="padding-bottom: 20px;"></td>
        </tr>
        <tr>
          <td>৬) তিনি অবাঞ্চিত রাজনৈতিক কার্যকলাপ অথবা সাম্প্রদায়িক তৎপরতার জন্য আটক ছিলেন কি-না?</td>
          <td style="padding: 0px 10px; border: 1px solid black;"></td>
          <td class="pl-3">হ্যাঁ</td>
          <td style="padding: 0px 10px; border: 1px solid black;"></td>
          <td class="pl-3">না</td>
        </tr>
        <tr>
          <td colspan="5" style="padding-bottom: 20px;"></td>
        </tr>
        <tr>
          <td>৭) তিনি কখনো বোমায় কিংবা অপঘাতে আক্রান্ত হয়েছেন কি-না?</td>
          <td style="padding: 0px 10px; border: 1px solid black;"></td>
          <td class="pl-3">হ্যাঁ</td>
          <td style="padding: 0px 10px; border: 1px solid black;"></td>
          <td class="pl-3">না</td>
        </tr>
        <tr>
          <td colspan="5" style="padding-bottom: 20px;"></td>
        </tr>
        <tr>
          <td>৮) তাহার পরিবারের কেউ কোন সন্ত্রাসী কাজে কিংবা সন্ত্রাসী সংগঠনের সাথে জড়িত ছিল কি-না?</td>
          <td style="padding: 0px 10px; border: 1px solid black;"></td>
          <td class="pl-3">হ্যাঁ</td>
          <td style="padding: 0px 10px; border: 1px solid black;"></td>
          <td class="pl-3">না</td>
        </tr>
        <tr>
          <td colspan="5" style="padding-bottom: 20px;"></td>
        </tr>
        <tr>
          <td>৯) তিনি শৃংঙ্খলা বিরোধী কাজের জন্য কখনো কোন প্রকার শাস্তি পেয়েছেন কি-না?</td>
          <td style="padding: 0px 10px; border: 1px solid black;"></td>
          <td class="pl-3">হ্যাঁ</td>
          <td style="padding: 0px 10px; border: 1px solid black;"></td>
          <td class="pl-3">না</td>
        </tr>
        <tr>
          <td colspan="5" style="padding-bottom: 20px;"></td>
        </tr>
        <tr>
          <td>১০) তিনি কোন জঙ্গী সংগঠন থেকে অস্ত্র চালনায় প্রশিক্ষণ পেয়েছেন কি-না?</td>
          <td style="padding: 0px 10px; border: 1px solid black;"></td>
          <td class="pl-3">হ্যাঁ</td>
          <td style="padding: 0px 10px; border: 1px solid black;"></td>
          <td class="pl-3">না</td>
        </tr>
      </table>

      <br><br>
      <p style="width: 100%; border: 1px solid black;margin-top:100px;padding: 40px ;border-left: none !important;border-right: none;">বিঃ দ্রঃ যদি কোন ধরনের সন্ত্রাসী কার্যকলাপের উত্তর হ্যাঁ বোধক হয়, তাহলে নিম্নে তা বিস্তারিত ভাবে লিখুন।</p>

      </div> 
    </div>
    <div style="page-break-after: always;"></div>
    <div class="container" style="border: 1px solid black;">
        <div class="row">
                <table border="1" collupse="collapse" style="width: 100%;">
            <tr>
            <td colspan="1" style="width: 340px;">পূর্ব অভিজ্ঞতা যদি থাকে, হ্যাঁ/না (টিক চিহ্ন দিন)</td>
            <td colspan="4"></td>

            </tr>
            <tr>
            <td colspan="1">৭) পূর্ববর্তী প্রতিষ্ঠানের নাম:</td>
            <td colspan="4"></td>

            </tr>
            <tr>
            <td colspan="1">৮) পদবী:</td>
            <td colspan="4"></td>

            </tr>
            <tr>
            <td colspan="1">৯) শিক্ষাগত যোগ্যতা:</td>
            <td colspan="4"></td>

            </tr>
            <tr>
            <td colspan="1">১০) বৈবাহিক অবস্থা:</td>
            <td colspan="4">বিবাহিত / অবিবাহিত। বিপত্রিক/ বিধবা (টিক চিহ্ন দিন)</td>
            </tr>
            <tr>
            <td colspan="1">১১) সন্তান সংখ্যা:</td>
            <td colspan="1" style="width:80px;">ছেলে</td>
            <td colspan="1"></td>
            <td colspan="1" style="width:80px;">মেয়ে</td>
            <td colspan="1"></td>
            </tr>

        </table> </div>
        <br><br>
        <div class="row">
            <table border="1" collupse="collapse" style="width: 100%;;" >
            <tr>
            <th>ক্রঃনং</th>
            <th>প্রয়োজনীয় সনদপত্র সমূহের বিবরণ</th>
            <th>আছে</th>
            <th>নাই</th>
            <th>প্রযোজ্য নয়</th>
            </tr>
            <tr>
            <td>১</td>
            <td>জাতীয় পরিচয় পত্র</td>
            <td></td>
            <td></td>
            <td></td>
            </tr>
            <tr>
            <td>২</td>
            <td>ওয়ার্ড কমিশনার। ইউনিয়ন পরিষদের চেয়ারম্যানকর্তৃক প্রদত্ত সনদপত্র</td>
            <td></td>
            <td></td>
            <td></td>
            </tr>
            <tr>
            <td>৩</td>
            <td>জন্ম নিবন্ধনের সনদপত্র</td>
            <td></td>
            <td></td>
            <td></td>
            </tr>
            <tr>
            <td>৪</td>
            <td>শিক্ষাগত যোগ্যতার সনদপত্র</td>
            <td></td>
            <td></td>
            <td></td>
            </tr>
            <tr>
            <td>৫</td>
            <td>পূর্ব অভিজ্ঞাতার সনদপত্র (যদি থাকে)</td>
            <td></td>
            <td></td>
            <td></td> 
            </tr>
            <tr>
            <td>৬</td>
            <td>পূর্ববর্তী কারখানার সার্ভিসবুক / আইডি কার্ড/ হাজিরা কার্ড। নিয়োগপত্র (যদি থাকে)</td>
            <td></td>
            <td></td>
            <td></td>
            </tr>
            <tr>
            <td>৭</td>
            <td>৫ কপি পাসপোর্ট সাইজের ছবি ও ২ কপি স্ট্যাম্প সাইজ ছবি</td>
            <td></td>
            <td></td>
            <td></td>
            </tr>
            <tr>
            <td>৮</td>
            <td>৫ কপি নমিনি/মনোনীত ব্যক্তির ছবি</td>
            <td></td>
            <td></td>
            <td></td>
            </tr>
        </table>
        </div>

        <div class="row">
        <p>রেফারেন্সকারী (কারখানায় কর্মরত) আছে। নাই (টিক চিহ্ন দিন):</p>

        <table border="1" collapse="collapse" style="width: 100%;">
            <tr>
            <th>নাম</th>
            <th>পদবী</th>
            <th>মোবাইল নং</th>
            <th>স্বাক্ষর</th>
            <th>নির্বাহী/মানব সম্পদ কর্মকর্তা</th>
            <th>ব্যবস্থাপক</th>
            <th>(প্রশাসন, মানব সম্পদ ও কম্প্লায়েন্স)</th>
            </tr>
            <tr >
            <td>naem</td>
            <td>des</td>
            <td>mobile</td>
            <td>sigature</td>
            <td>nirbahi</td>
            <td>besss</td>
            <td>besss</td>
            </tr>
        </table>
        </div>

        <br><br><br>
        <div class="row d-flex justify-content-between" >
        <p style="border-top:1px solid #000 ;">নির্বাহী/মানব সম্পদ কর্মকর্তা</p>
        <p style="border-top:1px solid #000 ;text-align: center;">ব্যবস্থাপক <br>(প্রশাসন, মানব সম্পদ ও কম্প্লায়েন্স)</p>


        </div>

    </div>
    <!-- employee test  -->





    <!-- year -->
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div style="display: flex; justify-content: center">
            <div style="width: 80px;height:80px">
              <img src="target_logo.jpg" style="height: 70px;margin-top: 0px;"/>
            </div>
            <div style="width: 540px">
              <h3 style="font-weight: bold; margin-top: 10px;position: absolute;">টার্গেট ফাইন-নীট ইন্ডাস্ট্রিজ লিমিটেড</h3><br>
              <p style="margin-top: 20px;position: absolute;">গ্রামঃ বাঁশহাটি, ডাকঘরঃ খামারগাঁও, উপজেলাঃ নান্দাইল, জেলাঃ ময়মনসিংহ</p>
              <br><br>
            </div>
          </div>
        </div>
        <p style="width: 100%;font-weight: bold;    line-height: 0px;" class="d-flex justify-content-between">
          <span>ফরম-১৫ (ধারা ৩৪, ৩৬, ৩৭, ও ২৭৭ এবং বিধি ৩৪ (১) ও ৩৩৬ (৪) দ্রষ্টব্য)</span>
          <span style="float:right !important;font-size: 13px;"><i>Virson-1:2020 | Ref: HR/01/005</i></span>
        </p> 
      </div>

      <div class="row" style="border: 1px solid black;">
        <p class="bg-dark text-white w-100 text-center">বয়স ও সক্ষমতার প্রত্যয়নপত্র</p>
        <p style="float:right !important;width: 100%; " class="text-right">
          <span style="border: 1px solid black;">তারিখঃ</span><span style="border: 1px solid black;padding: 0px 80px;"></span>
        </p>

        <table border="1" width="100%;" >
          <tr>
            <td colspan="1">নামঃ</td>
            <td colspan="5"><?php echo $row->bangla_nam?></td>
            <td colspan="1" rowspan="7"></td>
          </tr>
          <tr>
            <td colspan="1" style="width: 146px;">পিতা/স্বামী/স্ত্রীর নাম:</td>
            <td colspan="6"><?php echo $row->emp_fname?></td>

          </tr>
          <tr>
            <td colspan="1">মাতার নাম:</td>
            <td colspan="6"><?php echo $row->emp_mname?></td>
          </tr>
          <tr>
            <td colspan="1">লিঙ্গঃ</td>
            <td colspan="1" style="width: 50px;">পুরুষঃ</td>
            <td colspan="1"></td>
            <td colspan="1">নারী</td>
            <td colspan="2"></td>
          </tr>
          <tr>
            <td colspan="6">স্থায়ী ঠিকানা-</td>

          </tr>
          <tr>
            <td colspan="1">গ্রামঃ</td>
            <td colspan="2"><?php echo $row->per_vill?></td>
            <td colspan="1" style="width: 50px;">ডাকঘরঃ</td>
            <td colspan="2"><?php echo $row->per_post?></td>
          </tr>
          <tr>
            <td colspan="1">থানাঃ</td>
            <td colspan="2"><?php echo $row->per_upa?></td>
            <td colspan="1">জেলাঃ</td>
            <td colspan="2"><?php echo $row->per_dist?></td>
          </tr>
        </table>

        <table>
          <tr>

          </tr>
        </table>
        <br><br>
        <table border="1" collapse="collapse" width="100%;margin-top:30px">
          <tr>
            <td>অস্থায়ী/ বর্তমান বা যোগাযোগের ঠিকানা, নাম-</td>
            <td></td>
          </tr>
          <tr>
            <td>গ্রামঃ </td>
            <td><?php echo $row->pre_vill?></td>
            <td>ডাকঘরঃ</td>
            <td><?php echo $row->pre_post?></td>
          </tr>
          <tr>
            <td>থানাঃ</td>
            <td><?php echo $row->pre_upa?></td>
            <td>জেলাঃ</td>
            <td><?php echo $row->pre_dist?></td>
          </tr>
          <tr>
            <td>জন্ম সনদ/ শিক্ষা সনদ অনুসারে বয়স/জন্ম তারিখ:</td>
            <td></td>
          </tr>
          <tr>
            <td>দৈহিক সক্ষমতা:</td>
            <td></td>
          </tr>
          <tr>
            <td>সনাক্তকরণ চিহ্ন:</td>
            <td></td>
          </tr>
          <tr>
            <td>উচ্চতা:</td>
            <td></td>
            <td>ওজন</td>
            <td></td>
          </tr>
        </table>

        <p>আমি এই মর্মে প্রত্যয়ন করিতেছি যে, উপরোক্ত তথ্য সম্বলিত ব্যক্তি কে আমি পরীক্ষা করিয়াছি।</p>

        <p>তিনি এই প্রতিষ্ঠানে নিযুক্ত হইতে ইচ্ছুক এবং আমার পরীক্ষা হইতে এইরূপ পাওয়া গিয়াছে যে তাহার বয়স বৎসর এবং তিনি প্রষ্ঠিানে প্রাপ্ত বয়স্ক হিসাবে নিযুক্ত হইবার যোগ্য।</p>

        <div style="display: flex; justify-content: space-between; width: 100%">
          <p style="border-top:1px solid black ">সংশ্লিষ্ট ব্যক্তির স্বাক্ষর ও টিপসহি</p>
          <p style="border-top:1px solid black ">রেজিষ্টার্ড চিকিৎসকের স্বাক্ষর</p>
        </div>


      </div>


    </div>
    <!-- year -->
    
  </body>
</html>








