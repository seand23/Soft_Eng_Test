use softeng;

drop table if exists orders;
drop table if exists supplier;
drop table if exists products;
drop table if exists admins;
drop table if exists users;

create table users (
	userID int not null,
    name varchar(255),
	username Varchar (255),
    email Varchar(255),
    password varchar(255),
    address varchar (255),
    phone varchar(255),
    
    primary key (userID)
);

create table admins (
	adminID int not null,
    name varchar(255),
	username Varchar (255),
    email Varchar(255),
    password varchar(255),
    address varchar (255),
    phone varchar(255),
    
    primary key (adminID)
);

create table supplier (
	supplierID int not null,
	brandName varchar(255) not null,
    
    primary key (supplierID)
);

create table products (
	productID int not null,
    userID int,
    adminID int,
    productName varchar(255),
    price decimal (7,2),
    supplierID int not null,
    
    
    primary key (productID),
    foreign key (supplierID) references supplier (supplierID),
    foreign key (userID) references users (userID),
    foreign key (adminID) references admins (adminID)
);

create table orders (
	orderID int not null,
    totalPrice decimal (7,2),
    datePurchase timestamp,
    userId int,
    adminID int,
    
    primary key (orderID),
    foreign key (userID) references users (userID),
    foreign key (adminID) references admins (adminID)
);

select * from users;
select * from admins;
select * from supplier;
select * from products;
select * from orders;

