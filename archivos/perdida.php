<div id="main-top">
	
	<h2 class="main-title">Recuperar Pass</h2>
	</div>
        <div id="main-cent">
        	<div id="main-wrap">

<?php
if(isset($_POST['contra'])){
$nombre = mysql_real_escape_string($_POST['1']);
$pregunta = $_POST['pregunta'];
$res = mysql_real_escape_string($_POST['2']);
mysql_select_db('account');
$upmds = mysql_query("SELECT * FROM account WHERE login='".$nombre."' and question1='".$pregunta."' and answer1='".$res."' ");
$vista = mysql_query($upmds,$sqlserver);
if(mysql_num_rows($vista)>0){
	while($filasf = mysql_fetch_array($vista)){
		$email =  $filasf['email'];
		
	}
	$array = array(1 =>"123asdv",2 =>"a13basd",3 =>"13asvxc",4 =>"avvfg34",5 =>"gf23f",6 =>"jjsfd34",7 =>"sjf232");
					
	$rand = rand(1,7);
	$nuevapass =  $array[$rand];
		$para = $email;
		
		$asunto = "Pass Metin2";
		$mensaje = "---------------------------------- \n";
		$mensaje.= "Nueva pass:".$nuevapass." \n";
		$mensaje.= "---------------------------------- \n";
		
        mail($para, $asunto, utf8_decode($mensaje));  
											
                                                             
	$sql_final = "UPDATE account SET password = PASSWORD('".$nuevapass."') WHERE login='".$nombre."' ";
	mysql_query($sql_final,$sqlserver);
	echo'Cambiada';

}
else{ 
echo 'Error';
}

}
?>

                <span style="color:#F00"> M&aacute;ximo 16 caracteres</span>
                <form name="formulariocontra" method="post" action="index.php?rzm=perdida">
				  <table width="321">
                   <tr>
                 <td width="155">ID Cuenta</td>
           <td width="155"><input type="text" name="1" id="infoadmin"  class="bar" /></td>
                    </tr>
					<tr>
					  <td width="155">Pregunta Secreta</td>
					  <td width="154">
					 <select name="pregunta"  style="margin-left:10px;" id="infoadminscroll">
                      <option value="1">Nombre de la Madre</option>
                      <option value="2">Nombre del Padre</option>
                      <option value="3">Nombre Mascota</option>
                      <option value="4">Lugar de Nacimiento</option>
                  </select></td>
					</tr>
					<tr>
					  <td>Respuesta Secreta</td>
					  <td><input type="text" name="2" id="infoadmin"  class="bar" /></td>
					</tr>
					<tr>
					  <td>&nbsp;</td>
					  <td><input  type="submit" id="enter" value="Enviar" /></td>
					</tr>
				  </table>
				</form>
				</div></div>
   <div id="main-end"></div>
