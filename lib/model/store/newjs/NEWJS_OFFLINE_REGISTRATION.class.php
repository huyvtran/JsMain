<?php
/*This class is used to insert in OFFLINE_REGISTRATION table
 * @author Nitesh Sethi
 * @created 2013-06-30
*/
class NEWJS_OFFLINE_REGISTRATION extends TABLE{
        public function __construct($dbname="")
        {
                        parent::__construct($dbname);
        }
	 /** Function insert added by Nitesh
        This function is used to insert record in the OFFLINE_REGISTRATION table.
        * @param  $profileId Int
        * 
        **/
	public function insert($id,$operator,$source){
               
                if(!$id || !$operator)
                        throw new jsException("","PROFILEID or operator IS BLANK IN insert() OF NEWJS_CONTACT_ARCHIVE.class.php");

                try
                {
					$now = date("Y-m-d G:i:s");
					$sql = "INSERT INTO newjs.OFFLINE_REGISTRATION (`PROFILEID`,`EXECUTIVE`,`SOURCE`,`DATE`) values(:id,:operator,:source,:now)";
					$res = $this->db->prepare($sql);
				  	$res->bindValue(":id", $id, PDO::PARAM_INT);	
				  	$res->bindValue(":operator", $operator, PDO::PARAM_STR);	
				  	$res->bindValue(":now", $now, PDO::PARAM_STR);		  	
					$res->bindValue(":source", $source, PDO::PARAM_STR);	
					$res->execute();
                }
                catch(PDOException $e)
                {
                        /*** echo the sql statement and error message ***/
                        throw new jsException($e);
                }
	}
}
?>
