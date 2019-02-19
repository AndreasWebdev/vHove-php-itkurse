-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 19. Feb 2019 um 15:24
-- Server-Version: 10.1.25-MariaDB
-- PHP-Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `itdschungel`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bookedcourse`
--

CREATE TABLE `bookedcourse` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `course` int(11) NOT NULL,
  `course_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `course_category` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `difficulty` int(11) NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `course`
--

INSERT INTO `course` (`id`, `course_category`, `title`, `short_description`, `long_description`, `difficulty`, `location`) VALUES
(1, 1, 'HTML-Grundkurs', 'Neben dem HTML Grundgerüst werden auch weitere Elemente der Syntax vorgestellt.', 'TODO', 1, 'TODO'),
(2, 1, 'HTML-Erweiterungen', 'Erstellen eines Seitenlayouts Mittels HTML und CSS.', 'TODO', 3, 'TODO'),
(3, 1, 'Responsives Webdesign', 'Erstellen einer responsive Webseite für verschiedene Geräte und Viewports.', 'TODO', 3, 'TODO'),
(4, 1, 'PHP-Grundkurs', 'Lerne den Grundaufbau einer PHP-Anwendung sowie die Syntax.', 'TODO', 1, 'TODO'),
(5, 1, 'PHP-Erweiterungen', 'Erweiterte Kenntnisse über PHP wie Schleifen, Anweisungen und verschaltete Abfragen.', 'TODO', 1, 'TODO');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `coursecategory`
--

CREATE TABLE `coursecategory` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `coursecategory`
--

INSERT INTO `coursecategory` (`id`, `title`) VALUES
(1, 'Webseiten'),
(2, 'Programmierung');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `coursedate`
--

CREATE TABLE `coursedate` (
  `id` int(11) NOT NULL,
  `course_date` date NOT NULL,
  `course` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `forename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `security_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `forename`, `lastname`, `security_key`) VALUES
(1, 'ahe', '559e642972ad12ff5b16cd71f1e2b50aa95a522c', 'privat@andreas-heimann.com', 'Andreas', 'Heimann', '5c6c003f088de');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `bookedcourse`
--
ALTER TABLE `bookedcourse`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_bookedcourse__course` (`course`),
  ADD KEY `idx_bookedcourse__course_date` (`course_date`),
  ADD KEY `idx_bookedcourse__user` (`user`);

--
-- Indizes für die Tabelle `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_course__course_category` (`course_category`);

--
-- Indizes für die Tabelle `coursecategory`
--
ALTER TABLE `coursecategory`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `coursedate`
--
ALTER TABLE `coursedate`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_coursedate__course` (`course`);

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `bookedcourse`
--
ALTER TABLE `bookedcourse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT für Tabelle `coursecategory`
--
ALTER TABLE `coursecategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT für Tabelle `coursedate`
--
ALTER TABLE `coursedate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `bookedcourse`
--
ALTER TABLE `bookedcourse`
  ADD CONSTRAINT `fk_bookedcourse__course` FOREIGN KEY (`course`) REFERENCES `course` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_bookedcourse__course_date` FOREIGN KEY (`course_date`) REFERENCES `coursedate` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_bookedcourse__user` FOREIGN KEY (`user`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints der Tabelle `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `fk_course__course_category` FOREIGN KEY (`course_category`) REFERENCES `coursecategory` (`id`) ON DELETE CASCADE;

--
-- Constraints der Tabelle `coursedate`
--
ALTER TABLE `coursedate`
  ADD CONSTRAINT `fk_coursedate__course` FOREIGN KEY (`course`) REFERENCES `course` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
