<?php
session_start();
  include("funciones.php");
?>
<script>
function go_Next(step) {
   window.location = "index.php?next="+step;}
</script>

<?php
if(!isset($_GET['next'])){
echo'
 <title>Instalador Web 2.0</title>
  <link rel="stylesheet" href="../media/system/css/system.css" type="text/css" />
  <link rel="stylesheet" href="template/css/template.css" type="text/css" />
	</head>
	<body>
		<div id="header">
		 <h1 style="margin-left:150px;">Web V 2.0 Metin2 By ZonaMaster</h1>
		</div>
		
<div id="system-message-container">
</div>
		<div id="content-box">
			<div id="content-pad">
				<div id="stepbar">
					<h2>Instalaci&oacute;n</h2>
				  <div class="step active" id="language">1 : Inicio</div>
				  <div class="step" id="preinstall">2 : Conf Base de Datos</div>
				  <div class="step" id="license">3 : Instalacion DB</div>
				  <div class="step" id="database">4 : Configurar Donaciones</div>
				  <div class="step" id="filesystem">5 : Paypal</div>
                  <div class="step" id="filesystem">6 : SMS</div>
				  <div class="step" id="filesystem">7 : Guardando Archivos</div>
				  <div class="step" id="site">8 : Finalizar</div><div class="box"></div>
				</div>
				<div id="right">
					<div id="rightpad">
						<div id="step">
	<div class="far-right">
			
			<div class="button1-left"><div class="next"><a OnClick="go_Next(\'1\')" rel="next" title="Siguiente">Siguiente</a></div></div>
		</div>
	<h2>Inicio</h2>
</div>

	<div id="installer">
		<div class="m">
			<h3>Bienvenido a la instalacion de la Web 2.0</h3>
			<div class="install-text" style="width:600px;">
			  <p>La web 2.0 ha sido desarrollada gracias a varias personas que trabajan en equipo, dentro del team de CodeMoved.</p>
			  <ul>
			    <li>Rimander</li>
			    <li>Xpress</li>
			    </ul>
			  <p>Colaboradores:</p>
			  <ul>
			    <li>Jumarras</li>
				 <p>Gracias a el la web tiene mayor rapidez y algunos scripts nuevos.</p>
				<li>Recursos Moviles</li>
				 <p>Gracias a ellos por ayudarme con la instalacion para los sms.</p>
			    </ul>
			 
			  <p>&nbsp;</p>
            </div>
			<div class="clr"></div>
		</div>
	</div>
					</div>
				</div>
				<div class="clr"></div>
			</div>
		</div>
		<div id="copyright"><a href="http://codemoved.com" target="_blank">CodeMoved</a></div>

';
}else{
$etapa = validar($_GET['next']);
switch ($etapa){
 
case 1:
if(empty($_SESSION['nombre_db_web']) and empty($_SESSION['usuario_db_server'])){
	$_SESSION['nombre_db_web'] = "";
	$_SESSION['usuario_db_web'] = "";
	$_SESSION['pass_db_web'] = "";
	$_SESSION['ip_db_web'] = "";
	$_SESSION['usuario_db_server'] = "";
	$_SESSION['pass_db_server'] = "";
	$_SESSION['ip_db_server'] = "";
	$_SESSION['url'] = "";
}
	if(isset($_POST['guardar'])){
		$_SESSION['nombre_db_web'] = $_POST['nombre_db_web'];
		$_SESSION['usuario_db_web'] = $_POST['usuario_db_web'];
		$_SESSION['pass_db_web'] = $_POST['pass_db_web'];
		$_SESSION['ip_db_web'] = $_POST['ip_db_web'];
		$_SESSION['usuario_db_server'] = $_POST['usuario_db_server'];
		$_SESSION['pass_db_server'] = $_POST['pass_db_server'];
		$_SESSION['ip_db_server'] = $_POST['ip_db_server'];	
		$_SESSION['url'] = $_POST['url'];	
	}
   echo ' <title>Instalador Web 2.0</title>
  <link rel="stylesheet" href="../media/system/css/system.css" type="text/css" />
  <link rel="stylesheet" href="template/css/template.css" type="text/css" />
	</head>
	<body>
		<div id="header">
		 <h1 style="margin-left:150px;">Web V 2.0 Metin2 By ZonaMaster</h1>
		</div>
		
<div id="system-message-container">
</div>
		<div id="content-box">
			<div id="content-pad">
				<div id="stepbar">
					<h2>Instalaci&oacute;n</h2>
				  <div class="step" id="language">1 : Inicio</div>
				  <div class="step active" id="preinstall">2 : Conf Base de Datos</div>
				  <div class="step" id="license">3 : Instalacion DB</div>
				  <div class="step" id="database">4 : Configurar Donaciones</div>
				  <div class="step" id="filesystem">5 : Paypal</div>
                  <div class="step" id="filesystem">6 : SMS</div>
				  <div class="step" id="filesystem">7 : Guardando Archivos</div>
				  <div class="step" id="site">8 : Finalizar</div><div class="box"></div>
				</div>
				<div id="right">
					<div id="rightpad">
						<div id="step">
	<div class="far-right">
			<div class="button1-left"><div class="next2"><a href="javascript:history.back(1)"> Atras&nbsp;&nbsp; </a></div></div>
			<div class="button1-left"><div class="next"><a  OnClick="go_Next(\'2\')" rel="next" title="Siguiente">Siguiente</a></div></div>
		</div>
	<h2>Configuracion de la Base de Datos</h2>
</div>
	<div id="installer">
		<div class="m">
			<h3>Configura el acceso a la base de datos</h3>
			<div class="install-text">
			  <p>La configuracion de la web tiene que estar configurada con los datos de acceso al servidor mysql de metin2.</p>
			  <p>Ya que las tablas se crearan ai, y necesita la web de las tablas de metin2.</p>
			  <p><strong>Si quieres instalar la web en la base de datos del servidor pon en los datos de la web, tambien los del servidor.</strong></p>
<p>Si tiene alguna duda, notifiquelo en ZonaMaster.es</p>
			  <p>&nbsp;</p>
			  <p>&nbsp;</p>
			  <p>&nbsp;</p>
			  <p>&nbsp;</p>
			  <p>&nbsp;</p>
			  <p>&nbsp;</p>
			  <p>&nbsp;</p>
			  <p>&nbsp;</p>
            </div>
			<div class="install-body">
			  <div class="m">
			    <form method="post" action="">
				  <p>&nbsp;</p>';
				  if(isset($_POST['guardar'])){
		echo'<p style="color:#0C0"><strong>Datos Guardados</strong></p>';
	}
                  echo'<table width="344">
                    <tr>
                      <td width="146">Nombre de la DB para la web</td>
                      <td width="182"><input type="text" name="nombre_db_web" value="'.$_SESSION['nombre_db_web'].'"></td>
                    </tr>
                    <tr>
                      <td><p>Usuario DB Web</p></td>
                      <td><input type="text" name="usuario_db_web" value="'.$_SESSION['usuario_db_web'].'"></td>
                    </tr>
                    <tr>
                      <td>Contrase&ntilde;a DB Web</td>
                      <td><input type="password" name="pass_db_web" value="'.$_SESSION['pass_db_web'].'"></td>
                    </tr>
                    <tr>
                      <td>IP Web</td>
                      <td><input type="text" name="ip_db_web" value="'.$_SESSION['ip_db_web'].'"></td>
                    </tr>
					<tr>
                      <td>Url de la web (http://tuweb.com)</td>
                      <td><input type="text" name="url" value="'.$_SESSION['url'].'"></td>
                    </tr>
                     <tr>
                      <td height="30">&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                     <tr>
                      <td>Usuario DB Server</td>
                      <td><input type="text" name="usuario_db_server" value="'.$_SESSION['usuario_db_server'].'"></td>
                    </tr>
                     <tr>
                      <td>Contrase&ntilde;a DB Server</td>
                      <td><input type="password" name="pass_db_server" value="'.$_SESSION["pass_db_server"].'"/></td>
                    </tr>
                     <tr>
                      <td>IP Server</td>
                      <td><input type="text" name="ip_db_server" value="'.$_SESSION["ip_db_server"].'"></td>
                    </tr>
					<td>
                    </td>
                      <td><input type="submit" name="guardar" id="button" value="Guardar Configuracion"></td>
                    </tr>
                  </table>
                  <p>&nbsp;</p>
				</form>
			  </div>
				<div class="clr"></div>
			</div>
			<div class="clr"></div>
		</div>
	</div>

					</div>
				</div>
				<div class="clr"></div>
			</div>
		</div>
		<div id="copyright"><a href="http://codemoved.com" target="_blank">CodeMoved</a></div>
	</body>';
  
   break;
case 2:
	echo' <title>Instalador Web 2.0</title>
  <link rel="stylesheet" href="../media/system/css/system.css" type="text/css" />
  <link rel="stylesheet" href="template/css/template.css" type="text/css" />
	</head>
	<body>
		<div id="header">
		 <h1 style="margin-left:150px;">Web V 2.0 Metin2 By ZonaMaster</h1>
		</div>
		
<div id="system-message-container">
</div>
		<div id="content-box">
			<div id="content-pad">
				<div id="stepbar">
					<h2>Instalaci&oacute;n</h2>
				  <div class="step" id="language">1 : Inicio</div>
				  <div class="step" id="preinstall">2 : Conf Base de Datos</div>
				  <div  class="step active" id="license">3 : Instalaci&oacute;n DB</div>
				  <div class="step" id="database">4 : Configurar Donaciones</div>
				  <div class="step" id="filesystem">5 : Paypal</div>
                  <div class="step" id="filesystem">6 : SMS</div>
				  <div class="step" id="filesystem">7 : Guardando Archivos</div>
				  <div class="step" id="site">8 : Finalizar</div><div class="box"></div>
				</div>
				<div id="right">
					<div id="rightpad">
						<div id="step">
	<div class="far-right">
			  <div class="button1-left"><div class="next2"><a href="javascript:history.back(1)" > Atras&nbsp;&nbsp; </a></div></div>
			<div class="button1-left"><div class="next"><a  OnClick="go_Next(\'3\')" rel="next" title="Siguiente">Siguiente</a></div></div>
		</div>
	<h2>Instalaci&oacute;n DB</h2>
</div>
	<div id="installer">
		<div class="m">
			<h3>Instalaci&oacute;n de la Base de Datos</h3>
			<div class="install-text">
			  <p>&nbsp;</p>
			  <p>Tenga en cuenta que no tiene por que salir todo en Verde.</p>
			  <p>La columna de coins puede salir en rojo y la columna de administrador</p>
<p>&nbsp;</p>
			  <p>&nbsp;</p>
			  <p>&nbsp;</p>
<p>&nbsp;</p>
			  <p>&nbsp;</p>
			  <p>&nbsp;</p>
			  <p>&nbsp;</p>
            </div>
			<div class="install-body">
			  <div class="m">
			    <p>&nbsp;</p>
			    <p style="color:#0F0"><b>Columna Coins</b></p>
			      <p style="color:#0F0"><b>Columna Admin</b></p>
			      <p style="color:#0F0"><b>Base datos de la web</b></p>
		        <p style="color:#0F0"><b>Base de datos de los ticket</b></p>
			    <p>&nbsp;</p>
			    <p>&nbsp;</p>
			    <p>&nbsp;</p>
			    <p>&nbsp;</p>
			  </div>
				<div class="clr"></div>
			</div>
			<div class="clr"></div>
		</div>
	</div>

					</div>
				</div>
				<div class="clr"></div>
			</div>
		</div>
		<div id="copyright"><a href="http://codemoved.com" target="_blank">CodeMoved</a></div>
	</body>';
   
break;
case 3:
if(empty($_SESSION['paypal']) and empty($_SESSION['sms'])){
		$_SESSION['paypal'] = "";
		$_SESSION['sms'] = "";
}
if(isset($_POST["guardar2"])){
			if(isset($_POST['paypal'])){
			$_SESSION["paypal"] = "checked";
			}
			if(isset($_POST['sms'])){
			$_SESSION["sms"] = "checked";
			}
			
		}	
  echo'  <title>Instalador Web 2.0</title>
  <link rel="stylesheet" href="../media/system/css/system.css" type="text/css" />
  <link rel="stylesheet" href="template/css/template.css" type="text/css" />
	</head>
	<body>
		<div id="header">
		  <h1 style="margin-left:150px;">Web V 2.0 Metin2 By ZonaMaster</h1>
		</div>	
<div id="system-message-container">
</div>
		<div id="content-box">
			<div id="content-pad">
				<div id="stepbar">
					<h2>Instalaci&oacute;n</h2>
				  <div class="step" id="language">1 : Inicio</div>
				  <div class="step" id="preinstall">2 : Conf Base de Datos</div>
				  <div class="step"  id="license">3 : Instalaci&oacute;n DB</div>
				  <div class="step active" id="database">4 : Configurar Donaciones</div>
                  <div class="step" id="filesystem">5 : Paypal</div>
                  <div class="step" id="filesystem">6 : Sms</div>
				  <div class="step" id="filesystem">7 : Guardando Archivos</div>
				  <div class="step" id="site">8 : Finalizar</div><div class="box"></div>
				</div>
				<div id="right">
					<div id="rightpad">
						<div id="step">
			<div class="far-right">
		   <div class="button1-left"><div class="next2"><a href="javascript:history.back(1)"> Atras&nbsp;&nbsp; </a></div></div>';
		   if(!empty($_POST['paypal']) && !empty($_POST['sms'])){
		   	$_SESSION["paypal"] = "checked";
		   	$_SESSION["sms"] = "checked";
			 
			   		   echo'<div class="button1-left"><div class="next"><a href="#" OnClick="go_Next(\'4\')" rel="next" title="Siguiente">Siguiente					        </a></div></div>';
		   }
		   elseif(!empty($_POST['paypal'] )){
		   		$_SESSION["paypal"] = "checked";
		   echo'<div class="button1-left"><div class="next"><a href="#" OnClick="go_Next(\'4\')" rel="next" title="Siguiente">Siguiente             </a></div></div>';
		   }
		   elseif(!empty($_POST['sms'])){
		   		$_SESSION["sms"] = "checked";
		   echo'<div class="button1-left"><div class="next"><a href="#" OnClick="go_Next(\'5\')" rel="next" title="Siguiente">Siguiente           </a></div></div>';
		   }
		   else{
			 echo'<div class="button1-left"><div class="next"><a href="#" OnClick="go_Next(\'6\')" rel="next" title="Siguiente">Siguiente</a></div></div>';  
			   
		   }


	echo'</div>
	<h2>Configurar Donaciones</h2>
		</div>
			<div id="installer">
				<div class="m">
					<h3>Instalaci&oacute;n de las Donaciones</h3>
					<div class="install-text">
					  <p>&nbsp;</p>
					  <p>Elige las donaciones que quieres instalar en tu servidor y pagina web.</p>
					  <p>&nbsp;</p>
		<p>&nbsp;</p>
					  <p>&nbsp;</p>
					  <p>&nbsp;</p>
					  <p>&nbsp;</p>
					  <p>&nbsp;</p>
		</div>
					<div class="install-body">
					  <div class="m">
						<p>&nbsp;</p>
						<p style="color:#0F0">
						
						<div id="contenidos" >';
						 if(isset($_POST['guardar2'])){
		echo'<p style="color:#0C0"><strong>Datos Guardados</strong></p>';
	}
					  echo' <form name="form" method="post" action="">
							<p>
							
							  <input type="checkbox" name="paypal" '.$_SESSION["paypal"].'>
							Paypal</p>
							<p>
							  <input type="checkbox" name="sms" '.$_SESSION["sms"].' id ="a">
							Sms</p>
							<p>
							  <input type="submit" name="guardar2" id="button" value="Guardar Configuracion">
							</p>
						  </form>
						  <p>&nbsp;</p>
						  <p>&nbsp;</p>
						</div>
						<p>&nbsp;</p>
						</p>
		</div>
						<div class="clr"></div>
					</div>
					<div class="clr"></div>
				</div>
			</div>
		
							</div>
						</div>
						<div class="clr"></div>
					</div>
				</div>
				<div id="copyright"><a href="http://codemoved.com" target="_blank">CodeMoved</a></div>
			</body>';  
  break;
  
case 4:
$_SESSION['donacion1']= "";
$_SESSION['donacion2']= "";
$_SESSION['donacion3']= "";
if(empty($_SESSION['p_donacion']) and empty($_SESSION['p_donacion'])){
	$_SESSION["email_paypal"] = NULL;
	$_SESSION["p_donacion"] = NULL;
	$_SESSION["eu_p_donacion"] = NULL;
	$_SESSION["mds_p_donacion"] = NULL;
	$_SESSION["s_donacion"] = NULL;
	$_SESSION["eu_s_donacion"] = NULL;
	$_SESSION["mds_s_donacion"] = NULL;
	$_SESSION["t_donacion"] = NULL;
	$_SESSION["eu_t_donacion"] = NULL;
	$_SESSION["mds_t_donacion"] = NULL;
}
if(isset($_POST["guardar3"])){
	$_SESSION["email_paypal"] = $_POST['email_paypal'];
	
			if(isset($_POST['p_donacion']) and $_POST['eu_p_donacion'] != ""){
				$_SESSION['donacion1']= "OK";
			$_SESSION["p_donacion"] = "checked";
			$_SESSION["eu_p_donacion"] = $_POST['eu_p_donacion'];
			$_SESSION["mds_p_donacion"] = $_POST['mds_p_donacion'];
			}else{
				$_SESSION['donacion1']= "";
			}
			if(isset($_POST['s_donacion']) and $_POST['eu_s_donacion'] != ""){
				$_SESSION['donacion2']= "OK";
			$_SESSION["s_donacion"] = "checked";	
			$_SESSION["eu_s_donacion"] = $_POST['eu_s_donacion'];
			$_SESSION["mds_s_donacion"] = $_POST['mds_s_donacion'];
			}else{
				$_SESSION['donacion2']= "";
			}
			if(isset($_POST['t_donacion']) and $_POST['eu_t_donacion'] != ""){
				$_SESSION['donacion3']= "OK";
			$_SESSION["t_donacion"] = "checked";
			$_SESSION["eu_t_donacion"] = $_POST['eu_t_donacion'];
			$_SESSION["mds_t_donacion"] = $_POST['mds_t_donacion'];
			}	else{
				$_SESSION['donacion3']= "";
			}	
		}
echo' <title>Instalador Web 2.0</title>
  <link rel="stylesheet" href="../media/system/css/system.css" type="text/css" />
  <link rel="stylesheet" href="template/css/template.css" type="text/css" />
	</head>
	<body>
		<div id="header">
		  <h1 style="margin-left:150px;">Web V 2.0 Metin2 By ZonaMaster</h1>
		</div>
		<div id="system-message-container">
       </div>
		<div id="content-box">
			<div id="content-pad">
				<div id="stepbar">
					<h2>Instalaci&oacute;n</h2>
				  <div class="step" id="language">1 : Inicio</div>
				  <div class="step" id="preinstall">2 : Conf Base de Datos</div>
				  <div class="step"  id="license">3 : Instalaci&oacute;n DB</div>
				  <div class="step" id="database">4 : Configurar Donaciones</div>
                  <div class="step active" id="filesystem">5 : Paypal</div>
                  <div class="step" id="filesystem">6 : Sms</div>
				  <div class="step" id="filesystem">7 : Guardando Archivos</div>
				  <div class="step" id="site">8 : Finalizar</div><div class="box"></div>
				</div>
				<div id="right">
					<div id="rightpad">
						<div id="step">
	<div class="far-right">
   <div class="button1-left"><div class="next2"><a href="javascript:history.back(1)"> Atras&nbsp;&nbsp; </a></div></div>
  ';
  
   if(!empty($_SESSION['sms']) and $_SESSION['sms'] == "checked"){
   echo'<div class="button1-left"><div class="next"><a href="#" OnClick="go_Next(\'5\')" rel="next" title="Siguiente">Siguiente</a></div></div>';
   }
   else{
	 echo'<div class="button1-left"><div class="next"><a href="#" OnClick="go_Next(\'6\')" rel="next" title="Siguiente">Siguiente</a></div></div>';  
	   
   }
echo'

		</div>
	<h2>Paypal</h2>
</div>
	<div id="installer">
		<div class="m">
			<h3>Instalaci&oacute;n de paypal</h3>
			<div class="install-text">
			  <p>&nbsp;</p>
			  <p>Rellena bien los datos.</p>
			  <p>&nbsp;</p>
			  <p>&nbsp;</p>
<p>&nbsp;</p>
			  <p>&nbsp;</p>
			  <p>&nbsp;</p>
			  <p>&nbsp;</p>
			  <p>&nbsp;</p>
</div>
			<div class="install-body">
			  <div class="m">
			    <p>&nbsp;</p>
			    <p style="color:#0F0">
                
                <div id="contenidos" >';
						 if(isset($_POST['guardar3'])){
		echo'<p style="color:#0C0"><strong>Datos Guardados</strong></p>';
	}
					  echo'
               <form name="form" method="post" action="">
			        <p>Email de paypal:
			          <input type="text" name="email_paypal" value="'.$_SESSION["email_paypal"].'">
			        </p>
			        <p>Donaciones:</p>
			        <p>1&deg 
			          <input type="checkbox" name="p_donacion" '.$_SESSION["p_donacion"].'>
			          -- 
			          &euro; :
                      <input name="eu_p_donacion" type="text" value="'.$_SESSION["eu_p_donacion"].'" size="10"> 
			          -- Mds: 
			          <input name="mds_p_donacion" type="text" value="'.$_SESSION["mds_p_donacion"].'" size="10">
			        </p>
                     <p>2&deg 
			           <input type="checkbox" name="s_donacion" '.$_SESSION["s_donacion"].'>
			          -- 
			          &euro; :
                      <input name="eu_s_donacion" type="text" value="'.$_SESSION["eu_s_donacion"].'" size="10"> 
			          -- Mds: 
			          <input name="mds_s_donacion" type="text" value="'.$_SESSION["mds_s_donacion"].'" size="10">
			        </p>
                     <p>3&deg; 
			           <input type="checkbox" name="t_donacion" '.$_SESSION["t_donacion"].'>
			          -- 
			          &euro; :
                      <input name="eu_t_donacion" type="text" value="'.$_SESSION["eu_t_donacion"].'" size="10"> 
			          -- Mds: 
			          <input name="mds_t_donacion" type="text" value="'.$_SESSION["mds_t_donacion"].'" size="10">
			        </p>
			        <p>
			          <input type="submit" name="guardar3" id="button" value="Guardar Configuracion">
		            </p>
                  </form>
			      <p>&nbsp;</p>
			      <p>&nbsp;</p>
                </div>
 				<p>&nbsp;</p>
 				</p>
</div>
				<div class="clr"></div>
			</div>
			<div class="clr"></div>
		</div>
	</div>

					</div>
				</div>
				<div class="clr"></div>
			</div>
		</div>
		<div id="copyright"><a href="http://codemoved.com" target="_blank">CodeMoved</a></div>
	</body>';
		


  break;
case 5:
if(empty($_SESSION['iframe_sms']) and empty($_SESSION['mds_sms'])){
	$_SESSION["iframe_sms"] = NULL;
	$_SESSION["mds_sms"] = NULL;
		
}
if(isset($_POST["guardar4"])){
			
			$_SESSION["iframe_sms"] = $_POST["iframe_sms"];
			
			$_SESSION["mds_sms"] = $_POST["mds_sms"];
			
			
		}	
		echo'<title>Instalador Web 2.0</title>
  <link rel="stylesheet" href="../media/system/css/system.css" type="text/css" />
  <link rel="stylesheet" href="template/css/template.css" type="text/css" />
	</head>
	<body>
		<div id="header">
		  <h1 style="margin-left:150px;">Web V 2.0 Metin2 By ZonaMaster</h1>
		</div>
		<div id="system-message-container">
       </div>
		<div id="content-box">
			<div id="content-pad">
				<div id="stepbar">
					<h2>Instalaci&oacute;n</h2>
				  <div class="step" id="language">1 : Inicio</div>
				  <div class="step" id="preinstall">2 : Conf Base de Datos</div>
				  <div class="step"  id="license">3 : Instalaci&oacute;n DB</div>
				  <div class="step" id="database">4 : Configurar Donaciones</div>
                  <div class="step" id="filesystem">5 : Paypal</div>
                  <div class="step active" id="filesystem">6 : Sms</div>
				  <div class="step" id="filesystem">7 : Guardando Archivos</div>
				  <div class="step" id="site">8 : Finalizar</div><div class="box"></div>
				</div>
				<div id="right">
					<div id="rightpad">
						<div id="step">
	<div class="far-right">
  <div class="button1-left"><div class="next2"><a href="javascript:history.back(1)"> Atras&nbsp;&nbsp; </a></div></div>
 <div class="button1-left"><div class="next"><a href="#" OnClick="go_Next(\'6\')" rel="next" title="Siguiente">Siguiente</a></div></div


		></div>
	<h2>SMS</h2>
</div>
	<div id="installer">
		<div class="m">
			<h3>Instalaci&oacute;n de SMS</h3>
			<div class="install-text">
			  <p>&nbsp;</p>
			  <p>Rellena bien los datos.</p>
			  <p>&nbsp;</p>
			  <p>Necesita registrarse y crear un apartado para donaciones en la siguiente web</p>
			  <p><a href="http://www.recursosmoviles.com/?id=3709" target="_blank">Recusos Moviles</a></p>
<p><iframe width="325" height="315" src="http://www.youtube.com/embed/3Fgy1fWDOes" frameborder="0" allowfullscreen></iframe></p>
			  <p>&nbsp;</p>
			  <p>&nbsp;</p>
			  <p>&nbsp;</p>
			  <p>&nbsp;</p>
</div>
			<div class="install-body">
			  <div class="m">
			    <p>&nbsp;</p>
			    <p style="color:#0F0">
                
                <div id="contenidos" >';
						 if(isset($_POST['guardar4'])){
		echo'<p style="color:#0C0"><strong>Datos Guardados</strong></p>';
	}
					  echo' <form name="form" method="post" action="">
			        <p>El Frame de los SMS:
                      <textarea name="iframe_sms" cols="30" rows="4" type="text" value="3">'.$_SESSION["iframe_sms"].'</textarea>
			        </p>
			        <p>Mds por sms:
                      <input name="mds_sms" type="text" id="textfield3" size="10" value="'.$_SESSION["mds_sms"].'">
			        </p>
			        <p>
			          <input type="submit" name="guardar4" id="button" value="Guardar Configuracion">
		            </p>
                  </form>
			      <p>&nbsp;</p>
			      <p>&nbsp;</p>
                </div>
 				<p>&nbsp;</p>
 				</p>
</div>
				<div class="clr"></div>
			</div>
			<div class="clr"></div>
		</div>
	</div>

					</div>
				</div>
				<div class="clr"></div>
			</div>
		</div>
		<div id="copyright"><a href="http://codemoved.com" target="_blank">CodeMoved</a></div>
	</body>
';



  break;
  
  case 6:

  echo'<script language="javascript">
function archivo()
{
document.getElementById("archivo").innerHTML="<p>&nbsp;</p><p> <span style=\'color:#00CC00\'><strong>Creado Archivo Configuracion</span></strong></p>";
}
function paypal()
{
document.getElementById("paypal").innerHTML="<p>&nbsp;</p><p> <span style=\'color:#00CC00\'><strong>Creado Archivo Donacion Paypal</span></strong></p>";
}
function sms()
{
document.getElementById("sms").innerHTML="<p>&nbsp;</p><p> <span style=\'color:#00CC00\'><strong>Creado Archivo Donacion Sms</strong></span></p><p>&nbsp;</p>";
}
</script>

 <title>Instalador Web 2.0</title>
  <link rel="stylesheet" href="../media/system/css/system.css" type="text/css" />
  <link rel="stylesheet" href="template/css/template.css" type="text/css" />
	</head>
	<body>
		<div id="header">
		  <h1 style="margin-left:150px;">Web V 2.0 Metin2 By ZonaMaster</h1>
		</div>
		<div id="system-message-container">
       </div>
		<div id="content-box">
			<div id="content-pad">
				<div id="stepbar">
					<h2>Instalaci&oacute;n</h2>
				  <div class="step" id="language">1 : Inicio</div>
				  <div class="step" id="preinstall">2 : Conf Base de Datos</div>
				  <div class="step"  id="license">3 : Instalaci&oacute;n DB</div>
				  <div class="step" id="database">4 : Configurar Donaciones</div>
                  <div class="step" id="filesystem">5 : Paypal</div>
                  <div class="step" id="filesystem">6 : Sms</div>
				  <div class="step active" id="filesystem">7 : Guardando Archivos</div>
				  <div class="step" id="site">8 : Finalizar</div><div class="box"></div>
				</div>
				<div id="right">
					<div id="rightpad">
						<div id="step">
	<div class="far-right">
  <div class="button1-left"><div class="next2"><a href="javascript:history.back(1)"> Atras&nbsp;&nbsp; </a></div></div>
 <div class="button1-left"><div class="next"><a href="#" OnClick="go_Next(\'7\')" rel="next" title="Siguiente">Siguiente</a></div></div


		></div>
	<h2>Guardando Archivos</h2>
</div>
	<div id="installer">
		<div class="m">
			<h3>Guardando Archivos</h3>
			<div class="install-text">
			  <p>&nbsp;</p>
			  <p>Esta accion puede llevar algun tiempo.</a></p>
<p>Esta guardando todos los archivos de configuracion</p>
			  <p>&nbsp;</p>
			  <p>&nbsp;</p>
			  <p>&nbsp;</p>
			  <p>&nbsp;</p>
</div>';
	mysqls($_SESSION['nombre_db_web'],$_SESSION['usuario_db_web'],$_SESSION['pass_db_web'],$_SESSION['ip_db_web'],
	$_SESSION['usuario_db_server'], $_SESSION['pass_db_server'], $_SESSION['ip_db_server']);


	archivo_conf($_SESSION['nombre_db_web'],$_SESSION['usuario_db_web'],$_SESSION['pass_db_web'],$_SESSION['ip_db_web'],
	$_SESSION['usuario_db_server'], $_SESSION['pass_db_server'], $_SESSION['ip_db_server'], $_SESSION['paypal'],$_SESSION['sms']);
	if($_SESSION["paypal"] == "checked"){
	if(!empty($_SESSION['p_donacion']) and $_SESSION['donacion1'] == "OK" ){
	paypal($_SESSION["email_paypal"],$_SESSION["p_donacion"],$_SESSION["eu_p_donacion"],$_SESSION["mds_p_donacion"],"paypal1",	    $_SESSION['usuario_db_server'], $_SESSION['pass_db_server'], $_SESSION['ip_db_server'] ,$_SESSION['url']);
	}
	if(!empty($_SESSION['s_donacion']) and $_SESSION['donacion2'] == "OK"){
	paypal($_SESSION["email_paypal"],$_SESSION["s_donacion"],$_SESSION["eu_s_donacion"],$_SESSION["mds_s_donacion"],"paypal2",    $_SESSION['usuario_db_server'], $_SESSION['pass_db_server'], $_SESSION['ip_db_server'],$_SESSION['url'] );
	}
	if(!empty($_SESSION['t_donacion']) and $_SESSION['donacion3']== "OK"){
	paypal($_SESSION["email_paypal"],$_SESSION["t_donacion"],$_SESSION["eu_t_donacion"],$_SESSION["mds_t_donacion"],"paypal3",		    $_SESSION['usuario_db_server'], $_SESSION['pass_db_server'], $_SESSION['ip_db_server'], $_SESSION['url'] );
	}
}	
if($_SESSION["sms"] == "checked"){
	sms($_SESSION["iframe_sms"], $_SESSION["mds_sms"],$_SESSION['usuario_db_server'], $_SESSION['pass_db_server'],
	 $_SESSION['ip_db_server'] );
}


			echo'<div class="install-body">
			  <div class="m">
			    <p>&nbsp;</p>
			    <p style="color:#0F0">
                
                <div id="archivo" >
                  <p>&nbsp;</p>
			      <p>&nbsp;</p>
                </div>
				<script language="javascript">
                setInterval("archivo()",2000);
                </script>
                 <div id="paypal" >
                  <p>&nbsp;</p>
			      <p>&nbsp;</p>
                </div>
				<script language="javascript">
                setInterval("paypal()",3000);
                </script>
                 <div id="sms" >
                  <p>&nbsp;</p>
			      <p>&nbsp;</p>
                </div>

				<script language="javascript">
                setInterval("sms()",4000);
                </script>
 				<p>&nbsp;</p>
 				</p>
</div>
				<div class="clr"></div>
			</div>
			<div class="clr"></div>
		</div>
	</div>

					</div>
				</div>
				<div class="clr"></div>
			</div>
		</div>
		<div id="copyright"><a href="http://codemoved.com" target="_blank">CodeMoved</a></div>
	</body>
';
  
  
  break;
  
  case 7:
  	echo' <title>Instalador Web 2.0</title>
  <link rel="stylesheet" href="../media/system/css/system.css" type="text/css" />
  <link rel="stylesheet" href="template/css/template.css" type="text/css" />
	</head>
	<body>
		<div id="header">
		  <h1 style="margin-left:150px;">Web V 2.0 Metin2 By ZonaMaster</h1>
		</div>
		<div id="system-message-container">
       </div>
		<div id="content-box">
			<div id="content-pad">
				<div id="stepbar">
					<h2>Instalaci&oacute;n</h2>
				  <div class="step" id="language">1 : Inicio</div>
				  <div class="step" id="preinstall">2 : Conf Base de Datos</div>
				  <div class="step"  id="license">3 : Instalaci&oacute;n DB</div>
				  <div class="step" id="database">4 : Configurar Donaciones</div>
                  <div class="step" id="filesystem">5 : Paypal</div>
                  <div class="step" id="filesystem">6 : Sms</div>
				  <div class="step" id="filesystem">7 : Guardando Archivos</div>
				  <div class="step active" id="site">8 : Finalizar</div><div class="box"></div>
				</div>
				<div id="right">
					<div id="rightpad">
						<div id="step">
	<div class="far-right">
  
 <div class="button1-left"><div class="next"><a href="#" OnClick="go_Next(\'8\')" rel="next" title="Siguiente">Siguiente</a></div></div


		></div>
	<h2>Finalizar</h2>
</div>
	<div id="installer">
		<div class="m">
			<h3>Finalizar</h3>
			<div class="install-text">
			  <p><img src="template/images/fin.jpg" width="162" height="230"></p>
</div>
			<div class="install-body">
			  <div class="m">
			 
			  ';
			    if(isset($_POST['bot'])) {
			    	mysql_connect($_SESSION['ip_db_server'],$_SESSION['usuario_db_server'], $_SESSION['pass_db_server']);
			    	mysql_query("UPDATE FROM account.account SET administrador = 10 WHERE login = '".$_POST['admin']."'");
			    	echo'<p>Ya tiene administrador la web </p>';
			    	  session_destroy();

			    }else{
			    echo' <p>Introduzca el nombre de la cuenta de administrador</p><p><form action="" method="post">
			  		<input type="text" name="admin"/></p>
			  		<p><input type="submit" name="bot" value="Enviar"/></form></p>';

			  	}
			    echo '<p>Borre la carpeta de instalador por seguridad.</p>
			    <p>Gracias por instalar Web 2.0 de ZonaMaster</p>
			    
			    <p>ATT: Rimander</p>
 				</p>
</div>
				<div class="clr"></div>
			</div>
			<div class="clr"></div>
		</div>
	</div>

					</div>
				</div>
				<div class="clr"></div>
			</div>
		</div>
		<div id="copyright"><a href="http://codemoved.com" target="_blank">CodeMoved</a></div>
	</body>
	
';

  
  break;
  

}
}
?>