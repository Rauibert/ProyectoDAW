$(document).on("ready",function(){
    
   $('#formularioAgregarUsuario').css("display", "none"); 
   $('#fieldsetFM').css("display", "none"); 
   $('#formularioEliminarUsuario').css("display", "none"); 
   $('#datosNuevos').css("display", "none");
    
   $('#btnAgregar').on('click', function(){
       $('#formularioAgregarUsuario').toggle('slow');
       $('#fieldsetFM').css("display", "none"); 
       $('#formularioEliminarUsuario').css("display", "none"); 
   });
   
   $('#btnModificar').on('click', function(){
       $('#fieldsetFM').toggle('slow');
       $('#formularioAgregarUsuario').css("display", "none"); 
       $('#formularioEliminarUsuario').css("display", "none"); 
   });
   
   $('#btnEliminar').on('click', function(){
       $('#formularioEliminarUsuario').toggle('slow'); 
       $('#formularioAgregarUsuario').css("display", "none"); 
       $('#fieldsetFM').css("display", "none");
   });  
   
   redibujar();
   
   
   
   
    
    
    
});


function insertarUsuario(){
    
    $.ajax({
                url: 'agregarUsuario.php',
		type: 'post',
		data: $('#formularioAgregarUsuario').serialize(),
		success: function(respUsuarios){
                    $('#cuadroUsuarios').html(respUsuarios);                    
                    console.log(respUsuarios);
		},
		error: function(jqXHR,estado,error){
                    console.log(estado);
                    console.log(error);
		},
		complete: function(jqXHR,estado){
                    console.log(estado);
                    rellenarSelectUsuario();
		},
		timeout:1000,
                
	})
}

function modificarUsuario(){
    
    $.ajax({
                url: 'modificarUsuario.php',
		type: 'post',
		data: $('#formularioModificarUsuario').serialize(),
		success: function(respUsuarios){
                    $('#cuadroUsuarios').html(respUsuarios);                    
                    console.log(respUsuarios);
		},
		error: function(jqXHR,estado,error){
                    console.log(estado);
                    console.log(error);
		},
		complete: function(jqXHR,estado){
                    console.log(estado);
                    rellenarSelectUsuario(); 
                    $('#datosMod').css("display", "none");
                    $('#datosNuevos').css("display", "none");
		},
		timeout:1000,
                
	})
}

function eliminarUsuario(){
    
    $.ajax({
                url: 'eliminarUsuario.php',
		type: 'post',
		data: $('#formularioEliminarUsuario').serialize(),
		success: function(respUsuarios){
                    $('#cuadroUsuarios').html(respUsuarios);                    
                    console.log(respUsuarios);
		},
		error: function(jqXHR,estado,error){
                    console.log(estado);
                    console.log(error);
		},
		complete: function(jqXHR,estado){
                    console.log(estado);
                    rellenarSelectUsuario();                     
		},
		timeout:1000,
                
	})
}




function rellenarUsuario(){
    
    $.ajax({
                url: 'rellenarModf.php',
		type: 'post',
		data: $('#formularioRellenoModificar').serialize(),
		success: function(respRelleno){
                    $('#datosMod').html(respRelleno);                    
                    console.log(respRelleno);
		},
		error: function(jqXHR,estado,error){
                    console.log(estado);
                    console.log(error);
		},
		complete: function(jqXHR,estado){
                    console.log(estado);
                    
		},
		timeout:1000
	})
}

function rellenarSelectUsuario(){
    
    $.ajax({
                url: 'rellenarSelectU.php',
		type: 'post',
		success: function(respSelect){
                    $('.selectU').html(respSelect);                    
                    console.log(respSelect);
		},
		error: function(jqXHR,estado,error){
                    console.log(estado);
                    console.log(error);
		},
		complete: function(jqXHR,estado){
                    console.log(estado);
                    
		},
		timeout:1000
	})
}


function rellenarSelectTutoriales(){
    
    $.ajax({
                url: 'rellenarSelectT.php',
		type: 'post',
		success: function(respSelect){
                    $('.selectT').html(respSelect);                    
                    console.log(respSelect);
		},
		error: function(jqXHR,estado,error){
                    console.log(estado);
                    console.log(error);
		},
		complete: function(jqXHR,estado){
                    console.log(estado);
                    
		},
		timeout:1000
	})
}




function redibujar(){
    

    $('#sendAgregarUsuario').on('click', function(e) {

        e.preventDefault();
        insertarUsuario();
        $('#agregarUsuario').val('');
        $('#agregarPass').val('');
        $('#agregarAdministrador').attr('checked', false);
        $('#formularioAgregarUsuario').css("display", "none");
    });

    $('#fieldsetFM').on('click', '#sendModificarUsuario', function(e) {

        e.preventDefault();
        modificarUsuario();
        $('#modificarUsuario').val('');
        $('#modificarPass').val('');
        $('#modificarAdministrador').attr('checked', false);

    });

    $('#formularioRellenoModificar').on('click', '#rellenarUsuario', function(ex) {
        $('#datosNuevos').css("display", "block");
        $('#datosMod').css("display", "block");
        
        ex.preventDefault();
        rellenarUsuario();
    });  
    
    
    $('#formularioEliminarUsuario').on('click', '#sendEliminarUsuario', function(exa) {  
        exa.preventDefault();
        
        if(confirm("¿Estas seguro de que quieres eliminar este usuario")){
            eliminarUsuario();
        }
        
    }); 
    
    $('#sendAgregarTutorial').on('click', function(ea) {

        ea.preventDefault();
        insertarTutorial();
        $('#agregarRuta').val('');
        $('#agregarTitulo').val('');
        
    });  
    
    
    $('#formularioEliminarTutorial').on('click', '#sendEliminarTutorial', function(exa) {  
        exa.preventDefault();
        
        if(confirm("¿Estas seguro de que quieres eliminar este tutorial")){
            eliminarTutorial();
        }
        
    }); 
    
    
    
   
}

function insertarTutorial(){
    
    $.ajax({
                url: 'agregarTutorial.php',
		type: 'post',
		data: $('#formularioAgregarTutorial').serialize(),
		success: function(respTutorial){
                    $('#cuadroTutoriales').html(respTutorial);                    
                    console.log(respTutorial);
		},
		error: function(jqXHR,estado,error){
                    console.log(estado);
                    console.log(error);
		},
		complete: function(jqXHR,estado){
                    console.log(estado);                    
                    rellenarSelectTutoriales();
		},
		timeout:1000,
                
	})
}

function eliminarTutorial(){
    
    $.ajax({
                url: 'eliminarTutorial.php',
		type: 'post',
		data: $('#formularioEliminarTutorial').serialize(),
		success: function(respTuto){
                    $('#cuadroTutoriales').html(respTuto);                    
                    console.log(respTuto);
		},
		error: function(jqXHR,estado,error){
                    console.log(estado);
                    console.log(error);
		},
		complete: function(jqXHR,estado){
                    console.log(estado);
                    rellenarSelectTutoriales();                     
		},
		timeout:1000,
                
	})
}