-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Gegenereerd op: 26 aug 2018 om 14:30
-- Serverversie: 10.1.34-MariaDB
-- PHP-versie: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `lists`
--

CREATE TABLE `lists` (
  `id` int(11) NOT NULL,
  `naam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `lists`
--

INSERT INTO `lists` (`id`, `naam`, `userid`) VALUES
(2, 'test', 0),
(3, 'test met user', 3),
(4, 'test met user', 3),
(5, 'test met user', 3),
(6, 'test met user', 3),
(7, 'test met user', 3),
(8, 'test met user', 3),
(10, 'dfqfd', 3),
(11, 'dfqfd', 3),
(12, 'blabla', 3),
(13, 'blabla', 3),
(14, 'testje', 3),
(15, 'testje', 3),
(16, 'hallo', 3),
(17, 'fkdjk', 3),
(18, 'dfqdq', 3),
(19, 'dfqdq', 3),
(20, 'testje', 3),
(21, 'testje', 3),
(22, 'nog is', 3),
(23, 'nog is', 3),
(24, 'nog is', 3),
(25, 'hallo', 3),
(26, 'hallo', 3),
(27, 'hfdkdl', 3),
(28, 'new list', 3),
(29, 'kfjqkdf', 3),
(30, 'kfjqkdf', 3),
(31, 'jkjljkj', 3);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`) VALUES
(1, 'thomas', 'thomas', 'thomas@thomas.be', '$2y$10$SSU9VXYOIfnrd1idZh1JcunCssfWKvmPb38OFaREuu.eEnxk/iKN6'),
(2, 'test', 'test', 'test@test.Be', '$2y$10$sa/3wZbFG1ywIzp9bQWQXurhXjKDrcGYr1pcOOlvSjBpY5dh.jvRW'),
(3, 'thomas', 'laeremans', 'thomaslaeremans@hotmail.com', '$2y$10$XNUl4nKSdllDFCqbBKVos.9Qodm5e6H6KTDrmXb90c7v0jDt069uu');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `lists`
--
ALTER TABLE `lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `lists`
--
ALTER TABLE `lists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
