<?php 
// ABM de Auto (Alta,Baja,Modificacion)
// Atributos de auto: Patente,marca,modelo,DniDuenio (4)
class AbmAuto {
    // Permite buscar un objeto
    public function buscar($param)
    {
        $where = " true ";
        if ($param != null) {
            if (isset($param['Patente']))
                $where .= " and Patente = '".$param['Patente']."'";
            if (isset($param['Marca']))
                $where .= " and Marca = '".$param['Marca']."'";
            if (isset($param['Modelo']))
                $where .= " and Modelo = '".$param['Modelo']."'";
            if (isset($param['DniDuenio']))
                $where .= " and DniDuenio = '".$param['DniDuenio']."'";
        }
        $arreglo = Auto::listar($where);
        // ✅ Si viene vacío, devuelvo null
        if (empty($arreglo)) {
            $arreglo = null;
        }
        return $arreglo;
    }
    // Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
    private function cargarObjeto ($param){
        $objAuto = null;
        if (array_key_exists('Patente',$param) and
        array_key_exists('Marca',$param) and
        array_key_exists('Modelo',$param) and
        array_key_exists('DniDuenio',$param)){
            $objAuto = new Auto();
            $objAuto->setear(
                $param['Patente'],
                $param['Marca'],
                $param['Modelo'],
                $param['DniDuenio']
            );
        }
        return $objAuto;
    }
    // Corrobora que dentro del arreglo asociativo estan seteados los campos claves
    private function seteadosCamposClaves($param){
        $resp = false;
        if (isset($param['Patente'])){
            $resp = true;
        }
        return $resp;
    }
    // Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto que son claves
    private function cargarObjetoConClave($param){
        $objAuto = null;
        if (isset($param['Patente'])){
            $objAuto = new Auto();
            $objAuto->setear($param['Patente'],null,null,null);
        }
        return $objAuto;
    }
    // permite modificar un objeto
    public function modificacion($param){
    $resp = false;
    $lista = $this->buscar(['Patente' => $param['Patente']]);
    if ($lista != null){
        $objAuto = $lista[0]; // tomo el primer resultado
        $objAuto->setear(
            $param['Patente'],
            $param['Marca'],
            $param['Modelo'],
            $param['DniDuenio']
        );
        if ($objAuto->modificar()){
            $resp = true;
        }
    }
    return $resp;
    }
    // Restantes: baja,alta
    // Permite eliminar un objeto
    public function baja($param){
        $resp = false;
        if ($this->seteadosCamposClaves($param)){
            $objAuto = $this->cargarObjetoConClave($param);
            if ($objAuto != null and $objAuto->eliminar()){
                $resp = true;
            }
        }
        return $resp;
    }
    // Permite agregar un objeto
    public function alta($param){
        $resp = false;
        $busquedaAuto = ["Patente" => $param["Patente"]];
        $existeAuto = $this->buscar($busquedaAuto);
        if ($existeAuto == null){
            $objAuto = $this->cargarObjeto($param);
            if ($objAuto->insertar()){
                $resp = true;
            }
        }
        return $resp;
    }
}
?>