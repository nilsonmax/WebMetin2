<?php
//crear tablas
function mysqls($nombre_db_web, $usuario_db_web, $pass_db_web, $ip_db_web,
$usuario_db_server, $pass_db_server, $ip_db_server){

	$conweb  = mysql_connect( $ip_db_web, $usuario_db_web ,$pass_db_web );

	$conserver  = mysql_connect( $ip_db_server, $usuario_db_server ,$pass_db_server );

	mysql_query("CREATE DATABASE ".$nombre_db_web."",$conweb);
	sleep(1);
	mysql_select_db($nombre_db_web);
 	$tablasweb = "
	 	CREATE TABLE `categorias` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
		  `nombre` varchar(50) DEFAULT NULL,
		  PRIMARY KEY (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=latin1 ";

			mysql_query($tablasweb,$conweb);



			$tablasweb = "CREATE TABLE `baneo` (
		  `id` int(255) NOT NULL AUTO_INCREMENT,
		  `id_cuenta` int(255) DEFAULT NULL,
		  `motivo` varchar(255) DEFAULT NULL,
		  `fecha` varchar(50) DEFAULT NULL,
		  PRIMARY KEY (`id`)
		) ENGINE=MyISAM DEFAULT CHARSET=latin1 ";
			mysql_query($tablasweb,$conweb);
				
		$tablasweb = "CREATE TABLE `bug` (
		  `id` int(40) NOT NULL AUTO_INCREMENT,
		  `usuario` varchar(60) DEFAULT NULL,
		  `asunto` varchar(60) DEFAULT NULL,
		  `bug` varchar(500) DEFAULT NULL,
		  `fecha` date DEFAULT NULL,
		  `estado` enum('Sin Corregir','En Proceso','Corregido') DEFAULT 'Sin Corregir',
		  PRIMARY KEY (`id`)
		) ENGINE=MyISAM DEFAULT CHARSET=latin1  ";
		mysql_query($tablasweb,$conweb);

		$tablasweb = "CREATE TABLE `items` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
		  `id_cat` int(11) DEFAULT NULL,
		  `value_ob` int(11) DEFAULT NULL,
		  `descripcion` varchar(255) DEFAULT NULL,
		  `precio` varchar(255) DEFAULT NULL,
		  `comprados` int(20) DEFAULT '0',
		  PRIMARY KEY (`id`)
		) ENGINE=MyISAM DEFAULT CHARSET=latin1";
		mysql_query($tablasweb,$conweb);

		$tablasweb = "CREATE TABLE `log_itemshop` (
		  `id` int(10) NOT NULL AUTO_INCREMENT,
		  `usuario` varchar(50) NOT NULL,
		  `item` varchar(50) NOT NULL,
		  `precio` varchar(50) NOT NULL,
		  `fecha` varchar(50) NOT NULL,
		  PRIMARY KEY (`id`)
		) ENGINE=MyISAM DEFAULT CHARSET=latin1";
mysql_query($tablasweb,$conweb);
		$tablasweb = "CREATE TABLE `noticias` (
		  `id` int(10) NOT NULL AUTO_INCREMENT,
		  `titulo` varchar(50) CHARACTER SET ascii NOT NULL,
		  `fecha` varchar(50) CHARACTER SET ascii NOT NULL,
		  `noticia` mediumtext CHARACTER SET utf8 NOT NULL,
		  PRIMARY KEY (`id`)
		) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin";

mysql_query($tablasweb,$conweb);
		$tablasweb = "CREATE TABLE `version` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
		  `version` int(11) DEFAULT NULL,
		  PRIMARY KEY (`id`)
		) ENGINE=MyISAM DEFAULT CHARSET=latin1";
	
mysql_query($tablasweb,$conweb);

			

		$tablasweb = "CREATE TABLE `ticket_sec` (
		  `id` int(50) NOT NULL AUTO_INCREMENT,
		  `id_ticket` varchar(5000) DEFAULT NULL,
		  `nombre_res` varchar(500) DEFAULT NULL,
		  `mensaje` varchar(5000) DEFAULT NULL,
		  `fecha` varchar(500) DEFAULT NULL,
		  PRIMARY KEY (`id`)
		) ENGINE=MyISAM DEFAULT CHARSET=latin1";
mysql_query($tablasweb,$conweb);

		$tablasweb = "CREATE TABLE `ticket` (
		  `id` int(50) NOT NULL AUTO_INCREMENT,
		  `id_ticket` varchar(5000) DEFAULT NULL,
		  `asunto` varchar(50) DEFAULT NULL,
		  `mensaje` varchar(5000) DEFAULT NULL,
		  `cuenta` varchar(60) DEFAULT NULL,
		  `email` varchar(60) DEFAULT NULL,
		  `fecha` varchar(60) DEFAULT NULL,
		  `estado` enum('Abierto','Cerrado') DEFAULT NULL,
		  `departamento` varchar(50) DEFAULT NULL,
		  `ip` varchar(30) DEFAULT NULL,
		  PRIMARY KEY (`id`)
		) ENGINE=MyISAM DEFAULT CHARSET=latin1";
mysql_query($tablasweb,$conweb);
		
		$tablasweb = "CREATE TABLE `departamentos` (
		  `id` int(30) NOT NULL AUTO_INCREMENT,
		  `departamento` varchar(300) DEFAULT NULL,
		  PRIMARY KEY (`id`)
		) ENGINE=MyISAM DEFAULT CHARSET=latin1";
	mysql_query($tablasweb,$conweb);


		$tablasweb = "CREATE TABLE `chat` (
  `id` int(11) DEFAULT NULL,
  `comentario` varchar(255) DEFAULT NULL,
  `fecha` varchar(255) DEFAULT NULL,
  `usuario` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1";
	mysql_query($tablasweb,$conweb);



	$tablasweb = "CREATE TABLE `chat_ban` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1";
	mysql_query($tablasweb,$conweb);


	$tablasweb = "CREATE TABLE `chat_estado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(255) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1";
	mysql_query($tablasweb,$conweb);



		mysql_select_db("account");
		$tablasserver = "ALTER TABLE account ADD  administrador int(3)";
		mysql_query($tablasserver,$conserver);

		mysql_select_db($nombre_db_web);
		$tablasweb = "INSERT INTO `version` VALUES (2, 2)";
			mysql_query($tablasweb,$conweb);
			$tablasweb = "INSERT INTO `version` VALUES (1, 1)";
			mysql_query($tablasweb,$conweb);
			$tablasweb = "INSERT INTO `version` VALUES (3, 3)";
			mysql_query($tablasweb,$conweb);
			$tablasweb = "INSERT INTO `version` VALUES (4, 4)";
			mysql_query($tablasweb,$conweb);
			$tablasweb = "INSERT INTO `version` VALUES (5, 5)";
			mysql_query($tablasweb,$conweb);
			$tablasweb = "INSERT INTO `version` VALUES (6, 6)";
			mysql_query($tablasweb,$conweb);
			$tablasweb = "INSERT INTO `version` VALUES (7, 7)";
			mysql_query($tablasweb,$conweb);
			$tablasweb = "INSERT INTO `version` VALUES (9, 9)";
			mysql_query($tablasweb,$conweb);
			$tablasweb = "INSERT INTO `version` VALUES (10, 10)";
			mysql_query($tablasweb,$conweb);
			$tablasweb = "INSERT INTO `version` VALUES (11, 11)";
			mysql_query($tablasweb,$conweb)





}
//crear archivo configuracion
function archivo_conf($nombre_db_web, $usuario_db_web, $pass_db_web, $ip_db_web,
$usuario_db_server, $pass_db_server, $ip_db_server, $rel_paypal, $rel_sms){
	if($rel_paypal != ""){
		
		$activar_paypal = "OK";
	}
	else{
		$activar_paypal = "NO";
	}
	if($rel_sms != ""){
		
		$activar_sms = "OK";
	}else{
		$activar_sms = "NO";
	}
	if(empty($_SESSION['p_donacion'])){

		$paypal1 = "NO";
	}
	else{
		$paypal1 = "OK";
	}
	if(empty($_SESSION['s_donacion'])){
		
		$paypal2 = "NO";
	}
	else{
		$paypal2 = "OK";
	}
	
	if(empty($_SESSION['t_donacion'])){
		
		$paypal3 = "NO";
	}
	else{
		$paypal3 = "OK";
	}
	

	$archivo ="config.web.php"; 
	$config = fopen("../configuraciones/".$archivo,"w+"); 
	$dato = '<?php'."\n";
	$dato .='DEFINE("nombre_db_web", "'.$nombre_db_web.'");'."\n"; 
	$dato .='DEFINE("usuario_db_web", "'.$usuario_db_web.'");'."\n"; 
	$dato .='DEFINE("pass_db_web", "'.$pass_db_web.'");'."\n"; 
	$dato .='DEFINE("ip_db_web", "'.$ip_db_web.'");'."\n"; 
	$dato .= "\n"; 
	$dato .='DEFINE("usuario_db_server", "'.$usuario_db_server.'");'."\n"; 
	$dato .='DEFINE("pass_db_server", "'.$pass_db_server.'");'."\n"; 
	$dato .='DEFINE("ip_db_server", "'.$ip_db_server.'");'."\n"; 
	$dato .= "\n";  
	$dato .='$sqlweb = mysql_connect(ip_db_web,usuario_db_web,pass_db_web);'."\n";
	$dato .= "\n"; 	
	$dato .='$sqlserver = mysql_connect(ip_db_server, usuario_db_server, pass_db_server);'."\n";
	$dato .= "\n"; 
	$dato .='$activar_sms = "'.$activar_sms.'";'."\n"; 
	$dato .='$activar_paypal = "'.$activar_paypal.'";'."\n"; 
	$dato .='$paypal1 = "'.$paypal1.'";'."\n"; 
	$dato .='$paypal2 = "'.$paypal2.'";'."\n"; 
	$dato .='$paypal3 = "'.$paypal3.'";'."\n"; 
	$dato .= "\n"; 	
	$dato .= '?>'."\n";
	fwrite($config,$dato);
	fclose($config);

	
}

//crear donaciones paypal
function paypal($email_paypal, $donacion,	$eu_donacion,	$mds_donacion, $name, 
$usuario_db_server, $pass_db_server, $ip_db_server, $url){
	
	//archivo para ver las donaciones
	$archivos ="".$name.".php"; 
	$configs = fopen("../archivos/".$archivos,"w+"); 	
	$datos ='<form action="https://www.paypal.com/cgi-bin/webscr" method="post">'."\n";
	$datos .='<input type="hidden" name="cmd" value="_donations">'."\n";
	$datos .='<input type="hidden" name="business" value="'.$email_paypal.'">'."\n";
	$datos .='<input type="hidden" name="lc" value="GB">'."\n";
	$datos .='<input type="hidden" name="item_name" value="Pack de MD´s">'."\n";
	$datos .='<h4>Mds: '.$mds_donacion.'</h4><p/>'."\n";
	$datos .='<h4>ID de Cuenta: &nbsp;&nbsp;<input type="text"  name="custom" value="">'."\n";
	$datos .='<input type="hidden" name="item_number" value="1">'."\n";
	$datos .='<input type="hidden" name="amount" value="'.$eu_donacion.'.0">'."\n";
	$datos .='<input type="hidden" name="currency_code" value="EUR">'."\n";
	$datos .='<input type="hidden" name="no_note" value="0">'."\n";
	$datos .='<input type="hidden" name="no_shipping" value="0">'."\n";
	$datos .='<input type="hidden" name="currency_code" value="EUR">'."\n";
	$datos .='<input type="hidden" name="notify_url" value="'.$url.'/ipn/'.$name.'.conf.php">'."\n";
	$datos .='<input type="hidden" name="return" value="'.$url.'">'."\n";
	$datos .='<input type="hidden" name="rm" value="0">'."\n";
	$datos .='<input type="hidden" name="bn" value="PP-DonationsBF:btn_donateCC_LG_global.gif:NonHosted">'."\n";
	$datos .='<input type="image" src="https://www.paypal.com/en_US/i/btn/btn_donate_LG.gif" border="0" name="submit" >'."\n";
	$datos .='<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1"></h4>'."\n";
	$datos .='<p>&nbsp;</p>'."\n";
	$datos .='<p>&nbsp;</p>'."\n";
	$datos .='<p>&nbsp;</p>'."\n";
	$datos .='</form>'."\n";
	fwrite($configs,$datos);
	fclose($configs);
	
	
	//archivo de configuraciones paypal
	$archivo ="".$name.".conf.php";
	$config = fopen("../archivos/".$archivo,"w+"); 
	$dato = '<?php'."\n";
	$dato .= '$mysql_host = "'.$ip_db_server.'";'."\n";
	$dato .= '$mysql_user = "'.$usuario_db_server.'";'."\n";
	$dato .= '$mysql_pass = "'.$pass_db_server.'";'."\n";
	$dato .= '$mysql_db = "account";'."\n";
	$dato .= '$custom = stripslashes(ucwords(strtolower(trim($_REQUEST["custom"]))));'."\n";
	$dato .= '$receiver_email = $_REQUEST["receiver_email"];'."\n";
	$dato .= '$payment_status = $_REQUEST["payment_status"];'."\n";
	$dato .= '$db = mysql_connect($mysql_host, $mysql_user, $mysql_pass);'."\n";
	$dato .= 'mysql_select_db($mysql_db, $db);'."\n";
	$dato .= 'if ($payment_status == "Completed" & $receiver_email == "'.$email_paypal.'") {'."\n";
	$dato .= '$query = "SELECT * FROM account WHERE login = \'$custom\'";'."\n";
	$dato .= '$result = mysql_query($query);'."\n";
	$dato .= '$prem = mysql_fetch_array($result);'."\n";
	$dato .= '$points = $prem["coins"] + '.$mds_donacion.';'."\n";
	$dato .= '$qry2 = "UPDATE account SET coins = \'$points\' WHERE login = \'$custom\'";'."\n";
	$dato .= '$result2 = mysql_query($qry2);'."\n";
	$dato .= '}'."\n";
	$dato .= '?>'."\n";
	fwrite($config,$dato);
	fclose($config);
}


//crear donaciones sms
function sms($frame,$mds,$usuario_db_server, $pass_db_server, $ip_db_server){
	//archivo para ver las donaciones
	$archivos ="iframesms.php"; 
	$configs = fopen("../archivos/".$archivos,"w+"); 
	
	$datos = $frame;
	$datos .='<p>&nbsp;</p>'."\n";
	fwrite($configs,$datos);
	fclose($configs);
	
	//archivo de configuraciones sms
	$archivo ="sms.conf.php";
	$config = fopen("../archivos/".$archivo,"w+"); 
	$dato = '<?php'."\n";
	$dato .='ini_set("display_errors",false);'."\n"; 
	$dato .='define("DB_HOST", "'.$ip_db_server.'");'."\n"; 
	$dato .='define("DB_USER", "'.$usuario_db_server.'");'."\n"; 
	$dato .='define("DB_PASS", "'.$pass_db_server.'");'."\n"; 
	$dato .='define("DB_NAME", "account");'."\n"; 
	$dato .='define("DB_TYPE", "mysql");	'."\n"; 
	$dato .='define("REQUIRED_IP",	"");'."\n"; 
	$dato .='define("REQUIRED_KEY",	"712h21g6vy815ed");	'."\n"; 
	$dato .='define("REQUIRED_IP",	"");'."\n"; 
	$dato .='define("TABLE_NAME",	"account");	'."\n"; 
	$dato .='define("ACCOUNT_FIELD",	"login");'."\n"; 
	$dato .='define("COINS_FIELD",	"coins");'."\n"; 
	$dato .='define("COINS_DEFAULT_ADD", '.$mds.');'."\n"; 
	$dato .='include(lib/sms.lib.php");'."\n";
	$dato .= '?>'."\n";
	fwrite($config,$dato);
	fclose($config);
}

//seguridad enlaces
function validar($cadenatext){
   $cadenatext = str_replace("\'","",$cadenatext);
   $cadenatext = str_replace('\"',"",$cadenatext);
   $cadenatext = str_replace("'","",$cadenatext);
   $cadenatext = str_replace('"',"",$cadenatext);
   $cadenatext = str_replace('insert',"",$cadenatext);
   $cadenatext = str_replace('select',"",$cadenatext);
   $cadenatext = str_replace('update',"",$cadenatext);
   $cadenatext = str_replace('delete',"",$cadenatext);
   $cadenatext = str_replace('distinct',"",$cadenatext);
   $cadenatext = str_replace('truncate',"",$cadenatext);
   $cadenatext = str_replace('where',"",$cadenatext);
   $cadenatext = str_replace('WHERE',"",$cadenatext);
   $cadenatext = str_replace('as',"",$cadenatext);
   $cadenatext = str_replace('like',"",$cadenatext);
   $cadenatext = str_replace('limit',"",$cadenatext);
   $cadenatext = str_replace('or',"",$cadenatext);
   $cadenatext = stripslashes($cadenatext);
   $cadenatext = explode("\\",$cadenatext);
   $cadenatext = implode("",$cadenatext); 
   $cadenatext = strip_tags($cadenatext, '<p></p><br /><br/></br></ br>');
   return $cadenatext;
}
?>