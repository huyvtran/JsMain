use jeevansathi_mailer;
INSERT INTO `EMAIL_TYPE` (`ID`, `MAIL_ID`, `TPL_LOCATION`, `HEADER_TPL`, `FOOTER_TPL`, `TEMPLATE_EX_LOCATION`, `MAIL_GROUP`, `CUSTOM_CRITERIA`, `SENDER_EMAILID`, `DESCRIPTION`, `MEMBERSHIP_TYPE`, `GENDER`, `PHOTO_PROFILE`, `REPLY_TO_ENABLED`, `FROM_NAME`, `REPLY_TO_ADDRESS`, `MAX_COUNT_TO_BE_SENT`, `REQUIRE_AUTOLOGIN`, `FTO_FLAG`, `PRE_HEADER`, `PARTIALS`) VALUES (1768, 1768, 'success_mailer_photo.tpl', NULL, NULL, NULL, 17, 1, 'customerservice@jeevansathi.com', 'Photo Upload mailer after submitting success story', 'D', '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '');
INSERT INTO `EMAIL_TYPE` (`ID`, `MAIL_ID`, `TPL_LOCATION`, `HEADER_TPL`, `FOOTER_TPL`, `TEMPLATE_EX_LOCATION`, `MAIL_GROUP`, `CUSTOM_CRITERIA`, `SENDER_EMAILID`, `DESCRIPTION`, `MEMBERSHIP_TYPE`, `GENDER`, `PHOTO_PROFILE`, `REPLY_TO_ENABLED`, `FROM_NAME`, `REPLY_TO_ADDRESS`, `MAX_COUNT_TO_BE_SENT`, `REQUIRE_AUTOLOGIN`, `FTO_FLAG`, `PRE_HEADER`, `PARTIALS`) VALUES (1769, 1769, 'success_mailer_delete.tpl', NULL, NULL, NULL, 18, 1, 'customerservice@jeevansathi.com', 'Deletion of  Profile mailer after uploading success story', 'D', '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, '');

INSERT INTO `MAILER_SUBJECT` (`MAIL_ID`, `SUBJECT_TYPE`, `SUBJECT_CODE`, `DESCRIPTION`) VALUES (1768, 'D', 'Your success story needs a photo!', 'Photo request mailer for success story');
INSERT INTO `MAILER_SUBJECT` (`MAIL_ID`, `SUBJECT_TYPE`, `SUBJECT_CODE`, `DESCRIPTION`) VALUES (1769, 'D', 'Congratulations from Jeevansathi !', 'profile delete mailer after uploading success story');
