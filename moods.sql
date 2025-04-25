CREATE DATABASE moodtracker;

USE moodtracker;

CREATE TABLE moods (
    id int AUTO_INCREMENT primary key,
    mood varchar(20),
    timestamp DATETIME DEFAULT CURRENT_TIMESTAMP
);