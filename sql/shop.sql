create database shop;
use shop;
create table admins(id int unsigned primary key auto_increment,name varchar(255),email varchar(255) not null unique,
password varchar(255),created_at timestamp default current_timestamp,updated_at timestamp default current_timestamp on update current_timestamp);
create table users(id int unsigned primary key auto_increment,name varchar(255),email varchar(255) not null unique,
password varchar(255),created_at timestamp default current_timestamp,updated_at timestamp default current_timestamp on update current_timestamp);
create table categories(id int unsigned primary key auto_increment,name varchar(255) not null unique,created_at timestamp default current_timestamp,updated_at timestamp default current_timestamp on update current_timestamp);
create table products(id int unsigned primary key auto_increment,name varchar(255) not null unique,price decimal(5,2),stock int,discription text,
user_id int (11) UNSIGNED NOT NULL,category_id int (11) UNSIGNED NOT NULL,
foreign key (user_id) references users(id),foreign key (category_id) references categories (id),created_at timestamp default current_timestamp,updated_at timestamp default current_timestamp on update current_timestamp);
insert into admins(name,email,password) values("admin","admin@gmail.com",'827ccb0eea8a706c4c34a16891f84e7b');