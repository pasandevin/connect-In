-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 01, 2021 at 01:33 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `connect-in`
--

-- --------------------------------------------------------

--
-- Table structure for table `connections`
--

DROP TABLE IF EXISTS `connections`;
CREATE TABLE IF NOT EXISTS `connections` (
  `username1` varchar(10) NOT NULL,
  `username2` varchar(10) NOT NULL,
  PRIMARY KEY (`username1`,`username2`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `connections`
--

INSERT INTO `connections` (`username1`, `username2`) VALUES
('bkamal', 'heshanm'),
('bkamal', 'manraj'),
('bkamal', 'meenak'),
('bkamal', 'piyath3'),
('bkamal', 'sayurig'),
('bkamal', 'shehanwalp'),
('bkamal', 'weere1'),
('bkamal', 'wins'),
('meenak', 'piyath3'),
('ridmaj', 'bkamal'),
('ridmaj', 'manraj'),
('ridmaj', 'piyath3'),
('ridmaj', 'sayurig'),
('ridmaj', 'shehanwalp'),
('ridmaj', 'weere1'),
('ridmaj', 'wins'),
('sayurig', 'manraj'),
('sayurig', 'meenak'),
('wins', 'shehanwalp'),
('wins', 'weere1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `email` varchar(40) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `username` varchar(10) NOT NULL,
  `bday` date NOT NULL,
  `pw` varchar(20) NOT NULL,
  PRIMARY KEY (`username`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`email`, `fname`, `lname`, `username`, `bday`, `pw`) VALUES
('kamalbandara@gmail.com', 'Kamal', 'Bandara', 'bkamal', '1999-08-04', 'Kamal123@band'),
('ridmajayasinghe98@gmail.com', 'Ridma', 'Jayasinghe', 'ridmaj', '1998-10-12', 'Jay#rid98'),
('sarathw@kln.ac.lk', 'Sarath', 'Weerawardene', 'weere1', '1992-03-05', '$aRath35w'),
('win97some@exchange.com', 'Win', 'Samarawickrama', 'wins', '1997-05-05', 'Winw1N*97'),
('shehanwalp@gmail.com', 'Shehan', 'Walpita', 'shehanwalp', '1994-12-05', '$hehaN34'),
('heshanm@gmail.com', 'Heshan', 'Madapatha', 'heshanm', '1991-07-07', 'H4sha910707Mdpth'),
('piyathgurusinghe@ms.com', 'Piyath', 'Gurusinghe', 'piyath3', '1993-03-15', 'P1yath)315'),
('manraj@icloud.com', 'Manny', 'Rajapaksha', 'manraj', '1988-08-22', 'M88Raj!22'),
('sayurigunathilaka@gmail.com', 'Sayuri', 'Gunathilaka', 'sayurig', '1997-06-02', '$aYu970622'),
('meenak@gmail.com', 'Meena', 'Kariyawasam', 'meenak', '1996-07-02', 'Meena@96-07');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
