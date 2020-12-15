-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2019 at 09:14 AM
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

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`aid`, `atid`, `atitle`, `adescription`, `adeadline`, `afiles`, `status`) VALUES
(5, 25, 'Software Engineering III Term I Assignment', 'Software Engineering III Term I Assignment', '2019-09-16', 'resources/assignments/1556603878.7661-SoftwareEngineeringAssignmentWUC.zip', 'Y'),
(6, 31, 'Artificial Intelligence Term I Assignment', 'AI Assignment Term - I', '2019-09-16', 'resources/assignments/1556607052.0795-AIAssignmentWUC.zip', 'Y'),
(7, 35, 'Dissertation', 'Dissertation Assignment Brief. Read it and submit your work in time.', '2019-09-16', 'resources/assignments/1555951014.4065-100-Records.zip', 'Y'),
(8, 32, 'Artificial Intelligence Term II Assignment', 'Artificial Intelligence Term II Assignment', '2020-03-19', 'resources/assignments/1556607066.953-AIAssignmentWUC.zip', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `assignment_students`
--

CREATE TABLE `assignment_students` (
  `submission_id` int(11) NOT NULL,
  `asaid` int(11) NOT NULL,
  `asuid` int(9) NOT NULL,
  `asfiles` varchar(255) NOT NULL,
  `comments` text NOT NULL,
  `submission_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignment_students`
--

INSERT INTO `assignment_students` (`submission_id`, `asaid`, `asuid`, `asfiles`, `comments`, `submission_date`) VALUES
(1, 5, 10000012, 'resources/submissions/1556603985.205-10000012-ayush-raj-moktan-zip-file.zip', 'I have placed all my files inside the MyAssignment Folder.', '2019-04-30 11:44:45'),
(2, 5, 10000013, 'resources/submissions/1556604771.2521-10000013-binayak-dhakal-zip-file.zip.rar', 'Hello my Assignment Submission Test.', '2019-04-30 11:57:51'),
(3, 6, 10000012, 'resources/submissions/1556608392.641-10000012-ayush-raj-moktan-zip-file.zip', 'All the files are inside the Submission folder.', '2019-04-30 12:58:12');

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `aid` int(25) NOT NULL,
  `auid` int(9) NOT NULL,
  `astatus` enum('A','0','X') NOT NULL,
  `adate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `atid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`aid`, `auid`, `astatus`, `adate`, `atid`) VALUES
(3, 10000013, '0', '2019-04-30 00:00:00', 25),
(4, 10000012, '0', '2019-04-30 00:00:00', 25),
(5, 10000013, '0', '2019-04-30 00:00:00', 25),
(6, 10000012, '0', '2019-04-30 00:00:00', 25),
(7, 10000013, '0', '2019-04-30 00:00:00', 25),
(8, 10000012, '0', '2019-04-30 00:00:00', 25),
(9, 10000013, '0', '2019-04-30 00:00:00', 25),
(10, 10000012, '0', '2019-04-30 00:00:00', 25),
(11, 10000013, '0', '2019-04-30 00:00:00', 25),
(12, 10000012, '0', '2019-04-30 00:00:00', 25),
(13, 10000013, '0', '2019-04-30 00:00:00', 25),
(14, 10000012, '0', '2019-04-30 00:00:00', 25),
(15, 10000013, 'X', '2019-04-30 00:00:00', 25),
(16, 10000012, '0', '2019-04-30 00:00:00', 25),
(17, 10000013, 'X', '2019-04-30 00:00:00', 19),
(18, 10000012, '0', '2019-04-30 00:00:00', 19),
(19, 10000013, '0', '2019-04-30 00:00:00', 19),
(20, 10000012, '0', '2019-04-30 00:00:00', 19),
(21, 10000013, '0', '2019-04-30 00:00:00', 19),
(22, 10000012, '0', '2019-04-30 00:00:00', 19),
(23, 10000013, '0', '2019-04-30 00:00:00', 19),
(24, 10000012, '0', '2019-04-30 00:00:00', 19),
(25, 10000013, '0', '2019-04-30 00:00:00', 19),
(26, 10000012, '0', '2019-04-30 00:00:00', 19),
(27, 10000013, '0', '2019-04-30 00:00:00', 19),
(28, 10000012, '0', '2019-04-30 00:00:00', 19),
(29, 10000013, '0', '2019-04-30 00:00:00', 19),
(30, 10000012, '0', '2019-04-30 00:00:00', 19),
(31, 10000013, 'X', '2019-04-30 00:00:00', 19),
(32, 10000012, '0', '2019-04-30 00:00:00', 19),
(33, 10000013, '0', '2019-04-30 00:00:00', 31),
(34, 10000012, '0', '2019-04-30 00:00:00', 31),
(35, 10000013, '0', '2019-04-30 00:00:00', 31),
(36, 10000012, '0', '2019-04-30 00:00:00', 31),
(37, 10000013, '0', '2019-04-30 00:00:00', 35),
(38, 10000012, '0', '2019-04-30 00:00:00', 35),
(39, 10000013, '0', '2019-04-30 00:00:00', 35),
(40, 10000012, '0', '2019-04-30 00:00:00', 35),
(41, 10000013, '0', '2019-04-30 00:00:00', 35),
(42, 10000012, '0', '2019-04-30 00:00:00', 35),
(43, 10000013, '0', '2019-04-30 00:00:00', 35),
(44, 10000012, '0', '2019-04-30 00:00:00', 35),
(45, 10000013, '0', '2019-04-30 00:00:00', 35),
(46, 10000012, '0', '2019-04-30 00:00:00', 35),
(47, 10000013, '0', '2019-04-30 00:00:00', 35),
(48, 10000012, '0', '2019-04-30 00:00:00', 35),
(49, 10000013, 'X', '2019-04-30 00:00:00', 35),
(50, 10000012, '0', '2019-04-30 00:00:00', 35),
(51, 10000013, 'X', '2019-04-30 00:00:00', 35),
(52, 10000012, '0', '2019-04-30 00:00:00', 35),
(53, 10000013, 'X', '2019-04-30 00:00:00', 35),
(54, 10000012, '0', '2019-04-30 00:00:00', 35),
(55, 10000013, '0', '2019-04-30 00:00:00', 35),
(56, 10000012, '0', '2019-04-30 00:00:00', 35);

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
(2, 10000001, 'BSc. Computing', 'A bachelor\'s degree, usually in computer science, computer systems engineering, software engineering or mathematics or completion of a college program in computer science is usually required.', 'Y'),
(3, 10000009, 'BSc. Hons Environment Science', 'Environmental science is an interdisciplinary academic field that integrates physical, biological and information sciences (including ecology, biology, physics, chemistry, plant science, zoology, mineralogy, oceanography, limnology, soil science, geology and physical geography (geodesy), and atmospheric science) to the ...', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `forums`
--

CREATE TABLE `forums` (
  `fid` int(11) NOT NULL,
  `fmid` int(11) NOT NULL,
  `fuid` int(9) NOT NULL,
  `ftitle` varchar(255) NOT NULL,
  `fdescription` text NOT NULL,
  `fdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forums`
--

INSERT INTO `forums` (`fid`, `fmid`, `fuid`, `ftitle`, `fdescription`, `fdate`) VALUES
(1, 33, 10000013, 'Good Text Editor?', 'Does anybody know of a good text editor?', '2019-04-30 12:47:11'),
(2, 33, 10000013, 'When are our Vacations?', 'Do you know when our summer vacations will begin? Its getting too hot these days. ', '2019-04-30 12:47:37'),
(4, 33, 10000012, 'How to write a CV?', 'What information do we need to include in our college resume for internships? Can anybody help me out?', '2019-04-30 12:51:33'),
(5, 33, 10000013, 'Any Good Recording Software? ðŸ“¹ðŸ“·ðŸ“½ To record my screen?', 'Any Good Recording Software? ðŸ“¹ðŸ“·ðŸ“½ To record my screen?', '2019-04-30 12:57:19');

-- --------------------------------------------------------

--
-- Table structure for table `forum_messages`
--

CREATE TABLE `forum_messages` (
  `fmid` int(11) NOT NULL,
  `fmfid` int(11) NOT NULL,
  `fmuid` int(9) NOT NULL,
  `fmdescription` text NOT NULL,
  `fmdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum_messages`
--

INSERT INTO `forum_messages` (`fmid`, `fmfid`, `fmuid`, `fmdescription`, `fmdate`) VALUES
(1, 2, 10000013, 'Anybody?', '2019-04-30 12:47:45'),
(2, 2, 10000013, 'This heat is not good for our health.', '2019-04-30 12:48:09'),
(3, 1, 10000012, 'I think Notepad++ is a good one Binayak.', '2019-04-30 12:48:42'),
(4, 1, 10000012, 'I searched for some and found out that sublime text and atom are very good text editors. You can always Google these things you know. ', '2019-04-30 12:49:07'),
(5, 2, 10000012, 'You are right. I think we will get a vacation really soon. Probably next week? ', '2019-04-30 12:49:29'),
(6, 1, 10000013, 'Thanks for your response Ayush. I found the one for me - Visual Studio Code. It is very easy to code in this editor. I think everyone should try this one out ðŸ˜', '2019-04-30 12:52:44'),
(7, 4, 10000013, 'ðŸ¤”ðŸ¤”ðŸ¤” I think you just include stuff about your education and experiences and aims and everything. It should not be that tough, why don\'t you go through some samples? ðŸ¤žðŸ¤žðŸ˜¬', '2019-04-30 12:54:04'),
(9, 2, 10000013, 'ðŸ˜¥ðŸ˜¥ðŸ˜¥ðŸ˜¥ðŸ˜¥ Probably Ayush. I have really bad allergies against heat and I really wish they give us a break soon. ðŸ™„ðŸ™„ðŸ¤§', '2019-04-30 12:55:52');

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `gid` int(11) NOT NULL,
  `guid` int(9) NOT NULL,
  `grade` varchar(4) NOT NULL,
  `publish_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `feedback` text NOT NULL,
  `status` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`gid`, `guid`, `grade`, `publish_date`, `feedback`, `status`) VALUES
(1, 1, 'A+', '2019-04-30 11:48:17', 'Excellent Work Ayush! You did a very good job.', 'Y'),
(2, 3, 'A', '2019-04-30 12:58:39', 'Good Work!', 'N');

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
(10000001, '', 'Very good teacher.', '10 years'),
(10000002, '', 'Very good web development teacher', '15 years'),
(10000003, '', 'Good teacher', '20 years'),
(10000004, '', 'AI Lecturer', '17  years'),
(10000005, '', 'Very good teacher from Germany.', '3 years'),
(10000006, '', 'Very good Software Engineering teacher with good C++ skills.', '5 years'),
(10000007, '', 'Nishant Neupane', '2 years'),
(10000008, '', 'A formal software specification is a specification expressed in a language whose vocabulary, syntax and semantics are formally defined. This need for a formal definition means that the specification languages must be based on mathematical concepts whose properties are well understood.', '12 years'),
(10000009, '', 'Best teacher', '5 years'),
(10000010, '', 'Database Lecturer', '10 years');

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
(30, 10000002, 2, 1, 'Web Development', 'Web development broadly refers to the tasks associated with developing websites for hosting via intranet or internet. The web development process includes web design, web content development, client-side/server-side scripting and network security configuration, among other tasks.', 'CSY 1018', 'Y'),
(31, 10000007, 2, 1, 'Software Engineering I', 'Software engineering is the process of analyzing user needs and designing, constructing, and testing end user applications that will satisfy these needs through the use of software programming languages. It is the application of engineering principles to software development.', 'CSY 1010', 'Y'),
(32, 10000006, 2, 2, 'Software Engineering II', 'Software engineering is the process of analyzing user needs and designing, constructing, and testing end user applications that will satisfy these needs through the use of software programming languages. It is the application of engineering principles to software development.', 'CSY 2023', 'Y'),
(33, 10000003, 2, 3, 'Software Engineering III', 'Software engineering is the process of analyzing user needs and designing, constructing, and testing end user applications that will satisfy these needs through the use of software programming languages. It is the application of engineering principles to software development.', 'CSY 3038', 'Y'),
(34, 10000005, 2, 1, 'Comptuer Systems', 'A complete, working computer. Computer systems will include the computer along with any software and peripheral devices that are necessary to make the computer function. Every computer system, for example, requires an operating system', 'CSY 1023', 'Y'),
(35, 10000002, 2, 2, 'Web Programming', 'Web programming refers to the writing, markup and coding involved in Web development, which includes Web content, Web client and server scripting and network security. The most common languages used for Web programming are XML, HTML, JavaScript, Perl 5 and PHP.', 'CSY 2028', 'Y'),
(36, 10000004, 2, 3, 'Artificial Intelligence', 'Artificial intelligence (AI) is an area of computer science that emphasizes the creation of intelligent machines that work and react like humans. Some of the activities computers with artificial intelligence are designed for include: Speech recognition.', 'CSY 3032', 'Y'),
(37, 10000008, 2, 2, 'Formal Specification of Software Systems', 'A formal software specification is a specification expressed in a language whose vocabulary, syntax and semantics are formally defined. This need for a formal definition means that the specification languages must be based on mathematical concepts whose properties are well understood.', 'CSY 2031', 'Y'),
(38, 10000009, 2, 3, 'Computing Dissertation', 'A thesis or dissertation is a document submitted in support of candidature for an academic degree or professional qualification presenting the author\'s research and findings.', 'CSY 4050', 'Y'),
(39, 10000003, 2, 2, 'Group Project', 'Group Project Description. Over the course of the semester, your group will work as a team of communication consultants who will help a local non-profit organization in identifying, assessing, and improving some aspect of their organizations communication.', 'CSY 2027', 'Y'),
(40, 10000001, 2, 2, 'Systems Design and Development', 'Welcome to 18/19 Systems Design and Development (NAMI) (CSY2030-NAM09)', 'CSY 2030', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `module_announcements`
--

CREATE TABLE `module_announcements` (
  `maid` int(11) NOT NULL,
  `matid` int(11) NOT NULL,
  `matitle` varchar(255) NOT NULL,
  `madescription` text NOT NULL,
  `madate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `module_announcements`
--

INSERT INTO `module_announcements` (`maid`, `matid`, `matitle`, `madescription`, `madate`) VALUES
(4, 25, 'testestesttest', 'testestesttest', '2019-04-27 20:27:08'),
(8, 25, 'Grade Announcement', 'Students I am publishing your grades for the software engineering III term I. Please find it from your grades area.', '2019-04-27 20:40:02'),
(9, 25, 'No Classes', 'There will not be any classes in the upcoming week.', '2019-04-27 20:48:50'),
(11, 25, 'Deadline Extended', 'Because of the delayed assignment arrival, your assignment deadlines have been extended. You can now submit your assignment upto two weeks after term\'s end date. ', '2019-04-27 20:49:33'),
(12, 25, 'Guest Lecturer', 'Your classes will be taken by a lecturer tomorrow Sunday 28th of march. Please be prepared and do remember manners. ', '2019-04-27 20:50:38'),
(13, 25, 'Session Regarding Project', 'There will be a session regarding your assignment brief. If you have problems understanding the brief, you can join this session. ', '2019-04-27 20:51:53');

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

--
-- Dumping data for table `resources`
--

INSERT INTO `resources` (`rid`, `rtid`, `rtitle`, `rdescription`, `rfilenames`, `rstatus`) VALUES
(24, 25, 'Software Engineering III - Week 1', 'Students, this is your first week material for Software Engineering Term I. Please go through these before coming for classes.', 'resources/uploads/1556603707.643-Software_Engineering_III_Term_II_All_Slides.zip', 'Y'),
(25, 25, 'Software Engineering III - Week 2', 'Students, this is your second week material for Software Engineering Term I. Please go through these before coming for classes.', 'resources/uploads/1556603729.7929-Software_Engineering_III_Term_II_All_Slides.zip', 'Y'),
(26, 25, 'Software Engineering III - Week 3', 'Students, this is your third week material for Software Engineering Term I. Please go through these before coming for classes.', 'resources/uploads/1556603745.2952-Software_Engineering_III_Term_II_All_Slides.zip', 'Y'),
(27, 25, 'Software Engineering III - Week 4', 'Students, this is your fourth week material for Software Engineering Term I. Please go through these before coming for classes.', 'resources/uploads/1556603769.4236-Software_Engineering_III_Term_II_All_Slides.zip', 'Y'),
(28, 37, 'Group Project - Week 1', 'Students, this is your first week material for Group Project Term I. Please go through these before coming for classes.', 'resources/uploads/1556603800.5084-Group_Project_All_Data.rar', 'Y'),
(29, 37, 'Group Project - Week 2', 'Students, this is your second week material for Group Project Term I. Please go through these before coming for classes.', 'resources/uploads/1556603817.9436-Group_Project_All_Data.rar', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `suid` int(9) NOT NULL,
  `cid` int(11) NOT NULL,
  `gpa` decimal(10,2) NOT NULL,
  `prevschool` varchar(255) NOT NULL,
  `rstatus` enum('Live','Dormant','Provisional') NOT NULL,
  `rdormant` varchar(255) DEFAULT NULL,
  `puid` int(9) NOT NULL,
  `slvid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`suid`, `cid`, `gpa`, `prevschool`, `rstatus`, `rdormant`, `puid`, `slvid`) VALUES
(10000011, 2, '3.50', 'St Xavier\'s Jawlakhel', 'Live', '', 10000001, 1),
(10000012, 2, '3.20', 'Global College', 'Live', '', 10000002, 3),
(10000013, 2, '3.50', 'Islington College', 'Live', '', 10000003, 3),
(10000016, 2, '3.80', 'Banasthali School', 'Provisional', 'Pending Verification', 10000001, 3);

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
(21, 31, 'Term I', '2019-03-20', '2019-09-16', 'Ongoing'),
(22, 31, 'Term II', '2019-09-16', '2020-03-19', 'Not Started'),
(23, 32, 'Term I', '2019-03-20', '2019-09-16', 'Ongoing'),
(24, 32, 'Term II', '2019-09-16', '2020-03-19', 'Not Started'),
(25, 33, 'Term I', '2019-03-20', '2019-09-16', 'Ongoing'),
(26, 33, 'Term II', '2019-09-16', '2020-03-19', 'Not Started'),
(27, 34, 'Term I', '2019-03-20', '2019-09-16', 'Ongoing'),
(28, 34, 'Term II', '2019-09-16', '2020-03-19', 'Not Started'),
(29, 35, 'Term I', '2019-03-20', '2019-09-16', 'Ongoing'),
(30, 35, 'Term II', '2019-09-16', '2020-03-19', 'Not Started'),
(31, 36, 'Term I', '2019-03-20', '2019-09-16', 'Ongoing'),
(32, 36, 'Term II', '2019-09-16', '2020-03-19', 'Not Started'),
(33, 37, 'Term I', '2019-03-20', '2019-09-16', 'Ongoing'),
(34, 37, 'Term II', '2019-09-16', '2020-03-19', 'Not Started'),
(35, 38, 'Term I', '2019-03-20', '2019-09-16', 'Ongoing'),
(36, 38, 'Term II', '2019-09-16', '2020-03-19', 'Not Started'),
(37, 39, 'Term I', '2019-03-20', '2019-09-20', 'Ongoing'),
(38, 39, 'Term II', '2019-09-20', '2020-03-23', 'Not Started'),
(39, 40, 'Term I', '2019-04-19', '2019-10-16', 'Ongoing'),
(40, 40, 'Term II', '2019-10-16', '2020-04-18', 'Not Started');

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
(10000000, 'Diwas', '', 'Lamsal', '$2y$10$j8BDtfGNEGvTwqjUSGkH/.uZp.mPLoBuWHEahRKle2LyDy015i48e', 'Male', '1990-07-02', 'New Baneshwor, Kathmandu', '98080808080', 'lamsal.diwas@yahoo.com', 'Administrator', 'Y'),
(10000001, 'Anita', '', 'Gurung', '$2y$10$XjjAzA07K4hWv0nP3RVCwO18xzrDBDDAn3l9R9L.3K9VR4NtA0n0y', 'Female', '1969-09-04', 'New Baneshwor', '98161513215', 'anitagurung@nami.edu.np', 'Module Leader', 'Y'),
(10000002, 'Ganesh', '', 'Khatri', '$2y$10$4M/pOe4JtwCDeX.RP0zSyOyJ0qbomEsFouHl0HtQnD6V/H/sUpqT2', 'Male', '1980-06-25', 'Kathmandu', '981651321', 'ganeshkhatri@nami.edu.np', 'Module Leader', 'Y'),
(10000003, 'Himalaya', '', 'Kakshapati', '$2y$10$3zaxlrh0pPj2h3HohoojUeL1XH.KeTQyH1oCnRfNsV49upfTtOuyG', 'Male', '1982-10-27', 'Kalanki', '9814651561', 'himalaya@gmail.com', 'Module Leader', 'Y'),
(10000004, 'Mamta', '', 'Bhattarai', '$2y$10$ZKUmDzc23aSgXY.ZP8ysk.tu1nMsfilOxQbzRV8NfnvBuuJqIGAK.', 'Female', '1975-10-28', 'Koteshwor', '9815612342', 'mamta@gmail.com', 'Module Leader', 'Y'),
(10000005, 'Niresh', '', 'Dhakal', '$2y$10$b6gmjNUCKYoRw4sijqk.9.sylyk/S1FBTTXoHYjcrtiwAzGITaJD2', 'Male', '1978-01-31', 'Jorpati', '984981351465', 'niresh@gmail.com', 'Module Leader', 'Y'),
(10000006, 'Nischal', '', 'Khadka', '$2y$10$VC2BK6qcjZfreTvzJpIoIuORK.Eax9tvPV0qOsRJncvTORlRXRel2', 'Male', '1985-02-11', 'New Baneshwor', '98156154', 'nischal.khadka@gmail.com', 'Module Leader', 'Y'),
(10000007, 'Nishant', '', 'Neupane', '$2y$10$D2rc4X09mZMuK3BnLpqXJubsE3T5byULSlZFEKYBiESanftwVjcxW', 'Male', '1987-08-20', 'Gaushala', '9845612118', 'nishant@gmail.com', 'Module Leader', 'Y'),
(10000008, 'Ram', 'Chandra', 'Dhungana', '$2y$10$8b1lxgN4hMe1d40GOQOTOeBByCtm7lrbwZJB5UvO6hgxtLYpsjzbq', 'Male', '1971-12-29', 'Chabahil', '9815615423', 'ramchandra@gmail.com', 'Module Leader', 'Y'),
(10000009, 'Ramesh', 'Bahadur', 'Adhikari', '$2y$10$Z/hJ1gL/AFcniqgWikmnFeB3WqHDuH.bg.7FfaL7ZJOFRdiRkIH7C', 'Male', '1980-12-11', 'Kavre', '153245648', 'rameshadhikari@gmail.com', 'Module Leader', 'Y'),
(10000010, 'Sangita', '', 'Satyal', '$2y$10$/vR2MJClUl8YNEiT6cdjneassjOK2I..RgXc4Au./VhKQSX/jx53.', 'Female', '1978-02-04', 'Sankhamul', '9845132165', 'sangitasatyal@nami.edu.np', 'Module Leader', 'Y'),
(10000011, 'Barun', '', 'Kuikel', '$2y$10$eL0.FctCMGOza2AUHSNrW.9zM3m1wLm4rA0i/CL7LtJagNSxFBQcC', 'Male', '1997-02-02', 'Gothatar, Kathmandu', '981513243245', 'barunkuikel@gmail.com', 'Student', 'Y'),
(10000012, 'Ayush', 'Raj', 'Moktan', '$2y$10$y9s.NNWCOuIBar792/7lBuB6/sbadMY8U84sWoieGBJJdrZUlvRCS', 'Male', '1999-02-10', 'Jorpati, Kathmandu', '98516542442', 'ayushmoktan@gmail.com', 'Student', 'Y'),
(10000013, 'Binayak', '', 'Dhakal', '$2y$10$GJt4W8vKmbUacmuiaGf3DeRUFGcEej385thDgR1yDxZm8RmV2lV/2', 'Male', '1995-12-12', 'Khumaltar, Lalitpur', '985135432432', 'binayak@gmail.com', 'Student', 'Y'),
(10000016, 'Rama', 'Kumari', 'Upreti', '$2y$10$WcG/mSjaPJvmO33J6.s.seOoa7PZXDZezqERoMpoTzYzIXZHAUWBq', 'Female', '1990-10-08', 'Gongabu, Buspark', '984354324815', 'ramaupreti@gmail.com', 'Student', 'Y'),
(10000018, 'Bish\'OW\'', 'Nath', 'Dhakal', '$2y$10$.9liBx/Up1fWJfpQol5.CebofWTw44q/NmU703v8A/rKiTpOd2JtC', 'Male', '1995-05-05', 'Jorpati, Kathmandu', '9841351354', 'bishownathdhakal@wcu.edu.uk', 'Administrator', 'Y');

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
  ADD PRIMARY KEY (`submission_id`),
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
-- Indexes for table `forums`
--
ALTER TABLE `forums`
  ADD PRIMARY KEY (`fid`),
  ADD KEY `fmid` (`fmid`),
  ADD KEY `fuid` (`fuid`);

--
-- Indexes for table `forum_messages`
--
ALTER TABLE `forum_messages`
  ADD PRIMARY KEY (`fmid`),
  ADD KEY `fmfid` (`fmfid`),
  ADD KEY `fmuid` (`fmuid`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`gid`),
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
-- Indexes for table `module_announcements`
--
ALTER TABLE `module_announcements`
  ADD PRIMARY KEY (`maid`),
  ADD KEY `matid` (`matid`);

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
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `assignment_students`
--
ALTER TABLE `assignment_students`
  MODIFY `submission_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `aid` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `forums`
--
ALTER TABLE `forums`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `forum_messages`
--
ALTER TABLE `forum_messages`
  MODIFY `fmid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `gid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `lvid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `module_announcements`
--
ALTER TABLE `module_announcements`
  MODIFY `maid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `resources`
--
ALTER TABLE `resources`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `terms`
--
ALTER TABLE `terms`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10000019;

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
-- Constraints for table `forums`
--
ALTER TABLE `forums`
  ADD CONSTRAINT `fk_f_modules` FOREIGN KEY (`fmid`) REFERENCES `modules` (`mid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_f_users` FOREIGN KEY (`fuid`) REFERENCES `users` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `forum_messages`
--
ALTER TABLE `forum_messages`
  ADD CONSTRAINT `fk_fm_forums` FOREIGN KEY (`fmfid`) REFERENCES `forums` (`fid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_fm_users` FOREIGN KEY (`fmuid`) REFERENCES `users` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `grades`
--
ALTER TABLE `grades`
  ADD CONSTRAINT `fk_g_assignment_students` FOREIGN KEY (`guid`) REFERENCES `assignment_students` (`submission_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `module_announcements`
--
ALTER TABLE `module_announcements`
  ADD CONSTRAINT `fk_ma_terms` FOREIGN KEY (`matid`) REFERENCES `terms` (`tid`) ON DELETE CASCADE ON UPDATE CASCADE;

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
