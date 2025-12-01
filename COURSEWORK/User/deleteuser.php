<?php
try{
    include '../includes/DatabaseConnection.php';
    include '../includes/DataBaseFunction.php';
    deleteUser($pdo, $_GET['id']);
    header('Location: manageuser.php');

}catch(PDOException $e){
    $title = 'An error has occurred';
    $output = 'Unable to delete user: ' .$e->getMessage();
    include '../templates/user_layout.html.php';
}
?>