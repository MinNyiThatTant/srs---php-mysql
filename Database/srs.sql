SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- Create Departments Table
CREATE TABLE `departments` (
  `department_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text,
  PRIMARY KEY (`department_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Create Academic Year Table
CREATE TABLE `academic_year` (
  `academic_year_id` int(10) NOT NULL AUTO_INCREMENT,
  `year` varchar(10) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  PRIMARY KEY (`academic_year_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Create Semesters Table
CREATE TABLE `semesters` (
  `semester_id` int(10) NOT NULL AUTO_INCREMENT,
  `year` varchar(10) NOT NULL,
  `semester_name` varchar(50) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  PRIMARY KEY (`semester_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Create Teacher Table
CREATE TABLE `teacher` (
  `teacher_id` int(10) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `department_id` int(10) NOT NULL,
  PRIMARY KEY (`teacher_id`),
  CONSTRAINT `fk_teacher_department` FOREIGN KEY (`department_id`) REFERENCES `departments` (`department_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Create Course Table
CREATE TABLE `course` (
  `course_id` int(10) NOT NULL AUTO_INCREMENT,
  `course_code` varchar(20) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text,
  `credits` int(10) NOT NULL,
  `department_id` int(10) NOT NULL,
  `teacher_id` int(10) NOT NULL,
  `semester_id` int(10) NOT NULL,
  PRIMARY KEY (`course_id`),
  CONSTRAINT `fk_course_department` FOREIGN KEY (`department_id`) REFERENCES `departments` (`department_id`),
  CONSTRAINT `fk_course_teacher` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`teacher_id`),
  CONSTRAINT `fk_course_semester` FOREIGN KEY (`semester_id`) REFERENCES `semesters` (`semester_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Create Students Table
CREATE TABLE `students` (
  `student_id` int(10) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `address` text,
  `registration_date` datetime NOT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Create Finance Table
CREATE TABLE `finance` (
  `finance_id` int(10) NOT NULL AUTO_INCREMENT,
  `student_id` int(10) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `payment_date` datetime NOT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`finance_id`),
  CONSTRAINT `fk_finance_student` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Create Class Schedules Table
CREATE TABLE `class_schedules` (
  `schedule_id` int(10) NOT NULL AUTO_INCREMENT,
  `course_id` int(10) NOT NULL,
  `day_of_week` varchar(10) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `class_room` varchar(50) NOT NULL,
  PRIMARY KEY (`schedule_id`),
  CONSTRAINT `fk_class_schedule_course` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Create Registrations Table
CREATE TABLE `registrations` (
  `registration_id` int(10) NOT NULL AUTO_INCREMENT,
  `student_id` int(10) NOT NULL,
  `course_id` int(10) NOT NULL,
  `semester_id` int(10) NOT NULL,
  `academic_year_id` int(10) NOT NULL,
  `registration_date` datetime NOT NULL,
  `status` varchar(100) NOT NULL,
  `grade` varchar(10) NOT NULL,
  PRIMARY KEY (`registration_id`),
  CONSTRAINT `fk_registration_student` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`),
  CONSTRAINT `fk_registration_course` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`),
  CONSTRAINT `fk_registration_semester` FOREIGN KEY (`semester_id`) REFERENCES `semesters` (`semester_id`),
  CONSTRAINT `fk_registration_academic_year` FOREIGN KEY (`academic_year_id`) REFERENCES `academic_year` (`academic_year_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Create Admin Table
CREATE TABLE `admin` (
  `admin_id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `role` ENUM('global_admin', 'hod_admin', 'haa_admin', 'hsa_admin', 'teacher_admin', 'fa_admin') NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `admins` (`admin_id`, `username`, `password`, `email`, `full_name`, `role`, `created_at`) VALUES
(5, 'global', '$2y$10$3hZPDbPXGv/zOZ6K5cjYduHObX3.iEIEZVLc1J2MsmvbkPsONzv3i', 'global@example.com', 'global', 'global_admin', '2025-05-22 00:30:03'),


COMMIT;