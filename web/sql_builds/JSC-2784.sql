RENAME TABLE billing.PAYMENT_STATUS_LOG TO billing.PAYMENT_STATUS_LOG_120517;

CREATE TABLE billing.PAYMENT_STATUS_LOG (
  ID mediumint(11) NOT NULL AUTO_INCREMENT,
  ORDERID varchar(50) NOT NULL,
  STATUS char(1) NOT NULL,
  GATEWAY varchar(20) NOT NULL,
  MSG varchar(200) NOT NULL,
  ENTRY_DT datetime NOT NULL,
  PROFILEID int(11) DEFAULT 0,
  PRIMARY KEY (ID)
) ENGINE=MyISAM AUTO_INCREMENT=2627046 DEFAULT CHARSET=latin1
