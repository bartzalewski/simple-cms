<?php

class User {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getUserById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function getUsernameById($id) {
        $user = $this->getUserById($id);
        return $user ? $user['username'] : null;
    }

    public function isAdmin($id) {
        $user = $this->getUserById($id);
        return $user && $user['role'] === 'admin';
    }

    public function isEditor($id) {
        $user = $this->getUserById($id);
        return $user && $user['role'] === 'editor';
    }
}
?>
