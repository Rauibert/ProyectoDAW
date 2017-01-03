<?php

    require_once '../clases/BD.php';


    $tituloForo = $_POST['tituloForo'];
    $mensajeForo = $_POST['mensajeForo'];
    $usuarioForo = $_POST['usuarioForo'];

    if($tituloForo!="" && $mensajeForo != ""){
        BD::insertarEnForo($tituloForo, $mensajeForo, $usuarioForo);

    }else{
        echo '<script>alert("Los campos Titulo y Mensaje deben estar rellenos.");</script>';
    }

     BD::rellenarForo();


?>
