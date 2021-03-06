use scoring_new;

CREATE TABLE `PERCENTILE_NEW` (
  `MIN_PERCENTILE` tinyint(4) DEFAULT '0',
  `MAX_PERCENTILE` tinyint(4) DEFAULT '0',
  `MIN_SCORE` decimal(10,4) DEFAULT NULL,
  `MAX_SCORE` decimal(10,4) DEFAULT NULL,
  `TYPE` char(1) DEFAULT NULL
) ENGINE=MyISAM;

-- 
-- Dumping data for table `PERCENTILE_NEW`
-- 

INSERT INTO `PERCENTILE_NEW` (`MIN_PERCENTILE`, `MAX_PERCENTILE`, `MIN_SCORE`, `MAX_SCORE`, `TYPE`) VALUES (90, 100, 41.5754, 100.0000, 'R');
INSERT INTO `PERCENTILE_NEW` (`MIN_PERCENTILE`, `MAX_PERCENTILE`, `MIN_SCORE`, `MAX_SCORE`, `TYPE`) VALUES (80, 90, 29.5788, 41.5754, 'R');
INSERT INTO `PERCENTILE_NEW` (`MIN_PERCENTILE`, `MAX_PERCENTILE`, `MIN_SCORE`, `MAX_SCORE`, `TYPE`) VALUES (70, 80, 22.1124, 29.5788, 'R');
INSERT INTO `PERCENTILE_NEW` (`MIN_PERCENTILE`, `MAX_PERCENTILE`, `MIN_SCORE`, `MAX_SCORE`, `TYPE`) VALUES (60, 70, 18.3213, 22.1124, 'R');
INSERT INTO `PERCENTILE_NEW` (`MIN_PERCENTILE`, `MAX_PERCENTILE`, `MIN_SCORE`, `MAX_SCORE`, `TYPE`) VALUES (50, 60, 15.0613, 18.3213, 'R');
INSERT INTO `PERCENTILE_NEW` (`MIN_PERCENTILE`, `MAX_PERCENTILE`, `MIN_SCORE`, `MAX_SCORE`, `TYPE`) VALUES (40, 50, 12.0969, 15.0613, 'R');
INSERT INTO `PERCENTILE_NEW` (`MIN_PERCENTILE`, `MAX_PERCENTILE`, `MIN_SCORE`, `MAX_SCORE`, `TYPE`) VALUES (30, 40, 9.5655, 12.0969, 'R');
INSERT INTO `PERCENTILE_NEW` (`MIN_PERCENTILE`, `MAX_PERCENTILE`, `MIN_SCORE`, `MAX_SCORE`, `TYPE`) VALUES (20, 30, 7.2872, 9.5655, 'R');
INSERT INTO `PERCENTILE_NEW` (`MIN_PERCENTILE`, `MAX_PERCENTILE`, `MIN_SCORE`, `MAX_SCORE`, `TYPE`) VALUES (10, 20, 5.1503, 7.2872, 'R');
INSERT INTO `PERCENTILE_NEW` (`MIN_PERCENTILE`, `MAX_PERCENTILE`, `MIN_SCORE`, `MAX_SCORE`, `TYPE`) VALUES (0, 10, 0.0000, 5.1503, 'R');
INSERT INTO `PERCENTILE_NEW` (`MIN_PERCENTILE`, `MAX_PERCENTILE`, `MIN_SCORE`, `MAX_SCORE`, `TYPE`) VALUES (90, 100, 4.2308, 100.0000, 'F');
INSERT INTO `PERCENTILE_NEW` (`MIN_PERCENTILE`, `MAX_PERCENTILE`, `MIN_SCORE`, `MAX_SCORE`, `TYPE`) VALUES (80, 90, 2.2501, 4.2297, 'F');
INSERT INTO `PERCENTILE_NEW` (`MIN_PERCENTILE`, `MAX_PERCENTILE`, `MIN_SCORE`, `MAX_SCORE`, `TYPE`) VALUES (70, 80, 1.4897, 2.2500, 'F');
INSERT INTO `PERCENTILE_NEW` (`MIN_PERCENTILE`, `MAX_PERCENTILE`, `MIN_SCORE`, `MAX_SCORE`, `TYPE`) VALUES (60, 70, 1.0549, 1.4897, 'F');
INSERT INTO `PERCENTILE_NEW` (`MIN_PERCENTILE`, `MAX_PERCENTILE`, `MIN_SCORE`, `MAX_SCORE`, `TYPE`) VALUES (50, 60, 0.7748, 1.0549, 'F');
INSERT INTO `PERCENTILE_NEW` (`MIN_PERCENTILE`, `MAX_PERCENTILE`, `MIN_SCORE`, `MAX_SCORE`, `TYPE`) VALUES (40, 50, 0.5757, 0.7748, 'F');
INSERT INTO `PERCENTILE_NEW` (`MIN_PERCENTILE`, `MAX_PERCENTILE`, `MIN_SCORE`, `MAX_SCORE`, `TYPE`) VALUES (30, 40, 0.4226, 0.5756, 'F');
INSERT INTO `PERCENTILE_NEW` (`MIN_PERCENTILE`, `MAX_PERCENTILE`, `MIN_SCORE`, `MAX_SCORE`, `TYPE`) VALUES (20, 30, 0.2999, 0.4226, 'F');
INSERT INTO `PERCENTILE_NEW` (`MIN_PERCENTILE`, `MAX_PERCENTILE`, `MIN_SCORE`, `MAX_SCORE`, `TYPE`) VALUES (10, 20, 0.1911, 0.2999, 'F');
INSERT INTO `PERCENTILE_NEW` (`MIN_PERCENTILE`, `MAX_PERCENTILE`, `MIN_SCORE`, `MAX_SCORE`, `TYPE`) VALUES (0, 10, 0.0000, 0.1911, 'F');


