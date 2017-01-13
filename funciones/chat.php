<?php

    // Recuperamos la información de la sesión
    session_start();

    require_once '../clases/BD.php';
    require_once '../clases/Chat.php';

    $mensajeChat = $_POST["respuestaC"];

    if(isset($_SESSION['administrador'])){
        $usuario = $_SESSION['administrador'];
    }else if(isset($_SESSION['usuario'])){
        $usuario = $_SESSION['usuario'];
    }


    if($mensajeChat!=""){

        BD::insertarEnChat($mensajeChat, $usuario);

    }

    BD::rellenarChat();


?>
