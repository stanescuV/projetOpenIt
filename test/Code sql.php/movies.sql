CREATE TABLE "movies" (
  "id" int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  "user_id" int NOT NULL,
  "title" varchar(200) NOT NULL,
  "favorie" boolean
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
COMMIT;
