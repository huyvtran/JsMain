<?php
/*********************************************************************************************
* DESCRIPTION 	: Change the data of the online dialing daily
* MADE DATE 	: 20 Mar, 2014
* MADE BY     	: VIBHOR GARG
*********************************************************************************************/
//include("cron_daily_updates_functions.php");
include("MysqlDbConstants.class.php");
include("DialerHandler.class.php");

//Connection at JSDB
$db_js = mysql_connect(MysqlDbConstants::$misSlave['HOST'],MysqlDbConstants::$misSlave['USER'],MysqlDbConstants::$misSlave['PASS']) or die("Unable to connect to nmit server");
$db_js_111 = mysql_connect(MysqlDbConstants::$slave111['HOST'],MysqlDbConstants::$slave111['USER'],MysqlDbConstants::$slave111['PASS']) or die("Unable to connect to local-111 server");
$db_dialer = mssql_connect(MysqlDbConstants::$dialer['HOST'],MysqlDbConstants::$dialer['USER'],MysqlDbConstants::$dialer['PASS']) or die("Unable to connect to dialer server");

mysql_query('set session wait_timeout=10000,net_read_timeout=10000',$db_js);
mysql_query('set session wait_timeout=10000,net_read_timeout=10000',$db_js_111);

$dialerHandlerObj =new DialerHandler($db_js, $db_js_111, $db_dialer);
$campaign_name = 'JS_NCRNEW_Auto';
$eligibleType ='Y';
$limit =10;
$todayDate =$dialerHandlerObj->getEST();

// get Status
$status =$dialerHandlerObj->getCampaignEligibilityStatus($campaign_name,$eligibleType);
if(!$status)
        $status=0;

/*Update data of eligible profiles*/
$start_from =$status;
for($i=$start_from;$i<$limit;$i++)
{
	$eligible_array 	= $dialerHandlerObj->getInDialerNewEligibleProfiles($i,$campaign_name);
	$vd_array 		= $dialerHandlerObj->getVDdiscount($eligible_array);
	$loggedinWithin15days	= $dialerHandlerObj->getLoginWithin15Days($eligible_array);
	$allotedArray 		= $dialerHandlerObj->getAllotedProfiles($eligible_array);
	$scoreArray 		= $dialerHandlerObj->getScoreArray($eligible_array);
        $dialerHandlerObj->update_data_of_eligible_profiles($campaign_name,$i,$eligible_array,$vd_array,$allotedArray,$scoreArray,'',$loggedinWithin15days);
	$dialerHandlerObj->updateCampaignEligibilityStatus($campaign_name,$eligibleType, $i, $todayDate);
	echo "DONE$i"."\n";
}

$to="vibhor.garg@jeevansathi.com,manoj.rana@naukri.com";
$sub="Dialer updates of ncrAuto-eligible done.";
$from="From:vibhor.garg@jeevansathi.com";
mail($to,$sub,'',$from);
?>