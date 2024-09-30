<?php

use Alexander\UnitPhpTest\Task3;
use \PHPUnit\Framework\TestCase;

class Task3Test extends TestCase
{
    private $taskTest3;

    protected function setUp(): void
    {
        $this->taskTest3 = new Task3();
    }

    //Проверяет, что функция работает корректно
    public function testCaesarCipherRussianAssertSame(): void
    {
        $this->assertSame($this->taskTest3->caesarCipherRussian("абвгдеёж", 3), "гдеёжзёй");
    }

    //Проверяет, что значение не пустое
    public function testCaesarCipherRussianNotNull(): void
    {
        $this->assertNotNull($this->taskTest3->caesarCipherRussian("абвгдеёж", 3));
    }

    //Проверяет, что объект является экземпляром определенного класса
    public function testCaesarCipherRussianInstanceOf(): void
    {
        $this->assertInstanceOf(Task3::class, $this->taskTest3);
    }
}
