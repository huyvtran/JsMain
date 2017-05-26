use incentive;

ALTER TABLE FIELD_SALES_WIDGET ADD REQUESTED_BY varchar(20) DEFAULT NULL;
ALTER TABLE FIELD_SALES_WIDGET ADD REQUESTED_VISIT_DT date DEFAULT NULL;
ALTER TABLE FIELD_SALES_WIDGET ADD VISITED enum('Y','N') DEFAULT NULL;

CREATE INDEX VISITED ON FIELD_SALES_WIDGET (VISITED);
