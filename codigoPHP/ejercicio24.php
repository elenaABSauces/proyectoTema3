<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 24</title>         
    </head>
    <body>
        <?php
        /**
         *  @author: Javier Nieto Lorenzo
         *  @since: 24/10/2020
         *  24. Construir un formulario para recoger un cuestionario realizado a una persona y mostrar en la misma página las preguntas y las respuestas
                recogidas; en el caso de que alguna respuesta esté vacía o errónea volverá a salir el formulario con el mensaje correspondiente, pero las
                respuestas que habíamos tecleado correctamente aparecerán en el formulario y no tendremos que volver a teclearlas.
        */
        
            require_once '../core/201020libreriaValidacion.php'; // incluyo la libreria de validacion para validar los campos de formulario
            
            define("OBLIGATORIO",1);// defino e inicializo la constante a 1 para los campos que son obligatorios
            define("OPCIONAL",0);// defino e inicializo la constante a 0 para los campos que son opcionales
            
            $FECHA_ACTUAL=date('Y/m/d'); // defino e inicializo la variable de la fecha actual
            
            $entradaOK=true; // declaro la variable que determina si esta bien la entrada de los campos introducidos por el usuario
            
            $aErrores=[ //declaro e inicializo el array de errores
                'nombre' => null,
                'dni' => null,
                'correoElectronico' => null,
                'fechaNacimiento' => null,
                'altura' => null,
                'numeroHermanos' => null,
                'estadoCivil' => null,
                'vehiculoPropio' => null,
                'lenguajesProgramacion' => null
                
            ];
            
            $aRespuestas=[ // declaro e inicializo el array de las respuestas del usuario
                'nombre' => null,
                'dni' => null,
                'correoElectronico' => null,
                'fechaNacimiento' => null,
                'altura' => null,
                'numeroHermanos' => null,
                'estadoCivil' => null,
                'vehiculoPropio' => null,
                'lenguajesProgramacion' => null
                
            ];
            
            
           
            if(isset($_REQUEST["Enviar"])){ // compruebo que el usuario le ha dado a al boton de enviar y valido la entrada de todos los campos
                $aErrores['nombre']= validacionFormularios::comprobarAlfabetico($_REQUEST['nombre'], 100, 1, OBLIGATORIO);
                $aErrores['dni']= validacionFormularios::validarDni($_REQUEST['dni'], OBLIGATORIO); 
                $aErrores['correoElectronico']= validacionFormularios::validarEmail($_REQUEST['correoElectronico'], OBLIGATORIO); 
                $aErrores['fechaNacimiento']= validacionFormularios::validarFecha($_REQUEST['fechaNacimiento'], $FECHA_ACTUAL,"1900/01/01",OBLIGATORIO); 
                $aErrores['altura']= validacionFormularios::comprobarFloat($_REQUEST['altura'], 2.5, 0.20, OBLIGATORIO); 
                $aErrores['numeroHermanos']= validacionFormularios::comprobarEntero($_REQUEST['numeroHermanos'], 20, 0, OPCIONAL); 
                $aErrores['estadoCivil']= validacionFormularios::validarElementoEnLista($_REQUEST['estadoCivil'], ['soltero','casado','divorciado','separado','viudo']); 
                $aErrores['vehiculoPropio']= validacionFormularios::validarElementoEnLista($_REQUEST['vehiculoPropio'], ['si','no']); 
                (!isset($_REQUEST['lenguajesProgramacion'])) ? $arrayErrores['lenguajesProgramacion'] = "Debe marcarse un valor" : null; 
                
                foreach ($aErrores as $campo => $error) { // recorro el array de errores
                    if($error != null){ // compruebo si hay algun mensaje de error en algun campo
                        $entradaOK=false; // le doy el valor false a $entradaOK
                        $_REQUEST[$campo]=""; // si hay algun campo que tenga mensaje de error pongo $_REQUEST a null
                    }
                }
            }else{ // si el usuario no le ha dado al boton de enviar
                $entradaOK=false; // le doy el valor false a $entradaOK
            }
            
            if($entradaOK){ // si la entrada esta bien recojo los valores introducidos y hago su tratamiento
                $aRespuestas['nombre']=$_REQUEST['nombre']; 
                $aRespuestas['dni']=$_REQUEST['dni']; 
                $aRespuestas['correoElectronico']=$_REQUEST['correoElectronico']; 
                $aRespuestas['fechaNacimiento']=new DateTime($_REQUEST['fechaNacimiento']); 
                $aRespuestas['altura']=$_REQUEST['altura']; 
                $aRespuestas['numeroHermanos']=$_REQUEST['numeroHermanos']; 
                $aRespuestas['estadoCivil'] = $_REQUEST['estadoCivil'];
                $aRespuestas['vehiculoPropio'] = $_REQUEST['vehiculoPropio']; 
                $aRespuestas['lenguajesProgramacion'] = $_REQUEST['lenguajesProgramacion']; 
                
                
                
                //TRATAMIENTO
                echo "<h2>Datos introducidos</h2>";
                echo "<p>Nombre: ".$aRespuestas['nombre']."</p>";
                echo "<p>DNI: ".$aRespuestas['dni']."</p>";
                echo "<p>Correo electrónico: ".$aRespuestas['correoElectronico']."</p>";
                echo "<p>Fecha de nacimiento: ".$aRespuestas['fechaNacimiento']->format('Y-m-d')."</p>";
                echo "<p>Fecha de nacimiento(timestamp): ".$aRespuestas['fechaNacimiento']->getTimestamp()."</p>";
                echo "<p>Altura: ".$aRespuestas['altura']."m</p>";
                echo "<p>Numero de hermanos: ".$aRespuestas['numeroHermanos']."</p>";
                echo "<p>Estado Civil: ".$aRespuestas['estadoCivil']."</p>";
                echo "<p>Vehiculo propio: ".$aRespuestas['vehiculoPropio']."</p>";
                echo "<p>Lenguajes de programacion: ";
                foreach($aRespuestas['lenguajesProgramacion'] as $opcion){ // recorro y muestro los valores del array que contiene las opciones pulsadas del checkbox
                    echo $opcion." "; 
                }        
                echo "</p>";
            }else{ // si hay algun campo de la entrada que este mal muestro el formulario hasta que introduzca bien los campos
        ?> 
        
        <form name="formulario" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <fieldset>
                <legend>Datos personales</legend>
                <div>
                    <label for="nombre">Nombre y Apellidos</label>
                    <input style="background-color:#81BEF7;width:200px;" type="text" name="nombre" placeholder="Introduzca su Nombre y Apellidos" value="<?php 
                        echo (isset($_REQUEST['nombre'])) ? $_REQUEST['nombre'] : null; // si el campo esta correcto mantengo su valor en el formulario
                    ?>">
                    <?php
                        echo ($aErrores['nombre']) ? "<span style='color:#FF0000'>".$aErrores['nombre']."</span>" : null;// si el campo es erroneo se muestra un mensaje de error
                    ?>
                </div>
                <div>
                    <label for="dni">DNI </label>
                    <input style="background-color:#81BEF7;width:70px;" type="text" name="dni" placeholder="00000000X" value="<?php
                        echo (isset($_REQUEST['dni'])) ? $_REQUEST['dni'] : null;// si el campo esta correcto mantengo su valor en el formulario
                    ?>">
                    <?php
                        echo (!is_null($aErrores['dni'])) ? "<span style='color:#FF0000'>".$aErrores['dni']."</span>" : null; // si el campo es erroneo se muestra un mensaje de error
                    ?>
                </div>
                <div>
                    <label for="correoElectronico">Correo electónico </label>
                    <input style="background-color:#81BEF7;width:180px;" type="text" name="correoElectronico" placeholder="ejemplo@email.es" value="<?php
                        echo (isset($_REQUEST['correoElectronico'])) ? $_REQUEST['correoElectronico'] : null;// si el campo esta correcto mantengo su valor en el formulario
                    ?>">
                    <?php
                        echo (!is_null($aErrores['correoElectronico'])) ? "<span style='color:#FF0000'>".$aErrores['correoElectronico']."</span>" : null; // si el campo es erroneo se muestra un mensaje de error
                    ?>
                </div>
                <div>
                    <label for="fechaNacimiento">Fecha de nacimiento </label>
                    <input type="date" style="background-color:#81BEF7;" max="<?php $FECHA_ACTUAL; ?>" style="background-colo:#81BEF7;"  name="fechaNacimiento" value="<?php
                        echo (isset($_REQUEST['fechaNacimiento']))? $_REQUEST['fechaNacimiento'] : null;// si el campo esta correcto mantengo su valor en el formulario
                    ?>">
                    <?php
                        echo (!is_null($aErrores['fechaNacimiento'])) ? "<span style='color:#FF0000'>".$aErrores['fechaNacimiento']."</span>" : null; // si el campo es erroneo se muestra un mensaje de error
                    ?>
                </div>
                <div>
                    <label for="altura">Altura en metros </label>
                    <input style="background-color:#81BEF7;width:40px;" type="text" name="altura" placeholder="0.2-2.5" value="<?php
                        echo (isset($_REQUEST['altura'])) ? $_REQUEST['altura'] : null;// si el campo esta correcto mantengo su valor en el formulario
                    ?>">
                    <?php
                        echo (!is_null($aErrores['altura'])) ? "<span style='color:#FF0000'>".$aErrores['altura']."</span>" : null; /// si el campo es erroneo se muestra un mensaje de error
                    ?>
                </div>
                <div>
                    <label for="numeroHermanos">Numero de hermanos</label>
                    <input style="width:40px;" type="number" name="numeroHermanos" placeholder="0-20" value="<?php
                        echo (isset($_REQUEST['numeroHermanos']))? $_REQUEST['numeroHermanos'] : null; // si el campo esta correcto mantengo su valor en el formulario
                    ?>">
                    <?php
                        echo(!is_null($aErrores['numeroHermanos'])) ? "<span style='color:#FF0000'>".$aErrores['numeroHermanos']."</span>" : null;     // si el campo es erroneo se muestra un mensaje de error
                    ?>
                </div>
                <div>
                    <label for ="estadoCivil">Estado civil:</label>
                    <select name="estadoCivil">
                        <option value="soltero" <?php echo (isset($_REQUEST["estadoCivil"])=='soltero')? 'selected' : null; //si el usuario lo ha pulsado lo marco como selected?> >soltero/a</option>
                        <option value="casado" <?php echo (isset($_REQUEST["estadoCivil"])=='casado')? 'selected' : null; //si el usuario lo ha pulsado lo marco como selected?> >casado/a</option>
                        <option value="divorciado" <?php echo (isset($_REQUEST["estadoCivil"])=='divorciado')? 'selected' : null; //si el usuario lo ha pulsado lo marco como selected?> >divorciado/a</option>
                        <option value="separado" <?php echo (isset($_REQUEST["estadoCivil"])=='separado')? 'selected' : null; //si el usuario lo ha pulsado lo marco como selected?> >separado/a</option>
                        <option value="viudo" <?php echo (isset($_REQUEST["estadoCivil"])=='viudo')? 'selected' : null; //si el usuario lo ha pulsado lo marco como selected?> >viudo/a</option>
                    </select>
                    
                    <?php
                        echo(!is_null($aErrores['estadoCivil'])) ? "<span style='color:#FF0000'>".$aErrores["estadoCivil"]."</span>" : null;   // si el campo es erroneo se muestra un mensaje de error
                    ?>
                </div>
                <div>
                    <label for="vehiculoPropio" >Vehiculo propio :</label><br>
                    <input type="radio" id="si" name="vehiculoPropio" value="si" <?php echo (isset($_REQUEST["vehiculoPropio"]) && $_REQUEST["vehiculoPropio"]=='si')? 'checked' : null; //si el usuario lo ha pulsado lo marco como checked?> >
                    <label for="si">Si</label><br>
                    <input type="radio" id="no" name="vehiculoPropio" value="no" <?php echo (isset($_REQUEST["vehiculoPropio"]) && $_REQUEST["vehiculoPropio"]=='no')? 'checked' : null; //si el usuario lo ha pulsado lo marco como checked?> >
                    <label for="no">No</label><br>
                    
                    <?php
                        echo(!is_null($aErrores['vehiculoPropio'])) ? "<span style='color:#FF0000'>".$aErrores["vehiculoPropio"]."</span>" : null;   // si el campo es erroneo se muestra un mensaje de error
                    ?>
                </div>
                <div>
                    <p>Lenguaje/s de programacion que hayas utilizado: </p>
                    <input type="checkbox" id="JAVA" name="lenguajesProgramacion[JAVA]" value="JAVA" <?php echo (isset($_REQUEST["lenguajesProgramacion"]['JAVA']))? 'checked' : null; //si el usuario lo ha pulsado lo marco como checked?> >
                    <label for="JAVA"> JAVA</label>
                    <input type="checkbox" id="PHP" name="lenguajesProgramacion[PHP]" value="PHP" <?php echo (isset($_REQUEST["lenguajesProgramacion"]['PHP']))? 'checked' : null; //si el usuario lo ha pulsado lo marco como checked?> >
                    <label for="PHP"> PHP</label>
                    <input type="checkbox" id="PYHTON" name="lenguajesProgramacion[PYHTON]" value="PYHTON" <?php echo (isset($_REQUEST["lenguajesProgramacion"]['PYHTON']))? 'checked' : null; //si el usuario lo ha pulsado lo marco como checked?> >
                    <label for="PYHTON"> PYTHON</label>
                    <input type="checkbox" id="C" name="lenguajesProgramacion[C]" value="C" <?php echo (isset($_REQUEST["lenguajesProgramacion"]['C']))? 'checked' : null; //si el usuario lo ha pulsado lo marco como checked?> >
                    <label for="C"> C</label><br>
                    <?php
                        echo(!is_null($aErrores['lenguajesProgramacion'])) ? "<span style='color:#FF0000'>".$aErrores["lenguajesProgramacion"]."</span>" : null; // si el campo es erroneo se muestra un mensaje de error
                    ?>
                </div>
            </fieldset>

            <input type="submit" value="Enviar" name="Enviar">
        </form>
        
        <?php
            }
        ?>
           
    </body>
</html>