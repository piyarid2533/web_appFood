-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Feb 15, 2017 at 09:45 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `db_foodapp`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `activity`
-- 

CREATE TABLE `activity` (
  `activityid` int(5) NOT NULL auto_increment,
  `activity_name` varchar(20) collate utf8_unicode_ci NOT NULL,
  `detail` varchar(50) collate utf8_unicode_ci NOT NULL,
  `number_week` varchar(10) collate utf8_unicode_ci NOT NULL,
  `energy` varchar(50) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`activityid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

-- 
-- Dumping data for table `activity`
-- 

INSERT INTO `activity` VALUES (1, 'running', 'เดิน วิ่ง', '3', '20');
INSERT INTO `activity` VALUES (4, 'ดันพื้น', 'ดันพื้น - 3 เซต', '3', '12');

-- --------------------------------------------------------

-- 
-- Table structure for table `food`
-- 

CREATE TABLE `food` (
  `food_id` int(5) NOT NULL auto_increment,
  `food_name` varchar(20) collate utf8_unicode_ci NOT NULL,
  `foodtype_id` varchar(5) collate utf8_unicode_ci NOT NULL,
  `food_energy` int(10) NOT NULL,
  `food_price` int(10) NOT NULL,
  `food_howdo` varchar(100) collate utf8_unicode_ci NOT NULL,
  `food_img` varchar(250) collate utf8_unicode_ci NOT NULL,
  `food_rawmaterial` varchar(250) collate utf8_unicode_ci NOT NULL,
  `food_detail` varchar(250) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`food_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=59 ;

-- 
-- Dumping data for table `food`
-- 

INSERT INTO `food` VALUES (52, 'kfc1', '47', 12, 333, '                                                                                                    ', 'f2.jpg', '                                                                                                                                                                                                                                                          ', '                                                                                                                                                                                                                                                          ');
INSERT INTO `food` VALUES (51, 'ข้าวไต', '49', 30, 45, '                                                                    wdfdfdf                         ', 'f1.jpg', '                                                                                                                                                                                                                                                          ', '                                                                                                                                                                                                                                                          ');
INSERT INTO `food` VALUES (58, 'Fooo', '52', 443, 35, 'asgasga', 'Autumn-Garden-HD-Wallpaper1.jpg', 'asas', 'qwqwq');
INSERT INTO `food` VALUES (53, 'as', '48', 3, 333, '                                                                                                aass', 'f3.jpg', '                                                                                                            ddsdsd                                                                                                ', '                                                                                                            sdsd                                                                                                ');
INSERT INTO `food` VALUES (54, 'fgfg', '47', 34, 44, '                                errer                            ', 'f3.jpg', '                                    sfsfsf                                ', '                                    sfsfsf                                ');
INSERT INTO `food` VALUES (55, 'ererer', '50', 12, 222, '                                adadadad                            ', 'f1.jpg', '                                    adad                                ', '                                    adada                                ');
INSERT INTO `food` VALUES (56, 'ssdsd', '50', 34, 44, '                                ffgfgfg                            ', 'f3.jpg', '                                    sdsdsd                                ', '                                    sdsds                                ');
INSERT INTO `food` VALUES (57, 'ererer', '47', 23, 222, '                                232323                            ', 'f2.jpg', '                                    sffsfsf                                ', '                                    sfsfsf                                ');

-- --------------------------------------------------------

-- 
-- Table structure for table `foodtype`
-- 

CREATE TABLE `foodtype` (
  `foodtype_id` int(5) NOT NULL auto_increment,
  `foodtype_name` varchar(100) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`foodtype_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=53 ;

-- 
-- Dumping data for table `foodtype`
-- 

INSERT INTO `foodtype` VALUES (47, 'อาหารทั่วไป');
INSERT INTO `foodtype` VALUES (51, 'อาหารผู้ป่วยความดันโลหิตสูง');
INSERT INTO `foodtype` VALUES (48, 'อาหารผู้ป่วยเบาหวาน');
INSERT INTO `foodtype` VALUES (49, 'อาหารผู้ป่วยโรคไต');
INSERT INTO `foodtype` VALUES (50, 'อาหารจากผลิตภัณฑ์ไข่ขาว');
INSERT INTO `foodtype` VALUES (52, 'โรคหัวใจ');

-- --------------------------------------------------------

-- 
-- Table structure for table `member`
-- 

CREATE TABLE `member` (
  `member_id` int(5) NOT NULL auto_increment,
  `username` varchar(20) collate utf8_unicode_ci NOT NULL,
  `password` varchar(20) collate utf8_unicode_ci NOT NULL,
  `member_name` varchar(50) collate utf8_unicode_ci NOT NULL,
  `member_sex` varchar(5) collate utf8_unicode_ci NOT NULL,
  `member_address` varchar(100) collate utf8_unicode_ci NOT NULL,
  `member_mobile` varchar(10) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`member_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

-- 
-- Dumping data for table `member`
-- 

INSERT INTO `member` VALUES (6, 'root', '1234', 'Piyarid ', '0', '                                                                                                    ', '0990722894');
INSERT INTO `member` VALUES (4, 'Ninja', '2222', 'นาย ใจดี มีชัย', '0', '90 หมู่ 6 ต.ชุมแพ อ.ชุมแพ จ.ขอนแก่น                                                                 ', '0987655432');

-- --------------------------------------------------------

-- 
-- Table structure for table `orderdetail`
-- 

CREATE TABLE `orderdetail` (
  `order_id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  `energy` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `orderdetail`
-- 

INSERT INTO `orderdetail` VALUES (38, 51, 1, 45, 30);
INSERT INTO `orderdetail` VALUES (38, 55, 1, 222, 12);
INSERT INTO `orderdetail` VALUES (39, 52, 1, 333, 12);
INSERT INTO `orderdetail` VALUES (40, 54, 1, 44, 34);
INSERT INTO `orderdetail` VALUES (41, 54, 1, 44, 34);
INSERT INTO `orderdetail` VALUES (42, 53, 12, 333, 3);
INSERT INTO `orderdetail` VALUES (43, 53, 12, 333, 3);
INSERT INTO `orderdetail` VALUES (44, 51, 1, 45, 30);
INSERT INTO `orderdetail` VALUES (44, 52, 4, 333, 12);
INSERT INTO `orderdetail` VALUES (45, 57, 1, 222, 23);
INSERT INTO `orderdetail` VALUES (46, 56, 1, 44, 34);
INSERT INTO `orderdetail` VALUES (47, 54, 8, 44, 34);
INSERT INTO `orderdetail` VALUES (48, 52, 1, 333, 12);
INSERT INTO `orderdetail` VALUES (49, 55, 1, 222, 12);
INSERT INTO `orderdetail` VALUES (50, 51, 1, 45, 30);
INSERT INTO `orderdetail` VALUES (51, 54, 1, 44, 34);
INSERT INTO `orderdetail` VALUES (52, 52, 1, 333, 12);
INSERT INTO `orderdetail` VALUES (53, 54, 1, 44, 34);
INSERT INTO `orderdetail` VALUES (54, 52, 13, 333, 12);
INSERT INTO `orderdetail` VALUES (54, 55, 13, 222, 12);
INSERT INTO `orderdetail` VALUES (55, 51, 12, 45, 30);
INSERT INTO `orderdetail` VALUES (56, 52, 1, 333, 12);
INSERT INTO `orderdetail` VALUES (57, 55, 1, 222, 12);
INSERT INTO `orderdetail` VALUES (58, 56, 1, 44, 34);
INSERT INTO `orderdetail` VALUES (59, 54, 1, 44, 34);
INSERT INTO `orderdetail` VALUES (60, 52, 1, 333, 12);
INSERT INTO `orderdetail` VALUES (61, 52, 1, 333, 12);
INSERT INTO `orderdetail` VALUES (62, 53, 1, 333, 3);
INSERT INTO `orderdetail` VALUES (63, 57, 1, 222, 23);
INSERT INTO `orderdetail` VALUES (63, 51, 1, 45, 30);
INSERT INTO `orderdetail` VALUES (64, 52, 1, 333, 12);
INSERT INTO `orderdetail` VALUES (65, 51, 1, 45, 30);
INSERT INTO `orderdetail` VALUES (66, 52, 1, 333, 12);
INSERT INTO `orderdetail` VALUES (67, 51, 1, 45, 30);
INSERT INTO `orderdetail` VALUES (67, 52, 1, 333, 12);
INSERT INTO `orderdetail` VALUES (68, 52, 1, 333, 12);
INSERT INTO `orderdetail` VALUES (69, 57, 177, 222, 23);
INSERT INTO `orderdetail` VALUES (70, 58, 10, 35, 443);
INSERT INTO `orderdetail` VALUES (70, 56, 1, 44, 34);
INSERT INTO `orderdetail` VALUES (71, 52, 1, 333, 12);

-- --------------------------------------------------------

-- 
-- Table structure for table `orderfood`
-- 

CREATE TABLE `orderfood` (
  `order_id` int(5) NOT NULL auto_increment,
  `member_id` int(5) NOT NULL,
  `psn_id` int(5) NOT NULL,
  `order_date` date NOT NULL,
  `order_status` enum('wait','pay','send','confirm') NOT NULL,
  `order_send_date` date NOT NULL,
  PRIMARY KEY  (`order_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=72 ;

-- 
-- Dumping data for table `orderfood`
-- 

INSERT INTO `orderfood` VALUES (71, 6, 0, '2017-02-15', 'wait', '0000-00-00');
INSERT INTO `orderfood` VALUES (70, 6, 0, '2017-02-15', 'send', '2017-02-15');
INSERT INTO `orderfood` VALUES (69, 6, 1, '2017-02-14', 'wait', '0000-00-00');
INSERT INTO `orderfood` VALUES (68, 6, 1, '2017-02-14', 'pay', '2017-02-15');
INSERT INTO `orderfood` VALUES (67, 6, 1, '2017-02-13', 'pay', '2017-02-14');
INSERT INTO `orderfood` VALUES (66, 1, 1, '2017-02-13', 'pay', '2017-02-13');
INSERT INTO `orderfood` VALUES (65, 6, 1, '2017-02-13', 'pay', '2017-02-13');

-- --------------------------------------------------------

-- 
-- Table structure for table `personnel`
-- 

CREATE TABLE `personnel` (
  `psn_id` int(5) NOT NULL auto_increment,
  `username` varchar(20) collate utf8_unicode_ci NOT NULL,
  `password` varchar(20) collate utf8_unicode_ci NOT NULL,
  `psn_name` varchar(20) collate utf8_unicode_ci NOT NULL,
  `psn_position` varchar(20) collate utf8_unicode_ci NOT NULL,
  `psn_sex` varchar(5) collate utf8_unicode_ci NOT NULL,
  `psn_address` varchar(100) collate utf8_unicode_ci NOT NULL,
  `psn_mobile` varchar(10) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`psn_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

-- 
-- Dumping data for table `personnel`
-- 

INSERT INTO `personnel` VALUES (1, 'admin', '1234', 'Pmorakotnaka', '1', 'man', '                                \r\n             kku               ', '123456789');
INSERT INTO `personnel` VALUES (2, 'pink', '12345', 'นาย ปิยฤทธิ์  มรกตนา', '0', 'woman', '80 หมู่ 4 ตำบลชุมแพ อ.ชุมแพ จ.ขอนแก่น                         \r\n                            ', '0874917153');

-- --------------------------------------------------------

-- 
-- Table structure for table `status`
-- 

CREATE TABLE `status` (
  `status` int(5) NOT NULL auto_increment,
  `name` varchar(5) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`status`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `status`
-- 

INSERT INTO `status` VALUES (1, '1');
