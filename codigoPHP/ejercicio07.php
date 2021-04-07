<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 07</title>         
    </head>
    <body>
        <?php
        /** Mostrar el nombre del fichero que se está ejecutando.
        */
       
        //basename solo poera en la entrada de la cadena
        //$_SERVER es un array que contiene información, tales como cabeceras, rutas y ubicaciones de script. Las entradas de este array son creadas por el servidor web.
        //PHP_SELF' es el nombre del archivo de script ejecutándose actualmente
        echo "<p>Nombre del fichero que se está ejecutando: ".basename($_SERVER['PHP_SELF'])."</p>";

         ?>
           
    </body>
</html>