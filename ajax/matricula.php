<?php
    switch($_GET["accion"]){
        case 1:
        if(isset($_POST)){
            $respuesta = array();
            $archivo = fopen("../data/matricula/".$_POST["facultad"]."/".$_POST["codCarrera"]."/".$_POST["cuenta"].".json", "a+");
                    
            //obtener datos de la seccion/////////////
                    $archivoSeccion = fopen("../data/carreras/".$_POST["facultad"]."/asignaturas/secciones/".$_POST["codCarrera"]."-".$_POST["codClase"].".json","r");   
                    while(($linea = fgets($archivoSeccion))){
                        $registroSeccion = json_decode($linea,true);
                        if($registroSeccion["seccion"] == $_POST["seccion"]){
                            //Obtener datos
                            $registro["codCarrera"] =$registroSeccion["codCarrera"];
                            $registro["codClase"] =$registroSeccion["codClase"];
                            $registro["uv"] =$registroSeccion["UV"];
                            $registro["clase"] =$registroSeccion["clase"];
                            $registro["seccion"] =$registroSeccion["seccion"];
                            $registro["inicio"] =$registroSeccion["inicio"];
                            $registro["final"] =$registroSeccion["final"];
                            $registro["dias"] =$registroSeccion["dias"];
                            $registro["edificio"] =$registroSeccion["edificio"];
                            $registro["aula"] =$registroSeccion["aula"]; 

                            break;
                        }
                    }
                    fclose($archivoSeccion);

            fwrite($archivo, json_encode($registro)."\n");
            fclose($archivo);
           
           
            $respuesta = $registro;
            $respuesta["num"] = 1;
            echo json_encode($respuesta);          
        }
        else{
            echo '{"error":"1"}';
        } 
            break;

        case 2:
        
           //obtener datos de la carrera
            $archivoCarrera = fopen("../data/carreras/".$_GET["facultad"]."/carreras.json","r");   
            while(($linea = fgets($archivoCarrera))){
                $registroCarrera = json_decode($linea,true);
                if($registroCarrera["carrera"] == $_GET["carrera"]){
                    //Obtener datos
                    $registro["codigo"] = $registroCarrera["codigo"];
                    
                    break;
                }
            }
            fclose($archivoCarrera);

            $archivo = fopen("../data/matricula/".$_GET["facultad"]."/".$registro["codigo"]."/".$_GET["cuenta"].".json", "r");
            $registros = array();
            while(($linea=fgets($archivo))){
                $registros[] = json_decode($linea, true);
            }   
            echo json_encode($registros);

        break;
    }
    
?>