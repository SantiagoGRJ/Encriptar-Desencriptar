-- phpMyAdmin SQL Dump
-- version 6.0.0-dev+20231008.79b5ef1275
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2023 at 12:42 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `algoritmo`
--

-- --------------------------------------------------------

--
-- Table structure for table `aes`
--

CREATE TABLE `aes` (
  `id` varchar(255) NOT NULL,
  `string` varchar(255) NOT NULL,
  `clave` varchar(255) DEFAULT NULL,
  `encriptado` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `clave`
--

CREATE TABLE `clave` (
  `id` varchar(255) NOT NULL,
  `pubkey` varchar(5000) DEFAULT NULL,
  `privkey` varchar(5000) DEFAULT NULL,
  `string` varchar(255) NOT NULL,
  `encriptado` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `md`
--

CREATE TABLE `md` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `string` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cifrado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aes`
--
ALTER TABLE `aes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clave`
--
ALTER TABLE `clave`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `md`
--
ALTER TABLE `md`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
