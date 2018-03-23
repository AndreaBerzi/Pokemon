<html>
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
</head>
  <body>
    <nav class="navbar navbar-expand-sm bg-light navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="index.html">Home</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="catalogo.php">Catalogo</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cerca.html">Cerca</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="signup.html">Registrati</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.html">Login</a>
        </li>
      </ul>
      </nav>
    <?php
          require_once 'DBController.php';
          Catalogo(Connetti());
    ?>
  </body>
</html>
