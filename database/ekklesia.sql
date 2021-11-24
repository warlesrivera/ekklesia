-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 17-09-2021 a las 12:36:51
-- Versión del servidor: 5.7.31
-- Versión de PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ccfe`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

-- DROP TABLE IF EXISTS `categories`;
-- CREATE TABLE IF NOT EXISTS `categories` (
--   `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
--   `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
--   `deleted_at` timestamp NULL DEFAULT NULL,
--   `created_at` timestamp NULL DEFAULT NULL,
--   `updated_at` timestamp NULL DEFAULT NULL,
--   PRIMARY KEY (`id`)
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cells`
--

-- DROP TABLE IF EXISTS `cells`;
-- CREATE TABLE IF NOT EXISTS `cells` (
--   `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
--   `lat` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `long` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `lider` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `zoom` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `owner` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `address` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `schedules` text COLLATE utf8mb4_unicode_ci NOT NULL,
--   `deleted_at` timestamp NULL DEFAULT NULL,
--   `created_at` timestamp NULL DEFAULT NULL,
--   `updated_at` timestamp NULL DEFAULT NULL,
--   PRIMARY KEY (`id`)
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comments`
--

-- DROP TABLE IF EXISTS `comments`;
-- CREATE TABLE IF NOT EXISTS `comments` (
--   `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
--   `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
--   `commentable_type` text COLLATE utf8mb4_unicode_ci NOT NULL,
--   `commentable_id` bigint(20) NOT NULL,
--   `user_id` bigint(20) UNSIGNED NOT NULL,
--   `deleted_at` timestamp NULL DEFAULT NULL,
--   `created_at` timestamp NULL DEFAULT NULL,
--   `updated_at` timestamp NULL DEFAULT NULL,
--   PRIMARY KEY (`id`),
--   KEY `comments_user_id_foreign` (`user_id`)
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conversations`
--

-- DROP TABLE IF EXISTS `conversations`;
-- CREATE TABLE IF NOT EXISTS `conversations` (
--   `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
--   `user_one` int(11) NOT NULL,
--   `user_two` int(11) NOT NULL,
--   `status` tinyint(1) NOT NULL,
--   `created_at` timestamp NULL DEFAULT NULL,
--   `updated_at` timestamp NULL DEFAULT NULL,
--   PRIMARY KEY (`id`)
-- ) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conversation_options`
--

-- DROP TABLE IF EXISTS `conversation_options`;
-- CREATE TABLE IF NOT EXISTS `conversation_options` (
--   `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
--   `user_id` bigint(20) UNSIGNED NOT NULL,
--   `conversation_user` bigint(20) UNSIGNED NOT NULL,
--   `not_read` tinyint(1) NOT NULL,
--   `outstanding` tinyint(1) NOT NULL,
--   `created_at` timestamp NULL DEFAULT NULL,
--   `updated_at` timestamp NULL DEFAULT NULL,
--   PRIMARY KEY (`id`),
--   KEY `conversation_options_user_id_foreign` (`user_id`)
-- ) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `devotionals`
--

-- DROP TABLE IF EXISTS `devotionals`;
-- CREATE TABLE IF NOT EXISTS `devotionals` (
--   `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
--   `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `description` longtext COLLATE utf8mb4_unicode_ci,
--   `image_principal` text COLLATE utf8mb4_unicode_ci NOT NULL,
--   `images` text COLLATE utf8mb4_unicode_ci,
--   `state` tinyint(1) NOT NULL,
--   `date` date NOT NULL,
--   `time` time NOT NULL,
--   `count` int(11) NOT NULL DEFAULT '0',
--   `created_at` timestamp NULL DEFAULT NULL,
--   `updated_at` timestamp NULL DEFAULT NULL,
--   `deleted_at` timestamp NULL DEFAULT NULL,
--   `user_id` bigint(20) UNSIGNED NOT NULL,
--   PRIMARY KEY (`id`),
--   KEY `devotionals_user_id_foreign` (`user_id`)
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `friendships`
--

-- DROP TABLE IF EXISTS `friendships`;
-- CREATE TABLE IF NOT EXISTS `friendships` (
--   `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
--   `sender_id` int(10) UNSIGNED NOT NULL,
--   `sender_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
--   `recipient_id` int(10) UNSIGNED NOT NULL,
--   `recipient_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
--   `status` tinyint(4) NOT NULL DEFAULT '0',
--   `created_at` timestamp NULL DEFAULT NULL,
--   `updated_at` timestamp NULL DEFAULT NULL,
--   PRIMARY KEY (`id`),
--   KEY `friendships_sender_id_sender_type_index` (`sender_id`,`sender_type`),
--   KEY `friendships_recipient_id_recipient_type_index` (`recipient_id`,`recipient_type`)
-- ) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `likes`
--

-- DROP TABLE IF EXISTS `likes`;
-- CREATE TABLE IF NOT EXISTS `likes` (
--   `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
--   `state` tinyint(1) NOT NULL,
--   `likeable_type` text COLLATE utf8mb4_unicode_ci NOT NULL,
--   `likeable_id` bigint(20) NOT NULL,
--   `user_id` bigint(20) UNSIGNED NOT NULL,
--   `deleted_at` timestamp NULL DEFAULT NULL,
--   `created_at` timestamp NULL DEFAULT NULL,
--   `updated_at` timestamp NULL DEFAULT NULL,
--   PRIMARY KEY (`id`),
--   KEY `likes_user_id_foreign` (`user_id`)
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `meetings`
--

-- DROP TABLE IF EXISTS `meetings`;
-- CREATE TABLE IF NOT EXISTS `meetings` (
--   `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
--   `video_id` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Id del video en Youtube',
--   `date_publish` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Fecha de publicacion',
--   `title` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Titulo del video',
--   `description` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Descripcion del video',
--   `date` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Fecha',
--   `time` varchar(8) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Hora',
--   `url` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Url del video',
--   `image` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Url de la imagen',
--   `tipo` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Tipo de medio, VID = Video, AUD=Audio',
--   `created_at` timestamp NULL DEFAULT NULL,
--   `updated_at` timestamp NULL DEFAULT NULL,
--   PRIMARY KEY (`id`),
--   UNIQUE KEY `IND_AUX1` (`video_id`)
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Meetings' ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `members`
--

-- DROP TABLE IF EXISTS `members`;
-- CREATE TABLE IF NOT EXISTS `members` (
--   `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
--   `cell_id` bigint(20) UNSIGNED NOT NULL,
--   `user_id` bigint(20) UNSIGNED NOT NULL,
--   `date` date NOT NULL,
--   `time` time NOT NULL,
--   `deleted_at` timestamp NULL DEFAULT NULL,
--   `created_at` timestamp NULL DEFAULT NULL,
--   `updated_at` timestamp NULL DEFAULT NULL,
--   PRIMARY KEY (`id`),
--   KEY `members_cell_id_foreign` (`cell_id`),
--   KEY `members_user_id_foreign` (`user_id`)
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `messages`
--

-- DROP TABLE IF EXISTS `messages`;
-- CREATE TABLE IF NOT EXISTS `messages` (
--   `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
--   `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
--   `is_seen` tinyint(1) NOT NULL DEFAULT '0',
--   `deleted_from_sender` tinyint(1) NOT NULL DEFAULT '0',
--   `deleted_from_receiver` tinyint(1) NOT NULL DEFAULT '0',
--   `user_id` int(11) NOT NULL,
--   `conversation_id` int(11) NOT NULL,
--   `created_at` timestamp NULL DEFAULT NULL,
--   `updated_at` timestamp NULL DEFAULT NULL,
--   PRIMARY KEY (`id`)
-- ) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ministeries`
--

-- DROP TABLE IF EXISTS `ministeries`;
-- CREATE TABLE IF NOT EXISTS `ministeries` (
--   `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
--   `name` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
--   `images` text COLLATE utf8mb4_unicode_ci NOT NULL,
--   `created_at` timestamp NULL DEFAULT NULL,
--   `updated_at` timestamp NULL DEFAULT NULL,
--   `deleted_at` timestamp NULL DEFAULT NULL,
--   PRIMARY KEY (`id`)
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ministeries_users`
--

-- DROP TABLE IF EXISTS `ministeries_users`;
-- CREATE TABLE IF NOT EXISTS `ministeries_users` (
--   `ministery_id` bigint(20) UNSIGNED NOT NULL,
--   `user_id` bigint(20) UNSIGNED NOT NULL,
--   KEY `ministeries_users_ministery_id_foreign` (`ministery_id`),
--   KEY `ministeries_users_user_id_foreign` (`user_id`)
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oauth_access_tokens`
--

-- DROP TABLE IF EXISTS `oauth_access_tokens`;
-- CREATE TABLE IF NOT EXISTS `oauth_access_tokens` (
--   `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `user_id` bigint(20) UNSIGNED DEFAULT NULL,
--   `client_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
--   `scopes` text COLLATE utf8mb4_unicode_ci,
--   `revoked` tinyint(1) NOT NULL,
--   `created_at` timestamp NULL DEFAULT NULL,
--   `updated_at` timestamp NULL DEFAULT NULL,
--   `expires_at` datetime DEFAULT NULL,
--   PRIMARY KEY (`id`),
--   KEY `oauth_access_tokens_user_id_index` (`user_id`)
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oauth_auth_codes`
--

-- DROP TABLE IF EXISTS `oauth_auth_codes`;
-- CREATE TABLE IF NOT EXISTS `oauth_auth_codes` (
--   `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `user_id` bigint(20) UNSIGNED NOT NULL,
--   `client_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `scopes` text COLLATE utf8mb4_unicode_ci,
--   `revoked` tinyint(1) NOT NULL,
--   `expires_at` datetime DEFAULT NULL,
--   PRIMARY KEY (`id`),
--   KEY `oauth_auth_codes_user_id_index` (`user_id`)
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oauth_clients`
--

-- DROP TABLE IF EXISTS `oauth_clients`;
-- CREATE TABLE IF NOT EXISTS `oauth_clients` (
--   `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `user_id` bigint(20) UNSIGNED DEFAULT NULL,
--   `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
--   `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
--   `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
--   `personal_access_client` tinyint(1) NOT NULL,
--   `password_client` tinyint(1) NOT NULL,
--   `revoked` tinyint(1) NOT NULL,
--   `created_at` timestamp NULL DEFAULT NULL,
--   `updated_at` timestamp NULL DEFAULT NULL,
--   PRIMARY KEY (`id`),
--   KEY `oauth_clients_user_id_index` (`user_id`)
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oauth_personal_access_clients`
--

-- DROP TABLE IF EXISTS `oauth_personal_access_clients`;
-- CREATE TABLE IF NOT EXISTS `oauth_personal_access_clients` (
--   `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
--   `client_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `created_at` timestamp NULL DEFAULT NULL,
--   `updated_at` timestamp NULL DEFAULT NULL,
--   PRIMARY KEY (`id`)
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oauth_refresh_tokens`
--

-- DROP TABLE IF EXISTS `oauth_refresh_tokens`;
-- CREATE TABLE IF NOT EXISTS `oauth_refresh_tokens` (
--   `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `revoked` tinyint(1) NOT NULL,
--   `expires_at` datetime DEFAULT NULL,
--   PRIMARY KEY (`id`)
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

-- DROP TABLE IF EXISTS `password_resets`;
-- CREATE TABLE IF NOT EXISTS `password_resets` (
--   `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `created_at` timestamp NULL DEFAULT NULL,
--   KEY `password_resets_email_index` (`email`)
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- -- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

-- DROP TABLE IF EXISTS `personal_access_tokens`;
-- CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
--   `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
--   `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `tokenable_id` bigint(20) UNSIGNED NOT NULL,
--   `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `abilities` text COLLATE utf8mb4_unicode_ci,
--   `last_used_at` timestamp NULL DEFAULT NULL,
--   `created_at` timestamp NULL DEFAULT NULL,
--   `updated_at` timestamp NULL DEFAULT NULL,
--   PRIMARY KEY (`id`),
--   UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
--   KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
-- ) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prays`
--

-- DROP TABLE IF EXISTS `prays`;
-- CREATE TABLE IF NOT EXISTS `prays` (
--   `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
--   `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
--   `state` tinyint(1) NOT NULL,
--   `date` date NOT NULL,
--   `time` time NOT NULL,
--   `created_at` timestamp NULL DEFAULT NULL,
--   `updated_at` timestamp NULL DEFAULT NULL,
--   `user_id` bigint(20) UNSIGNED NOT NULL,
--   `deleted_at` timestamp NULL DEFAULT NULL,
--   PRIMARY KEY (`id`),
--   KEY `prays_user_id_foreign` (`user_id`)
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `precendent_meetings`
--

-- DROP TABLE IF EXISTS `precendent_meetings`;
-- CREATE TABLE IF NOT EXISTS `precendent_meetings` (
--   `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
--   `date_meeting` date NOT NULL,
--   `time` int(11) NOT NULL,
--   `total_precendent` int(3) DEFAULT NULL,
--   `state` tinyint(1) DEFAULT NULL,
--   `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
--   `deleted_at` timestamp NULL DEFAULT NULL,
--   `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
--   PRIMARY KEY (`id`)
-- ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

-- DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_has_permissions`
--

-- DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

-- DROP TABLE IF EXISTS `sessions`;
-- CREATE TABLE IF NOT EXISTS `sessions` (
--   `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `user_id` bigint(20) UNSIGNED DEFAULT NULL,
--   `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
--   `user_agent` text COLLATE utf8mb4_unicode_ci,
--   `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
--   `last_activity` int(11) NOT NULL,
--   PRIMARY KEY (`id`),
--   KEY `sessions_user_id_index` (`user_id`),
--   KEY `sessions_last_activity_index` (`last_activity`)
-- ) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `testimonies`
--

-- DROP TABLE IF EXISTS `testimonies`;
-- CREATE TABLE IF NOT EXISTS `testimonies` (
--   `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
--   `state` tinyint(1) NOT NULL,
--   `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
--   `date` date NOT NULL,
--   `time` time NOT NULL,
--   `id_category` bigint(20) UNSIGNED NOT NULL,
--   `user_id` bigint(20) UNSIGNED NOT NULL,
--   `deleted_at` timestamp NULL DEFAULT NULL,
--   `created_at` timestamp NULL DEFAULT NULL,
--   `updated_at` timestamp NULL DEFAULT NULL,
--   PRIMARY KEY (`id`),
--   KEY `testimonies_id_category_foreign` (`id_category`),
--   KEY `testimonies_user_id_foreign` (`user_id`)
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` text COLLATE utf8mb4_unicode_ci,
  `profile` text COLLATE utf8mb4_unicode_ci,
  `hobbie` text COLLATE utf8mb4_unicode_ci,
  `phone` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `token_not` text COLLATE utf8mb4_unicode_ci,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_friendship_groups`
--

-- DROP TABLE IF EXISTS `user_friendship_groups`;
-- CREATE TABLE IF NOT EXISTS `user_friendship_groups` (
--   `friendship_id` int(10) UNSIGNED NOT NULL,
--   `friend_id` int(10) UNSIGNED NOT NULL,
--   `friend_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
--   `group_id` int(10) UNSIGNED NOT NULL,
--   UNIQUE KEY `unique` (`friendship_id`,`friend_id`,`friend_type`,`group_id`),
--   KEY `user_friendship_groups_friend_id_friend_type_index` (`friend_id`,`friend_type`)
-- ) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_precendents`
--

-- DROP TABLE IF EXISTS `user_precendents`;
-- CREATE TABLE IF NOT EXISTS `user_precendents` (
--   `id` int(11) NOT NULL AUTO_INCREMENT,
--   `precedent_meeting_id` int(11) UNSIGNED NOT NULL,
--   `user_id` bigint(20) UNSIGNED NOT NULL,
--   `token` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
--   `assistance` tinyint(1) DEFAULT NULL,
--   `created_at` timestamp NULL DEFAULT NULL,
--   `updated_at` timestamp NULL DEFAULT NULL,
--   `deleted_at` timestamp NULL DEFAULT NULL,
--   PRIMARY KEY (`id`),
--   KEY `user_id` (`user_id`),
--   KEY `precedent_meeting_id` (`precedent_meeting_id`)
-- ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comments`
--
-- ALTER TABLE `comments`
--   ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

-- --
-- -- Filtros para la tabla `devotionals`
-- --
-- ALTER TABLE `devotionals`
--   ADD CONSTRAINT `devotionals_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

-- --
-- -- Filtros para la tabla `likes`
-- --
-- ALTER TABLE `likes`
--   ADD CONSTRAINT `likes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

-- --
-- -- Filtros para la tabla `members`
-- --
-- ALTER TABLE `members`
--   ADD CONSTRAINT `members_cell_id_foreign` FOREIGN KEY (`cell_id`) REFERENCES `cells` (`id`),
--   ADD CONSTRAINT `members_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `ministeries_users`
--
-- ALTER TABLE `ministeries_users`
--   ADD CONSTRAINT `ministeries_users_ministery_id_foreign` FOREIGN KEY (`ministery_id`) REFERENCES `ministeries` (`id`),
--   ADD CONSTRAINT `ministeries_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

-- --
-- -- Filtros para la tabla `model_has_permissions`
-- --
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

-- --
-- -- Filtros para la tabla `model_has_roles`
-- --
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

-- --
-- -- Filtros para la tabla `prays`
-- --
-- ALTER TABLE `prays`
--   ADD CONSTRAINT `prays_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

-- --
-- -- Filtros para la tabla `role_has_permissions`
-- --
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- -- Filtros para la tabla `testimonies`
-- --
-- ALTER TABLE `testimonies`
--   ADD CONSTRAINT `testimonies_id_category_foreign` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id`),
--   ADD CONSTRAINT `testimonies_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `user_precendents`
--
-- ALTER TABLE `user_precendents`
--   ADD CONSTRAINT `user_precendents_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
--   ADD CONSTRAINT `user_precendents_ibfk_2` FOREIGN KEY (`precedent_meeting_id`) REFERENCES `precendent_meetings` (`id`) ON DELETE CASCADE;
-- COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
