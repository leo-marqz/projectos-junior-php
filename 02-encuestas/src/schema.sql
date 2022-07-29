CREATE DATABASE encuestas;

USE encuestas;

CREATE TABLE polls(
    id INT NOT NULL AUTO_INCREMENT,
    uuid varchar(20) NOT NULL UNIQUE,
    title varchar(200) NOT NULL,
    PRIMARY KEY(id)
);

CREATE TABLE options(
    id INT NOT NULL AUTO_INCREMENT,
    poll_id int NOT NULL,
    title varchar(200) NOT NULL,
    voutes int NOT NULL,
    PRIMARY KEY(id),
    CONSTRAINT FOREIGN KEY (poll_id) REFERENCES polls(id)
);

