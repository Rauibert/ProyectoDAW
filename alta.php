<?php

     require_once 'clases/BD.php';


     if(isset($_POST['nuevoUsuario'])){
        $usuario = $_POST['nuevoUsuario'];
        $pass = $_POST['nuevoPass'];


        if($usuario!="" && $pass != ""){

            if(BD::comprobarUsuario($usuario)){
                 echo '<script>alert("Ya existe este usuario.");</script>';
            }else{
                BD::insertarUsuario($usuario, $pass, 0);
                header("Location: index.php");
            }

        }else{

            echo '<script>alert("Los campos Usaurio y Password deben estar rellenos.");</script>';

        }
     }


?>


<html>
    <head>
        <meta charset="UTF-8">
        <title>DevSocial - La red social de los programadores - Alta de Usuario</title>
        <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
        <link rel="icon" type="image/png" href="img/favicon.png" />
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
        <!--Iconos gratuitos Font Awesome-->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet"  type="text/css" />

        <!--Letras de Google Fonts-->
        <link href='https://fonts.googleapis.com/css?family=Titillium+Web|Inconsolata|Orbitron' rel='stylesheet' type='text/css'>
    </head>
    <body>
        <header>
            <a href="index.php"><img src="img/titulo.png" class="logo"/></a>             
        </header>
        <img src="img/matrix.gif" width="100%" height="20%"/><br/>

        <div id="contenedor">
            <center><h3>Bienvenido a DevSocial, la nueva red social para programadores.<br/> Aquí podrá registarse como usuario. Gracias por unirse a nosotros</h3></center><br/><br/>
            <form action="" name="formularioAgregarNuevoUsuario" id="formularioAgregarNuevoUsuario" method="POST">
                    <fieldset>
                        <legend><h3>Agregar Nuevo Usuario</h3></legend>
                        <label>Usuario </label><input type="text" name="nuevoUsuario" id="nuevoUsuario"/><br/>
                        <label>Password </label><input type="password" name="nuevoPass" id="nuevoPass"/><br/>

                        <input type="submit" name="sendNuevoUsuario" id="sendNuevoUsuario" value="Agregar Nuevo Usuario"/><br/>
                    </fieldset>
                </form>


        </div>

        <footer>
            Copyright 2016
        </footer>



    </body>
</html>
