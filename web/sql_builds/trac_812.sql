ALTER TABLE  `CALLNOW` ADD  `DIALCODE` INT( 6 ) NOT NULL AFTER  `CALL_STATUS` ,
ADD  `ERROR_CODE` VARCHAR( 2 ) NOT NULL AFTER  `DIALCODE` ;

