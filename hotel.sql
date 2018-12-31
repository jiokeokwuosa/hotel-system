-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2018 at 01:47 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_table`
--

CREATE TABLE IF NOT EXISTS `access_table` (
  `access_name` varchar(40) NOT NULL,
  `access_level` int(11) NOT NULL,
  PRIMARY KEY (`access_level`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `access_table`
--

INSERT INTO `access_table` (`access_name`, `access_level`) VALUES
('Director', 1),
('Manager', 2),
('Receptionist', 3),
('Bar', 4),
('Restaurant', 5);

-- --------------------------------------------------------

--
-- Table structure for table `checkin`
--

CREATE TABLE IF NOT EXISTS `checkin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `room_id` int(11) NOT NULL,
  `amount` varchar(20) NOT NULL,
  `num` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(10) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `uploader_id` varchar(40) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `session_id` varchar(200) NOT NULL,
  `print_status` varchar(20) NOT NULL DEFAULT 'false',
  `checkout_status` varchar(10) NOT NULL DEFAULT 'false',
  `checkout_date` datetime DEFAULT NULL,
  `checkout_id` int(11) DEFAULT NULL,
  `day` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `checkin`
--

INSERT INTO `checkin` (`id`, `room_id`, `amount`, `num`, `first_name`, `last_name`, `phone`, `email`, `uploader_id`, `date_created`, `session_id`, `print_status`, `checkout_status`, `checkout_date`, `checkout_id`, `day`, `month`, `year`) VALUES
(1, 27, '15000', 1, 'Esther', 'Okafor', '07037381011', 'donaldblessing9@hotmail.com', '1', '2018-06-29 23:45:46', 'n0cj9fqdtjfdbg8qg032i8bn33', 'false', 'false', NULL, NULL, 29, 6, 2018);

-- --------------------------------------------------------

--
-- Table structure for table `drinks`
--

CREATE TABLE IF NOT EXISTS `drinks` (
  `drink_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(2000) NOT NULL,
  `price` varchar(2000) NOT NULL,
  `uploader_id` varchar(10) NOT NULL,
  `upload_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`drink_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=151 ;

--
-- Dumping data for table `drinks`
--

INSERT INTO `drinks` (`drink_id`, `name`, `price`, `uploader_id`, `upload_date`) VALUES
(30, 'malt drink', '300', '', '2018-06-28 23:11:39'),
(32, 'Gulder', '400', '', '2018-06-28 23:11:39'),
(33, 'Heineken', '450', '', '2018-06-28 23:11:39'),
(34, 'Sprite', '300', '', '2018-06-28 23:11:39'),
(35, 'Star', '350', '', '2018-06-28 23:11:39'),
(36, 'Star Radler', '350', '', '2018-06-28 23:11:39'),
(37, 'LEGEND (Big)', '450', '', '2018-06-28 23:11:39'),
(38, 'LIFE', '350', '', '2018-06-28 23:11:39'),
(39, '33', '350', '', '2018-06-28 23:11:39'),
(40, 'HARP', '350', '', '2018-06-28 23:11:39'),
(41, 'ORIGIN', '350', '', '2018-06-28 23:11:39'),
(42, 'HERO', '350', '', '2018-06-28 23:11:39'),
(43, 'SMIRNOFF ICE (Small)', '350', '', '2018-06-28 23:11:39'),
(44, 'CASTLE', '300', '', '2018-06-28 23:11:39'),
(45, 'Big CASTLE', '400', '', '2018-06-28 23:11:39'),
(46, '1960 ROOTS', '300', '', '2018-06-28 23:11:39'),
(47, 'REDDS', '300', '', '2018-06-28 23:11:39'),
(48, 'STAR LITE ', '300', '', '2018-06-28 23:11:39'),
(49, 'EAGLE STOUT ', '300', '', '2018-06-28 23:11:39'),
(50, 'Small HERO', '300', '', '2018-06-28 23:11:39'),
(51, 'CASTLE CHOCOLATE', '300', '', '2018-06-28 23:11:39'),
(52, 'CASTLE LITE', '300', '', '2018-06-28 23:11:39'),
(53, 'SMIRNOFF ICE (Big)', '450', '', '2018-06-28 23:11:39'),
(54, 'HENNESSY (VS)', '15000', '', '2018-06-28 23:11:39'),
(55, 'HENNESSY (VSOP)', '25000', '', '2018-06-28 23:11:39'),
(56, 'MC DOWELLS', '4000', '', '2018-06-28 23:11:39'),
(57, 'Martello Vs', '14000', '', '2018-06-28 23:11:39'),
(58, 'Courvoisier Vs', '14000', '', '2018-06-28 23:11:39'),
(59, 'Martini', '12000', '', '2018-06-28 23:11:39'),
(60, 'Grant ', '14000', '', '2018-06-28 23:11:39'),
(61, 'Campari', '7000', '', '2018-06-28 23:11:39'),
(62, 'Baileys', '6000', '', '2018-06-28 23:11:39'),
(63, 'Amarula', '6000', '', '2018-06-28 23:11:39'),
(64, 'Red Label', '6000', '', '2018-06-28 23:11:39'),
(65, 'Black Label', '12000', '', '2018-06-28 23:11:39'),
(66, 'Jack Daniels', '14000', '', '2018-06-28 23:11:39'),
(67, 'Chivas Regal', '14000', '', '2018-06-28 23:11:39'),
(68, 'Chapman', '800', '', '2018-06-28 23:11:39'),
(69, 'Cinderella ', '700', '', '2018-06-28 23:11:39'),
(70, 'Beautiful Gate Delight', '700', '', '2018-06-28 23:11:39'),
(71, 'pineapple Smoothie', '1000', '', '2018-06-28 23:11:39'),
(72, 'Banana Smoothie', '1000', '', '2018-06-28 23:11:39'),
(73, 'Water Melon Smoothie', '1000', '', '2018-06-28 23:11:39'),
(74, 'Apple Smoothie', '1000', '', '2018-06-28 23:11:39'),
(75, 'Spritz (Campari & White Wine)per Tot', '400', '', '2018-06-28 23:11:39'),
(76, 'Long lsland lce Tea', '1000', '', '2018-06-28 23:11:39'),
(77, 'palm Beach', '1000', '', '2018-06-28 23:11:39'),
(78, 'Cliquot', '25000', '', '2018-06-28 23:11:39'),
(79, 'Moet', '26000', '', '2018-06-28 23:11:39'),
(80, 'Andre', '6000', '', '2018-06-28 23:11:39'),
(81, 'Henket', '6000', '', '2018-06-28 23:11:39'),
(82, 'Malta Guinness', '300', '', '2018-06-28 23:11:39'),
(83, 'Amstel Malt', '300', '', '2018-06-28 23:11:39'),
(84, 'Fayrouz', '300', '', '2018-06-28 23:11:39'),
(85, 'Fanta', '300', '', '2018-06-28 23:11:39'),
(86, 'Coca Cola', '300', '', '2018-06-28 23:11:39'),
(87, 'Bottled Water (75cl)', '150', '', '2018-06-28 23:11:39'),
(88, 'Bottled Water (1L)', '300', '', '2018-06-28 23:11:39'),
(89, 'Happy Hour', '800', '', '2018-06-28 23:11:39'),
(90, 'Chivita', '800', '', '2018-06-28 23:11:39'),
(91, 'Exotic', '800', '', '2018-06-28 23:11:39'),
(92, 'Five Alive', '800', '', '2018-06-28 23:11:39'),
(93, 'Hollandia Yoghurt', '800', '', '2018-06-28 23:11:39'),
(94, 'Farm Pride Yoghurt (small)', '700', '', '2018-06-28 23:11:39'),
(95, 'Farm Pride Yoghurt (Big)', '1000', '', '2018-06-28 23:11:39'),
(96, 'Angel', '5000', '', '2018-06-28 23:11:39'),
(97, 'B & B', '5000', '', '2018-06-28 23:11:39'),
(98, 'Pure Heaven', '5000', '', '2018-06-28 23:11:39'),
(99, 'Honey Moon', '5000', '', '2018-06-28 23:11:39'),
(100, 'Golden Heaven', '5000', '', '2018-06-28 23:11:39'),
(113, 'Guinness Stout (small)', '350', '', '2018-06-28 23:11:39'),
(114, 'Guinness Stout (BIG)', '550', '', '2018-06-28 23:11:39'),
(115, 'Guinness stout (MediuM)', '450', '', '2018-06-28 23:11:39'),
(117, 'SNAPP', '300', '', '2018-06-28 23:11:39'),
(118, 'Tappers', '350', '', '2018-06-28 23:11:39'),
(119, 'ORIGIN BIG', '450', '', '2018-06-28 23:11:39'),
(120, 'LEGEND ', '450', '', '2018-06-28 23:11:39'),
(121, 'BEST CREAM', '1500', '', '2018-06-28 23:11:39'),
(122, 'BEST WHISKY', '1000', '', '2018-06-28 23:11:39'),
(123, 'BEST GORDON DRY GIN', '600', '', '2018-06-28 23:11:39'),
(124, 'ORIGIN BITTERS', '500', '', '2018-06-28 23:11:39'),
(125, 'AMARULA SMALL', '4000', '', '2018-06-28 23:11:39'),
(126, 'HENKELL', '6000', '', '2018-06-28 23:11:39'),
(127, 'VITA MILK', '400', '', '2018-06-28 23:11:39'),
(128, 'CLIMAX', '500', '', '2018-06-28 23:11:39'),
(129, 'BLACK BULLET', '500', '', '2018-06-28 23:11:39'),
(130, 'Campari Small', '2500', '', '2018-06-28 23:11:39'),
(131, 'smirnoff ice vodka', '700', '', '2018-06-28 23:11:39'),
(132, 'coke', '300', '', '2018-06-28 23:11:39'),
(133, 'Mirinda', '300', '', '2018-06-28 23:11:39'),
(134, '7 UP', '300', '', '2018-06-28 23:11:39'),
(135, 'Pepsi', '300', '', '2018-06-28 23:11:39'),
(136, 'Rapha Yoghurt', '400', '', '2018-06-28 23:11:39'),
(137, 'Nutri Milk', '300', '', '2018-06-28 23:11:39'),
(138, '8PM', '10000', '', '2018-06-28 23:11:39'),
(139, 'Classic Rose', '6000', '', '2018-06-28 23:11:39'),
(140, 'Magic Moment', '6000', '', '2018-06-28 23:11:39'),
(141, 'Strabull Red wine', '5000', '', '2018-06-28 23:11:39'),
(142, 'MC DOWELLS V.S.O.P', '4000', '', '2018-06-28 23:11:39'),
(143, 'BEST CLASSIC WHISKY', '4000', '', '2018-06-28 23:11:39'),
(144, 'MOSCATO', '5000', '', '2018-06-28 23:11:39'),
(145, 'DOLCE VITA GRAPE', '5000', '', '2018-06-28 23:11:39'),
(146, 'Spring valley', '6000', '', '2018-06-28 23:11:39'),
(147, 'DON morris', '6000', '', '2018-06-28 23:11:39'),
(148, 'Classic red wine', '6000', '', '2018-06-28 23:11:39'),
(149, 'Martini rose ', '7000', '', '2018-06-28 23:11:39'),
(150, 'Martini Bitters', '4000', '', '2018-06-28 23:11:39');

-- --------------------------------------------------------

--
-- Table structure for table `drink_order`
--

CREATE TABLE IF NOT EXISTS `drink_order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `drink_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `num` int(11) NOT NULL,
  `uploader_id` varchar(10) NOT NULL,
  `date_received` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `session_id` varchar(200) NOT NULL,
  `print_status` varchar(10) NOT NULL DEFAULT 'false',
  `day` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `drink_order`
--

INSERT INTO `drink_order` (`order_id`, `drink_id`, `amount`, `num`, `uploader_id`, `date_received`, `session_id`, `print_status`, `day`, `month`, `year`) VALUES
(1, 46, 300, 2, '1', '2018-06-29 12:57:50', 'bhq1dev595mlpm96bk3fl5f5ct', 'true', 0, 0, 0),
(2, 43, 350, 4, '1', '2018-06-29 12:58:50', 'bhq1dev595mlpm96bk3fl5f5ct', 'true', 0, 0, 0),
(3, 32, 400, 2, '1', '2018-06-29 13:11:02', 'bhq1dev595mlpm96bk3fl5f5ct', 'true', 0, 0, 0),
(4, 30, 300, 5, '1', '2018-06-29 18:29:04', '7vq7gbtb3r3vcgknmabo88nhgq', 'true', 29, 6, 2018),
(5, 32, 400, 2, '1', '2018-06-29 18:44:02', '7vq7gbtb3r3vcgknmabo88nhgq', 'true', 29, 5, 2018),
(6, 37, 450, 2, '1', '2018-06-29 19:33:21', 'bhq1dev595mlpm96bk3fl5f5ct', 'false', 29, 6, 2018),
(7, 47, 300, 4, '1', '2018-06-29 19:33:30', 'bhq1dev595mlpm96bk3fl5f5ct', 'false', 29, 6, 2018);

-- --------------------------------------------------------

--
-- Table structure for table `foods`
--

CREATE TABLE IF NOT EXISTS `foods` (
  `food_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(2000) NOT NULL,
  `price` varchar(2000) NOT NULL,
  `uploader_id` varchar(10) NOT NULL,
  `upload_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`food_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=113 ;

--
-- Dumping data for table `foods`
--

INSERT INTO `foods` (`food_id`, `name`, `price`, `uploader_id`, `upload_date`) VALUES
(29, 'salad', '700', '', '2018-06-28 23:11:39'),
(77, 'palm Beach', '1000', '', '2018-06-28 23:11:39'),
(101, 'Bread with Omelet And tea/coffee/Chocolate', '1000', '', '2018-06-28 23:11:39'),
(102, 'Bread with Omelet and Coffee', '1000', '', '2018-06-28 23:11:39'),
(103, 'Bread Omelet and Chocolate', '1000', '', '2018-06-28 23:11:39'),
(104, 'Noodle with Omelet and Vegetables', '1200', '', '2018-06-28 23:11:39'),
(105, 'French Fries ,with Egg sace', ' 1500', '', '2018-06-28 23:11:39'),
(106, 'Fried Yam with Egg sauce', '1800', '', '2018-06-28 23:11:39'),
(107, 'Boiled yam,with egg sauce', '1800', '', '2018-06-28 23:11:39'),
(108, 'Fried plantain with sauce', '1800', '', '2018-06-28 23:11:39'),
(109, 'Boiled plantain with egg sauce', '1800', '', '2018-06-28 23:11:39'),
(110, 'Oatmeal and Bread or plantain', '1500', '', '2018-06-28 23:11:39'),
(111, 'Sandwich with Tea/Coffee', '1500', '', '2018-06-28 23:11:39'),
(112, 'Bread potatoes with Sausaga served with Tea/Coffee', '1000', '', '2018-06-28 23:11:39');

-- --------------------------------------------------------

--
-- Table structure for table `food_order`
--

CREATE TABLE IF NOT EXISTS `food_order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `food_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `num` int(11) NOT NULL,
  `uploader_id` varchar(10) NOT NULL,
  `date_received` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `session_id` varchar(200) NOT NULL,
  `print_status` varchar(10) NOT NULL DEFAULT 'false',
  `day` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `food_order`
--

INSERT INTO `food_order` (`order_id`, `food_id`, `amount`, `num`, `uploader_id`, `date_received`, `session_id`, `print_status`, `day`, `month`, `year`) VALUES
(1, 110, 1500, 3, '1', '2018-06-29 13:29:15', '7vq7gbtb3r3vcgknmabo88nhgq', 'true', 0, 0, 0),
(2, 29, 700, 5, '1', '2018-06-29 13:29:46', 'bhq1dev595mlpm96bk3fl5f5ct', 'true', 0, 0, 0),
(3, 77, 1000, 2, '1', '2018-06-29 18:35:58', '7vq7gbtb3r3vcgknmabo88nhgq', 'true', 0, 0, 0),
(4, 107, 1800, 2, '1', '2018-06-29 18:37:22', 'bhq1dev595mlpm96bk3fl5f5ct', 'true', 0, 0, 0),
(5, 29, 700, 4, '1', '2018-06-29 18:44:48', '7vq7gbtb3r3vcgknmabo88nhgq', 'true', 0, 0, 0),
(6, 29, 700, 1, '1', '2018-06-29 18:47:01', '7vq7gbtb3r3vcgknmabo88nhgq', 'true', 0, 0, 0),
(7, 77, 1000, 3, '1', '2018-06-29 20:51:47', '7vq7gbtb3r3vcgknmabo88nhgq', 'false', 29, 6, 2018),
(8, 77, 1000, 4, '1', '2018-06-29 20:52:29', '7vq7gbtb3r3vcgknmabo88nhgq', 'false', 29, 6, 2018);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE IF NOT EXISTS `rooms` (
  `room_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(2000) NOT NULL,
  `price` varchar(2000) NOT NULL,
  `uploader_id` varchar(20) NOT NULL,
  `uploader_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(10) NOT NULL DEFAULT 'false',
  PRIMARY KEY (`room_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=77 ;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_id`, `name`, `price`, `uploader_id`, `uploader_date`, `status`) VALUES
(24, 'STANDARD ROOM 104', '10000', '', '2018-06-29 00:14:28', 'true'),
(25, 'STANDARD ROOM 106', '10000', '', '2018-06-29 00:14:28', 'true'),
(26, 'STANDARD ROOM 108', '10000', '', '2018-06-29 00:14:28', 'true'),
(27, 'CLASSIC ROOM 105', '15000', '', '2018-06-29 00:14:28', 'true'),
(28, 'CLASSIC ROOM 107', '15000', '', '2018-06-29 00:14:28', 'false'),
(31, 'DELUX 214', '20000', '', '2018-06-29 00:14:28', 'false'),
(33, 'EXECUTIVE 201', '25000', '', '2018-06-29 00:14:28', 'false'),
(34, 'EXECUTIVE 204', '25000', '', '2018-06-29 00:14:28', 'false'),
(35, 'EXECUTIVE 205', '25000', '', '2018-06-29 00:14:28', 'false'),
(36, 'EXECUTIVE 206', '25000', '', '2018-06-29 00:14:28', 'true'),
(37, 'EXECUTIVE 208', '25000', '', '2018-06-29 00:14:28', 'false'),
(38, 'EXECUTIVE 211', '25000', '', '2018-06-29 00:14:28', 'false'),
(39, 'EXECUTIVE 216', '25000', '', '2018-06-29 00:14:28', 'false'),
(40, 'EXECUTIVE 217', '25000', '', '2018-06-29 00:14:28', 'false'),
(41, 'EXECUTIVE 218', '25000', '', '2018-06-29 00:14:28', 'false'),
(42, 'EXECUTIVE 219', '25000', '', '2018-06-29 00:14:28', 'false'),
(43, 'EXECUTIVE 220', '25000', '', '2018-06-29 00:14:28', 'false'),
(44, 'EXECUTIVE 301', '25000', '', '2018-06-29 00:14:28', 'false'),
(45, 'EXECUTIVE 302', '25000', '', '2018-06-29 00:14:28', 'false'),
(46, 'EXECUTIVE 303', '25000', '', '2018-06-29 00:14:28', 'false'),
(47, 'EXECUTIVE 305', '25000', '', '2018-06-29 00:14:28', 'false'),
(48, 'EXECUTIVE 306', '25000', '', '2018-06-29 00:14:28', 'false'),
(49, 'EXECUTIVE 307', '25000', '', '2018-06-29 00:14:28', 'false'),
(50, 'EXECUTIVE 309', '25000', '', '2018-06-29 00:14:28', 'false'),
(51, 'EXECUTIVE 311', '25000', '', '2018-06-29 00:14:28', 'false'),
(52, 'EXECUTIVE 312', '25000', '', '2018-06-29 00:14:28', 'false'),
(53, 'EXECUTIVE 313', '25000', '', '2018-06-29 00:14:28', 'false'),
(54, 'EXECUTIVE 314', '25000', '', '2018-06-29 00:14:28', 'false'),
(55, 'EXECUTIVE 315', '25000', '', '2018-06-29 00:14:28', 'false'),
(56, 'EXECUTIVE 316', '25000', '', '2018-06-29 00:14:28', 'false'),
(57, 'EXECUTIVE 317', '25000', '', '2018-06-29 00:14:28', 'false'),
(58, 'executive room 207', '200000', '', '2018-06-29 00:14:28', 'false'),
(59, 'CONTINENTAL SUITE 209', '40000', '', '2018-06-29 00:14:28', 'false'),
(60, 'CONTINENTAL SUITE 210', '40000', '', '2018-06-29 00:14:28', 'false'),
(61, 'CONTINENTAL SUITE 212', '40000', '', '2018-06-29 00:14:28', 'false'),
(62, 'CONTINENTAL SUITE 213', '40000', '', '2018-06-29 00:14:28', 'false'),
(63, 'ROYAL APARTMENT 308', '100000', '', '2018-06-29 00:14:28', 'false'),
(64, 'PRESIDENTIAL SUITE 310', '120000', '', '2018-06-29 00:14:28', 'false'),
(65, 'STUDI ROOM 402', '7000', '', '2018-06-29 00:14:28', 'false'),
(68, 'STUDI ROOM 406', '7000', '', '2018-06-29 00:14:28', 'false'),
(70, 'STUDI ROOM 408', '7000', '', '2018-06-29 00:14:28', 'false'),
(71, 'STANDARD ROOM 101', '10000', '', '2018-06-29 00:14:28', 'false'),
(72, 'DELUX 202', '20000', '', '2018-06-29 00:14:28', 'false'),
(73, 'DELUX 203', '20000', '', '2018-06-29 00:14:28', 'false'),
(74, 'DELUX 215', '20000', '', '2018-06-29 00:14:28', 'false'),
(76, 'Banquet Hall', '300000', '8', '2018-06-30 09:23:53', 'false');

-- --------------------------------------------------------

--
-- Table structure for table `staff_table`
--

CREATE TABLE IF NOT EXISTS `staff_table` (
  `staff_id` int(11) NOT NULL AUTO_INCREMENT,
  `login_id` varchar(20) NOT NULL,
  `password` varchar(60) NOT NULL,
  `access_level` int(11) NOT NULL,
  `creator` varchar(50) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`staff_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `staff_table`
--

INSERT INTO `staff_table` (`staff_id`, `login_id`, `password`, `access_level`, `creator`, `date_created`) VALUES
(1, 'Director', 'peet', 1, '', '2018-06-28 06:15:11'),
(8, 'Manager', '123', 2, '', '2018-06-28 21:34:04'),
(9, 'Receptionist', '123', 3, '', '2018-06-28 21:34:04'),
(10, 'Bar', '123', 4, '', '2018-06-28 21:34:04'),
(11, 'Resturant', '123', 5, '', '2018-06-28 21:34:04'),
(13, 'Africanqueen', '1234', 4, '1', '2018-06-28 22:46:16'),
(14, ' 	innoma4755', '1234', 4, '1', '2018-06-30 09:58:39'),
(15, ' 	blessing', '1234', 2, '1', '2018-06-30 10:01:09'),
(16, 'chidimma', '7788', 3, '1', '2018-06-30 11:48:02');

-- --------------------------------------------------------

--
-- Table structure for table `tempbar`
--

CREATE TABLE IF NOT EXISTS `tempbar` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `drink_id` int(11) NOT NULL,
  `num` varchar(10) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(10) NOT NULL,
  `room_no` varchar(10) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `verification_status` varchar(12) NOT NULL DEFAULT 'false',
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tempbar`
--

INSERT INTO `tempbar` (`order_id`, `drink_id`, `num`, `first_name`, `last_name`, `room_no`, `date_created`, `verification_status`) VALUES
(2, 42, '3', 'Obinna', 'Umelika', '2', '2018-06-30 00:29:52', 'true'),
(3, 43, '1', 'Chika', 'Okafor', '2', '2018-06-30 00:31:41', 'false');

-- --------------------------------------------------------

--
-- Table structure for table `tempfood`
--

CREATE TABLE IF NOT EXISTS `tempfood` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `food_id` int(11) NOT NULL,
  `num` varchar(10) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(10) NOT NULL,
  `room_no` varchar(10) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `verification_status` varchar(12) NOT NULL DEFAULT 'false',
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tempfood`
--

INSERT INTO `tempfood` (`order_id`, `food_id`, `num`, `first_name`, `last_name`, `room_no`, `date_created`, `verification_status`) VALUES
(1, 77, '2', 'Chika', 'Okafor', '105', '2018-06-30 01:46:10', 'false'),
(2, 29, '2', 'Chidi', 'Okeke', '2', '2018-06-30 01:46:43', 'false');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
