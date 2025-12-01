<?php
try {
    include '../includes/DatabaseConnection.php';
    include '../includes/DataBaseFunction.php';

    // Lấy tất cả messages từ database
    $messagesQuery = $pdo->query('SELECT * FROM messages ORDER BY sent_date DESC');
    $messages = $messagesQuery->fetchAll();

    $title = 'User Messages';
    
    ob_start();
    include '../templates/viewmessages.html.php';
    $output = ob_get_clean();
    
} catch (PDOException $e) {
    $title = 'Error';
    $output = 'Error fetching messages: ' . $e->getMessage();
}

include '../templates/admin_layout.html.php';
?>