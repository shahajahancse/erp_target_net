<?php 
$this->load->view("head_english"); 
?>
<div align="center" style=" margin:0 auto;  overflow:hidden; font-family: 'Times New Roman', Times, serif;"><span style="font-size:13px; font-weight:bold;">
Manpower Report</span>
<br />
<br />


<?php



  echo "<table border='1' align='center' cellspacing='0' cellpadding='0'>
  <col width='105' />
  <col width='33' span='3' />
  <col width='30' span='3' />
  <col width='31' span='6' />
  <col width='33' span='3' />
  <col width='29' span='3' />
  <col width='33' span='3' />
  <col width='35' span='3' />
  <tr height='36'>
    <td rowspan='2' height='53' width='105'>LINE NO</td>
    <td colspan='3' width='99'>MASTER BUDGET</td>
    <td colspan='3' width='90'>ACTUAL RECRUIT</td>
    <td colspan='3' width='93'>TODAY'S PRESENT</td>
    <td colspan='3' width='93'>TODAY'S ABSENT</td>
    <td colspan='3' width='99'>SHORT/EXCESS</td>
    <td colspan='3' width='87'>TO DAYS GATE PASS</td>
    <td colspan='3' width='99'>NEW PEOPLE HIRED</td>
    <td colspan='3' width='105'>TOTAL PRESENT</td>
  </tr>
  <tr height='17'>
    <td height='17'>OP</td>
    <td>HP</td><td>QI</td><td>OP</td><td>HP</td><td>QI</td><td>OP</td><td>HP</td><td>QI</td><td>OP</td><td>HP</td><td>QI</td><td>OP</td><td>HP</td><td>QI</td><td>OP</td><td>HP</td>    <td>QI</td><td>OP</td><td>HP</td><td>QI</td><td>OP</td><td>HP</td><td>QI</td></tr> ";
 

		$count = count($values["line"]);
		
		for($i=0; $i<$count; $i++ )
		{
			echo "<tr>";
			
			echo "<td width='200px;'>";
			echo $values["line"][$i];
			echo "</td>";
			//-----------------Mop------------------
			echo "<td>";
			if($values["MOp"][$i] == '')
			{
				echo "0";
			}
			else
			{
				echo $values["MOp"][$i];
			}
			echo "</td>";
			
			//-----------------MHp------------------
			echo "<td>";
			if($values["MHp"][$i] == '')
			{
				echo "0";
			}
			else
			{
				echo $values["MHp"][$i];
			}
			echo "</td>";
			
			//-----------------MQi-----------------
			echo "<td>";
			if($values["MQi"][$i] == '')
			{
				echo "0";
			}
			else
			{
				echo $values["MQi"][$i];
			}
			echo "</td>";
			
			
				//-----------------AOp-----------------
			echo "<td>";
			if($values["AOp"][$i] == '')
			{
				echo "0";
			}
			else
			{
				echo $values["AOp"][$i];
			}
			echo "</td>";
			
			
			//-----------------AHp-----------------
			echo "<td>";
			if($values["AHp"][$i] == '')
			{
				echo "0";
			}
			else
			{
				echo $values["AHp"][$i];
			}
			echo "</td>";
			
			
			//-----------------AQi-----------------
			echo "<td>";
			if($values["AQi"][$i] == '')
			{
				echo "0";
			}
			else
			{
				echo $values["AQi"][$i];
			}
			echo "</td>";
			
			
			
			//-----------------TPOp-----------------
			echo "<td>";
			if($values["TPOp"][$i] == '')
			{
				echo "0";
			}
			else
			{
				echo $values["TPOp"][$i];
			}
			echo "</td>";
			
			//-----------------TPHp-----------------
			echo "<td>";
			if($values["TPHp"][$i] == '')
			{
				echo "0";
			}
			else
			{
				echo $values["TPHp"][$i];
			}
			echo "</td>";
			
			
			//-----------------TPQi-----------------
			echo "<td>";
			if($values["TPQi"][$i] == '')
			{
				echo "0";
			}
			else
			{
				echo $values["TPQi"][$i];
			}
			echo "</td>";
			
			
			//-----------------TAOp-----------------
			echo "<td>";
			if($values["TAOp"][$i] == '')
			{
				echo "0";
			}
			else
			{
				echo $values["TAOp"][$i];
			}
			echo "</td>";
			
			
			//-----------------TAHp-----------------
			echo "<td>";
			if($values["TAHp"][$i] == '')
			{
				echo "0";
			}
			else
			{
				echo $values["TAHp"][$i];
			}
			echo "</td>";
			
			//-----------------TAQi-----------------
			echo "<td>";
			if($values["TAQi"][$i] == '')
			{
				echo "0";
			}
			else
			{
				echo $values["TAQi"][$i];
			}
			echo "</td>";
			
			
			//-----------------SOp-----------------
			echo "<td>";
			if($values["SOp"][$i] == '')
			{
				echo "0";
			}
			else
			{
				echo $values["SOp"][$i];
			}
			echo "</td>";
			
			//-----------------Shp-----------------
			echo "<td>";
			if($values["Shp"][$i] == '')
			{
				echo "0";
			}
			else
			{
				echo $values["Shp"][$i];
			}
			echo "</td>";
			
			//-----------------Sqi-----------------
			echo "<td>";
			if($values["Sqi"][$i] == '')
			{
				echo "0";
			}
			else
			{
				echo $values["Sqi"][$i];
			}
			echo "</td>";
			
			
			//-----------------TGOp-----------------
			echo "<td>";
			if($values["TGOp"][$i] == '')
			{
				echo "0";
			}
			else
			{
				echo $values["TGOp"][$i];
			}
			echo "</td>";
			
			//-----------------TGHp-----------------
			echo "<td>";
			if($values["TGHp"][$i] == '')
			{
				echo "0";
			}
			else
			{
				echo $values["TGHp"][$i];
			}
			echo "</td>";
			
			//-----------------TGQi-----------------
			echo "<td>";
			if($values["TGQi"][$i] == '')
			{
				echo "0";
			}
			else
			{
				echo $values["TGQi"][$i];
			}
			echo "</td>";
			
			
			//-----------------NPOp-----------------
			echo "<td>";
			if($values["NPOp"][$i] == '')
			{
				echo "0";
			}
			else
			{
				echo $values["NPOp"][$i];
			}
			echo "</td>";
			
			
			//-----------------NPHp-----------------
			echo "<td>";
			if($values["NPHp"][$i] == '')
			{
				echo "0";
			}
			else
			{
				echo $values["NPHp"][$i];
			}
			echo "</td>";
			
			
			//-----------------NPQi-----------------
			echo "<td>";
			if($values["NPQi"][$i] == '')
			{
				echo "0";
			}
			else
			{
				echo $values["NPQi"][$i];
			}
			echo "</td>";
			
			
			
			
			
			
			//-----------------TOOp-----------------
			echo "<td>";
			if($values["TOOp"][$i] == '')
			{
				echo "0";
			}
			else
			{
				echo $values["TOOp"][$i];
			}
			echo "</td>";
			
			
			//-----------------TOHp-----------------
			echo "<td>";
			if($values["TOHp"][$i] == '')
			{
				echo "0";
			}
			else
			{
				echo $values["TOHp"][$i];
			}
			echo "</td>";
			
			
			//-----------------TOQi-----------------
			echo "<td>";
			if($values["TOQi"][$i] == '')
			{
				echo "0";
			}
			else
			{
				echo $values["TOQi"][$i];
			}
			echo "</td>";
			
			
			
			
			echo "<tr>";
		}
		
		
?>
