<?php

require_once '../clases/Chat.php';

/**
 * Tests para Chat
 */
class ChatTest extends PHPUnit_Framework_TestCase {

    /**
     * @var Chat
     */
    protected $chat;

    /**
     * Este metodo es llamado antes de que los test se ejecuten
     */
    protected function setUp() {
        $this->chat = new Chat(array('idChat'=>'1','mensajeChat'=>'Hola','idUsuario'=>'2'));
    }

    
    protected function tearDown() {
        
    }

    /**
     * Test para obtener el id de Chat
     * @covers Chat::getIdChat
     * @todo   Implement testGetIdChat().
     */
    public function testGetIdChat() {
        
        $actual = $this->chat->getIdChat();        
        $this->assertEquals('1', $actual);        
    }

    /**
     * Test para obtener el mensaje de Chat
     * @covers Chat::getMensajeChat
     * @todo   Implement testGetMensajeChat().
     */
    public function testGetMensajeChat() {
        $actual = $this->chat->getMensajeChat();        
        $this->assertEquals('Hola', $actual);  
    }

    /**
     * Test para obtener el id de Usuario
     * @covers Chat::getidUsuario
     * @todo   Implement testGetidUsuario().
     */
    public function testGetidUsuario() {
        $actual = $this->chat->getidUsuario();        
        $this->assertEquals('2', $actual);  
    }

}
