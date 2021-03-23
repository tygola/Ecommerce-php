CREATE DATABASE bd_tiago_livros;

USE bd_tiago_livros;

CREATE TABLE livros (
idlivro int NOT NULL,
titulolivro varchar(30) NOT NULL,
autoreslivro varchar(50) NOT NULL,
qtdepaginas int NOT NULL,
qtdeestoque int NOT NULL,
precolivro decimal(5,2) NOT NULL,
imagem varchar(30) NOT NULL,
CONSTRAINT pk_livros PRIMARY KEY(idlivro)
);


CREATE TABLE vendas (
idvenda int NOT NULL AUTO_INCREMENT,
datavenda datetime NOT NULL,
qtdevendida int NOT NULL,
idlivro int NOT NULL,
idcliente int NOT NULL,
precototal decimal(5,2) NOT NULL,
CONSTRAINT pk_vendas PRIMARY KEY(idvenda),
CONSTRAINT fk_vendas_livros FOREIGN KEY(idlivro)
REFERENCES livros(idlivro)
);

CREATE TABLE clientes (
idcliente int NOT NULL AUTO_INCREMENT,
remetente varchar(100),
cpf varchar(14),
enderco varchar(100),
numero int NOT NULL,
compl varchar(10),
cep varchar(8),
cidade varchar(50),
estado varchar(2),
CONSTRAINT pk_clientes PRIMARY KEY(idcliente),
CONSTRAINT Uk_clientes UNIQUE KEY(cpf)
);

ALTER TABLE vendas
ADD KEY fk_vendas_livros(idlivro);



INSERT INTO livros VALUES 
(1,'Biologia','Amabis e Martho',151,0,'15.00','biologia.jpg'),
(2,'Bio','Sônia Lopes e Sérgio Rosso',784,10,'250.00','bio.jpg'),
(3,'Física Conceitual','Paul G. Hewitt',816,1,'260.00','Fisica-Conceitual.jpg'),
(4,'Física para o Ensino Médio','Kazuhito Yamamoto e Luiz Felipe Fuke',416,5,'30.00','Fisica-Ensino-Medio.jpg'),
(5,'Quimica','Martha Reis',368,2,'30.00','quimica.jpg'),
(6,'Quimica Ciência Central','Brown, LeMay, Bursten, Woodward e Stoltzfus',1216,2,'269.99','quimica-ciencia.jpg'),
(7,'Fundamentos da Matemática Elementar','Gelson Iezzi',256,3,'150.00','matematica.jpg'),
(8,' Matemática Ciência e Aplicações','Manoel Paiva',448,2,'245.00','matematica_ciencia.jpg'),
(9,'Conexões Com A História','Alves, Alexandre e Letícia Fagundes de Oliveira',728,0,'258.00','historia-conexoe.jpg'),
(10,'Oficina de História','Regina claro',832,5,'185.00','historia.jpg'),
(11,'Geografia - Espaço e Identidade','Levon Boligian',220,3,'215.00','geografia.jpg'),
(12,'Filosofar Com Textos','Maria Lúcia de Arruda Aranha',504,2,'191.00','filosofia.jpg'),
(13,'Filosofia','Siomara Sodré',400,2,'160.00','filo.jpg'),
(14,'Linguagens Em Conexão','Sette',256,1,'189.00','portugues.jpg'),
(15,'Os Fundamentos da Física ','Francisco Ramalho Júnior',815,1,'248.00','fisi.jpg');