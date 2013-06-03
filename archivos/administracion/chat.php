
<div id="main-top">
	
	<h2 class="main-title">Panel del Chat</h2>
	</div>
        <div id="main-cent">
        	<div id="main-wrap">
<?php if(isset($_SESSION['administrador']) && $_SESSION['administrador'] >= 1){ 
	mysql_select_db(nombre_db_web);
	$option = NULL;
	$selecs = "SELECT * FROM chat_ban";
	$noti = mysql_query($selecs,$sqlweb);
	while($noticias = mysql_fetch_array($noti)){
		$titulo = $noticias['ip'];
		$idn = $noticias['id'];
		$option = $option.'<option value="'.$idn.'">'.$titulo.'</opcion>';
		
		
	}
	if(isset($_POST['borrar'])){
		mysql_select_db(nombre_db_web);
		$idnoti = $_POST['titulo'];
		$selecs = "DELETE FROM chat_ban WHERE id = '".$idnoti."' ";
		$ite = mysql_query($selecs,$sqlweb);
		
	}
	if(isset($_POST['andir'])){
		mysql_select_db(nombre_db_web);
		$tituloss = utf8_decode($_POST['titulo']);
		$selectss = "INSERT INTO chat_ban SET ip = '".$tituloss."'";
		$ite = mysql_query($selectss,$sqlweb);	
	}
	if(isset($_POST['truncar'])){
		mysql_select_db(nombre_db_web);
		$selectss = "TRUNCATE chat";
		$ite = mysql_query($selectss,$sqlweb);	
	}


echo '<form method="post" action="index.php?rzm=admin&ad=chat">
			  
				<table width="326" height="82" style="margin-left:15px;">
				  <tr>
					<td colspan="2"></td>
				  </tr>
						  <tr>
							<td width="82">Ip</td>
							<td width="232"><select name="titulo" id="infoadminscroll" >'.$option.'</select></td>
				  </tr>
				  		
						  <tr>
							<td>&nbsp;</td>
							<td>
							<input id="enter" type="submit" name="borrar" class="submit" value="Borrar"></td>
				  </tr>
				</table>
						</form><p>&nbsp;</p>';

echo '<form method="post" action="index.php?rzm=admin&ad=chat">
			 
				<table width="326" height="82" style="margin-left:15px;">
				  <tr>
					<td>Ip</td>
					<td><input name="titulo" class="bar" type="text" id="infoadmin"> </imput> </td>
				  </tr>
				  
				  		
						  <tr>
							<td>&nbsp;</td>
							<td>
							<input id="enter" class="submit"  type="submit" name="andir" value="Añadir"></td>
				  </tr>
				</table>
						</form><p>&nbsp;</p>';



echo '<form method="post" action="index.php?rzm=admin&ad=chat">
			 
				<table width="326" height="82" style="margin-left:15px;">
				  <tr>
					<td>Cada cierto tiempo es aconsejable eliminar registros</td>
					<td></td>
				  </tr>
				  
				  		
						  <tr>
							<td>&nbsp;</td>
							<td>
							<input id="enter" class="submit"  type="submit" name="truncar" value="Eliminar"></td>
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