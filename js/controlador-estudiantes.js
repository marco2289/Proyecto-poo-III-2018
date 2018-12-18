$("#registrar").click(function(){
 var parametros = "cuenta="+$("#nCuenta").val() + "&password="+$("#pass").val();
   console.log(parametros);
    $.ajax({
        url:"ajax/estudiante.php",
        data:parametros,
        dataType:"json",
        method:"POST",
        success:function(respuesta){
            console.log(respuesta);
            if (respuesta.estatus == 1){
                    window.location.href = "estudiantes.php";//redireccionar     
                    console.log("Estudiante ingresando: "+respuesta.nombre);
            }else 
                alert("Credenciales invalidas");
        },
        error:function(error){
            console.error(error);
            $("#advertencia").append(error.responseText);
        }
    });
});

