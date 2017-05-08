-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 08, 2017 at 09:16 PM
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
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `username`, `password`) VALUES
(43, 'Zach', 'hello'),
(44, 'Test', 'hello'),
(46, 'Azam', 'dad'),
(47, 'grandlakerocks', 'scottmh1'),
(48, 'Admin', 'hello'),
(49, 'Seboat Thegoat', 'Bruh');

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
(19, 'Admin', 'Hello test post', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD KEY `INDEX` (`id`);

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;