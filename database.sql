
--Buat database
CREATE DATABASE IF NOT EXISTS demo_sqli;
USE demo_sqli;

-- Buat tabel users
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert sample data
INSERT INTO users (username, password) VALUES 
('admin', 'admin123',),
('user1', 'password1'),
('user2', 'password2'),


