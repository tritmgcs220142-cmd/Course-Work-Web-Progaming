<?php
if(isset($_POST['categoryName'])){
    try{
        include '../includes/DatabaseConnection.php';
        include '../includes/DataBaseFunction.php';

        updateModule($pdo, $_POST['moduleId'], $_POST['categoryName']);
        header('location: managemodule.php');
        exit();
        
    }catch (PDOException $e){
        $title = 'An error has occurred';
        $output = 'Database error: ' . $e->getMessage();
    }
}else{
    try{
        include '../includes/DatabaseConnection.php';
        include '../includes/DataBaseFunction.php';
        
        // Lấy thông tin module để edit
        $moduleQuery = $pdo->prepare('SELECT * FROM category WHERE id = ?');
        $moduleQuery->execute([$_GET['id']]);
        $module = $moduleQuery->fetch();
        
        if(!$module){
            $title = 'Module Not Found';
            $output = '<p>Module not found.</p><p><a href="managemodule.php">Back to Modules</a></p>';
        } else {
            $title = 'Edit Module';
            ob_start();
            include '../templates/editmodule.html.php';
            $output = ob_get_clean();
        }
        
    }catch (PDOException $e){
        $title = 'An error has occurred';
        $output = 'Database error: ' . $e->getMessage();
    }
}

include '../templates/admin_layout.html.php';
?>