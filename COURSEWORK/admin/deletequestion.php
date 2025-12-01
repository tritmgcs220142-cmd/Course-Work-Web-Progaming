<?php
header('Location: question.php');
try{
    include '../includes/DatabaseConnection.php';
    include '../includes/DataBaseFunction.php';
    deleteQuestion($pdo, $_POST['id']);

    // $sql = 'DELETE FROM coursework_table WHERE id=:id';
    // $stmt = $pdo->prepare($sql);
    // $stmt->bindValue(':id', $_POST['id']);
    // $stmt->execute();
}catch(PDOException $e){
    $title = 'An error has occurred';
    $output = 'Unable to connect to delete question: ' .$e->getMessage();
    include '../templates/admin_layout.html.php';
}
