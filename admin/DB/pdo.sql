-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2023 at 01:52 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";



--
-- Database: `pdo`
--

-- --------------------------------------------------------

--
-- Table structure for table `main_cname`
--

CREATE TABLE `main_cname` (
  `sl` int(11) NOT NULL,
  `cn` varchar(50) NOT NULL,
  `cad` varchar(100) NOT NULL,
  `dise_code` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `main_cname`
--

INSERT INTO `main_cname` (`sl`, `cn`, `cad`, `dise_code`) VALUES
(1, 'ONS', 'Krishnagar, Nadia, State : West Bengal', '');

-- --------------------------------------------------------

--
-- Table structure for table `main_log`
--

CREATE TABLE `main_log` (
  `sl` double NOT NULL,
  `username` varchar(300) NOT NULL,
  `ip` varchar(300) NOT NULL,
  `intime` varchar(300) NOT NULL,
  `laccessed` varchar(300) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `main_log`
--

INSERT INTO `main_log` (`sl`, `username`, `ip`, `intime`, `laccessed`) VALUES
(1, 'admin', '::1', '2023-01-06 13:43:22 PM', '2023-01-06 13:43:22 PM'),
(2, 'admin', '::1', '2023-01-06 13:45:06 PM', '2023-01-06 13:45:06 PM');

-- --------------------------------------------------------

--
-- Table structure for table `main_menu`
--

CREATE TABLE `main_menu` (
  `sl` int(11) NOT NULL,
  `mnm` varchar(300) NOT NULL COMMENT 'Menu Name',
  `page` varchar(300) NOT NULL COMMENT 'Page URL',
  `rmsl` int(11) NOT NULL COMMENT 'Root Menu SL',
  `ordr` int(11) NOT NULL COMMENT 'Order',
  `adlvl` varchar(300) NOT NULL COMMENT 'Additional Value',
  `icon` varchar(300) NOT NULL DEFAULT 'fa-edit',
  `user` text NOT NULL,
  `isall` int(11) NOT NULL,
  `stat` int(11) NOT NULL,
  `eby` varchar(300) NOT NULL,
  `edt` date NOT NULL,
  `edtm` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `main_menu`
--

INSERT INTO `main_menu` (`sl`, `mnm`, `page`, `rmsl`, `ordr`, `adlvl`, `icon`, `user`, `isall`, `stat`, `eby`, `edt`, `edtm`) VALUES
(1, 'Dashboard', '', 0, 0, '', 'fa-home', 'admin', 1, 0, 'admin', '2019-06-28', '2019-06-28 08:07:12 AM'),
(2, 'Setup', '#', 0, 1, '', 'fa-globe', 'admin', 1, 0, 'admin', '2019-06-28', '2019-06-28 08:07:24 AM'),
(3, 'View', '', 0, 2, '', 'fa-edit', 'admin', 1, 0, 'admin', '2019-06-28', '2019-06-28 08:08:03 AM'),
(4, 'Config', '#', 0, 10, '', 'fa-cog', 'admin', 1, 0, 'admin', '2019-06-28', '2019-06-28 08:08:17 AM'),
(11, 'Test', 'test.php', 2, 1, '', 'fa-edit', '', 0, 0, 'admin', '2023-01-06', '2023-01-06 06:14:27 AM'),
(12, 'Menu Setup', 'menu_setup.php', 4, 1, '', 'fa-edit', 'admin', 1, 0, 'admin', '2019-06-28', '2019-06-28 08:08:42 AM');

-- --------------------------------------------------------

--
-- Table structure for table `main_signup`
--

CREATE TABLE `main_signup` (
  `sl` double NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `pass` text NOT NULL,
  `name` varchar(100) NOT NULL,
  `fnm` varchar(333) NOT NULL,
  `lnm` varchar(333) NOT NULL,
  `mob` varchar(15) NOT NULL,
  `mailadres` varchar(100) DEFAULT NULL,
  `reg` varchar(33) NOT NULL,
  `council` varchar(333) NOT NULL,
  `state` varchar(33) NOT NULL,
  `actnum` int(11) NOT NULL DEFAULT 0,
  `userlevel` tinyint(4) DEFAULT NULL,
  `signupdate` varchar(100) DEFAULT NULL,
  `lastlogin` varchar(100) DEFAULT NULL,
  `ip` varchar(100) NOT NULL,
  `lastloginfail` bigint(20) DEFAULT NULL,
  `numloginfail` tinyint(4) DEFAULT NULL,
  `noofdownload` int(11) NOT NULL,
  `reqscheme` text NOT NULL,
  `dev_id` text NOT NULL,
  `stat` int(11) NOT NULL,
  `otp` varchar(333) NOT NULL,
  `noofreq` int(11) NOT NULL,
  `reqdt` date NOT NULL,
  `reqdtm` datetime NOT NULL,
  `sms` int(11) NOT NULL DEFAULT 0,
  `eby` varchar(300) NOT NULL,
  `edt` date NOT NULL,
  `edtm` varchar(300) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `main_signup`
--

INSERT INTO `main_signup` (`sl`, `username`, `password`, `pass`, `name`, `fnm`, `lnm`, `mob`, `mailadres`, `reg`, `council`, `state`, `actnum`, `userlevel`, `signupdate`, `lastlogin`, `ip`, `lastloginfail`, `numloginfail`, `noofdownload`, `reqscheme`, `dev_id`, `stat`, `otp`, `noofreq`, `reqdt`, `reqdtm`, `sms`, `eby`, `edt`, `edtm`) VALUES
(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', 'Administrator', '', '1234567890', 'test@ons.com', '', '', '', 0, -1, NULL, '2023-01-06 13:45:06 PM', '103.86.23.37', NULL, 0, 0, '', '', 1, '', 0, '0000-00-00', '0000-00-00 00:00:00', 1, 'admin', '2019-06-20', '2019-06-20 09:33:47 AM');

-- --------------------------------------------------------

--
-- Table structure for table `main_test`
--

CREATE TABLE `main_test` (
  `sl` int(11) NOT NULL,
  `ttl` varchar(333) NOT NULL,
  `edt` date NOT NULL,
  `edtm` varchar(300) NOT NULL,
  `eby` varchar(300) NOT NULL,
  `stat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `main_test`
--

INSERT INTO `main_test` (`sl`, `ttl`, `edt`, `edtm`, `eby`, `stat`) VALUES
(1, 'TEST 1', '2023-01-06', '2023-01-06 13:41:13 PM', 'admin', 0),
(2, 'TEST 2', '2022-03-01', '2022-03-01 12:16:02 PM', 'admin', 0),
(13, 'TEST 3', '2023-01-06', '2023-01-06 13:40:59 PM', 'admin', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `main_cname`
--
ALTER TABLE `main_cname`
  ADD PRIMARY KEY (`sl`);

--
-- Indexes for table `main_log`
--
ALTER TABLE `main_log`
  ADD PRIMARY KEY (`sl`);

--
-- Indexes for table `main_menu`
--
ALTER TABLE `main_menu`
  ADD PRIMARY KEY (`sl`);

--
-- Indexes for table `main_signup`
--
ALTER TABLE `main_signup`
  ADD PRIMARY KEY (`sl`);

--
-- Indexes for table `main_test`
--
ALTER TABLE `main_test`
  ADD PRIMARY KEY (`sl`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `main_cname`
--
ALTER TABLE `main_cname`
  MODIFY `sl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `main_log`
--
ALTER TABLE `main_log`
  MODIFY `sl` double NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `main_menu`
--
ALTER TABLE `main_menu`
  MODIFY `sl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT for table `main_signup`
--
ALTER TABLE `main_signup`
  MODIFY `sl` double NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=285;

--
-- AUTO_INCREMENT for table `main_test`
--
ALTER TABLE `main_test`
  MODIFY `sl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

