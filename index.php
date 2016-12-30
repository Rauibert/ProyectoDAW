<!DOCTYPE html>
<?php 
    require_once 'clases/BD.php';
    $conexion = BD::conectarBD();
    $error = "";   
    
        
    if(isset($_POST['identificar'])){
        $usuario = $_POST['usuario'];
        $password = $_POST['password'];
        
        $respuesta = BD::identificarUsuario($usuario, $password);
        
        if($respuesta){
            $administrador = BD::identificarAdministrador($usuario);
            
            if($administrador){  
                session_start();
                $_SESSION['administrador']=$_POST['usuario'];
                header("Location: principal.php");
                
            }else{
                session_start();
                $_SESSION['usuario']=$_POST['usuario'];
                header("Location: principal.php");
            }
            
            
        }else{
            $error = 'Usuario o contraseña invalidos';
        }
        
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
            <img src="img/titulo.png" class="logo"/>             
        </header>
        
        <div id="contenedor">            
            
            <!--Formulario para identificarse o darse de alta-->
            <form action='index.php' method='post' id="formularioLogin">
                <fieldset>
                    <span id="leyenda"><img src="img/login.png" class="icono"/>  Identificarse</span><br/><br/>
                    <label for='usuario' >Usuario:</label><br/>
                    <input type='text' name='usuario' id='usuario' maxlength="50" /><br/>
                    <label for='password' >Contraseña:</label><br/>
                    <input type='password' name='password' id='password' maxlength="50" /><br/>
                    <input type='submit' name='identificar' value='Identificar' />
                    <br/><br/>
                    <span id="spanAlta"><a href="alta.php">Darse de alta</a></span>
                    <br/>
                    <span class='error'><?php echo $error; ?></span>
                </fieldset>              
            </form> 
        </div>  
        
        <footer>
            Copyright 2016
        </footer>
       
    </body>
</html>
