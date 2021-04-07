<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 08</title>         
    </head>
    <body>
        <?php
        /** Mostrar la dirección IP del equipo desde el que estás accediendo.
        */
       
       
         //_SERVER[REMOTE_ADDR] devuelve la direccion IP del equipo desde el que estás accediendo
            echo "<p>Dirección IP equipo: ".$_SERVER['REMOTE_ADDR']."</p>"; 

         ?>
           
    </body>
</html>