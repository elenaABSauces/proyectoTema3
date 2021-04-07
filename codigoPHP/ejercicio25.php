<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 25</title>         
    </head>
    <body>
        <?php
        /**
         *   @author: Javier Nieto Lorenzo
         *   @since: 22/10/2020
         *   25. Trabajar en PlantillaFormulario.php mi plantilla para hacer formularios como churros
            
        */
            require_once '../core/201020libreriaValidacion.php'; // incluyo la libreria de validacion
            
            define("OBLIGATORIO",1);// defino e inicializo la constante a 1
            define("OPCIONAL",0);// defino e inicializo la constante a 0
            
            $FECHA_ACTUAL = date('Y/m/d'); // declaro e inicializo la variable de la fecha actual
            $FECHA_MINIMA="1900/01/01"; // declaro e inicializo la variable de la fecha maxima 
            $FECHA_MAXIMA="2200/01/01"; // declaro e inicializo la variable de la fecha minima
            
            $entradaOK=true; // declaro la variable que determinaá si esta bien la entrada de los campos
            

            $aErrores=[ //declaro e inicializo el array de errores
                'alfabeticoObligatorio' => null,
                'alfabeticoOpcional' => null,
                'alfanumericoObligatorio' => null,
                'alfanumericoOpcional' => null,
                'numericoEnteroObligatorio' => null,
                'numericoEnteroOpcional' => null,
                'numericoFloatObligatorio' => null,
                'numericoFloatOpcional' => null,
                'emailObligatorio' => null,
                'emailOpcional' => null,
                'urlObligatorio' => null,
                'urlOpcional' => null,
                'fechaPasadaObligatorio' => null,
                'fechaPasadaOpcional' => null,
                'fechaFuturaObligatorio' => null,
                'fechaFuturaOpcional' => null,
                'dniObligatorio' => null,
                'dniOpcional' => null,
                'codigoPostalObligatorio' => null,
                'codigoPostalOpcional' => null,
                'passwordObligatorio' => null,
                'passwordOpcional' => null,
                'telefonoObligatorio' => null,
                'telefonoOpcional' => null,
                'radioButton' => null,
                'checkBox' => null,
                'select' => null,
                'textAreaObligatorio' =>null,
                'textAreaOpcional' =>null
            ];
            
            $aRespuestas=[ // declaro e inicializo el array de las respuestas del formulario
                'alfabeticoObligatorio' => null,
                'alfabeticoOpcional' => null,
                'alfanumericoObligatorio' => null,
                'alfanumericoOpcional' => null,
                'numericoEnteroObligatorio' => null,
                'numericoEnteroOpcional' => null,
                'numericoFloatObligatorio' => null,
                'numericoFloatOpcional' => null,
                'emailObligatorio' => null,
                'emailOpcional' => null,
                'urlObligatorio' => null,
                'urlOpcional' => null,
                'fechaPasadaObligatorio' => null,
                'fechaPasadaOpcional' => null,
                'fechaFuturaObligatorio' => null,
                'fechaFuturaOpcional' => null,
                'dniObligatorio' => null,
                'dniOpcional' => null,
                'codigoPostalObligatorio' => null,
                'codigoPostalOpcional' => null,
                'passwordObligatorio' => null,
                'passwordOpcional' => null,
                'telefonoObligatorio' => null,
                'telefonoOpcional' => null,
                'radioButton' => null,
                'checkBox' => null,
                'select' => null,
                'textAreaObligatorio' =>null,
                'textAreaOpcional' =>null
            ];
            
            
            
            if(isset($_REQUEST["Enviar"])){ // compruebo que el usuario le ha dado a al boton de enviar y valido la entrada de todos los campos
                //ALFABETICO
                $aErrores['alfabeticoObligatorio'] = validacionFormularios::comprobarAlfabetico($_REQUEST['alfabeticoObligatorio'], 100, 1, OBLIGATORIO); 
                $aErrores['alfabeticoOpcional'] = validacionFormularios::comprobarAlfabetico($_REQUEST['alfabeticoOpcional'], 100, 1, OPCIONAL); 
                //ALFANUMERICO
                $aErrores['alfanumericoObligatorio'] = validacionFormularios::comprobarAlfanumerico($_REQUEST['alfanumericoObligatorio'], 100, 1, OBLIGATORIO); 
                $aErrores['alfanumericoOpcional'] = validacionFormularios::comprobarAlfanumerico($_REQUEST['alfanumericoOpcional'], 100, 1, OPCIONAL); 
                //NUMERICO ENTERO
                $aErrores['numericoEnteroObligatorio']= validacionFormularios::comprobarEntero($_REQUEST['numericoEnteroObligatorio'], PHP_INT_MAX, PHP_INT_MIN, OBLIGATORIO); 
                $aErrores['numericoEnteroOpcional']= validacionFormularios::comprobarEntero($_REQUEST['numericoEnteroOpcional'], PHP_INT_MAX, PHP_INT_MIN, OPCIONAL); 
                //NUMERICO FLOAT
                $aErrores['numericoFloatObligatorio']= validacionFormularios::comprobarFloat($_REQUEST['numericoFloatObligatorio'], PHP_FLOAT_MAX, -PHP_FLOAT_MIN, OBLIGATORIO); 
                $aErrores['numericoFloatOpcional']= validacionFormularios::comprobarFloat($_REQUEST['numericoFloatOpcional'], PHP_FLOAT_MAX, -PHP_FLOAT_MIN, OPCIONAL); 
                //EMAIL
                $aErrores['emailObligatorio']= validacionFormularios::validarEmail($_REQUEST['emailObligatorio'], OBLIGATORIO); 
                $aErrores['emailOpcional']= validacionFormularios::validarEmail($_REQUEST['emailOpcional'], OPCIONAL); 
                //URL
                $aErrores['urlObligatorio']= validacionFormularios::validarURL($_REQUEST['urlObligatorio'], OBLIGATORIO); 
                $aErrores['urlOpcional']= validacionFormularios::validarURL($_REQUEST['urlOpcional'], OPCIONAL); 
                //FECHA PASADA
                $aErrores['fechaPasadaObligatorio']= validacionFormularios::validarFecha($_REQUEST['fechaPasadaObligatorio'], $FECHA_ACTUAL, $FECHA_MINIMA, OBLIGATORIO); 
                $aErrores['fechaPasadaOpcional']= validacionFormularios::validarFecha($_REQUEST['fechaPasadaOpcional'], $FECHA_ACTUAL, $FECHA_MINIMA, OPCIONAL); 
                //FECHA FUTURA
                $aErrores['fechaFuturaObligatorio']= validacionFormularios::validarFecha($_REQUEST['fechaFuturaObligatorio'], $FECHA_MAXIMA, $FECHA_ACTUAL, OBLIGATORIO); 
                $aErrores['fechaFuturaOpcional']= validacionFormularios::validarFecha($_REQUEST['fechaFuturaOpcional'], $FECHA_MAXIMA, $FECHA_ACTUAL, OPCIONAL); 
                //DNI
                $aErrores['dniObligatorio']= validacionFormularios::validarDni($_REQUEST['dniObligatorio'], OBLIGATORIO); 
                $aErrores['dniOpcional']= validacionFormularios::validarDni($_REQUEST['dniOpcional'], OPCIONAL); 
                //CODIGO POSTAL
                $aErrores['codigoPostalObligatorio']= validacionFormularios::validarCp($_REQUEST['codigoPostalObligatorio'], OBLIGATORIO); 
                $aErrores['codigoPostalOpcional']= validacionFormularios::validarCp($_REQUEST['codigoPostalOpcional'], OPCIONAL); 
                // PASSWORD
                $aErrores['passwordObligatorio']= validacionFormularios::validarPassword($_REQUEST['passwordObligatorio'],8, OBLIGATORIO); 
                $aErrores['passwordOpcional']= validacionFormularios::validarPassword($_REQUEST['passwordOpcional'],8, OPCIONAL); 
                // ELEMENTO EN LISTA - RADIOBUTTON
                $aErrores['radioButton']= validacionFormularios::validarElementoEnLista($_REQUEST['radioButton'], ['radioButtonOpcion1','radioButtonOpcion2','radioButtonOpcion3']); 
                // ELEMENTO EN LISTA - CHECKBOX
                (!isset($_REQUEST['checkbox'])) ? $arrayErrores['checkbox'] = "Debe marcarse un valor" : null; 
                // ELEMENTO EN LISTA - SELECT
                $aErrores['select']= validacionFormularios::validarElementoEnLista($_REQUEST['select'], ['selectOpcion1','selectOpcion2','selectOpcion3']); 
                // TELEFONO
                $aErrores['telefonoObligatorio']= validacionFormularios::validaTelefono($_REQUEST['telefonoObligatorio'], OBLIGATORIO); 
                $aErrores['telefonoOpcional']= validacionFormularios::validaTelefono($_REQUEST['telefonoOpcional'], OPCIONAL); 
                // TEXTAREA
                $aErrores['textAreaObligatorio'] = validacionFormularios::comprobarAlfanumerico($_REQUEST['textAreaObligatorio'], 100, 1, OBLIGATORIO); 
                $aErrores['textAreaOpcional'] = validacionFormularios::comprobarAlfanumerico($_REQUEST['textAreaOpcional'], 100, 1, OPCIONAL); 
                
                
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
                //ALFABETICO
                $aRespuestas['alfabeticoObligatorio'] = $_REQUEST['alfabeticoObligatorio']; 
                $aRespuestas['alfabeticoOpcional'] = $_REQUEST['alfabeticoOpcional']; 
                //ALFANUMERICO
                $aRespuestas['alfanumericoObligatorio'] = $_REQUEST['alfanumericoObligatorio']; 
                $aRespuestas['alfanumericoOpcional'] = $_REQUEST['alfanumericoOpcional']; 
                //NUMERICO ENTERO
                $aRespuestas['numericoEnteroObligatorio'] = $_REQUEST['numericoEnteroObligatorio']; 
                $aRespuestas['numericoEnteroOpcional'] = $_REQUEST['numericoEnteroOpcional']; 
                //NUMERICO FLOAT
                $aRespuestas['numericoFloatObligatorio'] = $_REQUEST['numericoFloatObligatorio']; 
                $aRespuestas['numericoFloatOpcional'] = $_REQUEST['numericoFloatOpcional']; 
                //EMAIL
                $aRespuestas['emailObligatorio'] = $_REQUEST['emailObligatorio']; 
                $aRespuestas['emailOpcional'] = $_REQUEST['emailOpcional']; 
                //URL
                $aRespuestas['urlObligatorio'] = $_REQUEST['urlObligatorio']; 
                $aRespuestas['urlOpcional'] = $_REQUEST['urlOpcional'];
                //FECHA PASADA
                $aRespuestas['fechaPasadaObligatorio'] = $_REQUEST['fechaPasadaObligatorio']; 
                $aRespuestas['fechaPasadaOpcional'] = $_REQUEST['fechaPasadaOpcional']; 
                //FECHA FUTURA
                $aRespuestas['fechaFuturaObligatorio'] = $_REQUEST['fechaFuturaObligatorio']; 
                $aRespuestas['fechaFuturaOpcional'] = $_REQUEST['fechaFuturaOpcional']; 
                //DNI
                $aRespuestas['dniObligatorio'] = $_REQUEST['dniObligatorio']; 
                $aRespuestas['dniOpcional'] = $_REQUEST['dniOpcional']; 
                //CODIGO POSTAL
                $aRespuestas['codigoPostalObligatorio'] = $_REQUEST['codigoPostalObligatorio']; 
                $aRespuestas['codigoPostalOpcional'] = $_REQUEST['codigoPostalOpcional']; 
                // PASSWORD
                $aRespuestas['passwordObligatorio'] = $_REQUEST['passwordObligatorio']; 
                $aRespuestas['passwordOpcional'] = $_REQUEST['passwordOpcional']; 
                // ELEMENTO EN LISTA - RADIOBUTTON
                $aRespuestas['radioButton'] = $_REQUEST['radioButton']; 
                // ELEMENTO EN LISTA - SELECT
                $aRespuestas['checkBox'] = $_REQUEST['checkBox']; 
                $aRespuestas['select'] = $_REQUEST['select']; 
                // TELEFONO
                $aRespuestas['telefonoObligatorio'] = $_REQUEST['telefonoObligatorio']; 
                $aRespuestas['telefonoOpcional'] = $_REQUEST['telefonoOpcional']; 
                // TEXTAREA
                $aRespuestas['textAreaObligatorio'] = $_REQUEST['textAreaObligatorio']; 
                $aRespuestas['textAreaOpcional'] = $_REQUEST['textAreaOpcional']; 
                
                
                //TRATAMIENTO
                echo "<p>Alfabetico Obligatorio: ".$aRespuestas['alfabeticoObligatorio']."</p>";
                echo "<p>Alfabetico Opcional: ".$aRespuestas['alfabeticoOpcional']."</p>";
                echo "<p>Alfanumerico Obligatorio: ".$aRespuestas['alfanumericoObligatorio']."</p>";
                echo "<p>Alfanumerico Opcional".$aRespuestas['alfanumericoOpcional']."</p>";
                echo "<p>Numerico Entero Obligatotorio: ".$aRespuestas['numericoEnteroObligatorio']."</p>";
                echo "<p>Numerico Entero Opcional: ".$aRespuestas['numericoEnteroOpcional']."</p>";
                echo "<p>Numerico Float Oblogatorio: ".$aRespuestas['numericoFloatObligatorio']."</p>";
                echo "<p>Numerico Float Opcional: ".$aRespuestas['numericoFloatOpcional']."</p>";
                echo "<p>Email Obligatorio".$aRespuestas['emailObligatorio']."</p>";
                echo "<p>Email Opcional:".$aRespuestas['emailOpcional']."</p>";
                echo "<p>Url Obligatorio".$aRespuestas['urlObligatorio']."</p>";
                echo "<p>Url Opcional: ".$aRespuestas['urlOpcional']."</p>";
                echo "<p>Fecha pasada Obligatorio: ".$aRespuestas['fechaPasadaObligatorio']."</p>";
                echo "<p>Fecha pasada Opcional: ".$aRespuestas['fechaPasadaOpcional']."</p>";
                echo "<p>Fecha futura Obligatotio: ".$aRespuestas['fechaFuturaObligatorio']."</p>";
                echo "<p>Fecha futura Opcional: ".$aRespuestas['fechaFuturaOpcional']."</p>";
                echo "<p>Dni Obligatorio: ".$aRespuestas['dniObligatorio']."</p>";
                echo "<p>Dni Opcional: ".$aRespuestas['dniOpcional']."</p>";
                echo "<p>Codigo Postal Obligatorio: ".$aRespuestas['codigoPostalObligatorio']."</p>";
                echo "<p>Codigo Postal Opcional: ".$aRespuestas['codigoPostalOpcional']."</p>";
                echo "<p>Password Oblogatorio: ".$aRespuestas['passwordObligatorio']."</p>";
                echo "<p>Password Ocpional: ".$aRespuestas['passwordOpcional']."</p>";
                
                echo "<p> Radiobutton: ".$aRespuestas['radioButton']."</p>";
                echo "<p>Checkbox</p>";
                foreach($aRespuestas['checkBox'] as $opcion){
                    echo "<p>".$opcion."</p>";
                }
                echo "<p> Select: ".$aRespuestas['select']."</p>";
                echo "<p> Telefono Obligatorio: ".$aRespuestas['telefonoObligatorio']."</p>";
                echo "<p>Telefono Opcional: ".$aRespuestas['telefonoOpcional']."</p>";
                echo "<p>Textarea Obligatorio: ".$aRespuestas['textAreaObligatorio']."</p>";
                echo "<p>Textarea Opcional: ".$aRespuestas['textAreaOpcional']."</p>";
                
             }else{ // si hay algun campo de la entrada que este mal muestro el formulario hasta que introduzca bien los campos
        ?> 
        
        <form name="formulario" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <!-- ALFABETICO -->
                <!-- Obligatorio -->
                <div>
                    <label for="alfabeticoObligatorio">Alfabético Obligatorio : </label>
                    <input style="background-color:#81BEF7;" type="text" id="alfabeticoObligatorio" name="alfabeticoObligatorio" placeholder="Alfabético Obligatorio" value="<?php 
                        echo (isset($_REQUEST["alfabeticoObligatorio"]))? $_REQUEST['alfabeticoObligatorio'] : null;
                    ?>">
                    <?php
                        echo(!is_null($aErrores['alfabeticoObligatorio'])) ? "<span style='color:#FF0000'>".$aErrores["alfabeticoObligatorio"]."</span>" : null;     
                    ?>
                </div>
                <!-- Opcional -->
                <div>
                    <label for="alfabeticoOpcional">Alfabético Opcional : </label>
                    <input type="text" id="alfabeticoOpcional" name="alfabeticoOpcional" placeholder="Alfabético Opcional" value="<?php 
                        echo (isset($_REQUEST["alfabeticoOpcional"]))? $_REQUEST['alfabeticoOpcional'] : null;
                    ?>">
                    <?php
                        echo(!is_null($aErrores['alfabeticoOpcional'])) ? "<span style='color:#FF0000'>".$aErrores["alfabeticoOpcional"]."</span>" : null;     
                    ?>
                </div>
            <!-- ALFANUMERICO -->
                <!-- Obligatorio -->
                <div>
                    <label for="alfanumericoObligatorio">Alfanumérico Obligatorio : </label>
                    <input style="background-color:#81BEF7;" type="text" id="alfanumericoObligatorio" name="alfanumericoObligatorio" placeholder="Alfanumérico Obligatorio" value="<?php 
                            echo (isset($_REQUEST["alfanumericoObligatorio"]))? $_REQUEST['alfanumericoObligatorio'] : null;
                    ?>">
                    <?php
                        echo(!is_null($aErrores['alfanumericoObligatorio'])) ? "<span style='color:#FF0000'>".$aErrores["alfanumericoObligatorio"]."</span>" : null;     
                    ?>
                </div>
                <!-- Opcional -->
                <div>
                    <label for="alfanumericoOpcional">Alfanumérico Opcional : </label>
                    <input type="text" id="alfanumericoOpcional" name="alfanumericoOpcional" placeholder="Alfanumérico Opcional" value="<?php 
                        echo (isset($_REQUEST["alfanumericoOpcional"]))? $_REQUEST['alfanumericoOpcional'] : null;
                    ?>">
                    <?php
                        echo(!is_null($aErrores['alfanumericoOpcional'])) ? "<span style='color:#FF0000'>".$aErrores["alfanumericoOpcional"]."</span>" : null;     
                    ?>
                </div>
            <!-- NUMERICO ENTERO -->
                <!-- Obligatorio -->
                <div>
                    <label for="numericoEnteroObligatorio">Numerico Entero Obligatorio : </label>
                    <input style="background-color:#81BEF7;" type="text"  id="numericoEnteroObligatorio" name="numericoEnteroObligatorio" placeholder="Numerico Entero Obligatorio" value="<?php 
                            echo (isset($_REQUEST["numericoEnteroObligatorio"]))? $_REQUEST['numericoEnteroObligatorio'] : null;
                    ?>">
                    <?php
                        echo(!is_null($aErrores['numericoEnteroObligatorio'])) ? "<span style='color:#FF0000'>".$aErrores["numericoEnteroObligatorio"]."</span>" : null;     
                    ?>
                </div>
                <!-- Opcional -->
                <div>
                    <label for="numericoEnteroOpcional">Numerico Entero Opcional : </label>
                    <input type="text" id="numericoEnteroOpcional" name="numericoEnteroOpcional" placeholder="Numerico Entero Opcional" value="<?php 
                        echo (isset($_REQUEST["numericoEnteroOpcional"]))? $_REQUEST['numericoEnteroOpcional'] : null;
                    ?>">
                    <?php
                        echo(!is_null($aErrores['numericoEnteroOpcional'])) ? "<span style='color:#FF0000'>".$aErrores["numericoEnteroOpcional"]."</span>" : null;     
                    ?>
                </div>
            <!-- NUMERICO FLOAT -->    
                <!-- Obligatorio -->
                <div>
                    <label for="numericoFloatObligatorio">Numerico Float Obligatorio : </label>
                    <input style="background-color:#81BEF7;" type="text" id="numericoFloatObligatorio" name="numericoFloatObligatorio" placeholder="Numerico Float Obligatorio" value="<?php 
                            echo (isset($_REQUEST["numericoFloatObligatorio"]))? $_REQUEST['numericoFloatObligatorio'] : null;
                    ?>">
                    <?php
                        echo(!is_null($aErrores['numericoFloatObligatorio'])) ? "<span style='color:#FF0000'>".$aErrores["numericoFloatObligatorio"]."</span>" : null;     
                    ?>
                </div>
                <!-- Opcional -->
                <div>
                    <label for="numericoFloatOpcional">Numerico Float Opcional : </label>
                    <input type="text" id="numericoFloatOpcional" name="numericoFloatOpcional" placeholder="Numerico Float Opcional" value="<?php 
                        echo (isset($_REQUEST["numericoFloatOpcional"]))? $_REQUEST['numericoFloatOpcional'] : null;
                    ?>">
                    <?php
                        echo(!is_null($aErrores['numericoFloatOpcional'])) ? "<span style='color:#FF0000'>".$aErrores["numericoFloatOpcional"]."</span>" : null;     
                    ?>
                </div>
            <!-- EMAIL -->    
                <!-- Obligatorio -->
                <div>
                    <label for="emailObligatorio">Email Obligatorio : </label>
                    <input style="background-color:#81BEF7;" type="email" id="emailObligatorio" name="emailObligatorio" placeholder="Email Obligatorio" value="<?php 
                            echo (isset($_REQUEST["emailObligatorio"]))? $_REQUEST['emailObligatorio'] : null;
                    ?>">
                    <?php
                        echo(!is_null($aErrores['emailObligatorio'])) ? "<span style='color:#FF0000'>".$aErrores["emailObligatorio"]."</span>" : null;     
                    ?>
                </div>
                <!-- Opcional -->
                <div>
                    <label for="emailOpcional">Email Opcional : </label>
                    <input type="email" id="emailOpcional" name="emailOpcional" placeholder="Email Opcional" value="<?php 
                        echo (isset($_REQUEST["emailOpcional"]))? $_REQUEST['emailOpcional'] : null; 
                    ?>">
                    <?php
                        echo(!is_null($aErrores['emailOpcional'])) ? "<span style='color:#FF0000'>".$aErrores["emailOpcional"]."</span>" : null;   
                    ?>
                </div>
            <!-- URL -->    
                <!-- Obligatorio -->
                <div>
                    <label for="urlObligatorio">URL Obligatorio : </label>
                    <input style="background-color:#81BEF7;" type="text" id="urlObligatorio" name="urlObligatorio" placeholder="URL Obligatorio" value="<?php 
                            echo (isset($_REQUEST["urlObligatorio"]))? $_REQUEST['urlObligatorio'] : null;
                    ?>">
                    <?php
                        echo(!is_null($aErrores['urlObligatorio'])) ? "<span style='color:#FF0000'>".$aErrores["urlObligatorio"]."</span>" : null;     
                    ?>
                </div>
                <!-- Opcional -->
                <div>
                    <label for="urlOpcional">URL Opcional : </label>
                    <input type="text" id="urlOpcional" name="urlOpcional" placeholder="URL Opcional" value="<?php 
                        echo (isset($_REQUEST["urlOpcional"]))? $_REQUEST['urlOpcional'] : null; 
                    ?>">
                    <?php
                        echo(!is_null($aErrores['urlOpcional'])) ? "<span style='color:#FF0000'>".$aErrores["urlOpcional"]."</span>" : null;   
                    ?>
                </div>
            <!-- FECHA PASADA -->    
                <!-- Obligatorio -->
                <div>
                    <label for="fechaPasadaObligatorio">Fecha Pasada Obligatorio : </label>
                    <input style="background-color:#81BEF7;" type="date" max="<?php echo $FECHA_ACTUAL;?>" min="<?php echo $FECHA_MINIMA;?>" id="fechaPasadaObligatorio" name="fechaPasadaObligatorio" placeholder="Fecha pasada Obligatorio" value="<?php 
                            echo (isset($_REQUEST["fechaPasadaObligatorio"]))? $_REQUEST['fechaPasadaObligatorio'] : null;
                    ?>">
                    <?php
                        echo(!is_null($aErrores['fechaPasadaObligatorio'])) ? "<span style='color:#FF0000'>".$aErrores["fechaPasadaObligatorio"]."</span>" : null;     
                    ?>
                </div>
                <!-- Opcional -->
                <div>
                    <label for="fechaPasadaOpcional">Fecha Pasada Opcional : </label>
                    <input type="date" max="<?php echo $FECHA_ACTUAL;?>" min="<?php echo $FECHA_MINIMA;?>" id="fechaPasadaOpcional" name="fechaPasadaOpcional" placeholder="Fecha Pasada Opcional" value="<?php 
                        echo (isset($_REQUEST["fechaPasadaOpcional"]))? $_REQUEST['fechaPasadaOpcional'] : null; 
                    ?>">
                    <?php
                        echo(!is_null($aErrores['fechaPasadaOpcional'])) ? "<span style='color:#FF0000'>".$aErrores["fechaPasadaOpcional"]."</span>" : null;   
                    ?>
                </div>
            <!-- FECHA FUTURA -->    
                <!-- Obligatorio -->
                <div>
                    <label for="fechaFuturaObligatorio">Fecha Futura Obligatorio : </label>
                    <input style="background-color:#81BEF7;" type="date" max="<?php echo $FECHA_MAXIMA;?>" min="<?php echo $FECHA_ACTUAL;?>" id="fechaFuturaObligatorio" name="fechaFuturaObligatorio" placeholder="Fecha Futura Obligatorio" value="<?php 
                            echo (isset($_REQUEST["fechaFuturaObligatorio"]))? $_REQUEST['fechaFuturaObligatorio'] : null;
                    ?>">
                    <?php
                        echo(!is_null($aErrores['fechaFuturaObligatorio'])) ? "<span style='color:#FF0000'>".$aErrores["fechaFuturaObligatorio"]."</span>" : null;     
                    ?>
                </div>
                <!-- Opcional -->
                <div>
                    <label for="fechaFuturaOpcional">Fecha Futura Opcional : </label>
                    <input type="date" max="<?php echo $FECHA_MAXIMA;?>" min="<?php echo $FECHA_ACTUAL;?>" id="fechaFuturaOpcional" name="fechaFuturaOpcional" placeholder="Fecha Futura Opcional" value="<?php 
                        echo (isset($_REQUEST["fechaFuturaOpcional"]))? $_REQUEST['fechaFuturaOpcional'] : null; 
                    ?>">
                    <?php
                        echo(!is_null($aErrores['fechaFuturaOpcional'])) ? "<span style='color:#FF0000'>".$aErrores["fechaFuturaOpcional"]."</span>" : null;   
                    ?>
                </div>
            <!-- DNI -->    
                <!-- Obligatorio -->
                <div>
                    <label for="dniObligatorio">DNI Obligatorio : </label>
                    <input style="background-color:#81BEF7;" type="text" id="dniObligatorio" name="dniObligatorio" placeholder="DNI Obligatorio" value="<?php 
                            echo (isset($_REQUEST["dniObligatorio"]))? $_REQUEST['dniObligatorio'] : null;
                    ?>">
                    <?php
                        echo(!is_null($aErrores['dniObligatorio'])) ? "<span style='color:#FF0000'>".$aErrores["dniObligatorio"]."</span>" : null;     
                    ?>
                </div>
                <!-- Opcional -->
                <div>
                    <label for="dniOpcional">DNI Opcional : </label>
                    <input type="text" id="dniOpcional" name="dniOpcional" placeholder="DNI Opcional" value="<?php 
                        echo (isset($_REQUEST["dniOpcional"]))? $_REQUEST['dniOpcional'] : null; 
                    ?>">
                    <?php
                        echo(!is_null($aErrores['dniOpcional'])) ? "<span style='color:#FF0000'>".$aErrores["dniOpcional"]."</span>" : null;   
                    ?>
                </div>
            <!-- CODIGO POSTAL -->    
                <!-- Obligatorio -->
                <div>
                    <label for="codigoPostalObligatorio">Codigo Postal Obligatorio : </label>
                    <input style="background-color:#81BEF7;" type="text" id="codigoPostalObligatorio" name="codigoPostalObligatorio" placeholder="Codigo Postal Obligatorio" value="<?php 
                            echo (isset($_REQUEST["codigoPostalObligatorio"]))? $_REQUEST['codigoPostalObligatorio'] : null;
                    ?>">
                    <?php
                        echo(!is_null($aErrores['codigoPostalObligatorio'])) ? "<span style='color:#FF0000'>".$aErrores["codigoPostalObligatorio"]."</span>" : null;     
                    ?>
                </div>
                <!-- Opcional -->
                <div>
                    <label for="codigoPostalOpcional">Codigo Postal Opcional : </label>
                    <input type="text" id="codigoPostalOpcional" name="codigoPostalOpcional" placeholder="Codigo Postal Opcional" value="<?php 
                        echo (isset($_REQUEST["codigoPostalOpcional"]))? $_REQUEST['codigoPostalOpcional'] : null; 
                    ?>">
                    <?php
                        echo(!is_null($aErrores['codigoPostalOpcional'])) ? "<span style='color:#FF0000'>".$aErrores["codigoPostalOpcional"]."</span>" : null;   
                    ?>
                </div>
            <!-- PASSWORD -->    
                <!-- Obligatorio -->
                <div>
                    <label for="passwordObligatorio">Password Obligatorio : </label>
                    <input style="background-color:#81BEF7;" type="password" id="passwordObligatorio" name="passwordObligatorio" placeholder="Password Obligatorio" value="<?php 
                            echo (isset($_REQUEST["passwordObligatorio"]))? $_REQUEST['passwordObligatorio'] : null;
                    ?>">
                    <?php
                        echo(!is_null($aErrores['passwordObligatorio'])) ? "<span style='color:#FF0000'>".$aErrores["passwordObligatorio"]."</span>" : null;     
                    ?>
                </div>
                <!-- Opcional -->
                <div>
                    <label for="passwordOpcional">Password Opcional : </label>
                    <input type="password" id="passwordOpcional" name="passwordOpcional" placeholder="Password Opcional" value="<?php 
                        echo (isset($_REQUEST["passwordOpcional"]))? $_REQUEST['passwordOpcional'] : null;
                    ?>">
                    <?php
                        echo(!is_null($aErrores['passwordOpcional'])) ? "<span style='color:#FF0000'>".$aErrores["passwordOpcional"]."</span>" : null;   
                    ?>
                </div>
            <!-- ELEMENTO EN LISTA - RADIOBUTTON -->
                <!-- Obligatorio -->
                <div>
                    <p>RADIOBUTTON :</p>
                    <input type="radio" id="radioButtonOpcion1" name="radioButton" value="radioButtonOpcion1" <?php echo (isset($_REQUEST["radioButton"]) && $_REQUEST["radioButton"]=="radioButtonOpcion1")? 'checked' : null; ?> >
                    <label for="radioButtonOpcion1">Opcion 1</label><br>
                    <input type="radio" id="radioButtonOpcion2" name="radioButton" value="radioButtonOpcion2" <?php echo (isset($_REQUEST["radioButton"]) && $_REQUEST["radioButton"]=="radioButtonOpcion2")? 'checked' : null; ?> >
                    <label for="radioButtonOpcion2">Opcion 2</label><br>
                    <input type="radio" id="radioButtonOpcion3" name="radioButton" value="radioButtonOpcion3" <?php echo (isset($_REQUEST["radioButton"]) && $_REQUEST["radioButton"]=="radioButtonOpcion3")? 'checked' : null; ?> >
                    <label for="radioButtonOpcion3">Opcion 3</label>
                    <?php
                        echo(!is_null($aErrores['radioButton'])) ? "<span style='color:#FF0000'>".$aErrores["radioButton"]."</span>" : null;   
                    ?>
                </div>
                
            <!-- CHECKBOX -->    
                <!-- Opcional -->
                <div>
                    <p>CHECKBOX</p>
                    <input type="checkbox" id="checkBoxOpcion1" name="checkBox[checkBoxOpcion1]" value="checkBoxOpcion1" <?php echo (isset($_REQUEST["checkBox"]['checkBoxOpcion1']))? 'checked' : null; ?> >
                    <label for="checkBoxOpcion1"> Opcion 1</label><br>
                    <input type="checkbox" id="checkBoxOpcion2" name="checkBox[checkBoxOpcion2]" value="checkBoxOpcion2" <?php echo (isset($_REQUEST["checkBox"]['checkBoxOpcion2']))? 'checked' : null; ?> >
                    <label for="checkBoxOpcion2"> Opcion 2</label><br>
                    <input type="checkbox" id="checkBoxOpcion3" name="checkBox[checkBoxOpcion3]" value="checkBoxOpcion3" <?php echo (isset($_REQUEST["checkBox"]['checkBoxOpcion3']))? 'checked' : null; ?> >
                    <label for="checkBoxOpcion3"> Opcion 3</label><br>
                    <?php
                        echo(!is_null($aErrores['checkBox'])) ? "<span style='color:#FF0000'>".$aErrores["checkBox"]."</span>" : null;   
                    ?>
                </div>
            <!-- ELEMENTO EN LISTA - SELECT -->    
                <!-- Opcional -->
                <div>
                    <p>SELECT</p>
                    <select name="select">
                        <option value="selectOpcion1" <?php echo (isset($_REQUEST["select"]))=="selectOpcion1"? 'selected' : null; ?> >Opcion 1</option> 
                        <option value="selectOpcion2" <?php echo (isset($_REQUEST["select"]))=="selectOpcion2"? 'selected' : null; ?> >Opcion 2</option>
                        <option value="selectOpcion3" <?php echo (isset($_REQUEST["select"]))=="selectOpcion3"? 'selected' : null; ?> >Opcion 3</option>
                    </select>
                    <?php
                        echo(!is_null($aErrores['select'])) ? "<span style='color:#FF0000'>".$aErrores["select"]."</span>" : null;   
                    ?>
                </div>
            <!-- TELEFONO -->    
                <!-- Obligatorio -->
                <div>
                    <label for="telefonoObligatorio">Telefono Obligatorio : </label>
                    <input style="background-color:#81BEF7;" type="text" id="telefonoObligatorio" name="telefonoObligatorio" placeholder="Telefono Obligatorio" value="<?php 
                            echo (isset($_REQUEST["telefonoObligatorio"]))? $_REQUEST['telefonoObligatorio'] : null;
                    ?>">
                    <?php
                        echo(!is_null($aErrores['telefonoObligatorio'])) ? "<span style='color:#FF0000'>".$aErrores["telefonoObligatorio"]."</span>" : null;     
                    ?>
                </div>
                <!-- Opcional -->
                <div>
                    <label for="telefonoOpcional">Telefono Opcional : </label>
                    <input type="text" id="telefonoOpcional" name="telefonoOpcional" placeholder="Telefono Opcional" value="<?php 
                        echo (isset($_REQUEST["telefonoOpcional"]))? $_REQUEST['telefonoOpcional'] : null; 
                    ?>">
                    <?php
                        echo(!is_null($aErrores['telefonoOpcional'])) ? "<span style='color:#FF0000'>".$aErrores["telefonoOpcional"]."</span>" : null;   
                    ?>
                </div>
            
            <!-- TEAXTAREA -->    
                <!-- Obligatorio -->
                <div>
                    <label for="textAreaObligatorio">Textarea Obligatorio : </label>
                    <textarea id="textAreaObligatorio" name="textAreaObligatorio" rows="10" cols="50"> <?php 
                            echo (isset($_REQUEST["textAreaObligatorio"]))? $_REQUEST['textAreaObligatorio'] : null;
                    ?></textarea>
                    <?php
                        echo(!is_null($aErrores['textAreaObligatorio'])) ? "<span style='color:#FF0000'>".$aErrores["textAreaObligatorio"]."</span>" : null;     
                    ?>
                </div>
                <!-- Opcional -->
                <div>
                    <label for="textAreaOpcional">Textarea Opcional : </label>
                    <textarea id="textAreaOpcional" name="textAreaOpcional" rows="10" cols="50"><?php 
                            echo (isset($_REQUEST["textAreaOpcional"]))? $_REQUEST['textAreaOpcional'] : null;
                    ?></textarea>
                    <?php
                        echo(!is_null($aErrores['textAreaOpcional'])) ? "<span style='color:#FF0000'>".$aErrores["textAreaOpcional"]."</span>" : null;     
                    ?>
                </div>
            <!-- ENVIAR --> 
                <div>
                    <input id="enviar" type="submit" value="Enviar" name="Enviar">
                </div>
        </form>
        
        <?php
            }
        ?>
           
    </body>
</html>