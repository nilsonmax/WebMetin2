<div id="main-top">
	
	<h2 class="main-title">Chat</h2>
	</div>
        <div id="main-cent">
        	<div id="main-wrap">

<?php
 if(isset($_SESSION['usuario']) ){ 

   if(isset($_SESSION['administrador']) && $_SESSION['administrador'] > 1 ){ 
  if(isset($_GET['cerrar'])){
    mysql_select_db(nombre_db_web);
    $cerrar = "UPDATE chat_estado SET estado = 0 WHERE usuario = '".$_SESSION['usuario']."'";
    mysql_query($cerrar,$sqlweb);
    header("Location: index.php");
  }else{
    mysql_select_db(nombre_db_web);

    $comp = "SELECT usuario FROM chat_estado WHERE usuario = '".$_SESSION['usuario']."' ";
    $sqlcom = mysql_query($comp,$sqlweb);
    if(mysql_num_rows($sqlcom) > 0){
      $up = "UPDATE chat_estado SET estado = 1 WHERE usuario = '".$_SESSION['usuario']."'";
      mysql_query($up,$sqlweb);
    }else{
      $nuevo = "INSERT INTO chat_estado SET estado = 1 , usuario = '".$_SESSION['usuario']."'";
      mysql_query($nuevo,$sqlweb);
    }
  }
}   
    $ip = "SELECT ip FROM chat_ban WHERE ip = '".$_SERVER['REMOTE_ADDR']."'";
    $ips = mysql_query($ip,$sqlweb);
    if(mysql_num_rows($ips) > 0){
      header("Location: index.php");
    }

    $teamu = "";
    $team = "SELECT usuario FROM chat_estado WHERE estado = 1";
    $teams = mysql_query($team,$sqlweb);
    while ($fila = mysql_fetch_array($teams)){
    $teamu = $teamu."<p>".$fila['usuario']."</p>";
    }
  ?>
 <script type="text/javascript" src="js/ajax.js"></script>
<script type="text/javascript"> 

setInterval("fajax3();",2000);

</script>
<style>
.divtopb{
color: #C3D9EA;
font-size: 14px;
font-weight: normal;
font-family: 'BebasNeueRegular';
letter-spacing: 1px;
padding-left:13px;"
}
.divtopbl{
color: #C3D9EA;
font-size: 14px;
font-weight: normal;
font-family: 'BebasNeueRegular';
letter-spacing: 1px;
padding-left:13px;"
}
.scrolldivb{
width:123px;
 height:419px; 
overflow:auto;
padding-left: 15px;
}
.conchat{
width:413px;
height:419px; 
overflow:auto;
padding-left: 15px;
}
</style>
<?php
 if(isset($_SESSION['administrador']) && $_SESSION['administrador'] > 1 ){ 
  echo("Importante, para cerrar el chat presione aqui <a href='index.php?rzm=chat&cerrar=true'>CERRAR</a>");
}
?>
<table style="width:590px;height:562px;background-image:url(images/chat.jpg)">
  <tr>
    <td width="428" height="56"><div class="divtopbl">Bienvenido:  <?php echo $_SESSION['usuario'];   ?></div></td>
    <td width="146"><div class="divtopb">Team Conectado</div></td>
  </tr>
  <tr>
    <td height="441"><div id="chat" class="conchat">Cargando Espere..</p></div></td>

    <td><div class="scrolldivb">
      <?php  echo $teamu; ?>
    </div></td>
  </tr>
   <tr>
    <td><div style="margin-left: 18px;margin-top: -1px;"><input style="width:380px;background: url(images/inpus.png) no-repeat top left;" type="text" name="comentario" id="infoadmin"  class="bar"></div></td>
    <td><div style="margin-top: -1px;margin-left: 31px;"><input id="enter" type="submit" name="loguear" class="submit" onclick="fajax('<?php echo $_SESSION["usuario"]; ?>')" value="Enviar Mensaje"></div></td>
    <input type="hidden" name="id_hash" id="id_hash" value="" />
    <script type="text/javascript">
    document.getElementById('infoadmin').value="";
    document.getElementById('infoadmin').focus();
    fajax3();
</script>
    
  </tr>
</table>


<?php
  }else{ 
    echo' Necesitas estas logueado';
 } ?>



        		 </div></div>
   <div id="main-end"></div>