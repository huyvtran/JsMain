USE CONTACT_ENGINE;
UPDATE  `TEMPLATE_NAME` SET  `TEMPLATE_NAME` =  'profile_eoi_fni_post' WHERE CONVERT(  `CONTACT_TYPE` USING utf8 ) =  'E' AND CONVERT(  `PROFILE_STATE` USING utf8 ) =  'G' AND CONVERT(  `TO_BE_STATUS` USING utf8 ) =  'I' AND CONVERT(  `ENGINE_TYPE` USING utf8 ) =  'EOI' AND CONVERT(  `PAGE` USING utf8 ) =  'VDP' AND CONVERT(  `TEMPLATE_NAME` USING utf8 ) =  'profile_eoi_gni_post' AND CONVERT( `SENDER_RECEIVER` USING utf8 ) =  '' AND CONVERT(  `ACTION_TYPE` USING utf8 ) =  'POST' LIMIT 1 ;

INSERT INTO  `TEMPLATE_NAME` (  `CONTACT_TYPE` ,  `PROFILE_STATE` ,  `TO_BE_STATUS` ,  `ENGINE_TYPE` ,  `PAGE` ,  `TEMPLATE_NAME` ,  `SENDER_RECEIVER` ,  `ACTION_TYPE` ) 
VALUES (
'N',  'G',  'I',  'EOI',  'VDP',  'profile_eoi_fni_post',  'S',  'POST'
);
