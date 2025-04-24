CREATE DATABASE veterinaria_happy_dog;

USE veterinaria_happy_dog;

CREATE TABLE roles (
    id_rol INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE usuarios (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    primer_apellido VARCHAR(50) NOT NULL,
    segundo_apellido VARCHAR(50) NOT NULL,
    correo VARCHAR(100) NOT NULL UNIQUE,
    clave VARCHAR(255) NOT NULL,
    telefono VARCHAR(20),
    id_rol INT NOT NULL,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE mascotas (
    id_mascota INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    especie VARCHAR(100) NOT NULL,
    raza VARCHAR(100),
    edad INT NOT NULL CHECK (edad >= 0),
    id_usuario INT NOT NULL,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS reseñas (
    id_reseña INT AUTO_INCREMENT PRIMARY KEY,
    nombre_cliente VARCHAR(100) NOT NULL,
    experiencia TEXT NOT NULL,
    fecha_publicacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    estado ENUM('pendiente', 'aprobado', 'rechazado') DEFAULT 'pendiente',
    calificacion INT CHECK (calificacion BETWEEN 1 AND 5)
);

INSERT INTO reseñas (nombre_cliente, experiencia, estado, calificacion)
VALUES 
('Juan Pérez', 'Excelente servicio, mi perro fue atendido con mucho cuidado y profesionalismo.', 'aprobado', 5),
('María Gómez', 'Muy buena atención, los veterinarios son muy amables y explican todo claramente.', 'aprobado', 4),
('Carlos López', 'El servicio fue bueno, aunque la espera fue un poco larga.', 'aprobado', 3);


INSERT INTO roles (nombre)
VALUES ('administrador'),('veterinario'),('cliente');

-- $hash = crypt('admin123', '$2y$10$'.bin2hex(random_bytes(22)));
INSERT INTO usuarios (nombre, primer_apellido, segundo_apellido, correo, clave, telefono, id_rol)
VALUES ('Admin', 'Master', 'Root', 'admin@correo.com', '$2y$10$9C3FhY8g4WYTbI8CGW4mV.lcgrgSkA/oOCfd1k9ImdAY2lz4h1Y5q', '88888888', 1);



select * from roles;

select * from usuarios;


select * from mascotas;

SELECT AVG(edad) as promedio FROM mascotas;

