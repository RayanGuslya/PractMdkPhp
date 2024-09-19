<?php
use Alexander\UnitPhpTest\Task3;
use \PHPUnit\Framework\TestCase;

class Task3Test extends TestCase
{
    private $taskTest3;

    protected function setUp() : void {
        $this->taskTest3 = new Task3();
    }

    public function testCaesarCipherRussian() : void {
        $this->assertSame($this->taskTest3->caesarCipherRussian("абвгдеёж", 3), "гдеёжзёй");
    }
    
    public function testCaesarCipherRussianNotNull() : void {
        $this->assertNotNull($this->taskTest3->caesarCipherRussian("абвгдеёж", 3));
    }
    public function testCaesarCipherRussianInstanceOf() : void {
        $this->assertInstanceOf(task3::class,$this->taskTest3);
    }
    public function testCaesarCipherRussianEquals() : void {
        $this->assertEquals($this->taskTest3->caesarCipherRussian("абвгдеёж",3),"гдеёжзёй");
    }
    
}
