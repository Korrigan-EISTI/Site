-- lama.`user` definition
SET FOREIGN_KEY_CHECKS = 0;
DROP TABLE IF EXISTS User;
DROP TABLE IF EXISTS Post;
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
INSERT INTO `User` (user_id,name,email,password) VALUES ("lama","lama","lama@lama.com","lama");
INSERT INTO `Post` (user_id,`date`,message) VALUES ("lama",CAST( CURDATE() AS Date ),"hello world");
INSERT INTO `Post` (user_id,`date`,message) VALUES ("lama",CAST( CURDATE() AS Date ),"hello world");
INSERT INTO `Post` (user_id,`date`,message,parent_id) VALUES ("lama",CAST( CURDATE() AS Date ),"hello world",1);
INSERT INTO `Post` (user_id,`date`,message,parent_id) VALUES ("lama",CAST( CURDATE() AS Date ),"hello world",2);