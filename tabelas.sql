 CREATE DATABASE chale;
 
 CREATE TABLE clientes (
	 id PRIMARY KEY INTEGER,
	 nome VARCHAR(200),
	 documento VARCHAR (20),
	 dataa-nascimento date,
	 cidade VARCHAR(50),
	 estado VARCHAR(50)
 )

 CREATE TABLE reservas (
	 id PRIMARY KEY INTEGER,
	 id-quarto INTEGER,
	 id-cliente INTEGER,
	 dataa-entrada date,
	 dataa-saida date,
	 valor-reserva VARCHAR(50),
	 statuss-reserva VARCHAR(50),
	 dataa-hora time
 )

CREATE TABLE quartos (
	id PRIMARY KEY INTEGER,
	numero-porta VARCHAR(50),
	tipo-quarto VARCHAR(50),
	valor VARCHAR(50),
	statuss VARCHAR(50)
)

INSERT INTO clientes (id, nome, documento, dataa-nascimento, cidade, estado)
VALUES (1, gabriel, 00144447, 06-15-1999, pouso alegre, MG);

INSERT INTO clientes (id, nome, documento, dataa-nascimento, cidade, estado)
VALUES (2, joão, 071558447, 04-14-1997, são paulo, SP);

INSERT INTO reservas (id, id-quarto, id-cliente, dataa-entrada, dataa-saida, valor-reserva, statuss-reserva, dataa-hora)
VALUES (1, 1, 1, 04-10-2020, 08-10-2020, 6200, checkout, 14:05);

INSERT INTO quartos (id, numero-porta tipo-quarto, valor, statuss)
VALUES (7, 42, duplo, 420, ocupado);

INSERT INTO quartos (id, numero-porta tipo-quarto, valor, statuss)
VALUES (10, 07, triplo, 1200, livre);