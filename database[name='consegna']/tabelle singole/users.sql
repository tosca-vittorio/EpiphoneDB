create table users
(
    id integer PRIMARY KEY AUTO_INCREMENT,
    nome varchar(15),
    cognome varchar(15),
    username varchar(21),
    password varchar(255),
    email varchar(51),
    gender varchar(10),
    data_registrazione varchar(10)
);

INSERT INTO users VALUES ('', 'Erminia', 'Lo Drago', 'Erminia61', 'matissecane12', 'erminialodrago1@hotmail.it', 'Femmina', '03-02-2020');
INSERT INTO users VALUES ('', 'Vittorio', 'Toscano', 'Toscaz', '1234', 'vittoriotoscano@hotmail.com', 'Maschio', '07-07-2007');
