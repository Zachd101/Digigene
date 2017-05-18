-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 18, 2017 at 08:07 PM
-- Server version: 5.6.35
-- PHP Version: 7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `digigene`
--
CREATE DATABASE IF NOT EXISTS `digigene` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `digigene`;

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(10) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `bio` text NOT NULL,
  `age` int(10) NOT NULL,
  `disease` text NOT NULL,
  `gender` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `username`, `password`, `bio`, `age`, `disease`, `gender`) VALUES
(43, 'Zach', 'hello', 'The big boy in the playground', 200, '0', 'two-foxed'),
(44, 'Test', 'hello', 'fjdkfj', 5, '0', 'fdjkfj'),
(46, 'Azam', 'dad', '', 0, '0', '0'),
(47, 'grandlakerocks', 'scottmh1', '', 0, '0', '0'),
(48, 'Admin', 'hello', '', 0, '0', '0'),
(49, 'Seboat Thegoat', 'Bruh', '', 0, '0', '0'),
(50, 'Admin2', 'hello', '', 0, '0', '0'),
(51, 'erac', 'runescape123', '', 0, '0', '0'),
(52, 'numbo', 'hello', '', 0, '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `matches`
--

CREATE TABLE `matches` (
  `id` int(11) NOT NULL,
  `sender` text NOT NULL,
  `recipient` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `matches`
--

INSERT INTO `matches` (`id`, `sender`, `recipient`) VALUES
(55, 'Admin', 'Zach'),
(56, 'Zach', 'Admin'),
(57, 'Test', 'Zach');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) NOT NULL,
  `username` text NOT NULL COMMENT 'name of poster',
  `content` text NOT NULL COMMENT 'content of post',
  `tags` text NOT NULL COMMENT 'hashtags of post'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `username`, `content`, `tags`) VALUES
(10, 'Zach', 'test', ''),
(17, 'Admin', 'This is a post', ''),
(18, 'Zach', 'emacs ', ''),
(19, 'Admin', 'Hello test post', ''),
(20, 'Admin', 'text', ''),
(21, 'Admin2', 'moretext', ''),
(22, '', '', ''),
(23, '', 'dakjf', ''),
(24, '', 'this works', ''),
(25, 'Zach', 'adfksja', ''),
(26, 'erac', 'i have bad genes', ''),
(27, 'erac', 'i have glandular issues', ''),
(28, 'erac', 'hi', ''),
(29, 'erac', '', ''),
(30, 'erac', '', ''),
(31, 'erac', '', ''),
(32, 'erac', '', ''),
(33, 'erac', '', ''),
(34, 'erac', '', ''),
(35, 'erac', '', ''),
(36, 'erac', '', ''),
(37, 'erac', '', ''),
(38, 'erac', '', ''),
(39, 'erac', '', ''),
(40, 'erac', '', ''),
(41, 'erac', '', ''),
(42, 'erac', '#man ', ''),
(43, 'erac', 'fjkaldjf #man ', ''),
(44, 'Admin', 'jkdsalkj #man', ''),
(45, 'numbo', 'this is a post', ''),
(46, 'Zach', '#dude ', ''),
(47, 'numbo', 'fjkdalsjf #teset', ''),
(48, 'Zach', 'this works', ''),
(49, 'Zach', '#####', ''),
(50, 'Zach', '###', ''),
(51, 'Zach', 'fdsaf', ''),
(52, 'Zach', 'fdaf', ''),
(53, 'Zach', 'fdasf', ''),
(54, 'Zach', 'fdasf', ''),
(55, 'Zach', 'fdsaf', ''),
(56, 'Zach', 'fdf', ''),
(57, 'Zach', 'fdsaf', ''),
(58, 'Zach', '####', ''),
(59, 'Zach', 'fjkdf#', ''),
(60, 'Zach', '##', ''),
(61, 'Zach', 'fdjkaslfj#', ''),
(62, 'Zach', '#######', ''),
(63, 'Zach', '#help ', ''),
(64, 'Zach', 'fdsaf', ''),
(65, 'Zach', 'fdasf#fdf', ''),
(66, 'Zach', 'fafk#tag', ''),
(67, 'Zach', 'fdjklafj#tag fkdsal;', ''),
(68, 'Zach', '#tag', ''),
(69, 'Zach', '#test', ''),
(70, 'Zach', 'IM LOVING THE #beach', ''),
(71, 'Zach', '#beach #party', ''),
(72, 'Zach', 'THIS IS AWESEOME #got #season7', ''),
(73, 'Zach', 'I love #digigene', ''),
(74, 'Zach', 'ITS THE #finalcountdown', ''),
(75, 'Zach', '#1#2#3', ''),
(76, 'Zach', 'kdkfj#this', ''),
(77, 'Zach', '#beach#fun', ''),
(78, 'Zach', '#beach#fun', ''),
(79, 'Zach', '#dude#man', ''),
(80, 'Zach', '#hello#bye', ''),
(81, 'Zach', '#man#dude', ''),
(82, 'Zach', 'this #works', ''),
(83, 'Zach', '#why #me', ''),
(84, 'Zach', 'I LOVE THE #beach', ''),
(85, 'Zach', '#Digigene is the best', ''),
(86, 'Zach', 'i love the #beach', ''),
(87, 'Zach', '#beach #fun', ''),
(88, 'Zach', 'Chilling wit the #bros', ''),
(89, 'Zach', '#man', ''),
(90, 'Zach', 'Having fun at the #beach #sun', ''),
(91, 'Zach', '####', ''),
(92, 'Zach', 'well', ''),
(93, 'Zach', 'done baby', ''),
(94, 'Zach', 'hey', ''),
(95, 'Zach', 'I love #digigene', ''),
(96, 'Zach', 'I love the #beach', ''),
(97, 'Test', 'hey', ''),
(98, 'Test', 'post', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD KEY `INDEX` (`id`);

--
-- Indexes for table `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `matches`
--
ALTER TABLE `matches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;
