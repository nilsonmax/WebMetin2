<div id="main-top">
  
  <h2 class="main-title">Registro</h2>
  </div>
        <div id="main-cent">
          <div id="main-wrap">
<?php
if(isset($_POST['enviar'])){
	$nombre = $_POST['nombre'];
	$passw = $_POST['pass'];
	$passw2 = $_POST['pass2'];
	$email = $_POST['email'];
	$borrado = $_POST['borrado'];	
	$pregunta = $_POST['pregunta'];	
	$respuesta = $_POST['respuesta'];	
	$respuesta2 = $_POST['respuesta2'];
	$coins = 0;	
		if($respuesta  == $respuesta2){
		
		mysql_select_db('account');
		$upmds = 'SELECT login FROM account WHERE login =\''.$nombre.'\''; 

$resultado = mysql_query($upmds,$sqlserver);
        if(mysql_num_rows($resultado) == 0){ 
			$fisn = 1;	
		$upmds= "INSERT INTO account SET login = '".$nombre."', question1 = '".$pregunta."', answer1 = '".$respuesta."', answer2 = '".$respuesta2."', coins = ".$coins.", password = PASSWORD('".$passw."'), email = '".$email."', social_id = '".$borrado."'";
			mysql_query($upmds,$sqlserver);
			}
			else{
			echo 'Ya esta registrado';}
		
	}
}
if(isset($fisn)){
	
	echo '  <table width="396">
    <tr>
      <td width="83">&nbsp;</td>
      <td width="139">Nombre</td>
      <td width="158">'.$nombre.'</td>
    
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>Contrase&ntilde;a</td>
      <td>***********</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>Re. Contrase&ntilde;a</td>
      <td>***********</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>Email</td>
      <td>'.$email.'</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>Codigo Borrado</td>
      <td>'.$borrado.'</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>Pregunta Secreta</td>
      <td>**********</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>Respuesta</td>
      <td>************</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>Re. Respuesta</td>
      <td>***********</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td></td>
    </tr>
  </table>
';
	
	
	
	
	}else{
echo'
<form id="frmulario" method="post" action="index.php?rzm=registro">
  <table width="396">
    <tr>
      <td width="83">&nbsp;</td>
      <td width="139">Nombre</td>
      <td width="158">
      <input type="text"  name="nombre" id="infoadmin"  class="bar"/></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>Contrase&ntilde;a</td>
      <td>
      <input type="password"  name="pass"  class="bar"  id="infoadmin"/></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>Re. Contrase&ntilde;a</td>
      <td>
      <input type="password" name="pass2" class="bar" id="infoadmin" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>Email</td>
      <td>
      <input type="text"  name="email" id="infoadmin" class="bar" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>Codigo Borrado (Max. 7)</td>
      <td>
      <input  name="borrado" type="text" id="infoadmin" maxlength="7"  class="bar"/></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>Pregunta Secreta</td>
      <td>
        <select name="pregunta" id="infoadminscroll" style="margin-left:10px;">
          <option value="1">Nombre de la Madre</option>
          <option value="2">Nombre del Padre</option>
          <option value="3">Nombre Mascota</option>
          <option value="4">Lugar de Nacimiento</option>
      </select></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>Respuesta</td>
      <td>
      <input type="text"  name="respuesta" id="infoadmin"  class="bar"/></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>Re. Respuesta</td>
      <td>
      <input type="text" name="respuesta2" id="infoadmin"  class="bar"/></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><input  type="submit"  name="enviar" id="enter" value="Registrarse" /></td>
    </tr> 
  </table>
</form>';
}?>
   </div></div>
   <div id="main-end"></div>
