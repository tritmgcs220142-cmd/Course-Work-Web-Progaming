<?php
if(isset($_POST['subject']) && isset($_POST['message'])){
    try{
        include '../includes/DatabaseConnection.php';
        include '../includes/DataBaseFunction.php';

        // Thêm message vào database
        sendMessage($pdo, $_POST['sender_name'], $_POST['sender_email'], $_POST['subject'], $_POST['message']);
        
        $title = 'Message Sent';
        $output = '<h2>Message Sent Successfully!</h2><p>Your message has been sent to admin. We will reply you soon.</p><p><a href="index.php">Back to Home</a></p>';
        
    }catch (PDOException $e){
        $title = 'An error has occurred';
        $output = 'Database error: ' . $e->getMessage();
    }
}else{
    $title = 'Send Message to Admin';

    ob_start();
    include '../templates/message.html.php';
    $output = ob_get_clean();
}

include '../templates/user_layout.html.php';
?>