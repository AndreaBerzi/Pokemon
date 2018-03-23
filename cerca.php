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
	      <li class="nav-item">
	        <a class="nav-link" href="catalogo.php">Catalogo</a>
	      </li>
				<li class="nav-item active">
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
      <div class="container">
        <h2>Cerca Pokemon</h2>

      <form action="cerca.php" method='POST'>
        <div class="form-group">
          <label></label>
          <input type="text" class="form-control"  placeholder="Inserisci il nome" name="search">
        </div>
        <div>
      <button type="submit" class="btn btn-primary">Cerca</button>
    </div>
  </div>
	<?php
		require_once("DBController.php");
		$search=$_POST['search'];
    Cerca(Connetti(), $search);
	?>
	</body>
</html>
