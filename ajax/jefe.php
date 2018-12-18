<?php
switch($_GET["accion"]){
                case 1:
                    include("../class/class-jefe.php");
                    echo Jefe::obtenerJefes();
                break;
                case 2:
                    include("../class/class-jefe.php");   
                   $l = new Jefe($_POST["nombre"], $_POST["num"],$_POST["pass"],$_POST["facultad"]);
                   echo $l->guardarJefes();
                   
                break;
}
?>
