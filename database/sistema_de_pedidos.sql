CREATE DATABASE sistema_de_pedidos;
USE sistema_de_pedidos;

CREATE TABLE perfil(
    id INT PRIMARY KEY AUTO_INCREMENT,
    tipo_de_usuario VARCHAR(25) NOT NULL
) DEFAULT charset utf8;

CREATE TABLE usuarios(
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_perfil INT, 
    nome VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(100) NOT NULL,
    telefone VARCHAR(11) NOT NULL UNIQUE,
    endereco VARCHAR(50) NOT NULL
) DEFAULT charset utf8; 

CREATE TABLE produtos(
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(50) NOT NULL,
    descricao VARCHAR(255) NOT NULL,
    preco FLOAT(15) NOT NULL,
    imagem VARCHAR(255),
    adicionais VARCHAR(255)
) DEFAULT charset utf8; 


CREATE TABLE pedidos(
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_cliente INT,
    id_carrinho INT,
    id_mesa INT,
    valor_pedido FLOAT(15) NOT NULL,
    tipo_pedido VARCHAR(55) NOT NULL,
    data_pedido DATETIME NOT NULL
) DEFAULT charset utf8; 

CREATE TABLE mesas(
    id INT PRIMARY KEY,
    status VARCHAR(55) NOT NULL,
    disponibilidade VARCHAR(25) NOT NULL
) DEFAULT charset utf8; 

CREATE TABLE carrinho(
    id INT PRIMARY KEY,
    id_produto INT,
    quantidade_produto INT(10)
) DEFAULT charset utf8; 

ALTER TABLE usuarios ADD FOREIGN KEY(id_perfil) REFERENCES perfil (id);

ALTER TABLE pedidos ADD FOREIGN KEY(id_cliente) REFERENCES usuarios (id);

ALTER TABLE pedidos ADD FOREIGN KEY(id_carrinho) REFERENCES carrinho (id);

ALTER TABLE pedidos ADD FOREIGN KEY(id_mesa) REFERENCES mesas (id);   

ALTER TABLE carrinho ADD FOREIGN KEY(id_produto) REFERENCES produtos (id);

INSERT INTO perfil (tipo_de_usuario) VALUES ('admin');
INSERT INTO perfil (tipo_de_usuario) VALUES ('common');
