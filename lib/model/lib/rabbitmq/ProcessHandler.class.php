<?php
/*
This class includes functions for sending mail, sms and notifications.
*/
include_once(JsConstants::$cronDocRoot."/crontabs/connect.inc");
include_once(JsConstants::$cronDocRoot."/aps/jeevansathi/modules/chat/lib/JS_Communicationclass.php");
class ProcessHandler
{
  /**
   * 
   * Function for sending e-mail
   * 
   * @access public
   * @param $type,$body
   */
	public function sendMail($type,$body)
	{
    $senderid=$body['senderid'];
    $receiverid=$body['receiverid'];
    $message = $body['message'];
    $senderObj = new Profile('',$senderid);   
    $senderObj->getDetail("","","*");
    $receiverObj = new Profile('',$receiverid);
    $receiverObj->getDetail("","","*");
    switch($type)
    {
      case 'CANCELCONTACT' :  ContactMailer::sendCancelledMailer($receiverObj,$senderObj);
                              break;
      case 'ACCEPTCONTACT' :  ContactMailer::sendAcceptanceMailer($receiverObj,$senderObj);  
                              break;
      case 'DECLINECONTACT':  ContactMailer::sendDeclineMail($receiverObj,$senderObj); 
                              break;
      case 'MESSAGE'       :  ContactMailer::sendMessageMailer($receiverObj, $senderObj,$message);
                              break;
    }
	}

  /**
   * 
   * Function for sending SMS.
   * 
   * @access public
   * @param $type,$body
   */
  public function sendSMS($type,$body)
  {
    
    include_once(JsConstants::$docRoot."/profile/InstantSMS.php");
    $senderid=$body['senderid']; 
    $receiverid=$body['receiverid'];
    switch($type)
    {
      case 'ACCEPTANCE_VIEWER' : $smsViewer = new InstantSMS($type,$senderid,'',$receiverid);
                                 $smsViewer->send();  
                                 break;
      case 'ACCEPTANCE_VIEWED' : $smsViewer = new InstantSMS($type,$receiverid,'',$senderid);
                                 $smsViewer->send();  
                                 break; 
    }
  }

  /**
   * 
   * Function for sending notifications.
   * 
   * @access public
   * @param $type,$body
   */
  public function sendGCM($type,$body)
  {
    $senderid=$body['senderid'];   
    $receiverid=$body['receiverid'];
    $message = $body['message'];
    switch($type)
    {
      case 'ACCEPTANCE' :  $instantNotificationObj = new InstantAppNotification("ACCEPTANCE");
                           $instantNotificationObj->sendNotification($receiverid, $senderid);
                           break;
      case 'MESSAGE'    :  $instantNotificationObj = new InstantAppNotification("MESSAGE_RECEIVED");
                           $instantNotificationObj->sendNotification($receiverid, $senderid, $message);  
                           break;
    }
  } 

  /**
   * 
   * Function for sending gcm notifications(fso app/browser).
   * 
   * @access public
   * @param $type,$body
   */
  public function sendGcmNotification($type,$body)
  {
    if(in_array($type, BrowserNotificationEnums::$notificationChannelType))
    {
      switch($type)
      {
        case "BROWSER_NOTIFICATION" : GcmNotificationsSender::handleNotification($type,$body,false);
                                      break;
        case "FSOAPP_NOTIFICATION"  : GcmNotificationsSender::handleNotification($type,$body,true);
                                      break;
      }
    }    
  }
  
  public function sendInstantNotification($type, $body)
  {
    if($body){
        $notificationType = "INSTANT"; //INSTANT/SCHEDULED
        $notificationKey = $body["notificationKey"];
        $selfUserId = $body["selfUserId"];    //profileid/agentid to whom notification is to be sent
        $otherUserId = $body["otherUserId"]; //comma separated list of other profileids(whose data is used in notification)
        $message = $body["message"]; //For any other detail which needs to be passed as parameter
        if($otherUserId)
            $otherUserId = explode(",", $otherUserId);
        $processObj = new BrowserNotificationProcess();
        if(in_array($notificationKey, BrowserNotificationEnums::$instantNotifications))
        {
            $processObj->setDetails(array("method"=>$notificationType,"notificationKey"=>$notificationKey,"selfUserId"=>$selfUserId,"otherUserId"=>$otherUserId, "message" => $message));
            $browserNotificationObj = new BrowserNotification($notificationType,$processObj);
            $browserNotificationObj->addNotification($processObj);
        }
    }
  }

  
  /**
   * 
   * Function to delete/retrieve user
   * 
   * @access public
   * @param $type,$body
   */
  public function deleteRetrieveProfileId($type,$body)
  {
    switch($type)
    {
      case "RETRIEVE" : 
                      passthru(JsConstants::$php5path." $_SERVER[DOCUMENT_ROOT]/profile/retrieveprofile_bg.php " . $body['profileId'] . " > /dev/null");  
                      break;
      case "DELETING" :
                      passthru(JsConstants::$php5path." $_SERVER[DOCUMENT_ROOT]/profile/deleteprofile_bg.php " . $body['profileId'] . " > /dev/null");
                      break;

    }

 }

 public function insertChatMessage($type,$body)
 {
     switch($type)
     {
         case "PUSH":
             $sender = $body["sender"];
             $receiver = $body["receiver"];
             $communicationType = $body["communicationType"];
             $message = $body["message"];
             $chatId = $body["chatid"];
             $js_communication=new JS_Communication($sender,$receiver,$communicationType,$message,$chatId);
             $js_communication->storeCommunication();
             break;
     }
 }
 public function updateSeen($type,$body)
 {
	switch($type)
	{
		case "ALL_CONTACTS":
			$contactsObj = new ContactsRecords();
			$contactsObj->makeAllContactSeen($body['profileid'],$body['contactType']);
			break;
		case "ALL_MESSAGES":
			MessageLog::makeAllMessagesSeen($body['profileid']);
			break;
		case "PHOTO_REQUEST":
			Inbox::setAllPhotoRequestsSeen($body['profileid']);
			break;
		case "HOROSCOPE_REQUEST":
			Inbox::setAllHoroscopeRequestsSeen($body['profileid']);
			break;
	}
 }
}
?>
