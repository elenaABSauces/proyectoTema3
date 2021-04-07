<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 02</title>         
    </head>
    <body>
        <?php
        /** Mostrar en tu página index la fecha y hora actual formateada en castellano(Utilizar cuando sea posible la clase DateTime)
        */
        //1º instalamos los paquetes que queremos usar en el servidor
        //elegimos zona horaria
        date_default_timezone_set("Europe/Madrid");
        // elegimos idioma
        setlocale(LC_ALL, "es_ES.utf-8"); 
        
        $dateTime = new DateTime();
        
        echo "<p>Formato fecha-> ".$dateTime->format('d-m-Y  H:i:s')."</p>"; 
        echo "<p>Fecha y hora local formateada en castellano: ". strftime("%A %d %B %Y , %T") . "</p>"; //Mostramos la fecha y hora local formateada al español
        //%A dia de la semana; %d dia; %B nombre del mes; %Y año; %TLo mismo que "%H:%M:%S"
        ?>
           
    </body>
</html> 