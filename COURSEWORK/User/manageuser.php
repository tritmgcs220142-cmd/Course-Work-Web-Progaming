<?php
echo "Test - File exists and works";

include '../includes/DatabaseConnection.php';
include '../includes/DataBaseFunction.php';

$users = allusers($pdo); 
$title = 'User List';

ob_start();
include '../templates/manageuser.html.php'; 
$output = ob_get_clean();

include '../templates/user_layout.html.php';
?>