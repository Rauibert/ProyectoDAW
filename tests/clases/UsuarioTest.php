<?php

require_once '../clases/Usuario.php';

/**
 * Tests para Usuario
 */
class UsuarioTest extends PHPUnit_Framework_TestCase {

    
    /**
     * @var Usuario
     */
    protected $usuario;

    
    protected function setUp() {
        
        $this->usuario = new Usuario(array('idUsuario'=>'1','usuario'=>'usuario1','pass'=>'usuario1','isAdministrador'=>'0'));
        
        
    }
    
    protected function tearDown() {
        
    }

    /**
     * Test para obtener el id de Usuario
     * @covers Usuario::getIdUsuario
     * @todo   Implement testGetIdUsuario().
     */
    public function testGetIdUsuario() {
        
        $actual = $this->usuario->getIdUsuario();
        
        $this->assertEquals('1', $actual);        
        
    }

    /**
     * Test para obtener el usuario
     * @covers Usuario::getUsuario
     * @todo   Implement testGetUsuario().
     */
    public function testGetUsuario() {
        
        $actual = $this->usuario->getUsuario();
        
        $this->assertEquals('usuario1', $actual);   
        
    }
    
    /**
     * Test para obtener un usuario falso
     * @covers Usuario::getUsuario
     * @todo   Implement testGetUsuario().
     */
    public function testGetUsuarioFalso() {
        
        $actual = $this->usuario->getUsuario();
        
        $this->assertNotEquals('usuario3', $actual);   
        
    }
    

    /**
     * Test para obtener el pass de usuario
     * @covers Usuario::getPass
     * @todo   Implement testGetPass().
     */
    public function testGetPass() {
        
        $actual = $this->usuario->getPass();
        
        $this->assertEquals('usuario1', $actual);        
        
    }

    /**
     * Test para obtener para ver si el usuario es administrador
     * @covers Usuario::getIsAdministrador
     * @todo   Implement testGetIsAdministrador().
     */
    public function testGetIsAdministrador() {
        
        $actual = $this->usuario->getIsAdministrador();
        
        $this->assertEquals('0', $actual);        
       
    }


}
