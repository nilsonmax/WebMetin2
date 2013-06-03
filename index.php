<? 
if(!file_exists('configuraciones/config.web.php'))
  {
    header('Location: ./instalador/index.php');
  }
session_start();
require("./configuraciones/config.web.php");
require("./configuraciones/header_web.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Metin2 V.2</title>
    <meta name="owner" content="Metin2" />
    <meta name="classification" content="Online Games" />
    <link href="style.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="js/jquery-1.3.1.min.js"></script>
		</script>
		<script type="text/javascript" src="js/jquery.infinite-carousel.js">
		</script>
		<script type="text/javascript">
			jQuery(document).ready(function(){
				jQuery('#slider-stage').carousel('#previous', '#next');
				jQuery('#viewport').carousel('#simplePrevious', '#simpleNext');  
			});
		</script>
    <script>
	$(document).ready(function () {
		$('.lava').css({left:$('span.item:first').position()['left']});
		$('.item').mousedown(function () {
			$('.lava').stop().animate({left:$(this).position()['left']}, {duration:200});
			$('.panel').stop().animate({left:$(this).position()['left'] * (-2)}, {duration:200});
		});
	});
	</script>
	<script type="text/javascript">
$(document).ready(function () {
	$('a.btn-ok, #dialog-overlay, #dialog-box').click(function () {		
		$('#dialog-overlay, #dialog-box').hide();		
		return false;
	});
	$(window).resize(function () {
		if (!$('#dialog-box').is(':hidden')) popup();		
	});	
});
function popup(message) { 
	var maskHeight = $(document).height();  
	var maskWidth = $(window).width();
	var dialogTop =  (maskHeight/3) - ($('#dialog-box').height());  
	var dialogLeft = (maskWidth/2) - ($('#dialog-box').width()/2); 
	$('#dialog-overlay').css({height:maskHeight, width:maskWidth}).show();
	$('#dialog-box').css({top:dialogTop, left:dialogLeft}).show();
	$('#dialog-message').html(message);		
}
</script>
</head>

<body>
<div id="topnav">

	<div id="wrap-nav">
    	<div id="nav-center">
            <div id="navibar">
                <ul>
                    <li class="first"><a href="index.php">Inicio</a></li>
                    <li class="center"><a href="index.php?rzm=registro">Registro</a></li>
                    <li class="last"><a href="index.php?rzm=itemshop">ItemShop</a></li>
                    <li class="center"><a href="#">Foro</a></li>
                    <li class="center"><a href="index.php?rzm=ranking">Ranking</a></li>
                    <li class="center"><a href="index.php?rzm=donaciones">Donaciones</a></li>
                    <li class="center"><a href="index.php?rzm=chat">Chat</a></li>               
                    <li class="center"><a href="index.php?rzm=ticket">Ticket</a></li>
                </ul>
            </div>
        </div>
    </div>

</div>
<div id="logo"></div>
<div id="wrapper">
<div id="status">
	<p class="status">Estado:</p> <p class="result"><font style='color: #0C0'>Online</font> - <?php include("archivos/pjs.php"); ?> Pj</p>
</div>
<div id="topcont"></div>
<div id="con-cent">
	<div id="wrapper-cont">
    
<div id="main-cont">
        <div id="main-top">
        	<a class="main-title">Items Mas Comprados</a>
            <a href="#" class="other-title">Ver Item Shop</a>
        </div>
        <div id="main-cent">
        	<div id="main-wrap">
            <a id="simplePrevious"></a>
        	<div id="viewport">
                <ul>
                 
              <?php  
				mysql_select_db(nombre_db_web);



				$items = "SELECT  DISTINCT value_ob  FROM items ORDER BY comprados DESC LIMIT 14";
        $itemss = mysql_query($items , $sqlweb);
        if(mysql_num_rows($itemss) > 0){
				while($fila = mysql_fetch_array($itemss)){
          $img =  $fila["value_ob"];
					echo '<li><a href="#"><img src="archivos/itemshop/items/'.$img.'.gif" /></a></li>';
					
				}}else{
            echo '<li><a href="#"><img src="archivos/itemshop/items/19.gif" /></a></li>';
        }
				?>
                </ul>
    		</div>
            <a id="simpleNext"></a>
            </div>
        </div>
        <div id="main-end"></div>
       <?php
	  	 if(isset($_GET['rzm']) && !empty($_GET['rzm']))
                      {
                        if(file_exists(realpath('./archivos/')."/".$_GET['rzm'].".php")) 
                        {
                          include(realpath('./archivos/')."/".$_GET['rzm'].".php");
                        }
                        else {
                          include(realpath('./archivos/').'/inicio.php');
                        }
                      } else 
                      {
                        include(realpath('./archivos/').'/inicio.php');
                      }
		 ?>
      
 
        
    </div>
    	<div id="sidebar">
        	<div id="side-top">
            	<div id="download"></div><p class="side-title">Descargar</p>
            </div>
            <div id="side-cent">
            	<div id="side-wrap">
                	<a href="#" class="left"><div id="download-btn">Opcion 1</div></a>
                    <a href="#" class="right"><div id="download-btn">Opcion 2</div></a>
                </div>
            </div>
            <div id="side-end"></div>
        	<div id="side-top">
            	<div id="login"></div>
           	  <p class="side-title">Panel Usuario</p>
            </div>
            <div id="side-cent">
            	<?php
				include("./configuraciones/login_nav.php");
				?>
            </div>
            <div id="side-end"></div>
            <div id="side-top">
            	<div id="ranking"></div><p class="side-title">Ranking</p>
            </div>
            <div id="side-cent">
            	<div id="side-wrap">
					<div id="moving_tab">
                    <div class="content">						
                            <div class="panel">
                            <ul>
                            	<li>

                                	<table width="197" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td class="main-num">#</td>
                                        <td class="main-name">Nombre</td>
                                        <td class="main-lvl">Lvl.</td>
                                      </tr>
                                      <?php

                                      include("archivos/rank-user.php");

                                      ?>
										                          
									                                      </table>
                                </li>
                            </ul>
                            <ul>
                            	<li>
                                	<table width="197" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td class="main-cnum">#</td>
                                        <td class="main-name">Gremio</td>
                                        <td class="main-lvl">Puntos.</td>
                                      </tr>
									                      <?php

                                      include("archivos/rank-gremios.php");

                                      ?>
									  									  
                                    </table>
                                </li>
                            </ul>												
                            </div>
                     </div>
                        	
                        <div class="tabs">
                            <span class="item"><div class="rank-btn">Jugadores</div></span>
                            <span class="item"><div class="rank-btn-right">Gremios</div></span>
                        </div>
                                      
                    </div>
                </div>
                
            </div>
            <div id="side-end"></div>
           <div id="side-top">
            	<div id="fb"></div>
            	<p class="side-title"> Facebook / Publidad</p>
            </div>
            <div id="side-cent">
            	<div id="side-wrap">
               	  <p>&nbsp;</p>
               	  <p>&nbsp;</p>
               	  <p>&nbsp;</p>
               	  <p>&nbsp;</p>
               	  <p>&nbsp;</p>
               	  <p>&nbsp;</p>
               	  <p>&nbsp;</p>
               	  <p>&nbsp;</p>
               	  <p>&nbsp;</p>
               	  <p>&nbsp;</p>
               	  <p>&nbsp;</p>
               	  <p>&nbsp;</p>
               	  <p>&nbsp;</p>
               	  <p>&nbsp;</p>
               	  <p>&nbsp;</p>
            	</div>
            </div>
            <div id="side-end"></div>
           
        </div>
      </div>
</div>
<div id="endcont"></div>
</div>
<div class="clear"></div>


<div id="footer">
	<div id="footer-cent">
    	<div id="foot-wrap">
        	<a href="http://codemoved.com" ><p style="font-size:18px">Desarrollado para CodeMoved (Rimander)</p></a>
        </div>
    </div>
</div>

</body>
</html>
