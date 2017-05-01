use PICTURE;

CREATE TABLE `ADD_PHOTO_MAILER` (
 `SNO` mediumint(11) unsigned NOT NULL,
 `PROFILEID` int(11) NOT NULL DEFAULT '0',
 `TYPE` smallint(1) unsigned NOT NULL DEFAULT '0',
 `SENT` varchar(1) NOT NULL DEFAULT 'N',
 PRIMARY KEY (`SNO`),
 UNIQUE KEY `PROFILEID` (`PROFILEID`)
) ENGINE=InnoDB;


CREATE TABLE `UPLOAD_PHOTO_FROM_MAILER_TRACKING` (
 `SNO` mediumint(11) unsigned NOT NULL AUTO_INCREMENT,
 `PROFILEID` int(11) unsigned NOT NULL,
 `DATE` date NOT NULL,
 `TYPE` smallint(1) unsigned NOT NULL,
 PRIMARY KEY (`SNO`)
) ENGINE=InnoDB;


