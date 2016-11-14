CREATE DATABASE pypDB;

CREATE TABLE area_estrategica (
  id int(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  nombre varchar(255) NOT NULL
);

INSERT INTO area_estrategica (id,nombre) VALUES
(1, 'Biotecnologia'),
(2, 'Educacion, Humanidades y Ciencias Sociales'),
(3, 'Mecatronica'),
(4, 'Medicina'),
(5, 'Negocios'),
(6, 'Politica Publica'),
(7, 'Tecnologias de Informacion, Electronica y Comunicaciones'),
(8, 'Tecnologias Sustentables');

CREATE TABLE escuela(
  id int(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  nombre varchar(255) NOT NULL
);

INSERT INTO escuela (id, nombre) VALUES
(1, 'Escuela de Ingenieria y Ciencias'),
(2, 'Escuela de Educacion, Humanidades y Ciencias Sociales\r\n'),
(3, 'EGADE Business School'),
(4, 'Escuela de Gobierno y Transformacion Publica'),
(5, 'Escuela de Medicina');

CREATE TABLE grupo_investigacion (
  id int(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  nombre varchar(255) NOT NULL,
  id_area_estrategica int(11) NOT NULL,
  id_escuela int(11) NOT NULL
);

INSERT INTO grupo_investigacion (id, nombre, id_area_estrategica, id_escuela) VALUES
(4, 'Bioprocesos y Biologia Sintetica  ', 1, 1),
(5, 'Ciencia y Tecnologia del Agua', 8, 1),
(6, 'Consorcio Automotriz ', 3, 1),
(7, 'Energia y Cambio Climatico', 8, 1),
(8, 'Ingenieria Celular y Bioreaccion', 1, 1),
(9, 'Ingenieria Industrial y Metodos Numericos  ', 3, 1),
(10, 'Innovacion de Productos', 3, 1),
(11, 'Manufactura Avanzada', 3, 1),
(12, 'Modelos de Aprendizaje Computaciona', 7, 1),
(13, 'Nanomateriales ', 3, 1),
(14, 'Nanotecnologia para el Diseno de Dispositivos', 3, 1),
(15, 'NutriOmics', 1, 1),
(16, 'Optica y Laseres ', 3, 1),
(17, 'Robotica', 3, 1),
(18, 'Sensores y Dispositivos', 3, 1),
(19, 'Sistemas Inteligentes', 7, 1),
(20, 'Tecnologias Emergentes y Nutricion Molecular ', 1, 1),
(21, 'Telecomunicaciones y Redes', 7, 1),
(22, 'Asuntos Globales', 2, 2),
(23, 'Industrias Culturales y Patrimonio Cultural: Analisis y Tendencias', 2, 2),
(24, 'Investigacion e Innovacion en Educacion', 2, 2),
(25, 'Sociedad del Conocimiento', 2, 2),
(26, 'Transformacion Social y Sostenibilidad', 2, 2),
(27, 'Administracion de Servicios', 5, 3),
(28, 'Comportamiento del Consumidor y Creacion de Valor', 5, 3),
(29, 'Emprendimiento y Liderazgo', 5, 3),
(30, 'Estrategia y Administracion de las Organizaciones en Economias', 5, 3),
(31, 'Emergentes', 5, 3),
(32, 'Estrategias Innovadoras en Mercados Globales', 5, 3),
(33, 'Finanzas y Macroeconomia', 5, 3),
(34, 'Innovacion Social', 5, 3),
(35, 'Retail', 5, 3),
(36, 'Democracia, Instituciones, Seguridad y Justicia', 6, 4),
(37, 'Economia Publica', 6, 4),
(38, 'Emprendimiento Publico e Innovacion', 6, 4),
(39, 'Politica Social', 6, 4),
(40, 'Politicas para Transformacion Urbana, Desarrollo Regional y Energetico', 6, 4),
(41, 'Bioinformatica y Dispositivos Medicos', 4, 5),
(42, 'Innovacion Clinica', 4, 5),
(43, 'Medicina Molecular', 4, 5),
(44, 'Terapia Celular', 4, 5);

CREATE TABLE linea_investigacion(
  id int(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  id_grupo_investigacion int(11) NOT NULL,
  name varchar(255) NOT NULL
);

INSERT INTO linea_investigacion (id, id_grupo_investigacion, name) VALUES
(1, 1, 'Whatever name'),
(2, 34, 'etica y responsabilidad social'),
(3, 34, 'Modelos de desarrollo de liderazgo responsable y sostenible'),
(4, 34, 'Emprendimiento social, corporativo y start ups de alto valor'),
(5, 34, 'Evaluacion del impacto social'),
(6, 34, 'Innovacion social'),
(7, 34, 'Clusters sostenibles'),
(8, 34, 'Grupos virtuales de trabajo'),
(9, 23, 'etica, cultura de paz y sostenibilidad'),
(10, 23, 'Desarrollo economico y social'),
(11, 23, 'Derechos humanos'),
(12, 23, 'Agua y ciudades'),
(13, 23, 'Transformacion social');

CREATE TABLE profesor (
  id int(10) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  id_grupo_investigacion int(11) NOT NULL,
  nombre varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  oficina varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  telefono varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  correo varchar(255) NOT NULL
);

INSERT INTO profesor (id, id_grupo_investigacion, nombre, oficina, telefono, correo) VALUES
(3, 31, 'Bryan William Husted Corregan', 'A3 301', '+52 (81) 8625 6000 ext. 6146', 'bhusted@itesm.mx'),
(4, 23, 'Dora Elvira Garcia Gonzalez', 'A3 301', '+52 (55) 5483 2020', 'dora.garcia@itesm.mx'),
(5, 22, 'Francisco Javier Carrillo Gamboa', 'A3 301', '+52 (81) 8625 6000 ext. 6146', 'fjcarrillo@itesm.mx'),
(6, 25, 'Rajagopal Rajagopal', 'A3 301', '+52 (55) 5483 2221', 'rajagopal@itesm.mx'),
(7, 26, 'Ajnesh Prasad', 'A3 301', '+52 (55) 9177 7673', 'prasad@itesm.mx'),
(8, 27, 'Anabella del Rosario Davila Martinez', 'A3 301', '+52 (81) 8625 6000 ext. 6150', 'anabella.davila@itesm.mx'),
(9, 20, 'Blanca G. Lopez Morales', 'A3 301', '+52 (81) 8625 6000 ext. 6146', 'blopez@itesm.mx'),
(10, 23, 'Ismael Aguilar Barajas', 'A3 301', '+52 (81) 8625 6000 ext. 6146', 'iaguilar@itesm.mx'),
(11, 24, 'Javier Francisco Reynoso Javier', 'A3 301', '+52 (81) 8625 6000 ext. 6179', 'jreynoso@itesm.mx'),
(12, 30, 'Jose Antonio Nunez Mora ', 'A3 301', '+52 (55) 5483 2240', 'janm@itesm.mx'),
(13, 22, 'Jose Heriberto Garcia Pena', 'A3 301', '+52 (81) 8625 6000 ext. 6146', 'jhgarcia@itesm.mx'),
(14, 20, 'Maria de la Cruz Castro Ricalde', 'A3 301', '+52 (81) 8625 6000 ext. 6146', 'maricruz.castro@itesm.mx'),
(15, 20, 'Pol Popovic Karic', 'A3 301', '+52 (81) 8625 6000 ext. 6146', 'pol.popovic@itesm.mx'),
(16, 25, 'Raquel Minerva Castano Gonzalez', 'A3 301', '+52 (81) 8625 6000 ext. 6177', 'rcastano@itesm.mx'),
(17, 30, 'Rene Cabral Torres', 'A3 301', '+52 (81) 8328 4170', 'rcabral@itesm.mx'),
(18, 30, 'Roberto Joaquin Santillan Salgado', 'A3 301', '+52 (81) 8625 6000 ext. 6035', 'roberto.santillan@itesm.mx'),
(19, 31, 'Carlos Scheel Mayenberger', 'A3 301', '+52 (81) 8625 6174', 'cscheel@itesm.mx'),
(20, 31, 'Consuelo Adelaida Garcia de la Torre', 'A3 301', '+52 (81) 8625 6000 ext. 6168', 'cogarcia@itesm.mx'),
(21, 23, 'Daniel Carrasco Brihuega', 'A3 301', '+52 (81) 8625 6000 ext. 6146', 'dcarrascob@itesm.mx'),
(22, 19, 'David Jamile Sarquis Ramirez', 'A3 301', '+52 (81) 8625 6000 ext. 6146', 'david.sarquis@itesm.mx'),
(23, 19, 'Dejan Mihailovic Nikolajevic', 'A3 301', '+52 (81) 8625 6000 ext. 6146', 'dmihailo@itesm.mx'),
(24, 25, 'Edgar Antonio Centeno Velazquez', 'A3 301', '+52 (81) 8625 6000 ext. 6146', 'ecenteno@itesm.mx');

CREATE TABLE proyecto (
  id int(10) UNSIGNED NOT NULL,
  nombre varchar(255) NOT NULL,
  id_profesor int(11) NOT NULL,
  id_linea_investigacion int(11) NOT NULL,
  estado enum('abierto','cerrado','terminado') NOT NULL,
  cupo_limite int(10) UNSIGNED NOT NULL,
  descripcion varchar(255)NOT NULL
);

INSERT INTO proyecto (id, nombre, id_profesor, id_linea_investigacion,estado, cupo_limite, descripcion) VALUES
(1, 'Algo de igem', 1, 1, 'terminado', 60, 'whatever'),
(2, 'Algo de igem', 2, 1, 'cerrado', 60, 'whatever'),
(3, 'Otra cosa de igem', 2, 1, 'abierto', 60, 'whatever'),
(4, 'IGEM', 1, 3, 'abierto', 15, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut '),
(5, 'Proyecto Social y etica', 1, 4, 'abierto', 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut ');