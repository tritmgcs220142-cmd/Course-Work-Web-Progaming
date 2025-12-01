<p><?=$totalQuestions?> questions have been submitted to the Internet Question Database.</p>
<?php
 foreach ($questions as $question): ?>
    <blockquote class="question-item">
        <div class="question-content">
            
            <?php if (!empty($question['image'])): ?>
                <img src="../images/<?=htmlspecialchars($question['image'], ENT_QUOTES, 'UTF-8')?>" alt="question Image" class="question-image">
            <?php endif; ?>
            <p class="question-text"><?=htmlspecialchars($question['questiontext'], ENT_QUOTES,'UTF-8')?>
            <br /><?=htmlspecialchars($question['categoryName']), ENT_QUOTES, 'UTF-8'?>

            (by <a href="mailto:<?=htmlspecialchars($question['email'], ENT_QUOTES, 'UTF-8')?>"><?=htmlspecialchars($question['name'], ENT_QUOTES, 'UTF-8')?></a>)</p>
            <a href="editquestion.php?id=<?=$question['id']?>">Edit</a>
        </div>
        <form action="deletequestion.php" method="post">
            <input type="hidden" name ="id" value ="<?=htmlspecialchars($question['id'], ENT_QUOTES, 'UTF-8')?>">
            <input type ="submit" value ="Delete">
        </form>
    </blockquote>
    <?php endforeach;?>