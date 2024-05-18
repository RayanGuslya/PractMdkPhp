<?php
namespace Smysh\Test;
class Pizza
{
    private $name; // название
    private $sauce; // соус
    private $toppings; // массив (начинки)
    function __construct($name, $sauce, $toppings)
    {
        $this->name = $name;
        $this->sauce = $sauce;
        $this->toppings = $toppings;
    }
    public function prepare(): void
    { //готовка
        echo "Началась готовка пиццы {$this->name}\n";
        echo "Добавлен соус {$this->sauce}\n";
        echo "Добавлены топики: " . implode(", ", $this->toppings) . "\n";
    }
    public function cut(): void
    { //нарезать
        echo "Данную пиццу нарезают по диагонали\n";
    }
}
