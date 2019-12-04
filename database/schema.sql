-- phpMyAdmin SQL Dump

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Struktura tabeli dla tabeli `Deadlines`
--

CREATE TABLE IF NOT EXISTS `Deadlines` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_lekarza` int(11) NOT NULL,
  `rok_miesiac_dzien` date NOT NULL,
  `godzina_od` time NOT NULL,
  `godzina_do` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin2 AUTO_INCREMENT=1;

--
-- Struktura tabeli dla tabeli `Doctors`
--

CREATE TABLE IF NOT EXISTS `Doctors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `imie` varchar(255) NOT NULL,
  `nazwisko` varchar(255) NOT NULL,
  `gabinet` int(11) NOT NULL,
  `telefon` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin2 AUTO_INCREMENT=1;


--
-- Struktura tabeli dla tabeli `Patients`
--

CREATE TABLE IF NOT EXISTS `Patients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `imie` varchar(255) NOT NULL,
  `nazwisko` varchar(255) NOT NULL,
  `pesel` varchar(12) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` enum('aktywne','zablokowane') NOT NULL DEFAULT 'aktywne',
  `adres` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin2 AUTO_INCREMENT=1;


--
-- Struktura tabeli dla tabeli `Visits`
--

CREATE TABLE IF NOT EXISTS `Visits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_lekarza` int(11) NOT NULL,
  `id_pacjenta` int(11) NOT NULL,
  `rok_miesiac_dzien` date NOT NULL,
  `godzina_minuta` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin2 AUTO_INCREMENT=1;
