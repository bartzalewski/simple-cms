<?php
require_once '../config/database.php';
require_once '../src/Auth.php';
require_once '../src/Post.php';

$auth = new Auth($pdo);
$post = new Post($pdo);

if (!$auth->isLoggedIn() || !$auth->isAdmin()) {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $author_id = $_SESSION['user_id'];
    if ($post->createPost($title, $content, $author_id)) {
        header('Location: dashboard.php');
    } else {
        echo 'Post creation failed.';
    }
}

include '../templates/header.php';
include '../templates/post_form.php';
include '../templates/footer.php';
?>
