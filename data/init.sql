CREATE DATABASE IF NOT EXISTS `swapi`;
USE  `swapi`;


CREATE TABLE IF NOT EXISTS `comments`(
    `id` int( 11 ) AUTO_INCREMENT PRIMARY KEY,
    `episode_id` int(11) NOT NULL,
    `created_at` datetime NOT NULL,
    `comment` varchar(500) NOT NULL
) ENGINE=InnoDB CHARSET=utf8;


