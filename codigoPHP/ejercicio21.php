<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 21</title>         
    </head>
    <body>
        <?php
        /**
         *   @author: Javier Nieto Lorenzo
         *   @since: 14/10/2020
         *   21. Construir un formulario para recoger un cuestionario realizado a una persona y enviarlo a una página Tratamiento.php para que muestre
                las preguntas y las respuestas recogidas.
        */
        ?> 
        
        <form name="formulario" action="../codigoPHP/TratamientoEjercicio21.php" method="post">
            <div>
                <label for="numero1">Numero 1</label>
                <input type="text" name="numero1" placeholder="Introduzca un numero">
            </div>
            <div>
                <label for="numero2">Numero 2</label>
                <input type="text" name="numero2" placeholder="Introduzca otro numero">
            </div>
            
            <input type="reset" value="Borrar" name="Borrar">
            <input type="submit" value="Enviar" name="Enviar">
        </form>
           
    </body>
</html>