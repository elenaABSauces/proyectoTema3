<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 05</title>         
    </head>
    <body>
        <?php
        /** Inicializar y mostrar una variable que tiene una marca de tiempo (timestamp)
        */
            setlocale(LC_ALL, "es_ES.utf-8"); 
        
            date_default_timezone_set("Europe/Madrid"); 
            
        $dateTime = new DateTime(); 
        
        //estilo orientado a objetos
        echo "<p>TimeStamp por estilo orientado a objetos: ".$dateTime->getTimestamp()."</p>"; 
        
        //estilo por procedimientos
        echo "<p>TimeStamp por estilo por procedimientos: ".date_timestamp_get($dateTime)."</p>";
         ?>
           
    </body>
</html> 