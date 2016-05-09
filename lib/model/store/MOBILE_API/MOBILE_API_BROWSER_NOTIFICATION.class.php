<?php

class MOBILE_API_BROWSER_NOTIFICATION extends TABLE {
    
    public function __construct($dbName = "") {
        parent::__construct($dbName);
        $this->ID_BIND_TYPE = "INT";
        $this->MSG_ID_BIND_TYPE = "INT";
		$this->REG_ID_BIND_TYPE = "STR";
		$this->RESPONSE_BIND_TYPE = "STR";
		$this->STATUS_BIND_TYPE = "STR";
        $this->SENT_TO_GCM_BIND_TYPE = "STR";
        $this->SENT_TO_CHANNEL_BIND_TYPE = "STR";
        $this->SENT_TO_QUEUE_BIND_TYPE = "STR";
        $this->NOTIFICATION_KEY_BIND_TYPE = "STR";
        $this->NOTIFICATION_TYPE_BIND_TYPE = "STR";
        $this->MESSAGE_BIND_TYPE = "STR";
        $this->TITLE_BIND_TYPE = "STR";
        $this->ICON_BIND_TYPE = "STR";
        $this->TAG_BIND_TYPE = "STR";
        $this->ENTRY_DT_BIND_TYPE = "STR";
        $this->REQUEST_DT_BIND_TYPE = "STR";
        $this->LANDING_ID_BIND_TYPE = "INT";
        $this->TTL_BIND_TYPE = "INT";
    }
    
	public function insertNotification($paramsArr){
        try{
            if($paramsArr){
                $sql = "INSERT INTO MOBILE_API.BROWSER_NOTIFICATION(REG_ID, NOTIFICATION_KEY, NOTIFICATION_TYPE, MESSAGE, TITLE, ICON, TAG, LANDING_ID, ENTRY_DT ,MSG_ID,SENT_TO_QUEUE,TTL) VALUES (:REG_ID, :NOTIFICATION_KEY, :NOTIFICATION_TYPE, :MESSAGE, :TITLE, :ICON, :TAG, :LANDING_ID, :ENTRY_DT, :MSG_ID, :SENT_TO_QUEUE,:TTL)";
                $prep = $this->db->prepare($sql);
                $prep->bindValue(":REG_ID",$paramsArr["REG_ID"],PDO::PARAM_STR);
                $prep->bindValue(":NOTIFICATION_KEY",$paramsArr["NOTIFICATION_KEY"],PDO::PARAM_STR);
                $prep->bindValue(":NOTIFICATION_TYPE",$paramsArr["NOTIFICATION_TYPE"],PDO::PARAM_STR);
                $prep->bindValue(":MESSAGE",$paramsArr["MESSAGE"],PDO::PARAM_STR);
                $prep->bindValue(":SENT_TO_QUEUE",$paramsArr["SENT_TO_QUEUE"],PDO::PARAM_STR);
                $prep->bindValue(":MSG_ID",$paramsArr["MSG_ID"],PDO::PARAM_INT);
                $prep->bindValue(":TITLE",$paramsArr["TITLE"],PDO::PARAM_STR);
                $prep->bindValue(":ICON",$paramsArr["ICON"],PDO::PARAM_STR);
                $prep->bindValue(":TAG",$paramsArr["TAG"],PDO::PARAM_STR);
                $prep->bindValue(":LANDING_ID",$paramsArr["LANDING_ID"],PDO::PARAM_STR);
                $prep->bindValue(":ENTRY_DT",date("Y-m-d H:i:s"),PDO::PARAM_STR);
                $prep->bindValue(":TTL",$paramsArr["TTL"],PDO::PARAM_INT);
                $prep->execute();
			}
        } catch (Exception $ex) {
            throw new jsException($ex);
		}
	}

    /**
     * update details in MOBILE_API_BROWSER_NOTIFICATION---
     * @param : $criteria,$value,$updateStr
     * @return : none
     */
    public function updateEntryDetails($criteria="REG_ID",$value="",$updateArr,$extraWhereClause="",$inWhereStr="")
    {
    	if(!$value && !$inWhereStr)
            throw new jsException("value or inWhereStr IS BLANK in updateEntryDetails func of MOBILE_API_BROWSER_NOTIFICATION class");
    	if(!$updateArr)
            throw new jsException("updateArr IS BLANK in updateEntryDetails func of MOBILE_API_BROWSER_NOTIFICATION class");
        $updateStr="";
        foreach ($updateArr as $key1 => $val1) {
            $updateStr = $updateStr."$key1=:$key1,";
            $extraBind[$key1]=$val1;
        }
        $updateStr = substr($updateStr,0,-1);
        try {    
            $sql = "UPDATE MOBILE_API.BROWSER_NOTIFICATION set $updateStr WHERE ";
            if($inWhereStr)
                $sql = $sql."$criteria IN :$criteria";
            else
                $sql = $sql."$criteria = :$criteria";
            if(is_array($extraWhereClause))
            {
	            foreach($extraWhereClause as $key=>$val)
	            {
	                $sql.=" AND $key=:$key";
	                $extraBind[$key]=$val;
	            }
            }
       
            $res = $this->db->prepare($sql);
            if($inWhereStr)
                $res->bindValue(":$criteria", $value, PDO::PARAM_STR);
            else
                $res->bindValue(":$criteria", $value, constant('PDO::PARAM_'.$this->{$criteria.'_BIND_TYPE'}));
            if(is_array($extraBind))
            {
            	foreach($extraBind as $key=>$val)
            		$res->bindValue(":$key", $val,constant('PDO::PARAM_'.$this->{$key.'_BIND_TYPE'}));
            }
            $res->execute();
        }
        catch(PDOException $e){
                throw new jsException($e);
        }
        return NULL;
    }
    
    public function getNotification($regId){
        try{
            $sql = "SELECT ID, REG_ID, TITLE, MESSAGE, ICON, TAG, LANDING_ID from MOBILE_API.BROWSER_NOTIFICATION WHERE REG_ID = :REG_ID AND SENT_TO_CHANNEL != 'Y' LIMIT 1";
            $prep = $this->db->prepare($sql);
            $prep->bindValue(":REG_ID",$regId,PDO::PARAM_STR);
            $prep->execute();
            while($row = $prep->fetch(PDO::FETCH_ASSOC)){
                $result = $row;
            }
            return $result;
        } catch (Exception $ex) {
            throw new jsException($ex);
        }
    }


    /*function to get notification rows with matched conditions
    * @params :$value,$criteria,$fields,$orderby,$limit,$extraWhereClauseArr,$offset
    * @return : $result
    */
    public function getArray($value="",$criteria="ID",$fields="*",$orderby="",$limit="",$extraWhereClauseArr="",$offset="")
    {
        if(!value){
            throw new jsException("","$criteria IS BLANK");
        }
        try{
            $sql = "SELECT $fields FROM MOBILE_API.BROWSER_NOTIFICATION WHERE $criteria = :$criteria";
            
            if($extraWhereClauseArr && is_array($extraWhereClauseArr))
            {
                foreach ($extraWhereClauseArr as $key => $v) 
                {
                    $sql= $sql." AND $key = :$key ";
                    $extraBind[$key]=$v;
                }
            }
            if($orderby){
                $sql.= " ORDER BY $orderby ";
            }
            if($limit){
                $sql.= " LIMIT $limit";
            }
            if($limit && $offset)
            {
                $sql=$sql." OFFSET $offset";
            }
            
            $prep = $this->db->prepare($sql);
            $prep->bindValue(":$criteria", $value, PDO::PARAM_STR);
            if(is_array($extraBind))
            {
                foreach($extraBind as $key=>$val)
                {
                    $prep->bindValue(":$key", $val);
                }
            }
            $prep->execute();
            while($row = $prep->fetch(PDO::FETCH_ASSOC))
            {
                $result[] = $row;
            }
            return $result;
        } catch (Exception $ex) {
            throw new jsException($ex);
        }
    }

    /*function to delete notification rows with matched ID's
    * @params :$idArr
    * @return : none
    */
    public function deleteNotifications($idArr)
    {
        try
        {
            if(is_array($idArr) && $idArr)
            {
                $idStr = "'".implode("','", $idArr)."'";
                $sql = "DELETE FROM MOBILE_API.BROWSER_NOTIFICATION WHERE ID IN(".$idStr.")";
                $res=$this->db->prepare($sql);
                $res->execute();
            }
        }
        catch(PDOException $e)
        {
            throw new jsException($e);
        }
    }

    /*function to get total rows count in table
    * @params :none
    * @return : $count
    */
    public function getAllRowsCount()
    {
        try
        {
            $sql = "SELECT COUNT(1) AS CNT FROM MOBILE_API.BROWSER_NOTIFICATION";
            $res=$this->db->prepare($sql);
            $res->execute();
            if($row = $res->fetch(PDO::FETCH_ASSOC))
            {
                $count = $row['CNT'];
            }
            return $count;
        }
        catch(PDOException $e)
        {
            throw new jsException($e);
        }
    }

    /*function to fetch backup eligible notification entries(cknowledged by channel or are pending for acknowledgement)
    * @params :$fields,$limit,$offset
    * @return : $output
    */
    public function getBackupEligibleNotifications($fields="*",$limit="",$offset="")
    {
        try
        {
            $entryDt = date("Y-m-d H:i:s",strtotime($entryDtOffest));
            $sql = "SELECT ".$fields." FROM MOBILE_API.BROWSER_NOTIFICATION WHERE (SENT_TO_CHANNEL='Y' OR (SENT_TO_CHANNEL='N' AND SENT_TO_GCM='Y'))";
            if($limit && $offset=="")
                $sql = $sql." LIMIT $limit";
            else if($limit && $offset!="")
                $sql = $sql." LIMIT $offset,$limit";

            $res=$this->db->prepare($sql);
            $res->bindValue(":ENTRY_DT",$entryDt,PDO::PARAM_STR);
            $res->execute();
            $index = 0;
            while($row = $res->fetch(PDO::FETCH_ASSOC))
            {
                $output[$index++] = $row;
            }
            return $output;
        }
        catch(PDOException $e)
        {
            throw new jsException($e);
        }
    }
}