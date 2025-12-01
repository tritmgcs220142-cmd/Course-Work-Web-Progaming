<h2>Edit User</h2>

<form method="post" action="edituser.php">
    <input type="hidden" name="userid" value="<?=$user['id']?>">
    
    <fieldset>
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="<?=htmlspecialchars($user['name'], ENT_QUOTES, 'UTF-8')?>" required>

        <br><br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="<?=htmlspecialchars($user['email'], ENT_QUOTES, 'UTF-8')?>" required>

        <br><br>
        <input type="submit" value="Update User">
        <a href="manageuser.php">Cancel</a>
    </fieldset>
</form>