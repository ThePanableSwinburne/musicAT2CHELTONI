DROP DATABASE IF EXISTS `HARDWARE`;
CREATE DATABASE `HARDWARE`;
USE HARDWARE;

DROP TABLE IF EXISTS `RAM`, `STORAGE`, `DISPLAY`, `GPU`;

CREATE TABLE MEMORY (
    id INT AUTO_INCREMENT PRIMARY KEY,
    `brand` VARCHAR(255) NOT NULL,
    `memory_type` VARCHAR(255) NOT NULL,
    `capacity` VARCHAR(255) NOT NULL,
    `price` INT NOT NULL
);

CREATE TABLE STORAGE (
    id INT AUTO_INCREMENT PRIMARY KEY,
    `brand` VARCHAR(255) NOT NULL,
    `storage_type` VARCHAR(255) NOT NULL,
    `capacity` VARCHAR(255) NOT NULL,
    `price` INT NOT NULL
);

CREATE TABLE DISPLAY (
    id INT AUTO_INCREMENT PRIMARY KEY,
    `brand` VARCHAR(255) NOT NULL,
    `refresh_rate` VARCHAR(255) NOT NULL,
    `size` VARCHAR(255) NOT NULL,
    `price` INT NOT NULL
);

CREATE TABLE GPU (
    id INT AUTO_INCREMENT PRIMARY KEY,
    `brand` VARCHAR(255) NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `price` INT NOT NULL
);

INSERT INTO MEMORY (`brand`, `memory_type`, `capacity`, `price`)
VALUES
    ('Brand A', 'DDR4', '8GB', 100),
    ('Brand B', 'DDR3', '16GB', 150),
    ('Brand C', 'DDR4', '32GB', 250);

INSERT INTO STORAGE (`brand`, `storage_type`, `capacity`, `price`)
VALUES
    ('Brand A', 'SSD', '256GB', 80),
    ('Brand B', 'HDD', '1TB', 60),
    ('Brand C', 'SSD', '512GB', 120);

INSERT INTO DISPLAY (`brand`, `refresh_rate`, `size`, `price`)
VALUES
    ('Brand A', '60Hz', '24 inches', 200),
    ('Brand B', '144Hz', '27 inches', 300),
    ('Brand C', '240Hz', '32 inches', 400);

INSERT INTO GPU (`brand`, `name`, `price`)
VALUES
    ('Brand A', 'GPU A', 500),
    ('Brand B', 'GPU B', 600),
    ('Brand C', 'GPU C', 700);
