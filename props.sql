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
VALUES (1,'cristian', 'bösz', 'cristianbosz@davinci.edu.ar', '2000/06/05', '$2y$10$50WxPV0HNkYLaQAnH4ccOuiBjmAjEVoxzJoIt6cNCCjpOK9GHMyPm', 'calkestis.jpg', 1);
    
CREATE TABLE IF NOT EXISTS comprar_prop (
    comprar_prop_id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
    titulo VARCHAR (120) NOT NULL,
    foto VARCHAR (120),
    video VARCHAR (120),
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
VALUES (1,'mansion', '', '', 'Terrible mansion viral papaa', 190000, 500, 20, 25, 4, 3, 4, 1, 50);
    

CREATE TABLE IF NOT EXISTS baños (
    baños_id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
    bañera BOOLEAN,
    agua_caliente BOOLEAN,
    secador_pelo BOOLEAN,
    bidé BOOLEAN,
    productos_limpieza BOOLEAN,
    comprar_prop_id_fk INT UNSIGNED NOT NULL,

    FOREIGN KEY (comprar_prop_id_fk) REFERENCES comprar_prop(comprar_prop_id) ON DELETE RESTRICT ON UPDATE CASCADE
)ENGINE = InnoDB;

INSERT INTO baños
VALUES (1, true, true, false, true, false, 1);
    