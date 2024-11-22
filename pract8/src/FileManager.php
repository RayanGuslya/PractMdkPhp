<?php

namespace Alexander\Pract8;

interface FileManager
{
    public function readFile(string $fileName): string|array;
    public function writeFile(string $filename, string|array $data): void;

}