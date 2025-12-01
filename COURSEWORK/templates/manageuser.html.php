<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>User</title>
</head>
<body>
    <h2>User</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>name</th>
            <th>Email</th>
            <th>edit</th>
            <th>Delete</th>
        </tr>
        <?php foreach ($users as $user): ?>
        <tr>
            <td><?= htmlspecialchars($user['id'], ENT_QUOTES, 'UTF-8') ?></td>
            <td><?= htmlspecialchars($user['name'], ENT_QUOTES, 'UTF-8') ?></td>
            <td><?= htmlspecialchars($user['email'], ENT_QUOTES, 'UTF-8') ?></td>
            <td>
                <a href="edituser.php?id=<?= $user['id'] ?>">Edit</a>
                
            <td>
            <a href="deleteuser.php?id=<?= $user['id'] ?>" onclick="return confirm('Do you want to delete this user')">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
