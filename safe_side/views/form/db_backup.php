<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Personal Info</title>

<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>css/calendar.css" />

<script type="text/javascript" src="<?php echo base_url();?>js/dynamic.js"></script>
<script src="<?php echo base_url(); ?>js/calendar_eu.js" type="text/javascript"></script>


<style type="text/css">
.perinfo td{
padding-left:10px;
font-weight:bold;
}
.perinfo select{
width:265px;
}
</style>

</head>

<body bgcolor="#ECE9D8">
<fieldset style='width:95%;'><legend><font size='+1'><b>Full database backup</b></font></legend>
<a href="<?php echo base_url(); ?>index.php/maintainance_con/database_backup" ><input type="button" name="db_bk" value="Backup" /></a>
</fieldset>
</body>
</html>