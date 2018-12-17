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
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css" />
    <link href="css/historial.css" rel="stylesheet">
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
              <a class="dropdown-item" href="#">DIPP</a>
              <a class="dropdown-item" href="#">Decanos</a>
          
            </div>
          </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Features</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION["nombre"];  ?> </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="loggin-estudiantes.html">Estudiantes</a>
            <a class="dropdown-item" href="#">Cerrar Secion</a>
  
            
          </div>
          </li>
      </ul>
    </div>
  </nav>
   
   
    <div id="loggin" class="padre" > 
      
        
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
                                        <th scope="row" >Estudiante categoria:</th>
                                        <td>'.$registro['categoria'].'</td>
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

          
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" >
              <a class="nav-link active his" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Historial Academico</a>
            </li>
            <li class="nav-item">
              <a class="nav-link his" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Indice Academico</a>
            </li>
            <li class="nav-item">
              <a class="nav-link his" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Indice de repitencia</a>
            </li>
          </ul>
          <div class="tab-content " id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab"> 
                <table class="table table-bordered table-sm table-hover  ">
                <?php
                            $archivo = fopen("calificaciones/notas.json","r");
                            while(($linea = fgets($archivo))){
                                $registro = json_decode($linea,true);
                                if ($llave == $registro["No_Cuenta"]){
                                      echo    
                                    '<thead>
                                    <tr>
                                      <th scope="col">Codigo</th>
                                      <th scope="col">Asignatura</th>
                                      <th scope="col">UV</th>
                                      <th scope="col">Seccion</th>
                                      <th scope="col">Año</th>
                                      <th scope="col">Periodo</th>
                                      <th scope="col">Calificacion</th>
                                      <th scope="col">OBS</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <th scope="row">1</th>
                                      <td>'.$registro['Asignatura'].'</td>
                                      <td>'.$registro['UV'].'</td>
                                      <td>'.$registro['Seccion'].'</td>
                                      <td>'.$registro['Anio'].'</td>
                                      <td>'.$registro['Periodo'].'</td>
                                      <td>'.$registro['calificacion'].'</td>
                                      <td>'.$registro['OBS'].'</td>
                                    </tr>
                                    <tr>
                                      <th scope="row">2</th>
                                      <td>'.$registro['Asignatura'].'</td>
                                      <td>'.$registro['UV'].'</td>
                                      <td>'.$registro['Seccion'].'</td>
                                      <td>'.$registro['Anio'].'</td>
                                      <td>'.$registro['Periodo'].'</td>
                                      <td>'.$registro['calificacion'].'</td>
                                      <td>'.$registro['OBS'].'</td>
                                    </tr>
                                    <tr>
                                      <th scope="row">3</th>
                                      <td>'.$registro['Asignatura'].'</td>
                                      <td>'.$registro['UV'].'</td>
                                      <td>'.$registro['Seccion'].'</td>
                                      <td>'.$registro['Anio'].'</td>
                                      <td>'.$registro['Periodo'].'</td>
                                      <td>'.$registro['calificacion'].'</td>
                                      <td>'.$registro['OBS'].'</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">4</th>
                                        <td>'.$registro['Asignatura'].'</td>
                                      <td>'.$registro['UV'].'</td>
                                      <td>'.$registro['Seccion'].'</td>
                                      <td>'.$registro['Anio'].'</td>
                                      <td>'.$registro['Periodo'].'</td>
                                      <td>'.$registro['calificacion'].'</td>
                                      <td>'.$registro['OBS'].'</td>
                                      </tr>
                                      <tr>
                                          <th scope="row">5</th>
                                          <td>'.$registro['Asignatura'].'</td>
                                      <td>'.$registro['UV'].'</td>
                                      <td>'.$registro['Seccion'].'</td>
                                      <td>'.$registro['Anio'].'</td>
                                      <td>'.$registro['Periodo'].'</td>
                                      <td>'.$registro['calificacion'].'</td>
                                      <td>'.$registro['OBS'].'</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">6</th>
                                            <td>'.$registro['Asignatura'].'</td>
                                      <td>'.$registro['UV'].'</td>
                                      <td>'.$registro['Seccion'].'</td>
                                      <td>'.$registro['Anio'].'</td>
                                      <td>'.$registro['Periodo'].'</td>
                                      <td>'.$registro['calificacion'].'</td>
                                      <td>'.$registro['OBS'].'</td>
                                          </tr>
                                          <tr>
                                              <th scope="row">7</th>
                                              <td>'.$registro['Asignatura'].'</td>
                                      <td>'.$registro['UV'].'</td>
                                      <td>'.$registro['Seccion'].'</td>
                                      <td>'.$registro['Anio'].'</td>
                                      <td>'.$registro['Periodo'].'</td>
                                      <td>'.$registro['calificacion'].'</td>
                                      <td>'.$registro['OBS'].'</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">8</th>
                                                <td>'.$registro['Asignatura'].'</td>
                                      <td>'.$registro['UV'].'</td>
                                      <td>'.$registro['Seccion'].'</td>
                                      <td>'.$registro['Anio'].'</td>
                                      <td>'.$registro['Periodo'].'</td>
                                      <td>'.$registro['calificacion'].'</td>
                                      <td>'.$registro['OBS'].'</td>
                                              </tr>
                                              <tr>
                                                  <th scope="row">9</th>
                                                  <td>'.$registro['Asignatura'].'</td>
                                      <td>'.$registro['UV'].'</td>
                                      <td>'.$registro['Seccion'].'</td>
                                      <td>'.$registro['Anio'].'</td>
                                      <td>'.$registro['Periodo'].'</td>
                                      <td>'.$registro['calificacion'].'</td>
                                      <td>'.$registro['OBS'].'</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">10</th>
                                                    <td>'.$registro['Asignatura'].'</td>
                                      <td>'.$registro['UV'].'</td>
                                      <td>'.$registro['Seccion'].'</td>
                                      <td>'.$registro['Anio'].'</td>
                                      <td>'.$registro['Periodo'].'</td>
                                      <td>'.$registro['calificacion'].'</td>
                                      <td>'.$registro['OBS'].'</td>
                                                  </tr> 
                                  </tbody>';
                                    break;
                                }
                            }
                            fclose($archivo);
                    ?>
                    
                  </table>
                  <nav aria-label="Page navigation example">
                      <ul class="pagination">
                        <li class="page-item">
                          <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                          </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                          <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                          </a>
                        </li>
                      </ul>
                    </nav>

            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
          </div>


      </div>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/controlador.js"></script>
</body>
</html>
</html>