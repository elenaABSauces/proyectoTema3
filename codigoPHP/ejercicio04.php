<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 04</title>         
    </head>
    <body>
        <?php
        /** Mostrar en tu página index la fecha y hora actual en Oporto formateada en portugués
        */
         
        setlocale(LC_ALL, "pt_BR.utf-8"); 
        date_default_timezone_set("Europe/Lisbon"); 

       
        echo "<p> Fecha y hora actual en Oporto en portugués: ". strftime("%A %d %B %Y %T") . "</p>"; 
         ?>
           
    </body>
</html> 


 
