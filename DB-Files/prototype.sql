use SoftENg;

drop table orders;
drop table suits;
drop table admins;
drop table users;

Create Table users(
	userID int not null,
    Fname Varchar(255),
    Lname Varchar(255),
    username Varchar(255),
    password Varchar(255),
    email Varchar(255),
    address Varchar(225),
    phone Varchar(255),
    
    Primary Key (userID)
);

Create Table admins(
	adminID int not null,
	Fname Varchar(255),
    Lname Varchar(255),
    username Varchar(255),
    password Varchar(255),
    email Varchar(255),
    address Varchar(225),
    phone Varchar(255),
    Primary key (adminID)
);



Create Table suits(
	suitID int not null,
    suitName Varchar(255),
    price decimal(6,2),
    brand varchar(255),
    
    Primary Key (suitID)
);

Create Table orders(
	orderID int not null,
    
    
    TotalPrice decimal (6,2),
    customer int,
    datePurchase timestamp,
    
    Primary key (orderID),
    Foreign key (customer) references users (userID)
);

Create table ordered_items (
	suitID int not null,
    quantity int,
    price decimal (6,2),
    
    foreign key (suitID) references suits (suitID),
    primary key (suitID)
);

select * from ordered_items;