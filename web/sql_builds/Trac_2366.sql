use billing;

CREATE TABLE VAS_POP(MAINSERID VARCHAR(20),SERVICEID VARCHAR(20),PROFILEID INT(20));
CREATE TABLE ADDON_RANK(ID INT(50) AUTO_INCREMENT PRIMARY KEY,MSID VARCHAR(20),VAS_ID VARCHAR(20),RANK INT(10));
