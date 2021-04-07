<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 22</title>         
    </head>
    <body>
         <?php
        /**
         *   @author: Javier Nieto Lorenzo
         *   @since: 14/10/2020
         *   22. Construir un formulario para recoger un cuestionario realizado a una persona y mostrar en la misma página las preguntas y las respuestas
                recogidas.

        */
        
            require_once '../core/libreriaCalculadora.php'; // incluyo la libreria LibreriaCalculadora.php
            
            if(isset($_REQUEST["Enviar"])){ // compruebo que el usuario le ha dado a enviar y hago el tratamiento de datos
                
                // con $_REQUEST['numero1'] cojo el numero1 del formulario y con $_REQUEST['numero2'] cojo el numero2
                
                echo "<h2>Utilizando la libreria libreriaCalculadora.php</h2>";
                echo "<p>Suma de ".$_REQUEST['numero1']. " y " . $_REQUEST['numero2'] . " utilizando funcion suma() = ".suma($_REQUEST['numero1'],$_REQUEST['numero2']) . "</p>";
                echo "<p>Resta de ".$_REQUEST['numero1']. " y " . $_REQUEST['numero2'] . " utilizando funcion resta() = ".resta($_REQUEST['numero1'],$_REQUEST['numero2']) . "</p>";
                echo "<p>Multiplicacion de ".$_REQUEST['numero1']. " y " . $_REQUEST['numero2'] . " utilizando funcion multiplicacion() = ".multiplicacion($_REQUEST['numero1'],$_REQUEST['numero2']) . "</p>";
                echo "<p>Division de ".$_REQUEST['numero1']. " y " . $_REQUEST['numero2'] . " utilizando funcion division() = ".division($_REQUEST['numero1'], $_REQUEST['numero2']) . "</p>";
            }else{ // si el usuario no le ha dado a enviar
            
        
        ?> 
        
        <form name="formulario" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <div>
                <label for="numero1">Numero 1</label>
                <input type="text" name="numero1" placeholder="Introduzca un numero" required>
            <div>
                <label for="numero2">Numero 2</label>
                <input type="text" name="numero2" placeholder="Introduzca otro numero" required>
            </div>

            <input type="reset" value="Borrar" name="Borrar">
            <input type="submit" value="Enviar" name="Enviar">
        </form>
        
        <?php
            }
        ?>
           
    </body>
</html>