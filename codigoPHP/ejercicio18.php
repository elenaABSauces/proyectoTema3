<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 18</title>         
    </head>
    <body>
       <?php
        /**
         *   @author: Javier Nieto Lorenzo
         *   @since: 14/10/2020
         *   18. Recorrer el array anterior utilizando funciones para obtener el mismo resultado.
         *
        */
            define("NUM_MAX_FILAS",20); // Declaramos e inicializamos la costante del numero maximo de filas del teatro
            define("NUM_MAX_ASIENTOS",15); // Declaramos e inicializamos la costante del numero maximo de asientos por fila del teatro
            define("NUM_MIN_FILAS",1); // Declaramos e inicializamos la costante del numero maximo de filas del teatro
            define("NUM_MIN_ASIENTOS",1); // Declaramos e inicializamos la costante del numero minimo de asientos por fila del teatro
            
            
            $nFila=constant("NUM_MIN_FILAS"); // Declaro e inicializo la variable $nFilas con el numero de filas minimas
            
            
            // Inicializacion del array del Teatro $aTeatro con WHILE()        
            while($nFila<=constant("NUM_MAX_FILAS")){// recorre las filas
                $aTeatro[$nFila]=[];
                $nAsiento=constant("NUM_MIN_ASIENTOS");// Declaro e inicializo la variable $nAsientos con el numero de asientos minimos
                while($nAsiento<= constant("NUM_MAX_ASIENTOS")){// recorre los asientos
                    $aTeatro[$nFila][$nAsiento]="";
                    $nAsiento++;
                }
                $nFila++;
            }
            
            // asigno varios asientos del teatro
            $aTeatro[2][5] = "Javier";
            $aTeatro[5][2] = "Cristina";
            $aTeatro[5][7] = "Raul";
            $aTeatro[6][8] = "Leticia";
            $aTeatro[20][15] = "Elena";
            
            
            echo "<h2>Recorriendo array de Teatro con 'foreach()'</h2>";
            foreach ($aTeatro as $filas => $asientos) {// recorre las filas
                foreach ($asientos as $asiento => $nombre) {// recorre los asientos
                    if(!empty($nombre)){//compruebo que no esta vacio 
                    echo "<p>Fila ".$filas.", numero de asiento:".$asiento.", nombre de la persona: ".$nombre."</p>"; // Muestro la fila y el asiento junto con el nombre de la persona que lo ocupa
                    }
                } 
            }
            
            
            echo "<h2>Recorriendo array de Teatro con 'for()'</h2>";
            for($fila= constant("NUM_MIN_FILAS");$fila <=constant("NUM_MAX_FILAS");$fila++){// recorre las filas
                for($asiento= constant("NUM_MIN_ASIENTOS");$asiento <= constant("NUM_MAX_ASIENTOS");$asiento++){
                    if(!empty($aTeatro[$fila][$asiento])){  //compruebo que no esta vacio 
                        echo "<p>Fila ".$fila.", numero de asiento:".$asiento.", nombre de la persona: ".$aTeatro[$fila][$asiento]."</p>"; // Muestro la fila y el asiento junto con el nombre de la persona que lo ocupa
                    }
                }
            }
            
            echo "<h2>Recorriendo array de Teatro con 'while()'</h2>";
            $nFila=constant("NUM_MIN_FILAS"); // asigno a $nFilas con el numero de filas minimas
            
            
            while($nFila<=constant("NUM_MAX_FILAS")){// recorre las filas
                $nAsiento=constant("NUM_MIN_ASIENTOS");// asigno a $nAsientos con el numero de asientos minimos
                while($nAsiento<= constant("NUM_MAX_ASIENTOS")){// recorre los asientos
                    if(!empty($aTeatro[$nFila][$nAsiento])){ //compruebo que no esta vacio 
                        echo "<p>Fila ".$nFila.", numero de asiento:".$nAsiento.", nombre de la persona: ".$aTeatro[$nFila][$nAsiento]."</p>"; // Muestro la fila y el asiento junto con el nombre de la persona que lo ocupa
                    }
                    $nAsiento++;
                }
                $nFila++;
            }
        ?> 
           
    </body>
</html>