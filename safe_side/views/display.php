<table width="800" border="1">
  <tr>
    <td>Serial No</td> <td>Employee ID</td><td>Proxi No</td><td>Name</td><td>Section</td><td>Line No</td><td>Designation</td><td>IN Time</td>
  </tr>


<?php
$i=0;
foreach ($late as $rows)
{
$i=$i+1;
echo "<tr><td>$i</td><td>$rows->emp_id</td>
    <td>$rows->proxi_id</td>
    <td>$rows->emp_full_name</td>
    <td>$rows->sec_name</td>
    <td>$rows->line_name</td>
    <td>$rows->desig_name</td>
    <td>$rows->date_time</td>
    </tr>";

    }
$i++;
?>
</table>