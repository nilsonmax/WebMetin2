 <div id="main-top">
	
	<h2 class="main-title">Opciones Ticket</h2>
	</div>
        <div id="main-cent">
        	<div id="main-wrap">
        		<?php if(isset($_SESSION['administrador']) && $_SESSION['administrador'] >= 1){ 

        			if(isset($_POST['andir'])){
	             mysql_select_db(nombre_db_web);

	            
	             $dep = $_POST['dep'];
	             $selecs = "INSERT INTO departamentos SET departamento = '".$dep."'";
	             $ite = mysql_query($selecs,$sqlweb);
	         }
	             ?>
	             <form action="" method="post">

	             	<p>Nombre Departamento <input class="bar" type="text" id="infoadmin" name="dep" /></p>
	             	<input id="enter" class="submit"  type="submit" name="andir" value="Añadir">
	             </form>
	             <?php
	         }
	         ?>
 </div></div>
   <div id="main-end"></div>