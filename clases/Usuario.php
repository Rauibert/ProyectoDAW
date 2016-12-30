<?php

class Usuario{
        
        //Variables
        
        protected $idUsuario;
        protected $usuario;
        protected $pass;
        protected $isAdministrador;
        

        //Métodos
        
        public function getIdUsuario(){
            return $this->idUsuario;
        }
        
        public function getUsuario(){
            return $this->usuario;
        }
        
        public function getPass(){
            return $this->pass;
        }
        
        public function getIsAdministrador(){
            return $this->isAdministrador;
        }
        
        public function __construct($row) {
            $this->idUsuario = $row['idUsuario'];
            $this->usuario = $row['usuario'];
            $this->pass = $row['pass'];
            $this->isAdministrador = $row['isAdministrador'];
        }      
        
    }

?>