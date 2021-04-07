<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 16</title>         
    </head>
    <body>
         <?php
        /**
         *   @author: Javier Nieto Lorenzo
         *   @since: 10/10/2020
         *   16. Recorrer el array anterior utilizando funciones para obtener el mismo resultado.
        */
            $sumaSueldo=0; // Acumulador de precio de los sueldos de la semana
            $aSueldo = ["lunes" => 200, 
                        "martes" => 100, 
                        "miercoles" => 300, 
                        "jueves" => 400, 
                        "viernes" => 500, 
                        "sabado" => 600, 
                        "domingo" => 600];
            
            
            echo "<h2>Mostrando array utilizando 'key()', 'current()' y 'next()'</h2>";
            while(key($aSueldo)!=null){ //coge la clave de la posicion en la que se encuentra y comprueba que no esta vacía
                $sumaSueldo+= current($aSueldo); // Acumula el valor de la posicion en la que esta
                next($aSueldo); // Avanza el puntero interno del array 
            }
            
            echo "<p>El sueldo percibido durante la semana es de: ". $sumaSueldo."€</p>"; // salida por pantalla de la suma de los sueldos de la semana
            
            echo "<h2>Mostrando array utilizando 'each()'</h2>";
            // Se crea un array en la posicion del array $aSueldo con dos posiciones [0]->el dia de la semana (la clave) y [1]-> el sueldo del dia de la semana (el valor) 
            // y avanza el puntero interno del array automaticamente a la siguiente posicion 
            while($salarioDiario = each($aSueldo)){ 
                $sumaSueldo+= $salarioDiario[1];// cogemos el valor del array que se crea con each() y se lo sumamos al acumulador de sueldos
            }
            
            echo "<p>El sueldo percibido durante la semana es de: ". $sumaSueldo."€</p>"; // salida por pantalla de la suma de los sueldos de la semana
        ?> 
    </body>
</html>