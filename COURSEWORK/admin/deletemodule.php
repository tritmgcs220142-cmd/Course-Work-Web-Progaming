<?php
try{
    include '../includes/DatabaseConnection.php';
    include '../includes/DataBaseFunction.php';
    
    deleteModule($pdo, $_GET['id']);
    header('Location: managemodule.php');
    exit();
    
}catch(PDOException $e){
    $title = 'An error has occurred';
    $output = 'Unable to delete module: ' .$e->getMessage();
    include '../templates/admin_layout.html.php';
}
?>