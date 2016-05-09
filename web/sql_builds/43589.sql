/* Triggers  which need to update; Table : newjs */

use newjs;

DROP TRIGGER `UPDATE_SWAP`;

delimiter |
CREATE TRIGGER UPDATE_SWAP AFTER UPDATE ON JPROFILE FOR EACH ROW BEGIN IF(@DONT_UPDATE_TRIGGER is NULL) THEN INSERT ignore into newjs.SWAP_JPROFILE set PROFILEID=new.PROFILEID; END IF; END;|

