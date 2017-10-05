use PICTURE;
CREATE TABLE `PICTURE_API_RESPONSE` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `PICTUREID` bigint(13) NOT NULL,
  `PROFILEID` bigint(13) NOT NULL,
  `SCREENED_ID` bigint(13) DEFAULT NULL,
  `SCREEN_STATUS` varchar(45) DEFAULT NULL,
  `AGE` int(11) DEFAULT NULL,
  `GENDER` enum('M','F') DEFAULT NULL,
  `ADULT` enum('VERY_LIKELY','LIKELY','POSSIBLE','VERY_UNLIKELY','UNLIKELY','UNKNOWN') DEFAULT 'UNKNOWN',
  `SPOOF` enum('VERY_LIKELY','LIKELY','POSSIBLE','VERY_UNLIKELY','UNLIKELY','UNKNOWN') DEFAULT 'UNKNOWN',
  `VIOLENCE` enum('VERY_LIKELY','LIKELY','POSSIBLE','VERY_UNLIKELY','UNLIKELY','UNKNOWN') DEFAULT 'UNKNOWN',
  `LABEL` text,
  `FACE_COUNT` int(11) DEFAULT NULL,
  `INAPPROPIATE` varchar(45) DEFAULT NULL,
  `SIGNATURE` blob,
  `MOD_DT` datetime DEFAULT NULL,
  `OWNER` varchar(45) DEFAULT NULL,
  `SCREEN_REASON` varchar(45) DEFAULT NULL,
  `SCREEN_OTHER` varchar(45) DEFAULT NULL,
  `SCREEN` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `PICTUREID_UNIQUE` (`PICTUREID`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1 ;

CREATE TABLE `FACE_RESPONSE` (
  `FACE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PICTUREID` int(11) DEFAULT NULL,
  `BLUR` enum('VERY_LIKELY','LIKELY','POSSIBLE','VERY_UNLIKELY','UNLIKELY','UNKNOWN') DEFAULT NULL,
  `CORD` varchar(45) DEFAULT NULL,
  `PAN_ANGLE` float DEFAULT NULL,
  `ROLL_ANGLE` float DEFAULT NULL,
  `TILT_ANGLE` float DEFAULT NULL,
  `UNDEREXPOSED` enum('VERY_LIKELY','LIKELY','POSSIBLE','VERY_UNLIKELY','UNLIKELY','UNKNOWN') DEFAULT NULL,
  PRIMARY KEY (`FACE_ID`),
  KEY `PICTUREID` (`PICTUREID`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;