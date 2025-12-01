<?php
try{
    include '../includes/DatabaseConnection.php';
    include '../includes/DataBaseFunction.php';
    deleteUser($pdo, $_GET['id']);
    header('Location: manageuser.php');

    // $sql = 'DELETE FROM coursework_table WHERE id=:id';
    // $stmt = $pdo->prepare($sql);
    // $stmt->bindValue(':id', $_POST['id']);
    // $stmt->execute();
}catch(PDOException $e){
    $title = 'An error has occurred';
    $output = 'Unable to connect to delete question: ' .$e->getMessage();
    include '../templates/admin_layout.html.php';
}
