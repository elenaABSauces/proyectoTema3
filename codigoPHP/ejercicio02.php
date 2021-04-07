<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 02</title>         
    </head>
    <body>
        <?php
        /** Inicializar y mostrar una variable heredoc
        */
            $heredoc=<<<hdoc
                    Montrando una variable heredoc.
                    hdoc;
            
            //Mostramos el contenido de la variable heredoc por pantalla
            echo "<p>$heredoc</p>";
         ?>
           
    </body>
</html> 