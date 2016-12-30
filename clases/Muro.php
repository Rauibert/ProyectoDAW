<?php

class Muro{
        
        //Variables
        
        protected $id;
        protected $titulo;
        protected $mensaje;         
        
        
        //Métodos
        
        public function getId(){
            return $this->id;
        }
        
        public function getTitulo(){
            return $this->titulo;
        }
        
        public function getMensaje(){
            return $this->mensaje;
        }        
        
               
        public function __construct($row) {
            $this->id = $row['idMuro'];
            $this->titulo = $row['titulo'];
            $this->mensaje = $row['mensaje'];            
        }      
        
    }


?>

