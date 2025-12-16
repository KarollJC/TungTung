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

create table admins(
    id_admin int auto_increment primary key,
    user_id int not null,
    foreign key (user_id) references usuarios(id_usuario)
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
    usuario varchar(50) not null,
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

INSERT INTO usuarios (email, usuario, nombre, apellidos, f_nacimiento, contra, num_telefono)
VALUES ("admin@admin.com", "admin", "root", "some", '2025-12-15', '0');

INSERT INTO admins (user_id) VALUES (1);

INSERT INTO accidentes 
(fecha, lugar, descripcion, causa, lesionados, uso_casco, nivel_gravedad)
VALUES
('2024-08-23','Libramiento Uriangato','Un trágico accidente en el libramiento Uriangato, sobre la carretera federal Salamanca - Morelia, cobró la vida de un motociclista la noche de este jueves. Según el conductor del tráiler involucrado, la motocicleta circulaba sin luces, lo que pudo haber contribuido al fatal desenlace.','La moto no contaba con luces y el trailero no lo vio','1 fallecido','si','muy grave'),
('2023-03-27','Boulevar Juárez (esquina calle Río Hondo), Uriangato','Una motocicleta con varios ocupantes, cuatro adultos y un bebé, derrapó durante la madrugada.','Al parecer exceso de velocidad y falta de precaución.','1 fallecido (hombre de 52 años), varios heridos: dos hombres (48 y 32 años), una mujer (26), un bebé de 9 meses.','no se menciona','grave (muerte + múltiples lesionados)'),
('2025-07-20','Carretera Uriangato-Morelia, comunidad La Cinta','Un hombre derrapó en su motocicleta y cayó a orillas de la carretera; fue encontrado inconsciente y con lesiones graves.','Exceso de velocidad (derrape)','1 lesionado en estado delicado','no','muy grave'),
('2024-05-20','Boulevar Uriangato','Padre e hijo motociclistas fueron embestidos por una camioneta mientras circulaban sobre el bulevar; quedaron tirados en la vía junto con su moto y la camioneta terminó estrellada contra una vivienda.','Impacto por camioneta que colisionó la motocicleta','2 fallecidos (padre de 49 y su hijo de 19 años)','no reportado','muy grave (fallecidos)'),
('2024-06-08','Moroleón / Uriangato','Una motociclista resultó lesionada tras chocar por alcance con otra moto y fue trasladada al hospital.','Alcance entre motocicletas','1 lesionada','no se menciona','moderado-grave');


INSERT INTO tipos_cascos (tipo, imagen, descripcion_corta, descripcion) VALUES
('Casco Integral', 'img/cascos/Casco_integral.jpeg', 'Protección completa para cabeza y rostro', 'El casco integral cubre toda la cabeza, incluyendo el mentón. Ofrece el mayor nivel de protección y es ideal para carretera y uso diario.'),

('Casco Modular', 'img/cascos/Casco_abatible.jpeg', 'Versatilidad y comodidad', 'El casco modular combina características del casco integral y abatible. Permite levantar la mentonera, facilitando la ventilación y la comunicación.'),

('Casco Jet', 'img/cascos/Casco_Jet.webp', 'Ligero y urbano', 'El casco jet es abierto y ligero, ideal para ciudad. Ofrece menor protección que el integral, pero mayor comodidad en trayectos cortos.'),

('Casco Clásico', 'img/cascos/Casco_calimero.jpeg', 'Estilo retro', 'Diseñado con estética vintage, el casco clásico es común en motos tipo café racer o scooter.'),

('Casco Off-Road', 'img/cascos/Casco_OffRoad.webp', 'Para terrenos extremos', 'Especialmente diseñado para motocross y enduro. Ofrece gran ventilación y protección contra impactos fuertes.'),

('Casco Dual Sport', 'img/cascos/Casco_dual.jpeg', 'Uso mixto', 'Combina características del casco integral y off-road. Ideal para uso en carretera y caminos de tierra.'),

('Casco Trail', 'img/cascos/Casco_Trail.jpg', 'Aventura y resistencia', 'Pensado para viajes largos y terrenos mixtos, el casco trail equilibra protección, ventilación y confort.');


INSERT INTO cascos
(marca, modelo, tipo_casco, certificacion, descripcion, imagen, precio, fecha_registro)
VALUES
('LS2', 'Breaker', 'Casco Integral', 'ECE 22.05', 'Casco integral con excelente ventilación y protección.', 'img/productos/ls2_breaker.webp', 2899.00, CURDATE()),

('HJC', 'i70', 'Casco Integral', 'DOT / ECE', 'Diseño deportivo con visor solar integrado.', 'img/productos/hjc_i70.jpg', 3499.00, CURDATE()),

('Bell', 'Custom 500', 'Casco Clásico', 'DOT', 'Casco clásico con diseño retro y calota ligera.', 'img/productos/bell_custom.webp', 2599.00, CURDATE()),

('Shark', 'Evo-One 2', 'Casco Modular', 'ECE 22.05', 'Casco modular abatible con doble homologación.', 'img/productos/shark_evo.jpeg', 5999.00, CURDATE()),

('Fox', 'V1', 'Casco Off-Road', 'DOT / ECE', 'Casco ideal para motocross y enduro.', 'img/productos/fox_v1.webp', 3799.00, CURDATE());