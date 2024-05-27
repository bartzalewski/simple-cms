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

$id = $_GET['id'];
$currentPost = $post->getPostById($id);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    if ($post->updatePost($id, $title, $content)) {
        header('Location: dashboard.php');
    } else {
        echo 'Post update failed.';
    }
}

include '../templates/header.php';
include '../templates/post_form.php';
include '../templates/footer.php';
?>
