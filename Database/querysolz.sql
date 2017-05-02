-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2017 at 08:17 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `querysolz`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `email_id` varchar(150) NOT NULL,
  `comment` text NOT NULL,
  `comment_author` text NOT NULL,
  `date` timestamp NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `post_id`, `email_id`, `comment`, `comment_author`, `date`) VALUES
(2, 5, 'lopesraina@gmail.com', 'hii this is another test comment', 'raina lopes', '2017-01-06 07:56:40'),
(14, 5, 'lopesraina@gmail.com', 'let me test one more comment', 'raina lopes', '2017-01-06 09:55:07'),
(18, 5, 'mdsouza@gmail.com', 'hii this is max...whats the topic of discussion', 'max dsouza', '2017-01-06 11:05:28'),
(24, 7, 'mdsouza@gmail.com', 'Thanks for the advice cheryll!!!!', 'max dsouza', '2017-01-06 11:54:39'),
(25, 8, 'snair@gmail.com', 'testing comment', 'sindhu nair', '2017-01-08 16:36:44'),
(26, 7, 'snair@gmail.com', 'You can attend my course Max :)', 'sindhu nair', '2017-01-08 16:54:41'),
(27, 9, 'snair@gmail.com', 'ok', 'sindhu nair', '2017-01-12 11:06:22'),
(28, 9, 'snair@gmail.com', 'ygftyf', ' ', '2017-01-12 11:07:24'),
(31, 20, 'lopesraina@gmail.com', '<script>alert("Attacked");</script>', 'raina lopes', '2017-03-31 17:09:04'),
(32, 33, 'lopesraina@gmail.com', 'tr6f6tftf', 'raina lopes', '2017-04-13 08:33:19'),
(33, 33, 'shreya@gmail.com', 'hiiii', 'Shreya Thakkar', '2017-04-29 06:30:03'),
(34, 34, 'snair@gmail.com', 'Try reinstalling wamp....but all your database files would be gone!', 'sindhu nair', '2017-04-29 07:38:16'),
(35, 45, 'lopesraina@gmail.com', 'hsdfhdskj', 'raina lopes', '2017-05-02 06:05:40'),
(36, 45, 'snair@gmail.com', 'shfsidfoijfpejf', 'sindhu nair', '2017-05-02 06:06:57');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `id` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`) VALUES
('IP4', 'IMAGE PROCESSING'),
('NW2', 'NETWORKING'),
('PRG3', 'PROGRAMMING'),
('WT1', 'WEB TECHNOLOGY');

-- --------------------------------------------------------

--
-- Table structure for table `enrols`
--

CREATE TABLE IF NOT EXISTS `enrols` (
  `stud_id` varchar(50) NOT NULL,
  `course_id` int(11) NOT NULL,
  `subcourse_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `email_id` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `designation` varchar(20) NOT NULL,
  `user_image` text NOT NULL,
  PRIMARY KEY (`email_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`email_id`, `password`, `designation`, `user_image`) VALUES
('lopesraina1@gmail.com', 'Raina1234', 'student', 'images/default.png'),
('lopesraina@gmail.com', '123456', 'student', 'images/default.png'),
('mdsouza@gmail.com', '123456', 'student', 'images/default.png'),
('shreya@gmail.com', 'Shreya123', 'student', 'images/default.png'),
('snair@gmail.com', '123456', 'teacher', 'images/default.png');

-- --------------------------------------------------------

--
-- Table structure for table `mentor`
--

CREATE TABLE IF NOT EXISTS `mentor` (
  `email_id` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `qualification` varchar(30) NOT NULL,
  `field of exp` varchar(30) NOT NULL,
  `contact` varchar(10) NOT NULL,
  PRIMARY KEY (`email_id`),
  UNIQUE KEY `contact` (`contact`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mentor`
--

INSERT INTO `mentor` (`email_id`, `fname`, `lname`, `qualification`, `field of exp`, `contact`) VALUES
('snair@gmail.com', 'sindhu', 'nair', 'mtech', 'dbms', '9819088236');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `email_id` varchar(150) NOT NULL,
  `topic_id` varchar(100) NOT NULL,
  `subcourse_id` varchar(10) NOT NULL,
  `post_title` text NOT NULL,
  `post_content` text NOT NULL,
  `snapshot` blob,
  `post_date` date NOT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `email_id`, `topic_id`, `subcourse_id`, `post_title`, `post_content`, `snapshot`, `post_date`) VALUES
(22, 'snair@gmail.com', 'NW2', '6', 'test', 'test', 0x6963736c307330372e474946, '2017-04-10'),
(23, 'snair@gmail.com', 'NW2', '6', 'test', 'test', 0x6963736c307330372e474946, '2017-04-10'),
(24, 'snair@gmail.com', 'WT1', '1', 'error', 'error in uploading image', 0x6963736c307330372e474946, '2017-04-10'),
(25, 'snair@gmail.com', 'WT1', '1', 'error', 'error in uploading image', '', '2017-04-10'),
(26, 'snair@gmail.com', 'WT1', '1', 'error', 'error', '', '2017-04-10'),
(27, 'snair@gmail.com', 'WT1', '1', 'error test', 'image is nott displayed', '', '2017-04-10'),
(28, 'snair@gmail.com', 'WT1', '1', 'error test', 'image is nott displayed', 0x696d616765732e6a706567, '2017-04-10'),
(29, 'snair@gmail.com', 'WT1', '1', 'error test', 'image is nott displayed', 0x696d616765732e6a706567, '2017-04-10'),
(30, 'snair@gmail.com', 'WT1', '1', 'error test', 'image is nott displayed', 0x696d616765732e6a706567, '2017-04-10'),
(31, 'snair@gmail.com', 'IP4', '13', 'testing post', 'test', 0x61727469636c652e6a7067, '2017-04-10'),
(32, 'snair@gmail.com', 'IP4', '13', 'testing post', 'test', 0x61727469636c652e6a7067, '2017-04-10'),
(33, 'snair@gmail.com', 'NW2', '6', 'assd', 'what is wireshark??', 0x6963736c307330372e474946, '2017-04-13'),
(34, 'lopesraina1@gmail.com', 'WT1', '1', 'mysql not working in Wamp', 'The error says that local server socket is not configured.As shown in the screenshot below.', 0x69312e706e67, '2017-04-28'),
(41, 'lopesraina@gmail.com', 'PRG3', '9', 'knjcncj', 'jsznfjksnjkznvjikdznvjk', '', '2017-04-29'),
(42, 'lopesraina@gmail.com', 'IP4', '14', 'fthjdthdth', 'rdhrthsehrshsrh', '', '2017-04-29'),
(43, 'lopesraina@gmail.com', 'IP4', '13', 'lsdf,slf,', 'kmgkdmksmfdsdmfs', '', '2017-04-29'),
(44, 'lopesraina@gmail.com', 'IP4', '13', 'sclab', 'error', 0x69312e706e67, '2017-05-01'),
(45, 'lopesraina@gmail.com', 'PRG3', '9', 'gtfyfg', 'ytfyfuyg', '', '2017-05-01');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `email_id` varchar(50) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `college` varchar(50) NOT NULL,
  PRIMARY KEY (`email_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`email_id`, `fname`, `lname`, `dob`, `college`) VALUES
('lopesraina1@gmail.com', 'Raina', 'lopes', '28/10/1996', 'DBIT'),
('lopesraina@gmail.com', 'raina', 'lopes', '8-10-1996', 'dbui'),
('mdsouza@gmail.com', 'max', 'dsouza', '5-5-2016', 'VJTI'),
('shreya@gmail.com', 'Shreya', 'Thakkar', '28/10/1996', 'VJTI');

-- --------------------------------------------------------

--
-- Table structure for table `subcourse_belongs`
--

CREATE TABLE IF NOT EXISTS `subcourse_belongs` (
  `subcourse_id` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sub_courses`
--

CREATE TABLE IF NOT EXISTS `sub_courses` (
  `subcourse_id` int(11) NOT NULL,
  `course_id` varchar(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`subcourse_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_courses`
--

INSERT INTO `sub_courses` (`subcourse_id`, `course_id`, `name`) VALUES
(1, 'WT1', 'PHPMYSQL'),
(2, 'WT1', 'WORDPRESS'),
(3, 'WT1', 'BOOTSRAP'),
(4, 'WT1', 'JOOMLA'),
(5, 'WT1', 'DRUPAL'),
(6, 'NW2', 'WIRESHARK'),
(7, 'NW2', 'NS2'),
(8, 'NW2', 'NS3'),
(9, 'PRG3', 'PYTHON'),
(10, 'NW2', 'JAVA'),
(11, 'NW2', 'C'),
(12, 'NW2', 'C++'),
(13, 'IP4', 'SCILAB'),
(14, 'IP4', 'OCTAVE'),
(15, 'IP4', 'OPEN CV');

-- --------------------------------------------------------

--
-- Table structure for table `teaches`
--

CREATE TABLE IF NOT EXISTS `teaches` (
  `mentor_id` varchar(50) NOT NULL,
  `course_id` varchar(10) NOT NULL,
  `subcourse_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
