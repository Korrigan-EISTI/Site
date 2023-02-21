-- lama.`user` definition
DROP TABLE IF EXISTS user;
CREATE TABLE `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (id)
);
INSERT INTO user (email,password) VALUES ("lama@lama.com","lama");
SELECT id FROM user WHERE "lama@lama.com" = user.email AND "lama"=user.password;