DROP SCHEMA IF EXISTS softeng;
CREATE SCHEMA softeng;
USE softeng;

DROP TABLE IF EXISTS orders;
DROP TABLE IF EXISTS supplier;
DROP TABLE IF EXISTS products;
DROP TABLE IF EXISTS admins;
DROP TABLE IF EXISTS users;

CREATE TABLE users (
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

CREATE TABLE customers (
    customerID INT NOT NULL AUTO_INCREMENT,
    userID INT NOT NULL,
    PRIMARY KEY (customerID),
    FOREIGN KEY (userID) REFERENCES users(userID) 
);

CREATE TABLE admins (
    adminID INT NOT NULL AUTO_INCREMENT,
    userID INT NOT NULL,
    PRIMARY KEY (adminID),
    FOREIGN KEY (userID) REFERENCES users(userID)
);

CREATE TABLE supplier (
    supplierID INT NOT NULL AUTO_INCREMENT,
    companyName VARCHAR(255),
    PRIMARY KEY (supplierID)
);

CREATE TABLE products (
    productID INT NOT NULL AUTO_INCREMENT,
    productName VARCHAR(255),
    price DECIMAL(10,2),
    brandName VARCHAR(255),
    supplierID INT,
    PRIMARY KEY (productID),
    FOREIGN KEY (supplierID) REFERENCES supplier(supplierID)
);

CREATE TABLE orders (
    orderID INT NOT NULL AUTO_INCREMENT,
    totalPrice DECIMAL(10,2),
    datePurchase TIMESTAMP,
    userID INT,
    productID INT,
    PRIMARY KEY (orderID),
    FOREIGN KEY (userID) REFERENCES users(userID),
    FOREIGN KEY (productID) REFERENCES products(productID)
);

-- Sample data for users table
INSERT INTO users (firstname, lastname, username, email, password, address, phone)
VALUES 
    ('John', 'Doe', 'admin1', 'john@example.com', 'admin', '123 Main St, City', '123-456-7890'),
    ('Jane', 'Smith', 'admin2', 'jane@example.com', 'admin', '456 Elm St, Town', '987-654-3210'),
    ('Alice', 'Jones', 'alice_jones', 'alice@example.com', 'pass456', '789 Oak St, Village', '555-111-2222'),
    ('Bob', 'Johnson', 'bob_johnson', 'bob@example.com', 'pass789', '321 Maple St, County', '555-333-4444');

-- Assign the first two users as admins
INSERT INTO admins (userID)
VALUES 
    (1),
    (2);

-- Assign the second two users as customers
INSERT INTO customers (userID)
VALUES 
    (3),
    (4);



-- Sample data for supplier table
INSERT INTO supplier (companyName)
VALUES 
    ('Monster Inc'),
    ('Gorilla Inc'),
    ('Funknows Inc');

-- Sample data for products table
INSERT INTO products (productName, price, brandName, supplierID)
VALUES 
    ('Product1', 19.99, 'Brand1', 1),
    ('Product2', 29.99, 'Brand2', 2),
    ('Product3', 39.99, 'Brand3', 3);

-- Sample data for orders table
INSERT INTO orders (totalPrice, datePurchase, userID, productID)
VALUES 
    (49.98, '2024-02-28 15:30:00', 1, 1),
    (29.99, '2024-02-29 10:45:00', 2, 2);
