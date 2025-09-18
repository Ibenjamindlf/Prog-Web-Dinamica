<?php 
include_once $_SERVER['DOCUMENT_ROOT'] . '/PWD_ibenjamindlf/init.php';
$titulo = 'Búsqueda de auto';
// Creo el manejador
$abmAuto = new AbmAuto();
$abmPersona = new AbmPersona();
// Obtengo los datos enviados del form
$datos = data_submitted();
// Extraigo la patente (si existe en los datos)
$patente = isset($datos['patente']) ? $datos['patente'] : null;
// Busco autos según la patente
$listadoDeAutos = $abmAuto->buscar(['Patente' => $patente]);
include_once $GLOBALS['ROOT'] . 'Project/View/components/header.php';
?>

<!-- Header propio -->
<header class="bg-light py-1">
    <div class="container px-4 px-lg-5 my-2">
        <div class="text-center text-white">
            <h4>Auto con patente <?php echo $patente ?></h4>
        </div>
    </div>
</header>
<div class="container mt-5 text-center">
<table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th class="text-center">Patente</th>
                        <th class="text-center">Marca</th>
                        <th class="text-center">Modelo</th>
                        <th class="text-center">Nombre y Apellido Propietario</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($listadoDeAutos)) { 
                        foreach ($listadoDeAutos as $unAuto) { ?>
                            <tr>
                                <td class="text-center"><?php echo $unAuto->getPatente(); ?></td>
                                <td class="text-center"><?php echo $unAuto->getMarca(); ?></td>
                                <td class="text-center"><?php echo $unAuto->getModelo(); ?></td>
                                <td class="text-center">
                                    <?php
                                    $dniPropietario = $unAuto->getNroDniPropietario();
                                    $personas = $abmPersona->buscar(['NroDni' => $dniPropietario]);
                                    if (!empty($personas)) {
                                        $persona = $personas[0]; // primer Persona
                                        echo $persona->getNombre(); // se imprime el nombre
                                        echo (" " . $persona->getApellido()); // Se imprime el apellido
                                    } else {
                                        echo "No tiene";
                                    }
                                    ?>
                                </td>
                            </tr>
                        <?php } 
                    } else { ?>
                        <tr>
                            <td colspan="4" class="text-center">No hay autos cargados con la patente <?php echo $patente; ?>.</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
</div>