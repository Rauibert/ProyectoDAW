<?php

    require_once '../clases/BD.php';    

    $ruta = $_POST['agregarRuta'];
    $tutorial = $_POST['agregarTitulo'];
    $usuario = $_POST['agregarUsuarioTutorial'];

    $idUsuario = BD::consultarIdUsuario($usuario);

    if($ruta!="" && $tutorial != ""){

        BD::insertarTutorial($ruta, $tutorial, $idUsuario);


    }else{
        echo '<script>alert("Los campos ruta y tutorial deben estar rellenos.");</script>';
    }


    BD::rellenarTablaTutoriales();


?>
