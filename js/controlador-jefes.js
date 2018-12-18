//obtener las facultades//
$(document).ready(function(){
	console.log("Se ha cargado el DOM");
	$.ajax({
		url:"ajax/facultad.php",
		method:"GET",
		dataType:"json",
		success:function(respuesta){
            console.log(respuesta);
			$("#facu").append(`<option value="seleccionar">Seleccione la faculdad</option>`);
			for (var i =0;i<respuesta.length;i++){
                $("#facu").append(`
                <option value="${respuesta[i].Nombre}">${respuesta[i].Nombre}</option>`
				);
			}
		},
		error:function(error){
			console.error(error);
		}
	});
});

//================================ registrar jefes=======================
$("#registrar-jefe").click(function(){
	var parametros="nombre="+$("#txt-NombreJefe").val()+"&"
                  +"num="+$("#txt-numeroJefe").val()+"&"
                  +"pass="+$("#txt-passJefe").val()+"&"
				  +"facultad="+$("#facu").val();

	console.log(parametros);
	$.ajax({
		url:"ajax/jefe.php?accion=2",		//accion=2 es para guardar las carreras
		method:"POST",
		dataType:"json",
		data:parametros,
		success:function(respuesta){
			console.log(respuesta);
		},
		error:function(error){
			console.error(error);
			$("#jefe").append(error.responseText);
		}
	});
});