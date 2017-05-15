use newjs;

CREATE TABLE `JAMAAT` (
  `ID` smallint(3) NOT NULL AUTO_INCREMENT,
  `LABEL` varchar(100) NOT NULL,
  `VALUE` smallint(3) NOT NULL,
  `SORTBY` smallint(3) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;


INSERT INTO `JAMAAT` VALUES (1, 'Ahle Hadees', 1, 1);
INSERT INTO `JAMAAT` VALUES (2, 'Barelvi', 2, 2);
INSERT INTO `JAMAAT` VALUES (3, 'Deobandi', 3, 3);
INSERT INTO `JAMAAT` VALUES (4, 'Sufi', 4, 4);
INSERT INTO `JAMAAT` VALUES (5, 'Tablighi Jamaat', 5, 5);