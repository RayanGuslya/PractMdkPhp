<?php

namespace Alexander\Pract9;

use Exception;
use PDOException;
use PDO;

class User
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function search(string $query): array
    {
        if (empty($query)) {
            $sql = 'SELECT * FROM users';
            $stmt = $this->pdo->query($sql);
        } else {
            $sql = 'SELECT * FROM users WHERE name = :query OR email = :query';
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([':query' => $query]);
        }
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addUser(string $name, string $email): void
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception('error validate email');
        }
        $sql = 'INSERT INTO users (name,email) VALUES (:name, :email)';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':name' => $name,
            ':email' => $email
        ]);
    }

    public function update(int $id, string $name, string $email): void
    {
        $sql = 'SELECT * FROM users WHERE id = :id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        $user = $stmt->fetch();
        if ($user) {
            $sql = 'UPDATE users SET name = :name, email = :email WHERE id = :id';
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                'name' => $name,
                'email' => $email,
                'id' => $id
            ]);
        } else {
            throw new PDOException();
        }
    }
    public function delete(int $id): void
    {
        $sql = 'SELECT * FROM users WHERE id = :id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        $user = $stmt->fetch();
        if ($user) {
            $sql = 'DELETE FROM users WHERE id = :id';
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([':id' => $id]);
        } else {
            throw new PDOException();
        }
    }
}