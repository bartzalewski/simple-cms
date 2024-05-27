<?php
require_once 'User.php';

session_start();

class Auth {
    private $pdo;
    private $user;

    public function __construct($pdo) {
        $this->pdo = $pdo;
        $this->user = new User($pdo);
    }

    public function register($username, $password) {
        $hash = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $this->pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        return $stmt->execute([$username, $hash]);
    }

    public function login($username, $password) {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch();
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_role'] = $user['role'];
            return true;
        }
        return false;
    }

    public function logout() {
        session_destroy();
    }

    public function isLoggedIn() {
        return isset($_SESSION['user_id']);
    }

    public function isAdmin() {
        return $this->isLoggedIn() && $this->user->isAdmin($_SESSION['user_id']);
    }

    public function isEditor() {
        return $this->isLoggedIn() && $this->user->isEditor($_SESSION['user_id']);
    }
}
?>
