-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  mer. 28 nov. 2018 à 18:09
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
-- Structure de la table `uni1_aks`
--

CREATE TABLE `uni1_aks` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `target` int(11) UNSIGNED NOT NULL,
  `ankunft` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `uni1_alliance`
--

CREATE TABLE `uni1_alliance` (
  `id` int(11) UNSIGNED NOT NULL,
  `ally_name` varchar(50) DEFAULT '',
  `ally_tag` varchar(20) DEFAULT '',
  `ally_owner` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `ally_register_time` int(11) NOT NULL DEFAULT '0',
  `ally_description` text,
  `ally_web` varchar(255) DEFAULT '',
  `ally_text` text,
  `ally_image` varchar(255) DEFAULT '',
  `ally_request` varchar(1000) DEFAULT NULL,
  `ally_request_notallow` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `ally_request_min_points` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `ally_owner_range` varchar(32) DEFAULT '',
  `ally_members` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `ally_stats` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `ally_diplo` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `ally_universe` tinyint(3) UNSIGNED NOT NULL,
  `ally_max_members` int(5) UNSIGNED NOT NULL DEFAULT '20',
  `ally_events` varchar(55) NOT NULL DEFAULT '',
  `alliance_storage_metal` double(50,0) UNSIGNED NOT NULL DEFAULT '0',
  `alliance_storage_crystal` double(50,0) UNSIGNED NOT NULL DEFAULT '0',
  `alliance_storage_deuterium` double(50,0) UNSIGNED NOT NULL DEFAULT '0',
  `alliance_storage_research` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `alliance_storage_darkmatter` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `alliance_storage_stellar` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `allianceDivision` tinyint(3) UNSIGNED NOT NULL DEFAULT '5',
  `allianceLevel` int(11) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `uni1_alliance_developments`
--

CREATE TABLE `uni1_alliance_developments` (
  `skillId` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `maxLevel` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `costMetal` double(50,0) UNSIGNED NOT NULL DEFAULT '0',
  `costCrystal` double(50,0) UNSIGNED NOT NULL DEFAULT '0',
  `costDeuterium` double(50,0) UNSIGNED NOT NULL DEFAULT '0',
  `costResearh` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `costDarkmatter` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `costStellar` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `isSelected` tinyint(3) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `uni1_alliance_developments`
--

INSERT INTO `uni1_alliance_developments` (`skillId`, `maxLevel`, `costMetal`, `costCrystal`, `costDeuterium`, `costResearh`, `costDarkmatter`, `costStellar`, `isSelected`) VALUES
(1101, 30, 240000000, 120000000, 60000000, 0, 0, 0, 0),
(1102, 0, 250000000, 250000000, 250000000, 0, 0, 0, 0),
(1103, 0, 1000000000, 1000000000, 1000000000, 0, 2500, 0, 0),
(1104, 0, 4000000000, 4000000000, 4000000000, 500, 5000, 0, 0),
(1105, 0, 16000000000, 16000000000, 16000000000, 1000, 10000, 1, 0),
(1106, 0, 64000000000, 64000000000, 64000000000, 2000, 20000, 5, 0),
(1107, 0, 260000000000, 260000000000, 260000000000, 4000, 40000, 25, 0),
(1108, 0, 1000000000000, 1000000000000, 1000000000000, 10000, 100000, 100, 0);

-- --------------------------------------------------------

--
-- Structure de la table `uni1_alliance_ranks`
--

CREATE TABLE `uni1_alliance_ranks` (
  `rankID` int(11) NOT NULL,
  `rankName` varchar(32) NOT NULL,
  `allianceID` int(10) UNSIGNED NOT NULL,
  `MEMBERLIST` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `ONLINESTATE` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `TRANSFER` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `SEEAPPLY` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `MANAGEAPPLY` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `ROUNDMAIL` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `ADMIN` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `KICK` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `DIPLOMATIC` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `RANKS` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `MANAGEUSERS` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `EVENTS` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `BANK` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `PLANETS` tinyint(3) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `uni1_alliance_request`
--

CREATE TABLE `uni1_alliance_request` (
  `applyID` int(10) UNSIGNED NOT NULL,
  `text` text NOT NULL,
  `userID` int(10) UNSIGNED NOT NULL,
  `allianceID` int(10) UNSIGNED NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `uni1_arsenal_details`
--

CREATE TABLE `uni1_arsenal_details` (
  `arsenalId` int(11) UNSIGNED NOT NULL,
  `arsenalClass` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `uni1_arsenal_details`
--

INSERT INTO `uni1_arsenal_details` (`arsenalId`, `arsenalClass`) VALUES
(1, 'd1'),
(2, 'd2'),
(3, 'd3'),
(4, 'd4'),
(5, 'd5'),
(6, 'd6'),
(7, 'd7'),
(8, 'd999');

-- --------------------------------------------------------

--
-- Structure de la table `uni1_banned`
--

CREATE TABLE `uni1_banned` (
  `id` int(11) UNSIGNED NOT NULL,
  `who` varchar(64) NOT NULL DEFAULT '',
  `theme` varchar(500) NOT NULL,
  `time` int(11) NOT NULL DEFAULT '0',
  `longer` int(11) NOT NULL DEFAULT '0',
  `author` varchar(64) NOT NULL DEFAULT '',
  `email` varchar(64) NOT NULL DEFAULT '',
  `universe` tinyint(3) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `uni1_blacklist`
--

CREATE TABLE `uni1_blacklist` (
  `blackId` int(11) UNSIGNED NOT NULL,
  `blackText` varchar(255) DEFAULT NULL,
  `blackTime` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `blackBy` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `uni1_buddy`
--

CREATE TABLE `uni1_buddy` (
  `id` int(11) UNSIGNED NOT NULL,
  `sender` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `owner` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `universe` tinyint(3) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `uni1_buddy_request`
--

CREATE TABLE `uni1_buddy_request` (
  `id` int(11) UNSIGNED NOT NULL,
  `text` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `uni1_chat`
--

CREATE TABLE `uni1_chat` (
  `messageid` bigint(20) UNSIGNED NOT NULL,
  `user` text COMMENT 'Chat message user name',
  `iduser` int(11) NOT NULL DEFAULT '0',
  `message` text,
  `timestamp` int(11) NOT NULL DEFAULT '0',
  `ally_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `uni1_chat_online`
--

CREATE TABLE `uni1_chat_online` (
  `id` int(11) NOT NULL,
  `username` text CHARACTER SET utf8 NOT NULL,
  `last_time` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `uni1_chat_online_ally`
--

CREATE TABLE `uni1_chat_online_ally` (
  `id` int(11) NOT NULL,
  `username` text CHARACTER SET utf8 NOT NULL,
  `last_time` int(11) NOT NULL,
  `ally_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `uni1_chat_rooms`
--

CREATE TABLE `uni1_chat_rooms` (
  `id` int(11) NOT NULL,
  `id_owner` int(11) NOT NULL,
  `name_owner` varchar(30) CHARACTER SET utf8 NOT NULL,
  `name` varchar(30) CHARACTER SET utf8 NOT NULL,
  `pass` varchar(60) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `uni1_chat_rooms_messages`
--

CREATE TABLE `uni1_chat_rooms_messages` (
  `messageid` bigint(20) UNSIGNED NOT NULL,
  `user` text CHARACTER SET utf8 COMMENT 'Chat message user name',
  `iduser` int(11) NOT NULL DEFAULT '0',
  `message` text CHARACTER SET utf8,
  `timestamp` int(11) NOT NULL DEFAULT '0',
  `room_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `uni1_chat_rooms_online`
--

CREATE TABLE `uni1_chat_rooms_online` (
  `id` int(11) NOT NULL,
  `username` text CHARACTER SET utf8 NOT NULL,
  `last_time` int(11) NOT NULL,
  `room_id` int(11) NOT NULL
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
  `game_speed` bigint(20) UNSIGNED NOT NULL DEFAULT '2500',
  `fleet_speed` bigint(20) UNSIGNED NOT NULL DEFAULT '2500',
  `resource_multiplier` smallint(5) UNSIGNED NOT NULL DEFAULT '1',
  `halt_speed` smallint(5) UNSIGNED NOT NULL DEFAULT '1',
  `Fleet_Cdr` tinyint(3) UNSIGNED NOT NULL DEFAULT '30',
  `Defs_Cdr` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `initial_fields` smallint(5) UNSIGNED NOT NULL DEFAULT '163',
  `uni_name` varchar(30) NOT NULL,
  `game_name` varchar(30) NOT NULL,
  `game_disable` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `close_reason` text NOT NULL,
  `metal_basic_income` int(11) NOT NULL DEFAULT '20',
  `crystal_basic_income` int(11) NOT NULL DEFAULT '10',
  `deuterium_basic_income` int(11) NOT NULL DEFAULT '0',
  `energy_basic_income` int(11) NOT NULL DEFAULT '0',
  `research_basic_income` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `LastSettedGalaxyPos` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `LastSettedSystemPos` smallint(5) UNSIGNED NOT NULL DEFAULT '1',
  `LastSettedPlanetPos` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `noobprotection` int(11) NOT NULL DEFAULT '0',
  `noobprotectiontime` int(11) NOT NULL DEFAULT '5000',
  `noobprotectionmulti` int(11) NOT NULL DEFAULT '5',
  `forum_url` varchar(128) NOT NULL DEFAULT 'http://2moons.cc',
  `adm_attack` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `debug` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `lang` varchar(2) NOT NULL DEFAULT '',
  `stat` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `stat_level` tinyint(3) UNSIGNED NOT NULL DEFAULT '2',
  `stat_last_update` int(11) NOT NULL DEFAULT '0',
  `stat_settings` int(11) UNSIGNED NOT NULL DEFAULT '1000',
  `stat_update_time` tinyint(3) UNSIGNED NOT NULL DEFAULT '25',
  `stat_last_db_update` int(11) NOT NULL DEFAULT '0',
  `stats_fly_lock` int(11) NOT NULL DEFAULT '0',
  `cron_lock` int(11) NOT NULL DEFAULT '0',
  `ts_modon` tinyint(1) NOT NULL DEFAULT '0',
  `ts_server` varchar(64) NOT NULL DEFAULT '',
  `ts_tcpport` smallint(5) UNSIGNED NOT NULL DEFAULT '0',
  `ts_udpport` smallint(5) UNSIGNED NOT NULL DEFAULT '0',
  `ts_timeout` tinyint(1) NOT NULL DEFAULT '1',
  `ts_version` tinyint(1) NOT NULL DEFAULT '2',
  `ts_cron_last` int(11) NOT NULL DEFAULT '0',
  `ts_cron_interval` smallint(5) NOT NULL DEFAULT '5',
  `ts_login` varchar(32) NOT NULL DEFAULT '',
  `ts_password` varchar(32) NOT NULL DEFAULT '',
  `reg_closed` tinyint(1) NOT NULL DEFAULT '0',
  `OverviewNewsFrame` tinyint(1) NOT NULL DEFAULT '1',
  `OverviewNewsText` text NOT NULL,
  `capaktiv` tinyint(1) NOT NULL DEFAULT '0',
  `cappublic` varchar(42) NOT NULL DEFAULT '',
  `capprivate` varchar(42) NOT NULL DEFAULT '',
  `min_build_time` tinyint(2) NOT NULL DEFAULT '1',
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
  `fb_on` tinyint(1) NOT NULL DEFAULT '0',
  `fb_apikey` varchar(42) NOT NULL DEFAULT '',
  `fb_skey` varchar(42) NOT NULL DEFAULT '',
  `ga_active` varchar(42) NOT NULL DEFAULT '0',
  `ga_key` varchar(42) NOT NULL DEFAULT '',
  `moduls` varchar(100) NOT NULL DEFAULT '',
  `trade_allowed_ships` varchar(255) NOT NULL DEFAULT '202,401',
  `trade_charge` varchar(5) NOT NULL DEFAULT '30',
  `chat_closed` tinyint(1) NOT NULL DEFAULT '0',
  `chat_allowchan` tinyint(1) NOT NULL DEFAULT '1',
  `chat_allowmes` tinyint(1) NOT NULL DEFAULT '1',
  `chat_allowdelmes` tinyint(1) NOT NULL DEFAULT '1',
  `chat_logmessage` tinyint(1) NOT NULL DEFAULT '1',
  `chat_nickchange` tinyint(1) NOT NULL DEFAULT '1',
  `chat_botname` varchar(15) NOT NULL DEFAULT '2Moons',
  `chat_channelname` varchar(15) NOT NULL DEFAULT '2Moons',
  `chat_socket_active` tinyint(1) NOT NULL DEFAULT '0',
  `chat_socket_host` varchar(64) NOT NULL DEFAULT '',
  `chat_socket_ip` varchar(40) NOT NULL DEFAULT '',
  `chat_socket_port` smallint(5) NOT NULL DEFAULT '0',
  `chat_socket_chatid` tinyint(1) NOT NULL DEFAULT '1',
  `max_galaxy` tinyint(3) UNSIGNED NOT NULL DEFAULT '9',
  `max_system` smallint(5) UNSIGNED NOT NULL DEFAULT '400',
  `max_planets` tinyint(3) UNSIGNED NOT NULL DEFAULT '15',
  `planet_factor` float(2,1) NOT NULL DEFAULT '1.0',
  `max_elements_build` tinyint(3) UNSIGNED NOT NULL DEFAULT '5',
  `max_elements_tech` tinyint(3) UNSIGNED NOT NULL DEFAULT '2',
  `max_elements_ships` tinyint(3) UNSIGNED NOT NULL DEFAULT '10',
  `min_player_planets` tinyint(3) UNSIGNED NOT NULL DEFAULT '9',
  `planets_tech` tinyint(4) NOT NULL DEFAULT '11',
  `planets_officier` tinyint(4) NOT NULL DEFAULT '5',
  `planets_per_tech` float(2,1) NOT NULL DEFAULT '0.5',
  `max_fleet_per_build` bigint(20) UNSIGNED NOT NULL DEFAULT '1000000',
  `deuterium_cost_galaxy` int(11) UNSIGNED NOT NULL DEFAULT '10',
  `max_dm_missions` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `max_overflow` float(2,1) NOT NULL DEFAULT '1.0',
  `moon_factor` float(2,1) NOT NULL DEFAULT '1.0',
  `moon_chance` tinyint(3) UNSIGNED NOT NULL DEFAULT '20',
  `darkmatter_cost_trader` int(11) UNSIGNED NOT NULL DEFAULT '750',
  `factor_university` tinyint(3) UNSIGNED NOT NULL DEFAULT '8',
  `max_fleets_per_acs` tinyint(3) UNSIGNED NOT NULL DEFAULT '16',
  `debris_moon` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `vmode_min_time` int(11) NOT NULL DEFAULT '259200',
  `gate_wait_time` int(11) NOT NULL DEFAULT '3600',
  `metal_start` int(11) UNSIGNED NOT NULL DEFAULT '500',
  `crystal_start` int(11) UNSIGNED NOT NULL DEFAULT '500',
  `deuterium_start` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `darkmatter_start` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `ttf_file` varchar(128) NOT NULL DEFAULT 'styles/resource/fonts/DroidSansMono.ttf',
  `ref_active` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `ref_bonus` int(11) UNSIGNED NOT NULL DEFAULT '1000',
  `ref_minpoints` bigint(20) UNSIGNED NOT NULL DEFAULT '2000',
  `ref_max_referals` tinyint(1) UNSIGNED NOT NULL DEFAULT '5',
  `del_oldstuff` tinyint(3) UNSIGNED NOT NULL DEFAULT '3',
  `del_user_manually` tinyint(3) UNSIGNED NOT NULL DEFAULT '7',
  `del_user_automatic` tinyint(3) UNSIGNED NOT NULL DEFAULT '30',
  `del_user_sendmail` tinyint(3) UNSIGNED NOT NULL DEFAULT '21',
  `sendmail_inactive` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `silo_factor` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `timezone` varchar(32) NOT NULL DEFAULT 'Europe/London',
  `dst` enum('0','1','2') NOT NULL DEFAULT '2',
  `energySpeed` float(4,2) NOT NULL DEFAULT '1.00',
  `disclamerAddress` text NOT NULL,
  `disclamerPhone` text NOT NULL,
  `disclamerMail` text NOT NULL,
  `disclamerNotice` text NOT NULL,
  `alliance_create_min_points` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `isShortly` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `dateFormat` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `timeFormat` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `site_title` text NOT NULL,
  `meta_descrip` varchar(5000) NOT NULL,
  `meta_title` varchar(500) NOT NULL,
  `site_favicon` varchar(255) NOT NULL,
  `site_logo` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_name` varchar(128) NOT NULL,
  `tourneyEnd` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `cost_teleport` int(11) UNSIGNED NOT NULL DEFAULT '1500'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `uni1_config`
--

INSERT INTO `uni1_config` (`uni`, `VERSION`, `sql_revision`, `users_amount`, `game_speed`, `fleet_speed`, `resource_multiplier`, `halt_speed`, `Fleet_Cdr`, `Defs_Cdr`, `initial_fields`, `uni_name`, `game_name`, `game_disable`, `close_reason`, `metal_basic_income`, `crystal_basic_income`, `deuterium_basic_income`, `energy_basic_income`, `research_basic_income`, `LastSettedGalaxyPos`, `LastSettedSystemPos`, `LastSettedPlanetPos`, `noobprotection`, `noobprotectiontime`, `noobprotectionmulti`, `forum_url`, `adm_attack`, `debug`, `lang`, `stat`, `stat_level`, `stat_last_update`, `stat_settings`, `stat_update_time`, `stat_last_db_update`, `stats_fly_lock`, `cron_lock`, `ts_modon`, `ts_server`, `ts_tcpport`, `ts_udpport`, `ts_timeout`, `ts_version`, `ts_cron_last`, `ts_cron_interval`, `ts_login`, `ts_password`, `reg_closed`, `OverviewNewsFrame`, `OverviewNewsText`, `capaktiv`, `cappublic`, `capprivate`, `min_build_time`, `mail_active`, `mail_use`, `smtp_host`, `smtp_port`, `smtp_user`, `smtp_pass`, `smtp_ssl`, `smtp_sendmail`, `smail_path`, `user_valid`, `fb_on`, `fb_apikey`, `fb_skey`, `ga_active`, `ga_key`, `moduls`, `trade_allowed_ships`, `trade_charge`, `chat_closed`, `chat_allowchan`, `chat_allowmes`, `chat_allowdelmes`, `chat_logmessage`, `chat_nickchange`, `chat_botname`, `chat_channelname`, `chat_socket_active`, `chat_socket_host`, `chat_socket_ip`, `chat_socket_port`, `chat_socket_chatid`, `max_galaxy`, `max_system`, `max_planets`, `planet_factor`, `max_elements_build`, `max_elements_tech`, `max_elements_ships`, `min_player_planets`, `planets_tech`, `planets_officier`, `planets_per_tech`, `max_fleet_per_build`, `deuterium_cost_galaxy`, `max_dm_missions`, `max_overflow`, `moon_factor`, `moon_chance`, `darkmatter_cost_trader`, `factor_university`, `max_fleets_per_acs`, `debris_moon`, `vmode_min_time`, `gate_wait_time`, `metal_start`, `crystal_start`, `deuterium_start`, `darkmatter_start`, `ttf_file`, `ref_active`, `ref_bonus`, `ref_minpoints`, `ref_max_referals`, `del_oldstuff`, `del_user_manually`, `del_user_automatic`, `del_user_sendmail`, `sendmail_inactive`, `silo_factor`, `timezone`, `dst`, `energySpeed`, `disclamerAddress`, `disclamerPhone`, `disclamerMail`, `disclamerNotice`, `alliance_create_min_points`, `isShortly`, `dateFormat`, `timeFormat`, `site_title`, `meta_descrip`, `meta_title`, `site_favicon`, `site_logo`, `admin_email`, `admin_name`, `tourneyEnd`, `cost_teleport`) VALUES
(1, '1..git', 0, 3, 213000, 25000, 25, 1, 30, 0, 250, 'Play', 'War of Alliance', 0, 'Le jeu est actuellement fermé', 1500, 750, 0, 0, 0, 1, 53, 3, 1, 5000, 5, 'http://2moons.cc', 0, 0, 'fr', 0, 2, 0, 1000000, 25, 0, 0, 0, 0, '', 0, 0, 1, 2, 0, 5, '', '', 0, 1, 'This universe is created for testing already implemented ideas in the new WoA universe. The results of development in this universe will be dropped before the official opening, which will happen in early October. During the CBT, work will also be carried out to add the co-agent. For all the mistakes or suggestions for improving WoA, you can write on the chat. 80% of the game will available in the next houres', 0, '', '', 1, 0, 0, '', 0, '', '', '', '', '/usr/sbin/sendmail', 0, 0, '', '', '0', '', '1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1', '202,401', '30', 0, 1, 1, 1, 1, 1, '2Moons', '2Moons', 0, '', '', 0, 1, 2, 999, 12, 1.0, 3, 1, 10, 9, 11, 5, 0.5, 1000000, 10, 1, 1.0, 1.0, 20, 750, 8, 16, 1, 259200, 3600, 500, 500, 0, 0, 'styles/resource/fonts/DroidSansMono.ttf', 0, 1000, 2000, 5, 3, 7, 30, 21, 0, 1, 'UTC', '2', 1.10, '', '', '', '', 250, 0, 0, 0, '', '', '', '', '', '', '', 1518402275, 1000);

-- --------------------------------------------------------

--
-- Structure de la table `uni1_contracts`
--

CREATE TABLE `uni1_contracts` (
  `contractId` int(11) UNSIGNED NOT NULL,
  `timeAvailable` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `endTarget` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `bonusQuery` varchar(255) DEFAULT NULL,
  `endTime` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `uni1_cronjobs`
--

CREATE TABLE `uni1_cronjobs` (
  `cronjobID` int(11) UNSIGNED NOT NULL,
  `name` varchar(32) NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '1',
  `min` varchar(32) NOT NULL,
  `hours` varchar(32) NOT NULL,
  `dom` varchar(32) NOT NULL,
  `month` varchar(32) NOT NULL,
  `dow` varchar(32) NOT NULL,
  `class` varchar(32) NOT NULL,
  `nextTime` int(11) DEFAULT NULL,
  `lock` varchar(32) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `uni1_cronjobs`
--

INSERT INTO `uni1_cronjobs` (`cronjobID`, `name`, `isActive`, `min`, `hours`, `dom`, `month`, `dow`, `class`, `nextTime`, `lock`) VALUES
(1, 'referral', 1, '0,30', '*', '*', '*', '*', 'ReferralCronjob', 1529766000, NULL),
(2, 'statistic', 1, '0,30', '*', '*', '*', '*', 'StatisticCronjob', 1529766000, 'ad161b0228e0fa1127515c168d9f399e'),
(3, 'daily', 1, '25', '2', '*', '*', '*', 'DailyCronjob', 1529807100, NULL),
(4, 'cleaner', 1, '45', '2', '*', '*', '6', 'CleanerCronjob', 1530326700, NULL),
(5, 'inactive', 1, '30', '1', '*', '*', '0,3,6', 'InactiveMailCronjob', 1529803800, NULL),
(8, 'tracking', 1, '54', '7', '*', '*', '0', 'TrackingCronjob', 1529826840, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `uni1_cronjobs_log`
--

CREATE TABLE `uni1_cronjobs_log` (
  `cronjobId` int(11) UNSIGNED NOT NULL,
  `executionTime` datetime NOT NULL,
  `lockToken` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `uni1_diplo`
--

CREATE TABLE `uni1_diplo` (
  `id` int(11) UNSIGNED NOT NULL,
  `owner_1` int(11) UNSIGNED NOT NULL,
  `owner_2` int(11) UNSIGNED NOT NULL,
  `level` tinyint(1) UNSIGNED NOT NULL,
  `accept` tinyint(1) UNSIGNED NOT NULL,
  `accept_text` varchar(255) NOT NULL,
  `universe` tinyint(3) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `uni1_ennemies`
--

CREATE TABLE `uni1_ennemies` (
  `ennemieId` int(11) UNSIGNED NOT NULL,
  `playerId` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `ennemiePid` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `addTime` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `uni1_fleets`
--

CREATE TABLE `uni1_fleets` (
  `fleet_id` bigint(11) UNSIGNED NOT NULL,
  `fleet_owner` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `fleet_mission` tinyint(3) UNSIGNED NOT NULL DEFAULT '3',
  `fleet_amount` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `fleet_array` text,
  `fleet_universe` tinyint(3) UNSIGNED NOT NULL,
  `fleet_start_time` int(11) NOT NULL DEFAULT '0',
  `fleet_start_id` int(11) UNSIGNED NOT NULL,
  `fleet_start_galaxy` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `fleet_start_system` smallint(5) UNSIGNED NOT NULL DEFAULT '0',
  `fleet_start_planet` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `fleet_start_type` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `fleet_end_time` int(11) NOT NULL DEFAULT '0',
  `fleet_end_stay` int(11) NOT NULL DEFAULT '0',
  `fleet_end_id` int(11) UNSIGNED NOT NULL,
  `fleet_end_galaxy` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `fleet_end_system` smallint(5) UNSIGNED NOT NULL DEFAULT '0',
  `fleet_end_planet` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `fleet_end_type` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `fleet_target_obj` smallint(3) UNSIGNED NOT NULL DEFAULT '0',
  `fleet_resource_metal` double(50,0) UNSIGNED NOT NULL DEFAULT '0',
  `fleet_resource_crystal` double(50,0) UNSIGNED NOT NULL DEFAULT '0',
  `fleet_resource_deuterium` double(50,0) UNSIGNED NOT NULL DEFAULT '0',
  `fleet_resource_darkmatter` double(50,0) UNSIGNED NOT NULL DEFAULT '0',
  `fleet_target_owner` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `fleet_group` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `fleet_mess` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `start_time` int(11) DEFAULT NULL,
  `fleet_busy` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `hasCanceled` tinyint(1) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `uni1_fleet_event`
--

CREATE TABLE `uni1_fleet_event` (
  `fleetID` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `lock` varchar(32) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `uni1_ip_multimod`
--

CREATE TABLE `uni1_ip_multimod` (
  `suspectId` int(11) NOT NULL,
  `userId` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `nickname` varchar(32) NOT NULL DEFAULT '',
  `ipadress` text,
  `opsystem` text CHARACTER SET utf16,
  `isp` text,
  `isValid` text,
  `timestamp` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `uni1_log`
--

CREATE TABLE `uni1_log` (
  `id` int(11) UNSIGNED NOT NULL,
  `mode` tinyint(3) UNSIGNED NOT NULL,
  `admin` int(11) UNSIGNED NOT NULL,
  `target` int(11) NOT NULL,
  `time` int(11) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `universe` tinyint(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `uni1_log_fleets`
--

CREATE TABLE `uni1_log_fleets` (
  `fleet_id` bigint(11) UNSIGNED NOT NULL,
  `fleet_owner` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `fleet_mission` tinyint(3) UNSIGNED NOT NULL DEFAULT '3',
  `fleet_amount` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `fleet_array` text,
  `fleet_universe` tinyint(3) UNSIGNED NOT NULL,
  `fleet_start_time` int(11) NOT NULL DEFAULT '0',
  `fleet_start_id` int(11) UNSIGNED NOT NULL,
  `fleet_start_galaxy` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `fleet_start_system` smallint(5) UNSIGNED NOT NULL DEFAULT '0',
  `fleet_start_planet` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `fleet_start_type` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `fleet_end_time` int(11) NOT NULL DEFAULT '0',
  `fleet_end_stay` int(11) NOT NULL DEFAULT '0',
  `fleet_end_id` int(11) UNSIGNED NOT NULL,
  `fleet_end_galaxy` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `fleet_end_system` smallint(5) UNSIGNED NOT NULL DEFAULT '0',
  `fleet_end_planet` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `fleet_end_type` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `fleet_target_obj` smallint(3) UNSIGNED NOT NULL DEFAULT '0',
  `fleet_resource_metal` double(50,0) UNSIGNED NOT NULL DEFAULT '0',
  `fleet_resource_crystal` double(50,0) UNSIGNED NOT NULL DEFAULT '0',
  `fleet_resource_deuterium` double(50,0) UNSIGNED NOT NULL DEFAULT '0',
  `fleet_resource_darkmatter` double(50,0) UNSIGNED NOT NULL DEFAULT '0',
  `fleet_target_owner` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `fleet_group` varchar(15) NOT NULL DEFAULT '0',
  `fleet_mess` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `start_time` int(11) DEFAULT NULL,
  `fleet_busy` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `fleet_state` tinyint(3) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `uni1_market_resource`
--

CREATE TABLE `uni1_market_resource` (
  `saleId` int(11) UNSIGNED NOT NULL,
  `soldType` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `soldAmount` double(50,0) UNSIGNED NOT NULL DEFAULT '0',
  `buyType` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `buyAmount` double(50,0) UNSIGNED NOT NULL DEFAULT '0',
  `soldBy` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `inputTime` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `boughtBy` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `boughtTime` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `saleClaimed` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `uni1_market_resource`
--

INSERT INTO `uni1_market_resource` (`saleId`, `soldType`, `soldAmount`, `buyType`, `buyAmount`, `soldBy`, `inputTime`, `boughtBy`, `boughtTime`, `saleClaimed`) VALUES
(20, 902, 50000, 901, 100000, 17, 1507405552, 15, 1507440174, 1507474667),
(19, 901, 10000, 902, 5000, 1, 1518124021, 1, 1518351457, 1518351687),
(18, 901, 200000, 902, 100000, 1, 1507397680, 12, 1507397747, 1507397776),
(17, 901, 10000, 902, 10000, 3, 1507395106, 1, 1507397242, 1507399895),
(21, 901, 202000, 902, 100000, 1, 1518349797, 1, 1518351449, 1518351655);

-- --------------------------------------------------------

--
-- Structure de la table `uni1_messages`
--

CREATE TABLE `uni1_messages` (
  `message_id` bigint(20) UNSIGNED NOT NULL,
  `message_owner` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `message_sender` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `message_time` int(11) NOT NULL DEFAULT '0',
  `message_type` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `message_from` varchar(128) DEFAULT NULL,
  `message_subject` varchar(255) DEFAULT NULL,
  `message_text` text,
  `message_unread` tinyint(4) NOT NULL DEFAULT '1',
  `message_universe` tinyint(3) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `uni1_multi`
--

CREATE TABLE `uni1_multi` (
  `multiID` int(11) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `uni1_notes`
--

CREATE TABLE `uni1_notes` (
  `id` int(11) NOT NULL,
  `owner` int(11) UNSIGNED DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  `priority` tinyint(1) UNSIGNED DEFAULT '1',
  `title` varchar(32) DEFAULT NULL,
  `text` text,
  `universe` tinyint(3) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `uni1_planets`
--

CREATE TABLE `uni1_planets` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(20) DEFAULT 'Hauptplanet',
  `id_owner` int(11) UNSIGNED DEFAULT NULL,
  `universe` tinyint(3) UNSIGNED NOT NULL,
  `galaxy` tinyint(3) NOT NULL DEFAULT '0',
  `system` smallint(5) NOT NULL DEFAULT '0',
  `planet` tinyint(3) NOT NULL DEFAULT '0',
  `last_update` int(11) DEFAULT NULL,
  `planet_type` enum('1','3') NOT NULL DEFAULT '1',
  `destruyed` int(11) NOT NULL DEFAULT '0',
  `b_building` int(11) NOT NULL DEFAULT '0',
  `b_building_id` text,
  `b_hangar` int(11) NOT NULL DEFAULT '0',
  `b_hangar_id` text,
  `b_hangar_plus` int(11) NOT NULL DEFAULT '0',
  `image` varchar(32) NOT NULL DEFAULT 'normaltempplanet01',
  `diameter` int(11) UNSIGNED NOT NULL DEFAULT '12800',
  `field_current` smallint(5) UNSIGNED NOT NULL DEFAULT '0',
  `field_max` smallint(5) UNSIGNED NOT NULL DEFAULT '163',
  `temp_min` int(3) NOT NULL DEFAULT '-17',
  `temp_max` int(3) NOT NULL DEFAULT '23',
  `eco_hash` varchar(32) NOT NULL DEFAULT '',
  `metal` double(50,6) UNSIGNED NOT NULL DEFAULT '0.000000',
  `metal_perhour` double(50,6) NOT NULL DEFAULT '0.000000',
  `metal_max` double(50,0) UNSIGNED DEFAULT '100000',
  `crystal` double(50,6) UNSIGNED NOT NULL DEFAULT '0.000000',
  `crystal_perhour` double(50,6) NOT NULL DEFAULT '0.000000',
  `crystal_max` double(50,0) UNSIGNED DEFAULT '100000',
  `deuterium` double(50,6) UNSIGNED NOT NULL DEFAULT '0.000000',
  `deuterium_perhour` double(50,6) NOT NULL DEFAULT '0.000000',
  `deuterium_max` double(50,0) UNSIGNED DEFAULT '100000',
  `energy_used` double(50,0) NOT NULL DEFAULT '0',
  `energy` double(50,0) UNSIGNED NOT NULL DEFAULT '0',
  `metal_mine` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `crystal_mine` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `deuterium_sintetizer` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `solar_plant` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `fusion_plant` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `fund_mine` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `robot_factory` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `nano_factory` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `space_port` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `hangar` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `metal_store` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `crystal_store` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `deuterium_store` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `laboratory` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `terraformer` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `university` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `ally_deposit` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `silo` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `mondbasis` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `phalanx` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `sprungtor` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `small_ship_cargo` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `big_ship_cargo` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `light_hunter` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `heavy_hunter` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `crusher` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `battle_ship` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `colonizer` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `recycler` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `spy_sonde` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `bomber_ship` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `solar_satelit` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `destructor` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `dearth_star` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `battleship` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `lune_noir` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `ev_transporter` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `star_crasher` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `giga_recykler` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `dm_ship` bigint(20) NOT NULL DEFAULT '0',
  `bs_oneil` double(50,0) UNSIGNED NOT NULL DEFAULT '0',
  `flying_death` double(50,0) UNSIGNED NOT NULL DEFAULT '0',
  `m19` double(50,0) UNSIGNED NOT NULL DEFAULT '0',
  `galleon` double(50,0) UNSIGNED NOT NULL DEFAULT '0',
  `destroyer` double(50,0) UNSIGNED NOT NULL DEFAULT '0',
  `frigate` double(50,0) UNSIGNED NOT NULL DEFAULT '0',
  `black_wanderer` double(50,0) UNSIGNED NOT NULL DEFAULT '0',
  `m7` double(50,0) UNSIGNED NOT NULL DEFAULT '0',
  `m32` decimal(50,0) UNSIGNED NOT NULL DEFAULT '0',
  `m20` double(50,0) UNSIGNED NOT NULL DEFAULT '0',
  `m60` double(50,0) UNSIGNED NOT NULL DEFAULT '0',
  `h140` double(50,0) UNSIGNED NOT NULL DEFAULT '0',
  `mamouth` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `orbital_station` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `misil_launcher` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `small_laser` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `big_laser` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `gauss_canyon` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `ionic_canyon` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `buster_canyon` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `small_protection_shield` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `planet_protector` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `big_protection_shield` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `graviton_canyon` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `lepton_gun` double(50,0) UNSIGNED NOT NULL DEFAULT '0',
  `hydrogen_cannon` double(50,0) UNSIGNED NOT NULL DEFAULT '0',
  `proton_gun` double(50,0) UNSIGNED NOT NULL DEFAULT '0',
  `photon_cannon` double(50,0) UNSIGNED NOT NULL DEFAULT '0',
  `particle_emitter` double(50,0) UNSIGNED NOT NULL DEFAULT '0',
  `quantum_cannon` double(50,0) UNSIGNED NOT NULL DEFAULT '0',
  `dora_cannon` double(50,0) UNSIGNED NOT NULL DEFAULT '0',
  `megador_slim` double(50,0) UNSIGNED NOT NULL DEFAULT '0',
  `iron_megador` double(50,0) UNSIGNED NOT NULL DEFAULT '0',
  `grand_megador` double(50,0) UNSIGNED NOT NULL DEFAULT '0',
  `canyon` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `gatlin_canyon` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `dx_bob` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `sentinel` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `armageddon` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `promety_complex` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `interceptor_misil` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `interplanetary_misil` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `metal_mine_porcent` enum('0','1','2','3','4','5','6','7','8','9','10') NOT NULL DEFAULT '10',
  `crystal_mine_porcent` enum('0','1','2','3','4','5','6','7','8','9','10') NOT NULL DEFAULT '10',
  `deuterium_sintetizer_porcent` enum('0','1','2','3','4','5','6','7','8','9','10') NOT NULL DEFAULT '10',
  `solar_plant_porcent` enum('0','1','2','3','4','5','6','7','8','9','10') NOT NULL DEFAULT '10',
  `fusion_plant_porcent` enum('0','1','2','3','4','5','6','7','8','9','10') NOT NULL DEFAULT '10',
  `solar_satelit_porcent` enum('0','1','2','3','4','5','6','7','8','9','10') NOT NULL DEFAULT '10',
  `laboratory_porcent` enum('0','1','2','3','4','5','6','7','8','9','10') NOT NULL DEFAULT '10',
  `fund_mine_porcent` enum('0','1','2','3','4','5','6','7','8','9','10') NOT NULL DEFAULT '10',
  `university_porcent` enum('0','1','2','3','4','5','6','7','8','9','10') NOT NULL DEFAULT '10',
  `last_jump_time` int(11) NOT NULL DEFAULT '0',
  `der_metal` double(50,0) UNSIGNED NOT NULL DEFAULT '0',
  `der_crystal` double(50,0) UNSIGNED NOT NULL DEFAULT '0',
  `id_luna` int(11) NOT NULL DEFAULT '0',
  `last_relocate` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `constructionBonus` double(50,2) NOT NULL DEFAULT '0.00',
  `deuteriumBonus` double(50,2) NOT NULL DEFAULT '0.00',
  `solarBonus` double(50,2) NOT NULL DEFAULT '0.00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `uni1_premium`
--

CREATE TABLE `uni1_premium` (
  `premiumId` int(11) UNSIGNED NOT NULL,
  `priceOne` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `priceTree` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `priceSeven` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `priceNine` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `priceFourteen` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `priceTwentySev` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `resValue` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `type` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `class` varchar(32) DEFAULT NULL,
  `orderCol` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `uni1_premium`
--

INSERT INTO `uni1_premium` (`premiumId`, `priceOne`, `priceTree`, `priceSeven`, `priceNine`, `priceFourteen`, `priceTwentySev`, `resValue`, `type`, `class`, `orderCol`) VALUES
(1, 25, 50, 0, 125, 0, 250, 0, 1, 'pvp1', 1),
(2, 50, 100, 0, 250, 0, 500, 0, 1, 'pvp2', 2),
(3, 75, 150, 0, 375, 0, 750, 0, 1, 'pvp3', 3),
(4, 100, 200, 0, 500, 0, 1000, 0, 1, 'pvp4', 4),
(5, 200, 400, 0, 1000, 0, 2000, 0, 1, 'pvp5', 5),
(6, 25, 50, 0, 125, 0, 250, 0, 2, 'pve1', 1),
(7, 50, 100, 0, 250, 0, 500, 0, 2, 'pve2', 2),
(8, 75, 150, 0, 375, 0, 750, 0, 2, 'pve3', 3),
(9, 100, 200, 0, 500, 0, 1000, 0, 2, 'pve4', 4),
(10, 200, 400, 0, 1000, 0, 2000, 0, 2, 'pve5', 5),
(11, 1, 0, 0, 0, 0, 0, 0, 3, 'dm1', 1),
(12, 10, 0, 0, 0, 0, 0, 0, 3, 'dm2', 2),
(13, 25, 0, 0, 0, 0, 0, 0, 3, 'dm3', 3),
(14, 100, 0, 0, 0, 0, 0, 0, 3, 'dm4', 4),
(15, 500, 0, 0, 0, 0, 0, 0, 3, 'dm5', 5),
(16, 0, 0, 350, 0, 900, 0, 0, 4, 'extra4', 4),
(17, 0, 0, 200, 0, 500, 0, 0, 4, 'extra5', 5),
(18, 0, 0, 200, 0, 500, 0, 0, 4, 'extra6', 6),
(19, 0, 0, 0, 0, 0, 0, 10000000, 5, 'res901', 901),
(20, 0, 0, 0, 0, 0, 0, 5000000, 5, 'res902', 902),
(21, 0, 0, 0, 0, 0, 0, 2500000, 5, 'res903', 903);

-- --------------------------------------------------------

--
-- Structure de la table `uni1_purchase_logs`
--

CREATE TABLE `uni1_purchase_logs` (
  `payID` int(11) NOT NULL,
  `userID` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `time` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `pinCode` text,
  `pinPrice` float(15,2) UNSIGNED NOT NULL DEFAULT '0.00',
  `pinCredits` float(15,2) UNSIGNED NOT NULL DEFAULT '0.00',
  `pinType` varchar(255) DEFAULT NULL,
  `pinAprouved` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `paystatus` varchar(255) DEFAULT NULL,
  `payupdate` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `uni1_raports`
--

CREATE TABLE `uni1_raports` (
  `rid` varchar(32) NOT NULL,
  `raport` text NOT NULL,
  `time` int(11) NOT NULL,
  `attacker` varchar(255) NOT NULL DEFAULT '',
  `defender` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `uni1_records`
--

CREATE TABLE `uni1_records` (
  `userID` int(10) UNSIGNED NOT NULL,
  `elementID` smallint(5) UNSIGNED NOT NULL,
  `level` bigint(20) UNSIGNED NOT NULL
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
-- Structure de la table `uni1_shortcuts`
--

CREATE TABLE `uni1_shortcuts` (
  `shortcutID` int(10) UNSIGNED NOT NULL,
  `ownerID` int(10) UNSIGNED NOT NULL,
  `name` varchar(32) NOT NULL,
  `galaxy` tinyint(3) UNSIGNED NOT NULL,
  `system` smallint(5) UNSIGNED NOT NULL,
  `planet` tinyint(3) UNSIGNED NOT NULL,
  `type` tinyint(1) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `uni1_specialoffers`
--

CREATE TABLE `uni1_specialoffers` (
  `offerId` int(11) UNSIGNED NOT NULL,
  `offerEnd` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `offerPrice` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `offerText` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `uni1_statpoints`
--

CREATE TABLE `uni1_statpoints` (
  `id_owner` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `id_ally` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `stat_type` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `universe` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `tech_rank` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `tech_old_rank` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `tech_points` double(50,0) UNSIGNED NOT NULL DEFAULT '0',
  `tech_count` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `build_rank` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `build_old_rank` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `build_points` double(50,0) UNSIGNED NOT NULL DEFAULT '0',
  `build_count` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `defs_rank` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `defs_old_rank` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `defs_points` double(50,0) UNSIGNED NOT NULL DEFAULT '0',
  `defs_count` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `fleet_rank` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `fleet_old_rank` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `fleet_points` double(50,0) UNSIGNED NOT NULL DEFAULT '0',
  `fleet_count` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `total_rank` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `total_old_rank` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `total_points` double(50,0) UNSIGNED NOT NULL DEFAULT '0',
  `total_count` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `achiev_rank` int(1) UNSIGNED NOT NULL DEFAULT '0',
  `achiev_old_rank` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `achiev_points` double(50,0) UNSIGNED NOT NULL DEFAULT '0',
  `achiev_count` bigint(11) UNSIGNED NOT NULL DEFAULT '0',
  `armement_rank` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `armement_old_rank` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `armement_points` double(50,0) UNSIGNED NOT NULL DEFAULT '0',
  `armement_count` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `warpoint_rank` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `warpoint_old_rank` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `warpoint_points` double(50,0) UNSIGNED NOT NULL DEFAULT '0',
  `warpoint_count` bigint(20) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `uni1_statpoints`
--

INSERT INTO `uni1_statpoints` (`id_owner`, `id_ally`, `stat_type`, `universe`, `tech_rank`, `tech_old_rank`, `tech_points`, `tech_count`, `build_rank`, `build_old_rank`, `build_points`, `build_count`, `defs_rank`, `defs_old_rank`, `defs_points`, `defs_count`, `fleet_rank`, `fleet_old_rank`, `fleet_points`, `fleet_count`, `total_rank`, `total_old_rank`, `total_points`, `total_count`, `achiev_rank`, `achiev_old_rank`, `achiev_points`, `achiev_count`, `armement_rank`, `armement_old_rank`, `armement_points`, `armement_count`, `warpoint_rank`, `warpoint_old_rank`, `warpoint_points`, `warpoint_count`) VALUES
(1, 8, 1, 1, 1, 1, 0, 110, 1, 1, 11764, 335, 2, 2, 6, 1128, 1, 1, 630211, 15027533, 1, 1, 641981, 15029106, 1, 0, 100, 0, 1, 0, 631393, 15028695, 1, 0, 27, 0),
(3, 4, 1, 1, 2, 2, 0, 28, 2, 2, 62, 111, 1, 1, 1089, 180066, 2, 2, 0, 0, 2, 2, 1152, 180205, 2, 0, 0, 0, 2, 0, 1096, 180077, 2, 0, 10, 0),
(4, 0, 2, 1, 1, 0, 0, 28, 2, 2, 62, 111, 1, 1, 1089, 180066, 2, 2, 0, 0, 2, 2, 1152, 180205, 2, 0, 0, 0, 2, 0, 1096, 180077, 2, 0, 10, 0),
(8, 0, 2, 1, 2, 0, 0, 110, 1, 1, 11764, 335, 2, 2, 6, 1128, 1, 1, 630211, 15027533, 1, 1, 641981, 15029106, 1, 0, 100, 0, 1, 0, 631393, 15028695, 1, 0, 27, 0),
(2, 0, 1, 1, 3, 0, 0, 0, 3, 0, 0, 0, 3, 0, 0, 0, 3, 0, 0, 0, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `uni1_storage_stats`
--

CREATE TABLE `uni1_storage_stats` (
  `storageId` int(11) UNSIGNED NOT NULL,
  `depositPlayer` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `depositMetal` double(50,0) UNSIGNED NOT NULL DEFAULT '0',
  `depositCrystal` double(50,0) UNSIGNED NOT NULL DEFAULT '0',
  `depositDeuteirum` double(50,0) UNSIGNED NOT NULL DEFAULT '0',
  `depositResearch` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `depositDarkmatter` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `depositStellar` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `depositTime` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `depositAlly` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `uni1_system`
--

CREATE TABLE `uni1_system` (
  `dbVersion` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `uni1_system`
--

INSERT INTO `uni1_system` (`dbVersion`) VALUES
(2);

-- --------------------------------------------------------

--
-- Structure de la table `uni1_ticket`
--

CREATE TABLE `uni1_ticket` (
  `ticketID` int(10) UNSIGNED NOT NULL,
  `universe` tinyint(3) UNSIGNED NOT NULL,
  `ownerID` int(10) UNSIGNED NOT NULL,
  `categoryID` tinyint(1) UNSIGNED NOT NULL,
  `subject` varchar(255) NOT NULL,
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `time` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `uni1_ticket_answer`
--

CREATE TABLE `uni1_ticket_answer` (
  `answerID` int(10) UNSIGNED NOT NULL,
  `ownerID` int(10) UNSIGNED NOT NULL,
  `ownerName` varchar(32) NOT NULL,
  `ticketID` int(10) UNSIGNED NOT NULL,
  `time` int(10) UNSIGNED NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` mediumtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `uni1_ticket_category`
--

CREATE TABLE `uni1_ticket_category` (
  `categoryID` int(11) NOT NULL,
  `name` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `uni1_ticket_category`
--

INSERT INTO `uni1_ticket_category` (`categoryID`, `name`) VALUES
(1, 'Support');

-- --------------------------------------------------------

--
-- Structure de la table `uni1_topkb`
--

CREATE TABLE `uni1_topkb` (
  `rid` varchar(32) NOT NULL,
  `units` double(50,0) UNSIGNED NOT NULL,
  `result` varchar(1) NOT NULL,
  `time` int(11) NOT NULL,
  `universe` tinyint(3) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `uni1_tourney`
--

CREATE TABLE `uni1_tourney` (
  `tourneyId` int(11) UNSIGNED NOT NULL,
  `tourneyName` varchar(50) NOT NULL,
  `priceOne` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `priceTwo` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `priceThree` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `typeReward` tinyint(3) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `uni1_tourney`
--

INSERT INTO `uni1_tourney` (`tourneyId`, `tourneyName`, `priceOne`, `priceTwo`, `priceThree`, `typeReward`) VALUES
(1, 'Alpha', 600, 360, 240, 1),
(2, 'Beta', 11250, 6750, 4500, 2),
(3, 'Gamma', 3750, 2250, 1500, 2),
(4, 'Detla', 1500, 900, 600, 2),
(5, 'Epsilon', 750, 450, 300, 2);

-- --------------------------------------------------------

--
-- Structure de la table `uni1_users`
--

CREATE TABLE `uni1_users` (
  `id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `username` varchar(32) NOT NULL DEFAULT '',
  `password` varchar(60) NOT NULL DEFAULT '',
  `email` varchar(64) NOT NULL DEFAULT '',
  `email_2` varchar(64) NOT NULL DEFAULT '',
  `securityCode` varchar(255) DEFAULT NULL,
  `lang` varchar(2) NOT NULL DEFAULT 'de',
  `authattack` tinyint(1) NOT NULL DEFAULT '0',
  `authlevel` tinyint(1) NOT NULL DEFAULT '0',
  `chat_oper` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `gm` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `rights` text,
  `id_planet` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `universe` tinyint(3) UNSIGNED NOT NULL,
  `galaxy` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `system` smallint(5) UNSIGNED NOT NULL DEFAULT '0',
  `planet` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `darkmatter` double(50,0) NOT NULL DEFAULT '0',
  `antimatter` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `research` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `research_max` double(50,0) UNSIGNED NOT NULL DEFAULT '100000',
  `research_perhour` bigint(20) NOT NULL DEFAULT '0',
  `achievements` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `achievements_used` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `user_lastip` varchar(40) NOT NULL DEFAULT '',
  `ip_at_reg` varchar(40) NOT NULL DEFAULT '',
  `register_time` int(11) NOT NULL DEFAULT '0',
  `onlinetime` int(11) NOT NULL DEFAULT '0',
  `dpath` varchar(20) NOT NULL DEFAULT 'gow',
  `timezone` varchar(32) NOT NULL DEFAULT 'Europe/London',
  `planet_sort` tinyint(1) NOT NULL DEFAULT '0',
  `planet_sort_order` tinyint(1) NOT NULL DEFAULT '0',
  `spio_anz` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `settings_fleetactions` tinyint(2) UNSIGNED NOT NULL DEFAULT '3',
  `settings_esp` tinyint(1) NOT NULL DEFAULT '1',
  `settings_wri` tinyint(1) NOT NULL DEFAULT '1',
  `settings_bud` tinyint(1) NOT NULL DEFAULT '1',
  `settings_mis` tinyint(1) NOT NULL DEFAULT '1',
  `settings_blockPM` tinyint(1) NOT NULL DEFAULT '0',
  `urlaubs_modus` tinyint(1) NOT NULL DEFAULT '0',
  `urlaubs_until` int(11) NOT NULL DEFAULT '0',
  `db_deaktjava` int(11) NOT NULL DEFAULT '0',
  `chat_silence` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `isChat` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `b_tech_planet` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `b_tech` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `b_tech_id` smallint(2) UNSIGNED NOT NULL DEFAULT '0',
  `b_tech_queue` text,
  `microprocessors_tech` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `mining_tech` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `colonisation_tech` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `alliance_link_tech` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `saveengine_tech` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `accurate_tech` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `engines_tech` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `spy_tech` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `computer_tech` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `military_tech` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `defence_tech` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `shield_tech` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `energy_tech` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `hyperspace_tech` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `combustion_tech` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `ionic_motor_tech` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `impulse_motor_tech` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `hyperspace_motor_tech` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `laser_tech` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `ionic_tech` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `buster_tech` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `intergalactic_tech` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `expedition_tech` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `metal_proc_tech` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `crystal_proc_tech` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `deuterium_proc_tech` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `light_armor_tech` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `medium_armor_tech` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `heavy_armor_tech` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `active_armor_tech` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `light_shields_tech` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `medium_shields_tech` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `heavy_shields_tech` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `restaure_shields_tech` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `star_search_tech` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `dm_search_tech` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `search_fleet_tech` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `astrophysics_tech` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `agression_barbar_tech` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `agression_pirat_tech` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `agression_ancient_tech` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `graviton_tech` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `ally_development_tech` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `ally_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `ally_register_time` int(11) NOT NULL DEFAULT '0',
  `ally_rank_id` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `rpg_geologue` tinyint(2) UNSIGNED NOT NULL DEFAULT '0',
  `rpg_amiral` tinyint(2) NOT NULL DEFAULT '0',
  `rpg_ingenieur` tinyint(2) NOT NULL DEFAULT '0',
  `rpg_technocrate` tinyint(2) NOT NULL DEFAULT '0',
  `rpg_espion` tinyint(2) NOT NULL DEFAULT '0',
  `rpg_constructeur` tinyint(2) NOT NULL DEFAULT '0',
  `rpg_scientifique` tinyint(2) NOT NULL DEFAULT '0',
  `rpg_commandant` tinyint(2) NOT NULL DEFAULT '0',
  `rpg_stockeur` tinyint(2) NOT NULL DEFAULT '0',
  `rpg_defenseur` tinyint(2) NOT NULL DEFAULT '0',
  `rpg_destructeur` tinyint(2) NOT NULL DEFAULT '0',
  `rpg_general` tinyint(2) NOT NULL DEFAULT '0',
  `rpg_bunker` tinyint(2) NOT NULL DEFAULT '0',
  `rpg_raideur` tinyint(2) NOT NULL DEFAULT '0',
  `rpg_empereur` tinyint(22) NOT NULL DEFAULT '0',
  `rpg_geologue_time` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `rpg_amiral_time` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `rpg_ingenieur_time` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `rpg_technocrate_time` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `rpg_espion_time` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `rpg_constructeur_time` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `rpg_scientifique_time` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `rpg_commandant_time` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `rpg_stockeur_time` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `rpg_defenseur_time` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `rpg_destructeur_time` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `rpg_general_time` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `rpg_bunker_time` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `rpg_raideur_time` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `rpg_empereur_time` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `bana` tinyint(1) NOT NULL DEFAULT '0',
  `banaday` int(11) NOT NULL DEFAULT '0',
  `hof` tinyint(1) NOT NULL DEFAULT '1',
  `spyMessagesMode` tinyint(1) NOT NULL DEFAULT '1',
  `wons` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `loos` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `draws` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `kbmetal` double(50,0) UNSIGNED NOT NULL DEFAULT '0',
  `kbcrystal` double(50,0) UNSIGNED NOT NULL DEFAULT '0',
  `lostunits` double(50,0) UNSIGNED NOT NULL DEFAULT '0',
  `desunits` double(50,0) UNSIGNED NOT NULL DEFAULT '0',
  `uctime` int(11) NOT NULL DEFAULT '0',
  `setmail` int(11) NOT NULL DEFAULT '0',
  `dm_attack` int(11) NOT NULL DEFAULT '0',
  `dm_defensive` int(11) NOT NULL DEFAULT '0',
  `dm_buildtime` int(11) NOT NULL DEFAULT '0',
  `dm_researchtime` int(11) NOT NULL DEFAULT '0',
  `dm_resource` int(11) NOT NULL DEFAULT '0',
  `dm_energie` int(11) NOT NULL DEFAULT '0',
  `dm_fleettime` int(11) NOT NULL DEFAULT '0',
  `ref_id` int(11) NOT NULL DEFAULT '0',
  `ref_bonus` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `inactive_mail` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `commanderLevel` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `commanderExpe` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `CommanderExpeMax` bigint(20) UNSIGNED NOT NULL DEFAULT '100',
  `user_color` varchar(55) NOT NULL DEFAULT '#e7b10e',
  `chat_room` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `arsenalFente` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `entryReward` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `trainingStep` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `uni1_users_settings`
--

CREATE TABLE `uni1_users_settings` (
  `id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `displayname` varchar(255) NOT NULL,
  `secretQuestion` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `secretAnswer` varchar(128) NOT NULL,
  `birthday` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `securityEncodage` varchar(255) DEFAULT NULL,
  `ach_builder` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `ach_defense` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `ach_fleeter` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `ach_scientist` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `ach_expe_res` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `ach_expe_res_count` double(50,0) UNSIGNED NOT NULL DEFAULT '0',
  `ach_expe_fleet` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `ach_expe_fleet_count` double(50,0) UNSIGNED NOT NULL DEFAULT '0',
  `ach_conquer_ruins` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `ach_conquer_ruins_count` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `ach_rise_ruins` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `ach_rise_ruins_count` double(50,0) UNSIGNED NOT NULL DEFAULT '0',
  `ach_market` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `ach_market_count` double(50,0) UNSIGNED NOT NULL DEFAULT '0',
  `ach_mercenary` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `ach_mercenary_count` double(50,0) UNSIGNED NOT NULL DEFAULT '0',
  `ach_destroyer` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `premiumOne` varchar(55) DEFAULT NULL,
  `premiumTwo` varchar(55) DEFAULT NULL,
  `premiumTree` varchar(55) DEFAULT NULL,
  `p_name` varchar(200) DEFAULT NULL,
  `p_country` varchar(200) DEFAULT NULL,
  `p_city` varchar(200) DEFAULT NULL,
  `p_age` tinyint(3) NOT NULL DEFAULT '0',
  `settingAlarm` tinyint(3) UNSIGNED NOT NULL DEFAULT '10',
  `pointofwar` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `stellarore` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `nextStorage` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `specialOffer` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `specialOfferIsSeen` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `autoHideFleet` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `gametoorTime` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `d1` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `d2` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `d3` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `d4` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `d5` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `d6` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `d7` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `d999` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `expe_barbar` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `expe_pirat` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `expe_ancie` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `expe_ruin` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `hostileLost` double(50,0) UNSIGNED NOT NULL DEFAULT '0',
  `hostileGain` double(50,0) UNSIGNED NOT NULL DEFAULT '0',
  `expeSend` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `expeResFound` double(50,0) UNSIGNED NOT NULL DEFAULT '0',
  `expeDmFound` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `expeFleetFound` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `expeStelarFound` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `uni1_users_to_acs`
--

CREATE TABLE `uni1_users_to_acs` (
  `userID` int(10) UNSIGNED NOT NULL,
  `acsID` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `uni1_users_to_extauth`
--

CREATE TABLE `uni1_users_to_extauth` (
  `id` int(11) NOT NULL,
  `account` varchar(64) NOT NULL,
  `mode` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `uni1_users_to_topkb`
--

CREATE TABLE `uni1_users_to_topkb` (
  `rid` varchar(32) NOT NULL,
  `uid` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `role` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `uni1_users_valid`
--

CREATE TABLE `uni1_users_valid` (
  `validationID` int(11) UNSIGNED NOT NULL DEFAULT '0',
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
  `externalAuthMethod` varchar(32) DEFAULT NULL,
  `securityEncodage` varchar(255) NOT NULL,
  `securityCode` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `uni1_vars`
--

CREATE TABLE `uni1_vars` (
  `elementID` smallint(5) UNSIGNED NOT NULL,
  `name` varchar(32) NOT NULL,
  `class` int(11) NOT NULL,
  `onPlanetType` set('1','3') NOT NULL,
  `onePerPlanet` tinyint(4) NOT NULL,
  `factor` float(4,2) NOT NULL,
  `maxLevel` int(11) DEFAULT NULL,
  `cost901` double(50,0) UNSIGNED NOT NULL DEFAULT '0',
  `cost902` double(50,0) UNSIGNED NOT NULL DEFAULT '0',
  `cost903` double(50,0) UNSIGNED NOT NULL DEFAULT '0',
  `cost911` double(50,0) UNSIGNED NOT NULL DEFAULT '0',
  `cost921` double(50,0) UNSIGNED NOT NULL DEFAULT '0',
  `cost941` double(50,0) UNSIGNED NOT NULL DEFAULT '0',
  `cost800` double(50,0) UNSIGNED NOT NULL DEFAULT '0',
  `consumption1` int(11) UNSIGNED DEFAULT NULL,
  `consumption2` int(11) UNSIGNED DEFAULT NULL,
  `speedTech` int(11) UNSIGNED DEFAULT NULL,
  `speed1` int(11) UNSIGNED DEFAULT NULL,
  `speed2` int(11) UNSIGNED DEFAULT NULL,
  `speed2Tech` int(10) UNSIGNED DEFAULT NULL,
  `speed2onLevel` int(10) UNSIGNED DEFAULT NULL,
  `speed3Tech` int(10) UNSIGNED DEFAULT NULL,
  `speed3onLevel` int(10) UNSIGNED DEFAULT NULL,
  `capacity` int(11) UNSIGNED DEFAULT NULL,
  `attack` int(10) UNSIGNED DEFAULT NULL,
  `defend` int(10) UNSIGNED DEFAULT NULL,
  `timeBonus` int(11) UNSIGNED DEFAULT NULL,
  `bonusAttack` float(4,2) NOT NULL DEFAULT '0.00',
  `bonusDefensive` float(4,2) NOT NULL DEFAULT '0.00',
  `bonusShield` float(4,2) NOT NULL DEFAULT '0.00',
  `bonusBuildTime` float(4,2) NOT NULL DEFAULT '0.00',
  `bonusResearchTime` float(4,2) NOT NULL DEFAULT '0.00',
  `bonusShipTime` float(4,2) NOT NULL DEFAULT '0.00',
  `bonusDefensiveTime` float(4,2) NOT NULL DEFAULT '0.00',
  `bonusResource` float(4,2) NOT NULL DEFAULT '0.00',
  `bonusEnergy` float(4,2) NOT NULL DEFAULT '0.00',
  `bonusResourceStorage` float(4,2) NOT NULL DEFAULT '0.00',
  `bonusShipStorage` float(4,2) NOT NULL DEFAULT '0.00',
  `bonusFlyTime` float(4,2) NOT NULL DEFAULT '0.00',
  `bonusFleetSlots` float(4,2) NOT NULL DEFAULT '0.00',
  `bonusPlanets` float(4,2) NOT NULL DEFAULT '0.00',
  `bonusSpyPower` float(4,2) NOT NULL DEFAULT '0.00',
  `bonusExpedition` float(4,2) NOT NULL DEFAULT '0.00',
  `bonusGateCoolTime` float(4,2) NOT NULL DEFAULT '0.00',
  `bonusMoreFound` float(4,2) NOT NULL DEFAULT '0.00',
  `bonusAttackUnit` smallint(1) NOT NULL DEFAULT '0',
  `bonusDefensiveUnit` smallint(1) NOT NULL DEFAULT '0',
  `bonusShieldUnit` smallint(1) NOT NULL DEFAULT '0',
  `bonusBuildTimeUnit` smallint(1) NOT NULL DEFAULT '0',
  `bonusResearchTimeUnit` smallint(1) NOT NULL DEFAULT '0',
  `bonusShipTimeUnit` smallint(1) NOT NULL DEFAULT '0',
  `bonusDefensiveTimeUnit` smallint(1) NOT NULL DEFAULT '0',
  `bonusResourceUnit` smallint(1) NOT NULL DEFAULT '0',
  `bonusEnergyUnit` smallint(1) NOT NULL DEFAULT '0',
  `bonusResourceStorageUnit` smallint(1) NOT NULL DEFAULT '0',
  `bonusShipStorageUnit` smallint(1) NOT NULL DEFAULT '0',
  `bonusFlyTimeUnit` smallint(1) NOT NULL DEFAULT '0',
  `bonusFleetSlotsUnit` smallint(1) NOT NULL DEFAULT '0',
  `bonusPlanetsUnit` smallint(1) NOT NULL DEFAULT '0',
  `bonusSpyPowerUnit` smallint(1) NOT NULL DEFAULT '0',
  `bonusExpeditionUnit` smallint(1) NOT NULL DEFAULT '0',
  `bonusGateCoolTimeUnit` smallint(1) NOT NULL DEFAULT '0',
  `bonusMoreFoundUnit` smallint(1) NOT NULL DEFAULT '0',
  `bonusMoonCreat` float(4,2) NOT NULL DEFAULT '0.00',
  `bonusAccuracyShot` float(4,2) NOT NULL DEFAULT '0.00',
  `bonusArmor` float(4,2) NOT NULL DEFAULT '0.00',
  `bonusArmorActive` float(4,2) NOT NULL DEFAULT '0.00',
  `bonusShieldReg` float(4,2) NOT NULL DEFAULT '0.00',
  `bonusResource941` float(4,2) NOT NULL DEFAULT '0.00',
  `bonusSpeedFleet` float(4,2) NOT NULL DEFAULT '0.00',
  `bonusMotorEconomy` float(4,2) NOT NULL DEFAULT '0.00',
  `bonusEspionage` float(4,2) NOT NULL DEFAULT '0.00',
  `speedFleetFactor` float(4,2) DEFAULT NULL,
  `production901` varchar(255) DEFAULT NULL,
  `production902` varchar(255) DEFAULT NULL,
  `production903` varchar(255) DEFAULT NULL,
  `production911` varchar(255) DEFAULT NULL,
  `production921` varchar(255) DEFAULT NULL,
  `production941` varchar(255) DEFAULT NULL,
  `storage901` varchar(255) DEFAULT NULL,
  `storage902` varchar(255) DEFAULT NULL,
  `storage903` varchar(255) DEFAULT NULL,
  `storage941` varchar(255) DEFAULT NULL,
  `arbrePosition` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `arbrePositionSec` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `bonus800` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `bonusExpe` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `bonus921` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `bonusText` float(5,2) UNSIGNED NOT NULL DEFAULT '0.00',
  `bonusText2` float UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `uni1_vars`
--

INSERT INTO `uni1_vars` (`elementID`, `name`, `class`, `onPlanetType`, `onePerPlanet`, `factor`, `maxLevel`, `cost901`, `cost902`, `cost903`, `cost911`, `cost921`, `cost941`, `cost800`, `consumption1`, `consumption2`, `speedTech`, `speed1`, `speed2`, `speed2Tech`, `speed2onLevel`, `speed3Tech`, `speed3onLevel`, `capacity`, `attack`, `defend`, `timeBonus`, `bonusAttack`, `bonusDefensive`, `bonusShield`, `bonusBuildTime`, `bonusResearchTime`, `bonusShipTime`, `bonusDefensiveTime`, `bonusResource`, `bonusEnergy`, `bonusResourceStorage`, `bonusShipStorage`, `bonusFlyTime`, `bonusFleetSlots`, `bonusPlanets`, `bonusSpyPower`, `bonusExpedition`, `bonusGateCoolTime`, `bonusMoreFound`, `bonusAttackUnit`, `bonusDefensiveUnit`, `bonusShieldUnit`, `bonusBuildTimeUnit`, `bonusResearchTimeUnit`, `bonusShipTimeUnit`, `bonusDefensiveTimeUnit`, `bonusResourceUnit`, `bonusEnergyUnit`, `bonusResourceStorageUnit`, `bonusShipStorageUnit`, `bonusFlyTimeUnit`, `bonusFleetSlotsUnit`, `bonusPlanetsUnit`, `bonusSpyPowerUnit`, `bonusExpeditionUnit`, `bonusGateCoolTimeUnit`, `bonusMoreFoundUnit`, `bonusMoonCreat`, `bonusAccuracyShot`, `bonusArmor`, `bonusArmorActive`, `bonusShieldReg`, `bonusResource941`, `bonusSpeedFleet`, `bonusMotorEconomy`, `bonusEspionage`, `speedFleetFactor`, `production901`, `production902`, `production903`, `production911`, `production921`, `production941`, `storage901`, `storage902`, `storage903`, `storage941`, `arbrePosition`, `arbrePositionSec`, `bonus800`, `bonusExpe`, `bonus921`, `bonusText`, `bonusText2`) VALUES
(1, 'metal_mine', 0, '1', 0, 1.50, 255, 40, 10, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, '(30 * $BuildLevel * pow((1.1), $BuildLevel)) * (0.1 * $BuildLevelFactor)', NULL, NULL, '-(10 * $BuildLevel * pow((1.1), $BuildLevel)) * (0.1 * $BuildLevelFactor)', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(2, 'crystal_mine', 0, '1', 0, 1.50, 255, 32, 16, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, '(20 * $BuildLevel * pow((1.1), $BuildLevel)) * (0.1 * $BuildLevelFactor)', NULL, '-(10 * $BuildLevel * pow((1.1), $BuildLevel)) * (0.1 * $BuildLevelFactor);', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(3, 'deuterium_sintetizer', 0, '1', 0, 1.50, 255, 150, 50, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, '(10 * $BuildLevel * pow((1.1), $BuildLevel) * (-0.002 * $BuildTemp + 1.28) * (0.1 * $BuildLevelFactor))', '- (30 * $BuildLevel * pow((1.1), $BuildLevel)) * (0.1 * $BuildLevelFactor)', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(4, 'solar_plant', 0, '1', 0, 1.50, 255, 50, 20, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, '(20 * $BuildLevel * pow((1.1), $BuildLevel)) * (0.1 * $BuildLevelFactor)', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(6, 'university', 0, '3', 0, 2.00, 255, 50000000, 25000000, 12500000, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, '-(50 * $BuildLevel * pow((1.1), $BuildLevel)) * (0.1 * $BuildLevelFactor);', NULL, '5*$BuildLevel * (0.1 * $BuildLevelFactor)', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(12, 'fusion_plant', 0, '1', 0, 2.00, 255, 450, 180, 90, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, '- (10 * $BuildLevel * pow(1.1,$BuildLevel) * (0.1 * $BuildLevelFactor))', '(30 * $BuildLevel * pow((1.05 + $BuildEnergy * 0.01), $BuildLevel)) * (0.1 * $BuildLevelFactor)', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(14, 'robot_factory', 0, '1,3', 0, 2.00, 255, 200, 60, 100, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(15, 'nano_factory', 0, '1', 0, 2.00, 255, 500000, 250000, 50000, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(21, 'hangar', 0, '1,3', 0, 2.00, 255, 200, 100, 50, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(22, 'metal_store', 0, '1,3', 0, 2.00, 255, 1000, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'floor(2.5 * pow(1.8331954764, $BuildLevel)) * 5000', NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(23, 'crystal_store', 0, '1,3', 0, 2.00, 255, 1000, 500, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'floor(2.5 * pow(1.8331954764, $BuildLevel)) * 5000', NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(24, 'deuterium_store', 0, '1,3', 0, 2.00, 255, 1000, 1000, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'floor(2.5 * pow(1.8331954764, $BuildLevel)) * 5000', NULL, 0, 0, 0, 0, 0, 0.00, 0),
(31, 'laboratory', 0, '1', 0, 2.00, 255, 100, 200, 100, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, '-(10 * $BuildLevel * pow((1.1), $BuildLevel)) * (0.1 * $BuildLevelFactor);', NULL, '$BuildLevel * (0.1 * $BuildLevelFactor)', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(33, 'terraformer', 0, '1', 0, 2.00, 255, 0, 25000, 50000, 500, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(34, 'ally_deposit', 0, '1', 0, 2.00, 255, 10000, 20000, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(41, 'mondbasis', 0, '3', 0, 2.00, 255, 10000, 20000, 10000, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(42, 'phalanx', 0, '3', 0, 2.00, 255, 10000, 20000, 10000, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(43, 'sprungtor', 0, '3', 0, 2.00, 255, 1000000, 2000000, 1000000, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(44, 'silo', 0, '1', 0, 2.00, 255, 10000, 10000, 500, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(106, 'spy_tech', 100, '1,3', 0, 2.00, 30, 0, 0, 0, 0, 0, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12, 1, 0, 0, 0, 1.00, 0),
(108, 'computer_tech', 100, '1,3', 0, 2.00, 255, 0, 100, 100, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(109, 'military_tech', 100, '1,3', 0, 2.00, 35, 0, 0, 0, 0, 0, 2, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17, 2, 0, 0, 0, 3.00, 0),
(110, 'defence_tech', 100, '1,3', 0, 2.00, 35, 0, 0, 0, 0, 0, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 2, 0, 0, 0, 3.00, 0),
(111, 'shield_tech', 100, '1,3', 0, 2.00, 35, 0, 0, 0, 0, 0, 3, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 13, 2, 0, 0, 0, 3.00, 0),
(113, 'energy_tech', 100, '1,3', 0, 2.00, 20, 0, 0, 0, 0, 0, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, 1, 0, 0, 0, 5.00, 0),
(114, 'hyperspace_tech', 100, '1,3', 0, 2.00, 255, 0, 100, 100, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(115, 'combustion_tech', 100, '1,3', 0, 2.00, 20, 0, 0, 0, 0, 0, 2, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 3, 0, 0, 0, 5.00, 0),
(117, 'impulse_motor_tech', 100, '1,3', 0, 2.00, 20, 0, 0, 0, 0, 0, 35, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 4, 0, 0, 0, 5.00, 0),
(118, 'hyperspace_motor_tech', 100, '1,3', 0, 2.00, 20, 0, 0, 0, 0, 0, 1000, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 6, 0, 0, 0, 5.00, 0),
(120, 'laser_tech', 100, '1,3', 0, 2.00, 20, 0, 0, 0, 0, 0, 3, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17, 3, 0, 0, 0, 5.00, 0),
(121, 'ionic_tech', 100, '1,3', 0, 2.00, 20, 0, 0, 0, 0, 0, 15, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17, 4, 0, 0, 0, 5.00, 0),
(122, 'buster_tech', 100, '1,3', 0, 2.00, 20, 0, 0, 0, 0, 0, 40, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17, 5, 0, 0, 0, 5.00, 0),
(123, 'intergalactic_tech', 100, '1,3', 0, 2.00, 255, 100, 100, 100, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(124, 'expedition_tech', 100, '1,3', 0, 2.00, 9, 0, 0, 0, 0, 0, 100, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 7, 3, 0, 0, 0, 100.00, 0.2),
(199, 'graviton_tech', 100, '1,3', 0, 2.00, 20, 0, 0, 0, 0, 0, 400, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17, 6, 0, 0, 0, 5.00, 0),
(202, 'small_ship_cargo', 200, '1,3', 0, 1.00, NULL, 5000, 5000, 0, 0, 0, 0, 0, 10, 20, 4, 5000, 10000, NULL, NULL, NULL, NULL, 5000, 5, 10, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(203, 'big_ship_cargo', 200, '1,3', 0, 1.00, NULL, 50000, 50000, 0, 0, 0, 0, 0, 50, 50, 1, 7500, 7500, NULL, NULL, NULL, NULL, 25000, 5, 25, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(204, 'light_hunter', 200, '1,3', 0, 1.00, NULL, 3000, 1000, 0, 0, 0, 0, 0, 20, 20, 1, 12500, 12500, NULL, NULL, NULL, NULL, 50, 50, 10, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(205, 'heavy_hunter', 200, '1,3', 0, 1.00, NULL, 4000, 1500, 550, 0, 0, 0, 0, 75, 75, 2, 10000, 15000, NULL, NULL, NULL, NULL, 100, 150, 25, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(206, 'crusher', 200, '1,3', 0, 1.00, NULL, 3000, 500, 375, 0, 0, 0, 0, 300, 300, 2, 15000, 15000, NULL, NULL, NULL, NULL, 800, 400, 50, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(207, 'battle_ship', 200, '1,3', 0, 1.00, NULL, 3000, 1000, 750, 0, 0, 0, 0, 250, 250, 3, 10000, 10000, NULL, NULL, NULL, NULL, 1500, 1000, 200, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(208, 'colonizer', 200, '1,3', 0, 1.00, NULL, 50000, 25000, 5000, 0, 0, 0, 0, 1000, 1000, 2, 2500, 2500, NULL, NULL, NULL, NULL, 7500, 50, 100, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(209, 'recycler', 200, '1,3', 0, 1.00, NULL, 10000, 6000, 2000, 0, 0, 0, 0, 300, 300, 1, 2000, 2000, NULL, NULL, NULL, NULL, 20000, 1, 10, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(210, 'spy_sonde', 200, '1,3', 0, 1.00, NULL, 0, 1000, 0, 0, 0, 0, 0, 1, 1, 1, 100000000, 100000000, NULL, NULL, NULL, NULL, 5, 0, 0, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(211, 'bomber_ship', 200, '1,3', 0, 1.00, NULL, 65000, 25000, 15000, 0, 0, 0, 0, 1000, 1000, 5, 4000, 5000, NULL, NULL, NULL, NULL, 500, 1000, 500, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(212, 'solar_satelit', 200, '1,3', 0, 1.00, NULL, 0, 3000, 750, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, '((($BuildTemp + 160) / 6) * (0.1 * $BuildLevelFactor) * $BuildLevel)', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(213, 'destructor', 200, '1,3', 0, 1.00, NULL, 6000, 2500, 750, 0, 0, 0, 0, 1000, 1000, 3, 5000, 5000, NULL, NULL, NULL, NULL, 2000, 2000, 500, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(214, 'dearth_star', 200, '1,3', 0, 1.00, NULL, 500000, 500000, 100000, 0, 0, 0, 0, 1, 1, 3, 200, 200, NULL, NULL, NULL, NULL, 1000000, 200000, 50000, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(215, 'battleship', 200, '1,3', 0, 1.00, NULL, 27500, 12500, 2000, 0, 0, 0, 0, 250, 250, 3, 10000, 10000, NULL, NULL, NULL, NULL, 750, 700, 400, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(216, 'lune_noir', 200, '1,3', 0, 1.00, NULL, 235000, 115000, 27500, 0, 0, 0, 0, 250, 250, 3, 900, 900, NULL, NULL, NULL, NULL, 15000000, 150000, 70000, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(217, 'ev_transporter', 200, '1,3', 0, 1.00, NULL, 100, 100, 100, 0, 0, 0, 0, 90, 90, 3, 6000, 6000, NULL, NULL, NULL, NULL, 400000000, 50, 120, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(218, 'star_crasher', 200, '1,3', 0, 1.00, NULL, 500000, 250000, 65000, 0, 0, 0, 0, 10000, 10000, 3, 10, 10, NULL, NULL, NULL, NULL, 50000000, 35000000, 2000000, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(219, 'giga_recykler', 200, '1,3', 0, 1.00, NULL, 100, 100, 100, 0, 0, 0, 0, 300, 300, 3, 7500, 7500, NULL, NULL, NULL, NULL, 200000000, 1, 1000, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(220, 'dm_ship', 200, '1,3', 0, 1.00, NULL, 100, 100, 100, 0, 0, 0, 0, 100000, 100000, 3, 100, 100, NULL, NULL, NULL, NULL, 6000000, 5, 50000, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(401, 'misil_launcher', 400, '1,3', 0, 1.00, NULL, 100, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 80, 20, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(402, 'small_laser', 400, '1,3', 0, 1.00, NULL, 3000, 750, 375, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 100, 25, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(403, 'big_laser', 400, '1,3', 0, 1.00, NULL, 3500, 1250, 1300, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 250, 100, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(404, 'gauss_canyon', 400, '1,3', 0, 1.00, NULL, 13000, 4500, 1550, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1100, 200, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(405, 'ionic_canyon', 400, '1,3', 0, 1.00, NULL, 3500, 1000, 550, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 150, 500, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(406, 'buster_canyon', 400, '1,3', 0, 1.00, NULL, 4500, 1750, 1500, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 3000, 300, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(407, 'small_protection_shield', 400, '1,3', 1, 1.00, NULL, 50000, 50000, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 2000, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(408, 'big_protection_shield', 400, '1,3', 1, 1.00, NULL, 250000, 250000, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 10000, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(409, 'planet_protector', 400, '1,3', 1, 1.00, NULL, 2500000, 2500000, 100, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 1000000, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(410, 'graviton_canyon', 400, '1,3', 0, 1.00, NULL, 17000, 7500, 1550, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 500000, 80000, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(411, 'orbital_station', 400, '1,3', 1, 1.00, NULL, 100, 100, 100, 100, 100, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 400000000, 2000000000, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(502, 'interceptor_misil', 500, '1,3', 0, 1.00, NULL, 100, 0, 100, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 1, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(503, 'interplanetary_misil', 500, '1,3', 0, 1.00, NULL, 100, 100, 100, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 12000, 1, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(601, 'rpg_geologue', 600, '1,3', 0, 1.00, 25, 0, 0, 0, 0, 10, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.02, 0.00, 0.02, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(602, 'rpg_amiral', 600, '1,3', 0, 1.00, 20, 0, 0, 0, 0, 40, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.02, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(603, 'rpg_ingenieur', 600, '1,3', 0, 1.00, 25, 0, 0, 0, 0, 5, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.02, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(604, 'rpg_technocrate', 600, '1,3', 0, 1.00, 25, 0, 0, 0, 0, 20, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, 0.00, 0.00, -0.01, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(605, 'rpg_constructeur', 600, '1,3', 0, 1.00, 15, 0, 0, 0, 0, 30, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, 0.00, -0.02, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(606, 'rpg_scientifique', 600, '1,3', 0, 1.00, 25, 0, 0, 0, 0, 2, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.02, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(607, 'rpg_stockeur', 600, '1,3', 0, 1.00, 2, 0, 0, 0, 0, 100, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.50, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(608, 'rpg_defenseur', 600, '1,3', 0, 1.00, 20, 0, 0, 0, 0, 10, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.02, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(609, 'rpg_bunker', 600, '1,3', 0, 1.00, 20, 0, 0, 0, 0, 10, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, 0.02, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(610, 'rpg_espion', 600, '1,3', 0, 1.00, 4, 0, 0, 0, 0, 200, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.01, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(611, 'rpg_commandant', 600, '1,3', 0, 1.00, 3, 0, 0, 0, 0, 100, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 3.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(612, 'rpg_destructeur', 600, '1,3', 0, 1.00, 1, 0, 0, 0, 0, 100, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(613, 'rpg_general', 600, '1,3', 0, 1.00, 20, 0, 0, 0, 0, 4, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.02, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(614, 'rpg_raideur', 600, '1,3', 0, 1.00, 1, 0, 0, 0, 0, 100, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(615, 'rpg_empereur', 600, '1,3', 0, 1.00, 1, 0, 0, 0, 0, 100, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 2.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(701, 'dm_attack', 700, '1,3', 0, 1.00, NULL, 0, 0, 0, 0, 100, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 86400, 0.10, 0.10, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(702, 'dm_defensive', 700, '1,3', 0, 1.00, NULL, 0, 0, 0, 0, 100, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 86400, 0.00, 0.00, 0.10, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(703, 'dm_buildtime', 700, '1,3', 0, 1.00, NULL, 0, 0, 0, 0, 100, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 86400, 0.00, 0.00, 0.00, -0.10, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(704, 'dm_resource', 700, '1,3', 0, 1.00, NULL, 0, 0, 0, 0, 100, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 86400, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.10, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(705, 'dm_energie', 700, '1,3', 0, 1.00, NULL, 0, 0, 0, 0, 100, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 86400, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.10, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(706, 'dm_researchtime', 700, '1,3', 0, 1.00, NULL, 0, 0, 0, 0, 100, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 86400, 0.00, 0.00, 0.00, 0.00, -0.10, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(707, 'dm_fleettime', 700, '1,3', 0, 1.00, NULL, 0, 0, 0, 0, 100, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 86400, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, -0.10, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(16, 'space_port', 0, '1', 0, 2.00, 255, 2500, 1250, 250, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(221, 'bs_oneil', 200, '1,3', 0, 1.00, NULL, 3500000, 1500000, 575000, 0, 0, 0, 0, 1000, 1000, 5, 4000, 5000, NULL, NULL, NULL, NULL, 500, 1000, 500, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(222, 'flying_death', 200, '1,3', 0, 1.00, NULL, 2350000, 1150000, 305000, 0, 0, 0, 0, 1000, 1000, 5, 4000, 5000, NULL, NULL, NULL, NULL, 500, 1000, 500, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(224, 'm19', 200, '1,3', 0, 1.00, NULL, 0, 0, 0, 0, 15, 0, 0, 1, 1, 3, 200, 200, NULL, NULL, NULL, NULL, 1000000, 200000, 50000, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(225, 'galleon', 200, '1,3', 0, 1.00, NULL, 20000, 7500, 2500, 0, 0, 0, 0, 1, 1, 3, 200, 200, NULL, NULL, NULL, NULL, 1000000, 200000, 50000, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(226, 'destroyer', 200, '1,3', 0, 1.00, NULL, 650000, 350000, 75000, 0, 0, 0, 0, 1000, 1000, 3, 5000, 5000, NULL, NULL, NULL, NULL, 2000, 2000, 500, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(227, 'frigate', 200, '1,3', 0, 1.00, NULL, 100, 100, 100, 0, 0, 0, 0, 1000, 1000, 3, 5000, 5000, NULL, NULL, NULL, NULL, 2000, 2000, 500, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(228, 'black_wanderer', 200, '1,3', 0, 1.00, NULL, 100, 100, 100, 0, 0, 0, 0, 1000, 1000, 3, 5000, 5000, NULL, NULL, NULL, NULL, 2000, 2000, 500, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(229, 'm7', 200, '1,3', 0, 1.00, NULL, 0, 0, 0, 0, 11, 0, 0, 1000, 1000, 3, 5000, 5000, NULL, NULL, NULL, NULL, 2000, 2000, 500, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(230, 'm32', 200, '1,3', 0, 1.00, NULL, 0, 0, 0, 0, 180, 0, 0, 1000, 1000, 3, 5000, 5000, NULL, NULL, NULL, NULL, 2000, 2000, 500, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(420, 'megador_slim', 400, '1,3', 0, 1.00, NULL, 0, 0, 0, 0, 6, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1100, 200, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(421, 'iron_megador', 400, '1,3', 0, 1.00, NULL, 0, 0, 0, 0, 26, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 250, 100, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(422, 'grand_megador', 400, '1,3', 0, 1.00, NULL, 0, 0, 0, 0, 112, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 250, 100, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(412, 'lepton_gun', 400, '1,3', 0, 1.00, NULL, 335000, 155000, 70000, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1100, 200, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(416, 'hydrogen_cannon', 400, '1,3', 0, 1.00, NULL, 170000, 85000, 35000, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 250, 100, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0);
INSERT INTO `uni1_vars` (`elementID`, `name`, `class`, `onPlanetType`, `onePerPlanet`, `factor`, `maxLevel`, `cost901`, `cost902`, `cost903`, `cost911`, `cost921`, `cost941`, `cost800`, `consumption1`, `consumption2`, `speedTech`, `speed1`, `speed2`, `speed2Tech`, `speed2onLevel`, `speed3Tech`, `speed3onLevel`, `capacity`, `attack`, `defend`, `timeBonus`, `bonusAttack`, `bonusDefensive`, `bonusShield`, `bonusBuildTime`, `bonusResearchTime`, `bonusShipTime`, `bonusDefensiveTime`, `bonusResource`, `bonusEnergy`, `bonusResourceStorage`, `bonusShipStorage`, `bonusFlyTime`, `bonusFleetSlots`, `bonusPlanets`, `bonusSpyPower`, `bonusExpedition`, `bonusGateCoolTime`, `bonusMoreFound`, `bonusAttackUnit`, `bonusDefensiveUnit`, `bonusShieldUnit`, `bonusBuildTimeUnit`, `bonusResearchTimeUnit`, `bonusShipTimeUnit`, `bonusDefensiveTimeUnit`, `bonusResourceUnit`, `bonusEnergyUnit`, `bonusResourceStorageUnit`, `bonusShipStorageUnit`, `bonusFlyTimeUnit`, `bonusFleetSlotsUnit`, `bonusPlanetsUnit`, `bonusSpyPowerUnit`, `bonusExpeditionUnit`, `bonusGateCoolTimeUnit`, `bonusMoreFoundUnit`, `bonusMoonCreat`, `bonusAccuracyShot`, `bonusArmor`, `bonusArmorActive`, `bonusShieldReg`, `bonusResource941`, `bonusSpeedFleet`, `bonusMotorEconomy`, `bonusEspionage`, `speedFleetFactor`, `production901`, `production902`, `production903`, `production911`, `production921`, `production941`, `storage901`, `storage902`, `storage903`, `storage941`, `arbrePosition`, `arbrePositionSec`, `bonus800`, `bonusExpe`, `bonus921`, `bonusText`, `bonusText2`) VALUES
(417, 'dora_cannon', 400, '1,3', 0, 1.00, NULL, 815000, 390000, 165000, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1100, 200, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(413, 'proton_gun', 400, '1,3', 0, 1.00, NULL, 82500, 40000, 15000, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 250, 100, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(418, 'photon_cannon', 400, '1,3', 0, 1.00, NULL, 140000, 75000, 35000, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1100, 200, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(419, 'particle_emitter', 400, '1,3', 0, 1.00, NULL, 335000, 160000, 70000, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 250, 100, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(415, 'quantum_cannon', 400, '1,3', 0, 1.00, NULL, 100, 100, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 250, 100, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(101, 'microprocessors_tech', 100, '1,3', 0, 2.25, 25, 0, 0, 0, 0, 0, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12, 0, 0, 0, 0, 1.00, 0),
(102, 'mining_tech', 100, '1,3', 0, 2.00, 25, 0, 0, 0, 0, 0, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 1, 0, 0, 0, 5.00, 0),
(165, 'saveengine_tech', 100, '1,3', 0, 2.00, 10, 0, 0, 0, 0, 0, 2500, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 7, 0, 0, 0, 2.00, 0),
(155, 'accurate_tech', 100, '1,3', 0, 2.00, 10, 0, 0, 0, 0, 0, 3000, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17, 7, 0, 0, 0, 2.00, 0),
(103, 'colonisation_tech', 100, '1,3', 0, 2.00, 9, 0, 0, 0, 0, 0, 50, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 2, 0, 0, 0, 1.00, 0),
(104, 'alliance_link_tech', 100, '1,3', 0, 2.00, 10, 0, 0, 0, 0, 0, 1000, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 3, 0, 0, 0, 10.00, 0),
(105, 'engines_tech', 100, '1,3', 0, 2.00, 35, 0, 0, 0, 0, 0, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 2, 0, 0, 0, 3.00, 0),
(116, 'ionic_motor_tech', 100, '1,3', 0, 2.00, 20, 0, 0, 0, 0, 0, 600, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, 5, 0, 0, 0, 5.00, 0),
(141, 'light_armor_tech', 100, '1,3', 0, 2.00, 20, 0, 0, 0, 0, 0, 3, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 13, 3, 0, 0, 0, 5.00, 0),
(142, 'medium_armor_tech', 100, '1,3', 0, 2.00, 20, 0, 0, 0, 0, 0, 65, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 13, 4, 0, 0, 0, 5.00, 0),
(143, 'heavy_armor_tech', 100, '1,3', 0, 2.00, 20, 0, 0, 0, 0, 0, 1000, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 13, 5, 0, 0, 0, 5.00, 0),
(144, 'active_armor_tech', 100, '1,3', 0, 2.00, 10, 0, 0, 0, 0, 0, 3000, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 13, 6, 0, 0, 0, 2.00, 0),
(171, 'light_shields_tech', 100, '1,3', 0, 2.00, 20, 0, 0, 0, 0, 0, 2, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 3, 0, 0, 0, 5.00, 0.25),
(172, 'medium_shields_tech', 100, '1,3', 0, 2.00, 20, 0, 0, 0, 0, 0, 55, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 4, 0, 0, 0, 5.00, 0.5),
(173, 'heavy_shields_tech', 100, '1,3', 0, 2.00, 20, 0, 0, 0, 0, 0, 500, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 5, 0, 0, 0, 5.00, 1),
(174, 'restaure_shields_tech', 100, '1,3', 0, 2.00, 10, 0, 0, 0, 0, 0, 2500, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 6, 0, 0, 0, 3.50, 0),
(154, 'astrophysics_tech', 100, '1,3', 0, 2.00, 10, 0, 0, 0, 0, 0, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, 2, 0, 0, 0, 1.00, 15),
(153, 'search_fleet_tech', 100, '1,3', 0, 2.00, 7, 0, 0, 0, 0, 0, 500, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 7, 4, 0, 0, 0, 1.50, 0),
(152, 'dm_search_tech', 100, '1,3', 0, 2.00, 7, 0, 0, 0, 0, 0, 2000, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 7, 5, 0, 0, 0, 1.00, 0),
(151, 'star_search_tech', 100, '1,3', 0, 2.00, 7, 0, 0, 0, 0, 0, 4000, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 7, 6, 0, 0, 0, 0.05, 0),
(156, 'agression_barbar_tech', 100, '1,3', 0, 2.00, 3, 0, 0, 0, 0, 0, 5000, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 3, 0, 0, 0, 0.00, 0),
(157, 'agression_pirat_tech', 100, '1,3', 0, 2.00, 5, 0, 0, 0, 0, 0, 1000, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 4, 0, 0, 0, 0.00, 0),
(158, 'agression_ancient_tech', 100, '1,3', 0, 2.00, 5, 0, 0, 0, 0, 0, 4000, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 5, 0, 0, 0, 0.00, 0),
(801, 'ach_builder', 800, '1,3', 0, 1.00, NULL, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 1, 200, 0, 0.00, 0),
(803, 'ach_fleeter', 800, '1,3', 0, 1.00, NULL, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, 300, 0, 0.00, 0),
(804, 'ach_scientist', 800, '1,3', 0, 1.00, NULL, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 3, 400, 0, 0.00, 0),
(231, 'm20', 200, '1,3', 0, 1.00, NULL, 0, 0, 0, 0, 38, 0, 0, 1000, 1000, 3, 5000, 5000, NULL, NULL, NULL, NULL, 2000, 2000, 500, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(805, 'ach_expe_res', 800, '1,3', 0, 1.00, NULL, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 1, 200, 0, 0.00, 0),
(807, 'ach_expe_fleet', 800, '1,3', 0, 1.00, NULL, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, 300, 0, 0.00, 0),
(802, 'ach_defense', 800, '1,3', 0, 1.00, NULL, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, 300, 0, 0.00, 0),
(814, 'ach_rise_ruins', 800, '1,3', 0, 1.00, NULL, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 2, 300, 0, 0.00, 0),
(813, 'ach_conquer_ruins', 800, '1,3', 0, 1.00, NULL, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 1, 200, 0, 0.00, 0),
(232, 'm60', 200, '1,3', 0, 1.00, NULL, 400000, 200000, 75000, 0, 0, 0, 0, 1000, 1000, 3, 5000, 5000, NULL, NULL, NULL, NULL, 2000, 2000, 500, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(233, 'h140', 200, '1,3', 0, 1.00, NULL, 950000, 450000, 140000, 0, 16, 0, 0, 1000, 1000, 3, 5000, 5000, NULL, NULL, NULL, NULL, 2000, 2000, 500, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(112, 'ally_development_tech', 100, '1,3', 0, 2.00, 1, 0, 0, 0, 0, 0, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 4, 0, 0, 0, 0.00, 0),
(29, 'fund_mine', 0, '1,3', 0, 2.00, 255, 1000, 1000, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(817, 'ach_market', 800, '1,3', 0, 1.00, NULL, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 3, 400, 0, 0.00, 0),
(825, 'ach_mercenary', 800, '1,3', 0, 1.00, NULL, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 1, 300, 0, 0.00, 0),
(822, 'ach_destroyer', 800, '1,3', 0, 1.00, NULL, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 4, 400, 0, 0.00, 0),
(235, 'mamouth', 200, '1,3', 0, 1.00, NULL, 450000, 300000, 100000, 0, 0, 0, 0, 1000, 1000, 2, 2500, 2500, NULL, NULL, NULL, NULL, 7500, 50, 100, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(414, 'canyon', 400, '1,3', 0, 1.00, NULL, 4500, 1750, 750, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 250, 100, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(423, 'gatlin_canyon', 400, '1,3', 0, 1.00, NULL, 35000, 12500, 15000, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 250, 100, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(443, 'dx_bob', 400, '1,3', 0, 1.00, NULL, 0, 0, 0, 0, 57, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 250, 100, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(430, 'sentinel', 400, '1,3', 0, 1.00, NULL, 375000, 175000, 75000, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 250, 100, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(434, 'armageddon', 400, '1,3', 0, 1.00, NULL, 920000, 455000, 165000, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1100, 200, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0),
(435, 'promety_complex', 400, '1,3', 0, 1.00, NULL, 1350000, 585000, 325000, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 250, 100, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0.00, 0);

-- --------------------------------------------------------

--
-- Structure de la table `uni1_vars_rapidfire`
--

CREATE TABLE `uni1_vars_rapidfire` (
  `elementID` int(11) NOT NULL,
  `rapidfireID` int(11) NOT NULL,
  `shoots` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `uni1_vars_rapidfire`
--

INSERT INTO `uni1_vars_rapidfire` (`elementID`, `rapidfireID`, `shoots`) VALUES
(202, 210, 5),
(202, 212, 5),
(203, 210, 5),
(203, 212, 5),
(204, 210, 5),
(204, 212, 5),
(205, 202, 3),
(205, 210, 5),
(205, 212, 5),
(206, 204, 6),
(206, 401, 10),
(206, 210, 5),
(206, 212, 5),
(207, 210, 5),
(207, 212, 5),
(208, 210, 5),
(208, 212, 5),
(209, 210, 5),
(209, 212, 5),
(211, 210, 5),
(211, 212, 5),
(211, 401, 20),
(211, 402, 20),
(211, 403, 10),
(211, 405, 10),
(213, 210, 5),
(213, 212, 5),
(213, 215, 2),
(213, 402, 10),
(214, 210, 1250),
(214, 212, 1250),
(214, 202, 250),
(214, 203, 250),
(214, 208, 250),
(214, 209, 250),
(214, 204, 200),
(214, 205, 100),
(214, 206, 33),
(214, 207, 30),
(214, 211, 25),
(214, 215, 15),
(214, 213, 5),
(214, 401, 200),
(214, 402, 200),
(214, 403, 100),
(214, 404, 50),
(214, 405, 100),
(215, 202, 3),
(215, 203, 3),
(215, 205, 4),
(215, 206, 4),
(215, 207, 10),
(215, 210, 5),
(215, 212, 5),
(216, 210, 1250),
(216, 212, 1250),
(216, 202, 250),
(216, 203, 250),
(216, 204, 200),
(216, 205, 100),
(216, 206, 33),
(216, 207, 30),
(216, 208, 250),
(216, 209, 250),
(216, 211, 25),
(216, 213, 5),
(216, 214, 1),
(216, 215, 15),
(216, 401, 400),
(216, 402, 200),
(216, 403, 100),
(216, 404, 50),
(216, 405, 100),
(217, 210, 5),
(217, 212, 5),
(218, 210, 1250),
(218, 212, 1250),
(218, 202, 250),
(218, 203, 250),
(218, 204, 200),
(218, 205, 100),
(218, 206, 33),
(218, 207, 30),
(218, 208, 250),
(218, 209, 250),
(218, 211, 25),
(218, 213, 5),
(218, 215, 15),
(218, 401, 400),
(218, 402, 200),
(218, 403, 100),
(218, 404, 50),
(218, 405, 100),
(219, 210, 5),
(219, 212, 5),
(220, 210, 5),
(220, 212, 5);

-- --------------------------------------------------------

--
-- Structure de la table `uni1_vars_requriements`
--

CREATE TABLE `uni1_vars_requriements` (
  `elementID` int(11) NOT NULL,
  `requireID` int(11) NOT NULL,
  `requireLevel` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `uni1_vars_requriements`
--

INSERT INTO `uni1_vars_requriements` (`elementID`, `requireID`, `requireLevel`) VALUES
(102, 101, 1),
(106, 101, 1),
(113, 101, 1),
(103, 102, 3),
(154, 102, 1),
(104, 103, 1),
(109, 113, 1),
(105, 113, 1),
(115, 105, 1),
(120, 109, 1),
(121, 109, 3),
(117, 105, 3),
(122, 109, 5),
(116, 105, 5),
(155, 109, 13),
(118, 105, 9),
(199, 109, 9),
(165, 105, 13),
(110, 106, 1),
(111, 106, 1),
(171, 110, 1),
(141, 111, 1),
(172, 110, 4),
(142, 111, 4),
(173, 110, 9),
(143, 111, 9),
(174, 110, 13),
(144, 111, 13),
(124, 154, 1),
(153, 124, 3),
(152, 124, 5),
(151, 124, 7),
(21, 14, 2),
(15, 14, 10),
(15, 101, 5),
(33, 113, 5),
(34, 104, 1),
(12, 113, 3),
(210, 21, 1),
(210, 111, 1),
(210, 106, 1),
(210, 105, 1),
(212, 21, 1),
(212, 111, 1),
(212, 113, 2),
(202, 21, 2),
(202, 111, 1),
(202, 110, 1),
(202, 105, 2),
(209, 21, 3),
(209, 111, 2),
(209, 110, 2),
(209, 105, 2),
(208, 21, 5),
(208, 111, 3),
(208, 110, 1),
(208, 105, 4),
(208, 103, 1),
(203, 21, 10),
(203, 111, 9),
(203, 110, 9),
(203, 105, 9),
(204, 21, 1),
(204, 141, 1),
(204, 171, 1),
(204, 115, 1),
(204, 120, 1),
(206, 120, 3),
(206, 115, 2),
(206, 171, 2),
(206, 141, 3),
(205, 21, 3),
(205, 141, 1),
(205, 171, 2),
(205, 115, 2),
(205, 120, 1),
(207, 21, 6),
(207, 141, 2),
(207, 171, 3),
(207, 115, 3),
(207, 122, 1),
(213, 21, 7),
(213, 141, 4),
(213, 171, 4),
(213, 115, 4),
(213, 122, 2),
(225, 21, 8),
(225, 142, 1),
(225, 172, 2),
(225, 117, 1),
(225, 121, 2),
(215, 21, 9),
(215, 142, 2),
(215, 172, 1),
(215, 117, 3),
(215, 120, 4),
(211, 21, 10),
(211, 142, 4),
(211, 172, 3),
(211, 117, 4),
(211, 122, 3),
(216, 21, 11),
(216, 142, 7),
(216, 172, 7),
(216, 116, 2),
(216, 122, 7),
(232, 21, 12),
(232, 142, 8),
(232, 172, 9),
(232, 116, 3),
(232, 120, 7),
(232, 121, 6),
(218, 21, 13),
(218, 142, 9),
(218, 172, 8),
(218, 116, 4),
(218, 121, 8),
(214, 21, 15),
(214, 143, 3),
(214, 173, 3),
(214, 118, 4),
(214, 199, 6),
(226, 21, 16),
(226, 143, 3),
(226, 173, 4),
(226, 118, 3),
(226, 199, 5),
(233, 21, 17),
(233, 143, 5),
(233, 172, 6),
(233, 118, 6),
(233, 122, 10),
(233, 199, 6),
(222, 21, 19),
(222, 143, 7),
(222, 173, 8),
(222, 118, 7),
(222, 120, 11),
(222, 199, 8),
(221, 21, 20),
(221, 143, 10),
(221, 173, 10),
(221, 118, 9),
(221, 121, 12),
(221, 199, 9),
(402, 21, 1),
(402, 141, 1),
(402, 171, 1),
(402, 120, 1),
(403, 21, 2),
(403, 141, 2),
(403, 171, 3),
(403, 121, 1),
(405, 21, 2),
(405, 141, 2),
(405, 171, 2),
(405, 121, 1),
(416, 21, 13),
(416, 142, 6),
(416, 172, 8),
(416, 121, 5),
(407, 171, 3),
(407, 141, 1),
(407, 21, 5),
(404, 21, 6),
(404, 142, 1),
(404, 172, 1),
(404, 120, 2),
(412, 21, 14),
(412, 143, 2),
(412, 173, 5),
(412, 120, 7),
(406, 21, 3),
(406, 141, 2),
(406, 171, 3),
(406, 122, 1),
(418, 21, 12),
(418, 142, 5),
(418, 172, 8),
(418, 120, 7),
(408, 21, 10),
(408, 113, 4),
(408, 142, 1),
(417, 21, 17),
(417, 143, 5),
(417, 173, 8),
(417, 120, 9),
(410, 21, 7),
(410, 142, 1),
(410, 172, 2),
(413, 21, 11),
(410, 120, 3),
(413, 142, 4),
(413, 172, 6),
(413, 121, 4),
(419, 21, 14),
(419, 143, 3),
(419, 173, 6),
(419, 121, 6),
(409, 21, 15),
(409, 113, 7),
(409, 143, 1),
(112, 104, 1),
(29, 102, 10),
(156, 154, 4),
(206, 21, 4),
(235, 21, 14),
(235, 142, 2),
(235, 173, 4),
(235, 116, 4),
(235, 122, 8),
(235, 199, 3),
(414, 21, 5),
(414, 141, 2),
(414, 171, 3),
(414, 122, 1),
(414, 121, 1),
(423, 21, 9),
(423, 142, 2),
(423, 172, 4),
(423, 122, 3),
(430, 21, 15),
(430, 143, 2),
(430, 173, 5),
(430, 199, 4),
(434, 21, 18),
(434, 143, 6),
(434, 173, 9),
(434, 121, 8),
(434, 199, 6),
(435, 21, 20),
(435, 143, 8),
(435, 173, 12),
(435, 122, 9),
(435, 199, 7),
(229, 21, 10),
(224, 21, 12),
(231, 21, 14),
(230, 21, 16),
(422, 21, 14),
(443, 21, 16),
(420, 21, 10),
(421, 21, 12),
(404, 121, 1),
(410, 121, 1),
(413, 122, 3),
(418, 122, 4),
(416, 122, 5),
(408, 172, 3),
(412, 199, 3),
(419, 199, 3),
(417, 199, 5),
(409, 173, 3);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `uni1_aks`
--
ALTER TABLE `uni1_aks`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `uni1_alliance`
--
ALTER TABLE `uni1_alliance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ally_tag` (`ally_tag`),
  ADD KEY `ally_name` (`ally_name`),
  ADD KEY `ally_universe` (`ally_universe`);

--
-- Index pour la table `uni1_alliance_developments`
--
ALTER TABLE `uni1_alliance_developments`
  ADD UNIQUE KEY `skillId` (`skillId`);

--
-- Index pour la table `uni1_alliance_ranks`
--
ALTER TABLE `uni1_alliance_ranks`
  ADD PRIMARY KEY (`rankID`),
  ADD KEY `allianceID` (`allianceID`,`rankID`);

--
-- Index pour la table `uni1_alliance_request`
--
ALTER TABLE `uni1_alliance_request`
  ADD PRIMARY KEY (`applyID`),
  ADD KEY `allianceID` (`allianceID`,`userID`);

--
-- Index pour la table `uni1_arsenal_details`
--
ALTER TABLE `uni1_arsenal_details`
  ADD PRIMARY KEY (`arsenalId`);

--
-- Index pour la table `uni1_banned`
--
ALTER TABLE `uni1_banned`
  ADD KEY `ID` (`id`),
  ADD KEY `universe` (`universe`);

--
-- Index pour la table `uni1_blacklist`
--
ALTER TABLE `uni1_blacklist`
  ADD UNIQUE KEY `blackId` (`blackId`);

--
-- Index pour la table `uni1_buddy`
--
ALTER TABLE `uni1_buddy`
  ADD PRIMARY KEY (`id`),
  ADD KEY `universe` (`universe`),
  ADD KEY `sender` (`sender`,`owner`);

--
-- Index pour la table `uni1_buddy_request`
--
ALTER TABLE `uni1_buddy_request`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `uni1_chat`
--
ALTER TABLE `uni1_chat`
  ADD PRIMARY KEY (`messageid`),
  ADD KEY `i_ally_idmess` (`ally_id`,`messageid`);

--
-- Index pour la table `uni1_chat_online`
--
ALTER TABLE `uni1_chat_online`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `uni1_chat_online_ally`
--
ALTER TABLE `uni1_chat_online_ally`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `uni1_chat_rooms`
--
ALTER TABLE `uni1_chat_rooms`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `uni1_chat_rooms_messages`
--
ALTER TABLE `uni1_chat_rooms_messages`
  ADD PRIMARY KEY (`messageid`);

--
-- Index pour la table `uni1_chat_rooms_online`
--
ALTER TABLE `uni1_chat_rooms_online`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `uni1_config`
--
ALTER TABLE `uni1_config`
  ADD PRIMARY KEY (`uni`);

--
-- Index pour la table `uni1_contracts`
--
ALTER TABLE `uni1_contracts`
  ADD PRIMARY KEY (`contractId`);

--
-- Index pour la table `uni1_cronjobs`
--
ALTER TABLE `uni1_cronjobs`
  ADD UNIQUE KEY `cronjobID` (`cronjobID`),
  ADD KEY `isActive` (`isActive`,`nextTime`,`lock`,`cronjobID`);

--
-- Index pour la table `uni1_cronjobs_log`
--
ALTER TABLE `uni1_cronjobs_log`
  ADD KEY `cronjobId` (`cronjobId`,`executionTime`);

--
-- Index pour la table `uni1_diplo`
--
ALTER TABLE `uni1_diplo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `universe` (`universe`),
  ADD KEY `owner_1` (`owner_1`,`owner_2`,`accept`);

--
-- Index pour la table `uni1_ennemies`
--
ALTER TABLE `uni1_ennemies`
  ADD PRIMARY KEY (`ennemieId`);

--
-- Index pour la table `uni1_fleets`
--
ALTER TABLE `uni1_fleets`
  ADD PRIMARY KEY (`fleet_id`),
  ADD KEY `fleet_target_owner` (`fleet_target_owner`,`fleet_mission`),
  ADD KEY `fleet_owner` (`fleet_owner`,`fleet_mission`),
  ADD KEY `fleet_group` (`fleet_group`);

--
-- Index pour la table `uni1_fleet_event`
--
ALTER TABLE `uni1_fleet_event`
  ADD PRIMARY KEY (`fleetID`),
  ADD KEY `lock` (`lock`,`time`);

--
-- Index pour la table `uni1_ip_multimod`
--
ALTER TABLE `uni1_ip_multimod`
  ADD UNIQUE KEY `suspectId` (`suspectId`);

--
-- Index pour la table `uni1_log`
--
ALTER TABLE `uni1_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mode` (`mode`);

--
-- Index pour la table `uni1_log_fleets`
--
ALTER TABLE `uni1_log_fleets`
  ADD PRIMARY KEY (`fleet_id`),
  ADD KEY `BashRule` (`fleet_owner`,`fleet_end_id`,`fleet_start_time`,`fleet_mission`,`fleet_state`);

--
-- Index pour la table `uni1_market_resource`
--
ALTER TABLE `uni1_market_resource`
  ADD PRIMARY KEY (`saleId`);

--
-- Index pour la table `uni1_messages`
--
ALTER TABLE `uni1_messages`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `message_sender` (`message_sender`),
  ADD KEY `message_owner` (`message_owner`,`message_type`,`message_unread`);

--
-- Index pour la table `uni1_multi`
--
ALTER TABLE `uni1_multi`
  ADD PRIMARY KEY (`multiID`),
  ADD KEY `userID` (`userID`);

--
-- Index pour la table `uni1_notes`
--
ALTER TABLE `uni1_notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `universe` (`universe`),
  ADD KEY `owner` (`owner`,`time`,`priority`);

--
-- Index pour la table `uni1_planets`
--
ALTER TABLE `uni1_planets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_luna` (`id_luna`),
  ADD KEY `id_owner` (`id_owner`),
  ADD KEY `destruyed` (`destruyed`),
  ADD KEY `universe` (`universe`,`galaxy`,`system`,`planet`,`planet_type`);

--
-- Index pour la table `uni1_premium`
--
ALTER TABLE `uni1_premium`
  ADD PRIMARY KEY (`premiumId`);

--
-- Index pour la table `uni1_purchase_logs`
--
ALTER TABLE `uni1_purchase_logs`
  ADD PRIMARY KEY (`payID`);

--
-- Index pour la table `uni1_raports`
--
ALTER TABLE `uni1_raports`
  ADD PRIMARY KEY (`rid`),
  ADD KEY `time` (`time`);

--
-- Index pour la table `uni1_session`
--
ALTER TABLE `uni1_session`
  ADD PRIMARY KEY (`userID`),
  ADD KEY `sessionID` (`sessionID`);

--
-- Index pour la table `uni1_shortcuts`
--
ALTER TABLE `uni1_shortcuts`
  ADD PRIMARY KEY (`shortcutID`),
  ADD KEY `ownerID` (`ownerID`);

--
-- Index pour la table `uni1_specialoffers`
--
ALTER TABLE `uni1_specialoffers`
  ADD PRIMARY KEY (`offerId`);

--
-- Index pour la table `uni1_statpoints`
--
ALTER TABLE `uni1_statpoints`
  ADD KEY `id_owner` (`id_owner`),
  ADD KEY `universe` (`universe`),
  ADD KEY `stat_type` (`stat_type`);

--
-- Index pour la table `uni1_storage_stats`
--
ALTER TABLE `uni1_storage_stats`
  ADD PRIMARY KEY (`storageId`);

--
-- Index pour la table `uni1_ticket`
--
ALTER TABLE `uni1_ticket`
  ADD PRIMARY KEY (`ticketID`),
  ADD KEY `ownerID` (`ownerID`),
  ADD KEY `universe` (`universe`,`status`);

--
-- Index pour la table `uni1_ticket_answer`
--
ALTER TABLE `uni1_ticket_answer`
  ADD PRIMARY KEY (`answerID`);

--
-- Index pour la table `uni1_ticket_category`
--
ALTER TABLE `uni1_ticket_category`
  ADD PRIMARY KEY (`categoryID`);

--
-- Index pour la table `uni1_topkb`
--
ALTER TABLE `uni1_topkb`
  ADD KEY `time` (`universe`,`rid`,`time`);

--
-- Index pour la table `uni1_tourney`
--
ALTER TABLE `uni1_tourney`
  ADD PRIMARY KEY (`tourneyId`);

--
-- Index pour la table `uni1_users`
--
ALTER TABLE `uni1_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `authlevel` (`authlevel`),
  ADD KEY `ref_bonus` (`ref_bonus`),
  ADD KEY `universe` (`universe`,`username`,`password`,`onlinetime`,`authlevel`),
  ADD KEY `ally_id` (`ally_id`);

--
-- Index pour la table `uni1_users_settings`
--
ALTER TABLE `uni1_users_settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Index pour la table `uni1_users_to_acs`
--
ALTER TABLE `uni1_users_to_acs`
  ADD KEY `userID` (`userID`),
  ADD KEY `acsID` (`acsID`);

--
-- Index pour la table `uni1_users_to_extauth`
--
ALTER TABLE `uni1_users_to_extauth`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `account` (`account`,`mode`);

--
-- Index pour la table `uni1_users_to_topkb`
--
ALTER TABLE `uni1_users_to_topkb`
  ADD KEY `rid` (`rid`,`role`);

--
-- Index pour la table `uni1_users_valid`
--
ALTER TABLE `uni1_users_valid`
  ADD PRIMARY KEY (`validationID`,`validationKey`);

--
-- Index pour la table `uni1_vars`
--
ALTER TABLE `uni1_vars`
  ADD PRIMARY KEY (`elementID`),
  ADD KEY `class` (`class`);

--
-- Index pour la table `uni1_vars_rapidfire`
--
ALTER TABLE `uni1_vars_rapidfire`
  ADD KEY `elementID` (`elementID`),
  ADD KEY `rapidfireID` (`rapidfireID`);

--
-- Index pour la table `uni1_vars_requriements`
--
ALTER TABLE `uni1_vars_requriements`
  ADD KEY `elementID` (`elementID`),
  ADD KEY `requireID` (`requireID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `uni1_aks`
--
ALTER TABLE `uni1_aks`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `uni1_alliance`
--
ALTER TABLE `uni1_alliance`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `uni1_alliance_ranks`
--
ALTER TABLE `uni1_alliance_ranks`
  MODIFY `rankID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `uni1_alliance_request`
--
ALTER TABLE `uni1_alliance_request`
  MODIFY `applyID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT pour la table `uni1_arsenal_details`
--
ALTER TABLE `uni1_arsenal_details`
  MODIFY `arsenalId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `uni1_banned`
--
ALTER TABLE `uni1_banned`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `uni1_blacklist`
--
ALTER TABLE `uni1_blacklist`
  MODIFY `blackId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `uni1_buddy`
--
ALTER TABLE `uni1_buddy`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `uni1_chat`
--
ALTER TABLE `uni1_chat`
  MODIFY `messageid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `uni1_chat_rooms`
--
ALTER TABLE `uni1_chat_rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `uni1_chat_rooms_messages`
--
ALTER TABLE `uni1_chat_rooms_messages`
  MODIFY `messageid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1172;

--
-- AUTO_INCREMENT pour la table `uni1_config`
--
ALTER TABLE `uni1_config`
  MODIFY `uni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `uni1_contracts`
--
ALTER TABLE `uni1_contracts`
  MODIFY `contractId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `uni1_cronjobs`
--
ALTER TABLE `uni1_cronjobs`
  MODIFY `cronjobID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `uni1_diplo`
--
ALTER TABLE `uni1_diplo`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `uni1_ennemies`
--
ALTER TABLE `uni1_ennemies`
  MODIFY `ennemieId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `uni1_fleets`
--
ALTER TABLE `uni1_fleets`
  MODIFY `fleet_id` bigint(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT pour la table `uni1_ip_multimod`
--
ALTER TABLE `uni1_ip_multimod`
  MODIFY `suspectId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `uni1_log`
--
ALTER TABLE `uni1_log`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `uni1_market_resource`
--
ALTER TABLE `uni1_market_resource`
  MODIFY `saleId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `uni1_messages`
--
ALTER TABLE `uni1_messages`
  MODIFY `message_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `uni1_multi`
--
ALTER TABLE `uni1_multi`
  MODIFY `multiID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `uni1_notes`
--
ALTER TABLE `uni1_notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `uni1_planets`
--
ALTER TABLE `uni1_planets`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `uni1_premium`
--
ALTER TABLE `uni1_premium`
  MODIFY `premiumId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `uni1_purchase_logs`
--
ALTER TABLE `uni1_purchase_logs`
  MODIFY `payID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `uni1_shortcuts`
--
ALTER TABLE `uni1_shortcuts`
  MODIFY `shortcutID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `uni1_specialoffers`
--
ALTER TABLE `uni1_specialoffers`
  MODIFY `offerId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `uni1_storage_stats`
--
ALTER TABLE `uni1_storage_stats`
  MODIFY `storageId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `uni1_ticket`
--
ALTER TABLE `uni1_ticket`
  MODIFY `ticketID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `uni1_ticket_answer`
--
ALTER TABLE `uni1_ticket_answer`
  MODIFY `answerID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `uni1_ticket_category`
--
ALTER TABLE `uni1_ticket_category`
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `uni1_tourney`
--
ALTER TABLE `uni1_tourney`
  MODIFY `tourneyId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
