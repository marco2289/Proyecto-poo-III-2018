<?php
	function generarCodigo($longitud){
		$acum = 1;
		$key = "UNAH-REU-";//REU====>REGISTRO ESTUDIANTIL UNIVERSITARIO  + #
		$keys= $key.$acum;
		$archivo = fopen("data/registro_alumno.json","r");
		while(($linea=fgets($archivo))){
			$registro = json_decode($linea,true);
			if($registro["No_Cuenta"]==$keys){
				$acum = $acum + 1;
				$keys = $key . ($acum);
			}else{
				$keys = $key . $acum;
			}
		}
		fclose($archivo);
		return $keys;
	}
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Formulario de Registro</title>
    <link rel="icon" href="../Libreria/img/logo.ico">

    <link href="https://fonts.googleapis.com/css?family=K2D:200,400,700" rel="stylesheet" >

	    <!--Arvhicos CSS-->

	<link rel="stylesheet" href="css/modificaciones.css">
	
	
    <link href="https://fonts.googleapis.com/css?family=K2D:200,400,700" rel="stylesheet" >

	
</head>
<body style="background-image: url(img/fondo2.jpg);">

	<br><br>
	<!-- Contenido -->
	<main role="main">

		<section class="content-form">
			<h1 style="text-align: center;">Registro Estudiantes UNAH</h1>
			<h2 class="sub-title">Datos Generales</h2>

			<form>
			
				<div class="form-group width-12">
						<h3 class="sub-form" style="text-align: center;">Nombre Y Apellidos:</h3>
					<div class="width-6">
					<input type="text" placeholder="Nombres" class="form-control" name="nombre" id="nombre" /> 
					</div> 
					<div class="width-6">
					<input type="text" placeholder="Apellidos" class="form-control" name="apellido" id="apellido" /> 
					</div>  
				</div>

				<div class="form-group">
					<div class="width-6">
							<h3 class="sub-form" style="text-align: center;">Direccion:</h3>
						<input type="text" placeholder="Dirección" class="form-control" name="direccion" id="direccion" />
					</div>
					<div class="width-6">
							<h3 class="sub-form" style="text-align: center;">No Identidad:</h3>
						<input type="text" placeholder="xxxx-xxxx-xxxxx" class="form-control" name="ID" id="ID" />
					</div>
				</div>
				
				<div class="form-group width-12">
					<div class="width-6">
							<h3 class="sub-form" style="text-align: center;">Telefono:</h3>
						<input type="tel" placeholder="Teléfono" class="form-control" name="telefono" id="telefono" /> 
					</div> 
					<div class="width-6">
							<h3 class="sub-form" style="text-align: center;">Edad:</h3>
							<input type="text" placeholder="Edad" class="form-control" name="edad" id="edad" /> 
					</div>   
				</div>

				<div class="form-group width-12">
						<div class="width-6">
							<h3 class="sub-form" style="text-align: center;">Correo:</h3>
							<input type="email" placeholder="Correo Electronico" class="form-control" name="email" id="email" /> 
						</div> 
						<div class="width-6">
							<h3 class="sub-form" style="text-align: center;">Password:</h3>
							<input type="password" placeholder="Password" class="form-control" name="password" id="password" /> 
						</div>   
				</div>

				<div class="form-group width-12">
						<h3 class="sub-form" style="text-align: center;">Sexo:</h3>
						
						<div class="width-3">
							<label for="programador"><input type="radio"  id="masculino" name="genero" class="genero" value="masculino"/>Masculino</label>
						</div>
						<div class="width-3">
							<label for="disenador"><input type="radio" id="femenino" name="genero" class="genero" value="femenino"/>femenino</label>
						</div>
						<div class="width-3">
							<label for="disenador"><input type="radio" id="otro" name="genero" class="genero" value="otro"/>Otro</label>
						</div>
				</div>
					
				<div class="form-group width-12">
					<h3 class="sub-form" style="text-align: center;">Estado Civil</h3>
					<div class="width-3">
						<label for="soltero"><input type="radio" id="soltero" class="estado" name="estado" value="soltero" />Soltero</label>
						</div>
						<div class="width-3">
						<label for="casado"><input type="radio" id="casado" class="estado" name="estado" value="casado"/>Casado</label>
						</div>
						<div class="width-3">
						<label for="divorciado"><input type="radio" id="divorciado" class="estado" name="estado" value="divorciado"/>Divorciado</label>
					</div>
					<div class="width-3">
						<label for="viudo"><input type="radio" id="viudo" class="estado" name="estado" value="viudo" />Viudo</label>
					</div>
				</div>
				
				</div>
				<div class="form-group width-12">
					<div class="width-6">
						<h3 class="sub-form" style="text-align: center;">Fecha de ingreso</h3>
						<input type="date" nombre="fecha" class="form-control" id="fecha" placeholder="dd/mm/aa"/>
					</div> 
					<div class="width-6">
						<h3 class="sub-form" style="text-align: center;">Centro de Estudios</h3>
						<!--input type="jerarquia" nombre="jerarquia" class="form-control" id="jerarquia" placeholder="Catedratico,Coordinador o Jefe de Depto"/--> 
						<select name="centro" id="centro" style="background: #fff; border: none; font-size: 14px; height: 38px; padding: 5px; width: 379px; left:3px;">
							<option value="">Seleccione</option>
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
					</div>
				</div>
				<div class="form-group width-12">
					<div class="width-6">
							<h3 class="sub-form" style="text-align: center;">Numero de Cuenta Generado</h3>
							<input readonly="readonly" type="text" nombre="No_Cuenta" class="form-control" id="No_Cuenta" value="<?php echo generarCodigo(1)?>"/> 
					</div>
					<div class="width-6">
							<h3 class="sub-form" style="text-align: center;">Jerarquia</h3>
							<input readonly="readonly" type="text" nombre="jerarquia" class="form-control" id="jerarquia" value="Estudiante"/> 
					</div>
				</div>
				<div class="width-12">
							<h3 class="sub-form" style="text-align: center;">Carrera A Estudiar</h3>
							<select name="carrera" id="carrera" style="background: #fff; border: none; font-size: 14px; height: 32.5px; padding: 5px; width: 100%; left:3px;">
								<option id="" value="">Seleccione</option>
								<option id="Ingenieria Civil" value="Ingenieria Civil">Ingenieria Civil</option>
								<option id="Ingenieria En Sistemas" value="Ingenieria En Sistemas">Ingenieria En Sistemas</option>
								<option id="Ingenieria Electrica" value="Ingenieria Electrica">Ingenieria Electrica</option>
								<option id="" value="Ingenieria Industrial">Ingenieria Industrial</option>
								<option id="" value="Ingenieria Mecanica">Ingenieria Mecanica</option>
								<option id="" value="Ingenieria Quimica">Ingenieria Quimica</option>
								<option id="" value="Ingenieria Forestal">Ingenieria Forestal</option>
								<option id="" value="Ingenieria Agronomica">ingenieria Agronomica</option>
								<option id="" value="Licenciatura en Geografia">Licenciatura en Geografia</option>
								<option id="" value="Licenciatura en Arqueoastronomia">Licenciatura en Arqueoastronomia</option>
								<option id="" value="Licenciatura en Astronomia">Licenciatura en Astronomia</option>
								<option id="" value="Licenciatura en Antropologia">Licenciatura en Antropologia</option>
								<option id="" value="Licenciatura en Historia">Licenciatura en Historia</option>
								<option id="" value="Licenciatura en Desarrollo-Local">Licenciatura en Desarrollo Local</option>
								<option id="" value="Licenciatura en Periodismo">Licenciatura en Periodismo</option>
								<option id="" value="Licenciatura en Trabajo Social">Licenciatura en Trabajo Social</option>
								<option id="" value="Tecnico Desarrollo Municipal">Tecnico Desarrollo Municipal</option>
								<option id="" value="Licenciatura En Matematicas">Licenciatura En Matematicas</option>
								<option id="" value="Licenciatura En Fisica">Licenciatura En Fisica</option>
								<option id="" value="Licenciatura en Microbiologia">Licenciatura en Microbiologia</option>
								<option id="" value="Licenciatura En Biologia">Licenciatura En Biologia</option>
								<option id="" value="Licenciatura En Derecho">Licenciatura En Derecho</option>
								<option id="" value="Licenciatura en Enfermería">Licenciatura en Enfermería</option>
								<option id="" value="Licenciatura En Medicina General">Licenciatura En Medicina General</option>
								<option id="" value="Licenciatura En Nutricion">Licenciatura En Nutricion</option>
								<option id="" value="Licenciatura Informatica Administrativa">Licenciatura Informatica Administrativa</option>
								<option id="" value="Licenciatura Administracion De Empresas">Licenciatura Administracion De Empresas</option>
								<option id="" value="Licenciatura En Economia">Licenciatura En Economia</option>
								<option id="" value="Licenciatura En Banca Y Finanzas">Licenciatura En Banca Y Finanzas</option>
								<option id="" value="Licenciatura En Mercadotecnia">Licenciatura En Mercadotecnia</option>
								<option id="" value="Licenciatura En Comercio Internacional">Licenciatura En Comercio Internacional</option>
								<option id="" value="Lic En Contaduria Publica">Lic En Contaduria Publica</option>
								<option id="" value="Licenciatura En Administracion Aduanera">Licenciatura En Administracion Aduanera</option>
								<option id="" value="Licenciatura En Arquitectura">Licenciatura En Arquitectura</option>
								<option id="Licenciatura En Pedagogia" value="Licenciatura En Pedagogia">Licenciatura En Pedagogia</option>
								<option id="Licenciatura En Letras" value="Licenciatura En Letras">Licenciatura En Letras</option>
								<option id="Licenciatura En Filosofia" value="Licenciatura En Filosofia">Licenciatura En Filosofia</option>
								<option id="Licenciatura En Lenguas Extranjeras" value="Licenciatura En Lenguas Extranjeras">Licenciatura En Lenguas Extranjeras</option>
								<option id="Licenciatura En Musica" value="Licenciatura En Musica">Licenciatura En Musica</option>
								<option id="Licenciatura En Odontologia" value="Licenciatura En Odontologia">Licenciatura En Odontologia</option>
								<option id="Licenciatura En Quimica Y Farmancia" value="Licenciatura En Quimica Y Farmancia">Licenciatura En Quimica Y Farmancia</option>
							</select>
				</div>
				<div class="form-group width-12" >
					<div class="width-6" style="margin-left:200px;" style="margin-top:10px;">
						<input type="button" value="Registrar" class="form-control btn btn-principal" id="btn-registrar"/>	
					</div> 
					<div class="width-6" style="margin-left:200px;">
					
					<input type="button" onclick="location.href='Pag-Administracion-General.php'" value="Regresar" class="form-control btn btn-principal" id="btn-regresar"/>	
					</div>
				</div>
				
			</form>
		</section>
	</main>
	
	<!-- Footer -->
  
    <script src="../Libreria/js/jquery-latest.js"></script>
    <script src="../Libreria/js/bootstrap.min.js"></script>
	
	<div id="error" style="witdh:100%; heigth:100px; background-color:red;"></div>
	<script src="../Libreria/js/bootstrap.min.js"></script>
	<script src="../Libreria/js/jquery-3.3.1.min.js"></script>
	<script>
		$("#btn-registrar").click(function(){
			var parametros =  `nombre=${$("#nombre").val()}&apellido=${$("#apellido").val()}&direccion=${$("#direccion").val()}&ID=${$("#ID").val()}&telefono=${$("#telefono").val()}&edad=${$("#edad").val()}&email=${$("#email").val()}&password=${$("#password").val()}&genero=${$(".genero").val()}&estado=${$(".estado").val()}&fecha=${$("#fecha").val()}&centro=${$("#centro").val()}&No_Cuenta=${$("#No_Cuenta").val()}&jerarquia=${$("#jerarquia").val()}&carrera=${$("#carrera").val()}`;
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


</body>
</html>