<div id="main-top">
	
	<h2 class="main-title">Desbuguear</h2>
	</div>
        <div id="main-cent">
        	<div id="main-wrap">



<form method="post" action=""> 
<input type="text" name="cuenta" />
Introduzca el nombre de la cuenta 
<br /> 
<input type="text" name="personaje" />
Introduzca el nombre del personaje
<br /> 
<input type="password" name="pass"  /> 
Introduzca la contrase&ntilde;a de la cuenta 
<br /> 
<input type="submit" value="Desbugear" name="des" /> 
</form> 
<br /> 

<?php
if(isset($_POST['des'])) { 
$dbhost = "localhost";
$dbuser = "root";
$dbpw = "pwd";
$conexion = mysql_connect("$dbhost","$dbuser","$dbpw");
 
$pj = mysql_real_escape_string($_POST['personaje']); 
$ac = mysql_real_escape_string($_POST['cuenta']); 
$pass = mysql_real_escape_string($_POST['pass']); 

mysql_select_db('account');
$cuenta = mysql_query("SELECT * FROM account WHERE login = '".$ac."'  AND password=PASSWORD('".$pass."')")or die('Could not select database: '.mysql_error());  
if(mysql_num_rows($cuenta)>0){
        $fila = mysql_fetch_assoc($cuenta);
		 $id_c = $fila['id'];

}else{
	die('No hay ninguna cuenta con ese nombre y contrase&ntilde;a');}

		 mysql_select_db('player');
		 $per = mysql_query("SELECT * FROM player WHERE account_id = '".$id_c."'  AND name = '".$pj."'")or die('Could not select database: '.mysql_error());  
         if(mysql_num_rows($per)>0){
        $pers = mysql_fetch_assoc($per);
		$id_p = $pers['id'];
		}else{
			 die('No hay ningun personaje con ese nombre, en la cuenta');
		 }
		$re = mysql_query("SELECT empire FROM player_index WHERE id = '".$id_c."'"); 
         if(mysql_num_rows($re)>0){
        $rei = mysql_fetch_assoc($re);
		$reino = $rei['empire'];
			 }else{
			 die('Error con el reino');
		 }
			 			 
			 if($reino == 1){
					$x = 459631;
					$y = 954198;
					$mapa = 1;
				}
				elseif($reino == 2){
					$x = 52156;
					$y = 166785;
					$mapa = 21;
				}
				elseif($reino == 3){
					$x = 52152;
					$y = 166775;
					$mapa = 41;
				}
				
			
			 $des = mysql_query("UPDATE player SET map_index = ".$mapa.", x = ".$x." , y = ".$y.", exit_x = ".$x." , exit_y = ".$y." WHERE account_id = '".$id_c."'  AND name = '".$pj."'");	  
			if($des == TRUE){
				echo'Enviado a city';
			}else{
				 die('No se pudo enviar');
			}
}

?>
</div></div>
   <div id="main-end"></div>