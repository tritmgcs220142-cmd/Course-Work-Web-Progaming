<h2>My Messages & Admin Replies</h2>

<?php if(empty($messages)): ?>
    <p>You haven't sent any messages yet.</p>
    <p><a href="message.php">Send a message to admin</a></p>
<?php else: ?>
    <?php foreach($messages as $message): ?>
        <div style="border: 1px solid #ddd; margin-bottom: 20px; padding: 15px; border-radius: 8px; background-color: #f9f9f9;">
            
            <!-- Original Message -->
            <div style="background-color: #e3f2fd; padding: 10px; border-radius: 5px; margin-bottom: 10px;">
                <h4 style="color: #1976d2; margin: 0 0 10px 0;">📩 Your Message</h4>
                <p><strong>Subject:</strong> <?=htmlspecialchars($message['subject'], ENT_QUOTES, 'UTF-8')?></p>
                <p><strong>Sent:</strong> <?=htmlspecialchars($message['sent_date'], ENT_QUOTES, 'UTF-8')?></p>
                <p><strong>Message:</strong></p>
                <div style="background-color: white; padding: 8px; border-left: 3px solid #1976d2;">
                    <?=nl2br(htmlspecialchars($message['message'], ENT_QUOTES, 'UTF-8'))?>
                </div>
            </div>

            <!-- Admin Reply -->
            <?php if(isset($message['reply_text']) && !empty($message['reply_text'])): ?>
                <div style="background-color: #e8f5e8; padding: 10px; border-radius: 5px;">
                    <h4 style="color: #4caf50; margin: 0 0 10px 0;">💬 Admin Reply</h4>
                    <p><strong>Replied:</strong> <?=htmlspecialchars($message['reply_date'], ENT_QUOTES, 'UTF-8')?></p>
                    <div style="background-color: white; padding: 8px; border-left: 3px solid #4caf50;">
                        <?=nl2br(htmlspecialchars($message['reply_text'], ENT_QUOTES, 'UTF-8'))?>
                    </div>
                </div>
            <?php else: ?>
                <div style="background-color: #fff3e0; padding: 10px; border-radius: 5px; text-align: center;">
                    <p style="color: #ff9800; margin: 0;">⏳ Waiting for admin reply...</p>
                </div>
            <?php endif; ?>

        </div>
    <?php endforeach; ?>
<?php endif; ?>

<div style="margin-top: 20px;">
    <a href="message.php" style="background-color: #2196f3; color: white; padding: 10px 15px; text-decoration: none; border-radius: 5px;">Send New Message</a>
    <a href="index.php" style="margin-left: 10px;">Back to Home</a>
</div>