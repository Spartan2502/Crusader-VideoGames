-- Active: 1669614142285@@127.0.0.1@3306@test
/* 2022-11-13 12:23:43 [22 ms] */ 
CREATE DATABASE HolaMundo
    DEFAULT CHARACTER SET = 'utf8mb4';
/* 2022-11-13 12:23:45 [2 ms] */ 
USE HolaMundo;
/* 2022-11-13 12:23:48 [25 ms] */ 
CREATE TABLE Products (
`Id` INT NOT NULL AUTO_INCREMENT ,
`ProductName` VARCHAR(200) NOT NULL ,
`Color` VARCHAR(50) NOT NULL ,
`Price` DOUBLE NOT NULL ,
PRIMARY KEY (`Id`)
);
/* 2022-11-13 12:23:50 [17 ms] */ 
CREATE TABLE Users(
`Id` INT NOT NULL AUTO_INCREMENT,
`UserName` VARCHAR(50) NOT NULL ,
`Email` VARCHAR(50) NOT NULL ,
`Password` VARCHAR(50) NOT NULL,
PRIMARY KEY (`Id`)
);

INSERT INTO `users`
(`Id`, `UserName`, `Email`, `Password`)
 VALUES
  ('','Alex','Admin@correo.com','admin');

CREATE TABLE accounts (  
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    steam VARCHAR(255),
    epic VARCHAR(255),
    gog VARCHAR(255),
    user INT UNIQUE ,
   CONSTRAINT FK_PersonsAccounts  FOREIGN KEY (user) REFERENCES users(Id)
);

INSERT INTO `accounts`(`id`, `steam`, `epic`, `gog`, `user`) 
VALUES 
('','Spartan','Spartan','Spartan','1');

CREATE TABLE games (  
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255),
    description VARCHAR(255),
    price INT,
    image VARCHAR(255),
    account INT UNIQUE ,
   CONSTRAINT FK_AccountsGames  FOREIGN KEY (account) REFERENCES accounts(id)
);
