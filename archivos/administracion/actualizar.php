<?php if(isset($_SESSION['administrador']) && $_SESSION['administrador'] >= 1){ 

echo'
<div id="main-top">
	
	<h2 class="main-title">Actualizaciones</h2>
	</div>
        <div id="main-cent">
        	<div id="main-wrap">';

// Limite para ejecutar el php y libreria para descomprimir

set_time_limit (900000);

require_once('archivos/lib/pclzip.lib.php'); 


// No se envia nada y muestra

if(!isset($_POST['actualizarboton'])){


// Obtiene el archivo xml

$sx = simplexml_load_file('http://zonamaster.es/actualizaciones/act_v2.xml'); 

foreach($sx->version as $item){

	$numero= $item->numero;

	$descripcion= $item->descripcion;

	$fecha= $item->fecha;

	$link= $item->link;

	$nombre_ar= $item->nombre_ar;

	$sql = "SELECT version FROM ".nombre_db_web.".version WHERE version = ".$numero."";

	$variablesql = mysql_query($sql , $sqlweb);

	if(mysql_num_rows($variablesql) > 0) {}else{
	echo '<table width="552">
			  <tr>
			    <td width="10" rowspan="4"><img src="images/admin/zip.png"></td>
			    <td width="520" height="31"><strong>Numero Versión:</strong> '.$numero.'</td>
			  </tr>
			  <tr>
			    <td height="28"><strong>Fecha:</strong> '.$fecha.'</td>
			  </tr>
			  <tr>
			    <td height="28"><strong>Descripción:</strong> '.$descripcion.'</td>
  </tr>
			  <tr>
			    <td height="28"><form action="" method="post">
			    <input type="hidden" name="numeroac" value="'.$numero.'"/>
			    <input id="enter" type="submit" name="actualizarboton" class="submit" value="Actualizar"></form></td>
			  </tr>
			</table><p style="margin-top:10px;margin-bottom:10px;">----------------------------------------------------------------------</p>';
							}

}
}else{
// Comprueba si hay actualizaciones nuevas y si las hay descarga el archivo y descomprime
	

	$numero = $_POST['numeroac'];

$url = "http://zonamaster.es/actualizaciones/descarga/".$numero.".zip";
		// Descarga el archivo correspondiente a la actualizacion - Necesario activar Curl

		$ruta= ""; 
		  
		$g=$ruta.basename($url); 
		 
		if(!is_file($g)){

			$ch=curl_init($url); 

		    $fp=fopen ($g, "w");
		 
		    curl_setopt ($ch, CURLOPT_FILE, $fp);

		    curl_setopt ($ch, CURLOPT_HEADER ,0);

		    curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,60);

		    curl_exec ($ch); 

			curl_close ($ch);
		 
		    fclose($fp); 

		
		    $nombre_ar = $numero.".zip";
		// Descomprime el archivo descargado

		$archive = new PclZip($nombre_ar); 

		if ($archive->extract() == 0) { 

			die("Error : ".$archive->errorInfo(true));

		}else{

			// Aumenta la version de la pagina web

		
			$sql = "INSERT INTO ".nombre_db_web.".version SET version =".$numero."";

			$variablesql = mysql_query($sql , $sqlweb);
			unlink($nombre_ar);
				echo 'Actualizado';

		}

	} 
}

	echo '</div></div>
   <div id="main-end"></div>';

}
else{
	echo' No puedes entrar aqui';

}
