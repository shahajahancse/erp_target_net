<?php
$sal_month = date('m', strtotime($salary_month));
$sal_year = date('y', strtotime($salary_month));
$tbody = 0;
foreach($value->result() as $row)
{
echo $BODY = $this->pd_salary_report_model->get_pd_info($row->emp_id,1,$sal_month,$sal_year,1,2)."<br>";
$tbody = $tbody + $BODY;
}
echo $tbody;
?>