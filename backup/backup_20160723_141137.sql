DROP TABLE IF EXISTS `category`;
DROP TABLE IF EXISTS `transaction`;
DROP TABLE IF EXISTS `transaction_auto`;
DROP TABLE IF EXISTS `user`;


CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_parent` int(11) DEFAULT '0',
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;


INSERT INTO category VALUES
("19","0","Quotidien"),
("20","19","Courses"),
("21","0","Revenu"),
("22","21","Salaire"),
("25","0","Restaurant"),
("26","21","Maman"),
("27","0","Véhicule"),
("28","27","Essence"),
("30","0","To be determined"),
("31","19","Téléphone");



CREATE TABLE `transaction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `amount` float(12,2) DEFAULT '0.00',
  `sign` int(1) DEFAULT '0',
  `date_add` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;


INSERT INTO transaction VALUES
("3","1","25","Resto","21.00","0","2016-07-18 19:47:52"),
("4","1","22","Simit","529.20","1","2016-07-18 19:48:15"),
("5","1","20","Intermarché","30.00","0","2016-07-18 19:49:11"),
("6","1","26","Maman","300.00","1","2016-07-18 19:50:37"),
("7","1","28","Er6n","13.69","0","2016-07-18 19:51:51"),
("8","1","25","Macdo","7.80","0","2016-07-18 19:52:17"),
("9","1","25","Speedburger","14.30","0","2016-07-18 19:52:42"),
("10","1","28","Clio4","41.00","0","2016-07-18 19:53:33"),
("11","1","20","Boulangerie","4.20","0","2016-07-18 19:54:44"),
("12","1","25","Wokinbag","8.91","0","2016-07-18 19:55:13"),
("13","1","20","Intermarché","8.94","0","2016-07-18 19:55:30"),
("14","1","28","Er6n","10.73","0","2016-07-18 19:55:58"),
("15","1","25","Macdo","10.50","0","2016-07-18 19:56:24"),
("16","1","28","Er6n","11.14","0","2016-07-18 19:56:42"),
("17","1","25","Speedburger","13.50","0","2016-07-18 19:57:18"),
("18","1","20","Intermarché","15.54","0","2016-07-18 19:58:43"),
("19","1","20","Intermarché","28.96","0","2016-07-18 19:59:08"),
("20","1","31","SFR","15.00","0","2016-07-23 12:37:53"),
("21","1","25","Dominos","11.00","0","2016-07-23 12:39:07"),
("22","1","20","Intermarché","46.29","0","2016-07-23 12:39:26");



CREATE TABLE `transaction_auto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `amount` float(12,2) DEFAULT '0.00',
  `sign` int(1) DEFAULT '0',
  `date_execution` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;





CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `date_add` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;


INSERT INTO user VALUES
("1","louis@mywebshop.org","admin1234","2016-07-18 18:56:53"),
("2","azeaze","admin1234","2016-07-20 21:09:40"),
("3","louis@mywebshop.orgazeaz","admin1234","2016-07-20 21:09:59"),
("4","louis@mywebshop.orgzae","admin1234","2016-07-21 19:17:19"),
("5","louis@mywebshop.orgaz","admin1234","2016-07-21 19:24:01"),
("6","louis@mywebshop.orgaze","admin1234","2016-07-21 19:34:30"),
("7","louis@mywebshop.orgazeza","admin1234","2016-07-21 19:34:49"),
("8","louis@mywebshoep.org","admin1234","2016-07-21 19:34:53"),
("9","louis@mywebshop.orgza","admin1234","2016-07-21 19:39:12"),
("10","louis@mywebshop.azeorg","admin1234","2016-07-21 19:41:19"),
("11","rabinovitchlouis@gmze","admin1234","2016-07-21 20:24:37"),
("12","louis@mywebshop.orgz","admin1234","2016-07-21 20:25:31"),
("13","louis@mywebsqszhop.org","admin1234","2016-07-21 20:30:10"),
("14","Dryke","admin1234","2016-07-23 15:54:57");

