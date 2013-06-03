<div id="main-top">
	
	<h2 class="main-title">Banear y Desbanear</h2>
	</div>
        <div id="main-cent">
        	<div id="main-wrap">
<?php if(isset($_SESSION['administrador']) && $_SESSION['administrador'] >= 1){ 


	
	if(isset($_POST['banear'])){
		$nombre = $_POST['1'];
		$opcion = $_POST['select1'];
		$motivo = $_POST['select2'];
		if($opcion == 1){
			mysql_select_db('account');
			$bansql = "UPDATE account SET status = 'BLOCK' WHERE login = '".$nombre."'";

			mysql_query($bansql,$sqlserver);

			$consuls = "SELECT id FROM account WHERE login = '".$nombre."'";
			$consuls = mysql_query($consuls,$sqlserver);
			while($fila = mysql_fetch_array($consuls)){
				$id = $fila['id'];
				}
				$fecha = date("d/m/Y");
			mysql_select_db(nombre_db_web);
			$inclu = "INSERT INTO baneo SET id_cuenta = ".$id.", motivo ='".$motivo."', fecha ='".$fecha."'";
			mysql_query($inclu,$sqlweb);
			echo'Baneado '.$nombre.'';
			
		}
		else{
		mysql_select_db('player');
		$sql= "SELECT account_id FROM player WHERE name = '".$nombre."'";
		$sql = mysql_query($sql,$sqlserver);
		 while ($id = mysql_fetch_array($sql)){
			 $ids = $id['account_id'];
			 mysql_select_db('account');

		$des = "UPDATE account SET status = 'BLOCK' WHERE id = '".$ids."'";
		mysql_query($des,$sqlserver);
		$consuls2 = "SELECT id FROM account WHERE login = '".$nombre."'";
		$consuls2 = mysql_query($consuls2,$sqlserver);
			while($filas = mysql_fetch_array($consuls2)){
				$ids = $filas['id'];
				}
				$fecha = date("d/m/Y");
			mysql_select_db(nombre_db_web);

			$desin = "INSERT INTO baneo SET id_cuenta = ".$ids.", motivo ='".$motivo."', fecha ='".$fecha."'";
			mysql_query($desin,$sqlweb);
			echo'Baneado '.$nombre.'';
		 }
		
	}
	
	}
		
		
		
		
	if(isset($_POST['desbanear'])){
		$nombre = $_POST['1'];
		$opcion = $_POST['select1'];
		if($opcion == 1){
			mysql_select_db('account');
			$up = "UPDATE account SET status = 'OK' WHERE login = '".$nombre."'";
			mysql_query($up,$sqlserver);
			echo'Desbaneado '.$nombre.'';
			
		}
		else{
		mysql_select_db('player');
		$sql= "SELECT account_id FROM player WHERE name = '".$nombre."'";
		$sql = mysql_query($sql,$sqlserver);
		 while ($id = mysql_fetch_array($sql)){
			 $id = $id['account_id'];
			 mysql_select_db('account');
			$up = "UPDATE account SET status = 'OK' WHERE id = '".$id."'";
				mysql_query($up,$sqlserver);
			echo'Desbaneado '.$nombre.'';
		 }
		
	}
	
		
	}
		
	
?>
<div style="padding-left:190px;"><h3>Banear  </h3></div>
<form id="formulario" name="formulario" method="post" action="index.php?rzm=admin&ad=banear">
<table width="481">
  <tr>
    <td width="10">&nbsp;</td>
    <td width="65">Nombre:</td>
    <td width="222" valign="bottom"><input class="bar" type="text" id="infoadmin" style="background-color:#666" name="1" />
      &nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td width="31">&nbsp;&nbsp;&nbsp;Tipo:&nbsp;&nbsp;</td>
    <td width="129"><select name="select3" id="infoadminscroll">
      <option value="1">Cuenta</option>
      <option value="2">Personaje</option>
    </select></td>
  </tr>
  <tr style="margin-top:10px;">
    <td>&nbsp;</td>
    <td>Motivo:&nbsp;&nbsp;&nbsp;&nbsp; </td>
    <td>&nbsp;&nbsp;&nbsp;<select name="select2" id="infoadminscroll">
      <option value="Hack">Hack</option>
      <option value="Estafa">Estafa</option>
      <option value="Promocionar otro server">Promocionar otro server</option>
      <option value="Relacionada con Hacker">Relacionada con Hacker</option>
      <option value="Bot">Bot</option>
      <option value="Lenguaje inapropiado">Lenguaje inapropiado</option>
    </select></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input  type="submit" id="enter" class="submit" name="banear" value="Banear" /></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  </table>

</form>
<div style="padding-left:190px;margin-top:25px;"><h3>Desbanear  </h3></div>
<form id="formulario2" name="formulario2" method="post" action="index.php?rzm=admin&ad=banear">
<table width="488">
  <tr>
    <td width="8">&nbsp;</td>
    <td width="65">Nombre:</td>
    <td width="224" valign="bottom"><input class="bar" type="text" id="infoadmin" style="background-color:#666" name="1" /></td>
    <td width="31">&nbsp;&nbsp;&nbsp;Tipo:&nbsp;&nbsp;</td>
    <td width="136"><select name="select1" id="infoadminscroll">
      <option value="1">Cuenta</option>
      <option value="2">Personaje</option>
    </select></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp; </td>
    <td><input  type="submit" id="enter" class="submit" name="desbanear" value="Desbanear" /></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  </table>

</form>
<?php
}
else{
	echo' No puedes entrar aqui';
}
?></div></div>
   <div id="main-end"></div>