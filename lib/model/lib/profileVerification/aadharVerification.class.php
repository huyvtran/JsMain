<?php
/**
 * Description of aadharVerification
 * Library Class to handle Model for PROFILE_VERIFICATION.AADHAR_VERIFICATION Table
 *
 * @package     jeevansathi
 * @subpackage cache
 * @author      Sanyam Chopra
 * @created     18th July 2017
 */
class aadharVerification
{
	/**
     * Member Variable
     */

    /**
     * @var Static Instance of this class
     */
    private static $instance;

    /**
     * Object of Store class
     * @var instance of NEWJS_PROFILE|null
     */
    private static $aadharObj = null;

    /**
     * @fn __construct
     * @brief Constructor function
     * @param $dbName - Database to which the connection would be made
     */
    public function __construct($dbname = "")
    {
        self::$aadharObj = new PROFILE_VERIFICATION_AADHAR_VERIFICATION($dbname);
    }

    /**
     * To Stop clone of this class object
     */
    private function __clone()
    {
        
    }

    /**
     * To stop unserialize for this class object
     */
    private function __wakeup()
    {
        
    }
	public function callAadharVerificationApi($aadharId,$nameOfUser,$profileId,$username)
	{
		$aadharArr = array();
		$urlToHit = aadharVerificationEnums::URLTOHIT;
		$headerArr = aadharVerificationEnums::$aadharHeaderArr;

		$aadharArr["tasks"][0]["type"] = aadharVerificationEnums::TYPE;
		$aadharArr["tasks"][0]["group_id"] = aadharVerificationEnums::GROUPID;
		$aadharArr["tasks"][0]["task_id"] = aadharVerificationEnums::TASKID;
		$aadharArr["tasks"][0]["data"]["aadhaar_number"] = $aadharId;
		$aadharArr["tasks"][0]["data"]["aadhaar_name"] = $nameOfUser;
		$aadharArr["tasks"][0]["data"]["aadhaar_consent"] = aadharVerificationEnums::AADHAR_CONSENT;
		
		$response = json_decode(CommonUtility::sendCurlPOSTRequest($urlToHit,json_encode($aadharArr),"",$headerArr));
		$reqId = $response->request_id;
		if($reqId)
		{
			$date = date("Y-m-d H:i:s");
			$this->insertAadharDetails($profileId,$username,$date,$aadharId,$reqId);
			return 1;
		}
		else
		{
			return 0;
		}
	}
	
	
	public function callAadharVerificationAuthBridgeApi($aadharId,$nameOfUser,$profileId,$username)
	{
		$aadharArr = array();
		$urlToHit = aadharVerificationEnums::URLTOHITAUTHBRIDGE;
		$headerArr = aadharVerificationEnums::$aadharHeaderArrAuthbridge;
		$aadharArr["transID"]=md5(uniqid($profileId, true));
		$aadharArr["docType"] = aadharVerificationEnums::AADHARDOCTYPEAUTHBRIDGE;
		$aadharArr["docNumber"] = $aadharId;
		$aadharArr["name"] = $nameOfUser;
		$jsonAadhar = json_encode($aadharArr);
		$authBridgeBody = EncryptionAESCipher::encrypt(aadharVerificationEnums::TOKENAUTHBRIDGE, $jsonAadhar,1);
		$request["requestData"]= $authBridgeBody;
		$requestJson = json_encode($request);
		$decrypted = CommonUtility::sendCurlPOSTRequest($urlToHit,$requestJson,aadharVerificationEnums::TIMEOUT,$headerArr);
		if($decrypted){
			$response= json_decode($decrypted);
			if(!$response->status){
				$response = json_decode(EncryptionAESCipher::decrypt(aadharVerificationEnums::TOKENAUTHBRIDGE,$response->responseData));
				$reqId = $response->status;
				if($reqId==1)
				{
					$date = date("Y-m-d H:i:s");
					$this->insertAadharDetails($profileId,$username,$date,$aadharId,$aadharArr["transID"]);
					return 1;
				}
			}
			else{
				jsException::nonCriticalError("AUTHBRIDGE Aadhaar verification API error reponse".$response);
			}
		}
		else{
			jsException::nonCriticalError("AUTHBRIDGE Aadhaar verification API no reponse");
		}
		return 0;
	}

	public function insertAadharDetails($profileId,$username,$date,$aadharId,$reqId)
	{
		$aadharEncrypted = EncryptionAESCipher::encrypt(aadharVerificationEnums::AADHARENCRYPTIONKEY,$aadharId);
        $objProCacheLib = ProfileCacheLib::getInstance();
		self::$aadharObj->insertAadharDetails($profileId,$username,$date,$aadharEncrypted,$reqId);
		$aadharArr['PROFILEID'] = $profileId;
        $aadharArr['AADHAR_NO'] = $aadharEncrypted;
        $aadharArr['REQUEST_ID'] = $reqId;
        $aadharArr['VERIFY_STATUS'] = aadharVerificationEnums::NOTVERIFIED;
        $objProCacheLib->cacheThis(ProfileCacheConstants::CACHE_CRITERIA, $profileId, $aadharArr, __CLASS__);
	}

	public function getAadharDetails($profileId)
	{
		$objProCacheLib = ProfileCacheLib::getInstance();
        $fields = aadharVerificationEnums::$fieldsToCheck;
        $bServedFromCache = false;        
        $aadharDetails = null;        
        if ($objProCacheLib->isCached('PROFILEID', $profileId,$fields , __CLASS__,"1"))
        {
			
        	$result = $objProCacheLib->get(ProfileCacheConstants::CACHE_CRITERIA, $profileId, $fields, __CLASS__);
        	
        	if (false !== $result)
        	{
        		$bServedFromCache = true;
        		$result = FormatResponse::getInstance()->generate(FormatResponseEnums::REDIS_TO_MYSQL, $result);
        		if($result['REQUEST_ID']!=''){
	        		$aadharDetails[$profileId]["REQUEST_ID"] = $result['REQUEST_ID'];
					$aadharDetails[$profileId]["VERIFY_STATUS"] = $result['VERIFY_STATUS'];
					$aadharDetails[$profileId]["AADHAR_NO"] = "Provided";
				}
				else
					$aadharDetails='';
        	
        	}

        } 
        if ($bServedFromCache && ProfileCacheConstants::CONSUME_PROFILE_CACHE) {
            $this->logCacheConsumeCount(__CLASS__);  
                 
            return $aadharDetails;
        }  
            
        //get details using mysql

        if(!is_array($aadharDetails)){
			$aadharDetails = self::$aadharObj->getAadharDetails($profileId);
		
		//add details to cache
			$aadharArr = array();
			if(is_array($aadharDetails)){
				$aadharDetails[$profileId]["AADHAR_NO"]="Provided";
				foreach($aadharDetails as $key=>$value)
				{
					$aadharArr['PROFILEID'] = $key;
					/*if($value['AADHAR']){
						$aadharArr['AADHAR_NO'] = $value['AADHAR'];
					}
					else
						$aadharArr['AADHAR_NO'] = EncryptionAESCipher::encrypt(aadharVerificationEnums::AADHARENCRYPTIONKEY,$value['AADHAR_NO']);
					*/
		        	$aadharArr['REQUEST_ID'] = $value['REQUEST_ID'];
		        	$aadharArr['VERIFY_STATUS'] = $value['VERIFY_STATUS'];
				}
			  }else{
                        $aadharArr['REQUEST_ID'] = "";
                        $aadharArr['VERIFY_STATUS'] = "";
                        $aadharArr['PROFILEID'] = $profileId;
                }
		        if(false === ProfileCacheFunctions::isCommandLineScript("set")){
                       $objProCacheLib->cacheThis(ProfileCacheConstants::CACHE_CRITERIA, $profileId, $aadharArr, __CLASS__);		
				}
		}
		
		    
		return $aadharDetails;
	}

	public function updateVerificationStatus($profileId,$verifiedFlag)
	{	
		$updatedResult = self::$aadharObj->updateVerificationStatus($profileId,$verifiedFlag);
		$paramArr["VERIFY_STATUS"] = $verifiedFlag;	
        if (true === $updatedResult) {
            ProfileCacheLib::getInstance()->updateCache($paramArr, ProfileCacheConstants::CACHE_CRITERIA, $profileId, __CLASS__);
        }
        return $updatedResult;
	}

	public function resetAadharDetails($profileId)
	{		
		$fields = aadharVerificationEnums::$fieldsToCheck;
		$objProCacheLib = ProfileCacheLib::getInstance();
		self::$aadharObj->resetAadharDetails($profileId);
		$objProCacheLib->removeFieldsFromCache($profileId,__CLASS__,$fields);
		$objProCacheLib->__destruct();
	}

	private function logCacheConsumeCount($funName)
	{return;
		$key = 'cacheConsumption'.'_'.date('Y-m-d');
		JsMemcache::getInstance()->hIncrBy($key, $funName);

		JsMemcache::getInstance()->hIncrBy($key, $funName.'::'.date('H'));
	}

    public function preVerification($aadharId,$profileId)
    {
		$aadharEncrypted = EncryptionAESCipher::encrypt(aadharVerificationEnums::AADHARENCRYPTIONKEY,$aadharId);
		
        $resultArr = self::$aadharObj->checkIfAadharVerified($aadharId,aadharVerificationEnums::VERIFIED,$aadharEncrypted);        
        if(is_array($resultArr) && !empty($resultArr))
        {
            return $resultArr["PROFILEID"];
        }
        else
            return 0;
    }
    
    public function getProfilesForAadhaarVerificationMailer($entry_date,$login_date,$sendEvery){
        $profilesToReturn = self::$aadharObj->getProfilesWhoHaveUnverifiedAadhaar($entry_date,$login_date,$sendEvery);
        return $profilesToReturn;
    }

}