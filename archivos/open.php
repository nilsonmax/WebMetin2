<div id="main-top">
	
	<h2 class="main-title">Sistema de Tickets</h2>
	</div>
        <div id="main-cent">
        	<div id="main-wrap">
          <?php
	
		  if(isset($_POST['open'])){
			  
			 mysql_select_db(nombre_db_web);
			  $email = mysql_real_escape_string($_POST['email']);
			  $codigo = mysql_real_escape_string($_POST['codigo']);
			  $services = "SELECT * FROM ticket WHERE email = '".$email."' and id_ticket = '".$codigo."' ";
			  $inicio_t = mysql_query($services, $sqlweb);
			  if(mysql_num_rows($inicio_t) > 0){
				  $men = mysql_fetch_assoc($inicio_t);
				  $asunto = $men['asunto'];
				  $fecha = $men['fecha'];
				  $estado = $men['estado'];
				  $mensaje = $men['mensaje'];
				 
				  echo '
							<table width="443" style="margin-top:-20px;">
							  <tr>
								<td width="215" height="53">Asunto: '.$asunto.'</td>
								<td width="137">'.$fecha.'</td>
								<td width="75">'.$estado.'</td>
							  </tr>
							  <tr>
								<td colspan="3" valign="top">'.$mensaje.'</td>
							  </tr>
							</table><br/>';
							
						$services = "SELECT * FROM ticket_sec WHERE id_ticket = '".$codigo."' ORDER BY id ASC";
						$res = mysql_query($services, $sqlweb);
						while($resu = mysql_fetch_array($res)){
							$mensaje_r = $resu['mensaje'];
							$fecha_r = $resu['fecha'];
							$nombre_r = $resu['nombre_res'];
							
							if($nombre_r == NULL){
								$nombre_r = "Yo";
								$style = 'style="width:436;background-color:;"';
							}else{
								$style = 'style="width:436;background-color:;"';
							}
							
							echo'<div '.$style.'> 
							<div><strong>'.$nombre_r.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>Fecha ('.$fecha_r.')</div>
							
							<div style="margin-top:5px;">'.$mensaje_r.'</div></div><br/>'	;	
							
							
							
						}
								
				echo'<table width="436" height="182">
				<form action="index.php?rzm=ticket" method="post">
					  <tr>
						<td width="66" height="151" valign="top"><p>&nbsp;</p>
					    <p>Respuesta</p></td>
						<td width="354"><textarea class="textarea" name="resp" cols="40" rows="7"  style="width:85%"> </textarea></td>
  </tr>
					  <tr>
						<td height="23">&nbsp;</td>
						<input type="hidden" name="codigo" value="'.$codigo.'">
						<td><input type="submit" name="res" value="Responder"></td>
					  </tr>
					  </form>
					</table>';
							
			 
			
					
					
					
					
					
				  
			  }else{
				 echo '<p>&nbsp; No hay ningun ticket con ese codigo o email</p>';
				
				 }
			  }else{
		  
		  
		  ?>
          
          <form action="index.php?rzm=open" method="post">
          <table width="351" >
              <tr>
                <td width="111">Email</td>
                <td width="224"><label for="textfield"></label>
                  <input name="email" type="text" id="textfield" size="35" /></td>
              </tr>
              <tr>
                <td>Codigo Ticket</td>
                <td><input name="codigo" type="text" id="textfield2" size="35" /></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td><input type="submit" name="open" id="open" value=" Abrir " /></td>
              </tr>
            </table>
   
          </form>
          <?php } ?>
  </div></div>
   <div id="main-end"></div>
