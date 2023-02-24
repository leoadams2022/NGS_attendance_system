CREATE TABLE `users` (
  `id` int(11) NOT NULL auto_increment,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `campaign` VARCHAR(255) NOT NULL,
  `rank` VARCHAR(255) NOT NULL,
  `education` VARCHAR(255) NOT NULL,
  `experience` VARCHAR(255) NOT NULL,
  `target` int(11) NOT NULL,
  `salary` int(11) NOT NULL,
  `dedication` int(11) NOT NULL, 
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
);
-- `id`, `user_name`, `user_id`, `day_date`, `is_it_over`, `time_in`, `time_out`, `created_at
CREATE TABLE `attendance` (
   `id` int(11) NOT NULL auto_increment,
   `user_name` varchar(100) NOT NULL,
   `user_id` int(11) NOT NULL,
   `day_date` DATE NOT NULL,
   `is_it_over` varchar(100) NOT NULL,
   `time_in` DATETIME,
   `time_out` DATETIME,
   `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
   PRIMARY KEY  (`id`)
);
-- 'id', 'recipient', 'status', 'msg', 'auther', 'created_at', 'date_send'
CREATE TABLE `announcements` (
   `id` int(11) NOT NULL auto_increment,
   `recipient`  varchar(255) NOT NULL,
   `status` varchar(100) NOT NULL,
   `msg` varchar(1000) NOT NULL,
   `auther` varchar(100) NOT NULL,
   `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
   PRIMARY KEY  (`id`)
);  