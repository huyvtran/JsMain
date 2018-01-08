-- Step - 1 =>Alter Queries On Main Sql Instance
use newjs

alter table `NEW_DELETED_PROFILE_LOG` drop primary key, add primary key(`PROFILEID`,`DATE`);

alter table `RETRIEVE_PROFILE_LOG` drop primary key, add primary key(`PROFILEID`,`DATE`);

ALTER TABLE  `NEW_DELETED_PROFILE_LOG` ADD  `HOUSKEEPING_DONE` ENUM(  'Y',  'N' ) DEFAULT  'Y' NOT NULL ; 
-- Step - 2 => Create New Tables, which will contain data of those users who were deleted in last 3 months

-- For Main Sql Instance

use newjs;
CREATE TABLE `DELETED_BOOKMARKS_ELIGIBLE_FOR_RET` LIKE `BOOKMARKS`;

CREATE TABLE `DELETED_IGNORE_PROFILE_ELIGIBLE_FOR_RET` LIKE `IGNORE_PROFILE`;

use jsadmin;
CREATE TABLE `DELETED_OFFLINE_MATCHES_ELIGIBLE_FOR_RET` LIKE `OFFLINE_MATCHES`;

CREATE TABLE `DELETED_OFFLINE_NUDGE_LOG_ELIGIBLE_FOR_RET` LIKE `OFFLINE_NUDGE_LOG`;

CREATE TABLE `DELETED_VIEW_CONTACTS_LOG_ELIGIBLE_FOR_RET` LIKE `VIEW_CONTACTS_LOG`;

-- For Shards Sql Instance

use newjs;

CREATE TABLE `DELETED_HOROSCOPE_REQUEST_ELIGIBLE_FOR_RET` LIKE `HOROSCOPE_REQUEST`;

CREATE TABLE `DELETED_PHOTO_REQUEST_ELIGIBLE_FOR_RET` LIKE `PHOTO_REQUEST`;

CREATE TABLE `DELETED_MESSAGE_LOG_ELIGIBLE_FOR_RET` LIKE `MESSAGE_LOG`;

CREATE TABLE `DELETED_EOI_VIEWED_LOG_ELIGIBLE_FOR_RET` LIKE `EOI_VIEWED_LOG`;

CREATE TABLE `DELETED_PROFILE_CONTACTS_ELIGIBLE_FOR_RET` LIKE `CONTACTS`;

CREATE TABLE `DELETED_MESSAGES_ELIGIBLE_FOR_RET` LIKE `MESSAGES`;