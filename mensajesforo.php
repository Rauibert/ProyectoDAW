<?php

    require_once 'clases/BD.php';

// Recuperamos la información de la sesión
    session_start();
    // Y comprobamos que el usuario se haya autentificado
    if (!isset($_SESSION['administrador'])&& !isset($_SESSION['usuario'])) {        
        die("Error - debe <a href='index.php'>identificarse</a>.<br />");
    }else{
        
        
    }
?>


<html>
    <head>
        <meta charset="UTF-8">
        <title>DevSocial - La red social de los programadores</title>
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
		<a href="#" class="bt-menu"><i class="fa fa-bars" aria-hidden="true"></i></a>
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
        
        <div id="respforo">
            <div id="respuestasforo">
                <?php BD::rellenarRespuestaForo($_GET['idForo']);?>
            </div>
            
            <form action="respuestasForo.php" name="formularioRForo" id="formularioRForo" method="POST">
                <h3>Respuesta </h3><textarea name="respuestaForo" id="respuestaForo" cols="100" rows="5"></textarea><br/>
                <input type="hidden" name="usuarioRespForo" value="<?php if(isset($_SESSION['administrador'])){echo $_SESSION['administrador'];}else if(isset($_SESSION['usuario'])){echo $_SESSION['usuario'];} ?>"</input>
                <input type="hidden" name="idRForo" value="<?php echo $_GET['idForo']; ?>"></input>
                <input type="submit" name="sendRespuestaForo" id="sendRespuestaForo" value="Enviar"/><br/>                
            </form>
        </div>
        
        <footer>
            Copyright 2016
        </footer>    
        
        
        <script src="js/jquery-1.12.0.min.js"></script>
        <script src="js/foro.js"></script>  
        <script src="js/menu.js"></script> 
    </body>
</html>