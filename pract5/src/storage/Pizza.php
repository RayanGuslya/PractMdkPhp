<?php
namespace Alexander\Pract5;

class Pizza
{
    private $name;
    private $sauce;
    private $toppings;

    public function __construct($name, $sauce, $toppings)
    {
        $this->name = $name;
        $this->sauce = $sauce;
        $this->toppings = $toppings;
    }

    public function prepare()
    {
        echo "Готовим пиццу {$this->name} с {$this->sauce} соусом и топпингами:" . implode(", ", $this->toppings) . "\n";

    }
    public function cut()
    {
        echo "Данную пиццу нарезают по диагонали\n";
    }

}