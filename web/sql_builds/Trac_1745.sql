use billing;

INSERT INTO  `SERVICES` (  `ID` ,  `SERVICEID` ,  `NAME` ,  `DESCRIPTION` ,  `DURATION` ,  `PRICE_RS` ,  `PRICE_RS_TAX` ,  `PRICE_DOL` ,  `PACKAGE` ,  `COMPID` ,  `PACKID` ,  `ADDON` ,  `SORTBY` ,  `SHOW_ONLINE` ,  `ACTIVE` ) VALUES ('',  'X6',  'JS Exclusive - 6 months',  '',  '6',  '0',  '0',  '0',  'N',  'X6',  '',  'Y',  '140',  'N',  'Y');

UPDATE SERVICES SET PRICE_RS_TAX =45000,PRICE_DOL =901,PRICE_RS = ROUND( PRICE_RS_TAX / 1.1236, 2 ) WHERE SERVICEID =  'X12';

UPDATE SERVICES SET PRICE_RS_TAX =29000,PRICE_DOL =601,PRICE_RS = ROUND( PRICE_RS_TAX / 1.1236, 2 ) WHERE SERVICEID =  'X6';

UPDATE  `COMPONENTS` SET  `PRICE_RS` =  '45000',`PRICE_DOL` =  '901' WHERE  SERVICEID =  'X12' ;

INSERT INTO  `COMPONENTS` (  `ID` ,  `COMPID` ,  `NAME` ,  `DESCRIPTION` ,  `DURATION` ,  `PRICE_RS` ,  `PRICE_DOL` ,  `RIGHTS` ,  `TYPE` ,  `ACC_COUNT` ) VALUES ('',  'X6',  'JS Exclusive - 6 months',  '',  '6',  '29000',  '601',  'X',  'D',  '0');

