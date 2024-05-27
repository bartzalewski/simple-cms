<?php
require_once '../config/database.php';
require_once '../src/Post.php';

$post = new Post($pdo);
$posts = $post->getAllPosts();

include '../templates/header.php';
?>

<h2>Home</h2>
<?php foreach ($posts as $post): ?>
    <article>
        <h3><?php echo htmlspecialchars($post['title']); ?></h3>
        <p><?php echo nl2br(htmlspecialchars($post['content'])); ?></p>
        <p><em>Posted on <?php echo htmlspecialchars($post['created_at']); ?></em></p>
    </article>
<?php endforeach; ?>

<?php include '../templates/footer.php'; ?>
