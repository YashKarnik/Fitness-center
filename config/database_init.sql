-- CREATE DATABASE
CREATE DATABASE fitness_center

-- CREATE TABLES
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

CREATE TABLE premium_membership(
   id INT AUTO_INCREMENT PRIMARY KEY,
   email varchar(100) NOT NULL,
   tier varchar(1) NOT NULL,
   duration INT NOT NULL,
   cost INT NOT NULL,
   date_created DATETIME DEFAULT CURRENT_TIMESTAMP 
);

CREATE TABLE buying_details(
   id INT AUTO_INCREMENT PRIMARY KEY,
   email varchar(100) NOT NULL,
   item varchar(100) NOT NULL,
   item_cost INT NOT NULL,
   address varchar(100) NOT NULL,
   purchaced_on DATETIME DEFAULT CURRENT_TIMESTAMP 
);

-- SELECT tier FROM premium_membership WHERE email='yashkarnik2000@gmail.com' ORDER BY date_created DESC LIMIT 1

