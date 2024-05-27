<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple CMS</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<nav>
    <ul>
        <li><a href="index.php">Home</a></li>
        <?php if (isset($_SESSION['user_id'])): ?>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="create_post.php">Create Post</a></li>
            <li><a href="logout.php">Logout</a></li>
        <?php else: ?>
            <li><a href="login.php">Login</a></li>
            <li><a href="register.php">Register</a></li>
        <?php endif; ?>
    </ul>
</nav>
<main>
