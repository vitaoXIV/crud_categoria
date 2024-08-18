CREATE DATABASE ludofashion;

use ludofashion;
CREATE TABLE categoria(
    id_categoria int primary key auto_increment,
    nome varchar(255) not null
);


CREATE TABLE produtos(
    id int primary key auto_increment,
    nome_do_produto varchar(255),
    cor varchar(255),
    tamanho varchar(255),
    decricao_do_produto text ,
    caracteristicas_do_produto varchar(255)
);

