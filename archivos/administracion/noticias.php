
<div id="main-top">
	
	<h2 class="main-title">Panel de Noticias</h2>
	</div>
        <div id="main-cent">
        	<div id="main-wrap">
<?php if(isset($_SESSION['administrador']) && $_SESSION['administrador'] >= 1){ 
	mysql_select_db(nombre_db_web);
	$option = NULL;
	$selecs = "SELECT * FROM noticias";
	$noti = mysql_query($selecs,$sqlweb);
	while($noticias = mysql_fetch_array($noti)){
		$titulo = $noticias['titulo'];
		$idn = $noticias['id'];
		$option = $option.'<option value="'.$idn.'">'.$titulo.'</opcion>';
		
		
	}
	if(isset($_POST['borrar'])){
		mysql_select_db(nombre_db_web);
		$idnoti = $_POST['titulo'];
		$selecs = "DELETE FROM noticias WHERE id = '".$idnoti."' ";
		$ite = mysql_query($selecs,$sqlweb);
		
	}
	if(isset($_POST['andir'])){
		mysql_select_db(nombre_db_web);
		$noticiass = $_POST['noticia'];
		$notis = nl2br($noticiass);
		$tituloss = utf8_decode($_POST['titulo']);
		$fechas = utf8_decode($_POST['fecha']);
		$selectss = "INSERT INTO noticias SET titulo = '".$tituloss."', fecha = '".$fechas."', noticia = '".$notis."' ";
		$ite = mysql_query($selectss,$sqlweb);
		
	}


echo '<form method="post" action="index.php?rzm=admin&ad=noticias">
			  
				<table width="326" height="82" style="margin-left:15px;">
				  <tr>
					<td colspan="2"></td>
				  </tr>
						  <tr>
							<td width="82">Titulo</td>
							<td width="232"><select name="titulo" id="infoadminscroll" >'.$option.'</select></td>
				  </tr>
				  		
						  <tr>
							<td>&nbsp;</td>
							<td>
							<input id="enter" type="submit" name="borrar" class="submit" value="Borrar"></td>
				  </tr>
				</table>
						</form><p>&nbsp;</p>';

echo '<form method="post" action="index.php?rzm=admin&ad=noticias">
			 
				<table width="326" height="82" style="margin-left:15px;">
				  <tr>
					<td>Titulo</td>
					<td><input name="titulo" class="bar" type="text" id="infoadmin"> </imput> </td>
				  </tr>
				   <tr>
							<td width="82">Fecha</td>
							<td width="232"><input class="bar" type="text" id="infoadmin" name="fecha"> </imput> </td>
				  </tr>
						  <tr>
							<td width="82">Noticia</td>
							<td width="232"><textarea name="noticia" id="infoadminscroll"   cols="30" rows="5"></textarea></td>
				  </tr>
				  
				  		
						  <tr>
							<td>&nbsp;</td>
							<td>
							<input id="enter" class="submit"  type="submit" name="andir" value="Añadir"></td>
				  </tr>
				</table>
						</form><p>&nbsp;</p>';



}
else{
	echo' No puedes entrar aqui';
}
?>
  </div></div>
   <div id="main-end"></div>