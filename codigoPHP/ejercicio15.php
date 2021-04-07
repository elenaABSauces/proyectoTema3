<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 15</title>         
    </head>
    <body>
       <?php
        /**
         *   @author: Javier Nieto Lorenzo
         *   @since: 10/10/2020
         *   15. Crear e inicializar un array con el sueldo percibido de lunes a domingo. Recorrer el array para calcular el sueldo percibido durante la
                semana. (Array asociativo con los nombres de los días de la semana).
        */
            $acumulador=0; // Acumulador de precio de los sueldos de la semana
            $aSueldo = ["lunes" => 200, // array con los sueldos de cada dia de la semana
                        "martes" => 100, 
                        "miercoles" => 300, 
                        "jueves" => 400, 
                        "viernes" => 500, 
                        "sabado" => 600, 
                        "domingo" => 600];
            
            foreach ($aSueldo as $diaSemana => $sueldo) { // Recorre el array de sueldos
                $acumulador+=$sueldo; // Acumula en la variable $acumulador el valor de los sueldos de cada dia de la semana
            }
            
            echo "<p>El sueldo percibido durante la semana es de: ".$acumulador."€</p>"; // salida por pantalla de la suma de los sueldos de la semana
        ?> 
    </body>
</html>