-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  mer. 28 nov. 2018 à 18:07
-- Version du serveur :  5.7.24-0ubuntu0.16.04.1
-- Version de PHP :  7.1.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `admin_test`
--

-- --------------------------------------------------------

--
-- Structure de la table `uni1_changelogs`
--

CREATE TABLE `uni1_changelogs` (
  `revId` int(11) UNSIGNED NOT NULL,
  `userName` varchar(128) CHARACTER SET utf8 NOT NULL,
  `timestamp` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `text` text CHARACTER SET utf8 NOT NULL,
  `universe` tinyint(3) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `uni1_config`
--

CREATE TABLE `uni1_config` (
  `uni` int(11) NOT NULL,
  `VERSION` varchar(8) NOT NULL,
  `sql_revision` int(11) NOT NULL DEFAULT '0',
  `users_amount` int(11) UNSIGNED NOT NULL DEFAULT '1',
  `uni_name` varchar(30) NOT NULL,
  `game_name` varchar(30) NOT NULL,
  `game_disable` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `close_reason` text NOT NULL,
  `forum_url` varchar(128) NOT NULL DEFAULT 'http://2moons.cc',
  `adm_attack` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `debug` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `lang` varchar(2) NOT NULL DEFAULT '',
  `reg_closed` tinyint(1) NOT NULL DEFAULT '0',
  `mail_active` tinyint(1) NOT NULL DEFAULT '0',
  `mail_use` tinyint(1) NOT NULL DEFAULT '0',
  `smtp_host` varchar(64) NOT NULL DEFAULT '',
  `smtp_port` smallint(5) NOT NULL DEFAULT '0',
  `smtp_user` varchar(64) NOT NULL DEFAULT '',
  `smtp_pass` varchar(32) NOT NULL DEFAULT '',
  `smtp_ssl` enum('','ssl','tls') NOT NULL DEFAULT '',
  `smtp_sendmail` varchar(64) NOT NULL DEFAULT '',
  `smail_path` varchar(30) NOT NULL DEFAULT '/usr/sbin/sendmail',
  `user_valid` tinyint(1) NOT NULL DEFAULT '0',
  `ga_active` varchar(42) NOT NULL DEFAULT '0',
  `ga_key` varchar(42) NOT NULL DEFAULT '',
  `moduls` varchar(100) NOT NULL DEFAULT '',
  `ttf_file` varchar(128) NOT NULL DEFAULT 'styles/resource/fonts/DroidSansMono.ttf',
  `timezone` varchar(32) NOT NULL DEFAULT 'Europe/London',
  `dst` enum('0','1','2') NOT NULL DEFAULT '2',
  `usersOnline` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `ref_active` tinyint(3) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `uni1_config`
--

INSERT INTO `uni1_config` (`uni`, `VERSION`, `sql_revision`, `users_amount`, `uni_name`, `game_name`, `game_disable`, `close_reason`, `forum_url`, `adm_attack`, `debug`, `lang`, `reg_closed`, `mail_active`, `mail_use`, `smtp_host`, `smtp_port`, `smtp_user`, `smtp_pass`, `smtp_ssl`, `smtp_sendmail`, `smail_path`, `user_valid`, `ga_active`, `ga_key`, `moduls`, `ttf_file`, `timezone`, `dst`, `usersOnline`, `ref_active`) VALUES
(1, '1.8.git', 0, 58, 'Univers 1', 'War of Alliance', 0, 'Le jeu est actuellement fermé', 'https://forum.warofalliance.eu', 0, 0, 'fr', 0, 0, 0, '', 0, '', '', '', '', '/usr/sbin/sendmail', 0, '0', '', '1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1', 'styles/resource/fonts/DroidSansMono.ttf', 'UTC', '2', 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `uni1_lostpassword`
--

CREATE TABLE `uni1_lostpassword` (
  `userID` int(10) UNSIGNED NOT NULL,
  `key` varchar(32) NOT NULL,
  `time` int(10) UNSIGNED NOT NULL,
  `hasChanged` tinyint(1) NOT NULL DEFAULT '0',
  `fromIP` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `uni1_media_post`
--

CREATE TABLE `uni1_media_post` (
  `mediaId` int(11) UNSIGNED NOT NULL,
  `mediaTitle` varchar(255) DEFAULT NULL,
  `mediaLocation` varchar(255) DEFAULT NULL,
  `mediaDescription` varchar(255) DEFAULT NULL,
  `mediaLocation2` varchar(255) DEFAULT NULL,
  `imageBlock` varchar(255) DEFAULT NULL,
  `mediaType` tinyint(3) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `uni1_media_post`
--

INSERT INTO `uni1_media_post` (`mediaId`, `mediaTitle`, `mediaLocation`, `mediaDescription`, `mediaLocation2`, `imageBlock`, `mediaType`) VALUES
(1, 'The overview page', 'overview.png', NULL, NULL, NULL, 1),
(2, 'The building page', 'buildings.png', NULL, NULL, NULL, 1),
(3, 'The overview page', 'reserach.png', NULL, NULL, NULL, 1),
(4, 'The messages page', 'messafe.png', NULL, NULL, NULL, 1),
(5, 'The battle simulator page', 'battlesim.png', NULL, NULL, NULL, 1),
(6, 'Random space wallpaper', '1.jpg', NULL, NULL, NULL, 2),
(7, 'Random space wallpaper', '2.jpg', NULL, NULL, NULL, 2),
(8, 'Random space wallpaper', '3.jpg', NULL, NULL, NULL, 2),
(9, 'Video promotion', 'https://youtu.be/tQvbtHNyRqY', 'A little promotion video referencing to the space gaems', 'movie1.mp4', 'movie1.jpg', 3),
(10, 'The fleetTable page', 'fleetoverview.png', NULL, NULL, NULL, 1),
(11, 'The premium shop', 'premium.png', NULL, NULL, NULL, 1),
(12, 'The alliance page', 'alliance.png', NULL, NULL, NULL, 1),
(13, 'The tourney page', 'tourney.png', NULL, NULL, NULL, 1),
(14, 'The planet option page', 'planetarium.png', NULL, NULL, NULL, 1),
(15, 'The hall of fame page', 'hof.png', NULL, NULL, NULL, 1),
(16, 'The shipyard page', 'shipyard.png', NULL, NULL, NULL, 1),
(17, 'The statistics page', 'stats.png', NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `uni1_news`
--

CREATE TABLE `uni1_news` (
  `id` int(11) UNSIGNED NOT NULL,
  `user` varchar(64) NOT NULL,
  `date` int(11) NOT NULL,
  `title` varchar(64) NOT NULL,
  `text` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `uni1_session`
--

CREATE TABLE `uni1_session` (
  `sessionID` varchar(32) NOT NULL,
  `userID` int(10) UNSIGNED NOT NULL,
  `userIP` varchar(40) NOT NULL,
  `lastonline` int(11) NOT NULL
) ENGINE=MEMORY DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `uni1_users`
--

CREATE TABLE `uni1_users` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(32) NOT NULL DEFAULT '',
  `password` varchar(60) NOT NULL DEFAULT '',
  `universe` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `email` varchar(64) NOT NULL DEFAULT '',
  `email_2` varchar(64) NOT NULL DEFAULT '',
  `lang` varchar(2) NOT NULL DEFAULT 'de',
  `authattack` tinyint(1) NOT NULL DEFAULT '0',
  `authlevel` tinyint(1) NOT NULL DEFAULT '0',
  `chat_oper` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `gm` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `rights` text,
  `user_lastip` varchar(40) NOT NULL DEFAULT '',
  `ip_at_reg` varchar(40) NOT NULL DEFAULT '',
  `register_time` int(11) NOT NULL DEFAULT '0',
  `onlinetime` int(11) NOT NULL DEFAULT '0',
  `dpath` varchar(20) NOT NULL DEFAULT 'gow',
  `timezone` varchar(32) NOT NULL DEFAULT 'Europe/London',
  `uctime` int(11) NOT NULL DEFAULT '0',
  `setmail` int(11) NOT NULL DEFAULT '0',
  `ref_id` int(11) NOT NULL DEFAULT '0',
  `ref_bonus` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `securityCode` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `uni1_users_settings`
--

CREATE TABLE `uni1_users_settings` (
  `id` int(11) UNSIGNED NOT NULL,
  `displayname` varchar(255) NOT NULL,
  `displayChange` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `secretQuestion` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `secretAnswer` varchar(128) NOT NULL,
  `birthday` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `securityEncodage` varchar(255) DEFAULT NULL,
  `accountLogin` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `accountIp` varchar(40) NOT NULL DEFAULT '',
  `vote_sys_1` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `vote_sys_4` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `avatar` varchar(255) DEFAULT 'logo_avatar.jpg',
  `avatar_change` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `uni1_users_valid`
--

CREATE TABLE `uni1_users_valid` (
  `validationID` int(11) UNSIGNED NOT NULL,
  `userName` varchar(64) NOT NULL,
  `displayname` varchar(64) NOT NULL,
  `validationKey` varchar(32) NOT NULL,
  `password` varchar(60) NOT NULL,
  `email` varchar(64) NOT NULL,
  `secretQuestion` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `secretAnswer` varchar(128) NOT NULL,
  `birthday` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `date` int(11) NOT NULL,
  `ip` varchar(40) NOT NULL,
  `language` varchar(3) NOT NULL,
  `universe` tinyint(3) UNSIGNED NOT NULL,
  `referralID` int(11) DEFAULT NULL,
  `externalAuthUID` varchar(128) DEFAULT NULL,
  `externalAuthMethod` varchar(32) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `uni1_votesystem`
--

CREATE TABLE `uni1_votesystem` (
  `id` bigint(20) NOT NULL,
  `link` text NOT NULL,
  `prize` int(11) NOT NULL,
  `image` text NOT NULL,
  `time` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `universe` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `uni1_votesystem`
--

INSERT INTO `uni1_votesystem` (`id`, `link`, `prize`, `image`, `time`, `universe`) VALUES
(1, 'http://gametoor.com/in/2569', 1, 'http://gametoor.com/vote.jpg', 12, 1),
(4, 'http://www.root-top.com/topsite/ogame0serveurs/in.php?ID=3128', 1, 'http://img.root-top.com/topsite/ogame0serveurs/banner.gif', 2, 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `uni1_changelogs`
--
ALTER TABLE `uni1_changelogs`
  ADD PRIMARY KEY (`revId`);

--
-- Index pour la table `uni1_config`
--
ALTER TABLE `uni1_config`
  ADD PRIMARY KEY (`uni`);

--
-- Index pour la table `uni1_lostpassword`
--
ALTER TABLE `uni1_lostpassword`
  ADD PRIMARY KEY (`key`),
  ADD UNIQUE KEY `userID` (`userID`,`key`,`time`,`hasChanged`),
  ADD KEY `time` (`time`);

--
-- Index pour la table `uni1_media_post`
--
ALTER TABLE `uni1_media_post`
  ADD PRIMARY KEY (`mediaId`);

--
-- Index pour la table `uni1_news`
--
ALTER TABLE `uni1_news`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `uni1_session`
--
ALTER TABLE `uni1_session`
  ADD PRIMARY KEY (`userID`),
  ADD KEY `sessionID` (`sessionID`);

--
-- Index pour la table `uni1_users`
--
ALTER TABLE `uni1_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `authlevel` (`authlevel`),
  ADD KEY `ref_bonus` (`ref_bonus`),
  ADD KEY `universe` (`username`,`password`,`onlinetime`,`authlevel`);

--
-- Index pour la table `uni1_users_settings`
--
ALTER TABLE `uni1_users_settings`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `uni1_users_valid`
--
ALTER TABLE `uni1_users_valid`
  ADD PRIMARY KEY (`validationID`,`validationKey`);

--
-- Index pour la table `uni1_votesystem`
--
ALTER TABLE `uni1_votesystem`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `uni1_changelogs`
--
ALTER TABLE `uni1_changelogs`
  MODIFY `revId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `uni1_config`
--
ALTER TABLE `uni1_config`
  MODIFY `uni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `uni1_media_post`
--
ALTER TABLE `uni1_media_post`
  MODIFY `mediaId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `uni1_news`
--
ALTER TABLE `uni1_news`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `uni1_users`
--
ALTER TABLE `uni1_users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `uni1_users_settings`
--
ALTER TABLE `uni1_users_settings`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `uni1_users_valid`
--
ALTER TABLE `uni1_users_valid`
  MODIFY `validationID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT pour la table `uni1_votesystem`
--
ALTER TABLE `uni1_votesystem`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
