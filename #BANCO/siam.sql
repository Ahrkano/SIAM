-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Tempo de geração: 12-Ago-2020 às 17:59
-- Versão do servidor: 8.0.18
-- versão do PHP: 7.2.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `siam`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `system_access_log`
--

CREATE TABLE `system_access_log` (
  `id` int(11) NOT NULL,
  `sessionid` text COLLATE utf8mb4_unicode_ci,
  `login` text COLLATE utf8mb4_unicode_ci,
  `login_time` timestamp NULL DEFAULT NULL,
  `login_year` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login_month` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login_day` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logout_time` timestamp NULL DEFAULT NULL,
  `impersonated` char(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `access_ip` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `system_access_log`
--

INSERT INTO `system_access_log` (`id`, `sessionid`, `login`, `login_time`, `login_year`, `login_month`, `login_day`, `logout_time`, `impersonated`, `access_ip`) VALUES
(1, 'ahgk225ru294f4rndpmktnq80f', 'admin', '2020-02-04 14:31:21', '2020', '02', '04', '2020-02-04 16:00:55', 'N', '::1'),
(2, '8joa0t0lmgpil3h0etbc3ddn1j', 'teste', '2020-02-04 16:02:00', '2020', '02', '04', '2020-02-04 16:11:37', 'N', '::1'),
(3, 'bdfaq7glrs9dgjev13re8lq24n', 'admin', '2020-02-04 16:11:53', '2020', '02', '04', '2020-02-04 16:43:19', 'N', '::1'),
(4, 'uh8epqnb7dt10hlplsh9p33j0k', 'teste', '2020-02-04 16:43:34', '2020', '02', '04', '2020-02-04 16:43:53', 'N', '::1'),
(5, '37pu71ajl6841nm203lgrtc36h', 'admin', '2020-02-04 16:44:09', '2020', '02', '04', '2020-02-04 16:46:04', 'N', '::1'),
(6, '4auk5f8hn014uiqir9qrlthqu6', 'teste', '2020-02-04 16:46:20', '2020', '02', '04', '2020-02-04 16:46:43', 'N', '::1'),
(7, 'q2162h7bj9lbsg40hts7h52la9', 'admin', '2020-02-04 16:46:57', '2020', '02', '04', '2020-02-07 11:42:09', 'N', '::1'),
(8, 'q2dbbebm10i4kvlvphetrh4c80', 'admin', '2020-02-12 16:19:20', '2020', '02', '12', '2020-02-14 16:05:57', 'N', '::1'),
(9, '4ur8vnudfsij5kp4970k1lfqk5', 'teste', '2020-02-14 16:06:14', '2020', '02', '14', '2020-02-14 17:46:45', 'N', '::1'),
(10, 'm2m8f6brc8v9vcp8hocbvl9skl', 'admin', '2020-02-14 17:47:07', '2020', '02', '14', '2020-02-18 10:35:47', 'N', '::1'),
(11, 'bita64s8v8idl4eiu8b8ems58u', 'admin', '2020-02-18 10:36:04', '2020', '02', '18', '2020-02-18 11:01:18', 'N', '::1'),
(12, 'pn28i7q1bbjtchiuqvtmhvk5sn', 'admin', '2020-02-18 11:01:35', '2020', '02', '18', '2020-02-19 10:44:33', 'N', '::1'),
(13, 'srrjuqdj4sv56ffcp2c9ujss8i', 'admin', '2020-02-19 10:44:53', '2020', '02', '19', '2020-02-19 10:46:51', 'N', '::1'),
(14, '136nrdqs833ql09tmnbpm5mmdn', 'admin', '2020-02-19 10:47:08', '2020', '02', '19', '2020-02-19 11:26:30', 'N', '::1'),
(15, 'tge1596irqkml5ifv8i1hpq9n5', 'admin', '2020-02-19 11:26:46', '2020', '02', '19', '2020-02-19 11:50:59', 'N', '::1'),
(16, 'd3ft3s8fldtqt4teafg7711rk2', 'admin', '2020-02-19 11:51:14', '2020', '02', '19', '2020-02-19 14:31:14', 'N', '::1'),
(17, '64ibum10q60r4dulorqe0vs1jg', 'admin', '2020-02-19 14:31:33', '2020', '02', '19', '2020-02-20 10:15:28', 'N', '::1'),
(18, 'pg6mb77cs6r3jpa37htraraslm', 'admin', '2020-02-20 10:20:27', '2020', '02', '20', '2020-02-20 10:25:12', 'N', '::1'),
(19, '3f8n16sva2o98irv3ht07cakp6', 'admin', '2020-02-20 10:25:22', '2020', '02', '20', '2020-02-20 10:32:44', 'N', '::1'),
(20, '2lgs63ki8815je6utdh4qa50lj', 'admin', '2020-02-20 10:32:53', '2020', '02', '20', '2020-02-20 10:47:46', 'N', '::1'),
(21, 'kmvkoeihp36kcd8ntp0odi0fss', 'admin', '2020-02-20 10:47:52', '2020', '02', '20', '2020-02-20 10:50:53', 'N', '::1'),
(22, 'nmp1e0sgpvqdn8oikdfeg8k1sj', 'admin', '2020-02-20 10:50:59', '2020', '02', '20', '2020-02-21 09:51:07', 'N', '::1'),
(23, 'kojsmjvluanfmr9tjv6hvkmd84', 'admin', '2020-02-21 09:51:15', '2020', '02', '21', '2020-02-21 09:59:49', 'N', '::1'),
(24, '2n7gu83vldvsckue7b3hpleeto', 'admin', '2020-02-21 09:59:55', '2020', '02', '21', '2020-02-21 10:33:05', 'N', '::1'),
(25, 'vbj4d9g49thbvbom450k4ob4ks', 'admin', '2020-02-21 10:33:13', '2020', '02', '21', '2020-02-21 16:08:10', 'N', '::1'),
(26, 'h9fs0l0rg5avsuna33b3kkdhf7', 'admin', '2020-02-21 16:08:15', '2020', '02', '21', '2020-02-21 16:13:01', 'N', '::1'),
(27, 'cg39m3tgoek8vc16ub2i7etppu', 'admin', '2020-02-21 16:13:08', '2020', '02', '21', '2020-02-21 16:13:43', 'N', '::1'),
(28, 'kiad1qdd133qd2djqjbpmnf6ea', 'admin', '2020-02-21 16:13:52', '2020', '02', '21', '2020-02-21 16:22:48', 'N', '::1'),
(29, 'thv2dg77srbdkduuh6u3o36knr', 'admin', '2020-02-21 16:22:55', '2020', '02', '21', '2020-02-21 16:23:15', 'N', '::1'),
(30, 'a8rnbhugldttnsurkcg3055jgv', 'admin', '2020-02-21 16:23:27', '2020', '02', '21', '2020-02-26 21:53:33', 'N', '::1'),
(31, 'c6b6u45e37gifopebngaddt2s9', 'admin', '2020-02-26 21:54:20', '2020', '02', '26', '2020-02-26 21:55:13', 'N', '::1'),
(32, '3rtcdqq155dafp1t5ua8h11b57', 'admin', '2020-02-26 21:55:22', '2020', '02', '26', '2020-02-27 10:02:15', 'N', '::1'),
(33, 'hd449hv8koo27o06f4u36290gv', 'admin', '2020-02-27 10:03:06', '2020', '02', '27', '2020-02-28 10:22:41', 'N', '::1'),
(34, 'pc72a2n7jcrtf4slr44m0s9dur', 'admin', '2020-02-28 10:22:50', '2020', '02', '28', '2020-02-28 10:35:54', 'N', '::1'),
(35, 'vqo23j5ifvj3452rgbmoufg5ao', 'admin', '2020-02-28 10:36:01', '2020', '02', '28', '2020-02-28 10:40:52', 'N', '::1'),
(36, 'cmp2527u6kktm3flbia3ambl0r', 'admin', '2020-02-28 10:40:58', '2020', '02', '28', '2020-03-02 00:42:38', 'N', '::1'),
(37, 'qqpolbbi4e9v5dibcqar6genca', 'admin', '2020-03-02 00:42:44', '2020', '03', '01', '2020-03-02 01:05:23', 'N', '::1'),
(38, 'pkhakqg7gdj31uo0hggtnuppro', 'admin', '2020-03-02 01:05:29', '2020', '03', '01', '2020-03-02 01:43:25', 'N', '::1'),
(39, 'mg029ijhqs4lngitasqera7qts', 'admin', '2020-03-02 01:43:31', '2020', '03', '01', '2020-03-02 10:33:26', 'N', '::1'),
(40, '8205gh3jltl668rs4gq472rb9p', 'admin', '2020-03-02 10:33:36', '2020', '03', '02', '2020-03-02 10:36:42', 'N', '::1'),
(41, '06ugppjpjo6u5flv5daaqg56pn', 'admin', '2020-03-02 10:36:48', '2020', '03', '02', '2020-03-02 10:38:31', 'N', '::1'),
(42, 'd3oo9ct3vre4h9fchued2fi8fe', 'admin', '2020-03-02 10:38:36', '2020', '03', '02', '2020-03-02 10:44:04', 'N', '::1'),
(43, 'st5urf41ts140ssgmrribnav99', 'admin', '2020-03-02 10:44:10', '2020', '03', '02', '2020-03-02 10:59:05', 'N', '::1'),
(44, '72mrbpatqif03j186p284rok7a', 'admin', '2020-03-02 10:59:10', '2020', '03', '02', '2020-03-02 11:12:38', 'N', '::1'),
(45, 'afq1aseobufc7av5hqfur9egv7', 'admin', '2020-03-02 11:12:43', '2020', '03', '02', '2020-03-03 10:18:42', 'N', '::1'),
(46, 'vpae87a3gc5lqf2nka5lieiahu', 'admin', '2020-03-03 10:18:47', '2020', '03', '03', '2020-03-03 10:22:28', 'N', '::1'),
(47, '6ilgfqtp3p6r29ak1998ekqlmh', 'admin', '2020-03-03 10:22:33', '2020', '03', '03', '2020-03-03 10:25:06', 'N', '::1'),
(48, 'qtofv6k5o77ueu6k8v630k4dvh', 'admin', '2020-03-03 10:25:10', '2020', '03', '03', '2020-03-03 10:27:02', 'N', '::1'),
(49, '0urf895p8pr5v51tm394esmflu', 'admin', '2020-03-03 10:27:07', '2020', '03', '03', '2020-03-03 10:44:21', 'N', '::1'),
(50, 'brr2j5he8lcp4ci0g2kilrn5el', 'admin', '2020-03-03 10:44:26', '2020', '03', '03', '2020-03-03 10:49:13', 'N', '::1'),
(51, 'ap6g28crtvlmj9njg2k54mcd6s', 'admin', '2020-03-03 10:49:17', '2020', '03', '03', '2020-03-03 10:51:18', 'N', '::1'),
(52, 'gkm3j2o2r039ajm2vt7pjqmcir', 'admin', '2020-03-03 10:51:24', '2020', '03', '03', '2020-03-03 10:54:37', 'N', '::1'),
(53, '36q51n5snah3psh7o4lkd9dv0j', 'admin', '2020-03-03 10:54:41', '2020', '03', '03', '2020-03-03 10:55:19', 'N', '::1'),
(54, '7f77954iatot72sqnmenvluean', 'admin', '2020-03-03 10:55:25', '2020', '03', '03', '2020-03-03 10:56:31', 'N', '::1'),
(55, '8l98mptju4cb073h17rav69cjs', 'admin', '2020-03-03 10:56:36', '2020', '03', '03', '2020-03-03 11:00:27', 'N', '::1'),
(56, '1omdn1eedbvmpu49i04dnpcna3', 'admin', '2020-03-03 11:00:34', '2020', '03', '03', '2020-03-03 11:04:22', 'N', '::1'),
(57, 'b7thlmbud9oln7ig8d58soiuhn', 'admin', '2020-03-03 11:04:29', '2020', '03', '03', '2020-03-03 11:05:33', 'N', '::1'),
(58, 'lmgmodmoh265ok0o2v88i45uj8', 'admin', '2020-03-03 11:05:39', '2020', '03', '03', '2020-03-03 16:33:28', 'N', '::1'),
(59, 'uufr1fbqjvec8n7e17a3ot60l9', 'admin', '2020-03-03 16:33:35', '2020', '03', '03', '2020-03-03 21:32:55', 'N', '::1'),
(60, '16l38o37ujv6i01m9qt2iqneo4', 'admin', '2020-03-03 21:33:00', '2020', '03', '03', '2020-03-04 10:07:15', 'N', '::1'),
(61, '0u2kvr09gfnddn77p6jj3v9hrc', 'admin', '2020-03-04 10:07:20', '2020', '03', '04', '2020-03-04 10:19:25', 'N', '::1'),
(62, 'vc3lsi5geufis53ce3gunrt0sj', 'admin', '2020-03-04 10:19:30', '2020', '03', '04', '2020-03-04 10:21:02', 'N', '::1'),
(63, 'ncldih9kgsff3udg6buepvtc1e', 'admin', '2020-03-04 10:21:07', '2020', '03', '04', '2020-03-04 10:22:21', 'N', '::1'),
(64, 'ksem95uptqvflkf7h69g5vihi7', 'admin', '2020-03-04 10:22:25', '2020', '03', '04', '2020-03-04 10:24:21', 'N', '::1'),
(65, 'o83l6k5h3lgbdcsts6ltil3dff', 'admin', '2020-03-04 10:24:26', '2020', '03', '04', '2020-03-04 10:26:07', 'N', '::1'),
(66, 't0bb1oi1gk0efoh89l1u7hbu10', 'admin', '2020-03-04 10:26:13', '2020', '03', '04', '2020-03-04 10:28:11', 'N', '::1'),
(67, 'dnhp0ph1so7jgasdr3hbdvohgp', 'admin', '2020-03-04 10:28:17', '2020', '03', '04', '2020-03-04 10:31:36', 'N', '::1'),
(68, 'nv7t6npac4gf8injl7rp30li85', 'admin', '2020-03-04 10:31:47', '2020', '03', '04', '2020-03-04 10:40:12', 'N', '::1'),
(69, 'ph6oglu6qsb3ganfu51o7s90cd', 'admin', '2020-03-04 10:40:18', '2020', '03', '04', '2020-03-04 10:51:16', 'N', '::1'),
(70, 'b41bs77v0agkufl2ffmf2k0as6', 'admin', '2020-03-04 10:51:22', '2020', '03', '04', '2020-03-04 10:51:50', 'N', '::1'),
(71, 'u6of6bgo9vb1olirhgusri59f5', 'admin', '2020-03-04 10:52:08', '2020', '03', '04', '2020-03-04 11:19:58', 'N', '::1'),
(72, 'm70tpnkufa578tepmnj6r1rqoe', 'admin', '2020-03-04 11:20:03', '2020', '03', '04', '2020-03-04 11:29:54', 'N', '::1'),
(73, '74ju2d60s7109sh3f9ge6kspiq', 'admin', '2020-03-04 11:30:01', '2020', '03', '04', '2020-03-04 11:31:28', 'N', '::1'),
(74, '8rh9hf9svp8q10si9n7dg185h9', 'admin', '2020-03-04 11:31:34', '2020', '03', '04', '2020-03-04 11:33:15', 'N', '::1'),
(75, 'gh7m9ibakmfdvbre288m5snabj', 'admin', '2020-03-04 11:33:20', '2020', '03', '04', '2020-03-04 19:29:20', 'N', '::1'),
(76, 'cgul4jkugq1b1p9mn8lnfeie3g', 'admin', '2020-03-04 19:29:26', '2020', '03', '04', '2020-03-04 19:31:00', 'N', '::1'),
(77, 'tf0fu5lktjk6i55dcvlenfff7q', 'admin', '2020-03-04 19:31:06', '2020', '03', '04', '2020-03-05 10:20:27', 'N', '::1'),
(78, 'k7egdebofhrdhlpjnk1kc8nf8o', 'admin', '2020-03-05 10:20:33', '2020', '03', '05', '2020-03-05 10:31:41', 'N', '::1'),
(79, 'bmk6pimqtkakbv19gl06v01dlq', 'admin', '2020-03-05 10:31:46', '2020', '03', '05', '2020-03-05 10:32:46', 'N', '::1'),
(80, 'ca22aoqgqnk2dsg86au88nkc7p', 'admin', '2020-03-05 10:32:51', '2020', '03', '05', '2020-03-06 10:13:43', 'N', '::1'),
(81, 'tnj1fgdavmnnmcqbrnnmkti9nr', 'admin', '2020-03-06 10:13:48', '2020', '03', '06', '2020-03-06 10:17:42', 'N', '::1'),
(82, 'p9s7popc6iuv2hht8tm6cif8ln', 'admin', '2020-03-06 10:17:46', '2020', '03', '06', '2020-03-06 10:19:18', 'N', '::1'),
(83, 'mpt2lo2o0qj5t6aabk3uoo04lv', 'admin', '2020-03-06 10:19:22', '2020', '03', '06', '2020-03-06 10:20:04', 'N', '::1'),
(84, '2403nifs6hos71htecfrv3fo6h', 'admin', '2020-03-06 10:20:10', '2020', '03', '06', '2020-03-06 10:20:50', 'N', '::1'),
(85, 'jk5saimtn5fdn9oa030he5migs', 'admin', '2020-03-06 10:20:55', '2020', '03', '06', '2020-03-06 11:52:41', 'N', '::1'),
(86, '9t65vr60qh77l2f5n3sm5c80n1', 'admin', '2020-03-06 11:57:25', '2020', '03', '06', '2020-03-09 10:08:23', 'N', '::1'),
(87, 'juroni4lukl44b4hrvifo5m0jm', 'admin', '2020-03-09 10:08:31', '2020', '03', '09', '2020-03-09 10:09:43', 'N', '::1'),
(88, '9jbq5vug6hb5b7tbgddcpuipl7', 'admin', '2020-03-09 10:14:50', '2020', '03', '09', '2020-03-09 10:20:15', 'N', '::1'),
(89, 'j1hfiss46g5in0b61vcju7v464', 'admin', '2020-03-09 10:20:20', '2020', '03', '09', '2020-03-09 10:21:02', 'N', '::1'),
(90, '7ne91qoqta8mjolmsbi6mk7b1k', 'admin', '2020-03-09 10:21:12', '2020', '03', '09', '2020-03-09 10:22:17', 'N', '::1'),
(91, 'duk7lvc3qcf3pdr1l6dj8scge0', 'admin', '2020-03-09 10:22:23', '2020', '03', '09', '2020-03-09 10:23:14', 'N', '::1'),
(92, '0ff80dou5jrejp9dotb12rqqn2', 'admin', '2020-03-09 10:29:42', '2020', '03', '09', '2020-03-09 10:30:32', 'N', '::1'),
(93, '9p44dko7prf0gue34oo1svtrnq', 'admin', '2020-03-09 10:30:37', '2020', '03', '09', '2020-03-09 10:31:03', 'N', '::1'),
(94, 'chms70auetg7a2rhsv99jgkast', 'admin', '2020-03-09 10:31:09', '2020', '03', '09', '2020-03-09 10:34:07', 'N', '::1'),
(95, '415b3lcegki05aihfv5520q7od', 'admin', '2020-03-09 10:34:13', '2020', '03', '09', '2020-03-09 10:41:49', 'N', '::1'),
(96, '9d3846f755nlvvuhoeg56el4fk', 'admin', '2020-03-09 10:42:41', '2020', '03', '09', '2020-03-09 10:43:37', 'N', '::1'),
(97, '3n89kehqfg0cjpknskssedf1ro', 'admin', '2020-03-09 10:43:42', '2020', '03', '09', '2020-03-09 10:43:56', 'N', '::1'),
(98, '2hml16aor9f2s99thggnjnk6jb', 'admin', '2020-03-09 10:44:04', '2020', '03', '09', '2020-03-09 10:44:28', 'N', '::1'),
(99, 'kkqokomr609io9326cpsg0ceid', 'admin', '2020-03-09 10:49:55', '2020', '03', '09', '2020-03-09 12:22:52', 'N', '::1'),
(100, 'ups04hgipvivnkk8rdqm7pphlp', 'admin', '2020-03-09 12:22:58', '2020', '03', '09', '2020-03-09 12:55:24', 'N', '::1'),
(101, 'mhmvc4ruvaitsj6uulkk3q4fna', 'admin', '2020-03-09 12:55:47', '2020', '03', '09', '2020-03-09 12:58:09', 'N', '::1'),
(102, '3p2jkl9tk9estj4vkepjv6omuj', 'admin', '2020-03-09 12:59:52', '2020', '03', '09', '2020-03-09 13:00:45', 'N', '::1'),
(103, '2mv185s8il5c5lgep2848rv6q7', 'admin', '2020-03-09 13:01:02', '2020', '03', '09', '2020-03-09 13:02:11', 'N', '::1'),
(104, '58483n7m5ecggnk838vht1v9ou', 'admin', '2020-03-09 13:03:27', '2020', '03', '09', '2020-03-10 10:26:25', 'N', '::1'),
(105, 'p9irkubuujf8416sjpuehm10ie', 'admin', '2020-03-10 10:26:35', '2020', '03', '10', '2020-03-10 10:54:35', 'N', '::1'),
(106, 'niaqveggkdp65e36q2ha9k6cc9', 'admin', '2020-03-10 10:54:57', '2020', '03', '10', '2020-03-10 11:04:40', 'N', '::1'),
(107, 'slk2uv13lorleu69mjcb6mt8l2', 'admin', '2020-03-10 11:04:55', '2020', '03', '10', '2020-03-10 17:29:47', 'N', '::1'),
(108, 'ef4k8d83k7omf48a6oqh9l4ddf', 'admin', '2020-03-10 17:29:52', '2020', '03', '10', '2020-03-10 17:32:33', 'N', '::1'),
(109, '31gq0v1uau51sr7ejjj746cdb7', 'admin', '2020-03-10 17:32:39', '2020', '03', '10', '2020-03-10 17:33:04', 'N', '::1'),
(110, '1qvf8tefgk5180omkkf70ohsof', 'admin', '2020-03-10 17:33:28', '2020', '03', '10', '2020-03-10 17:36:06', 'N', '::1'),
(111, 'pcmvu3iissaac6rhmntdq8jt8b', 'admin', '2020-03-10 17:36:25', '2020', '03', '10', '2020-03-10 17:39:31', 'N', '::1'),
(112, 'rma0psktduhpd9d43cm85l81ge', 'admin', '2020-03-10 17:39:44', '2020', '03', '10', '2020-03-16 15:26:09', 'N', '::1'),
(113, 'am230ie6s5dpuh053nf6edph3b', 'admin', '2020-03-16 15:26:23', '2020', '03', '16', '2020-03-16 15:33:25', 'N', '::1'),
(114, '8b60qpkchnc1jfmc4tk7n7k44m', 'admin', '2020-03-16 15:33:38', '2020', '03', '16', '2020-03-16 15:34:07', 'N', '::1'),
(115, 'em744lm9m6fknsna3vobqm82r5', 'admin', '2020-03-16 15:34:36', '2020', '03', '16', '2020-03-16 15:37:28', 'N', '::1'),
(116, '78vbj61bhpd0cga5n4lf8cclvk', 'admin', '2020-03-16 15:37:42', '2020', '03', '16', '2020-03-16 15:41:00', 'N', '::1'),
(117, 'dfcgdet4n2flkn7gitolkmpgj7', 'admin', '2020-03-16 15:41:08', '2020', '03', '16', '2020-03-16 15:41:39', 'N', '::1'),
(118, '1vedd146l1fnat1oja6anjbfv0', 'admin', '2020-03-16 15:41:45', '2020', '03', '16', '2020-03-16 15:45:12', 'N', '::1'),
(119, '5k0rlv1rjetarmirtcrc7sqa52', 'admin', '2020-03-16 15:45:27', '2020', '03', '16', '2020-03-16 15:51:17', 'N', '::1'),
(120, 'omsnl42buou197ailcifpuvv7m', 'admin', '2020-03-16 15:51:32', '2020', '03', '16', '2020-03-16 15:51:56', 'N', '::1'),
(121, 'rib71r7f73j2u5bm9pbfj52f3j', 'admin', '2020-03-16 15:52:03', '2020', '03', '16', '2020-03-16 15:52:19', 'N', '::1'),
(122, 'n7hkvadopjcn92fs8h267el67l', 'admin', '2020-03-16 15:52:31', '2020', '03', '16', '2020-03-16 15:53:49', 'N', '::1'),
(123, 'p39uuuohhoifm5pkh0f5dbdhok', 'admin', '2020-03-16 15:54:11', '2020', '03', '16', '2020-03-17 10:09:13', 'N', '::1'),
(124, 'jg2af1uu6dllr77nah9srk4b2h', 'admin', '2020-03-17 10:10:46', '2020', '03', '17', '2020-03-17 10:17:56', 'N', '::1'),
(125, 'tsjle9r24tmajfm49meickeddk', 'admin', '2020-03-17 10:22:07', '2020', '03', '17', '2020-03-17 10:24:08', 'N', '::1'),
(126, 'kleclv7hb0vbnavjr062mvr7s4', 'admin', '2020-03-17 10:24:53', '2020', '03', '17', '2020-03-17 10:33:14', 'N', '::1'),
(127, '6um9jbg13s71o5m8tsf0t0g96t', 'admin', '2020-03-17 10:33:34', '2020', '03', '17', '2020-03-17 10:36:04', 'N', '::1'),
(128, 'qb5qi8d29431oc6d29t43g6p6e', 'admin', '2020-03-17 10:36:26', '2020', '03', '17', '2020-03-17 10:45:18', 'N', '::1'),
(129, '9nvlsv9o4qku56bijeo53ruder', 'admin', '2020-03-17 10:49:16', '2020', '03', '17', '2020-03-17 10:51:20', 'N', '::1'),
(130, 'ceefqjqd9mlvhhge28paucr0t8', 'admin', '2020-03-17 10:51:34', '2020', '03', '17', '2020-03-17 11:29:27', 'N', '::1'),
(131, 'uo9oorivlbs947ktuvfqpmikcr', 'admin', '2020-03-17 11:29:37', '2020', '03', '17', '2020-03-17 11:30:54', 'N', '::1'),
(132, 'aglrvsgdkeg38l60v0c5k8id41', 'admin', '2020-03-17 11:31:04', '2020', '03', '17', '2020-03-17 11:32:59', 'N', '::1'),
(133, '0lposcta9f38e4f3qoc9obf869', 'admin', '2020-03-17 11:33:08', '2020', '03', '17', '2020-03-20 12:23:37', 'N', '::1'),
(134, 'd2paa6ikeq4i64i25alhij9p5u', 'admin', '2020-03-20 12:24:01', '2020', '03', '20', '2020-03-20 12:26:04', 'N', '::1'),
(135, '2tt272gv4v6ugrc5l2lja82p8q', 'admin', '2020-03-20 12:26:16', '2020', '03', '20', '2020-03-20 12:29:26', 'N', '::1'),
(136, 'bvr3kbgkm2i72de4aesa8t2guv', 'admin', '2020-03-20 12:29:40', '2020', '03', '20', '2020-03-20 12:32:35', 'N', '::1'),
(137, '5fvdj9037de8rj2tu72mehfqt7', 'admin', '2020-03-20 12:32:44', '2020', '03', '20', '2020-03-20 13:12:52', 'N', '::1'),
(138, 'rvai1psgsqubs32uns86b8000f', 'admin', '2020-03-20 13:13:01', '2020', '03', '20', '2020-03-20 13:18:46', 'N', '::1'),
(139, 'j3nl26huiub4i7talovjelrnfb', 'admin', '2020-03-20 13:18:57', '2020', '03', '20', '2020-03-23 15:44:55', 'N', '::1'),
(140, 'hfljtua6jqghpe532nqpku362o', 'admin', '2020-03-23 15:45:06', '2020', '03', '23', '2020-03-30 14:18:49', 'N', '::1'),
(141, '6sf25trh7g5n9ifoi1tfkusuea', 'admin', '2020-03-30 14:18:56', '2020', '03', '30', '2020-04-03 12:36:15', 'N', '::1'),
(142, 'gk8e6mrcut74qki685j7pak9jp', 'admin', '2020-04-03 12:36:22', '2020', '04', '03', '2020-04-03 12:36:47', 'N', '::1'),
(143, 'ebb6ecls3ao6on7gj0vknl3ak5', 'admin', '2020-04-03 12:45:39', '2020', '04', '03', '2020-04-03 13:47:02', 'N', '::1'),
(144, 'u522fea2ps9c4ggn3vkh9fnj11', 'admin', '2020-04-03 13:47:20', '2020', '04', '03', '2020-04-03 13:47:59', 'N', '::1'),
(145, 'btm3oo126p7mk9gnb34d3i2gug', 'admin', '2020-04-03 13:48:14', '2020', '04', '03', '2020-04-03 13:49:05', 'N', '::1'),
(146, 'vlmer16nvlc3dl2hhncohtcnpk', 'admin', '2020-04-03 13:49:14', '2020', '04', '03', '2020-04-03 15:34:50', 'N', '::1'),
(147, 'rtacj06ra2s00eg2gtfd572t2m', 'admin', '2020-04-03 15:35:02', '2020', '04', '03', '2020-04-03 15:47:57', 'N', '::1'),
(148, '288kn6nuq9e6emf5l17qv5vo5m', 'admin', '2020-04-03 15:48:11', '2020', '04', '03', '2020-04-03 15:48:18', 'N', '::1'),
(149, 'ojrhtrq04rtj7dhjre690jkuua', 'admin', '2020-04-03 15:48:26', '2020', '04', '03', '2020-04-06 12:38:21', 'N', '::1'),
(150, 'c5n7anu7mhfg3oekgf86ai7lto', 'admin', '2020-04-06 12:38:50', '2020', '04', '06', '2020-04-06 12:39:23', 'N', '::1'),
(151, 'g7h7a0rjb25u3eqm8sljcfnuon', 'admin', '2020-04-06 12:39:39', '2020', '04', '06', '2020-04-06 12:42:33', 'N', '::1'),
(152, 'k2mt7s5es46amlvpprqdlpksat', 'admin', '2020-04-06 12:42:52', '2020', '04', '06', '2020-04-06 12:51:49', 'N', '::1'),
(153, '4ppmu1jk5b96iikobbaef99m36', 'admin', '2020-04-06 12:51:59', '2020', '04', '06', '2020-04-06 12:53:31', 'N', '::1'),
(154, '4htbsh9ac1uo6v4e8s9pjdpec0', 'admin', '2020-04-06 12:53:39', '2020', '04', '06', '2020-04-06 12:56:23', 'N', '::1'),
(155, 'idsqfgcvr0aicejubt3pbjsvlj', 'admin', '2020-04-06 12:56:30', '2020', '04', '06', '2020-04-06 13:09:08', 'N', '::1'),
(156, 'iksuijp88snseh1qr3e2us8htu', 'admin', '2020-04-06 13:09:27', '2020', '04', '06', '2020-04-15 14:32:00', 'N', '::1'),
(157, '590j6auevdlfdng1f5kchilu92', 'admin', '2020-04-15 14:32:12', '2020', '04', '15', '2020-04-15 14:39:18', 'N', '::1'),
(158, 'af1hcm1lmdpcgrisg2nch2n33h', 'admin', '2020-04-15 14:39:33', '2020', '04', '15', '2020-04-15 14:40:29', 'N', '::1'),
(159, '7n8d8std0qvvdg58h8o7b40e6g', 'admin', '2020-04-15 14:40:40', '2020', '04', '15', '2020-04-15 14:45:42', 'N', '::1'),
(160, 'vpcode80qe89vmhe3716f4q7c0', 'admin', '2020-04-15 14:46:00', '2020', '04', '15', '2020-04-15 14:48:03', 'N', '::1'),
(161, 'v9mjg86neh3up4sljlqfi7snih', 'admin', '2020-04-15 14:48:29', '2020', '04', '15', '2020-04-16 12:06:52', 'N', '::1'),
(162, 'e0qbptfjkrtakm46v1g5chbtpd', 'admin', '2020-04-16 12:07:01', '2020', '04', '16', '2020-04-16 12:10:44', 'N', '::1'),
(163, 'r4ktl5n4d9pm0ab8n4bejcn86u', 'admin', '2020-04-16 12:10:53', '2020', '04', '16', NULL, 'N', '::1'),
(164, 'bvfgefumfcf3vodshltpv8f62s', 'admin', '2020-04-17 11:30:38', '2020', '04', '17', '2020-04-17 11:41:55', 'N', '::1'),
(165, 'n0hpotusmsp3hqmqg3jqh2b3cg', 'admin', '2020-04-17 11:42:02', '2020', '04', '17', '2020-04-17 11:48:15', 'N', '::1'),
(166, 'fj09jc2qrj25gqss0smbouu1kk', 'admin', '2020-04-17 11:48:25', '2020', '04', '17', '2020-04-17 11:50:45', 'N', '::1'),
(167, '7m3oi3tlo223mvaus8kchf25ck', 'admin', '2020-04-17 11:50:50', '2020', '04', '17', '2020-04-17 11:51:11', 'N', '::1'),
(168, 'nkouvp94j868h4ive9b75c11a8', 'admin', '2020-04-17 11:51:22', '2020', '04', '17', '2020-04-17 12:08:08', 'N', '::1'),
(169, 'manht68rvdfh9d9lkigh3hj8vn', 'admin', '2020-04-17 12:08:13', '2020', '04', '17', '2020-04-17 12:55:52', 'N', '::1'),
(170, 'c8kr3h78ho9f7m60l50r3eigl8', 'admin', '2020-04-17 12:55:57', '2020', '04', '17', '2020-04-17 12:56:07', 'N', '::1'),
(171, 'dt5nb802n8fisp4jjtcdc5873s', 'admin', '2020-04-17 12:56:22', '2020', '04', '17', '2020-04-17 13:01:11', 'N', '::1'),
(172, 'j54d57lr0evhq7uuc8d3fg0qsq', 'admin', '2020-04-17 13:01:35', '2020', '04', '17', '2020-04-17 13:10:07', 'N', '::1'),
(173, 'eadptftbiu1l0kiatuud1r57c3', 'admin', '2020-04-17 13:10:21', '2020', '04', '17', '2020-04-17 13:34:18', 'N', '::1'),
(174, '4b5tvi76e3skusjip4480hlnuq', 'admin', '2020-04-17 13:34:24', '2020', '04', '17', '2020-04-17 14:11:07', 'N', '::1'),
(175, 'j88ft62krju0guss5hl136m000', 'admin', '2020-04-17 14:11:19', '2020', '04', '17', '2020-04-17 14:12:08', 'N', '::1'),
(176, 'g8eo1r8a09f8vdvsgpnmfap7of', 'admin', '2020-04-17 14:12:17', '2020', '04', '17', '2020-04-17 14:13:40', 'N', '::1'),
(177, '2oqj1cauuvma4qrbqmcld6fnfd', 'admin', '2020-04-17 14:14:07', '2020', '04', '17', '2020-04-17 14:22:52', 'N', '::1'),
(178, 'h7oe372jr2s5knrksqipuktfpn', 'admin', '2020-04-17 14:23:19', '2020', '04', '17', '2020-04-17 15:16:11', 'N', '::1'),
(179, 'm46sg8q1m6msiuc8ma4ktsm15r', 'admin', '2020-04-17 15:16:20', '2020', '04', '17', '2020-04-17 15:16:34', 'N', '::1'),
(180, '3cvfara2ga6gaeg2errf09vjv1', 'admin', '2020-04-17 15:17:15', '2020', '04', '17', '2020-04-17 15:37:00', 'N', '::1'),
(181, 'upkp4i50q1dtqtos3q9hvbvaa8', 'admin', '2020-04-17 15:37:07', '2020', '04', '17', '2020-04-17 15:49:13', 'N', '::1'),
(182, 'ffpirkhbmuqcgdtkh9m59v0ghb', 'admin', '2020-04-17 15:49:22', '2020', '04', '17', '2020-04-17 15:49:56', 'N', '::1'),
(183, '3ku6aknhh75fdaj3vgeardqav2', 'admin', '2020-04-17 15:50:03', '2020', '04', '17', '2020-04-17 15:50:43', 'N', '::1'),
(184, '7qooal7kpb6k6li1r1894t7l2c', 'admin', '2020-04-17 15:50:49', '2020', '04', '17', '2020-04-17 16:20:20', 'N', '::1'),
(185, '9vh6culos6bn8ejmr67ttueeq9', 'admin', '2020-04-17 16:26:24', '2020', '04', '17', '2020-04-17 16:34:05', 'N', '::1'),
(186, 'r6lbrqoi90ruuc0cakt2ufm2sr', 'admin', '2020-04-17 16:34:14', '2020', '04', '17', '2020-04-17 16:37:03', 'N', '::1'),
(187, 'a8lj113ajnrt11fjq7mhgbovft', 'admin', '2020-04-17 16:37:09', '2020', '04', '17', '2020-04-22 11:39:54', 'N', '::1'),
(188, 'vh8hnbrfvpbi4f0pui8u2m59kj', 'admin', '2020-04-22 11:40:03', '2020', '04', '22', '2020-04-22 12:39:52', 'N', '::1'),
(189, '4j0mhq1hin15rh66hnvas4p9ub', 'admin', '2020-04-22 12:40:01', '2020', '04', '22', '2020-04-22 12:40:26', 'N', '::1'),
(190, '6qe2elgagm7i19iqi8mgr9nii1', 'admin', '2020-04-22 12:40:31', '2020', '04', '22', '2020-04-22 13:42:58', 'N', '::1'),
(191, '92mbcbf3kaaflh0gsjegsvjpqt', 'admin', '2020-04-22 13:43:07', '2020', '04', '22', '2020-04-22 13:56:14', 'N', '::1'),
(192, '688pgll279c1qq7omca11dbm70', 'admin', '2020-04-22 13:56:20', '2020', '04', '22', '2020-04-22 13:59:43', 'N', '::1'),
(193, 't0lvlbjl23t2lu63jdfs8ttacq', 'admin', '2020-04-22 13:59:49', '2020', '04', '22', '2020-04-22 14:02:31', 'N', '::1'),
(194, 'ubj4evm01m762dcsr1chj2eur9', 'admin', '2020-04-22 14:02:41', '2020', '04', '22', '2020-04-22 14:04:54', 'N', '::1'),
(195, 'cctflijsa91mm40n6tmeodnsva', 'admin', '2020-04-22 14:05:01', '2020', '04', '22', '2020-04-22 14:07:31', 'N', '::1'),
(196, 'g310vu6k1n38tlhpmgcssmtauh', 'admin', '2020-04-22 14:07:37', '2020', '04', '22', '2020-04-22 14:07:52', 'N', '::1'),
(197, 'gm9ga93qa5ijdajuj45o54tuch', 'admin', '2020-04-22 14:08:28', '2020', '04', '22', '2020-04-22 14:16:54', 'N', '::1'),
(198, 'gu8i7uv2nrh53ftao7s3b56s45', 'admin', '2020-04-22 14:17:00', '2020', '04', '22', '2020-04-22 14:17:34', 'N', '::1'),
(199, '8asd3n2mng5q16721v2ubtn4ls', 'admin', '2020-04-22 14:17:54', '2020', '04', '22', '2020-04-22 14:19:57', 'N', '::1'),
(200, 'q1sq3eoesbva879dp9ioisbs88', 'admin', '2020-04-22 14:20:06', '2020', '04', '22', '2020-04-22 14:20:14', 'N', '::1'),
(201, '1konqeqadmo7hg4252dc3v3o5u', 'admin', '2020-04-22 14:20:22', '2020', '04', '22', '2020-04-22 14:50:25', 'N', '::1'),
(202, '33g62rmmab2hcanl6fdia48tad', 'admin', '2020-04-22 14:50:32', '2020', '04', '22', '2020-04-22 15:18:16', 'N', '::1'),
(203, 'va05t9eerubt64pkajbvq6rg9n', 'admin', '2020-04-22 15:18:28', '2020', '04', '22', '2020-04-22 15:19:07', 'N', '::1'),
(204, '3rqg2gbtp56hn70cchdd5ffuav', 'admin', '2020-04-22 15:19:20', '2020', '04', '22', '2020-04-22 15:20:44', 'N', '::1'),
(205, 'a0sllefjg5blnrdn1e9ivskq16', 'admin', '2020-04-22 15:22:26', '2020', '04', '22', '2020-04-22 15:23:23', 'N', '::1'),
(206, '7olftbj0kdgfjfjg3fopfuo3re', 'admin', '2020-04-22 15:23:40', '2020', '04', '22', '2020-04-22 15:47:24', 'N', '::1'),
(207, '6vqlo6kj27trv3dugt0gn5s4qj', 'admin', '2020-04-22 15:47:37', '2020', '04', '22', '2020-04-22 15:54:08', 'N', '::1'),
(208, 'u130pt4ka3b8fn8t83a7fsetf5', 'admin', '2020-04-22 15:54:14', '2020', '04', '22', '2020-04-22 15:54:31', 'N', '::1'),
(209, '58i8mf1q7vm2n8uoemb403mo26', 'admin', '2020-04-22 15:56:50', '2020', '04', '22', '2020-04-22 15:57:49', 'N', '::1'),
(210, 'ednujg5r3jo2nc0mgjffm6nvau', 'admin', '2020-04-22 15:59:35', '2020', '04', '22', '2020-04-22 16:09:38', 'N', '::1'),
(211, '1c5vmlobvmh53mnmc4ikqeg8m8', 'admin', '2020-04-22 16:09:47', '2020', '04', '22', '2020-04-22 16:11:17', 'N', '::1'),
(212, 'apfko3osgqf38385a1ht86al4q', 'admin', '2020-04-22 16:11:27', '2020', '04', '22', '2020-04-23 11:19:55', 'N', '::1'),
(213, '35aa1rk3i80vsquqldqu17qtb1', 'admin', '2020-04-23 11:20:06', '2020', '04', '23', '2020-04-23 11:24:09', 'N', '::1'),
(214, 'f617gqsujjahh0l2k29a7q0ngc', 'admin', '2020-04-23 11:24:26', '2020', '04', '23', '2020-04-23 11:29:33', 'N', '::1'),
(215, 'el4pl9063e0vap9vbfd43f4j8b', 'admin', '2020-04-23 11:29:40', '2020', '04', '23', '2020-04-23 11:54:42', 'N', '::1'),
(216, '8ikd74pkm7q2ienn82gtup5u31', 'user', '2020-04-23 11:54:50', '2020', '04', '23', '2020-04-23 11:58:44', 'N', '::1'),
(217, 'aepcstl4idobu657fa2i1fqom0', 'admin', '2020-04-23 13:16:35', '2020', '04', '23', '2020-04-24 15:14:05', 'N', '::1'),
(218, 'tgs3s6j2mmcpf2sissj9jp230k', 'user', '2020-04-24 15:14:17', '2020', '04', '24', '2020-04-24 15:34:02', 'N', '::1'),
(219, 'qiqnhp3h0u00nr3lcjiohn4sqc', 'admin', '2020-04-24 15:34:17', '2020', '04', '24', '2020-04-24 15:44:22', 'N', '::1'),
(220, 'nfmpcff7mha3ee1kf960qu7jd8', 'admin', '2020-04-27 11:09:28', '2020', '04', '27', '2020-05-12 11:30:27', 'N', '::1'),
(221, '1p74bb0dt3bntueuug8pen2rgj', 'admin', '2020-05-12 11:31:23', '2020', '05', '12', NULL, 'N', '::1'),
(222, '55jlluvnnerjt0d0picdd93nca', 'admin', '2020-05-22 16:15:12', '2020', '05', '22', NULL, 'N', '::1'),
(223, 'apr512vpm4hqni91btqppm56vp', 'admin', '2020-06-05 19:32:17', '2020', '06', '05', NULL, 'N', '::1'),
(224, '4l40npudkrsc27k8b3cd3ams59', 'admin', '2020-08-12 16:56:17', '2020', '08', '12', NULL, 'N', '::1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `system_change_log`
--

CREATE TABLE `system_change_log` (
  `id` int(11) NOT NULL,
  `logdate` timestamp NULL DEFAULT NULL,
  `login` text COLLATE utf8mb4_unicode_ci,
  `tablename` text COLLATE utf8mb4_unicode_ci,
  `primarykey` text COLLATE utf8mb4_unicode_ci,
  `pkvalue` text COLLATE utf8mb4_unicode_ci,
  `operation` text COLLATE utf8mb4_unicode_ci,
  `columnname` text COLLATE utf8mb4_unicode_ci,
  `oldvalue` text COLLATE utf8mb4_unicode_ci,
  `newvalue` text COLLATE utf8mb4_unicode_ci,
  `access_ip` text COLLATE utf8mb4_unicode_ci,
  `transaction_id` text COLLATE utf8mb4_unicode_ci,
  `log_trace` text COLLATE utf8mb4_unicode_ci,
  `session_id` text COLLATE utf8mb4_unicode_ci,
  `class_name` text COLLATE utf8mb4_unicode_ci,
  `php_sapi` text COLLATE utf8mb4_unicode_ci,
  `log_year` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `log_month` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `log_day` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `system_document`
--

CREATE TABLE `system_document` (
  `id` int(11) NOT NULL,
  `system_user_id` int(11) DEFAULT NULL,
  `title` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `category_id` int(11) DEFAULT NULL,
  `submission_date` date DEFAULT NULL,
  `archive_date` date DEFAULT NULL,
  `filename` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `system_document_category`
--

CREATE TABLE `system_document_category` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `system_document_category`
--

INSERT INTO `system_document_category` (`id`, `name`) VALUES
(1, 'Documentação');

-- --------------------------------------------------------

--
-- Estrutura da tabela `system_document_group`
--

CREATE TABLE `system_document_group` (
  `id` int(11) NOT NULL,
  `document_id` int(11) DEFAULT NULL,
  `system_group_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `system_document_user`
--

CREATE TABLE `system_document_user` (
  `id` int(11) NOT NULL,
  `document_id` int(11) DEFAULT NULL,
  `system_user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `system_group`
--

CREATE TABLE `system_group` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `system_group`
--

INSERT INTO `system_group` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'Standard');

-- --------------------------------------------------------

--
-- Estrutura da tabela `system_group_program`
--

CREATE TABLE `system_group_program` (
  `id` int(11) NOT NULL,
  `system_group_id` int(11) DEFAULT NULL,
  `system_program_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `system_group_program`
--

INSERT INTO `system_group_program` (`id`, `system_group_id`, `system_program_id`) VALUES
(12, 2, 10),
(13, 2, 12),
(14, 2, 13),
(15, 2, 16),
(16, 2, 17),
(17, 2, 18),
(18, 2, 19),
(19, 2, 20),
(21, 2, 22),
(22, 2, 23),
(23, 2, 24),
(24, 2, 25),
(29, 2, 30),
(41, 2, 7),
(46, 1, 1),
(47, 1, 2),
(48, 1, 3),
(49, 1, 4),
(50, 1, 5),
(51, 1, 6),
(52, 1, 8),
(53, 1, 9),
(54, 1, 11),
(55, 1, 14),
(56, 1, 15),
(57, 1, 21),
(58, 1, 26),
(59, 1, 27),
(60, 1, 28),
(61, 1, 29),
(62, 1, 31),
(63, 1, 32),
(64, 1, 33),
(65, 1, 34),
(66, 1, 35),
(67, 1, 36),
(68, 1, 37),
(69, 1, 38),
(70, 1, 39),
(71, 1, 40),
(74, 1, 43),
(75, 2, 43),
(76, 1, 41),
(77, 2, 41),
(78, 1, 42);

-- --------------------------------------------------------

--
-- Estrutura da tabela `system_message`
--

CREATE TABLE `system_message` (
  `id` int(11) NOT NULL,
  `system_user_id` int(11) DEFAULT NULL,
  `system_user_to_id` int(11) DEFAULT NULL,
  `subject` text COLLATE utf8mb4_unicode_ci,
  `message` text COLLATE utf8mb4_unicode_ci,
  `dt_message` text COLLATE utf8mb4_unicode_ci,
  `checked` char(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `system_notification`
--

CREATE TABLE `system_notification` (
  `id` int(11) NOT NULL,
  `system_user_id` int(11) DEFAULT NULL,
  `system_user_to_id` int(11) DEFAULT NULL,
  `subject` text COLLATE utf8mb4_unicode_ci,
  `message` text COLLATE utf8mb4_unicode_ci,
  `dt_message` text COLLATE utf8mb4_unicode_ci,
  `action_url` text COLLATE utf8mb4_unicode_ci,
  `action_label` text COLLATE utf8mb4_unicode_ci,
  `icon` text COLLATE utf8mb4_unicode_ci,
  `checked` char(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `system_preference`
--

CREATE TABLE `system_preference` (
  `id` text COLLATE utf8mb4_unicode_ci,
  `value` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `system_program`
--

CREATE TABLE `system_program` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `controller` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `system_program`
--

INSERT INTO `system_program` (`id`, `name`, `controller`) VALUES
(1, 'System Group Form', 'SystemGroupForm'),
(2, 'System Group List', 'SystemGroupList'),
(3, 'System Program Form', 'SystemProgramForm'),
(4, 'System Program List', 'SystemProgramList'),
(5, 'System User Form', 'SystemUserForm'),
(6, 'System User List', 'SystemUserList'),
(7, 'Common Page', 'CommonPage'),
(8, 'System PHP Info', 'SystemPHPInfoView'),
(9, 'System ChangeLog View', 'SystemChangeLogView'),
(10, 'Welcome View', 'WelcomeView'),
(11, 'System Sql Log', 'SystemSqlLogList'),
(12, 'System Profile View', 'SystemProfileView'),
(13, 'System Profile Form', 'SystemProfileForm'),
(14, 'System SQL Panel', 'SystemSQLPanel'),
(15, 'System Access Log', 'SystemAccessLogList'),
(16, 'System Message Form', 'SystemMessageForm'),
(17, 'System Message List', 'SystemMessageList'),
(18, 'System Message Form View', 'SystemMessageFormView'),
(19, 'System Notification List', 'SystemNotificationList'),
(20, 'System Notification Form View', 'SystemNotificationFormView'),
(21, 'System Document Category List', 'SystemDocumentCategoryFormList'),
(22, 'System Document Form', 'SystemDocumentForm'),
(23, 'System Document Upload Form', 'SystemDocumentUploadForm'),
(24, 'System Document List', 'SystemDocumentList'),
(25, 'System Shared Document List', 'SystemSharedDocumentList'),
(26, 'System Unit Form', 'SystemUnitForm'),
(27, 'System Unit List', 'SystemUnitList'),
(28, 'System Access stats', 'SystemAccessLogStats'),
(29, 'System Preference form', 'SystemPreferenceForm'),
(30, 'System Support form', 'SystemSupportForm'),
(31, 'System PHP Error', 'SystemPHPErrorLogView'),
(32, 'System Database Browser', 'SystemDatabaseExplorer'),
(33, 'System Table List', 'SystemTableList'),
(34, 'System Data Browser', 'SystemDataBrowser'),
(35, 'System Menu Editor', 'SystemMenuEditor'),
(36, 'System Request Log', 'SystemRequestLogList'),
(37, 'System Request Log View', 'SystemRequestLogView'),
(38, 'System Administration Dashboard', 'SystemAdministrationDashboard'),
(39, 'System Log Dashboard', 'SystemLogDashboard'),
(40, 'System Session dump', 'SystemSessionDumpView'),
(41, 'Complete Datagrid View', 'CompleteDataGridView'),
(42, 'Population Form View', 'PopulationFormView'),
(43, 'Tabular Report View', 'TabularReportView');

-- --------------------------------------------------------

--
-- Estrutura da tabela `system_request_log`
--

CREATE TABLE `system_request_log` (
  `id` int(11) NOT NULL,
  `endpoint` text COLLATE utf8mb4_unicode_ci,
  `logdate` text COLLATE utf8mb4_unicode_ci,
  `log_year` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `log_month` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `log_day` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `session_id` text COLLATE utf8mb4_unicode_ci,
  `login` text COLLATE utf8mb4_unicode_ci,
  `access_ip` text COLLATE utf8mb4_unicode_ci,
  `class_name` text COLLATE utf8mb4_unicode_ci,
  `http_host` text COLLATE utf8mb4_unicode_ci,
  `server_port` text COLLATE utf8mb4_unicode_ci,
  `request_uri` text COLLATE utf8mb4_unicode_ci,
  `request_method` text COLLATE utf8mb4_unicode_ci,
  `query_string` text COLLATE utf8mb4_unicode_ci,
  `request_headers` text COLLATE utf8mb4_unicode_ci,
  `request_body` text COLLATE utf8mb4_unicode_ci,
  `request_duration` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `system_sql_log`
--

CREATE TABLE `system_sql_log` (
  `id` int(11) NOT NULL,
  `logdate` timestamp NULL DEFAULT NULL,
  `login` text COLLATE utf8mb4_unicode_ci,
  `database_name` text COLLATE utf8mb4_unicode_ci,
  `sql_command` text COLLATE utf8mb4_unicode_ci,
  `statement_type` text COLLATE utf8mb4_unicode_ci,
  `access_ip` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_id` text COLLATE utf8mb4_unicode_ci,
  `log_trace` text COLLATE utf8mb4_unicode_ci,
  `session_id` text COLLATE utf8mb4_unicode_ci,
  `class_name` text COLLATE utf8mb4_unicode_ci,
  `php_sapi` text COLLATE utf8mb4_unicode_ci,
  `request_id` text COLLATE utf8mb4_unicode_ci,
  `log_year` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `log_month` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `log_day` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `system_unit`
--

CREATE TABLE `system_unit` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `connection_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `system_unit`
--

INSERT INTO `system_unit` (`id`, `name`, `connection_name`) VALUES
(1, 'Unit A', 'unit_a'),
(2, 'Unit B', 'unit_b');

-- --------------------------------------------------------

--
-- Estrutura da tabela `system_user`
--

CREATE TABLE `system_user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `frontpage_id` int(11) DEFAULT NULL,
  `system_unit_id` int(11) DEFAULT NULL,
  `active` char(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `system_user`
--

INSERT INTO `system_user` (`id`, `name`, `login`, `password`, `email`, `frontpage_id`, `system_unit_id`, `active`) VALUES
(1, 'Administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@admin.net', 10, NULL, 'Y'),
(2, 'User', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user@user.net', 7, NULL, 'Y'),
(3, 'teste', 'teste', '698dc19d489c4e4db73e28a713eab07b', 'teste@teste.net', 10, NULL, 'Y');

-- --------------------------------------------------------

--
-- Estrutura da tabela `system_user_group`
--

CREATE TABLE `system_user_group` (
  `id` int(11) NOT NULL,
  `system_user_id` int(11) DEFAULT NULL,
  `system_group_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `system_user_group`
--

INSERT INTO `system_user_group` (`id`, `system_user_id`, `system_group_id`) VALUES
(2, 2, 2),
(4, 3, 2),
(5, 1, 1),
(6, 1, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `system_user_program`
--

CREATE TABLE `system_user_program` (
  `id` int(11) NOT NULL,
  `system_user_id` int(11) DEFAULT NULL,
  `system_program_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `system_user_program`
--

INSERT INTO `system_user_program` (`id`, `system_user_id`, `system_program_id`) VALUES
(1, 2, 7);

-- --------------------------------------------------------

--
-- Estrutura da tabela `system_user_unit`
--

CREATE TABLE `system_user_unit` (
  `id` int(11) NOT NULL,
  `system_user_id` int(11) DEFAULT NULL,
  `system_unit_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `system_user_unit`
--

INSERT INTO `system_user_unit` (`id`, `system_user_id`, `system_unit_id`) VALUES
(3, 2, 1),
(4, 2, 2),
(5, 3, 1),
(6, 1, 1),
(7, 1, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_city`
--

CREATE TABLE `tb_city` (
  `tb_city_id` int(3) NOT NULL,
  `tb_city_name` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `tb_city`
--

INSERT INTO `tb_city` (`tb_city_id`, `tb_city_name`) VALUES
(240000, 'RN'),
(240010, 'Acari'),
(240020, 'Açu'),
(240030, 'Afonso Bezerra'),
(240040, 'Água Nova'),
(240050, 'Alexandria'),
(240060, 'Almino Afonso'),
(240070, 'Alto do Rodrigues'),
(240080, 'Angicos'),
(240090, 'Antônio Martins'),
(240100, 'Apodi'),
(240110, 'Areia Branca'),
(240120, 'Arês'),
(240130, 'Augusto Severo'),
(240140, 'Baía Formosa'),
(240145, 'Baraúna'),
(240150, 'Barcelona'),
(240160, 'Bento Fernandes'),
(240165, 'Bodó'),
(240170, 'Bom Jesus'),
(240180, 'Brejinho'),
(240185, 'Caiçara do Norte'),
(240190, 'Caiçara do Rio do Vento'),
(240200, 'Caicó'),
(240210, 'Campo Redondo'),
(240220, 'Canguaretama'),
(240230, 'Caraúbas'),
(240240, 'Carnaúba Dos Dantas'),
(240250, 'Carnaubais'),
(240260, 'Ceará-mirim'),
(240270, 'Cerro Corá'),
(240280, 'Coronel Ezequiel'),
(240290, 'Coronel João Pessoa'),
(240300, 'Cruzeta'),
(240310, 'Currais Novos'),
(240320, 'Doutor Severiano'),
(240325, 'Parelhas'),
(240330, 'Parnamirim'),
(240340, 'Encanto'),
(240350, 'Equador'),
(240360, 'Espírito Santo'),
(240370, 'Extremoz'),
(240375, 'Felipe Guerra'),
(240380, 'Fernando Pedroza'),
(240390, 'Florânia'),
(240400, 'Francisco Dantas'),
(240410, 'Frutuoso Gomes'),
(240420, 'Galinhos'),
(240430, 'Goianinha'),
(240440, 'Governador Dix-sept Rosado'),
(240450, 'Grossos'),
(240460, 'Guamaré'),
(240470, 'Ielmo Marinho'),
(240480, 'Ipanguaçu'),
(240485, 'Ipueira'),
(240490, 'Itajá'),
(240500, 'Itaú'),
(240510, 'Jaçanã'),
(240520, 'Jandaíra'),
(240530, 'Janduís'),
(240540, 'Januário Cicco'),
(240550, 'Japi'),
(240560, 'Jardim de Angicos'),
(240570, 'Jardim de Piranhas'),
(240580, 'Jardim do Seridó'),
(240590, 'João Câmara'),
(240600, 'João Dias'),
(240610, 'José da Penha'),
(240615, 'Jucurutu'),
(240620, 'Jundiá'),
(240630, 'Lagoa D´anta'),
(240640, 'Lagoa de Pedras'),
(240650, 'Lagoa de Velhos'),
(240660, 'Lagoa Nova'),
(240670, 'Lagoa Salgada'),
(240680, 'Lajes'),
(240690, 'Lajes Pintadas'),
(240700, 'Lucrécia'),
(240710, 'Luís Gomes'),
(240720, 'Macaíba'),
(240725, 'Macau'),
(240730, 'Major Sales'),
(240740, 'Marcelino Vieira'),
(240750, 'Martins'),
(240760, 'Maxaranguape'),
(240770, 'Messias Targino'),
(240780, 'Montanhas'),
(240790, 'Monte Alegre'),
(240800, 'Monte Das Gameleiras'),
(240810, 'Mossoró'),
(240820, 'Natal'),
(240830, 'Nísia Floresta'),
(240840, 'Nova Cruz'),
(240850, 'Olho-d´água do Borges'),
(240860, 'Ouro Branco'),
(240870, 'Paraná'),
(240880, 'Paraú'),
(240890, 'Parazinho'),
(240895, 'Riacho da Cruz'),
(240910, 'Rio do Fogo'),
(240920, 'Passa e Fica'),
(240930, 'Passagem'),
(240933, 'Tibau'),
(240940, 'Patu'),
(240950, 'Santa Maria'),
(240960, 'Pau Dos Ferros'),
(240970, 'Pedra Grande'),
(240980, 'Pedra Preta'),
(240990, 'Pedro Avelino'),
(241000, 'Pedro Velho'),
(241010, 'Pendências'),
(241020, 'Pilões'),
(241025, 'Poço Branco'),
(241030, 'Senador Elói de Souza'),
(241040, 'Portalegre'),
(241050, 'Porto do Mangue'),
(241060, 'Presidente Juscelino'),
(241070, 'Pureza'),
(241080, 'Rafael Fernandes'),
(241090, 'Rafael Godeiro'),
(241100, 'Riacho de Santana'),
(241105, 'Tenente Laurentino Cruz'),
(241110, 'Riachuelo'),
(241120, 'Rodolfo Fernandes'),
(241140, 'Ruy Barbosa'),
(241142, 'Santa Cruz'),
(241150, 'Santana do Matos'),
(241160, 'Santana do Seridó'),
(241170, 'Santo Antônio'),
(241180, 'São Bento do Norte'),
(241190, 'São Bento do Trairí'),
(241200, 'São Fernando'),
(241210, 'São Francisco do Oeste'),
(241220, 'São Gonçalo do Amarante'),
(241230, 'São João do Sabugi'),
(241240, 'São José de Mipibu'),
(241250, 'São José do Campestre'),
(241255, 'São José do Seridó'),
(241260, 'São Miguel'),
(241270, 'São Miguel do Gostoso'),
(241280, 'São Paulo do Potengi'),
(241290, 'São Pedro'),
(241300, 'São Rafael'),
(241310, 'São Tomé'),
(241320, 'São Vicente'),
(241330, 'Senador Georgino Avelino'),
(241335, 'Serra de São Bento'),
(241340, 'Serra do Mel'),
(241350, 'Serra Negra do Norte'),
(241355, 'Serrinha'),
(241360, 'Serrinha Dos Pintos'),
(241370, 'Severiano Melo'),
(241380, 'Sítio Novo'),
(241390, 'Taboleiro Grande'),
(241400, 'Taipu'),
(241410, 'Tangará'),
(241415, 'Tenente Ananias'),
(241420, 'Tibau do Sul'),
(241430, 'Timbaúba Dos Batistas'),
(241440, 'Touros'),
(241445, 'Triunfo Potiguar'),
(241450, 'Umarizal'),
(241460, 'Upanema'),
(241470, 'Várzea'),
(241475, 'Venha-ver'),
(241480, 'Vera Cruz'),
(241490, 'Viçosa'),
(241500, 'Vila Flor');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_data`
--

CREATE TABLE `tb_data` (
  `tb_data_id` int(10) NOT NULL,
  `tb_data_tb_city_id` int(3) NOT NULL,
  `tb_data_year` int(4) NOT NULL,
  `tb_data_pop` int(10) NOT NULL,
  `tb_data_born` int(10) NOT NULL,
  `tb_data_hep_vulne` int(10) NOT NULL DEFAULT '0',
  `tb_data_hepB_sem` int(10) NOT NULL DEFAULT '0',
  `tb_data_hepB_com` int(10) NOT NULL DEFAULT '0',
  `tb_data_hepC_pop` int(10) NOT NULL DEFAULT '0',
  `tb_data_hepC_sem` int(10) NOT NULL DEFAULT '0',
  `tb_data_hepC_com` int(10) NOT NULL DEFAULT '0',
  `tb_data_hans_pop` int(10) NOT NULL DEFAULT '0',
  `tb_data_hans_pauci` int(10) NOT NULL DEFAULT '0',
  `tb_data_hans_multi` int(10) NOT NULL DEFAULT '0',
  `tb_data_hans_prev` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `tb_data`
--

INSERT INTO `tb_data` (`tb_data_id`, `tb_data_tb_city_id`, `tb_data_year`, `tb_data_pop`, `tb_data_born`, `tb_data_hep_vulne`, `tb_data_hepB_sem`, `tb_data_hepB_com`, `tb_data_hepC_pop`, `tb_data_hepC_sem`, `tb_data_hepC_com`, `tb_data_hans_pop`, `tb_data_hans_pauci`, `tb_data_hans_multi`, `tb_data_hans_prev`) VALUES
(1, 240000, 2018, 3479010, 46222, 900, 30, 0, 0, 0, 0, 0, 0, 0, 0),
(2, 240010, 2018, 11152, 105, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 240020, 2018, 57644, 743, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 240030, 2018, 11041, 111, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 240040, 2018, 3230, 38, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(6, 240050, 2018, 13602, 170, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(7, 240060, 2018, 4761, 50, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(8, 240070, 2018, 14326, 179, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(9, 240080, 2018, 11724, 117, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(10, 240090, 2018, 7137, 74, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(11, 240100, 2018, 35814, 369, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(12, 240110, 2018, 27162, 373, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(13, 240120, 2018, 14192, 185, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(14, 240130, 2018, 9638, 103, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(15, 240140, 2018, 9218, 127, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(16, 240145, 2018, 27994, 397, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(17, 240150, 2018, 4002, 51, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(18, 240160, 2018, 5469, 66, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(19, 240165, 2018, 2250, 32, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(20, 240170, 2018, 10152, 124, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(21, 240180, 2018, 12609, 164, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(22, 240185, 2018, 6537, 75, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(23, 240190, 2018, 3652, 48, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(24, 240200, 2018, 67554, 686, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(25, 240210, 2018, 11142, 135, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(26, 240220, 2018, 33999, 539, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(27, 240230, 2018, 20443, 244, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(28, 240240, 2018, 8119, 88, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(29, 240250, 2018, 10651, 114, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(30, 240260, 2018, 73099, 1131, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(31, 240270, 2018, 11178, 124, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(32, 240280, 2018, 5508, 71, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(33, 240290, 2018, 4908, 52, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(34, 240300, 2018, 8014, 94, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(35, 240310, 2018, 44664, 506, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(36, 240320, 2018, 7080, 102, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(37, 240330, 2018, 5608, 97, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(38, 240340, 2018, 6036, 51, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(39, 240350, 2018, 10527, 98, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(40, 240360, 2018, 28222, 569, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(41, 240370, 2018, 5972, 66, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(42, 240375, 2018, 3039, 40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(43, 240380, 2018, 9121, 108, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(44, 240390, 2018, 2836, 45, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(45, 240400, 2018, 4095, 53, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(46, 240410, 2018, 2726, 34, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(47, 240420, 2018, 25980, 495, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(48, 240430, 2018, 12997, 137, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(49, 240440, 2018, 10302, 125, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(50, 240450, 2018, 15349, 283, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(51, 240460, 2018, 13628, 132, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(52, 240470, 2018, 15354, 230, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(53, 240480, 2018, 2228, 25, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(54, 240485, 2018, 7501, 99, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(55, 240490, 2018, 5858, 70, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(56, 240500, 2018, 9026, 90, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(57, 240510, 2018, 6863, 88, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(58, 240520, 2018, 5289, 55, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(59, 240530, 2018, 10087, 144, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(60, 240540, 2018, 5117, 86, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(61, 240550, 2018, 2617, 35, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(62, 240560, 2018, 14730, 144, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(63, 240570, 2018, 12395, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(64, 240580, 2018, 34747, 506, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(65, 240590, 2018, 2655, 35, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(66, 240600, 2018, 5957, 64, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(67, 240610, 2018, 18274, 215, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(68, 240615, 2018, 3873, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(69, 240620, 2018, 6728, 88, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(70, 240630, 2018, 7503, 94, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(71, 240640, 2018, 2731, 35, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(72, 240650, 2018, 15477, 216, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(73, 240660, 2018, 8192, 131, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(74, 240670, 2018, 11208, 109, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(75, 240680, 2018, 4755, 83, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(76, 240690, 2018, 3966, 27, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(77, 240700, 2018, 10086, 164, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(78, 240710, 2018, 79743, 1052, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(79, 240720, 2018, 31584, 335, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(80, 240725, 2018, 3978, 44, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(81, 240730, 2018, 8358, 102, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(82, 240740, 2018, 8692, 89, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(83, 240750, 2018, 12194, 128, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(84, 240760, 2018, 4568, 62, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(85, 240770, 2018, 11295, 174, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(86, 240780, 2018, 22239, 281, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(87, 240790, 2018, 2127, 42, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(88, 240800, 2018, 294076, 3941, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(89, 240810, 2018, 877640, 11493, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(90, 240820, 2018, 27260, 399, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(91, 240830, 2018, 37233, 497, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(92, 240840, 2018, 4272, 36, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(93, 240850, 2018, 4812, 61, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(94, 240860, 2018, 4232, 60, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(95, 240870, 2018, 3787, 43, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(96, 240880, 2018, 5201, 83, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(97, 240890, 2018, 21408, 279, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(98, 240325, 2018, 255793, 3898, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(99, 240910, 2018, 13076, 155, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(100, 240920, 2018, 3075, 46, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(101, 240930, 2018, 12701, 140, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(102, 240940, 2018, 30183, 413, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(103, 240950, 2018, 3275, 52, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(104, 240960, 2018, 2478, 31, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(105, 240970, 2018, 6780, 73, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(106, 240980, 2018, 14767, 183, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(107, 240990, 2018, 14984, 149, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(108, 241000, 2018, 3806, 39, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(109, 241010, 2018, 15294, 165, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(110, 241020, 2018, 7827, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(111, 241025, 2018, 6765, 90, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(112, 241040, 2018, 9516, 136, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(113, 241050, 2018, 5067, 61, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(114, 241060, 2018, 3194, 30, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(115, 241070, 2018, 3543, 29, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(116, 241080, 2018, 4209, 55, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(117, 241090, 2018, 8034, 94, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(118, 240895, 2018, 10789, 177, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(119, 241100, 2018, 4472, 66, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(120, 241110, 2018, 3608, 39, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(121, 241120, 2018, 39355, 563, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(122, 240933, 2018, 5480, 68, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(123, 241140, 2018, 12954, 108, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(124, 241142, 2018, 2670, 29, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(125, 241150, 2018, 23988, 272, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(126, 241160, 2018, 2778, 44, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(127, 241170, 2018, 4401, 61, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(128, 241180, 2018, 3573, 37, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(129, 241190, 2018, 4200, 56, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(130, 241200, 2018, 101102, 1693, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(131, 241210, 2018, 6179, 67, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(132, 241220, 2018, 43640, 721, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(133, 241230, 2018, 12833, 147, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(134, 241240, 2018, 4602, 59, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(135, 241250, 2018, 23380, 432, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(136, 241255, 2018, 9531, 55, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(137, 241260, 2018, 17436, 203, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(138, 241270, 2018, 6014, 77, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(139, 241280, 2018, 8212, 70, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(140, 241290, 2018, 11057, 117, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(141, 241300, 2018, 6397, 63, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(142, 241310, 2018, 6044, 81, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(143, 241320, 2018, 4395, 67, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(144, 241030, 2018, 10266, 160, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(145, 241330, 2018, 5774, 87, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(146, 241335, 2018, 11790, 166, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(147, 241340, 2018, 8065, 82, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(148, 241350, 2018, 6281, 86, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(149, 241355, 2018, 4784, 44, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(150, 241360, 2018, 2799, 87, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(151, 241370, 2018, 5481, 51, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(152, 241380, 2018, 2545, 37, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(153, 241390, 2018, 12261, 132, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(154, 241400, 2018, 15581, 209, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(155, 241410, 2018, 10715, 132, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(156, 241415, 2018, 5883, 104, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(157, 241105, 2018, 4071, 71, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(158, 241420, 2018, 13916, 234, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(159, 241430, 2018, 2407, 23, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(160, 241440, 2018, 33734, 479, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(161, 241445, 2018, 3259, 53, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(162, 241450, 2018, 10591, 108, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(163, 241460, 2018, 14516, 144, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(164, 241470, 2018, 5485, 57, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(165, 241475, 2018, 4149, 44, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(166, 241480, 2018, 12323, 169, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(167, 241490, 2018, 1712, 15, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(168, 241500, 2018, 3146, 62, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `system_access_log`
--
ALTER TABLE `system_access_log`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `system_change_log`
--
ALTER TABLE `system_change_log`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `system_document`
--
ALTER TABLE `system_document`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `system_document_category`
--
ALTER TABLE `system_document_category`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `system_document_group`
--
ALTER TABLE `system_document_group`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `system_document_user`
--
ALTER TABLE `system_document_user`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `system_group`
--
ALTER TABLE `system_group`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `system_group_program`
--
ALTER TABLE `system_group_program`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sys_group_program_program_idx` (`system_program_id`),
  ADD KEY `sys_group_program_group_idx` (`system_group_id`);

--
-- Índices para tabela `system_message`
--
ALTER TABLE `system_message`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `system_notification`
--
ALTER TABLE `system_notification`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `system_program`
--
ALTER TABLE `system_program`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `system_request_log`
--
ALTER TABLE `system_request_log`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `system_sql_log`
--
ALTER TABLE `system_sql_log`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `system_unit`
--
ALTER TABLE `system_unit`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `system_user`
--
ALTER TABLE `system_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sys_user_program_idx` (`frontpage_id`);

--
-- Índices para tabela `system_user_group`
--
ALTER TABLE `system_user_group`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sys_user_group_group_idx` (`system_group_id`),
  ADD KEY `sys_user_group_user_idx` (`system_user_id`);

--
-- Índices para tabela `system_user_program`
--
ALTER TABLE `system_user_program`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sys_user_program_program_idx` (`system_program_id`),
  ADD KEY `sys_user_program_user_idx` (`system_user_id`);

--
-- Índices para tabela `system_user_unit`
--
ALTER TABLE `system_user_unit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `system_user_id` (`system_user_id`),
  ADD KEY `system_unit_id` (`system_unit_id`);

--
-- Índices para tabela `tb_city`
--
ALTER TABLE `tb_city`
  ADD PRIMARY KEY (`tb_city_id`);

--
-- Índices para tabela `tb_data`
--
ALTER TABLE `tb_data`
  ADD PRIMARY KEY (`tb_data_id`),
  ADD KEY `FK_ID` (`tb_data_tb_city_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_data`
--
ALTER TABLE `tb_data`
  MODIFY `tb_data_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `system_group_program`
--
ALTER TABLE `system_group_program`
  ADD CONSTRAINT `system_group_program_ibfk_1` FOREIGN KEY (`system_group_id`) REFERENCES `system_group` (`id`),
  ADD CONSTRAINT `system_group_program_ibfk_2` FOREIGN KEY (`system_program_id`) REFERENCES `system_program` (`id`);

--
-- Limitadores para a tabela `system_user`
--
ALTER TABLE `system_user`
  ADD CONSTRAINT `system_user_ibfk_1` FOREIGN KEY (`frontpage_id`) REFERENCES `system_program` (`id`);

--
-- Limitadores para a tabela `system_user_group`
--
ALTER TABLE `system_user_group`
  ADD CONSTRAINT `system_user_group_ibfk_1` FOREIGN KEY (`system_user_id`) REFERENCES `system_user` (`id`),
  ADD CONSTRAINT `system_user_group_ibfk_2` FOREIGN KEY (`system_group_id`) REFERENCES `system_group` (`id`);

--
-- Limitadores para a tabela `system_user_program`
--
ALTER TABLE `system_user_program`
  ADD CONSTRAINT `system_user_program_ibfk_1` FOREIGN KEY (`system_user_id`) REFERENCES `system_user` (`id`),
  ADD CONSTRAINT `system_user_program_ibfk_2` FOREIGN KEY (`system_program_id`) REFERENCES `system_program` (`id`);

--
-- Limitadores para a tabela `system_user_unit`
--
ALTER TABLE `system_user_unit`
  ADD CONSTRAINT `system_user_unit_ibfk_1` FOREIGN KEY (`system_user_id`) REFERENCES `system_user` (`id`),
  ADD CONSTRAINT `system_user_unit_ibfk_2` FOREIGN KEY (`system_unit_id`) REFERENCES `system_unit` (`id`);

--
-- Limitadores para a tabela `tb_data`
--
ALTER TABLE `tb_data`
  ADD CONSTRAINT `FK_ID` FOREIGN KEY (`tb_data_tb_city_id`) REFERENCES `tb_city` (`tb_city_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
