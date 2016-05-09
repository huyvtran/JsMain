--on master

use viewSimilar;

CREATE TABLE `SUGGESTED_PROFILEIDS_1_MALE` (
 `PROFILEID` int(11) unsigned NOT NULL DEFAULT '0',
 KEY `PROFILEID` (`PROFILEID`)
) ENGINE=MyISAM;

CREATE TABLE `SUGGESTED_PROFILEIDS_1_FEMALE` (
 `PROFILEID` int(11) unsigned NOT NULL DEFAULT '0',
 KEY `PROFILEID` (`PROFILEID`)
) ENGINE=MyISAM;

CREATE TABLE `SUGGESTED_PROFILEIDS_2_MALE` (
 `PROFILEID` int(11) unsigned NOT NULL DEFAULT '0',
 `LAST_LOGIN_DT` date DEFAULT NULL,
KEY `PROFILEID` (`PROFILEID`)
) ENGINE=MyISAM;

CREATE TABLE `SUGGESTED_PROFILEIDS_2_FEMALE` (
 `PROFILEID` int(11) unsigned NOT NULL DEFAULT '0',
 `LAST_LOGIN_DT` date DEFAULT NULL,
KEY `PROFILEID` (`PROFILEID`)
) ENGINE=MyISAM;

CREATE TABLE `CONTACTS_CACHE_LEVEL1_MALE` (
 `SNO` int(11) DEFAULT NULL,
 `SENDER` int(11) NOT NULL,
 `RECEIVER` int(11) NOT NULL,
 `TIME` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
 KEY `SENDER` (`SENDER`)
) ENGINE=MyISAM;

CREATE TABLE `CONTACTS_CACHE_LEVEL1_FEMALE` (
 `SNO` int(11) DEFAULT NULL,
 `SENDER` int(11) NOT NULL,
 `RECEIVER` int(11) NOT NULL,
 `TIME` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
 KEY `SENDER` (`SENDER`)
) ENGINE=MyISAM;

CREATE TABLE `CONTACTS_CACHE_LEVEL2_MALE` (
 `SNO` int(11) DEFAULT NULL,
 `SENDER` int(11) NOT NULL,
 `RECEIVER` int(11) NOT NULL,
 `TIME` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
 `TYPE` char(1) NOT NULL,
 `CONSTANT_VALUE` float NOT NULL,
 KEY `SENDER` (`SENDER`)
) ENGINE=MyISAM;

CREATE TABLE `CONTACTS_CACHE_LEVEL2_FEMALE` (
 `SNO` int(11) DEFAULT NULL,
 `SENDER` int(11) NOT NULL,
 `RECEIVER` int(11) NOT NULL,
 `TIME` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
 `TYPE` char(1) NOT NULL,
 `CONSTANT_VALUE` float NOT NULL,
 KEY `SENDER` (`SENDER`)
) ENGINE=MyISAM;


CREATE TABLE `TEMP_CONTACTS_CACHE_LEVEL1_MALE` (
 `SNO` int(11) DEFAULT NULL,
 `SENDER` int(11) NOT NULL,
 `RECEIVER` int(11) NOT NULL,
 `TIME` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
 KEY `SENDER` (`SENDER`)
) ENGINE=MyISAM;

CREATE TABLE `TEMP_CONTACTS_CACHE_LEVEL1_FEMALE` (
 `SNO` int(11) DEFAULT NULL,
 `SENDER` int(11) NOT NULL,
 `RECEIVER` int(11) NOT NULL,
 `TIME` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
 KEY `SENDER` (`SENDER`)
) ENGINE=MyISAM;

CREATE TABLE `TEMP_CONTACTS_CACHE_LEVEL2_MALE` (
 `SNO` int(11) DEFAULT NULL,
 `SENDER` int(11) NOT NULL,
 `RECEIVER` int(11) NOT NULL,
 `TIME` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
 `TYPE` char(1) NOT NULL,
 `CONSTANT_VALUE` float NOT NULL,
 KEY `SENDER` (`SENDER`)
) ENGINE=MyISAM;

CREATE TABLE `TEMP_CONTACTS_CACHE_LEVEL2_FEMALE` (
 `SNO` int(11) DEFAULT NULL,
 `SENDER` int(11) NOT NULL,
 `RECEIVER` int(11) NOT NULL,
 `TIME` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
 `TYPE` char(1) NOT NULL,
 `CONSTANT_VALUE` float NOT NULL,
 KEY `SENDER` (`SENDER`)
) ENGINE=MyISAM;

use MIS;

CREATE TABLE `TRACK_SIMILAR_PROFILES_ALGO` (
 `SIMILAR_PROFILE_ALGO` varchar(20) NOT NULL,
 `COUNT` int(11) NOT NULL,
 `DATE` date NOT NULL
) ENGINE=MyISAM;

CREATE TABLE `CONTACTS_ALGO_ZERO_RESULTS` (
 `VIEWER` int(11) NOT NULL,
 `VIEWED` int(11) NOT NULL,
 `CURDATE` date NOT NULL
) ENGINE=MyISAM;

CREATE TABLE `SIMILAR_PROFILES_ZERO_RESULTS` (
 `LOGGED_IN` varchar(30) DEFAULT NULL,
 `VIEWER_PROFILEID` int(11) NOT NULL,
 `VIEWED_PROFILEID` int(11) NOT NULL,
 `DATE` date NOT NULL
) ENGINE=MyISAM;



--on all shards

use viewSimilar;

CREATE TABLE `SUGGESTED_PROFILEIDS_1_MALE` (
 `PROFILEID` int(11) unsigned NOT NULL DEFAULT '0',
 KEY `PROFILEID` (`PROFILEID`)
) ENGINE=MyISAM;

CREATE TABLE `SUGGESTED_PROFILEIDS_1_FEMALE` (
 `PROFILEID` int(11) unsigned NOT NULL DEFAULT '0',
 KEY `PROFILEID` (`PROFILEID`)
) ENGINE=MyISAM;

CREATE TABLE `SUGGESTED_PROFILEIDS_2_MALE` (
 `PROFILEID` int(11) unsigned NOT NULL DEFAULT '0',
 `LAST_LOGIN_DT` date DEFAULT NULL,
KEY `PROFILEID` (`PROFILEID`)
) ENGINE=MyISAM;

CREATE TABLE `SUGGESTED_PROFILEIDS_2_FEMALE` (
 `PROFILEID` int(11) unsigned NOT NULL DEFAULT '0',
 `LAST_LOGIN_DT` date DEFAULT NULL,
KEY `PROFILEID` (`PROFILEID`)
) ENGINE=MyISAM;

CREATE TABLE `CONTACTS_CACHE_LEVEL1_MALE` (
 `SNO` int(11) NOT NULL AUTO_INCREMENT,
 `SENDER` int(11) NOT NULL,
 `RECEIVER` int(11) NOT NULL,
 `TIME` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
 UNIQUE KEY `SENDER` (`SENDER`,`RECEIVER`),
 UNIQUE KEY `SENDER_2` (`SENDER`,`SNO`)
) ENGINE=MyISAM;

CREATE TABLE `CONTACTS_CACHE_LEVEL1_FEMALE` (
 `SNO` int(11) NOT NULL AUTO_INCREMENT,
 `SENDER` int(11) NOT NULL,
 `RECEIVER` int(11) NOT NULL,
 `TIME` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
 UNIQUE KEY `SENDER` (`SENDER`,`RECEIVER`),
 UNIQUE KEY `SENDER_2` (`SENDER`,`SNO`)
) ENGINE=MyISAM;

CREATE TABLE `CONTACTS_CACHE_LEVEL2_MALE` (
 `SNO` int(11) NOT NULL AUTO_INCREMENT,
 `SENDER` int(11) NOT NULL,
 `RECEIVER` int(11) NOT NULL,
 `TIME` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
`TYPE` char(1) NOT NULL,
 `CONSTANT_VALUE` float NOT NULL,
 UNIQUE KEY `SENDER` (`SENDER`,`RECEIVER`),
 UNIQUE KEY `SENDER_2` (`SENDER`,`SNO`)
) ENGINE=MyISAM;

CREATE TABLE `CONTACTS_CACHE_LEVEL2_FEMALE` (
 `SNO` int(11) NOT NULL AUTO_INCREMENT,
 `SENDER` int(11) NOT NULL,
 `RECEIVER` int(11) NOT NULL,
 `TIME` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
`TYPE` char(1) NOT NULL,
 `CONSTANT_VALUE` float NOT NULL,
 UNIQUE KEY `SENDER` (`SENDER`,`RECEIVER`),
 UNIQUE KEY `SENDER_2` (`SENDER`,`SNO`)
) ENGINE=MyISAM;

CREATE TABLE `TEMP_CONTACTS_CACHE_LEVEL1_MALE` (
 `SNO` int(11) NOT NULL AUTO_INCREMENT,
 `SENDER` int(11) NOT NULL,
 `RECEIVER` int(11) NOT NULL,
 `TIME` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
 UNIQUE KEY `SENDER` (`SENDER`,`RECEIVER`),
 UNIQUE KEY `SENDER_2` (`SENDER`,`SNO`)
) ENGINE=MyISAM;

CREATE TABLE `TEMP_CONTACTS_CACHE_LEVEL1_FEMALE` (
 `SNO` int(11) NOT NULL AUTO_INCREMENT,
 `SENDER` int(11) NOT NULL,
 `RECEIVER` int(11) NOT NULL,
 `TIME` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
 UNIQUE KEY `SENDER` (`SENDER`,`RECEIVER`),
 UNIQUE KEY `SENDER_2` (`SENDER`,`SNO`)
) ENGINE=MyISAM;

CREATE TABLE `TEMP_CONTACTS_CACHE_LEVEL2_MALE` (
 `SNO` int(11) NOT NULL AUTO_INCREMENT,
 `SENDER` int(11) NOT NULL,
 `RECEIVER` int(11) NOT NULL,
 `TIME` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
`TYPE` char(1) NOT NULL,
 `CONSTANT_VALUE` float NOT NULL,
 UNIQUE KEY `SENDER` (`SENDER`,`RECEIVER`),
 UNIQUE KEY `SENDER_2` (`SENDER`,`SNO`)
) ENGINE=MyISAM;

CREATE TABLE `TEMP_CONTACTS_CACHE_LEVEL2_FEMALE` (
 `SNO` int(11) NOT NULL AUTO_INCREMENT,
 `SENDER` int(11) NOT NULL,
 `RECEIVER` int(11) NOT NULL,
 `TIME` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
`TYPE` char(1) NOT NULL,
 `CONSTANT_VALUE` float NOT NULL,
 UNIQUE KEY `SENDER` (`SENDER`,`RECEIVER`),
 UNIQUE KEY `SENDER_2` (`SENDER`,`SNO`)
) ENGINE=MyISAM;