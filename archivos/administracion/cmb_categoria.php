
<div id="main-top">
	
	<h2 class="main-title">Crear y Borrar categorias</h2>
	</div>
        <div id="main-cent">
        	<div id="main-wrap">
<?php if(isset($_SESSION['administrador']) && $_SESSION['administrador'] >= 1){ 

	if(isset($_POST['crear'])){
		mysql_select_db(nombre_db_web);
		$up = "INSERT INTO categorias SET nombre ='".$_POST['categorian']."'";
		$select = mysql_query($up,$sqlweb);
		echo'Creada con exito';
		
	}
	elseif(isset($_POST['borrar'])){
		mysql_select_db(nombre_db_web);
		$up = "DELETE FROM categorias WHERE id ='".$_POST['categoria']."'";
		$select = mysql_query($up,$sqlweb);
		echo'Borrada con exito';
	}



	mysql_select_db(nombre_db_web);
	$up = "SELECT * FROM categorias";
	$select = mysql_query($up,$sqlweb);
	$option = NULL;
	while($fila = mysql_fetch_array($select)){
		$nombre = $fila['nombre'];
		$id = $fila['id'];
		$option = $option.'<option value="'.$id.'">'.$nombre.'</opcion>';
	}


			echo'
			<form method="post" action="index.php?rzm=admin&ad=cmb_categoria">

			
			
			<table width="251" height="82" style="margin-left:15px;">
			  <tr>
				<td width="65">Nombre</td>
				<td width="358"><input class="bar" type="text" id="infoadmin" name="categorian"> </input></td>
			  </tr>
			  <tr>
				<td>&nbsp;</td>
				<td><input type="submit" name="crear" id="enter" class="submit" value="Crear"></td>
			  </tr>
			</table></form><p>&nbsp;</p>';
			
			
			
			echo'
			<form method="post" action="index.php?rzm=admin&ad=cmb_categoria">
			
			<table width="251" height="82" style="margin-left:15px;">
			  <tr>
				<td width="65">Nombre </td>
				<td width="358">&nbsp;<select name="categoria" id="infoadminscroll">'.$option.'</select></td> 
			  </tr>
			  <tr>
				<td>&nbsp;</td>
				<td><input type="submit" name="borrar" id="enter" class="submit" value="Borrar"></td>
			  </tr>
			</table></form>';


}
else{
	echo' No puedes entrar aqui';
}
?>
  </div></div>
   <div id="main-end"></div>