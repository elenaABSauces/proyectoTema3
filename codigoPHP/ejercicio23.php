<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 23</title>         
    </head>
    <body>
        <?php
        /**
         *   @author: Javier Nieto Lorenzo
         *   @since: 18/10/2020
         *   23. Construir un formulario para recoger un cuestionario realizado a una persona y mostrar en la misma página las preguntas y las respuestas
                recogidas; en el caso de que alguna respuesta esté vacía o errónea volverá a salir el formulario con el mensaje correspondiente

        */
        
            require_once '../core/201008libreriaValidacion.php'; // incluyo la libreria de validacion
            
            define("OBLIGATORIO",1);// defino e inicializo la constante a 1
            
            define("MAX_TAMANYO_ALFABETICO",50); // defino e inicializo el tamaño maximo de un campo alfabetico
            define("MIN_TAMANYO_ALFABETICO",1); // defino e inicializo el tamaño minimo de un campo alfabetico
            
            define("FECHA_MAXIMA", date('Y/m/d')); // defino e inicializo la fecha maxima de un campo de fecha al dia actual
            define("FECHA_MINIMA","1900/01/01"); // defino e inicializo la fecha minima de un campo de fecha
            
            $entradaOK=true;// declaro la variable que determinaá si esta bien la entrada de los campos
            
            $aErrores=[ //declaro e inicializo el array de errores
                'nombre' => null,
                'dni' => null,
                'fechaNacimiento' => null
            ];
            
            $aFormulario=[ // declaro e inicializo el array de los campos del formulario
                'nombre' => null,
                'dni' => null,
                'fechaNacimiento' => null
            ];
            
            
            
            if(isset($_REQUEST["Enviar"])){ // compruebo que el usuario le ha dado a enviar
                $aErrores['nombre']= validacionFormularios::comprobarAlfabetico($_REQUEST['nombre'], MAX_TAMANYO_ALFABETICO, MIN_TAMANYO_ALFABETICO, OBLIGATORIO); // valido que el nombre esta bien y que la ha introducido
                $aErrores['dni']= validacionFormularios::validarDni($_REQUEST['dni'], OBLIGATORIO); // valido que el formato de DNI sea valido y que lo ha introducido
                $aErrores['fechaNacimiento']= validacionFormularios::validarFecha($_REQUEST['fechaNacimiento'], FECHA_MAXIMA,FECHA_MINIMA,OBLIGATORIO); // compruebo que la fecha esta dentro del intervalo establecido y que la ha introducido
                
                foreach ($aErrores as $campo => $error) { // reocrro el array de errores
                    if($error != null){ // compruebo si hay algun elemento distinto de null
                        $entradaOK=false; // le doy el valor false a $entradaOK
                    }
                }
            }else{ // si el usuario no le ha dado al boton de enviar
                $entradaOK=false; // le doy el valor false a $entradaOK
            }
            
            if($entradaOK){ // si la entrada esta bien
                $aFormulario['nombre']=$_REQUEST['nombre']; // recojo el valor del nombre en el array del formulario
                $aFormulario['dni']=$_REQUEST['dni']; // recojo el valor del dni en el array del formulario
                $aFormulario['fechaNacimiento']=$_REQUEST['fechaNacimiento']; // recojo el valor de la fecha en el array del formulario
                
                //Muestro los datos introducidos
                echo "<h2>Datos introducidos</h2>";
                echo "<p>Nombre: ".$aFormulario['nombre']."</p>";
                echo "<p>DNI: ".$aFormulario['dni']."</p>";
                echo "<p>Fecha de nacimiento: ".$aFormulario['fechaNacimiento']."</p>";
                        
            }else{ // si hay algun campo de la entrada que este mal
        ?> 
        
        <form name="formulario" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <fieldset>
                <legend>Datos personales</legend>
                <div>
                    <label for="nombre">Nombre</label>
                    <input style="background-color:#81BEF7;" type="text" name="nombre" placeholder="Introduzca su nombre">
                    <?php
                        if($aErrores['nombre'] != null){ //compruebo si ha introducido mal el nombre
                            echo $aErrores['nombre']; // muestro el error en el nombre
                        }
                    ?>
                </div>
                <div>
                    <label for="dni">DNI </label>
                    <input style="background-color:#81BEF7;" type="text" name="dni" placeholder="Introduzca su dni">
                    <?php
                        if($aErrores['dni'] != null){ // compruebo si ha introducido mal el DNI
                            echo $aErrores['dni']; // muestra el error en el DNI
                        }
                    ?>
                </div>
                <div>
                    <label for="fechaNacimiento">Fecha de nacimiento </label>
                    <input style="background-color:#81BEF7;" style="width:250px;" type="text" name="fechaNacimiento" placeholder="Introduzca su fecha de nacimiento">
                    <?php
                        if($aErrores['fechaNacimiento'] != null){ // compruebo si ha introducido mal la fecha de nacimiento
                            echo $aErrores['fechaNacimiento']; // muestra el error en la fecha de nacimiento
                        }
                    ?>
                </div>
            </fieldset>

            <input type="reset" value="Borrar" name="Borrar">
            <input type="submit" value="Enviar" name="Enviar">
        </form>
        
        <?php
            }
        ?>
           
    </body>
</html>