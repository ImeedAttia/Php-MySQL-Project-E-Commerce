-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2021 at 06:18 PM
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
-- Database: `login`
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
(1, 'Épeautre', '6800', 'grain', 60, 65, '100kg', '2021-07-15'),
(2, 'Avoine', '580', 'grain', 70, 80, '300kg', '2021-07-15'),
(3, 'Orge', '1220', 'grain', 75, 80, '80kg', '2021-05-12');

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
(22, 53, 1, 1, '2021-08-30 16:00:26'),
(23, 54, 1, 0, '2021-08-29 20:22:39'),
(24, 48, 1, 1, '2021-08-29 21:08:44'),
(25, 48, 1, 1, '2021-08-30 16:00:33'),
(26, 48, 2, 0, '2021-08-30 16:03:09'),
(27, 49, 1, 1, '2021-08-30 16:08:08'),
(28, 0, 1, 2, '2021-08-30 16:09:53'),
(29, 0, 2, 2, '2021-08-30 16:10:44'),
(30, 0, 2, 2, '2021-08-30 16:11:44');

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

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `Name`, `Email`, `Subject`, `Message`, `datetime`, `Satuts`) VALUES
(11, 'ATTIA', 'imedattia1032@gmail.com', 'information sur produit', 'Les produits sont de cette année ???', '2021-08-26 01:44:40', 1);

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
(49, 46592092193786965, 'attia', 'imed', '95885335', 'imedattia1031@gmail.com', 'imed1234', 'rue idhaa', 'Sousse', '2021-08-26 00:41:49', 'admin'),
(53, 59871362338, 'amin', 'dsfq', 'dsqfsq', 'dsfqsf@sdfq', 'imed1234', 'efqdsf', 'Tunis', '2021-08-29 20:22:03', 'user'),
(54, 8812462499704377137, 'wes', 'dslf,qs,f', 'ezfzefqz', 'fqsdf@sdfqf', 'imed1234', 'edfqdsf', 'Tunis', '2021-08-29 20:22:08', 'user');

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
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
