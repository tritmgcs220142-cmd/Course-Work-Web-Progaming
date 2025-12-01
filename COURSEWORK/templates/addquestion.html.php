<form action="" method="post" enctype="multipart/form-data">
    <label for="questiontext">Type your joke here:</label>
    <textarea name="questiontext" id="questiontext" cols="40" rows="3"></textarea>
    
    <br><br>
    <label for ="category">Select an author:</label>
    <select name="author" id="author">
        <option value ="">Select an author</option>
        <?php foreach($authors as $author): ?>
            <option value="<?=htmlspecialchars($author['id'], ENT_QUOTES, 'UTF-8')?>">
                <?=htmlspecialchars($author['name'], ENT_QUOTES, 'UTF-8')?></option>
        <?php endforeach; ?>
    </select>
<br><br>
<label for="categories">Select a category:</label>
<select name="categories" id="categories">
    <option value="">Select a category</option>
    <?php foreach($categories as $category): ?>
        <option value="<?=htmlspecialchars($category['id'], ENT_QUOTES, 'UTF-8')?>">
            <?=htmlspecialchars($category['categoryName'], ENT_QUOTES, 'UTF-8')?></option>
    <?php endforeach; ?>
</select>
    
</select>
<br><br>
<label for="image">Choose an image:</label>
<input type="file" name="image" id="image" accept="image/*">

<br><br>
    
    <input type="submit" name="submit" value="Add">
</form>