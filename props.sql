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
VALUES 
    (1,'cristian', 'bösz', 'cristianbosz@davinci.edu.ar', '2000/06/05', '$2y$10$50WxPV0HNkYLaQAnH4ccOuiBjmAjEVoxzJoIt6cNCCjpOK9GHMyPm', 'calkestis.jpg', 1);
    
