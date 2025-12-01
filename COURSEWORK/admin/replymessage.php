<?php
if(isset($_POST['reply_message'])){
    try{
        include '../includes/DatabaseConnection.php';
        include '../includes/DataBaseFunction.php';

        // Gửi reply (có thể lưu vào database hoặc gửi email)
        // Ở đây tôi sẽ lưu reply vào database
        replyMessage($pdo, $_POST['message_id'], $_POST['reply_message']);
        
        $title = 'Reply Sent';
        $output = '<h2>Reply Sent Successfully!</h2><p>Your reply has been sent.</p><p><a href="viewmessages.php">Back to Messages</a></p>';
        
    }catch (PDOException $e){
        $title = 'An error has occurred';
        $output = 'Database error: ' . $e->getMessage();
    }
}else{
    try{
        include '../includes/DatabaseConnection.php';
        include '../includes/DataBaseFunction.php';
        
        // Lấy thông tin message cần reply
        $messageQuery = $pdo->prepare('SELECT * FROM messages WHERE id = ?');
        $messageQuery->execute([$_GET['id']]);
        $message = $messageQuery->fetch();
        
        if(!$message){
            $title = 'Message Not Found';
            $output = '<p>Message not found.</p><p><a href="viewmessages.php">Back to Messages</a></p>';
        } else {
            $title = 'Reply to Message';
            ob_start();
            include '../templates/replymessage.html.php';
            $output = ob_get_clean();
        }
        
    }catch (PDOException $e){
        $title = 'An error has occurred';
        $output = 'Database error: ' . $e->getMessage();
    }
}

include '../templates/admin_layout.html.php';
?>