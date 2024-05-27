<?php
class Post {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAllPosts() {
        $stmt = $this->pdo->query("SELECT * FROM posts");
        return $stmt->fetchAll();
    }

    public function createPost($title, $content, $author_id) {
        $stmt = $this->pdo->prepare("INSERT INTO posts (title, content, author_id) VALUES (?, ?, ?)");
        return $stmt->execute([$title, $content, $author_id]);
    }

    public function getPostById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM posts WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function updatePost($id, $title, $content) {
        $stmt = $this->pdo->prepare("UPDATE posts SET title = ?, content = ? WHERE id = ?");
        return $stmt->execute([$title, $content, $id]);
    }

    public function deletePost($id) {
        $stmt = $this->pdo->prepare("DELETE FROM posts WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>
