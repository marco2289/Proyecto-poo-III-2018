<?php
    include("../class/clase-persona.php");
    $p = new Persona($_GET["nombre"],$_GET["apellido"],$_GET["No_cuenta"],$_GET["password"],$_GET["jerarquia"],$_GET["carrera"],$_GET["centro"],$_GET["categoria"];
                  
    echo $p->Registrar_Persona();
?>