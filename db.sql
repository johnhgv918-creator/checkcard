CREATE DATABASE check_db;
USE check_db;

CREATE TABLE Informations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(100),
    num VARCHAR(150),
    recharge VARCHAR(150),
    prix number(50),
    code VARCHAR(50),
    date_envoi TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
check_dbcheck_db