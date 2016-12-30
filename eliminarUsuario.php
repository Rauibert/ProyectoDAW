<?php

    require_once 'clases/BD.php';
    
    $usuario = $_POST['selectUsuario'];
    
    
      
    BD::eliminarUsuario($usuario);
    
    

    BD::rellenarTablaUsuarios(); 
    
    

?>