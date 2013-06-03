<?php

mysql_select_db("player");
$user = "SELECT COUNT(*) as count FROM player WHERE DATE_SUB(NOW(), INTERVAL 8 MINUTE) < last_play;";
$f = mysql_query($user,$sqlserver);
$player_on = mysql_fetch_object($f)->count+1; 
                    echo  $player_on;

?>