-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 09, 2021 alle 00:00
-- Versione del server: 10.4.18-MariaDB
-- Versione PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sitoscuola`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `immaginislider`
--

CREATE TABLE `immaginislider` (
  `id` int(11) NOT NULL,
  `nome` varchar(32) NOT NULL,
  `url` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `immaginislider`
--

INSERT INTO `immaginislider` (`id`, `nome`, `url`) VALUES
(39, 'Non lo so', 'immagini/slider/nonloso.jpg'),
(40, 'Informatica', 'immagini/slider/bohmJacopini.jpg'),
(49, 'Castle', 'immagini/slider/castle.png'),
(50, 'Hallowen', 'immagini/slider/hallowen.jpg'),
(51, 'Luna', 'immagini/slider/luna.jpg'),
(52, 'Tipa', 'immagini/slider/tipa.jpg');

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

CREATE TABLE `utenti` (
  `id` int(11) NOT NULL,
  `nome` varchar(32) NOT NULL,
  `cognome` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `telefono` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`id`, `nome`, `cognome`, `email`, `telefono`, `password`) VALUES
(3, '1234', '1234', '1234', '1234', '1234'),
(6, 'Luca', 'Giannoccaro', '1j.giannoccaroluca@gmail.com', '3913804390', 'kevingay'),
(7, 'mario', 'rossi', 'giannoccaro.luca@volta.ts.it', '1234567890', 'ocio');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `immaginislider`
--
ALTER TABLE `immaginislider`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `immaginislider`
--
ALTER TABLE `immaginislider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT per la tabella `utenti`
--
ALTER TABLE `utenti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
