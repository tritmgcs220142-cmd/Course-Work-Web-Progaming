<h2>Send Message to Admin</h2>

<form action="" method="post">
    <fieldset>
        <legend>Contact Information</legend>
        
        <label for="sender_name">Your Name:</label>
        <input type="text" name="sender_name" id="sender_name" required>

        <br><br>
        <label for="sender_email">Your Email:</label>
        <input type="email" name="sender_email" id="sender_email" required>

        <br><br>
        <label for="subject">Subject:</label>
        <input type="text" name="subject" id="subject" required>

        <br><br>
        <label for="message">Message:</label>
        <textarea name="message" id="message" rows="6" cols="50" required placeholder="Type your message to admin here..."></textarea>

        <br><br>
        <input type="submit" value="Send Message">
        <button type="reset">Clear</button>
    </fieldset>
</form>

<p><a href="index.php">Back to Home</a></p>