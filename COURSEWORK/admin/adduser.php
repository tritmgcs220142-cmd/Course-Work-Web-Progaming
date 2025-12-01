<?php
if(isset($_POST['name']) && isset($_POST['email'])){
    try{
        include '../includes/DatabaseConnection.php';
        include '../includes/DataBaseFunction.php';

        addUser($pdo, $_POST['name'], $_POST['email']);

        // Chuyển hướng đến manageuser.php để cập nhật danh sách user
        header('location: manageuser.php');
        exit();
    }catch (PDOException $e){
        $title = 'An error has occurred';
        $output = 'Database error: ' . $e->getMessage();
    }
}else{
    include '../includes/DatabaseConnection.php';
    include '../includes/DataBaseFunction.php';
    
    $title = 'Add a new user';

    // Lấy danh sách user mới nhất
    $users = allusers($pdo);

    ob_start();
    include '../templates/adduser.html.php';
    $output = ob_get_clean();
}
include '../templates/admin_layout.html.php';

