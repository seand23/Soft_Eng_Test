
use softeng;

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
    delAddress varchar(255),
    userId INT,
    
    primary key (orderID),
    foreign key (userID) references users (userID)
);

-- ALTER TABLE orders
-- DROP COLUMN delAddress;

-- ALTER TABLE products
-- -- ADD COLUMN colors varchar(255),
-- ADD COLUMN size varchar(255),
-- ADD COLUMN brand varchar(255);
-- DROP COLUMN brand

-- Sample data for users table
-- INSERT INTO users (userID, firstname, lastname, username, email, password, address, phone)
-- VALUES 
--     (1, 'John', 'Doe', 'john_doe', 'john@example.com', 'password123', '123 Main St, City', '123-456-7890'),
--     (2, 'Jane', 'Smith', 'jane_smith', 'jane@example.com', 'pass123', '456 Elm St, Town', '987-654-3210');

-- Sample data for admins table
-- INSERT INTO admins (adminID, name, username, email, password, address, phone)
-- VALUES 
--     -- (77, 'Admin1', 'admin1', 'admin1@example.com', 'adminpass', '789 Oak St, Village', '555-123-4567'),
-- --     (772, 'Admin2', 'admin2', 'admin2@example.com', 'adminpass2', '321 Maple St, County', '555-987-6543');

-- Sample data for supplier table
-- INSERT INTO supplier (supplierID, companyName)
-- VALUES 
--     (1, 'monster.inc'),
--     (2, 'gorilla.inc'),
--     (3, 'fuckknows.inc');

-- Sample data for products table
INSERT INTO products (productID, userID, adminID, productName, price, brandName, supplierID, colors, size)
VALUES 
    (1, 1, 1, 'Product1', 19.99, 'Brand1', 1, 'black', 'L'),
    (2, 2, 1, 'Product2', 29.99, 'Brand2', 2,   'blue', 'M'),
    (3, 1, 2, 'Product3', 39.99, 'Brand3', 3,  'grey', 'S');
    
    
select* from products;
delete from products;
-- Sample data for orders table
-- INSERT INTO orders (orderID, totalPrice, datePurchase, userID, adminID)
-- VALUES 
--     (1, 49.98, '2024-02-28 15:30:00', 1, 1),
--     (2, 29.99, '2024-02-29 10:45:00', 2, 1);
    
    select *from products;