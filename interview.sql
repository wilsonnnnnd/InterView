-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2023 at 05:14 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `interview`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `ID` int(11) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`ID`, `description`) VALUES
(3, '123123wqedd'),
(4, '#e89896'),
(5, '#1a9e97'),
(6, '#ddc71a'),
(7, '#6385d3'),
(8, '#67f45d'),
(9, '#0aa870'),
(10, '#9effe0'),
(11, '#0997ef'),
(12, '#ebf481'),
(13, '#d4c2f9'),
(14, '#de97e5'),
(15, '#a31a10'),
(16, '#57e5c1'),
(17, '#6059e5'),
(18, '#b227e5'),
(19, '#b2ffdd'),
(20, '#e08bb4'),
(21, '#ccdb48'),
(22, '#74e8a0'),
(23, '#844ae8'),
(24, '#d3195a'),
(25, '#00a8b7'),
(26, '#e88da8'),
(27, '#a423db'),
(28, '#a7c9f9'),
(29, '#38eda5'),
(30, '#6b7fc4'),
(31, '#5e14ad'),
(32, '#1ec96e'),
(33, '#f7a0b4'),
(34, '#f7ea88'),
(35, '#f1f756'),
(36, '#930afc'),
(37, '#ceef94'),
(38, '#ff26cc'),
(39, '#ce2598'),
(40, '#cfbbf9'),
(41, '#0bc43c'),
(42, '#27db72'),
(43, '#9bd86c'),
(44, '#c8b3f2'),
(45, '#dbf989'),
(46, '#71f785'),
(47, '#b2fffb'),
(48, '#67e2ef'),
(49, '#933817'),
(50, '#1c0e68'),
(51, '#9e1e33'),
(52, '#8e8bd6'),
(53, '#7cb8ef'),
(54, '#ae94e8'),
(55, '#1ca05c'),
(56, '#f23a86'),
(57, '#f14cf7'),
(58, '#ef28c4'),
(59, '#bc294e'),
(60, '#31ce06'),
(61, '#164699'),
(62, '#f29bac'),
(63, '#ffccda'),
(64, '#33f7e0'),
(65, '#847eea'),
(66, '#6e54d8'),
(67, '#ab51ef'),
(68, '#e08bb5'),
(69, '#b146db'),
(70, '#e064c3'),
(71, '#57d637'),
(72, '#395096'),
(73, '#42d1c5'),
(74, '#9a85e2'),
(75, '#f466c3'),
(76, '#6df429'),
(77, '#53b1f4'),
(78, '#d34ca8'),
(79, '#dd3e98'),
(80, '#daed7b'),
(81, '#9cc8e5'),
(82, '#74e053'),
(83, '#f2d0a2'),
(84, '#e51235'),
(85, '#f9849b'),
(86, '#36d631'),
(87, '#a966e8'),
(88, '#f7bdaa'),
(89, '#d68d0e'),
(90, '#679ece'),
(91, '#cc90e5'),
(92, '#a6ce56'),
(93, '#409fc4'),
(94, '#9a9ae0'),
(95, '#db8862'),
(96, '#7b8df2'),
(97, '#9ca4ed'),
(98, '#ffc9f6'),
(99, '#f99dc5'),
(100, '#a2cff2'),
(101, '#84f977'),
(102, '#78e8e0'),
(103, '#1ae0e0');

-- --------------------------------------------------------

--
-- Table structure for table `enrolment`
--

CREATE TABLE `enrolment` (
  `ID` int(11) NOT NULL,
  `course_ID` varchar(255) NOT NULL,
  `User_ID` varchar(255) NOT NULL,
  `State` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enrolment`
--

INSERT INTO `enrolment` (`ID`, `course_ID`, `User_ID`, `State`) VALUES
(8, '123123wqedd(3)', 'Wilson Ding(1)', 'Not Started'),
(9, '123123wqedd(3)', 'Wilson Ding(1)', 'In Progress'),
(10, '#a2cff2(100)', 'Macey Cadman(12)', 'In Progress'),
(11, '11', '54', 'Not Started'),
(12, '80', '57', 'In Progress'),
(13, '53', '7', 'In Progress'),
(14, '35', '63', 'Not Started'),
(15, '65', '26', 'Not Started'),
(16, '98', '25', 'Not Started'),
(17, '92', '19', 'Not Started'),
(18, '5', '90', 'Not Started'),
(19, '51', '38', 'Not Started'),
(20, '33', '16', 'Not Started'),
(21, '93', '48', 'Not Started'),
(22, '73', '21', 'Not Started'),
(23, '39', '68', 'In Progress'),
(24, '73', '27', 'Not Started'),
(25, '34', '11', 'In Progress'),
(26, '29', '99', 'Completed'),
(27, '33', '63', 'Completed'),
(28, '92', '27', 'Completed'),
(29, '9', '96', 'Completed'),
(30, '31', '15', 'Completed'),
(31, '21', '60', 'Completed'),
(32, '43', '81', 'Completed'),
(33, '48', '86', 'Completed'),
(34, '93', '10', 'Not Started'),
(35, '1', '50', 'Completed'),
(36, '13', '95', 'Completed'),
(37, '82', '45', 'In Progress'),
(38, '14', '69', 'In Progress'),
(39, '48', '51', 'In Progress'),
(40, '93', '100', 'In Progress'),
(41, '13', '82', 'In Progress'),
(42, '92', '81', 'In Progress'),
(43, '44', '77', 'In Progress'),
(44, '33', '1', 'In Progress'),
(45, '52', '25', 'Not Started'),
(46, '11', '57', 'Completed'),
(47, '15', '89', 'Completed'),
(48, '59', '37', 'Completed'),
(49, '97', '93', 'In Progress'),
(50, '71', '41', 'In Progress'),
(51, '72', '26', 'In Progress'),
(52, '86', '58', 'Completed'),
(53, '5', '55', 'Completed'),
(54, '66', '20', 'Not Started'),
(55, '4', '53', 'In Progress'),
(56, '10', '34', 'In Progress'),
(57, '41', '55', 'Not Started'),
(58, '14', '12', 'In Progress'),
(59, '36', '64', 'Not Started'),
(60, '97', '51', 'In Progress'),
(61, '84', '13', 'In Progress'),
(62, '49', '22', 'In Progress'),
(63, '68', '97', 'Not Started'),
(64, '57', '82', 'In Progress'),
(65, '64', '67', 'In Progress'),
(66, '79', '6', 'In Progress'),
(67, '53', '19', 'Not Started'),
(68, '98', '79', 'Completed'),
(69, '8', '60', 'In Progress'),
(70, '59', '19', 'Completed'),
(71, '74', '12', 'In Progress'),
(72, '96', '16', 'In Progress'),
(73, '42', '64', 'In Progress'),
(74, '79', '43', 'Not Started'),
(75, '67', '7', 'In Progress'),
(76, '17', '49', 'Completed'),
(77, '18', '18', 'In Progress'),
(78, '53', '60', 'In Progress'),
(79, '55', '3', 'In Progress'),
(80, '52', '57', 'In Progress'),
(81, '59', '92', 'Completed'),
(82, '24', '8', 'Completed'),
(83, '87', '10', 'In Progress'),
(84, '40', '59', 'In Progress'),
(85, '86', '72', 'In Progress'),
(86, '62', '21', 'In Progress'),
(87, '76', '21', 'Not Started'),
(88, '21', '53', 'In Progress'),
(89, '99', '26', 'Not Started'),
(90, '8', '37', 'In Progress'),
(91, '22', '36', 'In Progress'),
(92, '65', '43', 'Completed'),
(93, '63', '71', 'Not Started'),
(94, '38', '14', 'In Progress'),
(95, '18', '61', 'Completed'),
(96, '98', '57', 'Completed'),
(97, '58', '13', 'Not Started'),
(98, '87', '33', 'In Progress'),
(99, '8', '20', 'In Progress'),
(100, '43', '39', 'In Progress'),
(101, '77', '32', 'In Progress'),
(102, '58', '66', 'Completed'),
(103, '77', '41', 'In Progress'),
(104, '86', '7', 'In Progress'),
(105, '47', '78', 'Not Started'),
(106, '92', '85', 'In Progress'),
(107, '51', '78', 'In Progress'),
(108, '36', '10', 'Completed'),
(109, '25', '44', 'In Progress'),
(110, '46', '37', 'In Progress');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `first_name`, `last_name`) VALUES
(1, 'Wilson', 'Ding'),
(4, 'Jessica', 'Huang'),
(5, 'Lisandra', 'Echo'),
(6, 'Michelle', 'Savannah'),
(7, 'Bradley', 'Camden'),
(8, 'Kessie', 'Kennan'),
(9, 'Ethan', 'Jared'),
(10, 'Catherine', 'Roth'),
(11, 'Vance', 'Danielle'),
(12, 'Macey', 'Cadman'),
(13, 'Winter', 'Amber'),
(14, 'Brendan', 'Justin'),
(15, 'Logan', 'Maia'),
(16, 'Brenden', 'Ulric'),
(17, 'Dorian', 'Duncan'),
(18, 'Trevor', 'Buffy'),
(19, 'Linda', 'Basil'),
(20, 'Phyllis', 'Ronan'),
(21, 'Gage', 'Jamalia'),
(22, 'Tallulah', 'Germane'),
(23, 'Jane', 'Thomas'),
(24, 'Zane', 'Leigh'),
(25, 'Geraldine', 'Eagan'),
(26, 'Seth', 'Imogene'),
(27, 'Yuli', 'Tanek'),
(28, 'Lacey', 'August'),
(29, 'Miranda', 'Rhona'),
(30, 'Marah', 'Tatum'),
(31, 'Elvis', 'Bevis'),
(32, 'Upton', 'Mohammad'),
(33, 'Alan', 'Frances'),
(34, 'Mona', 'Ivor'),
(35, 'Peter', 'Nomlanga'),
(36, 'Hedwig', 'Buffy'),
(37, 'Noelle', 'Noelle'),
(38, 'Marsden', 'Brenda'),
(39, 'Marcia', 'Wesley'),
(40, 'Brody', 'Zelda'),
(41, 'Eliana', 'Avye'),
(42, 'Pamela', 'Xenos'),
(43, 'Neil', 'Harding'),
(44, 'Miranda', 'Keefe'),
(45, 'Vance', 'Raphael'),
(46, 'Fulton', 'Harding'),
(47, 'Orla', 'Blossom'),
(48, 'Amal', 'Kennedy'),
(49, 'Quentin', 'Keegan'),
(50, 'MacKensie', 'Brooke'),
(51, 'Coby', 'Isaiah'),
(52, 'Kameko', 'Harlan'),
(53, 'Rana', 'Evan'),
(54, 'Lamar', 'Ivana'),
(55, 'Otto', 'Dora'),
(56, 'Shelley', 'Philip'),
(57, 'Fatima', 'Phyllis'),
(58, 'Kitra', 'Hamish'),
(59, 'Mona', 'Simone'),
(60, 'Kennan', 'Branden'),
(61, 'Quail', 'Yvonne'),
(62, 'Tate', 'Chancellor'),
(63, 'Nell', 'Lisandra'),
(64, 'Oscar', 'Slade'),
(65, 'Ali', 'Dahlia'),
(66, 'Hashim', 'Hanae'),
(67, 'Gavin', 'Ruby'),
(68, 'Lavinia', 'Jonas'),
(69, 'Yetta', 'Leigh'),
(70, 'Jesse', 'Walker'),
(71, 'Amos', 'Brady'),
(72, 'Rhiannon', 'Elaine'),
(73, 'Illana', 'Blaze'),
(74, 'Rafael', 'Neve'),
(75, 'Maisie', 'Chancellor'),
(76, 'Ignatius', 'Valentine'),
(77, 'Sheila', 'Linda'),
(78, 'Mohammad', 'Regina'),
(79, 'Sacha', 'Harper'),
(80, 'Angela', 'Joshua'),
(81, 'Jerry', 'Kelly'),
(82, 'Keaton', 'Orlando'),
(83, 'Xavier', 'Uriah'),
(84, 'Maxine', 'Xenos'),
(85, 'Byron', 'Yael'),
(86, 'Zeph', 'Heidi'),
(87, 'Colby', 'Eric'),
(88, 'Beatrice', 'Charissa'),
(89, 'Yvonne', 'Hiroko'),
(90, 'Christen', 'Abigail'),
(91, 'Marsden', 'Mona'),
(92, 'Britanni', 'Rylee'),
(93, 'Graiden', 'Nerea'),
(94, 'Kibo', 'Ignacia'),
(95, 'Amaya', 'Germane'),
(96, 'Orlando', 'Roary'),
(97, 'Carson', 'Myra'),
(98, 'Herman', 'Brock'),
(99, 'Chaim', 'Jade'),
(100, 'Quintessa', 'Martha'),
(101, 'Hilel', 'September'),
(102, 'Jennifer', 'Dexter'),
(103, 'Tanek', 'Constance'),
(104, 'Logan', 'Sandra');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `enrolment`
--
ALTER TABLE `enrolment`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `course_ID` (`course_ID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `enrolment`
--
ALTER TABLE `enrolment`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
