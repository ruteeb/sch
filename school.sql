-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2018 at 03:19 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int(11) NOT NULL DEFAULT '1',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `email`, `password`, `phone`, `level`, `active`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Test', 'test@test.com', '$2y$10$I7//zyN/lsYoIfhum5lqIO/sybIEt/F/HwmBNyMxLCy8XU.HTk/o.', '555-555-555', 1, 1, 'JKEdm9PHHtMXEsS1asWRVWPpuhcJFaU5tshcU60fc895p4UiXcaYrlN633Y5', '2018-06-10 22:00:00', '2018-06-15 00:43:42'),
(2, 'superadmin', 'superadmin@gmail.com', '$2y$10$zcVwsS5Ab7rNSGrF3WZ5yutunc7KIUW.B4hYfhJKtPylecUny7wLW', '123123123', 2, 1, 'f8Emyyvayy9iEl6p5PsoSuG0OSCZ3xFI726Bqs2BPfLrfodqXuOnhh6t6Mzc', '2018-06-10 23:28:18', '2018-06-10 23:28:18'),
(6, 'somur', 'somur@gmail.com', '$2y$10$65joWb81TW307dBkXTiCbOIPsPBiHII94rIDmdiWwFR6GLMsovz7y', '123654789', 1, 0, NULL, '2018-06-13 10:19:33', '2018-06-15 00:42:35');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_id` int(10) UNSIGNED NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `title`, `course_id`, `active`, `created_at`, `updated_at`) VALUES
(5, 'First class', 1, 1, '2018-06-15 20:20:35', '2018-06-16 18:52:13'),
(6, 'Second Class', 2, 1, '2018-06-15 20:21:57', '2018-06-16 18:52:39'),
(7, 'Hozaifa Test', 3, 0, '2018-06-16 17:02:44', '2018-06-16 18:52:49'),
(8, 'Math', 1, 1, '2018-06-16 18:34:33', '2018-06-16 18:52:05');

-- --------------------------------------------------------

--
-- Table structure for table `classes_teachers`
--

CREATE TABLE `classes_teachers` (
  `id` int(10) UNSIGNED NOT NULL,
  `class_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classes_teachers`
--

INSERT INTO `classes_teachers` (`id`, `class_id`, `user_id`, `created_at`, `updated_at`) VALUES
(16, 7, 14, '2018-06-17 07:14:40', '2018-06-17 07:14:40'),
(17, 6, 14, '2018-06-17 07:14:40', '2018-06-17 07:14:40'),
(18, 8, 14, '2018-06-17 07:14:40', '2018-06-17 07:14:40'),
(19, 5, 14, '2018-06-17 07:14:40', '2018-06-17 07:14:40'),
(21, 5, 16, '2018-06-23 23:11:06', '2018-06-23 23:11:06'),
(22, 8, 16, '2018-06-23 23:11:06', '2018-06-23 23:11:06'),
(23, 6, 15, '2018-06-23 23:11:48', '2018-06-23 23:11:48'),
(24, 7, 15, '2018-06-23 23:11:48', '2018-06-23 23:11:48'),
(25, 6, 8, '2018-06-23 23:12:07', '2018-06-23 23:12:07'),
(26, 7, 6, '2018-06-23 23:14:15', '2018-06-23 23:14:15'),
(27, 6, 6, '2018-06-23 23:14:15', '2018-06-23 23:14:15'),
(28, 5, 17, '2018-06-23 23:15:23', '2018-06-23 23:15:23'),
(29, 8, 17, '2018-06-23 23:15:23', '2018-06-23 23:15:23'),
(30, 7, 17, '2018-06-23 23:15:23', '2018-06-23 23:15:23');

-- --------------------------------------------------------

--
-- Table structure for table `contracts`
--

CREATE TABLE `contracts` (
  `id` int(10) UNSIGNED NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `contract_value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hour_count` int(11) NOT NULL,
  `price_per` int(11) NOT NULL,
  `contact_person` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contracts`
--

INSERT INTO `contracts` (`id`, `start_date`, `end_date`, `contract_value`, `hour_count`, `price_per`, `contact_person`, `student_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '2018-06-06', '2018-06-30', '2500', 100, 10, 'Test test test test ', 8, 2, NULL, '2018-06-14 22:00:00', '2018-06-14 22:00:00'),
(2, '2018-06-23', '2018-06-30', '3000', 10, 50, 'test test ', 1, 2, NULL, '2018-06-23 22:00:00', '2018-06-23 22:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `title`, `description`, `image`, `active`, `created_at`, `updated_at`) VALUES
(1, 'First Course', 'Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test \r\nTest Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test \r\nTest Test Test Test Test Test Test Test Test Test Test Test Test Test\r\nTest Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test \r\nTest Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test \r\nTest Test Test Test Test Test Test Test Test Test Test Test Test Test', '1d606e75b6bb3e4882503d8f336f8aedacd179ec1 Music.jpg', 1, '2018-06-15 04:03:23', '2018-06-21 00:34:30'),
(2, 'Second Course', 'Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test \r\nTest Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test \r\nTest Test Test Test Test Test Test Test Test Test Test Test Test Test\r\nTest Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test \r\nTest Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test \r\nTest Test Test Test Test Test Test Test Test Test Test Test Test Test', '5701dffc5993e5aeb1d7a4fe7b49b5734ab880551Cars.jpg', 1, '2018-06-15 04:03:43', '2018-06-21 00:34:26'),
(3, 'Third Course', 'Test Description Course Test Description Course Test Description Course Test Description Course Test Description Course Test Description Course \r\nTest Description Course Test Description Course Test Description Course Test Description Course Test Description Course \r\nTest Description Course Test Description Course Test Description Course\r\nTest Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test \r\nTest Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test \r\nTest Test Test Test Test Test Test Test Test Test Test Test Test Test', '89e24114ce460d492b75a2915295cd77c45e7dc91Watch.jpg', 1, '2018-06-15 20:21:34', '2018-06-21 00:34:20'),
(4, 'Forth Course', 'DETAILED PROJECT REPORTS\r\n\r\nDetailed project reports\r\n\r\nDetailed project report is prepared for the investment decision-making approval, but also execution of the project and also preparation of the plan. Detailed project report is a complete document for investment decision-making, approval, planning. Detailed project report is base document for planning the project and implementing the project.\r\n\r\nDPR for General Education Department zip 1.67 mb\r\nThe imperatives for introduction of eGovernance initiatives in the department are multitude of service users spread far and wide, maintenance of data confidentiality in question paper printing. This DPR has been downloaded on 10th August, 2009 and republi\r\nKeywords : Kerala, General education department, education DPR, Directorate of Public Instruction, DPI, noon meal reporting, teachers call center\r\nPosted : 28th August, 2009	\r\nDPR for Police Department zip 1.88 mb\r\nIT can help Police department in connecting service users and extending prompt and timely service to them and bring transparency in all departmental activities. This DPR has been downloaded on 10th August, 2009 and republished on this website with the per\r\nKeywords : Kerala, DPR for Police department, DPR, Kerala police, DGP, Intelligence, police information system, civil rights, FIR\r\nPosted : 28th August, 2009	\r\nDPR for Social Welfare Department zip 1.82 mb\r\nThe mandate of SWD is to provide overall care, protection, treatment, training, development and rehabilitation of women & children, disabled persons and aged. This DPR has been downloaded on 10th August, 2009 and republished on this website with the permi\r\nKeywords : Kerala, DPR for Social welfare department, welfare window, management of schemes, ICDS, DPR\r\nPosted : 28th August, 2009	\r\nDPR for Department of Industries and Commerce zip 1.11 mb\r\nDirectorate of Industries and Commerce is the implementing agency of all policy decisions of the Industries department of Government of Kerala. This DPR has been downloaded on 10th August, 2009 and republished on this website with the permission of Kerala\r\nKeywords : Kerala, DPR for industries and commerce, DPR, directorate of industries, industrial promotion, DIC, registration, licensing\r\nPosted : 28th August, 2009	\r\nDPR for Dept.of Employment & Industrial Training zip 722.69 kb\r\nThis department will create an exchange of information amongst the stakeholders including the employers and prospective employees. This DPR has been downloaded on 10th August, 2009 and republished on this website with the permission of Kerala IT departmen\r\nKeywords : Kerala, DPR, employment and industrial training, workforce, employment exchange, job seeker, employment window\r\nPosted : 28th August, 2009	\r\nDPR for Dept.of Food & Civil Supplies zip 564.94 kb\r\nThe pilot project is expected to provide platform to fine-tune the business processes/delivery structures to be considered in issue of hi-tech cards and supplies distribution. This DPR has been downloaded on 10th August, 2009 and republished on this websi\r\nKeywords : Kerala, DPR for food & civil supplies, e-Bharat, PDS, BPL family, FCI, AWD, ARD, inventory, hi-tech ration card\r\nPosted : 28th August, 2009', '5cfbb8665c52a752ee395ed888f914f34a2cbc142Watch.jpg', 1, '2018-06-21 00:33:58', '2018-06-22 21:11:58');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `content`, `image`, `date`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Title Event', 'The rules of English grammar require that in most cases a noun, or more generally a noun phrase, must be \"completed\" with a determiner to clarify what the referent of the noun phrase is.[1] The most common determiners are the articles the and a(n), which specify the presence or absence of definiteness of the noun. Other possible determiners include words like this, my, each and many – see English determiners. There are also cases where no determiner is required, as in the sentence John likes fast cars.\r\n\r\nThe definite article the is used when the referent of the noun phrase is assumed to be unique or known from the context. For example, in the sentence The boy with glasses was looking at the moon, it is assumed that in the context the reference can only be to one boy and one moon. However, the definite article is not used:\r\n\r\nwith generic nouns (plural or uncountable): cars have accelerators, happiness is contagious, referring to cars in general and happiness in general (compare the happiness I felt yesterday, specifying particular happiness);\r\nwith many proper names: John, France, London, etc.\r\nThe indefinite article a (before a consonant sound) or an (before a vowel sound) is used only with singular, countable nouns. It indicates that the referent of the noun phrase is one unspecified member of a class. For example, the sentence An ugly man was smoking a pipe does not refer to any specifically known ugly man or pipe.\r\n\r\nWhen referring to a particular date, the definite article the is typically used[2].\r\n\r\nHe was born on the 10th of May.\r\nHowever, when referring to a day of the week, the indefinite article \'a\' is used.\r\n\r\nHe was born on a Thursday.\r\nNo article is used with plural or uncountable nouns when the referent is indefinite (just as in the generic definite case described above). However, in such situations, the determiner some is often added (or any in negative contexts and in many questions). For example:\r\n\r\nThere are apples in the kitchen or There are some apples in the kitchen;\r\nWe do not have information or We do not have any information;\r\nWould you like tea? or Would you like some tea? and Would you like any tea? or Would you like some good tea?\r\nAdditionally, articles are not normally used:\r\n\r\nin noun phrases that contain other determiners (my house, this cat, America\'s history), although one can combine articles with certain other determiners, as in the many issues, such a child (see English determiners § Combinations of determiners).\r\nwith pronouns (he, nobody), although again certain combinations are possible (as the one, the many, the few).\r\npreceding noun phrases consisting of a clause or infinitive phrase (what you\'ve done is very good, to surrender is to die).\r\nIf it is required to be concise, e.g. in headlines, signs, labels, and notes, articles are often omitted along with certain other function words. For example, rather than The mayor was attacked, a newspaper headline might say just Mayor attacked.\r\n\r\nFor more information on article usage, see the sections Definite article § Notes and § Indefinite article below. For more cases where no article is used, see Zero article in English.', '6a1c27a495cda900501cbddcd1adc48b7157936e2Space.jpg', '2018-06-30', 1, '2018-06-19 18:44:50', '2018-06-22 22:52:32'),
(2, 'Test Title Event', 'The rules of English grammar require that in most cases a noun, or more generally a noun phrase, must be \"completed\" with a determiner to clarify what the referent of the noun phrase is.[1] The most common determiners are the articles the and a(n), which specify the presence or absence of definiteness of the noun. Other possible determiners include words like this, my, each and many – see English determiners. There are also cases where no determiner is required, as in the sentence John likes fast cars.\r\n\r\nThe definite article the is used when the referent of the noun phrase is assumed to be unique or known from the context. For example, in the sentence The boy with glasses was looking at the moon, it is assumed that in the context the reference can only be to one boy and one moon. However, the definite article is not used:\r\n\r\nwith generic nouns (plural or uncountable): cars have accelerators, happiness is contagious, referring to cars in general and happiness in general (compare the happiness I felt yesterday, specifying particular happiness);\r\nwith many proper names: John, France, London, etc.\r\nThe indefinite article a (before a consonant sound) or an (before a vowel sound) is used only with singular, countable nouns. It indicates that the referent of the noun phrase is one unspecified member of a class. For example, the sentence An ugly man was smoking a pipe does not refer to any specifically known ugly man or pipe.\r\n\r\nWhen referring to a particular date, the definite article the is typically used[2].\r\n\r\nHe was born on the 10th of May.\r\nHowever, when referring to a day of the week, the indefinite article \'a\' is used.\r\n\r\nHe was born on a Thursday.\r\nNo article is used with plural or uncountable nouns when the referent is indefinite (just as in the generic definite case described above). However, in such situations, the determiner some is often added (or any in negative contexts and in many questions). For example:\r\n\r\nThere are apples in the kitchen or There are some apples in the kitchen;\r\nWe do not have information or We do not have any information;\r\nWould you like tea? or Would you like some tea? and Would you like any tea? or Would you like some good tea?\r\nAdditionally, articles are not normally used:\r\n\r\nin noun phrases that contain other determiners (my house, this cat, America\'s history), although one can combine articles with certain other determiners, as in the many issues, such a child (see English determiners § Combinations of determiners).\r\nwith pronouns (he, nobody), although again certain combinations are possible (as the one, the many, the few).\r\npreceding noun phrases consisting of a clause or infinitive phrase (what you\'ve done is very good, to surrender is to die).\r\nIf it is required to be concise, e.g. in headlines, signs, labels, and notes, articles are often omitted along with certain other function words. For example, rather than The mayor was attacked, a newspaper headline might say just Mayor attacked.\r\n\r\nFor more information on article usage, see the sections Definite article § Notes and § Indefinite article below. For more cases where no article is used, see Zero article in English.', '0ae19ccddca6d766eb5904acdd6ecc6aea7d4d922 Cars.jpg', '2018-06-08', 1, '2018-06-21 01:07:01', '2018-06-22 22:52:26');

-- --------------------------------------------------------

--
-- Table structure for table `hour_students`
--

CREATE TABLE `hour_students` (
  `id` int(10) UNSIGNED NOT NULL,
  `hour` int(11) NOT NULL,
  `date` date NOT NULL,
  `start_date_lesson` date NOT NULL,
  `end_date_lesson` date NOT NULL,
  `course_id` int(10) UNSIGNED NOT NULL,
  `class_id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contract_id` int(10) UNSIGNED NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `date`, `value`, `contract_id`, `created_by`, `active`, `created_at`, `updated_at`) VALUES
(1, '2018-06-01', '1250', 1, 2, 1, '2018-06-23 22:40:19', '2018-06-23 22:40:19'),
(2, '2018-06-20', '1250', 1, 2, 1, '2018-06-23 22:41:12', '2018-06-23 23:02:14'),
(3, '2018-06-01', '1500', 2, 2, 1, '2018-06-23 22:43:27', '2018-06-23 23:02:11');

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

CREATE TABLE `lessons` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `video` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sid` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class_id` int(11) NOT NULL,
  `online` tinyint(4) NOT NULL DEFAULT '1',
  `active` int(11) NOT NULL DEFAULT '1',
  `teacher_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`id`, `title`, `content`, `video`, `sid`, `class_id`, `online`, `active`, `teacher_id`, `created_at`, `updated_at`) VALUES
(1, 'test First Lesson', 'test Content Lesson Content Lesson Content Lesson Content Lesson Content Lesson Content Lesson Content Lesson Content Lesson \r\nContent Lesson Content Lesson Content Lesson Content Lesson Content Lesson Content Lesson \r\nContent Lesson Content Lesson Content Lesson Content Lesson', 'e1e453ded75b58ee12b7d8b98a577644ab3e240032.mp4', NULL, 6, 0, 1, NULL, '2018-06-18 20:27:00', '2018-06-18 21:54:52'),
(2, 'Second Leeson', 'Test Content Test Content Test Content Test Content Test Content Test Content Test Content Test Content Test Content Test Content \r\nTest Content Test Content Test Content Test Content Test Content Test Content Test Content Test Content', 'b670e61384c6fd33434eee3913cedc6c89afc46411.mp4', NULL, 7, 0, 1, NULL, '2018-06-18 21:55:17', '2018-06-18 21:55:17');

-- --------------------------------------------------------

--
-- Table structure for table `lessons_classes`
--

CREATE TABLE `lessons_classes` (
  `id` int(10) UNSIGNED NOT NULL,
  `class_id` int(10) UNSIGNED NOT NULL,
  `lesson_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`id`, `title`, `content`, `image`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Title Material', 'Content Material Content Material Content Material Content Material Content Material Content Material Content Material Content Material Content Material \r\nContent Material Content Material Content Material Content Material Content Material', 'a52a24f28c67e3e1d052548da7514f13d40119151 Music.jpg', 1, '2018-06-19 18:13:48', '2018-06-19 18:13:48'),
(2, 'Second Title Material', 'Content Material Content Material Content Material Content Material Content Material Content Material Content Material Content Material \r\nContent Material Content Material Content Material Content Material Content Material', '428207749d5c748ed022cfb1d88021082d3395ef2Food.jpg', 1, '2018-06-19 18:14:43', '2018-06-19 18:24:47'),
(3, 'Third Material', 'Content Material Content Material Content Material Content Material Content Material Content Material Content Material Content Material Content Material \r\nContent Material Content Material Content Material Content Material Content Material Content Material \r\nContent Material Content Material Content Material', '337f99053f6b6243b31f5e3919525529b2232ea93Art.jpg', 1, '2018-06-21 00:40:15', '2018-06-21 00:40:15');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_06_10_235902_create_admins_table', 1),
(4, '2018_06_11_132956_create_settings_table', 2),
(5, '2018_06_11_144222_create_courses_table', 3),
(6, '2018_06_11_144439_create_classes_table', 4),
(7, '2018_06_11_144550_create_courses_classes_table', 5),
(8, '2018_06_11_145000_create_classes_students_table', 6),
(9, '2018_06_11_145156_create_classes_teachers_table', 7),
(10, '2018_06_11_145338_create_lessons_table', 8),
(11, '2018_06_11_145605_create_lessons_classes_table', 9),
(12, '2018_06_11_145903_create_presence_students_table', 10),
(13, '2018_06_11_150241_create_notes_table', 11),
(14, '2018_06_11_150459_create_hour_students_table', 12),
(15, '2018_06_11_150920_create_options_table', 13),
(16, '2018_06_11_151222_create_contracts_table', 14),
(17, '2018_06_11_151929_create_invoices_table', 15),
(18, '2018_06_19_082829_create_materials_table', 16),
(19, '2018_06_19_083315_create_events_table', 17);

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `lesson_id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` int(10) UNSIGNED NOT NULL,
  `price_per_hour` int(11) NOT NULL,
  `btw` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('hozaifagawesh99@gmail.com', '$2y$10$fkhZYmXJ9N9hUnzWMAPcrelp1Nopr.MzDoEPZ0VZMjNyrQPXdhG1.', '2018-06-23 03:48:42'),
('hozaifagawesh100@gmail.com', '$2y$10$QtROiogrrRuUw5003gEVcOFdGAf8r.vT0goLGBKpUp2c6JXvqVaUa', '2018-06-23 05:30:03');

-- --------------------------------------------------------

--
-- Table structure for table `presence_students`
--

CREATE TABLE `presence_students` (
  `id` int(10) UNSIGNED NOT NULL,
  `lesson_id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `site_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `favicon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `keywords` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `site_name`, `logo`, `favicon`, `email`, `phone`, `address`, `keywords`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Oranje Ster', 'dfae34cd0beec17ecdb965bd71f209a19ca7a3a9logo.png', '8f4be1bf614f60c5cf9c548e6c154b71ef64f3a4favicon.png', 'oranje@gmail.com', '5555-555-555', 'Hello Test Hello Test Hello Test Hello Test Hello Test Hello Test Hello Test Hello Test', 'Hello Test Hello Test Hello Test Hello Test', 'Hello Test Hello Test Hello Test', '2018-06-10 22:00:00', '2018-06-11 12:13:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` date DEFAULT NULL,
  `bsn_number` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_code` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_number` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extension` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_borrow` date DEFAULT NULL,
  `end_borrow` date DEFAULT NULL,
  `start_residence` date DEFAULT NULL,
  `end_residence` date DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  `status` tinyint(1) DEFAULT '0',
  `level` enum('student','teacher') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `image`, `phone`, `birthday`, `bsn_number`, `post_code`, `home_number`, `extension`, `street_name`, `city`, `province`, `start_borrow`, `end_borrow`, `start_residence`, `end_residence`, `active`, `status`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Hozaifa', 'Ramadan', 'hozaifagawesh100@gmail.com', '$2y$10$dV7b2jcURNOhCJX3urKKheCy06Eh6k4CFK0Gh1RnxmrqLwWl3vat.', '45805c239bde04ca230fe67a9e84ea6e6f766a901Food.jpg', '01149632353', '2018-06-11', '123456', '123456', '5', 'test test', 'Test test', 'Test test', 'test test', '2018-06-01', '2018-06-30', '2018-06-01', '2018-06-30', 0, 0, 'student', 'xEoFL0sAXtEfvDLMIQsJ69wZ4XYdItsjRBxdCECNce440dvdRq5J8wyGlLMO', '2018-06-10 22:00:00', '2018-06-23 04:03:02'),
(4, 'Ahmed', 'Hassan', 'ahmed@gmail.com', '$2y$10$Ayuinl47IJQtRO6wejZVIuf.7r//FAQ8a.7hAj4vpGdhoiBDd6W9W', 'ba20db7e192456760b227ff4c730687eafb115bbavatar04.png', '32174569874', '2018-06-07', '5454554', '4545554', '5', 'test', 'test test test test ', 'test', 'test', NULL, NULL, NULL, NULL, 0, 0, 'teacher', NULL, '2018-06-14 00:15:13', '2018-06-15 00:50:35'),
(5, 'Jak', 'Mak', 'jak@jak.com', '$2y$10$M1qF5bIJO2JzzANTNbTM..JFL8CKbSMqlOoovu4au.SxDPCyc/ybq', 'be9efd9453918e3635578d040894cb30e965a9cdavatar.png', '321456987', '1992-04-10', '123456', '123456', '8', '114', 'Test test', 'Test test', 'test', NULL, NULL, NULL, NULL, 0, 0, 'teacher', NULL, '2018-06-14 13:42:58', '2018-06-15 00:40:10'),
(6, 'Hanan', 'Ahmed', 'hanan@gmail.com', '$2y$10$dHlcHhE6UiXnfGqmUfcba.Cr0YKpuAbKUaax2tkzhIq7rhXokbLh2', 'd4c8faa8bb4e4ec473abf41ed31da69c86d6701aavatar2.png', '123654789', '1986-03-01', '123456', '123654', '8', 'test', 'Test test', 'Test test', 'test', NULL, NULL, NULL, NULL, 1, 0, 'teacher', NULL, '2018-06-15 00:02:03', '2018-06-15 00:39:10'),
(7, 'Sara', 'Mohamed', 'sara@gmail.com', '$2y$10$XBNp5MP6k5fHEXT8EgadsezliTwuPmzZnJfaDFily01uKUTWcXVmW', '2eabe5bede028d54b3fefa50dadba8862f0f808aavatar3.png', '1234556789', '1990-04-01', '123456', '788455', '8', '75485', 'Test test test', 'Test test', 'test test', NULL, NULL, NULL, NULL, 1, 0, 'teacher', NULL, '2018-06-15 00:05:11', '2018-06-15 00:38:14'),
(8, 'Said', 'Ahmed', 'said@gmail.com', '$2y$10$d6GIZqtsrAL0rjRwDNnBJ.1BepDWEtsoWGShRwQ5fShKma0GsGUgi', 'adc06b947c2fc5e119d3115e7d9e739ea59bfc1cuser6-128x128.jpg', '123654789', '1995-01-02', '123456', '11729', '123654', '114', 'Test test test', 'Test test', 'test test', '2018-01-01', '2018-12-01', '2018-02-01', '2018-12-01', 1, 0, 'student', 'kNPcKP2GZp2O7fhvdrVfep6EuoftZhh7RFMTiy9AfCJeQQ3vMtKhhPVVTPmd', '2018-06-15 01:07:47', '2018-06-15 02:04:50'),
(14, 'Hozaifa', 'Gawesh', 'hozaifagawesh99@gmail.com', '$2y$10$AJEsXiYKRIbFgXcLV21lI.4Ro7ymsQ.u6.wvTFtIdHvvNQWwgwAtC', 'b227230ee8aff48c2fdadcdfb22efe63c0ea80572 Cars.jpg', '1149632353', '2018-06-07', '123456', '11729', '8', '114', 'Egypt-Cairo-Helwan', 'Cairo', 'Cairo', NULL, NULL, NULL, NULL, 1, 0, 'teacher', NULL, '2018-06-17 07:08:13', '2018-06-17 07:08:13'),
(15, 'Ezz', 'Ali', 'ezz@gmail.com', '$2y$10$nwsJMipgY4JwMio6yNpXxeqxS1p/l/xtOWdsd2yU64WxZwhi7MKCq', '819bd502178b8c917c83c18a06c3ce3c8af46db41Space.jpg', '123654', '2018-06-02', '11729', '11729', '8', '114', 'Egypt-Cairo-Helwan', 'Cairo', 'Cairo', '2018-06-01', '2018-06-03', '2018-06-02', '2018-06-04', 1, 0, 'student', NULL, '2018-06-18 15:23:56', '2018-06-18 15:23:56'),
(16, 'Hisham', 'Mohamed', 'hisham@gmail.com', '$2y$10$FzuEcJcIaOPHAAt2VI3OqOs4iWuMB9rIb7xc0tZyv6Q1vSddYM3g2', '50740c5d2d08eaadc7234cc3a11befb2ce4944592Food.jpg', '8569785475854', '2018-06-02', '11729', '11729', '8', '114', 'Egypt-Cairo-Helwan', 'Cairo', 'Cairo', '2018-06-01', '2018-06-02', '2018-06-01', '2018-06-02', 1, 0, 'student', NULL, '2018-06-23 23:11:05', '2018-06-23 23:11:05'),
(17, 'Yousef', 'ALi', 'yousef@gmail.com', '$2y$10$b1dT2CdNuWt1dRYe7.wv8.klA57YEz1syjYjovhOxn82OPb1o8V4m', '743043b1abccf97c047416af7d6d9cf46ba3bdee3Woman.jpg', '5269854545', '2018-06-30', '123456', '11729', '123654', '114', 'Egypt-Cairo-Helwan', 'Cairo', 'Cairo', NULL, NULL, NULL, NULL, 1, 0, 'teacher', NULL, '2018-06-23 23:15:23', '2018-06-23 23:15:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classes_teachers`
--
ALTER TABLE `classes_teachers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `classes_teachers_class_id_foreign` (`class_id`),
  ADD KEY `classes_teachers_teacher_id_foreign` (`user_id`);

--
-- Indexes for table `contracts`
--
ALTER TABLE `contracts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contracts_student_id_foreign` (`student_id`),
  ADD KEY `contracts_created_by_foreign` (`created_by`),
  ADD KEY `contracts_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hour_students`
--
ALTER TABLE `hour_students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hour_students_course_id_foreign` (`course_id`),
  ADD KEY `hour_students_class_id_foreign` (`class_id`),
  ADD KEY `hour_students_student_id_foreign` (`student_id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoices_contract_id_foreign` (`contract_id`),
  ADD KEY `invoices_created_by_foreign` (`created_by`);

--
-- Indexes for table `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lessons_teacher_id_foreign` (`teacher_id`);

--
-- Indexes for table `lessons_classes`
--
ALTER TABLE `lessons_classes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lessons_classes_class_id_foreign` (`class_id`),
  ADD KEY `lessons_classes_lesson_id_foreign` (`lesson_id`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notes_lesson_id_foreign` (`lesson_id`),
  ADD KEY `notes_student_id_foreign` (`student_id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `presence_students`
--
ALTER TABLE `presence_students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `presence_students_lesson_id_foreign` (`lesson_id`),
  ADD KEY `presence_students_student_id_foreign` (`student_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `classes_teachers`
--
ALTER TABLE `classes_teachers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `contracts`
--
ALTER TABLE `contracts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hour_students`
--
ALTER TABLE `hour_students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lessons_classes`
--
ALTER TABLE `lessons_classes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `presence_students`
--
ALTER TABLE `presence_students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `classes_teachers`
--
ALTER TABLE `classes_teachers`
  ADD CONSTRAINT `classes_teachers_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `classes_teachers_teacher_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `contracts`
--
ALTER TABLE `contracts`
  ADD CONSTRAINT `contracts_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contracts_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contracts_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hour_students`
--
ALTER TABLE `hour_students`
  ADD CONSTRAINT `hour_students_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hour_students_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hour_students_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_contract_id_foreign` FOREIGN KEY (`contract_id`) REFERENCES `contracts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `invoices_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lessons`
--
ALTER TABLE `lessons`
  ADD CONSTRAINT `lessons_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lessons_classes`
--
ALTER TABLE `lessons_classes`
  ADD CONSTRAINT `lessons_classes_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lessons_classes_lesson_id_foreign` FOREIGN KEY (`lesson_id`) REFERENCES `lessons` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `notes_lesson_id_foreign` FOREIGN KEY (`lesson_id`) REFERENCES `lessons` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `notes_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `presence_students`
--
ALTER TABLE `presence_students`
  ADD CONSTRAINT `presence_students_lesson_id_foreign` FOREIGN KEY (`lesson_id`) REFERENCES `lessons` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `presence_students_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
