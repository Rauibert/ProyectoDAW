<?php

class Tutorial{
        
        //Variables
        
        protected $idTutoriales;
        protected $nombreTutorial;
        protected $ruta;
        protected $idUsuario;
        
        
        
        //Métodos
        
        public function getIdTutoriales(){
            return $this->idTutoriales;
        }
        
        public function getNombreTutorial(){
            return $this->nombreTutorial;
        }
        
        public function getRuta(){
            return $this->ruta;
        }
        
        public function getIdUsuario(){
            return $this->idUsuario;
        }
        
        
        
        public function __construct($row) {
            $this->idTutoriales = $row['idTutoriales'];
            $this->nombreTutorial = $row['nombreTutorial'];
            $this->ruta = $row['ruta'];
            $this->idUsuario = $row['idUsuario'];
        }      
        
    }

?>