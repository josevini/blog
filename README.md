# Este projeto contém um pequeno sistema feito em PHP com MySQL e PDO.
## Ferramentas usadas
* PHP 7+
* Bootstrap
* MySQL
* Composer
* PDO
## O que é preciso para rodar o projeto?
Para visualizar este site, você precisará de um servidor local que rode PHP e banco de dados MySQL. Pode
usar uma ferramenta pronta como o xampp server ou containers Docker.
## Criar o banco
```sql
create database site_noticias default character set utf8
default collate utf8_general_ci;
```
## Criar as tabelas
```sql
create table usuarios (
	id int not null primary key auto_increment,
	nome varchar(30) not null,
	usuario varchar(15) not null unique,
	senha varchar(60) not null
) engine=InnoDB default charset = utf8;

create table categorias (
	id int not null primary key auto_increment,
	categoria varchar(20) not null unique
) engine=InnoDB default charset = utf8;

create table noticias (
	id int not null primary key auto_increment,
	titulo varchar(20) not null unique,
	texto text not null,
	categoria int not null,
	autor int not null,
	foreign key (categoria) references categorias(id),
	foreign key (autor) references usuarios(id)
) engine=InnoDB default charset = utf8;
```
## Carregar o composer
Na pasta onde está localizado o composer.json, execute o segunte comando
```shell
composer install 
```
