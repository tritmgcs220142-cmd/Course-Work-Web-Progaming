<?php
include 'includes/DatabaseConnection.php';
include 'includes/DataBaseFunction.php';
try{
    if(isset($_POST['questiontext'])){
        // Cập nhật toàn bộ thông tin question
        updateQuestionFull($pdo, $_POST['questionid'], $_POST['questiontext'], $_POST['authorid'], $_POST['categoryid']);
        header('Location: question.php');
    }else{
        // Lấy thông tin question và danh sách authors/categories
        $question = getQuestion($pdo, $_GET['id']);
        
        // Lấy authors trực tiếp với error handling
        try {
            $authorsQuery = $pdo->query('SELECT * FROM author');
            $authors = $authorsQuery->fetchAll();
        } catch (Exception $e) {
            $authors = [];
        }
        
        // Lấy categories trực tiếp với error handling  
        try {
            $categoriesQuery = $pdo->query('SELECT * FROM category');
            $categories = $categoriesQuery->fetchAll();
        } catch (Exception $e) {
            $categories = [];
        }
        
        // Debug: tạm thời hiển thị số lượng
        // echo "Debug - Authors: " . count($authors) . ", Categories: " . count($categories) . "<br>";
        
        $title = 'Edit Question';

        ob_start();
        include 'templates/editquestion.html.php';
        $output = ob_get_clean();
    }
}catch (PDOException $e){
    $title = 'An error has occurred';
    $output = 'Error editing question: ' . $e->getMessage();
}
include 'templates/layout.html.php';
?>