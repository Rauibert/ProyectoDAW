<?php

    require_once 'clases/BD.php';

// Recuperamos la información de la sesión
    session_start();
    // Y comprobamos que el usuario se haya autentificado
    if (!isset($_SESSION['administrador'])) {        
        die("Error - debe <a href='index.php'>identificarse</a>.<br />");
    }else{
        
    }
?>


<html>
    <head>
        <meta charset="UTF-8">
        <title>DevSocial - La red social de los programadores - Gestión </title>
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
            <a href="logoff.php">(Cerrar sesión)</a></span>     
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
        
        
     
        <section class="wrapper">    
       
            
        <!-- PESTAÑAS -->    
        <ul class="tabs">
            <li><a href="#gestUsuarios">Gestión de Usuarios</a></li>
            <li><a href="#gestTutoriales">Gestión de tutoriales</a></li>            
        </ul>
        
          
        
            
         <section class="block">   
            <article id="gestUsuarios">
                
                <div id="cuadroUsuarios">
                    <?php BD::rellenarTablaUsuarios(); ?>
                </div>
                
                <div id="botones">
                    <button id="btnAgregar">Agregar Usuarios</button>
                    <button id="btnModificar">Modificar Usuarios</button>
                    <button id="btnEliminar">Eliminar Usuarios</button>
                </div>   
                             
                <form action="agregarUsuario.php" name="formularioAgregarUsuario" id="formularioAgregarUsuario" method="POST">
                    <fieldset>
                        <legend><h4>Agregar Usuario</h4></legend>   
                        <label>Usuario </label><input type="text" name="agregarUsuario" id="agregarUsuario"/><br/>
                        <label>Password </label><input type="password" name="agregarPass" id="agregarPass"/><br/>
                        <label>Administrador </label><input type="checkbox" name="agregarAdministrador" id="agregarAdministrador" value="1"/><br/>

                        <input type="submit" name="sendAgregarUsuario" id="sendAgregarUsuario" value="Agregar Usuario"/><br/>
                    </fieldset>
                </form>
                
                <fieldset id="fieldsetFM">
                    <legend><h4>Modificar Usuario</h4></legend>
                    <form action="rellenarModf.php" name="formularioRellenoModificar" id="formularioRellenoModificar" method="POST">
                        <div><label>Usuario a modificar</label><div class="selectU"><?php BD::rellenarSelectUsuarios($_SESSION['administrador']);?></div> 
                          <input type="submit" name="rellenarUsuario" id="rellenarUsuario" value="Rellenar Usuario"/></div> 
                    </form>
                        
                        
                    <form action="modificarUsuario.php" name="formularioModificarUsuario" id="formularioModificarUsuario" method="POST">

                            <div id="datosMod">
                               
                            </div>
                            <div id="datosNuevos">
                                <br/><b>Nuevos datos</b><br/>
                                <label>Nuevo Usuario </label><input type="text" name="modificarUsuario" id="modificarUsuario"/><br/>
                                <label>Nuevo Password </label><input type="password" name="modificarPass" id="modificarPass"/><br/>
                                <label>Administrador </label><input type="checkbox" name="modificarAdministrador" id="modificarAdministrador"/><br/>
                              

                            <input type="submit" name="sendModificarUsuario" id="sendModificarUsuario" value="Modificar Usuario"/><br/>
                            </div>  
                    </form>
                </fieldset>
                
                
                <form action="eliminarUsuario.php" name="formularioEliminarUsuario" id="formularioEliminarUsuario" method="POST">
                    <fieldset>
                        <legend><h4>Eliminar Usuario</h4></legend>
                            <div class="selectU">
                                <?php BD::rellenarSelectUsuarios($_SESSION['administrador']); ?>
                            </div>

                        <input type="submit" name="sendEliminarUsuario" id="sendEliminarUsuario" value="Eliminar Usuario"/><br/>
                    </fieldset> 
                </form>
                   
                
                
            </article>
            
            <article id="gestTutoriales">
                
                <div id="cuadroTutoriales">
                    <?php BD::rellenarTablaTutoriales(); ?> 
                </div>
                
                <form action="agregarTutorial.php" name="formularioAgregarTutorial" id="formularioAgregarTutorial" method="POST">
                    <fieldset>
                        <legend><h4>Agregar Tutorial</h4></legend>   
                        <label>Ruta </label><input type="text" name="agregarRuta" id="agregarRuta"/><br/>
                        <label>Título </label><input type="text" name="agregarTitulo" id="agregarTitulo"/><br/>
                        <input type="hidden" name="agregarUsuarioTutorial" id="agregarUsuarioTutorial" value="<?php echo $_SESSION['administrador']; ?>"/><br/>

                        <input type="submit" name="sendAgregarTutorial" id="sendAgregarTutorial" value="Agregar Tutorial"/><br/>
                    </fieldset>
                </form>
                
                <form action="eliminarTutorial.php" name="formularioEliminarTutorial" id="formularioEliminarTutorial" method="POST">
                    <fieldset>
                        <legend><h4>Eliminar Tutorial</h4></legend>
                            <div class="selectT">
                                <?php BD::rellenarSelectTutoriales(); ?>
                            </div>

                        <input type="submit" name="sendEliminarTutorial" id="sendEliminarTutorial" value="Eliminar Tutorial"/><br/>
                    </fieldset> 
                </form>
                
                
                
            </article>
         </section>    
        </section>   
        
        
        <footer>
            Copyright 2016
        </footer>   
        
        
        <script src="js/jquery-1.12.0.min.js"></script>          
        <script src="js/menu.js"></script> 
        <script src="js/gestion.js"></script>
        <script src="js/tabs.js"></script> 
    </body>
</html>