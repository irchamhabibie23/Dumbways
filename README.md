# Dumbways
**Soal dikerjakan menggunakan : PHP, JavaScript**


**Untuk menjalankan 1-3.js** 

Bisa menggunakan IDE yang dimiliki maupun menggunakan compiler online untuk Java Script ex: https://es6console.com/

**Cara menggunakan 4b:**

Install Xampp setelah itu jalankan Apache dan clone folder 4b ke ~/xampp/htdocs/  buka browser dan ketik http://localhost/dumbways/

Pastikan sudah membuat database MySQL di lokal menggunakan petunjuk berikut
## Membuat Database MySQL di lokal
Membuat database di MySQL dengan menggunakan command berikut

```create database employee;
CREATE TABLE users_tb (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(30),
    photo VARCHAR(20)
);
CREATE TABLE skill_tb (
    skill_id INT PRIMARY KEY AUTO_INCREMENT,
    skill_name VARCHAR(30),
    user_id INT,
    FOREIGN KEY (user_id) 
    REFERENCES users_tb(id)
    ON DELETE SET NULL
);
INSERT INTO users_tb VALUES (NULL, 'Nunchaku', 'nunchaku.png');
INSERT INTO users_tb VALUES (NULL, 'Holy Knight Escanor', 'Escanor.png');
INSERT INTO users_tb VALUES (NULL, 'The Grizzly', 'grizzly.png');
INSERT INTO skill_tb VALUES (NULL, 'PHP', 1);
INSERT INTO skill_tb VALUES (NULL, 'HTML', 1);
INSERT INTO skill_tb VALUES (NULL, 'CSS', 1);
INSERT INTO skill_tb VALUES (NULL, 'ReactJS', 2);
INSERT INTO skill_tb VALUES (NULL, 'React Native', 2);
INSERT INTO skill_tb VALUES (NULL, 'Express', 2);
INSERT INTO skill_tb VALUES (NULL, 'PHP', 3);
INSERT INTO skill_tb VALUES (NULL, 'HTML', 3);
INSERT INTO skill_tb VALUES (NULL, 'CSS', 3);```
