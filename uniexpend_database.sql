-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2025 at 09:17 PM
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
-- Database: `uniexpend`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `university_id` int(11) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `program_level` varchar(50) DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `experience` text DEFAULT NULL,
  `tips` text DEFAULT NULL,
  `status` enum('pending','approved') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `user_id`, `university_id`, `country_id`, `program_level`, `year`, `title`, `experience`, `tips`, `status`, `created_at`) VALUES
(1, 1, 1, 1, 'Undergraduate', '2024', 'My life in Toronto as a Bangladeshi student', 'First winter was tough, but university life is amazing.', 'Get a good winter jacket before arriving.', 'approved', '2025-05-06 21:10:19'),
(2, 2, 2, 2, 'Masters', '2023', 'Why I chose Monash for Data Science', 'They accepted my profile with mid CGPA and strong SOP.', 'Apply early to increase your chances.', 'approved', '2025-05-06 21:10:19'),
(3, 3, 3, 3, 'Undergraduate', '2022', 'Studying free in Germany!', 'Blocked account and German A2 was tricky but worth it.', 'Learn German early!', 'approved', '2025-05-06 21:10:19'),
(4, 4, 4, 4, 'PhD', '2024', 'PhD at Oxford - A Dream Come True', 'Funding was competitive, but supervisor was key.', 'Write to professors early.', 'approved', '2025-05-06 21:10:19'),
(5, 5, 5, 5, 'Masters', '2023', 'Harvard MBA Journey', 'Super expensive but game changing experience.', 'Start GMAT prep early and build resume.', 'approved', '2025-05-06 21:10:19'),
(6, 6, 6, 6, 'Undergraduate', '2024', 'Affordable BBA in Malaysia', 'Life is easy and multicultural.', 'Carry essential Bangladeshi groceries.', 'approved', '2025-05-06 21:10:19'),
(7, 7, 7, 7, 'Masters', '2022', 'Living in Tokyo as a Student', 'Crowded but fascinating tech world.', 'Join campus clubs to make friends.', 'approved', '2025-05-06 21:10:19'),
(8, 8, 8, 8, 'Undergraduate', '2023', 'Biotech studies in Sweden', 'Very research focused with small class sizes.', 'Get part-time job at labs.', 'approved', '2025-05-06 21:10:19'),
(9, 9, 9, 9, 'Undergraduate', '2024', 'Architecture in Netherlands', 'Focus on creativity and project work.', 'Use public transport.', 'approved', '2025-05-06 21:10:19'),
(10, 10, 10, 10, 'Masters', '2023', 'Education Degree in Finland', 'Great teaching and peaceful life.', 'Budget your monthly expenses well.', 'approved', '2025-05-06 21:10:19'),
(11, 11, 11, 11, 'Masters', '2024', 'How I Got CSC in China', 'Online process and email follow up is key.', 'Be patient and follow exact requirements.', 'approved', '2025-05-06 21:10:19'),
(12, 12, 12, 12, 'Undergraduate', '2022', 'Physics in Turkey - My Experience', 'Affordable and warm people.', 'Learn basic Turkish phrases.', 'approved', '2025-05-06 21:10:19'),
(13, 13, 13, 13, 'Masters', '2023', 'AI Research in South Korea', 'Super innovative environment.', 'Study Korean part-time.', 'approved', '2025-05-06 21:10:19'),
(14, 14, 14, 14, 'Masters', '2024', 'MTech in India', 'Tough curriculum but great for tech lovers.', 'Be ready for academic pressure.', 'approved', '2025-05-06 21:10:19'),
(15, 15, 1, 1, 'Undergraduate', '2023', 'Second year at Toronto', 'Internship opportunities are amazing.', 'Start networking from first year.', 'approved', '2025-05-06 21:10:19'),
(16, 19, 14, 14, '0', '2027', 'Test 16', 'it\'s is really easy to get into the country 😶', 'no job here 😶', 'pending', '2025-05-07 10:06:10');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `cost_of_living_info` text DEFAULT NULL,
  `visa_requirements` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `cost_of_living_info`, `visa_requirements`) VALUES
(1, 'Canada', 'Approx CAD 1,000/month in most provinces', 'Need to apply for study permit (SDS preferred for BD)'),
(2, 'Australia', 'Around AUD 1,500/month including accommodation', 'Student visa (subclass 500), GTE required'),
(3, 'Germany', 'EUR 850/month; many public unis are tuition-free', 'Student visa with blocked account of EUR 11,208/year'),
(4, 'UK', 'GBP 1,200/month in London, GBP 1,000/month outside', 'Tier 4 student visa required, IHS fees apply'),
(5, 'USA', 'USD 1,200/month in average cities', 'F1 Visa required with I-20 from university'),
(6, 'Malaysia', 'MYR 1,000–1,500/month', 'EMGS processing, affordable and fast'),
(7, 'Japan', 'JPY 100,000/month; part-time jobs help manage costs', 'COE required and embassy interview'),
(8, 'Sweden', 'SEK 8,500/month for visa approval', 'Tuition payment required for visa'),
(9, 'Netherlands', 'EUR 1,000/month average, tuition moderate', 'MVV and residence permit needed'),
(10, 'Finland', 'EUR 700–900/month, many scholarships available', 'Student visa via Migri'),
(11, 'China', 'CNY 2,500–4,000/month; many CSC scholarships', 'JW202 and embassy visa interview'),
(12, 'Turkey', 'TRY 4,000–6,000/month; many affordable unis', 'Easy visa process for Bangladeshi students'),
(13, 'South Korea', 'KRW 1,000,000/month; great scholarship options', 'D-2 Visa required'),
(14, 'India', 'INR 15,000–25,000/month; NIRF ranked universities', 'E-Visa available for education');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `title` varchar(150) DEFAULT NULL,
  `program_id` int(11) DEFAULT NULL,
  `field` varchar(100) DEFAULT NULL,
  `tuition_fee` decimal(10,2) DEFAULT NULL,
  `university_id` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `application_deadline` date DEFAULT NULL,
  `admission_requirements` text DEFAULT NULL,
  `level` varchar(100) DEFAULT NULL,
  `duration` varchar(100) DEFAULT NULL,
  `cost` varchar(100) DEFAULT NULL,
  `admission` text DEFAULT NULL,
  `visa` text DEFAULT NULL,
  `scholarship` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `title`, `program_id`, `field`, `tuition_fee`, `university_id`, `description`, `application_deadline`, `admission_requirements`, `level`, `duration`, `cost`, `admission`, `visa`, `scholarship`) VALUES
(1, 'BSc in Computer Science', 1, 'Computer Science', 25000.00, 1, 'Strong CS fundamentals in Canada.', '2025-03-15', 'IELTS 6.5, HSC GPA 5.0', 'Bachelor', '4 years', 'High', 'Competitive', 'SDS Visa required', 'Entrance scholarships available'),
(2, 'Masters in Data Science', 2, 'Data Science', 28000.00, 2, 'Top-ranked data analytics in Australia.', '2025-04-10', 'IELTS 7.0, CGPA 3.0+', 'Masters', '2 years', 'Moderate', 'Direct entry', 'Subclass 500', 'Up to 50% tuition waiver'),
(3, 'BEng Mechanical', 1, 'Engineering', 0.00, 3, 'No tuition fee, German excellence.', '2025-06-01', 'German A2, IELTS 6.0', 'Bachelor', '3.5 years', 'Low', 'No tuition, but block account needed', 'German D visa', 'DAAD funding'),
(4, 'PhD in Physics', 3, 'Physics', 0.00, 4, 'Fully funded Oxford research', '2025-01-31', 'Strong research proposal', 'PhD', '3-4 years', 'High', 'Selective', 'Tier 4 Visa', 'Full funding possible'),
(5, 'MBA', 2, 'Business', 55000.00, 5, 'Ivy league business program', '2025-03-01', 'GMAT, IELTS 7.0', 'Masters', '2 years', 'Very High', 'Difficult', 'F1 Visa', 'Limited options'),
(6, 'BBA', 1, 'Business', 3000.00, 6, 'Affordable in Malaysia', '2025-07-20', 'IELTS 6.0', 'Bachelor', '4 years', 'Low', 'Easy admission', 'EMGS process', 'Merit-based'),
(7, 'Masters in Robotics', 2, 'Engineering', 32000.00, 7, 'Advanced robotics in Japan', '2025-02-20', 'JLPT N3, IELTS 6.5', 'Masters', '2 years', 'Medium', 'Moderate', 'COE process', 'Scholarships available'),
(8, 'BSc Biotechnology', 1, 'Biotechnology', 10000.00, 8, 'Swedish innovation in biofield', '2025-05-30', 'IELTS 6.5', 'Bachelor', '3 years', 'Medium', 'Good support', 'Student Visa', 'Partial aid'),
(9, 'BSc Architecture', 1, 'Architecture', 11000.00, 9, 'World-class design education', '2025-06-15', 'IELTS 6.5', 'Bachelor', '3 years', 'Medium', 'Competitive', 'MVV visa', 'Some grants'),
(10, 'MSc Education', 2, 'Education', 8500.00, 10, 'Progressive Finnish teaching', '2025-03-05', 'IELTS 6.5, Statement of purpose', 'Masters', '2 years', 'Low', 'Good support', 'Student Visa', 'Need-based grants'),
(11, 'Masters in Engineering', 2, 'Civil Engineering', 0.00, 11, 'Fully funded Chinese university', '2025-02-01', 'CSC form, IELTS 6.0', 'Masters', '2.5 years', 'Very Low', 'Easy with CSC', 'JW202 needed', 'Full CSC'),
(12, 'BSc in Physics', 1, 'Physics', 2000.00, 12, 'Affordable for BD students', '2025-03-25', 'IELTS 5.5', 'Bachelor', '4 years', 'Very Low', 'Simple', 'Easy visa', 'Some government support'),
(13, 'MS in AI', 2, 'Artificial Intelligence', 22000.00, 13, 'Cutting-edge Korean tech', '2025-04-15', 'IELTS 6.5, SOP', 'Masters', '2 years', 'Moderate', 'Reasonable', 'D-2 Visa', 'Full & partial available'),
(14, 'MTech Computer Engg.', 2, 'Computer Engineering', 3500.00, 14, 'Highly competitive Indian MTech', '2025-05-01', 'GATE or IELTS', 'Masters', '2 years', 'Low', 'Challenging', 'E-Visa', 'Limited aid'),
(15, 'BSC in CSE', NULL, 'Engineering ', NULL, 3, 'strict with rules', NULL, NULL, 'Bachelor\'s', '4 ', '$ 1000 / year', 'HSC and SSC result', 'easy', 'Based on application you can get weaver '),
(16, 'ssdfsddfsdf', NULL, 'dfds', NULL, 9, 'dfsdfe', NULL, NULL, 'Bachelor\'s', '4', '1000', 'dfdsfsdfsd', 'dfdsdfdfs', 'fsdfsd'),
(17, 'cse', 1, 'fsd', NULL, 1, '', NULL, NULL, '', '', '', '', 'sjdflsd', '');

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`id`, `name`) VALUES
(1, 'Undergraduate'),
(2, 'Masters'),
(3, 'PhD');

-- --------------------------------------------------------

--
-- Table structure for table `scholarships`
--

CREATE TABLE `scholarships` (
  `id` int(11) NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `name` varchar(150) DEFAULT NULL,
  `eligibility` text DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `universities`
--

CREATE TABLE `universities` (
  `id` int(11) NOT NULL,
  `name` varchar(150) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL,
  `acceptance_rate` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `universities`
--

INSERT INTO `universities` (`id`, `name`, `country_id`, `rank`, `acceptance_rate`) VALUES
(1, 'University of Toronto', 1, 21, 43.00),
(2, 'Monash University', 2, 57, 55.00),
(3, 'Technical University of Munich', 3, 50, 60.00),
(4, 'University of Oxford', 4, 1, 17.00),
(5, 'Harvard University', 5, 2, 5.00),
(6, 'University of Malaya', 6, 65, 70.00),
(7, 'University of Tokyo', 7, 23, 34.00),
(8, 'Lund University', 8, 95, 41.00),
(9, 'Delft University of Technology', 9, 55, 45.00),
(10, 'University of Helsinki', 10, 115, 52.00),
(11, 'Tsinghua University', 11, 14, 16.00),
(12, 'Middle East Technical University', 12, 701, 75.00),
(13, 'Seoul National University', 13, 29, 20.00),
(14, 'IIT Delhi', 14, 174, 8.00);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password_hash` varchar(255) DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password_hash`, `is_admin`) VALUES
(1, 'Rakib Hasan', 'rakib.bd@gmail.com', 'pass1234', 0),
(2, 'Nusrat Jahan', 'nusrat.study@gmail.com', 'pass1234', 0),
(3, 'Tanvir Rahman', 'tanvir_rahman@yahoo.com', 'pass1234', 0),
(4, 'Farhana Akter', 'farhana_akter@gmail.com', 'pass1234', 0),
(5, 'Hasibul Islam', 'hasibul.islam@gmail.com', 'pass1234', 0),
(6, 'Jannatul Ferdous', 'janna.ferdous@hotmail.com', 'pass1234', 0),
(7, 'Samiul Islam', 'samiulbd@gmail.com', 'pass1234', 0),
(8, 'Nayeem Arafat', 'nayeem_edu@gmail.com', 'pass1234', 0),
(9, 'Shamima Nasrin', 'shamima.bd@hotmail.com', 'pass1234', 0),
(10, 'Kazi Fahim', 'fahim.kazi@gmail.com', 'pass1234', 0),
(11, 'Mehjabin Chowdhury', 'mehjabin.c@hotmail.com', 'pass1234', 0),
(12, 'Riyad Hossain', 'riyad.bangla@gmail.com', 'pass1234', 0),
(13, 'Tanzila Haque', 'tanzila.hq@gmail.com', 'pass1234', 0),
(14, 'Ahsan Kabir', 'ahsan.kabir@yahoo.com', 'pass1234', 0),
(15, 'Mim Sultana', 'mim.studybd@gmail.com', 'pass1234', 0),
(16, 'Diba Dev', 'admin@gmail.com', 'admin', 1),
(18, 'admin', 'admin@uniexpend.com', '$2y$10$Gak2jjjOL23MSVdvRfMCbe/S4Esu8r.tvSQBtaa1NJLxN4zQXKp2m', 1),
(19, 'avi dey', 'avi@uniexpend.com', '$2y$10$B6n1PsexZt3OPnypQM12OOPJ4qCjBTvePRJsz7Ft1ZAhtCkjOlMKq', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `university_id` (`university_id`),
  ADD KEY `country_id` (`country_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `program_id` (`program_id`),
  ADD KEY `university_id` (`university_id`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scholarships`
--
ALTER TABLE `scholarships`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `universities`
--
ALTER TABLE `universities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country_id` (`country_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `scholarships`
--
ALTER TABLE `scholarships`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `universities`
--
ALTER TABLE `universities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `blogs_ibfk_2` FOREIGN KEY (`university_id`) REFERENCES `universities` (`id`),
  ADD CONSTRAINT `blogs_ibfk_3` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`);

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`program_id`) REFERENCES `programs` (`id`),
  ADD CONSTRAINT `courses_ibfk_2` FOREIGN KEY (`university_id`) REFERENCES `universities` (`id`);

--
-- Constraints for table `scholarships`
--
ALTER TABLE `scholarships`
  ADD CONSTRAINT `scholarships_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`);

--
-- Constraints for table `universities`
--
ALTER TABLE `universities`
  ADD CONSTRAINT `universities_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
