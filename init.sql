-- lama.`user` definition
DROP TABLE IF EXISTS user;
CREATE TABLE `user` (
  user_id varchar(50) PRIMARY KEY NOT NULL,
  name varchar(100) NOT NULL,
  email varchar(100) NOT NULL,
  password varchar(100) NOT NULL
);
DROP TABLE IF EXISTS post;
CREATE TABLE post (
  id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  user_id varchar(50) NOT NULL,
  `date` DATE NOT NULL,
  message varchar(200)
);
INSERT INTO `user` (user_id,name,email,password) VALUES ("lama","lama","lama@lama.com","lama");
INSERT INTO `user` (user_id,name,email,password) VALUES ("l","l","l@l.com","456");
INSERT INTO `post` (user_id,`date`,message) VALUES ("lama",CAST( CURDATE() AS Date ),"hello world");
SELECT user_id FROM `user` WHERE "lama@lama.com" = `user`.email AND "lama"=`user`.password;