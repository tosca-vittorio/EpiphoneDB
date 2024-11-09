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

4°
