<!DOCTYPE HTML PUBLIC "-//SoftQuad//DTD HoTMetaL PRO 4.0::19970714::extensions to HTML 4.0//EN"
 "hmpro4.dtd">

<HTML>
  
  <HEAD>
    <TITLE>BMS : Campaign Management System</TITLE>
    <LINK HREF="gifs/style.css" REL="stylesheet" TYPE="text/css">

  </HEAD>
  
  <BODY BGCOLOR="#FFFFFF" TEXT="#000000" LINK="#000000" VLINK="#000000" 
  ALINK="#000000" LEFTMARGIN="0" TOPMARGIN="0" MARGINWIDTH="0" MARGINHEIGHT="0">
    ~$bmsheader`
	
	
<DIV CLASS="text-under" STYLE="margin-left:20px;">
  <A HREF="bms_adminindex.php?id=~$id`" TARGET="">MIS Home</A> &gt;&gt;<a href="bms_campaign.php?id=~$id`" target=""> Campaign Details</a> 
  &gt;&gt; <B>Banner Details</B></DIV>
<br>
<DIV CLASS="text"><TABLE WIDTH="100%" BORDER="0">
      <TR>
        <TD WIDTH="20%" ALIGN="RIGHT"><IMG SRC="gifs/zero.gif" ALT="New Clients" BORDER="0" HSPACE="0" VSPACE="0" WIDTH="250" HEIGHT="1"><IMG SRC="gifs/tick.gif" ALT="New Clients" BORDER="0" HSPACE="0" VSPACE="0" WIDTH="13" HEIGHT="11">
        </TD>
        
      <TD WIDTH="80%" CLASS="text">You are currently viewing banner details.</TD>
      </TR>
	  ~if $errormsg`
	  <TR> 
    <TD WIDTH="20%" ALIGN="RIGHT"><img src="gifs/error-2.gif" alt="New Clients" border="0" hspace="0" vspace="0" width="16" height="16"></TD>
    <TD WIDTH="80%" CLASS="error">~$errormsg`</TD>
  </TR>
  ~/if`
  ~if $cnfrmmsg`
  <TR>
    <TD WIDTH="20%" ALIGN="RIGHT"><img src="gifs/action-performed.gif" alt="New Clients" border="0" hspace="0" vspace="0" width="16" height="16"></TD>
    <TD WIDTH="80%" CLASS="text">~$cnfrmmsg`</TD>
  </TR>
  ~/if`
    </TABLE></DIV>
	
    <FORM name="campaigndetails" action="bms_campaigndetails.php">
    <TABLE WIDTH="100%" BORDER="0" VSPACE="0" HSPACE="0" 
    CELLPADDING="0" CELLSPACING="0" ALIGN="CENTER">
      <TR>

        
    <TD WIDTH="100%" valign="top"> <BR>
<TABLE WIDTH="100%" BORDER="0" CELLPADDING="0" CELLSPACING="0" 
    ALIGN="CENTER">
      <TR>
        <TD WIDTH="18" BACKGROUND="gifs/page-bg.gif"><IMG SRC="gifs/lt-curve.gif" ALT="Resdex - naukri.com" WIDTH="18" HEIGHT="31" BORDER="0" HSPACE="0"></TD>
        <TD VALIGN="MIDDLE" HEIGHT="31" WIDTH="100%"><TABLE WIDTH="100%" BORDER="0" CELLPADDING="0" CELLSPACING="0" HEIGHT="31">
          <TR>
            <TD BACKGROUND="gifs/page-bg.gif" WIDTH="70%">
                    <DIV CLASS="text">
                      <table width="100%" border="0" cellpadding="0" cellspacing="0" height="31">
                        <tr> 
                          <td background="gifs/page-bg.gif" width="25%" align="RIGHT"> 
                            <div class="text" align="RIGHT"><b>View </b>&nbsp;</div>
                          </td>
                          <td align="LEFT" background="gifs/page-bg.gif" valign="MIDDLE" 
            width="75%"> 
                            <select name="bannerstatusselected" class="textbox">
            ~section  name=i loop=$bannerstatusarr`
                              <option value="~$bannerstatusarr[i]`" ~if $bannerstatus eq $bannerstatusarr[i]` selected ~/if` >~$bannerstatusarr[i]`</option>
			~/section`
                            </select>
                            &nbsp;<b class="text">Banners</b> 
                            <input type="IMAGE" name="showbanner" src="gifs/go.gif" border="0">
                            &nbsp;&nbsp; </td>
                        </tr>
                      </table>
                    </DIV>
                  </TD>
            <TD WIDTH="30%" BACKGROUND="gifs/page-bg.gif" ALIGN="RIGHT"><IMG SRC="gifs/zero.gif" ALT="New Clients" BORDER="0" HSPACE="0" VSPACE="0" WIDTH="30" HEIGHT="1"></TD>
          </TR>
        </TABLE></TD>
        <TD ALIGN="RIGHT" WIDTH="18" BACKGROUND="gifs/page-bg.gif"><IMG SRC="gifs/rt-curve.gif" ALT="Resdex - naukri.com" WIDTH="18" HEIGHT="31" BORDER="0"></TD>
      </TR>
    </TABLE><TABLE WIDTH="100%" BORDER="0" VSPACE="0" HSPACE="0" 
    CELLPADDING="0" CELLSPACING="0" ALIGN="CENTER">
      <TR>
        <TD WIDTH="18" BACKGROUND="gifs/lt-line-bg-1.gif"><IMG SRC="gifs/zero.gif" ALT="Account Information" BORDER="0" HSPACE="0" VSPACE="0" WIDTH="18" HEIGHT="1"></TD>
        <TD WIDTH="100%"> <BR><DIV ALIGN="CENTER">
                <TABLE WIDTH="100%" cellspacing="0" border="1" cellpadding="4" bordercolor="#DFDFDF">
                  <TR> 
                    <TD CLASS="text-new" WIDTH="5%" bgcolor="#E6EEF9" align="center"><B>Banner 
                      ID</B></TD>
					<TD CLASS="text-new" WIDTH="10%" bgcolor="#E6EEF9" align="center"><B>Booking Date</B></TD>
                    <TD CLASS="text-new" WIDTH="15%" bgcolor="#E6EEF9" align="center"><B>Banner 
                      Preview</B></TD>
					  <TD CLASS="text-new" WIDTH="10%" bgcolor="#E6EEF9" align="center"><B>Banner 
                      Region/Zone</B></TD>
                    <TD CLASS="text-new" WIDTH="10%" bgcolor="#E6EEF9" align="center"><B>Banner 
                      Type</B></TD>
                    <TD CLASS="text-new" WIDTH="10%" bgcolor="#E6EEF9" align="center"><B>Banner 
                      Status</B></TD>
                    <TD CLASS="text-new" WIDTH="15%" bgcolor="#E6EEF9" align="center"><B>Criteria</B> </TD>
                    <TD CLASS="text-new" colspan="3" bgcolor="#E6EEF9" align="center"><B>-------------------------Take 
                      Action--------------</B></TD>
                  </TR>
                  ~if $campaigndetails` ~section name=i loop=$campaigndetails` 
                  <TR> 
                    <TD CLASS="text-new" valign="top">~if $campaigndetails[i].bannerstatus 
                      neq "live" and $campaigndetails[i].bannerstatus 
                      neq "deactive" and $campaigndetails[i].bannerstatus 
                      neq "completed" and $campaigndetails[i].bannerstatus 
                      neq "served" and $campaigndetails[i].bannerstatus 
                      neq "expired" and $campaigndetails[i].bannerstatus 
                      neq "deactivesums"`<a href="bms_bannerdetails.php?bannerid=~$campaigndetails[i].bannerid`&id=~$id`&campaignid=~$campaignid`">~$campaigndetails[i].bannerid`</a>~elseif $campaigndetails[i].bannerstatus 
                      eq "live"`<a href="bms_editlivebanner.php?id=~$id`&bannerid=~$campaigndetails[i].bannerid`"> 
                      ~$campaigndetails[i].bannerid`</a>~else` ~$campaigndetails[i].bannerid`  ~/if`</TD>
					  
					<TD CLASS="text-new" valign="top">~$campaigndetails[i].bannerbookdate`</TD>
					  
                    <TD CLASS="text-new" valign="top"> ~if $campaigndetails[i].bannerclass 
                      eq "PopUp" or $campaigndetails[i].bannerclass eq "PopUnder"`~if 
                      $campaigndetails[i].bannergif`<a href="#" onClick=window.open("~$campaigndetails[i].bannergif`");>View 
                      PopUp</a>~else` No url specified ~/if` ~elseif $campaigndetails[i].bannerclass 
                      eq "Flash" or $campaigndetails[i].bannerclass eq "MailerFlash"` 
                      ~if $campaigndetails[i].bannergif`<object>
                        <embed src="~$campaigndetails[i].bannergif`" width=150 height=40>
                        </embed> 
                      </object>~else` No gif specified ~/if` ~elseif $campaigndetails[i].bannerclass 
                      eq "Image" or $campaigndetails[i].bannerclass eq "MailerImage"` 
                      ~if $campaigndetails[i].bannergif`<a href="#" onClick=window.open("~$campaigndetails[i].bannerurl`"); ><img src='~$campaigndetails[i].bannergif`' border="1"></a>~else` 
                      No gif specified ~/if` ~/if` </TD>
					  <TD CLASS="text-new" valign="top">~if $campaigndetails[i].bannerstatus eq "booked" or $campaigndetails[i].bannerstatus eq "ready" or $campaigndetails[i].bannerstatus eq "live" or $campaigndetails[i].bannerstatus eq "served"` ~$campaigndetails[i].bannerzonecriterias.regionname`<BR />~$campaigndetails[i].bannerzonecriterias.zonename` ~else` &nbsp;~/if` </TD>
                    <TD CLASS="text-new" valign="top">~$campaigndetails[i].bannerclass`</TD>
                    <TD CLASS="text-new" valign="top"> ~$campaigndetails[i].bannerstatus`</TD>
                    <TD CLASS="text-new" valign="top">~if $campaigndetails[i].bannercriterias.criteria` 
                      ~$campaigndetails[i].bannercriterias.criteria` ~else` Not Entered. ~/if` </TD>
                    <TD CLASS="text-new" valign="top">~if $campaigndetails[i].bannerstatus 
                      eq "newrequest" or $campaigndetails[i].bannerstatus eq "booked" or $campaigndetails[i].bannerstatus eq "cancel"`<a href="bms_campaigndetails.php?id=~$id`&bannerid=~$campaigndetails[i].bannerid`&changestatus=ready&campaignid=~$campaignid`&bannerstatusselected=~$bannerstatus`"> 
                      Ready </a>~else` Ready ~/if`</TD>
                    <TD CLASS="text-new" valign="top">~if $campaigndetails[i].bannerstatus 
                      eq "newrequest" or $campaigndetails[i].bannerstatus eq "booked" or 
                      $campaigndetails[i].bannerstatus eq "ready" or $campaigndetails[i].bannerstatus eq "cancel"`<a href="bms_campaigndetails.php?id=~$id`&bannerid=~$campaigndetails[i].bannerid`&changestatus=live&campaignid=~$campaignid`&bannerstatusselected=~$bannerstatus`">Make 
                      LIVE </a>~else` Make LIVE ~/if`</TD>
                    <TD CLASS="text-new" valign="top">~if $campaigndetails[i].bannerstatus 
                      neq "live" and $campaigndetails[i].bannerstatus 
                      neq "cancel" and $campaigndetails[i].bannerstatus 
                      neq "deactive" and $campaigndetails[i].bannerstatus 
                      neq "served" and $campaigndetails[i].bannerstatus 
                      neq "expired"`<a href="bms_campaigndetails.php?id=~$id`&bannerid=~$campaigndetails[i].bannerid`&changestatus=cancel&campaignid=~$campaignid`&bannerstatusselected=~$bannerstatus`"> 
                      Cancel </a>~elseif $campaigndetails[i].bannerstatus 
                      eq "live"` <a href="bms_campaigndetails.php?id=~$id`&bannerid=~$campaigndetails[i].bannerid`&changestatus=deactive&campaignid=~$campaignid`&bannerstatusselected=~$bannerstatus`">Deactive</a> ~elseif $campaigndetails[i].bannerstatus eq "cancel"` Cancel ~elseif $campaigndetails[i].bannerstatus eq "served"` Cancel ~elseif $campaigndetails[i].bannerstatus eq "expired"` Cancel ~elseif $campaigndetails[i].bannerstatus eq "deactive"` Deactive~/if` </TD>
                  </TR>
                  ~/section` ~else` 
                  <TR> 
                    <td colspan="5" CLASS="text-new">No banners at this status. 
                      </td>
                  </TR>
                  ~/if` 
                </TABLE>

		</DIV>
              <DIV CLASS="text"> 
                <p><b class="text-blue"><br>
                  Note : </b><br>
                  1. You can change banner status by clicking on the Clickable 
                  Take Action options.<br>
                  2. Click on <b>Banner Id.</b> to Define banner details <b>like</b> 
                  Banner Properties, Region etc.<BR>
                  <BR>
                </p>
                </DIV>
        <P></P>
        <P></P></TD>
        <TD BACKGROUND="gifs/rt-line-bg-1.gif" WIDTH="18"><IMG SRC="gifs/zero.gif" ALT="Account Information" BORDER="0" HSPACE="0" VSPACE="0" WIDTH="18" HEIGHT="1"></TD>
      </TR>
    </TABLE><TABLE WIDTH="100%" BORDER="0" CELLPADDING="0" CELLSPACING="0" 
    ALIGN="CENTER">
      <TR>
        <TD WIDTH="18" BACKGROUND="gifs/page-bg-1.gif"><IMG SRC="gifs/lt-low-curve.gif" ALT="Resdex - naukri.com" WIDTH="18" HEIGHT="31" BORDER="0"></TD>
        <TD VALIGN="MIDDLE" HEIGHT="31" BACKGROUND="gifs/page-bg-1.gif">&nbsp;</TD>
        <TD ALIGN="RIGHT" WIDTH="18" BACKGROUND="gifs/page-bg-1.gif"><IMG SRC="gifs/lt-rt-curve.gif" ALT="Resdex - naukri.com" WIDTH="18" HEIGHT="31" BORDER="0"></TD>
      </TR>
    </TABLE>
<input type="hidden" name="id" value="~$id`" />
<input type="hidden" name="campaignid" value="~$campaignid`" />
<input type="hidden" name="bannerstatus" value="~$bannerstatus`" />
	
    
    ~$bmsfooter`
</table></FORM></BODY>
</HTML>
