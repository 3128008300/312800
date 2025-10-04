CREATE DATABASE simple_website;
USE simple_website;

CREATE TABLE website_content (
    id INT PRIMARY KEY AUTO_INCREMENT,
    content TEXT NOT NULL,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO website_content (content) VALUES ('欢迎访问！这是初始内容。');