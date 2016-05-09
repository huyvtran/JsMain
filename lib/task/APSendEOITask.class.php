<?php

/**
 * This task gets all the profiles for which EOI needs to be sent and send EOI on their behalf.
 * 
 * @package    jeevansathi
 * @author     Hemant Agrawal
 */
class APSendEOITask extends sfBaseTask
{
	private $errorMsg;
        private $minEois = 10;
        private $clusterForMutualMatches = array(0=>'LAST_ACTIVITY');
        private $removeFilteredProfiles = true;
	public function Showtime($mes)
	{
		$time=time();
		echo "\n---$mes-->".($time-$this->showTime);
		$this->showTime=$time;
	}
  protected function configure()
  {
	  $this->showTime=time();
$this->addOptions(array(
       new sfCommandOption('application', null, sfCommandOption::PARAMETER_REQUIRED, 'The application name','jeevansathi'),
     ));
    $this->namespace        = 'cron';
    $this->name             = 'APSendEOI';
    $this->briefDescription = 'AP Send EOIs';
    $this->detailedDescription = <<<EOF
The [APSendEOI|INFO] task does things.
Call it with:

  [php symfony cron:APSendEOI|INFO]
EOF;

  }
	/**
    * set the array errorTypeArr value for the given type
    * @return void
    * @access protected
    */	
	protected function execute($arguments = array(), $options = array())
	{
		sfContext::createInstance($this->configuration);	
		$detailArr="PROFILEID,USERNAME,PASSWORD,GENDER,RELIGION,CASTE,SECT,MANGLIK,MTONGUE,MSTATUS,DTOFBIRTH,OCCUPATION,COUNTRY_RES,CITY_RES,HEIGHT, EDU_LEVEL,EMAIL,IPADD,ENTRY_DT,MOD_DT,RELATION,COUNTRY_BIRTH,SOURCE,INCOMPLETE,PROMO,DRINK,SMOKE,HAVECHILD,RES_STATUS,BTYPE,COMPLEXION,DIET,HEARD,INCOME,CITY_BIRTH,BTIME,HANDICAPPED,NTIMES,SUBSCRIPTION,SUBSCRIPTION_EXPIRY_DT,ACTIVATED,ACTIVATE_ON,AGE,GOTHRA,GOTHRA_MATERNAL,NAKSHATRA,MESSENGER_ID,MESSENGER_CHANNEL,PHONE_RES,PHONE_MOB,FAMILY_BACK,SCREENING,CONTACT,SUBCASTE,YOURINFO,FAMILYINFO,SPOUSE,EDUCATION,LAST_LOGIN_DT,SHOWPHONE_RES,SHOWPHONE_MOB, HAVEPHOTO,PHOTO_DISPLAY,PHOTOSCREEN,PREACTIVATED,KEYWORDS,PHOTODATE,PHOTOGRADE,TIMESTAMP,PROMO_MAILS,SERVICE_MESSAGES,PERSONAL_MATCHES,SHOWADDRESS,UDATE,SHOWMESSENGER,PINCODE,PARENT_PINCODE,PRIVACY,EDU_LEVEL_NEW,FATHER_INFO,SIBLING_INFO,WIFE_WORKING,JOB_INFO,MARRIED_WORKING,PARENT_CITY_SAME,PARENTS_CONTACT,SHOW_PARENTS_CONTACT,FAMILY_VALUES,SORT_DT,VERIFY_EMAIL,SHOW_HOROSCOPE,GET_SMS,STD,ISD,MOTHER_OCC,T_BROTHER,T_SISTER,M_BROTHER,M_SISTER,FAMILY_TYPE,FAMILY_STATUS,FAMILY_INCOME,CITIZENSHIP,BLOOD_GROUP,HIV,THALASSEMIA,WEIGHT,NATURE_HANDICAP,ORKUT_USERNAME,WORK_STATUS,ANCESTRAL_ORIGIN,HOROSCOPE_MATCH,SPEAK_URDU,PHONE_NUMBER_OWNER,PHONE_OWNER_NAME,MOBILE_NUMBER_OWNER,MOBILE_OWNER_NAME,RASHI,TIME_TO_CALL_START,TIME_TO_CALL_END,PHONE_WITH_STD,MOB_STATUS,LANDL_STATUS,PHONE_FLAG,CRM_TEAM,activatedKey,PROFILE_HANDLER_NAME,GOING_ABROAD,OPEN_TO_PET,HAVE_CAR,OWN_HOUSE,COMPANY_NAME,HAVE_JCONTACT,HAVE_JEDUCATION,SUNSIGN";
		
		$profileInfoObj = new ASSISTED_PRODUCT_AP_PROFILE_INFO();
                $tempProfileRecords = new ASSISTED_PRODUCT_AP_PROFILE_INFO_LOG();
		$autoContObj = new ASSISTED_PRODUCT_AUTOMATED_CONTACTS_TRACKING();
		$profileArr = $profileInfoObj->getAPProfilesResumed();
		//$profileArr=array(0=>array("PROFILEID"=>3186764));
		$totalContactsMade = 0;
		$totalSenders = 0;
                $date = date("Y-m-d");
                $file = fopen(sfConfig::get("sf_upload_dir")."/APCronLogs/numbersSent_".$date.".txt","a");
                $dppLoop = 0;
                if(is_array($profileArr)) {
		foreach($profileArr as $key=>$val)
		{
			try
			{
				$senderId = $val['PROFILEID'];
				//$senderId=3186764;	
				$dbName = JsDbSharding::getShardNo($senderId);
				$dbObj = new newjs_CONTACTS($dbName);
				$todayContacts = $dbObj->getTodayInitiatedForAP($senderId);
				//setting the limit for EOI to be sent
				$limitCounter = 0;
                                
				$limit = 25;
				$totalLimit=100;
				if($this->isJsDummyMember($senderId))
				{
					$limit=100;
					$totalLimit=200;
				}
				$totalSenders++;
				$leftCount = $totalLimit - $todayContacts;
				
				if($leftCount > $limit)
					$limit = $limit;
				else if($leftCount <= $limit)
					$limit = $leftCount;
			
			
			
				$profileObj = LoggedInProfile::getInstance('',$senderId);
				$profileObj->getDetail('','','*');
				$partnerObj = new SearchCommonFunctions();
                                
                                $searchMutualMatches = true;
                                
                                //get mutual matches first
				$mutualMatchesArr = $partnerObj->getMyDppMatches('',$profileObj,$limit,'','','',$this->removeFilteredProfiles,$searchMutualMatches,$this->clusterForMutualMatches);
                                $mutualMatchesCount = $mutualMatchesArr['ClusterCount']['LAST_ACTIVITY'][2]+$mutualMatchesArr['ClusterCount']['LAST_ACTIVITY'][1];
                                
                                //get subscription details of pack
                                $membershipHandlerObj = new MembershipHandler();
                                $activeSubsDetails = $membershipHandlerObj->getActiveSubscriptionDetail($senderId,'T');
                                
                                
                                //get maximum number to be sent
                                $numberToBeSent = $this->getEoiNumberToBeSent($mutualMatchesCount,$activeSubsDetails,$limit,$this->minEois);
                                $stringToWrite = "Sender-:  ".$senderId."    mutual matches-:  ".$mutualMatchesCount."     numberSent-:  ".$numberToBeSent;
                                fwrite($file,$stringToWrite."\n");
                                //if mutual matches are less than number expected find partner matches
                                if(($mutualMatchesCount < $numberToBeSent) || !$mutualMatchesCount){
                                    $searchMutualMatches= false;
                                     $partnerMatchesArr = $partnerObj->getMyDppMatches('',$profileObj,$limit,'','','',$this->removeFilteredProfiles,$searchMutualMatches);
                                     $resultArr = $partnerMatchesArr;
                                     $dppLoop++; 
                                }
                                else
                                    $resultArr = $mutualMatchesArr;
                                
                                $limit = $numberToBeSent;
                                    
				$matchArr = $resultArr['PIDS'];
				$matchCount = $resultArr['CNT'];
				// getting partner matches
				if(($limit > $limitCounter) && $matchCount)
				{
					
					foreach($matchArr as $k=>$receiverId)
					{
						
						try{
						
						$receiverObj = new Profile('',$receiverId);
						$receiverObj->getDetail('', '', $detailArr);
						}
						catch(Exception $ex)
						{
							$this->setExceptionError($ex);
						}
						UserFilterCheck::$filterObj=null;
						$contactEngineObj = $this->sendEOI($profileObj, $receiverObj);
						if($contactEngineObj)
						if($contactEngineObj->getComponent()->errorMessage != '')
						{
							// if any error occurs send mail
							$mailMes = "AP error -> ".$contactEngineObj->getComponent()->errorMessage." Sender: $senderId Receiver: $receiverId ";
							$this->Showtime("Error $mailMes");
							//SendMail::send_email("nikhil.dhiman@jeevansathi.com,hemant.a@jeevansathi.com",$mailMes,"Contacts entry error in APSendEOITask.class.php");
//							$this->Showtime("after error");
							
						}
						else
						{
							//tracking of EOI sent
							$totalContactsMade++;
							$limitCounter++;
							try{
								$autoContObj->insertIntoAutoContactsTracking($senderId,$receiverId);
							}
							catch(Exception $ex)
							{
								$this->setExceptionError($ex);
							}
						}
						$contactEngineObj=null;
						if($limit <= $limitCounter)
							break;
					}
				}
			}
			catch(Exception $ex)
			{
				$this->setExceptionError($ex);
			}
                        $tempProfileRecords->insert($senderId);
		
		}
                fwrite($file,"DPP loop count-: ".$dppLoop);
                fclose($file);
                }
                $alreadySentCount = $tempProfileRecords->getCount();
		if($this->errorMsg){	
			echo $this->errorMsg;
                        SendMail::send_email("ankitshukla125@gmail.com","error ".$this->errorMsg,"Exceptions caught");
                }
                $todaysSentContacts = $autoContObj->getCountAfterDate(date('Y-m-d'));
		$HistoryRecord = new ASSISTED_PRODUCT_HISTORY_EOI_SENT();
		$HistoryRecord->INSERT($todaysSentContacts);
		
		// if script completes successfully send mail
                SendMail::send_email("ankitshukla125@gmail.com","$todaysSentContacts Auto Contacts sent out for $alreadySentCount users","Auto Contacts cron completed");
                $tempProfileRecords->delete();
		echo "EOI's sent for ".$alreadySentCount." Profiles";
		
		
	}
	
	/** logs sfException
	@param $ex Exception Obj
	*/
	private function setExceptionError($ex)
	{
		$this->errorMsg=" ".$ex->getMessage();
		$this->Showtime("Error ".$this->errorMsg);
	}
	/**
    * send EOI's
    * @return $contactEngineObj
    * @param $profileObj
    * @param $receiverObj
    * @access private
    */	
	
	private function sendEOI($profileObj,$receiverObj)
	{
		
		try
		{
			$contactObj = new Contacts($profileObj, $receiverObj);
			if($contactObj->getTYPE() == 'N')
			{
				
				$contactHandlerObj = new ContactHandler($profileObj,$receiverObj,"EOI",$contactObj,'I',ContactHandler::POST);
				$contactHandlerObj->setPageSource("AP");
				 
				if($this->isJsDummyMember($profileObj->getPROFILEID()))
				{
					if($receiverObj->getHAVEPHOTO()=="N" || $receiverObj->getHAVEPHOTO()=="")
							$message=Messages::getMessage(Messages::JSExNoPhoMes,array("EMAIL"=>$profileObj->getEMAIL()));
					else
					{
							$draftsObj = new ProfileDrafts($profileObj);
							$message=ProfileDrafts::getMessage($draftsObj->getEoiDrafts(),'');
							unset($draftsObj);
					}
				}
				else
					$message= Messages::getMessage(Messages::AP_MESSAGE,array('USERNAME'=>$profileObj->getUSERNAME()));
					
				$contactHandlerObj->setElement("MESSAGE",$message);
				$contactHandlerObj->setElement("STATUS","I");
				$contactHandlerObj->setElement("PROFILECHECKSUM",JsCommon::createChecksumForProfile($profileObj->getPROFILEID()));
				$contactHandlerObj->setElement("STYPE",3);
				$contactEngineObj=ContactFactory::event($contactHandlerObj);
				return $contactEngineObj;
			}
		}
		catch(Exception $e)
		{
			$this->setExceptionError($e);
			//$this->errorMsg = $this->errorMsg.'Caught Exception: '. $profileObj->getPROFILEID().'->'.$receiverObj->getPROFILEID().'=>'.$e->getMessage(). "";
		}
		
				
		return null;
		
	}
	private function isJsDummyMember($profileid)
	{
		if($this->isDummy[0]==$profileid)
			return $this->isDummy[1];

		$dbObj=new jsadmin_PremiumUsers;
		$this->isDummy[0]=$profileid;
		if($dbObj->isDummy($profileid))
		{
			$this->isDummy[1]=true;
			return true;
		}
		$this->isDummy[1]=false;
		return false;
	}
        
        public function getEoiNumberToBeSent($mutualMatchesCount,$subsDetailsArr,$maxEois,$minEois) {
            $durationOfPack = $subsDetailsArr['DURATION_MONTHS']*30;
            $today = strtotime(date("Y-m-d"));
            $expiryDate = strtotime($subsDetailsArr['EXPIRY_DT']);
            $daysRemaining = floor(($expiryDate - $today)/(60*60*24))+1;
            $eoiToBeSent = min(max(floor(2*($durationOfPack/90)*(($mutualMatchesCount*0.84)/$daysRemaining)),$minEois),$maxEois);
            return $eoiToBeSent;
        }
}