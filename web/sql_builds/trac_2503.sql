use incentive;
ALTER TABLE  `NAME_OF_USER` ADD  `DISPLAY` VARCHAR( 1 ) DEFAULT NULL ;
use newjs;
CREATE TABLE  `ValidNameList_M` (
 `ID` INT( 10 ) NOT NULL AUTO_INCREMENT ,
 `NAME` VARCHAR( 40 ) NOT NULL ,
PRIMARY KEY (  `ID` ) ,
UNIQUE (
`NAME`
)
);
CREATE TABLE  `ValidNameList_F` (
 `ID` INT( 10 ) NOT NULL AUTO_INCREMENT ,
 `NAME` VARCHAR( 40 ) NOT NULL ,
PRIMARY KEY (  `ID` ) ,
UNIQUE (
`NAME`
)
);
ALTER TABLE  `SEARCH_MALE_TEXT` ADD  `NAME_OF_USER` VARCHAR( 40 );
ALTER TABLE  `SEARCH_FEMALE_TEXT` ADD  `NAME_OF_USER` VARCHAR( 40 );
ALTER TABLE  `SWAP` ADD  `NAME_OF_USER` VARCHAR( 40 );