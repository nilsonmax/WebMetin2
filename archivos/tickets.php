	   <div id="main-top">
    
    <h2 class="main-title">Sistema de Tickets</h2>
    </div>
        <div id="main-cent">
            <div id="main-wrap">
<?php
if(isset($_POST['ticket'])){
  $fecha = date("sdmsis");   
    $random = rand(100000, 999999);
    $acortar = substr ($random, 0, 6); 
    $pedido = $fecha.$acortar;
	
	$claves=array("A","B","C","D","E","F","G","H","I", "J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z");
$msje1 = $claves[rand(0,25)];
$msje2 = $claves[rand(0,25)];
$msje3 = $claves[rand(0,25)];
$msje4 = $claves[rand(0,25)];
 $pedido = $msje4.$fecha.$msje3.$msje1.$acortar.$msje2;

$cuenta = mysql_real_escape_string($_POST['name']);
$email = mysql_real_escape_string($_POST['email']);
$dep = mysql_real_escape_string($_POST['dep']);
$asunto = mysql_real_escape_string($_POST['asunto']);
$message = $_POST['message'];
$message = nl2br($message);  
$fe = date("d-m-Y H:i:s");
mysql_select_db(nombre_db_web);
if($dep != ""){
$insert = "INSERT INTO ticket set id_ticket='".$pedido."', asunto = '".$asunto."', mensaje='".$message."' , cuenta= '".$cuenta."', email = '".$email."', departamento = '".$dep."', estado = 'Abierto', fecha = '".$fe."'";
$insert = mysql_query($insert, $sqlweb);
echo '<p>&nbsp;&nbsp;Para ver de nuevo el ticket enviado:</p>
		<p>&nbsp;&nbsp;Email:&nbsp;'.$email.' </p>
		<p>&nbsp;&nbsp;Clave:&nbsp;'.$pedido.'</p>';
    }else{
        echo'<script>alert("No has seleccionado el departamento")</script>';
    }
}else{
?>


<form action="index.php?rzm=tickets" method="POST" enctype="multipart/form-data" class="registro" name="registro">
<table>
    <tr>
        <th>Nombre Cuenta:</th>
        <td >
          
                <input type="text" name="name" size="25">
	       
      
        </td>
    </tr>
    <tr>
        <th nowrap >Email:</th>
        <td>
           
                <input type="text" name="email" size="25"> </input>
            
            
        </td>
    </tr>
   
    <tr>
        <th>Departamento:</th>
        <td>
            <select name="dep" >
                <option value="" selected >Selecciona Uno</option>
                <?php
				mysql_select_db(nombre_db_web);
                 $services= 'SELECT * FROM departamentos ORDER BY id ASC';
                 $servicess = mysql_query($services, $sqlweb);
                 
                     while ($info = mysql_fetch_array($servicess)){
                        $topics = $info['id'];
						$topic = $info['departamento'];
						
                        echo'<option value="'.$topics.'">'.$topic.'</option>';
                        
                
              }?>
            </select>
          
        </td>
    </tr>
    <tr>
        <th>Asunto:</th>
        <td>
            <input type="text" name="asunto" size="35"> 
           
        </td>
    </tr>
    <tr>
        <th valign="top">Mensaje:</th>
        <td>
            
            <textarea class="textarea" name="message" cols="40" rows="9"> </textarea></td>
    </tr>
   
     <tr height=2px><td align="left" colspan=2 >&nbsp;</td></tr>
    <tr>
        <td></td>
        <td>
            <input class="button" type="submit" name="ticket" value="Enviar Ticket">
           
        </td>
    </tr>
</table>
</form>
<?php }?>
  </div></div>
   <div id="main-end"></div>

