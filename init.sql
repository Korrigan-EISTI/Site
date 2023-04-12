-- lama.`user` definition
SET FOREIGN_KEY_CHECKS = 0;
DROP TABLE IF EXISTS Post;
DROP TABLE IF EXISTS Friends;
DROP TABLE IF EXISTS User;
DROP TABLE IF EXISTS Request;
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
  user_id_1 varchar(50) NOT NULL,
  user_id_2 varchar(50) NOT NULL,
  PRIMARY KEY(user_id_1, user_id_2),
  FOREIGN KEY (user_id_1) REFERENCES User(user_id),
  FOREIGN KEY (user_id_2) REFERENCES User(user_id)
);

CREATE TABLE Request(
  user_id_1 varchar(50) NOT NULL,
  user_id_2 varchar(50) NOT NULL,
  PRIMARY KEY(user_id_1, user_id_2),
  FOREIGN KEY (user_id_1) REFERENCES User(user_id),
  FOREIGN KEY (user_id_2) REFERENCES User(user_id)
);

INSERT INTO `User` (user_id,name,email,password) VALUES ("lama","lama","lama@gmail.com","lama");
INSERT INTO `User` (user_id,name,email,password) VALUES ("car_lover","Clement","car_lover@gmail.com","car_lover");
INSERT INTO `User` (user_id,name,email,password) VALUES ("code_master","Joan Legrand","code_master@gmail.com","code_master");
INSERT INTO `User` (user_id,name,email,password) VALUES ("durag_man", "Adam le Motard", "durag_man@gmail.com", "durag_man");
INSERT INTO `User` (user_id,name,email,password) VALUES ("fabinou69","Fabinou le Lapinou","fabinou69@gmail.com","fabinou69");
INSERT INTO `User` (user_id,name,email,password) VALUES ("fuck_liza", "Aniss Hassan", "fuck_liza@gmail.com", "fuck_liza");
INSERT INTO `User` (user_id,name,email,password) VALUES ("jordan_goatier", "Jordan AKA 'Le Goat'", "jordan_goatier@gmail.com", "jordan_goatier");
INSERT INTO `User` (user_id,name,email,password) VALUES ("mr_president", "Lillian FELLOUH", "mr_president@gmail.com", "mr_president");
INSERT INTO `User` (user_id,name,email,password) VALUES ("sinol", "Louis-Alexandre", "la.laguet95@gmail.com", "sinol");
INSERT INTO `User` (user_id,name,email,password) VALUES ("sujeebioss", "SujeeBioss", "sujeebioss@gmail.com", "sujeebioss");
INSERT INTO `User` (user_id,name,email,password) VALUES ("ugo","Ugo","ugo@gmail.com","ugo");
INSERT INTO `User` (user_id,name,email,password) VALUES ("unicorn_princess123", "OUI", "unicorn_princess123@gmail.com", "unicorn_princess123");
INSERT INTO `Post` (user_id,`date`,message) VALUES ("lama",CAST( CURDATE() AS Date ),"Ceci est le premier post de ce magnifique site.");
INSERT INTO `Friends` (user_id_1, user_id_2) VALUES ("lama", "car_lover");
INSERT INTO `Friends` (user_id_1, user_id_2) VALUES ("lama", "code_master");
INSERT INTO `Friends` (user_id_1, user_id_2) VALUES ("lama", "durag_man");
INSERT INTO `Friends` (user_id_1, user_id_2) VALUES ("lama", "fabinou69");
INSERT INTO `Friends` (user_id_1, user_id_2) VALUES ("lama", "fuck_liza");
INSERT INTO `Friends` (user_id_1, user_id_2) VALUES ("lama", "jordan_goatier");
INSERT INTO `Friends` (user_id_1, user_id_2) VALUES ("lama", "mr_president");
INSERT INTO `Friends` (user_id_1, user_id_2) VALUES ("lama", "sinol");
INSERT INTO `Friends` (user_id_1, user_id_2) VALUES ("lama", "sujeebioss");
INSERT INTO `Friends` (user_id_1, user_id_2) VALUES ("lama", "ugo");
INSERT INTO `Friends` (user_id_1, user_id_2) VALUES ("lama", "unicorn_princess123");
