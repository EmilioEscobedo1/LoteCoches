CREATE TABLE vehiculos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    marca VARCHAR(100) NOT NULL,
    modelo VARCHAR(100),
    anio VARCHAR(4),
    precio VARCHAR(20),
    kilometraje VARCHAR(20),
    color VARCHAR(100),
    numero_de_serie VARCHAR(100),
    categoria_id INT,
    FOREIGN KEY (categoria_id) REFERENCES categorias(id)
);

CREATE TABLE sucursales (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    direccion VARCHAR(100),
    telefono VARCHAR (100)
);

CREATE TABLE categorias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR (100) NOT NULL
);

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    username VARCHAR(100) NOT NULL,
    password VARCHAR(64) NOT NULL,
    correo VARCHAR(100),
    admin BIT NOT NULL
);

CREATE TABLE correos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    correo VARCHAR(100)
);

CREATE TABLE preferencias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_categoria INT,
    FOREIGN KEY (id_categoria) REFERENCES categorias(id)
);