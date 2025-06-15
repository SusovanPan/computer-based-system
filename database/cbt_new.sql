-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2025 at 04:43 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cbt_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `aca_coordinator`
--

CREATE TABLE `aca_coordinator` (
  `ac_id` int(11) NOT NULL,
  `ac_name` varchar(200) NOT NULL,
  `ac_email` varchar(200) NOT NULL,
  `ac_password` varchar(200) NOT NULL,
  `ac_phoneno` decimal(11,0) NOT NULL,
  `ac_department` int(11) NOT NULL,
  `ac_createdby` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aca_coordinator`
--

INSERT INTO `aca_coordinator` (`ac_id`, `ac_name`, `ac_email`, `ac_password`, `ac_phoneno`, `ac_department`, `ac_createdby`, `timestamp`) VALUES
(1, 'Sumit Das', '', 'sumit', 7278681543, 1, 1, '2025-05-01 05:26:31'),
(2, 'Asmita Chakraborty', 'asmita.chakraborty@gmail.com', 'asmita', 123456789, 2, 1, '2025-05-07 13:21:35');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_id` int(11) NOT NULL,
  `a_name` varchar(200) NOT NULL,
  `a_password` varchar(200) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `a_name`, `a_password`, `timestamp`) VALUES
(1, 'admin', 'admin123', '2025-05-01 05:19:11');

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `ans_id` int(11) NOT NULL,
  `std_id` int(11) NOT NULL,
  `q_id` int(11) NOT NULL,
  `q_answer` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`ans_id`, `std_id`, `q_id`, `q_answer`) VALUES
(21, 10, 20, 'Eisenhower Matrix'),
(22, 10, 18, 'Writing an email'),
(23, 10, 21, 'Setting clear deadlines'),
(24, 10, 19, 'Listening without giving feedback'),
(25, 10, 23, 'Rigidity'),
(26, 10, 14, 'Recognizing your own emotions'),
(27, 10, 17, 'Micromanagement'),
(28, 10, 15, 'The ability to solve complex mathematical problems'),
(29, 10, 16, 'Identifying the problem'),
(30, 10, 22, 'Transformational');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(200) NOT NULL,
  `school_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`c_id`, `c_name`, `school_id`) VALUES
(1, 'BCA', 2),
(2, 'BBA(SM)', 1),
(3, 'BSC(CS)', 2),
(4, 'BSC(DS)', 2),
(5, 'BBA', 1),
(6, 'BBA(TTM)', 1),
(7, 'BBA(DM)', 1),
(8, 'BBA(ENT)', 1),
(9, 'BBA(SM)', 1);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `q_id` int(11) NOT NULL,
  `q_course` int(11) NOT NULL,
  `q_section` int(11) NOT NULL,
  `q_text` varchar(500) NOT NULL,
  `q_op1` varchar(500) NOT NULL,
  `q_op2` varchar(500) NOT NULL,
  `q_op3` varchar(500) NOT NULL,
  `q_op4` varchar(500) NOT NULL,
  `q_ans` varchar(500) NOT NULL,
  `q_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`q_id`, `q_course`, `q_section`, `q_text`, `q_op1`, `q_op2`, `q_op3`, `q_op4`, `q_ans`, `q_timestamp`) VALUES
(35, 1, 2, 'What is the first step in developing self-awareness?', 'Ignoring negative feedback', 'Understanding other&#039;s emotions', 'Recognizing your own emotions', 'Avoiding self-reflection', 'Recognizing your own emotions', '2025-05-06 10:54:14'),
(36, 1, 2, 'Which of the following best describes emotional intelligence?', 'The ability to solve complex mathematical problems', 'The ability to understand and manage your own and others&#039; emotions', 'The ability to manipulate others emotionally', 'The skill of public speaking', 'The ability to understand and manage your own and others&#039; emotions', '2025-05-06 10:54:14'),
(37, 1, 3, 'What is the first step in effective problem solving?', 'Evaluating solutions', 'Identifying the problem', 'Gathering unrelated data', 'Choosing a random solution', 'Identifying the problem', '2025-05-06 10:54:14'),
(38, 1, 3, 'Which technique helps in generating multiple solutions to a problem?', 'Brainstorming', 'Micromanagement', 'Avoidance', 'Imitation', 'Brainstorming', '2025-05-06 10:54:14'),
(39, 1, 4, 'Which of the following is an example of non-verbal communication?', 'Speaking on the phone', 'Writing an email', 'Maintaining eye contact', 'Participating in a debate', 'Maintaining eye contact', '2025-05-06 10:54:14'),
(40, 1, 4, 'What is active listening?', 'Speaking continuously without interruption', 'Listening without giving feedback', 'Paying full attention and responding appropriately', 'Ignoring the speaker’s body language', 'Paying full attention and responding appropriately', '2025-05-06 10:54:14'),
(41, 1, 5, 'Which tool is commonly used for prioritizing tasks?', 'Gantt Chart', 'SWOT Analysis', 'Eisenhower Matrix', 'Flowchart', 'Eisenhower Matrix', '2025-05-06 10:54:14'),
(42, 1, 5, 'Which of the following is a sign of poor time management?', 'Setting clear deadlines', 'Consistently missing deadlines', 'Creating daily schedules', 'Delegating tasks effectively', 'Consistently missing deadlines', '2025-05-06 10:54:14'),
(43, 1, 6, 'Which leadership style involves making decisions without input from others?', 'Democratic', 'Transformational', 'Autocratic', 'Laissez-faire', 'Autocratic', '2025-05-06 10:54:14'),
(44, 1, 6, 'Which of the following traits is essential for personal development?', 'Rigidity', 'Closed-mindedness', 'Self-motivation', 'Procrastination', 'Self-motivation', '2025-05-06 10:54:14'),
(45, 1, 2, 'What is the first step in developing self-awareness?', 'Ignoring negative feedback', 'Understanding other&#039;s emotions', 'Recognizing your own emotions', 'Avoiding self-reflection', 'Recognizing your own emotions', '2025-05-07 04:56:51'),
(46, 1, 2, 'Which of the following best describes emotional intelligence?', 'The ability to solve complex mathematical problems', 'The ability to understand and manage your own and others&#039; emotions', 'The ability to manipulate others emotionally', 'The skill of public speaking', 'The ability to understand and manage your own and others&#039; emotions', '2025-05-07 04:56:51'),
(47, 1, 3, 'What is the first step in effective problem solving?', 'Evaluating solutions', 'Identifying the problem', 'Gathering unrelated data', 'Choosing a random solution', 'Identifying the problem', '2025-05-07 04:56:51'),
(48, 1, 3, 'Which technique helps in generating multiple solutions to a problem?', 'Brainstorming', 'Micromanagement', 'Avoidance', 'Imitation', 'Brainstorming', '2025-05-07 04:56:51'),
(49, 1, 4, 'Which of the following is an example of non-verbal communication?', 'Speaking on the phone', 'Writing an email', 'Maintaining eye contact', 'Participating in a debate', 'Maintaining eye contact', '2025-05-07 04:56:51'),
(50, 1, 4, 'What is active listening?', 'Speaking continuously without interruption', 'Listening without giving feedback', 'Paying full attention and responding appropriately', 'Ignoring the speaker’s body language', 'Paying full attention and responding appropriately', '2025-05-07 04:56:51'),
(51, 1, 5, 'Which tool is commonly used for prioritizing tasks?', 'Gantt Chart', 'SWOT Analysis', 'Eisenhower Matrix', 'Flowchart', 'Eisenhower Matrix', '2025-05-07 04:56:51'),
(52, 1, 5, 'Which of the following is a sign of poor time management?', 'Setting clear deadlines', 'Consistently missing deadlines', 'Creating daily schedules', 'Delegating tasks effectively', 'Consistently missing deadlines', '2025-05-07 04:56:51'),
(53, 1, 6, 'Which leadership style involves making decisions without input from others?', 'Democratic', 'Transformational', 'Autocratic', 'Laissez-faire', 'Autocratic', '2025-05-07 04:56:51'),
(54, 1, 6, 'Which of the following traits is essential for personal development?', 'Rigidity', 'Closed-mindedness', 'Self-motivation', 'Procrastination', 'Self-motivation', '2025-05-07 04:56:51');

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `sch_id` int(11) NOT NULL,
  `sch_name` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`sch_id`, `sch_name`) VALUES
(1, 'School of Business'),
(2, 'School of Science & Technology'),
(3, 'School of Creativity');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `sec_id` int(11) NOT NULL,
  `sec_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`sec_id`, `sec_name`) VALUES
(1, 'DOMAIN KNOWLEDGE'),
(2, 'SELF AWARNESS AND EMOTIONAL INTELLECT'),
(3, 'PROBLEM SOLVING AND DECISION MAKING'),
(4, 'COMMUNICATION AND INTERPERSONAL SKILL'),
(5, 'TIME MANAGEMENT AND PROCEDURE'),
(6, 'LEADERSHIP AND PERSONALITY DEVELOPMENT');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `std_id` int(11) NOT NULL,
  `std_registration` decimal(10,0) NOT NULL,
  `std_name` varchar(200) NOT NULL,
  `std_stream` int(11) NOT NULL,
  `std_email` varchar(300) NOT NULL,
  `std_password` varchar(200) NOT NULL,
  `std_createdby` int(11) NOT NULL,
  `std_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`std_id`, `std_registration`, `std_name`, `std_stream`, `std_email`, `std_password`, `std_createdby`, `std_timestamp`) VALUES
(1, 123456789, 'Susovan Kumar Pan', 1, 'susovan.pan@gmail.com', 'susovan123', 1, '2025-05-01 09:17:43'),
(2, 123456777, 'Amit Das', 1, 'amit.das@gmail.com', 'amit', 1, '2025-05-01 13:56:05'),
(3, 123456888, 'Swapnil Saha', 1, 'swapnil.saha@gmail.com', 'swapnil', 1, '2025-05-01 13:56:05'),
(4, 123456999, 'Sima Nandy', 5, 'sima.nandy@gmail.com', 'sima', 1, '2025-05-01 13:56:05'),
(5, 9999999999, 'vwevwev', 1, 'admin@username', 'admin@password', 0, '2025-05-05 16:19:36'),
(6, 123456700, 'weigweg', 1, 'admin@username', 'admin@password', 0, '2025-05-05 16:59:36'),
(7, 12345677, 'sovan pal', 1, 'sovan.pal@gmail.com', 'sovan', 0, '2025-05-06 17:13:31'),
(10, 879456123, 'Subhajit Majumder', 1, 'subhajit.majumder@gmail.com', 'subhajit', 1, '2025-05-07 07:39:01'),
(11, 879945621, 'Manish Nandy', 1, 'manish.nandy@gmail.com', 'manish', 1, '2025-05-07 07:39:01'),
(12, 879457792, 'Debarghya Biswas', 5, 'debarghya.biswas@gmail.com', 'debarghya', 1, '2025-05-07 07:39:01'),
(13, 9999999999, 'Riya Das', 3, 'riya.das@gmail.com', 'rita', 0, '2025-05-07 13:04:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aca_coordinator`
--
ALTER TABLE `aca_coordinator`
  ADD PRIMARY KEY (`ac_id`),
  ADD KEY `createdby_fk` (`ac_createdby`),
  ADD KEY `school_fk` (`ac_department`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`ans_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`q_id`),
  ADD KEY `q_course_fk` (`q_course`),
  ADD KEY `q_sec_fk` (`q_section`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`sch_id`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`sec_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`std_id`),
  ADD KEY `course_fk` (`std_stream`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aca_coordinator`
--
ALTER TABLE `aca_coordinator`
  MODIFY `ac_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `ans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `q_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `school`
--
ALTER TABLE `school`
  MODIFY `sch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `sec_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `std_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aca_coordinator`
--
ALTER TABLE `aca_coordinator`
  ADD CONSTRAINT `createdby_fk` FOREIGN KEY (`ac_createdby`) REFERENCES `admin` (`a_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `school_fk` FOREIGN KEY (`ac_department`) REFERENCES `school` (`sch_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `q_course_fk` FOREIGN KEY (`q_course`) REFERENCES `course` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `q_sec_fk` FOREIGN KEY (`q_section`) REFERENCES `section` (`sec_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `course_fk` FOREIGN KEY (`std_stream`) REFERENCES `course` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
