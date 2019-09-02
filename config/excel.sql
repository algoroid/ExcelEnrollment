-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2019 at 06:02 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `excel`
--

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `regi` int(11) DEFAULT NULL,
  `provi` int(11) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `regi`, `provi`, `city`) VALUES
(1, 1, 1, 'Caloocan City'),
(2, 1, 1, 'Las Pinas City'),
(3, 1, 1, 'Makati City'),
(4, 1, 1, 'Malabon City'),
(5, 1, 1, 'Mandaluyong City'),
(6, 1, 1, 'Manila City'),
(7, 1, 1, 'Marikina City'),
(8, 1, 1, 'Muntinlupa City'),
(9, 1, 1, 'Navotas City'),
(10, 1, 1, 'Paranaque City'),
(11, 1, 1, 'Pasay City'),
(12, 1, 1, 'Pasig City'),
(13, 1, 1, 'Pateros'),
(14, 1, 1, 'Quezon City'),
(15, 1, 1, 'San Juan City'),
(16, 1, 1, 'Taguig City'),
(17, 1, 1, 'Valenzuela City'),
(18, 2, 2, 'Adams'),
(19, 2, 2, 'Bacarra'),
(20, 2, 2, 'Badoc'),
(21, 2, 2, 'Bangui'),
(22, 2, 2, 'Banna'),
(23, 2, 2, 'Batac'),
(24, 2, 2, 'Burgos'),
(25, 2, 2, 'Carasi'),
(26, 2, 2, 'Currimao'),
(27, 2, 2, 'Dingras'),
(28, 2, 2, 'Dumalneg'),
(29, 2, 2, 'Laoag'),
(30, 2, 2, 'Marcos'),
(31, 2, 2, 'Nueva Era'),
(32, 2, 2, 'Pagudpud'),
(33, 2, 2, 'Paoay'),
(34, 2, 2, 'Pasuquin'),
(35, 2, 2, 'Piddig'),
(36, 2, 2, 'Pinili'),
(37, 2, 2, 'San Nicolas'),
(38, 2, 2, 'Sarrat'),
(39, 2, 2, 'Solsona'),
(40, 2, 2, 'Vintar'),
(41, 2, 3, 'Alilem'),
(42, 2, 3, 'Banayoyo'),
(43, 2, 3, 'Bantay'),
(44, 2, 3, 'Burgos'),
(45, 2, 3, 'Cabugao'),
(46, 2, 3, 'Candon'),
(47, 2, 3, 'Caoayan'),
(48, 2, 3, 'Cervantes'),
(49, 2, 3, 'Galimuyod'),
(50, 2, 3, 'Gregorio Del Pilar'),
(51, 2, 3, 'Lidlidda'),
(52, 2, 3, 'Magsingal'),
(53, 2, 3, 'Nagbukel'),
(54, 2, 3, 'Narvacan'),
(55, 2, 3, 'Quirino'),
(56, 2, 3, 'Salcedo'),
(57, 2, 3, 'San Emilio'),
(58, 2, 3, 'San Esteban'),
(59, 2, 3, 'San Ildefonso'),
(60, 2, 3, 'San Juan'),
(61, 2, 3, 'San Vicente'),
(62, 2, 3, 'Santa'),
(63, 2, 3, 'Santa Catalina'),
(64, 2, 3, 'Santa Cruz'),
(65, 2, 3, 'Santa Lucia'),
(66, 2, 3, 'Santa Maria'),
(67, 2, 3, 'Santiago'),
(68, 2, 3, 'Santo Domingo'),
(69, 2, 3, 'Sigay'),
(70, 2, 3, 'Sinait'),
(71, 2, 3, 'Sugpon'),
(72, 2, 3, 'Suyo'),
(73, 2, 3, 'Tagudin'),
(74, 2, 3, 'Vigan');

-- --------------------------------------------------------

--
-- Table structure for table `enrollmentinfo`
--

CREATE TABLE `enrollmentinfo` (
  `id` int(11) NOT NULL,
  `studentname` varchar(255) NOT NULL,
  `studentid` varchar(255) NOT NULL,
  `excourse` varchar(255) NOT NULL,
  `trainer` varchar(255) NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `tesdauli` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `datecreated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enrollmentinfo`
--

INSERT INTO `enrollmentinfo` (`id`, `studentname`, `studentid`, `excourse`, `trainer`, `startdate`, `enddate`, `tesdauli`, `type`, `datecreated`) VALUES
(2, 'Malonzo, Earl John', '1', 'Web Development Training', 'Jonathan T. Estacio', '2019-08-13', '2019-09-03', 'MER-96-343-13039-001', 'TWSP - Training for Work Scholarship Programs', '2019-09-02 23:27:39'),
(3, 'Malonzo, Earl John', '1', 'Creative Web Design Training', 'Jonathan T. Estacio', '2019-08-13', '2019-09-03', 'MER-96-343-13039-001', 'TWSP - Training for Work Scholarship Programs', '2019-09-02 23:28:29'),
(4, 'Monkey D., Luffy', '2', 'Event Management Services Training', 'Jonathan T. Estacio', '2019-08-03', '2019-08-03', 'MER-96-343-13039-001', '', '2019-09-02 23:48:09');

-- --------------------------------------------------------

--
-- Table structure for table `excelcourse`
--

CREATE TABLE `excelcourse` (
  `id` int(11) NOT NULL,
  `excourse` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `excelcourse`
--

INSERT INTO `excelcourse` (`id`, `excourse`) VALUES
(1, 'Creative Web Design Training'),
(2, 'Web Development Training'),
(3, 'Event Management Services Training'),
(4, 'Trainers Methodology LVL 1 Training'),
(5, 'Event Management Services Assesment'),
(6, 'Technical Drafting Assesment');

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

CREATE TABLE `province` (
  `id` int(11) NOT NULL,
  `regi` int(12) DEFAULT NULL,
  `provi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`id`, `regi`, `provi`) VALUES
(1, 1, 'Metro Manila'),
(2, 2, 'Ilocos Norte'),
(3, 2, 'Ilocos Sur'),
(4, 2, 'La Union'),
(5, 2, 'Pangasinan');

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE `region` (
  `id` int(11) NOT NULL,
  `regi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `region`
--

INSERT INTO `region` (`id`, `regi`) VALUES
(1, 'NCR'),
(2, 'I - Ilocos Region'),
(3, 'CAR'),
(4, 'II-Cagayan Valley'),
(5, 'III-Central Luzon'),
(6, 'IVA-CALABARZON'),
(7, 'IVB-MIMAROPA'),
(8, 'V-Bicol Region'),
(9, 'VI-Western Visayas'),
(10, 'VII-Central Visayas'),
(11, 'VIII-Eastern Visayas'),
(12, 'IX-Zamboanga Peninsula'),
(13, 'X-Northern Mindanao'),
(14, 'XI-Davao Region'),
(15, 'XII-SOCCSKSARGEN'),
(16, 'XIII-Caraga Region'),
(17, 'BARMM');

-- --------------------------------------------------------

--
-- Table structure for table `staffinfo`
--

CREATE TABLE `staffinfo` (
  `id` int(12) NOT NULL,
  `staffname` varchar(255) NOT NULL,
  `staffuser` varchar(255) NOT NULL,
  `staffpass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staffinfo`
--

INSERT INTO `staffinfo` (`id`, `staffname`, `staffuser`, `staffpass`) VALUES
(1, 'Administrator', 'admin', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `studentinfo`
--

CREATE TABLE `studentinfo` (
  `id` int(11) NOT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `middlename` varchar(255) DEFAULT NULL,
  `extensionname` varchar(255) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `bregi` varchar(255) DEFAULT NULL,
  `bprovi` varchar(255) DEFAULT NULL,
  `bcity` varchar(255) DEFAULT NULL,
  `sex` varchar(255) DEFAULT NULL,
  `civilstatus` varchar(255) DEFAULT NULL,
  `employmentstatus` varchar(255) DEFAULT NULL,
  `educattain` varchar(255) DEFAULT NULL,
  `addressnumstreet` varchar(255) DEFAULT NULL,
  `addressbldgcomp` varchar(255) DEFAULT NULL,
  `addressbrgy` varchar(255) DEFAULT NULL,
  `addressregion` varchar(255) DEFAULT NULL,
  `addressprovince` varchar(255) DEFAULT NULL,
  `addresscity` varchar(255) DEFAULT NULL,
  `emailadd` varchar(255) DEFAULT NULL,
  `contactnum` varchar(255) DEFAULT NULL,
  `fbuser` varchar(255) DEFAULT NULL,
  `parentname` varchar(255) DEFAULT NULL,
  `parentcontact` varchar(255) DEFAULT NULL,
  `parentadd` varchar(255) DEFAULT NULL,
  `datecreated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentinfo`
--

INSERT INTO `studentinfo` (`id`, `lastname`, `firstname`, `middlename`, `extensionname`, `birthday`, `bregi`, `bprovi`, `bcity`, `sex`, `civilstatus`, `employmentstatus`, `educattain`, `addressnumstreet`, `addressbldgcomp`, `addressbrgy`, `addressregion`, `addressprovince`, `addresscity`, `emailadd`, `contactnum`, `fbuser`, `parentname`, `parentcontact`, `parentadd`, `datecreated`) VALUES
(1, 'Malonzo', 'Earl John', 'Romero', '', '1996-09-23', 'NCR', 'Metro Manila', 'Taguig City', 'Male', 'Single', 'Unemployed', 'CollegeGraduateorHigher', 'B1 L22 Ilang-ilang St.', 'SAMAMA I Compound', 'Ligid-Tipas', 'NCR', 'Metro Manila', 'SAMAMA I Compound', 'ejmalonzo23@gmail.com', '776053096', 'koyaewl', 'Raul G. Malonzo', '162470242', 'Taguig City', '2019-08-02 11:02:12'),
(2, 'Monkey D.', 'Luffy', '', '', '1997-05-05', 'NCR', 'Metro Manila', 'Manila City', 'Male', 'Single', 'Employed', 'CollegeGraduateorHigher', '123 Blue Sea', '', 'East Blue', 'NCR', 'Metro Manila', 'Pasay City', 'mugiwara@onepiece.com', '776053096', 'mugiwaraluffy', 'Monkey D. Dragon', '162470242', 'Taguig City', '2019-08-03 02:05:04');

-- --------------------------------------------------------

--
-- Table structure for table `tesdascho`
--

CREATE TABLE `tesdascho` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tesdascho`
--

INSERT INTO `tesdascho` (`id`, `type`) VALUES
(1, 'TWSP - Training for Work Scholarship Programs'),
(2, 'PESFA - Private Education Student Financial Assistance'),
(3, 'STEP - Special Training for Employment Program'),
(4, 'UAQTEA - Universal Access to Quality Tertiary Education Act');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`),
  ADD KEY `regi` (`regi`),
  ADD KEY `provi` (`provi`);

--
-- Indexes for table `enrollmentinfo`
--
ALTER TABLE `enrollmentinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `excelcourse`
--
ALTER TABLE `excelcourse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`id`),
  ADD KEY `regi` (`regi`);

--
-- Indexes for table `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staffinfo`
--
ALTER TABLE `staffinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studentinfo`
--
ALTER TABLE `studentinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tesdascho`
--
ALTER TABLE `tesdascho`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `enrollmentinfo`
--
ALTER TABLE `enrollmentinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `excelcourse`
--
ALTER TABLE `excelcourse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `province`
--
ALTER TABLE `province`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `region`
--
ALTER TABLE `region`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `staffinfo`
--
ALTER TABLE `staffinfo`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `studentinfo`
--
ALTER TABLE `studentinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tesdascho`
--
ALTER TABLE `tesdascho`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `city_ibfk_1` FOREIGN KEY (`regi`) REFERENCES `region` (`id`),
  ADD CONSTRAINT `city_ibfk_2` FOREIGN KEY (`provi`) REFERENCES `province` (`id`);

--
-- Constraints for table `province`
--
ALTER TABLE `province`
  ADD CONSTRAINT `province_ibfk_1` FOREIGN KEY (`regi`) REFERENCES `region` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
