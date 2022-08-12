DROP TABLE IF EXISTS topics;
DROP TABLE IF EXISTS users;
CREATE TABLE users(
  fst_mail varchar(256) PRIMARY KEY,
  user_name varchar(256) NOT NULL,
  psw varchar(256) NOT NULL,
  lst_psw_change date NOT NULL,
  sign_in_date date NOT NULL,
  scnd_mail varchar(256),
  role ENUM('admin', 'mod', 'default'),
  profile_pic int DEFAULT '0'
);
CREATE TABLE topics(
     id int AUTO_INCREMENT PRIMARY KEY,
     title varchar(256) NOT NULL,
     description text,
     creation_date date NOT NULL,
     closed_date date,
     status ENUM('open','closed','discussion') NOT NULL,
     email varchar(256),
     FOREIGN KEY(email) REFERENCES users(fst_mail)
);
