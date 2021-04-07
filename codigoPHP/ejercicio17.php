<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 17</title>         
    </head>
    <body>
       <?php
        /**
         *   @author: Javier Nieto Lorenzo
         *   @since: 14/10/2020
         *   17. Inicializar un array (bidimensional con dos índices numéricos) donde almacenamos el nombre de las personas que tienen reservado el
                asiento en un teatro de 20 filas y 15 asientos por fila. (Inicializamos el array ocupando únicamente 5 asientos). Recorrer el array con
                distintas técnicas (foreach(), while(), for()) para mostrar los asientos ocupados en cada fila y las personas que lo ocupan.
        */
            define("NUM_MAX_FILAS",20); // Declaramos e inicializamos la costante del numero maximo de filas del teatro
            define("NUM_MAX_ASIENTOS",15); // Declaramos e inicializamos la costante del numero maximo de asientos por fila del teatro
            define("NUM_MIN_FILAS",1); // Declaramos e inicializamos la costante del numero maximo de filas del teatro
            define("NUM_MIN_ASIENTOS",1); // Declaramos e inicializamos la costante del numero minimo de asientos por fila del teatro
            
            
            // Creamos el array $aTeatro y lo inicializamos vacio 
            for($fila= constant("NUM_MIN_FILAS");$fila <=constant("NUM_MAX_FILAS");$fila++){ // recorremos las filas y las ponemos vacias
                $aTeatro[$fila]=[];
                for($asiento= constant("NUM_MIN_ASIENTOS");$asiento <= constant("NUM_MAX_ASIENTOS");$asiento++){// recorremos los asientos y los ponemos vacios
                    $aTeatro[$fila][$asiento]="";
                }
            }
            
            // asigno varios asientos del teatro
            $aTeatro[2][5] = "Javier";
            $aTeatro[5][2] = "Cristina";
            $aTeatro[5][7] = "Raul";
            $aTeatro[6][8] = "Leticia";
            $aTeatro[20][15] = "Elena";
            
            
            echo "<h2>Recorriendo array de Teatro con 'foreach()'</h2>";
            foreach ($aTeatro as $filas => $asientos) { // recorremos las filas
                foreach ($asientos as $asiento => $nombre) {//recorremos los asientos
                    if(!empty($nombre)){ //compruebo que no esta vacio 
                    echo "<p>Fila ".$filas.", numero de asiento:".$asiento.", nombre de la persona: ".$nombre."</p>";// Muestro la fila y el asiento junto con el nombre de la persona que lo ocupa
                    }
                } 
            }
            
        ?> 
           
    </body>
</html>