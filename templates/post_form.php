<?php
$isEditing = isset($currentPost);
?>
<form action="<?php echo $isEditing ? 'edit_post.php?id=' . $currentPost['id'] : 'create_post.php'; ?>" method="post">
    <h2><?php echo $isEditing ? 'Edit Post' : 'Create Post'; ?></h2>
    <label for="title">Title</label>
    <input type="text" name="title" id="title" value="<?php echo $isEditing ? htmlspecialchars($currentPost['title']) : ''; ?>" required>
    <label for="content">Content</label>
    <textarea name="content" id="content" required><?php echo $isEditing ? htmlspecialchars($currentPost['content']) : ''; ?></textarea>
    <button type="submit"><?php echo $isEditing ? 'Update Post' : 'Create Post'; ?></button>
</form>
