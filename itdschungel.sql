CREATE TABLE `bookedcourse` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `course` int(11) NOT NULL,
  `course_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `course_category` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `difficulty` int(11) NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `course` (`id`, `course_category`, `title`, `short_description`, `long_description`, `difficulty`, `location`) VALUES
(1, 1, 'HTML-Grundkurs', 'Neben dem HTML Grundgerüst werden auch weitere Elemente der Syntax vorgestellt.', 'TODO', 1, 'TODO'),
(2, 1, 'HTML-Erweiterungen', 'Erstellen eines Seitenlayouts Mittels HTML und CSS.', 'TODO', 3, 'TODO'),
(3, 1, 'Responsives Webdesign', 'Erstellen einer responsive Webseite für verschiedene Geräte und Viewports.', 'TODO', 3, 'TODO'),
(4, 1, 'PHP-Grundkurs', 'Lerne den Grundaufbau einer PHP-Anwendung sowie die Syntax.', 'TODO', 1, 'TODO'),
(5, 1, 'PHP-Erweiterungen', 'Erweiterte Kenntnisse über PHP wie Schleifen, Anweisungen und verschaltete Abfragen.', 'TODO', 1, 'TODO');

CREATE TABLE `coursecategory` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `coursecategory` (`id`, `title`) VALUES
(1, 'Webseiten'),
(2, 'Programmierung');

CREATE TABLE `coursedate` (
  `id` int(11) NOT NULL,
  `course_date` date NOT NULL,
  `course` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `forename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `security_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `user` (`id`, `username`, `password`, `email`, `forename`, `lastname`, `security_key`) VALUES
(1, 'ahe', '559e642972ad12ff5b16cd71f1e2b50aa95a522c', 'privat@andreas-heimann.com', 'Andreas', 'Heimann', '5c6c003f088de');

ALTER TABLE `bookedcourse`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_bookedcourse__course` (`course`),
  ADD KEY `idx_bookedcourse__course_date` (`course_date`),
  ADD KEY `idx_bookedcourse__user` (`user`);

ALTER TABLE `course`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_course__course_category` (`course_category`);

ALTER TABLE `coursecategory`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `coursedate`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_coursedate__course` (`course`);

ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `bookedcourse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `coursedate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

/* Constraints */
ALTER TABLE `bookedcourse`
  ADD CONSTRAINT `fk_bookedcourse__course` FOREIGN KEY (`course`) REFERENCES `course` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_bookedcourse__course_date` FOREIGN KEY (`course_date`) REFERENCES `coursedate` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_bookedcourse__user` FOREIGN KEY (`user`) REFERENCES `user` (`id`) ON DELETE CASCADE;

ALTER TABLE `course`
  ADD CONSTRAINT `fk_course__course_category` FOREIGN KEY (`course_category`) REFERENCES `coursecategory` (`id`) ON DELETE CASCADE;

ALTER TABLE `coursedate`
  ADD CONSTRAINT `fk_coursedate__course` FOREIGN KEY (`course`) REFERENCES `course` (`id`) ON DELETE CASCADE;
COMMIT;