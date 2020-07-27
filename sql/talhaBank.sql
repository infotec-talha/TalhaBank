create database talhaBank;
use talhaBank;
create table person(id int(11) unsigned primary key auto_increment,full_name varchar(255),adress varchar(255),cnic varchar(25) not null unique);
create table accounts(account_number INT(11) unsigned primary key auto_increment,account_type text,total_amount INT unsigned,pincode smallint unsigned not null,person_id int(11)unsigned not null,foreign key (person_id) references person(id));
ALTER TABLE accounts AUTO_INCREMENT=123000001; 
create table users(id int(11) unsigned primary key auto_increment,user_name varchar(255)not null unique,password varchar(255),email varchar(50) not null unique,person_id int(11)unsigned not null,foreign key (person_id) references person(id));
create table role(id int(11) unsigned primary key auto_increment,role varchar(30));
create table permissions(id int(11) unsigned primary key auto_increment,permission varchar(30));
create table roles_permissions(role_id int(11)unsigned not null,foreign key (role_id) references role(id),permission_id int(11)unsigned not null,foreign key (permission_id) references permissions(id),user_id int(11)unsigned not null,foreign key (user_id) references users(id));
