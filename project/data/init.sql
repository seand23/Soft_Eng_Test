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

CREATE TABLE suits (
	id int(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    brand VARCHAR(30) NOT NULL,
    suit_name VARCHAR(20) NOT NULL,
    price FLOAT(10) NOT NULL,
    image VARCHAR(50) NOT NULL
);

INSERT INTO suits (brand, suit_name, price, image) VALUES
('Armani', 'Classic Black Suit', 999.99, 'armani_classic_black_suit.jpg'),
('Hugo Boss', 'Navy Blue Slim Fit Suit', 799.99, 'hugo_boss_navy_blue_slim_fit_suit.jpg'),
('Calvin Klein', 'Charcoal Grey Suit', 649.99, 'calvin_klein_charcoal_grey_suit.jpg'),
('Tom Ford', 'Midnight Blue Tuxedo', 1499.99, 'tom_ford_midnight_blue_tuxedo.jpg');

