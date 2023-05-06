CREATE DATABASE if not exists sistema_de_pedidos;
USE sistema_de_pedidos;

create table if not exists usuarios(
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    telefone VARCHAR(11) NOT NULL,
    endereco varchar(50) NOT NULL,
    senha VARCHAR(100) NOT NULL
)  default charset utf8;

create table if not exists produtos(
    id INT PRIMARY KEY AUTO_INCREMENT,
    saborPizza VARCHAR(50) NOT NULL
) default charset utf8;

create table if not exists pedidos(
    id INT PRIMARY KEY AUTO_INCREMENT,
    nomePedido VARCHAR(55) NOT NULL
) default charset utf8;




