-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  Dim 22 juil. 2018 à 22:12
-- Version du serveur :  5.7.22-0ubuntu0.16.04.1
-- Version de PHP :  7.0.30-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `my_meetic`
--

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom` varchar(65) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(65) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sexe` enum('homme','femme','autre') NOT NULL,
  `date_naissance` date NOT NULL,
  `ville` varchar(65) NOT NULL,
  `mail` varchar(65) NOT NULL,
  `pass` varchar(535) NOT NULL,
  `date_inscription` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `disable` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`id`, `nom`, `prenom`, `sexe`, `date_naissance`, `ville`, `mail`, `pass`, `date_inscription`, `disable`) VALUES
(5, 'Becker', 'Sonny', 'homme', '1994-07-14', 'Lyon', 'sonny.38@live.fr', '$2y$10$Jk8BzFhcMtbj8Yr2eC/zy.lHHJzHmp6rlFfxNkvsTZxD1dZL39EHS', '2018-07-18 09:57:50', '0'),
(6, 'GALAS', 'Nicolas', 'homme', '1997-04-08', 'Lyon', 'nicolas.galas@epitech.eu', '$2y$10$zrrTXSe1oPXuo3a2QsKG7ObzKJTHttl/pCYjNzhyeYMwZHi.r6pGq', '2018-07-18 11:41:45', '0'),
(7, 'Washington', 'George', 'homme', '1945-03-12', 'Lyon', 'george.washington@gmail.com', '$2y$10$RItWF5iwGZVA2LBN5A37NuSsVH64CZnUvqFQJm.mcM6puaSF7403e', '2018-07-18 13:08:12', '0'),
(8, 'Doe', 'John', 'homme', '1994-07-14', 'Lyon', 'john.doe@gmail.com', '$2y$10$.Yu1xu8kDKC/8x5koSSkiOPYCEmbK58EMTkllhOcyYCnRcvFFQRDC', '2018-07-19 07:40:28', '0'),
(9, 'Merigold', 'Triss', 'femme', '1993-03-03', 'Paris', 'triss.merigold@gmail.com', '$2y$10$wjjt337N115DePd2KScNZOjH/s/B1SLB8fNY5AL16un8JU11blymC', '2018-07-19 07:54:51', '0'),
(10, 'De Riv', 'Geralt', 'homme', '1992-02-02', 'Paris', 'geralt.deriv@gmail.com', '$2y$10$Ub5eKEKeiBMfrzjsKEg04eN8HuO/dhi8GBI9k6gQcm5FeLmPA.rYS', '2018-07-19 07:56:30', '0'),
(11, 'De Vengerberg', 'Yennefer', 'femme', '1993-04-04', 'Paris', 'yennefer@gmail.com', '$2y$10$OltUgCPGHrHiOakF/4xuguYCtHwfrpNtkS5V6t6kx2tShv0l3nVga', '2018-07-19 08:00:20', '0'),
(12, 'Elen', 'Ciri', 'femme', '1998-08-15', 'Paris', 'ciri.elen@gmail.com', '$2y$10$AD5m37Ueh3l/t9SDz5GTl.bAOiEUizID6d.ReKT6PRfHqJKoqIUd.', '2018-07-19 08:03:08', '0'),
(13, 'Chivay', 'Zoltan', 'homme', '1980-02-28', 'Paris', 'zoltanchivay@gmail.com', '$2y$10$MsPe1vk7mW8qwVq4yLaRme7m7bv6Gf9WNArjJRLWj57DGlGu/BJCa', '2018-07-19 08:08:05', '0'),
(14, 'T\'soni', 'Liara', 'femme', '1975-09-18', 'Marseille', 'liara.tsoni@gmail.com', '$2y$10$yOBbdvVqMuWI3Wyilx4hfeTMN6OkyNz8mDMdwM4xHKzS/PiaJ7RNO', '2018-07-20 09:04:50', '0'),
(16, 'Zorah', 'Tali', 'femme', '1983-01-01', 'Marseille', 'tali.zorah@gmail.com', '$2y$10$7Wu59MxWaNcxn5bcbR4/fOPtATrfd3BRJUghcuoszDjpuMIsg6R8K', '2018-07-20 10:21:30', '0'),
(17, 'Vakarian', 'Garrus', 'homme', '1988-08-15', 'Marseille', 'garrus.vakarian@gmail.com', '$2y$10$3xw69nsOG1RcC5yit/J.zeyNkML0A.hv/TSpWtU1/lxzHUSyy6V9i', '2018-07-21 10:13:12', '0');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `membre`
--
ALTER TABLE `membre`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
