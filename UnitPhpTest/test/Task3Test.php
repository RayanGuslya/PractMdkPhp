<?php
use Alexander\UnitPhpTest\task3;
use \PHPUnit\Framework\TestCase;

class Task3Test extends TestCase
{
    private $TaskTest3;

    protected function setUp() : void {
        $this->TaskTest3 = new task3();
    }

    public function testCaesarCipherRussian() {
        $this->assertSame($this->TaskTest3->caesarCipherRussian("абвгдеёж", 3), "гдеёжзёй");
    }
}
