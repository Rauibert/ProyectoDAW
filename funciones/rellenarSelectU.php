<?php

    require_once '../clases/BD.php';  

    session_start();

    BD::rellenarSelectUsuarios($_SESSION['administrador']);


?>
