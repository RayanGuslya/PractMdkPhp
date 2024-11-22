<?php

namespace Alexander\Pract8;

use Alexander\Pract8\JsonFileMangerException;

class JsonFileManager implements FileManager
{
    public function readFile(string $fileName): string|array
    {
        $content = file_get_contents($fileName);
        if ($content === false) {
            throw new JsonFileMangerException("error read file");
        }

        $json = json_decode($content, true);
        if ($json == NULL) {
            throw new JsonFileMangerException("decode is null");
        }
        return $json;
    }

    public function writeFile(string $filename, string|array $data): void
    {
        $jsonData = json_encode($data, JSON_PRETTY_PRINT);
        if ($jsonData === false) {
            throw new JsonFileMangerException("encode error");
        }

        if (file_put_contents($filename, $jsonData) === false) {
            throw new JsonFileMangerException("error put file");
        }
    }
}