$('document').ready(function(){

        $('#entrar').click(function() {
            var usuario= $('#nombre').val();
            var contrasena= $('#password').val();
            
            if (usuario== "" || contrasena == "") {
                alert("Los campos no deben estar vacios!");
            }else {

            var ajax = $.ajax({
                    type: "POST",
                    url: "/controlador/login.php",
                    data: {
                        "usuario": usuario,
                        "contrasena": contrasena
                    },
            dataType: "json",
            beforeSend: function() {},
            error: function(xhr, textStatus, errorThrown) {
                        console.log("error");
                        console.log(errorThrown);
                        console.log(xhr);
                        console.log(textStatus);
                        $("#iniciaSesion").children().remove();
                        $("#iniciaSesion").attr("class", "alert-danger");
                        $("#iniciaSesion").attr("role", "alert");
                        $("#iniciaSesion").append("<p style='text-align:center;'><strong>Error </<strong></p>");
                    }

                });

                ajax.done(function(data) {
                    console.log(data);

                    if (jQuery.isEmptyObject(data)) {
                        $("#iniciaSesion").html("No Existe");
                        $("#iniciaSesion").attr("class", "alert-danger");

                    }
                    else {
                        if (data.rol == '1') {
                            window.location= "vista/admin.php";
                        }
                    }
                });
            }
        });
        
        //registrar
        
            $('#registrar').click(function() {
        //alert('hola');

        var usuario = $('#usuario').val();
        var pw = $('#contrasena').val();
        var pw2 = $('#contrasena2').val();
    

        //alert (usuario + " "+ pw + " " + pw2);

        if (usuario == "" || pw == "" || pw2 == "") {
            alert("no deben haber campos vacios");
        }
        else {
            if (pw !== pw2) {
                alert("las contraseñas no coinciden");
            }
            else {
                //alert(pw + " = "+ pw2);
                var ajax = $.ajax({
                    type: "POST",
                    url: "../../controlador/registrar.php",
                    data: {
                        "usuario": usuario,
                        "password": pw,
                    },
                    dataType: "json", //aqui se convierte automaticamente a json
                    beforeSend: function() {},
                    error: function(xhr, textStatus, errorThrown) {
                        console.log("error");
                        console.log(errorThrown);
                        console.log(xhr);
                        console.log(textStatus);

                        $("#mensaje").children().remove();
                        $("#mensaje").attr("class", "alert-danger");
                        $("#mensaje").attr("role", "alert");
                        $("#mensaje").append("<p style='text-align:center;'><strong>Error </<strong></p>");
                    }
                });
                ajax.done(function(data) {

                    console.log(data);
                    if (data.isTrue) {
                        alert("Te has registrado con exito!");
                        //alert("Solicitud Exitosa!");
                    }
                    else {
                        alert("Error Contacte al administrador");
                    }
                });
            }
        }
    });
        
        //fin registrar
        
    }); //Final
