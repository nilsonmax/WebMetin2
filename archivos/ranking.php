<div id="main-top">
  
  <h2 class="main-title">Ranking</h2>
  </div>
        <div id="main-cent">
          <div id="main-wrap">

<?php
$regVistos = 25;
$upmds = "SELECT player.id, player.name, player.level, player.exp, player_index.empire ,guild.name AS guild_name 
  FROM player.player 
  LEFT JOIN player.player_index 
  ON player_index.id=player.account_id 
  LEFT JOIN player.guild_member 
  ON guild_member.pid=player.id 
  LEFT JOIN player.guild 
  ON guild.id=guild_member.guild_id
  INNER JOIN account.account 
  ON account.id=player.account_id
  WHERE player.name NOT LIKE '[%]%' AND account.status!='BLOCK'
  ORDER BY player.level DESC, player.exp DESC ";

$lista0 = mysql_query($upmds,$sqlserver);
$totalSql = mysql_num_rows($lista0);

$pagTotal = ceil($totalSql/$regVistos);

if (!isset($_GET['pag'])) {$pagActual=1;} else {$pagActual=$_GET['pag'];}
$pagAnterior = $pagActual-1;
$pagSiguiente = $pagActual+1;



echo'<table align="center"><tr><td>';
if ($pagAnterior>0) {echo '<a href="index.php?rzm=ranking&amp;pag='.$pagAnterior.'">Anterior</a> - ';}
$pgIntervalo = 3;
$pgMaximo = ($pgIntervalo*2)+1; 
$pg=$pagActual-$pgIntervalo;$i=0;
while ($i<$pgMaximo) {
 if ($pg==$pagActual) {$strong=array('<strong>','</strong>');} else {$strong=array('','');}
 if ($pg>0 and $pg<=$pagTotal) {
  echo ''.$strong[0].'<a href="index.php?rzm=ranking&amp;pag='.$pg.'">'.$pg.'</a> - '.$strong[1].'';
  $i++;
 }
 if ($pg>$pagTotal) {$i=$pgMaximo;}
 $pg++;
}

if ($pagSiguiente<=$pagTotal) {echo '<a href="index.php?rzm=ranking&amp;pag='.$pagSiguiente.'">Siguiente</a>';
}
echo '</td></tr></table><p> </p>';

?>
<table  width="600px" style="margin-left:10px;">
<tr >
  <td style="margin-left:15px;">Posicion</td>
  <td style="margin-left:15px;">Nombre</td>
  <td style="margin-left:15px;">Nivel</td>
  <td style="margin-left:15px;">Gremio</td>
  <td style="margin-left:15px;">Reino</td>
</tr>
<?php

 $upmdss = "SELECT player.id,player.name,player.level,player.exp,player_index.empire,guild.name AS guild_name 
  FROM player.player 
  LEFT JOIN player.player_index 
  ON player_index.id=player.account_id 
  LEFT JOIN player.guild_member 
  ON guild_member.pid=player.id 
  LEFT JOIN player.guild 
  ON guild.id=guild_member.guild_id
  INNER JOIN account.account 
  ON account.id=player.account_id
  WHERE player.name NOT LIKE '[%]%' AND account.status!='BLOCK'
  ORDER BY player.level DESC, player.exp DESC 
  LIMIT ".(($pagActual-1)*$regVistos).",".$regVistos."";


  if (!isset($_GET['pag'])) {$posicion=0;} else {$posi=$_GET['pag'];
  if($posi == 1){
	  $posicion = 0;}
	  else {
  $posicion = ($posi-1)*25;}
  }
  $resultado = mysql_query($upmdss,$sqlserver);

  while ($fila = mysql_fetch_array($resultado)){


	 $nombre = $fila["name"];
	 $nivel = $fila["level"];
	 $gremio = $fila["guild_name"];
	 $reino = $fila["empire"];
	 $posicion++;
	 
	    echo "<tr>";
    echo "<td>".$posicion."</td>";
    echo "<td>".$nombre."</td>";
    echo "<td>".$nivel."</td>";
    echo "<td>".$gremio."</td>";
	  echo' <td><img  src="images/'.$reino.'.jpg"</td>';
    echo "</tr>";


}

?>

</table>
</div></div>
   <div id="main-end"></div>