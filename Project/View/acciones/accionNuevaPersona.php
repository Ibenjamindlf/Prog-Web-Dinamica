<?php 
include_once $_SERVER['DOCUMENT_ROOT'] . '/PWD_ibenjamindlf/init.php';
$titulo = 'Persona Ingresada';
$abmPersona = new AbmPersona();
include_once $GLOBALS['ROOT'] . 'Project/Controller/validadores/validadorNuevaPersona.php';
$validador = new Validador();
include_once $GLOBALS['ROOT'] . 'Project/View/components/header.php';
?>
<!-- header propio -->
<header class="bg-light py-1">
    <div class="container px-4 px-lg-5 my-2">
        <div class="text-center text-white">
            <h4>Peticion para registrar una persona</h4>
        </div>
    </div>
</header>

<?php
    $datos = data_submitted();

    $nombre = $datos['nombre'];
    $validador->validacionNombre($nombre);

    $apellido = $datos['apellido'];
    $validador->validacionApellido($apellido);

    $nroDni = $datos['nroDni'];
    $validador->validacionNroDni($nroDni);
    
    $fechaNacimiento = $datos['fechaNacimiento'];
    $validador->validacionFechaNacimiento($fechaNacimiento);

    $nroTelefono = $datos['numTelefono'];
    $validador->validacionNumeroTelefono($nroTelefono);

    $domicilio = $datos['domicilio'];
    $validador->validacionDomicilio($domicilio);

    $datosEnArray = [$nombre,$apellido,$nroDni,$fechaNacimiento,$nroTelefono,$domicilio];

    if ($validador->hayErrores()){ 
?>
<div class="container">
    <div class="row">
        <div class="text-center col-md-12 card bg-danger shadow">
            <h3>error</h3>
            <p>
                <?php 
                $errores = $validador->getErrores();
                // print_r($errores);
                $cantErrores = count($errores);
                $i = 0;
                while ($i<$cantErrores) {
                    echo ($errores[$i] . "<br>");
                    $i++;
                }
                ?>
            </p>
        </div>
    </div>
</div>
<?php } else { ?>
    <div class="container">
    <div class="row">
        <div class="card bg-primary shadow">
            <h3>Ok</h3>
            <p>
                <?php 
                $cantDatos = count($datosEnArray);
                $i = 0;
                while ($i<$cantDatos) {
                    echo ($datosEnArray[$i] . "<br>");
                    $i++;
                }
                ?>
            </p>
        </div>
    </div>
</div>
<?php } ?>
    <div class="mt-5">
        <a href="../admin/nuevaPersona.php" class="btn btn-outline-primary">Volver</a>
    </div>
<?php 
include_once $GLOBALS['ROOT'] . 'Project/View/components/footer.php';
?>