-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2015 at 07:13 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `coc_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `class_students_tbl`
--

CREATE TABLE IF NOT EXISTS `class_students_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_no` int(11) NOT NULL,
  `student_no` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `class_no` (`class_no`,`student_no`),
  KEY `student_no` (`student_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `class_students_tbl`
--

INSERT INTO `class_students_tbl` (`id`, `class_no`, `student_no`) VALUES
(4, 8, 27),
(5, 8, 33),
(8, 11, 33),
(9, 12, 33);

-- --------------------------------------------------------

--
-- Table structure for table `classes_tbl`
--

CREATE TABLE IF NOT EXISTS `classes_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `section_no` int(11) NOT NULL DEFAULT '0',
  `subject_no` int(11) NOT NULL,
  `instructor_no` int(11) NOT NULL,
  `no_students` int(99) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `classes_tbl`
--

INSERT INTO `classes_tbl` (`id`, `section_no`, `subject_no`, `instructor_no`, `no_students`) VALUES
(8, 8, 1, 1, 0),
(11, 10, 2, 1, 0),
(12, 0, 3, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `exam_items_tbl`
--

CREATE TABLE IF NOT EXISTS `exam_items_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `exam_no` int(11) NOT NULL,
  `question` longtext NOT NULL,
  `answer1` longtext NOT NULL,
  `answer2` longtext NOT NULL,
  `answer3` longtext NOT NULL,
  `answer4` longtext NOT NULL,
  `answer` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `exam_items_tbl`
--

INSERT INTO `exam_items_tbl` (`id`, `exam_no`, `question`, `answer1`, `answer2`, `answer3`, `answer4`, `answer`) VALUES
(19, 1, 'It is granted to a group of political offenders which will put to oblivion any crime committed granted by the President with the concurrence of Congress.', 'pardon', 'parole', 'amnesty', 'forgiveness', 3),
(20, 1, 'Which of the following are the ultimate aims of the Bureau of Correction''s rehabilitation program', 'reducing offending behavior', 'encouraging them to be productive and law abiding citizen', 'a and b', 'one of the above', 3),
(21, 1, 'It is the disposition under which a defendant, after conviction and sentence is released subject to conditions imposed by court and to supervision of officer.', 'parole', 'imprisonment', 'probation', 'lock-up', 3),
(22, 1, 'An act of clemency by which an executive act changes a heavier sentence to a less serious one or long term to a shorter term is', 'Amnesty', 'reprieve', 'parole', 'probation', 2),
(23, 1, 'The Bureau of Corrections has an admission program which prescribes a period, wherein the newly-committed offender shall remain in the reception and diagnostic center for interview and examination.  The period consists of how many days?', '60 days', '30 days', '45 days', '10 days', 1),
(24, 5, '1', '1', '1', '1', '1', 1),
(25, 5, '4', '4', '4', '4', '4', 4),
(26, 5, '2', '2', '2', '2', '2', 2),
(27, 5, '3', '3', '3', '3', '3', 3),
(28, 5, '5', '5', '5', '5', '5', 4);

-- --------------------------------------------------------

--
-- Table structure for table `exams_tbl`
--

CREATE TABLE IF NOT EXISTS `exams_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_no` int(11) NOT NULL,
  `topic_no` int(11) NOT NULL,
  `topic` varchar(99) NOT NULL,
  `exam` varchar(99) NOT NULL,
  `status` varchar(99) NOT NULL DEFAULT 'Closed',
  `exam_timer` varchar(99) NOT NULL DEFAULT 'Off',
  `timer_h` int(11) NOT NULL,
  `timer_m` int(11) NOT NULL,
  `timer_s` int(11) NOT NULL,
  `date_open` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `exams_tbl`
--

INSERT INTO `exams_tbl` (`id`, `class_no`, `topic_no`, `topic`, `exam`, `status`, `exam_timer`, `timer_h`, `timer_m`, `timer_s`, `date_open`) VALUES
(1, 8, 3, 'Industrial Security Management', '12345', 'Open', '1 h 0 m 0 s ', 1, 0, 0, '0000-00-00 00:00:00'),
(5, 8, 13, 'Criminology and Psychology of Crimes', 'qwerty', 'Open', 'Off', 0, 0, 0, '2015-11-16 05:56:43');

-- --------------------------------------------------------

--
-- Table structure for table `instructor_students_tbl`
--

CREATE TABLE IF NOT EXISTS `instructor_students_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `instructor_no` int(11) NOT NULL,
  `student_no` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `instructor_no` (`instructor_no`,`student_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `instructor_students_tbl`
--

INSERT INTO `instructor_students_tbl` (`id`, `instructor_no`, `student_no`) VALUES
(3, 1, 27),
(4, 1, 33),
(7, 1, 33),
(8, 1, 33),
(5, 3, 27),
(6, 3, 33);

-- --------------------------------------------------------

--
-- Table structure for table `instructors_tbl`
--

CREATE TABLE IF NOT EXISTS `instructors_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(99) NOT NULL,
  `session_no` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `session_no` (`session_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `instructors_tbl`
--

INSERT INTO `instructors_tbl` (`id`, `name`, `session_no`) VALUES
(1, 'Gibson Maxino', 20),
(3, 'Juan de la Cruz', 42);

-- --------------------------------------------------------

--
-- Table structure for table `progress_items_tbl`
--

CREATE TABLE IF NOT EXISTS `progress_items_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `progress_no` varchar(99) NOT NULL,
  `question` longtext NOT NULL,
  `answer1` varchar(99) NOT NULL,
  `answer2` varchar(99) NOT NULL,
  `answer3` varchar(99) NOT NULL,
  `answer4` varchar(99) NOT NULL,
  `answer` varchar(99) NOT NULL,
  `ans` int(99) NOT NULL,
  `evaluation` varchar(99) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=273 ;

--
-- Dumping data for table `progress_items_tbl`
--

INSERT INTO `progress_items_tbl` (`id`, `progress_no`, `question`, `answer1`, `answer2`, `answer3`, `answer4`, `answer`, `ans`, `evaluation`) VALUES
(238, '49', 'It is the disposition under which a defendant, after conviction and sentence is released subject to conditions imposed by court and to supervision of officer.', 'parole', 'imprisonment', 'probation', 'lock-up', '1', 3, 'incorrect'),
(239, '49', 'An act of clemency by which an executive act changes a heavier sentence to a less serious one or long term to a shorter term is', 'Amnesty', 'reprieve', 'parole', 'probation', '1', 2, 'incorrect'),
(240, '49', 'The Bureau of Corrections has an admission program which prescribes a period, wherein the newly-committed offender shall remain in the reception and diagnostic center for interview and examination.  The period consists of how many days?', '60 days', '30 days', '45 days', '10 days', '1', 1, 'correct'),
(241, '49', 'It is granted to a group of political offenders which will put to oblivion any crime committed granted by the President with the concurrence of Congress.', 'pardon', 'parole', 'amnesty', 'forgiveness', '1', 3, 'incorrect'),
(242, '49', 'Which of the following are the ultimate aims of the Bureau of Correction''s rehabilitation program', 'reducing offending behavior', 'encouraging them to be productive and law abiding citizen', 'a and b', 'one of the above', '1', 3, 'incorrect'),
(263, '54', '1', '1', '1', '1', '1', '1', 1, 'correct'),
(264, '54', '3', '3', '3', '3', '3', '3', 3, 'correct'),
(265, '54', '4', '4', '4', '4', '4', '2', 4, 'incorrect'),
(266, '54', '2', '2', '2', '2', '2', '2', 2, 'correct'),
(267, '54', '5', '5', '5', '5', '5', '4', 4, 'correct'),
(268, '55', 'Which of the following are the ultimate aims of the Bureau of Correction''s rehabilitation program', 'reducing offending behavior', 'encouraging them to be productive and law abiding citizen', 'a and b', 'one of the above', '3', 3, 'correct'),
(269, '55', 'It is granted to a group of political offenders which will put to oblivion any crime committed granted by the President with the concurrence of Congress.', 'pardon', 'parole', 'amnesty', 'forgiveness', '3', 3, 'correct'),
(270, '55', 'It is the disposition under which a defendant, after conviction and sentence is released subject to conditions imposed by court and to supervision of officer.', 'parole', 'imprisonment', 'probation', 'lock-up', '2', 3, 'incorrect'),
(271, '55', 'An act of clemency by which an executive act changes a heavier sentence to a less serious one or long term to a shorter term is', 'Amnesty', 'reprieve', 'parole', 'probation', '3', 2, 'incorrect'),
(272, '55', 'The Bureau of Corrections has an admission program which prescribes a period, wherein the newly-committed offender shall remain in the reception and diagnostic center for interview and examination.  The period consists of how many days?', '60 days', '30 days', '45 days', '10 days', '3', 1, 'incorrect');

-- --------------------------------------------------------

--
-- Table structure for table `progress_tbl`
--

CREATE TABLE IF NOT EXISTS `progress_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `exam_no` int(11) NOT NULL,
  `exam` varchar(99) NOT NULL,
  `student_no` int(11) NOT NULL,
  `name` varchar(99) NOT NULL,
  `no_items` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `grade` int(99) NOT NULL,
  `evaluation` varchar(99) NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Dumping data for table `progress_tbl`
--

INSERT INTO `progress_tbl` (`id`, `exam_no`, `exam`, `student_no`, `name`, `no_items`, `rating`, `grade`, `evaluation`, `date`) VALUES
(49, 1, '12345', 27, 'Jose Rizal', 5, 1, 20, 'Failed', '2015-11-16 05:55:41'),
(54, 5, 'qwerty', 27, 'Jose Rizal', 5, 4, 80, 'Passed', '2015-11-16 06:07:00'),
(55, 1, '12345', 33, 'Jeamar Paul Libres', 5, 2, 40, 'Failed', '2015-11-16 06:10:11');

-- --------------------------------------------------------

--
-- Table structure for table `results_tbl`
--

CREATE TABLE IF NOT EXISTS `results_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_no` int(11) NOT NULL,
  `student_no` int(11) NOT NULL,
  `name` varchar(99) NOT NULL,
  `grade` int(11) NOT NULL,
  `evaluation` varchar(99) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `results_tbl`
--

INSERT INTO `results_tbl` (`id`, `class_no`, `student_no`, `name`, `grade`, `evaluation`) VALUES
(9, 8, 27, 'Jose Rizal', 50, 'Passed'),
(10, 8, 33, 'Jeamar Paul Libres', 40, 'Failed'),
(11, 0, 33, 'Jeamar Paul Libres', 40, 'Failed');

-- --------------------------------------------------------

--
-- Table structure for table `sections_tbl`
--

CREATE TABLE IF NOT EXISTS `sections_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `section` varchar(99) NOT NULL,
  `no_students` int(99) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `sections_tbl`
--

INSERT INTO `sections_tbl` (`id`, `section`, `no_students`) VALUES
(8, '1 - R1', 0),
(9, '1 - R2', 0),
(10, '2 - R1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `session_tbl`
--

CREATE TABLE IF NOT EXISTS `session_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_type` varchar(99) NOT NULL,
  `username` varchar(99) NOT NULL,
  `password` varchar(99) NOT NULL,
  `img` varchar(99) NOT NULL DEFAULT 'user.png',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `session_tbl`
--

INSERT INTO `session_tbl` (`id`, `user_type`, `username`, `password`, `img`) VALUES
(20, 'instructor', 'user', 'user', 'user.png'),
(21, 'admin', 'admin', 'admin', 'user.png'),
(28, 'student', '123', '123', 'user.png'),
(40, 'student', '2011100695', '2011100695', 'prof.jpg'),
(42, 'instructor', 'juan', 'juan', 'user.png'),
(44, 'student', '123456', '123456', 'user.png');

-- --------------------------------------------------------

--
-- Table structure for table `students_tbl`
--

CREATE TABLE IF NOT EXISTS `students_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `session_no` int(11) NOT NULL,
  `id_number` varchar(99) NOT NULL,
  `name` varchar(99) NOT NULL,
  `section` varchar(99) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `session_no` (`session_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `students_tbl`
--

INSERT INTO `students_tbl` (`id`, `session_no`, `id_number`, `name`, `section`) VALUES
(27, 28, '123', 'Jose Rizal', '1 - R1'),
(33, 40, '2011100695', 'Jeamar Paul Libres', '1 - R1'),
(35, 44, '123456', '123456', '');

-- --------------------------------------------------------

--
-- Table structure for table `subjects_tbl`
--

CREATE TABLE IF NOT EXISTS `subjects_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(99) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `subjects_tbl`
--

INSERT INTO `subjects_tbl` (`id`, `subject`) VALUES
(1, 'Law'),
(2, 'First Aid'),
(3, 'New Con');

-- --------------------------------------------------------

--
-- Table structure for table `topics_tbl`
--

CREATE TABLE IF NOT EXISTS `topics_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` int(11) NOT NULL,
  `num` int(11) NOT NULL,
  `topic` varchar(99) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `topics_tbl`
--

INSERT INTO `topics_tbl` (`id`, `category`, `num`, `topic`, `date`) VALUES
(3, 1, 1, 'Industrial Security Management.doc', '2015-10-16 08:07:17'),
(4, 1, 2, 'Police Intelligence.docx', '2015-10-27 23:30:46'),
(8, 1, 3, 'Police Operation and Planning.doc', '2015-10-28 05:23:15'),
(11, 1, 4, 'Police Patrol Operations.docx', '2015-10-29 02:25:18'),
(12, 1, 5, 'Police Personnel and Records Management.doc', '2015-10-29 02:25:55'),
(13, 2, 1, 'Criminology and Psychology of Crimes.doc', '2015-11-12 13:16:45'),
(14, 2, 2, 'Juvenile Delinquency and Crime Prevention.doc', '2015-11-12 13:16:45'),
(15, 2, 3, 'Philippine Criminal Justice System.doc', '2015-11-12 13:16:50'),
(16, 3, 1, 'Correction and Criminal Justice System.docx', '2015-11-12 13:19:30'),
(17, 3, 2, 'Non-Institutional Correction.docx', '2015-11-12 13:19:30'),
(18, 4, 1, 'Fire Prevention and Arson Investigation.doc', '2015-11-12 13:22:00'),
(19, 4, 2, 'Fundamentals of Criminal Investigation.docx', '2015-11-12 13:22:00'),
(20, 4, 3, 'Organized Crime.doc', '2015-11-12 13:22:04'),
(21, 4, 4, 'Special Crime Investigation.docx', '2015-11-12 13:22:04'),
(22, 4, 5, 'Study of Vices and Control.docx', '2015-11-12 13:22:07'),
(23, 4, 6, 'Traffic Management and Accident Prevention.doc', '2015-11-12 13:22:07');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `class_students_tbl`
--
ALTER TABLE `class_students_tbl`
  ADD CONSTRAINT `class_students_tbl_ibfk_1` FOREIGN KEY (`class_no`) REFERENCES `classes_tbl` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `instructor_students_tbl`
--
ALTER TABLE `instructor_students_tbl`
  ADD CONSTRAINT `instructor_students_tbl_ibfk_1` FOREIGN KEY (`instructor_no`) REFERENCES `instructors_tbl` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `instructors_tbl`
--
ALTER TABLE `instructors_tbl`
  ADD CONSTRAINT `instructors_tbl_ibfk_1` FOREIGN KEY (`session_no`) REFERENCES `session_tbl` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `students_tbl`
--
ALTER TABLE `students_tbl`
  ADD CONSTRAINT `students_tbl_ibfk_2` FOREIGN KEY (`session_no`) REFERENCES `session_tbl` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
