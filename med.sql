-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1

-- Czas generowania: 30 Mar 2022, 12:22
=======
-- Czas generowania: 30 Mar 2022, 11:16

-- Wersja serwera: 10.4.22-MariaDB
-- Wersja PHP: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `med`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `appointment`
--

INSERT INTO `appointment` (`id`, `staff_id`, `date`) VALUES
(1, 1, '2022-03-24 12:00:00'),
(2, 1, '2022-03-24 14:00:00'),
(3, 2, '2022-03-24 13:00:00');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `phone` varchar(32) NOT NULL,
  `pesel` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `patient`
--

INSERT INTO `patient` (`id`, `firstName`, `lastName`, `phone`, `pesel`) VALUES
(6, 'Krystian', 'Zelmanski', '123456789', ''),
(7, 'Karol ', 'Złotowski', '147258369', '12345'),
(8, 'Edwin', 'Piątek', '111222333', ''),
(9, 'Dawid', 'Karaluch', '666555444', '00000000000'),
(10, 'Krystyna', 'Zak', '123654789', '258369147');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `patientappointment`
--

CREATE TABLE `patientappointment` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `appointment_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `patientappointment`
--

INSERT INTO `patientappointment` (`id`, `patient_id`, `appointment_id`) VALUES
<<<<<<< HEAD
(6, 6, 1),
(7, 7, 2),
(8, 8, 3),
(9, 10, 2),
(10, 10, 2),
(11, 7, 3);
=======
(1, 1, 1),
(2, 2, 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pesel`
--

CREATE TABLE `pesel` (
  `pesel` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
>>>>>>> b7b7fe91fbf28868c340787505a64d511b3430ff

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `staff`
--

INSERT INTO `staff` (`id`, `firstName`, `lastName`) VALUES
(1, 'Jan', 'Kowalski'),
(2, 'Adam', 'Nowak'),
(3, 'Iwona', 'Tabletka'),
(4, 'Piotr', 'Wierciszpara');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `staff_id` (`staff_id`);

--
-- Indeksy dla tabeli `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `patientappointment`
--
ALTER TABLE `patientappointment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appointment_id` (`appointment_id`);

--
-- Indeksy dla tabeli `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT dla tabeli `patientappointment`
--
ALTER TABLE `patientappointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT dla tabeli `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
