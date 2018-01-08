<?php
/*
 *	Author:Sanyam Chopra
 *	This cron fetches the jira merged into QASanityReleaseNew/CIRelease depending on the parameter passed and based on when the last live date is and accordingly saves it to a file
 */

class getMergedBranchesTask extends sfBaseTask{
	/**
   * 
   * Configuration details for CI:getMergedBranches
   * 
   * @access protected
   * @param none
   */
  protected function configure()
  {
    $this->namespace           = 'CI';
    $this->name                = 'getMergedBranches';
    $this->briefDescription    = 'get branches merged into QASanity and/or CI as per the arguments provided and save it to a file';
    $this->detailedDescription = <<<EOF
     get branches merged into QASanity and/or CI as per the arguments provided and save it to a file
     [php symfony CI:getMergedBranches targetBranch] 
EOF;
	$this->addArguments(array(
			new sfCommandArgument('targetBranch', sfCommandArgument::REQUIRED, 'Target Branch')));
  }

  protected function execute($arguments = array(), $options = array())
  {  	
    $targetBranch = $arguments["targetBranch"];
    
	//setting defualt time zone
    date_default_timezone_set('Asia/Kolkata');

    $QASanityReleaseBranchesArr = array();
    $CIBranchesArr = array();
    $releaseBranch = "";
    $targetBranchQA = "QASanityReleaseNew";
    $targetBranchCI = "CIRelease";
    $currentDateTime = date("Y-m-d H:i:s");
    $timeAppend = "16:30:00";
    $urlToHit = "http://gitlabweb.infoedge.com/api/v3/projects/Jeevansathi%2FJsMain/merge_requests?per_page=200&state=merged";

    $headerArr = array(
    	'PRIVATE-TOKEN:xBgqNzVkJ7YQ5YBEy8HJ',				
		); //Token used is of the username : vidushi@naukri.com

    $SanityMergedFileName = "/var/www/CI_Files/QASanityMergedBranches.txt";

    $CIMergedFileName = "/var/www/CI_Files/CIMergedBranches.txt";

	//last released branch name is stored in this file
    $lastReleasedBranchFileName = "/var/www/CI_Files/lastReleasedBranch.txt"; 

	//To get files arr by reading the entire file
    $SanityFilesArr = file($SanityMergedFileName , FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    $CIFilesArr = file($CIMergedFileName , FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    if($targetBranch == $targetBranchCI)
    {	
    	$CIlastReleaseDateFileName = "/var/www/CI_Files/CIReleaseLastReleaseDate.txt";
    	$CILastReleaseDateArr = file($CIlastReleaseDateFileName , FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    	$CILastReleaseDate = $CILastReleaseDateArr[0];

	//considering that CIRelease goes live very frequently, the pagination limit has been reduced and kept to the default 20.
    	$urlToHit = "http://gitlabweb.infoedge.com/api/v3/projects/Jeevansathi%2FJsMain/merge_requests?state=merged";

    	$response = CommonFunction::sendCurlGETRequest($urlToHit,'',"",$headerArr,"GET");

    	foreach($response as $key=>$value)
    	{
    		$updatedAtDate = explode(".",$value->updated_at);
    		$updatedDate = str_replace("T"," ", $updatedAtDate[0]);

    		if($value->target_branch == $targetBranchCI && ($updatedDate > $CILastReleaseDate && $updatedDate < $currentDateTime))
    		{
    			$CIBranchesArr[$value->source_branch] = $value->updated_at;
    		}
    		unset($updatedAtDate);
    	}

	//Adding CIRelease JIRA IDs to file
    	if($file = fopen($CIMergedFileName, "a"))
    	{
    		if(is_array($CIBranchesArr) && !empty($CIBranchesArr))
    		{
    			foreach($CIBranchesArr as $key=>$value)
    			{
    				if(!in_array($key, $CIFilesArr))
    				{
    					fwrite($file, $key."\n");
    				}
    			}
    		}
    	}
    	die("script finished execution for CIRelease");
    }
    elseif($targetBranch == $targetBranchQA)
    {
    	$SanitylastReleaseDateFileName = "/var/www/CI_Files/QASanityLastReleaseDate.txt";

    	$sanityLastReleaseDateArr = file($SanitylastReleaseDateFileName , FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);	
    	$sanityLastReleaseDate = $sanityLastReleaseDateArr[0];

    	$now = time();
    	$sanityReleaseTime = strtotime($sanityLastReleaseDate);
    	$dateDiff = floor(($now - $sanityReleaseTime) / (60 * 60 * 24));

    	$requiredDate = date("Y-m-d",strtotime("-".++$dateDiff." day"));
    	$requiredDate = $requiredDate." ".$timeAppend;

    	$response = CommonFunction::sendCurlGETRequest($urlToHit,'',"",$headerArr,"GET");
    	foreach($response as $key=>$value)
    	{
    		$updatedAtDate = explode(".",$value->updated_at);
    		$updatedDate = str_replace("T"," ", $updatedAtDate[0]);

	//echo("updateDate:".$updatedDate."\n greater than requiredDate:".$requiredDate."\n less than current date:".$currentDateTime);die;
    		if($updatedDate > $requiredDate && $updatedDate < $currentDateTime)
    		{	
    			if($value->target_branch == $targetBranchQA)
    			{
    				$QASanityReleaseBranchesArr[$value->source_branch] = $value->updated_at;	
    			}
    			elseif($value->target_branch == $targetBranchCI)
    			{
    				$CIBranchesArr[$value->source_branch] = $value->updated_at;
    			}
    		}
    		unset($updatedAtDate);
    	}

	//loop to remove same branches in CI and QASanity and also to remove RC branch which was merged back to QASanityReleaseNew
        if(is_array($QASanityReleaseBranchesArr) && !empty($QASanityReleaseBranchesArr))
        {
         foreach($QASanityReleaseBranchesArr as $key=>$value)
         {
          if($CIBranchesArr[$key])
          {		
				unset($QASanityReleaseBranchesArr[$key]);		//removed those from QASanity arr which existes both in CIRelease and QASanity.
			}
			if(strpos($key,"RC@")!==false)
			{
				unset($QASanityReleaseBranchesArr[$key]); //removed RC@<date> branch which was back merged to Sanity hence had not gone live
			} 
		}
	}

	//Loop on CIRELEASE to check if there was an RC brach merged.
	if(is_array($CIBranchesArr) && !empty($CIBranchesArr))
	{
		foreach($CIBranchesArr as $key=>$value)
		{
			if("RC@" == substr($key,0,3))
			{
				$releaseBranch = $key; //check to see where it has to be used.
				//unset($CIBranchesArr[$key]); //check if it needs to be unset
			}
		}
	}

	//to write the last released branch into a file(filename)
	if($file = fopen($lastReleasedBranchFileName, "w+")) //changed the mode form "a" to "w+". Check again
	{
		fwrite($file, $releaseBranch."\n");
	}

//Adding QASanity JIRA IDs to file
	if($file = fopen($SanityMergedFileName, "a"))
	{
		if(is_array($QASanityReleaseBranchesArr) && !empty($QASanityReleaseBranchesArr))
		{
			foreach($QASanityReleaseBranchesArr as $key=>$value)
			{
				if(!in_array($key, $SanityFilesArr))
				{
					fwrite($file, $key."\n");
				}
			}
		}
	}

	die("script finished execution for QASanityReleaseNew");
}
else
{
	die("Please enter a valid branch name");
}
}
}