-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 03 fév. 2023 à 13:54
-- Version du serveur : 10.4.25-MariaDB
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `chat`
--

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id_m` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `msg` varchar(500) NOT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id_m`, `email`, `msg`, `date`) VALUES
(8, 'dev@gmail.com', 'Bonjour', '2023-01-31 23:00:47'),
(9, 'arij@gmail.com', 'ça va?', '2023-01-31 23:01:05'),
(10, 'arij@gmail.com', 'hello\r\n', '2023-01-31 23:20:43'),
(11, 'dev@gmail.com', 'salut', '2023-01-31 23:21:21'),
(12, 'rania@gmail.com', 'hello', '2023-02-03 13:41:42'),
(13, 'rania@gmail.com', 'hi', '2023-02-03 13:42:44'),
(14, 'arij@gmail.com', 'hello', '2023-02-03 13:42:50'),
(15, 'jilani@gmail.com', 'hello', '2023-02-03 13:46:59');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id_u` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mdp1` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id_u`, `email`, `mdp1`) VALUES
(1, 'arij@gmail.com', 'arij'),
(12, 'dev@gmail.com', 'dev'),
(13, 'rania@gmail.com', 'rania'),
(14, 'jilani@gmail.com', 'jilani');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id_m`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id_u`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id_m` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id_u` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
