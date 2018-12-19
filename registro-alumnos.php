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
    <link href="css/registro.estudiante.css" rel="stylesheet">
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
                            $archivo = fopen("data/administrador.json","r");
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
                                            <th scope="row">Puesto:</th>
                                            <td>'.$registro['carrera'].'</td>
                                            <th scope="row" >Centro:</th>
                                            <td>'.$registro['centro'].'</td>
                                          </tr>
                                      <tr>
                                        <th scope="row">Nombre:</th>
                                      <td>'.$registro['nombre'].' '.$registro['apellido'].'</td>
                                        <th scope="row" >Categoria:</th>
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

           
                
          <div id="loggin3" > 
       <img class="mb-4 rounded-circle" src="" alt="">
        <h1 id="titulo2">Registro Alumnos</h1> <hr><br>
        <label id ="li" for"cuenta"></label><br>
        <input class="" type="text" id="nombre" placeholder="Nombres" required autofocus>
        <label></label><br>
        <input type="text" id="apellido" placeholder="Apellidos" required autofocus > 
        <label for"cuenta"></label><br>
        <input class="" type="text" id="identidad" placeholder="No. ID" required autofocus>
      
       
        <label for"cuenta"></label><br>
        <input  type="text" id="telefono" placeholder="Telefono" required autofocus>
        <label></label>
        <input type="text" id="direccion" placeholder="Direccion" required autofocus > 
        <label for"cuenta"></label>
        <input class="" type="text" id="correo" placeholder="Correo" required autofocus>
        <label for"cuenta"></label>
        <input class="" type="text" id="cuenta" placeholder="Cuenta" required autofocus>
        <label for"cuenta"></label>
       

        <input class="" type="text" id="password" placeholder="Password" required autofocus>
        <select class="form-control form-control-lg" name="jearquia" id="jerarquia" >
        <option  value="">Categoria</option>
        <option  value="Estudiante">Estudiante</option>
        <option  value="Maestro">Maestro</option>
        <option  value="Otro">Otro</option>
				
        </select>
        <select class="form-control form-control-lg" name="centro" id="centro" >
							<option  value="">Seleccione un centro de estudios</option>
							<option value="CURC">Centro Universitario Regional Del Centro (CURC)</option>
							<option value="CU">Ciudad Universitaria (CU)</option>
							<option value="UNAH-VS">Valle de Sula (UNAH-VS)</option>
							<option value="UNAH-TEC-AGUÁN">Centro Tecnológico del Valle de Aguan (UNAH-TEC-AGUÁN)</option>
							<option value="UNAH-TEC-Danli">Centro Tecnológico de Danlí (UNAH-TEC-Danli)</option>
							<option value="UNAH-CURLA">Centro Universitario Regional de Litoral Atlántico (UNAH-CURLA)</option>
							<option value="UNAH-CURLP">entro Univesitario Regional del Litoral Pacífico (UNAH-CURLP)</option>
							<option value="UNAH-CUROC">Centro Universitario Regional de Occidente (UNAH-CUROC)</option>
							<option value="UNAH-CURNO">Centro Universitario Regional Nororiental (UNAH-CURNO)</option>
            </select>
            <select class="form-control form-control-lg" name="carrera" id="carrera" ">
								<option value="">Seleccione una Carrera</option>
								<option value="Ingenieria Civil">Ingenieria Civil</option>
								<option value="Ingenieria En Sistemas">Ingenieria En Sistemas</option>
								<option value="Ingenieria Electrica">Ingenieria Electrica</option>
								<option value="Ingenieria Industrial">Ingenieria Industrial</option>
								<option value="Ingenieria Mecanica">Ingenieria Mecanica</option>
								<option value="Ingenieria Quimica">Ingenieria Quimica</option>
								<option value="Ingenieria Forestal">Ingenieria Forestal</option>
								<option value="Ingenieria Agronomica">ingenieria Agronomica</option>
								<option value="Licenciatura en Geografia">Licenciatura en Geografia</option>
								<option value="Licenciatura en Arqueoastronomia">Licenciatura en Arqueoastronomia</option>
								<option value="Licenciatura en Astronomia">Licenciatura en Astronomia</option>
								<option value="Licenciatura en Antropologia">Licenciatura en Antropologia</option>
								<option value="Licenciatura en Historia">Licenciatura en Historia</option>
								<option value="Licenciatura en Desarrollo-Local">Licenciatura en Desarrollo Local</option>
								<option value="Licenciatura en Periodismo">Licenciatura en Periodismo</option>
								<option value="Licenciatura en Trabajo Social">Licenciatura en Trabajo Social</option>
								<option value="Tecnico Desarrollo Municipal">Tecnico Desarrollo Municipal</option>
								<option value="Licenciatura En Matematicas">Licenciatura En Matematicas</option>
								<option value="Licenciatura En Fisica">Licenciatura En Fisica</option>
								<option value="Licenciatura en Microbiologia">Licenciatura en Microbiologia</option>
								<option value="Licenciatura En Biologia">Licenciatura En Biologia</option>
								<option value="Licenciatura En Derecho">Licenciatura En Derecho</option>
								<option value="Licenciatura en Enfermería">Licenciatura en Enfermería</option>
								<option value="Licenciatura En Medicina General">Licenciatura En Medicina General</option>
								<option value="Licenciatura En Nutricion">Licenciatura En Nutricion</option>
								<option value="Licenciatura Informatica Administrativa">Licenciatura Informatica Administrativa</option>
								<option value="Licenciatura Administracion De Empresas">Licenciatura Administracion De Empresas</option>
								<option value="Licenciatura En Economia">Licenciatura En Economia</option>
								<option value="Licenciatura En Banca Y Finanzas">Licenciatura En Banca Y Finanzas</option>
								<option value="Licenciatura En Mercadotecnia">Licenciatura En Mercadotecnia</option>
								<option value="Licenciatura En Comercio Internacional">Licenciatura En Comercio Internacional</option>
								<option value="Lic En Contaduria Publica">Lic En Contaduria Publica</option>
								<option value="Licenciatura En Administracion Aduanera">Licenciatura En Administracion Aduanera</option>
								<option value="Licenciatura En Arquitectura">Licenciatura En Arquitectura</option>
								<option value="Licenciatura En Pedagogia">Licenciatura En Pedagogia</option>
								<option value="Licenciatura En Letras">Licenciatura En Letras</option>
								<option value="Licenciatura En Filosofia">Licenciatura En Filosofia</option>
								<option value="Licenciatura En Lenguas Extranjeras">Licenciatura En Lenguas Extranjeras</option>
								<option value="Licenciatura En Musica">Licenciatura En Musica</option>
								<option value="Licenciatura En Odontologia">Licenciatura En Odontologia</option>
								<option value="Licenciatura En Quimica Y Farmancia">Licenciatura En Quimica Y Farmancia</option>
							</select>
        
        <input type="button" class ="btn btn-primary boton" id="btn-registrar" value="Entrar">
        <script type="text/javascript" src="js/jquery.min.js"></script>
        
        <script>
             <label><input type="checkbox"> Recordarme</label>
        <a href="#">ayuda?</a>
        <p> Para ayuda llamar al 2221-4947</p><br>
        <p>Derechos reservados UNAH</p>



    </div>
            
    </div>
        $("#btn-registrar").click(function(){
            $.ajax({
                url:"ajax/estudiante.php",
                data:"No_Cuenta="+$("#cuenta").val() + "&password="+$("#password").val(),
                dataType:"json",
                method:"POST",
                success:function(respuesta){
                    console.log(respuesta);
                    if (respuesta.estatus == 1){
                        if (respuesta.jerarquia=="estudiante")
                            window.location.href = "area-personal.php";//redireccionar
                        else if (respuesta.tipoUsuario=="admin")
                            window.location.href = "admin.php";//redireccionar
                    }else if (respuesta.estatus==0){
                      alert("Credenciales invalidas");
                    }
                                
                },
                error:function(error){
                    console.error(error);
                }
            });
        });
    </script>
   
     
    <script>
		$("#btn-registrar").click(function(){
			var parametros =  `nombre=${$("#nombre").val()}&apellido=${$("#apellido").val()}&direccion=${$("#direccion").val()}&ID=${$("#id").val()}&telefono=${$("#telefono").val()}&email=${$("#correo").val()}&password=${$("#password").val()}&centro=${$("#centro").val()}&No_Cuenta=${$("#cuenta").val()}&jerarquia=${$("#jerarquia").val()}&carrera=${$("#carrera").val()}`;
			console.log("El cliente envia estos parametros: "+parametros);
			$.ajax({
				url:"ajax/proceso-ingreso.php",
				method:"GET",
				data:parametros,
				dataType:"json",
				success:function(respuesta){
					console.log("El servidor dice: "+respuesta.nombre);
				},
				error:function(error){
					console.error(error);
					$("#error").append(error.responseText);
				}
			});
			$.ajax({
				url:"ajax/proceso-ingreso-alumnos.php",
				method:"GET",
				data:parametros,
				dataType:"json",
				success:function(respuesta){
					console.log("El servidor dice: "+respuesta.nombre);
				},
				error:function(error){
					console.error(error);
					$("#error").append(error.responseText);
				}
			});
			var errores;
			if( $('#nombre').val() != null ){
				
				$('#nombre').css('border-bottom-color', '#F14B4B')
			}
			if( errores == '' == false){
            var mensajeModal = '<div class="modal_wrap">'+
                                    '<div class="mensaje_modal">'+
										'<h2 style="text-align:center;">Credenciales De Ingreso al Sistema</h2>'+
										'<p><b>Numero de Usuario:</b></p>'+$('#No_Cuenta').val()+
										'<p><b>Contraseña:</b></p>'+$('#password').val()+
										'<h2>Bienvenido A La Universidad Nacional Autonoma de Honduras</h2>'+
                                        '<span id="btnClose">Finalizar</span>'+
                                    '</div>'+
                                '</div>'

            $('body').append(mensajeModal);
        	}
			// CERRANDO MODAL ==============================
			$('#btnClose').click(function(){
				window.location.href = "formulario-registro-alumno.php";
			});	
		});
		
	</script>





    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/controlador.js"></script>
</body>
</html>
</html>