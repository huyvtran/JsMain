<?php
include_once(JsConstants::$docRoot."/commonFiles/SymfonyPictureFunctions.class.php");
$curFilePath = dirname(__FILE__)."/";
include_once("/usr/local/scripts/DocRoot.php");
include(JsConstants::$docRoot."/profile/connect_db.php");
$db=connect_db();

$sql = "SELECT PROFILEID FROM jsadmin.ACTIVATED_WITHOUT_YOURINFO";
$res = mysql_query($sql,$db) or die(mysql_error($db));
while($row = mysql_fetch_array($res))
{
        $pid = $row["PROFILEID"];

        $sql1 =  "SELECT PROFILEID FROM newjs.JPROFILE WHERE SCREENING>=1099511627775 AND PROFILEID='$pid'";
        $res1 = mysql_query($sql1,$db) or die(mysql_error($db).$sql1);
        if($row1= mysql_fetch_array($res1))
        {
        if($row1['PROFILEID']){
                $arr[] = $pid;
        }
        else
                $arr1[] = $pid;
        }
        
        $sql2 = "SELECT PROFILEID FROM newjs.JPROFILE WHERE PROFILEID='$pid' AND ACTIVATED!='Y'";
        $res2 = mysql_query($sql2,$db) or die(mysql_error($db).$sql2);
        if($row2= mysql_fetch_array($res1))
        {
        if($row2['PROFILEID']){
                $arrAct[] = $pid;
        }
        else
                $arrAct1[] = $pid;
        }
}
$l = implode(",",$arr);
if($l!=''){
    $sql = "DELETE FROM jsadmin.ACTIVATED_WITHOUT_YOURINFO WHERE PROFILEID IN ($l)";
    $file = fopen(sfConfig::get("sf_upload_dir")."/SearchLogs/proScreening.txt","a");
    $stringToWrite = $l."\n";
    fwrite($file,$stringToWrite."\n");
    $res = mysql_query($sql,$db) or die(mysql_error($db));
}
$l = implode(",",$arrAct);
if($l!=''){
    $sql = "DELETE FROM jsadmin.ACTIVATED_WITHOUT_YOURINFO WHERE PROFILEID IN ($l)";
    $file = fopen(sfConfig::get("sf_upload_dir")."/SearchLogs/proScreening2.txt","a");
    $stringToWrite = $l."\n";
    fwrite($file,$stringToWrite."\n");
    $res = mysql_query($sql,$db) or die(mysql_error($db));
}