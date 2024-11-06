<?php

namespace Alexander\Pract8;

use Alexander\Pract8\TextFileMangerException;

class TextFileManager implements FileManager
{
    public function readFile($fileName)
    {
        try {
            return file_get_contents($fileName);
        } catch (TextFileMangerException $e) {
            echo "Error" . $e->getMessage();
        }
    }

    public function writeFile($filename, $data)
    {
        try {
            $current = file_get_contents($filename);

            $current .= $data;

            file_put_contents($filename, $current);
        } catch (TextFileMangerException $e) {
            echo "Error" . $e->getMessage();
        }
    }
}