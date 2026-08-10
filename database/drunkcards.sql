/*
SQLyog Ultimate v12.4.1 (64 bit)
MySQL - 11.5.2-MariaDB : Database - drunkcards
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`drunkcards` /*!40100 DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci */;

USE `drunkcards`;

/*Table structure for table `admins` */

DROP TABLE IF EXISTS `admins`;

CREATE TABLE `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `admins` */

insert  into `admins`(`id`,`username`,`password`) values 
(1,'admin','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918');

/*Table structure for table `cards` */

DROP TABLE IF EXISTS `cards`;

CREATE TABLE `cards` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` text NOT NULL,
  `category` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `cards` */

insert  into `cards`(`id`,`question`,`category`) values 
(2,'mahal mo ba ang jowa mo?','drunk question'),
(3,'bibili ka ng isa or shot?','drunk question'),
(4,'Kiss mo ang nasa left side mo or shot','+18 adults question'),
(5,'If ever na you caught your bestie na niloloko ang jowa niya, would you tell or deadma? Pass or shot?','drunk question'),
(6,'Have you ever sent a risky text tapos nag-regret ka after? Spill or shot?','drunk question'),
(7,'Kung may ex ka na gusto mong balikan secretly, name drop or shot?','drunk question'),
(8,'May naka-one night stand ka na ba na you lowkey want to repeat? Spill or shot?','drunk question'),
(9,'Ever mong naisip na i-friendzone ang current jowa mo before? Aminin or shot?','drunk question'),
(10,'Kung may chance to swap bodies with someone sa group, sino pipiliin mo and why? Sagot or shot?','drunk question'),
(11,'Sino sa grupo ang feeling mo pinaka-walang ambag sa barkada? Drop the name or shot?','drunk question'),
(12,'Have you ever flirted with someone na taken? Spill or shot?','drunk question'),
(13,'If ever may babayaran ka para hindi ikalat ang biggest secret mo, magkano willing kang i-pay? Amount or shot?','drunk question'),
(14,'Kung ikaw ang magiging bida sa isang teleserye, ano title ng life story mo? Spill or shot?','drunk question'),
(15,'Kung may chance ka to read one person’s mind sa group, sino pipiliin mo and bakit? Spill or shot?','drunk question'),
(16,'Have you ever stalked an ex or someone you used to like? Aminin or shot?','drunk question'),
(17,'Kung may ma-rewind kang isang past mistake mo, ano yun? Spill or shot?','drunk question'),
(18,'Sino sa grupo ang feeling mo pinaka-mahilig magpaasa? Name drop or shot?','drunk question'),
(19,'Have you ever lied about where you were just to meet someone? Spill or shot?','drunk question'),
(20,'Kung may jowa ka now, pero may ex kang gustong balikan, would you risk it? Aminin or shot?','drunk question'),
(21,'May naka-flirt ka na ba na hindi mo talaga type pero go lang? Spill or shot?','drunk question'),
(22,'Sino sa group ang pinaka-likely na magpakasal muna? Drop the name or shot?','drunk question'),
(23,'Kung may 24 hours kang maging opposite gender, anong una mong gagawin? Spill or shot?','drunk question'),
(24,'Have you ever sent a ‘wrong send’ na actually intended mo talaga? Aminin or shot?','drunk question'),
(25,'Ano yung pinaka-toxic na sinabi sayo ng isang tao na hanggang ngayon dala-dala mo?','comfort question'),
(26,'If may isang bagay kang gustong sabihin sa younger self mo, ano yun?','comfort question'),
(27,'Sino yung taong sobrang nakasakit sayo pero pinatawad mo pa rin?','comfort question'),
(28,'What’s the hardest decision na nagawa mo sa life mo so far?','comfort question'),
(29,'May bagay ka bang super pinagsisihan? Ano yun?','comfort question'),
(30,'Kung may isang tao kang gustong makausap ulit, kahit hindi mo na siya kausap ngayon, sino siya at bakit?','comfort question'),
(31,'Ano yung song na sobrang tumama sayo during a hard time?','comfort question'),
(32,'May time ba na feeling mo sobrang nag-fail ka sa isang important moment? Ano nangyari?','comfort question'),
(33,'Ano yung biggest lesson na natutunan mo from heartbreak?','comfort question'),
(34,'Kung may isang taong sobrang nagpasaya sayo recently, sino siya at bakit?','comfort question'),
(35,'Sino sa group ang feeling mong safe space mo? Spill!','comfort question'),
(36,'Anong bagay ang ginagawa mo kapag sobrang sad ka?','comfort question'),
(37,'May moment ba sa life mo na feeling mo wala ka nang pag-asa? Paano ka naka-recover?','comfort question'),
(38,'If you could give one piece of advice sa sarili mo right now, ano yun?','comfort question'),
(39,'Ano yung pinaka-heartwarming na compliment na natanggap mo ever?','comfort question');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
