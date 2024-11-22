<?php

require __DIR__ . '/vendor/autoload.php';

use Alexander\Pract9\ConnectDatabase;
use Alexander\Pract9\User;

$user = 'root';
$pass = 'root';
$host = 'localhost';
$db = 'pract9_sql';
$port = 3306;
$charset = 'utf8';

$dsn = "mysql:host=$host;dbname=$db;port=$port;charset=$charset";

$connect = new ConnectDatabase($user, $pass, $dsn);
$user = new User($connect->getPdo());

echo "output search:" . PHP_EOL;
print_r($user->search("name_test2"));

echo "output add user:" . PHP_EOL;
$user->addUser("name_test3", "sdfgh@mail.ru");

echo "output update user:" . PHP_EOL;
$user->update(2, "update_name", "update_email");

echo "output delete user:" . PHP_EOL;
$user->delete(1);

echo "output all user:" . PHP_EOL;
print_r($connect->getAllUsers());
