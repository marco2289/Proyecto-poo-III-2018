<?php
session_start();
    $archivo = fopen("../data/docentes.json","r");
    while(($linea=fgets($archivo))){
        $registro=json_decode($linea,true);
        if(
            $_POST["No_Cuenta"]==$registro["No_Cuenta"]&&
            $_POST["password"]==$registro["password"] && $registro["jerarquia"]=="Catedratico"
        ){
            $registro["estatus"]="1";
            $registro["mensaje"]="Acceso autorizado";
            $_SESSION["No_Cuenta"]=$_POST["No_Cuenta"];
            $_SESSION["jerarquia"]=$registro["jerarquia"];
            echo json_encode($registro);
            exit;
        }
    }
    $registro = array();
    $registro["estatus"] = "0";
    $registro["mensaje"] = "Credendiales Invalidas, Por Favor Introduzca las nuevas Credenciales y Asegurese de que esten Correctas";
    echo json_encode($registro);
?>