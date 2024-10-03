<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="css/dpstyles.css">
<title></title>
</head>

<body>
<?php //echo $field['user_name']['0'];?>
<div style="background-color:#FFFF66;">
<form action="<?php echo $this->config->site_url(); ?>/admin/users_search" method="post">
Search By ID:<input type="text" name="id" size="30" />
	<input name="Search" type="submit" value="Search" />
</form>
</div>
<h3 style="background-color:#D3DCE3;"><?php echo $message;?></h3>
<table width="728" border="0" cellpadding="10">
<tr style="background-color:#D3DCE3; color:#0032F2"><th width="115">User Name</th>
<th width="119">User ID</th>
<th width="40">Book ID</th>
<th width="94">Booking Date</th>
<th width="94">Realese Date</th>
<th width="30">Fine</th>
<th width="80">Action</th>
</tr>
<?php if(!empty($field['user_id'])){
		if(sizeof($field['user_id'])>0){
				for($i=0; $i<sizeof($field['user_id']);$i++){
?>

	<tr style="background-color:#D5D5D5;"> 
	<td><?php echo $field['user_name'][$i]; ?></td>
	<td><?php echo $field['user_id'][$i]; ?></td>
	<td><?php echo $field['book_id'][$i]; ?></td>
	<td><?php echo $field['booking_date'][$i]; ?></td>
	<td><?php echo $field['release_date'][$i]; ?></td>
	<td><?php echo $field['fine'][$i]; ?></td>
	<td>
	<?php 
	if($field['status'][$i] == 1)
	{
		?>
		<form action="" method="post">
		<input type="hidden" name="user_id" value="<?php echo $field['user_id'][$i]; ?>"  />
		<input type="hidden" name="book_id" value="<?php echo $field['book_id'][$i]; ?>"  />
		<input type="hidden" name="accept" value="1" />
		<input type="submit" name="accept" value="Accept" />
		</form>
		<?php
	}
	elseif($field['status'][$i] == 2)
	{
		?>
		<form action="" method="post">
		<input type="hidden" name="user_id" value="<?php echo $field['user_id'][$i]; ?>"  />
		<input type="hidden" name="book_id" value="<?php echo $field['book_id'][$i]; ?>"  />
		<input type="hidden" name="Release" value="2" />
		<input type="submit" name="accept" value="Release" />
		</form>
		<?php
	}
	?>
	
	</td>

	<?php 
	}
	}
	}
	?>
	</tr>
	
</table>
<h4 align="center" width="115"><?php echo $this->pagination->create_links();?></h4>

</body>
</html>


