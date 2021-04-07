  <!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 13</title>         
    </head>
    <body>
        <?php
        /**
         *   @author: Javier Nieto Lorenzo
         *   @since: 22/10/2020
         *   13. Crear una función que cuente el número de visitas a la página actual desde una fecha concreta.

        */
            /**
             * Funcion que cuenta el numero de visitas de una pagina web
             * @return int el numero de visitas a la pagina 
             */
            // Para que funcione el contador deberemos dar permisos sobre el archivo a todos de escritura lectura y ejecucion -> sudo chmod -R 777 /var/www/html/proyectoDWES/proyectoTema3/tmp/
            function contadorVisitas(){
                $archivo="../tmp/visitasEjercicio13.txt"; // declaro e inicializo la variable $archivo que contendrá la ruta donde se encuentra el archivo que almacena las visitas
                
                $puntero = fopen($archivo, "r"); // fopen() permite abrir un fichero o un URL, recibe como parametros la ruta del archivo y el modo en que queremos abrirlo('r'-solo lectura,coloca el puntero al principio)
                
                if($puntero){ // si se abre el fichero en modo lectura
                    $contadorVisitas=fread($puntero, filesize($archivo)); // leemos el archivo y le asignamos el numero de visitas que tiene. fread() permite leer archivos, 
                                                                           //tiene como parametro el puntero y el tamaño del archivo, el cual lo obtenemos de la funcion filesize() a la que le pasamos el fichero del que queremos saber el tamaño
                    $contadorVisitas+=1; //sumamos 1 visita mas
                    fclose($puntero); // cerramos el puntero de el archivo con fclose() que recibe como parametro el puntero
                }
                
                $puntero=fopen($archivo,"w+"); // abrimos el fichero en modo lectura y escritura "w+"-para lectura y escritura; coloca el puntero al fichero al principio del fichero y trunca el fichero a longitud cero. Si el fichero no existe se intenta crear.
                
                if($puntero){ // si se abre el fichero en modo lectura y escritura
                    fwrite($puntero, $contadorVisitas); // escribimos el nuevo numero de visitas con fwrite() recibe como parametro el puntero y el string del contenido que queremos escribir
                    fclose($puntero); // cerramos el puntero de el archivo con fclose() 
                }
                
                return $contadorVisitas; //devolvemos el numero de visitas actualizado
            }
            
            $visitas= contadorVisitas();
            echo "El numero de visitas desde el 22/10/2020 es: ". $visitas;
        ?> 
           
    </body>
</html>
