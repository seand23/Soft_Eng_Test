use softeng;

drop table if exists orders;
drop tables if exists products;
drop tables if exists supplier;
drop tables if exists admins;
drop tables if exists customers;
drop table if exists users;

CREATE TABLE if not exists users (
    userID INT NOT NULL AUTO_INCREMENT,
    firstname VARCHAR(255),
    lastname VARCHAR(255),
    username VARCHAR(255),
    email VARCHAR(255),
    password VARCHAR(255),
    address VARCHAR(255),
    phone VARCHAR(255),
    PRIMARY KEY (userID)
);

CREATE TABLE if not exists customers (
    customerID INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(255),
    userID INT,
    PRIMARY KEY (customerID),
    FOREIGN KEY (userID) REFERENCES users(userID)
);

CREATE TABLE if not exists admins (
    adminID INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(255),
    username VARCHAR(255),
    email VARCHAR(255),
    password VARCHAR(255),
    address VARCHAR(255),
    phone VARCHAR(255),
    userID INT,
    PRIMARY KEY (adminID),
    FOREIGN KEY (userID) REFERENCES users(userID)
);


create table if not exists supplier (
	supplierID int NOT NULL AUTO_INCREMENT,
	companyName varchar(255),
    
    primary key (supplierID)
);

create table if not exists products (
	productID int NOT NULL AUTO_INCREMENT,
    userID int,
    adminID int,
    productName varchar(255),
    price decimal (7,2),
    brandName varchar(255),
    supplierID int,
	colors varchar(255),
    size varchar(255),
    imageURL VARCHAR(255),
    
    
    primary key (productID),
    foreign key (supplierID) references supplier (supplierID),
    foreign key (userID) references users (userID),
    foreign key (adminID) references admins (adminID)
);

create table if not exists orders (
	orderID int NOT NULL AUTO_INCREMENT,
    totalPrice decimal (7,2),
    datePurchase timestamp,
    userId INT,
    
    primary key (orderID),
    foreign key (userID) references users (userID)
);

-- ALTER TABLE orders
-- DROP COLUMN delAddress;

-- ALTER TABLE products
-- -- ADD COLUMN colors varchar(255),
-- ADD COLUMN size varchar(255);

-- Sample data for users table
INSERT INTO users (userID, firstname, lastname, username, email, password, address, phone)
VALUES 
    (1, 'John', 'Doe', 'john_doe', 'john@example.com', 'password123', '123 Main St, City', '123-456-7890'),
    (2, 'Jane', 'Smith', 'jane_smith', 'jane@example.com', 'pass123', '456 Elm St, Town', '987-654-3210'),
    (3, 'Kelly', 'Jay', 'jj_s', 'j@example.com', 'pas123', '456 El]m St, Town', '987-456654-3210');

-- Sample data for admins table
INSERT INTO admins (adminID, name, username, email, password, address, phone)
VALUES 
	(77, 'Admin1', 'admin1', 'admin1@example.com', 'adminpass', '789 Oak St, Village', '555-123-4567'),
	(772, 'Admin2', 'admin2', 'admin2@example.com', 'adminpass2', '321 Maple St, County', '555-987-6543');

-- Sample data for supplier table
INSERT INTO supplier (supplierID, companyName)
VALUES 
    (1, 'monster.inc'),
    (2, 'gorilla.inc'),
    (3, 'fuckknows.inc');

-- Sample data for products table
INSERT INTO products (productID, userID, adminID, productName, price, brandName, supplierID, colors, size, imageURL)
VALUES 
    (1, 1, 77, 'Product1', 19.99, 'Brand1', 1, 'Black', 'L', './images/LOGO.jpg'),
    (2, 2, 77, 'Product2', 29.99, 'Brand2', 2,   'Blue', 'M', './images/LOGO.jpg'),
    (3, 1, 772, 'Product3', 39.99, 'Brand3', 3,  'Grey', 'S', './images/LOGO.jpg'),
    (4, 3, 772, '3 Piece', 59.99, 'Hugo Boss', 1, 'Red', 'XL', './images/LOGO.jpg'),
	(5, 2, 77, '2 Piece', 49.99, 'Armani', 2, 'Green', 'M', './images/LOGO.jpg'),
	(6, 1, 77, '3 Piece', 79.99, 'Calvin Klein', 3, 'White', 'S', './images/LOGO.jpg'),
	(7, 2, 77, '2 Piece', 69.99, 'Ted Baker', 2, 'Yellow', 'L', './images/LOGO.jpg'),
	(8, 3, 77, '3 Piece', 89.99, 'Ralph Lauren', 3, 'Purple', 'XS', './images/LOGO.jpg'),
    (9, 1, 77, '2 Piece', 49.99, 'Hugo Boss', 1, 'Black', 'M', './images/LOGO.jpg'),
	(10, 2, 77, '3 Piece', 69.99, 'Armani', 2, 'Blue', 'L', './images/LOGO.jpg'),
	(11, 1, 772, '2 Piece', 79.99, 'Calvin Klein', 3, 'Grey', 'S', './images/LOGO.jpg'),
	(12, 2, 77, '3 Piece', 99.99, 'Ted Baker', 3, 'Green', 'XL', './images/LOGO.jpg'),
	(13, 3, 77, '2 Piece', 59.99, 'Ralph Lauren', 2, 'Red', 'XS', './images/LOGO.jpg'),
	(14, 1, 77, '3 Piece', 79.99, 'Hugo Boss', 1, 'White', 'M', './images/LOGO.jpg'),
	(15, 2, 77, '2 Piece', 89.99, 'Armani', 2, 'Black', 'S', './images/LOGO.jpg'),
	(16, 1, 772, '3 Piece', 109.99, 'Calvin Klein', 3, 'Blue', 'L', './images/LOGO.jpg'),
	(17, 2, 77, '2 Piece', 69.99, 'Ted Baker', 1, 'Grey', 'XL', './images/LOGO.jpg'),
	(18, 3, 77, '3 Piece', 119.99, 'Ralph Lauren', 1, 'Green', 'XS', './images/LOGO.jpg'),
	(19, 1, 77, '2 Piece', 59.99, 'Hugo Boss', 1, 'Red', 'M', './images/LOGO.jpg'),
	(20, 2, 77, '3 Piece', 79.99, 'Armani', 2, 'White', 'L', './images/LOGO.jpg'),
	(21, 1, 772, '2 Piece', 99.99, 'Calvin Klein', 3, 'Black', 'S', './images/LOGO.jpg'),
	(22, 2, 77, '3 Piece', 129.99, 'Ted Baker', 2, 'Blue', 'XL', './images/LOGO.jpg'),
	(23, 3, 77, '2 Piece', 79.99, 'Ralph Lauren', 3, 'Grey', 'XS', './images/LOGO.jpg'),
	(24, 1, 77, '3 Piece', 99.99, 'Hugo Boss', 1, 'Green', 'M', './images/LOGO.jpg'),
	(25, 2, 77, '2 Piece', 109.99, 'Armani', 2, 'Red', 'S', './images/LOGO.jpg'),
	(26, 1, 772, '3 Piece', 139.99, 'Calvin Klein', 3, 'White', 'L', './images/LOGO.jpg'),
	(27, 2, 77, '2 Piece', 79.99, 'Ted Baker', 2, 'Black', 'XL', './images/LOGO.jpg'),
	(28, 3, 77, '3 Piece', 149.99, 'Ralph Lauren', 1, 'Blue', 'XS', './images/LOGO.jpg');


    
    
-- delete from products;
-- Sample data for orders table
-- INSERT INTO orders (orderID, totalPrice, datePurchase, userID, adminID)
-- VALUES 
--     (1, 49.98, '2024-02-28 15:30:00', 1, 1),
--     (2, 29.99, '2024-02-29 10:45:00', 2, 1);
    
    select *from products;
    select * from orders;
    select *from admins;
