CREATE TABLE categorias (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    nombre VARCHAR(100) NOT NULL
);

CREATE TABLE vehiculos (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    marca VARCHAR(100) NOT NULL,
    modelo VARCHAR(100),
    anio VARCHAR(4),
    precio VARCHAR(20),
    kilometraje VARCHAR(20),
    color VARCHAR(100),
    numero_de_serie VARCHAR(100),
    categoria_id INTEGER,
    sucursal_id INTEGER,
    FOREIGN KEY (categoria_id) REFERENCES categorias(id),
    FOREIGN KEY (sucursal_id) REFERENCES sucursales(id)
);

CREATE TABLE sucursales (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    nombre VARCHAR(100) NOT NULL,
    direccion VARCHAR(100),
    telefono VARCHAR(100)
);

CREATE TABLE users (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    nombre VARCHAR(100) NOT NULL,
    username VARCHAR(100) NOT NULL,
    password VARCHAR(64) NOT NULL,
    correo VARCHAR(100),
    admin INTEGER NOT NULL
);


CREATE TABLE correos (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    nombre VARCHAR(100) NOT NULL,
    correo VARCHAR(100)
);


CREATE TABLE preferencias (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    id_categoria INTEGER,
    FOREIGN KEY (id_categoria) REFERENCES categorias(id)
);