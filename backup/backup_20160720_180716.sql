

CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_parent` int(11) DEFAULT '0',
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;


INSERT INTO category VALUES
("19","0","Quotidien"),
("20","19","Courses"),
("21","0","Revenu"),
("22","21","Salaire"),
("23","21","CAF"),
("25","0","Restaurant"),
("26","21","Maman"),
("27","0","Véhicule"),
("28","27","Essence");



CREATE TABLE `transaction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `amount` float(12,2) DEFAULT '0.00',
  `sign` int(1) DEFAULT '0',
  `date_add` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;


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
("19","1","20","Intermarché","28.96","0","2016-07-18 19:59:08");



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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;


INSERT INTO user VALUES
("1","louis@mywebshop.org","admin1234","2016-07-18 18:56:53");

