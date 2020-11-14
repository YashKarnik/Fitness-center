CREATE TABLE user_details (
   username varchar(100) PRIMARY KEY,
   email varchar(100) UNIQUE,
   password varchar(100) NOT NULL,
   address varchar(255),
   city varchar(20),
   age int,
   zip int,
   gender varchar(1) DEFAULT 'O'
);