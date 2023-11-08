CREATE DATABASE NBADatabase;

USE NBADatabase;

CREATE TABLE Conferencias (
idConferencia INT PRIMARY KEY AUTO_INCREMENT,
Nombre VARCHAR(50) NOT NULL
);

INSERT INTO Conferencias (Nombre) VALUES
('Este'),
('Oeste');

CREATE TABLE Equipos (
idEquipos INT PRIMARY KEY AUTO_INCREMENT,
Nombre VARCHAR(100) NOT NULL,
ConferenciaID INT,
FOREIGN KEY (ConferenciaID) REFERENCES Conferencias(idConferencia)
);

INSERT INTO Equipos (Nombre, ConferenciaID) VALUES
('Chicago Bulls', 1),
('Miami Heat', 1),
('Cleveland Cavaliers', 1),
('LA Lakers', 2),
('Utah Jazz', 2),
('Denver Nuggets', 2);

CREATE TABLE Jugadores (
idJugadores INT PRIMARY KEY AUTO_INCREMENT,
Nombre VARCHAR(50) NOT NULL,
Apellido VARCHAR(50) NOT NULL,
Posicion VARCHAR(20) NOT NULL,
EquipoID INT,
ConferenciaID INT,
FOREIGN KEY (EquipoID) REFERENCES Equipos(idEquipos) ON DELETE CASCADE,
FOREIGN KEY (ConferenciaID) REFERENCES Conferencias(idConferencia)
);

INSERT INTO Jugadores (Nombre, Apellido, Posicion, EquipoID, ConferenciaID) VALUES
('Lonzo', 'Ball', 'Base', 1, 1),
('DeMar', 'DeRozan', 'Escolta', 1, 1),
('Torrey', 'Craig', 'Alero', 1, 1),
('Patrick', 'Williams', 'AlaPivot', 1, 1),
('Andre', 'Drummond', 'Pivot', 1, 1),

('Kyle', 'Lowry', 'Base', 2, 1),
('Justin', 'Champagnie', 'Escolta', 2, 1),
('Jimmy', 'Butler', 'Alero', 2, 1),
('Bam', 'Adebayo', 'AlaPivot', 2, 1),
('Orlando', 'Robinson', 'Pivot', 2, 1),

('Ricky', 'Rubio', 'Base', 3, 1),
('Isaac', 'Okoro', 'Escolta', 3, 1),
('Emoni', 'Bates', 'Alero', 3, 1),
('Dean', 'Wade', 'AlaPivot', 3, 1),
('Damian', 'Jones', 'Pivot', 3, 1),

('DAngelo', 'Russell', 'Base', 4, 2),
('Cam', 'Reddish', 'Escolta', 4, 2),
('LeBron', 'James', 'Alero', 4, 2),
('Anthony', 'Davies', 'AlaPivot', 4, 2),
('Jaxson', 'Hayes', 'Pivot', 4, 2),

('Jordan', 'Clarkson', 'Base', 5, 2),
('Kris', 'Dunn', 'Escolta', 5, 2),
('Luka', 'Samanic', 'Alero', 5, 2),
('John', 'Collins', 'AlaPivot', 5, 2),
('Micah', 'Potter', 'Pivot', 5, 2),

('Reggie', 'Jackson', 'Base', 6, 2),
('Justin', 'Holiday', 'Escolta', 6, 2),
('Vlatko', 'Cancar', 'Alero', 6, 2),
('Zeke', 'Nnaji', 'AlaPivot', 6, 2),
('DeAndre', 'Jordan', 'Pivot', 6, 2);

CREATE TABLE Partidos (
idPartidos INT PRIMARY KEY AUTO_INCREMENT,
EquipoLocalID INT,
EquipoVisitanteID INT,
PuntosLocal INT,
PuntosVisitante INT,
FOREIGN KEY (EquipoLocalID) REFERENCES Equipos(idEquipos),
FOREIGN KEY (EquipoVisitanteID) REFERENCES Equipos(idEquipos)
);

INSERT INTO Partidos (EquipoLocalID, EquipoVisitanteID, PuntosLocal, PuntosVisitante) VALUES
(1, 2, 100, 95),
(1, 3, 105, 110),
(2, 1, 98, 102),
(2, 3, 99, 97),
(3, 1, 92, 88),
(3, 2, 85, 90),
(4, 5, 110, 105),
(4, 6, 115, 112),
(5, 4, 99, 101),
(5, 6, 105, 100),
(6, 4, 90, 94),
(6, 5, 102, 100);

CREATE TABLE IF NOT EXISTS usuario (
id int(11) NOT NULL AUTO_INCREMENT,
identificador varchar(40) COLLATE utf8_spanish_ci NOT NULL,
contrasenna varchar(80) COLLATE utf8_spanish_ci NOT NULL,
codigoCookie varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
caducidadCodigoCookie timestamp NULL DEFAULT NULL,
tipoUsuario int(11) NOT NULL,
nombre varchar(50) COLLATE utf8_spanish_ci NOT NULL,
apellidos varchar(50) COLLATE utf8_spanish_ci NOT NULL,
PRIMARY KEY (id)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO usuario (id, identificador, contrasenna, codigoCookie, caducidadCodigoCookie, tipoUsuario, nombre, apellidos) VALUES
(1, 'mengibar8', 'daw', NULL, NULL, 1, 'Christian', 'Mengibar');