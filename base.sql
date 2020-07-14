CREATE TABLE `donedays` (
  `id` int(11) NOT NULL,
  `newssource` varchar(5) NOT NULL,
  `doneday` date NOT NULL,
  `daynumber` int(11) NOT NULL,
  `donecount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `headlines`
--

CREATE TABLE `headlines` (
  `id` int(11) NOT NULL,
  `newssource` varchar(5) NOT NULL,
  `label` date NOT NULL,
  `jahr` int(4) NOT NULL,
  `monat` int(2) NOT NULL,
  `tag` int(2) NOT NULL,
  `wochentag` int(1) NOT NULL,
  `kalenderwoche` int(2) NOT NULL,
  `headline` varchar(270) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `link` varchar(512) NOT NULL,
  `msgmd5` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `newssources`
--

CREATE TABLE `newssources` (
  `id` int(11) NOT NULL,
  `shortname` varchar(5) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `linkbase` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `newssources`
--

INSERT INTO `newssources` (`id`, `shortname`, `fullname`, `linkbase`) VALUES
(1, 'ex', 'Express', 'https://www.express.co.uk'),
(2, 'dm', 'Daily Mail', 'https://www.dailymail.co.uk');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `donedays`
--
ALTER TABLE `donedays`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ddi` (`doneday`),
  ADD KEY `nsid` (`newssource`);

--
-- Indizes für die Tabelle `headlines`
--
ALTER TABLE `headlines`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uni` (`msgmd5`),
  ADD KEY `Newssourceindex` (`newssource`);
ALTER TABLE `headlines` ADD FULLTEXT KEY `FullTextHeadlines` (`headline`);

