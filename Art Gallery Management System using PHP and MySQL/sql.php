CREATE DATABASE art_gallery;

USE art_gallery;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL,
    role ENUM('admin', 'user') DEFAULT 'user'
);

CREATE TABLE artworks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    artist VARCHAR(100) NOT NULL,
    description TEXT,
    year INT,
    image VARCHAR(255),
    gallery_id INT,
    FOREIGN KEY (gallery_id) REFERENCES galleries(id)
);

CREATE TABLE galleries (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    location VARCHAR(255),
    description TEXT
);

CREATE TABLE exhibitions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    start_date DATE,
    end_date DATE,
    gallery_id INT,
    FOREIGN KEY (gallery_id) REFERENCES galleries(id)
);
