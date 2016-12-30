<?php

require_once '../clases/Tutorial.php';

/**
 * Tests para tutoriales
 */
class TutorialTest extends PHPUnit_Framework_TestCase {

    /**
     * @var Tutorial
     */
    protected $tutorial;

    protected function setUp() {
        $datosTutorial = array('idTutoriales'=>'1','nombreTutorial'=>'Tutorial 3','ruta'=>'pdf/tutorial3.pdf', 'idUsuario'=>'2');
        $this->tutorial = new Tutorial($datosTutorial);
    }

    
    protected function tearDown() {
        
    }

    /**
     * Test para obtener el id de Tutorial
     * @covers Tutorial::getIdTutoriales
     * @todo   Implement testGetIdTutoriales().
     */
    public function testGetIdTutoriales() {
        $actual = $this->tutorial->getIdTutoriales();        
        $this->assertEquals('1', $actual);  
    }

    /**
     * Test para obtener el nombre de Tutorial
     * @covers Tutorial::getNombreTutorial
     * @todo   Implement testGetNombreTutorial().
     */
    public function testGetNombreTutorial() {
        $actual = $this->tutorial->getNombreTutorial();        
        $this->assertEquals('Tutorial 3', $actual);  
    }

    /**
     * Test para obtener la ruta de Tutorial
     * @covers Tutorial::getRuta
     * @todo   Implement testGetRuta().
     */
    public function testGetRuta() {
        $actual = $this->tutorial->getRuta();        
        $this->assertEquals('pdf/tutorial3.pdf', $actual);  
    }

    /**
     * Test para obtener el id de Usuario
     * @covers Tutorial::getIdUsuario
     * @todo   Implement testGetIdUsuario().
     */
    public function testGetIdUsuario() {
        $actual = $this->tutorial->getIdUsuario();        
        $this->assertEquals('2', $actual);  
    }

}
