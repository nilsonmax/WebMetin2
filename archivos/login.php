<?php
 if(isset($_SESSION['rango']) && $_SESSION['rango']>=1){

		mysql_select_db("player");
		$stats = mysql_query("SELECT id, account_id,name FROM player WHERE account_id=".$_SESSION['usuario_id']."");
	echo '<table width="400" style="margin-left:10px;">
	 <tr>
    <td>Cuenta</td>
	<td style="font-size: 12px;">'.$_SESSION["usuario"].'</td></tr> <tr>   <td>Personajes</td>';
	while ($filas = mysql_fetch_array($stats)){
	$jugadores = $filas["name"];
	echo'
    <td style="font-size: 12px;">'.$jugadores.'</td>';
	}
	echo " </tr></table>";
 }
else{
	
if (isset($_POST['enviar'])) {
   
    $nombre=mysql_real_escape_string($_POST['nombre']);
    $pass=mysql_real_escape_string($_POST['passwd']);
    if ($pass == NULL || $nombre == NULL) {
    echo "<p>No se permiten campos vacios.</p><p><a href='index.php'>Haga click aqui para volver</a></p>";
    }else{
    mysql_select_db("account");
    $login = mysql_query("SELECT login,coins,id,administrador  FROM account WHERE login = '".$nombre."'  AND password=PASSWORD('".$pass."')   LIMIT 1")or die(mysql_error());
	
      if(mysql_num_rows($login)>0){
        $fila = mysql_fetch_object($login);
		$_SESSION["usuario"] = $fila->login;	
	    $_SESSION['rango'] = 1;
		$_SESSION['usuario_id'] = $fila->id;
		$_SESSION['mds'] = $fila->coins;
		$_SESSION['admin']= $fila->administrador;
		header("Location: index.php");
	  }
	}

}else{
echo '
<form method="post" action="index.php?rzm=login" >
Nombre <input style="background-color:#666;" type="text" name="nombre"/><br>
Contrase&ntilde;a<input style="background-color:#666" type="password" name="passwd" /><br>
<input  type="submit" class="botonenviar" name="enviar" value="" />
</form>  

';
}
}?>