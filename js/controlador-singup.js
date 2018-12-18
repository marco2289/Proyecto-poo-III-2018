//============================================obtener facultades====================================================================
$(document).ready(function(){
	console.log("Se ha cargado el DOM");
	$.ajax({
		url:"ajax/facultad.php",
		method:"GET",
		dataType:"json",
		success:function(respuesta){
            console.log(respuesta);
            $("#facultad").append(`<option value="seleccionar">Seleccione la faculdad</option>`);
			for (var i =0;i<respuesta.length;i++)
                $("#facultad").append(`
                <option value="${respuesta[i].abreviatura}">${respuesta[i].Nombre}</option>`
                );
		},
		error:function(error){
			console.error(error);
		}
	});
});

//============================================obtener centros=========================================================================
$(document).ready(function(){
	console.log("Se ha cargado el DOM");
	$.ajax({
		url:"ajax/centros.php?accion=1",
		method:"GET",
		dataType:"json",
		success:function(respuesta){
            console.log(respuesta);
			$("#centro").append(`<option value="seleccionar">Seleccione el centro</option>`);
			for (var i =0;i<respuesta.length;i++){
                $("#centro").append(`
                <option value="${respuesta[i].centro}">${respuesta[i].centro}</option>`
				);	
			}
		},
		error:function(error){
			console.error(error);
		}
	});
});

//====================================================obtener carreras=================================================================
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
                <option value="${respuesta[i].carrera}">${respuesta[i].carrera}</option>`
				);
			}
		},
		error:function(error){
			console.error(error);
			$("#jefe").append(error.responseText);
		}
	});
});

 //====================================guardar alumnos=========================================
 $("#registrar-alumno").click(function(){
    var parametros="nombre="+$("#txt-nombre").val()+"&"
                  +"apellido="+$("#txt-apellido").val()+"&"
                  +"cuenta="+$("#cuenta").val()+"&"
                  +"ID="+$("#identidad").val()+"&"
                  +"pass="+$("#contraseña").val()+"&"
                  +"correo="+$("#mail").val()+"&"
                  +"facultad="+$("#facultad").val()+"&"
                  +"carrera="+$("#carrera").val()+"&"
                  +"centro="+$("#centro").val();

    console.log(parametros);
    $.ajax({
        url:"ajax/alumnos.php?accion=2",		//accion=2 es para guardar las carreras
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

//========================================================VALIDACIONES=============================================================
/*function registrar() {
    validarCampoVacio("txt-nombre");
    validarCampoVacio("txt-apellido");
    validarCampoVacio("cuenta");
    validarCampoVacio("identidad");
    validarCampoVacio("mail");
    validarCampoVacio("contraseña");
    if (
        
        validarCampoVacio("txt-nombre") &&
        validarCampoVacio("txt-apellido") &&
        validarCampoVacio("cuenta") &&
        validarCampoVacio("identidad") &&
        validarCampoVacio("mail") &&
        validarCampoVacio("contraseña")

    ) 
/////////////////////////////////////////////////////////////////////////////////////////////
function validarCampoVacio(id) {
    if (document.getElementById(id).value == "") {
        document.getElementById(id).classList.remove("campo-valido");
        document.getElementById(id).classList.add("campo-invalido");
        return false;
    } else {
        document.getElementById(id).classList.remove("campo-invalido");
        document.getElementById(id).classList.add("campo-valido");
        return true;
    }
}
}*/