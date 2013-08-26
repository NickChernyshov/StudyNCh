-- phpMyAdmin SQL Dump
-- version 4.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 26, 2013 at 01:25 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `autor`, `title`, `article`) VALUES
(1, 'Nick', 'Discount', 'Disneyland is a place that is loved by almost every person in the world, and it is considered to be the funniest and happiest place in the world. However, to get happiness we have to pay a price.'),
(2, 'Nick', 'Exercising', 'Each American Fiberglass Pools is manufactured under rigid quality-controlled conditions.'),
(3, 'Nick', 'MoveHeavyFurniture', 'Conducting a move is not only stressful, it could be dangerous as well. If you are not careful, you might hurt your back or limbs when you unload or unpack heavy furniture.'),
(4, 'Nick', 'IdealHome', 'Finding the ideal home can be difficult but with a bit of help you can get your dream house. Make use of realtors and the Internet to ensure that you get exactly what you are looking for.'),
(5, 'Mykola', 'Soap', 'Who does not want a beautiful, soft and silk-smooth skin? However, acne seems to shatter the dreams of many.'),
(6, 'Mykola', 'Gallium', 'A truly peculiar metal with an ultra low melting point of just 29.76 °C (85.57 °F) and the ability to attack most other metals by diffusing into their metal lattice (greatly weakening their structure).'),
(7, 'Mykola', 'Hawaii', 'Situated in the vast Pacific Ocean is a 2,400 km chain of islands better known as Hawaii. Hawaii is unlike no other; every island, atoll, and islet have once been a monstrous volcano making each one of these places unique in every way possible.'),
(8, 'Mykola', 'Chinese', 'Nova Cidade de Kilamba, or simply Kilamba is a large housing development 30 km (18 miles) from Luanda, the capital city of Angola. It is being built by the CITIC Group and is currently largely empty.'),
(9, 'Zero', 'Cars', 'This is going to be a multi-part series as there are just too many icons from the 90s era that we believe deserve our attention. Here are five that we wanted to start the series with.'),
(10, 'Zero', 'Titanoboa', 'Millions of years after the fall of the Dinosaurs lived a species of snake that is unimaginable, unbelievable, and truly mind-blowing.'),
(11, 'Zero', 'Submarine', 'The repair of the only Ukrainian submarine is finally over. Its activation will not only raise the security of the Ukrainian Black Sea.');

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
) ENGINE=InnoDB  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `coments`
--

INSERT INTO `coments` (`id`, `autor`, `title`, `logUser`, `comment`) VALUES
(3, 'Nick', 'Discount', 'Nick', 'it is cool'),
(4, 'Nick', 'Exercising', 'Nick', 'interesting'),
(5, 'Nick', 'Discount', 'Mykola', 'Wow'),
(6, 'Nick', 'IdealHome', 'Mykola', 'sweet'),
(7, 'Mykola', 'Gallium', 'Mykola', 'super ;-)'),
(8, 'Mykola', 'Chinese', 'Mykola', '))))))))))))))))))'),
(9, 'Mykola', 'Chinese', 'Zero', 'so long'),
(10, 'Zero', 'Submarine', 'Zero', 'good'),
(11, 'Nick', 'Discount', 'Zero', 'owesome'),
(12, 'Nick', 'Exercising', 'Zero', '+'),
(13, 'Nick', 'Discount', 'unregisred', 'so exciting'),
(14, 'Mykola', 'Hawaii', 'unregisred', 'cool'),
(15, 'Zero', 'Submarine', 'unregisred', 'Wow');

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
(1, 'Mykola', '20', '40', '60', '80'),
(2, 'Zero', '2', '4', '6', '8'),
(3, 'Nick', '200', '400', '600', '800');

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
) ENGINE=InnoDB  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `rates`
--

INSERT INTO `rates` (`id`, `light`, `moreLight`, `gas`, `water`, `sewage`, `trash`, `house`, `TV`, `idRates`) VALUES
(4, '0.2802', '0.3648', '0.7254', '2.74', '1.79', '19.23', '55.04', '35', '1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `firstName`, `lastName`, `street`, `building`, `flat`, `phone`, `email`, `image`) VALUES
(3, 'Nick', 'e10adc3949ba59abbe56e057f20f883e', 'Mykola', 'Chernyshov', 'Хоткевича', '54', '4', '0967578792', 'nick84@meta.ua', 'hat_smile.jpg'),
(4, 'Zero', 'e10adc3949ba59abbe56e057f20f883e', '', '', '', '', '', '112', 'z@mail.ru', ''),
(10, 'Mykola', '090a423bb6c3d006ffe681be7e985d99', 'XMykola', 'XChern', 'Івасюка', '36', '', '+380983435362', 'mykola@mail.ru', 'happy_smile.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
