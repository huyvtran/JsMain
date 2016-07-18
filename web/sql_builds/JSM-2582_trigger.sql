DROP TRIGGER IF EXISTS UPDATE_SWAP;

DELIMITER |

CREATE trigger UPDATE_SWAP
AFTER UPDATE ON JPROFILE
FOR EACH ROW
BEGIN
 IF(@DONT_UPDATE_TRIGGER is NULL) THEN 
 	INSERT ignore into newjs.SWAP_JPROFILE set PROFILEID=new.PROFILEID; 
 END IF;
 REPLACE INTO test.JPROFILE_FOR_DUPLICATION (PROFILEID,BTIME,GENDER,MTONGUE,RELIGION,MSTATUS,CASTE,DTOFBIRTH,COUNTRY_RES,CITY_RES,COUNTRY_BIRTH,CITY_BIRTH,EDU_LEVEL_NEW,INCOME,AGE,LAST_LOGIN_DT,HEIGHT) VALUES (new.PROFILEID,new.BTIME,new.GENDER,new.MTONGUE,new.RELIGION,new.MSTATUS,new.CASTE,new.DTOFBIRTH,new.COUNTRY_RES,new.CITY_RES,new.COUNTRY_BIRTH,new.CITY_BIRTH,new.EDU_LEVEL_NEW,new.INCOME,new.AGE,new.LAST_LOGIN_DT,new.HEIGHT);

	IF (old.INCOMPLETE !='N' AND new.INCOMPLETE = 'Y') THEN
		INSERT INTO test.incomplete_profile_logging SELECT * from newjs.JPROFILE  where PROFILEID = new.PROFILEID;
	END IF;
	END;
|

