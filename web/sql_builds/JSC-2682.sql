use NOTIFICATION_NEW; 

CREATE TABLE `JUST_JOIN_TEMP` (
 `PROFILEID` int(11) DEFAULT NULL,
 `SCRIPT_NO` tinyint(2)  DEFAULT 0,
 `ENTRY_DT` date NOT NULL,
 KEY `PROFILEID` (`PROFILEID`),
 KEY `SCRIPT_NO`(`SCRIPT_NO`)
) ENGINE=MyISAM;