CREATE DATABASE IF NOT EXISTS `PVFAST`;
USE `PVFAST`
CREATE TABLE IF NOT EXISTS `Enseignants`
(
    `MatriculeEn` VARCHAR(6) NOT NULL,
    `NomEn` VARCHAR(20) NOT NULL,
    `PrenomEn` VARCHAR(20) NOT NULL,
    `Grade` VARCHAR(20) NOT NULL,
    PRIMARY KEY(`MatriculeEn`),
    FOREIGN KEY(`MatriculeEn`) REFERENCES `Matieres` (`CodeMatiere`)
);
CREATE TABLE IF NOT EXISTS `Matieres`
(
    `CodeMatiere` VARCHAR(10) NOT NULL,
    `NomMatiere` VARCHAR(20) NOT NULL,
    PRIMARY KEY(`CodeMatiere`)
);
CREATE TABLE IF NOT EXISTS `Etudiants`
(
    `MatriculeE` SMALLINT(6) NOT NULL,
    `NomE` VARCHAR(20) NOT NULL,
    `PrenomE` VARCHAR(20) NOT NULL,
    `DateLieuNaiss` VARCHAR(50) NOT NULL,
    `Nivaux` VARCHAR(10) NOT NULL,
    `Annee` DATE NOT NULL,
    `Note` FLOAT(4) NOT NULL,
    PRIMARY KEY(`MatriculeE`)
);
CREATE TABLE IF NOT EXISTS `Agents`
(
    `IdAgent` SMALLINT(6) NOT NULL,
    `NomAg` VARCHAR(20) NOT NULL,
    `PrenomAg` VARCHAR(20) NOT NULL,
    PRIMARY KEY(`IdAgent`)
);
CREATE TABLE IF NOT EXISTS `Periode`
(
    `Annee` DATA NOT NULL,
    PRIMARY KEY(`Annee`)
);
CREATE TABLE IF NOT EXISTS `Evenement`
(
    Titre VARCHAR(20) NOT NULL,
    DateE DATE NOT NULL,
    PRIMARY KEY(`Titre`)
);
CREATE TABLE IF NOT EXISTS `Mot_de_passe`
(
    `Mot_de_passe` VARCHAR(20),
    PRIMARY KEY(`Mot_de_passe`)
)
CREATE TABLE IF NOT EXISTS `Connexion`
(
    `DateC` DATE NOT NULL
)