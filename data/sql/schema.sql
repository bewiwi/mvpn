CREATE TABLE log (id INT AUTO_INCREMENT, server_id INT, user_id INT, info VARCHAR(255), level VARCHAR(255), INDEX server_id_idx (server_id), INDEX user_id_idx (user_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE server (id INT AUTO_INCREMENT, name VARCHAR(255) NOT NULL, ip VARCHAR(30) NOT NULL, port INT NOT NULL, proto VARCHAR(30) NOT NULL, ca TEXT NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE server_user (id INT AUTO_INCREMENT, server_id INT NOT NULL, user_id INT NOT NULL, INDEX server_id_idx (server_id), INDEX user_id_idx (user_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE user (id INT AUTO_INCREMENT, login VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, lastname VARCHAR(255), firstname VARCHAR(255), locked TINYINT(1) NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
ALTER TABLE log ADD CONSTRAINT log_user_id_user_id FOREIGN KEY (user_id) REFERENCES user(id);
ALTER TABLE log ADD CONSTRAINT log_server_id_server_id FOREIGN KEY (server_id) REFERENCES server(id);
ALTER TABLE server_user ADD CONSTRAINT server_user_user_id_user_id FOREIGN KEY (user_id) REFERENCES user(id);
ALTER TABLE server_user ADD CONSTRAINT server_user_server_id_server_id FOREIGN KEY (server_id) REFERENCES server(id);
