$("#select-clases").change(function(){
	var codigo = $("#select-clases").val();
	var facultad = $("#slc-facultades").val();
	//Esta funcion se ejecuta cada vez que el usuario selecciona o cambia un elemento de la lista.	
	$.ajax({
		url:"ajax/secciones.php?accion=1",			//la accion 1 es para obtener las carreras
		method:"GET",
        data: "codigo="+codigo,
		dataType:"json",
		success:function(respuesta){
            console.log(respuesta);
        
			for (var i =0;i<respuesta.length;i++){
                $("#select-secciones").append(`
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

$("#select-clases").change(function(){
	//Esta funcion se ejecuta cada vez que el usuario selecciona o cambia un elemento de la lista.
	console.log("Usuario seleccionado: " + $("#slc-usuario").val());
	$.ajax({
		url:"ajax/secciones.php?opcion=2&codigo="+$("#select-clases").val(),
		method:"GET",
		dataType:"json",
		success:function(respuesta){
			console.log(respuesta);
			$("#imagen-usuario").attr("src",respuesta.urlImagen);
			$("#select-secciones").append(respuesta.clase+" "+respuesta.maestro);
			$("#select-secci").html(respuesta.usuario);
			$("#cantidad-tweets").html(respuesta.tweets);
			$("#following").html(respuesta.following);
			$("#followers").html(respuesta.followers);

		},
		error:function(error){
			console.log(error);
		}
	});
});
