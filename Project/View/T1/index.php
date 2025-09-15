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
        <a class="btn btn-primary btn-lg w-100 shadow" href="1/Ejercicio1.php">Ejercicio 1</a>
        <a class="btn btn-primary btn-lg w-100 shadow mt-3" href="2/Ejercicio2.php">Ejercicio 2</a>
        <a class="btn btn-primary btn-lg w-100 shadow mt-3" href="3/Ejercicio3.php">Ejercicio 3</a>
        <a class="btn btn-primary btn-lg w-100 shadow mt-3" href="4/Ejercicio4.php">Ejercicio 4</a>
      </div>
      <div class="col-md-6">
        <a class="btn btn-primary btn-lg w-100 shadow" href="5/Ejercicio5.php">Ejercicio 5</a>
        <a class="btn btn-primary btn-lg w-100 shadow mt-3" href="6/Ejercicio6.php">Ejercicio 6</a>
        <a class="btn btn-primary btn-lg w-100 shadow mt-3" href="7/Ejercicio7.php">Ejercicio 7</a>
        <a class="btn btn-primary btn-lg w-100 shadow mt-3" href="8/Inicio.php">Ejercicio 8</a>
      </div>
    </div>
  </main>

<?php 
  include_once $_SERVER['DOCUMENT_ROOT'] . '/PWD_ibenjamindlf/Project/View/components/footer.php'; 
?>
