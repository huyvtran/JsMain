<?php
/**
 * CLASS Decline
 *<BR>
 * The {@link ContactFactory} uses this class to instantiate it's own <BR>
 * and it's siblings {@link Accept}, {@link CancelAccept}, <BR>
 * {@link Reminder}, {@link CancelContact}, {@link WriteMessage} <BR>
 * and {@link Initiate} class<BR>
 * 
 * This class is responsible to handle Cancel Accept event between two users.<BR>
 * @extends ContactEvent {@link ContactEvent}
 * @package   jeevansathi
 * @subpackage   contacts
 * @author Esha Jain <esha.jain@jeevansathi.com>
 */
class Decline extends ContactEvent{
  /**
   * 
   * Constructor for instantiating object of Decline class
   * 
   * <p>
   * It sets the contactHandler variable of parent class ContactEvent and then call the constructior of parent class ContactEvent.
   * </p>
   * 
   * @access public
   * @param ContactHandler $contactHandler
   */
  public function __construct(ContactHandler $contactHandler)
  {
    try
    {
      $this->contactHandler = $contactHandler;
      parent::__construct();
    }
    catch(Exception $e)
    {
      throw new jsException($e);
    }
  }
  /**
   * 
   * Sets details required to display Pre Component for action Decline
   * 
   * <p>
   * This function sets information required to built pre component. It instantiates PreComponent, set the details like drafts, template name etc. required and returns this component.
   * </p>
   * 
   * @access public
   */
  public function setPreComponent()
  {
    $this->component	=	new PreComponent;
    $draftsObj	=	new ProfileDrafts($this->contactHandler->getViewer());
    $privilegeObj=$this->contactHandler->getPrivilegeObj();
    $this->component->acceptdrafts = $draftsObj->getAcceptDrafts();
    //gets lists of drafts to be displayed (full drop down menu displayed for paid users) when user clicks on accept
    $this->component->drafts=$this->component->declinedrafts = $draftsObj->getDeclineDrafts();//gets lists of drafts to be displayed (full drop down menu displayed for paid users) when user clicks on accept
    //$this->component->layoutTpl="layout_dp";
    //$this->component->innerTpl="profile_eoi_pia";
  }
  /**
   * 
   * Submits the form and make database changes
   * 
   * <p>
   * This function updates:
   * <ol>
   * <li> memcache </li>
   * <li> contacts table </li>
   * </ol>
   * </p>
   * 
   * @access public
   */
  public function submit(){
    $currentFlag	=	$this->contactHandler->getContactType();
    $this->updateMemcache($currentFlag,$this->contactHandler->getContactObj()->getFILTERED());
    $this->contactHandler->getContactObj()->setType(ContactHandler::DECLINE);
    $this->contactHandler->getContactObj()->setSEEN(Contacts::NOTSEEN);

    $this->contactHandler->getContactObj()->updateContact();
    $responseTracking =  $this->contactHandler->getElements("RESPONSETRACKING");
    JSResponseTracking::updateResponseTracking($this->contactHandler,$responseTracking);
    $this->contactHandler->setElement("STATUS","D");    
    $this->handleMessage();

    //    $this->updateContactSeen();//
    $producerObj=new Producer();
    if($producerObj->getRabbitMQServerConnected())
    {
        $receiver = $this->contactHandler->getViewed();
        $sender = $this->contactHandler->getViewer();
        $sendMailData = array('process' =>'MAIL','data'=>array('type' => 'DECLINECONTACT','body'=>array('senderid'=>$sender->getPROFILEID(),'receiverid'=>$receiver->getPROFILEID()) ), 'redeliveryCount'=>0 );
        $producerObj->sendMessage($sendMailData);
    }
    else
    {
        $this->sendMail();
    }    
  }


  /**
   * 
   * function setPostComponent
   * 
   * <p>
   * This function sets details to create display template after the action Accept is performed. It instantiates PostComponent and sets details required like message to be diplayed, title of page etc in the variable component 
   * </p>
   * 
   * @access public
   */
  public function setPostComponent()
  {
    $this->component	=	new PostComponent;
    $draftsObj	=	new ProfileDrafts($this->contactHandler->getViewer());    
    $this->component->drafts = $draftsObj->getDeclineDrafts('Y');
    $this->component->acceptdrafts = $draftsObj->getAcceptDrafts();
    $this->component->declinedrafts = $draftsObj->getDeclineDrafts();
    $this->setPostDrafts($this->component->declinedrafts);
  }


  /**
   * 
   * Sets Variables to be updated in Memcache while performing action Decline
   * 
   * <p>
   * This function sets and updates memcache variables according to the previous status type between sender and receiver
   * </p>
   * 
   * @access private
   * @param $currentFlag
   */

  private function updateMemcache($currentFlag,$filtered)
  {
    try {
        $profileMemcacheServiceViewerObj = new ProfileMemcacheService($this->contactHandler->getViewer());
        $profileMemcacheServiceViewedObj = new ProfileMemcacheService($this->contactHandler->getViewed());
        $profileMemcacheServiceViewerObj->update("DEC_BY_ME",1);
        $profileMemcacheServiceViewedObj->update("DEC_ME",1);
        $profileMemcacheServiceViewedObj->update("DEC_ME_NEW",1);
      if($currentFlag==ContactHandler::INITIATED)
      {
        if ($filtered!='Y'){
        $profileMemcacheServiceViewerObj->update("OPEN_CONTACTS",-1);
        $profileMemcacheServiceViewedObj->update("NOT_REP",-1);
        $profileMemcacheServiceViewerObj->update("AWAITING_RESPONSE",-1);
        if($this->contactHandler->getContactObj()->getSEEN() == Contacts::NOTSEEN)
		$profileMemcacheServiceViewerObj->update("AWAITING_RESPONSE_NEW",-1);
}
 else $profileMemcacheServiceViewerObj->update("FILTERED",-1);
      }
      elseif($currentFlag==ContactHandler::ACCEPT)
      {
        $profileMemcacheServiceViewerObj->update("ACC_BY_ME",-1);
        $profileMemcacheServiceViewedObj->update("ACC_ME",-1);
        if($this->contactHandler->getContactObj()->getSEEN() == Contacts::NOTSEEN)
		$profileMemcacheServiceViewedObj->update("ACC_ME_NEW",-1);
      }
      $profileMemcacheServiceViewerObj->updateMemcache();
      $profileMemcacheServiceViewedObj->updateMemcache(); 	
    }
    catch (Exception $e) {
      throw new jsException($e);
    }
  }
	public function sendMail(){
		$receiver = $this->contactHandler->getViewed();
		$sender = $this->contactHandler->getViewer();
		ContactMailer::sendDeclineMail($receiver,$sender);
		return true;
	}

}
?>