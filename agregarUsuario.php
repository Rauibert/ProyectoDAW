<?php

    require_once 'clases/BD.php';    
    
    $usuario = $_POST['agregarUsuario'];
    $pass = $_POST['agregarPass'];
    
    if(isset($_POST['agregarAdministrador'])){
        $isAdministrador = $_POST['agregarAdministrador'];
    }else{
        $isAdministrador = '0';
    }    
    
    
    if($usuario!="" && $pass != ""){
       
        BD::insertarUsuario($usuario, $pass, $isAdministrador);
    
       
    }else{
        echo '<script>alert("Los campos Usaurio y Password deben estar rellenos.");</script>';
    }
    
    
    BD::rellenarTablaUsuarios();     


?>