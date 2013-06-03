  <?PHP
            if(isset($_SESSION['usuario'])){
            
                   $directorio = "./archivos/itemshop/";
   
						if(isset($_GET['is']) && !empty($_GET['is']))
					{
					  if(file_exists($directorio.$_GET['is'].".php")) 
					  {
						include($directorio.$_GET['is'].".php");
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