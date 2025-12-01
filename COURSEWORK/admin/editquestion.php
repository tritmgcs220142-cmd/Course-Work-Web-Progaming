<?php
include '../includes/DatabaseConnection.php';
include '../includes/DataBaseFunction.php';
try{
    if(isset($_POST['questiontext'])){
        updateQuestion($pdo, $_POST['questionid'], $_POST['questiontext']);
        

        //$sql = 'UPDATE coursework_table SET questiontext=:questiontext WHERE id=:id';
        //$stmt = $pdo->prepare($sql);
        //$stmt->bindValue(':questiontext', $_POST['questiontext']);
        //$stmt->bindValue(':id', $_POST['questionid']);
        //$stmt->execute();
        header('Location: question.php');
    }else{
        //$sql = 'SELECT * FROM coursework_table WHERE id = :id';
        //$stmt = $pdo->prepare($sql);
        //$stmt->bindValue(':id', $_GET['id']);
        //$stmt->execute();
        //$question = $stmt->fetch();
        $question = getQuestion($pdo, $_GET['id']);
        $authors = getAllAuthors($pdo);
        $categories = getAllCategories($pdo);
        $title = 'Edit Question';

        ob_start();
        include '../templates/editquestion.html.php';
        $output = ob_get_clean();
    }
}catch (PDOException $e){
    $title = 'An error has occurred';
    $output = 'Error editing question: ' . $e->getMessage();
}
include '../templates/admin_layout.html.php';
?>