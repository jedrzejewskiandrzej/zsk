-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 09 Lut 2020, 20:10
-- Wersja serwera: 10.1.38-MariaDB
-- Wersja PHP: 7.2.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `projekt_pai`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `category`
--

CREATE TABLE `category` (
  `id_category` varchar(5) COLLATE utf8mb4_polish_ci NOT NULL,
  `category_name` varchar(20) COLLATE utf8mb4_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `class`
--

CREATE TABLE `class` (
  `id_class` varchar(3) COLLATE utf8mb4_polish_ci NOT NULL,
  `class_name` varchar(30) COLLATE utf8mb4_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `class`
--

INSERT INTO `class` (`id_class`, `class_name`) VALUES
('1a', 'Językowe bestie'),
('1b', 'Biegli poligloci');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `set`
--

CREATE TABLE `set` (
  `id_set` int(11) NOT NULL,
  `set_name` varchar(20) COLLATE utf8mb4_polish_ci NOT NULL,
  `id_class` varchar(3) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `id_category` varchar(5) COLLATE utf8mb4_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_polish_ci NOT NULL,
  `lastname` varchar(30) COLLATE utf8mb4_polish_ci NOT NULL,
  `login` varchar(20) COLLATE utf8mb4_polish_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_polish_ci NOT NULL,
  `type` varchar(1) COLLATE utf8mb4_polish_ci NOT NULL,
  `password` varchar(30) COLLATE utf8mb4_polish_ci NOT NULL,
  `id_class` varchar(3) COLLATE utf8mb4_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `user`
--

INSERT INTO `user` (`id_user`, `name`, `lastname`, `login`, `email`, `type`, `password`, `id_class`) VALUES
(1, 'Andrzej', 'Jędrzejewski', 'ajay_1', 'ajay@gmail.com', 's', 'ZAQ!2wsx', '1a');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `vocab`
--

CREATE TABLE `vocab` (
  `id_vocab` int(11) NOT NULL,
  `vocab_pl` varchar(30) COLLATE utf8mb4_polish_ci NOT NULL,
  `voacb_en` varchar(30) COLLATE utf8mb4_polish_ci NOT NULL,
  `id_set` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indeksy dla tabeli `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id_class`);

--
-- Indeksy dla tabeli `set`
--
ALTER TABLE `set`
  ADD PRIMARY KEY (`id_set`),
  ADD KEY `id_class` (`id_class`),
  ADD KEY `id_category` (`id_category`);

--
-- Indeksy dla tabeli `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_class` (`id_class`);

--
-- Indeksy dla tabeli `vocab`
--
ALTER TABLE `vocab`
  ADD PRIMARY KEY (`id_vocab`),
  ADD KEY `id_set` (`id_set`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `set`
--
ALTER TABLE `set`
  MODIFY `id_set` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `vocab`
--
ALTER TABLE `vocab`
  MODIFY `id_vocab` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `set`
--
ALTER TABLE `set`
  ADD CONSTRAINT `set_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `category` (`id_category`),
  ADD CONSTRAINT `set_ibfk_2` FOREIGN KEY (`id_set`) REFERENCES `vocab` (`id_set`),
  ADD CONSTRAINT `set_ibfk_3` FOREIGN KEY (`id_class`) REFERENCES `class` (`id_class`);

--
-- Ograniczenia dla tabeli `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_class`) REFERENCES `class` (`id_class`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
