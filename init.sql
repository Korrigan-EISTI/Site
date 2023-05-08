-- lama.`user` definition
SET FOREIGN_KEY_CHECKS = 0;
DROP TABLE IF EXISTS Post;
DROP TABLE IF EXISTS Message;
DROP TABLE IF EXISTS Request;
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
  message TEXT,
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

CREATE TABLE Message (
  id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  user_id_1 varchar(50) NOT NULL,
  user_id_2 varchar(50) NOT NULL,
  `date` DATE NOT NULL,
  message TEXT,
  FOREIGN KEY (user_id_1) REFERENCES User(user_id),
  FOREIGN KEY (user_id_2) REFERENCES User(user_id)
);
INSERT INTO `User` (user_id,name,email,password) VALUES ("lama","lama","lama@gmail.com","$2y$10$ycEXe8Yh6G2dmqNqO1pJt.IRFRsuaCvOcaZpi5gVWM/MJGKgaTiGS");
INSERT INTO `User` (user_id,name,email,password) VALUES ("car_lover","Clement","car_lover@gmail.com","$2y$10$Q4p1VPO1HRNp86leHs9nk.Fzv7rZFDwzHlaZ0RpK6VMFhNNcP9dA6");
INSERT INTO `User` (user_id,name,email,password) VALUES ("code_master","Joan Legrand","code_master@gmail.com","$2y$10$iAEN10I0Lldus6GO94kYNORGEYEwj2BXF/ew1CkiROzznksLI7R/m");
INSERT INTO `User` (user_id,name,email,password) VALUES ("durag_man", "Adam le Motard", "durag_man@gmail.com", "$2y$10$AJro5LxNjD/5F6.Iq6V5AupDSHtaw5/sVkswMbSgBy.IMPNohaGRS");
INSERT INTO `User` (user_id,name,email,password) VALUES ("fabinou69","Fabinou le Lapinou","fabinou69@gmail.com","$2y$10$TzZVOqYeHAuP76vALijFH.8KDOKgHWMVr9VLiL1gR/ZVlv1H9f2Sy");
INSERT INTO `User` (user_id,name,email,password) VALUES ("fuck_liza", "Aniss Hassan", "fuck_liza@gmail.com", "$2y$10$C7hPGG2bHT6fum94HueH/e7ifzRBYKOW86a.CCAeNmRt9utlnTem2");
INSERT INTO `User` (user_id,name,email,password) VALUES ("jordan_goatier", "Jordan AKA 'Le Goat'", "jordan_goatier@gmail.com", "$2y$10$Taq9rDntjg.3LO8PvvAuAeQjMcr5F.Mlprl9EbtCCZKBQbxONsiqe");
INSERT INTO `User` (user_id,name,email,password) VALUES ("mr_president", "Lillian FELLOUH", "mr_president@gmail.com", "$2y$10$mKn3RdYnw2hk0EXGBeHXiumz37hzOcLdQVajoQhqjEjSqPiUnOoA6");
INSERT INTO `User` (user_id,name,email,password) VALUES ("sinol", "Louis-Alexandre", "la.laguet95@gmail.com", "$2y$10$XJaxoy8oa1bcyRD2DHx65Og.yP4BQLl3IsQv.Mf8k3nTSrCp.Nb8G");
INSERT INTO `User` (user_id,name,email,password) VALUES ("sujeebioss", "SujeeBioss", "sujeebioss@gmail.com", "$2y$10$nztIZuQJECfQFHiVrOiUZu0ak97zQsvAm524LE8wp1W8P1bxPpo02");
INSERT INTO `User` (user_id,name,email,password) VALUES ("ugo_merlier","Ugo","ugo@gmail.com","$2y$10$LulQRaZTHcdU7SJwGMIuAOQHWDY3R1MF7gRSYZHRTgt4Itb7pq1u2");
INSERT INTO `User` (user_id,name,email,password) VALUES ("unicorn_princess123", "OUI", "unicorn_princess123@gmail.com", "$2y$10$f4AdR7VogeH/srK2prZrl.Nnp7Awb0PH8OXQnvRDBhzNDVHrcJSKy");
INSERT INTO `Post` (user_id,`date`,message) VALUES ("lama",CAST( CURDATE() AS Date ),"Ceci est le premier post de ce magnifique site.");
INSERT INTO `Message` (user_id_1,user_id_2,`date`,message) VALUES ("lama","ugo_merlier",CAST( CURDATE() AS Date ),"Salut Ugo MERLIER !");
INSERT INTO `Message` (user_id_1,user_id_2,`date`,message) VALUES ("ugo","lama",CAST( CURDATE() AS Date ),"Salut Lama ! Tu vas bien ?");
INSERT INTO `Message` (user_id_1,user_id_2,`date`,message) VALUES ("lama","ugo_merlier",CAST( CURDATE() AS Date ),"Je vais très bien et toi ?");
INSERT INTO `Message` (user_id_1,user_id_2,`date`,message) VALUES ("ugo","lama",CAST( CURDATE() AS Date ),"Super !");
INSERT INTO `Friends` (user_id_1, user_id_2) VALUES ("lama", "car_lover");
INSERT INTO `Friends` (user_id_1, user_id_2) VALUES ("lama", "code_master");
INSERT INTO `Friends` (user_id_1, user_id_2) VALUES ("lama", "durag_man");
INSERT INTO `Friends` (user_id_1, user_id_2) VALUES ("lama", "fabinou69");
INSERT INTO `Friends` (user_id_1, user_id_2) VALUES ("lama", "fuck_liza");
INSERT INTO `Friends` (user_id_1, user_id_2) VALUES ("lama", "jordan_goatier");
INSERT INTO `Friends` (user_id_1, user_id_2) VALUES ("lama", "mr_president");
INSERT INTO `Friends` (user_id_1, user_id_2) VALUES ("lama", "sinol");
INSERT INTO `Friends` (user_id_1, user_id_2) VALUES ("lama", "sujeebioss");
INSERT INTO `Friends` (user_id_1, user_id_2) VALUES ("lama", "ugo_merlier");
INSERT INTO `Friends` (user_id_1, user_id_2) VALUES ("lama", "unicorn_princess123");
