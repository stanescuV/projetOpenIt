CREATE DATABASE IF NOT EXISTS openit;

USE openit;

CREATE TABLE user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE movie (
  "id" int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  "user_id" int NOT NULL,
  "title" varchar(200) NOT NULL,
  "favorie" boolean
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
COMMIT;

