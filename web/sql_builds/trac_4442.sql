use newjs;
CREATE TABLE `TEMP_SMS_TIMELIMITS` (
 `SMS_KEY` varchar(20) NOT NULL,
 `TIME1` datetime DEFAULT NULL,
 `TIME2` datetime DEFAULT NULL,
 PRIMARY KEY (`SMS_KEY`)
);