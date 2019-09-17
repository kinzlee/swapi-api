DROP DATABASE IF EXISTS `swapi`;

CREATE DATABASE IF NOT EXISTS `swpai`;

USE  `swapi`;

DROP TABLE IF EXISTS `comments`;

CREATE TABLE IF NOT EXISTS `comments`(
    `id` int( 11 ) AUTO_INCREMENT PRIMARY KEY,
    `movie_id` int(11) NOT NULL,
    `created_at` datetime NOT NULL,
    `comments` varchar(250) NOT NULL
) ENGINE=InnoDB CHARSET=utf8;


