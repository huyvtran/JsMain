use incentive;

CREATE TABLE `GHARPAY_CSV_DATA` (
 `ID` int(11) NOT NULL AUTO_INCREMENT,
 `PREFIX` varchar(5) DEFAULT '',
 `FIRST_NAME` varchar(60) DEFAULT '',
 `LAST_NAME` varchar(60) DEFAULT '',
 `CONTACT_NUMBER` varchar(40) DEFAULT '0',
 `ADDRESS` text,
 `LANDMARK` varchar(250) DEFAULT '',
 `EMAIL` varchar(100) DEFAULT '',
 `PINCODE` int(6) DEFAULT '0',
 `CITY` varchar(60) DEFAULT '',
 `ORDER_ID` varchar(60) DEFAULT '0',
 `ORDER_AMOUNT` int(3) DEFAULT '0',
 `DELIVERY_DT` varchar(16) DEFAULT '',
 `INVOICE_URL` varchar(100) DEFAULT '',
 `PRODUCT_ID` varchar(100) DEFAULT '',
 `PRODUCT_DESC` varchar(250) DEFAULT '',
 `QUANTITY` tinyint(2) DEFAULT '0',
 `UNIT_PRICE` int(3) DEFAULT '0',
 `COMMENTS` text,
 `CSV_ENTRY_DATE` date NOT NULL DEFAULT '0000-00-00',
 PRIMARY KEY (`ID`),
 KEY `CSV_ENTRY_DATE` (`CSV_ENTRY_DATE`)
) ENGINE=InnoDB;