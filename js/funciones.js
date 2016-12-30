


$(document).on("ready",function(){
    
     
    
    $('#formulario').on('submit', function(e){
				
        e.preventDefault();
        recargarMuro();
	
    });        
    
    
    $('#formularioChat').on('submit', function(ex){
				
        ex.preventDefault();
	insertarChat();          
	
    });


    recargarFormulario();


});

function recargarMuro(){
    var pet = $('#formulario').attr('action');
        var met= $('#formulario').attr('method');

	$.ajax({
            beforeSend: function(){
            $('#status').html("Cargando...");
            },
                url: pet,
		type: met,
		data: $('#formulario').serialize(),
		success: function(resp){
                    $('#respuestasMuro').html(resp);
                    $('#mensajeMuro').val("");
                    console.log(resp);
		},
		error: function(jqXHR,estado,error){
                    console.log(estado);
                    console.log(error);
		},
		complete: function(jqXHR,estado){
                    console.log(estado);
                    
                    recargarFormulario();
		},
		timeout:1000
	})
    
}

function insertarChat(){ 
    
    var petChat = $('#formularioChat').attr('action');
    var metChat = $('#formularioChat').attr('method');
    
    $.ajax({
            beforeSend: function(){
            $('#status').html("Cargando...");
            },
                url: petChat,
		type: metChat,
		data: $('#formularioChat').serialize(),
		success: function(respChat){
                    $('#respuestaChat').html(respChat);
                    $('#respuestaC').val("");
                    console.log(respChat);
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



function cargarChat(){
    
    $.ajax({
            
                url: 'recarga.php',
		type: 'post',
		success: function(respChat){
                    $('#respuestaChat').html(respChat);
                    $('#respuestaC').html("");
                    console.log(respChat);
		},
		error: function(jqXHR,estado,error){
                    console.log(estado);
                    console.log(error);
		},
		complete: function(jqXHR,estado){
                    console.log(estado);
		},
		timeout:1000
	});
    
}

function cargarMuro(){
    
    $.ajax({
            
                url: 'recargaMuro.php',
		type: 'post',
		success: function(respMuro){
                    $('#respuestasMuro').html(respMuro);
                    console.log(respMuro);
		},
		error: function(jqXHR,estado,error){
                    console.log(estado);
                    console.log(error);
		},
		complete: function(jqXHR,estado){
                    console.log(estado);
		},
		timeout:1000
	});
    
}


function insertarRespuesta(formulario){
    
    $.ajax({
            
                url: 'respuestas.php',
		type: 'post',
                data: $(formulario).serialize(),
		success: function(respuestas){
                    $('#respuestasMuro').html(respuestas);                    
                    console.log(respuestas);
		},
		error: function(jqXHR,estado,error){
                    console.log(estado);
                    console.log(error);
		},
		complete: function(jqXHR,estado){
                    console.log(estado);
                    recargarFormulario();
		},
		timeout:1000
	})
        
}

function recargarFormulario(){
        
  $('.formularioRespuesta').on('submit', function(es){
            
    var formulario = '#' + $(this).attr('id');    
    es.preventDefault();
    insertarRespuesta(formulario);
   
  });
    
    
}



