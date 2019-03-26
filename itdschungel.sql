-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Erstellungszeit: 26. Mrz 2019 um 21:36
-- Server-Version: 5.7.23
-- PHP-Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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

--
-- Daten für Tabelle `bookedcourse`
--

INSERT INTO `bookedcourse` (`id`, `user`, `course`, `course_date`) VALUES
(22, 1, 4, 11),
(23, 1, 6, 15);

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
  `difficulty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `course`
--

INSERT INTO `course` (`id`, `course_category`, `title`, `short_description`, `long_description`, `difficulty`) VALUES
(1, 1, 'HTML-Grundkurs', 'Neben dem HTML Grundgerüst werden auch weitere Elemente der Syntax vorgestellt.', 'HTML bedeutet Hypertext Markup Language und wird genutzt, um Internetseiten mit Inhalt zu füllen. Wie genau das geht lernst Du in diesem Kurs. Dazu gehört natürlich auch, welche Regeln bei dem Aufbau und dem Aussehen von HTML-Elementen zu beachten sind, sprich der Syntax von HTML. ', 1),
(2, 1, 'HTML-Erweiterungen', 'Erstellen eines Seitenlayouts Mittels HTML und CSS.', 'Wenn Du die Grundlagen in HTML schon beherrscht, bist Du sicher erfreut, wenn die Webseite auch einem ästhetischen Anspruch gerecht wird. Dies kannst Du mit CSS erreichen. CSS steht für Cascading Style Sheets und ermöglicht das Erstellen von Layouts und zur individuellen Gestaltung von HTML-Elementen.', 3),
(3, 1, 'Responsives Webdesign', 'Erstellen einer responsive Webseite für verschiedene Geräte und Viewports.', '„Mit der Zeit gehen“ - Dies gilt besonders für das Webdesign. Dazu gehört heutzutage das Erstellen einer responsiven Website. Das ist erforderlich, wenn die Webseite für verschiedene Geräte optimiert sein soll, also für den Computer, das Tablet und auch für das Smartphone. Wie das funktioniert kannst Du in hier lernen.', 3),
(4, 1, 'PHP-Grundkurs', 'Lerne den Grundaufbau einer PHP-Anwendung sowie die Syntax.', 'Wenn Dir eine Webseite nur zum Betrachten nicht reicht, du auch Formulare nutzen möchtest um Informationen zu übermitteln, ist die Anwendung von PHP von Nöten. PHP steht für Hypertext Preprocessor, früher Personal Home Page Tools und ist eine serverseitige Skriptsprache. Die Grundlagen dessen kannst Du dir in diesem Kurs aneignen.', 1),
(5, 1, 'PHP-Erweiterungen', 'Erweiterte Kenntnisse über PHP wie Schleifen, Anweisungen und verschaltete Abfragen.', 'PHP kann vieles und wenn du die Grundlagen schon beherrscht, kannst Du hier lernen, wie man mit PHP Schleifen, Anweisungen und  verschaltete Abfragen erstellt.', 1),
(6, 2, 'Grundkurs C++', 'Einführung in C++ mit einfachen Erweiterungen bei Nutzung von Ein- und Ausgabestreams', 'Um eigene Programme zu erstellen kannst Du C++ nutzen. Eine Programmiersprache für die Systemprogrammierung und der Anwendungsprogrammierung.', 2),
(7, 2, 'C++ für Fortgeschrittene', 'Pointer, Templates und OOP. Dieser Kurs vermittelt fortgeschrittene Inhalte zu C++.', 'Mehr C++ für die erfahreneren Programmierer. Hier geht es um fortgeschrittenere Inhalte zu C++, wie beispielsweise die Erstellung von Pointer, Templates und das objektorientierte Programmieren.', 3),
(8, 2, 'Einstieg in die Programmierung', 'Bekomme einen Überblick über den Software-Entwicklungsprozess und die Planung von Programmen.', 'Wenn Du dich für das Programmieren interessierst und noch sehr unerfahren in diesem Bereich bist, dann ist der Einstiegskurs zur Programmierung von uns genau das richtige für dich. Hier bekommst Du einen Überblick über denn Software Entwicklungsprozess und die Planung von Programmen.', 1),
(9, 2, 'XML-Programmierung', 'Lerne, wie du durch XML deine Datenweitergabe optimieren kannst.', 'In diesem Kurs lernst du die Grundlagen von XML und wie man XML in die Datenwiedergabe einbinden kann, um Arbeitsabläufe zu optimieren.', 1);

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
(5, '2019-04-27', 1),
(6, '2019-04-28', 1),
(7, '2019-05-11', 2),
(8, '2019-05-12', 2),
(9, '2019-05-25', 3),
(10, '2019-05-26', 3),
(11, '2019-06-01', 4),
(12, '2019-06-02', 4),
(13, '2019-06-15', 5),
(14, '2019-06-16', 5),
(15, '2019-04-27', 6),
(16, '2019-04-28', 6),
(17, '2019-05-11', 7),
(18, '2019-05-12', 7),
(19, '2019-04-27', 8),
(20, '2019-04-28', 8),
(21, '2019-06-01', 9),
(22, '2019-06-02', 9);

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
(1, 'ahe', '559e642972ad12ff5b16cd71f1e2b50aa95a522c', 'privat@andreas-heimann.com', 'Felix', 'Heimann', 'Kranichstraße 22', 46282, 'Dorsten', '5c9a9992ccaba'),
(2, 'hansi', 'franz', 'tolle@email.de', 'Hans', 'Franz', NULL, NULL, NULL, '5c6d436e95c66'),
(3, 'andi1234', '9c789101240d97a588e628c1dcd16b3a914765a1', 'andreas@it-dschungel.de', 'Andreas', 'Heimann', NULL, NULL, NULL, '5c9a9989b1b1c');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT für Tabelle `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT für Tabelle `coursecategory`
--
ALTER TABLE `coursecategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `coursedate`
--
ALTER TABLE `coursedate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
