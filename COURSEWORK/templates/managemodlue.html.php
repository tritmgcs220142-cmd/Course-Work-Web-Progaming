<h2>Manage Modules/Categories</h2>

<div style="margin-bottom: 20px;">
    <a href="addmodule.php" style="background-color: #4CAF50; color: white; padding: 10px 15px; text-decoration: none; border-radius: 5px;">Add New Module</a>
</div>

<?php if(empty($modules)): ?>
    <p>No modules found.</p>
<?php else: ?>
    <table border="1" style="width: 100%; border-collapse: collapse;">
        <tr style="background-color: #f2f2f2;">
            <th>ID</th>
            <th>Module/Category Name</th>
            <th>Actions</th>
        </tr>
        <?php foreach($modules as $module): ?>
        <tr>
            <td><?=htmlspecialchars($module['id'], ENT_QUOTES, 'UTF-8')?></td>
            <td><?=htmlspecialchars($module['categoryName'], ENT_QUOTES, 'UTF-8')?></td>
            <td>
                <a href="editmodule.php?id=<?=$module['id']?>">Edit</a> |
                <a href="deletemodule.php?id=<?=$module['id']?>" onclick="return confirm('Are you sure you want to delete this module?')">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>

<br>
<p><a href="index.php">Back to Admin Home</a></p>