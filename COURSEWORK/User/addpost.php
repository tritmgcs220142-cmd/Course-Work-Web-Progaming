<?php
if(isset($_POST['posttext'])){
    include '../includes/DatabaseConnection.php';
    include '../includes/DataBaseFunction.php';
    
    // Xử lý upload file
    $imageName = null;
    if(isset($_FILES['fileToUpload']) && $_FILES['fileToUpload']['error'] == 0){
        $imageName = $_FILES['fileToUpload']['name'];
        move_uploaded_file($_FILES['fileToUpload']['tmp_name'], '../images/' . $imageName);
    }
    
    insertpost($pdo, $_POST['posttext'], $imageName, $_POST['users'], $_POST['modules']);
    header('location: posts.php');
}else{
    include '../includes/DatabaseConnection.php';
    include '../includes/DataBaseFunction.php';

    $title = 'Add a new post';
    $user = allusers($pdo);
    $modules = allmodules($pdo);
    ob_start();
    include '../templates/addpost.html.php';
    $output = ob_get_clean();
    
}
include '../templates/user_layout.html.php';
