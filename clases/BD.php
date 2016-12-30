<?php

/* **************************************************************
 * Clase BD: base de datos en PHP para el proyecto DevSocial    * 
 * Autor: Raúl Alberto Nimo Flor                                * 
 *                                                              *
 ***************************************************************/
require_once dirname(__FILE__) . '/Muro.php';
require_once dirname(__FILE__) . '/Chat.php';
require_once dirname(__FILE__) . '/Foro.php';
require_once dirname(__FILE__) . '/RespuestaForo.php';
require_once dirname(__FILE__) . '/Tutorial.php';
require_once dirname(__FILE__) . '/Usuario.php';



class BD{
 
    /**
     *  Función para conectar la base de datos 
     */
    public static function conectarBD(){
        //Conectamos la base de datos
        try {
            $conectar = new PDO("mysql:host=localhost;dbname=bd_proyecto", "dev_admin", "dev_admin");
            $conectar->exec("SET CHARACTER SET utf8");
            return $conectar;
        }
        catch (PDOException $e) {
            $error = $e->getCode();
            $mensaje = $e->getMessage();            
        }

    }

   
    /*******************
    * IDENTIFICACIONES *
    ********************/
    
    /**
     * Función para identificar el usuario
     * @param string $usuario
     * @param string $pass
     * @return boolean
     */
    public static function identificarUsuario($usuario, $pass){
        $conexion = self::conectarBD();
        $passEscrito = "";
        $hash="";

        $sqlConsulta = "SELECT pass FROM Usuarios WHERE usuario='$usuario'";
        $resultado =$conexion->query($sqlConsulta);

        while ($registro = $resultado->fetch()){
            $hash = $registro['pass'];                          
        }
                
        if(password_verify($pass, $hash)){
            return true;
        } else {        
            return false;
        }     

    }    
    
    /**
     * Función para determinar si un usuario es administrador
     * @param string $usuario
     * @return string
     */
    public static function identificarAdministrador($usuario){
        $conexion = self::conectarBD();
        $sqlConsulta = "SELECT isAdministrador FROM Usuarios WHERE usuario='$usuario'";
        
        $resultado =$conexion->query($sqlConsulta);

        while ($registro = $resultado->fetch()){
            $administrador = $registro['isAdministrador'];                          
        }
        
        return $administrador;
        
    }
    
    
    /**
     * Función para comprobar si existe un usuario 
     * @param string $usuario
     */
    public static function comprobarUsuario($usuario){
        
        $flagExiste = false;

        $conexion = self::conectarBD();

        //Consultamos si el usuario existe
        $sql = "SELECT usuario FROM Usuarios";
        $resultado = $conexion->query($sql);

        while ($registro = $resultado->fetch()) {
            if ($usuario == $registro['usuario']) {
                $flagExiste = true;
            }
        }

        return $flagExiste;
    }
    
    
    /************
    * CONSULTAS *
    ************/
    
    
    /**
     * Función para consultar los datos del chat
     * @return mixed
     */   
    public static function consultarChat(){
        
        try {
            $conexion = self::conectarBD(); 
            $sql = "SELECT * FROM Chat ORDER BY idChat";
            $resultado =$conexion->query($sql);  
            
            return $resultado;
       
        }
        catch (PDOException $e) {
            $error = $e->getCode();
            $mensaje = $e->getMessage();
        }
        
        
    }
    
    
    /**
     * Función para consultar los datos del muro
     * @return mixed
     */
    public static function consultarMuro(){
        
        try {
            $conexion = self::conectarBD(); 
            $sql = "SELECT * FROM Muro ORDER BY idMuro";
            $resultado =$conexion->query($sql);  
            
            return $resultado;
       
        }
        catch (PDOException $e) {
            $error = $e->getCode();
            $mensaje = $e->getMessage();
        }
        
        
    }
    
    /**
     * Función para consultar las respuestas de los mensajes de muro
     * @return mixed
     */
    public static function consultarRespuestaMuro(){
        
        try {
            $conexion = self::conectarBD(); 
            $sql = "SELECT * FROM RespuestaMuro ORDER BY idRespuestaM";
            $resultado =$conexion->query($sql);  
            
            return $resultado;
       
        }
        catch (PDOException $e) {
            $error = $e->getCode();
            $mensaje = $e->getMessage();
        }
        
        
    }
    
    /**
     * Función para consultar las respuestas de un mensaje de muro con idMuro
     * @param int $idMuro
     * @return mixed
     */
    public static function consultarRespuestaMuroPorIdMuro($idMuro){
        
        try {
            $conexion = self::conectarBD(); 
            $sql = "SELECT * FROM RespuestaMuro WHERE idMuro='".$idMuro."' ORDER BY idRespuestaM";
            $resultado =$conexion->query($sql);   
            
            return $resultado;
       
        }
        catch (PDOException $e) {
            $error = $e->getCode();
            $mensaje = $e->getMessage();
        }
        
        
    }
    
    /**
     * Función para consultar usuario por id
     * @param int $idUsuario
     * @return object
     */
    public static function consultarUsuario($idUsuario){
        
        try {
            $conexion = self::conectarBD(); 
            $sql = "SELECT usuario FROM Usuarios WHERE idUsuario='".$idUsuario."'";
            $resultado =$conexion->query($sql);  
            
            if(isset($resultado)){
                $row = $resultado->fetch();
                $datoUsuario = $row['usuario'];                
            }
                
            return $datoUsuario;
       
        }
        catch (PDOException $e) {
            $error = $e->getCode();
            $mensaje = $e->getMessage();
        }
        
    }    
    
    /**
     * Función para consultar idUsuario por nombre de usuario
     * @param string $usuario
     * @return int
     */
    public static function consultarIdUsuario($usuario){
        
        try {
            $conexion = self::conectarBD(); 
            $sql = "SELECT idUsuario FROM Usuarios WHERE usuario='".$usuario."'";
            $resultado =$conexion->query($sql);  
            
            if(isset($resultado)){
                $row = $resultado->fetch();
                $usuarioConsultado = $row['idUsuario'];                
            }
                
            return $usuarioConsultado;
       
        }
        catch (PDOException $e) {
            $error = $e->getCode();
            $mensaje = $e->getMessage();
        }
        
    }  
    
    /**
     * Función para consultar todos los datos de la tabla Usuarios
     * 
     */    
    public static function consultarUsuarios(){
        
        try {
            $conexion = self::conectarBD(); 
            $sql = "SELECT * FROM Usuarios ORDER BY idUsuario";
            $resultado =$conexion->query($sql);  
            
            return $resultado;    
        }
        catch (PDOException $e) {
            $error = $e->getCode();
            $mensaje = $e->getMessage();
        }
        
    } 
    
    /**
     * Función para consultar todos los datos de un usuario por su nombre
     * @param string $usuario
     */
    public static function consultarUsuarioPorNombre($usuario){
        
        try {
            $conexion = self::conectarBD(); 
            $sql = "SELECT * FROM Usuarios WHERE usuario = '".$usuario."' ORDER BY idUsuario";
            $resultado =$conexion->query($sql);  
            
            return $resultado;    
        }
        catch (PDOException $e) {
            $error = $e->getCode();
            $mensaje = $e->getMessage();
        }
        
    }     
    
    
    /**
     * Función que consulta el  id del usuario que escribe en un determinado mensaje de muro
     * @param string $idMuro
     * @return string
     */
    public static function consultarUsuarioMuro($idMuro){
        
        try {
            $conexion = self::conectarBD(); 
            $sql = "SELECT idUsuario FROM escribe WHERE idMuro='".$idMuro."'";
            $resultado =$conexion->query($sql);  
            
            if(isset($resultado)){
                $row = $resultado->fetch();
                $datosId = $row['idUsuario'];                
            }
            
            
            $datosUsuario = $datosId;

                
            return $datosUsuario;
       
        }
        catch (PDOException $e) {
            $error = $e->getCode();
            $mensaje = $e->getMessage();
        }
        
    } 
    
   
    /**
     * Función que consulta los datos de un mensaje de foro determinado
     * @param type $idForo
     * @return object
     */
    
    public static function consultarForoPorId($idForo){
        
        try {
            $conexion = self::conectarBD(); 
            $sql = "SELECT * FROM Foro WHERE idForo='".$idForo."'ORDER BY idForo";
            $resultado =$conexion->query($sql);  
            
            if(isset($resultado)){
                                
                while($row = $resultado->fetch()){
                    $datosForo = new Foro($row);                    
                }
            
            }
            return $datosForo;
       
        }
        catch (PDOException $e) {
            $error = $e->getCode();
            $mensaje = $e->getMessage();
        }
        
    }
    
    
    /**
     * Función que consulta los datos del foro
     * @return mixed
     */
    public static function consultarForo(){
        
        try {
            $conexion = self::conectarBD(); 
            $sql = "SELECT * FROM Foro ORDER BY idForo";
            $resultado =$conexion->query($sql);  
            
            return $resultado;
       
        }
        catch (PDOException $e) {
            $error = $e->getCode();
            $mensaje = $e->getMessage();
        }
        
    }
    
    
    /**
     * Función que consulta las respuestas de un mensaje de foro
     * @param type $idForo
     * @return mixed
     */    
    public static function consultarRespuestaForo($idForo){
        
        try {
            $conexion = self::conectarBD(); 
            $sql = "SELECT * FROM RespuestaForo WHERE idForo='".$idForo."' ORDER BY idRespuesta";
            $resultado =$conexion->query($sql);  
            
            return $resultado;
       
        }
        catch (PDOException $e) {
            $error = $e->getCode();
            $mensaje = $e->getMessage();
        }
    }
    
    
    /**
     * Función que consulta la id de un usuario que escribe en el foro
     * @param type $idForo
     * @return string
     */
    public static function consultarIdUsuarioPorIdForo($idForo){
        
        try {
            $conexion = self::conectarBD(); 
            $sql = "SELECT idUsuario FROM participa WHERE idForo='".$idForo."' ORDER BY idForo";
            $resultado =$conexion->query($sql); 
            
            if(isset($resultado)){
                                
                while($row = $resultado->fetch()){
                    $idUsuarioF = $row['idUsuario'];
                }
            
            }
            return $idUsuarioF;
       
        }
        catch (PDOException $e) {
            $error = $e->getCode();
            $mensaje = $e->getMessage();
        }
    }
    
    
    /**
     * Función para consultar los datos de la tabla tutoriales
     * @return mixed
     */
    public static function consultarTutoriales(){
        
        try {
            $conexion = self::conectarBD(); 
            $sql = "SELECT * FROM Tutoriales ORDER BY idTutoriales";
            $resultado =$conexion->query($sql);  
            
            return $resultado;
       
        }
        catch (PDOException $e) {
            $error = $e->getCode();
            $mensaje = $e->getMessage();
        }
        
        
    }
    
    
   /***************
    * INSERCIONES *
    **************/ 
    
    /**
     * Función para insertar datos en el chat
     * @param string $mensajeChat
     * @param string $usuario
     */
    public static function insertarEnChat($mensajeChat, $usuario){
        
        try {
            $conexion = self::conectarBD(); 
            
            $usuarioChat = self::consultarIdUsuario($usuario);
            
            $insercionChat = $conexion->prepare('INSERT INTO Chat (mensajeChat,idUsuario) VALUES (?,?);');                    
            $insercionChat->bindParam(1, $mensajeChat);
            $insercionChat->bindParam(2, $usuarioChat);
            $insercionChat->execute();        
        }
        catch (PDOException $e) {
            $error = $e->getCode();
            $mensaje = $e->getMessage();
        }
        
        
    }
    
    /**
     * Función para insertar un usuario en la base de datos
     * @param string $usuario
     * @param string $pass
     * @param string $isAdministrador
     */
    public static function insertarUsuario($usuario, $pass, $isAdministrador){
        
        $flagExiste = false;
        
        try {
            $conexion = self::conectarBD(); 
            
            //Creamos un hash a partir de un password
            $password = self::crearHash($pass);          
            
            //Comprobamos si existe el nombre de usuario
            $flagExiste = self::comprobarUsuario($usuario);
            
            if($flagExiste){
                echo '<script>alert("El nombre de usuario ya existe.")</script>';
            }else{
                $insercionUsuario = $conexion->prepare('INSERT INTO Usuarios (usuario, pass, isAdministrador) VALUES (?,?,?);');                    
                $insercionUsuario->bindParam(1, $usuario);
                $insercionUsuario->bindParam(2, $password);
                $insercionUsuario->bindParam(3, $isAdministrador);
                $insercionUsuario->execute(); 
            }            
                   
        }
        catch (PDOException $e) {
            $error = $e->getCode();
            $mensaje = $e->getMessage();
        }
        
        
    }
    
    /**
     * Función para insertar datos en el muro
     * @param string $mensajeMuro
     * @param string $usuario
     */
    public static function insertarEnMuro($mensajeMuro, $usuario){
        
        try {
            $conexion = self::conectarBD(); 
            $idMuro = "";
            
            $usuarioMuro = self::consultarIdUsuario($usuario);

            //Inserta el registro en el muro
            $insercionMuro = $conexion->prepare('INSERT INTO Muro (titulo, mensaje) VALUES (?,?);');                    
            $insercionMuro->bindParam(1, $mensajeMuro);
            $insercionMuro->bindParam(2, $mensajeMuro);
            $insercionMuro->execute();  
            
            //Selecciona el idMuro del último registro que entra
            $sql = "SELECT MAX(idMuro) FROM Muro";
            $resultado =$conexion->query($sql);
            
            while ($registro = $resultado->fetch()){
                $idMuro = $registro['MAX(idMuro)'];                          
            }
            
            //Inserta el idMuro y el idUsuario en la tabla escribe
            $insercionEscribeMuro = $conexion->prepare('INSERT INTO escribe (idUsuario,idMuro) VALUES (?,?);');  
            $insercionEscribeMuro->bindParam(1, $usuarioMuro);
            $insercionEscribeMuro->bindParam(2, $idMuro);
            $insercionEscribeMuro->execute(); 
            
        }
        catch (PDOException $e) {
            $error = $e->getCode();
            $mensaje = $e->getMessage();
        }
        
    }
    
    /**
     * Función para insertar respuestas en el muro
     * @param string $mensajeRMuro
     * @param int $idMuro
     * @param int $usuario
     */
    public static function insertarEnRespuestaMuro($mensajeRMuro, $idMuro, $usuario){
        
        try {
            $conexion = self::conectarBD(); 
            
            $usuarioRMuro = self::consultarIdUsuario($usuario);
            
            $insercionChat = $conexion->prepare('INSERT INTO RespuestaMuro (respuesta, idMuro, idUsuario) VALUES (?,?,?);');                    
            $insercionChat->bindParam(1, $mensajeRMuro);
            $insercionChat->bindParam(2, $idMuro);
            $insercionChat->bindParam(3, $usuarioRMuro);
            $insercionChat->execute();             
            
        }
        catch (PDOException $e) {
            $error = $e->getCode();
            $mensaje = $e->getMessage();
        }
        
        
    }
    
    /**
     * Función para insertar en el foro
     * @param string $tituloForo
     * @param string $mensajeForo
     * @param int $usuarioForo
     */
    public static function insertarEnForo($tituloForo, $mensajeForo, $usuarioForo){
        
        try {
            $conexion = self::conectarBD(); 
            
            $usuarioForo = self::consultarIdUsuario($usuarioForo);
            
            $insercionForo = $conexion->prepare('INSERT INTO Foro (titulo, mensaje) VALUES (?,?);');                    
            $insercionForo->bindParam(1, $tituloForo);
            $insercionForo->bindParam(2, $mensajeForo);
            $insercionForo->execute();  
            
            
            //Selecciona el idForo del último registro que entra
            $sql = "SELECT MAX(idForo) FROM Foro";
            $resultado =$conexion->query($sql);
            
            while ($registro = $resultado->fetch()){
                $idForo = $registro['MAX(idForo)'];                          
            }
            
            //Inserta el idForo y el idUsuario en la tabla participa
            $insercionParticipaForo = $conexion->prepare('INSERT INTO participa (idUsuario,idForo) VALUES (?,?);');  
            $insercionParticipaForo->bindParam(1, $usuarioForo);
            $insercionParticipaForo->bindParam(2, $idForo);
            $insercionParticipaForo->execute(); 
            
        }
        catch (PDOException $e) {
            $error = $e->getCode();
            $mensaje = $e->getMessage();
        }
        
        
    }
    
    /**
     * Función para insertar respuestas en los mensajes de foro
     * @param string $mensajeRForo
     * @param int $idForo
     * @param string $usuarioRForo
     */
    public static function insertarEnRespuestaForo($mensajeRForo, $idForo, $usuarioRForo){
        
        try {
            $conexion = self::conectarBD(); 
            
            $usuarioForo = self::consultarIdUsuario($usuarioRForo);  
            
            $insercionChat = $conexion->prepare('INSERT INTO RespuestaForo (respuesta, idForo, idUsuario) VALUES (?,?,?);');                    
            $insercionChat->bindParam(1, $mensajeRForo);
            $insercionChat->bindParam(2, $idForo);
            $insercionChat->bindParam(3, $usuarioForo);
            $insercionChat->execute();          
            
        }
        catch (PDOException $e) {
            $error = $e->getCode();
            $mensaje = $e->getMessage();
        }
        
    }
    
    /**
     * Función para insertar nuevos tutoriales
     * @param string $ruta
     * @param string $titulo
     * @param int $idUsuario
     */
    public static function insertarTutorial($ruta, $titulo, $idUsuario){
        
                
        try {
            $conexion = self::conectarBD(); 
            
            
            $insercionTutorial = $conexion->prepare('INSERT INTO Tutoriales (ruta, nombreTutorial, idUsuario) VALUES (?,?,?);');                    
            $insercionTutorial->bindParam(1, $ruta);
            $insercionTutorial->bindParam(2, $titulo);
            $insercionTutorial->bindParam(3, $idUsuario);
            $insercionTutorial->execute(); 
                   
                   
        }
        catch (PDOException $e) {
            $error = $e->getCode();
            $mensaje = $e->getMessage();
        }
        
        
    }
    
    
    /************* 
     * RELLENADO *
     ************/
     
    
    /**
     * Función para rellenar el Chat
     */
    public static function rellenarChat(){
        
        $resultado = self::consultarChat();
    
        if(isset($resultado)){
            while($row = $resultado->fetch()){

                $datosChat = new Chat($row);
                $usuarioChat = BD::consultarUsuario($datosChat->getidUsuario()); 
                echo '<div class="cuadroChat"><b>'.$usuarioChat.':</b> '.$datosChat->getMensajeChat().'</div>'; 
                
            }

        }      
        
    }
    
    
    /**
     * Función para rellenar el muro
     */
    public static function rellenarMuro(){
        
        $resultado = self::consultarMuro();   
    
        if(isset($resultado)){
            while($row = $resultado->fetch()){

                $datosMuro = new Muro($row);
                  
                $idUsuario = self::consultarUsuarioMuro($datosMuro->getId());

                $usuarioMuro = self::consultarUsuario($idUsuario);
                

                echo '<div class="cuadroMuro"><b>'.$usuarioMuro.':</b> '.$datosMuro->getMensaje().''; 
                
                $mensajeRespuesta = self::consultarRespuestaMuroPorIdMuro($datosMuro->getId());                


                if(isset($mensajeRespuesta)){
                    
                    while($row = $mensajeRespuesta->fetch()){
                        $datoRespuesta = $row['respuesta'];
                        $usuarioRespuesta = self::consultarUsuario($row['idUsuario']);
                        echo '<div class="cuadroRespuesta"><b>'.$usuarioRespuesta.':</b> '.$datoRespuesta.'</div>';
                    }
                                    
                }
                
                echo '<form name="formularioRespuesta'.$datosMuro->getId().'" id="formularioRespuesta'.$datosMuro->getId().'" class="formularioRespuesta" action="respuestas.php" method="POST">';
                echo '<textarea name="respuestaM" id="respuestaM'.$datosMuro->getId().'" rows="5"></textarea><br/>';
                echo '<input type="hidden" name="fIdMuro" value="'.$datosMuro->getId().'"/>';                
                echo '<input type="submit" name="enviarRespMuro'.$datosMuro->getId().'" class="enviarRespMuro" id="enviarRespMuro'.$datosMuro->getId().'" value="Enviar"/>';
                echo '</form>';
                
                echo '</div>';
                
                 
            }
        
        }
    }
    
    /**
     * Función para rellenar el foro
     */
    public static function rellenarForo(){
        
        $resultado = self::consultarForo();
    
        if(isset($resultado)){
            while($row = $resultado->fetch()){
                
                //Creamos un objeto Foro
                $datosForo = new Foro($row);      
                
                echo '<a href="mensajesforo.php?idForo='.$datosForo->getIdForo().'">'.$datosForo->getTituloForo().'</a>';
                echo '<hr width="99%"/>';
            }
        }      
    }
    
    /**
     * Función para rellenar las respuestas de un determinado tema de foro
     * @param int $idForo
     */
    public static function rellenarRespuestaForo($idForo){
        
        $resultado = self::consultarRespuestaForo($idForo);
        
        $dForo= self::consultarForoPorId($idForo);
        
        $usuarioForo = self::consultarUsuario(self::consultarIdUsuarioPorIdForo($idForo)) ;
        
        echo '<div class="tituloF"><h3>'.$dForo->getTituloForo().'</h3></div>';
        echo '<div class="cuadroMensajeF"><span class="cuadroAutorTitular">Mensaje comenzado por:<br/><b>'.$usuarioForo.'</b></span><span class="centrado">'.$dForo->getMensajeForo().'</span></div>';
    
        if(isset($resultado)){
            while($row = $resultado->fetch()){
                
                $datosRespuestaForo = new RespuestaForo($row); 
                echo '<div class="cuadroRespuestaF">';
                echo '<span class="cuadroAutor"><b>'.self::consultarUsuario($datosRespuestaForo->getIdUsuario()).'</b></span>';                
                echo '<div>'.$datosRespuestaForo->getRespuesta().'</div>';
                echo '</div>';
            }

        }      
        
    }
    
    
    /**
     * Función para rellenar el cuadro con los tutoriales 
     */
    public static function rellenarTutoriales(){
        
        $resultado = self::consultarTutoriales();
    
        if(isset($resultado)){
            while($row = $resultado->fetch()){

                $datosTutoriales = new Tutorial($row);                 
                echo '<div class="cuadroTutorial"><img src="img/pdf.png" class="pdf"  align="left" /><a href="'.$datosTutoriales->getRuta().'">'.$datosTutoriales->getNombreTutorial().'</a></div>'; 
                
            }
        }    
    }
    
    
    /**
     * Función que se encarga de rellenar una tabla con todos los usuarios 
     */    
     public static function rellenarTablaUsuarios(){
        
        $resultado = self::consultarUsuarios();
        
        if(isset($resultado)){
            
            echo '<table class="tabla">';
            echo '<thead>';
            echo '<td>idUsuario</td><td>usuario</td><td>password</td><td>isAdministrador</td>';
            echo '</thead>';
            
            while($row = $resultado->fetch()){

                $datosUsuario = new Usuario($row);              
                echo '<tr>';
                echo '<td>'.$datosUsuario->getIdUsuario().'</td>';
                echo '<td>'.$datosUsuario->getUsuario().'</td>';
                echo '<td>'.$datosUsuario->getPass().'</td>';
                if($datosUsuario->getIsAdministrador()=='1'){$isAdm = 'SI';}else{$isAdm = 'NO';};
                echo '<td>'.$isAdm.'</td>';
                               
                echo '</tr>';
            }
            
            echo '</table>';
        } 
    }
    
    
    /**
     * Función para rellenar el select de Usuarios que usamos en la gestón
     * @param string $nombreSelect 
     */    
    public static function rellenarSelectUsuarios($administrador){
        
        $resultado = self::consultarUsuarios();
        
        if(isset($resultado)){
            
            echo '<select name="selectUsuario">';                        
            
            while($row = $resultado->fetch()){

                $datosUsuario = new Usuario($row);
                
                //Evito que de la opción de eliminar el primer administrador o que un administrador se borre a si mismo
                if($datosUsuario->getIdUsuario()!='1' && $datosUsuario->getUsuario()!=$administrador){
                    echo '<option value="'.$datosUsuario->getUsuario().'">'.$datosUsuario->getUsuario().'</td>';
                }                     
            }
            echo '</select>';
        } 
    }
    
    public static function rellenarSelectTutoriales(){
        
        $resultado = self::consultarTutoriales();
        
        if(isset($resultado)){
            
            echo '<select name="selectTutorial">';                        
            
            while($row = $resultado->fetch()){

                $datosTutorial = new Tutorial($row);
                
                echo '<option value="'.$datosTutorial->getIdTutoriales().'">'.$datosTutorial->getNombreTutorial().'</td>';
                                  
            }
            echo '</select>';
        } 
    }
    
    
    /**
     * Función para rellenar los input para la modificación de Usuarios que usamos en la gestón
     */    
    public static function rellenarModificacionUsuarios($usuario){
        
        $checked = "";
        $consulta = self::consultarUsuarioPorNombre($usuario);        
        
        while($row = $consulta->fetch()){
            $datosUsuario = new Usuario($row);
        }
        
        //Si isAdministrador es 1 lo marca como checked
        if($datosUsuario->getIsAdministrador()=="1"){
            $checked = "checked";
        }
        
        echo '<br/><b>Datos a modificar</b><br/>';
        echo '<input type="hidden" name="idAnterior" value="'.$datosUsuario->getIdUsuario().'"/>';
        echo '<input type="hidden" name="usuarioAnterior" value="'.$datosUsuario->getUsuario().'"/>';
        echo '<label>Usuario </label><input type="text" class="soloLectura" name="modificarUsuarioAnterior" id="modificarUsuarioAnterior" value ="'.$datosUsuario->getUsuario().'" disabled="disabled"/><br/>';
        echo '<label>Password </label><input type="password" class="soloLectura" name="modificarPassAnterior" id="modificarPassAnteior" value="'.$datosUsuario->getPass().'" disabled="disabled"/><br/>';
        echo '<label>Administrador </label><input type="checkbox" class="soloLectura" name="modificarAdministradorAnterior" id="modificarAdministradorAnterior" value="'.$datosUsuario->getIsAdministrador().'" disabled="disabled" '.$checked.'/><br/>';
        
    }
    
    /**
     * Función para rellenar la tabla de tutoriales
     */
     public static function rellenarTablaTutoriales(){
        
        $resultado = self::consultarTutoriales();
        
        if(isset($resultado)){
            
            echo '<table class="tabla">';
            echo '<thead>';
            echo '<td>Título</td><td>Ruta</td><td>Usuario</td>';
            echo '</thead>';
            
            while($row = $resultado->fetch()){

                $datosTutorial = new Tutorial($row);              
                echo '<tr>';
                echo '<td>'.$datosTutorial->getNombreTutorial().'</td>';
                echo '<td>'.$datosTutorial->getRuta().'</td>';
                echo '<td>'.self::consultarUsuario($datosTutorial->getIdUsuario()).'</td>';             
                               
                echo '</tr>';
            }
            
            echo '</table>';
        } 
    }
    
    
    
    
    
    /****************** 
     * MODIFICACIONES *
     *****************/
    
       
    /**
    * Función para modificar un usuario 
    */
    public static function modificarUsuario($usuario, $usuarioNuevo, $passNuevo, $isAdministrador) {

        $nuevoPwd = self::crearHash($passNuevo);
        $flagExiste = false;

        try {

            $conexion = self::conectarBD();

            $flagExiste = self::comprobarUsuario($usuarioNuevo);

            if ($flagExiste && $usuario != $usuarioNuevo) {
                echo("<script>alert('No se puede cambiar el nombre de usuario por otro ya existente');</script>");
            } else {
                $modificacionUsuario = $conexion->prepare('UPDATE Usuarios SET usuario=?, pass=?, isAdministrador=? WHERE usuario = "' . $usuario . '";');
                $modificacionUsuario->bindParam(1, $usuarioNuevo);
                $modificacionUsuario->bindParam(2, $nuevoPwd);
                $modificacionUsuario->bindParam(3, $isAdministrador);
                $modificacionUsuario->execute();
            }
        } catch (Exception $ex) {
            $mensaje = $ex->getCode();
        }
    }

    
    /************
     * ELIMINAR *
     ***********/
    
    /**
     * Función para eliminar un usuario
     * @param string $usuario
     */
    public static function eliminarUsuario($usuario) {

        try {

            $conexion = self::conectarBD();
            
            //Primero debemos borrar los mensajes de muro escrito por el usuario y los mensajes de foro
            $idUsuario = self::consultarIdUsuario($usuario);
                      
            $borrarUsuarioMuro = $conexion->prepare('DELETE FROM Muro WHERE idMuro = (SELECT idMuro FROM escribe WHERE idUsuario = ?)');
            $borrarUsuarioMuro->bindParam(1, $idUsuario);
            $borrarUsuarioMuro->execute();
            
            $borrarUsuarioForo = $conexion->prepare('DELETE FROM Foro WHERE idForo = (SELECT idForo FROM participa WHERE idUsuario = ?)');
            $borrarUsuarioForo->bindParam(1, $idUsuario);
            $borrarUsuarioForo->execute();
            
            //Despues borramos el usuario correspondiente
            $borrarUsuario = $conexion->prepare('DELETE FROM Usuarios WHERE usuario = ?');
            $borrarUsuario->bindParam(1, $usuario);
            $borrarUsuario->execute();
            
        } catch (Exception $ex) {
            $mensaje = $ex->getCode();
        }
    }
    
    /**
     * Función para eliminar un tutorial
     * @param int $idTutorial
     */
    public static function eliminarTutorial($idTutorial) {

        try {

            $conexion = self::conectarBD();

            $borrarTutorial = $conexion->prepare('DELETE FROM Tutoriales WHERE idTutoriales = ?');
            $borrarTutorial->bindParam(1, $idTutorial);
            $borrarTutorial->execute();
        } catch (Exception $ex) {
            $mensaje = $ex->getCode();
        }
    }
    

    /************ 
     * SEGURIDAD *
     ************/
        
    /**
     * Función para crear un hash a partir de un password
     * @param string $pass
     * @return string
     */
    public static function crearHash($pass){
        //Creamos un hash con codificación SHA-512
        $password = crypt($pass, '$6$');
        return $password;
    }

    
   
   
    
}

