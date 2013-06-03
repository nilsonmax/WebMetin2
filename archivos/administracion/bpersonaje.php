<div id="main-top">
	
	<h2 class="main-title">Ver estado de cuentas</h2>
	</div>
        <div id="main-cent">
        	<div id="main-wrap">
<?php if(isset($_SESSION['administrador']) && $_SESSION['administrador'] >= 1){ 
echo'
<form action="index.php?rzm=admin&ad=bpersonaje" method="post" style="margin-left:15px;">
<table width="349" >
  <tr>
    <td width="55">Nombre </td>
    <td width="144"><label for="textfield"></label>
    <input class="bar" type="text" id="infoadmin" name="nombre" id="textfield"></td>
    <td width="128"><label for="select"></label>
      <select name="select" id="select" id="infoadminscroll">
        <option value="1">Personaje</option>
        <option value="2">Cuenta</option>
    </select></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="buscar" id="enter" class="submit" value="Enviar"></td>
    <td>&nbsp;</td>
  </tr>
</table></form>
';
if(isset($_POST['buscar'])){
	
	
	if($_POST['select'] == 2){
		$nombre = $_POST['nombre'];
		mysql_select_db('account');
		$up = "SELECT id, login, status FROM account WHERE login = '".$nombre."'";
		$consul = mysql_query($up,$sqlserver);
			while($fila = mysql_fetch_array($consul)){
				$id = $fila['id'];
				$nombre = $fila['login'];
				$estado = $fila['status'];
				if($estado == "OK"){
				$color = "#33FF00";
				}else{
				$color = "#FF0000";
				}
				
				echo '<p/>
				<div style="margin-left:15px;color:'.$color.'">Estado->'.$estado.'</div><table width="373" height="115" style="margin-left:10px;">
  <tr>
    <td>Nombre</td>
    <td>Motivo</td>
	  <td>Fecha</td>
  </tr>';
			}
		mysql_select_db(nombre_db_web);
		$up = "SELECT * FROM baneo WHERE id_cuenta = ".$id." ORDER BY id ASC";
		$consuls = mysql_query($up,$sqlweb);
			while($filas = mysql_fetch_array($consuls)){
				$motivo = $filas['motivo'];
				$fecha = $filas['fecha'];
				echo'<tr>
					<td>'.$_POST['nombre'].'</td>
					<td>'.$motivo.'</td>
					<td>'.$fecha.'</td>
				  </tr>';
			}
	echo'</table>';}
else{
	$nombre = $_POST['nombre'];
	mysql_select_db('player');
	$up = "SELECT account_id FROM player WHERE name = '".$nombre."'";
	$consul = mysql_query($up,$sqlserver);
			while($fila = mysql_fetch_array($consul)){
				$account_id = $fila['account_id'];
				}
	mysql_select_db('account');
	$up = "SELECT login, id, status FROM account WHERE id = '".$account_id."'";
	$consuls = mysql_query($up,$sqlserver);
			while($fila = mysql_fetch_array($consuls)){
				$id = $fila['id'];
				$nombre = $fila['login'];
				$estado = $fila['status'];
				if($estado == "OK"){
				$color = "#33FF00";
				}else{
				$color = "#FF0000";
				}
				}
		echo '<p/>
	<div style="margin-left:15px;color:'.$color.'">Estado->'.$estado.'</div><table width="373" height="115" style="margin-left:10px;">
		  <tr>
			<td>Nombre</td>
			<td>Motivo</td>
			  <td>Fecha</td>
		  </tr>';							
	mysql_select_db(nombre_db_web);
		$up = "SELECT * FROM baneo WHERE id_cuenta = ".$id." ORDER BY id ASC";
		$consuls = mysql_query($up,$sqlweb);
			while($filas = mysql_fetch_array($consuls)){
				$motivo = $filas['motivo'];
				$fecha = $filas['fecha'];
				echo'<tr>
					<td>'.$_POST['nombre'].'</td>
					<td>'.$motivo.'</td>
					<td>'.$fecha.'</td>
				  </tr>';
			}
	echo'</table>';
	
	
	
}
	}}
else{
	echo' No puedes entrar aqui';
}
?>
</div></div>
   <div id="main-end"></div>