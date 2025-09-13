<?php 
class persona {
    // Atributos de la clase
    // Por cada columna de la tabla en la base de datos
    private $NroDni;
    private $Apellido;
    private $Nombre;
    private $fechaNac;
    private $Telefono;
    private $Domicilio;

    // constructor de la clase
    public function __construct($NroDni, $Apellido, $Nombre, $fechaNac, $Telefono, $Domicilio) {
        $this->NroDni = $NroDni;
        $this->Apellido = $Apellido;
        $this->Nombre = $Nombre;
        $this->fechaNac = $fechaNac;
        $this->Telefono = $Telefono;
        $this->Domicilio = $Domicilio;
    }

    // getters
    public function getNroDni() {
        return $this->NroDni;
    }
    public function getApellido() {
        return $this->Apellido;
    }
    public function getNombre() {
        return $this->Nombre;
    }
    public function getFechaNac() {
        return $this->fechaNac;
    }
    public function getTelefono() {
        return $this->Telefono;
    }
    public function getDomicilio() {
        return $this->Domicilio;
    }

    // setters
    public function setNroDni($NroDni) {
        $this->NroDni = $NroDni;
    }
    public function setApellido($Apellido) {
        $this->Apellido = $Apellido;
    }
    public function setNombre($Nombre) {
        $this->Nombre = $Nombre;
    }
    public function setFechaNac($fechaNac) {
        $this->fechaNac = $fechaNac;
    }
    public function setTelefono($Telefono) {
        $this->Telefono = $Telefono;
    }
    public function setDomicilio($Domicilio) {
        $this->Domicilio = $Domicilio;
    }
    // Método para representar el objeto como una cadena
    public function __toString() {
        // Guardamos todos los atributos en variables locales
        $NroDni = $this->getNroDni();
        $Apellido = $this->getApellido();
        $Nombre = $this->getNombre();
        $fechaNac = $this->getFechaNac();
        $Telefono = $this->getTelefono();
        $Domicilio = $this->getDomicilio();
        // Retornamos una cadena con la información del objeto
        return (
            "DNI: $NroDni, Apellido: $Apellido, Nombre: $Nombre, Fecha de Nacimiento: $fechaNac, Teléfono: $Telefono, Domicilio: $Domicilio"
        );
    }
    // 5 funciones (buscar,listar,insertar,modificar,eliminar) -> phpMyAdmin

    // Funcion para buscar una persona por su nroDNI en la base de datos
    // Return true si se encontró a la persona, false si no
    public static function buscar($numeroDoc){
        $dataBase = new DataBase();
        $consulta = "SELECT * FROM persona 
                    WHERE NroDni = '" . $numeroDoc . "'";
        $personaEncontrada = null;
        if ($dataBase->iniciar()) {
            if ($dataBase->ejecutar($consulta)) {
                // Mientras $fila tenga valor el if se ejecuta
                if ($fila = $dataBase->registro()) {
                    $personaEncontrada = new Persona(
                            $fila['NroDni'],
                            $fila['Apellido'],
                            $fila['Nombre'],
                            $fila['fechaNac'],
                            $fila['telefono'],
                            $fila['Domicilio']
                        );
                }
                } else {
                    throw new Exception($dataBase->getError());
                }
            } else {
                throw new Exception($dataBase->getError());
            }
        return $personaEncontrada;
    }
    // Funcion para insertar una nueva persona
    // Return true si se pudo insertar, false si no
    public function insertar() {
        $dataBase = new DataBase();
        $respuesta = false;
        $consulta = "INSERT INTO persona (NroDni, Apellido, Nombre, fechaNac, Telefono, Domicilio)
                    VALUES ('" . $this->getNroDni() . "', '" . $this->getApellido() . "', '" .
                                $this->getNombre() . "', '" . $this->getFechaNac() . "', '" .
                                $this->getTelefono() . "', '" . $this->getDomicilio() . "')";
        if ($dataBase->iniciar()) {
            if ($dataBase->ejecutar($consulta)) {
                $respuesta = true;
            } else {
                throw new Exception($dataBase->getError());
            }
        } else {
            throw new Exception($dataBase->getError());
        }
        return $respuesta;
    }
    // Funcion para modificar una persona
    // Return true si se pudo modificar, false si no
    public function modificar() {
    $respuesta = false;
    $dataBase = new DataBase();
    $consulta = "UPDATE persona SET NroDni = '" . $this->getNroDni() . "',
                                    apellido = '" . $this->getApellido() . "',
                                    Nombre = '" . $this->getNombre() . "',
                                    fechaNac = '" . $this->getFechaNac() . "',
                                    Telefono = '" . $this->getTelefono() . "',
                                    Domicilio = '" . $this->getDomicilio() . "'
                WHERE NroDni = '" . $this->getNroDni() . "'";
    if ($dataBase->iniciar()) {
        if ($dataBase->ejecutar($consulta)) {
            $respuesta = true;
        } else {
            throw new Exception($dataBase->getError());
        }
    } else {
        throw new Exception($dataBase->getError());
    }
    return $respuesta;
    }
    // Funcion para eliminar una persona
    // Return true si se pudo eliminar, false si no
    public function eliminar() {
    $respuesta = false;
    $dataBase = new DataBase();
    if ($dataBase->iniciar()) {
        $consulta = "DELETE FROM persona 
                    WHERE NroDni = '" . $this->getNroDni() . "'";
        if ($dataBase->ejecutar($consulta)) {
            $respuesta = true;
        } else {
            throw new Exception($dataBase->getError());
        }
    } else {
        throw new Exception($dataBase->getError());
    }
    return $respuesta;
    }
    // Funcion para listar todas las personas
    // Return un array con todas las personas o null si no hay
    public static function listar($condicion = "") {
        $arregloPersonas = null;
        $dataBase = new DataBase();
        $consulta = "SELECT * FROM persona ";
        if ($condicion != "") {
            $consulta = $consulta . ' WHERE ' . $condicion;
        }
        $consulta .= " ORDER BY Apellido";
        if ($dataBase->iniciar()) {
            if ($dataBase->ejecutar($consulta)) {
                $arregloPersonas = array();
                // Mientras $fila tenga valor el while se ejecuta
                while ($fila = $dataBase->registro()) {
                    $personaEncontrada = new Persona(
                            $fila['NroDni'],
                            $fila['Apellido'],
                            $fila['Nombre'],
                            $fila['fechaNac'],
                            $fila['telefono'],
                            $fila['Domicilio']
                        );
                    array_push($arregloPersonas, $personaEncontrada);
                }
            } else {
                throw new Exception($dataBase->getError());
            }
        } else {
            throw new Exception($dataBase->getError());
        }
        return $arregloPersonas;
    }
}
?>