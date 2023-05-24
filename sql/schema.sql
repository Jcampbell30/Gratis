CREATE DATABASE gratis_db;
use gratis_db;
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


CREATE TABLE cars (
    id INT AUTO_INCREMENT PRIMARY KEY,
    make VARCHAR(100) NOT NULL,
    color VARCHAR(100) NOT NULL,
    model VARCHAR(100) NOT NULL,
    price INT NOT NULL,
    year INT NOT NULL,
    details VARCHAR(550) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

