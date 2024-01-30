-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Lip 03, 2023 at 12:47 PM
-- Wersja serwera: 10.4.28-MariaDB
-- Wersja PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `magazyn`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `produkty`
--

CREATE TABLE `produkty` (
  `User_Db` int(11) NOT NULL,
  `Nazwa` varchar(30) NOT NULL,
  `Ilość` int(15) NOT NULL,
  `Strefa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `produkty`
--

INSERT INTO `produkty` (`User_Db`, `Nazwa`, `Ilość`, `Strefa`) VALUES
(1, 'Chleb', 1521, 1),
(2, 'Ogórek', 2134, 3),
(1, 'Truskawki', 4255, 4),
(2, 'Pomidor', 6345, 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE `user` (
  `User_Db` int(11) NOT NULL,
  `Ranga` varchar(20) NOT NULL,
  `Nazwa_u` varchar(20) NOT NULL,
  `Haslo` varchar(20) NOT NULL,
  `Imie` varchar(20) NOT NULL,
  `Nazwisko` varchar(20) NOT NULL,
  `Pesel` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_Db`, `Ranga`, `Nazwa_u`, `Haslo`, `Imie`, `Nazwisko`, `Pesel`) VALUES
(1, 'Wlasciciel', 'admin', 'admin', 'Patryk', 'Warchoła', '6345634563'),
(2, 'Pracownik', 'Patryk', 'Warchola', 'Patryk', 'Warchola', '64356453'),
(6, 'Pracownik', 'Adam', 'Adam', 'Adam', 'Konieczny', '123456789');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`User_Db`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `User_Db` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
