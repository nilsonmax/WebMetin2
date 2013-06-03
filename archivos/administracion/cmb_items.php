
<div id="main-top">
	
	<h2 class="main-title">Crear y Borrar items</h2>
	</div>
        <div id="main-cent">
        	<div id="main-wrap">
<?php if(isset($_SESSION['administrador']) && $_SESSION['administrador'] >= 1){ 

	
	if(isset($_POST['borrar'])){
		
		mysql_select_db(nombre_db_web);
		$values = $_POST['valor'];
		$up = 'DELETE FROM items WHERE value_ob = '.$values.'';
		$select = mysql_query($up,$sqlweb);
	}




if(isset($_POST['crear'])){
		$values = $_POST['value'];
		$categoria = $_POST['categoria'];
		$mds = $_POST['precio'];
		$desc = $_POST['desc'];
		mysql_select_db(nombre_db_web);
		$up = 'INSERT INTO items SET id_cat = '.$categoria.', value_ob = '.$values.',descripcion = "'.$desc.'", precio = '.$mds.' ';
		$select = mysql_query($up,$sqlweb);
		echo '<meta http-equiv="refresh" content="0;url=index.php?rzm=admin&ad=cmb_items" /> ';
		
	}else{
	mysql_select_db(nombre_db_web);
	$selects = "SELECT * FROM categorias";
	$select = mysql_query($selects,$sqlweb);
	$option = NULL;
	while($filas = mysql_fetch_array($select)){
		$nombres = $filas['nombre'];
		$ids = $filas['id'];
		$option = $option.'<option value="'.$ids.'">'.$nombres.'</opcion>';
	}
	echo'<div style="height:200px;
	width:190;
	overflow-x:hidden; 
	overflow-y:auto;"><table width="384" > <tr>
    <td width="200">Nombre</td>
    <td width="95">Precio</td>
    <td width="85">Borrar Item</td>
  </tr>';
  mysql_select_db(nombre_db_web);
	$selects = "SELECT * FROM items ";
	$items = mysql_query($selects,$sqlweb);
	while($itm = mysql_fetch_array($items)){
		$precio = $itm['precio'];
		$value = $itm['value_ob'];

			mysql_select_db('player');
			$selectss = "SELECT * FROM item_proto WHERE vnum = ".$value."";
			$ite = mysql_query($selectss,$sqlweb);
			while($itemf = mysql_fetch_array($ite)){
				$nombre = $itemf['locale_name'];
				echo'
					  <tr>
						<td>'.$nombre.'</td>
						<td>'.$precio.'</td>
						<td><form method="post" action="index.php?rzm=admin&ad=cmb_items">
						<input type="hidden" name="valor" value="'.$value.'">
						<input type="submit" name="borrar"  id="enter" class="submit"  value="Borrar">
						<form>
						</td>
					  </tr>
	
				';
			}
	}
echo'</table></div>';

		echo'<br/><br/><br/>
		<form method="post" action="index.php?rzm=admin&ad=cmb_items" enctype="multipart/form-data">
			 
				<table width="272" height="82" style="margin-left:15px;">
				  <tr>
					<td width="99">Value Item</td>
					<td width="161"><input class="bar" type="text" id="infoadmin"   name="value"> </input></td>
				  </tr>
				  <tr>
					<td>Precio</td>
					<td><input class="bar" type="text" id="infoadmin"  name="precio"></td>
				  </tr>
						  <tr>
							<td>Categoria&nbsp;&nbsp;&nbsp;&nbsp;</td>
							<td>&nbsp;&nbsp;<select name="categoria" id="infoadminscroll">'.$option.'</select></td>
				  </tr>
				  <tr>
					<td>Descripcion del Items</td>
					<td><input class="bar" type="text" id="infoadmin"   name="desc"> </input></td>
				  </tr>
				  		
						  <tr>
							<td>&nbsp;</td>
							<td><input type="submit" name="crear" id="enter" class="submit" value="Crear"></td>
				  </tr>
				</table>
						</form>';





}}
else{
	echo' No puedes entrar aqui';
}?>
  </div></div>
   <div id="main-end"></div>