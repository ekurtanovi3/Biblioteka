-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2016 at 11:35 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `biblioteka_baza`
--

-- --------------------------------------------------------

--
-- Table structure for table `autori`
--

CREATE TABLE IF NOT EXISTS `autori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci AUTO_INCREMENT=22 ;

--
-- Dumping data for table `autori`
--

INSERT INTO `autori` (`id`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `komentari`
--

CREATE TABLE IF NOT EXISTS `komentari` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idNovosti` int(11) NOT NULL,
  `tekst` text COLLATE utf8_slovenian_ci NOT NULL,
  `vrijeme` datetime NOT NULL,
  `komentarKomentara` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idNovosti` (`idNovosti`),
  KEY `komentarKomentara` (`komentarKomentara`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci AUTO_INCREMENT=73 ;

--
-- Dumping data for table `komentari`
--

INSERT INTO `komentari` (`id`, `idNovosti`, `tekst`, `vrijeme`, `komentarKomentara`) VALUES
(69, 9, 'Komentar', '2016-06-06 23:31:59', NULL),
(72, 9, 'Komenar na Komenar', '2016-06-06 23:34:41', 69);

-- --------------------------------------------------------

--
-- Table structure for table `novosti`
--

CREATE TABLE IF NOT EXISTS `novosti` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naslov` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `tekst` text COLLATE utf8_slovenian_ci NOT NULL,
  `idAutora` int(11) NOT NULL,
  `vrijeme` datetime NOT NULL,
  `otvoren` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idAutora` (`idAutora`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci AUTO_INCREMENT=14 ;

--
-- Dumping data for table `novosti`
--

INSERT INTO `novosti` (`id`, `naslov`, `tekst`, `idAutora`, `vrijeme`, `otvoren`) VALUES
(9, 'Besplatna članarina za đake prvog i drugog razreda', ' Gradska biblioteka Sarajevo od ove &scaron;kolske godine za djecu \r\n	 prvog i drugog razreda osnovnih &scaron;kola daje besplatnu članarinu u svrhu promocije i otvaranja vrata biblioteke đacima.\r\n	 Članarina je ostala na nivou iz pro&scaron;lih godina (10 KM), a za djecu poginulih boraca sa područja cijele \r\n	 BiH članarina je besplatna kao i za studente koji su djeca poginulih boraca, a koji dolaze iz drugih op&scaron;tina.\r\n	 Prema podacima iz 2013. godine imala je ukupno 37 360 knjiga. \r\n	 Broj članova se kreće između 400 i 600 na godi&scaron;njem nivou i godi&scaron;nje se podigne oko 20.000 knjiga.', 1, '2016-06-06 22:40:35', 1),
(10, 'Uvećan fond knjiga biblioteke', ' Gradska biblioteka Sarajevo svake godine obnavlja bibliotečki \r\n	fond u skladu sa finansijskim sredstvima kojima raspolaže. Pritom oslu&scaron;kujemo i trudimo se da zadovoljimo želje i zahtjeve čitaoca. \r\n	Tako se fond popunjava najnovijim naslovima beletristike, stručne literature, lektire. \r\n	Želimo da to bude u mnogo većem obimu i nadamo se ostvarenju te želje. Rukovodeći se idejom da biblioteka treba da bude tamo gde su čitaoci, \r\n	Gradska biblioteka Sarajevo se svojim čitaocima pridružila i na dru&scaron;tvenoj mreži Fejsbuk, putem koje dijeli informacije, pozive, \r\n	razmjenjuje ideje i iskustva, prima korisne prijedloge.', 1, '2016-06-06 22:41:43', 0),
(11, 'Najposjećenija ustanova kulture', ' Najposjećenija institucija kulture u zemlji u 2015. \r\n	godini bila je Gradska biblioteka Sarajevo. Svakodnevno usluge i djela gradske biblioteke koristi vi&scaron;e od pet stotina, a bazama podataka \r\n	na internet sajtu biblioteke pristupi oko 10 hiljada ljudi. Gradska biblioteka Sarajevo čuva vi&scaron;e od dvadeset hiljada bibliotečkih \r\n	jedinica među kojima su i kulturna dobra od izuzetnog značaja.', 1, '2016-06-06 22:42:19', 1),
(12, 'Najposjećenija ustanova kulture', ' Najposjećenija institucija kulture u zemlji u 2015. \r\n	godini bila je Gradska biblioteka Sarajevo. Svakodnevno usluge i djela gradske biblioteke koristi vi&scaron;e od pet stotina, a bazama podataka \r\n	na internet sajtu biblioteke pristupi oko 10 hiljada ljudi. Gradska biblioteka Sarajevo čuva vi&scaron;e od dvadeset hiljada bibliotečkih \r\n	jedinica među kojima su i kulturna dobra od izuzetnog značaja.', 1, '2016-06-06 22:44:02', 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `komentari`
--
ALTER TABLE `komentari`
  ADD CONSTRAINT `komentari_ibfk_1` FOREIGN KEY (`idNovosti`) REFERENCES `novosti` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `komentari_ibfk_2` FOREIGN KEY (`komentarKomentara`) REFERENCES `komentari` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `novosti`
--
ALTER TABLE `novosti`
  ADD CONSTRAINT `novosti_ibfk_1` FOREIGN KEY (`idAutora`) REFERENCES `autori` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
