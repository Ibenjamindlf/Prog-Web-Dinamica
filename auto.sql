CREATE DATABASE autosInformacion;
USE autosInformacion;

CREATE TABLE persona (
    NroDni VARCHAR(10) NOT NULL,
    Apellido VARCHAR(50) NOT NULL,
    Nombre VARCHAR(50) NOT NULL,
    fechaNac DATE NOT NULL DEFAULT '0000-00-00',
    Telefono VARCHAR(20) NOT NULL,
    Domicilio VARCHAR(200) NOT NULL,
    PRIMARY KEY (NroDni)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE auto (
    Patente VARCHAR(10) NOT NULL,
    Marca VARCHAR(50) NOT NULL,
    Modelo INT NOT NULL,
    DniDuenio VARCHAR(10) NOT NULL,
    PRIMARY KEY (Patente),
    FOREIGN KEY (DniDuenio) 
        REFERENCES persona(NroDni)
        ON UPDATE RESTRICT
        ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
