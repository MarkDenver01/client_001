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
  `is_logged_in` int(11) NOT NULL,
  `last_login` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

$db_sql_1[] = "ALTER TABLE `user_account`
ADD PRIMARY KEY (`id`)";

$db_sql_1[] = "ALTER TABLE `user_account`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT";


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
