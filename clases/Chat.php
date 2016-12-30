<?php

class Chat{
        
        //Variables
        
        protected $idChat;
        protected $mensajeChat;
        protected $idUsuario;
        
        
        //Métodos
        
        public function getIdChat(){
            return $this->idChat;
        }
        
        public function getMensajeChat(){
            return $this->mensajeChat;
        }
        
        public function getidUsuario(){
            return $this->idUsuario;
        }
        
        public function __construct($row) {
            $this->idChat = $row['idChat'];
            $this->mensajeChat = $row['mensajeChat'];
            $this->idUsuario = $row['idUsuario'];
        }      
        
    }

?>