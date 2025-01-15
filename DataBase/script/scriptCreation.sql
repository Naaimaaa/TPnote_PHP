-- create new schema
create database if not exists TP_PHP;
use TP_PHP;

-- Script de création de la base de données
DROP TABLE IF EXISTS PARTICIPER;
DROP TABLE IF EXISTS UTILISATEUR;
DROP TABLE IF EXISTS COMPOSER;
DROP TABLE IF EXISTS ASSOCIER;
DROP TABLE IF EXISTS REPONSE;
DROP TABLE IF EXISTS QUESTION;
DROP TABLE IF EXISTS QUIZ;

CREATE TABLE UTILISATEUR(
    EMAILU VARCHAR(50) PRIMARY KEY NOT NULL,
    PASSWRD VARCHAR(15),
    NOMU VARCHAR(15),
    PRENOMU VARCHAR(15)
);

CREATE TABLE QUIZ(
    IDQUIZ INT PRIMARY KEY AUTO_INCREMENT,
    NOMQUIZ VARCHAR(30)
);

CREATE TABLE PARTICIPER(
    EMAILU VARCHAR(50) NOT NULL,
    IDQUIZ INT,
    POINTS INT,
    DATEPART DATETIME,
    PRIMARY KEY (EMAILU, IDQUIZ, DATEPART)
);

CREATE TABLE QUESTION(
    NUMQ INT PRIMARY KEY AUTO_INCREMENT,
    INTITULE VARCHAR(100)
);

CREATE TABLE COMPOSER(
    NUMQ INT,
    IDQUIZ INT,
    PRIMARY KEY (NUMQ, IDQUIZ)
);

CREATE TABLE REPONSE(
    NUMR INT PRIMARY KEY AUTO_INCREMENT,
    LIBELLE VARCHAR(30)
);

CREATE TABLE ASSOCIER(
    NUMR INT,
    NUMQ INT,
    CORRECTE BOOLEAN DEFAULT FALSE,
    PRIMARY KEY (NUMQ, NUMR)
);


-- Clés étrangères
ALTER TABLE PARTICIPER ADD FOREIGN KEY (EMAILU) REFERENCES UTILISATEUR(EMAILU);
ALTER TABLE PARTICIPER ADD FOREIGN KEY (IDQUIZ) REFERENCES QUIZ(IDQUIZ);

ALTER TABLE COMPOSER ADD FOREIGN KEY (IDQUIZ) REFERENCES QUIZ(IDQUIZ);
ALTER TABLE COMPOSER ADD FOREIGN KEY (NUMQ) REFERENCES QUESTION(NUMQ);

ALTER TABLE ASSOCIER ADD FOREIGN KEY (NUMQ) REFERENCES QUESTION(NUMQ);
ALTER TABLE ASSOCIER ADD FOREIGN KEY (NUMR) REFERENCES REPONSE(NUMR);
