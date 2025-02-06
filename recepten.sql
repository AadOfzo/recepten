-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 06 feb 2025 om 23:14
-- Serverversie: 10.4.32-MariaDB
-- PHP-versie: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `recepten`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `ingredienten`
--

CREATE TABLE `ingredienten` (
  `id` int(11) NOT NULL,
  `naam` varchar(255) NOT NULL,
  `eenheid` varchar(50) DEFAULT NULL,
  `categorie` enum('Groente','Fruit','Vlees','Zuivel','Kruiden','Specerijen','Granen','Overig') NOT NULL DEFAULT 'Overig'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `ingredienten`
--

INSERT INTO `ingredienten` (`id`, `naam`, `eenheid`, `categorie`) VALUES
(1, 'Boerenkool', 'gram', 'Groente'),
(2, 'Aardappel', 'stuk', 'Groente'),
(3, 'Tomaat', 'stuk', 'Groente'),
(4, 'Banaan', 'stuk', 'Fruit'),
(5, 'Rijst', 'kg', 'Overig'),
(6, 'Vla', 'liter', 'Overig');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `keukengerei`
--

CREATE TABLE `keukengerei` (
  `id` int(11) NOT NULL,
  `naam` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `keukengerei`
--

INSERT INTO `keukengerei` (`id`, `naam`) VALUES
(1, 'lepel'),
(2, 'mes');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `recepten`
--

CREATE TABLE `recepten` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `naam` varchar(255) NOT NULL,
  `beschrijving` text DEFAULT NULL,
  `bereidingstijd` int(11) DEFAULT NULL,
  `datum_toegevoegd` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `recepten`
--

INSERT INTO `recepten` (`id`, `user_id`, `naam`, `beschrijving`, `bereidingstijd`, `datum_toegevoegd`) VALUES
(1, 3, 'boerenkool', 'Nederlandse Stampot', 30, '2025-02-03 15:38:53'),
(3, 2, 'Boerenkoolstamppot', 'Een heerlijk gerecht met aardappelen en boerenkool.', 45, '2025-02-06 14:36:47');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `recept_ingredienten`
--

CREATE TABLE `recept_ingredienten` (
  `id` int(11) NOT NULL,
  `recept_id` int(11) NOT NULL,
  `ingredient_id` int(11) NOT NULL,
  `hoeveelheid` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `stappen`
--

CREATE TABLE `stappen` (
  `id` int(11) NOT NULL,
  `recept_id` int(11) DEFAULT NULL,
  `volgorde` int(11) DEFAULT NULL,
  `beschrijving` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `username`, `pass`, `email`) VALUES
(2, 'nieuwe naam', '123456', '456@mail.com'),
(3, 'bobby_blanco', '', 'bobby@email.com'),
(18, 'Test_User_1', '$2y$10$oid6YMkSYqxiI27AQ0zUSOD4uol8AMaFYciESEtnJkpicZ3URtlp.', 'Test_User_1@mail.com'),
(19, 'Test_User_2', '$2y$10$HXbZATV65VD4K2oyPPGlW.trdzWVbfkVOgjciCjUCORer8JfS/eJ6', 'Test_User_2@mail.com'),
(20, 'Test_User_3', '$2y$10$r7J6pOF/WiEcsAD5ttjc8.pjIGzrlbpDg55pt5rKQQhVvD1kYi/w.', 'Test_User_3@mail.com'),
(21, 'Test_User_3', '$2y$10$lMAgMROdK2Q03CBF.2RRoeX7zhHekBzQJkiRtuPfsb1WK5oPYh95W', 'Test_User_3@mail.com'),
(22, 'Test_User_4', '$2y$10$urcFQqtHrymBI/BNUJellux2.GVdTnm2P.qbmprLrhRIfYHjBlzY2', 'Test_User_4@mai.com');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `ingredienten`
--
ALTER TABLE `ingredienten`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `keukengerei`
--
ALTER TABLE `keukengerei`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `recepten`
--
ALTER TABLE `recepten`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexen voor tabel `recept_ingredienten`
--
ALTER TABLE `recept_ingredienten`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_recept` (`recept_id`),
  ADD KEY `fk_ingredient` (`ingredient_id`);

--
-- Indexen voor tabel `stappen`
--
ALTER TABLE `stappen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recept_id` (`recept_id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `ingredienten`
--
ALTER TABLE `ingredienten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT voor een tabel `keukengerei`
--
ALTER TABLE `keukengerei`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT voor een tabel `recepten`
--
ALTER TABLE `recepten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `recept_ingredienten`
--
ALTER TABLE `recept_ingredienten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `stappen`
--
ALTER TABLE `stappen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `recepten`
--
ALTER TABLE `recepten`
  ADD CONSTRAINT `recepten_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Beperkingen voor tabel `recept_ingredienten`
--
ALTER TABLE `recept_ingredienten`
  ADD CONSTRAINT `fk_ingredient` FOREIGN KEY (`ingredient_id`) REFERENCES `ingredienten` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_recept` FOREIGN KEY (`recept_id`) REFERENCES `recepten` (`id`) ON DELETE CASCADE;

--
-- Beperkingen voor tabel `stappen`
--
ALTER TABLE `stappen`
  ADD CONSTRAINT `stappen_ibfk_1` FOREIGN KEY (`recept_id`) REFERENCES `recepten` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
