<?php 
$curFilePath = dirname(__FILE__)."/"; 
include_once("/usr/local/scripts/DocRoot.php");

chdir(dirname(__FILE__));
include("../connect.inc");
$db=connect_db();

@mysql_select_db("incentive",$db);

$ts=time();
$today = date("Y-m-d",$ts);

$sqlj="(SELECT USER FROM jsadmin.RENEWAL_AGENT) UNION (SELECT USER FROM jsadmin.UPSELL_AGENT)";
$resj=mysql_query($sqlj,$db) or die(mysql_error($db));
while($rowj = mysql_fetch_array($resj))
        $allot_to_array[] = $rowj['USER'];
$ren_agent=implode("','",$allot_to_array);

$sql = "UPDATE incentive.MAIN_ADMIN_POOL p, incentive.MAIN_ADMIN m, incentive.CRM_DAILY_ALLOT a SET p.ALLOTMENT_AVAIL ='Y' WHERE m.PROFILEID=p.PROFILEID AND a.PROFILEID=m.PROFILEID AND DATE_ADD(m.ALLOT_TIME, INTERVAL a.RELAX_DAYS DAY) < DATE_SUB(CURDATE(), INTERVAL 15 DAY) AND m.STATUS <>'P' AND a.ALLOT_TIME=m.ALLOT_TIME AND m.ALLOTED_TO NOT IN ('$ren_agent')";
mysql_query($sql) or $msg.="Query : ".$sql." : ".mysql_error()."\n";//die("$sql".mysql_error());//logError($sql);

$sql="delete a.* FROM incentive.MAIN_ADMIN_LOG a, incentive.MAIN_ADMIN b WHERE a.ID = b.ID";
mysql_query($sql) or $msg.="Query ".$sql." : ".mysql_error()."\n";//die("$sql".mysql_error());

$sql = "REPLACE INTO incentive.MAIN_ADMIN_LOG SELECT m.* FROM incentive.MAIN_ADMIN m, incentive.CRM_DAILY_ALLOT a WHERE DATE_ADD(m.ALLOT_TIME, INTERVAL a.RELAX_DAYS DAY) < DATE_SUB(CURDATE(), INTERVAL 15 DAY) AND m.STATUS <>'P' AND a.PROFILEID=m.PROFILEID AND a.ALLOT_TIME=m.ALLOT_TIME AND m.ALLOTED_TO NOT IN ('$ren_agent')";
if(mysql_query($sql))
{
	$sql1 = "DELETE MAIN_ADMIN.* FROM MAIN_ADMIN , CRM_DAILY_ALLOT  WHERE DATE_ADD(MAIN_ADMIN.ALLOT_TIME , INTERVAL CRM_DAILY_ALLOT.RELAX_DAYS DAY) < DATE_SUB(CURDATE() , INTERVAL 15 DAY) AND MAIN_ADMIN.STATUS <>'P' AND CRM_DAILY_ALLOT.PROFILEID=MAIN_ADMIN.PROFILEID AND CRM_DAILY_ALLOT.ALLOT_TIME=MAIN_ADMIN.ALLOT_TIME AND MAIN_ADMIN.ALLOTED_TO NOT IN ('$ren_agent')";
	mysql_query($sql1) or $msg.="Query : ".$sql1." : ".mysql_error()."\n";//die("$sql1".mysql_error());//logError($sql1);
	$deleted=mysql_affected_rows();
}
else
	$msg.="Query : ".$sql." : ".mysql_error()."\n";//die("$sql".mysql_error());//logError($sql);

mail("vibhor.garg@jeevansathi.com,manoj.rana@naukri.com","Normal Deletion from Main Admin (15 days older records deleted) ","Done\nDeleted : $deleted\n Error : $msg");

?>
