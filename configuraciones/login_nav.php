<?php

if(isset($_SESSION['usuario_id'])){
	echo'<div id="side-wrap">
		Bienvenido '.$_SESSION["usuario"].'
		<ul style="margin-left:20px;">
		';
		if($_SESSION['administrador'] > 0){
		echo'<li class="style4"><a href="index.php?rzm=admin">Panel Administracion</a></li>';}
	
		echo'<li class="style4"><a href="index.php?rzm=itemshop">ItemShop</a></li>
		<li class="style4"><a href="index.php?rzm=donaciones">Donaciones</a></li>
		<li class="style4"><a href="index.php?rzm=des">Desbuguear Pj</a></li>

		<li class="style4"><a href="index.php?rzm=ticket">Enviar Ticket</a></li>
		<li class="style4"><a href="index.php?rzm=datos">Cambiar Datos</a></li>
		<li class="style4"><a href="index.php?des=1">Desconectar</a></li>
		</ul>
		</div>';
	
}
else{
	echo'
			<div id="side-wrap">
			<form  action="index.php" method="post" autocomplete="off" >
                	<div id="username">
                        <input class="bar" type="text" id="userid" name="userid" value="User" onfocus="if(this.value==\'User\') this.value=\'\'" onblur="if(this.value==\'\') this.value=\'User\'" >
                        </div>
                        <div id="password">
                            <input class="bar" type="password" id="pasw" name="pasw" value="contra" onfocus="if(this.value==\'contra\') this.value=\'\'" onblur="if(this.value==\'\') this.value=\'contra\'" >
                        </div>
                        <input id="enter" type="submit" name="loguear" class="submit" value="Login">
			</form>
                        <a href="index.php?rzm=registro"><input id="register" type="submit" class="submit" value="Registro"></a>
                  <div id="more-info"><div id="arrow"></div><a href="index.php?rzm=perdida">Perdiste la Pass?</a></div>
                    </div>';
}
?>