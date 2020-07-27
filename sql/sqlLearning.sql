create database loginApp;
use loginApp;
create table users(ID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,full_name varchar(255)
,email varchar(255) NOT NULL UNIQUE
,password varchar(255));


