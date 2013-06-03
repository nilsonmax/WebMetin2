<?php if(isset($_SESSION['administrador']) && $_SESSION['administrador'] >= 1){ 

echo'
<div id="main-top">
	
	<h2 class="main-title"> Panel Administraci&oacute;n</h2>
	</div>
        <div id="main-cent">
        	<div id="main-wrap">

        	<div id="admini" style="width:590px;height:auto">
	<div style="width:140px;float:left;height:80px;">
    <img src="images/admin/noticia.png" width="48" height="48">
    <a href="index.php?rzm=admin&ad=noticias">Noticias</a>
    </div>

    <div style="width:220px;float:left;height:80px;">
    <img src="images/admin/actu.png" width="48" height="48">
    <a href="index.php?rzm=admin&ad=actualizar">Actualizar</a>
    </div>

    <div style="width:220px;float:left;height:80px;">
    <img src="images/admin/usuarios.png" width="48" height="48">
    <a href="index.php?rzm=admin&ad=banear">Banear y Desbanear</a>
    </div>

    <div style="width:140px;float:left;height:80px;">
    <img src="images/admin/ticket.png" width="48" height="48">
    <a href="index.php?rzm=admin&ad=ticket">Ticket</a>
    </div>


    <div style="width:220px;float:left;height:80px;">
    <img src="images/admin/categorias.png" width="48" height="48">
    <a href="index.php?rzm=admin&ad=cmb_categoria">Crear y Borrar Categorias</a>
    </div>

    <div style="width:220px;float:left;height:80px;">
    <img src="images/admin/item.png" width="48" height="48">
    <a href="index.php?rzm=admin&ad=cmb_items">Crear y Borrar Items</a>
    </div>

    <div style="width:140px;float:left;height:80px;">
    <img src="images/admin/lupa.png" width="48" height="48">
   	<a href="index.php?rzm=admin&ad=bpersonaje">Cuenta/Pj</a>
    </div>

    <div style="width:220px;float:left;height:80px;">
    <img src="images/admin/log.png" width="48" height="48">
   	<a href="index.php?rzm=admin&ad=item">Log Items</a>
    </div>
    <div style="width:220px;float:left;height:80px;">
    <img src="images/admin/ticket.png" width="48" height="48">
    <a href="index.php?rzm=admin&ad=opticket">Opciones Ticket</a>
    </div>

    <div style="width:140px;float:left;height:80px;">
    <img src="images/admin/ticket.png" width="48" height="48">
    <a href="index.php?rzm=admin&ad=chat">Chat</a>
    </div>
</div>



   </div></div>
   <div id="main-end"></div>';
}
else{
	echo' No puedes entrar aqui';

}