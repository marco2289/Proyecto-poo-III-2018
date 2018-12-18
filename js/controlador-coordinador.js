//obtener las facultades//
$(document).ready(function(){
	console.log("Se ha cargado el DOM");
	$.ajax({
		url:"ajax/facultad.php",
		method:"GET",
		dataType:"json",
		success:function(respuesta){
            console.log(respuesta);
			$("#sl-facultad").append(`<option value="seleccionar">Seleccione la faculdad</option>`);
			for (var i =0;i<respuesta.length;i++){
                $("#sl-facultad").append(`
                <option value="${respuesta[i].abreviatura}">${respuesta[i].Nombre}</option>`
				);
			}
		},
		error:function(error){
			console.error(error);
		}
	});
});

//================================ registrar coordinador=======================
$("#registrar-coor").click(function(){
	var parametros="nombre="+$("#txt-NombreCoordinador").val()+"&"
                  +"num="+$("#txt-numeroCoor").val()+"&"
                  +"pass="+$("#txt-passCoor").val()+"&"
                  +"facultad="+$("#sl-facultad").val()+"&"
				  +"carrera="+$("#carrera-asignada").val();

	console.log(parametros);
	$.ajax({
		url:"ajax/coordinador.php?accion=2",		//accion=2 es para guardar las carreras
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
//====================================================obtener carreras=================================================================
$("#sl-facultad").change(function(){
	var facultad = $("#sl-facultad").val();
	
	//Esta funcion se ejecuta cada vez que el usuario selecciona o cambia un elemento de la lista.	
	$.ajax({
		url:"ajax/carreras.php?accion=1",			//la accion 1 es para obtener las carreras
		method:"GET",
		data: 'facultad='+facultad,
		dataType:"json",
		success:function(respuesta){
            console.log(respuesta);
			$("#carrera-asignada").append(`<option value="seleccionar">Seleccione la carrera</option>`);
			for (var i =0;i<respuesta.length;i++){
                $("#carrera-asignada").append(`
                <option value="${respuesta[i].codigo}">${respuesta[i].carrera}</option>`
				);
			}
		},
		error:function(error){
			console.error(error);
			$("#jefe").append(error.responseText);
		}
	});
});