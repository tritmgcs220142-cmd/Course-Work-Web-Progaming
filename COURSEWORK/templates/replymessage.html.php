<h2>Reply to Message</h2>

<div style="background-color: #f9f9f9; padding: 15px; border: 1px solid #ddd; margin-bottom: 20px;">
    <h3>Original Message:</h3>
    <p><strong>From:</strong> <?=htmlspecialchars($message['sender_name'], ENT_QUOTES, 'UTF-8')?> (<?=htmlspecialchars($message['sender_email'], ENT_QUOTES, 'UTF-8')?>)</p>
    <p><strong>Subject:</strong> <?=htmlspecialchars($message['subject'], ENT_QUOTES, 'UTF-8')?></p>
    <p><strong>Date:</strong> <?=htmlspecialchars($message['sent_date'], ENT_QUOTES, 'UTF-8')?></p>
    <p><strong>Message:</strong></p>
    <div style="background-color: white; padding: 10px; border-left: 3px solid #007cba;">
        <?=nl2br(htmlspecialchars($message['message'], ENT_QUOTES, 'UTF-8'))?>
    </div>
</div>

<form action="" method="post">
    <input type="hidden" name="message_id" value="<?=$message['id']?>">
    
    <fieldset>
        <legend>Send Reply</legend>
        
        <label for="reply_message">Your Reply:</label><br>
        <textarea name="reply_message" id="reply_message" rows="8" cols="60" required placeholder="Type your reply here..."></textarea>

        <br><br>
        <input type="submit" value="Send Reply">
        <a href="viewmessages.php">Cancel</a>
    </fieldset>
</form>