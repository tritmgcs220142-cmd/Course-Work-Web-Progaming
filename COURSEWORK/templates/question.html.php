<p><?=$totalQuestions?> questions have been submitted to the Internet Question Database.</p>
<?php
 foreach ($questions as $question): ?>
    <blockquote class="question-item">
        <div class="question-content">
            
            <?php if (!empty($question['image'])): ?>
                <?php $imagePath = (isset($isAdmin) && $isAdmin) ? '../images/' : 'images/'; ?>
                <img src="<?=$imagePath?><?=htmlspecialchars($question['image'], ENT_QUOTES, 'UTF-8')?>" alt="question Image" class="question-image">
            <?php endif; ?>
            <p class="question-text"><?=htmlspecialchars($question['questiontext'], ENT_QUOTES,'UTF-8')?>
            <br /><?=htmlspecialchars($question['categoryName'], ENT_QUOTES, 'UTF-8')?>

            (by <a href="mailto:<?=htmlspecialchars($question['email'], ENT_QUOTES, 'UTF-8')?>"><?=htmlspecialchars($question['name'], ENT_QUOTES, 'UTF-8')?></a>)</p>
            
            <?php if(isset($isAdmin) && $isAdmin): ?>
                <a href="editquestion.php?id=<?=$question['id']?>">Edit</a>
            <?php endif; ?>
        </div>
        
        <?php if(isset($isAdmin) && $isAdmin): ?>
            <form action="deletequestion.php" method="post">
                <input type="hidden" name ="id" value ="<?=htmlspecialchars($question['id'], ENT_QUOTES, 'UTF-8')?>">
                <input type ="submit" value ="Delete">
            </form>
        <?php endif; ?>
    </blockquote>
    <?php endforeach;?>