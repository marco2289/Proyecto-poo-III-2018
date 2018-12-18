//obtener las facultades//
$(document).ready(function(){
	console.log("Se ha cargado el DOM");
	$.ajax({
		url:"ajax/facultad.php",
		method:"GET",
		dataType:"json",
		success:function(respuesta){
            console.log(respuesta);
			$("#facultad-asignada").append(`<option value="seleccionar">Seleccione la faculdad</option>`);
			$("#sl-facultad").append(`<option value="seleccionar">Seleccione la faculdad</option>`);
			for (var i =0;i<respuesta.length;i++){
                $("#facultad-asignada").append(`
                <option value="${respuesta[i].abreviatura}">${respuesta[i].Nombre}</option>`
				);
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

//================================ registrar centros=======================
$("#crear-centro").click(function(){
	var parametros=`centro=${$("#txt-nombreCentro").val()}&lugar=${$("#txt-ubicacion").val()}`;
	console.log(parametros);
	$.ajax({
		url:"ajax/centros.php?accion=2",//accion=2 es para guardar los centros
		method:"POST",
		dataType:"json",
		data:parametros,
		success:function(respuesta){
			console.log(respuesta);
			$('#myModal').modal('hide');
		},
		error:function(error){
			console.error(error);
			$("#jefe").append(error.responseText);
		}
	});
});

//================================ registrar carreras=======================
$("#crear-carrera").click(function(){
	var parametros="carrera="+$("#txt-nombreCarrera").val()+"&"
				  +"codigo="+$("#txt-codigo").val()+"&"
				  +"facultad="+$("#facultad-asignada").val();

	console.log(parametros);
	$.ajax({
		url:"ajax/carreras.php?accion=2",		//accion=2 es para guardar las carreras
		method:"POST",
		dataType:"json",
		data:parametros,
		success:function(respuesta){
			console.log(respuesta);
			$('#myModal2').modal('hide');
		},
		error:function(error){
			console.error(error);
			$("#jefe").append(error.responseText);
		}
	});
});

//================================ registrar clases=======================
$("#crear-clase").click(function(){
	var parametros="clase="+$("#txt-nombreClase").val()+"&"
				  +"codigo="+$("#txt-cod").val()+"&"
				  +"uv="+$("#txt-uv").val()+"&"
				  +"carrera="+$("#carrera-asignada").val()+"&"
				  +"facultad="+$("#sl-facultad").val();

	console.log(parametros);
	$.ajax({
		url:"ajax/clases.php?accion=2",		//accion=2 es para guardar las carreras
		method:"POST",
		dataType:"json",
		data:parametros,
		success:function(respuesta){
			console.log(respuesta);
			$('#myModal3').modal('hide');
		},
		error:function(error){
			console.error(error);
			$("#jefe").append(error.responseText);
		}
	});
});


//==========================================obtener carreras=================================

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


