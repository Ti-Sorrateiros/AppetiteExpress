CREATE DATABASE sistema_de_pedidos;
USE sistema_de_pedidos;

-- tabela perfil para guardar o tipo de usuario: admin  e cliente 
CREATE TABLE perfil(
    id INT PRIMARY KEY auto_increment,
    tipo_de_usuario VARCHAR(25)
) DEFAULT charset utf8;

-- terá dois tipos de perfil com id: 1 para admin , 2 para cliente 
INSERT INTO perfil (tipo_de_usuario) VALUES ('admin');
INSERT INTO perfil (tipo_de_usuario) VALUES ('cliente');

-- tabela para guardar os cadastros dos usuarios
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
    quantidade int(5),
    preco FLOAT(15) NOT NULL,
    adicionais VARCHAR(255),
    nome_imagem VARCHAR(100), -- nome da imagem original
    path_imagem VARCHAR(100) -- caminho da imagem 
) DEFAULT charset utf8; 

-- guardar os pedidos feito pelo cliente
CREATE TABLE pedidos(
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_produto INT,
    preco FLOAT(15) NOT NULL,
    quantidade VARCHAR(55) NOT NULL
) DEFAULT charset utf8; 

-- guarda o cadastro de uma nova localização feito pelo cliente
CREATE TABLE localizacao(
    id int auto_increment primary key,
    cep varchar(100),
    rua varchar(100),
    numero varchar(100),
    bairro varchar(100),
    estado varchar(100)
) DEFAULT charset utf8;

-- chave estrangeira id_perfil para usuario e para definir o tipo de usuario 
ALTER TABLE usuarios ADD FOREIGN KEY(id_perfil) REFERENCES perfil (id);

-- chave estrangeira para obter dados do usuario que pediu
ALTER TABLE pedidos ADD FOREIGN KEY(id_usuario) REFERENCES usuarios (id);


