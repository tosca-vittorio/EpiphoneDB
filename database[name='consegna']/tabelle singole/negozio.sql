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

5°
