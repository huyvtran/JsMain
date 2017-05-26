-- Database: `billing`
-- Table structure for table `VARIABLE_DISCOUNT_BACKUP_1DAY`
DROP TABLE IF EXISTS `VARIABLE_DISCOUNT_BACKUP_1DAY`;
CREATE TABLE `VARIABLE_DISCOUNT_BACKUP_1DAY` (
  `PROFILEID` int(11) NOT NULL,
  `DISCOUNT` tinyint(4) NOT NULL,
  `SDATE` date NOT NULL,
  `EDATE` date NOT NULL,
  `ENTRY_DT` date NOT NULL,
  `SENT` enum('Y','N') NOT NULL default 'N',
  KEY `PROFILEID` (`PROFILEID`),
  KEY `EDATE` (`EDATE`),
 ) ENGINE=MyISAM;

-- Database: `MIS`
-- Table structure for table `ATS_DISCOUNT`
DROP TABLE IF EXISTS `ATS_DISCOUNT`;
CREATE TABLE `ATS_DISCOUNT` (
  `PROFILEID` int(11) NOT NULL,
  `DISCOUNT` tinyint(4) NOT NULL,
  `ENTRY_DT` date NOT NULL,
  KEY `PROFILEID` (`PROFILEID`),
  KEY `ENTRY_DT` (`ENTRY_DT`)
 ) ENGINE=MyISAM;


-- Database: `MIS`
-- Query to execute in MIS database:
ALTER TABLE MIS.ATS ADD `PROFILEID` mediumint(11) NOT NULL default '0' AFTER `USERNAME`,ADD `VISITED_SITE` text NOT NULL AFTER `VISITED_URL`, ADD INDEX (`PROFILEID`); 
RENAME TABLE MIS.ATS TO MIS.ATS_LOGGER_1

-- Database: `billing`
ALTER TABLE `VARIABLE_DISCOUNT` DROP INDEX PROFILEID,ADD UNIQUE (PROFILEID);

-- Database: `MIS`
-- Table structure for table `ATS_LOGGER_2`
CREATE TABLE `ATS_LOGGER_2` (
  `ID` int(20) unsigned NOT NULL auto_increment,
  `IP` varchar(16) NOT NULL,
  `ENTRY_DATE` datetime NOT NULL,
  `USERNAME` varchar(40) NOT NULL,
  `PROFILEID` mediumint(11) NOT NULL default '0',
  `VISITED_URL` text,
  `VISITED_SITE` text NOT NULL,
  KEY `ENTRY_DATE` (`ENTRY_DATE`),
  KEY `USERNAME` (`USERNAME`),
  KEY `ID` (`ID`),
  KEY `PROFILEID` (`PROFILEID`)
) ENGINE=MyISAM;


-- Database: `MIS`
-- Table structure for table `ATS`
CREATE TABLE `ATS` (
  `ID` int(20) unsigned NOT NULL auto_increment,
  `IP` varchar(16) NOT NULL,
  `ENTRY_DATE` datetime NOT NULL,
  `USERNAME` varchar(40) NOT NULL,
  `PROFILEID` mediumint(11) NOT NULL default '0',
  `VISITED_URL` text,
  `VISITED_SITE` text NOT NULL,
  KEY `ENTRY_DATE` (`ENTRY_DATE`),
  KEY `USERNAME` (`USERNAME`),
  KEY `ID` (`ID`),
  KEY `PROFILEID` (`PROFILEID`)
) ENGINE=MERGE UNION=(ATS_LOGGER_1,ATS_LOGGER_2) INSERT_METHOD=LAST;


-- Query to execute in MIS database:
ALTER TABLE MIS.ATS_URL ADD GRP varchar(10) NOT NULL;
UPDATE MIS.ATS_URL SET GRP='SHP' WHERE ID IN('1','2','701');
UPDATE MIS.ATS_URL SET GRP='BMP' WHERE ID IN
('457','458','459','460','461','462','463','464','465','466','467','468','469','509','510','511','512','513','514','515','516','517','518','519','520','521');
UPDATE MIS.ATS_URL SET GRP='SMP' WHERE ID IN('456');
UPDATE MIS.ATS_URL SET GRP='SH' WHERE ID IN('3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','29','30','31','32','33','34','35','36','37','38','39','40','41','42','43','44','45');
UPDATE MIS.ATS_URL SET GRP='BM' WHERE ID IN
('28','53','470','483','496','522','536','551','569','585','599','613','627','641','658','673','686');
UPDATE MIS.ATS_URL SET GRP='SM' WHERE ID IN('535','549','550','564','565','566','567','584','598','612','626','640','654','655','656','657','671','672');







