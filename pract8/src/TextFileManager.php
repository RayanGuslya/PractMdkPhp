<?php

namespace Alexander\Pract8;

use Alexander\Pract8\TextFileMangerException;

class TextFileManager implements FileManager
{
    public function readFile(string $fileName): string|array
    {
        $content = file_get_contents($fileName);
        if ($content === false) {
            throw new TextFileMangerException("error read file");
        }
        return $content;
    }

    public function writeFile(string $filename, string|array $data): void
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