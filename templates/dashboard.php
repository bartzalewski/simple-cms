<h2>Dashboard</h2>
<table>
    <thead>
        <tr>
            <th>Title</th>
            <th>Author</th>
            <th>Created At</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($posts as $post): ?>
            <tr>
                <td><?php echo htmlspecialchars($post['title']); ?></td>
                <td><?php echo htmlspecialchars($user->getUsernameById($post['author_id'])); ?></td>
                <td><?php echo htmlspecialchars($post['created_at']); ?></td>
                <td>
                    <a href="edit_post.php?id=<?php echo $post['id']; ?>">Edit</a>
                    <a href="delete_post.php?id=<?php echo $post['id']; ?>" onclick="return confirm('Are you sure you want to delete this post?');">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
