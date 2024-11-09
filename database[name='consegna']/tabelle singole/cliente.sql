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

3°
