<?php
use Alexander\UnitPhpTest\task3;
use \PHPUnit\Framework\TestCase;

class Task3Test extends TestCase
{
    private $TaskTest3;

    protected function setUp() : void {
        $this->TaskTest3 = new task3();
    }

    public function testCaesarCipherRussian() : void {
        $this->assertSame($this->TaskTest3->caesarCipherRussian("абвгдеёж", 3), "гдеёжзёй");
    }
    
    public function testCaesarCipherRussianNotNull() : void {
        $this->assertNotNull($this->TaskTest3->caesarCipherRussian("абвгдеёж", 3));
    }
    public function testCaesarCipherRussianInstanceOf() : void {
        $this->assertInstanceOf(task3::class,$this->TaskTest3);
    }
    public function testCaesarCipherRussianEquals() : void {
        $this->assertEquals($this->TaskTest3->caesarCipherRussian("абвгдеёж",3),"гдеёжзёй");
    }
    
}
