use NOTIFICATION_NEW; 

CREATE TABLE `JUST_JOIN_TEMP` (
 `PROFILEID` int(11) DEFAULT NULL,
 `ENTRY_DT` date NOT NULL,
 KEY `PROFILEID` (`PROFILEID`)
) ENGINE=MyISAM;