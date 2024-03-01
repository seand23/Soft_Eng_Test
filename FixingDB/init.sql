CREATE DATABASE suitDB;

USE suitDB;

CREATE TABLE users (
	id int(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    
    email VARCHAR(50) NOT NULL,
    password Varchar(255) not null,
    
    address VARCHAR(80) NOT NULL,
    dateofpurchase TIMESTAMP,
    
    Primary key (id)
);

CREATE TABLE suits (
	suitid int(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    brand VARCHAR(30) NOT NULL,
    name VARCHAR(20) NOT NULL,
    price FLOAT(10) NOT NULL,
    image VARCHAR(50) NOT NULL,
    
    primary key (suitid)
);