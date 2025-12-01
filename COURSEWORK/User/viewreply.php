<?php
try {
    include '../includes/DatabaseConnection.php';
    include '../includes/DataBaseFunction.php';

    // Tạo table simple_replies nếu chưa có
    $createTable = "CREATE TABLE IF NOT EXISTS simple_replies (
        id INT AUTO_INCREMENT PRIMARY KEY,
        message_id INT,
        reply_text TEXT,
        reply_date DATETIME DEFAULT CURRENT_TIMESTAMP
    )";
    $pdo->exec($createTable);

    // Lấy messages và replies
    $sql = "SELECT m.*, sr.reply_text, sr.reply_date 
            FROM messages m 
            LEFT JOIN simple_replies sr ON m.id = sr.message_id 
            ORDER BY m.sent_date DESC";
    $messagesQuery = $pdo->query($sql);
    $messages = $messagesQuery->fetchAll();

    $title = 'My Messages & Replies';
    
    ob_start();
    include '../templates/viewreply.html.php';
    $output = ob_get_clean();
    
} catch (PDOException $e) {
    $title = 'Error';
    $output = 'Error fetching messages: ' . $e->getMessage();
}

include '../templates/user_layout.html.php';
?>
