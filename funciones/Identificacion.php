<?php

class Identificacion{

    public static function identificarse(){
        // Recuperamos la información de la sesión
        session_start();
        // Y comprobamos que el usuario se haya autentificado
        if (!isset($_SESSION['administrador'])&& !isset($_SESSION['usuario'])) {
            die("Error - debe <a href='index.php'>identificarse</a>.<br />");
        }else{

        }
    }



    
}



?>
