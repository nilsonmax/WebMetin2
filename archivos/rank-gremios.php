 <?php
 $upmdss = "SELECT guild.name, guild.ladder_point
                                      FROM player.guild 
                                     
                                    
                                      ORDER BY guild.ladder_point DESC
                                      LIMIT 5";
                                      $resultado = mysql_query($upmdss,$sqlserver);
                                      $posicion = 0;
                                  while ($fila = mysql_fetch_array($resultado)){


                                   $nombre = $fila["name"];
                                   $nivel = $fila["ladder_point"];
                                   $posicion++;
                                   

                                   
                                      echo "<tr>";
                                    echo "<td class='next-line'>".$posicion."</td>";
                                    echo "<td class='next-name'>".$nombre."</td>";
                                    echo "<td class='next-lvl'>".$nivel."</td>";
                                  
                                    echo "</tr>";
                                  
                                }
                                  ?>