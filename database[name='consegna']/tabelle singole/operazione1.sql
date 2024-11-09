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
