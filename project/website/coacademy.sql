-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2021 at 04:19 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coacademy`
--

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `ID` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `result` int(10) NOT NULL,
  `total` int(10) NOT NULL,
  `op` varchar(20) NOT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`ID`, `username`, `result`, `total`, `op`, `subject`, `datetime`) VALUES
(1, 'waqas', 10, 10, 'addition', 'math', '2021-07-25 21:17:15'),
(2, 'waqas', 7, 10, 'addition', 'math', '2021-07-25 21:21:10'),
(8, 'qasim', 10, 10, 'addition', 'math', '2021-07-26 09:38:26'),
(9, 'qasim', 2, 10, 'addition', 'math', '2021-07-26 09:39:32'),
(10, 'waqas', 10, 10, 'addition', 'math', '2021-07-26 11:04:19'),
(14, 'waqas', 8, 10, 'spelling', 'eng', '2021-07-26 12:19:08'),
(16, 'waqas', 1, 10, 'synonyms', 'eng', '2021-07-26 13:29:07'),
(17, 'waqas', 10, 10, 'addition', 'math', '2021-07-26 13:57:18'),
(18, 'waqas', 10, 10, 'subtraction', 'math', '2021-07-26 13:58:02'),
(19, 'qasim', 8, 10, 'addition', 'math', '2021-07-26 14:07:43');

-- --------------------------------------------------------
CREATE TABLE `lessons` (
  `lesson` varchar(255) NOT NULL,
  `content` text NOT NULL,
   `url` text NOT NULL
) ;

INSERT INTO `lessons` (`lesson`, `content`,`url`) VALUES 
('Addition', 'The addition is taking two or more numbers and adding them together, that is, it is the total sum of 2 or more numbers.', "https://www.youtube.com/embed/-ou9VvyJNOY"),
('Subtraction', 'In math, to subtract means to take away from a group or a number of things. 
When we subtract, the number of things in the group reduce or become less.', "https://www.youtube.com/embed/rqiu_xcvSk4" ),
('Multiplication', 'Multiplication, one of the four basic operations of arithmetic, gives the result of combining groups of equal sizes.', "https://www.youtube.com/embed/BZ41Fh2MEVw"),
('Division', 'he division is a method of distributing a group of things into equal parts. It is one of the four basic operations of arithmetic, which gives a fair result of sharing. 
The division is an  of multiplication. If 3 groups of 4 make 12 in multiplication; 12 divided into 3 equal groups give 4 in each group in division.
The main goal of the division is to see how many equal groups or how many in each group when sharing fairly.
For example:
There are 16 balls and 4 boxes, how to put 16 balls into four equal sized boxes?', "https://www.youtube.com/embed/gT0HFbA1Mow"),
('Modulo', 'Modulo is a math operation that finds the remainder when one integer is divided by another. In writing, it is frequently abbreviated as mod, or represented by the symbol %.',"https://www.youtube.com/embed/FApcjdAhnrY"),
('Synonyms', 'A synonym is a word, morpheme, or phrase that means exactly or nearly the same as another word, morpheme, or phrase in the same language.',"https://www.youtube.com/embed/hFFW9zKJ5os" ),
('Spelling', 'Spelling is a set of conventions that regulate the way of using graphemes (writing system) to represent a language in its written form.', "https://www.youtube.com/embed/R71_Ystp51c");


--
-- Table structure for table `spelling`
--

CREATE TABLE `spelling` (
  `ID` int(11) NOT NULL,
  `word` varchar(100) NOT NULL,
  `difficulty` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spelling`
--

INSERT INTO `spelling` (`ID`, `word`, `difficulty`) VALUES
(1, 'able', 'easy'),
(2, 'actor', 'medium'),
(3, 'afternoon', 'hard'),
(4, 'along', 'medium'),
(5, 'annoyance', 'hard'),
(6, 'apply', 'medium'),
(7, 'ask', 'easy'),
(8, 'awake', 'medium'),
(9, 'base', 'easy'),
(10, 'become', 'medium'),
(11, 'besides', 'hard'),
(12, 'block', 'medium'),
(13, 'bowl', 'easy'),
(14, 'bring', 'medium'),
(15, 'butter', 'medium'),
(16, 'card', 'easy'),
(17, 'chain', 'medium'),
(18, 'choice', 'medium'),
(19, 'clock', 'medium'),
(20, 'comb', 'easy'),
(21, 'completion', 'hard'),
(22, 'conquest', 'hard'),
(23, 'cost', 'easy'),
(24, 'creep', 'medium'),
(25, 'curse', 'medium'),
(26, 'dead', 'easy'),
(27, 'defend', 'medium'),
(28, 'desert', 'medium'),
(29, 'dine', 'easy'),
(30, 'disgust', 'hard'),
(31, 'donkey', 'medium'),
(32, 'dull', 'easy'),
(33, 'effect', 'medium'),
(34, 'enclose', 'hard'),
(35, 'essential', 'hard'),
(36, 'excess', 'medium'),
(37, 'extend', 'medium'),
(38, 'familiar', 'hard'),
(39, 'feel', 'easy'),
(40, 'fish', 'easy'),
(41, 'food', 'easy'),
(42, 'free', 'easy'),
(43, 'furnish', 'hard'),
(44, 'gift', 'easy'),
(45, 'grass', 'medium'),
(46, 'habit', 'medium'),
(47, 'hasten', 'medium'),
(48, 'heighten', 'hard'),
(49, 'home', 'easy'),
(50, 'human', 'medium'),
(51, 'imitation', 'hard'),
(52, 'inquire', 'hard'),
(53, 'introduction', 'hard'),
(54, 'jump', 'easy'),
(55, 'ladder', 'medium'),
(56, 'leaf', 'easy'),
(57, 'library', 'hard'),
(58, 'live', 'easy'),
(59, 'low', 'easy'),
(60, 'many', 'easy'),
(61, 'meat', 'easy'),
(62, 'might', 'medium'),
(63, 'modest', 'medium'),
(64, 'mouse', 'medium'),
(65, 'necessary', 'hard'),
(66, 'night', 'medium'),
(67, 'nuisance', 'hard'),
(68, 'office', 'medium'),
(69, 'oppose', 'medium'),
(70, 'overcome', 'hard'),
(71, 'particle', 'hard'),
(72, 'peculiar', 'hard'),
(73, 'pick', 'easy'),
(74, 'please', 'medium'),
(75, 'position', 'hard'),
(76, 'preference', 'hard'),
(77, 'prize', 'medium'),
(78, 'protect', 'hard'),
(79, 'quantity', 'hard'),
(80, 'rate', 'easy'),
(81, 'redden', 'medium'),
(82, 'remark', 'medium'),
(83, 'resign', 'medium'),
(84, 'ripe', 'easy'),
(85, 'rotten', 'medium'),
(86, 'saddle', 'medium'),
(87, 'say', 'easy'),
(88, 'season', 'medium'),
(89, 'serious', 'hard'),
(90, 'she', 'easy'),
(91, 'shout', 'medium'),
(92, 'sink', 'easy'),
(93, 'smell', 'medium'),
(94, 'somebody', 'hard'),
(95, 'space', 'medium'),
(96, 'spread', 'medium'),
(97, 'steer', 'medium'),
(98, 'strange', 'hard'),
(99, 'subject', 'hard'),
(100, 'surprise', 'hard'),
(101, 'tailor', 'medium'),
(102, 'tender', 'medium'),
(103, 'thing', 'medium'),
(104, 'tie', 'easy'),
(105, 'tooth', 'medium'),
(106, 'treasure', 'hard'),
(107, 'ugly', 'easy'),
(108, 'upset', 'medium'),
(109, 'violent', 'hard'),
(110, 'warn', 'easy'),
(111, 'weigh', 'medium'),
(112, 'whisper', 'hard'),
(113, 'wind', 'easy'),
(114, 'word', 'easy'),
(115, 'yet', 'easy');

-- --------------------------------------------------------

--
-- Table structure for table `synonyms`
--

CREATE TABLE `synonyms` (
  `ID` int(11) NOT NULL,
  `word` varchar(100) NOT NULL,
  `synonym` varchar(100) NOT NULL,
  `difficulty` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `synonyms`
--

INSERT INTO `synonyms` (`ID`, `word`, `synonym`, `difficulty`) VALUES
(1, 'A-menneske', 'morgenfugl', 'hard'),
(2, 'abscess', 'byll', 'medium'),
(3, 'adoptere', 'knesette', 'hard'),
(4, 'agent', 'handelsreisende', 'easy'),
(5, 'akkviescere', 'finne', 'hard'),
(6, 'aktualitet', 'betydning', 'hard'),
(7, 'allerede', 'alt', 'hard'),
(8, 'altetende', 'omnivor', 'hard'),
(9, 'amorf', 'ikke-krystallinsk', 'easy'),
(10, 'anestesere', 'bedÃ¸ve', 'hard'),
(11, 'anker', 'dregg', 'easy'),
(12, 'anordning', 'avgjÃ¸relse', 'hard'),
(13, 'anstÃ¸tsstein', 'snublestein', 'hard'),
(14, 'anvise', 'assignere', 'medium'),
(15, 'apsidal', 'halvrund', 'medium'),
(16, 'arkeli', 'magasin', 'medium'),
(17, 'artilleri', 'kanoner', 'hard'),
(18, 'assortiment', 'utvalg', 'hard'),
(19, 'attityde', 'holdning', 'hard'),
(20, 'avart', 'bastard', 'easy'),
(21, 'avfukte', 'tÃ¸rke', 'medium'),
(22, 'avkjÃ¸le', 'fryse', 'hard'),
(23, 'avmÃ¥le', 'beregne', 'medium'),
(24, 'avslutte', 'avrunde', 'hard'),
(25, 'avtrykke', 'gjengi', 'hard'),
(26, 'bakkantisk', 'dionysisk', 'hard'),
(27, 'ballettkomponist', 'koreograf', 'hard'),
(28, 'bardage', 'kamp', 'medium'),
(29, 'basse', 'bjÃ¸rn', 'easy'),
(30, 'bedrestilt', 'bemidlet', 'hard'),
(31, 'befrukte', 'barne', 'hard'),
(32, 'behage', 'hue', 'medium'),
(33, 'beklageligvis', 'dessverre', 'hard'),
(34, 'belÃ¦ring', 'pekepinn', 'hard'),
(35, 'beretning', 'fortelling', 'hard'),
(36, 'besjele', 'beherske', 'medium'),
(37, 'besserwisser', 'bedreviter', 'hard'),
(38, 'besvimelse', 'bevisstlÃ¸shet', 'hard'),
(39, 'betler', 'tigger', 'medium'),
(40, 'beviskraft', 'autoritet', 'hard'),
(41, 'bilegge', 'avgjÃ¸re', 'medium'),
(42, 'bite', 'gnage', 'easy'),
(43, 'blekksmÃ¸rer', 'forfatter', 'hard'),
(44, 'blokke', 'utvide', 'medium'),
(45, 'blÃ¸te', 'blÃ¸yte', 'medium'),
(46, 'bomme', 'dÃ¥se', 'easy'),
(47, 'bortover', 'langs', 'hard'),
(48, 'braute', 'skryte', 'medium'),
(49, 'briljant', 'juvel', 'hard'),
(50, 'brunst', 'paringstrang', 'medium'),
(51, 'brÃ¸le', 'baule', 'medium'),
(52, 'bunad', 'drakt', 'easy'),
(53, 'bykjerne', 'sentrum', 'hard'),
(54, 'bÃ¸nnhÃ¸re', 'hÃ¸re', 'hard'),
(55, 'certeparti', 'kontrakt', 'hard'),
(56, 'cruise', 'reise', 'medium'),
(57, 'dannende', 'formativ', 'hard'),
(58, 'defilering', 'parade', 'hard'),
(59, 'dekretere', 'avgjÃ¸re', 'hard'),
(60, 'demon', 'djevel', 'easy'),
(61, 'derivasjon', 'avledning', 'hard'),
(62, 'detalj', 'smÃ¥ting', 'medium'),
(63, 'dikt', 'epos', 'easy'),
(64, 'disharmoni', 'misforhold', 'hard'),
(65, 'distinkt', 'bestemt', 'hard'),
(66, 'dokument', 'aktstykke', 'hard'),
(67, 'dottet', 'dottete', 'medium'),
(68, 'drei', 'vending', 'easy'),
(69, 'drott', 'konge', 'easy'),
(70, 'duk', 'klede', 'easy'),
(71, 'dusj', 'bad', 'easy'),
(72, 'dyreliv', 'fauna', 'medium'),
(73, 'dÃ¸me', 'eksempel', 'easy'),
(74, 'effen', 'like', 'easy'),
(75, 'einer', 'brake', 'easy'),
(76, 'eksisjon', 'bortskjÃ¦ring', 'hard'),
(77, 'eksportere', 'utfÃ¸re', 'hard'),
(78, 'elan', 'fart', 'easy'),
(79, 'elliptisk', 'avlang', 'hard'),
(80, 'emir', 'hÃ¸vding', 'easy'),
(81, 'endring', 'forandring', 'medium'),
(82, 'enkeltvÃ¦relse', 'enerom', 'hard'),
(83, 'enveis', 'irreversibel', 'medium'),
(84, 'erindring', 'hukommelse', 'hard'),
(85, 'esoterisk', 'hemmelig', 'hard'),
(86, 'etterforske', 'undersÃ¸ke', 'hard'),
(87, 'ettersyn', 'omsorg', 'hard'),
(88, 'evneveik', 'tilbakestÃ¥ende', 'hard'),
(89, 'faktor', 'del', 'medium'),
(90, 'fanebÃ¦rer', 'merkesmann', 'hard'),
(91, 'farm', 'gÃ¥rd', 'easy'),
(92, 'fatigue', 'tretthet', 'medium'),
(93, 'feiging', 'kujon', 'medium'),
(94, 'fengsle', 'arrestere', 'medium'),
(95, 'fiacre', 'hestedrosje', 'medium'),
(96, 'fillet', 'fillete', 'medium'),
(97, 'fintfÃ¸lende', 'fin', 'hard'),
(98, 'fjetre', 'kogle', 'medium'),
(99, 'flankere', 'kante', 'hard'),
(100, 'fles', 'bÃ¥e', 'easy'),
(101, 'floss', 'lo', 'easy'),
(102, 'flÃ¸y', 'ving', 'easy'),
(103, 'follikkel', 'blÃ¦re', 'hard'),
(104, 'forberede', 'arrangere', 'hard'),
(105, 'fordekt', 'dulgt', 'medium'),
(106, 'foregangskvinne', 'foregangsmann', 'hard'),
(107, 'foretrede', 'audiens', 'hard'),
(108, 'forgi', 'forgifte', 'easy'),
(109, 'forhutlet', 'dÃ¥rlig', 'hard'),
(110, 'forlate', 'etterlate', 'medium'),
(111, 'formbar', 'duktil', 'medium'),
(112, 'fornedre', 'degradere', 'hard'),
(113, 'forretningsmessig', 'kommersiell', 'hard'),
(114, 'forske', 'granske', 'medium'),
(115, 'forsprang', 'ledelse', 'hard'),
(116, 'forsynlig', 'forutse', 'hard'),
(117, 'fortrekke', 'fjerne', 'hard'),
(118, 'forutbestille', 'abonnere', 'hard'),
(119, 'forvrengning', 'karikatur', 'hard'),
(120, 'frakoblet', 'frakoplet', 'hard'),
(121, 'framskutt', 'stor', 'hard'),
(122, 'frede', 'beskytte', 'easy'),
(123, 'fremkomst', 'framkomst', 'hard'),
(124, 'fres', 'damp', 'easy'),
(125, 'frivol', 'lettferdig', 'medium'),
(126, 'frÃ¸', 'anlegg', 'easy'),
(127, 'funksjonere', 'virke', 'hard'),
(128, 'fylling', 'demning', 'medium'),
(129, 'fÃ¸dselshjelper', 'accoucheur', 'hard'),
(130, 'fÃ¸rstesidestoff', 'sensasjon', 'hard'),
(131, 'gamp', 'hest', 'easy'),
(132, 'gaul', 'belj', 'easy'),
(133, 'gen', 'arveanlegg', 'easy'),
(134, 'gesvint', 'hurtig', 'medium'),
(135, 'giver', 'bidragsyter', 'easy'),
(136, 'gjennombore', 'dolke', 'hard'),
(137, 'gjensidighet', 'mutualisme', 'hard'),
(138, 'gjÃ¸dsel', 'frau', 'hard'),
(139, 'gledelÃ¸s', 'trist', 'hard'),
(140, 'glose', 'ord', 'easy'),
(141, 'gnure', 'skure', 'easy'),
(142, 'golf', 'bukt', 'easy'),
(143, 'grat', 'kant', 'easy'),
(144, 'grid', 'benÃ¥dning', 'easy'),
(145, 'grovkornet', 'drastisk', 'hard'),
(146, 'gruppe', 'ensemble', 'medium'),
(147, 'gudelÃ¦re', 'mytologi', 'hard'),
(148, 'gust', 'vind', 'easy'),
(149, 'habitat', 'boomrÃ¥de', 'medium'),
(150, 'halsbrekkende', 'livsfarlig', 'hard'),
(151, 'hamstre', 'samle', 'medium'),
(152, 'hang', 'drift', 'easy'),
(153, 'hartad', 'nesten', 'medium'),
(154, 'hederskronet', 'hederskront', 'hard'),
(155, 'hel', 'avsluttet', 'easy'),
(156, 'heltemodig', 'heroisk', 'hard'),
(157, 'hengiven', 'hjertelig', 'hard'),
(158, 'henvisende', 'referensiell', 'hard'),
(159, 'herrevelde', 'herredÃ¸mme', 'hard'),
(160, 'hierarkisk', 'rangordnet', 'hard'),
(161, 'hist', 'der', 'easy'),
(162, 'hjemsÃ¸ke', 'ramme', 'hard'),
(163, 'hodebry', 'hodebrudd', 'medium'),
(164, 'homofili', 'homoseksualitet', 'hard'),
(165, 'hote', 'true', 'easy'),
(166, 'huie', 'hauke', 'easy'),
(167, 'hundegÃ¥rd', 'kennel', 'hard'),
(168, 'hustelefon', 'intercom', 'hard'),
(169, 'hydrofobi', 'vannskrekk', 'hard'),
(170, 'hysj-hysj', 'hemmelig', 'hard'),
(171, 'hÃ¥r', 'bust', 'easy'),
(172, 'hÃ¸ring', 'avhÃ¸ring', 'medium'),
(173, 'i', 'inni', 'medium'),
(174, 'idÃ©rikdom', 'kreativitet', 'hard'),
(175, 'ildopphÃ¸r', 'vÃ¥penhvile', 'hard'),
(176, 'imbesil', 'Ã¥ndssvak', 'medium'),
(177, 'impost', 'avgift', 'medium'),
(178, 'indisponert', 'upasselig', 'hard'),
(179, 'ingot', 'blokk', 'easy'),
(180, 'inkvisisjon', 'forhÃ¸r', 'hard'),
(181, 'innendÃ¸rs', 'innomhus', 'hard'),
(182, 'innhukk', 'blindgate', 'medium'),
(183, 'innrede', 'aptere', 'medium'),
(184, 'innstilling', 'mening', 'hard'),
(185, 'insentiv', 'incentiv', 'hard'),
(186, 'intendant', 'bestyrer', 'hard'),
(187, 'interruptus', 'avbrutt', 'hard'),
(188, 'inventarium', 'fortegnelse', 'hard'),
(189, 'isnende', 'kald', 'medium'),
(190, 'jamn', 'jevn', 'easy'),
(191, 'jevnstilt', 'jamstilt', 'hard'),
(192, 'jorte', 'Ã¸rte', 'easy'),
(193, 'justere', 'avpasse', 'medium'),
(194, 'kakke', 'dunke', 'easy'),
(195, 'kamera', 'fotografiapparat', 'medium'),
(196, 'kantonnement', 'innkvartering', 'hard'),
(197, 'karakterstyrke', 'fasthet', 'hard'),
(198, 'kartverk', 'atlas', 'hard'),
(199, 'kataster', 'jordebok', 'hard'),
(200, 'kavring', 'beskÃ¸yt', 'medium'),
(201, 'kingel', 'edderkopp', 'medium'),
(202, 'kjelkete', 'kjelket', 'hard'),
(203, 'kjole', 'kreasjon', 'easy'),
(204, 'kjÃ¸redoning', 'kjÃ¸retÃ¸y', 'hard'),
(205, 'klaring', 'klare', 'medium'),
(206, 'klesdrakt', 'drakt', 'hard'),
(207, 'klon', 'avkom', 'easy'),
(208, 'klÃ¸kksam', 'sentimental', 'hard'),
(209, 'knep', 'felle', 'easy'),
(210, 'knue', 'knoke', 'easy'),
(211, 'kodisill', 'tillegg', 'hard'),
(212, 'kollegial', 'kameratslig', 'hard'),
(213, 'kommentere', 'forklare', 'hard'),
(214, 'komplikasjon', 'forvikling', 'hard'),
(215, 'konfidensialitet', 'fortrolighet', 'hard'),
(216, 'konkretisere', 'anskueliggjÃ¸re', 'hard'),
(217, 'konspiratorisk', 'hemmelighetsfull', 'hard'),
(218, 'kontinentalsokkel', 'shelf', 'hard'),
(219, 'konversjon', 'omforming', 'hard'),
(220, 'korrektiv', 'rettesnor', 'hard'),
(221, 'koste', 'feie', 'easy'),
(222, 'kranglet', 'kranglete', 'hard'),
(223, 'kremasjon', 'likbrenning', 'hard'),
(224, 'kris', 'dolk', 'easy'),
(225, 'krugg', 'krok', 'easy'),
(226, 'krÃ¸bel', 'dÃ¥rlig', 'medium'),
(227, 'kulse', 'grÃ¸sse', 'easy'),
(228, 'kupong', 'bevis', 'medium'),
(229, 'kutt', 'skÃ¥r', 'easy'),
(230, 'kvekk', 'kny', 'easy'),
(231, 'kvise', 'akne', 'easy'),
(232, 'kÃ¸', 'rekke', 'easy'),
(233, 'laguneÃ¸y', 'atoll', 'hard'),
(234, 'landsforvisning', 'petalisme', 'hard'),
(235, 'lapsus', 'inkurie', 'medium'),
(236, 'lauge', 'vaske', 'easy'),
(237, 'ledning', 'kabel', 'medium'),
(238, 'leiesvenn', 'medhjelper', 'hard'),
(239, 'lengte', 'attrÃ¥', 'medium'),
(240, 'lettskremt', 'engstelig', 'hard'),
(241, 'liderlig', 'grov', 'hard'),
(242, 'likevektig', 'avbalansert', 'hard'),
(243, 'lingvist', 'sprÃ¥kforsker', 'hard'),
(244, 'live', 'beskytte', 'easy'),
(245, 'ljot', 'stygg', 'easy'),
(246, 'longere', 'dressere', 'medium'),
(247, 'lovsamling', 'kodeks', 'hard'),
(248, 'lulle', 'dysse', 'easy'),
(249, 'lusk', 'hÃ¥r', 'easy'),
(250, 'lynsje', 'drepe', 'medium'),
(251, 'lÃ¥se', 'lÃ¦se', 'easy'),
(252, 'lÃ¸nnsom', 'gullkantet', 'hard'),
(253, 'madame', 'frue', 'medium'),
(254, 'maksime', 'grunnsetning', 'medium'),
(255, 'mammadalt', 'pyse', 'hard'),
(256, 'manikyr', 'hÃ¥ndpleie', 'medium'),
(257, 'marg', 'must', 'easy'),
(258, 'maskering', 'forkledning', 'hard'),
(259, 'matlyst', 'appetitt', 'medium'),
(260, 'mediasjon', 'mekling', 'hard'),
(261, 'meie', 'skjÃ¦re', 'easy'),
(262, 'mellomrom', 'avstand', 'hard'),
(263, 'menneskelighet', 'humanitet', 'hard'),
(264, 'messe', 'gudstjeneste', 'easy'),
(265, 'midje', 'liv', 'easy'),
(266, 'mindreverdighetsfÃ¸lelse', 'husmannsÃ¥nd', 'hard'),
(267, 'misdannet', 'lytt', 'hard'),
(268, 'missiv', 'brev', 'medium'),
(269, 'moderator', 'ordstyrer', 'hard'),
(270, 'monografi', 'studie', 'hard'),
(271, 'morgendag', 'framtid', 'hard'),
(272, 'motivasjon', 'motivering', 'hard'),
(273, 'mount', 'fjell', 'easy'),
(274, 'munnhoggeri', 'munnhuggeri', 'hard'),
(275, 'mutuell', 'gjensidig', 'medium'),
(276, 'mÃ¥llÃ¸s', 'paff', 'hard'),
(277, 'nabob', 'rikmann', 'easy'),
(278, 'nat', 'fuge', 'easy'),
(279, 'navnlig', 'isÃ¦r', 'medium'),
(280, 'nedskjÃ¦ring', 'kutt', 'hard'),
(281, 'nemme', 'forstand', 'easy'),
(282, 'nettprat', 'chatt', 'hard'),
(283, 'nivÃ¥senkning', 'forringelse', 'hard'),
(284, 'nota', 'faktura', 'easy'),
(285, 'ny', 'fersk', 'easy'),
(286, 'nÃ¥degave', 'karisma', 'hard'),
(287, 'nÃ¸dvendig', 'absolutt', 'hard'),
(288, 'obstetrikk', 'fÃ¸dselsvitenskap', 'hard'),
(289, 'okkupasjon', 'besettelse', 'hard'),
(290, 'omfangsrik', 'bindsterk', 'hard'),
(291, 'omregning', 'forkorting', 'hard'),
(292, 'omtykt', 'populÃ¦r', 'medium'),
(293, 'oppbrudd', 'avreise', 'hard'),
(294, 'oppfÃ¸relse', 'anlegg', 'hard'),
(295, 'opplatt', 'Ã¥pen', 'medium'),
(296, 'opprette', 'bygge', 'hard'),
(297, 'oppspedd', 'blandet', 'hard'),
(298, 'oppvarter', 'kelner', 'hard'),
(299, 'ordinere', 'beordre', 'hard'),
(300, 'orkesterleder', 'dirigent', 'hard'),
(301, 'oval', 'krets', 'easy'),
(302, 'overflytting', 'translasjon', 'hard'),
(303, 'overlevende', 'etterlate', 'hard'),
(304, 'overspent', 'eksaltert', 'hard'),
(305, 'paddock', 'innhegning', 'medium'),
(306, 'panisk', 'hodekulls', 'medium'),
(307, 'parallellkopling', 'shunt', 'hard'),
(308, 'paroksysmal', 'anfallsvis', 'hard'),
(309, 'passim', 'spredt', 'medium'),
(310, 'pavor', 'frykt', 'easy'),
(311, 'pengemessig', 'monetÃ¦r', 'hard'),
(312, 'perihelium', 'perihel', 'hard'),
(313, 'personell', 'mannskap', 'hard'),
(314, 'pikke', 'banke', 'easy'),
(315, 'pirrende', 'krydre', 'hard'),
(316, 'plankegang', 'omgang', 'hard'),
(317, 'plett', 'plass', 'easy'),
(318, 'plystre', 'blÃ¥se', 'medium'),
(319, 'polyfon', 'flerstemmig', 'medium'),
(320, 'positur', 'stilling', 'medium'),
(321, 'pram', 'bÃ¥t', 'easy'),
(322, 'prerogativ', 'privilegium', 'hard'),
(323, 'pretensjon', 'ambisjon', 'hard'),
(324, 'privateid', 'proprietÃ¦r', 'hard'),
(325, 'programvalg', 'meny', 'hard'),
(326, 'proppe', 'fylle', 'medium'),
(327, 'provins', 'eparki', 'medium'),
(328, 'publikum', 'allmennheten', 'hard'),
(329, 'puppestell', 'barm', 'hard'),
(330, 'pÃ¥', 'oppÃ¥', 'easy'),
(331, 'pÃ¥rÃ¸rende', 'nÃ¦rmeste', 'hard'),
(332, 'quilting', 'lappeteknikk', 'hard'),
(333, 'raide', 'rekke', 'easy'),
(334, 'ransakning', 'undersÃ¸kelse', 'hard'),
(335, 'rate', 'avbetaling', 'easy'),
(336, 'red', 'havn', 'easy'),
(337, 'refluks', 'tilbakestrÃ¸m', 'medium'),
(338, 'reglementere', 'foreskrive', 'hard'),
(339, 'reiv', 'snor', 'easy'),
(340, 'relegere', 'forvise', 'hard'),
(341, 'renommert', 'ansett', 'hard'),
(342, 'reproduksjon', 'avtrykk', 'hard'),
(343, 'resong', 'fornuft', 'medium'),
(344, 'retensjon', 'erindring', 'hard'),
(345, 'rettmessig', 'lovlig', 'hard'),
(346, 'rie', 'rÃ¸ykstue', 'easy'),
(347, 'ripost', 'motstÃ¸t', 'medium'),
(348, 'rolle', 'oppgave', 'easy'),
(349, 'rotfestet', 'inngrodd', 'hard'),
(350, 'rullere', 'sirkulere', 'medium'),
(351, 'rute', 'veivalg', 'easy'),
(352, 'rÃ¥derett', 'rÃ¥dighet', 'hard'),
(353, 'rÃ¸r', 'snakk', 'easy'),
(354, 'sagn', 'historie', 'easy'),
(355, 'salongfÃ¤hig', 'dannet', 'hard'),
(356, 'samkvem', 'forbindelse', 'medium'),
(357, 'sammenstilling', 'konfigurasjon', 'hard'),
(358, 'sand', 'aur', 'easy'),
(359, 'sart', 'mimoseaktig', 'easy'),
(360, 'seanse', 'forestilling', 'medium'),
(361, 'seiler', 'fartÃ¸y', 'medium'),
(362, 'selskapelig', 'festlig', 'hard'),
(363, 'selvstyre', 'autonomi', 'hard'),
(364, 'sensur', 'bedÃ¸mmelse', 'medium'),
(365, 'sesse', 'benke', 'easy'),
(366, 'sideordnet', 'parataktisk', 'hard'),
(367, 'sikte', 'syn', 'easy'),
(368, 'sinnssyk', 'manisk', 'hard'),
(369, 'sjaber', 'dÃ¥rlig', 'medium'),
(370, 'sjeldsynt', 'sjelden', 'hard'),
(371, 'sjÃ¥vinisme', 'patriotisme', 'hard'),
(372, 'skamfull', 'angerfull', 'hard'),
(373, 'skavl', 'bÃ¸lge', 'easy'),
(374, 'skinnbarlig', 'legemliggjort', 'hard'),
(375, 'skjeling', 'strabisme', 'hard'),
(376, 'skjÃ¦ringspunkt', 'origo', 'hard'),
(377, 'skoning', 'beslag', 'medium'),
(378, 'skrev', 'skritt', 'easy'),
(379, 'skryt', 'bram', 'easy'),
(380, 'skummer', 'skummel', 'medium'),
(381, 'skyldfolk', 'familie', 'hard'),
(382, 'sla', 'helling', 'easy'),
(383, 'slarkete', 'slarket', 'hard'),
(384, 'slimaktig', 'mukÃ¸s', 'hard'),
(385, 'slump', 'del', 'easy'),
(386, 'slÃ¸ve', 'avstumpe', 'medium'),
(387, 'smiger', 'artigheter', 'medium'),
(388, 'smÃ¥tass', 'barn', 'hard'),
(389, 'sneis', 'spÃ¸t', 'easy'),
(390, 'snuse', 'lukte', 'easy'),
(391, 'solenn', 'hÃ¸ytidelig', 'medium'),
(392, 'sopran', 'stemme', 'medium'),
(393, 'spase', 'fjase', 'easy'),
(394, 'speseri', 'krydderi', 'medium'),
(395, 'spire', 'frÃ¸', 'easy'),
(396, 'spolere', 'forderve', 'medium'),
(397, 'spretten', 'elastisk', 'hard'),
(398, 'spyttslikker', 'kurtisan', 'hard'),
(399, 'stakeholder', 'aksjonÃ¦r', 'hard'),
(400, 'stasjonere', 'anbringe', 'hard');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `grade` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `username`, `password`, `fullname`, `grade`) VALUES
(1, 'waqas', 'waqas', 'waqas ahmed', '1'),
(2, 'qasim', 'qasim123', 'Qasim Khan', '3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `spelling`
--
ALTER TABLE `spelling`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `synonyms`
--
ALTER TABLE `synonyms`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `spelling`
--
ALTER TABLE `spelling`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `synonyms`
--
ALTER TABLE `synonyms`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=401;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
