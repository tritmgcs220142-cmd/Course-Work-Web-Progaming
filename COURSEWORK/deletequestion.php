<?php
header('Location: question.php');
try{
    include 'includes/DatabaseConnection.php';
    include 'includes/DataBaseFunctions.php';

    // $sql = 'DELETE FROM coursework_table WHERE id=:id';
    // $stmt = $pdo->prepare($sql);
    // $stmt->bindValue(':id', $_POST['id']);
    // $stmt->execute();
    deleteQuestion($pdo, $_POST['id']);
    header('Location: question.php');
}catch(PDOException $e){
    $title = 'An error has occurred';
    $output = 'Unable to connect to delete question: ' .$e->getMessage();
}
include'templates/layout.html.php';