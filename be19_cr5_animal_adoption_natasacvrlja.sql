-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2023 at 01:41 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `be19_cr5_animal_adoption_natasacvrlja`
--
CREATE DATABASE IF NOT EXISTS `be19_cr5_animal_adoption_natasacvrlja` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `be19_cr5_animal_adoption_natasacvrlja`;

-- --------------------------------------------------------

--
-- Table structure for table `animals`
--

CREATE TABLE `animals` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `size` varchar(50) NOT NULL,
  `breed` varchar(80) NOT NULL,
  `availability` varchar(30) NOT NULL DEFAULT 'Available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `animals`
--

INSERT INTO `animals` (`id`, `name`, `image`, `address`, `description`, `age`, `size`, `breed`, `availability`) VALUES
(1, 'Bobi', '64c4368edca91 tmp', 'Praterstrasse 23', 'In Europe, people consider hedgehogs to be friends of backyards and gardens. These hedgehogs are often found in flower beds, vegetable gardens, and compost heaps. Some gardeners make nests of straw, hay, or boxes to attract hedgehogs. In turn, the hedgeho', 1, 'small', 'Hedgehog', 'Adopted'),
(2, 'Charlie', 'an2.jpg', 'Breitenfelder gasse 21', 'In Europe, people consider hedgehogs to be friends of backyards and gardens. These hedgehogs are often found in flower beds, vegetable gardens, and compost heaps. Some gardeners make nests of straw, hay, or boxes to attract hedgehogs. In turn, the hedgeho', 1, 'medium', 'Cavalier King Charles Spaniel', 'Available'),
(3, 'Tommy', 'an3.jpg', 'Some street 32', 'In Europe, people consider hedgehogs to be friends of backyards and gardens. These hedgehogs are often found in flower beds, vegetable gardens, and compost heaps. Some gardeners make nests of straw, hay, or boxes to attract hedgehogs. In turn, the hedgeho', 9, 'small', 'Brown Rabbit', 'Available'),
(4, 'Carl', 'an4.jpg', 'Denisgasse 23', 'In Europe, people consider hedgehogs to be friends of backyards and gardens. These hedgehogs are often found in flower beds, vegetable gardens, and compost heaps. Some gardeners make nests of straw, hay, or boxes to attract hedgehogs. In turn, the hedgeho', 10, 'big', 'Vizsla Dog', 'Available'),
(5, 'Kitty', 'an5.jpg', 'Alser strasse 68', 'In Europe, people consider hedgehogs to be friends of backyards and gardens. These hedgehogs are often found in flower beds, vegetable gardens, and compost heaps. Some gardeners make nests of straw, hay, or boxes to attract hedgehogs. In turn, the hedgeho', 1, 'small', 'Small Cat', 'Available'),
(6, 'Sam', 'an6.jpg', 'Leithener strasse 41', 'In Europe, people consider hedgehogs to be friends of backyards and gardens. These hedgehogs are often found in flower beds, vegetable gardens, and compost heaps. Some gardeners make nests of straw, hay, or boxes to attract hedgehogs. In turn, the hedgeho', 10, 'medium', 'Welsh Corgi Dog', 'Available'),
(7, 'Bobi', 'picture.webp', 'Praterstrasse 23', 'In Europe, people consider hedgehogs to be friends of backyards and gardens. These hedgehogs are often found in flower beds, vegetable gardens, and compost heaps. Some gardeners make nests of straw, hay, or boxes to attract hedgehogs. In turn, the hedgeho', 1, 'medium', 'Hedgehog', 'Available'),
(8, 'Bobi', 'picture.webp', 'Praterstrasse 23', 'In Europe, people consider hedgehogs to be friends of backyards and gardens. These hedgehogs are often found in flower beds, vegetable gardens, and compost heaps. Some gardeners make nests of straw, hay, or boxes to attract hedgehogs. In turn, the hedgeho', 1, 'medium', 'Hedgehog', 'Available'),
(9, 'Bobi', 'picture.webp', 'Praterstrasse 23', 'In Europe, people consider hedgehogs to be friends of backyards and gardens. These hedgehogs are often found in flower beds, vegetable gardens, and compost heaps. Some gardeners make nests of straw, hay, or boxes to attract hedgehogs. In turn, the hedgeho', 1, 'medium', 'Hedgehog', 'Available'),
(10, 'Bobi', 'picture.webp', 'Praterstrasse 23', 'In Europe, people consider hedgehogs to be friends of backyards and gardens. These hedgehogs are often found in flower beds, vegetable gardens, and compost heaps. Some gardeners make nests of straw, hay, or boxes to attract hedgehogs. In turn, the hedgeho', 1, 'medium', 'Hedgehog', 'Available'),
(12, 'pet1', '64c4374cb92da tmp', 'praterstrasse 23', 'wow', 12, 'medium', 'turtle', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `pet_adoption`
--

CREATE TABLE `pet_adoption` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `animals_id` int(11) NOT NULL,
  `adoption_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pet_adoption`
--

INSERT INTO `pet_adoption` (`id`, `users_id`, `animals_id`, `adoption_date`) VALUES
(10, 13, 1, '2023-07-28'),
(11, 13, 6, '2023-07-28'),
(12, 13, 5, '2023-07-28'),
(13, 13, 1, '2023-07-28'),
(14, 13, 6, '2023-07-29'),
(15, 13, 6, '2023-07-29'),
(16, 13, 6, '2023-07-29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(70) NOT NULL,
  `phoneNumb` int(15) NOT NULL,
  `address` varchar(80) NOT NULL,
  `picture` varchar(80) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(30) DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `email`, `phoneNumb`, `address`, `picture`, `password`, `status`) VALUES
(7, 'Natasa', 'Cvrlja', 'natasa@gmail.com', 1231456, 'street 1', '64c3d7ba5d517 tmp', '0b14d501a594442a01c6859541bcb3e8164d183d32937b8518', 'user'),
(8, 'test', 'test', 'cvrlja.natasa@gmail.com', 123123123, 'Klosterneuburger Straße 47/3/15', '64c3dae1766ca tmp', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc', 'user'),
(9, 'natasa', 'cvrlja', 'test@gmail.com', 12312315, 'street 52', '64c3def1305b5 tmp', '932f3c1b56257ce8539ac269d7aab42550dacf8818d075f0bdf1990562aae3ef', 'user'),
(10, 'natko', 'natko', 'natko@gmail.com', 12555441, 'street 12', 'avatar.webp', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', 'adm'),
(13, 'Natasa', 'Cvrlja', 'cvrlja@gmail.com', 12345666, 'mmmm 4', '64c402bd8bdcd tmp', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pet_adoption`
--
ALTER TABLE `pet_adoption`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_id` (`users_id`),
  ADD KEY `animals_id` (`animals_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animals`
--
ALTER TABLE `animals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pet_adoption`
--
ALTER TABLE `pet_adoption`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pet_adoption`
--
ALTER TABLE `pet_adoption`
  ADD CONSTRAINT `pet_adoption_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `pet_adoption_ibfk_2` FOREIGN KEY (`animals_id`) REFERENCES `animals` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
