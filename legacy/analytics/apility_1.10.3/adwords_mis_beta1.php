<?

//include("connect.inc");

//$db=connect_misdb();
//$db2=connect_master();

// its my luck that all campaignids are diffrent in all accounts of particular site
// its my luck that all adgroupsids are diffrent in all accounts of particular site
// its my luck that all textads and creativeads are diffrent in all accounts of particular site
// but keywordids are not

include('connect_adwords_db.php');
//$db=mysql_connect("localhost:/tmp/mysql.sock","user","CLDLRTa9") or die(mysql_error());
$dollar_customerId=9662096480;

ini_set(max_execution_time,0);
ini_set(memory_limit,-1);
ini_set(mysql.connect_timeout,-1);
ini_set(default_socket_timeout,180000000);
ini_set(log_errors_max_len,0);



if($site_ajax && !$campaign_ajax)
{
	$sql="SELECT id,name from adwords_$site_ajax.Campaign";
	$res=mysql_query($sql);
	while($row=mysql_fetch_array($res))
	{
		$campaigns.=$row['name']."^".$row['id']."|";
	}
	$campaigns = substr($campaigns, 0, strlen($campaigns)-1);
	echo $campaigns;
	exit();
}
elseif($site_ajax && $campaign_ajax)
{
	$campaign_ajax = substr($campaign_ajax, 0, strlen($campaign_ajax)-1);
	$campaign_ajax = str_replace(",", "','",$campaign_ajax);
	$sql="SELECT belongsToCampaignId,id,name from adwords_$site_ajax.AdGroup where belongsToCampaignId IN ('$campaign_ajax')";
	$res=mysql_query($sql);
	while($row=mysql_fetch_array($res))
	{
		$adgroups.=$row['name']."^".$row['id']."^".$row['belongsToCampaignId']."|";
	}
	$adgroups = substr($adgroups, 0, strlen($adgroups)-1);
	echo $adgroups;
	exit();
}


//if(authenticated($cid))
if(1)
{

echo    '<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<title>Jeevansathi Matrimonials- My Jeevansathi Account</title>
	<link rel="stylesheet" href="jeevansathi.css" type="text/css">
	<style type="text/css">
	.psts{ float:left;line-height:20px; width:65%}
	.baro{width:200px; border:1px solid #C5C5C5; line-height:20px}
	.barin{ background-color:#99CC00; background-image:url(http://ser4.jeevansathi.com/profile/images/bar_complete.gif)}</style>
	<script type="text/javascript" language="javascript">
    	
	function makeRequest(str)
	{
		var httpRequest;
		if (window.XMLHttpRequest)
		{ 	
			// Mozilla, Safari, ...
			httpRequest = new XMLHttpRequest();
			if (httpRequest.overrideMimeType) 
			{
				httpRequest.overrideMimeType("text/xml");
				// See note below about this line
			}
		} 
		else if (window.ActiveXObject) 
		{	// IE
			try{httpRequest = new ActiveXObject("Msxml2.XMLHTTP");} 
			catch (e){try{httpRequest = new ActiveXObject("Microsoft.XMLHTTP");} catch (e) {}}
		}

		if (!httpRequest)
		{
			alert("Giving up :( Cannot create an XMLHTTP instance");
			return false;
		}

		var docF=document.adwords;
		var flag=0;
		while(flag<docF.elements.length)
		{
			if(docF.elements[flag].name=="campaign[]")
			{
				campaign_obj=docF.elements[flag];
			}
			else if(docF.elements[flag].name=="adgroup[]")
			{
				adgroup_obj=docF.elements[flag];
			}
			flag++;
		}
		
		if(str=="campaign_ajax")
		{	
			var campaign_ajax="";
			var len=campaign_obj.options.length;
			for(a=0;a<len;a++)
			{
				if(campaign_obj.options[a].selected)
					campaign_ajax+=campaign_obj.options[a].value + ",";
			}
		}	

		if(str=="site_ajax" && document.adwords.site.value)
			url="adwords_mis.php?site_ajax="+document.adwords.site.value;
		else if(str=="campaign_ajax" && campaign_ajax && document.adwords.site.value)
			url="adwords_mis.php?site_ajax="+document.adwords.site.value+"&campaign_ajax="+campaign_ajax;
		else
			url="";
		if(url)
		{	
			httpRequest.onreadystatechange = function() { getdata(httpRequest,str); };
			httpRequest.open("GET", url, true);
			httpRequest.send("");
		}
		else
		{
			campaign_obj.options.length = 0;
			adgroup_obj.options.length = 0;
		}
	}

	function getdata(httpRequest,str)
	{
		if (httpRequest.readyState == 4)
		{
			if (httpRequest.status == 200)
			{
				var docF=document.adwords;
				var flag=0;
				while(flag<docF.elements.length)
				{
					if(docF.elements[flag].name=="campaign[]")
					{
						campaign_obj=docF.elements[flag];
					}
					else if(docF.elements[flag].name=="adgroup[]")
					{
						adgroup_obj=docF.elements[flag];
					}
					flag++;
				}


				if(str=="site_ajax")
				{	
					campaign_obj.options.length = 0;
					adgroup_obj.options.length = 0;
					var opt = new Option();
					opt.text ="Select...";
					opt.value ="";
					campaign_obj.options[0] = opt
				}
				else
				{	
					adgroup_obj.options.length = 0;
					var opt = new Option();
					opt.text ="Select...";
					opt.value ="";
					adgroup_obj.options[0] = opt
				}
				
				response=httpRequest.responseText;
				
				var update = new Array();
				if(response.indexOf("|" != -1))
				{
					update = response.split("|");
				}
				
				//alert(update.length);
				
				for(i=0;i<update.length;i++)
				{
					var update2 = new Array();
					update2 = update[i].split("^");
					var opt = new Option();
					opt.text = update2[0];
					if(str=="site_ajax")
					{	
						opt.value = update2[1];
						campaign_obj.options[i+1] = opt;
					}
					else
					{	
						opt.value = update2[1] + "#" + update2[2];
						adgroup_obj.options[i+1] = opt;
					}
				}
			}
			else
			{
				alert("There was a problem with the request.");
			}
		}
	}
	
	function validate()
	{
		var flag=0;
		if(document.adwords.site.value!="")
			flag=1;
		else
		{	
			alert("Please Select a site first");
			flag=0;
		}

		if(flag==1)
			return true;
		else
			return false;
	}
	
	function hide_back()
	{
		if(navigator.userAgent.indexOf("Firefox")!=-1)
		{	
			//hide back in firefox
			if(document.getElementById("back"))
				document.getElementById("back").style.display="none";
		}
	}

	var timer
	function scrolltop()
	{
		//document.getElementById("scrollmenu").style.top=document.body.scrollTop
		//timer=setTimeout("scrolltop()",1)
	}
	function stoptimer()
	{
		//clearTimeout(timer)
	}

</script>


<script type="text/javascript" src="calendarDateInput.js"></script>
</head>
<!--body onload="hide_back();scrolltop();" onunload="stoptimer();"-->
<body onload=hide_back();scrolltop();makeRequest("site_ajax");makeRequest("campaign_ajax"); onunload="stoptimer();">';

	/*$PAGELEN=10;    //how many records on one page
        $LINKNO=10;     //upto 1 2 3 ... prev next
        if(!$j)
                $j = 0;*/

	if($CMDGo)
        {
		//$start_dt=$year."-".$month."-".$day;
		//$end_dt=$year2."-".$month2."-".$day2;
	
		//print_r($campaign);	
		if(is_array($campaign) && $campaign[0] )
			$campaign_str = implode("','",$campaign);

		//print_r($adgroup);	
		if(is_array($adgroup) && $adgroup[0] )
		{
			foreach ($adgroup as $value)
			{	
				$adgroup_campaign=explode('#',$value);
				$adgroup_campaign_str.=" (campaignid=$adgroup_campaign[1] and adgroupid=$adgroup_campaign[0]) or ";
				$adgroup_str.="'".$adgroup_campaign[0]."',";
			}
			$adgroup_campaign_str = substr($adgroup_campaign_str, 0, strlen($adgroup_campaign_str)-3);
			$adgroup_str = substr($adgroup_str, 0, strlen($adgroup_str)-1);
		
		}
		//echo $adgroup_campaign_str;
		
		if($groupby1=='day' || $groupby1=='month' || $groupby1=='year' || $groupby1=='quarter')	
		{	
			$sql_groupby1=$groupby1.'(DATE) as '.$groupby1.' ,';
			$groupby_time1=$groupby1;
		}
		if($groupby2=='day' || $groupby2=='month' || $groupby2=='year' || $groupby2=='quarter')	
		{	
			$sql_groupby2=$groupby2.'(DATE) as '.$groupby2.' ,';
			$groupby_time2=$groupby2;
		}
		if($groupby3=='day' || $groupby3=='month' || $groupby3=='year' || $groupby3=='quarter')	
		{	
			$sql_groupby3=$groupby3.'(DATE) as '.$groupby3.' ,';
			$groupby_time3=$groupby3;
		}
		if($groupby4=='day' || $groupby4=='month' || $groupby4=='year' || $groupby4=='quarter')	
		{	
			$sql_groupby4=$groupby4.'(DATE) as '.$groupby4.' ,';
			$groupby_time4=$groupby4;
		}
		
		if($site && $report_type=='campaign')
		{
			$sql="SELECT  SQL_CALC_FOUND_ROWS campaignid, customerId, $sql_groupby1  $sql_groupby2  $sql_groupby3 $sql_groupby4 campaign,budget,campStatus,sum(imps) as imps,sum(clicks) as clicks , ((sum(clicks)/sum(imps))*100) as ctr, (sum(cost)/sum(clicks)) as cpc, (sum(cost)*1000/sum(imps)) as cpm, sum(cost) as cost, (sum(pos)/count(*)) as pos , sum(conv) as conv,(sum(conv)/sum(clicks)*100) as convRate, (sum(cost)/sum(conv)) as costPerConv from adwords_$site.Campaign_Report where Date BETWEEN '$start_dt' AND '$end_dt' ";
			
			if($campaign_str)
				$sql.=" and campaignid in ('$campaign_str') ";
				
			if($filter3_value)
				$sql.=" and campStatus='$filter3_value' ";
			
			$sql.=" group by customerId,campaignid";
		}
		elseif($site && $report_type=='adgroup')
		{
			$sql="SELECT  SQL_CALC_FOUND_ROWS campaignid,  campaign , customerId, $sql_groupby1  $sql_groupby2  $sql_groupby3 $sql_groupby4 adgroupid ,adgroup, agStatus ,sum(imps) as imps,sum(clicks) as clicks , ((sum(clicks)/sum(imps))*100) as ctr, (sum(cost)/sum(clicks)) as cpc, (sum(cost)*1000/sum(imps)) as cpm, sum(cost) as cost, (sum(pos)/count(*)) as pos ,sum(conv) as conv,(sum(conv)/sum(clicks)*100) as convRate, (sum(cost)/sum(conv)) as costPerConv from adwords_$site.AdGroup_Report where Date BETWEEN '$start_dt' AND '$end_dt' ";
			
			if($adgroup_campaign_str)
				$sql.=" and ($adgroup_campaign_str) ";
			elseif($campaign_str)
				$sql.=" and campaignid in ('$campaign_str') ";
			
			$sql.=" and adgroupid!=0 ";	//and adgroupid!='' ";
			
			if($filter3_value)
				$sql.=" and agStatus='$filter3_value' ";
			
			$sql.=" group by customerId,campaignid,adgroupid ";
		}
		elseif($site && $report_type=='creative')
		{
			$sql="SELECT  SQL_CALC_FOUND_ROWS campaignid, campaign, customerId, $sql_groupby1  $sql_groupby2  $sql_groupby3 $sql_groupby4 adgroupid , adgroup, creativeid ,creativeStatus,creativeType ,creativeDestUrl  ,sum(imps) as imps,sum(clicks) as clicks , ((sum(clicks)/sum(imps))*100) as ctr, (sum(cost)/sum(clicks)) as cpc, (sum(cost)*1000/sum(imps)) as cpm, sum(cost) as cost, (sum(pos)/count(*)) as pos ,sum(conv) as conv,(sum(conv)/sum(clicks)*100) as convRate, (sum(cost)/sum(conv)) as costPerConv from adwords_$site.Creative_Report where Date BETWEEN '$start_dt' AND '$end_dt' ";
			
			if($adgroup_campaign_str)
				$sql.=" and ($adgroup_campaign_str) ";
			elseif($campaign_str)
				$sql.=" and campaignid in ('$campaign_str') ";
			
			$sql.=" and creativeid!=0 ";	//and  creativeid!='' ";
			
			if($filter3_value)
				$sql.=" and creativeStatus='$filter3_value' ";
			
			$sql.=" group by customerId,campaignid,adgroupid,creativeid ";
		}
		elseif($site && $report_type=='keyword')
		{
			$sql="SELECT  SQL_CALC_FOUND_ROWS campaignid,  campaign, customerId, $sql_groupby1  $sql_groupby2  $sql_groupby3 $sql_groupby4 adgroupid , adgroup, keywordid ,siteKwStatus , kwSite ,kwSiteType,kwDestUrl  ,sum(imps) as imps,sum(clicks) as clicks , ((sum(clicks)/sum(imps))*100) as ctr, (sum(cost)/sum(clicks)) as cpc, (sum(cost)*1000/sum(imps)) as cpm, sum(cost) as cost, (sum(pos)/count(*)) as pos ,sum(conv) as conv,(sum(conv)/sum(clicks)*100) as convRate, (sum(cost)/sum(conv)) as costPerConv from adwords_$site.KeywordCriterion_Report where Date BETWEEN '$start_dt' AND '$end_dt' ";
			
			if($adgroup_campaign_str)
				$sql.=" and ($adgroup_campaign_str) ";
			elseif($campaign_str)
				$sql.=" and campaignid in ('$campaign_str') ";
			
			$sql.=" and keywordid<>0 and keywordid<>3000000 ";	//and keywordid!='' ";
			
			if($filter3_value)
				$sql.=" and siteKwStatus='$filter3_value' ";
			
			$sql.=" group by customerId,campaignid,adgroupid,keywordid ";
		}

               
		/*if($site && !$campaign && !$adgroup)
			$sql="SELECT campaignid,  customerId, $sql_groupby campaign,budget,campStatus,sum(imps) as imps,sum(clicks) as clicks , ((sum(clicks)/sum(imps))*100) as ctr, (sum(cost)/sum(clicks)) as cpc, (sum(cost)*1000/sum(imps)) as cpm, sum(cost) as cost, (sum(pos)/count(*)) as pos , sum(conv) as conv,(sum(conv)/sum(clicks)*100) as convRate, (sum(cost)/sum(conv)) as costPerConv from adwords_$site.Campaign_Report where Date BETWEEN '$start_dt' AND '$end_dt' group by campaignid";
		
		elseif($site && $campaign && !$adgroup)	
			$sql="SELECT campaignid,  customerId, $sql_groupby adgroupid ,adgroup, agStatus ,sum(imps) as imps,sum(clicks) as clicks , ((sum(clicks)/sum(imps))*100) as ctr, (sum(cost)/sum(clicks)) as cpc, (sum(cost)*1000/sum(imps)) as cpm, sum(cost) as cost, (sum(pos)/count(*)) as pos ,sum(conv) as conv,(sum(conv)/sum(clicks)*100) as convRate, (sum(cost)/sum(conv)) as costPerConv from adwords_$site.AdGroup_Report where campaignid=$campaign and adgroupid!=0 and adgroupid!='' and Date BETWEEN '$start_dt' AND '$end_dt' group by adgroupid";
				
		elseif($site && $campaign && $adgroup)	
		{
			if($keyword_creative=='keyword')
				$sql="SELECT campaignid,  customerId, $sql_groupby adgroupid , keywordid ,siteKwStatus , kwSite ,kwSiteType,kwDestUrl  ,sum(imps) as imps,sum(clicks) as clicks , ((sum(clicks)/sum(imps))*100) as ctr, (sum(cost)/sum(clicks)) as cpc, (sum(cost)*1000/sum(imps)) as cpm, sum(cost) as cost, (sum(pos)/count(*)) as pos ,sum(conv) as conv,(sum(conv)/sum(clicks)*100) as convRate, (sum(cost)/sum(conv)) as costPerConv from adwords_$site.KeywordCriterion_Report where adgroupid=$adgroup and  campaignid=$campaign and keywordid!=0 and keywordid!='' and Date BETWEEN '$start_dt' AND '$end_dt' group by keywordid ";
			else
				$sql="SELECT campaignid,  customerId, $sql_groupby adgroupid , creativeid ,creativeStatus,creativeType ,creativeDestUrl  ,sum(imps) as imps,sum(clicks) as clicks , ((sum(clicks)/sum(imps))*100) as ctr, (sum(cost)/sum(clicks)) as cpc, (sum(cost)*1000/sum(imps)) as cpm, sum(cost) as cost, (sum(pos)/count(*)) as pos ,sum(conv) as conv,(sum(conv)/sum(clicks)*100) as convRate, (sum(cost)/sum(conv)) as costPerConv from adwords_$site.Creative_Report where adgroupid=$adgroup and campaignid=$campaign and creativeid!=0 and creativeid!=3000000 and  creativeid!='' and Date BETWEEN '$start_dt' AND '$end_dt' group by creativeid ";
		}*/
		
		if($groupby1)
			$sql.=' ,'.$groupby1;
		if($groupby2)
			$sql.=' ,'.$groupby2;
		if($groupby3)
			$sql.=' ,'.$groupby3;
		if($groupby4)
			$sql.=' ,'.$groupby4;
		
		if($filter1 && $filter1_type && $filter1_value!='' )
			$sql.=" HAVING $filter1 $filter1_type $filter1_value ";
		if($filter2 && $filter2_type && $filter2_value!='' )
		{	
			if($filter1 && $filter1_type && $filter1_value!='' )
				$sql.=" and ";
			else
				$sql.=" HAVING ";
			$sql.=" $filter2 $filter2_type $filter2_value ";
		}
		/*if( ($filter1 && $filter1_type && $filter1_value) || ($filter2 && $filter2_type && $filter2_value) )	
		{
			if($filter3_value)
			{
				$sql.=" and ";
				$filter3=1;
			}	
		}
		elseif($filter3_value)
		{
			$sql.=" HAVING ";
			$filter3=1;
		}*/	
		

		$color[$groupby1]="#CCFFFF";	
		$color[$groupby2]="#CCFFFF";	
		$color[$groupby3]="#CCFFFF";	
		$color[$groupby4]="#CCFFFF";	
		
		if($orderby)
			$sql.=' order by '.$orderby.' '.$orderby_type;
	
		/*$sql.=" limit $j,$PAGELEN ";
		if($j)
                        $cPage = ($j/$PAGELEN) + 1;
                else
                        $cPage = 1;
                $smarty->assign("CURRENTPAGE",$cPage);
                $no_of_pages=ceil($TOTALREC/$PAGELEN);
                if($no_of_pages)
                        $smarty->assign("NO_OF_PAGES",$no_of_pages);
                else
                        $smarty->assign("NO_OF_PAGES","1");*/

		
		//echo $sql;
		//die('<br>abcd');
		
		$res=mysql_query($sql);	
		
		/*$sql_rows="select FOUND_ROWS() as cnt";
		$result_rows=mysql_query($sql_rows) or logError("Due to a temporary problem your request could not be processed. Please try after a couple of minutes",$sql_rows,"ShowErrTemplate");
		$count_rows=mysql_fetch_row($result_rows);
		pagelink($PAGELEN,$count_rows[0],$cPage,$LINKNO,'',"adwords_mis.php",'','',$folderid,'','',$sortorder1);*/

		while($row=mysql_fetch_array($res))
                {
			$customerId_arr[]=$row['customerId'];
			$campaignid_arr[]=$row['campaignid'];
			$campaign_arr[]=$row['campaign'];
			$campStatus_arr[]=$row['campStatus'];
			$budget_arr[]=($row['budget']/1000000);
			$adgroup_arr[]=$row['adgroup'];
			$adgroupid_arr[]=$row['adgroupid'];
			$agStatus_arr[]=$row['agStatus'];
			$keywordid_arr[]=$row['keywordid'];
			$siteKwStatus_arr[]=$row['siteKwStatus'];
			$kwSite_arr[]=$row['kwSite'];
			$kwSiteType_arr[]=$row['kwSiteType'];
			$kwDestUrl_arr[]=$row['kwDestUrl'];
			$creativeid_arr[]=$row['creativeid'];
			$creativeStatus_arr[]=$row['creativeStatus'];
			$creativeType_arr[]=$row['creativeType'];
			$creativeDestUrl_arr[]=$row['creativeDestUrl'];
			$groupby1_arr[]=$row[$groupby_time1];
			$groupby2_arr[]=$row[$groupby_time2];
			$groupby3_arr[]=$row[$groupby_time3];
			$groupby4_arr[]=$row[$groupby_time4];
			$imps_arr[]=$row['imps'];
			$clicks_arr[]=$row['clicks'];
			$ctr_arr[]=round($row['ctr'],2);
			$cpc_arr[]=round($row['cpc'],2);
			$cpm_arr[]=round($row['cpm'],2);
			$cost_arr[]=$row['cost'];
			$pos_arr[]=round($row['pos'],2);
			$conv_arr[]=$row['conv'];
			$convRate_arr[]=round($row['convRate'],2);
			$costPerConv_arr[]=round($row['costPerConv'],2);						
		}

		/*if(is_array($campaignid_arr))
		{
			$campaignid_unique_arr=array_unique($campaignid_arr);
			$campaign_str = implode("','",$campaignid_unique_arr);
			$sql_campaign_name="SELECT name,id from adwords_$site.Campaign where id in ('$campaign_str')";
			$res_campaign_name=mysql_query($sql_campaign_name);	
			while($row_campaign_name=mysql_fetch_array($res_campaign_name))
			{
				$campaign_name[$row_campaign_name['id']]=$row_campaign_name['name'];	
			}
		}
		if(is_array($adgroupid_arr))
		{
			$adgroupid_unique_arr=array_unique($adgroupid_arr);
			$adgroup_str= implode("','",$adgroupid_unique_arr);
			$sql_adgroup_name="SELECT name,id from adwords_$site.AdGroup where id in ('$adgroup_str')";
			$res_adgroup_name=mysql_query($sql_adgroup_name);	
			while($row_adgroup_name=mysql_fetch_array($res_adgroup_name))
			{
				$adgroup_name[$row_adgroup_name['id']]=$row_adgroup_name['name'];	
			}
		}*/	

			
               echo
                '<table width=100% border=0 align="center">
                <tr><td colspan="2">&nbsp;</td></tr>
                <tr class="formhead" width="100%"><td align="center">SEM – Automating Monitoring and Maintenance</td></tr>
                <tr><td colspan="2">&nbsp;</td></tr>
                </table>';


		echo    
		'<table width=100% border=0 align="center">
		<tr class="formhead" width="100%"><td align="center" colspan=14>Date Range: From '.$start_dt.'  To '. $end_dt.'</td></tr>
		<tr class="formhead" width="100%"><td align="center" colspan=14>Site:  '.$site.'</td></tr>';
		
		echo '<tr class="formhead" width="100%"><td align="center" colspan=14><a id="back" name="back" href="adwords_mis.php?day='.$day.'&month='.$month.'&year='.$year.'&day2='.$day2.'&month2='.$month2.'&year2='.$year2.'">BACK</a></td></tr>

		</table>';

		echo    
		'<table width="100%"  border="1" cellspacing="3" cellpadding="3" class="mediumblack">
	
		<!--tr class="formhead" id="scrollmenu" style="position:absolute"-->
		<tr class="formhead">';
	
			if($groupby_time1 && is_array($customerId_arr) )	
				//echo	'<td align="center" bgcolor="#CCFFFF">'.$groupby_time1.'</td>	<!--cakr-->';
				$td.='<td align="center" bgcolor="#CCFFFF">'.$groupby_time1.'</td>	<!--cakr-->';
			if($groupby_time2 && is_array($customerId_arr) )	
				//echo	'<td align="center" bgcolor="#CCFFFF">'.$groupby_time2.'</td>	<!--cakr-->';
				$td.='<td align="center" bgcolor="#CCFFFF">'.$groupby_time2.'</td>	<!--cakr-->';
			if($groupby_time3 && is_array($customerId_arr) )	
				//echo	'<td align="center" bgcolor="#CCFFFF">'.$groupby_time3.'</td>	<!--cakr-->';
				$td.='<td align="center" bgcolor="#CCFFFF">'.$groupby_time3.'</td>	<!--cakr-->';
			if($groupby_time4 && is_array($customerId_arr) )	
				//echo	'<td align="center" bgcolor="#CCFFFF">'.$groupby_time4.'</td>	<!--cakr-->';
				$td.='<td align="center" bgcolor="#CCFFFF">'.$groupby_time4.'</td>	<!--cakr-->';

			//if($site && !$campaign && !$adgroup && is_array($campaignid_arr) )	
			if($site && $report_type=='campaign' && is_array($campaignid_arr) )	
			{
				$upto=count($campaignid_arr);
				//echo 	
				$td.='<td align="center" bgcolor="#CCFFFF">Campaign Id</td>	<!--c-->
				<td align="center">Campaign</td>	<!--c-->
				<td align="center">Current Status</td>	<!--cakr-->
				<td align="center">Current Budget</td>	<!--c-->
				<td align="center" bgcolor="'.$color['clicks'].'">Clicks</td>		<!--cakr-->
				<td align="center" bgcolor="'.$color['imps'].'">Impr</td>		<!--cakr-->	
				<td align="center" bgcolor="'.$color['ctr'].'">CTR %</td>		<!--cakr-->
				<td align="center" bgcolor="'.$color['cpc'].'">Avg CPC</td>		<!--cak-->
				<td align="center" bgcolor="'.$color['cpm'].'">Avg CPM</td>		<!--c-->	
				<td align="center" bgcolor="'.$color['cost'].'">Cost</td>		<!--cakr-->
				<td align="center" bgcolor="'.$color['convRate'].'">Conv Rate %</td>	<!--cakr-->
				<td align="center" bgcolor="'.$color['costPerConv'].'">Cost/Conv</td>	<!--cakr-->
				<td align="center" bgcolor="'.$color['conv'].'">Conversions</td>	<!--c-->';
			}
			//elseif($site && $campaign && !$adgroup && is_array($adgroupid_arr) )	
			elseif($site && $report_type=='adgroup' && is_array($adgroupid_arr) )
			{
				$adgroupid_str = implode("','",$adgroupid_arr);
		
				$sql_adgroup="SELECT maxCpc,id from adwords_$site.AdGroup where id in ('$adgroupid_str') ";
				$res_adgroup=mysql_query($sql_adgroup);	
				while($row_adgroup=mysql_fetch_array($res_adgroup))
				{
					$maxCpc_arr[$row_adgroup['id']]=$row_adgroup['maxCpc'];	
				}
				
				$upto=count($adgroupid_arr);
				//echo 	
				$td.='<td align="center" bgcolor="#CCFFFF">Campaign Id</td>	<!--c-->
				<td align="center" bgcolor="#CCFFFF">Adgroup Id</td>	<!--a-->
				<td align="center" >Campaign</td>	<!--c-->
				<td align="center">Adgroup</td>		<!--a-->
				<td align="center">Current Status</td>	<!--cakr-->
				<td align="center">Max CPC </td>		<!--ak-->
				<td align="center" bgcolor="'.$color['clicks'].'">Clicks</td>		<!--cakr-->
				<td align="center" bgcolor="'.$color['imps'].'">Impr</td>		<!--cakr-->	
				<td align="center" bgcolor="'.$color['ctr'].'">CTR %</td>		<!--cakr-->
				<td align="center" bgcolor="'.$color['cpc'].'">Avg CPC</td>		<!--cak-->
				<td align="center" bgcolor="'.$color['cost'].'">Cost</td>		<!--cakr-->
				<td align="center">Avg Pos</td>		<!--ak-->
				<td align="center" bgcolor="'.$color['convRate'].'">Conv Rate %</td>	<!--cakr-->
				<td align="center" bgcolor="'.$color['costPerConv'].'">Cost/Conv</td>	<!--cakr-->';
			}
			//elseif($site && $campaign && $adgroup && $keyword_creative=='keyword' && is_array($keywordid_arr) )	
			elseif($site && $report_type=='keyword' && is_array($keywordid_arr) )
			{
				
                                $keywordid_str = implode("','",$keywordid_arr);
				$adgroupid_str = implode("','",$adgroupid_arr);

                                $sql_keyword="SELECT maxCpc,id,belongsToAdGroupId,text,status from adwords_$site.KeywordCriterion where id in ('$keywordid_str') and belongsToAdGroupId in ('$adgroupid_str') ";
                                $res_keyword=mysql_query($sql_keyword);
                                while($row_keyword=mysql_fetch_array($res_keyword))
                                {
                                        $maxCpc_arr[$row_keyword['belongsToAdGroupId']][$row_keyword['id']]=array("maxCpc" => $row_keyword['maxCpc'],"text"  => $row_keyword['text'], "status" => $row_keyword['status'] )  ;
                                }

				$upto=count($keywordid_arr);
				//echo 
				$td.='<td align="center" bgcolor="#CCFFFF">Campaign Id</td>	<!--c-->
				<td align="center" bgcolor="#CCFFFF">Adgroup Id</td>	<!--a-->
				<td align="center" bgcolor="#CCFFFF">Keyword Id</td>	<!--k-->
				<td align="center" >Campaign</td>	<!--c-->
				<td align="center">Adgroup</td>		<!--a-->
				<td align="center">Keyword</td>	<!--k-->
				<td align="center">Type</td>	<!--k-->
				<td align="center">Current Status</td>	<!--cakr-->
				<td align="center">Max CPC </td>		<!--ak-->
				<td align="center" bgcolor="'.$color['clicks'].'">Clicks</td>		<!--cakr-->
				<td align="center" bgcolor="'.$color['imps'].'">Impr</td>		<!--cakr-->	
				<td align="center" bgcolor="'.$color['ctr'].'">CTR %</td>		<!--cakr-->
				<td align="center" bgcolor="'.$color['cpc'].'">Avg CPC</td>		<!--cak-->
				<td align="center" bgcolor="'.$color['cost'].'">Cost</td>		<!--cakr-->
				<td align="center">Avg Pos</td>		<!--ak-->
				<td align="center" bgcolor="'.$color['convRate'].'">Conv Rate %</td>	<!--cakr-->
				<td align="center" bgcolor="'.$color['costPerConv'].'">Cost/Conv</td>	<!--cakr-->';
			}
			//elseif($site && $campaign && $adgroup && $keyword_creative=='creative' && is_array($creativeid_arr) )	
			elseif($site && $report_type=='creative' && is_array($creativeid_arr) )
			{
				foreach( $creativeType_arr as $key => $value)
				{
					if($value=='text')
						$textid_arr[]=$creativeid_arr[$key];
					else
						$imageid_arr[]=$creativeid_arr[$key];
				}
				if(is_array($textid_arr))
					$textid_str = implode("','",$textid_arr);
				if(is_array($imageid_arr))
					$imageid_str = implode("','",$imageid_arr);

				if($textid_str || $imageid_str)
                                {
					if($textid_str)
					{	
						$sql_creative="SELECT id,headline,description1,description2,displayUrl,destinationUrl from adwords_$site.TextAd where id in ('$textid_str') ";
						$res_creative=mysql_query($sql_creative);
						while($row_creative=mysql_fetch_array($res_creative))
						{
							$maxCpc_arr[$row_creative['id']]=array("headline"=>$row_creative['headline'],"description1"=>$row_creative['description1'],"description2"=>$row_creative['description2'],"displayUrl"=>$row_creative['displayUrl'],"destinationUrl" =>$row_creative['destinationUrl'],"name"=>$row_creative['name'],"width"=>$row_creative['width'],"height" =>$row_creative['height'], "thumbnailUrl"=>$row_creative['thumbnailUrl']);
						}
					}
					if($imageid_str)
					{	
						$sql_creative="SELECT id,name,width,height, thumbnailUrl,displayUrl,destinationUrl from adwords_$site.ImageAd where id in ('$imageid_str') ";
						$res_creative=mysql_query($sql_creative);
						while($row_creative=mysql_fetch_array($res_creative))
						{
							$maxCpc_arr[$row_creative['id']]=array("headline"=>$row_creative['headline'],"description1"=>$row_creative['description1'],"description2"=>$row_creative['description2'],"displayUrl"=>$row_creative['displayUrl'],"destinationUrl" =>$row_creative['destinationUrl'],"name"=>$row_creative['name'],"width"=>$row_creative['width'],"height" =>$row_creative['height'], "thumbnailUrl"=>$row_creative['thumbnailUrl']);
						}
					}
				}
				//print_r($maxCpc_arr);
				
				$upto=count($creativeid_arr);
				//echo 
				$td.='<td align="center" bgcolor="#CCFFFF">Campaign Id</td>	<!--c-->
				<td align="center" bgcolor="#CCFFFF">Adgroup Id</td>	<!--a-->
				<td align="center" bgcolor="#CCFFFF">Creative Id</td>	<!--r-->
				<td align="center" >Campaign</td>	<!--c-->
				<td align="center">Adgroup</td>		<!--a-->
				<td align="center">Creative </td>	<!--r-->
				<td align="center">Current Status</td>	<!--cakr-->
				<td align="center" bgcolor="'.$color['clicks'].'">Clicks</td>		<!--cakr-->
				<td align="center" bgcolor="'.$color['imps'].'">Impr</td>		<!--cakr-->	
				<td align="center" bgcolor="'.$color['ctr'].'">CTR %</td>		<!--cakr-->
				<td align="center" bgcolor="'.$color['cost'].'">Cost</td>		<!--cakr-->
				<td align="center" bgcolor="'.$color['convRate'].'">Conv Rate %</td>	<!--cakr-->
				<td align="center" bgcolor="'.$color['costPerConv'].'">Cost/Conv</td>	<!--cakr-->';
			}
		echo $td;
		echo '</tr>';

		$repeat=15;
		if($report_type=='creative')
			$repeat=5;
		
		for($i=0;$i<$upto;$i++)
		{
			if($i%$repeat==0 && $i>1)
				echo '<tr class="formhead">'.$td.'</tr>';

			echo    '<tr class="fieldsnew">';
			
			if($groupby_time1)	
				echo	'<td align="center">'.$groupby1_arr[$i].'</td>	<!--cakr-->';
			if($groupby_time2)	
				echo	'<td align="center">'.$groupby2_arr[$i].'</td>	<!--cakr-->';
			if($groupby_time3)	
				echo	'<td align="center">'.$groupby3_arr[$i].'</td>	<!--cakr-->';
			if($groupby_time4)	
				echo	'<td align="center">'.$groupby4_arr[$i].'</td>	<!--cakr-->';
                        
			if($customerId_arr[$i]==$dollar_customerId)
				$currency='$ ';
			else	 	
				$currency='Rs ';
				
				//if($site && !$campaign && !$adgroup && is_array($campaignid_arr) )	
				if($site && $report_type=='campaign' && is_array($campaignid_arr) )	
				{
					echo 
					'<td align="center">'.$campaignid_arr[$i].'</td>	<!--c-->
					<td align="center">'.$campaign_arr[$i].'</td>	<!--c-->
					<td align="center">'.$campStatus_arr[$i].'</td>	<!--cakr-->
					<td align="center">'.$currency.''.$budget_arr[$i].'</td>	<!--c-->
					<td align="center">'.$clicks_arr[$i].'</td>		<!--cakr-->
					<td align="center">'.$imps_arr[$i].'</td>		<!--cakr-->	
					<td align="center">'.$ctr_arr[$i].'</td>		<!--cakr-->
					<td align="center">'.$currency.' '.$cpc_arr[$i].'</td>		<!--cak-->
					<td align="center">'.$currency.' '.$cpm_arr[$i].'</td>		<!--c-->	
					<td align="center">'.$currency.' '.$cost_arr[$i].'</td>		<!--cakr-->
					<td align="center">'.$convRate_arr[$i].'</td>	<!--cakr-->
					<td align="center">'.$currency.' '.$costPerConv_arr[$i].'</td>	<!--cakr-->
					<td align="center">'.$conv_arr[$i].'</td>	<!--c-->';
				}
				//elseif($site && $campaign && !$adgroup && is_array($adgroupid_arr) )	
				elseif($site && $report_type=='adgroup' && is_array($adgroupid_arr) )
				{
					echo 	
					'<td align="center">'.$campaignid_arr[$i].'</td>	<!--a-->
					<td align="center">'.$adgroupid_arr[$i].'</td>	<!--a-->
					<!--td align="center">'.$campaign_name[$campaignid_arr[$i]].'</td-->	<!--a-->
					<td align="center">'.$campaign_arr[$i].'</td>	<!--c-->
					<td align="center">'.$adgroup_arr[$i].'</td>	<!--a-->
					<td align="center">'.$agStatus_arr[$i].'</td>	<!--cakr-->
					<td align="center">'.$currency.' '.$maxCpc_arr[$adgroupid_arr[$i]].'</td>		<!--ak-->
					<td align="center">'.$clicks_arr[$i].'</td>		<!--cakr-->
					<td align="center">'.$imps_arr[$i].'</td>		<!--cakr-->	
					<td align="center">'.$ctr_arr[$i].'</td>		<!--cakr-->
					<td align="center">'.$currency.' '.$cpc_arr[$i].'</td>		<!--cak-->
					<td align="center">'.$currency.' '.$cost_arr[$i].'</td>		<!--cakr-->
					<td align="center">'.$pos_arr[$i].'</td>		<!--ak-->
					<td align="center">'.$convRate_arr[$i].'</td>	<!--cakr-->
					<td align="center">'.$currency.' '.$costPerConv_arr[$i].'</td>	<!--cakr-->';
				}
				//elseif($site && $campaign && $adgroup && $keyword_creative=='keyword' && is_array($keywordid_arr))	
				elseif($site && $report_type=='keyword' && is_array($keywordid_arr) )
				{
					echo 
					'<td align="center">'.$campaignid_arr[$i].'</td>	<!--a-->
					<td align="center">'.$adgroupid_arr[$i].'</td>	<!--a-->
					<td align="center">'.$keywordid_arr[$i].'</td>	<!--k-->
					<!--td align="center">'.$campaign_name[$campaignid_arr[$i]].'</td-->	<!--a-->
					<!--td align="center">'.$adgroup_name[$adgroupid_arr[$i]].'</td-->	<!--a-->
					<td align="center">'.$campaign_arr[$i].'</td>	<!--c-->
					<td align="center">'.$adgroup_arr[$i].'</td>	<!--a-->';
					
				
					if($keywordid_arr[$i]==3000000)	
						echo '<td align="center">Content network</td>	<!--k-->';
					elseif($kwSite_arr[$i])
						echo '<td align="center">'.$kwSite_arr[$i].'</td>	<!--k-->';
					else
						//echo '<td align="center">'.$maxCpc_arr[$keywordid_arr[$i]]['text'].'</td>	<!--k-->';
						echo '<td align="center"></td>	<!--k-->';
					echo '<td align="center">'.$kwSiteType_arr[$i].'</td>	<!--k-->';
					if($keywordid_arr[$i]==3000000)
						echo '<td align="center"></td>	<!--cakr-->';
					elseif($siteKwStatus_arr[$i])
						echo '<td align="center">'.$siteKwStatus_arr[$i].'</td>	<!--cakr-->';
					else
						//echo '<td align="center">'.$maxCpc_arr[$keywordid_arr[$i]]['status'].'</td>	<!--k-->';
						echo '<td align="center"></td>	<!--k-->';

					echo '<td align="center">'.$currency.' '.$maxCpc_arr[$adgroupid_arr[$i]][$keywordid_arr[$i]]['maxCpc'].' </td> <!--ak-->';
					echo '<td align="center">'.$clicks_arr[$i].'</td>		<!--cakr-->
					<td align="center">'.$imps_arr[$i].'</td>		<!--cakr-->	
					<td align="center">'.$ctr_arr[$i].'</td>		<!--cakr-->
					<td align="center">'.$currency.' '.$cpc_arr[$i].'</td>		<!--cak-->
					<td align="center">'.$currency.' '.$cost_arr[$i].'</td>		<!--cakr-->
					<td align="center">'.$pos_arr[$i].'</td>		<!--ak-->
					<td align="center">'.$convRate_arr[$i].'</td>	<!--cakr-->
					<td align="center">'.$currency.' '.$costPerConv_arr[$i].'</td>	<!--cakr-->';
				}
				//elseif($site && $campaign && $adgroup && $keyword_creative=='creative' && is_array($creativeid_arr))	
				elseif($site && $report_type=='creative' && is_array($creativeid_arr) )
				{
					echo '<td align="center">'.$campaignid_arr[$i].'</td>	<!--a-->
					<td align="center">'.$adgroupid_arr[$i].'</td>	<!--a-->
					<td align="center">'.$creativeid_arr[$i].'</td>	<!--cakr-->
					<!--td align="center">'.$campaign_name[$campaignid_arr[$i]].'</td-->	<!--a-->
					<!--td align="center">'.$adgroup_name[$adgroupid_arr[$i]].'</td-->	<!--a-->
					<td align="center">'.$campaign_arr[$i].'</td>	<!--c-->
					<td align="center">'.$adgroup_arr[$i].'</td>	<!--a-->';
					
					if($creativeType_arr[$i]=='text')
						echo 
						'<td align="center">'.$maxCpc_arr[$creativeid_arr[$i]]["headline"].' <br> '.$maxCpc_arr[$creativeid_arr[$i]]["description1"].' <br> '.$maxCpc_arr[$creativeid_arr[$i]]["description2"].' <br> '.$maxCpc_arr[$creativeid_arr[$i]]["displayUrl"].' <br> '.$maxCpc_arr[$creativeid_arr[$i]]["destinationUrl"].'    </td>	<!--r-->';
					else	
						echo 
						'<td align="center">'.$maxCpc_arr[$creativeid_arr[$i]]["name"].' <br> '.$maxCpc_arr[$creativeid_arr[$i]]["width"].' x '.$maxCpc_arr[$creativeid_arr[$i]]["height"].' px <br> <img src='.$maxCpc_arr[$creativeid_arr[$i]]["thumbnailUrl"].'>  <br> '.$maxCpc_arr[$creativeid_arr[$i]]["destinationUrl"].'  </td>	<!--r-->';
					
					echo '<td align="center">'.$creativeStatus_arr[$i].'</td>	<!--cakr-->
					<td align="center">'.$clicks_arr[$i].'</td>		<!--cakr-->
					<td align="center">'.$imps_arr[$i].'</td>		<!--cakr-->	
					<td align="center">'.$ctr_arr[$i].'</td>		<!--cakr-->
					<td align="center">'.$currency.' '.$cost_arr[$i].'</td>		<!--cakr-->
					<td align="center">'.$convRate_arr[$i].'</td>	<!--cakr-->
					<td align="center">'.$currency.' '.$costPerConv_arr[$i].'</td>	<!--cakr-->';
				}
			
			echo 	'</tr>';
		}	
		echo '</table>';
	}
	else
	{
		echo 
		'<table width=100% border=0 align="center">
		<tr class="formhead" width="100%"><td align="center">SEM – Automating Monitoring and Maintenance</td></tr>
		<!--tr class="formhead" width="100%"><td align="center">Report will show data from 22nd Oct 2007 onwards</td></tr-->
		<tr><td colspan="2">&nbsp;</td></tr>
		</table>';
		

		$yesterday  = mktime(0, 0, 0, date("m")  , date("d")-2, date("Y"));
		$dt_arr=explode("-",date('Y-m-d',$yesterday));
		//print_r($dt_arr);
		$mmarr_name=array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
		
		for($i=0;$i<12;$i++)
                {
                        $mmarr[$i]=$i+1;
                }
                for($i=0;$i<31;$i++)
                {
                        $ddarr[$i]=$i+1;
                }
                for($i=0;$i<10;$i++)
                {
                        $yyarr[$i]=$i+2005;
                }

		//$yesterday=$dt_arr[2]-2;
		//$yesterday=$dt_arr[2];
		//echo $yesterday;	
		

		echo'
		<form name="adwords" method="post" action="adwords_mis.php" onsubmit="return validate();">
			

		<input type="hidden" name="cid" value="~$cid`">
		<table border=0 cellspacing=0 cellpadding=0 width="100%">
		
		<tr>
			<td class="label"> Date range </td>
			<td class="fieldsnew">From:&nbsp;&nbsp;&nbsp;&nbsp;
		
			<!--script> DateInput("start_dt", true, "YYYY-MM-DD","'.$dt_arr[0].'-'.$dt_arr[1].'-01")</script-->
			<script> DateInput("start_dt", true, "YYYY-MM-DD","'.$dt_arr[0].'-'.$dt_arr[1].'-'.$dt_arr[2].'")</script>
				
				<!--select name=day>';
					for($i=0;$i<31;$i++)
						echo '<option value='.$ddarr[$i].'>'.$ddarr[$i].'</option>';
		
		echo'		</select> -
				<select name=month>';
					for($i=0;$i<12;$i++)
					{	
						echo '<option value='.$mmarr[$i];
						if($dt_arr[1]==$mmarr[$i])
							echo ' selected ';
						echo '>'.$mmarr_name[$i].'</option>';
					} 
					

		echo'		</select> -
				<select name=year>';
					for($i=0;$i<10;$i++)
					{	
						echo '<option value='.$yyarr[$i];
						if($dt_arr[0]==$yyarr[$i])
							echo ' selected ';
						echo '>'.$yyarr[$i].'</option>';
					}
		echo'		</select-->
		

			</td>
			
			<td class="fieldsnew">To:&nbsp;&nbsp;&nbsp;&nbsp;
		
			<script> DateInput("end_dt", true, "YYYY-MM-DD","'.$dt_arr[0].'-'.$dt_arr[1].'-'.$dt_arr[2].'")</script>
				
				<!--select name=day2>';
					for($i=0;$i<31;$i++)
					{	
						echo '<option value='.$ddarr[$i];
						if(($dt_arr[2]-1)==$ddarr[$i])
							echo ' selected ';
						echo '>'.$ddarr[$i].'</option>';
					}
		echo'		</select> -
				<select name=month2>';
					for($i=0;$i<12;$i++)
					{	
						echo '<option value='.$mmarr[$i];
						if($dt_arr[1]==$mmarr[$i])
							echo ' selected ';
						echo '>'.$mmarr_name[$i].'</option>';
					}
		echo'		</select> -
				<select name=year2>';
					for($i=0;$i<10;$i++)
					{	
						echo '<option value='.$yyarr[$i];
						if($dt_arr[0]==$yyarr[$i])
							echo ' selected ';
						echo '>'.$yyarr[$i].'</option>';
					}
		echo'		</select-->
			

			</td>
		</tr>';
		
		echo '<tr><td colspan="2">&nbsp;</td></tr>';
	
		echo '<tr><td class="label"> Site </td>
			
			<td class="fieldsnew">
				
				<select name=site onchange=makeRequest("site_ajax");>
						<option value="">Select...</option>
						<option value="naukri">naukri</option>
						<option value="jeevansathi">jeevansathi</option>
						<option value="99acres">99acres</option>
		
				</select>
			</td></tr>';
		
		
		echo '<tr><td colspan="2">&nbsp;</td></tr>';
		
		echo '<tr><td class="label"> Campaigns </td>
			
			<td class="fieldsnew">
				
				<select name=campaign[] onchange=makeRequest("campaign_ajax"); multiple size=7>
					<option value=""></option>
				</select>
			</td></tr>';
		
		
		echo '<tr><td colspan="2">&nbsp;</td></tr>';
			
		echo '<tr><td class="label"> Adgroups </td>
			
			<td class="fieldsnew">
				
				<select name=adgroup[] multiple size=7>
					<option value=""></option>
				</select>
				
			
			</td></tr>';
		
		echo '<tr><td colspan="2">&nbsp;</td></tr>';
		
		echo '<tr><td class="label"> Report Type </td>
			<td class="fieldsnew"><input type=radio name=report_type value="keyword" checked>Keyword Report</td>
			<td class="fieldsnew"><input type=radio name=report_type value="creative">Creative Report</td>
			<td class="fieldsnew"><input type=radio name=report_type value="adgroup">Adgroup Report</td>
			<td class="fieldsnew"><input type=radio name=report_type value="campaign">Campaign Report</td>
		</tr>';
		
		echo '<tr><td colspan="2">&nbsp;</td></tr>';

		echo '<tr><td class="label"> Filter 1 </td>
			
			<td class="fieldsnew">
				<select name=filter1>
					<option value="">Select...</option>
					<option value="imps"> Impressions</option>
					<option value="clicks"> Clicks</option>
					<option value="ctr"> CTR</option>
					<option value="cpc"> CPC</option>
					<option value="cpm"> CPM</option>
					<option value="cost"> Cost</option>
					<option value="conv"> Conversions</option>
					<option value="convRate"> Conversion Rate</option>
					<option value="costPerConv"> Cost Per Conversion</option>
				</select>
			</td>
			<td class="fieldsnew">  
				<select name=filter1_type>
					<option value=">">></option>
					<option value="<"><</option>
					<option value="=">=</option>
				</select>
			</td>
			<td class="fieldsnew">Value:  
				<input type="text" name="filter1_value">
			</td>
		</tr>';	
		
		echo '<tr><td class="label"> Filter 2 </td>
			
			<td class="fieldsnew">
				<select name=filter2>
					<option value="">Select...</option>
					<option value="imps"> Impressions</option>
					<option value="clicks"> Clicks</option>
					<option value="ctr"> CTR</option>
					<option value="cpc"> CPC</option>
					<option value="cpm"> CPM</option>
					<option value="cost"> Cost</option>
					<option value="conv"> Conversions</option>
					<option value="convRate"> Conversion Rate</option>
					<option value="costPerConv"> Cost Per Conversion</option>
				</select>
			</td>
			<td class="fieldsnew">  
				<select name=filter2_type>
					<option value=">">></option>
					<option value="<"><</option>
					<option value="=">=</option>
				</select>
			</td>
			<td class="fieldsnew">Value:  
				<input type="text" name="filter2_value">
			</td>
		</tr>';	
		
		echo '<tr><td class="label"> Filter 3, Status=</td>
			
			<td class="fieldsnew">
				<select name=filter3_value>
					<option value="">Select...</option>
					<option value="Active">Keyword_Active</option>
					<option value="InActive">Keyword_InActive</option>
					<option value="Disapproved">Keyword_Disapproved</option>
					<option value="Deleted">Keyword_Deleted</option>
					<option value="">------</option>
					<option value="Enabled">Ad_Enabled</option>
					<option value="Disabled">Ad_Disabled</option>
					<option value="Paused">Ad_Paused</option>
					<option value="">------</option>
					<option value="Active">Campaign_Active</option>
					<option value="Paused">Campaign_Paused</option>
					<option value="Pending">Campaign_Pending</option>
					<option value="Deleted">Campaign_Deleted</option>
					<option value="Suspended">Campaign_Suspended</option>
					<option value="Ended">Campaign_Ended</option>
				</select>
			</td>
		</tr>';	
		
		echo '<tr><td colspan="2">&nbsp;</td></tr>';
			
		echo '<tr><td class="label"> Group By </td>
			
			<td class="fieldsnew">
				<select name=groupby1>
					<option value="">Select...</option>
					<option value="day">day</option>
					<option value="month">month</option>
					<option value="quarter">quarter</option>
					<option value="year">year</option>
					<option value="imps"> Impressions</option>
					<option value="clicks"> Clicks</option>
					<option value="ctr"> CTR</option>
					<option value="cpc"> CPC</option>
					<option value="cpm"> CPM</option>
					<option value="cost"> Cost</option>
					<option value="conv"> Conversions</option>
					<option value="convRate"> Conversion Rate</option>
					<option value="costPerConv"> Cost Per Conversion</option>
				</select>
			</td>
			
			<td class="fieldsnew">
				<select name=groupby2>
					<option value="">Select...</option>
					<option value="day">day</option>
					<option value="month">month</option>
					<option value="quarter">quarter</option>
					<option value="year">year</option>
					<option value="imps"> Impressions</option>
					<option value="clicks"> Clicks</option>
					<option value="ctr"> CTR</option>
					<option value="cpc"> CPC</option>
					<option value="cpm"> CPM</option>
					<option value="cost"> Cost</option>
					<option value="conv"> Conversions</option>
					<option value="convRate"> Conversion Rate</option>
					<option value="costPerConv"> Cost Per Conversion</option>
				</select>
			</td>
			
			<td class="fieldsnew">
				<select name=groupby3>
					<option value="">Select...</option>
					<option value="day">day</option>
					<option value="month">month</option>
					<option value="quarter">quarter</option>
					<option value="year">year</option>
					<option value="imps"> Impressions</option>
					<option value="clicks"> Clicks</option>
					<option value="ctr"> CTR</option>
					<option value="cpc"> CPC</option>
					<option value="cpm"> CPM</option>
					<option value="cost"> Cost</option>
					<option value="conv"> Conversions</option>
					<option value="convRate"> Conversion Rate</option>
					<option value="costPerConv"> Cost Per Conversion</option>
				</select>
			</td>
			
			<td class="fieldsnew">
				<select name=groupby4>
					<option value="">Select...</option>
					<option value="day">day</option>
					<option value="month">month</option>
					<option value="quarter">quarter</option>
					<option value="year">year</option>
					<option value="imps"> Impressions</option>
					<option value="clicks"> Clicks</option>
					<option value="ctr"> CTR</option>
					<option value="cpc"> CPC</option>
					<option value="cpm"> CPM</option>
					<option value="cost"> Cost</option>
					<option value="conv"> Conversions</option>
					<option value="convRate"> Conversion Rate</option>
					<option value="costPerConv"> Cost Per Conversion</option>
				</select>
			</td>

		</tr>';
		
		echo '<tr><td colspan="2">&nbsp;</td></tr>';
			
		echo '<tr><td class="label"> Order By</td>
			
			<td class="fieldsnew">
				<select name=orderby>
					<option value="">Select...</option>
					<option value="imps"> Impressions</option>
					<option value="clicks"> Clicks</option>
					<option value="ctr"> CTR</option>
					<option value="cpc"> CPC</option>
					<option value="cpm"> CPM</option>
					<option value="cost"> Cost</option>
					<option value="conv"> Conversions</option>
					<option value="convRate"> Conversion Rate</option>
					<option value="costPerConv"> Cost Per Conversion</option>
				</select>
			</td>
			<td class="fieldsnew"><input type=radio name=orderby_type value="desc" checked>Descending</td>
			<td class="fieldsnew"><input type=radio name=orderby_type value="asc" >Ascending</td>

			</tr>';
		
		echo '<tr><td colspan="2">&nbsp;</td></tr>';
		

		echo '<tr><td class="label"><input type="submit" name="CMDGo" value="Submit"></td></tr>';
		echo '</table>';	

		echo '</form>';
	}
	
	echo '</body></html>';
}


function pagelink($pagelen,$totalrec,$curpage,$linkno,$link,$scriptname="",$searchchecksum="",$send="",$folderid="",$showmsg="",$id="",$sortorder="")
{
	global $smarty;

	// set the links to be shown on each page to be five
	$linkno=10;

	$totalpage = $totalrec / $pagelen;
	$totalpage = ceil($totalpage);
	$curpage = round($curpage);
	$mid_linkno=abs(floor($linkno/2));
	$startwith=$curpage - $mid_linkno -1;
	if($startwith <= 0)
		$startwith=0;
	if(($startwith+$linkno) >= $totalpage)
		$startwith=$totalpage-$linkno;
	if($startwith <= 0)
		$startwith=0;

/*
	$startwith = $curpage / $linkno;
	$startwith = abs(floor($startwith - 0.1));
	$startwith = $startwith * $linkno;
*/
	if($totalpage > ($startwith + $linkno))
	{
	  	$totallinkshow = $linkno;
	  	if($totalpage < ($startwith + ($linkno * 2)))
	    	$lastlink = $startwith + $totalpage;
	  	else
	    	$lastlink = $startwith + $linkno + $totallinkshow;
	}
	else if($totalpage < ($startwith + ($linkno * 2)))
	{
	  	$totallinkshow = $totalpage - $startwith;
	  	$lastlink = "";
	} 
	else
	{
	  	$totallinkshow = $totalpage - $startwith;
	  	$lastlink = $startwith + $linkno + $totallinkshow;
	} 

	$prevwith=$startwith-9;
	$linkvar = "Page : <strong>";
	if($startwith && !($startwith % $linkno))
	 	//$linkvar .= "&nbsp;<span class=\"class6\"><a HREF=\"$scriptname?checksum=$link&searchchecksum=$searchchecksum&j=".($startwith-1)*$pagelen."\">($prevwith - $startwith)</a></span>&nbsp;";
	 	$linkvar .= "&nbsp;<span class=\"class6\"><a HREF=\"$scriptname?checksum=$link&searchchecksum=$searchchecksum&j=".($startwith-1)*$pagelen."&send=$send&folderid=$folderid&showmsg=$showmsg&id=$id&sortorder=$sortorder\">&lt;&lt;</a></span>&nbsp;";
	 	//$linkvar .= "&nbsp;<span class=\"class6\"><a HREF=\"$scriptname?checksum=$link&searchchecksum=$searchchecksum&j=".($startwith-1)*$pagelen."&send=$send&folderid=$folderid&showmsg=$showmsg&id=$id&sortorder=$sortorder\">&lt;&lt;</a></span>&nbsp;";
		
	 
	for($i=1;$i<=$totallinkshow;$i++)
	{
		$nos = $startwith+$i;
		//if($nos != $curpage)
		// $linkvar .= ($nos-1)*$pagelen;
		//else
		if($nos != $curpage)
		 	$linkvar .= "<span class=\"class6\"><a HREF=\"$scriptname?checksum=$link&searchchecksum=$searchchecksum&j=".($nos-1)*$pagelen."&send=$send&folderid=$folderid&showmsg=$showmsg&id=$id&sortorder=$sortorder\">";
		else
		 	$linkvar .= "&nbsp;";

/*		if($i == $totallinkshow && $lastlink)
		 $linkvar .= "($nos - $lastlink)>></a></span>&nbsp;";
		else*/
		 	$linkvar .= "$nos</a></span>&nbsp;";
	}
	
	if($lastlink)
	{
		$nos = $startwith+$i;
		$linkvar .= "&nbsp;<span class=\"class6\"><a HREF=\"$scriptname?checksum=$link&searchchecksum=$searchchecksum&j=".($nos-1)*$pagelen."&send=$send&folderid=$folderid&showmsg=$showmsg&id=$id&sortorder=$sortorder\">";
		//$linkvar .= "($nos - $lastlink)</strong></a></span>&nbsp;";
		$linkvar .= "&gt;&gt;</strong></a></span>&nbsp;";
	}
	
	$linkvar.= "&lt;<strong><font color=\"#999999\">";
	
	if($curpage > 1)
		$linkvar .= "<span class=\"class6\"><a HREF=\"$scriptname?checksum=$link&searchchecksum=$searchchecksum&j=".($curpage-2)*$pagelen."&send=$send&folderid=$folderid&showmsg=$showmsg&id=$id&sortorder=$sortorder\">Previous</a></span>";
	else 
		$linkvar.="Previous";
		
	$linkvar.="</font></strong> <strong>|";

	$linkvar.="<font color=\"#999999\">";	
	if($curpage < $totalpage)
		$linkvar .= "<span class=\"class6\"><a HREF=\"$scriptname?checksum=$link&searchchecksum=$searchchecksum&j=". $curpage*$pagelen ."&send=$send&folderid=$folderid&showmsg=$showmsg&id=$id&sortorder=$sortorder\">Next</a></span>";
	else 
		$linkvar.="Next";
	$linkvar.="</font>";

	$linkvar.="&gt;</strong>";
	if($totalpage==0)
		$linkvar="";
	//echo "<br>linkvar : ".$linkvar;	
	$smarty->assign("PAGELINK",$linkvar);
	return $linkvar;
}//end function pagelink

?>
