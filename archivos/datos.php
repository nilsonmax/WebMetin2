<div id="main-top">
	
	<h2 class="main-title">Cambiar Datos</h2>
	</div>
        <div id="main-cent">
        	<div id="main-wrap">
<?php
 if(isset($_SESSION['rango']) && $_SESSION['rango'] = 1){
	 
	 if (isset($_POST["contra"])) {
		 $con = mysql_real_escape_string($_POST['1']); 
		 $con2 = mysql_real_escape_string($_POST['2']); 
		 if($con == $con2){
		 mysql_select_db('account');
		 $upmds = "UPDATE account SET password = PASSWORD('".$con."') WHERE id =".$_SESSION['usuario_id']."";
		 mysql_query($upmds,$sqlserver);
		 $contra = 1;
		 }
		 
		 
		 
	 }
	elseif (isset($_POST["borrado"])) {
		 $con = mysql_real_escape_string($_POST['1']); 
		 $con2 = mysql_real_escape_string($_POST['2']); 
		 if($con == $con2){
		  mysql_select_db('account');
		$upmds = "UPDATE account SET social_id = '$con' WHERE id =".$_SESSION['usuario_id']."";
		 mysql_query($upmds,$sqlserver);
		 $borrado = 1;
		 }
	 }
	elseif (isset($_POST["almacen"])) {
		 $con = mysql_real_escape_string($_POST['1']); 
		 $con2 =mysql_real_escape_string( $_POST['2']); 
		 if($con == $con2){
		  mysql_select_db('player');
		$upmds = "UPDATE safebox SET password = '$con' WHERE account_id =".$_SESSION['usuario_id']."";
		 mysql_query($upmds,$sqlserver);
		 $almacen = 1;
		 }
	 }
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 if (isset($contra) and $contra == 1){
		 echo ' <h3>Cambiar Contrase&ntilde;a</h3>';}
		 else{
	 echo'<h3>Cambiar Contrase&ntilde;a</h3>
				<span style="color:#F00"> M&aacute;ximo 16 caracteres</span><form name="formulariocontra" method="post" action="index.php?rzm=datos">
				  <table width="321">
					<tr>
					  <td width="155">Nueva Contrase&ntilde;a</td>
					  <td width="154"><label for="con"></label>
					  <input type="password" name="1" class="bar" id="infoadmin" ></td>
					</tr>
					<tr>
					  <td>Repetir Contrase&ntilde;a</td>
					  <td><input type="password" name="2" class="bar" id="infoadmin" ></td>
					</tr>
					<tr>
					  <td>&nbsp;</td>
					  <td><input type="submit" id="enter" class="submit"  name="contra" value="Enviar" /></td>
					</tr>
				  </table>
				</form>
				<p> </p>';}
				 if (isset($borrado) and $borrado == 1){
		 echo '<h3>Cambiar Codigo Borrado</h3>';}
		 else{
				echo'
				<h3>Cambiar Codigo </h3>
				<form name="formulariocodigo" method="post" action="index.php?rzm=datos">
				  <table width="321">
					<tr>
					  <td width="155">Nuevo Codigo</td>
					  <td width="154"><label for="con"></label>
					  <input type="password" name="1" style="background-color:#666;"  class="bar" id="infoadmin" ></td>
					</tr>
					<tr>
					  <td>Repetir Codigo</td>
					  <td><input type="password" name="2" style="background-color:#666;"  class="bar" id="infoadmin" ></td>
					</tr>
					<tr>
					  <td>&nbsp;</td>
					  <td><input  tname="borrado"type="submit" id="enter" class="submit"  value="Enviar" /></td>
					</tr>
				  </table>
				</form>

					<p> </p>';}
					
				 if (isset($almacen) and $almacen == 1){
		 echo '<h3>Cambiar Contrase&ntilde;a Almacen</h3>';}
		 else{
			echo'	<h3>Cambiar Contrase&ntilde;a Almacen</h3>
				<span style="color:#F00"> M&aacute;ximo 6 caracteres</span>
				<form name="formulariocontra" method="post" action="index.php?rzm=datos">
				  <table width="321">
					<tr>
					  <td width="155">Nueva Contrase&ntilde;a Almacen</td>
					  <td width="154"><label for="con"></label>
					  <input type="password" name="1" class="bar" id="infoadmin" ></td>
					</tr>
					<tr>
					  <td>Repetir Contrase&ntilde;a Almacen</td>
					  <td><input type="password" name="2" class="bar" id="infoadmin" ></td>
					</tr>
					<tr>
					  <td>&nbsp;</td>
					  <td><input  name="almacen" type="submit" id="enter" class="submit"  value="Enviar" /></td>
					</tr>
				  </table>
				</form>			
				
				
           ';}
				 
	 
 }
 else{
	 echo ' Tienes que estar logueado para ver este apartado';}
	 ?>
	 </div></div>
   <div id="main-end"></div>