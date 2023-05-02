create database dbCardapio;
use dbCardapio;

create table usuario(
    id int primary key auto_increment,
    nome varchar(50) not null,
    email varchar(100) not null unique,
    senha varchar(100) not null 
);


create table pizza(
    id int primary key auto_increment,
    saborPizza varchar(50) not null
);


create table pedido(
    id int primary key auto_increment,
    nomePedido varchar(55) not null
);




