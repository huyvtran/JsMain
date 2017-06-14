<?php

/**
 * screening action
 *
 * @package    jeevansathi
 * @subpackage Document Screening
 * @author     Bhavana Kadwal
 * @version    
 */
class screeningActions extends sfActions {

        const DEFAULT_AVOID_REFRESH_TIME = 2;

        /**
         * Executes index action
         * *
         * @param sfRequest $request A request object
         */
        public function executeIndex(sfWebRequest $request) {
                
        }

        public function executeScreenDocument(sfWebRequest $request) {
                $this->execName = $name;
                $this->cid = $request->getParameter("cid");
                $this->name = $request->getAttribute('name');
                $this->execName = $this->name;
                $inputArr = $request->getParameterHolder()->getAll();

                //start: memcache functionality implemented to avoid user refreshing the page
                if ($_GET['skipMemcache'] != 1) {
                        $key = "PROFILE_VERIFICATION_" . $this->name;

                        if (JsMemcache::getInstance()->get($key)) {
                                JsMemcache::getInstance()->set($key, $this->name, 5);
                                //exit("Please refresh after 5 seconds.");
                        } else
                                JsMemcache::getInstance()->set($key, $this->name, 5);
                }
                $arr = $request->getParameterHolder()->getAll();

                //Allotment
                $objDoc = new ProfileDivorcedDocumentScreening();
                $profileObj = new Operator;
                $fetchProfileAllocatinArr = $objDoc->fetchProfileToAllot($this->name);
                if($fetchProfileAllocatinArr)
                {
                        $pid = $fetchProfileAllocatinArr["PROFILEID"];
                        $profileObj->getDetail($pid,"PROFILEID",'USERNAME');
                        $this->username = $profileObj->getUSERNAME();	
                        if(!$fetchProfileAllocatinArr["updateAllotTime"])
                                $dontUpdateAllocationTime=1;
                }
                
                if(!$dontUpdateAllocationTime)
				$objDoc->allotProfile($pid,$this->name);
                
                $infoObj = new CriticalInfoChangeDocUploadService();
                $infoArr = $infoObj->getDocumentsList($pid);
		$this->profileid = $pid;
                if (!empty($infoArr)) {
                        $this->documentURL = PictureFunctions::getCloudOrApplicationCompleteUrl($infoArr["DOCUMENT_PATH"]);
                        $urlOri = PictureFunctions::getCloudOrApplicationCompleteUrl($infoArr["DOCUMENT_PATH"],true);
                        $finfo = finfo_open(FILEINFO_MIME_TYPE);
                        $contentType = "image";
                        foreach (glob($urlOri) as $filename) 
                        {
                                if(finfo_file($finfo, $filename) === 'application/pdf') 
                                {
                                        $contentType = "pdf";
                                        $type="";
                                } 
                        }
                        finfo_close($finfo);
                        $this->contentType = $contentType;
                        $this->documentPath = $infoArr["DOCUMENT_PATH"];
                } else {
                        $this->documentURL = "";
                        $this->documentPath = "";
                }
        }
        public function executeUploadScreenDocument(sfWebRequest $request){
                $pid= $_POST["profileid"];
                $name= $_POST["username"];
                $documentPath= $_POST["docPath"];
                $status = "F";
                if($_POST["docVerified"] == "APPROVE"){
                        $status = "Y";
                }
                $cDocObj = new CriticalInfoChangeDocUploadService();
                $cDocObj->updateStatus($pid,$status);
                if($status == "Y"){
                        $jprofileObj = new JPROFILE();
                        $paramArr = array("MSTATUS"=>"D");
                        $jprofileObj->edit($paramArr, $pid, "PROFILEID");
                }
                $logObj = new CRITICAL_INFO_DOC_SCREENED_LOG();
                $logObj->insert($pid, $name, $status, $documentPath);
                
                $objDoc = new ProfileDivorcedDocumentScreening();
                $objDoc->del($pid,$name);
                
                $mailer = new CriticalInformationMailer($pid);
                $mailer->sendSuccessFailMailer($status);
                $this->redirect('/operations.php/screening/screenDocument?name='.$name.'&cid='.$_POST["cid"]);
        }

}

?>
