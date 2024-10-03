<html>
<head>
<title> Add User </title>
</head>
<body>
	<div>
			<h3>Membership Form</h3>
			<?php if(isset($error))echo "<b style='color:red;'>".$error['error']."</b>";?>
			<table border="0">
			<?php echo form_open('admin/add_member_process');?>
			
			<tr><td>User Name</td><td>:</td><td>
			<?php $data = array(
              'name'        => 'user_id',
              'size'        => '40'
               ); 
			 echo form_input($data);?>
			 </td></tr>
			<tr><td>Password</td><td>:</td><td>
			<?php $data = array(
              'name'        => 'password',
              'size'        => '40'
               ); 
			 echo form_password($data);?>
			</td></tr>
			<tr><td>Level</td><td>:</td><td>
			<?php $data = array(
              '0'        => 'Member',
              '1'        => 'Admin',
			  '2'        => 'User',
			  '3'        => 'Report'
               ); 
			 echo form_dropdown('level',$data);?>
			</td></tr>
			<tr><td></td><td></td><td><?php echo form_submit('submit', 'Submit'); ?></td></tr>
			<?php echo form_close(); ?>
			</table>
			
   </div>
</body>
</html>