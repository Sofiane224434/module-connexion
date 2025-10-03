-- Créer la Database--
CREATE DATABASE moduleconnexion;

-- Créer une table utilisateur--
CREATE TABLE utilisateurs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255),
    username VARCHAR(255),
	nom VARCHAR(255),
	prenom VARCHAR(255),
    password VARCHAR(255));

--Créer le premier utilisateur (admin)--
INSERT INTO utilisateurs(email, username, nom, prenom, password)
VALUES ("admin","admin","admin","admin","admin");

-- Ajouter des contraintes d'unicité sur les colonnes email et username --
ALTER TABLE utilisateurs
ADD UNIQUE(email),
ADD UNIQUE (username)