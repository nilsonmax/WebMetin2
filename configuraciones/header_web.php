<?php if(isset($_GET['des'])){
	$des = mysql_real_escape_string($_GET['des']);
	if($des == 1){
	unset($_SESSION['usuario_id']);
	unset($_SESSION['usuario']);
	unset($_SESSION['administrador']);
	session_destroy;
	header("Location: index.php");
	}
	
}
if(isset($_POST['loguear'])){
	$nombre = mysql_real_escape_string($_POST['userid']);
	$pass = mysql_real_escape_string($_POST['pasw']);
	$select = mysql_query("SELECT * FROM account.account WHERE login = '".$nombre."' AND password=PASSWORD('".$pass."')   LIMIT 1");
	if(mysql_num_rows($select)>0){
        $fila = mysql_fetch_object($select);
		$_SESSION["usuario_id"] = $fila->id;
		$_SESSION["usuario"] = $fila->login;
		$_SESSION['rango'] = 1;
		$_SESSION['mds'] = $fila->coins;
		$_SESSION["administrador"] = $fila->administrador;
		header("Location: index.php");
	  }
}
function ticketemail($email_ticket,$codigo_ticket,$asunto_ticket){
								$para = $email_ticket;
								$asunto = "Ticket Metin2 Support";
								$mensaje1 = "---------------------------------- \n";
								$mensaje1.= "            Metin2 Support              \n";
								$mensaje1.= "---------------------------------- \n";
								$mensaje1.= "Se ha efectuado una respuesta al ticket con el asunto: ".$asunto_ticket."\n";
								$mensaje1.= "Puede ver la respuesta entrando con:\n";
								$mensaje1.= "Email: ".$email_ticket."\n";
								$mensaje1.= "Codigo: ".$codigo_ticket."\n";
								mail($para, $asunto, utf8_decode($mensaje1));  
								
}
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