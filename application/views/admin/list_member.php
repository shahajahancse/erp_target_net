<html>
<head>
</head>
<body>
<table border="1" >
<th> User Name</th> <th> Password </th> <th> User level</th> 
<?php
$count = count($values['id']);
for($i=0; $i < $count; $i++)
{
	echo "<tr>"; 
	
	echo "<td>"; 
	echo $values['id_number'][$i];
	echo "</td>"; 
	
	echo "<td>"; 
	echo $values['password'][$i];
	echo "</td>"; 
	
	echo "<td>"; 
	echo $values['level'][$i];
	echo "</td>"; 
	
	echo "</tr>"; 
}
?>
</table>
</body>
</html>