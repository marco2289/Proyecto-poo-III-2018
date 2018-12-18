<?php
    include("../class/class-facultades.php");
    //Para llamar a un metodo o atributo estatico se utiliza cuatro puntos
    echo Facultad::obtenerFacultades();
    //Facultad es el nombre de la clase interna y obtenerFacultades es la funcion
?>