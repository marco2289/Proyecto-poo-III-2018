<?php
    switch($_GET["accion"]){
        case 1:
            include("../class/class-carreras.php");
            echo Carrera::obtenerCarrera2();
            
        break;
       
}
?>