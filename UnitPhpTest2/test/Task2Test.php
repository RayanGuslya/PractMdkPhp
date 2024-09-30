<?php

use Alexander\UnitPhpTest2\Task2;
use \PHPUnit\Framework\TestCase;

class Task2Test extends TestCase
{
    private $taskTest2;

    protected function setUp(): void
    {
        $this->taskTest2 = new Task2();
    }

    //Проверяет, что объект является экземпляром определенного класса
    public function testArrayUniqueInstanceOf(): void
    {
        $this->assertInstanceOf(Task2::class, $this->taskTest2);
    }

    //Проверяет, что метод правильно удаляет дубликаты из массива целых чисел
    public function testArrayUniqueWithDuplicates(): void
    {
        $input = [1, 2, 2, 3, 4, 4, 5];
        $expected = [1, 2, 3, 4, 5];
        $this->assertSame($expected, $this->taskTest2->arrayUnique($input));
    }

    //Проверка с булевыми значениями
    public function testArrayUniqueContainsBooleanValues(): void
    {
        $input = [true, false, true, false];
        $result = $this->taskTest2->arrayUnique($input);

        $this->assertContains(true, $result);
        $this->assertContains(false, $result);
    }
}