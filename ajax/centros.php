<?php
switch($_GET["accion"]){
                case 1:
                    include("../class/class-centros.php");
                    echo Centro::obtenerCentros();
                break;
                case 2:
                    include("../class/class-centros.php");   
                   $l = new Centro($_POST["centro"], $_POST["lugar"]);
                   echo $l->guardarCentro();
                   
                break;
}
?>


   
