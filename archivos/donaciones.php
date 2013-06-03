<div id="main-top">
	
	<h2 class="main-title">Donaciones</h2>
	</div>
        <div id="main-cent">
        	<div id="main-wrap">
        		

        		<?php
        		if($activar_sms != "NO"){
echo '<p>&nbsp;</p><h2>SMS</h2>';
        			include ('archivos/iframesms.php');
        		}
        		if($paypal1 != "NO"){
			echo '<p>&nbsp;</p><p>&nbsp;</p><h2>&nbsp;&nbsp;&nbsp;Paypal</h2>';
        		include ('archivos/paypal1.php');
        			
        		}

        		if($paypal2 != "NO"){

        			include ('archivos/paypal2.php');
        		}
        		if($paypal3 != "NO"){

        			include ('archivos/paypal3.php');
        		}

        		?>
        	

        </div></div>
   <div id="main-end"></div>
