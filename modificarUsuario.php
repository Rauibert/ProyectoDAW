<?php

    require_once 'clases/BD.php';
    
    $usuarioAnterior = $_POST['usuarioAnterior'];
    $usuario = $_POST['modificarUsuario'];
    $pass = $_POST['modificarPass']; 
    
    
    
    if(isset($_POST['modificarAdministrador'])){
        $isAdministrador = '1';
    }else{
        $isAdministrador = '0';
    }
    
    if($usuario!="" && $pass != ""){
    
        BD::modificarUsuario($usuarioAnterior, $usuario, $pass, $isAdministrador);
       
    }else{
        echo '<script>alert("Los campos Usaurio y Password deben estar rellenos.");</script>';
    }

    BD::rellenarTablaUsuarios(); 
    
    

?>