<?php

/**
 * jsexclusive actions.
 *
 * @package    jeevansathi
 * @subpackage jsexclusive
 */

class jsexclusiveActions extends sfActions {

    
    /**
	* Executes index action
	*
	* @param sfRequest $request A request object
	*/
	public function preExecute()
	{
		$request=sfContext::getInstance()->getRequest();
		$this->cid=$request->getParameter("cid");
		$this->name=$request->getParameter("name");
		$this->module = $request->getParameter("module");
		$this->action = $request->getParameter("action");

		//put module wise condition
		if($this->name && $this->module=="jsexclusive" && in_array($this->action, array("screenRBInterests","menu"))){
			$exclusiveObj = new billing_EXCLUSIVE_SERVICING();
			$this->assignedClients = $exclusiveObj->getUnScreenedExclusiveMembers($this->name,"ASSIGNED_DT");
			unset($exclusiveObj);
			if(is_array($this->assignedClients) && count($this->assignedClients)>0){
				$apObj = new ASSISTED_PRODUCT_AP_SEND_INTEREST_PROFILES();
				$this->assignedClients = $apObj->getSendersAfterDate($this->assignedClients);

				unset($apObj);
				if(is_array($this->assignedClients)){
					$this->unscreenedClientsCount = count($this->assignedClients);
				}
				else{
					$this->unscreenedClientsCount = 0;
				}
			}
			else{
				$this->unscreenedClientsCount = 0;
			}
		}
		else{
			$this->unscreenedClientsCount = 0;
		}
	}

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request) {
        $this->forward('default', 'module');
    }
    
    	/*forwards the request to given module action
    * @param : $module,$action
    */
	public function forwardTo($module,$action,$params=""){
		$url="/operations.php/$module/$action";
		if(is_array($params)){
			foreach ($params as $key => $value) {
				if(strpos($url, "?")){
					$url .= "&".$key."=".$value;
				}
				else{
					$url .= "?".$key."=".$value;
				}
			}
		}
		$this->redirect($url);
	}

	/*ScreenRBInterests - screen RB interests for clients assigned to logged in RM
    * @param : $request
    */
	public function executeScreenRBInterests(sfWebRequest $request){
		$exclusiveObj = new billing_EXCLUSIVE_SERVICING();
		//$assignedClients = $exclusiveObj->getUnScreenedExclusiveMembers($this->name,"ASSIGNED_DT");
		$this->clientIndex = $request->getParameter("clientIndex");
		$this->showNextButton = 'N';
		
		if(empty($this->clientIndex) || !is_numeric($this->clientIndex)){
			$this->clientIndex = 0;
		}
		
		if(!is_array($this->assignedClients) || count($this->assignedClients)==0){
			$this->infoMsg = "No assigned clients corresponding to logged in RM found..";
		}
		else if(!empty($this->clientIndex) && $this->clientIndex>=count($this->assignedClients)){
			$this->infoMsg = "No more clients left for screening for logged in RM..";
		}
		else{
			$this->clientId = $this->assignedClients[$this->clientIndex];
			$assistedProductObj = new ASSISTED_PRODUCT_AP_SEND_INTEREST_PROFILES("newjs_slave");
			$pogRBInterestsPids = $assistedProductObj->getPOGInterestEligibleProfiles($this->clientId);
			//$pogRBInterestsPids = array(543);
			unset($assistedProductObj);

			$clientProfileObj = new Operator;
			$clientProfileObj->getDetail($this->clientId,"PROFILEID","PROFILEID,USERNAME,GENDER,HOROSCOPE_MATCH,CASTE");

			if($clientProfileObj){
				$this->horoscopeMatch = $clientProfileObj->getHOROSCOPE_MATCH();
				$this->clientData = array("clientUsername"=>$clientProfileObj->getUSERNAME(),"HoroscopeMatch"=>"N","PROFILEID"=>$this->clientId,"clientCaste"=>$clientProfileObj->getCASTE());
				$this->clientData["HoroscopeMatch"] = $this->horoscopeMatch;
				$this->clientData["gender"] = $clientProfileObj->getGENDER();
				unset($clientProfileObj);

				if(is_array($pogRBInterestsPids) && count($pogRBInterestsPids)>0){
					$exclusiveLib = new ExclusiveFunctions();
					$this->pogRBInterestsPool = $exclusiveLib->formatScreenRBInterestsData($this->clientData,$pogRBInterestsPids);
					unset($exclusiveLib);
				}
				else{
					$this->infoMsg = "No members for this client found..";
					$this->showNextButton = 'Y';
				}
			}
			unset($clientProfileObj);
		}
	}

	/*SubmitScreenRBInterests - submit screened RB interests for clients assigned to logged in RM and filtered by RM
    * @param : $request
    */
	public function executeSubmitScreenRBInterests(sfWebRequest $request){
		$formArr = $request->getParameterHolder()->getAll();

		if(is_numeric($formArr["clientIndex"])){
			$this->clientIndex = $formArr["clientIndex"];
			if(empty($this->clientIndex)){
				$this->clientIndex = 0;
			}
			if($formArr["submit"] == "SUBMIT"){
				$acceptArr = $formArr["ACCEPT"];
				$discardArr = $formArr["DISCARD"];
				if(is_array($acceptArr) && is_array($discardArr)){
					$acceptArr = array_diff($acceptArr, $discardArr);
					$acceptArr = array_values($acceptArr);
				}
				
				$email = $request->getParameter("email");
				$exclusiveObj = new ExclusiveFunctions();
				$exclusiveObj->processScreenedEois(array("agentUsername"=>$this->name,"clientId"=>$request->getParameter("clientId"),"acceptArr"=>$acceptArr,"discardArr"=>$discardArr));
				unset($exclusiveObj);
			}
			else{
				++$this->clientIndex;
			}
			$this->forwardTo("jsexclusive","screenRBInterests",array("clientIndex"=>$this->clientIndex));
		}
		else{
			$this->forwardTo("jsexclusive","screenRBInterests");
		}
    }

    public function executeMenu(sfWebRequest $request) {
        //Get Count for each option 
        $agent = $request['name'];
        //Counter for welcome calls
        $exclusiveServicingObj = new billing_EXCLUSIVE_SERVICING();
        $this->welcomeCallsCount = $exclusiveServicingObj->getWelcomeCallsCount($agent);
    }

    public function executeWelcomeCalls(sfWebRequest $request) {

        $agent = $request['name'];
        //Get all clients here
        $exclusiveServicingObj = new billing_EXCLUSIVE_SERVICING();
        $this->welcomeCallsProfiles = $exclusiveServicingObj->getClientsForWelcomeCall('CLIENT_ID', $agent, 'ASSIGNED_DT');
        $this->welcomeCallsProfilesCount = count($this->welcomeCallsProfiles);
    }

    public function executeWelcomeCallsPage2(sfWebRequest $request) {

        $agent = $request['name'];
        $this->cid = $request['cid'];
        $this->client = $request['client'];
        $this->profileChecksum= JsOpsCommon::createChecksumForProfile($this->client);
        //Get all clients here
        $exclusiveServicingObj = new billing_EXCLUSIVE_SERVICING();
    }
    
    public function executeSetClientServiceDay(sfWebRequest $request) {

        $agent = $request['name'];
        $this->cid = $request['cid'];
        $this->client = $request['client'];
        $submit = $request['submit'];
        $exclusiveServicingObj = new billing_EXCLUSIVE_SERVICING();
        $serviceDayArr = $exclusiveServicingObj->getServiceDay($this->client);
        $this->serviceDay = $serviceDayArr[0];
        $this->serviceDaySetDate = $serviceDayArr[1];
        if($submit){
            $this->serviceDay = $request['serviceDay'];
            $this->serviceDaySetDate = date('Y-m-d');
            $exclusiveServicingObj->setServiceDay($this->client,$this->serviceDay);
        }
        
        
    }

    public function executeUploadBiodata(sfWebRequest $request) {
/* Key for:
 * $this->invalidFile:    1- Size exceeds 5 MB
 *                  2- Invalid file type
 *                  3- General Processing error
 */
        //Location where file will be uploaded and downloaded from
        $fileLocation = "/var/www/html/branch2/web/uploads/temp/"; 
        //Max size of file allowed
        $maxsize = 5 * 1024 * 1024;
        //Allowed File Types:
        $allowedExtension=array('pdf','rtf','doc','docx','jpg','jpeg','txt');
        $this->allowedExtension = implode(", ", $allowedExtension);
        $exclusiveServicingObj = new billing_EXCLUSIVE_SERVICING();
        $agent = $request['name'];
        $this->cid = $request['cid'];
        $this->client = $request['client'];
        $action = $request['useraction'];
        if ($action == "") {
            $biodata = $exclusiveServicingObj->checkBioData($this->client);
            $biodataLocation = $biodata[0];
            $biodataUploadDate = $biodata[1];
            if ($biodataLocation == NULL || $biodataLocation == "") {
                $this->freshUpload = true;
            } else {
                $this->freshUpload = false;
            }
        } else if ($action == 'deleteBioData') {
            $biodata = $exclusiveServicingObj->checkBioData($this->client);
            $biodataLocation = $biodata[0];
            if(unlink($biodataLocation)){
                $this->deleteStatus = $exclusiveServicingObj->deleteBioData($this->client);
                $this->freshUpload = true;
            }else{
                $this->invalidFile = 3;
                $this->freshUpload = false;
            }
        } else if ($action == 'viewBioData') {
            $biodata = $exclusiveServicingObj->checkBioData($this->client);
            $biodataLocation = $biodata[0];
            $ext = end(explode('.', $biodataLocation));
            $file = "BioData-$this->client.".$ext;
            $xlData=file_get_contents($biodataLocation);
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . basename($file) . '"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            echo $xlData;
            die;
        } else if ($action == 'uploadBioData') {
            $upload = $request->getParameter('upload');
            $fileParam = $request->getFiles('uploaded_csv');
            $csvUpload = $request->getParameter($csvUpload);
            if ($upload == 'Upload') {
                $fileTemp = $fileParam['tmp_name'];
                $fileName = $fileParam['name'];
                $fileType = $fileParam['type'];
                $filesize = $_FILES["photo"]["size"];
                $ext = end(explode('.', $fileName));
                if ($filesize > $maxsize)
                    $this->invalidFile = 1;
                if (!in_array($ext, $allowedExtension)) {
                    $this->invalidFile = 2;
                } else {
                    $location = $fileLocation . $_FILES['uploaded_csv']['name'];
                    if (move_uploaded_file($_FILES['uploaded_csv']['tmp_name'], $location)) {
                        $exclusiveServicingObj->setBioDataLocation($this->client, $location);
                        $this->uploadSuccess = true;
                        $this->freshUpload = false;
                    } else {
                        $this->invalidFile = 3;
                    }
                }
            }
        }
    }

}
?>
