<?php
include("../../configuraciones/config.web.php");
mysql_select_db(nombre_db_web);

if(isset($_GET["Enviar"]) && $_GET["Enviar"] =="si")
 {
  $max="select max(id) from chat";
  $max=mysql_query($max);
  $max=mysql_result($max,0,0)+1;
  $fecha=date("Y/m/d - H:i:s");
  $insert="insert into chat values(".$max.",'".htmlentities(utf8_decode($_REQUEST["comentario"]))."','".$fecha."','".htmlentities(utf8_decode($_REQUEST["usuario"]))."')";
  if(trim($_REQUEST["comentario"])!=NULL)
   {
    $insert=mysql_query($insert,$sqlweb);
   }
  exit();
 }
elseif(isset($_GET["Leer"]) && $_GET["Leer"]=="si")
 {
  $select="select * from chat order by id desc limit 0,15";
  $selects=mysql_query($select,$sqlweb);
  while($row = mysql_fetch_array($selects))
   {
    if($row["comentario"]!=NULL)
     {
        echo "<strong>".$row["usuario"]."</strong> - ".$row["comentario"]."<br />";
     }
   }
  exit();
 }
elseif( isset($_GET["Hash"]) &&$_GET["Hash"]=="si")
 {
  header("Cache-Control: no-store, no-cache, must-revalidate");
  $max="select max(id) from chat";
  $max=mysql_query($max,$sqlweb);
  $max=mysql_result($max,0,0);
  //
  $select="select * from chat where id=".$max." limit 1";
  $select=mysql_query($select);
  //
  $id=mysql_result($select,0,"id");
  $comentario=mysql_result($select,0,"comentario");
  $fecha=mysql_result($select,0,"fecha");
  //
  $hash=$id.$comentario.$fecha;
  if($hash==NULL)
   {
    echo "vacio";
   }
  else
   {
    $hash=md5($id.$comentario.$fecha);
    echo $hash;
   }
  exit();
 }
?>