<form action="" method="post">
    <input type="hidden" name="questionid" value="<?=$question['id']?>">
    
    <fieldset>
        <label for="questiontext">Edit your question here:</label>
        <textarea name="questiontext" id="questiontext" cols="40" rows="3" required><?=htmlspecialchars($question['questiontext'], ENT_QUOTES, 'UTF-8')?></textarea>

        <br><br>
        <label for="authorid">User:</label>
        <select name="authorid" id="authorid" required>
            <?php foreach($authors as $author): ?>
                <option value="<?=$author['id']?>"><?=$author['name']?> - <?=$author['email']?></option>
            <?php endforeach; ?>
        </select>

        <br><br>
        <label for="categoryid">Module</label>
        <select name="categoryid" id="categoryid" required>
            <?php foreach($categories as $category): ?>
                <option value="<?=$category['id']?>"><?=$category['categoryName']?></option>
            <?php endforeach; ?>
        </select>

        <br><br>
        <input type="submit" name="submit" value="Save Changes">
        <a href="question.php">Cancel</a>
    </fieldset>
</form>