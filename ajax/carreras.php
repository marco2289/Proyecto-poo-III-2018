<?php
    switch($_GET["accion"]){
        case 1:
            include("../class/class-carreras.php");
            echo Carrera::obtenerCarrera();
            
        break;
        case 2:
           include("../class/class-carreras.php");   
           $l = new Carrera($_POST["carrera"],$_POST["codigo"], $_POST["facultad"]);
           echo $l->guardarCarrera();
        
        break;

    
}
?>