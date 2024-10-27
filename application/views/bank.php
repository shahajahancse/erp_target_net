<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<title>Bank Pay Sheet</title>

</head>
<body>
 <div class='container'>

   <div class="text-center">
        <h4>Target Fine Kint Ind Ltd.</h3>
        <p>Bashati, Khamargao, Nandail, Mymensingh.</p>
      </div>
  <!-- < ?php dd($values);?> -->




    


      <table border="1" collapse="collapse" width="100%">
        <tr>
            <td style='text-align:center'>SL. NO.</td>
            <td style='text-align:center'>ID No.</td>
            <td style='text-align:center'>Account Number</td>
            <td style='text-align:center'>Name Of Employee</td>
            <td style='text-align:center'>Designaion</td>
            <td style='text-align:center'>Section</td>
            <td style='text-align:center'>Total Amount</td>
            <td style='text-align:center'>Remark</td>
        </tr>
        <?php
        $i = 0;
        foreach($values as $row){ $i++;?>	
        <tr>
      
            <td style='text-align:center'><?php echo $i++?></td>
            <td style='text-align:center'><?php echo $row->emp_id?></td>
            <td style='text-align:center'><?php echo $row->account?></td>
            <td style='text-align:center'><?php echo $row->emp_full_name?></td>
            <td style='text-align:center'><?php echo $row->desig_name?></td>
            <td style='text-align:center'><?php echo $row->sec_name?></td>
            <td style='text-align:center'><?php echo $row->net_pay?></td>
            <td style='text-align:center'><?php echo ''?></td>
        </tr>
        
    <?php 
        if($i%25 == 0){?>
        <div style="page-break-after: always;"></div>

        <?php }


        }?>
      </table>

    <div class="pull-right text-right mt-5" >
        <p  style="border-top: 1px solid black;width:fit-content;float:right;margin-right:10px"></p>
    </div>
  </div>




 </div>

</body>
</html>