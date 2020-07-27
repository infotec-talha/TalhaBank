create database store;
use store;
create table users(id INT(11) UNSIGNED PRIMARY KEY AUTO_INCREMENT,name varchar(255)
,email varchar(255) NOT NULL UNIQUE
,password varchar(255));
CREATE table categories (id INT(11) UNSIGNED PRIMARY KEY AUTO_INCREMENT,name VARCHAR(255) NOT NULL UNIQUE,created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP);
create table products (id int unsigned primary key auto_increment,name varchar(255),discription text,
user_id int (11) UNSIGNED NOT NULL,category_id int (11) UNSIGNED NOT NULL,
foreign key (user_id) references users(id),foreign key (category_id) references categories (id));
