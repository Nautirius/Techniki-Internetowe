<?php
namespace baza;

use PDO;
use Exception;

class UserModel {
    private $db;

    public function __construct() {
        $dsn = 'sqlite:sql/database.db';
        if (!file_exists('sql/database.db')) {
            throw new Exception("Database file not found at sql/database.db");
        }
        $this->db = new PDO($dsn);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $this->db->prepare('CREATE TABLE IF NOT EXISTS users
            (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                username TEXT UNIQUE NOT NULL,
                password TEXT NOT NULL
            )'
        );
        $stmt->execute();
    }

    public function validateUser($username, $password) {
        $passwordHash = md5($password);
        $stmt = $this->db->prepare('SELECT COUNT(*) FROM users WHERE username = :username AND password = :password');
        $stmt->execute([':username' => $username, ':password' => $passwordHash]);
        return $stmt->fetchColumn() > 0;
    }

    public function registerUser($username, $password) {
        $stmt = $this->db->prepare('SELECT COUNT(*) FROM users WHERE username = :username');
        $stmt->execute([':username' => $username]);
        if ($stmt->fetchColumn() > 0) {
            return false; // Username already exists
        }

        $passwordHash = md5($password);
        $stmt = $this->db->prepare('INSERT INTO users (username, password) VALUES (:username, :password)');
        return $stmt->execute([':username' => $username, ':password' => $passwordHash]);
    }
}
