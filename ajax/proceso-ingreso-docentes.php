<?php
    include("../class/clase-docente.php");
    $d = new Docencia($_GET["nombre"],$_GET["apellido"],$_GET["direccion"],$_GET["ID"],$_GET["telefono"],$_GET["edad"],$_GET["email"],$_GET["password"],
                    $_GET["genero"],$_GET["estado"],$_GET["fecha"],$_GET["jerarquia"],$_GET["No_Cuenta"]);
    echo $d->Habilitar_Docente();
?>