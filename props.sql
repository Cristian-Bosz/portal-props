DROP DATABASE IF EXISTS props;
CREATE DATABASE IF NOT EXISTS props;
USE props;


CREATE TABLE IF NOT EXISTS tipo_usuarios(
    tipo_user_id TINYINT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
    tipo    VARCHAR(80) NOT NULL
) ENGINE = innoDB;

INSERT INTO tipo_usuarios 
VALUES (1, 'Administrador'),
       (2, 'Común');


CREATE TABLE IF NOT EXISTS usuarios (
                        usuarios_id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY, 
                        nombre VARCHAR (20) NOT NULL,
                        apellido VARCHAR (20) NULL,
                        email VARCHAR (120) NOT NULL,
                        fecha_nacimiento DATE NULL,
                        password VARCHAR (255) NOT NULL,
                        img_user VARCHAR(80) NULL,
                        tipo_user_id_fk TINYINT UNSIGNED NOT NULL,

                        FOREIGN KEY (tipo_user_id_fk) REFERENCES tipo_usuarios (tipo_user_id) ON DELETE RESTRICT ON UPDATE CASCADE
 )ENGINE = InnoDB;

INSERT INTO usuarios
VALUES (1,'cristian', 'bösz', 'cristianbosz@hotmail.com', '2000/06/05', '$2y$10$50WxPV0HNkYLaQAnH4ccOuiBjmAjEVoxzJoIt6cNCCjpOK9GHMyPm', 'yo.png', 1);


CREATE TABLE IF NOT EXISTS baño (
    baño_id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
    accesorios_baño VARCHAR(30) NOT NULL

)ENGINE = InnoDB;

INSERT INTO baño
VALUES (1, 'Bañadera'),
       (2, 'Agua caliente'),
       (3, 'Secador de pelo'),
       (4, 'Bidé'),
       (5, 'Productos de limpieza'),
       (6, 'Toallas'),
       (7, 'Shampoo'),
       (8, 'Jabón de cuerpo');


CREATE TABLE IF NOT EXISTS habitaciones (
    habitaciones_id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
    accesorios_habitaciones VARCHAR(30) NOT NULL

)ENGINE = InnoDB;

INSERT INTO habitaciones
VALUES (1, 'Almohadas y mantas'),
       (2, 'Perchas'),
       (3, 'Vestidor o armario'),
       (4, 'Mosquitero'),
       (5, 'Plancha'),
       (6, 'Persianas o cortinas'),
       (7, 'Lavarropas'),
       (8, 'Tender de ropa');


CREATE TABLE IF NOT EXISTS cocina (
    cocina_id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
    accesorios_cocina VARCHAR(30) NOT NULL

)ENGINE = InnoDB;

INSERT INTO cocina
VALUES (1, 'Cocina'),
       (2, 'Heladera'),
       (3, 'Microondas'),
       (4, 'Utensillos'),
       (5, 'Vajilla y cubiertos'),
       (6, 'Horno'),
       (7, 'Tostadora'),
       (8, 'Utensillos para parilla'),
       (9, 'Mesa de comedor');


CREATE TABLE IF NOT EXISTS exterior (
    exterior_id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
    accesorios_exterior VARCHAR(30) NOT NULL

)ENGINE = InnoDB;

INSERT INTO exterior
VALUES (1, 'Muebles'),
       (2, 'Zona para comer'),
       (3, 'Parrilla'),
       (4, 'Zona para fogata'),
       (5, 'Pileta');

CREATE TABLE IF NOT EXISTS estacionamiento (
    estacionamiento_id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
    accesorios_estacionamiento VARCHAR(30) NOT NULL

)ENGINE = InnoDB;

INSERT INTO estacionamiento
VALUES (1, 'Estacionamiento o garage');


CREATE TABLE IF NOT EXISTS entretenimiento (
    entretenimiento_id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
    accesorios_entretenimiento VARCHAR(30) NOT NULL

)ENGINE = InnoDB;

INSERT INTO entretenimiento
VALUES (1, 'Televisor'),
        (2, 'Libros');


CREATE TABLE IF NOT EXISTS calefaccion (
    calefaccion_id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
    accesorios_calefaccion VARCHAR(30) NOT NULL

)ENGINE = InnoDB;

INSERT INTO calefaccion
VALUES (1, 'Chimenea'),
       (2, 'Ventiladores'),
       (3, 'Estufas'),
       (4, 'Aire acondicionado');


CREATE TABLE IF NOT EXISTS comprar_prop (
    comprar_prop_id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
    titulo VARCHAR (120) NOT NULL,
    foto VARCHAR (120),
    descripcion TEXT (1000) NOT NULL,
    precio BIGINT NOT NULL,
    expensas MEDIUMINT,
    superficie_total SMALLINT,
    superficie_cubierta SMALLINT,
    ambientes TINYINT NOT NULL,
    baños TINYINT NOT NULL,
    dormitorios TINYINT NOT NULL,
    cocheras TINYINT,
    antiguedad TINYINT NOT NULL
)ENGINE = InnoDB;
INSERT INTO comprar_prop
VALUES (1,'mansion','', 'Terrible mansion viral papaa', 190000, 500, 20, 25, 4, 3, 4, 1, 50);
    


CREATE TABLE IF NOT EXISTS prop_insumos (
    prop_insumos_id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
    propiedades_caract JSON, 
    id_propiedad_fk INT UNSIGNED NOT NULL,

    FOREIGN KEY (id_propiedad_fk) REFERENCES comprar_prop(comprar_prop_id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB;
