<?php
/*
 * Author: Prashant Pal
 * @param oneTime is 1 when cron is for the first time for all active users & 0 for daily basis new register users
 * @param $profilemail are users to whom mail has to be send
 * @param $Interval time interval for daily basis for new users 
 * @param $OneTimeInerval is time period for the active users in that particular time period
 * This task send the pendingt mail to the users
 */
 class YesNoMailerTask extends sfBaseTask
 {
	private $noOfActiveServers = 3;
	private $noOfChunksSender = 1000;
	protected function configure()
  	{
  		$this->addArguments(array(
                	new sfCommandArgument('chunks', sfCommandArgument::REQUIRED, 'My argument'),
		));
  		$this->addOptions(array(
		new sfCommandOption('application', null, sfCommandOption::PARAMETER_OPTIONAL, 'The application name', 'jeevansathi'),
	     ));
	     
	    $this->namespace        = 'mailer';
	    $this->name             = 'NEWJS_YesNoMailer';
	    $this->briefDescription = 'send the mail to jeevansathi users for pending interests';
	    $this->detailedDescription = <<<EOF
	Call it with:
	  [php symfony mailer:NEWJS_YesNoMailer chunks] 
EOF;
  	}

	protected function execute($arguments = array(), $options = array())
	{
		if(!sfContext::hasInstance())
	                sfContext::createInstance($this->configuration);
	            $mailerYNObj = new MAIL_YesNoMail("newjs_master");
	            $mailerYNObj->EmptyMailerYN();
	            $chunk=$arguments["chunks"];
	            for($serverId=0;$serverId<$this->noOfActiveServers;$serverId++){
	            	for($i=0;$i<$chunk;$i++){
	            	$dbName = JsDbSharding::getShardNo($serverId,true);
	            	$Contactsobj = new newjs_CONTACTS($dbName);
	            	$chunkstr="AND RECEIVER%".$chunk."=".$i;
	            	$profilemail=$Contactsobj->getContactsPending($serverId,$chunkstr);
	            	if($profilemail)
	            	{
	            	$profileMailChunkArray=array_chunk($profilemail, $this->noOfChunksSender);
	            	foreach ($profileMailChunkArray as $key => $value) {
	            		$profilemailchunk=$value;
			            	$profilemailchunk=implode(',',$profilemailchunk);
			            	$contactResult = $Contactsobj->getSendersPending($profilemailchunk);
				            	foreach ($contactResult as $key => $value) {
				            		
				            		$usercode = explode(',',$value);
				            		$count=count($usercode);
				            		if(count($usercode)>10)
				            			$usercode = array_slice($usercode, 0, 10);
				            		
				            		$usercode = implode(',',$usercode);
									$mailerYNObj->InsertMailerYN($key,$usercode,$count);

				            	}
								}
	            	}
	            }
		}
	
	}
 }


