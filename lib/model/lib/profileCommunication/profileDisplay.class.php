<?php

class profileDisplay{
	
	
	public function getNextPreviousProfile($profileObj,$key,$offset,$stype='')
	{
		$data = unserialize(JsMemcache::getInstance()->get($key));
		if(false === $data || count($data)<$offset)
		{
			$profileCommunication = new ProfileCommunication();
			if(MobileCommon::isDesktop())
				$module= "ContactCenterDesktop";
			else
				$module="ContactCenterAPP";
			$config = $profileCommunication->getInboxConfiguration($module,$profileObj);
			$keyArray = explode("_",$key);
			foreach($keyArray as $k=>$v)
			{
				if($k==0)
					continue;
				$infoType.=$v."_";
			}
			$infoType = substr($infoType, 0, -1);
                        if($infoType=="VISITORS"){
                            if($stype=='5' || $stype=='IV' || $stype=='AV' || $stype=='WV')
                                $infoTypenav['matchedOrAll']= 'A';
                            elseif($stype=='M5' || $stype=='MIV' || $stype=='MAV' || $stype=='MWV')
                                $infoTypenav['matchedOrAll']= 'M';
                        }
			$pageNo = ceil($offset/$config[$infoType]["COUNT"]);
			$infoTypenav["PAGE"] = $infoType;
			$infoTypenav["NUMBER"]=$pageNo;
			if(JsMemcache::getInstance()->get($key."_COUNT"))
				$totalCount= JsMemcache::getInstance()->get($key."_COUNT");
			else
			{
				$count = $profileCommunication->getCount($module,$profileObj,$infoTypenav);
				$totalCount = $count[$infoType];
			}
			if($totalCount<$offset)
				return null;
			$this->displayObj= $profileCommunication->getDisplay($module,$profileObj,$infoTypenav);
			$data = unserialize(JsMemcache::getInstance()->get($key));
		}
		if(count($data) <$offset)
			return null;
		$i=1;
		foreach($data as $key=>$keyData)
		{
			if($i==$offset)
				break;
			$i++;
		}
		$profileid = $key;
		return JsCommon::createChecksumForProfile($profileid);
	}
	
	/*
	* 	This function is used to handle next previous for myjs page
	*	listing type denotes the list type and offset denotes the current profile number.
	*/

	public static function getNextPreviousProfileForMyjs($iListingType,$iOffset)
	{	

		$profileObj= LoggedInProfile::getInstance();
		$pid = $profileObj->getPROFILEID();
		$cacheCriteria = MyjsSearchTupplesEnums::getListNameForCaching($iListingType);
		$cachedResultsPoolArray = unserialize(JsMemcache::getInstance()->get("cached".$cacheCriteria."Myjs".$pid));
		$profileIdToReturn = $cachedResultsPoolArray[$iOffset-1];
		 return(JsCommon::createChecksumForProfile($profileIdToReturn));
	}

	public static function getNextProfileIdForMyjs($iListingType,$iOffset)
	{	
		$maxProfileReqdToHitNext = 6;	
		$profileObj= LoggedInProfile::getInstance();
		$pid = $profileObj->getPROFILEID();
		$cacheCriteria = MyjsSearchTupplesEnums::getListNameForCaching($iListingType);
		$cachedResultsPoolArray = unserialize(JsMemcache::getInstance()->get("cached".$cacheCriteria."Myjs".$pid));
	
			if($cachedResultsPoolArray[$iOffset] == NULL)
			{  
			$request=sfContext::getInstance()->getRequest();	
			$request->setParameter('matchalerts',1);
			ob_start();
        	$request->setParameter("useSfViewNone",1);
        	$nextProfileToAppend = sfContext::getInstance()->getController()->getPresentationFor('search','PerformV1');
        	$output = (array)(json_decode(ob_get_contents(),true));
        	ob_end_clean();
        	$iterate = $iOffset;
        	if(is_array($output) && array_key_exists("profiles",$output)){
        	foreach ($output['profiles'] as $key => $value) {
        		array_push($cachedResultsPoolArray, $value['profileid']);
        	}
        	}
        	JsMemcache::getInstance()->set("cached".$cacheCriteria."Myjs".$pid,serialize($cachedResultsPoolArray));
			}	
		

		$profileIdToReturn = $cachedResultsPoolArray[$iOffset];
		 return($profileIdToReturn);		
	}





}
