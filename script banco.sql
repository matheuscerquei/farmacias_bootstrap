create database BdVidaSaudavel;

 create table usuarios(
 ID_usuario int auto_increment primary key,
 email varchar(30) unique not null,
 tipo enum("ADMINISTRADOR", "COMUM") not null,
 senha varchar(255) not null, -- senha salva criptografada em hash
 data_cadastro datetime not null
 );

 create table produtos(
 ID_produto int auto_increment primary key,
 nome varchar(30) unique not null,
 preco decimal(6,2) not null,
 quantidade int not null,
 categoria enum(
 "ANALGÉSICOS", "ANTI-INFLAMATÓRIOS", "ANTIBIÓTICOS","ANTIVIRAIS",
 "ANTIFÚNGICOS", "ANTIDEPRESSIVOS", "ANSIOLÍTICOS", "ANTIPSICÓTICOS", 
 "ANTIHISTAMÍNICOS", "ANTIHIPERTENSIVOS", "DIURÉTICOS", "IMUNOSSUPRESSORES") not null,
 data_validade date not null
 );
  create table vendas(
 ID_venda int auto_increment primary key,
 nome_produto  
 );
