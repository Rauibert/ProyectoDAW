<?php

require_once '../clases/BD.php';


/**
 * Tests para la clase BD
 */
class BDTest extends PHPUnit_Framework_TestCase {

    /**
     * @var BD
     */
    protected $bd;
    
    
    
    
    
    protected function setUp() {
        $this->bd = new BD;
    }

    protected function tearDown() {
        
    }

    /**
     * Test para hacer una conexión correcta de base de datos
     * @covers BD::conectarBD
     * @todo   Implement testConectarBD().
     */
    public function testConectarBD() {
        $database = 'bd_proyecto';
        $user = 'dev_admin';
        $password = 'dev_admin';
        $pdo = new PDO('mysql:...', $user, $password);
        return $this->bd->conectarBD($pdo, $database);
    }
    
    
    /**
     * Test para hacer una conexión erronea de base de datos
     * @covers BD::conectarBD
     * @todo   Implement testConectarBD().
     */
    public function testConectarErroneaBD() {
        $database = 'bd_proyecto';
        $user = 'dev_admin';
        $password = 'pass';
        $pdo = new PDO('mysql:...', $user, $password);
        return $this->bd->conectarBD($pdo, $database);
    }
    
    

    /**
     * @covers BD::identificarUsuario
     * @todo   Implement testIdentificarUsuario().
     */
    public function testIdentificarUsuario() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers BD::identificarAdministrador
     * @todo   Implement testIdentificarAdministrador().
     */
    public function testIdentificarAdministrador() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers BD::comprobarUsuario
     * @todo   Implement testComprobarUsuario().
     */
    public function testComprobarUsuario() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers BD::consultarChat
     * @todo   Implement testConsultarChat().
     */
    public function testConsultarChat() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers BD::consultarMuro
     * @todo   Implement testConsultarMuro().
     */
    public function testConsultarMuro() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers BD::consultarRespuestaMuro
     * @todo   Implement testConsultarRespuestaMuro().
     */
    public function testConsultarRespuestaMuro() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers BD::consultarRespuestaMuroPorIdMuro
     * @todo   Implement testConsultarRespuestaMuroPorIdMuro().
     */
    public function testConsultarRespuestaMuroPorIdMuro() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers BD::consultarUsuario
     * @todo   Implement testConsultarUsuario().
     */
    public function testConsultarUsuario() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers BD::consultarIdUsuario
     * @todo   Implement testConsultarIdUsuario().
     */
    public function testConsultarIdUsuario() {
        $idUsuario = $this->bd->consultarIdUsuario('usuario1');
        $this->assertEquals('2', $idUsuario);
        
    }

    /**
     * @covers BD::consultarUsuarios
     * @todo   Implement testConsultarUsuarios().
     */
    public function testConsultarUsuarios() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers BD::consultarUsuarioPorNombre
     * @todo   Implement testConsultarUsuarioPorNombre().
     */
    public function testConsultarUsuarioPorNombre() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers BD::consultarUsuarioMuro
     * @todo   Implement testConsultarUsuarioMuro().
     */
    public function testConsultarUsuarioMuro() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers BD::consultarForoPorId
     * @todo   Implement testConsultarForoPorId().
     */
    public function testConsultarForoPorId() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers BD::consultarForo
     * @todo   Implement testConsultarForo().
     */
    public function testConsultarForo() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers BD::consultarRespuestaForo
     * @todo   Implement testConsultarRespuestaForo().
     */
    public function testConsultarRespuestaForo() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers BD::consultarIdUsuarioPorIdForo
     * @todo   Implement testConsultarIdUsuarioPorIdForo().
     */
    public function testConsultarIdUsuarioPorIdForo() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers BD::consultarTutoriales
     * @todo   Implement testConsultarTutoriales().
     */
    public function testConsultarTutoriales() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers BD::insertarEnChat
     * @todo   Implement testInsertarEnChat().
     */
    public function testInsertarEnChat() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers BD::insertarUsuario
     * @todo   Implement testInsertarUsuario().
     */
    public function testInsertarUsuario() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers BD::insertarEnMuro
     * @todo   Implement testInsertarEnMuro().
     */
    public function testInsertarEnMuro() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers BD::insertarEnRespuestaMuro
     * @todo   Implement testInsertarEnRespuestaMuro().
     */
    public function testInsertarEnRespuestaMuro() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers BD::insertarEnForo
     * @todo   Implement testInsertarEnForo().
     */
    public function testInsertarEnForo() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers BD::insertarEnRespuestaForo
     * @todo   Implement testInsertarEnRespuestaForo().
     */
    public function testInsertarEnRespuestaForo() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers BD::insertarTutorial
     * @todo   Implement testInsertarTutorial().
     */
    public function testInsertarTutorial() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers BD::rellenarChat
     * @todo   Implement testRellenarChat().
     */
    public function testRellenarChat() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers BD::rellenarMuro
     * @todo   Implement testRellenarMuro().
     */
    public function testRellenarMuro() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers BD::rellenarForo
     * @todo   Implement testRellenarForo().
     */
    public function testRellenarForo() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers BD::rellenarRespuestaForo
     * @todo   Implement testRellenarRespuestaForo().
     */
    public function testRellenarRespuestaForo() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers BD::rellenarTutoriales
     * @todo   Implement testRellenarTutoriales().
     */
    public function testRellenarTutoriales() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers BD::rellenarTablaUsuarios
     * @todo   Implement testRellenarTablaUsuarios().
     */
    public function testRellenarTablaUsuarios() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers BD::rellenarSelectUsuarios
     * @todo   Implement testRellenarSelectUsuarios().
     */
    public function testRellenarSelectUsuarios() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers BD::rellenarSelectTutoriales
     * @todo   Implement testRellenarSelectTutoriales().
     */
    public function testRellenarSelectTutoriales() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers BD::rellenarModificacionUsuarios
     * @todo   Implement testRellenarModificacionUsuarios().
     */
    public function testRellenarModificacionUsuarios() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers BD::rellenarTablaTutoriales
     * @todo   Implement testRellenarTablaTutoriales().
     */
    public function testRellenarTablaTutoriales() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers BD::modificarUsuario
     * @todo   Implement testModificarUsuario().
     */
    public function testModificarUsuario() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers BD::eliminarUsuario
     * @todo   Implement testEliminarUsuario().
     */
    public function testEliminarUsuario() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers BD::eliminarTutorial
     * @todo   Implement testEliminarTutorial().
     */
    public function testEliminarTutorial() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers BD::crearHash
     * @todo   Implement testCrearHash().
     */
    public function testCrearHash() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

}
