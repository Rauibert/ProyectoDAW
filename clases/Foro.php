<?php

class Foro{
        
        //Variables
        
        protected $idForo;
        protected $mensajeForo;
        protected $tituloForo;
        
        
        //Métodos
        
        public function getIdForo(){
            return $this->idForo;
        }
        
        public function getTituloForo(){
            return $this->tituloForo;
        }
        
        public function getMensajeForo(){
            return $this->mensajeForo;
        }
        
        
        
        public function __construct($row) {
            $this->idForo = $row['idForo'];
            $this->mensajeForo = $row['mensaje'];
            $this->tituloForo = $row['titulo'];
        }      
        
    }

?>