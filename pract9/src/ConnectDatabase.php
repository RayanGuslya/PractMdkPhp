<?php

namespace Alexander\Pract9;

use PDO;
use PDOException;

class ConnectDatabase
{
    private $pdo;

    public function __construct($user, $pass, $dsn)
    {
        try {
            $this->pdo = new PDO($dsn, $user, $pass);
        } catch (PDOException $e) {
            echo "Error: {$e->getMessage()}";
            exit;
        }
    }

    public function getPdo()
    {
        return $this->pdo;
    }

    public function getAllUsers(): array
    {
        $sql = 'SELECT * FROM users';
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}