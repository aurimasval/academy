CREATE TABLE `pazymiai` (
                            `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
                            `value` int(10) unsigned NOT NULL,
                            `user_id` int(10) unsigned NOT NULL,
                            PRIMARY KEY (`id`),
                            KEY `pazymiai_FK` (`user_id`),
                            CONSTRAINT `pazymiai_FK` FOREIGN KEY (`user_id`) REFERENCES `vartotojai` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;


CREATE TABLE `vartotojai` (
                              `first_name` varchar(30) NOT NULL,
                              `last_name` varchar(30) NOT NULL,
                              `email` varchar(255) NOT NULL,
                              `date_register` datetime DEFAULT NULL,
                              `country` char(2) NOT NULL DEFAULT 'LT',
                              `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
                              PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;


INSERT INTO academy_test.vartotojai (first_name,last_name,email,date_register,country) VALUES
   ('Test','Testauskas','email@email.com',NULL,'LT'),
   ('Test2','Test3','email@email.com',NULL,'LT'),
   ('Bandymas','Bandymas2','email@email.com','2021-01-03 00:00:00','BY'),
   ('Bandymas1','Bandymas12','email1@email.com',NULL,'LT'),
   ('Bandymas1','Bandymas12','email1@email.com','2022-02-03 00:00:00','LT'),
   ('Bandymas1','Bandymas12','email1@email.com','2022-01-03 00:00:00','UA'),
   ('Bandymas1','Bandymas12','email1@email.com',NULL,'GB'),
   ('Bandymas1','Bandymas12','email1@email.com',NULL,'GB'),
   ('BE PAZIMIU','BE PAZIMIU','email1@email.com',NULL,'LT');

INSERT INTO academy_test.pazymiai (value,user_id) VALUES
  (10,4),
  (10,1),
  (4,2),
  (10,3),
  (3,5),
  (5,4),
  (10,6),
  (5,7),
  (10,6),
  (10,6);