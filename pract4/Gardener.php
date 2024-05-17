<?php
class Gardener
{
    private $name;
    private $plant;
    public function __construct($name, $plant)
    {
        $this->name = $name;
        $this->plant = $plant;
    }
    public function work(): void
    {          
         $this->plant->growAll();
         echo "Успешно поработали" . PHP_EOL;


    }
    public function harvest(): void
    {
        if ($this->plant->allAreRipe()) {
            echo "Садовник забрал урожай" . PHP_EOL;
            $this->plant->giveAwayAll();
            exit;
        } else {
            echo "{$this->name} говорит что не все спелое" . PHP_EOL;
        }
    }
    public static function KnowledgeBase(): string
    {
        return 
        "Справка по садоводству:" . PHP_EOL .
        "1. Правильный уход за растениями помогает им лучше расти и созревать." . PHP_EOL .
        "2. Помидоры нужно регулярно поливать и удобрять." . PHP_EOL .
        "3. При появлении вредителей необходимо применять соответствующие меры защиты." . PHP_EOL;
    }
}
