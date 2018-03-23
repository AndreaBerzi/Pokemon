<?php
  function Connetti()
  {
    	$servername = "hostddnstim.asuscomm.com";
      $port = 3306;
    	$username = "user";
    	$password = "user";
    	$dbName = "pokemon";
    	$conn = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
      return $conn;
  }
  function Catalogo($conn)
  {
    $x_pag = 10;

    if (isset($_GET['pag']))
    {
        $pag = $_GET['pag'];
    }
    else
    {
       $pag  = 1;
    }

    if (!$pag || !is_numeric($pag))
    {
        $pag = 1;
    }

    $sql = "SELECT count(*) FROM pokemon";
    $sth = $conn->prepare($sql);
    $sth->execute();
    $all_rows = $sth->fetchColumn();
    $all_pages = ceil($all_rows / $x_pag);
    $first = ($pag-1) * $x_pag;

    $sql = "SELECT * FROM pokemon LIMIT $first, $x_pag";
    $sth = $conn->prepare($sql);
    $sth->execute();

    echo "<table class='table'><tr><th>Name</th><th>Height</th><th>Weight</th></tr>";
    while($result = $sth->fetch(PDO::FETCH_ASSOC))
    {
      echo "<tr><td>" .$result['identifier']. "</td><td>" . $result['height']."</td><td>" .$result['weight'] . "</td>";
      echo "<td><img src='sprites/" . $result['id'] . ".png'></td>";
    }
    echo "</table>";


    if ($all_pages > 1)
    {
        if ($pag > 1)
        {
            echo "<button type='button' class='btn btn-link'><a href=\"" . $_SERVER['PHP_SELF'] . "?pag=" . ($pag - 1) . "\">";
            echo "Pagina Indietro</a>&nbsp;</button>";
        }

        if ($all_pages > $pag)
        {
            echo "<button type='button' class='btn btn-link'><a href=\"" . $_SERVER['PHP_SELF'] . "?pag=" . ($pag + 1) . "\">";
            echo "Pagina Avanti</a></button>";
        }
        echo "<br>";
        for ($p=1; $p<=$all_pages; $p++)
        {
            echo "<a href=\"" . $_SERVER['PHP_SELF'] . "?pag=" . $p . "\">";
            echo $p . "</a>&nbsp;";
        }
    }
  }
  function Signup($conn,$email,$password)
  {
    try {
      $sql = "INSERT INTO users(email,password) VALUES (:email,:password)";
      $sth = $conn->prepare($sql);
      $sth->execute(array(':email'=>$email,':password'=>$password));
      return true;
    }
    catch (PDOException $e) {
      echo 'Error: '.$e->getMessage();
      return false;
    }
  }
  function Login($conn,$email,$password)
  {
    $sql = "SELECT * FROM users WHERE email = :email and password = :password";
    $sth = $conn->prepare($sql);
    $sth->execute(array(':email'=>$email,':password'=>$password));
    $rows = $sth->rowCount();
    if($rows == 0)
    {
      echo "<div  class='container'>
            <h2>Username o password errati</h2>
            </div>";
    }
    else {
       echo "<div  class='container'>
            <h1>Benvenuto</h1>
            </div>";
    }
  }
  function Cerca($conn, $search)
  {
    $sql = "SELECT * FROM pokemon WHERE identifier LIKE '%$search%'";
    $sth = $conn->prepare($sql);
    $sth->execute();


    echo "<table class='table'>
      <tr><th>Name</th><th>Height</th><th>Weight</th></tr>";

    while($result = $sth->fetch(PDO::FETCH_ASSOC))
    {
      echo "<tr><td>" .$result['identifier']. "</td><td>" . $result['height']."</td><td>" .$result['weight'] . "</td>";
      echo "<td><img src='sprites/" . $result['id'] . ".png'></td>";
    }
    echo "</table>";
  }
?>
