create database tungtung;
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

create table cascos(
id_cascos int auto_increment primary key,
marca varchar(50) not null,
modelo varchar(50) not null,
tipo_casco varchar(50) not null,
certificacion varchar(60) not null,
descripcion varchar(100) not null,
precio double not null,
imagen mediumblob,
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