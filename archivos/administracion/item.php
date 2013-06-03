<div id="main-top">
	
	<h2 class="main-title">Items Perdidos</h2>
	</div>
        <div id="main-cent">
        	<div id="main-wrap">
          <?php  if(isset($_SESSION['administrador']) && $_SESSION['administrador'] >= 1){  ?>
         <?php
///////////////////////////////////////////
//										 //
//		ITEM FINDER IN LOG - V 1.0		 //
//		SCRIPT CREADO POR JUMARRAS		 //
//		    jumarras@gmail.com			 //
//										 //
///////////////////////////////////////////

if(isset($_POST['submit'])){
	if($_POST['username'] && $_POST['vnum']){
			$POSTusername = mysql_real_escape_string($_POST['username']);
			$POSTvnum = mysql_real_escape_string($_POST['vnum']);
			$up = 'SELECT id FROM player.player WHERE name = "'.$POSTusername.'"';
			$query = mysql_query($up,$sqlserver);
			$exist = mysql_num_rows($query);
			if($exist > 0){
				$row = mysql_fetch_assoc($query);
				$USERid = $row['id'];
				$up = 'SELECT distinct what FROM log.log WHERE who = "'.$USERid.'" AND vnum = "'.$POSTvnum.'"' or 
				header("Location: index.php?rzm=admin&ad=item");
				$query = mysql_query($up,$sqlserver);
				$exist = mysql_num_rows($query);
				if($exist > 0){
					echo 'Ha habido '.$exist.' resultados con este objeto.<br><br>';
					while($row = mysql_fetch_assoc($query)){
						$what = $row['what'];
						$up = 'SELECT time, ip, x, y, how, who FROM log.log WHERE what = "'.$what.'"';
						$querywhat = mysql_query($up,$sqlserver);
						echo $what.'<br>';
						while($row2 = mysql_fetch_assoc($querywhat)){
							$date = $row2['time'];
							$ip = $row2['ip'];
							$how = $row2['how'];
							$who = $row2['who'];
							switch ($how){
								case 'GM': $state = 'Objeto creado por un GM.'; break;
								case 'DROP': $state = 'Objeto tirado al suelo.'; break;
								case 'GET': $state = 'Objeto recojido del suelo.'; break;
								case 'EXCHANGE_TAKE': $state = 'Objeto recojido en comercio.'; break;
								case 'EXCHANGE_GIVE': $state = 'Objeto dado en comercio.'; break;
								case 'SAFEBOX_PUT': $state = 'Objeto dejado en el almacen.'; break;
								case 'SAFEBOX_GET': $state = 'Objeto recojido del almacen.'; break;
								default: $state = 'Accion no reconocida.';
							
							}
							$up = mysql_query('SELECT name FROM player.player WHERE id = "'.$who.'"');
							$query2 = mysql_query($up,$sqlserver);
							$row3 = mysql_fetch_assoc($query2);
							$whos = $row3['name'];
							echo $date.': '.$state.' - '.$whos.' - ('.$ip.')<br>';
						}
						echo '<br><br>';
					}
					echo('');
				}
				else
					echo('Este usuario no ha tenido nunca este objeto.');
			}
			else
				echo('Este nombre de usuario no existe.');
	}
	else
		echo('Debes introducir todos los datos.');
}
?>
<form name="finditem" method="post" action="index.php?rzm=admin&ad=item">
<table width="341">
  <tr>
    <td width="170" height="42">Nombre de Usuario: </td>
    <td width="144"><input class="bar" type="text" id="infoadmin" name="username"></td>
  </tr>
  <tr>
    <td height="42">Vnum del Objeto: </td>
    <td><input class="bar" type="text" id="infoadmin" name="vnum"></td>
  </tr>
  <tr>
    <td><input type="submit" value="Aceptar" name="submit" id="enter" class="submit"></td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>
 <?php
		   }else{
			echo' No puedes entrar aqui';}?>

			</div></div>
   <div id="main-end"></div>