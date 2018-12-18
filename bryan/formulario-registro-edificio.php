<?php
	function generarCodigo(){
		$acum = 1;
		$key = "ED-";
		$keys= $key.$acum;
		$archivo = fopen("data/registro_edificio.json","r");
		while(($linea=fgets($archivo))){
			$registro = json_decode($linea,true);
			if($registro["ID_edificio"]==$keys){
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


	<link rel="stylesheet" href="css/modificaciones.css">

	
    <link href="https://fonts.googleapis.com/css?family=K2D:200,400,700" rel="stylesheet" >
    <script src = "../Libreria/js/jquery-3.3.1.min.js"></script>
    <script src = "../Libreria/js/jquery.flexslider.js"></script>
    <script src = "../Libreria/js/main.js"></script>
</head>
<body style="background-image: url(img/fondo2.jpg);">
	<br><br>
	<!-- Contenido -->
	<main role="main">

		<section class="content-form">
			<h1 style="text-align: center;">Registro Edificios UNAH</h1>
			
			<form>
			
				<div class="form-group width-12">
						<h3 class="sub-form" style="text-align: center;">ID del Edificio</h3>
					<div class="width-12">
					<input type="text" placeholder="ID del Edificio" class="form-control" name="nombre" id="ID_edificio" value="<?php echo generarCodigo()?>" /> 
					</div> 
					
				</div>

				<div class="form-group">
					<div class="width-12">
							<h3 class="sub-form" style="text-align: center;">Nombre del Edificio:</h3>
						<input type="text" placeholder="Nombre del Edificio" class="form-control" name="direccion" id="nombreEdificio" />
					</div>
				</div>
				
				<div class="form-group width-12">
					<div class="width-12">
							<h3 class="sub-form" style="text-align: center;">Centro Regional:</h3>
						<input type="tel" placeholder="Centro Regional" class="form-control" name="telefono" id="centroRegional" /> 
					</div> 
				</div>

				<div class="form-group width-12">
					<div class="width-6" style="margin-left:200px;" style="margin-top:10px;">
						<input type="button" value="Registrar" class="form-control btn btn-principal" id="btn-registrar"/>
					</div>	 
					<div class="width-6" style="margin-left:200px;" style="margin-top:10px;">
						<input type="button" onclick="location.href='Pag-Administracion-General.php'" value="Regresar" class="form-control btn btn-principal" id="btn-regresar"/>
					</div>
				</div>
				
			</form>
		</section>
	</main>	
	

  
    <script src="../Libreria/js/jquery-latest.js"></script>
    <script src="../Libreria/js/bootstrap.min.js"></script>


	<div id="error" style="witdh:100%; heigth:100px; background-color:red;"></div>
	<script src="../Libreria/js/bootstrap.min.js"></script>
	<script src="../Libreria/js/jquery-3.3.1.min.js"></script>
	<script>
		$("#btn-registrar").click(function(){
			var parametros =  `ID_edificio=${$("#ID_edificio").val()}&nombreEdificio=${$("#nombreEdificio").val()}&centroRegional=${$("#centroRegional").val()}`;
			console.log("El cliente envia estos parametros: "+parametros);
			$.ajax({
				url:"ajax/proceso-ingreso-edificios.php",
				method:"GET",
				dataType:"json",
				data:parametros,
				success:function(respuesta){
					console.log("El servidor dice: "+respuesta.nombreEdificio);
				},
				error:function(error){
					console.error(error);
					$("#error").append(error.responseText);
				}
			});
			
			var errores;
			if( $('#nombreEdificio').val() != null ){
				
				$('#nombreEdificio').css('border-bottom-color', '#F14B4B')
			}
			if( errores == '' == false){
            	var mensajeModal = '<div class="modal_wrap">'+
            	                        '<div class="mensaje_modal">'+
											'<h2 style="text-align:center;">Edificio Creado</h2>'+
											'<p><b>Nombre del Edificio:</b></p>'+$('#nombreEdificio').val()+
											'<p><b>Centro Regional:</b></p>'+$('#centroRegional').val()+
            	                            '<span id="btnClose">Finalizar</span>'+
            	                        '</div>'+
            	                    '</div>'

            	$('body').append(mensajeModal);
        	}
			// CERRANDO MODAL ==============================
			$('#btnClose').click(function(){
				window.location.href = "Pag-Administracion-General.php";
			});	
		});
		
	</script>


</body>
</html>