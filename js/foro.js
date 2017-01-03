


$(document).on("ready",function(){

    $('#foro').on('click','#sendForo', function(ex){

        ex.preventDefault();
	insertarForo();

    });

     $('#respforo').on('click','#sendRespuestaForo', function(ex){

        ex.preventDefault();
	insertarRespuestaForo();

    });





});


function insertarForo(){

    $.ajax({
                url: 'funciones/temasForo.php',
		type: 'post',
		data: $('#formularioForo').serialize(),
		success: function(respForo){
                    $('#titulosforo').html(respForo);
                    console.log(respForo);
		},
		error: function(jqXHR,estado,error){
                    console.log(estado);
                    console.log(error);
		},
		complete: function(jqXHR,estado){
                    console.log(estado);
                    $('#tituloForo').val("");
                    $('#mensajeForo').val("");
		},
		timeout:1000,

	})
}


function insertarRespuestaForo(){

    $.ajax({
                url: 'funciones/respuestasForo.php',
		type: 'post',
		data: $('#formularioRForo').serialize(),
		success: function(respForo){
                    $('#respuestasforo').html(respForo);
                    console.log(respForo);
		},
		error: function(jqXHR,estado,error){
                    console.log(estado);
                    console.log(error);
		},
		complete: function(jqXHR,estado){
                    console.log(estado);
                    $('#respuestaForo').val("");
		},
		timeout:1000
	})
}
