<h2>Edit Module/Category</h2>

<form action="" method="post">
    <input type="hidden" name="moduleId" value="<?=$module['id']?>">
    
    <fieldset>
        <legend>Module Information</legend>
        
        <label for="categoryName">Module/Category Name:</label>
        <input type="text" name="categoryName" id="categoryName" value="<?=htmlspecialchars($module['categoryName'], ENT_QUOTES, 'UTF-8')?>" required>

        <br><br>
        <input type="submit" value="Update Module">
        <a href="managemodule.php">Cancel</a>
    </fieldset>
</form>