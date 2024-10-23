<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Final satalment</title>
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>css/calendar.css" />
    <script type="text/javascript" src="<?php echo base_url();?>js/dynamic.js"></script>
    <script src="<?php echo base_url(); ?>js/calendar_eu.js" type="text/javascript"></script>
</head>

<body bgcolor="#ECE9D8">

    <div align="center" style="margin:0 auto; width:100%; overflow:hidden; ">
        <fieldset style='width:600px;'>
            <legend>
                <font size='+1'><b>Employee Data</b></font>
            </legend>

            <form name='leave_holy_days'>
                <table border='0' style='padding:10px'>
                    <tr>
                        <td width='25%'>Employee ID</td>
                        <td colspan='2'><input name='empid_leave' type='text' id='empid_leave' size='25px' /></td>
                    </tr>
                    <tr>
                        <td width='40%'>Resign Date </td>
                        <td colspan='2'><input name='start_leave_date' type='text' id='start_leave_date' size='25px' />
                            <script language="JavaScript">
                            var o_cal = new tcal({
                                // form name
                                'formname': 'leave_holy_days',
                                // input name
                                'controlname': 'start_leave_date'
                            });

                            // individual template parameters can be modified via the calendar variable
                            o_cal.a_tpl.yearscroll = false;
                            o_cal.a_tpl.weekstart = 6;
                            </script>
                        </td>
                    </tr>
                    <tr>
                        <td width='31%'>End Date</td>
                        <td colspan='2'><input name='end_leave_date' type='text' id='end_leave_date' size='25px' />
                            <script language="JavaScript">
                            var o_cal = new tcal({
                                // form name
                                'formname': 'leave_holy_days',
                                // input name
                                'controlname': 'end_leave_date'
                            });

                            // individual template parameters can be modified via the calendar variable
                            o_cal.a_tpl.yearscroll = false;
                            o_cal.a_tpl.weekstart = 6;
                            </script>
                        </td>
                    </tr>
                    <tr>
                        <td width='31%'>Leave Type </td>
                        <td colspan='2'>
                            <select name='select' id='leave_type'>
                                <option value='cl'>Casual</option>
                                <option value='sl'>Sick</option>
                                <option value='el'>Earn</option>
                                <option value='pl'>Paternity</option>
                                <option value='ml'>Maternity</option>
                                <option value='do'>Dayoff</option>
                                <option value='wp'>Without Pay</option>
                                <option value='stl'>Study</option>
                            </select>
                        </td>
                    </tr>
                </table>

                <table border='0' style='padding:10px'>
                    <tr>
                        <td><input type='button' name='add' onclick='enable_leve()' value='NEW' />&nbsp;<input
                                type='button' name='leave_save' disabled='disabled' onclick='save_leave()'
                                value='SAVE' />&nbsp;</td>
                    </tr>
                </table>
        </fieldset>

        <fieldset style='width:550px;margin:10px'>
            <legend>
                <font size='+1'><b>Leave Balance Check</b></font>
            </legend>
            <table width='100%' border='0' align='center' style='padding:10px'>
                <tr>
                    <td width='30%'>Employee Status</td>
                    <td width='20%' style='color: #0000FF'>
                        <div id='emp_status'></div>
                    </td>
                </tr>
                <tr>
                    <td width='30%'>Casual Leave Entitle</td>
                    <td width='20%'><input name='c_leave' type='text' id='c_leave' size='10PX' disabled='disabled' />
                    </td>
                    <td width='20%'> Balance </td>
                    <td width='20%'><input name='c_leave_balance' type='text' id='c_leave_balance' size='10PX'
                            disabled='disabled' /></td>
                </tr>
                <tr>
                    <td>Sick Leave Entitle </td>
                    <td><input name='s_leave' type='text' id='s_leave' size='10PX' disabled='disabled' /></td>
                    <td> Balance </td>
                    <td><input name='s_leave_balance' type='text' id='s_leave_balance' size='10PX'
                            disabled='disabled' /></td>
                </tr>
                <tr>
                    <td>Earn Leave Entitle </td>
                    <td><input name='e_leave' type='text' id='e_leave' size='10PX' disabled='disabled' /></td>
                    <td> Balance </td>
                    <td><input name='e_leave_balance' type='text' id='e_leave_balance' size='10PX'
                            disabled='disabled' /></td>
                </tr>
                <tr>
                    <td>Maternity Leave Entitle </td>
                    <td><input name='m_leave' type='text' id='m_leave' size='10PX' disabled='disabled' /></td>
                    <td> Balance </td>
                    <td><input name='m_leave_balance' type='text' id='m_leave_balance' size='10PX'
                            disabled='disabled' /></td>
                </tr>
                <tr>
                    <td>Paternity Leave Entitle </td>
                    <td><input name='p_leave' type='text' id='p_leave' size='10PX' disabled=disabled='disabled' /></td>
                    <td> Balance </td>
                    <td><input name='p_leave_balance' type='text' id='p_leave_balance' size='10PX'
                            disabled='disabled' /></td>
                </tr>
                <br />
                <tr>
                    <td colspan='4' align='center'>Emp ID:<input style='background-color:yellow;' type='text'
                            size='15px' name='emp_id' id='emp_id'>Year :<input style='background-color:yellow;'
                            type='text' size='5px' name='find_year' id='find_year' /><input type='button' value='Search'
                            onclick='search_year()' /></td>
                </tr>
            </table>
            </form>
        </fieldset>
    </div>