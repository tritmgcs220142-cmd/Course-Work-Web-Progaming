<?php
try {
    include '../includes/DatabaseConnection.php';
    include '../includes/DataBaseFunction.php';

    // Lấy tất cả modules/categories từ database
    $modulesQuery = $pdo->query('SELECT * FROM category ORDER BY categoryName');
    $modules = $modulesQuery->fetchAll();

    $title = 'Manage Modules';
    
    ob_start();
    include '../templates/managemodlue.html.php';
    $output = ob_get_clean();
    
} catch (PDOException $e) {
    $title = 'Error';
    $output = 'Error fetching modules: ' . $e->getMessage();
}

include '../templates/admin_layout.html.php';
?>