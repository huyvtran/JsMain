use sms;
CREATE TABLE `COMMON_OTP` (
 `ID` int(11) NOT NULL AUTO_INCREMENT,
 `PROFILEID` int(11) NOT NULL DEFAULT '0',
 `PHONE_WITH_ISD` varchar(20) NOT NULL,
 `OTP` varchar(4) DEFAULT NULL,
 `DATE` datetime DEFAULT NULL,
 `SMS_COUNT` int(2) DEFAULT '0',
 `TRIAL_COUNT` int(2) DEFAULT '0',
`TYPE` varchar(20) DEFAULT NULL,
 KEY `PROFILEID` (`PROFILEID`),
 KEY `ID` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

use newjs;
INSERT INTO `SMS_TYPE` ( `ID` , `SMS_KEY` , `SMS_TYPE` , `PRIORITY` , `SUBSCRIPTION` , `GENDER` , `COUNT` , `TIME_CRITERIA` , `CUSTOM_CRITERIA` , `SMS_SUBSCRIPTION` , `STATUS` , `MESSAGE` )
VALUES (
'', 'DEL_OTP', 'I', '2', 'A', 'A', 'SINGLE', '0', '0', 'SERVICE', 'Y', 'Use {OTP} as the code to delete your profile on Jeevansathi');