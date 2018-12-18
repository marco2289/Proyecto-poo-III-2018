<?php
    include("../class/clase-aula.php");
    $a = new Aula($_GET["ID_aula"],$_GET["numeroAula"],$_GET["ID_edificio"],$_GET["nombreEdificio"],$_GET["centroRegional"]);
    echo $a->Registrar_Aula();
?>