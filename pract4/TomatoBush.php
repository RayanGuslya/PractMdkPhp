<?php
require('Tomato.php');
class TomatoBush
{
    private $tomatoes = [];
    public function __construct($countTomato)
    {
        for ($i = 0; $i <= $countTomato; $i++) {
            $this->tomatoes[] = new Tomato($i);
        }
    }
    public function growAll(): void
    {
        foreach ($this->tomatoes as $tomato) {
            $tomato->grow();
        }
    }
    public function allAreRipe(): bool
    {
        foreach ($this->tomatoes as $tomato) {
            if (!$tomato->isRipe()) {
                return false;
            }
        }
        return true;
    }
    public function giveAwayAll(): array
    {
        return $this->tomatoes = [];
    }
}
