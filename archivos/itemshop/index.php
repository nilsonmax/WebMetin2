<div id="main-top">
	
	<h2 class="main-title">Item Shop</h2>
<?php
 if(isset($_SESSION['usuario']) ){
	 
	 mysql_select_db('account');
$tusmd = "SELECT coins FROM account WHERE id = '".$_SESSION['usuario_id']."'";
$tusmd = mysql_query($tusmd,$sqlserver);
while($filad = mysql_fetch_array($tusmd)){
	$tusmds = $filad['coins'];
}
	 
echo '
	<p class="other-title">Mds: '.$tusmds.'</p>
   </div>
        <div id="main-cent">
        	<div id="main-wrap">';
	 echo'<div style="width:630px;text-align: center;font-size:15px;"> Categorias ';
mysql_select_db(nombre_db_web);
$categorias = "SELECT * FROM categorias ORDER BY id ASC";
echo '';
$categorias = mysql_query($categorias,$sqlweb);
while($fila = mysql_fetch_array($categorias)){
	$categoria = $fila['nombre'];
	$ids = $fila['id'];
	echo '<a href="index.php?rzm=itemshop&cat='.$ids.'">'.$categoria.'</a>&nbsp;-&nbsp;';
}echo '</div>';
if(isset($_GET['cat'])){

	$cat = mysql_real_escape_string($_GET['cat']);
	$regVistos = 3;
				
				$lista0 = "SELECT * FROM items WHERE id_cat = ".$cat."" ;
				$lista0 = mysql_query($lista0,$sqlweb);
				$totalSql = mysql_num_rows($lista0);
				
				$pagTotal = ceil($totalSql/$regVistos);
				
				if (!isset($_GET['pag'])) {$pagActual=1;} else {$pagActual=$_GET['pag'];}
				$pagAnterior = $pagActual-1;
				$pagSiguiente = $pagActual+1;
				
				
				
				echo'<div style="width:630px;text-align: center;font-size:15px;">Paginas ';
				if ($pagAnterior>0) {echo '<a href="index.php?rzm=itemshop&cat='.$cat.'&pag='.$pagAnterior.'">Anterior</a> - ';}
				$pgIntervalo = 3;
				$pgMaximo = ($pgIntervalo*2)+1; 
				$pg=$pagActual-$pgIntervalo;$i=0;
				while ($i<$pgMaximo) {
				 if ($pg==$pagActual) {$strong=array('<strong>','</strong>');} else {$strong=array('','');}
				 if ($pg>0 and $pg<=$pagTotal) {
				  echo ''.$strong[0].'<a href="index.php?rzm=itemshop&cat='.$cat.'&pag='.$pg.'">'.$pg.'</a> - '.$strong[1].'';
				  $i++;
				 }
				 if ($pg>$pagTotal) {$i=$pgMaximo;}
				 $pg++;
				}
				
				if ($pagSiguiente<=$pagTotal) {echo '<a href="index.php?rzm=itemshop&cat='.$cat.'&pag='.$pagSiguiente.'">Siguiente</a>';
				}
				echo '</div>';
	$items = "SELECT * FROM items WHERE id_cat = ".$cat." LIMIT ".(($pagActual-1)*$regVistos).",".$regVistos."";
	$items = mysql_query($items,$sqlweb);
	while($itm = mysql_fetch_array($items)){
		$precio = $itm['precio'];
		$value = $itm['value_ob'];
		$desc = $itm['descripcion'];
			mysql_select_db('player');
			$ite = "SELECT * FROM item_proto WHERE vnum = ".$value."";
			$ite = mysql_query($ite,$sqlserver);
			while($itemf = mysql_fetch_array($ite)){
				$nombre = $itemf['locale_name'];
				$valuem1 = $itemf['value1'];
				$valuem2 = $itemf['value2'];
				$valuef1 = $itemf['value3'];
				$valuef2 = $itemf['value4'];
				$and = $itemf['value5'];
				$vel = $itemf['applyvalue0'];
				$bonusm1 = $valuem1 + $and;
				$bonusm2 = $valuem2 + $and;
				$bonusf1 = $valuef1 + $and;
				$bonusf2 = $valuef2 + $and;
				$tipo = $itemf['type'];
				$niv = $itemf['limitvalue0'];
				$nivel = "Nivel: ".$niv."<br/><br/>";
				$raza = $itemf['antiflag'];
				$razas = NULL;
				if($raza == 0){
					$razas = "Todos";
				}
				elseif($raza == 1){
					$razas ="Hombre";
				}
				elseif($raza == 2){
					$razas ="Mujer";
				}
				elseif($raza == 28 || $raza == 284){
					$razas ="Chaman";
				}
				elseif($raza == 44 || $raza == 288){
					$razas ="Sura";
				}
				elseif($raza == 52 || $raza == 308){
					$razas ="Ninja";
				}
				elseif($raza == 56 || $raza == 312){
					$razas ="Guerrero";
				}
				elseif($raza == 300){
					$razas ="Gerrero";
				}
				elseif($raza == 32){
					$razas ="Guerrero, Ninja y Sura";
				}
				
				
				
					
				if($tipo == 1){
					$bonus1 = '&nbsp;Valor M.= '.$bonusm1.' - '.$bonusm2.'<br/><br/>';
					$bonus2 =  '&nbsp;Valor F.= '.$bonusf1.' - '.$bonusf2.'<br/><br/>';
					$velcodidad = '&nbsp;Vel Atc= '.$vel.'<br/><br/>';
				}else{
					$bonus1 = NULL;
					$bonus2= NULL;
					$velcodidad= NULL;
					
				}
			
				if($tipo == 1  || $tipo == 2){

					echo'

					<div id="main-top-item">
	
					<h2 class="main-title">'.$nombre.'</h2>
					<p class="other-title" style="font-size: 18px;">Mds: '.$precio.'</p>
					</div>
				        <div id="main-cent-item">
				        	<div id="main-wrap-item">
					<table width="317" border ="0"style="margin-left:130px;">
			
					  <tr>
						<td height="95" align="center"><img width="50" src="archivos/itemshop/items/'.$value.'.gif"/> </td>
						<td height="95" style="font-size:12px;">
						'.$bonus1.''.$bonus2.''.$velcodidad.'
						&nbsp;'.$nivel.'
						&nbsp;Raza: '.$razas.'

						</td>
					  </tr>
					  <tr >
						<td width="78" height="20" colspan="2">
						<form method="post" action="index.php?rzm=itemshop&is=comprar">
						<input type="hidden" name="value" value="'.$value.'">
						<p style="margin-top:10px;font-size: 11px;">'.$desc.'</p>
						<input type="submit" name="comprar" id="enter" class="comprar" value="Comprar"></form>
						</td>
						
					  </tr>
					 </table></div></div><div id="main-end-item"></div>
					
				';
				}
				else{
					echo'
					<div id="main-top-item">
	
					<h2 class="main-title">'.$nombre.'</h2>
						<p class="other-title" style="font-size: 18px;">Mds: '.$precio.'</p>
					</div>
				        <div id="main-cent-item">
				        	<div id="main-wrap-item">
					<table width="317" border ="0" style="margin-left:130px;">
				
					  <tr>
						<td height="95" align="center"><img  width="50" src="archivos/itemshop/items/'.$value.'.gif"/> </td>
						<td height="95" style="font-size:12px;">
						
						</td>
					  </tr>
					  <tr >
						<td width="64" height="20" colspan="2">
						<form method="post" action="index.php?rzm=itemshop&is=comprar">
						<input type="hidden" name="value" value="'.$value.'">
						<p style="margin-top:10px;font-size: 11px;">'.$desc.'</p>
						<input type="submit" name="comprar" class="comprar" id="enter" value="Comprar"></form>
						</td>
					  </tr>
					 </table></div></div><div id="main-end-item"></div>
					 
				';
					
				}
			}
	}

}
else{
	echo'Elige una categoria';
	}
	
	 echo'';
}else{
	echo'Tienes que loguearte';
	
}
?></div></div><div id="main-end"></div>