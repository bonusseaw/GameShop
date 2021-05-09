-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 23 ต.ค. 2020 เมื่อ 12:37 PM
-- เวอร์ชันของเซิร์ฟเวอร์: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `game`
--

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `passwd` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `idLine` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- dump ตาราง `members`
--

INSERT INTO `members` (`id`, `username`, `passwd`, `name`, `surname`, `idLine`) VALUES
(7, 'kaow', '3ec90e60707e1fb7d7b19656681ab12b', '', '', ''),
(8, 'love', '81dc9bdb52d04dc20036dbd8313ed055', '', '', ''),
(602549459, 'bonus_seaw', '123456', 'สุพิชชา', 'วงษ์ทองแท้', 'bonussab');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `product`
--

CREATE TABLE `product` (
  `id` int(8) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `price` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- dump ตาราง `product`
--

INSERT INTO `product` (`id`, `name`, `code`, `image`, `price`) VALUES
(1, 'age of empires IV', '61676534', 'shoppingItem\\age-of-empires-IV.jpg', 699.00),
(2, 'assassins creed odyssey', '65646F64', 'shoppingItem\\assassins-creed-odyssey.jpg', 1600.00),
(3, 'assetto corsa', '73636F72', 'shoppingItem\\assetto-corsa.jpg', 289.00),
(4, 'cities skylines deluxe edition', 'B7964656', 'shoppingItem\\cities-skylines-deluxe-edition.jpg', 559.00),
(5, 'ea sports fifa 21', '06F72747', 'shoppingItem\\ea-sports-fifa-21.jpg', 1899.00),
(6, 'fight of animals', '616E696D', 'shoppingItem\\fight-of-animals.jpg', 189.00),
(7, 'grand theft auto V', '67746156', 'shoppingItem\\grand-theft-auto-V.jpg', 349.50),
(8, 'hollow knight', 'F6C6B6E6', 'shoppingItem\\hollow-knight.jpg', 315.00),
(9, 'house flipper', 'F757366C', 'shoppingItem\\house-flipper.jpg', 289.00),
(10, 'monster hunter world', '6D6F6E73', 'shoppingItem\\monster-hunter-world.jpg', 739.00),
(11, 'mount your friends 3D', '6D6F756E', 'shoppingItem\\mount-your-friends-3D.jpg', 129.00),
(12, 'my time at portia', 'D7469617', 'shoppingItem\\my-time-at-portia.jpg', 549.00),
(13, 'phasmophobia', '7061736D', 'shoppingItem\\phasmophobia.jpg', 229.00),
(14, 'sea of thieves', '73656F74', 'shoppingItem\\sea-of-thieves.jpg', 469.00),
(15, 'sid meier\'s civilization VI', '6C695649', 'shoppingItem\\sid-meier\'s-civilization-VI.jpg', 1600.00),
(16, 'stardew valley', '6476616C', 'shoppingItem\\stardew-valley.jpg', 315.00),
(17, 'the witcher 3', '74687769', 'shoppingItem\\the-witcher-3.jpg', 1039.99),
(18, 'thief simulator', '73696D72', 'shoppingItem\\thief-simulator.jpg', 289.00),
(19, 'tomb raider', '746F6D72', 'shoppingItem\\tomb-raider.jpg', 647.50),
(20, 'sonic', '736F6E69', 'shoppingItem\\sonic.jpg', 369.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=602549460;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
