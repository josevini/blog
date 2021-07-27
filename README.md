# Este projeto contém um pequeno sistema feito em PHP com MySQL e PDO.
## Ferramentas usadas
* PHP 7+
* Bootstrap
* MySQL/Mariadb
* Composer
* PDO
## O que é preciso para rodar o projeto?
Para visualizar este site, você precisará de um servidor local que rode PHP e banco de dados MySQL/Mariadb. Pode usar uma ferramenta pronta como o xampp server ou containers Docker.
## XAMPP ou Docker
Caso você escolha usar o Xampp server, vá até o arquivo DB.php dentro de app/DB e altere o host para localhost. Caso você esteja usando um container Docker, mantenha o host como db. Recomendo fortemente o uso do xampp para ficar mais fácil de configurar.
## Criar o banco
```sql
create database site_noticias default character set utf8
default collate utf8_general_ci;
```
## Criar as tabelas
```sql
create table users (
	id int not null primary key auto_increment,
	name varchar(100) not null,
	user varchar(20) not null unique,
	password varchar(60) not null
) engine=InnoDB default charset = utf8;

create table categories (
	id int not null primary key auto_increment,
	category varchar(20) not null unique
) engine=InnoDB default charset = utf8;

create table posts (
	id int not null primary key auto_increment,
	title varchar(20) not null unique,
	text text not null,
	category int not null,
	author int not null,
	foreign key (category) references categories(id),
	foreign key (author) references users(id)
) engine=InnoDB default charset = utf8;
```
## Conexão com o Banco
No arquivo DB.php localizado em app/DB/DB.php, está uma classe para conexão e manipulação do banco de dados. Nele, você pode modificar os dados para conexão se tiver a necessidade. Por padrão, o nome do banco deve ser site_noticias, com usuário root e senha vazia (padrão usado pelo xampp).
## Carregar o composer
Na pasta onde está localizado o composer.json, execute o segunte comando
```shell
composer install 
```
## Créditos
Este projeto foi criado completamente por mim, [Vinícius Silva](https://www.linkedin.com/in/viníciussilva946191193
), mas algumas ideias foram baseadas no vídeo do canal [wdev](https://www.youtube.com/watch?v=uG64BgrlX7o).
