<?php

    require_once 'clases/BD.php';
    require_once 'clases/Muro.php';
    require_once 'clases/Chat.php';
    require_once 'funciones/Identificacion.php';

    Identificacion::identificarse();

?>


<html>
    <head>
        <meta charset="UTF-8">
        <title>DevSocial - La red social de los programadores - Página principal</title>
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
            <a href="principal.php"><img src="img/titulo.png" class="logo"/></a>
            <span id="spanUsuario">Usuario: <?php if(isset($_SESSION['administrador'])){echo $_SESSION['administrador'];}else if(isset($_SESSION['usuario'])){echo $_SESSION['usuario'];} ?>
            <a href="logoff.php">(Cerrar sesión</a>)</span>
        </header>

        <div id="menu">
            <div class="menu_bar">
		<a href="#" class="bt-menu"><i class="fa fa-bars fa-lg" aria-hidden="true"></i></a>
            </div>

            <nav>
                <ul>
                    <li><a href="principal.php"><i class="fa fa-home fa-lg" aria-hidden="true"></i>Inicio</a></li>
                    <li><a href="foro.php"><i class="fa fa-comments-o fa-lg" aria-hidden="true"></i>Foro</a></li>
                    <li><a href="tutoriales.php"><i class="fa fa-book fa-lg" aria-hidden="true"></i>Tutoriales</a></li>
                    <?php if(isset($_SESSION['administrador'])):?>
                        <li><a href="gestion.php"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i>Gestión</a></li>
                    <?php endif;?>
		</ul>
            </nav>
        </div>

        <div id="muro">
            <span class="seccion"><center><h2>  MURO  </h2></center></span>

            <form action="muro.php" name="formulario" id="formulario" method="POST">
                <textarea name="mensajeMuro" id="mensajeMuro" cols="100" rows="5"></textarea>
                <input type="hidden" name="usuarioMuro" value="<?php if(isset($_SESSION['administrador'])){echo $_SESSION['administrador'];}else if(isset($_SESSION['usuario'])){echo $_SESSION['usuario'];} ?>"</input>
                <input type="submit" name="sendMuro" value="Enviar"/><br/>
            </form>


            <div id="respuestasMuro">
                <?php BD::rellenarMuro();?>
            </div>



        </div>
        <div id="chat">
            <span class="seccion"><center><h2>CHAT</h2></center></span>

            <div id="respuestaChat">
                <?php BD::rellenarChat();?>
            </div>

            <form action="chat.php" id="formularioChat"  method="POST">
                <textarea name="respuestaC" id="respuestaC" rows="5"></textarea><br/>
                <input type="submit" name="enviarRespChat" id="enviarRespChat" value="Enviar"/>
            </form>


        </div>

        <footer>
            Copyright 2016
        </footer>





        <script src="js/jquery-1.12.0.min.js"></script>
        <script src="js/funciones.js"></script>
        <script src="js/menu.js"></script>
    </body>
</html>
