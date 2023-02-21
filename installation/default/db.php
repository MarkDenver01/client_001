<?php
$db_sql[] = "DROP TABLE IF EXISTS `users`";

$db_sql[] = "CREATE TABLE `users` (
    `id` int(11) NOT NULL,
    `name` varchar(255) NOT NULL,
    `age` int(32) NOT NULL,
    `gender` varchar(255) NOT NULL,
    `present_address` varchar(255) NOT NULL,
    `birthday` varchar(255) NOT NULL,
    `course` varchar(255) NOT NULL,
    `year` int(32) NOT NULL,
    `email_address` varchar(255) NOT NULL,
    `password` varchar(255) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci";

$db_sql[] = "ALTER TABLE `users`
  ADD PRIMARY KEY (`id`)";

 $db_sql[] = "ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT";