-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2025 at 06:23 AM
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
(5, 'Asmita Chakraborty', 'asmita.chakraborty@gmail.com', 'asmita123', 7278681543, 2, 1, '2025-05-27 15:42:59');

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
  `q_answer` varchar(500) NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`ans_id`, `std_id`, `q_id`, `q_answer`, `date`) VALUES
(609, 206, 425, 'I manage well, but sometimes get distracted', '2025-06-27'),
(610, 206, 420, 'I communicate confidently, trusting that people will understand', '2025-06-27'),
(611, 206, 413, 'Anxious, but manage to get through it', '2025-06-27'),
(612, 206, 424, 'I accept them humbly and feel proud', '2025-06-27'),
(613, 206, 408, 'Explain the procedure and try to ease their anxiety', '2025-06-27'),
(614, 206, 431, 'I don’t actively seek personal development but work on it when needed', '2025-06-27'),
(615, 206, 409, 'Keep it brief and move on to the next patient', '2025-06-27'),
(616, 206, 427, 'I stay organized and handle each task one at a time', '2025-06-27'),
(617, 206, 432, 'I ask if they need assistance, but don’t push too much', '2025-06-27'),
(618, 206, 417, 'I wait for others to take the lead', '2025-06-27'),
(619, 206, 421, 'I clarify immediately and resolve it calmly', '2025-06-27'),
(620, 206, 405, 'Ignore their concerns and continue the examination', '2025-06-27'),
(621, 206, 410, 'I feel overwhelmed and seek support from others', '2025-06-27'),
(622, 206, 423, 'I avoid resolving it and hope it will resolve itself', '2025-06-27'),
(623, 206, 428, 'I get distracted often and lose track of time', '2025-06-27'),
(624, 206, 407, 'Rely on your current knowledge without exploring new advancements', '2025-06-27'),
(625, 206, 412, 'I see it as an opportunity to grow', '2025-06-27'),
(626, 206, 411, 'I take it personally but try to learn from it', '2025-06-27'),
(627, 206, 434, 'I assign tasks clearly and keep everyone on track', '2025-06-27'),
(628, 206, 419, 'Rely on intuition and make a quick decision', '2025-06-27'),
(629, 206, 414, 'I listen carefully to understand their point of view', '2025-06-27'),
(630, 206, 429, 'I remind myself of the end goal to stay focused', '2025-06-27'),
(631, 206, 433, 'I break goals into smaller steps and track progress', '2025-06-27'),
(632, 206, 418, 'I ask others for help', '2025-06-27'),
(633, 206, 422, 'I avoid giving feedback to avoid conflict', '2025-06-27'),
(634, 206, 406, 'Handle everything at once without prioritizing', '2025-06-27'),
(635, 206, 416, 'I struggle to adjust and need support from others', '2025-06-27'),
(636, 206, 430, 'I take charge confidently and guide the team', '2025-06-27'),
(637, 206, 426, 'I plan ahead and work on it early', '2025-06-27'),
(638, 206, 415, 'I go with my gut feeling', '2025-06-27'),
(639, 207, 416, 'I adapt quickly and look for solutions', '2025-06-27'),
(640, 207, 415, 'I analyze all available options before deciding', '2025-06-27'),
(641, 207, 405, 'Ignore their concerns and continue the examination', '2025-06-27'),
(642, 207, 419, 'Rely on intuition and make a quick decision', '2025-06-27'),
(643, 207, 427, 'I stay organized and handle each task one at a time', '2025-06-27'),
(644, 207, 432, 'I ask if they need assistance, but don’t push too much', '2025-06-27'),
(645, 207, 426, 'I work frantically as the deadline approaches', '2025-06-27'),
(646, 207, 433, 'I remind myself of the bigger picture and keep pushing forward', '2025-06-27'),
(647, 207, 428, 'I get distracted often and lose track of time', '2025-06-27'),
(648, 207, 421, 'I clarify immediately and resolve it calmly', '2025-06-27'),
(649, 207, 423, 'I stick to my point of view but listen to theirs', '2025-06-27'),
(650, 207, 407, 'Wait until a new technology is widely adopted before using it', '2025-06-27'),
(651, 207, 408, 'Ignore their discomfort and proceed as usual', '2025-06-27'),
(652, 207, 434, 'I let the team work independently without much involvement', '2025-06-27'),
(653, 207, 410, 'I stay calm and think of solutions', '2025-06-27'),
(654, 207, 412, 'I see it as an opportunity to grow', '2025-06-27'),
(655, 207, 406, 'Tackle the most urgent cases first', '2025-06-27'),
(656, 207, 418, 'I ask others for help', '2025-06-27'),
(657, 207, 411, 'I accept it gracefully and use it to improve', '2025-06-27'),
(658, 207, 425, 'I manage well, but sometimes get distracted', '2025-06-27'),
(659, 207, 422, 'Very comfortable, I do it constructively', '2025-06-27'),
(660, 207, 429, 'I set small milestones and celebrate progress', '2025-06-27'),
(661, 207, 414, 'I try to explain my side but remain open', '2025-06-27'),
(662, 207, 430, 'I avoid taking the lead and let others guide the way', '2025-06-27'),
(663, 207, 413, 'Anxious, but manage to get through it', '2025-06-27'),
(664, 207, 417, 'I prefer listening to others and giving feedback', '2025-06-27'),
(665, 207, 431, 'I focus on improving when challenges arise', '2025-06-27'),
(666, 207, 420, 'I communicate confidently, trusting that people will understand', '2025-06-27'),
(667, 207, 424, 'I downplay them and feel uncomfortable', '2025-06-27'),
(668, 207, 409, 'Avoid discussing the bad news, hoping the patient won&#039;t ask further', '2025-06-27'),
(669, 208, 412, 'I see it as an opportunity to grow', '2025-06-27'),
(670, 208, 429, 'I set small milestones and celebrate progress', '2025-06-27'),
(671, 208, 419, 'Rely on intuition and make a quick decision', '2025-06-27'),
(672, 208, 408, 'Ignore their discomfort and proceed as usual', '2025-06-27'),
(673, 208, 433, 'I break goals into smaller steps and track progress', '2025-06-27'),
(674, 208, 432, 'I ask if they need assistance, but don’t push too much', '2025-06-27'),
(675, 208, 421, 'I let it slide and move on', '2025-06-27'),
(676, 208, 434, 'I assign tasks clearly and keep everyone on track', '2025-06-27'),
(677, 208, 411, 'I feel defensive but try to listen', '2025-06-27'),
(678, 208, 426, 'I tackle it in the days leading up to it', '2025-06-27'),
(679, 208, 427, 'I stay organized and handle each task one at a time', '2025-06-27'),
(680, 208, 405, 'Suggest they try a different optometrist', '2025-06-27'),
(681, 208, 413, 'Overwhelmed and often need to take a break', '2025-06-27'),
(682, 208, 406, 'Handle everything at once without prioritizing', '2025-06-27'),
(683, 208, 422, 'Very comfortable, I do it constructively', '2025-06-27'),
(684, 208, 423, 'I avoid resolving it and hope it will resolve itself', '2025-06-27'),
(685, 208, 430, 'I lead when necessary but prefer to collaborate', '2025-06-27'),
(686, 208, 410, 'I stay calm and think of solutions', '2025-06-27'),
(687, 208, 420, 'I communicate confidently, trusting that people will understand', '2025-06-27'),
(688, 208, 428, 'I take short breaks to keep my energy levels up', '2025-06-27'),
(689, 208, 414, 'I try to explain my side but remain open', '2025-06-27'),
(690, 208, 418, 'I ask others for help', '2025-06-27'),
(691, 208, 417, 'I prefer listening to others and giving feedback', '2025-06-27'),
(692, 208, 425, 'I manage well, but sometimes get distracted', '2025-06-27'),
(693, 208, 424, 'I accept them humbly and feel proud', '2025-06-27'),
(694, 208, 407, 'Rely on your current knowledge without exploring new advancements', '2025-06-27'),
(695, 208, 431, 'I focus on improving when challenges arise', '2025-06-27'),
(696, 208, 416, 'I adapt quickly and look for solutions', '2025-06-27'),
(697, 208, 415, 'I seek advice from others before deciding', '2025-06-27'),
(698, 208, 409, 'Keep it brief and move on to the next patient', '2025-06-27'),
(699, 208, 409, 'Keep it brief and move on to the next patient', '2025-06-28'),
(700, 208, 428, 'I eliminate distractions and stick to a schedule', '2025-06-28'),
(701, 208, 405, 'Ignore their concerns and continue the examination', '2025-06-28'),
(702, 208, 422, 'I give feedback when necessary, but it’s not easy', '2025-06-28'),
(703, 208, 418, 'I research the issue and find a solution', '2025-06-28'),
(704, 208, 432, 'I ask if they need assistance, but don’t push too much', '2025-06-28'),
(705, 208, 426, 'I work frantically as the deadline approaches', '2025-06-28'),
(706, 208, 433, 'I remind myself of the bigger picture and keep pushing forward', '2025-06-28'),
(707, 208, 423, 'I avoid resolving it and hope it will resolve itself', '2025-06-28'),
(708, 208, 420, 'I ensure clarity and ask for feedback', '2025-06-28'),
(709, 208, 429, 'I set small milestones and celebrate progress', '2025-06-28'),
(710, 208, 424, 'I accept them humbly and feel proud', '2025-06-28'),
(711, 208, 406, 'Handle everything at once without prioritizing', '2025-06-28'),
(712, 208, 408, 'Explain the procedure and try to ease their anxiety', '2025-06-28'),
(713, 208, 421, 'I clarify immediately and resolve it calmly', '2025-06-28'),
(714, 208, 414, 'I listen carefully to understand their point of view', '2025-06-28'),
(715, 208, 412, 'I dwell on it and find it hard to move on', '2025-06-28'),
(716, 208, 411, 'I feel defensive but try to listen', '2025-06-28'),
(717, 208, 416, 'I get stressed but eventually find a way to adjust', '2025-06-28'),
(718, 208, 427, 'I juggle tasks but sometimes miss details', '2025-06-28'),
(719, 208, 431, 'I rarely focus on personal growth and rely on my current skills', '2025-06-28'),
(720, 208, 410, 'I get anxious but push through', '2025-06-28'),
(721, 208, 407, 'Rely on your current knowledge without exploring new advancements', '2025-06-28'),
(722, 208, 434, 'I focus on my own tasks and leave others to do the same', '2025-06-28'),
(723, 208, 413, 'Overwhelmed and often need to take a break', '2025-06-28'),
(724, 208, 417, 'I avoid group discussions and prefer working alone', '2025-06-28'),
(725, 208, 419, 'Seek advice from trusted friends or colleagues', '2025-06-28'),
(726, 208, 425, 'I manage well, but sometimes get distracted', '2025-06-28'),
(727, 208, 430, 'I take charge confidently and guide the team', '2025-06-28'),
(728, 208, 415, 'I go with my gut feeling', '2025-06-28'),
(729, 206, 405, 'Stay calm and reassure them with facts', '2025-06-28'),
(730, 206, 406, 'Tackle the most urgent cases first', '2025-06-28'),
(731, 206, 407, 'Rely on your current knowledge without exploring new advancements', '2025-06-28'),
(732, 206, 412, 'I feel disappointed but keep going', '2025-06-28'),
(733, 206, 409, 'Keep it brief and move on to the next patient', '2025-06-28'),
(734, 206, 422, 'Very comfortable, I do it constructively', '2025-06-28'),
(735, 206, 415, 'I analyze all available options before deciding', '2025-06-28'),
(736, 206, 428, 'I get distracted often and lose track of time', '2025-06-28'),
(737, 206, 417, 'I avoid group discussions and prefer working alone', '2025-06-28'),
(738, 206, 408, 'Ignore their discomfort and proceed as usual', '2025-06-28'),
(739, 206, 420, 'I ensure clarity and ask for feedback', '2025-06-28'),
(740, 206, 432, 'I offer help and support to make things easier for them', '2025-06-28'),
(741, 206, 413, 'Overwhelmed and often need to take a break', '2025-06-28'),
(742, 206, 431, 'I focus on improving when challenges arise', '2025-06-28'),
(743, 206, 421, 'I let it slide and move on', '2025-06-28'),
(744, 206, 414, 'I listen carefully to understand their point of view', '2025-06-28'),
(745, 206, 430, 'I take charge confidently and guide the team', '2025-06-28'),
(746, 206, 433, 'I struggle with motivation and find it difficult to stay on track', '2025-06-28'),
(747, 206, 418, 'I try to guess and hope for the best', '2025-06-28'),
(748, 206, 425, 'I manage well, but sometimes get distracted', '2025-06-28'),
(749, 206, 416, 'I get stressed but eventually find a way to adjust', '2025-06-28'),
(750, 206, 427, 'I juggle tasks but sometimes miss details', '2025-06-28'),
(751, 206, 423, 'I avoid resolving it and hope it will resolve itself', '2025-06-28'),
(752, 206, 426, 'I plan ahead and work on it early', '2025-06-28'),
(753, 206, 424, 'I accept them humbly and feel proud', '2025-06-28'),
(754, 206, 411, 'I take it personally but try to learn from it', '2025-06-28'),
(755, 206, 434, 'I focus on my own tasks and leave others to do the same', '2025-06-28'),
(756, 206, 410, 'I feel overwhelmed and seek support from others', '2025-06-28'),
(757, 206, 419, 'Seek advice from trusted friends or colleagues', '2025-06-28'),
(758, 206, 429, 'I set small milestones and celebrate progress', '2025-06-28'),
(759, 207, 412, 'I see it as an opportunity to grow', '2025-06-28'),
(760, 207, 430, 'I avoid taking the lead and let others guide the way', '2025-06-28'),
(761, 207, 431, 'I don’t actively seek personal development but work on it when needed', '2025-06-28'),
(762, 207, 417, 'I wait for others to take the lead', '2025-06-28'),
(763, 207, 434, 'I focus on my own tasks and leave others to do the same', '2025-06-28'),
(764, 207, 425, 'I prioritize tasks and plan my day efficiently', '2025-06-28'),
(765, 207, 409, 'Direct the patient to another professional without explaining', '2025-06-28'),
(766, 207, 410, 'I feel overwhelmed and seek support from others', '2025-06-28'),
(767, 207, 405, 'Feel overwhelmed and unsure of how to proceed', '2025-06-28'),
(768, 207, 406, 'Tackle the most urgent cases first', '2025-06-28'),
(769, 207, 415, 'I go with my gut feeling', '2025-06-28'),
(770, 207, 414, 'I feel frustrated but try to stay calm', '2025-06-28'),
(771, 207, 432, 'I offer help and support to make things easier for them', '2025-06-28'),
(772, 207, 426, 'I tackle it in the days leading up to it', '2025-06-28'),
(773, 207, 419, 'Seek advice from trusted friends or colleagues', '2025-06-28'),
(774, 207, 428, 'I get distracted often and lose track of time', '2025-06-28'),
(775, 207, 413, 'Focused and productive', '2025-06-28'),
(776, 207, 427, 'I juggle tasks but sometimes miss details', '2025-06-28'),
(777, 207, 411, 'I accept it gracefully and use it to improve', '2025-06-28'),
(778, 207, 408, 'Explain the procedure and try to ease their anxiety', '2025-06-28'),
(779, 207, 416, 'I adapt quickly and look for solutions', '2025-06-28'),
(780, 207, 433, 'I break goals into smaller steps and track progress', '2025-06-28'),
(781, 207, 429, 'I need external motivation from others to stay on track', '2025-06-28'),
(782, 207, 422, 'I avoid giving feedback to avoid conflict', '2025-06-28'),
(783, 207, 418, 'I research the issue and find a solution', '2025-06-28'),
(784, 207, 420, 'I ensure clarity and ask for feedback', '2025-06-28'),
(785, 207, 424, 'I accept them humbly and feel proud', '2025-06-28'),
(786, 207, 421, 'I try to explain myself but feel frustrated', '2025-06-28'),
(787, 207, 407, 'Wait until a new technology is widely adopted before using it', '2025-06-28'),
(788, 207, 423, 'I try to understand their perspective and find a compromise', '2025-06-28'),
(789, 209, 418, 'I ask others for help', '2025-06-28'),
(790, 209, 409, 'Direct the patient to another professional without explaining', '2025-06-28'),
(791, 209, 406, 'Tackle the most urgent cases first', '2025-06-28'),
(792, 209, 416, 'I adapt quickly and look for solutions', '2025-06-28'),
(793, 209, 415, 'I seek advice from others before deciding', '2025-06-28'),
(794, 209, 428, 'I take short breaks to keep my energy levels up', '2025-06-28'),
(795, 209, 433, 'I struggle with motivation and find it difficult to stay on track', '2025-06-28'),
(796, 209, 431, 'I don’t actively seek personal development but work on it when needed', '2025-06-28'),
(797, 209, 429, 'I set small milestones and celebrate progress', '2025-06-28'),
(798, 209, 420, 'I communicate confidently, trusting that people will understand', '2025-06-28'),
(799, 209, 411, 'I take it personally but try to learn from it', '2025-06-28'),
(800, 209, 426, 'I work frantically as the deadline approaches', '2025-06-28'),
(801, 209, 419, 'Rely on intuition and make a quick decision', '2025-06-28'),
(802, 209, 417, 'I prefer listening to others and giving feedback', '2025-06-28'),
(803, 209, 422, 'I avoid giving feedback to avoid conflict', '2025-06-28'),
(804, 209, 432, 'I ask if they need assistance, but don’t push too much', '2025-06-28'),
(805, 209, 421, 'I clarify immediately and resolve it calmly', '2025-06-28'),
(806, 209, 410, 'I stay calm and think of solutions', '2025-06-28'),
(807, 209, 413, 'Stressed, and it affects my performance', '2025-06-28'),
(808, 209, 425, 'I manage well, but sometimes get distracted', '2025-06-28'),
(809, 209, 430, 'I take charge confidently and guide the team', '2025-06-28'),
(810, 209, 423, 'I stick to my point of view but listen to theirs', '2025-06-28'),
(811, 209, 427, 'I stay organized and handle each task one at a time', '2025-06-28'),
(812, 209, 405, 'Stay calm and reassure them with facts', '2025-06-28'),
(813, 209, 412, 'I feel disappointed but keep going', '2025-06-28'),
(814, 209, 424, 'I feel shy but appreciate them', '2025-06-28'),
(815, 209, 407, 'Wait until a new technology is widely adopted before using it', '2025-06-28'),
(816, 209, 408, 'Explain the procedure and try to ease their anxiety', '2025-06-28'),
(817, 209, 414, 'I listen carefully to understand their point of view', '2025-06-28'),
(818, 209, 434, 'I let the team work independently without much involvement', '2025-06-28'),
(819, 210, 416, 'I adapt quickly and look for solutions', '2025-06-28'),
(820, 210, 424, 'I accept them humbly and feel proud', '2025-06-28'),
(821, 210, 431, 'I focus on improving when challenges arise', '2025-06-28'),
(822, 210, 412, 'I dwell on it and find it hard to move on', '2025-06-28'),
(823, 210, 426, 'I work frantically as the deadline approaches', '2025-06-28'),
(824, 210, 421, 'I try to explain myself but feel frustrated', '2025-06-28'),
(825, 210, 423, 'I try to understand their perspective and find a compromise', '2025-06-28'),
(826, 210, 419, 'Seek advice from trusted friends or colleagues', '2025-06-28'),
(827, 210, 432, 'I ask if they need assistance, but don’t push too much', '2025-06-28'),
(828, 210, 429, 'I need external motivation from others to stay on track', '2025-06-28'),
(829, 210, 422, 'Very comfortable, I do it constructively', '2025-06-28'),
(830, 210, 433, 'I remind myself of the bigger picture and keep pushing forward', '2025-06-28'),
(831, 210, 415, 'I seek advice from others before deciding', '2025-06-28'),
(832, 210, 411, 'I take it personally but try to learn from it', '2025-06-28'),
(833, 210, 408, 'Immediately offer a different procedure without discussing options', '2025-06-28'),
(834, 210, 427, 'I juggle tasks but sometimes miss details', '2025-06-28'),
(835, 210, 425, 'I often feel overwhelmed and miss deadlines', '2025-06-28'),
(836, 210, 406, 'Tackle the most urgent cases first', '2025-06-28'),
(837, 210, 434, 'I assign tasks clearly and keep everyone on track', '2025-06-28'),
(838, 210, 420, 'I ensure clarity and ask for feedback', '2025-06-28'),
(839, 210, 405, 'Ignore their concerns and continue the examination', '2025-06-28'),
(840, 210, 410, 'I feel overwhelmed and seek support from others', '2025-06-28'),
(841, 210, 413, 'Stressed, and it affects my performance', '2025-06-28'),
(842, 210, 428, 'I take short breaks to keep my energy levels up', '2025-06-28'),
(843, 210, 418, 'I research the issue and find a solution', '2025-06-28'),
(844, 210, 409, 'Direct the patient to another professional without explaining', '2025-06-28'),
(845, 210, 407, 'Wait until a new technology is widely adopted before using it', '2025-06-28'),
(846, 210, 414, 'I listen carefully to understand their point of view', '2025-06-28'),
(847, 210, 417, 'I prefer listening to others and giving feedback', '2025-06-28'),
(848, 210, 430, 'I lead when necessary but prefer to collaborate', '2025-06-28'),
(849, 211, 420, 'I avoid conversations that could lead to misunderstandings', '2025-06-28'),
(850, 211, 414, 'I try to explain my side but remain open', '2025-06-28'),
(851, 211, 416, 'I adapt quickly and look for solutions', '2025-06-28'),
(852, 211, 412, 'I feel disappointed but keep going', '2025-06-28'),
(853, 211, 409, 'Keep it brief and move on to the next patient', '2025-06-28'),
(854, 211, 410, 'I get anxious but push through', '2025-06-28'),
(855, 211, 405, 'Suggest they try a different optometrist', '2025-06-28'),
(856, 211, 421, 'I try to explain myself but feel frustrated', '2025-06-28'),
(857, 211, 406, 'Tackle the most urgent cases first', '2025-06-28'),
(858, 211, 422, 'I avoid giving feedback to avoid conflict', '2025-06-28'),
(859, 211, 429, 'I remind myself of the end goal to stay focused', '2025-06-28'),
(860, 211, 417, 'I wait for others to take the lead', '2025-06-28'),
(861, 211, 434, 'I focus on my own tasks and leave others to do the same', '2025-06-28'),
(862, 211, 411, 'I accept it gracefully and use it to improve', '2025-06-28'),
(863, 211, 426, 'I plan ahead and work on it early', '2025-06-28'),
(864, 211, 419, 'Seek advice from trusted friends or colleagues', '2025-06-28'),
(865, 211, 433, 'I break goals into smaller steps and track progress', '2025-06-28'),
(866, 211, 415, 'I analyze all available options before deciding', '2025-06-28'),
(867, 211, 430, 'I take charge confidently and guide the team', '2025-06-28'),
(868, 211, 407, 'Rely on your current knowledge without exploring new advancements', '2025-06-28'),
(869, 211, 424, 'I accept them humbly and feel proud', '2025-06-28'),
(870, 211, 428, 'I eliminate distractions and stick to a schedule', '2025-06-28'),
(871, 211, 413, 'Anxious, but manage to get through it', '2025-06-28'),
(872, 211, 408, 'Ignore their discomfort and proceed as usual', '2025-06-28'),
(873, 211, 427, 'I juggle tasks but sometimes miss details', '2025-06-28'),
(874, 211, 432, 'I offer help and support to make things easier for them', '2025-06-28'),
(875, 211, 423, 'I stick to my point of view but listen to theirs', '2025-06-28'),
(876, 212, 432, 'I ask if they need assistance, but don’t push too much', '2025-06-28'),
(877, 212, 405, 'Ignore their concerns and continue the examination', '2025-06-28'),
(878, 212, 416, 'I adapt quickly and look for solutions', '2025-06-28'),
(879, 212, 412, 'I feel disappointed but keep going', '2025-06-28'),
(880, 212, 408, 'Ignore their discomfort and proceed as usual', '2025-06-28'),
(881, 212, 407, 'Wait until a new technology is widely adopted before using it', '2025-06-28'),
(882, 212, 433, 'I remind myself of the bigger picture and keep pushing forward', '2025-06-28'),
(883, 212, 409, 'Avoid discussing the bad news, hoping the patient won&#039;t ask further', '2025-06-28'),
(884, 212, 415, 'I go with my gut feeling', '2025-06-28'),
(885, 212, 413, 'Stressed, and it affects my performance', '2025-06-28');

-- --------------------------------------------------------

--
-- Table structure for table `blooms_level`
--

CREATE TABLE `blooms_level` (
  `b_id` int(11) NOT NULL,
  `b_level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blooms_level`
--

INSERT INTO `blooms_level` (`b_id`, `b_level`) VALUES
(1, 'Remembering'),
(2, 'Understanding'),
(3, 'Appling'),
(4, 'Analyzing'),
(5, 'Evaluating'),
(6, 'Creating');

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
(3, 'BSC(CS)', 2),
(4, 'BSC(DS)', 2),
(5, 'BBA', 1),
(6, 'BBA(TTM)', 1),
(7, 'BBA(DM)', 1),
(8, 'BBA(ENT)', 1),
(9, 'BBA(SM)', 1),
(10, 'BSC(FAS)', 3),
(12, 'BSC(INT)', 2),
(13, 'BSC(MS)', 1),
(14, 'BSC(FTP)', 3),
(15, 'BMLT', 2),
(20, 'BSC(CCT)', 2),
(23, 'BSC(OPT)', 2),
(29, 'BSC(ANI)', 3),
(30, 'MSC(ANI)', 3),
(31, 'MSC(MS)', 3),
(32, 'BSC(HM)', 2);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `q1_ans` varchar(500) NOT NULL,
  `q2_ans` varchar(500) NOT NULL,
  `q3_ans` varchar(500) NOT NULL,
  `q4_ans` varchar(500) NOT NULL,
  `q5_ans` varchar(500) NOT NULL,
  `std_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `q_id` int(11) NOT NULL,
  `q_course` int(11) NOT NULL,
  `q_section` int(11) NOT NULL,
  `q_level` int(11) NOT NULL,
  `q_blooms_level` int(11) NOT NULL,
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

INSERT INTO `question` (`q_id`, `q_course`, `q_section`, `q_level`, `q_blooms_level`, `q_text`, `q_op1`, `q_op2`, `q_op3`, `q_op4`, `q_ans`, `q_timestamp`) VALUES
(405, 1, 1, 3, 1, 'How do you react when a patient expresses anxiety about their vision treatment?', 'Stay calm and reassure them with facts', 'Ignore their concerns and continue the examination', 'Suggest they try a different optometrist', 'Feel overwhelmed and unsure of how to proceed', 'Stay calm and reassure them with facts', '2025-06-27 10:15:06'),
(406, 1, 1, 1, 3, 'How do you prioritize your tasks when dealing with multiple patients?', 'Handle everything at once without prioritizing', 'Tackle the most urgent cases first', 'Ask the patient to wait while you finish other tasks', 'Delegate tasks to others even if they’re not trained', 'Tackle the most urgent cases first', '2025-06-27 10:16:07'),
(407, 1, 1, 3, 3, 'How do you keep up with new research and technology in optometry?', 'Rely on your current knowledge without exploring new advancements', 'Wait until a new technology is widely adopted before using it', 'Ask peers to update you about new developments', 'Attend conferences and workshops', 'Attend conferences and workshops', '2025-06-27 05:33:05'),
(408, 1, 1, 1, 6, 'What would you do if a patient is uncomfortable with a certain diagnostic procedure?', 'Ignore their discomfort and proceed as usual', 'Immediately offer a different procedure without discussing options', 'Explain the procedure and try to ease their anxiety', 'Ask the patient to leave if they are unhappy', 'Explain the procedure and try to ease their anxiety', '2025-06-27 05:33:05'),
(409, 1, 1, 3, 4, 'What is your approach when communicating bad news about a patient’s vision?', 'Keep it brief and move on to the next patient', 'Avoid discussing the bad news, hoping the patient won&#039;t ask further', 'Direct the patient to another professional without explaining', 'Deliver the news with empathy, and discuss options and next steps', 'Deliver the news with empathy, and discuss options and next steps', '2025-06-27 05:33:05'),
(410, 1, 2, 2, 2, 'How do you react when faced with a challenging situation?', 'I feel overwhelmed and seek support from others', 'I get anxious but push through', 'I stay calm and think of solutions', 'I avoid the situation if possible', 'I stay calm and think of solutions', '2025-06-27 05:33:05'),
(411, 1, 2, 2, 1, 'When you receive criticism, how do you respond?', 'I take it personally but try to learn from it', 'I accept it gracefully and use it to improve', 'I feel defensive but try to listen', 'I reject it and don’t take it seriously', 'I accept it gracefully and use it to improve', '2025-06-27 05:33:05'),
(412, 1, 2, 3, 1, 'How do you handle failure or setbacks?', 'I see it as an opportunity to grow', 'I feel disappointed but keep going', 'I dwell on it and find it hard to move on', 'I give up and avoid similar situations in the future', 'I see it as an opportunity to grow', '2025-06-27 05:33:05'),
(413, 1, 2, 3, 2, 'How do you feel when you&#039;re under pressure?', 'Anxious, but manage to get through it', 'Stressed, and it affects my performance', 'Focused and productive', 'Overwhelmed and often need to take a break', 'Focused and productive', '2025-06-27 05:33:05'),
(414, 1, 2, 2, 2, 'When someone disagrees with you, how do you handle the situation?', 'I listen carefully to understand their point of view', 'I try to explain my side but remain open', 'I feel frustrated but try to stay calm', 'I get defensive and stick to my opinion', 'I listen carefully to understand their point of view', '2025-06-27 05:33:05'),
(415, 1, 3, 1, 4, 'When making a decision, how do you pproach it?', 'I go with my gut feeling', 'I seek advice from others before deciding', 'I analyze all available options before deciding', 'I avoid making decisions and let others decide', 'I analyze all available options before deciding', '2025-06-27 05:33:05'),
(416, 1, 3, 2, 5, 'How do you deal with unexpected changes in a project or task?', 'I adapt quickly and look for solutions', 'I get stressed but eventually find a way to adjust', 'I struggle to adjust and need support from others', 'I resist the change and try to stick with the original plan', 'I adapt quickly and look for solutions', '2025-06-27 05:33:05'),
(417, 1, 3, 2, 5, 'How do you approach problem-solving in a group setting?', 'I wait for others to take the lead', 'I prefer listening to others and giving feedback', 'I avoid group discussions and prefer working alone', 'I actively contribute and offer solutions', 'I actively contribute and offer solutions', '2025-06-27 05:33:05'),
(418, 1, 3, 3, 1, 'How do you handle a situation where you don’t know the answer to a problem?', 'I ask others for help', 'I research the issue and find a solution', 'I try to guess and hope for the best', 'I avoid addressing it and let someone else handle it', 'I research the issue and find a solution', '2025-06-27 05:33:05'),
(419, 1, 3, 1, 2, 'When facing a tough decision, you:', 'Rely on intuition and make a quick decision', 'Seek advice from trusted friends or colleagues', 'Weigh all pros and cons before deciding', 'Avoid making a decision as long as possible', 'Weigh all pros and cons before deciding', '2025-06-27 05:33:05'),
(420, 1, 4, 3, 5, 'How do you ensure your message is understood in a conversation?', 'I avoid conversations that could lead to misunderstandings', 'I communicate confidently, trusting that people will understand', 'I ensure clarity and ask for feedback', 'I sometimes struggle to convey my message clearly', 'I ensure clarity and ask for feedback', '2025-06-27 05:33:05'),
(421, 1, 4, 2, 6, 'How do you react when there’s a misunderstanding during communication?', 'I try to explain myself but feel frustrated', 'I clarify immediately and resolve it calmly', 'I let it slide and move on', 'I avoid the person until things cool down', 'I clarify immediately and resolve it calmly', '2025-06-27 05:33:05'),
(422, 1, 4, 2, 3, 'How comfortable are you in giving feedback to others?', 'I give feedback when necessary, but it’s not easy', 'Very comfortable, I do it constructively', 'I avoid giving feedback to avoid conflict', 'I rarely give feedback, as I fear it will be taken negatively', 'Very comfortable, I do it constructively', '2025-06-27 05:33:05'),
(423, 1, 4, 3, 6, 'When you have a disagreement with someone, how do you resolve it?', 'I stick to my point of view but listen to theirs', 'I avoid resolving it and hope it will resolve itself', 'I try to understand their perspective and find a compromise', 'I become confrontational and try to win the argument', 'I try to understand their perspective and find a compromise', '2025-06-27 05:33:05'),
(424, 1, 4, 3, 4, 'How do you react to praise or compliments?', 'I feel shy but appreciate them', 'I accept them humbly and feel proud', 'I downplay them and feel uncomfortable', 'I dismiss them, feeling that I don’t deserve them', 'I accept them humbly and feel proud', '2025-06-27 05:33:05'),
(425, 1, 5, 2, 2, 'How do you manage your tasks and responsibilities?', 'I manage well, but sometimes get distracted', 'I prioritize tasks and plan my day efficiently', 'I often feel overwhelmed and miss deadlines', 'I procrastinate and do things last minute', 'I prioritize tasks and plan my day efficiently', '2025-06-27 05:33:05'),
(426, 1, 5, 1, 1, 'When you have a deadline, how do you approach it?', 'I tackle it in the days leading up to it', 'I work frantically as the deadline approaches', 'I plan ahead and work on it early', 'I tend to avoid it until the last possible moment', 'I plan ahead and work on it early', '2025-06-27 05:33:05'),
(427, 1, 5, 2, 1, 'How do you handle multiple tasks with tight deadlines?', 'I juggle tasks but sometimes miss details', 'I stay organized and handle each task one at a time', 'I get stressed and find it hard to focus', 'I delegate tasks or avoid taking on too much', 'I stay organized and handle each task one at a time', '2025-06-27 05:33:05'),
(428, 1, 5, 2, 2, 'How do you ensure that you stay focused while working?', 'I take short breaks to keep my energy levels up', 'I get distracted often and lose track of time', 'I eliminate distractions and stick to a schedule', 'I struggle to focus and often switch tasks', 'I eliminate distractions and stick to a schedule', '2025-06-27 05:33:05'),
(429, 1, 5, 3, 2, 'When working on a long-term project, how do you maintain motivation?', 'I set small milestones and celebrate progress', 'I remind myself of the end goal to stay focused', 'I need external motivation from others to stay on track', 'I struggle to stay motivated and often lose interest', 'I set small milestones and celebrate progress', '2025-06-27 05:33:05'),
(430, 1, 6, 1, 4, 'How do you handle leadership responsibilities?', 'I lead when necessary but prefer to collaborate', 'I take charge confidently and guide the team', 'I avoid taking the lead and let others guide the way', 'I find leadership overwhelming and avoid it whenever possible', 'I take charge confidently and guide the team', '2025-06-27 05:33:05'),
(431, 1, 6, 3, 5, 'How do you approach personal growth and development?', 'I focus on improving when challenges arise', 'I don’t actively seek personal development but work on it when needed', 'I regularly set goals and seek opportunities to improve', 'I rarely focus on personal growth and rely on my current skills', 'I regularly set goals and seek opportunities to improve', '2025-06-27 05:33:05'),
(432, 1, 6, 2, 5, 'When you see someone struggling, how do you respond?', 'I ask if they need assistance, but don’t push too much', 'I offer help and support to make things easier for them', 'I ignore it, as I don’t want to intrude', 'I avoid getting involved and let them figure it out themselves', 'I offer help and support to make things easier for them', '2025-06-27 05:33:05'),
(433, 1, 6, 2, 1, 'How do you motivate yourself to achieve long-term goals?', 'I remind myself of the bigger picture and keep pushing forward', 'I break goals into smaller steps and track progress', 'I struggle with motivation and find it difficult to stay on track', 'I often give up on long-term goals when faced with obstacles', 'I break goals into smaller steps and track progress', '2025-06-27 05:33:06'),
(434, 1, 6, 3, 2, 'When leading a team, how do you ensure everyone is engaged?', 'I assign tasks clearly and keep everyone on track', 'I let the team work independently without much involvement', 'I focus on my own tasks and leave others to do the same', 'I encourage open communication and ensure everyone is involved', 'I encourage open communication and ensure everyone is involved', '2025-06-27 05:33:06');

-- --------------------------------------------------------

--
-- Table structure for table `q_level`
--

CREATE TABLE `q_level` (
  `d_id` int(11) NOT NULL,
  `d_level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `q_level`
--

INSERT INTO `q_level` (`d_id`, `d_level`) VALUES
(1, 'Easy'),
(2, 'Moderate'),
(3, 'Hard');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `r_id` int(11) NOT NULL,
  `std_id` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`r_id`, `std_id`, `score`, `date`) VALUES
(48, 206, 9, '2025-06-27'),
(49, 207, 10, '2025-06-27'),
(50, 208, 8, '2025-06-27'),
(51, 208, 9, '2025-06-28'),
(52, 206, 11, '2025-06-28'),
(53, 207, 13, '2025-06-28'),
(54, 209, 10, '2025-06-28'),
(55, 210, 8, '2025-06-28'),
(56, 211, 10, '2025-06-28'),
(57, 212, 1, '2025-06-28');

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
  `std_registration` varchar(200) NOT NULL,
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
(206, '232891210014', 'Saika Parveen', 1, 'saikaparveen651@gmail.com', 'saika123', 1, '2025-06-03 16:46:58'),
(207, '232891210015', 'Zeba Khatoon', 1, 'zebaali7896@gmail.com', 'zebaa123', 1, '2025-06-03 16:46:58'),
(208, '232891210016', 'Suvasree Biswas', 1, 'suvasree02biswas@gmail.com', 'suvas123', 1, '2025-06-03 16:46:58'),
(209, '232891210017', 'Farhan Affroz', 1, 'faffroz@gmail.com', 'faffr123', 1, '2025-06-03 16:46:58'),
(210, '232891210018', 'Tonmoy Banerjee', 1, 'tonmoybanerjee6@gmail.com', 'tonmo123', 1, '2025-06-03 16:46:58'),
(211, '232891210019', 'Kalyan Barik', 1, 'kalyanbarik2003@gmail.com', 'kalya123', 1, '2025-06-03 16:46:58'),
(212, '232891210020', 'MD Sami Parwez', 1, 'mdsamiparwez74@gmail.com', 'mdsam123', 1, '2025-06-03 16:46:58'),
(213, '232891210021', 'Rani Kumari', 1, 'ranisha7033@gmail.com', 'ranis123', 1, '2025-06-03 16:46:58'),
(214, '232891210022', 'Irfan Hossain', 1, 'hossainirfan884@gmail.com', 'hossa123', 1, '2025-06-03 16:46:58'),
(215, '232891210023', 'Anchal Jaiswal', 1, 'anchaljaiswal497@gmail.com', 'ancha123', 1, '2025-06-03 16:46:58'),
(216, '232891210024', 'Priyanshi Bhattacharya', 1, 'priyanshi.bhattacharya.2005@gmail.com', 'priya123', 1, '2025-06-03 16:46:58'),
(217, '232891210025', 'Payel Satpati', 1, 'satpatipayel.wb@gmail.com', 'satpa123', 1, '2025-06-03 16:46:58'),
(218, '232891210026', 'Diba Farha', 1, 'dibafarha2020@gmail.com', 'dibaf123', 1, '2025-06-03 16:46:58'),
(219, '232891210027', 'Sweata Hati', 1, 'sweatahati@gmail.com', 'sweat123', 1, '2025-06-03 16:46:58'),
(220, '232891210028', 'Ashim Das', 1, 'adas63366@gmail.com', 'adas6123', 1, '2025-06-03 16:46:58'),
(221, '232891210029', 'MD. IFTIKHAR HOSSAIN', 1, 'iftikharhossain91@gmail.com', 'iftik123', 1, '2025-06-03 16:46:58'),
(222, '232891210030', 'MEHWISH SIDDIQUE', 1, 'mehwishsiddique46@gmail.com', 'mehwi123', 1, '2025-06-03 16:46:58'),
(223, '232891210031', 'SANTONU MANDAL', 1, 'santonumandal9002780071@gmail.com', 'santo123', 1, '2025-06-03 16:46:58'),
(224, '232891210032', 'RUDRA PATRA', 1, 'rudrapatra41@gmail.com', 'rudra123', 1, '2025-06-03 16:46:58'),
(225, '232891210033', 'RUKSANA KHATUN', 1, 'khusikhatun8777@gmail.com', 'khusi123', 1, '2025-06-03 16:46:58');

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
  ADD PRIMARY KEY (`ans_id`),
  ADD KEY `std_id_fk` (`std_id`),
  ADD KEY `q_id_fk` (`q_id`);

--
-- Indexes for table `blooms_level`
--
ALTER TABLE `blooms_level`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`c_id`),
  ADD KEY `school_id_fk` (`school_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`q_id`),
  ADD KEY `q_course_fk` (`q_course`),
  ADD KEY `q_sec_fk` (`q_section`),
  ADD KEY `question_blooms_level` (`q_blooms_level`),
  ADD KEY `question_level` (`q_level`);

--
-- Indexes for table `q_level`
--
ALTER TABLE `q_level`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`r_id`),
  ADD KEY `std_fk` (`std_id`);

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
  MODIFY `ac_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `ans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=886;

--
-- AUTO_INCREMENT for table `blooms_level`
--
ALTER TABLE `blooms_level`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `q_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=435;

--
-- AUTO_INCREMENT for table `q_level`
--
ALTER TABLE `q_level`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

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
  MODIFY `std_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=226;

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
-- Constraints for table `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `q_id_fk` FOREIGN KEY (`q_id`) REFERENCES `question` (`q_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `std_id_fk` FOREIGN KEY (`std_id`) REFERENCES `students` (`std_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `school_id_fk` FOREIGN KEY (`school_id`) REFERENCES `school` (`sch_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `q_course_fk` FOREIGN KEY (`q_course`) REFERENCES `course` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `q_sec_fk` FOREIGN KEY (`q_section`) REFERENCES `section` (`sec_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `question_blooms_level` FOREIGN KEY (`q_blooms_level`) REFERENCES `blooms_level` (`b_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `question_level` FOREIGN KEY (`q_level`) REFERENCES `q_level` (`d_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `result`
--
ALTER TABLE `result`
  ADD CONSTRAINT `std_fk` FOREIGN KEY (`std_id`) REFERENCES `students` (`std_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `course_fk` FOREIGN KEY (`std_stream`) REFERENCES `course` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
