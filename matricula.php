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
    <link href="css/matricula.css" rel="stylesheet">
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
          <li class="nav-item">
            <a class="nav-link" href="#">Pricing</a>
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
      

                    <div>
                        <button style="margin-left:7%"  class="btn btn-success" type="button" data-toggle="modal" data-target="#myModal">Seleccionar Asignatura</button>
                    </div>
                    <div class="tab-content " id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab"> 
              <a id="parrafo" style = "color: black; text-align:center;"  > Asignaturas Matriculadas <hr> </a>
                <table class="table table-bordered table-sm table-hover ">
               <thead>
                                    <tr>
                                      <th scope="col">Codigo</th>
                                      <th scope="col">Asignatura</th>
                                      <th scope="col">Seccion</th>
                                      <th scope="col">HI</th>
                                      <th scope="col">HF</th>
                                      <th scope="col">Dias</th>
                                      <th scope="col">UV</th>
                                      <th scope="col">Periodo</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                  </tbody>
                   
                    
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

          <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab"> 
              <a  id="parrafo" style = "color: black;"> Asignaturas en lista de espera <hr>  </a>
                <table class="table table-bordered table-sm table-hover ">
               <thead>
                                    <tr>
                                      <th scope="col">Codigo</th>
                                      <th scope="col">Asignatura</th>
                                      <th scope="col">Seccion</th>
                                      <th scope="col">HI</th>
                                      <th scope="col">HF</th>
                                      <th scope="col">Dias</th>
                                      <th scope="col">UV</th>
                                      <th scope="col">Periodo</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    
                                    
                                  </tbody>
                   
                    
                  </table>
                          </div>     
                          <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab"> 
              <a  id="parrafo" style = "color: black;"> Laboratorios Matriculados <hr>  </a>
                <table class="table table-bordered table-sm table-hover ">
               <thead>
                                    <tr>
                                      <th scope="col">Codigo</th>
                                      <th scope="col">Asignatura</th>
                                      <th scope="col">Seccion</th>
                                      <th scope="col">HI</th>
                                      <th scope="col">HF</th>
                                      <th scope="col">Dias</th>
                                      <th scope="col">UV</th>
                                      <th scope="col">Periodo</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    
                                    
                                  </tbody>
                   
                    
                  </table>
                          </div>
            

                    
<div class="modal fade" id="myModal" role="dialog">



        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            
              <!-- Modal content-->
            <div class="modal-content" style="background-color:#183F60">
                <div class="modal-header centrar" >
                  <h6 class="modal-title" style="color:white"><b>Asignaturas</b></h6>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" style="background-color:rgb(255, 255, 255);" class="col-12 col-sm-12 col-md-6 col-lg-6 form-control">                
                     <div class="row centrar">               
                         <div class="col-12" style="margin-bottom:2%">
  
                            <div>
                            <select  class="form-control col-12 col-sm-12 col-md-4 col-lg-4 " id="select-carreras" style="float:left" size="12">
                            <option><?php
                                                $archivo = fopen("data/estudiantes.json","r");
                                                while(($linea = fgets($archivo))){
                                                    $registro = json_decode($linea,true);
                                                    if ($llave == $registro["No_Cuenta"]){
                                                        echo    '
                                                                 <p><b></b>'.$registro['carrera'].'</p><hr style="border: 1.2px solid #FFCC00;">
                                                                ';  
                                                        break;
                                                    } 
                                                }
                                                fclose($archivo);
                                                $carrera=$registro['carrera'];
                                                ?>
                                            </option>
                                        </select>   


                                    <select multiple class="form-control col-12 col-sm-12 col-md-4 col-lg-4 " id="select-clases" style="float:left" size="12">
                                    <option>Asignatura</option>
                                            <?php
                                                $archivo = fopen("json/$carrera.json","r");
                                                while(($linea = fgets($archivo))){
                                                    $registro = json_decode($linea,true);
                                                    //if ($valor == $registro["No_Cuenta"]){
                                                        echo    '
                                                                 <option>'.$registro['codigo'] . " " . $registro['asignatura'].'</option>
                                                                ';  
                                                        //break;
                                                    //} 
                                                }
                                                fclose($archivo);
                                            ?>
                                    </select>

                                    <select multiple class="form-control col-12 col-sm-12 col-md-4 col-lg-4 " id="select-secciones" size="12">
                                    <option id="seccion"></option>
                                            
                                    </select>
                            </div>
                            




                         </div>  
                         <br>                                                    
                     </div>
                </div>  
                
                <div class="modal-footer">
                    <button class="btn btn-success centrar"  type="button" value="Buscar">Matricular</button>
                </div>                              
            </div>
        </div>
          
    </div>
<!--********************************FIN VENTANA MODAL*****************************************-->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/controlador.js"></script>
</body>
</html>
</html>