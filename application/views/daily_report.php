<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Daily
<?php 
if ($daily_status == "A") {
    echo "Absent";
} elseif ($daily_status == "P") {
    echo "Present";
} elseif ($daily_status == "L") {
    echo "Leave";
}
?> 
 Report</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/print.css" media="print" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/SingleRow.css" />
<style>
    .sal {
        width: 100%; /* Set a fixed width */
        border-collapse: collapse; /* Collapse borders */
    }
    .sal th, .sal td {
        padding: 8px; /* Add padding */
        border: 1px solid #000; /* Ensure border is consistent */
        text-align: left; /* Align text to the left */
    }
    .sal th {
        background-color: #f2f2f2; /* Optional: add background color to headers */
    }
</style>
</head>

<body>
<?php 
$base_url = base_url();
$url = $base_url."index.php/payroll_con/daily_report_export/$year/$month/$date/$daily_status/$col_desig/$col_line/$col_section/$col_dept/$col_all";
?>
<div style="margin: 0 auto; width: 1100px;">
<div id="no_print" style="float:right;"></div>
<?php 
$this->load->view("head_english"); 
?>

<div align="center" style="margin: 0 auto; overflow: hidden; font-family: 'Times New Roman', Times, serif;">
    <span style="font-size: 13px; font-weight: bold;">
    Daily 
    <?php 
    if ($daily_status == "A") {
        echo "Absent";
    } elseif ($daily_status == "P") {
        echo "Present";
    } elseif ($daily_status == "L") {
        echo "Leave";
    }
    ?> 
    Report of <?php echo "$date/$month/$year"; ?></span>
    <br /><br />

    <?php
    $count = count($values["emp_id"]);
    $current_section = ''; // To keep track of the current section

    for ($i = 0; $i < $count; $i++) {
        // Check if we're in a new section
        if ($values["sec_name"][$i] != $current_section) {
            // If this isn't the first section, close the previous section
            if ($current_section != '') {
                echo "</table><br />"; // Optional: end the previous section
            }
            
            // Update current section
            $current_section = $values["sec_name"][$i];

            // Start a new table for the new section
            echo "<table class='sal'>";
            echo "<tr><th colspan='13' style='text-align: center;'>Section: $current_section</th></tr>"; // Adjust the colspan number
            echo "<tr><th>SL</th><th style='white-space:nowrap'>Emp ID</th><th style='white-space:nowrap'>Punch Card No.</th><th>Employee Name</th>
                   <th>Joining Date</th> <th>Department</th><th>Designation</th><th>Shift</th>";
            if ($daily_status == "P") {
                echo "<th>IN Time</th><th>OUT Time</th>";
            }
            echo "<th>Weekend</th>";
            echo "<th>Night</th>";
            echo "<th>Status</th></tr>";
        }

        // Populate the table rows
        echo "<tr>";
        echo "<td>".($i + 1)."</td>";
        echo "<td>".$values["emp_id"][$i]."</td>";
        echo "<td>&nbsp;".$values["proxi_id"][$i]."</td>";
        echo "<td style='white-space:nowrap'>".$values["emp_name"][$i]."</td>";
        echo "<td>".date("d M Y",strtotime($values["doj"][$i]))."</td>";
        echo "<td>".$values["dept_name"][$i]."</td>";
        echo "<td>".$values["desig_name"][$i]."</td>";
        echo "<td>".$values["emp_shift"][$i]."</td>";

        if ($daily_status == "P") {
            echo "<td style='white-space:nowrap' align='center'>".$values["in_time"][$i]."</td>";
            echo "<td style='white-space:nowrap' align='center'>";
            if ($values["out_time"][$i] == '' || $values["out_time"][$i] == "12:00:00 AM") {
                echo "P(Error)";
            } else {
                echo $values["out_time"][$i];
            }
            echo "</td>";
        }

        echo "<td style='text-align:center'>".$values["holiday_allowance"][$i]."</td>";
        echo "<td style='text-align:center'>".$values["night_allowance"][$i]."</td>";
        echo "<td style='text-align:center'>".$values["status"][$i]."</td>";
        echo "</tr>";
    }
    // Close the last section table
    if ($current_section != '') {
        echo "</table><br />";
    }
    ?>
</div>
</div>
</body>
</html>
