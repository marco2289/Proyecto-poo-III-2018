$("#logJefes").click(function(){
    var parametros = "numero="+$("#numEmpleado").val() + "&password="+$("#clave").val();
      console.log(parametros);
// caso en que inicie sesion un jefe de departamento
    $.ajax({
           url:"ajax/empleados.php?accion=1",
           data:parametros,
           dataType:"json",
           method:"POST",
           success:function(respuesta){
               console.log(respuesta);
               if (respuesta.estatus == 1){
                       window.location.href = "jefes.php";//redireccionar     
                       console.log("Jefe ingresando: "+respuesta.nombre);
               }else 
                   alert("Credenciales invalidas");
           },
           error:function(error){
               console.error(error);
               $("#advertencia").append(error.responseText);
           }
    });
});

 //caso en que inicie sesion un coordinador de carrera
 $("#logCoor").click(function(){
    var parametros = "numero="+$("#numEmpleado").val() + "&password="+$("#clave").val();
    console.log(parametros);
    $.ajax({
        url:"ajax/empleados.php?accion=2",
        data:parametros,
        dataType:"json",
        method:"POST",
        success:function(respuesta){
            console.log(respuesta);
            if (respuesta.estatus == 1){ 
                    window.location.href = "coordinador.php";//redireccionar        CAMBIAR A COORD
                    console.log("Coordinador ingresando: "+respuesta.nombre);
            }else 
                alert("Credenciales invalidas");
        },
        error:function(error){
            console.error(error);
            $("#advertencia").append(error.responseText);
        }
    });
});

// caso en que inicie sesion un docente
$("#logProf").click(function(){
    var parametros = "numero="+$("#numEmpleado").val() + "&password="+$("#clave").val();
      console.log(parametros);
    $.ajax({
        url:"ajax/empleados.php?accion=3",
        data:parametros,
        dataType:"json",
        method:"POST",
        success:function(respuesta){
            console.log(respuesta);
            if (respuesta.estatus == 1){
                    window.location.href = "docente.php";//redireccionar      CAMBIAR A DOC
                    console.log("Docente ingresando: "+respuesta.nombre);
            }else 
                alert("Credenciales invalidas");
        },
        error:function(error){
            console.error(error);
            $("#advertencia").append(error.responseText);
        }
    });
});


   
   