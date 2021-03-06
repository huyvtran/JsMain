use billing;

CREATE TABLE `SERVICE_ACTIVATION_LOG` (
 `ID` int(11) NOT NULL AUTO_INCREMENT,
 `PROFILEID` int(11) NOT NULL DEFAULT '0',
 `BILLID` int(11) NOT NULL DEFAULT '0',
 `SERVICEID` char(10) NOT NULL,
 `ACTIVATED` char(1) DEFAULT '',
 `ACTIVE` char(1) DEFAULT '',
 `ACTIVATED_ON` date DEFAULT NULL, 
 `ACTIVATE_ON` date DEFAULT NULL,
 `EXPIRY_DT` date DEFAULT NULL,
 `ENTRY_BY` varchar(50) NOT NULL DEFAULT '',
 `TYPE` varchar(30) NOT NULL DEFAULT '',
 `ENTRY_DT` datetime NOT NULL DEFAULT '0000-00-00 00:00:00', 
 PRIMARY KEY (`ID`),
 KEY `BILLID` (`BILLID`),
 KEY `PROFILEID` (`PROFILEID`)
) ENGINE=MyISAM;
