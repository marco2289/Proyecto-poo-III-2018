<?php
    class Persona{
        protected $nombre;
        protected $apellido;
        protected $direccion;
        protected $telefono;
        protected $edad;
        protected $correo;
        protected $password;
        protected $sexo;
        protected $estado_civil;
        protected $fecha_ingreso;
        protected $jerarquia;
        protected $No_Cuenta;
        protected $centro;
        protected $carrera;

        public function __construct($nombre=null,$apellido=null,$direccion=null,$ID=null,$telefono=null,$edad=null,$correo=null,$password=null,$sexo=null,$estado_civil=null,$fecha_ingreso=null,$jerarquia=null,$No_Cuenta=null,$centro=null,$carrera=null){
            $this->nombre=$nombre;
            $this->apellido=$apellido;
            $this->direccion=$direccion;
            $this->ID=$ID;
            $this->telefono=$telefono;
            $this->edad=$edad;
            $this->correo=$correo;
            $this->password=$password;
            $this->sexo=$sexo;
            $this->estado_civil=$estado_civil;
            $this->fecha_ingreso=$fecha_ingreso;
            $this->jerarquia=$jerarquia;
            $this->No_Cuenta=$No_Cuenta;
            $this->centro=$centro;
            $this->carrera=$carrera;

            
        }
        public function getNombre(){
            return $this->nombre;
        }
        public function setNombre($nombre){
            $this->nombre = $nombre;
        }
        public function getApellido(){
            return $this->apellido;
        }
        public function setApellido($apellido){
            $this->apellido = $apellido;
        }
        public function getDireccion(){
            return $this->direccion;
        }
        public function setDireccion($direccion){
            $this->direccion = $direccion;
        }
        public function getTelefono(){
            return $this->telefono;
        }
        public function setTelefono($telefono){
            $this->telefono = $telefono;
        }
        public function getEdad(){
            return $this->edad;
        }
        public function setEdad($edad){
            $this->edad = $edad;
        }
        public function getCorreo(){
            return $this->correo;
        }
        public function setCorreo($correo){
            $this->correo = $correo;
        }
        public function getPassword(){
            return $this->password;
        }
        public function setPassword($password){
            $this->password = $password;
        }
        public function getSexo(){
            return $this->sexo;
        }
        public function setSexo($sexo){
            $this->sexo = $sexo;
        }
        public function getEstado_Civil(){
            return $this->estado_civil;
        }
        public function setEstado_Civil($estado_civil){
            $this->estado_civil = $estado_civil;
        }
        public function getFecha_Ingreso(){
            return $this->fecha_ingreso;
        }
        public function setFecha_Ingreso($fecha_ingreso){
            $this->fecha_ingreso = $fecha_ingreso;
        }
        public function getjerarquia(){
            return $this->jerarquia;
        }
        public function setjerarquia($jerarquia){
            $this->jerarquia = $jerarquia;
        }
        public function getObtenerkey(){
            return $this->No_Cuenta;
        }
        public function setObtenerkey($No_Cuenta){
            $this->No_Cuenta=$No_Cuenta;
        }   
        public function getID(){
            return $this->ID;
        }
        public function setID($ID){
            $this->No_Cuenta=$ID;
        }  
        public function getcentro(){
            return $this->centro;
        }
        public function setcentro($centro){
            $this->centro=$centro;
        }  
        public function getcarrera(){
            return $this->carrera;
        }
        public function setcarrera($carrera){
            $this->carrera=$carrera;
        } 
        public function Registrar_Persona(){
            $archivo = fopen("../data/estudiantes.json","a+");
            $arreglo = array();
            $arreglo["nombre"]=$this->nombre;
            $arreglo["apellido"]=$this->apellido;
            $arreglo["direccion"]=$this->direccion;
            $arreglo["ID"]=$this->ID;
            $arreglo["telefono"]=$this->telefono;
            $arreglo["correo"]=$this->correo;
            $arreglo["password"]=$this->password;
            $arreglo["No_Cuenta"]=$this->No_Cuenta;

            fwrite($archivo,json_encode($arreglo) ."\n");
            fclose($archivo);
            return json_encode($arreglo);
        }
        public function __toString(){
            return "$this->nombre,$this->apellido,$this->direccion,$this->ID,$this->telefono,$this->edad,$this->correo,$this->password,$this->estado_civil,$this->fecha_ingreso,$this->sexo,$this->jerarquia,$this->No_Cuenta,$this->centro,$this->carrera";
        }
    }
?>