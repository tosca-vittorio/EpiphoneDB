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
