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

INSERT INTO `User` (user_id,name,email,password) VALUES ("lama","lama","lama@lama.com","$2y$10$pIP4MJC9PqRhxJkG8TlnPeG2wJCL/6793xByLlJa3.rNXAHaITPvm");
INSERT INTO `User` (user_id,name,email,password) VALUES ("car_lover","Clement","car_lover@car_lover.com","$2y$10$knCM7t3NFH36AFApMpOfoe5jzs2M7guhQ/Aac8HBt/aElmxjljwy2");
INSERT INTO `User` (user_id,name,email,password) VALUES ("code_master","Joan","code_master@code_master.com","$2y$10$f0vJqHJZnge0hz/KnmNiFeCvPCgR8xAdePW2PConubZnuy8JWCID2");
INSERT INTO `User` (user_id,name,email,password) VALUES ("fabinou69","FabinouLeLapinou","fabinou69@fabinou69.com","$2y$10$YEcmk8tz5SU6LYkPpEBkd.s3d1/nIVi/g6iZmVDmKztgkIqDhm5f.");
INSERT INTO `User` (user_id,name,email,password) VALUES ("ugo","Ugo","ugo@ugo.com","$2y$10$BiGyhD1ghTx2K/aiEBqwVOHWQQ1YOdS1gk96obqRVBA9.VY8A8ij6");
INSERT INTO `User` (user_id,name,email,password) VALUES ("sinol", "Louis-Alexandre", "la.laguet95@gmail.com", "$2y$10$r.BAWR4gHJWztB5DuUNVJOUCZ1vuY6t6scLpaaV.tzqUxXs//gwPu");
INSERT INTO `User` (user_id,name,email,password) VALUES ("OUI", "OUI", "OUI", "$2y$10$YFSfptdNrEoLxZi2HRFpjex5ZNDhE3zFG6nGBYlFpOw/l9.j5rQ.a");
INSERT INTO `Post` (user_id,`date`,message) VALUES ("lama",CAST( CURDATE() AS Date ),"hello world");
INSERT INTO `Post` (user_id,`date`,message) VALUES ("lama",CAST( CURDATE() AS Date ),"hello world");
INSERT INTO `Post` (user_id,`date`,message,parent_id) VALUES ("lama",CAST( CURDATE() AS Date ),"hello world",1);
INSERT INTO `Post` (user_id,`date`,message,parent_id) VALUES ("lama",CAST( CURDATE() AS Date ),"hello world",2);
INSERT INTO `Post` (user_id, `date`, message, parent_id) VALUES ("ugo", CAST(CURDATE()AS Date), "'jaime la bite', Jeanne 2023",1);
INSERT INTO `Friends` (user_id_1, user_id_2) VALUES ("fabinou69", "lama");
INSERT INTO `Friends` (user_id_1, user_id_2) VALUES ("lama", "code_master");
INSERT INTO `Friends` (user_id_1, user_id_2) VALUES ("lama", "ugo");
