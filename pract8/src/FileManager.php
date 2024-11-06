<?php

namespace Alexander\Pract8;

interface FileManager
{
    public function readFile($fileName);
    public function writeFile($filename, $data);

}