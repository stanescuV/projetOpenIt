Installation et Manipulations

    Installation via Docker (Recommandée)

#### Étape 1 : Cloner le projet

Clonez le repository sur votre machine locale :
git clone https://votre-repository-url.git/
cd projetopenit

#### Étape 2 : 

Une fois le projet clone , on se rederige vers notre fichier Docker-compose :

on vérifie:   volumes:
      

    /c/Users/Dell/Desktop/PROJETOPENIT/mysql/data:/var/lib/mysql  (mettre le chemin de notre projet)
        ./mysql/init.sql:/docker-entrypoint-initdb.d/init.sql


puis on se rend sur notre fichier docker-compose , sur notre terminal :docker-compose up --build

Avant de lancer les services, assurez-vous que le port 8080 (ou tout autre port que vous utilisez) n'est pas déjà occupé par un autre serveur ou application. Si ce port est déjà utilisé, vous devrez ajuster le port dans le fichier docker-compose.yml pour éviter les conflits.

Une fois les conteneurs lancés et en cours d'exécution, ouvrez votre navigateur et accédez à l'application à l'adresse suivante :
http://localhost:8080/inscription.php

#### Étape 3 : 
Exécuter le Script SQL (init.sql)
Une fois que vous êtes sur l'interface de la base de données, vous pouvez exécuter le script init.sql pour initialiser les tables dans votre base de données.
Contenu de init.sql :
Création de la base de données openit :

CREATE DATABASE IF NOT EXISTS openit;
USE openit;
Création de la table user :

CREATE TABLE user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL
);
Création de la table movies :

CREATE TABLE movies (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    title VARCHAR(200) NOT NULL,
    favorie BOOLEAN
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
COMMIT;

