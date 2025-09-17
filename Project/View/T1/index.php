<?php  
  $titulo = "Inicio - Trabajo N°1"; 
  include_once $_SERVER['DOCUMENT_ROOT'] . '/PWD_ibenjamindlf/Project/View/components/header.php'; 
?>

  <!-- Header propio -->
  <header class="container text-center py-5">
    <h1 class="display-4 fw-bold text-primary">Trabajo Práctico N°1</h1>
    <p class="lead bg-info text-dark d-inline-block px-4 py-2 rounded-pill mt-3 shadow-sm">
      📝 Resolución de ejercicios
    </p>
  </header>

  <!-- Contenido principal -->
  <main class="container my-5 text-center">
    <h2 class="fw-bold mb-4">Ejercicios</h2>
    <div class="row g-3">
      <div class="col-md-6">
        <a class="btn btn-primary btn-lg w-100 shadow" href="<?php echo $BASE_URL; ?>Project/View/T1/inicio.php">Ejercicio 1</a>
        <a class="btn btn-primary btn-lg w-100 shadow mt-3" href="<?php echo $BASE_URL; ?>Project/View/assets/style/styleCarrusel.css">Ejercicio 2</a>
        <a class="btn btn-primary btn-lg w-100 shadow mt-3" href="<?php echo $BASE_URL; ?>Project/View/assets/style/styleCarrusel.css">Ejercicio 3</a>
        <a class="btn btn-primary btn-lg w-100 shadow mt-3" href="<?php echo $BASE_URL; ?>Project/View/assets/style/styleCarrusel.css">Ejercicio 4</a>
      </div>
      <div class="col-md-6">
        <a class="btn btn-primary btn-lg w-100 shadow" href="<?php echo $BASE_URL; ?>Project/View/assets/style/styleCarrusel.css">Ejercicio 5</a>
        <a class="btn btn-primary btn-lg w-100 shadow mt-3" href="<?php echo $BASE_URL; ?>Project/View/assets/style/styleCarrusel.css">Ejercicio 6</a>
        <a class="btn btn-primary btn-lg w-100 shadow mt-3" href="<?php echo $BASE_URL; ?>Project/View/assets/style/styleCarrusel.css">Ejercicio 7</a>
        <a class="btn btn-primary btn-lg w-100 shadow mt-3" href="<?php echo $BASE_URL; ?>Project/View/assets/style/styleCarrusel.css">Ejercicio 8</a>
      </div>
    </div>
  </main>

<?php 
  include_once $_SERVER['DOCUMENT_ROOT'] . '/PWD_ibenjamindlf/Project/View/components/footer.php'; 
?>
