<?php
    switch($_GET["accion"]){
                case 1:
                   /* include("../class/class-secciones.php");
                    echo Seccion::obtenerSecciones();*/
                    session_start(); //Tiene que ser la primera funcion.
                        if(isset($_POST["numero"])){
                            $archivo = fopen("../data/empleados/jefes.json","r");
                            while(($linea=fgets($archivo))){
                                $registroUsuario = json_decode($linea,true);
                                if (
                                    $_POST["numero"]==$registroUsuario["num"] && 
                                    $_POST["password"]==$registroUsuario["pass"]
                                ){
                                    $registroUsuario["estatus"] = "1"; //Acceso exitoso
                                    $registroUsuario["mensaje"] = "Acceso autorizado";
                                    $_SESSION["numEmpleado"] = $registroUsuario["num"];
                                    $_SESSION["nombre"] = $registroUsuario["nombre"];
                                    $_SESSION["facultad"] = $registroUsuario["facultad"];
                                
                                echo json_encode($registroUsuario);
                                    exit();
                                }
                            }
                            //No encontro el registro
                            $registroUsuario = array();
                            $registroUsuario["estatus"] = "0"; //Acceso no autorizado
                            $registroUsuario["mensaje"] = "Acceso no autorizado";
                            echo json_encode($registroUsuario);
                        }
                break;
                case 2: //coordinadores
                session_start(); //Tiene que ser la primera funcion.
                        if(isset($_POST["numero"])){
                            $archivo = fopen("../data/empleados/coordinadores.json","r");
                            while(($linea=fgets($archivo))){
                                $registroUsuario = json_decode($linea,true);
                                if (
                                    $_POST["numero"]==$registroUsuario["num"] && 
                                    $_POST["password"]==$registroUsuario["pass"]
                                ){
                                    $registroUsuario["estatus"] = "1"; //Acceso exitoso
                                    $registroUsuario["mensaje"] = "Acceso autorizado";
                                    $_SESSION["numEmpleado"] = $registroUsuario["num"];
                                    $_SESSION["nombre"] = $registroUsuario["nombre"];
                                    $_SESSION["carrera"] = $registroUsuario["carrera"];
                                
                                echo json_encode($registroUsuario);
                                    exit();
                                }
                            }
                            //No encontro el registro
                            $registroUsuario = array();
                            $registroUsuario["estatus"] = "0"; //Acceso no autorizado
                            $registroUsuario["mensaje"] = "Acceso no autorizado";
                            echo json_encode($registroUsuario);
                        }
                        
                break;

                case 3: //docentes
                session_start(); //Tiene que ser la primera funcion.
                        if(isset($_POST["numero"])){
                            $archivo = fopen("../data/empleados/docentes.json","r");
                            while(($linea=fgets($archivo))){
                                $registroUsuario = json_decode($linea,true);
                                if (
                                    $_POST["numero"]==$registroUsuario["num"] && 
                                    $_POST["password"]==$registroUsuario["pass"]
                                ){
                                    $registroUsuario["estatus"] = "1"; //Acceso exitoso
                                    $registroUsuario["mensaje"] = "Acceso autorizado";
                                    $_SESSION["numEmpleado"] = $registroUsuario["num"];
                                    $_SESSION["nombre"] = $registroUsuario["nombre"];
                                
                                echo json_encode($registroUsuario);
                                    exit();
                                }
                            }
                            //No encontro el registro
                            $registroUsuario = array();
                            $registroUsuario["estatus"] = "0"; //Acceso no autorizado
                            $registroUsuario["mensaje"] = "Acceso no autorizado";
                            echo json_encode($registroUsuario);
                        }
             break;
    }
?>