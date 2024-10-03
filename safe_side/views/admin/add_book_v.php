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
echo form_open_multipart('admin/add_books', $attributes); ?>
<table border="0">
	<tr><th>Add Book Details</th><th><?php //$data=array('name' => 'check','value' =>1); echo form_checkbox($data);echo "Tik here for entry same book"; ?></th></tr>
	<tr>
		<td> Author        																																</td> 
		<td> <?php $data=array('name' => 'author','value' => $this->validation->author,'size'=> '50'); echo form_input($data);?>						</td>
	</tr>
	<tr>
		<td> Subject      																																</td> 
		<td> <?php $data=array('name' => 'subject','value' => $this->validation->subject,'size'=> '50'); echo form_input($data);?>						</td>
	</tr>
	<tr>
		<td> Title      																																</td> 
		<td> <?php $data=array('name' => 'title','value' => $this->validation->title,'size'=> '50'); echo form_input($data);?>							</td>
	</tr>
	<tr>
		<td> Accession No.      																														</td> 
		<td> <?php $data=array('name' => 'accession_no','value' => $this->validation->accession_no,'size'=> '30'); echo form_input($data);?>			</td>
		<td> <?php echo "<b style='color:red;'>".$this->validation->accession_no_error."</b>"; ?>														</td>
	</tr>
	<tr>
		<td> Book Image      																															</td> 
		<td> <?php // $data=array('name' => 'image'); echo form_upload($data);?>  	<input type="file" name="userfile" size="20" />						</td>
		<td> <?php if(isset($error))echo "<b style='color:red;'>".$error."</b>";?>																										</td>
	</tr>
	<tr>
		<td> Location      																																</td> 
		<td> <?php $data=array('name' => 'location','value' => $this->validation->location); echo form_input($data);?>  								</td>
	</tr>
	<tr>
		<td> Categories      																															</td> 
		<td> <?php $data=array('books'=> 'Books','journals'=>'Journals','e-books'=>'E-Books','cds'=>'CDs'); echo form_dropdown('category',$data);?>  	</td>
	</tr>
	<tr>
		<td> Facilities      																															</td> 
		<td> <?php $data=array('reading'=>'Reading','lending'=>'Lending','rent'=>'Rent'); echo form_dropdown('facility',$data);?>   					</td>
	</tr>
	<tr>
		<td> Publisher      																															</td> 
		<td> <?php $data=array('name' => 'publisher','value' => $this->validation->publisher,'size'=> '50'); echo form_input($data);?>					</td>
	</tr>
	<tr>
		<td> Keyword      																																</td> 
		<td> <?php $data=array('name' => 'keyword','value' => $this->validation->keyword); echo form_input($data);?>  									</td>
	</tr>
	<tr>
		<td> ISBN      																																	</td> 
		<td> <?php $data=array('name' => 'isbn','value' => $this->validation->isbn); echo form_input($data);?>  										</td>
	</tr>
	<tr>
		<td> Call No.      																																</td> 
		<td> <?php $data=array('name' => 'call_no','value' => $this->validation->call_no); echo form_input($data);?>  									</td>
	</tr>
	<tr>
		<td> Edition      																																</td> 
		<td> <?php $data=array('name' => 'edition','value' => $this->validation->edition,'size'=> '30'); echo form_input($data);?>						</td>
	</tr>
	<tr>
		<td> Description      																															</td> 
		<td> <?php $data=array('name' => 'description','value' => $this->validation->description,'size'=> '50'); echo form_input($data);?>				</td>
	</tr>
	<tr>
		<td> Price      																																</td> 
		<td> <?php $data=array('name' => 'price','value' => $this->validation->price); echo form_input($data);?>  										</td>
	</tr>
	<tr>
		<td>              																																</td> 
		<td> <?php echo form_submit('submit','Submit');?> <?php echo anchor('admin/add_books', 'Reset'); ?>											</td>
	</tr>
	
</table>
<?php echo form_close(); ?>

</body>
</html>