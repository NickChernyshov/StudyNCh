-- phpMyAdmin SQL Dump
-- version 4.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 11, 2013 at 10:00 PM
-- Server version: 5.5.31
-- PHP Version: 5.3.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `reg`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `autor` varchar(20) NOT NULL,
  `title` varchar(35) NOT NULL,
  `article` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `autor`, `title`, `article`) VALUES
(1, 'Nick', 'firstArticle', '123456'),
(2, 'Nick', '2', '2'),
(3, 'Nick', '3', '3'),
(4, 'Nick', '4', '4'),
(5, 'Nick', '5', '5'),
(6, 'Zero', '', '123'),
(7, 'Zero', '', '12 131'),
(8, 'Zero', '12', ''),
(9, 'Zero', '12', ''),
(10, 'Zero', '12', '134 46463413');

-- --------------------------------------------------------

--
-- Table structure for table `coments`
--

CREATE TABLE IF NOT EXISTS `coments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `autor` varchar(20) NOT NULL,
  `title` varchar(35) NOT NULL,
  `logUser` varchar(20) NOT NULL,
  `comment` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `coments`
--

INSERT INTO `coments` (`id`, `autor`, `title`, `logUser`, `comment`) VALUES
(5, 'Nick', 'firstArticle', 'Zero', '111'),
(6, 'Nick', '2', 'Zero', '22222'),
(7, 'Nick', 'firstArticle', 'unregisred', '123456'),
(8, 'Nick', '2', 'unregisred', '22222');

-- --------------------------------------------------------

--
-- Table structure for table `indexpayment`
--

CREATE TABLE IF NOT EXISTS `indexpayment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(20) NOT NULL,
  `lastLight` varchar(10) DEFAULT NULL,
  `lastGas` varchar(10) DEFAULT NULL,
  `lastWaterKitchen` varchar(10) DEFAULT NULL,
  `lastWaterWC` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `indexpayment`
--

INSERT INTO `indexpayment` (`id`, `login`, `lastLight`, `lastGas`, `lastWaterKitchen`, `lastWaterWC`) VALUES
(2, 'Zero', '2', '2', '2', '2'),
(3, 'Nick', '16124', '11464', '55', '59');

-- --------------------------------------------------------

--
-- Table structure for table `rates`
--

CREATE TABLE IF NOT EXISTS `rates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `light` varchar(20) DEFAULT NULL,
  `moreLight` varchar(20) DEFAULT NULL,
  `gas` varchar(20) DEFAULT NULL,
  `water` varchar(20) DEFAULT NULL,
  `sewage` varchar(20) DEFAULT NULL,
  `trash` varchar(20) DEFAULT NULL,
  `house` varchar(20) DEFAULT NULL,
  `TV` varchar(20) DEFAULT NULL,
  `idRates` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `rates`
--

INSERT INTO `rates` (`id`, `light`, `moreLight`, `gas`, `water`, `sewage`, `trash`, `house`, `TV`, `idRates`) VALUES
(1, '0.2802', '0.3648', '0.7254', '2.74', '1.79', '19.23', '55.04', '35', '1');

-- --------------------------------------------------------

--
-- Table structure for table `users2`
--

CREATE TABLE IF NOT EXISTS `users2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(20) NOT NULL,
  `password` varchar(35) NOT NULL,
  `firstName` varchar(20) DEFAULT NULL,
  `lastName` varchar(20) DEFAULT NULL,
  `street` varchar(15) DEFAULT NULL,
  `building` varchar(4) DEFAULT NULL,
  `flat` varchar(4) DEFAULT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(15) NOT NULL,
  `image` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `users2`
--

INSERT INTO `users2` (`id`, `login`, `password`, `firstName`, `lastName`, `street`, `building`, `flat`, `phone`, `email`, `image`) VALUES
(1, 'Nick', 'e10adc3949ba59abbe56e057f20f883e', 'Mykola', 'Chernyshov', 'Хоткевича', '54', '4', '0967578792', 'nick84@meta.ua', 'beard_smile.jpg'),
(2, 'Zero', 'e10adc3949ba59abbe56e057f20f883e', 'z', 'c', 'Івасюка', '38', '', '112', 'z@mail.ru', 'smile.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
