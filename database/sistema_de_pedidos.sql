CREATE DATABASE sistema_de_pedidos;
USE sistema_de_pedidos;

create table usuarios(
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_perfil INT 
    nome VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(100) NOT NULL,
    telefone VARCHAR(11) NOT NULL,
    endereço 
);


create table produtos(
    id INT PRIMARY KEY AUTO_INCREMENT,
    saborPizza VARCHAR(50) NOT NULL
);


create table pedidos(
    id INT PRIMARY KEY AUTO_INCREMENT,
    nomePedido VARCHAR(55) NOT NULL
);




