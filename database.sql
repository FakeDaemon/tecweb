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
  role ENUM('admin', 'mod', 'default'),
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
  'admin', 'admin', '$2y$10$YaRydub8fwN9YdFI2cm5f.Q19YUURLZroxRVrs69Fx7EedSvvTGYe', '2022-01-01', '2022-01-01', NULL, 'admin', 1
);
INSERT INTO users(fst_mail, user_name, psw, lst_psw_change, sign_in_date, scnd_mail, role, profile_pic) VALUES(
  'mod', 'mod', '$2y$10$EyDf08P9xwprGAFxgdz5J.WCDmK4jIubQ6JqoPVKrpF0d7VOOez56', '2022-01-01', '2022-01-01', NULL, 'mod', 1
);
INSERT INTO users(fst_mail, user_name, psw, lst_psw_change, sign_in_date, scnd_mail, role, profile_pic) VALUES(
  'mod1', 'mod', '$2y$10$EyDf08P9xwprGAFxgdz5J.WCDmK4jIubQ6JqoPVKrpF0d7VOOez56', '2022-01-01', '2022-01-01', NULL, 'mod', 1
);
INSERT INTO users(fst_mail, user_name, psw, lst_psw_change, sign_in_date, scnd_mail, role, profile_pic) VALUES(
  'mod2', 'mod', '$2y$10$EyDf08P9xwprGAFxgdz5J.WCDmK4jIubQ6JqoPVKrpF0d7VOOez56', '2022-01-01', '2022-01-01', NULL, 'mod', 1
);
INSERT INTO users(fst_mail, user_name, psw, lst_psw_change, sign_in_date, scnd_mail, role, profile_pic) VALUES(
  'mod3', 'mod', '$2y$10$EyDf08P9xwprGAFxgdz5J.WCDmK4jIubQ6JqoPVKrpF0d7VOOez56', '2022-01-01', '2022-01-01', NULL, 'mod', 1
);
INSERT INTO users(fst_mail, user_name, psw, lst_psw_change, sign_in_date, scnd_mail, role, profile_pic) VALUES(
  'user', 'user', '$2y$10$YaRydub8fwN9YdFI2cm5f.Q19YUURLZroxRVrs69Fx7EedSvvTGYe', '2022-01-01', '2022-01-01', NULL, 'default', 1
);
INSERT INTO users(fst_mail, user_name, psw, lst_psw_change, sign_in_date, scnd_mail, role, profile_pic) VALUES(
  'user1', 'user1', '$2y$10$YaRydub8fwN9YdFI2cm5f.Q19YUURLZroxRVrs69Fx7EedSvvTGYe', '2022-01-01', '2022-01-01', NULL, 'default', 1
);
INSERT INTO users(fst_mail, user_name, psw, lst_psw_change, sign_in_date, scnd_mail, role, profile_pic) VALUES(
  'user2', 'user2', '$2y$10$YaRydub8fwN9YdFI2cm5f.Q19YUURLZroxRVrs69Fx7EedSvvTGYe', '2022-01-01', '2022-01-01', NULL, 'default', 1
);
INSERT INTO users(fst_mail, user_name, psw, lst_psw_change, sign_in_date, scnd_mail, role, profile_pic) VALUES(
  'user3', 'user3', '$2y$10$YaRydub8fwN9YdFI2cm5f.Q19YUURLZroxRVrs69Fx7EedSvvTGYe', '2022-01-01', '2022-01-01', NULL, 'default', 1
);
INSERT INTO users(fst_mail, user_name, psw, lst_psw_change, sign_in_date, scnd_mail, role, profile_pic) VALUES(
  'user4', 'user4', '$2y$10$YaRydub8fwN9YdFI2cm5f.Q19YUURLZroxRVrs69Fx7EedSvvTGYe', '2022-01-01', '2022-01-01', NULL, 'default', 1
);
INSERT INTO topics(title, description, creation_date, email) VALUES('Quanto spazio di archiviazione è richiesto su Nintendo Switch?', 'Con il lancio di DOOM Eternal: The Ancient Gods - Part Two il 26 agosto, tutti i possessori di Nintendo Switch di DOOM Eternal o The Ancient Gods - Part One avranno bisogno di almeno 29 GB di spazio di archiviazione disponibile.', '2000-01-01', 'user1');
INSERT INTO topics(title, description, creation_date, email) VALUES('È necessaria una scheda di memoria per installare il titolo?', 'Per scaricare questo gioco è necessaria una scheda microSD (venduta separatamente) con spazio di archiviazione gratuito di almeno 11 GB, più 18 GB di memoria di sistema. I requisiti di archiviazione possono cambiare.', '2000-01-01', 'user2');
INSERT INTO topics(title, description, creation_date, email) VALUES('Posso continuare a giocare a DOOM Eternal senza scaricare l''ultima patch?', 'Sì, ai giocatori con un''installazione esistente verrà richiesto di applicare la patch, ma possono ignorare questo aggiornamento e continuare ad accedere alle funzionalità offline, inclusa la campagna. L''accesso a funzionalità online come BATTLEMODE richiederà ai giocatori di installare la patch.', '2000-01-01', 'user3');
INSERT INTO topics(title, description, creation_date, email) VALUES('Secondo voi il videogame può fungere da terapia psicologica al di fuori di droga, alcolici o sfoghi di violenza?', 'La mia adolescenza è stata costellata da momenti bellissimi e momenti brutti, uno tra questi che ricordo con più dolore e sofferenza era il bullo che avevo a scuola. Basso di statura e irruento con tutti, soprattutto con me che ero molto timido e introverso ai tempi. Dedicava la maggior parte del tempo a farmi sentire una merda con frasi del tipo:"IO SONO STUFO DI STARE CON GLI HANDICAPPATI DI MERDA DIOBOIA!!!", oppure quando cercavo di risolvere i problemi di un mio ex-amico lui aveva intervenuto con:"Ma sta zitto che non ti vuole nessuno..." da li ci eravamo anche presi un rapporto in seconda liceo. Tornavo sempre a casa con i pianti per queste cose visto che alcuni lo sostenevano e non avevo nessuno con cui parlarne. In 4 liceo scopriii doom per ps4 grazie a un negozio di videogames della mia città, lo misi nella mia ps4 appena presa da poco... E rimasi folgarato dalla violenza insana che conteneva, e tutti i nemici che vedevo li ricollegavo sempre a lui. Con il tempo sono riuscito a fregarmene di lui e non mi trattò più da schifo. La domanda che mi è sorta e che vi volevo chiedere è se davvero un media come questo che viene sempre messo sotto torchio da notiziari televisivi possa aiutare come valvola di sfogo e se a voi è successa una cosa simile? Io credo proprio di si^^!!', '2000-01-01', 'user3');
INSERT INTO topics(title, description, creation_date, email) VALUES('E'' normale che, tempo 30 secondi dall''inizio della campagna, la ventola inizi a tentare il decollo?', 'Il rumore che fa la PS4 è preoccupante. Mai fatto così.', '2000-01-01', 'user4');
INSERT INTO comments(commentBody, writeDate, topicID, email) VALUES('Allora si, purché non sfoci in una dipendenza ai videogiochi. Il mio ex era ed è dipendente dai videogiochi e si è rovinato completamente la vita da anni..... Quindi direi che il buon senso sempre serve, e il giocare ai videogiochi non può sostituire una psicoterapia...', '2000-01-01', 4, 'user1');
INSERT INTO comments(commentBody, writeDate, topicID, email) VALUES('Tutte le opere di fantasia, libri, film, videogiochi, eccetera sono pet tutti, tra i vari motivi, una valvola di sfogo. Penso anche che bisogna sapersi limitare, in quanto da semplice sfogo, svago o divertimento possono portare ad isolarsi. Autolimitarsi è la parola d’ordine.', '2000-01-01', 4, 'user2');
INSERT INTO comments(commentBody, writeDate, topicID, email) VALUES('Nope, i videogame potranno essere una valvola di sfogo ma non risolvono i problemi psicologici (e psichiatrici) di una persona. E dipende sempre dal grado di dipendenza e se si sa riconoscere, accettare e dividere la realtà e la finzione.', '2000-01-01', 4, 'user3');
INSERT INTO comments(commentBody, writeDate, topicID, email) VALUES('Idem. Situazione simile. Sono riuscita a fregarmene grazie alla PlayStation e sorpresa ...ho fatto un po'' di amici. Il segreto è non sembrare pesanti, e felici.Purtroppo non tutti sono disposti ad ascoltare la tua sofferenza, così giocare diventa un ottimo modo per distrarsi , e smettere di essere pesanti.', '2000-01-01', 4, 'user4');
