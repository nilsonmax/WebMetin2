<div id="main-top">
	
	<h2 class="main-title">Tickets</h2>
	</div>
        <div id="main-cent">
        	<div id="main-wrap">

          <?php if(isset($_SESSION['administrador']) && $_SESSION['administrador'] >= 1){ 
		 mysql_select_db(nombre_db_web);


		   if(isset($_POST['cerrar'])){
			  mysql_select_db(nombre_db_web);
		$cod = mysql_real_escape_string($_POST['codigo']);
		$up= mysql_query("UPDATE ticket SET estado = 'Cerrado' WHERE id_ticket = '".$cod."'");
		mysql_query($up,$sqlweb);
			  
		  }
		  if(isset($_POST['enviar'])){
			   mysql_select_db(nombre_db_web);
			   $nom = mysql_real_escape_string($_POST['nombre']);
			    $resp = mysql_real_escape_string($_POST['resp']);
				$cod = mysql_real_escape_string($_POST['codigo']);
								$resp = nl2br($resp);
				$fe = date("d-m-Y H:i:s");
				
				  
		$up = mysql_query("INSERT INTO ticket_sec set id_ticket='".$cod."', mensaje = '".$resp."', fecha='".$fe."', nombre_res ='".$nom."'");
		 $insert = mysql_query($up,$sqlweb);
		echo'Respondido';
			  
		  }
		  if(isset($_GET['clave'])){
			    mysql_select_db(nombre_db_web);
			  $codigo = $_GET['clave'];
			   $up = "SELECT * FROM ticket WHERE id_ticket = '".$codigo."' ";
			   $inicio_t = mysql_query($up,$sqlweb);
			  if(mysql_num_rows($inicio_t) > 0){
				  $men = mysql_fetch_assoc($inicio_t);
				  $asunto = $men['asunto'];
				  $fecha = $men['fecha'];
				  $estado = $men['estado'];
				  $mensaje = $men['mensaje'];
				 
				 echo '<table width="443" style="margin-top:-60px;">
<tr>
								<td width="215" height="53">Asunto: '.$asunto.'</td>
								<td width="137">'.$fecha.'</td>
								<td width="75">'.$estado.'</td>
							  </tr>
							  <tr>
								<td colspan="3" valign="top">'.$mensaje.'</td>
							  </tr>
							</table><br/>';
							
						$up ="SELECT * FROM ticket_sec WHERE id_ticket = '".$codigo."' ORDER BY id ASC";
						$res = mysql_query($up,$sqlweb);
						while($resu = mysql_fetch_array($res)){
							$mensaje_r = $resu['mensaje'];
							$fecha_r = $resu['fecha'];
							$nombre_r = $resu['nombre_res'];
							
							if($nombre_r == NULL){
								$nombre_r = "Usuario";
								$style = 'style="width:436;background-color:;"';
							}else{
								$style = 'style="width:436;background-color:;"';
							}
							
							echo'<div '.$style.'> 
							<div><strong>'.$nombre_r.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>Fecha ('.$fecha_r.')</div>
							
							<div style="margin-top:5px;">'.$mensaje_r.'</div></div><br/>'	;	
							
							
							
						}
								
				echo'<table width="436" height="175">
				<form action="index.php?rzm=admin&ad=ticket" method="post">
					  <tr>
						<td width="66" height="22"><p>Nombre</p></td>
						<td width="354"><input type="text" name="nombre" /></td>
  </tr>
					  <tr>
						<td height="23">Respuesta</td>
						
						<input type="hidden" name="codigo" value="'.$codigo.'">
						<td><textarea class="textarea" name="resp" cols="40" rows="7"  style="width:85%"> </textarea></td>
					  </tr>
					  <tr>
					    <td height="23">&nbsp;</td>
					    <td><input type="submit" name="enviar" value="Responder"> </form><p>&nbsp;</p><form action="index.php?rzm=admin&ad=ticket" method="post">
						<input type="hidden" name="codigo" value="'.$codigo.'">
						<input type="submit" name="cerrar" value="Cerrar Ticket"></form></td>
			      </tr>
					 
					</table>';
			  
			  }
			  
			  
			
			  
		  }
		  else{
		  $up = "SELECT asunto, departamento, id_ticket FROM ticket WHERE estado = 'Abierto' ORDER BY id DESC";
		  $ticket = mysql_query($up,$sqlweb);
		  $contar = mysql_num_rows($ticket);
		  if($contar > 0){
		  echo '<ul>';
        	while($fila = mysql_fetch_array($ticket)){
				
     			$ausunto = $fila['asunto'];
				$depar = $fila['departamento'];
				$id_ticket = $fila['id_ticket'];
				$up = "SELECT departamento FROM departamentos WHERE id =".$depar."";
				$dep = mysql_query($up,$sqlweb);
					while($fil = mysql_fetch_array($dep)){
						$depars = $fil['departamento'];
				
				echo ' <li class="style4"><a href="index.php?rzm=admin&ad=ticket&clave='.$id_ticket.'">'.$ausunto.'</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;('.$depars.')</li>';
					}
				}
			
			
				
        echo '</ul>';
        	}else{
		 

		  		echo' <h2> No hay Tickets</h2>';
		  	}
		  }
		
        ?>
        <p>&nbsp;</p>
		 <?php  }else{
			echo' No puedes entrar aqui';}?>
       	</div></div>
   <div id="main-end"></div>
  