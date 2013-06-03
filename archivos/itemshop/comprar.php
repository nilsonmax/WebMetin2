<div id="main-top">
	
	<h2 class="main-title">Item Shop</h2>
	</div>
        <div id="main-cent">
        	<div id="main-wrap">
<?php
 if(isset($_SESSION['usuario'])){
	$value = $_POST['value'];
mysql_select_db(nombre_db_web);

	$ejecu = "SELECT id from items where value_ob = ".$value." LIMIT 1";
	$presss = mysql_query($ejecu,$sqlweb);
	if(mysql_num_rows($presss) <= 0){
		die;
	}

	
	$preciosql = "SELECT precio from items where value_ob = ".$value." LIMIT 1";

	$pree = mysql_query($preciosql,$sqlweb);

	$filapre = mysql_fetch_assoc($pree);

	$precio = $filapre['precio'];

	if(isset($_SESSION['posicion'])){
		
	}
	else{
	mysql_select_db('player');
	$item = "SELECT * FROM item WHERE owner_id =".$_SESSION['usuario_id']." AND  window = 'MALL' ORDER BY DESC LIMIT 1";
$item = mysql_query($item,$sqlserver);

	$resul = mysql_fetch_array($item);
	if($resul == TRUE){
		$_SESSION['posicion'] = $resul['pos'];
         $_SESSION['posicion'] + 1 ;
	}else{
		$_SESSION['posicion'] = 1;
	}
	}
	
			
		mysql_select_db('account');
		
	$itemss = "SELECT coins FROM account WHERE id = ".$_SESSION['usuario_id']."";
	$items = mysql_query($itemss,$sqlserver);
	while($mds = mysql_fetch_array($items)){
		$monedas = $mds['coins'];
	}
	if ($precio <= $monedas){
		$mdfinal = $monedas - $precio;
		mysql_select_db('account');
		$upmds = "UPDATE account SET coins = '".$mdfinal."' WHERE id = ".$_SESSION['usuario_id']."";
		mysql_query($upmds,$sqlserver);

	mysql_select_db('player');
	$insertarob ="INSERT INTO item SET owner_id = '".$_SESSION['usuario_id']."', window = 'MALL', pos = '".$_SESSION['posicion']."', count = '1', vnum = '" .$value. "', socket0 = '1', socket1 = '1', socket2 = '1'";
	$final =  mysql_query($insertarob,$sqlserver); 
	if($final == TRUE){
	echo 'Compra realizada Satisfactoriamente';

	mysql_select_db(nombre_db_web);
	$vercompra = "SELECT comprados  FROM items WHERE value_ob = '".$value."'";
	$vercompra = mysql_query($vercompra,$sqlweb); 
	while($filacompra = mysql_fetch_array($vercompra)){
	$sube = $filacompra['comprados'] + 1;
	}
	$compraup = "UPDATE items SET comprados = ".$sube." WHERE value_ob = ".$value."";
	mysql_query($compraup,$sqlweb); 
	$compraup = "INSERT INTO log_itemshop SET  usuario = '".$_SESSION['usuario_id']."' , item = '".$value."' , precio ='".$precio."'";
	mysql_query($compraup,$sqlweb); 
	}
	else{echo 'Error no fue comprado el item';
	die('Could not connect: ' . mysql_error());
	}
	if($_SESSION['posicion'] == '42') {
				 
				 $_SESSION['posicion'] = '0'; }
				 else { $_SESSION['posicion'] = $_SESSION['posicion'] + 1; }
	
	
	}
	else{
		echo' No tienes suficientes mds';}
 }else{
	echo'Tienes que loguearte';
	
}
?>
  </div></div>
   <div id="main-end"></div>
