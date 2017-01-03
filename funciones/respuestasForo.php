<?php



    require_once '../clases/BD.php';
    require_once '../clases/Foro.php'; 


    $respuestaForo = $_POST["respuestaForo"];
    $usuarioRForo = $_POST['usuarioRespForo'];
    $idForo = $_POST['idRForo'];



    if($respuestaForo!=""){

        BD::insertarEnRespuestaForo($respuestaForo, $idForo, $usuarioRForo);

    }

    BD::rellenarRespuestaForo($idForo);


?>
