use billing;

CREATE TABLE billing.`COMMUNITY_WELCOME_DISCOUNT_LOG` (  `PROFILEID` int(11) DEFAULT NULL,  `DISCOUNT` tinyint(4) DEFAULT NULL,  `SDATE` date DEFAULT NULL,  `EDATE` date DEFAULT NULL,  `COMMUNITY` int(3) DEFAULT NULL,  `ENTRY_DT` date DEFAULT NULL,  UNIQUE KEY `PROFILEID_DATE` (`PROFILEID`,`ENTRY_DT`),  KEY `PROFILEID` (`PROFILEID`),  KEY `ENTRY_DT` (`ENTRY_DT`)) ENGINE=InnoDB;

CREATE TABLE billing.`COMMUNITY_WELCOME_DISCOUNT` ( `ID` int(11) NOT NULL AUTO_INCREMENT, `COMMUNITY` int(3) DEFAULT NULL, `CATEGORY_ID` int(3) NOT NULL, `DISCOUNT` tinyint(4) DEFAULT NULL, `ENTRY_BY` varchar(50) DEFAULT NULL, `ENTRY_DT` datetime DEFAULT NULL, `ACTIVE` enum('Y','N') NOT NULL DEFAULT 'Y', PRIMARY KEY (`ID`), KEY `COMMUNITY` (`COMMUNITY`), KEY `ENTRY_DT` (`ENTRY_DT`)) ENGINE=InnoDB;

INSERT INTO billing.`COMMUNITY_WELCOME_DISCOUNT` VALUES (1, 10, 1, 50, 'default', '2017-07-18 14:51:42', 'Y');
INSERT INTO billing.`COMMUNITY_WELCOME_DISCOUNT` VALUES (2, 33, 2, 55, 'default', '2017-07-18 14:51:42', 'Y');
INSERT INTO billing.`COMMUNITY_WELCOME_DISCOUNT` VALUES (3, 19, 2, 55, 'default', '2017-07-18 14:51:42', 'Y');
INSERT INTO billing.`COMMUNITY_WELCOME_DISCOUNT` VALUES (4, 7, 2, 55, 'default', '2017-07-18 14:51:42', 'Y');
INSERT INTO billing.`COMMUNITY_WELCOME_DISCOUNT` VALUES (5, 28, 2, 55, 'default', '2017-07-18 14:51:43', 'Y');
INSERT INTO billing.`COMMUNITY_WELCOME_DISCOUNT` VALUES (6, 20, 2, 55, 'default', '2017-07-18 14:51:43', 'Y');
INSERT INTO billing.`COMMUNITY_WELCOME_DISCOUNT` VALUES (7, 34, 2, 55, 'default', '2017-07-18 14:51:43', 'Y');
INSERT INTO billing.`COMMUNITY_WELCOME_DISCOUNT` VALUES (8, 27, 2, 55, 'default', '2017-07-18 14:51:43', 'Y');
INSERT INTO billing.`COMMUNITY_WELCOME_DISCOUNT` VALUES (9, 30, 2, 55, 'default', '2017-07-18 14:51:43', 'Y');
INSERT INTO billing.`COMMUNITY_WELCOME_DISCOUNT` VALUES (10, 0, 3, 60, 'default', '2017-07-18 14:51:43', 'Y');