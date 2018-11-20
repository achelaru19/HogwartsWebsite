SET NAMES latin1;
SET FOREIGN_KEY_CHECKS = 0;

BEGIN;
CREATE DATABASE IF NOT EXISTS `Hogwarts`;
COMMIT;

USE `Hogwarts`;


-- -----------------------------
-- Table structure for 'Student'
-- -----------------------------
DROP TABLE IF EXISTS `STUDENT`;
CREATE TABLE `STUDENT`(
    `Username` VARCHAR(20) NOT NULL PRIMARY KEY,
    `Name` VARCHAR(30) NOT NULL,
    `Lastname` VARCHAR(30) NOT NULL,
    `Sex` CHAR(1) NOT NULL,
    `Birthdate` DATE NOT NULL,
    `Password` VARCHAR(20) NOT NULL,
    `Email` VARCHAR(45) NOT NULL,
    `SchoolYear` INT(7) NOT NULL,
    `House` VARCHAR(25) NOT NULL,
    FOREIGN KEY(`House`) REFERENCES `HOUSE`(`Name`),
    FOREIGN KEY(`SchoolYear`) REFERENCES `COURSES`(`SchoolYear`)
) ENGINE = InnoDB DEFAULT CHARSET = latin1;

-- ---------------------------
-- Records of 'STUDENT' 
-- ---------------------------
BEGIN;
INSERT INTO `STUDENT` VALUES
('h.potter80','Harry','Potter','M','1980-07-31','pweb','h.potter@hogwarts.com','3','Gryffindor'),
('r.weasley80','Ronald','Weasley','M','1980-03-01','pweb','r.weasley@hogwarts.com','3','Gryffindor'),
('h.granger79','Hermione','Granger','F','1979-09-19','pweb','h.granger@hogwarts.com','3','Gryffindor'),
('d.malfoy80','Draco','Malfoy','M','1980-06-05','pweb','d.malfoy@hogwarts.com','3','Slytherin'),
('l.lovegood81','Luna','Lovegood','F','1981-11-20','pweb','l.lovegood@hogwarts.com','2','Ravenclaw'),
('c.diggory77','Cedric','Diggory','M','1977-01-2','pweb','c.diggory@hogwarts.com','6','Hufflepuff'),
('m.bulstrode81','Millicent','Bulstrode','F','1981-01-29','pweb','m.bulstrode@hogwarts.com','2','Slytherin'),
('p.patil80','Padma','Patil','F','1980-04-21','pweb','p.patil@hogwarts.com','3','Ravenclaw'),
('h.abbott82','Hannah','Abbott','F','1982-11-13','pweb','h.abbott@hogwarts.com','1','Hufflepuff');
COMMIT;


-- -----------------------------
-- Table structure for 'Teacher'
-- -----------------------------
DROP TABLE IF EXISTS `TEACHER`;
CREATE TABLE `TEACHER`(
    `Username` VARCHAR(15) NOT NULL PRIMARY KEY,
    `Name` VARCHAR(30) NOT NULL,
    `Lastname` VARCHAR(30) NOT NULL,
    `Sex` CHAR NOT NULL,
    `Birthdate` DATE NOT NULL,
    `Password` VARCHAR(20) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = latin1;

-- -----------------------------
-- Records of 'Teacher' 
-- -----------------------------
BEGIN;
INSERT INTO `TEACHER` VALUES
('m.mcgonagall','Minerva','McGonagall','F','1935-10-04','pweb'),
('r.lupin','Remus','Lupin','M','1960-03-10','pweb'),
('a.sinistra','Aurora','Sinistra','F','1963-05-05','pweb'),
('h.rubeus','Hagrid','Rubeus','M','1928-12-06','pweb'),
('r.hooch','Rolanda','Hooch','F','1901-08-14','pweb'),
('c.binns','Cuthbert','Binns','M','1325-04-7','pweb'),
('f.flitwick','Filius','Flitwick','M','1937-10-17','pweb'),
('s.snape','Severus','Snape','M','1960-01-09','pweb'),
('p.sprout','Pomona','Sprout','F','1919-05-15','pweb'),
('s.trelawney','Sybill','Trelawney','F','1952-03-09','pweb'),
('c.burbage','Charity','Burbage','F','1949-04-24','pweb'); 
COMMIT;


-- -----------------------------
-- Table structure for 'House'
-- -----------------------------
DROP TABLE IF EXISTS `HOUSE`;
CREATE TABLE `HOUSE`(
	`Name` VARCHAR(15) NOT NULL PRIMARY KEY,
    `Points` INT NOT NULL DEFAULT 0,
    `HeadOfTheHouse` VARCHAR(15) NOT NULL,
    `QuidditchPoints` INT NOT NULL DEFAULT 0,
    `Founder` VARCHAR(30) NOT NULL,
    `HouseColors` VARCHAR(30) NOT NULL,
    `Animal`VARCHAR(15) NOT NULL,
    `Element`VARCHAR(15) NOT NULL,
    `Ghost`VARCHAR(25) NOT NULL,
    `CommonRoom`VARCHAR(30) NOT NULL,
    FOREIGN KEY(`HeadOfTheHouse`) REFERENCES `TEACHER`(`Username`)
) ENGINE = InnoDB DEFAULT CHARSET = latin1;

-- -----------------------------
-- Records of 'House' 
-- -----------------------------
BEGIN;
INSERT INTO `HOUSE` VALUES
('Gryffindor','54','m.mcgonagall','12','Godric Gryffindor','Red and gold','Lion','Fire','Nearly-Headless Nick','Gryffindor Tower'),
('Hufflepuff','46','p.sprout','7','Helga Hufflepuff','Yeallow and black','Badger','Earth','Fat Friar','Hufflepuff Basement'),
('Ravenclaw','39','f.flitwick','10','Rowena Ravenclaw','Blue and bronze','Eagle','Air','The Grey Lady','Ravenclaw Tower'),
('Slytherin','51','s.snape','14','Salazar Slytherin','Green and silver','Serpent','Water','The Bloody Baron','Slytherin Dungeon');
COMMIT;


-- -----------------------------
-- Table structure for 'Grades'
-- -----------------------------
DROP TABLE IF EXISTS `GRADES`;
CREATE TABLE `GRADES`(
	`Subject` VARCHAR(40) NOT NULL,
    `Student` VARCHAR(20) NOT NULL,
    `Mark` INT NOT NULL,
    `Date`DATE,
    PRIMARY KEY(`Subject`,`Student`,`Date`),
    FOREIGN KEY(`Student`) REFERENCES `STUDENT`(`Username`)
) ENGINE = InnoDB DEFAULT CHARSET = latin1;

-- -----------------------------
-- Records of 'Grandes' 
-- -----------------------------
BEGIN;
INSERT INTO `GRADES` VALUES
('Defence Against the Dark Arts 1','h.potter80','95','2014-12-20'),
('Defence Against the Dark Arts 1','r.weasley80','82','2014-12-20'),
('Defence Against the Dark Arts 1','h.granger79','93','2014-12-20'),
('Defence Against the Dark Arts 1','d.malfoy80','89','2014-12-20'),
('Defence Against the Dark Arts 1','p.patil80','78','2014-12-20'),
('Defence Against the Dark Arts 1','m.bulstrode81','69','2015-12-19'),
('Defence Against the Dark Arts 1','l.lovegood81','77','2015-12-19'),
('Defence Against the Dark Arts 1','h.abbott82','75','2016-12-18'),
('Defence Against the Dark Arts 1','c.diggory77','89','2011-12-21'),
('Defence Against the Dark Arts 1','h.potter80','97','2015-05-30'),
('Defence Against the Dark Arts 1','r.weasley80','84','2015-05-30'),
('Defence Against the Dark Arts 1','h.granger79','97','2015-05-30'),
('Defence Against the Dark Arts 1','d.malfoy80','91','2015-05-30'),
('Defence Against the Dark Arts 1','p.patil80','82','2015-05-30'),
('Defence Against the Dark Arts 1','l.lovegood81','78','2016-05-29'),
('Defence Against the Dark Arts 1','m.bulstrode81','73','2016-05-29'),
('Defence Against the Dark Arts 1','c.diggory77','94','2012-05-31'),

('Defence Against the Dark Arts 2','h.potter80','95','2015-12-20'),
('Defence Against the Dark Arts 2','r.weasley80','82','2015-12-20'),
('Defence Against the Dark Arts 2','h.granger79','93','2015-12-20'),
('Defence Against the Dark Arts 2','d.malfoy80','89','2015-12-20'),
('Defence Against the Dark Arts 2','p.patil80','78','2015-12-20'),
('Defence Against the Dark Arts 2','m.bulstrode81','69','2016-12-19'),
('Defence Against the Dark Arts 2','l.lovegood81','77','2016-12-19'),
('Defence Against the Dark Arts 2','c.diggory77','89','2012-12-21'),
('Defence Against the Dark Arts 2','h.potter80','97','2016-05-30'),
('Defence Against the Dark Arts 2','r.weasley80','84','2016-05-30'),
('Defence Against the Dark Arts 2','h.granger79','97','2016-05-30'),
('Defence Against the Dark Arts 2','d.malfoy80','91','2016-05-30'),
('Defence Against the Dark Arts 2','p.patil80','82','2016-05-30'),
('Defence Against the Dark Arts 2','c.diggory77','94','2013-05-31'),

('Defence Against the Dark Arts 3','h.potter80','97','2016-12-20'),
('Defence Against the Dark Arts 3','r.weasley80','84','2016-12-20'),
('Defence Against the Dark Arts 3','h.granger79','97','2016-12-20'),
('Defence Against the Dark Arts 3','d.malfoy80','91','2016-12-20'),
('Defence Against the Dark Arts 3','p.patil80','82','2016-12-20'),
('Defence Against the Dark Arts 3','c.diggory77','94','2013-12-21'),
('Defence Against the Dark Arts 3','c.diggory77','97','2014-05-31'),

('Defence Against the Dark Arts 4','c.diggory77','83','2014-12-21'),
('Defence Against the Dark Arts 4','c.diggory77','89','2015-05-31'),

('Defence Against the Dark Arts 5','c.diggory77','87','2015-12-21'),
('Defence Against the Dark Arts 5','c.diggory77','95','2016-05-31'),

('Defence Against the Dark Arts 6','c.diggory77','94','2016-12-21'),

('Potions 1','h.potter80','72','2014-12-19'),
('Potions 1','r.weasley80','68','2014-12-19'),
('Potions 1','h.granger79','83','2014-12-19'),
('Potions 1','d.malfoy80','87','2014-12-19'),
('Potions 1','p.patil80','71','2014-12-19'),
('Potions 1','m.bulstrode81','69','2015-12-18'),
('Potions 1','l.lovegood81','71','2015-12-18'),
('Potions 1','h.abbott82','73','2016-12-17'),
('Potions 1','c.diggory77','73','2011-12-20'),
('Potions 1','h.potter80','73','2015-05-29'),
('Potions 1','r.weasley80','72','2015-05-29'),
('Potions 1','h.granger79','83','2015-05-29'),
('Potions 1','d.malfoy80','89','2015-05-29'),
('Potions 1','p.patil80','72','2015-05-29'),
('Potions 1','l.lovegood81','74','2016-05-28'),
('Potions 1','m.bulstrode81','70','2016-05-28'),
('Potions 1','c.diggory77','74','2012-05-30'),

('Potions 2','h.potter80','79','2015-12-19'),
('Potions 2','r.weasley80','79','2015-12-19'),
('Potions 2','h.granger79','89','2015-12-19'),
('Potions 2','d.malfoy80','89','2015-12-19'),
('Potions 2','p.patil80','78','2015-12-19'),
('Potions 2','m.bulstrode81','69','2016-12-18'),
('Potions 2','l.lovegood81','77','2016-12-18'),
('Potions 2','c.diggory77','85','2012-12-20'),
('Potions 2','h.potter80','86','2016-05-29'),
('Potions 2','r.weasley80','82','2016-05-29'),
('Potions 2','h.granger79','90','2016-05-29'),
('Potions 2','d.malfoy80','89','2016-05-29'),
('Potions 2','p.patil80','81','2016-05-29'),
('Potions 2','c.diggory77','94','2013-05-30'),

('Potions 3','h.potter80','78','2016-12-19'),
('Potions 3','r.weasley80','71','2016-12-19'),
('Potions 3','h.granger79','86','2016-12-19'),
('Potions 3','d.malfoy80','86','2016-12-19'),
('Potions 3','p.patil80','74','2016-12-19'),
('Potions 3','c.diggory77','71','2013-12-20'),
('Potions 3','c.diggory77','81','2014-05-30'),

('Potions 4','c.diggory77','79','2014-12-20'),
('Potions 4','c.diggory77','80','2015-05-30'),

('Potions 5','c.diggory77','76','2015-12-20'),
('Potions 5','c.diggory77','79','2016-05-30'),

('Potions 6','c.diggory77','75','2016-12-20'),

('Transfiguration 1','h.potter80','82','2014-12-18'),
('Transfiguration 1','r.weasley80','79','2014-12-18'),
('Transfiguration 1','h.granger79','92','2014-12-18'),
('Transfiguration 1','d.malfoy80','80','2014-12-18'),
('Transfiguration 1','p.patil80','78','2014-12-18'),
('Transfiguration 1','m.bulstrode81','70','2015-12-17'),
('Transfiguration 1','l.lovegood81','69','2015-12-17'),
('Transfiguration 1','h.abbott82','72','2016-12-21'),
('Transfiguration 1','c.diggory77','79','2011-12-19'), 
('Transfiguration 1','h.potter80','84','2015-05-28'),
('Transfiguration 1','r.weasley80','79','2015-05-28'),
('Transfiguration 1','h.granger79','94','2015-05-28'),
('Transfiguration 1','d.malfoy80','78','2015-05-28'),
('Transfiguration 1','p.patil80','79','2015-05-28'),
('Transfiguration 1','l.lovegood81','76','2016-05-27'),
('Transfiguration 1','m.bulstrode81','75','2016-05-27'),
('Transfiguration 1','c.diggory77','82','2012-05-29'),

('Transfiguration 2','h.potter80','85','2015-12-18'),
('Transfiguration 2','r.weasley80','82','2015-12-18'),
('Transfiguration 2','h.granger79','96','2015-12-18'),
('Transfiguration 2','d.malfoy80','84','2015-12-18'),
('Transfiguration 2','p.patil80','82','2015-12-18'),
('Transfiguration 2','m.bulstrode81','71','2016-12-17'),
('Transfiguration 2','l.lovegood81','79','2016-12-17'),
('Transfiguration 2','c.diggory77','90','2012-12-19'),
('Transfiguration 2','h.potter80','95','2016-05-28'),
('Transfiguration 2','r.weasley80','88','2016-05-28'),
('Transfiguration 2','h.granger79','98','2016-05-28'),
('Transfiguration 2','d.malfoy80','88','2016-05-28'),
('Transfiguration 2','p.patil80','86','2016-05-28'),
('Transfiguration 2','c.diggory77','95','2013-05-29'),

('Transfiguration 3','h.potter80','91','2016-12-18'),
('Transfiguration 3','r.weasley80','82','2016-12-18'),
('Transfiguration 3','h.granger79','93','2016-12-18'),
('Transfiguration 3','d.malfoy80','81','2016-12-18'),
('Transfiguration 3','p.patil80','83','2016-12-18'),
('Transfiguration 3','c.diggory77','93','2013-12-19'),
('Transfiguration 3','c.diggory77','93','2014-05-29'),

('Transfiguration 4','c.diggory77','87','2014-12-19'),
('Transfiguration 4','c.diggory77','89','2015-05-29'),

('Transfiguration 5','c.diggory77','84','2015-12-19'),
('Transfiguration 5','c.diggory77','93','2016-05-29'),

('Transfiguration 6','c.diggory77','91','2016-12-19'),

('Charms 1','h.potter80','82','2014-12-17'),
('Charms 1','r.weasley80','73','2014-12-17'),
('Charms 1','h.granger79','99','2014-12-17'),
('Charms 1','d.malfoy80','74','2014-12-17'),
('Charms 1','p.patil80','78','2014-12-17'),
('Charms 1','m.bulstrode81','70','2015-12-21'),
('Charms 1','l.lovegood81','79','2015-12-21'),
('Charms 1','h.abbott82','72','2016-12-20'),
('Charms 1','c.diggory77','76','2011-12-18'), 
('Charms 1','h.potter80','84','2015-05-27'),
('Charms 1','r.weasley80','79','2015-05-27'),
('Charms 1','h.granger79','100','2015-05-27'),
('Charms 1','d.malfoy80','79','2015-05-27'),
('Charms 1','p.patil80','84','2015-05-27'),
('Charms 1','l.lovegood81','79','2016-05-31'),
('Charms 1','m.bulstrode81','78','2016-05-31'),
('Charms 1','c.diggory77','85','2012-05-28'),

('Charms 2','h.potter80','90','2015-12-17'),
('Charms 2','r.weasley80','84','2015-12-17'),
('Charms 2','h.granger79','98','2015-12-17'),
('Charms 2','d.malfoy80','84','2015-12-17'),
('Charms 2','p.patil80','85','2015-12-17'),
('Charms 2','m.bulstrode81','76','2016-12-31'),
('Charms 2','l.lovegood81','77','2016-12-31'),
('Charms 2','c.diggory77','87','2012-12-18'),
('Charms 2','h.potter80','94','2016-05-27'),
('Charms 2','r.weasley80','89','2016-05-27'),
('Charms 2','h.granger79','99','2016-05-27'),
('Charms 2','d.malfoy80','89','2016-05-27'),
('Charms 2','p.patil80','86','2016-05-27'),
('Charms 2','c.diggory77','93','2013-05-28'),

('Flying 1','h.potter80','98','2014-12-21'),
('Flying 1','r.weasley80','73','2014-12-21'),
('Flying 1','h.granger79','76','2014-12-21'),
('Flying 1','d.malfoy80','84','2014-12-21'),
('Flying 1','p.patil80','78','2014-12-21'),
('Flying 1','m.bulstrode81','79','2015-12-20'),
('Flying 1','l.lovegood81','72','2015-12-20'),
('Flying 1','h.abbott82','70','2016-12-19'),
('Flying 1','c.diggory77','81','2011-12-17'), 
('Flying 1','h.potter80','100','2015-05-31'),
('Flying 1','r.weasley80','75','2015-05-31'),
('Flying 1','h.granger79','82','2015-05-31'),
('Flying 1','d.malfoy80','88','2015-05-31'),
('Flying 1','p.patil80','87','2015-05-31'),
('Flying 1','l.lovegood81','79','2016-05-30'),
('Flying 1','m.bulstrode81','83','2016-05-30'),
('Flying 1','c.diggory77','85','2012-05-27'),

('Herbology','h.potter80','79','2014-12-21'),
('Herbology','r.weasley80','79','2014-12-21'),
('Herbology','h.granger79','89','2014-12-21'),
('Herbology','d.malfoy80','76','2014-12-21'),
('Herbology','p.patil80','78','2014-12-21'),
('Herbology','m.bulstrode81','83','2015-12-20'),
('Herbology','l.lovegood81','84','2015-12-20'),
('Herbology','h.abbott82','76','2016-12-19'),
('Herbology','c.diggory77','75','2011-12-17'), 
('Herbology','h.potter80','80','2015-05-31'),
('Herbology','r.weasley80','76','2015-05-31'),
('Herbology','h.granger79','91','2015-05-31'),
('Herbology','d.malfoy80','74','2015-05-31'),
('Herbology','p.patil80','88','2015-05-31'),
('Herbology','l.lovegood81','85','2016-05-30'),
('Herbology','m.bulstrode81','83','2016-05-30'),
('Herbology','c.diggory77','81','2012-05-27'),

('Divination 1','h.potter80','81','2016-12-21'),
('Divination 1','r.weasley80','74','2016-12-21'),
('Divination 1','h.granger79','76','2016-12-21'),
('Divination 1','d.malfoy80','78','2016-12-21'),
('Divination 1','p.patil80','86','2016-12-21'),
('Divination 1','c.diggory77','79','2013-12-17'), 
('Divination 1','c.diggory77','82','2014-05-27'),

('Divination 2','c.diggory77','80','2015-12-18'),
('Divination 2','c.diggory77','81','2016-05-28'),

('Divination 3','c.diggory77','79','2016-12-18'),

('Care of Magical Creatures 1','h.potter80','90','2016-12-17'),
('Care of Magical Creatures 1','r.weasley80','90','2016-12-17'),
('Care of Magical Creatures 1','h.granger79','92','2016-12-17'),
('Care of Magical Creatures 1','d.malfoy80','79','2016-12-17'),
('Care of Magical Creatures 1','p.patil80','85','2016-12-17'),
('Care of Magical Creatures 1','c.diggory77','84','2013-12-18'),
('Care of Magical Creatures 1','c.diggory77','86','2014-05-28'),

('Care of Magical Creatures 2','c.diggory77','85','2014-12-18'),
('Care of Magical Creatures 2','c.diggory77','85','2015-05-28'),

('Astronomy 1','c.diggory77','79','2015-12-17'),
('Astronomy 1','c.diggory77','88','2016-05-27'),

('Astronomy 2','c.diggory77','84','2016-12-17'),

('History of Magic 1','c.diggory77','78','2014-12-17'),
('History of Magic 1','c.diggory77','80','2015-05-27');

COMMIT;

-- -----------------------------
-- Table structure for 'Courses'
-- -----------------------------
DROP TABLE IF EXISTS `COURSES`;
CREATE TABLE `COURSES`(
	`SchoolYear` INT NOT NULL,
    `Subject` VARCHAR(40) NOT NULL,
    `Teacher` VARCHAR(15) NOT NULL,
    PRIMARY KEY (`SchoolYear`,`Subject`,`Teacher`),
    FOREIGN KEY(`Teacher`) REFERENCES `TEACHER`(`Username`)
) ENGINE = InnoDB DEFAULT CHARSET = latin1;

-- -----------------------------
-- Records of 'Courses' 
-- -----------------------------
BEGIN;
INSERT INTO `COURSES` VALUES
('1','Defense Against the Dark Arts 1','r.lupin'),
('1','Potions 1','s.snape'),
('1','Charms 1','f.flitwick'),
('1','Flying 1','r.hooch'),
('1','Transfiguration 1','m.mcgonagall'),
('2','Defence Against the Dark Arts 2','r.lupin'),
('2','Potions 2','s.snape'),
('2','Herbology','p.sprout'),
('2','Charms 2','f.flitwick'),
('2','Transfiguration 2','m.mcgonagall'),
('3','Defence Against the Dark Arts 3','r.lupin'),
('3','Potions 3','s.snape'),
('3','Care of Magical Creatures 1','h.rubeus'),
('3','Divination 1','s.trelawney '),
('3','Transfiguration 3','m.mcgonagall'),
('4','Defence Against the Dark Arts 4','r.lupin'),
('4','Potions 4','s.snape'),
('4','History of Magic 1','c.binns'),
('4','Transfiguration 4','m.mcgonagall'),
('4','Care of Magical Creatures 2','h.rubeus'),
('5','Defence Against the Dark Arts 5','r.lupin'),
('5','Potions 5','s.snape'),
('5','Astronomy 1','a.sinistra'),
('5','Transfiguration 5','m.mcgonagall'),
('5','Divination 2','s.trelawney'),
('6','Defence Against the Dark Arts 6','r.lupin'),
('6','Potions 6','s.snape'),
('6','Divination 3','s.trelawney'),
('6','Astronomy 2','a.sinistra'),
('6','Transfiguration 6','m.mcgonagall'),
('7','Defence Against the Dark Arts 7','r.lupin'),
('7','Charms 3','f.flitwick'),
('7','Muggle Studies','c.burbage'),
('7','Astronomy 3','a.sinistra'),
('7','Transfiguration 7','.mcgonagall');
COMMIT;


-- -----------------------------
-- Table structure for 'News'
-- -----------------------------
DROP TABLE IF EXISTS `NEWS`;
CREATE TABLE `NEWS`(
 `News_ID` INT AUTO_INCREMENT PRIMARY KEY,
 `Teacher` VARCHAR(15) NOT NULL,
 `InputDate` DATE NOT NULL,
 `Info` TEXT,
 `Gryffindor` BOOLEAN DEFAULT FALSE,
 `Hufflepuff` BOOLEAN DEFAULT FALSE,
 `Ravenclaw` BOOLEAN DEFAULT FALSE,
 `Slytherin` BOOLEAN DEFAULT FALSE,
 `Time_Period` VARCHAR(15) NOT NULL,
 FOREIGN KEY (`Teacher`) REFERENCES `Teacher`(`Username`)
 ) ENGINE=InnoDB DEFAULT CHARSET = latin1;

-- -----------------------------
-- Records of 'News' 
-- -----------------------------
BEGIN;
INSERT INTO `NEWS` VALUES
(NULL,'m.mcgonagall','2017-01-22','Welcome back to Gryffindor! I hope you had some delightful holidays. However, now you are back to school and we need to focus on the Quidditch Tournament. Come on, students! We can win!',true,false,false,false,'monthly'),
(NULL,'r.lupin','2016-09-07','The fist two months of this semester, the only thing you will be needing in my class is your wand. Do not mind to bring with you the Defense Against the Dark Arts book.',true,true,true,true,'trimestral'),
(NULL,'s.snape','2017-01-22','Welcome back. Do not try to do anything irresponsible that will make in risk our victory this year. Do not be late for my classes.',false,false,false,true,'annual'),
(NULL,'r.hooch','2016-09-05','Welcome to Hogwarts, my dears. Please send me an owl to let me know who is not in possess of a broom, so I can provide them with one of the school.',true,true,true,true,'annual'),
(NULL,'p.sprout','2017-01-22','Welcome back to Hufflepuff! I hope you have enjoyed your holidays. Let\s do our best to win this year!',false,true,false,false,'monthly'),
(NULL,'c.binns','2017-01-22','Welcome back to Ravenclaw! Enjoy your stay here at Hogwarts.',false,false,true,false,'monthly');
COMMIT;



SET GLOBAL event_scheduler = ON;

DROP EVENT IF EXISTS UpdateSchoolYear;
DROP EVENT IF EXISTS UpdateNews;
DROP EVENT IF EXISTS DeleteNews;
DROP EVENT IF EXISTS ResetScore;
DROP EVENT IF EXISTS QuidditchTournament;
DROP TRIGGER IF EXISTS checkPoints;

DELIMITER $$

CREATE EVENT UpdateSchoolYear 
ON SCHEDULE EVERY 1 YEAR 
STARTS '2017-07-07' 
DO 
BEGIN 
    
        UPDATE STUDENT
        SET SchoolYear = SchoolYear + 1; 
        
        DELETE FROM STUDENT
        WHERE SchoolYear = 8;
    
END; $$


CREATE EVENT UpdateNews 
ON SCHEDULE EVERY 1 DAY
STARTS STR_TO_DATE(DATE_FORMAT(CURRENT_DATE, '%Y%m%d 0300'), '%Y%m%d %H%i') + INTERVAL 1 DAY
DO
BEGIN
    DELETE FROM NEWS 
    WHERE ((Time_Period = 'weekly') AND (DATEDIFF(current_date(), InputDate) > 7)) OR
          ((Time_Period = 'monthly') AND (DATEDIFF(current_date(), InputDate) > 30)) OR
          ((Time_Period = 'trimestral') AND (DATEDIFF(current_date(), InputDate) > 90)) OR
          ((Time_Period = 'semestral') AND (DATEDIFF(current_date(), InputDate) > 180));

END; $$


CREATE EVENT DeleteNews 
ON SCHEDULE EVERY 1 YEAR
STARTS '2017-07-07'
DO 
BEGIN

    TRUNCATE News;

END; $$

CREATE EVENT ResetScore 
ON SCHEDULE EVERY 1 YEAR
STARTS '2017-09-01'
DO 
BEGIN

    UPDATE HOUSE 
    SET Points= 0, QuidditchPoints = 0;

END; $$

CREATE EVENT QuidditchTournament 
ON SCHEDULE EVERY 2 MONTH
STARTS '2017-01-28'
DO
BEGIN

    DECLARE month_ INT DEFAULT 0;
    DECLARE endLoop INTEGER DEFAULT 0;
    DECLARE house_ VARCHAR(15);
    
    DECLARE WinningHouses CURSOR FOR 
    SELECT H1.Name 
        FROM House H1
        WHERE H1.QuiddithPoints = (
                                SELECT MAX(H2.QuidditchPoints)
                                FROM House H2
                                );
                                
    DECLARE CONTINUE HANDLER 
        FOR NOT FOUND SET endLoop = 1;
                                
    SELECT DATE_FORMAT(current_date(), '%c') INTO month_;
    
    IF ((month_ != 0) AND ((month_ > 8) OR (month_ < 6))) THEN
    
        OPEN winningHouses;
        
        addingPoints: LOOP
            FETCH winningHouses INTO house_;
            
            IF endLoop = 1 THEN
                LEAVE addingPoints;
            END IF;
        
            UPDATE HOUSE
            SET QuidditchPoints = QuidditchPoints + 50
            WHERE Name = house_;
            
        END LOOP addingPoints;
        
        CLOSE winningHouses;
    
    END IF;

END; $$

CREATE TRIGGER checkPoints 
BEFORE UPDATE ON House 
FOR EACH ROW
BEGIN
    IF NEW.Points < 0 THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Not possible';
    END IF;
END$$

DELIMITER ;

