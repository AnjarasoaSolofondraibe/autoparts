-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 14 avr. 2025 à 19:23
-- Version du serveur : 9.1.0
-- Version de PHP : 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `autoparts`
--

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

DROP TABLE IF EXISTS `commandes`;
CREATE TABLE IF NOT EXISTS `commandes` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `numero_commande` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` decimal(8,2) NOT NULL,
  `statut` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en attente',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `commandes_user_id_foreign` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2025_04_14_074801_create_produits_table', 2),
(7, '2025_04_14_112432_create_commandes_table', 3),
(8, '2025_04_14_165406_create_newsletters_table', 4);

-- --------------------------------------------------------

--
-- Structure de la table `newsletters`
--

DROP TABLE IF EXISTS `newsletters`;
CREATE TABLE IF NOT EXISTS `newsletters` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `newsletters_email_unique` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marque` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_piece` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix` decimal(8,2) NOT NULL,
  `stock` int NOT NULL DEFAULT '0',
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `nom`, `marque`, `type_piece`, `description`, `prix`, `stock`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Batterie - Modèle 3DhN', 'Volkswagen', 'Batterie', 'Pièce détachée de type Batterie, compatible avec plusieurs modèles. Qualité certifiée, facile à installer.', 350000.00, 14, 'batterie9.jpeg', '2025-04-14 05:22:04', '2025-04-14 05:22:04'),
(2, 'Filtre - Modèle 0nnl', 'BMW', 'Filtre', 'Pièce détachée de type Filtre, compatible avec plusieurs modèles. Qualité certifiée, facile à installer.', 22000.00, 46, 'filtre5.jpeg', '2025-04-14 05:22:04', '2025-04-14 05:22:04'),
(3, 'Bougie - Modèle 3z7H', 'Renault', 'Bougie', 'Pièce détachée de type Bougie, compatible avec plusieurs modèles. Qualité certifiée, facile à installer.', 15000.00, 8, 'bougies1.jpg', '2025-04-14 05:22:04', '2025-04-14 05:22:04'),
(4, 'Plaquette - Modèle 80NT', 'Peugeot', 'Plaquette', 'Pièce détachée de type Plaquette, compatible avec plusieurs modèles. Qualité certifiée, facile à installer.', 17000.00, 9, 'plaquettes1.jpeg', '2025-04-14 05:22:04', '2025-04-14 05:22:04'),
(5, 'Plaquette - Modèle fcql', 'Renault', 'Plaquette', 'Pièce détachée de type Plaquette, compatible avec plusieurs modèles. Qualité certifiée, facile à installer.', 35000.00, 47, 'plaquettes2.jpeg', '2025-04-14 05:22:58', '2025-04-14 05:22:58'),
(6, 'Courroie - Modèle HHI5', 'Peugeot', 'Courroie', 'Pièce détachée de type Courroie, compatible avec plusieurs modèles. Qualité certifiée, facile à installer.', 75000.00, 24, 'courroi.jpg', '2025-04-14 05:22:58', '2025-04-14 05:22:58'),
(7, 'Plaquette - Modèle KS8a', 'BMW', 'Plaquette', 'Pièce détachée de type Plaquette, compatible avec plusieurs modèles. Qualité certifiée, facile à installer.', 42000.00, 42, 'plaquettes2.jpeg', '2025-04-14 05:22:58', '2025-04-14 05:22:58'),
(8, 'Courroie - Modèle bTxP', 'BMW', 'Courroie', 'Pièce détachée de type Courroie, compatible avec plusieurs modèles. Qualité certifiée, facile à installer.', 67000.00, 18, 'courroi2.png', '2025-04-14 05:22:58', '2025-04-14 05:22:58'),
(9, 'Filtre - Modèle arcU', 'Peugeot', 'Filtre', 'Pièce détachée de type Filtre, compatible avec plusieurs modèles. Qualité certifiée, facile à installer.', 20000.00, 7, 'filtrea1.jpg', '2025-04-14 05:22:58', '2025-04-14 05:22:58'),
(10, 'Plaquette - Modèle aUYM', 'Peugeot', 'Plaquette', 'Pièce détachée de type Plaquette, compatible avec plusieurs modèles. Qualité certifiée, facile à installer.', 22000.00, 50, 'plaquettes1.jpeg', '2025-04-14 05:22:58', '2025-04-14 05:22:58'),
(11, 'Filtre - Modèle fQYI', 'BMW', 'Filtre', 'Pièce détachée de type Filtre, compatible avec plusieurs modèles. Qualité certifiée, facile à installer.', 38000.00, 42, 'filtrea3.jpeg', '2025-04-14 05:22:58', '2025-04-14 05:22:58'),
(12, 'Bougie - Modèle eYSH', 'BMW', 'Bougie', 'Pièce détachée de type Bougie, compatible avec plusieurs modèles. Qualité certifiée, facile à installer.', 12500.00, 2, 'bougies5.jpg', '2025-04-14 05:22:58', '2025-04-14 05:22:58'),
(13, 'Bougie - Modèle 0W6U', 'Renault', 'Bougie', 'Pièce détachée de type Bougie, compatible avec plusieurs modèles. Qualité certifiée, facile à installer.', 18000.00, 46, 'bougies2.jpg', '2025-04-14 05:22:58', '2025-04-14 05:22:58'),
(14, 'Courroie - Modèle knEk', 'Volkswagen', 'Courroie', 'Pièce détachée de type Courroie, compatible avec plusieurs modèles. Qualité certifiée, facile à installer.', 80000.00, 35, 'courroi3.png', '2025-04-14 05:22:58', '2025-04-14 05:22:58'),
(15, 'Batterie - Modèle cb0y', 'BMW', 'Batterie', 'Pièce détachée de type Batterie, compatible avec plusieurs modèles. Qualité certifiée, facile à installer.', 450000.00, 36, 'batterie3.jpg', '2025-04-14 05:22:58', '2025-04-14 05:22:58'),
(16, 'Filtre - Modèle TFBC', 'Renault', 'Filtre', 'Pièce détachée de type Filtre, compatible avec plusieurs modèles. Qualité certifiée, facile à installer.', 60000.00, 31, 'filtre2.jpg', '2025-04-14 05:22:58', '2025-04-14 05:22:58'),
(17, 'Bougie - Modèle mcKK', 'Renault', 'Bougie', 'Pièce détachée de type Bougie, compatible avec plusieurs modèles. Qualité certifiée, facile à installer.', 21000.00, 25, 'bougies4.jpg', '2025-04-14 05:22:58', '2025-04-14 05:22:58'),
(18, 'Bougie - Modèle ShP6', 'Renault', 'Bougie', 'Pièce détachée de type Bougie, compatible avec plusieurs modèles. Qualité certifiée, facile à installer.', 19500.00, 48, 'bougies3.jpeg', '2025-04-14 05:22:58', '2025-04-14 05:22:58'),
(19, 'Batterie - Modèle BT4x', 'Renault', 'Batterie', 'Pièce détachée de type Batterie, compatible avec plusieurs modèles. Qualité certifiée, facile à installer.', 380000.00, 22, 'batterie3.jpg', '2025-04-14 05:22:58', '2025-04-14 05:22:58'),
(20, 'Bougie - Modèle 0KxC', 'Renault', 'Bougie', 'Pièce détachée de type Bougie, compatible avec plusieurs modèles. Qualité certifiée, facile à installer.', 17500.00, 6, 'bougies7.jpg', '2025-04-14 05:22:58', '2025-04-14 05:22:58'),
(21, 'Batterie - Modèle Xzkx', 'Peugeot', 'Plaquette', 'Pièce détachée de type Filtre, compatible avec plusieurs modèles. Qualité certifiée, facile à installer.', 465000.00, 6, 'batterie4.jpg', '2025-04-14 05:22:58', '2025-04-14 05:22:58'),
(22, 'Plaquette - Modèle 1tAQ', 'BMW', 'Plaquette', 'Pièce détachée de type Plaquette, compatible avec plusieurs modèles. Qualité certifiée, facile à installer.', 50000.00, 1, 'plaquettes2.jpeg\r\n', '2025-04-14 05:22:58', '2025-04-14 05:22:58'),
(23, 'Plaquette - Modèle VVLC', 'Peugeot', 'Plaquette', 'Pièce détachée de type Plaquette, compatible avec plusieurs modèles. Qualité certifiée, facile à installer.', 32000.00, 3, 'plaquettes1.jpeg', '2025-04-14 05:22:58', '2025-04-14 05:22:58'),
(24, 'Courroie - Modèle Pn4U', 'Peugeot', 'Courroie', 'Pièce détachée de type Courroie, compatible avec plusieurs modèles. Qualité certifiée, facile à installer.', 65000.00, 24, 'courroi6.jpg', '2025-04-14 05:22:58', '2025-04-14 05:22:58'),
(25, 'Courroie - Modèle w5Ye', 'BMW', 'Courroie', 'Pièce détachée de type Courroie, compatible avec plusieurs modèles. Qualité certifiée, facile à installer.', 50000.00, 18, 'courroi4.jpg', '2025-04-14 05:22:58', '2025-04-14 05:22:58'),
(26, 'Filtre - Modèle SL08', 'Peugeot', 'Filtre', 'Pièce détachée de type Filtre, compatible avec plusieurs modèles. Qualité certifiée, facile à installer.', 30000.00, 17, 'filtre.jpg', '2025-04-14 05:22:58', '2025-04-14 05:22:58'),
(27, 'Filtre - Modèle Hllv', 'Renault', 'Filtre', 'Pièce détachée de type Filtre, compatible avec plusieurs modèles. Qualité certifiée, facile à installer.', 38000.00, 0, 'filtre2.jpg', '2025-04-14 05:22:58', '2025-04-14 05:22:58'),
(28, 'Batterie - Modèle ZbNt', 'BMW', 'Batterie', 'Pièce détachée de type Batterie, compatible avec plusieurs modèles. Qualité certifiée, facile à installer.', 680000.00, 16, 'batterie4.jpg', '2025-04-14 05:22:58', '2025-04-14 05:22:58'),
(29, 'Bougie - Modèle asZR', 'BMW', 'Bougie', 'Pièce détachée de type Bougie, compatible avec plusieurs modèles. Qualité certifiée, facile à installer.', 19000.00, 6, 'bougies7.jpg', '2025-04-14 05:22:58', '2025-04-14 05:22:58'),
(30, 'Plaquette - Modèle sgW4', 'Peugeot', 'Plaquette', 'Pièce détachée de type Batterie, compatible avec plusieurs modèles. Qualité certifiée, facile à installer.', 45000.00, 28, 'plaquettes1.jpeg', '2025-04-14 05:22:58', '2025-04-14 05:22:58'),
(31, 'Bougie - Modèle Qh8l', 'BMW', 'Bougie', 'Pièce détachée de type Bougie, compatible avec plusieurs modèles. Qualité certifiée, facile à installer.', 15000.00, 30, 'bougies5.jpg', '2025-04-14 05:22:58', '2025-04-14 05:22:58'),
(32, 'Plaquette - Modèle k6o0', 'Peugeot', 'Plaquette', 'Pièce détachée de type Courroie, compatible avec plusieurs modèles. Qualité certifiée, facile à installer.', 48000.00, 28, 'plaquettes1.jpeg', '2025-04-14 05:22:58', '2025-04-14 05:22:58'),
(33, 'Plaquette - Modèle GxEn', 'Renault', 'Plaquette', 'Pièce détachée de type Plaquette, compatible avec plusieurs modèles. Qualité certifiée, facile à installer.', 27000.00, 4, 'plaquettes1.jpeg', '2025-04-14 05:22:58', '2025-04-14 05:22:58'),
(34, 'Filtre - Modèle aq9t', 'Peugeot', 'Filtre', 'Pièce détachée de type Filtre, compatible avec plusieurs modèles. Qualité certifiée, facile à installer.', 35000.00, 30, 'filtre4.jpeg', '2025-04-14 05:22:58', '2025-04-14 05:22:58'),
(35, 'Courroie - Modèle 3Oki', 'Peugeot', 'Courroie', 'Pièce détachée de type Courroie, compatible avec plusieurs modèles. Qualité certifiée, facile à installer.', 55000.00, 45, 'courroi5.jpg', '2025-04-14 05:22:58', '2025-04-14 05:22:58'),
(36, 'Filtre - Modèle VpAj', 'Toyota', 'Filtre', 'Pièce détachée de type Filtre, compatible avec plusieurs modèles. Qualité certifiée, facile à installer.', 42000.00, 2, 'filtre4.jpg', '2025-04-14 05:22:58', '2025-04-14 05:22:58'),
(37, 'Bougie - Modèle hoiP', 'Toyota', 'Bougie', 'Pièce détachée de type Bougie, compatible avec plusieurs modèles. Qualité certifiée, facile à installer.', 35000.00, 40, 'bougies1.jpg', '2025-04-14 05:22:58', '2025-04-14 05:22:58'),
(38, 'Plaquette - Modèle ZdUU', 'Volkswagen', 'Plaquette', 'Pièce détachée de type Plaquette, compatible avec plusieurs modèles. Qualité certifiée, facile à installer.', 24000.00, 8, 'plaquettes1.jpeg', '2025-04-14 05:22:58', '2025-04-14 05:22:58'),
(39, 'Filtre - Modèle Z9dv', 'Peugeot', 'Filtre', 'Pièce détachée de type Filtre, compatible avec plusieurs modèles. Qualité certifiée, facile à installer.', 38000.00, 37, 'filtre5.jpeg', '2025-04-14 05:22:58', '2025-04-14 05:22:58'),
(40, 'Courroie - Modèle j5C8', 'Peugeot', 'Courroie', 'Pièce détachée de type Courroie, compatible avec plusieurs modèles. Qualité certifiée, facile à installer.', 72000.00, 11, 'courroi6.jpg', '2025-04-14 05:22:58', '2025-04-14 05:22:58'),
(41, 'Bougie - Modèle 232j', 'BMW', 'Bougie', 'Pièce détachée de type Bougie, compatible avec plusieurs modèles. Qualité certifiée, facile à installer.', 10000.00, 10, 'bougies2.jpg', '2025-04-14 05:22:58', '2025-04-14 05:22:58'),
(42, 'Courroie - Modèle 3DN1', 'BMW', 'Courroie', 'Pièce détachée de type Courroie, compatible avec plusieurs modèles. Qualité certifiée, facile à installer.', 63000.00, 28, 'courroi.jpg', '2025-04-14 05:22:58', '2025-04-14 05:22:58'),
(43, 'Filtre - Modèle D4SE', 'Toyota', 'Filtre', 'Pièce détachée de type Filtre, compatible avec plusieurs modèles. Qualité certifiée, facile à installer.', 35000.00, 32, 'filtre4.jpg', '2025-04-14 05:22:58', '2025-04-14 05:22:58'),
(44, 'Bougie - Modèle PIep', 'Peugeot', 'Bougie', 'Pièce détachée de type Bougie, compatible avec plusieurs modèles. Qualité certifiée, facile à installer.', 24000.00, 19, 'bougies3.jpeg', '2025-04-14 05:22:58', '2025-04-14 05:22:58'),
(45, 'Courroie - Modèle uUCZ', 'Renault', 'Courroie', 'Pièce détachée de type Courroie, compatible avec plusieurs modèles. Qualité certifiée, facile à installer.', 68000.00, 48, 'courroi2.png', '2025-04-14 05:22:58', '2025-04-14 05:22:58'),
(46, 'Courroie - Modèle 75ny', 'Peugeot', 'Courroie', 'Pièce détachée de type Courroie, compatible avec plusieurs modèles. Qualité certifiée, facile à installer.', 80000.00, 49, 'courroi3.png', '2025-04-14 05:22:58', '2025-04-14 05:22:58'),
(47, 'Filtre - Modèle wWWw', 'Peugeot', 'Filtre', 'Pièce détachée de type Filtre, compatible avec plusieurs modèles. Qualité certifiée, facile à installer.', 44000.00, 45, 'filtre6.jpeg', '2025-04-14 05:22:58', '2025-04-14 05:22:58'),
(48, 'Bougie - Modèle 3WwF', 'Renault', 'Bougie', 'Pièce détachée de type Bougie, compatible avec plusieurs modèles. Qualité certifiée, facile à installer.', 11800.00, 41, 'bougies4.jpg', '2025-04-14 05:22:58', '2025-04-14 05:22:58'),
(49, 'Batterie - Modèle F5NN', 'BMW', 'Batterie', 'Pièce détachée de type Batterie, compatible avec plusieurs modèles. Qualité certifiée, facile à installer.', 520000.00, 41, 'batterie9.jpeg', '2025-04-14 05:22:58', '2025-04-14 05:22:58'),
(50, 'Filtre - Modèle p6cV', 'Volkswagen', 'Filtre', 'Pièce détachée de type Filtre, compatible avec plusieurs modèles. Qualité certifiée, facile à installer.', 50000.00, 35, 'filtre6.jpg', '2025-04-14 05:22:58', '2025-04-14 05:22:58'),
(51, 'Filtre - Modèle JdjL', 'Renault', 'Filtre', 'Pièce détachée de type Filtre, compatible avec plusieurs modèles. Qualité certifiée, facile à installer.', 32000.00, 25, 'filtrea1.jpg', '2025-04-14 05:22:58', '2025-04-14 05:22:58'),
(52, 'Batterie - Modèle yy3W', 'Toyota', 'Batterie', 'Pièce détachée de type Batterie, compatible avec plusieurs modèles. Qualité certifiée, facile à installer.', 415000.00, 25, 'batterie8.jpg', '2025-04-14 05:22:58', '2025-04-14 05:22:58'),
(53, 'Filtre - Modèle PEk0', 'Renault', 'Filtre', 'Pièce détachée de type Filtre, compatible avec plusieurs modèles. Qualité certifiée, facile à installer.', 40000.00, 15, 'filtrea2.jpg', '2025-04-14 05:22:58', '2025-04-14 05:22:58'),
(54, 'Bougie - Modèle uds1', 'Volkswagen', 'Bougie', 'Pièce détachée de type Bougie, compatible avec plusieurs modèles. Qualité certifiée, facile à installer.', 40000.00, 22, 'bougies5.jpg', '2025-04-14 05:22:58', '2025-04-14 05:22:58');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Anjarasoa', 'anjara.solofondraibe@gmail.com', NULL, '$2y$10$0UWSNra/zBgCILnvBcTuV.rnct4Q6FeN35gg/0KV7k1.JiozIdUDi', NULL, '2025-04-14 02:48:16', '2025-04-14 02:48:16'),
(2, 'Anjarasoa S', 'anjara@programmer.net', NULL, '$2y$10$DEnuC9YXUQm3YetngX6lMeU.jT04kHCGxdhP0cPfyPro5fkVqY9xK', NULL, '2025-04-14 02:54:32', '2025-04-14 09:29:39'),
(3, 'Sibelle', 'tefindrainy@gmail.com', NULL, '$2y$10$TSJxtFcpbYhH/R8.5TrqT.er5F7pkiLTmqEAzjwF5q.UOgvImjxza', NULL, '2025-04-14 02:57:50', '2025-04-14 02:57:50');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
