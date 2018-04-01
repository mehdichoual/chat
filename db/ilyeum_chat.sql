-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Dim 01 Avril 2018 à 18:29
-- Version du serveur :  5.7.14
-- Version de PHP :  7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ilyeum_chat`
--
DROP DATABASE `ilyeum_chat`;
CREATE DATABASE IF NOT EXISTS `ilyeum_chat` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ilyeum_chat`;

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `message` varchar(250) NOT NULL,
  `created_at` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `messages`
--

INSERT INTO `messages` (`id`, `username`, `message`, `created_at`) VALUES
(2, 'mehdich', 'hello', '01/04/2018 12:20:01'),
(7, 'yassine', 'salut mehdi', '01/04/2018 12:41:06'),
(8, 'fadwa', 'hello @Fadwa', '01/04/2018 12:44:41'),
(9, 'mehdich', 'test\r\n', '01/04/2018 12:57:01'),
(13, 'mehdich', 'djdjd', '01/04/2018 13:44:55'),
(26, 'mehdich', 'hello @fadwa ', '01/04/2018 18:27:19'),
(15, 'mehdich', 'fff', '01/04/2018 13:52:21'),
(16, 'mehdich', 'dddd', '01/04/2018 13:53:01'),
(17, 'mehdich', 'cdcd', '01/04/2018 13:53:42'),
(18, 'mehdich', 'lcdld', '01/04/2018 13:54:03'),
(19, 'mehdich', 'test test test', '01/04/2018 13:55:13'),
(20, 'mehdich', 'xssd', '01/04/2018 13:56:13'),
(21, 'mehdich', 'frfkrkf', '01/04/2018 13:58:27'),
(22, 'mehdich', 'frfr', '01/04/2018 13:58:32'),
(23, 'mehdich', 'kjhkjhk', '01/04/2018 13:59:00'),
(24, 'mehdich', 'kjhkj', '01/04/2018 13:59:57'),
(25, 'fadwa', 'hello', '01/04/2018 18:10:48');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) DEFAULT NULL,
  `connected_at` varchar(250) DEFAULT NULL,
  `connected` int(11) DEFAULT NULL,
  `created_at` varchar(250) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `connected_at`, `connected`, `created_at`) VALUES
(3, 'mehdiChoual', '$2y$10$MF4Y8joGHy6F8pyDjyu1IeVw9T7sH8oCcO07ZT6DOlvWLNdNDsYbm', '30/03/2018 15:36:48', 0, '30/03/2018 15:36:48'),
(4, 'mehdi-ch', '$2y$10$f/5QV4VWfSfEhZTde7iVsuDjUAH8LXXCWLMYxnsi8IZJE0FVQqhgi', '30/03/2018 15:56:40', 0, '30/03/2018 15:56:40'),
(6, 'mehdimeh', '$2y$10$3CsUm30uVmf9/aYiavuCMuJuM5lulK5YqrzeFVTiBS/HP.JV4QIO2', '31/03/2018 21:09:30', 0, '31/03/2018 21:09:30'),
(7, 'mehdich', '$2y$10$4sZMqV2QfjB0RBTu1N2p9ez1PKGLT7.EvVUpQ62TzOP8IhNmjKBb2', '01/04/2018 18:25:22', 1, '01/04/2018 10:39:56'),
(8, 'yassine', '$2y$10$0sDmc7qwbacbFsDxvPBei.WLeC1wSIO1OwCwP2r0TdXyUewVpf7Yu', '01/04/2018 12:40:32', 0, '01/04/2018 12:40:32'),
(9, 'fadwa', '$2y$10$AYLgJlRUJyRw4J4.0JwkeukZlq8UqNvxvitmsjwXh1CxylKD6su5e', '01/04/2018 18:10:38', 1, '01/04/2018 12:44:24');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
