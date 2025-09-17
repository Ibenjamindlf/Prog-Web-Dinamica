<?php  
  $titulo = "Inicio - Trabajo N°1"; 
  include_once $_SERVER['DOCUMENT_ROOT'] . '/PWD_ibenjamindlf/Project/View/components/header.php'; 
?>
  <!-- Header propio -->
  <header class="container text-center py-5">
    <h1 class="display-4 fw-bold text-primary">Trabajo Práctico N°2</h1>
    <p class="lead bg-info text-dark d-inline-block px-4 py-2 rounded-pill mt-3 shadow-sm">
      📝 Resolución de ejercicios
    </p>
  </header>

  <!-- Ejercicios -->
  <main class="container my-5 text-center">
    <h2 class="fw-bold mb-4">Ejercicios</h2>
    <div class="row g-3">
      <div class="col-md-12">
        <a class="btn btn-primary btn-lg w-100 shadow" href="./2/index.php">Ejercicio 2</a>
        <a class="btn btn-primary btn-lg w-100 shadow mt-3" href="./3/B&C/inicio.php">Ejercicio 3</a>
        <a class="btn btn-primary btn-lg w-100 shadow mt-3" href="./4/inicio.php">Ejercicio 4</a>
      </div>
    </div>
  </main>

   <!-- Navbar -->
  <?php
  include_once('../structure/footer.php');
  ?>
  <script src="../Frameworks/bootstrap.min.js"></script>
</body>
</html>
