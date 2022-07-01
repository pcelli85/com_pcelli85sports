
--
-- Table structure for table `#__pcelli85sports`
--

CREATE TABLE IF NOT EXISTS `#__pcelli85sports` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `title` varchar(64) NOT NULL DEFAULT 'Campionato 2022',
  `date_event` datetime NOT NULL DEFAULT current_timestamp(),
  `location_event` text NOT NULL DEFAULT 'NOARNA',
  `team1_event` text NOT NULL DEFAULT 'NOARNA',
  `team2_event` text NOT NULL DEFAULT 'NOARNA',
  `categoria_id` text NOT NULL DEFAULT '1',
  `state` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 DEFAULT COLLATE utf8mb4_unicode_ci;

--
-- Dumping data for table `#__pcelli85sports`
--

-- INSERT IGNORE INTO `#__pcelli85sports` (`id`, `title`, `description`, `distance`, `toilets`, `cafe`, `hills`, `bogs`, `picture`, `width`, `height`, `alt`) VALUES
-- (1, 'City Centre', 'Highligts of Anycity', '5', 1, 1, 0, 0, NULL, NULL, NULL, ''),
-- (2, 'Woods', 'Woodland walk on hard paths', '4', 0, 0, 1, 1, NULL, NULL, NULL, ''),
-- (3, 'Hills', 'Hill walk with good views on established path.', '6', 0, 0, 3, 2, NULL, NULL, NULL, ''),
-- (4, 'Lake Thingy', 'Walk around the lake on an accessible path.', '2', 1, 1, 0, 0, NULL, NULL, NULL, ''),
-- (5, 'Castle Railway Track', 'Walk along the line of the old railway track from start point car park to Thing castle', '2', 1, 1, 0, 0, NULL, NULL, NULL, '');

INSERT IGNORE INTO `#__pcelli85sports` (`id`, `title`, `date_event`, `location_event`, `team1_event`, `team2_event`, `categoria_id`) VALUES
(1, 'Campionato 2022', '2022-04-12 16:00:00', 'NOARNA', 'ALDENO', 'NOARNA', 1),
(2, 'Open 2022 Master', '2022-08-10 10:30:00', 'ALDENO', 'ALDENO', 'FAEDO', 2),
(3, 'Torneo Italia 22', '2022-07-21 20:00:00', 'FAEDO', 'NOARNA', 'PATONE', 3),
(4, 'Noarna Torneo 22', '2022-06-20 21:00:00', 'PATONE', 'PATONE', 'NOARNA', 4),
(5, 'Campionato 2023', '2022-06-15 09:30:00', 'NOARNA', 'NOARNA', 'FAEDO', 2);

-- --------------------------------------------------------

--
-- Table structure for table `#__pcelli85sport_dates`
--

CREATE TABLE IF NOT EXISTS `#__pcelli85sport_dates` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `walk_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `weather` varchar(256) DEFAULT NULL,
  `state` TINYINT NOT NULL DEFAULT '1',
  KEY `idx_walk` (`walk_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 DEFAULT COLLATE utf8mb4_unicode_ci;

--
-- Dumping data for table `#__pcelli85sport_dates`
--

INSERT IGNORE INTO `#__pcelli85sport_dates` (`id`, `walk_id`, `date`, `weather`) VALUES
(1, 1, '2019-05-12', 'Dry and Sunny'),
(2, 2, '2019-06-09', 'Wet and Windy'),
(3, 3, '2019-01-01', 'Cold and wet'),
(4, 4, '2019-01-20', 'Bright but frosty'),
(5, 5, '2019-04-28', 'Dry and warm'),
(6, 1, '2019-05-12', 'Wet and windy'),
(7, 3, '2019-06-09', 'Hot and dry'),
(8, 5, '2019-07-21', 'Overcast but warm and humid');

-- --------------------------------------------------------

--
-- Table structure for table `#__pcelli85sport_dates`
--

CREATE TABLE IF NOT EXISTS `#__pcelli85sports_categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `categoria` varchar(64) NOT NULL DEFAULT 'Nessuna Categoria',
  `state` TINYINT NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 DEFAULT COLLATE utf8mb4_unicode_ci;

--
-- Dumping data for table `#__pcelli85sport_dates`
--

INSERT IGNORE INTO `#__pcelli85sports_categorie` (`id`, `categoria`) VALUES
(1, 'Pulcini'),
(2, 'Mini'),
(3, 'Esordienti'),
(4, 'Serie A'),
(5, 'Serie C');
