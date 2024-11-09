CREATE TABLE album
(
  id int(11) NOT NULL AUTO_INCREMENT,
  nome varchar(40) DEFAULT NULL,
  genere varchar(30) DEFAULT NULL,
  numero_brani int(11) DEFAULT NULL,
  data_uscita int(11) DEFAULT NULL,
  formato_disponibile varchar(10) DEFAULT NULL,
  prezzo double DEFAULT NULL,
  PRIMARY KEY (id)
);

INSERT INTO album VALUES ('1', 'DARK SIDE OF THE MOON','PROGRESSIVE ROCK', '10', '1973', 'CD/VINILE', '50');
INSERT INTO album VALUES ('2', 'ALBUM','POP RAP', '12', '2017', 'CD/VINILE', '50');
INSERT INTO album VALUES ('3', 'FACCIO UN CASINO','POP RAP', '12', '2017', 'CD/VINILE', '50');
INSERT INTO album VALUES ('4', 'NOTTI BRAVE','INDIE', '15', '2018', 'CD/VINILE', '50');
INSERT INTO album VALUES ('5', 'FAMOSO','TRAP', '13', '2020', 'CD/VINILE', '50');
INSERT INTO album VALUES ('6', 'ROCKSTAR','TRAP', '11', '2018', 'CD/VINILE', '50');
INSERT INTO album VALUES ('7', 'DIVIDE','POP', '10', '2017', 'CD/VINILE', '50');
INSERT INTO album VALUES ('8', 'GHOST STORIES','POP', '9', '2014', 'CD/VINILE', '50');
INSERT INTO album VALUES ('9', 'LA RIVOLUZIONE STA ARRIVANDO','ROCK', '12', '2015', 'CD/VINILE', '50');
INSERT INTO album VALUES ('10', 'AMORE CHE TORNI','ROCK', '12', '2017', 'CD/VINILE', '50');

CREATE TABLE artista
(
  nome_arte varchar(20) NOT NULL,
  PRIMARY KEY (nome_arte)
);

INSERT INTO artista VALUES ('CARL BRAVE');
INSERT INTO artista VALUES ('COEZ');
INSERT INTO artista VALUES ('COLDPLAY');
INSERT INTO artista VALUES ('ED SHEERAN');
INSERT INTO artista VALUES ('GHALI');
INSERT INTO artista VALUES ('NEGRAMARO');
INSERT INTO artista VALUES ('PINK FLOYD');
INSERT INTO artista VALUES ('SFERA EBBASTA');

CREATE TABLE cliente
(
  id int(11) NOT NULL AUTO_INCREMENT,
  nome varchar(40) DEFAULT NULL,
  cognome varchar(20) DEFAULT NULL,
  codice_fiscale varchar(20) DEFAULT NULL,
  sede_legale varchar(20) DEFAULT NULL,
  partita_IVA varchar(20) DEFAULT NULL,
  PRIMARY KEY (id)
);

INSERT INTO cliente VALUES ('1', 'Concetto', 'Spampinato', 'CNCTOSPMPNT', '', '');
INSERT INTO cliente VALUES ('2', 'Manuel', 'Amore', 'MNLAMRE', '', '');
INSERT INTO cliente VALUES ('3', 'Gianluca', 'Cristaudo', 'GNLACISUDO', '', '');

INSERT INTO cliente VALUES ('4', 'Seles srl', '', '', 'CATANIA', '47029050243');
INSERT INTO cliente VALUES ('5', 'Box Office Sicilia', '', '', 'CATANIA', '67318070876');
INSERT INTO cliente VALUES ('6', 'Amazon', '', '', 'SEATTLE', '42932730106');

CREATE TABLE dati_anagrafici
 (
  nome varchar(20) DEFAULT NULL,
  cognome varchar(20) DEFAULT NULL,
  data_nascita date DEFAULT NULL,
  id_dipendente int(11) NOT NULL,
  PRIMARY KEY (id_dipendente)
);

INSERT INTO dati_anagrafici VALUES ('Ivan', 'Scandura','1995-03-12', '1');
INSERT INTO dati_anagrafici VALUES ('Alessio', 'Signorelli','1997-12-25', '2');
INSERT INTO dati_anagrafici VALUES ('Piero', 'Sueri','1990-06-05', '3');
INSERT INTO dati_anagrafici VALUES ('Gabriele', 'Poma','1997-03-07', '4');
INSERT INTO dati_anagrafici VALUES ('Carmelo', 'Tornatore','1992-06-15', '5');
INSERT INTO dati_anagrafici VALUES ('Lucia', 'Azzolina','1982-08-25', '6');
INSERT INTO dati_anagrafici VALUES ('Giuseppe', 'Conte','1964-08-09', '7');
INSERT INTO dati_anagrafici VALUES ('Paolo', 'Cannone','2222-22-22', '8');
INSERT INTO dati_anagrafici VALUES ('Gigi', 'La Trottola','1980-10-01', '9');

CREATE TABLE negozio
(
  id int(11) NOT NULL AUTO_INCREMENT,
  nome varchar(40) DEFAULT NULL,
  recapito varchar(10) DEFAULT NULL,
  indirizzo varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO negozio VALUES('1', 'Alto Volume', '0957511290', 'Via Messina - PA');
INSERT INTO negozio VALUES('2', 'Oltremusica Signo CD', '0957514045', 'Via Gramsci - CT');
INSERT INTO negozio VALUES('3', 'Strumenti Musicali .net', '0956164045', 'Via Ulisse - RG');
INSERT INTO negozio VALUES('4', 'Basso Volume', '0957174045', 'Via Marsala - TP');
INSERT INTO negozio VALUES('5', 'Medio Volume', '0958184045', 'Via Teatro Greco - ME');

create table ACQUISTO
(
	id_cliente integer,
	id_album integer,
	data_acquisto date,

	index id_acquisto1(id_cliente),
	FOREIGN KEY (id_cliente) REFERENCES CLIENTE(id),

    index id_acquisto2(id_album),
	FOREIGN KEY (id_album) REFERENCES ALBUM(id),

	PRIMARY KEY(id_cliente, id_album, data_acquisto)
);


INSERT INTO acquisto VALUES ('1', '1', '2020-12-28');
INSERT INTO acquisto VALUES ('2', '5', '2017-01-11');
INSERT INTO acquisto VALUES ('2', '6', '2017-01-11');
INSERT INTO acquisto VALUES ('3', '3', '2019-12-16');
INSERT INTO acquisto VALUES ('3', '4', '2019-12-16');
INSERT INTO acquisto VALUES ('4', '1', '2020-12-28');
INSERT INTO acquisto VALUES ('5', '9', '2020-03-14');
INSERT INTO acquisto VALUES ('5', '10', '2020-03-15');
INSERT INTO acquisto VALUES ('6', '8', '2016-01-01');
INSERT INTO acquisto VALUES ('6', '8', '2016-01-02');
INSERT INTO acquisto VALUES ('6', '8', '2016-01-03');
INSERT INTO acquisto VALUES ('6', '8', '2016-01-04');
INSERT INTO acquisto VALUES ('6', '8', '2016-01-05');

create table cookies
(
  id integer AUTO_INCREMENT PRIMARY KEY,
  hash varchar(255) not null,
  user integer not null,
  expires bigint not null,
  FOREIGN KEY(user) REFERENCES users(id) on delete cascade on update cascade
);

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

INSERT INTO users VALUES ('', 'Vittorio', 'Toscano', 'Toscaz', '1234', 'vittoriotoscano@hotmail.com', 'Maschio', '07-07-1997');

create table covers
(
    id integer PRIMARY KEY AUTO_INCREMENT,
    url varchar(255)
);

INSERT INTO covers VALUES('1', 'icon/1.png');
INSERT INTO covers VALUES('2', 'icon/2.png');
INSERT INTO covers VALUES('3', 'icon/3.png');
INSERT INTO covers VALUES('4', 'icon/4.png');
INSERT INTO covers VALUES('5', 'icon/5.png');
INSERT INTO covers VALUES('6', 'icon/6.png');
INSERT INTO covers VALUES('7', 'icon/7.png');
INSERT INTO covers VALUES('8', 'icon/8.png');
INSERT INTO covers VALUES('9', 'icon/9.png');
INSERT INTO covers VALUES('10', 'icon/10.png');

DELIMITER $$
create procedure OPERAZIONE_1 (IN id_cl integer)
BEGIN
 DROP TEMPORARY TABLE IF EXISTS TMP;

	CREATE TEMPORARY TABLE TMP(
		id_cliente integer,
        id_album integer,
        data_acquisto date,
        nome varchar(40),
        cognome varchar(20),
        codice_fiscale varchar(20)
    );
INSERT INTO TMP
Select A.id_cliente, A.id_album, A.data_acquisto, C.nome, C.cognome, C.codice_fiscale
From ACQUISTO A inner join CLIENTE C on C.id = A.id_cliente
Where id_cliente=id_cl
Group by id_album;


SELECT * FROM TMP;

 END $$
 DELIMITER ;

