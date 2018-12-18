//================================ registrar docente=======================
$("#registrar-docente").click(function(){
	var parametros="nombre="+$("#txt-NombreDocente").val()+"&"
                  +"num="+$("#txt-numeroProf").val()+"&"
                  +"pass="+$("#txt-passDocente").val();

	console.log(parametros);
	$.ajax({
		url:"ajax/docente.php?accion=2",		//accion=2 es para guardar las carreras
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