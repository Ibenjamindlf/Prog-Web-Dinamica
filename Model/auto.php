<?php 
class auto {
    // Atributos de la clase
    // Por cada columna de la tabla en la base de datos
    private $Patente;
    private $Marca;
    private $Modelo;
    private $NroDniPropietario;

    // constructor de la clase
    public function __construct($Patente, $Marca, $Modelo, $NroDniPropietario) {
        $this->Patente = $Patente;
        $this->Marca = $Marca;
        $this->Modelo = $Modelo;
        $this->NroDniPropietario = $NroDniPropietario;
    }

    // getters
    public function getPatente() {
        return $this->Patente;
    }
    public function getMarca() {
        return $this->Marca;
    }
    public function getModelo() {
        return $this->Modelo;
    }
    public function getNroDniPropietario() {
        return $this->NroDniPropietario;
    }

    // setters
    public function setPatente($Patente) {
        $this->Patente = $Patente;
    }
    public function setMarca($Marca) {
        $this->Marca = $Marca;
    }
    public function setModelo($Modelo) {
        $this->Modelo = $Modelo;
    }
    public function setNroDniPropietario($NroDniPropietario) {
        $this->NroDniPropietario = $NroDniPropietario;
    }
    // Método para representar el objeto como una cadena
    public function __toString() {
        // Guardamos todos los atributos en variables locales
        $patente = $this->getPatente();
        $Marca = $this->getMarca();
        $Modelo = $this->getModelo();
        $NroDniPropietario = $this->getNroDniPropietario();
        // Retornamos una cadena con la información del objeto
        return (
            "Patente: $patente, " .
            "Marca: $Marca, " .
            "Modelo: $Modelo, " .
            "NroDniPropietario: $NroDniPropietario"
        );
    }
    // 5 funciones (buscar,listar,insertar,modificar,eliminar) -> phpMyAdmin
    // Funcion para buscar un auto por su patente en la base de datos
    // Return el objeto auto si se encontró, null si no
    public static function buscar($patente){
        $dataBase = new DataBase();
        $consulta = "SELECT * FROM auto 
                    WHERE Patente = '" . $patente . "'";
        $autoEncontrado = null;
        if ($dataBase->iniciar()) {
            if ($dataBase->ejecutar($consulta)) {
                // Mientras $fila tenga valor el if se ejecuta
                if ($fila = $dataBase->registro()) {
                    $autoEncontrado = new auto(
                            $fila['Patente'],
                            $fila['Marca'],
                            $fila['Modelo'],
                            $fila['DniDuenio']
                        );
                }
                } else {
                    throw new Exception($dataBase->getError());
                }
        } else {
            throw new Exception("No se pudo iniciar la base de datos");
        }
        return $autoEncontrado;
    }
    // Funcion para insertar un nuevo auto
    // Return true si se pudo insertar, false si no
    public function insertar(){
        $dataBase = new DataBase();
        $inserto = false;
        if ($dataBase->iniciar()) {
            $consulta = "INSERT INTO auto(Patente, Marca, Modelo, DniDuenio) 
                        VALUES ('" . $this->getPatente() . "',
                                '" . $this->getMarca() . "',
                                '" . $this->getModelo() . "',
                                '" . $this->getNroDniPropietario() . "')";
            if ($dataBase->ejecutar($consulta)) {
                $inserto = true;
            } else {
                throw new Exception($dataBase->getError());
            }
        } else {
            throw new Exception("No se pudo iniciar la base de datos");
        }
        return $inserto;
    }
    // Funcion para modificar un auto
    // Return true si se pudo modificar, false si no
    public function modificar(){
        $dataBase = new DataBase();
        $modifico = false;
        if ($dataBase->iniciar()) {
            $consulta = "UPDATE auto 
                        SET Marca = '" . $this->getMarca() . "',
                            Modelo = '" . $this->getModelo() . "',
                            DniDuenio = '" . $this->getNroDniPropietario() . "'
                        WHERE Patente = '" . $this->getPatente() . "'";
            if ($dataBase->ejecutar($consulta)) {
                $modifico = true;
            } else {
                throw new Exception($dataBase->getError());
            }
        } else {
            throw new Exception("No se pudo iniciar la base de datos");
        }
        return $modifico;
    }
    // Funcion para eliminar un auto
    // Return true si se pudo eliminar, false si no
    public function eliminar(){
        $dataBase = new DataBase();
        $elimino = false;
        if ($dataBase->iniciar()) {
            $consulta = "DELETE FROM auto 
                        WHERE Patente = '" . $this->getPatente() . "'";
            if ($dataBase->ejecutar($consulta)) {
                $elimino = true;
            } else {
                throw new Exception($dataBase->getError());
            }
        } else {
            throw new Exception("No se pudo iniciar la base de datos");
        }
        return $elimino;
    }
    // Funcion para listar todos los autos
    // Return un array con todos los autos o null si no hay
    public static function listar($condicion = ""){
        $dataBase = new DataBase();
        $listaAutos = null;
        $consulta = "SELECT * FROM auto ";
        if ($condicion != "") {
            $consulta = $consulta . ' WHERE ' . $condicion;
        }
        $consulta = $consulta . " ORDER BY Patente ";
        if ($dataBase->iniciar()) {
            if ($dataBase->ejecutar($consulta)) {
                while ($fila = $dataBase->registro()) {
                    $autoEncontrado = new auto(
                            $fila['Patente'],
                            $fila['Marca'],
                            $fila['Modelo'],
                            $fila['DniDuenio']
                        );
                    $listaAutos[] = $autoEncontrado;
                }
            } else {
                throw new Exception($dataBase->getError());
            }
        } else {
            throw new Exception("No se pudo iniciar la base de datos");
        }
        return $listaAutos;
    }
}
?>