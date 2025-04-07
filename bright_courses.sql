-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2025 at 12:47 PM
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
-- Database: `bright_courses`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `rating` decimal(2,1) DEFAULT NULL CHECK (`rating` between 0 and 5),
  `price` decimal(10,2) NOT NULL CHECK (`price` >= 0),
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `subject_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `title`, `description`, `rating`, `price`, `image`, `created_at`, `subject_id`) VALUES
(1, 'Python Programming for Beginners', 'An introductory course to Python programming for absolute beginners.', 4.8, 19.99, 'https://img-c.udemycdn.com/course/480x270/1565838_e54e_18.jpg', '2025-02-19 12:01:19', 1),
(2, 'Web Design with HTML & CSS', 'Learn how to build beautiful websites using HTML and CSS.', 4.5, 15.99, 'https://img-c.udemycdn.com/course/240x135/437398_46c3_10.jpg', '2025-02-19 12:01:19', 3),
(3, 'Java Programming from Scratch', 'Comprehensive guide to Java programming from basics to advanced concepts.', 4.7, 24.99, 'https://img-c.udemycdn.com/course/240x135/6211415_d24a_2.jpg', '2025-02-19 12:01:19', 3),
(4, 'SQL for Beginners', 'Master SQL and database management efficiently.', 4.6, 12.99, 'https://img-c.udemycdn.com/course/240x135/1405632_6e6f_2.jpg', '2025-02-19 12:01:19', 2),
(5, 'ReactJS Web Development', 'Build modern web applications using ReactJS.', 4.9, 29.99, 'https://img-c.udemycdn.com/course/240x135/5939718_4725_4.jpg', '2025-02-19 12:01:19', 3),
(6, 'Intro to AI', 'Explore AI basics, real-world applications, key algorithms, and practical use cases in various industries.', 4.8, 99.99, 'https://img-c.udemycdn.com/course/240x135/6112535_7103.jpg', '2025-02-21 13:02:18', 1),
(7, 'Deep Learning Fundamentals', 'Master neural networks, deep learning frameworks, optimization techniques, and practical model deployment strategies.', 4.7, 149.99, 'https://img-c.udemycdn.com/course/240x135/1151632_de9b.jpg', '2025-02-21 13:02:18', 1),
(8, 'Data Science Bootcamp', 'Comprehensive training covering Python, statistics, machine learning, big data processing, and visualization techniques.', 4.9, 199.99, 'https://img-c.udemycdn.com/course/240x135/1754098_e0df_3.jpg', '2025-02-21 13:02:18', 2),
(9, 'Business Analytics 101', 'Learn data-driven decision-making, predictive modeling, business intelligence tools, and case studies for real applications.', 4.6, 89.99, 'https://img-c.udemycdn.com/course/240x135/3482742_897a_13.jpg', '2025-02-21 13:02:18', 2),
(10, 'Full-Stack Development', 'Become proficient in front-end, back-end, and database management, using modern frameworks and deployment strategies.', 4.8, 129.99, 'https://img-c.udemycdn.com/course/240x135/6035102_7d1a.jpg', '2025-02-21 13:02:18', 3),
(11, 'Cloud Computing Essentials', 'Understand cloud services, architectures, security protocols, deployment models, and cost management techniques.', 4.7, 109.99, 'https://img-c.udemycdn.com/course/240x135/3142166_a637_3.jpg', '2025-02-21 13:02:18', 4),
(12, 'AWS Certified Solutions Architect', 'Get AWS certification with hands-on cloud architecture practice, infrastructure design, and security best practices.', 4.9, 179.99, 'https://img-c.udemycdn.com/course/240x135/2196488_8fc7_10.jpg', '2025-02-21 13:02:18', 4),
(13, 'DevOps Practices', 'Implement DevOps principles, CI/CD pipelines, containerization, automation tools, and monitoring strategies for software delivery.', 4.6, 119.99, 'https://img-c.udemycdn.com/course/240x135/4039556_ebb3_9.jpg', '2025-02-21 13:02:18', 5),
(14, 'Cyber Security Basics', 'Learn key cybersecurity principles, ethical hacking basics, threat detection, cryptography, and risk management techniques.', 4.7, 99.99, 'https://img-c.udemycdn.com/course/240x135/3654420_6ef3_8.jpg', '2025-02-21 13:02:18', 6),
(15, 'Ethical Hacking', 'Develop penetration testing skills, vulnerability assessment techniques, ethical hacking methodologies, and security countermeasures.', 4.8, 149.99, 'https://img-c.udemycdn.com/course/240x135/857010_8239_5.jpg', '2025-02-21 13:02:18', 6),
(16, 'Python for Data Science', 'Learn Python for data analysis, visualization, and machine learning.', 4.7, 109.99, 'https://img-c.udemycdn.com/course/480x270/903744_8eb2.jpg', '2025-02-22 13:00:05', 2),
(17, 'Machine Learning Advanced', 'Dive deep into supervised, unsupervised learning, and deep learning.', 4.9, 199.99, 'https://img-c.udemycdn.com/course/240x135/5993822_2c2a_7.jpg', '2025-02-22 13:00:05', 1),
(18, 'React & Frontend Development', 'Build dynamic web applications with React and modern frontend tools.', 4.8, 149.99, 'https://img-c.udemycdn.com/course/240x135/1362070_b9a1_2.jpg', '2025-02-22 13:00:05', 3),
(19, 'Google Cloud Certification', 'Prepare for Google Cloud exams with practical hands-on labs.', 4.7, 169.99, 'https://img-c.udemycdn.com/course/240x135/2459706_d13a_6.jpg', '2025-02-22 13:00:05', 4),
(20, 'Kubernetes for DevOps', 'Master container orchestration and Kubernetes for scalable deployments.', 4.8, 139.99, 'https://img-c.udemycdn.com/course/240x135/2813427_cc60_2.jpg', '2025-02-22 13:00:05', 5),
(21, 'Network Security Essentials', 'Learn fundamental network security concepts and cyber defense strategies.', 4.7, 119.99, 'https://img-c.udemycdn.com/course/240x135/875974_b66d_3.jpg', '2025-02-22 13:00:05', 6),
(22, 'Blockchain and Cryptocurrency', 'Understand blockchain technology and its applications in finance.', 4.6, 129.99, 'https://img-c.udemycdn.com/course/240x135/1466612_bead_3.jpg', '2025-02-22 13:00:05', 2);

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `address_iframe` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`id`, `address_iframe`) VALUES
(1, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.5752336113733!2d106.65769677539957!3d10.767183089381053!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f224d181179%3A0x43928509c3f4647f!2sXi%20Grand%20Court%20-%20Block%20A2!5e0!3m2!1sen!2sus!4v1743678323392!5m2!1sen!2sus');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `name`) VALUES
(1, 'AI & Machine Learning'),
(4, 'Cloud Computing'),
(6, 'Cyber Security'),
(2, 'Data Science & Business Analytics'),
(5, 'DevOps'),
(3, 'Software Development');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` text NOT NULL,
  `role` varchar(50) NOT NULL DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `username`, `password`, `role`, `created_at`, `image`) VALUES
(9, 'ngbaduyy05@gmail.com', 'Duy Nguyen', '$2y$10$UTivfOI3ErStDyRDkIWbXORGjQn1RbW./89LTiDc6yhnLDKR94WwC', 'admin', '2025-03-20 10:23:52', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
