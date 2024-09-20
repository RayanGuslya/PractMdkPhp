<?php
use Alexander\UnitPhpTest1\Task1;
use \PHPUnit\Framework\TestCase;
class Task1Test extends TestCase
{
    private $taskTest1;
    protected function setUp(): void
    {
        $this->taskTest1 = new Task1();
    }
    //Проверяет, что the часто используемое
    public function testMostRecentAssertSame(): void
    {
        $this->assertSame("the", $this->taskTest1->mostRecent($this->taskTest1->getText()));
    }
    //Проверяет, что значение не пустое
    public function testMostRecentAssertNotEmpty(): void
    {
        $this->assertNotEmpty($this->taskTest1->mostRecent($this->taskTest1->getText()));
    }
    //Проверяет, что объект является экземпляром определенного класса
    public function testMostRecentAssertInstanceOf(): void
    {
        $this->assertInstanceOf(Task1::class, $this->taskTest1);
    }
}