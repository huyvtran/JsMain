<?php

/**
 * Description of PROFILE_DELETE_LOGS
 * Store Class for CRUD Operation on PROFILE.DELETE_LOGS
 * 
 * @author Kunal Verma
 * @created 03rd March 2017
 */
class PROFILE_DELETE_LOGS extends TABLE
{

  /**
   * @fn __construct
   * @brief Constructor function
   * @param $dbName - Database to which the connection would be made
   */
  public function __construct($dbname = "")
  {
    parent::__construct($dbname);
  }

  /**
   * 
   * @param type $arrRecordData
   * @return type
   * @throws jsException
   */
  public function insertRecord($arrRecordData)
  {
    if (!is_array($arrRecordData))
      throw new jsException("", "Array is not passed in InsertRecord OF PROFILE_DELETE_LOGS.class.php");

    try {
      $szINs = implode(',', array_fill(0, count($arrRecordData), '?'));

      $arrFields = array();
      foreach ($arrRecordData as $key => $val) {
        $arrFields[] = strtoupper($key);
      }
      $szFields = implode(",", $arrFields);

      $sql = "INSERT IGNORE INTO PROFILE.DELETE_LOGS ($szFields) VALUES ($szINs)";
      $pdoStatement = $this->db->prepare($sql);

      //Bind Value
      $count = 0;
      foreach ($arrRecordData as $k => $value) {
        ++$count;
        $pdoStatement->bindValue(($count), $value);
      }
      $pdoStatement->execute();

      return $pdoStatement->rowCount();
    } catch (Exception $e) {
      throw new jsException($e);
    }
  }

  /**
   * 
   * @param type $iProfileID
   * @param type $arrRecordData
   * @return boolean
   * @throws jsException
   */
  public function updateRecord($iProfileID, $startTime, $arrRecordData)
  {
    if (!is_numeric(intval($iProfileID)) || !$iProfileID) {
      throw new jsException("", "iProfileID is not numeric in UpdateRecord OF PROFILE_DELETE_LOGS.class.php");
    }

    if (!is_array($arrRecordData))
      throw new jsException("", "Array is not passed in UpdateRecord OF PROFILE_DELETE_LOGS.class.php");

    if (isset($arrRecordData['PROFILEID']) && strlen($arrRecordData['PROFILEID']) > 0)
      throw new jsException("", "Trying to update PROFILEID in  in UpdateRecord OF PROFILE_DELETE_LOGS.class.php");

    try {
      $arrFields = array();
      foreach ($arrRecordData as $key => $val) {
        $columnName = strtoupper($key);

        $arrFields[] = "$columnName = ?";
      }
      $szFields = implode(",", $arrFields);

      $sql = "UPDATE PROFILE.DELETE_LOGS SET $szFields WHERE PROFILEID = ? AND START_TIME = ?";
      $pdoStatement = $this->db->prepare($sql);

      //Bind Value
      $count = 0;
      foreach ($arrRecordData as $k => $value) {
        ++$count;
        $pdoStatement->bindValue(($count), $value);
      }
      ++$count;
      $pdoStatement->bindValue($count, $iProfileID);

      ++$count;
      $pdoStatement->bindValue($count, $startTime);

      $pdoStatement->execute();
      return true;
    } catch (Exception $e) {
      throw new jsException($e);
    }
  }

  /**
   * 
   * @param type $iProfileID
   * @return type
   * @throws jsException
   */
  public function findRecord($iProfileID)
  {
    if (!is_numeric(intval($iProfileID)) || !$iProfileID) {
      throw new jsException("", "iProfileID is not numeric in findRecord OF PROFILE_DELETE_LOGS.class.php");
    }

    try {
      $sql = "SELECT * FROM PROFILE.DELETE_LOGS WHERE PROFILEID=:PID AND COMPLETE_STATUS='N' ORDER BY ID DESC LIMIT 1";
      $pdoStatement = $this->db->prepare($sql);

      $pdoStatement->bindValue(":PID", $iProfileID, PDO::PARAM_INT);
      $pdoStatement->execute();

      $arrResult = false;
      if ($pdoStatement->rowCount()) {
        $arrResult = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
      }

      return $arrResult;
    } catch (Exception $ex) {
      throw new jsException($ex);
    }
  }

}