<?php

// =================== user account table ========================== //
$db_sql_1[] = "DROP TABLE IF EXISTS `user_account`";

$db_sql_1[] = "CREATE TABLE `user_account` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_level` int(11) NOT NUll,
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
  `semester` VARCHAR(255) NOT NULL,
  `school_year` VARCHAR(255) NOT NULL,
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
  `exam_category` VARCHAR(255) NOT NULL,
  `image_exam_path` VARCHAR(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `exam_status` int(11)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

$db_sql_10[] = "ALTER TABLE `exam_created`
ADD PRIMARY KEY(`id`)";

$db_sql_10[] = "ALTER TABLE `exam_created`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT";

$sql_db_10[] = "ALTER TABLE `exam_created`
ADD INDEX student_year (`student_year`)";

// =================== exam schedule ========================== //
$db_sql_11[] = "DROP TABLE IF EXISTS `exam_schedule`";

$db_sql_11[] = "CREATE TABLE `exam_schedule` (
  `id` int(11) NOT NULL,
  `student_year` VARCHAR(255) NOT NULL,
  `exam_title` VARCHAR(255) NOT NULL,
  `created_on` datetime NOT NULL,
  `expired_on` datetime NOT NULL,
  `exam_duration` int(11) NOT NULL,
  `result_date_and_time` datetime NOT NULL,
  `exam_status` VARCHAR(255) NOT NULL
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
  `school_year` VARCHAR(255) NOT NULL,
  `semester` VARCHAR(255) NOT NULL,
  `exam_title` VARCHAR(255) NOT NULL,
  `exam_description` VARCHAR(255) NOT NULL,
  `exam_category` VARCHAR(255) NOT NULL,
  `finish_exam_date` datetime NOT NULL,
  `exam_status` VARCHAR(255) NOT NULL,
  `total_items` int(55) NOT NULL,
  `total_average` int(11) NOT NULL,
  `status` VARCHAR(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

$db_sql_12[] = "ALTER TABLE `student_records`
ADD PRIMARY KEY(`id`)";

$db_sql_12[] = "ALTER TABLE `student_records`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT";

$sql_db_12[] = "ALTER TABLE `student_records`
ADD INDEX email_address (`email_address`)";

// =================== assign exam details ========================== //
$db_sql_13[] = "DROP TABLE IF EXISTS `assign_exam_record`";

$db_sql_13[] = "CREATE TABLE `assign_exam_record` (
  `id` int(11) NOT NULL,
  `student_year` VARCHAR(255) NOT NULL,
  `exam_title` VARCHAR(255) NOT NULL,
  `exam_description` VARCHAR(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

$db_sql_13[] = "ALTER TABLE `assign_exam_record` 
ADD PRIMARY KEY(`id`)";

$db_sql_13[] = "ALTER TABLE `assign_exam_record`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT";

// ===================(sub) exam category ========================== //
$db_sql_14[] = "DROP TABLE IF EXISTS `exam_category`";

$db_sql_14[] = "CREATE TABLE `exam_category` (
  `id` int(11) NOT NULL,
  `exam_description` VARCHAR(255) NOT NULL,
  `exam_category` VARCHAR(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

$db_sql_14[] = "ALTER TABLE  `exam_category`
ADD PRIMARY KEY(`id`)";

$db_sql_14[] = "ALTER TABLE `exam_category` 
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT";

// ===================(sub) reading - correct answer  ========================== //
$db_sql_15[] = "DROP TABLE IF EXISTS `reading`";

$db_sql_15[] = "CREATE TABLE `reading` (
  `id` int(11) NOT NULL,
  `correct_items` VARCHAR(255) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

$db_sql_15[] = "ALTER TABLE `reading`
ADD PRIMARY KEY(`id`)";

$db_sql_15[] = "ALTER TABLE `reading`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT";

// ===================(sub) writing - correct answer  ========================== //
$db_sql_16[] = "DROP TABLE IF EXISTS `writing`";

$db_sql_16[] = "CREATE TABLE `writing` (
  `id` int(11) NOT NULL,
  `correct_items` VARCHAR(255) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

$db_sql_16[] = "ALTER TABLE `writing`
ADD PRIMARY KEY(`id`)";

$db_sql_16[] = "ALTER TABLE `writing`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT";

// ===================(sub) speaking skills - correct answer  ========================== //
$db_sql_17[] = "DROP TABLE IF EXISTS `speaking_skills`";

$db_sql_17[] = "CREATE TABLE `speaking_skills` (
  `id` int(11) NOT NULL,
  `correct_items` VARCHAR(255) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

$db_sql_17[] = "ALTER TABLE `speaking_skills`
ADD PRIMARY KEY(`id`)";

$db_sql_17[] = "ALTER TABLE `speaking_skills`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT";

// ===================(sub) listening skills - correct answer  ========================== //
$db_sql_18[] = "DROP TABLE IF EXISTS `listening_skills`";

$db_sql_18[] = "CREATE TABLE `listening_skills` (
  `id` int(11) NOT NULL,
  `correct_items` VARCHAR(255) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

$db_sql_18[] = "ALTER TABLE `listening_skills`
ADD PRIMARY KEY(`id`)";

$db_sql_18[] = "ALTER TABLE `listening_skills`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT";

// ===================(sub) learning styles - correct answer  ========================== //
$db_sql_19[] = "DROP TABLE IF EXISTS `learning_styles`";

$db_sql_19[] = "CREATE TABLE `learning_styles` (
  `id` int(11) NOT NULL,
  `correct_items` VARCHAR(255) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

$db_sql_19[] = "ALTER TABLE `learning_styles`
ADD PRIMARY KEY(`id`)";

$db_sql_19[] = "ALTER TABLE `learning_styles`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT";

// ===================(sub) memory - correct answer  ========================== //
$db_sql_20[] = "DROP TABLE IF EXISTS `memory`";

$db_sql_20[] = "CREATE TABLE `memory` (
  `id` int(11) NOT NULL,
  `correct_items` VARCHAR(255) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

$db_sql_20[] = "ALTER TABLE `memory`
ADD PRIMARY KEY(`id`)";

$db_sql_20[] = "ALTER TABLE `memory`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT";

// ===================(sub) study skills - correct answer  ========================== //
$db_sql_21[] = "DROP TABLE IF EXISTS `study_skills`";

$db_sql_21[] = "CREATE TABLE `study_skills` (
  `id` int(11) NOT NULL,
  `correct_items` VARCHAR(255) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

$db_sql_21[] = "ALTER TABLE `study_skills`
ADD PRIMARY KEY(`id`)";

$db_sql_21[] = "ALTER TABLE `study_skills`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT";

// ===================(sub) creating and critical thinknig skills - correct answer  ========================== //
$db_sql_22[] = "DROP TABLE IF EXISTS `creative_and_thinking`";

$db_sql_22[] = "CREATE TABLE `creative_and_thinking` (
  `id` int(11) NOT NULL,
  `correct_items` VARCHAR(255) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

$db_sql_22[] = "ALTER TABLE `creative_and_thinking`
ADD PRIMARY KEY(`id`)";

$db_sql_22[] = "ALTER TABLE `creative_and_thinking`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT";

// ===================(sub) motivation - correct answer  ========================== //
$db_sql_23[] = "DROP TABLE IF EXISTS `motivation`";

$db_sql_23[] = "CREATE TABLE `motivation` (
  `id` int(11) NOT NULL,
  `correct_items` VARCHAR(255) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

$db_sql_23[] = "ALTER TABLE `motivation`
ADD PRIMARY KEY(`id`)";

$db_sql_23[] = "ALTER TABLE `motivation`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT";

// ===================(sub) self-esteem - correct answer  ========================== //
$db_sql_24[] = "DROP TABLE IF EXISTS `self_esteem`";

$db_sql_24[] = "CREATE TABLE `self_esteem` (
  `id` int(11) NOT NULL,
  `correct_items` VARCHAR(255) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

$db_sql_24[] = "ALTER TABLE `self_esteem`
ADD PRIMARY KEY(`id`)";

$db_sql_24[] = "ALTER TABLE `self_esteem`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT";

// ===================(sub) personal-relationship - correct answer  ========================== //
$db_sql_25[] = "DROP TABLE IF EXISTS `personal_relationship`";

$db_sql_25[] = "CREATE TABLE `personal_relationship` (
  `id` int(11) NOT NULL,
  `correct_items` VARCHAR(255) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

$db_sql_25[] = "ALTER TABLE `personal_relationship`
ADD PRIMARY KEY(`id`)";

$db_sql_25[] = "ALTER TABLE `personal_relationship`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT";

// ===================(sub) conflict-relationships - correct answer  ========================== //
$db_sql_26[] = "DROP TABLE IF EXISTS `conflict_resolutions`";

$db_sql_26[] = "CREATE TABLE `conflict_resolutions` (
  `id` int(11) NOT NULL,
  `correct_items` VARCHAR(255) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

$db_sql_26[] = "ALTER TABLE `conflict_resolutions`
ADD PRIMARY KEY(`id`)";

$db_sql_26[] = "ALTER TABLE `conflict_resolutions`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT";

// ===================(sub) health - correct answer  ========================== //
$db_sql_27[] = "DROP TABLE IF EXISTS `health`";

$db_sql_27[] = "CREATE TABLE `health` (
  `id` int(11) NOT NULL,
  `correct_items` VARCHAR(255) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

$db_sql_27[] = "ALTER TABLE `health`
ADD PRIMARY KEY(`id`)";

$db_sql_27[] = "ALTER TABLE `health`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT";

// ===================(sub) time_management - correct answer  ========================== //
$db_sql_28[] = "DROP TABLE IF EXISTS `time_management`";

$db_sql_28[] = "CREATE TABLE `time_management` (
  `id` int(11) NOT NULL,
  `correct_items` VARCHAR(255) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

$db_sql_28[] = "ALTER TABLE `time_management`
ADD PRIMARY KEY(`id`)";

$db_sql_28[] = "ALTER TABLE `time_management`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT";

// ===================(sub) money_management - correct answer  ========================== //
$db_sql_29[] = "DROP TABLE IF EXISTS `money_management`";

$db_sql_29[] = "CREATE TABLE `money_management` (
  `id` int(11) NOT NULL,
  `correct_items` VARCHAR(255) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

$db_sql_29[] = "ALTER TABLE `money_management`
ADD PRIMARY KEY(`id`)";

$db_sql_29[] = "ALTER TABLE `money_management`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT";

// ===================(sub) personal_purpose - correct answer  ========================== //
$db_sql_30[] = "DROP TABLE IF EXISTS `personal_purpose`";

$db_sql_30[] = "CREATE TABLE `personal_purpose` (
  `id` int(11) NOT NULL,
  `correct_items` VARCHAR(255) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

$db_sql_30[] = "ALTER TABLE `personal_purpose`
ADD PRIMARY KEY(`id`)";

$db_sql_30[] = "ALTER TABLE `personal_purpose`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT";

// ===================(sub) career_planning - correct answer  ========================== //
$db_sql_31[] = "DROP TABLE IF EXISTS `career_planning`";

$db_sql_31[] = "CREATE TABLE `career_planning` (
  `id` int(11) NOT NULL,
  `correct_items` VARCHAR(255) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

$db_sql_31[] = "ALTER TABLE `career_planning`
ADD PRIMARY KEY(`id`)";

$db_sql_31[] = "ALTER TABLE `career_planning`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT";

// ===================(sub) support_resources - correct answer  ========================== //
$db_sql_32[] = "DROP TABLE IF EXISTS `support_resources`";

$db_sql_32[] = "CREATE TABLE `support_resources` (
  `id` int(11) NOT NULL,
  `correct_items` VARCHAR(255) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

$db_sql_32[] = "ALTER TABLE `support_resources`
ADD PRIMARY KEY(`id`)";

$db_sql_32[] = "ALTER TABLE `support_resources`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT";

// ===================(sub) vocabulary - correct answer  ========================== //
$db_sql_33[] = "DROP TABLE IF EXISTS `vocabulary`";

$db_sql_33[] = "CREATE TABLE `vocabulary` (
  `id` int(11) NOT NULL,
  `correct_items` VARCHAR(255) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

$db_sql_33[] = "ALTER TABLE `vocabulary`
ADD PRIMARY KEY(`id`)";

$db_sql_33[] = "ALTER TABLE `vocabulary`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT";

// ===================(sub) computation - correct answer  ========================== //
$db_sql_34[] = "DROP TABLE IF EXISTS `computation`";

$db_sql_34[] = "CREATE TABLE `computation` (
  `id` int(11) NOT NULL,
  `correct_items` VARCHAR(255) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

$db_sql_34[] = "ALTER TABLE `computation`
ADD PRIMARY KEY(`id`)";

$db_sql_34[] = "ALTER TABLE `computation`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT";

// ===================(sub) spatial - correct answer  ========================== //
$db_sql_35[] = "DROP TABLE IF EXISTS `spatial`";

$db_sql_35[] = "CREATE TABLE `spatial` (
  `id` int(11) NOT NULL,
  `correct_items` VARCHAR(255) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

$db_sql_35[] = "ALTER TABLE `spatial`
ADD PRIMARY KEY(`id`)";

$db_sql_35[] = "ALTER TABLE `spatial`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT";

// ===================(sub) work_comparison - correct answer  ========================== //
$db_sql_36[] = "DROP TABLE IF EXISTS `work_comparison`";

$db_sql_36[] = "CREATE TABLE `work_comparison` (
  `id` int(11) NOT NULL,
  `correct_items` VARCHAR(255) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

$db_sql_36[] = "ALTER TABLE `work_comparison`
ADD PRIMARY KEY(`id`)";

$db_sql_36[] = "ALTER TABLE `work_comparison`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT";

// ===================(sub) marking_marks_pt_1 - correct answer  ========================== //
$db_sql_37[] = "DROP TABLE IF EXISTS `marking_marks_pt_1`";

$db_sql_37[] = "CREATE TABLE `marking_marks_pt_1` (
  `id` int(11) NOT NULL,
  `correct_items` VARCHAR(255) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

$db_sql_37[] = "ALTER TABLE `marking_marks_pt_1`
ADD PRIMARY KEY(`id`)";

$db_sql_37[] = "ALTER TABLE `marking_marks_pt_1`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT";

// ===================(sub) marking_marks_pt_2 - correct answer  ========================== //
$db_sql_38[] = "DROP TABLE IF EXISTS `marking_marks_pt_2`";

$db_sql_38[] = "CREATE TABLE `marking_marks_pt_2` (
  `id` int(11) NOT NULL,
  `correct_items` VARCHAR(255) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

$db_sql_38[] = "ALTER TABLE `marking_marks_pt_2`
ADD PRIMARY KEY(`id`)";

$db_sql_38[] = "ALTER TABLE `marking_marks_pt_2`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT";

// ===================(sub) baron_eq - correct answer  ========================== //
$db_sql_39[] = "DROP TABLE IF EXISTS `baron_eq`";

$db_sql_39[] = "CREATE TABLE `baron_eq` (
  `id` int(11) NOT NULL,
  `correct_items` VARCHAR(255) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

$db_sql_39[] = "ALTER TABLE `baron_eq`
ADD PRIMARY KEY(`id`)";

$db_sql_39[] = "ALTER TABLE `baron_eq`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT"; 

// ===================(sub) keirsey_temerament_sorter - correct answer  ========================== //
$db_sql_40[] = "DROP TABLE IF EXISTS `keirsey_temerament_sorter`";

$db_sql_40[] = "CREATE TABLE `keirsey_temerament_sorter` (
  `id` int(11) NOT NULL,
  `correct_items` VARCHAR(255) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

$db_sql_40[] = "ALTER TABLE `keirsey_temerament_sorter`
ADD PRIMARY KEY(`id`)";

$db_sql_40[] = "ALTER TABLE `keirsey_temerament_sorter`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT"; 

// ===================(sub) aptitude_j_and_c 1 - correct answer  ========================== //
$db_sql_41[] = "DROP TABLE IF EXISTS `aptitude_j_and_c_1`";

$db_sql_41[] = "CREATE TABLE `aptitude_j_and_c_1` (
  `id` int(11) NOT NULL,
  `correct_items` VARCHAR(255) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

$db_sql_41[] = "ALTER TABLE `aptitude_j_and_c_1`
ADD PRIMARY KEY(`id`)";

$db_sql_41[] = "ALTER TABLE `aptitude_j_and_c_1`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT"; 

// ===================(sub) esa - correct answer  ========================== //
$db_sql_42[] = "DROP TABLE IF EXISTS `esa`";

$db_sql_42[] = "CREATE TABLE `esa` (
  `id` int(11) NOT NULL,
  `correct_items` VARCHAR(255) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

$db_sql_42[] = "ALTER TABLE `esa`
ADD PRIMARY KEY(`id`)";

$db_sql_42[] = "ALTER TABLE `esa`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT"; 

// ===================(sub) aptitude_verbal_and_numerical - correct answer  ========================== //
$db_sql_43[] = "DROP TABLE IF EXISTS `aptitude_verbal_and_numerical`";

$db_sql_43[] = "CREATE TABLE `aptitude_verbal_and_numerical` (
  `id` int(11) NOT NULL,
  `correct_items` VARCHAR(255) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

$db_sql_43[] = "ALTER TABLE `aptitude_verbal_and_numerical`
ADD PRIMARY KEY(`id`)";

$db_sql_43[] = "ALTER TABLE `aptitude_verbal_and_numerical`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT"; 

// ===================(sub) aptitude_j_and_c 2 - correct answer  ========================== //
$db_sql_44[] = "DROP TABLE IF EXISTS `aptitude_j_and_c_2`";

$db_sql_44[] = "CREATE TABLE `aptitude_j_and_c_2` (
  `id` int(11) NOT NULL,
  `correct_items` VARCHAR(255) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

$db_sql_44[] = "ALTER TABLE `aptitude_j_and_c_2`
ADD PRIMARY KEY(`id`)";

$db_sql_44[] = "ALTER TABLE `aptitude_j_and_c_2`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT"; 

// ===================(sub) aptitude_j_and_c 3 - correct answer  ========================== //
$db_sql_45[] = "DROP TABLE IF EXISTS `aptitude_j_and_c_3`";

$db_sql_45[] = "CREATE TABLE `aptitude_j_and_c_3` (
  `id` int(11) NOT NULL,
  `correct_items` VARCHAR(255) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

$db_sql_45[] = "ALTER TABLE `aptitude_j_and_c_3`
ADD PRIMARY KEY(`id`)";

$db_sql_45[] = "ALTER TABLE `aptitude_j_and_c_3`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT"; 

// ===================(sub) aptitude_j_and_c 4 - correct answer  ========================== //
$db_sql_46[] = "DROP TABLE IF EXISTS `aptitude_j_and_c_4`";

$db_sql_46[] = "CREATE TABLE `aptitude_j_and_c_4` (
  `id` int(11) NOT NULL,
  `correct_items` VARCHAR(255) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

$db_sql_46[] = "ALTER TABLE `aptitude_j_and_c_4`
ADD PRIMARY KEY(`id`)";

$db_sql_46[] = "ALTER TABLE `aptitude_j_and_c_4`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT"; 