
	  <?PHP
            if(isset($_SESSION['administrador']) && $_SESSION['administrador'] >= 1){
            
                   $directorio = "./archivos/administracion/";
   
						if(isset($_GET['ad']) && !empty($_GET['ad']))
					{
					  if(file_exists($directorio.$_GET['ad'].".php")) 
					  {
						include($directorio.$_GET['ad'].".php");
						  }
					  else {
						include($directorio."index.php");
					  }
					} else 
					{
					  include($directorio."index.php");
					}
			}
			else{ echo'No puedes entrar';}
				  
            ?>