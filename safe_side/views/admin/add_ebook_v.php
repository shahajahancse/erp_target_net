<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="css/dpstyles.css">
<title></title>



<script type="text/javascript">
function validate_required(field,alerttxt)
{
with (field)
  {
  if (value==null||value=="")
    {
    alert(alerttxt);return false;
    }
  else
    {
    return true;
    }
  }
}

function validate_form(thisform)
{
with (thisform)
  {
  if (validate_required(author,"Author must be filled out!")==false)
  {author.focus();return false;}
  if (validate_required(subject,"Subject must be filled out!")==false)
  {subject.focus();return false;}
  if (validate_required(title,"Title must be filled out!")==false)
  {title.focus();return false;}
  if (validate_required(accession_no,"Accession No. must be filled out!")==false)
  {accession_no.focus();return false;}
  if (validate_required(location,"Location must be filled out!")==false)
  {location.focus();return false;}
  if (validate_required(publisher,"Publisher must be filled out!")==false)
  {publisher.focus();return false;}
  if (validate_required(keyword,"Keyword must be filled out!")==false)
  {keyword.focus();return false;}
  if (validate_required(isbn,"ISBN must be filled out!")==false)
  {isbn.focus();return false;}
  if (validate_required(call_no,"Call No. must be filled out!")==false)
  {call_no.focus();return false;}
  if (validate_required(edition,"Edition must be filled out!")==false)
  {edition.focus();return false;}
  if (validate_required(description,"Description must be filled out!")==false)
  {description.focus();return false;}
  if (validate_required(price,"Price must be filled out!")==false)
  {price.focus();return false;}
}
}
</script>
</head>
<body>



<?php 
$attributes = array('onsubmit'=> 'return validate_form(this)');
echo form_open_multipart('admin/add_ebooks', $attributes); ?>
<table border="0">
	<tr><th>Add E-Book Details</th><th><?php //$data=array('name' => 'check','value' =>1); echo form_checkbox($data);echo "Tik here for entry same book"; ?></th></tr>
	<tr>
		<td> E-Book Name   																																</td> 
		<td> <?php $data=array('name' => 'ebooks','value' => $this->validation->ebooks,'size'=> '50'); echo form_input($data);?>						</td>
	</tr>
	<tr>
		<td> Upload E-Books Link																														</td> 
		<td> <?php // $data=array('name' => 'image'); echo form_upload($data);?>  	<input type="file" name="userfile" size="20" />						</td>
		<td> <?php if(isset($error))echo "<b style='color:red;'>".$error."</b>";?>																		</td>
	</tr>
	<tr>
		<td>              																																</td> 
		<td> <?php echo form_submit('submit','Submit');?> <?php echo anchor('admin/add_ebooks', 'Reset'); ?>											</td>
	</tr>
	
</table>
<?php echo form_close(); ?>

</body>
</html>