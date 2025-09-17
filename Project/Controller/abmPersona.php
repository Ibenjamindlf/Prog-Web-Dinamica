<?php 
// ABM de Persona (Alta,Baja,Modificacion)
class AbmPersona {
    // Permite buscar un objeto
    public function buscar($param){
        $where = " true ";
        if ($param != null){
            if  (isset($param['NroDni']))
                $where .= " and NroDni = '".$param['NroDni']."'";
            if  (isset($param['Apellido']))
                $where .= " and Apellido = '".$param['Apellido']."'";
            if  (isset($param['Nombre']))
                $where .= " and Nombre = '".$param['Nombre']."'";
            if  (isset($param['fechaNac']))
                $where .= " and fechaNac = '".$param['fechaNac']."'";
            if  (isset($param['Telefono']))
                $where .= " and Telefono = '".$param['Telefono']."'";
            if  (isset($param['Domicilio']))
                $where .= " and Domicilio = '".$param['Domicilio']."'";
        }
        $arreglo = Persona::listar($where);
        return $arreglo;
    }
    // Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
    private function cargarObjeto ($param){
        $objPersona = null;
        if ( array_key_exists('NroDni',$param) and array_key_exists('Apellido',$param) and array_key_exists('Nombre',$param) and array_key_exists('fechaNac',$param) and array_key_exists('Telefono',$param) and array_key_exists('Domicilio',$param)){
            $objPersona = new Persona();
            $objPersona->setear(
                $param['NroDni'], 
                $param['Apellido'], 
                $param['Nombre'], 
                $param['fechaNac'], 
                $param['Telefono'], 
                $param['Domicilio']
            );
        }
        return $objPersona;
    }

    // Corrobora que dentro del arreglo asociativo estan seteados los campos claves
    private function seteadosCamposClaves($param){
        $resp = false;
        if (isset($param['NroDni'])){
            $resp = true;
        }
        return $resp;
    }

    // Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto que son claves
    private function cargarObjetoConClave($param){
        $objPersona = null;
        if( isset($param['NroDni']) ){
            $objPersona = new Persona();
            $objPersona->setear($param['NroDni'], null, null, null, null, null);
        }
        return $objPersona;
    }

    // permite modificar un objeto
    public function modificacion($param){
        $resp = false;
        $lista = $this->buscar(['NroDni' => $param['NroDni']]);
        if($lista != null){
            $objPersona = $lista[0]; // tomo el primer resultado
            $objPersona ->  setear(
                                $param['NroDni'], 
                                $param['Apellido'], 
                                $param['Nombre'], 
                                $param['fechaNac'], 
                                $param['Telefono'], 
                                $param['Domicilio']);
            if ($objPersona->modificar()){
                $resp = true;
            }
        }
    return $resp;
    }
    // permite eliminar un objeto
    public function baja($param){
        $resp = false;
        if ($this->seteadosCamposClaves($param)){
            $objPersona = $this->cargarObjetoConClave($param);
            if ($objPersona != null and $objPersona->eliminar()){
                $resp = true;
            }
        }
        return $resp;
    }
    // permite agregar un objeto
    public function alta($param){
        $resp = false;
        $busquedaPersona = ["NroDni" => $param["NroDni"]];
        $existePersona = $this->buscar($busquedaPersona);
        if ($existePersona == null) {
            $objPersona = $this->cargarObjeto($param);
            if ($objPersona->insertar()){
                $resp = true;
            }
        }
        return $resp;
    }
}
?>