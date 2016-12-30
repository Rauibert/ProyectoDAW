<?php
    require_once 'clases/BD.php';
    require_once 'clases/Muro.php';

    $respuestaMuro = $_POST["mensajeMuro"];
    $usuario = $_POST["usuarioMuro"];
    
    
    
    if($respuestaMuro!=""){
        
        BD::insertarEnMuro($respuestaMuro, $usuario);
        
        
    }   
    
    BD::rellenarMuro();
    
?>