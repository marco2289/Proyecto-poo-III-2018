<?php
switch($_GET["accion"]){
                case 1:
                    include("../class/class-alumnos.php");
                    echo Alumno::obtenerAlumnos();
                break;
                case 2:
                    include("../class/class-alumnos.php");   
                   $l = new Alumno($_POST["nombre"], $_POST["apellido"],$_POST["cuenta"],$_POST["ID"], $_POST["pass"],$_POST["correo"],$_POST["facultad"], $_POST["carrera"],$_POST["centro"]);
                   echo $l->guardarAlumnos();
                   
                break;
}
?>