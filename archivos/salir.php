<?PHP
  unset($_SESSION["usuario"]);
  unset($_SESSION['rango']);
  unset($_SESSION['usuario_id']);
  unset($_SESSION['mds']);
  unset($_SESSION['admin']);
  unset($_SESSION['posicion']);
  echo'<meta http-equiv="refresh" content="1; URL=index.php"> ';
?>
<h2>Saliendo..</h2>
<p>Cerrando Sesion..</p>