<?php
class NEWJS_SEARCHMALE_SEO extends TABLE
{
       

        /**
         * @fn __construct
         * @brief Constructor function
         * @param $dbName - Database to which the connection would be made
         */

        public function __construct($dbname="")
        {
			parent::__construct($dbname);
        }
        public function getTopProfiles($fieldQuery,$limit)
        {
			//echo $tableName." ".$fieldQuery. " ".$limit;die;
			try 
			{
				
				$sql="SELECT SQL_CACHE S.PROFILEID FROM newjs.SEARCH_MALE AS S WHERE S.HAVEPHOTO='Y' AND S.PHOTO_DISPLAY='A' AND S.PRIVACY IN('','A') AND $fieldQuery ORDER BY S.NTIMES DESC LIMIT :limit";
				$prep=$this->db->prepare($sql);
				//$prep->bindValue(":tableName",$tableName,PDO::PARAM_STR);
				////$prep->bindValue("$fieldQuery",$fieldQuery,PDO::PARAM_STR);
				$prep->bindValue(":limit",$limit,PDO::PARAM_INT);
				$prep->execute();
				
				while ($result = $prep->fetch(PDO::FETCH_NUM)) 
				{
					$records[] = $result[0];
				}
				
				return $records;
			}
			catch(PDOException $e)
			{
				/*** echo the sql statement and error message ***/
				throw new jsException($e);
			}
		}
	
		public function getCityProfileSpec($fieldQuery,$limit, $notInProfileStr)
        {
			try 
			{
							
				$sql="SELECT SQL_CACHE S.PROFILEID FROM newjs.SEARCH_MALE AS S WHERE $fieldQuery AND S.PRIVACY IN('','A') AND HAVEPHOTO='Y' AND S.PHOTO_DISPLAY='A' AND PROFILEID NOT IN ('$notInProfileStr') LIMIT :limit";
				$prep=$this->db->prepare($sql);
				//$prep->bindValue(":tableName",$tableName,PDO::PARAM_STR);
				////$prep->bindValue("$fieldQuery",$fieldQuery,PDO::PARAM_STR);
				//$prep->bindValue("$notInProfileStr",$notInProfileStr,PDO::PARAM_STR);
				$prep->bindValue(":limit",$limit,PDO::PARAM_INT);
				$prep->execute();
				
				while ($result = $prep->fetch(PDO::FETCH_NUM)) 
				{
					$records[] = $result[0];
				}
				return $records;
			}
			catch(PDOException $e)
			{
				/*** echo the sql statement and error message ***/
				throw new jsException($e);
			}
		}
		
		public function getTopCityProfile($fieldQuery,$limit, $notInProfileStr)
        {
			try 
			{
				$sql="SELECT SQL_CACHE S.PROFILEID FROM newjs.SEARCH_MALE AS S WHERE $fieldQuery AND S.PRIVACY IN('','A') AND HAVEPHOTO='Y' AND S.PHOTO_DISPLAY='A' AND PROFILEID NOT IN ('$notInProfileStr') GROUP BY CITY_RES ORDER BY COUNT(*) DESC LIMIT :limit";
				$prep=$this->db->prepare($sql);
				//$prep->bindValue(":tableName",$tableName,PDO::PARAM_STR);
				//$prep->bindValue("$fieldQuery",$fieldQuery,PDO::PARAM_STR);
				//$prep->bindValue("$notInProfileStr",$notInProfileStr,PDO::PARAM_STR);
				$prep->bindValue(":limit",$limit,PDO::PARAM_INT);
				$prep->execute();
				
				while ($result = $prep->fetch(PDO::FETCH_NUM)) 
				{
					$records[] = $result[0];
				}
				return $records;
			}
			catch(PDOException $e)
			{
				/*** echo the sql statement and error message ***/
				throw new jsException($e);
			}
		}
		
		public function getOccProfileSpec($fieldQuery,$limit, $notInProfileStr)
        {
			try 
			{
				$count= count($pro);
				$matchesArr = implode(',', array_fill(0, count($pro), '?'));
				$sql="SELECT SQL_CACHE S.PROFILEID FROM newjs.SEARCH_MALE AS S WHERE $fieldQuery AND S.PRIVACY IN('','A') AND HAVEPHOTO='Y' AND S.PHOTO_DISPLAY='A' AND PROFILEID NOT IN ('$notInProfileStr') LIMIT :limit";
				$prep=$this->db->prepare($sql);
				//$prep->bindValue(":tableName",$tableName,PDO::PARAM_STR);
				//$prep->bindValue("$fieldQuery",$fieldQuery,PDO::PARAM_STR);
				//$prep->bindValue("$notInProfileStr",$notInProfileStr,PDO::PARAM_STR);
				$prep->bindValue(":limit",$limit,PDO::PARAM_INT);
				$prep->execute();
			
				while ($result = $prep->fetch(PDO::FETCH_NUM)) 
				{
					$records[] = $result[0];
				}
				return $records;
			}
			catch(PDOException $e)
			{
				/*** echo the sql statement and error message ***/
				throw new jsException($e);
			}
		}
		
		public function getTopOccProfile($fieldQuery,$limit, $notInProfileStr)
        {
			try 
			{
				$sql="SELECT SQL_CACHE S.PROFILEID FROM newjs.SEARCH_MALE AS S WHERE $fieldQuery AND S.PRIVACY IN('','A') AND HAVEPHOTO='Y' AND S.PHOTO_DISPLAY='A' AND PROFILEID NOT IN ('$notInProfileStr') GROUP BY OCCUPATION ORDER BY COUNT(*) DESC LIMIT :limit";
				$prep=$this->db->prepare($sql);
				//$prep->bindValue(":tableName",$tableName,PDO::PARAM_STR);
				//$prep->bindValue("$fieldQuery",$fieldQuery,PDO::PARAM_STR);
				//$prep->bindValue("$notInProfileStr",$notInProfileStr,PDO::PARAM_STR);
				$prep->bindValue(":limit",$limit,PDO::PARAM_INT);
				$prep->execute();
				
				while ($result = $prep->fetch(PDO::FETCH_NUM)) 
				{
					$records[] = $result[0];
				}
				return $records;
			}
			catch(PDOException $e)
			{
				/*** echo the sql statement and error message ***/
				throw new jsException($e);
			}
		}
		
		public function getNoCountProfiles($fieldQuery,$limit, $notInProfileStr)
        {
			try 
			{
				$sql="SELECT SQL_CACHE S.PROFILEID FROM newjs.SEARCH_MALE AS S WHERE S.PROFILEID NOT IN ('$notInProfileStr') AND S.PRIVACY IN('','A') AND $fieldQuery ORDER BY S.NTIMES DESC LIMIT :limit";
				$prep=$this->db->prepare($sql);
				//$prep->bindValue(":tableName",$tableName,PDO::PARAM_STR);
				//$prep->bindValue("$fieldQuery",$fieldQuery,PDO::PARAM_STR);
				//$prep->bindValue("$notInProfileStr",$notInProfileStr,PDO::PARAM_STR);
				$prep->bindValue(":limit",$limit,PDO::PARAM_INT);
				$prep->execute();
				
				while ($result = $prep->fetch(PDO::FETCH_NUM)) 
				{
					$records[] = $result[0];
				}
			
				return $records;
			}
			catch(PDOException $e)
			{
				/*** echo the sql statement and error message ***/
				throw new jsException($e);
			}
		}
		
		public function getNoCityProfiles($fieldQuery,$limit, $notInProfileStr)
        {
			try 
			{
				$sql="SELECT SQL_CACHE S.PROFILEID FROM newjs.SEARCH_MALE AS S WHERE $fieldQuery AND S.PRIVACY IN('','A') AND PROFILEID NOT IN ('$notInProfileStr') GROUP BY CITY_RES ORDER BY COUNT(*) DESC LIMIT :limit";
				$prep=$this->db->prepare($sql);
				//$prep->bindValue(":table",$tableName,PDO::PARAM_STR);
				//$prep->bindValue("$fieldQuery",$fieldQuery,PDO::PARAM_STR);
				//$prep->bindValue("$notInProfileStr",$notInProfileStr,PDO::PARAM_STR);
				$prep->bindValue(":limit",$limit,PDO::PARAM_INT);
				$prep->execute();
				
				while ($result = $prep->fetch(PDO::FETCH_NUM)) 
				{
					$records[] = $result[0];
				}
				return $records;
			}
			catch(PDOException $e)
			{
				/*** echo the sql statement and error message ***/
				throw new jsException($e);
			}
		}
		
		public function getNoOccProfiles($fieldQuery,$limit, $notInProfileStr)
        {
			try 
			{

				$sql="SELECT SQL_CACHE S.PROFILEID FROM newjs.SEARCH_MALE AS S WHERE $fieldQuery AND S.PRIVACY IN('','A') AND PROFILEID NOT IN ('$notInProfileStr') GROUP BY OCCUPATION ORDER BY COUNT(*) DESC LIMIT :limit";
				$prep=$this->db->prepare($sql);
				
				//$prep->bindValue(":table",$tableName,PDO::PARAM_STR);
				//$prep->bindValue("$fieldQuery",$fieldQuery,PDO::PARAM_STR);
				//$prep->bindValue("$notInProfileStr",$notInProfileStr,PDO::PARAM_STR);
				$prep->bindValue(":limit",$limit,PDO::PARAM_INT);
				$prep->execute();
				
				
				while ($result = $prep->fetch(PDO::FETCH_NUM)) 
				{
					$records[] = $result[0];
				}
				return $records;
			}
			catch(PDOException $e)
			{
				/*** echo the sql statement and error message ***/
				throw new jsException($e);
			}
		}	
}	
		

?>