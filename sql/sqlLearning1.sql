use loginapp;
CREATE table posts (id INT(11) UNSIGNED PRIMARY KEY AUTO_INCREMENT,title VARCHAR(255),content text,user_id int (11) 
,foreign key (user_id) references users(ID));
