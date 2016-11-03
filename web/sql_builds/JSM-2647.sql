use PICTURE;

CREATE TABLE `ALBUM_VIEW_LOGGING` (
 `ID` int(10) NOT NULL AUTO_INCREMENT,
 `VIEWER_ID` int(10) DEFAULT NULL,
 `VIEWED_ID` int(10) NOT NULL,
 `DATETIME` datetime NOT NULL,
 `CHANNEL` varchar(2) NOT NULL,
 PRIMARY KEY (`ID`),
 UNIQUE KEY `VIEWER_ID` (`VIEWER_ID`,`VIEWED_ID`)
)ENGINE=MYISAM;