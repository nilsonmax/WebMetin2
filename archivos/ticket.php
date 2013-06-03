<div id="main-top">
	
	<h2 class="main-title">Sistema de Tickets</h2>
	</div>
        <div id="main-cent">
        	<div id="main-wrap">
           <?php  if(isset($_POST['res'])){
			   mysql_select_db(nombre_db_web);
			    $resp = mysql_real_escape_string($_POST['resp']);
				$cod = mysql_real_escape_string($_POST['codigo']);
								$resp = nl2br($resp);
				$fe = date("d-m-Y H:i:s");
				
				  
		$insert = "INSERT INTO ticket_sec set id_ticket='".$cod."', mensaje = '".$resp."', fecha='".$fe."'";
		mysql_query($insert, $sqlweb);
				
			  echo '<p>&nbsp;</p><p>Respuesta enviada</p><p>&nbsp;</p>
			  <META HTTP-EQUIV="Refresh" CONTENT="2; URL=index.php?rzm=ticket">
			  
			  ';}else{ ?>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <div align="center"><a href="index.php?rzm=tickets"><img src="images/crear.jpg" /></a>
          <p>&nbsp;</p>
          <a href="index.php?rzm=open"><img src="images/abrir.jpg" /></a></div>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <?php }?>
</div></div>
   <div id="main-end"></div>