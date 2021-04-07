<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 09</title>         
    </head>
    <body>
        <?php
        /** Mostrar el path donde se encuentra el fichero que se está ejecutando.
        */
       
            // _SERVER['SCRIPT_NAME'] contiene el path del script actual
            echo "<p>Path donde se encuentra el fichero: ".$_SERVER['SCRIPT_NAME']."</p>";

         ?>
           
    </body>
</html>