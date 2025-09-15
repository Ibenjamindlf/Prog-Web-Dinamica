<?php
// /////////////////////////////
// CONFIGURACIÓN DEL PROYECTO //
// /////////////////////////////

// Nombre de la carpeta del proyecto dentro de htdocs
$PROYECTO = 'PWD_ibenjamindlf';

// Ruta física absoluta al proyecto
// (en XAMPP normalmente: C:\xampp\htdocs\PWD_IBENJAMINDLF\)
$ROOT = $_SERVER['DOCUMENT_ROOT'] . "/$PROYECTO/";

// Archivos globales
include_once $ROOT . 'project/utils/funciones.php';

// URL base para redirecciones (http://localhost/PWD_IBENJAMINDLF/)
$BASE_URL = "http://" . $_SERVER['HTTP_HOST'] . "/$PROYECTO/";

// Ejemplos de URLs para redirigir
$LOGIN = $BASE_URL . "Project/View/home/login.php";
$PRINCIPAL = $BASE_URL . "Project/View/home/index.php";

// Guardar la ruta en $GLOBALS para poder usarla en cualquier archivo
$GLOBALS['ROOT'] = $ROOT;
$GLOBALS['BASE_URL'] = $BASE_URL;
