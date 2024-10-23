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
    <title>Staff Appointment Letter</title>
  </head>
  <body>
    <?php foreach($values as $row){?>

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
                <p class="font-weight-bold border border-dark bg-dark text-white"> নিয়োগ পত্র <span class="border-left border-light text-dark w-25"> </span> </p>
            <p>Version-<i>1:2020 / Ref:HR/01/006</i></p>
            </div>
            <div class="d-flex justify-content-between">
                <p class="">সূত্রঃ</p>
                <div class="d-flex justify-content-end">
                    <p class="col-8 border text-right border-dark">তারিখঃ</p>
                    <p class="col-10 text-center border border-dark"><?php echo date('d/m/Y');?></p>
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
                    নিয়োগের কার্যকারিতাঃ আপনার আবেদন ও সাক্ষাতের প্রেক্ষিতে আপনাকে <span><?php  echo $row->emp_join_date?></span>
                    তারিখ হইতে <span><?php  echo $row->desig_name?></span> পদে গ্রেডে নিয়োগ প্রদান করা হলো। কাজের ধরণঃ <span><?php  echo $row->work_type ==1?' ফিক্সড ':' প্রোডাকশন '?></span> এবং কর্মচারী শ্রেণী  <span><?php  echo $row->sec_name?></span>। আপনার নিয়োগ পরবর্তী ছয় (০৬) মাস শিক্ষানবীশকাল হিসেবে গণ্য হবে। যদি উল্লেখিত সময়ের মধ্যে (দক্ষ কর্মচারীর ক্ষেত্রে) যোগ্যতার মান নির্ণয় করা সম্ভব না হয়, তাহলে আপনার শিক্ষানবীশকাল আরও ০৩ (তিন) মাস বৃদ্ধি করা যেতে পারে। নির্ধারিত সময়ের পরে আপনাকে স্থায়ী করণের চিঠি প্রদান করা না হলে নিয়ম মাফিক আপনি স্থায়ী কর্মচারী হিসাবে গন্য হবেন।
                </li>
                <li>মজুরী: পরবর্তী মজুরী বৃদ্ধি না করা পর্যন্ত আপনাকে নিম্নোক্ত হারে মজুরী দেওয়া হইবে।</li>
                <?php 
                $basic = round(($row->gross_sal - 2450) / 1.4);
                $house_rent  = round($basic * 40 / 100);
                
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
                    <td><?php echo $row->gross_sal?> টাকা ( কথায়: <?php echo $obj->numToWord($row->gross_sal); ?>)</td>
                    </tr>
                </table>
            <li>
                মজুরী ও পাওনাদী প্রদানের তারিখঃ প্রত্যেক শ্রমিক/কর্মচারী কে চলতি মাসের সকল পাওনাদী পরবর্তী মাসের ০৭ (সাত) কর্ম দিবসের মধ্যে প্রদান করা হবে।
                <ul>
                    <li style="list-style-type:disc">সাধারণ কর্মঘন্টাঃ সকাল ৮:০০ টা থেকে বিকেল ৫:০০ টা পর্যন্ত। তবে কারখানার প্রয়োজনে অতিরিক্ত হিসাবে আপনাকে বিকেল ৫.০০ টার পর আরও অধিক অফিসিয়াল কাজ করতে হতে পারে।</li>
                    <li style="list-style-type:disc">অধিকাল কাজের জন্য আপনাকে অতিরিক্ত কোন ভাতা প্রদান করা হবে না।</li>
                    <li style="list-style-type:disc">চাকুরীর বয়স ১ বৎসর পূর্ণ হলে শ্রম আইন অনুযায়ী মূল মজুরীর ৫% হারে বাৎসরিক ভিত্তিতে মজুরী বৃদ্ধি পাইবে।</li>
                </ul>
            </li>
            <li>ছুটি ও বন্ধঃ সকল কর্মকর্তা/কর্মচারী কে সপ্তাহে পূর্ণ ০১ (এক) দিন ছুটি দেওয়া হবে। এছাড়াও কর্মকর্তা/কর্মচারীগন নিম্নলিখিত হারে ছুটি পাবেনঃ
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

            <li> বিশ্রাম ও আহারের জন্য বিরতি: প্রত্যেক শ্রমিক/কর্মচারী প্রতি কর্ম দিবসে বিশ্রাম ও আহারের জন্য ০১ (এক) ঘন্টা সময় পাবেন।</li>
            <li> অন্যান্য সুবিধাঃ 
                <ul>
                    <li style="list-style-type: disc;">ঈদ/বোনাসঃ চাকুরীর বয়স ০১ বৎসর পূর্ন হলে বাংলাদেশ শ্রম আইন অনুযায়ী বৎসরে দুই ঈদে দুইটি উৎসব বোনাস দেওয়া হয়।</li>
                    <li style="list-style-type: disc;">মেডিকেল সুবিধাঃ কারখানার নির্ধারিত ডাক্তার ও নার্স কর্তৃক চিকিৎসা সুবিধা দেওয়া হয়।</li>
                </ul>
            </li>
            </ol>
            </div>
        </div> 
        <p class="text-right">Appoinment Letter (TOFSIL-K) | HR/01/006</p>
        </div>
        <div style="page-break-after: always;"></div>

        <div class="container border border-dark">
        <ol start="7">
            <li  class="text-justify"> হাজিরা রেকর্ড ও আইডি কার্ডঃ আপনার হাজিরা এবং ওভারটাইম রেকর্ড করার জন্য আপনাকে হাজিরা কার্ড ও রেজিয়ার অথবা ইলেকট্রনিক ফিদার ইমপ্রেশন সিস্টেম প্রদান করা হবে। ফ্যাক্টরীতে প্রবেশ ও বাহির হবার সময় ফিদার ইমপ্রেশন দিতে হবে। এই মেশিন স্বয়ংক্রিয়ভাবে আপনার হাজিরা এবং ওভারটাইম রেকর্ড নিয়ন্ত্রন করবে।</li>
            <li> নিরাপত্তা বিধিমালাঃ আপনাকে কোম্পানীর নিরাপত্তা বিধিমালা সম্পূর্ণ মেনে চলতে হবে।</li>
            <li> বদলীঃ কর্তৃপক্ষ প্রয়োজনে আপনার সকলশর্ত সঠিক রেখে কোম্পানীর অন্যান্য ফ্যাক্টরীতে বা একই প্রতিষ্ঠানের অন্য কোন বিভাগে অথবা শিফটে বদলী করতে পারবে।</li>
            <li class="text-justify"> গোপনীয়তাঃ অত্র প্রতিষ্ঠানে কর্মরত থাকা অবস্থায় আপ্রনি অন্য কোন প্রতিষ্ঠানে প্রত্যক্ষ বা পরোক্ষভাবে কোন চাকুরী করতে পারবেন না। এছাড়াও আপনি অত্র প্রতিষ্ঠানের ব্যবসাসংক্রান্ত কোন গোপন তথ্যাদী কোন ব্যক্তি বা প্রতিষ্ঠানের নিকট প্রকাশ করতে পারবেন না। চাকুরী শেষে আপনার অধীনে থাকা কোম্পানীর কোন কাগজপত্র বা অন্য কোন জিনিস যেমন-আইডিকার্ড, ইউনিফর্ম ইত্যাদী থাকলে সে সকল জিনিস ফেরত দিবেন।</li>
            <li> পিপিই ব্যবহারঃ কর্মক্ষেত্রে (প্রযোজ্য ক্ষেত্রে) সকল প্রকার "পিপিই” (ব্যক্তিগত সুরক্ষাসামগ্রী) ব্যবহার করে কাজ করা সকল শ্রমিক। কর্মচারীর জন্য বাধ্যতামূলক।</li>
            <li class="text-justify"> শ্রমিক/কর্মচারীদ্বারা চাকুরী পরিসমাপ্তিঃ ধারা ২৭ এর বিধান সাপেক্ষে, যদি কোন স্থায়ী শ্রমিক/কর্মচারী চাকুরী হতে ইস্তফা দিতে চান তবে তিনি মালিকা ব্যবস্থাপনা কর্তৃপক্ষ কে ৬০ দিনের (২ মাসের) লিখিত নোটিশ প্রদান করবেন। যদি তিনি কোন নোটিশ না দিয়ে চাকুরী হতে ইস্বফা দিতে চান ভবে তাকে নোটিশ মেয়াদ হিসাবে ৬০ দিনের (২ মাসের) মূলমজুরীর বা সমপরিমান অর্থ মালিককে প্রদান করতে হবে।
            (মাসিক বেতন হারে শ্রমিকদের ক্ষেত্রে) এবং অস্থায়ী শ্রমিকের ক্ষেত্রে (১ মাসের) নোটিশ প্রদান করে চাকুরী হতে ইস্তফা প্রদান করবেন।</li>

            <li>মালিকদ্বারা চাকুরী সমাপ্তি। সাধারনত শ্রম আইন অনুযায়ী হয়ে থাকে। কর্তৃপক্ষ কোন স্থায়ী শ্রমিক/কর্মচারীর চাকুরী অবসান করতে চাইলে শ্রম আইন ২০০৬ অনুযায়ী অগ্রিম ১২০ (একশতবিশ) দিনের নোটিশ প্রদান অথবা নোটিশের পরিবর্তে ১২০ (একশতবিশ) দিনের মূলমজুরী প্রদান করা হবে।</li>
            <li>অসদাচরণঃ অসদাচরণের জন্য অপরাধ প্রমানিত হলে বাংলাদেশ শ্রম আইন মোতাবেক প্রতিষ্ঠানের কর্তৃপক্ষ কর্তৃক তার বিরুদ্ধে প্রয়োজনীয় শাস্তিমূলক ব্যবস্থা গ্রহন করা হবে।</li>
            <li>ডিসচার্জঃ দীর্ঘকালীন অসুস্থতা অথবা মানসিক বা দৈহিকভাবে অক্ষম হলে যদি রেজিঃ ডাক্তার কর্তৃক প্রত্যায়িত হয় তবে তাকে ডিসচার্জ করা হবে।</li>
            <li>অবসর গ্রহনঃ কোন শ্রমিকের বয়স ৬০ (ষাট) বৎসরপূর্ণ হইলে তিনি চাকুরী হতে স্বাভাবিক অবসর গ্রহন করতে পারবেন।</li>
            <li>নীতিমালাঃ বাংলাদেশ শ্রম আইনের আলোকে অত্র কোম্পানীর প্রণীত নিয়ম বা নীতিমালার ভিত্তিতে আপনার চাকুরী পরিচালিত হবে।</li>
            <li class="text-justify">মাদক দ্রব্যঃ কারখানার অভ্যন্তরে কোন প্রকার অস্ত্র, বিস্ফোরক, মাদক দ্রব্য যেমন-ইয়াবা, ফেনসিডিল, মারিজুয়ানা, কোকেন, আফিম, মদ, সিগারেট ইত্যাদি জাতীয় পণ্য নিয়ে প্রবেশ করা-স্তাকিনা বা এই জাতীয় পণ্য কারো সাথে লেনদেন করা যাবে না। যদি কেহ এই জাতীয় পণ্য নিয়ে কারখানার অভ্যন্তরে প্রবেশ করে সেক্ষেত্রে কর্তৃপক্ষ কর্তৃক যে কোন আইনানুগ শাস্তি গ্রহণ করা হবে।</li>
        </ol>
        <p class="bg-dark text-white border border-dark">প্রত্যয়ন</p>
        <p class="text-justify"> আমি নিম্ন স্বাক্ষর কারী <span style='padding: 0px 10px;border: 1px solid black'><?php echo $row->bangla_nam?></span> এই নিয়োগ ও চুক্তিপত্রে উল্লেখিত সকলবিধি, নিয়ম-কানুন ও শর্তাবলী সম্পূর্ণ রূপে অবগত হয়ে, বুঝে, মেনে কোন প্রকার জোর-জবরদস্তি ছাড়া, স্বেচ্ছায়-স্বজ্ঞানে ও ব্যক্তিগত সুরক্ষা সামগ্রী বুঝে পেয়ে এই নিয়োগ পত্রে স্বাক্ষর করলাম এবং এর একটি কঞ্জি বুঝে পেলাম।</p>
        <div class="d-flex justify-content-between mt-5" style="margin-top:100px !important">
            <p class="border-top border-dark">শ্রমিকের স্বাক্ষর</p>
            <p class="border-top border-dark">কর্তৃপক্ষের স্বাক্ষর</p>
        </div>
            
        </div>
        <div class="container">
        <p class="text-right">Appoinment Letter (TOFSIL-K) | HR/01/006</p>
    </div>

    <?php }?>

  </body>
</html>
