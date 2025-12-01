<?php
include '../includes/DatabaseConnection.php';
include '../includes/DataBaseFunction.php';

try {
    // Lấy danh sách người dùng từ database
    $users = allusers($pdo); 

    $title = 'User List';
    ob_start();
    include '../templates/manageuser.html.php'; 
    $output = ob_get_clean();
} catch (PDOException $e) {
    $title = 'Error';
    $output = 'Error fetching users: ' . $e->getMessage();
}

include '../templates/admin_layout.html.php';
?>
