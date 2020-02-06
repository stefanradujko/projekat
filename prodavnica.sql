-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2019 at 09:37 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prodavnica`
--

-- --------------------------------------------------------

--
-- Table structure for table `proizvod`
--

CREATE TABLE `proizvod` (
  `proizvodID` int(11) NOT NULL,
  `proizvodNaziv` varchar(100) COLLATE utf8_croatian_ci NOT NULL,
  `brojSerije` int(11) NOT NULL,
  `proizvodStanje` int(11) NOT NULL,
  `proizvodCena` int(11) NOT NULL,
  `proizvodjacID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `proizvod`
--

INSERT INTO `proizvod` (`proizvodID`, `proizvodNaziv`, `brojSerije`, `proizvodStanje`, `proizvodCena`, `proizvodjacID`) VALUES
(1, 'Plavi marker', 12, 10, 100, 1),
(2, 'Crveni marker', 7, 40, 100, 1),
(4, 'Zeleni marker', 13, 28, 100, 1),
(5, 'Crveni marker', 16, 6, 150, 3),
(6, 'Plavi marker', 7, 35, 160, 2),
(7, 'Narandžasti marker', 18, 40, 160, 2),
(8, 'Crni marker', 9, 29, 150, 3),
(9, 'Zeleni marker', 18, 32, 150, 3),
(10, 'Rozi marker', 19, 5, 160, 2),
(11, 'Sveska karo A4', 5, 10, 60, 4),
(12, 'Sveska linija A4', 17, 24, 80, 1),
(13, 'Sveska linija A4', 9, 17, 60, 4),
(14, 'Sveska karo A4', 13, 44, 120, 2),
(16, 'Sveska karo A5', 20, 26, 50, 4),
(17, 'Sveska linija A5', 21, 11, 70, 1),
(18, 'Sveska linija A5', 14, 7, 100, 2),
(19, 'Sveska karo A5', 8, 9, 100, 2),
(20, 'Sveska karo A4', 5, 4, 80, 1),
(21, 'Olovka HB', 18, 8, 40, 1),
(22, 'Olovka B', 10, 15, 60, 1),
(23, 'Olovka 2B', 15, 20, 70, 1),
(24, 'Olovka B', 11, 16, 40, 3),
(25, 'Olovka HB', 6, 26, 25, 3),
(26, 'Gumica', 8, 8, 35, 7),
(27, 'Gumica', 20, 32, 20, 1),
(28, 'Rokovnik', 25, 44, 180, 3),
(29, 'Rokovnik', 15, 36, 250, 5),
(30, 'Rokovnik', 11, 28, 140, 6),
(31, 'Pernica', 9, 14, 200, 1),
(32, 'Pernica', 17, 19, 120, 7),
(33, 'Pernica manja', 20, 28, 150, 1),
(34, 'Stikeri', 24, 11, 110, 5),
(35, 'Stikeri', 20, 6, 80, 6);

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `id_korisnika` int(10) NOT NULL,
  `ime` varchar(15) COLLATE utf8_croatian_ci NOT NULL,
  `prezime` varchar(25) COLLATE utf8_croatian_ci NOT NULL,
  `email` varchar(25) COLLATE utf8_croatian_ci NOT NULL,
  `telefon` varchar(15) COLLATE utf8_croatian_ci NOT NULL,
  `username` varchar(25) COLLATE utf8_croatian_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_croatian_ci NOT NULL,
  `status` varchar(25) COLLATE utf8_croatian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`id_korisnika`, `ime`, `prezime`, `email`, `telefon`, `username`, `password`, `status`) VALUES
(33, 'Marina', 'Nikolić', 'marina@gmail.com', '0656941931', 'marina', 'e1209871cb72d792277b855fc4c02326', 'Korisnik'),
(34, 'Katarina', 'Novaković', 'katarina@gmail.com', '0644729719', 'katarina', '87038392ac66ac37bd56102044245373', 'Admin'),
(38, 'Stefan', 'Radujko', 'stefan@gmail.com', '0645830678', 'stefan', '44ccf1588e69044e52538b3768edd87d', 'Admin');


-- --------------------------------------------------------

--
-- Table structure for table `kupovina`
--

CREATE TABLE `kupovina` (
  `kupovinaID` int(10) NOT NULL,
  `proizvodID` int(10) NOT NULL,
  `kolicina` int(10) NOT NULL,
  `korisnik` varchar(50) COLLATE utf8_croatian_ci NOT NULL,
  `datum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `kupovina`
--

INSERT INTO `kupovina` (`kupovinaID`, `proizvodID`, `kolicina`, `korisnik`, `datum`) VALUES
(1, 30, 1, 'stefan', '2020-2-3'),
(2, 20, 2, 'stefan', '2020-2-3'),
(3, 10, 1, 'marina', '2020-2-3'),
(4, 1, 3, 'katarina', '2020-2-3');

-- --------------------------------------------------------

--
-- Table structure for table `proizvodjac`
--

CREATE TABLE `proizvodjac` (
  `proizvodjacID` int(11) NOT NULL,
  `proizvodjacNaziv` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `proizvodjacAdresa` varchar(50) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `proizvodjacDrzava` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `proizvodjac`
--

INSERT INTO `proizvodjac` (`proizvodjacID`, `proizvodjacNaziv`, `proizvodjacAdresa`, `proizvodjacDrzava`) VALUES
(1, 'Staedtler', 'Grosse Strasse 12', 'Nemаčka'),
(2, 'Faber-Castell', 'Kleine Strasse 9', 'Nemačka'),
(3, 'Rotring', 'Grosse Strasse 47', 'Nemačka'),
(4, 'Ilijanum', 'Svetog Save 22', 'Srbija'),
(5, 'PanGraf', 'Njegoševa 2', 'Srbija'),
(6, 'Stabilo', 'Bismarck Strasse 15', 'Nemačka'),
(7, 'Pelikan', 'Karađorđeva 18', 'Srbija');


--
-- Indexes for dumped tables
--

--
-- Indexes for table `proizvod`
--
ALTER TABLE `proizvod`
  ADD PRIMARY KEY (`proizvodID`);

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`id_korisnika`);

--
-- Indexes for table `kupovina`
--
ALTER TABLE `kupovina`
  ADD PRIMARY KEY (`kupovinaID`);

--
-- Indexes for table `proizvodjac`
--
ALTER TABLE `proizvodjac`
  ADD PRIMARY KEY (`proizvodjacID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `proizvod`
--
ALTER TABLE `proizvod`
  MODIFY `proizvodID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `id_korisnika` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `kupovina`
--
ALTER TABLE `kupovina`
  MODIFY `kupovinaID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `proizvodjac`
--
ALTER TABLE `proizvodjac`
  MODIFY `proizvodjacID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
