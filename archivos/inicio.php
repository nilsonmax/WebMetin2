<?php 
mysql_select_db(nombre_db_web);
$noticias = "SELECT * FROM noticias ORDER BY id DESC LIMIT 5";
$variablesqls = mysql_query($noticias , $sqlweb);
while($nots = mysql_fetch_array($variablesqls)){
	$titulo = $nots['titulo'];
	$noticia = $nots['noticia'];
	$fecha = $nots['fecha'];
	
	echo' <div id="main-top">
	
	<a href="#" class="main-title">'.$titulo.'</a>
	<p class="other-title">'.$fecha.'</p>
   </div>
        <div id="main-cent">
        	<div id="main-wrap">
     '.$noticia.'
   </div></div>
   <div id="main-end"></div>';
	
}
?>
