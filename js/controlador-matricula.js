//obtener las facultades//
$(document).ready(function(){
	console.log("Se ha cargado el DOM");
	$.ajax({
		url:"ajax/facultad.php",
		method:"GET",
		dataType:"json",
		success:function(respuesta){
            console.log(respuesta);
			$("#slc-facultades").append(`<option value="seleccionar">Seleccione la faculdad</option>`);
			for (var i =0;i<respuesta.length;i++){
                $("#slc-facultades").append(`
                <option value="${respuesta[i].abreviatura}">${respuesta[i].Nombre}</option>`
				);
			}
		},
		error:function(error){
			console.error(error);
		}
	});
});

//====================================================obtener carreras=================================================================
$("#slc-facultades").change(function(){
	var facultad = $("#slc-facultades").val();
	
	//Esta funcion se ejecuta cada vez que el usuario selecciona o cambia un elemento de la lista.	
	$.ajax({
		url:"ajax/carreras.php?accion=1",			//la accion 1 es para obtener las carreras
		method:"GET",
		data: 'facultad='+facultad,
		dataType:"json",
		success:function(respuesta){
            console.log(respuesta);
            $("#select-carreras").append(`<option value="seleccionar">Seleccione la carrera</option>`);
			for (var i =0;i<respuesta.length;i++){
                $("#select-carreras").append(`
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

//====================================================obtener clases=================================================================
$("#select-carreras").change(function(){
	var carrera = $("#select-carreras").val();
	var facultad = $("#slc-facultades").val();
	//Esta funcion se ejecuta cada vez que el usuario selecciona o cambia un elemento de la lista.	
	$.ajax({
		url:"ajax/clases.php?accion=1",			//la accion 1 es para obtener las carreras
		method:"GET",
        data: "carrera="+carrera+"&"
              +"facultad="+facultad,
		dataType:"json",
		success:function(respuesta){
            console.log(respuesta);
        
			for (var i =0;i<respuesta.length;i++){
                $("#select-clases").append(`
                <option value="${respuesta[i].codigo}">${respuesta[i].clase}</option>`
				);
			}
		},
		error:function(error){
			console.error(error);
			$("#jefe").append(error.responseText);
		}
	});
});

//====================================================obtener secciones=================================================================
$("#select-clases").change(function(){
	var carrera = $("#select-carreras").val();
    var facultad = $("#slc-facultades").val();
    var clase = $("#select-clases").val();

	//Esta funcion se ejecuta cada vez que el usuario selecciona o cambia un elemento de la lista.	
	$.ajax({
		url:"ajax/secciones.php?accion=1",			//la accion 1 es para obtener las seccioness
		method:"GET",
        data: "codCarrera="+carrera+"&"
              +"facultad="+facultad+"&"
              +"codClase="+clase,
		dataType:"json",
		success:function(respuesta){
            console.log(respuesta);

			for (var i =0;i<respuesta.length;i++){
                $("#select-secciones").append(`
                <option value="${respuesta[i].seccion}"><b>Seccion:</b> ${respuesta[i].seccion} <b>cupos:</b> ${respuesta[i].cupos}   <b>dias:</b> ${respuesta[i].dias}   <b>Docente:</b> ${respuesta[i].docente}</option>`
				);
			}
		},
		error:function(error){
			console.error(error);
			$("#jefe").append(error.responseText);
		}
	});
});

////////////////////////////////////////////MATRICULAR ASIGNATURA//////////////////////////////////////////////////////

$("#btn-matricular").click(function(){
	var parametros = "seccion="+$("#select-secciones").val()+"&"+
					"codCarrera="+$("#select-carreras").val()+"&"+
					"cuenta="+$("#usuario-matriculando").val()+"&"+
					"codClase="+$("#select-clases").val()+"&"+
					"facultad="+$("#slc-facultades").val();
			
			console.log(parametros);		
			$("#btn-matricular").attr("enable",true);
			
			$.ajax({
				url:"ajax/matricula.php?accion=1",  //accion 1 para matricular clases
				data:parametros,
				method:"POST",
				dataType:"json",
				success:function(respuesta){
					console.log(respuesta);
					//('#modal-matricular').modal('hide');		
						$("#clases-matriculadas").html(
							`<tr>
								<td>${respuesta.codCarrera}${respuesta.codClase}</td>
								<td>${respuesta.seccion}</td>
								<td>${respuesta.clase}</td>
								<td>${respuesta.inicio}</td>
								<td>${respuesta.final}</td>
								<td>${respuesta.dias}</td>
								<td>${respuesta.uv}</td>
								<td>3</td>
							</tr>`
							+$("#clases-matriculadas").html());
					}	
				
			});
});

