DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `Q1_Patients`(IN `Patients` VARCHAR(255))
BEGIN
SELECT Patient.PatientFname, Diagnose.Diagnose_ID, Diagnose.DiagnoseName AS Diagnose 
FROM MTM_Patient_Diagnose LEFT JOIN Diagnose ON MTM_Patient_Diagnose.Diagnose_ID = Diagnose.Diagnose_ID
LEFT JOIN Patient ON MTM_Patient_Diagnose.Patient_ID = Patient.Patient_ID;
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `Q2_Number_ill`(IN `number_ill` INT(11))
BEGIN
SELECT COUNT(MTM_Patient_Diagnose.Diagnose_ID) FROM MTM_Patient_Diagnose LEFT JOIN Diagnose ON MTM_Patient_Diagnose.Diagnose_ID = Diagnose.Diagnose_ID
LEFT JOIN Patient ON MTM_Patient_Diagnose.Patient_ID = Patient.Patient_ID;
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `Q3_Medecine`(IN `Medecines` VARCHAR(255))
BEGIN
SELECT Diagnose.DiagnoseName, Medecine.MedicineName, Medecine.MedicineDose FROM Diagnose LEFT JOIN Medecine ON Diagnose.Diagnose_ID = Medecine.FK_diagnose_ID WHERE MedicineName = Medecines;
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `Q4_Nurses`(IN `Nurses` VARCHAR(255))
BEGIN
SELECT Nurse.Nurse_ID, Nurse.NurseFname, Patient.Patient_ID, Patient.PatientFname FROM MTM_Patient_Nurse
INNER JOIN Nurse ON MTM_Patient_Nurse.Nurse_ID = Nurse.Nurse_ID
INNER JOIN Patient ON MTM_Patient_Nurse.Patient_ID = Patient.Patient_ID WHERE NurseFname = Nurses;
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `Q6_DiagnoseName`(IN `Diagnose` VARCHAR(255))
BEGIN
SELECT Patient.PatientFname, Patient.PatientLname, Diagnose.Diagnose_ID, Diagnose.DiagnoseName 
AS Diagnose
FROM MTM_Patient_Diagnose LEFT JOIN Diagnose ON MTM_Patient_Diagnose.Diagnose_ID = Diagnose.Diagnose_ID
LEFT JOIN Patient ON MTM_Patient_Diagnose.Patient_ID = Patient.Patient_ID
WHERE DiagnoseName = Diagnose;
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `Q5_doctors`(IN `Doctors` VARCHAR(255))
BEGIN
SELECT Doctor.DoctorFname, Patient.PatientFname FROM Patient
INNER JOIN Doctor ON Patient.fk_Doctor_ID = Doctor.Doctor_ID
WHERE DoctorFname = Doctors;
END$$
DELIMITER ;
