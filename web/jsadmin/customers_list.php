<?php
/************************************************************************************************************
File		: customers_list.php	
Description 	: Number and details of each profiles assigned to the logged in Operator
Developed By	: Vibhor Garg
Date		: 27-02-2008
*************************************************************************************************************/
include_once("connect.inc");
//to be removed later
//print_r($_SERVER);
if($argv[1])
{
	$name=$argv[1];
	$cid=$argv[2];
}
$operator_name = $name;

if(authenticated($cid))
{	
	$sql="Select COUNT(*) AS CNT from OFFLINE_ASSIGNED where OPERATOR = '".$operator_name."'";
	$result=mysql_query_decide($sql,$db) or die("$sql".mysql_error_js($db));
	$row=mysql_fetch_assoc($result);
	$count = $row["CNT"];		
		
	$sql="Select PROFILEID from OFFLINE_ASSIGNED where OPERATOR = '".$operator_name."'";
	$result=mysql_query_decide($sql,$db) or die("$sql".mysql_error_js($db));
	while($row=mysql_fetch_assoc($result))
	{
		$profileArray[] = $row["PROFILEID"];		
	}
	$active_count = 0;		
		$qqq=0;
	for($i=0;$i<$count;$i++)
	{
		$active_count++;
		unset($dayremain);
                unset($count_pool);
                unset($count_sl);
                unset($dateArray);
                unset($accAllowedArray);
                unset($accRemainArray);
                unset($uname);
                unset($pass);
                unset($phone_res);
                unset($phone_mob);
                unset($std);
                unset($is_deleted);
                unset($contact_no);
		 $sql="SELECT BILLID,ACTIVE FROM jsadmin.OFFLINE_BILLING WHERE PROFILEID='$profileArray[$i]' ORDER BY BILLID DESC LIMIT 1";
                $res=mysql_query_decide($sql,$db) or die("$sql".mysql_error_js($db));
		$type="unbilled";
		$dayremain=0;
                if(mysql_num_rows($res))
                {	
                        $row=mysql_fetch_assoc($res);
                        $billid=$row["BILLID"];
			if($row["ACTIVE"]=="Y")
			{
				$sql="SELECT DATEDIFF(EXPIRY_DT,NOW()) AS DAYREMAIN FROM billing.SERVICE_STATUS WHERE BILLID='$billid' AND ACTIVATED='Y'";
				$res=mysql_query_decide($sql,$db) or die("$sql".mysql_error_js($db));
				$row=mysql_fetch_assoc($res);
				$dayremain=$row["DAYREMAIN"];
				$type="billed";
			}
			else
			{
				$type="unbilled";
				$dayremain=0;
			}
			$sql="Select COUNT(*) AS CNTP from OFFLINE_MATCHES where PROFILEID = '".$profileArray[$i]."' AND CATEGORY !=''  AND (STATUS='NACC'||STATUS='N'||STATUS='NNOW')";
			$result=mysql_query_decide($sql,$db) or die("$sql".mysql_error_js($db));
			$row=mysql_fetch_assoc($result);
			$count_pool = $row["CNTP"];
		
			$sql="Select COUNT(*) AS CNTSL from OFFLINE_MATCHES where PROFILEID = '".$profileArray[$i]."' AND STATUS = 'SL' ";
			$result=mysql_query_decide($sql,$db) or die("$sql".mysql_error_js($db));
			$row=mysql_fetch_assoc($result);
			$count_sl = $row["CNTSL"];		
		
			$sql="Select ENTRY_DATE,ACC_UPGRADED,ACC_ALLOWED,ACC_MADE from OFFLINE_BILLING where PROFILEID = '".$profileArray[$i]."' ORDER BY BILLID DESC";
                        $result=mysql_query_decide($sql,$db) or die("$sql".mysql_error_js($db));
                        $row=mysql_fetch_assoc($result);
                        $dateArray = $row["ENTRY_DATE"];
                        $accAllowedArray = $row["ACC_ALLOWED"] + $row["ACC_UPGRADED"];
                        $accRemainArray = $row["ACC_ALLOWED"]+ $row["ACC_UPGRADED"] - $row ["ACC_MADE"];
									
		}
		//Added by ankit
		$sql="SELECT ID,SERVICE_NO,EXECUTIVE_NAME FROM newjs.CLIENT_FEEDBACK where PROFILEID = '$profileArray[$i]' AND EXECUTIVE_NAME='$operator_name'";
		$result=mysql_query_decide($sql,$db) or die("$sql".mysql_error_js($db));
		$qqq=0;
		while($row=mysql_fetch_array($result))
		{
			$qqq++;
			$id_no[]=$row[ID];
			$service_no[]=$row[SERVICE_NO];
		}
		$arr[]=$qqq;
		
		//Adition end	
		$sql="Select USERNAME,PASSWORD,PHONE_RES,PHONE_MOB,STD from newjs.JPROFILE where PROFILEID = '".$profileArray[$i]."'";
		$result=mysql_query_decide($sql,$db) or die("$sql".mysql_error_js($db));
		$row=mysql_fetch_assoc($result);
		$uname = $row["USERNAME"];
		$pass= $row["PASSWORD"];
		$phone_res = $row["PHONE_RES"];
		$phone_mob = $row["PHONE_MOB"];
		$std = $row["STD"];
		if($std != "")
		{
			if($phone_mob != "")
				if($phone_res != "")
					$contact_no = $phone_mob." , ".$std."-".$phone_res;
				else
					$contact_no = $phone_mob;
			else
				if($phone_res != "")
					$contact_no = $std." - ".$phone_res;
				else
					$contact_no = "NA";

		 }
		 else
		 {
			if($phone_mob != "")
				if($phone_res != "")
					$contact_no = $phone_mob." , ".$phone_res;
				else
                        	$contact_no = $phone_mob;
			else
				if($phone_res != "")
					$contact_no = $phone_res;
				else
					$contact_no = "NA";
		}
		$tableArray[$profileArray[$i]] = array($type,$uname,$pass,$contact_no,$count_pool,$count_sl,$accAllowedArray,$accRemainArray,$dateArray,$dayremain);
	}
	$smarty->assign('id_no',$id_no);
	$smarty->assign('arr',$arr);	
	$smarty->assign('tableArray',$tableArray);
	$smarty->assign('service',$service_no);
	$smarty->assign("searchFlag","1");
	$smarty->assign("operator_name",$operator_name);	
	$smarty->assign("assigned_profile",$active_count);		
	$smarty->assign("profileArray",$profileArray);
	$smarty->assign("CHECKSUM",$cid);
	$smarty->display("customers_list.htm");
}
else
{
	$msg="Your session has been timed out  ";
        $smarty->assign("MSG",$msg);
        $smarty->display("jsadmin_msg.tpl");

}
?>
