<?php

namespace Alexander\Pract8;

use Alexander\Pract8\FileManagerFabricException;

class FileManagerFabric
{
    public static function create(string $type): ?FileManager
    {
        switch ($type) {
            case 'Text':
                return new TextFileManager();
            case 'Json':
                return new JsonFileManager();
            case 'Csv':
                return new CsvFileManager();
            default:
                throw new FileManagerFabricException("error type file");
        }
    }
}