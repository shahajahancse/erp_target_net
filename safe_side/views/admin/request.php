<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="css/dpstyles.css">
<title></title>
</head>

<body>

<?php

//print_r($request);
?>
<div style="background-color:#FFFF66;">
<form action="<?php echo $this->config->site_url(); ?>/admin/users_search" method="post">
Search By ID:<input type="text" name="id" size="30" />
	<input name="Search" type="submit" value="Search" />
</form>
</div>
<table border="0" cellpadding="10">
<tr style="background-color:#D3DCE3; color:#0032F2"><th>User Name</th><th>User ID</th><th>Book ID</th><th>Booking Date</th><th>Late Fee</th><th>Action</th></tr>
<?php
$i =0;
foreach($request as $row)
{
	
	if( $i%2 == 0)
	{
		?>
		<tr style="background-color:#E5E5E5;"> 
		<?php
	}
	else
	{
		?>
		<tr style="background-color:#D5D5D5;"> 
		<?php
	}
	?>
	<td><?php echo $row->name; ?></td>
	<td><?php echo $row->id_number; ?></td>
	<td><?php echo $row->book_id; ?></td>
	<td><?php echo $row->booking_date; ?></td>
	<td><?php echo $row->fine." TK"; ?></td>
	<td style="text-align:center;"> 
	
	<!--<form action="javascript:get(document.getElementById('myform'));" name="myform" id="myform">
	<input type="hidden" id="FirstName" value="<?php //echo $row->user_id; ?>" />
	<input type="hidden" id="LastName" value="<?php //echo $row->book_id; ?>" />
	<input type="Submit" value="Accept" />
	</form>
	<div id="myspan"></div>-->
	
	
	
	
	<?php 
	if($row->status == 1)
	{
		?>
		<form action="" method="post">
		<input type="hidden" name="user_id" value="<?php echo $row->user_id; ?>"  />
		<input type="hidden" name="book_id" value="<?php echo $row->book_id; ?>"  />
		<input type="hidden" name="accept" value="1" />
		<input type="submit" name="accept" value="Accept" />
		</form>
		<?php
	}
	elseif($row->status == 2)
	{
		?>
		<form action="" method="post">
		<input type="hidden" name="user_id" value="<?php echo $row->user_id; ?>"  />
		<input type="hidden" name="book_id" value="<?php echo $row->book_id; ?>"  />
		<input type="hidden" name="Release" value="2" />
		<input type="submit" name="accept" value="Release" />
		</form>
		<?php
	}
	?>
	</td>
	<!--<td>
	<?php //echo $row->status; ?>
	</td>-->
	</tr>
	<?php
	$i++;
}


?>

</table>
<h4 align="center" width="115"><?php //echo $this->pagination->create_links();?></h4>


</body>
</html>


