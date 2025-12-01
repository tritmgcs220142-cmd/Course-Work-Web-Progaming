<h1>Add New User</h1>

<form action="" method="post">
    <fieldset>
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required>

        <br><br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>

        <br><br>
        <input type="submit" value="Add User">
    </fieldset>
</form>

<h2>Current Users:</h2>
<ul>
    <?php if(!empty($users)): ?>
        <?php foreach($users as $user): ?>
            <li><?=htmlspecialchars($user['name'], ENT_QUOTES, 'UTF-8')?> - <?=htmlspecialchars($user['email'], ENT_QUOTES, 'UTF-8')?></li>
        <?php endforeach; ?>
    <?php else: ?>
        <li>No users found.</li>
    <?php endif; ?>
</ul>

<!-- <p><a href="addpost.php">Go to Add Post</a></p> -->