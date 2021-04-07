<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 12</title>         
    </head>
    <body>
        <?php
        /** 12. Mostrar el contenido de las variables superglobales (utilizando print_r() y foreach()).
        */
        echo "<h2>Se muestran las variables superglobales utilizando print_r</h2>";
           
            echo "<p>Todas las variables disponibles globales: GLOBALS</p>";
            print_r ($GLOBALS);
            
            echo "<h3>Información del entorno de ejecución y del servicior _SERVER</h3>";
            print_r ($_SERVER);
            echo "<h3>Varible _GET</h3>";
            print_r ($_GET);
            echo "<h3>Variables HTTP POST_POST</h3>";
            print_r ($_POST);
            echo "<h3>Variable de carga de archivos HTTP _FILES</h3>";
            print_r ($_FILES);
            echo "<h3>Cookies HTTP _COOKIE</h3>";
            print_r ($_COOKIE);
            echo "<h3>Variables de la sesión _SESSION</h3>";
            print_r ($_SESSION);
            echo "<h3>Variables de solicitud HTTP _REQUEST</h3>";
            print_r ($_REQUEST);
            echo "<h3>Variables del entorno _ENV</h3>";
            print_r ($_ENV);
       
            echo "<h2>Se muestran las variables superglobales utilizando foreach()</h2>";
  
            echo "<h3>GLOBALS</h3>";
            foreach ($GLOBALS as $clave => $valor) {
                echo "\t [{$clave}] => {$valor} <br>";
            }
            echo "<h3>_SERVER</h3>";
            foreach ($_SERVER as $clave => $valor) {
                echo "\t [{$clave}] => {$valor} <br>";
            }
            echo "<h3>_GET</h3>";
            foreach ($_GET as $clave => $valor) {
                echo "\t [{$clave}] => {$valor} <br>";
            }
            echo "<h3>_POST</h3>";
            foreach ($_POST as $clave => $valor) {
                echo "\t [{$clave}] => {$valor} <br>";
            }
            echo "<h3>_FILES</h3>";
            foreach ($_FILES as $clave => $valor) {
                echo "\t [{$clave}] => {$valor} <br>";
            }
            echo "<h3>_COOKIE</h3>";
            foreach ($_COOKIE as $clave => $valor) {
                echo "\t [{$clave}] => {$valor} <br>";
            }
            echo "<h3>_SESSION</h3>";
            foreach ($_SESSION as $clave => $valor) {
                echo "\t [{$clave}] => {$valor} <br>";
            }
            echo "<h3>_REQUEST</h3>";
            foreach ($_REQUEST as $clave => $valor) {
                echo "\t [{$clave}] => {$valor} <br>";
            }
            echo "<h3>_ENV</h3>";
            foreach ($_ENV as $clave => $valor) {
                echo "\t [{$clave}] => {$valor} <br>";
            }
           
           
         ?>
           
    </body>
</html>