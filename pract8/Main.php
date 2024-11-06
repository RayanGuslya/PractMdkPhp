<?php

require __DIR__ . '/vendor/autoload.php';

use Alexander\Pract8\FileManagerFabric;

$fileManager = FileManagerFabric::create("Text");
$fileManager->writeFile("TextFile.txt", "test");
echo $fileManager->readFile("TextFile.txt");

$fileManager = FileManagerFabric::create("Json");
$fileManager->writeFile("JsonFile.json", [
    ['register' => ['name' => 'kefa', 'age' => 30], 'status' => 'online'],
    ['register' => ['name' => 'gdf', 'age' => 25], 'status' => 'offline']
]);
print_r($fileManager->readFile("JsonFile.json"));

$fileManager = FileManagerFabric::create("Csv");
$fileManager->writeFile("CsvFile.csv", [['Name', 'Age', 'Status'], ['kefa', 30, 'online'], ['dfg', 25, 'offline']]);
echo $fileManager->readFile("CsvFile.csv");
