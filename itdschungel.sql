-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 25. Mrz 2019 um 20:38
-- Server-Version: 10.1.36-MariaDB
-- PHP-Version: 7.2.11

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
(1, 1, 'HTML-Grundkurs', 'Neben dem HTML Grundgerüst werden auch weitere Elemente der Syntax vorgestellt.', 'HTML bedeutet Hypertext Markup Language und wird genutzt, um Internetseiten mit Inhalt zu füllen. Wie genau das geht lernst Du in diesem Kurs. Dazu gehört natürlich auch, welche Regeln bei dem Aufbau und dem Aussehen von HTML-Elementen zu beachten sind, sprich der Syntax von HTML. ', 1, 'TODO'),
(2, 1, 'HTML-Erweiterungen', 'Erstellen eines Seitenlayouts Mittels HTML und CSS.', 'Wenn Du die Grundlagen in HTML schon beherrscht, bist Du sicher erfreut, wenn die Webseite auch einem ästhetischen Anspruch gerecht wird. Dies kannst Du mit CSS erreichen. CSS steht für Cascading Style Sheets und ermöglicht das Erstellen von Layouts und zur individuellen Gestaltung von HTML-Elementen.', 3, 'TODO'),
(3, 1, 'Responsives Webdesign', 'Erstellen einer responsive Webseite für verschiedene Geräte und Viewports.', '„Mit der Zeit gehen“ - Dies gilt besonders für das Webdesign. Dazu gehört heutzutage das Erstellen einer responsiven Website. Das ist erforderlich, wenn die Webseite für verschiedene Geräte optimiert sein soll, also für den Computer, das Tablet und auch für das Smartphone. Wie das funktioniert kannst Du in hier lernen.', 3, 'TODO'),
(4, 1, 'PHP-Grundkurs', 'Lerne den Grundaufbau einer PHP-Anwendung sowie die Syntax.', 'Wenn Dir eine Webseite nur zum Betrachten nicht reicht, du auch Formulare nutzen möchtest um Informationen zu übermitteln, ist die Anwendung von PHP von Nöten. PHP steht für Hypertext Preprocessor, früher Personal Home Page Tools und ist eine serverseitige Skriptsprache. Die Grundlagen dessen kannst Du dir in diesem Kurs aneignen.', 1, 'TODO'),
(5, 1, 'PHP-Erweiterungen', 'Erweiterte Kenntnisse über PHP wie Schleifen, Anweisungen und verschaltete Abfragen.', 'PHP kann vieles und wenn du die Grundlagen schon beherrscht, kannst Du hier lernen, wie man mit PHP Schleifen, Anweisungen und  verschaltete Abfragen erstellt.', 1, 'TODO');

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

--
-- Daten für Tabelle `coursedate`
--

INSERT INTO `coursedate` (`id`, `course_date`, `course`) VALUES
(1, '2019-03-07', 1),
(2, '2019-03-08', 1),
(3, '2019-03-14', 4),
(4, '2019-03-15', 4);

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
  `adress` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` int(5) DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `security_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `forename`, `lastname`, `adress`, `zip`, `city`, `security_key`) VALUES
(1, 'ahe', '559e642972ad12ff5b16cd71f1e2b50aa95a522c', 'andreas@iklikla.de', 'Andreas', 'Heimann', 'Kranichstraße22 ', 46282, 'Dorsten', '5c992d1100c6c'),
(2, 'hansi', 'ddd7c80da5a004e7abb70e30498ab1b8d9e6da16', 'tolle@email.de', 'Hans', 'Franz', NULL, NULL, NULL, '5c6d436e95c66');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
