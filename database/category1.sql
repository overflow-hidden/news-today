-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2018-09-05 10:49:27
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- 表的结构 `news`
--
DROP TABLE IF EXISTS `news_category`;
CREATE TABLE IF NOT EXISTS `news_category` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `is_default` varchar (255) NOT NULL,

  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

INSERT INTO `news_category` (`id`,`name`,`is_default`) VALUES
(1,'推荐','1'),
(2,'汽车','1'),
(3,'体育','1'),
(4,'财经','1'),
(5,'军事','0'),
(6,'时尚','0'),
(7,'旅游','0'),
(8,'国际','1'),
(9,'热点','1'),
(10,'娱乐','1'),
(11,'社会','1'),
(12,'科技','0'),
(13,'旅游','0'),
(14,'探索','1'),
(15,'美文','1'),
(16,'历史','1'),
(17,'美食','1'),
(18,'故事','0'),
(19,'育儿','0'),
(20,'养生','0');
COMMIT ;
