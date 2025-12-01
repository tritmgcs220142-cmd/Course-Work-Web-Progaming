<form action="" method="post" enctype="multipart/form-data">
    <label for="posttext">Type your post here:</label>
    <textarea name="posttext" id="posttext" cols="40" rows="3" required></textarea>
    
    <br><br>
    <label for="users">Select an author:</label>
    <select name="users" id="users" required>
        <option value="">Select an author</option>
        <?php foreach($user as $users): ?>
            <option value="<?=$users['id']?>"><?=htmlspecialchars($users['name'], ENT_QUOTES, 'UTF-8')?></option>
        <?php endforeach; ?>
    </select>

    <br><br>
    <label for="modules">Select a category:</label>
    <select name="modules" id="modules" required>
        <option value="">Select a category</option>
        <?php foreach($modules as $module): ?>
            <option value="<?=$module['id']?>"><?=htmlspecialchars($module['categoryName'], ENT_QUOTES, 'UTF-8')?></option>
        <?php endforeach; ?>
    </select>
    
    <br><br>
    <label for="fileToUpload">Choose an image:</label>
    <input type="file" name="fileToUpload" id="fileToUpload" accept="image/*">

    <br><br>
    <input type="submit" name="submit" value="Add Post">
</form>