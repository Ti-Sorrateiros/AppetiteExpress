CREATE DATABASE sistema_de_pedidos;
USE sistema_de_pedidos;

-- tabela perfil para guardar o tipo de usuario: admin  e cliente 
CREATE TABLE perfil(
    id INT PRIMARY KEY auto_increment,
    tipo_de_usuario VARCHAR(25)
) DEFAULT charset utf8;

-- terá dois tipos de perfil com id: 2 para admin , 1 para cliente 
INSERT INTO perfil (tipo_de_usuario) VALUES ('cliente');
INSERT INTO perfil (tipo_de_usuario) VALUES ('admin');  
/* 
para a criacao de uma conta de administrador terá que ser criado por meio do cadastro normal , 
e o DBA com acesso ao banco de dados fará uma mudança da coluna tipo_de_usuario de 1 para 2
na conta criada no formulário

o acesso de admin porenquanto é o acesso para cadastrar os produtos no banco dados,
futuramente se precisa poderá criar mais um tipo de perfil como 'gerente' para publicar os produtos para 
o banco de dados (lembrando que será necessário mudança no código tbm)
*/

-- tabela para guardar os cadastros dos usuarios
ALTER TABLE usuarios(
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_perfil INT, 
    nome VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    telefone VARCHAR(11) NOT NULL UNIQUE
) DEFAULT charset utf8; 

-- tabela para guardar produtos
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
    id INT PRIMARY KEY AUTO_INCREMENT, -- este é o id de pedido
    id_cliente INT,
    valor_total FLOAT(15) NOT NULL, -- valor total de todos os pedidos
    hora time,
    dia date,
    cep varchar(100),
    rua varchar(100),
    numero varchar(100),
    bairro varchar(100),
    estado varchar(100)
) DEFAULT charset utf8; 

-- adicionar no mesmo pedido outro produto e sua quantidade
CREATE TABLE item_pedido(
	id_pedido INT, -- receber o mesmo id do produto
    id_produto INT, -- receber o id do produto
    quantidade INT, -- quantidade de cada item 
    valor_total_unidade FLOAT(15) NOT NULL -- valor
);

-- guarda o cadastro de uma nova localização feito pelo cliente
CREATE TABLE localizacao(
    id int auto_increment primary key,
    id_cliente INT,
    cep varchar(100),
    rua varchar(100),
    numero varchar(100),
    bairro varchar(100),
    estado varchar(100)
) DEFAULT charset utf8;

-- chave estrangeira id_perfil para usuario e para definir o tipo de usuario 
ALTER TABLE usuarios ADD FOREIGN KEY(id_perfil) REFERENCES perfil (id);

-- chave estrangeira para obter dados do usuario que pediu
ALTER TABLE pedidos ADD FOREIGN KEY(id_cliente) REFERENCES usuarios (id);

ALTER TABLE localizacao ADD foreign key (id_cliente) references usuarios(id);


