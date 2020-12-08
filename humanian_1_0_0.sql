-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2020 at 03:57 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `humanian_1.0.0`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblannouncements`
--

CREATE TABLE `tblannouncements` (
  `id` int(50) NOT NULL,
  `companyId` int(50) NOT NULL,
  `annTitle` varchar(255) NOT NULL,
  `annContent` varchar(255) NOT NULL,
  `annPic` varchar(255) NOT NULL,
  `annCreated` date NOT NULL,
  `annUpdated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblcompany`
--

CREATE TABLE `tblcompany` (
  `Id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `companyName` varchar(250) NOT NULL,
  `companyBuilding` varchar(250) NOT NULL,
  `companyBrgystatecity` varchar(250) NOT NULL,
  `companyCountry` varchar(250) NOT NULL,
  `companyField` varchar(250) NOT NULL,
  `companyStatus` int(11) NOT NULL,
  `companyCreated` date NOT NULL,
  `companyUpdated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbldepartments`
--

CREATE TABLE `tbldepartments` (
  `departmentId` int(50) NOT NULL,
  `userId` int(50) NOT NULL,
  `departmentCompany` varchar(255) NOT NULL,
  `departmentName` varchar(255) NOT NULL,
  `departmentField` varchar(255) NOT NULL,
  `departmentCreated` date NOT NULL,
  `departmentDeleted` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbldepartments`
--

INSERT INTO `tbldepartments` (`departmentId`, `userId`, `departmentCompany`, `departmentName`, `departmentField`, `departmentCreated`, `departmentDeleted`) VALUES
(1, 2, '1', 'Creatives Department', 'Graphic Designing', '0000-00-00', '0000-00-00'),
(2, 2, '1', 'Accounting Department', 'Accounting / Finance', '0000-00-00', '0000-00-00'),
(3, 2, '1', 'Development Department', 'Development', '0000-00-00', '0000-00-00'),
(5, 2, '1', 'HR Department', 'Recruitment', '0000-00-00', '0000-00-00'),
(6, 2, '1', 'Sales Department', 'Sales', '0000-00-00', '0000-00-00'),
(7, 2, '1', 'Marketing Department', 'Marketing', '0000-00-00', '0000-00-00'),
(8, 2, '1', 'Executive Department', 'Management', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tbldetails`
--

CREATE TABLE `tbldetails` (
  `ID` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `detailFirstname` varchar(255) NOT NULL,
  `detailMiddlename` varchar(255) NOT NULL,
  `detailSurname` varchar(255) NOT NULL,
  `detailAge` int(11) NOT NULL,
  `detailBirthdate` date NOT NULL,
  `detailHouselot` varchar(255) NOT NULL,
  `detailBarangaycity` varchar(255) NOT NULL,
  `detailCountry` varchar(255) NOT NULL,
  `detailPostalCode` varchar(255) NOT NULL,
  `detailPhoto` varchar(255) NOT NULL,
  `detailCover` varchar(255) NOT NULL,
  `detailStartdate` date NOT NULL,
  `detailEnddate` date NOT NULL,
  `detailRegularizationdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblemployees`
--

CREATE TABLE `tblemployees` (
  `employeeId` int(50) NOT NULL,
  `userId` int(50) NOT NULL,
  `teamId` int(50) NOT NULL,
  `employeeFirstname` varchar(255) NOT NULL,
  `employeePicture` varchar(100) NOT NULL,
  `employeeMiddlename` varchar(255) NOT NULL,
  `employeeSurname` varchar(255) NOT NULL,
  `employeePosition` varchar(250) NOT NULL,
  `employeeAge` int(50) NOT NULL,
  `employeeBirthdate` date NOT NULL,
  `employeeAddress` varchar(255) NOT NULL,
  `employeeContact` varchar(255) NOT NULL,
  `employeeStartDate` date NOT NULL,
  `employeeEndDate` date NOT NULL,
  `employeeCreated` date NOT NULL,
  `employeeDeleted` date NOT NULL,
  `employeeModified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblemployees`
--

INSERT INTO `tblemployees` (`employeeId`, `userId`, `teamId`, `employeeFirstname`, `employeePicture`, `employeeMiddlename`, `employeeSurname`, `employeePosition`, `employeeAge`, `employeeBirthdate`, `employeeAddress`, `employeeContact`, `employeeStartDate`, `employeeEndDate`, `employeeCreated`, `employeeDeleted`, `employeeModified`) VALUES
(1, 5, 2, 'Jayson', 'logo.jpg', 'Fabroa', 'Lee', 'Software Engineer', 22, '1997-10-16', 'Caloocan City', '09553901649', '2019-11-02', '0000-00-00', '2019-11-02', '0000-00-00', '0000-00-00'),
(2, 6, 2, 'Janella', 'Humanian-logo.png', 'Fabroa', 'Ibieta', 'QA Engineer', 0, '0000-00-00', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00'),
(3, 7, 2, 'Cristine Joy', 'Humanian-logo.png', 'Fabroa', 'Ibieta', 'Scrum Master', 0, '0000-00-00', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tblfeeds`
--

CREATE TABLE `tblfeeds` (
  `feedId` int(50) NOT NULL,
  `userId` int(50) NOT NULL,
  `teamId` int(50) NOT NULL,
  `feedContent` varchar(100) NOT NULL,
  `feedImage` varchar(100) NOT NULL,
  `feedCreated` date NOT NULL,
  `feedDelete` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblfeeds`
--

INSERT INTO `tblfeeds` (`feedId`, `userId`, `teamId`, `feedContent`, `feedImage`, `feedCreated`, `feedDelete`) VALUES
(1, 5, 2, 'The Begining of our legacy', 'logo.jpg', '2020-02-22', '2020-02-22'),
(2, 5, 2, 'The Begining of our legacy', 'logo.jpg', '2020-02-22', '2020-02-22');

-- --------------------------------------------------------

--
-- Table structure for table `tblhrconcern`
--

CREATE TABLE `tblhrconcern` (
  `hrcId` int(50) NOT NULL,
  `userId` int(50) NOT NULL,
  `hrcTitle` varchar(100) NOT NULL,
  `hrcContent` varchar(100) NOT NULL,
  `hrcFiled` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblhrconcern`
--

INSERT INTO `tblhrconcern` (`hrcId`, `userId`, `hrcTitle`, `hrcContent`, `hrcFiled`) VALUES
(1, 5, 'Employee Relations', 'Unprofessional Attitude of Emlpoyee A', '2020-02-17'),
(2, 5, 'Salary Deduction', 'Why is my salary has a big amount of deductions?                                    \r\n              ', '2020-02-21'),
(3, 5, 'Bullie By Co Worker', 'Try to file HR concern                                    \r\n                        ', '0000-00-00'),
(4, 5, 'Date of regularization', 'Try mo remind my hr?                                    \r\n                        ', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tblovertime`
--

CREATE TABLE `tblovertime` (
  `overtimeId` int(50) NOT NULL,
  `userId` int(50) NOT NULL,
  `overtimeDate` date NOT NULL,
  `overtimeFrom` time NOT NULL,
  `overtimeTo` time NOT NULL,
  `overtimeHours` int(50) NOT NULL,
  `overtimeReason` varchar(200) NOT NULL,
  `overtimeStatus` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblovertime`
--

INSERT INTO `tblovertime` (`overtimeId`, `userId`, `overtimeDate`, `overtimeFrom`, `overtimeTo`, `overtimeHours`, `overtimeReason`, `overtimeStatus`) VALUES
(1, 5, '2020-02-17', '16:43:00', '20:51:00', 5, 'Project Deployment Of Humanian', 'PENDING'),
(2, 5, '2020-02-10', '15:00:00', '18:00:00', 3, 'Regretion testing', 'PENDING'),
(3, 5, '0000-00-00', '22:00:00', '23:30:00', 0, 'Try to file', 'IN-REVIEW'),
(4, 5, '2020-02-19', '19:00:00', '21:00:00', 0, 'Meeting with the client', 'IN-REVIEW');

-- --------------------------------------------------------

--
-- Table structure for table `tblpermits`
--

CREATE TABLE `tblpermits` (
  `id` int(11) NOT NULL,
  `companyId` int(11) NOT NULL,
  `permitPic` varchar(255) NOT NULL,
  `permitType` varchar(255) NOT NULL,
  `permitValidity` varchar(255) NOT NULL,
  `permitCreated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblpositions`
--

CREATE TABLE `tblpositions` (
  `positionId` int(50) NOT NULL,
  `companyId` int(50) NOT NULL,
  `userId` int(50) NOT NULL,
  `departmentId` int(50) NOT NULL,
  `positionName` varchar(255) NOT NULL,
  `positionField` varchar(255) NOT NULL,
  `positionCreated` date NOT NULL,
  `positionUpdated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpositions`
--

INSERT INTO `tblpositions` (`positionId`, `companyId`, `userId`, `departmentId`, `positionName`, `positionField`, `positionCreated`, `positionUpdated`) VALUES
(1, 1, 2, 2, 'Software Engineer', 'Development', '2019-12-30', '2019-12-30'),
(2, 1, 2, 2, 'Graphics Designer', 'Graphics', '2019-12-31', '2019-12-31'),
(3, 1, 2, 3, 'Scrum Master', '', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tblteams`
--

CREATE TABLE `tblteams` (
  `teamId` int(50) NOT NULL,
  `teamImage` varchar(100) NOT NULL,
  `teamName` varchar(255) NOT NULL,
  `teamUser` varchar(50) NOT NULL,
  `teamAddress` varchar(255) NOT NULL,
  `teamEmployeeReg` int(250) NOT NULL,
  `teamBusinessfield` varchar(250) NOT NULL,
  `teamContact` varchar(255) NOT NULL,
  `teamBir` varchar(250) NOT NULL,
  `teamDti` varchar(255) NOT NULL,
  `teamBusinessPermit` varchar(255) NOT NULL,
  `teamBrgyPermit` varchar(255) NOT NULL,
  `teamCreatedAt` date NOT NULL,
  `teamUpdatedAt` date NOT NULL,
  `teamStatus` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblteams`
--

INSERT INTO `tblteams` (`teamId`, `teamImage`, `teamName`, `teamUser`, `teamAddress`, `teamEmployeeReg`, `teamBusinessfield`, `teamContact`, `teamBir`, `teamDti`, `teamBusinessPermit`, `teamBrgyPermit`, `teamCreatedAt`, `teamUpdatedAt`, `teamStatus`) VALUES
(1, 'logo.jpg', 'Centrive Solutions Inc.', '2', '1782 Lapu-lapu st. pangarap village Caloocan City', 0, 'IT Solutions Company', '09553901649', '', '', '', '', '2019-09-29', '2019-09-29', 'Approve'),
(2, 'Humanian-logo.png', 'Mendira.Net', '3', '1782 Lapu-lapu st. Lower Tawi-tawi Pangarap Village Caloocan City', 0, 'Advertising Company', '09289991172', '', '', '', '', '2019-09-29', '2019-09-29', 'Approve');

-- --------------------------------------------------------

--
-- Table structure for table `tbltimeoff`
--

CREATE TABLE `tbltimeoff` (
  `toId` int(50) NOT NULL,
  `userId` int(50) NOT NULL,
  `toType` varchar(200) NOT NULL,
  `toDateFrom` date NOT NULL,
  `toDateTo` date NOT NULL,
  `toReasons` varchar(255) NOT NULL,
  `toCreated` date NOT NULL,
  `toDelete` date NOT NULL,
  `toApprovedBy` varchar(255) NOT NULL,
  `toRemarks` varchar(255) NOT NULL,
  `toStatus` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbltimeoff`
--

INSERT INTO `tbltimeoff` (`toId`, `userId`, `toType`, `toDateFrom`, `toDateTo`, `toReasons`, `toCreated`, `toDelete`, `toApprovedBy`, `toRemarks`, `toStatus`) VALUES
(1, 5, 'VACATION LEAVE', '2020-02-19', '2020-02-21', 'Personal Matters', '2020-02-18', '2020-02-18', '', '', 'PENDING'),
(4, 5, 'SICK LEAVE / EMERGENCY LEAVE', '2020-02-28', '2020-02-28', 'May pilay po ako', '0000-00-00', '0000-00-00', '', '', 'PENDING'),
(5, 5, 'VACATION LEAVE', '2020-03-23', '2020-03-27', 'Going to singapore for one week', '0000-00-00', '0000-00-00', '', '', 'PENDING');

-- --------------------------------------------------------

--
-- Table structure for table `tbltimesheet`
--

CREATE TABLE `tbltimesheet` (
  `tsId` int(50) NOT NULL,
  `userId` int(50) NOT NULL,
  `tsIn` time NOT NULL,
  `tsOut` time NOT NULL,
  `tsDate` date NOT NULL,
  `tsCreated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `Id` int(50) NOT NULL,
  `userEmail` varchar(255) NOT NULL,
  `userPassword` varchar(255) NOT NULL,
  `userType` int(50) NOT NULL,
  `userStatus` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `ID` int(10) NOT NULL,
  `userId` int(10) NOT NULL,
  `teamId` int(11) NOT NULL,
  `userName` varchar(100) NOT NULL,
  `userEmail` varchar(100) NOT NULL,
  `userPassword` varchar(100) NOT NULL,
  `userType` int(100) NOT NULL,
  `userStatus` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`ID`, `userId`, `teamId`, `userName`, `userEmail`, `userPassword`, `userType`, `userStatus`) VALUES
(1, 0, 0, 'Kim Jasper Fabroa Ibieta', 'jasper.ibieta1@gmail.com', 'd8c2cd740dec39fe7830e0979e5dc59f12f74943', 1, 1),
(2, 1, 0, 'Divine Fronda', 'divinefronda@gmail.com', '6ac1e11a57fda5cceab6631f10226a92d92d723b', 2, 1),
(3, 0, 0, 'Jangelica Caneles Ramos', 'ramosjelly@gmail.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 2, 1),
(4, 0, 0, 'Alvin Esteves Gonzales', 'gonszalesalvin@gmail.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 2, 1),
(5, 0, 2, 'Jayson Fabroa Lee', 'jasper.ibieta1@centrive.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 3, 1),
(6, 0, 2, 'Janella Fabroa Ibieta', 'janella.ibieta@gmail.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 3, 1),
(7, 0, 3, 'Cristine Joy Fabroa Ibieta', 'cj.ibieta@gmail.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 3, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblannouncements`
--
ALTER TABLE `tblannouncements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcompany`
--
ALTER TABLE `tblcompany`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tbldepartments`
--
ALTER TABLE `tbldepartments`
  ADD PRIMARY KEY (`departmentId`);

--
-- Indexes for table `tbldetails`
--
ALTER TABLE `tbldetails`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblemployees`
--
ALTER TABLE `tblemployees`
  ADD PRIMARY KEY (`employeeId`);

--
-- Indexes for table `tblfeeds`
--
ALTER TABLE `tblfeeds`
  ADD PRIMARY KEY (`feedId`);

--
-- Indexes for table `tblhrconcern`
--
ALTER TABLE `tblhrconcern`
  ADD PRIMARY KEY (`hrcId`);

--
-- Indexes for table `tblovertime`
--
ALTER TABLE `tblovertime`
  ADD PRIMARY KEY (`overtimeId`);

--
-- Indexes for table `tblpermits`
--
ALTER TABLE `tblpermits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblpositions`
--
ALTER TABLE `tblpositions`
  ADD PRIMARY KEY (`positionId`);

--
-- Indexes for table `tblteams`
--
ALTER TABLE `tblteams`
  ADD PRIMARY KEY (`teamId`);

--
-- Indexes for table `tbltimeoff`
--
ALTER TABLE `tbltimeoff`
  ADD PRIMARY KEY (`toId`);

--
-- Indexes for table `tbltimesheet`
--
ALTER TABLE `tbltimesheet`
  ADD PRIMARY KEY (`tsId`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblannouncements`
--
ALTER TABLE `tblannouncements`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblcompany`
--
ALTER TABLE `tblcompany`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbldepartments`
--
ALTER TABLE `tbldepartments`
  MODIFY `departmentId` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbldetails`
--
ALTER TABLE `tbldetails`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblemployees`
--
ALTER TABLE `tblemployees`
  MODIFY `employeeId` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tblfeeds`
--
ALTER TABLE `tblfeeds`
  MODIFY `feedId` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tblhrconcern`
--
ALTER TABLE `tblhrconcern`
  MODIFY `hrcId` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tblovertime`
--
ALTER TABLE `tblovertime`
  MODIFY `overtimeId` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tblpermits`
--
ALTER TABLE `tblpermits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblpositions`
--
ALTER TABLE `tblpositions`
  MODIFY `positionId` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tblteams`
--
ALTER TABLE `tblteams`
  MODIFY `teamId` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbltimeoff`
--
ALTER TABLE `tbltimeoff`
  MODIFY `toId` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbltimesheet`
--
ALTER TABLE `tbltimesheet`
  MODIFY `tsId` int(50) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `Id` int(50) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
