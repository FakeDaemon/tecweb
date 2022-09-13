USE jangeli;
DROP TABLE IF EXISTS topics;
DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS blackList;
DROP TABLE IF EXISTS comments;
DROP TABLE IF EXISTS helpRequests;
CREATE TABLE users(
  fst_mail varchar(256) PRIMARY KEY,
  user_name varchar(256) NOT NULL,
  psw varchar(256) NOT NULL,
  lst_psw_change datetime NOT NULL,
  sign_in_date datetime NOT NULL,
  scnd_mail varchar(256),
  role ENUM('admin', 'mod', 'default') DEFAULT 'default',
  profile_pic int DEFAULT '0',
  SessID varchar(256)
);
CREATE TABLE blackList(
  fst_mail varchar(256) PRIMARY KEY,
  ban_date datetime,
  ban_reason text
);
CREATE TABLE topics(
  id int AUTO_INCREMENT PRIMARY KEY,
  title varchar(256) NOT NULL,
  description text,
  creation_date datetime NOT NULL,
  state ENUM('Pending', 'Approved', 'Rejected') DEFAULT 'Pending',
  rejectReason text,
  modified_date datetime DEFAULT NULL,
  email varchar(256),
  FOREIGN KEY(email) REFERENCES users(fst_mail)
  ON DELETE SET NULL
  ON UPDATE CASCADE
);
CREATE TABLE comments(
  id int AUTO_INCREMENT PRIMARY KEY,
  commentBody text,
  writeDate datetime,
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
  requestDate datetime NOT NULL,
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
  'utente@studenti.unipd.it', 'Mario', '$2y$10$x95CiC/uCJS3BjM87lzOOu4fCKiiwZD5UzhfP77hOYFdDnwNKVumm', '2022-01-01', '2022-01-01', NULL, 'default', 1
);
INSERT INTO users(fst_mail, user_name, psw, lst_psw_change, sign_in_date, scnd_mail, role, profile_pic) VALUES(
  'utente1@studenti.unipd.it', 'Luca', '$2y$10$x95CiC/uCJS3BjM87lzOOu4fCKiiwZD5UzhfP77hOYFdDnwNKVumm', '2022-01-01', '2022-01-01', NULL, 'default', 1
);
INSERT INTO users(fst_mail, user_name, psw, lst_psw_change, sign_in_date, scnd_mail, role, profile_pic) VALUES(
  'utente2@studenti.unipd.it', 'Pietro', '$2y$10$x95CiC/uCJS3BjM87lzOOu4fCKiiwZD5UzhfP77hOYFdDnwNKVumm', '2022-01-01', '2022-01-01', NULL, 'default', 1
);
INSERT INTO users(fst_mail, user_name, psw, lst_psw_change, sign_in_date, scnd_mail, role, profile_pic) VALUES(
  'utente3@studenti.unipd.it', 'Roberto', '$2y$10$x95CiC/uCJS3BjM87lzOOu4fCKiiwZD5UzhfP77hOYFdDnwNKVumm', '2022-01-01', '2022-01-01', NULL, 'default', 1
);

INSERT INTO topics(title, description, creation_date, email) VALUES('Quanto spazio di archiviazione è richiesto su Nintendo Switch?', 'Con il lancio di DOOM Eternal: The Ancient Gods - Part Two il 26 agosto, tutti i possessori di Nintendo Switch di DOOM Eternal o The Ancient Gods - Part One du quanti giga avranno bisogno?', '2022-09-13 14:20:10', 'utente1@studenti.unipd.it');
INSERT INTO topics(title, description, creation_date, email) VALUES('E'' normale che, tempo 30 secondi dall''inizio della campagna, la ventola inizi a tentare il decollo?', 'Il rumore che fa la PS4 è preoccupante. Mai fatto così.', '2022-09-13 09:12:10', 'utente@studenti.unipd.it');
INSERT INTO topics(title, description, creation_date, email) VALUES('Cambiare difficoltà in game su DOOM?', 'E'' possibile? se si, come farlo? grazie', '2022-09-13 15:40:10', 'utente3@studenti.unipd.it');

-- TOPIC 1
INSERT INTO comments(commentBody, writeDate, topicID, email) VALUES('Ci sto giocando e dopo un 15 minuti circa ha smesso di fare quel rumore infernale.', '2022-09-13 15:41:15', 2, 'utente2@studenti.unipd.it');
INSERT INTO comments(commentBody, writeDate, topicID, email) VALUES('Io ho la slim ed è silenziosa, cmq sia ho risolto il surriscaldamento cambiando pad e pasta termica', '2022-09-13 15:42:15', 2, 'utente3@studenti.unipd.it');
-- TOPIC 2
INSERT INTO comments(commentBody, writeDate, topicID, email) VALUES('mi sembra di si, ma non ricordo (l''ho giocato 3 anni fa)', '2022-09-13 15:41:15', 3, 'utente2@studenti.unipd.it');
INSERT INTO comments(commentBody, writeDate, topicID, email) VALUES('Normalmente si può fare in game nelle opzioni, ma se hai impostato come difficoltà Incubo o Ultra Incubo allora non puoi, è bloccata lì.', '2022-09-13 15:42:15', 3, 'utente1@studenti.unipd.it');
INSERT INTO comments(commentBody, writeDate, topicID, email) VALUES('ieri notte son diventato matto...ho scelto un livello troppo tosto e dopo 5 ore complessive me ne pento..di ricominciarlo da capo sia mai! magari si può cambiare la difficoltà ma non ho trovato nulla...boh (sara'' che l''accendo di notte e qualcosa mi e'' sfuggita nelle impostazioni)', '2022-09-13 15:45:15', 3, 'utente@studenti.unipd.it');
