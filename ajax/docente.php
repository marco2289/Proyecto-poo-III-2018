<?php
switch($_GET["accion"]){
                case 1:
                    include("../class/class-docente.php");
                    echo Docente::obtenerDocentes();
                break;
                case 2:
                    include("../class/class-docente.php");   
                   $l = new Docente($_POST["nombre"], $_POST["num"],$_POST["pass"]);
                   echo $l->guardarDocentes();
                   
                break;
}
?>