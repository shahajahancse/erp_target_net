<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>MSH ERP SYSTEM - Login</title>
</head>

<body bgcolor="#FFFFFF">
<div align="center"> <img src="<?php echo base_url();?>uploads/company_photo/powered.jpg" /> 
<h2 style="color:#FFFFFF;">Mysoftheaven Payroll Systems</h2>
</div>
<div style="width:400px; overflow:hidden; margin:30px auto; background-color:#66FFFF ;">
     <?php  echo form_open('');  ?>
        <table width="380" border="0" align="center" cellpadding="0" cellspacing="5">
          <tr>
            <td>Username :</td>
            <td><input type="text" name="username" value="" /></td>
          </tr>
          <tr>
            <td colspan="2"></td>
          </tr>
          <tr>
            <td>Password :</td>
            <td><input type="password" name="password" value="" /></td>
          </tr>
		  
		  <tr>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td colspan="2"></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><input type="submit" name="login" value="Login" /></td>
          </tr>
        </table>
      </form>
</div>

</body>
</html>