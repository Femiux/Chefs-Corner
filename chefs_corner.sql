-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2024 at 02:43 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chefs_corner`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `subject`, `message`) VALUES
(1, 'Ajay', 'ajay@gmail.com', 'qdeeas', 'dsgffhgjhmhjm');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(11) NOT NULL,
  `recipe_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recipetab`
--

CREATE TABLE `recipetab` (
  `recipe_id` int(11) NOT NULL,
  `chef_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `recipe_name` varchar(300) NOT NULL,
  `file_Name` varchar(300) NOT NULL,
  `cuisine` varchar(100) NOT NULL,
  `cuisine_id` int(11) NOT NULL,
  `duration` varchar(20) NOT NULL,
  `ingredients` varchar(255) NOT NULL,
  `description` varchar(300) NOT NULL,
  `steps` varchar(300) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `views` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `recipetab`
--

INSERT INTO `recipetab` (`recipe_id`, `chef_id`, `category_id`, `category`, `recipe_name`, `file_Name`, `cuisine`, `cuisine_id`, `duration`, `ingredients`, `description`, `steps`, `created_date`, `updated_date`, `views`) VALUES
(33, 0, 0, 'Breakfast', 'Soup', 'DEE_5856-Edit-2-3a.jpg', 'European Cuisine', 0, '10 min', 'Mix', 'TEST', '250', '0000-00-00 00:00:00', '2024-04-01 04:16:01', 0),
(35, 0, 1, 'Breakfast', 'Soup', 'DEE_5856-Edit-2-3a.jpg', 'African Cuisine', 0, '60 min', '250', 'Test', 'Mix', '0000-00-00 00:00:00', '2024-04-01 04:27:54', 0),
(36, 0, 1, 'Breakfast', 'Soup', 'DEE_5856-Edit-2-3a.jpg', 'African Cuisine', 0, '60 min', '250', 'Test', 'Mix', '0000-00-00 00:00:00', '2024-04-01 04:28:01', 0),
(37, 0, 1, 'Breakfast', 'Roseline', 'DEE_5856-Edit-2-3a.jpg', 'European Cuisine', 0, '10 min', '300', 'New', '4000', '0000-00-00 00:00:00', '2024-04-01 04:39:36', 0),
(44, 13, 1, 'Breakfast', 'Mofongo', 'Passport.jpg', 'African Cuisine', 0, '10 min', 'Shrimp – The flavor base for the special sauce you’ll douse your plantain domes with. You could replace it with crab or lobster meat for a special occasion.\r\nHerbs and Spices – Paprika, cumin, and fresh cilantro complement the main ingredients and bring t', 'Mofongo is on repeat in my kitchen right now because my family and I can’t get enough. We’ve been enjoying this dish almost once a week lately. This recipe will transport you to the islands or Africa, even if you don’t want to get too exotic.\r\n\r\nIf you’re feeling a little intimidated by the chicharr', 'Season the Shrimp – Lightly season shrimp with Creole spice. Heat about a tablespoon of oil over medium heat in a skillet, then sauté the shrimp for about 3-5 minutes. Set aside.\r\nSautee the Veggies – Add the remaining tablespoon of oil to the skillet, followed by onions, garlic, cumin, tomatoes, an', '0000-00-00 00:00:00', '2024-04-10 16:13:05', 0),
(46, 0, 1, 'Breakfast', 'Mofongo', 'Passport.jpg', 'African Cuisine', 0, '10 min', 'Shrimp – The flavor base for the special sauce you’ll douse your plantain domes with. You could replace it with crab or lobster meat for a special occasion.\r\nHerbs and Spices – Paprika, cumin, and fresh cilantro complement the main ingredients and bring t', 'Mofongo is on repeat in my kitchen right now because my family and I can’t get enough. We’ve been enjoying this dish almost once a week lately. This recipe will transport you to the islands or Africa, even if you don’t want to get too exotic.\r\n\r\nIf you’re feeling a little intimidated by the chicharr', 'Season the Shrimp – Lightly season shrimp with Creole spice. Heat about a tablespoon of oil over medium heat in a skillet, then sauté the shrimp for about 3-5 minutes. Set aside.\r\nSautee the Veggies – Add the remaining tablespoon of oil to the skillet, followed by onions, garlic, cumin, tomatoes, an', '0000-00-00 00:00:00', '2024-04-02 19:55:45', 0),
(47, 13, 1, 'Breakfast', 'Mofongo', 'Passport.jpg', 'African Cuisine', 0, '10 min', 'Shrimp – The flavor base for the special sauce you’ll douse your plantain domes with. You could replace it with crab or lobster meat for a special occasion.\r\nHerbs and Spices – Paprika, cumin, and fresh cilantro complement the main ingredients and bring t', 'Mofongo is on repeat in my kitchen right now because my family and I can’t get enough. We’ve been enjoying this dish almost once a week lately. This recipe will transport you to the islands or Africa, even if you don’t want to get too exotic.\r\n\r\nIf you’re feeling a little intimidated by the chicharr', 'Season the Shrimp – Lightly season shrimp with Creole spice. Heat about a tablespoon of oil over medium heat in a skillet, then sauté the shrimp for about 3-5 minutes. Set aside.\r\nSautee the Veggies – Add the remaining tablespoon of oil to the skillet, followed by onions, garlic, cumin, tomatoes, an', '0000-00-00 00:00:00', '2024-04-10 16:13:21', 0),
(48, 0, 1, 'Breakfast', 'Mofongo', 'Passport.jpg', 'African Cuisine', 0, '10 min', 'Shrimp – The flavor base for the special sauce you’ll douse your plantain domes with. You could replace it with crab or lobster meat for a special occasion.\r\nHerbs and Spices – Paprika, cumin, and fresh cilantro complement the main ingredients and bring t', 'Mofongo is on repeat in my kitchen right now because my family and I can’t get enough. We’ve been enjoying this dish almost once a week lately. This recipe will transport you to the islands or Africa, even if you don’t want to get too exotic.\r\n\r\nIf you’re feeling a little intimidated by the chicharr', 'Season the Shrimp – Lightly season shrimp with Creole spice. Heat about a tablespoon of oil over medium heat in a skillet, then sauté the shrimp for about 3-5 minutes. Set aside.\r\nSautee the Veggies – Add the remaining tablespoon of oil to the skillet, followed by onions, garlic, cumin, tomatoes, an', '0000-00-00 00:00:00', '2024-04-02 19:57:40', 0),
(50, 16, 1, 'Breakfast', 'Mofongo', 'Passport.jpg', 'African Cuisine', 0, '10 min', 'Shrimp – The flavor base for the special sauce you’ll douse your plantain domes with. You could replace it with crab or lobster meat for a special occasion.\r\nHerbs and Spices – Paprika, cumin, and fresh cilantro complement the main ingredients and bring t', 'Mofongo is on repeat in my kitchen right now because my family and I can’t get enough. We’ve been enjoying this dish almost once a week lately. This recipe will transport you to the islands or Africa, even if you don’t want to get too exotic.\r\n\r\nIf you’re feeling a little intimidated by the chicharr', 'Season the Shrimp – Lightly season shrimp with Creole spice. Heat about a tablespoon of oil over medium heat in a skillet, then sauté the shrimp for about 3-5 minutes. Set aside.\r\nSautee the Veggies – Add the remaining tablespoon of oil to the skillet, followed by onions, garlic, cumin, tomatoes, an', '0000-00-00 00:00:00', '2024-04-10 16:14:21', 0),
(62, 20, 1, 'Breakfast', 'Test', 'Mofongo.jpeg', 'Italian Cuisine', 0, '10 min', 'Test', 'Description', 'Sweet', '0000-00-00 00:00:00', '2024-04-15 01:09:09', 0),
(64, 1, 1, 'Breakfast', 'Admin Recipe', 'IMG_4248-1024x940.jpg', 'European Cuisine', 1, '10 min', 'SALT', 'TEST', 'FLOUR', '0000-00-00 00:00:00', '2024-04-17 06:45:37', 0),
(65, 1, 1, 'Breakfast', 'Admin Recipe 2', 'IMG_4248-1024x940.jpg', 'European Cuisine', 1, '10 min', 'Salt', 'Test Description', 'Mix', '0000-00-00 00:00:00', '2024-04-17 06:49:42', 0),
(66, 1, 1, 'Breakfast', 'Admin Recipe 2', 'IMG_4248-1024x940.jpg', 'European Cuisine', 1, '10 min', 'Salt', 'Test Description', 'Mix', '0000-00-00 00:00:00', '2024-04-17 06:50:52', 0),
(69, 1, 1, 'Breakfast', 'Admin Recipe 2', 'IMG_4248-1024x940.jpg', 'European Cuisine', 1, '10 min', 'Salt', 'Test Description', 'Mix', '0000-00-00 00:00:00', '2024-04-17 06:56:49', 0),
(70, 1, 1, 'Breakfast', 'Admin Recipe 2', 'Mofongo.jpeg', 'European Cuisine', 1, '10 min', 'Water', 'Description', 'Mix', '0000-00-00 00:00:00', '2024-04-17 06:59:35', 0),
(71, 1, 1, 'Breakfast', 'Admin Recipe 2', 'Mofongo.jpeg', 'European Cuisine', 1, '10 min', 'Water', 'Description', 'Mix', '0000-00-00 00:00:00', '2024-04-17 07:00:03', 0),
(72, 1, 1, 'Breakfast', 'Admin Recipe 2', 'Mofongo.jpeg', 'European Cuisine', 1, '10 min', 'Water', 'Description', 'Mix', '0000-00-00 00:00:00', '2024-04-17 07:00:32', 0),
(73, 1, 1, 'Breakfast', 'Admin Recipe 2', 'Mofongo.jpeg', 'European Cuisine', 1, '10 min', 'Water', 'Description', 'Mix', '0000-00-00 00:00:00', '2024-04-17 07:26:38', 0);

-- --------------------------------------------------------

--
-- Table structure for table `suggest`
--

CREATE TABLE `suggest` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `recipe_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `suggest`
--

INSERT INTO `suggest` (`id`, `user_id`, `recipe_name`, `description`, `created_at`) VALUES
(1, 18, 'Chika Test Test', 'Woory, in out', '2024-04-18 08:25:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `location` varchar(50) NOT NULL,
  `profile_pic` varchar(300) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('chef','seeker','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fullname`, `username`, `email`, `location`, `profile_pic`, `password`, `role`) VALUES
(1, 'Main Admin', 'mainadmin', 'mainadmin@gmail.com', 'Aberdeen', 'Passportww.jpg', '$2y$10$ONf2IERvZD0yqyeSooihreD7PZriD.YyEOMtE4unu/3ODudbDg.Ia', 'admin'),
(2, '', 'Amit', 'amit@gmail.com', '', '', '1234', 'chef'),
(3, '', 'Keerti Panwar', 'keerti@gmail.com', '', '', '$2y$10$g.xv9BS7DZbZ0KT/.fkGouuD8duIUWY2lDntZ7ZXDDUW6h09ZDiqe', 'chef'),
(4, '', 'Ankita', 'ankita@gmail.com', '', '', '$2y$10$ZuWPf98dGPFogVM8MoKGxOVZ4v1mXD.WrJQ7rwfvdYLWMpyEyRhtK', 'chef'),
(5, '', 'Keerti Panwar', 'keerti1234@gmail.com', '', '', '$2y$10$PL6oQH71xCh3F3BALBuVYu6SLn2AVQ41o.i5vi2LosRIWEh1H.0Zi', 'chef'),
(6, '', 'admin', 'fatuasef@gmail.com', '', '', '$2y$10$iGlMu9bLfWYCdFswvJaWl.MXtYsCpcDdaNHJWpv/itl1rP.UHCvCO', 'chef'),
(7, '', 'roselyn', 'roselynakande97@gmail.com', '', '', '$2y$10$NiiZjjUVXaoqP1cMmSswUOXNKxP0yR2wZbs2Gt5MWg2lURxTo3FNW', 'chef'),
(10, 'Oluwafemi Bayode', 'Test', 'Test@gmai.com', '', '', '$2y$10$dOu2j11ldgYBSS9g1xKNRuyf34Fwi3hSh1hfCGj1G02E6jlavqBTO', 'chef'),
(11, 'Oluwafemi Bayode T', 'femi_fat', 'fatuaseff@gmail.com', '', '', '$2y$10$prbmnVloRpytQFJhvNmqleBRzc3Hj19zrc9Oi0pBqq6jM4eb0Y8pO', 'chef'),
(12, 'Queen Chika', 'chika', 'chika@gmail.com', '', '', '$2y$10$EuDI/rCu41bHg0xZRekA0er7mwkxTVRIKiJypsC23edJQcZFQfM0S', 'chef'),
(13, 'Oluwafemi Bayode', 'fatuase', 'Test@gmail.com', '', '', '$2y$10$iwhi7K/RqoEgpcEaY3h5CuXSDUGxjvtyKUzldhHhafT43VEPGkSEi', 'chef'),
(14, 'New Account', 'new_chef', 'chef@gmial.com', '', '', '$2y$10$.t2NOwml0EJwgJNdLsUjau.oV98DWQtMtRdjS1AlYQtmHq1xC.6Mm', 'chef'),
(15, 'New Account', 'new_seeker', 'newseeker@gmail.com', '', '', '$2y$10$yLICPkT7c1vKplxGmNb2xOV6r680jJDG3HLvyu8N2JIr515XYoE/m', 'seeker'),
(16, 'New Account', 'newchef', 'newchef@gmail.com', 'Aberden', 'SCREENSAVER.jpg', '$2y$10$fQIFZOJ1xcjW62vzMC.o9u2UdmCrXt65quZKpoFWRPWQSA7Rpc7/.', 'chef'),
(17, 'New2', 'New2', 'New2@gmail.com', '', '', '$2y$10$v8VuVnmhjEb6F40PB7SBU.kSQMzNha0llnjz7OTo3Eq5euoeA8yhy', 'chef'),
(18, 'Femi Seeker', 'femiseeker', 'femiseeker@gmail.com', '', '', '$2y$10$W2tmRit4T6nh2ni8IkUWZOHC75A7DlL3FVvI7/BYK9TWl1JDVjz9a', 'seeker'),
(20, 'another chef', 'anotherchef', 'anotherchef@gmail.com', 'Edinburgh', 'Passport.jpg', '$2y$10$WS4zyMWJEuEOdYfzDWfGLOZLX9Mdm5y3klDmDYXnpIJOz/NUDBlzm', 'chef'),
(26, 'Test Seeker', 'testseeker', 'testseeker@gmail.com', '', '', '$2y$10$V6.2wWDPMYpg.ckAbWsImuQCHSfvnhTBhi3CUG1ZoPRRsQX8IDAB.', 'seeker'),
(27, 'test Chef', 'testchef', 'testchef@gmail.com', 'Aberden', 'Passport.jpg', '$2y$10$U.z2OOoUsiIJ33WPprzUiu68Uq3KGINq10fuYY6autYZ.rZR7cDKC', 'chef'),
(28, 'Test Admin', 'testadmin', 'testadmin@gmail.com', '', '', '$2y$10$g8Xp6VxoB0rBaEqrWkntmu6XdGIsChWIACieS3D/0pY2OzBJL2JRG', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recipe_id` (`recipe_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `recipetab`
--
ALTER TABLE `recipetab`
  ADD PRIMARY KEY (`recipe_id`),
  ADD KEY `fk_chef` (`chef_id`);

--
-- Indexes for table `suggest`
--
ALTER TABLE `suggest`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `recipetab`
--
ALTER TABLE `recipetab`
  MODIFY `recipe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `suggest`
--
ALTER TABLE `suggest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_ibfk_1` FOREIGN KEY (`recipe_id`) REFERENCES `recipetab` (`recipe_id`),
  ADD CONSTRAINT `ratings_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `recipetab`
--
ALTER TABLE `recipetab`
  ADD CONSTRAINT `fk_chef` FOREIGN KEY (`chef_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `suggest`
--
ALTER TABLE `suggest`
  ADD CONSTRAINT `suggest_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
