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
descripcion varchar(300) not null,
causa varchar(100) not null,
lesionados varchar(50) not null,
uso_casco varchar(10) not null,
nivel_gravedad varchar(40) not null
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

INSERT INTO accidentes (fecha, lugar, descripcion, causa, lesionados, uso_casco, nivel_gravedad)
VALUES('2024-08-23','libramiento Uriangato','Un trágico accidente en el libramiento Uriangato, sobre la carretera federal Salamanca - Morelia, cobró la vida de un motociclista la noche de este jueves. Según el conductor del tráiler involucrado, la motocicleta circulaba sin luces, lo que pudo haber contribuido al fatal desenlace.','la moto no contaba con luces y el trailero no lo vio','1 fallecido','si','muy grave');
