<?php
switch($_GET["accion"]){
                case 1:
                    include("../class/class-secciones.php");
                    echo Seccion::obtenerSecciones($_GET["facultad"],$_GET["codCarrera"],$_GET["codClase"]);
                break;
                case 2:
                    include("../class/class-secciones.php");   
                   $l = new Seccion($_POST["codCarrera"],$_POST["codClase"], $_POST["seccion"],$_POST["aula"], $_POST["cupos"], $_POST["inicio"],$_POST["final"],$_POST["dias"], $_POST["edificio"],$_POST["docente"]);
                   echo $l->guardarSecciones();
                break;
}
?>