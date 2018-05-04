DROP TABLE IF EXISTS `demande`;
CREATE TABLE `demande` (
  `idDemande` int(5) NOT NULL AUTO_INCREMENT,
  `personne` varchar(100) NOT NULL,
  `genre` varchar(100) NOT NULL,
  `ville` varchar(100) NOT NULL,
  `budget` int(7) NOT NULL,
  `superficie` int(5) NOT NULL,
  `categorie` varchar(100) NOT NULL,
  PRIMARY KEY (`idDemande`),
  KEY `Personne` (`personne`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `demande` (`idDemande`, `personne`, `genre`, `ville`, `budget`, `superficie`, `categorie`) VALUES
(1,	'william',	'maison',	'saint-denis',	530000,	120,	'vente'),
(2,	'gaetan',	'appartement',	'saint-paul',	120000,	18,	'vente'),
(3,	'mehdi',	'appartement',	'saint-paul',	145000,	21,	'vente'),
(4,	'brigitte',	'appartement',	'saint-paul',	172000,	26,	'vente'),
(5,	'sarah',	'appartement',	'saint-pierre',	450000,	55,	'vente'),
(6,	'lucas',	'maison',	'saint-denis',	600000,	55,	'vente'),
(7,	'patrick',	'appartement',	'saint-denis',	371000,	40,	'vente'),
(8,	'valentine',	'appartement',	'saint-denis',	253000,	25,	'vente'),
(9,	'samuel',	'appartement',	'saint-denis',	162000,	15,	'vente'),
(10,	'simon',	'appartement',	'saint-denis',	720000,	80,	'vente'),
(11,	'yvon',	'appartement',	'saint-pierre',	68000,	20,	'vente'),
(12,	'camille',	'maison',	'saint-pierre',	558000,	65,	'vente'),
(13,	'julie',	'appartement',	'saint-denis',	49000,	15,	'vente'),
(14,	'leo',	'maison',	'saint-denis',	1100000,	100,	'vente'),
(15,	'celia',	'appartement',	'saint-denis',	145000,	15,	'vente'),
(16,	'anna',	'appartement',	'saint-pierre',	123800,	21,	'vente'),
(17,	'sabrina',	'appartement',	'saint-pierre',	690000,	70,	'vente'),
(18,	'franck',	'appartement',	'saint-pierre',	1500000,	100,	'vente'),
(19,	'aurore',	'appartement',	'saint-denis',	60000,	20,	'vente'),
(20,	'marie',	'appartement',	'saint-denis',	75000,	30,	'vente'),
(21,	'oceane',	'appartement',	'saint-paul',	68000,	30,	'vente'),
(22,	'enzo',	'maison',	'saint-paul',	413000,	40,	'vente'),
(23,	'ines',	'appartement',	'saint-paul',	70000,	45,	'vente'),
(24,	'hugo',	'appartement',	'saint-denis',	495000,	40,	'vente'),
(25,	'jonathan',	'maison',	'saint-denis',	650000,	60,	'vente'),
(26,	'axelle',	'appartement',	'saint-pierre',	110000,	12,	'vente'),
(27,	'morgane',	'appartement',	'saint-pierre',	50000,	17,	'vente'),
(28,	'melissa',	'appartement',	'saint-denis',	120000,	40,	'vente'),
(29,	'kevin',	'appartement',	'saint-denis',	150000,	50,	'vente'),
(30,	'ophelie',	'appartement',	'saint-denis',	377500,	40,	'vente'),
(31,	'ophelie',	'appartement',	'saint-denis',	63000,	20,	'vente');