<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 01</title>         
    </head>
    <body>
        <?php
        /** Inicializar variables de los distintos tipos de datos básicos(string, int, float, bool) 
         y mostrar los datos por pantalla (echo, print, printf, print_r,var_dump)
        */ 
 
            //variables inicializadas con datos básicos
            $string="cadena";
            $int=1;
            $float=1.5;
            $bool=true;
            
            //Mostramos los datos por pantalla con echo (1 o varios parametros)
            echo "Echo->"." String:". $string." int: ".$int." float: ".$float." bool: ".$bool;
            
            //Mostramos los datos por pantalla con print (unico parametro)
            print  "Print->"." String:". $string." int: ".$int." float: ".$float." bool: ".$bool;
            
            // printf() nos muestra strings formateados
            // %s - El argumento se trata y se presenta como una cadena.
            // %d - El argumento se trata como un número entero y se presenta como un número decimal (con signo).
            // %f - El argumento se trata como un flotante y se presenta como un número de punto flotante (consciente de la configuración regional).
            printf("<p>Printf=> </p>");
            printf("<p>Variable de tipo string: %s </p>",$string);
            printf("<p>Variable de tipo int: %d </p>",$int);
            printf("<p>Variable de tipo float: %f </p>",$float);
            printf("<p>Variable de tipo bool: $bool </p>");

            // Mostrar variables con print_r (delvuelve la informacion en vez de mostrarla)

            print_r("<p>Print_r => </p>");
            print_r("<p>String: $string </p>");
            print_r("<p>int: $int </p>");
            print_r("<p>float: $float </p>");
            print_r("<p>bool: $bool </p>");
            
            //Mostramos los datos con var_dumb
            var_dump("var_dump=>");
            var_dump($string);
            var_dump($int);
            var_dump($float);
            var_dump($bool);
            
        ?>
    </body>
</html> 