CREATE DATABASE IF NOT EXISTS `sql7306624`;
USE  `sql7306624`;

CREATE TABLE IF NOT EXISTS `comments`(
    `id` int( 11 ) AUTO_INCREMENT PRIMARY KEY,
    `movie_id` int(11) NOT NULL,
    `episode_id` int(11) NOT NULL,
    `created_at` datetime NOT NULL,
    `comment` varchar(250) NOT NULL
) ENGINE=InnoDB CHARSET=utf8;