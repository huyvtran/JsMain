<?php
/*
include("connect.inc");
connect_db();
$data=authenticated($checksum);*/
class processCropperV1Action extends sfActions
{ 
	/**
	* Executes index action
	*
	* @param sfRequest $request A request object
	*/
	public function execute($request)
	{
                ini_set('memory_limit',"512M");
                $profileObj=LoggedInProfile::getInstance('newjs_master');
                $profileid = $profileObj->getPROFILEID();
                $profileObj->getDetail("","","HAVEPHOTO");

                $cropBoxDimensionsArr = $request->getParameter("cropBoxDimensionsArr");
		foreach($cropBoxDimensionsArr as $k=>$v)
		{
			if(!is_numeric($v))
			{
				$inputError = true;
				break;
			}
		}
		if($inputError)
		{
			$respObj = ApiResponseHandler::getInstance();
			$respObj->setHttpArray(ResponseHandlerConfig::$FAILURE);
			$respObj->setResponseBody($profileInfo);  //response to be decided and failure case:LATER
			$respObj->generateResponse();
			unset($profilesUpdate);
			die;
		}
                $imgPreviewTypeArr = $request->getParameter('imgPreviewTypeArr');

		$pictureServiceObj=new PictureService($profileObj);
		$ProfilePicUrlObj = $pictureServiceObj->getProfilePic();
		$cropImageSource = $ProfilePicUrlObj->getMainPicUrl();

                if(MobileCommon::isApp()=="A")
                {
			$appImageWidth = $cropBoxDimensionsArr['fw'];
			$appImageHeight = $cropBoxDimensionsArr['fh'];
			unset($cropBoxDimensionsArr['fw']);
			unset($cropBoxDimensionsArr['fh']);
			PictureFunctions::setHeaders();
			list($imageOrigWidth, $imageOrigHeight) = getimagesize($cropImageSource);

			$factorWidth = $imageOrigWidth/$appImageWidth;
			$factorHeight = $imageOrigHeight/$appImageHeight;
			$cropBoxDimensionsArr['x'] = $cropBoxDimensionsArr['x'] * $factorWidth;
			$cropBoxDimensionsArr['y'] = $cropBoxDimensionsArr['y'] * $factorHeight;
			$cropBoxDimensionsArr['w'] = $cropBoxDimensionsArr['w'] * $factorWidth;
			$cropBoxDimensionsArr['h'] = $cropBoxDimensionsArr['h'] * $factorHeight;
                }

                $cropperProcessObj = new CropperProcess($profileObj);
                $profilesUpdate = $cropperProcessObj->process($cropImageSource,$cropBoxDimensionsArr,$imgPreviewTypeArr);

		foreach($profilesUpdate as $k=>$v)
		{
			$profileInfo['PICTUREID'] = $k;
			$profileInfo['picSizeVariants'] = $v;
			foreach($v as $k1=>$v1)
			{
				$profileInfo['picSizeVariants'][$k1]= PictureFunctions::getCloudOrApplicationCompleteUrl($v1);
			}
		}
                if(is_array($profilesUpdate))
                        $output = $pictureServiceObj->setPicProgressBit("FACE",$profilesUpdate);
                else
                        $output = -1;
                unset($pictureServiceObj);
            // Flush memcache for header picture
                $memCacheObject = JsMemcache::getInstance();
                $memCacheObject->remove($profileid . "_THUMBNAIL_PHOTO");
                $memCacheObject->remove($profileid . "_HamburgerPicUrl");

                $respObj = ApiResponseHandler::getInstance();
                if($output == 1)
                        $respObj->setHttpArray(ResponseHandlerConfig::$SUCCESS);
                else
                        $respObj->setHttpArray(ResponseHandlerConfig::$FAILURE);
                $respObj->setResponseBody($profileInfo);  //response to be decided and failure case:LATER
                $respObj->generateResponse();
                unset($profilesUpdate);
		die;
	}

}
