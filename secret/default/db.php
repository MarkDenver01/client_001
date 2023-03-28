<?php

// =================== user account table ========================== //
$db_sql_1[] = "DROP TABLE IF EXISTS `user_account`";

$db_sql_1[] = "CREATE TABLE `user_account` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_level` int(11) NOT NUll,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `is_otp_verified` int(11) NOT NULL,
  `is_logged_in` int(11) NOT NULL,
  `last_login` varchar(255) NOT NULL,
  `last_seen` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

$db_sql_1[] = "ALTER TABLE `user_account`
ADD PRIMARY KEY (`id`)";

$db_sql_1[] = "ALTER TABLE `user_account`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT";

$db_sql_1[] = "ALTER TABLE `user_account`
ADD INDEX email_address (`email_address`)";


// =================== user groups table ========================== //
$db_sql_2[] = "DROP TABLE IF EXISTS `user_groups`";

$db_sql_2[] = "CREATE TABLE `user_groups` (
  `id` int(11) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `user_types` varchar(150) NOT NULL,
  `user_level` int(11),
  `user_status` int(11)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

$db_sql_2[] = "ALTER TABLE `user_groups`
ADD PRIMARY KEY (`id`)";

$db_sql_2[] = "ALTER TABLE `user_groups`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT";

$db_sql_2[] = "ALTER TABLE `user_groups`
ADD INDEX email_address (`email_address`)";

// =================== student info table ========================== //
$db_sql_3[] = "DROP TABLE IF EXISTS `student_info`";

$db_sql_3[] = "CREATE TABLE `student_info` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `student_year` varchar(255) NOT NULL,
  `gender` varchar(120) NOT NULL,
  `age` int(32),
  `birth_date` varchar(255),
  `present_address` varchar(255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

$db_sql_3[] = "ALTER TABLE `student_info`
ADD PRIMARY KEY (`id`)";

$db_sql_3[] = "ALTER TABLE `student_info`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT";

$db_sql_3[] = "ALTER TABLE `student_info`
ADD INDEX email_address (`email_address`)";

// =================== guidance info table ========================== //
$db_sql_4[] = "DROP TABLE IF EXISTS `guidance_info`";

$db_sql_4[] = "CREATE TABLE `guidance_info` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `birth_date` varchar(255) NOT NULL,
  `present_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

$db_sql_4[] = "ALTER TABLE `guidance_info`
ADD PRIMARY KEY (`id`)";

$db_sql_4[] = "ALTER TABLE `guidance_info`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT";

$db_sql_4[] = "ALTER TABLE `guidance_info`
ADD INDEX email_address (`email_address`)";

// =================== OTP info table ========================== //
$db_sql_5[] = "DROP TABLE IF EXISTS `authentication`";

$db_sql_5[] = "CREATE TABLE `authentication` (
  `id` int(11) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `one_time_password` varchar(255) NOT NULL,
  `expired` int(11),
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

$db_sql_5[] = "ALTER TABLE `authentication`
ADD PRIMARY KEY(`id`)";

$db_sql_5[] = "ALTER TABLE `authentication`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT";

$db_sql_5[] = "ALTER TABLE `authentication`
ADD INDEX email_address (`email_address`)";

// =================== login logs ========================== //
$db_sql_6[] = "DROP TABLE IF EXISTS `login_logs`";

$db_sql_6[] = "CREATE TABLE `login_logs` (
  `id` int(11) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `login_attempts` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

$sql_db_6[] = "ALTER TABLE `login_logs`
ADD PRIMARY KEY(`id`)";

$sql_db_6[] = "ALTER TABLE `login_logs`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT";

$sql_db_6[] = "ALTER TABLE `login_logs`
ADD INDEX email_address (`email_address`)";

// =================== conversation logs ========================== //
$db_sql_7[] = "DROP TABLE IF EXISTS `conversation_logs`";

$db_sql_7[] = "CREATE TABLE `conversation_logs` (
  `conversation_id` int(11) NOT NULL,
  `user_1` int(11) NOT NULL,
  `user_2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

$db_sql_7[] = "ALTER TABLE `conversation_logs`
ADD PRIMARY KEY(`conversation_id`)";

$db_sql_7[] = "ALTER TABLE `conversation_logs`
MODIFY `conversation_id` int(11) NOT NULL AUTO_INCREMENT";

// =================== chat logs ========================== //
$db_sql_8[] = "DROP TABLE IF EXISTS `chat_logs`";

$db_sql_8[] = "CREATE TABLE `chat_logs` (
  `chat_id` int(11) NOT NULL,
  `from_id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `opened` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

$db_sql_8[] = "ALTER TABLE `chat_logs`
ADD PRIMARY KEY(`chat_id`)";

$db_sql_8[] = "ALTER TABLE `chat_logs`
MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT";

// =================== announcement ========================== //
$db_sql_9[] = "DROP TABLE IF EXISTS `announcement_logs`";

$db_sql_9[] = "CREATE TABLE `announcement_logs` (
  `id` int(11) NOT NULL,
  `title` VARCHAR(255) NOT NULL,
  `body_message` VARCHAR(255) NOT NULL,
  `attached_file_path` VARCHAR(255) NOT NULL,
  `date_posted` datetime NOT NULL,
  `from` VARCHAR(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET = utf8mb4";

$db_sql_9[] = "ALTER TABLE `announcement_logs`
ADD PRIMARY KEY(`id`)";

$db_sql_9[] = "ALTER TABLE `announcement_logs`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT";

// =================== exam created ========================== //
$db_sql_10[] = "DROP TABLE IF EXISTS `exam_created`";

$db_sql_10[] = "CREATE TABLE `exam_created` (
  `id` int(11) NOT NULL,
  `student_year` VARCHAR(255) NOT NULL,
  `exam_title` VARCHAR(255) NOT NULL,
  `exam_description` VARCHAR(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `exam_image_path` VARCHAR(255) NOT NULL,
  `total_items` int(55) NOT NULL,
  `correct_answer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

$db_sql_10[] = "ALTER TABLE `exam_created`
ADD PRIMARY KEY(`id`)";

$db_sql_10[] = "ALTER TABLE `exam_created`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT";

// =================== exam schedule ========================== //
$db_sql_11[] = "DROP TABLE IF EXISTS `exam_schedule`";

$db_sql_11[] = "CREATE TABLE `exam_schedule` (
  `id` int(11) NOT NULL,
  `student_year` VARCHAR(255) NOT NULL,
  `exam_title` VARCHAR(255) NOT NULL,
  `exam_description` VARCHAR(255) NOT NULL,
  `created_on` datetime NOT NULL,
  `expired_on` datetime NOT NULL,
  `exam_duration` datetime NOT NULL,
  `result_date_and_time` datetime NOT NULL,
  `status` VARCHAR(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

$db_sql_11[] = "ALTER TABLE `exam_schedule`
ADD PRIMARY KEY(`id`)";

$db_sql_11[] = "ALTER TABLE `exam_schedule`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT";

// =================== student records ========================== //
$db_sql_12[] = "DROP TABLE IF EXISTS `student_records`";

$db_sql_12[] = "CREATE TABLE `student_records` (
  `id` int(11) NOT NULL,
  `email_address` VARCHAR(255) NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  `gender` VARCHAR(150) NOT NULL,
  `student_year` VARCHAR(255) NOT NULL,
  `course` VARCHAR(255) NOT NULL,
  `exam_title` VARCHAR(255) NOT NULL,
  `exam_description` VARCHAR(255) NOT NULL,
  `finish_exam_date` datetime NOT NULL,
  `exam_status` VARCHAR(255) NOT NULL,
  `total_average` int(11) NOT NULL,
  `status` VARCHAR(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

$db_sql_12[] = "ALTER TABLE `student_records`
ADD PRIMARY KEY(`id`)";

$db_sql_12[] = "ALTER TABLE `student_records`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT";

$sql_db_12[] = "ALTER TABLE `student_records`
ADD INDEX email_address (`email_address`)";
