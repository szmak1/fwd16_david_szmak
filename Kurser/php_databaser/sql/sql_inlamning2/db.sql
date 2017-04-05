-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 05, 2017 at 05:57 PM
-- Server version: 5.6.35
-- PHP Version: 7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `Asylum`
--
CREATE DATABASE IF NOT EXISTS `Asylum` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `Asylum`;

-- --------------------------------------------------------

--
-- Stand-in structure for view `1_antal_insjukna_i_olika_sjukdomar`
-- (See below for the actual view)
--
CREATE TABLE `1_antal_insjukna_i_olika_sjukdomar` (
`PatientFname` varchar(255)
,`Diagnose_ID` int(11)
,`DiagnoseName` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `2_antal insjukna patienter`
-- (See below for the actual view)
--
CREATE TABLE `2_antal insjukna patienter` (
`COUNT(MTM_Patient_Diagnose.Diagnose_ID)` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `3_visa_olika_mediciner_och_dosering_för_en_viss_sjukdom`
-- (See below for the actual view)
--
CREATE TABLE `3_visa_olika_mediciner_och_dosering_för_en_viss_sjukdom` (
`DiagnoseName` varchar(255)
,`MedicineName` varchar(255)
,`MedicineDose` int(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `4_vilka_sjuksköterskor_som_behandlar_en_viss_patient`
-- (See below for the actual view)
--
CREATE TABLE `4_vilka_sjuksköterskor_som_behandlar_en_viss_patient` (
`Nurse_ID` int(11)
,`NurseFname` varchar(255)
,`Patient_ID` int(11)
,`PatientFname` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `5_visa_vilka_patienter_behandlas_av_en_läkare`
-- (See below for the actual view)
--
CREATE TABLE `5_visa_vilka_patienter_behandlas_av_en_läkare` (
`DoctorFname` varchar(255)
,`PatientFname` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `Diagnose`
--

CREATE TABLE `Diagnose` (
  `Diagnose_ID` int(11) NOT NULL,
  `DiagnoseName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Diagnose`
--

INSERT INTO `Diagnose` (`Diagnose_ID`, `DiagnoseName`) VALUES
(1, 'Schizophrenia'),
(2, 'Compulsive Disorder'),
(3, 'Depression'),
(4, 'Borderline Personality Disorder'),
(5, 'SchizoAffective Disorder'),
(6, 'Antisocial Personality Disorder'),
(7, 'Autism Spectrum Disorders'),
(8, 'Multiple Personality Disorder'),
(9, 'Anxiety Disorders'),
(10, 'Pain disorder'),
(11, 'Panic disorder'),
(12, 'Mathematics disorder'),
(13, 'Factitious disorder'),
(14, 'Dyspraxia'),
(15, 'Cocaine dependence'),
(16, 'Caffeine-induced sleep disorder'),
(17, 'Bereavement'),
(18, 'Autophagia'),
(19, 'Alzheimer\'s disease'),
(20, 'Alcohol dependence'),
(21, 'Depressive disorder'),
(22, 'Catatonic disorder'),
(23, 'Rabies');

-- --------------------------------------------------------

--
-- Table structure for table `Doctor`
--

CREATE TABLE `Doctor` (
  `Doctor_ID` int(11) NOT NULL,
  `DoctorFname` varchar(255) NOT NULL,
  `DoctorLname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Doctor`
--

INSERT INTO `Doctor` (`Doctor_ID`, `DoctorFname`, `DoctorLname`) VALUES
(1, 'Carlos', 'TheWizeguy'),
(2, 'Dragana', 'TheDragon'),
(3, 'Angelica', 'TheQueen'),
(4, 'Sohail', 'TheNerd'),
(5, 'David', 'TheFreak');

-- --------------------------------------------------------

--
-- Table structure for table `Medecine`
--

CREATE TABLE `Medecine` (
  `Medicine_ID` int(11) NOT NULL,
  `MedicineName` varchar(255) NOT NULL,
  `MedicineDose` int(255) NOT NULL,
  `FK_diagnose_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Medecine`
--

INSERT INTO `Medecine` (`Medicine_ID`, `MedicineName`, `MedicineDose`, `FK_diagnose_ID`) VALUES
(1, 'Abilify', 1, 1),
(2, 'Nexium', 2, 3),
(3, 'Humira', 3, 2),
(4, 'Crestor', 2, 5),
(5, 'Advair Diskus', 1, 6),
(6, 'Enbrel', 3, 9),
(7, 'Remicade', 2, 17),
(8, 'Cymbalta', 1, 19),
(9, 'Copaxone', 2, 22),
(10, 'Neulasta', 1, 11),
(11, 'Lantus Solostar', 2, 6),
(12, 'Rituan', 2, 8),
(13, 'Januvia', 2, 6),
(14, 'Atripla', 1, 8),
(15, 'Lyrica', 2, 18),
(16, 'Lantus', 1, 17),
(17, 'Avantin', 2, 21),
(18, 'Epogen', 3, 20),
(19, 'Celebrex', 2, 2),
(20, 'Epogen', 1, 3),
(21, 'Truvada', 1, 10),
(22, 'Diavon', 2, 18),
(23, 'Glevec', 3, 5),
(24, 'Xarelto', 2, 2),
(25, 'Viagra', 1, 13),
(26, 'Alimta', 1, 10),
(27, 'Avonex', 2, 17),
(28, 'Nasonex', 3, 15),
(29, 'Stelara', 2, 17),
(30, 'Procit', 1, 15);

-- --------------------------------------------------------

--
-- Table structure for table `MTM_Patient_Diagnose`
--

CREATE TABLE `MTM_Patient_Diagnose` (
  `Patient_ID` int(11) NOT NULL,
  `Diagnose_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `MTM_Patient_Diagnose`
--

INSERT INTO `MTM_Patient_Diagnose` (`Patient_ID`, `Diagnose_ID`) VALUES
(1, 1),
(1, 2),
(2, 2),
(1, 3),
(6, 3),
(12, 3),
(6, 4),
(7, 8),
(12, 15),
(1, 23),
(2, 23),
(3, 23);

-- --------------------------------------------------------

--
-- Table structure for table `MTM_Patient_Nurse`
--

CREATE TABLE `MTM_Patient_Nurse` (
  `Patient_ID` int(11) NOT NULL,
  `Nurse_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `MTM_Patient_Nurse`
--

INSERT INTO `MTM_Patient_Nurse` (`Patient_ID`, `Nurse_ID`) VALUES
(1, 2),
(3, 4),
(7, 4),
(11, 4),
(4, 6),
(8, 6),
(12, 7),
(2, 8),
(6, 8),
(10, 8),
(3, 9),
(5, 9);

-- --------------------------------------------------------

--
-- Table structure for table `Nurse`
--

CREATE TABLE `Nurse` (
  `Nurse_ID` int(11) NOT NULL,
  `NurseFname` varchar(255) NOT NULL,
  `NurseLname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Nurse`
--

INSERT INTO `Nurse` (`Nurse_ID`, `NurseFname`, `NurseLname`) VALUES
(1, 'Cleo', 'Patra'),
(2, 'Jovani', 'Macatron'),
(3, 'El Bobo', 'Mascolino'),
(4, 'Lakatos', 'Misolovic'),
(5, 'Cleotra', 'Otravez'),
(6, 'Pamela', 'Anderson'),
(7, 'Kalkuta', 'Dindong'),
(8, 'Ultra', 'Biztora'),
(9, 'Tomb', 'Raider');

-- --------------------------------------------------------

--
-- Table structure for table `Patient`
--

CREATE TABLE `Patient` (
  `Patient_ID` int(11) NOT NULL,
  `PatientFname` varchar(255) NOT NULL,
  `PatientLname` varchar(255) NOT NULL,
  `FK_Doctor_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Patient`
--

INSERT INTO `Patient` (`Patient_ID`, `PatientFname`, `PatientLname`, `FK_Doctor_ID`) VALUES
(1, 'Attila', 'Miklosh', 5),
(2, 'Fredrik', 'Andersson', 1),
(3, 'Tim', 'Leo', 2),
(4, 'Paco', 'Diablito', 4),
(5, 'Macarena', 'DelSol', 3),
(6, 'Pablo', 'Ciego', 3),
(7, 'Kapos', 'Laktos', 5),
(8, 'Tomy', 'High', 1),
(9, 'Toro', 'Negro', 2),
(10, 'Cucaracha', 'Sur', 3),
(11, 'Patricia', 'Mala', 4),
(12, 'Emilito', 'Capon', 2);

-- --------------------------------------------------------

--
-- Structure for view `1_antal_insjukna_i_olika_sjukdomar`
--
DROP TABLE IF EXISTS `1_antal_insjukna_i_olika_sjukdomar`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `asylum`.`1_antal_insjukna_i_olika_sjukdomar`  AS  select `asylum`.`patient`.`PatientFname` AS `PatientFname`,`asylum`.`diagnose`.`Diagnose_ID` AS `Diagnose_ID`,`asylum`.`diagnose`.`DiagnoseName` AS `DiagnoseName` from ((`asylum`.`mtm_patient_diagnose` left join `asylum`.`diagnose` on((`asylum`.`mtm_patient_diagnose`.`Diagnose_ID` = `asylum`.`diagnose`.`Diagnose_ID`))) left join `asylum`.`patient` on((`asylum`.`mtm_patient_diagnose`.`Patient_ID` = `asylum`.`patient`.`Patient_ID`))) ;

-- --------------------------------------------------------

--
-- Structure for view `2_antal insjukna patienter`
--
DROP TABLE IF EXISTS `2_antal insjukna patienter`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `asylum`.`2_antal insjukna patienter`  AS  select count(`asylum`.`mtm_patient_diagnose`.`Diagnose_ID`) AS `COUNT(MTM_Patient_Diagnose.Diagnose_ID)` from ((`asylum`.`mtm_patient_diagnose` left join `asylum`.`diagnose` on((`asylum`.`mtm_patient_diagnose`.`Diagnose_ID` = `asylum`.`diagnose`.`Diagnose_ID`))) left join `asylum`.`patient` on((`asylum`.`mtm_patient_diagnose`.`Patient_ID` = `asylum`.`patient`.`Patient_ID`))) ;

-- --------------------------------------------------------

--
-- Structure for view `3_visa_olika_mediciner_och_dosering_för_en_viss_sjukdom`
--
DROP TABLE IF EXISTS `3_visa_olika_mediciner_och_dosering_för_en_viss_sjukdom`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `asylum`.`3_visa_olika_mediciner_och_dosering_för_en_viss_sjukdom`  AS  select `asylum`.`diagnose`.`DiagnoseName` AS `DiagnoseName`,`asylum`.`medecine`.`MedicineName` AS `MedicineName`,`asylum`.`medecine`.`MedicineDose` AS `MedicineDose` from (`asylum`.`diagnose` left join `asylum`.`medecine` on((`asylum`.`diagnose`.`Diagnose_ID` = `asylum`.`medecine`.`FK_diagnose_ID`))) where (`asylum`.`diagnose`.`Diagnose_ID` = 3) ;

-- --------------------------------------------------------

--
-- Structure for view `4_vilka_sjuksköterskor_som_behandlar_en_viss_patient`
--
DROP TABLE IF EXISTS `4_vilka_sjuksköterskor_som_behandlar_en_viss_patient`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `asylum`.`4_vilka_sjuksköterskor_som_behandlar_en_viss_patient`  AS  select `asylum`.`nurse`.`Nurse_ID` AS `Nurse_ID`,`asylum`.`nurse`.`NurseFname` AS `NurseFname`,`asylum`.`patient`.`Patient_ID` AS `Patient_ID`,`asylum`.`patient`.`PatientFname` AS `PatientFname` from ((`asylum`.`mtm_patient_nurse` join `asylum`.`nurse` on((`asylum`.`mtm_patient_nurse`.`Nurse_ID` = `asylum`.`nurse`.`Nurse_ID`))) join `asylum`.`patient` on((`asylum`.`mtm_patient_nurse`.`Patient_ID` = `asylum`.`patient`.`Patient_ID`))) where (`asylum`.`patient`.`Patient_ID` = 3) ;

-- --------------------------------------------------------

--
-- Structure for view `5_visa_vilka_patienter_behandlas_av_en_läkare`
--
DROP TABLE IF EXISTS `5_visa_vilka_patienter_behandlas_av_en_läkare`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `asylum`.`5_visa_vilka_patienter_behandlas_av_en_läkare`  AS  select `asylum`.`doctor`.`DoctorFname` AS `DoctorFname`,`asylum`.`patient`.`PatientFname` AS `PatientFname` from (`asylum`.`patient` join `asylum`.`doctor` on((`asylum`.`patient`.`FK_Doctor_ID` = `asylum`.`doctor`.`Doctor_ID`))) where (`asylum`.`doctor`.`Doctor_ID` = 3) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Diagnose`
--
ALTER TABLE `Diagnose`
  ADD PRIMARY KEY (`Diagnose_ID`);

--
-- Indexes for table `Doctor`
--
ALTER TABLE `Doctor`
  ADD PRIMARY KEY (`Doctor_ID`);

--
-- Indexes for table `Medecine`
--
ALTER TABLE `Medecine`
  ADD PRIMARY KEY (`Medicine_ID`),
  ADD KEY `medecine_ibfk_1` (`FK_diagnose_ID`);

--
-- Indexes for table `MTM_Patient_Diagnose`
--
ALTER TABLE `MTM_Patient_Diagnose`
  ADD PRIMARY KEY (`Patient_ID`,`Diagnose_ID`),
  ADD KEY `Patient_Diagnose_2` (`Diagnose_ID`);

--
-- Indexes for table `MTM_Patient_Nurse`
--
ALTER TABLE `MTM_Patient_Nurse`
  ADD PRIMARY KEY (`Patient_ID`,`Nurse_ID`),
  ADD KEY `Patien_Nurse_2` (`Nurse_ID`);

--
-- Indexes for table `Nurse`
--
ALTER TABLE `Nurse`
  ADD PRIMARY KEY (`Nurse_ID`);

--
-- Indexes for table `Patient`
--
ALTER TABLE `Patient`
  ADD PRIMARY KEY (`Patient_ID`),
  ADD KEY `FK_Doctor_ID` (`FK_Doctor_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Diagnose`
--
ALTER TABLE `Diagnose`
  MODIFY `Diagnose_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `Doctor`
--
ALTER TABLE `Doctor`
  MODIFY `Doctor_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `Medecine`
--
ALTER TABLE `Medecine`
  MODIFY `Medicine_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `Nurse`
--
ALTER TABLE `Nurse`
  MODIFY `Nurse_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `Patient`
--
ALTER TABLE `Patient`
  MODIFY `Patient_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Medecine`
--
ALTER TABLE `Medecine`
  ADD CONSTRAINT `medecine_ibfk_1` FOREIGN KEY (`FK_diagnose_ID`) REFERENCES `Diagnose` (`Diagnose_ID`);

--
-- Constraints for table `MTM_Patient_Diagnose`
--
ALTER TABLE `MTM_Patient_Diagnose`
  ADD CONSTRAINT `Patient_Diagnose_1` FOREIGN KEY (`Patient_ID`) REFERENCES `Patient` (`Patient_ID`),
  ADD CONSTRAINT `Patient_Diagnose_2` FOREIGN KEY (`Diagnose_ID`) REFERENCES `Diagnose` (`Diagnose_ID`);

--
-- Constraints for table `MTM_Patient_Nurse`
--
ALTER TABLE `MTM_Patient_Nurse`
  ADD CONSTRAINT `Patien_Nurse_1` FOREIGN KEY (`Patient_ID`) REFERENCES `Patient` (`Patient_ID`),
  ADD CONSTRAINT `Patien_Nurse_2` FOREIGN KEY (`Nurse_ID`) REFERENCES `Nurse` (`Nurse_ID`);

--
-- Constraints for table `Patient`
--
ALTER TABLE `Patient`
  ADD CONSTRAINT `FK_Doctor_ID` FOREIGN KEY (`FK_Doctor_ID`) REFERENCES `Doctor` (`Doctor_ID`) ON DELETE CASCADE ON UPDATE NO ACTION;
