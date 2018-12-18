<?php
switch($_GET["accion"]){
                case 1:
                    include("../class/class-coordinador.php");
                    echo Coordinador::obtenerCoordinador();
                break;
                case 2:
                    include("../class/class-coordinador.php");   
                   $l = new Coordinador($_POST["nombre"], $_POST["num"],$_POST["pass"],$_POST["facultad"], $_POST["carrera"]);
                   echo $l->guardarCoordinador();
                   
                break;
}
?>
