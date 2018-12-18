//obtener las facultades//
$(document).ready(function(){
	console.log("Se ha cargado el DOM");
	$.ajax({
		url:"ajax/facultad.php",
		method:"GET",
		dataType:"json",
		success:function(respuesta){
            console.log(respuesta);
			$("#facultad").append(`<option value="seleccionar">Seleccione la faculdad</option>`);
			for (var i =0;i<respuesta.length;i++){
                $("#facultad").append(`
                <option value="${respuesta[i].abreviatura}">${respuesta[i].Nombre}</option>`
				);	
			}
		},
		error:function(error){
			console.error(error);
		}
    });
    
    $.ajax({
		url:"ajax/docente.php?accion=1",
		method:"GET",
		dataType:"json",
		success:function(respuesta){
            console.log(respuesta);
			$("#docentes").append(`<option value="seleccionar">Seleccione el catedrático</option>`);
			for (var i =0;i<respuesta.length;i++){
                $("#docentes").append(`
                <option value="${respuesta[i].nombre}">${respuesta[i].nombre}</option>`
				);	
			}
		},
		error:function(error){
			console.error(error);
		}
	});



});

//==========================================obtener carreras=================================

$("#facultad").change(function(){
	var facultad = $("#facultad").val();
	
	//Esta funcion se ejecuta cada vez que el usuario selecciona o cambia un elemento de la lista.	
	$.ajax({
		url:"ajax/carreras.php?accion=1",			//la accion 1 es para obtener las carreras
		method:"GET",
		data: 'facultad='+facultad,
		dataType:"json",
		success:function(respuesta){
            console.log(respuesta);
			$("#carrera").append(`<option value="seleccionar">Seleccione la carrera</option>`);
			for (var i =0;i<respuesta.length;i++){
                $("#carrera").append(`
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

//==========================================obtener clases=================================

$("#carrera").change(function(){
    var parametros="carrera="+$("#carrera").val()+"&"
				  +"facultad="+$("#facultad").val();
	
	//Esta funcion se ejecuta cada vez que el usuario selecciona o cambia un elemento de la lista.	
	$.ajax({
		url:"ajax/clases.php?accion=1",			//la accion 1 es para obtener las carreras
		method:"GET",
	    data: parametros,
		dataType:"json",
		success:function(respuesta){
            console.log(respuesta);
			$("#clases").append(`<option value="seleccionar">Seleccione la clase</option>`);
			for (var i =0;i<respuesta.length;i++){
                $("#clases").append(`
                <option value="${respuesta[i].codigo}">${respuesta[i].clase}</option>`
                );   
                $("#codigo").html(`<input class="form-control" type="text" placeholder="${respuesta[i].carrera}" id="txt-codigo" disabled>`
                ); 
                       
            }
           
		},
		error:function(error){
			console.error(error);
			$("#jefe").append(error.responseText);
		}
	});
});

//==========================================obtener uv de clase=================================
$("#clases").change(function(){
    var parametros="carrera="+$("#carrera").val()+"&"
                  +"clase="+$("#clases").val()+"&"
				  +"facultad="+$("#facultad").val();
	
	//Esta funcion se ejecuta cada vez que el usuario selecciona o cambia un elemento de la lista.	
	$.ajax({
		url:"ajax/clases.php?accion=1",			//la accion 1 es para obtener las carreras
		method:"GET",
	    data: parametros,
		dataType:"json",
		success:function(respuesta){
            console.log(respuesta);	
			for (var i =0;i<respuesta.length;i++){ 
               $("#uv").html(`<input class="form-control" type="text" placeholder="${respuesta[i].uv}" id="txt-UV" disabled>`);          
            }          
		},
		error:function(error){
			console.error(error);
			$("#jefe").append(error.responseText);
		}
	});
});

//================================ crear secciones=======================
$("#crear-seccion").click(function(uv){
	var parametros="facultad="+$("#facultad").val()+"&"
                  +"codCarrera="+$("#carrera").val()+"&"
                  +"codClase="+$("#clases").val()+"&"
                  +"seccion="+$("#txt-seccion").val()+"&"
                  +"aula="+$("#txt-aula").val()+"&"
                  +"cupos="+$("#txt-cupos").val()+"&"
                  +"inicio="+$("#h-inicio").val()+"&"
                  +"final="+$("#h-fin").val()+"&"
                  +"dias="+$("#sl-dias").val()+"&"
                  +"edificio="+$("#sl-edificio").val()+"&"
				  +"docente="+$("#docentes").val();

	console.log(parametros);
	$.ajax({
		url:"ajax/secciones.php?accion=2",		//accion=2 es para guardar las carreras
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