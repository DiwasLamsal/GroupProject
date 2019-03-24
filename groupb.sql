-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2019 at 10:32 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `groupb`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `anid` int(11) NOT NULL,
  `antitle` varchar(200) NOT NULL,
  `andescription` text NOT NULL,
  `andate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `anstatus` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`anid`, `antitle`, `andescription`, `andate`, `anstatus`) VALUES
(1, 'First Announcement Test', 'First Announcement System Test', '2019-03-17 16:59:59', 'Y'),
(3, 'Summer Vacation', 'Please note that your summer vacation begins on 31st March 2019. Holidayssss finally!', '2019-03-17 17:17:59', 'Y'),
(4, 'Examinations Are Near', 'Students and Module Leaders be reminded that the examinations are near and prepare accordingly.', '2019-03-17 18:25:31', 'Y'),
(5, 'Fire in North Campus', 'We had to deal with a huge fire in the North Campus area. ', '2019-03-17 18:26:05', 'Y'),
(6, 'Snowfall', 'The weather systems show there will be huge snowfall from tomorrow 18th March 2019, so college premises will be closed until further notice.', '2019-03-17 18:26:45', 'Y'),
(7, 'Death of Prime Minister', 'Everyone due to the death of prime minister, we will be closed tomorrow.', '2019-03-17 18:28:20', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE `assignments` (
  `aid` int(11) NOT NULL,
  `atid` int(11) NOT NULL,
  `atitle` varchar(200) NOT NULL,
  `adescription` text NOT NULL,
  `adeadline` date NOT NULL,
  `afiles` text NOT NULL,
  `status` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `assignment_students`
--

CREATE TABLE `assignment_students` (
  `asaid` int(11) NOT NULL,
  `asuid` int(9) NOT NULL,
  `asfiles` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `aid` int(11) NOT NULL,
  `auid` int(9) NOT NULL,
  `astatus` enum('A','0','X') NOT NULL,
  `adate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `atid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `cid` int(11) NOT NULL,
  `cuid` int(9) DEFAULT NULL,
  `ctitle` varchar(200) NOT NULL,
  `cdescription` text NOT NULL,
  `cstatus` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`cid`, `cuid`, `ctitle`, `cdescription`, `cstatus`) VALUES
(2, 22, 'BSc. Computing', 'A bachelor\'s degree, usually in computer science, computer systems engineering, software engineering or mathematics or completion of a college program in computer science is usually required.', 'Y'),
(3, 16, 'BSc. Hons Environment Science', 'Environmental science is an interdisciplinary academic field that integrates physical, biological and information sciences (including ecology, biology, physics, chemistry, plant science, zoology, mineralogy, oceanography, limnology, soil science, geology and physical geography (geodesy), and atmospheric science) to the ...', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `gid` int(11) NOT NULL,
  `gaid` int(11) NOT NULL,
  `guid` int(9) NOT NULL,
  `grade` varchar(4) NOT NULL,
  `publish_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `feedback` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lecturers`
--

CREATE TABLE `lecturers` (
  `luid` int(9) NOT NULL,
  `lrole` varchar(255) NOT NULL,
  `lbiography` text NOT NULL,
  `lexperience` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lecturers`
--

INSERT INTO `lecturers` (`luid`, `lrole`, `lbiography`, `lexperience`) VALUES
(15, '', 'Best teacher', '5 years'),
(16, '', 'He is a good teacher', '15 years'),
(22, '', 'Very good teacher.', '10 years'),
(24, '', 'Very good web development teacher', '15 years'),
(25, '', 'Good teacher', '20 years'),
(26, '', 'Nishant Neupane', '2 years'),
(27, '', 'Database Lecturer', '10 years'),
(28, '', 'AI Lecturer', '17  years'),
(29, '', 'Gold Medalist and a very good hacker. ', '5 years'),
(30, '', 'A formal software specification is a specification expressed in a language whose vocabulary, syntax and semantics are formally defined. This need for a formal definition means that the specification languages must be based on mathematical concepts whose properties are well understood.', '12 years'),
(32, '', 'Very good teacher from Germany.', '3 years');

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `lvid` int(11) NOT NULL,
  `lvtitle` varchar(255) NOT NULL,
  `lvaltname` varchar(255) NOT NULL,
  `lvcapacity` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`lvid`, `lvtitle`, `lvaltname`, `lvcapacity`) VALUES
(1, 'L4', 'Bachelors First Year', 400),
(2, 'L5', 'Bachelors Second Year', 500),
(3, 'L6', 'Bachelors Third Year', 100);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `mid` int(11) NOT NULL,
  `mluid` int(9) NOT NULL,
  `mcid` int(11) NOT NULL,
  `mlvid` int(11) DEFAULT NULL,
  `mname` varchar(200) NOT NULL,
  `mdescription` text NOT NULL,
  `mcode` varchar(20) NOT NULL,
  `mstatus` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`mid`, `mluid`, `mcid`, `mlvid`, `mname`, `mdescription`, `mcode`, `mstatus`) VALUES
(30, 24, 2, 1, 'Web Development', 'Web development broadly refers to the tasks associated with developing websites for hosting via intranet or internet. The web development process includes web design, web content development, client-side/server-side scripting and network security configuration, among other tasks.', 'CSY 1018', 'Y'),
(31, 26, 2, 1, 'Software Engineering I', 'Software engineering is the process of analyzing user needs and designing, constructing, and testing end user applications that will satisfy these needs through the use of software programming languages. It is the application of engineering principles to software development.', 'CSY 1010', 'Y'),
(32, 29, 2, 2, 'Software Engineering II', 'Software engineering is the process of analyzing user needs and designing, constructing, and testing end user applications that will satisfy these needs through the use of software programming languages. It is the application of engineering principles to software development.', 'CSY 2023', 'Y'),
(33, 25, 2, 3, 'Software Engineering III', 'Software engineering is the process of analyzing user needs and designing, constructing, and testing end user applications that will satisfy these needs through the use of software programming languages. It is the application of engineering principles to software development.', 'CSY 3038', 'Y'),
(34, 32, 2, 1, 'Comptuer Systems', 'A complete, working computer. Computer systems will include the computer along with any software and peripheral devices that are necessary to make the computer function. Every computer system, for example, requires an operating system', 'CSY 1023', 'Y'),
(35, 24, 2, 2, 'Web Programming', 'Web programming refers to the writing, markup and coding involved in Web development, which includes Web content, Web client and server scripting and network security. The most common languages used for Web programming are XML, HTML, JavaScript, Perl 5 and PHP.', 'CSY 2028', 'Y'),
(36, 28, 2, 3, 'Artificial Intelligence', 'Artificial intelligence (AI) is an area of computer science that emphasizes the creation of intelligent machines that work and react like humans. Some of the activities computers with artificial intelligence are designed for include: Speech recognition.', 'CSY 3032', 'Y'),
(37, 30, 2, 2, 'Formal Specification of Software Systems', 'A formal software specification is a specification expressed in a language whose vocabulary, syntax and semantics are formally defined. This need for a formal definition means that the specification languages must be based on mathematical concepts whose properties are well understood.', 'CSY 2031', 'Y'),
(38, 15, 2, 3, 'Computing Dissertation', 'A thesis or dissertation is a document submitted in support of candidature for an academic degree or professional qualification presenting the author\'s research and findings.', 'CSY 4050', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE `resources` (
  `rid` int(11) NOT NULL,
  `rtid` int(11) NOT NULL,
  `rtitle` varchar(200) NOT NULL,
  `rdescription` text NOT NULL,
  `rfilenames` text NOT NULL,
  `rstatus` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `suid` int(9) NOT NULL,
  `cid` int(11) NOT NULL,
  `gpa` decimal(10,2) NOT NULL,
  `prevschool` varchar(255) NOT NULL,
  `rstatus` enum('Live','Dormant') NOT NULL,
  `rdormant` varchar(255) DEFAULT NULL,
  `puid` int(9) NOT NULL,
  `slvid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`suid`, `cid`, `gpa`, `prevschool`, `rstatus`, `rdormant`, `puid`, `slvid`) VALUES
(18, 2, '3.30', 'Naya Aayam Multidisciplinary Institute', 'Dormant', 'Withdrawn', 25, 3),
(19, 3, '0.00', 'Naya Aayam Multidisciplinary Institute', 'Dormant', 'Pending Verification', 24, 3),
(20, 2, '3.00', 'Cambridge University', 'Dormant', 'Withdrawn', 16, 1),
(23, 2, '2.80', 'Oxford University', 'Live', '', 22, 2);

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE `terms` (
  `tid` int(11) NOT NULL,
  `tmid` int(11) NOT NULL,
  `tname` enum('Term I','Term II') NOT NULL,
  `tsdate` date NOT NULL,
  `tedate` date NOT NULL,
  `tstatus` enum('Ongoing','Ended','Not Started') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `terms`
--

INSERT INTO `terms` (`tid`, `tmid`, `tname`, `tsdate`, `tedate`, `tstatus`) VALUES
(19, 30, 'Term I', '2019-03-20', '2019-09-16', 'Ongoing'),
(20, 30, 'Term II', '2019-09-16', '2020-03-19', 'Not Started'),
(21, 31, 'Term I', '2019-03-20', '2019-09-16', 'Not Started'),
(22, 31, 'Term II', '2019-09-16', '2020-03-19', 'Not Started'),
(23, 32, 'Term I', '2019-03-20', '2019-09-16', 'Not Started'),
(24, 32, 'Term II', '2019-09-16', '2020-03-19', 'Not Started'),
(25, 33, 'Term I', '2019-03-20', '2019-09-16', 'Ongoing'),
(26, 33, 'Term II', '2019-09-16', '2020-03-19', 'Not Started'),
(27, 34, 'Term I', '2019-03-20', '2019-09-16', 'Ongoing'),
(28, 34, 'Term II', '2019-09-16', '2020-03-19', 'Not Started'),
(29, 35, 'Term I', '2019-03-20', '2019-09-16', 'Ongoing'),
(30, 35, 'Term II', '2019-09-16', '2020-03-19', 'Not Started'),
(31, 36, 'Term I', '2019-03-20', '2019-09-16', 'Not Started'),
(32, 36, 'Term II', '2019-09-16', '2020-03-19', 'Not Started'),
(33, 37, 'Term I', '2019-03-20', '2019-09-16', 'Not Started'),
(34, 37, 'Term II', '2019-09-16', '2020-03-19', 'Not Started'),
(35, 38, 'Term I', '2019-03-20', '2019-09-16', 'Not Started'),
(36, 38, 'Term II', '2019-09-16', '2020-03-19', 'Not Started');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(9) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` enum('Male','Female','Other') NOT NULL,
  `birthdate` date NOT NULL,
  `uaddress` varchar(255) NOT NULL,
  `ucontact` varchar(20) NOT NULL,
  `uemail` varchar(255) NOT NULL,
  `urole` varchar(50) NOT NULL,
  `ustatus` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `fname`, `mname`, `lname`, `password`, `gender`, `birthdate`, `uaddress`, `ucontact`, `uemail`, `urole`, `ustatus`) VALUES
(2, 'Diwas', '', 'Lamsal', '$2y$10$H63pohGdQ2HCm8Xs0gHYI.lOBvhRsblyY0e90bteaAUHSNB.Jpzhu', 'Male', '1972-05-15', 'Kathmandu', '9824524242', 'lamsal.diwas@yahoo.com', 'Administrator', 'Y'),
(3, 'Ramesh', '', 'Thapa', '$2y$10$2OsYDyHJclHsXaqCbWoaFeAeIY4tqC7QktAtMKm6LU0d7Y3xlUJv.', 'Other', '1983-11-27', 'Lokanthali, Bhaktapur', '+977-9842351245', 'rameshthapa@wuc.edu.uk', 'Administrator', 'N'),
(5, 'Bish\'OW\'', 'Nath', 'Dhakal', '$2y$10$VeoyTZmtIYkieznioIZqGu.Eam7LhQyhhhNjT6YkFfaFPkLV0NBmi', 'Female', '2002-03-22', 'Boudha, Jorpati', '+9779841534534', 'bishownathdhakal@wcu.edu.uk', 'Administrator', 'Y'),
(6, 'Aruna', 'Kumari', 'Upreti', '$2y$10$uu805HArVh6CFwme3UdlFOIf8Y3wFLzpVkeLGY9SUcYlnzW02oj4S', 'Female', '2004-12-16', 'Kathmandu\r\nKathmandu', '+9779841234564', 'aruna@upreti.com', 'Administrator', 'N'),
(7, 'Deepak', 'Kumar', 'Karna', '$2y$10$65ZIHFpL0MGeYf5M46LSl.cJNfTqyh49ksJ9kEuZ0wRa5Oo84KaIi', 'Male', '1986-07-25', 'Ekantakuna, Lalitpur', '+9779842156151', 'dkarna@gmail.com', 'Administrator', 'Y'),
(15, 'Ramesh', 'Bahadur', 'Adhikari', '$2y$10$qGJHsfHtd7HAmvlmDh/mqeuGTItx1KNR/.n/PKrNbl9hx7R41i2ym', 'Other', '2000-03-30', 'Kavre', '153245648', 'rameshadhikari@gmail.com', 'Module Leader', 'Y'),
(16, 'Deepak', 'Raj', 'Giri', '$2y$10$jnyj5ppQU16vnScrd6HTJe5989TFBESviCWDdySZ45xNCqRPHgAci', 'Male', '1988-02-09', 'Naxal', '9842135464', 'draj_giri@hotmail.com', 'Module Leader', 'Y'),
(18, 'Binayak', '', 'Dhakal', 'BD1994-11-02', 'Male', '1994-11-02', 'Patan', '981651651351', 'binayak@gmail.com', 'Student', 'Y'),
(19, 'Ayush', 'Raj', 'Moktan', '$2y$10$F0dEGcLW8dkYd8.pSHYqHOiK4FZModNilkTduziGfS4i.wb/o0OSe', 'Male', '1998-08-21', 'NAMI College, Jorpati', '9581651613', 'ayushmoktan@gmail.com', 'Student', 'Y'),
(20, 'Rama', '', 'Upreti', '$2y$10$KRcFWaFSkUVRpZDpfjbfEuhzznP6S0HQw7zgQojnfsm1OelWfQiLi', 'Female', '2000-06-24', 'Gongabu, Kathmandu', '98165165121', 'ramaupreti@gmail.com', 'Student', 'Y'),
(22, 'Anita', '', 'Gurung', '$2y$10$5wtG5nZCYWpZ.mhC6nejQumDUAcx3mhMaS5jYB0jbEj3B7hTO7QQC', 'Female', '1969-09-24', 'New Baneshwor', '98161513215', 'anitagurung@nami.edu.np', 'Module Leader', 'Y'),
(23, 'Barun', '', 'Kuikel', '$2y$10$6wUqZ7vlaLMhRnLqaZ2TGOFAh2lfk0aZHrf8T.rrgi2X9QfZ.Ot8K', 'Male', '1997-11-19', 'Melamchi', '98461231564', 'barunkuikel@gmail.com', 'Student', 'Y'),
(24, 'Ganesh', '', 'Khatri', '$2y$10$2cXNvVEVrqcKb1F.MPtPhuOrk0W7I0Z7kwuSfK2T8y2F0vsTIoPUi', 'Male', '1980-06-25', 'Kathmandu', '981651321', 'ganeshkhatri@nami.edu.np', 'Module Leader', 'Y'),
(25, 'Himalaya', '', 'Kakshapati', '$2y$10$JEne0aGm6FPjQMlqyqQykOvWehTprNKUa0MjxGhzsINbEuNtutEPm', 'Male', '1982-10-27', 'Kalanki', '9814651561', 'himalaya@gmail.com', 'Module Leader', 'Y'),
(26, 'Nishant', '', 'Neupane', '$2y$10$50tXjOXzpVGbMF7TKZGZM.B2iXHh0g0s98Ksfa/87ty9KUb2MrZXe', 'Male', '1987-08-20', 'Gaushala', '9845612118', 'nishant@gmail.com', 'Module Leader', 'Y'),
(27, 'Sangita', '', 'Satyal', '$2y$10$TkUGkimeLUdcQ9hJFjQWHezwCiZpMIYyAvI7FN/gECOpqUjv4NCom', 'Female', '1978-04-24', 'Sankhamul', '9845132165', 'sangitasatyal@nami.edu.np', 'Module Leader', 'Y'),
(28, 'Mamta', '', 'Bhattarai', '$2y$10$315M39gxzQNcrhq8w7mlh.NETh15y1jyXwHcZr4AW5hi12yKxhQry', 'Female', '1957-10-28', 'Koteshwor', '9815612342', 'mamta@gmail.com', 'Module Leader', 'Y'),
(29, 'Nischal', '', 'Khadka', '$2y$10$6FsPV6Monb8K6sN88cu0VuaJzJLzxyiAjCnT6eqZHWKqupFJTRzUC', 'Male', '1979-10-27', 'New Baneshwor', '98156154', 'nischal.khadka@gmail.com', 'Module Leader', 'Y'),
(30, 'Ram', 'Chandra', 'Dhungana', '$2y$10$GlmKZwd.lIgMyorw5CBHJekOPMmu.hZ0YDEKMXF3Zs9vq1KvBZWi6', 'Male', '1971-12-29', 'Chabahil', '9815615423', 'ramchandra@gmail.com', 'Module Leader', 'Y'),
(31, 'Rajan', '', 'Thapa', '$2y$10$GaKSvCG9em6b0GcSJ/xWd.URKKMlYicR1ZSbtSMB/W035Mvg4D0Oa', 'Male', '1980-12-30', 'Kapan', '9813654324', 'rajanthapa@gmail.com', 'Administrator', 'Y'),
(32, 'Niresh', '', 'Dhakal', '$2y$10$zJvdExs39rAZ20HrpewnouSxOghAHoA9E9IkiDWwslP4s94D4yYz.', 'Male', '1978-01-31', 'Jorpati', '984981351465', 'niresh@gmail.com', 'Module Leader', 'Y');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`anid`);

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`aid`),
  ADD KEY `atid` (`atid`);

--
-- Indexes for table `assignment_students`
--
ALTER TABLE `assignment_students`
  ADD KEY `asaid` (`asaid`),
  ADD KEY `asuid` (`asuid`);

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`aid`),
  ADD KEY `auid` (`auid`),
  ADD KEY `atid` (`atid`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`cid`),
  ADD KEY `cuid` (`cuid`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`gid`),
  ADD KEY `gaid` (`gaid`),
  ADD KEY `guid` (`guid`);

--
-- Indexes for table `lecturers`
--
ALTER TABLE `lecturers`
  ADD KEY `luid` (`luid`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`lvid`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`mid`),
  ADD KEY `mcid` (`mcid`),
  ADD KEY `mluid` (`mluid`),
  ADD KEY `mlvid` (`mlvid`);

--
-- Indexes for table `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`rid`),
  ADD KEY `rtid` (`rtid`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD KEY `suid` (`suid`),
  ADD KEY `cid` (`cid`),
  ADD KEY `puid` (`puid`),
  ADD KEY `slvid` (`slvid`);

--
-- Indexes for table `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`tid`),
  ADD KEY `tmid` (`tmid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `anid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `gid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `lvid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `resources`
--
ALTER TABLE `resources`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `terms`
--
ALTER TABLE `terms`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assignments`
--
ALTER TABLE `assignments`
  ADD CONSTRAINT `fk_as_terms` FOREIGN KEY (`atid`) REFERENCES `terms` (`tid`);

--
-- Constraints for table `assignment_students`
--
ALTER TABLE `assignment_students`
  ADD CONSTRAINT `fk_as_assignments` FOREIGN KEY (`asaid`) REFERENCES `assignments` (`aid`),
  ADD CONSTRAINT `fk_as_users` FOREIGN KEY (`asuid`) REFERENCES `users` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `attendances`
--
ALTER TABLE `attendances`
  ADD CONSTRAINT `fk_a_terms` FOREIGN KEY (`atid`) REFERENCES `terms` (`tid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_a_users` FOREIGN KEY (`auid`) REFERENCES `users` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `fk_c_lecturers` FOREIGN KEY (`cuid`) REFERENCES `lecturers` (`luid`);

--
-- Constraints for table `grades`
--
ALTER TABLE `grades`
  ADD CONSTRAINT `fk_g_assignments` FOREIGN KEY (`gaid`) REFERENCES `assignments` (`aid`),
  ADD CONSTRAINT `fk_g_students` FOREIGN KEY (`guid`) REFERENCES `students` (`suid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lecturers`
--
ALTER TABLE `lecturers`
  ADD CONSTRAINT `fk_l_usersself` FOREIGN KEY (`luid`) REFERENCES `users` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `modules`
--
ALTER TABLE `modules`
  ADD CONSTRAINT `fk_m_courses` FOREIGN KEY (`mcid`) REFERENCES `courses` (`cid`),
  ADD CONSTRAINT `fk_m_lecturers` FOREIGN KEY (`mluid`) REFERENCES `lecturers` (`luid`),
  ADD CONSTRAINT `fk_m_levels` FOREIGN KEY (`mlvid`) REFERENCES `levels` (`lvid`);

--
-- Constraints for table `resources`
--
ALTER TABLE `resources`
  ADD CONSTRAINT `fk_r_terms` FOREIGN KEY (`rtid`) REFERENCES `terms` (`tid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `fk_s_course` FOREIGN KEY (`cid`) REFERENCES `courses` (`cid`),
  ADD CONSTRAINT `fk_s_levels` FOREIGN KEY (`slvid`) REFERENCES `levels` (`lvid`),
  ADD CONSTRAINT `fk_s_userpat` FOREIGN KEY (`puid`) REFERENCES `lecturers` (`luid`),
  ADD CONSTRAINT `fk_s_usersself` FOREIGN KEY (`suid`) REFERENCES `users` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `terms`
--
ALTER TABLE `terms`
  ADD CONSTRAINT `fk_t_modules` FOREIGN KEY (`tmid`) REFERENCES `modules` (`mid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
