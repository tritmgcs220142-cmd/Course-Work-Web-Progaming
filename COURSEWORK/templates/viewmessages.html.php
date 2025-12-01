<h2>User Messages</h2>

<?php if(empty($messages)): ?>
    <p>No messages found.</p>
<?php else: ?>
    <table border="1" style="width: 100%; border-collapse: collapse;">
        <tr style="background-color: #f2f2f2;">
            <th>ID</th>
            <th>Sender</th>
            <th>Email</th>
            <th>Subject</th>
            <th>Date</th>
            <th>Actions</th>
        </tr>
        <?php foreach($messages as $message): ?>
        <tr>
            <td><?=htmlspecialchars($message['id'], ENT_QUOTES, 'UTF-8')?></td>
            <td><?=htmlspecialchars($message['sender_name'], ENT_QUOTES, 'UTF-8')?></td>
            <td><?=htmlspecialchars($message['sender_email'], ENT_QUOTES, 'UTF-8')?></td>
            <td><?=htmlspecialchars($message['subject'], ENT_QUOTES, 'UTF-8')?></td>
            <td><?=htmlspecialchars($message['sent_date'], ENT_QUOTES, 'UTF-8')?></td>
            <td>
                <a href="replymessage.php?id=<?=$message['id']?>">View & Reply</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>

<br>
<p><a href="index.php">Back to Admin Home</a></p>