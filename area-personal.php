<?php 
    session_start();  
    if (!isset($_SESSION["No_Cuenta"]))
        header("Location: no-autorizado.html");//Redireccion con PHP
        $llave=$_SESSION["No_Cuenta"];
     
?>

<html>

<!DOCTYPE html>
<html>
<head>
<title>Area personal alumnos</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css" />
    <link href="css/area-personal.css" rel="stylesheet">
    <link  rel="icon" href="img/logo.ico" >
    <script src="main.js"></script>
</head>

<style>
  .dropdown:hover>.dropdown-menu{
    display: block;
  } 

</style>
<div class="" id="encabezado">
    <h1 class="display-5 " id="dipp"   >Dirección de permanencia y promoción <br> DIPP-UNAH</h1>
</div>

<nav class="navbar navbar-expand-lg navbar-light " id="barra">
    <a class="navbar-brand" href="#">Inicio</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="#">Facultades<span class="sr-only">(current)</span></a>
        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Pregrado<span class="sr-only">(current)</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="loggin-estudiantes.html">Estudiantes</a>
            <a class="dropdown-item" href="#">Profesores</a>
            <a class="dropdown-item" href="#">Jefes de Departamento</a>
            
          </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Administrador
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="loggin-administrador.html">DIPP</a>
              <a class="dropdown-item" href="#">Decanos</a>
          
            </div>
          </li>
        <li class="nav-item">
            <a class="nav-link" href="#"></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"></a>
          </li> <hr>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION["nombre"];  ?> </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="loggin-estudiantes.html">Estudiantes</a>
            <a class="dropdown-item" href="cerrar-sesion.php">Cerrar Secion</a>
  
            
          </div>
          </li>
      </ul>
    </div>
  </nav>
   
   
    <div id="loggin" > 
      
        <div id="loggin2">
            <table class="table table-borderless table-sm" id="tabla-enc">
            <?php
                            $archivo = fopen("data/estudiantes.json","r");
                            while(($linea = fgets($archivo))){
                                $registro = json_decode($linea,true);
                                if ($llave == $registro["No_Cuenta"]){
                                    echo    
                                    '<h4 id="historial"> Informacion General</h4> <hr>
                                    <thead>
                                      <tr>
                                        
                                      </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">Carrera:</th>
                                            <td>'.$registro['carrera'].'</td>
                                            <th scope="row" >Centro:</th>
                                            <td>'.$registro['centro'].'</td>
                                          </tr>
                                      <tr>
                                        <th scope="row">Nombre:</th>
                                      <td>'.$registro['nombre'].' '.$registro['apellido'].'</td>
                                        <th scope="row" >Categoria:</th>
                                        <td>'.$registro['jerarquia'].' Pregrado</td>
                                      </tr>
                                      <tr>
                                        <th scope="row">Cuenta:</th>
                                        <td>'.$registro['No_Cuenta'].'</td>
                                        
                                      </tr>
                                    </tbody>';
                                    break;
                                }
                            }
                            fclose($archivo);
                    ?>
                
                
              </table>
          
          </div>
            <div class="list-group">
                    <h3 href="#" class="list-group-item list-group-item-action active" id="titulo">
                      Mi espacio personal
                    </h3>
                    <a href="historial - copia.php" class="list-group-item list-group-item-action" id="titulo2">Historial academico</a>
                    <a href="matricula.php" class="list-group-item list-group-item-action" id="titulo2" >Matricula</a>
                    <a href="forma.php" class="list-group-item list-group-item-action" id="titulo2" >Ver mi Forma 03</a>
                    <a href="#" class="list-group-item list-group-item-action" id="titulo2" >Matricula de laboratorio</a>
                    <a href="#" class="list-group-item list-group-item-action " id="titulo2" >Cambio de clave</a>
                    <a href="#" class="list-group-item list-group-item-action " id="titulo2" >Ver calificaciones del periodo</a>
                  </div>
    </div>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/controlador.js"></script>
</body>
</html>
</html>