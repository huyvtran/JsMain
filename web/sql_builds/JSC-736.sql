CREATE TABLE billing.`DISCOUNT_LOOKUP_BACKUP` (
 `SCORE_LOWER_LIMIT` tinyint(3) DEFAULT NULL,
 `SCORE_UPPER_LIMIT` tinyint(3) DEFAULT NULL,
 `GENDER` char(1) DEFAULT NULL,
 `MTONGUE` tinyint(3) DEFAULT NULL,
 `SERVICE` char(6) NOT NULL DEFAULT '',
 `3_DISCOUNT` tinyint(3) DEFAULT NULL,
 `6_DISCOUNT` tinyint(3) DEFAULT NULL,
 `12_DISCOUNT` tinyint(3) DEFAULT NULL,
 `L_DISCOUNT` tinyint(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1