use incentive;
ALTER TABLE incentive.`SALES_CAMPAIGN_PROFILE_DETAILS` CHANGE MAIL_SENT  MAIL_SENT char(1) NOT NULL default 'N';

use billing;
ALTER TABLE billing.`VARIABLE_DISCOUNT` CHANGE SENT_MAIL  SENT_MAIL char(1) NOT NULL default 'N';
