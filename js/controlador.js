$("#select-clases").change(function(){
	//Esta funcion se ejecuta cada vez que el usuario selecciona o cambia un elemento de la lista.
	console.log("Usuario seleccionado: " + $("#select-secciones").val());
	$.ajax({
		url:"ajax/secciones.php?opcion=2&codigo="+$("#select-secciones").val(),
		method:"GET",
		dataType:"json",
		success:function(respuesta){
            console.log(respuesta);
            
            if ($("select-clases").val==$("select-secciones").val{
			$("#seccion").html("src", respuesta.clase);
			//$("#nombre").html(respuesta.nombre+" "+respuesta.apellido);
			//$("#usuario").html(respuesta.usuario);
			//$("#cantidad-tweets").html(respuesta.tweets);
			//$("#following").html(respuesta.following);
            //$("#followers").html(respuesta.followers);
        }

		},
		error:function(error){
			console.log(error);
		}
	});
});
