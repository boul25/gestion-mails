CREATE DATABASE IF NOT EXISTS gestion_contacts CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE gestion_contacts;

-- Table des utilisateurs (pour le login)
CREATE TABLE utilisateur (
    id_utilisateur INT AUTO_INCREMENT PRIMARY KEY,
    nom_utilisateur VARCHAR(100) NOT NULL,
    email_utilisateur VARCHAR(150) NOT NULL UNIQUE,
    password_utilisateur VARCHAR(255) NOT NULL
);

-- Table des secteurs (utilisée par les pros)
CREATE TABLE secteur (
    id_secteur INT AUTO_INCREMENT PRIMARY KEY,
    libelle_secteur VARCHAR(100) NOT NULL
);

-- Table des contacts professionnels
CREATE TABLE liste_pro (
    id_pro INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100),
    entreprise VARCHAR(100),
    email VARCHAR(150) UNIQUE,
    fonction VARCHAR(100),
    telephone VARCHAR(50),
    id_secteur INT,
    FOREIGN KEY (id_secteur) REFERENCES secteur(id_secteur)
);

-- Table des contacts particuliers
CREATE TABLE particulier (
    id_particulier INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100),
    email VARCHAR(150) UNIQUE,
    telephone VARCHAR(50)
);
