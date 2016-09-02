-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: mysql:3306
-- Generation Time: Sep 02, 2016 at 10:20 AM
-- Server version: 5.5.46-0ubuntu0.14.04.2
-- PHP Version: 5.6.9-1+deb.sury.org~trusty+2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `test`;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `login` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `role` enum('editor','admin') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'editor',
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `login`, `firstname`, `surname`, `role`, `created_at`) VALUES
(1, 'root', 'Root', 'Kowalski', 'admin', '2016-09-02 08:38:40'),
(2, 'brzuchal', 'Michał', 'Brzuchalski', 'editor', '2016-09-02 08:38:45'),
(3, 'kowalski', 'Tomasz', 'Kowalski', 'admin', '2016-09-02 10:01:43'),
(5, 'skipper', 'Janek', 'Skipper', 'admin', '2016-09-02 10:02:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`),
  ADD KEY `role` (`role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;