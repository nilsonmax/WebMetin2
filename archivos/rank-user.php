 <?php
 $upmdss = "SELECT player.name, player.level
                                      FROM player.player 
                                      INNER JOIN account.account 
                                      ON account.id=player.account_id
                                      WHERE player.name NOT LIKE '[%]%' AND account.status!='BLOCK'
                                      ORDER BY player.level DESC
                                      LIMIT 5";
                                      $resultado = mysql_query($upmdss,$sqlserver);
                                      $posicion = 0;
                                  while ($fila = mysql_fetch_array($resultado)){


                                   $nombre = $fila["name"];
                                   $nivel = $fila["level"];
                                   $posicion++;
                                   

                                   
                                      echo "<tr>";
                                    echo "<td class='next-line'>".$posicion."</td>";
                                    echo "<td class='next-name'>".$nombre."</td>";
                                    echo "<td class='next-lvl'>".$nivel."</td>";
                                  
                                    echo "</tr>";
                                  
                                }
                                  ?>