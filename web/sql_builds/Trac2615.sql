use newjs;

CREATE TABLE `CONTACT_MAILERS_NEW` (
  `ID` tinyint(3) NOT NULL AUTO_INCREMENT,
  `CITY` varchar(10) NOT NULL,
  `LOCALITY` varchar(50) NOT NULL,
  `AGENT` varchar(20) NOT NULL,
  `MOBILE` varchar(15) NOT NULL,
  `TIMES_SENT` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `CITY` (`CITY`)
) ENGINE=MyISAM AUTO_INCREMENT=72 DEFAULT CHARSET=latin1 AUTO_INCREMENT=72 ;

-- 
-- Dumping data for table `CONTACT_MAILERS_NEW`
-- 

INSERT INTO `CONTACT_MAILERS_NEW` VALUES (1, 'AP03', 'Begumpet', 'Shyam', '9971020046', 0);
INSERT INTO `CONTACT_MAILERS_NEW` VALUES (2, 'CH01', 'Raipur', 'Chetan', '9752091280', 0);
INSERT INTO `CONTACT_MAILERS_NEW` VALUES (3, 'GU01', 'CG Road', 'Rahul', '8511170744', 0);
INSERT INTO `CONTACT_MAILERS_NEW` VALUES (4, 'GU04', 'OP Road', 'Rahul', '8511170741', 0);
INSERT INTO `CONTACT_MAILERS_NEW` VALUES (5, 'JH02', 'Jamshedpur', 'Rahul', '9771490295', 0);
INSERT INTO `CONTACT_MAILERS_NEW` VALUES (6, 'MP02', 'Malviya nagar', 'Rahul', '9752091287', 0);
INSERT INTO `CONTACT_MAILERS_NEW` VALUES (7, 'MP08', 'MG Road', 'Rahul', '9752091284', 0);
INSERT INTO `CONTACT_MAILERS_NEW` VALUES (8, 'MH02', 'Jalna Road', 'Rahul', '7738399770', 0);
INSERT INTO `CONTACT_MAILERS_NEW` VALUES (9, 'MH04', 'Andheri-W', 'Ravindra', '7738399761', 0);
INSERT INTO `CONTACT_MAILERS_NEW` VALUES (10, 'MH04', 'Andheri-W', 'Rahul', '7738399759', 0);
INSERT INTO `CONTACT_MAILERS_NEW` VALUES (11, 'MH04', 'Borivali-W', 'Bhushan', '7738399754', 0);
INSERT INTO `CONTACT_MAILERS_NEW` VALUES (12, 'MH04', 'Borivali-W', 'Rahul', '7738399755', 0);
INSERT INTO `CONTACT_MAILERS_NEW` VALUES (13, 'MH04', 'Mulund W', 'Rahul', '7738399751', 0);
INSERT INTO `CONTACT_MAILERS_NEW` VALUES (14, 'MH04', 'Thane(W)', 'Rahul', '7738399753', 0);
INSERT INTO `CONTACT_MAILERS_NEW` VALUES (15, 'MH04', 'Vashi', 'Rahul', '7738399763', 0);
INSERT INTO `CONTACT_MAILERS_NEW` VALUES (16, 'MH04', 'Worli', 'Rahul', '7738399762', 0);
INSERT INTO `CONTACT_MAILERS_NEW` VALUES (17, 'MH04', 'Chembur', 'Shailendra', '7738399756', 0);
INSERT INTO `CONTACT_MAILERS_NEW` VALUES (18, 'MH04', 'Mulund W', 'Rahul', '7738399752', 0);
INSERT INTO `CONTACT_MAILERS_NEW` VALUES (19, 'MH05', 'Sadar', 'Rahul', '7738399771', 0);
INSERT INTO `CONTACT_MAILERS_NEW` VALUES (20, 'MH24', 'College Road', 'Shreyas', '7738399773', 0);
INSERT INTO `CONTACT_MAILERS_NEW` VALUES (21, 'MH08', 'Deccan', 'Rahul', '7738399764', 0);
INSERT INTO `CONTACT_MAILERS_NEW` VALUES (22, 'MH08', 'Deccan', 'Rahul', '7738399766', 0);
INSERT INTO `CONTACT_MAILERS_NEW` VALUES (23, 'MH08', 'Deccan', 'Rahul', '7738399769', 0);
INSERT INTO `CONTACT_MAILERS_NEW` VALUES (24, 'MH08', 'Deccan', 'Pranav', '7738399767', 0);
INSERT INTO `CONTACT_MAILERS_NEW` VALUES (25, 'MH08', 'Koregaon Park', 'Rahul', '7738399768', 0);
INSERT INTO `CONTACT_MAILERS_NEW` VALUES (26, 'TN02', 'Nugambakkam ', 'Rahul', '9940688246', 0);
INSERT INTO `CONTACT_MAILERS_NEW` VALUES (27, 'WB05', 'Gariahat ', 'Rahul', '9163375809', 0);
INSERT INTO `CONTACT_MAILERS_NEW` VALUES (28, 'WB05', 'AJC Bose', 'Rahul', '9163379809', 0);
INSERT INTO `CONTACT_MAILERS_NEW` VALUES (29, 'KA02', 'Manipal Centre', 'Pranesh', '7259031517', 0);
INSERT INTO `CONTACT_MAILERS_NEW` VALUES (30, 'BI06', 'Sri Krishna puri', 'Kishor', '9771490294', 0);
INSERT INTO `CONTACT_MAILERS_NEW` VALUES (31, 'CH03', 'Bilaspur', 'Rahul', '9971008762', 0);
INSERT INTO `CONTACT_MAILERS_NEW` VALUES (32, 'JH04', 'Bokaro', 'Rajatnath', '9031035670', 0);
INSERT INTO `CONTACT_MAILERS_NEW` VALUES (33, 'MP09', 'Narbada Road', 'Rishin', '9752091283', 0);
INSERT INTO `CONTACT_MAILERS_NEW` VALUES (34, 'MP11', 'Ujjain', 'Gamendra', '9074766203', 0);
INSERT INTO `CONTACT_MAILERS_NEW` VALUES (35, 'CH04', 'Bhilai', 'Rahul', '8253022977', 0);
INSERT INTO `CONTACT_MAILERS_NEW` VALUES (36, 'DE00', 'Laxmi Nagar', 'Rahul', '8860321523', 0);
INSERT INTO `CONTACT_MAILERS_NEW` VALUES (37, 'DE00', 'Laxmi Nagar', 'Dushyant', '9971176314', 0);
INSERT INTO `CONTACT_MAILERS_NEW` VALUES (38, 'DE00', 'Nehru Place', 'Rahul', '9910006935', 0);
INSERT INTO `CONTACT_MAILERS_NEW` VALUES (39, 'DE00', 'Nehru Place', 'Shiv', '9910006341', 0);
INSERT INTO `CONTACT_MAILERS_NEW` VALUES (40, 'DE00', 'Pitampura', 'Rahul', '9971177324', 0);
INSERT INTO `CONTACT_MAILERS_NEW` VALUES (41, 'DE00', 'Pitampura', 'Rahul', '9910007594', 0);
INSERT INTO `CONTACT_MAILERS_NEW` VALUES (42, 'DE00', 'Laxmi Nagar', 'Rahul', '9971176433', 0);
INSERT INTO `CONTACT_MAILERS_NEW` VALUES (43, 'DE00', 'Kamla Nagar', 'Rahul', '9971176072', 0);
INSERT INTO `CONTACT_MAILERS_NEW` VALUES (44, 'DE00', 'Connaught Place ', 'Rahul', '9910482309', 0);
INSERT INTO `CONTACT_MAILERS_NEW` VALUES (45, 'DE00', 'Malviya Nagar', 'Rahul', '9910006538', 0);
INSERT INTO `CONTACT_MAILERS_NEW` VALUES (46, 'DE00', 'Malviya Nagar', 'Rahul', '9971175142', 0);
INSERT INTO `CONTACT_MAILERS_NEW` VALUES (47, 'DE00', 'Rajouri Garden', 'Rahul', '9910006735', 0);
INSERT INTO `CONTACT_MAILERS_NEW` VALUES (48, 'DE00', 'Rajouri Garden', 'Rahul', '9560885791', 0);
INSERT INTO `CONTACT_MAILERS_NEW` VALUES (49, 'DE00', 'Rajouri Garden', 'Sahil', '9971660808', 0);
INSERT INTO `CONTACT_MAILERS_NEW` VALUES (50, 'HA03', 'Gurgaon', 'Aayush', '9971550281', 0);
INSERT INTO `CONTACT_MAILERS_NEW` VALUES (51, 'HA03', 'Gurgaon', 'Ankush', '9971188239', 0);
INSERT INTO `CONTACT_MAILERS_NEW` VALUES (52, 'PU07', 'Ludhiana', 'Rahul', '9915018550', 0);
INSERT INTO `CONTACT_MAILERS_NEW` VALUES (53, 'RA07', 'Jaipur', 'Rahul', '9929607350', 0);
INSERT INTO `CONTACT_MAILERS_NEW` VALUES (54, 'UP01', 'Agra', 'Rahul', '7388807733', 0);
INSERT INTO `CONTACT_MAILERS_NEW` VALUES (55, 'UP18', 'Parade', 'Amit', '8853220055', 0);
INSERT INTO `CONTACT_MAILERS_NEW` VALUES (56, 'UP19', 'Lucknow', 'Rahul', '7388805533', 0);
INSERT INTO `CONTACT_MAILERS_NEW` VALUES (57, 'UK05', 'Dehradun', 'Rahul', '7388873003', 0);
INSERT INTO `CONTACT_MAILERS_NEW` VALUES (58, 'PH00', 'Chandigarh', 'Bhupender', '9915018427', 0);
INSERT INTO `CONTACT_MAILERS_NEW` VALUES (59, 'UP25', 'Noida', 'Rahul', '9910006927', 0);
INSERT INTO `CONTACT_MAILERS_NEW` VALUES (60, 'UP18', 'Parade', 'Kush', '8853220044', 0);
INSERT INTO `CONTACT_MAILERS_NEW` VALUES (61, 'UP21', 'Meerut', 'Rahul', '9910009327', 0);
INSERT INTO `CONTACT_MAILERS_NEW` VALUES (62, 'UP30', 'Varanasi', 'Deepak', '7388806633', 0);
INSERT INTO `CONTACT_MAILERS_NEW` VALUES (63, 'UP03', 'Allahabad', 'Rahul', '9026823355', 0);
INSERT INTO `CONTACT_MAILERS_NEW` VALUES (64, 'UP06', 'Bareilly', 'Dinesh', '9971177904', 0);
INSERT INTO `CONTACT_MAILERS_NEW` VALUES (65, 'PU08', 'Pathankot', 'Milan', '9910006728Â ', 0);
INSERT INTO `CONTACT_MAILERS_NEW` VALUES (66, 'PU10', 'Jalandhar', 'Rahul', '9915018482', 0);
INSERT INTO `CONTACT_MAILERS_NEW` VALUES (67, 'HA12', 'Yamuna Nagar', 'Ankit', '9971188602', 0);
INSERT INTO `CONTACT_MAILERS_NEW` VALUES (68, 'RA09', 'Kota', 'Gaurav', '9001896299', 0);
INSERT INTO `CONTACT_MAILERS_NEW` VALUES (69, 'UP12', 'Ghaziabad', 'Sourabh', '9971188452', 0);
INSERT INTO `CONTACT_MAILERS_NEW` VALUES (70, 'HA02', 'Faridabad', 'Rahul', '9716040111', 0);
INSERT INTO `CONTACT_MAILERS_NEW` VALUES (71, 'RA01', 'Ajmer', 'Kamal', '7891087786', 0);