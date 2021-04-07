<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 06</title>         
    </head>
    <body>
        <?php
        /** Operar con fechas: calcular la fecha y el día de la semana de dentro de 60 días.
        */
        date_default_timezone_set("Europe/Madrid");
        setlocale(LC_ALL, "es_ES.utf-8"); 
        
        $dateTime = new DateTime();
        
        echo "<p>Fecha y dia de la semana de dentro de 60 días -> ". $dateTime->modify('+60 day')->format('d-m-Y , H:i:s'). "</p>"; 
   
        
         ?>
           
    </body>
</html> 