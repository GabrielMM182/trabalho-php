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
