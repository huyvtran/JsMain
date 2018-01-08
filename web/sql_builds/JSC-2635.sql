use billing;

ALTER TABLE billing.SERVICES ADD SHOW_ONLINE_NEW varchar(120) default "";

UPDATE billing.SERVICES SET SHOW_ONLINE = 'N' WHERE SERVICEID LIKE 'P1';

UPDATE billing.SERVICES SET SHOW_ONLINE_NEW = ",-1," WHERE SHOW_ONLINE_NEW = "" AND SHOW_ONLINE = "Y" AND ACTIVE="Y";