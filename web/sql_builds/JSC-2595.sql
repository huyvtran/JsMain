use billing;
CREATE TABLE billing.`AUTOINCREMENT_RECEIPTID` ( `ID` int(7) unsigned NOT NULL AUTO_INCREMENT, `ENTRY_DT` datetime NOT NULL, PRIMARY KEY (`ID`), KEY `ENTRY_DT` (`ENTRY_DT`)) ENGINE=InnoDB