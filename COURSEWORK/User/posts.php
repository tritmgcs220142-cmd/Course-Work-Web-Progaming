<?php
try{
    include '../includes/DatabaseConnection.php';
    include '../includes/DataBaseFunction.php';
    
    $title = 'All Posts';
    $posts = allposts($pdo);
    
    ob_start();
    include '../templates/posts.html.php';
    $output = ob_get_clean();
    
} catch (PDOException $e){
    $title = 'An error has occurred';
    $output = 'Database error: ' . $e->getMessage();
}

include '../templates/user_layout.html.php';
?>