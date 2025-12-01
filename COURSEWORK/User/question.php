<?php
try{
    include '../includes/DatabaseConnection.php';
    include '../includes/DataBaseFunction.php';

    // $sql = 'SELECT coursework_table.id, questiontext, name, email, image, categoryName FROM coursework_table
    // INNER JOIN author ON authorid = author.id
    // INNER JOIN category ON categoryid = category.id';
    
    // $result = $pdo->query($sql);
    // $questions = $result->fetchAll(PDO::FETCH_ASSOC);
    $questions = allQuestion($pdo);
    $title = 'Question List';
    $totalQuestions = totalQuestions($pdo);

    ob_start();
    include'../templates/admin_question.html.php';
    $output = ob_get_clean();
}catch(PDOException $e){
    $title = 'An error has occurred';
    $output = 'Database error: ' .$e->getMessage();
}
include '../templates/admin_layout.html.php';