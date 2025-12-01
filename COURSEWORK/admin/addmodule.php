<?php
if(isset($_POST['categoryName'])){
    try{
        include '../includes/DatabaseConnection.php';
        include '../includes/DataBaseFunction.php';

        addModule($pdo, $_POST['categoryName']);
        header('location: managemodule.php');
        exit();
        
    }catch (PDOException $e){
        $title = 'An error has occurred';
        $output = 'Database error: ' . $e->getMessage();
    }
}else{
    $title = 'Add New Module';

    ob_start();
    include '../templates/addmodule.html.php';
    $output = ob_get_clean();
}

include '../templates/admin_layout.html.php';
?>