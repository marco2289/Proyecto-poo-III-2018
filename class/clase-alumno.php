<?php
include("clase-persona.php");
class Alumno extends Persona{
    public function __construct($nombre=null,$apellido=null,$direccion=null,$ID=null,$telefono=null,$edad=null,$correo=null,$password=null,$sexo=null,$estado_civil=null,$fecha_ingreso=null,$jerarquia=null,$No_Cuenta=null,$centro=null,$carrera=null){
        parent::__construct($nombre,$apellido,$direccion,$ID,$telefono,$edad,$correo,$password,$sexo,$estado_civil,$fecha_ingreso,$jerarquia,$No_Cuenta,$centro,$carrera);
    }

    public function Habilitar_Alumno(){
        $archivo = fopen("../data/estudiantes.json","a+");
        $arreglo = array();
        $arreglo["nombre"]=$this->nombre;
        $arreglo["apellido"]=$this->apellido;
        $arreglo["No_Cuenta"]=$this->No_Cuenta;
        $arreglo["password"]=$this->password;
        $arreglo["jerarquia"]=$this->jerarquia;
        $arreglo["centro"]=$this->centro;
        $arreglo["carrera"]=$this->carrera;
        fwrite($archivo, json_encode($arreglo) . "\n");
        fclose($archivo);
        return json_encode($arreglo);
    }
}

?>