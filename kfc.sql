/*
SQLyog Ultimate v10.00 Beta1
MySQL - 5.7.36 : Database - kfc
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`kfc` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `kfc`;

/*Table structure for table `tbl_audit` */

DROP TABLE IF EXISTS `tbl_audit`;

CREATE TABLE `tbl_audit` (
  `user` varchar(60) DEFAULT NULL,
  `status` varchar(60) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `tbl_audit` */

LOCK TABLES `tbl_audit` WRITE;

insert  into `tbl_audit`(`user`,`status`,`date`) values ('Nyzuz Damaso','Purchase from Supplier','2023-07-23'),('Nyzuz Damaso','Purchase from Supplier','2023-07-23');

UNLOCK TABLES;

/*Table structure for table `tbl_buy` */

DROP TABLE IF EXISTS `tbl_buy`;

CREATE TABLE `tbl_buy` (
  `buy_id` int(60) NOT NULL,
  `img` varchar(90) DEFAULT NULL,
  `name` varchar(60) DEFAULT NULL,
  `stock` int(60) DEFAULT NULL,
  `price` int(60) DEFAULT NULL,
  `datebuy` date DEFAULT NULL,
  `totalexp` int(90) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `tbl_buy` */

LOCK TABLES `tbl_buy` WRITE;

insert  into `tbl_buy`(`buy_id`,`img`,`name`,`stock`,`price`,`datebuy`,`totalexp`) values (1,'kfc15.png','Double Dasurv Meal',50,185,'2023-07-23',9250),(7,'kfc5.png','CHEEZY ITALIAN ZINGER LOADED MEAL',10,265,'2023-07-23',2650);

UNLOCK TABLES;

/*Table structure for table `tbl_buys` */

DROP TABLE IF EXISTS `tbl_buys`;

CREATE TABLE `tbl_buys` (
  `buys_id` int(60) DEFAULT NULL,
  `img` varchar(60) DEFAULT NULL,
  `name` varchar(60) DEFAULT NULL,
  `stock` int(60) DEFAULT NULL,
  `price` int(60) DEFAULT NULL,
  `datebuy` date DEFAULT NULL,
  `totalexp` int(60) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `tbl_buys` */

LOCK TABLES `tbl_buys` WRITE;

insert  into `tbl_buys`(`buys_id`,`img`,`name`,`stock`,`price`,`datebuy`,`totalexp`) values (1,'kfc15.png','Double Dasurv Meal',50,185,'2023-07-24',9250),(7,'kfc5.png','CHEEZY ITALIAN ZINGER LOADED MEAL',10,265,'2023-07-24',2650);

UNLOCK TABLES;

/*Table structure for table `tbl_employee` */

DROP TABLE IF EXISTS `tbl_employee`;

CREATE TABLE `tbl_employee` (
  `employee_id` int(30) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) DEFAULT NULL,
  `role` varchar(60) DEFAULT NULL,
  `datehired` date DEFAULT NULL,
  `salary` int(60) DEFAULT NULL,
  `bankaccount` int(60) DEFAULT NULL,
  PRIMARY KEY (`employee_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_employee` */

LOCK TABLES `tbl_employee` WRITE;

insert  into `tbl_employee`(`employee_id`,`name`,`role`,`datehired`,`salary`,`bankaccount`) values (11,'hay','manager','2023-07-16',5000,121),(12,'ewan','admin','2023-07-20',0,121),(14,'axels','admin','2023-07-21',1200,121),(15,'John Roa','hr','2023-07-21',7000,121);

UNLOCK TABLES;

/*Table structure for table `tbl_order` */

DROP TABLE IF EXISTS `tbl_order`;

CREATE TABLE `tbl_order` (
  `order_id` int(30) NOT NULL,
  `name` varchar(90) DEFAULT NULL,
  `stock` int(60) DEFAULT NULL,
  `price` int(60) DEFAULT NULL,
  `orderdate` date DEFAULT NULL,
  `cashier` varchar(60) DEFAULT NULL,
  `totalprice` int(60) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `tbl_order` */

LOCK TABLES `tbl_order` WRITE;

insert  into `tbl_order`(`order_id`,`name`,`stock`,`price`,`orderdate`,`cashier`,`totalprice`) values (1,'Double Dasurv Meal',3,235,'2023-07-23','Nyzuz Damaso',705),(7,'CHEEZY ITALIAN ZINGER LOADED MEAL',3,315,'2023-07-23','Nyzuz Damaso',945);

UNLOCK TABLES;

/*Table structure for table `tbl_pay` */

DROP TABLE IF EXISTS `tbl_pay`;

CREATE TABLE `tbl_pay` (
  `pay_id` int(30) NOT NULL AUTO_INCREMENT,
  `img` varchar(90) DEFAULT NULL,
  `name` varchar(90) DEFAULT NULL,
  `stock` int(60) DEFAULT NULL,
  `price` int(60) DEFAULT NULL,
  `status` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`pay_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_pay` */

LOCK TABLES `tbl_pay` WRITE;

UNLOCK TABLES;

/*Table structure for table `tbl_product` */

DROP TABLE IF EXISTS `tbl_product`;

CREATE TABLE `tbl_product` (
  `product_id` int(30) NOT NULL AUTO_INCREMENT,
  `img` varchar(90) DEFAULT NULL,
  `name` varchar(90) DEFAULT NULL,
  `stock` int(90) DEFAULT NULL,
  `price` int(90) DEFAULT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_product` */

LOCK TABLES `tbl_product` WRITE;

insert  into `tbl_product`(`product_id`,`img`,`name`,`stock`,`price`) values (1,'kfc15.png','Double Dasurv Meal',47,185),(7,'kfc5.png','CHEEZY ITALIAN ZINGER LOADED MEAL',7,265);

UNLOCK TABLES;

/*Table structure for table `tbl_purchase` */

DROP TABLE IF EXISTS `tbl_purchase`;

CREATE TABLE `tbl_purchase` (
  `purchase_id` int(30) NOT NULL AUTO_INCREMENT,
  `img` varchar(90) DEFAULT NULL,
  `name` varchar(60) DEFAULT NULL,
  `price` int(30) DEFAULT NULL,
  PRIMARY KEY (`purchase_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_purchase` */

LOCK TABLES `tbl_purchase` WRITE;

insert  into `tbl_purchase`(`purchase_id`,`img`,`name`,`price`) values (1,'kfc15.png','Double Dasurv Meal',185),(2,'kfc2.png','ORIGINAL RECIPE DOUBLE DOWN COMBO',265),(3,'kfc3.png','ZINGER DOUBLE DOWN COMBO',265),(4,'kfc8.png','BBQ BACON SNACKER COMBO',189),(5,'kfc14.png','1-PC CHICKEN ALA CARTE',100),(6,'kfc13.png','2PC CHICKERN ALA CARTE',200),(7,'kfc5.png','CHEEZY ITALIAN ZINGER LOADED MEAL',265),(8,'kfc6.png','BUILD A FULLY LOADED MEAL',210),(9,'kfc12.png','BUCKET MEAL A',699);

UNLOCK TABLES;

/*Table structure for table `tbl_sale` */

DROP TABLE IF EXISTS `tbl_sale`;

CREATE TABLE `tbl_sale` (
  `sale_id` int(30) NOT NULL AUTO_INCREMENT,
  `img` varchar(90) DEFAULT NULL,
  `name` varchar(60) DEFAULT NULL,
  `price` int(60) DEFAULT NULL,
  PRIMARY KEY (`sale_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_sale` */

LOCK TABLES `tbl_sale` WRITE;

insert  into `tbl_sale`(`sale_id`,`img`,`name`,`price`) values (1,'kfc15.png','Double Dasurv Meal',235),(7,'kfc5.png','CHEEZY ITALIAN ZINGER LOADED MEAL',315);

UNLOCK TABLES;

/*Table structure for table `tbl_user` */

DROP TABLE IF EXISTS `tbl_user`;

CREATE TABLE `tbl_user` (
  `user_id` int(30) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) DEFAULT NULL,
  `role` varchar(60) DEFAULT NULL,
  `username` varchar(60) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_user` */

LOCK TABLES `tbl_user` WRITE;

insert  into `tbl_user`(`user_id`,`name`,`role`,`username`,`password`) values (1,'Nyzuz Damaso','admin','admin','admin  '),(11,'Robert','manager','manager','manager '),(3,'axel','cashier','cashier','cashier'),(8,'Jessica','accountant','accountant','accountant '),(15,'John Roa','hr','hr','hr');

UNLOCK TABLES;

/* Trigger structure for table `tbl_buy` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `afteraddbuy` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `afteraddbuy` AFTER INSERT ON `tbl_buy` FOR EACH ROW BEGIN
	INSERT INTO `tbl_pay` (`pay_id`, `img`, `name`, `stock`, `price`, `status`)
	VALUES (NEW.`buy_id`, NEW.`img`, NEW.`name`, NEW.`stock`, NEW.`price`, 'notpaid')
	
	ON DUPLICATE KEY UPDATE 
          `stock` = `stock` + VALUES(`stock`);
END */$$


DELIMITER ;

/* Trigger structure for table `tbl_order` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `afteraddorder` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `afteraddorder` AFTER INSERT ON `tbl_order` FOR EACH ROW BEGIN
    UPDATE tbl_product
    SET stock = stock - NEW.stock
    WHERE product_id = NEW.order_id;
END */$$


DELIMITER ;

/* Trigger structure for table `tbl_pay` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `afterupdatepay` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `afterupdatepay` AFTER UPDATE ON `tbl_pay` FOR EACH ROW BEGIN
    IF NEW.status = 'Paid' THEN
        INSERT INTO tbl_product (product_id, img, NAME, stock, price)
        VALUES (NEW.`pay_id`, NEW.`img`, NEW.`name`, NEW.`stock`, NEW.`price`)
        ON DUPLICATE KEY UPDATE
        stock = stock + VALUES(stock);
        INSERT INTO tbl_buys (buys_id, img, NAME, stock, price, datebuy, totalexp)
        VALUES (NEW.`pay_id`, NEW.`img`, NEW.`name`, NEW.`stock`, NEW.`price`, NOW(), NEW.`stock` * NEW.`price`);
    END IF;
END */$$


DELIMITER ;

/* Trigger structure for table `tbl_product` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `afteraddproduct` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `afteraddproduct` AFTER INSERT ON `tbl_product` FOR EACH ROW BEGIN
    DECLARE duplicate_key CONDITION FOR SQLSTATE '23000';
    DECLARE EXIT HANDLER FOR duplicate_key BEGIN
        -- Duplicate key found, dismiss the code
    END;
    INSERT INTO `tbl_sale` (`sale_id`, `img`, `name`, `price`)
    VALUES (NEW.`product_id`, NEW.`img`, NEW.`name`, NEW.`price` + 50);
    END */$$


DELIMITER ;

/* Trigger structure for table `tbl_user` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `afteradduser` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `afteradduser` AFTER INSERT ON `tbl_user` FOR EACH ROW BEGIN
        DECLARE sal INT;
        SET sal = 0;
        IF NEW.role = 'cashier' THEN
            SET sal = 3500;
        ELSEIF NEW.role = 'accountant' THEN
            SET sal = 6500;
        ELSEIF NEW.role = 'manager' THEN
            SET sal = 8500;
            ELSEIF NEW.role = 'hr' THEN
            SET sal = 7000;
        END IF;
        INSERT INTO tbl_employee (employee_id, name, role, datehired, salary)
        VALUES (NEW.user_id, NEW.name, NEW.role, NOW(), sal);
    END */$$


DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
