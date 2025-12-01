<?php
if(isset($_POST['questiontext'])){
    try{
        include 'includes/DatabaseConnection.php';
        include 'includes/DataBaseFunction.php';
        
        // Xử lý upload ảnh
        $imageName = null;
        if(isset($_FILES['image']) && $_FILES['image']['error'] == 0){
            $imageName = uploadImage($_FILES['image'], 'images/');
        }
        
        insertQuestion($pdo, $_POST['questiontext'], $imageName, $_POST['authors'], $_POST['categories']);
        header('Location: question.php');

    }catch (PDOException $e){
        $title = 'An error has occurred';
        $output = 'Error adding joke: ' . $e->getMessage();
        
    }
}else{
    include 'includes/DatabaseConnection.php';
    include 'includes/DataBaseFunction.php';

    $title = 'Add a new question';
    $authors = allAuthors($pdo);
    $categories = allCategories($pdo);
    ob_start();
    include 'templates/addquestion.html.php';
    $output = ob_get_clean();
}
include 'templates/layout.html.php';
?>