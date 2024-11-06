<?php

namespace Alexander\Pract8;

use Alexander\Pract8\CsvFileManagerException;

class CsvFileManager implements FileManager
{
    public function readFile($fileName)
    {
        try {
            $file = fopen($fileName, "r");

            $data = [];
            $str = "";

            while (($row = fgetcsv($file, 0, ";")) !== false) {
                $data[] = $row;
            }
            fclose($file);

            foreach ($data as $row) {
                $str .= implode(", ", $row) . "\n";
            }

            return $str;
        } catch (CsvFileManagerException $e) {
            echo $e->getMessage();
        }
    }

    public function writeFile($filename, $data)
    {
        try {
            $fp = fopen($filename, "w");

            foreach ($data as $row) {
                fputcsv($fp, $row, ";");
            }

            fclose($fp);
        } catch (CsvFileManagerException $e) {
            echo $e->getMessage();
        }
    }
}