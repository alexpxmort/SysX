                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               Passo  a Passo para utilizacao do sistema SysX
criar usuario admin com  senha empx1234 no database

create database sysX;

create table users(
id int primary key auto_increment,
user varchar(256) ,
senha varchar(256)
);

create table empresa(
id int primary key auto_increment,
nome varchar(256) ,
email varchar(256),
logo varchar(256),
website varchar(256)
);

create table funcionario(
id int primary key auto_increment,
nome varchar(256) ,
email varchar(256),
cpf varchar(256),
telefone varchar(256),
empresa int,
FOREIGN KEY(empresa) References 
empresa(id)
);




Dados para logar ademp e senha
funcemp68

inicie o site no arquivo login.html
