-- lama.`user` definition
SET FOREIGN_KEY_CHECKS = 0;
DROP TABLE IF EXISTS Post;
DROP TABLE IF EXISTS Friends;
DROP TABLE IF EXISTS User;
SET FOREIGN_KEY_CHECKS = 1;

CREATE TABLE `User` (
  user_id varchar(50) PRIMARY KEY NOT NULL,
  name varchar(100) NOT NULL,
  email varchar(100) NOT NULL,
  password varchar(100) NOT NULL
);
CREATE TABLE Post (
  id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  user_id varchar(50) NOT NULL,
  `date` DATE NOT NULL,
  message varchar(200),
  parent_id INT,
  FOREIGN KEY (user_id) REFERENCES User(user_id)
);

CREATE TABLE Friends(
  user_id varchar(50) NOT NULL,
  friend_id varchar(50) NOT NULL,
  friend_name varchar(100) NOT NULL, 
  PRIMARY KEY(user_id, friend_id),
  FOREIGN KEY (user_id) REFERENCES User(user_id),
  FOREIGN KEY (friend_id) REFERENCES User(user_id),
  FOREIGN KEY (friend_name) REFERENCES User(name)
);

INSERT INTO `User` (user_id,name,email,password) VALUES ("lama","lama","lama@lama.com","lama");
INSERT INTO `User` (user_id,name,email,password) VALUES ("car_lover","Clement","car_lover@car_lover.com","car_lover");
INSERT INTO `User` (user_id,name,email,password) VALUES ("code_master","Joan","code_master@code_master.com","code_master");
INSERT INTO `User` (user_id,name,email,password) VALUES ("ugo","Ugo","ugo@ugo.com","ugo");
INSERT INTO `Post` (user_id,`date`,message) VALUES ("lama",CAST( CURDATE() AS Date ),"hello world");
INSERT INTO `Post` (user_id,`date`,message) VALUES ("lama",CAST( CURDATE() AS Date ),"hello world");
INSERT INTO `Post` (user_id,`date`,message,parent_id) VALUES ("lama",CAST( CURDATE() AS Date ),"hello world",1);
INSERT INTO `Post` (user_id,`date`,message,parent_id) VALUES ("lama",CAST( CURDATE() AS Date ),"hello world",2);
INSERT INTO `Friends` (user_id, friend_id, friend_name) VALUES ("lama", "car_lover", "Clement");
INSERT INTO `Friends` (user_id, friend_id, friend_name) VALUES ("lama", "code_master", "Joan");
INSERT INTO `Friends` (user_id, friend_id, friend_name) VALUES ("lama", "ugo", "Ugo");
