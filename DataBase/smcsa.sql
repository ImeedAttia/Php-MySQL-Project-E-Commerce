-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2022 at 11:26 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smcsa`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `code_article` varchar(100) NOT NULL,
  `libelle_article` varchar(100) NOT NULL,
  `prix_achat` int(50) NOT NULL,
  `prix_vente` int(50) NOT NULL,
  `stock` varchar(50) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `name`, `code_article`, `libelle_article`, `prix_achat`, `prix_vente`, `stock`, `date`) VALUES
(1, 'Épeautre', '6800', 'grain', 60, 80, '100kg', '2021-07-15'),
(2, 'Avoine', '580', 'grain', 70, 80, '300kg', '2021-07-15');

-- --------------------------------------------------------

--
-- Table structure for table `commande`
--

CREATE TABLE `commande` (
  `id` int(100) NOT NULL,
  `idUser` int(100) NOT NULL,
  `idArticle` int(11) NOT NULL,
  `Validate` int(3) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `commande`
--

INSERT INTO `commande` (`id`, `idUser`, `idArticle`, `Validate`, `date`) VALUES
(21, 48, 1, 0, '2021-08-30 16:03:05'),
(24, 48, 1, 1, '2021-08-29 21:08:44'),
(25, 48, 1, 1, '2021-08-30 16:00:33'),
(26, 48, 2, 1, '2021-09-18 11:53:13'),
(27, 49, 1, 1, '2021-08-30 16:08:08'),
(31, 49, 1, 1, '2021-09-18 11:53:11'),
(32, 48, 1, 1, '2021-09-03 19:14:42'),
(33, 48, 1, 1, '2021-09-18 11:53:08'),
(34, 48, 1, 0, '2021-10-11 13:21:55'),
(35, 48, 1, 0, '2021-09-09 21:17:38'),
(36, 49, 2, 0, '2021-09-18 11:56:11'),
(37, 48, 1, 1, '2021-09-22 20:59:06'),
(38, 48, 1, 1, '2021-10-11 13:22:04'),
(39, 48, 2, 2, '2021-09-25 18:56:57'),
(40, 48, 1, 2, '2021-09-25 19:01:39'),
(41, 48, 1, 1, '2021-09-26 23:30:35'),
(42, 48, 1, 1, '2021-09-26 23:30:38'),
(43, 49, 1, 2, '2021-09-27 08:23:41'),
(44, 49, 1, 2, '2021-09-27 09:36:04'),
(45, 49, 1, 2, '2021-09-27 10:11:28'),
(46, 49, 1, 1, '2021-10-08 10:09:20'),
(47, 48, 1, 1, '2021-10-08 10:14:07'),
(48, 49, 1, 2, '2021-10-11 13:22:23'),
(49, 48, 1, 1, '2021-10-15 18:01:22'),
(50, 49, 1, 2, '2021-11-23 18:35:47'),
(51, 48, 1, 0, '2021-12-15 11:31:43'),
(52, 49, 1, 1, '2022-01-18 17:25:10');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Subject` varchar(100) NOT NULL,
  `Message` text NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `Satuts` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_lastname` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `region` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `admin_user` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `user_name`, `user_lastname`, `phone`, `email`, `password`, `adresse`, `region`, `date`, `admin_user`) VALUES
(48, 964291553876797, 'imed', 'attia', '95885335', 'imedattia1032@gmail.com', 'imed1234', 'idhaa', 'Sousse', '2021-08-29 19:08:36', 'user'),
(49, 46592092193786965, 'attia', 'imed', '958853356', 'imedattia1031@gmail.comm', 'imed12345', 'rue idhaa', 'Tunis', '2021-11-23 18:36:45', 'admin'),
(57, 0, 'louay', 'rdifi', '95885335', 'imed@gmail', 'imed1234', 'hjzadhjaz', 'Tunis', '2021-12-15 11:28:30', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Name` (`Name`),
  ADD KEY `Email` (`Email`),
  ADD KEY `Subject` (`Subject`),
  ADD KEY `Subject_2` (`Subject`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `commande`
--
ALTER TABLE `commande`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
