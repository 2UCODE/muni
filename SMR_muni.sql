drop database if exists SMR_muni;
CREATE DATABASE SMR_muni;

USE SMR_muni;

CREATE TABLE rolUsuario (
    idRolUsuario INT AUTO_INCREMENT PRIMARY KEY,
    nombreRolUsuario VARCHAR(20) NOT NULL
);

CREATE TABLE Usuario (
    DNI varchar(8) PRIMARY KEY,
    nombreUsuario VARCHAR(20) NOT NULL,
    apellidoPaterno VARCHAR(20) NOT NULL,
    apellidoMaterno VARCHAR(20) NOT NULL,
    tipoDocumento VARCHAR(3) NOT NULL,
    numeroDocumento VARCHAR(11) NOT NULL,
    correoUsuario VARCHAR(100) NOT NULL,
    contrasena varchar(100) NOT NULL,
    idRolUsuario INT,
    FOREIGN KEY (idRolUsuario) REFERENCES rolUsuario(idRolUsuario)
);

CREATE TABLE Acceso (
    idAcceso INT AUTO_INCREMENT PRIMARY KEY,
    fechaAcceso DATE NOT NULL,
    horaInicio TIME NOT NULL,
    horaSalida TIME,
    DNI varchar(8),
    FOREIGN KEY (DNI) REFERENCES Usuario(DNI)
);

CREATE TABLE OficinaModulo (
    idOficinaModulo INT AUTO_INCREMENT PRIMARY KEY,
    nombreOficinaModulo VARCHAR(100) NOT NULL,
    tiempoAtencion INT NOT NULL
);
INSERT INTO rolUsuario (nombreRolUsuario) VALUES ('admin'), ('usuario');

-- Insertar un usuario con rol de admin
INSERT INTO Usuario (DNI, nombreUsuario, apellidoPaterno, apellidoMaterno, tipoDocumento, numeroDocumento, correoUsuario, contrasena, idRolUsuario) 
VALUES ('12345678', 'Juan', 'Pérez', 'García', 'DNI', '12345678', '123456', 'juan@example.com', 1);


select * from Usuario;