<div id="change_div" style="display:inline" >
		<div id="login_layer" >
			<div class="pink" style="width:700px;height:350px!important;">
				<div class="topbg">
					<div class="fl pd b t12">Login to Continue </div>
					<div class="fr pd b t12"><a  href="#" class="blink" onclick="$.colorbox.close();return false;" >Close [x]</a></div>
				</div>
				<div class="clr"></div>
				<div class="scrollbox1 t12" style="width:685px;height:auto;"  id="login_bef_loader">
					<div class="row4 red t11" id="Error_Mes" style="padding-left:6px;display:none"> </div>
					<div class="fl" style="width:218px;" >
						<div id="PASS_FETCHED" style="display:none">
							<div class="fl"><img src="~$SITE_URL`/profile/images/confirm_small.gif"> </div>
							<div class="row4 green t11" style="padding-left:6px;margin:0px;width:300px"></div>
						</div>
						<div class="row3 t14 b">Existing User</div>
						<div class="row3">
							<label style="font-weight:normal; text-align:left;">Email :</label>
							<input type="text" style="width:130px;" class="txt1"  name="username" id="EMAIL_LAYER" value="~$EMAIL_LAYER`">
						</div>
						<div class="row3 red t11" style="visibility:hidden;" id="USERNAME_ERROR">
							<img align="top" title="error" alt="error" src="~$SITE_URL`/profile/images/alert.gif"/> Email is invalid.
						</div>
						<div class="row3">
							<label style="font-weight:normal; text-align:left;"> Password :</label>
							<input type="password" style="width:130px;" class="txt1" name="PASSWORD_LAYER" id=PASSWORD_LAYER  onkeydown="javascript:check_enter('login_user()',event)">
						</div>
						<div class="row3 red t11"  style="visibility:hidden;" id="PASS_ERROR">
							<img align="top" title="error" alt="error" src="~$SITE_URL`/profile/images/alert.gif"/>  Password is invalid.
						</div>
		
						<div class="row3">
							<input type="checkbox" style="border:0px;width:13px;height:16px"  name="REMEMBER_ME_LAYER" id="REMEMBER_ME_LAYER" value='Y' checked>
							Remember Me 
						</div>
						<div class="row3">
							<input type="button" class="b green_btn" value="Login" style="width:55px;"  onclick="javascript:login_user()">
						</div>
						<div class="row3">
							<a href="javascript:show_forgot_temp()" class="blink" >Forgot User ID or Password</a> 
						</div>
						<div class="sp5"></div>
					</div>
					
					<div class="fl" style="margin:15px 0; border:1px #d2a6b0;height:270px; border-left-style:solid;"></div>
					<div class="fl" style="padding-left:10px; position:relative;width:442px;">
						<div class="row3 t14 b" style="text-align:left; float:left;">New User Register on Jeevansathi.com </div>
						<div class="rf" style="position:absolute; top:8px; right:4px; font-size:11px;">*Mandatory field</div>
						<div class="clr"></div>
						<style>
							  .pnk_blk{background:#f8e8eb; width:434px; border:1px solid #e2c7cc; padding:10px 2px;}
							  .pnk_blk label{width:175px; font:bold 12px Arial, Helvetica, sans-serif; text-align:right; padding-right:5px; float:left;} 
							  .pnk_blk input.txt1,.pnk_blk select.sel1{width:235px; border:1px solid
#969694;font-size:11px;}
							  .pnk_blk ul{list-style:none; margin:0; padding:0;}
							  .pnk_blk ul li{float:left; margin-bottom:5px;}
							  .w_45{width:76px!important; margin-right:5px;}
						</style>
						<div class="pnk_blk  fl">
						<ul>
						<form name="lead" action="~$SITE_URL`/profile/registration_new.php?source=~if $BEF_LOG_SRC`~$BEF_LOG_SRC`~else`login_lay~/if`&lead=1" method="post" enctype="multipart/form-data" style="margin: 0px" onSubmit="return reg_valid();">
								<input type="hidden" name="site_url" value="~$SITE_URL`" />

								<li>
									<label>* Email:</label>
									<input type="text" class="txt1" id="email_val_layer" name="email">
								</li>
								<li id="email_error" style="display:none" class="red">
									<label style="width:100px">&nbsp;</label>
									<img height="12" src='~$SITE_URL`/profile/images/alert_new.gif' style="display:inline;" />
									Please enter email address in proper format
								</li>
								<li>
									<label>* Mobile No:</label>
									<input class="txt1" style="width: 36px;" id="country_Code" name="country_Code" value="+91" type="text" maxlength="4" />			
									<input type="text" style="width: 194px;" maxlength="12" class="txt1" id="mobile_layer" name="mobile" onBlur="javascript:get();">
								</li>
								<li>
									<label>* I am Looking for:</label>
									<select style="width:239px;" class="sel1" name="relationship" id="relationship">
									      <option value="" selected="selected">Select relationship</option>
					      				      <option value="1">Bride for Self</option>
									      <option value="2">Bride for Son</option>
									      <option value="6">Bride for Brother</option>
									      <option value="4">Bride for Friend/Relative/Niece/Others</option>
									      <option value="1D">Groom for Self</option>
									      <option value="2D">Groom for Daughter</option>
									      <option value="6D">Groom for Sister</option>
									      <option value="4D">Groom for Friend/Relative/Niece/Others</option>
									</select>
								</li>
								<li>
									<label>* Date of Birth of boy/girl:</label>
									<select name="day" id="day" class="sel1 w_45 fl">
										<option selected value="">Day</option>
						                                <option value="1" >1</option>
						                                <option value="2" >2</option>
						                                <option value="3" >3</option>
						                                <option value="4" >4</option>
						                                <option value="5" >5</option>
						                                <option value="6" >6</option>
						                                <option value="7" >7</option>
						                                <option value="8" >8</option>
						                                <option value="9" >9</option>
						                                <option value="10" >10</option>
						                                <option value="11" >11</option>
						                                <option value="12" >12</option>
						                                <option value="13" >13</option>
						                                <option value="14" >14</option>
						                                <option value="15" >15</option>
						                                <option value="16" >16</option>
						                                <option value="17" >17</option>
						                                <option value="18" >18</option>
						                                <option value="19" >19</option>
						                                <option value="20" >20</option>
						                                <option value="21" >21</option>
						                                <option value="22" >22</option>
						                                <option value="23" >23</option>
						                                <option value="24" >24</option>
						                                <option value="25" >25</option>
						                                <option value="26" >26</option>
						                                <option value="27" >27</option>
						                                <option value="28" >28</option>
						                                <option value="29" >29</option>
						                                <option value="30" >30</option>
						                                <option value="31" >31</option>
									</select>
									<select name="month" id="month" class="sel1 w_45  fl">
										<option selected value="">Month</option>
						                                <option value="1" >Jan</option>
						                                <option value="2" >Feb</option>
						                                <option value="3" >Mar</option>
						                                <option value="4" >Apr</option>
						                                <option value="5" >May</option>
						                                <option value="6" >Jun</option>
						                                <option value="7" >Jul</option>
						                                <option value="8" >Aug</option>
						                                <option value="9" >Sep</option>
						                                <option value="10">Oct</option>
						                                <option value="11">Nov</option>
						                                <option value="12">Dec</option>
									</select> 
									<select name="year" id="year" class="sel1 w_45 fl">
										<option selected value="">Year</option>
										<option  value=1992 >1992 </option>
										<option  value=1991 >1991 </option>
										<option  value=1990 >1990 </option>
										<option  value=1989 >1989 </option>
										<option  value=1988 >1988 </option>
										<option  value=1987 >1987 </option>
										<option  value=1986 >1986 </option>
										<option  value=1985 >1985 </option>
										<option  value=1984 >1984 </option>
										<option  value=1983 >1983 </option>
										<option  value=1982 >1982 </option>
										<option  value=1981 >1981 </option>
										<option  value=1980 >1980 </option>
										<option  value=1979 >1979 </option>
										<option  value=1978 >1978 </option>
										<option  value=1977 >1977 </option>
										<option  value=1976 >1976 </option>
										<option  value=1975 >1975 </option>
										<option  value=1974 >1974 </option>
										<option  value=1973 >1973 </option>
										<option  value=1972 >1972 </option>
										<option  value=1971 >1971 </option>
										<option  value=1970 >1970 </option>
										<option  value=1969 >1969 </option>
										<option  value=1968 >1968 </option>
										<option  value=1967 >1967 </option>
										<option  value=1966 >1966 </option>
										<option  value=1965 >1965 </option>
										<option  value=1964 >1964 </option>
										<option  value=1963 >1963 </option>
										<option  value=1962 >1962 </option>
										<option  value=1961 >1961 </option>
										<option  value=1960 >1960 </option>
										<option  value=1959 >1959 </option>
										<option  value=1958 >1958 </option>
										<option  value=1957 >1957 </option>
										<option  value=1956 >1956 </option>
										<option  value=1955 >1955 </option>
										<option  value=1954 >1954 </option>
										<option  value=1953 >1953 </option>
										<option  value=1952 >1952 </option>
										<option  value=1951 >1951 </option>
										<option  value=1950 >1950 </option>
										<option  value=1949 >1949 </option>
										<option  value=1948 >1948 </option>
										<option  value=1947 >1947 </option>
										<option  value=1946 >1946 </option>
										<option  value=1945 >1945 </option>
										<option  value=1944 >1944 </option>
										<option  value=1943 >1943 </option>
										<option  value=1942 >1942 </option>
										<option  value=1941 >1941 </option>
										<option  value=1940 >1940 </option>
										<option  value=1939 >1939 </option>
									</select>
								</li>
								<li>
									<label>* Mother Tongue/Community:</label>
									<select class="sel1" name="mtongue" id="mtongue" style="width:239px;">
										<option value="" selected>Select mother tongue/community</option>
										~foreach from=$MtongueDropdownForTemplate item=value key=kk`
											<optgroup label="&nbsp;"></optgroup>
											<optgroup label="~$value['LABEL']`">
												~foreach from=$value['VALUES'] item=value1 key=kk1`
													<option value="~$kk1`">~$value1`</option>
												~/foreach`
											</optgroup>
										~/foreach`
									</select>
								</li>
								<div class="fl" style="text-align:center; position:absolute; bottom:-22px;right:165px;z-index:10000;">
									<input type="submit" name="submit_lead" value="Register Now" id="submit_lead" class="b green_btn" />
								</div>
							</ul>
						</form>	
						</div>
						<div class="sp8"></div>
						<div style="width:408px; float:left;font-size:12px;display:none;color:" id="common_error" class="red">
							<img height="12" src='~$SITE_URL`/profile/images/alert_new.gif'></img>
							Please fill all details to proceed.
						</div>
						<div class="sp8"></div>
						<div style="width:419px; float:left;">Clicking on register now button means that you accept <a href='#' onclick="javascript:window.open('~$SITE_URL`/profile/disclaimer.php?text=1','mywindow','scrollbars=yes,width=500');return false;" target="_blank" class="blink">terms and conditions</a> of Jeevansathi.com</div>
						<div class="sp8"></div>
					</div>
				</div>
				<div class="scrollbox1 t12" style="width:685px;height:325px!important;display:none"  id="login_aft_loader" >
					<div style="margin:12px 0 0 0px;text-align:center"><img src="~$SITE_URL`/profile/images/loader_big.gif"><BR>Logging you in...</div>
				</div>
			</div>
		</div>
		<div id="forgot_layer" style="display:none">
			<div class="pink" style="width:342px;height:auto;">
				<div class="topbg">
					<div class="fl pd b t12">Forgot  Password</div>
					<div class="fr pd b t12"><a href="#" class="blink"  onclick="$.colorbox.close();return false;" >Close [x]</a></div>
	
				</div>
				<div class="clear"></div>
	
				<div class="scrollbox1 t12" style="width:330px;height:120px;" id="forgot_bef_loader">
					<div class="red t11" style="margin:1px 0px;" id="forgot_error" ></div>
					<div class="t12" style="margin:3px 0px 6px;color:green;" id="fetched_pass"></div>
					<div class="t12" style="margin:3px 0px 6px">Please provide your email registered on jeevansathi.com</div>
					<div class="row3">
						<label style="font-weight:normal;color:#000">Enter Email  </label>
						<input type="text" style="width:130px;" id="forgot_email_layer">
					</div>
	
	
					<div class="sp8"></div>
						<div class="row3"><label>&nbsp;</label>
						<input type="button" class="b green_btn" value="Request Password" style="width:150px;" onClick="javascript:submit_email()">
					</div>
				</div>
	
				<div class="scrollbox1 t12" style="width:330px;height:120px;display:none" id="forgot_aft_loader" >
					<div style="margin:12px 0 0 120px"><img src="~$SITE_URL`/profile/images/loader_big.gif"></div>
				</div>
			</div>
		</div>
</div>

<script type="text/javascript" language="javascript">
var login_layer_id=dID("login_layer");
var login_bef_loader_id=dID("login_bef_loader");
var login_aft_loader_id=dID("login_aft_loader");
var head_text_id=dID("head_text");
var email_id=dID("EMAIL_LAYER");
var password_id=dID("PASSWORD_LAYER");
var remember_id=dID("REMEMBER_ME_LAYER");
var error_mes_id=dID("Error_Mes");
var pass_fetched_id=dID("PASS_FETCHED");
var user_error_id=dID("USERNAME_ERROR");
var pass_error_id=dID("PASS_ERROR");

var forgot_layer_id=dID("forgot_layer");
var forgot_email_id=dID("forgot_email_layer");
var forgot_bef_loader_id=dID("forgot_bef_loader");
var forgot_aft_loader_id=dID("forgot_aft_loader");
var forgot_error_id=dID("forgot_error");

var fetched_pass_id=dID("fetched_pass");
//Url to which we have to redirect if login successfull.
var prev_url="";
if('~$PREV_URL`')
	prev_url="~$SITE_URL`~$PREV_URL`";


var red_img="<img src='~$SITE_URL`/profile/images/alert.gif'>";
var gr_img="<img src='~$SITE_URL`/profile/images/grtick.gif'>";
var email_mes=red_img+" Please provide Email ";
var password_mes=red_img+" Please provide valid password";
var no_rec=red_img+" Username & Password do not match";
var off_rec=red_img+" Profile inactive";
var common_mes="";
var forgot_data="";

function submit_email()
{
	
	forgot_email_value=forgot_email_id.value;
	if(check_for_email(forgot_email_value))
	{
		complete_url="forgotpassword.php?ajaxValidation=Y&submit_email=1&email="+escape(forgot_email_value);

		send_login_information(complete_url,"FORGOT");
	}
	else
	{
		forgot_error_id.innerHTML=red_img+" Please provide correct Email";
		forgot_error_id.style.display='inline';
		$.colorbox.resize();
		return 1;
	}	
	
}
function check_for_email(emailadd)
{
	var result = false;
	var theStr = new String(emailadd);
	var index = theStr.indexOf("@");
	if (index > 0)
	{
	var pindex = theStr.indexOf(".",index);
	if ((pindex > index+1) && (theStr.length > pindex+2))
		result = true;
	}
		
	return result;
}

function show_forgot_temp()
{
	forgot_error_id.style.display="none";
	error_mes_id.style.display="none";
	login_layer_id.style.display="none";
	forgot_layer_id.style.display="inline";
	$.colorbox.resize({width:"365px"});
}
function login_user()
{
	//call tracking function if tracking is enabled.
	if(typeof(jsLogin_layer)!='undefined')
	{
		if(jsLogin_layer)
		{
			//Forecefully calling jsb9onUnloadTracking
			if(typeof(jsb9onUnloadTracking)=='function')
				jsb9onUnloadTracking();
			jsLogin_layer=0;
		}
	}

//Disable the fetched password message is enabled.
fetched_pass_id.innerHTML="";
pass_fetched_id.style.display='none';
var email_val_layer=email_id.value;
var password_val=password_id.value;

forgot_error_id.style.display="none";
error_mes_id.style.display="none";
user_error_id.style.visibility='hidden';
pass_error_id.style.visibility="hidden";	
if(remember_id.checked)
	remember_val='Y';
else
	remember_val='N';
if(!checkemail(email_val_layer))
{
	//error_mes_id.innerHTML=common_mes+email_mes;
	//error_mes_id.style.display='inline';
	//login_bef_loader_id.style.height="237px";
	user_error_id.style.visibility='visible';
	return 1;
}
if(password_val=="")
{
	//error_mes_id.innerHTML=common_mes+password_mes;
	//error_mes_id.style.display='inline';
	pass_error_id.style.visibility="visible";
	//login_bef_loader_id.style.height="237px";
	return 1;
}
var complete_url="~$SITE_URL`/profile/login.php?username="+escape(email_val_layer)+"&password="+encodeURIComponent(password_val)+"&rememberme="+escape(remember_val)+"&ajaxValidation=1";

error=send_login_information(complete_url,"LOGIN");
if(error=='N')
{
	erro_mes_id.innerHTML=common_mes+no_rec;
}


}
function send_login_information(url,page)
{
if(page=='LOGIN')
{
	before_call_func="before_login";
	after_call_func="after_login";
	method="POST";
	
}
else if(page=='FORGOT')
{
	before_call_func="before_forgot";
	after_call_func="after_forgot";
	method="POST";
}
if(page!="")
	send_ajax_request(url,before_call_func,after_call_func,method);
}
function before_login()
{
login_bef_loader_id.style.display='none';
login_aft_loader_id.style.display='block';
		$.colorbox.resize();
}
function before_forgot()
{
forgot_bef_loader_id.style.display='none';
forgot_aft_loader_id.style.display='inline';
		$.colorbox.resize();

}
function after_login()
{
//A_E --> error because of query failure
//N --> Wrong username/password
//O --> Stopping offline login
//Y --> succesfully login
//YI --> incomplete profile.
//JA --> Archived profile

if(result=='A_E' || result=='N' || result=='O' || result=='JA')
{
	jsLogin_layer=1;
	if(typeof(jsb9eraseCookie)=='function')
		jsb9eraseCookie("jsb9Track");
}
if(result=='JA')
{
	top.document.location.href='/profile/retrieve_archived.php';
	return 1;

}
else if(result=='A_E')
{
	login_bef_loader_id.innerHTML=common_error;
	error_mes_id.style.display='inline';
	login_bef_loader_id.style.display='block';
	//login_bef_loader_id.style.height="237px";
	login_aft_loader_id.style.display='none';
	
	return 1;
}
else if(result=='N')
{
	error_mes_id.innerHTML=common_mes+no_rec;
	error_mes_id.style.display='inline';
	login_bef_loader_id.style.display='block';
	//login_bef_loader_id.style.height="237px";
	login_aft_loader_id.style.display='none';
	return 1;
}
else if (result=='O')
{
	error_mes_id.innerHTML=common_mes+off_rec;
        error_mes_id.style.display='inline';
        login_bef_loader_id.style.display='block';
        //login_bef_loader_id.style.height="237px";
        login_aft_loader_id.style.display='none';
}
else if(result=='Y' || result=='YI')
{
	var ids_checked="";
	//Checkbox_checked function is defined in new_changes_search.htm
	if(typeof checkbox_checked=="function")
		ids_checked=checkbox_checked();
	var values="";
	if(ids_checked && prev_url)
		values=escape(prev_url);
	else if(prev_url)
		values=escape(prev_url);
	
	//window.reload();
	$.colorbox.close();
	var address_url=document.location.href;
	
	
	//If javascript function to call.
	var after_login_call='~$AFTER_LOGIN_CALL`';
	
	//If address url doesn't contain any get variable, then forcefully assign one variable.
	if(address_url.indexOf("?")==-1)
                address_url=address_url+'?temp=1';

	//Remove all the ancors while reloading or redirecting the page.
	var regExpr=/#[a-z\_A-Z]*/;
	address_url=address_url.replace(regExpr,"");
	if("~$REDIRECT_TO`" && result=='Y')
	{
		top.document.location.href="~$REDIRECT_TO`";
		return true;
	}
	if((address_url.indexOf("search.php")!=-1 || address_url.indexOf("/search/")!=-1) && address_url.indexOf("?temp=1")!=-1)
	{
		if(result=='YI')
			top.document.location="~$SITE_URL`/profile/valid_number.php?post_login=1";
		else
		{
			if(dID("SEARCH_LINK"))
			{
				var str=dID("SEARCH_LINK").value;
				if(str.indexOf("NaN")==0)
					str=str.substr(3,str.length);

				str=str+"&CALL_ME="+values;

				if(ids_checked)
					str=str+"&ID_CHECKED="+ids_checked;     
				if(after_login_call)
					str=str+"&after_login_call="+after_login_call;
				top.document.location=str;
			}
			else
			location.reload(false);
		}
	}
	else if(address_url.indexOf("search.php")!=-1 || address_url.indexOf("/search/")!=-1)
	{
		if(result=='YI')
			top.document.location="~$SITE_URL`/profile/valid_number.php?post_login=1";
		else
		{
			str=address_url;
			str=str+"&CALL_ME="+values;
			if(ids_checked)
                                str=str+"&ID_CHECKED="+ids_checked;
                        if(after_login_call)
                                str=str+"&after_login_call="+after_login_call;

			if(typeof(searchidL)!='undefined')
                        {
                                str=str.replace("searchid=","temp_searchid=");
                                str=str+"&searchid="+searchidL;
                        }
                        top.document.location=str;
		}
	}
	else if(address_url.indexOf("albumpage?")!=-1)
	{
		 str=address_url;
		if(after_login_call)
			str=str+"&after_login_call="+after_login_call;
		top.document.location=str;
		
	}
	~if $now`
        else if(address_url.indexOf("mem_comparison.php")!= -1)
        {
        //      alert(address_url.indexOf("mem_comparison.php"));
                document.form.action="payment.php";
                document.form.submit();
        //      location.reload(false);
        }
	~/if`
	else if(address_url.indexOf("logout.php")!= -1)
	//else if(values.indexOf("login.php")!=-1) //Changed for the Logout page Layer -- login for the layer page
	{
		//Right now not setting call_me variable
		if(result=='YI')
			address_url1="~$SITE_URL`/profile/valid_number.php?post_login=1";
		else
			address_url1='~$SITE_URL`';
		var str=address_url1;
		
		//str=address_url+"&CALL_ME="+values;
		top.document.location=str;  
	}
	else if(values.indexOf("login.php")==-1)
	{
		if(result=='YI')
			top.document.location="~$SITE_URL`/profile/valid_number.php?post_login=1";
		else
		{
			//Right now not setting call_me variable
			var str=address_url;
			var home_page_url="~$SITE_URL`";

			if(address_url.indexOf("matrimonials")>0)
				str=home_page_url;
			if(address_url.indexOf("matrimonial-")==-1 && values!='')
				str=address_url+"&CALL_ME="+values;
			if(address_url.indexOf("viewprofile.php")!=-1)
				str=str+"&after_login_call="+escape(after_login_call);
			~if $mem_str`
			if(address_url.indexOf("mem_comparison.php")!=-1)
				str=str+"&var="+'~$mem_str`';
			~/if`
					//alert(str);
			top.document.location=str;
		}
			
	}
	else if(address_url.indexOf("/marriage_bureau/")!= -1)
        {
                //Right now not setting call_me variable
                //var str=address_url+"&CALL_ME="+values;
                address_url1='~$SITE_URL`';
                var str=address_url1;
                top.document.location=str;  
        }
	else
	{
		location.reload(true);
	}
		$.colorbox.close();
	return 1;
}
else
{
	dID('change_div').innerHTML=result;
}

}
function after_forgot()
{
if(result=='A_E')
{
	forgot_bef_loader_id.style.display='block';
	forgot_aft_loader_id.style.display='none';
	//forgot_loader_id.innerHTML=forgot_data;

	forgot_error_id.style.display="inline";
	error_mes_id.style.display="none";
	forgot_error_id.innerHTML=common_error;
		$.colorbox.resize();
	return 1;
}
if(result=='JA')
{
	top.document.location.href='/profile/retrieve_archived.php';
	return 1;
}
if(result=='D1' || result=='E2' || result=='E1')
{
	forgot_bef_loader_id.style.display='block';
	forgot_aft_loader_id.style.display='none';
	//forgot_loader_id.innerHTML=forgot_data;

	forgot_error_id.style.display="inline";
	error_mes_id.style.display="none";

	if(result=='E1')
		forgot_error_id.innerHTML=red_img+" Please provide correct Email";
	else if(result=='E2')
		forgot_error_id.innerHTML=red_img+" This Email does not exist in our database.";
	else if(result=='D1')
	{
		//Adjusting the width of login layer.
		TB_WIDTH=700
		$("#TB_window").css({marginLeft: '-' + parseInt((TB_WIDTH / 2),10) + 'px', width: 0 + 'px'});

		login_layer_id.style.display="inline";
		forgot_layer_id.style.display="none";
		forgot_error_id.style.display="none";
		forgot_email_value=forgot_email_id.value;
		pass_fetched_id.style.display='inline';
		pass_fetched_id.innerHTML=' <div class="fl"><img src="~$SITE_URL`/profile/images/confirm_small.gif"> </div><div class="row4 green t11" style="padding-left:6px;margin:0px; float:left; width:180px;" > Your password has been sent to '+forgot_email_value+', please check your email and login again</div>';
		//pass_fetched_id.innerHTML=gr_img+" Password send to : "+forgot_email_value;
		//login_bef_loader_id.style.height="237px";

	}
		$.colorbox.resize({width:"722px"});
	return 1;
}
else
{
	dID('change_div').innerHTML=result;
		$.colorbox.resize();
}

}

function reg_valid()
{
	var docF=document.lead;
	
	/*for (var i=0; i < docF.gender.length; i++)
	{
		if (docF.gender[i].checked)
		{
			var gen_val = docF.gender[i].value;
		}
	}*/
	
	//if(docF.email_val_layer.value=="" || docF.country_Code.value=="" ||docF.mobile_layer.value=="" || docF.day.value=="" || docF.month.value=="" || docF.year.value=="" || docF.mtongue.value=="" || docF.caste.value=="" ||  docF.relationship.value=="")
	if(docF.email_val_layer.value=="" || docF.country_Code.value=="" ||docF.mobile_layer.value=="" || docF.day.value=="" || docF.month.value=="" || docF.year.value=="" || docF.mtongue.value=="" || docF.relationship.value=="")
	{
	      document.getElementById('common_error').style.display="inline";
	      return false;
	}
	else if(docF.email_val_layer.value)
	{
		var email_id=document.getElementById('email_val_layer').value;
		if(!checkemail(email_id))
		{
		      document.getElementById('email_error').style.display="inline";
		      document.getElementById('email_val_layer').focus();
		      return false;
		}
		else
		      document.getElementById('email_error').style.display="none";
	}
	     	
	document.getElementById('common_error').style.display="none";
	return true;
}

var bugchars = '!#$^&*()+|}{[]?><`%:;/,="\'';

function CharsInBag(s)
{ 
    var i;
    var lchar="";
    for (i = 0; i < s.length; i++)
    {   
        var c = s.charAt(i);
		if(i>0)lchar=s.charAt(i-1);
        if (bugchars.indexOf(c) != -1 || (lchar=="." && c==".")) 
	  return false;
    }
    return true;
}

function isInteger(s)
{ 
    var i;
    for (i = 0; i < s.length; i++)
    {   
        var c = s.charAt(i);
        if ((c >= "0") && (c <= "9") && (c != "."))
	 return false;
    }
    return true;
}

function checkemail(str)
{
		var at="@"
		var dot="."
		var lat=str.indexOf(at)
		var lstr=str.length
		var ldot=str.indexOf(dot)
		var lastdot=str.lastIndexOf(dot)
		if (str.indexOf(at)==-1){
		   return false
		}
		if (str.indexOf(at)==-1 || str.indexOf(at)==0 || str.indexOf(at)==lstr){
		   return false
		}
		if (str.indexOf(dot)==-1 || str.indexOf(dot)==0 || str.indexOf(dot)==lstr || str.substring(lastdot+1)==""){
		    return false
		}
		 
		 if (str.indexOf(at,(lat+1))!=-1){
		    return false
		 }

		 if (str.substring(lat-1,lat)==dot || str.substring(lat+1,lat+2)==dot){
		    return false
		 }

		 if (str.indexOf(dot,(lat+2))==-1){
		    return false
		 }
		
		 if (str.indexOf(" ")!=-1){
		    return false
		 }
		if(CharsInBag(str)==false){
		    return false
		 }
		 var arrEmail=str.split("@")
		 var ldot=arrEmail[1].indexOf(".")
		 if(isInteger(arrEmail[1].substring(ldot+1))==false){
		    return false
		 }
 		 return true					
}

	/* Ajax Call  */

	function createNewXmlHttpObject()
	{
		req = false;
		// For Safari, Firefox, and other non-MS browsers
		if(window.XMLHttpRequest)
		{
		        try
		        {
		                req = new XMLHttpRequest();
		        }
		        catch (e)
		        {
		                req = false;
		        }
		}
		// For Internet Explorer on Windows
		else if(window.ActiveXObject)
		{
		        try
		        {
		                req = new ActiveXObject("Msxml2.XMLHTTP");
		        }
		        catch (e)
		        {
		                try
		                {
		                        req = new ActiveXObject("Microsoft.XMLHTTP");
		                }
		                catch (e)
		                {
		                        req = false;
		                }
		        }
		}
		return req;
	}

	function get()
	{
		var value = "email_val=" + encodeURI( document.getElementById("email_val_layer").value ) + "&mobile=" + encodeURI( document.getElementById("mobile_layer").value );
		var req = createNewXmlHttpObject();
		var docF = document.lead;
		var site_url = docF.site_url.value;
		var to_post=site_url+"/profile/mini_reg.php?action=lead_capture&"+value;
		req.open("POST",to_post,true);
		req.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
		req.send(to_post);
	} 


</script>
