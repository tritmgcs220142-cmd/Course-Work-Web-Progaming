<?php
include '../includes/DatabaseConnection.php';
include '../includes/DataBaseFunction.php';
try{
    if(isset($_POST['name']) && isset($_POST['email'])){
        // Cập nhật thông tin user
        edituser($pdo, $_POST['userid'], $_POST['name'], $_POST['email']);
        header('Location: manageuser.php');
    }else{
        // Lấy thông tin user để edit
        $user = getuser($pdo, $_GET['id']);
        $title = 'Edit User';

        ob_start();
        include '../templates/edituser.html.php';
        $output = ob_get_clean();
    }
}catch (PDOException $e){
    $title = 'An error has occurred';
    $output = 'Error editing user: ' . $e->getMessage();
}
include '../templates/user_layout.html.php';
?>