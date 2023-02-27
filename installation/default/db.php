<?php

// =================== TABLE 1 ========================== //

$db_sql_1[] = "DROP TABLE IF EXISTS `user_account`";

$db_sql_1[] = "CREATE TABLE `user_account` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_level` int(11) NOT NUll,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `last_login` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

$db_sql_1[] = "ALTER TABLE `user_account`
ADD PRIMARY KEY (`id`)";

$db_sql_1[] = "ALTER TABLE `user_account`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT";


// =================== TABLE 2 ========================== //

$db_sql_2[] = "DROP TABLE IF EXISTS `user_groups`";

$db_sql_2[] = "CREATE TABLE `user_groups` (
  `id` int(11) NOT NULL,
  `user_types` varchar(150) NOT NULL,
  `user_level` int(11),
  `user_status` int(11)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

$db_sql_2[] = "ALTER TABLE `user_groups`
ADD PRIMARY KEY (`id`)";

$db_sql_2[] = "ALTER TABLE `user_groups`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT";
