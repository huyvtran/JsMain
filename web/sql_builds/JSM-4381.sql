use Assisted_Product;

CREATE TABLE `AP_SEND_INTEREST_PROFILES` (
 `SNO` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
 `SENDER` int(11) NOT NULL,
 `RECEIVER` int(11) NOT NULL,
 `ENTRY_DATE` datetime NOT NULL,
 PRIMARY KEY (`SNO`),
 UNIQUE KEY `SR` (`SENDER`,`RECEIVER`)
) ENGINE=InnoDB;

CREATE TABLE `AP_SEND_INTEREST_PROFILES_COMPLETE` (
 `SNO` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
 `SENDER` int(11) NOT NULL,
 `RECEIVER` int(11) NOT NULL,
 `ENTRY_DATE` datetime DEFAULT NULL,
 PRIMARY KEY (`SNO`),
 UNIQUE KEY `SR` (`SENDER`,`RECEIVER`)
) ENGINE=InnoDB


DELIMITER |

CREATE TRIGGER INSERT_AP_SEND_INTEREST_PROFILES_COMPLETE
AFTER INSERT ON AP_SEND_INTEREST_PROFILES
   FOR EACH ROW
   BEGIN

           INSERT IGNORE INTO Assisted_Product.AP_SEND_INTEREST_PROFILES_COMPLETE(SNO,SENDER,RECEIVER,ENTRY_DATE) VALUES ('',new.SENDER,new.RECEIVER,new.ENTRY_DATE);

   END;
|