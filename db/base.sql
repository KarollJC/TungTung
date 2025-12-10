create database if not exists tungtung;
use tungtung;

create table usuarios(
id_usuario int auto_increment primary key,
email varchar(100) not null,
usuario varchar(30) not null,
nombre varchar(40) not null,
apellidos varchar(40) not null,
f_nacimiento date not null,
contra varchar(20) not null,
num_telefono varchar(12) not null
);

create table tipos_cascos(
id_casco int auto_increment primary key,
tipo varchar(50) not null,
imagen varchar(50) not null,
descripcion_corta varchar(100) not null,
descripcion text not null
);

create table karol(

);

create table cascos(
id_cascos int auto_increment primary key,
marca varchar(50) not null,
modelo varchar(50) not null,
tipo_casco varchar(50) not null,
certificacion varchar(60) not null,
descripcion varchar(100) not null,
imagen varchar(50) not null,
precio double not null,
fecha_registro date not null
);

create table accidentes(
id_accidentes int auto_increment primary key,
fecha date not null,
lugar varchar(100) not null,
descripcion varchar(100) not null,
causa varchar(50) not null,
lesionados int not null,
uso_casco varchar(10) not null,
nivel_gravedad varchar(40) not null,
imagen_evidencia mediumblob 
);

create table preguntas_frecuentes(
id_pregunta int auto_increment primary key,
pregunta varchar(100) not null,
respuesta varchar(120) not null,
categoria varchar(50) not null,
orden varchar(40) not null
);

create table mensaje(
id_mensajes int auto_increment primary key,
usuario varchar(100) not null,
email varchar(100) not null,
mensaje text not null,
compromiso tinyint(1) not null default 0,
fecha datetime not null default current_timestamp
);

-- DELETE BEFORE COMMIT // add

INSERT INTO cascos VALUES
(1, "marca1", "modelo1", "tipo casco1", "certific1", "desc1", "descdet1", 100.0, '2025-12-08'),
(2, "marca2", "modelo2", "tipo casco2", "certific2", "desc2", "descdet2", 100.0, '2025-12-08'),
(3, "marca3", "modelo3", "tipo casco3", "certific3", "desc3", "descdet3", 100.0, '2025-12-08'),
(4, "marca4", "modelo4", "tipo casco4", "certific4", "desc4", "descdet4", 100.0, '2025-12-08'),
(5, "marca5", "modelo5", "tipo casco5", "certific5", "desc5", "descdet5", 100.0, '2025-12-08'),
(6, "marca6", "modelo6", "tipo casco6", "certific6", "desc6", "descdet6", 100.0, '2025-12-08'),
(7, "marca7", "modelo7", "tipo casco7", "certific7", "desc7", "descdet7", 100.0, '2025-12-08');

INSERT INTO tipos_cascos VALUES
(1, "tipo1", "../img/imgtest.gif", "h1 u got one", "dont go to the front tough"),
(2, "tipo2", "../img/imgtest.png", "h1 u got one", "dont go to the front tough"),
(3, "tipo3", "../img/imgtest.gif", "h1 u got one", "dont go to the front tough"),
(4, "tipo4", "../img/imgtest.png", "h1 u got one", "dont go to the front tough"),
(5, "tipo5", "../img/imgtest.gif", "h1 u got one", "dont go to the front tough"),
(6, "tipo6", "../img/imgtest.png", "h1 u got one", "dont go to the front tough"),
(7, "tipo7", "../img/imgtest.gif", "h1 u got one", "dont go to the front tough");