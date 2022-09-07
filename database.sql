DROP DATABASE IF EXISTS DoomWiki;
CREATE DATABASE DoomWiki;
USE DoomWiki;
DROP TABLE IF EXISTS topics;
DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS blackList;
DROP TABLE IF EXISTS comments;
DROP TABLE IF EXISTS helpRequests;
CREATE TABLE users(
  fst_mail varchar(256) PRIMARY KEY,
  user_name varchar(256) NOT NULL,
  psw varchar(256) NOT NULL,
  lst_psw_change date NOT NULL,
  sign_in_date date NOT NULL,
  scnd_mail varchar(256),
  role ENUM('admin', 'mod', 'default') DEFAULT 'default',
  profile_pic int DEFAULT '0',
  SessID varchar(256)
);
CREATE TABLE blackList(
  fst_mail varchar(256) PRIMARY KEY,
  ban_date date,
  ban_reason text
);
CREATE TABLE topics(
  id int AUTO_INCREMENT PRIMARY KEY,
  title varchar(256) NOT NULL,
  description text,
  creation_date date NOT NULL,
  state ENUM('Pending', 'Approved', 'Rejected') DEFAULT 'Pending',
  rejectReason text,
  modified_date date DEFAULT NULL,
  email varchar(256),
  FOREIGN KEY(email) REFERENCES users(fst_mail)
  ON DELETE SET NULL
  ON UPDATE CASCADE
);
CREATE TABLE comments(
  id int AUTO_INCREMENT PRIMARY KEY,
  commentBody text,
  writeDate date,
  topicID int,
  email varchar(256),
  state enum('Default', 'Modified', 'Deleted') DEFAULT 'Default',
  FOREIGN KEY(email) REFERENCES users(fst_mail)
  ON DELETE SET NULL
  ON UPDATE CASCADE,
  FOREIGN KEY(topicID) REFERENCES topics(id)
  ON DELETE SET NULL
  ON UPDATE CASCADE
);
CREATE TABLE helpRequests(
  id int AUTO_INCREMENT PRIMARY KEY,
  requestBody text NOT NULL,
  requestDate date NOT NULL,
  requestMod varchar(256) DEFAULT NULL,
  requestEmail varchar(256) NOT NULL,
  requestState ENUM('Pending', 'WorkingOn', 'Resolved') DEFAULT 'Pending'
);
INSERT INTO users(fst_mail, user_name, psw, lst_psw_change, sign_in_date, scnd_mail, role, profile_pic) VALUES(
  'admin@studenti.unipd.it', 'admin', '$2y$10$YaRydub8fwN9YdFI2cm5f.Q19YUURLZroxRVrs69Fx7EedSvvTGYe', '2022-01-01', '2022-01-01', NULL, 'admin', 1
);
INSERT INTO users(fst_mail, user_name, psw, lst_psw_change, sign_in_date, scnd_mail, role, profile_pic) VALUES(
  'mod@studenti.unipd.it', 'mod', '$2y$10$EyDf08P9xwprGAFxgdz5J.WCDmK4jIubQ6JqoPVKrpF0d7VOOez56', '2022-01-01', '2022-01-01', NULL, 'mod', 1
);
INSERT INTO users(fst_mail, user_name, psw, lst_psw_change, sign_in_date, scnd_mail, role, profile_pic) VALUES(
  'utente@studenti.unipd.it', 'Mario', '$2y$10$EyDf08P9xwprGAFxgdz5J.WCDmK4jIubQ6JqoPVKrpF0d7VOOez56', '2022-01-01', '2022-01-01', NULL, 'default', 1
);
INSERT INTO users(fst_mail, user_name, psw, lst_psw_change, sign_in_date, scnd_mail, role, profile_pic) VALUES(
  'utente1@studenti.unipd.it', 'Luca', '$2y$10$EyDf08P9xwprGAFxgdz5J.WCDmK4jIubQ6JqoPVKrpF0d7VOOez56', '2022-01-01', '2022-01-01', NULL, 'default', 1
);
INSERT INTO users(fst_mail, user_name, psw, lst_psw_change, sign_in_date, scnd_mail, role, profile_pic) VALUES(
  'utente2@studenti.unipd.it', 'Pietro', '$2y$10$EyDf08P9xwprGAFxgdz5J.WCDmK4jIubQ6JqoPVKrpF0d7VOOez56', '2022-01-01', '2022-01-01', NULL, 'default', 1
);
INSERT INTO users(fst_mail, user_name, psw, lst_psw_change, sign_in_date, scnd_mail, role, profile_pic) VALUES(
  'utente3@studenti.unipd.it', 'Roberto', '$2y$10$EyDf08P9xwprGAFxgdz5J.WCDmK4jIubQ6JqoPVKrpF0d7VOOez56', '2022-01-01', '2022-01-01', NULL, 'default', 1
);

INSERT INTO topics(title, description, creation_date, email) VALUES('Quanto spazio di archiviazione è richiesto su Nintendo Switch?', 'Con il lancio di DOOM Eternal: The Ancient Gods - Part Two il 26 agosto, tutti i possessori di Nintendo Switch di DOOM Eternal o The Ancient Gods - Part One du quanti giga avranno bisogno?', '2000-01-01', 'utente1@studenti.unipd.it');
INSERT INTO topics(title, description, creation_date, email) VALUES('E'' normale che, tempo 30 secondi dall''inizio della campagna, la ventola inizi a tentare il decollo?', 'Il rumore che fa la PS4 è preoccupante. Mai fatto così.', '2000-01-01', 'utente@studenti.unipd.it');
