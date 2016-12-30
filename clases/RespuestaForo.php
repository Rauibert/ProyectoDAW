<?php

class RespuestaForo{
        
        //Variables
        
        protected $idRespuesta;
        protected $respuesta;
        protected $idForo;
        protected $idUsuario;
        
        
        //Métodos
        
        public function getIdRespuesta(){
            return $this->idRespuesta;
        }
        
        public function getRespuesta(){
            return $this->respuesta;
        }
        
        public function getIdForo(){
            return $this->idForo;
        }
        
        public function getIdUsuario(){
            return $this->idUsuario;
        }
        
        
        
        public function __construct($row) {
            $this->idRespuesta = $row['idRespuesta'];
            $this->respuesta = $row['respuesta'];
            $this->idForo = $row['idForo'];
            $this->idUsuario = $row['idUsuario'];
        }      
        
    }

?>

