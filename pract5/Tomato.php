<?php
class Tomato
{
    private $index;
    private $state;
    public const NOTHING = 0;
    public const FLOWER  = 1;
    public const GREEN_TOMATO = 2;
    public const RED_TOMATO = 3;
    public function __construct($index)
    {
        $this->index = $index;
        $this->state = self::NOTHING;
    }
    public function grow(): void
    {
        if ($this->state < self::RED_TOMATO) {
            $this->state++;
        }
    }
    public function isRipe(): bool
    {
        return $this->state == self::RED_TOMATO ? true : false;
    }
}
