<?php

    require_once 'clases/BD.php';
    
    $idTutorial = $_POST['selectTutorial'];
    
    
      
    BD::eliminarTutorial($idTutorial);
    
    

    BD::rellenarTablaTutoriales(); 
    
    

?>