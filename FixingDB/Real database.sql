use softeng;

drop table if exists orders;
drop table if exists supplier;
drop table if exists suits;
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
	brandName varchar(255) not null,
    
    primary key (brandName)
);

create table suits (
	suitID int not null,
    userID int,
    adminID int,
    suitName varchar(255),
    price decimal (7,2),
    brandName varchar(255) not null,
    
    
    primary key (suitID),
    foreign key (brandName) references supplier (brandName),
    foreign key (userID) references users (userID),
    foreign key (adminID) references admins (adminID)
);

create table products (
	productID int not null,
    userID int,
    adminID int,
    suitName varchar(255),
    price decimal (7,2),
    brandName varchar(255) not null,
    
    
    primary key (productID),
    foreign key (brandName) references supplier (brandName),
    foreign key (userID) references users (userID),
    foreign key (adminID) references admins (adminID)
);

create table supplier (
	brandName varchar(255) not null,
    
    primary key (brandName)
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

