/*
SQLyog Ultimate v12.4.3 (64 bit)
MySQL - 10.1.30-MariaDB : Database - test
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`test` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `test`;

/*Table structure for table `groups` */

DROP TABLE IF EXISTS `groups`;

CREATE TABLE `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `groups` */

insert  into `groups`(`id`,`name`,`description`) values 
(1,'admin','Administrator'),
(2,'members','General User');

/*Table structure for table `login_attempts` */

DROP TABLE IF EXISTS `login_attempts`;

CREATE TABLE `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `login_attempts` */

insert  into `login_attempts`(`id`,`ip_address`,`login`,`time`) values 
(1,'127.0.0.1','administrator',1517752149),
(3,'127.0.0.1','dfindo',1517780005),
(4,'127.0.0.1','findos',1517780821),
(5,'127.0.0.1','findo2',1517801603);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(254) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `users` */

insert  into `users`(`id`,`ip_address`,`username`,`password`,`salt`,`email`,`activation_code`,`forgotten_password_code`,`forgotten_password_time`,`remember_code`,`created_on`,`last_login`,`active`,`first_name`,`last_name`,`company`,`phone`) values 
(1,'127.0.0.1','administrator','$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36','','admin@admin.com','',NULL,NULL,NULL,1268889823,1517752192,1,'Admin','istrator','ADMIN','0'),
(2,'127.0.0.1','findo','$2y$08$7LaIFbdHgy1N7HfaxZAd9OI5sZn9d6mpbi1wmxX.kyKRTsxlU6/A6',NULL,'findo@findo.com',NULL,NULL,NULL,NULL,1517753430,1517803136,1,'Weather','User','Findo','123123');

/*Table structure for table `users_groups` */

DROP TABLE IF EXISTS `users_groups`;

CREATE TABLE `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`),
  CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `users_groups` */

insert  into `users_groups`(`id`,`user_id`,`group_id`) values 
(1,1,1),
(2,1,2),
(3,2,1);

/*Table structure for table `users_search_data` */

DROP TABLE IF EXISTS `users_search_data`;

CREATE TABLE `users_search_data` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `city_name` varchar(255) DEFAULT NULL,
  `lat` float DEFAULT NULL,
  `lng` float DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  FULLTEXT KEY `city_nam` (`city_name`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

/*Data for the table `users_search_data` */

insert  into `users_search_data`(`id`,`user_id`,`city_name`,`lat`,`lng`,`time`) values 
(14,2,'Zürich (Kreis 6)',47.3769,8.54169,'2018-02-05 03:32:49'),
(17,2,'Salamanca',20.5739,-101.196,'2018-02-05 04:02:16'),
(18,2,'Zürich (Kreis 6)',47.3769,8.54169,'2018-02-05 04:05:03');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
