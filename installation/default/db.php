<?php
$db_sql[] = "DROP TABLE IF EXISTS `user_account`";

$db_sql[] = "CREATE TABLE `user_account` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_types` varchar(255) NOT NUll,
  `is_logged_in` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

$db_sql[] = "ALTER TABLE `user_account`
ADD PRIMARY KEY (`id`)";

$db_sql[] = "ALTER TABLE `user_account`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT";
