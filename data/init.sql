CREATE DATABASE suitDB;

USE suitDB;

CREATE TABLE users (
	id int(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(50) NOT NULL,
    age INT(3),
    address VARCHAR(80) NOT NULL,
    dateofpurchase TIMESTAMP
);