<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 14</title>         
    </head>
    <body>
           <?php
        /**
         *   @author: Javier Nieto Lorenzo
         *   @since: 13/10/2020
         *   14. Comprobar las librerías que estás utilizando en tu entorno de desarrollo y explotación. Crear tu propia librería de funciones y estudiar la
                forma de usarla en el entorno de desarrollo y en el de explotación.

        */  
            require_once '../core/libreriaCalculadora.php'; // Importa la libreria LibreriaCalculadora.php
            
            $numero1=10;
            $numero2=5;
            
            echo "<h2>Utilizando la libreria libreriaCalculadora.php</h2>";
            echo "<p>Suma de ".$numero1. " y " . $numero2 . " utilizando funcion suma() = ".suma($numero1,$numero2) . "</p>";
            echo "<p>Resta de ".$numero1. " y " . $numero2 . " utilizando funcion resta() = ".resta($numero1,$numero2) . "</p>";
            echo "<p>Multiplicacion de ".$numero1. " y " . $numero2 . " utilizando funcion multiplicacion() = ".multiplicacion($numero1,$numero2) . "</p>";
            echo "<p>Division de ".$numero1. " y " . $numero2 . " utilizando funcion division() = ".division($numero1,$numero2) . "</p>";
            
        ?> 
           
    </body>
</html>