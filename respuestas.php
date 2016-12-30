<?php
    require_once 'clases/BD.php';
    require_once 'clases/Muro.php';

    // Recuperamos la información de la sesión
    session_start();
    
    $respuestaMuro = $_POST["respuestaM"];    
    $fIdMuro = $_POST["fIdMuro"];
    
    if(isset($_SESSION['administrador'])){
        $usuario = $_SESSION['administrador'];
    }else if(isset($_SESSION['usuario'])){
        $usuario = $_SESSION['usuario'];        
    }
    
        
    if($respuestaMuro!=""){
        
        BD::insertarEnRespuestaMuro($respuestaMuro, $fIdMuro, $usuario); 
        
    }   
    
    BD::rellenarMuro();
    
?>