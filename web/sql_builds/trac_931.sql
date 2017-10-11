TRUNCATE TABLE `SMS_TYPE`;
 
ALTER TABLE `SMS_TYPE` CHANGE `SUBSCRIPTION` `SUBSCRIPTION` CHAR( 50 );

INSERT INTO `SMS_TYPE` VALUES (1, 'PROFILE_APPROVE', 'I', 2, 'F,P', 'A', 'SINGLE', 0, 0, 'SERVICE', 'Y', 'Jeevansathi.com team has screened & made live your profile {USERNAME}. Login with password {PASSWORD} & Contact members u like via Expression of Interest');
INSERT INTO `SMS_TYPE` VALUES (2, 'PROFILE_DISAPPROVE', 'I', 2.3, 'A', 'A', 'SINGLE', 0, 0, 'SERVICE', 'Y', 'Your Profile {USERNAME} is not complete & hence you cannot use Jeevansathi. Login with your Password {PASSWORD} & complete your profile.');
INSERT INTO `SMS_TYPE` VALUES (3, 'DETAIL_CONFIRM', 'I', 3, 'A', 'A', 'SINGLE', 20, 0, 'SERVICE', 'Y', ' Your profile details are- Date of Birth:{DTOFBIRTH}, {MSTATUS}, {GENDER}. To modify email to feedback@jeevansathi.com.');
INSERT INTO `SMS_TYPE` VALUES (4, 'MTONGUE_CONFIRM', 'I', 4, 'A', 'A', 'SINGLE', 20, 0, 'SERVICE', 'N', ' You entered {MTONGUE} as your Mother Tongue on your Jeevansathi profile. To confirm send M to {VALUEFRSTNO}. To modify email to feedback@jeevansathi.com.');
INSERT INTO `SMS_TYPE` VALUES (5, 'REGISTER_CONFIRM', 'I', 1, 'A', 'A', 'SINGLE', 20, 0, 'SERVICE', 'Y', 'A profile has been registered on Jeevansathi.com with your phone nos. In case you have not registered then send "NO" to {VALUEFRSTNO}.');
INSERT INTO `SMS_TYPE` VALUES (6, 'REGISTER_RESPONSE', 'I', 2, 'A', 'A', 'SINGLE', 0, 0, 'SERVICE', 'Y', 'Thank you for informing Jeevansathi.com. We are removing your number. Sometimes people accidently type wrong numbers. For clarification call {TOLLNO}.');
INSERT INTO `SMS_TYPE` VALUES (7, 'FORGOT_PASSWORD', 'I', 11, 'A', 'A', 'SINGLE', 0, 0, 'SERVICE', 'Y', 'Your jeevansathi.com username is {USERNAME_FULL} and password is {PASSWORD}. Login now to find your Jeevansathi.');
INSERT INTO `SMS_TYPE` VALUES (8, 'PHONE_VERIFY_REG', 'I', 2, 'A', 'A', 'SINGLE', 0, 0, 'SERVICE', 'N', 'Thank you for verifying your number. Visit www.Jeevansathi. com or click {BACK_MATCH_URL} to find people who would like your profile. Helpline {TOLLNO}.');
INSERT INTO `SMS_TYPE` VALUES (9, 'PAYMENT_PHONE_VERIFY', 'I', 82, 'P', 'A', 'SINGLE', 0, 0, 'SERVICE', 'Y', 'To view contact details of other members on Jeevansathi, its compulsory for you to verify ur own phone nos. SMS {VERIFY_CODE} from your mobile to {VALUEFRSTNO} to verify.');
INSERT INTO `SMS_TYPE` VALUES (10, 'PHOTO_APPROVE', 'I', 70, 'E1,E2,E3,E4,E5,F,P', 'A', 'SINGLE', 0, 0, 'SERVICE', 'Y', 'Your photo is screened & made live on Jeevansathi. Click {BACK_MATCH_URL} to see {NOSLIKEME} members whose criteria u match. Express Interest to contact for free.');
INSERT INTO `SMS_TYPE` VALUES (11, 'PHOTO_DISAPPROVE', 'I', 71.2, 'A', 'A', 'SINGLE', 0, 0, 'SERVICE', 'Y', 'Dear {USERNAME}, we regret to inform you that your photo could not go live as the picture quality was not good. Please upload another photo on Jeevansathi.com');
INSERT INTO `SMS_TYPE` VALUES (12, 'PAYMENT_ANY', 'I', 22, 'P', 'A', 'SINGLE', 0, 0, 'SERVICE', 'Y', 'Thank you for buying Jeevansathi.com membership. We have received a payment of Rs.{PAYMENT} for your profile ID {USERNAME}. Your membership will be activated soon.');
INSERT INTO `SMS_TYPE` VALUES (13, 'PAYMENT_MEMBERSHIP', 'I', 22, 'P', 'A', 'SINGLE', 0, 0, 'SERVICE', 'Y', 'Paid membership for ur profile {USERNAME} on Jeevansathi. com has been activated. Logon to {URL_CONTACTS} to send emails, chat requests or view phone nos.');
INSERT INTO `SMS_TYPE` VALUES (14, 'PHONE_VERIFY', 'I', 10, 'F,E1,E2,E3,E4,E5,D4', 'A', 'SINGLE', 0, 0, 'SERVICE', 'Y', 'Your phone number has been verified for your profile ID {USERNAME} on Jeevansathi.com. See phone no of other members call {TOLLNO}.');
INSERT INTO `SMS_TYPE` VALUES (15, 'PHONE_VERIFY', 'I', 10, 'P', 'A', 'SINGLE', 0, 0, 'SERVICE', 'Y', 'Your phone number has been verified for your profile ID {USERNAME} on Jeevansathi. com. See phone/email of profiles you like at {URL_ACCEPT}');
INSERT INTO `SMS_TYPE` VALUES (16, 'PHONE_UNVERIFY', 'I', 10, 'A', 'A', 'SINGLE', 0, 0, 'SERVICE', 'Y', 'Phone verification has failed for your profile ID {USERNAME}. Please call customer care at {TOLLNO} for help from the number you wish to verify.');
INSERT INTO `SMS_TYPE` VALUES (17, 'AP_EDIT', 'I', 5, 'A', 'A', 'SINGLE', 0, 0, 'SERVICE', 'Y', 'To help you find better matches,Jeevansathi team has edited parts of your Desired Partner Profile. Click {UDESPID} to see. Helpline {TOLLNO}.');
INSERT INTO `SMS_TYPE` VALUES (18, 'MADELIVE_1', 'D', 60, 'A', 'A', 'SINGLE', 1, 0, 'SERVICE', 'N', 'Dear {USERNAME} for help in using Jeevansathi. com website, call {TOLLNO} or visit http://www.jeevansathi.com/P/faq_main.php');
INSERT INTO `SMS_TYPE` VALUES (19, 'MADELIVE_7', 'D', 6, 'E1,E2,F,P', 'A', 'SINGLE', 7, 0, 'SERVICE', 'N', 'Dear {USERNAME} for help in using Jeevansathi.com website contact {ANAME} in {ACITY} at {AMOBILE}.');
INSERT INTO `SMS_TYPE` VALUES (20, 'MADELIVE_35', 'D', 6, 'E1,E2,F,P', 'A', 'SINGLE', 35, 0, 'SERVICE', 'Y', 'Dear {USERNAME} to get phone no. of profiles you like on Jeevansathi.com website contact {ANAME} in {ACITY} at {AMOBILE}.');
INSERT INTO `SMS_TYPE` VALUES (21, 'MADELIVE_28', 'D', 6, 'E1,E2,F,P', 'A', 'SINGLE', 28, 0, 'SERVICE', 'Y', 'Dear {USERNAME}, there are {FRDDPP} profiles from your community on Jeevansathi.com. To know about them contact {ANAME}: {ACITY} at {AMOBILE}.');
INSERT INTO `SMS_TYPE` VALUES (22, 'MADELIVE_14', 'D', 6, 'E1,E2,F,P', 'A', 'SINGLE', 14, 0, 'SERVICE', 'N', 'Dear {USERNAME}, to know how to contact profiles on Jeevansathi.com call {ANAME} in {ACITY} at {AMOBILE}.');
INSERT INTO `SMS_TYPE` VALUES (23, 'MADELIVE_21', 'D', 6, 'E1,E2,F,P', 'A', 'SINGLE', 21, 0, 'SERVICE', 'Y', 'Dear {USERNAME}, other members have asked for your photo. To add Photo contact {ANAME} in {ACITY} at {AMOBILE}.');
INSERT INTO `SMS_TYPE` VALUES (24, 'MADELIVE_10', 'D', 6, 'E1,E2,F,P', 'A', 'SINGLE', 10, 0, 'SERVICE', 'N', 'Dear {USERNAME} the Jeevansathi service center in {ACITY} is at {AADDRSS}.');
INSERT INTO `SMS_TYPE` VALUES (25, 'PHOTO_REQUEST', 'D', 50, 'E1,E2,E3,E4,E5,P,F', 'M', 'SINGLE', 1, 0, 'SERVICE', 'Y', 'Jeevansathi profile {URL_PROFILE} -{AGE}yrs, {HEIGHT}, {CASTE} wants to see your photo. Upload or Email to photos@jeevansathi.com');
INSERT INTO `SMS_TYPE` VALUES (26, 'PHOTO_REQUEST', 'D', 50, 'E1,E2,E3,E4,E5,P,F', 'F', 'SINGLE', 1, 0, 'SERVICE', 'Y', 'Jeevansathi profile {URL_PROFILE} -{AGE}yrs, {HEIGHT}, {EDU_LEVEL},{INCOME} ,{CITY_RES} wants to see your photo. Upload or email to photos@jeevansathi.com');
INSERT INTO `SMS_TYPE` VALUES (27, 'EOI', 'D', 45, 'F,E1,E2,E3,E4,E5,C1,C2,C3,D1,D2,D3,D4', 'M', 'SINGLE', 1, 0, 'SERVICE', 'Y', 'Jeevansathi member {AGE}yrs,{HEIGHT}, {MTONGUE}, {CASTE}, {EDU_LEVEL} in {CITY_RES} has liked your profile. Click {URL_PROFILE} or call {TOLLNO}');
INSERT INTO `SMS_TYPE` VALUES (28, 'EOI', 'D', 45, 'F,E1,E2,E3,E4,E5,C1,C2,C3,D1,D2,D3,D4', 'F', 'SINGLE', 1, 0, 'SERVICE', 'Y', 'Jeevansathi member {AGE}yrs,{HEIGHT}, {MTONGUE}, {EDU_LEVEL}, {INCOME}, {CITY_RES} has liked your profile. Click {URL_PROFILE} or call {TOLLNO}');
INSERT INTO `SMS_TYPE` VALUES (29, 'EOI', 'D', 45, 'P', 'A', 'SINGLE', 1, 0, 'SERVICE', 'N', 'Jeevansathi member {AGE} yrs,{HEIGHT},{CASTE},{EDU_LEVEL},{INCOME},{OCCUPATION} has liked ur profile. Click {URL_EOI} & accept to contact info');
INSERT INTO `SMS_TYPE` VALUES (30, 'EOI', 'D', 45, 'F,E1,E2,E3,E4,E5,C1,C2,C3,D1,D2,D3,D4', 'M', 'MUL', 1, 0, 'SERVICE', 'Y', '{EOI_COUNT} Jeevansathi members liked ur profile incl-{AGE} yrs,{HEIGHT},{WEIGHT} - {URL_PROFILE} To see all click {URL_EOI} Call {TOLLNO}');
INSERT INTO `SMS_TYPE` VALUES (31, 'EOI', 'D', 45, 'F,E1,E2,E3,E4,E5,C1,C2,C3,D1,D2,D3,D4', 'F', 'MUL', 1, 0, 'SERVICE', 'Y', '{EOI_COUNT} Jeevansathi members liked ur profile incl-{AGE} yrs,{HEIGHT},{INCOME} - {URL_PROFILE} To see all click {URL_EOI} Call {TOLLNO}');
INSERT INTO `SMS_TYPE` VALUES (32, 'EOI', 'D', 45, 'P', 'A', 'MUL', 1, 0, 'SERVICE', 'N', '{EOI_COUNT} Jeevansathi members liked ur profile incl-{AGE}yrs, {CASTE} , {EDU_LEVEL}, {INCOME}, {URL_PROFILE} To see all click {URL_EOI}');
INSERT INTO `SMS_TYPE` VALUES (33, 'ACCEPT', 'D', 38, 'F,E1,E2,E3,E5,G', 'M', 'SINGLE', 1, 0, 'SERVICE', 'Y', 'Jeevansathi member-{AGE}yrs, {HEIGHT}, {WEIGHT}, {EDU_LEVEL}, {OCCUPATION}, {CITY_RES} has Accepted ur Expression of Interest. Click {URL_ACCEPT} or call {TOLLNO}.');
INSERT INTO `SMS_TYPE` VALUES (34, 'ACCEPT', 'D', 38, 'F,E1,E2,E3,E5,G', 'F', 'SINGLE', 1, 0, 'SERVICE', 'Y', 'Jeevansathi member- {AGE}yrs, {EDU_LEVEL}, {INCOME},{OCCUPATION} in {CITY_RES} has Accepted ur Expression of Interest. Click {URL_ACCEPT} or call {TOLLNO}.');
INSERT INTO `SMS_TYPE` VALUES (35, 'ACCEPT', 'D', 38, 'F,E1,E2,E3,E5,G', 'A', 'MUL', 1, 0, 'SERVICE', 'Y', '{ACCEPT_COUNT} Jeevansathi members have liked ur profile/Accepted ur Expression of Interest. To see all click {URL_ACCEPT} Call {TOLLNO}.');
INSERT INTO `SMS_TYPE` VALUES (36, 'ACCEPT', 'D', 38, 'P', 'A', 'MUL', 1, 0, 'SERVICE', 'Y', '{ACCEPT_COUNT} Jeevansathi members have liked ur profile/Accepted ur Expression of Interest. To see all click {URL_ACCEPT}');
INSERT INTO `SMS_TYPE` VALUES (37, 'MEM_EXPIRE_A15', 'D', 16, 'P', 'A', 'SINGLE', -15, 0, 'SERVICE', 'Y', 'Membership on ur Jeevansathi profile {USERNAME} will expire on {EXPDATE}. Renew & ensure you dont loose details of members contacted earlier. Call {TOLLNO}.');
INSERT INTO `SMS_TYPE` VALUES (38, 'MEM_EXPIRE_A10', 'D', 16, 'P', 'A', 'SINGLE', -10, 0, 'SERVICE', 'Y', 'Membership on ur Jeevansathi profile {USERNAME} will expire on {EXPDATE}. Renew & ensure you dont loose details of members contacted earlier. Call {TOLLNO}.');
INSERT INTO `SMS_TYPE` VALUES (39, 'MEM_EXPIRE_A5', 'D', 16, 'P', 'A', 'SINGLE', -5, 0, 'SERVICE', 'Y', 'Membership on ur Jeevansathi profile {USERNAME} will expire on {EXPDATE}. Renew & ensure you dont loose details of members contacted earlier. Call {TOLLNO}.');
INSERT INTO `SMS_TYPE` VALUES (40, 'MEM_EXPIRE_B1', 'D', 16, 'F', 'A', 'SINGLE', 1, 0, 'SERVICE', 'Y', 'Membership on ur Jeevansathi profile {USERNAME} has expired. Renew before {AFTREXPDATE} & ensure you dont loose details of members contacted earlier. Call {TOLLNO}.');
INSERT INTO `SMS_TYPE` VALUES (41, 'MEM_EXPIRE_B5', 'D', 16, 'F', 'A', 'SINGLE', 5, 0, 'SERVICE', 'Y', 'Membership on ur Jeevansathi profile {USERNAME} has expired. Renew before {AFTREXPDATE} & ensure you dont loose details of members contacted earlier. Call {TOLLNO}.');
INSERT INTO `SMS_TYPE` VALUES (42, 'INVALID_EMAIL', 'D', 2, 'A', 'A', 'SINGLE', 1, 0, 'SERVICE', 'N', 'Mails to your current email id are bouncing back. To continue using the website update your email id on jeevansathi .com or click {EDIT_CONTACT_LAYER}.');
INSERT INTO `SMS_TYPE` VALUES (43, 'DISCOUNT_0', 'D', 49, 'F', 'A', 'SINGLE', 0, 0, 'PROMO', 'N', 'Congrats! Dear {USERNAME},get special discount of {DISCOUNT}% on Jeevansathi. com membership. To avail call {TOLLNO} or call {NOIDALANDL} before {DISCOUNTDATE}.');
INSERT INTO `SMS_TYPE` VALUES (44, 'DISCOUNT_3', 'D', 49, 'F', 'A', 'SINGLE', 3, 0, 'PROMO', 'N', 'Last 4 days left to get your exclusive discount of {DISCOUNT}% on Jeevansathi. com memberships. To avail call {TOLLNO} or call {NOIDALANDL} before {DISCOUNTDATE}.');
INSERT INTO `SMS_TYPE` VALUES (45, 'DISCOUNT_7', 'D', 49, 'F', 'A', 'SINGLE', 7, 0, 'PROMO', 'N', 'Dont Miss it!! Your special discount of {DISCOUNT}% on Jeevansathi. com is ending today. To avail call {TOLLNO} or call {NOIDALANDL} before {DISCOUNTDATE}.');
INSERT INTO `SMS_TYPE` VALUES (46, 'CALLNOW_FAIL', 'D', 48, 'F', 'A', 'SINGLE', 1, 0, 'SERVICE', 'N', 'Jeevansathi member {AGE}yrs, {HEIGHT}, {CASTE}, {INCOME} had called your phone but your number was out of reach. Click {URL_PROFILE} & view details.');
INSERT INTO `SMS_TYPE` VALUES (47, 'PHONE_VERIFY', 'MON', 82, 'E1,E2,F,P', 'A', 'SINGLE', 150, 0, 'SERVICE', 'N', 'Verify your phone number to make your profile {USERNAME} appear on top of "Search results" on Jeevansathi. SMS {VERIFY_CODE} from your mobile to {VALUEFRSTNO} to verify.');
INSERT INTO `SMS_TYPE` VALUES (48, 'PHOTO_REQ_WEEK', 'MON', 50, 'E1,E2,F,P', 'A', 'MUL', 7, 0, 'SERVICE', 'Y', '{PHOTO_REQUEST_COUNT} members on Jeevansathi.com have requested you for your photo. Login to Jeevansathi.com & upload photos or email with profile id to photos@jeevansathi.com');
INSERT INTO `SMS_TYPE` VALUES (49, 'TAKE_MEMB', 'WED', 114, 'F', 'A', 'SINGLE', 60, 0, 'SERVICE', 'N', 'See contact nos on Jeevansathi.com /Chat with prospective partners. Click on "Contact Details" button on Jeevansathi.com or call {TOLLNO} for help.');
INSERT INTO `SMS_TYPE` VALUES (50, 'ADD_PHOTO', 'TUE', 51, 'E1,E2,F,P', 'A', 'SINGLE', 7, 0, 'SERVICE', 'N', 'Dear {USERNAME}, Jeevansathi members are not responding to ur messages as ur profile does not have a photo. Email photo with profile id to photos@jeevansathi.com');
INSERT INTO `SMS_TYPE` VALUES (51, 'MATCHALERT', 'TUE', 102, 'A', 'A', 'SINGLE', 150, 0, 'SERVICE', 'N', 'Dear {USERNAME}, Jeevansathi. com has found {MATCH_COUNT} matches which suite your criteria. Check these on {URL_MATCH} Or login the "My Contacts" section');
INSERT INTO `SMS_TYPE` VALUES (52, 'PHOTO_REQ_OFF_WEEK', 'WED', 50, 'E1,E2,F,P', 'A', 'MUL', 150, 0, 'SERVICE', 'Y', '{PHOTO_REQUEST_COUNT} Jeevansathi members want to see your son/daughters photo. Courier to {SALES_ADDRESS_NOIDA}. Write your phone number or profile ID on the photo.');
INSERT INTO `SMS_TYPE` VALUES (53, 'ADD_PHOTO', 'WED', 52, 'E1,E2,F,P', 'A', 'SINGLE', 7, 0, 'SERVICE', 'N', 'Dear {USERNAME}, Jeevansathi members are rejecting ur "Express Interest messages" as ur profile does not have a photo. Email photo to photos@jeevansathi.com');
INSERT INTO `SMS_TYPE` VALUES (54, 'PHOTO_UPLOAD', 'WED', 67, 'A', 'A', 'SINGLE', 7, 1, 'SERVICE', 'N', 'Jeevansathi.com member {AGE}yrs, {MTONGUE}, {CASTE} -{PHOTO_UPLOADER_PROFILE} has put a photo. You had earlier requested {PHOTO_UPLOADER} to upload a photo.');
INSERT INTO `SMS_TYPE` VALUES (55, 'PHOTO_UPLOAD', 'WED', 25, 'C1,C2,E1,E2,E3,E4,E5,F,P', 'A', 'SINGLE', 7, 0, 'SERVICE', 'Y', 'Jeevansathi profile-{PHOTO_UPLOADER_PROFILE} uploaded a photo in response to ur request. You should add photo to increase response. Send to photos@jeevansathi.com');
INSERT INTO `SMS_TYPE` VALUES (56, 'PHOTO_UPLOAD', 'WED', 67, 'A', 'A', 'MUL', 7, 1, 'SERVICE', 'N', '{PHTOUPNO} Jeevansathi members have put photos on their profiles. You had requested all these members for their photos. To see all click {PHOTO_REQUEST_SENT}');
INSERT INTO `SMS_TYPE` VALUES (57, 'PHOTO_UPLOAD', 'WED', 25, 'C1,C2,E1,E2,E3,E4,E5,F,P', 'A', 'MUL', 7, 0, 'SERVICE', 'Y', '{PHTOUPNO} Jeevansathi members whose photos u wanted to see have put their photos. See all at {PHOTO_REQUEST_SENT} Ad ur own photo- email to photos@jeevansathi.com');
INSERT INTO `SMS_TYPE` VALUES (58, 'PHONE_VERIFY', 'THU', 82, 'E1,E2,F,P', 'A', 'SINGLE', 150, 0, 'SERVICE', 'N', 'Jeevansathi.com requires you to verify your phone to get the "verified number" stamp. SMS from ur mobile {VERIFY_CODE} & send to {VALUEFRSTNO} to verify your phone nos');
INSERT INTO `SMS_TYPE` VALUES (59, 'PROFILE_COMPLETE', 'THU', 97, 'E1,E2,F,P', 'A', 'SINGLE', 150, 0, 'SERVICE', 'N', 'Your profile {USERNAME} on Jeevansathi.com is {PROF_PERCENT}% complete. If you add more information then 87% more people will contact you.');
INSERT INTO `SMS_TYPE` VALUES (60, 'PHOTO_NCR', 'THU', 53, 'E1,E2,F,P', 'A', 'SINGLE', 150, 0, 'SERVICE', 'N', 'Dear {USERNAME}, Jeevansathi members are not responding to your messages as ur profile does not have a photo. SMS "photo" to {PHOTOHELPNO} for home-pickup of photo.');
INSERT INTO `SMS_TYPE` VALUES (61, 'HOROSCOPE_UPLOAD', 'THU', 68, 'A', 'A', 'SINGLE', 7, 1, 'SERVICE', 'N', 'Jeevansathi profile {HOROSCOPE_UPLOADER} - {HOROSCOPE_UPLOADER_PROFILE} has uploaded a horoscope in response to your request. Login to see ur Guna compatibility. Help-{TOLLNO}.');
INSERT INTO `SMS_TYPE` VALUES (62, 'HOROSCOPE_UPLOAD', 'THU', 68, 'A', 'A', 'SINGLE', 7, 0, 'SERVICE', 'N', 'Jeevansathi profile {HOROSCOPE_UPLOADER} -{HOROSCOPE_UPLOADER_PROFILE} uploaded a horoscope in response to your request. See Free Guna compatibility by updating ur birth details.');
INSERT INTO `SMS_TYPE` VALUES (63, 'PHOTO_REQ_OFF_WEEK', 'FRI', 50, 'E1,E2,F,P', 'A', 'MUL', 150, 0, 'SERVICE', 'Y', '{PHOTO_REQUEST_COUNT} Jeevansathi members want to see ur profiles photo. Just write "Free Post -201951" on any envelope & post it. No Stamps to be put. Write ur Phone-No on photo');
INSERT INTO `SMS_TYPE` VALUES (64, 'ADD_PHOTO', 'FRI', 69, 'E1,E2,F,P', 'A', 'SINGLE', 150, 0, 'SERVICE', 'N', 'Dear {USERNAME} your profile is not being viewed & contacted by other Jeevansathi members as it does not have a photo. Email photo to photos@jeevansathi.com');
INSERT INTO `SMS_TYPE` VALUES (65, 'ADD_PHOTO_OFFLINE', 'SAT', 69, 'E1,E2,F,P', 'A', 'SINGLE', 7, 0, 'SERVICE', 'Y', 'Ur profile {USERNAME} is being ignored by Jeevansathi members as it doesnt have a photo. Courier it to {SALES_ADDRESS_NOIDA}. Write your phone-No on photo');
INSERT INTO `SMS_TYPE` VALUES (66, 'EOI_WEEKLY', 'SAT', 43.5, 'A', 'A', 'SINGLE', 7, 0, 'SERVICE', 'Y', 'Jeevansathi member {AGE}yrs, {HEIGHT}, {CASTE}, {EDU_LEVEL}, {INCOME}, {CITY_RES} has liked your profile. Click {URL_PROFILE} or call {TOLLNO}.');
INSERT INTO `SMS_TYPE` VALUES (67, 'EOI_WEEKLY', 'SAT', 43.5, 'A', 'A', 'MUL', 7, 0, 'SERVICE', 'Y', 'This week {EOI_COUNT} Jeevansathi members have liked your profile. To see all click {URL_EOI} Or call {TOLLNO}.');
INSERT INTO `SMS_TYPE` VALUES (68, 'ACCEPT_WEEKLY', 'SAT', 40, 'A', 'A', 'MUL', 7, 0, 'SERVICE', 'Y', 'This week {ACCEPT_COUNT} Jeevansathi members have liked ur profile/Accepted ur Expression of Interest. To see all click {URL_ACCEPT}');
INSERT INTO `SMS_TYPE` VALUES (69, 'ADD_PHOTO_OFFLINE', 'SUN', 69, 'E1,E2,F,P', 'A', 'SINGLE', 150, 0, 'SERVICE', 'Y', '{USERNAME} on Jeevansathi is being ignored as no photo is there. Put photo in an envelope & write Free Post -201951 & post it. No Stamps to be put. Write Phone-No.');
INSERT INTO `SMS_TYPE` VALUES (70, 'PHOTO_REQ_WEEK', 'MON', 50, 'E1,E2,F,P', 'A', 'SINGLE', 7, 0, 'SERVICE', 'Y', '{PHOTO_REQUEST_COUNT} member on Jeevansathi.com has requested you for your photo. Login to Jeevansathi.com & upload photos or email with profile id to photos@jeevansathi.com');
INSERT INTO `SMS_TYPE` VALUES (71, 'PHOTO_REQ_OFF_WEEK', 'WED', 50, 'E1,E2,F,P', 'A', 'SINGLE', 150, 0, 'SERVICE', 'Y', '{PHOTO_REQUEST_COUNT} Jeevansathi member wants to see your son/daughters photo. Courier to {SALES_ADDRESS_NOIDA}. Write your phone number or profile ID on the photo.');
INSERT INTO `SMS_TYPE` VALUES (72, 'PHOTO_REQ_OFF_WEEK', 'FRI', 50, 'E1,E2,F,P', 'A', 'SINGLE', 150, 0, 'SERVICE', 'Y', '{PHOTO_REQUEST_COUNT} Jeevansathi member wants to see ur profiles photo. Just write "Free Post -201951" on any envelope & post it. No Stamps to be put. Write ur Phone-No on photo');
INSERT INTO `SMS_TYPE` VALUES (73, 'ACCEPT', 'D', 38, 'P', 'A', 'SINGLE', 1, 0, 'SERVICE', 'Y', 'Jeevansathi member-{AGE}yrs,{HEIGHT},{INCOME},{CASTE},{EDU_LEVEL},{OCCUPATION} in {CITY_RES} has Accepted ur Expression of Interest. Click {URL_ACCEPT}');
INSERT INTO `SMS_TYPE` VALUES (74, 'ACCEPT_WEEKLY', 'SAT', 40, 'A', 'A', 'SINGLE', 7, 0, 'SERVICE', 'Y', 'This week {ACCEPT_COUNT} Jeevansathi member has liked ur profile/Accepted ur Expression of Interest. To see all click {URL_ACCEPT}');
INSERT INTO `SMS_TYPE` VALUES (79, 'EOI_REMINDER', 'D', 46, 'F,E1,E2,E3,E4,E5,C1,C2,C3,D1,D2,D3,D4', 'F', 'SINGLE', 1, 0, 'SERVICE', 'Y', 'Jeevansathi member {AGE}yrs,{HEIGHT}, {MTONGUE}, {CASTE}, {EDU_LEVEL} in {CITY_RES} has liked your profile. Click {URL_PROFILE} or call {TOLLNO}.');
INSERT INTO `SMS_TYPE` VALUES (80, 'EOI_REMINDER', 'D', 46, 'F,E1,E2,E3,E4,E5,C1,C2,C3,D1,D2,D3,D4', 'M', 'SINGLE', 1, 0, 'SERVICE', 'Y', 'Jeevansathi member {AGE}yrs,{HEIGHT}, {MTONGUE}, {EDU_LEVEL}, {INCOME}, {CITY_RES} has liked your profile. Click {URL_PROFILE} or call {TOLLNO}.');
INSERT INTO `SMS_TYPE` VALUES (81, 'EOI_REMINDER', 'D', 46, 'P', 'A', 'SINGLE', 1, 0, 'SERVICE', 'N', 'Jeevansathi member {AGE} yrs, {HEIGHT}, {CASTE}, {EDU_LEVEL}, {INCOME}, {OCCUPATION} has liked your profile. Click {URL_EOI} & accept to see contact info');
INSERT INTO `SMS_TYPE` VALUES (82, 'EOI_REMINDER', 'D', 46, 'P', 'A', 'MUL', 1, 0, 'SERVICE', 'N', '{EOI_COUNT} Jeevansathi members contacted you again-{AGE}yrs, {CASTE} , {EDU_LEVEL}, {INCOME}, {URL_PROFILE} To see all click {URL_EOI}');
INSERT INTO `SMS_TYPE` VALUES (83, 'EOI_REMINDER', 'D', 46, 'F,E1,E2,E3,E4,E5,C1,C2,C3,D1,D2,D3,D4', 'F', 'MUL', 1, 0, 'SERVICE', 'Y', '{EOI_COUNT} Jeevansathi members contacted you again-{AGE} yrs,{HEIGHT},{WEIGHT} - {URL_PROFILE} To see all click {URL_EOI} Call {TOLLNO}');
INSERT INTO `SMS_TYPE` VALUES (84, 'EOI_REMINDER', 'D', 46, 'F,E1,E2,E3,E4,E5,C1,C2,C3,D1,D2,D3,D4', 'M', 'MUL', 1, 0, 'SERVICE', 'Y', '{EOI_COUNT} Jeevansathi members contacted you again-{AGE} yrs,{HEIGHT},{INCOME} - {URL_PROFILE} To see all click {URL_EOI} Call {TOLLNO}.');
INSERT INTO `SMS_TYPE` VALUES (85, 'MATCH_ALERT', 'D', 102, 'P', 'F', 'SINGLE', 30, 0, 'SERVICE', 'Y', 'Match of the Day-{AGE} yrs,{HEIGHT},{CASTE},{OWN_HOUSE}{CITY_RES},{EDU_LEVEL},{INCOME},{OCCUPATION}{COMPANY}. Click {URL_PROFILE} to contact');
INSERT INTO `SMS_TYPE` VALUES (86, 'MATCH_ALERT', 'D', 102, 'E1,E2,E3,E5,F', 'F', 'SINGLE', 30, 0, 'SERVICE', 'Y', 'Match of the Day-{AGE} yrs,{HEIGHT},{CASTE},{OWN_HOUSE}{CITY_RES},{EDU_LEVEL},{INCOME},{OCCUPATION}{COMPANY}. Click {URL_PROFILE} /Call:{TOLLNO}');
INSERT INTO `SMS_TYPE` VALUES (87, 'MATCH_ALERT', 'D', 102, 'P', 'F', 'SINGLE', 30, 1, 'SERVICE', 'Y', 'Match of the Day-{AGE} yrs,{CASTE},{OWN_HOUSE}{CITY_RES},{FAMILY_INCOME},{OCCUPATION}{COMPANY}. Click {URL_PROFILE} to contact');
INSERT INTO `SMS_TYPE` VALUES (88, 'MATCH_ALERT', 'D', 102, 'E1,E2,E3,E5,F', 'F', 'SINGLE', 30, 1, 'SERVICE', 'Y', 'Match of the Day-{AGE} yrs,{HEIGHT}{CASTE},{OWN_HOUSE}{CITY_RES},{FAMILY_INCOME},{OCCUPATION} {COMPANY}. Click {URL_PROFILE} /CAll:{TOLLNO}');
INSERT INTO `SMS_TYPE` VALUES (89, 'PROFILE_APPROVE', 'I', 2, 'F,P', 'A', 'SINGLE', 0, 1, 'SERVICE', 'Y', 'Your Jeevansathi A/c Id is {USERNAME}. Contact profiles u like for FREE via "Express Interest". See {FRDDPP} profiles which match ur criteria- {URL_MATCH}');
INSERT INTO `SMS_TYPE` VALUES (90, 'PROFILE_APPROVE', 'I', 2, 'C1,C2', 'A', 'SINGLE', 0, 0, 'SERVICE', 'Y', 'Ur Jeevansathi.com profile {USERNAME} is now live Password:{PASSWORD} To see phone/email of profiles for FREE, Add photo/email it to {PHOTO_EMAIL_ID} T&C App');
INSERT INTO `SMS_TYPE` VALUES (92, 'PROFILE_APPROVE', 'I', 2, 'C3', 'A', 'SINGLE', 0, 0, 'SERVICE', 'Y', 'Your Jeevansathi.com profile {USERNAME} is now live. Password:{PASSWORD}. Send "{VERIFY_CODE}" to {VALUEFRSTNO} & see phone/email of profiles you like for FREE. T&C Apply');
INSERT INTO `SMS_TYPE` VALUES (93, 'PROFILE_APPROVE', 'I', 2, 'D1', 'A', 'SINGLE', 0, 0, 'SERVICE', 'Y', 'Your Jeevansathi A/c Id is {USERNAME}. Contact profiles u like for FREE via "Express Interest". See {FRDDPP} profiles which match ur criteria- {URL_MATCH}');
INSERT INTO `SMS_TYPE` VALUES (94, 'PROFILE_APPROVE', 'I', 2, 'D2,D3,D4', 'A', 'SINGLE', 0, 0, 'SERVICE', 'Y', 'Your Jeevansathi.com profile {USERNAME} is now live. Password:{PASSWORD}. Express Interest in members u like to see their phone/email for FREE. T&C Apply');
INSERT INTO `SMS_TYPE` VALUES (95, 'PROFILE_APPROVE', 'I', 2, 'C1', 'A', 'SINGLE', 0, 1, 'SERVICE', 'Y', 'Ur Jeevansathi profile {USERNAME} is live. To see phone/email of profiles you like for FREE, add photo to profile/email to {PHOTO_EMAIL_ID} & verify phone. T&C apply');
INSERT INTO `SMS_TYPE` VALUES (96, 'PROFILE_APPROVE', 'I', 2, 'C2', 'A', 'SINGLE', 0, 1, 'SERVICE', 'Y', 'Ur Jeevansathi profile {USERNAME} is live. To see phone/email of profiles you like for FREE, email ur photo to {PHOTO_EMAIL_ID} or upload directly on site. T&C apply');
INSERT INTO `SMS_TYPE` VALUES (97, 'PROFILE_APPROVE', 'I', 2, 'C3', 'A', 'SINGLE', 0, 1, 'SERVICE', 'Y', 'Your Jeevansathi.com profile {USERNAME} is live on site. To see phone/email of profiles you like for FREE, verify phone by SMSing "{VERIFY_CODE}" to {VALUEFRSTNO}. T&C Apply');
INSERT INTO `SMS_TYPE` VALUES (98, 'PROFILE_APPROVE', 'I', 2, 'D1', 'A', 'SINGLE', 0, 1, 'SERVICE', 'Y', 'Your Jeevansathi A/c Id is {USERNAME}. Contact profiles u like for FREE via "Express Interest". See {FRDDPP} profiles which match ur criteria- {URL_MATCH}');
INSERT INTO `SMS_TYPE` VALUES (99, 'PROFILE_APPROVE', 'I', 2, 'D2,D3,D4', 'A', 'SINGLE', 0, 1, 'SERVICE', 'Y', 'Ur Jeevansathi profile is {USERNAME}. To find a partner Express Interest in atleast 40 members. See {FRDDPP} matches as per ur criteria- {URL_MATCH}');
INSERT INTO `SMS_TYPE` VALUES (100, 'MATCH_ALERT', 'D', 102, 'IU', 'A', 'SINGLE', 30, 0, 'SERVICE', 'Y', 'See Phone/Email of members you like for FREE. T&C Apply Match- {AGE}yrs, {INCOME} in {CITY_RES}. To contact complete profile on Jeevansathi.com/call {TOLLNO}');
INSERT INTO `SMS_TYPE` VALUES (101, 'MATCH_ALERT', 'D', 35, 'C1', 'F', 'SINGLE', 30, 0, 'SERVICE', 'Y', 'See Phone/Email for FREE- {AGE}yrs, {HEIGHT},{INCOME},{OCCUPATION}. {URL_PROFILE} To do so Verify Phone & Add Photo/Email to {PHOTO_EMAIL_ID} by {FTO_EXPIRY_DATE}. T&C App');
INSERT INTO `SMS_TYPE` VALUES (102, 'MATCH_ALERT', 'D', 35, 'C2', 'F', 'SINGLE', 30, 0, 'SERVICE', 'Y', 'See Phone/Email for FREE- {AGE}yrs, {HEIGHT},{INCOME},{OCCUPATION}. {URL_PROFILE} To do so Upload your Photo/Email it to {PHOTO_EMAIL_ID} by {FTO_EXPIRY_DATE}. T&C Apply');
INSERT INTO `SMS_TYPE` VALUES (103, 'MATCH_ALERT', 'D', 35, 'C1', 'M', 'SINGLE', 30, 0, 'SERVICE', 'Y', 'See Phone/Email for FREE-{AGE}yrs, {HEIGHT},{EDU_LEVEL},{OCCUPATION}- {URL_PROFILE} To do so Verify Phone & Add Photo/Email to {PHOTO_EMAIL_ID} by {FTO_EXPIRY_DATE}. T&C App');
INSERT INTO `SMS_TYPE` VALUES (104, 'MATCH_ALERT', 'D', 35, 'C2', 'M', 'SINGLE', 30, 0, 'SERVICE', 'Y', 'See Phone/Email for FREE- {AGE}yrs, {HEIGHT},{EDU_LEVEL},{CITY_RES},{OCCUPATION}. {URL_PROFILE}.To do so Upload yr Photo/Email it to . {PHOTO_EMAIL_ID} by {FTO_EXPIRY_DATE}. T&C Apply');
INSERT INTO `SMS_TYPE` VALUES (105, 'MATCH_ALERT', 'D', 35, 'C3', 'F', 'SINGLE', 30, 0, 'SERVICE', 'Y', 'See Phone/Email for FREE-{AGE}yrs, {HEIGHT},{INCOME},{OCCUPATION}. {URL_PROFILE} To do so verify phone - SMS "{VERIFY_CODE}" to {VALUEFRSTNO} by {FTO_EXPIRY_DATE}. T&C Apply');
INSERT INTO `SMS_TYPE` VALUES (106, 'MATCH_ALERT', 'D', 35, 'C3', 'M', 'SINGLE', 30, 0, 'SERVICE', 'Y', 'See Phone/Email for FREE-{AGE}yrs, {HEIGHT},{EDU_LEVEL}, {OCCUPATION}. {URL_PROFILE}.To do so verify phone - SMS "{VERIFY_CODE}" to {VALUEFRSTNO} by {FTO_EXPIRY_DATE}. T&C Apply');
INSERT INTO `SMS_TYPE` VALUES (107, 'MATCH_ALERT', 'D', 40, 'D1', 'M', 'SINGLE', 30, 0, 'SERVICE', 'Y', 'See Phone/Email for FREE. {AGE}yrs, {HEIGHT},{CASTE}, {CITY_RES}, {EDU_LEVEL}. Visit {URL_PROFILE} and click on EXPRESS INTEREST button. T&C Apply');
INSERT INTO `SMS_TYPE` VALUES (108, 'MATCH_ALERT', 'D', 40, 'D1', 'F', 'SINGLE', 30, 0, 'SERVICE', 'Y', 'See Phone/Email for FREE.{AGE}yrs, {HEIGHT}, {OWN_HOUSE}, {CITY_RES}, {INCOME}, {OCCUPATION}. To EXPRESS INTEREST visit {URL_PROFILE} Click on EXPRESS INTEREST button. T&C Apply');
INSERT INTO `SMS_TYPE` VALUES (109, 'MATCH_ALERT', 'D', 40, 'D2', 'M', 'SINGLE', 30, 0, 'SERVICE', 'Y', 'Todays Match-{AGE}yrs, {HEIGHT},{CASTE}, {CITY_RES}, {EDU_LEVEL}, {OCCUPATION}.See Phone/Email for FREE on Accept. To EXPRESS INTEREST-{URL_PROFILE} T&C');
INSERT INTO `SMS_TYPE` VALUES (110, 'MATCH_ALERT', 'D', 40, 'D2', 'F', 'SINGLE', 30, 0, 'SERVICE', 'Y', 'Todays Match-{AGE}yrs, {HEIGHT}, {OWN_HOUSE}, {CITY_RES}, {INCOME}, {OCCUPATION}. See Phone/Email for FREE on Accept. To EXPRESS INTEREST-{URL_PROFILE} T&C');
INSERT INTO `SMS_TYPE` VALUES (111, 'MATCH_ALERT', 'D', 40, 'D3,D4,E4', 'M', 'SINGLE', 30, 0, 'SERVICE', 'Y', 'Match of the day-{AGE}yrs, {HEIGHT},{CASTE}, {CITY_RES}, {EDU_LEVEL}, {OCCUPATION}.See Phone/Email for FREE. To EXPRESS INTEREST-{URL_PROFILE} T&C Apply');
INSERT INTO `SMS_TYPE` VALUES (112, 'MATCH_ALERT', 'D', 40, 'D3,D4,E4', 'F', 'SINGLE', 30, 0, 'SERVICE', 'Y', 'Match of the Day-{AGE}yrs, {HEIGHT}, {OWN_HOUSE}, {CITY_RES}, {INCOME}, {OCCUPATION}.See Phone/Email for FREE. To EXPRESS INTEREST- {URL_PROFILE} T&C Apply');
INSERT INTO `SMS_TYPE` VALUES (114, 'PHOTO_REQUEST', 'D', 12, 'C1', 'A', 'SINGLE', 1, 0, 'SERVICE', 'Y', 'Jeevansathi profile {OTHER_USERNAME} wants to see your photo. Upload photo/ email it to {PHOTO_EMAIL_ID}. Also verify phone & get FREE TRIAL OFFER worth Rs.1100/- T&C Apply');
INSERT INTO `SMS_TYPE` VALUES (115, 'PHOTO_REQUEST', 'D', 12, 'C1', 'A', 'MUL', 1, 0, 'SERVICE', 'Y', '{PHOTO_REQUEST_COUNT} Jeevansathi members want to see your photo. See phone/email of profiles u like for FREE if u verify phone, upload photo/ email it to {PHOTO_EMAIL_ID}. T&C Apply');
INSERT INTO `SMS_TYPE` VALUES (116, 'PHOTO_REQUEST', 'D', 12, 'C2', 'A', 'SINGLE', 1, 0, 'SERVICE', 'Y', 'Jeevansathi profile {OTHER_USERNAME} wants to see your photo. Add photo/email to {PHOTO_EMAIL_ID}. You get TRIAL OFFER of Rs.1100 & u can see phone of profiles for FREE. T&C');
INSERT INTO `SMS_TYPE` VALUES (117, 'PHOTO_REQUEST', 'D', 12, 'C2', 'A', 'MUL', 1, 0, 'SERVICE', 'Y', '{PHOTO_REQUEST_COUNT} Jeevansathi members want to see ur photo. See phone/email of profiles you like for FREE if you upload photo/ email it to {PHOTO_EMAIL_ID}. Last Day {FTO_EXPIRY_DATE}.T&C');
INSERT INTO `SMS_TYPE` VALUES (118, 'ADD_PHOTO_FTO_REMIND', 'D', 16, 'C1', 'A', 'SINGLE', 1, 0, 'SERVICE', 'Y', 'See phone/email of profiles u like for FREE by taking Free Trial Offer. To do so Verify Phone & Upload Photo/Email to {PHOTO_EMAIL_ID} before {FTO_EXPIRY_DATE}. T&C apply ');
INSERT INTO `SMS_TYPE` VALUES (119, 'ADD_PHOTO_FTO_REMIND', 'D', 16, 'C1', 'A', 'SINGLE', 1, 1, 'SERVICE', 'Y', 'See phone/email of profiles you like for FREE. Upload photo & verify phone before {FTO_EXPIRY_DATE} & get Jeevansathi Free Trial. Email photo to {PHOTO_EMAIL_ID} T&C Apply ');
INSERT INTO `SMS_TYPE` VALUES (120, 'ADD_PHOTO_FTO_REMIND', 'D', 3, 'C1', 'A', 'SINGLE', 1, 2, 'SERVICE', 'Y', 'Last Day to get Jeevansathi FREE Trial Offer. See phone/email of profiles for FREE. To get verify phone & Upload/email photo now. Send to {PHOTO_EMAIL_ID} T&C Apply ');
INSERT INTO `SMS_TYPE` VALUES (121, 'ADD_PHOTO_FTO_REMIND', 'D', 16, 'C2', 'A', 'SINGLE', 1, 0, 'SERVICE', 'Y', 'See phone/email of profiles you like for free by taking Free Trial Offer. To do so Upload photo on website or email to {PHOTO_EMAIL_ID} before {FTO_EXPIRY_DATE}. T&C Apply ');
INSERT INTO `SMS_TYPE` VALUES (122, 'ADD_PHOTO_FTO_REMIND', 'D', 16, 'C2', 'A', 'SINGLE', 1, 1, 'SERVICE', 'Y', 'See phone/email of profiles you like for FREE. Upload photo before {FTO_EXPIRY_DATE} to get Jeevansathi Free Trial Offer. Email photo to {PHOTO_EMAIL_ID} T&C Apply. ');
INSERT INTO `SMS_TYPE` VALUES (123, 'ADD_PHOTO_FTO_REMIND', 'D', 3, 'C2', 'A', 'SINGLE', 1, 2, 'SERVICE', 'Y', 'Last Day to get Jeevansathi FREE Trial Offer. See phone/email of profiles you like for FREE. To avail Upload/email photo now. Send to {PHOTO_EMAIL_ID} T&C Apply ');
INSERT INTO `SMS_TYPE` VALUES (127, 'MOVEMENT_TO_E2', 'D', 80, 'C1,C2,C3,D1,D2,D3,D4,E3,E4,E5', 'A', 'SINGLE', 1, 0, 'SERVICE', 'Y', 'Ur Jeevansathi Free Trial Offer expires today. As a free member u can continue to EXPRESS INTEREST & send/receive accepts. See matches- {URL_MATCH}');
INSERT INTO `SMS_TYPE` VALUES (140, 'PHONE_VERIFY', 'I', 4, 'C2', 'A', 'SINGLE', 0, 0, 'SERVICE', 'Y', 'Ur phone is verified on Jeevansathi. See phone/email of profiles you like for FREE by uploading photo before {FTO_EXPIRY_DATE}. Or mail photo to {PHOTO_EMAIL_ID}. T&C apply');
INSERT INTO `SMS_TYPE` VALUES (141, 'PHONE_VERIFY', 'I', 3, 'D1', 'A', 'SINGLE', 0, 0, 'SERVICE', 'Y', 'Phone verified on Jeevansathi. See phone/email of profiles u like for FREE. Click EXPRESS INTEREST button on them. Matches- {URL_MATCH} T&C Apply');
INSERT INTO `SMS_TYPE` VALUES (142, 'PHONE_VERIFY', 'I', 3, 'D2,D3', 'A', 'SINGLE', 0, 0, 'SERVICE', 'Y', 'Phone verified on Jeevansathi. See phone/email of profiles for FREE. T&C. People find a match on EXPRESS INTEREST in 40+ profiles. View- {URL_MATCH}');
INSERT INTO `SMS_TYPE` VALUES (143, 'PHOTO_APPROVE', 'I', 30, 'C3', 'A', 'SINGLE', 0, 0, 'SERVICE', 'Y', 'Your photo is now live on Jeevansathi. com. See phone/email of profiles you like for free by Verifing phone before {FTO_EXPIRY_DATE}. SMS "{VERIFY_CODE}" to {VALUEFRSTNO}. T&C apply');
INSERT INTO `SMS_TYPE` VALUES (144, 'PHOTO_APPROVE', 'I', 30, 'D1', 'A', 'SINGLE', 0, 0, 'SERVICE', 'Y', 'Your photo is live on Jeevansathi. See phone/email for FREE press "EXPRESS INTEREST" button on all profiles you like- {URL_MATCH} T&C Apply');
INSERT INTO `SMS_TYPE` VALUES (145, 'PHOTO_APPROVE', 'I', 41, 'D2,D3,D4', 'A', 'SINGLE', 0, 0, 'SERVICE', 'Y', 'Your photo is now live on Jeevansathi. Enjoy FREE TRIAL OFFER. To see phone/email for free, EXPRESS INTEREST in ALL profiles you like-{URL_MATCH}');
INSERT INTO `SMS_TYPE` VALUES (146, 'INCOMPLETE', 'D', 2, 'A', 'A', 'SINGLE', 0, 0, 'SERVICE', 'Y', 'Ur profile is "Incomplete" on Jeevansathi. Complete it & see Phone/Email of profiles u like for FREE. Hurry limited period Offer. Call {TOLLNO}. T&C Apply');
INSERT INTO `SMS_TYPE` VALUES (147, 'PHONE_VERIFY', 'D', 15, 'C3', 'A', 'SINGLE', 0, 0, 'SERVICE', 'Y', 'See phone/email of profiles you like for free by taking Jeevansathi FREE TRAIL OFFER. Just Verify phone before {FTO_EXPIRY_DATE} by SMSing "{VERIFY_CODE}" to {VALUEFRSTNO}. T&C Apply');
INSERT INTO `SMS_TYPE` VALUES (148, 'PHONE_VERIFY', 'D', 15, 'C3', 'A', 'SINGLE', 0, 1, 'SERVICE', 'Y', 'See phone/email of profiles you like for FREE. SMS "{VERIFY_CODE}" to {VALUEFRSTNO} before {FTO_EXPIRY_DATE} to get Jeevansathi Free Trial Offer. T&C Apply.');
INSERT INTO `SMS_TYPE` VALUES (149, 'PHONE_VERIFY', 'D', 5, 'C3', 'A', 'SINGLE', 0, 2, 'SERVICE', 'Y', 'See phone/email of profiles you like for FREE. Last Day today to get Jeevansathi Free Trial Offer. SMS "{VERIFY_CODE}" to {VALUEFRSTNO} now to avail offer. T&C Apply.');
INSERT INTO `SMS_TYPE` VALUES (150, 'REMINDER_SENDING_EOI', 'D', 42, 'D2,D3', 'A', 'SINGLE', 1, 0, 'SERVICE', 'Y', 'Ur Jeevansathi Free Trial ends on {FTO_EXPIRY_DATE}. Most people EXPRESS INTEREST in about 40 members to find a suitable match. Hurry See matches- {URL_MATCH} ');
INSERT INTO `SMS_TYPE` VALUES (151, 'ACCEPT', 'D', 5, 'C1,C2', 'M', 'SINGLE', 1, 0, 'SERVICE', 'Y', 'Jeevansathi member-{AGE}yrs,{EDU_LEVEL}, {CITY_RES} has Accepted ur Interest. To see her phone/email for FREE -Add photo/email to {PHOTO_EMAIL_ID} before {FTO_EXPIRY_DATE}. T&C App');
INSERT INTO `SMS_TYPE` VALUES (152, 'ACCEPT', 'D', 5, 'C1,C2', 'F', 'SINGLE', 1, 0, 'SERVICE', 'Y', 'Jeevansathi member-{AGE}yrs,{INCOME}, {OCCUPATION} has Accepted ur Interest. To see his phone/email for FREE -Add photo/email to {PHOTO_EMAIL_ID} before {FTO_EXPIRY_DATE}. T&C Apply');
INSERT INTO `SMS_TYPE` VALUES (153, 'ACCEPT', 'D', 5, 'C3', 'M', 'SINGLE', 1, 0, 'SERVICE', 'Y', 'Jeevansathi member-{AGE}yrs,{EDU_LEVEL},{OCCUPATION},{CITY_RES} has Accepted ur Interest To see her phone/email for FREE-Verify by SMSing "{VERIFY_CODE}" to {VALUEFRSTNO}. T&C Apply');
INSERT INTO `SMS_TYPE` VALUES (154, 'ACCEPT', 'D', 5, 'C3', 'F', 'SINGLE', 1, 0, 'SERVICE', 'Y', 'Jeevansathi member-{AGE}yrs,{INCOME},{EDU_LEVEL},{OCCUPATION} has Accepted ur Interest. To see his phone/email for FREE-Verify by SMSing "{VERIFY_CODE}" to {VALUEFRSTNO}. T&C Apply');
INSERT INTO `SMS_TYPE` VALUES (155, 'ACCEPT', 'D', 5, 'D2,D3,D4,E4', 'M', 'SINGLE', 1, 0, 'SERVICE', 'Y', 'Jeevansathi member-{AGE}yrs,{HEIGHT},{WEIGHT},{EDU_LEVEL},{OCCUPATION},{CITY_RES} has Accepted ur Interest. See phone/email for FREE at {URL_PROFILE} T&C Apply');
INSERT INTO `SMS_TYPE` VALUES (156, 'ACCEPT', 'D', 5, 'D2,D3,D4,E4', 'F', 'SINGLE', 1, 0, 'SERVICE', 'Y', 'Jeevansathi member-{AGE}yrs,{INCOME},{EDU_LEVEL},{OCCUPATION} in {CITY_RES} has Accepted ur Interest. See phone/email for FREE at {URL_PROFILE} T&C Apply');
INSERT INTO `SMS_TYPE` VALUES (157, 'MATCH_ALERT', 'D', 102, 'P', 'M', 'SINGLE', 30, 0, 'SERVICE', 'Y', 'Match of the Day- {AGE} yrs,{HEIGHT},{WEIGHT},{EDU_LEVEL},{CASTE},{MTONGUE},{CITY_RES},{INCOME},{OCCUPATION} in {COMPANY}. Click {URL_PROFILE} to contact');
INSERT INTO `SMS_TYPE` VALUES (158, 'MATCH_ALERT', 'D', 102, 'E1,E2,E3,E5,F', 'M', 'SINGLE', 30, 0, 'SERVICE', 'Y', 'Match of the Day-{AGE}yrs, {HEIGHT}, {WEIGHT}, {CASTE}, {MTONGUE}, {OCCUPATION} in {CITY_RES}. Click {URL_PROFILE} /Call:{TOLLNO}');
INSERT INTO `SMS_TYPE` VALUES (159, 'MATCH_ALERT', 'D', 102, 'P', 'M', 'SINGLE', 30, 1, 'SERVICE', 'Y', 'Match of the Day-{AGE}yrs,{HEIGHT}, {FAMILY_INCOME}, {EDU_LEVEL}, {CASTE}, {MTONGUE}, {CITY_RES},{OCCUPATION} in {COMPANY}. Click {URL_PROFILE} to contact');
INSERT INTO `SMS_TYPE` VALUES (160, 'MATCH_ALERT', 'D', 102, 'E1,E2,E3,E5,F', 'M', 'SINGLE', 30, 1, 'SERVICE', 'Y', 'Match of the Day-{AGE}yrs, {HEIGHT}, {FAMILY_INCOME}, {EDU_LEVEL}, {CASTE}, {OCCUPATION} in {CITY_RES}. Click {URL_PROFILE} /Call:{TOLLNO}');

ALTER TABLE  `SMS_TEMP_TABLE` ADD  `FTO_SUB_STATE` VARCHAR( 2 ) NOT NULL ,
ADD  `FTO_ENTRY_DATE` DATETIME NOT NULL ,
ADD  `FTO_EXPIRY_DATE` DATETIME NOT NULL ,
ADD  `INCOMPLETE` VARCHAR( 1 ) NOT NULL,
ADD  `ACTIVATED` VARCHAR( 1 ) NOT NULL,
ADD `LANDL_STATUS` VARCHAR( 1 ) NOT NULL;

ALTER TABLE  `SMS_TEMP_TABLE` ADD INDEX (  `FTO_SUB_STATE` ,  `FTO_ENTRY_DATE` ,  `FTO_EXPIRY_DATE` ) ;

ALTER TABLE `TEMP_SMS_DETAIL` AND `MUL_SMS` VARCHAR (1)  NOT NULL;
