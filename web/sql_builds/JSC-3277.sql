use billing;

update RENEWAL_DISCOUNT_LOOKUP SET DISCOUNT='70' WHERE SCORE_UPPER_LIMIT='30';
update RENEWAL_DISCOUNT_LOOKUP SET DISCOUNT='65' WHERE SCORE_UPPER_LIMIT='45';
update RENEWAL_DISCOUNT_LOOKUP SET DISCOUNT='60' WHERE SCORE_UPPER_LIMIT='60';
update RENEWAL_DISCOUNT_LOOKUP SET DISCOUNT='55' WHERE SCORE_UPPER_LIMIT='70';
update RENEWAL_DISCOUNT_LOOKUP SET DISCOUNT='50' WHERE SCORE_UPPER_LIMIT='75';
update RENEWAL_DISCOUNT_LOOKUP SET DISCOUNT='45' WHERE SCORE_UPPER_LIMIT='80';
update RENEWAL_DISCOUNT_LOOKUP SET DISCOUNT='40' WHERE SCORE_UPPER_LIMIT='85';
update RENEWAL_DISCOUNT_LOOKUP SET DISCOUNT='35' WHERE SCORE_UPPER_LIMIT='90';
update RENEWAL_DISCOUNT_LOOKUP SET DISCOUNT='30' WHERE SCORE_UPPER_LIMIT='95';
update RENEWAL_DISCOUNT_LOOKUP SET DISCOUNT='25' WHERE SCORE_UPPER_LIMIT='100';