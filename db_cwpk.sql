-- phpMyAdmin SQL Dump
-- version 4.7.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 23, 2018 at 11:41 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_cwpk`
--

-- --------------------------------------------------------

--
-- Table structure for table `album_details_tb`
--

CREATE TABLE `album_details_tb` (
  `id` int(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `tou` datetime NOT NULL,
  `toc` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `album_tb`
--

CREATE TABLE `album_tb` (
  `id` int(10) NOT NULL,
  `path` varchar(100) NOT NULL,
  `album_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `album_tb`
--

INSERT INTO `album_tb` (`id`, `path`, `album_id`) VALUES
(1, 'assets/images/album/album/1/1.jpg', 1),
(2, 'assets/images/album/album/1/2.jpg', 1),
(3, 'assets/images/album/album/1/3.jpg', 1),
(4, 'assets/images/album/album/1/4.jpg', 1),
(5, 'assets/images/album/album/1/5.jpg', 1),
(6, 'assets/images/album/album/1/6.jpg', 1),
(7, 'assets/images/album/album/1/7.jpg', 1),
(8, 'assets/images/album/album/1/8.jpg', 1),
(13, 'assets/images/album/album/2/1.jpg', 2),
(14, 'assets/images/album/album/2/2.jpg', 2),
(15, 'assets/images/album/album/2/3.jpg', 2),
(16, 'assets/images/album/album/2/4.jpg', 2),
(17, 'assets/images/album/album/2/5.jpg', 2),
(19, 'assets/images/album/album/2/6.jpg', 2),
(20, 'assets/images/album/album/2/7.jpg', 2),
(21, 'assets/images/album/album/2/8.jpg', 2),
(22, 'assets/images/album/album/2/9.jpg', 2),
(23, 'assets/images/album/album/2/10.jpg', 2),
(28, 'assets/images/album/album/4/1.jpg', 4),
(29, 'assets/images/album/album/4/2.jpg', 4),
(30, 'assets/images/album/album/4/3.jpg', 4),
(31, 'assets/images/album/album/4/4.jpg', 4),
(32, 'assets/images/album/album/4/5.jpg', 4),
(33, 'assets/images/album/album/4/6.jpg', 4),
(35, 'assets/images/album/album/4/7.jpg', 4),
(36, 'assets/images/album/album/4/8.jpg', 4),
(37, 'assets/images/album/album/4/9.jpg', 4),
(39, 'assets/images/album/album/4/10.jpg', 4),
(40, 'assets/images/album/album/4/11.jpg', 4),
(41, 'assets/images/album/album/4/12.jpg', 4),
(42, 'assets/images/album/album/4/13.jpg', 4),
(43, 'assets/images/album/album/4/14.jpg', 4),
(44, 'assets/images/album/album/4/15.jpg', 4),
(45, 'assets/images/album/album/4/16.jpg', 4),
(46, 'assets/images/album/album/4/17.jpg', 4),
(47, 'assets/images/album/album/4/18.jpg', 4),
(96, 'assets/images/album/album/5/1.jpg', 5),
(97, 'assets/images/album/album/5/2.jpg', 5),
(98, 'assets/images/album/album/5/3.jpg', 5),
(99, 'assets/images/album/album/5/4.jpg', 5),
(100, 'assets/images/album/album/5/5.jpg', 5),
(101, 'assets/images/album/album/5/6.jpg', 5),
(102, 'assets/images/album/album/5/7.jpg', 5),
(103, 'assets/images/album/album/5/8.jpg', 5),
(104, 'assets/images/album/album/5/9.jpg', 5),
(105, 'assets/images/album/album/5/10.jpg', 5),
(111, 'assets/images/album/album/6/1.jpg', 6),
(112, 'assets/images/album/album/6/2.jpg', 6),
(113, 'assets/images/album/album/6/3.jpg', 6),
(114, 'assets/images/album/album/6/4.jpg', 6),
(115, 'assets/images/album/album/6/5.jpg', 6),
(116, 'assets/images/album/album/6/6.jpg', 6),
(117, 'assets/images/album/album/6/7.jpg', 6),
(118, 'assets/images/album/album/6/8.jpg', 6),
(119, 'assets/images/album/album/7/1.jpg', 7),
(120, 'assets/images/album/album/7/2.jpg', 7),
(121, 'assets/images/album/album/7/3.jpg', 7),
(122, 'assets/images/album/album/7/4.jpg', 7),
(123, 'assets/images/album/album/7/5.jpg', 7),
(124, 'assets/images/album/album/7/6.jpg', 7),
(125, 'assets/images/album/album/7/7.jpg', 7),
(126, 'assets/images/album/album/7/8.jpg', 7),
(127, 'assets/images/album/album/7/9.jpg', 7),
(128, 'assets/images/album/album/7/10.jpg', 7),
(129, 'assets/images/album/album/7/11.jpg', 7),
(130, 'assets/images/album/album/7/12.jpg', 7),
(131, 'assets/images/album/album/6/9.jpg', 6);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `image_tb`
--

CREATE TABLE `image_tb` (
  `id` int(100) NOT NULL,
  `album_id` int(100) NOT NULL,
  `is_cover` int(1) NOT NULL DEFAULT '0',
  `path` varchar(100) NOT NULL,
  `tou` datetime NOT NULL,
  `toc` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `portfolio_tb`
--

CREATE TABLE `portfolio_tb` (
  `id` int(100) NOT NULL,
  `path` varchar(250) NOT NULL,
  `catagory` varchar(100) NOT NULL,
  `tou` datetime NOT NULL,
  `toc` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(254) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1516516009, 1, 'Admin', 'istrator', 'ADMIN', '0');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `video_tb`
--

CREATE TABLE `video_tb` (
  `id` int(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `details` varchar(500) NOT NULL,
  `link` varchar(100) NOT NULL,
  `tou` datetime NOT NULL,
  `toc` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `album_details_tb`
--
ALTER TABLE `album_details_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `album_tb`
--
ALTER TABLE `album_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image_tb`
--
ALTER TABLE `image_tb`
  ADD PRIMARY KEY (`id`),
  ADD KEY `album` (`album_id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolio_tb`
--
ALTER TABLE `portfolio_tb`
  ADD KEY `id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `album_details_tb`
--
ALTER TABLE `album_details_tb`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `album_tb`
--
ALTER TABLE `album_tb`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `image_tb`
--
ALTER TABLE `image_tb`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `portfolio_tb`
--
ALTER TABLE `portfolio_tb`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `image_tb`
--
ALTER TABLE `image_tb`
  ADD CONSTRAINT `album` FOREIGN KEY (`album_id`) REFERENCES `album_details_tb` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
