Se deben de poder agregar lotes, editar lotes, mover carros de un lote a otro, el publico en general pueda entrar al lote de carros
darle click a un carro y llegar a la pagina del carro en especifico, que se puedan buscar carros, en rangos de precios, categorias,
catalogo de categorias (sedanes, hatchbacks, suvs, pickups, etc.) que la gente se pueda suscribir con su direccion de correo, para
que avise que mande un correo cada que hay un nuevo coche por seccion escogida por el cliente, tenedr un prefijo admin para administrar
la pagina y el sistema y logearme en un log in, reportes, crear un dashboard para los reportes. charts.js son graficas.

Crear base de datos en SQLITE con las siguientes relaciones: 

vehiculos: id, marca, modelo, año, precio, kilometraje, color, numero_de_serie
sucursales: id, nombre, direccion, telefono
categorias: id, nombre
users: id, username, password, correo, admin
correos:  id, nombre, correo
preferencias: id, fk_categorias
