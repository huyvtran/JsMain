<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <title>jeevansathi.com</title>
    <style>
        @media screen and (max-width: 384px) {
            #logoTd {
                padding:0px !important;
            }
        }
    </style>
</head>

<body>
<table border="0" cellpadding="0" cellspacing="0" align="center" style="font-family:Arial; font-size:12px; color:#474646;">
    <tr>
        <td width="566" height="10" align="center" style="font-family:Arial; font-size:12px; color:#000000;">~$PREHEADER`</td>
    </tr>
</table>
<table border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF" style="border:1px solid #dcdcdc; max-width:575px; text-align:left" align="center">
    <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0" height="52">
            <tr>
                <td width="30%" id="logoTd" style="padding-left:10px; padding-right:10px;" height="52"><div><a href='~$SITE_URL`' target="_blank"><img src="~$IMG_URL`/images/jspc/commonimg/logo1.png" alt="Jeevansathi.com" align="left" border="0" vspace="0" hspace="0" style="max-width:204px; width:inherit;max-height:52px;"></a></div></td>
                <td width="70%" height="52" style="padding-right:10px;"><table width="120" border="0" cellspacing="0" cellpadding="0" align="right">
                    <tr>
                        <td width="24"><img src="~$IMG_URL`/images/mailer/revampMailer/iconTop.gif" align="left" border="0" vspace="0" hspace="0" width="24" height="23"></td>
                        <td align="left"><font face="Tahoma, Geneva, sans-serif" color="#555555" style="font-size:12px;"><var>{{TOLLNO}}</var></font></td>
                    </tr>
                </table></td>
            </tr>
            </table></td>
    </tr>
    <tr>
        <td width="575"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="">

            <tr>
                <td colspan="3" height="14"></td>
            </tr>
            <tr>
                <td width="22"><img src="~$IMG_URL`/images/mailer/revampMailer/spacer.gif" width="6" height="1" vspace="0" hspace="0" align="left" /></td>
                <td width="531"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-family:Arial, Times New Roman, Times, serif; font-size:12px; color:#000000; text-align:left;">
                    <tr>
                        <td>
                            <table width="100%" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td style="padding-bottom:10px; font-family:Arial,Times New Roman,Times,serif;font-size:12px;line-height:17px; color:#000000; -webkit-text-size-adjust: none;">Hi ~if $memberDetails.DISPLAY eq 'Y'` ~$memberDetails.NAME` ~/if`,</td><br>
                                </tr>

                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td valign="top" style="font-family:Arial,Times New Roman,Times,serif;font-size:12px;line-height:17px; color:#000000; -webkit-text-size-adjust: none;">
                                This is the status of followups requested by you during our last conversation.
                            </td>
                    </tr>
                    ~foreach from=$memberDetails key=a1 item=value`
                        ~if is_numeric($a1)`
                            <br>
                            <tr>
                                <td><b>JS Profile Id - ~$value.MEMBER_USERNAME`</b>
                                </td>
                            </tr>
                            ~if $value.DISPLAY eq 'Y'`
                                <tr>
                                    <td><b>Name - ~$value.NAME`</b></td>
                                </tr>
                            ~/if`
                            ~if $value.FOLLOWUP1_DT`
                                <br>
                                <tr>
                                    <td>Follow up 1</td>
                                </tr>
                                <tr>
                                    <td>Date - ~$value.FOLLOWUP1_DT`
                                    </td>
                                </tr>
                                <tr>
                                    <td>Status - ~$value.FOLLOWUP_1`
                                    </td>
                                </tr>
                            ~/if`
                            ~if $value.FOLLOWUP2_DT`
                                <br>
                                <tr>
                                    <td>Follow up 2</td>
                                </tr>
                                <tr>
                                    <td>Date - ~$value.FOLLOWUP2_DT`
                                    </td>
                                </tr>
                                <tr>
                                    <td>Status - ~$value.FOLLOWUP_2`
                                    </td>
                                </tr>
                            ~/if`
                            ~if $value.FOLLOWUP3_DT`
                                <br>
                                <tr>
                                    <td>Follow up 3</td>
                                </tr>
                                <tr>
                                    <td>Date - ~$value.FOLLOWUP3_DT`
                                    </td>
                                </tr>
                                <tr>
                                    <td>Status - ~$value.FOLLOWUP_3`
                                    </td>
                                </tr>
                            ~/if`
                            ~if $value.FOLLOWUP4_DT`
                                <br>
                                <tr>
                                    <td>Follow up 4</td>
                                </tr>
                                <tr>
                                    <td>Date - ~$value.FOLLOWUP4_DT`
                                    </td>
                                </tr>
                                <tr>
                                    <td>Status - ~$value.FOLLOWUP_4`
                                    </td>
                                </tr>
                            ~/if`
                            ~if $value.CONCALL_ACTUAL_DT`
                                <br>
                                <tr>
                                    <td>Concall Done Date - ~$value.CONCALL_ACTUAL_DT`
                                    </td>
                                </tr>
                            ~/if`
                        ~/if`
                    ~/foreach`
                </table></td>
                <td width="22"><img src="~$IMG_URL`/images/mailer/revampMailer/spacer.gif" width="6" height="1" vspace="0" hspace="0" align="left" /></td>
            </tr>
            <tr>
                <td></td>
                <td><table style="font-family:Arial" border="0" cellpadding="0" cellspacing="0" width="100%">
                    <tr>
                        <td><table style="padding-top: 10px; font-family:Arial,Times New Roman,Times,serif;font-size:12px;line-height:17px; color:#000000; -webkit-text-size-adjust: none;" width="100%" border="0" cellpadding="0" cellspacing="0">
                            <tbody>
                                <tr><td style="font-size:12px;" valign="top">Warm Regards</td></tr>
                                <tr><td style="font-size:12px;" valign="top">~$memberDetails.AGENT_DETAIL.NAME`</td></tr>
                                <tr><td style="font-size:12px;" valign="top">~$memberDetails.AGENT_DETAIL.PHONE`</td></tr>
                                </tr>
                            </tbody>
                        </table></td>
                    </tr>
                </table></td>
                <td></td>
            </tr>
        </table></td>
    </tr>
    ~$FOOTER`
</table>
</body>
</html>