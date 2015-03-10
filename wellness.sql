-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 10. Mrz 2015 um 13:52
-- Server Version: 5.6.21
-- PHP-Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `wellness`
--

DELIMITER $$
--
-- Funktionen
--
CREATE DEFINER=`root`@`localhost` FUNCTION `GoogleDistance_KM`(
geo_breitengrad_p1 double,
geo_laengengrad_p1 double,
geo_breitengrad_p2 double,
geo_laengengrad_p2 double ) RETURNS double
RETURN (6371 * acos( cos( radians(geo_breitengrad_p2) ) * cos( radians( geo_breitengrad_p1 ) )
* cos( radians( geo_laengengrad_p1 ) - radians(geo_laengengrad_p2) )
+ sin( radians(geo_breitengrad_p2) ) * sin( radians( geo_breitengrad_p1 ) ) )
)$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `article`
--

CREATE TABLE IF NOT EXISTS `article` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `summary` text COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `auth_assignment`
--

CREATE TABLE IF NOT EXISTS `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `auth_item`
--

CREATE TABLE IF NOT EXISTS `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `auth_item_child`
--

CREATE TABLE IF NOT EXISTS `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `auth_rule`
--

CREATE TABLE IF NOT EXISTS `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `category`
--

CREATE TABLE IF NOT EXISTS `category` (
`id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `parent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Daten für Tabelle `category`
--

INSERT INTO `category` (`id`, `name`, `parent_id`) VALUES
(1, 'Kosmetikstudios', NULL),
(2, 'Nagelstudios', NULL),
(3, 'Friseure & Hairstylisten', NULL),
(4, 'Spas', NULL),
(5, 'Massagesalons', NULL),
(6, 'Ärzte & Kliniken ', NULL),
(7, 'Alternativmedizin', NULL),
(8, 'Alternativmedizin', NULL),
(9, 'Fußpflegedienste', NULL),
(10, 'Visagisten', NULL),
(11, 'Parfümerien', NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) COLLATE utf8_bin NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Daten für Tabelle `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1425068733),
('m140209_132017_init', 1425068735),
('m140403_174025_create_account_table', 1425068740),
('m140504_113157_update_tables', 1425068743),
('m140504_130429_create_token_table', 1425068744),
('m140506_102106_rbac_init', 1425068953),
('m140830_171933_fix_ip_field', 1425068744),
('m140830_172703_change_account_table_name', 1425068744),
('m141022_115922_create_session_table', 1425069057),
('m141222_110026_update_ip_field', 1425068744),
('m150104_153617_create_article_table', 1425069084),
('m150227_220803_create_address_table', 1425075184),
('m150306_235543_add_anrede_to_user_profile', 1425686784),
('m150307_000044_add_firma_to_user_profile', 1425686784),
('m150308_120853_create_category_table', 1425816837),
('m150308_121732_insert_categories_to_table', 1425817395);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `public_email` varchar(255) DEFAULT NULL,
  `gravatar_email` varchar(255) DEFAULT NULL,
  `gravatar_id` varchar(32) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `bio` text,
  `anrede` varchar(255) NOT NULL,
  `firma` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `profile`
--

INSERT INTO `profile` (`user_id`, `name`, `public_email`, `gravatar_email`, `gravatar_id`, `location`, `website`, `bio`, `anrede`, `firma`) VALUES
(1, NULL, NULL, 'admin@mail.com', 'edb0e96701c209ab4b50211c856c50c4', NULL, NULL, NULL, '', ''),
(15, NULL, NULL, 'nikitasss@mail.com', '4388a379affd8a841af32a9d24556e74', NULL, NULL, NULL, '', ''),
(16, NULL, NULL, 'admins@mail.com', 'cf8ee4baf1f8f34a031cf97ff709ca98', NULL, NULL, NULL, '', ''),
(17, NULL, NULL, 'dsfsd@mail.com', '990ddccbf5f98e9bf5ea728f237fb9dc', NULL, NULL, NULL, '', ''),
(18, NULL, NULL, 'sdfsdf@mail.com', '6c292feaffc461db8a3d167976ddd521', NULL, NULL, NULL, '', ''),
(19, NULL, NULL, 'sdfssdfsfdf@mail.com', '77be0417a749a7a0f3bc91ab4cd78143', NULL, NULL, NULL, '', ''),
(20, NULL, NULL, 'nikitssdfsa@mail.com', '17cc9eb5f9832237a2c189c5ec8b49e4', NULL, NULL, NULL, '', ''),
(21, NULL, NULL, 'nikitssdf24646sa@mail.com', '116eda55add6ac4fe0df1d0d69c4415a', NULL, NULL, NULL, '', ''),
(22, NULL, NULL, 'nikeeeeita@mail.com', '5f636c0c167d6c378f60e91d3aa75373', NULL, NULL, NULL, '', ''),
(23, NULL, NULL, 'nikitsdfsdfa@mail.com', '30ddc93d7e9d2032fd2a64a297187a2f', NULL, NULL, NULL, '', ''),
(24, NULL, NULL, 'nikitsdsfsdfdfsdfa@mail.com', '2eedd4dfefbd4f462f769943bfda4f76', NULL, NULL, NULL, '', ''),
(25, NULL, NULL, 'asd@mail.com', '1ccc71770934c5a8d78652804187ac30', NULL, NULL, NULL, '', ''),
(26, NULL, NULL, 'sign@mail.com', '9441d2b4adf7bee416f864eaa9cbdaf3', NULL, NULL, NULL, '', ''),
(27, NULL, NULL, 'adasdasd@mail.com', 'ba1471d2c78681434a8b206ae1a60100', NULL, NULL, NULL, '', ''),
(28, NULL, NULL, 'mail@vom.com', '00077da0ae15eb82fd5b709b42655113', NULL, NULL, NULL, '', ''),
(29, NULL, NULL, 'mail@test.de', '38573bdbffc5d91cbb128516d413f9e4', NULL, NULL, NULL, '', ''),
(30, NULL, NULL, 'mac-mustermann@mail.co', '6f863c813cfaf3724cb04a7ee38bbd93', NULL, NULL, NULL, '', ''),
(35, NULL, NULL, 'adasdeeakkseed@mail.com', 'd8c1d47486895cb77c19f9d932bd3784', NULL, NULL, NULL, 'herr', 'SIwabo'),
(36, NULL, NULL, 'nikddita@mail.com', '9e55e8c154a88ea05ef9521a3097bb0d', NULL, NULL, NULL, 'herr', 'SIwabo'),
(37, NULL, NULL, 'nikitwwwwwa@mail.com', 'ae0b29d89dad5bafbb6e31d0d3726b78', NULL, NULL, NULL, 'herr', 'SIwabo'),
(38, NULL, NULL, 'adasjjjjjdasd@mail.com', 'c52d513473297a736766695575239030', NULL, NULL, NULL, 'herr', 'SIwabo');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `session`
--

CREATE TABLE IF NOT EXISTS `session` (
  `id` char(64) COLLATE utf8_unicode_ci NOT NULL,
  `expire` int(11) NOT NULL,
  `data` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `session`
--

INSERT INTO `session` (`id`, `expire`, `data`) VALUES
('1mn3al23bs65vg9r01sg2larf3', 1425074475, 0x5f5f666c6173687c613a303a7b7d5f5f636170746368612f736974652f636170746368617c733a373a226a697576706568223b5f5f636170746368612f736974652f63617074636861636f756e747c693a313b),
('8k8tvmtci9qob1oitsqla5r1m2', 1425071752, 0x5f5f666c6173687c613a303a7b7d5f5f69647c693a313b),
('gkj4ul52d9o1etvfpicq7mkb22', 1425502687, 0x5f5f666c6173687c613a303a7b7d),
('psu80d0r1b1abs7jffkphtile5', 1425126208, 0x5f5f666c6173687c613a303a7b7d);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `social_account`
--

CREATE TABLE IF NOT EXISTS `social_account` (
`id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `provider` varchar(255) NOT NULL,
  `client_id` varchar(255) NOT NULL,
  `data` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `token`
--

CREATE TABLE IF NOT EXISTS `token` (
  `user_id` int(11) NOT NULL,
  `code` varchar(32) NOT NULL,
  `created_at` int(11) NOT NULL,
  `type` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `token`
--

INSERT INTO `token` (`user_id`, `code`, `created_at`, `type`) VALUES
(1, '0dGPhvSlc0JYL1O5wmmYXzmBW6C10cPO', 1425069449, 0),
(15, '91jwzCXRNAx5qQ2ihL3RSNx2q0E2cegY', 1425078440, 0),
(16, '-kq31kMaJtQ8n1C3R9PxNJ4JjXNq05zX', 1425132241, 0),
(17, 'XHDcfxdubOr3wBnaus76Nle0CV3ZH1Sj', 1425132420, 0),
(18, 'pIsPxK_9R6HkBdFeRethHTgbm8i1vJ7A', 1425132585, 0),
(18, 'zfYrrPgVJd4w4pnFDmxUrFsrNksIlEf4', 1425677949, 0),
(19, '9DZVRRpmIuWVwsUfDZijs99vLsTDKd_J', 1425132605, 0),
(20, 'fzrQcZ34XKa6NIMXRGL3tcj30FOyQGIA', 1425132710, 0),
(21, 'l1uJ00XWmf8KFx524vs2SzW-RMdfWeQK', 1425132734, 0),
(25, 'KnyNVJbvDE7Hoj1X6pAFWcCt-4vnmnpt', 1425134111, 0),
(26, 'lJ0jOd1wfnGicFX77on6GTXPrNfZFCZ_', 1425134284, 0),
(27, 'SzHiYLDtUDtG8hZzxY8aduS1It9x7o5z', 1425135635, 0),
(28, 'wCULK4mG4w10vRIlh9qeU61jDFYzQuVo', 1425135678, 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(60) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `confirmed_at` int(11) DEFAULT NULL,
  `unconfirmed_email` varchar(255) DEFAULT NULL,
  `blocked_at` int(11) DEFAULT NULL,
  `registration_ip` varchar(45) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `flags` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password_hash`, `auth_key`, `confirmed_at`, `unconfirmed_email`, `blocked_at`, `registration_ip`, `created_at`, `updated_at`, `flags`) VALUES
(1, 'admin', 'admin@mail.com', '$2y$10$zkInfZyPtxGOhu/WDy3SwOsmLwHABVgLUWz3rY45GD9LqrCj.8x02', 'nhAIQglpVu99OuhWkMh8jROK7H0yIwcN', 123456, NULL, NULL, '::1', 1425069449, 1425069449, 0),
(11, 'atkaza', 'nikita@mail.com', '$2y$10$xiRvGmbV592zHOVnixJy6OdGajrH1YK1GiH9s20riXUbi.lsDAgFW', 'GCuqOz8MjRxgKADjsmELtZwv27ZOVwz1', NULL, NULL, NULL, '::1', 1425077883, 1425077883, 0),
(15, 'atkaza33', 'nikitasss@mail.com', '$2y$10$R8Cjocy7Me1YdBorKSt.ZO2WGV1Fm29qbfHLzlF/uXvEHhIxHkVRi', 'Vl-o7FR6y2xwCYf2YkJ1IEnHcTn1t3YS', NULL, NULL, NULL, '::1', 1425078440, 1425078440, 0),
(16, 'atkazass', 'admins@mail.com', '$2y$10$CPO5uZqkOdz7Jl24L58VQOXAy9aQLQ8HW0S4ogu9oG2hc7VdwWUM.', 'O2i9X2JJewRf16l0kt4iDRnLR80RCk3F', NULL, NULL, NULL, '::1', 1425132241, 1425132241, 0),
(17, 'sdfsdfsdfs', 'dsfsd@mail.com', '$2y$10$G4eOh6ye.uHw6g80JP9JFOho7y6bA1ojIpgX212vonUSrNnfDH3pC', 'mmsoXR60NlfSsh0-PiY85y-vhdk691vV', NULL, NULL, NULL, '::1', 1425132420, 1425132420, 0),
(18, 'sdsdf', 'sdfsdf@mail.com', '$2y$10$1xNirU6pFbbyQUEJbO7JreTPfKVBTUojxbxi8ZXsVEHuk0irinNTS', '4iq4m89PwqVfeqFavYd6c7tW6h_ZfvLp', 1425678269, NULL, NULL, '::1', 1425132585, 1425678269, 0),
(19, 'sdsdfsdfsdfd', 'sdfssdfsfdf@mail.com', '$2y$10$zJRoEHXnUFgbmJydhRU3P.iigzGfRX1rdfmSRVAyDuiAdXp8c/GtC', 'kqFiOjWaZyeSrTrMWERkJ6gT9FL9TVr4', NULL, NULL, NULL, '::1', 1425132605, 1425132605, 0),
(20, 'atkaza33sdf', 'nikitssdfsa@mail.com', '$2y$10$yT5Y8h8iGD6zHsA0hkiipuMbAMo02rk.z2wf9ybaq1.c5uzu8tOhO', 'mLkVshATIVYHMfAj0re1Thdz2wmn3ZYB', NULL, NULL, NULL, '::1', 1425132710, 1425132710, 0),
(21, 'atkaza33sdf45967897', 'nikitssdf24646sa@mail.com', '$2y$10$EUWFw4sgSVTVdKO9FXRc7umWp63uXNyXmQ8Uyq/e7fpsonbIjyTY2', 'isASbUwRJjJrlwCNhy-reL7vEhOm8kpf', NULL, NULL, NULL, '::1', 1425132734, 1425132734, 0),
(22, 'sdfs3df', 'nikeeeeita@mail.com', '$2y$10$h/qc0nbC5BRPAQwc0m.ELOP6mAStA3fzdlxmzeuWZQG5Te18izHPi', 'vMBm7_ZgL-3C5SCriqHBnaTUWCKvfTJX', NULL, NULL, NULL, '::1', 1425133308, 1425133308, 0),
(23, 'atksdffsdfsdfaza', 'nikitsdfsdfa@mail.com', '$2y$10$I5fPqvHYQSaSWtV91AStLObBCB.ow16LgvwnzccV.2N6d/DK2Clv6', 'S5o3JJM1DnP2sU15I5ucRe6yomq3P119', NULL, NULL, NULL, '::1', 1425133474, 1425133474, 0),
(24, 'atksffdffsdfsdfaza', 'nikitsdsfsdfdfsdfa@mail.com', '$2y$10$r7Tcb/lzgxiyNX3SImX9Ge7X8c0E5ibx1sUM1Hsm69U2xNLZKtSAq', 'kix0JCUJ3ibdP-mIzNcIZ7u1UyFSbo42', NULL, NULL, NULL, '::1', 1425134013, 1425134013, 0),
(25, 'asdasd', 'asd@mail.com', '$2y$10$ExyRXiOflUBJLxkq2pSmXu1neI9UwKXJlOgEZliHjIvS2yiThoA9q', '8XLH2A9jqh50SugvbuL1U42wMIBrwlV0', NULL, NULL, NULL, '::1', 1425134111, 1425134111, 0),
(26, 'sign', 'sign@mail.com', '$2y$10$SCy63A2gGuLuBrJP8ioDdezanBgIb.5tzmYM5JKzyM84hdRYrg/4a', 'gXuT4Moke_qfo_ZbvXn5TWbbwpcKV5Fq', NULL, NULL, NULL, '::1', 1425134284, 1425134284, 0),
(27, 'asdasdasd', 'adasdasd@mail.com', '$2y$10$wPZ5/eVaWnneR/pyaNyzjORDUlye64W9.ySqnDCyMIxheODfx9eQy', 'h6ASwBK7uWjsYF_0kXu4CVTPHIc1PLeR', NULL, NULL, NULL, '::1', 1425135634, 1425135634, 0),
(28, 'Mustermman', 'mail@vom.com', '$2y$10$TW3INkionlowvmU9uJoHcOoDtoQQFV0tLrWntXY8SA6la8B9WhHze', 'iHY5ic0zR4kCeiSOkCvZJTknzWbVaonm', NULL, NULL, NULL, '::1', 1425135678, 1425135678, 0),
(29, 'NeuerBenutzer', 'mail@test.de', '$2y$10$mdyd3OOj0qumIpuuSujrFOZAyD3O8Sb9Mx2PCx2F..OIlgGstLIjG', 'xfZpeoMmKA-GKgw6LOimNoAgUJSwi7Mb', NULL, NULL, NULL, '::1', 1425428263, 1425428263, 0),
(30, 'MaxM', 'mac-mustermann@mail.co', '$2y$10$p0RhtT4KmZSF1reGqSzPtuC33/gGSuCp2Uvkk0UOd2ucZaNEcsQ9.', 'WfXvfgzNCwIBGBbtRog-TNbXXaE7kx-k', NULL, NULL, NULL, '::1', 1425676760, 1425676760, 0),
(31, 'Eugen', 'test@mail.com', '$2y$10$AFKe/Pffd69UwEGw7oJxl.5W0U0EMs9x2Tyqg2uYdq52tpPXixYc6', 'xOmXB2lnZt2wLjN2qAijvkG_PXmchzY-', NULL, NULL, NULL, '::1', 1425686959, 1425686959, 0),
(32, 'Maxim', 'adasdaseed@mail.com', '$2y$10$Eekliq.zJDIhU7tkJUmMZOZ72pREPSnGagUWWFjeDUsWvyDQaxFRK', 'P6IVpYCc5p1CHiBNpMFhxaleaC_-QLyS', NULL, NULL, NULL, '::1', 1425687173, 1425687173, 0),
(33, 'Maxfim', 'adasdfaseed@mail.com', '$2y$10$ZcyTnwxAur4FI0rX9sYZIe78kcLdE2/XTQ2OLgSb.M7yXWSsl1m0S', 'RvTXgq6hHomXhHC6gsiOu9VHFXVOTYel', NULL, NULL, NULL, '::1', 1425687229, 1425687229, 0),
(34, 'akkdmin', 'adasdakkseed@mail.com', '$2y$10$N6wXP7fRKAw0IVrDJdHRr.OgmKSW88USMMijZUhXUpoZyBmjUgF4a', 'aWELrT1yACZY7U9GtqCsE4IixzFEhHr3', NULL, NULL, NULL, '::1', 1425687474, 1425687474, 0),
(35, 'aeekkdmin', 'adasdeeakkseed@mail.com', '$2y$10$JXDyC02r8j5b4eGU8P3nNevLHX7PWQN9Yw.y0t8m6kLZC9xk7a/Zm', 'u5Yo-3AVfKUZBjFMK2iX7c4j6pu-o0-9', NULL, NULL, NULL, '::1', 1425687530, 1425687530, 0),
(36, 'admineee', 'nikddita@mail.com', '$2y$10$Rtw2s2fesJPjJEVNYKFjLeOqTjCIsWA2A53ATu.UFfxDdxoc0G/aW', '9rDxb2YLkdFCr9HWLHeIqQ5MWVagzXeD', NULL, NULL, NULL, '::1', 1425687606, 1425687606, 0),
(37, 'adminwww', 'nikitwwwwwa@mail.com', '$2y$10$FOJQlAS12fPGxBGCrKTv5uwVph3rMrnWh3H8nKiuU7p6fIKY6i.Ti', 'kRwVYl6YLsNUTE0QTOx846NKkIVuVvrm', 1425688156, NULL, NULL, '::1', 1425688116, 1425688156, 0),
(38, 'adminkkk', 'adasjjjjjdasd@mail.com', '$2y$10$.NVtT9igK1eLTqCwBKJ7PuB1ZlEv9azFVovDFlBp.DfP78FLx.eZy', '-ibAlyLQ5O8v4j2ldLPKzjKj_6seHBYJ', 1425689109, NULL, NULL, '::1', 1425689056, 1425689109, 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user_address`
--

CREATE TABLE IF NOT EXISTS `user_address` (
`user_id` int(11) NOT NULL,
  `strasse` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ort` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `plz` int(11) NOT NULL,
  `land` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lng` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `user_address`
--

INSERT INTO `user_address` (`user_id`, `strasse`, `ort`, `plz`, `land`, `lat`, `lng`, `created_at`, `updated_at`) VALUES
(11, 'Neunkirchener Str.25', 'Recke', 49509, NULL, '', '', 0, 0),
(15, 'Neunkirchener Str.25', 'Recke', 49509, NULL, '', '', 0, 0),
(16, 'Keine Ahnung', 'Test', 58987, NULL, '', '', 0, 0),
(17, 'Bockradener Str.25', '49477', 12356, NULL, '', '', 0, 0),
(18, 'Neunkirchener Str.25', 'Recke', 49509, NULL, '', '', 0, 0),
(19, 'Neunkirchener Str.25', 'Recke', 15987, NULL, '', '', 0, 0),
(20, 'Neuenkirchener Str.25', 'Recke', 49509, NULL, '', '', 0, 0),
(21, 'Neuenkirchener Str.25', 'Ibbenbüren', 49509, NULL, '', '', 0, 0),
(25, 'Neuenkirchener Str.25', 'Recke', 15687, NULL, '52.369457', '7.7256592', 0, 0),
(26, 'Bockstr', 'Recke', 49509, NULL, '52.3710519', '7.7189989', 0, 0),
(27, 'Neunkirchener Str. 25', 'Recke', 49509, NULL, '52.369457', '7.7256592', 0, 0),
(28, 'Bockradener Str.25', 'Ibbenbüren', 15987, NULL, '52.2811193', '7.7184676', 0, 0),
(37, 'Neunkirchener Str.25', 'Ibbenbüren', 49509, NULL, '', '', 0, 0),
(38, 'Neuenkirchener Str.25', 'Recke', 49509, NULL, '', '', 0, 0);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `article`
--
ALTER TABLE `article`
 ADD PRIMARY KEY (`id`), ADD KEY `user_id` (`user_id`);

--
-- Indizes für die Tabelle `auth_assignment`
--
ALTER TABLE `auth_assignment`
 ADD PRIMARY KEY (`item_name`,`user_id`);

--
-- Indizes für die Tabelle `auth_item`
--
ALTER TABLE `auth_item`
 ADD PRIMARY KEY (`name`), ADD KEY `rule_name` (`rule_name`), ADD KEY `idx-auth_item-type` (`type`);

--
-- Indizes für die Tabelle `auth_item_child`
--
ALTER TABLE `auth_item_child`
 ADD PRIMARY KEY (`parent`,`child`), ADD KEY `child` (`child`);

--
-- Indizes für die Tabelle `auth_rule`
--
ALTER TABLE `auth_rule`
 ADD PRIMARY KEY (`name`);

--
-- Indizes für die Tabelle `category`
--
ALTER TABLE `category`
 ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `migration`
--
ALTER TABLE `migration`
 ADD PRIMARY KEY (`version`);

--
-- Indizes für die Tabelle `profile`
--
ALTER TABLE `profile`
 ADD PRIMARY KEY (`user_id`);

--
-- Indizes für die Tabelle `session`
--
ALTER TABLE `session`
 ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `social_account`
--
ALTER TABLE `social_account`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `account_unique` (`provider`,`client_id`), ADD KEY `fk_user_account` (`user_id`);

--
-- Indizes für die Tabelle `token`
--
ALTER TABLE `token`
 ADD UNIQUE KEY `token_unique` (`user_id`,`code`,`type`);

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `user_unique_username` (`username`), ADD UNIQUE KEY `user_unique_email` (`email`);

--
-- Indizes für die Tabelle `user_address`
--
ALTER TABLE `user_address`
 ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `article`
--
ALTER TABLE `article`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `category`
--
ALTER TABLE `category`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT für Tabelle `social_account`
--
ALTER TABLE `social_account`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT für Tabelle `user_address`
--
ALTER TABLE `user_address`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `article`
--
ALTER TABLE `article`
ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints der Tabelle `auth_assignment`
--
ALTER TABLE `auth_assignment`
ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints der Tabelle `auth_item`
--
ALTER TABLE `auth_item`
ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints der Tabelle `auth_item_child`
--
ALTER TABLE `auth_item_child`
ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints der Tabelle `profile`
--
ALTER TABLE `profile`
ADD CONSTRAINT `fk_user_profile` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints der Tabelle `social_account`
--
ALTER TABLE `social_account`
ADD CONSTRAINT `fk_user_account` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints der Tabelle `token`
--
ALTER TABLE `token`
ADD CONSTRAINT `fk_user_token` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints der Tabelle `user_address`
--
ALTER TABLE `user_address`
ADD CONSTRAINT `user_address_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
