-- Créer la base de données
CREATE DATABASE banque;

-- Use the bank database
USE banque;

-- Créer la table Banque
CREATE TABLE Banque (
  id INT NOT NULL AUTO_INCREMENT,
  nom VARCHAR(255) NOT NULL,
  adresse VARCHAR(255) NOT NULL,
  code_postal VARCHAR(5) NOT NULL,
  ville VARCHAR(255) NOT NULL,
  PRIMARY KEY (id)
);

-- Créer la table Agence
CREATE TABLE Agence (
  id INT NOT NULL AUTO_INCREMENT,
  id_banque INT NOT NULL,
  nom VARCHAR(255) NOT NULL,
  adresse VARCHAR(255) NOT NULL,
  code_postal VARCHAR(5) NOT NULL,
  ville VARCHAR(255) NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (id_banque) REFERENCES Banque (id)
);

-- Créer la table Client
CREATE TABLE Client (
  id INT NOT NULL AUTO_INCREMENT,
  nom VARCHAR(255) NOT NULL,
  prénom VARCHAR(255) NOT NULL,
  date_naissance DATE NOT NULL,
  adresse VARCHAR(255) NOT NULL,
  code_postal VARCHAR(5) NOT NULL,
  ville VARCHAR(255) NOT NULL,
  téléphone VARCHAR(15) NOT NULL,
  e_mail VARCHAR(255) NOT NULL,
  id_agence INT NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (id_agence) REFERENCES Agence (id)
);

-- Créer la table Compte
CREATE TABLE Compte (
  id INT NOT NULL AUTO_INCREMENT,
  id_client INT NOT NULL,
  type VARCHAR(255) NOT NULL,
  solde DECIMAL(10,2) NOT NULL,
  date_ouverture DATE NOT NULL,
  date_fermeture DATE,
  PRIMARY KEY (id),
  FOREIGN KEY (id_client) REFERENCES Client (id)
);

-- Créer la table Ligne_compte
CREATE TABLE Ligne_compte (
  id INT NOT NULL AUTO_INCREMENT,
  id_compte INT NOT NULL,
  date DATE NOT NULL,
  montant DECIMAL(10,2) NOT NULL,
  type_transaction VARCHAR(255) NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (id_compte) REFERENCES Compte (id)
);


-- Créer la table Conseiller
CREATE TABLE Conseiller (
  id INT NOT NULL AUTO_INCREMENT,
  id_agence INT NOT NULL,
  nom VARCHAR(255) NOT NULL,
  prénom VARCHAR(255) NOT NULL,
  date_naissance DATE NOT NULL,
  adresse VARCHAR(255) NOT NULL,
  code_postal VARCHAR(5) NOT NULL,
  ville VARCHAR(255) NOT NULL,
  téléphone VARCHAR(15) NOT NULL,
  e_mail VARCHAR(255) NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (id_agence) REFERENCES Agence (id)
);


