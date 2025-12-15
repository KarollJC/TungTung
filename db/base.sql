create database if not exists tungtung;
use tungtung;

-- Team members user
create user 'tungtungcitos'@'%' identified by '1234';
grant all privileges on tungtung.* to 'tungtungcitos'@'%';
flush privileges;

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
lesionados varchar(150) not null,
uso_casco varchar(100) not null,
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

INSERT INTO accidentes 
(fecha, lugar, descripcion, causa, lesionados, uso_casco, nivel_gravedad)
VALUES
('2024-08-23','Libramiento Uriangato','Un trágico accidente en el libramiento Uriangato, sobre la carretera federal Salamanca - Morelia, cobró la vida de un motociclista la noche de este jueves. Según el conductor del tráiler involucrado, la motocicleta circulaba sin luces, lo que pudo haber contribuido al fatal desenlace.','La moto no contaba con luces y el trailero no lo vio','1 fallecido','si','muy grave'),
('2023-03-27','Boulevar Juárez (esquina calle Río Hondo), Uriangato','Una motocicleta con varios ocupantes, cuatro adultos y un bebé, derrapó durante la madrugada.','Al parecer exceso de velocidad y falta de precaución.','1 fallecido (hombre de 52 años), varios heridos: dos hombres (48 y 32 años), una mujer (26), un bebé de 9 meses.','no se menciona','grave (muerte + múltiples lesionados)'),
('2025-07-20','Carretera Uriangato-Morelia, comunidad La Cinta','Un hombre derrapó en su motocicleta y cayó a orillas de la carretera; fue encontrado inconsciente y con lesiones graves.','Exceso de velocidad (derrape)','1 lesionado en estado delicado','no','muy grave'),
('2024-05-20','Boulevar Uriangato','Padre e hijo motociclistas fueron embestidos por una camioneta mientras circulaban sobre el bulevar; quedaron tirados en la vía junto con su moto y la camioneta terminó estrellada contra una vivienda.','Impacto por camioneta que colisionó la motocicleta','2 fallecidos (padre de 49 y su hijo de 19 años)','no reportado','muy grave (fallecidos)'),
('2024-06-08','Moroleón / Uriangato','Una motociclista resultó lesionada tras chocar por alcance con otra moto y fue trasladada al hospital.','Alcance entre motocicletas','1 lesionada','no se menciona','moderado-grave');


