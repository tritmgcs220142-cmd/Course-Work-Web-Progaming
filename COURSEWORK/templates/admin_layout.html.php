<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title?></title>
    <link rel="stylesheet" href="../questions.css">
    <title><?=$title?></title>
</head>
<body>
    <header id="admin">
        <h1>PAGE FOR ADMIN<br /></h1>
    </header>
    <nav>
        <ul>
            <li><a href="viewmessages.php">View User Messages</a></li>
            <li><a href="adduser.php">Add New User</a></li>
            <li><a href="manageuser.php">Manage User</a></li>
            <li><a href="managemodule.php">Manage Modules</a></li>
            <li><a href="question.php">Questions List</a></li>
            <li><a href="addquestion.php">Add a new Question</a></li>
            <li><a href="login/Logout.html">Logout</a></li>
        </ul>
    </nav>
    <main>
        <?=$output?>
    </main>
    <footer>
        &copy; IJDB 2023
    </footer>
</body>
</html>